<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Dutch.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Domeinprijssynchronisatie',
    'DESCRIPTION'                    => 'Synchroniseert en herberekent automatisch terugkerende prijzen voor klantdomeinen op basis van de geconfigureerde TLD-prijzen.',
    'DROP_TABLES'                    => 'Tabellen verwijderen bij deactivering',
    'DROP_TABLES_DESC'               => 'Vink dit aan om alle modulegegevens, instellingen en logbestanden te verwijderen bij deactivering van de module.',
    'DEBUG_MODE'                     => 'Foutopsporingsmodus',
    'DEBUG_MODE_DESC'                => 'Schakelt het schrijven van foutopsporingslogboeken en gedetailleerde foutuitvoer in.',

    // Tabs
    'TAB_SYNC'                       => 'Prijssynchronisatie',
    'TAB_LOGS'                       => 'Logboeken',
    'TAB_SETTINGS'                   => 'Instellingen en uitsluitingen',
    'TAB_HEALTH'                     => 'Systeemgezondheidscontrole',

    // Buttons & Actions
    'BTN_RUN_AUDIT'                  => 'Audit uitvoeren',
    'BTN_REPAIR_DB'                  => 'Database repareren',
    'BTN_SAVE_SETTINGS'              => 'Instellingen opslaan',
    'BTN_RUN_DRY_RUN'                => 'Proefrun starten',
    'BTN_RUN_LIVE_SYNC'              => 'Live-synchronisatie uitvoeren',
    'BTN_DELETE_LOGS'                => 'Logboeken wissen',
    'BTN_EXPORT_CSV'                 => 'CSV exporteren',

    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER'            => 'Domeinstatusfilter',
    'DESC_STATUS_FILTER'             => 'Kommagescheiden lijst van domeinstatussen die moeten worden opgenomen (bijv. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Klant-ID\'s uitsluiten',
    'DESC_EXCLUDE_CLIENTS'           => 'Kommagescheiden lijst van klant-ID\'s die moeten worden genegeerd.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Domein-ID\'s uitsluiten',
    'DESC_EXCLUDE_DOMAINS'           => 'Kommagescheiden lijst van domein-ID\'s die moeten worden genegeerd.',
    'LABEL_EXCLUDE_TLDS'             => 'TLD\'s uitsluiten',
    'DESC_EXCLUDE_TLDS'              => 'Kommagescheiden lijst van TLD\'s die moeten worden genegeerd (bijv. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Promotiedomeinen overslaan',
    'DESC_SKIP_PROMO'                => 'Slaat domeinen over met een toegewezen promotie- of kortingscode.',
    'LABEL_SKIP_FREE'                => 'Gratis domeinen overslaan',
    'DESC_SKIP_FREE'                 => 'Slaat domeinen over met een huidige terugkerende prijs van 0,00. Dit beschermt gratis of inclusieve domeinen tegen ongewenste prijswijzigingen.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Alleen wijzigingen tonen',
    'DESC_SHOW_ONLY_CHANGES'         => 'Toont in de proefrun alleen domeinen waarvan de berekende prijs afwijkt van de huidige prijs.',
    'LABEL_ALLOW_DECREASES'          => 'Prijsverlagingen toestaan',
    'DESC_ALLOW_DECREASES'           => 'Staat prijswijzigingen toe wanneer de berekende verlengingsprijs lager is dan de huidige prijs. Indien uitgeschakeld worden prijsverlagingen overgeslagen.',
    'TXT_CONFIRM_LIVE'               => 'Weet u zeker dat u de live-synchronisatie wilt uitvoeren? Dit overschrijft de terugkerende prijzen van klantdomeinen en verstuurt e-mails over prijsupdates!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Weet u zeker dat u alle logboeken wilt wissen?',
    'TXT_CONFIRM_ACTION'             => 'Ik bevestig en autoriseer de bijwerking van de domeinprijzen.',

    // Status badges & notifications
    'STATUS_PASS'                    => 'Geslaagd',
    'STATUS_WARN'                    => 'Waarschuwing',
    'STATUS_FAIL'                    => 'Mislukt',
    'TXT_SETTINGS_SAVED'             => 'Instellingen succesvol opgeslagen.',
    'TXT_LOGS_DELETED'               => 'Alle logboeken succesvol gewist.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Database en e-mailsjablonen succesvol gerepareerd.',
    'ERROR_CSRF'                     => 'CSRF-tokenvalidatie mislukt.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Selecteer ten minste één domein om de live-synchronisatie uit te voeren.',
    'ERROR_LICENSE_INVALID'          => 'Ongeldige licentiesleutel',
    'ERROR_LICENSE_DESC'             => 'Voer een geldige premium Domain Price Sync licentiesleutel in bij de moduleconfiguratie.',

    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED'          => 'Proefrun voltooid. Berekend: {total} domeinen. Updates nodig: {updates}. Overgeslagen: {skipped}. Fouten: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Live-synchronisatie voltooid! Verwerkt: {total} domeinen. Bijgewerkt: {updates}. Overgeslagen: {skipped}. Fouten: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Dit is een proefrun. Er zijn geen wijzigingen opgeslagen in de database.',
    'TXT_LIVE_SYNC_WARNING'          => 'Live-synchronisatie wordt uitgevoerd! Domeinprijzen van klanten worden herberekend en bijgewerkt. Notificatie-e-mails worden verstuurd voor alle prijsupdates.',
    'TXT_NO_LOGS_FOUND'              => 'Geen logboeken gevonden.',
    'TXT_NO_RESULTS_FOUND'           => 'Geen logboeken gevonden voor dit filter.',
    'TXT_LOGS_DESCRIPTION'           => 'Toont logboeken van eerdere proefruns en live-synchronisaties.',
    'TXT_CHECKBOX_ENABLE'            => 'Deze uitsluitingsinstelling activeren',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Bevestig de actie door het selectievakje aan te vinken.',
    'TXT_ERROR_DB_REPAIR'            => 'Fout bij databasereparatie: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Fout bij het wissen van logboeken: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Onbekende fout',
    'TXT_API_UPDATE_ERROR'           => 'API-fout tijdens UpdateClientDomain',

    // Health Check
    'HEALTH_CHECK_TITLE'             => 'Systeemgezondheidscontrole',
    'HEALTH_ERRORS_DETECTED'         => '{count} fouten gedetecteerd. Onmiddellijke actie is vereist.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} waarschuwingen gedetecteerd. Systeem is operationeel, maar optimalisaties worden aanbevolen.',
    'HEALTH_ALL_PASSED'              => 'Alle controles geslaagd. Uw systeem is in orde.',
    'HEALTH_MODULE_VERSION'          => 'Moduleversie',
    'HEALTH_LICENSE_STATUS'          => 'Licentiestatus',
    'HEALTH_INTEGRATION_CHECK'       => 'GetTLDPricing API-integratie',
    'HEALTH_PHP_VERSION'             => 'PHP-versiecontrole',
    'HEALTH_PHP_VERSION_DESC'        => 'Vereist PHP 8.2 of hoger. Huidige versie: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Instellingentabel (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Controleert of de aangepaste instellingentabel bestaat.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Instellingentabel-schema',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Alle kolommen aanwezig.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Ontbrekende kolommen: {columns}',
    'HEALTH_LOG_TABLE'               => 'Logboektabel (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Controleert of de aangepaste logboektabel bestaat.',
    'HEALTH_LOG_SCHEMA'              => 'Logboektabel-schema',
    'HEALTH_LOG_SCHEMA_OK'           => 'Alle kolommen aanwezig.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Ontbrekende kolommen: {columns}',
    'HEALTH_CORE_TABLE'              => 'WHMCS-systeemtabel: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Controleert of de systeemtabel {table} bestaat.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-mailsjabloon: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Controleert of het aangepaste e-mailsjabloon {name} bestaat in tblemailtemplates.',
    'HEALTH_INTEGRATION_OK'          => 'API reageert en retourneert prijsgegevens.',
    'HEALTH_INTEGRATION_FAIL'        => 'API-reactie: {message}',
    'HEALTH_DB_STATUS'               => 'Databasestatus',

    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED'    => 'Verzamelde domeinen',
    'TXT_STATS_PRICE_CHANGES'        => 'Prijs zou wijzigen',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Maandelijks omzetverschil',
    'TXT_STATS_ERRORS'               => 'Fouten / waarschuwingen',
    'TXT_STATS_UPDATED'              => 'Bijgewerkte prijs',

    // Table Headers
    'TH_DOMAIN'                      => 'Domein',
    'TH_CLIENT'                      => 'Klant',
    'TH_REGPERIOD'                   => 'Registratieperiode',
    'TH_OLD_AMOUNT'                  => 'Huidige terugkerende prijs',
    'TH_NEW_AMOUNT'                  => 'Berekende prijs',
    'TH_DIFFERENCE'                  => 'Verschil',
    'TH_STATUS'                      => 'Status',
    'TH_REASON'                      => 'Details',
    'TH_DATE'                        => 'Datum',
    'TH_RUN_TYPE'                    => 'Uitvoeringstype',

    // Status text in logs
    'STATUS_UPDATED'                 => 'Bijgewerkt',
    'STATUS_SKIPPED'                 => 'Overgeslagen',
    'STATUS_ERROR'                   => 'Fout',
    'STATUS_MATCH'                   => 'Prijs komt overeen',
    'STATUS_WOULD_UPDATE'            => 'Zou bijwerken',
    'STATUS_SKIPPED_DECREASE'        => 'Verlaging overgeslagen',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY'      => 'Openbare transparantiepagina activeren',
    'DESC_ENABLE_TRANSPARENCY'       => 'Activeert een openbare gastpagina onder index.php?m=spDomainPriceSync&action=transparency met geanonimiseerde prijswijzigingsstatistieken.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Voettekstlinks voor gastpagina',
    'DESC_GUEST_FOOTER_LINKS'        => 'Voeg navigatielinks toe die in de voettekst van de openbare transparantiepagina worden weergegeven (bijv. juridische informatie, privacybeleid).',
    'GUEST_FOOTER_LABEL'             => 'Linktekst',
    'GUEST_FOOTER_ADD'               => 'Link toevoegen',
    'GUEST_PAGE_TITLE'               => 'Domeinprijs-transparantie',
    'GUEST_PAGE_SUBTITLE'            => 'Prijsaanpassingen via registrar-synchronisatie',
    'GUEST_PAGE_INTRO'               => 'Op deze pagina publiceren wij transparant de recente prijsaanpassingen voor domeinverlengingen. De prijssynchronisatie wordt automatisch uitgevoerd op basis van de groothandelstarieven van onze aangesloten registrars.',
    'GUEST_LAST_SYNC'                => 'Laatste synchronisatie',
    'GUEST_NO_DATA'                  => 'Er zijn nog geen prijsaanpassingen geregistreerd.',
    'GUEST_RATIO_TITLE'              => 'Prijsaanpassingen per richting',
    'GUEST_STATS_TLD_TITLE'          => 'Statistieken per domeinextensie (TLD) weergeven',
    'GUEST_INCREASES'                => 'Verhogingen',
    'GUEST_DECREASES'                => 'Verlagingen',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID'         => 'Filteren op klant-ID',
    'BTN_FILTER'                     => 'Filteren',
    'BTN_RESET_FILTER'               => 'Filter resetten',
    'CLIENT_TITLE'                   => 'Logboek domeinprijsaanpassingen',
    'CLIENT_DESC'                    => 'Deze pagina toont de geschiedenis van automatische prijsaanpassingen die op uw domeinen zijn toegepast om aan te sluiten bij de huidige registrar-tarieven.',
    'CLIENT_NO_LOGS'                 => 'Er zijn geen prijsaanpassingen geregistreerd voor uw domeinen.',
    'CLIENT_COL_DATE'                => 'Datum',
    'CLIENT_COL_DOMAIN'              => 'Domeinnaam',
    'CLIENT_COL_OLD_PRICE'           => 'Vorige verlengingsprijs',
    'CLIENT_COL_NEW_PRICE'           => 'Nieuwe verlengingsprijs',
    'CLIENT_COL_DIFFERENCE'          => 'Verschil',
    'CLIENT_COL_STATUS'              => 'Status',
    'CLIENT_COL_DETAILS'             => 'Aanpassingsdetails',
    'CLIENT_STATUS_UPDATED'          => 'Bijgewerkt',
    'FILTER_SEARCH'                  => 'Zoeken...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS'       => 'Klantweergave van prijsaanpassingen activeren',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Activeert een pagina in het klantgedeelte onder index.php?m=spDomainPriceSync waar ingelogde klanten de geschiedenis van hun domeinprijsaanpassingen kunnen bekijken.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Domeinprijs-transparantie',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Hulp';
$_ADDONLANG['HELP_TITLE']         = 'Hulp & Documentatie';
$_ADDONLANG['HELP_WHAT']          = 'Wat doet deze module?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Met deze module kunt u Domain Price Sync rechtstreeks vanuit uw WHMCS-beheergebied beheren.';
$_ADDONLANG['HELP_CONFIG']        = 'Hoe configureer ik de module-instellingen?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Ga naar het tabblad Instellingen om opties zoals API-toegang, geautomatiseerde taken en logboekretentie aan te passen.';
$_ADDONLANG['HELP_HEALTH']        = 'Hoe werken database-statuscontroles?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Gebruik de Systeem-statuscontrole om het databaseschema, de tabellen en kolommen te controleren en te verifiëren of module-afhankelijkheden correct zijn geïnstalleerd.';
$_ADDONLANG['HELP_SUPPORT']       = 'Waar kan ik ondersteuning vinden?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'Neem voor vragen, probleemoplossing of updates contact op met het ondersteuningsteam via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Belangrijke mededeling';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Zorg ervoor dat u na het upgraden van de module een statuscontrole en database-reparatie uitvoert om schemafouten te voorkomen.';

$_ADDONLANG['INFO_TITLE']       = 'Prijsaanpassingsgids';
$_ADDONLANG['INFO_INTRO']       = 'Om u altijd eerlijke voorwaarden te bieden, worden onze domeinverlengingsprijzen regelmatig gesynchroniseerd met de inkoopprijzen van de registrars. Dit resulteert in de volgende transparante stappen:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatische prijscontrole';
$_ADDONLANG['INFO_STEP1_DESC']  = 'Het systeem vraagt regelmatig de actuele inkoopprijzen voor elke TLD (bijv. .de, .com) op bij onze registrars.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synchronisatie van verlengingskosten';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Als de inkoopvoorwaarden wijzigen, wordt uw terugkerende verlengingsprijs automatisch in het systeem herberekend en aangepast.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Transparante geschiedenis';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Elke prijsaanpassing wordt hier in het logboek op de cent nauwkeurig gedocumenteerd met de oude prijs, de nieuwe prijs en het verschil.';
$_ADDONLANG['INFO_SUPPORT']     = 'Als u vragen heeft over prijsaanpassingen of individuele facturen, staat onze support altijd voor u klaar.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'We publiceren alle prijswijzigingen transparant en anoniem.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Bekijk openbare statistieken';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-mailsjablonen';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Open en bewerk de WHMCS-e-mailsjablonen die worden gebruikt tijdens live synchronisatie. Beschikbare variabelen: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Melding bij prijsverhoging';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Melding bij prijsverlaging';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Sjabloon bewerken';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Sjabloon niet gevonden in de database. Voer een reparatie uit bij Systeem-statuscontrole.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Voorbeeldlinks voor klant- en openbare pagina';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Directe voorbeeldlinks naar het logoverzicht voor klanten en de openbare transparantiepagina.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Besloten klantpagina (inloggen vereist)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Toont persoonlijke domeinprijsaanpassingen aan ingelogde klanten (vereist dat klantweergave is geactiveerd).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Openbare transparantiepagina (gasten en klanten)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Toont geanonimiseerde statistieken over prijsaanpassingen openbaar (vereist dat transparantiepagina is geactiveerd).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Actief';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inactief';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Pagina openen';
$_ADDONLANG['BTN_COPY_URL']             = 'URL kopiëren';
$_ADDONLANG['TXT_URL_COPIED']           = 'Gekopieerd';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Klantgedeelte-sjabloon';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Kies de sjabloon voor klant- en openbare pagina\'s op basis van de submappen in templates/. Automatische detectie zoekt het actieve WHMCS-thema op en valt anders terug op six.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automatische detectie (WHMCS-thema: {whmcs_tpl}, gebruikt: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Standaard)';
