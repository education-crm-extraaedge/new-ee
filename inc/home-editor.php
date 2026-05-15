<?php
/**
 * Home Page Editor — product-editor style admin UI
 * Settings → 🏠 Home Page Editor
 * Storage: ee_home_settings (single option, associative array)
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
        add_action('admin_head', array(__CLASS__, 'print_admin_styles'));
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
        wp_enqueue_script('jquery');
    }

    public static function print_admin_styles() {
        $screen = function_exists('get_current_screen') ? get_current_screen() : null;
        if (!$screen || $screen->id !== 'settings_page_' . self::PAGE_SLUG) return;
        echo "\n<style id=\"ee-home-editor-css\">\n" . self::admin_css() . "\n</style>\n";
    }

    public static function admin_css() {
        return '
        .home-editor-wrap{max-width:100%;margin:20px 20px 20px 0}
        .home-editor-wrap h1.title{font-size:23px;font-weight:600;color:#1d2327;margin:0 0 6px;padding:0;display:flex;align-items:center;gap:8px}
        .home-editor-wrap .subtitle{color:#646970;font-size:13px;margin:0 0 18px}
        .home-editor-wrap .preview-link{margin-left:auto;font-size:13px;text-decoration:none}

        /* Horizontal scroll tab bar — single row exactly like product editor */
        .home-tabs-wrapper{margin-top:20px}
        .home-tabs-scroller{position:relative;background:#f0f0f0;border-bottom:1px solid #ccc}
        .home-tabs{display:flex;flex-wrap:nowrap;overflow-x:auto;overflow-y:hidden;margin:0;padding:0;background:#f0f0f0;scrollbar-width:thin;scrollbar-color:#bbb #f0f0f0;scroll-behavior:smooth}
        .home-tabs::-webkit-scrollbar{height:6px}
        .home-tabs::-webkit-scrollbar-track{background:#f0f0f0}
        .home-tabs::-webkit-scrollbar-thumb{background:#bbb;border-radius:3px}
        .home-tabs::-webkit-scrollbar-thumb:hover{background:#999}
        .home-tabs li{list-style:none;margin:0;padding:0;flex:0 0 auto}
        .home-tabs a{display:block;padding:12px 20px;text-decoration:none;background:#f0f0f0;color:#333;border-right:1px solid #ccc;font-weight:600;font-size:13px;line-height:1;white-space:nowrap}
        .home-tabs a:hover{background:#e0e0e0;color:#0073aa}
        .home-tabs a:focus{box-shadow:none;outline:1px solid #2271b1}
        .home-tabs a.active{background:#fff;color:#0073aa;border-bottom:2px solid #0073aa;margin-bottom:-1px}

        /* Edge fade hints when more tabs exist off-screen */
        .home-tabs-scroller::before,.home-tabs-scroller::after{content:"";position:absolute;top:0;bottom:0;width:24px;pointer-events:none;z-index:2;opacity:0;transition:opacity .2s}
        .home-tabs-scroller::before{left:0;background:linear-gradient(90deg,#f0f0f0,transparent)}
        .home-tabs-scroller::after{right:0;background:linear-gradient(270deg,#f0f0f0,transparent)}
        .home-tabs-scroller.has-left-scroll::before{opacity:1}
        .home-tabs-scroller.has-right-scroll::after{opacity:1}

        .home-tab-content{display:none;padding:20px;background:#fff;border:1px solid #ccc;border-top:none}
        .home-tab-content.active{display:block}
        .home-tab-content h3{margin:0 0 18px;color:#1d2327;font-size:18px;font-weight:600;display:flex;align-items:center;gap:6px}

        .home-tab-content h4{margin:24px 0 12px;color:#0073aa;border-bottom:1px solid #ddd;padding-bottom:8px;font-size:14px;font-weight:600}
        .home-tab-content h4:first-of-type{margin-top:0}

        .repeater-item{background:#f9f9f9;border:1px solid #ddd;padding:15px;margin-bottom:15px;position:relative;border-radius:4px}
        .repeater-item > h4{margin-top:0;color:#0073aa;border-bottom:1px solid #ddd;padding-bottom:10px}
        .remove-item{position:absolute;top:10px;right:10px;color:#a00;cursor:pointer;text-decoration:none;font-weight:bold}
        .remove-item:hover{color:#dc3232}

        .field-group{margin-bottom:15px}
        .field-group label{display:block;font-weight:600;margin-bottom:5px;color:#333;font-size:13px}
        .field-group input[type="text"],.field-group input[type="url"],.field-group textarea,.field-group select{width:100%;padding:8px;border:1px solid #ddd;border-radius:3px;box-sizing:border-box;font-size:13px}
        .field-group input[type="text"]:focus,.field-group input[type="url"]:focus,.field-group textarea:focus{outline:none;border-color:#2271b1;box-shadow:0 0 0 1px #2271b1}
        .field-group textarea{min-height:80px;font-family:inherit}
        .field-help{font-size:12px;color:#666;font-style:italic;margin:5px 0 0;line-height:1.5}
        .field-help code{background:#f0f0f1;padding:1px 5px;border-radius:3px;font-style:normal;font-size:12px}

        .field-row{display:grid;grid-template-columns:1fr 1fr;gap:18px}
        @media(max-width:782px){.field-row{grid-template-columns:1fr}}

        .image-field .img-row{display:flex;gap:14px;align-items:flex-start}
        .image-field .thumb{width:120px;height:80px;background:#f0f0f1 50%/contain no-repeat;border:1px solid #ddd;border-radius:4px;flex-shrink:0}
        .image-field .img-controls{flex:1;display:flex;flex-direction:column;gap:6px}
        .image-field .pick-btn{background:#f6f7f7;border:1px solid #c5d9ed;color:#0073aa;padding:6px 12px;cursor:pointer;border-radius:3px;font-size:12px;font-weight:600;width:fit-content}
        .image-field .pick-btn:hover{background:#f0f6fc}

        .save-bar{position:sticky;bottom:0;background:#fff;border:1px solid #ccc;border-top:2px solid #0073aa;padding:14px 24px;margin-top:0;display:flex;align-items:center;justify-content:space-between;border-radius:0 0 4px 4px;box-shadow:0 -4px 12px rgba(0,0,0,.05)}
        .save-bar .tip{color:#646970;font-size:12px}
        .save-bar .tip b{color:#1d2327}

        .updated-notice{background:#edfaef;border-left:4px solid #00a32a;padding:10px 14px;margin:0 0 18px;color:#1d2327;border-radius:0 4px 4px 0}
        ';
    }

    public static function tabs() {
        return array(
            'seo'       => array('🔍', 'SEO & Meta', 'Page title, meta description, OG image, Twitter card — controls how the home page appears in Google, social shares, and browser tabs'),
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
        ?>
        <div class="field-group">
            <label><?php echo esc_html($label); ?></label>
            <input type="text" name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" placeholder="<?php echo esc_attr($default); ?>">
            <?php if ($help): ?><p class="field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
        </div>
        <?php
    }

    public static function textarea_field($key, $num, $label, $help = '', $default = '', $where = '') {
        $val = self::get($key, '');
        ?>
        <div class="field-group">
            <label><?php echo esc_html($label); ?></label>
            <textarea name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" rows="3" placeholder="<?php echo esc_attr($default); ?>"><?php echo esc_textarea($val); ?></textarea>
            <?php if ($help): ?><p class="field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
        </div>
        <?php
    }

    public static function image_field($key, $num, $label, $help = '', $default = '') {
        $val  = self::get($key, '');
        $show = $val ?: $default;
        ?>
        <div class="field-group image-field">
            <label>🖼 <?php echo esc_html($label); ?></label>
            <div class="img-row">
                <div class="thumb" style="background-image:url(<?php echo esc_url($show); ?>)"></div>
                <div class="img-controls">
                    <input type="url" name="<?php echo esc_attr(self::OPTION_KEY); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" placeholder="<?php echo esc_attr($default); ?>" class="img-input">
                    <button type="button" class="pick-btn">📁 Choose from Media Library</button>
                </div>
            </div>
            <?php if ($help): ?><p class="field-help"><?php echo wp_kses_post($help); ?></p><?php endif; ?>
        </div>
        <?php
    }

    public static function pair_row($cb) { echo '<div class="field-row">'; $cb(); echo '</div>'; }

    public static function group_heading($title, $badge = '') {
        echo '<h4>' . esc_html($title);
        if ($badge) echo '<span class="badge">' . esc_html($badge) . '</span>';
        echo '</h4>';
    }

    public static function render_page() {
        if (!current_user_can('manage_options')) wp_die('Access denied');
        $tabs     = self::tabs();
        $active   = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? $_GET['tab'] : 'hero';
        $home_url = home_url('/');
        $saved    = isset($_GET['settings-updated']) && $_GET['settings-updated'];
        ?>
        <style id="ee-home-editor-inline-css">
        <?php echo self::admin_css(); ?>
        </style>
        <div class="wrap home-editor-wrap">
            <h1 class="title">🏠 Home Page Editor
                <a href="<?php echo esc_url($home_url); ?>" target="_blank" class="preview-link">👁 View Live Home Page →</a>
            </h1>
            <p class="subtitle">Edit every section of your home page. Pick any tab below — your changes save together.</p>

            <?php if ($saved): ?>
                <div class="updated-notice">✓ All changes saved successfully.</div>
            <?php endif; ?>

            <form method="post" action="options.php">
                <?php settings_fields('ee_home_group'); ?>

                <div class="home-tabs-wrapper">
                    <div class="home-tabs-scroller">
                        <ul class="home-tabs" id="home-tabs">
                            <?php $n = 1; foreach ($tabs as $slug => $info): ?>
                                <li><a href="#" data-tab="tab-<?php echo esc_attr($slug); ?>" class="<?php echo $slug === $active ? 'active' : ''; ?>"><?php echo esc_html($info[0]); ?> <?php echo esc_html($info[1]); ?></a></li>
                            <?php $n++; endforeach; ?>
                        </ul>
                    </div>

                    <?php foreach ($tabs as $slug => $info):
                        $is_active = $slug === $active;
                        ?>
                        <div id="tab-<?php echo esc_attr($slug); ?>" class="home-tab-content <?php echo $is_active ? 'active' : ''; ?>">
                            <h3><?php echo esc_html($info[0]); ?> <?php echo esc_html($info[1]); ?></h3>
                            <?php self::render_pane_fields($slug); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="save-bar">
                    <div class="tip">💡 <b>Tip:</b> Switch between tabs freely. One click on Save stores every section at once.</div>
                    <?php submit_button('💾 Save All Changes', 'primary', 'submit', false); ?>
                </div>
            </form>
        </div>

        <script>
        jQuery(document).ready(function($){
            var $tabsEl   = $('#home-tabs');
            var $scroller = $('.home-tabs-scroller');

            function updateEdgeHints(){
                if (!$tabsEl.length) return;
                var el = $tabsEl[0];
                $scroller.toggleClass('has-left-scroll',  el.scrollLeft > 4);
                $scroller.toggleClass('has-right-scroll', el.scrollLeft + el.clientWidth < el.scrollWidth - 4);
            }
            $tabsEl.on('scroll', updateEdgeHints);
            $(window).on('resize', updateEdgeHints);
            updateEdgeHints();

            // Center active tab in the scroller on load
            function scrollActiveIntoView(){
                var $a = $tabsEl.find('a.active');
                if (!$a.length) return;
                var el      = $tabsEl[0];
                var aLeft   = $a[0].offsetLeft;
                var aWidth  = $a[0].offsetWidth;
                el.scrollLeft = aLeft - (el.clientWidth - aWidth) / 2;
                updateEdgeHints();
            }
            scrollActiveIntoView();

            $('.home-tabs a').on('click', function(e){
                e.preventDefault();
                var target = $(this).data('tab');
                $('.home-tabs a').removeClass('active');
                $(this).addClass('active');
                $('.home-tab-content').removeClass('active');
                $('#' + target).addClass('active');
                var slug = target.replace(/^tab-/, '');
                history.replaceState(null, '', '?page=<?php echo self::PAGE_SLUG; ?>&tab=' + slug);
                // Smooth-scroll the clicked tab into view
                var $a = $(this);
                var el = $tabsEl[0];
                var newLeft = $a[0].offsetLeft - (el.clientWidth - $a[0].offsetWidth) / 2;
                $tabsEl.stop().animate({ scrollLeft: newLeft }, 250, updateEdgeHints);
                $('html,body').animate({ scrollTop: $('.home-tabs-wrapper').offset().top - 40 }, 220);
            });

            $(document).on('click', '.image-field .pick-btn', function(e){
                e.preventDefault();
                var btn   = $(this);
                var row   = btn.closest('.img-row');
                var input = row.find('.img-input');
                var thumb = row.find('.thumb');
                var frame = wp.media({ title:'Choose Image', multiple:false, library:{ type:'image' } });
                frame.on('select', function(){
                    var att = frame.state().get('selection').first().toJSON();
                    input.val(att.url);
                    thumb.css('background-image', 'url(' + att.url + ')');
                });
                frame.open();
            });

            $(document).on('input', '.image-field .img-input', function(){
                var url = $(this).val();
                $(this).closest('.img-row').find('.thumb').css('background-image', url ? 'url(' + url + ')' : 'none');
            });
        });
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
            case 'seo':
                self::group_heading('🌐 Page Title & Description', 'Browser + Google');
                self::text_field('seo_page_title', '1', 'Page Title (browser tab + Google result)', 'Shown in browser tab and as the blue link in Google search. Best length: 50–60 characters.', 'ExtraaEdge — Powering Smarter Admissions with AI', 'Browser Title');
                self::textarea_field('seo_meta_description', '2', 'Meta Description', 'Grey snippet shown under the title in Google search results. Best length: 150–160 characters.', 'ExtraaEdge is India\'s #1 AI-powered Admission CRM trusted by 500+ institutes. Automate inquiries, score leads, boost enrolments. Book a free demo.', 'Google Snippet');
                self::text_field('seo_meta_keywords', '3', 'Meta Keywords (optional)', 'Comma-separated keywords. Most search engines ignore this today, but kept for legacy crawlers.', 'admission CRM, education CRM, AI admission software, lead scoring, ExtraaEdge', 'Keywords');

                self::group_heading('📘 Open Graph (Facebook / WhatsApp / LinkedIn share preview)', 'Social');
                self::text_field('seo_og_title', '4', 'OG Title', 'Shown when the URL is shared on Facebook, WhatsApp, LinkedIn. Falls back to Page Title if blank.', 'ExtraaEdge — #1 Admission CRM | AI-Powered Enrolments', 'Share Title');
                self::textarea_field('seo_og_description', '5', 'OG Description', 'Description in social share preview. Falls back to Meta Description if blank.', '500+ institutes trust ExtraaEdge for AI admissions CRM, lead scoring, smart follow-ups & counselor intelligence. Start your free demo.', 'Share Description');
                self::image_field('seo_og_image', '6', 'OG Image (1200×630px)', 'Picture shown in the share card. <b>1200×630px PNG/JPG recommended</b>. Less than 8 MB. If blank, uses default <code>extraaedge-og-default.png</code>.', 'https://www.extraaedge.com/wp-content/uploads/2024/12/extraaedge-og-default.png');

                self::group_heading('🐦 Twitter / X Card', 'Social');
                self::text_field('seo_twitter_title', '7', 'Twitter Title', 'Falls back to OG Title if blank.', 'ExtraaEdge — #1 Admission CRM | AI-Powered Enrolments', 'Tweet Title');
                self::textarea_field('seo_twitter_description', '8', 'Twitter Description', 'Falls back to OG Description if blank.', '500+ institutes trust ExtraaEdge for AI admissions CRM, lead scoring & counselor intelligence. Book a free demo.', 'Tweet Description');
                self::image_field('seo_twitter_image', '9', 'Twitter Image', 'Same dimensions as OG Image (1200×630px). Falls back to OG Image if blank.', 'https://www.extraaedge.com/wp-content/uploads/2024/12/extraaedge-og-default.png');
                break;

            case 'hero':
                self::group_heading('🏆 Top Trust Badge');
                self::text_field('hero_badge', '1', 'Trust Badge Text', 'Small chip that appears <b>above</b> the headline — perfect for social proof like "Trusted by X institutes".', 'Loved by Leading Top 500+ Admission Teams', 'Hero Top');

                self::group_heading('📢 Main Headline (H1)');
                self::text_field('hero_h1_part1', '2', 'Headline Line 1 (DARK BLUE)', 'The first part of the large headline — rendered in dark blue.', 'Convert More Students.', 'Hero Headline');
                self::text_field('hero_h1_part2', '3', 'Headline Line 2 (ORANGE)', 'The second part — appears on a new line in orange.', 'Automatically.', 'Hero Headline');

                self::group_heading('📝 Description Texts');
                self::text_field('hero_supporting', '4', 'Supporting Heading', 'A bold medium-sized line below the headline.', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams', 'Below Headline');
                self::textarea_field('hero_subtext', '5', 'Sub-text Paragraph', 'Short paragraph (2-3 lines) explaining the core benefit of your product.', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.', 'Description');

                self::group_heading('🔘 Call To Action Button', 'IMPORTANT');
                self::pair_row(function(){
                    self::text_field('hero_cta_text', '6', 'Button Text', 'Label shown on the <b>orange button</b> — the primary action.', 'Book Demo', 'CTA Button');
                    self::text_field('hero_cta_url', '7', 'Button Click URL', 'Where the button takes the visitor. Example: <code>/book-demo/</code>', '#demo', 'Button Link');
                });

                self::group_heading('🟢 Live Counter (Animated)');
                self::pair_row(function(){
                    self::text_field('hero_counter', '8', 'Starting Number', 'The number the counter starts at — it auto-increments on the live page.', '412', 'Live Stats');
                    self::text_field('hero_counter_label', '9', 'Counter Label', 'Text shown after the number.', 'Students Converted Today', 'Live Stats');
                });
                break;

            case 'logos':
                self::group_heading('📌 Section Headings');
                self::text_field('logos_badge', '1', 'Top Badge', 'Small label above the heading.', 'Leading Institutions', 'Section Top');
                self::text_field('logos_heading', '2', 'Main Heading (H2)', 'Large heading shown above the logos.', 'Trusted by 500+ Institutions Growing Faster Than Ever', 'H2');
                self::text_field('logos_subheading', '3', 'Sub-heading', 'Supporting line below the heading.', 'AI-powered automation for the next generation of education leaders.', 'Below Heading');

                self::group_heading('🔘 Bottom CTA');
                self::pair_row(function(){
                    self::text_field('logos_cta_text', '4', 'Button Text', '', 'Start Converting Today', 'CTA');
                    self::text_field('logos_cta_url', '5', 'Button URL', '', '#get-started', 'CTA');
                });
                self::text_field('logos_live_text', '6', 'Live Indicator Text', 'Text shown next to the green pulse dot.', 'Live: +124 Admissions Processed in last 1hr', 'Indicator');

                self::group_heading('⬅ Track 1 — 8 Logos (Left moving)', 'Track 1');
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
                    echo '<div class="repeater-item"><h4>Logo ' . $i . '</h4>';
                    self::image_field("logo_t1_{$i}_url", $i, "Logo $i", "Recommended: transparent PNG or SVG, around 200x100px.", $parts[0]);
                    self::text_field("logo_t1_{$i}_alt", '', 'Alt text', 'Image alt attribute (SEO + accessibility).', $parts[1], '');
                    echo '</div>';
                }

                self::group_heading('➡ Track 2 — 7 Logos (Right moving)', 'Track 2');
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
                    echo '<div class="repeater-item"><h4>Logo ' . $i . '</h4>';
                    self::image_field("logo_t2_{$i}_url", $i, "Logo $i", "Recommended: transparent PNG or SVG, around 200x100px.", $parts[0]);
                    self::text_field("logo_t2_{$i}_alt", '', 'Alt text', '', $parts[1], '');
                    echo '</div>';
                }
                break;

            case 'vidyaai':
                self::group_heading('🏷 Badge & Heading');
                self::text_field('vidya_badge', '1', 'Top Badge', '', 'VidyaAI Admission Intelligence', 'Badge');
                self::pair_row(function(){
                    self::text_field('vidya_h1_part1', '2', 'Heading Line 1', '', 'Powerful Admission CRM', 'H2');
                    self::text_field('vidya_h1_part2', '3', 'Heading Highlight', 'Second line rendered in a blue-to-orange gradient.', 'with simplicity.', 'H2');
                });
                self::textarea_field('vidya_subtitle', '4', 'Description', '', 'A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.', 'Description');

                self::group_heading('🔘 Hero CTAs (two buttons)');
                self::pair_row(function(){
                    self::text_field('vidya_cta1_text', '5', 'Primary Button', '', 'Book Private Demo', 'Primary CTA');
                    self::text_field('vidya_cta1_url', '6', 'Primary URL', '', '#demo', 'Primary CTA');
                });
                self::pair_row(function(){
                    self::text_field('vidya_cta2_text', '7', 'Secondary Button', '', 'Explore Platform', 'Secondary CTA');
                    self::text_field('vidya_cta2_url', '8', 'Secondary URL', '', '#platform', 'Secondary CTA');
                });

                self::group_heading('1️⃣ Stage 01 — AI Admission Assist', 'Sub-section 1');
                self::pair_row(function(){
                    self::text_field('vidya_s1_num', '', 'Step Number', '', '01.', 'Step badge');
                    self::text_field('vidya_s1_title', '', 'Stage Title', '', 'AI Admission Assist', 'H2');
                });
                self::textarea_field('vidya_s1_desc', '', 'Stage Description', '', '24×7 AI that answers student queries, guides applications, and supports counselors with live context to keep admissions moving without delays.', 'Body');
                self::pair_row(function(){
                    self::text_field('vidya_s1_box1_title', '', 'Box 1 Title', '', 'Instant Guide', 'Card 1');
                    self::text_field('vidya_s1_box1_desc',  '', 'Box 1 Description', '', 'Answers eligibility and fee queries instantly.', 'Card 1');
                });
                self::pair_row(function(){
                    self::text_field('vidya_s1_box2_title', '', 'Box 2 Title', '', 'Doc Assist', 'Card 2');
                    self::text_field('vidya_s1_box2_desc',  '', 'Box 2 Description', '', 'Guides students through complex upload processes.', 'Card 2');
                });

                self::group_heading('2️⃣ Stage 02 — AI Lead Intent Scoring', 'Sub-section 2');
                self::pair_row(function(){
                    self::text_field('vidya_s2_num', '', 'Step Number', '', '02.', 'Step badge');
                    self::text_field('vidya_s2_title', '', 'Stage Title', '', 'AI Lead Intent Scoring', 'H2');
                });
                self::textarea_field('vidya_s2_desc', '', 'Stage Description', '', 'Automatically prioritizes high-intent leads using behavior and funnel signals so counselors focus only where conversions are most likely.', 'Body');
                self::pair_row(function(){
                    self::text_field('vidya_s2_lift_label', '', 'Stat Label', 'Small uppercase label on the dark blue card.', 'Predictive Lift', 'Card label');
                    self::text_field('vidya_s2_lift_value', '', 'Stat Value', 'Large orange number on the right.', '+340%', 'Card value');
                });
                self::textarea_field('vidya_s2_lift_body', '', 'Stat Body Copy', '', 'High-intent leads are flagged in real-time based on session duration, page depth, and interaction frequency.', 'Card body');

                self::group_heading('3️⃣ Stage 03 — Smart Follow-up Intelligence', 'Sub-section 3');
                self::pair_row(function(){
                    self::text_field('vidya_s3_num', '', 'Step Number', '', '03.', 'Step badge');
                    self::text_field('vidya_s3_title', '', 'Stage Title', '', 'Smart Follow-up Intelligence', 'H2');
                });
                self::textarea_field('vidya_s3_desc', '', 'Stage Description', '', 'AI tells your team who to follow up with, when to act, and what to do next, improving response speed and reducing missed opportunities.', 'Body');
                self::text_field('vidya_s3_li1', '', 'List item 1 (green dot)', '', 'Automated multi-channel sequencing', 'Bullet');
                self::text_field('vidya_s3_li2', '', 'List item 2 (blue dot)', '', "Predictive 'Next Best Action' engine", 'Bullet');

                self::group_heading('4️⃣ Stage 04 — AI Calling for Qualification & Scale', 'Sub-section 4');
                self::pair_row(function(){
                    self::text_field('vidya_s4_num', '', 'Step Number', '', '04.', 'Step badge');
                    self::text_field('vidya_s4_title', '', 'Stage Title', '', 'AI Calling for Qualification & Scale', 'H2');
                });
                self::textarea_field('vidya_s4_desc', '', 'Stage Description', '', 'AI-powered calling qualifies large volumes of inquiries, captures intent, and passes only serious prospects to counselors at scale.', 'Body');

                self::group_heading('5️⃣ Stage 05 — Counselor Performance Intelligence', 'Sub-section 5');
                self::pair_row(function(){
                    self::text_field('vidya_s5_num', '', 'Step Number', '', '05.', 'Step badge');
                    self::text_field('vidya_s5_title', '', 'Stage Title', '', 'Counselor Performance Intelligence', 'H2');
                });
                self::textarea_field('vidya_s5_desc', '', 'Stage Description', '', 'Clear visibility into response times, follow-ups, and conversion impact by counselor to drive focused coaching and better outcomes.', 'Body');

                self::group_heading('🏁 Final CTA');
                self::text_field('vidya_final_cta', '9', 'Bottom Orange Button', 'Bottom CTA label at the end of the section.', 'Get Started with VidyaAI', 'Bottom CTA');
                break;

            case 'admcrm':
                self::group_heading('📝 Heading & Subtitle');
                self::text_field('adm_h2', '1', 'Main Heading', '', 'Every admission. Tracked. Moving forward.', 'H2');
                self::textarea_field('adm_subheadline', '2', 'Sub-heading paragraph', '', 'Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent lead prioritization ensures your team focuses on candidates that convert.', 'Description');

                self::group_heading('🔘 Bottom CTA');
                self::pair_row(function(){
                    self::text_field('adm_cta_text', '3', 'CTA Text', '', 'Explore the Flow', 'CTA');
                    self::text_field('adm_cta_url', '4', 'CTA URL', '', '#', 'CTA');
                });
                self::text_field('adm_closing', '5', 'Closing Tagline', 'All-caps tagline below the button.', 'Full visibility. Zero chaos. More conversions.', 'Closing');
                break;

            case 'marketing':
                self::group_heading('📌 Top Section');
                self::text_field('mkt_status', '1', 'Status Tag (with green pulse dot)', '', 'AI Engine: Live Processing', 'Status Tag');
                self::pair_row(function(){
                    self::text_field('mkt_h2_part1', '2', 'Heading Line 1', '', 'Automate Every Inquiry.', 'H2');
                    self::text_field('mkt_h2_part2', '3', 'Heading Line 2 (Orange)', '', 'Convert Every Student.', 'H2');
                });
                self::textarea_field('mkt_subtext', '4', 'Subtext', '', 'From the first touchpoint to final enrollment, our AI-driven automation ensures no lead is left behind. Experience precision marketing that scales with your institution.', 'Description');

                self::group_heading('🃏 Marketing Card');
                self::text_field('mkt_card_title', '5', 'Card Title', '', 'Scale Your Outreach With Precision', 'Card');
                self::textarea_field('mkt_description', '6', 'Card Description', '', 'Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time.', 'Card Body');

                self::group_heading('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('mkt_cta_text', '7', 'CTA Text', '', 'Activate AI Automation', 'CTA');
                    self::text_field('mkt_cta_url', '8', 'CTA URL', '', '#demo', 'CTA');
                });
                break;

            case 'chatbot':
                self::group_heading('📝 Heading');
                self::text_field('bot_h2', '1', 'Heading (H2)', '', 'Chatbot & Live Chat for Admissions', 'H2');
                self::textarea_field('bot_description', '2', 'Description', '', 'Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations.', 'Body');

                self::group_heading('✓ Feature List');
                self::text_field('bot_feat1', '3', 'Feature 1', '', 'Automated Chat Workflow', 'Feature');
                self::text_field('bot_feat2', '4', 'Feature 2', '', 'Live Chat Enablement', 'Feature');
                self::text_field('bot_feat3', '5', 'Feature 3', '', 'Meeting Scheduler', 'Feature');

                self::group_heading('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('bot_cta_text', '6', 'Button Text', '', 'See Live Demo', 'CTA');
                    self::text_field('bot_cta_url', '7', 'Button URL', '', '#', 'CTA');
                });
                break;

            case 'appmgmt':
                self::group_heading('📌 Top');
                self::text_field('ams_status', '1', 'Status Pill', '', 'SYSTEM STATUS: ACTIVE', 'Status Pill');
                self::pair_row(function(){
                    self::text_field('ams_h1_part1', '2', 'Heading Line 1', '', 'Turn Applications into Admissions.', 'H2');
                    self::text_field('ams_h1_part2', '3', 'Heading Line 2 (Orange)', '', 'On Autopilot.', 'H2');
                });
                self::textarea_field('ams_para1', '4', 'Paragraph 1', '', 'Our Application Management System streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly.', 'Body');
                self::textarea_field('ams_para2', '5', 'Paragraph 2', '', 'Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage, turning manual tasks into a hands-free, high-conversion workflow.', 'Body');

                self::group_heading('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('ams_cta_text', '6', 'CTA Text', '', 'Start Automating Now', 'CTA');
                    self::text_field('ams_cta_url', '7', 'CTA URL', '', '#get-started', 'CTA');
                });

                self::group_heading('🧑‍💼 Counselor Avatar');
                self::image_field('ams_counselor_img', '8', 'Step 3 Counselor Photo', 'Round avatar shown inside the GD-PI counseling step.', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80');
                break;

            case 'whatsapp':
                self::group_heading('📌 Top');
                self::pair_row(function(){
                    self::text_field('wa_h2_part1', '1', 'Heading Line 1', '', 'WhatsApp', 'H2');
                    self::text_field('wa_h2_part2', '2', 'Heading Line 2 (Orange)', '', 'Business API', 'H2');
                });
                self::textarea_field('wa_description', '3', 'Description', '', 'WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM.', 'Body');

                self::group_heading('🃏 Feature 1');
                self::text_field('wa_feat1_title', '4', 'Title', '', 'Two-way WhatsApp and live chat', 'Card 1');
                self::text_field('wa_feat1_desc', '5', 'Description', '', 'Enable real-time human connection alongside automation.', 'Card 1');

                self::group_heading('🃏 Feature 2');
                self::text_field('wa_feat2_title', '6', 'Title', '', 'Bulk WhatsApp & automated campaigns', 'Card 2');
                self::text_field('wa_feat2_desc', '7', 'Description', '', 'Scale your outreach without losing the personal touch.', 'Card 2');

                self::group_heading('🃏 Feature 3');
                self::text_field('wa_feat3_title', '8', 'Title', '', 'Verified business account', 'Card 3');
                self::text_field('wa_feat3_desc', '9', 'Description', '', 'Official green badge to build instant trust with applicants.', 'Card 3');

                self::group_heading('🔘 CTAs (two buttons)');
                self::pair_row(function(){
                    self::text_field('wa_cta1_text', '10', 'Primary', '', 'Start Optimizing Now', 'CTA 1');
                    self::text_field('wa_cta1_url', '11', 'URL', '', '#', 'CTA 1');
                });
                self::pair_row(function(){
                    self::text_field('wa_cta2_text', '12', 'Secondary', '', 'View Case Studies', 'CTA 2');
                    self::text_field('wa_cta2_url', '13', 'URL', '', '#', 'CTA 2');
                });
                break;

            case 'mobilecrm':
                self::group_heading('🏷 Heading');
                self::text_field('mcrm_badge', '1', 'Top Badge', '', 'Next-Gen Mobility', 'Badge');
                self::pair_row(function(){
                    self::text_field('mcrm_h2_p1', '2', 'Heading Part 1', '', 'Mobile CRM: Powering', 'H2');
                    self::text_field('mcrm_h2_em', '3', 'Heading Highlight', 'Word that gets the orange underline.', 'Productivity', 'H2');
                });
                self::text_field('mcrm_h2_p2', '4', 'Heading Part 3', '', 'on the Go', 'H2');
                self::textarea_field('mcrm_description', '5', 'Description', '', 'Our Mobile CRM empowers work-from-home and field counselors to stay productive anywhere. Monitor visits, log activities, and complete follow-ups with real-time sync to your Admission CRM for intelligent, unified reporting.', 'Body');

                self::group_heading('💊 Feature Pills');
                self::text_field('mcrm_feat1', '6', 'Pill 1', '', 'Click-To-Call', 'Pill');
                self::text_field('mcrm_feat2', '7', 'Pill 2', '', 'Field Tracker', 'Pill');
                self::text_field('mcrm_feat3', '8', 'Pill 3', '', 'Missed Call Lead Capture', 'Pill');

                self::group_heading('✅ Sync Note (green box)');
                self::textarea_field('mcrm_note', '9', 'Sync Note Text', '', 'Real-time sync with your Admission CRM ensures every interaction is captured for intelligent, unified reporting — zero data loss, always.', 'Green Note');
                break;

            case 'choose':
                self::group_heading('🏷 Top Heading');
                self::text_field('arch_eyebrow', '1', 'Eyebrow Text', '', 'Admission Ecosystem', 'Eyebrow');
                self::pair_row(function(){
                    self::text_field('arch_h2_p1', '2', 'Heading Part 1', '', 'Why Institutes Choose ExtraaEdge as the', 'H2');
                    self::text_field('arch_h2_em', '3', 'Highlight Word', '', 'Architect', 'H2');
                });
                self::text_field('arch_h2_p2', '4', 'Heading Part 3', '', 'of Their Admission Process?', 'H2');
                self::textarea_field('arch_subtext', '5', 'Sub-text', '', 'Most Admission CRMs help you manage admissions. ExtraaEdge helps you design how admissions should work—end to end, at scale.', 'Description');

                self::group_heading('👥 Social Proof Strip');
                self::text_field('arch_proof_text', '6', 'Social Proof Label', '', 'Trusted by 500+ Leading Institutes', 'Bottom Strip');
                break;

            case 'respond':
                self::group_heading('📝 Heading');
                self::text_field('rf_eyebrow', '1', 'Eyebrow', '', 'Admission Response Automation', 'Eyebrow');
                self::text_field('rf_h1_l1', '2', 'Heading Line 1', '', 'Decrease Response Time.', 'H2');
                self::text_field('rf_h1_l2', '3', 'Heading Line 2 (ORANGE)', '', 'Respond First Using AI Agents.', 'H2');
                self::text_field('rf_h1_l3', '4', 'Heading Line 3', '', 'Win Admissions.', 'H2');
                self::textarea_field('rf_copy', '5', 'Body Copy', '', 'Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation—and the conversion. ExtraaEdge automatically captures inquiries from every source and initiates AI-powered calls instantly.', 'Body');

                self::group_heading('🔘 CTA & Microcopy');
                self::pair_row(function(){
                    self::text_field('rf_cta_text', '6', 'Button Text', '', 'Book a Demo', 'CTA');
                    self::text_field('rf_cta_url', '7', 'Button URL', '', '#', 'CTA');
                });
                self::text_field('rf_micro', '8', 'Microcopy', '', 'See how institutes reduce response time by 90%', 'Microcopy');
                break;

            case 'boost':
                self::group_heading('🏷 Top Heading');
                self::text_field('bc_badge', '1', 'Top Badge', '', 'Boost Conversion Rates', 'Badge');
                self::pair_row(function(){
                    self::text_field('bc_h2_p1', '2', 'Heading Line 1', '', 'AI Decides the Right', 'H2');
                    self::text_field('bc_h2_p2', '3', 'Heading Line 2', '', 'Admission Engagements.', 'H2');
                });
                self::textarea_field('bc_subtext', '4', 'Sub-text', '', 'ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who, when, and how to engage. Every interaction is timely, relevant, and context-aware.', 'Body');

                self::group_heading('🃏 Feature Cards (4 items)');
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
                break;

            case 'convert':
                self::group_heading('📝 Heading & Body');
                self::text_field('cm_eyebrow', '1', 'Eyebrow Text', '', 'Convert More', 'Eyebrow');
                self::pair_row(function(){
                    self::text_field('cm_h2_p1', '2', 'Heading Line 1', '', 'Turn Enquiries Into', 'H2');
                    self::text_field('cm_h2_p2', '3', 'Heading Line 2 (ORANGE)', '', 'Enrollments', 'H2');
                });
                self::text_field('cm_subtitle', '4', 'Sub-title (bold)', '', 'Not every enquiry deserves the same attention.', 'Subtitle');
                self::textarea_field('cm_description', '5', 'Description', '', 'ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward. The result is higher efficiency and stronger enrollment conversions.', 'Body');

                self::group_heading('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('cm_cta_text', '6', 'Button Text', '', 'Book a Demo', 'CTA');
                    self::text_field('cm_cta_url', '7', 'Button URL', '', '#', 'CTA');
                });
                break;

            case 'analytics':
                self::group_heading('📌 Top');
                self::text_field('ie_badge', '1', 'Top Badge', '', 'Measure your efforts', 'Badge');
                self::pair_row(function(){
                    self::text_field('ie_h2_p1', '2', 'Heading Line 1', '', "Know What's Working.", 'H2');
                    self::text_field('ie_h2_p2', '3', 'Heading Line 2 (Gradient)', '', "Fix What's Not.", 'H2');
                });
                self::textarea_field('ie_description', '4', 'Description', '', 'Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance.', 'Body');

                self::group_heading('🔘 CTA');
                self::pair_row(function(){
                    self::text_field('ie_cta_text', '5', 'Button Text', '', 'Book a Demo', 'CTA');
                    self::text_field('ie_cta_url', '6', 'Button URL', '', '#', 'CTA');
                });
                break;

            case 'stories':
                self::group_heading('📝 Section Heading');
                self::text_field('st_tagline', '1', 'Tagline', '', 'CRM Impact Stories', 'Tagline');
                self::pair_row(function(){
                    self::text_field('st_h2_p1', '2', 'Heading Line 1', '', 'Powering Growth for', 'H2');
                    self::text_field('st_h2_p2', '3', 'Heading Line 2', '', '500+ Happy Customers', 'H2');
                });
                self::textarea_field('st_subtitle', '4', 'Sub-title', '', 'From streamlined counselor workflows to data-driven reporting, see how education leaders are rewriting their success stories with ExtraaEdge.', 'Description');

                self::group_heading('📊 4 Stat Metric Cards', 'Numbers');
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

                $t_defaults = array(
                    1 => array('video'=>'3SHgLf1GFgk','name'=>'Silky Jain Marwah','role'=>'Executive Director','inst'=>"Tula's Institute",'photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp'),
                    2 => array('video'=>'dWLdQ8E3FOU','name'=>'Pranay Rupani','role'=>'Head of Admissions & Marketing','inst'=>'Annapurna College of Film & Media','photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp'),
                    3 => array('video'=>'yfK83D2SKps','name'=>'K. Nirmala Devi','role'=>'Assistant Manager','inst'=>'Indian Academy Group','photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp'),
                );
                foreach ($t_defaults as $i => $d) {
                    echo '<div class="repeater-item"><h4>🎬 Testimonial #' . $i . ' <span class="badge">Card ' . $i . '</span></h4>';
                    self::text_field("st_t{$i}_video", '', "YouTube Video ID", "Paste only the <b>video ID</b>, not the full URL. Example: from <code>https://youtu.be/<b>3SHgLf1GFgk</b></code> copy the part in bold.", $d['video'], "Video");
                    self::textarea_field("st_t{$i}_quote", '', "Customer Quote", "Italic quote displayed on the testimonial card.", '', "Quote");
                    self::pair_row(function() use ($i, $d) {
                        self::text_field("st_t{$i}_name", '', "Customer Name", '', $d['name'], "Name");
                        self::text_field("st_t{$i}_role", '', "Job Role", '', $d['role'], "Role");
                    });
                    self::text_field("st_t{$i}_inst", '', "Institute / Company Name", '', $d['inst'], "Company");
                    self::image_field("st_t{$i}_photo", '', "Customer Photo", "Square image around 200x200px recommended.", $d['photo']);
                    echo '</div>';
                }
                break;

            case 'ctabox':
                self::group_heading('📝 Heading & CTA');
                self::text_field('ctab_h2', '1', 'Main Heading (H2)', '', 'Ready to Move to an AI-Powered Admission CRM and Marketing Solution?', 'H2');
                self::textarea_field('ctab_subheadline', '2', 'Sub-heading', '', 'Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.', 'Body');
                self::pair_row(function(){
                    self::text_field('ctab_cta_text', '3', 'Button Text', '', 'Book a Demo', 'Big Button');
                    self::text_field('ctab_cta_url', '4', 'Button URL', '', 'https://www.extraaedge.com/', 'Big Button');
                });
                self::text_field('ctab_trust', '5', 'Trust Indicator Text', '', 'Trusted by 250+ Premier Institutions Globally', 'Trust Line');

                self::group_heading('🧑‍🏫 Expert Centerpiece Image');
                self::image_field('ctab_expert_img', '6', 'Admission Expert Photo', 'Round centerpiece photo on the right column. 400x400px recommended.', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp');
                break;
        }
    }
}

EE_Home_Editor::init();

/**
 * Global helper functions used by front-page.php
 *
 * Behaviour: the $default argument is intentionally IGNORED. If the editor
 * field is empty, nothing is output. The default values that appear as input
 * placeholders inside the admin Home Page Editor are illustrative only and
 * do not appear on the live home page.
 */
if (!function_exists('ee_h')) {
    function ee_h($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) ? $opts[$key] : '';
        echo esc_html($val);
    }
}
if (!function_exists('ee_u')) {
    function ee_u($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) ? $opts[$key] : '';
        echo esc_url($val);
    }
}
if (!function_exists('ee_a')) {
    function ee_a($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) ? $opts[$key] : '';
        echo esc_attr($val);
    }
}
if (!function_exists('ee_raw')) {
    function ee_raw($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        return isset($opts[$key]) ? $opts[$key] : '';
    }
}
