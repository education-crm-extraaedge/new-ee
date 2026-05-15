<?php
/**
 * ExtraaEdge Theme Functions — PRODUCTION + SEO/CRAWLABILITY READY
 *
 * ─── SECTIONS ───
 *  A. THEME SETUP (title-tag, post-thumbnails, html5, custom-logo, menus)
 *  B. WIDGET AREAS (sidebar + 3 footer)
 *  C. ENQUEUE SCRIPTS
 *  D. CUSTOM POST TYPES (9 CPTs)
 *  E. FORM EMBED UNFILTERED HTML (admins only)
 *  F. PRODUCT ADMIN STYLES + JS
 *  G. PRODUCT META BOX (11 tabs)
 *  H. SAVE META BOX DATA
 *  I. FLUSH REWRITES
 *
 *  ── SEO / CRAWLABILITY UPGRADES ──
 *  J. WP HEAD BLOAT CLEANUP (removes RSD, wlwmanifest, generator, shortlink, oembed, emoji)
 *  K. IMAGE ALT FALLBACK (no empty alt to crawlers)
 *  L. DEFER / ASYNC SCRIPT LOADER (Core Web Vitals)
 *  M. LAST-MODIFIED + CACHE HEADERS (TTFB + freshness)
 *  N. ROBOTS.TXT (with AI crawler allowlist: GPTBot, ClaudeBot, PerplexityBot, Google-Extended)
 *  O. PROPER HTTP STATUS CODES (200/301/404)
 *  P. BODY CLASSES (entity signals)
 *  Q. CLEAN EXCERPT
 *  R. DISABLE XML-RPC
 *  S. SCHEMA HELPERS (FAQ / Video / HowTo / Review — for template use)
 *  T. AUTO PRELOAD HERO IMAGE (LCP)
 *  U. LAZY LOAD GUARD (never lazy-load above-the-fold)
 *
 * @package ExtraaEdge
 * @version 1.3.0
 */
if (!defined('ABSPATH')) exit;

// ══════════════════════════════════════════════════════════
// A. THEME SETUP
// ══════════════════════════════════════════════════════════
function extraaedge_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('responsive-embeds');
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'extraaedge'),
        'footer'  => esc_html__('Footer Menu', 'extraaedge'),
    ));
}
add_action('after_setup_theme', 'extraaedge_setup');

// ══════════════════════════════════════════════════════════
// B. WIDGET AREAS
// ══════════════════════════════════════════════════════════
function extraaedge_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'extraaedge'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'extraaedge'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer %d', 'extraaedge'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Footer widget area %d', 'extraaedge'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'extraaedge_widgets_init');

// ══════════════════════════════════════════════════════════
// C. ENQUEUE SCRIPTS
// ══════════════════════════════════════════════════════════
function extraaedge_scripts() {
    $theme_version = wp_get_theme()->get('Version') ?: '1.3.0';
    wp_enqueue_style('extraaedge-style', get_stylesheet_uri(), array(), $theme_version);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'extraaedge_scripts');

// ══════════════════════════════════════════════════════════
// D. CUSTOM POST TYPES
// ══════════════════════════════════════════════════════════
function extraaedge_register_cpts() {
    $cpts = array(
        'product'    => array('Products',     'Product',     'dashicons-products',     'products'),
        'industry'   => array('Industries',   'Industry',    'dashicons-building',     'industries'),
        'ebook'      => array('E-books',      'E-book',      'dashicons-book',         'ebooks'),
        'webinar'    => array('Webinars',     'Webinar',     'dashicons-video-alt3',   'webinars'),
        'career'     => array('Careers',      'Career',      'dashicons-groups',       'careers'),
        'news'       => array('News',         'News',        'dashicons-megaphone',    'news'),
        'testimonial'=> array('Testimonials', 'Testimonial', 'dashicons-star-filled',  'testimonials'),
        'help'       => array('Help',         'Help',        'dashicons-sos',          'help'),
        'case_study' => array('Case Studies', 'Case Study',  'dashicons-analytics',    'case-studies'),
    );

    foreach ($cpts as $slug => $cfg) {
        list($plural, $singular, $icon, $rewrite) = $cfg;
        register_post_type($slug, array(
            'labels' => array(
                'name'          => __($plural,   'extraaedge'),
                'singular_name' => __($singular, 'extraaedge'),
                'add_new_item'  => sprintf(__('Add New %s', 'extraaedge'), $singular),
                'edit_item'     => sprintf(__('Edit %s',    'extraaedge'), $singular),
                'view_item'     => sprintf(__('View %s',    'extraaedge'), $singular),
                'search_items'  => sprintf(__('Search %s',  'extraaedge'), $plural),
            ),
            'public'       => true,
            'has_archive'  => true,
            'show_in_rest' => true,
            'menu_icon'    => $icon,
            'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
            'rewrite'      => array('slug' => $rewrite),
        ));
    }
}
add_action('init', 'extraaedge_register_cpts');

// ══════════════════════════════════════════════════════════
// E. ALLOW UNFILTERED HTML FOR FORM EMBEDS (admins only)
// ══════════════════════════════════════════════════════════
function extraaedge_allow_form_tags($allowed, $context) {
    if ($context === 'post') {
        $allowed['script'] = array('src'=>true,'type'=>true,'async'=>true,'defer'=>true,'charset'=>true,'id'=>true,'class'=>true);
        $allowed['iframe'] = array('src'=>true,'width'=>true,'height'=>true,'frameborder'=>true,'style'=>true,'allowfullscreen'=>true,'loading'=>true,'title'=>true);
        if (isset($allowed['div']))   $allowed['div']['data-*']   = true;
        if (isset($allowed['input'])) $allowed['input']['data-*'] = true;
        if (isset($allowed['form']))  $allowed['form']['data-*']  = true;
    }
    return $allowed;
}
if (current_user_can('administrator')) {
    add_filter('wp_kses_allowed_html', 'extraaedge_allow_form_tags', 10, 2);
}

add_action('get_header', function () { remove_action('wp_head', '_admin_bar_bump_cb'); });

// ══════════════════════════════════════════════════════════
// F. PRODUCT PAGE ADMIN STYLES + JS
// ══════════════════════════════════════════════════════════
function product_admin_styles() {
    global $post_type;
    if (!in_array($post_type, array('product', 'industry'), true)) return;
    ?>
<style>
.product-tabs-wrapper{margin-top:20px}
.product-tabs{display:flex;flex-wrap:wrap;border-bottom:1px solid #ccc;margin:0;padding:0;background:#f0f0f0}
.product-tabs li{list-style:none;margin:0;padding:0}
.product-tabs a{display:block;padding:12px 20px;text-decoration:none;background:#f0f0f0;color:#333;border-right:1px solid #ccc;font-weight:600}
.product-tabs a:hover{background:#e0e0e0}
.product-tabs a.active{background:#fff;color:#0073aa;border-bottom:2px solid #0073aa}
.product-tab-content{display:none;padding:20px;background:#fff;border:1px solid #ccc;border-top:none}
.product-tab-content.active{display:block}
.repeater-item{background:#f9f9f9;border:1px solid #ddd;padding:15px;margin-bottom:15px;position:relative}
.repeater-item h4{margin-top:0;color:#0073aa;border-bottom:1px solid #ddd;padding-bottom:10px}
.remove-item{position:absolute;top:10px;right:10px;color:#a00;cursor:pointer;text-decoration:none;font-weight:bold}
.remove-item:hover{color:#dc3232}
.add-item-btn{background:#0073aa;color:#fff;border:none;padding:10px 20px;cursor:pointer;border-radius:3px;font-size:14px;margin-top:10px}
.add-item-btn:hover{background:#005a87}
.field-group{margin-bottom:15px}
.field-group label{display:block;font-weight:600;margin-bottom:5px;color:#333}
.field-group input[type="text"],.field-group input[type="url"],.field-group textarea,.field-group select{width:100%;padding:8px;border:1px solid #ddd;border-radius:3px}
.field-group textarea{min-height:80px}
.field-help{font-size:12px;color:#666;font-style:italic;margin-top:5px}
</style>
<script>
jQuery(document).ready(function($){
    $('.product-tabs a').on('click', function(e){
        e.preventDefault();
        var target = $(this).data('tab');
        $('.product-tabs a').removeClass('active');
        $(this).addClass('active');
        $('.product-tab-content').removeClass('active');
        $('#' + target).addClass('active');
    });
});
</script>
    <?php
}
add_action('admin_head', 'product_admin_styles');

// ══════════════════════════════════════════════════════════
// G. PRODUCT META BOX
// ══════════════════════════════════════════════════════════
function product_add_meta_boxes() {
    /* Same tabbed editor renders for both 'product' and 'industry' CPTs so single-product
       and single-industry templates share the same 200+ editable fields without duplicating
       400+ lines of meta-box markup. */
    add_meta_box(
        'product_all_settings',
        '📋 Page Settings (All Content Editable)',
        'product_all_settings_callback',
        array('product', 'industry'),
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'product_add_meta_boxes');

function product_all_settings_callback($post) {
    wp_nonce_field('product_meta_box', 'product_meta_box_nonce');
    ?>
<div class="product-tabs-wrapper">
    <ul class="product-tabs">
        <li><a href="#" data-tab="tab-seo" class="active">🔍 SEO</a></li>
        <li><a href="#" data-tab="tab-hero">🎯 Hero</a></li>
        <li><a href="#" data-tab="tab-logos">🏢 Logos</a></li>
        <li><a href="#" data-tab="tab-educrm">📚 Education CRM</a></li>
        <li><a href="#" data-tab="tab-features">⭐ Features</a></li>
        <li><a href="#" data-tab="tab-sections">📑 Sections</a></li>
        <li><a href="#" data-tab="tab-bottom">🎁 Bottom CTA</a></li>
        <li><a href="#" data-tab="tab-testimonials">💬 Testimonials</a></li>
        <li><a href="#" data-tab="tab-aidemo">🤖 AI Demo</a></li>
        <li><a href="#" data-tab="tab-faq">❓ FAQ</a></li>
        <li><a href="#" data-tab="tab-toc">🗂️ TOC</a></li>
    </ul>

    <div id="tab-seo"          class="product-tab-content active"><?php product_seo_fields($post); ?></div>
    <div id="tab-hero"         class="product-tab-content"><?php product_hero_fields($post); ?></div>
    <div id="tab-logos"        class="product-tab-content"><?php product_logos_fields($post); ?></div>
    <div id="tab-educrm"       class="product-tab-content"><?php product_educrm_fields($post); ?></div>
    <div id="tab-features"     class="product-tab-content"><?php product_features_fields($post); ?></div>
    <div id="tab-sections"     class="product-tab-content"><?php product_sections_fields($post); ?></div>
    <div id="tab-bottom"       class="product-tab-content"><?php product_bottom_fields($post); ?></div>
    <div id="tab-testimonials" class="product-tab-content"><?php product_testimonials_fields($post); ?></div>
    <div id="tab-aidemo"       class="product-tab-content"><?php product_aidemo_fields($post); ?></div>
    <div id="tab-faq"          class="product-tab-content"><?php product_faq_fields($post); ?></div>
    <div id="tab-toc"          class="product-tab-content"><?php product_toc_fields($post); ?></div>
</div>
    <?php
}

// ─── SEO TAB ───
function product_seo_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $schema_type = $f('schema_type') ?: 'SoftwareApplication';
    ?>
<h3>🔍 SEO Meta Tags</h3>
<div class="field-group"><label>Page Title</label><input type="text" name="seo_title" value="<?php echo esc_attr($f('seo_title')); ?>" placeholder="Education CRM Software | Boost Admissions | ExtraaEdge"><p class="field-help">60 characters max</p></div>
<div class="field-group"><label>Meta Description</label><textarea name="seo_description" rows="3"><?php echo esc_textarea($f('seo_description')); ?></textarea><p class="field-help">150-160 characters</p></div>
<div class="field-group"><label>Meta Keywords</label><input type="text" name="seo_keywords" value="<?php echo esc_attr($f('seo_keywords')); ?>"></div>
<div class="field-group"><label>OG Image URL</label><input type="url" name="og_image" value="<?php echo esc_attr($f('og_image')); ?>" placeholder="https://example.com/og-image.png"><p class="field-help">1200x630px recommended</p></div>
<div class="field-group"><label>Canonical URL</label><input type="url" name="canonical_url" value="<?php echo esc_attr($f('canonical_url')); ?>"></div>
<div class="field-group"><label>Schema Type</label>
<select name="schema_type">
<option value="SoftwareApplication" <?php selected($schema_type,'SoftwareApplication'); ?>>SoftwareApplication</option>
<option value="Product" <?php selected($schema_type,'Product'); ?>>Product</option>
<option value="Service" <?php selected($schema_type,'Service'); ?>>Service</option>
</select>
</div>
<h4>Twitter Card</h4>
<div class="field-group"><label>Twitter Card Type</label><input type="text" name="twitter_card" value="<?php echo esc_attr($f('twitter_card')); ?>" placeholder="summary_large_image"></div>
<div class="field-group"><label>Twitter Title</label><input type="text" name="twitter_title" value="<?php echo esc_attr($f('twitter_title')); ?>"></div>
<div class="field-group"><label>Twitter Description</label><textarea name="twitter_desc" rows="2"><?php echo esc_textarea($f('twitter_desc')); ?></textarea></div>
    <?php
}

// ─── HERO TAB ───
function product_hero_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $hero_proofs = $f('hero_proofs') ?: array();
    $stats       = $f('stats') ?: array(array('number'=>'','label'=>''),array('number'=>'','label'=>''),array('number'=>'','label'=>''));
    $tags        = $f('tags') ?: array();
    $compliance  = $f('compliance') ?: array();
    ?>
<h3>🎯 Hero Section</h3>
<div class="field-group"><label>Badge Text</label><input type="text" name="hero_badge" value="<?php echo esc_attr($f('hero_badge')); ?>" placeholder="Join 500+ Educational Institutions..."></div>
<div class="field-group"><label>H1 - Part 1 (before orange)</label><input type="text" name="hero_h1_before" value="<?php echo esc_attr($f('hero_h1_before')); ?>"></div>
<div class="field-group"><label>H1 - ORANGE HIGHLIGHT</label><input type="text" name="hero_h1_highlight" value="<?php echo esc_attr($f('hero_h1_highlight')); ?>"></div>
<div class="field-group"><label>H1 - Part 2 (optional)</label><input type="text" name="hero_h1_after" value="<?php echo esc_attr($f('hero_h1_after')); ?>"></div>
<div class="field-group"><label>Description</label><textarea name="hero_description" rows="4"><?php echo esc_textarea($f('hero_description')); ?></textarea></div>

<h4>Proof Points</h4>
<div id="proofs-container">
<?php if (!empty($hero_proofs)) : foreach ($hero_proofs as $proof) : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span><input type="text" name="hero_proofs[]" value="<?php echo esc_attr($proof); ?>" style="width:100%;"></div>
<?php endforeach; else : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span><input type="text" name="hero_proofs[]" style="width:100%;"></div>
<?php endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="jQuery('#proofs-container').append('<div class=\'repeater-item\'><span class=\'remove-item\' onclick=\'jQuery(this).parent().remove();\'>✕</span><input type=\'text\' name=\'hero_proofs[]\' style=\'width:100%;\' /></div>')">+ Add Proof</button>

<h4>Stats Grid (3 Stats)</h4>
<?php foreach ($stats as $i => $stat) : ?>
<div class="repeater-item"><h4>Stat <?php echo ($i + 1); ?></h4>
<div class="field-group"><label>Number</label><input type="text" name="stats[<?php echo $i; ?>][number]" value="<?php echo esc_attr($stat['number']); ?>" placeholder="2X"></div>
<div class="field-group"><label>Label</label><input type="text" name="stats[<?php echo $i; ?>][label]"  value="<?php echo esc_attr($stat['label']);  ?>" placeholder="Higher Conversion Rates"></div>
</div>
<?php endforeach; ?>

<div class="field-group"><label>Result Badge</label><input type="text" name="result_badge" value="<?php echo esc_attr($f('result_badge')); ?>" placeholder="Increase Admissions by 2X..."></div>

<h4>Industry Tags</h4>
<div id="tags-container">
<?php if (!empty($tags)) : foreach ($tags as $tag) : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span><input type="text" name="tags[]" value="<?php echo esc_attr($tag); ?>" style="width:100%;"></div>
<?php endforeach; else : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span><input type="text" name="tags[]" style="width:100%;"></div>
<?php endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="jQuery('#tags-container').append('<div class=\'repeater-item\'><span class=\'remove-item\' onclick=\'jQuery(this).parent().remove();\'>✕</span><input type=\'text\' name=\'tags[]\' style=\'width:100%;\' /></div>')">+ Add Tag</button>

<div class="field-group"><label>CTA Button 1 Text</label><input type="text" name="hero_cta_text"  value="<?php echo esc_attr($f('hero_cta_text'));  ?>"></div>
<div class="field-group"><label>CTA Button 1 URL</label> <input type="text" name="hero_cta_url"   value="<?php echo esc_attr($f('hero_cta_url'));   ?>"></div>
<div class="field-group"><label>CTA Button 2 Text</label><input type="text" name="hero_cta2_text" value="<?php echo esc_attr($f('hero_cta2_text')); ?>"></div>
<div class="field-group"><label>CTA Button 2 URL</label> <input type="text" name="hero_cta2_url"  value="<?php echo esc_attr($f('hero_cta2_url'));  ?>"></div>
<div class="field-group"><label>Trust Rating</label>    <input type="text" name="trust_rating"   value="<?php echo esc_attr($f('trust_rating'));   ?>" placeholder="4.9"></div>
<div class="field-group"><label>Trust Text</label>      <input type="text" name="trust_text"     value="<?php echo esc_attr($f('trust_text'));     ?>"></div>

<h4>Compliance Badges</h4>
<div id="compliance-container">
<?php if (!empty($compliance)) : foreach ($compliance as $i => $comp) : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span>
<div class="field-group"><label>Image URL</label><input type="url"  name="compliance[<?php echo $i; ?>][image]" value="<?php echo esc_attr($comp['image']); ?>" style="width:100%;"></div>
<div class="field-group"><label>Text</label>     <input type="text" name="compliance[<?php echo $i; ?>][text]"  value="<?php echo esc_attr($comp['text']);  ?>" style="width:100%;"></div>
</div>
<?php endforeach; else : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span>
<div class="field-group"><label>Image URL</label><input type="url"  name="compliance[0][image]" style="width:100%;"></div>
<div class="field-group"><label>Text</label>     <input type="text" name="compliance[0][text]"  style="width:100%;"></div>
</div>
<?php endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#compliance-container .repeater-item').length;jQuery('#compliance-container').append('<div class=\'repeater-item\'><span class=\'remove-item\' onclick=\'jQuery(this).parent().remove();\'>✕</span><div class=\'field-group\'><label>Image URL</label><input type=\'url\' name=\'compliance['+idx+'][image]\' style=\'width:100%;\' /></div><div class=\'field-group\'><label>Text</label><input type=\'text\' name=\'compliance['+idx+'][text]\' style=\'width:100%;\' /></div></div>')">+ Add Compliance Badge</button>

<hr style="margin:30px 0;border:2px solid #0073aa;">
<h4 style="color:#d63638;">⚠️ FORM EMBED CODE (Paste Complete HTML/Script)</h4>
<div class="field-group">
    <label>Form Widget Code (Full HTML + Scripts allowed)</label>
    <textarea name="form_embed" rows="10" style="font-family:monospace;font-size:12px;background:#f0f0f0;"><?php echo esc_textarea($f('form_embed')); ?></textarea>
    <p class="field-help"><strong style="color:#0073aa;">✅ Paste your complete form code here including &lt;script&gt; tags</strong></p>
</div>
    <?php
}

// ─── LOGOS TAB ───
function product_logos_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $logos = $f('logos') ?: array();
    ?>
<h3>🏢 Logo Section</h3>
<div class="field-group"><label>Badge Text</label>           <input type="text" name="logo_badge"       value="<?php echo esc_attr($f('logo_badge')); ?>"></div>
<div class="field-group"><label>Title Line 1 (small)</label> <input type="text" name="logo_title_line1" value="<?php echo esc_attr($f('logo_title_line1')); ?>"></div>
<div class="field-group"><label>Main Title</label>           <input type="text" name="logo_title"       value="<?php echo esc_attr($f('logo_title')); ?>"></div>
<div class="field-group"><label>Subtitle</label><textarea name="logo_sub" rows="2"><?php echo esc_textarea($f('logo_sub')); ?></textarea></div>

<h4>Logos (will scroll in marquee)</h4>
<div id="logos-container">
<?php if (!empty($logos)) : foreach ($logos as $i => $logo) : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span>
<div class="field-group"><label>Logo URL</label><input type="url"  name="logos[<?php echo $i; ?>][image]" value="<?php echo esc_attr($logo['image']); ?>" style="width:100%;"></div>
<div class="field-group"><label>Alt Text</label><input type="text" name="logos[<?php echo $i; ?>][alt]"   value="<?php echo esc_attr($logo['alt']);   ?>" style="width:100%;"></div>
</div>
<?php endforeach; else : ?>
<div class="repeater-item"><span class="remove-item" onclick="jQuery(this).parent().remove();">✕</span>
<div class="field-group"><label>Logo URL</label><input type="url"  name="logos[0][image]" style="width:100%;"></div>
<div class="field-group"><label>Alt Text</label><input type="text" name="logos[0][alt]"   style="width:100%;"></div>
</div>
<?php endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#logos-container .repeater-item').length;jQuery('#logos-container').append('<div class=\'repeater-item\'><span class=\'remove-item\' onclick=\'jQuery(this).parent().remove();\'>✕</span><div class=\'field-group\'><label>Logo URL</label><input type=\'url\' name=\'logos['+idx+'][image]\' style=\'width:100%;\' /></div><div class=\'field-group\'><label>Alt Text</label><input type=\'text\' name=\'logos['+idx+'][alt]\' style=\'width:100%;\' /></div></div>')">+ Add Logo</button>

<div class="field-group"><label>Footer CTA Text</label>     <input type="text" name="logo_footer_cta"     value="<?php echo esc_attr($f('logo_footer_cta')); ?>"></div>
<div class="field-group"><label>Footer CTA URL</label>      <input type="text" name="logo_footer_cta_url" value="<?php echo esc_attr($f('logo_footer_cta_url')); ?>" placeholder="https://example.com/get-started"></div>
<div class="field-group"><label>Live Indicator Text</label> <input type="text" name="logo_live_text"      value="<?php echo esc_attr($f('logo_live_text'));  ?>"></div>
    <?php
}

// ─── EDUCATION CRM TAB ───
function product_educrm_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $flow_steps = $f('flow_steps') ?: array();
    ?>
<h3>📚 What is Education CRM Section</h3>
<div class="field-group"><label>Main Heading (H2)</label><input type="text" name="educrm_h2" value="<?php echo esc_attr($f('educrm_h2')); ?>"></div>
<div class="field-group"><label>Paragraph 1</label><textarea name="educrm_p1" rows="4"><?php echo esc_textarea($f('educrm_p1')); ?></textarea></div>
<div class="field-group"><label>Paragraph 2</label><textarea name="educrm_p2" rows="4"><?php echo esc_textarea($f('educrm_p2')); ?></textarea></div>
<div class="field-group"><label>Paragraph 3</label><textarea name="educrm_p3" rows="4"><?php echo esc_textarea($f('educrm_p3')); ?></textarea></div>
<h4>Growth Card</h4>
<div class="field-group"><label>Growth Value (e.g., 26.5%)</label><input type="text" name="growth_val" value="<?php echo esc_attr($f('growth_val')); ?>"></div>
<div class="field-group"><label>Growth Description</label><textarea name="growth_text" rows="3"><?php echo esc_textarea($f('growth_text')); ?></textarea></div>

<h4>Flow Steps (Interactive Panel)</h4>
<div id="flow-steps-container">
<?php if (!empty($flow_steps)) : foreach ($flow_steps as $i => $step) : ?>
<div class="repeater-item"><h4>Step <?php echo ($i + 1); ?> <span class="remove-item" onclick="jQuery(this).parent().parent().remove();">✕</span></h4>
<div class="field-group"><label>Step Label</label><input type="text" name="flow_steps[<?php echo $i; ?>][label]" value="<?php echo esc_attr($step['label']); ?>" style="width:100%;"></div>
</div>
<?php endforeach; else : for ($i = 0; $i < 5; $i++) : ?>
<div class="repeater-item"><h4>Step <?php echo ($i + 1); ?> <span class="remove-item" onclick="jQuery(this).parent().parent().remove();">✕</span></h4>
<div class="field-group"><label>Step Label</label><input type="text" name="flow_steps[<?php echo $i; ?>][label]" style="width:100%;"></div>
</div>
<?php endfor; endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#flow-steps-container .repeater-item').length;jQuery('#flow-steps-container').append('<div class=\'repeater-item\'><h4>Step '+(idx+1)+' <span class=\'remove-item\' onclick=\'jQuery(this).parent().parent().remove();\'>✕</span></h4><div class=\'field-group\'><label>Step Label</label><input type=\'text\' name=\'flow_steps['+idx+'][label]\' style=\'width:100%;\' /></div></div>')">+ Add Step</button>
    <?php
}

// ─── FEATURES TAB ───
function product_features_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $features = $f('features') ?: array();
    ?>
<h3>⭐ Features Section</h3>
<div class="field-group"><label>Section Heading</label><input type="text" name="features_h2" value="<?php echo esc_attr($f('features_h2')); ?>"></div>
<h4>Feature Cards</h4>
<div id="features-container">
<?php if (!empty($features)) : foreach ($features as $i => $feature) : ?>
<div class="repeater-item"><h4>Feature <?php echo ($i + 1); ?> <span class="remove-item" onclick="jQuery(this).parent().parent().remove();">✕</span></h4>
<div class="field-group"><label>Image URL</label><input type="url"  name="features[<?php echo $i; ?>][image]" value="<?php echo esc_attr($feature['image']); ?>" style="width:100%;"></div>
<div class="field-group"><label>Title</label>    <input type="text" name="features[<?php echo $i; ?>][title]" value="<?php echo esc_attr($feature['title']); ?>" style="width:100%;"></div>
<div class="field-group"><label>Alt Text</label> <input type="text" name="features[<?php echo $i; ?>][alt]"   value="<?php echo esc_attr($feature['alt']);   ?>" style="width:100%;"></div>
</div>
<?php endforeach; endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#features-container .repeater-item').length;jQuery('#features-container').append('<div class=\'repeater-item\'><h4>Feature '+(idx+1)+' <span class=\'remove-item\' onclick=\'jQuery(this).parent().parent().remove();\'>✕</span></h4><div class=\'field-group\'><label>Image URL</label><input type=\'url\' name=\'features['+idx+'][image]\' style=\'width:100%;\' /></div><div class=\'field-group\'><label>Title</label><input type=\'text\' name=\'features['+idx+'][title]\' style=\'width:100%;\' /></div><div class=\'field-group\'><label>Alt Text</label><input type=\'text\' name=\'features['+idx+'][alt]\' style=\'width:100%;\' /></div></div>')">+ Add Feature</button>
    <?php
}

// ─── SECTIONS TAB ───
function product_sections_fields($post) {
    $sections = get_post_meta($post->ID, '_content_sections', true) ?: array();
    ?>
<h3>📑 Alternating Sections (Unlimited)</h3>
<p style="color:#0073aa;">Add as many sections as you need. Each becomes an anchor in the TOC automatically.</p>
<div id="sections-container">
<?php if (!empty($sections)) : foreach ($sections as $i => $section) : ?>
<div class="repeater-item section-item"><h4><?php echo esc_html($section['heading']); ?> <span class="remove-item" onclick="jQuery(this).parent().parent().remove();">✕</span></h4>
<div class="field-group"><label>Section ID (slug for TOC anchor)</label><input type="text" name="sections[<?php echo $i; ?>][id]"             value="<?php echo esc_attr($section['id']);             ?>" placeholder="lead-management"></div>
<div class="field-group"><label>Heading</label>                                     <input type="text" name="sections[<?php echo $i; ?>][heading]"        value="<?php echo esc_attr($section['heading']);        ?>"></div>
<div class="field-group"><label>Description</label><textarea                                          name="sections[<?php echo $i; ?>][description]"    rows="4"><?php echo esc_textarea($section['description']); ?></textarea></div>
<div class="field-group"><label>Features Heading (small label above the bullet list)</label><input type="text" name="sections[<?php echo $i; ?>][features_heading]" value="<?php echo esc_attr(isset($section['features_heading']) ? $section['features_heading'] : ''); ?>" placeholder="Key Features"><p class="field-help">Defaults to <strong>“Key Features”</strong> when blank. Leave blank to hide if there are no bullet points.</p></div>
<div class="field-group"><label>Features (one per line)</label><textarea                              name="sections[<?php echo $i; ?>][features]"       rows="6"><?php echo esc_textarea($section['features']); ?></textarea></div>
<div class="field-group"><label>Image URL</label>                                   <input type="url"  name="sections[<?php echo $i; ?>][image]"          value="<?php echo esc_attr($section['image']); ?>"></div>
<div class="field-group"><label>Image Position</label><select                                         name="sections[<?php echo $i; ?>][image_position]"><option value="right" <?php selected($section['image_position'],'right'); ?>>Right</option><option value="left" <?php selected($section['image_position'],'left'); ?>>Left</option></select></div>
<div class="field-group"><label>CTA Text (optional)</label>                         <input type="text" name="sections[<?php echo $i; ?>][cta_text]"       value="<?php echo esc_attr($section['cta_text']); ?>"></div>
<div class="field-group"><label>CTA URL (optional)</label>                          <input type="url"  name="sections[<?php echo $i; ?>][cta_url]"        value="<?php echo esc_attr($section['cta_url']);  ?>"></div>
</div>
<?php endforeach; endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#sections-container .repeater-item').length;jQuery('#sections-container').append('<div class=\'repeater-item section-item\'><h4>Section '+(idx+1)+' <span class=\'remove-item\' onclick=\'jQuery(this).parent().parent().remove();\'>✕</span></h4><div class=\'field-group\'><label>Section ID</label><input type=\'text\' name=\'sections['+idx+'][id]\' placeholder=\'section-id\' /></div><div class=\'field-group\'><label>Heading</label><input type=\'text\' name=\'sections['+idx+'][heading]\' /></div><div class=\'field-group\'><label>Description</label><textarea name=\'sections['+idx+'][description]\' rows=\'4\'></textarea></div><div class=\'field-group\'><label>Features Heading</label><input type=\'text\' name=\'sections['+idx+'][features_heading]\' placeholder=\'Key Features\' /></div><div class=\'field-group\'><label>Features (one per line)</label><textarea name=\'sections['+idx+'][features]\' rows=\'6\'></textarea></div><div class=\'field-group\'><label>Image URL</label><input type=\'url\' name=\'sections['+idx+'][image]\' /></div><div class=\'field-group\'><label>Image Position</label><select name=\'sections['+idx+'][image_position]\'><option value=\'right\'>Right</option><option value=\'left\'>Left</option></select></div><div class=\'field-group\'><label>CTA Text</label><input type=\'text\' name=\'sections['+idx+'][cta_text]\' /></div><div class=\'field-group\'><label>CTA URL</label><input type=\'url\' name=\'sections['+idx+'][cta_url]\' /></div></div>')">+ Add Section</button>
    <?php
}

// ─── BOTTOM CTA TAB ───
function product_bottom_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $products = $f('products') ?: array();
    ?>
<h3>🎁 Bottom CTA & Products</h3>
<div class="field-group"><label>Label</label>                <input type="text" name="bottom_label"    value="<?php echo esc_attr($f('bottom_label'));    ?>"></div>
<div class="field-group"><label>Main Heading (H2)</label>    <input type="text" name="bottom_h2"       value="<?php echo esc_attr($f('bottom_h2'));       ?>"></div>
<div class="field-group"><label>Subheading (H3)</label><textarea            name="bottom_h3" rows="2"><?php echo esc_textarea($f('bottom_h3')); ?></textarea></div>
<div class="field-group"><label>CTA Button Text</label>      <input type="text" name="bottom_cta_text" value="<?php echo esc_attr($f('bottom_cta_text')); ?>"></div>
<div class="field-group"><label>CTA Button URL</label>       <input type="text" name="bottom_cta_url"  value="<?php echo esc_attr($f('bottom_cta_url'));  ?>"></div>

<h4>Product Cards (4 products)</h4>
<?php for ($i = 0; $i < 4; $i++) : $p = isset($products[$i]) ? $products[$i] : array('logo'=>'','title'=>'','url'=>''); ?>
<div class="repeater-item"><h4>Product <?php echo ($i + 1); ?></h4>
<div class="field-group"><label>Logo URL</label>   <input type="url"  name="products[<?php echo $i; ?>][logo]"  value="<?php echo esc_attr($p['logo']);  ?>" style="width:100%;"></div>
<div class="field-group"><label>Title</label>      <input type="text" name="products[<?php echo $i; ?>][title]" value="<?php echo esc_attr($p['title']); ?>" style="width:100%;"></div>
<div class="field-group"><label>Product URL</label><input type="url"  name="products[<?php echo $i; ?>][url]"   value="<?php echo esc_attr($p['url']);   ?>" style="width:100%;"></div>
</div>
<?php endfor; ?>
    <?php
}

// ─── TESTIMONIALS TAB ───
function product_testimonials_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $metrics      = $f('testi_metrics') ?: array();
    $testimonials = $f('testimonials')  ?: array();
    ?>
<h3>💬 Testimonials Section</h3>
<div class="field-group"><label>Tagline</label> <input type="text" name="testi_tagline" value="<?php echo esc_attr($f('testi_tagline')); ?>"></div>
<div class="field-group"><label>Title</label>   <input type="text" name="testi_title"   value="<?php echo esc_attr($f('testi_title'));   ?>"></div>
<div class="field-group"><label>Subtitle</label><textarea            name="testi_sub" rows="2"><?php echo esc_textarea($f('testi_sub')); ?></textarea></div>

<h4>Metrics (4 metric cards)</h4>
<?php for ($i = 0; $i < 4; $i++) : $m = isset($metrics[$i]) ? $metrics[$i] : array('target'=>'','suffix'=>'','label'=>'','locale'=>''); ?>
<div class="repeater-item"><h4>Metric <?php echo ($i + 1); ?></h4>
<div class="field-group"><label>Value (animated target)</label><input type="text" name="metrics[<?php echo $i; ?>][target]" value="<?php echo esc_attr($m['target']); ?>" placeholder="500"></div>
<div class="field-group"><label>Suffix (e.g., +, X, %)</label> <input type="text" name="metrics[<?php echo $i; ?>][suffix]" value="<?php echo esc_attr($m['suffix']); ?>" placeholder="+"></div>
<div class="field-group"><label>Label</label>                  <input type="text" name="metrics[<?php echo $i; ?>][label]"  value="<?php echo esc_attr($m['label']);  ?>" placeholder="Happy Customers"></div>
<div class="field-group"><label><input type="checkbox" name="metrics[<?php echo $i; ?>][locale]" value="true" <?php checked($m['locale'],'true'); ?>> Use locale formatting (commas)</label></div>
</div>
<?php endfor; ?>

<h4>Testimonial Cards</h4>
<div id="testimonials-container">
<?php if (!empty($testimonials)) : foreach ($testimonials as $i => $test) : ?>
<div class="repeater-item"><h4>Testimonial <?php echo ($i + 1); ?> <span class="remove-item" onclick="jQuery(this).parent().parent().remove();">✕</span></h4>
<div class="field-group"><label>YouTube Video ID</label><input type="text" name="testimonials[<?php echo $i; ?>][youtube_id]"  value="<?php echo esc_attr($test['youtube_id']); ?>" placeholder="3SHgLf1GFgk"></div>
<div class="field-group"><label>Quote</label><textarea                       name="testimonials[<?php echo $i; ?>][quote]" rows="3"><?php echo esc_textarea($test['quote']); ?></textarea></div>
<div class="field-group"><label>Name</label>           <input type="text" name="testimonials[<?php echo $i; ?>][name]"        value="<?php echo esc_attr($test['name']); ?>"></div>
<div class="field-group"><label>Role</label>           <input type="text" name="testimonials[<?php echo $i; ?>][role]"        value="<?php echo esc_attr($test['role']); ?>"></div>
<div class="field-group"><label>Institution</label>    <input type="text" name="testimonials[<?php echo $i; ?>][institution]" value="<?php echo esc_attr($test['institution']); ?>"></div>
<div class="field-group"><label>Avatar URL</label>     <input type="url"  name="testimonials[<?php echo $i; ?>][avatar]"      value="<?php echo esc_attr($test['avatar']); ?>"></div>
</div>
<?php endforeach; endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#testimonials-container .repeater-item').length;jQuery('#testimonials-container').append('<div class=\'repeater-item\'><h4>Testimonial '+(idx+1)+' <span class=\'remove-item\' onclick=\'jQuery(this).parent().parent().remove();\'>✕</span></h4><div class=\'field-group\'><label>YouTube Video ID</label><input type=\'text\' name=\'testimonials['+idx+'][youtube_id]\' placeholder=\'3SHgLf1GFgk\' /></div><div class=\'field-group\'><label>Quote</label><textarea name=\'testimonials['+idx+'][quote]\' rows=\'3\'></textarea></div><div class=\'field-group\'><label>Name</label><input type=\'text\' name=\'testimonials['+idx+'][name]\' /></div><div class=\'field-group\'><label>Role</label><input type=\'text\' name=\'testimonials['+idx+'][role]\' /></div><div class=\'field-group\'><label>Institution</label><input type=\'text\' name=\'testimonials['+idx+'][institution]\' /></div><div class=\'field-group\'><label>Avatar URL</label><input type=\'url\' name=\'testimonials['+idx+'][avatar]\' /></div></div>')">+ Add Testimonial</button>
    <?php
}

// ─── AI DEMO TAB ───
function product_aidemo_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $workflow_nodes = $f('workflow_nodes') ?: array();
    ?>
<h3>🤖 AI Demo Section</h3>
<div class="field-group"><label>Main Heading</label>           <input type="text" name="aidemo_h2"         value="<?php echo esc_attr($f('aidemo_h2'));         ?>"></div>
<div class="field-group"><label>Subtitle</label><textarea                       name="aidemo_sub" rows="2"><?php echo esc_textarea($f('aidemo_sub')); ?></textarea></div>
<div class="field-group"><label>CTA Button Text</label>        <input type="text" name="aidemo_cta_text"   value="<?php echo esc_attr($f('aidemo_cta_text'));   ?>"></div>
<div class="field-group"><label>CTA Button URL</label>         <input type="text" name="aidemo_cta_url"    value="<?php echo esc_attr($f('aidemo_cta_url'));    ?>"></div>
<div class="field-group"><label>Trust Text</label>             <input type="text" name="aidemo_trust"      value="<?php echo esc_attr($f('aidemo_trust'));      ?>"></div>
<div class="field-group"><label>Expert Center Image URL</label><input type="url"  name="aidemo_expert_img" value="<?php echo esc_attr($f('aidemo_expert_img')); ?>"></div>

<h4>Workflow Nodes (6 nodes)</h4>
<?php for ($i = 0; $i < 6; $i++) : $n = isset($workflow_nodes[$i]) ? $workflow_nodes[$i] : array('num'=>($i + 1),'title'=>'','sub'=>''); ?>
<div class="repeater-item"><h4>Node <?php echo ($i + 1); ?></h4>
<div class="field-group"><label>Number</label>  <input type="text" name="workflow_nodes[<?php echo $i; ?>][num]"   value="<?php echo esc_attr($n['num']);   ?>" style="width:50px;"></div>
<div class="field-group"><label>Title</label>   <input type="text" name="workflow_nodes[<?php echo $i; ?>][title]" value="<?php echo esc_attr($n['title']); ?>"></div>
<div class="field-group"><label>Subtitle</label><input type="text" name="workflow_nodes[<?php echo $i; ?>][sub]"   value="<?php echo esc_attr($n['sub']);   ?>"></div>
</div>
<?php endfor; ?>
    <?php
}

// ─── FAQ TAB ───
function product_faq_fields($post) {
    $f = function($k) use ($post) { return get_post_meta($post->ID, '_'.$k, true); };
    $faqs = $f('faqs') ?: array();
    ?>
<h3>❓ FAQ Section</h3>
<div class="field-group"><label>Badge Text</label><input type="text" name="faq_badge" value="<?php echo esc_attr($f('faq_badge')); ?>"></div>
<div class="field-group"><label>Title</label>     <input type="text" name="faq_title" value="<?php echo esc_attr($f('faq_title')); ?>"></div>
<div class="field-group"><label>Subtitle</label><textarea            name="faq_subtitle" rows="2"><?php echo esc_textarea($f('faq_subtitle')); ?></textarea></div>

<h4>FAQ Items</h4>
<p style="margin:6px 0 12px;padding:10px 12px;background:#fff8f1;border-left:3px solid #de6e30;border-radius:4px;font-size:12px;color:#555;line-height:1.6;">
<strong>Tip — use bullets in answers:</strong> Start a line with <code>-&nbsp;</code> or <code>*&nbsp;</code> for a bulleted list. Start with <code>1.&nbsp;</code> <code>2.&nbsp;</code> for a numbered list. Leave a blank line between paragraphs and lists. You can also paste raw HTML like <code>&lt;ul&gt;&lt;li&gt;…&lt;/li&gt;&lt;/ul&gt;</code>.
</p>
<div id="faqs-container">
<?php if (!empty($faqs)) : foreach ($faqs as $i => $faq) : ?>
<div class="repeater-item"><h4>FAQ <?php echo ($i + 1); ?> <span class="remove-item" onclick="jQuery(this).parent().parent().remove();">✕</span></h4>
<div class="field-group"><label>Question</label><input  type="text" name="faqs[<?php echo $i; ?>][question]" value="<?php echo esc_attr($faq['question']); ?>" style="width:100%;"></div>
<div class="field-group"><label>Answer</label><textarea           name="faqs[<?php echo $i; ?>][answer]"   rows="4" style="width:100%;"><?php echo esc_textarea($faq['answer']); ?></textarea></div>
</div>
<?php endforeach; endif; ?>
</div>
<button type="button" class="add-item-btn" onclick="var idx=jQuery('#faqs-container .repeater-item').length;jQuery('#faqs-container').append('<div class=\'repeater-item\'><h4>FAQ '+(idx+1)+' <span class=\'remove-item\' onclick=\'jQuery(this).parent().parent().remove();\'>✕</span></h4><div class=\'field-group\'><label>Question</label><input type=\'text\' name=\'faqs['+idx+'][question]\' style=\'width:100%;\' /></div><div class=\'field-group\'><label>Answer</label><textarea name=\'faqs['+idx+'][answer]\' rows=\'4\' style=\'width:100%;\'></textarea></div></div>')">+ Add FAQ</button>
    <?php
}

// ─── TOC TAB (custom Table of Contents) ───

/**
 * Auto-detect the anchor IDs that exist on this post based on which
 * sections are actually populated. Returns the same order as the page
 * renders top-to-bottom. The non-coder NEVER has to type an anchor ID.
 *
 * @return array<array{anchor:string,label:string,source:string}>
 */
function ee_get_available_toc_anchors($post_id) {
    $f = function ($k) use ($post_id) { return get_post_meta($post_id, '_' . $k, true); };
    $list = array();

    $list[] = array('anchor' => 'top', 'label' => 'Home', 'source' => 'hero');

    if ($f('logos'))             $list[] = array('anchor' => 'trusted-institutions', 'label' => 'Trusted Institutions', 'source' => 'logos');
    if ($f('educrm_h2'))         $list[] = array('anchor' => 'what-is-education-crm', 'label' => 'Education CRM', 'source' => 'educrm');
    if ($f('features'))          $list[] = array('anchor' => 'features', 'label' => 'Features', 'source' => 'features');

    $sections = $f('content_sections');
    if (is_array($sections)) {
        foreach ($sections as $s) {
            if (!empty($s['heading']) && !empty($s['id'])) {
                $list[] = array('anchor' => $s['id'], 'label' => $s['heading'], 'source' => 'section');
            }
        }
    }

    if ($f('bottom_h2'))         $list[] = array('anchor' => 'products', 'label' => 'Products', 'source' => 'bottom');
    if ($f('testimonials'))      $list[] = array('anchor' => 'testimonials', 'label' => 'Testimonials', 'source' => 'testimonials');
    if ($f('aidemo_h2'))         $list[] = array('anchor' => 'demo', 'label' => 'Book Demo', 'source' => 'aidemo');
    if ($f('faqs'))              $list[] = array('anchor' => 'faq', 'label' => 'FAQ', 'source' => 'faq');

    return $list;
}

function product_toc_fields($post) {
    $toc_enabled = get_post_meta($post->ID, '_toc_enabled', true);
    $saved       = get_post_meta($post->ID, '_toc_items', true) ?: array();
    $available   = ee_get_available_toc_anchors($post->ID);

    /* Build the merged working list:
       - Start with each available anchor in page order
       - If there is a saved entry for that anchor, prefer its label + show flag + original order
       - Saved custom anchors (source = 'custom') stay too
       - New anchors that weren't saved yet appear as show=1 with the auto label */
    $by_anchor = array();
    foreach ($saved as $i => $s) {
        if (empty($s['anchor'])) continue;
        $by_anchor[$s['anchor']] = array(
            'anchor' => $s['anchor'],
            'label'  => isset($s['label']) ? $s['label'] : '',
            'show'   => isset($s['show']) ? (string)$s['show'] : '1',
            'custom' => isset($s['custom']) ? (string)$s['custom'] : '0',
            '_pos'   => $i,
        );
    }

    $ordered = array();
    $seen    = array();

    /* Preserve any saved order first */
    foreach ($saved as $s) {
        if (empty($s['anchor'])) continue;
        $a = $s['anchor'];
        if (isset($seen[$a])) continue;
        // Match to an available row to attach the default label
        $auto_label = '';
        foreach ($available as $av) { if ($av['anchor'] === $a) { $auto_label = $av['label']; break; } }
        $ordered[] = array(
            'anchor'      => $a,
            'label'       => $by_anchor[$a]['label'] !== '' ? $by_anchor[$a]['label'] : $auto_label,
            'show'        => $by_anchor[$a]['show'],
            'custom'      => $by_anchor[$a]['custom'],
            'auto_label'  => $auto_label,
            'still_avail' => (bool) $auto_label || $by_anchor[$a]['custom'] === '1',
        );
        $seen[$a] = true;
    }
    /* Append any newly-available anchor that wasn't in the saved list */
    foreach ($available as $av) {
        if (isset($seen[$av['anchor']])) continue;
        $ordered[] = array(
            'anchor'      => $av['anchor'],
            'label'       => $av['label'],
            'show'        => '1',
            'custom'      => '0',
            'auto_label'  => $av['label'],
            'still_avail' => true,
        );
    }
    ?>
<style>
    .toc-builder { background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:14px; }
    .toc-builder .toc-row { display:grid; grid-template-columns: 28px 28px 1fr 220px 28px; gap:10px; align-items:center; padding:10px; border:1px solid #e2e8f0; border-radius:6px; margin-bottom:8px; background:#fafbfc; }
    .toc-builder .toc-row.is-hidden { opacity: .55; background: #f1f5f9; }
    .toc-builder .toc-row.is-missing { border-left: 3px solid #f59e0b; }
    .toc-builder .toc-reorder { display:flex; flex-direction:column; gap:2px; }
    .toc-builder .toc-reorder button { width:24px; height:18px; padding:0; line-height:1; border:1px solid #cbd5e1; background:#fff; border-radius:3px; cursor:pointer; font-size:11px; color:#475569; }
    .toc-builder .toc-reorder button:hover { background:#e0e7ff; border-color:#6366f1; color:#1e3a8a; }
    .toc-builder input[type=checkbox] { width:18px; height:18px; }
    .toc-builder input[type=text] { width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; }
    .toc-builder .toc-anchor { font-family: ui-monospace, SFMono-Regular, Menlo, monospace; font-size:12px; color:#475569; background:#fff; border:1px dashed #cbd5e1; padding:6px 8px; border-radius:4px; text-align:center; user-select:all; }
    .toc-builder .toc-remove { background:transparent; border:none; cursor:pointer; color:#94a3b8; font-size:18px; line-height:1; padding:0; }
    .toc-builder .toc-remove:hover { color:#dc2626; }
    .toc-builder .toc-row.is-auto .toc-remove { visibility:hidden; }
    .toc-builder .toc-head { display:grid; grid-template-columns: 28px 28px 1fr 220px 28px; gap:10px; padding:4px 10px; font-size:11px; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:.5px; }
    .toc-builder .toc-actions { display:flex; gap:8px; margin-top:12px; }
    .toc-builder .toc-actions button { padding:8px 14px; border-radius:5px; border:1px solid #cbd5e1; background:#fff; cursor:pointer; font-size:13px; }
    .toc-builder .toc-actions .btn-primary { background:#19335D; color:#fff; border-color:#19335D; }
    .toc-builder .toc-actions .btn-reset { color:#dc2626; border-color:#fecaca; }
    .toc-tip { background:#eff6ff; border-left:3px solid #2563eb; padding:10px 12px; margin:12px 0; font-size:12px; color:#1e3a8a; border-radius:0 4px 4px 0; line-height:1.6; }
</style>

<h3>🗂️ Table of Contents (TOC)</h3>

<div class="toc-tip">
    👋 <strong>How it works:</strong> Every section you fill in (Hero, Logos, Features, Sections, Testimonials, Demo, FAQ…) is auto-listed below in page order.
    Only edit the <strong>Label</strong> column — the anchor IDs are detected automatically and wired up for you.<br>
    Use <strong>↑ ↓</strong> to reorder, untick <strong>Show</strong> to hide an item, or click <strong>+ Add custom item</strong> to point to a custom anchor on the page.
</div>

<div class="field-group" style="margin-bottom:10px;">
    <label><input type="checkbox" name="toc_enabled" value="custom" <?php checked($toc_enabled, 'custom'); ?>>
        <strong>Use my labels &amp; order below</strong> (uncheck to auto-build the TOC from defaults)
    </label>
</div>

<div class="toc-builder" id="toc-builder">
    <div class="toc-head">
        <span>↕</span>
        <span title="Show">👁</span>
        <span>Label (what the visitor sees)</span>
        <span>Anchor ID (auto)</span>
        <span></span>
    </div>
    <div id="toc-items-container">
    <?php foreach ($ordered as $i => $row) :
        $is_auto = ($row['custom'] !== '1');
        $is_missing = !$row['still_avail']; // saved label points to a section that no longer exists
    ?>
        <div class="toc-row<?php echo $row['show'] === '0' ? ' is-hidden' : ''; ?><?php echo $is_missing ? ' is-missing' : ''; ?><?php echo $is_auto ? ' is-auto' : ''; ?>" data-anchor="<?php echo esc_attr($row['anchor']); ?>">
            <div class="toc-reorder">
                <button type="button" title="Move up"   onclick="eeTocMove(this,-1)">▲</button>
                <button type="button" title="Move down" onclick="eeTocMove(this, 1)">▼</button>
            </div>
            <label style="margin:0; display:flex; align-items:center; justify-content:center;">
                <input type="checkbox" name="toc_items[<?php echo $i; ?>][show]" value="1" <?php checked($row['show'], '1'); ?>
                       onchange="this.closest('.toc-row').classList.toggle('is-hidden', !this.checked)">
            </label>
            <input type="text" name="toc_items[<?php echo $i; ?>][label]" value="<?php echo esc_attr($row['label']); ?>"
                   placeholder="<?php echo esc_attr($row['auto_label'] ?: 'Section name'); ?>">
            <code class="toc-anchor" title="Click to copy">#<?php echo esc_html($row['anchor']); ?><input type="hidden" name="toc_items[<?php echo $i; ?>][anchor]" value="<?php echo esc_attr($row['anchor']); ?>"><input type="hidden" name="toc_items[<?php echo $i; ?>][custom]" value="<?php echo esc_attr($row['custom']); ?>"></code>
            <button type="button" class="toc-remove" title="Remove this custom item"
                    onclick="if(confirm('Remove this TOC item?')) this.closest('.toc-row').remove();">✕</button>
        </div>
    <?php endforeach; ?>
    </div>

    <div class="toc-actions">
        <button type="button" class="add-item-btn" onclick="eeTocAddCustom()">+ Add custom item</button>
        <button type="button" class="btn-reset" onclick="eeTocReset()">↺ Reset to defaults</button>
        <button type="button" class="btn-primary" onclick="eeTocShowAll(true)">Show all</button>
        <button type="button" onclick="eeTocShowAll(false)">Hide all</button>
    </div>
</div>

<script>
(function(){
    window.eeTocMove = function(btn, dir) {
        var row = btn.closest('.toc-row');
        var sibling = dir < 0 ? row.previousElementSibling : row.nextElementSibling;
        if (sibling) row.parentNode.insertBefore(dir < 0 ? row : sibling, dir < 0 ? sibling : row);
        eeTocReindex();
    };
    window.eeTocShowAll = function(show) {
        document.querySelectorAll('#toc-items-container .toc-row input[type=checkbox]').forEach(function(cb){
            cb.checked = !!show;
            cb.closest('.toc-row').classList.toggle('is-hidden', !show);
        });
    };
    window.eeTocAddCustom = function() {
        var label = prompt('Label to show in TOC?', '');
        if (!label) return;
        var anchor = prompt('Anchor ID on the page (no #)? e.g. my-section', '');
        if (!anchor) return;
        anchor = anchor.replace(/[^a-z0-9\-_]/gi, '-').toLowerCase();
        var container = document.getElementById('toc-items-container');
        var idx = container.children.length;
        var row = document.createElement('div');
        row.className = 'toc-row';
        row.dataset.anchor = anchor;
        row.innerHTML = '<div class="toc-reorder">' +
            '<button type="button" title="Move up" onclick="eeTocMove(this,-1)">▲</button>' +
            '<button type="button" title="Move down" onclick="eeTocMove(this,1)">▼</button>' +
            '</div>' +
            '<label style="margin:0;display:flex;align-items:center;justify-content:center;">' +
            '<input type="checkbox" name="toc_items['+idx+'][show]" value="1" checked onchange="this.closest(\'.toc-row\').classList.toggle(\'is-hidden\', !this.checked)">' +
            '</label>' +
            '<input type="text" name="toc_items['+idx+'][label]" value="'+label.replace(/"/g,'&quot;')+'">' +
            '<code class="toc-anchor">#'+anchor+
            '<input type="hidden" name="toc_items['+idx+'][anchor]" value="'+anchor+'">' +
            '<input type="hidden" name="toc_items['+idx+'][custom]" value="1">' +
            '</code>' +
            '<button type="button" class="toc-remove" onclick="if(confirm(\'Remove this TOC item?\')) this.closest(\'.toc-row\').remove();">✕</button>';
        container.appendChild(row);
    };
    window.eeTocReset = function() {
        if (!confirm('Reset all labels, order and visibility to defaults? Your customizations will be lost.')) return;
        var cb = document.querySelector('input[name="toc_enabled"]');
        if (cb) cb.checked = false;
        document.querySelectorAll('#toc-items-container input[type=text]').forEach(function(input){
            var ph = input.getAttribute('placeholder') || '';
            input.value = ph;
        });
        eeTocShowAll(true);
    };
    function eeTocReindex(){
        document.querySelectorAll('#toc-items-container .toc-row').forEach(function(row, idx){
            row.querySelectorAll('input, select, textarea').forEach(function(el){
                if (!el.name) return;
                el.name = el.name.replace(/toc_items\[\d+\]/, 'toc_items['+idx+']');
            });
        });
    }
    /* Re-index after any drag/remove. Bind to mutation as a safety net. */
    var observer = new MutationObserver(eeTocReindex);
    observer.observe(document.getElementById('toc-items-container'), { childList: true });
})();
</script>
    <?php
}

// ══════════════════════════════════════════════════════════
// G1. INDUSTRY MENU HELPER — shared by header.php (desktop + mobile) AND /industries/ page
// ══════════════════════════════════════════════════════════
/**
 * Return the list of Industry items to render in nav menus + landing cards.
 * Pulls from the Industry CPT first; falls back to a seeded set when empty
 * so the header never renders with zero items on a fresh install.
 *
 * @param int $limit  Maximum items to return (0 = no limit).
 * @return array<array{title:string,desc:string,short_desc:string,icon:string,url:string,tags:array}>
 */
if (!function_exists('ee_format_rich_text')) {
    /**
     * Converts admin textarea input to safe HTML with bullet/number lists.
     * - Lines starting with "- ", "* ", or "• " become <ul><li>
     * - Lines starting with "1. ", "2. " ... become <ol><li>
     * - Blank-line-separated blocks become <p>
     * - Raw HTML the editor types (e.g. <ul><li>) is preserved.
     */
    function ee_format_rich_text($text) {
        if ($text === null || $text === '') return '';
        $text = (string) $text;
        $text = str_replace(array("\r\n", "\r"), "\n", $text);

        $blocks = preg_split("/\n{2,}/", trim($text));
        $out = array();

        foreach ($blocks as $block) {
            $lines = explode("\n", $block);
            $first = ltrim($lines[0]);

            $is_ul = (bool) preg_match('/^(\-|\*|•)\s+/', $first);
            $is_ol = (bool) preg_match('/^\d+[\.\)]\s+/', $first);

            if ($is_ul || $is_ol) {
                $tag = $is_ul ? 'ul' : 'ol';
                $items = array();
                foreach ($lines as $ln) {
                    $ln = ltrim($ln);
                    if ($ln === '') continue;
                    $ln = preg_replace('/^(\-|\*|•)\s+/', '', $ln);
                    $ln = preg_replace('/^\d+[\.\)]\s+/', '', $ln);
                    $items[] = '<li>' . $ln . '</li>';
                }
                $out[] = '<' . $tag . '>' . implode('', $items) . '</' . $tag . '>';
            } else {
                $out[] = wpautop($block);
            }
        }

        return wp_kses_post(implode("\n", $out));
    }
}

function ee_get_industry_menu_items($limit = 0) {
    static $cache = null;
    if ($cache !== null) {
        return $limit > 0 ? array_slice($cache, 0, $limit) : $cache;
    }

    $items = array();
    $q = new WP_Query(array(
        'post_type'      => 'industry',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ));
    if ($q->have_posts()) {
        while ($q->have_posts()) {
            $q->the_post();
            $pid       = get_the_ID();
            $meta_desc = get_post_meta($pid, '_industry_description', true);
            $meta_sdesc= get_post_meta($pid, '_industry_short_desc', true);
            $desc      = $meta_desc ?: (get_the_excerpt() ?: wp_trim_words(get_the_content(), 24, '…'));
            $short     = $meta_sdesc ?: wp_trim_words($desc, 9, '…');
            $items[] = array(
                'title'      => get_the_title(),
                'desc'       => $desc,
                'short_desc' => $short,
                'icon'       => get_post_meta($pid, '_industry_icon_url', true),
                'url'        => get_post_meta($pid, '_industry_link_url', true) ?: get_permalink($pid),
                'tags'       => array_values(array_filter(array(
                    get_post_meta($pid, '_industry_tag_1', true),
                    get_post_meta($pid, '_industry_tag_2', true),
                    get_post_meta($pid, '_industry_tag_3', true),
                ))),
            );
        }
        wp_reset_postdata();
    }

    if (empty($items)) {
        $items = array(
            array('title' => 'Higher Education',       'desc' => 'End-to-end admissions solutions tailored for higher education institutions.', 'short_desc' => 'For higher ed institutions.',       'icon' => 'https://www.extraaedge.com/wp-content/uploads/2022/06/enterprise.png',       'url' => '/industries/higher-education-crm/',   'tags' => array('Lead Automation','Multi-Campus','Analytics')),
            array('title' => 'School',                 'desc' => 'A customized CRM to digitize and streamline student admissions processes.',    'short_desc' => 'Digitize student admissions.',    'icon' => 'https://www.extraaedge.com/wp-content/uploads/2022/06/classroom.png',        'url' => '/industries/school-crm/',             'tags' => array('Parent Engagement','Digital Forms','Workflows')),
            array('title' => 'EdTech',                 'desc' => 'A comprehensive admissions platform built for tech-driven learning organizations.', 'short_desc' => 'For tech-driven learning.',  'icon' => 'https://www.extraaedge.com/wp-content/uploads/2022/06/online-learning-1.png', 'url' => '/industries/edtech-crm/',             'tags' => array('API Integrations','Funnel Tracking','Retargeting')),
            array('title' => 'Vocational',             'desc' => 'A powerful CRM designed to support vocational training admissions.',           'short_desc' => 'Vocational training.',            'icon' => 'https://www.extraaedge.com/wp-content/uploads/2022/06/vocational-1.png',     'url' => '/industries/vocational-crm/',         'tags' => array('Batch Management','Fee Tracking','Counselling')),
            array('title' => 'Coaching Institute CRM', 'desc' => 'An all-in-one CRM solution for test prep and coaching institutes.',           'short_desc' => 'All-in-one for test prep.',       'icon' => 'https://www.extraaedge.com/wp-content/uploads/2022/06/class-1.png',          'url' => '/industries/coaching-institute-crm/', 'tags' => array('Demo Tracking','WhatsApp CRM','Reports')),
            array('title' => 'Overseas',               'desc' => 'A complete applications platform for study abroad and international admissions teams.', 'short_desc' => 'Study abroad admissions.', 'icon' => 'https://www.extraaedge.com/wp-content/uploads/2022/06/departure-1.png',      'url' => '/industries/overseas-crm/',           'tags' => array('Visa Pipeline','Doc Collection','Multi-Country')),
        );
    }

    $cache = $items;
    return $limit > 0 ? array_slice($items, 0, $limit) : $items;
}

// ══════════════════════════════════════════════════════════
// G2. INDUSTRY CPT META BOX — 4 card-render fields
// ══════════════════════════════════════════════════════════
/**
 * Each "Industry" post becomes one card on /industries/.
 * Title         → card heading (use post title)
 * Excerpt       → card description (use post excerpt, fallback to content trim)
 * Meta fields below → icon image, external URL, tag pills
 */
add_action('add_meta_boxes', function () {
    add_meta_box(
        'industry_card_settings',
        '🏷 Industry Card Settings (icon, link, tags)',
        function ($post) {
            wp_nonce_field('industry_card_meta', 'industry_card_meta_nonce');
            $icon = get_post_meta($post->ID, '_industry_icon_url', true);
            $url  = get_post_meta($post->ID, '_industry_link_url', true);
            $desc = get_post_meta($post->ID, '_industry_description', true);
            $sdesc= get_post_meta($post->ID, '_industry_short_desc', true);
            $t1   = get_post_meta($post->ID, '_industry_tag_1',   true);
            $t2   = get_post_meta($post->ID, '_industry_tag_2',   true);
            $t3   = get_post_meta($post->ID, '_industry_tag_3',   true);
            ?>
            <style>
                .ind-row { margin-bottom: 18px; }
                .ind-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
                .ind-row input, .ind-row textarea { width:100%; padding:8px; border:1px solid #ddd; border-radius:4px; font-size:13px; font-family:inherit; }
                .ind-row textarea { resize:vertical; min-height:70px; }
                .ind-row .hint { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
                .ind-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
            </style>
            <div class="ind-row">
                <label>Card Icon URL <span style="color:#DE6E30">★</span></label>
                <input type="url" name="industry_icon_url" value="<?php echo esc_attr($icon); ?>" placeholder="https://www.extraaedge.com/wp-content/uploads/2022/06/enterprise.png">
                <p class="hint">Square 30×30 to 60×60 px PNG/SVG. Browse <strong>Media Library</strong> → click image → copy "File URL" → paste here.</p>
            </div>
            <div class="ind-row">
                <label>External Link URL (where the card opens) <span style="color:#DE6E30">★</span></label>
                <input type="url" name="industry_link_url" value="<?php echo esc_attr($url); ?>" placeholder="https://www.extraaedge.com/industries/higher-education-crm/">
                <p class="hint">Full URL the visitor goes to when clicking the card.</p>
            </div>
            <div class="ind-row">
                <label>Card Description (shown on the /industries/ card) <span style="color:#DE6E30">★</span></label>
                <textarea name="industry_description" rows="3" placeholder="End-to-end admissions solutions tailored for higher education institutions."><?php echo esc_textarea($desc); ?></textarea>
                <p class="hint">1–2 sentences (max ~25 words). Falls back to the post Excerpt when blank.</p>
            </div>
            <div class="ind-row">
                <label>Short Description (shown in the header mega-menu)</label>
                <input type="text" name="industry_short_desc" value="<?php echo esc_attr($sdesc); ?>" placeholder="For higher ed institutions.">
                <p class="hint">Very short (≤ 9 words). Falls back to a trimmed version of the description above.</p>
            </div>
            <div class="ind-row">
                <label>Tag pills (3 short labels shown on the card)</label>
                <div class="ind-grid">
                    <input type="text" name="industry_tag_1" value="<?php echo esc_attr($t1); ?>" placeholder="Lead Automation">
                    <input type="text" name="industry_tag_2" value="<?php echo esc_attr($t2); ?>" placeholder="Multi-Campus">
                    <input type="text" name="industry_tag_3" value="<?php echo esc_attr($t3); ?>" placeholder="Analytics">
                </div>
                <p class="hint">Keep each tag under 2 words. Leave blank to skip a pill.</p>
            </div>
            <div style="background:#f0f6fc; border-left:3px solid #0073aa; padding:12px 14px; margin-top:18px; font-size:12px;">
                <strong>💡 Tip:</strong> The card heading comes from the post <strong>Title</strong> above. The card description comes from the <strong>Excerpt</strong> field (Document panel → Excerpt). Keep the excerpt under 25 words for best layout.
            </div>
            <?php
        },
        'industry',
        'normal',
        'high'
    );
});
add_action('save_post_industry', function ($post_id) {
    if (!isset($_POST['industry_card_meta_nonce']) || !wp_verify_nonce($_POST['industry_card_meta_nonce'], 'industry_card_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    $fields = array('industry_icon_url', 'industry_link_url', 'industry_tag_1', 'industry_tag_2', 'industry_tag_3', 'industry_short_desc');
    foreach ($fields as $f) {
        if (isset($_POST[$f])) {
            update_post_meta($post_id, '_' . $f, sanitize_text_field(wp_unslash($_POST[$f])));
        }
    }
    if (isset($_POST['industry_description'])) {
        update_post_meta($post_id, '_industry_description', sanitize_textarea_field(wp_unslash($_POST['industry_description'])));
    }
});

// ══════════════════════════════════════════════════════════
// H. SAVE META BOX DATA
// ══════════════════════════════════════════════════════════
function product_save_meta_box_data($post_id) {
    // Standard guards
    if (!isset($_POST['product_meta_box_nonce']) || !wp_verify_nonce($_POST['product_meta_box_nonce'], 'product_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (!in_array(get_post_type($post_id), array('product', 'industry'), true)) return;

    // ─── SEO ───
    $seo_fields = array('seo_title','seo_description','seo_keywords','og_image','canonical_url','schema_type','twitter_card','twitter_title','twitter_desc');
    foreach ($seo_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field(wp_unslash($_POST[$field])));
        }
    }

    // ─── Hero text fields ───
    $hero_text_fields = array('hero_badge','hero_h1_before','hero_h1_highlight','hero_h1_after','hero_description','result_badge','hero_cta_text','hero_cta_url','hero_cta2_text','hero_cta2_url','trust_rating','trust_text');
    foreach ($hero_text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }

    // ─── FORM EMBED ───
    if (isset($_POST['form_embed'])) {
        if (current_user_can('unfiltered_html')) {
            update_post_meta($post_id, '_form_embed', wp_unslash($_POST['form_embed']));
        } else {
            $allowed_html = array(
                'script'   => array('src'=>array(),'async'=>array(),'defer'=>array(),'type'=>array(),'charset'=>array(),'id'=>array()),
                'div'      => array('id'=>array(),'class'=>array(),'style'=>array(),'data-*'=>true),
                'form'     => array('action'=>array(),'method'=>array(),'id'=>array(),'class'=>array(),'name'=>array()),
                'input'    => array('type'=>array(),'name'=>array(),'id'=>array(),'class'=>array(),'placeholder'=>array(),'required'=>array(),'value'=>array()),
                'textarea' => array('name'=>array(),'id'=>array(),'class'=>array(),'placeholder'=>array(),'rows'=>array()),
                'select'   => array('name'=>array(),'id'=>array(),'class'=>array()),
                'option'   => array('value'=>array(),'selected'=>array()),
                'button'   => array('type'=>array(),'id'=>array(),'class'=>array()),
                'label'    => array('for'=>array(),'class'=>array()),
                'iframe'   => array('src'=>array(),'width'=>array(),'height'=>array(),'frameborder'=>array(),'style'=>array(),'loading'=>array(),'title'=>array()),
                'a'        => array('href'=>array(),'target'=>array(),'class'=>array(),'rel'=>array()),
                'p'        => array('class'=>array()), 'span' => array('class'=>array()), 'br' => array(),
                'h1' => array('class'=>array()), 'h2' => array('class'=>array()), 'h3' => array('class'=>array()),
                'strong' => array(), 'em' => array(),
            );
            update_post_meta($post_id, '_form_embed', wp_kses(wp_unslash($_POST['form_embed']), $allowed_html));
        }
    }

    // ─── Simple repeaters ───
    if (isset($_POST['hero_proofs']) && is_array($_POST['hero_proofs'])) {
        update_post_meta($post_id, '_hero_proofs', array_map('sanitize_text_field', wp_unslash($_POST['hero_proofs'])));
    }
    if (isset($_POST['tags']) && is_array($_POST['tags'])) {
        update_post_meta($post_id, '_tags', array_map('sanitize_text_field', wp_unslash($_POST['tags'])));
    }

    // ─── Stats ───
    if (isset($_POST['stats']) && is_array($_POST['stats'])) {
        $stats = array();
        foreach ($_POST['stats'] as $stat) {
            $stats[] = array(
                'number' => sanitize_text_field(wp_unslash($stat['number'] ?? '')),
                'label'  => sanitize_text_field(wp_unslash($stat['label']  ?? '')),
            );
        }
        update_post_meta($post_id, '_stats', $stats);
    }

    // ─── Compliance ───
    if (isset($_POST['compliance']) && is_array($_POST['compliance'])) {
        $compliance = array();
        foreach ($_POST['compliance'] as $comp) {
            if (!empty($comp['image'])) {
                $compliance[] = array(
                    'image' => esc_url_raw(wp_unslash($comp['image'])),
                    'text'  => sanitize_text_field(wp_unslash($comp['text'] ?? '')),
                );
            }
        }
        update_post_meta($post_id, '_compliance', $compliance);
    }

    // ─── Logos meta + items ───
    $logo_fields = array('logo_badge','logo_title_line1','logo_title','logo_sub','logo_footer_cta','logo_footer_cta_url','logo_live_text');
    foreach ($logo_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['logos']) && is_array($_POST['logos'])) {
        $logos = array();
        foreach ($_POST['logos'] as $logo) {
            if (!empty($logo['image'])) {
                $logos[] = array(
                    'image' => esc_url_raw(wp_unslash($logo['image'])),
                    'alt'   => sanitize_text_field(wp_unslash($logo['alt'] ?? '')),
                );
            }
        }
        update_post_meta($post_id, '_logos', $logos);
    }

    // ─── Education CRM ───
    $educrm_fields = array('educrm_h2','educrm_p1','educrm_p2','educrm_p3','growth_val','growth_text');
    foreach ($educrm_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['flow_steps']) && is_array($_POST['flow_steps'])) {
        $flow_steps = array();
        foreach ($_POST['flow_steps'] as $step) {
            if (!empty($step['label'])) {
                $flow_steps[] = array('label' => sanitize_text_field(wp_unslash($step['label'])));
            }
        }
        update_post_meta($post_id, '_flow_steps', $flow_steps);
    }

    // ─── Features ───
    if (isset($_POST['features_h2'])) {
        update_post_meta($post_id, '_features_h2', sanitize_text_field(wp_unslash($_POST['features_h2'])));
    }
    if (isset($_POST['features']) && is_array($_POST['features'])) {
        $features = array();
        foreach ($_POST['features'] as $feature) {
            if (!empty($feature['image'])) {
                $features[] = array(
                    'image' => esc_url_raw(wp_unslash($feature['image'])),
                    'title' => sanitize_text_field(wp_unslash($feature['title'] ?? '')),
                    'alt'   => sanitize_text_field(wp_unslash($feature['alt']   ?? '')),
                );
            }
        }
        update_post_meta($post_id, '_features', $features);
    }

    // ─── Sections ───
    if (isset($_POST['sections']) && is_array($_POST['sections'])) {
        $sections = array();
        foreach ($_POST['sections'] as $section) {
            if (!empty($section['heading'])) {
                $img_pos = $section['image_position'] ?? 'right';
                $sections[] = array(
                    'id'               => sanitize_title(wp_unslash($section['id'] ?? '')),
                    'heading'          => sanitize_text_field(wp_unslash($section['heading'])),
                    'description'      => sanitize_textarea_field(wp_unslash($section['description'] ?? '')),
                    'features_heading' => sanitize_text_field(wp_unslash($section['features_heading'] ?? '')),
                    'features'         => sanitize_textarea_field(wp_unslash($section['features']    ?? '')),
                    'image'            => esc_url_raw(wp_unslash($section['image'] ?? '')),
                    'image_position'   => in_array($img_pos, array('left','right'), true) ? $img_pos : 'right',
                    'cta_text'         => sanitize_text_field(wp_unslash($section['cta_text'] ?? '')),
                    'cta_url'          => esc_url_raw(wp_unslash($section['cta_url']  ?? '')),
                );
            }
        }
        update_post_meta($post_id, '_content_sections', $sections);
    }

    // ─── Bottom CTA ───
    $bottom_fields = array('bottom_label','bottom_h2','bottom_h3','bottom_cta_text','bottom_cta_url');
    foreach ($bottom_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['products']) && is_array($_POST['products'])) {
        $products = array();
        foreach ($_POST['products'] as $product) {
            $products[] = array(
                'logo'  => esc_url_raw(wp_unslash($product['logo']  ?? '')),
                'title' => sanitize_text_field(wp_unslash($product['title'] ?? '')),
                'url'   => esc_url_raw(wp_unslash($product['url']   ?? '')),
            );
        }
        update_post_meta($post_id, '_products', $products);
    }

    // ─── Testimonials ───
    $testi_fields = array('testi_tagline','testi_title','testi_sub');
    foreach ($testi_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['metrics']) && is_array($_POST['metrics'])) {
        $metrics = array();
        foreach ($_POST['metrics'] as $metric) {
            $metrics[] = array(
                'target' => sanitize_text_field(wp_unslash($metric['target'] ?? '')),
                'suffix' => sanitize_text_field(wp_unslash($metric['suffix'] ?? '')),
                'label'  => sanitize_text_field(wp_unslash($metric['label']  ?? '')),
                'locale' => isset($metric['locale']) ? 'true' : '',
            );
        }
        update_post_meta($post_id, '_testi_metrics', $metrics);
    }
    if (isset($_POST['testimonials']) && is_array($_POST['testimonials'])) {
        $testimonials = array();
        foreach ($_POST['testimonials'] as $test) {
            if (!empty($test['youtube_id'])) {
                $testimonials[] = array(
                    'youtube_id'  => sanitize_text_field(wp_unslash($test['youtube_id'])),
                    'quote'       => sanitize_textarea_field(wp_unslash($test['quote'] ?? '')),
                    'name'        => sanitize_text_field(wp_unslash($test['name']        ?? '')),
                    'role'        => sanitize_text_field(wp_unslash($test['role']        ?? '')),
                    'institution' => sanitize_text_field(wp_unslash($test['institution'] ?? '')),
                    'avatar'      => esc_url_raw(wp_unslash($test['avatar'] ?? '')),
                );
            }
        }
        update_post_meta($post_id, '_testimonials', $testimonials);
    }

    // ─── AI Demo ───
    $aidemo_fields = array('aidemo_h2','aidemo_sub','aidemo_cta_text','aidemo_cta_url','aidemo_trust','aidemo_expert_img');
    foreach ($aidemo_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['workflow_nodes']) && is_array($_POST['workflow_nodes'])) {
        $workflow_nodes = array();
        foreach ($_POST['workflow_nodes'] as $node) {
            $workflow_nodes[] = array(
                'num'   => sanitize_text_field(wp_unslash($node['num']   ?? '')),
                'title' => sanitize_text_field(wp_unslash($node['title'] ?? '')),
                'sub'   => sanitize_text_field(wp_unslash($node['sub']   ?? '')),
            );
        }
        update_post_meta($post_id, '_workflow_nodes', $workflow_nodes);
    }

    // ─── FAQ ───
    $faq_fields = array('faq_badge','faq_title','faq_subtitle');
    foreach ($faq_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['faqs']) && is_array($_POST['faqs'])) {
        $faqs = array();
        foreach ($_POST['faqs'] as $faq) {
            if (!empty($faq['question'])) {
                $faqs[] = array(
                    'question' => sanitize_text_field(wp_unslash($faq['question'])),
                    'answer'   => wp_kses_post(wp_unslash($faq['answer'] ?? '')),
                );
            }
        }
        update_post_meta($post_id, '_faqs', $faqs);
    }

    // ─── TOC ───
    if (isset($_POST['toc_enabled'])) {
        update_post_meta($post_id, '_toc_enabled', sanitize_text_field(wp_unslash($_POST['toc_enabled'])));
    } else {
        delete_post_meta($post_id, '_toc_enabled');
    }
    if (isset($_POST['toc_items']) && is_array($_POST['toc_items'])) {
        $toc_items = array();
        foreach ($_POST['toc_items'] as $item) {
            if (empty($item['anchor'])) continue;
            $toc_items[] = array(
                'label'  => isset($item['label'])  ? sanitize_text_field(wp_unslash($item['label']))   : '',
                'anchor' => sanitize_title(wp_unslash($item['anchor'])),
                'show'   => !empty($item['show']) ? '1' : '0',
                'custom' => !empty($item['custom']) ? '1' : '0',
            );
        }
        update_post_meta($post_id, '_toc_items', $toc_items);
    }
}
add_action('save_post', 'product_save_meta_box_data');

// ══════════════════════════════════════════════════════════
// I. FLUSH REWRITE RULES ON THEME ACTIVATION
// ══════════════════════════════════════════════════════════
function extraaedge_flush_rewrites() {
    extraaedge_register_cpts();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'extraaedge_flush_rewrites');

// ══════════════════════════════════════════════════════════════════════════
//  ╔════════════════════════════════════════════════════════════════════╗
//  ║   ExtraaEdge SEO & TRACKING ADMIN PAGE (for non-coders)            ║
//  ║   Settings → ExtraaEdge SEO & Tracking                             ║
//  ║                                                                    ║
//  ║   Lets your team paste GTM/GA4/Clarity/FB Pixel/Schema/Verification║
//  ║   IDs through a simple form — no PHP file edits required.          ║
//  ║   Stored in wp_options table under 'ee_tracking_settings'.         ║
//  ╚════════════════════════════════════════════════════════════════════╝
// ══════════════════════════════════════════════════════════════════════════

// 1. Register the admin menu
add_action('admin_menu', function () {
    add_options_page(
        'ExtraaEdge SEO & Tracking',          // Page title
        '🌐 SEO & Tracking',                   // Menu label
        'manage_options',                      // Capability
        'ee-tracking',                         // Slug
        'ee_tracking_render_page'              // Callback
    );
});

// 2. Register settings + sanitize
add_action('admin_init', function () {
    register_setting('ee_tracking_group', 'ee_tracking_settings', [
        'sanitize_callback' => function ($input) {
            if (!is_array($input)) return [];
            // Whitelist only known keys; strip the rest
            $clean = [];
            $text_keys = [
                'gtm_id', 'ga4_id', 'clarity_id', 'fb_pixel_id', 'ads_id', 'ads_label',
                'linkedin_id', 'hotjar_id', 'tiktok_pixel_id', 'pinterest_tag_id',
                'verify_google', 'verify_bing', 'verify_yandex', 'verify_pinterest',
                'verify_facebook', 'verify_norton',
            ];
            foreach ($text_keys as $k) {
                $clean[$k] = isset($input[$k]) ? sanitize_text_field(wp_unslash($input[$k])) : '';
            }
            // Code-paste fields keep their tags (admin only — capability checked)
            $code_keys = [
                'custom_head', 'custom_body_open', 'custom_footer',
                'custom_org_schema', 'custom_extra_schema',
            ];
            foreach ($code_keys as $k) {
                $clean[$k] = isset($input[$k]) ? wp_unslash($input[$k]) : '';
            }
            return $clean;
        },
    ]);
});

// 3. Render the page
function ee_tracking_render_page() {
    if (!current_user_can('manage_options')) return;
    $o = get_option('ee_tracking_settings', []);
    $f = function ($k) use ($o) { return isset($o[$k]) ? $o[$k] : ''; };
    $tab = isset($_GET['tab']) ? sanitize_key($_GET['tab']) : 'tracking';
    $base = admin_url('options-general.php?page=ee-tracking');
    ?>
    <div class="wrap">
        <h1>🌐 ExtraaEdge SEO &amp; Tracking</h1>
        <p>Paste your tracking IDs and schema below. Codes will auto-inject into <code>&lt;head&gt;</code>, after <code>&lt;body&gt;</code>, or before <code>&lt;/body&gt;</code> — wherever each tool expects.</p>

        <h2 class="nav-tab-wrapper" style="margin-top:20px">
            <a href="<?php echo esc_url($base.'&tab=tracking');     ?>" class="nav-tab <?php echo $tab==='tracking'?'nav-tab-active':''; ?>">📊 Analytics &amp; Tracking</a>
            <a href="<?php echo esc_url($base.'&tab=schema');       ?>" class="nav-tab <?php echo $tab==='schema'?'nav-tab-active':''; ?>">🧩 Custom Schema</a>
            <a href="<?php echo esc_url($base.'&tab=verification'); ?>" class="nav-tab <?php echo $tab==='verification'?'nav-tab-active':''; ?>">🔍 Verification</a>
            <a href="<?php echo esc_url($base.'&tab=custom');       ?>" class="nav-tab <?php echo $tab==='custom'?'nav-tab-active':''; ?>">🔧 Custom Code</a>
            <a href="<?php echo esc_url($base.'&tab=help');         ?>" class="nav-tab <?php echo $tab==='help'?'nav-tab-active':''; ?>">❓ Help</a>
        </h2>

        <form method="post" action="options.php" style="margin-top:20px">
            <?php settings_fields('ee_tracking_group'); ?>

            <?php if ($tab === 'tracking') : ?>
                <h2>📊 Analytics &amp; Tracking IDs</h2>
                <p>Paste only the <strong>ID</strong>, not the full snippet — code is auto-generated.</p>
                <table class="form-table">
                    <tr>
                        <th><label>Google Tag Manager Container ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[gtm_id]" value="<?php echo esc_attr($f('gtm_id')); ?>" placeholder="GTM-XXXXXXX" class="regular-text">
                            <p class="description">Find it at tagmanager.google.com → Container → top right. Format: <code>GTM-XXXXXXX</code></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Google Analytics 4 (GA4) ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[ga4_id]" value="<?php echo esc_attr($f('ga4_id')); ?>" placeholder="G-XXXXXXXXXX" class="regular-text">
                            <p class="description">Analytics → Admin → Data Streams → Web. Format: <code>G-XXXXXXXXXX</code>. <em>Skip if using GTM (load GA4 from GTM).</em></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Microsoft Clarity Project ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[clarity_id]" value="<?php echo esc_attr($f('clarity_id')); ?>" placeholder="abcdef1234" class="regular-text">
                            <p class="description">clarity.microsoft.com → Project → Settings → Setup. Format: 10-character alphanumeric.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Facebook (Meta) Pixel ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[fb_pixel_id]" value="<?php echo esc_attr($f('fb_pixel_id')); ?>" placeholder="123456789012345" class="regular-text">
                            <p class="description">business.facebook.com → Events Manager → Data Sources. 15-digit number.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Google Ads Conversion ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[ads_id]" value="<?php echo esc_attr($f('ads_id')); ?>" placeholder="AW-1234567890" class="regular-text"><br>
                            <input type="text" name="ee_tracking_settings[ads_label]" value="<?php echo esc_attr($f('ads_label')); ?>" placeholder="Conversion Label (optional)" class="regular-text" style="margin-top:6px">
                            <p class="description">ads.google.com → Tools → Conversions. Format: <code>AW-XXXXXXXXXX</code></p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>LinkedIn Insight Tag ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[linkedin_id]" value="<?php echo esc_attr($f('linkedin_id')); ?>" placeholder="1234567" class="regular-text">
                            <p class="description">campaignmanager.linkedin.com → Insight Tag. 7-digit number.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Hotjar Site ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[hotjar_id]" value="<?php echo esc_attr($f('hotjar_id')); ?>" placeholder="3456789" class="regular-text">
                            <p class="description">insights.hotjar.com → Sites &amp; Organizations. 7-digit number.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>TikTok Pixel ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[tiktok_pixel_id]" value="<?php echo esc_attr($f('tiktok_pixel_id')); ?>" placeholder="C4XXXXXXXXXXXXXXXXX" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th><label>Pinterest Tag ID</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[pinterest_tag_id]" value="<?php echo esc_attr($f('pinterest_tag_id')); ?>" placeholder="2612345678901" class="regular-text">
                        </td>
                    </tr>
                </table>

            <?php elseif ($tab === 'schema') : ?>
                <h2>🧩 Custom Schema (JSON-LD)</h2>
                <p>Override or add to the auto-generated schema on every page. Paste valid JSON-LD only — validate first at <a href="https://validator.schema.org/" target="_blank">validator.schema.org</a>.</p>
                <table class="form-table">
                    <tr>
                        <th><label>Custom Organization Schema (overrides default)</label></th>
                        <td>
                            <textarea name="ee_tracking_settings[custom_org_schema]" rows="14" cols="80" style="width:100%;font-family:monospace;font-size:12px" placeholder='{"@context":"https://schema.org","@type":"Organization","name":"ExtraaEdge",...}'><?php echo esc_textarea($f('custom_org_schema')); ?></textarea>
                            <p class="description">Leave empty to use the theme's default. Paste a complete <code>{}</code> object (no <code>&lt;script&gt;</code> tags).</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Additional Schema (any extra type)</label></th>
                        <td>
                            <textarea name="ee_tracking_settings[custom_extra_schema]" rows="14" cols="80" style="width:100%;font-family:monospace;font-size:12px" placeholder='{"@context":"https://schema.org","@type":"Course","name":"..."}'><?php echo esc_textarea($f('custom_extra_schema')); ?></textarea>
                            <p class="description">Use for Course, Event, JobPosting, etc. Output sitewide. Use the per-post meta box for page-specific schema.</p>
                        </td>
                    </tr>
                </table>

            <?php elseif ($tab === 'verification') : ?>
                <h2>🔍 Search Console &amp; Verification Tags</h2>
                <p>Paste only the <strong>content value</strong> from each verification meta tag (not the whole <code>&lt;meta&gt;</code> tag).</p>
                <table class="form-table">
                    <tr>
                        <th><label>Google Search Console</label></th>
                        <td>
                            <input type="text" name="ee_tracking_settings[verify_google]" value="<?php echo esc_attr($f('verify_google')); ?>" placeholder="abc123xyz..." class="regular-text">
                            <p class="description">search.google.com/search-console → Add Property → HTML tag → copy <code>content="..."</code> value.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Bing Webmaster Tools</label></th>
                        <td><input type="text" name="ee_tracking_settings[verify_bing]" value="<?php echo esc_attr($f('verify_bing')); ?>" placeholder="A1B2C3..." class="regular-text"></td>
                    </tr>
                    <tr>
                        <th><label>Yandex Webmaster</label></th>
                        <td><input type="text" name="ee_tracking_settings[verify_yandex]" value="<?php echo esc_attr($f('verify_yandex')); ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th><label>Pinterest Domain Verification</label></th>
                        <td><input type="text" name="ee_tracking_settings[verify_pinterest]" value="<?php echo esc_attr($f('verify_pinterest')); ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th><label>Facebook Domain Verification</label></th>
                        <td><input type="text" name="ee_tracking_settings[verify_facebook]" value="<?php echo esc_attr($f('verify_facebook')); ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th><label>Norton Safe Web</label></th>
                        <td><input type="text" name="ee_tracking_settings[verify_norton]" value="<?php echo esc_attr($f('verify_norton')); ?>" class="regular-text"></td>
                    </tr>
                </table>

            <?php elseif ($tab === 'custom') : ?>
                <h2>🔧 Custom Code Injection</h2>
                <p>For one-off snippets that don't fit the fields above. Paste exactly as the vendor provides — including <code>&lt;script&gt;</code> tags.</p>
                <table class="form-table">
                    <tr>
                        <th><label>Custom <code>&lt;head&gt;</code> Code</label></th>
                        <td>
                            <textarea name="ee_tracking_settings[custom_head]" rows="8" cols="80" style="width:100%;font-family:monospace;font-size:12px" placeholder="<!-- Pixel, verification, async libs, etc -->"><?php echo esc_textarea($f('custom_head')); ?></textarea>
                            <p class="description">Injected inside <code>&lt;head&gt;</code>. Use for SEO plugins, additional pixels, A/B testing libs.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Code after <code>&lt;body&gt;</code></label></th>
                        <td>
                            <textarea name="ee_tracking_settings[custom_body_open]" rows="6" cols="80" style="width:100%;font-family:monospace;font-size:12px" placeholder="<!-- GTM noscript fallback, chat widgets, etc -->"><?php echo esc_textarea($f('custom_body_open')); ?></textarea>
                            <p class="description">Injected immediately after opening <code>&lt;body&gt;</code>. Best for chat widgets like Drift, Intercom, Tawk.to.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Code before <code>&lt;/body&gt;</code></label></th>
                        <td>
                            <textarea name="ee_tracking_settings[custom_footer]" rows="6" cols="80" style="width:100%;font-family:monospace;font-size:12px" placeholder="<!-- Heatmap, exit-intent, deferred analytics -->"><?php echo esc_textarea($f('custom_footer')); ?></textarea>
                            <p class="description">Injected before closing <code>&lt;/body&gt;</code>. Best for deferred / non-critical scripts.</p>
                        </td>
                    </tr>
                </table>

            <?php elseif ($tab === 'help') : ?>
                <h2>❓ How to Use This Page</h2>
                <div style="background:#fff;border:1px solid #ccd0d4;padding:20px;border-radius:6px;max-width:900px;line-height:1.8">
                    <h3>📊 Analytics &amp; Tracking Tab</h3>
                    <ul style="list-style:disc;margin-left:24px">
                        <li><strong>Best practice:</strong> Install <strong>only GTM</strong>, then load GA4 / FB Pixel / Clarity from inside GTM. That way you can edit tracking without touching this page again.</li>
                        <li><strong>Direct install:</strong> If you don't use GTM, paste each ID separately and the theme builds the snippet for you.</li>
                        <li><strong>Test:</strong> After saving, open your site in Incognito, then open DevTools → Network tab → search "google-analytics" or "clarity" — you should see requests fired.</li>
                    </ul>

                    <h3>🧩 Custom Schema Tab</h3>
                    <ul style="list-style:disc;margin-left:24px">
                        <li><strong>Validate first:</strong> Paste JSON into <a href="https://validator.schema.org/" target="_blank">validator.schema.org</a> before saving here.</li>
                        <li><strong>Per-page schema:</strong> For product-page schema (FAQ, Software, Reviews), use the meta box on Edit Product — this tab is for sitewide additions.</li>
                    </ul>

                    <h3>🔍 Verification Tab</h3>
                    <ul style="list-style:disc;margin-left:24px">
                        <li>Each search engine gives you a meta tag like <code>&lt;meta name="google-site-verification" content="ABC123"&gt;</code>.</li>
                        <li><strong>Paste only the value between the quotes</strong> — not the whole tag.</li>
                    </ul>

                    <h3>🔧 Custom Code Tab</h3>
                    <ul style="list-style:disc;margin-left:24px">
                        <li>This is the "paste-anything" escape hatch. Use it for tools without a dedicated field above.</li>
                        <li><strong>Security:</strong> Only Administrators can save here — keep this account restricted.</li>
                    </ul>

                    <h3>🚫 What NOT to do</h3>
                    <ul style="list-style:disc;margin-left:24px">
                        <li>Don't paste the same tracker in both GTM AND the Analytics tab — you'll double-count events.</li>
                        <li>Don't paste <code>&lt;script&gt;</code> tags in the Schema tab — it expects raw JSON only.</li>
                        <li>Don't paste full HTML in the ID fields — only the ID string (e.g. <code>GTM-ABC1234</code>).</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (in_array($tab, ['tracking', 'schema', 'verification', 'custom'], true)) submit_button('💾 Save Changes'); ?>
        </form>

        <?php if ($tab === 'tracking' && ($f('gtm_id') || $f('ga4_id') || $f('clarity_id') || $f('fb_pixel_id'))) : ?>
        <div style="margin-top:30px;background:#e7f5e7;border-left:4px solid #46b450;padding:14px 18px;border-radius:4px">
            <strong>✅ Tracking active:</strong>
            <?php foreach (['gtm_id'=>'GTM','ga4_id'=>'GA4','clarity_id'=>'Clarity','fb_pixel_id'=>'Meta Pixel','ads_id'=>'Google Ads','linkedin_id'=>'LinkedIn','hotjar_id'=>'Hotjar','tiktok_pixel_id'=>'TikTok','pinterest_tag_id'=>'Pinterest'] as $k => $label) {
                if ($f($k)) echo '<span style="display:inline-block;background:#46b450;color:#fff;padding:3px 10px;border-radius:12px;margin:2px;font-size:12px">'.esc_html($label).'</span>';
            } ?>
        </div>
        <?php endif; ?>
    </div>
    <?php
}

// ══════════════════════════════════════════════════════════════════════════
// 4. INJECTION HOOKS — output the right snippet in the right place
// ══════════════════════════════════════════════════════════════════════════

// 4a. <head> injection — verification meta + GTM head + GA4 + Clarity + FB + Hotjar + LinkedIn + TikTok + Pinterest + Ads + custom code + extra schema
add_action('wp_head', function () {
    $o = get_option('ee_tracking_settings', []);
    if (empty($o) || is_admin()) return;
    $g = function ($k) use ($o) { return isset($o[$k]) ? trim($o[$k]) : ''; };

    // Verification meta tags
    if ($g('verify_google'))    echo '<meta name="google-site-verification" content="' . esc_attr($g('verify_google')) . '">' . "\n";
    if ($g('verify_bing'))      echo '<meta name="msvalidate.01" content="' . esc_attr($g('verify_bing')) . '">' . "\n";
    if ($g('verify_yandex'))    echo '<meta name="yandex-verification" content="' . esc_attr($g('verify_yandex')) . '">' . "\n";
    if ($g('verify_pinterest')) echo '<meta name="p:domain_verify" content="' . esc_attr($g('verify_pinterest')) . '">' . "\n";
    if ($g('verify_facebook'))  echo '<meta name="facebook-domain-verification" content="' . esc_attr($g('verify_facebook')) . '">' . "\n";
    if ($g('verify_norton'))    echo '<meta name="norton-safeweb-site-verification" content="' . esc_attr($g('verify_norton')) . '">' . "\n";

    // Google Tag Manager — HEAD snippet
    if ($gtm = $g('gtm_id')) {
        echo "<!-- Google Tag Manager -->\n";
        echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . esc_js($gtm) . "');</script>\n";
        echo "<!-- End Google Tag Manager -->\n";
    }

    // GA4 (only if GTM is not installed — avoid double counting)
    if (!$g('gtm_id') && $ga4 = $g('ga4_id')) {
        echo "<!-- Google tag (gtag.js) -->\n";
        echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr($ga4) . '"></script>' . "\n";
        echo "<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','" . esc_js($ga4) . "');</script>\n";
    }

    // Microsoft Clarity
    if ($cl = $g('clarity_id')) {
        echo "<!-- Microsoft Clarity -->\n";
        echo "<script>(function(c,l,a,r,i,t,y){c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};t=l.createElement(r);t.async=1;t.src='https://www.clarity.ms/tag/'+i;y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);})(window,document,'clarity','script','" . esc_js($cl) . "');</script>\n";
    }

    // Facebook Pixel
    if ($fb = $g('fb_pixel_id')) {
        echo "<!-- Meta Pixel -->\n";
        echo "<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','" . esc_js($fb) . "');fbq('track','PageView');</script>\n";
        echo '<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=' . esc_attr($fb) . '&ev=PageView&noscript=1"/></noscript>' . "\n";
    }

    // Google Ads (gtag conversion tracking)
    if (!$g('gtm_id') && $ads = $g('ads_id')) {
        echo "<!-- Google Ads -->\n";
        echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr($ads) . '"></script>' . "\n";
        echo "<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','" . esc_js($ads) . "');</script>\n";
    }

    // Hotjar
    if ($hj = $g('hotjar_id')) {
        echo "<!-- Hotjar -->\n";
        echo "<script>(function(h,o,t,j,a,r){h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};h._hjSettings={hjid:" . (int) $hj . ",hjsv:6};a=o.getElementsByTagName('head')[0];r=o.createElement('script');r.async=1;r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;a.appendChild(r);})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>\n";
    }

    // LinkedIn Insight
    if ($li = $g('linkedin_id')) {
        echo "<!-- LinkedIn Insight Tag -->\n";
        echo "<script>_linkedin_partner_id='" . esc_js($li) . "';window._linkedin_data_partner_ids=window._linkedin_data_partner_ids||[];window._linkedin_data_partner_ids.push(_linkedin_partner_id);</script>\n";
        echo "<script>(function(l){if(!l){window.lintrk=function(a,b){window.lintrk.q.push([a,b])};window.lintrk.q=[]}var s=document.getElementsByTagName('script')[0];var b=document.createElement('script');b.type='text/javascript';b.async=true;b.src='https://snap.licdn.com/li.lms-analytics/insight.min.js';s.parentNode.insertBefore(b,s);})(window.lintrk);</script>\n";
    }

    // TikTok Pixel
    if ($tt = $g('tiktok_pixel_id')) {
        echo "<!-- TikTok Pixel -->\n";
        echo "<script>!function(w,d,t){w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=['page','track','identify','instances','debug','on','off','once','ready','alias','group','enableCookie','disableCookie'],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i='https://analytics.tiktok.com/i18n/pixel/events.js';ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement('script');o.type='text/javascript',o.async=!0,o.src=i+'?sdkid='+e+'&lib='+t;var a=document.getElementsByTagName('script')[0];a.parentNode.insertBefore(o,a)};ttq.load('" . esc_js($tt) . "');ttq.page();}(window,document,'ttq');</script>\n";
    }

    // Pinterest Tag
    if ($pin = $g('pinterest_tag_id')) {
        echo "<!-- Pinterest Tag -->\n";
        echo "<script>!function(e){if(!window.pintrk){window.pintrk=function(){window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var n=window.pintrk;n.queue=[],n.version='3.0';var t=document.createElement('script');t.async=!0,t.src=e;var r=document.getElementsByTagName('script')[0];r.parentNode.insertBefore(t,r)}}('https://s.pinimg.com/ct/core.js');pintrk('load','" . esc_js($pin) . "');pintrk('page');</script>\n";
    }

    // Custom <head> code (paste-anything)
    if ($custom_head = $g('custom_head')) echo "\n<!-- Custom head -->\n" . $custom_head . "\n";

    // Extra Schema JSON-LD
    if ($extra = $g('custom_extra_schema')) {
        $extra = trim($extra);
        if ($extra && $extra[0] === '{') echo "\n<script type=\"application/ld+json\">" . $extra . "</script>\n";
    }
}, 1); // Priority 1 — fires FIRST in head for fastest analytics load

// 4b. After <body> — GTM noscript + custom body-open code
add_action('wp_body_open', function () {
    $o = get_option('ee_tracking_settings', []);
    if (empty($o)) return;
    $g = function ($k) use ($o) { return isset($o[$k]) ? trim($o[$k]) : ''; };

    if ($gtm = $g('gtm_id')) {
        echo "<!-- Google Tag Manager (noscript) -->\n";
        echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . esc_attr($gtm) . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . "\n";
    }

    if ($body_open = $g('custom_body_open')) echo "\n<!-- Custom body-open -->\n" . $body_open . "\n";
});

// 4c. Before </body> — deferred / footer custom code
add_action('wp_footer', function () {
    $o = get_option('ee_tracking_settings', []);
    if (empty($o)) return;
    $custom = isset($o['custom_footer']) ? trim($o['custom_footer']) : '';
    if ($custom) echo "\n<!-- Custom footer -->\n" . $custom . "\n";
}, 99);

// 4d. Override default Organization schema with admin-supplied one (if any)
add_filter('extraaedge_org_schema_override', function ($default) {
    $o = get_option('ee_tracking_settings', []);
    $custom = isset($o['custom_org_schema']) ? trim($o['custom_org_schema']) : '';
    if ($custom && $custom[0] === '{') {
        $decoded = json_decode($custom, true);
        if (is_array($decoded)) return $decoded;
    }
    return $default;
});


/* ═══════════════════════════════════════════════════════════════════
 * ─── SEO / CRAWLABILITY UPGRADES ──────────────────────────────────
 * Sections J–U: pure additions, no existing behaviour changed.
 * ══════════════════════════════════════════════════════════════════ */

// ══════════════════════════════════════════════════════════
// J. WP HEAD BLOAT CLEANUP (cleaner source for Google + AI crawlers)
// ══════════════════════════════════════════════════════════
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('the_generator', '__return_empty_string');
add_filter('emoji_svg_url', '__return_false');

// ══════════════════════════════════════════════════════════
// K. IMAGE ALT FALLBACK (never serve empty alt to crawlers)
// ══════════════════════════════════════════════════════════
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    if (empty($attr['alt'])) {
        $title = trim(wp_strip_all_tags($attachment->post_title));
        $attr['alt'] = $title ?: get_bloginfo('name');
    }
    return $attr;
}, 10, 2);

// Also patch image alt on content output (covers editor-inserted images)
add_filter('the_content', function ($content) {
    if (empty($content) || stripos($content, '<img') === false) return $content;
    return preg_replace_callback('/<img([^>]*)>/i', function ($m) {
        $tag = $m[0];
        if (preg_match('/\salt=("|\')(.*?)\1/i', $tag, $alt_match) && trim($alt_match[2]) !== '') {
            return $tag;
        }
        $fallback = esc_attr(get_the_title() ?: get_bloginfo('name'));
        if (stripos($tag, 'alt=') !== false) {
            return preg_replace('/\salt=("|\')(.*?)\1/i', ' alt="' . $fallback . '"', $tag);
        }
        return '<img alt="' . $fallback . '"' . $m[1] . '>';
    }, $content);
}, 20);

// ══════════════════════════════════════════════════════════
// L. DEFER / ASYNC SCRIPT LOADER (Core Web Vitals)
// ══════════════════════════════════════════════════════════
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    // Never defer admin / comment-reply scripts
    if (is_admin() || in_array($handle, array('jquery','jquery-core','jquery-migrate','comment-reply'), true)) return $tag;
    // Defer all theme/plugin scripts (non-blocking)
    if (strpos($tag, ' defer') === false && strpos($tag, ' async') === false) {
        $tag = str_replace(' src=', ' defer src=', $tag);
    }
    return $tag;
}, 10, 3);

// ══════════════════════════════════════════════════════════
// M. LAST-MODIFIED + CACHE HEADERS (TTFB + freshness signals)
// ══════════════════════════════════════════════════════════
add_action('template_redirect', function () {
    if (is_admin() || is_user_logged_in()) return;
    if (is_singular()) {
        $ts = get_the_modified_time('U');
        if ($ts) {
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $ts) . ' GMT');
            header('Cache-Control: public, max-age=3600, must-revalidate');
        }
    } elseif (!is_404()) {
        header('Cache-Control: public, max-age=600');
    }
});

// ══════════════════════════════════════════════════════════
// N. ROBOTS.TXT (Sitemap pointer + AI crawler allowlist)
// ══════════════════════════════════════════════════════════
add_filter('robots_txt', function ($output, $public) {
    if (!$public) return $output; // honor WP "Discourage search engines"
    $site = home_url('/');
    $output  = "# ExtraaEdge robots.txt — optimized for Google + AI crawlers\n\n";
    $output .= "User-agent: *\n";
    $output .= "Allow: /wp-content/uploads/\n";
    $output .= "Allow: /wp-content/themes/*/assets/\n";
    $output .= "Allow: /*.css$\n";
    $output .= "Allow: /*.js$\n";
    $output .= "Allow: /*.webp$\n";
    $output .= "Allow: /*.svg$\n";
    $output .= "Disallow: /wp-admin/\n";
    $output .= "Disallow: /wp-login.php\n";
    $output .= "Disallow: /xmlrpc.php\n";
    $output .= "Disallow: /?s=\n";
    $output .= "Disallow: /search/\n";
    $output .= "Disallow: /wp-json/\n";
    $output .= "Allow: /wp-admin/admin-ajax.php\n\n";

    // Major search engines (explicit)
    $output .= "User-agent: Googlebot\nAllow: /\n\n";
    $output .= "User-agent: Googlebot-Image\nAllow: /\n\n";
    $output .= "User-agent: Bingbot\nAllow: /\n\n";
    $output .= "User-agent: DuckDuckBot\nAllow: /\n\n";

    // AI crawlers (LLM training + AEO/answer engines)
    $output .= "User-agent: GPTBot\nAllow: /\n\n";              // OpenAI / ChatGPT
    $output .= "User-agent: ChatGPT-User\nAllow: /\n\n";
    $output .= "User-agent: OAI-SearchBot\nAllow: /\n\n";
    $output .= "User-agent: ClaudeBot\nAllow: /\n\n";           // Anthropic / Claude
    $output .= "User-agent: anthropic-ai\nAllow: /\n\n";
    $output .= "User-agent: PerplexityBot\nAllow: /\n\n";        // Perplexity
    $output .= "User-agent: Perplexity-User\nAllow: /\n\n";
    $output .= "User-agent: Google-Extended\nAllow: /\n\n";      // Bard / Gemini training
    $output .= "User-agent: Applebot-Extended\nAllow: /\n\n";    // Apple Intelligence
    $output .= "User-agent: Bytespider\nAllow: /\n\n";           // TikTok / Doubao
    $output .= "User-agent: cohere-ai\nAllow: /\n\n";
    $output .= "User-agent: Meta-ExternalAgent\nAllow: /\n\n";   // Meta AI
    $output .= "User-agent: FacebookBot\nAllow: /\n\n";

    // Social-media link-preview crawlers (CRITICAL — without these, share cards on FB/WhatsApp/Twitter/LinkedIn break)
    $output .= "User-agent: facebookexternalhit\nAllow: /\n\n";  // Facebook + WhatsApp share preview
    $output .= "User-agent: Facebot\nAllow: /\n\n";              // Facebook secondary crawler
    $output .= "User-agent: Twitterbot\nAllow: /\n\n";           // Twitter / X card preview
    $output .= "User-agent: LinkedInBot\nAllow: /\n\n";          // LinkedIn share preview
    $output .= "User-agent: Slackbot\nAllow: /\n\n";             // Slack unfurl
    $output .= "User-agent: Slackbot-LinkExpanding\nAllow: /\n\n";
    $output .= "User-agent: WhatsApp\nAllow: /\n\n";             // WhatsApp direct fetch
    $output .= "User-agent: Pinterestbot\nAllow: /\n\n";         // Pinterest rich pin
    $output .= "User-agent: TelegramBot\nAllow: /\n\n";          // Telegram link preview
    $output .= "User-agent: Discordbot\nAllow: /\n\n";           // Discord embed
    $output .= "User-agent: redditbot\nAllow: /\n\n";            // Reddit link preview
    $output .= "User-agent: SkypeUriPreview\nAllow: /\n\n";      // Skype preview

    // Sitemap (WordPress auto-generates /wp-sitemap.xml since 5.5)
    $output .= "Sitemap: " . $site . "wp-sitemap.xml\n";
    $output .= "Sitemap: " . $site . "sitemap_index.xml\n"; // Yoast/RankMath fallback
    return $output;
}, 10, 2);

// ══════════════════════════════════════════════════════════
// O. PROPER HTTP STATUS CODES (200/301/404)
// ══════════════════════════════════════════════════════════
add_action('template_redirect', function () {
    if (is_404()) status_header(404);
});

// ══════════════════════════════════════════════════════════
// O2. CUSTOM URL ROUTE OVERRIDES
// ══════════════════════════════════════════════════════════
/**
 * Force specific URL paths to render a theme template file directly,
 * regardless of whether a Page / Category / Tag with that slug exists.
 *
 * Useful when a slug is already taken by a category (e.g. "industries"
 * in the nav menu) and we still want a marketing landing on that URL
 * without renaming the category or fighting WordPress's template
 * hierarchy.
 *
 * Add new routes by appending to $ee_custom_routes below.
 */
add_action('template_redirect', function () {
    $ee_custom_routes = array(
        'industries' => array('file' => 'page-industries.php', 'title' => 'Industries'),
        'industry'   => array('file' => 'page-industry.php',   'title' => 'Industry'),
        'company'    => array('file' => 'page-company.php',    'title' => 'Company'),
    );

    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if (!isset($ee_custom_routes[$path])) return;

    $route = $ee_custom_routes[$path];
    $template = get_stylesheet_directory() . '/' . $route['file'];
    if (!file_exists($template)) {
        $template = get_template_directory() . '/' . $route['file'];
        if (!file_exists($template)) return;
    }

    // Expose the friendly title so header.php breadcrumb + <title> can use it.
    $GLOBALS['ee_custom_route_title'] = $route['title'];

    // Convince WordPress this is a successful page render, not a 404.
    global $wp_query;
    if ($wp_query) {
        $wp_query->is_404      = false;
        $wp_query->is_home     = false;
        $wp_query->is_archive  = false;
        $wp_query->is_category = false;
        $wp_query->is_tag      = false;
        $wp_query->is_tax      = false;
        $wp_query->is_search   = false;
        $wp_query->is_single   = false;
        $wp_query->is_page     = true;
        $wp_query->is_singular = true;
    }
    status_header(200);
    nocache_headers();

    // Filter the document title so the browser tab + OG title reflect this page.
    add_filter('pre_get_document_title', function() use ($route) {
        return $route['title'] . ' — ' . get_bloginfo('name');
    }, 99);

    include $template;
    exit;
}, 0); // priority 0 — run before the is_404 status_header above

// ══════════════════════════════════════════════════════════
// P. BODY CLASSES (entity signals for crawlers)
// ══════════════════════════════════════════════════════════
add_filter('body_class', function ($classes) {
    if (is_singular('product'))     $classes[] = 'ee-product-page';
    if (is_singular('industry'))    $classes[] = 'ee-industry-page';
    if (is_singular('case_study'))  $classes[] = 'ee-case-study-page';
    if (is_singular())              $classes[] = 'ee-singular';
    return $classes;
});

// ══════════════════════════════════════════════════════════
// Q. CLEAN EXCERPT (no [...] noise)
// ══════════════════════════════════════════════════════════
add_filter('excerpt_more', function () { return '…'; });

// ══════════════════════════════════════════════════════════
// R. DISABLE XML-RPC (security + slimmer headers)
// ══════════════════════════════════════════════════════════
add_filter('xmlrpc_enabled', '__return_false');
add_filter('wp_headers', function ($headers) { unset($headers['X-Pingback']); return $headers; });

// ══════════════════════════════════════════════════════════
// S. SCHEMA HELPERS (callable from any template)
// ══════════════════════════════════════════════════════════
if (!function_exists('ee_emit_jsonld')) {
    function ee_emit_jsonld($data) {
        echo "\n<script type=\"application/ld+json\">\n" . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n</script>\n";
    }
}
if (!function_exists('ee_faq_schema')) {
    function ee_faq_schema($faqs) {
        if (empty($faqs) || !is_array($faqs)) return;
        $main = array();
        foreach ($faqs as $row) {
            $q = is_array($row) ? ($row['question'] ?? $row['q'] ?? '') : '';
            $a = is_array($row) ? ($row['answer']   ?? $row['a'] ?? '') : '';
            if (!$q) continue;
            $main[] = array(
                '@type'          => 'Question',
                'name'           => wp_strip_all_tags($q),
                'acceptedAnswer' => array('@type' => 'Answer', 'text' => wp_strip_all_tags($a)),
            );
        }
        if ($main) ee_emit_jsonld(array('@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>$main));
    }
}
if (!function_exists('ee_video_schema')) {
    function ee_video_schema($args) {
        $a = wp_parse_args($args, array(
            'name'=>'','description'=>'','thumbnail'=>'','upload_date'=>'','content_url'=>'','embed_url'=>'',
        ));
        if (!$a['name']) return;
        ee_emit_jsonld(array(
            '@context'    => 'https://schema.org',
            '@type'       => 'VideoObject',
            'name'        => $a['name'],
            'description' => $a['description'],
            'thumbnailUrl'=> $a['thumbnail'],
            'uploadDate'  => $a['upload_date'],
            'contentUrl'  => $a['content_url'],
            'embedUrl'    => $a['embed_url'],
        ));
    }
}
if (!function_exists('ee_howto_schema')) {
    function ee_howto_schema($name, $steps) {
        if (!$name || empty($steps)) return;
        $list = array(); $i = 1;
        foreach ($steps as $title => $desc) {
            $list[] = array('@type'=>'HowToStep','position'=>$i++, 'name'=>$title, 'text'=>$desc);
        }
        ee_emit_jsonld(array('@context'=>'https://schema.org','@type'=>'HowTo','name'=>$name,'step'=>$list));
    }
}
if (!function_exists('ee_review_schema')) {
    function ee_review_schema($testimonials, $item_name = '') {
        if (empty($testimonials) || !is_array($testimonials)) return;
        $reviews = array();
        foreach ($testimonials as $t) {
            if (empty($t['name']) || empty($t['quote'])) continue;
            $reviews[] = array(
                '@type'        => 'Review',
                'reviewRating' => array('@type'=>'Rating','ratingValue'=>'5','bestRating'=>'5'),
                'author'       => array('@type'=>'Person','name'=>wp_strip_all_tags($t['name'])),
                'reviewBody'   => wp_strip_all_tags($t['quote']),
            );
        }
        if (!$reviews) return;
        ee_emit_jsonld(array(
            '@context' => 'https://schema.org',
            '@type'    => 'Product',
            'name'     => $item_name ?: get_the_title(),
            'review'   => $reviews,
        ));
    }
}

// ══════════════════════════════════════════════════════════
// T. AUTO PRELOAD HERO IMAGE (LCP boost — product pages)
// ══════════════════════════════════════════════════════════
add_action('wp_head', function () {
    if (!is_singular('product')) return;
    $hero = get_post_meta(get_the_ID(), '_og_image', true) ?: get_the_post_thumbnail_url(get_the_ID(), 'full');
    if ($hero) {
        echo '<link rel="preload" as="image" href="' . esc_url($hero) . '" fetchpriority="high">' . "\n";
    }
}, 1);

// ══════════════════════════════════════════════════════════
// U. LAZY-LOAD GUARD (skip for first hero/logo images — LCP)
// ══════════════════════════════════════════════════════════
add_filter('wp_lazy_loading_enabled', function ($default, $tag_name, $context) {
    if ($context === 'the_post_thumbnail') return false;
    return $default;
}, 10, 3);

// ══════════════════════════════════════════════════════════
// V. CUSTOM <title> OVERRIDE (uses _seo_title meta if set)
// ══════════════════════════════════════════════════════════
/**
 * WordPress auto-generates <title> via add_theme_support('title-tag').
 * Default format: "Post Title – Site Name"
 * Override: if a post has _seo_title meta set, use that EXACT string
 * (no site name appended, no separator) so the SEO field controls the title.
 */
add_filter('pre_get_document_title', function ($title) {
    if (is_singular()) {
        $seo_title = get_post_meta(get_the_ID(), '_seo_title', true);
        if (!empty($seo_title)) {
            return $seo_title;
        }
    }
    return $title;
}, 999);

// Fallback hook for older themes / cached parts
add_filter('document_title_parts', function ($parts) {
    if (is_singular()) {
        $seo_title = get_post_meta(get_the_ID(), '_seo_title', true);
        if (!empty($seo_title)) {
            $parts['title'] = $seo_title;
            unset($parts['site'], $parts['tagline'], $parts['page']);
        }
    }
    return $parts;
}, 999);

// ══════════════════════════════════════════════════════════
// W. REMOVE DUPLICATE ROBOTS META (WP auto-injects max-image-preview)
// ══════════════════════════════════════════════════════════
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');
remove_action('wp_head', 'wp_robots', 1);

// ══════════════════════════════════════════════════════════
// X. REMOVE DUPLICATE CANONICAL (WP core auto-injects rel_canonical)
// ══════════════════════════════════════════════════════════
remove_action('wp_head', 'rel_canonical');

// ══════════════════════════════════════════════════════════
// Y. HOME PAGE EDITOR — non-coder admin for front-page.php
// ══════════════════════════════════════════════════════════
$ee_home_editor = __DIR__ . '/inc/home-editor.php';
if (file_exists($ee_home_editor)) {
    require_once $ee_home_editor;
}
