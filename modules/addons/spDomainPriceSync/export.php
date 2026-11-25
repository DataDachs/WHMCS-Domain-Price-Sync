<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * Standalone CSV export utility. Exposes log history as downloadable CSV
 * after verifying administrative session authentication.
 */

define('WHMCS', true);
require_once __DIR__ . '/../../../init.php';

use WHMCS\Database\Capsule;

require_once __DIR__ . '/lib/AdminAccess.php';

// Administrative Session Check
if (!spDomainPriceSync_adminAllowed()) {
    header('HTTP/1.1 403 Forbidden');
    die('Authentication required.');
}

try {
    if (!Capsule::schema()->hasTable('mod_spdomainpricesync_log')) {
        header('HTTP/1.1 404 Not Found');
        die('Log table does not exist.');
    }

    $clientId = isset($_GET['client_id']) ? (int)$_GET['client_id'] : 0;
    $query = Capsule::table('mod_spdomainpricesync_log');
    if ($clientId > 0) {
        $query->where('client_id', $clientId);
    }
    $records = $query->orderBy('id', 'desc')->get();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=domain_price_sync_logs_' . date('Ymd_His') . '.csv');

    $output = fopen('php://output', 'w');
    if ($output === false) {
        die('Could not open output stream.');
    }

    // Write UTF-8 BOM for Excel compatibility
    fputs($output, "\xEF\xBB\xBF");

    // CSV Headers
    fputcsv($output, [
        'ID',
        'Date',
        'Run Type',
        'Domain ID',
        'Domain Name',
        'Client ID',
        'Reg Period',
        'Current Price',
        'New Price',
        'Difference',
        'Status',
        'Details'
    ]);

    foreach ($records as $row) {
        fputcsv($output, [
            (int)$row->id,
            (string)$row->created_at,
            (string)$row->run_type,
            (int)$row->domain_id,
            (string)$row->domain_name,
            (int)$row->client_id,
            (int)$row->reg_period,
            number_format((float)$row->old_amount, 2, '.', ''),
            number_format((float)$row->new_amount, 2, '.', ''),
            number_format((float)$row->difference, 2, '.', ''),
            (string)$row->status,
            (string)$row->reason
        ]);
    }

    fclose($output);
    exit;
} catch (\Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    die('Error exporting logs.');
}
