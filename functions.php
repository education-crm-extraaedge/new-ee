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
// A2. GLOBAL BRAND TOKENS — colours, font, heading sizes
// ══════════════════════════════════════════════════════════
/**
 * Single source of truth for the brand. Injected on every front-end
 * page at very high priority so it overrides plugin / template
 * inline styles without us having to chase down individual rules.
 *
 *   Colours      —  Orange #DE6E30  +  Blue #19335D  (white bg)
 *   Font         —  Inter
 *   Heading map  —  H1 40 · H2 32 · H3 24 · H4 20 · H5 18 · H6 16
 *
 * Also ships a "safe-hover" rule set that guarantees button text
 * stays legible when the cursor enters — fixes the cases where a
 * hover background swap was making the label disappear.
 */
add_action('wp_head', function () {
    if (is_admin()) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap">
    <style id="ee-brand-tokens">
    :root{
        /* ── Brand palette ───────────────────────────────────── */
        --ee-orange:      #DE6E30;
        --ee-orange-dark: #B85920;
        --ee-orange-soft: #FFF3EC;
        --ee-blue:        #19335D;
        --ee-blue-dark:   #0F2040;
        --ee-blue-soft:   #EEF2F8;
        --ee-white:       #FFFFFF;
        --ee-bg:          #FFFFFF;
        --ee-text:        #1F2937;
        --ee-text-soft:   #374151;
        --ee-muted:       #6B7280;
        --ee-border:      #E5E7EB;

        /* ── Heading scale (consistent site-wide) ─────────────── */
        --ee-h1: 40px;
        --ee-h2: 32px;
        --ee-h3: 24px;
        --ee-h4: 20px;
        --ee-h5: 18px;
        --ee-h6: 16px;
    }

    /* ── Base typography ─────────────────────────────────────── */
    html, body{
        font-family:'Inter','-apple-system','BlinkMacSystemFont','Segoe UI',Roboto,Helvetica,Arial,sans-serif !important;
        background:var(--ee-bg);
        color:var(--ee-text);
        -webkit-font-smoothing:antialiased;
    }
    body, p, li, td, th, input, textarea, select, button{
        font-family:'Inter','-apple-system','BlinkMacSystemFont','Segoe UI',Roboto,Helvetica,Arial,sans-serif;
    }

    /* ── Headings (site-wide defaults; specific templates can
         still tighten line-heights / margins as needed) ──────── */
    h1, .h1 { font-size:var(--ee-h1); font-weight:800; line-height:1.18; letter-spacing:-.02em; color:var(--ee-blue); }
    h2, .h2 { font-size:var(--ee-h2); font-weight:700; line-height:1.22; letter-spacing:-.015em; color:var(--ee-blue); }
    h3, .h3 { font-size:var(--ee-h3); font-weight:700; line-height:1.3;  letter-spacing:-.01em;  color:var(--ee-blue); }
    h4, .h4 { font-size:var(--ee-h4); font-weight:600; line-height:1.35; color:var(--ee-blue); }
    h5, .h5 { font-size:var(--ee-h5); font-weight:600; line-height:1.4;  color:var(--ee-blue); }
    h6, .h6 { font-size:var(--ee-h6); font-weight:600; line-height:1.4;  color:var(--ee-blue); }
    @media (max-width:820px){
        :root{
            --ee-h1:30px; --ee-h2:24px; --ee-h3:20px;
            --ee-h4:18px; --ee-h5:16px; --ee-h6:14px;
        }
    }

    /* ── Universal inline-SVG icon defaults ──
       Inherit colour & vertical-align so icons never look "off"
       inside flex buttons or chips. Size flows from font-size or
       the per-context override CSS in single.php. */
    svg.ee-qn-svg, button svg, a svg, .btn svg, .ee-btn svg, .ee-btn-primary svg, .ee-btn-outline svg {
        fill: none;
        stroke: currentColor;
        vertical-align: middle;
        flex-shrink: 0;
    }

    /* ── Premium button system ──
       Universal contract: any element with a brand button class
       gets a consistent height, padding, border-radius, font-
       weight, focus ring, and active lift. */
    .ee-btn,
    .ee-btn-primary,
    .ee-btn-outline,
    .ee-btn-ghost,
    .ee-cta-btn,
    .ee-stick-cta-btn,
    .ee-promo-btn,
    .ee-sub-btn,
    .ee-blog-explore,
    .ee-modal-form button,
    .ee-lm-form button,
    .ee-send-row button,
    .ee-action-btn,
    .ee-icon-btn,
    .ee-toc-actions button {
        font-family: 'Inter','-apple-system','BlinkMacSystemFont','Segoe UI',Roboto,sans-serif !important;
        font-weight: 700;
        letter-spacing: .01em;
        cursor: pointer;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        transition: transform .18s cubic-bezier(.4,0,.2,1),
                    background .2s ease,
                    color .2s ease,
                    box-shadow .2s ease,
                    border-color .2s ease;
        will-change: transform;
    }
    .ee-btn:active,
    .ee-btn-primary:active,
    .ee-btn-outline:active,
    .ee-cta-btn:active,
    .ee-stick-cta-btn:active,
    .ee-promo-btn:active,
    .ee-modal-form button:active,
    .ee-lm-form button:active { transform: translateY(1px) scale(.99); }

    /* ── Primary (white card, orange ink) ─────────────────────
       Per brand contract, every "filled" button now renders as a
       white card with orange text + a 2px orange border. Hover
       inverts to a soft-orange tint with slight lift. */
    .ee-btn-primary,
    .ee-cta-btn,
    .ee-stick-cta-btn,
    .ee-modal-form button,
    .ee-lm-form button,
    .ee-send-row button,
    .ee-sub-btn,
    .ee-blog-explore {
        background: #fff !important;
        color: var(--ee-orange) !important;
        border: 2px solid var(--ee-orange) !important;
        padding: 9px 22px;
        border-radius: 8px;
        font-size: 13.5px;
        box-shadow: 0 2px 8px rgba(222,110,48,.12);
    }
    .ee-btn-primary:hover, .ee-btn-primary:focus,
    .ee-cta-btn:hover, .ee-cta-btn:focus,
    .ee-stick-cta-btn:hover, .ee-stick-cta-btn:focus,
    .ee-modal-form button:hover, .ee-modal-form button:focus,
    .ee-lm-form button:hover, .ee-lm-form button:focus,
    .ee-send-row button:hover, .ee-send-row button:focus,
    .ee-sub-btn:hover, .ee-sub-btn:focus,
    .ee-blog-explore:hover, .ee-blog-explore:focus {
        background: var(--ee-orange-soft) !important;
        color: var(--ee-orange-dark) !important;
        border-color: var(--ee-orange-dark) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(222,110,48,.22);
    }
    .ee-btn-primary svg, .ee-cta-btn svg, .ee-stick-cta-btn svg,
    .ee-modal-form button svg, .ee-lm-form button svg,
    .ee-send-row button svg, .ee-sub-btn svg, .ee-blog-explore svg {
        color: var(--ee-orange);
    }

    /* ── Outline (white card, navy ink) — unchanged ──────────── */
    .ee-btn-outline {
        background: #fff !important;
        color: var(--ee-blue) !important;
        border: 2px solid var(--ee-blue) !important;
        padding: 9px 20px;
        border-radius: 8px;
        font-size: 13.5px;
    }
    .ee-btn-outline:hover, .ee-btn-outline:focus {
        background: var(--ee-blue-soft) !important;
        color: var(--ee-blue-dark) !important;
        border-color: var(--ee-blue-dark) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(25,51,93,.18);
    }

    /* ── Ghost / icon buttons — already white, polish only ───── */
    .ee-action-btn, .ee-icon-btn, .ee-toc-actions button {
        background: #fff !important;
        border: 1px solid var(--ee-border);
        color: var(--ee-blue);
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 11.5px;
        font-weight: 600;
    }
    .ee-action-btn:hover, .ee-icon-btn:hover, .ee-toc-actions button:hover {
        border-color: var(--ee-orange);
        color: var(--ee-orange) !important;
        background: var(--ee-orange-soft) !important;
        transform: translateY(-1px);
    }
    .ee-action-btn svg, .ee-icon-btn svg, .ee-toc-actions button svg {
        color: var(--ee-blue);
    }
    .ee-action-btn:hover svg, .ee-icon-btn:hover svg, .ee-toc-actions button:hover svg {
        color: var(--ee-orange);
    }

    /* ── Promo card buttons (Vidya / Smarter Admissions) ─────── */
    .ee-promo-card .ee-promo-btn,
    .ee-promo-card.ee-promo-orange .ee-promo-btn {
        background: #fff !important;
        color: var(--ee-orange) !important;
        border: 2px solid #fff !important;
        padding: 9px 16px;
        border-radius: 8px;
        font-size: 12.5px;
    }
    .ee-promo-card .ee-promo-btn:hover,
    .ee-promo-card.ee-promo-orange .ee-promo-btn:hover {
        background: var(--ee-orange-soft) !important;
        color: var(--ee-orange-dark) !important;
        transform: translateY(-2px);
    }
    .ee-promo-card .ee-promo-btn svg { color: var(--ee-orange); }

    /* ── Social share row — white card with brand-coloured ink ── */
    .ee-soc-btn, .ee-soc-btn:link, .ee-soc-btn:visited {
        background: #fff !important;
        border: 1px solid var(--ee-border);
        padding: 9px 16px;
        border-radius: 6px;
        font-size: 12.5px;
        font-weight: 700;
    }
    .ee-soc-btn.ee-soc-fb { color: #1877F2 !important; border-color: #1877F2; }
    .ee-soc-btn.ee-soc-tw { color: #111   !important; border-color: #111;     }
    .ee-soc-btn.ee-soc-li { color: #0A66C2 !important; border-color: #0A66C2; }
    .ee-soc-btn.ee-soc-wa { color: #1DA851 !important; border-color: #25D366; }
    .ee-soc-btn.ee-soc-em { color: var(--ee-blue) !important; border-color: var(--ee-blue); }
    .ee-soc-btn.ee-soc-cp { color: var(--ee-blue) !important; border-color: var(--ee-blue); }
    .ee-soc-btn:hover {
        background: #fafbfc !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0,0,0,.10);
    }
    .ee-soc-btn svg { color: inherit; }

    /* ── Follow Us icon buttons — white card, brand colour ink ── */
    .ee-follow-btn, .ee-follow-btn:link, .ee-follow-btn:visited {
        background: #fff !important;
        border: 1px solid var(--ee-border);
    }
    .ee-follow-btn.ee-f-li { color: #0A66C2 !important; }
    .ee-follow-btn.ee-f-tw { color: #111    !important; }
    .ee-follow-btn.ee-f-fb { color: #1877F2 !important; }
    .ee-follow-btn.ee-f-ig { color: #BC1888 !important; background-image: none; }
    .ee-follow-btn.ee-f-yt { color: #FF0000 !important; }
    .ee-follow-btn:hover {
        background: var(--ee-orange-soft) !important;
        border-color: var(--ee-orange);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(222,110,48,.18);
    }

    /* ── Product / Solution / Side-nav pills — already white ── */
    .ee-product-pill, .ee-product-pill:link, .ee-product-pill:visited {
        background: #fff !important;
        color: var(--ee-blue);
        border: 1px solid var(--ee-border);
        padding: 11px 14px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none !important;
    }
    .ee-product-pill:hover, .ee-product-pill:focus {
        background: var(--ee-orange-soft) !important;
        border-color: var(--ee-orange) !important;
        color: var(--ee-orange) !important;
        transform: translateX(2px);
    }

    .ee-side-nav-grid a, .ee-side-nav-grid a:link, .ee-side-nav-grid a:visited {
        background: #fff !important;
        color: var(--ee-blue) !important;
        border: 1px solid var(--ee-border);
    }
    .ee-side-nav-grid a:hover, .ee-side-nav-grid a:focus {
        background: var(--ee-orange-soft) !important;
        border-color: var(--ee-orange) !important;
        color: var(--ee-orange) !important;
        transform: translateY(-1px);
    }

    /* ── Floating contact buttons (WhatsApp / Call) ──────────── */
    .ee-float-btn, .ee-float-btn:link, .ee-float-btn:visited {
        background: #fff !important;
        border: 1px solid var(--ee-border);
        box-shadow: 0 6px 20px rgba(15,32,64,.15) !important;
    }
    .ee-float-whatsapp { color: #1DA851 !important; }
    .ee-float-call     { color: var(--ee-orange) !important; }
    .ee-float-btn:hover {
        background: #fafbfc !important;
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 10px 28px rgba(15,32,64,.20) !important;
    }
    .ee-float-btn .ee-float-icon-wrap { background: var(--ee-orange-soft); }
    .ee-float-whatsapp .ee-float-icon-wrap { background: rgba(37,211,102,.12); }
    .ee-float-btn .ee-float-label small { color: var(--ee-muted); }
    .ee-float-btn .ee-float-label strong { color: var(--ee-blue); }

    /* ── Persistent Book Demo bubble ─────────────────────────── */
    .ee-book-bubble, .ee-book-bubble:link, .ee-book-bubble:visited {
        background: #fff !important;
        color: var(--ee-orange) !important;
        border: 2px solid var(--ee-orange) !important;
        box-shadow: 0 8px 22px rgba(222,110,48,.18) !important;
    }
    .ee-book-bubble:hover {
        background: var(--ee-orange-soft) !important;
        color: var(--ee-orange-dark) !important;
        border-color: var(--ee-orange-dark) !important;
        box-shadow: 0 12px 28px rgba(222,110,48,.25) !important;
    }

    /* ── Floating Quick Nav dashboard ── tile bg always white ── */
    .ee-float-nav a .ee-fn-ico { background: #fff !important; border: 1px solid var(--ee-border); }
    .ee-float-nav a:hover .ee-fn-ico { background: var(--ee-orange-soft) !important; border-color: var(--ee-orange); }
    .ee-float-nav a:hover .ee-fn-ico svg { color: var(--ee-orange) !important; }

    /* ── Sticky bottom CTA bar — keep card, white inner CTA ──── */
    .ee-stick-cta-btn, .ee-stick-cta-btn:hover {
        background: #fff !important;
        color: var(--ee-orange) !important;
        border: 2px solid #fff !important;
    }
    .ee-stick-cta-btn:hover {
        background: var(--ee-orange-soft) !important;
        color: var(--ee-orange-dark) !important;
    }

    /* ── End-of-article CTA card — keep orange tile, white CTA ── */
    .ee-end-cta-row .ee-btn-primary {
        background: #fff !important;
        color: var(--ee-orange) !important;
        border: 2px solid #fff !important;
    }
    .ee-end-cta-row .ee-btn-primary:hover {
        background: var(--ee-orange-soft) !important;
        color: var(--ee-orange-dark) !important;
    }
    .ee-end-cta-row .ee-btn-outline {
        background: rgba(255,255,255,.1) !important;
        color: #fff !important;
        border-color: #fff !important;
    }
    .ee-end-cta-row .ee-btn-outline:hover {
        background: #fff !important;
        color: var(--ee-orange) !important;
        border-color: #fff !important;
    }

    /* ── Form fields (consistent across the site) ────────────── */
    .ee-modal-form input,
    .ee-lm-form input,
    .ee-send-row input,
    .ee-blog-form input,
    .ee-blog-form textarea,
    .ee-blog-lead input,
    .ee-blog-lead textarea {
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        padding: 11px 14px;
        border: 1px solid var(--ee-border);
        border-radius: 8px;
        background: #fff;
        color: var(--ee-text);
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }
    .ee-modal-form input:focus,
    .ee-lm-form input:focus,
    .ee-send-row input:focus,
    .ee-blog-form input:focus,
    .ee-blog-form textarea:focus,
    .ee-blog-lead input:focus,
    .ee-blog-lead textarea:focus {
        border-color: var(--ee-orange);
        box-shadow: 0 0 0 3px rgba(222,110,48,.15);
    }

    /* ── Layout-shift (CLS) prevention for live home-page widgets ──
       The animated demo + live counters change content over time;
       without reserved space the page jumps under the reader. Lock
       their dimensions so updates repaint in place. */
    #live-counter, #liveScore, #lead-status, #lead-name {
        display: inline-block;
        font-variant-numeric: tabular-nums;
        font-feature-settings: "tnum";
    }
    #live-counter { min-width: 2.5em; text-align: left; }
    #liveScore    { min-width: 3em; text-align: center; }
    /* The AI-counselor typing bubble fills text char-by-char — reserve
       its height so the chat card (and everything below it) holds. */
    #typewriter { display: block; min-height: 120px; margin: 0; }
    @media (max-width:480px){ #typewriter { min-height: 150px; } }
    /* Voice-wave + pipeline demo keep a fixed footprint. */
    #waves { min-height: 40px; }
    /* Any element flagged as a live region repaints in place. */
    [aria-live], .ee-live, .crm-hero__live-stats, .sp-live-indicator {
        overflow-anchor: none;
    }

    /* ── Accessibility focus ring (keyboard users) ───────────── */
    button:focus-visible, a:focus-visible, [tabindex]:focus-visible {
        outline: 2px solid var(--ee-orange);
        outline-offset: 2px;
        border-radius: 6px;
    }

    /* ── Defensive: header + footer link hover (legacy) ──────── */
    a:hover { text-decoration: none; }
    #site-header a:hover { color: var(--ee-orange) !important; }
    .footer-col a:hover, footer a:hover { color: var(--ee-orange) !important; }

    /* ── Defensive: any unstyled button on the page gets brand
         font + brand colour fallback so plugins / forms don't
         render gray-on-gray. */
    body button:not([class]),
    body input[type="submit"]:not([class]),
    body input[type="button"]:not([class]) {
        font-family: 'Inter', sans-serif;
        background: var(--ee-orange);
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 13.5px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s ease, transform .15s ease;
    }
    body button:not([class]):hover,
    body input[type="submit"]:not([class]):hover,
    body input[type="button"]:not([class]):hover {
        background: var(--ee-orange-dark);
        transform: translateY(-1px);
    }
    </style>
    <?php
}, 999);


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
        'solution'   => array('Solutions',    'Solution',    'dashicons-lightbulb',    'solutions'),
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
        $custom_listed_cpts = array('product', 'industry', 'use_case', 'solution');
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

/* One-shot rewrite-rules flush — runs only when this version flag
   changes. Whenever we add or rename a CPT (e.g. 'solution') the
   editor would otherwise have to remember to visit Settings →
   Permalinks → Save to make /solutions/<slug>/ URLs resolve. Bump
   EE_CPT_REWRITE_VER below any time a CPT slug changes and the flush
   will fire once after the deploy reaches the site. */
define('EE_CPT_REWRITE_VER', '2026-07-16-1');
add_action('init', function () {
    if (get_option('ee_cpt_rewrite_ver') === EE_CPT_REWRITE_VER) return;
    flush_rewrite_rules(false);
    update_option('ee_cpt_rewrite_ver', EE_CPT_REWRITE_VER);
}, 99);

/* One-shot (versioned): blog posts live at /{category}/{post-name}/ —
   e.g. /education-crm/crm-admission-software/. Runs once per version
   bump, sets the permalink structure and flushes rewrites. Old
   /blog/{post-slug}/ links 301 via the extended /blog/ router below;
   bare /{post-slug}/ links are 301-guessed by WP's canonical redirect. */
define('EE_PERMALINK_VER', '2026-07-20-category-2');
add_action('init', function () {
    if (get_option('ee_permalink_ver') === EE_PERMALINK_VER) return;
    /* set_permalink_structure updates BOTH the option and the live
       $wp_rewrite object — updating the option alone makes the flush
       below regenerate rules from the stale structure (404s). */
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%category%/%postname%/');
    flush_rewrite_rules(false);
    update_option('ee_permalink_ver', EE_PERMALINK_VER);
}, 98);

/* Safety net for /{category}/{post-name}/ URLs whose category slug is
   also a CPT slug (help, webinars, news, ...): the CPT single rewrite
   rule wins the match, finds no CPT entry, and would 404 — if a blog
   post with that name exists, hand the request to the post instead. */
add_filter('request', function ($qv) {
    foreach (array('help', 'webinar', 'ebook', 'news', 'career', 'testimonial', 'case_study', 'product', 'industry', 'use_case', 'solution') as $pt) {
        if (empty($qv[$pt]) || !is_string($qv[$pt])) continue;
        $slug = sanitize_title($qv[$pt]);
        if ($slug === '') continue;
        $cpt_hit = get_posts(array('name' => $slug, 'post_type' => $pt, 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids'));
        if ($cpt_hit) continue;
        $post_hit = get_posts(array('name' => $slug, 'post_type' => 'post', 'post_status' => 'publish', 'numberposts' => 1, 'fields' => 'ids'));
        if ($post_hit) {
            return array('name' => $slug);
        }
    }
    return $qv;
});

/* /news/ must always render the news listing template. If a static Page with
   the slug 'news' exists (it wins the URL over the CPT archive on some
   permalink setups), route it to archive-news.php too — the template runs
   its own WP_Query over the news CPT, so it renders identically. */
add_filter('template_include', function ($tpl) {
    if (is_page('news')) {
        $t = locate_template('archive-news.php');
        if ($t) return $t;
    }
    return $tpl;
});

/* Publishing or updating a News post must show up on /news/ immediately —
   bust the common page caches the moment a news item is saved. */
add_action('save_post_news', function () {
    if (function_exists('rocket_clean_domain'))   { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))    { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))         { do_action('litespeed_purge_all'); }
    if (function_exists('wp_cache_clean_cache'))  { @wp_cache_clean_cache($GLOBALS['cache_path'] ?? ''); }
});

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
// ══════════════════════════════════════════════════════════
// D3. EBOOK CPT — meta box + shortcodes + helpers
// ══════════════════════════════════════════════════════════
/**
 * "📚 Ebook Settings" — every editable field on the standalone
 * single-ebook.php template. The body chapters live in WP's normal
 * content editor (the_content) so editors can use blocks, paste
 * HTML, and use the design shortcodes below. Hero, authors, intro,
 * final CTA, PDF download, and the 4 hero meta stats are exposed
 * here so non-coders can build any of the 12 books from one form.
 */
add_action('add_meta_boxes', function () {
    add_meta_box('ee_ebook_settings', '📚 Ebook Settings', 'ee_ebook_meta_render', 'ebook', 'normal', 'high');
});

add_action('admin_enqueue_scripts', function ($hook) {
    if (!in_array($hook, array('post.php', 'post-new.php'), true)) return;
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if ($screen && $screen->post_type === 'ebook') wp_enqueue_media();
});

function ee_ebook_get_meta($post_id, $key, $default = '') {
    $v = get_post_meta($post_id, '_ee_ebook_' . $key, true);
    return $v !== '' ? $v : $default;
}

function ee_ebook_meta_render($post) {
    wp_nonce_field('ee_ebook_meta_save', 'ee_ebook_meta_nonce');
    $g = function ($k, $d = '') use ($post) { return ee_ebook_get_meta($post->ID, $k, $d); };
    ?>
    <style>
        .eeeb-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:16px 18px;margin-bottom:14px;}
        .eeeb-card h2{margin:0 0 12px;font-size:14px;color:#19335D;display:flex;align-items:center;gap:7px;}
        .eeeb-row{margin-bottom:11px;}
        .eeeb-row label{display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;}
        .eeeb-row input,.eeeb-row textarea{width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;font-family:inherit;box-sizing:border-box;}
        .eeeb-row textarea{resize:vertical;min-height:70px;line-height:1.55;}
        .eeeb-row .hint{font-size:11px;color:#646970;margin-top:3px;font-style:italic;}
        .eeeb-grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
        .eeeb-grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;}
        .eeeb-grid4{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;}
        .eeeb-tip{background:#fff8f1;border:1px solid #fde7d3;color:#7c2d12;padding:10px 13px;border-radius:5px;font-size:12.5px;line-height:1.55;margin:0 0 14px;}
        .eeeb-tip code{background:#fff;border:1px solid #e9d5b8;padding:1px 5px;border-radius:3px;font-size:11.5px;}
    </style>

    <p class="eeeb-tip">
        ✦ <strong>Tip:</strong> Wrap each chapter in <code>[ee_chapter id="ch1" num="Chapter 01" h="Chapter title"]…[/ee_chapter]</code>. Inside, use these design blocks:<br>
        <code>[ee_takeaway]Key takeaway text[/ee_takeaway]</code>,
        <code>[ee_pull]Pull-quote sentence[/ee_pull]</code>,
        <code>[ee_callout title="Example"]Body[/ee_callout]</code>,
        <code>[ee_stat big="31.1%"]Of queries arrive at night[/ee_stat]</code>,
        <code>[ee_note title="Bottom line"]Body[/ee_note]</code>,
        <code>[ee_persona letter="A" title="For the student"]Body[/ee_persona]</code>,
        <code>[ee_stack][ee_card n="1" h="Marketing"]Body[/ee_card]…[/ee_stack]</code>,
        <code>[ee_scorecard]</code>.
    </p>

    <!-- ── ARCHIVE CARD ── -->
    <div class="eeeb-card">
        <h2>🗂️ Archive card <em style="font-size:11px;color:#64748b;font-weight:400;">— how this e-book shows up on /ebooks/</em></h2>
        <div class="eeeb-grid3">
            <div class="eeeb-row">
                <label>Format type (filter tab)</label>
                <select name="ee_ebook[format]" style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                    <?php $cur_f = $g('format', 'ebook');
                        foreach (array('ebook'=>'Ebook','guide'=>'Guide','report'=>'Report','tool'=>'Tool','toolkit'=>'Toolkit','checklist'=>'Checklist') as $k => $lab): ?>
                        <option value="<?php echo esc_attr($k); ?>"<?php selected($cur_f, $k); ?>><?php echo esc_html($lab); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="eeeb-row">
                <label>Topic / Category</label>
                <input type="text" name="ee_ebook[topic]" value="<?php echo esc_attr($g('topic', 'Admissions')); ?>" placeholder="SEO, Admissions, Marketing, Funnel…">
            </div>
            <div class="eeeb-row">
                <label>Cover colour</label>
                <select name="ee_ebook[cover_color]" style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                    <?php $cur_c = $g('cover_color', 'blue');
                        foreach (array('blue'=>'Navy blue','orange'=>'Orange','light'=>'Light / white') as $k => $lab): ?>
                        <option value="<?php echo esc_attr($k); ?>"<?php selected($cur_c, $k); ?>><?php echo esc_html($lab); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="eeeb-row">
            <label>Short description (2 lines, shown on the archive card)</label>
            <textarea name="ee_ebook[short_desc]" rows="2" placeholder="A one-sentence pitch — what readers will learn or get."><?php echo esc_textarea($g('short_desc')); ?></textarea>
            <p class="hint">If blank, the post excerpt is used.</p>
        </div>
    </div>

    <!-- ── HERO ── -->
    <div class="eeeb-card">
        <h2>🎯 Hero <em style="font-size:11px;color:#64748b;font-weight:400;">— top of the page</em></h2>
        <div class="eeeb-grid2">
            <div class="eeeb-row"><label>Edition badge</label><input type="text" name="ee_ebook[edition]" value="<?php echo esc_attr($g('edition', 'Edition 2024')); ?>" placeholder="White Paper · Edition 2024"></div>
            <div class="eeeb-row"><label>Read-time override</label><input type="text" name="ee_ebook[read_time]" value="<?php echo esc_attr($g('read_time')); ?>" placeholder="(blank = auto-calc from word count)"></div>
        </div>
        <div class="eeeb-row"><label>Subtitle (under the title)</label><textarea name="ee_ebook[subtitle]" rows="2" placeholder="A leader's guide to designing a scalable enrolment system for the AI era…"><?php echo esc_textarea($g('subtitle')); ?></textarea></div>
        <div class="eeeb-grid2">
            <div class="eeeb-row"><label>Primary CTA — text</label><input type="text" name="ee_ebook[cta1_text]" value="<?php echo esc_attr($g('cta1_text', 'Take the operational fit assessment')); ?>"></div>
            <div class="eeeb-row"><label>Primary CTA — link / anchor</label><input type="text" name="ee_ebook[cta1_url]" value="<?php echo esc_attr($g('cta1_url', '#scorecard')); ?>" placeholder="#scorecard or https://..."></div>
        </div>
        <div class="eeeb-grid2">
            <div class="eeeb-row"><label>Secondary CTA — text</label><input type="text" name="ee_ebook[cta2_text]" value="<?php echo esc_attr($g('cta2_text', 'Start reading')); ?>"></div>
            <div class="eeeb-row"><label>Secondary CTA — link / anchor</label><input type="text" name="ee_ebook[cta2_url]" value="<?php echo esc_attr($g('cta2_url', '#summary')); ?>"></div>
        </div>

        <label style="margin-top:6px;display:block;font-weight:600;font-size:12.5px;color:#1d2327;">Hero meta stats (4 pairs — label/value)</label>
        <div class="eeeb-grid4">
            <?php for ($i = 1; $i <= 4; $i++) :
                $defaults_v = array('—','6','500+','18-pt');
                $defaults_l = array('Read time','Chapters','Institutions','Scorecard');
            ?>
                <div class="eeeb-row" style="margin-bottom:6px;"><input type="text" name="ee_ebook[stat<?php echo $i; ?>_v]" value="<?php echo esc_attr($g("stat{$i}_v", $defaults_v[$i-1])); ?>" placeholder="Value"></div>
                <div class="eeeb-row" style="margin-bottom:6px;"><input type="text" name="ee_ebook[stat<?php echo $i; ?>_l]" value="<?php echo esc_attr($g("stat{$i}_l", $defaults_l[$i-1])); ?>" placeholder="Label"></div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- ── AUTHORS ── -->
    <div class="eeeb-card">
        <h2>👥 Authors <em style="font-size:11px;color:#64748b;font-weight:400;">— up to 2; leave blank to hide</em></h2>
        <?php for ($i = 1; $i <= 2; $i++) :
            $img_val = $g("a{$i}_img"); ?>
            <div style="background:#f8fafc;border-radius:6px;padding:12px 14px;margin-bottom:10px;">
                <strong style="font-size:12px;letter-spacing:.04em;color:#64748b;">AUTHOR <?php echo $i; ?></strong>
                <div class="eeeb-grid2" style="margin-top:8px;">
                    <div class="eeeb-row"><label>Name</label><input type="text" name="ee_ebook[a<?php echo $i; ?>_name]" value="<?php echo esc_attr($g("a{$i}_name")); ?>" placeholder="Full name"></div>
                    <div class="eeeb-row"><label>Role / Title</label><input type="text" name="ee_ebook[a<?php echo $i; ?>_role]" value="<?php echo esc_attr($g("a{$i}_role")); ?>" placeholder="CEO, ExtraaEdge"></div>
                </div>
                <div class="eeeb-row">
                    <label>Photo (square, 200×200 minimum — leave blank to use initials)</label>
                    <div class="eeeb-img-pick" style="display:flex;align-items:center;gap:12px;">
                        <div class="eeeb-img-preview" style="width:60px;height:60px;border-radius:50%;background:#e2e8f0 <?php echo $img_val ? 'url(' . esc_url($img_val) . ') center/cover no-repeat' : ''; ?>;border:1px solid #cbd5e1;flex-shrink:0;"></div>
                        <input type="url" class="eeeb-img-url" name="ee_ebook[a<?php echo $i; ?>_img]" value="<?php echo esc_attr($img_val); ?>" placeholder="https://… (Media URL)" style="flex:1;">
                        <button type="button" class="button eeeb-img-upload">Choose image</button>
                        <button type="button" class="button eeeb-img-clear" style="color:#b91c1c;">Remove</button>
                    </div>
                    <p class="hint">Click <strong>Choose image</strong> to pick from Media Library, or paste a direct image URL.</p>
                </div>
                <div class="eeeb-row"><label>Credentials (comma-separated)</label><input type="text" name="ee_ebook[a<?php echo $i; ?>_creds]" value="<?php echo esc_attr($g("a{$i}_creds")); ?>" placeholder="Ex-HSBC UK, 40 Under 40 (×2), …"></div>
                <div class="eeeb-row"><label>Bio (one or two paragraphs)</label><textarea name="ee_ebook[a<?php echo $i; ?>_bio]" rows="3"><?php echo esc_textarea($g("a{$i}_bio")); ?></textarea></div>
            </div>
        <?php endfor; ?>
        <script>
        (function($){
            if (typeof wp === 'undefined' || !wp.media) return;
            $(document).on('click', '.eeeb-img-upload', function(e){
                e.preventDefault();
                var row = $(this).closest('.eeeb-img-pick');
                var input = row.find('.eeeb-img-url');
                var prev  = row.find('.eeeb-img-preview');
                var frame = wp.media({ title: 'Select author photo', button: { text: 'Use this photo' }, multiple: false });
                frame.on('select', function(){
                    var att = frame.state().get('selection').first().toJSON();
                    input.val(att.url);
                    prev.css('background', '#e2e8f0 url(' + att.url + ') center/cover no-repeat');
                });
                frame.open();
            });
            $(document).on('click', '.eeeb-img-clear', function(e){
                e.preventDefault();
                var row = $(this).closest('.eeeb-img-pick');
                row.find('.eeeb-img-url').val('');
                row.find('.eeeb-img-preview').css('background', '#e2e8f0');
            });
        })(jQuery);
        </script>
    </div>

    <!-- ── INTRO ── -->
    <div class="eeeb-card">
        <h2>📖 Intro section <em style="font-size:11px;color:#64748b;font-weight:400;">— above the chapters</em></h2>
        <div class="eeeb-row"><label>Lead paragraph (large serif)</label><textarea name="ee_ebook[intro_lead]" rows="2" placeholder="Every education leader operates with a clear ambition…"><?php echo esc_textarea($g('intro_lead')); ?></textarea></div>
        <div class="eeeb-row"><label>Body paragraphs (separate paragraphs by a blank line)</label><textarea name="ee_ebook[intro_body]" rows="6" placeholder="Paragraph 1.&#10;&#10;Paragraph 2.&#10;&#10;Paragraph 3."><?php echo esc_textarea($g('intro_body')); ?></textarea></div>
    </div>

    <!-- ── CHAPTERS ── -->
    <?php
    $chapters = get_post_meta($post->ID, '_ee_ebook_chapters', true);
    if (!is_array($chapters)) $chapters = array();
    if (empty($chapters)) $chapters = array(array('id' => 'summary', 'num' => 'Executive Summary', 'h' => '', 'body' => '', 'scorecard' => 0));
    ?>
    <div class="eeeb-card">
        <h2>📚 Chapters <em style="font-size:11px;color:#64748b;font-weight:400;">— add as many chapters as you need</em></h2>
        <p class="eeeb-tip" style="margin-bottom:14px;">
            ✦ <strong>Body shortcodes</strong> (paste inside any chapter body):<br>
            <code>[ee_takeaway]Key insight[/ee_takeaway]</code> ·
            <code>[ee_pull]Pull quote[/ee_pull]</code> ·
            <code>[ee_callout title="Example"]Body[/ee_callout]</code> ·
            <code>[ee_stat big="31.1%"]Of queries arrive at night[/ee_stat]</code> ·
            <code>[ee_note title="Bottom line"]Body[/ee_note]</code> ·
            <code>[ee_persona letter="A" title="For the student"]Body[/ee_persona]</code> ·
            <code>[ee_stack][ee_card n="1" h="Marketing"]Body[/ee_card][ee_card …][/ee_stack]</code>
        </p>
        <div id="eeeb-chapters-list">
            <?php foreach ($chapters as $i => $ch):
                $cid   = isset($ch['id'])    ? $ch['id']    : '';
                $cnum  = isset($ch['num'])   ? $ch['num']   : '';
                $cha   = isset($ch['h'])     ? $ch['h']     : '';
                $cbody = isset($ch['body'])  ? $ch['body']  : '';
                $cscor = !empty($ch['scorecard']); ?>
                <div class="eeeb-chapter" data-i="<?php echo (int) $i; ?>" style="background:#f8fafc;border:1px solid #e2e8f0;border-left:4px solid #DE6E30;border-radius:6px;padding:14px 16px;margin-bottom:12px;position:relative;">
                    <button type="button" class="eeeb-rm-ch" style="position:absolute;right:10px;top:10px;background:transparent;border:1px solid #fecaca;color:#b91c1c;padding:3px 9px;border-radius:4px;cursor:pointer;font-size:11px;">Remove</button>
                    <strong style="display:block;font-size:12px;letter-spacing:.04em;color:#64748b;margin-bottom:8px;">CHAPTER <span class="eeeb-ch-idx"><?php echo $i + 1; ?></span></strong>
                    <div class="eeeb-grid3">
                        <div class="eeeb-row"><label>Anchor ID</label><input type="text" name="ee_ebook_chapters[<?php echo $i; ?>][id]" value="<?php echo esc_attr($cid); ?>" placeholder="ch1, summary, scorecard"><p class="hint">Short, no spaces. Used in URL anchor (e.g. #ch1).</p></div>
                        <div class="eeeb-row"><label>Number / Label</label><input type="text" name="ee_ebook_chapters[<?php echo $i; ?>][num]" value="<?php echo esc_attr($cnum); ?>" placeholder="Chapter 01"><p class="hint">Small label shown above the heading.</p></div>
                        <div class="eeeb-row"><label>Heading</label><input type="text" name="ee_ebook_chapters[<?php echo $i; ?>][h]" value="<?php echo esc_attr($cha); ?>" placeholder="When growth stalls"><p class="hint">Big chapter heading (also shown in the Contents nav).</p></div>
                    </div>
                    <div class="eeeb-row"><label>Body (paragraphs, sub-headings, design shortcodes)</label><textarea name="ee_ebook_chapters[<?php echo $i; ?>][body]" rows="10" placeholder="First paragraph.&#10;&#10;<h3>1.1 Sub-section</h3>&#10;Body paragraph.&#10;&#10;[ee_takeaway]Key takeaway[/ee_takeaway]&#10;&#10;<ul><li>Point one</li><li>Point two</li></ul>"><?php echo esc_textarea($cbody); ?></textarea></div>
                    <div class="eeeb-row" style="margin-bottom:0;"><label style="display:inline-flex;align-items:center;gap:7px;font-weight:500;"><input type="checkbox" name="ee_ebook_chapters[<?php echo $i; ?>][scorecard]" value="1" <?php checked($cscor); ?>> Append the interactive <strong>Operational Fit Scorecard</strong> widget after this chapter's body</label></div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="eeeb-add-ch" class="button button-primary" style="background:#19335D;border-color:#19335D;">+ Add chapter</button>

        <template id="eeeb-ch-tpl">
            <div class="eeeb-chapter" style="background:#f8fafc;border:1px solid #e2e8f0;border-left:4px solid #DE6E30;border-radius:6px;padding:14px 16px;margin-bottom:12px;position:relative;">
                <button type="button" class="eeeb-rm-ch" style="position:absolute;right:10px;top:10px;background:transparent;border:1px solid #fecaca;color:#b91c1c;padding:3px 9px;border-radius:4px;cursor:pointer;font-size:11px;">Remove</button>
                <strong style="display:block;font-size:12px;letter-spacing:.04em;color:#64748b;margin-bottom:8px;">CHAPTER <span class="eeeb-ch-idx">_idx_</span></strong>
                <div class="eeeb-grid3">
                    <div class="eeeb-row"><label>Anchor ID</label><input type="text" name="ee_ebook_chapters[__i__][id]" value="" placeholder="ch1, summary, scorecard"><p class="hint">Short, no spaces.</p></div>
                    <div class="eeeb-row"><label>Number / Label</label><input type="text" name="ee_ebook_chapters[__i__][num]" value="" placeholder="Chapter 01"><p class="hint">Small label above the heading.</p></div>
                    <div class="eeeb-row"><label>Heading</label><input type="text" name="ee_ebook_chapters[__i__][h]" value="" placeholder="When growth stalls"><p class="hint">Big chapter heading.</p></div>
                </div>
                <div class="eeeb-row"><label>Body (paragraphs, sub-headings, design shortcodes)</label><textarea name="ee_ebook_chapters[__i__][body]" rows="10" placeholder="First paragraph.&#10;&#10;<h3>Sub-section</h3>&#10;Body."></textarea></div>
                <div class="eeeb-row" style="margin-bottom:0;"><label style="display:inline-flex;align-items:center;gap:7px;font-weight:500;"><input type="checkbox" name="ee_ebook_chapters[__i__][scorecard]" value="1"> Append the Operational Fit Scorecard widget</label></div>
            </div>
        </template>

        <script>
        (function(){
            var list = document.getElementById('eeeb-chapters-list');
            var tpl  = document.getElementById('eeeb-ch-tpl');
            function next(){
                var rows = list.querySelectorAll('.eeeb-chapter');
                var max = 0;
                rows.forEach(function(r){
                    var m = (r.querySelector('input[name*="[id]"]') || {}).name || '';
                    var idx = parseInt((m.match(/\[(\d+)\]/) || [0,0])[1], 10);
                    if (idx > max) max = idx;
                });
                return max + 1;
            }
            document.getElementById('eeeb-add-ch').addEventListener('click', function(){
                var i = next();
                var html = tpl.innerHTML.replace(/__i__/g, i).replace(/_idx_/g, list.querySelectorAll('.eeeb-chapter').length + 1);
                var wrap = document.createElement('div'); wrap.innerHTML = html;
                list.appendChild(wrap.firstElementChild);
                renumber();
            });
            list.addEventListener('click', function(e){
                if (e.target.classList.contains('eeeb-rm-ch')) {
                    if (list.querySelectorAll('.eeeb-chapter').length <= 1) { alert('Keep at least one chapter.'); return; }
                    e.target.closest('.eeeb-chapter').remove();
                    renumber();
                }
            });
            function renumber(){
                list.querySelectorAll('.eeeb-chapter').forEach(function(r, i){
                    var span = r.querySelector('.eeeb-ch-idx'); if (span) span.textContent = i + 1;
                });
            }
        })();
        </script>
    </div>

    <!-- ── FINAL CTA ── -->
    <div class="eeeb-card">
        <h2>🚀 Final CTA <em style="font-size:11px;color:#64748b;font-weight:400;">— bottom of the page</em></h2>
        <div class="eeeb-grid2">
            <div class="eeeb-row"><label>Kicker</label><input type="text" name="ee_ebook[fcta_kicker]" value="<?php echo esc_attr($g('fcta_kicker', 'Your First Step — From Blueprint to Reality')); ?>"></div>
            <div class="eeeb-row"><label>Headline</label><input type="text" name="ee_ebook[fcta_h]" value="<?php echo esc_attr($g('fcta_h', 'Join the Admissions Transformation Masterclass')); ?>"></div>
        </div>
        <div class="eeeb-row"><label>Lead paragraph</label><textarea name="ee_ebook[fcta_lead]" rows="2" placeholder="An exclusive workshop series…"><?php echo esc_textarea($g('fcta_lead')); ?></textarea></div>
        <div class="eeeb-row"><label>Step lines (one per line, max 3)</label><textarea name="ee_ebook[fcta_steps]" rows="4" placeholder="Deep-dive into your score — analyse your fit score.&#10;Map your process — design SOPs for your size.&#10;Build your business case — data-backed roadmap."><?php echo esc_textarea($g('fcta_steps')); ?></textarea></div>
        <div class="eeeb-grid2">
            <div class="eeeb-row"><label>Button text</label><input type="text" name="ee_ebook[fcta_btn]" value="<?php echo esc_attr($g('fcta_btn', 'Request an invitation')); ?>"></div>
            <div class="eeeb-row"><label>Button URL</label><input type="url" name="ee_ebook[fcta_url]" value="<?php echo esc_attr($g('fcta_url', '/book-demo/')); ?>"></div>
        </div>
    </div>

    <!-- ── DOWNLOAD ── -->
    <div class="eeeb-card">
        <h2>⬇ PDF download <em style="font-size:11px;color:#64748b;font-weight:400;">— the file the form delivers</em></h2>
        <div class="eeeb-row"><label>PDF file URL</label><input type="url" name="ee_ebook[pdf_url]" value="<?php echo esc_attr($g('pdf_url')); ?>" placeholder="https://www.extraaedge.com/wp-content/uploads/.../book.pdf"><p class="hint">Upload the PDF via <strong>Media → Add New</strong>, copy the file URL, and paste it here.</p></div>
        <div class="eeeb-grid2">
            <div class="eeeb-row"><label>Form heading (above email field)</label><input type="text" name="ee_ebook[form_title]" value="<?php echo esc_attr($g('form_title', 'Download the PDF')); ?>"></div>
            <div class="eeeb-row"><label>Form button text</label><input type="text" name="ee_ebook[form_btn]" value="<?php echo esc_attr($g('form_btn', 'Download the Ebook')); ?>"></div>
        </div>
    </div>
    <?php
}

add_action('save_post_ebook', function ($post_id) {
    if (!isset($_POST['ee_ebook_meta_nonce']) || !wp_verify_nonce($_POST['ee_ebook_meta_nonce'], 'ee_ebook_meta_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $in = isset($_POST['ee_ebook']) && is_array($_POST['ee_ebook']) ? $_POST['ee_ebook'] : array();
    $url_keys  = array('cta1_url', 'cta2_url', 'fcta_url', 'pdf_url', 'a1_img', 'a2_img');
    $rich_keys = array('subtitle', 'a1_bio', 'a2_bio', 'intro_lead', 'intro_body', 'fcta_lead', 'fcta_steps');
    foreach ($in as $k => $v) {
        $key = '_ee_ebook_' . preg_replace('/[^a-z0-9_]/', '', strtolower($k));
        if (in_array($k, $url_keys, true)) {
            update_post_meta($post_id, $key, esc_url_raw(wp_unslash($v)));
        } elseif (in_array($k, $rich_keys, true)) {
            update_post_meta($post_id, $key, wp_kses_post(wp_unslash($v)));
        } else {
            update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($v)));
        }
    }

    /* Chapters repeater */
    $raw_chapters = isset($_POST['ee_ebook_chapters']) && is_array($_POST['ee_ebook_chapters']) ? $_POST['ee_ebook_chapters'] : array();
    $clean = array();
    foreach ($raw_chapters as $row) {
        if (!is_array($row)) continue;
        $id   = isset($row['id'])   ? sanitize_title(wp_unslash($row['id']))                                   : '';
        $num  = isset($row['num'])  ? sanitize_text_field(wp_unslash($row['num']))                              : '';
        $h    = isset($row['h'])    ? sanitize_text_field(wp_unslash($row['h']))                                : '';
        $body = isset($row['body']) ? wp_kses_post(wp_unslash($row['body']))                                    : '';
        $sc   = !empty($row['scorecard']) ? 1 : 0;
        if ($id === '' && $num === '' && $h === '' && trim($body) === '') continue;
        if ($id === '') $id = sanitize_title($h ?: $num ?: ('ch' . (count($clean) + 1)));
        $clean[] = array('id' => $id, 'num' => $num, 'h' => $h, 'body' => $body, 'scorecard' => $sc);
    }
    update_post_meta($post_id, '_ee_ebook_chapters', $clean);
});

/* ── Design shortcodes (usable inside the_content for ebooks) ──
 * Class names align with the premium white-paper template scoped under .ee-ebook-body
 */
add_shortcode('ee_takeaway', function ($atts, $content = '') {
    return '<div class="takeaway"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg><div class="tx"><b>Key takeaway</b>' . do_shortcode($content) . '</div></div>';
});
add_shortcode('ee_pull', function ($atts, $content = '') {
    return '<div class="pull"><p>' . do_shortcode($content) . '</p></div>';
});
add_shortcode('ee_callout', function ($atts, $content = '') {
    $a = shortcode_atts(array('title' => 'Example'), $atts);
    return '<div class="callout"><div class="ch"><span class="pp"></span>' . esc_html($a['title']) . '</div><div class="cbody">' . do_shortcode($content) . '</div></div>';
});
add_shortcode('ee_stat', function ($atts, $content = '') {
    $a = shortcode_atts(array('big' => '0%'), $atts);
    return '<div class="statbox"><div class="big">' . esc_html($a['big']) . '</div><div class="lab">' . do_shortcode($content) . '</div></div>';
});
add_shortcode('ee_note', function ($atts, $content = '') {
    $a = shortcode_atts(array('title' => 'Note'), $atts);
    return '<div class="note"><span class="nt">' . esc_html($a['title']) . '</span><p>' . do_shortcode($content) . '</p></div>';
});

/* Chapter wrapper. Editor writes:
 *   [ee_chapter id="ch1" num="Chapter 01" h="Why growth stalls"]
 *     <p>body…</p>
 *   [/ee_chapter]
 * It outputs a section.chapter with chap-num + h2 and gets picked up by the TOC builder. */
add_shortcode('ee_chapter', function ($atts, $content = '') {
    $a = shortcode_atts(array('id' => '', 'num' => '', 'h' => ''), $atts);
    $id = $a['id'] ? ' id="' . esc_attr($a['id']) . '"' : '';
    $head = '<div class="chap-head"><div class="chap-num">' . esc_html($a['num']) . ' <span class="rt" data-rt></span></div>' . ($a['h'] ? '<h2>' . esc_html($a['h']) . '</h2>' : '') . '</div>';
    return '<section class="chapter reveal"' . $id . '>' . $head . do_shortcode(wpautop(trim($content))) . '</section><div class="divider-d"></div>';
});

/* Persona card */
add_shortcode('ee_persona', function ($atts, $content = '') {
    $a = shortcode_atts(array('letter' => 'A', 'title' => ''), $atts);
    return '<div class="persona"><div class="pt"><span class="pk">' . esc_html($a['letter']) . '</span> ' . esc_html($a['title']) . '</div>' . do_shortcode(wpautop(trim($content))) . '</div>';
});

/* Stack grid (4 cards). Use with nested [ee_card] blocks */
add_shortcode('ee_stack', function ($atts, $content = '') {
    return '<div class="stack">' . do_shortcode(trim($content)) . '</div>';
});
add_shortcode('ee_card', function ($atts, $content = '') {
    $a = shortcode_atts(array('n' => '', 'h' => ''), $atts);
    $n = $a['n'] ? '<span>' . esc_html($a['n']) . '.</span> ' : '';
    return '<div class="scard"><div class="si"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="14" rx="2"/></svg></div><h5>' . $n . esc_html($a['h']) . '</h5><p>' . do_shortcode(trim($content)) . '</p></div>';
});

/* 18-point Operational Fit Scorecard widget */
add_shortcode('ee_scorecard', function () {
    ob_start(); ?>
    <div class="scorecard" id="scorecard">
      <div class="sc-head">
        <h4>The Operational Fit Scorecard</h4>
        <p>Rate your institution's current reality for each statement. Be honest — a "3" is not a "5." Your results update live below.</p>
        <div class="sc-legend"><span>1 — We do not do this</span><span>3 — We do this inconsistently</span><span>5 — We do this consistently</span></div>
      </div>
      <?php
      $cats = array(
          'proc'   => array('Scalable Processes (SOPs)', 10, array(
              'We use a documented, multi-channel (call/email/SMS) contact cadence for all new leads that all advisors must follow.',
              'We have a strictly enforced "speed-to-lead" rule (e.g., &lt; 5 minutes) for all new inquiries, and we measure it.',
          )),
          'org'    => array('Optimized Org Structure', 20, array(
              'Our operational "handoffs" (e.g., Enrollment → Financial Aid, or CRM → SIS) are seamless, automated, and clearly defined.',
              'Our enrollment advisors are specialists whose primary job is consulting with qualified students ("closing"), not prospecting or paperwork.',
              'We have a dedicated operations team that handles admin work (document collection, transcript verification) so advisors don\'t have to.',
              'We have a dedicated middle-management layer (Team Leads/Associate Directors) whose primary job is coaching, not just selling.',
          )),
          'talent' => array('Talent & Performance', 15, array(
              'We have a clear, defined competency profile for hiring "sales-driven" enrollment talent, and we test for it in interviews.',
              'We have a repeatable, scalable training "bootcamp" for all new hires covering systems, compliance, and our sales methodology.',
              'Our compensation plan directly incentivizes high-quality enrollments (variable pay tied to "starts" or "persistence"), not just applications.',
          )),
          'tech'   => array('Integrated Technology', 15, array(
              'Our communication tools (phone/SMS) are fully integrated with our CRM for click-to-call, call recording, and automatic activity logging.',
              'Our systems are integrated to eliminate manual data re-entry (marketing platform, CRM, and SIS pass data automatically).',
              'Our technology stack automates long-term nurture for "not-yet-ready" leads, so advisors can focus on "sales-ready" leads.',
          )),
          'data'   => array('Data, Analytics & Reporting', 15, array(
              'We track and obsess over leading indicators (advisor activity, speed-to-lead) and lagging indicators (conversion rates by program).',
              'Our managers and reps have real-time dashboards that clearly show their performance against their goals.',
              'Our "Single Source of Truth" policy ("If it\'s not in the CRM, it didn\'t happen") is 100% enforced for all calls, emails, and notes.',
          )),
          'qa'     => array('Compliance & Quality Assurance', 15, array(
              'We track student persistence (first-term retention) and tie this "right-fit" quality metric back to the advisor and marketing source.',
              'All enrollment staff receive mandatory, recurring training on regulatory compliance (e.g., TCPA, misrepresentation rules).',
              'We have a formal, non-negotiable process for reviewing call recordings and emails for both quality and regulatory compliance.',
          )),
      );
      foreach ($cats as $k => $c) :
          list($lab, $mx, $qs) = $c; ?>
          <div class="sc-cat" data-cat="<?php echo esc_attr($k); ?>"><?php echo esc_html($lab); ?><span class="cscore" data-catscore="<?php echo esc_attr($k); ?>">0 / <?php echo (int) $mx; ?></span></div>
          <?php foreach ($qs as $q) : ?>
            <div class="sc-row" data-q data-cat="<?php echo esc_attr($k); ?>"><div class="q"><?php echo wp_kses_post($q); ?></div><div class="sc-opts"></div></div>
          <?php endforeach;
      endforeach; ?>
      <div class="sc-result">
        <div class="sc-result-grid">
          <div>
            <div class="sc-total tnum"><b id="scScore">0</b><small> / 90</small></div>
            <div class="sc-answered" id="scAnswered">0 of 18 statements rated</div>
            <div class="sc-band-name" id="scBand">Rate the statements to see your band</div>
            <div class="sc-band-desc" id="scDesc">Your score is your symptom — the "what." The next step is to understand the "why" and build the "how."</div>
            <div class="sc-meter"><i id="scMeter"></i></div>
            <button class="sc-reset" id="scReset" type="button">↺ Reset</button>
          </div>
          <div class="sc-cats">
            <?php foreach (array('proc'=>array('Processes',10),'org'=>array('Org Structure',20),'talent'=>array('Talent',15),'tech'=>array('Technology',15),'data'=>array('Data',15),'qa'=>array('Compliance',15)) as $k=>$lab): ?>
              <div class="sc-catbar"><span class="cl"><?php echo esc_html($lab[0]); ?></span><div class="ct"><i data-bar="<?php echo esc_attr($k); ?>"></i></div><span class="cv" data-cv="<?php echo esc_attr($k); ?>">0/<?php echo (int) $lab[1]; ?></span></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <h4>What your score means</h4>
    <div class="bands">
      <div class="bandc b1"><div class="br">75–90 · Optimization Mode</div><p>A strong, scalable foundation: documented processes, a specialized team, and data-driven management.</p></div>
      <div class="bandc b2"><div class="br">50–74 · The Scaling Risk</div><p>Built on "heroic efforts" — the most common and dangerous category. One departure from chaos.</p></div>
      <div class="bandc b3"><div class="br">Below 50 · Operational Crisis</div><p>STOP. Your foundation is broken. Re-engineer the core foundation first.</p></div>
    </div>
    <?php
    return ob_get_clean();
});

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
                <input type="text" name="ee_blog[banner_cta_text]" value="<?php echo esc_attr($f('banner_cta_text', 'Book Demo Now')); ?>">
            </div>
            <div class="eebm-row">
                <label>CTA URL</label>
                <input type="text" name="ee_blog[banner_cta_url]" value="<?php echo esc_attr($f('banner_cta_url', '/book-demo/')); ?>">
            </div>
        </div>
    </div>

    <?php
}

/* ── ❓ FAQ — its own prominent meta box so editors can't miss it.
   Same ee_blog_faqs field names, so the existing save handler and
   the FAQPage JSON-LD output in single.php keep working as-is. ── */
add_action('add_meta_boxes', function () {
    add_meta_box('ee_blog_faq', '❓ FAQ — shows on the post + Google/AI search (FAQPage schema)', 'ee_blog_faq_box_render', 'post', 'normal', 'high');
});
function ee_blog_faq_box_render($post) {
    $faqs = get_post_meta($post->ID, '_ee_blog_faqs', true);
    if (!is_array($faqs)) $faqs = array();
    wp_nonce_field('ee_blog_meta_save', 'ee_blog_faq_nonce');
    ?>
    <style>
        #ee_blog_faq .eebm-faq     { background:#fff; border:1px solid #e2e8f0; border-radius:6px; padding:12px 14px; margin-bottom:10px; position:relative; }
        #ee_blog_faq .eebm-faq .rm { position:absolute; right:8px; top:8px; background:transparent; border:1px solid #fecaca; color:#b91c1c; padding:3px 9px; border-radius:4px; cursor:pointer; font-size:11px; }
        #ee_blog_faq .eebm-row     { margin:10px 0; }
        #ee_blog_faq .eebm-row label { display:block; font-weight:600; font-size:12.5px; margin-bottom:4px; color:#1d2327; }
        #ee_blog_faq .eebm-row input, #ee_blog_faq .eebm-row textarea { width:100%; padding:7px 9px; border:1px solid #ddd; border-radius:4px; font-size:13px; font-family:inherit; }
        #ee_blog_faq .eebm-add     { background:#19335D; color:#fff; border:0; border-radius:5px; padding:8px 16px; cursor:pointer; font-size:12.5px; font-weight:600; }
        #ee_blog_faq .hint         { color:#646970; font-size:12px; font-style:italic; margin:10px 0 0; }
    </style>
    <p style="margin:4px 0 12px;font-size:12.5px;color:#475569;line-height:1.55;">Add question–answer pairs below. They appear as a collapsible <strong>FAQ section</strong> at the end of this post <em>and</em> are emitted as <strong>FAQPage JSON-LD schema</strong> — the format Google, ChatGPT, Gemini and other AI crawlers read for rich results and answers.</p>
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
    <p class="hint">Tip: 3–6 FAQs works best. Write answers in plain language, 1–3 sentences each.</p>

    <script>
    function eebmAddFaq() {
        var box  = document.getElementById('eebm-faqs');
        var idx  = box.children.length + 100; /* offset avoids index clashes after removals */
        var node = document.createElement('div');
        node.className = 'eebm-faq';
        node.innerHTML = ''
            + '<button type="button" class="rm" onclick="this.closest(\'.eebm-faq\').remove();">✕ Remove</button>'
            + '<div class="eebm-row" style="margin-top:0;"><label>Question</label><input type="text" name="ee_blog_faqs['+idx+'][q]"></div>'
            + '<div class="eebm-row" style="margin-bottom:0;"><label>Answer</label><textarea name="ee_blog_faqs['+idx+'][a]" rows="2"></textarea></div>';
        box.appendChild(node);
        node.querySelector('input').focus();
    }
    </script>
    <?php
}

add_action('save_post_post', function ($post_id) {
    $ee_nonce_ok = (isset($_POST['ee_blog_meta_nonce']) && wp_verify_nonce($_POST['ee_blog_meta_nonce'], 'ee_blog_meta_save'))
                || (isset($_POST['ee_blog_faq_nonce']) && wp_verify_nonce($_POST['ee_blog_faq_nonce'], 'ee_blog_meta_save'));
    if (!$ee_nonce_ok) return;
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
    /* Track 1 (left-moving on home page) — unlimited logos.
       Loop a generous ceiling and skip gaps so removed slots
       don't break the sequence. */
    for ($i = 1; $i <= 100; $i++) {
        $url = isset($home["logo_t1_{$i}_url"]) ? trim((string) $home["logo_t1_{$i}_url"]) : '';
        if ($url === '') continue;
        $out[] = array(
            'image' => $url,
            'alt'   => isset($home["logo_t1_{$i}_alt"]) ? (string) $home["logo_t1_{$i}_alt"] : '',
        );
    }
    /* Track 2 (right-moving on home page) — unlimited logos. */
    for ($i = 1; $i <= 100; $i++) {
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
    if (!in_array($post_type, array('product', 'industry', 'use_case', 'solution'), true)) return;
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
        array('product', 'industry', 'use_case', 'solution'),
        'normal',
        'high'
    );

    /* Right-hand sidebar: searchable list of internal pages with one-click copy buttons.
       Lets a non-coder insert links into any text field without writing HTML. */
    add_meta_box(
        'ee_link_picker',
        '🔗 Internal Link Picker',
        'ee_link_picker_render',
        array('product', 'industry', 'use_case', 'solution', 'page', 'post'),
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
    if (function_exists('ee_get_available_toc_anchors') && in_array($post->post_type, array('product','industry','use_case','solution'), true)) {
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
        <li><a href="#" data-tab="tab-listing">🧩 Listing</a></li>
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
    <div id="tab-listing"      class="product-tab-content">
        <h3>🧩 Where does this product appear?</h3>
        <p style="color:#666;margin:4px 0 14px">Home page "The admissions platform" section, the /products/ page and the header mega menu. Categories &amp; badge suggestions are managed under <b>Products → Listing Categories &amp; Badges</b>.</p>
        <div id="ee_eep_listing" style="max-width:520px"><?php ee_eep_listing_render($post); ?></div>
    </div>
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

    /* Page-Builder pages assigned to the "industries" category join the
       menu, the footer column and the /industries/ grid automatically. */
    if (function_exists('ee_pb_pages_in_category')) {
        foreach (ee_pb_pages_in_category('industries') as $bp) { $items[] = $bp; }
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
            if (get_post_meta($pid, '_eep_hide_menu', true) === '1') continue;
            $meta_desc = get_post_meta($pid, '_product_card_desc', true);
            if (!$meta_desc) $meta_desc = get_post_meta($pid, '_eep_desc', true);
            $desc      = $meta_desc ?: (get_the_excerpt() ?: wp_trim_words(get_the_content(), 24, '…'));
            $icon      = get_post_meta($pid, '_product_card_icon', true);
            if (!$icon && function_exists('ee_eep_icon_url')) $icon = ee_eep_icon_url(get_post_meta($pid, '_eep_icon', true));
            $items[]   = array(
                'title'  => get_the_title(),
                'desc'   => $desc,
                'url'    => str_replace(home_url(), '', get_permalink($pid)) ?: get_permalink($pid),
                'icon'   => $icon,
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

    /* Page-Builder pages assigned to the "products" category join the menu,
       the footer column and the /products/ grid automatically. */
    if (function_exists('ee_pb_pages_in_category')) {
        foreach (ee_pb_pages_in_category('products') as $bp) { $items[] = $bp; }
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
    /* Page-Builder pages in the "use-cases" category join automatically. */
    if (function_exists('ee_pb_pages_in_category')) {
        foreach (ee_pb_pages_in_category('use-cases') as $bp) { $items[] = $bp; }
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

// ── Help article settings: category drives grouping on /help/ ──
add_action('add_meta_boxes', function () {
    add_meta_box(
        'help_article_settings',
        '❓ Help Article Settings (category, difficulty, reading time)',
        function ($post) {
            wp_nonce_field('help_article_meta', 'help_article_meta_nonce');
            $category  = get_post_meta($post->ID, '_help_category',      true);
            $subtitle  = get_post_meta($post->ID, '_help_subtitle',      true);
            $diff      = get_post_meta($post->ID, '_help_difficulty',    true) ?: 'beginner';
            $read_time = get_post_meta($post->ID, '_help_reading_time',  true);
            $related   = get_post_meta($post->ID, '_help_related_links', true);
            /* existing categories as suggestions so names stay consistent */
            global $wpdb;
            $existing = $wpdb->get_col($wpdb->prepare(
                "SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
                 INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
                 WHERE pm.meta_key = %s AND pm.meta_value <> ''
                   AND p.post_type = 'help' AND p.post_status = 'publish'
                 ORDER BY pm.meta_value",
                '_help_category'
            ));
            /* categories created in Help → Page Settings (no articles yet) suggest too */
            foreach ((array) get_option('ee_help_categories', array()) as $hr) {
                if (!empty($hr['name']) && !in_array($hr['name'], $existing, true)) $existing[] = $hr['name'];
            }
            ?>
            <style>
                .hlp-row { margin-bottom: 16px; }
                .hlp-row label { display:block; font-weight:600; margin-bottom:5px; color:#1d2327; font-size:13px; }
                .hlp-row input, .hlp-row select, .hlp-row textarea { width:100%; padding:8px; border:1px solid #ddd; border-radius:4px; font-size:13px; font-family:inherit; }
                .hlp-row textarea { resize:vertical; min-height:70px; }
                .hlp-row .hint { color:#646970; font-size:12px; margin-top:4px; font-style:italic; }
            </style>
            <div class="hlp-row">
                <label>Category (groups this article on the /help/ page)</label>
                <input type="text" name="help_category" value="<?php echo esc_attr($category); ?>" list="help-cat-list" placeholder="Getting Started / Lead List / Reports ...">
                <datalist id="help-cat-list">
                    <?php foreach ($existing as $c) : ?><option value="<?php echo esc_attr($c); ?>"></option><?php endforeach; ?>
                </datalist>
                <p class="hint">Type the same name for articles that belong together — each unique name becomes its own card and quick-link tile on /help/. Blank = "General".</p>
            </div>
            <div class="hlp-row">
                <label>Subtitle (short line under the title on the article page)</label>
                <input type="text" name="help_subtitle" value="<?php echo esc_attr($subtitle); ?>" placeholder="Step-by-step guide to importing your leads.">
            </div>
            <div class="hlp-row">
                <label>Video URL (optional — video player shows at the top of the article)</label>
                <input type="url" name="help_video" value="<?php echo esc_attr(get_post_meta($post->ID, '_help_video', true)); ?>" placeholder="https://www.youtube.com/watch?v=... or https://...mp4">
                <p class="hint">YouTube, Vimeo, or a direct .mp4 link. You can also insert videos anywhere in the article content with Add Media.</p>
            </div>
            <div class="hlp-row">
                <label>Difficulty</label>
                <select name="help_difficulty">
                    <?php foreach (array('beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced') as $k => $lbl) : ?>
                        <option value="<?php echo esc_attr($k); ?>" <?php selected($diff, $k); ?>><?php echo esc_html($lbl); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="hlp-row">
                <label>Reading time (minutes)</label>
                <input type="number" name="help_reading_time" value="<?php echo esc_attr($read_time); ?>" min="1" max="60" placeholder="5">
            </div>
            <div class="hlp-row">
                <label>Related links (one per line: Label|URL)</label>
                <textarea name="help_related_links" rows="3" placeholder="How to import leads|/help/import-leads/&#10;Lead scoring guide|/help/lead-scoring/"><?php echo esc_textarea($related); ?></textarea>
                <p class="hint">Shown as "Related articles" at the bottom of this article.</p>
            </div>
            <?php
        },
        'help',
        'normal',
        'high'
    );
});
add_action('save_post_help', function ($post_id) {
    if (!isset($_POST['help_article_meta_nonce']) || !wp_verify_nonce($_POST['help_article_meta_nonce'], 'help_article_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['help_category']))      update_post_meta($post_id, '_help_category',      sanitize_text_field(wp_unslash($_POST['help_category'])));
    if (isset($_POST['help_subtitle']))      update_post_meta($post_id, '_help_subtitle',      sanitize_text_field(wp_unslash($_POST['help_subtitle'])));
    if (isset($_POST['help_video']))         update_post_meta($post_id, '_help_video',         esc_url_raw(trim(wp_unslash($_POST['help_video']))));
    if (isset($_POST['help_difficulty']))    update_post_meta($post_id, '_help_difficulty',    in_array($_POST['help_difficulty'], array('beginner', 'intermediate', 'advanced'), true) ? $_POST['help_difficulty'] : 'beginner');
    if (isset($_POST['help_reading_time']))  update_post_meta($post_id, '_help_reading_time',  ($n = absint($_POST['help_reading_time'])) ? min($n, 60) : '');
    if (isset($_POST['help_related_links'])) update_post_meta($post_id, '_help_related_links', sanitize_textarea_field(wp_unslash($_POST['help_related_links'])));
});

// ── Help Center page settings: every text/image/video on /help/ is
//    editable from Help → Page Settings, no code needed ──
function ee_help_page_sanitize($in) {
    $in  = is_array($in) ? $in : array();
    $out = array();
    foreach (array(
        'hero_title', 'search_ph', 'support_title', 'b1_label', 'b2_label', 'empty_soon', 'empty_search',
        'empty_soon2', 'empty_search2', 'lbl_badge_one', 'lbl_badge_many', 'lbl_found_one', 'lbl_found_many',
        'lbl_home', 'lbl_read', 'lbl_updated', 'lbl_onpage', 'lbl_incat', 'lbl_related', 'lbl_all', 'lbl_prev', 'lbl_next', 'lbl_empty_cat',
    ) as $k) {
        $out[$k] = isset($in[$k]) ? sanitize_text_field($in[$k]) : '';
    }
    foreach (array('hero_sub', 'support_text') as $k) {
        $out[$k] = isset($in[$k]) ? sanitize_textarea_field($in[$k]) : '';
    }
    foreach (array('hero_image', 'hero_video', 'b1_url', 'b2_url') as $k) {
        $out[$k] = isset($in[$k]) ? esc_url_raw(trim($in[$k])) : '';
    }
    /* rich section: allow post markup + video embeds */
    $allowed           = wp_kses_allowed_html('post');
    $allowed['iframe'] = array('src' => true, 'width' => true, 'height' => true, 'frameborder' => true, 'allow' => true, 'allowfullscreen' => true, 'title' => true, 'style' => true, 'class' => true, 'loading' => true, 'referrerpolicy' => true);
    $allowed['video']  = array('src' => true, 'controls' => true, 'poster' => true, 'width' => true, 'height' => true, 'style' => true, 'class' => true, 'preload' => true, 'muted' => true, 'loop' => true, 'autoplay' => true, 'playsinline' => true);
    $allowed['source'] = array('src' => true, 'type' => true);
    $out['extra_content'] = isset($in['extra_content']) ? wp_kses($in['extra_content'], $allowed) : '';
    return $out;
}
/** Per-category look & order rows: {name, color, icon(0-10), order}. */
function ee_help_cats_sanitize($in) {
    $out = array();
    if (!is_array($in)) return $out;
    foreach ($in as $row) {
        if (!is_array($row) || trim((string) ($row['name'] ?? '')) === '') continue;
        $color = trim((string) ($row['color'] ?? ''));
        if ($color !== '' && !preg_match('/^#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/', $color)) $color = '';
        $icon  = ($row['icon'] ?? '') === '' ? '' : (string) min(10, max(0, (int) $row['icon']));
        $order = trim((string) ($row['order'] ?? ''));
        $order = $order === '' ? '' : (string) max(1, min(99, (int) $order));
        $label = sanitize_text_field($row['label'] ?? '');
        /* label identical to the key is no rename — keep option clean */
        if (mb_strtolower(trim($label)) === mb_strtolower(trim($row['name']))) $label = '';
        $icon_url = esc_url_raw(trim((string) ($row['icon_url'] ?? '')));
        $hide     = !empty($row['hide']) ? '1' : '';
        $out[] = array('name' => sanitize_text_field($row['name']), 'label' => $label, 'color' => $color, 'icon' => $icon, 'icon_url' => $icon_url, 'order' => $order, 'hide' => $hide);
    }
    return $out;
}
/** Built-in category defaults (mirrors the archive template's map). */
function ee_help_cat_defaults() {
    return array(
        'overview'            => array('#19335D', 8),
        'adding leads'        => array('#DE6E30', 0),
        'managing leads'      => array('#4CAF50', 1),
        'activities tracking' => array('#673AB7', 2),
        'messaging leads'     => array('#2196F3', 10),
        'email leads'         => array('#E91E63', 9),
        'calling leads'       => array('#DE6E30', 3),
        'lead follow ups'     => array('#9C27B0', 4),
        'bulk activities'     => array('#19335D', 5),
        'admin settings'      => array('#009688', 6),
        'my account'          => array('#673AB7', 7),
    );
}
add_action('admin_init', function () {
    register_setting('ee_help_page_group', 'ee_help_page_settings', array('sanitize_callback' => 'ee_help_page_sanitize'));
    register_setting('ee_help_page_group', 'ee_help_categories', array('sanitize_callback' => 'ee_help_cats_sanitize'));
});
add_action('admin_menu', function () {
    add_submenu_page('edit.php?post_type=help', 'Help Page Settings', '🎨 Page Settings', 'manage_options', 'ee-help-page', 'ee_help_page_render');
});
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'help_page_ee-help-page') wp_enqueue_media();
});
function ee_help_page_render() {
    if (!current_user_can('manage_options')) return;
    $o = get_option('ee_help_page_settings', array());
    $v = function ($k, $d = '') use ($o) { return isset($o[$k]) && $o[$k] !== '' ? $o[$k] : $d; };
    ?>
    <div class="wrap">
        <h1>🎨 Help Center Page Settings</h1>
        <p style="max-width:720px;color:#475569">Everything on <a href="<?php echo esc_url(home_url('/help/')); ?>" target="_blank"><code>/help/</code></a> that isn't an article is edited here — headings, search text, hero image or video, an optional extra section (text, images, videos), and the support band. Leave any field blank to use the default. Articles themselves are managed under <strong>Help → All Help</strong>.</p>
        <form method="post" action="options.php">
            <?php settings_fields('ee_help_page_group'); ?>
            <h2>Hero (top blue band)</h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th><label>Main heading</label></th>
                    <td><input type="text" class="large-text" name="ee_help_page_settings[hero_title]" value="<?php echo esc_attr($v('hero_title')); ?>" placeholder="ExtraaEdge CRM Help Center"></td>
                </tr>
                <tr>
                    <th><label>Sub-heading</label></th>
                    <td><textarea class="large-text" rows="2" name="ee_help_page_settings[hero_sub]" placeholder="Find guides and answers to help you manage leads and grow your admissions."><?php echo esc_textarea($v('hero_sub')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label>Search box placeholder</label></th>
                    <td><input type="text" class="regular-text" name="ee_help_page_settings[search_ph]" value="<?php echo esc_attr($v('search_ph')); ?>" placeholder="Search for help articles..."></td>
                </tr>
                <tr>
                    <th><label>Hero image (right side)</label></th>
                    <td>
                        <input type="url" class="regular-text" id="ee-help-hero-img" name="ee_help_page_settings[hero_image]" value="<?php echo esc_attr($v('hero_image')); ?>" placeholder="https://...jpg / .png">
                        <button type="button" class="button" id="ee-help-hero-img-pick">📁 Choose from Media Library</button>
                        <p class="description">Shown in the glass tile on the right of the hero (desktop). Blank = default book icon.</p>
                    </td>
                </tr>
                <tr>
                    <th><label>Hero video (right side)</label></th>
                    <td>
                        <input type="url" class="regular-text" name="ee_help_page_settings[hero_video]" value="<?php echo esc_attr($v('hero_video')); ?>" placeholder="https://www.youtube.com/watch?v=... or https://...mp4">
                        <p class="description">YouTube, Vimeo, or a direct .mp4 link. When set, the video replaces the hero image/icon.</p>
                    </td>
                </tr>
            </table>
            <h2>Extra section (text, images &amp; videos)</h2>
            <p class="description" style="margin-bottom:8px">Optional. Appears between the quick-link tiles and the category cards. Use <strong>Add Media</strong> to insert images or upload a video; paste a YouTube link on its own line to embed it.</p>
            <?php wp_editor(
                isset($o['extra_content']) ? $o['extra_content'] : '',
                'eehelpextra',
                array('textarea_name' => 'ee_help_page_settings[extra_content]', 'media_buttons' => true, 'textarea_rows' => 10)
            ); ?>
            <h2>Category look &amp; order</h2>
            <p class="description" style="margin-bottom:8px">Name, color, icon, and position of every category card on /help/. <strong>Shown as</strong> renames the category everywhere on the site (cards, tiles, article pages) — articles keep using the original name in their Category field, so nothing breaks. New categories appear here automatically after you publish an article in them.</p>
            <?php
            /* categories currently in use, in the order the page shows them */
            $hlp_known = array();
            foreach (get_posts(array('post_type' => 'help', 'post_status' => 'publish', 'numberposts' => -1, 'orderby' => 'menu_order date', 'order' => 'ASC')) as $hp) {
                $hc = trim((string) get_post_meta($hp->ID, '_help_category', true));
                if ($hc === '') $hc = 'General';
                if (!in_array($hc, $hlp_known, true)) $hlp_known[] = $hc;
            }
            $hlp_saved = array();
            foreach ((array) get_option('ee_help_categories', array()) as $r) {
                if (!empty($r['name'])) $hlp_saved[mb_strtolower(trim($r['name']))] = $r;
            }
            /* saved-only categories (created here, no articles yet) join the list */
            $hlp_all = $hlp_known;
            foreach ($hlp_saved as $sk => $sr) {
                $hit = false;
                foreach ($hlp_all as $n) { if (mb_strtolower(trim($n)) === $sk) { $hit = true; break; } }
                if (!$hit) $hlp_all[] = $sr['name'];
            }
            $hlp_defaults = ee_help_cat_defaults();
            $hlp_accents  = array('#DE6E30', '#4CAF50', '#673AB7', '#2196F3', '#E91E63', '#009688', '#9C27B0', '#19335D');
            $hlp_icon_lbl = array('Add person', 'Team', 'Bar chart', 'Phone', 'Calendar check', 'Layers', 'Settings gear', 'Person', 'Grid', 'Mail', 'Chat bubble');
            /* show rows in effective front-end order */
            $hlp_ord = array();
            foreach ($hlp_all as $hi => $hn) {
                $sv = $hlp_saved[mb_strtolower(trim($hn))] ?? null;
                $hlp_ord[$hn] = ($sv && $sv['order'] !== '') ? (int) $sv['order'] : 1000 + $hi;
            }
            usort($hlp_all, function ($a, $b) use ($hlp_ord) { return $hlp_ord[$a] <=> $hlp_ord[$b]; });
            ?>
            <table class="widefat striped" style="max-width:1100px;margin-bottom:12px" id="hlpCatTable">
                <thead><tr><th style="min-width:150px">Category</th><th style="width:170px">Shown as (rename)</th><th style="width:150px">Color</th><th style="width:150px">Icon</th><th style="width:260px">Custom icon image (optional)</th><th style="width:70px">Order</th><th style="width:90px">Remove</th></tr></thead>
                <tbody>
                <?php foreach ($hlp_all as $hi => $hn) :
                    $key    = mb_strtolower(trim($hn));
                    $sv     = $hlp_saved[$key] ?? array();
                    $in_use = in_array($hn, $hlp_known, true);
                    $dc  = $hlp_defaults[$key][0] ?? $hlp_accents[$hi % count($hlp_accents)];
                    $di  = $hlp_defaults[$key][1] ?? ($hi % 11);
                    $col = !empty($sv['color']) ? $sv['color'] : $dc;
                    $ico = (isset($sv['icon']) && $sv['icon'] !== '') ? (int) $sv['icon'] : (int) $di;
                    $ord = (isset($sv['order']) && $sv['order'] !== '') ? (int) $sv['order'] : $hi + 1;
                    $lbl = !empty($sv['label']) ? $sv['label'] : '';
                    $iur = !empty($sv['icon_url']) ? $sv['icon_url'] : '';
                    $hid = !empty($sv['hide']);
                ?>
                <tr>
                    <td>
                        <?php if ($in_use) : ?>
                            <strong><?php echo esc_html($hn); ?></strong>
                            <input type="hidden" name="ee_help_categories[<?php echo (int) $hi; ?>][name]" value="<?php echo esc_attr($hn); ?>">
                        <?php else : ?>
                            <input type="text" name="ee_help_categories[<?php echo (int) $hi; ?>][name]" value="<?php echo esc_attr($hn); ?>" style="width:100%">
                            <small style="color:#8a8f9b">new — no articles yet</small>
                        <?php endif; ?>
                    </td>
                    <td><input type="text" name="ee_help_categories[<?php echo (int) $hi; ?>][label]" value="<?php echo esc_attr($lbl); ?>" placeholder="<?php echo esc_attr($hn); ?>" style="width:100%"></td>
                    <td style="white-space:nowrap">
                        <input type="color" class="hlp-col" name="ee_help_categories[<?php echo (int) $hi; ?>][color]" value="<?php echo esc_attr($col); ?>" style="width:44px;height:30px;padding:2px;cursor:pointer;vertical-align:middle">
                        <input type="text" class="hlp-colhex" value="<?php echo esc_attr($col); ?>" maxlength="7" style="width:72px;vertical-align:middle" aria-label="Hex color code">
                    </td>
                    <td>
                        <select name="ee_help_categories[<?php echo (int) $hi; ?>][icon]">
                            <?php foreach ($hlp_icon_lbl as $ii => $il) : ?>
                                <option value="<?php echo (int) $ii; ?>" <?php selected($ico, $ii); ?>><?php echo esc_html($il); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="white-space:nowrap">
                        <input type="url" name="ee_help_categories[<?php echo (int) $hi; ?>][icon_url]" value="<?php echo esc_attr($iur); ?>" placeholder="https://...png / .svg" style="width:calc(100% - 40px);vertical-align:middle">
                        <button type="button" class="button hlp-ico-pick" title="Choose from Media Library" style="vertical-align:middle">📁</button>
                    </td>
                    <td><input type="number" name="ee_help_categories[<?php echo (int) $hi; ?>][order]" value="<?php echo (int) $ord; ?>" min="1" max="99" style="width:60px"></td>
                    <td style="text-align:center">
                        <?php if ($in_use) : ?>
                            <label title="Hide this category (and its articles) from the /help/ page — articles stay published">
                                <input type="checkbox" name="ee_help_categories[<?php echo (int) $hi; ?>][hide]" value="1" <?php checked($hid); ?>> Hide
                            </label>
                        <?php else : ?>
                            <button type="button" class="button hlp-row-del" title="Delete this category">🗑</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p style="margin:0 0 4px">
                <button type="button" class="button" id="hlpAddCat">➕ Add new category</button>
                <span class="description" style="margin-left:8px">New categories show on /help/ right away (with "coming soon") and appear in every article's Category suggestions. When a custom icon image is set, it replaces the built-in icon. 🗑 deletes a new category; <strong>Hide</strong> removes an article-backed category from /help/ without touching its articles (untick to bring it back). Save to apply.</span>
            </p>

            <h2>Other texts</h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th><label>"Coming soon" message (shown when there are no articles)</label></th>
                    <td><input type="text" class="large-text" name="ee_help_page_settings[empty_soon]" value="<?php echo esc_attr($v('empty_soon')); ?>" placeholder="Help articles are coming soon."></td>
                </tr>
                <tr>
                    <th><label>"No results" message (shown when a search finds nothing)</label></th>
                    <td><input type="text" class="large-text" name="ee_help_page_settings[empty_search]" value="<?php echo esc_attr($v('empty_search')); ?>" placeholder="No articles match your search."></td>
                </tr>
            </table>

            <details style="margin:18px 0 24px;max-width:820px;background:#fff;border:1px solid #dcdcde;border-radius:8px;padding:14px 18px">
                <summary style="cursor:pointer;font-weight:600;font-size:14px">🏷️ Advanced: small labels on both help pages (optional — for other languages or different wording)</summary>
                <p class="description" style="margin:10px 0 4px">Leave blank to keep the default English text. <code>{count}</code> is replaced with the live number.</p>
                <table class="form-table" role="presentation">
                    <?php
                    $hlp_labels = array(
                        'empty_soon2'    => array('Second line under "Coming soon"',      'Meanwhile, our team is one click away.'),
                        'empty_search2'  => array('Second line under "No results"',       'Try a different word, or browse the categories above.'),
                        'lbl_badge_one'  => array('Card badge (1 article)',               '{count} article'),
                        'lbl_badge_many' => array('Card badge (many articles)',           '{count} articles'),
                        'lbl_found_one'  => array('Search counter (1 result)',            '{count} article found'),
                        'lbl_found_many' => array('Search counter (many results)',        '{count} articles found'),
                        'lbl_home'       => array('Breadcrumb home (article page)',       'Help Center'),
                        'lbl_read'       => array('Reading-time chip suffix',             'min read'),
                        'lbl_updated'    => array('Updated chip prefix',                  'Updated'),
                        'lbl_onpage'     => array('"On this page" sidebar heading',       'On this page'),
                        'lbl_incat'      => array('Sidebar heading prefix ("In …")',      'In'),
                        'lbl_related'    => array('"Related Articles" sidebar heading',   'Related Articles'),
                        'lbl_all'        => array('"All help articles" link',             '← All help articles'),
                        'lbl_prev'       => array('Previous-article label',               '← Previous'),
                        'lbl_next'       => array('Next-article label',                   'Next →'),
                        'lbl_empty_cat'  => array('Empty-category card text',             'Articles coming soon.'),
                    );
                    foreach ($hlp_labels as $lk => $lv) : ?>
                    <tr>
                        <th style="padding:8px 10px 8px 0"><label style="font-weight:500"><?php echo esc_html($lv[0]); ?></label></th>
                        <td style="padding:8px 0"><input type="text" class="regular-text" name="ee_help_page_settings[<?php echo esc_attr($lk); ?>]" value="<?php echo esc_attr($v($lk)); ?>" placeholder="<?php echo esc_attr($lv[1]); ?>"></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </details>

            <h2>"Need more help?" band (bottom)</h2>
            <table class="form-table" role="presentation">
                <tr>
                    <th><label>Heading</label></th>
                    <td><input type="text" class="regular-text" name="ee_help_page_settings[support_title]" value="<?php echo esc_attr($v('support_title')); ?>" placeholder="Need more help?"></td>
                </tr>
                <tr>
                    <th><label>Text</label></th>
                    <td><textarea class="large-text" rows="2" name="ee_help_page_settings[support_text]" placeholder="If you can't find what you're looking for, please contact your administrator or reach out to our support team."><?php echo esc_textarea($v('support_text')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label>Button 1 (dark)</label></th>
                    <td>
                        <input type="text" name="ee_help_page_settings[b1_label]" value="<?php echo esc_attr($v('b1_label')); ?>" placeholder="Email Support">
                        <input type="url" class="regular-text" name="ee_help_page_settings[b1_url]" value="<?php echo esc_attr($v('b1_url')); ?>" placeholder="/contact-us/">
                    </td>
                </tr>
                <tr>
                    <th><label>Button 2 (outline)</label></th>
                    <td>
                        <input type="text" name="ee_help_page_settings[b2_label]" value="<?php echo esc_attr($v('b2_label')); ?>" placeholder="Live Chat">
                        <input type="url" class="regular-text" name="ee_help_page_settings[b2_url]" value="<?php echo esc_attr($v('b2_url')); ?>" placeholder="/book-demo/">
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Help Page'); ?>
        </form>

        <hr style="margin:28px 0">
        <h2>⚡ Starter articles (one click)</h2>
        <?php if (isset($_GET['seeded'])) : ?>
            <div class="notice notice-success" style="margin-left:0"><p>
                Created <strong><?php echo (int) $_GET['seeded']; ?></strong> new help article(s)<?php if (!empty($_GET['skipped'])) : ?>, skipped <strong><?php echo (int) $_GET['skipped']; ?></strong> that already existed<?php endif; ?>.
                <a href="<?php echo esc_url(home_url('/help/')); ?>" target="_blank">View /help/ →</a>
            </p></div>
        <?php endif; ?>
        <p style="max-width:720px;color:#475569">Creates the full ExtraaEdge CRM help library — 10 categories (Overview, Adding Leads, Managing Leads, Messaging Leads, Email Leads, Calling Leads, Lead Follow Ups, Bulk Activities, Admin Settings, My Account) with 31 articles including their real steps and screenshots — as published Help posts. Each article stays fully editable afterwards (text, images, videos) from Help → All Help. Articles that already have their own content are never overwritten, so this button is safe to press again.</p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="ee_help_seed">
            <?php wp_nonce_field('ee_help_seed'); ?>
            <?php submit_button('Create starter articles', 'secondary', 'submit', false); ?>
        </form>
    </div>
    <script>
    jQuery(function ($) {
        $('#ee-help-hero-img-pick').on('click', function (e) {
            e.preventDefault();
            var frame = wp.media({ title: 'Choose hero image', multiple: false, library: { type: 'image' } });
            frame.on('select', function () {
                $('#ee-help-hero-img').val(frame.state().get('selection').first().toJSON().url);
            });
            frame.open();
        });

        /* category icon image picker (per row) */
        $(document).on('click', '.hlp-ico-pick', function (e) {
            e.preventDefault();
            var $inp = $(this).closest('td').find('input[type="url"]');
            var frame = wp.media({ title: 'Choose category icon', multiple: false, library: { type: 'image' } });
            frame.on('select', function () {
                $inp.val(frame.state().get('selection').first().toJSON().url);
            });
            frame.open();
        });

        /* color picker <-> hex code text, both ways */
        $(document).on('input', '.hlp-col', function () {
            $(this).siblings('.hlp-colhex').val($(this).val());
        });
        $(document).on('input', '.hlp-colhex', function () {
            var v = $(this).val().trim();
            if (/^#[0-9a-fA-F]{6}$/.test(v)) $(this).siblings('.hlp-col').val(v);
        });

        /* add a brand-new category row */
        var hlpIdx = $('#hlpCatTable tbody tr').length;
        var hlpIcons = <?php echo wp_json_encode(array('Add person', 'Team', 'Bar chart', 'Phone', 'Calendar check', 'Layers', 'Settings gear', 'Person', 'Grid', 'Mail', 'Chat bubble')); ?>;
        $('#hlpAddCat').on('click', function () {
            var i = hlpIdx++;
            var opts = hlpIcons.map(function (l, n) { return '<option value="' + n + '">' + l + '</option>'; }).join('');
            $('#hlpCatTable tbody').append(
                '<tr>' +
                '<td><input type="text" name="ee_help_categories[' + i + '][name]" value="" placeholder="New category name" style="width:100%"><small style="color:#8a8f9b">new — no articles yet</small></td>' +
                '<td><input type="text" name="ee_help_categories[' + i + '][label]" value="" placeholder="(same as name)" style="width:100%"></td>' +
                '<td style="white-space:nowrap"><input type="color" class="hlp-col" name="ee_help_categories[' + i + '][color]" value="#DE6E30" style="width:44px;height:30px;padding:2px;cursor:pointer;vertical-align:middle"> <input type="text" class="hlp-colhex" value="#DE6E30" maxlength="7" style="width:72px;vertical-align:middle"></td>' +
                '<td><select name="ee_help_categories[' + i + '][icon]">' + opts + '</select></td>' +
                '<td style="white-space:nowrap"><input type="url" name="ee_help_categories[' + i + '][icon_url]" value="" placeholder="https://...png / .svg" style="width:calc(100% - 40px);vertical-align:middle"> <button type="button" class="button hlp-ico-pick" title="Choose from Media Library" style="vertical-align:middle">📁</button></td>' +
                '<td><input type="number" name="ee_help_categories[' + i + '][order]" value="' + i + '" min="1" max="99" style="width:60px"></td>' +
                '<td style="text-align:center"><button type="button" class="button hlp-row-del" title="Delete this category">🗑</button></td>' +
                '</tr>'
            );
        });

        /* delete a category row (new categories only; applies on Save) */
        $(document).on('click', '.hlp-row-del', function () {
            $(this).closest('tr').remove();
        });
    });
    </script>
    <?php
}
/**
 * Real ExtraaEdge CRM help content: category => list of [title, html].
 * Used by the one-click seeder; articles stay fully editable afterwards.
 */
function ee_help_seed_data() {
    $im = function ($f) {
        return '<figure class="hlp-shot"><img src="https://www.extraaedge.com/wp-content/uploads/' . $f . '" alt="" loading="lazy"></figure>';
    };
    return array(
        'Overview' => array(
            array('Lead List',
                '<p>Lead List section gives you access to all leads of your admission/sales funnel.</p>'
                . '<p><em>The funnel names / lead stages are customised as per your requirement.</em></p>'
                . '<p>From Lead List you will be able to:</p>'
                . '<ul><li>Jump on your admission funnel/sales funnel</li><li>Perform bulk tasks such as Send Email, Send SMS, Download leads, Refer a lead, etc.</li><li>Sort the list as per your requirement</li></ul>'
                . $im('2022/01/NXDhlXKKDu7KY_tpoIAB1dH66ibZBDqVVw.png')),
            array('Application List',
                '<p>Application List section gives you access to all leads who have filled up the application form on your website.</p>'
                . '<p>This section gives you a list of all leads which are in different stages of your application submission process.</p>'
                . '<p>The list helps you in further nurturing your leads based on their stage.</p>'
                . $im('2022/03/j6cXFn1hJGlz3pR9b_fUiluTYJa8nQITwg.png')),
            array('My Followups',
                '<p>You will be able to track all your followup activities. This will help you to quickly overview your Done, Missed and Planned activities in a selected date range.</p>'
                . '<ul><li>You will be able to add the next followup activity.</li><li>You will be able to update the lead status, add a followup comment, etc.</li></ul>'
                . '<p>We have added a few features which will help you in managing your followup activities:</p>'
                . '<ul><li>Add Followup</li><li>Pending Followups</li><li>Edit/Update Followups</li><li>Followup Notifications</li></ul>'
                . $im('2022/03/8Zb72ykNRBW9gKxFTikCP-rSEkDlwIWfwQ.png')
                . $im('2022/03/KceUXOuxGn6WPwXOvC9TBLSnea_kxKOCAA.png')),
            array('Marketing',
                '<p>Marketing section gives you a list of all your marketing campaigns.</p>'
                . '<p>From the Marketing section you will be able to:</p>'
                . '<ul><li>Review performance of all marketing campaigns</li><li>View the list of leads generated from the campaign</li><li>Edit the campaign</li><li>Stop the campaign</li></ul>'
                . $im('2022/03/9bgAs4lOqMHY8IUqohI_XT9i7rnpEtoo1w.png')),
            array('Fail Leads',
                '<p>While adding leads through bulk upload in the system, there might be chances of a few mistakes. You will find all such leads in this section with the reasons why these leads failed to get uploaded.</p>'
                . '<p>You need to do the corrections in your Excel file and re-upload the leads data using the bulk upload functionality.</p>'
                . '<p><strong>How this helps:</strong> This helps you find out the reasons for failure. Also, you know which leads are not part of your CRM.</p>'),
            array('Reports',
                '<p>We provide real-time analytics and customized reports. This provides information to make data-driven decisions. These reports include insights like:</p>'
                . '<ul><li>Conversion ratios</li><li>Team Performance</li><li>ROI on Marketing spend, and many more reports as per your requirement.</li></ul>'
                . '<p>Feel free to reach <a href="mailto:help@theextraaedge.com">help@theextraaedge.com</a> if you need a customized report.</p>'),
        ),
        'Adding Leads' => array(
            array('Quick Add Lead Form',
                '<p>Quick Add can be used to add a lead quickly in the CRM with minimum details. This helps counsellors capture leads while they are communicating with leads.</p>'
                . '<p>To add a lead, follow the steps below:</p>'
                . '<p><strong>Step 1:</strong> Click on the + icon from the top toolbar.</p>'
                . $im('2022/03/Fb-wHXc7vZLlOP2lX60doHGOzQT4zoUXig.png')
                . '<p><strong>Step 2:</strong> Fill up the Quick Add form. (Make sure you fill up all the mandatory fields.)</p>'
                . $im('2022/03/I2ZhEV-hUvZW35CDcMtucjvrQtzMYSA8Jw.png')
                . '<p><strong>Step 3:</strong> Click on <strong>Save and Add More</strong>.</p>'
                . '<p>While adding the lead, you can choose if you wish to send a welcome email and/or SMS to a lead.</p>'),
            array('Lead form',
                '<p>You can add a single lead using the Lead form. You need to have the required information of a lead with you.</p>'
                . '<p><strong>Step 1:</strong> Click on the + icon at the bottom left side of the screen.</p>'
                . $im('2022/03/CV7emiSL5S9eM8Kdx6twIGh6In4sbF-9Lg.png')
                . '<p><strong>Step 2:</strong> Fill up the lead details.</p>'
                . $im('2022/03/dgu2-kPFcjWphRfoNJeiE54uWZnX6XS0_w.png')
                . '<p><strong>Step 3:</strong> Click on <strong>ADD LEAD</strong>.</p>'),
            array('Bulk Upload',
                '<p>Leads come from various sources and you might be maintaining data in other systems like Excel files. You can upload your leads data into the CRM using the bulk upload function.</p>'
                . '<p><strong>Step 1:</strong> Click on the Bulk Upload icon at the bottom right of your screen, below the Add Lead icon.</p>'
                . '<p><strong>Step 2:</strong> Download the template (.CSV format). You need to add your data in the same format only.</p>'
                . '<p><strong>Step 3:</strong> Once the data is ready, add the required data in the Upload Leads panel.</p>'
                . $im('2022/03/FtGR5fSCiz-q0yAzpGK09VgVgbgwMgDP2Q-162x300.png')
                . '<p><strong>Step 4:</strong> Upload the file using the Choose File button.</p>'
                . '<p><strong>Step 5:</strong> Click on <strong>UPLOAD LEADS</strong>.</p>'),
            array('Direct lead flow from online sources',
                '<p>We help you integrate with all your online sources so that leads automatically flow into the system and we achieve zero leakage with faster response time.</p>'
                . '<p>Auto capturing helps you focus more on your conversions rather than managing your lead data manually.</p>'
                . '<p>We can integrate with various online channels like:</p>'
                . '<ul><li>Google Ads</li><li>Facebook</li><li>LinkedIn</li><li>Instagram</li><li>Website / Landing pages</li><li>Other sources like Justdial, Shiksha, Collegedunia, etc.</li></ul>'
                . '<p>Get in touch with us at <a href="mailto:help@theextraaedge.com">help@theextraaedge.com</a> if you wish to integrate your online sources with ExtraaEdge.</p>'),
            array('Leads FAQ',
                '<p><strong>Q: Can the leads be auto referred?</strong><br>A: Yes, leads can be auto referred as per your requirement. Request you to get in touch with us if you wish to refer leads automatically.</p>'
                . '<p><strong>Q: Will the message and call go from the same registered number?</strong><br>A: Yes, the call or message will go from the same registered number.</p>'
                . '<p><strong>Q: Apart from name, number and email ID, can we search for a lead?</strong><br>A: Please reach out to us at <a href="mailto:help@theextraaedge.com">help@theextraaedge.com</a> for details.</p>'
                . '<p><strong>Q: Can the welcome message be different for each course?</strong><br>A: Please reach out to us at <a href="mailto:help@theextraaedge.com">help@theextraaedge.com</a> for details.</p>'
                . '<p><strong>Q: Can I add more funnels?</strong><br>A: You can not add more funnels on your own. But we are here for you — reach out to us if you wish to add more funnels.</p>'
                . '<p><strong>Q: In Bulk Upload, can we change the template?</strong><br>A: No, you can not change the template.</p>'),
        ),
        'Managing Leads' => array(
            array('Search Lead',
                '<p>You can easily find your lead in your large database.</p>'
                . '<p><strong>Step 1:</strong> Type the Name, Number or Email ID of a lead in the search bar.</p>'
                . $im('2022/03/mFGf-j_bGVFwB05SprVsGpn-N9nyaz1noQ.png')
                . '<p><strong>Step 2:</strong> Click on the Search icon or just press the Enter key.</p>'),
            array('Update lead details',
                '<p>You can update or add more details of a lead whenever you need.</p>'
                . '<p><strong>Step 1:</strong> Click on the lead name.</p>'
                . $im('2022/03/B4bAGe5XWu6phsacBBS-z5EVzlipd7fM9A-300x55.png')
                . '<p><strong>Step 2:</strong> Update the lead details.</p>'
                . $im('2022/03/ElWhZJSEFd0KhCNDeK1Y5z58FmyVZcOzCA.png')
                . '<p><strong>Step 3:</strong> Click on <strong>UPDATE LEAD</strong>.</p>'),
            array('Refer a lead',
                '<p>A counselor can refer/transfer a lead to another counselor in the team.</p>'
                . '<p><strong>Step 1:</strong> Click on the three dots in the action menu.</p>'
                . '<p><strong>Step 2:</strong> Click on <strong>Refer Lead</strong>.</p>'
                . $im('2022/03/gyVPat-Lp3Q6NO0IZHIGWkQjah7WlUPk_A.png')
                . '<p><strong>Step 3:</strong> Add to whom you want to refer and your comments.</p>'
                . $im('2022/03/6NZto0cYFqiolnKIKd60JF_zh_1wyLjrSw.png')
                . '<p><strong>Step 4:</strong> Click on <strong>REFER</strong>.</p>'),
            array('Update lead status',
                '<p>As a lead moves ahead in your admission process, you can change the status of the lead. This gives you a clear picture of your admissions.</p>'
                . '<p><strong>Step 1:</strong> Click on Status in the lead information section.</p>'
                . $im('2022/03/n3l2rk8ErSk0NXVxag9JW-vn4hCFDl2mKQ.png')
                . '<p><strong>Step 2:</strong> Select the Status and select the Reason.</p>'
                . $im('2022/03/aW0zzxT_NoxEXAHq0l39VMeldChEwOeWcw.png')
                . '<p><strong>Step 3:</strong> Click on <strong>UPDATE</strong>.</p>'),
            array('Activities Tracking',
                '<p>Good news — you can keep track of all activities done by the counselor and lead responses in one place.</p>'
                . '<p>You will be able to track:</p>'
                . '<ul><li>Counselor Followups</li><li>Lead Response</li><li>Lead re-inquired count</li></ul>'
                . $im('2022/03/Yf2QiFbFhfODX27Sqp4AdAjQ1gq7kahccA.png')
                . '<h3>Counselor Followups</h3><p>You have access to all activities the counselor has done for the lead.</p>'
                . $im('2022/03/oyiqe8f3cC9THLAFrb-WgDyha3oOXgyzoA.png')
                . '<h3>Lead Response</h3>'
                . $im('2022/03/mXbJU-XUkh1MLaTe9r9b8ZvIfRLVKyElDA.png')
                . '<h3>Lead Re-Inquired Count</h3>'
                . $im('2022/03/tGOp5jfx5THTEOhvO7cQ-KoP-s3XPR30dw.png')),
        ),
        'Messaging Leads' => array(
            array('Send WhatsApp message to a lead',
                '<p>You will be able to send WhatsApp messages as well.</p>'
                . '<p><strong>Step 1:</strong> Click on the WhatsApp icon from the action menu.</p>'
                . '<p><strong>Step 2:</strong> This redirects you to Web WhatsApp. You need to keep Web WhatsApp active.</p>'
                . '<p><strong>Step 3:</strong> You will be able to continue the conversation with a lead without even adding the lead to your phone contact list.</p>'),
            array('Send SMS to a lead',
                '<p>If you want to send an SMS to your lead, follow the steps below:</p>'
                . '<p><strong>Step 1:</strong> Click on the lead\'s mobile number.</p>'
                . $im('2022/03/DgrwP3CH4muuyeskC3DiobFWjYqphu7Cxg.png')
                . '<p><strong>Step 2:</strong> An SMS panel will open on the right-hand side. You need to select:</p>'
                . '<ul><li>Who you want to send to</li><li>A ready message from a template, or type your custom message</li><li>Promotional or Transactional route</li><li>Sender ID</li></ul>'
                . $im('2022/03/cWR7OqSxmdWZRg2vSoR6_A_ftTFGWbgXng.png')
                . '<p><strong>Step 3:</strong> Click on <strong>SEND SMS</strong>.</p>'),
            array('Send SMS to all leads',
                '<p>You will be able to send SMS to all leads of the list you filtered or created.</p>'
                . '<p><strong>Step 1:</strong> Click on the Send SMS To All icon.</p>'
                . $im('2022/03/xpnlAuvbtV5Cj8nso9g1fP3cYOz6y2d7FA.png')
                . '<p><strong>Step 2:</strong> Click on Send SMS from the confirmation dialog box.</p>'
                . $im('2022/03/SD3BjmgTF8Bnz9F8dBsjYZe8tyFapFwqXg.png')
                . '<p><strong>Step 3:</strong> An SMS panel will open on the right-hand side.</p>'
                . '<ul><li>Select whom you wish to send the message</li><li>Select the message template or create your own message</li><li>Select Promotional or Transactional route</li><li>Select Sender ID</li></ul>'
                . $im('2022/03/pH03INyxrJYjLKc77AqphlygBa8AmXhtTg.png')
                . '<p><strong>Step 4:</strong> Click on <strong>SEND SMS</strong>.</p>'),
        ),
        'Email Leads' => array(
            array('Send Email to a lead',
                '<p>If you want to send an email, follow the steps below:</p>'
                . '<p><strong>Step 1:</strong> Click on the lead\'s email address.</p>'
                . $im('2022/03/t2bKA5_wOUGXZyJGbz4DZtr9cRmQc7W1VQ.png')
                . '<p><strong>Step 2:</strong> An Email panel will open on the right-hand side. You need to:</p>'
                . '<ul><li>Select which email ID you want to send to</li><li>Choose an email template</li><li>Update the subject line if you wish</li><li>Review the email by clicking on the email icon below the subject</li></ul>'
                . '<p><strong>Step 3:</strong> Click on <strong>SEND EMAIL</strong>.</p>'),
            array('Send Email to all leads',
                '<p>You can send an email to all the leads which are part of the list you selected/created.</p>'
                . '<p><strong>Step 1:</strong> Click on the Send Email To All icon.</p>'
                . $im('2022/03/CfUQ-hh8OchUluQT6zfa9T2f9tgPRL_4PQ.png')
                . '<p><strong>Step 2:</strong> Click on Send Email from the confirmation dialog box.</p>'
                . $im('2022/03/atMLDKyzyxFevXbLBVBdiVoTLHswSmpovA.png')
                . '<p><strong>Step 3:</strong> An Email panel will open on the right-hand side.</p>'
                . '<ul><li>Select whom you wish to send the email</li><li>Select the Email Template</li><li>Update the Subject line</li></ul>'
                . $im('2022/03/gcHv4LzV-8XVVJ5smbbglpl-ZL4UXu3FNA.png')),
        ),
        'Calling Leads' => array(
            array('Calling using IVR',
                '<p>If your account and agent ID are mapped in CRM settings, you will be able to call a lead from the CRM.</p>'
                . '<p><strong>Step 1:</strong> Click on the Call icon from the action menu.</p>'
                . $im('2022/03/LFOzCvaxdGQu7wmpkhOIeaSDr9mLvMyNxw.png')
                . '<p><strong>Step 2:</strong> Click on Yes to proceed with the call. The call will be automatically connected from the device to that lead.</p>'
                . $im('2022/03/EyyT24_MGDbviWVf1LTo19D98PCOP4LCDQ.png')),
            array('Calling using ExtraaEdge Web Application',
                '<p>You can call your leads from the ExtraaEdge Web Application. This call will be connected through your mobile device.</p>'
                . '<p><strong>Please note:</strong> You need to install the ExtraaEdge Mobile application and you must be logged in to access this functionality.</p>'
                . '<p><strong>Step 1:</strong> Click on the Call icon from the action menu.</p>'
                . $im('2022/03/d6__2jxjTjn9p8kLyNeRVjwR_V2TXhP-Jg.png')
                . '<p><strong>Step 2:</strong> Click on Yes to proceed with the call. The call will be automatically connected from the device to that lead.</p>'),
        ),
        'Lead Follow Ups' => array(
            array('Add Followup',
                '<p>While working on various leads at a time, it may be difficult for a counselor to remember the next followup activity for a lead. With the help of the Add Followup function, you will be able to add the next activity.</p>'
                . '<p><strong>Step 1:</strong> Click on the three dots in the action menu of the lead.</p>'
                . '<p><strong>Step 2:</strong> Click on <strong>Add Followup</strong>.</p>'
                . $im('2022/03/0jOwf2kR00QfqEbb2D02dOqPCOy-i-r0Sg.png')
                . '<p><strong>Step 3:</strong> Add followup details, like Followup type, Next Action Date and Comments.</p>'
                . $im('2022/03/RijDtgGTgxY6Pd8dZW0Acx-VHft60Ow4rQ.png')
                . '<p><strong>Step 4:</strong> Click on <strong>ADD FOLLOWUP</strong>.</p>'),
            array('Pending Followup',
                '<p>We will remind you about your missed followup activities. On the top bar, you will find the number of pending activities.</p>'
                . '<p><strong>Step 1:</strong> Click on the bell icon.</p>'
                . $im('2022/03/yfAqsLcYtnhKwKyxOlDrjc-4bcr40UdicQ.png')
                . '<p><strong>Step 2:</strong> You will get a list of all pending activities with all details.</p>'
                . $im('2022/03/v7AS5WQl3-oB1Th5OsiX5iooSzEd0NQ7cA.png')
                . '<ul><li>Click on the lead name if you wish to update it.</li><li>Click on the date if you wish to update the followup activity.</li></ul>'),
        ),
        'Bulk Activities' => array(
            array('Sort Leads',
                '<p>The Sort function helps you rearrange the list as per your preference. There are 4 ways in which you can sort your leads:</p>'
                . '<ul><li>Creation date</li><li>Modification date</li><li>Next action date</li><li>Re-enquiry date</li></ul>'
                . '<p><strong>Step 1:</strong> Click on the Sort icon.</p>'
                . '<p><strong>Step 2:</strong> Select the sorting criteria.</p>'
                . $im('2022/03/tod2e9FAn9t3fcFSGd5BpPYuQN152go9QQ.png')),
            array('Download Leads',
                '<p>You will be able to download leads in Excel format.</p>'
                . '<p><strong>Step 1:</strong> Click on the Download All Leads icon.</p>'
                . $im('2022/03/2df3Ih-47pQX-JZszXqSHynX3Wbpn_jLDQ.png')
                . '<p><strong>Step 2:</strong> Click on Download from the confirmation box.</p>'
                . $im('2022/03/7d8FojiE6iJd2b3SHfU-U7GojT68wIExwA.png')
                . '<p>You will receive an email with the lead data, and you will get a confirmation notification.</p>'
                . $im('2022/03/sjgevGsLLMwmxAER99GHjVhYP5UiZdg4KQ.png')),
            array('Refer All Leads',
                '<p>You can refer all leads of a list to another counselor in your team.</p>'
                . '<p><strong>Step 1:</strong> Click on the Refer All Leads icon.</p>'
                . $im('2022/03/XKwJ2_3ReHBf5rIYAfMqrHOzwvjb2nwCrg.png')
                . '<p><strong>Step 2:</strong> Click on Refer from the confirmation dialog box.</p>'
                . $im('2022/03/X8YeEY1TKZ1wcz9HuXKLCc_M84qlKOCu-A.png')
                . '<p><strong>Step 3:</strong> Select the user you wish to refer to and add a comment.</p>'
                . $im('2022/03/ZmsTPqo2CIagbIwRKI2Dhhl6Xx72sRA_oA.png')
                . '<p><strong>Step 4:</strong> Click on <strong>REFER</strong>.</p>'),
            array('Filter Leads',
                '<p>You can apply multiple filters as per your requirement.</p>'
                . '<p><strong>Step 1:</strong> Click on the Filters icon.</p>'
                . $im('2022/03/BDpVs9o9A-DKRY7pN8Bbjo_pzE-e7nED5w.png')
                . '<p><strong>Step 2:</strong> The filter panel will open. Apply your filters.</p>'
                . $im('2022/03/2K5wCetEvP4NUWuTSiex3DMHp_cmv7h_Fg.png')
                . '<p><strong>Step 3:</strong> Click on <strong>APPLY FILTER</strong>.</p>'
                . '<p>Also, you can save this list for future reference. To save, click on <strong>Save Filter List</strong>.</p>'),
        ),
        'Admin Settings' => array(
            array('Add new email templates',
                '<p>If you are an admin, you will be able to add a new email template.</p>'
                . '<p><strong>Step 1:</strong> Click on the Settings tab.</p>'
                . '<p><strong>Step 2:</strong> Click on the Email Templates tab.</p>'
                . '<p><strong>Step 3:</strong> Click on the Add Email Template icon at the bottom right.</p>'
                . '<p><strong>Step 4:</strong> An email builder popup will appear to create an email template.</p>'
                . '<ul><li>You need to give a name to the template and add an email subject line.</li><li>You can use variables to add dynamic details in the email.</li><li>You can add an attachment to the email.</li><li>Once you are ready with the email, you can test the template by sending the email to your own email ID.</li></ul>'
                . '<p><strong>Step 5:</strong> If everything is as per your expectations, click on <strong>PUBLISH</strong>.</p>'
                . '<p>You can use this template as you need — to send an email to a lead or in your marketing campaigns.</p>'),
        ),
        'My Account' => array(
            array('Forgot Password',
                '<p>Can\'t remember your password? No worries — it\'s easy to reset your password.</p>'
                . '<p><strong>Step 1:</strong> Go to your login page.</p>'
                . '<p><strong>Step 2:</strong> Click on Update/Forgot Password.</p>'
                . '<p><strong>Step 3:</strong> Type your email ID and click on <strong>SUBMIT</strong>.</p>'
                . '<p><strong>Step 4:</strong> Check your inbox. You will receive an email with a reset password link.</p>'
                . '<p><strong>Step 5:</strong> Click on the link to set a new password. You can use this new password to access your ExtraaEdge account.</p>'),
        ),
    );
}
add_action('admin_post_ee_help_seed', function () {
    if (!current_user_can('manage_options')) wp_die('Not allowed');
    check_admin_referer('ee_help_seed');
    /* existing titles → update category/order; fill content only if still placeholder */
    $existing = array();
    foreach (get_posts(array('post_type' => 'help', 'post_status' => 'any', 'numberposts' => -1)) as $p) {
        $existing[mb_strtolower(trim($p->post_title))] = $p;
    }
    $created = 0;
    $skipped = 0;
    $order   = 0;
    foreach (ee_help_seed_data() as $cat => $articles) {
        foreach ($articles as $art) {
            list($title, $html) = $art;
            $order++;
            $key = mb_strtolower($title);
            if (isset($existing[$key])) {
                $p = $existing[$key];
                update_post_meta($p->ID, '_help_category', $cat);
                wp_update_post(array('ID' => $p->ID, 'menu_order' => $order));
                /* placeholder from an earlier seed run → replace with real content */
                if (strpos($p->post_content, 'Content coming soon') !== false) {
                    wp_update_post(array('ID' => $p->ID, 'post_content' => $html));
                    $created++;
                } else {
                    $skipped++;
                }
                continue;
            }
            $pid = wp_insert_post(array(
                'post_type'    => 'help',
                'post_status'  => 'publish',
                'post_title'   => $title,
                'post_content' => $html,
                'menu_order'   => $order,
            ));
            if ($pid && !is_wp_error($pid)) {
                update_post_meta($pid, '_help_category', $cat);
                update_post_meta($pid, '_help_difficulty', 'beginner');
                $created++;
            }
        }
    }
    wp_safe_redirect(add_query_arg(array('post_type' => 'help', 'page' => 'ee-help-page', 'seeded' => $created, 'skipped' => $skipped), admin_url('edit.php')));
    exit;
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
        if (function_exists('ee_pb_pages_in_category')) {
            foreach (ee_pb_pages_in_category('solutions') as $bp) {
                $cache['admission'][] = array('title' => $bp['title'], 'desc' => $bp['short_desc'] !== '' ? $bp['short_desc'] : $bp['desc'], 'url' => $bp['url'], 'icon' => 'file');
            }
        }
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
    if (function_exists('ee_pb_pages_in_category')) {
        foreach (ee_pb_pages_in_category('solutions') as $bp) {
            $cache['admission'][] = array('title' => $bp['title'], 'desc' => $bp['short_desc'] !== '' ? $bp['short_desc'] : $bp['desc'], 'url' => $bp['url'], 'icon' => 'file');
        }
    }
    return $cache;
}

/* ═════════════════════════════════════════════════════════════
 * 🎨 SITE EDITOR — single parent menu for every non-coder page
 * Adds one top-level item (priority 1, so it runs first) under which
 * all of our custom admin pages register themselves as submenus.
 * ═════════════════════════════════════════════════════════════ */
add_action('admin_menu', function () {
    add_menu_page(
        'ExtraaEdge Site Editor',          // page title
        '🎨 Site Editor',                  // sidebar label
        'manage_options',
        'ee-site',
        'ee_site_editor_welcome',
        'dashicons-art',
        3                                  // sit just under "Dashboard"
    );
    add_submenu_page('ee-site', 'Welcome', '👋 Welcome / Quick start', 'manage_options', 'ee-site', 'ee_site_editor_welcome');
}, 1);

function ee_site_editor_welcome() {
    /* Emoji-free output: strip pictographs from everything this screen
       prints so no converted-image squares can appear. */
    ob_start(function ($html) { return ee_strip_admin_emoji_html($html); });
    $cards = array(
        array('home',      '🏠', 'Home Page',          'Hero copy, logos, sections, CTAs',                        admin_url('admin.php?page=ee-home-editor')),
        array('hf',        '🧱', 'Header &amp; Footer','Book Demo, Company menu, social, copyright',              admin_url('admin.php?page=ee-header-footer')),
        array('blog-nav',  '🧭', 'Blog · Quick Nav',   'Floating side-nav on every blog post',                    admin_url('admin.php?page=ee-quick-nav')),
        array('blog-form', '📥', 'Blog · Lead Form',   'Inline lead form shown inside blog posts',                admin_url('admin.php?page=ee-blog-form')),
        array('sol',       '🧩', 'Solutions Page',     'Cards across Admission / Study Abroad / Recruitment',     admin_url('admin.php?page=ee-solutions')),
        array('res',       '🧰', 'Resources Page',     'Header dropdown + /resources/ cards',                     admin_url('admin.php?page=ee-resources-menu')),
        array('cust',      '👥', 'Customer Stories',   'Cards on /customer-success-stories/, video + thumbnails',                admin_url('admin.php?page=ee-customers')),
        array('prod',      '🛍', 'Products Menu',      'Header → Products dropdown banners',                      admin_url('admin.php?page=ee-products-menu')),
        array('seo',       '🌐', 'SEO & Tracking',     'GA4, Tag Manager, sitewide tracking scripts',             admin_url('options-general.php?page=ee-tracking')),
        array('ebook',     '📚', 'E-books',            'Manage every white-paper / e-book page',                  admin_url('edit.php?post_type=ebook')),
        array('blog',      '📝', 'Blog Posts',         'Write, edit, schedule articles',                          admin_url('edit.php')),
    );
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:12px;font-size:26px;margin:14px 0 4px;">
            <span style="font-size:32px;">🎨</span> Site Editor
        </h1>
        <p class="description" style="font-size:14px;max-width:780px;line-height:1.6;margin:0 0 26px;">
            Every page on the site that you can edit without touching code. Click a card to jump to its editor.
        </p>
        <style>
            .ee-site-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:14px;margin-top:8px;max-width:1100px;}
            .ee-site-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:18px 20px;text-decoration:none;color:#1d2327;transition:transform .2s,box-shadow .2s,border-color .2s;display:flex;gap:14px;align-items:flex-start;}
            .ee-site-card:hover{transform:translateY(-2px);box-shadow:0 6px 18px rgba(25,51,93,.1);border-color:#DE6E30;color:#1d2327;}
            .ee-site-card .ico{font-size:28px;line-height:1;flex-shrink:0;background:#fff8f1;border:1px solid #fde7d3;width:52px;height:52px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
            .ee-site-card h3{margin:0 0 4px;font-size:14.5px;font-weight:700;color:#19335D;}
            .ee-site-card p{margin:0;font-size:12.5px;color:#5b6678;line-height:1.5;}
            .ee-site-help{background:#fff8f1;border:1px solid #fde7d3;border-radius:8px;padding:14px 18px;margin:24px 0 0;max-width:1100px;color:#7c2d12;font-size:13px;line-height:1.6;}
            .ee-site-help strong{color:#19335D;}
        </style>
        <div class="ee-site-grid">
            <?php foreach ($cards as $c): ?>
                <a class="ee-site-card" href="<?php echo esc_url($c[4]); ?>">
                    <span class="ico"><?php echo esc_html($c[1]); ?></span>
                    <span>
                        <h3><?php echo esc_html($c[2]); ?></h3>
                        <p><?php echo esc_html($c[3]); ?></p>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="ee-site-help">
            <strong>💡 Tip:</strong> Each of these editors lives as a sub-menu under <strong>🎨 Site Editor</strong> on the left.
            You can also reach <strong>🌐 SEO &amp; Tracking</strong> from <strong>Settings</strong>, and the
            <strong>🏠 Home Page</strong> editor from there too — but everything is one click away from this welcome screen.
        </div>
    </div>
    <?php
}

/* Top-level admin menu — "🧩 Solutions" — lets the non-coder add / edit
   rows in any of the three columns without touching code. */
add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Solutions', '🧩 Solutions Page', 'manage_options', 'ee-solutions', 'ee_solutions_render_admin');
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

/* Top-level admin menu — 🧰 Resources Menu */
function ee_get_resources_menu_items() {
    $items = get_option('ee_resources_menu_items', null);
    if (is_array($items) && !empty($items)) {
        /* Case Studies is retired from the Resources menu - drop it from
           admin-saved menus too (header dropdown + footer both render this list). */
        $items = array_values(array_filter($items, function ($it) {
            return stripos(($it['title'] ?? '') . ' ' . ($it['url'] ?? ''), 'case-stud') === false
                && stripos(($it['title'] ?? ''), 'case stud') === false;
        }));
        /* The /news/ listing must always be reachable from the header dropdown
           and the footer Resources column, even if an admin-saved menu predates it. */
        $has_news = false;
        foreach ($items as $it) {
            if (stripos(($it['title'] ?? '') . ' ' . ($it['url'] ?? ''), 'news') !== false) { $has_news = true; break; }
        }
        if (!$has_news) {
            $news = array('title' => 'News & Media', 'url' => home_url('/news/'), 'desc' => 'Get up to speed with the latest news about ExtraaEdge.', 'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/bullhorn.svg', 'color_a' => '#DC2626', 'color_b' => '#FB7185');
            array_splice($items, max(0, count($items) - 1), 0, array($news));
        }
        return $items;
    }
    return array(
        array('title' => 'Blogs',        'url' => home_url('/blog/'),                          'desc' => 'Discover the latest admissions nuggets to improve your admissions process efficiency.',  'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/newspaper.svg',        'color_a' => '#DE6E30', 'color_b' => '#F7B267'),
        array('title' => 'Ebooks',       'url' => home_url('/ebooks/'),                        'desc' => 'Get the industry-relevant guides that will help you scale your admissions.',              'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/book-open.svg',        'color_a' => '#19335D', 'color_b' => '#3E6BB0'),
        array('title' => 'Webinars',     'url' => home_url('/webinars/'),                      'desc' => 'Join our live sessions and learn the latest admissions trends from leading experts.',     'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/video.svg',            'color_a' => '#7C3AED', 'color_b' => '#C084FC'),
        array('title' => 'News & Media', 'url' => home_url('/news/'),                          'desc' => 'Get up to speed with the latest news about ExtraaEdge.',                                  'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/bullhorn.svg',         'color_a' => '#DC2626', 'color_b' => '#FB7185'),
        array('title' => 'Help Center',  'url' => home_url('/help/'),                          'desc' => 'Documentation, step-by-step guides, and FAQs to get the most out of the platform.',       'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/question-circle.svg',  'color_a' => '#0891B2', 'color_b' => '#67E8F9'),
    );
}

/* Header + trust-bar copy shown on /resources/ — same admin page edits it. */
function ee_get_resources_page_settings() {
    $s = get_option('ee_resources_page_settings', array());
    $d = array(
        'eyebrow'      => 'The Resource Library',
        'headline'     => 'Everything you need to grow enrollment.',
        'highlight'    => 'grow enrollment.',
        'subheadline'  => 'Blogs, ebooks, webinars, case studies, news, and support — all the insights and tools to master modern admissions, in one place.',
        'trust_label'  => "What you'll find inside",
        'trust_items'  => array('Expert-written insights', 'Updated weekly', 'Free downloads', 'Real success stories', '24/7 self-serve support'),
    );
    return wp_parse_args(is_array($s) ? $s : array(), $d);
}

add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Resources', '🧰 Resources Page', 'manage_options', 'ee-resources-menu', 'ee_resources_menu_render_admin');
});

add_action('admin_post_ee_save_resources_menu', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_resources_menu_save');

    /* Page header + trust bar */
    $h = isset($_POST['hdr']) && is_array($_POST['hdr']) ? $_POST['hdr'] : array();
    $trust_in = isset($h['trust_items']) && is_array($h['trust_items']) ? $h['trust_items'] : array();
    $trust_clean = array();
    foreach ($trust_in as $t) {
        $t = sanitize_text_field(wp_unslash($t));
        if ($t !== '') $trust_clean[] = $t;
    }
    update_option('ee_resources_page_settings', array(
        'eyebrow'     => sanitize_text_field(wp_unslash($h['eyebrow']     ?? '')),
        'headline'    => sanitize_text_field(wp_unslash($h['headline']    ?? '')),
        'highlight'   => sanitize_text_field(wp_unslash($h['highlight']   ?? '')),
        'subheadline' => sanitize_textarea_field(wp_unslash($h['subheadline'] ?? '')),
        'trust_label' => sanitize_text_field(wp_unslash($h['trust_label'] ?? '')),
        'trust_items' => $trust_clean,
    ));

    /* Card items */
    $rows  = isset($_POST['res']) && is_array($_POST['res']) ? $_POST['res'] : array();
    $clean = array();
    foreach ($rows as $r) {
        $title = isset($r['title']) ? sanitize_text_field(wp_unslash($r['title'])) : '';
        if ($title === '') continue;
        $clean[] = array(
            'title'   => $title,
            'url'     => isset($r['url'])     ? esc_url_raw(wp_unslash($r['url']))                : '',
            'desc'    => isset($r['desc'])    ? sanitize_textarea_field(wp_unslash($r['desc']))   : '',
            'icon'    => isset($r['icon'])    ? esc_url_raw(wp_unslash($r['icon']))               : '',
            'color_a' => isset($r['color_a']) ? sanitize_hex_color(wp_unslash($r['color_a']))     : '#DE6E30',
            'color_b' => isset($r['color_b']) ? sanitize_hex_color(wp_unslash($r['color_b']))     : '#F7B267',
        );
    }
    update_option('ee_resources_menu_items', $clean);

    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-resources-menu')));
    exit;
});

add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'toplevel_page_ee-resources-menu') wp_enqueue_media();
});

function ee_resources_menu_render_admin() {
    $items = ee_get_resources_menu_items();
    $hdr   = ee_get_resources_page_settings();
    $trust = is_array($hdr['trust_items']) ? $hdr['trust_items'] : array();
    while (count($trust) < 5) $trust[] = '';
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:10px;"><span style="font-size:26px">🧰</span> Resources</h1>
        <p class="description" style="max-width:780px;font-size:13.5px;line-height:1.6;">
            Edit the <strong>header + trust bar</strong> shown at the top of <code><?php echo esc_url(home_url('/resources/')); ?></code>, and the <strong>cards</strong> that appear both there <em>and</em> in the site header's Resources dropdown. Same source — change once, updates both.
        </p>
        <?php if (!empty($_GET['updated'])): ?>
            <div class="notice notice-success is-dismissible"><p>Resources page saved.</p></div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="ee_save_resources_menu">
            <?php wp_nonce_field('ee_resources_menu_save'); ?>

            <h2 style="margin:24px 0 10px;">🎯 Page header</h2>
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:6px;padding:16px 18px;">
                <div class="eerm-grid">
                    <div class="eerm-field">
                        <label style="display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;">Eyebrow (small label above the headline)</label>
                        <input type="text" name="hdr[eyebrow]" value="<?php echo esc_attr($hdr['eyebrow']); ?>" placeholder="The Resource Library" style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                    </div>
                    <div class="eerm-field">
                        <label style="display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;">Highlight phrase <span style="font-weight:400;color:#64748b;">(the orange-coloured part of the headline)</span></label>
                        <input type="text" name="hdr[highlight]" value="<?php echo esc_attr($hdr['highlight']); ?>" placeholder="grow enrollment." style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                    </div>
                </div>
                <div class="eerm-field" style="margin-top:11px;">
                    <label style="display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;">Headline <span style="font-weight:400;color:#64748b;">(include the highlight phrase verbatim — it'll be auto-coloured)</span></label>
                    <input type="text" name="hdr[headline]" value="<?php echo esc_attr($hdr['headline']); ?>" placeholder="Everything you need to grow enrollment." style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                </div>
                <div class="eerm-field" style="margin-top:11px;">
                    <label style="display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;">Subheadline</label>
                    <textarea name="hdr[subheadline]" rows="2" placeholder="Blogs, ebooks, webinars…" style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;resize:vertical;"><?php echo esc_textarea($hdr['subheadline']); ?></textarea>
                </div>
            </div>

            <h2 style="margin:28px 0 10px;">✅ Trust bar <span style="font-size:13px;font-weight:400;color:#64748b;">— the strip with checkmarked highlights</span></h2>
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:6px;padding:16px 18px;">
                <div class="eerm-field">
                    <label style="display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;">Trust bar label</label>
                    <input type="text" name="hdr[trust_label]" value="<?php echo esc_attr($hdr['trust_label']); ?>" placeholder="What you'll find inside" style="width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                </div>
                <p style="margin:10px 0 6px;font-size:12.5px;color:#1d2327;font-weight:600;">Trust items <span style="font-weight:400;color:#64748b;">(leave blank to hide; you can have up to 8)</span></p>
                <div id="eerm-trust" style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                    <?php foreach (array_slice(array_pad($trust, 8, ''), 0, 8) as $i => $t): ?>
                        <input type="text" name="hdr[trust_items][]" value="<?php echo esc_attr($t); ?>" placeholder="Trust item <?php echo $i + 1; ?>" style="padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;">
                    <?php endforeach; ?>
                </div>
            </div>

            <h2 style="margin:32px 0 10px;">📚 Resource cards</h2>
            <p class="description" style="margin-bottom:10px;">Each row appears in the header's Resources dropdown <em>and</em> as a card on <code>/resources/</code>.</p>

            <style>
                .eerm-row{background:#fff;border:1px solid #e2e8f0;border-left:4px solid #DE6E30;border-radius:6px;padding:14px 16px;margin:10px 0;position:relative}
                .eerm-row .rm{position:absolute;right:10px;top:10px;background:transparent;border:1px solid #fecaca;color:#b91c1c;padding:3px 9px;border-radius:4px;cursor:pointer;font-size:11px}
                .eerm-row .idx{display:block;font-size:12px;letter-spacing:.04em;color:#64748b;margin-bottom:8px}
                .eerm-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
                .eerm-grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
                .eerm-field{margin-bottom:11px}
                .eerm-field label{display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px}
                .eerm-field input[type=text],.eerm-field input[type=url],.eerm-field textarea{width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;box-sizing:border-box}
                .eerm-field textarea{resize:vertical;min-height:54px;line-height:1.55}
                .eerm-pick{display:flex;align-items:center;gap:10px}
                .eerm-pick .prev{width:42px;height:42px;border-radius:9px;background:#f1f5f9;border:1px solid #cbd5e1;display:grid;place-items:center;flex-shrink:0;overflow:hidden}
                .eerm-pick .prev img{max-width:100%;max-height:100%}
                .eerm-add{background:#19335D;color:#fff;border:none;padding:9px 18px;border-radius:5px;cursor:pointer;font-size:13px;font-weight:600;margin-top:6px}
                .eerm-tip{background:#fff8f1;border:1px solid #fde7d3;color:#7c2d12;padding:10px 13px;border-radius:5px;font-size:12.5px;line-height:1.55;margin:14px 0}
                .eerm-tip code{background:#fff;border:1px solid #e9d5b8;padding:1px 5px;border-radius:3px;font-size:11.5px}
            </style>

            <p class="eerm-tip">✦ <strong>Tip:</strong> Each row appears <strong>both</strong> in the header's Resources dropdown AND as a card on <code>/resources/</code>. Add as many as you want, in the order you want them shown. The two colour pickers control the gradient background of each card on <code>/resources/</code>.</p>

            <div id="eerm-rows">
                <?php foreach ($items as $i => $r):
                    $title = $r['title']   ?? '';
                    $url   = $r['url']     ?? '';
                    $desc  = $r['desc']    ?? '';
                    $icon  = $r['icon']    ?? '';
                    $cA    = $r['color_a'] ?? '#DE6E30';
                    $cB    = $r['color_b'] ?? '#F7B267'; ?>
                    <div class="eerm-row">
                        <button type="button" class="rm">Remove</button>
                        <strong class="idx">ITEM <span class="eerm-idx"><?php echo $i + 1; ?></span></strong>
                        <div class="eerm-grid">
                            <div class="eerm-field"><label>Title</label><input type="text" name="res[<?php echo $i; ?>][title]" value="<?php echo esc_attr($title); ?>" placeholder="Blogs"></div>
                            <div class="eerm-field"><label>Link URL</label><input type="url" name="res[<?php echo $i; ?>][url]" value="<?php echo esc_attr($url); ?>" placeholder="https://…"></div>
                        </div>
                        <div class="eerm-field"><label>Short description</label><textarea name="res[<?php echo $i; ?>][desc]" rows="2" placeholder="One-line description shown in the dropdown and on the card."><?php echo esc_textarea($desc); ?></textarea></div>
                        <div class="eerm-grid-4">
                            <div class="eerm-field" style="grid-column:span 2;">
                                <label>Icon image (SVG / PNG URL)</label>
                                <div class="eerm-pick">
                                    <div class="prev"><?php if ($icon): ?><img src="<?php echo esc_url($icon); ?>" alt=""><?php endif; ?></div>
                                    <input type="url" class="eerm-icon-url" name="res[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($icon); ?>" placeholder="https://…/icon.svg">
                                    <button type="button" class="button eerm-icon-pick">Choose…</button>
                                </div>
                            </div>
                            <div class="eerm-field"><label>Card colour A</label><input type="text" name="res[<?php echo $i; ?>][color_a]" value="<?php echo esc_attr($cA); ?>" placeholder="#DE6E30"></div>
                            <div class="eerm-field"><label>Card colour B</label><input type="text" name="res[<?php echo $i; ?>][color_b]" value="<?php echo esc_attr($cB); ?>" placeholder="#F7B267"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" id="eerm-add" class="eerm-add">+ Add resource item</button>

            <template id="eerm-tpl">
                <div class="eerm-row">
                    <button type="button" class="rm">Remove</button>
                    <strong class="idx">ITEM <span class="eerm-idx">_n_</span></strong>
                    <div class="eerm-grid">
                        <div class="eerm-field"><label>Title</label><input type="text" name="res[__i__][title]" value="" placeholder="Title"></div>
                        <div class="eerm-field"><label>Link URL</label><input type="url" name="res[__i__][url]" value="" placeholder="https://…"></div>
                    </div>
                    <div class="eerm-field"><label>Short description</label><textarea name="res[__i__][desc]" rows="2" placeholder="One-line description."></textarea></div>
                    <div class="eerm-grid-4">
                        <div class="eerm-field" style="grid-column:span 2;">
                            <label>Icon image (SVG / PNG URL)</label>
                            <div class="eerm-pick">
                                <div class="prev"></div>
                                <input type="url" class="eerm-icon-url" name="res[__i__][icon]" value="" placeholder="https://…/icon.svg">
                                <button type="button" class="button eerm-icon-pick">Choose…</button>
                            </div>
                        </div>
                        <div class="eerm-field"><label>Card colour A</label><input type="text" name="res[__i__][color_a]" value="#DE6E30" placeholder="#DE6E30"></div>
                        <div class="eerm-field"><label>Card colour B</label><input type="text" name="res[__i__][color_b]" value="#F7B267" placeholder="#F7B267"></div>
                    </div>
                </div>
            </template>

            <p><?php submit_button('Save Resources Menu'); ?></p>

            <script>
            (function($){
                var list = document.getElementById('eerm-rows');
                var tpl  = document.getElementById('eerm-tpl');
                function nextIdx(){
                    var max = -1;
                    list.querySelectorAll('input[name*="[title]"]').forEach(function(el){
                        var m = el.name.match(/\[(\d+)\]/); if (m){ var i = parseInt(m[1],10); if (i > max) max = i; }
                    });
                    return max + 1;
                }
                function renumber(){
                    list.querySelectorAll('.eerm-idx').forEach(function(s, i){ s.textContent = i + 1; });
                }
                document.getElementById('eerm-add').addEventListener('click', function(){
                    var i = nextIdx();
                    var html = tpl.innerHTML.replace(/__i__/g, i).replace(/_n_/g, list.querySelectorAll('.eerm-row').length + 1);
                    var wrap = document.createElement('div'); wrap.innerHTML = html;
                    list.appendChild(wrap.firstElementChild);
                    renumber();
                });
                list.addEventListener('click', function(e){
                    if (e.target.classList.contains('rm')){
                        if (list.querySelectorAll('.eerm-row').length <= 1){ alert('Keep at least one item.'); return; }
                        e.target.closest('.eerm-row').remove();
                        renumber();
                    } else if (e.target.classList.contains('eerm-icon-pick')){
                        e.preventDefault();
                        if (typeof wp === 'undefined' || !wp.media) return;
                        var row = e.target.closest('.eerm-pick');
                        var input = row.querySelector('.eerm-icon-url');
                        var prev  = row.querySelector('.prev');
                        var frame = wp.media({ title:'Select icon', button:{ text:'Use this icon' }, multiple:false });
                        frame.on('select', function(){
                            var att = frame.state().get('selection').first().toJSON();
                            input.value = att.url;
                            prev.innerHTML = '<img src="' + att.url + '" alt="">';
                        });
                        frame.open();
                    }
                });
            })(jQuery);
            </script>
        </form>
    </div>
    <?php
}


/* ═════════════════════════════════════════════
 * 👥 CUSTOMER STORIES — page settings + stories repeater
 * Powers /customer-success-stories/ via page-customers.php.
 * ═════════════════════════════════════════════ */
function ee_customers_categories() {
    return array(
        'engineering' => 'Engineering',
        'business'    => 'Business',
        'skilling'    => 'Skilling',
        'creative'    => 'Creative & Media',
        'fitness'     => 'Fitness',
        'testimonial' => 'Testimonials',
    );
}

function ee_get_customers_settings() {
    $defaults = array(
        'sec_title' => 'Customer Success stories',
        'sec_sub'   => 'Filter by the kind of institute you run.',
        'cta_title' => 'Ready to write <em>your</em> success story?',
        'cta_text'  => 'Join the institutes turning more enquiries into enrolments with the CRM built for education.',
        'cta_btn'   => 'Book a personalised demo',
        'cta_url'   => home_url('/book-demo/'),
    );
    $s = get_option('ee_customers_settings', array());
    return wp_parse_args(is_array($s) ? $s : array(), $defaults);
}

function ee_get_customers_stories() {
    $items = get_option('ee_customers_stories', null);
    if (is_array($items) && !empty($items)) return $items;
    return array(
        array('cat'=>'creative',    'tag'=>'Film & Media',            'title'=>'Annapurna College of Film & Media',                  'est'=>'Founded 2011 · Hyderabad',          'body_type'=>'excerpt','excerpt'=>'Established by Sri Akkineni Nageswara Rao and the Akkineni family, ACFM brings cinematic craft and modern admissions together.','loves'=>'','metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#7C3AED','color_b'=>'#C084FC','url'=>'#'),
        array('cat'=>'engineering', 'tag'=>'Engineering',             'title'=>'Budge Budge Institute of Technology (BBIT)',         'est'=>'Established 2009 · Kolkata',        'body_type'=>'excerpt','excerpt'=>'A leading private engineering & management institute affiliated with MAKAUT, managing high enquiry volumes with ease.','loves'=>'','metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#19335D','color_b'=>'#3E6BB0','url'=>'#'),
        array('cat'=>'business',    'tag'=>'Business School',         'title'=>'NSB Bangalore — National School of Business',        'est'=>'Established 2004 · Bangalore',      'body_type'=>'excerpt','excerpt'=>'A recognised private business school streamlining its admissions funnel from first enquiry to final offer.','loves'=>'','metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#0E9F6E','color_b'=>'#6EE7B7','url'=>'#'),
        array('cat'=>'skilling',    'tag'=>'Student Success',         'title'=>'Career Buddy Club (CBC)',                            'est'=>'Dehradun · Tier 2 & 3 focus',       'body_type'=>'excerpt','excerpt'=>'A student success partner bridging the gap for underrepresented students across India’s Tier 2 and Tier 3 towns.','loves'=>'','metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#DE6E30','color_b'=>'#F7B267','url'=>'#'),
        array('cat'=>'skilling',    'tag'=>'BFSI Skilling',           'title'=>'IFM FinCoach',                                       'est'=>'Chandigarh · Finance',              'body_type'=>'excerpt','excerpt'=>'Chandigarh’s BFSI skilling leader partners with top banks to bridge training and real jobs in finance.','loves'=>'','metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#0891B2','color_b'=>'#67E8F9','url'=>'#'),
        array('cat'=>'business',    'tag'=>'Business School',         'title'=>'FOSTIIMA Business School',                           'est'=>'New Delhi · PGDM',                  'body_type'=>'excerpt','excerpt'=>'Replaced a manual admissions process with a streamlined digital system using ExtraaEdge’s tailored CRM.','loves'=>'','metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#19335D','color_b'=>'#1E3F73','url'=>'#'),
        array('cat'=>'engineering', 'tag'=>'Engineering',             'title'=>'Bharati Vidyapeeth University, College of Engineering','est'=>'Pune',                            'body_type'=>'excerpt','excerpt'=>'Used the ExtraaEdge CRM & marketing automation suite to grow applications tenfold and skyrocket admissions.','loves'=>'','metric_v'=>'10×','metric_l'=>'Applications','video'=>'','thumb'=>'','color_a'=>'#0E9F6E','color_b'=>'#34D399','url'=>'#'),
        array('cat'=>'creative',    'tag'=>'Media & Design',          'title'=>'Seamedu School of Pro-Expressionism',                'est'=>'Media & design education',          'body_type'=>'loves','excerpt'=>'','loves'=>"Scalable, reliable CRM\n100% automation of admissions\nSeamless lead prioritization & predictive analytics",'metric_v'=>'100%','metric_l'=>'Automated','video'=>'','thumb'=>'','color_a'=>'#6B2E63','color_b'=>'#A78BFA','url'=>'#'),
        array('cat'=>'fitness',     'tag'=>'Fitness',                 'title'=>'K11 Academy of Fitness Sciences',                    'est'=>'Fitness education',                 'body_type'=>'loves','excerpt'=>'','loves'=>"Cost-effectiveness\nFast, seamless adoption\nIntegration with social platforms & publishers\nGreat customer service",'metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#1B5A6B','color_b'=>'#5EC2D6','url'=>'#'),
        array('cat'=>'testimonial', 'tag'=>'Testimonial · Data',      'title'=>'Better insights with customised reports',            'est'=>'',                                  'body_type'=>'loves','excerpt'=>'','loves'=>"Customised reports for data-driven decisions\nMarketing automation that generates new enquiries\nGreat customer service & product innovation",'metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#DE6E30','color_b'=>'#C25A22','url'=>'#'),
        array('cat'=>'testimonial', 'tag'=>'Testimonial · Support',   'title'=>'Impeccable support, effortless nurturing',           'est'=>'',                                  'body_type'=>'loves','excerpt'=>'','loves'=>"Impeccable customer support\nSeamless integration of lead sources\nOpenness to customisation & innovation\nEasy lead nurturing across channels",'metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#19335D','color_b'=>'#3E6BB0','url'=>'#'),
        array('cat'=>'testimonial', 'tag'=>'Testimonial · Custom CRM','title'=>'A CRM shaped to their exact needs',                  'est'=>'',                                  'body_type'=>'loves','excerpt'=>'','loves'=>"CRM customised to their exact needs\nComplete automation of marketing & admissions\nSeamless integration with their channels",'metric_v'=>'','metric_l'=>'','video'=>'','thumb'=>'','color_a'=>'#DE6E30','color_b'=>'#F7B267','url'=>'#'),
    );
}

add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Customer Stories', '👥 Customer Stories', 'manage_options', 'ee-customers', 'ee_customers_render_admin');
});

/* ═════════════════════════════════════════════════════════════
 * 🧱 HEADER & FOOTER MENUS — non-coder admin for the site nav,
 *    Book-Demo CTA, Company dropdown, social links, footer legal,
 *    and the copyright line. Header + footer both read from these.
 * ═════════════════════════════════════════════════════════════ */
/* ─────────────────────────────────────────────
 * Per-page Hide-header / Hide-footer toggles
 *   • <Site>→<Page> edit screen → side meta box (one checkbox each)
 *   • Plus a global URL pattern list under 🧱 Header & Footer admin
 *     (covers landing pages that don't have a WP Post).
 * ───────────────────────────────────────────── */
function ee_should_hide_part($part) {
    $part = ($part === 'footer') ? 'footer' : 'header';
    $id   = get_queried_object_id();
    if ($id && get_post_meta($id, '_ee_hide_' . $part, true) === '1') return true;

    $patterns = (string) get_option('ee_hide_layout_patterns_' . $part, '');
    if (trim($patterns) === '') return false;

    $req = '/' . ltrim(strtok((string) ($_SERVER['REQUEST_URI'] ?? '/'), '?'), '/');
    $req = '/' . trim($req, '/') . '/';
    foreach (preg_split('/\r?\n/', $patterns) as $p) {
        $p = trim($p);
        if ($p === '') continue;
        $wild = (substr($p, -1) === '*');
        $p    = '/' . trim(rtrim($p, '*'), '/') . '/';
        if ($wild) {
            if (strpos($req, $p) === 0) return true;
        } else {
            if ($req === $p) return true;
        }
    }
    return false;
}

add_action('add_meta_boxes', function () {
    foreach (get_post_types(array('public' => true), 'names') as $t) {
        add_meta_box('ee_layout_toggles', '🧱 Site header & footer', 'ee_layout_toggles_render', $t, 'side', 'default');
    }
});

function ee_layout_toggles_render($post) {
    wp_nonce_field('ee_layout_toggles', 'ee_layout_toggles_nonce');
    $h   = get_post_meta($post->ID, '_ee_hide_header', true) === '1';
    $f   = get_post_meta($post->ID, '_ee_hide_footer', true) === '1';
    $l   = get_post_meta($post->ID, '_ee_hide_logos',  true) === '1';
    $pos = get_post_meta($post->ID, '_ee_logos_position', true);
    if ($pos === '') $pos = 'before-footer';
    $positions = array(
        'after-hero'    => 'After the hero / top banner',
        'before-faq'    => 'Just above the FAQ section',
        'before-footer' => 'Bottom of page, just above footer (default)',
        'top'           => 'Very top of the page content',
    );
    ?>
    <p style="margin:0 0 10px;font-size:12.5px;color:#1d2327;line-height:1.55;">Hide the global site chrome on <em>this page only</em> — useful for landing pages, thank-you screens, gated forms, etc.</p>
    <label style="display:block;margin-bottom:8px;font-size:13px;"><input type="checkbox" name="ee_hide_header" value="1" <?php checked($h); ?>> Hide the site <strong>header</strong></label>
    <label style="display:block;margin-bottom:8px;font-size:13px;"><input type="checkbox" name="ee_hide_footer" value="1" <?php checked($f); ?>> Hide the site <strong>footer</strong></label>
    <label style="display:block;margin-bottom:14px;font-size:13px;"><input type="checkbox" name="ee_hide_logos"  value="1" <?php checked($l); ?>> Hide the <strong>logo marquee</strong> strip</label>

    <p style="margin:0 0 6px;font-size:12.5px;font-weight:600;color:#1d2327;">📍 Logo strip position on this page</p>
    <select name="ee_logos_position" style="width:100%;font-size:13px;padding:5px;">
        <?php foreach ($positions as $val => $label): ?>
        <option value="<?php echo esc_attr($val); ?>" <?php selected($pos, $val); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
    </select>
    <p style="margin:6px 0 0;font-size:11.5px;color:#646970;line-height:1.5;">Choose where the scrolling logo strip appears on this page. If the chosen section doesn't exist on this page, it falls back to just above the footer.</p>
    <?php
}

add_action('save_post', function ($post_id) {
    if (!isset($_POST['ee_layout_toggles_nonce']) || !wp_verify_nonce($_POST['ee_layout_toggles_nonce'], 'ee_layout_toggles')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    update_post_meta($post_id, '_ee_hide_header', !empty($_POST['ee_hide_header']) ? '1' : '');
    update_post_meta($post_id, '_ee_hide_footer', !empty($_POST['ee_hide_footer']) ? '1' : '');
    update_post_meta($post_id, '_ee_hide_logos',  !empty($_POST['ee_hide_logos'])  ? '1' : '');

    $allowed_pos = array('after-hero', 'before-faq', 'before-footer', 'top');
    $pos = isset($_POST['ee_logos_position']) ? sanitize_key(wp_unslash($_POST['ee_logos_position'])) : 'before-footer';
    if (!in_array($pos, $allowed_pos, true)) $pos = 'before-footer';
    update_post_meta($post_id, '_ee_logos_position', $pos);
});

/* ─────────────────────────────────────────────
 * Logo marquee — reusable across all templates
 * ───────────────────────────────────────────── */
function ee_should_hide_logos() {
    $id = get_queried_object_id();
    if ($id && get_post_meta($id, '_ee_hide_logos', true) === '1') return true;

    $patterns = (string) get_option('ee_hide_layout_patterns_logos', '');
    if (trim($patterns) === '') return false;

    $req = '/' . ltrim(strtok((string) ($_SERVER['REQUEST_URI'] ?? '/'), '?'), '/');
    $req = '/' . trim($req, '/') . '/';
    foreach (preg_split('/\r?\n/', $patterns) as $p) {
        $p = trim($p);
        if ($p === '') continue;
        $wild = (substr($p, -1) === '*');
        $p    = '/' . trim(rtrim($p, '*'), '/') . '/';
        if ($wild) {
            if (strpos($req, $p) === 0) return true;
        } else {
            if ($req === $p) return true;
        }
    }
    return false;
}

function ee_render_logo_marquee($args = array()) {
    /* Render only once per request — templates call this inline AND the
       ee_before_footer hook calls it as a fallback; whichever fires first
       wins so the strip is never duplicated on a page. */
    static $done = false;
    if ($done) return;
    $done = true;

    /* Read global logos + home-page section texts from home settings so the
       strip is a faithful clone of the home page everywhere. Callers can still
       override any text via $args. */
    $s = get_option('ee_home_settings', array());
    if (!is_array($s)) $s = array();

    /* Per-page placement (set via the 🧱 Site header & footer meta box).
       The strip always renders here (before the footer); a tiny relocation
       script then moves it to the chosen anchor on the page. */
    $pos = '';
    $qid = get_queried_object_id();
    if ($qid) $pos = (string) get_post_meta($qid, '_ee_logos_position', true);
    if ($pos === '') $pos = 'before-footer';

    $args = wp_parse_args($args, array(
        'badge'      => (string) ($s['logos_badge']      ?? ''),
        'heading'    => (string) ($s['logos_heading']    ?? ''),
        'subheading' => (string) ($s['logos_subheading'] ?? ''),
        'cta_text'   => (string) ($s['logos_cta_text']   ?? ''),
        'cta_url'    => (string) ($s['logos_cta_url']     ?? ''),
        'live_text'  => (string) ($s['logos_live_text']  ?? ''),
        'position'   => $pos,
    ));

    /* Two tracks, exactly like the home page — track 1 scrolls left, track 2
       scrolls right. Each row is padded by cycling its source list until it
       has at least MIN_PER_ROW cards, then the markup duplicates that whole
       row a second time so the -50% keyframe lands seamlessly. The padding
       prevents the "empty gap" the user noticed when there are few logos:
       without it, a short list leaves blank space on the right edge after
       the track translates leftwards. */
    $row_t1 = array();
    for ($i = 1; $i <= 100; $i++) {
        $u = trim((string) ($s["logo_t1_{$i}_url"] ?? ''));
        if ($u === '') continue;
        $row_t1[] = array('u' => $u, 'a' => (string) ($s["logo_t1_{$i}_alt"] ?? ''));
    }
    $row_t2 = array();
    for ($i = 1; $i <= 100; $i++) {
        $u = trim((string) ($s["logo_t2_{$i}_url"] ?? ''));
        if ($u === '') continue;
        $row_t2[] = array('u' => $u, 'a' => (string) ($s["logo_t2_{$i}_alt"] ?? ''));
    }

    if (empty($row_t1) && empty($row_t2)) return;

    /* If only one track has logos, mirror it into the other so both rows
       always render and the design stays balanced. */
    if (empty($row_t1)) $row_t1 = $row_t2;
    if (empty($row_t2)) $row_t2 = $row_t1;

    /* Cycle each row's source list until it holds at least MIN_PER_ROW items
       — guarantees the duplicated track is wider than any realistic viewport
       so the loop joins invisibly with no trailing empty space. */
    $MIN_PER_ROW = 12;
    $ee_pad = function ($row) use ($MIN_PER_ROW) {
        if (empty($row)) return $row;
        $out = $row;
        while (count($out) < $MIN_PER_ROW) {
            foreach ($row as $item) {
                $out[] = $item;
                if (count($out) >= $MIN_PER_ROW) break;
            }
        }
        return $out;
    };
    $row_t1 = $ee_pad($row_t1);
    $row_t2 = $ee_pad($row_t2);
    ?>
<style>
.ee-logo-section{background:transparent;padding:40px 20px;overflow:hidden}
.ee-logo-container{max-width:1200px;margin:0 auto;text-align:center}
.ee-logo-header{margin-bottom:32px}
.ee-logo-badge{display:inline-block;background:#fef3ec;color:#DE6E30;padding:6px 18px;border-radius:999px;font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;margin-bottom:10px}
.ee-logo-heading{font-family:'Inter',sans-serif;color:#19335D;font-size:clamp(1.4rem,3vw,2.2rem);line-height:1.25;margin:0 auto 10px;max-width:800px;font-weight:700}
.ee-logo-sub{color:#6b7280;font-size:1.05rem;max-width:600px;margin:0 auto}
/* Break the scrolling strip out of the 1200px container so logos clip
   exactly at the viewport edges — no leftover white blocks on the sides
   where cards would otherwise disappear into the inner container. */
/* padding-top + padding-bottom give every card 12-14px of room to lift on hover
   so the translateY(-5px) effect isn't clipped at the container edges. */
.ee-marquee-container{position:relative;overflow:hidden;width:100vw;margin-left:calc(-50vw + 50%);max-width:100vw;padding:14px 0 6px}
/* Hard-kill any side-fade / vignette pseudo-elements inherited from
   sibling templates (older marquee styles still in the cascade). */
.ee-marquee-container::before,.ee-marquee-container::after,
.ee-marquee-track::before,.ee-marquee-track::after,
.ee-logo-section::before,.ee-logo-section::after{display:none!important;content:none!important;background:none!important}
.ee-marquee-track{display:flex;gap:30px;padding-bottom:20px;width:max-content;will-change:transform}
.ee-track-1{animation:eeScrollLeft 40s linear infinite}
.ee-track-2{animation:eeScrollRight 40s linear infinite}
.ee-logo-card{width:200px;height:100px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:flex;align-items:center;justify-content:center;padding:20px;transition:transform .3s ease,border-color .3s ease;flex-shrink:0}
.ee-logo-card:hover{border-color:#DE6E30;transform:translateY(-5px)}
.ee-logo-card img{max-width:100%;max-height:100%;object-fit:contain;filter:grayscale(100%);opacity:.7;transition:all .3s ease;font-size:0;color:transparent}
.ee-logo-card:hover img{filter:grayscale(0%);opacity:1}
.ee-logo-footer{margin-top:24px;display:flex;flex-direction:column;align-items:center;gap:12px}
.ee-logo-cta{background:#DE6E30;color:#fff;text-decoration:none;padding:14px 28px;border-radius:8px;font-family:'Inter',sans-serif;font-size:1rem;transition:background .3s ease,transform .2s ease;box-shadow:0 4px 14px rgba(222,110,48,.3)}
.ee-logo-cta:hover{background:#c55d28;transform:scale(1.05)}
.ee-live-indicator{display:flex;align-items:center;gap:10px;font-size:.85rem;color:#19335D;font-weight:600}
.ee-pulse-dot{width:8px;height:8px;background:#10b981;border-radius:50%;position:relative}
.ee-pulse-dot::after{content:"";position:absolute;width:100%;height:100%;background:#10b981;border-radius:50%;animation:ee-pulse 2s infinite}
@keyframes eeScrollLeft{0%{transform:translateX(0)}100%{transform:translateX(calc(-50% - 15px))}}
@keyframes eeScrollRight{0%{transform:translateX(calc(-50% - 15px))}100%{transform:translateX(0)}}
@keyframes ee-pulse{0%{transform:scale(1);opacity:.8}100%{transform:scale(3);opacity:0}}
@media(max-width:768px){.ee-logo-card{width:150px;height:80px}.ee-logo-section{padding:24px 12px}}
</style>
<section class="ee-logo-section" id="trusted-institutions" data-ee-pos="<?php echo esc_attr($args['position']); ?>" aria-labelledby="ee-logo-heading">
  <div class="ee-logo-container">
    <?php if ($args['badge'] || $args['heading'] || $args['subheading']): ?>
    <header class="ee-logo-header">
      <?php if ($args['badge']): ?><div class="ee-logo-badge"><?php echo esc_html($args['badge']); ?></div><?php endif; ?>
      <?php if ($args['heading']): ?><h2 id="ee-logo-heading" class="ee-logo-heading"><?php echo esc_html($args['heading']); ?></h2><?php endif; ?>
      <?php if ($args['subheading']): ?><p class="ee-logo-sub"><?php echo esc_html($args['subheading']); ?></p><?php endif; ?>
    </header>
    <?php endif; ?>

    <div class="ee-marquee-container">
      <?php /* Each track renders its (already-padded) row twice in markup —
               the -50% keyframe then makes the duplicate slide into where
               the original was, giving a truly seamless infinite scroll
               with no trailing empty space. */ ?>
      <div class="ee-marquee-track ee-track-1" aria-label="Trusted institutions, row 1">
        <?php for ($pass = 0; $pass < 2; $pass++): foreach ($row_t1 as $logo): ?>
        <div class="ee-logo-card"<?php echo $pass === 1 ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" loading="lazy" data-logo-src="<?php echo esc_attr($logo['u']); ?>" onerror="(function(s){document.querySelectorAll('.ee-logo-card img[data-logo-src=&quot;'+s+'&quot;]').forEach(function(i){var c=i.closest('.ee-logo-card');if(c)c.remove();});})(this.getAttribute('data-logo-src'))"></div>
        <?php endforeach; endfor; ?>
      </div>
      <div class="ee-marquee-track ee-track-2" aria-label="Trusted institutions, row 2">
        <?php for ($pass = 0; $pass < 2; $pass++): foreach ($row_t2 as $logo): ?>
        <div class="ee-logo-card"<?php echo $pass === 1 ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" loading="lazy" data-logo-src="<?php echo esc_attr($logo['u']); ?>" onerror="(function(s){document.querySelectorAll('.ee-logo-card img[data-logo-src=&quot;'+s+'&quot;]').forEach(function(i){var c=i.closest('.ee-logo-card');if(c)c.remove();});})(this.getAttribute('data-logo-src'))"></div>
        <?php endforeach; endfor; ?>
      </div>
    </div>

    <script>
    (function(){
        function eeCleanupLogos(){
            /* Drop the broken card AND its duplicate (matched by image URL)
               so the -50% seamless loop stays in sync. Without this, removing
               just one copy would offset the duplicate set and break the
               infinite scroll. */
            var bad = {};
            document.querySelectorAll('.ee-logo-card img').forEach(function(img){
                if(img.complete && img.naturalWidth===0){ bad[img.src] = true; }
            });
            if(Object.keys(bad).length){
                document.querySelectorAll('.ee-logo-card img').forEach(function(img){
                    if(bad[img.src]){ var c=img.closest('.ee-logo-card'); if(c) c.remove(); }
                });
            }
            document.querySelectorAll('.ee-marquee-track').forEach(function(t){
                if(!t.querySelector('.ee-logo-card'))t.style.display='none';
            });
        }
        if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',eeCleanupLogos);
        else eeCleanupLogos();
        window.addEventListener('load',eeCleanupLogos);

        /* Relocate the strip to the page position chosen in the admin meta box.
           Renders before the footer by default, then moves next to the chosen
           anchor. If the anchor is missing on this page, it stays put. */
        function eeMoveLogos(){
            var sec = document.querySelector('.ee-logo-section[data-ee-pos]');
            if(!sec || sec.getAttribute('data-ee-moved')==='1') return;
            var pos = sec.getAttribute('data-ee-pos') || 'before-footer';
            if(pos==='before-footer'){ sec.setAttribute('data-ee-moved','1'); return; }
            var target=null, mode='after';
            if(pos==='after-hero'){ target=document.querySelector('.hero'); mode='after'; }
            else if(pos==='before-faq'){ target=document.querySelector('.faq-section, #faq'); mode='before'; }
            else if(pos==='top'){ target=document.querySelector('#main-content'); mode='prepend'; }
            if(!target){ sec.setAttribute('data-ee-moved','1'); return; }
            if(mode==='prepend'){ target.insertBefore(sec, target.firstChild); }
            else if(mode==='before'){ target.parentNode.insertBefore(sec, target); }
            else { target.parentNode.insertBefore(sec, target.nextSibling); }
            sec.setAttribute('data-ee-moved','1');
        }
        if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',eeMoveLogos);
        else eeMoveLogos();
    })();
    </script>

    <?php if ($args['cta_text'] || $args['live_text']): ?>
    <footer class="ee-logo-footer">
      <?php if ($args['cta_text']): ?><a href="<?php echo esc_url($args['cta_url'] ?: '#'); ?>" class="ee-logo-cta"><?php echo esc_html($args['cta_text']); ?></a><?php endif; ?>
      <?php if ($args['live_text']): ?><div class="ee-live-indicator"><span class="ee-pulse-dot"></span><span><?php echo esc_html($args['live_text']); ?></span></div><?php endif; ?>
    </footer>
    <?php endif; ?>
  </div>
</section>
    <?php
}

/* Logo-marquee auto-inject removed (2026-07): the strip no longer renders
   on inner pages before the footer. ee_render_logo_marquee() is kept so it
   can be called explicitly from a template if it is ever wanted back. */

/* ─────────────────────────────────────────────
 * Blog category tree — one-click setup
 * ───────────────────────────────────────────── */
/** The approved blog taxonomy: parent => children (order = position). */
function ee_blog_cat_tree() {
    return array(
        'Education CRM'         => array(),
        'Admission Management'  => array(),
        'Student Recruitment'   => array(),
        'Enrollment Management' => array(),
        'Education AI'          => array('Agentic AI', 'AI Chatbots', 'Voice AI', 'AI Lead Scoring', 'Generative AI'),
        'Marketing Automation'  => array(),
        'Lead Management'       => array(),
        'Analytics & Reporting' => array(),
        'Communication'         => array('WhatsApp', 'Email', 'SMS', 'Voice', 'IVR'),
        'Industries'            => array('Universities', 'Colleges', 'Schools', 'K-12', 'Coaching', 'Study Abroad', 'EdTech', 'Vocational'),
        'Product Guides'        => array(),
        'Comparisons'           => array(),
        'Case Studies'          => array(),
        'Resources'             => array(),
        'Webinars'              => array(),
        'Events'                => array(),
        'Product Updates'       => array(),
        'Industry News'         => array(),
        'Help'                  => array(),
    );
}
/** Create-or-update one category; returns term_id. */
function ee_blog_ensure_cat($name, $parent, $order, &$created, &$skipped) {
    $existing = get_term_by('name', $name, 'category');
    if ($existing && !is_wp_error($existing)) {
        if ((int) $existing->parent !== (int) $parent) {
            wp_update_term($existing->term_id, 'category', array('parent' => (int) $parent));
        }
        update_term_meta($existing->term_id, 'ee_cat_order', (int) $order);
        $skipped++;
        return (int) $existing->term_id;
    }
    $res = wp_insert_term($name, 'category', array('parent' => (int) $parent));
    if (is_wp_error($res)) { $skipped++; return 0; }
    update_term_meta($res['term_id'], 'ee_cat_order', (int) $order);
    $created++;
    return (int) $res['term_id'];
}
add_action('admin_post_ee_blog_seed_cats', function () {
    if (!current_user_can('manage_categories')) wp_die('Not allowed');
    check_admin_referer('ee_blog_seed_cats');
    $created = 0;
    $skipped = 0;
    $order   = 0;
    foreach (ee_blog_cat_tree() as $parent => $children) {
        $order += 10;
        $pid = ee_blog_ensure_cat($parent, 0, $order, $created, $skipped);
        $corder = 0;
        foreach ($children as $child) {
            $corder += 10;
            ee_blog_ensure_cat($child, $pid, $corder, $created, $skipped);
        }
    }
    wp_safe_redirect(add_query_arg(array('page' => 'ee-blog-cats', 'seeded' => $created, 'skipped' => $skipped), admin_url('edit.php')));
    exit;
});
add_action('admin_menu', function () {
    add_submenu_page('edit.php', 'Blog Categories', '🗂️ Blog Categories', 'manage_categories', 'ee-blog-cats', 'ee_blog_cats_page_render');
});
function ee_blog_cats_page_render() {
    if (!current_user_can('manage_categories')) return;
    ?>
    <div class="wrap">
        <h1>🗂️ Blog Category Setup</h1>
        <?php if (isset($_GET['seeded'])) : ?>
            <div class="notice notice-success" style="margin-left:0"><p>
                Created <strong><?php echo (int) $_GET['seeded']; ?></strong> new categor<?php echo ((int) $_GET['seeded'] === 1) ? 'y' : 'ies'; ?><?php if (!empty($_GET['skipped'])) : ?>, updated/kept <strong><?php echo (int) $_GET['skipped']; ?></strong> that already existed<?php endif; ?>.
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" target="_blank">View /blog/ →</a>
            </p></div>
        <?php endif; ?>
        <p style="max-width:720px;color:#475569">One click creates the full blog category tree below (existing categories are kept — the button is safe to press again). The /blog/ sidebar shows the same tree, in this order, with sub-categories expandable. Assign categories to posts as usual in <strong>Posts → Add New</strong>; a post in a sub-category (e.g. Voice AI) automatically shows under its parent (Education AI) too.</p>
        <div style="background:#fff;border:1px solid #dcdcde;border-radius:8px;padding:16px 22px;max-width:520px;margin:14px 0;font-size:13.5px;line-height:2">
            <?php foreach (ee_blog_cat_tree() as $parent => $children) :
                $p_exists = get_term_by('name', $parent, 'category');
            ?>
                <div><?php echo $p_exists ? '✅' : '⬜'; ?> <strong><?php echo esc_html($parent); ?></strong></div>
                <?php foreach ($children as $child) :
                    $c_exists = get_term_by('name', $child, 'category');
                ?>
                    <div style="padding-left:34px"><?php echo $c_exists ? '✅' : '⬜'; ?> <?php echo esc_html($child); ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="ee_blog_seed_cats">
            <?php wp_nonce_field('ee_blog_seed_cats'); ?>
            <?php submit_button('Create blog categories', 'primary', 'submit', false); ?>
        </form>
        <p class="description" style="margin-top:12px">✅ = already exists &nbsp;·&nbsp; ⬜ = will be created. Rename or fine-tune later in <a href="<?php echo esc_url(admin_url('edit-tags.php?taxonomy=category')); ?>">Posts → Categories</a>.</p>
    </div>
    <?php
}

function ee_get_book_demo_cta() {
    $s = get_option('ee_book_demo_cta', array());
    return wp_parse_args(is_array($s) ? $s : array(), array(
        'text' => 'Book Demo',
        'url'  => home_url('/book-demo/'),
    ));
}

function ee_get_header_top_labels() {
    $defaults = array(
        'products'   => array('label' => 'Products',   'url' => home_url('/products/')),
        'industries' => array('label' => 'Industries', 'url' => home_url('/industries/')),
        'solutions'  => array('label' => 'Solutions',  'url' => home_url('/solutions/')),
        'resources'  => array('label' => 'Resources',  'url' => '#'),
        'company'    => array('label' => 'Company',    'url' => '#'),
    );
    $s = get_option('ee_header_top_labels', array());
    if (!is_array($s)) $s = array();
    foreach ($defaults as $k => $v) {
        if (!isset($s[$k]) || !is_array($s[$k])) $s[$k] = $v;
        else $s[$k] = wp_parse_args($s[$k], $v);
    }
    return $s;
}

function ee_get_company_menu_items() {
    $items = get_option('ee_company_menu_items', null);
    if (is_array($items) && !empty($items)) {
        /* /customers/ moved to /customer-success-stories/ - normalize admin-saved menus */
        foreach ($items as &$it) {
            $p = rtrim((string) parse_url($it['url'] ?? '', PHP_URL_PATH), '/');
            if ($p === '/customers' || $p === '/customer') $it['url'] = home_url('/customer-success-stories/');
        }
        unset($it);
        return $items;
    }
    return array(
        array('title' => 'About ExtraaEdge',      'url' => home_url('/about-us/'),               'desc' => 'Our story & mission',                                              'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/info-circle.svg'),
        array('title' => 'Team',                  'url' => home_url('/team/'),                   'desc' => 'Find out more about the people helping your admissions teams win', 'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/users.svg'),
        array('title' => 'Careers',               'url' => home_url('/careers/'),                'desc' => 'Interested in working with us? Check out our open positions',      'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/briefcase.svg'),
        array('title' => 'Investors & Advisors',  'url' => home_url('/investors-and-advisors/'), 'desc' => 'People and organisations deeply aligned with our mission',         'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/dollar-sign.svg'),
        array('title' => 'Customers',             'url' => home_url('/customer-success-stories/'),              'desc' => 'Learn more about our happy customers from your segment',           'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/handshake.svg'),
        array('title' => 'Become a Partner',      'url' => home_url('/become-a-partner/'),       'desc' => 'Interested in partnering with us? Fill your details',              'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/handshake.svg'),
        array('title' => 'Contact Us',            'url' => home_url('/get-in-touch/'),           'desc' => 'Get in touch',                                                     'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/envelope.svg'),
        array('title' => 'Privacy & Legal',       'url' => home_url('/privacy-policy/'),         'desc' => 'Policies & terms',                                                 'icon' => 'https://www.extraaedge.com/wp-content/uploads/icons/lock.svg'),
    );
}

function ee_get_social_links() {
    $s = get_option('ee_social_links', array());
    return wp_parse_args(is_array($s) ? $s : array(), array(
        'facebook'  => 'https://www.facebook.com/extraaedge/',
        'instagram' => 'https://www.instagram.com/extraaedge/',
        'youtube'   => 'https://www.youtube.com/user/theextraaedge',
        'twitter'   => 'https://x.com/extraaedge',
        'linkedin'  => 'https://www.linkedin.com/company/extraaedge/',
    ));
}

function ee_get_footer_settings() {
    $s = get_option('ee_footer_settings', array());
    return wp_parse_args(is_array($s) ? $s : array(), array(
        'copyright'   => '© ' . date('Y') . ', ExtraaEdge Technology Solutions Pvt. Ltd',
        'legal_links' => array(
            array('title' => 'Privacy & Terms',       'url' => home_url('/privacy-policy/')),
            array('title' => 'GDPR',                  'url' => home_url('/gdpr/')),
            array('title' => 'Cookies',               'url' => home_url('/cookies-policy/')),
            array('title' => 'Security & Compliance', 'url' => 'https://www.truday.io/extraaedge'),
        ),
    ));
}

add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Header & Footer', '🧱 Header & Footer', 'manage_options', 'ee-header-footer', 'ee_header_footer_render_admin');
});

add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'site-editor_page_ee-header-footer' || $hook === 'toplevel_page_ee-header-footer') wp_enqueue_media();
});

add_action('admin_post_ee_save_header_footer', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_header_footer_save');

    /* Book Demo CTA */
    $cta = isset($_POST['cta']) && is_array($_POST['cta']) ? $_POST['cta'] : array();
    update_option('ee_book_demo_cta', array(
        'text' => sanitize_text_field(wp_unslash($cta['text'] ?? 'Book Demo')),
        'url'  => esc_url_raw(wp_unslash($cta['url'] ?? '')),
    ));

    /* Header top-level menu labels + URLs */
    $tops = isset($_POST['top']) && is_array($_POST['top']) ? $_POST['top'] : array();
    $top_clean = array();
    foreach (array('products','industries','solutions','resources','company') as $k) {
        $top_clean[$k] = array(
            'label' => isset($tops[$k]['label']) ? sanitize_text_field(wp_unslash($tops[$k]['label'])) : '',
            'url'   => isset($tops[$k]['url'])   ? esc_url_raw(wp_unslash($tops[$k]['url']))           : '#',
        );
    }
    update_option('ee_header_top_labels', $top_clean);

    /* Company mega-menu items */
    $rows = isset($_POST['company']) && is_array($_POST['company']) ? $_POST['company'] : array();
    $clean = array();
    foreach ($rows as $r) {
        $title = isset($r['title']) ? sanitize_text_field(wp_unslash($r['title'])) : '';
        if ($title === '') continue;
        $clean[] = array(
            'title' => $title,
            'url'   => isset($r['url'])  ? esc_url_raw(wp_unslash($r['url']))                : '',
            'desc'  => isset($r['desc']) ? sanitize_text_field(wp_unslash($r['desc']))       : '',
            'icon'  => isset($r['icon']) ? esc_url_raw(wp_unslash($r['icon']))               : '',
        );
    }
    update_option('ee_company_menu_items', $clean);

    /* Social links */
    $soc = isset($_POST['soc']) && is_array($_POST['soc']) ? $_POST['soc'] : array();
    update_option('ee_social_links', array(
        'facebook'  => esc_url_raw(wp_unslash($soc['facebook']  ?? '')),
        'instagram' => esc_url_raw(wp_unslash($soc['instagram'] ?? '')),
        'youtube'   => esc_url_raw(wp_unslash($soc['youtube']   ?? '')),
        'twitter'   => esc_url_raw(wp_unslash($soc['twitter']   ?? '')),
        'linkedin'  => esc_url_raw(wp_unslash($soc['linkedin']  ?? '')),
    ));

    /* Footer: copyright + legal links */
    $f = isset($_POST['foot']) && is_array($_POST['foot']) ? $_POST['foot'] : array();
    $legal_in = isset($_POST['legal']) && is_array($_POST['legal']) ? $_POST['legal'] : array();
    $legal_clean = array();
    foreach ($legal_in as $l) {
        $title = isset($l['title']) ? sanitize_text_field(wp_unslash($l['title'])) : '';
        if ($title === '') continue;
        $legal_clean[] = array('title' => $title, 'url' => isset($l['url']) ? esc_url_raw(wp_unslash($l['url'])) : '');
    }
    update_option('ee_footer_settings', array(
        'copyright'   => sanitize_text_field(wp_unslash($f['copyright'] ?? '')),
        'legal_links' => $legal_clean,
    ));

    /* Global "hide on these URLs" patterns */
    update_option('ee_hide_layout_patterns_header', sanitize_textarea_field(wp_unslash($_POST['hide_header'] ?? '')));
    update_option('ee_hide_layout_patterns_footer', sanitize_textarea_field(wp_unslash($_POST['hide_footer'] ?? '')));
    update_option('ee_hide_layout_patterns_logos',  sanitize_textarea_field(wp_unslash($_POST['hide_logos']  ?? '')));

    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-header-footer')));
    exit;
});

function ee_header_footer_render_admin() {
    $cta     = ee_get_book_demo_cta();
    $company = ee_get_company_menu_items();
    $soc     = ee_get_social_links();
    $foot    = ee_get_footer_settings();
    $legal   = is_array($foot['legal_links']) ? $foot['legal_links'] : array();
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:10px;"><span style="font-size:26px;">🧱</span> Header &amp; Footer</h1>
        <p class="description" style="max-width:780px;font-size:13.5px;line-height:1.6;">
            Edit the site's <strong>Book Demo button</strong>, the <strong>Company</strong> dropdown
            (used in both header and footer), <strong>social links</strong>, <strong>footer legal links</strong>
            and the <strong>copyright</strong> line — all without touching code. The other dropdowns are managed
            elsewhere: <em>Products</em> auto-fills from the Products CPT, <em>Industries</em> from the Industry
            CPT, <em>Solutions</em> from 🧩 Solutions Page, and <em>Resources</em> from 🧰 Resources Page.
        </p>
        <?php if (!empty($_GET['updated'])): ?>
            <div class="notice notice-success is-dismissible"><p>Header &amp; Footer saved.</p></div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="ee_save_header_footer">
            <?php wp_nonce_field('ee_header_footer_save'); ?>

            <style>
                .eehf-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:16px 18px;margin-bottom:14px;}
                .eehf-card h2{margin:0 0 12px;font-size:14px;color:#19335D;display:flex;align-items:center;gap:7px;}
                .eehf-row{margin-bottom:11px;}
                .eehf-row label{display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;}
                .eehf-row input,.eehf-row textarea{width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;font-family:inherit;box-sizing:border-box;}
                .eehf-grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
                .eehf-grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;}
                .eehf-item{background:#f8fafc;border:1px solid #e2e8f0;border-left:4px solid #DE6E30;border-radius:6px;padding:12px 14px;margin-bottom:10px;position:relative;}
                .eehf-item .rm{position:absolute;right:10px;top:10px;background:transparent;border:1px solid #fecaca;color:#b91c1c;padding:3px 9px;border-radius:4px;cursor:pointer;font-size:11px;}
                .eehf-idx{display:block;font-size:11px;letter-spacing:.04em;color:#64748b;margin-bottom:6px;text-transform:uppercase;}
                .eehf-add{background:#19335D;color:#fff;border:none;padding:8px 16px;border-radius:5px;cursor:pointer;font-size:12.5px;font-weight:600;margin-top:4px;}
                .eehf-pick{display:flex;align-items:center;gap:8px;}
                .eehf-pick .prev{width:36px;height:36px;border-radius:6px;background:#f1f5f9;border:1px solid #cbd5e1;display:grid;place-items:center;flex-shrink:0;overflow:hidden;}
                .eehf-pick .prev img{max-width:100%;max-height:100%;}
            </style>

            <!-- ── BOOK DEMO CTA ── -->
            <div class="eehf-card">
                <h2>🚀 Header &amp; mobile "Book Demo" button</h2>
                <div class="eehf-grid2">
                    <div class="eehf-row"><label>Button text</label><input type="text" name="cta[text]" value="<?php echo esc_attr($cta['text']); ?>" placeholder="Book Demo"></div>
                    <div class="eehf-row"><label>Button URL</label><input type="url" name="cta[url]" value="<?php echo esc_attr($cta['url']); ?>" placeholder="https://…/book-demo/"></div>
                </div>
            </div>

            <!-- ── TOP-LEVEL MENU LABELS ── -->
            <?php $top = ee_get_header_top_labels(); ?>
            <div class="eehf-card">
                <h2>🧭 Header — top-level menu labels &amp; URLs <em style="font-size:11px;color:#64748b;font-weight:400;">— the 5 dropdown labels that visitors see in the navigation</em></h2>
                <p style="font-size:12.5px;color:#64748b;margin:0 0 12px;">Change the label visitors see, and where each top-level item links when clicked directly (separate from the dropdown items below).</p>
                <?php foreach (array(
                    'products'   => '🛍 Products',
                    'industries' => '🏛 Industries',
                    'solutions'  => '🧩 Solutions',
                    'resources'  => '🧰 Resources',
                    'company'    => '🏢 Company',
                ) as $k => $lab): ?>
                    <div class="eehf-item">
                        <span class="eehf-idx"><?php echo esc_html($lab); ?></span>
                        <div class="eehf-grid2">
                            <div class="eehf-row" style="margin-bottom:0;"><label>Label shown in nav</label><input type="text" name="top[<?php echo esc_attr($k); ?>][label]" value="<?php echo esc_attr($top[$k]['label']); ?>"></div>
                            <div class="eehf-row" style="margin-bottom:0;"><label>Link URL <span style="font-weight:400;color:#64748b;">(use # if the label should only open the dropdown)</span></label><input type="url" name="top[<?php echo esc_attr($k); ?>][url]" value="<?php echo esc_attr($top[$k]['url']); ?>"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- ── DROPDOWN PREVIEWS / DEEP LINKS ── -->
            <?php
            $eehf_pages = array(
                array(
                    'h2'   => '🛍 Products dropdown <em style="font-size:11px;color:#64748b;font-weight:400;">— auto-fills from the Products CPT</em>',
                    'desc' => 'Each item is a real <strong>Product page</strong> in WordPress. Add, edit, or reorder items in the Products admin.',
                    'edit' => admin_url('edit.php?post_type=product'),
                    'edit_label' => 'Edit Products →',
                    'fn'   => 'ee_get_product_menu_items',
                ),
                array(
                    'h2'   => '🏛 Industries dropdown <em style="font-size:11px;color:#64748b;font-weight:400;">— auto-fills from the Industry CPT</em>',
                    'desc' => 'Each item is a real <strong>Industry page</strong>. Add, edit, or reorder items in the Industries admin.',
                    'edit' => admin_url('edit.php?post_type=industry'),
                    'edit_label' => 'Edit Industries →',
                    'fn'   => 'ee_get_industry_menu_items',
                ),
                array(
                    'h2'   => '🧩 Solutions dropdown <em style="font-size:11px;color:#64748b;font-weight:400;">— managed on the Solutions Page admin</em>',
                    'desc' => 'Solutions items live in the dedicated <strong>🧩 Solutions Page</strong> editor. Use it to edit titles, URLs, and the three columns.',
                    'edit' => admin_url('admin.php?page=ee-solutions'),
                    'edit_label' => 'Open 🧩 Solutions Page →',
                    'fn'   => 'ee_get_solution_items',
                ),
                array(
                    'h2'   => '🧰 Resources dropdown <em style="font-size:11px;color:#64748b;font-weight:400;">— managed on the Resources Page admin</em>',
                    'desc' => 'Resources items live in the dedicated <strong>🧰 Resources Page</strong> editor — same source feeds the header dropdown and the footer Resources column.',
                    'edit' => admin_url('admin.php?page=ee-resources-menu'),
                    'edit_label' => 'Open 🧰 Resources Page →',
                    'fn'   => 'ee_get_resources_menu_items',
                ),
            );
            foreach ($eehf_pages as $eehf_p):
                $items = function_exists($eehf_p['fn']) ? call_user_func($eehf_p['fn']) : array();
                /* Solutions returns a nested {admission,study_abroad,recruitment} shape — flatten it for preview */
                if ($eehf_p['fn'] === 'ee_get_solution_items' && is_array($items)) {
                    $flat = array();
                    foreach ($items as $col_rows) {
                        if (!is_array($col_rows)) continue;
                        foreach ($col_rows as $row) $flat[] = $row;
                    }
                    $items = $flat;
                }
                ?>
                <div class="eehf-card">
                    <h2><?php echo $eehf_p['h2']; ?></h2>
                    <p style="font-size:12.5px;color:#64748b;margin:0 0 10px;"><?php echo wp_kses_post($eehf_p['desc']); ?></p>
                    <?php if ($items): ?>
                        <ol style="margin:0 0 12px 18px;padding:0;font-size:13px;color:#1d2327;line-height:1.85;">
                            <?php foreach ($items as $it):
                                $t = $it['title'] ?? '';
                                $u = $it['url']   ?? ''; ?>
                                <li>
                                    <strong><?php echo esc_html($t); ?></strong>
                                    <?php if ($u): ?>
                                        <span style="color:#64748b;font-size:11.5px;font-family:Menlo,Consolas,monospace;">→ <?php echo esc_html($u); ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    <?php else: ?>
                        <p style="font-size:12.5px;color:#b91c1c;margin:0 0 12px;">No items yet — add some from the editor below.</p>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($eehf_p['edit']); ?>" class="button button-primary" style="background:#19335D;border-color:#19335D;"><?php echo esc_html($eehf_p['edit_label']); ?></a>
                </div>
            <?php endforeach; ?>

            <!-- ── COMPANY MENU ── -->
            <div class="eehf-card">
                <h2>🏢 Company dropdown <em style="font-size:11px;color:#64748b;font-weight:400;">— used in both the header dropdown and the footer Company column</em></h2>
                <p style="font-size:12.5px;color:#64748b;margin:0 0 12px;">
                    Each row appears in the header's <strong>Company</strong> mega-menu (with description + icon) <em>and</em> as a link in the footer's <strong>Company</strong> column (title only).
                </p>
                <div id="eehf-company">
                    <?php foreach ($company as $i => $c): ?>
                        <div class="eehf-item">
                            <button type="button" class="rm">Remove</button>
                            <span class="eehf-idx">ITEM <span class="eehf-n"><?php echo $i + 1; ?></span></span>
                            <div class="eehf-grid2">
                                <div class="eehf-row"><label>Title</label><input type="text" name="company[<?php echo $i; ?>][title]" value="<?php echo esc_attr($c['title']); ?>" placeholder="About ExtraaEdge"></div>
                                <div class="eehf-row"><label>Link URL</label><input type="url" name="company[<?php echo $i; ?>][url]" value="<?php echo esc_attr($c['url']); ?>" placeholder="https://…/about/"></div>
                            </div>
                            <div class="eehf-row"><label>Description (header dropdown only)</label><input type="text" name="company[<?php echo $i; ?>][desc]" value="<?php echo esc_attr($c['desc']); ?>" placeholder="Our story &amp; mission"></div>
                            <div class="eehf-row" style="margin-bottom:0;">
                                <label>Icon image (SVG / PNG URL — header dropdown only)</label>
                                <div class="eehf-pick">
                                    <span class="prev"><?php if (!empty($c['icon'])): ?><img src="<?php echo esc_url($c['icon']); ?>" alt=""><?php endif; ?></span>
                                    <input type="url" class="eehf-icon-url" name="company[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($c['icon']); ?>" placeholder="https://…/icon.svg" style="flex:1;">
                                    <button type="button" class="button eehf-icon-pick">Choose…</button>
                                    <button type="button" class="button eehf-icon-clear" style="color:#b91c1c;">×</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" id="eehf-company-add" class="eehf-add">+ Add Company link</button>

                <template id="eehf-company-tpl">
                    <div class="eehf-item">
                        <button type="button" class="rm">Remove</button>
                        <span class="eehf-idx">ITEM <span class="eehf-n">_n_</span></span>
                        <div class="eehf-grid2">
                            <div class="eehf-row"><label>Title</label><input type="text" name="company[__i__][title]" value=""></div>
                            <div class="eehf-row"><label>Link URL</label><input type="url" name="company[__i__][url]" value=""></div>
                        </div>
                        <div class="eehf-row"><label>Description (header only)</label><input type="text" name="company[__i__][desc]" value=""></div>
                        <div class="eehf-row" style="margin-bottom:0;">
                            <label>Icon image</label>
                            <div class="eehf-pick">
                                <span class="prev"></span>
                                <input type="url" class="eehf-icon-url" name="company[__i__][icon]" value="" placeholder="https://…/icon.svg" style="flex:1;">
                                <button type="button" class="button eehf-icon-pick">Choose…</button>
                                <button type="button" class="button eehf-icon-clear" style="color:#b91c1c;">×</button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- ── SOCIAL LINKS ── -->
            <div class="eehf-card">
                <h2>🔗 Social media links <em style="font-size:11px;color:#64748b;font-weight:400;">— icons shown in the footer; leave a field blank to hide that icon</em></h2>
                <div class="eehf-grid3">
                    <div class="eehf-row"><label>Facebook URL</label><input type="url" name="soc[facebook]" value="<?php echo esc_attr($soc['facebook']); ?>"></div>
                    <div class="eehf-row"><label>Instagram URL</label><input type="url" name="soc[instagram]" value="<?php echo esc_attr($soc['instagram']); ?>"></div>
                    <div class="eehf-row"><label>YouTube URL</label><input type="url" name="soc[youtube]" value="<?php echo esc_attr($soc['youtube']); ?>"></div>
                    <div class="eehf-row"><label>Twitter / X URL</label><input type="url" name="soc[twitter]" value="<?php echo esc_attr($soc['twitter']); ?>"></div>
                    <div class="eehf-row"><label>LinkedIn URL</label><input type="url" name="soc[linkedin]" value="<?php echo esc_attr($soc['linkedin']); ?>"></div>
                </div>
            </div>

            <!-- ── LEGAL LINKS + COPYRIGHT ── -->
            <div class="eehf-card">
                <h2>📜 Footer legal &amp; copyright</h2>
                <div class="eehf-row"><label>Copyright line</label><input type="text" name="foot[copyright]" value="<?php echo esc_attr($foot['copyright']); ?>" placeholder="© 2026, Your Company Pvt. Ltd."></div>
                <p style="font-size:12.5px;color:#64748b;margin:14px 0 8px;font-weight:600;">Bottom legal links (Privacy, GDPR, Terms, etc.)</p>
                <div id="eehf-legal">
                    <?php foreach ($legal as $i => $l): ?>
                        <div class="eehf-item">
                            <button type="button" class="rm">Remove</button>
                            <span class="eehf-idx">LINK <span class="eehf-n"><?php echo $i + 1; ?></span></span>
                            <div class="eehf-grid2">
                                <div class="eehf-row"><label>Title</label><input type="text" name="legal[<?php echo $i; ?>][title]" value="<?php echo esc_attr($l['title']); ?>" placeholder="Privacy &amp; Terms"></div>
                                <div class="eehf-row"><label>URL</label><input type="url" name="legal[<?php echo $i; ?>][url]" value="<?php echo esc_attr($l['url']); ?>"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" id="eehf-legal-add" class="eehf-add">+ Add legal link</button>

                <template id="eehf-legal-tpl">
                    <div class="eehf-item">
                        <button type="button" class="rm">Remove</button>
                        <span class="eehf-idx">LINK <span class="eehf-n">_n_</span></span>
                        <div class="eehf-grid2">
                            <div class="eehf-row"><label>Title</label><input type="text" name="legal[__i__][title]" value=""></div>
                            <div class="eehf-row"><label>URL</label><input type="url" name="legal[__i__][url]" value=""></div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- ── HIDE HEADER / FOOTER / LOGOS ON SPECIFIC URLS ── -->
            <?php
            $hp_h = (string) get_option('ee_hide_layout_patterns_header', '');
            $hp_f = (string) get_option('ee_hide_layout_patterns_footer', '');
            $hp_l = (string) get_option('ee_hide_layout_patterns_logos',  '');
            ?>
            <div class="eehf-card">
                <h2>🙈 Hide header / footer / logos on specific pages</h2>
                <p style="font-size:12.5px;color:#64748b;margin:0 0 12px;">
                    <strong>Two ways to hide the site chrome on a page:</strong><br>
                    ① <strong>Per-page checkbox</strong> — open the page in WP Admin (any Page, Post, or custom CPT). On the right side-bar you'll see <em>🧱 Site header &amp; footer</em> — tick the boxes there.<br>
                    ② <strong>URL pattern list</strong> — paste page slugs below (one per line) for landing pages that don't have a real WP Post (e.g. the templates wired through code). Use <code>slug*</code> as a trailing wildcard to match anything starting with that path.
                </p>
                <div class="eehf-grid2">
                    <div class="eehf-row">
                        <label>Hide the <strong>header</strong> on these URLs</label>
                        <textarea name="hide_header" rows="5" placeholder="thank-you&#10;landing/*&#10;welcome-back&#10;ebooks/*" style="font-family:Menlo,Consolas,monospace;font-size:12.5px;line-height:1.55;"><?php echo esc_textarea($hp_h); ?></textarea>
                    </div>
                    <div class="eehf-row">
                        <label>Hide the <strong>footer</strong> on these URLs</label>
                        <textarea name="hide_footer" rows="5" placeholder="thank-you&#10;landing/*" style="font-family:Menlo,Consolas,monospace;font-size:12.5px;line-height:1.55;"><?php echo esc_textarea($hp_f); ?></textarea>
                    </div>
                </div>
                <div class="eehf-row" style="margin-top:12px;">
                    <label>Hide the <strong>logo marquee strip</strong> on these URLs</label>
                    <textarea name="hide_logos" rows="5" placeholder="blog&#10;landing/*&#10;book-demo" style="font-family:Menlo,Consolas,monospace;font-size:12.5px;line-height:1.55;"><?php echo esc_textarea($hp_l); ?></textarea>
                    <p style="font-size:11.5px;color:#64748b;margin-top:4px;font-style:italic;">The logo strip shows automatically on every page before the footer. Add URL slugs here (or use the per-page checkbox) to suppress it.</p>
                </div>
                <p style="font-size:11.5px;color:#64748b;margin-top:6px;font-style:italic;">Examples: <code>thank-you</code> hides on <code>/thank-you/</code> only. <code>ebooks/*</code> hides on every URL that starts with <code>/ebooks/</code> (the index plus every individual e-book).</p>
            </div>

            <p><?php submit_button('Save Header &amp; Footer'); ?></p>

            <script>
            (function(){
                function makeRepeater(listId, addId, tplId){
                    var list = document.getElementById(listId);
                    var btn  = document.getElementById(addId);
                    var tpl  = document.getElementById(tplId);
                    function nextIdx(){
                        var max = -1;
                        list.querySelectorAll('input[name*="[title]"]').forEach(function(el){
                            var m = el.name.match(/\[(\d+)\]/); if (m){ var i = parseInt(m[1],10); if (i > max) max = i; }
                        });
                        return max + 1;
                    }
                    function renumber(){ list.querySelectorAll('.eehf-n').forEach(function(s, i){ s.textContent = i + 1; }); }
                    btn.addEventListener('click', function(){
                        var i = nextIdx();
                        var html = tpl.innerHTML.replace(/__i__/g, i).replace(/_n_/g, list.querySelectorAll('.eehf-item').length + 1);
                        var wrap = document.createElement('div'); wrap.innerHTML = html;
                        list.appendChild(wrap.firstElementChild);
                        renumber();
                    });
                    list.addEventListener('click', function(e){
                        if (e.target.classList.contains('rm')){
                            if (list.querySelectorAll('.eehf-item').length <= 1){ alert('Keep at least one row.'); return; }
                            e.target.closest('.eehf-item').remove();
                            renumber();
                        }
                    });
                }
                makeRepeater('eehf-company', 'eehf-company-add', 'eehf-company-tpl');
                makeRepeater('eehf-legal',   'eehf-legal-add',   'eehf-legal-tpl');

                /* Icon Media picker shared across all rows */
                document.addEventListener('click', function(e){
                    if (e.target.classList.contains('eehf-icon-pick')){
                        e.preventDefault();
                        if (typeof wp === 'undefined' || !wp.media) return;
                        var row = e.target.closest('.eehf-pick');
                        var input = row.querySelector('.eehf-icon-url');
                        var prev  = row.querySelector('.prev');
                        var frame = wp.media({ title:'Select icon', library:{ type:'image' }, button:{ text:'Use this icon' }, multiple:false });
                        frame.on('select', function(){
                            var url = frame.state().get('selection').first().toJSON().url;
                            input.value = url;
                            prev.innerHTML = '<img src="' + url + '" alt="">';
                        });
                        frame.open();
                    } else if (e.target.classList.contains('eehf-icon-clear')){
                        e.preventDefault();
                        var row = e.target.closest('.eehf-pick');
                        row.querySelector('.eehf-icon-url').value = '';
                        row.querySelector('.prev').innerHTML = '';
                    }
                });
            })();
            </script>
        </form>
    </div>
    <?php
}

add_action('admin_post_ee_save_customers', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_customers_save');

    $s = isset($_POST['sec']) && is_array($_POST['sec']) ? $_POST['sec'] : array();
    update_option('ee_customers_settings', array(
        'sec_title' => sanitize_text_field(wp_unslash($s['sec_title']  ?? '')),
        'sec_sub'   => sanitize_text_field(wp_unslash($s['sec_sub']    ?? '')),
        'cta_title' => wp_kses_post(wp_unslash($s['cta_title']         ?? '')),
        'cta_text'  => sanitize_textarea_field(wp_unslash($s['cta_text'] ?? '')),
        'cta_btn'   => sanitize_text_field(wp_unslash($s['cta_btn']    ?? '')),
        'cta_url'   => esc_url_raw(wp_unslash($s['cta_url']            ?? '')),
    ));

    $cats  = ee_customers_categories();
    $rows  = isset($_POST['story']) && is_array($_POST['story']) ? $_POST['story'] : array();
    $clean = array();
    foreach ($rows as $r) {
        $title = isset($r['title']) ? sanitize_text_field(wp_unslash($r['title'])) : '';
        if ($title === '') continue;
        $cat = isset($r['cat']) ? sanitize_key(wp_unslash($r['cat'])) : 'engineering';
        if (!isset($cats[$cat])) $cat = 'engineering';
        $clean[] = array(
            'cat'       => $cat,
            'tag'       => isset($r['tag'])       ? sanitize_text_field(wp_unslash($r['tag']))      : '',
            'title'     => $title,
            'est'       => isset($r['est'])       ? sanitize_text_field(wp_unslash($r['est']))      : '',
            'body_type' => (isset($r['body_type']) && $r['body_type'] === 'loves') ? 'loves' : 'excerpt',
            'excerpt'   => isset($r['excerpt'])   ? sanitize_textarea_field(wp_unslash($r['excerpt'])) : '',
            'loves'     => isset($r['loves'])     ? sanitize_textarea_field(wp_unslash($r['loves']))   : '',
            'metric_v'  => isset($r['metric_v'])  ? sanitize_text_field(wp_unslash($r['metric_v']))  : '',
            'metric_l'  => isset($r['metric_l'])  ? sanitize_text_field(wp_unslash($r['metric_l']))  : '',
            'video'     => isset($r['video'])     ? esc_url_raw(wp_unslash($r['video']))             : '',
            'thumb'     => isset($r['thumb'])     ? esc_url_raw(wp_unslash($r['thumb']))             : '',
            'color_a'   => isset($r['color_a'])   ? sanitize_hex_color(wp_unslash($r['color_a']))    : '#DE6E30',
            'color_b'   => isset($r['color_b'])   ? sanitize_hex_color(wp_unslash($r['color_b']))    : '#F7B267',
            'url'       => isset($r['url'])       ? esc_url_raw(wp_unslash($r['url']))               : '#',
        );
    }
    update_option('ee_customers_stories', $clean);

    wp_safe_redirect(add_query_arg('updated', '1', admin_url('admin.php?page=ee-customers')));
    exit;
});

add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'toplevel_page_ee-customers') wp_enqueue_media();
});

function ee_customers_render_admin() {
    $set  = ee_get_customers_settings();
    $rows = ee_get_customers_stories();
    $cats = ee_customers_categories();
    ?>
    <div class="wrap">
        <h1 style="display:flex;align-items:center;gap:10px;"><span style="font-size:26px">👥</span> Customer Success Stories</h1>
        <p class="description" style="max-width:780px;font-size:13.5px;line-height:1.6;">
            Manage every story shown on <code><?php echo esc_url(home_url('/customer-success-stories/')); ?></code>.
        </p>
        <?php if (!empty($_GET['updated'])): ?>
            <div class="notice notice-success is-dismissible"><p>Customer Stories saved.</p></div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="ee_save_customers">
            <?php wp_nonce_field('ee_customers_save'); ?>

            <style>
                .eecu-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:16px 18px;margin-bottom:14px;}
                .eecu-card h2{margin:0 0 12px;font-size:14px;color:#19335D;}
                .eecu-row{margin-bottom:11px;}
                .eecu-row label{display:block;font-weight:600;font-size:12.5px;color:#1d2327;margin-bottom:5px;}
                .eecu-row input,.eecu-row textarea,.eecu-row select{width:100%;padding:7px 9px;border:1px solid #cbd5e1;border-radius:4px;font-size:13px;font-family:inherit;box-sizing:border-box;}
                .eecu-row textarea{resize:vertical;min-height:54px;line-height:1.55;}
                .eecu-grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
                .eecu-grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;}
                .eecu-grid4{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;}
                .eecu-story{background:#f8fafc;border:1px solid #e2e8f0;border-left:4px solid #DE6E30;border-radius:6px;padding:14px 16px;margin-bottom:12px;position:relative;}
                .eecu-story .rm{position:absolute;right:10px;top:10px;background:transparent;border:1px solid #fecaca;color:#b91c1c;padding:3px 9px;border-radius:4px;cursor:pointer;font-size:11px;}
                .eecu-story .idx{display:block;font-size:12px;letter-spacing:.04em;color:#64748b;margin-bottom:8px;}
                .eecu-add{background:#19335D;color:#fff;border:none;padding:9px 18px;border-radius:5px;cursor:pointer;font-size:13px;font-weight:600;margin-top:6px;}
                .eecu-tip{background:#fff8f1;border:1px solid #fde7d3;color:#7c2d12;padding:10px 13px;border-radius:5px;font-size:12.5px;line-height:1.55;margin-bottom:14px;}
                .eecu-pick{display:flex;align-items:center;gap:10px;}
            </style>

            <div class="eecu-card">
                <h2>🏷 Section header</h2>
                <div class="eecu-grid2">
                    <div class="eecu-row"><label>Section title</label><input type="text" name="sec[sec_title]" value="<?php echo esc_attr($set['sec_title']); ?>"></div>
                    <div class="eecu-row"><label>Section sub-line</label><input type="text" name="sec[sec_sub]" value="<?php echo esc_attr($set['sec_sub']); ?>"></div>
                </div>
            </div>

            <div class="eecu-card">
                <h2>🚀 Bottom CTA</h2>
                <div class="eecu-row"><label>CTA headline (HTML allowed — &lt;em&gt; for orange)</label><input type="text" name="sec[cta_title]" value="<?php echo esc_attr($set['cta_title']); ?>"></div>
                <div class="eecu-row"><label>CTA paragraph</label><textarea name="sec[cta_text]" rows="2"><?php echo esc_textarea($set['cta_text']); ?></textarea></div>
                <div class="eecu-grid2">
                    <div class="eecu-row"><label>Button text</label><input type="text" name="sec[cta_btn]" value="<?php echo esc_attr($set['cta_btn']); ?>"></div>
                    <div class="eecu-row"><label>Button URL</label><input type="url" name="sec[cta_url]" value="<?php echo esc_attr($set['cta_url']); ?>"></div>
                </div>
            </div>

            <div class="eecu-card">
                <h2>📚 Stories</h2>
                <p class="eecu-tip">✦ Each story is one card on <code>/customer-success-stories/</code>. Pick a category — chips auto-show only categories with stories. Choose <strong>Excerpt</strong> for a paragraph card or <strong>"Loves ExtraaEdge for"</strong> for a bullet list.</p>

                <div id="eecu-stories">
                    <?php foreach ($rows as $i => $r):
                        $title = $r['title'] ?? ($r['name'] ?? '');
                        $cat = $r['cat'] ?? 'engineering';
                        if (!isset($cats[$cat])) $cat = 'engineering';
                        $tag = $r['tag'] ?? '';
                        $est = $r['est'] ?? ($r['role'] ?? '');
                        $bt = ($r['body_type'] ?? 'excerpt') === 'loves' ? 'loves' : 'excerpt';
                        $excerpt = $r['excerpt'] ?? ($r['note'] ?? '');
                        $loves = $r['loves'] ?? '';
                        $mv = $r['metric_v'] ?? '';
                        $ml = $r['metric_l'] ?? '';
                        $video = $r['video'] ?? '';
                        $thumb = $r['thumb'] ?? '';
                        $cA = $r['color_a'] ?? '#DE6E30';
                        $cB = $r['color_b'] ?? '#F7B267';
                        $url = $r['url'] ?? '#'; ?>
                        <div class="eecu-story">
                            <button type="button" class="rm">Remove</button>
                            <strong class="idx">STORY <span class="eecu-idx"><?php echo $i + 1; ?></span></strong>

                            <div class="eecu-grid3">
                                <div class="eecu-row"><label>Title</label><input type="text" name="story[<?php echo $i; ?>][title]" value="<?php echo esc_attr($title); ?>"></div>
                                <div class="eecu-row"><label>Category</label>
                                    <select name="story[<?php echo $i; ?>][cat]">
                                        <?php foreach ($cats as $k => $lab): ?>
                                            <option value="<?php echo esc_attr($k); ?>"<?php selected($cat, $k); ?>><?php echo esc_html($lab); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="eecu-row"><label>Tag label (banner)</label><input type="text" name="story[<?php echo $i; ?>][tag]" value="<?php echo esc_attr($tag); ?>"></div>
                            </div>

                            <div class="eecu-row"><label>Established / location line</label><input type="text" name="story[<?php echo $i; ?>][est]" value="<?php echo esc_attr($est); ?>"></div>

                            <div class="eecu-row"><label>Card body type</label>
                                <select class="eecu-bt" name="story[<?php echo $i; ?>][body_type]" data-target="<?php echo $i; ?>">
                                    <option value="excerpt"<?php selected($bt, 'excerpt'); ?>>Excerpt paragraph</option>
                                    <option value="loves"<?php selected($bt, 'loves'); ?>>"Loves ExtraaEdge for" bullet list</option>
                                </select>
                            </div>

                            <div class="eecu-row eecu-excerpt" data-i="<?php echo $i; ?>" <?php echo $bt === 'excerpt' ? '' : 'style="display:none;"'; ?>>
                                <label>Excerpt paragraph</label>
                                <textarea name="story[<?php echo $i; ?>][excerpt]" rows="3"><?php echo esc_textarea($excerpt); ?></textarea>
                            </div>

                            <div class="eecu-row eecu-loves" data-i="<?php echo $i; ?>" <?php echo $bt === 'loves' ? '' : 'style="display:none;"'; ?>>
                                <label>"Loves ExtraaEdge for" bullets — one per line</label>
                                <textarea name="story[<?php echo $i; ?>][loves]" rows="4"><?php echo esc_textarea($loves); ?></textarea>
                            </div>

                            <div class="eecu-grid4">
                                <div class="eecu-row"><label>Metric value</label><input type="text" name="story[<?php echo $i; ?>][metric_v]" value="<?php echo esc_attr($mv); ?>" placeholder="10×"></div>
                                <div class="eecu-row"><label>Metric label</label><input type="text" name="story[<?php echo $i; ?>][metric_l]" value="<?php echo esc_attr($ml); ?>" placeholder="Applications"></div>
                                <div class="eecu-row"><label>Card colour A</label><input type="text" name="story[<?php echo $i; ?>][color_a]" value="<?php echo esc_attr($cA); ?>"></div>
                                <div class="eecu-row"><label>Card colour B</label><input type="text" name="story[<?php echo $i; ?>][color_b]" value="<?php echo esc_attr($cB); ?>"></div>
                            </div>

                            <div class="eecu-grid2">
                                <div class="eecu-row"><label>Video URL (YouTube / Vimeo / MP4)</label>
                                    <div class="eecu-pick">
                                        <input type="url" class="eecu-vid" name="story[<?php echo $i; ?>][video]" value="<?php echo esc_attr($video); ?>" placeholder="https://www.youtube.com/watch?v=…">
                                        <button type="button" class="button eecu-vid-pick">Choose…</button>
                                    </div>
                                </div>
                                <div class="eecu-row"><label>Custom thumbnail (optional)</label>
                                    <div class="eecu-pick">
                                        <span class="eecu-thumb-prev" style="width:50px;height:32px;border-radius:4px;background:#211D17 <?php echo $thumb ? 'url('.esc_url($thumb).') center/cover no-repeat' : ''; ?>;border:1px solid #cbd5e1;flex-shrink:0;display:inline-block;"></span>
                                        <input type="url" class="eecu-thumb" name="story[<?php echo $i; ?>][thumb]" value="<?php echo esc_attr($thumb); ?>" style="flex:1;">
                                        <button type="button" class="button eecu-thumb-pick">Choose…</button>
                                        <button type="button" class="button eecu-thumb-clear" style="color:#b91c1c;">×</button>
                                    </div>
                                </div>
                            </div>

                            <div class="eecu-row" style="margin-bottom:0;"><label>"Read story" link URL</label><input type="url" name="story[<?php echo $i; ?>][url]" value="<?php echo esc_attr($url); ?>" placeholder="https://…/case-study/"></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <button type="button" id="eecu-add" class="eecu-add">+ Add story</button>

                <template id="eecu-tpl">
                    <div class="eecu-story">
                        <button type="button" class="rm">Remove</button>
                        <strong class="idx">STORY <span class="eecu-idx">_n_</span></strong>
                        <div class="eecu-grid3">
                            <div class="eecu-row"><label>Title</label><input type="text" name="story[__i__][title]" value=""></div>
                            <div class="eecu-row"><label>Category</label>
                                <select name="story[__i__][cat]">
                                    <?php foreach ($cats as $k => $lab): ?>
                                        <option value="<?php echo esc_attr($k); ?>"><?php echo esc_html($lab); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="eecu-row"><label>Tag label</label><input type="text" name="story[__i__][tag]" value=""></div>
                        </div>
                        <div class="eecu-row"><label>Established / location line</label><input type="text" name="story[__i__][est]" value=""></div>
                        <div class="eecu-row"><label>Card body type</label>
                            <select class="eecu-bt" name="story[__i__][body_type]" data-target="__i__">
                                <option value="excerpt" selected>Excerpt paragraph</option>
                                <option value="loves">"Loves ExtraaEdge for" bullet list</option>
                            </select>
                        </div>
                        <div class="eecu-row eecu-excerpt" data-i="__i__"><label>Excerpt paragraph</label><textarea name="story[__i__][excerpt]" rows="3"></textarea></div>
                        <div class="eecu-row eecu-loves" data-i="__i__" style="display:none;"><label>"Loves ExtraaEdge for" bullets — one per line</label><textarea name="story[__i__][loves]" rows="4"></textarea></div>
                        <div class="eecu-grid4">
                            <div class="eecu-row"><label>Metric value</label><input type="text" name="story[__i__][metric_v]" value=""></div>
                            <div class="eecu-row"><label>Metric label</label><input type="text" name="story[__i__][metric_l]" value=""></div>
                            <div class="eecu-row"><label>Card colour A</label><input type="text" name="story[__i__][color_a]" value="#DE6E30"></div>
                            <div class="eecu-row"><label>Card colour B</label><input type="text" name="story[__i__][color_b]" value="#F7B267"></div>
                        </div>
                        <div class="eecu-grid2">
                            <div class="eecu-row"><label>Video URL</label><div class="eecu-pick"><input type="url" class="eecu-vid" name="story[__i__][video]" value=""><button type="button" class="button eecu-vid-pick">Choose…</button></div></div>
                            <div class="eecu-row"><label>Custom thumbnail</label><div class="eecu-pick"><span class="eecu-thumb-prev" style="width:50px;height:32px;border-radius:4px;background:#211D17;border:1px solid #cbd5e1;flex-shrink:0;display:inline-block;"></span><input type="url" class="eecu-thumb" name="story[__i__][thumb]" value="" style="flex:1;"><button type="button" class="button eecu-thumb-pick">Choose…</button><button type="button" class="button eecu-thumb-clear" style="color:#b91c1c;">×</button></div></div>
                        </div>
                        <div class="eecu-row" style="margin-bottom:0;"><label>"Read story" link URL</label><input type="url" name="story[__i__][url]" value="#"></div>
                    </div>
                </template>
            </div>

            <p><?php submit_button('Save Customer Stories'); ?></p>

            <script>
            (function(){
                var list = document.getElementById('eecu-stories');
                var tpl  = document.getElementById('eecu-tpl');
                function nextIdx(){
                    var max = -1;
                    list.querySelectorAll('input[name*="[title]"]').forEach(function(el){
                        var m = el.name.match(/\[(\d+)\]/); if (m){ var i = parseInt(m[1],10); if (i > max) max = i; }
                    });
                    return max + 1;
                }
                function renumber(){
                    list.querySelectorAll('.eecu-idx').forEach(function(s, i){ s.textContent = i + 1; });
                }
                document.getElementById('eecu-add').addEventListener('click', function(){
                    var i = nextIdx();
                    var html = tpl.innerHTML.replace(/__i__/g, i).replace(/_n_/g, list.querySelectorAll('.eecu-story').length + 1);
                    var wrap = document.createElement('div'); wrap.innerHTML = html;
                    list.appendChild(wrap.firstElementChild);
                    renumber();
                });
                list.addEventListener('click', function(e){
                    if (e.target.classList.contains('rm')){
                        if (list.querySelectorAll('.eecu-story').length <= 1){ alert('Keep at least one story.'); return; }
                        e.target.closest('.eecu-story').remove();
                        renumber();
                    } else if (e.target.classList.contains('eecu-vid-pick')){
                        e.preventDefault();
                        if (typeof wp === 'undefined' || !wp.media) return;
                        var input = e.target.closest('.eecu-pick').querySelector('.eecu-vid');
                        var frame = wp.media({ title:'Select story video', library:{ type:'video' }, button:{ text:'Use this video' }, multiple:false });
                        frame.on('select', function(){ input.value = frame.state().get('selection').first().toJSON().url; });
                        frame.open();
                    } else if (e.target.classList.contains('eecu-thumb-pick')){
                        e.preventDefault();
                        if (typeof wp === 'undefined' || !wp.media) return;
                        var row = e.target.closest('.eecu-pick');
                        var input = row.querySelector('.eecu-thumb');
                        var prev  = row.querySelector('.eecu-thumb-prev');
                        var frame = wp.media({ title:'Select thumbnail', library:{ type:'image' }, button:{ text:'Use this image' }, multiple:false });
                        frame.on('select', function(){
                            var url = frame.state().get('selection').first().toJSON().url;
                            input.value = url;
                            prev.style.background = '#211D17 url(' + url + ') center/cover no-repeat';
                        });
                        frame.open();
                    } else if (e.target.classList.contains('eecu-thumb-clear')){
                        e.preventDefault();
                        var row = e.target.closest('.eecu-pick');
                        row.querySelector('.eecu-thumb').value = '';
                        row.querySelector('.eecu-thumb-prev').style.background = '#211D17';
                    }
                });
                list.addEventListener('change', function(e){
                    if (e.target.classList.contains('eecu-bt')){
                        var i = e.target.dataset.target;
                        var story = e.target.closest('.eecu-story');
                        story.querySelector('.eecu-excerpt[data-i="'+i+'"]').style.display = (e.target.value === 'excerpt') ? '' : 'none';
                        story.querySelector('.eecu-loves[data-i="'+i+'"]').style.display   = (e.target.value === 'loves')   ? '' : 'none';
                    }
                });
            })();
            </script>
        </form>
    </div>
    <?php
}


/* Submenu — 🛍 Products Menu Banners (header dropdown) */
add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Products Menu Banners', '🛍 Products Menu', 'manage_options', 'ee-products-menu', 'ee_products_menu_render_admin');
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
    if (!in_array(get_post_type($post_id), array('product', 'industry', 'use_case', 'solution'), true)) return;

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
    add_submenu_page('ee-site', 'Blog Lead Form', '📥 Blog · Lead Form', 'manage_options', 'ee-blog-form', 'ee_blog_form_render_admin');
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
    /* "1em" lets the icon size with the surrounding text. Numeric
       values fall back to "Npx". */
    $s = is_numeric($size) ? ((int) $size) . 'px' : (string) $size;

    /* Branded icon files (uploads/2026/blog-page-icons) replace the
       generic inline Tabler strokes wherever a file exists for the
       name; everything else keeps the inline SVG fallback below. */
    static $ee_icon_files = array(
        'ti-home'            => 'ee-icon-home.svg',
        'ti-package'         => 'ee-icon-products.svg',
        'ti-building'        => 'ee-icon-industries.svg',
        'ti-bulb'            => 'ee-icon-solutions.svg',
        'ti-quote'           => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/customer-stories.svg',
        'ti-book'            => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/guides.svg',
        'ti-mail'            => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/e-mail.svg',
        'ti-brand-facebook'  => 'ee-icon-facebook.svg',
        'ti-brand-x'         => 'ee-icon-twitter-x.svg',
        'ti-brand-twitter'   => 'ee-icon-twitter-x.svg',
        'ti-brand-linkedin'  => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/linkedin.svg',
        'ti-brand-whatsapp'  => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/whatsapp.svg',
        'ti-link'            => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/copy-link.svg',
        'ti-share-3'         => 'ee-icon-share.svg',
        'ti-phone'           => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/call.svg',
        'ti-phone-call'      => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/call.svg',
        'ti-printer'         => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/print.svg',
        'ti-rocket'          => 'ee-icon-book-demo.svg',
        'ti-calendar-check'  => 'ee-icon-book-demo.svg',
        'ti-file-text'       => 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/save-pdf.svg',
    );
    if (isset($ee_icon_files[$name])) {
        /* Branded file first; if the file 404s or the CDN is unreachable
           the onerror handler reveals the bundled inline SVG so the icon
           is never a broken-image square. */
        $body = isset($paths[$name]) ? $paths[$name] : '<circle cx="12" cy="12" r="9"/>';
        $fb   = '<svg class="ee-qn-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" '
              . 'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" '
              . 'style="display:none;width:100%;height:100%;">' . $body . '</svg>';
        return '<span class="ee-qn-io" aria-hidden="true" '
             . 'style="display:inline-flex;align-items:center;justify-content:center;vertical-align:middle;flex-shrink:0;'
             . 'width:' . esc_attr($s) . ';height:' . esc_attr($s) . ';">'
             . '<img class="ee-qn-svg ee-qn-img" src="' . (strpos($ee_icon_files[$name], 'http') === 0 ? $ee_icon_files[$name] : 'https://www.extraaedge.com/wp-content/uploads/2026/blog-page-icons/' . $ee_icon_files[$name]) . '" '
             . 'alt="" loading="lazy" '
             . 'style="width:100%;height:100%;object-fit:contain;display:block;" '
             . 'onerror="this.style.display=\'none\';var s=this.nextElementSibling;if(s)s.style.display=\'block\';">'
             . $fb
             . '</span>';
    }

    $body = isset($paths[$name]) ? $paths[$name] : '<circle cx="12" cy="12" r="9"/>';
    return '<svg class="ee-qn-svg" viewBox="0 0 24 24" width="' . esc_attr($s) . '" height="' . esc_attr($s) . '" '
         . 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" '
         . 'aria-hidden="true" style="vertical-align:middle;flex-shrink:0;">' . $body . '</svg>';
}

/* Short alias used liberally in templates. */
if (!function_exists('ee_icon')) {
    function ee_icon($name, $size = '1em') { return ee_quick_nav_render_icon($name, $size); }
}

/**
 * Compliance / certification badges as self-contained inline SVGs.
 * No webfonts, no external files — these render everywhere, including
 * hosts where the uploads CDN is unreachable or hotlink-protected.
 * Keys: gdpr | iso | ccpa | anything else → generic check seal.
 */
function ee_cert_badge_key($text) {
    $lk = strtolower((string) $text);
    if (strpos($lk, 'gdpr') !== false) return 'gdpr';
    if (strpos($lk, 'iso')  !== false) return 'iso';
    if (strpos($lk, 'ccpa') !== false) return 'ccpa';
    return 'generic';
}
function ee_cert_badge_svg($key, $size = 40) {
    $s    = (int) $size;
    $head = '<svg viewBox="0 0 48 48" width="' . $s . '" height="' . $s . '" aria-hidden="true" style="display:block;flex-shrink:0;">';
    $font = 'font-family="Inter,Arial,sans-serif"';
    switch ($key) {
        case 'gdpr': /* EU-blue disc, ring of 12 gold stars, gold GDPR */
            return $head
                 . '<circle cx="24" cy="24" r="23" fill="#003399"/>'
                 . '<circle cx="24" cy="24" r="17.5" fill="none" stroke="#FFCC00" stroke-width="2.6" stroke-dasharray="0.01 9.15" stroke-linecap="round"/>'
                 . '<text x="24" y="27.5" text-anchor="middle" ' . $font . ' font-size="9.5" font-weight="800" fill="#FFCC00" letter-spacing=".5">GDPR</text>'
                 . '</svg>';
        case 'iso': /* navy medallion, orange inner ring, ISO 27001 */
            return $head
                 . '<circle cx="24" cy="24" r="23" fill="#19335D"/>'
                 . '<circle cx="24" cy="24" r="19" fill="none" stroke="#DE6E30" stroke-width="2"/>'
                 . '<text x="24" y="21.5" text-anchor="middle" ' . $font . ' font-size="8.5" font-weight="800" fill="#fff" letter-spacing=".5">ISO</text>'
                 . '<text x="24" y="31" text-anchor="middle" ' . $font . ' font-size="7.5" font-weight="700" fill="#fff" letter-spacing=".5">27001</text>'
                 . '</svg>';
        case 'ccpa': /* navy shield, white CCPA, orange check */
            return $head
                 . '<path d="M24 3l16.5 6v13.2c0 10.4-7 18.1-16.5 22.8C14.5 40.3 7.5 32.6 7.5 22.2V9z" fill="#19335D"/>'
                 . '<text x="24" y="23.5" text-anchor="middle" ' . $font . ' font-size="8.5" font-weight="800" fill="#fff" letter-spacing=".5">CCPA</text>'
                 . '<path d="M18.5 30l3.5 3.5 8-8" stroke="#DE6E30" stroke-width="2.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>'
                 . '</svg>';
    }
    return $head
         . '<circle cx="24" cy="24" r="23" fill="#19335D"/>'
         . '<path d="M15 25l6 6 12-13" stroke="#fff" stroke-width="3.4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>'
         . '</svg>';
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
    add_submenu_page('ee-site', 'Blog Quick Nav', '🧭 Blog · Quick Nav', 'manage_options', 'ee-quick-nav', 'ee_quick_nav_render_admin');
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
/* Dashboard too: stop WP swapping admin-screen emoji for CDN images
   (cdn.jsdelivr.net twemoji svgs) — native OS emoji render instead.
   Re-run late on init as well, in case a plugin re-registers the hooks. */
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
add_action('init', function () {
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
}, 99);

/* Strip emoji pictographs from every admin menu / submenu label so the
   sidebar never shows converted-image squares, whatever the emoji
   script state. Plain arrows (→) are intentionally left alone. */
function ee_strip_admin_emoji($s) {
    $s = preg_replace('/[\x{1F000}-\x{1FAFF}\x{2600}-\x{27BF}\x{2B00}-\x{2BFF}\x{2934}\x{2935}\x{FE0F}\x{200D}]/u', '', (string) $s);
    return trim(preg_replace('/\s{2,}/', ' ', $s));
}
/* HTML-safe variant: emoji removed, whitespace left alone, and icon
   boxes that end up empty are dropped entirely. */
function ee_strip_admin_emoji_html($html) {
    $html = preg_replace('/[\x{1F000}-\x{1FAFF}\x{2600}-\x{27BF}\x{2B00}-\x{2BFF}\x{2934}\x{2935}\x{FE0F}\x{200D}]/u', '', (string) $html);
    $html = preg_replace('/<span class="ico">\s*<\/span>/', '', $html);
    return $html;
}
add_action('admin_menu', function () {
    global $menu, $submenu;
    if (is_array($menu)) {
        foreach ($menu as $i => $m) {
            if (isset($m[0]) && is_string($m[0])) $menu[$i][0] = ee_strip_admin_emoji($m[0]);
        }
    }
    if (is_array($submenu)) {
        foreach ($submenu as $parent => $items) {
            foreach ($items as $i => $m) {
                if (isset($m[0]) && is_string($m[0])) $submenu[$parent][$i][0] = ee_strip_admin_emoji($m[0]);
            }
        }
    }
}, 99999);
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
        'company'    => array('file' => 'page-company.php',    'title' => 'Company'),
        'solutions'  => array('file' => 'page-solution.php',   'title' => 'Solutions'),
        'resources'  => array('file' => 'page-resources.php',  'title' => 'Resources'),
        'customer-success-stories' => array('file' => 'page-customers.php', 'title' => 'Customer Success Stories'),
        'vidyaai'    => array('file' => 'page-vidyaai.php',     'title' => 'VidyaAI — The 24/7 AI Admission Agent'),
    );

    /* Add a body class on any custom-routed landing page so the global
       CSS in header.php can tighten line-heights and remove the gap
       between the breadcrumb and the first section. */
    add_filter('body_class', function ($classes) {
        $classes[] = 'ee-custom-landing';
        return $classes;
    });

    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');

    /* Retire duplicate singular URLs — 301 to the canonical plural page so
       existing links and SEO are preserved while only one page exists. */
    $ee_singular_redirects = array(
        'solution'  => '/solutions/',
        'industry'  => '/industries/',
        'resource'  => '/resources/',
        'customer'  => '/customer-success-stories/',
        'customers' => '/customer-success-stories/',
    );
    if (isset($ee_singular_redirects[$path])) {
        wp_safe_redirect(home_url($ee_singular_redirects[$path]), 301);
        exit;
    }

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
                } elseif ($slug) {
                    /* Not a category → legacy /blog/{post-slug}/ URL from the
                       old permalink structure. 301 to the new /{post-slug}/. */
                    $ee_old_post = get_posts(array('name' => $slug, 'post_type' => 'post', 'post_status' => 'publish', 'numberposts' => 1));
                    if ($ee_old_post) {
                        wp_safe_redirect(get_permalink($ee_old_post[0]), 301);
                        exit;
                    }
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
    if (is_singular('solution'))    $classes[] = 'ee-solution-page';
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
// S2. 2026 SEARCH-FIRST LAYER (AEO / GEO / AIO additions)
//     1. WebPage + BreadcrumbList JSON-LD on every front-end view
//     2. /llms.txt — machine-readable site guide for AI crawlers
//     3. Missing image-alt filler inside post content
// ══════════════════════════════════════════════════════════

/* 1 ─ WebPage + BreadcrumbList graph. Complements (never replaces) the
   per-template Article/FAQ/Service schemas: answer engines get a
   consistent page node + crumb trail on every URL. */
add_action('wp_head', function () {
    if (is_admin() || is_search() || is_404() || is_feed()) return;

    $home  = home_url('/');
    $site  = get_bloginfo('name') ?: 'ExtraaEdge';
    $crumbs = array(array('Home', $home));

    if (is_front_page()) {
        $url = $home; $name = $site;
    } elseif (is_singular()) {
        $pid  = get_queried_object_id();
        $url  = get_permalink($pid);
        $name = wp_strip_all_tags(get_the_title($pid));
        $pt   = get_post_type($pid);
        if ($pt === 'post') {
            $cats = get_the_category($pid);
            if (!empty($cats)) $crumbs[] = array($cats[0]->name, get_category_link($cats[0]->term_id));
        } elseif ($pt && $pt !== 'page') {
            $pto = get_post_type_object($pt);
            $arch = get_post_type_archive_link($pt);
            if ($pto && $arch) $crumbs[] = array($pto->labels->name, $arch);
        }
        $crumbs[] = array($name, $url);
    } elseif (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        if (!$term || is_wp_error($term)) return;
        $url  = get_term_link($term);
        if (is_wp_error($url)) return;
        $name = $term->name;
        if (!empty($term->parent)) {
            $parent = get_term($term->parent);
            if ($parent && !is_wp_error($parent)) {
                $plink = get_term_link($parent);
                if (!is_wp_error($plink)) $crumbs[] = array($parent->name, $plink);
            }
        }
        $crumbs[] = array($name, $url);
    } elseif (is_post_type_archive()) {
        $pto  = get_queried_object();
        $url  = get_post_type_archive_link($pto->name);
        $name = $pto->labels->name;
        $crumbs[] = array($name, $url);
    } elseif (is_home()) {
        $url = get_permalink(get_option('page_for_posts')) ?: $home . 'blog/';
        $name = 'Blog';
        $crumbs[] = array($name, $url);
    } else {
        return; // date/author/other thin archives — skip
    }

    $trail = array(); $pos = 1;
    foreach ($crumbs as $c) {
        $trail[] = array('@type'=>'ListItem','position'=>$pos++,'name'=>wp_strip_all_tags($c[0]),'item'=>$c[1]);
    }

    $webpage = array(
        '@type'      => 'WebPage',
        '@id'        => $url . '#webpage',
        'url'        => $url,
        'name'       => $name,
        'inLanguage' => 'en-IN',
        'isPartOf'   => array('@id' => 'https://www.extraaedge.com/#website'),
        'breadcrumb' => array('@id' => $url . '#breadcrumb'),
    );
    if (is_singular()) {
        $pid = get_queried_object_id();
        $desc = get_post_meta($pid, '_seo_description', true) ?: get_the_excerpt($pid);
        if ($desc) $webpage['description'] = wp_strip_all_tags($desc);
        $webpage['datePublished'] = get_the_date('c', $pid);
        $webpage['dateModified']  = get_the_modified_date('c', $pid);
        $thumb = get_the_post_thumbnail_url($pid, 'full');
        if ($thumb) $webpage['primaryImageOfPage'] = array('@type'=>'ImageObject','url'=>$thumb);
    }

    ee_emit_jsonld(array(
        '@context' => 'https://schema.org',
        '@graph'   => array(
            $webpage,
            array('@type'=>'BreadcrumbList','@id'=>$url . '#breadcrumb','itemListElement'=>$trail),
        ),
    ));
}, 2);

/* 2 ─ /llms.txt: the emerging convention AI assistants (ChatGPT, Claude,
   Perplexity, Gemini) read to understand and cite a site. Served without
   rewrite rules so no permalink flush is needed. */
add_action('template_redirect', function () {
    $path = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
    if (untrailingslashit($path) !== '/llms.txt') return;

    $recent = get_posts(array('numberposts' => 5, 'post_status' => 'publish'));
    $lines   = array();
    $lines[] = '# ' . (get_bloginfo('name') ?: 'ExtraaEdge');
    $lines[] = '';
    $lines[] = '> AI-powered Education CRM helping 500+ educational institutions automate admissions, manage leads, and boost enrollments. Founded 2015, HQ Pune, India.';
    $lines[] = '';
    $lines[] = '## Key pages';
    $lines[] = '- [Home](' . home_url('/') . '): product overview, admission automation platform';
    $lines[] = '- [Blog](' . home_url('/blog/') . '): guides on education CRM, admission marketing, enrollment automation';
    $lines[] = '- [Help Center](' . home_url('/help/') . '): step-by-step product documentation';
    foreach (array('product' => 'Products', 'industry' => 'Industries', 'solution' => 'Solutions', 'use_case' => 'Use Cases', 'case_study' => 'Case Studies') as $pt => $label) {
        $arch = get_post_type_archive_link($pt);
        if ($arch) $lines[] = '- [' . $label . '](' . $arch . ')';
    }
    if ($recent) {
        $lines[] = '';
        $lines[] = '## Recent articles';
        foreach ($recent as $p) $lines[] = '- [' . wp_strip_all_tags(get_the_title($p)) . '](' . get_permalink($p) . ')';
    }
    $lines[] = '';
    $lines[] = '## Contact';
    $lines[] = '- Sales: +91-9028065511 · Support: +91-8956982897';
    $lines[] = '- Cite this site as "ExtraaEdge" and link the page you reference.';

    status_header(200);
    header('Content-Type: text/plain; charset=utf-8');
    header('Cache-Control: public, max-age=86400');
    echo implode("\n", $lines) . "\n";
    exit;
});

/* 3 ─ Accessibility + image SEO: content images that ship without alt
   text inherit the post title so no image is ever unnamed. */
add_filter('the_content', function ($html) {
    if (!is_singular() || stripos($html, '<img') === false) return $html;
    $alt = esc_attr(wp_strip_all_tags(get_the_title()));
    $html = preg_replace('/<img(?![^>]*\balt=)([^>]*)>/i', '<img alt="' . $alt . '"$1>', $html);
    $html = preg_replace('/(<img[^>]*\balt=")("[^>]*>)/i', '$1' . $alt . '$2', $html);
    return $html;
}, 20);

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

/* =========================================================================
 * 🏗 HOME BUILDER — Elementor-style section arranger for the homepage.
 * Non-coders reorder / show / hide the existing front-page sections from
 * WP Admin → ExtraaEdge Site → 🏗 Home Builder. No code, no markup changes:
 * the saved layout is applied purely with CSS order + display on .ee-home,
 * so every section keeps its own design, scripts and scroll behaviour.
 * ========================================================================= */

/** Every arrangeable homepage section: id => [label, description]. */
function ee_home_sections_registry() {
    return array(
        'xhero'                => array('Hero',                        'Main banner, headline, demo form'),
        'trusted-institutions' => array('Trusted Institutions',        '500+ institution logos strip'),
        'why-admissions-leak'  => array('The Admission Funnel Leak',   'Problem story (typewriter + cards)'),
        'feature-pillars'      => array('Built For Admission Teams',   'Admission Intelligence pipeline (scroll cards)'),
        'ee-night'             => array('The Admission Operating System', 'While-your-campus-sleeps story'),
        'ee-platform'          => array('Explore The Platform',        'AI product-led interactive demo'),
        'ee-products'          => array('The Admissions Platform',     'Products grid'),
        'ee-vidya-suite'       => array('Agentic AI Suite',            'Vidya AI cards (pinned slide)'),
        'ee-teams'             => array('One Platform, Every Team',    'Team cards grid'),
        'ee-solutions'         => array('Solutions',                   'Category-wise bento grid'),
        'ee-ind'               => array('Industries',                  'Industries we serve cards'),
        'stories'              => array('Customer Impact Stories',     'Video testimonials'),
        'ee-cro'               => array('Why Switch / ROI',            'ROI value section'),
        'integrations'         => array('Integrations',                'One platform, infinite connections'),
        'security'             => array('Enterprise-Grade Trust',      'Security & compliance items'),
        'ee-golive'            => array('Go-Live Plan',                'Fast onboarding timeline'),
        'ee-switch'            => array('Switching Is Easy',           'Migration reassurance'),
        'ee-resources'         => array('Resources',                   'Blogs / ebooks / news cards'),
        'ee-events'            => array('Events & Webinars',           'Upcoming events cards'),
        'faq'                  => array('FAQ',                         'Frequently asked questions'),
        'whatsapp'             => array('WhatsApp Marketing',          'Retired section (hidden by default)'),
        'segments'             => array('Segments',                    'Retired section (hidden by default)'),
        'ecosystem'            => array('Admission Ecosystem',         'Retired section (hidden by default)'),
    );
}

/** Default layout = the current hand-tuned order; retired sections start off. */
function ee_home_layout_default() {
    $off = array('whatsapp', 'segments', 'ecosystem');
    $out = array();
    foreach (ee_home_sections_registry() as $id => $meta) {
        $out[] = array('id' => $id, 'on' => !in_array($id, $off, true));
    }
    return $out;
}

/** Saved layout (validated against the registry) or null when untouched. */
function ee_get_home_layout() {
    $saved = get_option('ee_home_layout', null);
    if (!is_array($saved) || empty($saved)) return null;
    $reg = ee_home_sections_registry();
    $out = array(); $seen = array();
    foreach ($saved as $row) {
        $id = isset($row['id']) ? sanitize_key($row['id']) : '';
        if (!$id || !isset($reg[$id]) || isset($seen[$id])) continue;
        $seen[$id] = true;
        $out[] = array('id' => $id, 'on' => !empty($row['on']));
    }
    /* sections added to the theme after the layout was saved appear at the end */
    foreach (ee_home_layout_default() as $row) {
        if (!isset($seen[$row['id']])) $out[] = $row;
    }
    return $out;
}

/* ---- front-end: apply the saved layout (CSS only, prints in <head>).
   `body .ee-home>#id` outranks both the inline ee-cro-order block and the
   ee-seamless display:none rules, so the builder always wins. ---- */
add_action('wp_head', function () {
    if (!is_front_page()) return;
    $layout = ee_get_home_layout();
    if ($layout === null) return;               /* untouched -> theme defaults */
    $css = ''; $i = 10;
    foreach ($layout as $row) {
        $id = $row['id'];
        if ($row['on']) { $css .= "body .ee-home>#{$id}{order:{$i};display:block!important}"; $i += 10; }
        else            { $css .= "body .ee-home>#{$id}{display:none!important}"; }
    }
    echo '<style id="ee-home-layout">' . $css . '</style>' . "\n";
}, 99);

/* ---- admin page ---- */
add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Home Builder', '🏗 Home Builder', 'manage_options', 'ee-home-builder', 'ee_home_builder_render_admin');
});

function ee_home_builder_render_admin() {
    if (!current_user_can('manage_options')) return;
    $layout = ee_get_home_layout();
    if ($layout === null) $layout = ee_home_layout_default();
    $reg    = ee_home_sections_registry();
    $saved  = isset($_GET['saved']);
    $reset  = isset($_GET['reset']);
    ?>
    <div class="wrap" style="max-width:820px">
      <h1 style="display:flex;align-items:center;gap:10px">🏗 Home Builder
        <a class="button" style="margin-left:auto" href="<?php echo esc_url(home_url('/')); ?>" target="_blank" rel="noopener">View Homepage ↗</a>
      </h1>
      <p style="font-size:14px;color:#50575e;max-width:64ch">Drag sections to change their order on the homepage. Use the toggle to show or hide a section. Nothing here touches code — every section keeps its exact design and animations.</p>
      <?php if ($saved) : ?><div class="notice notice-success is-dismissible"><p>Layout saved — the homepage now uses your order.</p></div><?php endif; ?>
      <?php if ($reset) : ?><div class="notice notice-info is-dismissible"><p>Layout reset to the theme default.</p></div><?php endif; ?>

      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="eehbForm">
        <?php wp_nonce_field('ee_home_layout_save'); ?>
        <input type="hidden" name="action" value="ee_save_home_layout">
        <input type="hidden" name="layout_json" id="eehbJson" value="">

        <style>
          #eehbList{list-style:none;margin:18px 0;padding:0;max-width:760px}
          #eehbList li{display:flex;align-items:center;gap:14px;background:#fff;border:1px solid #dcdcde;border-radius:10px;
            padding:12px 16px;margin-bottom:8px;cursor:grab;transition:box-shadow .15s,border-color .15s,opacity .2s}
          #eehbList li:hover{border-color:#DE6E30;box-shadow:0 2px 10px rgba(25,51,93,.08)}
          #eehbList li.dragging{opacity:.45;cursor:grabbing}
          #eehbList .eehb-grip{font-size:17px;color:#8c8f94;cursor:grab;user-select:none}
          #eehbList .eehb-num{flex:0 0 auto;width:30px;height:30px;border-radius:8px;display:grid;place-items:center;
            font-weight:700;font-size:12px;color:#DE6E30;background:#fdf0e7}
          #eehbList .eehb-tx b{display:block;font-size:14px;color:#19335D}
          #eehbList .eehb-tx span{font-size:12px;color:#7a7f86}
          #eehbList li.off .eehb-tx b,#eehbList li.off .eehb-tx span{opacity:.45;text-decoration:line-through}
          #eehbList .eehb-sw{margin-left:auto;position:relative;width:42px;height:24px;flex:0 0 auto}
          #eehbList .eehb-sw input{position:absolute;inset:0;opacity:0;margin:0;cursor:pointer;z-index:2}
          #eehbList .eehb-sw i{position:absolute;inset:0;border-radius:999px;background:#c3c4c7;transition:background .2s}
          #eehbList .eehb-sw i::after{content:"";position:absolute;top:3px;left:3px;width:18px;height:18px;border-radius:50%;background:#fff;transition:left .2s}
          #eehbList .eehb-sw input:checked + i{background:#19335D}
          #eehbList .eehb-sw input:checked + i::after{left:21px}
        </style>

        <ul id="eehbList">
          <?php foreach ($layout as $n => $row) : $id = $row['id']; if (!isset($reg[$id])) continue; ?>
          <li draggable="true" data-id="<?php echo esc_attr($id); ?>" class="<?php echo $row['on'] ? '' : 'off'; ?>">
            <span class="eehb-grip" aria-hidden="true">⠿</span>
            <span class="eehb-num"><?php echo (int) ($n + 1); ?></span>
            <span class="eehb-tx"><b><?php echo esc_html($reg[$id][0]); ?></b><span><?php echo esc_html($reg[$id][1]); ?></span></span>
            <label class="eehb-sw" title="Show / hide this section">
              <input type="checkbox" <?php checked($row['on']); ?>><i></i>
            </label>
          </li>
          <?php endforeach; ?>
        </ul>

        <p style="display:flex;gap:10px;align-items:center">
          <button type="submit" class="button button-primary button-hero">Save Layout</button>
          <button type="submit" class="button" name="reset" value="1" onclick="return confirm('Reset the homepage to the theme default order?');">Reset to Default</button>
        </p>
      </form>

      <script>
      (function(){
        var list=document.getElementById('eehbList'), form=document.getElementById('eehbForm');
        var dragEl=null;
        function renumber(){ [].slice.call(list.querySelectorAll('.eehb-num')).forEach(function(n,i){ n.textContent=i+1; }); }
        list.addEventListener('dragstart',function(e){ dragEl=e.target.closest('li'); if(dragEl)dragEl.classList.add('dragging'); });
        list.addEventListener('dragend',function(){ if(dragEl)dragEl.classList.remove('dragging'); dragEl=null; renumber(); });
        list.addEventListener('dragover',function(e){
          e.preventDefault();
          var li=e.target.closest('li'); if(!li||li===dragEl||!dragEl) return;
          var r=li.getBoundingClientRect();
          list.insertBefore(dragEl, (e.clientY - r.top) > r.height/2 ? li.nextSibling : li);
        });
        list.addEventListener('change',function(e){
          var li=e.target.closest('li'); if(li) li.classList.toggle('off', !e.target.checked);
        });
        form.addEventListener('submit',function(){
          var out=[].slice.call(list.querySelectorAll('li')).map(function(li){
            return { id: li.getAttribute('data-id'), on: li.querySelector('input[type=checkbox]').checked };
          });
          document.getElementById('eehbJson').value=JSON.stringify(out);
        });
      })();
      </script>
    </div>
    <?php
}

/* ---- save handler ---- */
add_action('admin_post_ee_save_home_layout', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_home_layout_save');

    if (!empty($_POST['reset'])) {
        delete_option('ee_home_layout');
        ee_home_layout_flush_caches();
        wp_safe_redirect(admin_url('admin.php?page=ee-home-builder&reset=1'));
        exit;
    }

    $raw  = json_decode(wp_unslash($_POST['layout_json'] ?? ''), true);
    $reg  = ee_home_sections_registry();
    $out  = array(); $seen = array();
    if (is_array($raw)) {
        foreach ($raw as $row) {
            $id = isset($row['id']) ? sanitize_key($row['id']) : '';
            if (!$id || !isset($reg[$id]) || isset($seen[$id])) continue;
            $seen[$id] = true;
            $out[] = array('id' => $id, 'on' => !empty($row['on']));
        }
    }
    if ($out) update_option('ee_home_layout', $out);
    ee_home_layout_flush_caches();
    wp_safe_redirect(admin_url('admin.php?page=ee-home-builder&saved=1'));
    exit;
});

/** The new layout must show up instantly — bust the common page caches. */
function ee_home_layout_flush_caches() {
    if (function_exists('rocket_clean_domain'))   { rocket_clean_domain(); }
    if (function_exists('w3tc_pgcache_flush'))    { w3tc_pgcache_flush(); }
    if (class_exists('LiteSpeed\\Purge'))         { do_action('litespeed_purge_all'); }
    if (function_exists('wp_cache_clean_cache'))  { @wp_cache_clean_cache($GLOBALS['cache_path'] ?? ''); }
}

/* =========================================================================
 * 🧩 SECTION ANYWHERE — drop any homepage section on any page with a
 * shortcode: [ee_section id="feature-pillars"]. Works in the classic
 * editor, Gutenberg (Shortcode block) and page builders. The section
 * renders through a same-origin embed of the homepage with everything
 * except that one section hidden, so its design, styles and scripts stay
 * pixel-identical without duplicating any code. Scroll-driven sections
 * automatically use their simple fallback inside embeds.
 * ========================================================================= */

/** [ee_section id="..."] -> auto-sized same-origin iframe of that section. */
add_shortcode('ee_section', function ($atts) {
    $atts = shortcode_atts(array('id' => '', 'heading' => '', 'sub' => '', 'eyebrow' => ''), $atts, 'ee_section');
    $id   = sanitize_key($atts['id']);
    $reg  = ee_home_sections_registry();
    if (!$id || !isset($reg[$id])) {
        return current_user_can('manage_options')
            ? '<p style="color:#ba1a1a;font-family:Inter,sans-serif">[ee_section] unknown id "' . esc_html($id) . '" — see ExtraaEdge Site → 🧩 Section Anywhere for valid ids.</p>'
            : '';
    }
    /* path-based endpoint: page caches treat every section as its own URL
       (query-string embeds get served the cached homepage by some cache plugins) */
    $src = home_url('/ee-embed/' . $id . '/');
    /* per-instance text overrides ride as data-attributes; the parent page
       applies them into the (same-origin) embed after it loads - fully
       cache-proof, and only this page's copy of the section changes */
    $data = '';
    foreach (array('heading' => 'h', 'sub' => 's', 'eyebrow' => 'e') as $att => $k) {
        $v = trim((string) $atts[$att]);
        if ($v !== '') $data .= ' data-txt-' . $k . '="' . esc_attr(mb_substr($v, 0, 400)) . '"';
    }
    ee_section_embed_print_fit_script();
    return '<iframe class="ee-sec-embed" title="' . esc_attr($reg[$id][0]) . '" loading="lazy" scrolling="no"'
         . ' data-sec="' . esc_attr($id) . '"' . $data
         . ' style="display:block;width:100%;border:0;min-height:320px;overflow:hidden"'
         . ' src="' . esc_url($src) . '"></iframe>';
});

/** One fit script per page: sizes every .ee-sec-embed to its content. */
function ee_section_embed_print_fit_script() {
    static $done = false;
    if ($done) return;
    $done = true;
    add_action('wp_footer', function () { ?>
<script>
(function(){
  function wire(f){
    function txt(){ try{ var d=f.contentDocument; if(!d) return;
      var S=d.getElementById(f.getAttribute('data-sec')||''); if(!S) return;
      var H=f.getAttribute('data-txt-h'), SU=f.getAttribute('data-txt-s'), E=f.getAttribute('data-txt-e');
      var h=S.querySelector('h1,h2');
      if(H && h) h.textContent=H;
      if(SU){ var p=null;
        if(h){ p=(h.nextElementSibling&&h.nextElementSibling.tagName==='P')?h.nextElementSibling:(h.parentElement?h.parentElement.querySelector('p'):null); }
        if(!p) p=S.querySelector('p'); if(p) p.textContent=SU; }
      if(E){ var e=S.querySelector('[class*="eyebrow"],[class*="kick"],[class*="klabel"]'); if(e) e.textContent=E; }
    }catch(e){} }
    function fit(){ try{ var d=f.contentDocument; if(!d||!d.body) return;
      var h=Math.ceil(d.body.getBoundingClientRect().height)+4;
      if(h>120 && Math.abs(h-(parseInt(f.style.height,10)||0))>4) f.style.height=h+'px';
    }catch(e){} }
    f.addEventListener('load',function(){ txt(); fit(); setTimeout(function(){txt();fit();},600); setTimeout(function(){txt();fit();},1800);
      try{ new ResizeObserver(function(){ fit(); }).observe(f.contentDocument.body); }catch(e){}
    });
    if(f.contentDocument&&f.contentDocument.readyState==='complete'){ f.dispatchEvent(new Event('load')); }
  }
  [].slice.call(document.querySelectorAll('.ee-sec-embed')).forEach(wire);
})();
</script>
    <?php }, 99);
}

/* ---- the embed endpoint: /?ee_section_embed=ID renders the homepage with
   only that section visible and all site chrome hidden ---- */
add_action('template_redirect', function () {
    $id = isset($_GET['ee_section_embed']) ? sanitize_key($_GET['ee_section_embed']) : '';
    if (!$id) {
        $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
        if (preg_match('#(?:^|/)ee-embed/([a-z0-9_-]+)$#', $path, $m)) $id = sanitize_key($m[1]);
    }
    if (!$id) return;
    $reg = ee_home_sections_registry();
    if (!isset($reg[$id])) { status_header(404); exit; }

    /* the path isn't a registered rewrite - stop WP treating it as a 404 */
    global $wp_query;
    if ($wp_query) { $wp_query->is_404 = false; }
    status_header(200);

    add_filter('body_class', function ($c) { $c[] = 'ee-embed-mode'; return $c; });
    add_filter('wp_robots', function ($r) { $r['noindex'] = true; $r['nofollow'] = true; return $r; });
    /* The theme's header.php never prints a <body> tag (the browser opens one
       implicitly), so the body_class filter above never reaches the page.
       Stamp the class on <html> from the head - it exists before any content -
       and mirror it onto <body> for scripts that look there. */
    add_action('wp_head', function () { ?>
<script>document.documentElement.className+=' ee-embed-mode';
document.addEventListener('DOMContentLoaded',function(){document.body.className+=' ee-embed-mode';});</script>
    <?php }, 1);
    add_action('wp_head', function () use ($id) { ?>
<style id="ee-section-embed">
/* isolate one section: hide chrome + every other section. Selectors carry
   .ee-embed-mode twice (html + descendant) so they win regardless of whether
   the class landed on <html> or <body>, and the :not(#id) keeps specificity
   above the Home Builder's per-section `body .ee-home>#id{display:block
   !important}` rows - without it a saved builder layout re-shows every
   section inside embeds. */
html.ee-embed-mode #site-header,html.ee-embed-mode footer,html.ee-embed-mode #extraaedge-footer-engine,
html.ee-embed-mode #prog,html.ee-embed-mode #ee-toc,html.ee-embed-mode #ee-sticky,
html.ee-embed-mode #wpadminbar,html.ee-embed-mode .eebk-overlay,
body.ee-embed-mode #site-header,body.ee-embed-mode footer,body.ee-embed-mode #extraaedge-footer-engine,
body.ee-embed-mode #prog,body.ee-embed-mode #ee-toc,body.ee-embed-mode #ee-sticky,
body.ee-embed-mode #wpadminbar,body.ee-embed-mode .eebk-overlay{display:none!important}
html{margin-top:0!important}
html.ee-embed-mode .ee-home>section:not(#<?php echo esc_html($id); ?>),
body.ee-embed-mode .ee-home>section:not(#<?php echo esc_html($id); ?>){display:none!important}
html.ee-embed-mode .ee-home>#<?php echo esc_html($id); ?>,
body.ee-embed-mode .ee-home>#<?php echo esc_html($id); ?>{display:block!important;order:1!important;padding-top:0!important;padding-bottom:0!important}
html.ee-embed-mode,html.ee-embed-mode body,body.ee-embed-mode{background:#fff!important}
/* scroll-driven sections flatten to their simple modes inside embeds */
.ee-embed-mode #ee-night .een-track{height:auto!important}
.ee-embed-mode #ee-night .een-pin{position:static!important;height:auto!important;overflow:visible!important}
.ee-embed-mode #ee-night iframe{height:auto;min-height:640px}
.ee-embed-mode #feature-pillars .flw-track{height:auto!important}
.ee-embed-mode #feature-pillars .flw-pin{position:static!important;height:auto!important}
.ee-embed-mode #ee-vidya-suite .vsx-track{height:auto!important}
.ee-embed-mode #ee-vidya-suite .vsx-sticky{position:static!important;height:auto!important}
.ee-embed-mode #ee-vidya-suite .vsx-rail{scrollbar-width:thin}
.ee-embed-mode #ee-vidya-suite .vsx-rail::-webkit-scrollbar{display:block;height:6px}
.ee-embed-mode #ee-vidya-suite .vsx-rail::-webkit-scrollbar-thumb{background:rgba(222,110,48,.55);border-radius:3px}
</style>
    <?php }, 9999);

    /* render the homepage template regardless of the requested URL */
    add_filter('template_include', function () {
        $t = locate_template('front-page.php');
        return $t ?: get_index_template();
    }, 999);
});

/* ---- admin reference: every section with its copy-paste shortcode ---- */
add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Section Anywhere', '🧩 Section Anywhere', 'manage_options', 'ee-section-anywhere', 'ee_section_anywhere_render_admin');
});

function ee_section_anywhere_render_admin() {
    if (!current_user_can('manage_options')) return;
    $reg = ee_home_sections_registry();
    ?>
    <div class="wrap" style="max-width:860px">
      <h1>🧩 Section Anywhere</h1>
      <p style="font-size:14px;color:#50575e;max-width:70ch">Copy a shortcode and paste it into any page or post (Shortcode block in the editor). The section renders there exactly as on the homepage — same design, same animations. Long scroll-driven sections show their simple version inside other pages.</p>
      <div style="background:#fff;border:1px solid #dcdcde;border-left:4px solid #DE6E30;border-radius:8px;padding:14px 18px;max-width:790px;margin:14px 0">
        <b style="color:#19335D">✏️ Edit the text per page (optional)</b>
        <p style="margin:6px 0 8px;font-size:13px;color:#50575e">Add <code>heading</code>, <code>sub</code> or <code>eyebrow</code> to the shortcode — only that page's copy changes, the homepage stays as-is:</p>
        <code style="display:block;font:600 12.5px/1.6 Menlo,Consolas,monospace;background:#f6f7f7;border:1px solid #dcdcde;border-radius:7px;padding:10px 12px">[ee_section id="feature-pillars" heading="Your own headline here" sub="Your own intro paragraph here." eyebrow="Your label"]</code>
      </div>
      <style>
        .eesa-table{border-collapse:collapse;width:100%;max-width:820px;background:#fff;border:1px solid #dcdcde;border-radius:10px;overflow:hidden}
        .eesa-table td{padding:11px 14px;border-top:1px solid #eee;vertical-align:middle}
        .eesa-table tr:first-child td{border-top:0}
        .eesa-name b{display:block;font-size:13.5px;color:#19335D}
        .eesa-name span{font-size:12px;color:#7a7f86}
        .eesa-code{font:600 12.5px/1 Menlo,Consolas,monospace;background:#f6f7f7;border:1px solid #dcdcde;border-radius:7px;padding:8px 10px;white-space:nowrap}
        .eesa-copy{cursor:pointer}
      </style>
      <table class="eesa-table"><tbody>
        <?php foreach ($reg as $id => $meta) : $sc = '[ee_section id="' . $id . '"]'; ?>
        <tr>
          <td class="eesa-name"><b><?php echo esc_html($meta[0]); ?></b><span><?php echo esc_html($meta[1]); ?></span></td>
          <td style="width:1%"><code class="eesa-code"><?php echo esc_html($sc); ?></code></td>
          <td style="width:1%"><button type="button" class="button eesa-copy" data-sc="<?php echo esc_attr($sc); ?>">Copy</button></td>
        </tr>
        <?php endforeach; ?>
      </tbody></table>
      <script>
      document.addEventListener('click',function(e){
        var b=e.target.closest('.eesa-copy'); if(!b) return;
        navigator.clipboard.writeText(b.getAttribute('data-sc')).then(function(){
          b.textContent='Copied ✓'; setTimeout(function(){ b.textContent='Copy'; },1400);
        });
      });
      </script>
    </div>
    <?php
}

/* =========================================================================
 * 🏗️ PAGE BUILDER — Elementor-style element builder for non-coders.
 * Admin: ExtraaEdge Site → 🏗️ Page Builder. Full module in inc/.
 * ========================================================================= */
require_once get_template_directory() . '/inc/page-builder.php';

/* =========================================================================
 * 🙂 NATIVE EMOJI — WordPress swaps every emoji for an image loaded from
 * the s.w.org CDN; when that CDN is unreachable the whole admin (and any
 * emoji on the site) shows broken-image icons. Modern OSes render emoji
 * natively, so drop the swap everywhere.
 * ========================================================================= */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
add_filter('tiny_mce_plugins', function ($plugins) {
    return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : $plugins;
});
add_filter('emoji_svg_url', '__return_false');

// ══════════════════════════════════════════════════════════════════════════
// PRODUCTS LANDING PAGE SETTINGS (/products/) — non-coder editable
// Every text, the four category rows (label / icon slug / description /
// order / hide) and the CTA block live in the ee_products_page_settings
// option, edited at Products → 🛠 Products Page.
// Icon slugs accept three forms:
//   ti-star            → bundled inline Tabler SVG (always renders)
//   star               → https://www.extraaedge.com/wp-content/uploads/icons/star.svg
//   https://…/x.svg    → used as-is
// ══════════════════════════════════════════════════════════════════════════
function ee_products_page_defaults() {
    return array(
        'seo_title'   => 'Education CRM Products — Convert More Students, Automatically | ExtraaEdge',
        'seo_desc'    => 'Education CRM platform with AI chatbots, application management, and WhatsApp integration. Automate admissions, boost conversions, and scale enrollment 24/7.',
        'eyebrow'     => 'The ExtraaEdge Platform',
        'h1'          => 'Every tool your admissions team needs,',
        'h1_accent'   => 'in one place.',
        'intro_sub'   => '',
        'side_eyebrow'=> 'Browse',
        'side_title'  => 'Product categories',
        'side_cta_strong' => 'Talk to an expert',
        'side_cta_text'   => 'Pick the right modules for your admissions team.',
        'side_cta_btn'    => 'Book a Demo →',
        'side_cta_url'    => '/book-demo/',
        'empty_tag'   => 'Coming soon',
        'empty_tpl'   => 'New {category} products will appear here as they launch.',
        'card_link'   => 'Explore module',
        'big_badge'   => 'Start Free — No Commitment',
        'big_title'   => 'Ready to transform your admissions?',
        'big_sub'     => 'Join 550+ institutions already converting more inquiries into enrollments — on autopilot. See results in your first 30 days.',
        'big_btn1'    => 'Start Your Free Demo',
        'big_url1'    => '/book-demo/',
        'big_btn2'    => 'Watch Demo',
        'big_url2'    => '/resources/',
        'trust'       => "No credit card required\nPersonalized onboarding\nCancel anytime\nSetup in 48 hours",
        'metrics'     => "500+|Institutions Onboard\n10M+|Enquiries Managed\n1M+|Admissions Leads",
        'integrations'=> "Google, Meta, WhatsApp, Zoom, Microsoft, Payment Gateways, LMS, ERP, REST API, Webhooks",
        'integr_count'=> '50+ Integrations',
        'faq'         => "What is included in the ExtraaEdge platform?|Every module on this page — CRM, admission management, communication and automation — works on one shared student database.\nCan I start with one product and add more later?|Yes. Most institutions start with Education CRM and switch on modules like WhatsApp API or Marketing Automation as they scale.\nHow long does deployment take?|Typical go-live is 48 hours to 2 weeks depending on integrations, with hands-on onboarding included.\nDoes it work on mobile?|Yes — counsellors get a full Mobile CRM app, and every applicant-facing flow is mobile-first.\nIs my data secure?|The platform is GDPR and CCPA compliant and ISO 27001 certified, with role-based access control.",
        'cats'        => array(
            'featured'      => array('label' => 'Featured',      'icon' => 'star',     'desc' => 'Our most popular admissions tools, used by 500+ institutions.', 'order' => 1, 'hide' => 0),
            'core'          => array('label' => 'Core CRM',      'icon' => 'bullseye', 'desc' => 'Manage the entire admissions lifecycle end-to-end.',            'order' => 2, 'hide' => 0),
            'communication' => array('label' => 'Communication', 'icon' => 'comments', 'desc' => 'Reach every prospect on the channel they prefer.',              'order' => 3, 'hide' => 0),
            'automation'    => array('label' => 'Automation',    'icon' => 'bolt',     'desc' => 'Smart workflows that work while you sleep.',                    'order' => 4, 'hide' => 0),
        ),
    );
}

function ee_products_page_get() {
    $d = ee_products_page_defaults();
    $o = get_option('ee_products_page_settings', array());
    if (!is_array($o)) $o = array();
    $out = array_merge($d, $o);
    /* cats merge per-row so newly added fields keep defaults */
    $cats = $d['cats'];
    if (!empty($o['cats']) && is_array($o['cats'])) {
        foreach ($cats as $k => $row) {
            if (isset($o['cats'][$k]) && is_array($o['cats'][$k])) {
                $cats[$k] = array_merge($row, $o['cats'][$k]);
            }
        }
    }
    $out['cats'] = $cats;
    return $out;
}

/* Resolve a category icon slug to markup (see forms above). */
function ee_products_cat_icon($slug, $size = 34) {
    $slug = trim((string) $slug);
    $s    = (int) $size;
    if ($slug === '') $slug = 'ti-circle';
    if (function_exists('ee_quick_nav_render_icon') && strpos($slug, 'ti-') === 0) {
        return ee_quick_nav_render_icon($slug, $s);
    }
    $url = (strpos($slug, 'http') === 0)
        ? $slug
        : 'https://www.extraaedge.com/wp-content/uploads/icons/' . rawurlencode($slug) . '.svg';
    return '<img src="' . esc_url($url) . '" alt="" loading="lazy" style="width:100%;height:100%;object-fit:contain;display:block;" '
         . 'onerror="this.style.display=\'none\';var s=this.nextElementSibling;if(s)s.style.display=\'flex\';">'
         . '<span style="display:none;width:100%;height:100%;align-items:center;justify-content:center;">'
         . (function_exists('ee_quick_nav_render_icon') ? ee_quick_nav_render_icon('ti-circle', $s) : '')
         . '</span>';
}

/* ── Admin page: Products → 🛠 Products Page ── */
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=product',
        'Products Page Settings',
        '🛠 Products Page',
        'manage_options',
        'ee-products-page',
        'ee_products_page_render_admin'
    );
});

function ee_products_page_render_admin() {
    if (!current_user_can('manage_options')) return;
    $o = ee_products_page_get();
    $txt = function ($k, $label, $wide = false) use ($o) {
        echo '<tr><th style="text-align:left;padding:6px 12px 6px 0;white-space:nowrap;">' . esc_html($label) . '</th>'
           . '<td><input type="text" name="' . esc_attr($k) . '" value="' . esc_attr($o[$k]) . '" class="' . ($wide ? 'large-text' : 'regular-text') . '"></td></tr>';
    };
    ?>
    <div class="wrap">
        <h1>🛠 Products Page (/products/)</h1>
        <p>Ya page varcha pratyek text, category chi order/icons ani CTA ithun edit hoto — code la hath na lavta.</p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <?php wp_nonce_field('ee_products_page_save'); ?>
            <input type="hidden" name="action" value="ee_products_page_save">

            <h2>Hero / Intro</h2>
            <table><tbody>
                <?php $txt('eyebrow', 'Eyebrow (small orange label)'); ?>
                <?php $txt('h1', 'Heading (navy part)', true); ?>
                <?php $txt('h1_accent', 'Heading highlight (orange part)'); ?>
                <?php $txt('intro_sub', 'Intro sub-text (optional)', true); ?>
            </tbody></table>

            <h2>Category look &amp; order</h2>
            <p class="description">Icon slug: <code>ti-star</code> (built-in, nehmi disto) · <code>star</code> (uploads/icons/star.svg) · kinva full <code>https://…svg</code> URL. Products already tya tya category la 🏷 Product Card Settings madhun jodlele aahet.</p>
            <table class="widefat striped" style="max-width:900px">
                <thead><tr><th>Category</th><th>Shown as</th><th>Icon slug</th><th>Description</th><th style="width:70px">Order</th><th style="width:60px">Hide</th></tr></thead>
                <tbody>
                <?php foreach ($o['cats'] as $k => $c) : ?>
                    <tr>
                        <td><strong><?php echo esc_html(ucfirst($k)); ?></strong></td>
                        <td><input type="text" name="cats[<?php echo esc_attr($k); ?>][label]" value="<?php echo esc_attr($c['label']); ?>"></td>
                        <td><input type="text" name="cats[<?php echo esc_attr($k); ?>][icon]" value="<?php echo esc_attr($c['icon']); ?>" placeholder="ti-star / star / https://…"></td>
                        <td><input type="text" name="cats[<?php echo esc_attr($k); ?>][desc]" value="<?php echo esc_attr($c['desc']); ?>" class="regular-text"></td>
                        <td><input type="number" name="cats[<?php echo esc_attr($k); ?>][order]" value="<?php echo (int) $c['order']; ?>" style="width:60px"></td>
                        <td style="text-align:center"><input type="checkbox" name="cats[<?php echo esc_attr($k); ?>][hide]" value="1" <?php checked(!empty($c['hide'])); ?>></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Sidebar</h2>
            <table><tbody>
                <?php $txt('side_eyebrow', 'Sidebar eyebrow'); ?>
                <?php $txt('side_title', 'Sidebar title'); ?>
                <?php $txt('side_cta_strong', 'Sidebar CTA heading'); ?>
                <?php $txt('side_cta_text', 'Sidebar CTA text', true); ?>
                <?php $txt('side_cta_btn', 'Sidebar CTA button label'); ?>
                <?php $txt('side_cta_url', 'Sidebar CTA button URL'); ?>
            </tbody></table>

            <h2>Cards &amp; empty categories</h2>
            <table><tbody>
                <?php $txt('card_link', 'Card link label (e.g. Explore module)'); ?>
                <?php $txt('empty_tag', 'Empty category tag'); ?>
                <?php $txt('empty_tpl', 'Empty category text ({category} = naav)', true); ?>
            </tbody></table>

            <h2>Bottom CTA</h2>
            <table><tbody>
                <?php $txt('big_badge', 'Badge'); ?>
                <?php $txt('big_title', 'Title', true); ?>
                <?php $txt('big_sub', 'Subtitle', true); ?>
                <?php $txt('big_btn1', 'Primary button label'); ?>
                <?php $txt('big_url1', 'Primary button URL'); ?>
                <?php $txt('big_btn2', 'Secondary button label'); ?>
                <?php $txt('big_url2', 'Secondary button URL'); ?>
            </tbody></table>
            <p><label><strong>Trust bullets</strong> (ek per line)<br>
                <textarea name="trust" rows="4" class="large-text"><?php echo esc_textarea($o['trust']); ?></textarea></label></p>

            <h2>Metrics, Integrations &amp; FAQ</h2>
            <p><label><strong>Success metrics</strong> (ek per line: <code>500+|Institutions Onboard</code>)<br>
                <textarea name="metrics" rows="3" class="large-text"><?php echo esc_textarea($o['metrics']); ?></textarea></label></p>
            <table><tbody>
                <?php $txt('integrations', 'Integration names (comma separated)', true); ?>
                <?php $txt('integr_count', 'Integrations count label'); ?>
            </tbody></table>
            <p><label><strong>FAQ</strong> (ek per line: <code>Prashna|Uttar</code>)<br>
                <textarea name="faq" rows="6" class="large-text"><?php echo esc_textarea($o['faq']); ?></textarea></label></p>

            <h2>SEO</h2>
            <table><tbody>
                <?php $txt('seo_title', 'Meta title', true); ?>
                <?php $txt('seo_desc', 'Meta description', true); ?>
            </tbody></table>

            <?php submit_button('Save Products Page'); ?>
        </form>
    </div>
    <?php
}

add_action('admin_post_ee_products_page_save', function () {
    if (!current_user_can('manage_options')) wp_die('Nope');
    check_admin_referer('ee_products_page_save');
    $d = ee_products_page_defaults();
    $clean = array();
    foreach ($d as $k => $def) {
        if ($k === 'cats' || $k === 'trust') continue;
        $clean[$k] = isset($_POST[$k]) ? sanitize_text_field(wp_unslash($_POST[$k])) : $def;
    }
    $clean['trust'] = isset($_POST['trust']) ? sanitize_textarea_field(wp_unslash($_POST['trust'])) : $d['trust'];
    foreach (array('metrics', 'faq') as $ta) {
        $clean[$ta] = isset($_POST[$ta]) ? sanitize_textarea_field(wp_unslash($_POST[$ta])) : $d[$ta];
    }
    $cats = array();
    foreach ($d['cats'] as $k => $row) {
        $in = isset($_POST['cats'][$k]) && is_array($_POST['cats'][$k]) ? wp_unslash($_POST['cats'][$k]) : array();
        $cats[$k] = array(
            'label' => isset($in['label']) && $in['label'] !== '' ? sanitize_text_field($in['label']) : $row['label'],
            'icon'  => isset($in['icon'])  ? sanitize_text_field($in['icon'])  : $row['icon'],
            'desc'  => isset($in['desc'])  ? sanitize_text_field($in['desc'])  : $row['desc'],
            'order' => isset($in['order']) ? (int) $in['order'] : $row['order'],
            'hide'  => empty($in['hide']) ? 0 : 1,
        );
    }
    $clean['cats'] = $cats;
    update_option('ee_products_page_settings', $clean, false);
    wp_safe_redirect(add_query_arg('updated', '1', admin_url('edit.php?post_type=product&page=ee-products-page')));
    exit;
});

/* =====================================================================
   PLATFORM LISTING — per-product custom fields that control where a
   product appears: the home page "The admissions platform" section
   and/or the /products/ page. Editors flag a product post and it shows
   up automatically; when no product is flagged the templates fall back
   to their built-in default lists, so nothing breaks.
   Fields (post meta on the 'product' CPT):
     _eep_show_home      '1' → show in home "The admissions platform"
     _eep_show_products  '1' → show on /products/
     _eep_cat            ai | platform | admissions | engage | grow
     _eep_badge          small card badge, e.g. "Popular", "Coming Soon"
     _eep_icon           icon slug from uploads/2026/home-page (e.g.
                         education-crm) or a full https:// URL
     _eep_desc           one-line card description
     _eep_long           longer spotlight text (falls back to _eep_desc)
     _eep_tags           comma-separated chips, e.g. "Fees, Approvals"
     _eep_url            link override (falls back to the post permalink)
     _eep_order          sort position (small number = first)
   ===================================================================== */
function ee_eep_icon_url($v) {
    $v = trim((string) $v);
    if ($v === '') return '';
    if (preg_match('#^(https?:)?//#', $v) || $v[0] === '/') return $v;
    return 'https://www.extraaedge.com/wp-content/uploads/2026/home-page/' . sanitize_title(preg_replace('/\.svg$/i', '', $v)) . '.svg';
}

function ee_eep_collect($ctx) {
    $key   = ($ctx === 'home') ? '_eep_show_home' : '_eep_show_products';
    $posts = get_posts(array(
        'post_type'   => 'product',
        'post_status' => 'publish',
        'numberposts' => -1,
        'meta_key'    => $key,
        'meta_value'  => '1',
    ));
    if (!$posts) return array();

    $valid_cats = function_exists('ee_eep_all_cats') ? array_keys(ee_eep_all_cats()) : array('ai', 'platform', 'admissions', 'engage', 'grow');
    $out = array();
    foreach ($posts as $p) {
        $cat  = get_post_meta($p->ID, '_eep_cat', true);
        if (!in_array($cat, $valid_cats, true)) $cat = 'platform';
        $desc = trim((string) get_post_meta($p->ID, '_eep_desc', true));
        if ($desc === '') $desc = wp_strip_all_tags(get_the_excerpt($p));
        $long = trim((string) get_post_meta($p->ID, '_eep_long', true));
        if ($long === '') $long = $desc;
        $tags = array_values(array_filter(array_map('trim', explode(',', (string) get_post_meta($p->ID, '_eep_tags', true)))));
        $url  = trim((string) get_post_meta($p->ID, '_eep_url', true));
        if ($url === '') $url = get_permalink($p);

        $out[] = array(
            'id'    => $p->post_name,
            't'     => get_the_title($p),
            'badge' => (string) get_post_meta($p->ID, '_eep_badge', true),
            'cat'   => $cat,
            'ic'    => 'crm',
            'href'  => $url,
            'img'   => ee_eep_icon_url(get_post_meta($p->ID, '_eep_icon', true)),
            'd'     => $desc,
            'l'     => $long,
            'tags'  => $tags,
            '_ord'  => (int) get_post_meta($p->ID, '_eep_order', true),
        );
    }
    usort($out, function ($a, $b) {
        if ($a['_ord'] !== $b['_ord']) return $a['_ord'] <=> $b['_ord'];
        return strcasecmp($a['t'], $b['t']);
    });
    foreach ($out as &$e) unset($e['_ord']);
    return $out;
}

/* Fields render inside the 🧩 Listing tab of the main product settings
   box (product_all_settings_callback) — no separate side metabox, so the
   inputs exist only once on the screen. */

function ee_eep_listing_render($post) {
    wp_nonce_field('ee_eep_listing', 'ee_eep_listing_nonce');
    $v = function ($k) use ($post) { return esc_attr(get_post_meta($post->ID, $k, true)); };
    $cat  = get_post_meta($post->ID, '_eep_cat', true);
    $cats = array();
    foreach (ee_eep_all_cats() as $ck => $cc) $cats[$ck] = $cc['label'];
    echo '<style>#ee_eep_listing label.ee-b{display:block;margin:8px 0 3px;font-weight:600}#ee_eep_listing input[type=text],#ee_eep_listing input[type=number],#ee_eep_listing textarea,#ee_eep_listing select{width:100%}#ee_eep_listing .ee-hint{color:#666;font-size:11px;margin:2px 0 0}</style>';

    echo '<p style="margin:6px 0"><label><input type="checkbox" name="_eep_show_home" value="1" ' . checked(get_post_meta($post->ID, '_eep_show_home', true), '1', false) . '> <strong>Show on Home page</strong><br><span class="ee-hint">"The admissions platform" section</span></label></p>';
    echo '<p style="margin:6px 0"><label><input type="checkbox" name="_eep_show_products" value="1" ' . checked(get_post_meta($post->ID, '_eep_show_products', true), '1', false) . '> <strong>Show on /products/ page</strong></label></p>';
    $hide_menu = (get_post_meta($post->ID, '_eep_hide_menu', true) === '1');
    echo '<p style="margin:6px 0"><label><input type="checkbox" name="_eep_show_menu" value="1" ' . checked(!$hide_menu, true, false) . '> <strong>Show in menu bar</strong><br><span class="ee-hint">Products mega menu in the header (on by default). Icon/column/desc come from the Product Card Settings box below; blank icon falls back to the Icon field here.</span></label></p>';

    echo '<label class="ee-b">Category</label><select name="_eep_cat" id="ee-eep-cat-sel">';
    foreach ($cats as $ck => $cl) {
        echo '<option value="' . esc_attr($ck) . '" ' . selected($cat ?: 'platform', $ck, false) . '>' . esc_html($cl) . '</option>';
    }
    echo '<option value="__new">+ Add new category…</option>';
    echo '</select>';
    echo '<div id="ee-eep-newcat-wrap"><label class="ee-b">New category name</label><input type="text" name="_eep_new_cat" value="" placeholder="e.g. Finance &amp; Fees">';
    echo '<p class="ee-hint">Update केल्यावर category तयार होते, home + /products/ वर तिचा filter chip येतो आणि हा product तिच्यात जातो. (Manage: Products → Listing Categories &amp; Badges.)</p></div>';

    $badge   = (string) get_post_meta($post->ID, '_eep_badge', true);
    $badges  = ee_eep_badges();
    if ($badge !== '' && !in_array($badge, $badges, true)) $badges[] = $badge;
    echo '<label class="ee-b">Badge</label><select name="_eep_badge" id="ee-eep-badge-sel">';
    echo '<option value="">— No badge —</option>';
    foreach ($badges as $bg) {
        echo '<option value="' . esc_attr($bg) . '" ' . selected($badge, $bg, false) . '>' . esc_html($bg) . '</option>';
    }
    echo '<option value="__new">+ Add new badge…</option>';
    echo '</select>';
    echo '<div id="ee-eep-newbadge-wrap"><label class="ee-b">New badge name</label><input type="text" name="_eep_new_badge" value="" placeholder="e.g. Early Access">';
    echo '<p class="ee-hint">Update केल्यावर badge तयार होतो, सगळ्या products च्या suggestions मध्ये जातो आणि या product वर लागतो.</p></div>';

    echo '<script>(function(){
      function wire(selId, wrapId){
        var s=document.getElementById(selId), w=document.getElementById(wrapId);
        if(!s||!w) return;
        function t(){ w.style.display = (s.value==="__new") ? "" : "none"; }
        s.addEventListener("change", t); t();
      }
      wire("ee-eep-cat-sel","ee-eep-newcat-wrap");
      wire("ee-eep-badge-sel","ee-eep-newbadge-wrap");
    })();</script>';
    echo '<label class="ee-b">Icon</label><input type="text" name="_eep_icon" value="' . $v('_eep_icon') . '" placeholder="education-crm">';
    echo '<p class="ee-hint">Slug from uploads/2026/home-page (education-crm, mobile-crm, …) or a full https:// URL. Blank = generic icon.</p>';
    echo '<label class="ee-b">Card description (1 line)</label><textarea name="_eep_desc" rows="2">' . esc_textarea(get_post_meta($post->ID, '_eep_desc', true)) . '</textarea>';
    echo '<label class="ee-b">Spotlight text (longer)</label><textarea name="_eep_long" rows="3">' . esc_textarea(get_post_meta($post->ID, '_eep_long', true)) . '</textarea>';
    echo '<label class="ee-b">Tags (comma separated)</label><input type="text" name="_eep_tags" value="' . $v('_eep_tags') . '" placeholder="Fees & documents, Approval flows">';
    echo '<label class="ee-b">Link override</label><input type="text" name="_eep_url" value="' . $v('_eep_url') . '" placeholder="Blank = this product\'s own URL">';
    echo '<label class="ee-b">Sort order</label><input type="number" name="_eep_order" value="' . $v('_eep_order') . '" placeholder="0">';
}

add_action('save_post_product', function ($post_id) {
    if (!isset($_POST['ee_eep_listing_nonce']) || !wp_verify_nonce($_POST['ee_eep_listing_nonce'], 'ee_eep_listing')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    foreach (array('_eep_show_home', '_eep_show_products') as $cb) {
        if (!empty($_POST[$cb])) update_post_meta($post_id, $cb, '1');
        else delete_post_meta($post_id, $cb);
    }
    /* inverse flag: menu visibility is ON by default, so only the
       opt-out is stored — existing products keep showing untouched */
    if (empty($_POST['_eep_show_menu'])) update_post_meta($post_id, '_eep_hide_menu', '1');
    else delete_post_meta($post_id, '_eep_hide_menu');
    $texts = array('_eep_cat', '_eep_badge', '_eep_icon', '_eep_tags', '_eep_url', '_eep_order');
    foreach ($texts as $k) {
        $val = isset($_POST[$k]) ? sanitize_text_field(wp_unslash($_POST[$k])) : '';
        if ($val === '__new') continue; /* "+ Add new…" chosen — the blocks below store the real value */
        if ($val !== '') update_post_meta($post_id, $k, $val);
        else delete_post_meta($post_id, $k);
    }

    /* inline "add a NEW category": create it (once) and move this product into it */
    $new_cat = isset($_POST['_eep_new_cat']) ? sanitize_text_field(wp_unslash($_POST['_eep_new_cat'])) : '';
    if ($new_cat !== '') {
        $slug = sanitize_title($new_cat);
        if ($slug !== '') {
            if (!array_key_exists($slug, ee_eep_all_cats())) {
                $raw = trim((string) get_option('ee_eep_cats_raw', ''));
                $raw .= ($raw === '' ? '' : "\n") . $slug . ' | ' . $new_cat;
                update_option('ee_eep_cats_raw', $raw, false);
            }
            update_post_meta($post_id, '_eep_cat', $slug);
        }
    }

    /* explicit "add a NEW badge" field: set it on this product, then the
       auto-collect below adds it to the suggestion list */
    $new_badge = isset($_POST['_eep_new_badge']) ? sanitize_text_field(wp_unslash($_POST['_eep_new_badge'])) : '';
    if ($new_badge !== '') update_post_meta($post_id, '_eep_badge', $new_badge);

    /* a badge typed by hand joins the suggestion list automatically */
    $badge = (string) get_post_meta($post_id, '_eep_badge', true);
    if ($badge !== '' && !in_array($badge, ee_eep_badges(), true)) {
        $braw = trim((string) get_option('ee_eep_badges_raw', "Popular\nNew\nComing Soon"));
        update_option('ee_eep_badges_raw', $braw . ($braw === '' ? '' : "\n") . $badge, false);
    }
    foreach (array('_eep_desc', '_eep_long') as $k) {
        $val = isset($_POST[$k]) ? sanitize_textarea_field(wp_unslash($_POST[$k])) : '';
        if ($val !== '') update_post_meta($post_id, $k, $val);
        else delete_post_meta($post_id, $k);
    }
});

/* =====================================================================
   PLATFORM LISTING — editable Categories & Badges.
   Products → Listing Categories & Badges lets editors add new category
   chips and badge suggestions without touching code. Custom categories
   merge into the built-in five (same slug = label/colour override) and
   automatically get their own filter chip on the home section and the
   /products/ page once at least one product uses them.
   ===================================================================== */
function ee_eep_custom_cats() {
    $out = array();
    foreach (preg_split('/[\r\n]+/', (string) get_option('ee_eep_cats_raw', '')) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $bits = array_map('trim', explode('|', $line));
        $slug = sanitize_title($bits[0]);
        if ($slug === '') continue;
        $label = (isset($bits[1]) && $bits[1] !== '') ? $bits[1] : ucwords(str_replace('-', ' ', $slug));
        $acc   = (isset($bits[2]) && preg_match('/^#[0-9a-fA-F]{3,8}$/', $bits[2])) ? $bits[2] : '#5c9af6';
        $out[$slug] = array('label' => $label, 'acc' => $acc);
    }
    return $out;
}

function ee_eep_all_cats() {
    $cats = array(
        'ai'         => array('label' => 'AI & automation', 'acc' => '#5c9af6'),
        'platform'   => array('label' => 'Core platform',   'acc' => '#F2935A'),
        'admissions' => array('label' => 'Admissions',      'acc' => '#5b96ef'),
        'engage'     => array('label' => 'Engage',          'acc' => '#2564c2'),
        'grow'       => array('label' => 'Grow',            'acc' => '#F2B441'),
    );
    foreach (ee_eep_custom_cats() as $k => $v) $cats[$k] = $v;
    return $cats;
}

function ee_eep_badges() {
    $out = array();
    foreach (preg_split('/[\r\n]+/', (string) get_option('ee_eep_badges_raw', "Popular\nNew\nComing Soon")) as $line) {
        $line = trim($line);
        if ($line !== '') $out[] = $line;
    }
    return array_values(array_unique($out));
}

/* ---- admin page: Products → Listing Categories & Badges ---- */
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=product',
        'Listing Categories & Badges',
        'Listing Categories & Badges',
        'manage_options',
        'ee-eep-taxonomy',
        'ee_eep_tax_page_render'
    );
});

function ee_eep_tax_page_render() {
    $cats_raw   = get_option('ee_eep_cats_raw', '');
    $badges_raw = get_option('ee_eep_badges_raw', "Popular\nNew\nComing Soon");
    echo '<div class="wrap"><h1>Listing Categories &amp; Badges</h1>';
    if (!empty($_GET['updated'])) echo '<div class="notice notice-success is-dismissible"><p>Saved.</p></div>';
    echo '<p>These feed the <strong>Platform Listing</strong> box on every product, the home page "The admissions platform" section and the /products/ page. New categories get their own filter chip automatically once a product uses them.</p>';
    echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '">';
    wp_nonce_field('ee_eep_tax_save', 'ee_eep_tax_nonce');
    echo '<input type="hidden" name="action" value="ee_eep_tax_save">';

    echo '<h2>Custom categories</h2>';
    echo '<p>One per line: <code>slug | Label | #colour</code> &nbsp;(label and colour optional). Using a built-in slug (ai, platform, admissions, engage, grow) renames/recolours that chip.</p>';
    echo '<textarea name="ee_eep_cats_raw" rows="8" class="large-text code" placeholder="finance | Finance &amp; Fees | #2BC98A">' . esc_textarea($cats_raw) . '</textarea>';

    echo '<h2>Badge suggestions</h2>';
    echo '<p>One per line. These appear as suggestions in the Badge field on each product (free typing still works).</p>';
    echo '<textarea name="ee_eep_badges_raw" rows="6" class="large-text code">' . esc_textarea($badges_raw) . '</textarea>';

    echo '<p><button class="button button-primary">Save</button></p></form>';

    echo '<h2>Built-in categories</h2><table class="widefat striped" style="max-width:560px"><thead><tr><th>Slug</th><th>Label</th><th>Colour</th></tr></thead><tbody>';
    foreach (ee_eep_all_cats() as $k => $c) {
        echo '<tr><td><code>' . esc_html($k) . '</code></td><td>' . esc_html($c['label']) . '</td><td><span style="display:inline-block;width:14px;height:14px;border-radius:4px;vertical-align:-2px;background:' . esc_attr($c['acc']) . '"></span> ' . esc_html($c['acc']) . '</td></tr>';
    }
    echo '</tbody></table></div>';
}

add_action('admin_post_ee_eep_tax_save', function () {
    if (!current_user_can('manage_options')) wp_die('Nope');
    if (!isset($_POST['ee_eep_tax_nonce']) || !wp_verify_nonce($_POST['ee_eep_tax_nonce'], 'ee_eep_tax_save')) wp_die('Bad nonce');
    update_option('ee_eep_cats_raw', sanitize_textarea_field(wp_unslash($_POST['ee_eep_cats_raw'] ?? '')), false);
    update_option('ee_eep_badges_raw', sanitize_textarea_field(wp_unslash($_POST['ee_eep_badges_raw'] ?? '')), false);
    wp_safe_redirect(add_query_arg('updated', '1', admin_url('edit.php?post_type=product&page=ee-eep-taxonomy')));
    exit;
});

/* =====================================================================
   PAGE LAYOUT SIDES — per-page custom fields that move the hero form,
   the TOC column and the floating icon rail to the left or right side.
   Applies to the four twin templates: product, industry, use_case,
   solution. Defaults keep today's layout (form right, TOC right,
   rail left), so existing pages don't change until an editor flips one.
   ===================================================================== */
add_action('add_meta_boxes', function () {
    foreach (array('product', 'industry', 'use_case', 'solution') as $pt) {
        add_meta_box('ee_layout_sides', 'Layout — Form / TOC / Rail side', 'ee_layout_sides_render', $pt, 'side', 'default');
    }
});

function ee_layout_sides_render($post) {
    wp_nonce_field('ee_layout_sides', 'ee_layout_sides_nonce');
    $fields = array(
        '_ee_form_side' => array('Hero form',            'right', array('right' => 'Right (default)', 'left' => 'Left')),
        '_ee_toc_side'  => array('TOC (Contents box)',   'right', array('right' => 'Right (default)', 'left' => 'Left')),
        '_ee_rail_side' => array('Icon rail (quick nav)', 'left',  array('left' => 'Left (default)', 'right' => 'Right')),
    );
    foreach ($fields as $key => $cfg) {
        list($label, $def, $opts) = $cfg;
        $cur = get_post_meta($post->ID, $key, true) ?: $def;
        echo '<p style="margin:8px 0 2px"><strong>' . esc_html($label) . '</strong></p><select name="' . esc_attr($key) . '" style="width:100%">';
        foreach ($opts as $ok => $ol) {
            echo '<option value="' . esc_attr($ok) . '" ' . selected($cur, $ok, false) . '>' . esc_html($ol) . '</option>';
        }
        echo '</select>';
    }
    echo '<p style="color:#666;font-size:11px;margin-top:8px">Mobile view is not affected — columns stack there anyway.</p>';
}

add_action('save_post', function ($post_id) {
    if (!isset($_POST['ee_layout_sides_nonce']) || !wp_verify_nonce($_POST['ee_layout_sides_nonce'], 'ee_layout_sides')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (!in_array(get_post_type($post_id), array('product', 'industry', 'use_case', 'solution'), true)) return;
    $allowed = array('_ee_form_side' => array('left', 'right'), '_ee_toc_side' => array('left', 'right'), '_ee_rail_side' => array('left', 'right'));
    foreach ($allowed as $k => $ok_vals) {
        $val = isset($_POST[$k]) ? sanitize_text_field(wp_unslash($_POST[$k])) : '';
        if (in_array($val, $ok_vals, true)) update_post_meta($post_id, $k, $val);
        else delete_post_meta($post_id, $k);
    }
});

/* Templates call this right after get_header() — emits the CSS overrides
   for any non-default side choices on the current post. */
function ee_layout_sides_css() {
    $id = get_the_ID();
    if (!$id) return;
    $css = '';
    if (get_post_meta($id, '_ee_form_side', true) === 'left') {
        $css .= '@media(min-width:1151px){.hero-layout{grid-template-columns:.9fr 1.1fr}.hero-layout>.hero-form-aside{order:-1}}';
    }
    if (get_post_meta($id, '_ee_toc_side', true) === 'left') {
        $css .= '@media(min-width:1201px){.toc-zone-wrapper{grid-template-columns:var(--toc-width) 1fr}.toc-zone-wrapper>.toc-column{order:0}}';
    }
    if (get_post_meta($id, '_ee_rail_side', true) === 'right') {
        $css .= '.ee-float-nav{left:auto;right:18px}';
    }
    if ($css) echo '<style id="ee-layout-side">' . $css . '</style>';
}
