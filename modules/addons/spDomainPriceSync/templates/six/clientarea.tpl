{if $clientLogsEnabled === 'yes'}
<style type="text/css">
    .sp-dps-six .sp-dps-step {
        display: flex;
        align-items: flex-start;
        margin-bottom: 16px;
    }
    .sp-dps-six .sp-dps-step-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        min-width: 28px;
        border-radius: 6px;
        background-color: #eef5ff;
        color: #1d4ed8;
        font-weight: 700;
        margin-right: 12px;
    }
    .sp-dps-six .sp-dps-diff-up {
        color: #059669;
        font-weight: 700;
    }
    .sp-dps-six .sp-dps-diff-down {
        color: #dc2626;
        font-weight: 700;
    }
    .sp-dps-six .sp-dps-diff-flat {
        color: #64748b;
        font-weight: 700;
    }
</style>

<div class="sp-dps-six">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fas fa-history"></i> {$l.CLIENT_TITLE|escape:'htmlall'}
                    </h3>
                </div>
                <div class="panel-body">
                    <p>{$l.CLIENT_DESC|escape:'htmlall'}</p>

                    <div class="form-group">
                        <input type="text" id="SPCustomSearchBox" class="form-control" placeholder="{$l.FILTER_SEARCH|escape:'htmlall'}" />
                    </div>

                    {if empty($exportLogs)}
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle"></i> {$l.CLIENT_NO_LOGS|escape:'htmlall'}
                        </div>
                    {else}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="SPDataTable">
                                <thead>
                                    <tr>
                                        <th>{$l.CLIENT_COL_DATE|escape:'htmlall'}</th>
                                        <th>{$l.CLIENT_COL_DOMAIN|escape:'htmlall'}</th>
                                        <th class="text-right">{$l.CLIENT_COL_OLD_PRICE|escape:'htmlall'}</th>
                                        <th class="text-right">{$l.CLIENT_COL_NEW_PRICE|escape:'htmlall'}</th>
                                        <th class="text-right">{$l.CLIENT_COL_DIFFERENCE|escape:'htmlall'}</th>
                                        <th class="text-center">{$l.CLIENT_COL_STATUS|escape:'htmlall'}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$exportLogs item=log}
                                        <tr>
                                            <td><strong>{$log->created_at|escape:'htmlall'}</strong></td>
                                            <td><strong>{$log->domain_name|escape:'htmlall'}</strong></td>
                                            <td class="text-right">{$log->old_amount|number_format:2}</td>
                                            <td class="text-right">{$log->new_amount|number_format:2}</td>
                                            {assign var="diff" value=$log->difference}
                                            <td class="text-right">
                                                {if $diff > 0}
                                                    <span class="sp-dps-diff-up">+{$diff|number_format:2}</span>
                                                {elseif $diff < 0}
                                                    <span class="sp-dps-diff-down">{$diff|number_format:2}</span>
                                                {else}
                                                    <span class="sp-dps-diff-flat">{$diff|number_format:2}</span>
                                                {/if}
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-success">{$l.CLIENT_STATUS_UPDATED|escape:'htmlall'}</span>
                                            </td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    {/if}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fas fa-info-circle"></i> {$l.INFO_TITLE|escape:'htmlall'}
                    </h3>
                </div>
                <div class="panel-body">
                    <p>{$l.INFO_INTRO|escape:'htmlall'}</p>

                    <div class="sp-dps-step">
                        <span class="sp-dps-step-badge">1</span>
                        <div>
                            <strong>{$l.INFO_STEP1_TITLE|escape:'htmlall'}</strong><br />
                            <small class="text-muted">{$l.INFO_STEP1_DESC|escape:'htmlall'}</small>
                        </div>
                    </div>

                    <div class="sp-dps-step">
                        <span class="sp-dps-step-badge">2</span>
                        <div>
                            <strong>{$l.INFO_STEP2_TITLE|escape:'htmlall'}</strong><br />
                            <small class="text-muted">{$l.INFO_STEP2_DESC|escape:'htmlall'}</small>
                        </div>
                    </div>

                    <div class="sp-dps-step">
                        <span class="sp-dps-step-badge">3</span>
                        <div>
                            <strong>{$l.INFO_STEP3_TITLE|escape:'htmlall'}</strong><br />
                            <small class="text-muted">{$l.INFO_STEP3_DESC|escape:'htmlall'}</small>
                        </div>
                    </div>

                    <hr />
                    <p class="text-muted">
                        <small><i class="fas fa-question-circle"></i> {$l.INFO_SUPPORT|escape:'htmlall'}</small>
                    </p>

                    {if $transparencyEnabled === 'yes'}
                        <div class="alert alert-info" style="margin-bottom: 0;">
                            <p style="margin-bottom: 6px;">
                                <i class="fas fa-chart-line"></i> {$l.TRANSPARENCY_ALERT_TEXT|escape:'htmlall'}
                            </p>
                            <a href="index.php?m=spDomainPriceSync&amp;action=transparency" target="_blank" rel="noopener">
                                <strong>{$l.TRANSPARENCY_ALERT_LINK|escape:'htmlall'}</strong>
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#SPCustomSearchBox').on('keyup change', function() {
        var term = jQuery(this).val().toLowerCase();
        jQuery('#SPDataTable tbody tr').each(function() {
            var rowText = jQuery(this).text().toLowerCase();
            jQuery(this).toggle(rowText.indexOf(term) !== -1);
        });
    });
});
</script>
{/if}
