<?php
/**
 * Home Page Editor — Premium Non-coder Admin UI v3
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
        :root{--ee-blue:#19335D;--ee-blue-2:#2a4d8f;--ee-orange:#DE6E30;--ee-orange-2:#c85d20;--ee-bg:#f5f7fb;--ee-bg-2:#eef2f9;--ee-card:#ffffff;--ee-border:#e2e8f0;--ee-border-2:#cbd5e1;--ee-text:#19335D;--ee-text-2:#475569;--ee-text-3:#94a3b8;--ee-shadow:0 1px 3px rgba(15,23,42,.06),0 8px 24px rgba(15,23,42,.04);--ee-shadow-lg:0 10px 40px rgba(15,23,42,.08);--ee-radius:14px}

        /* Contained app card — works inside WP admin .wrap */
        .ee-app{margin:18px 18px 18px 0;background:var(--ee-card);border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(15,23,42,.06);border:1px solid var(--ee-border);display:grid;grid-template-columns:260px 1fr}

        /* ── Sidebar ── */
        .ee-sidebar{background:linear-gradient(180deg,#0F1F3A 0%,#19335D 100%);color:#fff;padding:24px 0;overflow-y:auto;max-height:90vh;position:sticky;top:42px;align-self:start}
        .ee-sidebar::-webkit-scrollbar{width:6px}
        .ee-sidebar::-webkit-scrollbar-track{background:transparent}
        .ee-sidebar::-webkit-scrollbar-thumb{background:rgba(255,255,255,.15);border-radius:3px}
        .ee-brand{padding:0 20px 20px;border-bottom:1px solid rgba(255,255,255,.08);margin-bottom:14px}
        .ee-brand-icon{width:44px;height:44px;background:linear-gradient(135deg,#DE6E30,#ff9d6c);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:12px;box-shadow:0 6px 20px rgba(222,110,48,.35)}
        .ee-brand h2{color:#fff;font-size:16px;font-weight:800;margin:0 0 4px;letter-spacing:-.3px}
        .ee-brand p{color:rgba(255,255,255,.5);font-size:11.5px;margin:0;line-height:1.4}
        .ee-search{padding:0 14px 12px;position:relative}
        .ee-search input{width:100%;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);color:#fff;border-radius:10px;padding:9px 12px 9px 34px;font-size:12.5px;font-family:inherit;transition:.2s;box-sizing:border-box}
        .ee-search input::placeholder{color:rgba(255,255,255,.4)}
        .ee-search input:focus{outline:none;background:rgba(255,255,255,.1);border-color:rgba(222,110,48,.5)}
        .ee-search::before{content:"🔍";position:absolute;left:24px;top:50%;transform:translateY(-50%);font-size:12px;opacity:.5;pointer-events:none}
        .ee-nav{padding:0 10px;list-style:none;margin:0}
        .ee-nav-item{margin-bottom:2px;list-style:none}
        .ee-nav-btn{width:100%;background:transparent;border:0;color:rgba(255,255,255,.7);text-align:left;padding:10px 12px;border-radius:10px;cursor:pointer;display:flex;align-items:center;gap:10px;font-size:12.5px;font-weight:500;transition:.2s;font-family:inherit;position:relative}
        .ee-nav-btn:hover{background:rgba(255,255,255,.06);color:#fff}
        .ee-nav-btn.active{background:linear-gradient(135deg,rgba(222,110,48,.18),rgba(222,110,48,.08));color:#fff;font-weight:600;box-shadow:inset 3px 0 0 #DE6E30}
        .ee-nav-btn .icon{font-size:17px;flex-shrink:0;width:22px;text-align:center}
        .ee-nav-btn .label{flex:1;line-height:1.2}
        .ee-nav-btn .num{background:rgba(255,255,255,.08);color:rgba(255,255,255,.6);font-size:10px;padding:2px 6px;border-radius:99px;font-weight:700;min-width:20px;text-align:center}
        .ee-nav-btn.active .num{background:#DE6E30;color:#fff}
        .ee-nav-section-label{padding:12px 14px 6px;font-size:9.5px;font-weight:800;letter-spacing:1.5px;color:rgba(255,255,255,.35);text-transform:uppercase}
        .ee-sidebar-footer{padding:14px 20px;border-top:1px solid rgba(255,255,255,.08);margin-top:18px}
        .ee-sidebar-footer a{color:rgba(255,255,255,.5);font-size:11.5px;text-decoration:none;display:flex;align-items:center;gap:6px;transition:.2s}
        .ee-sidebar-footer a:hover{color:#fff}

        /* ── Main ── */
        .ee-main{background:var(--ee-bg);min-width:0}
        .ee-topbar{background:#fff;border-bottom:1px solid var(--ee-border);padding:14px 28px;display:flex;align-items:center;gap:14px;position:sticky;top:32px;z-index:50;flex-wrap:wrap}
        .ee-crumb{font-size:13px;color:var(--ee-text-3);display:flex;align-items:center;gap:8px}
        .ee-crumb b{color:var(--ee-text);font-weight:700}
        .ee-topbar-actions{margin-left:auto;display:flex;align-items:center;gap:10px;flex-wrap:wrap}
        .ee-btn-secondary{background:#fff;border:1.5px solid var(--ee-border-2);color:var(--ee-text);padding:8px 16px;border-radius:9px;font-weight:600;font-size:12.5px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;transition:.2s;text-decoration:none}
        .ee-btn-secondary:hover{border-color:var(--ee-orange);color:var(--ee-orange)}
        .ee-app .ee-btn-primary{background:linear-gradient(135deg,#DE6E30,#c85d20)!important;border:0!important;color:#fff!important;padding:9px 22px!important;border-radius:9px!important;font-weight:700!important;font-size:13px!important;cursor:pointer;display:inline-flex!important;align-items:center;gap:6px;transition:.2s;height:auto!important;line-height:1.4!important;box-shadow:0 6px 18px rgba(222,110,48,.35)!important;text-shadow:none!important;min-height:0!important}
        .ee-app .ee-btn-primary:hover{transform:translateY(-1px);box-shadow:0 10px 24px rgba(222,110,48,.45)!important;background:linear-gradient(135deg,#c85d20,#a04915)!important;color:#fff!important}

        /* Pane header (hero) */
        .ee-pane{display:none;padding:24px 28px}
        .ee-pane.active{display:block;animation:eeFadeIn .35s ease}
        @keyframes eeFadeIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}
        .ee-pane-hero{background:linear-gradient(135deg,#19335D 0%,#2a4d8f 100%);color:#fff;border-radius:16px;padding:24px 28px;margin-bottom:22px;position:relative;overflow:hidden;box-shadow:var(--ee-shadow-lg)}
        .ee-pane-hero::before{content:"";position:absolute;top:-40%;right:-10%;width:280px;height:280px;background:radial-gradient(circle,rgba(222,110,48,.35) 0%,transparent 65%);filter:blur(20px)}
        .ee-pane-hero-inner{position:relative;z-index:2;display:flex;gap:20px;align-items:center}
        .ee-pane-ico{width:64px;height:64px;background:rgba(255,255,255,.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.18);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:30px;flex-shrink:0}
        .ee-pane-hero h1{color:#fff;margin:0 0 4px;font-size:22px;font-weight:800;letter-spacing:-.3px;line-height:1.2}
        .ee-pane-hero p{color:rgba(255,255,255,.85);margin:0;font-size:13.5px;line-height:1.6;max-width:760px}
        .ee-pane-hero p b{color:#ffd9b8;font-weight:700}
        .ee-pane-hero .pane-meta{display:flex;gap:10px;margin-top:10px;flex-wrap:wrap}
        .ee-pane-hero .pane-meta span{background:rgba(255,255,255,.1);backdrop-filter:blur(10px);padding:4px 10px;border-radius:99px;font-size:11px;font-weight:600;color:rgba(255,255,255,.95);display:inline-flex;align-items:center;gap:6px}

        /* Group */
        .ee-group{background:var(--ee-card);border:1px solid var(--ee-border);border-radius:var(--ee-radius);margin-bottom:18px;overflow:hidden;transition:.2s;box-shadow:var(--ee-shadow)}
        .ee-group:hover{border-color:var(--ee-border-2)}
        .ee-group-head{padding:14px 20px 12px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;gap:10px;background:linear-gradient(180deg,#fafbfd,#fff)}
        .ee-group-title{font-size:12.5px;font-weight:800;color:var(--ee-text);text-transform:uppercase;letter-spacing:1.2px;margin:0;display:flex;align-items:center;gap:10px}
        .ee-group-title .dot{width:8px;height:8px;background:#DE6E30;border-radius:50%;box-shadow:0 0 0 4px rgba(222,110,48,.18)}
        .ee-group-badge{background:linear-gradient(135deg,#DE6E30,#c85d20);color:#fff;font-size:10px;padding:3px 9px;border-radius:6px;letter-spacing:.3px;font-weight:700;text-transform:none}
        .ee-group-body{padding:16px 20px 20px;display:grid;grid-template-columns:1fr 1fr;gap:12px;align-items:start}
        .ee-field--full{grid-column:1 / -1}

        /* Field */
        .ee-field{margin-bottom:0;padding:12px;background:#fafbfd;border:1.5px solid #edf2f7;border-radius:10px;transition:.2s;position:relative;min-width:0}
        .ee-field:hover{border-color:var(--ee-border-2);background:#fff;box-shadow:var(--ee-shadow)}
        .ee-field:focus-within{border-color:var(--ee-orange);background:#fff;box-shadow:0 0 0 4px rgba(222,110,48,.08),var(--ee-shadow)}
        .ee-field-label{display:flex;align-items:center;gap:7px;margin-bottom:6px;flex-wrap:wrap}
        .ee-field-label .num-tag{background:linear-gradient(135deg,#19335D,#2a4d8f);color:#fff;font-size:10px;padding:3px 8px;border-radius:6px;font-weight:700;min-width:20px;text-align:center;box-shadow:0 2px 6px rgba(25,51,93,.25);flex-shrink:0}
        .ee-field-label label{font-weight:700;color:var(--ee-text);font-size:13px;margin:0;cursor:pointer;letter-spacing:-.1px}
        .ee-field-label .where{margin-left:auto;font-size:10.5px;color:var(--ee-text-3);background:#f1f5f9;padding:2px 8px;border-radius:99px;font-weight:600;letter-spacing:.2px}
        .ee-field-help{color:var(--ee-text-2);font-size:12px;line-height:1.5;margin:0 0 8px;padding-left:2px}
        .ee-field-help b,.ee-field-help strong{color:var(--ee-orange);font-weight:600}
        .ee-field-help code{background:#fef3c7;color:#92400e;padding:1px 6px;border-radius:4px;font-size:11px;border:1px solid #fde68a}
        .ee-field input[type=text],.ee-field input[type=url],.ee-field textarea{
            width:100%;padding:10px 12px;border:1.5px solid var(--ee-border-2);border-radius:8px;font-size:13.5px;background:#fff;font-family:inherit;color:var(--ee-text);transition:.2s;box-sizing:border-box
        }
        .ee-field textarea{min-height:78px;line-height:1.6;resize:vertical}
        .ee-field input:focus,.ee-field textarea:focus{outline:0;border-color:var(--ee-orange);box-shadow:0 0 0 4px rgba(222,110,48,.12)}
        .ee-field input::placeholder,.ee-field textarea::placeholder{color:#cbd5e1}
        .ee-default{display:flex;gap:7px;align-items:center;margin-top:8px;font-size:11px;color:var(--ee-text-3);flex-wrap:wrap}
        .ee-default .pre-tag{background:#fef3c7;color:#92400e;padding:2px 7px;border-radius:5px;font-weight:700;font-size:9.5px;letter-spacing:.3px}
        .ee-default code{background:#fff;border:1px dashed var(--ee-border-2);padding:3px 8px;border-radius:6px;color:var(--ee-text-2);font-size:11px;max-width:100%;overflow-wrap:anywhere;font-family:ui-monospace,SFMono-Regular,monospace}
        .ee-row{display:contents}

        /* Image picker */
        .ee-img-row{display:flex;gap:12px;align-items:flex-start;background:#fff;padding:12px;border-radius:9px;border:1.5px solid var(--ee-border-2);transition:.2s}
        .ee-img-row:hover{border-color:var(--ee-orange)}
        .ee-img-row .ee-thumb{width:90px;height:90px;border-radius:10px;background:#f1f5f9 center/contain no-repeat;flex-shrink:0;border:1px solid var(--ee-border);background-size:contain;background-repeat:no-repeat;background-position:center;position:relative;overflow:hidden}
        .ee-img-row .ee-img-controls{flex:1;display:flex;flex-direction:column;gap:8px;min-width:0}
        .ee-img-row input{padding:9px 11px;border:1px solid var(--ee-border);border-radius:7px;font-size:12px;color:var(--ee-text-2);background:#fafbfd;width:100%;font-family:inherit;box-sizing:border-box}
        .ee-img-row input:focus{outline:none;border-color:var(--ee-orange);background:#fff}
        .ee-img-row button.ee-img-pick{background:linear-gradient(135deg,#19335D,#2a4d8f);color:#fff;border:0;padding:9px 16px;border-radius:8px;cursor:pointer;font-size:12.5px;font-weight:700;width:fit-content;display:inline-flex;align-items:center;gap:8px;transition:.2s;font-family:inherit;box-shadow:0 4px 12px rgba(25,51,93,.2)}
        .ee-img-row button.ee-img-pick:hover{background:linear-gradient(135deg,#DE6E30,#c85d20);transform:translateY(-1px);box-shadow:0 6px 18px rgba(222,110,48,.3)}

        /* Floating save bar */
        .ee-savebar{position:sticky;bottom:0;background:rgba(255,255,255,.96);backdrop-filter:blur(14px);border-top:1px solid var(--ee-border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;gap:14px;z-index:40;flex-wrap:wrap}
        .ee-savebar-tip{display:flex;align-items:center;gap:10px;font-size:12.5px;color:var(--ee-text-2)}
        .ee-savebar-tip .ico{width:30px;height:30px;background:linear-gradient(135deg,#10b981,#059669);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:14px;flex-shrink:0}
        .ee-savebar-tip strong{color:var(--ee-text);display:block;font-size:13px}
        .ee-savebar-tip small{font-size:11px;color:var(--ee-text-3)}

        /* Toast */
        .ee-toast{position:fixed;top:60px;right:30px;background:linear-gradient(135deg,#10b981,#059669);color:#fff;padding:14px 24px;border-radius:12px;font-weight:600;font-size:14px;box-shadow:0 14px 40px rgba(16,185,129,.4);z-index:9999;display:none;align-items:center;gap:10px;animation:eeToast .4s cubic-bezier(.23,1,.32,1)}
        @keyframes eeToast{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}

        .ee-nav-btn.dim{opacity:.25;pointer-events:none}

        /* Responsive */
        @media(max-width:1400px){
            .ee-group-body{grid-template-columns:1fr}
            .ee-field--full{grid-column:auto}
        }
        @media(max-width:1100px){
            .ee-app{grid-template-columns:220px 1fr}
            .ee-pane{padding:18px 20px}
            .ee-topbar,.ee-savebar{padding:12px 20px}
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
            'hero'      => array('🎯', 'Hero Section', 'Page top — main headline + AI chat simulation'),
            'logos'     => array('🏛', 'Trusted By Logos', '15 institution logos in scrolling marquee'),
            'vidyaai'   => array('🧠', 'VidyaAI Section', '5 intelligence stories + sticky CRM dashboard'),
            'admcrm'    => array('📊', 'Admission CRM', 'Animated pipeline visualization'),
            'marketing' => array('📣', 'Marketing System', 'AI marketing flow + automation card'),
            'chatbot'   => array('💬', 'Chatbot', 'Live chat simulation phone'),
            'appmgmt'   => array('📋', 'Application Mgmt', '4-step animated application flow'),
            'whatsapp'  => array('📱', 'WhatsApp API', 'WhatsApp business interface mockup'),
            'mobilecrm' => array('📲', 'Mobile CRM', 'Phone with live GPS map'),
            'choose'    => array('🏗', 'Why Choose Us', 'Architect 5-step storytelling'),
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
        ?>
        <div class="ee-field" data-key="<?php echo esc_attr($key); ?>" data-search="<?php echo esc_attr(strtolower($label . ' ' . $help . ' ' . $default)); ?>">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label><?php echo esc_html($label); ?></label>
                <?php if ($where): ?><span class="where">📍 <?php echo esc_html($where); ?></span><?php endif; ?>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <input type="text" name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" placeholder="<?php echo esc_attr($default); ?>">
            <?php if ($default): ?>
                <div class="ee-default">
                    <span class="pre-tag">DEFAULT</span>
                    <code><?php echo esc_html(mb_strimwidth($default, 0, 120, '…')); ?></code>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    public static function textarea_field($key, $num, $label, $help = '', $default = '', $where = '') {
        $val = self::get($key, '');
        ?>
        <div class="ee-field ee-field--full" data-key="<?php echo esc_attr($key); ?>" data-search="<?php echo esc_attr(strtolower($label . ' ' . $help . ' ' . $default)); ?>">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label><?php echo esc_html($label); ?></label>
                <?php if ($where): ?><span class="where">📍 <?php echo esc_html($where); ?></span><?php endif; ?>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <textarea name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" placeholder="<?php echo esc_attr($default); ?>"><?php echo esc_textarea($val); ?></textarea>
            <?php if ($default): ?>
                <div class="ee-default">
                    <span class="pre-tag">DEFAULT</span>
                    <code><?php echo esc_html(mb_strimwidth($default, 0, 180, '…')); ?></code>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    public static function image_field($key, $num, $label, $help = '', $default = '') {
        $val = self::get($key, '');
        $show = $val ?: $default;
        ?>
        <div class="ee-field ee-field--full" data-key="<?php echo esc_attr($key); ?>" data-search="<?php echo esc_attr(strtolower($label . ' image')); ?>">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label>🖼 <?php echo esc_html($label); ?></label>
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

    public static function render_page() {
        if (!current_user_can('manage_options')) wp_die('Access denied');
        $tabs = self::tabs();
        $active = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? $_GET['tab'] : 'hero';
        $home_url = home_url('/');
        $saved = isset($_GET['settings-updated']) && $_GET['settings-updated'];
        ?>
        <div class="wrap">
            <?php if ($saved): ?><div class="ee-toast" id="ee-toast">✓ All changes saved successfully</div><?php endif; ?>
            <form method="post" action="options.php" class="ee-app">
                <?php settings_fields('ee_home_group'); ?>

                <!-- ══ Sidebar ══ -->
                <aside class="ee-sidebar">
                    <div class="ee-brand">
                        <div class="ee-brand-icon">🏠</div>
                        <h2>Home Page Editor</h2>
                        <p>Non-coder content control</p>
                    </div>

                    <div class="ee-search">
                        <input type="text" id="ee-search-input" placeholder="Search fields...">
                    </div>

                    <div class="ee-nav-section-label">Page Sections</div>
                    <ul class="ee-nav">
                        <?php $n = 1; foreach ($tabs as $slug => $info): ?>
                            <li class="ee-nav-item">
                                <button type="button" class="ee-nav-btn <?php echo $slug === $active ? 'active' : ''; ?>" data-pane="<?php echo esc_attr($slug); ?>" title="<?php echo esc_attr($info[2]); ?>">
                                    <span class="icon"><?php echo esc_html($info[0]); ?></span>
                                    <span class="label"><?php echo esc_html($info[1]); ?></span>
                                    <span class="num"><?php echo $n; ?></span>
                                </button>
                            </li>
                        <?php $n++; endforeach; ?>
                    </ul>

                    <div class="ee-sidebar-footer">
                        <a href="<?php echo esc_url($home_url); ?>" target="_blank">🔗 View Live Home Page →</a>
                    </div>
                </aside>

                <!-- ══ Main ══ -->
                <main class="ee-main">
                    <div class="ee-topbar">
                        <div class="ee-crumb">
                            <span>Settings</span>
                            <span>›</span>
                            <b id="ee-crumb-current"><?php echo esc_html($tabs[$active][1]); ?></b>
                        </div>
                        <div class="ee-topbar-actions">
                            <a href="<?php echo esc_url($home_url); ?>" target="_blank" class="ee-btn-secondary">👁 Preview Live Site</a>
                            <?php submit_button('💾 Save All Changes', 'primary ee-btn-primary', 'submit', false); ?>
                        </div>
                    </div>

                    <?php
                    // Render each pane
                    foreach ($tabs as $slug => $info):
                        echo '<div class="ee-pane ' . ($slug === $active ? 'active' : '') . '" data-pane="' . esc_attr($slug) . '">';
                        // Hero header
                        echo '<div class="ee-pane-hero"><div class="ee-pane-hero-inner">';
                        echo '<div class="ee-pane-ico">' . esc_html($info[0]) . '</div>';
                        echo '<div><h1>' . esc_html($info[1]) . '</h1><p>';
                        echo self::pane_description($slug);
                        echo '</p><div class="pane-meta"><span>✏ ' . self::field_count($slug) . ' editable fields</span><span>📍 ' . esc_html($info[2]) . '</span></div></div>';
                        echo '</div></div>';

                        // Pane body
                        self::render_pane_fields($slug);
                        echo '</div>';
                    endforeach;
                    ?>

                    <div class="ee-savebar">
                        <div class="ee-savebar-tip">
                            <div class="ico">💡</div>
                            <div>
                                <strong>Pro Tip:</strong>
                                <small>Sagle tabs varti changes kara, mag EKACH veles "Save" button cleek kara — sagle changes ekach veles save hotil</small>
                            </div>
                        </div>
                        <?php submit_button('💾 Save All Changes', 'primary ee-btn-primary', 'submit2', false); ?>
                    </div>
                </main>
            </form>
        </div>

        <script>
        (function($){
            // Tab switching
            $('.ee-nav-btn').on('click', function(){
                var pane = $(this).data('pane');
                var label = $(this).find('.label').text();
                $('.ee-nav-btn').removeClass('active');
                $(this).addClass('active');
                $('.ee-pane').removeClass('active');
                $('.ee-pane[data-pane="'+pane+'"]').addClass('active');
                $('#ee-crumb-current').text(label);
                history.replaceState(null,'','?page=<?php echo self::PAGE_SLUG; ?>&tab='+pane);
                $('html,body').animate({ scrollTop: 0 }, 200);
            });

            // Media Library picker
            $(document).on('click', '.ee-img-pick', function(e){
                e.preventDefault();
                var btn = $(this);
                var input = btn.closest('.ee-img-row').find('.ee-img-input');
                var thumb = btn.closest('.ee-img-row').find('.ee-thumb');
                var frame = wp.media({ title:'Choose Image', multiple:false, library:{ type:'image' } });
                frame.on('select', function(){
                    var att = frame.state().get('selection').first().toJSON();
                    input.val(att.url);
                    thumb.css('background-image','url('+att.url+')');
                });
                frame.open();
            });
            $(document).on('input', '.ee-img-input', function(){
                var url = $(this).val();
                $(this).closest('.ee-img-row').find('.ee-thumb').css('background-image', url ? 'url('+url+')' : 'none');
            });

            // Search filter
            $('#ee-search-input').on('input', function(){
                var q = $(this).val().toLowerCase().trim();
                if (!q) {
                    $('.ee-nav-btn').removeClass('dim');
                    $('.ee-field, .ee-group').show();
                    return;
                }
                // Find which panes have matches
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
                // Show/hide fields in active pane
                $('.ee-pane.active .ee-field').each(function(){
                    var hit = ($(this).data('search') || '').indexOf(q) !== -1;
                    $(this).toggle(hit);
                });
                // Hide empty groups
                $('.ee-pane.active .ee-group').each(function(){
                    var anyVisible = $(this).find('.ee-field:visible').length > 0;
                    $(this).toggle(anyVisible);
                });
            });

            // Auto-hide success toast
            var toast = $('#ee-toast');
            if (toast.length) {
                toast.css('display','flex');
                setTimeout(function(){ toast.fadeOut(400); }, 3500);
            }

            // Keyboard shortcut: Ctrl/Cmd+S to save
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
            'hero'      => 'Tumcha home page cha <b>sagle yatla mothi area</b> — top sun start hoto. Mothi h1 heading "Convert More Students. Automatically." Khalti AI chat simulation animation chalu aste. <b>Customer cha pahila impression yethun ja-to.</b>',
            'logos'     => 'Hero khalti 2 lines madhe institution logos scroll hotat — ek Left, ek Right. Total <b>15 logos</b>. Social proof sathi.',
            'vidyaai'   => 'Scroll karat-karat <b>5 stories</b> distail (AI Assist, Lead Scoring, Follow-up, Calling, Performance). Right side la fake CRM dashboard sticky raahil.',
            'admcrm'    => 'Light gray background — pipeline animation chalte (Inquiry → Verified → Automation → Counseling → Enrolled). 3 feature cards.',
            'marketing' => '5-step horizontal flow (Student Inquiry → AI Segmentation → ... → Admission Confirmed). Khalti marketing card + CTA.',
            'chatbot'   => 'Left side text + right side live chat simulation phone. 3 checkmark features.',
            'appmgmt'   => '4-step vertical animated flow (Submission → AI Verification → Counseling → Confirmed). 3 capability cards + stats.',
            'whatsapp'  => 'Left text + 3 feature cards. Right side WhatsApp chat simulation + live analytics card.',
            'mobilecrm' => 'Phone mockup with live GPS map. 4 floating cards around phone. Left text + 3 feature pills.',
            'choose'    => '5 step storytelling — left clickable cards, right rotating dashboard simulation. 4 stat counters animate hota.',
            'respond'   => 'Boxed section — left heading + CTA. Right side rotating AI hub with orbiting feature chips and live toast.',
            'boost'     => 'Interactive 3-stage story (Behaviour → Routing → VidyaGPT). 4 feature cards grid khalti.',
            'convert'   => 'Left content + 5-step animated dashboard (Prospect → AI Scoping → Score → Action → Success).',
            'analytics' => 'Left bullets + 3D rotating dashboard right. Hover trigger karte aatun typing AI terminal + counters.',
            'stories'   => '4 stat metric cards + <b>3 video testimonials</b> (YouTube ID, photo, quote, name). Click karayla video place madhech play hota.',
            'ctabox'    => 'Page chi shevti chi section — left heading + Book Demo button. Right circular expert photo + 6 connected workflow nodes.',
        );
        return $d[$slug] ?? '';
    }

    public static function field_count($slug) {
        $c = array('hero'=>9,'logos'=>36,'vidyaai'=>9,'admcrm'=>5,'marketing'=>8,'chatbot'=>7,'appmgmt'=>8,'whatsapp'=>13,'mobilecrm'=>9,'choose'=>6,'respond'=>8,'boost'=>12,'convert'=>7,'analytics'=>6,'stories'=>30,'ctabox'=>6);
        return $c[$slug] ?? 0;
    }

    public static function render_pane_fields($slug) {
        switch ($slug) {
            case 'hero':
                self::group_start('🏆 Top Trust Badge');
                self::text_field('hero_badge', '1', 'Trust Badge Text', 'Headline chya VAR ek small chip madhe disel — social proof sathi.', 'Loved by Leading Top 500+ Admission Teams', 'Hero Top');
                self::group_end();
                self::group_start('📢 Main Headline (H1)');
                self::text_field('hero_h1_part1', '2', 'Headline Line 1 (BLUE)', 'Mothi heading cha PAHILA bhag — DARK BLUE color.', 'Convert More Students.', 'Hero Headline');
                self::text_field('hero_h1_part2', '3', 'Headline Line 2 (ORANGE)', 'Mothi heading cha DUSRA bhag — ORANGE color, vegli line var jaato.', 'Automatically.', 'Hero Headline');
                self::group_end();
                self::group_start('📝 Description Texts');
                self::text_field('hero_supporting', '4', 'Supporting Heading', 'Headline khalil support line (medium size, bold).', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams', 'Below Headline');
                self::textarea_field('hero_subtext', '5', 'Sub-text Paragraph', 'Lhan paragraph — 2-3 line madhe product cha core benefit.', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.', 'Description');
                self::group_end();
                self::group_start('🔘 Call To Action Button', 'IMPORTANT');
                self::pair_row(function(){
                    self::text_field('hero_cta_text', '6', 'Button Text', '<b>Orange button</b> var disel — primary action.', 'Book Demo', 'CTA Button');
                    self::text_field('hero_cta_url', '7', 'Button Click URL', 'Button cleek kelyavar kuthe jayel? Example: <code>/book-demo/</code>', '#demo', 'Button Link');
                });
                self::group_end();
                self::group_start('🟢 Live Counter (Animated)');
                self::pair_row(function(){
                    self::text_field('hero_counter', '8', 'Starting Number', 'Animation suru honyacha number.', '412', 'Live Stats');
                    self::text_field('hero_counter_label', '9', 'Counter Label', 'Number chya nantar cha text.', 'Students Converted Today', 'Live Stats');
                });
                self::group_end();
                break;

            case 'logos':
                self::group_start('📌 Section Headings');
                self::text_field('logos_badge', '1', 'Top Badge', '', 'Leading Institutions', 'Section Top');
                self::text_field('logos_heading', '2', 'Main Heading (H2)', '', 'Trusted by 500+ Institutions Growing Faster Than Ever', 'H2');
                self::text_field('logos_subheading', '3', 'Sub-heading', '', 'AI-powered automation for the next generation of education leaders.', 'Below Heading');
                self::group_end();
                self::group_start('🔘 Bottom CTA');
                self::pair_row(function(){
                    self::text_field('logos_cta_text', '4', 'Button Text', '', 'Start Converting Today', 'CTA');
                    self::text_field('logos_cta_url', '5', 'Button URL', '', '#get-started', 'CTA');
                });
                self::text_field('logos_live_text', '6', 'Live Indicator Text', '', 'Live: +124 Admissions Processed in last 1hr', 'Indicator');
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
                    self::image_field("logo_t1_{$i}_url", $i, "Logo $i", "Recommended: PNG/SVG transparent, ~200x100px.", $parts[0]);
                    self::text_field("logo_t1_{$i}_alt", '', 'Alt text', 'Image SEO/accessibility text.', $parts[1], '');
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
                    self::image_field("logo_t2_{$i}_url", $i, "Logo $i", "Recommended: PNG/SVG transparent, ~200x100px.", $parts[0]);
                    self::text_field("logo_t2_{$i}_alt", '', 'Alt text', '', $parts[1], '');
                }
                self::group_end();
                break;

            case 'vidyaai':
                self::group_start('🏷 Badge & Heading');
                self::text_field('vidya_badge', '1', 'Top Badge', '', 'VidyaAI Admission Intelligence', 'Badge');
                self::pair_row(function(){
                    self::text_field('vidya_h1_part1', '2', 'Heading Line 1', '', 'Powerful Admission CRM', 'H2');
                    self::text_field('vidya_h1_part2', '3', 'Heading Highlight', '', 'with simplicity.', 'H2');
                });
                self::textarea_field('vidya_subtitle', '4', 'Description', '', 'A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.', 'Description');
                self::group_end();
                self::group_start('🔘 Hero CTAs (2 buttons)');
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
                self::text_field('vidya_final_cta', '9', 'Bottom Orange Button', 'Section che shevti cha button.', 'Get Started with VidyaAI', 'Bottom CTA');
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
                self::text_field('adm_closing', '5', 'Closing Tagline', 'Button khalil all-caps line.', 'Full visibility. Zero chaos. More conversions.', 'Closing');
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
                self::image_field('ams_counselor_img', '8', 'Step 3 Counselor Photo', 'Round avatar in GD-PI counseling step.', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80');
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
                self::group_start('🔘 CTAs (2 buttons)');
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
                    self::text_field('mcrm_h2_em', '3', 'Heading Highlight', '', 'Productivity', 'H2');
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
                    self::text_field('bc_f1_desc', '6', 'Card 1 Desc', '', 'Automated personalized outreach triggered by student behavior thresholds.', 'Card 1');
                });
                self::pair_row(function(){
                    self::text_field('bc_f2_title', '7', 'Card 2 Title', '', 'AI Calling & Click-to-Call', 'Card 2');
                    self::text_field('bc_f2_desc', '8', 'Card 2 Desc', '', 'Intelligence-led queues that connect teams to high-intent leads instantly.', 'Card 2');
                });
                self::pair_row(function(){
                    self::text_field('bc_f3_title', '9', 'Card 3 Title', '', 'VidyaGPT AI Agents', 'Card 3');
                    self::text_field('bc_f3_desc', '10', 'Card 3 Desc', '', '24x7 admission counselors providing accurate, contextual answers instantly.', 'Card 3');
                });
                self::pair_row(function(){
                    self::text_field('bc_f4_title', '11', 'Card 4 Title', '', 'WhatsApp Communication', 'Card 4');
                    self::text_field('bc_f4_desc', '12', 'Card 4 Desc', '', 'Engage students where they are with official WhatsApp business API integration.', 'Card 4');
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
                    self::text_field("st_t{$i}_video", '', "YouTube Video ID", "FULL URL nahi, FAKT VIDEO ID lihaa. Example: <code>https://youtu.be/<b>3SHgLf1GFgk</b></code> madhun <b>3SHgLf1GFgk</b> ha part copy kara.", $d['video'], "Video");
                    self::textarea_field("st_t{$i}_quote", '', "Customer Quote", "Italic quote — site varti distoy.", '', "Quote");
                    self::pair_row(function() use ($i, $d) {
                        self::text_field("st_t{$i}_name", '', "Customer Name", '', $d['name'], "Name");
                        self::text_field("st_t{$i}_role", '', "Job Role", '', $d['role'], "Role");
                    });
                    self::text_field("st_t{$i}_inst", '', "Institute / Company Name", '', $d['inst'], "Company");
                    self::image_field("st_t{$i}_photo", '', "Customer Photo", "Square 200x200px recommended.", $d['photo']);
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
                self::image_field('ctab_expert_img', '6', 'Admission Expert Photo', 'Right side cha center circular photo. 400x400px recommended.', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp');
                self::group_end();
                break;
        }
    }
}

EE_Home_Editor::init();

/**
 * Global helper functions for front-page.php
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
