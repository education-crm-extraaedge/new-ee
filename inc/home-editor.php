<?php
/**
 * Home Page Editor — Non-coder admin panel for front-page.php
 * Stores everything in single option: ee_home_settings (array)
 * Adds menu: Settings → 🏠 Home Page Editor
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
        add_options_page(
            'Home Page Editor',
            '🏠 Home Page Editor',
            'manage_options',
            self::PAGE_SLUG,
            array(__CLASS__, 'render_page')
        );
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
            if (is_array($v)) {
                $out[$k] = array_map('wp_kses_post', $v);
            } else {
                $out[$k] = wp_kses_post($v);
            }
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
        .ee-wrap{max-width:1200px;margin:20px 0;background:#fff;border-radius:14px;box-shadow:0 4px 20px rgba(0,0,0,.06);overflow:hidden}
        .ee-head{background:linear-gradient(135deg,#19335D,#1e3d70);color:#fff;padding:30px 36px}
        .ee-head h1{color:#fff;margin:0 0 6px;font-size:28px}
        .ee-head p{color:rgba(255,255,255,.85);margin:0;font-size:14px}
        .ee-tabs{display:flex;flex-wrap:wrap;gap:0;background:#f8fafc;border-bottom:1px solid #e2e8f0;padding:0 20px}
        .ee-tab-btn{background:transparent;border:0;padding:14px 18px;font-size:13px;font-weight:600;color:#475569;cursor:pointer;border-bottom:3px solid transparent;transition:.2s}
        .ee-tab-btn:hover{color:#DE6E30}
        .ee-tab-btn.active{color:#DE6E30;border-bottom-color:#DE6E30;background:#fff}
        .ee-body{padding:30px 36px}
        .ee-pane{display:none}
        .ee-pane.active{display:block}
        .ee-pane h2{font-size:20px;color:#19335D;margin:0 0 8px;border-bottom:2px solid #DE6E30;padding-bottom:8px;display:inline-block}
        .ee-pane > p.desc{color:#64748b;margin:0 0 20px;font-size:13px}
        .ee-field{margin-bottom:18px}
        .ee-field label{display:block;font-weight:600;color:#19335D;margin-bottom:6px;font-size:13px}
        .ee-field input[type=text],.ee-field input[type=url],.ee-field textarea{
            width:100%;padding:10px 12px;border:1px solid #cbd5e1;border-radius:8px;font-size:14px;background:#fff
        }
        .ee-field textarea{min-height:80px;font-family:inherit}
        .ee-field input:focus,.ee-field textarea:focus{outline:0;border-color:#DE6E30;box-shadow:0 0 0 3px rgba(222,110,48,.12)}
        .ee-field small{color:#64748b;font-size:12px;display:block;margin-top:4px}
        .ee-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
        .ee-img-row{display:flex;gap:10px;align-items:flex-start;background:#f8fafc;padding:10px;border-radius:8px;border:1px dashed #cbd5e1}
        .ee-img-row .ee-thumb{width:80px;height:80px;border-radius:6px;background:#e2e8f0 center/contain no-repeat;flex-shrink:0;border:1px solid #cbd5e1}
        .ee-img-row .ee-img-controls{flex:1;display:flex;flex-direction:column;gap:6px}
        .ee-img-row button{background:#19335D;color:#fff;border:0;padding:7px 14px;border-radius:6px;cursor:pointer;font-size:12px;font-weight:600;width:fit-content}
        .ee-img-row button:hover{background:#DE6E30}
        .ee-save-bar{padding:20px 36px;background:#f8fafc;border-top:1px solid #e2e8f0;text-align:right}
        .ee-save-bar .button-primary{background:#DE6E30!important;border-color:#DE6E30!important;font-size:15px;padding:8px 28px;height:auto}
        .ee-save-bar .button-primary:hover{background:#c85d20!important}
        .ee-section-block{background:#fefefe;border:1px solid #e2e8f0;border-radius:10px;padding:18px;margin-bottom:18px}
        .ee-section-block h3{margin:0 0 12px;font-size:14px;color:#19335D;font-weight:700;text-transform:uppercase;letter-spacing:1px}
        ';
    }

    public static function tabs() {
        return array(
            'hero'       => '🎯 Hero',
            'logos'      => '🏛 Logos',
            'vidyaai'    => '🧠 VidyaAI',
            'admcrm'     => '📊 Admission CRM',
            'marketing'  => '📣 Marketing',
            'chatbot'    => '💬 Chatbot',
            'appmgmt'    => '📋 App Management',
            'whatsapp'   => '📱 WhatsApp',
            'mobilecrm'  => '📲 Mobile CRM',
            'choose'     => '🏗 Why Choose',
            'respond'    => '⚡ Respond First',
            'boost'      => '🚀 Boost Conv.',
            'convert'    => '🎯 Convert More',
            'analytics'  => '📈 Analytics',
            'stories'    => '⭐ Testimonials',
            'ctabox'     => '📞 Final CTA',
        );
    }

    public static function get($key, $default = '') {
        $opts = get_option(self::OPTION_KEY, array());
        return isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
    }

    public static function text_field($key, $label, $default = '', $help = '') {
        $val = self::get($key, '');
        printf(
            '<div class="ee-field"><label>%s</label><input type="text" name="%s[%s]" value="%s" placeholder="%s">%s</div>',
            esc_html($label),
            esc_attr(self::OPTION_KEY),
            esc_attr($key),
            esc_attr($val),
            esc_attr($default),
            $help ? '<small>' . esc_html($help) . '</small>' : ''
        );
    }

    public static function textarea_field($key, $label, $default = '', $help = '') {
        $val = self::get($key, '');
        printf(
            '<div class="ee-field"><label>%s</label><textarea name="%s[%s]" placeholder="%s">%s</textarea>%s</div>',
            esc_html($label),
            esc_attr(self::OPTION_KEY),
            esc_attr($key),
            esc_attr($default),
            esc_textarea($val),
            $help ? '<small>' . esc_html($help) . '</small>' : ''
        );
    }

    public static function image_field($key, $label, $default = '') {
        $val = self::get($key, '');
        $show = $val ?: $default;
        printf(
            '<div class="ee-field"><label>%s</label>
            <div class="ee-img-row">
                <div class="ee-thumb" style="background-image:url(%s)"></div>
                <div class="ee-img-controls">
                    <input type="url" name="%s[%s]" value="%s" placeholder="%s" class="ee-img-input">
                    <button type="button" class="ee-img-pick">📁 Choose from Media Library</button>
                </div>
            </div></div>',
            esc_html($label),
            esc_url($show),
            esc_attr(self::OPTION_KEY),
            esc_attr($key),
            esc_attr($val),
            esc_attr($default)
        );
    }

    public static function render_page() {
        if (!current_user_can('manage_options')) wp_die('Access denied');
        $tabs = self::tabs();
        $active = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? $_GET['tab'] : 'hero';
        ?>
        <div class="wrap">
            <form method="post" action="options.php" class="ee-wrap">
                <?php settings_fields('ee_home_group'); ?>
                <div class="ee-head">
                    <h1>🏠 Home Page Editor</h1>
                    <p>Non-coder admin — change text, images, CTAs without touching code. Front-page template uses these values automatically.</p>
                </div>
                <div class="ee-tabs">
                    <?php foreach ($tabs as $slug => $label) : ?>
                        <button type="button" class="ee-tab-btn <?php echo $slug === $active ? 'active' : ''; ?>" data-pane="<?php echo esc_attr($slug); ?>">
                            <?php echo esc_html($label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <div class="ee-body">

                    <!-- HERO -->
                    <div class="ee-pane <?php echo $active === 'hero' ? 'active' : ''; ?>" data-pane="hero">
                        <h2>AI Admission CRM Hero</h2>
                        <p class="desc">Top section with main headline and live AI chat simulation.</p>
                        <?php
                        self::text_field('hero_badge', 'Trust Badge Text', 'Loved by Leading Top 500+ Admission Teams');
                        self::text_field('hero_h1_part1', 'Headline (line 1)', 'Convert More Students.');
                        self::text_field('hero_h1_part2', 'Headline Highlighted (orange, line 2)', 'Automatically.');
                        self::text_field('hero_supporting', 'Supporting Heading', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams');
                        self::textarea_field('hero_subtext', 'Sub-text Paragraph', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.');
                        echo '<div class="ee-row">';
                        self::text_field('hero_cta_text', 'CTA Button Text', 'Book Demo');
                        self::text_field('hero_cta_url', 'CTA Button URL', '#demo');
                        echo '</div>';
                        self::text_field('hero_counter', 'Live Counter Start Number', '412', 'Number that animates as "Students Converted Today"');
                        self::text_field('hero_counter_label', 'Counter Label', 'Students Converted Today');
                        ?>
                    </div>

                    <!-- LOGOS -->
                    <div class="ee-pane <?php echo $active === 'logos' ? 'active' : ''; ?>" data-pane="logos">
                        <h2>Trusted By 500+ Institutions (Logo Marquee)</h2>
                        <p class="desc">Two scrolling logo tracks (15 logos). Each logo: image URL + alt text.</p>
                        <?php
                        self::text_field('logos_badge', 'Section Badge', 'Leading Institutions');
                        self::text_field('logos_heading', 'Main Heading', 'Trusted by 500+ Institutions Growing Faster Than Ever');
                        self::text_field('logos_subheading', 'Sub-heading', 'AI-powered automation for the next generation of education leaders.');
                        echo '<div class="ee-row">';
                        self::text_field('logos_cta_text', 'CTA Button Text', 'Start Converting Today');
                        self::text_field('logos_cta_url', 'CTA Button URL', '#get-started');
                        echo '</div>';
                        self::text_field('logos_live_text', 'Live Indicator Text', 'Live: +124 Admissions Processed in last 1hr');
                        echo '<div class="ee-section-block"><h3>Track 1 — Moving Left (8 logos)</h3>';
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
                            self::image_field("logo_t1_{$i}_url", "Logo $i — Image", $parts[0]);
                            self::text_field("logo_t1_{$i}_alt", "Logo $i — Alt Text", $parts[1]);
                        }
                        echo '</div>';
                        echo '<div class="ee-section-block"><h3>Track 2 — Moving Right (7 logos)</h3>';
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
                            self::image_field("logo_t2_{$i}_url", "Logo $i — Image", $parts[0]);
                            self::text_field("logo_t2_{$i}_alt", "Logo $i — Alt Text", $parts[1]);
                        }
                        echo '</div>';
                        ?>
                    </div>

                    <!-- VIDYAAI -->
                    <div class="ee-pane <?php echo $active === 'vidyaai' ? 'active' : ''; ?>" data-pane="vidyaai">
                        <h2>VidyaAI Admission Intelligence</h2>
                        <p class="desc">Hero + 5 storytelling sections with sticky CRM dashboard simulation.</p>
                        <?php
                        self::text_field('vidya_badge', 'Top Badge', 'VidyaAI Admission Intelligence');
                        self::text_field('vidya_h1_part1', 'Heading (line 1)', 'Powerful Admission CRM');
                        self::text_field('vidya_h1_part2', 'Heading Highlighted', 'with simplicity.');
                        self::textarea_field('vidya_subtitle', 'Hero Description', 'A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.');
                        echo '<div class="ee-row">';
                        self::text_field('vidya_cta1_text', 'Primary CTA Text', 'Book Private Demo');
                        self::text_field('vidya_cta1_url', 'Primary CTA URL', '#demo');
                        self::text_field('vidya_cta2_text', 'Secondary CTA Text', 'Explore Platform');
                        self::text_field('vidya_cta2_url', 'Secondary CTA URL', '#platform');
                        echo '</div>';
                        self::text_field('vidya_final_cta', 'Bottom CTA Text', 'Get Started with VidyaAI');
                        ?>
                    </div>

                    <!-- ADMISSION CRM -->
                    <div class="ee-pane <?php echo $active === 'admcrm' ? 'active' : ''; ?>" data-pane="admcrm">
                        <h2>Admission CRM — Pipeline Visualization</h2>
                        <?php
                        self::text_field('adm_h2', 'Main Heading', 'Every admission. Tracked. Moving forward.');
                        self::textarea_field('adm_subheadline', 'Sub-heading', 'Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent lead prioritization ensures your team focuses on candidates that convert.');
                        echo '<div class="ee-row">';
                        self::text_field('adm_cta_text', 'CTA Button Text', 'Explore the Flow');
                        self::text_field('adm_cta_url', 'CTA Button URL', '#');
                        echo '</div>';
                        self::text_field('adm_closing', 'Closing Statement', 'Full visibility. Zero chaos. More conversions.');
                        ?>
                    </div>

                    <!-- MARKETING -->
                    <div class="ee-pane <?php echo $active === 'marketing' ? 'active' : ''; ?>" data-pane="marketing">
                        <h2>AI Admission Marketing System</h2>
                        <?php
                        self::text_field('mkt_status', 'Status Tag', 'AI Engine: Live Processing');
                        self::text_field('mkt_h2_part1', 'Heading (line 1)', 'Automate Every Inquiry.');
                        self::text_field('mkt_h2_part2', 'Heading Highlighted', 'Convert Every Student.');
                        self::textarea_field('mkt_subtext', 'Sub-text', 'From the first touchpoint to final enrollment, our AI-driven automation ensures no lead is left behind. Experience precision marketing that scales with your institution.');
                        self::text_field('mkt_card_title', 'Card Title', 'Scale Your Outreach With Precision');
                        self::textarea_field('mkt_description', 'Card Description', 'Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time.');
                        echo '<div class="ee-row">';
                        self::text_field('mkt_cta_text', 'CTA Button Text', 'Activate AI Automation');
                        self::text_field('mkt_cta_url', 'CTA Button URL', '#demo');
                        echo '</div>';
                        ?>
                    </div>

                    <!-- CHATBOT -->
                    <div class="ee-pane <?php echo $active === 'chatbot' ? 'active' : ''; ?>" data-pane="chatbot">
                        <h2>Chatbot & Live Chat for Admissions</h2>
                        <?php
                        self::text_field('bot_h2', 'Heading', 'Chatbot & Live Chat for Admissions');
                        self::textarea_field('bot_description', 'Description', 'Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations.');
                        self::text_field('bot_feat1', 'Feature 1', 'Automated Chat Workflow');
                        self::text_field('bot_feat2', 'Feature 2', 'Live Chat Enablement');
                        self::text_field('bot_feat3', 'Feature 3', 'Meeting Scheduler');
                        echo '<div class="ee-row">';
                        self::text_field('bot_cta_text', 'CTA Button Text', 'See Live Demo');
                        self::text_field('bot_cta_url', 'CTA Button URL', '#');
                        echo '</div>';
                        ?>
                    </div>

                    <!-- APP MGMT -->
                    <div class="ee-pane <?php echo $active === 'appmgmt' ? 'active' : ''; ?>" data-pane="appmgmt">
                        <h2>Application Management System</h2>
                        <?php
                        self::text_field('ams_status', 'Status Pill', 'SYSTEM STATUS: ACTIVE');
                        self::text_field('ams_h1_part1', 'Heading (line 1)', 'Turn Applications into Admissions.');
                        self::text_field('ams_h1_part2', 'Heading Highlighted', 'On Autopilot.');
                        self::textarea_field('ams_para1', 'Paragraph 1', 'Our Application Management System streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly.');
                        self::textarea_field('ams_para2', 'Paragraph 2', 'Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage, turning manual tasks into a hands-free, high-conversion workflow.');
                        echo '<div class="ee-row">';
                        self::text_field('ams_cta_text', 'CTA Button Text', 'Start Automating Now');
                        self::text_field('ams_cta_url', 'CTA Button URL', '#get-started');
                        echo '</div>';
                        self::image_field('ams_counselor_img', 'Counselor Avatar Image', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80');
                        ?>
                    </div>

                    <!-- WHATSAPP -->
                    <div class="ee-pane <?php echo $active === 'whatsapp' ? 'active' : ''; ?>" data-pane="whatsapp">
                        <h2>WhatsApp Business API</h2>
                        <?php
                        self::text_field('wa_h2_part1', 'Heading (line 1)', 'WhatsApp');
                        self::text_field('wa_h2_part2', 'Heading Highlighted', 'Business API');
                        self::textarea_field('wa_description', 'Description', 'WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM.');
                        self::text_field('wa_feat1_title', 'Feature 1 Title', 'Two-way WhatsApp and live chat');
                        self::text_field('wa_feat1_desc', 'Feature 1 Description', 'Enable real-time human connection alongside automation.');
                        self::text_field('wa_feat2_title', 'Feature 2 Title', 'Bulk WhatsApp & automated campaigns');
                        self::text_field('wa_feat2_desc', 'Feature 2 Description', 'Scale your outreach without losing the personal touch.');
                        self::text_field('wa_feat3_title', 'Feature 3 Title', 'Verified business account');
                        self::text_field('wa_feat3_desc', 'Feature 3 Description', 'Official green badge to build instant trust with applicants.');
                        echo '<div class="ee-row">';
                        self::text_field('wa_cta1_text', 'Primary CTA Text', 'Start Optimizing Now');
                        self::text_field('wa_cta1_url', 'Primary CTA URL', '#');
                        self::text_field('wa_cta2_text', 'Secondary CTA Text', 'View Case Studies');
                        self::text_field('wa_cta2_url', 'Secondary CTA URL', '#');
                        echo '</div>';
                        ?>
                    </div>

                    <!-- MOBILE CRM -->
                    <div class="ee-pane <?php echo $active === 'mobilecrm' ? 'active' : ''; ?>" data-pane="mobilecrm">
                        <h2>Mobile CRM</h2>
                        <?php
                        self::text_field('mcrm_badge', 'Badge Text', 'Next-Gen Mobility');
                        self::text_field('mcrm_h2_p1', 'Heading (part 1)', 'Mobile CRM: Powering');
                        self::text_field('mcrm_h2_em', 'Heading (highlighted)', 'Productivity');
                        self::text_field('mcrm_h2_p2', 'Heading (part 3)', 'on the Go');
                        self::textarea_field('mcrm_description', 'Description', 'Our Mobile CRM empowers work-from-home and field counselors to stay productive anywhere. Monitor visits, log activities, and complete follow-ups with real-time sync to your Admission CRM for intelligent, unified reporting.');
                        self::text_field('mcrm_feat1', 'Feature Pill 1', 'Click-To-Call');
                        self::text_field('mcrm_feat2', 'Feature Pill 2', 'Field Tracker');
                        self::text_field('mcrm_feat3', 'Feature Pill 3', 'Missed Call Lead Capture');
                        self::textarea_field('mcrm_note', 'Sync Note', 'Real-time sync with your Admission CRM ensures every interaction is captured for intelligent, unified reporting — zero data loss, always.');
                        ?>
                    </div>

                    <!-- CHOOSE US -->
                    <div class="ee-pane <?php echo $active === 'choose' ? 'active' : ''; ?>" data-pane="choose">
                        <h2>Why Institutes Choose ExtraaEdge</h2>
                        <?php
                        self::text_field('arch_eyebrow', 'Eyebrow', 'Admission Ecosystem');
                        self::text_field('arch_h2_p1', 'Heading (part 1)', 'Why Institutes Choose ExtraaEdge as the');
                        self::text_field('arch_h2_em', 'Heading (highlighted)', 'Architect');
                        self::text_field('arch_h2_p2', 'Heading (part 3)', 'of Their Admission Process?');
                        self::textarea_field('arch_subtext', 'Sub-text', 'Most Admission CRMs help you manage admissions. ExtraaEdge helps you design how admissions should work—end to end, at scale.');
                        self::text_field('arch_proof_text', 'Social Proof Text', 'Trusted by 500+ Leading Institutes');
                        ?>
                    </div>

                    <!-- RESPOND FIRST -->
                    <div class="ee-pane <?php echo $active === 'respond' ? 'active' : ''; ?>" data-pane="respond">
                        <h2>Respond First Hero</h2>
                        <?php
                        self::text_field('rf_eyebrow', 'Eyebrow', 'Admission Response Automation');
                        self::text_field('rf_h1_l1', 'Heading Line 1', 'Decrease Response Time.');
                        self::text_field('rf_h1_l2', 'Heading Line 2 (highlighted)', 'Respond First Using AI Agents.');
                        self::text_field('rf_h1_l3', 'Heading Line 3', 'Win Admissions.');
                        self::textarea_field('rf_copy', 'Body Copy', 'Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation—and the conversion. ExtraaEdge automatically captures inquiries from every source and initiates AI-powered calls instantly.');
                        echo '<div class="ee-row">';
                        self::text_field('rf_cta_text', 'CTA Button Text', 'Book a Demo');
                        self::text_field('rf_cta_url', 'CTA Button URL', '#');
                        echo '</div>';
                        self::text_field('rf_micro', 'Microcopy Below Button', 'See how institutes reduce response time by 90%');
                        ?>
                    </div>

                    <!-- BOOST CONVERSION -->
                    <div class="ee-pane <?php echo $active === 'boost' ? 'active' : ''; ?>" data-pane="boost">
                        <h2>Boost Conversion Rates</h2>
                        <?php
                        self::text_field('bc_badge', 'Top Badge', 'Boost Conversion Rates');
                        self::text_field('bc_h2_p1', 'Heading (part 1)', 'AI Decides the Right');
                        self::text_field('bc_h2_p2', 'Heading (part 2)', 'Admission Engagements.');
                        self::textarea_field('bc_subtext', 'Sub-text', 'ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who, when, and how to engage. Every interaction is timely, relevant, and context-aware.');
                        self::text_field('bc_f1_title', 'Feature 1 Title', 'Trigger-Based Email & SMS');
                        self::text_field('bc_f1_desc', 'Feature 1 Description', 'Automated personalized outreach triggered by student behavior thresholds.');
                        self::text_field('bc_f2_title', 'Feature 2 Title', 'AI Calling & Click-to-Call');
                        self::text_field('bc_f2_desc', 'Feature 2 Description', 'Intelligence-led queues that connect teams to high-intent leads instantly.');
                        self::text_field('bc_f3_title', 'Feature 3 Title', 'VidyaGPT AI Agents');
                        self::text_field('bc_f3_desc', 'Feature 3 Description', '24x7 admission counselors providing accurate, contextual answers instantly.');
                        self::text_field('bc_f4_title', 'Feature 4 Title', 'WhatsApp Communication');
                        self::text_field('bc_f4_desc', 'Feature 4 Description', 'Engage students where they are with official WhatsApp business API integration.');
                        ?>
                    </div>

                    <!-- CONVERT MORE -->
                    <div class="ee-pane <?php echo $active === 'convert' ? 'active' : ''; ?>" data-pane="convert">
                        <h2>Convert More</h2>
                        <?php
                        self::text_field('cm_eyebrow', 'Eyebrow', 'Convert More');
                        self::text_field('cm_h2_p1', 'Heading (part 1)', 'Turn Enquiries Into');
                        self::text_field('cm_h2_p2', 'Heading Highlighted', 'Enrollments');
                        self::text_field('cm_subtitle', 'Sub-title', 'Not every enquiry deserves the same attention.');
                        self::textarea_field('cm_description', 'Description', 'ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward. The result is higher efficiency and stronger enrollment conversions.');
                        echo '<div class="ee-row">';
                        self::text_field('cm_cta_text', 'CTA Button Text', 'Book a Demo');
                        self::text_field('cm_cta_url', 'CTA Button URL', '#');
                        echo '</div>';
                        ?>
                    </div>

                    <!-- ANALYTICS -->
                    <div class="ee-pane <?php echo $active === 'analytics' ? 'active' : ''; ?>" data-pane="analytics">
                        <h2>Intelligence Engine / Analytics</h2>
                        <?php
                        self::text_field('ie_badge', 'Badge', 'Measure your efforts');
                        self::text_field('ie_h2_p1', 'Heading (part 1)', "Know What's Working.");
                        self::text_field('ie_h2_p2', 'Heading Highlighted', "Fix What's Not.");
                        self::textarea_field('ie_description', 'Description', 'Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance. Track counselors, campaigns, and lead sources in one place. With Analytics Builder and VidyaGPT Analytics, insights are easier to explore and understand. So teams act faster on what\'s working and fix what\'s not.');
                        echo '<div class="ee-row">';
                        self::text_field('ie_cta_text', 'CTA Button Text', 'Book a Demo');
                        self::text_field('ie_cta_url', 'CTA Button URL', '#');
                        echo '</div>';
                        ?>
                    </div>

                    <!-- TESTIMONIALS -->
                    <div class="ee-pane <?php echo $active === 'stories' ? 'active' : ''; ?>" data-pane="stories">
                        <h2>CRM Impact Stories / Testimonials</h2>
                        <?php
                        self::text_field('st_tagline', 'Tagline', 'CRM Impact Stories');
                        self::text_field('st_h2_p1', 'Heading (line 1)', 'Powering Growth for');
                        self::text_field('st_h2_p2', 'Heading (line 2)', '500+ Happy Customers');
                        self::textarea_field('st_subtitle', 'Sub-title', 'From streamlined counselor workflows to data-driven reporting, see how education leaders are rewriting their success stories with ExtraaEdge.');
                        echo '<div class="ee-section-block"><h3>Metrics (4 stat cards)</h3>';
                        self::text_field('st_m1_num', 'Metric 1 Number', '500');
                        self::text_field('st_m1_lab', 'Metric 1 Label', 'Happy Customers');
                        self::text_field('st_m2_num', 'Metric 2 Number', '3');
                        self::text_field('st_m2_lab', 'Metric 2 Label', 'X Conversion Rate');
                        self::text_field('st_m3_num', 'Metric 3 Number', '15000');
                        self::text_field('st_m3_lab', 'Metric 3 Label', 'Daily Power Users');
                        self::text_field('st_m4_num', 'Metric 4 Number', '99');
                        self::text_field('st_m4_lab', 'Metric 4 Label', '% Support Rating');
                        echo '</div>';
                        for ($i = 1; $i <= 3; $i++) {
                            echo '<div class="ee-section-block"><h3>Testimonial #' . $i . '</h3>';
                            $d_name = array(1=>'Silky Jain Marwah', 'Pranay Rupani', 'K. Nirmala Devi');
                            $d_role = array(1=>'Executive Director', 'Head of Admissions & Marketing', 'Assistant Manager');
                            $d_inst = array(1=>"Tula's Institute", 'Annapurna College of Film & Media', 'Indian Academy Group');
                            $d_vid  = array(1=>'3SHgLf1GFgk', 'dWLdQ8E3FOU', 'yfK83D2SKps');
                            $d_pic  = array(
                                1=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp',
                                'https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp',
                                'https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp',
                            );
                            self::text_field("st_t{$i}_video", "YouTube Video ID", $d_vid[$i], 'Just the ID from youtu.be/XXXXX');
                            self::textarea_field("st_t{$i}_quote", "Quote", '');
                            self::text_field("st_t{$i}_name", "Author Name", $d_name[$i]);
                            self::text_field("st_t{$i}_role", "Role", $d_role[$i]);
                            self::text_field("st_t{$i}_inst", "Institute", $d_inst[$i]);
                            self::image_field("st_t{$i}_photo", "Author Photo", $d_pic[$i]);
                            echo '</div>';
                        }
                        ?>
                    </div>

                    <!-- FINAL CTA -->
                    <div class="ee-pane <?php echo $active === 'ctabox' ? 'active' : ''; ?>" data-pane="ctabox">
                        <h2>Final AI Demo CTA Section</h2>
                        <?php
                        self::text_field('ctab_h2', 'Heading', 'Ready to Move to an AI-Powered Admission CRM and Marketing Solution?');
                        self::text_field('ctab_subheadline', 'Sub-heading', 'Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.');
                        echo '<div class="ee-row">';
                        self::text_field('ctab_cta_text', 'CTA Button Text', 'Book a Demo');
                        self::text_field('ctab_cta_url', 'CTA Button URL', 'https://www.extraaedge.com/');
                        echo '</div>';
                        self::text_field('ctab_trust', 'Trust Indicator Text', 'Trusted by 250+ Premier Institutions Globally');
                        self::image_field('ctab_expert_img', 'Expert Centerpiece Image', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp');
                        ?>
                    </div>

                </div>
                <div class="ee-save-bar">
                    <?php submit_button('💾 Save All Changes', 'primary large'); ?>
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
