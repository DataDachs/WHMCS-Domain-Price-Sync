<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * All language definitions for the admin and guest interface in European Portuguese.
 */

if (! defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

$_ADDONLANG = [
    'TITLE'                          => 'Sincronização de preços de domínios',
    'DESCRIPTION'                    => 'Sincroniza e recalcula automaticamente os preços recorrentes dos domínios dos clientes com base nos preços TLD configurados.',
    'DROP_TABLES'                    => 'Eliminar tabelas ao desativar',
    'DROP_TABLES_DESC'               => 'Selecione para eliminar todos os dados, definições e registos do módulo ao desativá-lo.',
    'DEBUG_MODE'                     => 'Modo de depuração',
    'DEBUG_MODE_DESC'                => 'Ativa a escrita de registos de depuração e mensagens de erro detalhadas.',

    'TAB_SYNC'                       => 'Sincronização de preços',
    'TAB_LOGS'                       => 'Registos',
    'TAB_SETTINGS'                   => 'Definições e exclusões',
    'TAB_HEALTH'                     => 'Verificação de saúde do sistema',

    'BTN_RUN_AUDIT'                  => 'Executar auditoria',
    'BTN_REPAIR_DB'                  => 'Reparar base de dados',
    'BTN_SAVE_SETTINGS'              => 'Guardar definições',
    'BTN_RUN_DRY_RUN'                => 'Iniciar simulação',
    'BTN_RUN_LIVE_SYNC'              => 'Executar sincronização em direto',
    'BTN_DELETE_LOGS'                => 'Limpar registos',
    'BTN_EXPORT_CSV'                 => 'Exportar CSV',

    'LABEL_STATUS_FILTER'            => 'Filtro de estado de domínio',
    'DESC_STATUS_FILTER'             => 'Lista separada por vírgulas dos estados de domínio a incluir (ex. Active, Pending, Pending Transfer).',
    'LABEL_EXCLUDE_CLIENTS'          => 'Excluir IDs de clientes',
    'DESC_EXCLUDE_CLIENTS'           => 'Lista separada por vírgulas dos IDs de clientes a ignorar.',
    'LABEL_EXCLUDE_DOMAINS'          => 'Excluir IDs de domínios',
    'DESC_EXCLUDE_DOMAINS'           => 'Lista separada por vírgulas dos IDs de domínios a ignorar.',
    'LABEL_EXCLUDE_TLDS'             => 'Excluir TLDs',
    'DESC_EXCLUDE_TLDS'              => 'Lista separada por vírgulas dos TLDs a ignorar (ex. .com, .de).',
    'LABEL_SKIP_PROMO'               => 'Ignorar domínios promocionais',
    'DESC_SKIP_PROMO'                => 'Ignora domínios com código promocional ou cupão atribuído.',
    'LABEL_SKIP_FREE'                => 'Ignorar domínios gratuitos',
    'DESC_SKIP_FREE'                 => 'Ignora domínios com preço recorrente atual de 0,00. Isto protege domínios gratuitos ou incluídos contra alterações de preço indesejadas.',
    'LABEL_SHOW_ONLY_CHANGES'        => 'Mostrar apenas alterações',
    'DESC_SHOW_ONLY_CHANGES'         => 'Na simulação, mostra apenas domínios cujo preço calculado difere do preço atual.',
    'LABEL_ALLOW_DECREASES'          => 'Permitir reduções de preço',
    'DESC_ALLOW_DECREASES'           => 'Permite a atualização de preços quando o preço de renovação calculado é inferior ao preço atual. Se desativado, as reduções de preço serão ignoradas.',
    'TXT_CONFIRM_LIVE'               => 'Tem a certeza de que deseja executar a sincronização em direto? Isto substituirá os preços recorrentes dos domínios dos clientes e enviará e-mails de atualização de preços!',
    'TXT_CONFIRM_DELETE_LOGS'        => 'Tem a certeza de que deseja eliminar todos os registos?',
    'TXT_CONFIRM_ACTION'             => 'Confirmo e autorizo a atualização dos preços dos domínios.',

    'STATUS_PASS'                    => 'Aprovado',
    'STATUS_WARN'                    => 'Aviso',
    'STATUS_FAIL'                    => 'Falha',
    'TXT_SETTINGS_SAVED'             => 'Definições guardadas com sucesso.',
    'TXT_LOGS_DELETED'               => 'Todos os registos eliminados com sucesso.',
    'TXT_HEALTH_REPAIR_SUCCESS'      => 'Base de dados e modelos de e-mail reparados com sucesso.',
    'ERROR_CSRF'                     => 'Validação do token CSRF falhou.',
    'ERROR_NO_DOMAINS_SELECTED'      => 'Selecione pelo menos um domínio para executar a sincronização em direto.',
    'ERROR_LICENSE_INVALID'          => 'Chave de licença inválida',
    'ERROR_LICENSE_DESC'             => 'Introduza uma chave de licença premium Domain Price Sync válida nas opções de configuração do módulo.',

    'TXT_DRY_RUN_COMPLETED'          => 'Simulação concluída. Calculados: {total} domínios. Atualizações necessárias: {updates}. Ignorados: {skipped}. Erros: {errors}.',
    'TXT_LIVE_SYNC_COMPLETED'        => 'Sincronização em direto concluída! Processados: {total} domínios. Atualizados: {updates}. Ignorados: {skipped}. Erros: {errors}.',
    'TXT_DRY_RUN_WARNING'            => 'Esta é uma simulação. Nenhuma alteração foi guardada na base de dados.',
    'TXT_LIVE_SYNC_WARNING'          => 'Sincronização em direto em curso! Os preços dos domínios dos clientes estão a ser recalculados e atualizados. Estão a ser enviados e-mails de notificação para todas as atualizações de preço.',
    'TXT_NO_LOGS_FOUND'              => 'Nenhum registo encontrado.',
    'TXT_NO_RESULTS_FOUND'           => 'Nenhum registo encontrado para este filtro.',
    'TXT_LOGS_DESCRIPTION'           => 'Apresenta os registos de simulações e sincronizações em direto anteriores.',
    'TXT_CHECKBOX_ENABLE'            => 'Ativar esta definição de exclusão',
    'TXT_CONFIRM_CHECKBOX_REQUIRED'  => 'Confirme a ação selecionando a caixa de verificação.',
    'TXT_ERROR_DB_REPAIR'            => 'Erro na reparação da base de dados: {message}',
    'TXT_ERROR_CLEARING_LOGS'        => 'Erro ao limpar registos: {message}',
    'TXT_UNKNOWN_API_ERROR'          => 'Erro desconhecido',
    'TXT_API_UPDATE_ERROR'           => 'Erro de API durante UpdateClientDomain',

    'HEALTH_CHECK_TITLE'             => 'Verificação de saúde do sistema',
    'HEALTH_ERRORS_DETECTED'         => '{count} erros detetados. Ação imediata é necessária.',
    'HEALTH_WARNINGS_DETECTED'       => '{count} avisos detetados. O sistema está operacional, mas são recomendadas otimizações.',
    'HEALTH_ALL_PASSED'              => 'Todas as verificações aprovadas. O seu sistema está em perfeito estado.',
    'HEALTH_MODULE_VERSION'          => 'Versão do módulo',
    'HEALTH_LICENSE_STATUS'          => 'Estado da licença',
    'HEALTH_INTEGRATION_CHECK'       => 'Integração API GetTLDPricing',
    'HEALTH_PHP_VERSION'             => 'Verificação da versão do PHP',
    'HEALTH_PHP_VERSION_DESC'        => 'Requer PHP 8.2 ou superior. Versão atual: {version}',
    'HEALTH_SETTINGS_TABLE'          => 'Tabela de definições (mod_spdomainpricesync_settings)',
    'HEALTH_SETTINGS_TABLE_DESC'     => 'Verifica se a tabela de definições personalizada existe.',
    'HEALTH_SETTINGS_SCHEMA'         => 'Esquema da tabela de definições',
    'HEALTH_SETTINGS_SCHEMA_OK'      => 'Todas as colunas existem.',
    'HEALTH_SETTINGS_SCHEMA_MISSING' => 'Colunas em falta: {columns}',
    'HEALTH_LOG_TABLE'               => 'Tabela de registos (mod_spdomainpricesync_log)',
    'HEALTH_LOG_TABLE_DESC'          => 'Verifica se a tabela de registos personalizada existe.',
    'HEALTH_LOG_SCHEMA'              => 'Esquema da tabela de registos',
    'HEALTH_LOG_SCHEMA_OK'           => 'Todas as colunas existem.',
    'HEALTH_LOG_SCHEMA_MISSING'      => 'Colunas em falta: {columns}',
    'HEALTH_CORE_TABLE'              => 'Tabela de sistema WHMCS: {table}',
    'HEALTH_CORE_TABLE_DESC'         => 'Verifica se a tabela de sistema {table} existe.',
    'HEALTH_EMAIL_TEMPLATE'          => 'Modelo de e-mail: {name}',
    'HEALTH_EMAIL_TEMPLATE_DESC'     => 'Verifica se o modelo de e-mail personalizado {name} existe em tblemailtemplates.',
    'HEALTH_INTEGRATION_OK'          => 'A API está a responder e a devolver dados de preços.',
    'HEALTH_INTEGRATION_FAIL'        => 'Resposta da API: {message}',
    'HEALTH_DB_STATUS'               => 'Estado da base de dados',

    'TXT_STATS_DOMAINS_COLLECTED'    => 'Domínios recolhidos',
    'TXT_STATS_PRICE_CHANGES'        => 'Alteraria o preço',
    'TXT_STATS_TOTAL_DIFFERENCE'     => 'Diferença de receita mensal',
    'TXT_STATS_ERRORS'               => 'Erros / avisos',
    'TXT_STATS_UPDATED'              => 'Preço atualizado',

    'TH_DOMAIN'                      => 'Domínio',
    'TH_CLIENT'                      => 'Cliente',
    'TH_REGPERIOD'                   => 'Período de registo',
    'TH_OLD_AMOUNT'                  => 'Preço recorrente atual',
    'TH_NEW_AMOUNT'                  => 'Preço calculado',
    'TH_DIFFERENCE'                  => 'Diferença',
    'TH_STATUS'                      => 'Estado',
    'TH_REASON'                      => 'Detalhes',
    'TH_DATE'                        => 'Data',
    'TH_RUN_TYPE'                    => 'Tipo de execução',

    'STATUS_UPDATED'                 => 'Atualizado',
    'STATUS_SKIPPED'                 => 'Ignorado',
    'STATUS_ERROR'                   => 'Erro',
    'STATUS_MATCH'                   => 'Preço correspondente',
    'STATUS_WOULD_UPDATE'            => 'Seria atualizado',
    'STATUS_SKIPPED_DECREASE'        => 'Redução ignorada',

    'LABEL_ENABLE_TRANSPARENCY'      => 'Ativar página pública de transparência',
    'DESC_ENABLE_TRANSPARENCY'       => 'Ativa uma página pública para visitantes em index.php?m=spDomainPriceSync&action=transparency com estatísticas anonimizadas de alterações de preço.',
    'LABEL_GUEST_FOOTER_LINKS'       => 'Ligações no rodapé da página de visitantes',
    'DESC_GUEST_FOOTER_LINKS'        => 'Adicione ligações de navegação que serão apresentadas no rodapé da página pública de transparência (ex. aviso legal, política de privacidade).',
    'GUEST_FOOTER_LABEL'             => 'Rótulo da ligação',
    'GUEST_FOOTER_ADD'               => 'Adicionar ligação',
    'GUEST_PAGE_TITLE'               => 'Transparência de preços de domínios',
    'GUEST_PAGE_SUBTITLE'            => 'Ajustamentos de preço via sincronização com registadores',
    'GUEST_PAGE_INTRO'               => 'Nesta página publicamos de forma transparente os ajustamentos de preço recentes para renovações de domínios. A sincronização de preços é realizada automaticamente com base nas tarifas por grosso dos nossos registadores parceiros.',
    'GUEST_LAST_SYNC'                => 'Última sincronização',
    'GUEST_NO_DATA'                  => 'Nenhum ajustamento de preço foi registado até ao momento.',
    'GUEST_RATIO_TITLE'              => 'Ajustamentos de preço por direção',
    'GUEST_STATS_TLD_TITLE'          => 'Apresentar estatísticas por extensão de domínio (TLD)',
    'GUEST_INCREASES'                => 'Aumentos',
    'GUEST_DECREASES'                => 'Reduções',

    'LABEL_FILTER_CLIENT_ID'         => 'Filtrar por ID de cliente',
    'BTN_FILTER'                     => 'Filtrar',
    'BTN_RESET_FILTER'               => 'Repor filtro',
    'CLIENT_TITLE'                   => 'Registo de ajustamentos de preços de domínios',
    'CLIENT_DESC'                    => 'Esta página apresenta o histórico de ajustamentos de preço automáticos aplicados aos seus domínios para corresponder aos preços atuais dos registadores.',
    'CLIENT_NO_LOGS'                 => 'Nenhum ajustamento de preço foi registado para os seus domínios.',
    'CLIENT_COL_DATE'                => 'Data',
    'CLIENT_COL_DOMAIN'              => 'Nome do domínio',
    'CLIENT_COL_OLD_PRICE'           => 'Preço de renovação anterior',
    'CLIENT_COL_NEW_PRICE'           => 'Novo preço de renovação',
    'CLIENT_COL_DIFFERENCE'          => 'Diferença',
    'CLIENT_COL_STATUS'              => 'Estado',
    'CLIENT_COL_DETAILS'             => 'Detalhes do ajustamento',
    'CLIENT_STATUS_UPDATED'          => 'Atualizado',
    'FILTER_SEARCH'                  => 'Pesquisar...',

    'LABEL_ENABLE_CLIENT_LOGS'       => 'Ativar visualização de ajustamentos de preço para clientes',
    'DESC_ENABLE_CLIENT_LOGS'        => 'Ativa uma página na área de cliente em index.php?m=spDomainPriceSync onde clientes autenticados podem consultar o histórico de ajustamentos de preço dos seus domínios.',
    'CLIENT_TRANSPARENCY_BTN'        => 'Transparência de preços de domínios',
];

// Help & Documentation Section
$_ADDONLANG['TAB_HELP']           = 'Ajuda';
$_ADDONLANG['HELP_TITLE']         = 'Ajuda e Documentação';
$_ADDONLANG['HELP_WHAT']          = 'O que faz este módulo?';
$_ADDONLANG['HELP_WHAT_TEXT']     = 'Este módulo permite-lhe gerir Domain Price Sync diretamente da sua área de administração do WHMCS.';
$_ADDONLANG['HELP_CONFIG']        = 'Como posso configurar as definições do módulo?';
$_ADDONLANG['HELP_CONFIG_TEXT']   = 'Vá ao separador Configurações para ajustar opções como acesso à API, tarefas automatizadas e retenção de logs.';
$_ADDONLANG['HELP_HEALTH']        = 'Como funcionam as verificações de integridade da base de dados?';
$_ADDONLANG['HELP_HEALTH_TEXT']   = 'Utilize a Verificação de integridade do sistema para auditar o esquema da base de dados, tabelas, colunas e verificar se as dependências do módulo estão instaladas corretamente.';
$_ADDONLANG['HELP_SUPPORT']       = 'Onde posso encontrar suporte?';
$_ADDONLANG['HELP_SUPPORT_TEXT']  = 'Para dúvidas, resolução de problemas ou atualizações, contacte a equipa de suporte via support@datadachs.eu.';
$_ADDONLANG['HELP_WARNING_TITLE'] = 'Aviso importante';
$_ADDONLANG['HELP_WARNING_TEXT']  = 'Certifique-se de que realiza uma auditoria de integridade e repara a base de dados após atualizar o módulo para evitar erros de esquema.';

$_ADDONLANG['INFO_TITLE']       = 'Guia de ajuste de preços';
$_ADDONLANG['INFO_INTRO']       = 'Para lhe oferecer sempre condições justas, os nossos preços de renovação de domínios são regularmente sintonizados com os preços de custo dos registradores. Isso resulta nas seguintes etapas transparentes:';
$_ADDONLANG['INFO_STEP1_TITLE'] = '1. Verificação automática de preços';
$_ADDONLANG['INFO_STEP1_DESC']  = 'O sistema consulta regularmente os preços de custo atuais para cada TLD (ex: .de, .com) nos nossos registradores.';
$_ADDONLANG['INFO_STEP2_TITLE'] = '2. Sincronização das taxas de renovação';
$_ADDONLANG['INFO_STEP2_DESC']  = 'Se as condições de custo mudarem, o seu preço de renovação recorrente é automaticamente recalculado e ajustado no sistema.';
$_ADDONLANG['INFO_STEP3_TITLE'] = '3. Histórico transparente';
$_ADDONLANG['INFO_STEP3_DESC']  = 'Cada ajuste de preço é documentado aqui no log com precisão de cêntimos, mostrando o preço antigo, o novo preço e a diferença.';
$_ADDONLANG['INFO_SUPPORT']     = 'Se tiver alguma dúvida sobre ajustes de preços ou faturas individuais, o nosso suporte está sempre à sua disposição.';

$_ADDONLANG['TRANSPARENCY_ALERT_TEXT'] = 'Publicamos todas as alterações de preços de forma transparente e anónima.';
$_ADDONLANG['TRANSPARENCY_ALERT_LINK'] = 'Ver estatísticas públicas';

$_ADDONLANG['EMAIL_TEMPLATES_TITLE']    = 'Modelos de e-mail';
$_ADDONLANG['EMAIL_TEMPLATES_DESC']     = 'Abra e personalize os modelos de e-mail do WHMCS utilizados durante a sincronização em direto. Variáveis disponíveis: {$domain_name}, {$old_price}, {$new_price}, {$next_due_date}.';
$_ADDONLANG['EMAIL_TPL_INCREASE_LABEL'] = 'Notificação de aumento de preço';
$_ADDONLANG['EMAIL_TPL_DECREASE_LABEL'] = 'Notificação de redução de preço';
$_ADDONLANG['BTN_EDIT_EMAIL_TEMPLATE']  = 'Editar modelo';
$_ADDONLANG['EMAIL_TPL_MISSING']        = 'Modelo não encontrado na base de dados. Execute uma reparação em Verificação de integridade do sistema.';
$_ADDONLANG['PAGE_LINKS_TITLE']         = 'Exemplos de ligações para páginas de cliente e pública';
$_ADDONLANG['PAGE_LINKS_DESC']          = 'Ligações de exemplo diretas para a vista de registos do cliente e para a página pública de transparência.';
$_ADDONLANG['LINK_PRIVATE_LABEL']       = 'Página privada de cliente (início de sessão obrigatório)';
$_ADDONLANG['LINK_PRIVATE_DESC']        = 'Apresenta os registos pessoais de ajustes de preços aos clientes autenticados (requer ativação dos registos de cliente).';
$_ADDONLANG['LINK_PUBLIC_LABEL']        = 'Página pública de transparência (visitantes e clientes)';
$_ADDONLANG['LINK_PUBLIC_DESC']         = 'Apresenta publicamente estatísticas anonimizadas de ajustes de preços de domínios (requer ativação da página pública).';
$_ADDONLANG['STATUS_ACTIVE']            = 'Ativo';
$_ADDONLANG['STATUS_INACTIVE']          = 'Inativo';
$_ADDONLANG['BTN_OPEN_PAGE']            = 'Abrir página';
$_ADDONLANG['BTN_COPY_URL']             = 'Copiar URL';
$_ADDONLANG['TXT_URL_COPIED']           = 'Copiado';
$_ADDONLANG['LABEL_CLIENTAREA_TEMPLATE'] = 'Modelo da área de cliente';
$_ADDONLANG['DESC_CLIENTAREA_TEMPLATE'] = 'Selecione o modelo utilizado nas páginas de cliente e pública com base nas subpastas em templates/. A deteção automática utiliza o tema WHMCS ativo com six como predefinição.';
$_ADDONLANG['OPTION_TEMPLATE_AUTO'] = 'Deteção automática (tema WHMCS: {whmcs_tpl}, ativo: {resolved_tpl})';
$_ADDONLANG['OPTION_TEMPLATE_DEFAULT_SUFFIX'] = '(Predefinição)';
