<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Romanian.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE' => 'Sincronizarea prețurilor domeniilor',
    'DESCRIPTION' => 'Sincronizează și recalculează automat prețurile recurente ale domeniilor clienților pe baza tarifelor TLD configurate.',
    'DROP_TABLES' => 'Șterge tabelele la dezactivare',
    'DROP_TABLES_DESC' => 'Bifați pentru a șterge toate datele, setările și jurnalele modulului la dezactivare.',
    'DEBUG_MODE' => 'Mod depanare',
    'DEBUG_MODE_DESC' => 'Activează scrierea jurnalelor de depanare și mesajele de eroare detaliate.',
    
    'TAB_SYNC' => 'Sincronizare prețuri',
    'TAB_LOGS' => 'Jurnale',
    'TAB_SETTINGS' => 'Setări și excluderi',
    'TAB_HEALTH' => 'Verificare stare sistem',
    
    'BTN_RUN_AUDIT' => 'Execută auditul',
    'BTN_REPAIR_DB' => 'Repară baza de date',
    'BTN_SAVE_SETTINGS' => 'Salvează setările',
    'BTN_RUN_DRY_RUN' => 'Pornește simularea',
    'BTN_RUN_LIVE_SYNC' => 'Execută sincronizarea live',
    'BTN_DELETE_LOGS' => 'Șterge jurnalele',
    'BTN_EXPORT_CSV' => 'Exportă CSV',
    
    'LABEL_STATUS_FILTER' => 'Filtru status domeniu',
    'DESC_STATUS_FILTER' => 'Listă separată prin virgule a statusurilor de domeniu de inclus (ex. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS' => 'Excludere ID-uri clienți',
    'DESC_EXCLUDE_CLIENTS' => 'Listă separată prin virgule a ID-urilor de clienți de ignorat.',
    'LABEL_EXCLUDE_DOMAINS' => 'Excludere ID-uri domenii',
    'DESC_EXCLUDE_DOMAINS' => 'Listă separată prin virgule a ID-urilor de domenii de ignorat.',
    'LABEL_EXCLUDE_TLDS' => 'Excludere TLD-uri',
    'DESC_EXCLUDE_TLDS' => 'Listă separată prin virgule a TLD-urilor de ignorat (ex. .com, .de).',
    'LABEL_SKIP_PROMO' => 'Omite domeniile promoționale',
    'DESC_SKIP_PROMO' => 'Omite domeniile care au un cod promoțional sau un cupon atribuit.',
    'LABEL_SKIP_FREE' => 'Omite domeniile gratuite',
    'DESC_SKIP_FREE' => 'Omite domeniile cu un preț recurent curent de 0,00. Aceasta protejează domeniile gratuite sau incluse împotriva modificărilor de preț nedorite.',
    'LABEL_SHOW_ONLY_CHANGES' => 'Afișează doar modificările',
    'DESC_SHOW_ONLY_CHANGES' => 'În simulare, afișează doar domeniile unde prețul calculat diferă de prețul curent.',
    'LABEL_ALLOW_DECREASES' => 'Permite reduceri de preț',
    'DESC_ALLOW_DECREASES' => 'Permite actualizarea prețurilor când prețul de reînnoire calculat este mai mic decât prețul curent. Dacă este dezactivat, reducerile de preț vor fi omise.',
    'TXT_CONFIRM_LIVE' => 'Sunteți sigur că doriți să executați sincronizarea live? Aceasta va suprascrie prețurile recurente ale domeniilor clienților și va trimite e-mailuri de actualizare a prețurilor!',
    'TXT_CONFIRM_DELETE_LOGS' => 'Sunteți sigur că doriți să ștergeți toate jurnalele?',
    'TXT_CONFIRM_ACTION' => 'Confirm și autorizez actualizarea prețurilor domeniilor.',
    
    'STATUS_PASS' => 'Trecut',
    'STATUS_WARN' => 'Avertisment',
    'STATUS_FAIL' => 'Eșec',
    'TXT_SETTINGS_SAVED' => 'Setările au fost salvate cu succes.',
    'TXT_LOGS_DELETED' => 'Toate jurnalele au fost șterse cu succes.',
    'TXT_HEALTH_REPAIR_SUCCESS' => 'Baza de date și șabloanele de e-mail au fost reparate cu succes.',
    'ERROR_CSRF' => 'Validarea tokenului CSRF a eșuat.',
    'ERROR_NO_DOMAINS_SELECTED' => 'Selectați cel puțin un domeniu pentru a executa sincronizarea live.',
    'ERROR_LICENSE_INVALID' => 'Cheie de licență invalidă',
    'ERROR_LICENSE_DESC' => 'Introduceți o cheie de licență premium Domain Price Sync validă în opțiunile de configurare ale modulului.',
    
    'TXT_DRY_RUN_COMPLETED' => 'Simulare finalizată. Calculat: {total} domenii. Actualizări necesare: {updates}. Omise: {skipped}. Erori: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED' => 'Sincronizare live finalizată! Procesate: {total} domenii. Actualizate: {updates}. Omise: {skipped}. Erori: {errors}.',
    'TXT_DRY_RUN_WARNING' => 'Aceasta este o simulare. Nu au fost salvate modificări în baza de date.',
    'TXT_LIVE_SYNC_WARNING' => 'Sincronizare live în curs! Prețurile domeniilor clienților sunt recalculate și actualizate. Se trimit e-mailuri de notificare pentru toate actualizările de preț.',
    'TXT_NO_LOGS_FOUND' => 'Nu au fost găsite jurnale.',
    'TXT_NO_RESULTS_FOUND' => 'Nu au fost găsite jurnale pentru acest filtru.',
    'TXT_LOGS_DESCRIPTION' => 'Afișează jurnalele simulărilor și sincronizărilor live anterioare.',
    'TXT_CHECKBOX_ENABLE' => 'Activează această setare de excludere',
    'TXT_CONFIRM_CHECKBOX_REQUIRED' => 'Confirmați acțiunea bifând caseta de selectare.',
    'TXT_ERROR_DB_REPAIR' => 'Eroare la repararea bazei de date: {message}',
    'TXT_ERROR_CLEARING_LOGS' => 'Eroare la ștergerea jurnalelor: {message}',
    'TXT_UNKNOWN_API_ERROR' => 'Eroare necunoscută',
    'TXT_API_UPDATE_ERROR' => 'Eroare API la UpdateClientDomain',
    
    'HEALTH_CHECK_TITLE' => 'Verificare stare sistem',
    'HEALTH_ERRORS_DETECTED' => '{count} erori detectate. Este necesară acțiune imediată.',
    'HEALTH_WARNINGS_DETECTED' => '{count} avertismente detectate. Sistemul funcționează, dar se recomandă optimizări.',
    'HEALTH_ALL_PASSED' => 'Toate verificările au trecut. Sistemul dumneavoastră este în stare perfectă.',
    'HEALTH_MODULE_VERSION' => 'Versiunea modulului',
    'HEALTH_LICENSE_STATUS' => 'Starea licenței',
    'HEALTH_INTEGRATION_CHECK' => 'Integrare API GetTLDPricing',
    'HEALTH_PHP_VERSION' => 'Verificare versiune PHP',
    'HEALTH_PHP_VERSION_DESC' => 'Necesită PHP 8.2 sau mai nou. Versiunea curentă: {version}',
    'HEALTH_SETTINGS_TABLE' => 'Tabel setări (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC' => 'Verifică dacă tabelul de setări personalizat există.',
    'HEALTH_SETTINGS_SCHEMA' => 'Schema tabelului de setări',
    'HEALTH_SETTINGS_SCHEMA_OK' => 'Toate coloanele există.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Coloane lipsă: {columns}',
    'HEALTH_LOG_TABLE' => 'Tabel jurnale (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC' => 'Verifică dacă tabelul de jurnale personalizat există.',
    'HEALTH_LOG_SCHEMA' => 'Schema tabelului de jurnale',
    'HEALTH_LOG_SCHEMA_OK' => 'Toate coloanele există.',
    'HEALTH_LOG_SCHEMA_MISSING' => 'Coloane lipsă: {columns}',
    'HEALTH_CORE_TABLE' => 'Tabel de sistem WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC' => 'Verifică dacă tabelul de sistem {table} există.',
    'HEALTH_EMAIL_TEMPLATE' => 'Șablon e-mail: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC' => 'Verifică dacă șablonul de e-mail personalizat {name} există în tblemailtemplates.',
    'HEALTH_INTEGRATION_OK' => 'API-ul răspunde și returnează date de preț.',
    'HEALTH_INTEGRATION_FAIL' => 'Răspuns API: {message}',
    'HEALTH_DB_STATUS' => 'Starea bazei de date',
    
    'TXT_STATS_DOMAINS_COLLECTED' => 'Domenii colectate',
    'TXT_STATS_PRICE_CHANGES' => 'Ar modifica prețul',
    'TXT_STATS_TOTAL_DIFFERENCE' => 'Diferență venituri lunare',
    'TXT_STATS_ERRORS' => 'Erori / avertismente',
    'TXT_STATS_UPDATED' => 'Preț actualizat',
    
    'TH_DOMAIN' => 'Domeniu',
    'TH_CLIENT' => 'Client',
    'TH_REGPERIOD' => 'Perioadă de înregistrare',
    'TH_OLD_AMOUNT' => 'Preț recurent curent',
    'TH_NEW_AMOUNT' => 'Preț calculat',
    'TH_DIFFERENCE' => 'Diferență',
    'TH_STATUS' => 'Status',
    'TH_REASON' => 'Detalii',
    'TH_DATE' => 'Dată',
    'TH_RUN_TYPE' => 'Tip executare',
    
    'STATUS_UPDATED' => 'Actualizat',
    'STATUS_SKIPPED' => 'Omis',
    'STATUS_ERROR' => 'Eroare',
    'STATUS_MATCH' => 'Prețul corespunde',
    'STATUS_WOULD_UPDATE' => 'Ar fi actualizat',
    'STATUS_SKIPPED_DECREASE' => 'Reducere omisă',

    'LABEL_ENABLE_TRANSPARENCY' => 'Activează pagina publică de transparență',
    'DESC_ENABLE_TRANSPARENCY' => 'Activează o pagină publică pentru vizitatori la index.php?m=spDomainPriceSync&action=transparency care afișează statistici anonimizate ale modificărilor de preț.',
    'LABEL_GUEST_FOOTER_LINKS' => 'Linkuri în subsolul paginii pentru vizitatori',
    'DESC_GUEST_FOOTER_LINKS' => 'Adăugați linkuri de navigare care vor fi afișate în subsolul paginii publice de transparență (ex. informații juridice, politica de confidențialitate).',
    'GUEST_FOOTER_LABEL' => 'Etichetă link',
    'GUEST_FOOTER_ADD' => 'Adaugă link',
    'GUEST_PAGE_TITLE' => 'Transparența prețurilor domeniilor',
    'GUEST_PAGE_SUBTITLE' => 'Ajustări de preț prin sincronizarea cu registrarii',
    'GUEST_PAGE_INTRO' => 'Pe această pagină publicăm în mod transparent ajustările recente de preț pentru reînnoirile de domenii. Sincronizarea prețurilor se realizează automat pe baza tarifelor angro ale registrarilor noștri parteneri.',
    'GUEST_LAST_SYNC' => 'Ultima sincronizare',
    'GUEST_NO_DATA' => 'Nu au fost înregistrate încă ajustări de preț.',
    'GUEST_RATIO_TITLE' => 'Ajustări de preț pe direcție',
    'GUEST_STATS_TLD_TITLE' => 'Afișează statistici pe extensie de domeniu (TLD)',
    'GUEST_INCREASES' => 'Creșteri',
    'GUEST_DECREASES' => 'Scăderi',

    'LABEL_FILTER_CLIENT_ID' => 'Filtrare după ID client',
    'BTN_FILTER' => 'Filtrează',
    'BTN_RESET_FILTER' => 'Resetează filtrul',
    'CLIENT_TITLE' => 'Jurnal ajustări prețuri domenii',
    'CLIENT_DESC' => 'Această pagină afișează istoricul ajustărilor automate de preț aplicate domeniilor dumneavoastră pentru a corespunde tarifelor curente ale registrarilor.',
    'CLIENT_NO_LOGS' => 'Nu au fost înregistrate ajustări de preț pentru domeniile dumneavoastră.',
    'CLIENT_COL_DATE' => 'Dată',
    'CLIENT_COL_DOMAIN' => 'Nume domeniu',
    'CLIENT_COL_OLD_PRICE' => 'Preț anterior de reînnoire',
    'CLIENT_COL_NEW_PRICE' => 'Noul preț de reînnoire',
    'CLIENT_COL_DIFFERENCE' => 'Diferență',
    'CLIENT_COL_STATUS' => 'Status',
    'CLIENT_COL_DETAILS' => 'Detalii ajustare',
    'CLIENT_STATUS_UPDATED' => 'Actualizat',
    'FILTER_SEARCH' => 'Căutare...',

    'LABEL_ENABLE_CLIENT_LOGS' => 'Activează vizualizarea ajustărilor de preț pentru clienți',
    'DESC_ENABLE_CLIENT_LOGS' => 'Activează o pagină în zona de client la index.php?m=spDomainPriceSync unde clienții autentificați pot vizualiza istoricul ajustărilor de preț ale domeniilor lor.',
    'CLIENT_TRANSPARENCY_BTN' => 'Transparența prețurilor domeniilor',
];


// Help & Documentation Section
$_ADDONLANG['TAB_HELP'] = 'Ajutor';
$_ADDONLANG['HELP_TITLE'] = 'Ajutor și documentație';
$_ADDONLANG['HELP_WHAT'] = 'Ce face acest modul?';
$_ADDONLANG['HELP_WHAT_TEXT'] = 'Acest modul vă permite să gestionați Domain Price Sync direct din zona de administrare WHMCS.';
$_ADDONLANG['HELP_CONFIG'] = 'Cum configurez setările modulului?';
$_ADDONLANG['HELP_CONFIG_TEXT'] = 'Mergeți la fila Setări pentru a ajusta opțiuni precum accesul API, sarcinile automatizate și reținerea jurnalelor.';
$_ADDONLANG['HELP_HEALTH'] = 'Cum funcționează verificările de integritate ale bazei de date?';
$_ADDONLANG['HELP_HEALTH_TEXT'] = 'Utilizați Verificarea integrității sistemului pentru a audita schema bazei de date, tabelele, coloanele și pentru a verifica dacă dependențele modulului sunt instalate corect.';
$_ADDONLANG['HELP_SUPPORT'] = 'Unde pot găsi asistență?';
$_ADDONLANG['HELP_SUPPORT_TEXT'] = 'Pentru întrebări, depanare sau actualizări, vă rugăm să contactați echipa de asistență prin support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Anunț important';
$_ADDONLANG['HELP_WARNING_TEXT'] = 'Asigurați-vă că efectuați o verificare de integritate și o reparare a bazei de date după actualizarea modulului pentru a preveni erorile de schemă.';

$_ADDONLANG['INFO_TITLE'] = 'Ghid de ajustare a prețurilor';
$_ADDONLANG['INFO_INTRO'] = 'Pentru a vă oferi întotdeauna condiții echitabile, prețurile noastre de reînnoire a domeniilor sunt sincronizate în mod regulat cu prețurile de achiziție ale registratorilor. Acest lucru are ca rezultat următorii pași transparenți:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Verificare automată a prețurilor';
$_ADDONLANG['INFO_STEP1_DESC'] = 'Sistemul interoghează în mod regulat prețurile actuale de achiziție pentru fiecare TLD (de exemplu, .de, .com) de la registratorii noștri.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Sincronizarea taxelor de reînnoire';
$_ADDONLANG['INFO_STEP2_DESC'] = 'Dacă se schimbă condițiile de achiziție, prețul dumneavoastră recurent de reînnoire este recalculat și ajustat automat în sistem.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Istoric transparent';
$_ADDONLANG['INFO_STEP3_DESC'] = 'Fiecare ajustare de preț este documentată aici în jurnal cu o precizie de cenți, indicând prețul vechi, prețul nou și diferența.';
$_ADDONLANG['INFO_SUPPORT'] = 'Dacă aveți întrebări referitoare la ajustările de preț sau la facturile individuale, serviciul nostru de asistență vă stă întotdeauna la dispoziție.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Publicăm toate modificările de preț în mod transparent și anonim.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Vizualizați statistici publice';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE'] = 'Șabloane de e-mail';
$_ADDONLANG['EMAIL_TEMPLATES_DESC'] = 'Deschideți și personalizați șabloanele de e-mail WHMCS utilizate în timpul sincronizării live. Variabile disponibile: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Notificare creștere preț';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Notificare scădere preț';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE'] = 'Editează șablonul';
$_ADDONLANG['EMAIL_TPL_MISSING'] = 'Șablonul nu a fost găsit în baza de date. Vă rugăm să rulați o reparare la Verificarea stării sistemului.';
$_ADDONLANG['PAGE_LINKS_TITLE'] = 'Linkuri exemplu pentru pagina de client și pagina publică';
$_ADDONLANG['PAGE_LINKS_DESC'] = 'Linkuri exemplu directe către vizualizarea jurnalului clientului și pagina publică de transparență.';
$_ADDONLANG['LINK_PRIVATE_LABEL'] = 'Pagină privată pentru clienți (autentificare necesară)';
$_ADDONLANG['LINK_PRIVATE_DESC'] = 'Afișează istoricul personal al ajustărilor de preț pentru clienții autentificați (necesită activarea vederii pentru clienți).';
$_ADDONLANG['LINK_PUBLIC_LABEL'] = 'Pagină publică de transparență (vizitatori și clienți)';
$_ADDONLANG['LINK_PUBLIC_DESC'] = 'Afișează public statistici anonimizate privind ajustările de preț ale domeniilor (necesită activarea paginii publice).';
$_ADDONLANG['STATUS_ACTIVE'] = 'Activ';
$_ADDONLANG['STATUS_INACTIVE'] = 'Inactiv';
$_ADDONLANG['BTN_OPEN_PAGE'] = 'Deschide pagina';
$_ADDONLANG['BTN_COPY_URL'] = 'Copiază URL';
$_ADDONLANG['TXT_URL_COPIED'] = 'Copiat';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Șablon zonă client';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Selectați șablonul pentru paginile client și publică pe baza subfolderele din templates/. Detectarea automată folosește tema WHMCS activă, cu six ca implicit.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Detectare automată (temă WHMCS: {whmcs_tpl}, activ: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Implicit)';
