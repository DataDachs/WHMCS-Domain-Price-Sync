<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Czech.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Synchronizace cen domén',
    'DESCRIPTION'                    => 'Automaticky synchronizuje a přepočítává opakující se ceny zákaznických domén na základě aktuálně nakonfigurovaných ceníků TLD.',
    'DROP_TABLES'                    => 'Smazat tabulky při deaktivaci',
    'DROP_TABLES_DESC'               => 'Zaškrtněte pro smazání všech dat, nastavení a protokolů modulu při jeho deaktivaci.',
    'DEBUG_MODE'                     => 'Režim ladění',
    'DEBUG_MODE_DESC'                => 'Aktivuje zápis ladicích protokolů a podrobné chybové výstupy.',

    // Tabs
    'TAB_SYNC'                       => 'Synchronizace cen',
    'TAB_LOGS'                       => 'Protokoly',
    'TAB_SETTINGS'                   => 'Nastavení a výjimky',
    'TAB_HEALTH'                     => 'Kontrola stavu systému',

    // Buttons & Actions
    'BTN_RUN_AUDIT'                  => 'Spustit audit',
    'BTN_REPAIR_DB'                  => 'Opravit databázi',
    'BTN_SAVE_SETTINGS'              => 'Uložit nastavení',
    'BTN_RUN_DRY_RUN'                => 'Spustit zkušební běh',
    'BTN_RUN_LIVE_SYNC'              => 'Spustit živou synchronizaci',
    'BTN_DELETE_LOGS'                => 'Smazat protokoly',
    'BTN_EXPORT_CSV'                 => 'Exportovat CSV',

    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER'            => 'Filtr stavu domény',
    'DESC_STATUS_FILTER'             => 'Čárkou oddělený seznam stavů domén k zahrnutí (např. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Vyloučit ID klientů',
    'DESC_EXCLUDE_CLIENTS'           => 'Čárkou oddělený seznam ID klientů k ignorování.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Vyloučit ID domén',
    'DESC_EXCLUDE_DOMAINS'           => 'Čárkou oddělený seznam ID domén k ignorování.',
    'LABEL_EXCLUDE_TLDS'             => 'Vyloučit TLD',
    'DESC_EXCLUDE_TLDS'              => 'Čárkou oddělený seznam TLD k ignorování (např. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Přeskočit promo domény',
    'DESC_SKIP_PROMO'                => 'Přeskočí domény s přiřazeným propagačním nebo slevovým kódem.',
    'LABEL_SKIP_FREE'                => 'Přeskočit bezplatné domény',
    'DESC_SKIP_FREE'                 => 'Přeskočí domény s aktuální opakující se cenou 0,00. Chrání bezplatné nebo inkluzivní domény před nežádoucí změnou ceny.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Zobrazit pouze změny',
    'DESC_SHOW_ONLY_CHANGES'         => 'Ve zkušebním běhu zobrazí pouze domény, kde se vypočítaná cena liší od aktuální ceny.',
    'LABEL_ALLOW_DECREASES'          => 'Povolit snížení cen',
    'DESC_ALLOW_DECREASES'           => 'Povolí aktualizaci cen, pokud je vypočítaná cena za obnovení nižší než aktuální cena. Pokud je vypnuto, snížení cen bude přeskočeno.',
    'TXT_CONFIRM_LIVE'               => 'Opravdu chcete spustit živou synchronizaci? Tím se přepíší opakující se ceny zákaznických domén a budou odeslány e-maily o aktualizaci cen!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Opravdu chcete smazat všechny protokoly?',
    'TXT_CONFIRM_ACTION'             => 'Potvrzuji a autorizuji aktualizaci cen domén.',

    // Status badges & notifications
    'STATUS_PASS'                    => 'V pořádku',
    'STATUS_WARN'                    => 'Varování',
    'STATUS_FAIL'                    => 'Selhání',
    'TXT_SETTINGS_SAVED'             => 'Nastavení úspěšně uloženo.',
    'TXT_LOGS_DELETED'               => 'Všechny protokoly úspěšně smazány.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Databáze a e-mailové šablony úspěšně opraveny.',
    'ERROR_CSRF'                     => 'Ověření CSRF tokenu selhalo.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Vyberte prosím alespoň jednu doménu pro spuštění živé synchronizace.',
    'ERROR_LICENSE_INVALID'          => 'Neplatný licenční klíč',
    'ERROR_LICENSE_DESC'             => 'Zadejte prosím platný prémiový licenční klíč Domain Price Sync v konfiguračních možnostech modulu.',

    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED'          => 'Zkušební běh dokončen. Vypočteno: {total} domén. Nutné aktualizace: {updates}. Přeskočeno: {skipped}. Chyby: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Živá synchronizace dokončena! Zpracováno: {total} domén. Aktualizováno: {updates}. Přeskočeno: {skipped}. Chyby: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Toto je zkušební běh. V databázi nebyly provedeny žádné změny.',
    'TXT_LIVE_SYNC_WARNING'          => 'Probíhá živá synchronizace! Ceny zákaznických domén jsou přepočítávány a aktualizovány. Pro všechny aktualizace cen jsou odesílány notifikační e-maily.',
    'TXT_NO_LOGS_FOUND'              => 'Nebyly nalezeny žádné protokoly.',
    'TXT_NO_RESULTS_FOUND'           => 'Pro tento filtr nebyly nalezeny žádné záznamy.',
    'TXT_LOGS_DESCRIPTION'           => 'Zobrazí záznamy předchozích zkušebních běhů a živých synchronizací.',
    'TXT_CHECKBOX_ENABLE'            => 'Aktivovat toto nastavení výjimky',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Potvrďte prosím akci zaškrtnutím políčka.',
    'TXT_ERROR_DB_REPAIR'            => 'Chyba při opravě databáze: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Chyba při mazání protokolů: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Neznámá chyba',
    'TXT_API_UPDATE_ERROR'           => 'Chyba API při UpdateClientDomain',

    // Health Check
    'HEALTH_CHECK_TITLE'             => 'Kontrola stavu systému',
    'HEALTH_ERRORS_DETECTED'         => 'Zjištěno {count} chyb. Je vyžadován okamžitý zásah.',
    'HEALTH_WARNINGS_DETECTED'       => 'Zjištěno {count} varování. Systém je funkční, ale doporučujeme optimalizace.',
    'HEALTH_ALL_PASSED'              => 'Všechny kontroly prošly. Váš systém je v pořádku.',
    'HEALTH_MODULE_VERSION'          => 'Verze modulu',
    'HEALTH_LICENSE_STATUS'          => 'Stav licence',
    'HEALTH_INTEGRATION_CHECK'       => 'Integrace GetTLDPricing API',
    'HEALTH_PHP_VERSION'             => 'Kontrola verze PHP',
    'HEALTH_PHP_VERSION_DESC'        => 'Vyžaduje PHP 8.2 nebo vyšší. Aktuální verze: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Tabulka nastavení (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Kontroluje existenci vlastní tabulky nastavení.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Schéma tabulky nastavení',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Všechny sloupce existují.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Chybějící sloupce: {columns}',
    'HEALTH_LOG_TABLE'               => 'Tabulka protokolů (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Kontroluje existenci vlastní tabulky protokolů.',
    'HEALTH_LOG_SCHEMA'              => 'Schéma tabulky protokolů',
    'HEALTH_LOG_SCHEMA_OK'           => 'Všechny sloupce existují.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Chybějící sloupce: {columns}',
    'HEALTH_CORE_TABLE'              => 'Systémová tabulka WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Kontroluje existenci systémové tabulky {table}.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-mailová šablona: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Kontroluje existenci vlastní e-mailové šablony {name} v tblemailtemplates.',
    'HEALTH_INTEGRATION_OK'          => 'API odpovídá a vrací cenová data.',
    'HEALTH_INTEGRATION_FAIL'        => 'Odpověď API: {message}',
    'HEALTH_DB_STATUS'               => 'Stav databáze',

    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED'    => 'Shromážděné domény',
    'TXT_STATS_PRICE_CHANGES'        => 'Změnila by se cena',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Měsíční rozdíl v příjmech',
    'TXT_STATS_ERRORS'               => 'Chyby / varování',
    'TXT_STATS_UPDATED'              => 'Aktualizovaná cena',

    // Table Headers
    'TH_DOMAIN'                      => 'Doména',
    'TH_CLIENT'                      => 'Klient',
    'TH_REGPERIOD'                   => 'Období registrace',
    'TH_OLD_AMOUNT'                  => 'Aktuální opakující se cena',
    'TH_NEW_AMOUNT'                  => 'Vypočítaná cena',
    'TH_DIFFERENCE'                  => 'Rozdíl',
    'TH_STATUS'                      => 'Stav',
    'TH_REASON'                      => 'Podrobnosti',
    'TH_DATE'                        => 'Datum',
    'TH_RUN_TYPE'                    => 'Typ běhu',

    // Status text in logs
    'STATUS_UPDATED'                 => 'Aktualizováno',
    'STATUS_SKIPPED'                 => 'Přeskočeno',
    'STATUS_ERROR'                   => 'Chyba',
    'STATUS_MATCH'                   => 'Cena odpovídá',
    'STATUS_WOULD_UPDATE'            => 'Bylo by aktualizováno',
    'STATUS_SKIPPED_DECREASE'        => 'Snížení přeskočeno',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY'      => 'Aktivovat veřejnou stránku transparentnosti',
    'DESC_ENABLE_TRANSPARENCY'       => 'Aktivuje veřejnou stránku pro hosty pod index.php?m=spDomainPriceSync&action=transparency, zobrazující anonymizované statistiky cenových změn.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Odkazy v zápatí pro stránku hostů',
    'DESC_GUEST_FOOTER_LINKS'        => 'Přidejte navigační odkazy, které budou zobrazeny v zápatí veřejné stránky transparentnosti (např. právní informace, ochrana osobních údajů).',
    'GUEST_FOOTER_LABEL'             => 'Popisek odkazu',
    'GUEST_FOOTER_ADD'               => 'Přidat odkaz',
    'GUEST_PAGE_TITLE'               => 'Transparentnost cen domén',
    'GUEST_PAGE_SUBTITLE'            => 'Cenové úpravy prostřednictvím synchronizace s registrátory',
    'GUEST_PAGE_INTRO'               => 'Na této stránce transparentně zveřejňujeme nedávné cenové úpravy za obnovení domén. Synchronizace cen probíhá automaticky na základě velkoobchodních sazeb našich registrátorů.',
    'GUEST_LAST_SYNC'                => 'Poslední synchronizace',
    'GUEST_NO_DATA'                  => 'Dosud nebyly zaznamenány žádné cenové úpravy.',
    'GUEST_RATIO_TITLE'              => 'Cenové úpravy podle směru',
    'GUEST_STATS_TLD_TITLE'          => 'Zobrazit statistiky podle doménové přípony (TLD)',
    'GUEST_INCREASES'                => 'Zvýšení',
    'GUEST_DECREASES'                => 'Snížení',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID'         => 'Filtrovat podle ID klienta',
    'BTN_FILTER'                     => 'Filtrovat',
    'BTN_RESET_FILTER'               => 'Resetovat filtr',
    'CLIENT_TITLE'                   => 'Protokol úprav cen domén',
    'CLIENT_DESC'                    => 'Tato stránka zobrazuje historii automatických cenových úprav aplikovaných na vaše domény za účelem přizpůsobení aktuálním cenám registrátorů.',
    'CLIENT_NO_LOGS'                 => 'Pro vaše domény nebyly zaznamenány žádné cenové úpravy.',
    'CLIENT_COL_DATE'                => 'Datum',
    'CLIENT_COL_DOMAIN'              => 'Název domény',
    'CLIENT_COL_OLD_PRICE'           => 'Předchozí cena za obnovení',
    'CLIENT_COL_NEW_PRICE'           => 'Nová cena za obnovení',
    'CLIENT_COL_DIFFERENCE'          => 'Rozdíl',
    'CLIENT_COL_STATUS'              => 'Stav',
    'CLIENT_COL_DETAILS'             => 'Podrobnosti úpravy',
    'CLIENT_STATUS_UPDATED'          => 'Aktualizováno',
    'FILTER_SEARCH'                  => 'Hledat...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS'       => 'Aktivovat zobrazení cenových úprav pro klienty',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Aktivuje stránku v klientské oblasti pod index.php?m=spDomainPriceSync, kde přihlášení klienti mohou zobrazit historii cenových úprav svých domén.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Transparentnost cen domén',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Pomoc';
$_ADDONLANG['HELP_TITLE']         = 'Nápověda a dokumentace';
$_ADDONLANG['HELP_WHAT']          = 'Co tento modul dělá?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Tento modul vám umožňuje spravovat Domain Price Sync přímo z administrátorské oblasti WHMCS.';
$_ADDONLANG['HELP_CONFIG']        = 'Jak nakonfiguruji nastavení modulu?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Přejdete na kartu Nastavení a upravte možnosti, jako je přístup k API, automatické úlohy a uchovávání protokolů.';
$_ADDONLANG['HELP_HEALTH']        = 'Jak fungují kontroly stavu databáze?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Pomocí kontroly stavu systému zkontrolujte schéma databáze, tabulky, sloupce a ověřte, zda jsou správně nainstalovány závislosti modulu.';
$_ADDONLANG['HELP_SUPPORT']       = 'Kde najdu podporu?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'V případě dotazů, řešení problémů nebo aktualizací kontaktujte tým podpory prostřednictvím support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Důležité upozornění';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Po upgradu modulu nezapomeňte provést audit stavu a opravu databáze, abyste předešli chybám schématu.';

$_ADDONLANG['INFO_TITLE']       = 'Průvodce úpravou cen';
$_ADDONLANG['INFO_INTRO']       = 'Abychom vám vždy nabízeli férové podmínky, jsou naše ceny za prodloužení domén pravidelně synchronizovány s nákupními cenami registrátorů. To má za následek následující transparentní kroky:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatická kontrola cen';
$_ADDONLANG['INFO_STEP1_DESC']  = 'Systém pravidelně zjišťuje aktuální nákupní ceny pro každou TLD (např. .de, .com) u našich registrátorů.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synchronizace poplatků';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Pokud se nákupní podmínky změní, vaše opakovaná cena za prodloužení se v systému automaticky přepočítá a upraví.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Transparentní historie';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Každá úprava ceny je zde v protokolu zdokumentována s přesností na centy a ukazuje starou cenu, novou cenu a rozdíl.';
$_ADDONLANG['INFO_SUPPORT']     = 'Máte-li jakékoli dotazy k úpravám cen nebo jednotlivým fakturám, naše podpora je vám plně k dispozici.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Všechny změny cen zveřejňujeme transparentně a anonymně.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Zobrazit veřejné statistiky';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-mailové šablony';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Otevřete a upravte e-mailové šablony WHMCS používané při živé synchronizaci cen. Dostupné proměnné: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Upozornění na zvýšení ceny';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Upozornění na snížení ceny';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Upravit šablonu';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Šablona nebyla nalezena v databázi. Spusťte opravu v Kontrole stavu systému.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Příklady odkazů na klientskou a veřejnou stránku';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Přímé ukázkové odkazy na klientský přehled protokolů a veřejnou stránku transparentnosti.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Soukromá klientská stránka (vyžaduje přihlášení)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Zobrazuje přihlášeným klientům historii cenových úprav jejich domén (vyžaduje aktivaci přehledu pro klienty).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Veřejná stránka transparentnosti (hosté a klienti)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Veřejně zobrazuje anonymizované statistiky úprav cen domén (vyžaduje aktivaci veřejné stránky transparentnosti).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Aktivní';
$_ADDONLANG['STATUS_INACTIVE']          = 'Neaktivní';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Otevřít stránku';
$_ADDONLANG['BTN_COPY_URL']             = 'Kopírovat URL';
$_ADDONLANG['TXT_URL_COPIED']           = 'Zkopírováno';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Šablona klientské oblasti';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Vyberte šablonu pro veřejné a klientské stránky podle podsložek v adresáři templates/. Při automatické detekci se načte odpovídající složka podle aktivního motivu WHMCS (výchozí: six).';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automatická detekce (WHMCS motiv: {whmcs_tpl}, použito: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Výchozí)';
