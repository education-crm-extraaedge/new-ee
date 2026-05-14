<?php
/**
 * Home Page Editor — Visual Non-coder Admin
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
        body{background:#f0f2f5}
        .ee-app{max-width:1280px;margin:24px auto;background:#fff;border-radius:16px;box-shadow:0 10px 40px rgba(0,0,0,.08);overflow:hidden;border:1px solid #e2e8f0}
        .ee-header{background:linear-gradient(135deg,#19335D 0%,#2a4d8f 100%);color:#fff;padding:32px 40px;position:relative;overflow:hidden}
        .ee-header:before{content:"";position:absolute;top:-50%;right:-10%;width:300px;height:300px;background:rgba(222,110,48,.18);border-radius:50%;filter:blur(60px)}
        .ee-header h1{color:#fff;margin:0 0 8px;font-size:30px;font-weight:800;position:relative;z-index:1}
        .ee-header p{color:rgba(255,255,255,.9);margin:0;font-size:15px;position:relative;z-index:1;max-width:700px}
        .ee-info-bar{background:#FEF7F2;border-left:5px solid #DE6E30;padding:16px 24px;margin:20px 40px 0;border-radius:0 12px 12px 0;display:flex;gap:14px;align-items:flex-start}
        .ee-info-bar .ico{font-size:24px;line-height:1}
        .ee-info-bar p{margin:0;color:#19335D;font-size:14px;line-height:1.6}
        .ee-info-bar p strong{display:block;font-size:15px;margin-bottom:4px}
        .ee-tabs-wrap{padding:0 40px;background:#f8fafc;border-bottom:1px solid #e2e8f0;margin-top:20px;overflow-x:auto}
        .ee-tabs{display:flex;gap:4px;min-width:max-content}
        .ee-tab-btn{background:transparent;border:0;padding:16px 18px;font-size:13px;font-weight:700;color:#64748b;cursor:pointer;border-bottom:3px solid transparent;transition:.2s;display:inline-flex;align-items:center;gap:6px;white-space:nowrap}
        .ee-tab-btn:hover{color:#DE6E30;background:rgba(222,110,48,.05)}
        .ee-tab-btn.active{color:#DE6E30;border-bottom-color:#DE6E30;background:#fff}
        .ee-tab-btn .num{background:#e2e8f0;color:#64748b;font-size:10px;padding:2px 7px;border-radius:99px;font-weight:800}
        .ee-tab-btn.active .num{background:#DE6E30;color:#fff}
        .ee-body{padding:32px 40px 24px}
        .ee-pane{display:none}
        .ee-pane.active{display:block}
        .ee-pane-header{margin-bottom:28px;padding-bottom:20px;border-bottom:2px dashed #e2e8f0}
        .ee-pane-header h2{font-size:24px;color:#19335D;margin:0 0 8px;font-weight:800;display:flex;align-items:center;gap:10px}
        .ee-pane-header h2 .pane-ico{font-size:30px}
        .ee-pane-header .pane-desc{color:#64748b;margin:0;font-size:14px;line-height:1.6;background:#f8fafc;padding:12px 16px;border-radius:8px;border:1px solid #e2e8f0}
        .ee-pane-header .pane-desc strong{color:#19335D}
        .ee-group{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px 24px;margin-bottom:20px;position:relative}
        .ee-group-title{font-size:13px;font-weight:800;color:#19335D;text-transform:uppercase;letter-spacing:1.5px;margin:0 0 16px;padding-bottom:10px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:8px}
        .ee-group-title .badge{background:#DE6E30;color:#fff;font-size:10px;padding:3px 8px;border-radius:6px;letter-spacing:0;text-transform:none;font-weight:700}
        .ee-field{margin-bottom:18px;padding:14px;background:#fafbfc;border:1px solid #edf2f7;border-radius:10px;transition:.2s}
        .ee-field:hover{border-color:#cbd5e1;background:#fff}
        .ee-field:last-child{margin-bottom:0}
        .ee-field-label{display:flex;align-items:center;gap:8px;margin-bottom:6px}
        .ee-field-label .num-tag{background:#19335D;color:#fff;font-size:10px;padding:2px 7px;border-radius:5px;font-weight:800}
        .ee-field-label label{font-weight:700;color:#19335D;font-size:14px;margin:0}
        .ee-field-label .where{margin-left:auto;font-size:11px;color:#94a3b8;background:#f1f5f9;padding:3px 9px;border-radius:99px;font-weight:600}
        .ee-field-help{color:#64748b;font-size:12.5px;line-height:1.5;margin:0 0 10px;padding-left:2px;font-style:italic}
        .ee-field-help b{color:#DE6E30;font-style:normal}
        .ee-field input[type=text],.ee-field input[type=url],.ee-field textarea{
            width:100%;padding:11px 14px;border:1.5px solid #cbd5e1;border-radius:8px;font-size:14px;background:#fff;font-family:inherit;color:#19335D
        }
        .ee-field textarea{min-height:90px;line-height:1.6;resize:vertical}
        .ee-field input:focus,.ee-field textarea:focus{outline:0;border-color:#DE6E30;box-shadow:0 0 0 3px rgba(222,110,48,.12)}
        .ee-default{display:flex;gap:6px;align-items:center;margin-top:8px;font-size:11.5px;color:#94a3b8}
        .ee-default code{background:#fff;border:1px dashed #cbd5e1;padding:3px 8px;border-radius:5px;color:#475569;font-size:11.5px;max-width:100%;overflow-wrap:anywhere}
        .ee-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
        .ee-row .ee-field{margin-bottom:0}
        .ee-img-row{display:flex;gap:14px;align-items:flex-start;background:#fff;padding:12px;border-radius:8px;border:1.5px solid #cbd5e1}
        .ee-img-row .ee-thumb{width:100px;height:100px;border-radius:8px;background:#f1f5f9center/contain no-repeat;flex-shrink:0;border:1px solid #e2e8f0;background-size:contain;background-repeat:no-repeat;background-position:center}
        .ee-img-row .ee-img-controls{flex:1;display:flex;flex-direction:column;gap:8px}
        .ee-img-row input{padding:9px 12px;border:1px solid #e2e8f0;border-radius:6px;font-size:12.5px;color:#475569;background:#f8fafc;width:100%}
        .ee-img-row button.ee-img-pick{background:linear-gradient(135deg,#19335D,#2a4d8f);color:#fff;border:0;padding:9px 18px;border-radius:7px;cursor:pointer;font-size:13px;font-weight:700;width:fit-content;display:inline-flex;align-items:center;gap:6px}
        .ee-img-row button.ee-img-pick:hover{background:linear-gradient(135deg,#DE6E30,#c85d20)}
        .ee-save-bar{padding:24px 40px;background:linear-gradient(to top,#f8fafc,#fff);border-top:1px solid #e2e8f0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px}
        .ee-save-info{font-size:13px;color:#475569}
        .ee-save-info strong{color:#19335D}
        .ee-save-bar .button-primary{background:#DE6E30!important;border-color:#DE6E30!important;font-size:15px;padding:10px 32px;height:auto;font-weight:700;box-shadow:0 6px 16px rgba(222,110,48,.3)!important;text-shadow:none!important}
        .ee-save-bar .button-primary:hover{background:#c85d20!important;border-color:#c85d20!important;transform:translateY(-1px)}
        .ee-quick-nav{position:sticky;top:32px;z-index:10}
        @media(max-width:782px){.ee-row{grid-template-columns:1fr}.ee-body,.ee-header,.ee-info-bar,.ee-tabs-wrap,.ee-save-bar{padding-left:20px;padding-right:20px}.ee-info-bar{margin:16px 20px 0}}
        ';
    }

    public static function tabs() {
        return array(
            'hero'      => array('🎯', 'Hero Section', 'Page cha topmost area'),
            'logos'     => array('🏛', 'Trusted By Logos', '15 institution logos'),
            'vidyaai'   => array('🧠', 'VidyaAI Section', 'Intelligence storytelling'),
            'admcrm'    => array('📊', 'Admission CRM', 'Pipeline visualization'),
            'marketing' => array('📣', 'Marketing System', 'AI marketing flow'),
            'chatbot'   => array('💬', 'Chatbot', 'Live chat section'),
            'appmgmt'   => array('📋', 'Application Mgmt', 'Application system'),
            'whatsapp'  => array('📱', 'WhatsApp API', 'WhatsApp section'),
            'mobilecrm' => array('📲', 'Mobile CRM', 'Mobile app section'),
            'choose'    => array('🏗', 'Why Choose Us', 'Architect section'),
            'respond'   => array('⚡', 'Respond First', 'Response hero'),
            'boost'     => array('🚀', 'Boost Conversion', 'AI engagement'),
            'convert'   => array('🎯', 'Convert More', 'Enquiry-to-enrolment'),
            'analytics' => array('📈', 'Analytics Engine', 'Intelligence dashboard'),
            'stories'   => array('⭐', 'Testimonials', '3 video testimonials'),
            'ctabox'    => array('📞', 'Final CTA', 'Bottom demo CTA'),
        );
    }

    public static function get($key, $default = '') {
        $opts = get_option(self::OPTION_KEY, array());
        return isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
    }

    /**
     * Render a text field with full visual help.
     * $key      — option key
     * $num      — numbered label (e.g. "1")
     * $label    — what is this
     * $help     — explanation (where it appears)
     * $default  — default value (shown as preview)
     * $where    — page area badge
     */
    public static function text_field($key, $num, $label, $help, $default = '', $where = '') {
        $val = self::get($key, '');
        ?>
        <div class="ee-field">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label><?php echo esc_html($label); ?></label>
                <?php if ($where): ?><span class="where">📍 <?php echo esc_html($where); ?></span><?php endif; ?>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <input type="text" name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" placeholder="<?php echo esc_attr($default); ?>">
            <?php if ($default): ?>
                <div class="ee-default">
                    <span>📝 Default if empty:</span>
                    <code><?php echo esc_html(mb_strimwidth($default, 0, 120, '…')); ?></code>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    public static function textarea_field($key, $num, $label, $help, $default = '', $where = '') {
        $val = self::get($key, '');
        ?>
        <div class="ee-field">
            <div class="ee-field-label">
                <?php if ($num !== ''): ?><span class="num-tag"><?php echo esc_html($num); ?></span><?php endif; ?>
                <label><?php echo esc_html($label); ?></label>
                <?php if ($where): ?><span class="where">📍 <?php echo esc_html($where); ?></span><?php endif; ?>
            </div>
            <?php if ($help): ?><p class="ee-field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
            <textarea name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" placeholder="<?php echo esc_attr($default); ?>"><?php echo esc_textarea($val); ?></textarea>
            <?php if ($default): ?>
                <div class="ee-default">
                    <span>📝 Default if empty:</span>
                    <code><?php echo esc_html(mb_strimwidth($default, 0, 180, '…')); ?></code>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    public static function image_field($key, $num, $label, $help, $default = '') {
        $val = self::get($key, '');
        $show = $val ?: $default;
        ?>
        <div class="ee-field">
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
        echo '<div class="ee-group"><h3 class="ee-group-title">' . esc_html($title);
        if ($badge) echo ' <span class="badge">' . esc_html($badge) . '</span>';
        echo '</h3>';
    }
    public static function group_end() { echo '</div>'; }

    public static function render_page() {
        if (!current_user_can('manage_options')) wp_die('Access denied');
        $tabs = self::tabs();
        $active = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? $_GET['tab'] : 'hero';
        ?>
        <div class="wrap" style="margin-right:20px">
            <form method="post" action="options.php" class="ee-app">
                <?php settings_fields('ee_home_group'); ?>

                <div class="ee-header">
                    <h1>🏠 Home Page Editor</h1>
                    <p>Yethe tumhi home page cha har text, heading, button, ani image badlu shakta — code madhe kahi haat lavayachi garaj nahi. Sagle changes save kelyavar 100% automatic update hotil.</p>
                </div>

                <div class="ee-info-bar">
                    <span class="ico">💡</span>
                    <p>
                        <strong>Kasa Vaprayacha?</strong>
                        <b>16 tabs</b> aahet (Hero, Logos, VidyaAI, vagaire) — har tab cha aat related field aahet. Field madhe text badla kinva "📁 Choose from Media Library" cleek karun image upload kara. Khalti <b>"Save All Changes"</b> button cleek kara. Bas evade!
                    </p>
                </div>

                <div class="ee-tabs-wrap">
                    <div class="ee-tabs">
                        <?php $n=1; foreach ($tabs as $slug => $info): ?>
                            <button type="button" class="ee-tab-btn <?php echo $slug === $active ? 'active' : ''; ?>" data-pane="<?php echo esc_attr($slug); ?>" title="<?php echo esc_attr($info[2]); ?>">
                                <span class="num"><?php echo $n; ?></span>
                                <span><?php echo esc_html($info[0]); ?> <?php echo esc_html($info[1]); ?></span>
                            </button>
                        <?php $n++; endforeach; ?>
                    </div>
                </div>

                <div class="ee-body">

                    <!-- ╔══ HERO ══╗ -->
                    <div class="ee-pane <?php echo $active==='hero'?'active':''; ?>" data-pane="hero">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">🎯</span> Hero Section</h2>
                            <p class="pane-desc">Ha home page cha <strong>sagle yatla mothi area</strong> aahe — top sun start hoto. Yethe pahili nazar la jato ek mothi heading "Convert More Students. Automatically." Khalti chat simulation animation chalu aste. <strong>Customer la ekach view madhe ka tumcha CRM ghyaava ha message ithun ja-to.</strong></p>
                        </div>
                        <?php self::group_start('🏆 Top Trust Badge'); ?>
                            <?php self::text_field('hero_badge', '1', 'Trust Badge Text', 'Headline chya VAR ek small chip madhe disel — social proof sathi. Example: "Trusted by 500 institutes" type.', 'Loved by Leading Top 500+ Admission Teams', 'Hero Top'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('📢 Main Headline (H1)'); ?>
                            <?php self::text_field('hero_h1_part1', '2', 'Headline Line 1 (BLUE part)', 'Mothi heading cha PAHILA bhag — DARK BLUE rangat disto.', 'Convert More Students.', 'Hero Headline'); ?>
                            <?php self::text_field('hero_h1_part2', '3', 'Headline Line 2 (ORANGE part)', 'Mothi heading cha DUSRA bhag — ORANGE rangat disto, vegli line var jaato.', 'Automatically.', 'Hero Headline'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('📝 Description Texts'); ?>
                            <?php self::text_field('hero_supporting', '4', 'Supporting Heading', 'Headline khalil mothi support line (medium size, bold).', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams', 'Below Headline'); ?>
                            <?php self::textarea_field('hero_subtext', '5', 'Sub-text Paragraph', 'Lhan paragraph — yethe 2-3 line madhe tumcha product cha core benefit explain kara.', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.', 'Description'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('🔘 Call To Action Button', 'IMPORTANT'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('hero_cta_text', '6', 'Button Text', '<b>Orange button</b> var disel — primary action.', 'Book Demo', 'CTA Button');
                                self::text_field('hero_cta_url', '7', 'Button Click URL', 'Button cleek kelyavar kuthe jaayel? Example: <code>/book-demo/</code>', '#demo', 'Button Link');
                            }); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('🟢 Live Counter (Animated)'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('hero_counter', '8', 'Starting Number', 'Animation suru honyacha number — automatic increment hoto.', '412', 'Live Stats');
                                self::text_field('hero_counter_label', '9', 'Counter Label', 'Number chya nantar cha text.', 'Students Converted Today', 'Live Stats');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ LOGOS ══╗ -->
                    <div class="ee-pane <?php echo $active==='logos'?'active':''; ?>" data-pane="logos">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">🏛</span> Trusted By Logos Marquee</h2>
                            <p class="pane-desc">Hero chya khalti 2 lines madhe institution logos scroll hotat — ek Left la jato, dusra Right la. <strong>15 logos total</strong> (8 + 7). Social proof sathi — visitor la dakhavnyasathi "ya colleges/universities ne aamcha software vaprala aahe".</p>
                        </div>
                        <?php self::group_start('📌 Section Headings'); ?>
                            <?php self::text_field('logos_badge', '1', 'Top Badge', 'Section sun var disnari lhan label.', 'Leading Institutions', 'Section Top'); ?>
                            <?php self::text_field('logos_heading', '2', 'Main Heading (H2)', 'Logos chya var disnari mothi heading.', 'Trusted by 500+ Institutions Growing Faster Than Ever', 'H2 Heading'); ?>
                            <?php self::text_field('logos_subheading', '3', 'Sub-heading', 'Heading khalil supporting line.', 'AI-powered automation for the next generation of education leaders.', 'Below Heading'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('🔘 Bottom CTA Button'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('logos_cta_text', '4', 'Button Text', '', 'Start Converting Today', 'Section CTA');
                                self::text_field('logos_cta_url', '5', 'Button URL', '', '#get-started', 'Section CTA');
                            }); ?>
                            <?php self::text_field('logos_live_text', '6', 'Live Indicator Text', 'Green pulse dot chya nantar cha text.', 'Live: +124 Admissions Processed in last 1hr', 'Live Indicator'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('⬅ Track 1 — 8 Logos (Left moving)', 'Logos go Left'); ?>
                        <?php
                        $t1 = array(
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp','XISS'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg','Logo'),
                            array('https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png','Anant National University'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp','SR University'),
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp','Hamstek'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp','Adani'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp','Techno India'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp','Final Logo'),
                        );
                        for ($i=1;$i<=8;$i++) {
                            self::image_field("logo_t1_{$i}_url", $i, "Logo {$i} — Image", "Track 1, position {$i}. Recommended: PNG/SVG transparent, 200x100px.", $t1[$i-1][0]);
                            self::text_field("logo_t1_{$i}_alt", '', 'Alt text', 'Image cha SEO/accessibility text — institution cha naav lihaa.', $t1[$i-1][1], '');
                        }
                        ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('➡ Track 2 — 7 Logos (Right moving)', 'Logos go Right'); ?>
                        <?php
                        $t2 = array(
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/JGI-JAIN-2.webp','Jain University'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/01/mit-shillong.png','MIT Shillong'),
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/isdi.webp','ISDI'),
                            array('https://www.extraaedge.com/wp-content/uploads/2025/09/jio-v3-3.png','Jio Institute'),
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/dpu-3.webp','DPU'),
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/Graphic-Era-3.webp','Graphic Era'),
                            array('https://www.extraaedge.com/wp-content/uploads/2024/12/fostima.webp','Fostima'),
                        );
                        for ($i=1;$i<=7;$i++) {
                            self::image_field("logo_t2_{$i}_url", $i, "Logo {$i} — Image", "Track 2, position {$i}. Recommended: PNG/SVG transparent, 200x100px.", $t2[$i-1][0]);
                            self::text_field("logo_t2_{$i}_alt", '', 'Alt text', '', $t2[$i-1][1], '');
                        }
                        ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ VIDYAAI ══╗ -->
                    <div class="ee-pane <?php echo $active==='vidyaai'?'active':''; ?>" data-pane="vidyaai">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">🧠</span> VidyaAI Admission Intelligence</h2>
                            <p class="pane-desc">Logos khalil mothi section — scroll karat-karat user la <strong>5 stories</strong> distail (AI Assist, Lead Scoring, Follow-up, Calling, Performance). Right side la fake CRM dashboard sticky raahil ani har section cha veles different view dakhvel.</p>
                        </div>
                        <?php self::group_start('🏷 Top Badge & Heading'); ?>
                            <?php self::text_field('vidya_badge', '1', 'Top Badge Text', 'Small blue chip madhe disnara label.', 'VidyaAI Admission Intelligence', 'Badge'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('vidya_h1_part1', '2', 'Heading Line 1', 'Mothi headline cha pahila bhag (dark color).', 'Powerful Admission CRM', 'Main H2');
                                self::text_field('vidya_h1_part2', '3', 'Heading Line 2 (Gradient)', 'Heading cha gradient (blue→orange) bhag.', 'with simplicity.', 'Main H2');
                            }); ?>
                            <?php self::textarea_field('vidya_subtitle', '4', 'Description', 'Heading chya khalil paragraph.', 'A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.', 'Description'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('🔘 Hero CTAs (2 buttons)'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('vidya_cta1_text', '5', 'Primary Button Text', 'Dark blue button.', 'Book Private Demo', 'Primary CTA');
                                self::text_field('vidya_cta1_url', '6', 'Primary Button URL', '', '#demo', 'Primary CTA');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('vidya_cta2_text', '7', 'Secondary Button Text', 'White outlined button.', 'Explore Platform', 'Secondary CTA');
                                self::text_field('vidya_cta2_url', '8', 'Secondary Button URL', '', '#platform', 'Secondary CTA');
                            }); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('🏁 Final CTA Button'); ?>
                            <?php self::text_field('vidya_final_cta', '9', 'Bottom Orange Button', 'Section che shevti cha mothi orange button.', 'Get Started with VidyaAI', 'Bottom CTA'); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ ADMISSION CRM ══╗ -->
                    <div class="ee-pane <?php echo $active==='admcrm'?'active':''; ?>" data-pane="admcrm">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📊</span> Admission CRM — Pipeline Visualization</h2>
                            <p class="pane-desc">Light gray background varti section — pipeline animation chalte (5 stages: Inquiry → Verified → Automation → Counseling → Enrolled). 3 feature cards distat (Funnel Mgmt, Smart Follow-ups, Insights).</p>
                        </div>
                        <?php self::group_start('📝 Headings & Subtitle'); ?>
                            <?php self::text_field('adm_h2', '1', 'Main Heading (H2)', '', 'Every admission. Tracked. Moving forward.', 'H2'); ?>
                            <?php self::textarea_field('adm_subheadline', '2', 'Sub-heading paragraph', '', 'Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent lead prioritization ensures your team focuses on candidates that convert.', 'Description'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 Bottom CTA'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('adm_cta_text', '3', 'CTA Button Text', '', 'Explore the Flow', 'CTA');
                                self::text_field('adm_cta_url', '4', 'CTA Button URL', '', '#', 'CTA');
                            }); ?>
                            <?php self::text_field('adm_closing', '5', 'Closing Tagline', 'Button khalil all-caps tagline.', 'Full visibility. Zero chaos. More conversions.', 'Closing'); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ MARKETING ══╗ -->
                    <div class="ee-pane <?php echo $active==='marketing'?'active':''; ?>" data-pane="marketing">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📣</span> AI Admission Marketing System</h2>
                            <p class="pane-desc">5-step horizontal flow distoy (Student Inquiry → AI Segmentation → Personalized Message → Auto Follow-ups → Admission Confirmed). Khalti 1 marketing card aahe + 1 big CTA.</p>
                        </div>
                        <?php self::group_start('📌 Top Section'); ?>
                            <?php self::text_field('mkt_status', '1', 'Status Tag (with green pulse dot)', '', 'AI Engine: Live Processing', 'Status Tag'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('mkt_h2_part1', '2', 'Heading Line 1', '', 'Automate Every Inquiry.', 'Main H2');
                                self::text_field('mkt_h2_part2', '3', 'Heading Line 2 (Orange)', '', 'Convert Every Student.', 'Main H2');
                            }); ?>
                            <?php self::textarea_field('mkt_subtext', '4', 'Subtext paragraph', '', 'From the first touchpoint to final enrollment, our AI-driven automation ensures no lead is left behind. Experience precision marketing that scales with your institution.', 'Description'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🃏 Marketing Card'); ?>
                            <?php self::text_field('mkt_card_title', '5', 'Card Title', '', 'Scale Your Outreach With Precision', 'Card Heading'); ?>
                            <?php self::textarea_field('mkt_description', '6', 'Card Description', '', 'Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time.', 'Card Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 Bottom CTA'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('mkt_cta_text', '7', 'CTA Button Text', '', 'Activate AI Automation', 'CTA');
                                self::text_field('mkt_cta_url', '8', 'CTA Button URL', '', '#demo', 'CTA');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ CHATBOT ══╗ -->
                    <div class="ee-pane <?php echo $active==='chatbot'?'active':''; ?>" data-pane="chatbot">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">💬</span> Chatbot & Live Chat Section</h2>
                            <p class="pane-desc">Left side text + right side live chat simulation phone. 3 checkmark features list. 1 orange CTA button.</p>
                        </div>
                        <?php self::group_start('📝 Heading'); ?>
                            <?php self::text_field('bot_h2', '1', 'Heading (H2)', '', 'Chatbot & Live Chat for Admissions', 'H2'); ?>
                            <?php self::textarea_field('bot_description', '2', 'Description', '', 'Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('✓ Feature List (3 items)'); ?>
                            <?php self::text_field('bot_feat1', '3', 'Feature 1', '', 'Automated Chat Workflow', 'Feature'); ?>
                            <?php self::text_field('bot_feat2', '4', 'Feature 2', '', 'Live Chat Enablement', 'Feature'); ?>
                            <?php self::text_field('bot_feat3', '5', 'Feature 3', '', 'Meeting Scheduler', 'Feature'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 CTA Button'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('bot_cta_text', '6', 'Button Text', '', 'See Live Demo', 'CTA');
                                self::text_field('bot_cta_url', '7', 'Button URL', '', '#', 'CTA');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ APPLICATION MGMT ══╗ -->
                    <div class="ee-pane <?php echo $active==='appmgmt'?'active':''; ?>" data-pane="appmgmt">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📋</span> Application Management System</h2>
                            <p class="pane-desc">Right side 4-step vertical animated flow (Submission → AI Verification → Counseling → Confirmed). Left text + 3 capability cards + stats.</p>
                        </div>
                        <?php self::group_start('📌 Top'); ?>
                            <?php self::text_field('ams_status', '1', 'Status Pill', '', 'SYSTEM STATUS: ACTIVE', 'Status Pill'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('ams_h1_part1', '2', 'Heading Line 1', '', 'Turn Applications into Admissions.', 'H2');
                                self::text_field('ams_h1_part2', '3', 'Heading Line 2 (Orange)', '', 'On Autopilot.', 'H2');
                            }); ?>
                            <?php self::textarea_field('ams_para1', '4', 'Paragraph 1', '', 'Our Application Management System streamlines the entire application process for you and your prospective students.', 'Body'); ?>
                            <?php self::textarea_field('ams_para2', '5', 'Paragraph 2', '', 'Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 CTA'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('ams_cta_text', '6', 'CTA Text', '', 'Start Automating Now', 'CTA');
                                self::text_field('ams_cta_url', '7', 'CTA URL', '', '#get-started', 'CTA');
                            }); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🧑‍💼 Counselor Avatar Image'); ?>
                            <?php self::image_field('ams_counselor_img', '8', 'Step 3 Counselor Avatar', 'GD-PI counseling step madhe disel small round photo.', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80'); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ WHATSAPP ══╗ -->
                    <div class="ee-pane <?php echo $active==='whatsapp'?'active':''; ?>" data-pane="whatsapp">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📱</span> WhatsApp Business API</h2>
                            <p class="pane-desc">Left text + 3 feature cards. Right side ek WhatsApp-style chat simulation + live analytics floating card.</p>
                        </div>
                        <?php self::group_start('📌 Top'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('wa_h2_part1', '1', 'Heading Line 1', '', 'WhatsApp', 'H2');
                                self::text_field('wa_h2_part2', '2', 'Heading Line 2 (Orange)', '', 'Business API', 'H2');
                            }); ?>
                            <?php self::textarea_field('wa_description', '3', 'Description', '', 'WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🃏 Feature 1'); ?>
                            <?php self::text_field('wa_feat1_title', '4', 'Title', '', 'Two-way WhatsApp and live chat', 'Card 1'); ?>
                            <?php self::text_field('wa_feat1_desc', '5', 'Description', '', 'Enable real-time human connection alongside automation.', 'Card 1'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🃏 Feature 2'); ?>
                            <?php self::text_field('wa_feat2_title', '6', 'Title', '', 'Bulk WhatsApp & automated campaigns', 'Card 2'); ?>
                            <?php self::text_field('wa_feat2_desc', '7', 'Description', '', 'Scale your outreach without losing the personal touch.', 'Card 2'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🃏 Feature 3'); ?>
                            <?php self::text_field('wa_feat3_title', '8', 'Title', '', 'Verified business account', 'Card 3'); ?>
                            <?php self::text_field('wa_feat3_desc', '9', 'Description', '', 'Official green badge to build instant trust with applicants.', 'Card 3'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 CTAs (2 buttons)'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('wa_cta1_text', '10', 'Primary Button', '', 'Start Optimizing Now', 'CTA 1');
                                self::text_field('wa_cta1_url', '11', 'Primary URL', '', '#', 'CTA 1');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('wa_cta2_text', '12', 'Secondary Button', '', 'View Case Studies', 'CTA 2');
                                self::text_field('wa_cta2_url', '13', 'Secondary URL', '', '#', 'CTA 2');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ MOBILE CRM ══╗ -->
                    <div class="ee-pane <?php echo $active==='mobilecrm'?'active':''; ?>" data-pane="mobilecrm">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📲</span> Mobile CRM Section</h2>
                            <p class="pane-desc">Phone mockup with live GPS map. 4 floating feature cards around phone. Left text + 3 feature pills.</p>
                        </div>
                        <?php self::group_start('🏷 Heading'); ?>
                            <?php self::text_field('mcrm_badge', '1', 'Top Badge', 'Orange chip top var.', 'Next-Gen Mobility', 'Badge'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('mcrm_h2_p1', '2', 'Heading Part 1', '', 'Mobile CRM: Powering', 'H2');
                                self::text_field('mcrm_h2_em', '3', 'Heading Highlighted Word', 'Orange underline asnara word.', 'Productivity', 'H2');
                            }); ?>
                            <?php self::text_field('mcrm_h2_p2', '4', 'Heading Part 3', '', 'on the Go', 'H2'); ?>
                            <?php self::textarea_field('mcrm_description', '5', 'Description', '', 'Our Mobile CRM empowers work-from-home and field counselors to stay productive anywhere. Monitor visits, log activities, and complete follow-ups with real-time sync to your Admission CRM for intelligent, unified reporting.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('💊 Feature Pills (3 items)'); ?>
                            <?php self::text_field('mcrm_feat1', '6', 'Pill 1', '', 'Click-To-Call', 'Pill'); ?>
                            <?php self::text_field('mcrm_feat2', '7', 'Pill 2', '', 'Field Tracker', 'Pill'); ?>
                            <?php self::text_field('mcrm_feat3', '8', 'Pill 3', '', 'Missed Call Lead Capture', 'Pill'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('✅ Sync Note (green box)'); ?>
                            <?php self::textarea_field('mcrm_note', '9', 'Sync Note Text', 'Green left-border box madhe.', 'Real-time sync with your Admission CRM ensures every interaction is captured for intelligent, unified reporting — zero data loss, always.', 'Green Note'); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ CHOOSE ══╗ -->
                    <div class="ee-pane <?php echo $active==='choose'?'active':''; ?>" data-pane="choose">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">🏗</span> Why Institutes Choose ExtraaEdge</h2>
                            <p class="pane-desc">5 step storytelling — left side clickable cards, right side rotating dashboard simulation. 4 stat counters animate hota. Bottom social proof.</p>
                        </div>
                        <?php self::group_start('🏷 Top Heading'); ?>
                            <?php self::text_field('arch_eyebrow', '1', 'Eyebrow Text', 'Mothi H2 chya var disel orange caps text.', 'Admission Ecosystem', 'Eyebrow'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('arch_h2_p1', '2', 'Heading Part 1', '', 'Why Institutes Choose ExtraaEdge as the', 'H2');
                                self::text_field('arch_h2_em', '3', 'Highlighted Word', 'Orange underline word.', 'Architect', 'H2');
                            }); ?>
                            <?php self::text_field('arch_h2_p2', '4', 'Heading Part 3', '', 'of Their Admission Process?', 'H2'); ?>
                            <?php self::textarea_field('arch_subtext', '5', 'Sub-text', '', 'Most Admission CRMs help you manage admissions. ExtraaEdge helps you design how admissions should work—end to end, at scale.', 'Description'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('👥 Social Proof Strip'); ?>
                            <?php self::text_field('arch_proof_text', '6', 'Social Proof Label', 'Bottom small chip text.', 'Trusted by 500+ Leading Institutes', 'Bottom Strip'); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ RESPOND ══╗ -->
                    <div class="ee-pane <?php echo $active==='respond'?'active':''; ?>" data-pane="respond">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">⚡</span> Respond First Hero</h2>
                            <p class="pane-desc">Boxed section — left side bold heading + body + CTA. Right side rotating AI hub with orbiting chips and live toast notification.</p>
                        </div>
                        <?php self::group_start('📝 Heading'); ?>
                            <?php self::text_field('rf_eyebrow', '1', 'Eyebrow', 'Orange caps small text.', 'Admission Response Automation', 'Eyebrow'); ?>
                            <?php self::text_field('rf_h1_l1', '2', 'Heading Line 1', '', 'Decrease Response Time.', 'H2'); ?>
                            <?php self::text_field('rf_h1_l2', '3', 'Heading Line 2 (ORANGE)', '', 'Respond First Using AI Agents.', 'H2'); ?>
                            <?php self::text_field('rf_h1_l3', '4', 'Heading Line 3', '', 'Win Admissions.', 'H2'); ?>
                            <?php self::textarea_field('rf_copy', '5', 'Body Copy', '', 'Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation—and the conversion. ExtraaEdge automatically captures inquiries from every source and initiates AI-powered calls instantly.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 CTA & Microcopy'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('rf_cta_text', '6', 'Button Text', '', 'Book a Demo', 'CTA');
                                self::text_field('rf_cta_url', '7', 'Button URL', '', '#', 'CTA');
                            }); ?>
                            <?php self::text_field('rf_micro', '8', 'Microcopy', 'Button khalil lhan italic text.', 'See how institutes reduce response time by 90%', 'Microcopy'); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ BOOST ══╗ -->
                    <div class="ee-pane <?php echo $active==='boost'?'active':''; ?>" data-pane="boost">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">🚀</span> Boost Conversion — AI Engagement</h2>
                            <p class="pane-desc">Interactive 3-stage story (Behaviour → Dynamic Routing → VidyaGPT). Bottom: 4 feature cards grid.</p>
                        </div>
                        <?php self::group_start('🏷 Top Heading'); ?>
                            <?php self::text_field('bc_badge', '1', 'Top Badge', '', 'Boost Conversion Rates', 'Badge'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('bc_h2_p1', '2', 'Heading Line 1', '', 'AI Decides the Right', 'H2');
                                self::text_field('bc_h2_p2', '3', 'Heading Line 2', '', 'Admission Engagements.', 'H2');
                            }); ?>
                            <?php self::textarea_field('bc_subtext', '4', 'Sub-text', '', 'ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who, when, and how to engage. Every interaction is timely, relevant, and context-aware.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🃏 4 Feature Cards'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('bc_f1_title', '5', 'Card 1 Title', '', 'Trigger-Based Email & SMS', 'Card 1');
                                self::text_field('bc_f1_desc', '6', 'Card 1 Description', '', 'Automated personalized outreach triggered by student behavior thresholds.', 'Card 1');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('bc_f2_title', '7', 'Card 2 Title', '', 'AI Calling & Click-to-Call', 'Card 2');
                                self::text_field('bc_f2_desc', '8', 'Card 2 Description', '', 'Intelligence-led queues that connect teams to high-intent leads instantly.', 'Card 2');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('bc_f3_title', '9', 'Card 3 Title', '', 'VidyaGPT AI Agents', 'Card 3');
                                self::text_field('bc_f3_desc', '10', 'Card 3 Description', '', '24x7 admission counselors providing accurate, contextual answers instantly.', 'Card 3');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('bc_f4_title', '11', 'Card 4 Title', '', 'WhatsApp Communication', 'Card 4');
                                self::text_field('bc_f4_desc', '12', 'Card 4 Description', '', 'Engage students where they are with official WhatsApp business API integration.', 'Card 4');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ CONVERT ══╗ -->
                    <div class="ee-pane <?php echo $active==='convert'?'active':''; ?>" data-pane="convert">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">🎯</span> Convert More — Enquiry to Enrolment</h2>
                            <p class="pane-desc">Left content + 5-step animated dashboard (Prospect → AI Scoping → Prediction Score → Next Action → Success).</p>
                        </div>
                        <?php self::group_start('📝 Heading & Body'); ?>
                            <?php self::text_field('cm_eyebrow', '1', 'Eyebrow Text', '', 'Convert More', 'Eyebrow'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('cm_h2_p1', '2', 'Heading Line 1', '', 'Turn Enquiries Into', 'H2');
                                self::text_field('cm_h2_p2', '3', 'Heading Line 2 (ORANGE)', '', 'Enrollments', 'H2');
                            }); ?>
                            <?php self::text_field('cm_subtitle', '4', 'Sub-title (bold)', '', 'Not every enquiry deserves the same attention.', 'Subtitle'); ?>
                            <?php self::textarea_field('cm_description', '5', 'Description', '', 'ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward. The result is higher efficiency and stronger enrollment conversions.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 CTA'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('cm_cta_text', '6', 'Button Text', '', 'Book a Demo', 'CTA');
                                self::text_field('cm_cta_url', '7', 'Button URL', '', '#', 'CTA');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ ANALYTICS ══╗ -->
                    <div class="ee-pane <?php echo $active==='analytics'?'active':''; ?>" data-pane="analytics">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📈</span> Analytics / Intelligence Engine</h2>
                            <p class="pane-desc">Left bullets + 3D rotating dashboard right. Hover trigger karte aatun typing AI terminal + counters.</p>
                        </div>
                        <?php self::group_start('📌 Top'); ?>
                            <?php self::text_field('ie_badge', '1', 'Top Badge', '', 'Measure your efforts', 'Badge'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('ie_h2_p1', '2', 'Heading Line 1', '', "Know What's Working.", 'H2');
                                self::text_field('ie_h2_p2', '3', 'Heading Line 2 (Gradient)', '', "Fix What's Not.", 'H2');
                            }); ?>
                            <?php self::textarea_field('ie_description', '4', 'Description', '', 'Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance.', 'Body'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🔘 CTA'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('ie_cta_text', '5', 'Button Text', '', 'Book a Demo', 'CTA');
                                self::text_field('ie_cta_url', '6', 'Button URL', '', '#', 'CTA');
                            }); ?>
                        <?php self::group_end(); ?>
                    </div>

                    <!-- ╔══ STORIES ══╗ -->
                    <div class="ee-pane <?php echo $active==='stories'?'active':''; ?>" data-pane="stories">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">⭐</span> Customer Testimonials</h2>
                            <p class="pane-desc">4 stat metric cards + 3 video testimonials (YouTube ID, photo, quote, name). Click karayla video play hota place madhech.</p>
                        </div>
                        <?php self::group_start('📝 Section Heading'); ?>
                            <?php self::text_field('st_tagline', '1', 'Tagline', '', 'CRM Impact Stories', 'Tagline'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('st_h2_p1', '2', 'Heading Line 1', '', 'Powering Growth for', 'H2');
                                self::text_field('st_h2_p2', '3', 'Heading Line 2', '', '500+ Happy Customers', 'H2');
                            }); ?>
                            <?php self::textarea_field('st_subtitle', '4', 'Sub-title', '', 'From streamlined counselor workflows to data-driven reporting, see how education leaders are rewriting their success stories with ExtraaEdge.', 'Description'); ?>
                        <?php self::group_end(); ?>

                        <?php self::group_start('📊 4 Stat Metric Cards', 'Numbers'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('st_m1_num', '5', 'Metric 1 Number', 'Animation cha target number.', '500', 'Stat 1');
                                self::text_field('st_m1_lab', '6', 'Metric 1 Label', '', 'Happy Customers', 'Stat 1');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('st_m2_num', '7', 'Metric 2 Number', '', '3', 'Stat 2');
                                self::text_field('st_m2_lab', '8', 'Metric 2 Label', '', 'X Conversion Rate', 'Stat 2');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('st_m3_num', '9', 'Metric 3 Number', '', '15000', 'Stat 3');
                                self::text_field('st_m3_lab', '10', 'Metric 3 Label', '', 'Daily Power Users', 'Stat 3');
                            }); ?>
                            <?php self::pair_row(function(){
                                self::text_field('st_m4_num', '11', 'Metric 4 Number', '', '99', 'Stat 4');
                                self::text_field('st_m4_lab', '12', 'Metric 4 Label', '', '% Support Rating', 'Stat 4');
                            }); ?>
                        <?php self::group_end(); ?>

                        <?php
                        $t_defaults = array(
                            1 => array('video'=>'3SHgLf1GFgk','name'=>'Silky Jain Marwah','role'=>'Executive Director','inst'=>"Tula's Institute",'photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp'),
                            2 => array('video'=>'dWLdQ8E3FOU','name'=>'Pranay Rupani','role'=>'Head of Admissions & Marketing','inst'=>'Annapurna College of Film & Media','photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp'),
                            3 => array('video'=>'yfK83D2SKps','name'=>'K. Nirmala Devi','role'=>'Assistant Manager','inst'=>'Indian Academy Group','photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp'),
                        );
                        foreach ($t_defaults as $i => $d) {
                            self::group_start("🎬 Testimonial #{$i}", "Card {$i}");
                            self::text_field("st_t{$i}_video", '', "YouTube Video ID", "Yethe FULL URL nahi, FAKT VIDEO ID lihaa. Example: <code>https://youtu.be/<b>3SHgLf1GFgk</b></code> madhun <b>3SHgLf1GFgk</b> ha part copy kara.", $d['video'], "Video");
                            self::textarea_field("st_t{$i}_quote", '', "Customer Quote", "Mothi review/quote — italic distoy site varti.", '', "Quote");
                            self::pair_row(function() use ($i, $d) {
                                self::text_field("st_t{$i}_name", '', "Customer Name", '', $d['name'], "Name");
                                self::text_field("st_t{$i}_role", '', "Job Role", '', $d['role'], "Role");
                            });
                            self::text_field("st_t{$i}_inst", '', "Institute / Company Name", '', $d['inst'], "Company");
                            self::image_field("st_t{$i}_photo", '', "Customer Photo", "Profile photo — square 200x200px chi recommended.", $d['photo']);
                            self::group_end();
                        }
                        ?>
                    </div>

                    <!-- ╔══ FINAL CTA ══╗ -->
                    <div class="ee-pane <?php echo $active==='ctabox'?'active':''; ?>" data-pane="ctabox">
                        <div class="ee-pane-header">
                            <h2><span class="pane-ico">📞</span> Final Demo CTA</h2>
                            <p class="pane-desc">Page chi shevti chi section — left side mothi heading + book demo button. Right side admission expert cha circular photo + 6 connected workflow nodes animation.</p>
                        </div>
                        <?php self::group_start('📝 Heading & CTA'); ?>
                            <?php self::text_field('ctab_h2', '1', 'Main Heading (H2)', '', 'Ready to Move to an AI-Powered Admission CRM and Marketing Solution?', 'H2'); ?>
                            <?php self::textarea_field('ctab_subheadline', '2', 'Sub-heading', '', 'Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.', 'Body'); ?>
                            <?php self::pair_row(function(){
                                self::text_field('ctab_cta_text', '3', 'Button Text', '', 'Book a Demo', 'Big Button');
                                self::text_field('ctab_cta_url', '4', 'Button URL', '', 'https://www.extraaedge.com/', 'Big Button');
                            }); ?>
                            <?php self::text_field('ctab_trust', '5', 'Trust Indicator Text', 'Button khalil shield-check icon javal text.', 'Trusted by 250+ Premier Institutions Globally', 'Trust Line'); ?>
                        <?php self::group_end(); ?>
                        <?php self::group_start('🧑‍🏫 Expert Centerpiece Image'); ?>
                            <?php self::image_field('ctab_expert_img', '6', 'Admission Expert Photo', 'Right side cha center circular photo — admission counselor cha photo. 400x400px recommended.', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp'); ?>
                        <?php self::group_end(); ?>
                    </div>

                </div>

                <div class="ee-save-bar">
                    <div class="ee-save-info">
                        💾 <strong>Tip:</strong> Sagle tabs check karun zaalyavar EKACH veles "Save All Changes" cleek kara — sagle changes ekach veles save hotil.
                    </div>
                    <?php submit_button('💾 Save All Changes', 'primary large', 'submit', false); ?>
                </div>
            </form>
        </div>
        <script>
        (function($){
            $('.ee-tab-btn').on('click', function(){
                var pane = $(this).data('pane');
                $('.ee-tab-btn').removeClass('active');
                $(this).addClass('active');
                $('.ee-pane').removeClass('active');
                $('.ee-pane[data-pane="'+pane+'"]').addClass('active');
                history.replaceState(null,'','?page=<?php echo self::PAGE_SLUG; ?>&tab='+pane);
                $('html,body').animate({ scrollTop: $('.ee-tabs-wrap').offset().top - 32 }, 250);
            });
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
        })(jQuery);
        </script>
        <?php
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
