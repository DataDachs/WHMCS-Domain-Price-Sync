<div class="row" style="font-family: 'Outfit', sans-serif;">
    {if $clientLogsEnabled === 'yes'}
        <!-- Right Column (Info / Instructions) - Declared first so it stacks on top on mobile -->
        <div class="col-lg-4 order-lg-2 mb-5 mb-lg-0">
            <div class="card card-custom h-100">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label">
                            <i class="fas fa-info-circle text-primary mr-2"></i>
                            {$l.INFO_TITLE}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-dark mb-6">{$l.INFO_INTRO}</p>
                    
                    <div class="d-flex align-items-center mb-6">
                        <div class="symbol symbol-30 symbol-light-info mr-4">
                            <span class="symbol-label font-weight-bold">1</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="text-dark-75 font-weight-bolder font-size-lg">{$l.INFO_STEP1_TITLE}</span>
                            <span class="text-muted font-size-sm">{$l.INFO_STEP1_DESC}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-6">
                        <div class="symbol symbol-30 symbol-light-success mr-4">
                            <span class="symbol-label font-weight-bold">2</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="text-dark-75 font-weight-bolder font-size-lg">{$l.INFO_STEP2_TITLE}</span>
                            <span class="text-muted font-size-sm">{$l.INFO_STEP2_DESC}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-6">
                        <div class="symbol symbol-30 symbol-light-warning mr-4">
                            <span class="symbol-label font-weight-bold">3</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="text-dark-75 font-weight-bolder font-size-lg">{$l.INFO_STEP3_TITLE}</span>
                            <span class="text-muted font-size-sm">{$l.INFO_STEP3_DESC}</span>
                        </div>
                    </div>

                    <p class="text-muted font-size-sm border-top pt-4 mt-4 mb-0">
                        <i class="fas fa-question-circle text-muted mr-1"></i>
                        {$l.INFO_SUPPORT}
                    </p>

                    {if $transparencyEnabled === 'yes'}
                        <div class="alert alert-custom alert-light-info fade show mt-6 mb-0 p-4" role="alert" style="border-left: 4px solid #3699ff; background-color: #f4f8ff; display: flex; align-items: center;">
                            <div class="alert-icon">
                                <i class="fas fa-chart-line text-primary"></i>
                            </div>
                            <div class="alert-text font-size-sm text-dark-75 font-weight-bold" style="padding-left: 12px; line-height: 1.4;">
                                {$l.TRANSPARENCY_ALERT_TEXT}
                                <a href="index.php?m=spDomainPriceSync&action=transparency" target="_blank" rel="noopener" class="text-primary font-weight-boldest d-block mt-1">
                                    {$l.TRANSPARENCY_ALERT_LINK} <i class="fas fa-external-link-alt font-size-xs text-primary ml-1"></i>
                                </a>
                            </div>
                        </div>
                    {/if}
                </div>
            </div>
        </div>

        <!-- Left Column (Main Content Table) - Declared second to show on left on desktop -->
        <div class="col-lg-8 order-lg-1">
            <div class="card card-custom h-100">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label">{$l.CLIENT_TITLE}</h3>
                    </div>
                </div>
                <div class="card-body py-8">
                    <p class="text-dark mb-6">
                        {$l.CLIENT_DESC}
                    </p>

                    <div class="mb-6">
                        <input type="text" id="SPCustomSearchBox" class="form-control" placeholder="{$l.FILTER_SEARCH}">
                    </div>

                    {if empty($exportLogs)}
                        <div class="alert alert-custom alert-light-primary fade show mb-0 py-4 px-6 text-center" role="alert" style="background-color: #f1f3f9; border: 1px solid #e4e6ef; border-radius: 8px; color: #5e6278;">
                            <div class="alert-text font-weight-bold">
                                <i class="fa fa-info-circle mr-2 text-primary"></i> {$l.CLIENT_NO_LOGS}
                            </div>
                        </div>
                    {/if}

                    <div class="table-responsive" {if empty($exportLogs)}style="display:none;"{/if}>
                        <table class="table table-striped table-bordered table-hover sp-pricesync-table" id="SPDataTable">
                            <thead>
                                <tr>
                                    <th>{$l.CLIENT_COL_DATE}</th>
                                    <th>{$l.CLIENT_COL_DOMAIN}</th>
                                    <th style="text-align:right;">{$l.CLIENT_COL_OLD_PRICE}</th>
                                    <th style="text-align:right;">{$l.CLIENT_COL_NEW_PRICE}</th>
                                    <th style="text-align:right;">{$l.CLIENT_COL_DIFFERENCE}</th>
                                    <th style="text-align:center;">{$l.CLIENT_COL_STATUS}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {if !empty($exportLogs)}
                                    {foreach from=$exportLogs item=log}
                                        <tr>
                                            <td class="font-weight-bold">{$log->created_at}</td>
                                            <td><strong>{$log->domain_name}</strong></td>
                                            <td style="text-align:right;">{$log->old_amount|number_format:2}</td>
                                            <td style="text-align:right;">{$log->new_amount|number_format:2}</td>
                                            
                                            {assign var="diff" value=$log->difference}
                                            {if $diff > 0}
                                                <td style="text-align:right; font-weight:700; color:#059669;">+{$diff|number_format:2}</td>
                                            {elseif $diff < 0}
                                                <td style="text-align:right; font-weight:700; color:#dc2626;">{$diff|number_format:2}</td>
                                            {else}
                                                <td style="text-align:right; font-weight:700; color:#64748b;">{$diff|number_format:2}</td>
                                            {/if}

                                            <td style="text-align:center;">
                                                <span class="sp-status sp-status-updated">
                                                    {$l.CLIENT_STATUS_UPDATED}
                                                </span>
                                            </td>
                                        </tr>
                                    {/foreach}
                                {/if}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end::Client Logs Section -->
    {/if}
</div>
