<?php
/**
 * 🏗️ EE Page Builder — a lightweight, Elementor-style element builder.
 *
 * Non-coders assemble pages from ready-made elements (hero, heading, text,
 * image, text+image, features, stats, FAQ, CTA, button, spacer, divider and
 * any homepage section) in a drag-and-drop admin screen. The layout is saved
 * as JSON in post meta and rendered server-side inside the theme's normal
 * header/footer with the site design system (Inter · #19335D · #DE6E30 ·
 * white) baked in, so every page built with it automatically matches the
 * brand.
 *
 * - Admin:   ExtraaEdge Site → 🏗️ Page Builder
 * - Storage: _ee_pb_json (elements) + _ee_pb_on (enable flag) per page
 * - Render:  template_include → page-builder-canvas.php when _ee_pb_on
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* =========================================================================
 * 1. Element registry — every element the palette offers.
 *    type => [label, emoji, fields]; each field:
 *    key => [label, input(text|textarea|url|select|number|check), default,
 *            options(for select), hint]
 * ========================================================================= */
function ee_pb_elements() {
    $sections = function_exists('ee_home_sections_registry') ? ee_home_sections_registry() : array();
    $sec_opts = array();
    foreach ($sections as $id => $meta) { $sec_opts[$id] = $meta[0]; }
    return array(
        'hero' => array('Hero', '🦸', array(
            'eyebrow'  => array('Eyebrow label', 'text', 'WELCOME'),
            'heading'  => array('Heading', 'text', 'Your big headline here'),
            'sub'      => array('Sub text', 'textarea', 'One or two supporting sentences that explain the value.'),
            'btn_text' => array('Button text', 'text', 'Book a Demo'),
            'btn_link' => array('Button link', 'url', '/book-demo/'),
            'align'    => array('Alignment', 'select', 'center', array('center' => 'Center', 'left' => 'Left')),
        )),
        'heading' => array('Heading', '🔤', array(
            'text'  => array('Text', 'text', 'Section heading'),
            'level' => array('Size', 'select', 'h2', array('h1' => 'H1 (largest)', 'h2' => 'H2', 'h3' => 'H3')),
            'align' => array('Alignment', 'select', 'center', array('center' => 'Center', 'left' => 'Left')),
        )),
        'text' => array('Text', '📄', array(
            'content' => array('Paragraph text', 'textarea', 'Write your paragraph here.'),
            'align'   => array('Alignment', 'select', 'left', array('left' => 'Left', 'center' => 'Center')),
        )),
        'image' => array('Image', '🖼️', array(
            'url'     => array('Image URL', 'url', ''),
            'alt'     => array('Alt text (SEO)', 'text', ''),
            'width'   => array('Width', 'select', '100', array('100' => 'Full', '75' => '75%', '50' => 'Half')),
            'align'   => array('Alignment', 'select', 'center', array('center' => 'Center', 'left' => 'Left')),
            'rounded' => array('Rounded corners', 'check', '1'),
        )),
        'textimg' => array('Text + Image', '📰', array(
            'heading'   => array('Heading', 'text', 'Feature heading'),
            'content'   => array('Text', 'textarea', 'Describe the feature or story here.'),
            'image'     => array('Image URL', 'url', ''),
            'image_pos' => array('Image side', 'select', 'right', array('right' => 'Right', 'left' => 'Left')),
            'btn_text'  => array('Button text (optional)', 'text', ''),
            'btn_link'  => array('Button link', 'url', '#admission-form'),
        )),
        'features' => array('Feature Cards', '🧩', array(
            'heading' => array('Heading (optional)', 'text', 'Why teams choose us'),
            'items'   => array('Cards — one per line: Title | Description', 'textarea', "Fast setup | Go live in 7 days\nAI-first | Voice, chat and WhatsApp agents\nSecure | Enterprise-grade compliance"),
            'cols'    => array('Columns', 'select', '3', array('2' => '2', '3' => '3', '4' => '4')),
        )),
        'stats' => array('Stats Row', '📊', array(
            'items' => array('Stats — one per line: Number | Label', 'textarea', "500+ | Institutions\n18M+ | Leads managed\n3.4x | Enrollment growth"),
        )),
        'faq' => array('FAQ Accordion', '❓', array(
            'heading' => array('Heading (optional)', 'text', 'Frequently asked questions'),
            'items'   => array('FAQs — one per line: Question | Answer', 'textarea', "How fast can we go live? | Most teams launch in about 7 days.\nDo you migrate our data? | Yes - migration and onboarding are included."),
        )),
        'cta' => array('CTA Banner', '📣', array(
            'heading'  => array('Heading', 'text', 'Ready to convert more students?'),
            'sub'      => array('Sub text', 'text', 'See ExtraaEdge on your funnel in 30 minutes.'),
            'btn_text' => array('Button text', 'text', 'Book a Demo'),
            'btn_link' => array('Button link', 'url', '/book-demo/'),
        )),
        'button' => array('Button', '🔘', array(
            'text'  => array('Text', 'text', 'Learn more'),
            'link'  => array('Link', 'url', '#'),
            'style' => array('Style', 'select', 'solid', array('solid' => 'Orange solid', 'outline' => 'Navy outline')),
            'align' => array('Alignment', 'select', 'center', array('center' => 'Center', 'left' => 'Left')),
        )),
        'spacer' => array('Spacer', '↕️', array(
            'height' => array('Height (px)', 'number', '48'),
        )),
        'divider' => array('Divider', '➖', array()),
        'homesec' => array('Homepage Section', '🏠', array(
            'section' => array('Section', 'select', 'feature-pillars', $sec_opts),
            'heading' => array('Override heading (optional)', 'text', ''),
            'sub'     => array('Override sub text (optional)', 'text', ''),
            'eyebrow' => array('Override eyebrow (optional)', 'text', ''),
        )),
    );
}

/* =========================================================================
 * 2. Sanitize a submitted layout — only known elements/fields survive.
 * ========================================================================= */
function ee_pb_sanitize_items($raw) {
    $reg = ee_pb_elements();
    $out = array();
    if (!is_array($raw)) return $out;
    foreach (array_slice($raw, 0, 200) as $item) {
        $t = isset($item['t']) ? sanitize_key($item['t']) : '';
        if (!isset($reg[$t])) continue;
        $s = array();
        foreach ($reg[$t][2] as $key => $field) {
            $v = isset($item['s'][$key]) ? $item['s'][$key] : $field[2];
            switch ($field[1]) {
                case 'url':      $v = esc_url_raw(trim((string) $v)); break;
                case 'number':   $v = (string) max(0, min(400, (int) $v)); break;
                case 'check':    $v = $v ? '1' : ''; break;
                case 'select':
                    $opts = isset($field[3]) ? $field[3] : array();
                    if (!isset($opts[$v])) { $v = $field[2]; }
                    break;
                case 'textarea': $v = sanitize_textarea_field(mb_substr((string) $v, 0, 6000)); break;
                default:         $v = sanitize_text_field(mb_substr((string) $v, 0, 600));
            }
            $s[$key] = $v;
        }
        $out[] = array('t' => $t, 's' => $s);
    }
    return $out;
}

/* =========================================================================
 * 3. Frontend renderer — brand-locked, fully escaped output.
 * ========================================================================= */
function ee_pb_split_lines($txt) {
    $rows = array();
    foreach (preg_split('/\r?\n/', (string) $txt) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $parts = array_map('trim', explode('|', $line, 2));
        $rows[] = array($parts[0], isset($parts[1]) ? $parts[1] : '');
    }
    return $rows;
}

function ee_pb_render_page($items) {
    static $css_done = false;
    $html = '';
    if (!$css_done) {
        $css_done = true;
        $html .= '<style id="ee-pb-css">
.eepb{font-family:\'Inter\',-apple-system,BlinkMacSystemFont,sans-serif;color:#19335D;background:#fff;line-height:1.55;-webkit-font-smoothing:antialiased}
.eepb *{box-sizing:border-box}
.eepb .pbw{max-width:1140px;margin:0 auto;padding:0 22px}
.eepb .pb-el{padding:26px 0}
.eepb .ta-center{text-align:center}.eepb .ta-left{text-align:left}
.eepb h1,.eepb h2,.eepb h3{font-weight:800;letter-spacing:-.02em;line-height:1.15;color:#19335D;margin:0}
.eepb .pb-h1{font-size:clamp(32px,4.6vw,52px)}.eepb .pb-h2{font-size:clamp(26px,3.2vw,38px)}.eepb .pb-h3{font-size:clamp(20px,2.4vw,26px)}
.eepb p{margin:0;font-size:16.5px;color:rgba(25,51,93,.78)}
.eepb .pb-eyebrow{display:inline-block;font-size:12px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#DE6E30;margin-bottom:14px}
.eepb .pb-btn{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:15px;padding:13px 26px;border-radius:999px;text-decoration:none;transition:transform .2s,box-shadow .2s,background .2s}
.eepb .pb-btn--solid{background:#DE6E30;color:#fff;box-shadow:0 10px 24px -10px rgba(222,110,48,.55)}
.eepb .pb-btn--solid:hover{transform:translateY(-2px);background:#c85d20;color:#fff}
.eepb .pb-btn--outline{background:#fff;color:#19335D;border:2px solid #19335D}
.eepb .pb-btn--outline:hover{background:#19335D;color:#fff}
.eepb .pb-hero{padding:56px 0 40px}
.eepb .pb-hero .sub{max-width:640px;font-size:clamp(16px,1.6vw,18.5px);margin-top:14px}
.eepb .pb-hero.ta-center .sub{margin-left:auto;margin-right:auto}
.eepb .pb-hero .act{margin-top:26px}
.eepb .pb-img{display:block;max-width:100%;height:auto}
.eepb .pb-img--rounded{border-radius:18px}
.eepb .pb-textimg{display:grid;grid-template-columns:1fr 1fr;gap:44px;align-items:center}
.eepb .pb-textimg .txt h2{margin-bottom:12px}
.eepb .pb-textimg .txt .act{margin-top:20px}
.eepb .pb-textimg img{width:100%;height:auto;border-radius:18px;display:block}
.eepb .pb-feats{display:grid;gap:18px}
.eepb .pb-feats.cols-2{grid-template-columns:repeat(2,1fr)}.eepb .pb-feats.cols-3{grid-template-columns:repeat(3,1fr)}.eepb .pb-feats.cols-4{grid-template-columns:repeat(4,1fr)}
.eepb .pb-feat{background:#fff;border:1px solid #e7ecf3;border-radius:16px;padding:22px;transition:box-shadow .25s,transform .25s}
.eepb .pb-feat:hover{transform:translateY(-3px);box-shadow:0 16px 34px -16px rgba(25,51,93,.22)}
.eepb .pb-feat b{display:block;font-size:16.5px;font-weight:800;color:#19335D;margin-bottom:7px}
.eepb .pb-feat span{font-size:14px;color:rgba(25,51,93,.72);line-height:1.55}
.eepb .pb-feats-h{margin-bottom:22px}
.eepb .pb-stats{display:flex;flex-wrap:wrap;justify-content:center;gap:16px}
.eepb .pb-stat{flex:1 1 180px;max-width:260px;text-align:center;background:#fff;border:1px solid #e7ecf3;border-radius:16px;padding:24px 16px}
.eepb .pb-stat b{display:block;font-size:clamp(30px,3.4vw,42px);font-weight:800;color:#DE6E30;line-height:1.05}
.eepb .pb-stat span{display:block;margin-top:7px;font-size:13.5px;font-weight:600;color:rgba(25,51,93,.75)}
.eepb .pb-faq{max-width:760px;margin:0 auto}
.eepb .pb-faq-h{margin-bottom:18px}
.eepb .pb-faq details{border:1px solid #e7ecf3;border-radius:12px;background:#fff;margin-bottom:10px;overflow:hidden}
.eepb .pb-faq summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;align-items:center;gap:12px;padding:15px 18px;font-weight:700;font-size:15.5px;color:#19335D}
.eepb .pb-faq summary::-webkit-details-marker{display:none}
.eepb .pb-faq summary::after{content:"+";font-size:20px;font-weight:800;color:#DE6E30;flex:none;line-height:1}
.eepb .pb-faq details[open] summary::after{content:"\2212"}
.eepb .pb-faq .a{padding:0 18px 15px;font-size:14.5px;color:rgba(25,51,93,.75);line-height:1.6}
.eepb .pb-cta{background:linear-gradient(135deg,#19335D,#22467c);border-radius:22px;padding:clamp(28px,4vw,48px);text-align:center;color:#fff}
.eepb .pb-cta h2{color:#fff}
.eepb .pb-cta p{color:rgba(255,255,255,.78);margin-top:10px}
.eepb .pb-cta .act{margin-top:22px}
.eepb .pb-divider{border:0;border-top:1px solid #e7ecf3;margin:0}
@media(max-width:860px){
  .eepb .pb-textimg{grid-template-columns:1fr;gap:22px}
  .eepb .pb-textimg .vis{order:-1}
  .eepb .pb-feats.cols-3,.eepb .pb-feats.cols-4{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:560px){
  .eepb .pb-feats.cols-2,.eepb .pb-feats.cols-3,.eepb .pb-feats.cols-4{grid-template-columns:1fr}
  .eepb .pb-el{padding:18px 0}
}
</style>';
    }
    $html .= '<div class="eepb">';
    foreach ((array) $items as $item) {
        $t = $item['t']; $s = $item['s'];
        $html .= ee_pb_render_el($t, $s);
    }
    $html .= '</div>';
    return $html;
}

function ee_pb_render_el($t, $s) {
    $g = function ($k) use ($s) { return isset($s[$k]) ? $s[$k] : ''; };
    switch ($t) {

        case 'hero':
            $al = $g('align') === 'left' ? 'ta-left' : 'ta-center';
            $o  = '<section class="pb-el pb-hero ' . esc_attr($al) . '"><div class="pbw">';
            if ($g('eyebrow') !== '') $o .= '<span class="pb-eyebrow">' . esc_html($g('eyebrow')) . '</span>';
            $o .= '<h1 class="pb-h1">' . esc_html($g('heading')) . '</h1>';
            if ($g('sub') !== '') $o .= '<p class="sub">' . esc_html($g('sub')) . '</p>';
            if ($g('btn_text') !== '') $o .= '<div class="act"><a class="pb-btn pb-btn--solid" href="' . esc_url($g('btn_link')) . '">' . esc_html($g('btn_text')) . ' →</a></div>';
            return $o . '</div></section>';

        case 'heading':
            $lv = in_array($g('level'), array('h1', 'h2', 'h3'), true) ? $g('level') : 'h2';
            $al = $g('align') === 'left' ? 'ta-left' : 'ta-center';
            return '<div class="pb-el ' . esc_attr($al) . '"><div class="pbw"><' . $lv . ' class="pb-' . $lv . '">' . esc_html($g('text')) . '</' . $lv . '></div></div>';

        case 'text':
            $al = $g('align') === 'center' ? 'ta-center' : 'ta-left';
            $paras = '';
            foreach (preg_split('/\r?\n\r?\n?/', (string) $g('content')) as $p) {
                $p = trim($p);
                if ($p !== '') $paras .= '<p style="margin-bottom:12px">' . esc_html($p) . '</p>';
            }
            return '<div class="pb-el ' . esc_attr($al) . '"><div class="pbw" style="max-width:820px">' . $paras . '</div></div>';

        case 'image':
            if ($g('url') === '') return '';
            $w  = in_array($g('width'), array('100', '75', '50'), true) ? $g('width') : '100';
            $al = $g('align') === 'left' ? '' : 'margin-left:auto;margin-right:auto;';
            $r  = $g('rounded') ? ' pb-img--rounded' : '';
            return '<div class="pb-el"><div class="pbw"><img class="pb-img' . $r . '" style="width:' . $w . '%;' . $al . '" src="' . esc_url($g('url')) . '" alt="' . esc_attr($g('alt')) . '" loading="lazy" decoding="async"></div></div>';

        case 'textimg':
            $img = $g('image') !== '' ? '<div class="vis"><img src="' . esc_url($g('image')) . '" alt="' . esc_attr($g('heading')) . '" loading="lazy" decoding="async"></div>' : '';
            $txt = '<div class="txt"><h2 class="pb-h2">' . esc_html($g('heading')) . '</h2><p>' . esc_html($g('content')) . '</p>';
            if ($g('btn_text') !== '') $txt .= '<div class="act"><a class="pb-btn pb-btn--solid" href="' . esc_url($g('btn_link')) . '">' . esc_html($g('btn_text')) . ' →</a></div>';
            $txt .= '</div>';
            $inner = $g('image_pos') === 'left' ? $img . $txt : $txt . $img;
            return '<div class="pb-el"><div class="pbw"><div class="pb-textimg">' . $inner . '</div></div></div>';

        case 'features':
            $cols = in_array($g('cols'), array('2', '3', '4'), true) ? $g('cols') : '3';
            $o = '<div class="pb-el"><div class="pbw">';
            if ($g('heading') !== '') $o .= '<h2 class="pb-h2 pb-feats-h ta-center" style="text-align:center">' . esc_html($g('heading')) . '</h2>';
            $o .= '<div class="pb-feats cols-' . $cols . '">';
            foreach (ee_pb_split_lines($g('items')) as $row) {
                $o .= '<div class="pb-feat"><b>' . esc_html($row[0]) . '</b><span>' . esc_html($row[1]) . '</span></div>';
            }
            return $o . '</div></div></div>';

        case 'stats':
            $o = '<div class="pb-el"><div class="pbw"><div class="pb-stats">';
            foreach (ee_pb_split_lines($g('items')) as $row) {
                $o .= '<div class="pb-stat"><b>' . esc_html($row[0]) . '</b><span>' . esc_html($row[1]) . '</span></div>';
            }
            return $o . '</div></div></div>';

        case 'faq':
            $o = '<div class="pb-el"><div class="pbw"><div class="pb-faq">';
            if ($g('heading') !== '') $o .= '<h2 class="pb-h2 pb-faq-h" style="text-align:center">' . esc_html($g('heading')) . '</h2>';
            foreach (ee_pb_split_lines($g('items')) as $row) {
                $o .= '<details><summary>' . esc_html($row[0]) . '</summary><div class="a">' . esc_html($row[1]) . '</div></details>';
            }
            return $o . '</div></div></div>';

        case 'cta':
            $o = '<div class="pb-el"><div class="pbw"><div class="pb-cta"><h2 class="pb-h2">' . esc_html($g('heading')) . '</h2>';
            if ($g('sub') !== '') $o .= '<p>' . esc_html($g('sub')) . '</p>';
            if ($g('btn_text') !== '') $o .= '<div class="act"><a class="pb-btn pb-btn--solid" href="' . esc_url($g('btn_link')) . '">' . esc_html($g('btn_text')) . ' →</a></div>';
            return $o . '</div></div></div>';

        case 'button':
            $st = $g('style') === 'outline' ? 'pb-btn--outline' : 'pb-btn--solid';
            $al = $g('align') === 'left' ? 'ta-left' : 'ta-center';
            return '<div class="pb-el ' . esc_attr($al) . '"><div class="pbw"><a class="pb-btn ' . $st . '" href="' . esc_url($g('link')) . '">' . esc_html($g('text')) . ' →</a></div></div>';

        case 'spacer':
            return '<div aria-hidden="true" style="height:' . (int) $g('height') . 'px"></div>';

        case 'divider':
            return '<div class="pb-el" style="padding:8px 0"><div class="pbw"><hr class="pb-divider"></div></div>';

        case 'homesec':
            $sc = '[ee_section id="' . esc_attr($g('section')) . '"';
            foreach (array('heading', 'sub', 'eyebrow') as $k) {
                if ($g($k) !== '') $sc .= ' ' . $k . '="' . esc_attr($g($k)) . '"';
            }
            $sc .= ']';
            return '<div class="pb-el" style="padding:10px 0">' . do_shortcode($sc) . '</div>';
    }
    return '';
}

/* =========================================================================
 * 4. Frontend hookup — builder pages render through the canvas template.
 * ========================================================================= */
add_filter('template_include', function ($template) {
    if (!is_page()) return $template;
    $pid = get_queried_object_id();
    if (!$pid || !get_post_meta($pid, '_ee_pb_on', true)) return $template;
    $t = locate_template('page-builder-canvas.php');
    return $t ?: $template;
}, 60);

/** Data accessor used by the canvas template. */
function ee_pb_get_items($pid) {
    $items = get_post_meta($pid, '_ee_pb_json', true);
    return is_array($items) ? $items : array();
}

/* =========================================================================
 * 5. Save handler.
 * ========================================================================= */
add_action('admin_post_ee_pb_save', function () {
    if (!current_user_can('manage_options')) wp_die('Not allowed');
    check_admin_referer('ee_pb_save');
    $pid = isset($_POST['pb_post']) ? (int) $_POST['pb_post'] : 0;
    if (!$pid || get_post_type($pid) !== 'page') wp_die('Bad page');
    $raw = json_decode(wp_unslash($_POST['pb_json'] ?? '[]'), true);
    update_post_meta($pid, '_ee_pb_json', ee_pb_sanitize_items($raw));
    update_post_meta($pid, '_ee_pb_on', empty($_POST['pb_on']) ? '' : '1');
    if (function_exists('ee_home_layout_flush_caches')) ee_home_layout_flush_caches();
    wp_safe_redirect(admin_url('admin.php?page=ee-page-builder&post=' . $pid . '&saved=1'));
    exit;
});

/** Create a fresh page from the list screen and jump into the builder. */
add_action('admin_post_ee_pb_new', function () {
    if (!current_user_can('manage_options')) wp_die('Not allowed');
    check_admin_referer('ee_pb_new');
    $title = sanitize_text_field(wp_unslash($_POST['pb_title'] ?? ''));
    if ($title === '') $title = 'New builder page';
    $pid = wp_insert_post(array('post_title' => $title, 'post_type' => 'page', 'post_status' => 'publish'));
    if (is_wp_error($pid) || !$pid) wp_die('Could not create page');
    update_post_meta($pid, '_ee_pb_on', '1');
    update_post_meta($pid, '_ee_pb_json', array());
    wp_safe_redirect(admin_url('admin.php?page=ee-page-builder&post=' . $pid));
    exit;
});

/* =========================================================================
 * 6. Admin UI.
 * ========================================================================= */
add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Page Builder', '🏗️ Page Builder', 'manage_options', 'ee-page-builder', 'ee_pb_render_admin');
});

function ee_pb_render_admin() {
    if (!current_user_can('manage_options')) return;
    $pid = isset($_GET['post']) ? (int) $_GET['post'] : 0;
    if ($pid && get_post_type($pid) === 'page') { ee_pb_render_editor($pid); return; }
    ee_pb_render_list();
}

/** Screen 1 — pick a page (or create one). */
function ee_pb_render_list() {
    $pages = get_pages(array('sort_column' => 'post_title', 'number' => 300));
    ?>
    <div class="wrap" style="max-width:860px">
      <h1>🏗️ Page Builder</h1>
      <p style="font-size:14px;color:#50575e;max-width:70ch">Build pages from ready-made elements — hero, text, images, feature cards, stats, FAQ, CTA and even whole homepage sections. Everything automatically follows the site design (Inter · navy · orange · white).</p>

      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="background:#fff;border:1px solid #dcdcde;border-left:4px solid #DE6E30;border-radius:8px;padding:14px 18px;margin:16px 0;display:flex;gap:10px;align-items:center;max-width:640px">
        <?php wp_nonce_field('ee_pb_new'); ?>
        <input type="hidden" name="action" value="ee_pb_new">
        <b style="color:#19335D;white-space:nowrap">➕ New page:</b>
        <input type="text" name="pb_title" placeholder="Page title…" style="flex:1" required>
        <button class="button button-primary">Create &amp; open builder</button>
      </form>

      <table class="widefat striped" style="max-width:840px">
        <thead><tr><th>Page</th><th style="width:120px">Builder</th><th style="width:220px"></th></tr></thead>
        <tbody>
        <?php foreach ($pages as $p) : $on = get_post_meta($p->ID, '_ee_pb_on', true); ?>
          <tr>
            <td><b><?php echo esc_html($p->post_title ?: '(no title)'); ?></b><br><span style="color:#8a8f98;font-size:12px">/<?php echo esc_html($p->post_name); ?>/</span></td>
            <td><?php echo $on ? '<span style="color:#1a7f37;font-weight:700">● On</span>' : '<span style="color:#8a8f98">Off</span>'; ?></td>
            <td>
              <a class="button" href="<?php echo esc_url(admin_url('admin.php?page=ee-page-builder&post=' . $p->ID)); ?>">Edit with builder</a>
              <a class="button" href="<?php echo esc_url(get_permalink($p->ID)); ?>" target="_blank" rel="noopener">View</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php
}

/** Screen 2 — the builder itself. */
function ee_pb_render_editor($pid) {
    $reg   = ee_pb_elements();
    $items = ee_pb_get_items($pid);
    $on    = (bool) get_post_meta($pid, '_ee_pb_on', true);
    /* schema for the JS: type => {label, icon, fields:{key:{label,input,def,options}}} */
    $schema = array();
    foreach ($reg as $t => $def) {
        $fields = array();
        foreach ($def[2] as $k => $f) {
            $fields[$k] = array('label' => $f[0], 'input' => $f[1], 'def' => $f[2], 'options' => isset($f[3]) ? $f[3] : null);
        }
        $schema[$t] = array('label' => $def[0], 'icon' => $def[1], 'fields' => $fields);
    }
    ?>
    <div class="wrap" style="max-width:1400px">
      <h1 style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">🏗️ <?php echo esc_html(get_the_title($pid)); ?>
        <a class="button" href="<?php echo esc_url(admin_url('admin.php?page=ee-page-builder')); ?>">← All pages</a>
        <a class="button" href="<?php echo esc_url(get_permalink($pid)); ?>" target="_blank" rel="noopener">👁 View page</a>
      </h1>
      <?php if (!empty($_GET['saved'])) : ?><div class="notice notice-success is-dismissible"><p>Saved! The live page is updated (purge your site cache if you use one).</p></div><?php endif; ?>

      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="eepbForm">
        <?php wp_nonce_field('ee_pb_save'); ?>
        <input type="hidden" name="action" value="ee_pb_save">
        <input type="hidden" name="pb_post" value="<?php echo (int) $pid; ?>">
        <input type="hidden" name="pb_json" id="eepbJson" value="">
        <p style="display:flex;gap:16px;align-items:center;flex-wrap:wrap">
          <label style="font-weight:600"><input type="checkbox" name="pb_on" value="1" <?php checked($on); ?>> Render this page with the builder</label>
          <button class="button button-primary button-large">💾 Save page</button>
        </p>

        <div class="eepb-admin">
          <div class="eepb-palette">
            <h3>Elements</h3>
            <div id="eepbPal"></div>
            <p class="hint">Click an element to add it. Drag rows in the middle column to reorder.</p>
          </div>
          <div class="eepb-canvas">
            <h3>Page layout</h3>
            <ul id="eepbCanvas"></ul>
            <p class="hint" id="eepbEmpty">No elements yet — add some from the left.</p>
          </div>
          <div class="eepb-settings">
            <h3>Settings</h3>
            <div id="eepbSettings"><p class="hint">Select an element to edit its content.</p></div>
          </div>
        </div>
      </form>

      <style>
        .eepb-admin{display:grid;grid-template-columns:230px minmax(320px,1fr) 360px;gap:16px;align-items:start}
        .eepb-admin h3{margin:0 0 10px;font-size:13px;text-transform:uppercase;letter-spacing:.06em;color:#50575e}
        .eepb-palette,.eepb-canvas,.eepb-settings{background:#fff;border:1px solid #dcdcde;border-radius:10px;padding:14px}
        .eepb-palette button.pal{display:flex;align-items:center;gap:9px;width:100%;text-align:left;background:#f6f7f7;border:1px solid #dcdcde;border-radius:8px;padding:9px 11px;margin-bottom:7px;cursor:pointer;font-weight:600;color:#19335D;font-size:13px}
        .eepb-palette button.pal:hover{border-color:#DE6E30;background:#fff7f2}
        #eepbCanvas{margin:0;min-height:60px}
        #eepbCanvas li{display:flex;align-items:center;gap:10px;background:#f6f7f7;border:1px solid #dcdcde;border-radius:8px;padding:10px 12px;margin-bottom:8px;cursor:grab}
        #eepbCanvas li.sel{border-color:#DE6E30;background:#fff7f2;box-shadow:0 0 0 1px #DE6E30}
        #eepbCanvas li.dragging{opacity:.45}
        #eepbCanvas li .nm{font-weight:700;color:#19335D;font-size:13px;flex:none}
        #eepbCanvas li .sum{color:#8a8f98;font-size:12px;flex:1;min-width:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
        #eepbCanvas li .ops{display:flex;gap:4px;flex:none}
        #eepbCanvas li .ops button{border:0;background:none;cursor:pointer;font-size:14px;padding:2px 4px;color:#50575e}
        #eepbCanvas li .ops button:hover{color:#DE6E30}
        .eepb-settings label{display:block;font-weight:600;font-size:12.5px;color:#19335D;margin:12px 0 4px}
        .eepb-settings input[type=text],.eepb-settings input[type=url],.eepb-settings input[type=number],.eepb-settings select,.eepb-settings textarea{width:100%}
        .eepb-settings textarea{min-height:110px;font-family:Menlo,Consolas,monospace;font-size:12px}
        .hint{color:#8a8f98;font-size:12px}
      </style>

      <script>
      (function(){
        var SCHEMA = <?php echo wp_json_encode($schema); ?>;
        var state  = <?php echo wp_json_encode(array_values($items)); ?>;
        var sel = -1;
        var pal = document.getElementById('eepbPal'),
            canvas = document.getElementById('eepbCanvas'),
            settings = document.getElementById('eepbSettings'),
            empty = document.getElementById('eepbEmpty'),
            jsonInp = document.getElementById('eepbJson');

        Object.keys(SCHEMA).forEach(function(t){
          var b = document.createElement('button');
          b.type = 'button'; b.className = 'pal';
          b.innerHTML = '<span>' + SCHEMA[t].icon + '</span> ' + SCHEMA[t].label;
          b.addEventListener('click', function(){
            var s = {};
            Object.keys(SCHEMA[t].fields).forEach(function(k){ s[k] = SCHEMA[t].fields[k].def; });
            state.push({t:t, s:s});
            sel = state.length - 1;
            draw();
          });
          pal.appendChild(b);
        });

        function summary(it){
          var s = it.s || {};
          return s.heading || s.text || s.content || s.section || s.items || '';
        }

        function draw(){
          canvas.innerHTML = '';
          empty.style.display = state.length ? 'none' : '';
          state.forEach(function(it, i){
            var li = document.createElement('li');
            li.draggable = true; li.dataset.i = i;
            if (i === sel) li.className = 'sel';
            li.innerHTML = '<span>' + (SCHEMA[it.t] ? SCHEMA[it.t].icon : '❔') + '</span>'
              + '<span class="nm">' + (SCHEMA[it.t] ? SCHEMA[it.t].label : it.t) + '</span>'
              + '<span class="sum"></span>'
              + '<span class="ops">'
              + '<button type="button" data-op="up" title="Move up">▲</button>'
              + '<button type="button" data-op="down" title="Move down">▼</button>'
              + '<button type="button" data-op="dup" title="Duplicate">⧉</button>'
              + '<button type="button" data-op="del" title="Delete">✕</button>'
              + '</span>';
            li.querySelector('.sum').textContent = String(summary(it)).slice(0, 60);
            canvas.appendChild(li);
          });
          drawSettings();
          jsonInp.value = JSON.stringify(state);
        }

        canvas.addEventListener('click', function(e){
          var li = e.target.closest('li'); if (!li) return;
          var i = parseInt(li.dataset.i, 10);
          var op = e.target.closest('button') ? e.target.closest('button').dataset.op : null;
          if (op === 'del') { state.splice(i, 1); if (sel >= state.length) sel = state.length - 1; }
          else if (op === 'dup') { state.splice(i + 1, 0, JSON.parse(JSON.stringify(state[i]))); sel = i + 1; }
          else if (op === 'up' && i > 0) { var a = state.splice(i, 1)[0]; state.splice(i - 1, 0, a); sel = i - 1; }
          else if (op === 'down' && i < state.length - 1) { var b = state.splice(i, 1)[0]; state.splice(i + 1, 0, b); sel = i + 1; }
          else { sel = i; }
          draw();
        });

        var dragI = null;
        canvas.addEventListener('dragstart', function(e){
          var li = e.target.closest('li'); if (!li) return;
          dragI = parseInt(li.dataset.i, 10); li.classList.add('dragging');
        });
        canvas.addEventListener('dragend', function(){ dragI = null; draw(); });
        canvas.addEventListener('dragover', function(e){
          e.preventDefault();
          var li = e.target.closest('li'); if (!li || dragI === null) return;
          var i = parseInt(li.dataset.i, 10);
          if (i === dragI) return;
          var m = state.splice(dragI, 1)[0];
          state.splice(i, 0, m);
          sel = i; dragI = i;
          draw();
          var rows = canvas.querySelectorAll('li');
          if (rows[i]) rows[i].classList.add('dragging');
        });

        function drawSettings(){
          settings.innerHTML = '';
          if (sel < 0 || !state[sel]) { settings.innerHTML = '<p class="hint">Select an element to edit its content.</p>'; return; }
          var it = state[sel], sch = SCHEMA[it.t];
          if (!sch) return;
          var head = document.createElement('p');
          head.innerHTML = '<b>' + sch.icon + ' ' + sch.label + '</b>';
          settings.appendChild(head);
          Object.keys(sch.fields).forEach(function(k){
            var f = sch.fields[k];
            var lab = document.createElement('label');
            lab.textContent = f.label;
            settings.appendChild(lab);
            var inp;
            if (f.input === 'textarea') { inp = document.createElement('textarea'); }
            else if (f.input === 'select') {
              inp = document.createElement('select');
              Object.keys(f.options || {}).forEach(function(ov){
                var op = document.createElement('option');
                op.value = ov; op.textContent = f.options[ov];
                inp.appendChild(op);
              });
            }
            else if (f.input === 'check') { inp = document.createElement('input'); inp.type = 'checkbox'; }
            else { inp = document.createElement('input'); inp.type = (f.input === 'number' ? 'number' : 'text'); }
            if (f.input === 'check') { inp.checked = !!it.s[k]; }
            else { inp.value = (it.s[k] !== undefined ? it.s[k] : f.def); }
            inp.addEventListener('input', function(){
              it.s[k] = (f.input === 'check') ? (inp.checked ? '1' : '') : inp.value;
              jsonInp.value = JSON.stringify(state);
              var row = canvas.querySelector('li[data-i="' + sel + '"] .sum');
              if (row) row.textContent = String(summary(it)).slice(0, 60);
            });
            settings.appendChild(inp);
          });
        }

        document.getElementById('eepbForm').addEventListener('submit', function(){
          jsonInp.value = JSON.stringify(state);
        });

        draw();
      })();
      </script>
    </div>
    <?php
}
