<?php
/**
 * /products/ — enterprise SaaS products experience.
 *
 * 12-section premium landing (hero + search, featured, categories, all
 * products with live filter/sort, ecosystem, why-us, comparison,
 * integrations, metrics, testimonials, FAQ, final CTA) rendered ONLY from
 * existing data:
 *   • Products   → ee_get_product_menu_items()  (Product CPT + Card Settings)
 *   • Page copy  → ee_products_page_get()       (Products → Products Page admin)
 *   • Quotes     → latest 'testimonial' posts (section skipped when none)
 *
 * Brand: #19335D / #DE6E30 on white, Inter only, 24/16/14 radii, soft
 * shadows, 1320px shell, IO-driven fade-ups. No external dependencies.
 */
if (!defined('ABSPATH')) exit;

$ee_products = function_exists('ee_get_product_menu_items') ? ee_get_product_menu_items() : array();
$PS    = function_exists('ee_products_page_get') ? ee_products_page_get() : array();
$PSget = function ($k, $fb = '') use ($PS) { return isset($PS[$k]) && $PS[$k] !== '' ? $PS[$k] : $fb; };

/* ── Category rows (label / icon slug / desc / order / hide) ── */
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
foreach ($ee_cat_rows as $k => $r) { if (empty($r['hide'])) $ee_pcols[$k] = $r; }

/* ── Normalise products for PHP + JS ── */
$ee_first_col = array_key_first($ee_pcols) ?: 'featured';
$ee_items = array();
foreach ($ee_products as $i => $p) {
    $col = isset($p['column']) ? $p['column'] : $ee_first_col;
    if ($col === 'hidden') continue;
    if (!isset($ee_pcols[$col])) $col = $ee_first_col;
    if (!isset($ee_pcols[$col])) continue;
    $badge = isset($p['badge']) && $p['badge'] !== 'none' ? $p['badge'] : '';
    $ee_items[] = array(
        'id'    => sanitize_title($p['title']) ?: 'p' . $i,
        't'     => $p['title'],
        'd'     => $p['desc'],
        'url'   => $p['url'],
        'icon'  => isset($p['icon']) ? $p['icon'] : '',
        'cat'   => $col,
        'catL'  => $ee_pcols[$col]['label'],
        'badge' => $badge,
        'ord'   => $i,
    );
}
$ee_total = count($ee_items);

/* Featured = badged products (fallback: first three). */
$ee_featured = array_values(array_filter($ee_items, function ($p) { return $p['badge'] !== ''; }));
if (empty($ee_featured)) $ee_featured = array_slice($ee_items, 0, 3);
$ee_featured = array_slice($ee_featured, 0, 6);

/* Per-category counts. */
$ee_counts = array_fill_keys(array_keys($ee_pcols), 0);
foreach ($ee_items as $p) { $ee_counts[$p['cat']]++; }

/* Ecosystem chain — only products that actually exist, in journey order. */
$ee_eco_want = array('Education CRM', 'Admission Management System', 'Application Management', 'Marketing Automation', 'Vidya', 'Analytics');
$ee_eco = array();
foreach ($ee_eco_want as $want) {
    foreach ($ee_items as $p) {
        if (stripos($p['t'], $want) !== false) { $ee_eco[] = $p; break; }
    }
}

/* Comparison — major products present on the page. */
$ee_cmp_pick = array('Education CRM', 'Vidya', 'Mobile CRM', 'Marketing Automation', 'Analytics');
$ee_cmp = array();
foreach ($ee_cmp_pick as $want) {
    foreach ($ee_items as $p) {
        if (stripos($p['t'], $want) !== false) { $ee_cmp[] = $p; break; }
    }
}
$ee_cmp = array_slice($ee_cmp, 0, 5);
$ee_cmp_flag = function ($title, $row) {
    $t = strtolower($title);
    switch ($row) {
        case 'ai':        return (strpos($t, 'vidya') !== false || strpos($t, 'ai') !== false || strpos($t, 'education crm') !== false);
        case 'mobile':    return (strpos($t, 'mobile') !== false || strpos($t, 'education crm') !== false);
        case 'analytics': return (strpos($t, 'analytics') !== false || strpos($t, 'education crm') !== false || strpos($t, 'marketing') !== false);
        default:          return true; /* automation / integrations / scalability — platform-wide */
    }
};

/* Metrics / integrations / FAQ (editable in the Products Page admin). */
$ee_metrics = array();
foreach (array_filter(array_map('trim', explode("\n", (string) $PSget('metrics', "500+|Institutions Onboard\n10M+|Enquiries Managed\n1M+|Admissions Leads")))) as $line) {
    $bits = array_map('trim', explode('|', $line, 2));
    if ($bits[0] !== '') $ee_metrics[] = array($bits[0], isset($bits[1]) ? $bits[1] : '');
}
$ee_integr = array_filter(array_map('trim', explode(',', (string) $PSget('integrations', 'Google, Meta, WhatsApp, Zoom, Microsoft, Payment Gateways, LMS, ERP, REST API, Webhooks'))));
$ee_faqs = array();
foreach (array_filter(array_map('trim', explode("\n", (string) $PSget('faq', '')))) as $line) {
    $bits = array_map('trim', explode('|', $line, 2));
    if ($bits[0] !== '' && !empty($bits[1])) $ee_faqs[] = array('q' => $bits[0], 'a' => $bits[1]);
}

/* Testimonials — real posts only; section skipped when empty. */
$ee_quotes = get_posts(array('post_type' => 'testimonial', 'numberposts' => 3, 'post_status' => 'publish'));

/* ── SEO head: meta + ItemList + FAQ schema ── */
add_action('wp_head', function () use ($ee_items, $ee_faqs) {
    $ps    = function_exists('ee_products_page_get') ? ee_products_page_get() : array();
    $title = !empty($ps['seo_title']) ? $ps['seo_title'] : 'Education CRM Products — Convert More Students, Automatically | ExtraaEdge';
    $desc  = !empty($ps['seo_desc'])  ? $ps['seo_desc']  : 'Education CRM platform with AI chatbots, application management, and WhatsApp integration. Automate admissions, boost conversions, and scale enrollment 24/7.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/products/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

    $li = array();
    foreach ($ee_items as $i => $p) {
        $li[] = array('@type' => 'ListItem', 'position' => $i + 1, 'name' => $p['t'], 'url' => home_url($p['url']), 'description' => $p['d']);
    }
    if ($li) {
        echo "\n<script type=\"application/ld+json\">" . wp_json_encode(array(
            '@context' => 'https://schema.org', '@type' => 'ItemList',
            'name' => 'Education CRM Product Modules',
            'numberOfItems' => count($li), 'itemListElement' => $li,
        ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
    }
    if ($ee_faqs) {
        $main = array();
        foreach ($ee_faqs as $f) {
            $main[] = array('@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => array('@type' => 'Answer', 'text' => $f['a']));
        }
        echo "<script type=\"application/ld+json\">" . wp_json_encode(array('@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $main), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
    }
    add_filter('pre_get_document_title', function () use ($title) { return $title; }, 99);
}, 1);

get_header();

/* Category icon helper (ti-slug / file slug / URL, inline fallback). */
$ee_cat_ico = function ($slug, $size = 26) {
    return function_exists('ee_products_cat_icon') ? ee_products_cat_icon($slug, $size) : '';
};
$ee_badge_label = function ($b) {
    $map = array('popular' => 'Most Popular', 'new' => 'New', 'trending' => 'Trending', 'hot' => 'Best Seller');
    return isset($map[$b]) ? $map[$b] : ucfirst($b);
};
?>
<!-- pxp-products v2026-07-22 -->
<style>
/* ═══════════ /products/ — premium SaaS experience (scoped .pxp) ═══════════ */
.pxp{
  --pb:#19335D; --po:#DE6E30;
  --tint-b:#EEF3FA; --tint-o:#FDF0E7; --line:#E6EBF2;
  --ink:#19335D; --ink-soft:#4C5F7C; --ink-mute:#7C8BA3;
  --r-card:24px; --r-btn:16px; --r-in:14px;
  --sh-1:0 2px 10px rgba(25,51,93,.05);
  --sh-2:0 12px 34px rgba(25,51,93,.09);
  --sh-3:0 20px 50px rgba(25,51,93,.12);
  background:#fff; color:var(--ink-soft);
  font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;
  font-size:18px; line-height:1.6;
  overflow:clip;
}
.pxp *{box-sizing:border-box}
.pxp .wrapx{max-width:1320px;margin:0 auto;padding:0 24px}
.pxp section{padding:60px 0}
@media(min-width:768px){.pxp section{padding:80px 0}}
@media(min-width:1100px){.pxp section{padding:120px 0}}
.pxp .sec-head{max-width:760px;margin:0 auto 44px;text-align:center}
.pxp .kick{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--po);margin-bottom:14px}
.pxp .kick::before{content:"";width:6px;height:6px;border-radius:50%;background:var(--po);box-shadow:0 0 0 4px var(--tint-o)}
.pxp h2{font-size:clamp(28px,3.4vw,42px);font-weight:800;color:var(--pb);line-height:1.15;letter-spacing:-.02em;margin:0 0 12px}
.pxp .sec-sub{font-size:18px;color:var(--ink-soft);margin:0}
.pxp .small{font-size:15px}
.pxp a{text-decoration:none}
.pxp :focus-visible{outline:2.5px solid var(--po);outline-offset:3px;border-radius:6px}

/* buttons */
.pxp .btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;min-height:48px;padding:13px 30px;border-radius:var(--r-btn);font-size:16px;font-weight:700;font-family:inherit;cursor:pointer;transition:transform .22s ease,box-shadow .22s ease,background .22s ease;position:relative;overflow:hidden;border:1.5px solid transparent}
.pxp .btn-solid{background:var(--po);color:#fff}
.pxp .btn-solid:hover{background:#C85D20;transform:translateY(-2px);box-shadow:0 12px 28px rgba(222,110,48,.28)}
.pxp .btn-line{background:#fff;color:var(--pb);border-color:var(--pb)}
.pxp .btn-line:hover{background:var(--tint-b);transform:translateY(-2px)}
.pxp .btn .rip{position:absolute;border-radius:50%;background:rgba(255,255,255,.45);transform:scale(0);animation:pxp-rip .55s ease-out forwards;pointer-events:none}
@keyframes pxp-rip{to{transform:scale(3);opacity:0}}

/* reveal */
.pxp .rv{opacity:0;transform:translateY(22px);transition:opacity .6s ease,transform .6s ease}
.pxp .rv.on{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){.pxp .rv{opacity:1;transform:none;transition:none}.pxp *{animation-duration:.01ms!important;transition-duration:.01ms!important}}

/* ── S1 hero ── */
.pxp-hero{padding:64px 0 40px!important;background:
  radial-gradient(60% 46% at 12% 0%,var(--tint-o) 0%,rgba(253,240,231,0) 62%),
  radial-gradient(52% 40% at 92% 8%,var(--tint-b) 0%,rgba(238,243,250,0) 60%),#fff}
.pxp-hero .wrapx{text-align:center;max-width:900px}
.pxp-hero h1{font-size:clamp(34px,5vw,56px);font-weight:800;color:var(--pb);letter-spacing:-.025em;line-height:1.12;margin:14px 0 16px}
.pxp-hero h1 em{font-style:normal;color:var(--po)}
.pxp-hero .hero-sub{font-size:18px;max-width:620px;margin:0 auto 30px}
.pxp-count{display:inline-flex;align-items:center;gap:8px;background:var(--tint-b);color:var(--pb);font-size:15px;font-weight:700;padding:8px 18px;border-radius:100px;margin-bottom:8px}
.pxp-count b{color:var(--po)}
.pxp-search{display:flex;align-items:center;gap:10px;max-width:560px;margin:0 auto 20px;background:#fff;border:1.5px solid var(--line);border-radius:var(--r-in);padding:6px 8px 6px 18px;box-shadow:var(--sh-1);transition:border-color .2s,box-shadow .2s}
.pxp-search:focus-within{border-color:var(--po);box-shadow:0 0 0 4px rgba(222,110,48,.10)}
.pxp-search svg{width:20px;height:20px;color:var(--ink-mute);flex-shrink:0}
.pxp-search input{flex:1;min-width:0;border:0;outline:0;font:inherit;font-size:16px;color:var(--pb);background:transparent;padding:10px 0}
.pxp-search input::placeholder{color:var(--ink-mute)}
.pxp-search .clr{border:0;background:var(--tint-b);color:var(--pb);width:36px;height:36px;border-radius:10px;font-size:18px;cursor:pointer;display:none}
.pxp-search.has .clr{display:block}

/* chips (hero + sticky) */
.pxp-chips{display:flex;gap:8px;flex-wrap:wrap;justify-content:center}
.pxp-chip{border:1.5px solid var(--line);background:#fff;color:var(--ink-soft);font:inherit;font-size:15px;font-weight:600;padding:11px 20px;min-height:48px;border-radius:100px;cursor:pointer;transition:all .2s ease}
.pxp-chip:hover{border-color:var(--po);color:var(--po)}
.pxp-chip.on{background:var(--pb);border-color:var(--pb);color:#fff}
.pxp-stickychips{position:sticky;top:64px;z-index:40;background:rgba(255,255,255,.94);backdrop-filter:blur(8px);border-bottom:1px solid var(--line);padding:10px 0;display:none}
.pxp-stickychips.show{display:block}
.pxp-stickychips .pxp-chips{flex-wrap:nowrap;overflow-x:auto;justify-content:flex-start;scrollbar-width:none;padding:0 24px}
.pxp-stickychips .pxp-chips::-webkit-scrollbar{display:none}
.pxp-stickychips .pxp-chip{flex:0 0 auto;min-height:42px;padding:8px 16px}

/* ── S2 featured ── */
.pxp-feat-grid{display:grid;grid-template-columns:1fr;gap:22px}
@media(min-width:700px){.pxp-feat-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1080px){.pxp-feat-grid{grid-template-columns:repeat(3,1fr)}}
.pxp-feat{position:relative;display:flex;flex-direction:column;background:linear-gradient(180deg,#fff 0%,#FBFCFE 100%);border:1px solid var(--line);border-radius:var(--r-card);padding:30px;box-shadow:var(--sh-1);transition:transform .28s ease,box-shadow .28s ease,border-color .28s ease}
.pxp-feat:hover{transform:translateY(-6px) scale(1.02);box-shadow:var(--sh-3);border-color:rgba(222,110,48,.35)}
.pxp-feat .fbadge{position:absolute;top:22px;right:22px;font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--po);background:var(--tint-o);padding:5px 12px;border-radius:100px}
.pxp-ico{width:58px;height:58px;border-radius:16px;background:var(--tint-b);display:flex;align-items:center;justify-content:center;margin-bottom:18px;transition:transform .3s ease;flex-shrink:0}
.pxp-feat:hover .pxp-ico,.pxp-card:hover .pxp-ico{transform:rotate(-6deg) scale(1.06)}
.pxp-ico img{width:60%;height:60%;object-fit:contain}
.pxp-ico .fallback{font-weight:800;font-size:20px;color:var(--pb)}
.pxp-feat h3,.pxp-card h3{font-size:22px;font-weight:700;color:var(--pb);letter-spacing:-.01em;margin:0 0 8px}
.pxp-feat p{font-size:15px;margin:0 0 16px}
.pxp-benefits{list-style:none;margin:0 0 22px;padding:0;display:flex;flex-direction:column;gap:8px}
.pxp-benefits li{display:flex;gap:9px;align-items:flex-start;font-size:15px;color:var(--ink-soft)}
.pxp-benefits svg{width:17px;height:17px;color:var(--po);flex-shrink:0;margin-top:3px}
.pxp-cta-row{display:flex;gap:10px;margin-top:auto;flex-wrap:wrap}
.pxp-mini{display:inline-flex;align-items:center;justify-content:center;gap:6px;min-height:48px;padding:10px 20px;border-radius:var(--r-btn);font-size:15px;font-weight:700;transition:all .2s ease;border:1.5px solid transparent}
.pxp-mini.a{background:var(--pb);color:#fff}
.pxp-mini.a:hover{background:#12264a;transform:translateY(-2px)}
.pxp-mini.b{color:var(--po);border-color:rgba(222,110,48,.4);background:#fff}
.pxp-mini.b:hover{background:var(--tint-o)}

/* ── S3 categories ── */
.pxp-cat-grid{display:grid;grid-template-columns:1fr;gap:18px}
@media(min-width:640px){.pxp-cat-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1080px){.pxp-cat-grid{grid-template-columns:repeat(4,1fr)}}
.pxp-catcard{display:flex;flex-direction:column;gap:10px;background:#fff;border:1px solid var(--line);border-radius:var(--r-card);padding:26px;box-shadow:var(--sh-1);transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease;color:inherit}
.pxp-catcard:hover{transform:translateY(-5px);box-shadow:var(--sh-2);border-color:rgba(25,51,93,.25)}
.pxp-catcard .cico{width:48px;height:48px;border-radius:14px;background:var(--tint-o);display:flex;align-items:center;justify-content:center}
.pxp-catcard .cico img,.pxp-catcard .cico svg{max-width:24px;max-height:24px}
.pxp-catcard h3{font-size:19px;font-weight:700;color:var(--pb);margin:0;display:flex;align-items:center;gap:10px}
.pxp-catcard .cnt{font-size:12px;font-weight:800;color:var(--pb);background:var(--tint-b);padding:3px 10px;border-radius:100px}
.pxp-catcard p{font-size:15px;margin:0}
.pxp-catcard .go{font-size:15px;font-weight:700;color:var(--po);display:inline-flex;align-items:center;gap:6px;margin-top:auto;position:relative}
.pxp-catcard .go::after{content:"";position:absolute;left:0;bottom:-3px;height:2px;width:0;background:var(--po);transition:width .25s ease}
.pxp-catcard:hover .go::after{width:100%}

/* ── S4 all products ── */
.pxp-tools{display:flex;gap:12px;flex-wrap:wrap;align-items:center;justify-content:space-between;margin-bottom:26px}
.pxp-sort{display:flex;align-items:center;gap:8px;font-size:15px;color:var(--ink-soft)}
.pxp-sort select{font:inherit;font-size:15px;font-weight:600;color:var(--pb);border:1.5px solid var(--line);border-radius:var(--r-in);padding:11px 14px;background:#fff;min-height:48px;cursor:pointer}
.pxp-grid{display:grid;grid-template-columns:1fr;gap:20px}
@media(min-width:640px){.pxp-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1080px){.pxp-grid{grid-template-columns:repeat(3,1fr)}}
.pxp-card{position:relative;display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:var(--r-card);padding:26px;box-shadow:var(--sh-1);transition:transform .26s ease,box-shadow .26s ease}
.pxp-card::before{content:"";position:absolute;inset:0;border-radius:inherit;padding:1.5px;background:linear-gradient(120deg,rgba(222,110,48,.6),rgba(25,51,93,.4));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:0;transition:opacity .3s ease;pointer-events:none}
.pxp-card:hover{transform:translateY(-6px);box-shadow:0 18px 44px rgba(222,110,48,.13),var(--sh-2)}
.pxp-card:hover::before{opacity:1}
.pxp-card .rowtop{display:flex;align-items:flex-start;justify-content:space-between;gap:10px}
.pxp-card .catb{font-size:11px;font-weight:800;letter-spacing:.07em;text-transform:uppercase;color:var(--pb);background:var(--tint-b);padding:5px 11px;border-radius:100px;white-space:nowrap}
.pxp-card .catb.hot{color:var(--po);background:var(--tint-o)}
.pxp-card p{font-size:15px;margin:0 0 14px}
.pxp-card .caps{display:flex;flex-wrap:wrap;gap:7px;margin:0 0 20px}
.pxp-card .caps span{font-size:12.5px;font-weight:600;color:var(--ink-soft);background:#F4F7FB;border:1px solid var(--line);padding:4px 11px;border-radius:100px}
.pxp-none{display:none;text-align:center;padding:50px 20px;background:var(--tint-b);border-radius:var(--r-card)}
.pxp-none b{display:block;font-size:19px;color:var(--pb);margin-bottom:6px}
.pxp-none button{margin-top:14px}

/* ── S5 ecosystem ── */
.pxp-eco{background:linear-gradient(180deg,#fff 0%,var(--tint-b) 130%)}
.pxp-eco-flow{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;gap:8px;max-width:1100px;margin:0 auto}
.pxp-eco-node{background:#fff;border:1px solid var(--line);border-radius:18px;padding:16px 20px;box-shadow:var(--sh-1);text-align:center;min-width:170px;flex:0 1 auto;transition:transform .22s,box-shadow .22s}
.pxp-eco-node:hover{transform:translateY(-4px);box-shadow:var(--sh-2)}
.pxp-eco-node b{display:block;font-size:15.5px;color:var(--pb)}
.pxp-eco-node span{font-size:12.5px;color:var(--ink-mute)}
.pxp-eco-arrow{display:flex;align-items:center;color:var(--po);flex:0 0 auto}
.pxp-eco-arrow svg{width:22px;height:22px}
@media(max-width:700px){.pxp-eco-flow{flex-direction:column;align-items:center}.pxp-eco-arrow svg{transform:rotate(90deg)}}

/* ── S6 why ── */
.pxp-why-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
@media(min-width:768px){.pxp-why-grid{grid-template-columns:repeat(3,1fr);gap:18px}}
@media(min-width:1080px){.pxp-why-grid{grid-template-columns:repeat(4,1fr)}}
.pxp-why{background:#fff;border:1px solid var(--line);border-radius:var(--r-card);padding:24px 20px;text-align:center;box-shadow:var(--sh-1);transition:transform .24s ease,border-color .24s ease}
.pxp-why:hover{transform:translateY(-4px) scale(1.02);border-color:rgba(222,110,48,.4)}
.pxp-why .wi{width:46px;height:46px;margin:0 auto 12px;border-radius:14px;background:var(--tint-o);color:var(--po);display:flex;align-items:center;justify-content:center}
.pxp-why .wi svg{width:22px;height:22px}
.pxp-why b{display:block;font-size:16px;color:var(--pb);margin-bottom:5px}
.pxp-why span{font-size:13.5px;color:var(--ink-soft);line-height:1.5}

/* ── S7 comparison ── */
.pxp-cmp-scroll{overflow-x:auto;border:1px solid var(--line);border-radius:var(--r-card);box-shadow:var(--sh-1)}
.pxp-cmp{width:100%;min-width:760px;border-collapse:collapse;background:#fff;font-size:15px}
.pxp-cmp th,.pxp-cmp td{padding:16px 18px;text-align:center;border-bottom:1px solid var(--line)}
.pxp-cmp thead th{background:var(--tint-b);color:var(--pb);font-size:15px;font-weight:800}
.pxp-cmp thead th:first-child{text-align:left}
.pxp-cmp tbody th{text-align:left;font-weight:700;color:var(--pb);white-space:nowrap}
.pxp-cmp tbody tr:last-child th,.pxp-cmp tbody tr:last-child td{border-bottom:0}
.pxp-cmp .yes{display:inline-flex;width:26px;height:26px;border-radius:50%;background:var(--tint-o);color:var(--po);align-items:center;justify-content:center}
.pxp-cmp .yes svg{width:14px;height:14px}
.pxp-cmp .dash{color:#C3CDDB;font-weight:700}
.pxp-cmp td.bf{font-size:13.5px;color:var(--ink-soft);max-width:180px}

/* ── S8 integrations ── */
.pxp-int-badge{display:block;text-align:center;font-size:15px;font-weight:800;color:var(--po);margin-bottom:22px;letter-spacing:.06em;text-transform:uppercase}
.pxp-int-grid{display:flex;flex-wrap:wrap;justify-content:center;gap:12px;max-width:900px;margin:0 auto}
.pxp-int{display:inline-flex;align-items:center;gap:9px;background:#fff;border:1px solid var(--line);border-radius:100px;padding:12px 22px;min-height:48px;font-size:15px;font-weight:600;color:var(--pb);box-shadow:var(--sh-1);transition:transform .2s,border-color .2s}
.pxp-int:hover{transform:translateY(-3px);border-color:rgba(222,110,48,.45)}
.pxp-int i{width:8px;height:8px;border-radius:50%;background:var(--po);flex-shrink:0}

/* ── S9 metrics ── */
.pxp-met-grid{display:grid;grid-template-columns:1fr;gap:16px;max-width:1000px;margin:0 auto}
@media(min-width:700px){.pxp-met-grid{grid-template-columns:repeat(3,1fr)}}
.pxp-metcard{background:#fff;border:1px solid var(--line);border-radius:var(--r-card);padding:34px 24px;text-align:center;box-shadow:var(--sh-1)}
.pxp-metcard b{display:block;font-size:clamp(34px,4vw,48px);font-weight:800;color:var(--po);letter-spacing:-.02em;line-height:1.1}
.pxp-metcard span{font-size:15px;font-weight:600;color:var(--pb)}

/* ── S10 testimonials ── */
.pxp-quote-grid{display:grid;grid-template-columns:1fr;gap:20px}
@media(min-width:860px){.pxp-quote-grid{grid-template-columns:repeat(3,1fr)}}
.pxp-quote{background:#fff;border:1px solid var(--line);border-radius:var(--r-card);padding:28px;box-shadow:var(--sh-1);display:flex;flex-direction:column;gap:14px}
.pxp-quote .stars{color:var(--po);letter-spacing:2px;font-size:15px}
.pxp-quote blockquote{margin:0;font-size:15.5px;color:var(--ink-soft);line-height:1.65;flex:1}
.pxp-quote .who b{display:block;font-size:15px;color:var(--pb)}
.pxp-quote .who span{font-size:13px;color:var(--ink-mute)}

/* ── S11 FAQ ── */
.pxp-faq{max-width:820px;margin:0 auto;display:flex;flex-direction:column;gap:12px}
.pxp-faq-item{background:#fff;border:1px solid var(--line);border-radius:18px;overflow:hidden;transition:border-color .2s}
.pxp-faq-item.open{border-color:rgba(222,110,48,.45)}
.pxp-faq-q{display:flex;align-items:center;justify-content:space-between;gap:14px;width:100%;background:none;border:0;font:inherit;font-size:17px;font-weight:700;color:var(--pb);text-align:left;padding:19px 22px;cursor:pointer;min-height:48px}
.pxp-faq-q svg{width:18px;height:18px;color:var(--po);flex-shrink:0;transition:transform .25s ease}
.pxp-faq-item.open .pxp-faq-q svg{transform:rotate(45deg)}
.pxp-faq-a{max-height:0;overflow:hidden;transition:max-height .3s ease}
.pxp-faq-a p{margin:0;padding:0 22px 20px;font-size:15.5px;color:var(--ink-soft)}

/* ── S12 final CTA ── */
.pxp-final .box{background:linear-gradient(135deg,var(--tint-b) 0%,#fff 55%,var(--tint-o) 130%);border:1px solid var(--line);border-radius:32px;padding:56px 26px;text-align:center;box-shadow:var(--sh-2)}
@media(min-width:768px){.pxp-final .box{padding:76px 60px}}
.pxp-final h2{margin-bottom:14px}
.pxp-final p{max-width:560px;margin:0 auto 30px}
.pxp-final .acts{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
.pxp-final .bullets{display:flex;flex-wrap:wrap;justify-content:center;gap:8px 22px;margin-top:26px}
.pxp-final .bullets span{display:inline-flex;align-items:center;gap:7px;font-size:14px;color:var(--ink-soft);font-weight:500}
.pxp-final .bullets svg{width:15px;height:15px;color:var(--po)}
</style>

<main class="pxp" id="pxp-top">

  <!-- ═══ S1 · HERO ═══ -->
  <section class="pxp-hero" aria-labelledby="pxp-h1">
    <div class="wrapx">
      <span class="kick"><?php echo esc_html($PSget('eyebrow', 'The ExtraaEdge Platform')); ?></span>
      <h1 id="pxp-h1">Products Built For <em>Modern Education Institutions</em></h1>
      <p class="hero-sub"><?php echo esc_html($PSget('intro_sub', 'Every module below runs on one shared student database — start anywhere, add anything, nothing breaks.')); ?></p>

      <form class="pxp-search" id="pxpSearch" role="search" aria-label="Search products" onsubmit="return false">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="10" cy="10" r="7"/><path d="M21 21l-6-6"/></svg>
        <input type="search" id="pxpQ" placeholder="Search products…" autocomplete="off" aria-label="Search products">
        <button type="button" class="clr" id="pxpClr" aria-label="Clear search">&times;</button>
      </form>

      <div class="pxp-chips" id="pxpChips" role="group" aria-label="Filter products by category">
        <button type="button" class="pxp-chip on" data-cat="all">All</button>
        <?php foreach ($ee_pcols as $ck => $cm) : ?>
        <button type="button" class="pxp-chip" data-cat="<?php echo esc_attr($ck); ?>"><?php echo esc_html($cm['label']); ?></button>
        <?php endforeach; ?>
      </div>

      <p style="margin:22px 0 0"><span class="pxp-count"><b><?php echo (int) $ee_total; ?></b> Products</span></p>
    </div>
  </section>

  <!-- sticky chips (appear once the hero scrolls away) -->
  <div class="pxp-stickychips" id="pxpSticky">
    <div class="pxp-chips">
      <button type="button" class="pxp-chip on" data-cat="all">All</button>
      <?php foreach ($ee_pcols as $ck => $cm) : ?>
      <button type="button" class="pxp-chip" data-cat="<?php echo esc_attr($ck); ?>"><?php echo esc_html($cm['label']); ?></button>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ═══ S2 · FEATURED ═══ -->
  <?php if (!empty($ee_featured)) : ?>
  <section aria-labelledby="pxp-feat-h">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Start Here</span>
        <h2 id="pxp-feat-h">Featured Products</h2>
        <p class="sec-sub">The modules institutions pick first — proven, popular, fast to deploy.</p>
      </div>
      <div class="pxp-feat-grid">
        <?php foreach ($ee_featured as $fi => $p) : $initial = strtoupper(mb_substr($p['t'], 0, 1)); ?>
        <article class="pxp-feat rv" style="transition-delay:<?php echo ($fi % 3) * 90; ?>ms">
          <?php if ($p['badge']) : ?><span class="fbadge"><?php echo esc_html($ee_badge_label($p['badge'])); ?></span><?php endif; ?>
          <div class="pxp-ico" aria-hidden="true">
            <?php if ($p['icon']) : ?><img src="<?php echo esc_url($p['icon']); ?>" alt="" loading="lazy" decoding="async" onerror="this.outerHTML='<span class=&quot;fallback&quot;><?php echo esc_js($initial); ?></span>'">
            <?php else : ?><span class="fallback"><?php echo esc_html($initial); ?></span><?php endif; ?>
          </div>
          <h3><?php echo esc_html($p['t']); ?></h3>
          <p><?php echo esc_html($p['d']); ?></p>
          <ul class="pxp-benefits">
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg><?php echo esc_html($ee_pcols[$p['cat']]['desc']); ?></li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg>Works with every other module on this page</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg>Hands-on onboarding &amp; dedicated success team</li>
          </ul>
          <div class="pxp-cta-row">
            <a class="pxp-mini a" href="<?php echo esc_url($p['url']); ?>">Learn More</a>
            <a class="pxp-mini b" href="<?php echo esc_url($PSget('side_cta_url', '/book-demo/')); ?>">View Demo</a>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S3 · CATEGORIES ═══ -->
  <section style="background:var(--tint-b)" aria-labelledby="pxp-cat-h">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick"><?php echo esc_html($PSget('side_eyebrow', 'Browse')); ?></span>
        <h2 id="pxp-cat-h">Browse By Category</h2>
        <p class="sec-sub"><?php echo esc_html($PSget('side_title', 'Product categories')); ?> — pick a lane, see what fits.</p>
      </div>
      <div class="pxp-cat-grid">
        <?php foreach ($ee_pcols as $ck => $cm) : ?>
        <a class="pxp-catcard rv" href="#all-products" data-jump="<?php echo esc_attr($ck); ?>">
          <span class="cico" aria-hidden="true"><?php echo $ee_cat_ico($cm['icon'], 24); ?></span>
          <h3><?php echo esc_html($cm['label']); ?> <span class="cnt"><?php echo (int) $ee_counts[$ck]; ?></span></h3>
          <p><?php echo esc_html($cm['desc']); ?></p>
          <span class="go">Explore <?php echo esc_html($cm['label']); ?> →</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ S4 · ALL PRODUCTS ═══ -->
  <section id="all-products" aria-labelledby="pxp-all-h" style="scroll-margin-top:110px">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">The Full Suite</span>
        <h2 id="pxp-all-h">All Products</h2>
        <p class="sec-sub">Live search, category filters and sorting — find your module in seconds.</p>
      </div>
      <div class="pxp-tools">
        <span class="small" id="pxpShowing" aria-live="polite"></span>
        <label class="pxp-sort">Sort
          <select id="pxpSort" aria-label="Sort products">
            <option value="default">Recommended</option>
            <option value="az">Alphabetical (A–Z)</option>
            <option value="popular">Popular first</option>
            <option value="newest">Newest first</option>
          </select>
        </label>
      </div>
      <div class="pxp-grid" id="pxpGrid" role="list"></div>
      <div class="pxp-none" id="pxpNone">
        <b>No products match that</b>
        <span class="small">Try a different word, or clear the filters.</span><br>
        <button type="button" class="btn btn-line" id="pxpReset">Reset filters</button>
      </div>
    </div>
  </section>

  <!-- ═══ S5 · ECOSYSTEM ═══ -->
  <?php if (count($ee_eco) >= 3) : ?>
  <section class="pxp-eco" aria-labelledby="pxp-eco-h">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Better Together</span>
        <h2 id="pxp-eco-h">The Product Ecosystem</h2>
        <p class="sec-sub">One student record flows through every module — no exports, no re-typing, no lost context.</p>
      </div>
      <div class="pxp-eco-flow rv">
        <?php foreach ($ee_eco as $i => $p) : ?>
          <?php if ($i > 0) : ?><span class="pxp-eco-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span><?php endif; ?>
          <a class="pxp-eco-node" href="<?php echo esc_url($p['url']); ?>"><b><?php echo esc_html($p['t']); ?></b><span><?php echo esc_html($p['catL']); ?></span></a>
        <?php endforeach; ?>
        <span class="pxp-eco-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        <span class="pxp-eco-node"><b>Student Success</b><span>The outcome</span></span>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S6 · WHY ═══ -->
  <section aria-labelledby="pxp-why-h" style="padding-top:0">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Why ExtraaEdge</span>
        <h2 id="pxp-why-h">Why Choose Our Platform</h2>
      </div>
      <div class="pxp-why-grid">
        <?php
        $ee_why = array(
            array('AI Powered',      'Intent scoring, drafted replies and 24/7 answers built in.',            '<path d="M12 3l1.6 4.4L18 9l-4.4 1.6L12 15l-1.6-4.4L6 9l4.4-1.6z"/>'),
            array('Automation',      'Follow-ups, nudges and campaigns run while your team sleeps.',           '<circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/>'),
            array('Fast Deployment', 'Go live in as little as 48 hours with hands-on onboarding.',             '<path d="M13 3L4 14h6l-1 7 9-11h-6z"/>'),
            array('Cloud Based',     'Nothing to install — secure access from any device, anywhere.',          '<path d="M6 18a4 4 0 010-8 6 6 0 0111.6 1.6A3.5 3.5 0 0117 18H6z"/>'),
            array('Secure',          'GDPR &amp; CCPA compliant, ISO 27001 certified, role-based access.',     '<path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5z"/><path d="M9 12l2 2 4-4"/>'),
            array('Integrations',    'Portals, telephony, payments, ERPs — connected out of the box.',         '<path d="M9 7H6a3 3 0 000 6h3M15 7h3a3 3 0 010 6h-3M8 10h8"/>'),
            array('Scalable',        'From one campus to fifty — same platform, same speed.',                  '<path d="M3 17l6-6 4 4 8-8M14 7h7v7"/>'),
            array('24x7 Support',    'A dedicated success manager plus round-the-clock help.',                 '<path d="M4 12a8 8 0 0116 0v5a2 2 0 01-2 2h-2v-6h4M4 12v5a2 2 0 002 2h2v-6H4"/>'),
        );
        foreach ($ee_why as $wi => $w) : ?>
        <div class="pxp-why rv" style="transition-delay:<?php echo ($wi % 4) * 70; ?>ms">
          <span class="wi" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $w[2]; ?></svg></span>
          <b><?php echo esc_html($w[0]); ?></b>
          <span><?php echo wp_kses_post($w[1]); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══ S7 · COMPARISON ═══ -->
  <?php if (count($ee_cmp) >= 3) : ?>
  <section aria-labelledby="pxp-cmp-h" style="padding-top:0">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Pick Your Fit</span>
        <h2 id="pxp-cmp-h">Product Comparison</h2>
        <p class="sec-sub">A quick look at how the major modules line up.</p>
      </div>
      <div class="pxp-cmp-scroll rv">
        <table class="pxp-cmp">
          <thead><tr><th scope="col">Capability</th>
            <?php foreach ($ee_cmp as $p) : ?><th scope="col"><?php echo esc_html($p['t']); ?></th><?php endforeach; ?>
          </tr></thead>
          <tbody>
            <tr><th scope="row">Best For</th>
              <?php foreach ($ee_cmp as $p) : ?><td class="bf"><?php echo esc_html(wp_trim_words($p['d'], 8, '…')); ?></td><?php endforeach; ?>
            </tr>
            <?php
            $ee_rows = array('Automation' => 'automation', 'AI' => 'ai', 'Mobile' => 'mobile', 'Analytics' => 'analytics', 'Integrations' => 'integrations', 'Scalability' => 'scalability');
            $tick = '<span class="yes"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M5 13l4 4L19 7"/></svg></span>';
            foreach ($ee_rows as $lbl => $key) : ?>
            <tr><th scope="row"><?php echo esc_html($lbl); ?></th>
              <?php foreach ($ee_cmp as $p) : ?>
              <td><?php echo $ee_cmp_flag($p['t'], $key) ? $tick : '<span class="dash" aria-label="Not a primary focus">—</span>'; ?></td>
              <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S8 · INTEGRATIONS ═══ -->
  <?php if (!empty($ee_integr)) : ?>
  <section style="background:var(--tint-b)" aria-labelledby="pxp-int-h">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Plays Well With Others</span>
        <h2 id="pxp-int-h">Integrations</h2>
        <span class="pxp-int-badge"><?php echo esc_html($PSget('integr_count', '50+ Integrations')); ?></span>
      </div>
      <div class="pxp-int-grid rv">
        <?php foreach ($ee_integr as $ig) : ?>
        <span class="pxp-int"><i aria-hidden="true"></i><?php echo esc_html($ig); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S9 · METRICS ═══ -->
  <?php if (!empty($ee_metrics)) : ?>
  <section aria-labelledby="pxp-met-h">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Customer Success</span>
        <h2 id="pxp-met-h">Institutions Grow With Us</h2>
      </div>
      <div class="pxp-met-grid">
        <?php foreach ($ee_metrics as $mi => $m) : ?>
        <div class="pxp-metcard rv" style="transition-delay:<?php echo $mi * 90; ?>ms">
          <b class="pxp-counter" data-final="<?php echo esc_attr($m[0]); ?>"><?php echo esc_html($m[0]); ?></b>
          <span><?php echo esc_html($m[1]); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S10 · TESTIMONIALS ═══ -->
  <?php if (!empty($ee_quotes)) : ?>
  <section aria-labelledby="pxp-quo-h" style="padding-top:0">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Loved By Admissions Teams</span>
        <h2 id="pxp-quo-h">Customer Testimonials</h2>
      </div>
      <div class="pxp-quote-grid">
        <?php foreach ($ee_quotes as $q) :
            $quote = wp_strip_all_tags($q->post_excerpt ?: $q->post_content);
            if (mb_strlen($quote) > 220) $quote = mb_substr($quote, 0, 220) . '…';
            $role = get_post_meta($q->ID, '_role', true) ?: get_post_meta($q->ID, '_designation', true);
        ?>
        <figure class="pxp-quote rv">
          <span class="stars" aria-label="Rated 5 out of 5">★★★★★</span>
          <blockquote>“<?php echo esc_html($quote); ?>”</blockquote>
          <figcaption class="who"><b><?php echo esc_html(get_the_title($q)); ?></b><?php if ($role) : ?><span><?php echo esc_html($role); ?></span><?php endif; ?></figcaption>
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S11 · FAQ ═══ -->
  <?php if (!empty($ee_faqs)) : ?>
  <section aria-labelledby="pxp-faq-h" style="padding-top:0">
    <div class="wrapx">
      <div class="sec-head rv">
        <span class="kick">Good To Know</span>
        <h2 id="pxp-faq-h">Frequently Asked Questions</h2>
      </div>
      <div class="pxp-faq" id="pxpFaq">
        <?php foreach ($ee_faqs as $fi => $f) : ?>
        <div class="pxp-faq-item">
          <button type="button" class="pxp-faq-q" aria-expanded="false" aria-controls="pxp-fa-<?php echo (int) $fi; ?>">
            <?php echo esc_html($f['q']); ?>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
          </button>
          <div class="pxp-faq-a" id="pxp-fa-<?php echo (int) $fi; ?>" role="region"><p><?php echo esc_html($f['a']); ?></p></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ═══ S12 · FINAL CTA ═══ -->
  <section class="pxp-final" aria-labelledby="pxp-cta-h" style="padding-top:0">
    <div class="wrapx">
      <div class="box rv">
        <span class="kick"><?php echo esc_html($PSget('big_badge', 'Start Free — No Commitment')); ?></span>
        <h2 id="pxp-cta-h"><?php echo esc_html($PSget('big_title', 'Ready To Transform Your Admissions?')); ?></h2>
        <p><?php echo esc_html($PSget('big_sub', 'Join 550+ institutions already converting more inquiries into enrollments — on autopilot.')); ?></p>
        <div class="acts">
          <a class="btn btn-solid" href="<?php echo esc_url($PSget('big_url1', '/book-demo/')); ?>"><?php echo esc_html($PSget('big_btn1', 'Book Demo')); ?></a>
          <a class="btn btn-line" href="<?php echo esc_url($PSget('big_url2', '/contact/')); ?>"><?php echo esc_html($PSget('big_btn2', 'Talk To Expert')); ?></a>
        </div>
        <div class="bullets">
          <?php $ee_bullets = array_filter(array_map('trim', explode("\n", (string) $PSget('trust', "No credit card required\nPersonalized onboarding\nCancel anytime\nSetup in 48 hours"))));
          foreach ($ee_bullets as $bullet) : ?>
          <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg><?php echo esc_html($bullet); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
(function () {
  var root = document.getElementById('pxp-top');
  if (!root) return;

  /* ---- data (from PHP — existing products only) ---- */
  var P = <?php echo wp_json_encode(array_values($ee_items), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
  var CATL = <?php echo wp_json_encode(array_map(function ($c) { return $c['label']; }, $ee_pcols), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
  var DEMO_URL = <?php echo wp_json_encode($PSget('side_cta_url', '/book-demo/')); ?>;
  var badgeRank = { hot: 0, popular: 1, trending: 2, 'new': 3, '': 9 };

  var state = { q: '', cat: 'all', sort: 'default' };
  var grid = document.getElementById('pxpGrid');
  var none = document.getElementById('pxpNone');
  var showing = document.getElementById('pxpShowing');

  function esc(s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }

  function card(p) {
    var initial = esc((p.t || '?').charAt(0).toUpperCase());
    var ico = p.icon
      ? '<img src="' + esc(p.icon) + '" alt="" loading="lazy" decoding="async" onerror="this.outerHTML=\'<span class=&quot;fallback&quot;>' + initial + '</span>\'">'
      : '<span class="fallback">' + initial + '</span>';
    var caps = (p.d || '').split(/[,.]/).map(function (s) { return s.trim(); }).filter(function (s) { return s.length > 2 && s.length < 34; }).slice(0, 3);
    var capsHtml = caps.length ? '<div class="caps">' + caps.map(function (c) { return '<span>' + esc(c) + '</span>'; }).join('') + '</div>' : '';
    var badge = p.badge ? '<span class="catb hot">' + esc(p.badge).toUpperCase() + '</span>' : '<span class="catb">' + esc(CATL[p.cat] || '') + '</span>';
    return '<article class="pxp-card" role="listitem">' +
      '<div class="rowtop"><div class="pxp-ico" aria-hidden="true">' + ico + '</div>' + badge + '</div>' +
      '<h3>' + esc(p.t) + '</h3><p>' + esc(p.d) + '</p>' + capsHtml +
      '<div class="pxp-cta-row"><a class="pxp-mini a" href="' + esc(p.url) + '">Learn More</a>' +
      '<a class="pxp-mini b" href="' + esc(DEMO_URL) + '">View Demo</a></div></article>';
  }

  function apply() {
    var q = state.q.toLowerCase();
    var list = P.filter(function (p) {
      if (state.cat !== 'all' && p.cat !== state.cat) return false;
      if (q && (p.t + ' ' + p.d + ' ' + (CATL[p.cat] || '')).toLowerCase().indexOf(q) === -1) return false;
      return true;
    });
    if (state.sort === 'az') list.sort(function (a, b) { return a.t.localeCompare(b.t); });
    else if (state.sort === 'popular') list.sort(function (a, b) { return (badgeRank[a.badge] !== undefined ? badgeRank[a.badge] : 9) - (badgeRank[b.badge] !== undefined ? badgeRank[b.badge] : 9) || a.ord - b.ord; });
    else if (state.sort === 'newest') list.sort(function (a, b) { return b.ord - a.ord; });
    else list.sort(function (a, b) { return a.ord - b.ord; });

    grid.innerHTML = list.map(card).join('');
    none.style.display = list.length ? 'none' : 'block';
    if (showing) showing.textContent = 'Showing ' + list.length + ' of ' + P.length + ' products';
  }
  apply();

  /* ---- search ---- */
  var qEl = document.getElementById('pxpQ'), sForm = document.getElementById('pxpSearch');
  qEl.addEventListener('input', function () {
    state.q = qEl.value.trim();
    sForm.classList.toggle('has', state.q !== '');
    apply();
  });
  document.getElementById('pxpClr').addEventListener('click', function () {
    qEl.value = ''; state.q = ''; sForm.classList.remove('has'); apply(); qEl.focus();
  });

  /* ---- chips (hero + sticky stay in sync) ---- */
  function setCat(cat) {
    state.cat = cat;
    document.querySelectorAll('.pxp-chip').forEach(function (c) { c.classList.toggle('on', c.getAttribute('data-cat') === cat); });
    apply();
  }
  document.querySelectorAll('.pxp-chip').forEach(function (c) {
    c.addEventListener('click', function () {
      setCat(c.getAttribute('data-cat'));
      var all = document.getElementById('all-products');
      if (all && all.getBoundingClientRect().top > window.innerHeight * .8) all.scrollIntoView({ behavior: 'smooth' });
    });
  });
  document.querySelectorAll('.pxp-catcard').forEach(function (cc) {
    cc.addEventListener('click', function () { setCat(cc.getAttribute('data-jump')); });
  });
  document.getElementById('pxpReset').addEventListener('click', function () {
    qEl.value = ''; state.q = ''; sForm.classList.remove('has'); setCat('all');
  });
  document.getElementById('pxpSort').addEventListener('change', function (e) { state.sort = e.target.value; apply(); });

  /* sticky chips appear after the hero */
  var hero = root.querySelector('.pxp-hero'), sticky = document.getElementById('pxpSticky');
  window.addEventListener('scroll', function () {
    if (!hero || !sticky) return;
    var allEl = document.getElementById('all-products');
    sticky.classList.toggle('show', hero.getBoundingClientRect().bottom < 0 && allEl && allEl.getBoundingClientRect().bottom > 200);
  }, { passive: true });

  /* ---- reveal on scroll ---- */
  var io = 'IntersectionObserver' in window ? new IntersectionObserver(function (es) {
    es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
  }, { threshold: .12, rootMargin: '0px 0px -30px 0px' }) : null;
  root.querySelectorAll('.rv').forEach(function (el) { io ? io.observe(el) : el.classList.add('on'); });
  /* safety net: never leave content hidden if IO misbehaves */
  setTimeout(function () { root.querySelectorAll('.rv:not(.on)').forEach(function (el) { el.classList.add('on'); }); }, 3000);

  /* ---- counters ---- */
  function animateCounter(el) {
    var final = el.getAttribute('data-final') || '';
    var m = final.match(/^([\d,.]+)(.*)$/);
    if (!m) return;
    var target = parseFloat(m[1].replace(/,/g, '')), suffix = m[2];
    if (!isFinite(target)) return;
    var start = null, dur = 1600;
    function step(ts) {
      if (!start) start = ts;
      var k = Math.min(1, (ts - start) / dur);
      k = 1 - Math.pow(1 - k, 3);
      el.textContent = Math.round(target * k).toLocaleString() + suffix;
      if (k < 1) requestAnimationFrame(step); else el.textContent = final;
    }
    requestAnimationFrame(step);
  }
  var cio = 'IntersectionObserver' in window ? new IntersectionObserver(function (es) {
    es.forEach(function (e) { if (e.isIntersecting) { animateCounter(e.target); cio.unobserve(e.target); } });
  }, { threshold: .5 }) : null;
  root.querySelectorAll('.pxp-counter').forEach(function (el) { if (cio) cio.observe(el); });

  /* ---- FAQ accordion ---- */
  root.querySelectorAll('.pxp-faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.parentElement, panel = item.querySelector('.pxp-faq-a');
      var open = item.classList.toggle('open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      panel.style.maxHeight = open ? panel.scrollHeight + 'px' : '0';
    });
  });

  /* ---- button ripple ---- */
  root.querySelectorAll('.btn').forEach(function (b) {
    b.addEventListener('click', function (e) {
      var r = b.getBoundingClientRect(), d = Math.max(r.width, r.height);
      var s = document.createElement('span');
      s.className = 'rip';
      s.style.width = s.style.height = d + 'px';
      s.style.left = (e.clientX - r.left - d / 2) + 'px';
      s.style.top = (e.clientY - r.top - d / 2) + 'px';
      b.appendChild(s);
      setTimeout(function () { s.remove(); }, 600);
    });
  });
})();
</script>

<?php get_footer();
