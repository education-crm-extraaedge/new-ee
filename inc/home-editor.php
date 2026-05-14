<?php
/**
 * Home Page Editor — Premium Non-coder Admin UI v4 (English)
 * Settings → 🏠 Home Page Editor
 * Storage: ee_home_settings (single array option)
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

class EE_Home_Editor {
    const OPTION_KEY = 'ee_home_settings';
    const PAGE_SLUG  = 'ee-home-editor';

    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'add_menu'));
        add_action('admin_init', array(__CLASS__, 'register_settings'));
        add_action('admin_enqueue_scripts', array(__CLASS__, 'enqueue_assets'));
    }

    public static function add_menu() {
        add_options_page('Home Page Editor', '🏠 Home Page Editor', 'manage_options', self::PAGE_SLUG, array(__CLASS__, 'render_page'));
    }

    public static function register_settings() {
        register_setting('ee_home_group', self::OPTION_KEY, array(
            'sanitize_callback' => array(__CLASS__, 'sanitize'),
            'default'           => array(),
        ));
    }

    public static function sanitize($input) {
        if (!is_array($input)) return array();
        $out = array();
        foreach ($input as $k => $v) {
            $k = sanitize_key($k);
            $out[$k] = is_array($v) ? array_map('wp_kses_post', $v) : wp_kses_post($v);
        }
        return $out;
    }

    public static function enqueue_assets($hook) {
        if ($hook !== 'settings_page_' . self::PAGE_SLUG) return;
        wp_enqueue_media();
        wp_enqueue_style('ee-home-editor-css', false);
        wp_add_inline_style('ee-home-editor-css', self::admin_css());
        wp_enqueue_script('jquery');
    }

    public static function admin_css() {
        return '
        :root{--ee-blue:#19335D;--ee-blue-2:#2a4d8f;--ee-orange:#DE6E30;--ee-orange-2:#c85d20;--ee-bg:#f3f5fb;--ee-card:#ffffff;--ee-border:#e2e8f0;--ee-border-2:#cbd5e1;--ee-text:#19335D;--ee-text-2:#475569;--ee-text-3:#94a3b8;--ee-success:#10b981;--ee-success-bg:#d1fae5;--ee-shadow:0 1px 3px rgba(15,23,42,.06),0 8px 24px rgba(15,23,42,.04);--ee-shadow-lg:0 10px 40px rgba(15,23,42,.08);--ee-radius:14px}

        /* App container */
        .ee-app{margin:18px 18px 18px 0;background:var(--ee-card);border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(15,23,42,.06);border:1px solid var(--ee-border);display:grid;grid-template-columns:280px 1fr;position:relative}

        /* Animated mesh background on app */
        .ee-app::before{content:"";position:absolute;top:-50%;right:-10%;width:600px;height:600px;background:radial-gradient(circle,rgba(222,110,48,.04) 0%,transparent 70%);pointer-events:none;animation:eeMesh 14s ease-in-out infinite}
        @keyframes eeMesh{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(-40px,40px) scale(1.1)}}

        /* ═══ SIDEBAR ═══ */
        .ee-sidebar{background:linear-gradient(180deg,#0F1F3A 0%,#19335D 100%);color:#fff;padding:24px 0 0;overflow-y:auto;max-height:88vh;position:sticky;top:42px;align-self:start;position:relative;z-index:2}
        .ee-sidebar::-webkit-scrollbar{width:6px}
        .ee-sidebar::-webkit-scrollbar-track{background:transparent}
        .ee-sidebar::-webkit-scrollbar-thumb{background:rgba(255,255,255,.15);border-radius:3px}
        .ee-sidebar::-webkit-scrollbar-thumb:hover{background:rgba(255,255,255,.3)}

        .ee-brand{padding:0 20px 20px;border-bottom:1px solid rgba(255,255,255,.08);margin-bottom:14px;position:relative}
        .ee-brand-icon{width:46px;height:46px;background:linear-gradient(135deg,#DE6E30,#ff9d6c);border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:23px;margin-bottom:12px;box-shadow:0 6px 20px rgba(222,110,48,.4);animation:eeFloat 3s ease-in-out infinite}
        @keyframes eeFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
        .ee-brand h2{color:#fff;font-size:17px;font-weight:800;margin:0 0 4px;letter-spacing:-.3px}
        .ee-brand p{color:rgba(255,255,255,.5);font-size:11.5px;margin:0;line-height:1.4}

        /* Overall progress widget */
        .ee-progress-widget{margin:0 14px 14px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:12px;padding:12px}
        .ee-progress-widget-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
        .ee-progress-widget-top span{font-size:11px;font-weight:600;color:rgba(255,255,255,.6);text-transform:uppercase;letter-spacing:.8px}
        .ee-progress-widget-top b{font-size:14px;font-weight:800;color:#fff}
        .ee-progress-bar{height:6px;background:rgba(255,255,255,.08);border-radius:99px;overflow:hidden;position:relative}
        .ee-progress-fill{height:100%;background:linear-gradient(90deg,#DE6E30,#ff9d6c);border-radius:99px;transition:width .6s cubic-bezier(.23,1,.32,1);position:relative}
        .ee-progress-fill::after{content:"";position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.4),transparent);animation:eeShimmer 2s linear infinite}
        @keyframes eeShimmer{from{transform:translateX(-100%)}to{transform:translateX(100%)}}

        .ee-search{padding:0 14px 12px;position:relative}
        .ee-search input{width:100%;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);color:#fff;border-radius:10px;padding:9px 12px 9px 34px;font-size:12.5px;font-family:inherit;transition:.2s;box-sizing:border-box}
        .ee-search input::placeholder{color:rgba(255,255,255,.4)}
        .ee-search input:focus{outline:none;background:rgba(255,255,255,.1);border-color:rgba(222,110,48,.5)}
        .ee-search::before{content:"🔍";position:absolute;left:24px;top:50%;transform:translateY(-50%);font-size:12px;opacity:.5;pointer-events:none}

        .ee-nav-section-label{padding:12px 14px 6px;font-size:9.5px;font-weight:800;letter-spacing:1.5px;color:rgba(255,255,255,.35);text-transform:uppercase;display:flex;align-items:center;gap:8px}
        .ee-nav-section-label::after{content:"";flex:1;height:1px;background:rgba(255,255,255,.05)}

        .ee-nav{padding:0 10px;list-style:none;margin:0}
        .ee-nav-item{margin-bottom:2px;list-style:none}
        .ee-nav-btn{width:100%;background:transparent;border:0;color:rgba(255,255,255,.7);text-align:left;padding:10px 12px;border-radius:10px;cursor:pointer;display:flex;align-items:center;gap:10px;font-size:12.5px;font-weight:500;transition:all .25s cubic-bezier(.23,1,.32,1);font-family:inherit;position:relative}
        .ee-nav-btn:hover{background:rgba(255,255,255,.06);color:#fff;transform:translateX(2px)}
        .ee-nav-btn.active{background:linear-gradient(135deg,rgba(222,110,48,.22),rgba(222,110,48,.08));color:#fff;font-weight:600;box-shadow:inset 3px 0 0 #DE6E30,0 4px 12px rgba(222,110,48,.15)}
        .ee-nav-btn .icon{font-size:17px;flex-shrink:0;width:22px;text-align:center;transition:transform .25s}
        .ee-nav-btn.active .icon{transform:scale(1.15)}
        .ee-nav-btn .label{flex:1;line-height:1.2;display:flex;flex-direction:column;gap:1px}
        .ee-nav-btn .label small{font-size:9.5px;color:rgba(255,255,255,.4);font-weight:500}
        .ee-nav-btn.active .label small{color:rgba(255,255,255,.6)}
        .ee-nav-btn .num{background:rgba(255,255,255,.08);color:rgba(255,255,255,.6);font-size:10px;padding:2px 6px;border-radius:99px;font-weight:700;min-width:20px;text-align:center;flex-shrink:0}
        .ee-nav-btn.active .num{background:#DE6E30;color:#fff;box-shadow:0 2px 8px rgba(222,110,48,.4)}
        .ee-nav-btn .status-dot{width:7px;height:7px;border-radius:50%;background:#10b981;flex-shrink:0;opacity:0;transition:.2s;box-shadow:0 0 0 2px rgba(16,185,129,.2)}
        .ee-nav-btn.has-edits .status-dot{opacity:1}

        .ee-sidebar-footer{padding:14px 20px;border-top:1px solid rgba(255,255,255,.08);margin-top:18px;background:rgba(0,0,0,.15)}
        .ee-sidebar-footer a{color:rgba(255,255,255,.6);font-size:11.5px;text-decoration:none;display:flex;align-items:center;gap:8px;transition:.2s;padding:6px 8px;border-radius:6px}
        .ee-sidebar-footer a:hover{color:#fff;background:rgba(255,255,255,.05);transform:translateX(2px)}

        /* ═══ MAIN ═══ */
        .ee-main{background:var(--ee-bg);min-width:0;position:relative}

        /* Top bar with section indicator */
        .ee-topbar{background:#fff;border-bottom:1px solid var(--ee-border);padding:14px 28px;display:flex;align-items:center;gap:14px;position:sticky;top:32px;z-index:50;flex-wrap:wrap}
        .ee-current-section{display:flex;align-items:center;gap:12px;flex:1;min-width:0}
        .ee-current-ico{width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#DE6E30,#ff9d6c);display:flex;align-items:center;justify-content:center;font-size:19px;box-shadow:0 4px 12px rgba(222,110,48,.3);flex-shrink:0;animation:eePulseScale 2.5s ease-in-out infinite}
        @keyframes eePulseScale{0%,100%{transform:scale(1);box-shadow:0 4px 12px rgba(222,110,48,.3)}50%{transform:scale(1.05);box-shadow:0 6px 18px rgba(222,110,48,.45)}}
        .ee-current-info{min-width:0;flex:1}
        .ee-current-info .lbl{display:block;font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:1.2px;color:var(--ee-text-3);margin-bottom:2px}
        .ee-current-info .name{display:block;font-size:15.5px;font-weight:800;color:var(--ee-text);line-height:1.2}
        .ee-section-counter{background:#f1f5f9;color:var(--ee-text-2);padding:5px 12px;border-radius:99px;font-size:11px;font-weight:700;letter-spacing:.3px}

        .ee-topbar-actions{margin-left:auto;display:flex;align-items:center;gap:10px;flex-wrap:wrap}
        .ee-btn-secondary{background:#fff;border:1.5px solid var(--ee-border-2);color:var(--ee-text);padding:8px 16px;border-radius:9px;font-weight:600;font-size:12.5px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;transition:.2s;text-decoration:none}
        .ee-btn-secondary:hover{border-color:var(--ee-orange);color:var(--ee-orange);transform:translateY(-1px)}
        .ee-app .ee-btn-primary{background:linear-gradient(135deg,#DE6E30,#c85d20)!important;border:0!important;color:#fff!important;padding:9px 22px!important;border-radius:9px!important;font-weight:700!important;font-size:13px!important;cursor:pointer;display:inline-flex!important;align-items:center;gap:6px;transition:.25s;height:auto!important;line-height:1.4!important;box-shadow:0 6px 18px rgba(222,110,48,.35)!important;text-shadow:none!important;min-height:0!important;position:relative;overflow:hidden}
        .ee-app .ee-btn-primary::after{content:"";position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.25),transparent);transform:translateX(-100%);transition:.5s}
        .ee-app .ee-btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(222,110,48,.5)!important;background:linear-gradient(135deg,#c85d20,#a04915)!important;color:#fff!important}
        .ee-app .ee-btn-primary:hover::after{transform:translateX(100%)}

        /* Pane — full section editor */
        .ee-pane{display:none;padding:24px 28px}
        .ee-pane.active{display:block}
        .ee-pane.active .ee-pane-hero{animation:eeSlideDown .4s cubic-bezier(.23,1,.32,1)}
        .ee-pane.active .ee-group{animation:eeSlideUp .45s cubic-bezier(.23,1,.32,1) both}
        .ee-pane.active .ee-group:nth-child(2){animation-delay:.05s}
        .ee-pane.active .ee-group:nth-child(3){animation-delay:.1s}
        .ee-pane.active .ee-group:nth-child(4){animation-delay:.15s}
        .ee-pane.active .ee-group:nth-child(5){animation-delay:.2s}
        .ee-pane.active .ee-group:nth-child(6){animation-delay:.25s}
        @keyframes eeSlideDown{from{opacity:0;transform:translateY(-12px)}to{opacity:1;transform:translateY(0)}}
        @keyframes eeSlideUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}

        /* Pane hero — current section banner */
        .ee-pane-hero{background:linear-gradient(135deg,#19335D 0%,#2a4d8f 60%,#3858a3 100%);color:#fff;border-radius:18px;padding:26px 30px;margin-bottom:24px;position:relative;overflow:hidden;box-shadow:0 20px 48px -12px rgba(25,51,93,.35)}
        .ee-pane-hero::before{content:"";position:absolute;top:-60%;right:-15%;width:340px;height:340px;background:radial-gradient(circle,rgba(222,110,48,.4) 0%,transparent 65%);filter:blur(30px);animation:eeMesh 10s ease-in-out infinite}
        .ee-pane-hero::after{content:"";position:absolute;bottom:-70%;left:20%;width:280px;height:280px;background:radial-gradient(circle,rgba(59,130,246,.22) 0%,transparent 65%);filter:blur(40px);animation:eeMesh 14s ease-in-out infinite reverse}
        .ee-pane-hero-inner{position:relative;z-index:2;display:flex;gap:22px;align-items:center}
        .ee-pane-ico{width:74px;height:74px;background:rgba(255,255,255,.12);backdrop-filter:blur(10px);border:1.5px solid rgba(255,255,255,.22);border-radius:18px;display:flex;align-items:center;justify-content:center;font-size:36px;flex-shrink:0;box-shadow:0 8px 24px rgba(0,0,0,.15)}
        .ee-pane-hero h1{color:#fff;margin:0 0 6px;font-size:24px;font-weight:800;letter-spacing:-.4px;line-height:1.2}
        .ee-pane-hero p{color:rgba(255,255,255,.88);margin:0;font-size:13.5px;line-height:1.65;max-width:780px}
        .ee-pane-hero p b{color:#ffd9b8;font-weight:700}
        .ee-pane-hero .pane-meta{display:flex;gap:8px;margin-top:12px;flex-wrap:wrap}
        .ee-pane-hero .pane-meta span{background:rgba(255,255,255,.12);backdrop-filter:blur(10px);padding:5px 11px;border-radius:99px;font-size:11px;font-weight:600;color:#fff;display:inline-flex;align-items:center;gap:5px;border:1px solid rgba(255,255,255,.1)}
        .ee-pane-hero .pane-meta span.completion{background:rgba(16,185,129,.25);border-color:rgba(16,185,129,.4)}

        /* Group */
        .ee-group{background:var(--ee-card);border:1px solid var(--ee-border);border-radius:var(--ee-radius);margin-bottom:18px;overflow:hidden;transition:.25s;box-shadow:var(--ee-shadow);opacity:0}
        .ee-group:hover{border-color:var(--ee-border-2);transform:translateY(-1px)}
        .ee-group-head{padding:14px 20px 12px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;gap:10px;background:linear-gradient(180deg,#fafbfd,#fff)}
        .ee-group-title{font-size:12.5px;font-weight:800;color:var(--ee-text);text-transform:uppercase;letter-spacing:1.2px;margin:0;display:flex;align-items:center;gap:10px}
        .ee-group-title .dot{width:8px;height:8px;background:#DE6E30;border-radius:50%;box-shadow:0 0 0 4px rgba(222,110,48,.18);animation:eeDotPulse 2s ease-in-out infinite}
        @keyframes eeDotPulse{0%,100%{box-shadow:0 0 0 4px rgba(222,110,48,.18)}50%{box-shadow:0 0 0 7px rgba(222,110,48,.08)}}
        .ee-group-badge{background:linear-gradient(135deg,#DE6E30,#c85d20);color:#fff;font-size:10px;padding:3px 9px;border-radius:6px;letter-spacing:.3px;font-weight:700;text-transform:none}
        .ee-group-body{padding:16px 20px 20px;display:grid;grid-template-columns:1fr 1fr;gap:12px;align-items:start}
        .ee-field--full{grid-column:1 / -1}

        /* Field card */
        .ee-field{margin-bottom:0;padding:12px 14px;background:#fafbfd;border:1.5px solid #edf2f7;border-radius:11px;transition:all .25s cubic-bezier(.23,1,.32,1);position:relative;min-width:0}
        .ee-field::before{content:"";position:absolute;left:0;top:0;bottom:0;width:3px;background:transparent;border-radius:11px 0 0 11px;transition:.25s}
        .ee-field:hover{border-color:var(--ee-border-2);background:#fff;box-shadow:0 4px 16px rgba(15,23,42,.06)}
        .ee-field:hover::before{background:linear-gradient(to bottom,#DE6E30,#ff9d6c)}
        .ee-field:focus-within{border-color:var(--ee-orange);background:#fff;box-shadow:0 0 0 4px rgba(222,110,48,.08),0 8px 24px rgba(222,110,48,.1)}
        .ee-field:focus-within::before{background:linear-gradient(to bottom,#DE6E30,#ff9d6c);width:4px}
        .ee-field.has-value::before{background:linear-gradient(to bottom,#10b981,#34d399)}

        .ee-field-label{display:flex;align-items:center;gap:7px;margin-bottom:6px;flex-wrap:wrap}
        .ee-field-label .num-tag{background:linear-gradient(135deg,#19335D,#2a4d8f);color:#fff;font-size:10px;padding:3px 8px;border-radius:6px;font-weight:700;min-width:20px;text-align:center;box-shadow:0 2px 6px rgba(25,51,93,.25);flex-shrink:0}
        .ee-field-label label{font-weight:700;color:var(--ee-text);font-size:13px;margin:0;cursor:pointer;letter-spacing:-.1px}
        .ee-field-label .where{font-size:10.5px;color:var(--ee-text-3);background:#f1f5f9;padding:2px 8px;border-radius:99px;font-weight:600;letter-spacing:.2px}
        .ee-field-label .state-pill{margin-left:auto;font-size:9.5px;font-weight:700;padding:2px 8px;border-radius:99px;letter-spacing:.3px;text-transform:uppercase}
        .ee-field.has-value .state-pill{background:var(--ee-success-bg);color:#065f46}
        .ee-field.has-value .state-pill::before{content:"✓ Custom"}
        .ee-field:not(.has-value) .state-pill{background:#f1f5f9;color:#64748b}
        .ee-field:not(.has-value) .state-pill::before{content:"Default"}

        .ee-field-help{color:var(--ee-text-2);font-size:12px;line-height:1.5;margin:0 0 8px;padding-left:2px}
        .ee-field-help b,.ee-field-help strong{color:var(--ee-orange);font-weight:600}
        .ee-field-help code{background:#fef3c7;color:#92400e;padding:1px 6px;border-radius:4px;font-size:11px;border:1px solid #fde68a}
        .ee-field input[type=text],.ee-field input[type=url],.ee-field textarea{width:100%;padding:10px 12px;border:1.5px solid var(--ee-border-2);border-radius:8px;font-size:13.5px;background:#fff;font-family:inherit;color:var(--ee-text);transition:.2s;box-sizing:border-box}
        .ee-field textarea{min-height:80px;line-height:1.6;resize:vertical}
        .ee-field input:focus,.ee-field textarea:focus{outline:0;border-color:var(--ee-orange);box-shadow:0 0 0 4px rgba(222,110,48,.12)}
        .ee-field input::placeholder,.ee-field textarea::placeholder{color:#cbd5e1}

        .ee-field-footer{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-top:8px;flex-wrap:wrap}
        .ee-char-count{font-size:10.5px;color:var(--ee-text-3);font-weight:600;font-variant-numeric:tabular-nums}
        .ee-char-count.warn{color:#f59e0b}
        .ee-char-count.over{color:#ef4444}

        .ee-default{display:flex;gap:7px;align-items:center;font-size:11px;color:var(--ee-text-3);flex-wrap:wrap;flex:1;min-width:0}
        .ee-default .pre-tag{background:#fef3c7;color:#92400e;padding:2px 7px;border-radius:5px;font-weight:700;font-size:9.5px;letter-spacing:.3px;flex-shrink:0}
        .ee-default code{background:#fff;border:1px dashed var(--ee-border-2);padding:3px 8px;border-radius:6px;color:var(--ee-text-2);font-size:11px;max-width:100%;overflow-wrap:anywhere;font-family:ui-monospace,SFMono-Regular,monospace;flex:1;min-width:0}

        .ee-row{display:contents}

        /* Image picker */
        .ee-img-row{display:flex;gap:12px;align-items:flex-start;background:#fff;padding:12px;border-radius:10px;border:1.5px solid var(--ee-border-2);transition:.25s}
        .ee-img-row:hover{border-color:var(--ee-orange);box-shadow:0 4px 16px rgba(222,110,48,.08)}
        .ee-img-row .ee-thumb{width:96px;height:96px;border-radius:10px;background:#f1f5f9 center/contain no-repeat;flex-shrink:0;border:1px solid var(--ee-border);background-size:contain;background-repeat:no-repeat;background-position:center;position:relative;overflow:hidden;transition:.25s}
        .ee-img-row:hover .ee-thumb{transform:scale(1.03)}
        .ee-img-row .ee-img-controls{flex:1;display:flex;flex-direction:column;gap:8px;min-width:0}
        .ee-img-row input{padding:9px 11px;border:1px solid var(--ee-border);border-radius:7px;font-size:12px;color:var(--ee-text-2);background:#fafbfd;width:100%;font-family:inherit;box-sizing:border-box}
        .ee-img-row input:focus{outline:none;border-color:var(--ee-orange);background:#fff}
        .ee-img-row button.ee-img-pick{background:linear-gradient(135deg,#19335D,#2a4d8f);color:#fff;border:0;padding:9px 16px;border-radius:8px;cursor:pointer;font-size:12.5px;font-weight:700;width:fit-content;display:inline-flex;align-items:center;gap:8px;transition:.2s;font-family:inherit;box-shadow:0 4px 12px rgba(25,51,93,.2)}
        .ee-img-row button.ee-img-pick:hover{background:linear-gradient(135deg,#DE6E30,#c85d20);transform:translateY(-1px);box-shadow:0 6px 18px rgba(222,110,48,.3)}

        /* Floating section indicator (bottom right) */
        .ee-float-counter{position:fixed;bottom:24px;right:24px;background:linear-gradient(135deg,#19335D,#2a4d8f);color:#fff;padding:10px 18px;border-radius:99px;font-size:12px;font-weight:700;box-shadow:0 10px 30px rgba(25,51,93,.4);z-index:60;display:flex;align-items:center;gap:8px;animation:eeFloatIn .5s cubic-bezier(.23,1,.32,1)}
        @keyframes eeFloatIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        .ee-float-counter .ico{font-size:14px}

        /* Save bar */
        .ee-savebar{position:sticky;bottom:0;background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-top:1px solid var(--ee-border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;gap:14px;z-index:40;flex-wrap:wrap}
        .ee-savebar-tip{display:flex;align-items:center;gap:10px;font-size:12.5px;color:var(--ee-text-2)}
        .ee-savebar-tip .ico{width:30px;height:30px;background:linear-gradient(135deg,#10b981,#059669);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:14px;flex-shrink:0;animation:eePulseScale 3s ease-in-out infinite}
        .ee-savebar-tip strong{color:var(--ee-text);display:block;font-size:13px}
        .ee-savebar-tip small{font-size:11px;color:var(--ee-text-3)}

        /* Toast */
        .ee-toast{position:fixed;top:60px;right:30px;background:linear-gradient(135deg,#10b981,#059669);color:#fff;padding:14px 26px;border-radius:12px;font-weight:600;font-size:14px;box-shadow:0 14px 40px rgba(16,185,129,.4);z-index:9999;display:none;align-items:center;gap:10px;animation:eeToast .5s cubic-bezier(.23,1,.32,1)}
        .ee-toast.show{display:flex}
        @keyframes eeToast{from{opacity:0;transform:translateY(-20px) scale(.95)}to{opacity:1;transform:translateY(0) scale(1)}}

        /* Confetti pieces on save */
        .ee-confetti{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:9998;overflow:hidden}
        .ee-confetti span{position:absolute;width:8px;height:14px;border-radius:2px;animation:eeConfetti 2s ease-out forwards;top:-20px}
        @keyframes eeConfetti{
            0%{opacity:1;transform:translateY(0) rotate(0)}
            100%{opacity:0;transform:translateY(110vh) rotate(720deg)}
        }

        .ee-nav-btn.dim{opacity:.25;pointer-events:none}

        /* Reduce-motion fallback */
        @media(prefers-reduced-motion:reduce){
            *{animation:none!important;transition:none!important}
        }

        /* Responsive */
        @media(max-width:1400px){
            .ee-group-body{grid-template-columns:1fr}
            .ee-field--full{grid-column:auto}
        }
        @media(max-width:1100px){
            .ee-app{grid-template-columns:230px 1fr}
            .ee-pane{padding:18px 20px}
            .ee-topbar,.ee-savebar{padding:12px 20px}
            .ee-float-counter{display:none}
        }
        @media(max-width:782px){
            .ee-app{grid-template-columns:1fr;margin:12px 0}
            .ee-sidebar{position:relative;top:0;max-height:none}
            .ee-pane-hero-inner{flex-direction:column;align-items:flex-start;gap:12px}
        }
        ';
    }

    public static function tabs() {
        return array(
            'hero'      => array('🎯', 'Hero Section', 'Page top — main headline + AI chat animation'),
            'logos'     => array('🏛', 'Trusted By Logos', '15 institution logos in scrolling marquee'),
            'vidyaai'   => array('🧠', 'VidyaAI Section', '5 intelligence stories + sticky CRM dashboard'),
            'admcrm'    => array('📊', 'Admission CRM', 'Animated pipeline visualization'),
            'marketing' => array('📣', 'Marketing System', 'AI marketing flow + automation card'),
            'chatbot'   => array('💬', 'Chatbot Section', 'Live chat simulation phone'),
            'appmgmt'   => array('📋', 'Application Mgmt', '4-step animated application flow'),
            'whatsapp'  => array('📱', 'WhatsApp API', 'WhatsApp business interface mockup'),
            'mobilecrm' => array('📲', 'Mobile CRM', 'Phone with live GPS map'),
            'choose'    => array('🏗', 'Why Choose Us', '5-step storytelling section'),
            'respond'   => array('⚡', 'Respond First', 'AI hub with orbiting features'),
            'boost'     => array('🚀', 'Boost Conversion', 'Interactive AI engagement engine'),
            'convert'   => array('🎯', 'Convert More', 'Enquiry-to-enrolment dashboard'),
            'analytics' => array('📈', 'Analytics Engine', '3D rotating intelligence dashboard'),
            'stories'   => array('⭐', 'Testimonials', '3 video testimonials + 4 metric cards'),
            'ctabox'    => array('📞', 'Final CTA', 'Demo CTA with expert workflow'),
        );
    }

    public static function get($key, $default = '') {
        $opts = get_option(self::OPTION_KEY, array());
        return isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
    }

    public static function text_field($key, $num, $label, $help = '', $default = '', $where = '') {
        $val = self::get($key, '');
        $has_value = ($val !== '');
        $maxlen = max(strlen($default) + 60, 80);
        ?>
        <div class="ee-field <?php echo $has_value ? 'has-value' : ''; ?>" data-key="<?php echo esc_attr($key); ?>" data-search="<?php echo esc_attr(strtolower($label . ' ' . $help . ' ' . $default)); ?>">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label><?php echo esc_html($label); ?></label>
                <?php if ($where): ?><span class="where">📍 <?php echo esc_html($where); ?></span><?php endif; ?>
                <span class="state-pill"></span>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <input type="text" name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" placeholder="<?php echo esc_attr($default); ?>" data-charlimit="<?php echo (int) $maxlen; ?>">
            <div class="ee-field-footer">
                <?php if ($default): ?>
                    <div class="ee-default">
                        <span class="pre-tag">DEFAULT</span>
                        <code><?php echo esc_html(mb_strimwidth($default, 0, 100, '…')); ?></code>
                    </div>
                <?php else: echo '<div></div>'; endif; ?>
                <span class="ee-char-count" data-counter><?php echo strlen($val); ?></span>
            </div>
        </div>
        <?php
    }

    public static function textarea_field($key, $num, $label, $help = '', $default = '', $where = '') {
        $val = self::get($key, '');
        $has_value = ($val !== '');
        $maxlen = max(strlen($default) + 100, 200);
        ?>
        <div class="ee-field ee-field--full <?php echo $has_value ? 'has-value' : ''; ?>" data-key="<?php echo esc_attr($key); ?>" data-search="<?php echo esc_attr(strtolower($label . ' ' . $help . ' ' . $default)); ?>">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label><?php echo esc_html($label); ?></label>
                <?php if ($where): ?><span class="where">📍 <?php echo esc_html($where); ?></span><?php endif; ?>
                <span class="state-pill"></span>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <textarea name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" placeholder="<?php echo esc_attr($default); ?>" data-charlimit="<?php echo (int) $maxlen; ?>"><?php echo esc_textarea($val); ?></textarea>
            <div class="ee-field-footer">
                <?php if ($default): ?>
                    <div class="ee-default">
                        <span class="pre-tag">DEFAULT</span>
                        <code><?php echo esc_html(mb_strimwidth($default, 0, 160, '…')); ?></code>
                    </div>
                <?php else: echo '<div></div>'; endif; ?>
                <span class="ee-char-count" data-counter><?php echo strlen($val); ?></span>
            </div>
        </div>
        <?php
    }

    public static function image_field($key, $num, $label, $help = '', $default = '') {
        $val = self::get($key, '');
        $has_value = ($val !== '');
        $show = $val ?: $default;
        ?>
        <div class="ee-field ee-field--full <?php echo $has_value ? 'has-value' : ''; ?>" data-key="<?php echo esc_attr($key); ?>" data-search="<?php echo esc_attr(strtolower($label . ' image')); ?>">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label>🖼 <?php echo esc_html($label); ?></label>
                <span class="state-pill"></span>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <div class="ee-img-row">
                <div class="ee-thumb" style="background-image:url(<?php echo esc_url($show); ?>)"></div>
                <div class="ee-img-controls">
                    <input type="url" name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" placeholder="<?php echo esc_attr($default); ?>" class="ee-img-input">
                    <button type="button" class="ee-img-pick">📁 Choose from Media Library</button>
                </div>
            </div>
        </div>
        <?php
    }

    public static function pair_row($cb) { echo '<div class="ee-row">'; $cb(); echo '</div>'; }

    public static function group_start($title, $badge = '') {
        echo '<div class="ee-group"><div class="ee-group-head"><h3 class="ee-group-title"><span class="dot"></span>' . esc_html($title) . '</h3>';
        if ($badge) echo '<span class="ee-group-badge">' . esc_html($badge) . '</span>';
        echo '</div><div class="ee-group-body">';
    }

    public static function group_end() { echo '</div></div>'; }

    /**
     * Count how many fields in a section have custom values.
     * Used for the progress widgets.
     */
    public static function section_progress($slug) {
        $keys = self::section_keys($slug);
        $total = count($keys);
        if ($total === 0) return array(0, 0, 0);
        $opts = get_option(self::OPTION_KEY, array());
        $filled = 0;
        foreach ($keys as $k) {
            if (!empty($opts[$k])) $filled++;
        }
        return array($filled, $total, $total ? round(($filled / $total) * 100) : 0);
    }

    public static function section_keys($slug) {
        $keys = array(
            'hero'      => array('hero_badge','hero_h1_part1','hero_h1_part2','hero_supporting','hero_subtext','hero_cta_text','hero_cta_url','hero_counter','hero_counter_label'),
            'logos'     => array_merge(array('logos_badge','logos_heading','logos_subheading','logos_cta_text','logos_cta_url','logos_live_text'),
                            array_map(function($i){return "logo_t1_{$i}_url";}, range(1,8)),
                            array_map(function($i){return "logo_t1_{$i}_alt";}, range(1,8)),
                            array_map(function($i){return "logo_t2_{$i}_url";}, range(1,7)),
                            array_map(function($i){return "logo_t2_{$i}_alt";}, range(1,7))),
            'vidyaai'   => array('vidya_badge','vidya_h1_part1','vidya_h1_part2','vidya_subtitle','vidya_cta1_text','vidya_cta1_url','vidya_cta2_text','vidya_cta2_url','vidya_final_cta'),
            'admcrm'    => array('adm_h2','adm_subheadline','adm_cta_text','adm_cta_url','adm_closing'),
            'marketing' => array('mkt_status','mkt_h2_part1','mkt_h2_part2','mkt_subtext','mkt_card_title','mkt_description','mkt_cta_text','mkt_cta_url'),
            'chatbot'   => array('bot_h2','bot_description','bot_feat1','bot_feat2','bot_feat3','bot_cta_text','bot_cta_url'),
            'appmgmt'   => array('ams_status','ams_h1_part1','ams_h1_part2','ams_para1','ams_para2','ams_cta_text','ams_cta_url','ams_counselor_img'),
            'whatsapp'  => array('wa_h2_part1','wa_h2_part2','wa_description','wa_feat1_title','wa_feat1_desc','wa_feat2_title','wa_feat2_desc','wa_feat3_title','wa_feat3_desc','wa_cta1_text','wa_cta1_url','wa_cta2_text','wa_cta2_url'),
            'mobilecrm' => array('mcrm_badge','mcrm_h2_p1','mcrm_h2_em','mcrm_h2_p2','mcrm_description','mcrm_feat1','mcrm_feat2','mcrm_feat3','mcrm_note'),
            'choose'    => array('arch_eyebrow','arch_h2_p1','arch_h2_em','arch_h2_p2','arch_subtext','arch_proof_text'),
            'respond'   => array('rf_eyebrow','rf_h1_l1','rf_h1_l2','rf_h1_l3','rf_copy','rf_cta_text','rf_cta_url','rf_micro'),
            'boost'     => array('bc_badge','bc_h2_p1','bc_h2_p2','bc_subtext','bc_f1_title','bc_f1_desc','bc_f2_title','bc_f2_desc','bc_f3_title','bc_f3_desc','bc_f4_title','bc_f4_desc'),
            'convert'   => array('cm_eyebrow','cm_h2_p1','cm_h2_p2','cm_subtitle','cm_description','cm_cta_text','cm_cta_url'),
            'analytics' => array('ie_badge','ie_h2_p1','ie_h2_p2','ie_description','ie_cta_text','ie_cta_url'),
            'stories'   => array_merge(array('st_tagline','st_h2_p1','st_h2_p2','st_subtitle','st_m1_num','st_m1_lab','st_m2_num','st_m2_lab','st_m3_num','st_m3_lab','st_m4_num','st_m4_lab'),
                            array_map(function($i){return "st_t{$i}_video";}, range(1,3)),
                            array_map(function($i){return "st_t{$i}_quote";}, range(1,3)),
                            array_map(function($i){return "st_t{$i}_name";}, range(1,3)),
                            array_map(function($i){return "st_t{$i}_role";}, range(1,3)),
                            array_map(function($i){return "st_t{$i}_inst";}, range(1,3)),
                            array_map(function($i){return "st_t{$i}_photo";}, range(1,3))),
            'ctabox'    => array('ctab_h2','ctab_subheadline','ctab_cta_text','ctab_cta_url','ctab_trust','ctab_expert_img'),
        );
        return $keys[$slug] ?? array();
    }

    public static function overall_progress() {
        $opts = get_option(self::OPTION_KEY, array());
        $total = 0; $filled = 0;
        foreach (array_keys(self::tabs()) as $slug) {
            $keys = self::section_keys($slug);
            $total += count($keys);
            foreach ($keys as $k) if (!empty($opts[$k])) $filled++;
        }
        return array($filled, $total, $total ? round(($filled / $total) * 100) : 0);
    }

    public static function render_page() {
        if (!current_user_can('manage_options')) wp_die('Access denied');
        $tabs = self::tabs();
        $active = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? $_GET['tab'] : 'hero';
        $home_url = home_url('/');
        $saved = isset($_GET['settings-updated']) && $_GET['settings-updated'];
        list($overall_filled, $overall_total, $overall_pct) = self::overall_progress();
        $tab_keys = array_keys($tabs);
        $active_index = array_search($active, $tab_keys) + 1;
        $total_tabs = count($tab_keys);
        ?>
        <div class="wrap">
            <?php if ($saved): ?>
                <div class="ee-toast show" id="ee-toast">✓ All changes saved successfully</div>
                <div class="ee-confetti" id="ee-confetti"></div>
            <?php endif; ?>

            <form method="post" action="options.php" class="ee-app">
                <?php settings_fields('ee_home_group'); ?>

                <!-- ════ Sidebar ════ -->
                <aside class="ee-sidebar">
                    <div class="ee-brand">
                        <div class="ee-brand-icon">🏠</div>
                        <h2>Home Page Editor</h2>
                        <p>Visual content control panel</p>
                    </div>

                    <div class="ee-progress-widget" title="Overall completion across all sections">
                        <div class="ee-progress-widget-top">
                            <span>Overall Progress</span>
                            <b><?php echo $overall_pct; ?>%</b>
                        </div>
                        <div class="ee-progress-bar">
                            <div class="ee-progress-fill" style="width:<?php echo $overall_pct; ?>%"></div>
                        </div>
                        <div style="margin-top:6px;font-size:10.5px;color:rgba(255,255,255,.5);font-weight:600">
                            <?php echo $overall_filled; ?> of <?php echo $overall_total; ?> fields customized
                        </div>
                    </div>

                    <div class="ee-search">
                        <input type="text" id="ee-search-input" placeholder="Search any field...">
                    </div>

                    <div class="ee-nav-section-label">Page Sections</div>
                    <ul class="ee-nav">
                        <?php $n = 1; foreach ($tabs as $slug => $info):
                            list($filled, $total, $pct) = self::section_progress($slug);
                        ?>
                            <li class="ee-nav-item">
                                <button type="button" class="ee-nav-btn <?php echo $slug === $active ? 'active' : ''; ?> <?php echo $filled > 0 ? 'has-edits' : ''; ?>" data-pane="<?php echo esc_attr($slug); ?>" data-section-name="<?php echo esc_attr($info[1]); ?>" data-section-ico="<?php echo esc_attr($info[0]); ?>" title="<?php echo esc_attr($info[2]); ?>">
                                    <span class="status-dot"></span>
                                    <span class="icon"><?php echo esc_html($info[0]); ?></span>
                                    <span class="label">
                                        <?php echo esc_html($info[1]); ?>
                                        <small><?php echo $filled; ?>/<?php echo $total; ?> filled · <?php echo $pct; ?>%</small>
                                    </span>
                                    <span class="num"><?php echo $n; ?></span>
                                </button>
                            </li>
                        <?php $n++; endforeach; ?>
                    </ul>

                    <div class="ee-sidebar-footer">
                        <a href="<?php echo esc_url($home_url); ?>" target="_blank">🔗 View Live Home Page →</a>
                    </div>
                </aside>

                <!-- ════ Main ════ -->
                <main class="ee-main">
                    <div class="ee-topbar">
                        <div class="ee-current-section">
                            <div class="ee-current-ico" id="ee-current-ico"><?php echo esc_html($tabs[$active][0]); ?></div>
                            <div class="ee-current-info">
                                <span class="lbl">Currently Editing</span>
                                <span class="name" id="ee-current-name"><?php echo esc_html($tabs[$active][1]); ?></span>
                            </div>
                            <span class="ee-section-counter" id="ee-section-counter"><?php echo $active_index; ?> of <?php echo $total_tabs; ?></span>
                        </div>
                        <div class="ee-topbar-actions">
                            <a href="<?php echo esc_url($home_url); ?>" target="_blank" class="ee-btn-secondary">👁 Preview Live Site</a>
                            <?php submit_button('💾 Save All Changes', 'primary ee-btn-primary', 'submit', false); ?>
                        </div>
                    </div>

                    <?php
                    foreach ($tabs as $slug => $info):
                        list($filled, $total, $pct) = self::section_progress($slug);
                        echo '<div class="ee-pane ' . ($slug === $active ? 'active' : '') . '" data-pane="' . esc_attr($slug) . '">';
                        echo '<div class="ee-pane-hero"><div class="ee-pane-hero-inner">';
                        echo '<div class="ee-pane-ico">' . esc_html($info[0]) . '</div>';
                        echo '<div><h1>' . esc_html($info[1]) . '</h1><p>';
                        echo self::pane_description($slug);
                        echo '</p><div class="pane-meta">';
                        echo '<span>✏ ' . $total . ' editable fields</span>';
                        echo '<span class="completion">✓ ' . $filled . ' / ' . $total . ' customized (' . $pct . '%)</span>';
                        echo '<span>📍 ' . esc_html($info[2]) . '</span>';
                        echo '</div></div>';
                        echo '</div></div>';

                        self::render_pane_fields($slug);
                        echo '</div>';
                    endforeach;
                    ?>

                    <div class="ee-savebar">
                        <div class="ee-savebar-tip">
                            <div class="ico">💡</div>
                            <div>
                                <strong>Tip: Edit any section, save anytime</strong>
                                <small>Switch between sections freely. Click Save and all your changes across every section are stored at once.</small>
                            </div>
                        </div>
                        <?php submit_button('💾 Save All Changes', 'primary ee-btn-primary', 'submit2', false); ?>
                    </div>
                </main>
            </form>

            <div class="ee-float-counter" id="ee-float-counter">
                <span class="ico">📑</span>
                <span>Section <b><?php echo $active_index; ?></b> of <?php echo $total_tabs; ?></span>
            </div>
        </div>

        <script>
        (function($){
            // Tab switching
            $('.ee-nav-btn').on('click', function(){
                var $btn = $(this);
                var pane = $btn.data('pane');
                var name = $btn.data('section-name');
                var ico = $btn.data('section-ico');
                var idx = $btn.closest('.ee-nav-item').index() + 1;
                var total = $('.ee-nav-item').length;

                $('.ee-nav-btn').removeClass('active');
                $btn.addClass('active');
                $('.ee-pane').removeClass('active');
                $('.ee-pane[data-pane="'+pane+'"]').addClass('active');
                $('#ee-current-name').text(name);
                $('#ee-current-ico').text(ico);
                $('#ee-section-counter').text(idx + ' of ' + total);
                $('#ee-float-counter span:last-child').html('Section <b>'+idx+'</b> of '+total);
                history.replaceState(null,'','?page=<?php echo self::PAGE_SLUG; ?>&tab='+pane);
                $('html,body').animate({ scrollTop: 0 }, 220);
            });

            // Media Library picker
            $(document).on('click', '.ee-img-pick', function(e){
                e.preventDefault();
                var btn = $(this);
                var input = btn.closest('.ee-img-row').find('.ee-img-input');
                var thumb = btn.closest('.ee-img-row').find('.ee-thumb');
                var field = btn.closest('.ee-field');
                var frame = wp.media({ title:'Choose Image', multiple:false, library:{ type:'image' } });
                frame.on('select', function(){
                    var att = frame.state().get('selection').first().toJSON();
                    input.val(att.url);
                    thumb.css('background-image','url('+att.url+')');
                    field.addClass('has-value');
                });
                frame.open();
            });
            $(document).on('input', '.ee-img-input', function(){
                var url = $(this).val();
                var field = $(this).closest('.ee-field');
                $(this).closest('.ee-img-row').find('.ee-thumb').css('background-image', url ? 'url('+url+')' : 'none');
                field.toggleClass('has-value', !!url.trim());
            });

            // Live character count + custom/default state
            function updateField($input){
                var $field = $input.closest('.ee-field');
                var val = ($input.val() || '').toString();
                var $counter = $field.find('[data-counter]');
                var limit = parseInt($input.attr('data-charlimit') || 0, 10);
                if ($counter.length) {
                    $counter.text(val.length + (limit ? ' / ' + limit : ''));
                    $counter.removeClass('warn over');
                    if (limit && val.length > limit) $counter.addClass('over');
                    else if (limit && val.length > limit * 0.85) $counter.addClass('warn');
                }
                $field.toggleClass('has-value', val.trim() !== '');
            }
            $(document).on('input', '.ee-field input[type=text], .ee-field input[type=url], .ee-field textarea', function(){
                updateField($(this));
            });
            // Initialise counters on load
            $('.ee-field input[type=text], .ee-field input[type=url], .ee-field textarea').each(function(){
                updateField($(this));
            });

            // Search filter
            $('#ee-search-input').on('input', function(){
                var q = $(this).val().toLowerCase().trim();
                if (!q) {
                    $('.ee-nav-btn').removeClass('dim');
                    $('.ee-field, .ee-group').show();
                    return;
                }
                var paneMatches = {};
                $('.ee-pane').each(function(){
                    var paneSlug = $(this).data('pane');
                    var hits = $(this).find('.ee-field').filter(function(){
                        return ($(this).data('search') || '').indexOf(q) !== -1;
                    });
                    paneMatches[paneSlug] = hits.length > 0;
                });
                $('.ee-nav-btn').each(function(){
                    var ps = $(this).data('pane');
                    if (paneMatches[ps]) $(this).removeClass('dim'); else $(this).addClass('dim');
                });
                $('.ee-pane.active .ee-field').each(function(){
                    var hit = ($(this).data('search') || '').indexOf(q) !== -1;
                    $(this).toggle(hit);
                });
                $('.ee-pane.active .ee-group').each(function(){
                    var anyVisible = $(this).find('.ee-field:visible').length > 0;
                    $(this).toggle(anyVisible);
                });
            });

            // Auto-hide toast
            var toast = $('#ee-toast');
            if (toast.hasClass('show')) {
                setTimeout(function(){ toast.fadeOut(400); }, 3500);
            }

            // Confetti on save
            var confetti = $('#ee-confetti');
            if (confetti.length) {
                var colors = ['#DE6E30','#19335D','#10b981','#3b82f6','#f59e0b','#ec4899'];
                for (var i=0; i<40; i++) {
                    var s = $('<span></span>');
                    s.css({
                        left: Math.random()*100 + '%',
                        background: colors[Math.floor(Math.random()*colors.length)],
                        animationDelay: (Math.random()*0.6) + 's',
                        animationDuration: (1.5 + Math.random()*1.5) + 's'
                    });
                    confetti.append(s);
                }
                setTimeout(function(){ confetti.remove(); }, 3500);
            }

            // Ctrl/Cmd+S to save
            $(document).on('keydown', function(e){
                if ((e.metaKey || e.ctrlKey) && e.key === 's') {
                    e.preventDefault();
                    $('.ee-btn-primary').first().click();
                }
            });
        })(jQuery);
        </script>
        <?php
    }

    public static function pane_description($slug) {
        $d = array(
            'hero'      => 'The <b>largest, top-most area</b> of your home page — the first thing every visitor sees. Big H1 headline "Convert More Students. Automatically." with an animated AI chat simulation on the right. <b>This is where your customer\'s first impression is made.</b>',
            'logos'     => 'A two-track scrolling marquee of institution logos right below the hero — one row scrolls left, the other right. <b>15 logos total</b>, used as social proof of who already trusts your platform.',
            'vidyaai'   => 'A scroll-driven storytelling area with <b>5 stages</b> (AI Assist, Lead Scoring, Follow-up, Calling, Performance). A fake CRM dashboard stays sticky on the right and switches views as each stage activates.',
            'admcrm'    => 'Light-gray background section with a live <b>pipeline animation</b> (Inquiry → Verified → Automation → Counseling → Enrolled) plus three feature cards underneath.',
            'marketing' => 'A 5-step horizontal flow (Student Inquiry → AI Segmentation → … → Admission Confirmed) followed by a marketing card and a primary CTA.',
            'chatbot'   => 'Two-column layout — text and three checkmark features on the left, a live chat simulation phone on the right that plays an automated conversation.',
            'appmgmt'   => 'A 4-step vertical animated flow on the right (Submission → AI Verification → Counseling → Confirmed) with three capability cards and stats on the left.',
            'whatsapp'  => 'Left text block with three feature cards, right side has a WhatsApp-style chat simulation and a floating live analytics card.',
            'mobilecrm' => 'A phone mockup containing a live OpenStreetMap GPS map, with four floating cards animated around it. Left side has three feature pills and the description.',
            'choose'    => 'A 5-step interactive story — clickable step cards on the left and a rotating dashboard simulation on the right. Four animated stat counters at the bottom.',
            'respond'   => 'A boxed hero card — left has heading + CTA, right contains a rotating AI hub with orbiting feature chips and live toast notifications.',
            'boost'     => 'An interactive 3-stage story (Behaviour → Routing → VidyaGPT) inside a dark HUD console. Four feature cards in a grid below.',
            'convert'   => 'Left content + a 5-step animated dashboard on the right (New Prospect → AI Scoping → Prediction Score → Next Action → Success).',
            'analytics' => 'Left bullets + a 3D-rotating intelligence dashboard on the right. Hover triggers a typing AI terminal and animated counters.',
            'stories'   => '<b>4 stat metric cards + 3 video testimonials</b> (YouTube video, photo, quote, name, role, institute). Clicking a thumbnail plays the YouTube video inline.',
            'ctabox'    => 'The final demo section — left has the heading and Book Demo button, right shows a circular expert photo surrounded by 6 connected workflow nodes.',
        );
        return $d[$slug] ?? '';
    }

    public static function render_pane_fields($slug) {
        switch ($slug) {
            case 'hero':
                self::group_start('🏆 Top Trust Badge');
                self::text_field('hero_badge', '1', 'Trust Badge Text', 'Small chip that appears <b>above</b> the headline — perfect for social proof like "Trusted by X institutes".', 'Loved by Leading Top 500+ Admission Teams', 'Hero Top');
                self::group_end();
                self::group_start('📢 Main Headline (H1)');
                self::text_field('hero_h1_part1', '2', 'Headline Line 1 (DARK BLUE)', 'The first part of the large headline — rendered in dark blue.', 'Convert More Students.', 'Hero Headline');
                self::text_field('hero_h1_part2', '3', 'Headline Line 2 (ORANGE)', 'The second part — appears on a new line in orange.', 'Automatically.', 'Hero Headline');
                self::group_end();
                self::group_start('📝 Description Texts');
                self::text_field('hero_supporting', '4', 'Supporting Heading', 'A bold medium-sized line below the headline.', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams', 'Below Headline');
                self::textarea_field('hero_subtext', '5', 'Sub-text Paragraph', 'Short paragraph (2-3 lines) explaining the core benefit of your product.', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.', 'Description');
                self::group_end();
                self::group_start('🔘 Call To Action Button', 'IMPORTANT');
                self::pair_row(function(){
                    self::text_field('hero_cta_text', '6', 'Button Text', 'Label shown on the <b>orange button</b> — the primary action.', 'Book Demo', 'CTA Button');
                    self::text_field('hero_cta_url', '7', 'Button Click URL', 'Where the button takes the visitor. Example: <code>/book-demo/</code>', '#demo', 'Button Link');
                });
                self::group_end();
                self::group_start('🟢 Live Counter (Animated)');
                self::pair_row(function(){
                    self::text_field('hero_counter', '8', 'Starting Number', 'The number the counter starts at — it auto-increments on the live page.', '412', 'Live Stats');
                    self::text_field('hero_counter_label', '9', 'Counter Label', 'Text shown after the number.', 'Students Converted Today', 'Live Stats');
                });
                self::group_end();
                break;

            case 'logos':
                self::group_start('📌 Section Headings');
                self::text_field('logos_badge', '1', 'Top Badge', 'Small label above the heading.', 'Leading Institutions', 'Section Top');
                self::text_field('logos_heading', '2', 'Main Heading (H2)', 'Large heading shown above the logos.', 'Trusted by 500+ Institutions Growing Faster Than Ever', 'H2');
                self::text_field('logos_subheading', '3', 'Sub-heading', 'Supporting line below the heading.', 'AI-powered automation for the next generation of education leaders.', 'Below Heading');
                self::group_end();
                self::group_start('🔘 Bottom CTA');
                self::pair_row(function(){
                    self::text_field('logos_cta_text', '4', 'Button Text', '', 'Start Converting Today', 'CTA');
                    self::text_field('logos_cta_url', '5', 'Button URL', '', '#get-started', 'CTA');
                });
                self::text_field('logos_live_text', '6', 'Live Indicator Text', 'Text shown next to the green pulse dot.', 'Live: +124 Admissions Processed in last 1hr', 'Indicator');
                self::group_end();
                self::group_start('⬅ Track 1 — 8 Logos (Left moving)', 'Track 1');
                $t1_defaults = array(
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp|XISS',
                    'https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg|Logo',
                    'https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png|Anant National University',
                    'https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp|SR University',
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp|Hamstek',
                    'https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp|Adani',
                    'https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp|Techno India',
                    'https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp|Final Logo',
                );
                for ($i = 1; $i <= 8; $i++) {
                    $parts = explode('|', $t1_defaults[$i-1]);
                    self::image_field("logo_t1_{$i}_url", $i, "Logo $i", "Recommended: transparent PNG or SVG, around 200x100px.", $parts[0]);
                    self::text_field("logo_t1_{$i}_alt", '', 'Alt text', 'Image alt attribute (SEO + accessibility).', $parts[1], '');
                }
                self::group_end();
                self::group_start('➡ Track 2 — 7 Logos (Right moving)', 'Track 2');
                $t2_defaults = array(
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/JGI-JAIN-2.webp|Jain University',
                    'https://www.extraaedge.com/wp-content/uploads/2025/01/mit-shillong.png|MIT Shillong',
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/isdi.webp|ISDI',
                    'https://www.extraaedge.com/wp-content/uploads/2025/09/jio-v3-3.png|Jio Institute',
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/dpu-3.webp|DPU',
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/Graphic-Era-3.webp|Graphic Era',
                    'https://www.extraaedge.com/wp-content/uploads/2024/12/fostima.webp|Fostima',
                );
                for ($i = 1; $i <= 7; $i++) {
                    $parts = explode('|', $t2_defaults[$i-1]);
                    self::image_field("logo_t2_{$i}_url", $i, "Logo $i", "Recommended: transparent PNG or SVG, around 200x100px.", $parts[0]);
                    self::text_field("logo_t2_{$i}_alt", '', 'Alt text', '', $parts[1], '');
                }
                self::group_end();
                break;

            case 'vidyaai':
                self::group_start('🏷 Badge & Heading');
                self::text_field('vidya_badge', '1', 'Top Badge', '', 'VidyaAI Admission Intelligence', 'Badge');
                self::pair_row(function(){
                    self::text_field('vidya_h1_part1', '2', 'Heading Line 1', '', 'Powerful Admission CRM', 'H2');
                    self::text_field('vidya_h1_part2', '3', 'Heading Highlight', 'Second line rendered in a blue-to-orange gradient.', 'with simplicity.', 'H2');
                });
                self::textarea_field('vidya_subtitle', '4', 'Description', '', 'A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.', 'Description');
                self::group_end();
                self::group_start('🔘 Hero CTAs (two buttons)');
                self::pair_row(function(){
                    self::text_field('vidya_cta1_text', '5', 'Primary Button', '', 'Book Private Demo', 'Primary CTA');
                    self::text_field('vidya_cta1_url', '6', 'Primary URL', '', '#demo', 'Primary CTA');
                });
                self::pair_row(function(){
                    self::text_field('vidya_cta2_text', '7', 'Secondary Button', '', 'Explore Platform', 'Secondary CTA');
                    self::text_field('vidya_cta2_url', '8', 'Secondary URL', '', '#platform', 'Secondary CTA');
                });
                self::group_end();
                self::group_start('🏁 Final CTA');
                self::text_field('vidya_final_cta', '9', 'Bottom Orange Button', 'Bottom CTA label at the end of the section.', 'Get Started with VidyaAI', 'Bottom CTA');
                self::group_end();
                break;

            case 'admcrm':
                self::group_start('📝 Heading & Subtitle');
                self::text_field('adm_h2', '1', 'Main Heading', '', 'Every admission. Tracked. Moving forward.', 'H2');
                self::textarea_field('adm_subheadline', '2', 'Sub-heading paragraph', '', 'Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent lead prioritization ensures your team focuses on candidates that convert.', 'Description');
                self::group_end();
                self::group_start('🔘 Bottom CTA');
                self::pair_row(function(){
                    self::text_field('adm_cta_text', '3', 'CTA Text', '', 'Explore the Flow', 'CTA');
                    self::text_field('adm_cta_url', '4', 'CTA URL', '', '#', 'CTA');
                });
                self::text_field('adm_closing', '5', 'Closing Tagline', 'All-caps tagline below the button.', 'Full visibility. Zero chaos. More conversions.', 'Closing');
                self::group_end();
                break;

            case 'marketing':
                self::group_start('📌 Top Section');
                self::text_field('mkt_status', '1', 'Status Tag (with green pulse dot)', '', 'AI Engine: Live Processing', 'Status Tag');
                self::pair_row(function(){
                    self::text_field('mkt_h2_part1', '2', 'Heading Line 1', '', 'Automate Every Inquiry.', 'H2');
                    self::text_field('mkt_h2_part2', '3', 'Heading Line 2 (Orange)', '', 'Convert Every Student.', 'H2');
                });
                self::textarea_field('mkt_subtext', '4', 'Subtext', '', 'From the first touchpoint to final enrollment, our AI-driven automation ensures no lead is left behind. Experience precision marketing that scales with your institution.', 'Description');
                self::group_end();
                self::group_start('🃏 Marketing Card');
                self::text_field('mkt_card_title', '5', 'Card Title', '', 'Scale Your Outreach With Precision', 'Card');
                self::textarea_field('mkt_description', '6', 'Card Description', '', 'Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time.', 'Card Body');
                self::group_end();
                self::group_start('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('mkt_cta_text', '7', 'CTA Text', '', 'Activate AI Automation', 'CTA');
                    self::text_field('mkt_cta_url', '8', 'CTA URL', '', '#demo', 'CTA');
                });
                self::group_end();
                break;

            case 'chatbot':
                self::group_start('📝 Heading');
                self::text_field('bot_h2', '1', 'Heading (H2)', '', 'Chatbot & Live Chat for Admissions', 'H2');
                self::textarea_field('bot_description', '2', 'Description', '', 'Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations.', 'Body');
                self::group_end();
                self::group_start('✓ Feature List');
                self::text_field('bot_feat1', '3', 'Feature 1', '', 'Automated Chat Workflow', 'Feature');
                self::text_field('bot_feat2', '4', 'Feature 2', '', 'Live Chat Enablement', 'Feature');
                self::text_field('bot_feat3', '5', 'Feature 3', '', 'Meeting Scheduler', 'Feature');
                self::group_end();
                self::group_start('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('bot_cta_text', '6', 'Button Text', '', 'See Live Demo', 'CTA');
                    self::text_field('bot_cta_url', '7', 'Button URL', '', '#', 'CTA');
                });
                self::group_end();
                break;

            case 'appmgmt':
                self::group_start('📌 Top');
                self::text_field('ams_status', '1', 'Status Pill', '', 'SYSTEM STATUS: ACTIVE', 'Status Pill');
                self::pair_row(function(){
                    self::text_field('ams_h1_part1', '2', 'Heading Line 1', '', 'Turn Applications into Admissions.', 'H2');
                    self::text_field('ams_h1_part2', '3', 'Heading Line 2 (Orange)', '', 'On Autopilot.', 'H2');
                });
                self::textarea_field('ams_para1', '4', 'Paragraph 1', '', 'Our Application Management System streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly.', 'Body');
                self::textarea_field('ams_para2', '5', 'Paragraph 2', '', 'Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage, turning manual tasks into a hands-free, high-conversion workflow.', 'Body');
                self::group_end();
                self::group_start('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('ams_cta_text', '6', 'CTA Text', '', 'Start Automating Now', 'CTA');
                    self::text_field('ams_cta_url', '7', 'CTA URL', '', '#get-started', 'CTA');
                });
                self::group_end();
                self::group_start('🧑‍💼 Counselor Avatar');
                self::image_field('ams_counselor_img', '8', 'Step 3 Counselor Photo', 'Round avatar shown inside the GD-PI counseling step.', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80');
                self::group_end();
                break;

            case 'whatsapp':
                self::group_start('📌 Top');
                self::pair_row(function(){
                    self::text_field('wa_h2_part1', '1', 'Heading Line 1', '', 'WhatsApp', 'H2');
                    self::text_field('wa_h2_part2', '2', 'Heading Line 2 (Orange)', '', 'Business API', 'H2');
                });
                self::textarea_field('wa_description', '3', 'Description', '', 'WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM.', 'Body');
                self::group_end();
                self::group_start('🃏 Feature 1');
                self::text_field('wa_feat1_title', '4', 'Title', '', 'Two-way WhatsApp and live chat', 'Card 1');
                self::text_field('wa_feat1_desc', '5', 'Description', '', 'Enable real-time human connection alongside automation.', 'Card 1');
                self::group_end();
                self::group_start('🃏 Feature 2');
                self::text_field('wa_feat2_title', '6', 'Title', '', 'Bulk WhatsApp & automated campaigns', 'Card 2');
                self::text_field('wa_feat2_desc', '7', 'Description', '', 'Scale your outreach without losing the personal touch.', 'Card 2');
                self::group_end();
                self::group_start('🃏 Feature 3');
                self::text_field('wa_feat3_title', '8', 'Title', '', 'Verified business account', 'Card 3');
                self::text_field('wa_feat3_desc', '9', 'Description', '', 'Official green badge to build instant trust with applicants.', 'Card 3');
                self::group_end();
                self::group_start('🔘 CTAs (two buttons)');
                self::pair_row(function(){
                    self::text_field('wa_cta1_text', '10', 'Primary', '', 'Start Optimizing Now', 'CTA 1');
                    self::text_field('wa_cta1_url', '11', 'URL', '', '#', 'CTA 1');
                });
                self::pair_row(function(){
                    self::text_field('wa_cta2_text', '12', 'Secondary', '', 'View Case Studies', 'CTA 2');
                    self::text_field('wa_cta2_url', '13', 'URL', '', '#', 'CTA 2');
                });
                self::group_end();
                break;

            case 'mobilecrm':
                self::group_start('🏷 Heading');
                self::text_field('mcrm_badge', '1', 'Top Badge', '', 'Next-Gen Mobility', 'Badge');
                self::pair_row(function(){
                    self::text_field('mcrm_h2_p1', '2', 'Heading Part 1', '', 'Mobile CRM: Powering', 'H2');
                    self::text_field('mcrm_h2_em', '3', 'Heading Highlight', 'Word that gets the orange underline.', 'Productivity', 'H2');
                });
                self::text_field('mcrm_h2_p2', '4', 'Heading Part 3', '', 'on the Go', 'H2');
                self::textarea_field('mcrm_description', '5', 'Description', '', 'Our Mobile CRM empowers work-from-home and field counselors to stay productive anywhere. Monitor visits, log activities, and complete follow-ups with real-time sync to your Admission CRM for intelligent, unified reporting.', 'Body');
                self::group_end();
                self::group_start('💊 Feature Pills');
                self::text_field('mcrm_feat1', '6', 'Pill 1', '', 'Click-To-Call', 'Pill');
                self::text_field('mcrm_feat2', '7', 'Pill 2', '', 'Field Tracker', 'Pill');
                self::text_field('mcrm_feat3', '8', 'Pill 3', '', 'Missed Call Lead Capture', 'Pill');
                self::group_end();
                self::group_start('✅ Sync Note (green box)');
                self::textarea_field('mcrm_note', '9', 'Sync Note Text', '', 'Real-time sync with your Admission CRM ensures every interaction is captured for intelligent, unified reporting — zero data loss, always.', 'Green Note');
                self::group_end();
                break;

            case 'choose':
                self::group_start('🏷 Top Heading');
                self::text_field('arch_eyebrow', '1', 'Eyebrow Text', '', 'Admission Ecosystem', 'Eyebrow');
                self::pair_row(function(){
                    self::text_field('arch_h2_p1', '2', 'Heading Part 1', '', 'Why Institutes Choose ExtraaEdge as the', 'H2');
                    self::text_field('arch_h2_em', '3', 'Highlight Word', '', 'Architect', 'H2');
                });
                self::text_field('arch_h2_p2', '4', 'Heading Part 3', '', 'of Their Admission Process?', 'H2');
                self::textarea_field('arch_subtext', '5', 'Sub-text', '', 'Most Admission CRMs help you manage admissions. ExtraaEdge helps you design how admissions should work—end to end, at scale.', 'Description');
                self::group_end();
                self::group_start('👥 Social Proof Strip');
                self::text_field('arch_proof_text', '6', 'Social Proof Label', '', 'Trusted by 500+ Leading Institutes', 'Bottom Strip');
                self::group_end();
                break;

            case 'respond':
                self::group_start('📝 Heading');
                self::text_field('rf_eyebrow', '1', 'Eyebrow', '', 'Admission Response Automation', 'Eyebrow');
                self::text_field('rf_h1_l1', '2', 'Heading Line 1', '', 'Decrease Response Time.', 'H2');
                self::text_field('rf_h1_l2', '3', 'Heading Line 2 (ORANGE)', '', 'Respond First Using AI Agents.', 'H2');
                self::text_field('rf_h1_l3', '4', 'Heading Line 3', '', 'Win Admissions.', 'H2');
                self::textarea_field('rf_copy', '5', 'Body Copy', '', 'Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation—and the conversion. ExtraaEdge automatically captures inquiries from every source and initiates AI-powered calls instantly.', 'Body');
                self::group_end();
                self::group_start('🔘 CTA & Microcopy');
                self::pair_row(function(){
                    self::text_field('rf_cta_text', '6', 'Button Text', '', 'Book a Demo', 'CTA');
                    self::text_field('rf_cta_url', '7', 'Button URL', '', '#', 'CTA');
                });
                self::text_field('rf_micro', '8', 'Microcopy', '', 'See how institutes reduce response time by 90%', 'Microcopy');
                self::group_end();
                break;

            case 'boost':
                self::group_start('🏷 Top Heading');
                self::text_field('bc_badge', '1', 'Top Badge', '', 'Boost Conversion Rates', 'Badge');
                self::pair_row(function(){
                    self::text_field('bc_h2_p1', '2', 'Heading Line 1', '', 'AI Decides the Right', 'H2');
                    self::text_field('bc_h2_p2', '3', 'Heading Line 2', '', 'Admission Engagements.', 'H2');
                });
                self::textarea_field('bc_subtext', '4', 'Sub-text', '', 'ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who, when, and how to engage. Every interaction is timely, relevant, and context-aware.', 'Body');
                self::group_end();
                self::group_start('🃏 Feature Cards (4 items)');
                self::pair_row(function(){
                    self::text_field('bc_f1_title', '5', 'Card 1 Title', '', 'Trigger-Based Email & SMS', 'Card 1');
                    self::text_field('bc_f1_desc', '6', 'Card 1 Description', '', 'Automated personalized outreach triggered by student behavior thresholds.', 'Card 1');
                });
                self::pair_row(function(){
                    self::text_field('bc_f2_title', '7', 'Card 2 Title', '', 'AI Calling & Click-to-Call', 'Card 2');
                    self::text_field('bc_f2_desc', '8', 'Card 2 Description', '', 'Intelligence-led queues that connect teams to high-intent leads instantly.', 'Card 2');
                });
                self::pair_row(function(){
                    self::text_field('bc_f3_title', '9', 'Card 3 Title', '', 'VidyaGPT AI Agents', 'Card 3');
                    self::text_field('bc_f3_desc', '10', 'Card 3 Description', '', '24x7 admission counselors providing accurate, contextual answers instantly.', 'Card 3');
                });
                self::pair_row(function(){
                    self::text_field('bc_f4_title', '11', 'Card 4 Title', '', 'WhatsApp Communication', 'Card 4');
                    self::text_field('bc_f4_desc', '12', 'Card 4 Description', '', 'Engage students where they are with official WhatsApp business API integration.', 'Card 4');
                });
                self::group_end();
                break;

            case 'convert':
                self::group_start('📝 Heading & Body');
                self::text_field('cm_eyebrow', '1', 'Eyebrow Text', '', 'Convert More', 'Eyebrow');
                self::pair_row(function(){
                    self::text_field('cm_h2_p1', '2', 'Heading Line 1', '', 'Turn Enquiries Into', 'H2');
                    self::text_field('cm_h2_p2', '3', 'Heading Line 2 (ORANGE)', '', 'Enrollments', 'H2');
                });
                self::text_field('cm_subtitle', '4', 'Sub-title (bold)', '', 'Not every enquiry deserves the same attention.', 'Subtitle');
                self::textarea_field('cm_description', '5', 'Description', '', 'ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward. The result is higher efficiency and stronger enrollment conversions.', 'Body');
                self::group_end();
                self::group_start('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('cm_cta_text', '6', 'Button Text', '', 'Book a Demo', 'CTA');
                    self::text_field('cm_cta_url', '7', 'Button URL', '', '#', 'CTA');
                });
                self::group_end();
                break;

            case 'analytics':
                self::group_start('📌 Top');
                self::text_field('ie_badge', '1', 'Top Badge', '', 'Measure your efforts', 'Badge');
                self::pair_row(function(){
                    self::text_field('ie_h2_p1', '2', 'Heading Line 1', '', "Know What's Working.", 'H2');
                    self::text_field('ie_h2_p2', '3', 'Heading Line 2 (Gradient)', '', "Fix What's Not.", 'H2');
                });
                self::textarea_field('ie_description', '4', 'Description', '', 'Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance.', 'Body');
                self::group_end();
                self::group_start('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('ie_cta_text', '5', 'Button Text', '', 'Book a Demo', 'CTA');
                    self::text_field('ie_cta_url', '6', 'Button URL', '', '#', 'CTA');
                });
                self::group_end();
                break;

            case 'stories':
                self::group_start('📝 Section Heading');
                self::text_field('st_tagline', '1', 'Tagline', '', 'CRM Impact Stories', 'Tagline');
                self::pair_row(function(){
                    self::text_field('st_h2_p1', '2', 'Heading Line 1', '', 'Powering Growth for', 'H2');
                    self::text_field('st_h2_p2', '3', 'Heading Line 2', '', '500+ Happy Customers', 'H2');
                });
                self::textarea_field('st_subtitle', '4', 'Sub-title', '', 'From streamlined counselor workflows to data-driven reporting, see how education leaders are rewriting their success stories with ExtraaEdge.', 'Description');
                self::group_end();
                self::group_start('📊 4 Stat Metric Cards', 'Numbers');
                self::pair_row(function(){
                    self::text_field('st_m1_num', '5', 'Metric 1 Number', '', '500', 'Stat 1');
                    self::text_field('st_m1_lab', '6', 'Metric 1 Label', '', 'Happy Customers', 'Stat 1');
                });
                self::pair_row(function(){
                    self::text_field('st_m2_num', '7', 'Metric 2 Number', '', '3', 'Stat 2');
                    self::text_field('st_m2_lab', '8', 'Metric 2 Label', '', 'X Conversion Rate', 'Stat 2');
                });
                self::pair_row(function(){
                    self::text_field('st_m3_num', '9', 'Metric 3 Number', '', '15000', 'Stat 3');
                    self::text_field('st_m3_lab', '10', 'Metric 3 Label', '', 'Daily Power Users', 'Stat 3');
                });
                self::pair_row(function(){
                    self::text_field('st_m4_num', '11', 'Metric 4 Number', '', '99', 'Stat 4');
                    self::text_field('st_m4_lab', '12', 'Metric 4 Label', '', '% Support Rating', 'Stat 4');
                });
                self::group_end();
                $t_defaults = array(
                    1 => array('video'=>'3SHgLf1GFgk','name'=>'Silky Jain Marwah','role'=>'Executive Director','inst'=>"Tula's Institute",'photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp'),
                    2 => array('video'=>'dWLdQ8E3FOU','name'=>'Pranay Rupani','role'=>'Head of Admissions & Marketing','inst'=>'Annapurna College of Film & Media','photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp'),
                    3 => array('video'=>'yfK83D2SKps','name'=>'K. Nirmala Devi','role'=>'Assistant Manager','inst'=>'Indian Academy Group','photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp'),
                );
                foreach ($t_defaults as $i => $d) {
                    self::group_start("🎬 Testimonial #{$i}", "Card {$i}");
                    self::text_field("st_t{$i}_video", '', "YouTube Video ID", "Paste only the <b>video ID</b>, not the full URL. Example: from <code>https://youtu.be/<b>3SHgLf1GFgk</b></code> copy the part in bold.", $d['video'], "Video");
                    self::textarea_field("st_t{$i}_quote", '', "Customer Quote", "Italic quote displayed on the testimonial card.", '', "Quote");
                    self::pair_row(function() use ($i, $d) {
                        self::text_field("st_t{$i}_name", '', "Customer Name", '', $d['name'], "Name");
                        self::text_field("st_t{$i}_role", '', "Job Role", '', $d['role'], "Role");
                    });
                    self::text_field("st_t{$i}_inst", '', "Institute / Company Name", '', $d['inst'], "Company");
                    self::image_field("st_t{$i}_photo", '', "Customer Photo", "Square image around 200x200px recommended.", $d['photo']);
                    self::group_end();
                }
                break;

            case 'ctabox':
                self::group_start('📝 Heading & CTA');
                self::text_field('ctab_h2', '1', 'Main Heading (H2)', '', 'Ready to Move to an AI-Powered Admission CRM and Marketing Solution?', 'H2');
                self::textarea_field('ctab_subheadline', '2', 'Sub-heading', '', 'Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.', 'Body');
                self::pair_row(function(){
                    self::text_field('ctab_cta_text', '3', 'Button Text', '', 'Book a Demo', 'Big Button');
                    self::text_field('ctab_cta_url', '4', 'Button URL', '', 'https://www.extraaedge.com/', 'Big Button');
                });
                self::text_field('ctab_trust', '5', 'Trust Indicator Text', '', 'Trusted by 250+ Premier Institutions Globally', 'Trust Line');
                self::group_end();
                self::group_start('🧑‍🏫 Expert Centerpiece Image');
                self::image_field('ctab_expert_img', '6', 'Admission Expert Photo', 'Round centerpiece photo on the right column. 400x400px recommended.', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp');
                self::group_end();
                break;
        }
    }
}

EE_Home_Editor::init();

/**
 * Global helper functions used by front-page.php
 */
if (!function_exists('ee_h')) {
    function ee_h($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        echo esc_html(isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default);
    }
}
if (!function_exists('ee_u')) {
    function ee_u($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        echo esc_url(isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default);
    }
}
if (!function_exists('ee_a')) {
    function ee_a($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        echo esc_attr(isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default);
    }
}
if (!function_exists('ee_raw')) {
    function ee_raw($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        return isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
    }
}
