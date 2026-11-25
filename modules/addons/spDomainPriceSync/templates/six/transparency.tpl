<style type="text/css">
    .sp-dps-six-transparency .sp-dps-donut-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 32px;
        margin: 24px 0;
        flex-wrap: wrap;
    }
    .sp-dps-six-transparency .sp-dps-legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
    }
    .sp-dps-six-transparency .sp-dps-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
    }
    .sp-dps-six-transparency details summary {
        cursor: pointer;
        font-weight: 600;
        padding: 10px 14px;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        user-select: none;
    }
</style>

<div class="sp-dps-six-transparency">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fas fa-chart-line"></i> {$l.GUEST_PAGE_TITLE|escape:'htmlall'}
            </h3>
        </div>
        <div class="panel-body">
            <p class="lead" style="font-size: 16px;">{$l.GUEST_PAGE_SUBTITLE|escape:'htmlall'}</p>
            <p>{$l.GUEST_PAGE_INTRO|escape:'htmlall'}</p>

            {if $last_sync}
                <div class="well well-sm">
                    <strong>{$l.GUEST_LAST_SYNC|escape:'htmlall'}:</strong>
                    <span class="pull-right"><strong>{$last_sync|escape:'htmlall'}</strong></span>
                    <div class="clearfix"></div>
                </div>
            {/if}

            {if $increase_count == 0 && $decrease_count == 0}
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> {$l.GUEST_NO_DATA|escape:'htmlall'}
                </div>
            {else}
                <div class="sp-dps-donut-wrap">
                    <svg width="150" height="150" viewBox="0 0 42 42" style="transform: rotate(-90deg); flex-shrink: 0;">
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#10b981" stroke-width="6"></circle>
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ef4444" stroke-width="6" stroke-dasharray="{$increase_percent} {$decrease_percent}" stroke-dashoffset="0"></circle>
                    </svg>
                    <div>
                        <h4 style="margin-top: 0;">{$l.GUEST_RATIO_TITLE|escape:'htmlall'}</h4>
                        <div class="sp-dps-legend-item">
                            <span class="sp-dps-dot" style="background: #ef4444;"></span>
                            <strong>{$l.GUEST_INCREASES|escape:'htmlall'}:</strong> {$increase_percent}%
                        </div>
                        <div class="sp-dps-legend-item">
                            <span class="sp-dps-dot" style="background: #10b981;"></span>
                            <strong>{$l.GUEST_DECREASES|escape:'htmlall'}:</strong> {$decrease_percent}%
                        </div>
                    </div>
                </div>
            {/if}

            {if !empty($tld_stats)}
                <details style="margin-top: 20px;">
                    <summary>
                        <i class="fas fa-globe"></i> {$l.GUEST_STATS_TLD_TITLE|escape:'htmlall'}
                    </summary>
                    <div class="table-responsive" style="margin-top: 12px;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>TLD</th>
                                    <th class="text-center" style="color: #dc2626;"><i class="fas fa-arrow-up"></i> {$l.GUEST_INCREASES|escape:'htmlall'}</th>
                                    <th class="text-center" style="color: #059669;"><i class="fas fa-arrow-down"></i> {$l.GUEST_DECREASES|escape:'htmlall'}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$tld_stats key=tld item=stat}
                                    <tr>
                                        <td><strong>.{$tld|ltrim:'.'|escape:'htmlall'}</strong></td>
                                        <td class="text-center" style="color: #dc2626; font-weight: 700;">{$stat.increases_percent}%</td>
                                        <td class="text-center" style="color: #059669; font-weight: 700;">{$stat.decreases_percent}%</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </details>
            {/if}

            {if !empty($footerLinks)}
                <hr />
                <div class="text-center">
                    {foreach from=$footerLinks item=link name=fl}
                        <a href="{$link.url|escape:'htmlall'}" target="_blank" rel="noopener" style="margin: 0 10px;">
                            {$link.label|escape:'htmlall'}
                        </a>
                    {/foreach}
                </div>
            {/if}
        </div>
    </div>
</div>
