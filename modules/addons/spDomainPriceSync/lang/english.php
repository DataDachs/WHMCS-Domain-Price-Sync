<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in English.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE' => 'Domain Price Sync',
    'DESCRIPTION' => 'Automatically syncs and recalculates recurring prices for customer domains based on the active TLD pricing rules.',
    'DROP_TABLES' => 'Drop Tables on Deactivation',
    'DROP_TABLES_DESC' => 'Check this to delete all module data, settings, and logs when deactivating the module.',
    'DEBUG_MODE' => 'Debug Mode',
    'DEBUG_MODE_DESC' => 'Enable debug log writing and detailed output errors.',
    
    // Tabs
    'TAB_SYNC' => 'Price Sync Engine',
    'TAB_LOGS' => 'Sync Logs',
    'TAB_SETTINGS' => 'Settings & Exclusions',
    'TAB_HEALTH' => 'System Health Check',
    
    // Buttons & Actions
    'BTN_RUN_AUDIT' => 'Run Audit',
    'BTN_REPAIR_DB' => 'Repair Database',
    'BTN_SAVE_SETTINGS' => 'Save Settings',
    'BTN_RUN_DRY_RUN' => 'Start Dry-Run',
    'BTN_RUN_LIVE_SYNC' => 'Execute Live Sync',
    'BTN_DELETE_LOGS' => 'Clear All Logs',
    'BTN_EXPORT_CSV' => 'Export CSV',
    
    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER' => 'Domain Status Filter',
    'DESC_STATUS_FILTER' => 'Comma-separated list of domain statuses to include (e.g. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS' => 'Exclude Client IDs',
    'DESC_EXCLUDE_CLIENTS' => 'Comma-separated list of client IDs to ignore.',
    'LABEL_EXCLUDE_DOMAINS' => 'Exclude Domain IDs',
    'DESC_EXCLUDE_DOMAINS' => 'Comma-separated list of domain IDs to ignore.',
    'LABEL_EXCLUDE_TLDS' => 'Exclude TLDs',
    'DESC_EXCLUDE_TLDS' => 'Comma-separated list of TLDs to ignore (e.g. .com, .de).',
    'LABEL_SKIP_PROMO' => 'Skip Special/Promo Domains',
    'DESC_SKIP_PROMO' => 'Skip domains that have a promotion/coupon ID assigned.',
    'LABEL_SKIP_FREE' => 'Skip Free/Inclusive Domains',
    'DESC_SKIP_FREE' => 'Skip domains that currently have a recurring price of 0.00. This protects free or promotional inclusive domains from being priced.',
    'LABEL_SHOW_ONLY_CHANGES' => 'Show Changes Only',
    'DESC_SHOW_ONLY_CHANGES' => 'In Dry-Run, only show domains where the calculated price differs from the current recurring price.',
    'LABEL_ALLOW_DECREASES' => 'Allow Price Decreases',
    'DESC_ALLOW_DECREASES' => 'Allow updating domain pricing when the calculated renewal price is lower than the current price. If disabled, decreases will be skipped.',
    'TXT_CONFIRM_LIVE' => 'Are you sure you want to run the Live Sync? This will overwrite the recurring price in customer domains and dispatch renewal price update emails!',
    'TXT_CONFIRM_DELETE_LOGS' => 'Are you sure you want to clear all sync history logs?',
    'TXT_CONFIRM_ACTION' => 'I confirm and authorize updating the customer domain prices.',
    
    // Status badges & notifications
    'STATUS_PASS' => 'Pass',
    'STATUS_WARN' => 'Warning',
    'STATUS_FAIL' => 'Failure',
    'TXT_SETTINGS_SAVED' => 'Settings saved successfully.',
    'TXT_LOGS_DELETED' => 'All sync logs deleted successfully.',
    'TXT_HEALTH_REPAIR_SUCCESS' => 'Database and email templates repaired successfully.',
    'ERROR_CSRF' => 'CSRF Token validation failed.',
    'ERROR_NO_DOMAINS_SELECTED' => 'Please select at least one domain to execute the live sync.',
    'ERROR_LICENSE_INVALID' => 'Invalid License Key',
    'ERROR_LICENSE_DESC' => 'Please enter a valid premium Domain Price Sync license key in the module configuration options.',
    
    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED' => 'Dry-Run Completed. Calculated: {total} domains. Updates needed: {updates}. Skipped: {skipped}. Errors: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED' => 'Live Sync Completed! Processed: {total} domains. Updated: {updates}. Skipped: {skipped}. Errors: {errors}.',
    'TXT_DRY_RUN_WARNING' => 'This is a Dry-Run. No changes have been saved to the database.',
    'TXT_LIVE_SYNC_WARNING' => 'Executing Live Sync! Customer domain prices are being recalculated and updated. Notification emails are dispatched for all price updates.',
    'TXT_NO_LOGS_FOUND' => 'No sync logs found.',
    'TXT_NO_RESULTS_FOUND' => 'No domain logs generated for this operation filter.',
    'TXT_LOGS_DESCRIPTION' => 'View the database record of previous Dry-Run checks and Live Sync operations.',
    'TXT_CHECKBOX_ENABLE' => 'Enable this exclusion setting',
    'TXT_CONFIRM_CHECKBOX_REQUIRED' => 'Please confirm the action by activating the checkbox.',
    'TXT_ERROR_DB_REPAIR' => 'Database repair error: {message}',
    'TXT_ERROR_CLEARING_LOGS' => 'Error clearing logs: {message}',
    'TXT_UNKNOWN_API_ERROR' => 'Unknown Error',
    'TXT_API_UPDATE_ERROR' => 'API Error during UpdateClientDomain',
    
    // Health Check
    'HEALTH_CHECK_TITLE' => 'System Health Check',
    'HEALTH_ERRORS_DETECTED' => '{count} errors detected. Action is required immediately.',
    'HEALTH_WARNINGS_DETECTED' => '{count} warnings detected. System is operational but optimizations are recommended.',
    'HEALTH_ALL_PASSED' => 'All checks passed. Your sync module system is healthy.',
    'HEALTH_MODULE_VERSION' => 'Module Version',
    'HEALTH_LICENSE_STATUS' => 'License Status',
    'HEALTH_INTEGRATION_CHECK' => 'GetTLDPricing API Integration',
    'HEALTH_PHP_VERSION' => 'PHP Version Check',
    'HEALTH_PHP_VERSION_DESC' => 'Requires PHP 8.2 or higher. Current version: {version}',
    'HEALTH_SETTINGS_TABLE' => 'Settings Table (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC' => 'Checks if the custom settings table exists.',
    'HEALTH_SETTINGS_SCHEMA' => 'Settings Table Schema',
    'HEALTH_SETTINGS_SCHEMA_OK' => 'All columns exist.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Missing columns: {columns}',
    'HEALTH_LOG_TABLE' => 'Log Table (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC' => 'Checks if the custom sync log table exists.',
    'HEALTH_LOG_SCHEMA' => 'Log Table Schema',
    'HEALTH_LOG_SCHEMA_OK' => 'All columns exist.',
    'HEALTH_LOG_SCHEMA_MISSING' => 'Missing columns: {columns}',
    'HEALTH_CORE_TABLE' => 'WHMCS Core Table: {table}',
    'HEALTH_CORE_TABLE_DESC' => 'Checks if the system core table {table} exists.',
    'HEALTH_EMAIL_TEMPLATE' => 'Email Template: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC' => 'Checks if the custom email template {name} exists in tblemailtemplates.',
    'HEALTH_INTEGRATION_OK' => 'API is responding and returning pricing data.',
    'HEALTH_INTEGRATION_FAIL' => 'API returned: {message}',
    'HEALTH_DB_STATUS' => 'Database Status',
    
    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED' => 'Domains Collected',
    'TXT_STATS_PRICE_CHANGES' => 'Would Change Price',
    'TXT_STATS_TOTAL_DIFFERENCE' => 'Monthly Revenue Diff',
    'TXT_STATS_ERRORS' => 'Errors / Warnings',
    'TXT_STATS_UPDATED' => 'Updated Price',
    
    // Table Headers
    'TH_DOMAIN' => 'Domain',
    'TH_CLIENT' => 'Client',
    'TH_REGPERIOD' => 'Reg Period',
    'TH_OLD_AMOUNT' => 'Current Recurring',
    'TH_NEW_AMOUNT' => 'Calculated Price',
    'TH_DIFFERENCE' => 'Difference',
    'TH_STATUS' => 'Status',
    'TH_REASON' => 'Details',
    'TH_DATE' => 'Date',
    'TH_RUN_TYPE' => 'Run Type',
    
    // Status text in logs
    'STATUS_UPDATED' => 'Updated',
    'STATUS_SKIPPED' => 'Skipped',
    'STATUS_ERROR' => 'Error',
    'STATUS_MATCH' => 'Price Matches',
    'STATUS_WOULD_UPDATE' => 'Would Update',
    'STATUS_SKIPPED_DECREASE' => 'Decrease Skipped',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY' => 'Enable Public Transparency Page',
    'DESC_ENABLE_TRANSPARENCY' => 'Enable a public guest page under index.php?m=spDomainPriceSync&action=transparency showing anonymized price change statistics.',
    'LABEL_GUEST_FOOTER_LINKS' => 'Footer Links for Guest Page',
    'DESC_GUEST_FOOTER_LINKS' => 'Add navigation links that will be displayed in the footer of the guest transparency page (e.g. Legal Notice, Privacy).',
    'GUEST_FOOTER_LABEL' => 'Link Label',
    'GUEST_FOOTER_ADD' => 'Add Link',
    'GUEST_PAGE_TITLE' => 'Domain Price Transparency',
    'GUEST_PAGE_SUBTITLE' => 'Price Adjustments via Registrar Synchronization',
    'GUEST_PAGE_INTRO' => 'On this page we transparently publish recent price adjustments for domain renewals. Price synchronization is performed automatically based on the wholesale rates of our connected registry partners.',
    'GUEST_LAST_SYNC' => 'Last Synchronization',
    'GUEST_NO_DATA' => 'No price adjustments have been logged yet.',
    'GUEST_RATIO_TITLE' => 'Price Adjustments by Direction',
    'GUEST_STATS_TLD_TITLE' => 'Show statistics by domain extension (TLD)',
    'GUEST_INCREASES' => 'Increases',
    'GUEST_DECREASES' => 'Decreases',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID' => 'Filter by Client ID',
    'BTN_FILTER' => 'Filter',
    'BTN_RESET_FILTER' => 'Reset Filter',
    'CLIENT_TITLE' => 'Domain Price Adjustments Log',
    'CLIENT_DESC' => 'This page displays the history of automatic price adjustments applied to your domains to match current registry pricing structures.',
    'CLIENT_NO_LOGS' => 'No price adjustments have been recorded for your domains.',
    'CLIENT_COL_DATE' => 'Date',
    'CLIENT_COL_DOMAIN' => 'Domain Name',
    'CLIENT_COL_OLD_PRICE' => 'Previous Renewal Price',
    'CLIENT_COL_NEW_PRICE' => 'New Renewal Price',
    'CLIENT_COL_DIFFERENCE' => 'Difference',
    'CLIENT_COL_STATUS' => 'Status',
    'CLIENT_COL_DETAILS' => 'Adjustment Details',
    'CLIENT_STATUS_UPDATED' => 'Updated',
    'FILTER_SEARCH' => 'Search...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS' => 'Enable Client Price Adjustment Logs',
    'DESC_ENABLE_CLIENT_LOGS' => 'Enable a client-area page under index.php?m=spDomainPriceSync for logged-in clients to view their domain renewal price adjustment history.',
    'CLIENT_TRANSPARENCY_BTN' => 'Domain Price Transparency',
];



// Help & Documentation Section
$_ADDONLANG['TAB_HELP'] = 'Help';
$_ADDONLANG['HELP_TITLE'] = 'Help & Documentation';
$_ADDONLANG['HELP_WHAT'] = 'What does this module do?';
$_ADDONLANG['HELP_WHAT_TEXT'] = 'This module allows you to manage Domain Price Sync directly from your WHMCS admin area.';
$_ADDONLANG['HELP_CONFIG'] = 'How do I configure the module settings?';
$_ADDONLANG['HELP_CONFIG_TEXT'] = 'Go to the Settings tab to adjust options like API access, automated tasks, and log retention.';
$_ADDONLANG['HELP_HEALTH'] = 'How do database health checks work?';
$_ADDONLANG['HELP_HEALTH_TEXT'] = 'Use the System Health Check to audit database schema, tables, columns, and verify module dependencies are properly installed.';
$_ADDONLANG['HELP_SUPPORT'] = 'Where can I find support?';
$_ADDONLANG['HELP_SUPPORT_TEXT'] = 'For questions, troubleshooting, or updates, please contact the support team via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Important Notice';
$_ADDONLANG['HELP_WARNING_TEXT'] = 'Please make sure to perform a health audit and database repair after upgrading the module to prevent schema errors.';

$_ADDONLANG['INFO_TITLE'] = 'Price Adjustment Guide';
$_ADDONLANG['INFO_INTRO'] = 'To always offer you fair conditions, our domain renewal prices are regularly synchronized with the purchase prices of the registrars. This results in the following transparent steps:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatic Price Check';
$_ADDONLANG['INFO_STEP1_DESC'] = 'The system regularly queries the current purchase prices for each TLD (e.g. .de, .com) from our registrars.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synchronization of Renewal Fees';
$_ADDONLANG['INFO_STEP2_DESC'] = 'If the purchase conditions change, your recurring renewal price is automatically recalculated and adjusted in the system.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Transparent History';
$_ADDONLANG['INFO_STEP3_DESC'] = 'Each price adjustment is documented here in the log with cent-precision showing the old price, the new price, and the difference.';
$_ADDONLANG['INFO_SUPPORT'] = 'If you have any questions about price adjustments or individual invoices, our support is always at your disposal.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'We publish all price changes transparently and anonymously.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'View public statistics';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE'] = 'Email Templates';
$_ADDONLANG['EMAIL_TEMPLATES_DESC'] = 'Open and customize the WHMCS email templates used during live price synchronization. Available variables: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Price Increase Notification';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Price Decrease Notification';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE'] = 'Edit Template';
$_ADDONLANG['EMAIL_TPL_MISSING'] = 'Template not found in database. Please run a repair under System Health Check.';
$_ADDONLANG['PAGE_LINKS_TITLE'] = 'Client & Public Page Examples';
$_ADDONLANG['PAGE_LINKS_DESC'] = 'Direct example links to the client log view and the public transparency statistics page.';
$_ADDONLANG['LINK_PRIVATE_LABEL'] = 'Private Client Page (Login Required)';
$_ADDONLANG['LINK_PRIVATE_DESC'] = 'Displays personal domain price adjustment logs for logged-in clients (requires "Enable Client Price Adjustment Logs").';
$_ADDONLANG['LINK_PUBLIC_LABEL'] = 'Public Transparency Page (Guests & Clients)';
$_ADDONLANG['LINK_PUBLIC_DESC'] = 'Displays anonymized TLD price adjustment statistics publicly (requires "Enable Public Transparency Page").';
$_ADDONLANG['STATUS_ACTIVE'] = 'Active';
$_ADDONLANG['STATUS_INACTIVE'] = 'Inactive';
$_ADDONLANG['BTN_OPEN_PAGE'] = 'Open Page';
$_ADDONLANG['BTN_COPY_URL'] = 'Copy URL';
$_ADDONLANG['TXT_URL_COPIED'] = 'Copied';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Frontend Template';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Select the template used for the client and public pages based on folders in templates/. Auto-detection matches your active WHMCS theme folder and uses six as default.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Auto-detect (WHMCS theme: {whmcs_tpl}, active: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Default)';
