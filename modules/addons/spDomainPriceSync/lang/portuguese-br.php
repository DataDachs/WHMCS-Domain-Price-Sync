<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in Brazilian Portuguese.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE' => 'Sincronização de preços de domínios',
    'DESCRIPTION' => 'Sincroniza e recalcula automaticamente os preços recorrentes dos domínios dos clientes com base nos preços de TLD configurados.',
    'DROP_TABLES' => 'Excluir tabelas na desativação',
    'DROP_TABLES_DESC' => 'Marque para excluir todos os dados, configurações e logs do módulo ao desativá-lo.',
    'DEBUG_MODE' => 'Modo de depuração',
    'DEBUG_MODE_DESC' => 'Ativa a gravação de logs de depuração e mensagens de erro detalhadas.',
    
    'TAB_SYNC' => 'Sincronização de preços',
    'TAB_LOGS' => 'Registros',
    'TAB_SETTINGS' => 'Configurações e exclusões',
    'TAB_HEALTH' => 'Verificação de saúde do sistema',
    
    'BTN_RUN_AUDIT' => 'Executar auditoria',
    'BTN_REPAIR_DB' => 'Reparar banco de dados',
    'BTN_SAVE_SETTINGS' => 'Salvar configurações',
    'BTN_RUN_DRY_RUN' => 'Iniciar simulação',
    'BTN_RUN_LIVE_SYNC' => 'Executar sincronização ao vivo',
    'BTN_DELETE_LOGS' => 'Limpar registros',
    'BTN_EXPORT_CSV' => 'Exportar CSV',
    
    'LABEL_STATUS_FILTER' => 'Filtro de status de domínio',
    'DESC_STATUS_FILTER' => 'Lista separada por vírgulas dos status de domínio a incluir (ex. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS' => 'Excluir IDs de clientes',
    'DESC_EXCLUDE_CLIENTS' => 'Lista separada por vírgulas dos IDs de clientes a ignorar.',
    'LABEL_EXCLUDE_DOMAINS' => 'Excluir IDs de domínios',
    'DESC_EXCLUDE_DOMAINS' => 'Lista separada por vírgulas dos IDs de domínios a ignorar.',
    'LABEL_EXCLUDE_TLDS' => 'Excluir TLDs',
    'DESC_EXCLUDE_TLDS' => 'Lista separada por vírgulas dos TLDs a ignorar (ex. .com, .de).',
    'LABEL_SKIP_PROMO' => 'Ignorar domínios promocionais',
    'DESC_SKIP_PROMO' => 'Ignora domínios com código promocional ou cupom atribuído.',
    'LABEL_SKIP_FREE' => 'Ignorar domínios gratuitos',
    'DESC_SKIP_FREE' => 'Ignora domínios com preço recorrente atual de 0,00. Isso protege domínios gratuitos ou inclusos contra alterações de preço indesejadas.',
    'LABEL_SHOW_ONLY_CHANGES' => 'Mostrar apenas alterações',
    'DESC_SHOW_ONLY_CHANGES' => 'Na simulação, mostra apenas domínios cujo preço calculado difere do preço atual.',
    'LABEL_ALLOW_DECREASES' => 'Permitir reduções de preço',
    'DESC_ALLOW_DECREASES' => 'Permite a atualização de preços quando o preço de renovação calculado é menor que o preço atual. Se desativado, as reduções de preço serão ignoradas.',
    'TXT_CONFIRM_LIVE' => 'Tem certeza de que deseja executar a sincronização ao vivo? Isso substituirá os preços recorrentes dos domínios dos clientes e enviará e-mails de atualização de preços!',
    'TXT_CONFIRM_DELETE_LOGS' => 'Tem certeza de que deseja excluir todos os registros?',
    'TXT_CONFIRM_ACTION' => 'Confirmo e autorizo a atualização dos preços dos domínios.',
    
    'STATUS_PASS' => 'Aprovado',
    'STATUS_WARN' => 'Aviso',
    'STATUS_FAIL' => 'Falha',
    'TXT_SETTINGS_SAVED' => 'Configurações salvas com sucesso.',
    'TXT_LOGS_DELETED' => 'Todos os registros excluídos com sucesso.',
    'TXT_HEALTH_REPAIR_SUCCESS' => 'Banco de dados e modelos de e-mail reparados com sucesso.',
    'ERROR_CSRF' => 'Validação do token CSRF falhou.',
    'ERROR_NO_DOMAINS_SELECTED' => 'Selecione pelo menos um domínio para executar a sincronização ao vivo.',
    'ERROR_LICENSE_INVALID' => 'Chave de licença inválida',
    'ERROR_LICENSE_DESC' => 'Insira uma chave de licença premium Domain Price Sync válida nas opções de configuração do módulo.',
    
    'TXT_DRY_RUN_COMPLETED' => 'Simulação concluída. Calculados: {total} domínios. Atualizações necessárias: {updates}. Ignorados: {skipped}. Erros: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED' => 'Sincronização ao vivo concluída! Processados: {total} domínios. Atualizados: {updates}. Ignorados: {skipped}. Erros: {errors}.',
    'TXT_DRY_RUN_WARNING' => 'Esta é uma simulação. Nenhuma alteração foi salva no banco de dados.',
    'TXT_LIVE_SYNC_WARNING' => 'Sincronização ao vivo em andamento! Os preços dos domínios dos clientes estão sendo recalculados e atualizados. E-mails de notificação estão sendo enviados para todas as atualizações de preço.',
    'TXT_NO_LOGS_FOUND' => 'Nenhum registro encontrado.',
    'TXT_NO_RESULTS_FOUND' => 'Nenhum registro encontrado para este filtro.',
    'TXT_LOGS_DESCRIPTION' => 'Exibe os registros de simulações e sincronizações ao vivo anteriores.',
    'TXT_CHECKBOX_ENABLE' => 'Ativar esta configuração de exclusão',
    'TXT_CONFIRM_CHECKBOX_REQUIRED' => 'Confirme a ação marcando a caixa de seleção.',
    'TXT_ERROR_DB_REPAIR' => 'Erro na reparação do banco de dados: {message}',
    'TXT_ERROR_CLEARING_LOGS' => 'Erro ao limpar registros: {message}',
    'TXT_UNKNOWN_API_ERROR' => 'Erro desconhecido',
    'TXT_API_UPDATE_ERROR' => 'Erro de API durante UpdateClientDomain',
    
    'HEALTH_CHECK_TITLE' => 'Verificação de saúde do sistema',
    'HEALTH_ERRORS_DETECTED' => '{count} erros detectados. Ação imediata é necessária.',
    'HEALTH_WARNINGS_DETECTED' => '{count} avisos detectados. O sistema está operacional, mas otimizações são recomendadas.',
    'HEALTH_ALL_PASSED' => 'Todas as verificações aprovadas. Seu sistema está em perfeito estado.',
    'HEALTH_MODULE_VERSION' => 'Versão do módulo',
    'HEALTH_LICENSE_STATUS' => 'Status da licença',
    'HEALTH_INTEGRATION_CHECK' => 'Integração API GetTLDPricing',
    'HEALTH_PHP_VERSION' => 'Verificação da versão do PHP',
    'HEALTH_PHP_VERSION_DESC' => 'Requer PHP 8.2 ou superior. Versão atual: {version}',
    'HEALTH_SETTINGS_TABLE' => 'Tabela de configurações (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC' => 'Verifica se a tabela de configurações personalizada existe.',
    'HEALTH_SETTINGS_SCHEMA' => 'Esquema da tabela de configurações',
    'HEALTH_SETTINGS_SCHEMA_OK' => 'Todas as colunas existem.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Colunas ausentes: {columns}',
    'HEALTH_LOG_TABLE' => 'Tabela de registros (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC' => 'Verifica se a tabela de registros personalizada existe.',
    'HEALTH_LOG_SCHEMA' => 'Esquema da tabela de registros',
    'HEALTH_LOG_SCHEMA_OK' => 'Todas as colunas existem.',
    'HEALTH_LOG_SCHEMA_MISSING' => 'Colunas ausentes: {columns}',
    'HEALTH_CORE_TABLE' => 'Tabela de sistema WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC' => 'Verifica se a tabela de sistema {table} existe.',
    'HEALTH_EMAIL_TEMPLATE' => 'Modelo de e-mail: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC' => 'Verifica se o modelo de e-mail personalizado {name} existe em tblemailtemplates.',
    'HEALTH_INTEGRATION_OK' => 'API está respondendo e retornando dados de preços.',
    'HEALTH_INTEGRATION_FAIL' => 'Resposta da API: {message}',
    'HEALTH_DB_STATUS' => 'Status do banco de dados',
    
    'TXT_STATS_DOMAINS_COLLECTED' => 'Domínios coletados',
    'TXT_STATS_PRICE_CHANGES' => 'Alteraria o preço',
    'TXT_STATS_TOTAL_DIFFERENCE' => 'Diferença de receita mensal',
    'TXT_STATS_ERRORS' => 'Erros / avisos',
    'TXT_STATS_UPDATED' => 'Preço atualizado',
    
    'TH_DOMAIN' => 'Domínio',
    'TH_CLIENT' => 'Cliente',
    'TH_REGPERIOD' => 'Período de registro',
    'TH_OLD_AMOUNT' => 'Preço recorrente atual',
    'TH_NEW_AMOUNT' => 'Preço calculado',
    'TH_DIFFERENCE' => 'Diferença',
    'TH_STATUS' => 'Status',
    'TH_REASON' => 'Detalhes',
    'TH_DATE' => 'Data',
    'TH_RUN_TYPE' => 'Tipo de execução',
    
    'STATUS_UPDATED' => 'Atualizado',
    'STATUS_SKIPPED' => 'Ignorado',
    'STATUS_ERROR' => 'Erro',
    'STATUS_MATCH' => 'Preço corresponde',
    'STATUS_WOULD_UPDATE' => 'Seria atualizado',
    'STATUS_SKIPPED_DECREASE' => 'Redução ignorada',

    'LABEL_ENABLE_TRANSPARENCY' => 'Ativar página pública de transparência',
    'DESC_ENABLE_TRANSPARENCY' => 'Ativa uma página pública para visitantes em index.php?m=spDomainPriceSync&action=transparency exibindo estatísticas anonimizadas de alterações de preço.',
    'LABEL_GUEST_FOOTER_LINKS' => 'Links no rodapé da página de visitantes',
    'DESC_GUEST_FOOTER_LINKS' => 'Adicione links de navegação que serão exibidos no rodapé da página pública de transparência (ex. aviso legal, política de privacidade).',
    'GUEST_FOOTER_LABEL' => 'Rótulo do link',
    'GUEST_FOOTER_ADD' => 'Adicionar link',
    'GUEST_PAGE_TITLE' => 'Transparência de preços de domínios',
    'GUEST_PAGE_SUBTITLE' => 'Ajustes de preço via sincronização com registradores',
    'GUEST_PAGE_INTRO' => 'Nesta página publicamos de forma transparente os ajustes de preço recentes para renovações de domínios. A sincronização de preços é realizada automaticamente com base nas tarifas de atacado dos nossos registradores parceiros.',
    'GUEST_LAST_SYNC' => 'Última sincronização',
    'GUEST_NO_DATA' => 'Nenhum ajuste de preço foi registrado até o momento.',
    'GUEST_RATIO_TITLE' => 'Ajustes de preço por direção',
    'GUEST_STATS_TLD_TITLE' => 'Exibir estatísticas por extensão de domínio (TLD)',
    'GUEST_INCREASES' => 'Aumentos',
    'GUEST_DECREASES' => 'Reduções',

    'LABEL_FILTER_CLIENT_ID' => 'Filtrar por ID do cliente',
    'BTN_FILTER' => 'Filtrar',
    'BTN_RESET_FILTER' => 'Redefinir filtro',
    'CLIENT_TITLE' => 'Registro de ajustes de preços de domínios',
    'CLIENT_DESC' => 'Esta página exibe o histórico de ajustes de preço automáticos aplicados aos seus domínios para corresponder aos preços atuais dos registradores.',
    'CLIENT_NO_LOGS' => 'Nenhum ajuste de preço foi registrado para seus domínios.',
    'CLIENT_COL_DATE' => 'Data',
    'CLIENT_COL_DOMAIN' => 'Nome do domínio',
    'CLIENT_COL_OLD_PRICE' => 'Preço de renovação anterior',
    'CLIENT_COL_NEW_PRICE' => 'Novo preço de renovação',
    'CLIENT_COL_DIFFERENCE' => 'Diferença',
    'CLIENT_COL_STATUS' => 'Status',
    'CLIENT_COL_DETAILS' => 'Detalhes do ajuste',
    'CLIENT_STATUS_UPDATED' => 'Atualizado',
    'FILTER_SEARCH' => 'Pesquisar...',

    'LABEL_ENABLE_CLIENT_LOGS' => 'Ativar visualização de ajustes de preço para clientes',
    'DESC_ENABLE_CLIENT_LOGS' => 'Ativa uma página na área do cliente em index.php?m=spDomainPriceSync onde clientes conectados podem visualizar o histórico de ajustes de preço de seus domínios.',
    'CLIENT_TRANSPARENCY_BTN' => 'Transparência de preços de domínios',
];


// Help & Documentation Section
$_ADDONLANG['TAB_HELP'] = 'Ajuda';
$_ADDONLANG['HELP_TITLE'] = 'Ajuda e Documentação';
$_ADDONLANG['HELP_WHAT'] = 'O que este módulo faz?';
$_ADDONLANG['HELP_WHAT_TEXT'] = 'Este módulo permite que você gerencie Domain Price Sync diretamente da sua área administrativa do WHMCS.';
$_ADDONLANG['HELP_CONFIG'] = 'Como configuro as definições do módulo?';
$_ADDONLANG['HELP_CONFIG_TEXT'] = 'Acesse a guia Configurações para ajustar opções como acesso à API, tarefas automatizadas e retenção de logs.';
$_ADDONLANG['HELP_HEALTH'] = 'Como funcionam as verificações de integridade do banco de dados?';
$_ADDONLANG['HELP_HEALTH_TEXT'] = 'Use a Verificação de integridade do sistema para auditar o esquema do banco de dados, tabelas, colunas e verificar se as dependências do módulo estão instaladas corretamente.';
$_ADDONLANG['HELP_SUPPORT'] = 'Onde posso encontrar suporte?';
$_ADDONLANG['HELP_SUPPORT_TEXT'] = 'Para dúvidas, solução de problemas ou atualizações, entre em contato com a equipe de suporte via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Aviso importante';
$_ADDONLANG['HELP_WARNING_TEXT'] = 'Certifique-se de realizar uma auditoria de integridade e reparar o banco de dados após atualizar o módulo para evitar erros de esquema.';

$_ADDONLANG['INFO_TITLE'] = 'Guia de ajuste de preços';
$_ADDONLANG['INFO_INTRO'] = 'Para lhe oferecer sempre condições justas, os nossos preços de renovação de domínios são regularmente sincronizados com os preços de custo dos registradores. Isso resulta nas seguintes etapas transparentes:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Verificação automática de preços';
$_ADDONLANG['INFO_STEP1_DESC'] = 'O sistema consulta regularmente os preços de custo atuais para cada TLD (ex: .de, .com) nos nossos registradores.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Sincronização das taxas de renovação';
$_ADDONLANG['INFO_STEP2_DESC'] = 'Se as condições de custo mudarem, o seu preço de renovação recorrente é automaticamente recalculado e ajustado no sistema.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Histórico transparente';
$_ADDONLANG['INFO_STEP3_DESC'] = 'Cada ajuste de preço é documentado aqui no log com precisão de centavos, mostrando o preço antigo, o novo preço e a diferença.';
$_ADDONLANG['INFO_SUPPORT'] = 'Se tiver alguma dúvida sobre ajustes de preços ou faturas individuais, o nosso suporte está sempre à sua disposição.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Publicamos todas as alterações de preços de forma transparente e anônima.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Ver estatísticas públicas';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE'] = 'Modelos de e-mail';
$_ADDONLANG['EMAIL_TEMPLATES_DESC'] = 'Abra e personalize os modelos de e-mail do WHMCS usados durante a sincronização ao vivo. Variáveis disponíveis: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Notificação de aumento de preço';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Notificação de redução de preço';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE'] = 'Editar modelo';
$_ADDONLANG['EMAIL_TPL_MISSING'] = 'Modelo não encontrado no banco de dados. Execute um reparo na Verificação de integridade do sistema.';
$_ADDONLANG['PAGE_LINKS_TITLE'] = 'Exemplos de links para páginas do cliente e pública';
$_ADDONLANG['PAGE_LINKS_DESC'] = 'Links de exemplo diretos para a visualização de logs do cliente e para a página pública de transparência.';
$_ADDONLANG['LINK_PRIVATE_LABEL'] = 'Página privada do cliente (login obrigatório)';
$_ADDONLANG['LINK_PRIVATE_DESC'] = 'Exibe o histórico pessoal de ajustes de preços para clientes conectados (requer ativação dos logs de cliente).';
$_ADDONLANG['LINK_PUBLIC_LABEL'] = 'Página pública de transparência (visitantes e clientes)';
$_ADDONLANG['LINK_PUBLIC_DESC'] = 'Exibe publicamente estatísticas anonimizadas de ajustes de preços de domínios (requer ativação da página pública).';
$_ADDONLANG['STATUS_ACTIVE'] = 'Ativo';
$_ADDONLANG['STATUS_INACTIVE'] = 'Inativo';
$_ADDONLANG['BTN_OPEN_PAGE'] = 'Abrir página';
$_ADDONLANG['BTN_COPY_URL'] = 'Copiar URL';
$_ADDONLANG['TXT_URL_COPIED'] = 'Copiado';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Modelo da área do cliente';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Selecione o modelo usado nas páginas do cliente e pública com base nas subpastas em templates/. A detecção automática usa o tema WHMCS ativo com six como padrão.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Detecção automática (tema WHMCS: {whmcs_tpl}, ativo: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Padrão)';
