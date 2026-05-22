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
        'use_case'   => array('Use Cases',    'Use Case',    'dashicons-groups',       'use-cases'),
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
        /* Disable the WP-generated archive index for CPTs whose listing
           page is rendered by our custom template_redirect override
           (page-products.php / page-use-cases.php / page-industries.php).
           Without this, WP also tries to claim the same URL via its own
           archive rule and the resulting rewrite-rules order is brittle
           — one update_option call away from 404ing the singles. */
        $custom_listed_cpts = array('product', 'industry', 'use_case');
        $has_archive        = !in_array($slug, $custom_listed_cpts, true);

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
            'has_archive'  => $has_archive,
            'show_in_rest' => true,
            'menu_icon'    => $icon,
            'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
            'rewrite'      => array('slug' => $rewrite, 'with_front' => false),
        ));
    }
}
add_action('init', 'extraaedge_register_cpts');

/* Hide the WordPress admin toolbar on the public front-end for logged-in
   users so the bar (or its raw HTML when admin-bar.css fails) does not
   visually clutter the new advanced header. The full toolbar is still
   available inside /wp-admin/. */
add_filter('show_admin_bar', '__return_false');

// ══════════════════════════════════════════════════════════
// D3. RENAME "POSTS" → "BLOG" SITE-WIDE (admin labels)
// ══════════════════════════════════════════════════════════
add_filter('register_post_type_args', function ($args, $post_type) {
    if ($post_type !== 'post') return $args;
    $labels = isset($args['labels']) ? (array) $args['labels'] : array();
    $labels = array_merge($labels, array(
        'name'                  => 'Blog',
        'singular_name'         => 'Blog Post',
        'menu_name'             => 'Blog',
        'name_admin_bar'        => 'Blog Post',
        'add_new'               => 'Add New Blog Post',
        'add_new_item'          => 'Add New Blog Post',
        'edit_item'             => 'Edit Blog Post',
        'new_item'              => 'New Blog Post',
        'view_item'             => 'View Blog Post',
        'view_items'            => 'View Blogs',
        'search_items'          => 'Search Blog',
        'not_found'             => 'No blog posts found.',
        'not_found_in_trash'    => 'No blog posts found in Trash.',
        'all_items'             => 'All Blog Posts',
        'archives'              => 'Blog Archives',
        'attributes'            => 'Blog Attributes',
        'insert_into_item'      => 'Insert into blog post',
        'uploaded_to_this_item' => 'Uploaded to this blog post',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'filter_items_list'     => 'Filter blog list',
        'items_list_navigation' => 'Blog list navigation',
        'items_list'            => 'Blog list',
    ));
    $args['labels'] = $labels;
    if (empty($args['menu_icon']) || $args['menu_icon'] === 'dashicons-admin-post') {
        $args['menu_icon'] = 'dashicons-edit';
    }
    return $args;
}, 10, 2);

// ══════════════════════════════════════════════════════════
// D4. BLOG POST META BOX — single source for the design fields
// ══════════════════════════════════════════════════════════
add_action('add_meta_boxes', function () {
    add_meta_box(
        'ee_blog_settings',
        '📰 Blog Page Settings',
        'ee_blog_meta_box_render',
        'post',
        'normal',
        'high'
    );
});

function ee_blog_meta_box_render($post) {
    wp_nonce_field('ee_blog_meta_save', 'ee_blog_meta_nonce');
    $f = function ($k, $default = '') use ($post) {
        $v = get_post_meta($post->ID, '_ee_blog_' . $k, true);
        return $v !== '' ? $v : $default;
    };
    $faqs = get_post_meta($post->ID, '_ee_blog_faqs', true);
    if (!is_array($faqs)) $faqs = array();
    ?>
    <style>
        .eebm-grid    { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
        .eebm-grid-3  { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
        .eebm-row     { margin-bottom:14px; }
        .eebm-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
        .eebm-row input, .eebm-row textarea, .eebm-row select { width:100%; padding:8px 10px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; font-family:inherit; box-sizing:border-box; }
        .eebm-row textarea { resize:vertical; min-height:70px; }
        .eebm-row .hint   { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
        .eebm-section    { background:#f8fafc; border:1px solid #e2e8f0; border-left:4px solid #DE6E30; border-radius:6px; padding:14px 16px; margin-bottom:18px; }
        .eebm-section h3 { margin:0 0 12px; font-size:14px; color:#19335D; }
        .eebm-faq        { background:#fff; border:1px solid #e2e8f0; border-radius:6px; padding:12px 14px; margin-bottom:10px; position:relative; }
        .eebm-faq .rm    { position:absolute; right:8px; top:8px; background:transparent; border:1px solid #fecaca; color:#b91c1c; padding:3px 9px; border-radius:4px; cursor:pointer; font-size:11px; }
        .eebm-add        { background:#19335D; color:#fff; border:none; padding:8px 16px; border-radius:5px; cursor:pointer; font-size:12px; font-weight:600; }
    </style>

    <div class="eebm-section">
        <h3>🎯 Hero (top of the blog page)</h3>
        <div class="eebm-grid">
            <div class="eebm-row">
                <label>Category tag</label>
                <input type="text" name="ee_blog[category_tag]" value="<?php echo esc_attr($f('category_tag')); ?>" placeholder="SMS Marketing">
                <p class="hint">Small pill above the H1 title.</p>
            </div>
            <div class="eebm-row">
                <label>Read time</label>
                <input type="text" name="ee_blog[read_time]" value="<?php echo esc_attr($f('read_time')); ?>" placeholder="8 min read">
            </div>
        </div>
        <div class="eebm-row">
            <label>Subtitle (under H1)</label>
            <textarea name="ee_blog[subtitle]" rows="2" placeholder="A practical playbook covering segmentation, automation, personalisation…"><?php echo esc_textarea($f('subtitle')); ?></textarea>
            <p class="hint">1–2 sentence dek under the title.</p>
        </div>
        <div class="eebm-grid">
            <div class="eebm-row">
                <label>Hero icon (Tabler name)</label>
                <input type="text" name="ee_blog[hero_icon]" value="<?php echo esc_attr($f('hero_icon')); ?>" placeholder="ti-messages">
                <p class="hint">Browse names at <a href="https://tabler.io/icons" target="_blank">tabler.io/icons</a>.</p>
            </div>
            <div class="eebm-row">
                <label>Hero caption</label>
                <input type="text" name="ee_blog[hero_caption]" value="<?php echo esc_attr($f('hero_caption')); ?>" placeholder="98% Open Rate · Instant Reach">
            </div>
        </div>
    </div>

    <div class="eebm-section">
        <h3>🖼 Ad banner (replaces the stat cards)</h3>
        <p class="hint" style="margin-top:-4px;margin-bottom:10px;">A clickable promo image shown above the article body. Drop in a Google-Ads-style creative; when set, it replaces the three stat cards below. Leave the image URL blank to fall back to the stat cards.</p>
        <div class="eebm-row">
            <label>Banner image URL</label>
            <input type="url" name="ee_blog[ad_image]" value="<?php echo esc_attr($f('ad_image')); ?>" placeholder="https://www.extraaedge.com/wp-content/uploads/2026/05/banner.png">
            <p class="hint">Recommended <strong>728 × 90</strong> (leaderboard) or <strong>970 × 250</strong> (billboard). Upload via Media Library and paste the URL here.</p>
        </div>
        <div class="eebm-grid">
            <div class="eebm-row">
                <label>Click-through URL</label>
                <input type="url" name="ee_blog[ad_url]" value="<?php echo esc_attr($f('ad_url')); ?>" placeholder="https://dailyheading.com/products/education-crm/">
                <p class="hint">Visitor clicks the banner → lands here. Usually the related product page.</p>
            </div>
            <div class="eebm-row">
                <label>Alt text (accessibility + SEO)</label>
                <input type="text" name="ee_blog[ad_alt]" value="<?php echo esc_attr($f('ad_alt')); ?>" placeholder="Try ExtraaEdge Admission CRM — free demo">
            </div>
        </div>
    </div>

    <div class="eebm-section">
        <h3>🔢 Stat cards (3 across) <em style="font-weight:400;color:#646970;font-size:12px;">— used only when the Ad banner above is empty</em></h3>
        <div class="eebm-grid-3">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="eebm-row">
                    <label>Stat <?php echo $i; ?> number</label>
                    <input type="text" name="ee_blog[stat<?php echo $i; ?>_num]" value="<?php echo esc_attr($f("stat{$i}_num")); ?>" placeholder="<?php echo $i === 1 ? '98%' : ($i === 2 ? '3 min' : '7.5x'); ?>">
                    <label style="margin-top:8px;">Stat <?php echo $i; ?> label</label>
                    <input type="text" name="ee_blog[stat<?php echo $i; ?>_lab]" value="<?php echo esc_attr($f("stat{$i}_lab")); ?>" placeholder="<?php echo $i === 1 ? 'SMS Open Rate' : ($i === 2 ? 'Avg. Read Time' : 'Higher Response vs Email'); ?>">
                </div>
            <?php endfor; ?>
        </div>
        <p class="hint">Leave a number blank to hide that whole card.</p>
    </div>

    <div class="eebm-section">
        <h3>💡 Quick-stat callout (optional)</h3>
        <div class="eebm-row">
            <label>Callout text (supports &lt;strong&gt; and &lt;em&gt;)</label>
            <textarea name="ee_blog[callout]" rows="2" placeholder="<strong>Quick stat:</strong> Educational institutions saw a 34% increase in conversions…"><?php echo esc_textarea($f('callout')); ?></textarea>
            <p class="hint">Leave blank to hide the blue callout box.</p>
        </div>
    </div>

    <div class="eebm-section">
        <h3>🚀 CRM banner (near the end of the post)</h3>
        <div class="eebm-grid">
            <div class="eebm-row">
                <label>Badge</label>
                <input type="text" name="ee_blog[banner_badge]" value="<?php echo esc_attr($f('banner_badge', 'ExtraaEdge')); ?>">
            </div>
            <div class="eebm-row">
                <label>Title</label>
                <input type="text" name="ee_blog[banner_title]" value="<?php echo esc_attr($f('banner_title', 'All-in-One CRM for Education')); ?>">
            </div>
        </div>
        <div class="eebm-row">
            <label>Description</label>
            <textarea name="ee_blog[banner_desc]" rows="2"><?php echo esc_textarea($f('banner_desc', 'Unify SMS, WhatsApp, email, and calls. Convert more leads with intelligent automation built for admissions teams.')); ?></textarea>
        </div>
        <div class="eebm-grid">
            <div class="eebm-row">
                <label>CTA text</label>
                <input type="text" name="ee_blog[banner_cta_text]" value="<?php echo esc_attr($f('banner_cta_text', 'Book a Free Demo')); ?>">
            </div>
            <div class="eebm-row">
                <label>CTA URL</label>
                <input type="text" name="ee_blog[banner_cta_url]" value="<?php echo esc_attr($f('banner_cta_url', '/book-demo/')); ?>">
            </div>
        </div>
    </div>

    <div class="eebm-section">
        <h3>❓ FAQ items</h3>
        <div id="eebm-faqs">
            <?php if (!empty($faqs)) : foreach ($faqs as $i => $faq) : ?>
                <div class="eebm-faq">
                    <button type="button" class="rm" onclick="this.closest('.eebm-faq').remove();">✕ Remove</button>
                    <div class="eebm-row" style="margin-top:0;">
                        <label>Question</label>
                        <input type="text" name="ee_blog_faqs[<?php echo $i; ?>][q]" value="<?php echo esc_attr($faq['q'] ?? ''); ?>">
                    </div>
                    <div class="eebm-row" style="margin-bottom:0;">
                        <label>Answer</label>
                        <textarea name="ee_blog_faqs[<?php echo $i; ?>][a]" rows="2"><?php echo esc_textarea($faq['a'] ?? ''); ?></textarea>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
        <button type="button" class="eebm-add" onclick="eebmAddFaq()">+ Add FAQ</button>
        <p class="hint">Each FAQ gets its own collapsible row on the blog page (and is emitted as FAQPage JSON-LD for Google).</p>
    </div>

    <script>
    function eebmAddFaq() {
        var box  = document.getElementById('eebm-faqs');
        var idx  = box.children.length;
        var node = document.createElement('div');
        node.className = 'eebm-faq';
        node.innerHTML = ''
            + '<button type="button" class="rm" onclick="this.closest(\'.eebm-faq\').remove();">✕ Remove</button>'
            + '<div class="eebm-row" style="margin-top:0;"><label>Question</label><input type="text" name="ee_blog_faqs['+idx+'][q]"></div>'
            + '<div class="eebm-row" style="margin-bottom:0;"><label>Answer</label><textarea name="ee_blog_faqs['+idx+'][a]" rows="2"></textarea></div>';
        box.appendChild(node);
    }
    </script>
    <?php
}

add_action('save_post_post', function ($post_id) {
    if (!isset($_POST['ee_blog_meta_nonce']) || !wp_verify_nonce($_POST['ee_blog_meta_nonce'], 'ee_blog_meta_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = isset($_POST['ee_blog']) && is_array($_POST['ee_blog']) ? $_POST['ee_blog'] : array();
    $url_keys = array('ad_image', 'ad_url', 'banner_cta_url');
    foreach ($fields as $k => $v) {
        $key = '_ee_blog_' . preg_replace('/[^a-z0-9_]/', '', strtolower($k));
        if ($k === 'callout' || $k === 'subtitle' || $k === 'banner_desc') {
            update_post_meta($post_id, $key, wp_kses_post(wp_unslash($v)));
        } elseif (in_array($k, $url_keys, true)) {
            update_post_meta($post_id, $key, esc_url_raw(wp_unslash($v)));
        } else {
            update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($v)));
        }
    }

    $faqs = isset($_POST['ee_blog_faqs']) && is_array($_POST['ee_blog_faqs']) ? $_POST['ee_blog_faqs'] : array();
    $clean_faqs = array();
    foreach ($faqs as $row) {
        $q = isset($row['q']) ? sanitize_text_field(wp_unslash($row['q'])) : '';
        $a = isset($row['a']) ? wp_kses_post(wp_unslash($row['a'])) : '';
        if ($q !== '') $clean_faqs[] = array('q' => $q, 'a' => $a);
    }
    update_post_meta($post_id, '_ee_blog_faqs', $clean_faqs);
});

// ══════════════════════════════════════════════════════════
// D4a. AD BANNER INJECTOR — drops the banner into the post body
// after the 4th H2 (or the last H2 if the post has fewer).
// ══════════════════════════════════════════════════════════
add_filter('the_content', function ($content) {
    if (!is_singular('post') || !in_the_loop() || !is_main_query()) {
        return $content;
    }
    $pid      = get_the_ID();
    $ad_image = get_post_meta($pid, '_ee_blog_ad_image', true);
    if (!$ad_image) {
        return $content;
    }
    $ad_url   = get_post_meta($pid, '_ee_blog_ad_url',   true);
    $ad_alt   = get_post_meta($pid, '_ee_blog_ad_alt',   true) ?: get_the_title($pid);
    $ad_target = $ad_url ?: '#';

    $ad_host   = parse_url($ad_target, PHP_URL_HOST);
    $site_host = parse_url(home_url(), PHP_URL_HOST);
    $is_external = ($ad_host && $ad_host !== $site_host);
    $attrs = 'aria-label="' . esc_attr($ad_alt) . '"';
    if ($is_external) $attrs .= ' target="_blank" rel="noopener sponsored"';

    $banner_html = "\n<a class=\"ee-ad-banner\" href=\"" . esc_url($ad_target) . "\" $attrs>"
                 . '<img src="' . esc_url($ad_image) . '" alt="' . esc_attr($ad_alt) . '" loading="lazy">'
                 . "</a>\n";

    /* Count H2s. Inject after the 4th. If fewer than 4 H2s exist,
       append after the LAST one so the banner still lives inside
       the content flow. */
    if (!preg_match_all('#</h2>#i', $content, $m, PREG_OFFSET_CAPTURE)) {
        return $content . $banner_html;
    }
    $total = count($m[0]);
    if ($total === 0) {
        return $content . $banner_html;
    }
    $target_index = min(4, $total) - 1; // 0-based
    $offset       = $m[0][$target_index][1] + strlen($m[0][$target_index][0]);
    return substr($content, 0, $offset) . $banner_html . substr($content, $offset);
}, 20);
/**
 * "🔍 Blog SEO & Social Meta" — exposes every meta tag header.php
 * emits as an editable field on the post edit screen, so a
 * non-coder can override:
 *
 *   • <title>                       _seo_title
 *   • <meta name="description">     _seo_description
 *   • <meta name="keywords">        _seo_keywords
 *   • <link rel="canonical">        _canonical_url
 *   • <meta name="robots">          _robots
 *   • og:title / og:description / og:image
 *   • twitter:card / twitter:title / twitter:description / twitter:image
 *
 * Any field left blank falls back to sensible auto-defaults
 * (post title, excerpt, featured image, site defaults).
 */
add_action('add_meta_boxes', function () {
    add_meta_box(
        'ee_blog_seo_meta',
        '🔍 Blog SEO & Social Meta',
        'ee_blog_seo_meta_render',
        'post',
        'normal',
        'high'
    );
});

function ee_blog_seo_meta_render($post) {
    wp_nonce_field('ee_blog_seo_save', 'ee_blog_seo_nonce');
    $m = function ($k) use ($post) {
        return get_post_meta($post->ID, '_' . $k, true);
    };
    $robots = $m('robots') ?: 'index,follow';
    $tw_card = $m('twitter_card') ?: 'summary_large_image';
    ?>
    <style>
        .eeseo-card  { background:#fff; border:1px solid #e2e8f0; border-radius:6px; padding:14px 16px; margin-bottom:14px; }
        .eeseo-card h3 { margin:0 0 12px; font-size:13px; color:#19335D; display:flex; align-items:center; gap:6px; text-transform:uppercase; letter-spacing:.04em; }
        .eeseo-grid  { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
        .eeseo-row   { margin-bottom:12px; }
        .eeseo-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:12.5px; }
        .eeseo-row input, .eeseo-row textarea, .eeseo-row select {
            width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px;
            font-size:13px; font-family:inherit; box-sizing:border-box;
        }
        .eeseo-row textarea { resize:vertical; min-height:70px; line-height:1.5; }
        .eeseo-row .hint { color:#646970; font-size:11px; margin-top:4px; font-style:italic; line-height:1.4; }
        .eeseo-count { font-size:11px; color:#64748b; float:right; }
        .eeseo-count.over { color:#dc2626; font-weight:600; }
    </style>

    <p style="background:#fff8f1;border:1px solid #fde7d3;padding:10px 14px;border-radius:5px;font-size:12.5px;color:#7c2d12;margin:0 0 14px;">
        ℹ️ <strong>Tip:</strong> Leave any field blank to use the auto-fallback (post title, excerpt, featured image). Each row tells you the fallback in italics.
    </p>

    <!-- ─── Author display ─── -->
    <div class="eeseo-card">
        <h3>👤 Author display</h3>
        <div class="eeseo-grid">
            <div class="eeseo-row">
                <label>Display Author Name (override)</label>
                <input type="text" name="ee_seo[author_display]" value="<?php echo esc_attr($m('author_display')); ?>" placeholder="<?php echo esc_attr(get_the_author_meta('display_name', $post->post_author)); ?>">
                <p class="hint">Shown on the post page in the author chip. <em>Fallback: the WordPress user's display name (currently <strong><?php echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?></strong>).</em></p>
            </div>
            <div class="eeseo-row">
                <label>Author Role / Subtitle</label>
                <input type="text" name="ee_seo[author_role]" value="<?php echo esc_attr($m('author_role')); ?>" placeholder="Senior Content Strategist · ExtraaEdge">
                <p class="hint">Small line under the author name in the chip and popup. <em>Fallback: the WP user's "Biographical Info" first line, else "Contributor · ExtraaEdge".</em></p>
            </div>
        </div>
        <div class="eeseo-row">
            <label>Author Bio (popup paragraph)</label>
            <textarea name="ee_seo[author_bio]" rows="2" placeholder="8+ years helping EdTech and higher-ed institutions grow enrollment through data-driven marketing."><?php echo esc_textarea($m('author_bio')); ?></textarea>
            <p class="hint">Shown only when the visitor clicks the author chip. <em>Fallback: the WP user's "Biographical Info".</em></p>
        </div>
    </div>

    <!-- ─── Search engine basics ─── -->
    <div class="eeseo-card">
        <h3>🔎 Search snippet</h3>

        <div class="eeseo-row">
            <label>SEO Title <span class="eeseo-count" id="ct-seo-title">0 / 60</span></label>
            <input type="text" name="ee_seo[seo_title]" id="ee-seo-title" value="<?php echo esc_attr($m('seo_title')); ?>" placeholder="Why CRM implementation fails in higher education — and how to fix it">
            <p class="hint">The browser-tab title and Google headline. <em>Fallback: the post title.</em></p>
        </div>

        <div class="eeseo-row">
            <label>Meta Description <span class="eeseo-count" id="ct-seo-desc">0 / 160</span></label>
            <textarea name="ee_seo[seo_description]" id="ee-seo-desc" rows="3" placeholder="A practical guide on avoiding common CRM pitfalls in higher education — data migration, team adoption, integration, and budget."><?php echo esc_textarea($m('seo_description')); ?></textarea>
            <p class="hint">150-160 characters works best for SERP previews. <em>Fallback: the post excerpt.</em></p>
        </div>

        <div class="eeseo-grid">
            <div class="eeseo-row">
                <label>Focus Keywords</label>
                <input type="text" name="ee_seo[seo_keywords]" value="<?php echo esc_attr($m('seo_keywords')); ?>" placeholder="crm implementation, higher education crm, admissions crm">
                <p class="hint">Comma-separated. Modern crawlers mostly ignore this; useful for internal search.</p>
            </div>
            <div class="eeseo-row">
                <label>Canonical URL</label>
                <input type="url" name="ee_seo[canonical_url]" value="<?php echo esc_attr($m('canonical_url')); ?>" placeholder="<?php echo esc_attr(get_permalink($post->ID) ?: 'https://...'); ?>">
                <p class="hint"><em>Fallback: this post's permalink.</em> Set only when duplicating content from another URL.</p>
            </div>
        </div>

        <div class="eeseo-row">
            <label>Robots directive</label>
            <select name="ee_seo[robots]">
                <option value="index,follow"     <?php selected($robots, 'index,follow');     ?>>index, follow (default — show in Google)</option>
                <option value="noindex,follow"   <?php selected($robots, 'noindex,follow');   ?>>noindex, follow (hide from Google but pass link equity)</option>
                <option value="index,nofollow"   <?php selected($robots, 'index,nofollow');   ?>>index, nofollow (rare)</option>
                <option value="noindex,nofollow" <?php selected($robots, 'noindex,nofollow'); ?>>noindex, nofollow (fully hidden)</option>
            </select>
            <p class="hint">Use <strong>noindex</strong> for drafts, gated content, or duplicate landing pages.</p>
        </div>
    </div>

    <!-- ─── Open Graph (Facebook / LinkedIn / WhatsApp preview) ─── -->
    <div class="eeseo-card">
        <h3>📘 Open Graph <em style="font-weight:400;color:#64748b;text-transform:none;letter-spacing:0;">— Facebook, LinkedIn, WhatsApp link preview</em></h3>

        <div class="eeseo-grid">
            <div class="eeseo-row">
                <label>OG Title</label>
                <input type="text" name="ee_seo[og_title]" value="<?php echo esc_attr($m('og_title')); ?>" placeholder="Same as SEO Title">
                <p class="hint"><em>Fallback: SEO Title.</em> Override if the social headline should differ.</p>
            </div>
            <div class="eeseo-row">
                <label>OG Description</label>
                <input type="text" name="ee_seo[og_description]" value="<?php echo esc_attr($m('og_description')); ?>" placeholder="Same as Meta Description">
                <p class="hint"><em>Fallback: Meta Description.</em></p>
            </div>
        </div>

        <div class="eeseo-row">
            <label>OG Image URL</label>
            <input type="url" name="ee_seo[og_image]" value="<?php echo esc_attr($m('og_image')); ?>" placeholder="https://www.extraaedge.com/.../og-image.png">
            <p class="hint">Recommended <strong>1200 × 630</strong>, under 1 MB. <em>Fallback: the post's Featured Image, else the site default OG image.</em></p>
        </div>
    </div>

    <!-- ─── Twitter / X ─── -->
    <div class="eeseo-card">
        <h3>🐦 Twitter / X Card</h3>

        <div class="eeseo-grid">
            <div class="eeseo-row">
                <label>Card type</label>
                <select name="ee_seo[twitter_card]">
                    <option value="summary_large_image" <?php selected($tw_card, 'summary_large_image'); ?>>Summary with large image (recommended)</option>
                    <option value="summary"             <?php selected($tw_card, 'summary');             ?>>Summary (small square thumbnail)</option>
                </select>
            </div>
            <div class="eeseo-row">
                <label>Twitter Title</label>
                <input type="text" name="ee_seo[twitter_title]" value="<?php echo esc_attr($m('twitter_title')); ?>" placeholder="Same as OG Title">
                <p class="hint"><em>Fallback: OG Title.</em></p>
            </div>
        </div>

        <div class="eeseo-row">
            <label>Twitter Description</label>
            <input type="text" name="ee_seo[twitter_description]" value="<?php echo esc_attr($m('twitter_description')); ?>" placeholder="Same as OG Description">
            <p class="hint"><em>Fallback: OG Description.</em></p>
        </div>

        <div class="eeseo-row">
            <label>Twitter Image URL</label>
            <input type="url" name="ee_seo[twitter_image]" value="<?php echo esc_attr($m('twitter_image')); ?>" placeholder="Same as OG Image">
            <p class="hint"><em>Fallback: OG Image.</em> Override only when you want a Twitter-specific creative.</p>
        </div>
    </div>

    <script>
    (function(){
        function counter(inputId, labelId, max){
            var i = document.getElementById(inputId);
            var l = document.getElementById(labelId);
            if (!i || !l) return;
            function tick(){
                var n = (i.value || '').length;
                l.textContent = n + ' / ' + max;
                l.classList.toggle('over', n > max);
            }
            i.addEventListener('input', tick);
            tick();
        }
        counter('ee-seo-title', 'ct-seo-title', 60);
        counter('ee-seo-desc',  'ct-seo-desc',  160);
    })();
    </script>
    <?php
}

add_action('save_post_post', function ($post_id) {
    if (!isset($_POST['ee_blog_seo_nonce']) || !wp_verify_nonce($_POST['ee_blog_seo_nonce'], 'ee_blog_seo_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $in = isset($_POST['ee_seo']) && is_array($_POST['ee_seo']) ? $_POST['ee_seo'] : array();

    $text_fields = array('seo_title', 'seo_keywords', 'og_title', 'og_description', 'twitter_title', 'twitter_description', 'author_display', 'author_role');
    foreach ($text_fields as $k) {
        update_post_meta($post_id, '_' . $k, sanitize_text_field(wp_unslash($in[$k] ?? '')));
    }
    update_post_meta($post_id, '_seo_description', sanitize_textarea_field(wp_unslash($in['seo_description'] ?? '')));
    update_post_meta($post_id, '_author_bio',     sanitize_textarea_field(wp_unslash($in['author_bio'] ?? '')));

    $url_fields = array('canonical_url', 'og_image', 'twitter_image');
    foreach ($url_fields as $k) {
        update_post_meta($post_id, '_' . $k, esc_url_raw(wp_unslash($in[$k] ?? '')));
    }

    $robots_in   = sanitize_text_field(wp_unslash($in['robots'] ?? 'index,follow'));
    $allowed_rob = array('index,follow', 'noindex,follow', 'index,nofollow', 'noindex,nofollow');
    update_post_meta($post_id, '_robots', in_array($robots_in, $allowed_rob, true) ? $robots_in : 'index,follow');

    $tw_card_in   = sanitize_text_field(wp_unslash($in['twitter_card'] ?? 'summary_large_image'));
    $allowed_card = array('summary', 'summary_large_image');
    update_post_meta($post_id, '_twitter_card', in_array($tw_card_in, $allowed_card, true) ? $tw_card_in : 'summary_large_image');
}, 11);

// ══════════════════════════════════════════════════════════
// D2. CLIENT LOGOS — single source of truth = Home Page Editor
// ══════════════════════════════════════════════════════════
/**
 * Return the unified client-logo list used on every page that has a
 * "Trusted Institutions" section. All logos come from one place:
 *
 *      WP Admin → 🏠 Home Page Editor → 🏢 Logos tab
 *
 * The fields are stored in the 'ee_home_settings' option as
 * logo_t1_1_url / logo_t1_1_alt … logo_t1_8_url / logo_t1_8_alt and
 * logo_t2_1_url … logo_t2_7_url. Empty rows are skipped so the editor
 * just clears a URL to delete that logo across the entire site.
 *
 * @return array<array{image:string,alt:string}>
 */
function ee_get_client_logos($post_id = 0) {
    $home = get_option('ee_home_settings', array());
    if (!is_array($home)) $home = array();

    $out = array();
    /* Track 1 (left-moving on home page) — up to 8 logos */
    for ($i = 1; $i <= 8; $i++) {
        $url = isset($home["logo_t1_{$i}_url"]) ? trim((string) $home["logo_t1_{$i}_url"]) : '';
        if ($url === '') continue;
        $out[] = array(
            'image' => $url,
            'alt'   => isset($home["logo_t1_{$i}_alt"]) ? (string) $home["logo_t1_{$i}_alt"] : '',
        );
    }
    /* Track 2 (right-moving on home page) — up to 7 logos */
    for ($i = 1; $i <= 7; $i++) {
        $url = isset($home["logo_t2_{$i}_url"]) ? trim((string) $home["logo_t2_{$i}_url"]) : '';
        if ($url === '') continue;
        $out[] = array(
            'image' => $url,
            'alt'   => isset($home["logo_t2_{$i}_alt"]) ? (string) $home["logo_t2_{$i}_alt"] : '',
        );
    }
    return $out;
}

/* Save hook on the home editor option — bust common page caches so
   changes propagate immediately to single-product / single-industry. */
add_action('update_option_ee_home_settings', function () {
    wp_cache_delete('ee_home_settings', 'options');
    wp_cache_delete('alloptions', 'options');
    if (function_exists('rocket_clean_domain'))   { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))    { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))         { do_action('litespeed_purge_all'); }
    if (function_exists('wp_cache_clean_cache'))  { @wp_cache_clean_cache($GLOBALS['cache_path'] ?? ''); }
    do_action('ee_logos_master_updated');
});

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
    if (!in_array($post_type, array('product', 'industry', 'use_case'), true)) return;
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
        array('product', 'industry', 'use_case'),
        'normal',
        'high'
    );

    /* Right-hand sidebar: searchable list of internal pages with one-click copy buttons.
       Lets a non-coder insert links into any text field without writing HTML. */
    add_meta_box(
        'ee_link_picker',
        '🔗 Internal Link Picker',
        'ee_link_picker_render',
        array('product', 'industry', 'use_case', 'page', 'post'),
        'side',
        'low'
    );
}
add_action('add_meta_boxes', 'product_add_meta_boxes');

// ══════════════════════════════════════════════════════════
// LINK PICKER — sidebar widget for inserting internal links
// ══════════════════════════════════════════════════════════
function ee_link_picker_render($post) {
    /* Build a flat list of internal targets:
       - Static section anchors on the current post (TOC anchors)
       - All published Pages, Products, Industries (titles + URLs) */
    $current_id = $post->ID;
    $targets = array();

    /* In-page anchors (only for product/industry CPTs that have the auto-anchor helper) */
    if (function_exists('ee_get_available_toc_anchors') && in_array($post->post_type, array('product','industry','use_case'), true)) {
        foreach (ee_get_available_toc_anchors($current_id) as $a) {
            $targets[] = array(
                'group' => 'On this page',
                'label' => $a['label'],
                'url'   => '#' . $a['anchor'],
            );
        }
    }

    /* All published Pages, Products, Industries */
    $groups = array(
        'page'     => 'Pages',
        'product'  => 'Products',
        'industry' => 'Industries',
    );
    foreach ($groups as $pt => $group_label) {
        $q = new WP_Query(array(
            'post_type'      => $pt,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'no_found_rows'  => true,
            'fields'         => 'ids',
        ));
        foreach ($q->posts as $pid) {
            if ((int)$pid === (int)$current_id) continue;
            $targets[] = array(
                'group' => $group_label,
                'label' => get_the_title($pid),
                'url'   => str_replace(home_url(), '', get_permalink($pid)) ?: '/',
            );
        }
    }
    ?>
    <style>
        .ee-lp-tip   { background:#eff6ff; border-left:3px solid #2563eb; padding:8px 10px; font-size:12px; line-height:1.55; color:#1e3a8a; border-radius:0 4px 4px 0; margin-bottom:10px; }
        .ee-lp-tip code { background:#fff; padding:1px 5px; border-radius:3px; font-size:11.5px; }
        .ee-lp-search { width:100%; padding:8px 10px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; margin-bottom:8px; box-sizing:border-box; }
        .ee-lp-list   { max-height:340px; overflow-y:auto; border:1px solid #e2e8f0; border-radius:5px; background:#fff; }
        .ee-lp-group  { font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:.6px; color:#94a3b8; padding:8px 10px 4px; background:#f8fafc; border-bottom:1px solid #e2e8f0; }
        .ee-lp-item   { display:grid; grid-template-columns:1fr auto; gap:6px; align-items:center; padding:7px 10px; border-bottom:1px solid #f1f5f9; font-size:12.5px; }
        .ee-lp-item:hover { background:#fff8f1; }
        .ee-lp-title  { color:#19335D; font-weight:600; word-break:break-word; line-height:1.35; }
        .ee-lp-url    { color:#64748b; font-size:11px; font-family:ui-monospace,Menlo,monospace; word-break:break-all; }
        .ee-lp-copy   { background:#19335D; color:#fff; border:none; padding:5px 9px; font-size:11px; border-radius:3px; cursor:pointer; flex-shrink:0; }
        .ee-lp-copy:hover { background:#DE6E30; }
        .ee-lp-copy.copied { background:#16a34a; }
        .ee-lp-hidden { display:none !important; }
        .ee-lp-builder { background:#fff8f1; border:1px solid #fde7d3; padding:10px; border-radius:5px; margin-top:10px; }
        .ee-lp-builder label { display:block; font-size:11.5px; font-weight:600; margin-bottom:3px; color:#1d2327; }
        .ee-lp-builder input { width:100%; padding:6px 8px; border:1px solid #cbd5e1; border-radius:3px; font-size:12px; margin-bottom:6px; box-sizing:border-box; }
        .ee-lp-builder .ee-lp-preview { background:#fff; padding:6px 8px; border:1px dashed #cbd5e1; border-radius:3px; font-family:ui-monospace,Menlo,monospace; font-size:11.5px; word-break:break-all; min-height:18px; color:#0f172a; }
    </style>

    <div class="ee-lp-tip">
        <strong>How to insert a link anywhere:</strong><br>
        Type <code>[click here](/url/)</code> in any text field. It will render as a clickable link.<br>
        Or use the buttons below to <strong>copy a ready-made link</strong> and paste it into your text.
    </div>

    <input type="search" id="ee-lp-search" class="ee-lp-search" placeholder="🔎 Search pages, products, industries…" autocomplete="off">

    <div class="ee-lp-list" id="ee-lp-list">
        <?php
        $last_group = '';
        foreach ($targets as $t) :
            if ($t['group'] !== $last_group) :
                if ($last_group !== '') echo '';
                ?><div class="ee-lp-group"><?php echo esc_html($t['group']); ?></div><?php
                $last_group = $t['group'];
            endif;
            $markdown = '[' . $t['label'] . '](' . $t['url'] . ')';
            ?>
            <div class="ee-lp-item" data-search="<?php echo esc_attr(strtolower($t['label'] . ' ' . $t['url'])); ?>">
                <div>
                    <div class="ee-lp-title"><?php echo esc_html($t['label']); ?></div>
                    <div class="ee-lp-url"><?php echo esc_html($t['url']); ?></div>
                </div>
                <button type="button" class="ee-lp-copy" data-copy="<?php echo esc_attr($markdown); ?>" title="Copy this link tag">Copy</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="ee-lp-builder">
        <label>Build a custom link</label>
        <input type="text" id="ee-lp-text" placeholder="Visible text (e.g. Read more)">
        <input type="text" id="ee-lp-href" placeholder="URL or #anchor (e.g. /pricing/ or #faq)">
        <div class="ee-lp-preview" id="ee-lp-preview" aria-live="polite">[Read more](/pricing/)</div>
        <button type="button" class="ee-lp-copy" id="ee-lp-build-copy" style="margin-top:6px;width:100%;padding:7px;">Copy custom link</button>
    </div>

    <script>
    (function(){
        var search = document.getElementById('ee-lp-search');
        var items  = document.querySelectorAll('#ee-lp-list .ee-lp-item');
        var groups = document.querySelectorAll('#ee-lp-list .ee-lp-group');

        function filter() {
            var q = (search.value || '').trim().toLowerCase();
            items.forEach(function(it){
                var match = !q || it.dataset.search.indexOf(q) !== -1;
                it.classList.toggle('ee-lp-hidden', !match);
            });
            // Hide group headers whose visible items are all hidden
            groups.forEach(function(g){
                var visible = false, n = g.nextElementSibling;
                while (n && !n.classList.contains('ee-lp-group')) {
                    if (n.classList.contains('ee-lp-item') && !n.classList.contains('ee-lp-hidden')) { visible = true; break; }
                    n = n.nextElementSibling;
                }
                g.classList.toggle('ee-lp-hidden', !visible);
            });
        }
        search.addEventListener('input', filter);

        function copyText(t) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                return navigator.clipboard.writeText(t);
            }
            var ta = document.createElement('textarea');
            ta.value = t; document.body.appendChild(ta);
            ta.select(); document.execCommand('copy'); document.body.removeChild(ta);
            return Promise.resolve();
        }
        document.querySelectorAll('.ee-lp-copy[data-copy]').forEach(function(btn){
            btn.addEventListener('click', function(){
                copyText(btn.dataset.copy).then(function(){
                    var orig = btn.textContent;
                    btn.textContent = '✓ Copied';
                    btn.classList.add('copied');
                    setTimeout(function(){ btn.textContent = orig; btn.classList.remove('copied'); }, 1300);
                });
            });
        });

        // Custom builder
        var bt = document.getElementById('ee-lp-text');
        var bh = document.getElementById('ee-lp-href');
        var bp = document.getElementById('ee-lp-preview');
        var bc = document.getElementById('ee-lp-build-copy');
        function updateBuilder() {
            var t = bt.value || 'link text';
            var h = bh.value || '/your-url/';
            bp.textContent = '[' + t + '](' + h + ')';
        }
        bt.addEventListener('input', updateBuilder);
        bh.addEventListener('input', updateBuilder);
        bc.addEventListener('click', function(){
            copyText(bp.textContent).then(function(){
                bc.textContent = '✓ Copied';
                bc.classList.add('copied');
                setTimeout(function(){ bc.textContent = 'Copy custom link'; bc.classList.remove('copied'); }, 1300);
            });
        });
    })();
    </script>
    <?php
}

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
    $effective    = function_exists('ee_get_client_logos') ? count(ee_get_client_logos($post->ID)) : 0;
    $home_editor  = admin_url('admin.php?page=ee-home-editor#logos');
    ?>
<h3>🏢 Logo Section</h3>

<div style="background:#ecfdf5;border:1px solid #a7f3d0;border-left:4px solid #10b981;padding:14px 16px;border-radius:6px;margin:0 0 18px;font-size:13px;line-height:1.6;">
    <strong style="font-size:14px;">🌐 Logos are managed in one place — the Home Page Editor.</strong>
    <p style="margin:6px 0 10px;color:#475569;">
        Whatever logos you set in <a href="<?php echo esc_url($home_editor); ?>" target="_blank"><strong>🏠 Home Page Editor → 🏢 Logos</strong></a> automatically appear on this page, on every Product page, and on every Industry page.
        Remove a logo there once and it disappears from the entire site.
    </p>
    <p style="margin:0;color:#0f5132;">
        <strong>This page is currently displaying <?php echo (int) $effective; ?> logo<?php echo $effective === 1 ? '' : 's'; ?>.</strong>
        <a href="<?php echo esc_url($home_editor); ?>" target="_blank" style="margin-left:8px;background:#10b981;color:#fff;padding:4px 10px;border-radius:4px;text-decoration:none;font-weight:600;">Open Logo Manager →</a>
    </p>
</div>

<p style="font-size:12px;color:#646970;margin:0 0 18px;font-style:italic;">
    The text below (badge, heading, CTA) is page-specific so each page can have its own copy above the same logo strip.
</p>

<div class="field-group"><label>Badge Text</label>           <input type="text" name="logo_badge"       value="<?php echo esc_attr($f('logo_badge')); ?>"></div>
<div class="field-group"><label>Title Line 1 (small)</label> <input type="text" name="logo_title_line1" value="<?php echo esc_attr($f('logo_title_line1')); ?>"></div>
<div class="field-group"><label>Main Title</label>           <input type="text" name="logo_title"       value="<?php echo esc_attr($f('logo_title')); ?>"></div>
<div class="field-group"><label>Subtitle</label><textarea name="logo_sub" rows="2"><?php echo esc_textarea($f('logo_sub')); ?></textarea></div>

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
if (!function_exists('ee_inline_links')) {
    /**
     * Inline-safe link converter for short fields (hero desc, paragraphs,
     * subtitles). Converts [label](url) and [label](#anchor) to <a> tags.
     * External http(s) URLs open in a new tab. Returns HTML-safe output.
     */
    function ee_inline_links($text) {
        if ($text === null || $text === '') return '';
        $text = (string) $text;
        $text = preg_replace_callback(
            '/\[([^\]]+)\]\(([^)\s]+)\)/u',
            function ($m) {
                $label = $m[1];
                $url   = trim($m[2]);
                $is_anchor   = strpos($url, '#') === 0;
                $is_internal = $is_anchor || strpos($url, '/') === 0 || strpos($url, site_url()) === 0;
                $attrs = $is_internal
                    ? 'href="' . esc_url($url) . '"'
                    : 'href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer"';
                return '<a ' . $attrs . '>' . esc_html($label) . '</a>';
            },
            $text
        );
        return wp_kses_post($text);
    }
}

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

        /* Markdown-style links: [label](url)  →  <a href="url">label</a>
           - URLs starting with "#"          → in-page anchor (same tab)
           - Relative URLs starting with "/" → internal (same tab)
           - Absolute http(s) URLs           → new tab, rel noopener
           Runs BEFORE block parsing so links inside list items work too. */
        $text = preg_replace_callback(
            '/\[([^\]]+)\]\(([^)\s]+)\)/u',
            function ($m) {
                $label = $m[1];
                $url   = trim($m[2]);
                $is_anchor   = strpos($url, '#') === 0;
                $is_internal = $is_anchor || strpos($url, '/') === 0 || strpos($url, site_url()) === 0;
                $attrs = $is_internal
                    ? 'href="' . esc_url($url) . '"'
                    : 'href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer"';
                return '<a ' . $attrs . '>' . esc_html($label) . '</a>';
            },
            $text
        );

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
            array('title' => 'Higher Education',       'desc' => 'End-to-end admissions solutions tailored for higher education institutions.', 'short_desc' => 'For higher ed institutions.',       'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Higher_Education_CRM_crm_icon.png',       'url' => '/industries/higher-education-crm/',   'tags' => array('Lead Automation','Multi-Campus','Analytics')),
            array('title' => 'School',                 'desc' => 'A customized CRM to digitize and streamline student admissions processes.',    'short_desc' => 'Digitize student admissions.',    'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/School-focused_CRM_Icons.png',        'url' => '/industries/school-crm/',             'tags' => array('Parent Engagement','Digital Forms','Workflows')),
            array('title' => 'EdTech',                 'desc' => 'A comprehensive admissions platform built for tech-driven learning organizations.', 'short_desc' => 'For tech-driven learning.',  'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Edtech_CRM_Icon.png', 'url' => '/industries/edtech-crm/',             'tags' => array('API Integrations','Funnel Tracking','Retargeting')),
            array('title' => 'Vocational',             'desc' => 'A powerful CRM designed to support vocational training admissions.',           'short_desc' => 'Vocational training.',            'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Vocational_CRM_Icon.png',     'url' => '/industries/vocational-crm/',         'tags' => array('Batch Management','Fee Tracking','Counselling')),
            array('title' => 'Coaching Institute CRM', 'desc' => 'An all-in-one CRM solution for test prep and coaching institutes.',           'short_desc' => 'All-in-one for test prep.',       'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Coaching_Admissions_Management_CRM.png',          'url' => '/industries/coaching-institute-crm/', 'tags' => array('Demo Tracking','WhatsApp CRM','Reports')),
            array('title' => 'Overseas',               'desc' => 'A complete applications platform for study abroad and international admissions teams.', 'short_desc' => 'Study abroad admissions.', 'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Overseas_Education_CRM_icon.png',      'url' => '/industries/overseas-crm/',           'tags' => array('Visa Pipeline','Doc Collection','Multi-Country')),
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
                <input type="url" name="industry_icon_url" value="<?php echo esc_attr($icon); ?>" placeholder="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Higher_Education_CRM_crm_icon.png">
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
// G3. PRODUCT MENU HELPER — shared by header.php + /products/ page
// ══════════════════════════════════════════════════════════
/**
 * Returns the product modules used on /products/ and the header mega-menu.
 * Pulls from the Product CPT first so the editor can add or rename a
 * product post and it shows up automatically. Falls back to a seeded set
 * of 6 modules when the CPT has no published posts.
 *
 * Each item: { title, desc, url, icon }
 */
function ee_get_product_menu_items($limit = 0) {
    static $cache = null;
    if ($cache !== null) {
        return $limit > 0 ? array_slice($cache, 0, $limit) : $cache;
    }

    $items = array();
    $q = new WP_Query(array(
        'post_type'      => 'product',
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
            $meta_desc = get_post_meta($pid, '_product_card_desc', true);
            $desc      = $meta_desc ?: (get_the_excerpt() ?: wp_trim_words(get_the_content(), 24, '…'));
            $items[]   = array(
                'title'  => get_the_title(),
                'desc'   => $desc,
                'url'    => str_replace(home_url(), '', get_permalink($pid)) ?: get_permalink($pid),
                'icon'   => get_post_meta($pid, '_product_card_icon',   true),
                'column' => get_post_meta($pid, '_product_card_column', true) ?: 'featured',
                'badge'  => get_post_meta($pid, '_product_card_badge',  true) ?: 'none',
                'order'  => (int) get_post_meta($pid, '_product_card_order', true),
            );
        }
        wp_reset_postdata();
    }

    if (empty($items)) {
        $items = array(
            array('title' => 'Education CRM',         'desc' => 'Streamline your entire admissions process on a single, unified platform — from inquiry to enrollment.', 'url' => '/products/education-crm/',                 'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/education-crm-icon.png',         'column' => 'featured',      'badge' => 'popular', 'order' => 0),
            array('title' => 'Education Chatbot',     'desc' => 'Manage and respond to admissions queries 24/7 with intelligent AI-powered automation.',                  'url' => '/products/chatbot-for-education/',         'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/education-chatbot-icon.png',     'column' => 'communication', 'badge' => 'trending', 'order' => 0),
            array('title' => 'Application Management','desc' => 'Simplify and scale your application workflows with a fully digital, paperless experience.',              'url' => '/products/application-management-system/', 'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Application_Management_System_Icon.png', 'column' => 'core',          'badge' => 'none',    'order' => 0),
            array('title' => 'Mobile CRM',            'desc' => 'Boost admissions conversions by identifying and engaging high-intent prospects on the go.',              'url' => '/products/mobile-crm/',                    'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Mobile_CRM_Icon.png',            'column' => 'featured',      'badge' => 'none',    'order' => 1),
            array('title' => 'WhatsApp API & Bot',    'desc' => 'Engage prospects through personalized, one-on-one WhatsApp conversations at scale.',                     'url' => '/products/whatsapp-api/',                  'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/WhatsApp_API_icon.png',          'column' => 'communication', 'badge' => 'none',    'order' => 1),
            array('title' => 'IVR System',            'desc' => 'Route, record, and track all counselor calls within a centralized, analytics-ready system.',             'url' => '/products/ivr/',                           'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/IVR_SYSTEM_icon.png',            'column' => 'communication', 'badge' => 'none',    'order' => 2),
        );
    }

    /* Sort each item by its in-column "order" field (then by name) so the
       editor can fine-tune the row order inside a single column. */
    usort($items, function ($a, $b) {
        $cmp = ($a['order'] ?? 0) - ($b['order'] ?? 0);
        if ($cmp !== 0) return $cmp;
        return strcasecmp($a['title'], $b['title']);
    });

    $cache = $items;
    return $limit > 0 ? array_slice($items, 0, $limit) : $items;
}

/* Product CPT meta box — same idea as the Industry card settings.
   Lets the non-coder set per-product card icon + short description shown on /products/. */
add_action('add_meta_boxes', function () {
    add_meta_box(
        'product_card_settings',
        '🏷 Product Card Settings (icon, column, badge, description)',
        function ($post) {
            wp_nonce_field('product_card_meta', 'product_card_meta_nonce');
            $icon   = get_post_meta($post->ID, '_product_card_icon', true);
            $desc   = get_post_meta($post->ID, '_product_card_desc', true);
            $column = get_post_meta($post->ID, '_product_card_column', true) ?: 'featured';
            $badge  = get_post_meta($post->ID, '_product_card_badge',  true) ?: 'none';
            $order  = get_post_meta($post->ID, '_product_card_order',  true);
            ?>
            <style>
                .pcd-row { margin-bottom: 16px; }
                .pcd-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
                .pcd-row input, .pcd-row textarea, .pcd-row select { width:100%; padding:8px; border:1px solid #ddd; border-radius:4px; font-size:13px; font-family:inherit; box-sizing:border-box; }
                .pcd-row textarea { resize:vertical; min-height:70px; }
                .pcd-row .hint { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
                .pcd-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
                .pcd-pill-preview { display:inline-block; font-size:.65rem; font-weight:700; padding:.15rem .45rem; border-radius:4px; text-transform:uppercase; letter-spacing:.02em; margin-left:6px; color:#fff; vertical-align:middle; }
                .pcd-pill-preview.new      { background:#10B981; }
                .pcd-pill-preview.popular  { background:#DE6E30; }
                .pcd-pill-preview.trending { background:#F59E0B; }
                .pcd-pill-preview.hot      { background:#DE6E30; }
            </style>

            <div style="background:#ecfdf5;border:1px solid #a7f3d0;border-left:4px solid #10b981;padding:10px 14px;border-radius:5px;margin-bottom:14px;font-size:12.5px;line-height:1.55;color:#065F46;">
                <strong>📍 Header placement:</strong> Pick which column of the <em>Products</em> mega-menu this product appears in, and optionally a badge. The /products/ landing page lists every product regardless of column.
            </div>

            <div class="pcd-grid">
                <div class="pcd-row">
                    <label>Menu Column <span style="color:#DE6E30">★</span></label>
                    <select name="product_card_column">
                        <option value="featured"     <?php selected($column, 'featured');     ?>>⭐ Featured</option>
                        <option value="core"         <?php selected($column, 'core');         ?>>🎯 Core CRM</option>
                        <option value="communication"<?php selected($column, 'communication');?>>💬 Communication</option>
                        <option value="automation"   <?php selected($column, 'automation');   ?>>⚡ Automation</option>
                        <option value="hidden"       <?php selected($column, 'hidden');       ?>>🚫 Hide from menu</option>
                    </select>
                    <p class="hint">Where it shows in the Products mega-menu.</p>
                </div>
                <div class="pcd-row">
                    <label>Badge</label>
                    <select name="product_card_badge">
                        <option value="none"     <?php selected($badge, 'none');     ?>>— None —</option>
                        <option value="new"      <?php selected($badge, 'new');      ?>>NEW (green)</option>
                        <option value="popular"  <?php selected($badge, 'popular');  ?>>POPULAR (orange)</option>
                        <option value="trending" <?php selected($badge, 'trending'); ?>>TRENDING (amber)</option>
                        <option value="hot"      <?php selected($badge, 'hot');      ?>>HOT (pulsing orange)</option>
                    </select>
                    <p class="hint">Live preview:
                        <?php if ($badge && $badge !== 'none') : ?>
                            <span class="pcd-pill-preview <?php echo esc_attr($badge); ?>"><?php echo esc_html(strtoupper($badge)); ?></span>
                        <?php else : ?>
                            <em style="color:#94a3b8;">no badge</em>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="pcd-row">
                    <label>Order in column</label>
                    <input type="number" name="product_card_order" value="<?php echo esc_attr($order); ?>" placeholder="0" min="-99" max="99">
                    <p class="hint">Lower numbers show first. Leave blank for default.</p>
                </div>
            </div>

            <div class="pcd-row">
                <label>Card Icon URL</label>
                <input type="url" name="product_card_icon" value="<?php echo esc_attr($icon); ?>" placeholder="https://www.extraaedge.com/wp-content/uploads/icons/chart-bar.svg">
                <p class="hint">Use any SVG from <code>/wp-content/uploads/icons/</code>. Examples: <code>chart-bar.svg</code> · <code>robot.svg</code> · <code>mobile.svg</code> · <code>whatsapp.svg</code> · <code>phone.svg</code>.</p>
            </div>
            <div class="pcd-row">
                <label>Short Description (shown in mega-menu + on /products/ card)</label>
                <textarea name="product_card_desc" rows="3" placeholder="One-line summary of the product — 1 to 2 sentences."><?php echo esc_textarea($desc); ?></textarea>
                <p class="hint">Falls back to the post Excerpt when blank.</p>
            </div>
            <?php
        },
        'product',
        'normal',
        'high'
    );
});
add_action('save_post_product', function ($post_id) {
    if (!isset($_POST['product_card_meta_nonce']) || !wp_verify_nonce($_POST['product_card_meta_nonce'], 'product_card_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['product_card_icon'])) {
        update_post_meta($post_id, '_product_card_icon', esc_url_raw(wp_unslash($_POST['product_card_icon'])));
    }
    if (isset($_POST['product_card_desc'])) {
        update_post_meta($post_id, '_product_card_desc', sanitize_textarea_field(wp_unslash($_POST['product_card_desc'])));
    }
    $valid_cols  = array('featured', 'core', 'communication', 'automation', 'hidden');
    $valid_badge = array('none', 'new', 'popular', 'trending', 'hot');
    if (isset($_POST['product_card_column'])) {
        $val = sanitize_key(wp_unslash($_POST['product_card_column']));
        update_post_meta($post_id, '_product_card_column', in_array($val, $valid_cols, true) ? $val : 'featured');
    }
    if (isset($_POST['product_card_badge'])) {
        $val = sanitize_key(wp_unslash($_POST['product_card_badge']));
        update_post_meta($post_id, '_product_card_badge', in_array($val, $valid_badge, true) ? $val : 'none');
    }
    if (isset($_POST['product_card_order'])) {
        $val = is_numeric($_POST['product_card_order']) ? (int) $_POST['product_card_order'] : '';
        update_post_meta($post_id, '_product_card_order', $val);
    }
});

// ══════════════════════════════════════════════════════════
// G4. USE-CASE MENU HELPER — single source of truth: the use_case CPT
// ══════════════════════════════════════════════════════════
/**
 * Returns the Use Case items used on /use-cases/ and in the header mega-menu.
 * Pulls every published use_case CPT post (title, permalink, _usecase_icon,
 * _usecase_lucide, _usecase_short_desc). Falls back to a seeded 3-card list when
 * the CPT has no posts, so the site never renders an empty Use Cases section.
 */
function ee_get_usecase_items($limit = 0) {
    static $cache = null;
    if ($cache !== null) {
        return $limit > 0 ? array_slice($cache, 0, $limit) : $cache;
    }
    $items = array();
    $q = new WP_Query(array(
        'post_type'      => 'use_case',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ));
    if ($q->have_posts()) {
        while ($q->have_posts()) {
            $q->the_post();
            $pid = get_the_ID();
            $meta_desc = get_post_meta($pid, '_usecase_short_desc', true);
            $desc = $meta_desc ?: (get_the_excerpt() ?: wp_trim_words(get_the_content(), 24, '…'));
            $items[] = array(
                'title'  => get_the_title(),
                'desc'   => $desc,
                'url'    => str_replace(home_url(), '', get_permalink($pid)) ?: get_permalink($pid),
                'icon'   => get_post_meta($pid, '_usecase_icon', true),
                'lucide' => get_post_meta($pid, '_usecase_lucide', true),
            );
        }
        wp_reset_postdata();
    }
    if (empty($items)) {
        $items = array(
            array('title' => 'For Management',    'desc' => 'Take data-driven decisions on increasing admissions, counselor &amp; channel performance.',                    'url' => '/use-cases/management/',            'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/for_management_crm_icon.png', 'lucide' => 'bar-chart-3'),
            array('title' => 'On Field Agents',   'desc' => 'Automate your home demos, events, seminars, and outbound sales processes.',                                  'url' => '/use-cases/on-field-agents/',       'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/on_filed_agent_crm.png',    'lucide' => 'map-pin'),
            array('title' => 'For Counselors',    'desc' => 'Increase your counselors efficiency by mapping the entire student journey with timely follow-ups.',        'url' => '/use-cases/admission-counselors/', 'icon' => 'https://www.extraaedge.com/wp-content/uploads/2026/icon-png/For_consolers_crm_icon.png',          'lucide' => 'user-check'),
        );
    }
    $cache = $items;
    return $limit > 0 ? array_slice($items, 0, $limit) : $items;
}

/* Use Case CPT meta box — per-post icon, short description, lucide name. */
add_action('add_meta_boxes', function () {
    add_meta_box(
        'usecase_card_settings',
        '🏷 Use Case Card Settings (icon + short description)',
        function ($post) {
            wp_nonce_field('usecase_card_meta', 'usecase_card_meta_nonce');
            $icon   = get_post_meta($post->ID, '_usecase_icon',       true);
            $desc   = get_post_meta($post->ID, '_usecase_short_desc', true);
            $lucide = get_post_meta($post->ID, '_usecase_lucide',     true);
            ?>
            <style>
                .ucd-row { margin-bottom: 16px; }
                .ucd-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
                .ucd-row input, .ucd-row textarea { width:100%; padding:8px; border:1px solid #ddd; border-radius:4px; font-size:13px; font-family:inherit; }
                .ucd-row textarea { resize:vertical; min-height:70px; }
                .ucd-row .hint { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
            </style>
            <div class="ucd-row">
                <label>Card Icon Image URL</label>
                <input type="url" name="usecase_icon" value="<?php echo esc_attr($icon); ?>" placeholder="https://yoursite.com/wp-content/uploads/icon.png">
                <p class="hint">32×32 to 80×80 px PNG/SVG.</p>
            </div>
            <div class="ucd-row">
                <label>Lucide Icon Name (fallback when no image URL)</label>
                <input type="text" name="usecase_lucide" value="<?php echo esc_attr($lucide); ?>" placeholder="bar-chart-3 / map-pin / user-check">
                <p class="hint">Pick from <a href="https://lucide.dev/icons/" target="_blank">lucide.dev/icons</a>.</p>
            </div>
            <div class="ucd-row">
                <label>Short Description (shown on /use-cases/ card + header tooltip)</label>
                <textarea name="usecase_short_desc" rows="3" placeholder="1–2 sentence summary of who this role helps."><?php echo esc_textarea($desc); ?></textarea>
                <p class="hint">Falls back to the post Excerpt when blank.</p>
            </div>
            <?php
        },
        'use_case',
        'normal',
        'high'
    );
});
add_action('save_post_use_case', function ($post_id) {
    if (!isset($_POST['usecase_card_meta_nonce']) || !wp_verify_nonce($_POST['usecase_card_meta_nonce'], 'usecase_card_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['usecase_icon']))       update_post_meta($post_id, '_usecase_icon',       esc_url_raw(wp_unslash($_POST['usecase_icon'])));
    if (isset($_POST['usecase_lucide']))     update_post_meta($post_id, '_usecase_lucide',     sanitize_text_field(wp_unslash($_POST['usecase_lucide'])));
    if (isset($_POST['usecase_short_desc'])) update_post_meta($post_id, '_usecase_short_desc', sanitize_textarea_field(wp_unslash($_POST['usecase_short_desc'])));
});

// ══════════════════════════════════════════════════════════
// G5. SOLUTIONS MENU HELPER — admin-editable list (no CPT needed)
// ══════════════════════════════════════════════════════════
/**
 * Solutions are vendor-style landing pages, not posts, so they live in
 * a single 'ee_solution_items' option that's editable on a dedicated
 * admin page. Each solution belongs to one of three columns:
 *   admission  | study_abroad | recruitment
 * Falls back to a seeded list when the option is empty so the header
 * never renders without items on a fresh deploy.
 *
 * @return array<string, array<array{title:string, desc:string, url:string, icon:string}>>
 */
function ee_get_solution_items() {
    static $cache = null;
    if ($cache !== null) return $cache;

    $saved = get_option('ee_solution_items', array());
    if (is_array($saved) && (!empty($saved['admission']) || !empty($saved['study_abroad']) || !empty($saved['recruitment']))) {
        $cache = array_merge(array('admission' => array(), 'study_abroad' => array(), 'recruitment' => array()), $saved);
        return $cache;
    }

    $cache = array(
        'admission' => array(
            array('title' => 'Admission Management',   'desc' => 'Complete admission lifecycle',     'url' => '/admission-management-software/',         'icon' => 'file'),
            array('title' => 'Enrollment Management',  'desc' => 'Track student enrollment',         'url' => '/enrollment-management-software/',        'icon' => 'chart-bar'),
            array('title' => 'Walk-in Management',     'desc' => 'Track campus visits',              'url' => '/walk-in-management-system/',             'icon' => 'users'),
        ),
        'study_abroad' => array(
            array('title' => 'Study Abroad CRM',       'desc' => 'International students',           'url' => '/study-abroad-software/',                 'icon' => 'plane'),
            array('title' => 'Education Agents',       'desc' => 'For recruitment agents',           'url' => '/crm-for-education-agent/',               'icon' => 'handshake'),
            array('title' => 'Education Consultants',  'desc' => 'Consulting business tools',        'url' => '/crm-for-education-consultant/',          'icon' => 'briefcase'),
        ),
        'recruitment' => array(
            array('title' => 'Student Recruitment',    'desc' => 'Attract top students',             'url' => '/student-recruitment-software/',          'icon' => 'users'),
            array('title' => 'Lead Management',        'desc' => 'Centralized tracking',             'url' => '/centralised-lead-management/',           'icon' => 'bullseye'),
            array('title' => 'Lead Nurturing',         'desc' => 'Convert more leads',               'url' => '/strategic-lead-nurturing/',              'icon' => 'seedling'),
            array('title' => 'Enrollment CRM',         'desc' => 'Boost enrollment',                 'url' => '/crm-enrollment-management/',             'icon' => 'chart-line'),
        ),
    );
    return $cache;
}

/* Top-level admin menu — "🧩 Solutions" — lets the non-coder add / edit
   rows in any of the three columns without touching code. */
add_action('admin_menu', function () {
    add_menu_page('Solutions', '🧩 Solutions', 'manage_options', 'ee-solutions', 'ee_solutions_render_admin', 'dashicons-grid-view', 61);
});
add_action('admin_post_ee_save_solution_items', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_solutions_save');
    $clean = array('admission' => array(), 'study_abroad' => array(), 'recruitment' => array());
    foreach (array_keys($clean) as $col) {
        $rows = isset($_POST['sol'][$col]) && is_array($_POST['sol'][$col]) ? $_POST['sol'][$col] : array();
        foreach ($rows as $r) {
            $title = isset($r['title']) ? sanitize_text_field(wp_unslash($r['title'])) : '';
            if ($title === '') continue;
            $clean[$col][] = array(
                'title' => $title,
                'desc'  => isset($r['desc']) ? sanitize_text_field(wp_unslash($r['desc'])) : '',
                'url'   => isset($r['url'])  ? esc_url_raw(wp_unslash($r['url']))         : '',
                'icon'  => isset($r['icon']) ? sanitize_text_field(wp_unslash($r['icon'])): 'star',
            );
        }
    }
    update_option('ee_solution_items', $clean);
    wp_cache_delete('ee_solution_items', 'options');
    if (function_exists('rocket_clean_domain'))  { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))   { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))        { do_action('litespeed_purge_all'); }
    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-solutions')));
    exit;
});
function ee_solutions_render_admin() {
    $sol = ee_get_solution_items();
    $col_labels = array(
        'admission'    => 'Admission Solutions',
        'study_abroad' => 'Study Abroad',
        'recruitment'  => 'Recruitment &amp; Lead Management',
    );
    ?>
    <div class="wrap">
        <h1>🧩 Solutions <span style="font-size:13px;color:#646970;font-weight:400;">— the items in the header Solutions mega-menu</span></h1>
        <?php if (!empty($_GET['updated'])) : ?>
            <div class="notice notice-success is-dismissible"><p><strong>Saved.</strong> The Solutions mega-menu has been updated.</p></div>
        <?php endif; ?>
        <p>Edit any column below. Each row becomes one link in the corresponding column of the header Solutions mega-menu. Leave a Title blank to remove that row.</p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="max-width:1100px;">
            <input type="hidden" name="action" value="ee_save_solution_items">
            <?php wp_nonce_field('ee_solutions_save'); ?>
            <style>
                .ee-sol-col   { background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:14px; margin-bottom:18px; }
                .ee-sol-col h2{ margin:0 0 12px; font-size:15px; color:#19335D; display:flex; align-items:center; gap:8px; }
                .ee-sol-row   { display:grid; grid-template-columns:1.2fr 1.5fr 1.2fr .7fr 28px; gap:10px; padding:10px; background:#f8fafc; border-radius:5px; margin-bottom:8px; align-items:center; }
                .ee-sol-row input { width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; box-sizing:border-box; }
                .ee-sol-row .rm   { background:transparent; border:1px solid #fecaca; color:#b91c1c; padding:4px 8px; border-radius:4px; cursor:pointer; font-size:12px; }
                .ee-sol-add  { background:#19335D; color:#fff; border:none; padding:6px 14px; border-radius:4px; cursor:pointer; font-size:12px; font-weight:600; }
                .ee-sol-head { display:grid; grid-template-columns:1.2fr 1.5fr 1.2fr .7fr 28px; gap:10px; padding:0 10px; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.5px; margin-bottom:4px; }
            </style>
            <?php foreach ($col_labels as $col_key => $col_label) :
                $rows = isset($sol[$col_key]) ? $sol[$col_key] : array();
            ?>
            <div class="ee-sol-col">
                <h2><?php echo wp_kses_post($col_label); ?></h2>
                <div class="ee-sol-head"><span>Title</span><span>Description</span><span>Link URL</span><span>Icon name</span><span></span></div>
                <div class="ee-sol-list" data-col="<?php echo esc_attr($col_key); ?>">
                    <?php foreach ($rows as $i => $r) : ?>
                    <div class="ee-sol-row">
                        <input type="text" name="sol[<?php echo esc_attr($col_key); ?>][<?php echo (int)$i; ?>][title]" value="<?php echo esc_attr($r['title']); ?>" placeholder="Solution title">
                        <input type="text" name="sol[<?php echo esc_attr($col_key); ?>][<?php echo (int)$i; ?>][desc]"  value="<?php echo esc_attr($r['desc']); ?>"  placeholder="Short description">
                        <input type="text" name="sol[<?php echo esc_attr($col_key); ?>][<?php echo (int)$i; ?>][url]"   value="<?php echo esc_attr($r['url']); ?>"   placeholder="/your-page/ or full URL">
                        <input type="text" name="sol[<?php echo esc_attr($col_key); ?>][<?php echo (int)$i; ?>][icon]"  value="<?php echo esc_attr($r['icon'] ?? 'star'); ?>" placeholder="star / file / users">
                        <button type="button" class="rm" onclick="this.closest('.ee-sol-row').remove()">✕</button>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="ee-sol-add" onclick="eeSolAdd('<?php echo esc_js($col_key); ?>', this)">+ Add row</button>
            </div>
            <?php endforeach; ?>
            <?php submit_button('💾 Save Solutions', 'primary large'); ?>
            <p style="color:#646970;font-size:12px;">Icon name = filename (without .svg) from <code>/wp-content/uploads/icons/</code>. Examples: <code>star · file · users · bullseye · chart-line · seedling · plane · handshake · briefcase</code>.</p>
        </form>
        <script>
        function eeSolAdd(col, btn) {
            var list = btn.parentElement.querySelector('.ee-sol-list');
            var idx  = list.children.length;
            var row  = document.createElement('div');
            row.className = 'ee-sol-row';
            row.innerHTML =
                '<input type="text" name="sol['+col+']['+idx+'][title]" placeholder="Solution title">' +
                '<input type="text" name="sol['+col+']['+idx+'][desc]"  placeholder="Short description">' +
                '<input type="text" name="sol['+col+']['+idx+'][url]"   placeholder="/your-page/ or full URL">' +
                '<input type="text" name="sol['+col+']['+idx+'][icon]"  placeholder="star / file / users" value="star">' +
                '<button type="button" class="rm">✕</button>';
            list.appendChild(row);
        }
        /* Event delegation — handles ✕ click for both existing rows
           rendered by PHP and any dynamically-added rows. */
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList && e.target.classList.contains('rm') && e.target.closest('.ee-sol-row')) {
                e.target.closest('.ee-sol-row').remove();
            }
        });
        </script>
    </div>
    <?php
}

// ══════════════════════════════════════════════════════════
// G6. PRODUCTS MEGA-MENU BANNERS — Vidya.ai promo + Quick Access
// ══════════════════════════════════════════════════════════
/**
 * Featured promo strip at the top of the Products mega-menu.
 * Stored in 'ee_products_promo' option as { badge, title, desc,
 * btn_text, btn_url, visual_icon }. Falls back to the original
 * Vidya.ai promo when the option is empty.
 */
function ee_get_products_promo() {
    static $cache = null;
    if ($cache !== null) return $cache;
    $saved = get_option('ee_products_promo', array());
    $defaults = array(
        'badge'        => 'NEW',
        'title'        => 'Vidya.ai - AI-Powered Education Platform',
        'desc'         => 'Transform your educational institution with cutting-edge AI technology. Intelligent automation, personalized learning, and advanced analytics in one powerful platform.',
        'btn_text'     => 'Explore Vidya.ai',
        'btn_url'      => 'https://getvidya.ai/',
        'visual_icon'  => 'robot',
        'enabled'      => '1',
    );
    $cache = array_merge($defaults, is_array($saved) ? $saved : array());
    return $cache;
}

/**
 * Quick Access rows below the Products mega-menu (default 4 chips:
 * Vidya.ai - NEW / All Products / Use Cases / Schedule Demo).
 * Stored in 'ee_products_quick_links' as a list of { label, url,
 * icon, target }. Falls back to the original 4-row layout.
 */
function ee_get_products_quick_links() {
    static $cache = null;
    if ($cache !== null) return $cache;
    $saved = get_option('ee_products_quick_links', array());
    if (is_array($saved) && !empty($saved)) {
        $cache = $saved;
        return $cache;
    }
    $cache = array(
        array('label' => 'Vidya.ai - NEW',  'url' => 'https://getvidya.ai/',     'icon' => 'robot',    'target' => '_blank'),
        array('label' => 'All Products',    'url' => '/products/',               'icon' => 'box',      'target' => '_self'),
        array('label' => 'Use Cases',       'url' => '/use-cases/',              'icon' => 'bullseye', 'target' => '_self'),
        array('label' => 'Schedule Demo',   'url' => '/book-demo/',              'icon' => 'film',     'target' => '_self'),
    );
    return $cache;
}

/* Top-level admin menu — 🛍 Products Menu Banners */
add_action('admin_menu', function () {
    add_menu_page(
        'Products Menu Banners', '🛍 Products Menu', 'manage_options',
        'ee-products-menu', 'ee_products_menu_render_admin',
        'dashicons-cart', 62
    );
});
add_action('admin_post_ee_save_products_menu', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_products_menu_save');

    /* Promo strip */
    $p = isset($_POST['promo']) && is_array($_POST['promo']) ? $_POST['promo'] : array();
    $clean_promo = array(
        'badge'       => sanitize_text_field(wp_unslash($p['badge']        ?? 'NEW')),
        'title'       => sanitize_text_field(wp_unslash($p['title']        ?? '')),
        'desc'        => sanitize_textarea_field(wp_unslash($p['desc']     ?? '')),
        'btn_text'    => sanitize_text_field(wp_unslash($p['btn_text']     ?? '')),
        'btn_url'     => esc_url_raw(wp_unslash($p['btn_url']              ?? '')),
        'visual_icon' => sanitize_text_field(wp_unslash($p['visual_icon']  ?? 'robot')),
        'enabled'     => !empty($p['enabled']) ? '1' : '0',
    );
    update_option('ee_products_promo', $clean_promo);

    /* Quick links */
    $rows  = isset($_POST['qlink']) && is_array($_POST['qlink']) ? $_POST['qlink'] : array();
    $clean = array();
    foreach ($rows as $r) {
        $label = isset($r['label']) ? sanitize_text_field(wp_unslash($r['label'])) : '';
        if ($label === '') continue;
        $clean[] = array(
            'label'  => $label,
            'url'    => isset($r['url'])    ? esc_url_raw(wp_unslash($r['url']))             : '',
            'icon'   => isset($r['icon'])   ? sanitize_text_field(wp_unslash($r['icon']))    : 'star',
            'target' => isset($r['target']) && $r['target'] === '_blank' ? '_blank' : '_self',
        );
    }
    update_option('ee_products_quick_links', $clean);

    /* Cache bust */
    wp_cache_delete('ee_products_promo', 'options');
    wp_cache_delete('ee_products_quick_links', 'options');
    if (function_exists('rocket_clean_domain')) { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))  { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))       { do_action('litespeed_purge_all'); }

    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-products-menu')));
    exit;
});
function ee_products_menu_render_admin() {
    $promo = ee_get_products_promo();
    $links = ee_get_products_quick_links();
    ?>
    <div class="wrap">
        <h1>🛍 Products Menu Banners <span style="font-size:13px;color:#646970;font-weight:400;">— the featured promo + Quick Access strip in the Products mega-menu</span></h1>
        <?php if (!empty($_GET['updated'])) : ?>
            <div class="notice notice-success is-dismissible"><p><strong>Saved.</strong> The Products mega-menu has been updated.</p></div>
        <?php endif; ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="max-width:1000px;">
            <input type="hidden" name="action" value="ee_save_products_menu">
            <?php wp_nonce_field('ee_products_menu_save'); ?>

            <style>
                .epm-card { background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:18px 20px; margin-bottom:20px; }
                .epm-card h2 { margin:0 0 14px; font-size:15px; color:#19335D; display:flex; align-items:center; gap:8px; }
                .epm-row { margin-bottom:14px; }
                .epm-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
                .epm-row input, .epm-row textarea, .epm-row select { width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; font-family:inherit; box-sizing:border-box; }
                .epm-row textarea { resize:vertical; min-height:60px; }
                .epm-row .hint { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
                .epm-grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
                .epm-grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
                .epm-qrow { display:grid; grid-template-columns:1fr 1.5fr 1fr .8fr 28px; gap:10px; padding:10px; background:#f8fafc; border-radius:5px; margin-bottom:8px; align-items:center; }
                .epm-qrow input, .epm-qrow select { width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; box-sizing:border-box; }
                .epm-qrow .rm   { background:transparent; border:1px solid #fecaca; color:#b91c1c; padding:4px 8px; border-radius:4px; cursor:pointer; font-size:12px; }
                .epm-qhead { display:grid; grid-template-columns:1fr 1.5fr 1fr .8fr 28px; gap:10px; padding:0 10px; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.5px; margin-bottom:4px; }
                .epm-add  { background:#19335D; color:#fff; border:none; padding:7px 14px; border-radius:5px; cursor:pointer; font-size:12px; font-weight:600; }
            </style>

            <!-- ─── Featured Promo Strip ─── -->
            <div class="epm-card">
                <h2>🚀 Featured Promo Strip <em style="color:#646970;font-size:12px;font-weight:400;margin-left:6px;">— navy banner at the top of the Products mega-menu</em></h2>

                <label style="display:flex;align-items:center;gap:10px;background:#fff8f1;border:1px solid #fde7d3;padding:10px 14px;border-radius:5px;margin-bottom:14px;">
                    <input type="hidden" name="promo[enabled]" value="0">
                    <input type="checkbox" name="promo[enabled]" value="1" <?php checked($promo['enabled'], '1'); ?>>
                    <span><strong>Show this promo</strong> in the Products mega-menu. Uncheck to hide it without losing the content.</span>
                </label>

                <div class="epm-grid-2">
                    <div class="epm-row">
                        <label>Badge text</label>
                        <input type="text" name="promo[badge]" value="<?php echo esc_attr($promo['badge']); ?>" placeholder="NEW">
                        <p class="hint">Short uppercase tag at the start of the title. Leave blank to skip.</p>
                    </div>
                    <div class="epm-row">
                        <label>Visual icon name</label>
                        <input type="text" name="promo[visual_icon]" value="<?php echo esc_attr($promo['visual_icon']); ?>" placeholder="robot">
                        <p class="hint">Filename from <code>/wp-content/uploads/icons/</code> (without .svg).</p>
                    </div>
                </div>
                <div class="epm-row">
                    <label>Title</label>
                    <input type="text" name="promo[title]" value="<?php echo esc_attr($promo['title']); ?>" placeholder="Vidya.ai - AI-Powered Education Platform">
                </div>
                <div class="epm-row">
                    <label>Description</label>
                    <textarea name="promo[desc]" rows="3" placeholder="Transform your educational institution with cutting-edge AI technology…"><?php echo esc_textarea($promo['desc']); ?></textarea>
                </div>
                <div class="epm-grid-2">
                    <div class="epm-row">
                        <label>Button text</label>
                        <input type="text" name="promo[btn_text]" value="<?php echo esc_attr($promo['btn_text']); ?>" placeholder="Explore Vidya.ai">
                    </div>
                    <div class="epm-row">
                        <label>Button URL</label>
                        <input type="url" name="promo[btn_url]" value="<?php echo esc_attr($promo['btn_url']); ?>" placeholder="https://getvidya.ai/">
                    </div>
                </div>
            </div>

            <!-- ─── Quick Access Strip ─── -->
            <div class="epm-card">
                <h2>⚡ Quick Access Strip <em style="color:#646970;font-size:12px;font-weight:400;margin-left:6px;">— small chips below the mega-menu (4 columns)</em></h2>
                <div class="epm-qhead"><span>Label</span><span>URL</span><span>Icon name</span><span>Open in</span><span></span></div>
                <div id="epm-qlist">
                    <?php foreach ($links as $i => $r) : ?>
                    <div class="epm-qrow">
                        <input type="text" name="qlink[<?php echo (int) $i; ?>][label]" value="<?php echo esc_attr($r['label']); ?>" placeholder="Label">
                        <input type="text" name="qlink[<?php echo (int) $i; ?>][url]"   value="<?php echo esc_attr($r['url']);   ?>" placeholder="/your-page/ or full URL">
                        <input type="text" name="qlink[<?php echo (int) $i; ?>][icon]"  value="<?php echo esc_attr($r['icon']);  ?>" placeholder="robot / box / bullseye">
                        <select name="qlink[<?php echo (int) $i; ?>][target]">
                            <option value="_self"  <?php selected($r['target'], '_self');  ?>>Same tab</option>
                            <option value="_blank" <?php selected($r['target'], '_blank'); ?>>New tab</option>
                        </select>
                        <button type="button" class="rm" onclick="this.closest('.epm-qrow').remove()">✕</button>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="epm-add" onclick="eePmAdd()">+ Add row</button>
                <p class="hint" style="color:#646970;font-size:12px;margin-top:8px;font-style:italic;">Icon name = filename from <code>/wp-content/uploads/icons/</code>. Try <code>robot</code> · <code>box</code> · <code>bullseye</code> · <code>film</code> · <code>rocket</code> · <code>chart-bar</code> · <code>link</code>.</p>
            </div>

            <?php submit_button('💾 Save Products Menu', 'primary large'); ?>
        </form>
        <script>
        function eePmAdd() {
            var list = document.getElementById('epm-qlist');
            var idx  = list.children.length;
            var row  = document.createElement('div');
            row.className = 'epm-qrow';
            row.innerHTML =
                '<input type="text" name="qlink['+idx+'][label]" placeholder="Label">' +
                '<input type="text" name="qlink['+idx+'][url]"   placeholder="/your-page/ or full URL">' +
                '<input type="text" name="qlink['+idx+'][icon]"  placeholder="robot / box / bullseye" value="star">' +
                '<select name="qlink['+idx+'][target]"><option value="_self">Same tab</option><option value="_blank">New tab</option></select>' +
                '<button type="button" class="rm">✕</button>';
            list.appendChild(row);
        }
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList && e.target.classList.contains('rm') && e.target.closest('.epm-qrow')) {
                e.target.closest('.epm-qrow').remove();
            }
        });
        </script>
    </div>
    <?php
}

// G4. USE-CASE MENU HELPER — shared by header.php + /use-cases/ page
// ══════════════════════════════════════════════════════════

// ══════════════════════════════════════════════════════════
// H. SAVE META BOX DATA
// ══════════════════════════════════════════════════════════
function product_save_meta_box_data($post_id) {
    // Standard guards
    if (!isset($_POST['product_meta_box_nonce']) || !wp_verify_nonce($_POST['product_meta_box_nonce'], 'product_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (!in_array(get_post_type($post_id), array('product', 'industry', 'use_case'), true)) return;

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
    /* Per-post logos repeater and use-global toggle were removed in favor of
       reading from the Home Page Editor option. Existing _logos / _logos_use_global
       meta is left untouched on each post so nothing is destroyed; it just isn't
       read anywhere. */

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

/* AUTO-FLUSH on CPT changes — no need for the editor to ever click
   Settings → Permalinks → Save. Bump EE_CPT_VERSION whenever a CPT is
   added, removed, or its rewrite slug changes. When the version stored
   in wp_options differs from this constant the rules are flushed on
   the next page load, then the new version is saved.

   This kills the most common "404 on a new CPT URL" foot-gun. */
define('EE_CPT_VERSION', '2024-05-19-use_case');
add_action('init', function () {
    if (get_option('ee_cpt_version') !== EE_CPT_VERSION) {
        flush_rewrite_rules(false);
        update_option('ee_cpt_version', EE_CPT_VERSION);
    }
}, 999);

// ══════════════════════════════════════════════════════════════════════════
//  ╔════════════════════════════════════════════════════════════════════╗
//  ║   BLOG LEAD FORM (Subscribe sidebar form on /blog/ + categories)   ║
//  ║   Admin: 📥 Blog Form                                              ║
//  ║                                                                    ║
//  ║   Non-coder can edit the heading, button text, field labels,       ║
//  ║   turn fields on/off, set who receives the emails, and customise   ║
//  ║   the success message — no template edits required.                ║
//  ║   Stored under 'ee_blog_form_settings'.                            ║
//  ╚════════════════════════════════════════════════════════════════════╝
// ══════════════════════════════════════════════════════════════════════════

function ee_get_blog_form() {
    $defaults = array(
        'embed_code'      => '',
        'heading'         => 'Get weekly admissions insights — straight to your inbox',
        'button_text'     => 'Subscribe',
        'success_msg'     => "Thanks! We've added you to the list.",
        'recipient_email' => get_option('admin_email'),
        'subject'         => 'New blog signup from ExtraaEdge',
        'fields'          => array(
            'first_name' => array('label' => 'First Name',                   'type' => 'text',     'required' => '1', 'enabled' => '1'),
            'last_name'  => array('label' => 'Last Name',                    'type' => 'text',     'required' => '1', 'enabled' => '1'),
            'email'      => array('label' => 'Business Email',               'type' => 'email',    'required' => '1', 'enabled' => '1'),
            'phone'      => array('label' => 'Phone (with country code)',    'type' => 'tel',      'required' => '1', 'enabled' => '1'),
            'message'    => array('label' => 'Topics you want to read about','type' => 'textarea', 'required' => '1', 'enabled' => '1'),
        ),
    );
    $saved = get_option('ee_blog_form_settings', array());
    if (!is_array($saved)) $saved = array();
    $merged = array_merge($defaults, $saved);
    /* Field-level merge so a partial save (e.g. only first_name changed)
       doesn't wipe out the other defaults. */
    $merged['fields'] = isset($saved['fields']) && is_array($saved['fields']) ? $saved['fields'] : array();
    foreach ($defaults['fields'] as $key => $def) {
        if (!isset($merged['fields'][$key])) {
            $merged['fields'][$key] = $def;
        } else {
            $merged['fields'][$key] = array_merge($def, $merged['fields'][$key]);
        }
    }
    return $merged;
}

function ee_render_blog_form() {
    $f      = ee_get_blog_form();
    $fields = $f['fields'];
    $nonce  = wp_create_nonce('ee_blog_form_submit');

    /* If the admin pasted an embed code (e.g. ExtraaEdge form widget,
       HubSpot, Marketo), render that raw and skip the built-in form
       entirely. We intentionally don't sanitise here because the value
       is set by an admin (manage_options) who is trusted to paste
       <script> tags from approved vendors. */
    if (!empty($f['embed_code'])) {
        echo '<div class="ee-blog-lead ee-blog-embed">' . $f['embed_code'] . '</div>';
        return;
    }
    ?>
    <div class="ee-blog-lead">
        <h2><?php echo esc_html($f['heading']); ?></h2>
        <form class="ee-blog-form" method="post" novalidate>
            <input type="hidden" name="ee_blog_form_nonce" value="<?php echo esc_attr($nonce); ?>">
            <input type="hidden" name="ee_blog_form_source" value="<?php echo esc_url(home_url(add_query_arg(null, null))); ?>">

            <?php foreach ($fields as $key => $fld) :
                if (empty($fld['enabled'])) continue;
                $label = $fld['label'] . ($fld['required'] === '1' ? ' *' : '');
                $req   = $fld['required'] === '1' ? 'required' : '';
                $type  = $fld['type'];
                $name  = 'ee_bf_' . $key;
            ?>
                <?php if ($type === 'textarea') : ?>
                    <textarea name="<?php echo esc_attr($name); ?>" placeholder="<?php echo esc_attr($label); ?>" <?php echo $req; ?>></textarea>
                <?php else : ?>
                    <input type="<?php echo esc_attr($type); ?>" name="<?php echo esc_attr($name); ?>" placeholder="<?php echo esc_attr($label); ?>" <?php echo $req; ?>>
                <?php endif; ?>
            <?php endforeach; ?>

            <button type="submit"><?php echo esc_html($f['button_text']); ?> <i class="fa fa-paper-plane"></i></button>
            <div class="ee-blog-form-msg" role="status" aria-live="polite" style="display:none;margin-top:10px;font-size:13px;"></div>
        </form>
    </div>
    <script>
    (function(){
        var forms = document.querySelectorAll('.ee-blog-form');
        forms.forEach(function(form){
            form.addEventListener('submit', function(e){
                e.preventDefault();
                var btn = form.querySelector('button[type=submit]');
                var msg = form.querySelector('.ee-blog-form-msg');
                btn.disabled = true;
                btn.dataset.orig = btn.dataset.orig || btn.innerHTML;
                btn.innerHTML = 'Sending…';
                msg.style.display = 'none';

                var fd = new FormData(form);
                fd.append('action', 'ee_blog_form_submit');

                fetch('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', { method:'POST', body:fd, credentials:'same-origin' })
                    .then(function(r){ return r.json(); })
                    .then(function(j){
                        if (j && j.success) {
                            form.reset();
                            msg.style.color = '#16a34a';
                            msg.textContent = j.data && j.data.message ? j.data.message : '<?php echo esc_js($f['success_msg']); ?>';
                            btn.innerHTML = 'Sent ✓';
                        } else {
                            msg.style.color = '#dc2626';
                            msg.textContent = (j && j.data && j.data.message) ? j.data.message : 'Something went wrong. Please try again.';
                            btn.disabled = false;
                            btn.innerHTML = btn.dataset.orig;
                        }
                        msg.style.display = 'block';
                    })
                    .catch(function(){
                        msg.style.color = '#dc2626';
                        msg.textContent = 'Network error. Please try again.';
                        msg.style.display = 'block';
                        btn.disabled = false;
                        btn.innerHTML = btn.dataset.orig;
                    });
            });
        });
    })();
    </script>
    <?php
}

/* AJAX endpoint — logged-in + logged-out. Validates nonce, sanitises
   every field, builds an email to the recipient, and stores the lead
   under 'ee_blog_form_leads' (last 200) for in-admin viewing. */
add_action('wp_ajax_ee_blog_form_submit',        'ee_blog_form_submit');
add_action('wp_ajax_nopriv_ee_blog_form_submit', 'ee_blog_form_submit');
function ee_blog_form_submit() {
    if (!isset($_POST['ee_blog_form_nonce']) || !wp_verify_nonce($_POST['ee_blog_form_nonce'], 'ee_blog_form_submit')) {
        wp_send_json_error(array('message' => 'Security check failed. Please refresh the page and try again.'), 403);
    }
    $f      = ee_get_blog_form();
    $fields = $f['fields'];
    $data   = array();
    foreach ($fields as $key => $fld) {
        if (empty($fld['enabled'])) continue;
        $raw   = isset($_POST['ee_bf_' . $key]) ? wp_unslash($_POST['ee_bf_' . $key]) : '';
        $clean = $fld['type'] === 'textarea' ? sanitize_textarea_field($raw) :
                ($fld['type'] === 'email'   ? sanitize_email($raw) :
                 sanitize_text_field($raw));
        if ($fld['required'] === '1' && $clean === '') {
            wp_send_json_error(array('message' => 'Please fill in: ' . $fld['label']), 422);
        }
        if ($fld['type'] === 'email' && $clean !== '' && !is_email($clean)) {
            wp_send_json_error(array('message' => 'Please enter a valid email address.'), 422);
        }
        $data[$key] = array('label' => $fld['label'], 'value' => $clean);
    }

    $body  = "New blog form submission\n\n";
    $body .= "Source: " . (isset($_POST['ee_blog_form_source']) ? esc_url_raw(wp_unslash($_POST['ee_blog_form_source'])) : '') . "\n";
    $body .= "Time:   " . current_time('mysql') . "\n";
    $body .= "IP:     " . ($_SERVER['REMOTE_ADDR'] ?? '') . "\n\n";
    foreach ($data as $key => $row) {
        $body .= $row['label'] . ":\n" . $row['value'] . "\n\n";
    }

    $to      = is_email($f['recipient_email']) ? $f['recipient_email'] : get_option('admin_email');
    $subject = $f['subject'] ?: 'New blog signup from ExtraaEdge';
    $reply   = isset($data['email']['value']) && is_email($data['email']['value']) ? $data['email']['value'] : '';
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    if ($reply) $headers[] = 'Reply-To: ' . $reply;

    wp_mail($to, $subject, $body, $headers);

    /* Store the last 200 leads in wp_options for an admin glance. */
    $leads   = get_option('ee_blog_form_leads', array());
    if (!is_array($leads)) $leads = array();
    array_unshift($leads, array(
        'time'   => current_time('mysql'),
        'source' => isset($_POST['ee_blog_form_source']) ? esc_url_raw(wp_unslash($_POST['ee_blog_form_source'])) : '',
        'data'   => $data,
    ));
    $leads = array_slice($leads, 0, 200);
    update_option('ee_blog_form_leads', $leads, false);

    wp_send_json_success(array('message' => $f['success_msg']));
}

/* Admin menu */
add_action('admin_menu', function () {
    add_menu_page(
        'Blog Form', '📥 Blog Form', 'manage_options',
        'ee-blog-form', 'ee_blog_form_render_admin',
        'dashicons-email-alt', 63
    );
});
add_action('admin_post_ee_save_blog_form', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_blog_form_save');

    /* Embed code is saved raw — manage_options users are trusted to
       paste vendor <script>/<iframe> tags. wp_unslash to strip the
       backslashes WP adds to POST data, then trim. */
    $clean = array(
        'embed_code'      => trim(wp_unslash($_POST['embed_code']                     ?? '')),
        'heading'         => sanitize_text_field(wp_unslash($_POST['heading']         ?? '')),
        'button_text'     => sanitize_text_field(wp_unslash($_POST['button_text']     ?? 'Subscribe')),
        'success_msg'     => sanitize_text_field(wp_unslash($_POST['success_msg']     ?? '')),
        'recipient_email' => sanitize_email(wp_unslash($_POST['recipient_email']      ?? '')),
        'subject'         => sanitize_text_field(wp_unslash($_POST['subject']         ?? '')),
        'fields'          => array(),
    );
    $field_keys = array('first_name', 'last_name', 'email', 'phone', 'message');
    $types_map  = array('first_name' => 'text', 'last_name' => 'text', 'email' => 'email', 'phone' => 'tel', 'message' => 'textarea');
    $rows = isset($_POST['fields']) && is_array($_POST['fields']) ? $_POST['fields'] : array();
    foreach ($field_keys as $key) {
        $r = isset($rows[$key]) && is_array($rows[$key]) ? $rows[$key] : array();
        $clean['fields'][$key] = array(
            'label'    => sanitize_text_field(wp_unslash($r['label'] ?? '')),
            'type'     => $types_map[$key],
            'required' => !empty($r['required']) ? '1' : '0',
            'enabled'  => !empty($r['enabled'])  ? '1' : '0',
        );
    }
    update_option('ee_blog_form_settings', $clean);

    wp_cache_delete('ee_blog_form_settings', 'options');
    if (function_exists('rocket_clean_domain')) { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))  { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))       { do_action('litespeed_purge_all'); }

    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-blog-form')));
    exit;
});

function ee_blog_form_render_admin() {
    $f      = ee_get_blog_form();
    $fields = $f['fields'];
    $leads  = get_option('ee_blog_form_leads', array());
    if (!is_array($leads)) $leads = array();
    ?>
    <div class="wrap">
        <h1>📥 Blog Form <span style="font-size:13px;color:#646970;font-weight:400;">— Subscribe form on /blog/ and category pages</span></h1>
        <?php if (!empty($_GET['updated'])) : ?>
            <div class="notice notice-success is-dismissible"><p><strong>Saved.</strong> The blog form has been updated.</p></div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="max-width:1000px;">
            <input type="hidden" name="action" value="ee_save_blog_form">
            <?php wp_nonce_field('ee_blog_form_save'); ?>

            <style>
                .ebf-card { background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:18px 20px; margin-bottom:20px; }
                .ebf-card h2 { margin:0 0 14px; font-size:15px; color:#19335D; display:flex; align-items:center; gap:8px; }
                .ebf-row { margin-bottom:14px; }
                .ebf-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
                .ebf-row input[type=text], .ebf-row input[type=email], .ebf-row textarea { width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; box-sizing:border-box; }
                .ebf-row .hint { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
                .ebf-grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
                .ebf-field-row { display:grid; grid-template-columns:1.6fr 70px 90px; gap:10px; padding:10px; background:#f8fafc; border-radius:5px; margin-bottom:8px; align-items:center; }
                .ebf-field-row input[type=text] { padding:6px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; box-sizing:border-box; width:100%; }
                .ebf-field-row .ebf-toggle { display:flex; align-items:center; justify-content:center; gap:5px; font-size:12px; color:#475569; }
                .ebf-fhead { display:grid; grid-template-columns:1.6fr 70px 90px; gap:10px; padding:0 10px; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.5px; margin-bottom:4px; }
                .ebf-leads { width:100%; border-collapse:collapse; font-size:12px; }
                .ebf-leads th { background:#f1f5f9; padding:8px 10px; text-align:left; border-bottom:1px solid #e2e8f0; }
                .ebf-leads td { padding:8px 10px; border-bottom:1px solid #f1f5f9; vertical-align:top; }
                .ebf-leads td.ebf-data { font-family:ui-monospace,Menlo,monospace; font-size:11px; color:#334155; white-space:pre-wrap; }
            </style>

            <!-- ── Custom embed code (overrides everything below) ── -->
            <div class="ebf-card" style="background:#fff8f1;border-color:#fde7d3;">
                <h2>🔌 Custom form embed <em style="color:#646970;font-size:12px;font-weight:400;margin-left:6px;">— optional, overrides the built-in form below</em></h2>
                <div class="ebf-row">
                    <label>Embed code (HTML / JS)</label>
                    <textarea name="embed_code" rows="6" style="width:100%;padding:9px 11px;border:1px solid #cbd5e1;border-radius:4px;font-family:ui-monospace,Menlo,monospace;font-size:12px;box-sizing:border-box;" placeholder="<script async src=&quot;https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js&quot;></script>&#10;<div id=&quot;ee-form-7&quot;></div>"><?php echo esc_textarea($f['embed_code']); ?></textarea>
                    <p class="hint" style="margin-top:8px;">Paste the full embed snippet from your form vendor (ExtraaEdge form widget, HubSpot, Marketo, Calendly, etc.). When this field has content, the entire built-in form below is replaced by this embed on the blog sidebar.<br><strong>Leave this blank to use the built-in form instead.</strong></p>
                </div>
            </div>

            <!-- ── Top copy ── -->
            <div class="ebf-card">
                <h2>✍️ Form headings + copy <em style="color:#646970;font-size:12px;font-weight:400;margin-left:6px;">— ignored when an embed code is set above</em></h2>
                <div class="ebf-row">
                    <label>Heading <span style="color:#dc2626;">*</span></label>
                    <input type="text" name="heading" value="<?php echo esc_attr($f['heading']); ?>" placeholder="Get weekly admissions insights — straight to your inbox">
                    <p class="hint">The bold heading shown above the form in the sidebar.</p>
                </div>
                <div class="ebf-grid-2">
                    <div class="ebf-row">
                        <label>Button text</label>
                        <input type="text" name="button_text" value="<?php echo esc_attr($f['button_text']); ?>" placeholder="Subscribe">
                    </div>
                    <div class="ebf-row">
                        <label>Success message</label>
                        <input type="text" name="success_msg" value="<?php echo esc_attr($f['success_msg']); ?>" placeholder="Thanks! We've added you to the list.">
                        <p class="hint">Shown to the visitor after a successful submit.</p>
                    </div>
                </div>
            </div>

            <!-- ── Where the leads go ── -->
            <div class="ebf-card">
                <h2>📨 Where submissions go</h2>
                <div class="ebf-grid-2">
                    <div class="ebf-row">
                        <label>Recipient email <span style="color:#dc2626;">*</span></label>
                        <input type="email" name="recipient_email" value="<?php echo esc_attr($f['recipient_email']); ?>" placeholder="hello@extraaedge.com">
                        <p class="hint">Every submission lands in this inbox.</p>
                    </div>
                    <div class="ebf-row">
                        <label>Email subject</label>
                        <input type="text" name="subject" value="<?php echo esc_attr($f['subject']); ?>" placeholder="New blog signup from ExtraaEdge">
                    </div>
                </div>
            </div>

            <!-- ── Field controls ── -->
            <div class="ebf-card">
                <h2>📝 Fields shown in the form</h2>
                <p style="color:#475569;font-size:13px;margin:0 0 14px;">Edit each field's <strong>label</strong> (also shown as the placeholder), tick <strong>Required</strong> to force a value, untick <strong>Shown</strong> to hide a field from the form without losing the settings.</p>

                <div class="ebf-fhead"><div>Label / placeholder</div><div>Required</div><div>Shown</div></div>
                <?php foreach ($fields as $key => $fld) : ?>
                <div class="ebf-field-row">
                    <input type="text" name="fields[<?php echo esc_attr($key); ?>][label]" value="<?php echo esc_attr($fld['label']); ?>">
                    <label class="ebf-toggle">
                        <input type="hidden" name="fields[<?php echo esc_attr($key); ?>][required]" value="0">
                        <input type="checkbox" name="fields[<?php echo esc_attr($key); ?>][required]" value="1" <?php checked($fld['required'], '1'); ?>>
                    </label>
                    <label class="ebf-toggle">
                        <input type="hidden" name="fields[<?php echo esc_attr($key); ?>][enabled]" value="0">
                        <input type="checkbox" name="fields[<?php echo esc_attr($key); ?>][enabled]" value="1" <?php checked($fld['enabled'], '1'); ?>>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>

            <p style="margin-top:18px;"><button type="submit" class="button button-primary button-large">Save changes</button></p>
        </form>

        <!-- ── Recent leads ── -->
        <div class="ebf-card" style="max-width:1000px;">
            <h2>📥 Recent submissions <span style="color:#646970;font-size:12px;font-weight:400;margin-left:6px;">— last <?php echo (int) count($leads); ?> stored on this site (max 200)</span></h2>
            <?php if (empty($leads)) : ?>
                <p style="color:#646970;font-style:italic;margin:0;">No submissions yet. Once a visitor fills the form on /blog/, it'll show up here.</p>
            <?php else : ?>
                <table class="ebf-leads">
                    <thead><tr><th style="width:140px;">When</th><th>Submission</th><th style="width:160px;">Source URL</th></tr></thead>
                    <tbody>
                    <?php foreach (array_slice($leads, 0, 25) as $lead) :
                        $lines = array();
                        foreach ($lead['data'] as $row) {
                            $lines[] = $row['label'] . ': ' . $row['value'];
                        }
                    ?>
                    <tr>
                        <td><?php echo esc_html($lead['time']); ?></td>
                        <td class="ebf-data"><?php echo esc_html(implode("\n", $lines)); ?></td>
                        <td><a href="<?php echo esc_url($lead['source']); ?>" target="_blank" rel="noopener" style="word-break:break-all;font-size:11px;"><?php echo esc_html($lead['source']); ?></a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

// ══════════════════════════════════════════════════════════════════════════
//  ╔════════════════════════════════════════════════════════════════════╗
//  ║   BLOG QUICK NAVIGATION (floating dashboard on single posts)       ║
//  ║   Admin: 🧭 Blog Quick Nav                                          ║
//  ║                                                                    ║
//  ║   The floating right-edge dashboard shown on single blog posts     ║
//  ║   (revealed once the visitor reaches the FAQ section). Editors     ║
//  ║   manage label, URL, Tabler icon, and colour-tile preset per row   ║
//  ║   without touching code.                                           ║
//  ╚════════════════════════════════════════════════════════════════════╝
// ══════════════════════════════════════════════════════════════════════════

function ee_get_quick_nav_items() {
    $saved = get_option('ee_quick_nav_items', null);
    if (is_array($saved) && !empty($saved)) {
        /* Strip any blank rows the editor saved by accident. */
        $clean = array();
        foreach ($saved as $row) {
            if (!empty($row['label']) && !empty($row['url'])) $clean[] = $row;
        }
        if (!empty($clean)) return $clean;
    }
    return array(
        array('label' => 'Home',         'url' => home_url('/'),              'icon' => 'ti-home',     'color' => 'navy'),
        array('label' => 'Products',     'url' => home_url('/products/'),     'icon' => 'ti-package',  'color' => 'orange'),
        array('label' => 'Industries',   'url' => home_url('/industries/'),   'icon' => 'ti-building', 'color' => 'green'),
        array('label' => 'Solutions',    'url' => home_url('/solutions/'),    'icon' => 'ti-bulb',     'color' => 'amber'),
        array('label' => 'Testimonials', 'url' => home_url('/case-studies/'), 'icon' => 'ti-quote',    'color' => 'violet'),
        array('label' => 'Resources',    'url' => home_url('/resources/'),    'icon' => 'ti-book',     'color' => 'blue'),
        array('label' => 'Contact',      'url' => home_url('/contact-us/'),   'icon' => 'ti-mail',     'color' => 'magenta'),
    );
}

/**
 * Inline-SVG icon library for the Quick Nav dashboard.
 * Maps Tabler icon names (e.g. "ti-home") to the inner SVG markup
 * so the dashboard renders without relying on the Tabler webfont
 * (which some host CSS resets break). Pre-bundled icons cover the
 * 30 most-used names; unknown names fall back to a generic circle.
 */
function ee_quick_nav_svg_paths() {
    return array(
        'ti-home'            => '<path d="M5 12H3l9-9 9 9h-2"/><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"/><path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"/>',
        'ti-package'         => '<path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"/><path d="M12 12l8-4.5"/><path d="M12 12v9"/><path d="M12 12L4 7.5"/>',
        'ti-building'        => '<path d="M3 21h18"/><path d="M5 21V5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v16"/><path d="M19 21V11a2 2 0 0 0-2-2h-3"/><path d="M9 9h1"/><path d="M9 13h1"/><path d="M9 17h1"/>',
        'ti-bulb'            => '<path d="M3 12h1m8-9v1m8 8h1m-15.4-6.4l.7.7m12.1-.7l-.7.7"/><path d="M9 16a5 5 0 1 1 6 0 3.5 3.5 0 0 0-1 3 2 2 0 0 1-4 0 3.5 3.5 0 0 0-1-3"/><path d="M9.7 17h4.6"/>',
        'ti-quote'           => '<path d="M10 11H6a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v6c0 2.667-1.333 4.333-4 5"/><path d="M19 11h-4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v6c0 2.667-1.333 4.333-4 5"/>',
        'ti-book'            => '<path d="M3 19a9 9 0 0 1 9 0 9 9 0 0 1 9 0"/><path d="M3 6a9 9 0 0 1 9 0 9 9 0 0 1 9 0"/><path d="M3 6v13"/><path d="M12 6v13"/><path d="M21 6v13"/>',
        'ti-mail'            => '<path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/><path d="M3 7l9 6 9-6"/>',
        'ti-phone'           => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/>',
        'ti-message-2'       => '<path d="M12 3c5.5 0 10 3.58 10 8s-4.5 8-10 8a13.6 13.6 0 0 1-3-.33l-3.5 1.83 1-3.34c-3-1.48-4.5-3.6-4.5-6.16 0-4.42 4.5-8 10-8z"/>',
        'ti-message-circle'  => '<path d="M3 20l1.3-3.9a9 8 0 1 1 3.4 2.9z"/>',
        'ti-calendar'        => '<path d="M4 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7z"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/>',
        'ti-users'           => '<circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path d="M21 21v-2a4 4 0 0 0-3-3.85"/>',
        'ti-school'          => '<path d="M22 9l-10-4-10 4 10 4 10-4v6"/><path d="M6 10.6V16a6 3 0 0 0 12 0v-5.4"/>',
        'ti-rocket'          => '<path d="M4 13a8 8 0 0 1 7 7 6 6 0 0 0 3-5 9 9 0 0 0 6-8 3 3 0 0 0-3-3 9 9 0 0 0-8 6 6 6 0 0 0-5 3"/><path d="M7 14a6 6 0 0 0-3 6 6 6 0 0 0 6-3"/><circle cx="15" cy="9" r="1"/>',
        'ti-trending-up'     => '<path d="M3 17l6-6 4 4 8-8"/><path d="M14 7h7v7"/>',
        'ti-chart-bar'       => '<rect x="3" y="12" width="6" height="8" rx="1"/><rect x="9" y="8" width="6" height="12" rx="1"/><rect x="15" y="4" width="6" height="16" rx="1"/>',
        'ti-globe'           => '<circle cx="12" cy="12" r="9"/><path d="M3.6 9h16.8"/><path d="M3.6 15h16.8"/><path d="M11.5 3a17 17 0 0 0 0 18"/><path d="M12.5 3a17 17 0 0 1 0 18"/>',
        'ti-shield'          => '<path d="M12 3a12 12 0 0 0 8.5 3 12 12 0 0 1-8.5 15 12 12 0 0 1-8.5-15A12 12 0 0 0 12 3"/>',
        'ti-flag'            => '<path d="M5 5a5 5 0 0 1 7 0 5 5 0 0 0 7 0v9a5 5 0 0 1-7 0 5 5 0 0 0-7 0V5z"/><path d="M5 21v-7"/>',
        'ti-target'          => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>',
        'ti-star'            => '<path d="M12 17.75l-6.17 3.25 1.18-6.87L2 9.27l6.9-1 3.1-6.27 3.09 6.27 6.9 1-4.99 4.86 1.18 6.87z"/>',
        'ti-heart'           => '<path d="M19.5 12.57l-7.5 7.43-7.5-7.43a5 5 0 1 1 7.5-6.57 5 5 0 1 1 7.5 6.57"/>',
        'ti-tag'             => '<path d="M11.17 5a2 2 0 0 0-1.41.59L3.17 12.17a2 2 0 0 0 0 2.83l6.41 6.41a2 2 0 0 0 2.83 0l6.58-6.58a2 2 0 0 0 .59-1.41V7a2 2 0 0 0-2-2h-6.42z"/><circle cx="7" cy="7" r=".5" fill="currentColor"/>',
        'ti-search'          => '<circle cx="10" cy="10" r="7"/><path d="M21 21l-6-6"/>',
        'ti-info-circle'     => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="9" r=".5" fill="currentColor"/><path d="M11 12h1v4h1"/>',
        'ti-settings'        => '<path d="M10.32 4.32a1.72 1.72 0 0 1 3.36 0 1.72 1.72 0 0 0 2.57 1.06 1.72 1.72 0 0 1 2.37 2.37 1.72 1.72 0 0 0 1.07 2.57 1.72 1.72 0 0 1 0 3.36 1.72 1.72 0 0 0-1.07 2.57 1.72 1.72 0 0 1-2.37 2.37 1.72 1.72 0 0 0-2.57 1.07 1.72 1.72 0 0 1-3.36 0 1.72 1.72 0 0 0-2.57-1.07 1.72 1.72 0 0 1-2.37-2.37 1.72 1.72 0 0 0-1.07-2.57 1.72 1.72 0 0 1 0-3.36 1.72 1.72 0 0 0 1.07-2.57 1.72 1.72 0 0 1 2.37-2.37 1.72 1.72 0 0 0 2.57-1.07z"/><circle cx="12" cy="12" r="3"/>',
        'ti-user'            => '<circle cx="12" cy="7" r="4"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>',
        'ti-briefcase'       => '<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M3 13a20 20 0 0 0 18 0"/>',
        'ti-news'            => '<path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1-4 0V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a3 3 0 0 0 3 3h12"/><path d="M8 8h4"/><path d="M8 12h4"/><path d="M8 16h4"/>',
        'ti-file-text'       => '<path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2z"/><path d="M9 13h6"/><path d="M9 17h6"/>',
        'ti-link'            => '<path d="M9 15l6-6"/><path d="M11 6l.46-.54a5 5 0 0 1 7.07 7.07l-.53.47"/><path d="M13 18l-.4.53a5.07 5.07 0 0 1-7.13 0 4.97 4.97 0 0 1 0-7.07l.52-.46"/>',
        'ti-compass'         => '<circle cx="12" cy="12" r="9"/><path d="M8 16l2-6 6-2-2 6-6 2"/>',
        'ti-brand-whatsapp'  => '<path d="M3 21l1.65-3.8a9 9 0 1 1 3.4 2.9z"/><path d="M9 10c0 .55.45 1 1 1s1-.45 1-1V9c0-.55-.45-1-1-1s-1 .45-1 1c0 2.76 2.24 5 5 5 .55 0 1-.45 1-1s-.45-1-1-1"/>',
        'ti-brand-linkedin'  => '<rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 11v5"/><circle cx="8" cy="8" r=".5" fill="currentColor"/><path d="M12 16v-5"/><path d="M16 16v-3a2 2 0 0 0-4 0"/>',
        'ti-brand-facebook'  => '<path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 0 1 1-1h3V3h-3a5 5 0 0 0-5 5v2H7z"/>',
        'ti-brand-twitter'   => '<path d="M4 4l11.73 16H20L8.27 4z"/><path d="M4 20l6.77-6.77M13.23 10.77L20 4"/>',
        'ti-brand-x'         => '<path d="M4 4l11.73 16H20L8.27 4z"/><path d="M4 20l6.77-6.77M13.23 10.77L20 4"/>',
        'ti-brand-instagram' => '<rect x="4" y="4" width="16" height="16" rx="4"/><circle cx="12" cy="12" r="3"/><circle cx="16.5" cy="7.5" r=".75" fill="currentColor" stroke="none"/>',
        'ti-brand-youtube'   => '<rect x="3" y="6" width="18" height="12" rx="3"/><path d="M10 9l5 3l-5 3z" fill="currentColor"/>',
        'ti-arrow-up'        => '<path d="M12 5v14"/><path d="M16 9l-4-4"/><path d="M8 9l4-4"/>',
        'ti-calendar-check'  => '<rect x="4" y="5" width="16" height="16" rx="2"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/><path d="M9 15l2 2l4-4"/>',
        'ti-chevron-down'    => '<path d="M6 9l6 6l6-6"/>',
        'ti-chevron-right'   => '<path d="M9 6l6 6l-6 6"/>',
        'ti-circle-check'    => '<circle cx="12" cy="12" r="9"/><path d="M9 12l2 2l4-4"/>',
        'ti-clock'           => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/>',
        'ti-flame'           => '<path d="M12 12c2-2.96 0-7-1-8c0 3.038-1.773 4.741-3 6c-1.226 1.26-2 3.24-2 5a5 5 0 0 0 10 0c0-1.532-1.056-3.94-2-5c-1.786 3-2.791 3-2 2z"/>',
        'ti-markdown'        => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15v-6l2 2l2-2v6"/><path d="M14 13l2 2l2-2"/><path d="M16 9v6"/>',
        'ti-phone-call'      => '<path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/><path d="M15 7a2 2 0 0 1 2 2"/><path d="M15 3a6 6 0 0 1 6 6"/>',
        'ti-presentation'    => '<path d="M3 4h18"/><path d="M4 4v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-10"/><path d="M12 16v4"/><path d="M9 20h6"/>',
        'ti-printer'         => '<path d="M17 17h2a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h2"/><path d="M17 9V5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v4"/><rect x="7" y="13" width="10" height="8" rx="2"/>',
        'ti-send'            => '<path d="M10 14l11-11"/><path d="M21 3l-6.5 18a.55.55 0 0 1-1 0L10 14l-7-3.5a.55.55 0 0 1 0-1L21 3"/>',
        'ti-share-3'         => '<path d="M13 4v4c-6.5 1-9.5 5.5-11 10c4.5-4 6-4 11-4v4l8-7z"/>',
    );
}

function ee_quick_nav_render_icon($name, $size = '1em') {
    $paths = ee_quick_nav_svg_paths();
    $name  = trim((string) $name);
    if (strpos($name, 'ti-') !== 0) $name = 'ti-' . ltrim($name, '- ');
    $body  = isset($paths[$name]) ? $paths[$name] : '<circle cx="12" cy="12" r="9"/>';
    /* "1em" lets the icon size with the surrounding text. Numeric
       values fall back to "Npx". */
    $s = is_numeric($size) ? ((int) $size) . 'px' : (string) $size;
    return '<svg class="ee-qn-svg" viewBox="0 0 24 24" width="' . esc_attr($s) . '" height="' . esc_attr($s) . '" '
         . 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" '
         . 'aria-hidden="true" style="vertical-align:middle;flex-shrink:0;">' . $body . '</svg>';
}

/* Short alias used liberally in templates. */
if (!function_exists('ee_icon')) {
    function ee_icon($name, $size = '1em') { return ee_quick_nav_render_icon($name, $size); }
}

function ee_quick_nav_colors() {
    return array(
        'navy'    => array('bg' => '#EEF2F8', 'fg' => '#19335D', 'label' => 'Navy'),
        'orange'  => array('bg' => '#FFF3EC', 'fg' => '#DE6E30', 'label' => 'Orange'),
        'green'   => array('bg' => '#ECFDF5', 'fg' => '#0E9F6E', 'label' => 'Green'),
        'amber'   => array('bg' => '#FEF9C3', 'fg' => '#A16207', 'label' => 'Amber'),
        'violet'  => array('bg' => '#EDE9FE', 'fg' => '#7C3AED', 'label' => 'Violet'),
        'blue'    => array('bg' => '#DBEAFE', 'fg' => '#1D4ED8', 'label' => 'Blue'),
        'magenta' => array('bg' => '#FCE7F3', 'fg' => '#BE185D', 'label' => 'Magenta'),
        'red'     => array('bg' => '#FEE2E2', 'fg' => '#DC2626', 'label' => 'Red'),
        'teal'    => array('bg' => '#CCFBF1', 'fg' => '#0F766E', 'label' => 'Teal'),
        'slate'   => array('bg' => '#F1F5F9', 'fg' => '#475569', 'label' => 'Slate'),
    );
}

add_action('admin_menu', function () {
    add_menu_page(
        'Blog Quick Nav', '🧭 Blog Quick Nav', 'manage_options',
        'ee-quick-nav', 'ee_quick_nav_render_admin',
        'dashicons-screenoptions', 64
    );
});

add_action('admin_post_ee_save_quick_nav', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_quick_nav_save');

    $rows  = isset($_POST['nav']) && is_array($_POST['nav']) ? $_POST['nav'] : array();
    $colors = ee_quick_nav_colors();
    $clean = array();
    foreach ($rows as $r) {
        $label = isset($r['label']) ? sanitize_text_field(wp_unslash($r['label'])) : '';
        $url   = isset($r['url'])   ? esc_url_raw(wp_unslash($r['url']))           : '';
        if ($label === '' || $url === '') continue;
        $icon  = isset($r['icon'])  ? sanitize_text_field(wp_unslash($r['icon']))  : 'ti-circle';
        if (strpos($icon, 'ti-') !== 0) $icon = 'ti-' . ltrim($icon, '- ');
        $color = isset($r['color']) ? sanitize_text_field(wp_unslash($r['color'])) : 'navy';
        if (!isset($colors[$color])) $color = 'navy';
        $clean[] = array('label' => $label, 'url' => $url, 'icon' => $icon, 'color' => $color);
    }
    update_option('ee_quick_nav_items', $clean);

    wp_cache_delete('ee_quick_nav_items', 'options');
    if (function_exists('rocket_clean_domain')) { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))  { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))       { do_action('litespeed_purge_all'); }

    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-quick-nav')));
    exit;
});

function ee_quick_nav_render_admin() {
    $items  = ee_get_quick_nav_items();
    $colors = ee_quick_nav_colors();
    ?>
    <div class="wrap">
        <h1>🧭 Blog Quick Nav <span style="font-size:13px;color:#646970;font-weight:400;">— floating dashboard shown on single blog posts (revealed near the FAQ)</span></h1>
        <?php if (!empty($_GET['updated'])) : ?>
            <div class="notice notice-success is-dismissible"><p><strong>Saved.</strong> The Quick Nav dashboard has been updated.</p></div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="max-width:1080px;">
            <input type="hidden" name="action" value="ee_save_quick_nav">
            <?php wp_nonce_field('ee_quick_nav_save'); ?>

            <style>
                .eqn-card { background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:18px 20px; margin-bottom:20px; }
                .eqn-head { display:grid; grid-template-columns:1.2fr 2fr 1.2fr 1fr 28px; gap:10px; padding:0 10px; font-size:11px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px; }
                .eqn-row  { display:grid; grid-template-columns:1.2fr 2fr 1.2fr 1fr 28px; gap:10px; padding:10px; background:#f8fafc; border-radius:5px; margin-bottom:8px; align-items:center; }
                .eqn-row input, .eqn-row select { width:100%; padding:7px 9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; box-sizing:border-box; font-family:inherit; }
                .eqn-row .rm { background:transparent; border:1px solid #fecaca; color:#b91c1c; padding:5px 8px; border-radius:4px; cursor:pointer; font-size:12px; }
                .eqn-row .rm:hover { background:#fee2e2; }
                .eqn-add  { background:#19335D; color:#fff; border:none; padding:8px 16px; border-radius:5px; cursor:pointer; font-size:12.5px; font-weight:600; margin-top:6px; }
                .eqn-add:hover { background:#0F2040; }
                .eqn-preview { width:32px; height:32px; border-radius:8px; display:inline-flex; align-items:center; justify-content:center; font-size:16px; vertical-align:middle; margin-right:6px; }
            </style>

            <div class="eqn-card">
                <h2 style="margin:0 0 6px;font-size:15px;color:#19335D;">Dashboard tiles</h2>
                <p style="color:#475569;font-size:13px;margin:0 0 14px;">Each row becomes one tile on the floating dashboard. Drag-type-go: <strong>Label</strong> is the visible text under the icon, <strong>URL</strong> is where clicking the tile goes, <strong>Tabler icon</strong> is the icon name (browse at <a href="https://tabler.io/icons" target="_blank" rel="noopener">tabler.io/icons</a>, then prefix with <code>ti-</code>, e.g. <code>ti-home</code>), <strong>Color</strong> picks the tile's tint.</p>

                <div class="eqn-head">
                    <div>Label</div><div>URL</div><div>Tabler icon</div><div>Colour</div><div>&nbsp;</div>
                </div>

                <div id="eqn-rows">
                    <?php foreach ($items as $i => $it) : ?>
                    <div class="eqn-row">
                        <input type="text" name="nav[<?php echo (int) $i; ?>][label]" value="<?php echo esc_attr($it['label']); ?>" placeholder="Home">
                        <input type="url"  name="nav[<?php echo (int) $i; ?>][url]"   value="<?php echo esc_attr($it['url']); ?>"   placeholder="https://...">
                        <input type="text" name="nav[<?php echo (int) $i; ?>][icon]"  value="<?php echo esc_attr($it['icon']); ?>"  placeholder="ti-home">
                        <select name="nav[<?php echo (int) $i; ?>][color]">
                            <?php foreach ($colors as $key => $c) : ?>
                                <option value="<?php echo esc_attr($key); ?>" <?php selected($it['color'], $key); ?>><?php echo esc_html($c['label']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="rm" onclick="this.parentElement.remove();">✕</button>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="eqn-add" id="eqn-add-row">+ Add tile</button>
                <p style="color:#646970;font-size:12px;font-style:italic;margin-top:14px;">Leave both Label + URL blank on a row to remove that tile when you save.</p>
            </div>

            <p><button type="submit" class="button button-primary button-large">Save changes</button></p>
        </form>

        <script>
        (function(){
            var add = document.getElementById('eqn-add-row');
            if (!add) return;
            add.addEventListener('click', function(){
                var rows = document.getElementById('eqn-rows');
                var i = rows.children.length;
                var node = document.createElement('div');
                node.className = 'eqn-row';
                node.innerHTML =
                    '<input type="text" name="nav['+i+'][label]" placeholder="Label">'
                  + '<input type="url"  name="nav['+i+'][url]"   placeholder="https://...">'
                  + '<input type="text" name="nav['+i+'][icon]"  placeholder="ti-home">'
                  + '<select name="nav['+i+'][color]">'
                  +   '<?php foreach ($colors as $key => $c) : ?>'
                  +   '<option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($c['label']); ?></option>'
                  +   '<?php endforeach; ?>'
                  + '</select>'
                  + '<button type="button" class="rm" onclick="this.parentElement.remove();">✕</button>';
                rows.appendChild(node);
            });
        })();
        </script>
    </div>
    <?php
}

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

/* Bust page caches whenever the tracking settings change so the new
   GTM / GA4 / Pixel / custom code reaches the public pages immediately
   even when a cache plugin or CDN is in front of WordPress. */
add_action('update_option_ee_tracking_settings', function () {
    wp_cache_delete('ee_tracking_settings', 'options');
    wp_cache_delete('alloptions', 'options');
    if (function_exists('rocket_clean_domain'))   { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))    { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))         { do_action('litespeed_purge_all'); }
    if (function_exists('wp_cache_clean_cache'))  { @wp_cache_clean_cache($GLOBALS['cache_path'] ?? ''); }
    do_action('ee_tracking_updated');
}, 10, 0);
add_action('add_option_ee_tracking_settings', function () {
    do_action('update_option_ee_tracking_settings');
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

        <?php
        /* Live verification banner — shows what's saved + how to confirm on the live site.
           Helps the non-coder verify that codes are reaching the front-end, and gives
           concrete next steps when the live site still shows the old HTML (cache). */
        $detected = [];
        foreach ([
            'gtm_id'          => ['label' => 'Google Tag Manager', 'find' => 'GTM-'],
            'ga4_id'          => ['label' => 'GA4',                'find' => 'G-'],
            'clarity_id'      => ['label' => 'Microsoft Clarity',  'find' => 'clarity.ms'],
            'fb_pixel_id'     => ['label' => 'Meta Pixel',         'find' => 'fbq'],
            'ads_id'          => ['label' => 'Google Ads',         'find' => 'AW-'],
            'linkedin_id'     => ['label' => 'LinkedIn Insight',   'find' => '_linkedin_partner_id'],
            'hotjar_id'       => ['label' => 'Hotjar',             'find' => 'hotjar-'],
            'tiktok_pixel_id' => ['label' => 'TikTok Pixel',       'find' => 'TiktokAnalyticsObject'],
            'pinterest_tag_id'=> ['label' => 'Pinterest Tag',      'find' => 'pintrk'],
        ] as $k => $meta) {
            $val = trim((string) $f($k));
            if ($val !== '') $detected[$k] = ['label' => $meta['label'], 'value' => $val, 'find' => $meta['find']];
        }
        $custom_filled = [];
        foreach (['custom_head' => 'Custom &lt;head&gt;', 'custom_body_open' => 'Custom &lt;body&gt;', 'custom_footer' => 'Custom &lt;/body&gt;'] as $k => $lbl) {
            if (trim((string) $f($k)) !== '') $custom_filled[$lbl] = strlen($f($k));
        }
        $home_url             = home_url('/');
        $first_detected_find  = !empty($detected) ? reset($detected)['find'] : 'GTM-';
        ?>
        <div style="background:#fff;border:1px solid #e2e8f0;border-left:4px solid <?php echo (empty($detected) && empty($custom_filled)) ? '#dc2626' : '#10b981'; ?>;padding:14px 18px;border-radius:6px;margin:14px 0;">
            <strong style="font-size:14px;">
                <?php if (!empty($detected) || !empty($custom_filled)) : ?>
                    ✅ Tracking is active —
                    <?php
                    $parts = [];
                    foreach ($detected as $d) $parts[] = $d['label'] . ' (<code>' . esc_html($d['value']) . '</code>)';
                    foreach ($custom_filled as $lbl => $len) $parts[] = $lbl . ' (' . (int) $len . ' chars)';
                    echo wp_kses_post(implode(' · ', $parts));
                    ?>
                <?php else : ?>
                    ⚠️ No tracking codes saved yet. Paste your IDs below and click <em>Save Changes</em>.
                <?php endif; ?>
            </strong>
            <?php if (!empty($detected) || !empty($custom_filled)) : ?>
                <p style="margin:8px 0 0;color:#475569;line-height:1.6;font-size:13px;">
                    <strong>To verify on the live site:</strong>
                    Open <a href="<?php echo esc_url($home_url); ?>" target="_blank"><code><?php echo esc_html($home_url); ?></code></a> in a new tab → right-click → <em>View Page Source</em> → press <kbd>Ctrl+F</kbd> and search for <code><?php echo esc_html($first_detected_find); ?></code>.
                    If you do not see it, your <strong>page cache or CDN (Cloudflare, WP Rocket, LiteSpeed, W3TC)</strong> is serving an old copy — purge it once and refresh.
                </p>
            <?php endif; ?>
        </div>

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
        'blog'       => array('file' => 'page-blog.php',       'title' => 'Blog'),
        'blogs'      => array('file' => 'page-blog.php',       'title' => 'Blog'),
        'products'   => array('file' => 'page-products.php',   'title' => 'Products'),
        'use-cases'  => array('file' => 'page-use-cases.php',  'title' => 'Use Cases'),
        'industries' => array('file' => 'page-industries.php', 'title' => 'Industries'),
        'industry'   => array('file' => 'page-industry.php',   'title' => 'Industry'),
        'company'    => array('file' => 'page-company.php',    'title' => 'Company'),
    );

    /* Add a body class on any custom-routed landing page so the global
       CSS in header.php can tighten line-heights and remove the gap
       between the breadcrumb and the first section. */
    add_filter('body_class', function ($classes) {
        $classes[] = 'ee-custom-landing';
        return $classes;
    });

    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');

    /* Extended /blog/ routing — three URL shapes all route to page-blog.php:
         /blog/page/N/                       → paginated landing
         /blog/{slug}/                       → category filter
         /blog/{slug}/page/N/                → paginated category filter
       Slug is exposed via $_GET['bcat']; page number via WP's 'paged'
       query var. No per-category templates needed. */
    if (!isset($ee_custom_routes[$path])) {
        $parts = explode('/', $path);
        if (in_array($parts[0] ?? '', array('blog', 'blogs'), true) && !empty($parts[1])) {
            if ($parts[1] === 'page' && !empty($parts[2]) && ctype_digit($parts[2])) {
                /* /blog/page/N/ */
                set_query_var('paged', (int) $parts[2]);
                $ee_custom_routes[$path] = array('file' => 'page-blog.php', 'title' => 'Blog');
            } else {
                /* /blog/{slug}/  or  /blog/{slug}/page/N/ */
                $slug = sanitize_title($parts[1]);
                $cat  = $slug ? get_category_by_slug($slug) : null;
                if ($cat) {
                    $_GET['bcat'] = $slug;
                    if (isset($parts[2], $parts[3]) && $parts[2] === 'page' && ctype_digit($parts[3])) {
                        set_query_var('paged', (int) $parts[3]);
                    }
                    $ee_custom_routes[$path] = array('file' => 'page-blog.php', 'title' => $cat->name);
                }
            }
        }
    }

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
        $pid = get_the_ID();
        $seo_title = get_post_meta($pid, '_seo_title', true);
        if (!empty($seo_title)) {
            return $seo_title;
        }
        /* Guarantee non-empty <title> for crawlers — if the filter
           chain produced an empty string somewhere, fall back to the
           raw post title appended with the site name. */
        if (empty($title)) {
            $post_title = get_the_title($pid);
            if (!empty($post_title)) {
                return $post_title . ' | ' . get_bloginfo('name');
            }
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
