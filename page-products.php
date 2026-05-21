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

/* SEO meta tags — emitted via wp_head() */
add_action('wp_head', function () {
    $title = 'Education CRM Products — Convert More Students, Automatically | ExtraaEdge';
    $desc  = 'Education CRM platform with AI chatbots, application management, and WhatsApp integration. Automate admissions, boost conversions, and scale enrollment 24/7.';
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
   PRODUCTS LANDING — scoped to .ecrm-section
   ============================================ */
.ecrm-section {
    --clr-orange:       #DE6E30;
    --clr-orange-dark:  #C25A22;
    --clr-orange-light: #F7D9C8;
    --clr-orange-ultra: #FFF3EC;
    --clr-navy:         #19335D;
    --clr-navy-mid:     #1E3F73;
    --clr-navy-dark:    #112240;
    --clr-white:        #FFFFFF;
    --clr-gray-50:      #F9FAFB;
    --clr-gray-100:     #F3F4F6;
    --clr-gray-200:     #E5E7EB;
    --clr-gray-400:     #9CA3AF;
    --clr-gray-500:     #6B7280;
    --clr-gray-700:     #374151;

    --radius-sm: .5rem; --radius-md: .75rem; --radius-lg: 1rem;
    --radius-xl: 1.25rem; --radius-2xl: 1.5rem; --radius-3xl: 2rem;

    --shadow-card:   0 1px 3px rgba(0,0,0,.06), 0 4px 16px rgba(25,51,93,.07);
    --shadow-hover:  0 8px 32px rgba(25,51,93,.14), 0 2px 8px rgba(25,51,93,.08);
    --shadow-cta:    0 20px 60px rgba(25,51,93,.22);
    --shadow-orange: 0 8px 28px rgba(222,110,48,.38);

    --transition-base: all .28s cubic-bezier(.4,0,.2,1);
    --transition-fast: all .18s cubic-bezier(.4,0,.2,1);
    --transition-slow: all .45s cubic-bezier(.4,0,.2,1);

    width:100%;
    background:var(--clr-white);
    position:relative;
    overflow:hidden;
    padding:5rem 1.25rem;
    font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',system-ui,sans-serif;
    color:var(--clr-gray-700);
    line-height:1.6;
}
@media (min-width:640px){.ecrm-section{padding:6rem 2.5rem}}
@media (min-width:1024px){.ecrm-section{padding:7rem 4rem}}

.ecrm-section::before{
    content:'';position:absolute;inset:0;pointer-events:none;
    background:
        radial-gradient(ellipse 60% 40% at 10% 0%, rgba(222,110,48,.045) 0%, transparent 60%),
        radial-gradient(ellipse 50% 35% at 90% 100%, rgba(25,51,93,.04) 0%, transparent 55%);
}
.ecrm-container{max-width:76rem;margin:0 auto;position:relative;z-index:1}

/* Header */
.ecrm-header{text-align:center;margin-bottom:4.5rem}
@media (min-width:640px){.ecrm-header{margin-bottom:5.5rem}}
.ecrm-eyebrow{
    display:inline-flex;align-items:center;gap:.5rem;
    background:linear-gradient(135deg,var(--clr-orange-ultra),#FEE8D6);
    border:1px solid var(--clr-orange-light);color:var(--clr-orange);
    font-size:.75rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
    padding:.45rem 1rem;border-radius:100px;margin-bottom:1.25rem;
}
.ecrm-eyebrow-dot{width:6px;height:6px;background:var(--clr-orange);border-radius:50%;animation:ecrm-pulse 2s ease-in-out infinite}
@keyframes ecrm-pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.75)}}
.ecrm-headline{
    font-size:clamp(1.875rem,5vw,3.25rem);font-weight:900;color:var(--clr-navy);
    line-height:1.12;letter-spacing:-.03em;margin-bottom:1.25rem;
    max-width:46rem;margin-left:auto;margin-right:auto;
}
.ecrm-headline mark{background:none;color:var(--clr-orange);position:relative}
.ecrm-headline mark::after{
    content:'';position:absolute;left:0;right:0;bottom:2px;height:3px;
    background:linear-gradient(90deg,var(--clr-orange),transparent);border-radius:2px;
}
.ecrm-subheadline{
    font-size:clamp(1rem,2vw,1.125rem);color:var(--clr-gray-500);line-height:1.7;
    max-width:42rem;margin:0 auto;font-weight:400;
}

/* Stats */
.ecrm-stats{display:flex;flex-wrap:wrap;justify-content:center;gap:1rem 2.5rem;margin-top:2.5rem}
.ecrm-stat-item{display:flex;align-items:center;gap:.5rem;font-size:.875rem;color:var(--clr-gray-500)}
.ecrm-stat-num{font-weight:800;color:var(--clr-navy);font-size:1rem}
.ecrm-stat-icon{width:16px;height:16px;color:var(--clr-orange);flex-shrink:0}

/* Trust bar */
.ecrm-trust-bar{
    display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:.75rem 2rem;
    margin-bottom:4.5rem;padding:1.5rem 2rem;
    background:var(--clr-gray-50);border:1px solid var(--clr-gray-100);border-radius:var(--radius-2xl);
}
.ecrm-trust-label{
    font-size:.75rem;font-weight:700;color:var(--clr-gray-400);
    text-transform:uppercase;letter-spacing:.12em;width:100%;text-align:center;margin-bottom:.25rem;
}
@media (min-width:640px){.ecrm-trust-label{width:auto;margin-bottom:0}}
.ecrm-trust-item{display:flex;align-items:center;gap:.4rem;font-size:.8125rem;font-weight:600;color:var(--clr-gray-500)}
.ecrm-trust-check{
    width:14px;height:14px;
    background:linear-gradient(135deg,var(--clr-orange),var(--clr-orange-dark));
    border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;
}

/* Grid */
/* ═════════════ Docs-style left sidebar + content area ═════════════ */
.ecrm-shell {
    display: grid;
    grid-template-columns: 280px minmax(0, 1fr);
    gap: 48px;
    align-items: start;
    margin-bottom: 4rem;
}
@media (max-width: 960px) {
    .ecrm-shell { grid-template-columns: 1fr; gap: 24px; }
}

/* Left sticky sidebar */
.ecrm-sidebar {
    position: sticky;
    top: 110px;
    align-self: start;
    background: linear-gradient(180deg, #fff 0%, #FFFCF8 100%);
    border: 1px solid var(--clr-orange-light);
    border-radius: 18px;
    padding: 22px 18px;
    box-shadow: 0 8px 28px rgba(25, 51, 93, 0.06);
}
.ecrm-sidebar-eyebrow {
    display: flex; align-items: center; gap: 8px;
    font-family: var(--font-base);
    font-size: .68rem;
    font-weight: 700;
    color: var(--clr-orange);
    letter-spacing: .12em;
    text-transform: uppercase;
    margin-bottom: 6px;
}
.ecrm-sidebar-eyebrow::before {
    content: "";
    width: 5px; height: 5px; border-radius: 50%;
    background: var(--clr-orange);
    box-shadow: 0 0 0 4px var(--clr-orange-ultra);
}
.ecrm-sidebar-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
    font-weight: 800;
    color: var(--clr-navy);
    margin: 0 0 18px;
    letter-spacing: -.01em;
    line-height: 1.3;
}
.ecrm-sidebar-nav {
    display: flex; flex-direction: column;
    gap: 6px;
    margin: 0 0 18px; padding: 0; list-style: none;
}
.ecrm-sidebar-link {
    display: flex; align-items: center; gap: 12px;
    padding: 11px 12px;
    border-radius: 11px;
    text-decoration: none;
    color: var(--clr-gray-700);
    font-size: .92rem;
    font-weight: 600;
    border: 1px solid transparent;
    transition: all .22s ease;
    position: relative;
}
.ecrm-sidebar-link:hover {
    background: #fff;
    border-color: var(--clr-orange-light);
    color: var(--clr-orange);
    transform: translateX(2px);
}
.ecrm-sidebar-link.is-active {
    background: #fff;
    border-color: var(--clr-orange);
    color: var(--clr-orange);
    box-shadow: 0 4px 14px rgba(222, 110, 48, 0.14);
}
.ecrm-sidebar-link.is-active::before {
    content: "";
    position: absolute;
    left: -19px; top: 50%; transform: translateY(-50%);
    width: 3px; height: 20px;
    background: var(--clr-orange);
    border-radius: 0 3px 3px 0;
}
.ecrm-sidebar-ico {
    width: 32px; height: 32px;
    flex-shrink: 0;
    background: var(--clr-orange-ultra);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    padding: 6px;
    transition: all .22s ease;
}
.ecrm-sidebar-link.is-active .ecrm-sidebar-ico,
.ecrm-sidebar-link:hover .ecrm-sidebar-ico {
    background: var(--clr-orange);
    box-shadow: 0 4px 10px rgba(222, 110, 48, 0.30);
}
.ecrm-sidebar-link .ecrm-sidebar-ico img {
    width: 100%; height: 100%; object-fit: contain;
    transition: filter .22s ease;
}
.ecrm-sidebar-link.is-active .ecrm-sidebar-ico img,
.ecrm-sidebar-link:hover .ecrm-sidebar-ico img {
    filter: brightness(0) invert(1);
}
.ecrm-sidebar-label { flex: 1; min-width: 0; }

/* Sidebar mini CTA at the bottom */
.ecrm-sidebar-cta {
    background: linear-gradient(135deg, var(--clr-navy-dark), var(--clr-navy));
    color: #fff;
    border-radius: 12px;
    padding: 14px 16px;
    text-align: center;
}
.ecrm-sidebar-cta strong {
    display: block;
    font-size: .85rem;
    font-weight: 700;
    margin-bottom: 4px;
    color: #fff;
}
.ecrm-sidebar-cta p {
    font-size: .72rem;
    opacity: .85;
    margin: 0 0 10px;
    line-height: 1.45;
}
.ecrm-sidebar-cta-btn {
    display: inline-block;
    background: var(--clr-orange);
    color: #fff !important;
    font-size: .75rem;
    font-weight: 700;
    padding: 7px 14px;
    border-radius: 7px;
    text-decoration: none;
    transition: background .2s ease;
}
.ecrm-sidebar-cta-btn:hover { background: var(--clr-orange-dark); }

/* On tablet/mobile turn the sidebar into a horizontal chip strip */
@media (max-width: 960px) {
    .ecrm-sidebar { position: static; padding: 16px; }
    .ecrm-sidebar-title { margin-bottom: 12px; font-size: .95rem; }
    .ecrm-sidebar-nav {
        display: flex; flex-direction: row; flex-wrap: nowrap;
        gap: 8px; overflow-x: auto;
        margin-bottom: 12px;
        scrollbar-width: thin;
        -webkit-overflow-scrolling: touch;
    }
    .ecrm-sidebar-link {
        flex: 0 0 auto;
        padding: 8px 12px;
        font-size: .85rem;
        white-space: nowrap;
    }
    .ecrm-sidebar-link.is-active::before { display: none; }
    .ecrm-sidebar-ico { width: 24px; height: 24px; padding: 4px; }
    .ecrm-sidebar-cta { display: none; }
}

/* Category section (Featured / Core CRM / Communication / Automation)
   Sections stack vertically — each one is full-width with its header
   pinned above its product grid. Empty categories show a "Coming soon"
   placeholder so the user always sees all four categories. */
.ecrm-cat{display:block;margin-bottom:2.5rem;width:100%;scroll-margin-top:120px}
.ecrm-cat:last-of-type{margin-bottom:4rem}
.ecrm-cat--empty .ecrm-cat-head{opacity:.7}
.ecrm-cat-empty{
    background:#fff;border:1px dashed var(--clr-gray-200);border-radius:var(--radius-lg);
    padding:1.5rem 1.75rem;text-align:center;color:var(--clr-gray-500);
}
.ecrm-cat-empty-tag{
    display:inline-block;background:var(--clr-orange-ultra);color:var(--clr-orange);
    font-size:.7rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;
    padding:.25rem .65rem;border-radius:99px;border:1px solid var(--clr-orange-light);
    margin-bottom:.45rem;
}
.ecrm-cat-empty p{margin:0;font-size:.9rem;line-height:1.5}
.ecrm-cat-head{
    display:flex;align-items:center;gap:18px;
    padding:18px 22px;
    background:linear-gradient(135deg, var(--clr-orange-ultra) 0%, #FFFCF8 100%);
    border:1px solid var(--clr-orange-light);
    border-left:4px solid var(--clr-orange);
    border-radius:var(--radius-lg);
    margin-bottom:1.5rem;
}
.ecrm-cat-icon{
    width:44px;height:44px;flex-shrink:0;
    background:#fff;border-radius:12px;
    display:flex;align-items:center;justify-content:center;padding:8px;
    box-shadow:0 4px 10px rgba(222,110,48,.12);
}
.ecrm-cat-icon img{width:100%;height:100%;object-fit:contain}
.ecrm-cat-title{
    font-size:1.45rem;font-weight:800;color:var(--clr-navy);
    margin:0 0 4px;letter-spacing:-.01em;line-height:1.2;
}
.ecrm-cat-desc{
    font-size:.92rem;color:var(--clr-gray-500);margin:0;line-height:1.45;
}
@media (max-width:640px){
    .ecrm-cat-head{flex-wrap:wrap;padding:14px 16px}
    .ecrm-cat-icon{width:38px;height:38px;padding:6px}
    .ecrm-cat-title{font-size:1.2rem}
}

/* Per-card badge pill (top-right) */
.ecrm-card-badge{
    position:absolute;top:1rem;right:1rem;z-index:2;
    font-family:var(--font-base);font-size:.6rem;font-weight:700;
    padding:.22rem .55rem;border-radius:4px;
    text-transform:uppercase;letter-spacing:.05em;color:#fff;
    line-height:1.2;
}
.ecrm-card-badge--new      { background:#10B981; }
.ecrm-card-badge--popular  { background:#DE6E30; }
.ecrm-card-badge--trending { background:#F59E0B; }
.ecrm-card-badge--hot      { background:#DE6E30; animation:ecrm-pulse 1.8s infinite; }

.ecrm-grid{display:grid;grid-template-columns:1fr;gap:1.25rem;margin-bottom:0}
@media (min-width:480px){.ecrm-grid{grid-template-columns:repeat(2,1fr)}}
@media (min-width:1024px){.ecrm-grid{grid-template-columns:repeat(3,1fr);gap:1.5rem}}

/* Card */
.ecrm-card{
    position:relative;display:flex;flex-direction:column;
    background:var(--clr-white);border:1.5px solid var(--clr-gray-100);
    border-radius:var(--radius-2xl);padding:1.75rem;
    text-decoration:none;color:inherit;transition:var(--transition-base);
    box-shadow:var(--shadow-card);overflow:hidden;will-change:transform;outline:none;
}
@media (min-width:640px){.ecrm-card{padding:2rem}}
.ecrm-card::before{
    content:'';position:absolute;top:0;left:1.5rem;right:1.5rem;height:2px;z-index:0;
    background:linear-gradient(90deg,transparent,var(--clr-orange),transparent);
    border-radius:0 0 2px 2px;opacity:0;transition:var(--transition-base);
}
.ecrm-card::after{
    content:'';position:absolute;inset:0;pointer-events:none;opacity:0;z-index:0;
    transition:var(--transition-slow);
    background:linear-gradient(135deg,var(--clr-orange-ultra) 0%,transparent 60%);
}
.ecrm-card:hover,.ecrm-card:focus-visible{
    transform:translateY(-6px);border-color:var(--clr-orange-light);box-shadow:var(--shadow-hover);
}
.ecrm-card:hover::before,.ecrm-card:focus-visible::before,
.ecrm-card:hover::after,.ecrm-card:focus-visible::after{opacity:1}
.ecrm-card:focus-visible{outline:2px solid var(--clr-orange);outline-offset:3px}

/* Standard tile — used for every product card icon. 56x56 keeps logos
   readable but doesn't dominate the card. Same dimensions everywhere
   (header mega-menu / use-cases / products) for visual consistency. */
.ecrm-card-icon{
    position:relative;z-index:3;width:56px;height:56px;border-radius:14px;
    background:#ffffff;border:1px solid var(--clr-orange-light);
    display:flex;align-items:center;justify-content:center;margin-bottom:1.1rem;
    transition:var(--transition-base);flex-shrink:0;overflow:hidden;
    isolation:isolate; /* contains the inner scaled <img> reliably above the
                          card's ::after shimmer overlay */
}
.ecrm-card:hover .ecrm-card-icon,.ecrm-card:focus-visible .ecrm-card-icon{
    background:#fff7f0;border-color:rgba(222,110,48,.50);box-shadow:0 12px 28px rgba(222,110,48,.18);
}
/* Logo image — fill the tile (95% so it never crops to the edge) and
   keep the colorful brand artwork visible on hover. No inversion, no
   filter changes, only a subtle scale-up for delight. */
.ecrm-card-logo{
    position:relative;z-index:1;
    width:95%;height:95%;max-width:95%;max-height:95%;
    object-fit:contain;
    transition:transform var(--transition-base);
}
.ecrm-card:hover .ecrm-card-logo,.ecrm-card:focus-visible .ecrm-card-logo{transform:scale(1.08)}
.ecrm-card-logo-fallback{
    width:3rem;height:3rem;
    background:linear-gradient(135deg,var(--clr-orange),var(--clr-navy));border-radius:8px;
    display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:1.1rem;
}
.ecrm-card-body{position:relative;z-index:1;flex:1;display:flex;flex-direction:column}
.ecrm-card-title{font-size:1.0625rem;font-weight:700;color:var(--clr-navy);margin-bottom:.5rem;line-height:1.35;letter-spacing:-.01em}
.ecrm-card-desc{font-size:.875rem;color:var(--clr-gray-500);line-height:1.65;flex:1}
.ecrm-card-link{
    display:inline-flex;align-items:center;gap:.375rem;
    font-size:.8125rem;font-weight:700;color:var(--clr-orange);margin-top:1.125rem;
    opacity:0;transform:translateX(-6px);transition:var(--transition-base);
}
.ecrm-card-link svg{transition:var(--transition-fast)}
.ecrm-card:hover .ecrm-card-link,.ecrm-card:focus-visible .ecrm-card-link{opacity:1;transform:translateX(0)}
.ecrm-card:hover .ecrm-card-link svg,.ecrm-card:focus-visible .ecrm-card-link svg{transform:translateX(3px)}
.ecrm-card-num{
    position:absolute;top:1.5rem;right:1.5rem;font-size:.6875rem;font-weight:800;
    color:var(--clr-gray-200);letter-spacing:.08em;transition:var(--transition-base);
}
.ecrm-card:hover .ecrm-card-num,.ecrm-card:focus-visible .ecrm-card-num{color:var(--clr-orange-light)}

/* CTA */
.ecrm-cta-outer{position:relative}
.ecrm-cta-box{
    position:relative;
    background:linear-gradient(135deg,var(--clr-navy-dark) 0%,var(--clr-navy) 50%,var(--clr-navy-mid) 100%);
    border-radius:var(--radius-3xl);padding:3.5rem 2rem;text-align:center;overflow:hidden;
    box-shadow:var(--shadow-cta);
}
@media (min-width:640px){.ecrm-cta-box{padding:4.5rem 4rem}}
.ecrm-cta-box::before,.ecrm-cta-box::after{content:'';position:absolute;border-radius:50%;pointer-events:none}
.ecrm-cta-box::before{width:350px;height:350px;background:radial-gradient(circle,rgba(222,110,48,.18) 0%,transparent 70%);top:-80px;left:-60px}
.ecrm-cta-box::after{width:280px;height:280px;background:radial-gradient(circle,rgba(255,255,255,.05) 0%,transparent 70%);bottom:-60px;right:-40px}
.ecrm-cta-inner{position:relative;z-index:1;max-width:44rem;margin:0 auto}
.ecrm-cta-badge{
    display:inline-block;background:rgba(222,110,48,.18);border:1px solid rgba(222,110,48,.35);
    color:#FDBA74;font-size:.75rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
    padding:.4rem 1rem;border-radius:100px;margin-bottom:1.5rem;
}
.ecrm-cta-title{
    font-size:clamp(1.5rem,4vw,2.25rem);font-weight:900;color:#fff;
    line-height:1.15;letter-spacing:-.025em;margin-bottom:1rem;
}
.ecrm-cta-subtitle{font-size:1rem;color:#93C5FD;line-height:1.65;margin-bottom:2.25rem}
.ecrm-cta-actions{display:flex;flex-direction:column;align-items:center;gap:.875rem}
@media (min-width:480px){.ecrm-cta-actions{flex-direction:row;justify-content:center;flex-wrap:wrap}}
.ecrm-btn-primary,.ecrm-btn-secondary{
    display:inline-flex;align-items:center;justify-content:center;gap:.5rem;
    font-family:inherit;font-weight:700;padding:.9375rem 2.25rem;border-radius:var(--radius-md);
    text-decoration:none;cursor:pointer;transition:var(--transition-base);white-space:nowrap;
}
.ecrm-btn-primary{background:var(--clr-orange);color:#fff;border:none;font-size:1rem;letter-spacing:.01em}
.ecrm-btn-primary:hover{background:var(--clr-orange-dark);transform:translateY(-2px);box-shadow:var(--shadow-orange)}
.ecrm-btn-primary:focus-visible{outline:2px solid rgba(255,255,255,.7);outline-offset:3px}
.ecrm-btn-secondary{
    background:rgba(255,255,255,.09);color:#fff;font-size:.9375rem;font-weight:600;padding:.9375rem 1.75rem;
    border:1.5px solid rgba(255,255,255,.18);backdrop-filter:blur(4px);
}
.ecrm-btn-secondary:hover{background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.35);transform:translateY(-2px)}
.ecrm-cta-trust{display:flex;flex-wrap:wrap;justify-content:center;gap:.5rem 1.5rem;margin-top:1.75rem}
.ecrm-cta-trust-item{display:flex;align-items:center;gap:.375rem;font-size:.8125rem;color:#BFDBFE;font-weight:500}
.ecrm-cta-trust-icon{width:14px;height:14px;opacity:.85}

/* Reveal animations */
@keyframes ecrm-fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
@keyframes ecrm-fadeIn{from{opacity:0}to{opacity:1}}
.ecrm-anim{opacity:0}
.ecrm-anim.is-visible{animation:ecrm-fadeUp .6s ease forwards}
.ecrm-anim-fade.is-visible{animation:ecrm-fadeIn .7s ease forwards}
.ecrm-d1{animation-delay:.05s}.ecrm-d2{animation-delay:.12s}.ecrm-d3{animation-delay:.19s}
.ecrm-d4{animation-delay:.26s}.ecrm-d5{animation-delay:.33s}.ecrm-d6{animation-delay:.40s}
.ecrm-d7{animation-delay:.47s}

@media (prefers-reduced-motion:reduce){
    .ecrm-section *,.ecrm-section *::before,.ecrm-section *::after{
        animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important;
    }
    .ecrm-anim{opacity:1}.ecrm-eyebrow-dot{animation:none}
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

        <header class="ecrm-header ecrm-anim ecrm-anim-fade ecrm-d1">
            <p class="ecrm-eyebrow">
                <span class="ecrm-eyebrow-dot" aria-hidden="true"></span>
                Built for Modern Institutions
            </p>
            <h1 id="ecrm-heading" class="ecrm-headline">
                Convert more students.<br><mark>Automatically.</mark>
            </h1>
            <p class="ecrm-subheadline">
                One unified platform to automate admissions, engage prospects instantly, and scale your institution — without the chaos.
            </p>
            <div class="ecrm-stats" aria-label="Platform highlights">
                <div class="ecrm-stat-item">
                    <svg class="ecrm-stat-icon" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M8 1L10.5 6H15L11.5 9.5L13 14L8 11L3 14L4.5 9.5L1 6H5.5L8 1Z" fill="currentColor"/></svg>
                    <span class="ecrm-stat-num">550+</span><span>Institutions</span>
                </div>
                <div class="ecrm-stat-item">
                    <svg class="ecrm-stat-icon" viewBox="0 0 16 16" fill="none" aria-hidden="true"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M8 4.5V8.5L10.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    <span class="ecrm-stat-num">24/7</span><span>Automation</span>
                </div>
                <div class="ecrm-stat-item">
                    <svg class="ecrm-stat-icon" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M2 10L6 6L9 9L14 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="ecrm-stat-num">2×</span><span>More Conversions</span>
                </div>
                <div class="ecrm-stat-item">
                    <svg class="ecrm-stat-icon" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M8 2C4.686 2 2 4.686 2 8C2 11.314 4.686 14 8 14C11.314 14 14 11.314 14 8C14 4.686 11.314 2 8 2Z" stroke="currentColor" stroke-width="1.5"/><path d="M5.5 8.5L7 10L10.5 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="ecrm-stat-num">99.9%</span><span>Uptime SLA</span>
                </div>
            </div>
        </header>

        <div class="ecrm-trust-bar ecrm-anim ecrm-d2" role="list" aria-label="Platform trust signals">
            <span class="ecrm-trust-label">Why leading institutions choose us</span>
            <?php foreach (array('No code setup','Go live in 48 hours','GDPR compliant','Dedicated onboarding','API-first platform') as $tb) : ?>
                <div class="ecrm-trust-item" role="listitem">
                    <span class="ecrm-trust-check" aria-hidden="true">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><path d="M1.5 4L3.5 6L6.5 2.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span><?php echo esc_html($tb); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <?php
        /* Group products by their _product_card_column meta value so the
           landing page mirrors the header mega-menu structure: Featured,
           Core CRM, Communication, Automation. Editors assign each
           Product to a column in WP Admin → 🏷 Product Card Settings. */
        $ee_pcols = array(
            'featured'      => array('label' => 'Featured',      'icon' => 'star',     'desc' => 'Our most popular admissions tools, used by 500+ institutions.'),
            'core'          => array('label' => 'Core CRM',      'icon' => 'bullseye', 'desc' => 'Manage the entire admissions lifecycle end-to-end.'),
            'communication' => array('label' => 'Communication', 'icon' => 'comments', 'desc' => 'Reach every prospect on the channel they prefer.'),
            'automation'    => array('label' => 'Automation',    'icon' => 'bolt',     'desc' => 'Smart workflows that work while you sleep.'),
        );
        $ee_grouped = array('featured'=>array(),'core'=>array(),'communication'=>array(),'automation'=>array());
        foreach ($ee_products as $p) {
            $col = isset($p['column']) ? $p['column'] : 'featured';
            if ($col === 'hidden' || !isset($ee_grouped[$col])) $col = 'featured';
            $ee_grouped[$col][] = $p;
        }
        $ee_card_pos = 1;
        ?>

        <div class="ecrm-shell">

            <aside class="ecrm-sidebar" aria-label="Product categories">
                <span class="ecrm-sidebar-eyebrow">Browse</span>
                <h2 class="ecrm-sidebar-title">Product categories</h2>
                <nav class="ecrm-sidebar-nav" id="ecrm-sidebar-nav">
                    <?php foreach ($ee_pcols as $ee_sk => $ee_sm) : ?>
                    <a href="#ecrm-section-<?php echo esc_attr($ee_sk); ?>" class="ecrm-sidebar-link" data-target="ecrm-section-<?php echo esc_attr($ee_sk); ?>">
                        <span class="ecrm-sidebar-ico"><img src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $ee_sm['icon'] . '.svg'); ?>" alt=""></span>
                        <span class="ecrm-sidebar-label"><?php echo esc_html($ee_sm['label']); ?></span>
                    </a>
                    <?php endforeach; ?>
                </nav>
                <div class="ecrm-sidebar-cta">
                    <strong>Talk to an expert</strong>
                    <p>Pick the right modules for your admissions team.</p>
                    <a href="/book-demo/" class="ecrm-sidebar-cta-btn">Book a Demo →</a>
                </div>
            </aside>

            <div class="ecrm-content">

        <?php foreach ($ee_pcols as $ee_col_key => $ee_col_meta) :
            $ee_col_items = $ee_grouped[$ee_col_key];
            /* Render every category section — even empty ones — so users
               always see the four-category structure. Empty categories
               get a friendly "coming soon" placeholder. */
        ?>
        <section id="ecrm-section-<?php echo esc_attr($ee_col_key); ?>" class="ecrm-cat ecrm-anim ecrm-anim-fade<?php echo empty($ee_col_items) ? ' ecrm-cat--empty' : ''; ?>" aria-labelledby="ecrm-cat-<?php echo esc_attr($ee_col_key); ?>">
            <header class="ecrm-cat-head">
                <div class="ecrm-cat-icon"><img src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $ee_col_meta['icon'] . '.svg'); ?>" alt=""></div>
                <div>
                    <h2 id="ecrm-cat-<?php echo esc_attr($ee_col_key); ?>" class="ecrm-cat-title"><?php echo esc_html($ee_col_meta['label']); ?></h2>
                    <p class="ecrm-cat-desc"><?php echo esc_html($ee_col_meta['desc']); ?></p>
                </div>
            </header>

            <?php if (empty($ee_col_items)) : ?>
                <div class="ecrm-cat-empty">
                    <span class="ecrm-cat-empty-tag">Coming soon</span>
                    <p>New <strong><?php echo esc_html($ee_col_meta['label']); ?></strong> products will appear here as they launch.</p>
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
                            <span class="ecrm-card-num" aria-hidden="true"><?php echo sprintf('%02d', $position); ?></span>
                            <?php if ($badge && $badge !== 'none') : ?>
                                <span class="ecrm-card-badge ecrm-card-badge--<?php echo esc_attr($badge); ?>"><?php echo esc_html(strtoupper($badge)); ?></span>
                            <?php endif; ?>
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
                            <div class="ecrm-card-body">
                                <h3 class="ecrm-card-title" itemprop="name"><?php echo esc_html($p['title']); ?></h3>
                                <p class="ecrm-card-desc"><?php echo esc_html($p['desc']); ?></p>
                                <span class="ecrm-card-link" aria-hidden="true">
                                    Explore module
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
                    <span class="ecrm-cta-badge">Start Free — No Commitment</span>
                    <h2 id="ecrm-cta-title" class="ecrm-cta-title">Ready to transform your admissions?</h2>
                    <p class="ecrm-cta-subtitle">Join 550+ institutions already converting more inquiries into enrollments — on autopilot. See results in your first 30 days.</p>
                    <div class="ecrm-cta-actions">
                        <a href="/book-demo/" class="ecrm-btn-primary" aria-label="Start your free demo of Education CRM">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M9 2L16 9L9 16M16 9H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Start Your Free Demo
                        </a>
                        <a href="/resources/" class="ecrm-btn-secondary" aria-label="Watch a product demo video">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><circle cx="8" cy="8" r="6.5" stroke="currentColor" stroke-width="1.5"/><path d="M6.5 5.5L11 8L6.5 10.5V5.5Z" fill="currentColor"/></svg>
                            Watch Demo
                        </a>
                    </div>
                    <div class="ecrm-cta-trust" aria-label="No-risk guarantees">
                        <?php foreach (array('No credit card required','Personalized onboarding','Cancel anytime','Setup in 48 hours') as $bullet) : ?>
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
