<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * An administrative tool to automatically synchronize and update existing client 
 * domain recurring amounts to match current TLD renewal pricing configured in WHMCS.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

use WHMCS\Database\Capsule;

// 1. Language Loader Redeclaration Guard
if (! function_exists('spDomainPriceSync_lang')) {

    function spDomainPriceSync_lang() : array
    {

        $sysLanguage = 'english';

        try {
            $dbLang = Capsule::table('tblconfiguration')->where('setting', 'Language')
                ->value('value');
            if ($dbLang) {
                $sysLanguage = $dbLang;
            }
        } catch (\Exception $e) {
            // Ignore database reading failures during early activation
        }

        if (defined('ADMINAREA')) {
            if (isset($_SESSION['adminid']) && ! empty($_SESSION['adminid'])) {
                try {
                    $adminLanguage = Capsule::table('tbladmins')->where('id', $_SESSION['adminid'])
                        ->value('language');
                    if ($adminLanguage) {
                        $sysLanguage = $adminLanguage;
                    }
                } catch (\Exception $e) {
                    // Ignore admin session read errors
                }
            }
        } else {
            if (isset($_SESSION['uid']) && ! empty($_SESSION['uid'])) {
                try {
                    $clientLanguage = Capsule::table('tblclients')->where('id', $_SESSION['uid'])
                        ->value('language');
                    if ($clientLanguage) {
                        $sysLanguage = $clientLanguage;
                    }
                } catch (\Exception $e) {
                    // Ignore client read errors
                }
            }
        }

        if (isset($_SESSION['Language']) && ! empty($_SESSION['Language'])) {
            $sysLanguage = $_SESSION['Language'];
        }

        $langFile = __DIR__ . '/lang/' . strtolower(basename($sysLanguage)) . '.php';
        if (file_exists($langFile)) {
            require $langFile;

            return $_ADDONLANG ?? [];
        }

        $fallbackFile = __DIR__ . '/lang/english.php';
        if (file_exists($fallbackFile)) {
            require $fallbackFile;
            return $_ADDONLANG ?? [];
        }

        return [];
    }

}

// 2. Addon Configuration Guard
if (! function_exists('spDomainPriceSync_config')) {

    function spDomainPriceSync_config() : array
    {

        $l = spDomainPriceSync_lang();

        return [
            'name'        => 'DD: ' . $l['TITLE'],
            'description' => $l['DESCRIPTION'],
            'version'     => '1.0.0',
            'author'      => '<a href="https://www.datadachs.eu/whmcs/" target="_blank" rel="noopener">DataDachs</a>',
            'language'    => 'english',
            'fields'      => [
                'license'       => [
                    'FriendlyName' => 'License Key',
                    'Type'         => 'text',
                    'Size'         => '40',
                    'Description'  => 'Enter your premium license key.',
                    'Default'      => '',
                ],
                'license_cache' => [
                    'FriendlyName' => '<span style="display:none;">License Cache</span><style>tr:has(input[name="fields[license_cache]"]) { display: none !important; }</style>',
                    'Type'         => 'hidden',
                    'Default'      => '',
                ],
                'drop_tables'   => [
                    'FriendlyName' => $l['DROP_TABLES'],
                    'Type'         => 'yesno',
                    'Description'  => $l['DROP_TABLES_DESC'],
                    'Default'      => '',
                ],
                'debug_mode'    => [
                    'FriendlyName' => $l['DEBUG_MODE'],
                    'Type'         => 'yesno',
                    'Description'  => $l['DEBUG_MODE_DESC'],
                    'Default'      => '',
                ],
            ],
        ];
    }

}

// 3. Module Activation Guard
if (! function_exists('spDomainPriceSync_activate')) {

    function spDomainPriceSync_activate() : array
    {

        try {
            // Create settings table
            if (! Capsule::schema()->hasTable('mod_spdomainpricesync_settings')) {
                Capsule::schema()->create('mod_spdomainpricesync_settings', function ($table) {
                    $table->increments('id');
                    $table->string('setting_key', 64)
                        ->unique();
                    $table->text('setting_value')
                        ->nullable();
                });
            }

            // Create logs table
            if (! Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                Capsule::schema()->create('mod_spdomainpricesync_log', function ($table) {
                    $table->increments('id');
                    $table->string('run_type', 16);
                    $table->integer('domain_id');
                    $table->string('domain_name');
                    $table->integer('client_id');
                    $table->integer('reg_period');
                    $table->decimal('old_amount', 10, 2);
                    $table->decimal('new_amount', 10, 2);
                    $table->decimal('difference', 10, 2);
                    $table->string('status', 32);
                    $table->text('reason')
                        ->nullable();
                    $table->tinyInteger('has_open_invoice')
                        ->default(0);
                    $table->dateTime('created_at');
                });
            }

            // Seed settings table
            $defaultSettings = [
                'status_filter'         => 'Active',
                'exclude_client_ids'    => '',
                'exclude_domain_ids'    => '',
                'exclude_tlds'          => '',
                'skip_promo_domains'    => 'yes',
                'skip_free_domains'     => 'yes',
                'allow_price_decreases' => 'yes',
                'show_only_changes'     => 'no',
                'enable_transparency'   => 'no',
                'guest_footer_links'    => '[]',
                'enable_client_logs'    => 'no',
                'clientarea_template'   => 'auto',
            ];

            foreach ($defaultSettings as $key => $val) {
                if (! Capsule::table('mod_spdomainpricesync_settings')->where('setting_key', $key)
                    ->exists()) {
                    Capsule::table('mod_spdomainpricesync_settings')->insert([
                        'setting_key'   => $key,
                        'setting_value' => $val,
                    ]);
                }
            }

            // Seed Email Templates in WHMCS Native Catalogue
            if (Capsule::schema()->hasTable('tblemailtemplates')) {
                $templates = [
                    [
                        'type'    => 'domain',
                        'name'    => 'Domain Price Sync Increase',
                        'subject' => 'Domain Renewal Price Adjustment: {$domain_name}',
                        'message' => 'We are writing to inform you of an upcoming price adjustment for the renewal of your domain.<br /><br />This adjustment is driven by our automated pricing system, which dynamically synchronizes domain rates with the current wholesale prices of our connected registrars. Due to a price increase for this domain extension (TLD) from our registry partners, we must adjust our renewal fee accordingly.<br /><br />Adjustment details:<br />Domain: {$domain_name}<br />Previous renewal price: {$old_price} / year<br />New renewal price: {$new_price} / year<br />Effective date: {$next_due_date}<br /><br />Please note that this price adjustment will only take effect on the specified date upon your next regular domain renewal. No additional charges will apply to your currently running registration period.<br /><br />Your options:<br />If you agree to the new renewal price, no action is required on your part. The domain will automatically renew on {$next_due_date} at the adjusted rate.<br /><br />If you do not agree to the price adjustment, you can cancel the domain registration at any time before the renewal date through our client area. The domain will then expire at the end of the current term, and no further fees will be charged.',
                        'custom'  => '1',
                    ],
                    [
                        'type'    => 'domain',
                        'name'    => 'Domain Price Sync Decrease',
                        'subject' => 'Domain Renewal Price Reduced: {$domain_name}',
                        'message' => 'We are pleased to inform you that the renewal price for your domain has been reduced.<br /><br />This reduction is made possible by our automated pricing system, which dynamically synchronizes domain rates with the pricing of our connected registrars. Based on lower costs for this domain extension (TLD) from our partners, we have adjusted our renewal fee accordingly.<br /><br />Reduction details:<br />Domain: {$domain_name}<br />Previous renewal price: {$old_price} / year<br />New renewal price: {$new_price} / year<br />Effective date: {$next_due_date}<br /><br />This reduced price will automatically apply to your next domain renewal on {$next_due_date}. No action is required from you to benefit from the lower rate.',
                        'custom'  => '1',
                    ],
                ];

                foreach ($templates as $tpl) {
                    if (! Capsule::table('tblemailtemplates')->where('name', $tpl['name'])
                        ->exists()) {
                        Capsule::table('tblemailtemplates')->insert($tpl);
                    }
                }
            }

            return ['status' => 'success', 'description' => 'Activated successfully. Custom tables and email templates initialized.'];
        } catch (\Exception $e) {
            logActivity('spDomainPriceSync activate failed: ' . $e->getMessage());
            return ['status' => 'error', 'description' => 'Database Error during activation: ' . $e->getMessage()];
        }
    }

}

// 4. Module Deactivation Guard
if (! function_exists('spDomainPriceSync_deactivate')) {

    function spDomainPriceSync_deactivate() : array
    {

        try {
            $dropTables = Capsule::table('tbladdonmodules')
                ->where('module', 'spDomainPriceSync')
                ->where('setting', 'drop_tables')
                ->value('value');

            if ($dropTables === 'on') {
                Capsule::schema()->dropIfExists('mod_spdomainpricesync_settings');
                Capsule::schema()->dropIfExists('mod_spdomainpricesync_log');

                // Clean up seeded templates
                if (Capsule::schema()->hasTable('tblemailtemplates')) {
                    Capsule::table('tblemailtemplates')
                        ->whereIn('name', ['Domain Price Sync Increase', 'Domain Price Sync Decrease'])
                        ->delete();
                }
            }

            return ['status' => 'success', 'description' => 'Deactivated successfully.'];
        } catch (\Exception $e) {
            logActivity('spDomainPriceSync deactivate failed: ' . $e->getMessage());
            return ['status' => 'error', 'description' => 'Database Error during deactivation: ' . $e->getMessage()];
        }
    }

}

// 5. Licensing Manager Guard
if (! function_exists('spDomainPriceSync_verifyLicense')) {

    function spDomainPriceSync_verifyLicense(string $nk = '', string $lk = '') : array
    {

        $r = ['st' => 'Invalid', 'dk' => ''];
        if (empty($nk)) {
            return $r;
        }

        // Encryption salt
        $_sk = 'sPaSdOmAiNpRiCeSyNcSeCuRiTyKeY';

        // Local cache validation (7 days grace/cache)
        if ($lk && strlen($lk) > 10) {
            $lkd = base64_decode($lk);
            if ($lkd) {
                $p = @unserialize($lkd, ['allowed_classes' => false]);
                if (is_array($p) && isset($p['cd']) && isset($p['v'])) {
                    $cd = date('Ymd', strtotime($p['cd']));
                    if ($cd >= date('Ymd', strtotime('-7 days'))) {
                        $vh = md5($_sk . $p['cd']);
                        if (hash_equals(substr($vh, 0, 16), substr($p['v'], 0, 16))) {
                            $r['st'] = $p['s'] ?? 'Invalid';
                            $r['dk'] = $lk;
                            return $r;
                        }
                    }
                }
            }
        }

        // Query licensing server
        $ch       = curl_init();
        $postData = [
            'licensekey' => $nk,
            'domain'     => $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? php_uname('n'),
            'ip'         => $_SERVER['SERVER_ADDR'] ?? '127.0.0.1',
            'dir'        => dirname(__FILE__),
        ];
        curl_setopt($ch, CURLOPT_URL, 'https://login.streampanel.net/modules/servers/licensing/verify.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $resp = (string) curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Offline grace period (allow up to 3 failed connection attempts)
        static $nc = null;
        if ($code !== 200 || empty($resp)) {
            if ($nc === null) {
                $nc = 0;
            }
            $nc++;
            if ($nc <= 3) {
                $cd = date('Ymd');
                $vh = md5($_sk . $cd);
                $dk = base64_encode(serialize(['cd' => $cd, 's' => 'Active', 'v' => $vh]));
                return [
                    'st' => 'Active',
                    'dk' => $dk,
                ];
            }
            return $r;
        }

        $nc = 0;

        // Parse XML response
        $data = [];
        if (preg_match_all('/<(\w+)>([^<]*)<\/\1>/', $resp, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $m) {
                $data[$m[1]] = trim($m[2]);
            }
        }

        $status    = $data['status'] ?? 'Invalid';
        $md5remote = $data['md5hash'] ?? '';

        if (! empty($md5remote)) {
            $md5local = md5($_sk . implode('', [
                $data['customfields'] ?? '',
                $data['addons'] ?? '',
            ]));
            if (! hash_equals($md5local, $md5remote)) {
                return $r;
            }
        }

        $r['st'] = $status;
        if ($status === 'Active') {
            $cd      = date('Ymd');
            $vh      = md5($_sk . $cd);
            $r['dk'] = base64_encode(serialize(['cd' => $cd, 's' => 'Active', 'v' => $vh]));
        }
        return $r;
    }

}

// Include lib dependencies safely
require_once __DIR__ . '/lib/SyncEngine.php';
require_once __DIR__ . '/lib/Renderer.php';

// Discover valid client area template folders inside templates/
if (! function_exists('spDomainPriceSync_getAvailableTemplates')) {

    function spDomainPriceSync_getAvailableTemplates() : array
    {
        $baseDir   = __DIR__ . '/templates';
        $templates = [];

        if (! is_dir($baseDir)) {
            return ['six'];
        }

        $entries = scandir($baseDir);
        if (! is_array($entries)) {
            return ['six'];
        }

        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..' || $entry === 'partials') {
                continue;
            }
            if (! preg_match('/^[a-zA-Z0-9_-]+$/', $entry)) {
                continue;
            }
            $dirPath = $baseDir . '/' . $entry;
            if (is_dir($dirPath) && file_exists($dirPath . '/clientarea.tpl') && file_exists($dirPath . '/transparency.tpl')) {
                $templates[] = $entry;
            }
        }

        if (empty($templates)) {
            return ['six'];
        }

        usort($templates, function (string $a, string $b) : int {
            if ($a === 'six') {
                return -1;
            }
            if ($b === 'six') {
                return 1;
            }
            return strcasecmp($a, $b);
        });

        return $templates;
    }

}

if (! function_exists('spDomainPriceSync_getActiveWhmcsTemplate')) {

    function spDomainPriceSync_getActiveWhmcsTemplate() : string
    {
        $raw = '';
        if (isset($_SESSION['Template']) && is_string($_SESSION['Template']) && $_SESSION['Template'] !== '') {
            $raw = $_SESSION['Template'];
        } else {
            try {
                $raw = (string) (Capsule::table('tblconfiguration')->where('setting', 'Template')->value('value') ?? '');
            } catch (\Exception $e) {
                $raw = '';
            }
        }

        $clean = preg_replace('/[^a-zA-Z0-9_-]/', '', basename(trim($raw)));
        return is_string($clean) && $clean !== '' ? $clean : 'six';
    }

}

if (! function_exists('spDomainPriceSync_resolveTemplateName')) {

    function spDomainPriceSync_resolveTemplateName(string $configured) : string
    {
        $available = spDomainPriceSync_getAvailableTemplates();
        $default   = in_array('six', $available, true) ? 'six' : $available[0];

        if ($configured === '' || $configured === 'auto') {
            $active = spDomainPriceSync_getActiveWhmcsTemplate();
            foreach ($available as $tplDir) {
                if (strcasecmp($tplDir, $active) === 0) {
                    return $tplDir;
                }
            }
            return $default;
        }

        foreach ($available as $tplDir) {
            if ($tplDir === $configured) {
                return $tplDir;
            }
        }

        return $default;
    }

}

if (! function_exists('spDomainPriceSync_resolveTemplate')) {

    function spDomainPriceSync_resolveTemplate(string $configured, string $page = 'clientarea') : string
    {
        $safePage = in_array($page, ['clientarea', 'transparency'], true) ? $page : 'clientarea';
        $themeDir = spDomainPriceSync_resolveTemplateName($configured);
        return 'templates/' . $themeDir . '/' . $safePage;
    }

}

// 6. System Health Check Function Guard
if (! function_exists('spDomainPriceSync_runHealthCheck')) {

    function spDomainPriceSync_runHealthCheck() : array
    {

        $l      = spDomainPriceSync_lang();
        $checks = [];

        // Module Version
        $moduleConfig = spDomainPriceSync_config();
        $checks[]     = [
            'title'  => $l['HEALTH_MODULE_VERSION'],
            'desc'   => $moduleConfig['version'],
            'status' => 'pass',
        ];

        // PHP Version Check
        $phpPass  = version_compare(PHP_VERSION, '8.2.0', '>=');
        $checks[] = [
            'title'  => $l['HEALTH_PHP_VERSION'],
            'desc'   => str_replace('{version}', PHP_VERSION, $l['HEALTH_PHP_VERSION_DESC']),
            'status' => $phpPass ? 'pass' : 'fail',
        ];

        // License Status
        try {
            $licKey    = (string) Capsule::table('tbladdonmodules')
                ->where('module', 'spDomainPriceSync')
                ->where('setting', 'license')
                ->value('value');
            $licCache  = (string) Capsule::table('tbladdonmodules')
                ->where('module', 'spDomainPriceSync')
                ->where('setting', 'license_cache')
                ->value('value');
            $licResult = spDomainPriceSync_verifyLicense($licKey, $licCache);
            $licActive = ($licResult['st'] === 'Active');
            $checks[]  = [
                'title'  => $l['HEALTH_LICENSE_STATUS'],
                'desc'   => $licResult['st'],
                'status' => $licActive ? 'pass' : 'fail',
            ];
        } catch (\Exception $e) {
            $checks[] = [
                'title'  => $l['HEALTH_LICENSE_STATUS'],
                'desc'   => 'Error: ' . $e->getMessage(),
                'status' => 'fail',
            ];
        }

        // Settings Table Check
        try {
            $settingsExists = Capsule::schema()->hasTable('mod_spdomainpricesync_settings');
            $checks[]       = [
                'title'  => $l['HEALTH_SETTINGS_TABLE'],
                'desc'   => $l['HEALTH_SETTINGS_TABLE_DESC'],
                'status' => $settingsExists ? 'pass' : 'fail',
            ];

            if ($settingsExists) {
                $columns = ['id', 'setting_key', 'setting_value'];
                $missing = [];
                foreach ($columns as $col) {
                    if (! Capsule::schema()->hasColumn('mod_spdomainpricesync_settings', $col)) {
                        $missing[] = $col;
                    }
                }
                $checks[] = [
                    'title'  => $l['HEALTH_SETTINGS_SCHEMA'],
                    'desc'   => empty($missing) ? $l['HEALTH_SETTINGS_SCHEMA_OK'] : str_replace('{columns}', implode(', ', $missing), $l['HEALTH_SETTINGS_SCHEMA_MISSING']),
                    'status' => empty($missing) ? 'pass' : 'fail',
                ];
            }
        } catch (\Exception $e) {
            $checks[] = [
                'title'  => $l['HEALTH_DB_STATUS'],
                'desc'   => 'Error: ' . $e->getMessage(),
                'status' => 'fail',
            ];
        }

        // Log Table Check
        try {
            $logExists = Capsule::schema()->hasTable('mod_spdomainpricesync_log');
            $checks[]  = [
                'title'  => $l['HEALTH_LOG_TABLE'],
                'desc'   => $l['HEALTH_LOG_TABLE_DESC'],
                'status' => $logExists ? 'pass' : 'fail',
            ];

            if ($logExists) {
                $columns = [
                    'id', 'run_type', 'domain_id', 'domain_name', 'client_id',
                    'reg_period', 'old_amount', 'new_amount', 'difference',
                    'status', 'reason', 'has_open_invoice', 'created_at',
                ];
                $missing = [];
                foreach ($columns as $col) {
                    if (! Capsule::schema()->hasColumn('mod_spdomainpricesync_log', $col)) {
                        $missing[] = $col;
                    }
                }
                $checks[] = [
                    'title'  => $l['HEALTH_LOG_SCHEMA'],
                    'desc'   => empty($missing) ? $l['HEALTH_LOG_SCHEMA_OK'] : str_replace('{columns}', implode(', ', $missing), $l['HEALTH_LOG_SCHEMA_MISSING']),
                    'status' => empty($missing) ? 'pass' : 'fail',
                ];
            }
        } catch (\Exception $e) {
            $checks[] = [
                'title'  => $l['HEALTH_DB_STATUS'],
                'desc'   => 'Error: ' . $e->getMessage(),
                'status' => 'fail',
            ];
        }

        // WHMCS Core Table Dependencies Check
        $coreTables = ['tbldomains', 'tblinvoiceitems', 'tblinvoices', 'tblconfiguration', 'tblclients', 'tblcurrencies', 'tblemailtemplates', 'tbladmins'];
        foreach ($coreTables as $ct) {
            try {
                $exists   = Capsule::schema()->hasTable($ct);
                $checks[] = [
                    'title'  => str_replace('{table}', $ct, $l['HEALTH_CORE_TABLE']),
                    'desc'   => str_replace('{table}', $ct, $l['HEALTH_CORE_TABLE_DESC']),
                    'status' => $exists ? 'pass' : 'fail',
                ];
            } catch (\Exception $e) {
                $checks[] = [
                    'title'  => str_replace('{table}', $ct, $l['HEALTH_CORE_TABLE']),
                    'desc'   => 'Error: ' . $e->getMessage(),
                    'status' => 'fail',
                ];
            }
        }

        // Email Templates Check
        $templates = ['Domain Price Sync Increase', 'Domain Price Sync Decrease'];
        foreach ($templates as $tpl) {
            try {
                $exists   = Capsule::table('tblemailtemplates')->where('name', $tpl)
                    ->exists();
                $checks[] = [
                    'title'  => str_replace('{name}', $tpl, $l['HEALTH_EMAIL_TEMPLATE']),
                    'desc'   => str_replace('{name}', $tpl, $l['HEALTH_EMAIL_TEMPLATE_DESC']),
                    'status' => $exists ? 'pass' : 'fail',
                ];
            } catch (\Exception $e) {
                $checks[] = [
                    'title'  => str_replace('{name}', $tpl, $l['HEALTH_EMAIL_TEMPLATE']),
                    'desc'   => 'Error: ' . $e->getMessage(),
                    'status' => 'fail',
                ];
            }
        }

        // Integration Check: GetTLDPricing API availability
        try {
            $apiResult  = localAPI('GetTLDPricing', []);
            $apiSuccess = (isset($apiResult['result']) && $apiResult['result'] === 'success');
            $checks[]   = [
                'title'  => $l['HEALTH_INTEGRATION_CHECK'],
                'desc'   => $apiSuccess ? $l['HEALTH_INTEGRATION_OK'] : str_replace('{message}', ($apiResult['message'] ?? ''), $l['HEALTH_INTEGRATION_FAIL']),
                'status' => $apiSuccess ? 'pass' : 'warn',
            ];
        } catch (\Exception $e) {
            $checks[] = [
                'title'  => $l['HEALTH_INTEGRATION_CHECK'],
                'desc'   => 'Error: ' . $e->getMessage(),
                'status' => 'fail',
            ];
        }

        return $checks;
    }

}

// 7. Addon Area Output Guard
if (! function_exists('spDomainPriceSync_output')) {

    function spDomainPriceSync_output(array $vars) : void
    {

        $l = spDomainPriceSync_lang();

        // 1. License Check Validation Block
        $licenseKey   = (string) ($vars['license'] ?? '');
        $licenseCache = (string) ($vars['license_cache'] ?? '');

        $lic = spDomainPriceSync_verifyLicense($licenseKey, $licenseCache);

        if ($lic['st'] !== 'Active') {
            echo '
            <div class="alert alert-danger" style="margin: 20px 0; border-radius: 12px; font-family: \'Outfit\', sans-serif;">
                <h4>' . htmlspecialchars($l['ERROR_LICENSE_INVALID']) . '</h4>
                <p>' . htmlspecialchars($l['ERROR_LICENSE_DESC']) . '</p>
            </div>';
            return;
        }

        // Update license cache if verified
        if ($lic['dk'] !== $licenseCache) {
            try {
                Capsule::table('tbladdonmodules')
                    ->where('module', 'spDomainPriceSync')
                    ->where('setting', 'license_cache')
                    ->update(['value' => $lic['dk']]);
            } catch (\Exception $e) {
                // Ignore DB save errors during activation
            }
        }

        $moduleLink = (string) $vars['modulelink'];
        $tab        = (string) ($_GET['tab'] ?? 'sync');
        $action     = (string) ($_GET['action'] ?? '');

        // 2. Initialize CSRF protection
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['dddp_csrf_token'])) {
            $_SESSION['dddp_csrf_token'] = bin2hex(random_bytes(32));
        }
        $csrfToken = (string) $_SESSION['dddp_csrf_token'];

        $engine   = new SpDomainPriceSyncEngine($l);
        $renderer = new SpDomainPriceSyncRenderer($l, $moduleLink);

        // 3. Handle POST Submissions with strict CSRF check
        $postedCsrf = (string) ($_POST['csrf_token'] ?? '');
        $isPost     = ($_SERVER['REQUEST_METHOD'] === 'POST');
        $csrfValid  = false;

        if ($isPost) {
            if (! empty($postedCsrf) && hash_equals($csrfToken, $postedCsrf)) {
                $csrfValid = true;
            } else {
                echo '<div class="errorbox"><strong>' . htmlspecialchars($l['ERROR_CSRF']) . '</strong></div>';
            }
        }

        // Action routing logic
        if ($isPost && $csrfValid) {
            // Handle Schema / Template Repair
            if ($tab === 'health' && $action === 'repair') {
                try {
                    // Settings table check and repair
                    if (! Capsule::schema()->hasTable('mod_spdomainpricesync_settings')) {
                        Capsule::schema()->create('mod_spdomainpricesync_settings', function ($table) {
                            $table->increments('id');
                            $table->string('setting_key', 64)
                                ->unique();
                            $table->text('setting_value')
                                ->nullable();
                        });
                    } else {
                        Capsule::schema()->table('mod_spdomainpricesync_settings', function ($table) {
                            if (! Capsule::schema()->hasColumn('mod_spdomainpricesync_settings', 'setting_key')) {
                                $table->string('setting_key', 64)
                                    ->unique();
                            }
                            if (! Capsule::schema()->hasColumn('mod_spdomainpricesync_settings', 'setting_value')) {
                                $table->text('setting_value')
                                    ->nullable();
                            }
                        });
                    }

                    // Logs table check and repair
                    if (! Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                        Capsule::schema()->create('mod_spdomainpricesync_log', function ($table) {
                            $table->increments('id');
                            $table->string('run_type', 16);
                            $table->integer('domain_id');
                            $table->string('domain_name');
                            $table->integer('client_id');
                            $table->integer('reg_period');
                            $table->decimal('old_amount', 10, 2);
                            $table->decimal('new_amount', 10, 2);
                            $table->decimal('difference', 10, 2);
                            $table->string('status', 32);
                            $table->text('reason')
                                ->nullable();
                            $table->tinyInteger('has_open_invoice')
                                ->default(0);
                            $table->dateTime('created_at');
                        });
                    } else {
                        $logColumns = [
                            'run_type'         => 'string',
                            'domain_id'        => 'integer',
                            'domain_name'      => 'string',
                            'client_id'        => 'integer',
                            'reg_period'       => 'integer',
                            'old_amount'       => 'decimal',
                            'new_amount'       => 'decimal',
                            'difference'       => 'decimal',
                            'status'           => 'string',
                            'reason'           => 'text',
                            'has_open_invoice' => 'tinyInteger',
                            'created_at'       => 'dateTime',
                        ];

                        Capsule::schema()->table('mod_spdomainpricesync_log', function ($table) use ($logColumns) {
                            foreach ($logColumns as $col => $type) {
                                if (! Capsule::schema()->hasColumn('mod_spdomainpricesync_log', $col)) {
                                    if ($type === 'string') {
                                        $table->string($col, ($col === 'run_type' ? 16 : ($col === 'status' ? 32 : 255)));
                                    } elseif ($type === 'integer') {
                                        $table->integer($col);
                                    } elseif ($type === 'decimal') {
                                        $table->decimal($col, 10, 2);
                                    } elseif ($type === 'text') {
                                        $table->text($col)
                                            ->nullable();
                                    } elseif ($type === 'tinyInteger') {
                                        $table->tinyInteger($col)
                                            ->default(0);
                                    } elseif ($type === 'dateTime') {
                                        $table->dateTime($col);
                                    }
                                }
                            }
                        });
                    }

                    // Seed settings table defaults again
                    $defaultSettings = [
                        'status_filter'         => 'Active',
                        'exclude_client_ids'    => '',
                        'exclude_domain_ids'    => '',
                        'exclude_tlds'          => '',
                        'skip_promo_domains'    => 'yes',
                        'skip_free_domains'     => 'yes',
                        'allow_price_decreases' => 'yes',
                        'show_only_changes'     => 'no',
                        'enable_transparency'   => 'no',
                        'guest_footer_links'    => '[]',
                        'enable_client_logs'    => 'no',
                        'clientarea_template'   => 'auto',
                    ];

                    foreach ($defaultSettings as $key => $val) {
                        if (! Capsule::table('mod_spdomainpricesync_settings')->where('setting_key', $key)
                            ->exists()) {
                            Capsule::table('mod_spdomainpricesync_settings')->insert([
                                'setting_key'   => $key,
                                'setting_value' => $val,
                            ]);
                        }
                    }

                    // Seed Email Templates again if missing
                    if (Capsule::schema()->hasTable('tblemailtemplates')) {
                        $templates = [
                            [
                                'type'    => 'domain',
                                'name'    => 'Domain Price Sync Increase',
                                'subject' => 'Domain Renewal Price Adjustment: {$domain_name}',
                                'message' => 'We are writing to inform you of an upcoming price adjustment for the renewal of your domain.<br /><br />This adjustment is driven by our automated pricing system, which dynamically synchronizes domain rates with the current wholesale prices of our connected registrars. Due to a price increase for this domain extension (TLD) from our registry partners, we must adjust our renewal fee accordingly.<br /><br />Adjustment details:<br />Domain: {$domain_name}<br />Previous renewal price: {$old_price} / year<br />New renewal price: {$new_price} / year<br />Effective date: {$next_due_date}<br /><br />Please note that this price adjustment will only take effect on the specified date upon your next regular domain renewal. No additional charges will apply to your currently running registration period.<br /><br />Your options:<br />If you agree to the new renewal price, no action is required on your part. The domain will automatically renew on {$next_due_date} at the adjusted rate.<br /><br />If you do not agree to the price adjustment, you can cancel the domain registration at any time before the renewal date through our client area. The domain will then expire at the end of the current term, and no further fees will be charged.',
                                'custom'  => '1',
                            ],
                            [
                                'type'    => 'domain',
                                'name'    => 'Domain Price Sync Decrease',
                                'subject' => 'Domain Renewal Price Reduced: {$domain_name}',
                                'message' => 'We are pleased to inform you that the renewal price for your domain has been reduced.<br /><br />This reduction is made possible by our automated pricing system, which dynamically synchronizes domain rates with the pricing of our connected registrars. Based on lower costs for this domain extension (TLD) from our partners, we have adjusted our renewal fee accordingly.<br /><br />Reduction details:<br />Domain: {$domain_name}<br />Previous renewal price: {$old_price} / year<br />New renewal price: {$new_price} / year<br />Effective date: {$next_due_date}<br /><br />This reduced price will automatically apply to your next domain renewal on {$next_due_date}. No action is required from you to benefit from the lower rate.',
                                'custom'  => '1',
                            ],
                        ];

                        foreach ($templates as $tpl) {
                            if (! Capsule::table('tblemailtemplates')->where('name', $tpl['name'])
                                ->exists()) {
                                Capsule::table('tblemailtemplates')->insert($tpl);
                            }
                        }
                    }

                    echo '<div class="successbox"><strong>' . htmlspecialchars($l['TXT_HEALTH_REPAIR_SUCCESS']) . '</strong></div>';
                } catch (\Exception $e) {
                    echo '<div class="errorbox"><strong>' . htmlspecialchars(str_replace('{message}', $e->getMessage(), $l['TXT_ERROR_DB_REPAIR'])) . '</strong></div>';
                }
            }

            // Save Settings Tab
            if ($tab === 'settings' && ($_POST['action'] ?? '') === 'save_settings') {
                $fieldsToSave = [
                    'status_filter',
                    'exclude_client_ids',
                    'exclude_domain_ids',
                    'exclude_tlds',
                    'skip_promo_domains',
                    'skip_free_domains',
                    'allow_price_decreases',
                    'show_only_changes',
                    'enable_transparency',
                    'enable_client_logs',
                    'clientarea_template',
                ];

                $availableTemplates = spDomainPriceSync_getAvailableTemplates();

                foreach ($fieldsToSave as $field) {
                    $postedVal = (string) ($_POST[$field] ?? '');
                    if ($field === 'skip_promo_domains' || $field === 'skip_free_domains' || $field === 'show_only_changes' || $field === 'allow_price_decreases' || $field === 'enable_transparency' || $field === 'enable_client_logs') {
                        $postedVal = ($postedVal === 'yes') ? 'yes' : 'no';
                    } elseif ($field === 'clientarea_template') {
                        if ($postedVal !== 'auto' && ! in_array($postedVal, $availableTemplates, true)) {
                            $postedVal = 'auto';
                        }
                    }
                    $engine->setSetting($field, $postedVal);
                }

                // Handle guest footer links JSON save
                $footerLabels = $_POST['footer_link_label'] ?? [];
                $footerUrls   = $_POST['footer_link_url'] ?? [];
                $footerLinks  = [];
                foreach ($footerLabels as $idx => $label) {
                    $label = trim($label);
                    $url   = trim($footerUrls[$idx] ?? '');
                    if ($label !== '' && $url !== '') {
                        $footerLinks[] = ['label' => $label, 'url' => $url];
                    }
                }
                $engine->setSetting('guest_footer_links', json_encode($footerLinks));

                echo '<div class="successbox"><strong>' . htmlspecialchars($l['TXT_SETTINGS_SAVED']) . '</strong></div>';
            }

            // Clear Logs Action
            if ($tab === 'logs' && ($_POST['action'] ?? '') === 'clear_logs') {
                try {
                    if (Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                        Capsule::table('mod_spdomainpricesync_log')->delete();
                        echo '<div class="successbox"><strong>' . htmlspecialchars($l['TXT_LOGS_DELETED']) . '</strong></div>';
                    }
                } catch (\Exception $e) {
                    echo '<div class="errorbox"><strong>' . htmlspecialchars(str_replace('{message}', $e->getMessage(), $l['TXT_ERROR_CLEARING_LOGS'])) . '</strong></div>';
                }
            }
        }

        // Render Page Layout
        $renderer->renderHeader($tab);

        if ($tab === 'sync') {
            $syncResults = null;
            $runType     = '';

            if ($isPost && $csrfValid) {
                $actionType = (string) ($_POST['action_type'] ?? '');

                $selectedDomains = isset($_POST['selected_domains']) ? array_map('intval', $_POST['selected_domains']) : [];
                $hasSelection    = (int) ($_POST['has_selection'] ?? 0);

                if ($actionType === 'dry_run') {
                    $runType     = 'dry_run';
                    $syncResults = $engine->executeSync('dry_run');

                    // Display response banner
                    $successMsg = str_replace(
                        ['{total}', '{updates}', '{skipped}', '{errors}'],
                        [(string) $syncResults['total'], (string) $syncResults['updates'], (string) $syncResults['skipped'], (string) $syncResults['errors']],
                        $l['TXT_DRY_RUN_COMPLETED']
                    );
                    echo '<div class="successbox"><strong>' . htmlspecialchars($successMsg) . '</strong></div>';

                } elseif ($actionType === 'live_sync') {
                    $confirmLive = (int) ($_POST['confirm_live'] ?? 0);
                    if ($confirmLive === 1) {
                        if ($hasSelection === 1 && empty($selectedDomains)) {
                            echo '<div class="errorbox"><strong>' . htmlspecialchars($l['ERROR_NO_DOMAINS_SELECTED']) . '</strong></div>';
                        } else {
                            $runType     = 'live';
                            $syncResults = $engine->executeSync('live', $selectedDomains);

                            $successMsg = str_replace(
                                ['{total}', '{updates}', '{skipped}', '{errors}'],
                                [(string) $syncResults['total'], (string) $syncResults['updates'], (string) $syncResults['skipped'], (string) $syncResults['errors']],
                                $l['TXT_LIVE_SYNC_COMPLETED']
                            );
                            echo '<div class="successbox"><strong>' . htmlspecialchars($successMsg) . '</strong></div>';
                        }
                    }
                }
            }

            $renderer->renderSyncTab($csrfToken, $syncResults, $runType);

        } elseif ($tab === 'logs') {
            $logs           = [];
            $clientIdFilter = isset($_GET['client_id']) ? (int) $_GET['client_id'] : 0;
            try {
                if (Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                    $query = Capsule::table('mod_spdomainpricesync_log');
                    if ($clientIdFilter > 0) {
                        $query->where('client_id', $clientIdFilter);
                    }
                    $dbLogs = $query->orderBy('id', 'desc')
                        ->limit(200)
                        ->get();

                    foreach ($dbLogs as $row) {
                        $logs[] = [
                            'created_at'  => (string) $row->created_at,
                            'run_type'    => (string) $row->run_type,
                            'domain_name' => (string) $row->domain_name,
                            'client_id'   => (int) $row->client_id,
                            'reg_period'  => (int) $row->reg_period,
                            'old_amount'  => (float) $row->old_amount,
                            'new_amount'  => (float) $row->new_amount,
                            'difference'  => (float) $row->difference,
                            'status'      => (string) $row->status,
                            'reason'      => (string) $row->reason,
                        ];
                    }
                }
            } catch (\Exception $e) {
                // Ignore DB error
            }

            $renderer->renderLogsTab($csrfToken, $logs);

        } elseif ($tab === 'settings') {
            $templateMap = [
                'Domain Price Sync Increase' => [
                    'id'        => 0,
                    'name'      => 'Domain Price Sync Increase',
                    'label_key' => 'EMAIL_TPL_INCREASE_LABEL',
                ],
                'Domain Price Sync Decrease' => [
                    'id'        => 0,
                    'name'      => 'Domain Price Sync Decrease',
                    'label_key' => 'EMAIL_TPL_DECREASE_LABEL',
                ],
            ];

            try {
                if (Capsule::schema()->hasTable('tblemailtemplates')) {
                    $tplRows = Capsule::table('tblemailtemplates')
                        ->whereIn('name', array_keys($templateMap))
                        ->select('id', 'name')
                        ->get();
                    foreach ($tplRows as $tplRow) {
                        $tplName = (string) $tplRow->name;
                        if (isset($templateMap[$tplName])) {
                            $templateMap[$tplName]['id'] = (int) $tplRow->id;
                        }
                    }
                }
            } catch (\Exception $e) {
                // Keep default 0 IDs if lookup fails
            }

            $systemUrl = '';
            try {
                $systemUrl = rtrim((string) (Capsule::table('tblconfiguration')->where('setting', 'SystemURL')
                    ->value('value') ?? ''), '/');
            } catch (\Exception $e) {
                $systemUrl = '';
            }

            $baseClientUrl  = ($systemUrl !== '') ? ($systemUrl . '/') : '../';
            $activeWhmcsTpl = spDomainPriceSync_getActiveWhmcsTemplate();
            $settingsExtras = [
                'email_templates'     => array_values($templateMap),
                'private_page_url'    => $baseClientUrl . 'index.php?m=spDomainPriceSync',
                'public_page_url'     => $baseClientUrl . 'index.php?m=spDomainPriceSync&action=transparency',
                'available_templates' => spDomainPriceSync_getAvailableTemplates(),
                'detected_template'   => $activeWhmcsTpl,
                'resolved_template'   => spDomainPriceSync_resolveTemplateName('auto'),
            ];

            $renderer->renderSettingsTab($csrfToken, $engine, $settingsExtras);

        } elseif ($tab === 'help') {
            $renderer->renderHelp();
        } elseif ($tab === 'health') {
            $checks = spDomainPriceSync_runHealthCheck();
            $renderer->renderHealthCheck($csrfToken, $checks);
        }

        $renderer->renderFooter();
    }

}

if (! function_exists('spDomainPriceSync_clientarea')) {

    function spDomainPriceSync_clientarea(array $vars) : array
    {

        $l        = array_merge(spDomainPriceSync_lang(), $vars['_lang'] ?? []);
        $clientId = (int) WHMCS\Session::get('uid');
        $action   = (string) ($_GET['action'] ?? '');

        $configuredTemplate = 'auto';
        try {
            $dbTemplate = Capsule::table('mod_spdomainpricesync_settings')
                ->where('setting_key', 'clientarea_template')
                ->value('setting_value');
            if (is_string($dbTemplate) && $dbTemplate !== '') {
                $configuredTemplate = $dbTemplate;
            }
        } catch (\Exception $e) {
            $configuredTemplate = 'auto';
        }
        $clientAreaTpl   = spDomainPriceSync_resolveTemplate($configuredTemplate, 'clientarea');
        $transparencyTpl = spDomainPriceSync_resolveTemplate($configuredTemplate, 'transparency');

        if ($action === 'transparency') {
            // Guest logic (unlogged user) / Transparency page
            // 1. Check if transparency page is enabled in settings
            $enabled = 'no';
            try {
                $enabled = Capsule::table('mod_spdomainpricesync_settings')
                    ->where('setting_key', 'enable_transparency')
                    ->value('setting_value') ?? 'no';
            } catch (\Exception $e) {
                // Default to no
            }

            if ($enabled !== 'yes') {
                if ($clientId > 0) {
                    header('Location: index.php');
                    exit;
                }
                return [
                    'pagetitle'    => $l['CLIENT_TITLE'],
                    'breadcrumb'   => [
                        'index.php?m=spDomainPriceSync' => $l['CLIENT_TITLE'],
                    ],
                    'templatefile' => $clientAreaTpl,
                    'requirelogin' => true,
                ];
            }

            // 2. Fetch statistics
            $lastSync      = null;
            $increaseCount = 0;
            $decreaseCount = 0;
            $tldStats      = [];

            try {
                if (Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                    // Last sync date (live run)
                    $lastSync = Capsule::table('mod_spdomainpricesync_log')
                        ->where('run_type', 'live')
                        ->orderBy('id', 'desc')
                        ->value('created_at');

                    // Counts of actual updates
                    $increaseCount = (int) Capsule::table('mod_spdomainpricesync_log')
                        ->where('run_type', 'live')
                        ->where('status', 'updated')
                        ->where('difference', '>', 0)
                        ->count();

                    $decreaseCount = (int) Capsule::table('mod_spdomainpricesync_log')
                        ->where('run_type', 'live')
                        ->where('status', 'updated')
                        ->where('difference', '<', 0)
                        ->count();

                    // TLD Stats
                    $rawLogs = Capsule::table('mod_spdomainpricesync_log')
                        ->where('run_type', 'live')
                        ->where('status', 'updated')
                        ->orderBy('id', 'desc')
                        ->limit(5000)
                        ->get(['domain_name', 'difference']);

                    foreach ($rawLogs as $log) {
                        $domain = strtolower($log->domain_name);
                        $dotPos = strpos($domain, '.');
                        $tld    = $dotPos !== false ? substr($domain, $dotPos) : '.other';

                        if (! isset($tldStats[$tld])) {
                            $tldStats[$tld] = [
                                'increases' => 0,
                                'decreases' => 0,
                            ];
                        }

                        if ((float) $log->difference > 0) {
                            $tldStats[$tld]['increases']++;
                        } elseif ((float) $log->difference < 0) {
                            $tldStats[$tld]['decreases']++;
                        }
                    }

                    // Calculate TLD stats as percentages to keep absolute counts private
                    foreach ($tldStats as $tld => $data) {
                        $tldTotal = $data['increases'] + $data['decreases'];
                        if ($tldTotal > 0) {
                            $tldStats[$tld]['increases_percent'] = round(($data['increases'] / $tldTotal) * 100, 1);
                            $tldStats[$tld]['decreases_percent'] = round(($data['decreases'] / $tldTotal) * 100, 1);
                        } else {
                            $tldStats[$tld]['increases_percent'] = 0.0;
                            $tldStats[$tld]['decreases_percent'] = 0.0;
                        }
                    }

                    // Sort TLDs alphabetically
                    ksort($tldStats);
                }
            } catch (\Exception $e) {
                // DB fail fallback
            }

            // Calculate percentages
            $totalUpdates    = $increaseCount + $decreaseCount;
            $increasePercent = 0.0;
            $decreasePercent = 0.0;
            if ($totalUpdates > 0) {
                $increasePercent = round(($increaseCount / $totalUpdates) * 100, 1);
                $decreasePercent = round(($decreaseCount / $totalUpdates) * 100, 1);
            }

            // 3. Footer links & Company name
            $footerLinksJson = '[]';
            $companyName     = '';
            try {
                $footerLinksJson = Capsule::table('mod_spdomainpricesync_settings')
                    ->where('setting_key', 'guest_footer_links')
                    ->value('setting_value') ?? '[]';

                $companyName = Capsule::table('tblconfiguration')->where('setting', 'CompanyName')
                    ->value('value') ?? '';
            } catch (\Exception $e) {
                // Fallback
            }

            $footerLinks = json_decode($footerLinksJson, true) ?: [];

            return [
                'pagetitle'    => $l['GUEST_PAGE_TITLE'],
                'breadcrumb'   => [
                    'index.php?m=spDomainPriceSync&action=transparency' => $l['GUEST_PAGE_TITLE'],
                ],
                'templatefile' => $transparencyTpl,
                'requirelogin' => false,
                'vars'         => [
                    'l'                => $l,
                    'last_sync'        => $lastSync ? date('d.m.Y H:i:s', strtotime($lastSync)) : null,
                    'increase_count'   => $increaseCount,
                    'decrease_count'   => $decreaseCount,
                    'increase_percent' => $increasePercent,
                    'decrease_percent' => $decreasePercent,
                    'tld_stats'        => $tldStats,
                    'footerLinks'      => $footerLinks,
                    'companyName'      => $companyName,
                ],
            ];
        }

        // Default: Logged-in Customer Area
        $clientLogsEnabled   = 'no';
        $transparencyEnabled = 'no';
        try {
            $clientLogsEnabled = Capsule::table('mod_spdomainpricesync_settings')
                ->where('setting_key', 'enable_client_logs')
                ->value('setting_value') ?? 'no';

            $transparencyEnabled = Capsule::table('mod_spdomainpricesync_settings')
                ->where('setting_key', 'enable_transparency')
                ->value('setting_value') ?? 'no';
        } catch (\Exception $e) {
            // Default to no
        }

        if ($clientLogsEnabled !== 'yes') {
            if ($clientId > 0) {
                header('Location: index.php');
                exit;
            }
            return [
                'pagetitle'    => $l['CLIENT_TITLE'],
                'breadcrumb'   => [
                    'index.php?m=spDomainPriceSync' => $l['CLIENT_TITLE'],
                ],
                'templatefile' => $clientAreaTpl,
                'requirelogin' => true,
            ];
        }

        $exportLogs = [];
        try {
            if (Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
                $exportLogs = Capsule::table('mod_spdomainpricesync_log')
                    ->where('client_id', $clientId)
                    ->where('run_type', 'live')
                    ->where('status', 'updated')
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
        } catch (\Exception $e) {
            // Ignore DB error
        }

        return [
            'pagetitle'    => $l['CLIENT_TITLE'],
            'breadcrumb'   => [
                'index.php?m=spDomainPriceSync' => $l['CLIENT_TITLE'],
            ],
            'templatefile' => $clientAreaTpl,
            'requirelogin' => true,
            'vars'         => [
                'l'                   => $l,
                'clientLogsEnabled'   => $clientLogsEnabled,
                'transparencyEnabled' => $transparencyEnabled,
                'exportLogs'          => $exportLogs,
            ],
        ];
    }

}
