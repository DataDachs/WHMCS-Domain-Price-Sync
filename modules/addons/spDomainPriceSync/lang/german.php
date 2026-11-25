<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in German.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Domain-Preis-Synchronisierung',
    'DESCRIPTION'                    => 'Synchronisiert und berechnet automatisch wiederkehrende Preise für Kundendomains auf Basis der konfigurierten TLD-Preise.',
    'DROP_TABLES'                    => 'Tabellen bei Deaktivierung löschen',
    'DROP_TABLES_DESC'               => 'Aktivieren Sie dies, um alle Moduldaten, Einstellungen und Protokolle beim Deaktivieren des Moduls zu löschen.',
    'DEBUG_MODE'                     => 'Debug-Modus',
    'DEBUG_MODE_DESC'                => 'Aktiviert das Schreiben von Debug-Protokollen und detaillierten Fehlerausgaben.',

    // Tabs
    'TAB_SYNC'                       => 'Preissynchronisierung',
    'TAB_LOGS'                       => 'Protokolle',
    'TAB_SETTINGS'                   => 'Einstellungen & Ausschlüsse',
    'TAB_HEALTH'                     => 'System-Health-Check',

    // Buttons & Actions
    'BTN_RUN_AUDIT'                  => 'Audit ausführen',
    'BTN_REPAIR_DB'                  => 'Datenbank reparieren',
    'BTN_SAVE_SETTINGS'              => 'Einstellungen speichern',
    'BTN_RUN_DRY_RUN'                => 'Dry-Run starten',
    'BTN_RUN_LIVE_SYNC'              => 'Live-Sync ausführen',
    'BTN_DELETE_LOGS'                => 'Protokolle löschen',
    'BTN_EXPORT_CSV'                 => 'CSV exportieren',

    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER'            => 'Domain-Status-Filter',
    'DESC_STATUS_FILTER'             => 'Kommagetrennte Liste der zu berücksichtigenden Domain-Status (z. B. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Kunden-IDs ausschließen',
    'DESC_EXCLUDE_CLIENTS'           => 'Kommagetrennte Liste der zu ignorierenden Kunden-IDs.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Domain-IDs ausschließen',
    'DESC_EXCLUDE_DOMAINS'           => 'Kommagetrennte Liste der zu ignorierenden Domain-IDs.',
    'LABEL_EXCLUDE_TLDS'             => 'TLDs ausschließen',
    'DESC_EXCLUDE_TLDS'              => 'Kommagetrennte Liste der zu ignorierenden TLDs (z. B. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Sonder-/Promo-Domains überspringen',
    'DESC_SKIP_PROMO'                => 'Überspringt Domains, denen eine Promotion/ein Gutschein-Code zugewiesen ist.',
    'LABEL_SKIP_FREE'                => 'Gratis-/Inklusivdomains überspringen',
    'DESC_SKIP_FREE'                 => 'Domains überspringen, die aktuell mit einem wiederkehrenden Preis von 0,00 hinterlegt sind. Dies schützt Inklusivdomains vor einer ungewollten Preisanpassung.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Nur Änderungen anzeigen',
    'DESC_SHOW_ONLY_CHANGES'         => 'Zeigt im Dry-Run nur Domains an, bei denen der berechnete Preis vom aktuellen Preis abweicht.',
    'LABEL_ALLOW_DECREASES'          => 'Preissenkungen zulassen',
    'DESC_ALLOW_DECREASES'           => 'Erlaubt die Aktualisierung von Preisen, wenn der berechnete Verlängerungspreis niedriger ist als der aktuelle Preis. Wenn deaktiviert, werden Preissenkungen übersprungen.',
    'TXT_CONFIRM_LIVE'               => 'Sind Sie sicher, dass Sie den Live-Sync ausführen möchten? Dies überschreibt die wiederkehrenden Preise der Kundendomains und versendet E-Mails zur Preisaktualisierung!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Sind Sie sicher, dass Sie alle Protokolle löschen möchten?',
    'TXT_CONFIRM_ACTION'             => 'Ich bestätige und autorisiere die Aktualisierung der Domainpreise.',

    // Status badges & notifications
    'STATUS_PASS'                    => 'Bestanden',
    'STATUS_WARN'                    => 'Warnung',
    'STATUS_FAIL'                    => 'Fehler',
    'TXT_SETTINGS_SAVED'             => 'Einstellungen erfolgreich gespeichert.',
    'TXT_LOGS_DELETED'               => 'Alle Protokolle erfolgreich gelöscht.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Datenbank und E-Mail-Templates erfolgreich repariert.',
    'ERROR_CSRF'                     => 'CSRF-Token-Validierung fehlgeschlagen.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Bitte wählen Sie mindestens eine Domain aus, um den Live-Sync auszuführen.',
    'ERROR_LICENSE_INVALID'          => 'Ungültiger Lizenzschlüssel',
    'ERROR_LICENSE_DESC'             => 'Bitte geben Sie einen gültigen Premium Domain Price Sync Lizenzschlüssel in den Konfigurationsoptionen des Moduls ein.',

    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED'          => 'Dry-Run abgeschlossen. Berechnet: {total} Domains. Updates erforderlich: {updates}. Übersprungen: {skipped}. Fehler: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Live-Sync abgeschlossen! Verarbeitet: {total} Domains. Aktualisiert: {updates}. Übersprungen: {skipped}. Fehler: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Dies ist ein Dry-Run. Es wurden keine Änderungen an der Datenbank vorgenommen.',
    'TXT_LIVE_SYNC_WARNING'          => 'Live-Sync wird ausgeführt! Die Domainpreise der Kunden werden neu berechnet und aktualisiert. Für alle Preisaktualisierungen werden Benachrichtigungs-E-Mails versendet.',
    'TXT_NO_LOGS_FOUND'              => 'Keine Protokolle gefunden.',
    'TXT_NO_RESULTS_FOUND'           => 'Keine Protokolle für diesen Filter vorhanden.',
    'TXT_LOGS_DESCRIPTION'           => 'Zeigt die Protokolle früherer Dry-Run-Prüfungen und Live-Sync-Operationen an.',
    'TXT_CHECKBOX_ENABLE'            => 'Diesen Ausschluss aktivieren',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Bitte bestätigen Sie die Aktion, indem Sie das Kontrollkästchen aktivieren.',
    'TXT_ERROR_DB_REPAIR'            => 'Fehler bei Datenbankreparatur: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Fehler beim Löschen der Protokolle: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Unbekannter Fehler',
    'TXT_API_UPDATE_ERROR'           => 'API-Fehler während UpdateClientDomain',

    // Health Check
    'HEALTH_CHECK_TITLE'             => 'System-Health-Check',
    'HEALTH_ERRORS_DETECTED'         => '{count} Fehler festgestellt. Sofortiges Handeln ist erforderlich.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} Warnungen festgestellt. System ist betriebsbereit, aber Optimierungen werden empfohlen.',
    'HEALTH_ALL_PASSED'              => 'Alle Prüfungen bestanden. Ihr System ist fehlerfrei.',
    'HEALTH_MODULE_VERSION'          => 'Modul-Version',
    'HEALTH_LICENSE_STATUS'          => 'Lizenz-Status',
    'HEALTH_INTEGRATION_CHECK'       => 'GetTLDPricing API-Integration',
    'HEALTH_PHP_VERSION'             => 'PHP-Versionsprüfung',
    'HEALTH_PHP_VERSION_DESC'        => 'Erfordert PHP 8.2 oder höher. Aktuelle Version: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Einstellungstabelle (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Prüft, ob die benutzerdefinierte Einstellungstabelle vorhanden ist.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Einstellungstabelle Schema',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Alle Spalten vorhanden.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Fehlende Spalten: {columns}',
    'HEALTH_LOG_TABLE'               => 'Protokolltabelle (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Prüft, ob die benutzerdefinierte Protokolltabelle vorhanden ist.',
    'HEALTH_LOG_SCHEMA'              => 'Protokolltabelle Schema',
    'HEALTH_LOG_SCHEMA_OK'           => 'Alle Spalten vorhanden.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Fehlende Spalten: {columns}',
    'HEALTH_CORE_TABLE'              => 'WHMCS Kerntabelle: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Prüft, ob die Systemtabelle {table} vorhanden ist.',
    'HEALTH_EMAIL_TEMPLATE'          => 'E-Mail-Template: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Prüft, ob das benutzerdefinierte E-Mail-Template {name} in tblemailtemplates existiert.',
    'HEALTH_INTEGRATION_OK'          => 'API antwortet und liefert Preisdaten.',
    'HEALTH_INTEGRATION_FAIL'        => 'API-Antwort: {message}',
    'HEALTH_DB_STATUS'               => 'Datenbank-Status',

    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED'    => 'Domains erfasst',
    'TXT_STATS_PRICE_CHANGES'        => 'Preis würde sich ändern',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Monatliche Umsatz-Diff',
    'TXT_STATS_ERRORS'               => 'Fehler / Warnungen',
    'TXT_STATS_UPDATED'              => 'Aktualisierte Preise',

    // Table Headers
    'TH_DOMAIN'                      => 'Domain',
    'TH_CLIENT'                      => 'Kunde',
    'TH_REGPERIOD'                   => 'Laufzeit',
    'TH_OLD_AMOUNT'                  => 'Aktuell wiederkehrend',
    'TH_NEW_AMOUNT'                  => 'Berechneter Preis',
    'TH_DIFFERENCE'                  => 'Differenz',
    'TH_STATUS'                      => 'Status',
    'TH_REASON'                      => 'Details',
    'TH_DATE'                        => 'Datum',
    'TH_RUN_TYPE'                    => 'Typ',

    // Status text in logs
    'STATUS_UPDATED'                 => 'Aktualisiert',
    'STATUS_SKIPPED'                 => 'Übersprungen',
    'STATUS_ERROR'                   => 'Fehler',
    'STATUS_MATCH'                   => 'Preis übereinstimmend',
    'STATUS_WOULD_UPDATE'            => 'Würde aktualisiert',
    'STATUS_SKIPPED_DECREASE'        => 'Preissenkung übersprungen',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY'      => 'Öffentliche Transparenzseite aktivieren',
    'DESC_ENABLE_TRANSPARENCY'       => 'Aktiviert eine öffentliche Gästeseite unter index.php?m=spDomainPriceSync&action=transparency, auf der Preisänderungen anonymisiert dargestellt werden.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Footer-Links für Gästeseite',
    'DESC_GUEST_FOOTER_LINKS'        => 'Fügen Sie Links hinzu, die im Footer der öffentlichen Gästeseite angezeigt werden sollen (z. B. Impressum, Datenschutz).',
    'GUEST_FOOTER_LABEL'             => 'Link-Bezeichnung',
    'GUEST_FOOTER_ADD'               => 'Link hinzufügen',
    'GUEST_PAGE_TITLE'               => 'Domain-Preis-Transparenz',
    'GUEST_PAGE_SUBTITLE'            => 'Preisänderungen durch Registrar-Synchronisierung',
    'GUEST_PAGE_INTRO'               => 'Auf dieser Seite informieren wir transparent über kürzlich durchgeführte Preisänderungen bei Domainverlängerungen. Die Preissynchronisierung erfolgt vollautomatisch auf Basis der Einkaufskonditionen unserer angeschlossenen Registrare.',
    'GUEST_LAST_SYNC'                => 'Letzte Synchronisierung',
    'GUEST_NO_DATA'                  => 'Bisher wurden keine Preisänderungen protokolliert.',
    'GUEST_RATIO_TITLE'              => 'Preisanpassungen nach Richtung (Verhältnis)',
    'GUEST_STATS_TLD_TITLE'          => 'Statistiken nach Domain-Endung (TLD) einblenden',
    'GUEST_INCREASES'                => 'Erhöhungen',
    'GUEST_DECREASES'                => 'Senkungen',

    // Admin-Filterung & Client-Logs Keys
    'LABEL_FILTER_CLIENT_ID'         => 'Nach Kunden-ID filtern',
    'BTN_FILTER'                     => 'Filtern',
    'BTN_RESET_FILTER'               => 'Filter zurücksetzen',
    'CLIENT_TITLE'                   => 'Protokoll der Domain-Preisanpassungen',
    'CLIENT_DESC'                    => 'Diese Seite zeigt den Verlauf automatischer Preisanpassungen für Ihre Domains an, um diese an die aktuellen Einkaufskonditionen der Registrare anzupassen.',
    'CLIENT_NO_LOGS'                 => 'Es wurden keine Preisanpassungen für Ihre Domains protokolliert.',
    'CLIENT_COL_DATE'                => 'Datum',
    'CLIENT_COL_DOMAIN'              => 'Domain-Name',
    'CLIENT_COL_OLD_PRICE'           => 'Vorheriger Verlängerungspreis',
    'CLIENT_COL_NEW_PRICE'           => 'Neuer Verlängerungspreis',
    'CLIENT_COL_DIFFERENCE'          => 'Differenz',
    'CLIENT_COL_STATUS'              => 'Status',
    'CLIENT_COL_DETAILS'             => 'Details zur Anpassung',
    'CLIENT_STATUS_UPDATED'          => 'Aktualisiert',
    'FILTER_SEARCH'                  => 'Suchen...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS'       => 'Kundenansicht für Preisanpassungen aktivieren',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Aktiviert eine Seite im Kundenbereich unter index.php?m=spDomainPriceSync, auf der angemeldete Kunden den Verlauf ihrer Domain-Preisanpassungen einsehen können.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Domain-Preis-Transparenz',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Hilfe';
$_ADDONLANG['HELP_TITLE']         = 'Hilfe & Dokumentation';
$_ADDONLANG['HELP_WHAT']          = 'Was macht dieses Modul?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Dieses Modul ermöglicht die Verwaltung von Domain Price Sync direkt aus Ihrem WHMCS-Administrationsbereich.';
$_ADDONLANG['HELP_CONFIG']        = 'Wie konfiguriere ich die Moduleinstellungen?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Gehen Sie auf die Registerkarte Einstellungen, um Optionen wie API-Zugriff, automatisierte Aufgaben und Protokollaufbewahrung anzupassen.';
$_ADDONLANG['HELP_HEALTH']        = 'Wie funktionieren die Datenbank-Statusprüfungen?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Verwenden Sie die System-Statusprüfung, um das Datenbankschema, Tabellen und Spalten zu überprüfen und sicherzustellen, dass die Modulabhängigkeiten ordnungsgemäß installiert sind.';
$_ADDONLANG['HELP_SUPPORT']       = 'Wo finde ich Support?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'Bei Fragen, zur Fehlerbehebung oder für Updates wenden Sie sich bitte an das Support-Team via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Wichtiger Hinweis';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Bitte führen Sie nach einem Modul-Upgrade eine Statusprüfung und eine Datenbankreparatur durch, um Schemafehler zu vermeiden.';

$_ADDONLANG['INFO_TITLE']       = 'Preisanpassungs-Leitfaden';
$_ADDONLANG['INFO_INTRO']       = 'Um Ihnen stets faire Konditionen zu bieten, werden unsere Domainverlängerungspreise regelmäßig mit den Einkaufspreisen der Registrare synchronisiert. Hierdurch ergeben sich folgende transparente Schritte:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Automatische Preisabfrage';
$_ADDONLANG['INFO_STEP1_DESC']  = 'Das System fragt in regelmäßigen Abständen die aktuellen Einkaufspreise für jede TLD (z.B. .de, .com) bei unseren Registraren ab.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synchronisierung der Verlängerungsgebühren';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Wenn sich die Einkaufskonditionen ändern, wird Ihr wiederkehrender Verlängerungspreis automatisch im System neu berechnet und angepasst.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Transparenter Preisverlauf';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Jede Preisanpassung wird hier im Protokoll centgenau mit dem alten Preis, dem neuen Preis und der Differenz dokumentiert.';
$_ADDONLANG['INFO_SUPPORT']     = 'Bei Fragen zu Preisanpassungen oder einzelnen Rechnungen steht Ihnen unser Support jederzeit gerne zur Verfügung.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Wir veröffentlichen alle Preisänderungen transparent und anonymisiert.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Zu den öffentlichen Statistiken';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'E-Mail-Templates';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Öffnen und bearbeiten Sie die WHMCS-E-Mail-Templates dieses Moduls direkt. Verfügbare Variablen: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Benachrichtigung bei Preiserhöhung';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Benachrichtigung bei Preissenkung';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Template bearbeiten';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Template nicht in der Datenbank gefunden. Bitte unter System-Health-Check reparieren.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Beispiellinks für Kunden- und öffentliche Seite';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Direkte Beispiellinks zur privaten Kundenansicht und zur öffentlichen Transparenzseite.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Private Kundenseite (Anmeldung erforderlich)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Zeigt angemeldeten Kunden ihre persönlichen Domain-Preisanpassungen (erfordert „Kundenansicht für Preisanpassungen aktivieren“).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Öffentliche Transparenzseite (Gäste & Kunden)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Zeigt anonymisierte Statistiken zu Domain-Preisanpassungen öffentlich an (erfordert „Öffentliche Transparenzseite aktivieren“).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Aktiv';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inaktiv';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Seite öffnen';
$_ADDONLANG['BTN_COPY_URL']             = 'URL kopieren';
$_ADDONLANG['TXT_URL_COPIED']           = 'Kopiert';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Frontend-Template';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Wählen Sie das Template für Kunden- und öffentliche Seiten anhand der Ordnernamen in templates/. Die automatische Erkennung prüft das aktive WHMCS-Theme und nutzt standardmäßig six.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Automatische Erkennung (WHMCS-Theme: {whmcs_tpl}, aktiv: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Standard)';
