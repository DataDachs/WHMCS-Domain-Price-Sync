<?php

declare(strict_types=1);

/*
 * Addon administrator authorization.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

if (!function_exists('spDomainPriceSync_adminAllowed')) {
    function spDomainPriceSync_adminAllowed(): bool
    {
        try {
            $current = new \WHMCS\Authentication\CurrentUser();
            $admin = $current->admin();
            if (!$admin || !$current->isAuthenticatedAdmin()) {
                return false;
            }

            $roleId = \WHMCS\Database\Capsule::table('tbladmins')
                ->where('id', (int) $admin->id)->value('roleid');
            $roles = \WHMCS\Database\Capsule::table('tbladdonmodules')
                ->where('module', 'spDomainPriceSync')->where('setting', 'access')->value('value');

            return (int) $roleId > 0 && is_string($roles)
                && in_array((string) $roleId, array_map('trim', explode(',', $roles)), true);
        } catch (\Throwable $e) {
            return false;
        }
    }
}
