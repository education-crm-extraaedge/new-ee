<?php
/**
 * Custom landing template for /products/.
 *
 * Wired up via the template_redirect override in functions.php — visiting
 * https://example.com/products/ loads this file regardless of whether a
 * matching WP Page exists.
 *
 * Content sources:
 *   • Products list  → ee_get_product_menu_items()
 *                     (Product CPT first, seeded fallback when empty)
 *   • Breadcrumb     → $GLOBALS['ee_custom_route_title'] (set in functions.php)
 */
if (!defined('ABSPATH')) exit;

$ee_products = function_exists('ee_get_product_menu_items') ? ee_get_product_menu_items() : array();
$PS = function_exists('ee_products_page_get') ? ee_products_page_get() : array();
$PSget = function ($k, $fb = '') use ($PS) { return isset($PS[$k]) && $PS[$k] !== '' ? $PS[$k] : $fb; };

/* SEO meta tags — emitted via wp_head() */
add_action('wp_head', function () {
    $ps    = function_exists('ee_products_page_get') ? ee_products_page_get() : array();
    $title = !empty($ps['seo_title']) ? $ps['seo_title'] : 'Education CRM Products — Convert More Students, Automatically | ExtraaEdge';
    $desc  = !empty($ps['seo_desc'])  ? $ps['seo_desc']  : 'Education CRM platform with AI chatbots, application management, and WhatsApp integration. Automate admissions, boost conversions, and scale enrollment 24/7.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/products/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="keywords" content="Education CRM, admissions automation, student enrollment software, AI chatbot education, WhatsApp bot admissions, IVR education">' . "\n";
    echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
    echo '<meta property="og:title" content="Education CRM — Convert More Students, Automatically">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="Education CRM — Convert More Students, Automatically">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($desc) . '">' . "\n";

    /* JSON-LD ItemList for the products grid */
    if (!empty($GLOBALS['ee_products_for_jsonld']) && is_array($GLOBALS['ee_products_for_jsonld'])) {
        $items = array();
        foreach ($GLOBALS['ee_products_for_jsonld'] as $i => $p) {
            $items[] = array(
                '@type'       => 'ListItem',
                'position'    => $i + 1,
                'name'        => $p['title'],
                'url'         => home_url($p['url']),
                'description' => $p['desc'],
            );
        }
        $schema = array(
            '@context'         => 'https://schema.org',
            '@type'            => 'ItemList',
            'name'             => 'Education CRM Product Modules',
            'description'      => 'Complete suite of admissions automation tools for educational institutions',
            'numberOfItems'    => count($items),
            'itemListElement'  => $items,
        );
        echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
    }

    /* Page title override */
    add_filter('pre_get_document_title', function () use ($title) { return $title; }, 99);
}, 1);

/* Expose products list to wp_head closure above */
$GLOBALS['ee_products_for_jsonld'] = $ee_products;

get_header();
?>

<style>
/* ============================================
   PRODUCTS LANDING — redesigned, scoped to .ecrm-section
   ============================================ */
.ecrm-section{
    --clr-orange:#DE6E30; --clr-orange-dark:#C25A22; --clr-orange-light:#F3D6C4; --clr-orange-ultra:#FFF3EC;
    --clr-navy:#19335D; --clr-navy-mid:#1E3F73; --clr-navy-dark:#112240;
    --clr-white:#FFFFFF; --clr-line:#EAEEF3;
    --clr-gray-200:#E5E7EB; --clr-gray-500:#6B7280; --clr-gray-700:#374151;
    --radius-lg:1rem;

    width:100%; background:var(--clr-white); position:relative;
    overflow:clip; /* clip suppresses overflow without breaking position:sticky descendants */
    padding:2.25rem 1.25rem 5rem;
    font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',system-ui,sans-serif;
    color:var(--clr-gray-700); line-height:1.6;
}
@media (min-width:640px){.ecrm-section{padding:2.75rem 2.5rem 6rem}}
@media (min-width:1024px){.ecrm-section{padding:3rem 4rem 7rem}}
.ecrm-section::before{
    content:'';position:absolute;inset:0;pointer-events:none;
    background:
        radial-gradient(ellipse 60% 40% at 10% 0%, rgba(222,110,48,.05) 0%, transparent 60%),
        radial-gradient(ellipse 50% 35% at 90% 100%, rgba(25,51,93,.04) 0%, transparent 55%);
}
.ecrm-container{max-width:78rem;margin:0 auto;position:relative;z-index:1}

/* ── Intro band ── */
.ecrm-intro{max-width:46rem;margin:0 0 2.75rem}
.ecrm-intro-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--clr-orange);margin-bottom:14px}
.ecrm-intro-eyebrow::before{content:"";width:6px;height:6px;border-radius:50%;background:var(--clr-orange);box-shadow:0 0 0 4px var(--clr-orange-ultra)}
.ecrm-intro h1{font-family:'Inter',sans-serif;font-size:clamp(1.85rem,3.6vw,2.9rem);font-weight:800;color:var(--clr-navy);line-height:1.1;letter-spacing:-.025em;margin:0 0 14px}
.ecrm-intro h1 .g{color:var(--clr-orange)}
.ecrm-intro p{font-size:clamp(1rem,1.6vw,1.1rem);color:var(--clr-gray-500);line-height:1.6;margin:0}

/* ═════════════ Docs-style left sidebar + content area ═════════════ */
.ecrm-shell{display:grid;grid-template-columns:280px minmax(0,1fr);gap:48px;align-items:start;margin-bottom:4rem}
@media (max-width:960px){.ecrm-shell{grid-template-columns:1fr;gap:24px}}

.ecrm-sidebar{
    position:-webkit-sticky;position:sticky;top:110px;align-self:start;
    background:linear-gradient(180deg,#fff 0%,#FFFCF8 100%);
    border:1px solid var(--clr-orange-light);border-radius:20px;padding:24px 20px;
    box-shadow:0 10px 34px rgba(25,51,93,.07);max-height:calc(100vh - 130px);overflow-y:auto;z-index:5;
    scrollbar-width:thin;scrollbar-color:var(--clr-orange-light) transparent;
}
.ecrm-sidebar::-webkit-scrollbar{width:6px}
.ecrm-sidebar::-webkit-scrollbar-thumb{background:var(--clr-orange-light);border-radius:99px}
.ecrm-sidebar-eyebrow{display:flex;align-items:center;gap:8px;font-size:.68rem;font-weight:700;color:var(--clr-orange);letter-spacing:.12em;text-transform:uppercase;margin-bottom:6px}
.ecrm-sidebar-eyebrow::before{content:"";width:5px;height:5px;border-radius:50%;background:var(--clr-orange);box-shadow:0 0 0 4px var(--clr-orange-ultra)}
.ecrm-sidebar-title{font-family:'Inter',sans-serif;font-size:1.05rem;font-weight:800;color:var(--clr-navy);margin:0 0 18px;letter-spacing:-.01em;line-height:1.3}
.ecrm-sidebar-nav{display:flex;flex-direction:column;gap:6px;margin:0 0 18px;padding:0;list-style:none}
.ecrm-sidebar-link{display:flex;align-items:center;gap:12px;padding:12px 13px;border-radius:12px;text-decoration:none;color:var(--clr-gray-700);font-size:.92rem;font-weight:600;border:1px solid transparent;transition:all .22s ease;position:relative}
.ecrm-sidebar-link:hover{background:#fff;border-color:var(--clr-orange-light);color:var(--clr-orange);transform:translateX(2px)}
.ecrm-sidebar-link.is-active{background:#fff;border-color:var(--clr-orange);color:var(--clr-orange);box-shadow:0 4px 14px rgba(222,110,48,.14)}
.ecrm-sidebar-link.is-active::before{content:"";position:absolute;left:-21px;top:50%;transform:translateY(-50%);width:3px;height:22px;background:var(--clr-orange);border-radius:0 3px 3px 0}
/* Sidebar icons sit flat on the page — no chip behind the image. */
.ecrm-sidebar-ico{width:34px;height:34px;flex-shrink:0;background:transparent;display:flex;align-items:center;justify-content:center;padding:4px}
.ecrm-sidebar-ico img{width:100%;height:100%;object-fit:contain}
.ecrm-sidebar-label{flex:1;min-width:0}
.ecrm-sidebar-count{margin-left:auto;font-size:.72rem;font-weight:700;color:#B6C0CE;background:#F3F5F8;padding:2px 8px;border-radius:99px}
.ecrm-sidebar-link.is-active .ecrm-sidebar-count,.ecrm-sidebar-link:hover .ecrm-sidebar-count{color:var(--clr-orange);background:var(--clr-orange-ultra)}
.ecrm-sidebar-cta{background:linear-gradient(135deg,var(--clr-navy-dark),var(--clr-navy));color:#fff;border-radius:14px;padding:16px 18px;text-align:center}
.ecrm-sidebar-cta strong{display:block;font-size:.9rem;font-weight:700;margin-bottom:4px;color:#fff}
.ecrm-sidebar-cta p{font-size:.74rem;opacity:.85;margin:0 0 12px;line-height:1.45}
.ecrm-sidebar-cta-btn{display:inline-block;background:var(--clr-orange);color:#fff!important;font-size:.78rem;font-weight:700;padding:9px 16px;border-radius:8px;text-decoration:none;transition:background .2s ease}
.ecrm-sidebar-cta-btn:hover{background:var(--clr-orange-dark)}
@media (max-width:960px){
    .ecrm-sidebar{position:static;padding:16px}
    .ecrm-sidebar-title{margin-bottom:12px;font-size:.98rem}
    .ecrm-sidebar-nav{flex-direction:row;flex-wrap:nowrap;gap:8px;overflow-x:auto;margin-bottom:12px;-webkit-overflow-scrolling:touch}
    .ecrm-sidebar-link{flex:0 0 auto;padding:8px 12px;font-size:.85rem;white-space:nowrap}
    .ecrm-sidebar-link.is-active::before{display:none}
    .ecrm-sidebar-ico{width:26px;height:26px;padding:5px}
    .ecrm-sidebar-cta{display:none}
}

/* ── Category section (no big header — chips live on each card) ── */
.ecrm-cat{display:block;margin-bottom:2.25rem;width:100%;scroll-margin-top:120px}
.ecrm-cat:last-of-type{margin-bottom:3rem}
.ecrm-cat-empty{background:#fff;border:1px dashed var(--clr-gray-200);border-radius:var(--radius-lg);padding:1.5rem 1.75rem;text-align:center;color:var(--clr-gray-500)}
.ecrm-cat-empty-tag{display:inline-block;background:var(--clr-orange-ultra);color:var(--clr-orange);font-size:.7rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:.25rem .65rem;border-radius:99px;border:1px solid var(--clr-orange-light);margin-bottom:.5rem}
.ecrm-cat-empty p{margin:0;font-size:.9rem;line-height:1.5}

.ecrm-content{min-width:0}
.ecrm-grid{display:grid;grid-template-columns:minmax(0,1fr);gap:1.25rem;margin-bottom:0}
@media (min-width:480px){.ecrm-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (min-width:1024px){.ecrm-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:1.4rem}}

/* ── Card ── */
.ecrm-card{position:relative;display:flex;flex-direction:column;background:var(--clr-white);border:1px solid var(--clr-line);border-radius:20px;padding:24px;text-decoration:none;color:inherit;overflow:hidden;box-shadow:0 1px 2px rgba(25,51,93,.04);transition:transform .3s cubic-bezier(.4,0,.2,1),box-shadow .3s,border-color .3s;outline:none}
@media (min-width:640px){.ecrm-card{padding:26px}}
.ecrm-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--clr-orange),#E8843F);transform:scaleX(0);transform-origin:left;transition:transform .35s ease}
.ecrm-card:hover,.ecrm-card:focus-visible{transform:translateY(-6px);border-color:var(--clr-orange-light);box-shadow:0 18px 42px rgba(25,51,93,.12)}
.ecrm-card:hover::before,.ecrm-card:focus-visible::before{transform:scaleX(1)}
.ecrm-card:focus-visible{outline:2px solid var(--clr-orange);outline-offset:3px}
.ecrm-card-top{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px}
/* Product icons sit flat on the card — no floating tile, border, shadow
   or hover lift around the image. */
.ecrm-card-icon{width:58px;height:58px;background:transparent;border:0;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ecrm-card-logo{width:90%;height:90%;max-width:90%;max-height:90%;object-fit:contain}
.ecrm-card-logo-fallback{width:100%;height:100%;border-radius:15px;background:linear-gradient(135deg,var(--clr-orange),var(--clr-navy));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:1.3rem}
.ecrm-card-num{font-size:.8rem;font-weight:800;color:#DDE3EC;letter-spacing:.06em;transition:color .3s}
.ecrm-card:hover .ecrm-card-num,.ecrm-card:focus-visible .ecrm-card-num{color:var(--clr-orange-light)}
.ecrm-card-badge{font-size:.6rem;font-weight:700;padding:.22rem .5rem;border-radius:5px;text-transform:uppercase;letter-spacing:.05em;color:#fff;line-height:1.2;white-space:nowrap}
.ecrm-card-badge--new{background:#10B981}
.ecrm-card-badge--popular{background:var(--clr-orange)}
.ecrm-card-badge--trending{background:#F59E0B}
.ecrm-card-badge--hot{background:var(--clr-orange);animation:ecrm-pulse 1.8s infinite}
.ecrm-card-body{flex:1;display:flex;flex-direction:column}
.ecrm-card-cat{display:inline-flex;align-items:center;align-self:flex-start;font-size:.64rem;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:var(--clr-orange);background:var(--clr-orange-ultra);padding:4px 10px;border-radius:99px;margin-bottom:10px}
.ecrm-card-title{font-size:1.12rem;font-weight:700;color:var(--clr-navy);margin:0 0 8px;line-height:1.3;letter-spacing:-.01em}
.ecrm-card-desc{font-size:.9rem;color:var(--clr-gray-500);line-height:1.6;margin:0;flex:1}
.ecrm-card-link{display:inline-flex;align-items:center;gap:.4rem;font-size:.82rem;font-weight:700;color:var(--clr-orange);margin-top:18px}
.ecrm-card-link svg{transition:transform .2s}
.ecrm-card:hover .ecrm-card-link svg,.ecrm-card:focus-visible .ecrm-card-link svg{transform:translateX(4px)}

/* ── CTA ── */
.ecrm-cta-outer{position:relative}
.ecrm-cta-box{position:relative;background:linear-gradient(135deg,var(--clr-navy-dark) 0%,var(--clr-navy) 55%,var(--clr-navy-mid) 100%);border-radius:28px;padding:3.5rem 2rem;text-align:center;overflow:hidden;box-shadow:0 24px 60px rgba(25,51,93,.22)}
@media (min-width:640px){.ecrm-cta-box{padding:4.25rem 4rem}}
.ecrm-cta-box::before,.ecrm-cta-box::after{content:'';position:absolute;border-radius:50%;pointer-events:none}
.ecrm-cta-box::before{width:360px;height:360px;background:radial-gradient(circle,rgba(222,110,48,.20) 0%,transparent 70%);top:-90px;left:-60px}
.ecrm-cta-box::after{width:280px;height:280px;background:radial-gradient(circle,rgba(255,255,255,.05) 0%,transparent 70%);bottom:-60px;right:-40px}
.ecrm-cta-inner{position:relative;z-index:1;max-width:44rem;margin:0 auto}
.ecrm-cta-badge{display:inline-block;background:rgba(222,110,48,.18);border:1px solid rgba(222,110,48,.35);color:#FDBA74;font-size:.74rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:.4rem 1rem;border-radius:100px;margin-bottom:1.4rem}
.ecrm-cta-title{font-family:'Inter',sans-serif;font-size:clamp(1.6rem,4vw,2.3rem);font-weight:800;color:#fff;line-height:1.15;letter-spacing:-.02em;margin:0 0 1rem}
.ecrm-cta-subtitle{font-size:1.02rem;color:#93C5FD;line-height:1.6;margin:0 0 2rem}
.ecrm-cta-actions{display:flex;flex-direction:column;align-items:center;gap:.875rem}
@media (min-width:480px){.ecrm-cta-actions{flex-direction:row;justify-content:center;flex-wrap:wrap}}
.ecrm-btn-primary,.ecrm-btn-secondary{display:inline-flex;align-items:center;justify-content:center;gap:.5rem;font-family:inherit;font-weight:700;padding:.95rem 2.25rem;border-radius:12px;text-decoration:none;cursor:pointer;transition:all .28s cubic-bezier(.4,0,.2,1);white-space:nowrap}
.ecrm-btn-primary{background:var(--clr-orange);color:#fff;border:none;font-size:1rem}
.ecrm-btn-primary:hover{background:var(--clr-orange-dark);transform:translateY(-2px);box-shadow:0 12px 30px rgba(222,110,48,.4)}
.ecrm-btn-primary:focus-visible{outline:2px solid rgba(255,255,255,.7);outline-offset:3px}
.ecrm-btn-secondary{background:rgba(255,255,255,.09);color:#fff;font-size:.94rem;font-weight:600;padding:.95rem 1.75rem;border:1.5px solid rgba(255,255,255,.18);backdrop-filter:blur(4px)}
.ecrm-btn-secondary:hover{background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.35);transform:translateY(-2px)}
.ecrm-cta-trust{display:flex;flex-wrap:wrap;justify-content:center;gap:.5rem 1.5rem;margin-top:1.75rem}
.ecrm-cta-trust-item{display:flex;align-items:center;gap:.375rem;font-size:.8125rem;color:#BFDBFE;font-weight:500}
.ecrm-cta-trust-icon{width:14px;height:14px;opacity:.85}

/* ── Reveal animations ── */
@keyframes ecrm-pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.75)}}
@keyframes ecrm-fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
@keyframes ecrm-fadeIn{from{opacity:0}to{opacity:1}}
.ecrm-anim{opacity:0}
.ecrm-anim.is-visible{animation:ecrm-fadeUp .6s ease forwards}
.ecrm-anim-fade.is-visible{animation:ecrm-fadeIn .7s ease forwards}
.ecrm-d1{animation-delay:.05s}.ecrm-d2{animation-delay:.12s}.ecrm-d3{animation-delay:.19s}
.ecrm-d4{animation-delay:.26s}.ecrm-d5{animation-delay:.33s}.ecrm-d6{animation-delay:.40s}.ecrm-d7{animation-delay:.47s}
@media (prefers-reduced-motion:reduce){
    .ecrm-section *,.ecrm-section *::before,.ecrm-section *::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}
    .ecrm-anim{opacity:1}
}
</style>

<section
    class="ecrm-section"
    id="education-crm-showcase"
    aria-labelledby="ecrm-heading"
    itemscope itemtype="https://schema.org/ItemList">

    <meta itemprop="name" content="Education CRM Product Modules">
    <meta itemprop="description" content="Complete suite of admissions automation tools for educational institutions">

    <div class="ecrm-container">

        <?php
        /* Group products by their _product_card_column meta value so the
           landing page mirrors the header mega-menu structure: Featured,
           Core CRM, Communication, Automation. Editors assign each
           Product to a column in WP Admin → 🏷 Product Card Settings. */
        /* Category rows come from Products → 🛠 Products Page (label,
           icon slug, description, order, hide) — non-coder editable. */
        $ee_cat_rows = isset($PS['cats']) && is_array($PS['cats']) ? $PS['cats'] : array();
        if (empty($ee_cat_rows)) {
            $ee_cat_rows = array(
                'featured'      => array('label' => 'Featured',      'icon' => 'star',     'desc' => 'Our most popular admissions tools, used by 500+ institutions.', 'order' => 1, 'hide' => 0),
                'core'          => array('label' => 'Core CRM',      'icon' => 'bullseye', 'desc' => 'Manage the entire admissions lifecycle end-to-end.',            'order' => 2, 'hide' => 0),
                'communication' => array('label' => 'Communication', 'icon' => 'comments', 'desc' => 'Reach every prospect on the channel they prefer.',              'order' => 3, 'hide' => 0),
                'automation'    => array('label' => 'Automation',    'icon' => 'bolt',     'desc' => 'Smart workflows that work while you sleep.',                    'order' => 4, 'hide' => 0),
            );
        }
        uasort($ee_cat_rows, function ($a, $b) { return ((int)($a['order'] ?? 0)) <=> ((int)($b['order'] ?? 0)); });
        $ee_pcols = array();
        foreach ($ee_cat_rows as $k => $r) {
            if (!empty($r['hide'])) continue;
            $ee_pcols[$k] = $r;
        }
        $ee_grouped = array_fill_keys(array_keys($ee_pcols), array());
        $ee_first_col = array_key_first($ee_grouped) ?: 'featured';
        foreach ($ee_products as $p) {
            $col = isset($p['column']) ? $p['column'] : $ee_first_col;
            if ($col === 'hidden') continue;
            if (!isset($ee_grouped[$col])) $col = $ee_first_col;
            if (!isset($ee_grouped[$col])) continue;
            $ee_grouped[$col][] = $p;
        }
        $ee_card_pos = 1;
        ?>

        <div class="ecrm-intro ecrm-anim ecrm-anim-fade">
            <span class="ecrm-intro-eyebrow"><?php echo esc_html($PSget('eyebrow', 'The ExtraaEdge Platform')); ?></span>
            <h1><?php echo esc_html($PSget('h1', 'Every tool your admissions team needs,')); ?> <span class="g"><?php echo esc_html($PSget('h1_accent', 'in one place.')); ?></span></h1>
            <?php if ($PSget('intro_sub')) : ?><p><?php echo esc_html($PSget('intro_sub')); ?></p><?php endif; ?>
        </div>

        <div class="ecrm-shell">

            <aside class="ecrm-sidebar" aria-label="Product categories">
                <span class="ecrm-sidebar-eyebrow"><?php echo esc_html($PSget('side_eyebrow', 'Browse')); ?></span>
                <h2 class="ecrm-sidebar-title"><?php echo esc_html($PSget('side_title', 'Product categories')); ?></h2>
                <nav class="ecrm-sidebar-nav" id="ecrm-sidebar-nav">
                    <?php foreach ($ee_pcols as $ee_sk => $ee_sm) : ?>
                    <a href="#ecrm-section-<?php echo esc_attr($ee_sk); ?>" class="ecrm-sidebar-link" data-target="ecrm-section-<?php echo esc_attr($ee_sk); ?>">
                        <span class="ecrm-sidebar-ico"><?php echo function_exists('ee_products_cat_icon') ? ee_products_cat_icon($ee_sm['icon'], 26) : '<img src="' . esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $ee_sm['icon'] . '.svg') . '" alt="">'; ?></span>
                        <span class="ecrm-sidebar-label"><?php echo esc_html($ee_sm['label']); ?></span>
                        <span class="ecrm-sidebar-count"><?php echo (int) count($ee_grouped[$ee_sk]); ?></span>
                    </a>
                    <?php endforeach; ?>
                </nav>
                <div class="ecrm-sidebar-cta">
                    <strong><?php echo esc_html($PSget('side_cta_strong', 'Talk to an expert')); ?></strong>
                    <p><?php echo esc_html($PSget('side_cta_text', 'Pick the right modules for your admissions team.')); ?></p>
                    <a href="<?php echo esc_url($PSget('side_cta_url', '/book-demo/')); ?>" class="ecrm-sidebar-cta-btn"><?php echo esc_html($PSget('side_cta_btn', 'Book a Demo →')); ?></a>
                </div>
            </aside>

            <div class="ecrm-content">

        <?php foreach ($ee_pcols as $ee_col_key => $ee_col_meta) :
            $ee_col_items = $ee_grouped[$ee_col_key];
            /* Render every category section — even empty ones — so users
               always see the four-category structure. Empty categories
               get a friendly "coming soon" placeholder. */
        ?>
        <section id="ecrm-section-<?php echo esc_attr($ee_col_key); ?>" class="ecrm-cat ecrm-anim ecrm-anim-fade<?php echo empty($ee_col_items) ? ' ecrm-cat--empty' : ''; ?>" aria-label="<?php echo esc_attr($ee_col_meta['label']); ?>">

            <?php if (empty($ee_col_items)) : ?>
                <div class="ecrm-cat-empty">
                    <span class="ecrm-cat-empty-tag"><?php echo esc_html($PSget('empty_tag', 'Coming soon')); ?></span>
                    <p><?php echo wp_kses_post(str_replace('{category}', '<strong>' . esc_html($ee_col_meta['label']) . '</strong>', esc_html($PSget('empty_tpl', 'New {category} products will appear here as they launch.')))); ?></p>
                </div>
            <?php else : ?>
            <div class="ecrm-grid" role="list" aria-label="<?php echo esc_attr($ee_col_meta['label']); ?> products">
                <?php foreach ($ee_col_items as $p) :
                    $position    = $ee_card_pos++;
                    $delay_class = 'ecrm-d' . min((($position - 1) % 6) + 1, 7);
                    $initial     = strtoupper(mb_substr($p['title'], 0, 1));
                    $badge       = isset($p['badge']) ? $p['badge'] : 'none';
                ?>
                    <div role="listitem" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="<?php echo esc_url($p['url']); ?>"
                           class="ecrm-card ecrm-anim <?php echo esc_attr($delay_class); ?>"
                           aria-label="<?php echo esc_attr($p['title'] . ' — ' . $p['desc']); ?>"
                           itemprop="url">
                            <meta itemprop="position" content="<?php echo (int) $position; ?>">
                            <div class="ecrm-card-top">
                                <div class="ecrm-card-icon" aria-hidden="true">
                                    <?php if (!empty($p['icon'])) : ?>
                                        <img src="<?php echo esc_url($p['icon']); ?>"
                                             alt="<?php echo esc_attr($p['title']); ?> product icon"
                                             class="ecrm-card-logo"
                                             width="32" height="32" loading="lazy" decoding="async"
                                             onerror="this.outerHTML='<div class=\'ecrm-card-logo-fallback\'><?php echo esc_js($initial); ?></div>'">
                                    <?php else : ?>
                                        <div class="ecrm-card-logo-fallback"><?php echo esc_html($initial); ?></div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($badge && $badge !== 'none') : ?>
                                    <span class="ecrm-card-badge ecrm-card-badge--<?php echo esc_attr($badge); ?>"><?php echo esc_html(strtoupper($badge)); ?></span>
                                <?php else : ?>
                                    <span class="ecrm-card-num" aria-hidden="true"><?php echo sprintf('%02d', $position); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="ecrm-card-body">
                                <span class="ecrm-card-cat"><?php echo esc_html($ee_col_meta['label']); ?></span>
                                <h3 class="ecrm-card-title" itemprop="name"><?php echo esc_html($p['title']); ?></h3>
                                <p class="ecrm-card-desc"><?php echo esc_html($p['desc']); ?></p>
                                <span class="ecrm-card-link" aria-hidden="true">
                                    <?php echo esc_html($PSget('card_link', 'Explore module')); ?>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path d="M2 7H12M8 3L12 7L8 11" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </section>
        <?php endforeach; ?>

            </div><!-- /.ecrm-content -->
        </div><!-- /.ecrm-shell -->

        <div class="ecrm-cta-outer ecrm-anim ecrm-anim-fade ecrm-d7">
            <div class="ecrm-cta-box" role="region" aria-labelledby="ecrm-cta-title">
                <div class="ecrm-cta-inner">
                    <span class="ecrm-cta-badge"><?php echo esc_html($PSget('big_badge', 'Start Free — No Commitment')); ?></span>
                    <h2 id="ecrm-cta-title" class="ecrm-cta-title"><?php echo esc_html($PSget('big_title', 'Ready to transform your admissions?')); ?></h2>
                    <p class="ecrm-cta-subtitle"><?php echo esc_html($PSget('big_sub', 'Join 550+ institutions already converting more inquiries into enrollments — on autopilot. See results in your first 30 days.')); ?></p>
                    <div class="ecrm-cta-actions">
                        <a href="<?php echo esc_url($PSget('big_url1', '/book-demo/')); ?>" class="ecrm-btn-primary" aria-label="<?php echo esc_attr($PSget('big_btn1', 'Start Your Free Demo')); ?>">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M9 2L16 9L9 16M16 9H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <?php echo esc_html($PSget('big_btn1', 'Start Your Free Demo')); ?>
                        </a>
                        <a href="<?php echo esc_url($PSget('big_url2', '/resources/')); ?>" class="ecrm-btn-secondary" aria-label="<?php echo esc_attr($PSget('big_btn2', 'Watch Demo')); ?>">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><circle cx="8" cy="8" r="6.5" stroke="currentColor" stroke-width="1.5"/><path d="M6.5 5.5L11 8L6.5 10.5V5.5Z" fill="currentColor"/></svg>
                            <?php echo esc_html($PSget('big_btn2', 'Watch Demo')); ?>
                        </a>
                    </div>
                    <div class="ecrm-cta-trust" aria-label="No-risk guarantees">
                        <?php $ee_bullets = array_filter(array_map('trim', explode("\n", (string) $PSget('trust', "No credit card required\nPersonalized onboarding\nCancel anytime\nSetup in 48 hours"))));
                        foreach ($ee_bullets as $bullet) : ?>
                            <span class="ecrm-cta-trust-item">
                                <svg class="ecrm-cta-trust-icon" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M1 7L5 11L13 3" stroke="#93C5FD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <?php echo esc_html($bullet); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
(function(){
    /* IntersectionObserver reveal — scoped to .ecrm-section */
    if (!('IntersectionObserver' in window)) {
        document.querySelectorAll('.ecrm-section .ecrm-anim').forEach(function(el){ el.classList.add('is-visible'); });
        return;
    }
    var io = new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.ecrm-section .ecrm-anim').forEach(function(el){ io.observe(el); });
})();

/* ── Sidebar smooth-scroll + scrollspy ── */
(function(){
    var nav = document.getElementById('ecrm-sidebar-nav');
    if (!nav) return;
    var links = Array.prototype.slice.call(nav.querySelectorAll('.ecrm-sidebar-link'));
    if (!links.length) return;

    /* Smooth-scroll on click */
    links.forEach(function(a){
        a.addEventListener('click', function(e){
            var id = a.getAttribute('data-target');
            var t  = id ? document.getElementById(id) : null;
            if (!t) return;
            e.preventDefault();
            var y = t.getBoundingClientRect().top + window.scrollY - 110;
            window.scrollTo({ top: y, behavior: 'smooth' });
            history.replaceState(null, '', '#' + id);
        });
    });

    /* Scrollspy — highlight active category as the visitor scrolls */
    var sections = links.map(function(a){ return document.getElementById(a.getAttribute('data-target')); }).filter(Boolean);
    function setActive(idx){
        links.forEach(function(a, i){ a.classList.toggle('is-active', i === idx); });
    }
    function onScroll(){
        var probe = window.scrollY + 200;
        var cur = 0;
        for (var i = 0; i < sections.length; i++) {
            if (sections[i].offsetTop <= probe) cur = i;
        }
        setActive(cur);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* If URL has a hash, scroll to it on load */
    if (location.hash) {
        var idx = links.findIndex(function(a){ return '#' + a.getAttribute('data-target') === location.hash; });
        if (idx > -1) {
            setTimeout(function(){ links[idx].click(); }, 100);
        }
    }
})();
</script>

<?php get_footer();
