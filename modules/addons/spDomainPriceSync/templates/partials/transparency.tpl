<div class="sp-guest-footer mt-10 mb-5 text-center" style="margin-top: 40px; margin-bottom: 20px; text-align: center;">
    {if !empty($footerLinks)}
        <div class="d-flex justify-content-center flex-wrap mb-3" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-bottom: 15px;">
            {foreach from=$footerLinks item=link}
                <a href="{$link.url|escape:'htmlall'}" target="_blank" rel="noopener" style="color: rgba(255, 255, 255, 0.5) !important; text-decoration: none; font-weight: 500; font-size: 1rem; transition: color 0.2s ease;">
                    {$link.label|escape:'htmlall'}
                </a>
            {/foreach}
        </div>
    {/if}
    {if !empty($companyName)}
        <div class="font-size-xs" style="color: rgba(255,255,255,0.3); font-size: 0.85rem;">
            &copy;{$smarty.now|date_format:"%Y"} {$companyName|escape:'htmlall'}
        </div>
    {/if}
</div>
