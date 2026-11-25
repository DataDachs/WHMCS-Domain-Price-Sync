<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Hungarian.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Domain árszinkronizálás',
    'DESCRIPTION'                    => 'Automatikusan szinkronizálja és újraszámítja az ügyféldomain ismétlődő árait a konfigurált TLD-árlista alapján.',
    'DROP_TABLES'                    => 'Táblák törlése deaktiváláskor',
    'DROP_TABLES_DESC'               => 'Jelölje be az összes moduladat, beállítás és napló törléséhez a modul deaktiválásakor.',
    'DEBUG_MODE'                     => 'Hibakeresési mód',
    'DEBUG_MODE_DESC'                => 'Engedélyezi a hibakeresési naplók írását és a részletes hibaüzeneteket.',

    // Tabs
    'TAB_SYNC'                       => 'Árszinkronizálás',
    'TAB_LOGS'                       => 'Naplók',
    'TAB_SETTINGS'                   => 'Beállítások és kizárások',
    'TAB_HEALTH'                     => 'Rendszer állapotfelmérés',

    // Buttons & Actions
    'BTN_RUN_AUDIT'                  => 'Audit indítása',
    'BTN_REPAIR_DB'                  => 'Adatbázis javítása',
    'BTN_SAVE_SETTINGS'              => 'Beállítások mentése',
    'BTN_RUN_DRY_RUN'                => 'Próbafuttatás indítása',
    'BTN_RUN_LIVE_SYNC'              => 'Éles szinkronizálás végrehajtása',
    'BTN_DELETE_LOGS'                => 'Naplók törlése',
    'BTN_EXPORT_CSV'                 => 'CSV exportálás',

    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER'            => 'Domain állapotszűrő',
    'DESC_STATUS_FILTER'             => 'Vesszővel elválasztott lista a figyelembe veendő domain állapotokról (pl. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Kizárt ügyfél-azonosítók',
    'DESC_EXCLUDE_CLIENTS'           => 'Vesszővel elválasztott lista a figyelmen kívül hagyandó ügyfél-azonosítókról.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Kizárt domain-azonosítók',
    'DESC_EXCLUDE_DOMAINS'           => 'Vesszővel elválasztott lista a figyelmen kívül hagyandó domain-azonosítókról.',
    'LABEL_EXCLUDE_TLDS'             => 'Kizárt TLD-k',
    'DESC_EXCLUDE_TLDS'              => 'Vesszővel elválasztott lista a figyelmen kívül hagyandó TLD-kről (pl. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Promóciós domainek kihagyása',
    'DESC_SKIP_PROMO'                => 'Kihagyja a hozzárendelt promóciós vagy kuponkóddal rendelkező domaineket.',
    'LABEL_SKIP_FREE'                => 'Ingyenes domainek kihagyása',
    'DESC_SKIP_FREE'                 => 'Kihagyja a jelenleg 0,00 ismétlődő árral rendelkező domaineket. Ez védi az ingyenes vagy csomagban lévő domaineket a nem kívánt árváltoztatástól.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Csak változások megjelenítése',
    'DESC_SHOW_ONLY_CHANGES'         => 'A próbafuttatásban csak azokat a domaineket jeleníti meg, ahol a számított ár eltér az aktuális ártól.',
    'LABEL_ALLOW_DECREASES'          => 'Árcsökkentések engedélyezése',
    'DESC_ALLOW_DECREASES'           => 'Engedélyezi az árak frissítését, ha a számított megújítási ár alacsonyabb az aktuális árnál. Ha letiltva, az árcsökkentések kimaradnak.',
    'TXT_CONFIRM_LIVE'               => 'Biztosan szeretné végrehajtani az éles szinkronizálást? Ez felülírja az ügyféldoaminek ismétlődő árait és áraktualizációs e-maileket küld!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Biztosan törölni szeretné az összes naplót?',
    'TXT_CONFIRM_ACTION'             => 'Megerősítem és engedélyezem a domainárfrissítést.',

    // Status badges & notifications
    'STATUS_PASS'                    => 'Rendben',
    'STATUS_WARN'                    => 'Figyelmeztetés',
    'STATUS_FAIL'                    => 'Hiba',
    'TXT_SETTINGS_SAVED'             => 'Beállítások sikeresen elmentve.',
    'TXT_LOGS_DELETED'               => 'Minden napló sikeresen törölve.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Adatbázis és e-mail sablonok sikeresen javítva.',
    'ERROR_CSRF'                     => 'A CSRF token ellenőrzés sikertelen.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Kérjük, válasszon legalább egy domaint az éles szinkronizálás végrehajtásához.',
    'ERROR_LICENSE_INVALID'          => 'Érvénytelen licenckulcs',
    'ERROR_LICENSE_DESC'             => 'Kérjük, adjon meg érvényes premium Domain Price Sync licenckulcsot a modul konfigurációs beállításaiban.',

    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED'          => 'Próbafuttatás befejezve. Kiszámítva: {total} domain. Szükséges frissítések: {updates}. Kihagyva: {skipped}. Hibák: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Éles szinkronizálás befejezve! Feldolgozva: {total} domain. Frissítve: {updates}. Kihagyva: {skipped}. Hibák: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Ez egy próbafuttatás. Az adatbázisban nem történt változtatás.',
    'TXT_LIVE_SYNC_WARNING'          => 'Éles szinkronizálás folyamatban! Az ügyféldoaminek árai újraszámításra és frissítésre kerülnek. Minden árfrissítésről értesítő e-mail kerül kiküldésre.',
    'TXT_NO_LOGS_FOUND'              => 'Nem találhatók naplók.',
    'TXT_NO_RESULTS_FOUND'           => 'Ehhez a szűrőhöz nem találhatók naplók.',
    'TXT_LOGS_DESCRIPTION'           => 'Megjeleníti a korábbi próbafuttatások és éles szinkronizálások naplóit.',
    'TXT_CHECKBOX_ENABLE'            => 'Kizárási beállítás aktiválása',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Kérjük, erősítse meg a műveletet a jelölőnégyzet bejelölésével.',
    'TXT_ERROR_DB_REPAIR'            => 'Adatbázis-javítási hiba: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Hiba a naplók törlésekor: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Ismeretlen hiba',
    'TXT_API_UPDATE_ERROR'           => 'API hiba az UpdateClientDomain során',

    // Health Check
    'HEALTH_CHECK_TITLE'             => 'Rendszer állapotfelmérés',
    'HEALTH_ERRORS_DETECTED'         => '{count} hiba észlelve. Azonnali beavatkozás szükséges.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} figyelmeztetés észlelve. A rendszer működik, de optimalizálások javasoltak.',
    'HEALTH_ALL_PASSED'              => 'Minden ellenőrzés sikeres. A rendszer kifogástalan állapotban van.',
    'HEALTH_MODULE_VERSION'          => 'Modul verziója',
    'HEALTH_LICENSE_STATUS'          => 'Licenc állapota',
    'HEALTH_INTEGRATION_CHECK'       => 'GetTLDPricing API integráció',
    'HEALTH_PHP_VERSION'             => 'PHP verzió ellenőrzése',
    'HEALTH_PHP_VERSION_DESC'        => 'PHP 8.2 vagy újabb szükséges. Jelenlegi verzió: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Beállítások tábla (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Ellenőrzi, hogy az egyéni beállítások tábla létezik-e.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Beállítások tábla séma',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Minden oszlop létezik.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Hiányzó oszlopok: {columns}',
    'HEALTH_LOG_TABLE'               => 'Napló tábla (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Ellenőrzi, hogy az egyéni napló tábla létezik-e.',
    'HEALTH_LOG_SCHEMA'              => 'Napló tábla séma',
    'HEALTH_LOG_SCHEMA_OK'           => 'Minden oszlop létezik.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Hiányzó oszlopok: {columns}',
    'HEALTH_CORE_TABLE'              => 'WHMCS rendszertábla: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Ellenőrzi, hogy a rendszertábla {table} létezik-e.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-mail sablon: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Ellenőrzi, hogy az egyéni e-mail sablon {name} létezik-e a tblemailtemplates táblában.',
    'HEALTH_INTEGRATION_OK'          => 'Az API válaszol és áradatokat ad vissza.',
    'HEALTH_INTEGRATION_FAIL'        => 'API válasz: {message}',
    'HEALTH_DB_STATUS'               => 'Adatbázis állapota',

    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED'    => 'Gyűjtött domainek',
    'TXT_STATS_PRICE_CHANGES'        => 'Ár változna',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Havi bevételkülönbség',
    'TXT_STATS_ERRORS'               => 'Hibák / figyelmeztetések',
    'TXT_STATS_UPDATED'              => 'Frissített ár',

    // Table Headers
    'TH_DOMAIN'                      => 'Domain',
    'TH_CLIENT'                      => 'Ügyfél',
    'TH_REGPERIOD'                   => 'Regisztrációs időszak',
    'TH_OLD_AMOUNT'                  => 'Jelenlegi ismétlődő ár',
    'TH_NEW_AMOUNT'                  => 'Számított ár',
    'TH_DIFFERENCE'                  => 'Különbség',
    'TH_STATUS'                      => 'Állapot',
    'TH_REASON'                      => 'Részletek',
    'TH_DATE'                        => 'Dátum',
    'TH_RUN_TYPE'                    => 'Futtatás típusa',

    // Status text in logs
    'STATUS_UPDATED'                 => 'Frissítve',
    'STATUS_SKIPPED'                 => 'Kihagyva',
    'STATUS_ERROR'                   => 'Hiba',
    'STATUS_MATCH'                   => 'Ár egyezik',
    'STATUS_WOULD_UPDATE'            => 'Frissülne',
    'STATUS_SKIPPED_DECREASE'        => 'Csökkentés kihagyva',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY'      => 'Nyilvános átláthatósági oldal aktiválása',
    'DESC_ENABLE_TRANSPARENCY'       => 'Aktivál egy nyilvános vendégoldalt az index.php?m=spDomainPriceSync&action=transparency címen, amely anonimizált árváltozási statisztikákat jelenít meg.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Lábléc hivatkozások a vendégoldalhoz',
    'DESC_GUEST_FOOTER_LINKS'        => 'Adjon hozzá navigációs hivatkozásokat, amelyek a nyilvános átláthatósági oldal láblécében jelennek meg (pl. jogi információ, adatvédelem).',
    'GUEST_FOOTER_LABEL'             => 'Hivatkozás felirata',
    'GUEST_FOOTER_ADD'               => 'Hivatkozás hozzáadása',
    'GUEST_PAGE_TITLE'               => 'Domain árak átláthatósága',
    'GUEST_PAGE_SUBTITLE'            => 'Ármódosítások a regisztrátori szinkronizáláson keresztül',
    'GUEST_PAGE_INTRO'               => 'Ezen az oldalon átláthatóan közzétesszük a legutóbbi ármódosításokat a domain megújítások kapcsán. Az árszinkronizálás automatikusan történik, partnerregisztrátoraink nagykereskedelmi árai alapján.',
    'GUEST_LAST_SYNC'                => 'Utolsó szinkronizálás',
    'GUEST_NO_DATA'                  => 'Még nem kerültek rögzítésre árváltozások.',
    'GUEST_RATIO_TITLE'              => 'Ármódosítások irány szerint',
    'GUEST_STATS_TLD_TITLE'          => 'Statisztikák megjelenítése domainkiterjesztés (TLD) szerint',
    'GUEST_INCREASES'                => 'Emelkedések',
    'GUEST_DECREASES'                => 'Csökkenések',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID'         => 'Szűrés ügyfél-azonosító szerint',
    'BTN_FILTER'                     => 'Szűrés',
    'BTN_RESET_FILTER'               => 'Szűrő visszaállítása',
    'CLIENT_TITLE'                   => 'Domain ármódosítások naplója',
    'CLIENT_DESC'                    => 'Ez az oldal mutatja az Ön domainjeire alkalmazott automatikus ármódosítások előzményeit a regisztrátorok aktuális árai alapján.',
    'CLIENT_NO_LOGS'                 => 'Nem kerültek rögzítésre ármódosítások az Ön domainjeihez.',
    'CLIENT_COL_DATE'                => 'Dátum',
    'CLIENT_COL_DOMAIN'              => 'Domain név',
    'CLIENT_COL_OLD_PRICE'           => 'Korábbi megújítási ár',
    'CLIENT_COL_NEW_PRICE'           => 'Új megújítási ár',
    'CLIENT_COL_DIFFERENCE'          => 'Különbség',
    'CLIENT_COL_STATUS'              => 'Állapot',
    'CLIENT_COL_DETAILS'             => 'Módosítás részletei',
    'CLIENT_STATUS_UPDATED'          => 'Frissítve',
    'FILTER_SEARCH'                  => 'Keresés...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS'       => 'Ügyfélnézet aktiválása az ármódosításokhoz',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Aktivál egy oldalt az ügyfélterületen az index.php?m=spDomainPriceSync címen, ahol a bejelentkezett ügyfelek megtekinthetik domainjeik ármódosítási előzményeit.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Domain árak átláthatósága',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Segítség';
$_ADDONLANG['HELP_TITLE']         = 'Segítség és dokumentáció';
$_ADDONLANG['HELP_WHAT']          = 'Mit csinál ez a modul?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Ez a modul lehetővé teszi a(z) Domain Price Sync kezelését közvetlenül a WHMCS adminisztrációs felületéről.';
$_ADDONLANG['HELP_CONFIG']        = 'Hogyan konfigurálhatom a modul beállításait?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Lépjen a Beállítások lapra olyan beállítások módosításához, mint az API-hozzáférés, az automatizált feladatok és a naplók megőrzése.';
$_ADDONLANG['HELP_HEALTH']        = 'Hogyan működnek az adatbázis egészségügyi ellenőrzései?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Használja a Rendszer-egészségellenőrzést az adatbázis-séma, táblák és oszlopok ellenőrzéséhez, valamint annak ellenőrzéséhez, hogy a modul függőségei megfelelően vannak-e telepítve.';
$_ADDONLANG['HELP_SUPPORT']       = 'Hol találok támogatást?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'Kérdések, hibaelhárítás vagy frissítések esetén forduljon az ügyfélszolgálathoz a support@datadachs.eu címen.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Fontos figyelmeztetés';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'A sémahibák elkerülése érdekében a modul frissítése után mindenképpen végezzen egészségügyi ellenőrzést és adatbázis-javítást.';

$_ADDONLANG['INFO_TITLE']       = 'Árkiigazítási útmutató';
$_ADDONLANG['INFO_INTRO']       = 'Annak érdekében, hogy mindig méltányos feltételeket kínáljunk Önnek, a domain megújítási árainkat rendszeresen szinkronizáljuk a regisztrátorok beszerzési áraival. Ez a következő átlátható lépéseket eredményezi:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatikus árellenőrzés';
$_ADDONLANG['INFO_STEP1_DESC']  = 'A rendszer rendszeresen lekérdezi az egyes TLD-k (pl. .de, .com) aktuális beszerzési árait a regisztrátorainktól.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Megújítási díjak szinkronizálása';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Ha a beszerzési feltételek változnak, a rendszer automatikusan újraszámolja és kiigazítja az Ön ismétlődő megújítási árát.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Átlátható előzmények';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Minden árkiigazítást centes pontossággal dokumentálunk a naplóban, feltüntetve a régi árat, az új árat és a különbséget.';
$_ADDONLANG['INFO_SUPPORT']     = 'Ha bármilyen kérdése van az árkiigazításokkal vagy egyes számlákkal kapcsolatban, ügyfélszolgálatunk készséggel áll rendelkezésére.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Minden árváltozást átláthatóan és anonim módon teszünk közzé.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Nyilvános statisztikák megtekintése';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-mail sablonok';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Nyissa meg és szabja testre az élő szinkronizálás során használt WHMCS e-mail sablonokat. Elérhető változók: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Értesítés áremelésről';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Értesítés árcsökkentésről';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Sablon szerkesztése';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'A sablon nem található az adatbázisban. Kérjük, futtasson javítást a Rendszer-egészségellenőrzésnél.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Példahivatkozások az ügyfél- és nyilvános oldalhoz';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Közvetlen példahivatkozások az ügyfélnapló nézethez és a nyilvános átláthatósági oldalhoz.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Privát ügyféloldal (bejelentkezés szükséges)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Megjeleníti a bejelentkezett ügyfelek saját domain árkiigazítási előzményeit (az ügyfélnézet engedélyezése szükséges).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Nyilvános átláthatósági oldal (vendégek és ügyfelek)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Nyilvánosan megjeleníti az anonimizált TLD-árkiigazítási statisztikákat (a nyilvános oldal engedélyezése szükséges).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Aktív';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inaktív';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Oldal megnyitása';
$_ADDONLANG['BTN_COPY_URL']             = 'URL másolása';
$_ADDONLANG['TXT_URL_COPIED']           = 'Másolva';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Ügyfélterület sablon';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Válassza ki az ügyfél- és nyilvános oldalak sablonját a templates/ almappái alapján. Az automatikus felismerés az aktív WHMCS témát keresi, alapértelmezés szerint a six sablonnal.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automatikus felismerés (WHMCS téma: {whmcs_tpl}, aktív: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Alapértelmezett)';
