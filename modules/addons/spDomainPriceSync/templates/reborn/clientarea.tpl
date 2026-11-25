<!--begin::STREAMPANEL Header-->
{include file="$template/includes/header/header-part1.tpl"}
<!--begin::Page CSS / JS by this Template-->
<link href="{$systemsslurl}templates/reborn/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<style>
    .sp-pricesync-container {
        font-family: inherit;
    }
    
    .sp-pricesync-card {
        background: #ffffff;
        border: 1px solid #e4e6ef;
        border-radius: 12px;
        box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.03);
    }
    
    .sp-pricesync-header {
        border-bottom: 1px solid #eff2f5;
    }
    
    .sp-pricesync-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #181c32;
        margin: 0;
    }
    
    .sp-pricesync-intro {
        color: #5e6278;
        font-size: 1rem;
        line-height: 1.6;
    }
    
    .sp-pricesync-table th {
        background: #f4f6f9 !important;
        border-bottom: 1px solid #eff2f5 !important;
        color: #181c32 !important;
        font-weight: 600 !important;
        font-size: 0.9rem;
    }
    
    .sp-pricesync-table td {
        border-bottom: 1px solid #eff2f5 !important;
        color: #5e6278 !important;
        font-size: 0.95rem;
        vertical-align: middle !important;
    }

    .sp-status {
        display: inline-block;
        padding: 4px 10px;
        font-weight: 700;
        font-size: 0.8rem;
        border-radius: 4px;
        text-transform: uppercase;
    }

    .sp-status-updated {
        background-color: #d1fae5 !important;
        color: #065f46 !important;
    }
</style>
<!--end::Page CSS / JS by this Template-->
{include file="$template/includes/header/header-part2.tpl"}
{include file="$template/includes/header/header-part3.tpl"}
<!--end::STREAMPANEL Header-->

{include file="modules/addons/spDomainPriceSync/templates/partials/clientarea.tpl"}

<!--begin::STREAMPANEL Footer-->
{include file="$template/includes/footer/footer-part1.tpl"}
<!--begin::Page CSS / JS by this Template-->
<script src="{$systemsslurl}templates/reborn/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script type="text/javascript">
    (() => {
        "use strict";

        var KTDatatablesExtensionButtons = function() {
            var initTable = function() {
                if ($('#SPDataTable').length) {
                    var table = $('#SPDataTable').DataTable({
                        responsive: true,
                        pagingType: "simple_numbers",
                        iDisplayLength: 15,
                        bLengthChange: false,
                        dom: "lrtip",
                        order: [
                            [0, 'desc']
                        ],
                    });

                    $('#SPCustomSearchBox').keyup(function() {
                        table.search($(this).val()).draw();
                    });
                }
            };

            return {
                init: function() {
                    initTable();
                },
            };
        }();

        jQuery(document).ready(function() {
            KTDatatablesExtensionButtons.init();
        });
    })();
</script>
<!--end::Page CSS / JS by this Template-->
{include file="$template/includes/footer/footer-part2.tpl"}
<!--end::STREAMPANEL Footer-->
