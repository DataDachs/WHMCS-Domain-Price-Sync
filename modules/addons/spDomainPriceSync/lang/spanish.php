<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Spanish.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Sincronización de precios de dominios',
    'DESCRIPTION'                    => 'Sincroniza y recalcula automáticamente los precios recurrentes de los dominios de los clientes en función de las tarifas TLD configuradas.',
    'DROP_TABLES'                    => 'Eliminar tablas al desactivar',
    'DROP_TABLES_DESC'               => 'Marque para eliminar todos los datos, configuraciones y registros del módulo al desactivarlo.',
    'DEBUG_MODE'                     => 'Modo de depuración',
    'DEBUG_MODE_DESC'                => 'Habilita la escritura de registros de depuración y mensajes de error detallados.',

    'TAB_SYNC'                       => 'Sincronización de precios',
    'TAB_LOGS'                       => 'Registros',
    'TAB_SETTINGS'                   => 'Configuración y exclusiones',
    'TAB_HEALTH'                     => 'Verificación del estado del sistema',

    'BTN_RUN_AUDIT'                  => 'Ejecutar auditoría',
    'BTN_REPAIR_DB'                  => 'Reparar base de datos',
    'BTN_SAVE_SETTINGS'              => 'Guardar configuración',
    'BTN_RUN_DRY_RUN'                => 'Iniciar simulación',
    'BTN_RUN_LIVE_SYNC'              => 'Ejecutar sincronización en vivo',
    'BTN_DELETE_LOGS'                => 'Eliminar registros',
    'BTN_EXPORT_CSV'                 => 'Exportar CSV',

    'LABEL_STATUS_FILTER'            => 'Filtro de estado de dominio',
    'DESC_STATUS_FILTER'             => 'Lista separada por comas de los estados de dominio a incluir (ej. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Excluir IDs de clientes',
    'DESC_EXCLUDE_CLIENTS'           => 'Lista separada por comas de los IDs de clientes a ignorar.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Excluir IDs de dominios',
    'DESC_EXCLUDE_DOMAINS'           => 'Lista separada por comas de los IDs de dominios a ignorar.',
    'LABEL_EXCLUDE_TLDS'             => 'Excluir TLDs',
    'DESC_EXCLUDE_TLDS'              => 'Lista separada por comas de los TLDs a ignorar (ej. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Omitir dominios promocionales',
    'DESC_SKIP_PROMO'                => 'Omite los dominios con un código promocional o cupón asignado.',
    'LABEL_SKIP_FREE'                => 'Omitir dominios gratuitos',
    'DESC_SKIP_FREE'                 => 'Omite los dominios con un precio recurrente actual de 0,00. Esto protege los dominios gratuitos o incluidos contra cambios de precio no deseados.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Mostrar solo cambios',
    'DESC_SHOW_ONLY_CHANGES'         => 'En la simulación, muestra solo los dominios donde el precio calculado difiere del precio actual.',
    'LABEL_ALLOW_DECREASES'          => 'Permitir reducciones de precio',
    'DESC_ALLOW_DECREASES'           => 'Permite la actualización de precios cuando el precio de renovación calculado es inferior al precio actual. Si está deshabilitado, las reducciones de precio se omitirán.',
    'TXT_CONFIRM_LIVE'               => '¿Está seguro de que desea ejecutar la sincronización en vivo? ¡Esto sobrescribirá los precios recurrentes de los dominios de los clientes y enviará correos electrónicos de actualización de precios!',
    'TXT_CONFIRM_DELETE_LOGS'        => '¿Está seguro de que desea eliminar todos los registros?',
    'TXT_CONFIRM_ACTION'             => 'Confirmo y autorizo la actualización de los precios de los dominios.',

    'STATUS_PASS'                    => 'Aprobado',
    'STATUS_WARN'                    => 'Advertencia',
    'STATUS_FAIL'                    => 'Error',
    'TXT_SETTINGS_SAVED'             => 'Configuración guardada correctamente.',
    'TXT_LOGS_DELETED'               => 'Todos los registros se han eliminado correctamente.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Base de datos y plantillas de correo electrónico reparadas correctamente.',
    'ERROR_CSRF'                     => 'La validación del token CSRF ha fallado.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Seleccione al menos un dominio para ejecutar la sincronización en vivo.',
    'ERROR_LICENSE_INVALID'          => 'Clave de licencia no válida',
    'ERROR_LICENSE_DESC'             => 'Introduzca una clave de licencia premium Domain Price Sync válida en las opciones de configuración del módulo.',

    'TXT_DRY_RUN_COMPLETED'          => 'Simulación completada. Calculados: {total} dominios. Actualizaciones necesarias: {updates}. Omitidos: {skipped}. Errores: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => '¡Sincronización en vivo completada! Procesados: {total} dominios. Actualizados: {updates}. Omitidos: {skipped}. Errores: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Esta es una simulación. No se han guardado cambios en la base de datos.',
    'TXT_LIVE_SYNC_WARNING'          => '¡Sincronización en vivo en curso! Los precios de los dominios de los clientes se están recalculando y actualizando. Se envían correos electrónicos de notificación para todas las actualizaciones de precios.',
    'TXT_NO_LOGS_FOUND'              => 'No se encontraron registros.',
    'TXT_NO_RESULTS_FOUND'           => 'No se encontraron registros para este filtro.',
    'TXT_LOGS_DESCRIPTION'           => 'Muestra los registros de simulaciones y sincronizaciones en vivo anteriores.',
    'TXT_CHECKBOX_ENABLE'            => 'Activar esta configuración de exclusión',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Confirme la acción marcando la casilla de verificación.',
    'TXT_ERROR_DB_REPAIR'            => 'Error en la reparación de la base de datos: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Error al eliminar los registros: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Error desconocido',
    'TXT_API_UPDATE_ERROR'           => 'Error de API durante UpdateClientDomain',

    'HEALTH_CHECK_TITLE'             => 'Verificación del estado del sistema',
    'HEALTH_ERRORS_DETECTED'         => '{count} errores detectados. Se requiere acción inmediata.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} advertencias detectadas. El sistema está operativo pero se recomiendan optimizaciones.',
    'HEALTH_ALL_PASSED'              => 'Todas las verificaciones aprobadas. Su sistema está en perfecto estado.',
    'HEALTH_MODULE_VERSION'          => 'Versión del módulo',
    'HEALTH_LICENSE_STATUS'          => 'Estado de la licencia',
    'HEALTH_INTEGRATION_CHECK'       => 'Integración API GetTLDPricing',
    'HEALTH_PHP_VERSION'             => 'Verificación de versión PHP',
    'HEALTH_PHP_VERSION_DESC'        => 'Requiere PHP 8.2 o superior. Versión actual: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Tabla de configuración (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Verifica si la tabla de configuración personalizada existe.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Esquema de la tabla de configuración',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Todas las columnas existen.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Columnas faltantes: {columns}',
    'HEALTH_LOG_TABLE'               => 'Tabla de registros (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Verifica si la tabla de registros personalizada existe.',
    'HEALTH_LOG_SCHEMA'              => 'Esquema de la tabla de registros',
    'HEALTH_LOG_SCHEMA_OK'           => 'Todas las columnas existen.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Columnas faltantes: {columns}',
    'HEALTH_CORE_TABLE'              => 'Tabla de sistema WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Verifica si la tabla de sistema {table} existe.',
    'HEALTH_EMAIL_TEMPLATE'          => 'Plantilla de correo electrónico: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Verifica si la plantilla de correo personalizada {name} existe en tblemailtemplates.',
    'HEALTH_INTEGRATION_OK'          => 'La API responde y devuelve datos de precios.',
    'HEALTH_INTEGRATION_FAIL'        => 'Respuesta de la API: {message}',
    'HEALTH_DB_STATUS'               => 'Estado de la base de datos',

    'TXT_STATS_DOMAINS_COLLECTED'    => 'Dominios recopilados',
    'TXT_STATS_PRICE_CHANGES'        => 'Cambiaría el precio',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Diferencia de ingresos mensuales',
    'TXT_STATS_ERRORS'               => 'Errores / advertencias',
    'TXT_STATS_UPDATED'              => 'Precio actualizado',

    'TH_DOMAIN'                      => 'Dominio',
    'TH_CLIENT'                      => 'Cliente',
    'TH_REGPERIOD'                   => 'Período de registro',
    'TH_OLD_AMOUNT'                  => 'Precio recurrente actual',
    'TH_NEW_AMOUNT'                  => 'Precio calculado',
    'TH_DIFFERENCE'                  => 'Diferencia',
    'TH_STATUS'                      => 'Estado',
    'TH_REASON'                      => 'Detalles',
    'TH_DATE'                        => 'Fecha',
    'TH_RUN_TYPE'                    => 'Tipo de ejecución',

    'STATUS_UPDATED'                 => 'Actualizado',
    'STATUS_SKIPPED'                 => 'Omitido',
    'STATUS_ERROR'                   => 'Error',
    'STATUS_MATCH'                   => 'El precio coincide',
    'STATUS_WOULD_UPDATE'            => 'Se actualizaría',
    'STATUS_SKIPPED_DECREASE'        => 'Reducción omitida',

    'LABEL_ENABLE_TRANSPARENCY'      => 'Activar página pública de transparencia',
    'DESC_ENABLE_TRANSPARENCY'       => 'Activa una página pública para visitantes en index.php?m=spDomainPriceSync&action=transparency que muestra estadísticas anonimizadas de cambios de precios.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Enlaces en el pie de página para visitantes',
    'DESC_GUEST_FOOTER_LINKS'        => 'Agregue enlaces de navegación que se mostrarán en el pie de página de la página pública de transparencia (ej. aviso legal, política de privacidad).',
    'GUEST_FOOTER_LABEL'             => 'Etiqueta del enlace',
    'GUEST_FOOTER_ADD'               => 'Agregar enlace',
    'GUEST_PAGE_TITLE'               => 'Transparencia de precios de dominios',
    'GUEST_PAGE_SUBTITLE'            => 'Ajustes de precios mediante sincronización con registradores',
    'GUEST_PAGE_INTRO'               => 'En esta página publicamos de manera transparente los ajustes de precios recientes para las renovaciones de dominios. La sincronización de precios se realiza automáticamente en función de las tarifas mayoristas de nuestros registradores asociados.',
    'GUEST_LAST_SYNC'                => 'Última sincronización',
    'GUEST_NO_DATA'                  => 'Aún no se han registrado ajustes de precios.',
    'GUEST_RATIO_TITLE'              => 'Ajustes de precios por dirección',
    'GUEST_STATS_TLD_TITLE'          => 'Mostrar estadísticas por extensión de dominio (TLD)',
    'GUEST_INCREASES'                => 'Aumentos',
    'GUEST_DECREASES'                => 'Reducciones',

    'LABEL_FILTER_CLIENT_ID'         => 'Filtrar por ID de cliente',
    'BTN_FILTER'                     => 'Filtrar',
    'BTN_RESET_FILTER'               => 'Restablecer filtro',
    'CLIENT_TITLE'                   => 'Registro de ajustes de precios de dominios',
    'CLIENT_DESC'                    => 'Esta página muestra el historial de ajustes de precios automáticos aplicados a sus dominios para coincidir con las tarifas actuales de los registradores.',
    'CLIENT_NO_LOGS'                 => 'No se han registrado ajustes de precios para sus dominios.',
    'CLIENT_COL_DATE'                => 'Fecha',
    'CLIENT_COL_DOMAIN'              => 'Nombre de dominio',
    'CLIENT_COL_OLD_PRICE'           => 'Precio de renovación anterior',
    'CLIENT_COL_NEW_PRICE'           => 'Nuevo precio de renovación',
    'CLIENT_COL_DIFFERENCE'          => 'Diferencia',
    'CLIENT_COL_STATUS'              => 'Estado',
    'CLIENT_COL_DETAILS'             => 'Detalles del ajuste',
    'CLIENT_STATUS_UPDATED'          => 'Actualizado',
    'FILTER_SEARCH'                  => 'Buscar...',

    'LABEL_ENABLE_CLIENT_LOGS'       => 'Activar vista de cliente para ajustes de precios',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Activa una página en el área de cliente en index.php?m=spDomainPriceSync donde los clientes autenticados pueden consultar el historial de ajustes de precios de sus dominios.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Transparencia de precios de dominios',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Ayuda';
$_ADDONLANG['HELP_TITLE']         = 'Ayuda y documentación';
$_ADDONLANG['HELP_WHAT']          = '¿Qué hace este módulo?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Este módulo le permite administrar Domain Price Sync directamente desde su área de administración de WHMCS.';
$_ADDONLANG['HELP_CONFIG']        = '¿Cómo configuro los ajustes del módulo?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Vaya a la pestaña Configuración para ajustar opciones como el acceso a la API, las tareas automatizadas y la retención de registros.';
$_ADDONLANG['HELP_HEALTH']        = '¿Cómo funcionan las comprobaciones de estado de la base de datos?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Use la Verificación de estado del sistema para auditar el esquema, las tablas y las columnas de la base de datos, y verificar que las dependencias del módulo estén instaladas correctamente.';
$_ADDONLANG['HELP_SUPPORT']       = '¿Dónde puedo encontrar soporte?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'Si tiene preguntas, problemas o actualizaciones, comuníquese con el equipo de soporte a través de support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Aviso importante';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Asegúrese de realizar una auditoría de estado y reparar la base de datos después de actualizar el módulo para evitar errores de esquema.';

$_ADDONLANG['INFO_TITLE']       = 'Guía de ajuste de precios';
$_ADDONLANG['INFO_INTRO']       = 'Para ofrecerle siempre condiciones justas, nuestros precios de renovación de dominios se sincronizan regularmente con los precios de costo de los registradores. Esto da como resultado los siguientes pasos transparentes:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Comprobación automática de precios';
$_ADDONLANG['INFO_STEP1_DESC']  = 'El sistema consulta regularmente los precios de costo actuales para cada TLD (por ejemplo, .de, .com) en nuestros registradores.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Sincronización de las tasas de renovación';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Si las condiciones de costo cambian, su precio de renovación recurrente se recalcula y ajusta automáticamente en el sistema.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Historial transparente';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Cada ajuste de precio se documenta aquí en el registro con precisión de centavos, mostrando el precio antiguo, el nuevo precio y la diferencia.';
$_ADDONLANG['INFO_SUPPORT']     = 'Si tiene alguna pregunta sobre ajustes de precios o facturas individuales, nuestro equipo de soporte está siempre a su disposición.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Publicamos todos los cambios de precios de forma transparente y anónima.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Ver estadísticas públicas';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'Plantillas de correo electrónico';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Abra y personalice las plantillas de correo de WHMCS utilizadas durante la sincronización en vivo. Variables disponibles: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Aviso de aumento de precio';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Aviso de reducción de precio';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Editar plantilla';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Plantilla no encontrada en la base de datos. Ejecute una reparación en Verificación de estado del sistema.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Enlaces de ejemplo para página de cliente y pública';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Enlaces de ejemplo directos a la vista de registros del cliente y a la página pública de transparencia.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Página privada de cliente (requiere inicio de sesión)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Muestra el historial personal de ajustes de precios para clientes conectados (requiere habilitar la vista de cliente).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Página pública de transparencia (invitados y clientes)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Muestra públicamente estadísticas anonimizadas de ajustes de precios de dominios (requiere habilitar la página pública).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Activo';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inactivo';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Abrir página';
$_ADDONLANG['BTN_COPY_URL']             = 'Copiar URL';
$_ADDONLANG['TXT_URL_COPIED']           = 'Copiado';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Plantilla del área de cliente';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Seleccione la plantilla usada para las páginas de cliente y pública según las subcarpetas de templates/. La detección automática usa el tema activo de WHMCS y six de forma predeterminada.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Detección automática (tema WHMCS: {whmcs_tpl}, activo: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Predeterminado)';
