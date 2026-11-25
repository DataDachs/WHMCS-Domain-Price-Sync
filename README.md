# Domain Price Sync Module for WHMCS

This repository contains the **Domain Price Sync** WHMCS addon module (`spDomainPriceSync`), which synchronizes existing client domain recurring renewal amounts with current WHMCS TLD pricing while accounting for active domain addons.

This module is **free to use** (`0.00 EUR`). It uses a free one-time license key that can be ordered free of charge at:
[https://login.streampanel.net/cart.php?a=add&pid=656](https://login.streampanel.net/cart.php?a=add&pid=656)

## Features
* **Dry-Run & Live Sync Engine:** Compares each client domain's `recurringamount` against active WHMCS `GetTLDPricing` renewal rates plus active domain addons (`dnsmanagement`, `emailforwarding`, `idprotection`) from `tblpricing`, before applying recalculations via WHMCS `UpdateClientDomain` (`autorecalc`).
* **Safety Guards & Exclusions:** Filter by domain status, exclude specific client IDs, domain IDs, or TLDs, optionally skip promotional or free (`0.00`) domains, control whether price decreases are applied, and skip domains with open unpaid invoices.
* **Selective Live Updates:** Preview calculated changes in a Dry-Run, select individual domains via checkboxes, and authorize Live Sync execution explicitly.
* **Automated Customer Email Notifications:** Seeds `Domain Price Sync Increase` and `Domain Price Sync Decrease` templates in `tblemailtemplates` with dynamic placeholders (`{$domain_name}`, `{$old_price}`, `{$new_price}`, `{$next_due_date}`) and provides direct template edit links in Settings.
* **Logs & CSV Export:** Stores sync history in `mod_spdomainpricesync_log`, supports filtering by Client ID, and exports logs via `export.php`.
* **Optional Client & Public Transparency Pages:** Exposes a logged-in client price adjustment log (`index.php?m=spDomainPriceSync`) and an optional anonymized public transparency page (`index.php?m=spDomainPriceSync&action=transparency`) with configurable footer links.
* **Theme Support & Template Auto-Detection:** Ships a standard WHMCS **Six** template (`templates/six/`) by default alongside custom theme folders (e.g., `templates/reborn/`). Settings support explicit template selection or automatic detection matching your active WHMCS client area theme folder name with `six` as fallback.
* **System Health Check & Repair:** Verifies PHP version, database tables/columns, email templates, and `GetTLDPricing` API connectivity, with one-click schema and template repair.
* **Multi-Language Support:** Includes 15 admin and client translations out of the box.

## Requirements
* WHMCS 8.x (tested with WHMCS 8.13)
* PHP 8.2 or later

## Setup Instructions
1. Order your **free** one-time license key at [https://login.streampanel.net/cart.php?a=add&pid=656](https://login.streampanel.net/cart.php?a=add&pid=656).
2. Clone or download this repository.
3. Upload `modules/addons/spDomainPriceSync/` to your WHMCS `/modules/addons/spDomainPriceSync/` directory.
4. In the WHMCS admin area, navigate to **System Settings > Addon Modules** (or **Setup > Addon Modules**).
5. Locate **DD: Domain Price Sync**, click **Activate**, enter your free license key, configure admin access permissions, and save changes.
6. Open **Addons > Domain Price Sync** and run **System Health Check** to verify database tables and email templates.

## Usage
1. Open the **Settings & Exclusions** tab to configure status filters, exclusions, client logs, public transparency options, and direct shortcuts to email templates and page URLs.
2. Open the **Price Sync Engine** tab and click **Start Dry-Run** to preview all calculated prices without modifying the database.
3. Review the preview table, confirm the authorization checkbox, and run **Execute Live Sync** when ready.
4. Inspect historical runs or download CSV reports under **Sync Logs**.

## License
Licensed under the **DataDachs WHMCS Module License** (`Free & Commercial Edition`). See [LICENSE.md](LICENSE.md) for the full binding terms.

| Action | Allowed |
| :--- | :--- |
| Use in your own WHMCS (commercial hosting & personal) | Yes (free; free one-time license key required) |
| Customize code or templates for your own WHMCS | Yes |
| Bypass or remove license checks (`verifyLicense`) | No |
| Resell, redistribute, publish copies, or build competing products | No |

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
