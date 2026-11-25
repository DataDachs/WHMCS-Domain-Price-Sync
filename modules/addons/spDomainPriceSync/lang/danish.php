<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Danish.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Domænepris-synkronisering',
    'DESCRIPTION'                    => 'Synkroniserer og genberegner automatisk tilbagevendende priser for kundedomæner baseret på de konfigurerede TLD-priser.',
    'DROP_TABLES'                    => 'Slet tabeller ved deaktivering',
    'DROP_TABLES_DESC'               => 'Markér dette for at slette alle moduldata, indstillinger og logfiler ved deaktivering af modulet.',
    'DEBUG_MODE'                     => 'Fejlsøgningstilstand',
    'DEBUG_MODE_DESC'                => 'Aktiverer skrivning af fejlsøgningslogfiler og detaljerede fejlmeddelelser.',

    // Tabs
    'TAB_SYNC'                       => 'Prissynkronisering',
    'TAB_LOGS'                       => 'Logfiler',
    'TAB_SETTINGS'                   => 'Indstillinger og undtagelser',
    'TAB_HEALTH'                     => 'Systemsundhedstjek',

    // Buttons & Actions
    'BTN_RUN_AUDIT'                  => 'Kør revision',
    'BTN_REPAIR_DB'                  => 'Reparer database',
    'BTN_SAVE_SETTINGS'              => 'Gem indstillinger',
    'BTN_RUN_DRY_RUN'                => 'Start testkørsel',
    'BTN_RUN_LIVE_SYNC'              => 'Udfør live-synkronisering',
    'BTN_DELETE_LOGS'                => 'Slet logfiler',
    'BTN_EXPORT_CSV'                 => 'Eksportér CSV',

    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER'            => 'Domænestatusfilter',
    'DESC_STATUS_FILTER'             => 'Kommasepareret liste over domænestatusser, der skal inkluderes (f.eks. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Ekskludér kunde-ID\'er',
    'DESC_EXCLUDE_CLIENTS'           => 'Kommasepareret liste over kunde-ID\'er, der skal ignoreres.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Ekskludér domæne-ID\'er',
    'DESC_EXCLUDE_DOMAINS'           => 'Kommasepareret liste over domæne-ID\'er, der skal ignoreres.',
    'LABEL_EXCLUDE_TLDS'             => 'Ekskludér TLD\'er',
    'DESC_EXCLUDE_TLDS'              => 'Kommasepareret liste over TLD\'er, der skal ignoreres (f.eks. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Spring kampagnedomæner over',
    'DESC_SKIP_PROMO'                => 'Springer domæner over, der har en tildelt kampagne- eller rabatkode.',
    'LABEL_SKIP_FREE'                => 'Spring gratis domæner over',
    'DESC_SKIP_FREE'                 => 'Springer domæner over, der aktuelt har en tilbagevendende pris på 0,00. Dette beskytter gratis eller inkluderede domæner mod utilsigtet prisændring.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Vis kun ændringer',
    'DESC_SHOW_ONLY_CHANGES'         => 'Viser i testkørslen kun domæner, hvor den beregnede pris afviger fra den aktuelle pris.',
    'LABEL_ALLOW_DECREASES'          => 'Tillad prisnedsættelser',
    'DESC_ALLOW_DECREASES'           => 'Tillader prisoppdatering, når den beregnede fornyelsespris er lavere end den aktuelle pris. Hvis deaktiveret, springes prisnedsættelser over.',
    'TXT_CONFIRM_LIVE'               => 'Er du sikker på, at du vil køre live-synkroniseringen? Dette overskriver de tilbagevendende priser for kundedomæner og sender e-mails om prisopdateringer!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Er du sikker på, at du vil slette alle logfiler?',
    'TXT_CONFIRM_ACTION'             => 'Jeg bekræfter og autoriserer opdateringen af domænepriserne.',

    // Status badges & notifications
    'STATUS_PASS'                    => 'Bestået',
    'STATUS_WARN'                    => 'Advarsel',
    'STATUS_FAIL'                    => 'Fejl',
    'TXT_SETTINGS_SAVED'             => 'Indstillinger gemt.',
    'TXT_LOGS_DELETED'               => 'Alle logfiler slettet.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Database og e-mailskabeloner repareret.',
    'ERROR_CSRF'                     => 'CSRF-tokenvalidering mislykkedes.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Vælg venligst mindst ét domæne for at køre live-synkroniseringen.',
    'ERROR_LICENSE_INVALID'          => 'Ugyldig licensnøgle',
    'ERROR_LICENSE_DESC'             => 'Indtast venligst en gyldig premium Domain Price Sync licensnøgle i modulets konfigurationsindstillinger.',

    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED'          => 'Testkørsel afsluttet. Beregnet: {total} domæner. Opdateringer nødvendige: {updates}. Sprunget over: {skipped}. Fejl: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Live-synkronisering afsluttet! Behandlet: {total} domæner. Opdateret: {updates}. Sprunget over: {skipped}. Fejl: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Dette er en testkørsel. Der er ikke foretaget ændringer i databasen.',
    'TXT_LIVE_SYNC_WARNING'          => 'Live-synkronisering kører! Kundedomænepriser genberegnes og opdateres. Notifikations-e-mails sendes for alle prisopdateringer.',
    'TXT_NO_LOGS_FOUND'              => 'Ingen logfiler fundet.',
    'TXT_NO_RESULTS_FOUND'           => 'Ingen logfiler fundet for dette filter.',
    'TXT_LOGS_DESCRIPTION'           => 'Viser logfiler over tidligere testkørsler og live-synkroniseringer.',
    'TXT_CHECKBOX_ENABLE'            => 'Aktivér denne undtagelsesindstilling',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Bekræft venligst handlingen ved at markere afkrydsningsfeltet.',
    'TXT_ERROR_DB_REPAIR'            => 'Fejl ved databasereparation: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Fejl ved sletning af logfiler: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Ukendt fejl',
    'TXT_API_UPDATE_ERROR'           => 'API-fejl under UpdateClientDomain',

    // Health Check
    'HEALTH_CHECK_TITLE'             => 'Systemsundhedstjek',
    'HEALTH_ERRORS_DETECTED'         => '{count} fejl opdaget. Øjeblikkelig handling er påkrævet.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} advarsler opdaget. Systemet er funktionelt, men optimeringer anbefales.',
    'HEALTH_ALL_PASSED'              => 'Alle tjek bestået. Dit system er fejlfrit.',
    'HEALTH_MODULE_VERSION'          => 'Modulversion',
    'HEALTH_LICENSE_STATUS'          => 'Licensstatus',
    'HEALTH_INTEGRATION_CHECK'       => 'GetTLDPricing API-integration',
    'HEALTH_PHP_VERSION'             => 'PHP-versionskontrol',
    'HEALTH_PHP_VERSION_DESC'        => 'Kræver PHP 8.2 eller nyere. Aktuel version: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Indstillingstabel (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Kontrollerer om den tilpassede indstillingstabel eksisterer.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Indstillingstabel-skema',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Alle kolonner eksisterer.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Manglende kolonner: {columns}',
    'HEALTH_LOG_TABLE'               => 'Logfiltabel (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Kontrollerer om den tilpassede logfiltabel eksisterer.',
    'HEALTH_LOG_SCHEMA'              => 'Logfiltabel-skema',
    'HEALTH_LOG_SCHEMA_OK'           => 'Alle kolonner eksisterer.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Manglende kolonner: {columns}',
    'HEALTH_CORE_TABLE'              => 'WHMCS-systemtabel: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Kontrollerer om systemtabellen {table} eksisterer.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-mailskabelon: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Kontrollerer om den tilpassede e-mailskabelon {name} eksisterer i tblemailtemplates.',
    'HEALTH_INTEGRATION_OK'          => 'API svarer og returnerer prisdata.',
    'HEALTH_INTEGRATION_FAIL'        => 'API-svar: {message}',
    'HEALTH_DB_STATUS'               => 'Databasestatus',

    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED'    => 'Indsamlede domæner',
    'TXT_STATS_PRICE_CHANGES'        => 'Ville ændre pris',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Månedlig omsætningsforskel',
    'TXT_STATS_ERRORS'               => 'Fejl / advarsler',
    'TXT_STATS_UPDATED'              => 'Opdateret pris',

    // Table Headers
    'TH_DOMAIN'                      => 'Domæne',
    'TH_CLIENT'                      => 'Kunde',
    'TH_REGPERIOD'                   => 'Registreringsperiode',
    'TH_OLD_AMOUNT'                  => 'Aktuel tilbagevendende pris',
    'TH_NEW_AMOUNT'                  => 'Beregnet pris',
    'TH_DIFFERENCE'                  => 'Forskel',
    'TH_STATUS'                      => 'Status',
    'TH_REASON'                      => 'Detaljer',
    'TH_DATE'                        => 'Dato',
    'TH_RUN_TYPE'                    => 'Kørelsestype',

    // Status text in logs
    'STATUS_UPDATED'                 => 'Opdateret',
    'STATUS_SKIPPED'                 => 'Sprunget over',
    'STATUS_ERROR'                   => 'Fejl',
    'STATUS_MATCH'                   => 'Pris matcher',
    'STATUS_WOULD_UPDATE'            => 'Ville opdatere',
    'STATUS_SKIPPED_DECREASE'        => 'Nedsættelse sprunget over',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY'      => 'Aktivér offentlig transparensside',
    'DESC_ENABLE_TRANSPARENCY'       => 'Aktiverer en offentlig gæsteside under index.php?m=spDomainPriceSync&action=transparency, der viser anonymiserede prisændringsstatistikker.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Fodlinks til gæstesiden',
    'DESC_GUEST_FOOTER_LINKS'        => 'Tilføj navigationslinks, der vises i bunden af den offentlige transparensside (f.eks. juridiske oplysninger, privatlivspolitik).',
    'GUEST_FOOTER_LABEL'             => 'Linktekst',
    'GUEST_FOOTER_ADD'               => 'Tilføj link',
    'GUEST_PAGE_TITLE'               => 'Domænepriser transparens',
    'GUEST_PAGE_SUBTITLE'            => 'Prisjusteringer via registrar-synkronisering',
    'GUEST_PAGE_INTRO'               => 'På denne side offentliggør vi gennemsigtigt de seneste prisjusteringer for domænefornyelser. Prissynkronisering udføres automatisk baseret på engrossatserne fra vores tilsluttede registrarer.',
    'GUEST_LAST_SYNC'                => 'Seneste synkronisering',
    'GUEST_NO_DATA'                  => 'Der er endnu ikke registreret nogen prisjusteringer.',
    'GUEST_RATIO_TITLE'              => 'Prisjusteringer efter retning',
    'GUEST_STATS_TLD_TITLE'          => 'Vis statistikker efter domæneendelse (TLD)',
    'GUEST_INCREASES'                => 'Stigninger',
    'GUEST_DECREASES'                => 'Fald',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID'         => 'Filtrer efter kunde-ID',
    'BTN_FILTER'                     => 'Filtrer',
    'BTN_RESET_FILTER'               => 'Nulstil filter',
    'CLIENT_TITLE'                   => 'Log over domæne-prisjusteringer',
    'CLIENT_DESC'                    => 'Denne side viser historikken over automatiske prisjusteringer, der er anvendt på dine domæner for at matche aktuelle registrar-priser.',
    'CLIENT_NO_LOGS'                 => 'Der er ingen prisjusteringer registreret for dine domæner.',
    'CLIENT_COL_DATE'                => 'Dato',
    'CLIENT_COL_DOMAIN'              => 'Domænenavn',
    'CLIENT_COL_OLD_PRICE'           => 'Tidligere fornyelsespris',
    'CLIENT_COL_NEW_PRICE'           => 'Ny fornyelsespris',
    'CLIENT_COL_DIFFERENCE'          => 'Forskel',
    'CLIENT_COL_STATUS'              => 'Status',
    'CLIENT_COL_DETAILS'             => 'Justeringsdetaljer',
    'CLIENT_STATUS_UPDATED'          => 'Opdateret',
    'FILTER_SEARCH'                  => 'Søg...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS'       => 'Aktivér kundevisning af prisjusteringer',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Aktiverer en side i kundeområdet under index.php?m=spDomainPriceSync, hvor loggede kunder kan se historikken over domæne-prisjusteringer.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Domænepriser transparens',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Hjælp';
$_ADDONLANG['HELP_TITLE']         = 'Hjælp & Dokumentation';
$_ADDONLANG['HELP_WHAT']          = 'Hvad gør dette modul?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Dette modul giver dig mulighed for at administrere Domain Price Sync direkte fra dit WHMCS-administrationsområde.';
$_ADDONLANG['HELP_CONFIG']        = 'Hvordan konfigurerer jeg modulindstillingerne?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Gå til fanen Indstillinger for at justere indstillinger som API-adgang, automatiserede opgaver og logretention.';
$_ADDONLANG['HELP_HEALTH']        = 'Hvordan fungerer database-sundhedskontroller?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Brug systemsundhedskontrollen til at kontrollere databaseskemaer, tabeller og kolonner og bekræfte, at modulafhængigheder er korrekt installeret.';
$_ADDONLANG['HELP_SUPPORT']       = 'Hvor kan jeg finde support?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'For spørgsmål, fejlfinding eller opdateringer, bedes du kontakte supportteamet via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Vigtig meddelelse';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Sørg for at udføre en sundhedskontrol og databasereparation efter opgradering af modulet for at forhindre skemafejl.';

$_ADDONLANG['INFO_TITLE']       = 'Prisjusteringsguide';
$_ADDONLANG['INFO_INTRO']       = 'For altid at tilbyde dig rimelige vilkår synkroniseres vores domænefornyelsespriser regelmæssigt med registratorernes indkøbspriser. Dette resulterer i følgende gennemsigtige trin:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatisk priskontrol';
$_ADDONLANG['INFO_STEP1_DESC']  = 'Systemet forespørger regelmæssigt de aktuelle indkøbspriser for hver TLD (f.eks. .de, .com) hos vores registratorer.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synkronisering af fornyelsesgebyrer';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Hvis indkøbsbetingelserne ændres, genberegnes og justeres din løbende fornyelsespris automatisk i systemet.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Gennemsigtig historik';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Enhver prisjustering er dokumenteret her i loggen med cent-præcision, der viser den gamle pris, den nye pris og forskellen.';
$_ADDONLANG['INFO_SUPPORT']     = 'Hvis du har spørgsmål til prisjusteringer eller enkelte fakturaer, er vores support altid til din rådighed.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Vi offentliggør alle prisændringer gennemsigtigt og anonymt.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Vis offentlige statistikker';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-mail-skabeloner';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Åbn og tilpas WHMCS-e-mail-skabelonerne, der bruges ved live synkronisering. Tilgængelige variabler: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Meddelelse ved prisstigning';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Meddelelse ved prisfald';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Rediger skabelon';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Skabelon ikke fundet i databasen. Kør venligst en reparation under System-sundhedskontrol.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Eksempellinks til kunde- og offentlig side';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Direkte eksempellinks til kundens logvisning og den offentlige gennemsigtighedsside.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Privat kundeside (login påkrævet)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Viser personlige prisjusteringslogs for indloggede kunder (kræver aktivering af kundevisning).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Offentlig gennemsigtighedsside (gæster og kunder)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Viser anonymiserede statistikker for prisjusteringer offentligt (kræver aktivering af offentlig side).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Aktiv';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inaktiv';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Åbn side';
$_ADDONLANG['BTN_COPY_URL']             = 'Kopiér URL';
$_ADDONLANG['TXT_URL_COPIED']           = 'Kopieret';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Skabelon til kundeområde';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Vælg skabelon til kunde- og offentlige sider baseret på undermapperne i templates/. Ved automatisk genkendelse bruges det aktive WHMCS-tema, med six som standard.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automatisk genkendelse (WHMCS-tema: {whmcs_tpl}, aktiv: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Standard)';
