<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Russian.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE' => 'Синхронизация цен доменов',
    'DESCRIPTION' => 'Автоматически синхронизирует и пересчитывает периодические цены клиентских доменов на основе настроенных тарифов TLD.',
    'DROP_TABLES' => 'Удалить таблицы при деактивации',
    'DROP_TABLES_DESC' => 'Отметьте для удаления всех данных, настроек и журналов модуля при деактивации.',
    'DEBUG_MODE' => 'Режим отладки',
    'DEBUG_MODE_DESC' => 'Включает запись журналов отладки и подробные сообщения об ошибках.',
    
    'TAB_SYNC' => 'Синхронизация цен',
    'TAB_LOGS' => 'Журналы',
    'TAB_SETTINGS' => 'Настройки и исключения',
    'TAB_HEALTH' => 'Проверка состояния системы',
    
    'BTN_RUN_AUDIT' => 'Запустить аудит',
    'BTN_REPAIR_DB' => 'Восстановить базу данных',
    'BTN_SAVE_SETTINGS' => 'Сохранить настройки',
    'BTN_RUN_DRY_RUN' => 'Запустить тестовый прогон',
    'BTN_RUN_LIVE_SYNC' => 'Выполнить синхронизацию',
    'BTN_DELETE_LOGS' => 'Очистить журналы',
    'BTN_EXPORT_CSV' => 'Экспорт CSV',
    
    'LABEL_STATUS_FILTER' => 'Фильтр статуса домена',
    'DESC_STATUS_FILTER' => 'Список статусов доменов через запятую для включения (например, Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS' => 'Исключить ID клиентов',
    'DESC_EXCLUDE_CLIENTS' => 'Список ID клиентов через запятую для исключения.',
    'LABEL_EXCLUDE_DOMAINS' => 'Исключить ID доменов',
    'DESC_EXCLUDE_DOMAINS' => 'Список ID доменов через запятую для исключения.',
    'LABEL_EXCLUDE_TLDS' => 'Исключить TLD',
    'DESC_EXCLUDE_TLDS' => 'Список TLD через запятую для исключения (например, .com, .de).',
    'LABEL_SKIP_PROMO' => 'Пропустить промо-домены',
    'DESC_SKIP_PROMO' => 'Пропускает домены с назначенным промокодом или купоном.',
    'LABEL_SKIP_FREE' => 'Пропустить бесплатные домены',
    'DESC_SKIP_FREE' => 'Пропускает домены с текущей периодической ценой 0,00. Это защищает бесплатные или включённые домены от нежелательного изменения цены.',
    'LABEL_SHOW_ONLY_CHANGES' => 'Показывать только изменения',
    'DESC_SHOW_ONLY_CHANGES' => 'В тестовом прогоне показывает только домены, где рассчитанная цена отличается от текущей.',
    'LABEL_ALLOW_DECREASES' => 'Разрешить снижение цен',
    'DESC_ALLOW_DECREASES' => 'Разрешает обновление цен, когда рассчитанная цена продления ниже текущей. Если отключено, снижения цен будут пропущены.',
    'TXT_CONFIRM_LIVE' => 'Вы уверены, что хотите выполнить синхронизацию? Это перезапишет периодические цены клиентских доменов и отправит уведомления об изменении цен по электронной почте!',
    'TXT_CONFIRM_DELETE_LOGS' => 'Вы уверены, что хотите удалить все журналы?',
    'TXT_CONFIRM_ACTION' => 'Подтверждаю и разрешаю обновление цен доменов.',
    
    'STATUS_PASS' => 'Пройдено',
    'STATUS_WARN' => 'Предупреждение',
    'STATUS_FAIL' => 'Ошибка',
    'TXT_SETTINGS_SAVED' => 'Настройки успешно сохранены.',
    'TXT_LOGS_DELETED' => 'Все журналы успешно удалены.',
    'TXT_HEALTH_REPAIR_SUCCESS' => 'База данных и шаблоны электронной почты успешно восстановлены.',
    'ERROR_CSRF' => 'Ошибка проверки CSRF-токена.',
    'ERROR_NO_DOMAINS_SELECTED' => 'Выберите хотя бы один домен для выполнения синхронизации.',
    'ERROR_LICENSE_INVALID' => 'Недействительный лицензионный ключ',
    'ERROR_LICENSE_DESC' => 'Введите действительный премиум-ключ Domain Price Sync в настройках конфигурации модуля.',
    
    'TXT_DRY_RUN_COMPLETED' => 'Тестовый прогон завершён. Рассчитано: {total} доменов. Необходимо обновить: {updates}. Пропущено: {skipped}. Ошибки: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED' => 'Синхронизация завершена! Обработано: {total} доменов. Обновлено: {updates}. Пропущено: {skipped}. Ошибки: {errors}.',
    'TXT_DRY_RUN_WARNING' => 'Это тестовый прогон. Изменения в базу данных не сохранены.',
    'TXT_LIVE_SYNC_WARNING' => 'Выполняется синхронизация! Цены клиентских доменов пересчитываются и обновляются. Уведомления отправляются для всех обновлений цен.',
    'TXT_NO_LOGS_FOUND' => 'Журналы не найдены.',
    'TXT_NO_RESULTS_FOUND' => 'Журналы для этого фильтра не найдены.',
    'TXT_LOGS_DESCRIPTION' => 'Отображает журналы предыдущих тестовых прогонов и синхронизаций.',
    'TXT_CHECKBOX_ENABLE' => 'Активировать это исключение',
    'TXT_CONFIRM_CHECKBOX_REQUIRED' => 'Подтвердите действие, установив флажок.',
    'TXT_ERROR_DB_REPAIR' => 'Ошибка восстановления базы данных: {message}',
    'TXT_ERROR_CLEARING_LOGS' => 'Ошибка при очистке журналов: {message}',
    'TXT_UNKNOWN_API_ERROR' => 'Неизвестная ошибка',
    'TXT_API_UPDATE_ERROR' => 'Ошибка API при UpdateClientDomain',
    
    'HEALTH_CHECK_TITLE' => 'Проверка состояния системы',
    'HEALTH_ERRORS_DETECTED' => 'Обнаружено ошибок: {count}. Требуется немедленное вмешательство.',
    'HEALTH_WARNINGS_DETECTED' => 'Обнаружено предупреждений: {count}. Система работает, но рекомендуется оптимизация.',
    'HEALTH_ALL_PASSED' => 'Все проверки пройдены. Ваша система в отличном состоянии.',
    'HEALTH_MODULE_VERSION' => 'Версия модуля',
    'HEALTH_LICENSE_STATUS' => 'Статус лицензии',
    'HEALTH_INTEGRATION_CHECK' => 'Интеграция API GetTLDPricing',
    'HEALTH_PHP_VERSION' => 'Проверка версии PHP',
    'HEALTH_PHP_VERSION_DESC' => 'Требуется PHP 8.2 или выше. Текущая версия: {version}',
    'HEALTH_SETTINGS_TABLE' => 'Таблица настроек (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC' => 'Проверяет существование пользовательской таблицы настроек.',
    'HEALTH_SETTINGS_SCHEMA' => 'Схема таблицы настроек',
    'HEALTH_SETTINGS_SCHEMA_OK' => 'Все столбцы существуют.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Отсутствующие столбцы: {columns}',
    'HEALTH_LOG_TABLE' => 'Таблица журналов (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC' => 'Проверяет существование пользовательской таблицы журналов.',
    'HEALTH_LOG_SCHEMA' => 'Схема таблицы журналов',
    'HEALTH_LOG_SCHEMA_OK' => 'Все столбцы существуют.',
    'HEALTH_LOG_SCHEMA_MISSING' => 'Отсутствующие столбцы: {columns}',
    'HEALTH_CORE_TABLE' => 'Системная таблица WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC' => 'Проверяет существование системной таблицы {table}.',
    'HEALTH_EMAIL_TEMPLATE' => 'Шаблон электронной почты: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC' => 'Проверяет существование пользовательского шаблона {name} в tblemailtemplates.',
    'HEALTH_INTEGRATION_OK' => 'API отвечает и возвращает данные о ценах.',
    'HEALTH_INTEGRATION_FAIL' => 'Ответ API: {message}',
    'HEALTH_DB_STATUS' => 'Состояние базы данных',
    
    'TXT_STATS_DOMAINS_COLLECTED' => 'Собрано доменов',
    'TXT_STATS_PRICE_CHANGES' => 'Изменилась бы цена',
    'TXT_STATS_TOTAL_DIFFERENCE' => 'Разница месячного дохода',
    'TXT_STATS_ERRORS' => 'Ошибки / предупреждения',
    'TXT_STATS_UPDATED' => 'Обновлённая цена',
    
    'TH_DOMAIN' => 'Домен',
    'TH_CLIENT' => 'Клиент',
    'TH_REGPERIOD' => 'Период регистрации',
    'TH_OLD_AMOUNT' => 'Текущая периодическая цена',
    'TH_NEW_AMOUNT' => 'Рассчитанная цена',
    'TH_DIFFERENCE' => 'Разница',
    'TH_STATUS' => 'Статус',
    'TH_REASON' => 'Подробности',
    'TH_DATE' => 'Дата',
    'TH_RUN_TYPE' => 'Тип запуска',
    
    'STATUS_UPDATED' => 'Обновлено',
    'STATUS_SKIPPED' => 'Пропущено',
    'STATUS_ERROR' => 'Ошибка',
    'STATUS_MATCH' => 'Цена совпадает',
    'STATUS_WOULD_UPDATE' => 'Было бы обновлено',
    'STATUS_SKIPPED_DECREASE' => 'Снижение пропущено',

    'LABEL_ENABLE_TRANSPARENCY' => 'Включить публичную страницу прозрачности',
    'DESC_ENABLE_TRANSPARENCY' => 'Включает публичную гостевую страницу по адресу index.php?m=spDomainPriceSync&action=transparency с анонимной статистикой изменений цен.',
    'LABEL_GUEST_FOOTER_LINKS' => 'Ссылки в подвале гостевой страницы',
    'DESC_GUEST_FOOTER_LINKS' => 'Добавьте навигационные ссылки, которые будут отображаться в подвале публичной страницы прозрачности (например, правовая информация, политика конфиденциальности).',
    'GUEST_FOOTER_LABEL' => 'Текст ссылки',
    'GUEST_FOOTER_ADD' => 'Добавить ссылку',
    'GUEST_PAGE_TITLE' => 'Прозрачность цен на домены',
    'GUEST_PAGE_SUBTITLE' => 'Корректировка цен через синхронизацию с регистраторами',
    'GUEST_PAGE_INTRO' => 'На этой странице мы прозрачно публикуем последние корректировки цен на продление доменов. Синхронизация цен выполняется автоматически на основе оптовых тарифов наших партнёрских регистраторов.',
    'GUEST_LAST_SYNC' => 'Последняя синхронизация',
    'GUEST_NO_DATA' => 'Корректировки цен ещё не зарегистрированы.',
    'GUEST_RATIO_TITLE' => 'Корректировки цен по направлению',
    'GUEST_STATS_TLD_TITLE' => 'Показать статистику по доменному расширению (TLD)',
    'GUEST_INCREASES' => 'Повышения',
    'GUEST_DECREASES' => 'Снижения',

    'LABEL_FILTER_CLIENT_ID' => 'Фильтр по ID клиента',
    'BTN_FILTER' => 'Фильтровать',
    'BTN_RESET_FILTER' => 'Сбросить фильтр',
    'CLIENT_TITLE' => 'Журнал корректировок цен доменов',
    'CLIENT_DESC' => 'На этой странице отображается история автоматических корректировок цен, применённых к вашим доменам для соответствия текущим тарифам регистраторов.',
    'CLIENT_NO_LOGS' => 'Для ваших доменов не зарегистрировано корректировок цен.',
    'CLIENT_COL_DATE' => 'Дата',
    'CLIENT_COL_DOMAIN' => 'Имя домена',
    'CLIENT_COL_OLD_PRICE' => 'Предыдущая цена продления',
    'CLIENT_COL_NEW_PRICE' => 'Новая цена продления',
    'CLIENT_COL_DIFFERENCE' => 'Разница',
    'CLIENT_COL_STATUS' => 'Статус',
    'CLIENT_COL_DETAILS' => 'Детали корректировки',
    'CLIENT_STATUS_UPDATED' => 'Обновлено',
    'FILTER_SEARCH' => 'Поиск...',

    'LABEL_ENABLE_CLIENT_LOGS' => 'Включить просмотр корректировок цен для клиентов',
    'DESC_ENABLE_CLIENT_LOGS' => 'Включает страницу в клиентской зоне по адресу index.php?m=spDomainPriceSync, где авторизованные клиенты могут просматривать историю корректировок цен своих доменов.',
    'CLIENT_TRANSPARENCY_BTN' => 'Прозрачность цен на домены',
];


// Help & Documentation Section
$_ADDONLANG['TAB_HELP'] = 'Помощь';
$_ADDONLANG['HELP_TITLE'] = 'Помощь и документация';
$_ADDONLANG['HELP_WHAT'] = 'Что делает этот модуль?';
$_ADDONLANG['HELP_WHAT_TEXT'] = 'Этот модуль позволяет управлять Domain Price Sync непосредственно из административной панели WHMCS.';
$_ADDONLANG['HELP_CONFIG'] = 'Как настроить параметры модуля?';
$_ADDONLANG['HELP_CONFIG_TEXT'] = 'Перейдите на вкладку «Настройки», чтобы настроить такие параметры, как доступ к API, автоматические задачи и хранение журналов.';
$_ADDONLANG['HELP_HEALTH'] = 'Как работает проверка работоспособности базы данных?';
$_ADDONLANG['HELP_HEALTH_TEXT'] = 'Используйте проверку работоспособности системы для аудита схемы базы данных, таблиц, столбцов и проверки правильности установки зависимостей модуля.';
$_ADDONLANG['HELP_SUPPORT'] = 'Где я могу найти поддержку?';
$_ADDONLANG['HELP_SUPPORT_TEXT'] = 'По вопросам, устранению неполадок или обновлениям обращайтесь в службу поддержки через support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Важное объявление';
$_ADDONLANG['HELP_WARNING_TEXT'] = 'Обязательно выполните аудит работоспособности и восстановление базы данных после обновления модуля, чтобы предотвратить ошибки схемы.';

$_ADDONLANG['INFO_TITLE'] = 'Руководство по корректировке цен';
$_ADDONLANG['INFO_INTRO'] = 'Чтобы всегда предлагать вам выгодные условия, наши цены на продление доменов регулярно синхронизируются с закупочными ценами регистраторов. Это приводит к следующим прозрачным шагам:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Автоматическая проверка цен';
$_ADDONLANG['INFO_STEP1_DESC'] = 'Система регулярно запрашивает текущие закупочные цены для каждой зоны (например, .de, .com) у наших регистраторов.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Синхронизация стоимости продления';
$_ADDONLANG['INFO_STEP2_DESC'] = 'При изменении закупочных условий ваша повторяющаяся стоимость продления автоматически пересчитывается и корректируется в системе.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Прозрачная история';
$_ADDONLANG['INFO_STEP3_DESC'] = 'Каждая корректировка цен документируется здесь в журнале с точностью до цента, показывая старую цену, новую цену и разницу.';
$_ADDONLANG['INFO_SUPPORT'] = 'Если у вас возникнут вопросы по корректировке цен или отдельным счетам, наша служба поддержки всегда к вашим услугам.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Мы публикуем все изменения цен прозрачно и анонимно.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Посмотреть публичную статистику';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE'] = 'Шаблоны электронной почты';
$_ADDONLANG['EMAIL_TEMPLATES_DESC'] = 'Откройте и настройте шаблоны электронной почты WHMCS, используемые при синхронизации. Доступные переменные: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Уведомление о повышении цены';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Уведомление о снижении цены';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE'] = 'Редактировать шаблон';
$_ADDONLANG['EMAIL_TPL_MISSING'] = 'Шаблон не найден в базе данных. Выполните восстановление в разделе проверки работоспособности системы.';
$_ADDONLANG['PAGE_LINKS_TITLE'] = 'Примеры ссылок на клиентскую и публичную страницы';
$_ADDONLANG['PAGE_LINKS_DESC'] = 'Прямые ссылки на клиентский журнал изменений и на публичную страницу прозрачности цен.';
$_ADDONLANG['LINK_PRIVATE_LABEL'] = 'Закрытая клиентская страница (требуется вход)';
$_ADDONLANG['LINK_PRIVATE_DESC'] = 'Показывает авторизованным клиентам их личную историю корректировок цен на домены (требуется включение клиентского просмотра).';
$_ADDONLANG['LINK_PUBLIC_LABEL'] = 'Публичная страница прозрачности (гости и клиенты)';
$_ADDONLANG['LINK_PUBLIC_DESC'] = 'Публично отображает анонимную статистику корректировки цен по зонам TLD (требуется включение публичной страницы).';
$_ADDONLANG['STATUS_ACTIVE'] = 'Активно';
$_ADDONLANG['STATUS_INACTIVE'] = 'Неактивно';
$_ADDONLANG['BTN_OPEN_PAGE'] = 'Открыть страницу';
$_ADDONLANG['BTN_COPY_URL'] = 'Копировать URL';
$_ADDONLANG['TXT_URL_COPIED'] = 'Скопировано';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Шаблон клиентской части';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Выберите шаблон для клиентской и публичной страниц по подпапкам в templates/. Автоопределение выбирает активную тему WHMCS, а по умолчанию использует six.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Автоопределение (тема WHMCS: {whmcs_tpl}, выбрано: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(По умолчанию)';
