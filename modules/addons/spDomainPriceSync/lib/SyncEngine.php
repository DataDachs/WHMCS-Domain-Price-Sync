<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * Core engine class for domain collection, exclusion checking,
 * price recalculation, and database logging.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

use WHMCS\Database\Capsule;

if (! class_exists('SpDomainPriceSyncEngine')) {

    class SpDomainPriceSyncEngine
    {

        private array $settings            = [];

        private array $pricingCache        = [];

        private array $clientCurrencyCache = [];

        private array $addonPricingCache   = [];

        private array $lang                = [];

        public function __construct(array $lang)
        {

            $this->lang = $lang;
            $this->loadSettings();
        }

        /**
         * Load settings from the custom database table.
         */
        public function loadSettings() : void
        {

            $defaults = [
                'status_filter'         => 'Active',
                'exclude_client_ids'    => '',
                'exclude_domain_ids'    => '',
                'exclude_tlds'          => '',
                'skip_promo_domains'    => 'yes',
                'skip_free_domains'     => 'yes',
                'show_only_changes'     => 'no',
                'allow_price_decreases' => 'yes',
                'enable_transparency'   => 'no',
                'guest_footer_links'    => '[]',
                'enable_client_logs'    => 'no',
                'clientarea_template'   => 'auto',
            ];

            try {
                if (Capsule::schema()->hasTable('mod_spdomainpricesync_settings')) {
                    $dbSettings = Capsule::table('mod_spdomainpricesync_settings')->get();
                    foreach ($dbSettings as $row) {
                        $defaults[$row->setting_key] = $row->setting_value;
                    }
                }
            } catch (\Exception $e) {
                // Ignore schema errors during installation/activation
            }

            $this->settings = $defaults;
        }

        /**
         * Get a specific setting.
         */
        public function getSetting(string $key) : string
        {

            return $this->settings[$key] ?? '';
        }

        /**
         * Save a specific setting.
         */
        public function setSetting(string $key, string $value) : void
        {

            try {
                Capsule::table('mod_spdomainpricesync_settings')->updateOrInsert(
                    ['setting_key' => $key],
                    ['setting_value' => $value]
                );
                $this->settings[$key] = $value;
            } catch (\Exception $e) {
                // Handle or log
            }
        }

        /**
         * Extract TLD from domain name matching configured extensions.
         */
        public function extractTld(string $domainName, array $availableTlds) : ?string
        {

            $domainName = strtolower(trim($domainName));

            // Sort TLDs by length descending to match longest extensions (e.g. .co.uk before .uk)
            usort($availableTlds, function ($a, $b) {
                return strlen($b) <=> strlen($a);
            });

            foreach ($availableTlds as $tld) {
                $tldClean   = ltrim(strtolower($tld), '.');
                $tldWithDot = '.' . $tldClean;
                if (substr($domainName, -strlen($tldWithDot)) === $tldWithDot) {
                    // Ensure it's a valid root domain registration under this TLD (exactly tld_labels + 1 labels)
                    $tldLabels    = substr_count($tldClean, '.') + 1;
                    $domainLabels = substr_count($domainName, '.') + 1;
                    if ($domainLabels === $tldLabels + 1) {
                        return $tldClean;
                    }
                }
            }

            return null;
        }

        /**
         * Check if a domain has an open unpaid invoice.
         */
        public function hasOpenInvoice(int $domainId) : bool
        {

            try {
                $count = (int) Capsule::table('tblinvoiceitems')
                    ->join('tblinvoices', 'tblinvoiceitems.invoiceid', '=', 'tblinvoices.id')
                    ->whereIn('tblinvoiceitems.type', ['Domain', 'DomainRegister', 'DomainTransfer', 'DomainRenew'])
                    ->where('tblinvoiceitems.relid', $domainId)
                    ->where('tblinvoices.status', 'Unpaid')
                    ->count();
                return $count > 0;
            } catch (\Exception $e) {
                return false;
            }
        }

        /**
         * Run the dry-run or live sync process.
         */
        public function executeSync(string $runType, array $limitDomainIds = []) : array
        {

            $results = [
                'total'        => 0,
                'updates'      => 0,
                'skipped'      => 0,
                'errors'       => 0,
                'revenue_diff' => 0.0,
                'items'        => [],
            ];

            // 1. Determine active domain status filter
            $statuses = array_map('trim', explode(',', $this->getSetting('status_filter')));
            if (empty($statuses) || $statuses[0] === '') {
                $statuses = ['Active'];
            }

            // 2. Query domains
            try {
                $query = Capsule::table('tbldomains')
                    ->select('id', 'userid', 'domain', 'registrationperiod', 'recurringamount', 'promoid', 'status', 'nextduedate', 'dnsmanagement', 'emailforwarding', 'idprotection')
                    ->whereIn('status', $statuses);

                if (! empty($limitDomainIds)) {
                    $query->whereIn('id', $limitDomainIds);
                }

                $domains = $query->get();
            } catch (\Exception $e) {
                return $results;
            }

            // Parse exclusions & settings
            $excludeClients  = array_filter(array_map('intval', explode(',', $this->getSetting('exclude_client_ids'))));
            $excludeDomains  = array_filter(array_map('intval', explode(',', $this->getSetting('exclude_domain_ids'))));
            $excludeTlds     = array_filter(array_map(function ($t) {
                return ltrim(strtolower(trim($t)), '.'); }, explode(',', $this->getSetting('exclude_tlds'))));
            $skipPromo       = $this->getSetting('skip_promo_domains') === 'yes';
            $skipFree        = $this->getSetting('skip_free_domains') === 'yes';
            $showOnlyChanges = $this->getSetting('show_only_changes') === 'yes';
            $allowDecreases  = $this->getSetting('allow_price_decreases') === 'yes';

            // Fetch all globally configured TLDs from WHMCS to ensure accurate matching of extended TLDs (e.g. .radio.fm vs .fm)
            $globalTlds = [];
            try {
                $dbTlds = Capsule::table('tbldomainpricing')->select('extension')
                    ->get();
                foreach ($dbTlds as $row) {
                    $globalTlds[] = (string) $row->extension;
                }
            } catch (\Exception $e) {
                // Ignore DB errors and fallback
            }

            foreach ($domains as $domain) {
                $results['total']++;
                $domainId      = (int) $domain->id;
                $clientId      = (int) $domain->userid;
                $domainName    = (string) $domain->domain;
                $regPeriod     = (int) $domain->registrationperiod;
                $currentAmount = (float) $domain->recurringamount;
                $promoId       = (int) $domain->promoid;
                $status        = (string) $domain->status;

                // Check exclusions
                if (in_array($clientId, $excludeClients, true)) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped', 'Excluded Client ID');
                    $results['skipped']++;
                    continue;
                }

                if (in_array($domainId, $excludeDomains, true)) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped', 'Excluded Domain ID');
                    $results['skipped']++;
                    continue;
                }

                if ($skipPromo && $promoId > 0) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped', 'Special/Promo Domain (Promo ID: ' . $promoId . ')');
                    $results['skipped']++;
                    continue;
                }

                if ($skipFree && $currentAmount <= 0.005) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped', 'Free/Inclusive Domain (Price is 0.00)');
                    $results['skipped']++;
                    continue;
                }

                // Check open unpaid invoices
                $hasInvoice = $this->hasOpenInvoice($domainId);
                if ($hasInvoice) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped', 'Open Unpaid Invoice Exists', 1);
                    $results['skipped']++;
                    continue;
                }

                // Fetch TLD Pricing for this client
                if (! isset($this->pricingCache[$clientId])) {
                    $apiResult = localAPI('GetTLDPricing', ['clientid' => $clientId]);
                    if (($apiResult['result'] ?? '') === 'success') {
                        $this->pricingCache[$clientId]        = $apiResult['pricing'] ?? [];
                        $this->clientCurrencyCache[$clientId] = (int) ($apiResult['currency']['id'] ?? 0);
                    } else {
                        $this->pricingCache[$clientId]        = [];
                        $this->clientCurrencyCache[$clientId] = 0;
                    }
                }
                $pricing    = $this->pricingCache[$clientId];
                $currencyId = (int) ($this->clientCurrencyCache[$clientId] ?? 0);
                if ($currencyId <= 0) {
                    $currencyId                           = (int) Capsule::table('tblclients')->where('id', $clientId)
                        ->value('currency');
                    $this->clientCurrencyCache[$clientId] = $currencyId;
                }

                if (empty($pricing)) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'error', 'Could not retrieve pricing list for client');
                    $results['errors']++;
                    continue;
                }

                // Match TLD extension against global TLD list first to avoid wrong matches on subdomains / sub-TLDs (e.g. .radio.fm vs .fm)
                $tldKeys    = array_keys($pricing);
                $tldList    = ! empty($globalTlds) ? $globalTlds : $tldKeys;
                $matchedTld = $this->extractTld($domainName, $tldList);

                if (! $matchedTld) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'error', 'TLD not configured or recognized in WHMCS');
                    $results['errors']++;
                    continue;
                }

                // Check TLD exclusions
                if (in_array(strtolower($matchedTld), $excludeTlds, true)) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped', 'Excluded TLD (.' . $matchedTld . ')');
                    $results['skipped']++;
                    continue;
                }

                // Get renewal price for period
                $tldPricing     = $pricing[$matchedTld] ?? $pricing['.' . $matchedTld] ?? [];
                $renewPrices    = $tldPricing['renew'] ?? [];
                $baseRenewPrice = isset($renewPrices[$regPeriod]) ? (float) $renewPrices[$regPeriod] : -1.0;

                if ($baseRenewPrice < 0.0) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'error', 'Renewal price not configured for period: ' . $regPeriod . ' year(s)');
                    $results['errors']++;
                    continue;
                }

                // Safety check: no 0.00 or negative prices allowed unless current price is already 0.00
                if ($baseRenewPrice <= 0.0 && $currentAmount > 0.0) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $baseRenewPrice, 'error', 'Calculated price is zero/negative but current amount is positive');
                    $results['errors']++;
                    continue;
                }

                // Include active domain addons (per-year fee multiplied by registration period)
                $addonPrices       = $this->getDomainAddonPrices($currencyId);
                $addonsTotal       = 0.0;
                $activeAddonLabels = [];

                if (! empty($domain->dnsmanagement) && $addonPrices['dnsmanagement'] > 0.0) {
                    $addonsTotal         += $addonPrices['dnsmanagement'] * (float) $regPeriod;
                    $activeAddonLabels[]  = 'DNS';
                }
                if (! empty($domain->emailforwarding) && $addonPrices['emailforwarding'] > 0.0) {
                    $addonsTotal         += $addonPrices['emailforwarding'] * (float) $regPeriod;
                    $activeAddonLabels[]  = 'Email';
                }
                if (! empty($domain->idprotection) && $addonPrices['idprotection'] > 0.0) {
                    $addonsTotal         += $addonPrices['idprotection'] * (float) $regPeriod;
                    $activeAddonLabels[]  = 'ID Protection';
                }

                $calculatedPrice   = round($baseRenewPrice + $addonsTotal, 2);
                $addonDetailSuffix = '';
                if ($addonsTotal > 0.0) {
                    $addonDetailSuffix = ' (Base: ' . number_format($baseRenewPrice, 2) . ' + Addons [' . implode(', ', $activeAddonLabels) . ']: ' . number_format($addonsTotal, 2) . ')';
                }

                $difference   = $calculatedPrice - $currentAmount;
                $priceDiffers = abs($difference) > 0.005;

                // Handle Price Decreases Restriction
                if ($priceDiffers && $difference < -0.005 && ! $allowDecreases) {
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'skipped_decrease', 'Price decrease is disabled in settings');
                    $results['skipped']++;

                    if ($runType === 'dry_run' && $showOnlyChanges) {
                        continue;
                    }

                    $results['items'][] = [
                        'domain_id'   => $domainId,
                        'domain_name' => $domainName,
                        'client_id'   => $clientId,
                        'reg_period'  => $regPeriod,
                        'old_amount'  => $currentAmount,
                        'new_amount'  => $currentAmount,
                        'difference'  => 0.0,
                        'status'      => 'skipped_decrease',
                        'reason'      => 'Price decrease is disabled in settings',
                        'has_invoice' => 0,
                    ];
                    continue;
                }

                // Handle show_only_changes in Dry-Run reporting
                if ($runType === 'dry_run' && $showOnlyChanges && ! $priceDiffers) {
                    continue;
                }

                if ($runType === 'dry_run') {
                    $statusVal = $priceDiffers ? 'would_update' : 'match';
                    $reason    = $priceDiffers ? 'Price differs by ' . number_format($difference, 2) . $addonDetailSuffix : 'Price is already matching' . $addonDetailSuffix;
                    $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $calculatedPrice, $statusVal, $reason);

                    if ($priceDiffers) {
                        $results['updates']++;
                        $results['revenue_diff'] += ($difference / ((float) $regPeriod * 12.0)); // Monthly difference approximation
                    }

                    $results['items'][] = [
                        'domain_id'   => $domainId,
                        'domain_name' => $domainName,
                        'client_id'   => $clientId,
                        'reg_period'  => $regPeriod,
                        'old_amount'  => $currentAmount,
                        'new_amount'  => $calculatedPrice,
                        'difference'  => $difference,
                        'status'      => $statusVal,
                        'reason'      => $reason,
                        'has_invoice' => 0,
                    ];
                } else {
                    // LIVE SYNC execution
                    if ($priceDiffers) {
                        $updateResult = localAPI('UpdateClientDomain', [
                            'domainid'   => $domainId,
                            'autorecalc' => true,
                        ]);

                        if ($updateResult['result'] === 'success') {
                            // Fetch updated recurring amount directly from database to log actual saved price
                            $savedAmount      = (float) Capsule::table('tbldomains')->where('id', $domainId)
                                ->value('recurringamount');
                            $actualDifference = $savedAmount - $currentAmount;

                            // Format Currency details for email
                            $clientData = Capsule::table('tblclients')
                                ->join('tblcurrencies', 'tblclients.currency', '=', 'tblcurrencies.id')
                                ->where('tblclients.id', $clientId)
                                ->select('tblcurrencies.code', 'tblcurrencies.prefix', 'tblcurrencies.suffix')
                                ->first();

                            $currencyPrefix = $clientData ? (string) $clientData->prefix : '';
                            $currencySuffix = $clientData ? (string) $clientData->suffix : '';

                            $oldPriceFormatted    = $currencyPrefix . number_format($currentAmount, 2) . $currencySuffix;
                            $newPriceFormatted    = $currencyPrefix . number_format($savedAmount, 2) . $currencySuffix;
                            $nextDueDateFormatted = date('d.m.Y', strtotime((string) $domain->nextduedate));

                            // Dispatch notifications based on price change direction
                            $templateName = null;
                            if ($savedAmount > $currentAmount + 0.005) {
                                $templateName = 'Domain Price Sync Increase';
                            } elseif ($savedAmount < $currentAmount - 0.005) {
                                $templateName = 'Domain Price Sync Decrease';
                            }

                            $emailDetailMsg = '';
                            if ($templateName !== null) {
                                $sendEmailResult = localAPI('SendEmail', [
                                    'messagename' => $templateName,
                                    'id'          => $domainId,
                                    'customvars'  => base64_encode(serialize([
                                        'domain_name'   => $domainName,
                                        'old_price'     => $oldPriceFormatted,
                                        'new_price'     => $newPriceFormatted,
                                        'next_due_date' => $nextDueDateFormatted,
                                    ])),
                                ]);

                                if ($sendEmailResult['result'] === 'success') {
                                    $emailDetailMsg = ' (Notification email sent successfully)';
                                } else {
                                    $emailDetailMsg = ' (Email dispatch failed: ' . ($sendEmailResult['message'] ?? $this->lang['TXT_UNKNOWN_API_ERROR']) . ')';
                                }
                            }

                            $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $savedAmount, 'updated', 'Recalculated via LocalAPI' . $addonDetailSuffix . $emailDetailMsg);

                            $results['updates']++;
                            $results['revenue_diff'] += ($actualDifference / ((float) $regPeriod * 12.0));

                            $results['items'][] = [
                                'domain_id'   => $domainId,
                                'domain_name' => $domainName,
                                'client_id'   => $clientId,
                                'reg_period'  => $regPeriod,
                                'old_amount'  => $currentAmount,
                                'new_amount'  => $savedAmount,
                                'difference'  => $actualDifference,
                                'status'      => 'updated',
                                'reason'      => 'Recalculated via LocalAPI' . $addonDetailSuffix . $emailDetailMsg,
                                'has_invoice' => 0,
                            ];
                        } else {
                            $errMsg = $updateResult['message'] ?? $this->lang['TXT_API_UPDATE_ERROR'];
                            $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'error', $errMsg);
                            $results['errors']++;
                        }
                    } else {
                        // Prices already match
                        $this->logSyncItem($runType, $domainId, $domainName, $clientId, $regPeriod, $currentAmount, $currentAmount, 'match', 'Price is already matching' . $addonDetailSuffix);

                        $results['items'][] = [
                            'domain_id'   => $domainId,
                            'domain_name' => $domainName,
                            'client_id'   => $clientId,
                            'reg_period'  => $regPeriod,
                            'old_amount'  => $currentAmount,
                            'new_amount'  => $currentAmount,
                            'difference'  => 0.0,
                            'status'      => 'match',
                            'reason'      => 'Price is already matching' . $addonDetailSuffix,
                            'has_invoice' => 0,
                        ];
                    }
                }
            }

            return $results;
        }

        /**
         * Fetch per-year domain addon prices (DNS management, email forwarding, ID protection) for a currency.
         */
        private function getDomainAddonPrices(int $currencyId) : array
        {

            if ($currencyId <= 0) {
                return ['dnsmanagement' => 0.0, 'emailforwarding' => 0.0, 'idprotection' => 0.0];
            }

            if (isset($this->addonPricingCache[$currencyId])) {
                return $this->addonPricingCache[$currencyId];
            }

            $prices = ['dnsmanagement' => 0.0, 'emailforwarding' => 0.0, 'idprotection' => 0.0];

            try {
                $row = Capsule::table('tblpricing')
                    ->where('type', 'domainaddons')
                    ->where('currency', $currencyId)
                    ->where('relid', 0)
                    ->select('msetupfee', 'qsetupfee', 'ssetupfee')
                    ->first();

                if ($row) {
                    $dns       = (float) $row->msetupfee;
                    $email     = (float) $row->qsetupfee;
                    $idProtect = (float) $row->ssetupfee;

                    $prices['dnsmanagement']   = ($dns > 0.0) ? $dns : 0.0;
                    $prices['emailforwarding'] = ($email > 0.0) ? $email : 0.0;
                    $prices['idprotection']    = ($idProtect > 0.0) ? $idProtect : 0.0;
                }
            } catch (\Exception $e) {
                // Keep 0.0 addon fees if lookup fails
            }

            $this->addonPricingCache[$currencyId] = $prices;

            return $prices;
        }

        /**
         * Log individual domain sync action to custom database log table.
         */
        private function logSyncItem(
            string $runType,
            int $domainId,
            string $domainName,
            int $clientId,
            int $regPeriod,
            float $oldAmount,
            float $newAmount,
            string $status,
            string $reason,
            int $hasInvoice = 0
        ) : void {

            try {
                if (Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                    Capsule::table('mod_spdomainpricesync_log')->insert([
                        'run_type'         => $runType,
                        'domain_id'        => $domainId,
                        'domain_name'      => $domainName,
                        'client_id'        => $clientId,
                        'reg_period'       => $regPeriod,
                        'old_amount'       => $oldAmount,
                        'new_amount'       => $newAmount,
                        'difference'       => $newAmount - $oldAmount,
                        'status'           => $status,
                        'reason'           => $reason,
                        'has_open_invoice' => $hasInvoice,
                        'created_at'       => date('Y-m-d H:i:s'),
                    ]);
                }
            } catch (\Exception $e) {
                // Log table error or write to server log
            }
        }

    }

}
