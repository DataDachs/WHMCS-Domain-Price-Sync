<?php

declare(strict_types=1);

/*
 * Domain Price Sync Addon
 *
 * CSS Styles trait for the admin area interface.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

trait SPDSStylesTrait
{
    public function renderStyles(): void
    {
        echo '
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap");
            
            .dddp-wrapper {
                font-family: "Outfit", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                background-color: #f8fafc;
                padding: 24px;
                border-radius: 20px;
                box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.02);
                margin: 15px 0;
            }
            .dddp-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 28px;
            }
            .dddp-title {
                font-size: 26px;
                font-weight: 700;
                color: #0f172a;
                margin: 0;
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .dddp-tabs {
                display: flex;
                gap: 8px;
                border-bottom: 2px solid #e2e8f0;
                margin-bottom: 28px;
                padding-bottom: 2px;
                flex-wrap: wrap;
            }
            .dddp-tab-btn {
                background: none;
                border: none;
                padding: 12px 20px;
                font-size: 15px;
                font-weight: 600;
                color: #64748b;
                border-radius: 12px 12px 0 0;
                cursor: pointer;
                transition: all 0.2s ease;
                text-decoration: none !important;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                position: relative;
            }
            .dddp-tab-btn:hover {
                color: #3b82f6;
                background-color: rgba(59, 130, 246, 0.04);
            }
            .dddp-tab-btn.active {
                color: #3b82f6;
            }
            .dddp-tab-btn.active::after {
                content: "";
                position: absolute;
                bottom: -4px;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #3b82f6, #1d4ed8);
                border-radius: 4px;
            }
            .dddp-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 16px;
                padding: 24px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                margin-bottom: 24px;
            }
            .dddp-form-group {
                margin-bottom: 20px;
            }
            .dddp-form-label {
                display: block;
                font-weight: 600;
                color: #334155;
                margin-bottom: 6px;
                font-size: 14px;
            }
            .dddp-form-control {
                width: 100%;
                padding: 10px 14px;
                font-size: 14px;
                border: 1px solid #cbd5e1;
                border-radius: 8px;
                color: #334155;
                background-color: #ffffff;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .dddp-form-control:focus {
                border-color: #3b82f6;
                outline: 0;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            }
            .dddp-form-desc {
                display: block;
                margin-top: 4px;
                font-size: 12px;
                color: #64748b;
            }
            .dddp-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
                margin-top: 15px;
                background-color: #ffffff;
                border-radius: 16px;
                overflow: hidden;
                border: 1px solid #e2e8f0;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            }
            .dddp-table th {
                background-color: #f8fafc;
                color: #475569;
                font-weight: 600;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                padding: 16px 20px;
                border-bottom: 1px solid #e2e8f0;
                text-align: left;
            }
            .dddp-table td {
                padding: 16px 20px;
                border-bottom: 1px solid #f1f5f9;
                color: #334155;
                font-size: 14px;
                vertical-align: middle;
            }
            .dddp-table tr:last-child td {
                border-bottom: none;
            }
            .dddp-table tr:hover td {
                background-color: #f8fafc;
            }
            .dddp-table tr.dddp-row-warning td {
                background-color: #fffbeb;
            }
            .dddp-table tr.dddp-row-error td {
                background-color: #fef2f2;
            }
            .dddp-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 10px 18px;
                font-size: 14px;
                font-weight: 600;
                border-radius: 10px;
                border: 1px solid transparent;
                cursor: pointer;
                transition: all 0.2s ease;
                text-decoration: none !important;
                gap: 8px;
            }
            .dddp-btn-primary {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                color: #ffffff !important;
            }
            .dddp-btn-primary:hover {
                box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
                opacity: 0.95;
            }
            .dddp-btn-secondary {
                background-color: #f1f5f9;
                color: #475569 !important;
                border: 1px solid #e2e8f0;
            }
            .dddp-btn-secondary:hover {
                background-color: #e2e8f0;
            }
            .dddp-btn-danger {
                background-color: #ef4444;
                color: #ffffff !important;
            }
            .dddp-btn-danger:hover {
                background-color: #dc2626;
                box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
            }
            .dddp-badge {
                display: inline-flex;
                align-items: center;
                padding: 4px 10px;
                font-size: 12px;
                font-weight: 600;
                border-radius: 9999px;
                text-transform: capitalize;
            }
            .dddp-badge-success {
                background-color: #ecfdf5;
                color: #065f46;
            }
            .dddp-badge-warning {
                background-color: #fffbeb;
                color: #92400e;
            }
            .dddp-badge-danger {
                background-color: #fef2f2;
                color: #991b1b;
            }
            .dddp-badge-info {
                background-color: #eff6ff;
                color: #1e40af;
            }
            
            /* Stats grid */
            .dddp-stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 20px;
                margin-bottom: 24px;
            }
            .dddp-stat-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 16px;
                padding: 20px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.02);
                display: flex;
                flex-direction: column;
                gap: 6px;
            }
            .dddp-stat-title {
                font-size: 13px;
                font-weight: 600;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }
            .dddp-stat-value {
                font-size: 24px;
                font-weight: 700;
                color: #0f172a;
            }
            .dddp-stat-desc {
                font-size: 12px;
                color: #94a3b8;
            }
            
            /* Health check styles */
            .dddp-health-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }
            .dddp-health-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 18px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            }
            .dddp-health-info {
                display: flex;
                flex-direction: column;
                gap: 4px;
            }
            .dddp-health-title {
                font-weight: 600;
                color: #1e293b;
                font-size: 15px;
            }
            .dddp-health-desc {
                font-size: 13px;
                color: #64748b;
            }
            .dddp-health-summary {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                border: 1px solid #cbd5e1;
                border-radius: 16px;
                padding: 20px;
                margin-bottom: 24px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .dddp-health-summary-info {
                display: flex;
                flex-direction: column;
                gap: 4px;
            }
            .dddp-health-summary-title {
                font-size: 18px;
                font-weight: 700;
                color: #0f172a;
            }
            
            /* Checkbox confirmation style */
            .dddp-confirm-box {
                background-color: #fef2f2;
                border: 1px solid #fca5a5;
                border-radius: 12px;
                padding: 16px;
                margin-bottom: 20px;
                display: flex;
                align-items: flex-start;
                gap: 12px;
            }
            .dddp-confirm-checkbox {
                margin-top: 3px;
                width: 16px;
                height: 16px;
                cursor: pointer;
            }
            .dddp-confirm-label {
                font-weight: 600;
                color: #991b1b;
                font-size: 14px;
                user-select: none;
                cursor: pointer;
            }
        </style>
        ';
    }
}
