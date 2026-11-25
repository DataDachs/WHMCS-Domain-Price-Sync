<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Estonian.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Domeeni hinna sünkroniseerimine',
    'DESCRIPTION'                    => 'Sünkroniseerib ja arvutab automaatselt ümber kliendi domeenide korduvad hinnad vastavalt konfigureeritud TLD hinnastutele.',
    'DROP_TABLES'                    => 'Kustuta tabelid deaktiveerimisel',
    'DROP_TABLES_DESC'               => 'Märkige see, et kustutada kõik mooduli andmed, seaded ja logid mooduli deaktiveerimisel.',
    'DEBUG_MODE'                     => 'Silumisrežiim',
    'DEBUG_MODE_DESC'                => 'Aktiveerib silumislogide kirjutamise ja üksikasjalikud veateated.',

    // Tabs
    'TAB_SYNC'                       => 'Hinna sünkroniseerimine',
    'TAB_LOGS'                       => 'Logid',
    'TAB_SETTINGS'                   => 'Seaded ja erandid',
    'TAB_HEALTH'                     => 'Süsteemi tervisekontroll',

    // Buttons & Actions
    'BTN_RUN_AUDIT'                  => 'Käivita audit',
    'BTN_REPAIR_DB'                  => 'Paranda andmebaas',
    'BTN_SAVE_SETTINGS'              => 'Salvesta seaded',
    'BTN_RUN_DRY_RUN'                => 'Käivita proovikäivitus',
    'BTN_RUN_LIVE_SYNC'              => 'Käivita reaalajas sünkroniseerimine',
    'BTN_DELETE_LOGS'                => 'Kustuta logid',
    'BTN_EXPORT_CSV'                 => 'Ekspordi CSV',

    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER'            => 'Domeeni staatuse filter',
    'DESC_STATUS_FILTER'             => 'Komaga eraldatud nimekiri kaasatavatest domeeni staatustest (nt Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Väljajäetavad kliendi ID-d',
    'DESC_EXCLUDE_CLIENTS'           => 'Komaga eraldatud nimekiri ignoreeritavatest kliendi ID-dest.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Väljajäetavad domeeni ID-d',
    'DESC_EXCLUDE_DOMAINS'           => 'Komaga eraldatud nimekiri ignoreeritavatest domeeni ID-dest.',
    'LABEL_EXCLUDE_TLDS'             => 'Väljajäetavad TLD-d',
    'DESC_EXCLUDE_TLDS'              => 'Komaga eraldatud nimekiri ignoreeritavatest TLD-dest (nt .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Jäta kampaaniadomeenid vahele',
    'DESC_SKIP_PROMO'                => 'Jätab vahele domeenid, millele on määratud kampaania- või sooduskood.',
    'LABEL_SKIP_FREE'                => 'Jäta tasuta domeenid vahele',
    'DESC_SKIP_FREE'                 => 'Jätab vahele domeenid, mille praegune korduv hind on 0,00. See kaitseb tasuta või kaasasolevaid domeene soovimatu hinnamuutuse eest.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Näita ainult muutusi',
    'DESC_SHOW_ONLY_CHANGES'         => 'Näitab proovikäivitusel ainult domeene, kus arvutatud hind erineb praegusest hinnast.',
    'LABEL_ALLOW_DECREASES'          => 'Luba hinnaalandusi',
    'DESC_ALLOW_DECREASES'           => 'Lubab hinna uuendamist, kui arvutatud uuendushind on madalam kui praegune hind. Kui keelatud, jäetakse hinnaalandused vahele.',
    'TXT_CONFIRM_LIVE'               => 'Kas olete kindel, et soovite käivitada reaalajas sünkroniseerimise? See kirjutab üle kliendi domeenide korduvad hinnad ja saadab hinnamuudatuse e-kirjad!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Kas olete kindel, et soovite kõik logid kustutada?',
    'TXT_CONFIRM_ACTION'             => 'Kinnitan ja volitan domeenihindade uuendamise.',

    // Status badges & notifications
    'STATUS_PASS'                    => 'Läbitud',
    'STATUS_WARN'                    => 'Hoiatus',
    'STATUS_FAIL'                    => 'Ebaõnnestumine',
    'TXT_SETTINGS_SAVED'             => 'Seaded edukalt salvestatud.',
    'TXT_LOGS_DELETED'               => 'Kõik logid edukalt kustutatud.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Andmebaas ja e-kirja mallid edukalt parandatud.',
    'ERROR_CSRF'                     => 'CSRF tokeni valideerimine ebaõnnestus.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Palun valige reaalajas sünkroniseerimiseks vähemalt üks domeen.',
    'ERROR_LICENSE_INVALID'          => 'Vigane litsentsivõti',
    'ERROR_LICENSE_DESC'             => 'Palun sisestage kehtiv premium Domain Price Sync litsentsivõti mooduli konfiguratsiooni valikutes.',

    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED'          => 'Proovikäivitus lõpetatud. Arvutatud: {total} domeeni. Vajalikud uuendused: {updates}. Vahele jäetud: {skipped}. Vead: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Reaalajas sünkroniseerimine lõpetatud! Töödeldud: {total} domeeni. Uuendatud: {updates}. Vahele jäetud: {skipped}. Vead: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'See on proovikäivitus. Andmebaasi muudatusi ei tehtud.',
    'TXT_LIVE_SYNC_WARNING'          => 'Reaalajas sünkroniseerimine käimas! Kliendi domeenide hinnad arvutatakse ümber ja uuendatakse. Kõigile hinnamuutustele saadetakse teavituskirjad.',
    'TXT_NO_LOGS_FOUND'              => 'Logisid ei leitud.',
    'TXT_NO_RESULTS_FOUND'           => 'Selle filtri jaoks logisid ei leitud.',
    'TXT_LOGS_DESCRIPTION'           => 'Kuvab eelmiste proovikäivituste ja reaalajas sünkroniseerimiste logid.',
    'TXT_CHECKBOX_ENABLE'            => 'Aktiveeri see erandi seade',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Palun kinnitage toiming, märkides ruudu.',
    'TXT_ERROR_DB_REPAIR'            => 'Andmebaasi parandamise viga: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Logide kustutamise viga: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Tundmatu viga',
    'TXT_API_UPDATE_ERROR'           => 'API viga UpdateClientDomain ajal',

    // Health Check
    'HEALTH_CHECK_TITLE'             => 'Süsteemi tervisekontroll',
    'HEALTH_ERRORS_DETECTED'         => '{count} viga leitud. Kohene tegutsemine on vajalik.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} hoiatust leitud. Süsteem toimib, kuid optimeerimisi soovitatakse.',
    'HEALTH_ALL_PASSED'              => 'Kõik kontrollid läbitud. Teie süsteem on korras.',
    'HEALTH_MODULE_VERSION'          => 'Mooduli versioon',
    'HEALTH_LICENSE_STATUS'          => 'Litsentsi staatus',
    'HEALTH_INTEGRATION_CHECK'       => 'GetTLDPricing API integratsioon',
    'HEALTH_PHP_VERSION'             => 'PHP versiooni kontroll',
    'HEALTH_PHP_VERSION_DESC'        => 'Nõuab PHP 8.2 või uuemat. Praegune versioon: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Seadete tabel (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Kontrollib, kas kohandatud seadete tabel on olemas.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Seadete tabeli skeem',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Kõik veerud olemas.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Puuduvad veerud: {columns}',
    'HEALTH_LOG_TABLE'               => 'Logide tabel (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Kontrollib, kas kohandatud logide tabel on olemas.',
    'HEALTH_LOG_SCHEMA'              => 'Logide tabeli skeem',
    'HEALTH_LOG_SCHEMA_OK'           => 'Kõik veerud olemas.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Puuduvad veerud: {columns}',
    'HEALTH_CORE_TABLE'              => 'WHMCS süsteemitabel: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Kontrollib, kas süsteemitabel {table} on olemas.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-kirja mall: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Kontrollib, kas kohandatud e-kirja mall {name} on olemas tblemailtemplates tabelis.',
    'HEALTH_INTEGRATION_OK'          => 'API vastab ja tagastab hinnaandmeid.',
    'HEALTH_INTEGRATION_FAIL'        => 'API vastus: {message}',
    'HEALTH_DB_STATUS'               => 'Andmebaasi staatus',

    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED'    => 'Kogutud domeenid',
    'TXT_STATS_PRICE_CHANGES'        => 'Muudaks hinda',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Igakuine tulude vahe',
    'TXT_STATS_ERRORS'               => 'Vead / hoiatused',
    'TXT_STATS_UPDATED'              => 'Uuendatud hind',

    // Table Headers
    'TH_DOMAIN'                      => 'Domeen',
    'TH_CLIENT'                      => 'Klient',
    'TH_REGPERIOD'                   => 'Registreerimisperiood',
    'TH_OLD_AMOUNT'                  => 'Praegune korduv hind',
    'TH_NEW_AMOUNT'                  => 'Arvutatud hind',
    'TH_DIFFERENCE'                  => 'Vahe',
    'TH_STATUS'                      => 'Staatus',
    'TH_REASON'                      => 'Üksikasjad',
    'TH_DATE'                        => 'Kuupäev',
    'TH_RUN_TYPE'                    => 'Käivituse tüüp',

    // Status text in logs
    'STATUS_UPDATED'                 => 'Uuendatud',
    'STATUS_SKIPPED'                 => 'Vahele jäetud',
    'STATUS_ERROR'                   => 'Viga',
    'STATUS_MATCH'                   => 'Hind kattub',
    'STATUS_WOULD_UPDATE'            => 'Uuendataks',
    'STATUS_SKIPPED_DECREASE'        => 'Alandus vahele jäetud',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY'      => 'Aktiveeri avalik läbipaistvuse leht',
    'DESC_ENABLE_TRANSPARENCY'       => 'Aktiveerib avaliku külalistelehe aadressil index.php?m=spDomainPriceSync&action=transparency, mis kuvab anonümiseeritud hinnamuutuste statistikat.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Jaluse lingid külalistelehe jaoks',
    'DESC_GUEST_FOOTER_LINKS'        => 'Lisage navigatsioonilingid, mis kuvatakse avaliku läbipaistvuse lehe jaluses (nt õigusteave, privaatsuspoliitika).',
    'GUEST_FOOTER_LABEL'             => 'Lingi silt',
    'GUEST_FOOTER_ADD'               => 'Lisa link',
    'GUEST_PAGE_TITLE'               => 'Domeenihindade läbipaistvus',
    'GUEST_PAGE_SUBTITLE'            => 'Hinnamuutused registraatori sünkroniseerimise teel',
    'GUEST_PAGE_INTRO'               => 'Sellel lehel avaldame läbipaistvalt hiljutised hinnamuutused domeenide uuendamisel. Hinna sünkroniseerimine toimub automaatselt meie registraatorite hulgihindade alusel.',
    'GUEST_LAST_SYNC'                => 'Viimane sünkroniseerimine',
    'GUEST_NO_DATA'                  => 'Hinnamuutusi pole veel registreeritud.',
    'GUEST_RATIO_TITLE'              => 'Hinnamuutused suuna järgi',
    'GUEST_STATS_TLD_TITLE'          => 'Kuva statistika domeeni laiendi (TLD) järgi',
    'GUEST_INCREASES'                => 'Tõusud',
    'GUEST_DECREASES'                => 'Langused',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID'         => 'Filtreeri kliendi ID järgi',
    'BTN_FILTER'                     => 'Filtreeri',
    'BTN_RESET_FILTER'               => 'Lähtesta filter',
    'CLIENT_TITLE'                   => 'Domeenihinna muudatuste logi',
    'CLIENT_DESC'                    => 'See leht kuvab teie domeenidele rakendatud automaatsete hinnamuutuste ajalugu vastavalt registraatorite praegustele hindadele.',
    'CLIENT_NO_LOGS'                 => 'Teie domeenide kohta pole hinnamuutusi registreeritud.',
    'CLIENT_COL_DATE'                => 'Kuupäev',
    'CLIENT_COL_DOMAIN'              => 'Domeeninimi',
    'CLIENT_COL_OLD_PRICE'           => 'Eelmine uuendushind',
    'CLIENT_COL_NEW_PRICE'           => 'Uus uuendushind',
    'CLIENT_COL_DIFFERENCE'          => 'Vahe',
    'CLIENT_COL_STATUS'              => 'Staatus',
    'CLIENT_COL_DETAILS'             => 'Muudatuse üksikasjad',
    'CLIENT_STATUS_UPDATED'          => 'Uuendatud',
    'FILTER_SEARCH'                  => 'Otsi...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS'       => 'Aktiveeri kliendi hinnamuutuste vaade',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Aktiveerib lehe kliendialal aadressil index.php?m=spDomainPriceSync, kus sisseloginud kliendid saavad vaadata oma domeenide hinnamuutuste ajalugu.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Domeenihindade läbipaistvus',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Abi';
$_ADDONLANG['HELP_TITLE']         = 'Abi ja dokumentatsioon';
$_ADDONLANG['HELP_WHAT']          = 'Mida see moodul teeb?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'See moodul võimaldab teil hallata Domain Price Sync otse oma WHMCS-i administraatorialast.';
$_ADDONLANG['HELP_CONFIG']        = 'Kuidas mooduli seadeid konfigureerida?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Avage vahekaart Seaded, et kohandada selliseid valikuid nagu API juurdepääs, automatiseeritud toimingud ja logide säilitamine.';
$_ADDONLANG['HELP_HEALTH']        = 'Kuidas andmebaasi tervisekontrollid töötavad?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Kasutage süsteemi tervisekontrolli andmebaasi skeemi, tabelite ja veergude auditeerimiseks ning kontrollimiseks, kas mooduli sõltuvused on õigesti installitud.';
$_ADDONLANG['HELP_SUPPORT']       = 'Kust ma saan tuge?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'Küsimuste, tõrkeotsingu või uuenduste saamiseks võtke ühendust tugimeeskonnaga aadressil support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Tähtis teadaanne';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Pärast mooduli värskendamist käivitage kindlasti terviseaudit ja andmebaasi parandamine, et vältida skeemivigu.';

$_ADDONLANG['INFO_TITLE']       = 'Hinnakorrigeerimise juhend';
$_ADDONLANG['INFO_INTRO']       = 'Et pakkuda teile alati õiglasi tingimusi, sünkroniseeritakse meie domeeni pikendamise hinnad regulaarselt registripidajate ostuhindadega. Selle tulemuseks on järgmised läbipaistvad sammud:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automaatne hinnakontroll';
$_ADDONLANG['INFO_STEP1_DESC']  = 'Süsteem pärib regulaarselt meie registripidajatelt iga TLD (nt .de, .com) praeguseid ostuhindu.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Pikendamistasude sünkroniseerimine';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Ostutingimuste muutumisel arvutatakse süsteemis teie korduv pikendamishind automaatselt ümber ja kohandatakse.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Läbipaistev ajalugu';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Iga hinnakorrigeerimine dokumenteeritakse siin logis sendi täpsusega, näidates vana hinda, uut hinda ja erinevust.';
$_ADDONLANG['INFO_SUPPORT']     = 'Kui teil on küsimusi hinnakorrigeerimiste või üksikute arvete kohta, on meie tugi alati teie käsutuses.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Avaldame kõik hinnamuutused läbipaistvalt ja anonüümselt.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Vaata avalikku statistikat';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-posti mallid';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Avage ja kohandage reaalajas sünkroonimisel kasutatavaid WHMCS-i e-posti malle. Saadaolevad muutujad: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Hinnatõusu teavitus';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Hinnalanguse teavitus';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Muuda malli';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Malli ei leitud andmebaasist. Palun käivitage parandus Süsteemi tervisekontrolli all.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Kliendi- ja avaliku lehe näidislingid';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Otsesed näidislingid kliendi logivaatele ja avalikule läbipaistvuse lehele.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Privaatne kliendileht (nõuab sisselogimist)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Kuvab sisseloginud klientidele nende domeenide hinnakorrigeerimise logisid (nõuab kliendivaate lubamist).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Avalik läbipaistvusleht (külalised ja kliendid)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Kuvab avalikult anonüümseid domeenide hinnakorrigeerimise andmeid (nõuab avaliku lehe lubamist).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Aktiivne';
$_ADDONLANG['STATUS_INACTIVE']          = 'Mitteaktiivne';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Ava leht';
$_ADDONLANG['BTN_COPY_URL']             = 'Kopeeri URL';
$_ADDONLANG['TXT_URL_COPIED']           = 'Kopeeritud';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Kliendiala mall';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Valige kliendi- ja avalike lehtede mall kaustas templates/ olevate alamkaustade põhjal. Automaattuvastus valib aktiivse WHMCS-i teema kausta ja kasutab vaikeväärtusena malli six.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automaatne tuvastus (WHMCS-i teema: {whmcs_tpl}, kasutusel: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Vaikimisi)';
