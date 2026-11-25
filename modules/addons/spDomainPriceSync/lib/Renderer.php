<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * Renderer class to build HTML layouts for settings tabs,
 * health checks, engine status, and sync logging tables.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

require_once __DIR__ . '/Views/SPDSStylesTrait.php';

if (! class_exists('SpDomainPriceSyncRenderer')) {

    class SpDomainPriceSyncRenderer
    {

        use SPDSStylesTrait;

        private array  $lang;

        private string $moduleLink;

        public function __construct(array $lang, string $moduleLink)
        {

            $this->lang       = $lang;
            $this->moduleLink = $moduleLink;
        }

        /**
         * Retrieve localized language string by key.
         */
        private function l(string $key) : string
        {

            return $this->lang[$key];
        }

        /**
         * Render common module interface header with CSS injection and tab bar.
         */
        public function renderHeader(string $activeTab) : void
        {

            $this->renderStyles();

            echo '<div class="dddp-wrapper">';
            echo '<div class="dddp-header">';
            echo '<h1 class="dddp-title"><i class="fas fa-sync-alt"></i> ' . htmlspecialchars($this->l('TITLE')) . '</h1>';
            echo '</div>';

            echo '<div class="dddp-tabs">';

            $tabs = [
                'sync'     => ['icon' => 'fa-play-circle', 'lang' => 'TAB_SYNC'],
                'logs'     => ['icon' => 'fa-list-alt', 'lang' => 'TAB_LOGS'],
                'settings' => ['icon' => 'fa-sliders-h', 'lang' => 'TAB_SETTINGS'],
                'health'   => ['icon' => 'fa-heartbeat', 'lang' => 'TAB_HEALTH'],
                'help'     => ['icon' => 'fa-question-circle', 'lang' => 'TAB_HELP'],
            ];

            foreach ($tabs as $key => $tabInfo) {
                $active = ($activeTab === $key) ? ' active' : '';
                echo '<a href="' . $this->moduleLink . '&tab=' . $key . '" class="dddp-tab-btn' . $active . '">';
                echo '<i class="fas ' . $tabInfo['icon'] . '"></i> ' . htmlspecialchars($this->l($tabInfo['lang']));
                echo '</a>';
            }

            echo '</div>';
        }

        /**
         * Render the Price Sync Engine action tab.
         */
        public function renderSyncTab(string $csrfToken, ?array $results = null, string $runType = '') : void
        {

            echo '<div class="dddp-card">';
            echo '<p>' . htmlspecialchars($this->l('DESCRIPTION')) . '</p>';

            echo '<form method="post" action="' . $this->moduleLink . '&tab=sync" style="margin-top: 20px;">';
            echo '<input type="hidden" name="csrf_token" value="' . $csrfToken . '">';

            if ($results !== null) {
                echo '<input type="hidden" name="has_selection" value="1">';

                echo '<div class="dddp-confirm-box">';
                echo '<input type="checkbox" id="confirm_live" class="dddp-confirm-checkbox" name="confirm_live" value="1">';
                echo '<label for="confirm_live" class="dddp-confirm-label">';
                echo htmlspecialchars($this->l('TXT_CONFIRM_ACTION'));
                echo '</label>';
                echo '</div>';
            }

            echo '<div style="display:flex; gap: 12px; flex-wrap: wrap;">';
            echo '<button type="submit" name="action_type" value="dry_run" class="dddp-btn dddp-btn-secondary">';
            echo '<i class="fas fa-search"></i> ' . htmlspecialchars($this->l('BTN_RUN_DRY_RUN'));
            echo '</button>';

            if ($results !== null) {
                echo '<button type="submit" name="action_type" value="live_sync" class="dddp-btn dddp-btn-danger" id="liveSyncBtn">';
                echo '<i class="fas fa-play"></i> ' . htmlspecialchars($this->l('BTN_RUN_LIVE_SYNC'));
                echo '</button>';
            }
            echo '</div>';
            echo '</div>'; // Close dddp-card

            if ($results !== null) {
                $this->renderSyncResults($results, $runType);
            }
            echo '</form>';

            // Javascript protection to ensure live sync confirmation check
            echo '
            <script>
                var liveBtn = document.getElementById("liveSyncBtn");
                if (liveBtn) {
                    liveBtn.addEventListener("click", function(e) {
                        var cb = document.getElementById("confirm_live");
                        if (!cb.checked) {
                            alert(' . json_encode($this->l('TXT_CONFIRM_CHECKBOX_REQUIRED')) . ');
                            e.preventDefault();
                            return false;
                        }
                        if (!confirm(' . json_encode($this->l('TXT_CONFIRM_LIVE')) . ')) {
                            e.preventDefault();
                            return false;
                        }
                    });
                }
            </script>
            ';
        }

        /**
         * Render the statistics and table output of the sync run.
         */
        private function renderSyncResults(array $results, string $runType) : void
        {

            $isDry = ($runType === 'dry_run');

            // Warnings/Notice header
            if ($isDry) {
                echo '<div class="alert alert-warning" style="margin-bottom: 24px; border-left: 5px solid #f59e0b;">';
                echo '<strong><i class="fas fa-exclamation-triangle"></i> ' . htmlspecialchars($this->l('TXT_DRY_RUN_WARNING')) . '</strong>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-info" style="margin-bottom: 24px; border-left: 5px solid #3b82f6;">';
                echo '<strong><i class="fas fa-info-circle"></i> ' . htmlspecialchars($this->l('TXT_LIVE_SYNC_WARNING')) . '</strong>';
                echo '</div>';
            }

            // Stats grid
            echo '<div class="dddp-stats-grid">';

            echo '<div class="dddp-stat-card">';
            echo '<span class="dddp-stat-title">' . htmlspecialchars($this->l('TXT_STATS_DOMAINS_COLLECTED')) . '</span>';
            echo '<span class="dddp-stat-value">' . (int) $results['total'] . '</span>';
            echo '</div>';

            echo '<div class="dddp-stat-card">';
            echo '<span class="dddp-stat-title">' . htmlspecialchars($isDry ? $this->l('TXT_STATS_PRICE_CHANGES') : $this->l('TXT_STATS_UPDATED')) . '</span>';
            echo '<span class="dddp-stat-value">' . (int) $results['updates'] . '</span>';
            echo '</div>';

            echo '<div class="dddp-stat-card">';
            echo '<span class="dddp-stat-title">' . htmlspecialchars($this->l('TXT_STATS_TOTAL_DIFFERENCE')) . '</span>';
            $diffValue = (float) $results['revenue_diff'];
            $diffSign  = ($diffValue >= 0.0) ? '+' : '';
            $diffColor = ($diffValue >= 0.0) ? '#059669' : '#dc2626';
            echo '<span class="dddp-stat-value" style="color: ' . $diffColor . ';">' . $diffSign . number_format($diffValue, 2) . '</span>';
            echo '</div>';

            echo '<div class="dddp-stat-card">';
            echo '<span class="dddp-stat-title">' . htmlspecialchars($this->l('TXT_STATS_ERRORS')) . '</span>';
            echo '<span class="dddp-stat-value" style="color: ' . ($results['errors'] > 0 ? '#ef4444' : '#64748b') . ';">' . (int) $results['errors'] . '</span>';
            echo '</div>';

            echo '</div>'; // End stats grid

            // Results Table
            echo '<div class="dddp-card">';
            echo '<table class="dddp-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th style="width: 40px; text-align: center;"><input type="checkbox" id="select_all_domains" checked onclick="toggleSelectAllDomains(this);"></th>';
            echo '<th>' . htmlspecialchars($this->l('TH_DOMAIN')) . '</th>';
            echo '<th>' . htmlspecialchars($this->l('TH_CLIENT')) . '</th>';
            echo '<th style="text-align:center;">' . htmlspecialchars($this->l('TH_REGPERIOD')) . '</th>';
            echo '<th style="text-align:right;">' . htmlspecialchars($this->l('TH_OLD_AMOUNT')) . '</th>';
            echo '<th style="text-align:right;">' . htmlspecialchars($this->l('TH_NEW_AMOUNT')) . '</th>';
            echo '<th style="text-align:right;">' . htmlspecialchars($this->l('TH_DIFFERENCE')) . '</th>';
            echo '<th style="text-align:center;">' . htmlspecialchars($this->l('TH_STATUS')) . '</th>';
            echo '<th>' . htmlspecialchars($this->l('TH_REASON')) . '</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($results['items'] as $item) {
                $rowClass = '';
                if ($item['status'] === 'error') {
                    $rowClass = ' dddp-row-error';
                } elseif ($item['status'] === 'skipped' || $item['status'] === 'skipped_decrease') {
                    $rowClass = ' dddp-row-warning';
                }

                echo '<tr class="' . $rowClass . '">';

                $eligible = ($item['status'] === 'would_update' || $item['status'] === 'updated');
                echo '<td style="text-align: center;">';
                if ($eligible) {
                    echo '<input type="checkbox" class="domain-checkbox" name="selected_domains[]" value="' . (int) $item['domain_id'] . '" checked>';
                } else {
                    echo '<input type="checkbox" disabled>';
                }
                echo '</td>';

                echo '<td><strong>' . htmlspecialchars($item['domain_name']) . '</strong></td>';
                echo '<td><a href="clientssummary.php?userid=' . (int) $item['client_id'] . '" target="_blank">Client #' . (int) $item['client_id'] . '</a></td>';
                echo '<td style="text-align:center;">' . (int) $item['reg_period'] . ' yr(s)</td>';
                echo '<td style="text-align:right;">' . number_format((float) $item['old_amount'], 2) . '</td>';
                echo '<td style="text-align:right;">' . number_format((float) $item['new_amount'], 2) . '</td>';

                $diff      = (float) $item['difference'];
                $diffSign  = ($diff > 0.005) ? '+' : '';
                $diffColor = '#64748b';
                if ($diff > 0.005) {
                    $diffColor = '#059669';
                } elseif ($diff < -0.005) {
                    $diffColor = '#dc2626';
                }
                echo '<td style="text-align:right; font-weight: 600; color: ' . $diffColor . ';">' . $diffSign . number_format($diff, 2) . '</td>';

                // Status badge
                $badgeClass = 'dddp-badge-info';
                if ($item['status'] === 'updated' || $item['status'] === 'would_update') {
                    $badgeClass = 'dddp-badge-success';
                } elseif ($item['status'] === 'skipped' || $item['status'] === 'skipped_decrease') {
                    $badgeClass = 'dddp-badge-warning';
                } elseif ($item['status'] === 'error') {
                    $badgeClass = 'dddp-badge-danger';
                }

                $statusTextKey = 'STATUS_' . strtoupper($item['status']);
                $badgeText     = $this->l($statusTextKey);

                echo '<td style="text-align:center;"><span class="dddp-badge ' . $badgeClass . '">' . htmlspecialchars($badgeText) . '</span></td>';
                echo '<td><small>' . htmlspecialchars($item['reason']) . '</small></td>';
                echo '</tr>';
            }

            if (empty($results['items'])) {
                echo '<tr><td colspan="9" style="text-align:center;">' . htmlspecialchars($this->l('TXT_NO_RESULTS_FOUND')) . '</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            echo '
            <script>
            function toggleSelectAllDomains(master) {
                var checkboxes = document.getElementsByClassName("domain-checkbox");
                for (var i = 0; i < checkboxes.length; i++) {
                    if (!checkboxes[i].disabled) {
                        checkboxes[i].checked = master.checked;
                    }
                }
            }
            </script>
            ';
        }

        /**
         * Render the Sync Logs tab displaying historical database operations.
         */
        public function renderLogsTab(string $csrfToken, array $logs) : void
        {

            $clientIdVal    = isset($_GET['client_id']) ? (int) $_GET['client_id'] : 0;
            $clientIdValStr = ($clientIdVal > 0) ? (string) $clientIdVal : '';

            echo '<div class="dddp-card" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">';
            echo '<div><p style="margin:0;">' . htmlspecialchars($this->l('TXT_LOGS_DESCRIPTION')) . '</p></div>';

            echo '<div style="display:flex; gap:12px;">';
            $exportUrl = '../modules/addons/spDomainPriceSync/export.php';
            if ($clientIdVal > 0) {
                $exportUrl .= '?client_id=' . $clientIdVal;
            }
            echo '<a href="' . $exportUrl . '" target="_blank" class="dddp-btn dddp-btn-secondary"><i class="fas fa-file-csv"></i> ' . htmlspecialchars($this->l('BTN_EXPORT_CSV')) . '</a>';

            echo '<form method="post" action="' . $this->moduleLink . '&tab=logs" onsubmit="return confirm(\'' . htmlspecialchars(addslashes($this->l('TXT_CONFIRM_DELETE_LOGS'))) . '\');">';
            echo '<input type="hidden" name="csrf_token" value="' . $csrfToken . '">';
            echo '<button type="submit" name="action" value="clear_logs" class="dddp-btn dddp-btn-danger"><i class="fas fa-trash"></i> ' . htmlspecialchars($this->l('BTN_DELETE_LOGS')) . '</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';

            // Filter Form
            echo '<div class="dddp-card" style="margin-bottom: 24px;">';
            echo '<form method="get" action="addonmodules.php" style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">';
            echo '<input type="hidden" name="module" value="spDomainPriceSync">';
            echo '<input type="hidden" name="tab" value="logs">';
            echo '<div style="display:flex; align-items:center; gap:8px;">';
            echo '<label for="client_id_filter" style="font-weight:600; margin:0; font-size:14px; color:#334155;">' . htmlspecialchars($this->l('LABEL_FILTER_CLIENT_ID')) . ':</label>';
            echo '<input type="number" id="client_id_filter" name="client_id" class="dddp-form-control" style="width:140px; padding: 6px 12px;" value="' . $clientIdValStr . '" placeholder="Client ID">';
            echo '</div>';
            echo '<button type="submit" class="dddp-btn dddp-btn-primary" style="padding: 7px 16px; font-size: 13px;"><i class="fas fa-search"></i> ' . htmlspecialchars($this->l('BTN_FILTER')) . '</button>';
            if ($clientIdVal > 0) {
                echo '<a href="' . $this->moduleLink . '&tab=logs" class="dddp-btn dddp-btn-secondary" style="padding: 7px 16px; font-size: 13px;"><i class="fas fa-times"></i> ' . htmlspecialchars($this->l('BTN_RESET_FILTER')) . '</a>';
            }
            echo '</form>';
            echo '</div>';

            echo '<div class="dddp-card">';
            echo '<table class="dddp-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>' . htmlspecialchars($this->l('TH_DATE')) . '</th>';
            echo '<th>' . htmlspecialchars($this->l('TH_RUN_TYPE')) . '</th>';
            echo '<th>' . htmlspecialchars($this->l('TH_DOMAIN')) . '</th>';
            echo '<th>' . htmlspecialchars($this->l('TH_CLIENT')) . '</th>';
            echo '<th style="text-align:center;">' . htmlspecialchars($this->l('TH_REGPERIOD')) . '</th>';
            echo '<th style="text-align:right;">' . htmlspecialchars($this->l('TH_OLD_AMOUNT')) . '</th>';
            echo '<th style="text-align:right;">' . htmlspecialchars($this->l('TH_NEW_AMOUNT')) . '</th>';
            echo '<th style="text-align:right;">' . htmlspecialchars($this->l('TH_DIFFERENCE')) . '</th>';
            echo '<th style="text-align:center;">' . htmlspecialchars($this->l('TH_STATUS')) . '</th>';
            echo '<th>' . htmlspecialchars($this->l('TH_REASON')) . '</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($logs as $log) {
                $rowClass = '';
                if ($log['status'] === 'error') {
                    $rowClass = ' dddp-row-error';
                } elseif ($log['status'] === 'skipped' || $log['status'] === 'skipped_decrease') {
                    $rowClass = ' dddp-row-warning';
                }

                echo '<tr class="' . $rowClass . '">';
                echo '<td><small>' . htmlspecialchars($log['created_at']) . '</small></td>';
                echo '<td><span class="dddp-badge ' . ($log['run_type'] === 'live' ? 'dddp-badge-danger' : 'dddp-badge-info') . '">' . htmlspecialchars($log['run_type']) . '</span></td>';
                echo '<td><strong>' . htmlspecialchars($log['domain_name']) . '</strong></td>';
                echo '<td><a href="clientssummary.php?userid=' . (int) $log['client_id'] . '" target="_blank">Client #' . (int) $log['client_id'] . '</a></td>';
                echo '<td style="text-align:center;">' . (int) $log['reg_period'] . ' yr(s)</td>';
                echo '<td style="text-align:right;">' . number_format((float) $log['old_amount'], 2) . '</td>';
                echo '<td style="text-align:right;">' . number_format((float) $log['new_amount'], 2) . '</td>';

                $diff      = (float) $log['difference'];
                $diffSign  = ($diff > 0.005) ? '+' : '';
                $diffColor = '#64748b';
                if ($diff > 0.005) {
                    $diffColor = '#059669';
                } elseif ($diff < -0.005) {
                    $diffColor = '#dc2626';
                }
                echo '<td style="text-align:right; font-weight: 600; color: ' . $diffColor . ';">' . $diffSign . number_format($diff, 2) . '</td>';

                // Status badge
                $badgeClass = 'dddp-badge-info';
                if ($log['status'] === 'updated' || $log['status'] === 'would_update') {
                    $badgeClass = 'dddp-badge-success';
                } elseif ($log['status'] === 'skipped' || $log['status'] === 'skipped_decrease') {
                    $badgeClass = 'dddp-badge-warning';
                } elseif ($log['status'] === 'error') {
                    $badgeClass = 'dddp-badge-danger';
                }

                $statusTextKey = 'STATUS_' . strtoupper($log['status']);
                $badgeText     = $this->l($statusTextKey);

                echo '<td style="text-align:center;"><span class="dddp-badge ' . $badgeClass . '">' . htmlspecialchars($badgeText) . '</span></td>';
                echo '<td><small>' . htmlspecialchars($log['reason']) . '</small></td>';
                echo '</tr>';
            }

            if (empty($logs)) {
                echo '<tr><td colspan="10" style="text-align:center;">' . htmlspecialchars($this->l('TXT_NO_LOGS_FOUND')) . '</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }

        /**
         * Render Settings tab form to update engine configurations, email template shortcuts, and page preview links.
         */
        public function renderSettingsTab(string $csrfToken, SpDomainPriceSyncEngine $engine, array $settingsExtras = []) : void
        {

            echo '<div class="dddp-card">';
            echo '<form method="post" action="' . $this->moduleLink . '&tab=settings">';
            echo '<input type="hidden" name="csrf_token" value="' . $csrfToken . '">';

            $fields = [
                'status_filter'         => [
                    'label' => 'LABEL_STATUS_FILTER',
                    'desc'  => 'DESC_STATUS_FILTER',
                    'type'  => 'text',
                ],
                'exclude_client_ids'    => [
                    'label' => 'LABEL_EXCLUDE_CLIENTS',
                    'desc'  => 'DESC_EXCLUDE_CLIENTS',
                    'type'  => 'text',
                ],
                'exclude_domain_ids'    => [
                    'label' => 'LABEL_EXCLUDE_DOMAINS',
                    'desc'  => 'DESC_EXCLUDE_DOMAINS',
                    'type'  => 'text',
                ],
                'exclude_tlds'          => [
                    'label' => 'LABEL_EXCLUDE_TLDS',
                    'desc'  => 'DESC_EXCLUDE_TLDS',
                    'type'  => 'text',
                ],
                'skip_promo_domains'    => [
                    'label' => 'LABEL_SKIP_PROMO',
                    'desc'  => 'DESC_SKIP_PROMO',
                    'type'  => 'checkbox',
                ],
                'skip_free_domains'     => [
                    'label' => 'LABEL_SKIP_FREE',
                    'desc'  => 'DESC_SKIP_FREE',
                    'type'  => 'checkbox',
                ],
                'allow_price_decreases' => [
                    'label' => 'LABEL_ALLOW_DECREASES',
                    'desc'  => 'DESC_ALLOW_DECREASES',
                    'type'  => 'checkbox',
                ],
                'show_only_changes'     => [
                    'label' => 'LABEL_SHOW_ONLY_CHANGES',
                    'desc'  => 'DESC_SHOW_ONLY_CHANGES',
                    'type'  => 'checkbox',
                ],
                'enable_client_logs'    => [
                    'label' => 'LABEL_ENABLE_CLIENT_LOGS',
                    'desc'  => 'DESC_ENABLE_CLIENT_LOGS',
                    'type'  => 'checkbox',
                ],
                'clientarea_template'   => [
                    'label' => 'LABEL_CLIENTAREA_TEMPLATE',
                    'desc'  => 'DESC_CLIENTAREA_TEMPLATE',
                    'type'  => 'template_select',
                ],
            ];

            $availableTemplates = $settingsExtras['available_templates'] ?? ['six'];
            $detectedTemplate   = (string) ($settingsExtras['detected_template'] ?? 'six');
            $resolvedTemplate   = (string) ($settingsExtras['resolved_template'] ?? 'six');

            foreach ($fields as $key => $meta) {
                $val = $engine->getSetting($key);

                echo '<div class="dddp-form-group">';
                echo '<label class="dddp-form-label" for="' . htmlspecialchars($key) . '">' . htmlspecialchars($this->l($meta['label'])) . '</label>';

                if ($meta['type'] === 'text') {
                    echo '<input type="text" class="dddp-form-control" id="' . htmlspecialchars($key) . '" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($val) . '">';
                } elseif ($meta['type'] === 'checkbox') {
                    $checked = ($val === 'yes') ? ' checked' : '';
                    echo '<div style="display:flex; align-items:center; gap:8px; margin-top: 6px;">';
                    echo '<input type="checkbox" id="' . htmlspecialchars($key) . '" name="' . htmlspecialchars($key) . '" value="yes"' . $checked . ' style="width:18px; height:18px; cursor:pointer;">';
                    echo '<span style="font-size:13px; color:#475569;">' . htmlspecialchars($this->l('TXT_CHECKBOX_ENABLE')) . '</span>';
                    echo '</div>';
                } elseif ($meta['type'] === 'template_select') {
                    $selectedVal = ($val !== '') ? $val : 'auto';
                    $autoLabel   = str_replace(
                        ['{whmcs_tpl}', '{resolved_tpl}'],
                        [$detectedTemplate, $resolvedTemplate],
                        $this->l('OPTION_TEMPLATE_AUTO')
                    );
                    echo '<select class="dddp-form-control" id="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" name="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '">';
                    $autoSel = ($selectedVal === 'auto') ? ' selected' : '';
                    echo '<option value="auto"' . $autoSel . '>' . htmlspecialchars($autoLabel, ENT_QUOTES, 'UTF-8') . '</option>';
                    foreach ($availableTemplates as $tplDir) {
                        $tplDirStr = (string) $tplDir;
                        $sel       = ($selectedVal === $tplDirStr) ? ' selected' : '';
                        $label     = $tplDirStr;
                        if ($tplDirStr === 'six') {
                            $label .= ' ' . $this->l('OPTION_TEMPLATE_DEFAULT_SUFFIX');
                        }
                        echo '<option value="' . htmlspecialchars($tplDirStr, ENT_QUOTES, 'UTF-8') . '"' . $sel . '>' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</option>';
                    }
                    echo '</select>';
                }

                echo '<span class="dddp-form-desc">' . htmlspecialchars($this->l($meta['desc'])) . '</span>';
                echo '</div>';
            }

            // Public Transparency settings
            echo '<style>
            #dddp-footer-links .drag-handle-col { display: none; }
            #dddp-footer-links.is-sortable .drag-handle-col { display: block; }
            #dddp-footer-links .dddp-footer-link-row.dragging { opacity: 0.5; background: #f1f5f9; }
            </style>';

            $enableTransparency = $engine->getSetting('enable_transparency');
            $footerLinksJson    = $engine->getSetting('guest_footer_links') ?: '[]';
            $footerLinks        = json_decode($footerLinksJson, true) ?: [];
            if (empty($footerLinks)) {
                $footerLinks[] = ['label' => '', 'url' => ''];
            }

            echo '<div class="dddp-form-group">';
            echo '<label class="dddp-form-label" for="enable_transparency">' . htmlspecialchars($this->l('LABEL_ENABLE_TRANSPARENCY')) . '</label>';
            $checked = ($enableTransparency === 'yes') ? ' checked' : '';
            echo '<div style="display:flex; align-items:center; gap:8px; margin-top: 6px;">';
            echo '<input type="checkbox" id="enable_transparency" name="enable_transparency" value="yes"' . $checked . ' style="width:18px; height:18px; cursor:pointer;" onchange="toggleTransparencyLinks(this.checked)">';
            echo '<span style="font-size:13px; color:#475569;">' . htmlspecialchars($this->l('TXT_CHECKBOX_ENABLE')) . '</span>';
            echo '</div>';
            echo '<span class="dddp-form-desc">' . htmlspecialchars($this->l('DESC_ENABLE_TRANSPARENCY')) . '</span>';
            echo '</div>';

            $linksStyle = ($enableTransparency === 'yes') ? '' : 'display:none;';
            echo '<div id="transparency-links-panel" style="' . $linksStyle . ' margin-top:20px; border-top:1px solid #e2e8f0; padding-top:20px; width:100%;">';
            echo '<label class="dddp-form-label">' . htmlspecialchars($this->l('LABEL_GUEST_FOOTER_LINKS')) . '</label>';
            echo '<span class="dddp-form-desc" style="margin-bottom:12px; display:block;">' . htmlspecialchars($this->l('DESC_GUEST_FOOTER_LINKS')) . '</span>';

            echo '<div id="dddp-footer-links" style="display:flex; flex-direction:column; gap:8px; margin-bottom:12px; width:100%;">';
            foreach ($footerLinks as $link) {
                echo '<div class="dddp-footer-link-row" style="display:flex; gap:8px; align-items:center; width:100%;">';
                echo '<div class="drag-handle-col" style="cursor: move; padding: 0 4px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-arrows-alt" style="color: #a1a1aa;"></i></div>';
                echo '<input type="text" name="footer_link_label[]" value="' . htmlspecialchars($link['label'] ?? '') . '" class="dddp-form-control" style="flex:1;" placeholder="' . htmlspecialchars($this->l('GUEST_FOOTER_LABEL')) . '">';
                echo '<input type="text" name="footer_link_url[]" value="' . htmlspecialchars($link['url'] ?? '') . '" class="dddp-form-control" style="flex:2;" placeholder="https://...">';
                echo '<button type="button" class="dddp-btn dddp-btn-danger" style="padding:6px 12px; min-width:40px; margin:0;" onclick="removeDddpFooterRow(this);"><i class="fas fa-times"></i></button>';
                echo '</div>';
            }
            echo '</div>';

            echo '<button type="button" class="dddp-btn dddp-btn-secondary" style="padding: 6px 12px; font-size:12px;" onclick="dddpAddFooterLink();"><i class="fas fa-plus"></i> ' . htmlspecialchars($this->l('GUEST_FOOTER_ADD')) . '</button>';
            echo '</div>';

            echo '
            <script>
            var dragRow = null;

            function setupDddpDragAndDrop() {
                var container = document.getElementById("dddp-footer-links");
                if (!container) return;
                var rows = container.querySelectorAll(".dddp-footer-link-row");
                if (rows.length > 1) {
                    container.classList.add("is-sortable");
                } else {
                    container.classList.remove("is-sortable");
                }
                rows.forEach(function(row) {
                    row.setAttribute("draggable", "true");
                    row.ondragstart = function(e) {
                        dragRow = row;
                        row.classList.add("dragging");
                        e.dataTransfer.effectAllowed = "move";
                    };
                    row.ondragend = function() {
                        row.classList.remove("dragging");
                        dragRow = null;
                    };
                    row.ondragover = function(e) {
                        e.preventDefault();
                        e.dataTransfer.dropEffect = "move";
                    };
                    row.ondragenter = function(e) {
                        e.preventDefault();
                        var targetRow = e.target.closest(".dddp-footer-link-row");
                        if (targetRow && targetRow !== dragRow && targetRow.parentNode === container) {
                            var rect = targetRow.getBoundingClientRect();
                            var next = (e.clientY - rect.top) / (rect.bottom - rect.top) > 0.5;
                            container.insertBefore(dragRow, next ? targetRow.nextSibling : targetRow);
                        }
                    };
                });
            }

            function toggleTransparencyLinks(checked) {
                document.getElementById("transparency-links-panel").style.display = checked ? "block" : "none";
            }

            function dddpAddFooterLink() {
                var container = document.getElementById("dddp-footer-links");
                var row = document.createElement("div");
                row.className = "dddp-footer-link-row";
                row.style.display = "flex";
                row.style.gap = "8px";
                row.style.alignItems = "center";
                row.style.width = "100%";
                row.innerHTML = \'<div class="drag-handle-col" style="cursor: move; padding: 0 4px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-arrows-alt" style="color: #a1a1aa;"></i></div>\'
                    + \'<input type="text" name="footer_link_label[]" class="dddp-form-control" style="flex:1;" placeholder="' . htmlspecialchars(addslashes($this->l('GUEST_FOOTER_LABEL'))) . '">\'
                    + \'<input type="text" name="footer_link_url[]" class="dddp-form-control" style="flex:2;" placeholder="https://...">\'
                    + \'<button type="button" class="dddp-btn dddp-btn-danger" style="padding:6px 12px; min-width:40px; margin:0;" onclick="removeDddpFooterRow(this);"><i class="fas fa-times"></i></button>\';
                container.appendChild(row);
                setupDddpDragAndDrop();
            }

            function removeDddpFooterRow(btn) {
                var row = btn.closest(".dddp-footer-link-row");
                if (row) {
                    var container = row.parentNode;
                    if (container.querySelectorAll(".dddp-footer-link-row").length > 1) {
                        row.remove();
                    } else {
                        row.querySelector("input[name=\'footer_link_label[]\']").value = "";
                        row.querySelector("input[name=\'footer_link_url[]\']").value = "";
                    }
                    setupDddpDragAndDrop();
                }
            }

            if (typeof jQuery !== "undefined") {
                jQuery(document).ready(function() {
                    setupDddpDragAndDrop();
                });
            } else {
                document.addEventListener("DOMContentLoaded", function() {
                    setupDddpDragAndDrop();
                });
            }
            </script>
            ';

            echo '<div style="margin-top: 28px;">';
            echo '<button type="submit" name="action" value="save_settings" class="dddp-btn dddp-btn-primary"><i class="fas fa-save"></i> ' . htmlspecialchars($this->l('BTN_SAVE_SETTINGS'), ENT_QUOTES, 'UTF-8') . '</button>';
            echo '</div>';

            echo '</form>';
            echo '</div>';

            // Direct Email Templates Card
            $emailTemplates = $settingsExtras['email_templates'] ?? [];
            echo '<div class="dddp-card">';
            echo '<h3 style="margin-top:0; font-size:18px; font-weight:700; color:#0f172a; display:flex; align-items:center; gap:8px;">';
            echo '<i class="fas fa-envelope-open-text" style="color:#3b82f6;"></i> ';
            echo htmlspecialchars($this->l('EMAIL_TEMPLATES_TITLE'), ENT_QUOTES, 'UTF-8');
            echo '</h3>';
            echo '<p style="font-size:13px; color:#64748b; margin-bottom:18px;">' . htmlspecialchars($this->l('EMAIL_TEMPLATES_DESC'), ENT_QUOTES, 'UTF-8') . '</p>';

            echo '<div style="display:flex; flex-direction:column; gap:12px;">';
            foreach ($emailTemplates as $tpl) {
                $tplId    = (int) ($tpl['id'] ?? 0);
                $tplName  = (string) ($tpl['name'] ?? '');
                $labelKey = (string) ($tpl['label_key'] ?? '');
                $tplLabel = ($labelKey !== '') ? $this->l($labelKey) : $tplName;

                echo '<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; padding:14px 16px; border:1px solid #e2e8f0; border-radius:12px; background-color:#f8fafc;">';
                echo '<div>';
                echo '<div style="font-weight:600; color:#1e293b; font-size:14px;">' . htmlspecialchars($tplLabel, ENT_QUOTES, 'UTF-8') . '</div>';
                echo '<div style="font-size:12px; color:#64748b; margin-top:2px;"><code>' . htmlspecialchars($tplName, ENT_QUOTES, 'UTF-8') . '</code></div>';
                echo '</div>';

                if ($tplId > 0) {
                    $editUrl = 'configemailtemplates.php?action=edit&id=' . $tplId;
                    echo '<a href="' . htmlspecialchars($editUrl, ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener" class="dddp-btn dddp-btn-secondary">';
                    echo '<i class="fas fa-external-link-alt"></i> ' . htmlspecialchars($this->l('BTN_EDIT_EMAIL_TEMPLATE'), ENT_QUOTES, 'UTF-8');
                    echo '</a>';
                } else {
                    $healthUrl = $this->moduleLink . '&tab=health';
                    echo '<div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">';
                    echo '<span class="dddp-badge dddp-badge-danger">' . htmlspecialchars($this->l('EMAIL_TPL_MISSING'), ENT_QUOTES, 'UTF-8') . '</span>';
                    echo '<a href="' . htmlspecialchars($healthUrl, ENT_QUOTES, 'UTF-8') . '" class="dddp-btn dddp-btn-secondary">';
                    echo '<i class="fas fa-heartbeat"></i> ' . htmlspecialchars($this->l('TAB_HEALTH'), ENT_QUOTES, 'UTF-8');
                    echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';

            // Public & Private Client Pages Example Links Card
            $privatePageUrl     = (string) ($settingsExtras['private_page_url'] ?? '../index.php?m=spDomainPriceSync');
            $publicPageUrl      = (string) ($settingsExtras['public_page_url'] ?? '../index.php?m=spDomainPriceSync&action=transparency');
            $clientLogsActive   = ($engine->getSetting('enable_client_logs') === 'yes');
            $transparencyActive = ($engine->getSetting('enable_transparency') === 'yes');

            $pageItems = [
                [
                    'id'     => 'dddp-private-page-url',
                    'label'  => $this->l('LINK_PRIVATE_LABEL'),
                    'desc'   => $this->l('LINK_PRIVATE_DESC'),
                    'url'    => $privatePageUrl,
                    'active' => $clientLogsActive,
                ],
                [
                    'id'     => 'dddp-public-page-url',
                    'label'  => $this->l('LINK_PUBLIC_LABEL'),
                    'desc'   => $this->l('LINK_PUBLIC_DESC'),
                    'url'    => $publicPageUrl,
                    'active' => $transparencyActive,
                ],
            ];

            echo '<div class="dddp-card">';
            echo '<h3 style="margin-top:0; font-size:18px; font-weight:700; color:#0f172a; display:flex; align-items:center; gap:8px;">';
            echo '<i class="fas fa-link" style="color:#3b82f6;"></i> ';
            echo htmlspecialchars($this->l('PAGE_LINKS_TITLE'), ENT_QUOTES, 'UTF-8');
            echo '</h3>';
            echo '<p style="font-size:13px; color:#64748b; margin-bottom:18px;">' . htmlspecialchars($this->l('PAGE_LINKS_DESC'), ENT_QUOTES, 'UTF-8') . '</p>';

            echo '<div style="display:flex; flex-direction:column; gap:14px;">';
            foreach ($pageItems as $page) {
                $statusClass = $page['active'] ? 'dddp-badge-success' : 'dddp-badge-warning';
                $statusText  = $page['active'] ? $this->l('STATUS_ACTIVE') : $this->l('STATUS_INACTIVE');

                echo '<div style="padding:14px 16px; border:1px solid #e2e8f0; border-radius:12px; background-color:#f8fafc;">';
                echo '<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px; margin-bottom:6px;">';
                echo '<strong style="color:#1e293b; font-size:14px;">' . htmlspecialchars($page['label'], ENT_QUOTES, 'UTF-8') . '</strong>';
                echo '<span class="dddp-badge ' . $statusClass . '">' . htmlspecialchars($statusText, ENT_QUOTES, 'UTF-8') . '</span>';
                echo '</div>';
                echo '<p style="font-size:12px; color:#64748b; margin:0 0 10px 0;">' . htmlspecialchars($page['desc'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<div style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">';
                echo '<input type="text" readonly id="' . htmlspecialchars($page['id'], ENT_QUOTES, 'UTF-8') . '" class="dddp-form-control" style="flex:1; min-width:260px; background:#ffffff; font-family:monospace; font-size:13px;" value="' . htmlspecialchars($page['url'], ENT_QUOTES, 'UTF-8') . '" onclick="this.select();">';
                echo '<button type="button" class="dddp-btn dddp-btn-secondary" onclick="dddpCopyPageUrl(\'' . htmlspecialchars($page['id'], ENT_QUOTES, 'UTF-8') . '\', this);">';
                echo '<i class="fas fa-copy"></i> <span>' . htmlspecialchars($this->l('BTN_COPY_URL'), ENT_QUOTES, 'UTF-8') . '</span>';
                echo '</button>';
                echo '<a href="' . htmlspecialchars($page['url'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener" class="dddp-btn dddp-btn-secondary">';
                echo '<i class="fas fa-external-link-alt"></i> ' . htmlspecialchars($this->l('BTN_OPEN_PAGE'), ENT_QUOTES, 'UTF-8');
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';

            echo '<script>
            function dddpCopyPageUrl(inputId, btn) {
                var input = document.getElementById(inputId);
                if (!input) return;
                input.select();
                input.setSelectionRange(0, 99999);
                var labelSpan = btn ? btn.querySelector("span") : null;
                var originalText = labelSpan ? labelSpan.textContent : "";
                var copiedText = ' . json_encode($this->l('TXT_URL_COPIED')) . ';
                var markCopied = function() {
                    if (labelSpan) {
                        labelSpan.textContent = copiedText;
                        setTimeout(function() { labelSpan.textContent = originalText; }, 1600);
                    }
                };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(input.value).then(markCopied).catch(function() {
                        document.execCommand("copy");
                        markCopied();
                    });
                } else {
                    document.execCommand("copy");
                    markCopied();
                }
            }
            </script>';
        }

        /**
         * Render System Health Check summary cards and audit checklist.
         */
        public function renderHealthCheck(string $csrfToken, array $checks) : void
        {

            $failedCount = 0;
            $warnCount   = 0;
            foreach ($checks as $c) {
                if ($c['status'] === 'fail') {
                    $failedCount++;
                } elseif ($c['status'] === 'warn') {
                    $warnCount++;
                }
            }

            echo '<div class="dddp-health-summary">';
            echo '<div class="dddp-health-summary-info">';
            echo '<div class="dddp-health-summary-title">' . htmlspecialchars($this->l('HEALTH_CHECK_TITLE')) . '</div>';
            echo '<div style="font-size: 14px; color:#475569;">';

            if ($failedCount > 0) {
                $healthMsg = str_replace('{count}', (string) $failedCount, $this->l('HEALTH_ERRORS_DETECTED'));
                echo '<span style="color:#ef4444; font-weight:600;">' . htmlspecialchars($healthMsg) . '</span>';
            } elseif ($warnCount > 0) {
                $healthMsg = str_replace('{count}', (string) $warnCount, $this->l('HEALTH_WARNINGS_DETECTED'));
                echo '<span style="color:#f59e0b; font-weight:600;">' . htmlspecialchars($healthMsg) . '</span>';
            } else {
                echo '<span style="color:#059669; font-weight:600;">' . htmlspecialchars($this->l('HEALTH_ALL_PASSED')) . '</span>';
            }

            echo '</div>';
            echo '</div>';

            echo '<div style="display:flex; gap:12px;">';
            echo '<a href="' . $this->moduleLink . '&tab=health" class="dddp-btn dddp-btn-secondary"><i class="fas fa-sync-alt"></i> ' . htmlspecialchars($this->l('BTN_RUN_AUDIT')) . '</a>';
            echo '<form method="post" action="' . $this->moduleLink . '&tab=health&action=repair">';
            echo '<input type="hidden" name="csrf_token" value="' . $csrfToken . '">';
            echo '<button type="submit" class="dddp-btn dddp-btn-primary"><i class="fas fa-tools"></i> ' . htmlspecialchars($this->l('BTN_REPAIR_DB')) . '</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';

            echo '<div class="dddp-health-grid">';
            foreach ($checks as $c) {
                $statusHtml = '';
                if ($c['status'] === 'pass') {
                    $statusHtml = '<span class="dddp-badge dddp-badge-success"><i class="fas fa-check-circle" style="margin-right:4px;"></i> ' . htmlspecialchars($this->l('STATUS_PASS')) . '</span>';
                } elseif ($c['status'] === 'warn') {
                    $statusHtml = '<span class="dddp-badge dddp-badge-warning"><i class="fas fa-exclamation-triangle" style="margin-right:4px;"></i> ' . htmlspecialchars($this->l('STATUS_WARN')) . '</span>';
                } else {
                    $statusHtml = '<span class="dddp-badge dddp-badge-danger"><i class="fas fa-times-circle" style="margin-right:4px;"></i> ' . htmlspecialchars($this->l('STATUS_FAIL')) . '</span>';
                }

                echo '<div class="dddp-health-card">';
                echo '<div class="dddp-health-info">';
                echo '<span class="dddp-health-title">' . htmlspecialchars($c['title']) . '</span>';
                echo '<span class="dddp-health-desc">' . htmlspecialchars($c['desc']) . '</span>';
                echo '</div>';
                echo '<div class="dddp-health-status">' . $statusHtml . '</div>';
                echo '</div>';
            }
            echo '</div>';
        }

        /**
         * Render closing wrapper HTML.
         */
        public function renderFooter() : void
        {

            echo '</div>'; // End dddp-wrapper
        }

        public function renderHelp() : void
        {

            $items = [
                ['HELP_WHAT', 'HELP_WHAT_TEXT'],
                ['HELP_CONFIG', 'HELP_CONFIG_TEXT'],
                ['HELP_HEALTH', 'HELP_HEALTH_TEXT'],
                ['HELP_SUPPORT', 'HELP_SUPPORT_TEXT'],
            ];
            echo '<h3 style="font-size: 18px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 15px;">' . htmlspecialchars($this->l('HELP_TITLE')) . '</h3>';

            echo '<div style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 24px;">';
            foreach ($items as [$qKey, $aKey]) {
                echo '<div class="dddp-card" style="background:#ffffff; border:1px solid #e2e8f0; border-radius:16px; padding:24px; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);">';
                echo '<h4 style="font-size: 15px; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 10px;"><i class="fas fa-question-circle" style="color: #3b82f6; margin-right: 6px;"></i> ' . htmlspecialchars($this->l($qKey)) . '</h4>';
                echo '<div style="font-size: 13px; color: #475569; line-height: 1.6;">' . nl2br(htmlspecialchars($this->l($aKey))) . '</div>';
                echo '</div>';
            }
            echo '</div>';

            echo '<div class="alert alert-warning" style="margin-top:0px; margin-bottom:20px; font-size:13px; line-height:1.5; border-left: 5px solid #f0ad4e; padding: 15px;">';
            echo '<strong><i class="fas fa-exclamation-triangle"></i> ' . htmlspecialchars($this->l('HELP_WARNING_TITLE')) . '</strong>';
            echo '<div style="margin-top:5px;">' . htmlspecialchars($this->l('HELP_WARNING_TEXT')) . '</div>';
            echo '</div>';
        }

    }

}
