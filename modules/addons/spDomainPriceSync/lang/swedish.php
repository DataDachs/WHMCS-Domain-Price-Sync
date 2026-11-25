<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Swedish.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Domänprissynkronisering',
    'DESCRIPTION'                    => 'Synkroniserar och räknar automatiskt om återkommande priser för kunddomäner baserat på konfigurerade TLD-priser.',
    'DROP_TABLES'                    => 'Radera tabeller vid avaktivering',
    'DROP_TABLES_DESC'               => 'Markera för att radera all moduldata, inställningar och loggar vid avaktivering av modulen.',
    'DEBUG_MODE'                     => 'Felsökningsläge',
    'DEBUG_MODE_DESC'                => 'Aktiverar skrivning av felsökningsloggar och detaljerade felmeddelanden.',

    'TAB_SYNC'                       => 'Prissynkronisering',
    'TAB_LOGS'                       => 'Loggar',
    'TAB_SETTINGS'                   => 'Inställningar och undantag',
    'TAB_HEALTH'                     => 'Systemhälsokontroll',

    'BTN_RUN_AUDIT'                  => 'Kör revision',
    'BTN_REPAIR_DB'                  => 'Reparera databas',
    'BTN_SAVE_SETTINGS'              => 'Spara inställningar',
    'BTN_RUN_DRY_RUN'                => 'Starta testkörning',
    'BTN_RUN_LIVE_SYNC'              => 'Utför live-synkronisering',
    'BTN_DELETE_LOGS'                => 'Radera loggar',
    'BTN_EXPORT_CSV'                 => 'Exportera CSV',

    'LABEL_STATUS_FILTER'            => 'Domänstatusfilter',
    'DESC_STATUS_FILTER'             => 'Kommaseparerad lista över domänstatusar att inkludera (t.ex. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Exkludera kund-ID:n',
    'DESC_EXCLUDE_CLIENTS'           => 'Kommaseparerad lista över kund-ID:n att ignorera.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Exkludera domän-ID:n',
    'DESC_EXCLUDE_DOMAINS'           => 'Kommaseparerad lista över domän-ID:n att ignorera.',
    'LABEL_EXCLUDE_TLDS'             => 'Exkludera TLD:er',
    'DESC_EXCLUDE_TLDS'              => 'Kommaseparerad lista över TLD:er att ignorera (t.ex. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Hoppa över kampanjdomäner',
    'DESC_SKIP_PROMO'                => 'Hoppar över domäner med en tilldelad kampanj- eller rabattkod.',
    'LABEL_SKIP_FREE'                => 'Hoppa över gratisdomäner',
    'DESC_SKIP_FREE'                 => 'Hoppar över domäner med ett nuvarande återkommande pris på 0,00. Detta skyddar gratis eller inkluderade domäner mot oönskade prisändringar.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Visa endast ändringar',
    'DESC_SHOW_ONLY_CHANGES'         => 'I testkörningen visas bara domäner där det beräknade priset skiljer sig från det nuvarande priset.',
    'LABEL_ALLOW_DECREASES'          => 'Tillåt prissänkningar',
    'DESC_ALLOW_DECREASES'           => 'Tillåter prisuppdateringar när det beräknade förnyelsepriset är lägre än det nuvarande priset. Om avaktiverat hoppas prissänkningar över.',
    'TXT_CONFIRM_LIVE'               => 'Är du säker på att du vill köra live-synkroniseringen? Detta kommer att skriva över de återkommande priserna för kunddomäner och skicka e-postmeddelanden om prisuppdateringar!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Är du säker på att du vill radera alla loggar?',
    'TXT_CONFIRM_ACTION'             => 'Jag bekräftar och godkänner uppdateringen av domänpriserna.',

    'STATUS_PASS'                    => 'Godkänd',
    'STATUS_WARN'                    => 'Varning',
    'STATUS_FAIL'                    => 'Fel',
    'TXT_SETTINGS_SAVED'             => 'Inställningar sparade.',
    'TXT_LOGS_DELETED'               => 'Alla loggar har raderats.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Databas och e-postmallar har reparerats.',
    'ERROR_CSRF'                     => 'CSRF-tokenvalidering misslyckades.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Välj minst en domän för att köra live-synkroniseringen.',
    'ERROR_LICENSE_INVALID'          => 'Ogiltig licensnyckel',
    'ERROR_LICENSE_DESC'             => 'Ange en giltig premium Domain Price Sync licensnyckel i modulens konfigurationsinställningar.',

    'TXT_DRY_RUN_COMPLETED'          => 'Testkörning avslutad. Beräknade: {total} domäner. Uppdateringar behövs: {updates}. Överhoppade: {skipped}. Fel: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Live-synkronisering avslutad! Behandlade: {total} domäner. Uppdaterade: {updates}. Överhoppade: {skipped}. Fel: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Detta är en testkörning. Inga ändringar har sparats i databasen.',
    'TXT_LIVE_SYNC_WARNING'          => 'Live-synkronisering pågår! Kunddomänpriser räknas om och uppdateras. Notifikationsmeddelanden skickas för alla prisuppdateringar.',
    'TXT_NO_LOGS_FOUND'              => 'Inga loggar hittades.',
    'TXT_NO_RESULTS_FOUND'           => 'Inga loggar hittades för detta filter.',
    'TXT_LOGS_DESCRIPTION'           => 'Visar loggar över tidigare testkörningar och live-synkroniseringar.',
    'TXT_CHECKBOX_ENABLE'            => 'Aktivera denna undantagsinställning',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Bekräfta åtgärden genom att markera kryssrutan.',
    'TXT_ERROR_DB_REPAIR'            => 'Fel vid databasreparation: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Fel vid radering av loggar: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Okänt fel',
    'TXT_API_UPDATE_ERROR'           => 'API-fel under UpdateClientDomain',

    'HEALTH_CHECK_TITLE'             => 'Systemhälsokontroll',
    'HEALTH_ERRORS_DETECTED'         => '{count} fel upptäckta. Omedelbar åtgärd krävs.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} varningar upptäckta. Systemet fungerar men optimeringar rekommenderas.',
    'HEALTH_ALL_PASSED'              => 'Alla kontroller godkända. Ditt system är i utmärkt skick.',
    'HEALTH_MODULE_VERSION'          => 'Modulversion',
    'HEALTH_LICENSE_STATUS'          => 'Licensstatus',
    'HEALTH_INTEGRATION_CHECK'       => 'GetTLDPricing API-integration',
    'HEALTH_PHP_VERSION'             => 'PHP-versionskontroll',
    'HEALTH_PHP_VERSION_DESC'        => 'Kräver PHP 8.2 eller senare. Nuvarande version: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Inställningstabell (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Kontrollerar om den anpassade inställningstabellen finns.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Inställningstabellschema',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Alla kolumner finns.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Saknade kolumner: {columns}',
    'HEALTH_LOG_TABLE'               => 'Loggtabell (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Kontrollerar om den anpassade loggtabellen finns.',
    'HEALTH_LOG_SCHEMA'              => 'Loggtabellschema',
    'HEALTH_LOG_SCHEMA_OK'           => 'Alla kolumner finns.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Saknade kolumner: {columns}',
    'HEALTH_CORE_TABLE'              => 'WHMCS-systemtabell: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Kontrollerar om systemtabellen {table} finns.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-postmall: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Kontrollerar om den anpassade e-postmallen {name} finns i tblemailtemplates.',
    'HEALTH_INTEGRATION_OK'          => 'API:et svarar och returnerar prisdata.',
    'HEALTH_INTEGRATION_FAIL'        => 'API-svar: {message}',
    'HEALTH_DB_STATUS'               => 'Databasstatus',

    'TXT_STATS_DOMAINS_COLLECTED'    => 'Insamlade domäner',
    'TXT_STATS_PRICE_CHANGES'        => 'Skulle ändra pris',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Månatlig intäktsskillnad',
    'TXT_STATS_ERRORS'               => 'Fel / varningar',
    'TXT_STATS_UPDATED'              => 'Uppdaterat pris',

    'TH_DOMAIN'                      => 'Domän',
    'TH_CLIENT'                      => 'Kund',
    'TH_REGPERIOD'                   => 'Registreringsperiod',
    'TH_OLD_AMOUNT'                  => 'Nuvarande återkommande pris',
    'TH_NEW_AMOUNT'                  => 'Beräknat pris',
    'TH_DIFFERENCE'                  => 'Skillnad',
    'TH_STATUS'                      => 'Status',
    'TH_REASON'                      => 'Detaljer',
    'TH_DATE'                        => 'Datum',
    'TH_RUN_TYPE'                    => 'Körningstyp',

    'STATUS_UPDATED'                 => 'Uppdaterad',
    'STATUS_SKIPPED'                 => 'Överhoppad',
    'STATUS_ERROR'                   => 'Fel',
    'STATUS_MATCH'                   => 'Priset matchar',
    'STATUS_WOULD_UPDATE'            => 'Skulle uppdateras',
    'STATUS_SKIPPED_DECREASE'        => 'Sänkning överhoppad',

    'LABEL_ENABLE_TRANSPARENCY'      => 'Aktivera offentlig transparenssida',
    'DESC_ENABLE_TRANSPARENCY'       => 'Aktiverar en offentlig gästsida under index.php?m=spDomainPriceSync&action=transparency som visar anonymiserad statistik över prisändringar.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Sidfotslänkar för gästsidan',
    'DESC_GUEST_FOOTER_LINKS'        => 'Lägg till navigationslänkar som visas i sidfoten på den offentliga transparenssidan (t.ex. juridisk information, integritetspolicy).',
    'GUEST_FOOTER_LABEL'             => 'Länktext',
    'GUEST_FOOTER_ADD'               => 'Lägg till länk',
    'GUEST_PAGE_TITLE'               => 'Domänpristransparens',
    'GUEST_PAGE_SUBTITLE'            => 'Prisjusteringar via registrarsynkronisering',
    'GUEST_PAGE_INTRO'               => 'På denna sida publicerar vi transparent de senaste prisjusteringarna för domänförnyelser. Prissynkroniseringen utförs automatiskt baserat på grossistpriserna från våra anslutna registrarer.',
    'GUEST_LAST_SYNC'                => 'Senaste synkronisering',
    'GUEST_NO_DATA'                  => 'Inga prisjusteringar har registrerats ännu.',
    'GUEST_RATIO_TITLE'              => 'Prisjusteringar per riktning',
    'GUEST_STATS_TLD_TITLE'          => 'Visa statistik per domänändelse (TLD)',
    'GUEST_INCREASES'                => 'Höjningar',
    'GUEST_DECREASES'                => 'Sänkningar',

    'LABEL_FILTER_CLIENT_ID'         => 'Filtrera efter kund-ID',
    'BTN_FILTER'                     => 'Filtrera',
    'BTN_RESET_FILTER'               => 'Återställ filter',
    'CLIENT_TITLE'                   => 'Logg över domänprisjusteringar',
    'CLIENT_DESC'                    => 'Denna sida visar historiken över automatiska prisjusteringar som tillämpats på dina domäner för att matcha registrarernas nuvarande priser.',
    'CLIENT_NO_LOGS'                 => 'Inga prisjusteringar har registrerats för dina domäner.',
    'CLIENT_COL_DATE'                => 'Datum',
    'CLIENT_COL_DOMAIN'              => 'Domännamn',
    'CLIENT_COL_OLD_PRICE'           => 'Tidigare förnyelsepris',
    'CLIENT_COL_NEW_PRICE'           => 'Nytt förnyelsepris',
    'CLIENT_COL_DIFFERENCE'          => 'Skillnad',
    'CLIENT_COL_STATUS'              => 'Status',
    'CLIENT_COL_DETAILS'             => 'Justeringsdetaljer',
    'CLIENT_STATUS_UPDATED'          => 'Uppdaterad',
    'FILTER_SEARCH'                  => 'Sök...',

    'LABEL_ENABLE_CLIENT_LOGS'       => 'Aktivera kundvy för prisjusteringar',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Aktiverar en sida i kundområdet under index.php?m=spDomainPriceSync där inloggade kunder kan se historiken för prisjusteringar av sina domäner.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Domänpristransparens',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Hjälp';
$_ADDONLANG['HELP_TITLE']         = 'Hjälp & dokumentation';
$_ADDONLANG['HELP_WHAT']          = 'Vad gör den här modulen?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Denna modul låter dig hantera Domain Price Sync direkt från ditt WHMCS-administrationsområde.';
$_ADDONLANG['HELP_CONFIG']        = 'Hur konfigurerar jag modulinställningarna?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Gå till fliken Inställningar för att justera alternativ som API-åtkomst, automatiserade uppgifter och loggbevarande.';
$_ADDONLANG['HELP_HEALTH']        = 'Hur fungerar databashälsokontroller?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Använd Systemhälsokontroll för att granska databasschema, tabeller, kolumner och verifiera att modulens beroenden är korrekt installerade.';
$_ADDONLANG['HELP_SUPPORT']       = 'Var kan jag hitta support?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'För frågor, felsökning eller uppdateringar, vänligen kontakta supportteamet via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Viktigt meddelande';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Se till att utföra en hälsokontroll och databasreparation efter uppgradering av modulen för att förhindra schemafel.';

$_ADDONLANG['INFO_TITLE']       = 'Prisjusteringsguide';
$_ADDONLANG['INFO_INTRO']       = 'För att alltid erbjuda dig rimliga villkor synkroniseres våra domänförnyelsepriser regelbundet med registratorernas inköpspriser. Detta resulterer i följande transparenta steg:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatisk priskontroll';
$_ADDONLANG['INFO_STEP1_DESC']  = 'Systemet frågar regelbundet efter aktuella inköpspriser för varje TLD (t.ex. .de, .com) hos våra registratorer.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synkronisering av förnyelseavgifter';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Om inköpsvillkoren ändras räknas ditt löpande förnyelsepris automatiskt om och justeras i systemet.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Transparent historik';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Varje prisjustering dokumenteras här i loggen med centprecision och visar det gamla priset, det nya priset och skillnaden.';
$_ADDONLANG['INFO_SUPPORT']     = 'Om du har frågor om prisjusteringar eller enskilda fakturor finns vår support alltid till din förfogande.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Vi publicerar alla prisändringar öppet och anonymt.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Visa offentlig statistik';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-postmallar';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Öppna och anpassa WHMCS-e-postmallarna som används vid livesynkronisering. Tillgängliga variabler: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Meddelande om prishöjning';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Meddelande om prissänkning';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Redigera mall';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Mallen hittades inte i databasen. Kör en reparation under Systemhälsokontroll.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Exempellänkar för kundsida och offentlig sida';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Direkta exempellänkar till kundens loggvy och den offentliga transparenssidan.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Privat kundsida (inloggning krävs)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Visar personlig historik över domänprisjusteringar för inloggade kunder (kräver att kundvyn är aktiverad).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Offentlig transparenssida (gäster och kunder)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Visar anonymiserad statistik över domänprisjusteringar offentligt (kräver att den offentliga sidan är aktiverad).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Aktiv';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inaktiv';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Öppna sida';
$_ADDONLANG['BTN_COPY_URL']             = 'Kopiera URL';
$_ADDONLANG['TXT_URL_COPIED']           = 'Kopierad';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Kundområdets mall';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Välj mall för kundsidan och den offentliga sidan baserat på undermapparna i templates/. Automatisk identifiering väljer det aktiva WHMCS-temat och använder six som standard.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automatisk identifiering (WHMCS-tema: {whmcs_tpl}, aktiv: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Standard)';
