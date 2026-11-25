<!--begin::STREAMPANEL Header-->
{include file="$template/includes/header/header-part1.tpl"}
<!--begin::Page CSS / JS by this Template-->
<style type="text/css">
    /* No Subheader */
    div#kt_content { margin-top: 25px; }

    /* Hide WHMCS client area chrome for standalone guest page */
    #kt_aside { display: none !important; }
    #kt_wrapper { padding-left: 0px !important; }
    #kt_header { display: none !important; }
    #kt_header_mobile { display: none !important; }
    .aside { width: 0px !important; }
    .brand { display: none !important; }
    #kt_footer { display: none !important; }

    /* Dark background */
    body {
        background:
            radial-gradient(circle at center, rgba(27, 197, 189, 0.07) 0%, transparent 70%),
            linear-gradient(135deg, #0b0e1a 0%, #1e1e2d 50%, #0f1923 100%) !important;
        background-attachment: fixed !important;
    }

    /* Subtle dot grid mesh overlay */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
        background-image: radial-gradient(rgba(27, 197, 189, 0.15) 1px, transparent 1px);
        background-size: 30px 30px;
    }

    /* Ensure content is above mesh */
    div#kt_content, .sp-guest-container {
        position: relative;
        z-index: 1;
    }

    /* Guest page container */
    .sp-guest-container {
        max-width: 620px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Glass card styling */
    .sp-glass-card {
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .sp-glass-card .card-body {
        padding: 30px 35px;
    }

    /* Header area */
    .sp-header {
        text-align: center;
        padding: 40px 20px 25px;
    }

    .sp-header-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #1bc5bd, #0bb8b0);
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(27, 197, 189, 0.35);
    }

    .sp-header-icon i {
        font-size: 28px;
        color: #fff;
    }

    .sp-header h1 {
        color: #fff;
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: 6px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .sp-header h2 {
        color: rgba(255, 255, 255, 0.85);
        font-weight: 600;
        font-size: 1.4rem;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
    }

    .sp-header p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 1rem;
        max-width: 540px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Collapsible styles */
    details.sp-details[open] .sp-arrow {
        transform: rotate(180deg);
    }
    summary::-webkit-details-marker {
        display: none;
    }

    /* Footer styling */
    .sp-guest-footer a {
        color: rgba(255, 255, 255, 0.5) !important;
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        transition: color 0.2s ease;
    }

    .sp-guest-footer a:hover {
        color: #1bc5bd !important;
    }
</style>
<!--end::Page CSS / JS by this Template-->
{include file="$template/includes/header/header-part2.tpl"}
{include file="$template/includes/header/header-part3.tpl"}
<!--end::STREAMPANEL Header-->

<div class="sp-guest-container">
    <div class="sp-header">
        <div class="sp-header-icon">
            <i class="fas fa-chart-line" style="font-size: 28px; color: #fff;"></i>
        </div>
        {if $companyName}<h1>{$companyName|escape:'htmlall'}</h1>{/if}
        <h2>{$l.GUEST_PAGE_TITLE}</h2>
        <p>{$l.GUEST_PAGE_INTRO}</p>
    </div>

    <div class="sp-glass-card">
        <div class="card-body">
            
            {if $last_sync}
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 20px; margin-bottom: 25px; font-size: 0.95rem; color: #475569; display: flex; align-items: center; justify-content: space-between; font-family: sans-serif;">
                    <span><strong>{$l.GUEST_LAST_SYNC}:</strong></span>
                    <span style="font-weight: 700; color: #1e293b;">{$last_sync}</span>
                </div>
            {/if}

            {if $increase_count == 0 && $decrease_count == 0}
                <div style="text-align: center; padding: 40px 20px; color: #64748b;">
                    <i class="fas fa-info-circle" style="font-size: 32px; color: #cbd5e1; margin-bottom: 12px; display: block;"></i>
                    <p style="margin: 0; font-size: 1rem;">{$l.GUEST_NO_DATA}</p>
                </div>
            {else}
                <div class="sp-donut-container" style="display: flex; align-items: center; justify-content: center; gap: 35px; margin: 30px 0; flex-wrap: wrap; font-family: sans-serif;">
                    <svg width="150" height="150" viewBox="0 0 42 42" class="donut" style="transform: rotate(-90deg); flex-shrink: 0;">
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#10b981" stroke-width="6"></circle>
                        <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ef4444" stroke-width="6" stroke-dasharray="{$increase_percent} {$decrease_percent}" stroke-dashoffset="0"></circle>
                    </svg>
                    <div class="sp-donut-legend" style="text-align: left; min-width: 200px;">
                        <div style="font-weight: 700; font-size: 1.1rem; margin-bottom: 12px; color: #1e293b;">{$l.GUEST_RATIO_TITLE}</div>
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px; font-size: 0.95rem; color: #475569;">
                            <span style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444; display: inline-block;"></span>
                            <strong>{$l.GUEST_INCREASES}:</strong> {$increase_percent}%
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.95rem; color: #475569;">
                            <span style="width: 12px; height: 12px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                            <strong>{$l.GUEST_DECREASES}:</strong> {$decrease_percent}%
                        </div>
                    </div>
                </div>
            {/if}

            {if !empty($tld_stats)}
                <div class="sp-tld-stats" style="margin-top: 25px; border-top: 1px solid #e2e8f0; padding-top: 25px; font-family: sans-serif;">
                    <details class="sp-details" style="background: rgba(248, 250, 252, 0.8); border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; transition: all 0.3s ease;">
                        <summary style="padding: 14px 20px; font-weight: 700; color: #1e293b; cursor: pointer; display: flex; align-items: center; justify-content: space-between; font-size: 1rem; list-style: none; user-select: none;">
                            <span><i class="fas fa-globe" style="color: #3b82f6; margin-right: 8px;"></i> {$l.GUEST_STATS_TLD_TITLE}</span>
                            <i class="fas fa-chevron-down sp-arrow" style="transition: transform 0.2s ease; font-size: 0.85rem; color: #64748b;"></i>
                        </summary>
                        <div style="padding: 0 20px 20px; border-top: 1px solid #f1f5f9; background: #fff; overflow-x: auto;">
                            <table class="table table-clean" style="width: 100%; margin: 0; font-size: 0.95rem; border-collapse: collapse;">
                                <thead>
                                    <tr style="border-bottom: 2px solid #e2e8f0; color: #475569; font-weight: 600; text-align: left;">
                                        <th style="padding: 12px 8px;">TLD</th>
                                        <th style="padding: 12px 8px; text-align: center; color: #ef4444;"><i class="fas fa-arrow-up"></i> {$l.GUEST_INCREASES}</th>
                                        <th style="padding: 12px 8px; text-align: center; color: #10b981;"><i class="fas fa-arrow-down"></i> {$l.GUEST_DECREASES}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$tld_stats key=tld item=stat}
                                        <tr style="border-bottom: 1px solid #f1f5f9;">
                                            <td style="padding: 10px 8px; font-weight: 600; color: #1e293b;">.{$tld|ltrim:'.'}</td>
                                            <td style="padding: 10px 8px; text-align: center; color: #dc2626; font-weight: 700;">{$stat.increases_percent}%</td>
                                            <td style="padding: 10px 8px; text-align: center; color: #059669; font-weight: 700;">{$stat.decreases_percent}%</td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </details>
                </div>
            {/if}

        </div>
    </div>

    {include file="modules/addons/spDomainPriceSync/templates/partials/transparency.tpl"}
</div>

<!--begin::STREAMPANEL Footer-->
{include file="$template/includes/footer/footer-part1.tpl"}
<!--begin::Page CSS / JS by this Template-->
<!--end::Page CSS / JS by this Template-->
{include file="$template/includes/footer/footer-part2.tpl"}
<!--end::STREAMPANEL Footer-->
