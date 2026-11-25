<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in French.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE' => 'Synchronisation des prix de domaines',
    'DESCRIPTION' => 'Synchronise et recalcule automatiquement les prix récurrents des domaines clients en fonction des tarifs TLD configurés.',
    'DROP_TABLES' => 'Supprimer les tables à la désactivation',
    'DROP_TABLES_DESC' => 'Cochez cette option pour supprimer toutes les données, paramètres et journaux du module lors de sa désactivation.',
    'DEBUG_MODE' => 'Mode débogage',
    'DEBUG_MODE_DESC' => 'Active l\'écriture des journaux de débogage et les sorties d\'erreur détaillées.',
    
    // Tabs
    'TAB_SYNC' => 'Synchronisation des prix',
    'TAB_LOGS' => 'Journaux',
    'TAB_SETTINGS' => 'Paramètres et exclusions',
    'TAB_HEALTH' => 'Contrôle de santé du système',
    
    // Buttons & Actions
    'BTN_RUN_AUDIT' => 'Lancer l\'audit',
    'BTN_REPAIR_DB' => 'Réparer la base de données',
    'BTN_SAVE_SETTINGS' => 'Enregistrer les paramètres',
    'BTN_RUN_DRY_RUN' => 'Lancer la simulation',
    'BTN_RUN_LIVE_SYNC' => 'Exécuter la synchronisation en direct',
    'BTN_DELETE_LOGS' => 'Supprimer les journaux',
    'BTN_EXPORT_CSV' => 'Exporter en CSV',
    
    // Settings Labels & Descriptions
    'LABEL_STATUS_FILTER' => 'Filtre de statut de domaine',
    'DESC_STATUS_FILTER' => 'Liste séparée par des virgules des statuts de domaine à inclure (ex. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS' => 'Exclure des ID clients',
    'DESC_EXCLUDE_CLIENTS' => 'Liste séparée par des virgules des ID clients à ignorer.',
    'LABEL_EXCLUDE_DOMAINS' => 'Exclure des ID de domaines',
    'DESC_EXCLUDE_DOMAINS' => 'Liste séparée par des virgules des ID de domaines à ignorer.',
    'LABEL_EXCLUDE_TLDS' => 'Exclure des TLD',
    'DESC_EXCLUDE_TLDS' => 'Liste séparée par des virgules des TLD à ignorer (ex. .com, .de).',
    'LABEL_SKIP_PROMO' => 'Ignorer les domaines promotionnels',
    'DESC_SKIP_PROMO' => 'Ignore les domaines ayant un code promotionnel ou un coupon attribué.',
    'LABEL_SKIP_FREE' => 'Ignorer les domaines gratuits',
    'DESC_SKIP_FREE' => 'Ignore les domaines ayant un prix récurrent actuel de 0,00. Cela protège les domaines gratuits ou inclus contre les modifications de prix indésirables.',
    'LABEL_SHOW_ONLY_CHANGES' => 'Afficher uniquement les modifications',
    'DESC_SHOW_ONLY_CHANGES' => 'En simulation, affiche uniquement les domaines dont le prix calculé diffère du prix actuel.',
    'LABEL_ALLOW_DECREASES' => 'Autoriser les baisses de prix',
    'DESC_ALLOW_DECREASES' => 'Autorise la mise à jour des prix lorsque le prix de renouvellement calculé est inférieur au prix actuel. Si désactivé, les baisses de prix seront ignorées.',
    'TXT_CONFIRM_LIVE' => 'Êtes-vous sûr de vouloir exécuter la synchronisation en direct ? Cela écrasera les prix récurrents des domaines clients et enverra des e-mails de mise à jour des prix !',
    'TXT_CONFIRM_DELETE_LOGS' => 'Êtes-vous sûr de vouloir supprimer tous les journaux ?',
    'TXT_CONFIRM_ACTION' => 'Je confirme et autorise la mise à jour des prix des domaines.',
    
    // Status badges & notifications
    'STATUS_PASS' => 'Réussi',
    'STATUS_WARN' => 'Avertissement',
    'STATUS_FAIL' => 'Échec',
    'TXT_SETTINGS_SAVED' => 'Paramètres enregistrés avec succès.',
    'TXT_LOGS_DELETED' => 'Tous les journaux ont été supprimés avec succès.',
    'TXT_HEALTH_REPAIR_SUCCESS' => 'Base de données et modèles d\'e-mail réparés avec succès.',
    'ERROR_CSRF' => 'La validation du jeton CSRF a échoué.',
    'ERROR_NO_DOMAINS_SELECTED' => 'Veuillez sélectionner au moins un domaine pour exécuter la synchronisation en direct.',
    'ERROR_LICENSE_INVALID' => 'Clé de licence invalide',
    'ERROR_LICENSE_DESC' => 'Veuillez entrer une clé de licence premium Domain Price Sync valide dans les options de configuration du module.',
    
    // Engine Output Texts
    'TXT_DRY_RUN_COMPLETED' => 'Simulation terminée. Calculés : {total} domaines. Mises à jour nécessaires : {updates}. Ignorés : {skipped}. Erreurs : {errors}.',
    'TXT_LIVE_SYNC_COMPLETED' => 'Synchronisation en direct terminée ! Traités : {total} domaines. Mis à jour : {updates}. Ignorés : {skipped}. Erreurs : {errors}.',
    'TXT_DRY_RUN_WARNING' => 'Ceci est une simulation. Aucune modification n\'a été enregistrée dans la base de données.',
    'TXT_LIVE_SYNC_WARNING' => 'Synchronisation en direct en cours ! Les prix des domaines clients sont recalculés et mis à jour. Des e-mails de notification sont envoyés pour toutes les mises à jour de prix.',
    'TXT_NO_LOGS_FOUND' => 'Aucun journal trouvé.',
    'TXT_NO_RESULTS_FOUND' => 'Aucun journal trouvé pour ce filtre.',
    'TXT_LOGS_DESCRIPTION' => 'Affiche les journaux des simulations et synchronisations en direct précédentes.',
    'TXT_CHECKBOX_ENABLE' => 'Activer ce paramètre d\'exclusion',
    'TXT_CONFIRM_CHECKBOX_REQUIRED' => 'Veuillez confirmer l\'action en cochant la case.',
    'TXT_ERROR_DB_REPAIR' => 'Erreur lors de la réparation de la base de données : {message}',
    'TXT_ERROR_CLEARING_LOGS' => 'Erreur lors de la suppression des journaux : {message}',
    'TXT_UNKNOWN_API_ERROR' => 'Erreur inconnue',
    'TXT_API_UPDATE_ERROR' => 'Erreur API lors de UpdateClientDomain',
    
    // Health Check
    'HEALTH_CHECK_TITLE' => 'Contrôle de santé du système',
    'HEALTH_ERRORS_DETECTED' => '{count} erreurs détectées. Une action immédiate est requise.',
    'HEALTH_WARNINGS_DETECTED' => '{count} avertissements détectés. Le système est opérationnel mais des optimisations sont recommandées.',
    'HEALTH_ALL_PASSED' => 'Tous les contrôles sont réussis. Votre système est en bon état.',
    'HEALTH_MODULE_VERSION' => 'Version du module',
    'HEALTH_LICENSE_STATUS' => 'Statut de la licence',
    'HEALTH_INTEGRATION_CHECK' => 'Intégration API GetTLDPricing',
    'HEALTH_PHP_VERSION' => 'Vérification de la version PHP',
    'HEALTH_PHP_VERSION_DESC' => 'Nécessite PHP 8.2 ou supérieur. Version actuelle : {version}',
    'HEALTH_SETTINGS_TABLE' => 'Table des paramètres (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC' => 'Vérifie si la table de paramètres personnalisée existe.',
    'HEALTH_SETTINGS_SCHEMA' => 'Schéma de la table des paramètres',
    'HEALTH_SETTINGS_SCHEMA_OK' => 'Toutes les colonnes existent.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Colonnes manquantes : {columns}',
    'HEALTH_LOG_TABLE' => 'Table des journaux (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC' => 'Vérifie si la table de journaux personnalisée existe.',
    'HEALTH_LOG_SCHEMA' => 'Schéma de la table des journaux',
    'HEALTH_LOG_SCHEMA_OK' => 'Toutes les colonnes existent.',
    'HEALTH_LOG_SCHEMA_MISSING' => 'Colonnes manquantes : {columns}',
    'HEALTH_CORE_TABLE' => 'Table système WHMCS : {table}',
    'HEALTH_CORE_TABLE_DESC' => 'Vérifie si la table système {table} existe.',
    'HEALTH_EMAIL_TEMPLATE' => 'Modèle d\'e-mail : {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC' => 'Vérifie si le modèle d\'e-mail personnalisé {name} existe dans tblemailtemplates.',
    'HEALTH_INTEGRATION_OK' => 'L\'API répond et retourne les données de prix.',
    'HEALTH_INTEGRATION_FAIL' => 'Réponse API : {message}',
    'HEALTH_DB_STATUS' => 'État de la base de données',
    
    // Stats Cards
    'TXT_STATS_DOMAINS_COLLECTED' => 'Domaines collectés',
    'TXT_STATS_PRICE_CHANGES' => 'Changerait le prix',
    'TXT_STATS_TOTAL_DIFFERENCE' => 'Différence de revenus mensuels',
    'TXT_STATS_ERRORS' => 'Erreurs / avertissements',
    'TXT_STATS_UPDATED' => 'Prix mis à jour',
    
    // Table Headers
    'TH_DOMAIN' => 'Domaine',
    'TH_CLIENT' => 'Client',
    'TH_REGPERIOD' => 'Période d\'enregistrement',
    'TH_OLD_AMOUNT' => 'Prix récurrent actuel',
    'TH_NEW_AMOUNT' => 'Prix calculé',
    'TH_DIFFERENCE' => 'Différence',
    'TH_STATUS' => 'Statut',
    'TH_REASON' => 'Détails',
    'TH_DATE' => 'Date',
    'TH_RUN_TYPE' => 'Type d\'exécution',
    
    // Status text in logs
    'STATUS_UPDATED' => 'Mis à jour',
    'STATUS_SKIPPED' => 'Ignoré',
    'STATUS_ERROR' => 'Erreur',
    'STATUS_MATCH' => 'Prix correspondant',
    'STATUS_WOULD_UPDATE' => 'Serait mis à jour',
    'STATUS_SKIPPED_DECREASE' => 'Baisse ignorée',

    // Guest Transparency
    'LABEL_ENABLE_TRANSPARENCY' => 'Activer la page de transparence publique',
    'DESC_ENABLE_TRANSPARENCY' => 'Active une page publique pour les visiteurs sous index.php?m=spDomainPriceSync&action=transparency affichant des statistiques anonymisées des modifications de prix.',
    'LABEL_GUEST_FOOTER_LINKS' => 'Liens de pied de page pour la page visiteurs',
    'DESC_GUEST_FOOTER_LINKS' => 'Ajoutez des liens de navigation qui seront affichés dans le pied de page de la page de transparence publique (ex. mentions légales, politique de confidentialité).',
    'GUEST_FOOTER_LABEL' => 'Libellé du lien',
    'GUEST_FOOTER_ADD' => 'Ajouter un lien',
    'GUEST_PAGE_TITLE' => 'Transparence des prix de domaines',
    'GUEST_PAGE_SUBTITLE' => 'Ajustements de prix via la synchronisation avec les registrars',
    'GUEST_PAGE_INTRO' => 'Sur cette page, nous publions de manière transparente les récents ajustements de prix pour les renouvellements de domaines. La synchronisation des prix est effectuée automatiquement en fonction des tarifs de gros de nos registrars partenaires.',
    'GUEST_LAST_SYNC' => 'Dernière synchronisation',
    'GUEST_NO_DATA' => 'Aucun ajustement de prix n\'a encore été enregistré.',
    'GUEST_RATIO_TITLE' => 'Ajustements de prix par direction',
    'GUEST_STATS_TLD_TITLE' => 'Afficher les statistiques par extension de domaine (TLD)',
    'GUEST_INCREASES' => 'Augmentations',
    'GUEST_DECREASES' => 'Diminutions',

    // Admin filtering & client logs keys
    'LABEL_FILTER_CLIENT_ID' => 'Filtrer par ID client',
    'BTN_FILTER' => 'Filtrer',
    'BTN_RESET_FILTER' => 'Réinitialiser le filtre',
    'CLIENT_TITLE' => 'Journal des ajustements de prix de domaines',
    'CLIENT_DESC' => 'Cette page affiche l\'historique des ajustements de prix automatiques appliqués à vos domaines pour correspondre aux tarifs actuels des registrars.',
    'CLIENT_NO_LOGS' => 'Aucun ajustement de prix n\'a été enregistré pour vos domaines.',
    'CLIENT_COL_DATE' => 'Date',
    'CLIENT_COL_DOMAIN' => 'Nom de domaine',
    'CLIENT_COL_OLD_PRICE' => 'Ancien prix de renouvellement',
    'CLIENT_COL_NEW_PRICE' => 'Nouveau prix de renouvellement',
    'CLIENT_COL_DIFFERENCE' => 'Différence',
    'CLIENT_COL_STATUS' => 'Statut',
    'CLIENT_COL_DETAILS' => 'Détails de l\'ajustement',
    'CLIENT_STATUS_UPDATED' => 'Mis à jour',
    'FILTER_SEARCH' => 'Rechercher...',

    // Client logs settings keys
    'LABEL_ENABLE_CLIENT_LOGS' => 'Activer la vue client des ajustements de prix',
    'DESC_ENABLE_CLIENT_LOGS' => 'Active une page dans l\'espace client sous index.php?m=spDomainPriceSync où les clients connectés peuvent consulter l\'historique des ajustements de prix de leurs domaines.',
    'CLIENT_TRANSPARENCY_BTN' => 'Transparence des prix de domaines',
];


// Help & Documentation Section
$_ADDONLANG['TAB_HELP'] = 'Aide';
$_ADDONLANG['HELP_TITLE'] = 'Aide et documentation';
$_ADDONLANG['HELP_WHAT'] = 'Que fait ce module?';
$_ADDONLANG['HELP_WHAT_TEXT'] = 'Ce module vous permet de gérer Domain Price Sync directement depuis votre zone d\'administration WHMCS.';
$_ADDONLANG['HELP_CONFIG'] = 'Comment configurer les paramètres du module?';
$_ADDONLANG['HELP_CONFIG_TEXT'] = 'Allez dans l\'onglet Paramètres pour ajuster les options telles que l\'accès API, les tâches automatisées et la conservation des journaux.';
$_ADDONLANG['HELP_HEALTH'] = 'Comment fonctionnent les vérifications de la base de données?';
$_ADDONLANG['HELP_HEALTH_TEXT'] = 'Utilisez la vérification de l\'état du système pour auditer le schéma de base de données, les tables, les colonnes et vérifier que les dépendances du module sont correctement installées.';
$_ADDONLANG['HELP_SUPPORT'] = 'Où puis-je trouver de l\'aide?';
$_ADDONLANG['HELP_SUPPORT_TEXT'] = 'Pour toute question, dépannage ou mise à jour, veuillez contacter l\'équipe de support via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Avis important';
$_ADDONLANG['HELP_WARNING_TEXT'] = 'Veuillez effectuer un audit d\'état et une réparation de la base de données après la mise à niveau du module afin d\'éviter les erreurs de schéma.';

$_ADDONLANG['INFO_TITLE'] = 'Guide d\'ajustement des prix';
$_ADDONLANG['INFO_INTRO'] = 'Afin de toujours vous proposer des conditions équitables, nos tarifs de renouvellement de domaine sont régulièrement synchronisés avec les prix d\'achat des bureaux d\'enregistrement. Cela se traduit par les étapes transparentes suivantes :';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Contrôle automatique des prix';
$_ADDONLANG['INFO_STEP1_DESC'] = 'Le système interroge régulièrement les prix d\'achat actuels de chaque TLD (par exemple .de, .com) auprès de nos bureaux d\'enregistrement.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Synchronisation des frais de renouvellement';
$_ADDONLANG['INFO_STEP2_DESC'] = 'Si les conditions d\'achat changent, votre tarif de renouvellement récurrent est automatiquement recalculé et ajusté dans le système.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Historique transparent';
$_ADDONLANG['INFO_STEP3_DESC'] = 'Chaque ajustement de prix est documenté ici dans le journal avec une précision au centime près, indiquant l\'ancien prix, le nouveau prix et la différence.';
$_ADDONLANG['INFO_SUPPORT'] = 'Si vous avez des questions sur les ajustements de prix ou sur des factures individuelles, notre support est à votre entière disposition.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Nous publions toutes les modifications de tarifs de manière transparente et anonyme.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Voir les statistiques publiques';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE'] = 'Modèles d\'e-mails';
$_ADDONLANG['EMAIL_TEMPLATES_DESC'] = 'Ouvrez et personnalisez les modèles d\'e-mails WHMCS utilisés lors de la synchronisation en direct. Variables disponibles : {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Notification de hausse de prix';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Notification de baisse de prix';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE'] = 'Modifier le modèle';
$_ADDONLANG['EMAIL_TPL_MISSING'] = 'Modèle introuvable dans la base de données. Veuillez lancer une réparation dans Vérification de l\'état du système.';
$_ADDONLANG['PAGE_LINKS_TITLE'] = 'Exemples de liens pour les pages client et publique';
$_ADDONLANG['PAGE_LINKS_DESC'] = 'Liens d\'exemple directs vers l\'historique client et la page publique de transparence.';
$_ADDONLANG['LINK_PRIVATE_LABEL'] = 'Page client privée (connexion requise)';
$_ADDONLANG['LINK_PRIVATE_DESC'] = 'Affiche les ajustements de prix personnels pour les clients connectés (nécessite l\'activation de la vue client).';
$_ADDONLANG['LINK_PUBLIC_LABEL'] = 'Page publique de transparence (visiteurs et clients)';
$_ADDONLANG['LINK_PUBLIC_DESC'] = 'Affiche publiquement des statistiques anonymisées d\'ajustement des tarifs (nécessite l\'activation de la page publique).';
$_ADDONLANG['STATUS_ACTIVE'] = 'Actif';
$_ADDONLANG['STATUS_INACTIVE'] = 'Inactif';
$_ADDONLANG['BTN_OPEN_PAGE'] = 'Ouvrir la page';
$_ADDONLANG['BTN_COPY_URL'] = 'Copier l\'URL';
$_ADDONLANG['TXT_URL_COPIED'] = 'Copié';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Modèle d\'espace client';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Choisissez le modèle des pages client et publique selon les sous-dossiers de templates/. La détection automatique sélectionne le thème WHMCS actif avec six par défaut.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Détection automatique (thème WHMCS : {whmcs_tpl}, utilisé : {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Par défaut)';
