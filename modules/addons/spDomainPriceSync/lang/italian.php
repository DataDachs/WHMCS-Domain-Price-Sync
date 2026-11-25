<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Italian.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE' => 'Sincronizzazione prezzi domini',
    'DESCRIPTION' => 'Sincronizza e ricalcola automaticamente i prezzi ricorrenti dei domini dei clienti in base ai listini TLD configurati.',
    'DROP_TABLES' => 'Elimina tabelle alla disattivazione',
    'DROP_TABLES_DESC' => 'Selezionare per eliminare tutti i dati, le impostazioni e i registri del modulo alla disattivazione.',
    'DEBUG_MODE' => 'Modalità debug',
    'DEBUG_MODE_DESC' => 'Abilita la scrittura dei registri di debug e i messaggi di errore dettagliati.',
    
    // Tabs
    'TAB_SYNC' => 'Sincronizzazione prezzi',
    'TAB_LOGS' => 'Registri',
    'TAB_SETTINGS' => 'Impostazioni ed esclusioni',
    'TAB_HEALTH' => 'Controllo salute del sistema',
    
    // Buttons & Actions
    'BTN_RUN_AUDIT' => 'Esegui audit',
    'BTN_REPAIR_DB' => 'Ripara database',
    'BTN_SAVE_SETTINGS' => 'Salva impostazioni',
    'BTN_RUN_DRY_RUN' => 'Avvia simulazione',
    'BTN_RUN_LIVE_SYNC' => 'Esegui sincronizzazione live',
    'BTN_DELETE_LOGS' => 'Elimina registri',
    'BTN_EXPORT_CSV' => 'Esporta CSV',
    
    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER' => 'Filtro stato dominio',
    'DESC_STATUS_FILTER' => 'Lista separata da virgole degli stati dei domini da includere (es. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS' => 'Escludi ID clienti',
    'DESC_EXCLUDE_CLIENTS' => 'Lista separata da virgole degli ID clienti da ignorare.',
    'LABEL_EXCLUDE_DOMAINS' => 'Escludi ID domini',
    'DESC_EXCLUDE_DOMAINS' => 'Lista separata da virgole degli ID domini da ignorare.',
    'LABEL_EXCLUDE_TLDS' => 'Escludi TLD',
    'DESC_EXCLUDE_TLDS' => 'Lista separata da virgole dei TLD da ignorare (es. .com, .de).',
    'LABEL_SKIP_PROMO' => 'Ignora domini promozionali',
    'DESC_SKIP_PROMO' => 'Ignora i domini con un codice promozionale o coupon assegnato.',
    'LABEL_SKIP_FREE' => 'Ignora domini gratuiti',
    'DESC_SKIP_FREE' => 'Ignora i domini con un prezzo ricorrente attuale di 0,00. Questo protegge i domini gratuiti o inclusi da modifiche di prezzo indesiderate.',
    'LABEL_SHOW_ONLY_CHANGES' => 'Mostra solo le modifiche',
    'DESC_SHOW_ONLY_CHANGES' => 'Nella simulazione, mostra solo i domini in cui il prezzo calcolato differisce dal prezzo attuale.',
    'LABEL_ALLOW_DECREASES' => 'Consenti riduzioni di prezzo',
    'DESC_ALLOW_DECREASES' => 'Consente l\'aggiornamento dei prezzi quando il prezzo di rinnovo calcolato è inferiore al prezzo attuale. Se disattivato, le riduzioni di prezzo vengono ignorate.',
    'TXT_CONFIRM_LIVE' => 'Sei sicuro di voler eseguire la sincronizzazione live? Questo sovrascriverà i prezzi ricorrenti dei domini dei clienti e invierà e-mail di aggiornamento prezzi!',
    'TXT_CONFIRM_DELETE_LOGS' => 'Sei sicuro di voler eliminare tutti i registri?',
    'TXT_CONFIRM_ACTION' => 'Confermo e autorizzo l\'aggiornamento dei prezzi dei domini.',
    
    // Status badges & notifications
    'STATUS_PASS' => 'Superato',
    'STATUS_WARN' => 'Avviso',
    'STATUS_FAIL' => 'Errore',
    'TXT_SETTINGS_SAVED' => 'Impostazioni salvate con successo.',
    'TXT_LOGS_DELETED' => 'Tutti i registri eliminati con successo.',
    'TXT_HEALTH_REPAIR_SUCCESS' => 'Database e modelli e-mail riparati con successo.',
    'ERROR_CSRF' => 'Validazione del token CSRF fallita.',
    'ERROR_NO_DOMAINS_SELECTED' => 'Seleziona almeno un dominio per eseguire la sincronizzazione live.',
    'ERROR_LICENSE_INVALID' => 'Chiave di licenza non valida',
    'ERROR_LICENSE_DESC' => 'Inserisci una chiave di licenza premium Domain Price Sync valida nelle opzioni di configurazione del modulo.',
    
    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED' => 'Simulazione completata. Calcolati: {total} domini. Aggiornamenti necessari: {updates}. Ignorati: {skipped}. Errori: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED' => 'Sincronizzazione live completata! Elaborati: {total} domini. Aggiornati: {updates}. Ignorati: {skipped}. Errori: {errors}.',
    'TXT_DRY_RUN_WARNING' => 'Questa è una simulazione. Non sono state salvate modifiche nel database.',
    'TXT_LIVE_SYNC_WARNING' => 'Sincronizzazione live in corso! I prezzi dei domini dei clienti vengono ricalcolati e aggiornati. Vengono inviate e-mail di notifica per tutti gli aggiornamenti di prezzo.',
    'TXT_NO_LOGS_FOUND' => 'Nessun registro trovato.',
    'TXT_NO_RESULTS_FOUND' => 'Nessun registro trovato per questo filtro.',
    'TXT_LOGS_DESCRIPTION' => 'Mostra i registri delle precedenti simulazioni e sincronizzazioni live.',
    'TXT_CHECKBOX_ENABLE' => 'Attiva questa impostazione di esclusione',
    'TXT_CONFIRM_CHECKBOX_REQUIRED' => 'Conferma l\'azione selezionando la casella.',
    'TXT_ERROR_DB_REPAIR' => 'Errore nella riparazione del database: {message}',
    'TXT_ERROR_CLEARING_LOGS' => 'Errore nell\'eliminazione dei registri: {message}',
    'TXT_UNKNOWN_API_ERROR' => 'Errore sconosciuto',
    'TXT_API_UPDATE_ERROR' => 'Errore API durante UpdateClientDomain',
    
    // Health Check
    'HEALTH_CHECK_TITLE' => 'Controllo salute del sistema',
    'HEALTH_ERRORS_DETECTED' => '{count} errori rilevati. È necessaria un\'azione immediata.',
    'HEALTH_WARNINGS_DETECTED' => '{count} avvisi rilevati. Il sistema è operativo ma sono consigliate ottimizzazioni.',
    'HEALTH_ALL_PASSED' => 'Tutti i controlli superati. Il sistema è in ottimo stato.',
    'HEALTH_MODULE_VERSION' => 'Versione del modulo',
    'HEALTH_LICENSE_STATUS' => 'Stato della licenza',
    'HEALTH_INTEGRATION_CHECK' => 'Integrazione API GetTLDPricing',
    'HEALTH_PHP_VERSION' => 'Controllo versione PHP',
    'HEALTH_PHP_VERSION_DESC' => 'Richiede PHP 8.2 o superiore. Versione attuale: {version}',
    'HEALTH_SETTINGS_TABLE' => 'Tabella impostazioni (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC' => 'Verifica se la tabella impostazioni personalizzata esiste.',
    'HEALTH_SETTINGS_SCHEMA' => 'Schema tabella impostazioni',
    'HEALTH_SETTINGS_SCHEMA_OK' => 'Tutte le colonne presenti.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Colonne mancanti: {columns}',
    'HEALTH_LOG_TABLE' => 'Tabella registri (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC' => 'Verifica se la tabella registri personalizzata esiste.',
    'HEALTH_LOG_SCHEMA' => 'Schema tabella registri',
    'HEALTH_LOG_SCHEMA_OK' => 'Tutte le colonne presenti.',
    'HEALTH_LOG_SCHEMA_MISSING' => 'Colonne mancanti: {columns}',
    'HEALTH_CORE_TABLE' => 'Tabella di sistema WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC' => 'Verifica se la tabella di sistema {table} esiste.',
    'HEALTH_EMAIL_TEMPLATE' => 'Modello e-mail: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC' => 'Verifica se il modello e-mail personalizzato {name} esiste in tblemailtemplates.',
    'HEALTH_INTEGRATION_OK' => 'L\'API risponde e restituisce dati sui prezzi.',
    'HEALTH_INTEGRATION_FAIL' => 'Risposta API: {message}',
    'HEALTH_DB_STATUS' => 'Stato del database',
    
    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED' => 'Domini raccolti',
    'TXT_STATS_PRICE_CHANGES' => 'Cambierebbe il prezzo',
    'TXT_STATS_TOTAL_DIFFERENCE' => 'Differenza ricavi mensili',
    'TXT_STATS_ERRORS' => 'Errori / avvisi',
    'TXT_STATS_UPDATED' => 'Prezzo aggiornato',
    
    // Table Headers
    'TH_DOMAIN' => 'Dominio',
    'TH_CLIENT' => 'Cliente',
    'TH_REGPERIOD' => 'Periodo di registrazione',
    'TH_OLD_AMOUNT' => 'Prezzo ricorrente attuale',
    'TH_NEW_AMOUNT' => 'Prezzo calcolato',
    'TH_DIFFERENCE' => 'Differenza',
    'TH_STATUS' => 'Stato',
    'TH_REASON' => 'Dettagli',
    'TH_DATE' => 'Data',
    'TH_RUN_TYPE' => 'Tipo di esecuzione',
    
    // Status text in logs
    'STATUS_UPDATED' => 'Aggiornato',
    'STATUS_SKIPPED' => 'Ignorato',
    'STATUS_ERROR' => 'Errore',
    'STATUS_MATCH' => 'Prezzo corrispondente',
    'STATUS_WOULD_UPDATE' => 'Verrebbe aggiornato',
    'STATUS_SKIPPED_DECREASE' => 'Riduzione ignorata',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY' => 'Attiva pagina di trasparenza pubblica',
    'DESC_ENABLE_TRANSPARENCY' => 'Attiva una pagina pubblica per i visitatori su index.php?m=spDomainPriceSync&action=transparency che mostra statistiche anonimizzate sulle variazioni di prezzo.',
    'LABEL_GUEST_FOOTER_LINKS' => 'Link nel piè di pagina per la pagina visitatori',
    'DESC_GUEST_FOOTER_LINKS' => 'Aggiungi link di navigazione che verranno visualizzati nel piè di pagina della pagina di trasparenza pubblica (es. note legali, privacy).',
    'GUEST_FOOTER_LABEL' => 'Etichetta del link',
    'GUEST_FOOTER_ADD' => 'Aggiungi link',
    'GUEST_PAGE_TITLE' => 'Trasparenza prezzi domini',
    'GUEST_PAGE_SUBTITLE' => 'Adeguamenti di prezzo tramite sincronizzazione con i registrar',
    'GUEST_PAGE_INTRO' => 'In questa pagina pubblichiamo in modo trasparente i recenti adeguamenti di prezzo per i rinnovi dei domini. La sincronizzazione dei prezzi viene eseguita automaticamente sulla base dei prezzi all\'ingrosso dei nostri registrar partner.',
    'GUEST_LAST_SYNC' => 'Ultima sincronizzazione',
    'GUEST_NO_DATA' => 'Non sono stati ancora registrati adeguamenti di prezzo.',
    'GUEST_RATIO_TITLE' => 'Adeguamenti di prezzo per direzione',
    'GUEST_STATS_TLD_TITLE' => 'Mostra statistiche per estensione di dominio (TLD)',
    'GUEST_INCREASES' => 'Aumenti',
    'GUEST_DECREASES' => 'Riduzioni',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID' => 'Filtra per ID cliente',
    'BTN_FILTER' => 'Filtra',
    'BTN_RESET_FILTER' => 'Reimposta filtro',
    'CLIENT_TITLE' => 'Registro adeguamenti prezzi domini',
    'CLIENT_DESC' => 'Questa pagina mostra lo storico degli adeguamenti di prezzo automatici applicati ai tuoi domini per allinearli ai prezzi attuali dei registrar.',
    'CLIENT_NO_LOGS' => 'Non sono stati registrati adeguamenti di prezzo per i tuoi domini.',
    'CLIENT_COL_DATE' => 'Data',
    'CLIENT_COL_DOMAIN' => 'Nome dominio',
    'CLIENT_COL_OLD_PRICE' => 'Prezzo di rinnovo precedente',
    'CLIENT_COL_NEW_PRICE' => 'Nuovo prezzo di rinnovo',
    'CLIENT_COL_DIFFERENCE' => 'Differenza',
    'CLIENT_COL_STATUS' => 'Stato',
    'CLIENT_COL_DETAILS' => 'Dettagli dell\'adeguamento',
    'CLIENT_STATUS_UPDATED' => 'Aggiornato',
    'FILTER_SEARCH' => 'Cerca...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS' => 'Attiva vista cliente per adeguamenti di prezzo',
    'DESC_ENABLE_CLIENT_LOGS' => 'Attiva una pagina nell\'area clienti su index.php?m=spDomainPriceSync dove i clienti connessi possono consultare lo storico degli adeguamenti di prezzo dei loro domini.',
    'CLIENT_TRANSPARENCY_BTN' => 'Trasparenza prezzi domini',
];


// Help & Documentation Section
$_ADDONLANG['TAB_HELP'] = 'Aiuto';
$_ADDONLANG['HELP_TITLE'] = 'Aiuto e documentazione';
$_ADDONLANG['HELP_WHAT'] = 'Cosa fa questo modulo?';
$_ADDONLANG['HELP_WHAT_TEXT'] = 'Questo modulo ti consente di gestire Domain Price Sync direttamente dalla tua area amministrativa WHMCS.';
$_ADDONLANG['HELP_CONFIG'] = 'Come posso configurare le impostazioni del modulo?';
$_ADDONLANG['HELP_CONFIG_TEXT'] = 'Vai alla scheda Impostazioni per regolare opzioni come l\'accesso alle API, le attività automatizzate e la conservazione dei log.';
$_ADDONLANG['HELP_HEALTH'] = 'Come funzionano i controlli di integrità del database?';
$_ADDONLANG['HELP_HEALTH_TEXT'] = 'Utilizza il Controllo integrità del sistema per controllare lo schema del database, le tabelle, le colonne e verificare che le dipendenze del modulo siano installate correttamente.';
$_ADDONLANG['HELP_SUPPORT'] = 'Dove posso trovare supporto?';
$_ADDONLANG['HELP_SUPPORT_TEXT'] = 'Per domande, risoluzione dei problemi o aggiornamenti, contatta il team di supporto tramite support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Avviso importante';
$_ADDONLANG['HELP_WARNING_TEXT'] = 'Assicurati di eseguire un controllo dell\'integrità e di riparare il database dopo aver aggiornato il modulo per evitare errori di schema.';

$_ADDONLANG['INFO_TITLE'] = 'Guida all\'adeguamento dei prezzi';
$_ADDONLANG['INFO_INTRO'] = 'Per offrirti sempre condizioni eque, i nostri prezzi di rinnovo dei domini vengono regolarmente sincronizzati con i prezzi di acquisto dei registrar. Ciò comporta le seguenti fasi trasparenti:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Verifica automatica dei prezzi';
$_ADDONLANG['INFO_STEP1_DESC'] = 'Il sistema interroga regolarmente i prezzi di acquisto correnti per ciascun TLD (es. .de, .com) presso i nostri registrar.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Sincronizzazione delle tariffe di rinnovo';
$_ADDONLANG['INFO_STEP2_DESC'] = 'Se le condizioni di acquisto cambiano, il prezzo di rinnovo ricorrente viene ricalcolato e adeguato automaticamente nel sistema.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Cronologia trasparente';
$_ADDONLANG['INFO_STEP3_DESC'] = 'Ogni adeguamento di prezzo è documentato qui nel registro con precisione al centesimo, mostrando il vecchio prezzo, il nuovo prezzo e la differenza.';
$_ADDONLANG['INFO_SUPPORT'] = 'In caso di domande sugli adeguamenti dei prezzi o sulle singole fatture, il nostro supporto è sempre a tua disposizione.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Pubblichiamo tutte le variazioni di prezzo in modo trasparente e anonimo.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Visualizza statistiche pubbliche';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE'] = 'Modelli di email';
$_ADDONLANG['EMAIL_TEMPLATES_DESC'] = 'Apri e personalizza i modelli di email WHMCS utilizzati durante la sincronizzazione live. Variabili disponibili: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Notifica di aumento prezzo';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Notifica di riduzione prezzo';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE'] = 'Modifica modello';
$_ADDONLANG['EMAIL_TPL_MISSING'] = 'Modello non trovato nel database. Esegui una riparazione nel Controllo integrità del sistema.';
$_ADDONLANG['PAGE_LINKS_TITLE'] = 'Link di esempio per pagina cliente e pubblica';
$_ADDONLANG['PAGE_LINKS_DESC'] = 'Link di esempio diretti alla vista dei log cliente e alla pagina pubblica della trasparenza.';
$_ADDONLANG['LINK_PRIVATE_LABEL'] = 'Pagina privata cliente (accesso richiesto)';
$_ADDONLANG['LINK_PRIVATE_DESC'] = 'Mostra i log personali degli adeguamenti di prezzo ai clienti connessi (richiede attivazione della vista cliente).';
$_ADDONLANG['LINK_PUBLIC_LABEL'] = 'Pagina pubblica trasparenza (ospiti e clienti)';
$_ADDONLANG['LINK_PUBLIC_DESC'] = 'Mostra pubblicamente le statistiche anonimizzate degli adeguamenti di prezzo (richiede attivazione della pagina pubblica).';
$_ADDONLANG['STATUS_ACTIVE'] = 'Attivo';
$_ADDONLANG['STATUS_INACTIVE'] = 'Inattivo';
$_ADDONLANG['BTN_OPEN_PAGE'] = 'Apri pagina';
$_ADDONLANG['BTN_COPY_URL'] = 'Copia URL';
$_ADDONLANG['TXT_URL_COPIED'] = 'Copiato';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Modello area clienti';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Seleziona il modello per le pagine cliente e pubblica in base alle sottocartelle in templates/. Il rilevamento automatico usa il tema WHMCS attivo con six come predefinito.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Rilevamento automatico (tema WHMCS: {whmcs_tpl}, attivo: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Predefinito)';
