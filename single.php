<?php
/**
 * Single Blog Post Template — premium reading layout
 *
 * - get_header() / get_footer() provide the site chrome (no DOCTYPE/html
 *   wrappers here — the standalone <html> in any prototype is replaced
 *   by header.php / footer.php).
 * - All editable fields come from the "📰 Blog Page Settings" meta box on
 *   the post edit screen, plus the standard WP post editor for the body.
 * - Left TOC auto-builds from the H2/H3 headings in the_content().
 * - Right sidebar: follow icons, configurable lead form (📥 Blog Form
 *   admin page), product list, featured posts, newsletter subscribe.
 * - JSON-LD Article + FAQPage schema emitted to wp_head.
 */
if (!defined('ABSPATH')) exit;

$pid = get_the_ID();
$f   = function ($k, $default = '') use ($pid) {
    $v = get_post_meta($pid, '_ee_blog_' . $k, true);
    return $v !== '' ? $v : $default;
};
$faqs = get_post_meta($pid, '_ee_blog_faqs', true);
if (!is_array($faqs)) $faqs = array();

/* SEO + JSON-LD via wp_head */
add_action('wp_head', function () use ($pid, $f, $faqs) {
    if (!is_singular('post')) return;
    $title = wp_strip_all_tags(get_the_title($pid));
    $excerpt = get_the_excerpt($pid) ?: $f('subtitle');
    $img = get_the_post_thumbnail_url($pid, 'full') ?: '';

    /* Article schema */
    $article = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'Article',
        'headline'      => $title,
        'description'   => wp_strip_all_tags($excerpt),
        'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => get_permalink($pid)),
        'author'        => array('@type' => 'Person', 'name' => get_the_author_meta('display_name', get_post_field('post_author', $pid))),
        'publisher'     => array(
            '@type' => 'Organization',
            'name'  => get_bloginfo('name'),
            'logo'  => array('@type' => 'ImageObject', 'url' => 'https://www.extraaedge.com/assets/logo.png'),
        ),
        'datePublished' => get_the_date('c', $pid),
        'dateModified'  => get_the_modified_date('c', $pid),
    );
    if ($img) $article['image'] = $img;
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($article, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    /* FAQ schema */
    if (!empty($faqs)) {
        $faq_entities = array();
        foreach ($faqs as $faq) {
            if (empty($faq['q'])) continue;
            $faq_entities[] = array(
                '@type'          => 'Question',
                'name'           => wp_strip_all_tags($faq['q']),
                'acceptedAnswer' => array('@type' => 'Answer', 'text' => wp_strip_all_tags($faq['a'] ?? '')),
            );
        }
        if (!empty($faq_entities)) {
            $faq_schema = array('@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faq_entities);
            echo "<script type=\"application/ld+json\">" . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
        }
    }
}, 1);

/* Pull tabler-icons CDN + Inter/Lora fonts used inside the layout. */
add_action('wp_head', function () {
    if (!is_singular('post')) return;
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/tabler-icons.min.css">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">' . "\n";
}, 5);

get_header();

while (have_posts()) : the_post();
    $author_id       = get_post_field('post_author', $pid);
    /* Author display: SEO meta box override → WP user display_name. */
    $override_name   = get_post_meta($pid, '_author_display', true);
    $override_role   = get_post_meta($pid, '_author_role',    true);
    $override_bio    = get_post_meta($pid, '_author_bio',     true);
    $author_name     = $override_name ?: get_the_author_meta('display_name', $author_id);
    $author_title    = $override_role ?: (get_the_author_meta('description', $author_id) ?: 'Contributor · ExtraaEdge');
    $author_bio_text = $override_bio  ?: (get_the_author_meta('description', $author_id) ?: 'Contributor sharing field-tested insights for admissions and EdTech teams.');
    $author_initials = strtoupper(mb_substr($author_name, 0, 1) . (preg_match('/\s(\S)/u', $author_name, $m) ? $m[1] : ''));

    /* Category tag → prefer first non-Uncategorized WP category for
       the orange pill above the title. Falls back to the meta field if
       the editor wants to override. */
    $primary_cat = null;
    foreach ((array) get_the_category() as $c) {
        if ($c->slug !== 'uncategorized') { $primary_cat = $c; break; }
    }
    $category = $f('category_tag', $primary_cat ? $primary_cat->name : '');

    $subtitle    = $f('subtitle', '');
    /* Read-time: prefer the editor-set value; otherwise auto-calc from
       the post body (≈ 220 words per minute, rounded up to 1 min min). */
    $read_time_meta = $f('read_time', '');
    if ($read_time_meta) {
        $read_time = $read_time_meta;
    } else {
        $words = str_word_count(wp_strip_all_tags(get_post_field('post_content', $pid)));
        $mins  = max(1, (int) ceil($words / 220));
        $read_time = $mins . ' min read';
    }
    $hero_icon   = $f('hero_icon', 'ti-messages');
    $hero_caption = $f('hero_caption', '');
    $callout     = $f('callout', '');

    $banner_badge = $f('banner_badge', 'ExtraaEdge');
    $banner_title = $f('banner_title', 'All-in-One CRM for Education');
    $banner_desc  = $f('banner_desc', 'Unify SMS, WhatsApp, email, and calls. Convert more leads with intelligent automation built for admissions teams.');
    $banner_cta_text = $f('banner_cta_text', 'Book a Free Demo');
    $banner_cta_url  = $f('banner_cta_url', '/book-demo/');

    /* Ad banner — when image URL is set it replaces the stat cards. */
    $ad_image = $f('ad_image', '');
    $ad_url   = $f('ad_url',   '');
    $ad_alt   = $f('ad_alt',   '');

    $stats = array();
    if ($ad_image === '') {
        for ($i = 1; $i <= 3; $i++) {
            $n = $f("stat{$i}_num");
            if ($n !== '') $stats[] = array('num' => $n, 'lab' => $f("stat{$i}_lab"));
        }
    }
?>

<style>
.ee-blog-page {
    --b-orange:#DE6E30;--b-orange-dark:#B85920;--b-orange-light:#FFF3EC;
    --b-blue:#19335D;--b-blue-dark:#0F2040;--b-blue-light:#EEF2F8;
    --b-bg:#F8F9FB;--b-border:#E5E7EB;--b-border-dark:#D1D5DB;
    --b-text:#1F2937;--b-text-soft:#374151;--b-muted:#6B7280;--b-muted-soft:#9CA3AF;
    --b-green:#25D366;--b-green-dark:#1DA851;
    --b-shadow-sm:0 1px 2px rgba(15,32,64,.06);
    --b-shadow-md:0 4px 12px rgba(15,32,64,.08);
    --b-shadow-lg:0 12px 32px rgba(15,32,64,.12);
    --b-radius-sm:6px;--b-radius-md:10px;--b-radius-lg:16px;
    --b-transition:.2s ease;
    font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;
    background:#fff;color:var(--b-text);font-size:15px;line-height:1.65;-webkit-font-smoothing:antialiased;
}
.ee-blog-page a{color:var(--b-blue);text-decoration:none;transition:color var(--b-transition);}
.ee-blog-page a:hover{color:var(--b-orange);}
.ee-blog-page { border:0 !important; }
.ee-blog-page hr { display:none !important; }
.ee-blog-page + * { border-top:0 !important; }
body > main { border:0 !important; box-shadow:none !important; }
html.ee-thin-scroll, html.ee-thin-scroll body { scrollbar-width: thin; scrollbar-color: rgba(25,51,93,.18) transparent; }
html.ee-thin-scroll body::-webkit-scrollbar { width:8px; }
html.ee-thin-scroll body::-webkit-scrollbar-track { background:transparent; }
html.ee-thin-scroll body::-webkit-scrollbar-thumb { background:rgba(25,51,93,.18); border-radius:8px; }
html.ee-thin-scroll body::-webkit-scrollbar-thumb:hover { background:rgba(25,51,93,.32); }

.ee-blog-page .ee-progress-bar{position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,var(--b-orange),var(--b-blue));width:0%;z-index:9990;transition:width .1s linear;}

.ee-blog-wrap{display:grid;grid-template-columns:240px minmax(0,1fr) 300px;max-width:1280px;margin:0 auto;}

/* ── Premium TOC sidebar ─────────────────────────────────── */
.ee-toc-sidebar{padding:20px 16px;position:sticky;top:96px;height:calc(100vh - 110px);overflow:hidden;display:flex;flex-direction:column;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);margin-right:6px;}

.ee-toc-head{display:flex;align-items:center;justify-content:space-between;gap:8px;padding-bottom:12px;border-bottom:1px solid var(--b-border);margin-bottom:10px;flex-shrink:0;}
.ee-toc-sidebar h3,
.ee-toc-sidebar .ee-toc-heading{font-size:11px;font-weight:800;letter-spacing:.16em;color:var(--b-blue);text-transform:uppercase;margin:0;display:flex;align-items:center;gap:6px;}
.ee-toc-heading::before{content:"";display:inline-block;width:14px;height:2px;background:var(--b-orange);border-radius:2px;}
.ee-toc-time{font-size:10.5px;font-weight:700;color:var(--b-orange);background:var(--b-orange-light);padding:3px 8px;border-radius:20px;letter-spacing:.04em;white-space:nowrap;}

/* Overall page progress bar at the top of the TOC. */
.ee-toc-bar{height:3px;background:var(--b-bg);border-radius:2px;overflow:hidden;margin-bottom:12px;flex-shrink:0;}
.ee-toc-bar-fill{height:100%;width:0%;background:linear-gradient(90deg,var(--b-orange),#C55E24);border-radius:2px;transition:width .25s ease;}

/* Section search filter */
.ee-toc-filter{position:relative;margin-bottom:8px;flex-shrink:0;}
.ee-toc-filter input{width:100%;font-family:inherit;font-size:12px;padding:7px 10px 7px 28px;border:1px solid var(--b-border);border-radius:6px;background:#fafbfc;outline:none;transition:border var(--b-transition);}
.ee-toc-filter input:focus{border-color:var(--b-orange);background:#fff;}
.ee-toc-filter svg{position:absolute;left:8px;top:50%;transform:translateY(-50%);color:var(--b-muted-soft);pointer-events:none;}

/* Scrollable list area (the only scrolling part of the TOC). */
.ee-toc-scroll{flex:1;overflow-y:auto;scrollbar-width:thin;scrollbar-color:rgba(25,51,93,.2) transparent;padding-right:4px;margin-right:-4px;}
.ee-toc-scroll::-webkit-scrollbar{width:5px;}
.ee-toc-scroll::-webkit-scrollbar-thumb{background:rgba(25,51,93,.2);border-radius:5px;}

/* Per-section progress rail on the LEFT of the list. */
.ee-toc-rail{position:relative;padding-left:14px;}
.ee-toc-rail::before{content:"";position:absolute;left:5px;top:6px;bottom:6px;width:2px;background:var(--b-border);border-radius:2px;}
.ee-toc-progress{position:absolute;left:5px;top:6px;width:2px;background:linear-gradient(180deg,var(--b-orange),var(--b-orange-dark));border-radius:2px;height:0;transition:height .25s cubic-bezier(.4,0,.2,1);}

.ee-toc-list{list-style:none;margin:0;padding:0;counter-reset:ee-toc;}
.ee-toc-list ul{list-style:none;margin:2px 0 6px;padding:0 0 0 14px;max-height:0;overflow:hidden;transition:max-height .3s cubic-bezier(.4,0,.2,1);}
.ee-toc-list li.ee-has-children.ee-expanded > ul{max-height:600px;}
.ee-toc-list li{margin-bottom:1px;position:relative;}

.ee-toc-link{position:relative;display:flex;align-items:center;gap:8px;padding:7px 8px;border-radius:6px;transition:all var(--b-transition);font-size:12.5px;font-weight:500;color:var(--b-text-soft);text-decoration:none;line-height:1.4;cursor:pointer;}
.ee-toc-link:hover{color:var(--b-orange);background:var(--b-orange-light);}
.ee-toc-link.ee-active{color:var(--b-orange);background:var(--b-orange-light);font-weight:700;}
.ee-toc-link.ee-active::after{
    content:"";position:absolute;left:-14px;top:50%;transform:translateY(-50%);
    width:6px;height:6px;border-radius:50%;background:var(--b-orange);
    box-shadow:0 0 0 3px var(--b-orange-light);
}

/* Number prefix only on top-level H2 items */
.ee-toc-list > li > .ee-toc-link{counter-increment:ee-toc;}
.ee-toc-list > li > .ee-toc-link .ee-toc-num{font-size:10px;font-weight:700;color:var(--b-muted-soft);letter-spacing:.04em;flex-shrink:0;width:18px;transition:color var(--b-transition);}
.ee-toc-list > li > .ee-toc-link .ee-toc-num::before{content:counter(ee-toc, decimal-leading-zero);}
.ee-toc-link:hover .ee-toc-num, .ee-toc-link.ee-active .ee-toc-num{color:var(--b-orange);}

/* "Completed" check pill on sections scrolled past */
.ee-toc-link .ee-toc-check{flex-shrink:0;width:14px;height:14px;display:none;color:#10B981;}
.ee-toc-list li.ee-completed > .ee-toc-link .ee-toc-check{display:block;}
.ee-toc-list li.ee-completed > .ee-toc-link .ee-toc-num{color:#10B981;}

.ee-toc-text{flex:1;min-width:0;}
.ee-toc-time-mini{font-size:9.5px;color:var(--b-muted);font-weight:600;flex-shrink:0;letter-spacing:.03em;text-transform:uppercase;}
.ee-toc-link:hover .ee-toc-time-mini{color:var(--b-orange);}

/* H3 sub-items — indented + smaller */
.ee-toc-list ul .ee-toc-link{font-size:11.5px;font-weight:500;color:var(--b-muted);padding:5px 8px;}
.ee-toc-list ul .ee-toc-link::after{display:none;}
.ee-toc-list ul .ee-toc-link.ee-active{color:var(--b-orange);font-weight:600;background:transparent;}

/* H2 with H3 children — chevron */
.ee-toc-list li.ee-has-children > .ee-toc-link .ee-toc-chev{flex-shrink:0;color:var(--b-muted-soft);transition:transform .2s ease;}
.ee-toc-list li.ee-has-children.ee-expanded > .ee-toc-link .ee-toc-chev{transform:rotate(90deg);color:var(--b-orange);}

/* Section action buttons (Back to top + Print) */
.ee-toc-actions{display:flex;gap:6px;margin-top:10px;flex-shrink:0;}
.ee-toc-actions button{flex:1;display:flex;align-items:center;gap:5px;justify-content:center;padding:8px 8px;background:transparent;border:1px dashed var(--b-border);border-radius:7px;font-size:11px;font-weight:600;color:var(--b-muted);cursor:pointer;font-family:inherit;transition:all var(--b-transition);}
.ee-toc-actions button:hover{border-color:var(--b-orange);color:var(--b-orange);background:var(--b-orange-light);border-style:solid;}
.ee-toc-actions svg{width:13px;height:13px;}

.ee-toc-back, .ee-toc-print { /* deprecated, kept for backward compat */ }

/* ── Mobile TOC drawer + FAB ── */
.ee-toc-fab{display:none;position:fixed;bottom:90px;left:14px;width:54px;height:54px;border-radius:50%;background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));color:#fff;border:none;cursor:pointer;align-items:center;justify-content:center;box-shadow:0 8px 22px rgba(15,32,64,.3);z-index:996;transition:all var(--b-transition);}
.ee-toc-fab svg{width:22px;height:22px;}
.ee-toc-fab:hover{transform:scale(1.06);box-shadow:0 12px 28px rgba(15,32,64,.4);}
.ee-toc-fab-pct{position:absolute;top:-4px;right:-4px;background:var(--b-orange);color:#fff;font-size:9.5px;font-weight:800;padding:2px 6px;border-radius:20px;box-shadow:0 2px 6px rgba(0,0,0,.2);}

@media (max-width:820px){
    .ee-toc-fab{display:flex;}
    .ee-toc-sidebar{
        position:fixed;left:-100%;top:0;bottom:0;
        width:88%;max-width:340px;height:100vh;
        z-index:2050;border-radius:0;border-right:1px solid var(--b-border);
        transition:left .35s cubic-bezier(.4,0,.2,1);
        box-shadow:0 0 60px rgba(0,0,0,.3);
        display:flex !important;
    }
    .ee-toc-sidebar.ee-drawer-open{left:0;}
    .ee-toc-sidebar .ee-toc-mobile-close{display:flex;align-items:center;justify-content:center;width:28px;height:28px;border-radius:50%;background:var(--b-bg);border:none;font-size:18px;color:var(--b-blue);cursor:pointer;margin-left:auto;}
}
.ee-toc-mobile-close{display:none;}
.ee-toc-backdrop{display:none;position:fixed;inset:0;background:rgba(15,32,64,.5);backdrop-filter:blur(2px);z-index:2040;opacity:0;transition:opacity .3s ease;}
.ee-toc-backdrop.ee-show{display:block;opacity:1;}

.ee-main-content{padding:36px 44px;min-width:0;}
.ee-category-tag{display:inline-flex;align-items:center;gap:6px;background:var(--b-orange-light);color:var(--b-orange);font-size:12px;font-weight:600;padding:5px 14px;border-radius:20px;margin-bottom:18px;}
.ee-blog-title{font-size:34px;font-weight:800;color:var(--b-blue);line-height:1.2;letter-spacing:-.02em;margin:0 0 14px;}
.ee-blog-subtitle{font-size:16px;color:var(--b-text-soft);line-height:1.6;margin:0 0 24px;max-width:680px;}

.ee-cta-row{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:26px;}
.ee-btn-primary{background:#fff;color:var(--b-orange);border:2px solid var(--b-orange);padding:9px 22px;border-radius:var(--b-radius-sm);font-size:13.5px;font-weight:700;cursor:pointer;transition:all var(--b-transition);display:inline-flex;align-items:center;gap:7px;box-shadow:0 2px 8px rgba(222,110,48,.12);text-decoration:none;}
.ee-btn-primary:hover{background:var(--b-orange-light);color:var(--b-orange-dark);border-color:var(--b-orange-dark);transform:translateY(-2px);box-shadow:0 8px 20px rgba(222,110,48,.22);}
.ee-btn-outline{background:#fff;color:var(--b-blue);border:2px solid var(--b-blue);padding:9px 20px;border-radius:var(--b-radius-sm);font-size:13.5px;font-weight:700;cursor:pointer;transition:all var(--b-transition);display:inline-flex;align-items:center;gap:7px;text-decoration:none;}
.ee-btn-outline:hover{background:var(--b-blue-light);color:var(--b-blue-dark);border-color:var(--b-blue-dark);transform:translateY(-2px);box-shadow:0 8px 20px rgba(25,51,93,.18);}

.ee-meta-row{display:flex;align-items:center;gap:20px;flex-wrap:wrap;padding:18px 0;border-top:1px solid var(--b-border);border-bottom:1px solid var(--b-border);margin-bottom:32px;}
.ee-author-chip{display:flex;align-items:center;gap:10px;position:relative;cursor:pointer;}
.ee-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;flex-shrink:0;letter-spacing:.02em;}
.ee-author-name{font-size:13.5px;font-weight:600;color:var(--b-blue);line-height:1.2;}
.ee-author-title{font-size:11.5px;color:var(--b-muted);margin-top:2px;}
.ee-author-popup{display:none;position:absolute;top:52px;left:0;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:18px;width:280px;z-index:100;box-shadow:var(--b-shadow-lg);}
.ee-author-popup.ee-show{display:block;animation:ee-popIn .18s ease;}
@keyframes ee-popIn{from{opacity:0;transform:translateY(-4px);}to{opacity:1;transform:translateY(0);}}
.ee-author-popup h5,
.ee-author-popup .ee-ap-name{font-size:14px;font-weight:700;color:var(--b-blue);margin:0 0 4px;}
.ee-author-popup p{font-size:12px;color:var(--b-muted);line-height:1.55;margin:0;}
.ee-author-popup .ee-ap-role{font-size:11px;color:var(--b-orange);font-weight:700;margin-bottom:8px;text-transform:uppercase;letter-spacing:.04em;}
.ee-meta-item{display:flex;align-items:center;gap:6px;font-size:12.5px;color:var(--b-muted);}
.ee-meta-item i{font-size:15px;color:var(--b-muted-soft);}
.ee-top-actions{display:flex;align-items:center;gap:8px;margin-left:auto;}
.ee-icon-btn{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:7px 12px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;font-size:12px;color:var(--b-blue);font-weight:600;transition:all var(--b-transition);font-family:inherit;}
.ee-icon-btn:hover{border-color:var(--b-orange);color:var(--b-orange);background:var(--b-orange-light);transform:translateY(-1px);}
.ee-icon-btn svg{color:var(--b-blue);}
.ee-icon-btn:hover svg{color:var(--b-orange);}

.ee-hero-img{height:280px;background:linear-gradient(135deg,var(--b-blue) 0%,var(--b-blue-dark) 50%,var(--b-orange) 130%);border-radius:var(--b-radius-lg);margin-bottom:32px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;}
.ee-hero-img::before{content:"";position:absolute;inset:0;background-image:radial-gradient(circle at 20% 30%,rgba(255,255,255,.08) 0,transparent 40%),radial-gradient(circle at 80% 70%,rgba(222,110,48,.18) 0,transparent 40%);}
.ee-hero-img-content{text-align:center;color:#fff;z-index:2;}
.ee-hero-img-content i{font-size:64px;margin-bottom:10px;opacity:.92;}
.ee-hero-img-content div{font-size:14px;font-weight:600;opacity:.85;letter-spacing:.05em;text-transform:uppercase;}
.ee-hero-img.has-featured{background:none;}
.ee-hero-img.has-featured img{width:100%;height:100%;object-fit:cover;border-radius:var(--b-radius-lg);}
.ee-hero-img.has-featured::before{display:none;}

.ee-blog-body h2{font-size:24px;font-weight:700;color:var(--b-blue);margin:38px 0 14px;letter-spacing:-.01em;line-height:1.3;scroll-margin-top:120px;}
.ee-blog-body h3{font-size:18px;font-weight:600;color:var(--b-blue);margin:24px 0 10px;line-height:1.4;scroll-margin-top:120px;}
.ee-blog-body p{margin:0 0 16px;color:var(--b-text-soft);line-height:1.75;font-size:15.5px;}
.ee-blog-body ul,.ee-blog-body ol{margin:12px 0 18px 22px;padding:0;}
.ee-blog-body li{margin-bottom:8px;color:var(--b-text-soft);line-height:1.7;}
.ee-blog-body li strong{color:var(--b-blue);}
.ee-blog-body blockquote{border-left:4px solid var(--b-orange);background:var(--b-orange-light);padding:18px 22px;margin:24px 0;border-radius:0 var(--b-radius-md) var(--b-radius-md) 0;}
.ee-blog-body blockquote p{margin:0;font-family:'Lora',serif;font-style:italic;color:var(--b-blue);font-size:16px;line-height:1.6;}
.ee-blog-body img{border-radius:var(--b-radius-md);margin:18px 0;}

.ee-callout{background:var(--b-blue-light);border:1px solid #C7D5E8;border-radius:var(--b-radius-md);padding:16px 20px;margin:24px 0;display:flex;gap:12px;}
.ee-callout i{color:var(--b-blue);font-size:22px;flex-shrink:0;margin-top:1px;}
.ee-callout p{margin:0;color:var(--b-text-soft);font-size:14.5px;}

.ee-ad-banner{display:block;margin:24px 0;border-radius:var(--b-radius-md);overflow:hidden;box-shadow:var(--b-shadow-sm);transition:all var(--b-transition);position:relative;line-height:0;}
.ee-ad-banner:hover{box-shadow:var(--b-shadow-md);transform:translateY(-2px);}
.ee-ad-banner img{width:100%;height:auto;display:block;border-radius:var(--b-radius-md);}
.ee-stat-row{display:grid;grid-template-columns:repeat(<?php echo max(1, count($stats)); ?>,1fr);gap:14px;margin:24px 0;}
.ee-stat-card{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:18px;text-align:center;transition:all var(--b-transition);}
.ee-stat-card:hover{border-color:var(--b-orange);box-shadow:var(--b-shadow-md);transform:translateY(-2px);}
.ee-stat-num{font-size:28px;font-weight:800;color:var(--b-orange);line-height:1;letter-spacing:-.02em;}
.ee-stat-label{font-size:12px;color:var(--b-muted);margin-top:6px;font-weight:500;}

.ee-share-section{margin:36px 0;padding:22px;background:var(--b-bg);border-radius:var(--b-radius-md);}
.ee-share-section h4,
.ee-share-section .ee-section-label{font-size:14px;font-weight:700;color:var(--b-blue);margin:0 0 14px;display:flex;align-items:center;gap:8px;}
.ee-social-icons{display:flex;gap:8px;flex-wrap:wrap;}
.ee-soc-btn{display:inline-flex;align-items:center;gap:7px;padding:9px 16px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:700;cursor:pointer;background:#fff;border:1px solid var(--b-border);transition:all var(--b-transition);text-decoration:none;font-family:inherit;}
.ee-soc-btn:hover{background:#fafbfc;transform:translateY(-2px);box-shadow:0 8px 18px rgba(0,0,0,.10);}
.ee-soc-fb{color:#1877F2;border-color:#1877F2;}
.ee-soc-tw{color:#111;border-color:#111;}
.ee-soc-li{color:#0A66C2;border-color:#0A66C2;}
.ee-soc-wa{color:#1DA851;border-color:#25D366;}
.ee-soc-em{color:var(--b-blue);border-color:var(--b-blue);}
.ee-soc-cp{color:var(--b-blue);border-color:var(--b-blue);}
.ee-soc-btn svg{color:inherit;}

.ee-send-article{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:22px;margin:24px 0;}
.ee-send-article h4,
.ee-send-article .ee-section-label{font-size:14px;font-weight:700;color:var(--b-blue);margin:0 0 4px;display:flex;align-items:center;gap:8px;}
.ee-send-article p{font-size:12.5px;color:var(--b-muted);margin:0 0 14px;}
.ee-send-row{display:flex;gap:8px;}
.ee-send-row input{flex:1;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:10px 14px;font-size:13.5px;font-family:inherit;outline:none;transition:border var(--b-transition);}
.ee-send-row input:focus{border-color:var(--b-orange);box-shadow:0 0 0 3px rgba(222,110,48,.12);}
.ee-send-row input.ee-invalid{border-color:#DC2626;}
.ee-send-row button{background:var(--b-orange);color:#fff;border:none;padding:10px 18px;border-radius:var(--b-radius-sm);font-size:13px;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:5px;transition:background var(--b-transition);}
.ee-send-row button:hover{background:var(--b-orange-dark);}

.ee-faq-section{margin:40px 0;}
.ee-faq-section h2{font-size:24px;font-weight:700;color:var(--b-blue);margin-bottom:18px;}
.ee-faq-item{border:1px solid var(--b-border);border-radius:var(--b-radius-md);margin-bottom:10px;overflow:hidden;background:#fff;transition:border var(--b-transition);}
.ee-faq-item.ee-open{border-color:var(--b-orange);}
.ee-faq-q{width:100%;text-align:left;background:#fff;border:none;padding:16px 20px;font-size:14.5px;font-weight:600;color:var(--b-blue);cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:12px;}
.ee-faq-q:hover{background:var(--b-orange-light);}
.ee-faq-a{max-height:0;overflow:hidden;transition:max-height .25s ease,padding .25s ease;padding:0 20px;font-size:13.5px;color:var(--b-text-soft);line-height:1.7;background:var(--b-bg);}
.ee-faq-item.ee-open .ee-faq-a{max-height:600px;padding:16px 20px;border-top:1px solid var(--b-border);}
.ee-faq-icon{transition:transform .25s;font-size:18px;color:var(--b-muted);flex-shrink:0;}
.ee-faq-item.ee-open .ee-faq-icon{transform:rotate(180deg);color:var(--b-orange);}

.ee-crm-banner{background:linear-gradient(135deg,var(--b-blue) 0%,var(--b-blue-dark) 100%);border-radius:var(--b-radius-lg);padding:32px 36px;margin:36px 0;color:#fff;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;position:relative;overflow:hidden;}
.ee-crm-banner::after{content:"";position:absolute;right:-40px;top:-40px;width:200px;height:200px;background:radial-gradient(circle,rgba(222,110,48,.25),transparent 70%);}
.ee-crm-banner > div{position:relative;z-index:2;flex:1;min-width:220px;}
.ee-crm-banner h3,
.ee-crm-banner .ee-crm-banner-title{font-size:22px;font-weight:700;margin:0 0 8px;letter-spacing:-.01em;color:#fff;}
.ee-crm-banner p{font-size:13.5px;opacity:.88;margin:0;max-width:520px;color:#fff;}
.ee-crm-badge{background:var(--b-orange);color:#fff;font-size:10px;font-weight:700;padding:3px 10px;border-radius:20px;display:inline-block;margin-bottom:10px;letter-spacing:.08em;text-transform:uppercase;}
.ee-meta-bottom{padding:22px 0;border-top:1px solid var(--b-border);margin-top:36px;font-size:12.5px;color:var(--b-muted);display:flex;flex-wrap:wrap;gap:18px;}
.ee-meta-bottom strong{color:var(--b-text);font-weight:600;}

.ee-right-sidebar{padding:32px 22px;border-left:1px solid var(--b-border);background:var(--b-bg);}
.ee-sidebar-section{margin-bottom:30px;}
.ee-sidebar-section h4,
.ee-sidebar-section .ee-section-label{font-size:11px;font-weight:700;letter-spacing:.12em;color:var(--b-muted);text-transform:uppercase;margin:0 0 14px;display:flex;align-items:center;gap:6px;}

.ee-follow-icons{display:flex;gap:8px;flex-wrap:wrap;}
.ee-follow-btn{width:40px;height:40px;border-radius:var(--b-radius-sm);display:flex;align-items:center;justify-content:center;cursor:pointer;background:#fff;border:1px solid var(--b-border);transition:all var(--b-transition);text-decoration:none;}
.ee-follow-btn:hover{background:var(--b-orange-light);border-color:var(--b-orange);transform:translateY(-2px);box-shadow:0 8px 18px rgba(222,110,48,.18);}
.ee-f-li{color:#0A66C2;}
.ee-f-tw{color:#111;}
.ee-f-fb{color:#1877F2;}
.ee-f-ig{color:#BC1888;}
.ee-f-yt{color:#FF0000;}
.ee-follow-btn svg{color:inherit;}

/* Lead form in sidebar — wraps the configurable form rendered by
   ee_render_blog_form() so the embed code or the built-in form
   inherits the right look. */
.ee-right-sidebar .ee-blog-lead{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:20px;box-shadow:var(--b-shadow-sm);}
.ee-right-sidebar .ee-blog-lead h2{font-size:15px;font-weight:700;color:var(--b-blue);margin:0 0 4px;text-transform:none;letter-spacing:0;line-height:1.35;}
.ee-right-sidebar .ee-blog-form input,
.ee-right-sidebar .ee-blog-form textarea{width:100%;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:9px 11px;font-size:13.5px;font-family:inherit;outline:none;transition:all var(--b-transition);margin-bottom:10px;background:#fff;color:var(--b-text);box-sizing:border-box;}
.ee-right-sidebar .ee-blog-form textarea{resize:vertical;min-height:80px;}
.ee-right-sidebar .ee-blog-form input:focus,
.ee-right-sidebar .ee-blog-form textarea:focus{border-color:var(--b-orange);box-shadow:0 0 0 3px rgba(222,110,48,.12);}
.ee-right-sidebar .ee-blog-form button{width:100%;background:#fff;color:var(--b-orange);border:2px solid var(--b-orange);padding:10px;border-radius:var(--b-radius-sm);font-size:13.5px;font-weight:700;cursor:pointer;transition:all var(--b-transition);display:inline-flex;align-items:center;justify-content:center;gap:6px;font-family:inherit;}
.ee-right-sidebar .ee-blog-form button:hover{background:var(--b-orange-light);color:var(--b-orange-dark);border-color:var(--b-orange-dark);transform:translateY(-1px);}

.ee-product-list{display:flex;flex-direction:column;gap:8px;}
.ee-product-pill{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:11px 14px;display:flex;align-items:center;justify-content:space-between;font-size:13px;font-weight:500;color:var(--b-blue);cursor:pointer;transition:all var(--b-transition);text-decoration:none;}
.ee-product-pill:hover{border-color:var(--b-orange);background:var(--b-orange-light);color:var(--b-orange);transform:translateX(2px);}
.ee-product-pill i{font-size:15px;}

/* ── All Product Updates hero button ── */
.ee-side-cta{display:flex;align-items:center;gap:12px;padding:14px 16px;background:#fff;border:2px solid var(--b-orange);border-radius:var(--b-radius-md);text-decoration:none;color:var(--b-orange);box-shadow:0 4px 14px rgba(222,110,48,.14);transition:all var(--b-transition);}
.ee-side-cta:hover{background:var(--b-orange-light);color:var(--b-orange-dark);border-color:var(--b-orange-dark);transform:translateY(-2px);box-shadow:0 10px 22px rgba(222,110,48,.2);}
.ee-side-cta-icon{flex-shrink:0;width:38px;height:38px;border-radius:10px;background:var(--b-orange-light);color:var(--b-orange);display:flex;align-items:center;justify-content:center;}
.ee-side-cta-icon svg{width:20px;height:20px;}
.ee-side-cta-body{flex:1;line-height:1.25;}
.ee-side-cta-body strong{display:block;font-size:13.5px;font-weight:800;color:var(--b-blue);letter-spacing:-.005em;}
.ee-side-cta-body small{display:block;font-size:11px;color:var(--b-muted);font-weight:600;margin-top:2px;}
.ee-side-cta > svg{width:16px;height:16px;color:var(--b-orange);flex-shrink:0;}
.ee-side-cta:hover > svg{color:var(--b-orange-dark);}

/* ── Categories pill cloud ── */
.ee-cat-cloud{display:flex;flex-wrap:wrap;gap:6px;}
.ee-cat-pill{display:inline-flex;align-items:center;gap:6px;padding:7px 11px;background:#fff;border:1px solid var(--b-border);border-radius:30px;font-size:11.5px;font-weight:600;color:var(--b-blue);text-decoration:none;transition:all var(--b-transition);line-height:1.2;}
.ee-cat-pill:hover{background:var(--b-orange-light);border-color:var(--b-orange);color:var(--b-orange);transform:translateY(-1px);}
.ee-cat-pill.ee-cat-current{background:var(--b-orange-light);border-color:var(--b-orange);color:var(--b-orange);}
.ee-cat-count{font-size:10px;font-weight:700;color:var(--b-muted);background:var(--b-bg);padding:2px 6px;border-radius:20px;min-width:18px;text-align:center;transition:all var(--b-transition);}
.ee-cat-pill:hover .ee-cat-count,
.ee-cat-pill.ee-cat-current .ee-cat-count{background:#fff;color:var(--b-orange);}

/* ── Latest Insights list ── */
.ee-latest-list{display:flex;flex-direction:column;gap:10px;}
.ee-latest-card{display:flex;gap:10px;padding:8px;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);text-decoration:none;color:inherit;transition:all var(--b-transition);}
.ee-latest-card:hover{border-color:var(--b-orange);background:#fff8f3;transform:translateY(-1px);box-shadow:var(--b-shadow-sm);color:inherit;}
.ee-latest-thumb{flex-shrink:0;width:68px;height:68px;border-radius:6px;overflow:hidden;background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));display:flex;align-items:center;justify-content:center;color:#fff;}
.ee-latest-thumb img{width:100%;height:100%;object-fit:cover;display:block;}
.ee-latest-thumb svg{width:22px;height:22px;}
.ee-latest-body{flex:1;min-width:0;display:flex;flex-direction:column;gap:2px;line-height:1.25;}
.ee-latest-tag{display:inline-block;background:var(--b-orange);color:#fff;font-size:9px;font-weight:800;padding:2px 7px;border-radius:20px;letter-spacing:.06em;text-transform:uppercase;width:fit-content;margin-bottom:2px;}
.ee-latest-cat{font-size:9.5px;font-weight:700;color:var(--b-orange);text-transform:uppercase;letter-spacing:.06em;}
.ee-latest-title{font-size:12.5px;font-weight:600;color:var(--b-blue);line-height:1.35;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;}
.ee-latest-date{font-size:10.5px;color:var(--b-muted);margin-top:auto;font-weight:500;}
.ee-latest-more{display:inline-flex;align-items:center;gap:5px;margin-top:10px;font-size:12px;font-weight:700;color:var(--b-orange);text-decoration:none;transition:gap var(--b-transition);}
.ee-latest-more:hover{gap:8px;color:var(--b-orange-dark);}

.ee-featured-grid{display:flex;flex-direction:column;gap:14px;}
.ee-feat-card{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);overflow:hidden;cursor:pointer;transition:all var(--b-transition);text-decoration:none;color:inherit;display:block;}
.ee-feat-card:hover{box-shadow:var(--b-shadow-md);transform:translateY(-2px);color:inherit;}
.ee-feat-img{height:90px;display:flex;align-items:center;justify-content:center;font-size:32px;color:#fff;background:linear-gradient(135deg,#19335D,#3a5a8a);overflow:hidden;}
.ee-feat-img img{width:100%;height:100%;object-fit:cover;}
.ee-feat-body{padding:12px 14px;}
.ee-feat-tag{font-size:10px;font-weight:700;color:var(--b-orange);text-transform:uppercase;letter-spacing:.08em;}
.ee-feat-title{font-size:12.5px;font-weight:600;color:var(--b-blue);margin-top:4px;line-height:1.45;}
.ee-feat-date{font-size:11px;color:var(--b-muted);margin-top:5px;}

.ee-subscribe-box{background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));border-radius:var(--b-radius-md);padding:22px;margin-top:30px;color:#fff;}
.ee-subscribe-box h4,
.ee-subscribe-box .ee-subscribe-title{font-size:14px;font-weight:700;margin:0 0 4px;text-transform:none;letter-spacing:0;color:#fff;}
.ee-subscribe-box p{font-size:12px;opacity:.85;margin:0 0 14px;line-height:1.55;color:#fff;}
.ee-sub-input{width:100%;border:1px solid rgba(255,255,255,.25);border-radius:var(--b-radius-sm);padding:10px 12px;font-size:12.5px;font-family:inherit;background:rgba(255,255,255,.08);color:#fff;outline:none;margin-bottom:8px;box-sizing:border-box;}
.ee-sub-input::placeholder{color:rgba(255,255,255,.55);}
.ee-sub-input:focus{border-color:var(--b-orange);background:rgba(255,255,255,.12);}
.ee-sub-btn{width:100%;background:#fff;color:var(--b-orange);border:2px solid var(--b-orange);padding:10px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:700;cursor:pointer;transition:all var(--b-transition);font-family:inherit;}
.ee-sub-btn:hover{background:var(--b-orange-light);color:var(--b-orange-dark);border-color:var(--b-orange-dark);transform:translateY(-1px);}
.ee-sub-legal{font-size:10.5px;opacity:.7;margin-top:10px;line-height:1.5;color:#fff;}
.ee-sub-legal a{color:var(--b-orange);}

.ee-last-updated{font-size:11.5px;color:var(--b-muted);padding-top:16px;border-top:1px solid var(--b-border);margin-top:18px;display:flex;align-items:center;gap:6px;}

/* ── Related from same category (bottom of main content) ── */
.ee-related{margin:40px 0 0;padding-top:32px;border-top:1px solid var(--b-border);}
.ee-related h2{font-size:22px;font-weight:700;color:var(--b-blue);margin:0 0 6px;letter-spacing:-.01em;}
.ee-related-sub{font-size:13px;color:var(--b-muted);margin:0 0 18px;}
.ee-related-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}
.ee-related-card{display:flex;flex-direction:column;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);overflow:hidden;text-decoration:none;color:inherit;transition:all var(--b-transition);}
.ee-related-card:hover{box-shadow:var(--b-shadow-md);transform:translateY(-3px);color:inherit;border-color:var(--b-border-dark);}
.ee-related-img{height:150px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));color:#fff;font-size:36px;overflow:hidden;}
.ee-related-img img{width:100%;height:100%;object-fit:cover;}
.ee-related-body{padding:14px 16px 16px;display:flex;flex-direction:column;gap:6px;flex:1;}
.ee-related-tag{font-size:10px;font-weight:700;color:var(--b-orange);text-transform:uppercase;letter-spacing:.08em;}
.ee-related-title{font-size:14.5px;font-weight:600;color:var(--b-blue);line-height:1.4;}
.ee-related-date{font-size:11.5px;color:var(--b-muted);margin-top:auto;}
@media (max-width:820px){ .ee-related-grid{ grid-template-columns:1fr; } }

/* ── Author bio card (after article) ── */
.ee-author-card{display:flex;align-items:flex-start;gap:18px;background:linear-gradient(135deg,#fff,#fafbfc);border:1px solid var(--b-border);border-radius:var(--b-radius-lg);padding:24px 26px;margin:32px 0;box-shadow:var(--b-shadow-sm);}
.ee-author-card-avatar{flex-shrink:0;width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:22px;letter-spacing:.02em;}
.ee-author-card-body{flex:1;}
.ee-author-card-name{display:flex;flex-direction:column;gap:2px;margin-bottom:6px;}
.ee-author-card-name > span:first-child{font-size:16px;font-weight:700;color:var(--b-blue);}
.ee-author-card-role{font-size:12px;color:var(--b-orange);font-weight:600;letter-spacing:.04em;text-transform:uppercase;}
.ee-author-card p{font-size:13.5px;color:var(--b-text-soft);line-height:1.65;margin:0 0 10px;}
.ee-author-card-link{display:inline-flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--b-orange);text-decoration:none;}
.ee-author-card-link:hover{color:var(--b-orange-dark);gap:8px;}

/* ── Prev / Next post navigation ── */
.ee-pn-nav{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin:32px 0;}
.ee-pn-card{display:flex;flex-direction:column;gap:5px;padding:18px 20px;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);text-decoration:none;color:inherit;transition:all var(--b-transition);min-height:80px;}
.ee-pn-card:hover{border-color:var(--b-orange);box-shadow:var(--b-shadow-md);transform:translateY(-2px);color:inherit;}
.ee-pn-next{align-items:flex-end;text-align:right;}
.ee-pn-label{font-size:10.5px;font-weight:700;color:var(--b-orange);text-transform:uppercase;letter-spacing:.1em;}
.ee-pn-title{font-size:14.5px;font-weight:600;color:var(--b-blue);line-height:1.4;}
.ee-pn-empty{visibility:hidden;border:0;background:transparent;}
@media (max-width:600px){ .ee-pn-nav{grid-template-columns:1fr;} .ee-pn-next{align-items:flex-start;text-align:left;} }

/* ── Bookmark button state ── */
.ee-icon-btn .ee-bm-ico svg{transition:transform .2s ease;}
.ee-icon-btn.ee-saved{border-color:var(--b-orange);color:var(--b-orange);background:var(--b-orange-light);}
.ee-icon-btn.ee-saved .ee-bm-ico svg{transform:scale(1.15);}

/* ── Article body polish ── */
.ee-blog-body blockquote{position:relative;}
.ee-blog-body blockquote::before{content:"❝";position:absolute;left:14px;top:8px;font-size:34px;color:var(--b-orange);opacity:.4;font-family:Georgia,serif;line-height:1;}
.ee-blog-body blockquote p{padding-left:24px;}
.ee-blog-body table{width:100%;border-collapse:collapse;margin:22px 0;font-size:14px;border:1px solid var(--b-border);border-radius:var(--b-radius-md);overflow:hidden;background:#fff;}
.ee-blog-body table thead{background:var(--b-blue-light);}
.ee-blog-body table th{font-size:12px;font-weight:700;color:var(--b-blue);text-align:left;padding:12px 14px;text-transform:uppercase;letter-spacing:.04em;border-bottom:1px solid var(--b-border-dark);}
.ee-blog-body table td{padding:11px 14px;border-bottom:1px solid var(--b-border);color:var(--b-text-soft);}
.ee-blog-body table tr:last-child td{border-bottom:0;}
.ee-blog-body table tr:hover td{background:#fafbfc;}
.ee-blog-body code{background:var(--b-blue-light);color:var(--b-blue);padding:2px 7px;border-radius:5px;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,monospace;font-size:.9em;}
.ee-blog-body pre{background:#0F2040;color:#E5E7EB;padding:16px 18px;border-radius:var(--b-radius-md);overflow-x:auto;font-family:ui-monospace,SFMono-Regular,Menlo,monospace;font-size:13px;line-height:1.55;margin:18px 0;}
.ee-blog-body pre code{background:transparent;color:inherit;padding:0;}
.ee-blog-body figure{margin:20px 0;}
.ee-blog-body figcaption{font-size:12.5px;color:var(--b-muted);text-align:center;margin-top:8px;font-style:italic;}
.ee-blog-body hr{border:0;height:1px;background:linear-gradient(90deg,transparent,var(--b-border),transparent);margin:32px 0;}
.ee-blog-body a:not(.ee-ad-banner){color:var(--b-orange);text-decoration:underline;text-decoration-thickness:1.5px;text-underline-offset:3px;text-decoration-color:rgba(222,110,48,.4);transition:all var(--b-transition);}
.ee-blog-body a:not(.ee-ad-banner):hover{text-decoration-color:var(--b-orange);color:var(--b-orange-dark);}

/* ── Print stylesheet — strip everything that doesn't print well ── */
@media print {
    .ee-toc-sidebar, .ee-right-sidebar, .ee-floating-contact, .ee-scroll-top,
    .ee-float-nav, .ee-copy-toast, .ee-progress-bar, .ee-cta-row,
    .ee-top-actions, #site-header, footer, .ee-share-section,
    .ee-send-article, .ee-crm-banner, .ee-pn-nav, .ee-related,
    .ee-ad-banner, .ee-bottom-nav { display: none !important; }
    .ee-blog-page { background: #fff !important; padding: 0 !important; }
    .ee-blog-wrap { grid-template-columns: 1fr !important; max-width: 760px !important; margin: 0 auto !important; }
    .ee-main-content { padding: 0 !important; }
    .ee-blog-title { font-size: 26px !important; color: #000 !important; }
    .ee-blog-body { font-size: 13px !important; line-height: 1.6 !important; color: #000 !important; }
    .ee-blog-body h2 { font-size: 18px !important; color: #000 !important; page-break-after: avoid; }
    .ee-blog-body h3 { font-size: 15px !important; color: #000 !important; page-break-after: avoid; }
    .ee-blog-body p, .ee-blog-body li { color: #1f2937 !important; orphans: 3; widows: 3; }
    .ee-blog-body a { color: #19335D !important; text-decoration: underline !important; }
    .ee-blog-body a[href]::after { content: " (" attr(href) ")"; font-size: .85em; color: #6B7280; }
    .ee-faq-item, .ee-faq-a { max-height: none !important; padding: 8px 12px !important; }
    .ee-author-card { page-break-inside: avoid; }
}

/* ════════════════════════════════════════════════════════════
    CONVERSION COMPONENTS
   ════════════════════════════════════════════════════════════ */

/* ── A. Sticky bottom CTA bar ── */
.ee-stick-cta{position:fixed;left:50%;bottom:-90px;transform:translateX(-50%);width:calc(100% - 40px);max-width:780px;background:linear-gradient(135deg,var(--b-blue) 0%,var(--b-blue-dark) 100%);color:#fff;border-radius:14px;box-shadow:0 14px 40px rgba(15,32,64,.28);padding:14px 18px;display:flex;align-items:center;gap:16px;z-index:1000;transition:bottom .35s cubic-bezier(.4,0,.2,1),opacity .25s ease;opacity:0;}
.ee-stick-cta.ee-show{bottom:20px;opacity:1;}
.ee-stick-cta-text{flex:1;line-height:1.3;}
.ee-stick-cta-text strong{display:block;font-size:14px;font-weight:700;color:#fff;}
.ee-stick-cta-text span{font-size:12.5px;opacity:.85;}
.ee-stick-cta-btn{background:#fff;color:var(--b-orange) !important;border:2px solid #fff;padding:9px 18px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:6px;flex-shrink:0;transition:all var(--b-transition);}
.ee-stick-cta-btn:hover{background:var(--b-orange-light);color:var(--b-orange-dark) !important;transform:translateY(-1px);}
.ee-stick-cta-btn svg{color:var(--b-orange);}
.ee-stick-cta-close{background:transparent;border:none;color:rgba(255,255,255,.6);font-size:20px;cursor:pointer;padding:4px 8px;line-height:1;flex-shrink:0;}
.ee-stick-cta-close:hover{color:#fff;}
@media (max-width:600px){
    .ee-stick-cta{padding:10px 12px;gap:8px;width:calc(100% - 16px);}
    .ee-stick-cta-text strong{font-size:12.5px;}
    .ee-stick-cta-text span{display:none;}
    .ee-stick-cta-btn{padding:8px 12px;font-size:12px;}
}

/* ── B. Modal popup (used by exit-intent + others) ── */
.ee-modal{position:fixed;inset:0;background:rgba(15,32,64,.55);backdrop-filter:blur(4px);display:flex;align-items:center;justify-content:center;padding:24px;z-index:2000;opacity:0;pointer-events:none;transition:opacity .3s ease;}
.ee-modal.ee-show{opacity:1;pointer-events:auto;}
.ee-modal-card{background:#fff;border-radius:18px;max-width:480px;width:100%;padding:32px 30px 26px;position:relative;box-shadow:0 30px 80px rgba(0,0,0,.4);transform:scale(.9) translateY(20px);transition:transform .3s cubic-bezier(.4,0,.2,1);}
.ee-modal.ee-show .ee-modal-card{transform:scale(1) translateY(0);}
.ee-modal-close{position:absolute;top:12px;right:14px;background:transparent;border:none;font-size:24px;color:var(--b-muted);cursor:pointer;line-height:1;width:32px;height:32px;border-radius:50%;transition:all var(--b-transition);}
.ee-modal-close:hover{background:var(--b-bg);color:var(--b-blue);}
.ee-modal-badge{display:inline-block;background:var(--b-orange-light);color:var(--b-orange);font-size:11px;font-weight:700;padding:5px 11px;border-radius:20px;letter-spacing:.05em;margin-bottom:12px;}
.ee-modal-card h3{font-size:22px;font-weight:800;color:var(--b-blue);margin:0 0 8px;letter-spacing:-.01em;line-height:1.25;}
.ee-modal-card p{font-size:14px;color:var(--b-text-soft);line-height:1.55;margin:0 0 18px;}
.ee-modal-form{display:flex;flex-direction:column;gap:9px;}
.ee-modal-form input{border:1px solid var(--b-border);border-radius:8px;padding:11px 14px;font-size:14px;font-family:inherit;outline:none;transition:border var(--b-transition);}
.ee-modal-form input:focus{border-color:var(--b-orange);box-shadow:0 0 0 3px rgba(222,110,48,.15);}
.ee-modal-form button{background:var(--b-orange);color:#fff !important;border:none;padding:12px 18px;border-radius:8px;font-size:13.5px;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:6px;transition:background var(--b-transition);font-family:inherit;}
.ee-modal-form button:hover{background:var(--b-orange-dark);}
.ee-modal-ok{padding:14px;background:#ECFDF5;border:1px solid #A7F3D0;border-radius:8px;color:#065F46;font-size:13px;text-align:center;font-weight:600;}
.ee-modal-trust{font-size:11.5px;color:var(--b-muted);text-align:center;margin-top:12px;}

/* ── C. End-of-article CTA card ── */
.ee-end-cta{margin:36px 0 24px;display:none;}
.ee-end-cta.ee-show{display:block;animation:eeFadeUp .5s cubic-bezier(.4,0,.2,1);}
@keyframes eeFadeUp{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
.ee-end-cta-inner{background:linear-gradient(180deg,#fff 0%,#FFF8F3 100%);color:var(--b-text);border:2px solid var(--b-orange);border-radius:var(--b-radius-lg);padding:34px 36px 28px;text-align:center;box-shadow:0 12px 40px rgba(222,110,48,.16);position:relative;overflow:hidden;}
.ee-end-cta-inner::before,.ee-end-cta-inner::after{content:"";position:absolute;border-radius:50%;background:rgba(222,110,48,.06);}
.ee-end-cta-inner::before{width:180px;height:180px;left:-60px;bottom:-80px;}
.ee-end-cta-inner::after{width:140px;height:140px;right:-50px;top:-60px;background:rgba(25,51,93,.05);}
.ee-end-cta-inner > *{position:relative;z-index:2;}
.ee-end-cta-badge{display:inline-block;background:var(--b-orange-light);color:var(--b-orange);font-size:11px;font-weight:800;padding:5px 12px;border-radius:20px;letter-spacing:.06em;margin-bottom:14px;border:1px solid rgba(222,110,48,.25);}
.ee-end-cta-inner h3{font-size:28px;font-weight:800;color:var(--b-blue);margin:0 0 10px;letter-spacing:-.02em;line-height:1.2;}
.ee-end-cta-inner p{font-size:14.5px;line-height:1.6;color:var(--b-text-soft);margin:0 0 22px;max-width:560px;margin-left:auto;margin-right:auto;}
.ee-end-cta-row{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;margin-bottom:14px;}
.ee-end-cta-row .ee-btn-primary{background:#fff !important;color:var(--b-orange) !important;border:2px solid var(--b-orange) !important;}
.ee-end-cta-row .ee-btn-primary:hover{background:var(--b-orange-light) !important;color:var(--b-orange-dark) !important;border-color:var(--b-orange-dark) !important;}
.ee-end-cta-row .ee-btn-outline{background:#fff !important;color:var(--b-blue) !important;border-color:var(--b-blue) !important;}
.ee-end-cta-row .ee-btn-outline:hover{background:var(--b-blue-light) !important;color:var(--b-blue-dark) !important;border-color:var(--b-blue-dark) !important;}
.ee-end-cta-proof{font-size:12px;color:var(--b-muted);margin-top:8px;font-weight:600;}

/* ── D. Inline lead magnet (rendered via the_content filter) ── */
.ee-lead-magnet{display:flex;align-items:flex-start;gap:16px;background:linear-gradient(135deg,var(--b-blue-soft),#fff);border:1px solid #C7D5E8;border-radius:var(--b-radius-md);padding:20px 22px;margin:26px 0;box-shadow:var(--b-shadow-sm);}
.ee-lm-icon{flex-shrink:0;width:48px;height:48px;border-radius:12px;background:var(--b-orange);color:#fff;display:flex;align-items:center;justify-content:center;}
.ee-lm-icon svg{width:24px;height:24px;}
.ee-lm-body{flex:1;}
.ee-lm-title{font-size:16px;font-weight:800;color:var(--b-blue);margin:0 0 4px;line-height:1.3;}
.ee-lm-sub{font-size:13px;color:var(--b-text-soft);line-height:1.55;margin:0 0 12px;}
.ee-lm-form{display:flex;gap:8px;flex-wrap:wrap;}
.ee-lm-form input{flex:1;min-width:200px;border:1px solid var(--b-border);border-radius:8px;padding:10px 13px;font-size:13.5px;font-family:inherit;outline:none;transition:border var(--b-transition);}
.ee-lm-form input:focus{border-color:var(--b-orange);box-shadow:0 0 0 3px rgba(222,110,48,.12);}
.ee-lm-form button{background:var(--b-orange);color:#fff !important;border:none;padding:10px 18px;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;font-family:inherit;transition:background var(--b-transition);}
.ee-lm-form button:hover{background:var(--b-orange-dark);}
.ee-lm-trust{font-size:11px;color:var(--b-muted);margin-top:8px;}
.ee-lm-ok{padding:11px 14px;background:#ECFDF5;border:1px solid #A7F3D0;border-radius:8px;color:#065F46;font-size:13px;font-weight:600;text-align:center;}

/* ── E. Sticky TOC CTA (pinned at the bottom of the TOC sidebar) ── */
.ee-toc-cta{display:flex;align-items:center;gap:10px;margin-top:14px;padding:12px 14px;background:linear-gradient(135deg,var(--b-orange),#C55E24);color:#fff !important;text-decoration:none;border-radius:12px;font-size:12.5px;line-height:1.25;transition:transform var(--b-transition),box-shadow var(--b-transition);box-shadow:0 4px 12px rgba(222,110,48,.25);}
.ee-toc-cta:hover{transform:translateY(-2px);box-shadow:0 6px 18px rgba(222,110,48,.35);color:#fff !important;}
.ee-toc-cta-emoji{font-size:20px;flex-shrink:0;}
.ee-toc-cta strong{display:block;font-weight:800;font-size:13px;}
.ee-toc-cta small{display:block;font-size:10.5px;opacity:.85;margin-top:2px;font-weight:500;}

/* ── G. Scroll-stage toast (re-uses copy-toast styles) ──
   No extra CSS — the JS reuses the existing #ee-copy-toast element
   with different content per stage. */

/* ── H. Live social proof counter ── */
.ee-sproof{display:flex;align-items:center;gap:10px;background:linear-gradient(135deg,#ECFDF5,#fff);border:1px solid #A7F3D0;border-radius:var(--b-radius-md);padding:12px 14px;}
.ee-sproof-dot{width:9px;height:9px;border-radius:50%;background:#10B981;flex-shrink:0;box-shadow:0 0 0 0 rgba(16,185,129,.55);animation:eePulse 1.8s infinite;}
@keyframes eePulse{0%{box-shadow:0 0 0 0 rgba(16,185,129,.55);}70%{box-shadow:0 0 0 10px rgba(16,185,129,0);}100%{box-shadow:0 0 0 0 rgba(16,185,129,0);}}
.ee-sproof-text{font-size:11.5px;color:var(--b-text-soft);line-height:1.4;}
.ee-sproof-text strong{font-size:13.5px;color:var(--b-blue);font-weight:800;margin-right:3px;display:inline-block;animation:eeCount .6s ease-out;}
@keyframes eeCount{from{transform:scale(1.4);color:#10B981;}to{transform:scale(1);}}

/* ── T. Persistent floating Book Demo bubble (bottom-right) ── */
.ee-book-bubble{position:fixed;right:20px;bottom:160px;background:#fff;color:var(--b-orange) !important;border:2px solid var(--b-orange);text-decoration:none;padding:9px 18px 9px 14px;border-radius:50px;display:inline-flex;align-items:center;gap:8px;font-size:13.5px;font-weight:700;box-shadow:0 8px 22px rgba(222,110,48,.18);z-index:990;transition:all var(--b-transition);}
.ee-book-bubble:hover{background:var(--b-orange-light);color:var(--b-orange-dark) !important;border-color:var(--b-orange-dark);transform:translateY(-2px) scale(1.04);box-shadow:0 12px 28px rgba(222,110,48,.25);}
.ee-book-bubble svg{color:inherit;width:18px;height:18px;}
@media (max-width:820px){
    .ee-book-bubble{right:14px;bottom:154px;padding:9px 14px 9px 12px;font-size:12.5px;}
    .ee-book-bubble svg{width:16px;height:16px;}
}

/* ── Sidebar promo cards (Vidya AI / Smarter Admissions) ── */
.ee-promo-card{border-radius:var(--b-radius-md);padding:20px;color:#fff;position:relative;overflow:hidden;}
.ee-promo-card.ee-promo-vidya{background:linear-gradient(135deg,#19335D 0%,#0F2040 100%);}
.ee-promo-card.ee-promo-vidya::after{content:"";position:absolute;right:-30px;top:-30px;width:140px;height:140px;background:radial-gradient(circle,rgba(222,110,48,.3),transparent 65%);}
.ee-promo-card.ee-promo-orange{background:linear-gradient(135deg,var(--b-orange) 0%,#C55E24 100%);}
.ee-promo-card > *{position:relative;z-index:2;}
.ee-promo-badge{display:inline-block;background:rgba(255,255,255,.18);color:#fff;font-size:10px;font-weight:700;padding:3px 9px;border-radius:20px;letter-spacing:.08em;text-transform:uppercase;margin-bottom:10px;}
.ee-promo-card h3{font-size:18px;font-weight:800;margin:0 0 8px;color:#fff;letter-spacing:-.01em;line-height:1.2;}
.ee-promo-card ul{margin:0 0 12px;padding:0;list-style:none;}
.ee-promo-card ul li{font-size:12.5px;line-height:1.5;color:rgba(255,255,255,.92);padding-left:18px;position:relative;margin-bottom:5px;}
.ee-promo-card ul li::before{content:"✓";position:absolute;left:0;color:var(--b-orange);font-weight:700;}
.ee-promo-card.ee-promo-orange ul li::before{color:#fff;}
.ee-promo-card p{font-size:12.5px;line-height:1.55;color:rgba(255,255,255,.9);margin:0 0 12px;}
.ee-promo-card .ee-promo-btn,
.ee-promo-card.ee-promo-orange .ee-promo-btn{display:inline-flex;align-items:center;gap:6px;background:#fff;color:var(--b-orange);border:2px solid #fff;padding:9px 16px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:700;cursor:pointer;text-decoration:none;transition:all var(--b-transition);}
.ee-promo-card .ee-promo-btn:hover,
.ee-promo-card.ee-promo-orange .ee-promo-btn:hover{background:var(--b-orange-light);color:var(--b-orange-dark);transform:translateY(-2px);}
.ee-promo-card .ee-promo-btn svg{color:var(--b-orange);}

/* ── New Update card ── */
.ee-new-update{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:14px;display:flex;gap:12px;align-items:flex-start;text-decoration:none;color:inherit;transition:all var(--b-transition);}
.ee-new-update:hover{border-color:var(--b-orange);box-shadow:var(--b-shadow-md);transform:translateY(-2px);color:inherit;}
.ee-new-update-tag{display:inline-block;background:var(--b-orange);color:#fff;font-size:9.5px;font-weight:700;padding:2px 8px;border-radius:20px;letter-spacing:.08em;text-transform:uppercase;margin-bottom:6px;}
.ee-new-update-thumb{flex:0 0 64px;height:64px;border-radius:var(--b-radius-sm);overflow:hidden;background:linear-gradient(135deg,var(--b-blue),var(--b-orange));display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;}
.ee-new-update-thumb img{width:100%;height:100%;object-fit:cover;}
.ee-new-update-title{font-size:13px;font-weight:600;color:var(--b-blue);line-height:1.4;margin:0;}
.ee-new-update-date{font-size:11px;color:var(--b-muted);margin-top:4px;}

/* ── Compliance + action buttons ── */
.ee-compliance{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:16px;}
.ee-compliance-logos{display:flex;gap:10px;margin-bottom:12px;flex-wrap:wrap;align-items:center;}
.ee-cert-badge{display:inline-flex;align-items:center;gap:8px;padding:6px 10px 6px 6px;background:#fff;border:1px solid var(--b-border);border-radius:10px;transition:all var(--b-transition);cursor:help;}
.ee-cert-badge:hover{border-color:var(--b-orange);box-shadow:var(--b-shadow-sm);transform:translateY(-1px);}
.ee-cert-badge svg{flex-shrink:0;display:block;}
.ee-cert-label{display:flex;flex-direction:column;line-height:1.1;font-size:11px;font-weight:700;color:var(--b-blue);letter-spacing:.02em;}
.ee-cert-label small{font-size:9.5px;font-weight:500;color:var(--b-muted);letter-spacing:.04em;text-transform:uppercase;margin-top:2px;}
.ee-compliance p{font-size:11.5px;color:var(--b-muted);line-height:1.55;margin:0 0 10px;}
.ee-compliance a{color:var(--b-orange);font-weight:600;}
.ee-action-row{display:grid;grid-template-columns:1fr 1fr;gap:6px;}
.ee-action-btn{display:inline-flex;align-items:center;justify-content:center;gap:5px;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:8px 6px;font-size:11.5px;font-weight:600;color:var(--b-blue);cursor:pointer;transition:all var(--b-transition);text-decoration:none;}
.ee-action-btn:hover{border-color:var(--b-orange);color:var(--b-orange);background:var(--b-orange-light);}
.ee-action-btn i{font-size:14px;}

/* ── Floating Quick Navigation — dashboard tile style ──
   Each link is a self-contained dashboard tile: colour-tinted icon
   badge on top, label below. Hidden until the visitor scrolls past
   Last Updated; hides again when the footer enters the viewport. */
.ee-float-nav{
    position:fixed;left:18px;top:50%;
    transform:translate(-24px,-50%);
    display:flex;flex-direction:column;gap:10px;
    padding:14px 10px;
    background:#fff;
    border:1px solid var(--b-border);
    border-radius:20px;
    box-shadow:0 10px 40px rgba(15,32,64,.10),0 2px 6px rgba(15,32,64,.04);
    z-index:990;
    opacity:0;pointer-events:none;
    transition:opacity .35s cubic-bezier(.4,0,.2,1), transform .35s cubic-bezier(.4,0,.2,1);
}
.ee-float-nav.ee-visible{
    opacity:1;pointer-events:auto;
    transform:translate(0,-50%);
}
.ee-float-nav a{
    --tile-bg:#EEF2F8;
    --tile-fg:#19335D;
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    gap:7px;padding:8px 4px 6px;width:72px;
    border-radius:14px;
    font-size:10.5px;font-weight:700;
    color:var(--b-text-soft);text-decoration:none;text-align:center;line-height:1.15;
    transition:all .25s cubic-bezier(.4,0,.2,1);
    position:relative;
}
.ee-float-nav a .ee-fn-ico{
    width:44px;height:44px;border-radius:13px;
    background:#fff;color:var(--tile-fg);
    border:1px solid var(--b-border);
    display:flex;align-items:center;justify-content:center;
    font-size:22px;line-height:1;
    transition:all .25s cubic-bezier(.4,0,.2,1);
    flex-shrink:0;
}
/* ── Inline-SVG icon sizing per button class ──
   ee_icon() emits SVGs at width="1em" so they pick up the surrounding
   font-size. Some hosts compute font-size as 0 on flex children with
   explicit height, which collapses the SVG to invisible. Lock each
   context to an explicit pixel size so icons are always rendered. */
.ee-follow-btn svg     { width:20px; height:20px; }
.ee-soc-btn    svg     { width:16px; height:16px; }
.ee-action-btn svg     { width:14px; height:14px; }
.ee-icon-btn   svg     { width:14px; height:14px; }
.ee-product-pill svg   { width:15px; height:15px; flex-shrink:0; }
.ee-promo-btn  svg     { width:14px; height:14px; }
.ee-btn-primary svg, .ee-btn-outline svg { width:16px; height:16px; }
.ee-section-label svg  { width:14px; height:14px; }
.ee-meta-item svg      { width:15px; height:15px; color:var(--b-muted-soft); }
.ee-faq-q svg          { width:18px; height:18px; }
.ee-feat-img svg       { width:32px; height:32px; }
.ee-related-img svg    { width:36px; height:36px; }
.ee-new-update-thumb svg { width:22px; height:22px; }
.ee-float-btn .ee-float-icon-wrap svg { width:18px; height:18px; }
.ee-scroll-top svg     { width:18px; height:18px; }
.ee-last-updated svg   { width:14px; height:14px; flex-shrink:0; }
.ee-copy-toast svg     { width:18px; height:18px; color:#10B981; }

/* Inline-SVG icons inherit the tile colour via stroke="currentColor". */
.ee-float-nav a .ee-fn-ico .ee-qn-svg{display:block;color:inherit;}
.ee-float-nav a:hover{color:var(--tile-fg);transform:translateY(-2px);}
.ee-float-nav a:hover .ee-fn-ico{transform:scale(1.06);background:var(--b-orange-light);border-color:var(--b-orange);color:var(--b-orange);box-shadow:0 6px 14px rgba(222,110,48,.18);}
.ee-float-nav a span{display:block;white-space:nowrap;}

/* Per-tile colour tokens live as inline styles emitted from the
   admin's colour preset. The default `a { --tile-bg ... }`
   declaration above is the fallback when no colour is set. */

/* On narrow viewports the WhatsApp + Call float lives bottom-right;
   shrink the dashboard so it doesn't collide. */
@media (max-width:820px){
    /* Floating dashboard hidden on mobile — too big, and the TOC
       FAB + sticky bottom CTA bar already cover navigation +
       primary CTA. Saves a lot of screen real estate. */
    .ee-float-nav{display:none !important;}
}

.ee-floating-contact{position:fixed;right:20px;bottom:20px;display:flex;flex-direction:column;gap:12px;z-index:1000;}
.ee-float-btn{display:flex;align-items:center;gap:10px;padding:11px 18px 11px 14px;border-radius:50px;background:#fff;border:1px solid var(--b-border);font-weight:600;font-size:13.5px;text-decoration:none;box-shadow:0 6px 20px rgba(15,32,64,.12);transition:all .25s ease;cursor:pointer;font-family:inherit;}
.ee-float-btn:hover{transform:translateY(-2px) scale(1.03);box-shadow:0 12px 28px rgba(15,32,64,.18);}
.ee-float-btn .ee-float-icon-wrap{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
.ee-float-btn .ee-float-label{display:flex;flex-direction:column;line-height:1.15;}
.ee-float-btn .ee-float-label small{font-size:10px;font-weight:500;letter-spacing:.04em;text-transform:uppercase;color:var(--b-muted);}
.ee-float-btn .ee-float-label strong{font-size:13px;font-weight:700;letter-spacing:.01em;color:var(--b-blue);}
.ee-float-whatsapp{color:#1DA851;}
.ee-float-whatsapp .ee-float-icon-wrap{background:rgba(37,211,102,.14);color:#1DA851;animation:ee-wa-pulse 2.4s infinite;}
@keyframes ee-wa-pulse{0%,100%{box-shadow:0 0 0 0 rgba(37,211,102,.35);}50%{box-shadow:0 0 0 8px rgba(37,211,102,0);}}
.ee-float-call{color:var(--b-orange);}
.ee-float-call .ee-float-icon-wrap{background:var(--b-orange-light);color:var(--b-orange);}
.ee-float-call .ee-float-icon-wrap svg{animation:ee-phone-shake 1.6s infinite;}
@keyframes ee-phone-shake{0%,60%,100%{transform:rotate(0);}10%,30%,50%{transform:rotate(-12deg);}20%,40%{transform:rotate(12deg);}}

.ee-scroll-top{position:fixed;left:20px;bottom:20px;width:42px;height:42px;border-radius:50%;background:var(--b-blue);color:#fff;border:none;cursor:pointer;display:none;align-items:center;justify-content:center;font-size:18px;box-shadow:var(--b-shadow-md);transition:all var(--b-transition);z-index:999;}
.ee-scroll-top.ee-show{display:flex;}
.ee-scroll-top:hover{background:var(--b-blue-dark);transform:translateY(-2px);}

.ee-copy-toast{position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(20px);background:var(--b-blue);color:#fff;padding:12px 22px;border-radius:var(--b-radius-md);font-size:13.5px;z-index:1200;display:flex;align-items:center;gap:8px;opacity:0;pointer-events:none;transition:all .25s;box-shadow:var(--b-shadow-lg);}
.ee-copy-toast.ee-show{opacity:1;transform:translateX(-50%) translateY(0);pointer-events:auto;}
.ee-copy-toast i{color:#10B981;font-size:18px;}

@media (max-width:1100px){
    .ee-blog-wrap{grid-template-columns:220px minmax(0,1fr);}
    .ee-right-sidebar{display:none;}
}
/* ──────────────────────────────────────────────────────────────
   RESPONSIVE BREAKPOINTS
   1100px — collapse to 2-col, hide right sidebar
    820px — single column, mobile drawer for TOC, smaller text
    600px — compact CTA bar, stacked cards, sticky bottom CTA
            adapts, single-column prev/next
   ────────────────────────────────────────────────────────────── */
@media (max-width:1100px){
    .ee-blog-wrap{grid-template-columns:220px minmax(0,1fr);}
    .ee-right-sidebar{display:none;}
}
@media (max-width:820px){
    .ee-blog-wrap{grid-template-columns:1fr;}
    .ee-main-content{padding:20px 16px;}
    .ee-blog-title{font-size:26px;line-height:1.18;}
    .ee-blog-subtitle{font-size:14.5px;}
    .ee-blog-body h2{font-size:21px;}
    .ee-blog-body h3{font-size:17px;}
    .ee-blog-body p{font-size:15px;}
    .ee-meta-row{gap:12px;padding:14px 0;}
    .ee-cta-row{flex-direction:column;align-items:stretch;}
    .ee-cta-row > a{justify-content:center;}
    .ee-stat-row{grid-template-columns:1fr;}
    .ee-crm-banner{padding:22px;flex-direction:column;align-items:flex-start;}
    .ee-crm-banner .ee-crm-banner-title{font-size:18px;}
    .ee-author-card{flex-direction:column;text-align:center;align-items:center;padding:22px;}
    .ee-floating-contact{right:14px;bottom:14px;gap:8px;}
    .ee-floating-contact .ee-float-btn{padding:9px 14px 9px 11px;font-size:12.5px;}
    .ee-scroll-top{left:14px;bottom:14px;width:38px;height:38px;}
    .ee-top-actions{margin-left:0;width:100%;justify-content:flex-start;gap:6px;}
    .ee-icon-btn{padding:6px 9px;font-size:11px;}
    .ee-icon-btn .ee-bm-label{display:none;}
    .ee-social-icons{gap:6px;}
    .ee-soc-btn{padding:8px 12px;font-size:11.5px;}
    .ee-follow-icons{gap:6px;}
    .ee-follow-btn{width:36px;height:36px;}
    .ee-book-bubble{right:14px;bottom:172px;padding:8px 14px 8px 12px;font-size:12.5px;}
    .ee-book-bubble svg{width:16px;height:16px;}
}
@media (max-width:600px){
    .ee-blog-title{font-size:22px;}
    .ee-blog-subtitle{font-size:13.5px;}
    .ee-blog-body h2{font-size:19px;}
    .ee-blog-body p{font-size:14.5px;line-height:1.7;}
    .ee-pn-nav{grid-template-columns:1fr;}
    .ee-pn-next{align-items:flex-start;text-align:left;}
    .ee-related-grid{grid-template-columns:1fr;}
    .ee-end-cta-inner{padding:24px 20px;}
    .ee-end-cta-inner h3{font-size:22px;}
    .ee-end-cta-inner p{font-size:13.5px;}
    .ee-end-cta-row{flex-direction:column;align-items:stretch;}
    .ee-end-cta-row > a{justify-content:center;}
    .ee-lead-magnet{flex-direction:column;align-items:stretch;text-align:left;}
    .ee-lm-icon{width:42px;height:42px;}
    .ee-modal-card{padding:24px 20px;}
    .ee-modal-card h3{font-size:18px;}
    .ee-author-card-avatar{width:54px;height:54px;font-size:18px;}
    .ee-author-card-name > span:first-child{font-size:15px;}
    .ee-meta-bottom{flex-direction:column;gap:8px;}
}
@media (max-width:380px){
    .ee-blog-title{font-size:20px;}
    .ee-end-cta-inner h3{font-size:19px;}
    .ee-soc-btn{padding:7px 10px;font-size:11px;}
    .ee-follow-btn{width:34px;height:34px;}
}
/* Touch-device tap target enforcement */
@media (pointer:coarse){
    .ee-btn-primary, .ee-btn-outline, .ee-icon-btn,
    .ee-soc-btn, .ee-follow-btn, .ee-action-btn,
    .ee-promo-btn, .ee-stick-cta-btn, .ee-book-bubble,
    .ee-toc-link, .ee-product-pill, .ee-sub-btn { min-height:44px; }
}

/* ──────────────────────────────────────────────────────────────
   MOBILE DECLUTTER (≤820 px)
   On phones we strip every floating element that duplicates the
   sticky bottom CTA bar, keep only the essentials, and stack the
   remaining ones so they never overlap.
   ────────────────────────────────────────────────────────────── */
@media (max-width:820px){
    /* Hide redundancies — Book Demo bubble (same CTA in sticky bar),
       Floating dashboard nav (already hidden above), Live counter
       row (sidebar already hidden on mobile). */
    .ee-book-bubble { display:none !important; }

    /* Stack the remaining floating chrome ABOVE the sticky bottom
       CTA bar so nothing collides. The sticky bar sits at bottom:20
       and is roughly 64 px tall on mobile. */
    .ee-floating-contact{
        right: 12px;
        bottom: 110px;           /* clears the sticky CTA */
        gap: 8px;
        z-index: 999;
    }
    .ee-floating-contact .ee-float-btn{
        padding: 8px 14px 8px 10px;
        font-size: 12px;
    }
    .ee-floating-contact .ee-float-icon-wrap{ width:30px; height:30px; }
    .ee-floating-contact .ee-float-icon-wrap svg{ width:16px; height:16px; }

    .ee-scroll-top{
        left: 12px;
        bottom: 110px;
        width: 38px; height: 38px;
        z-index: 999;
    }
    .ee-toc-fab{
        left: 12px;
        bottom: 156px;           /* above scroll-top + sticky CTA */
        width: 48px; height: 48px;
        z-index: 999;
    }
    .ee-toc-fab svg{ width:20px; height:20px; }

    /* Sticky CTA: tighten so it doesn't dominate the viewport. */
    .ee-stick-cta{
        padding: 10px 12px;
        gap: 10px;
        border-radius: 12px;
        width: calc(100% - 16px);
        bottom: -100px;
    }
    .ee-stick-cta.ee-show{ bottom: 12px; }
    .ee-stick-cta-text strong{ font-size: 12.5px; }
    .ee-stick-cta-text span{ display:none; }
    .ee-stick-cta-btn{ padding: 8px 14px; font-size: 12px; }
    .ee-stick-cta-close{ font-size: 18px; padding: 2px 6px; }
}

/* ≤480 px — even tighter. The WhatsApp pill collapses to an
   icon-only chip to reclaim horizontal room. */
@media (max-width:480px){
    .ee-floating-contact .ee-float-btn .ee-float-label{ display:none; }
    .ee-floating-contact .ee-float-btn{
        padding: 8px;
        border-radius: 50%;
        width: 44px; height: 44px;
        justify-content: center;
    }
    .ee-floating-contact .ee-float-icon-wrap{
        width: 24px; height: 24px;
        background: transparent !important;
    }
    .ee-stick-cta{ bottom:-100px; }
    .ee-stick-cta.ee-show{ bottom: 10px; }
}
</style>

<div class="ee-blog-page">
    <div class="ee-progress-bar" id="ee-progress-bar"></div>

    <div class="ee-blog-wrap">

        <aside class="ee-toc-sidebar" id="ee-toc-sidebar" aria-label="Table of Contents">
            <div class="ee-toc-head">
                <div class="ee-toc-heading">On this page</div>
                <span class="ee-toc-time" id="ee-toc-time"><?php echo esc_html($read_time); ?></span>
                <button type="button" class="ee-toc-mobile-close" id="ee-toc-mobile-close" aria-label="Close TOC">×</button>
            </div>

            <div class="ee-toc-bar"><span class="ee-toc-bar-fill" id="ee-toc-bar-fill"></span></div>

            <div class="ee-toc-filter">
                <?php echo ee_icon('ti-search', 14); ?>
                <input type="search" id="ee-toc-search" placeholder="Filter sections…" aria-label="Filter table of contents">
            </div>

            <div class="ee-toc-scroll">
                <div class="ee-toc-rail">
                    <span class="ee-toc-progress" id="ee-toc-progress"></span>
                    <ul class="ee-toc-list" id="ee-toc">
                        <li><a class="ee-toc-link ee-active" href="#ee-intro"><span class="ee-toc-num"></span><span class="ee-toc-text">Introduction</span></a></li>
                        <!-- Auto-built from content H2/H3 by JS -->
                    </ul>
                </div>
            </div>

            <div class="ee-toc-actions">
                <button type="button" id="ee-toc-back"><?php echo ee_icon('ti-arrow-up', 13); ?> Top</button>
                <button type="button" id="ee-toc-print"><?php echo ee_icon('ti-printer', 13); ?> Print</button>
                <button type="button" id="ee-toc-copy"><?php echo ee_icon('ti-link', 13); ?> Copy</button>
            </div>

            <!-- Sticky TOC CTA -->
            <a href="/book-demo/" class="ee-toc-cta">
                <span class="ee-toc-cta-emoji">🚀</span>
                <span>
                    <strong>Book a free demo</strong>
                    <small>20-min · No deck · No pitch</small>
                </span>
            </a>
        </aside>

        <!-- Mobile TOC FAB + Backdrop -->
        <button type="button" class="ee-toc-fab" id="ee-toc-fab" aria-label="Open table of contents">
            <?php echo ee_icon('ti-news', 22); ?>
            <span class="ee-toc-fab-pct" id="ee-toc-fab-pct">0%</span>
        </button>
        <div class="ee-toc-backdrop" id="ee-toc-backdrop"></div>

        <main class="ee-main-content">

            <?php if ($category) : ?>
                <div class="ee-category-tag"><?php echo ee_icon('ti-tag'); ?> <?php echo esc_html($category); ?></div>
            <?php endif; ?>

            <h1 class="ee-blog-title" id="ee-intro"><?php the_title(); ?></h1>

            <?php if ($subtitle) : ?>
                <p class="ee-blog-subtitle"><?php echo wp_kses_post($subtitle); ?></p>
            <?php endif; ?>

            <div class="ee-cta-row">
                <a href="/book-demo/" class="ee-btn-primary"><?php echo ee_icon('ti-presentation'); ?> Take a Tour / Book a Demo</a>
                <a href="/contact-us/" class="ee-btn-outline"><?php echo ee_icon('ti-phone'); ?> Contact Us</a>
            </div>

            <div class="ee-meta-row">
                <div class="ee-author-chip" id="ee-author-chip" tabindex="0" role="button" aria-haspopup="true">
                    <div class="ee-avatar"><?php echo esc_html($author_initials); ?></div>
                    <div>
                        <div class="ee-author-name"><?php echo esc_html($author_name); ?></div>
                        <div class="ee-author-title"><?php echo esc_html($author_title); ?></div>
                    </div>
                    <div class="ee-author-popup" id="ee-author-popup" role="dialog">
                        <div class="ee-avatar" style="width:48px;height:48px;font-size:16px;margin-bottom:10px;"><?php echo esc_html($author_initials); ?></div>
                        <div class="ee-ap-name"><?php echo esc_html($author_name); ?></div>
                        <div class="ee-ap-role"><?php echo esc_html($author_title); ?></div>
                        <p><?php echo esc_html($author_bio_text); ?></p>
                    </div>
                </div>
                <span class="ee-meta-item"><?php echo ee_icon('ti-clock'); ?> <?php echo esc_html($read_time); ?></span>
                <span class="ee-meta-item"><?php echo ee_icon('ti-calendar'); ?> <?php echo esc_html(get_the_date()); ?></span>
                <div class="ee-top-actions">
                    <button class="ee-icon-btn" id="ee-btn-bookmark" title="Save for later"><span class="ee-bm-ico"><?php echo function_exists('ee_icon') ? ee_icon('ti-circle-check') : ''; ?></span> <span class="ee-bm-label">Save</span></button>
                    <button class="ee-icon-btn" id="ee-btn-copy-md" title="Copy article as Markdown"><?php echo ee_icon('ti-markdown'); ?> Copy MD</button>
                    <button class="ee-icon-btn" id="ee-btn-share" title="Share this page"><?php echo ee_icon('ti-share-3'); ?> Share</button>
                    <button class="ee-icon-btn" onclick="window.print()" title="Print"><?php echo ee_icon('ti-printer'); ?> Print</button>
                </div>
            </div>

            <?php $featured = get_the_post_thumbnail($pid, 'full', array('alt' => esc_attr(get_the_title()))); ?>
            <?php if ($featured) : ?>
                <div class="ee-hero-img has-featured" aria-hidden="true">
                    <?php echo $featured; ?>
                </div>
            <?php endif; ?>

            <?php /* Stat cards still available — used only when no ad banner is set. */ ?>
            <?php if (!empty($stats)) : ?>
                <div class="ee-stat-row">
                    <?php foreach ($stats as $s) : ?>
                        <div class="ee-stat-card">
                            <div class="ee-stat-num"><?php echo esc_html($s['num']); ?></div>
                            <?php if (!empty($s['lab'])) : ?><div class="ee-stat-label"><?php echo esc_html($s['lab']); ?></div><?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="ee-blog-body" id="ee-blog-body">
                <?php the_content(); ?>
            </div>

            <div class="ee-share-section">
                <div class="ee-section-label"><?php echo ee_icon('ti-share-3'); ?> Share this article</div>
                <div class="ee-social-icons">
                    <?php $u = urlencode(get_permalink()); $t = urlencode(get_the_title()); ?>
                    <a class="ee-soc-btn ee-soc-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $u; ?>" target="_blank" rel="noopener"><?php echo ee_icon('ti-brand-facebook'); ?> Facebook</a>
                    <a class="ee-soc-btn ee-soc-tw" href="https://twitter.com/intent/tweet?url=<?php echo $u; ?>&text=<?php echo $t; ?>" target="_blank" rel="noopener"><?php echo ee_icon('ti-brand-x'); ?> Twitter/X</a>
                    <a class="ee-soc-btn ee-soc-li" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $u; ?>" target="_blank" rel="noopener"><?php echo ee_icon('ti-brand-linkedin'); ?> LinkedIn</a>
                    <a class="ee-soc-btn ee-soc-wa" href="https://api.whatsapp.com/send?text=<?php echo $t; ?>%20<?php echo $u; ?>" target="_blank" rel="noopener"><?php echo ee_icon('ti-brand-whatsapp'); ?> WhatsApp</a>
                    <a class="ee-soc-btn ee-soc-em" href="mailto:?subject=<?php echo $t; ?>&body=<?php echo $u; ?>"><?php echo ee_icon('ti-mail'); ?> Email</a>
                    <button class="ee-soc-btn ee-soc-cp" id="ee-btn-copy-link" type="button"><?php echo ee_icon('ti-link'); ?> Copy Link</button>
                </div>
            </div>

            <div class="ee-send-article">
                <div class="ee-section-label"><?php echo ee_icon('ti-send'); ?> Send this article to someone who'd like it</div>
                <p>Share this guide with a colleague or friend in education marketing.</p>
                <div class="ee-send-row">
                    <input type="email" id="ee-send-email" placeholder="Enter their email address..." aria-label="Recipient email">
                    <button type="button" id="ee-btn-send-article">Send <?php echo ee_icon('ti-arrow-right'); ?></button>
                </div>
            </div>

            <?php if (!empty($faqs)) : ?>
                <div class="ee-faq-section" id="ee-faq-section">
                    <h2>Frequently Asked Questions</h2>
                    <?php foreach ($faqs as $faq) : ?>
                        <div class="ee-faq-item">
                            <button class="ee-faq-q" type="button" aria-expanded="false">
                                <span><?php echo esc_html($faq['q']); ?></span>
                                <span class="ee-faq-icon"><?php echo ee_icon('ti-chevron-down'); ?></span>
                            </button>
                            <div class="ee-faq-a"><?php echo wp_kses_post($faq['a']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="ee-crm-banner">
                <div>
                    <div class="ee-crm-badge"><?php echo esc_html($banner_badge); ?></div>
                    <div class="ee-crm-banner-title"><?php echo esc_html($banner_title); ?></div>
                    <p><?php echo wp_kses_post($banner_desc); ?></p>
                </div>
                <a href="<?php echo esc_url($banner_cta_url); ?>" class="ee-btn-primary" style="white-space:nowrap;flex-shrink:0;"><?php echo ee_icon('ti-rocket'); ?> <?php echo esc_html($banner_cta_text); ?></a>
            </div>

            <div class="ee-meta-bottom">
                <span><strong>Last Updated:</strong> <?php echo esc_html(get_the_modified_date()); ?></span>
                <?php if ($primary_cat) : ?>
                    <span><strong>Category:</strong> <a href="<?php echo esc_url(trailingslashit(home_url('/blog/' . $primary_cat->slug))); ?>" style="color:var(--b-orange);"><?php echo esc_html($primary_cat->name); ?></a></span>
                <?php endif; ?>
                <span><strong>Author:</strong> <?php echo esc_html($author_name); ?></span>
            </div>

            <?php
            /* ── Related from this category ── Pull the 3 newest posts
               that share the current post's primary category. Falls
               back to "latest in any category" if the current post has
               no usable category. */
            $related_args = array(
                'post_type'           => 'post',
                'posts_per_page'      => 3,
                'post__not_in'        => array($pid),
                'no_found_rows'       => true,
                'ignore_sticky_posts' => true,
                'orderby'             => 'date',
                'order'               => 'DESC',
            );
            if ($primary_cat) {
                $related_args['cat'] = $primary_cat->term_id;
            }
            $related_q = new WP_Query($related_args);
            if ($related_q->have_posts()) :
            ?>
            <section class="ee-related" aria-label="More from this category">
                <h2>More from <?php echo $primary_cat ? esc_html($primary_cat->name) : 'the Blog'; ?></h2>
                <p class="ee-related-sub">Fresh reads in this category — the newest articles appear here automatically as you publish them.</p>
                <div class="ee-related-grid">
                    <?php while ($related_q->have_posts()) : $related_q->the_post();
                        $r_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                        $r_cats  = get_the_category();
                        $r_cat   = $r_cats ? $r_cats[0]->name : 'Blog';
                    ?>
                        <a class="ee-related-card" href="<?php the_permalink(); ?>">
                            <div class="ee-related-img">
                                <?php if ($r_thumb) : ?>
                                    <img src="<?php echo esc_url($r_thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php else : ?>
                                    <?php echo ee_icon('ti-news'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="ee-related-body">
                                <div class="ee-related-tag"><?php echo esc_html($r_cat); ?></div>
                                <div class="ee-related-title"><?php echo esc_html(get_the_title()); ?></div>
                                <div class="ee-related-date"><?php echo esc_html(get_the_date()); ?></div>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </section>
            <?php endif; ?>

            <!-- ── Author bio card ── -->
            <section class="ee-author-card" aria-label="About the author">
                <div class="ee-author-card-avatar"><?php echo esc_html($author_initials); ?></div>
                <div class="ee-author-card-body">
                    <div class="ee-author-card-name">
                        <span>About <?php echo esc_html($author_name); ?></span>
                        <span class="ee-author-card-role"><?php echo esc_html($author_title); ?></span>
                    </div>
                    <p><?php echo esc_html($author_bio_text); ?></p>
                    <?php
                    $a_url = get_author_posts_url($author_id);
                    if ($a_url) : ?>
                        <a class="ee-author-card-link" href="<?php echo esc_url($a_url); ?>">More articles by <?php echo esc_html($author_name); ?> <?php echo ee_icon('ti-arrow-right'); ?></a>
                    <?php endif; ?>
                </div>
            </section>

            <!-- ── Prev / Next post navigation ── -->
            <?php
            $prev_p = get_previous_post(true); // same category
            $next_p = get_next_post(true);
            if ($prev_p || $next_p) : ?>
            <nav class="ee-pn-nav" aria-label="Continue reading">
                <?php if ($prev_p) : $prev_thumb = get_the_post_thumbnail_url($prev_p->ID, 'medium'); ?>
                    <a class="ee-pn-card ee-pn-prev" href="<?php echo esc_url(get_permalink($prev_p->ID)); ?>">
                        <div class="ee-pn-label">← Previous</div>
                        <div class="ee-pn-title"><?php echo esc_html(get_the_title($prev_p->ID)); ?></div>
                    </a>
                <?php else : ?>
                    <span class="ee-pn-card ee-pn-empty"></span>
                <?php endif; ?>

                <?php if ($next_p) : ?>
                    <a class="ee-pn-card ee-pn-next" href="<?php echo esc_url(get_permalink($next_p->ID)); ?>">
                        <div class="ee-pn-label">Next →</div>
                        <div class="ee-pn-title"><?php echo esc_html(get_the_title($next_p->ID)); ?></div>
                    </a>
                <?php else : ?>
                    <span class="ee-pn-card ee-pn-empty"></span>
                <?php endif; ?>
            </nav>
            <?php endif; ?>
        </main>

        <aside class="ee-right-sidebar" aria-label="Sidebar">

            <!-- H. Live social proof counter -->
            <div class="ee-sidebar-section ee-sproof" id="ee-sproof">
                <div class="ee-sproof-dot"></div>
                <div class="ee-sproof-text">
                    <strong id="ee-sproof-n">12</strong> admissions teams reading this in the last 24 hrs
                </div>
            </div>

            <div class="ee-sidebar-section">
                <div class="ee-section-label"><?php echo ee_icon('ti-heart'); ?> Follow Us</div>
                <div class="ee-follow-icons">
                    <a class="ee-follow-btn ee-f-li" href="https://www.linkedin.com/company/extraaedge/" target="_blank" rel="noopener" aria-label="LinkedIn"><?php echo ee_icon('ti-brand-linkedin'); ?></a>
                    <a class="ee-follow-btn ee-f-tw" href="https://twitter.com/extraaedge" target="_blank" rel="noopener" aria-label="Twitter"><?php echo ee_icon('ti-brand-x'); ?></a>
                    <a class="ee-follow-btn ee-f-fb" href="https://www.facebook.com/extraaedge/" target="_blank" rel="noopener" aria-label="Facebook"><?php echo ee_icon('ti-brand-facebook'); ?></a>
                    <a class="ee-follow-btn ee-f-ig" href="https://www.instagram.com/extraaedge/" target="_blank" rel="noopener" aria-label="Instagram"><?php echo ee_icon('ti-brand-instagram'); ?></a>
                    <a class="ee-follow-btn ee-f-yt" href="https://www.youtube.com/@ExtraaEdge" target="_blank" rel="noopener" aria-label="YouTube"><?php echo ee_icon('ti-brand-youtube'); ?></a>
                </div>
            </div>

            <!-- ── All Product Updates — single hero button ── -->
            <?php
            /* Use the "Product Updates" category if it exists; fall back
               to the blog landing page so the button always lands the
               visitor on something meaningful. */
            $pu_cat = get_category_by_slug('product-updates');
            $pu_url = $pu_cat ? trailingslashit(home_url('/blog/' . $pu_cat->slug)) : home_url('/blog/');
            $pu_count = $pu_cat ? (int) $pu_cat->count : 0;
            ?>
            <div class="ee-sidebar-section">
                <a class="ee-side-cta" href="<?php echo esc_url($pu_url); ?>">
                    <div class="ee-side-cta-icon"><?php echo ee_icon('ti-rocket'); ?></div>
                    <div class="ee-side-cta-body">
                        <strong>All Product Updates</strong>
                        <small><?php echo $pu_count ? esc_html($pu_count . ' updates') : 'Browse latest releases'; ?></small>
                    </div>
                    <?php echo ee_icon('ti-arrow-right'); ?>
                </a>
            </div>

            <!-- ── Categories — every blog category as a clickable pill ── -->
            <?php
            $cats_all = get_categories(array(
                'hide_empty' => false,
                'orderby'    => 'count',
                'order'      => 'DESC',
                'number'     => 12,
            ));
            $cats_all = array_filter($cats_all, function ($c) { return $c->slug !== 'uncategorized'; });
            if (!empty($cats_all)) :
            ?>
            <div class="ee-sidebar-section">
                <div class="ee-section-label"><?php echo ee_icon('ti-tag'); ?> Categories</div>
                <div class="ee-cat-cloud">
                    <?php foreach ($cats_all as $c) :
                        $is_current = ($primary_cat && $primary_cat->term_id === $c->term_id);
                    ?>
                        <a class="ee-cat-pill<?php echo $is_current ? ' ee-cat-current' : ''; ?>"
                           href="<?php echo esc_url(trailingslashit(home_url('/blog/' . $c->slug))); ?>">
                            <span><?php echo esc_html($c->name); ?></span>
                            <span class="ee-cat-count"><?php echo (int) $c->count; ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- ── Latest Insights — 4 newest posts with thumbnails ── -->
            <?php
            $latest_q = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'post__not_in'   => array($pid),
                'no_found_rows'  => true,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
            if ($latest_q->have_posts()) :
            ?>
            <div class="ee-sidebar-section">
                <div class="ee-section-label"><?php echo ee_icon('ti-flame'); ?> Latest Insights</div>
                <div class="ee-latest-list">
                    <?php $first = true; while ($latest_q->have_posts()) : $latest_q->the_post();
                        $li_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $li_cats  = get_the_category();
                        $li_cat   = !empty($li_cats) ? $li_cats[0] : null;
                    ?>
                        <a class="ee-latest-card<?php echo $first ? ' ee-latest-new' : ''; ?>" href="<?php the_permalink(); ?>">
                            <div class="ee-latest-thumb">
                                <?php if ($li_thumb) : ?>
                                    <img src="<?php echo esc_url($li_thumb); ?>" alt="">
                                <?php else : ?>
                                    <?php echo ee_icon('ti-news'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="ee-latest-body">
                                <?php if ($first) : ?><span class="ee-latest-tag">New</span><?php endif; ?>
                                <?php if ($li_cat) : ?><span class="ee-latest-cat"><?php echo esc_html($li_cat->name); ?></span><?php endif; ?>
                                <div class="ee-latest-title"><?php echo esc_html(get_the_title()); ?></div>
                                <div class="ee-latest-date"><?php echo esc_html(get_the_date()); ?></div>
                            </div>
                        </a>
                    <?php $first = false; endwhile; wp_reset_postdata(); ?>
                </div>
                <a class="ee-latest-more" href="<?php echo esc_url(home_url('/blog/')); ?>">View all articles <?php echo ee_icon('ti-arrow-right'); ?></a>
            </div>
            <?php endif; ?>

            <!-- ── Vidya AI promo banner ── -->
            <div class="ee-sidebar-section">
                <div class="ee-promo-card ee-promo-vidya">
                    <span class="ee-promo-badge">✦ Vidya AI</span>
                    <h3>Vidya AI</h3>
                    <ul>
                        <li>24/7 AI counselors</li>
                        <li>Millions of student interactions</li>
                        <li>One intelligent platform</li>
                        <li>Convert more enrollments with AI</li>
                    </ul>
                    <a class="ee-promo-btn" href="https://getvidya.ai/" target="_blank" rel="noopener">Explore Vidya AI <?php echo ee_icon('ti-arrow-right'); ?></a>
                </div>
            </div>

            <!-- ── Smarter Admissions CTA banner ── -->
            <div class="ee-sidebar-section">
                <div class="ee-promo-card ee-promo-orange">
                    <h3>Need a Smarter Admissions Process?</h3>
                    <p>Customise your entire admission workflow — funnels, reports, automations &amp; AI journeys built for your institution.</p>
                    <a class="ee-promo-btn" href="/book-demo/">Book a Free Demo <?php echo ee_icon('ti-arrow-right'); ?></a>
                </div>
            </div>

            <!-- ── Compliance + action buttons ── -->
            <div class="ee-sidebar-section">
                <div class="ee-compliance">
                    <div class="ee-compliance-logos">
                        <!-- GDPR — EU-blue circular badge with yellow ring of stars + yellow "GDPR" -->
                        <span class="ee-cert-badge ee-cert-gdpr" aria-label="GDPR compliant">
                            <svg viewBox="0 0 80 80" width="48" height="48" aria-hidden="true">
                                <circle cx="40" cy="40" r="38" fill="#003399"/>
                                <g fill="#FFCC00">
                                    <circle cx="40" cy="9"  r="2"/><circle cx="56" cy="13" r="2"/>
                                    <circle cx="67" cy="24" r="2"/><circle cx="71" cy="40" r="2"/>
                                    <circle cx="67" cy="56" r="2"/><circle cx="56" cy="67" r="2"/>
                                    <circle cx="40" cy="71" r="2"/><circle cx="24" cy="67" r="2"/>
                                    <circle cx="13" cy="56" r="2"/><circle cx="9"  cy="40" r="2"/>
                                    <circle cx="13" cy="24" r="2"/><circle cx="24" cy="13" r="2"/>
                                </g>
                                <text x="40" y="46" text-anchor="middle" fill="#FFCC00" font-family="Arial Black, Arial, sans-serif" font-size="16" font-weight="900">GDPR</text>
                            </svg>
                            <span class="ee-cert-label">GDPR<small>Compliant</small></span>
                        </span>

                        <!-- CCPA — California-blue shield with bold white "CCPA" -->
                        <span class="ee-cert-badge ee-cert-ccpa" aria-label="CCPA compliant">
                            <svg viewBox="0 0 80 80" width="48" height="48" aria-hidden="true">
                                <path d="M40 4 L72 17 V44 C72 60 58 72 40 76 C22 72 8 60 8 44 V17 Z" fill="#005EB8"/>
                                <path d="M40 4 L72 17 V44 C72 60 58 72 40 76 C22 72 8 60 8 44 V17 Z" fill="none" stroke="#fff" stroke-width="1.5" stroke-opacity=".5"/>
                                <text x="40" y="48" text-anchor="middle" fill="#fff" font-family="Arial Black, Arial, sans-serif" font-size="15" font-weight="900">CCPA</text>
                            </svg>
                            <span class="ee-cert-label">CCPA<small>Compliant</small></span>
                        </span>

                        <!-- ISO 27001 — Navy circular medallion with orange ring -->
                        <span class="ee-cert-badge ee-cert-iso" aria-label="ISO 27001 certified">
                            <svg viewBox="0 0 80 80" width="48" height="48" aria-hidden="true">
                                <circle cx="40" cy="40" r="38" fill="#19335D"/>
                                <circle cx="40" cy="40" r="32" fill="none" stroke="#DE6E30" stroke-width="2"/>
                                <text x="40" y="36" text-anchor="middle" fill="#fff" font-family="Arial Black, Arial, sans-serif" font-size="13" font-weight="900">ISO</text>
                                <text x="40" y="54" text-anchor="middle" fill="#DE6E30" font-family="Arial Black, Arial, sans-serif" font-size="11" font-weight="900">27001</text>
                            </svg>
                            <span class="ee-cert-label">ISO 27001<small>Certified</small></span>
                        </span>
                    </div>
                    <p>We are <strong>GDPR and CCPA compliant</strong>! Your transaction &amp; personal information is safe and secure. For more details, please read our <a href="/privacy-policy/">privacy policy</a>.</p>
                    <div class="ee-action-row">
                        <button type="button" class="ee-action-btn" id="ee-act-share"><?php echo ee_icon('ti-share-3'); ?> Share</button>
                        <a class="ee-action-btn" id="ee-act-email" href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>"><?php echo ee_icon('ti-mail'); ?> E-mail</a>
                        <button type="button" class="ee-action-btn" id="ee-act-pdf"><?php echo ee_icon('ti-file-text'); ?> Save PDF</button>
                        <button type="button" class="ee-action-btn" id="ee-act-print"><?php echo ee_icon('ti-printer'); ?> Print</button>
                    </div>
                </div>
            </div>

            <div class="ee-last-updated" id="ee-last-updated">
                <?php echo ee_icon('ti-calendar-check'); ?> Last Updated: <strong style="margin-left:4px;"><?php echo esc_html(get_the_modified_date()); ?></strong>
            </div>

        </aside>
    </div>

    <div class="ee-floating-contact" role="region" aria-label="Quick contact">
        <a class="ee-float-btn ee-float-whatsapp" href="https://api.whatsapp.com/send/?phone=918956982897" target="_blank" rel="noopener" aria-label="WhatsApp">
            <span class="ee-float-icon-wrap"><?php echo ee_icon('ti-brand-whatsapp'); ?></span>
            <span class="ee-float-label"><small>Chat on</small><strong>WhatsApp</strong></span>
        </a>
        <a class="ee-float-btn ee-float-call" href="tel:+918956982897" aria-label="Call us">
            <span class="ee-float-icon-wrap"><?php echo ee_icon('ti-phone-call'); ?></span>
            <span class="ee-float-label"><small>Call us</small><strong>+91 89569 82897</strong></span>
        </a>
    </div>

    <button class="ee-scroll-top" id="ee-scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Scroll to top"><?php echo ee_icon('ti-arrow-up'); ?></button>

    <!-- ── Floating Quick Nav — items come from the 🧭 Blog Quick Nav
         admin page so a non-coder can edit labels, URLs, icons, and
         colour tints. Hidden until the visitor reaches the FAQ
         section; auto-hides again when the footer enters the
         viewport. JS at the bottom of single.php drives visibility. -->
    <?php
    $eqn_items  = function_exists('ee_get_quick_nav_items') ? ee_get_quick_nav_items() : array();
    $eqn_colors = function_exists('ee_quick_nav_colors')    ? ee_quick_nav_colors()    : array();
    ?>
    <?php if (!empty($eqn_items)) : ?>
    <aside class="ee-float-nav" id="ee-float-nav" aria-label="Quick navigation">
        <?php foreach ($eqn_items as $idx => $it) :
            $c = isset($eqn_colors[$it['color']]) ? $eqn_colors[$it['color']] : array('bg' => '#EEF2F8', 'fg' => '#19335D');
            $icon = $it['icon'] ?: 'ti-circle';
        ?>
            <a href="<?php echo esc_url($it['url']); ?>"
               style="--tile-bg:<?php echo esc_attr($c['bg']); ?>;--tile-fg:<?php echo esc_attr($c['fg']); ?>;">
                <span class="ee-fn-ico"><?php echo function_exists('ee_quick_nav_render_icon') ? ee_quick_nav_render_icon($icon, 22) : '<i class="ti ' . esc_attr($icon) . '"></i>'; ?></span>
                <span><?php echo esc_html($it['label']); ?></span>
            </a>
        <?php endforeach; ?>
    </aside>
    <?php endif; ?>

    <!-- ════════════════════════════════════════════════════════ -->
    <!--  CONVERSION ELEMENTS                                       -->
    <!-- ════════════════════════════════════════════════════════ -->

    <!-- A. Sticky bottom CTA bar — appears once visitor scrolls past hero -->
    <div class="ee-stick-cta" id="ee-stick-cta" role="region" aria-label="Book a demo">
        <div class="ee-stick-cta-text">
            <strong>Ready to lift admissions conversions?</strong>
            <span>Book a free 20-min demo with our CRM specialists.</span>
        </div>
        <a href="/book-demo/" class="ee-stick-cta-btn">Book a Free Demo <?php echo ee_icon('ti-arrow-right'); ?></a>
        <button type="button" class="ee-stick-cta-close" id="ee-stick-cta-close" aria-label="Dismiss">×</button>
    </div>

    <!-- B. Exit-intent popup -->
    <div class="ee-modal" id="ee-exit-modal" role="dialog" aria-label="Don't leave yet">
        <div class="ee-modal-card">
            <button type="button" class="ee-modal-close" data-close="ee-exit-modal" aria-label="Close">×</button>
            <div class="ee-modal-badge">⚡ Before you go</div>
            <h3>Wait — get the free 30-day CRM Roadmap</h3>
            <p>The exact step-by-step plan our top-performing institutions use to go live with a new admissions CRM. Free, no fluff.</p>
            <form class="ee-modal-form" data-success="On its way! Check your inbox in a minute.">
                <input type="email" placeholder="you@institution.edu" required>
                <button type="submit" class="ee-btn-primary">Send me the roadmap <?php echo ee_icon('ti-arrow-right'); ?></button>
            </form>
            <div class="ee-modal-trust">📩 Single email · No spam · Unsubscribe anytime</div>
        </div>
    </div>

    <!-- C. End-of-article CTA card (revealed at ~90% scroll) -->
    <div class="ee-end-cta" id="ee-end-cta">
        <div class="ee-end-cta-inner">
            <div class="ee-end-cta-badge">🎯 You read the whole thing</div>
            <h3>Now turn insight into action</h3>
            <p>Talk to a CRM specialist for 20 minutes. We'll map your current funnel and show you 3 specific levers to lift conversions in 30 days. No deck. No pitch.</p>
            <div class="ee-end-cta-row">
                <a href="/book-demo/" class="ee-btn-primary">Book a Free 20-min Demo <?php echo ee_icon('ti-arrow-right'); ?></a>
                <a href="/contact-us/" class="ee-btn-outline">Just have a question? Contact us</a>
            </div>
            <div class="ee-end-cta-proof">Trusted by 500+ institutions across India & Southeast Asia.</div>
        </div>
    </div>

    <!-- T. Persistent floating "Book Demo" bubble (bottom-right, above WhatsApp) -->
    <a href="/book-demo/" class="ee-book-bubble" aria-label="Book a demo" id="ee-book-bubble">
        <?php echo ee_icon('ti-rocket'); ?>
        <span>Book Demo</span>
    </a>

    <div class="ee-copy-toast" id="ee-copy-toast"><?php echo ee_icon('ti-circle-check'); ?> <span id="ee-toast-msg">Copied!</span></div>
</div>

<script>
(function(){
    /* ── Toast ── */
    var toast = document.getElementById('ee-copy-toast');
    var toastMsg = document.getElementById('ee-toast-msg');
    var toastTimer;
    function showToast(msg){
        if (!toast) return;
        toastMsg.textContent = msg;
        toast.classList.add('ee-show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function(){ toast.classList.remove('ee-show'); }, 2400);
    }

    /* ── FAQ accordion ── click question to open; clicking the same
       question again closes it; opening one auto-closes the others. */
    document.querySelectorAll('.ee-faq-q').forEach(function(btn){
        btn.addEventListener('click', function(e){
            e.preventDefault();
            var item = btn.closest('.ee-faq-item');
            if (!item) return;
            var willOpen = !item.classList.contains('ee-open');
            document.querySelectorAll('.ee-faq-item.ee-open').forEach(function(o){
                o.classList.remove('ee-open');
                var qb = o.querySelector('.ee-faq-q');
                if (qb) qb.setAttribute('aria-expanded', 'false');
            });
            if (willOpen) {
                item.classList.add('ee-open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });

    /* ── Author popup ── */
    var chip = document.getElementById('ee-author-chip');
    var popup = document.getElementById('ee-author-popup');
    if (chip && popup) {
        chip.addEventListener('click', function(e){
            e.stopPropagation();
            popup.classList.toggle('ee-show');
        });
        document.addEventListener('click', function(e){
            if (!chip.contains(e.target)) popup.classList.remove('ee-show');
        });
    }

    /* ── Copy as Markdown ── */
    var btnCopyMd = document.getElementById('ee-btn-copy-md');
    if (btnCopyMd) {
        btnCopyMd.addEventListener('click', function(){
            var title = document.querySelector('.ee-blog-title');
            var body  = document.getElementById('ee-blog-body');
            if (!title || !body) return;
            var md = '# ' + title.textContent.trim() + '\n\n';
            md += 'Source: ' + location.href + '\n\n---\n\n';
            body.querySelectorAll('h2, h3, p, li').forEach(function(el){
                var t = el.textContent.trim();
                if (!t) return;
                if (el.tagName === 'H2') md += '\n## ' + t + '\n\n';
                else if (el.tagName === 'H3') md += '\n### ' + t + '\n\n';
                else if (el.tagName === 'LI') md += '- ' + t + '\n';
                else md += t + '\n\n';
            });
            navigator.clipboard.writeText(md)
                .then(function(){ showToast('Copied as Markdown!'); })
                .catch(function(){ showToast('Unable to copy.'); });
        });
    }

    /* ── Share button (native share if available, else copy link) ── */
    var btnShare = document.getElementById('ee-btn-share');
    if (btnShare) {
        btnShare.addEventListener('click', function(){
            if (navigator.share) {
                navigator.share({ title: document.title, url: location.href }).catch(function(){});
            } else {
                navigator.clipboard.writeText(location.href).then(function(){ showToast('Link copied!'); });
            }
        });
    }

    /* ── Copy link inside share section ── */
    var btnCopyLink = document.getElementById('ee-btn-copy-link');
    if (btnCopyLink) {
        btnCopyLink.addEventListener('click', function(){
            navigator.clipboard.writeText(location.href).then(function(){ showToast('Link copied!'); });
        });
    }

    /* ── Send article via email ── */
    var btnSend = document.getElementById('ee-btn-send-article');
    var inpSend = document.getElementById('ee-send-email');
    if (btnSend && inpSend) {
        btnSend.addEventListener('click', function(){
            var v = inpSend.value.trim();
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) {
                inpSend.classList.add('ee-invalid');
                inpSend.focus();
                showToast('Enter a valid email.');
                return;
            }
            inpSend.classList.remove('ee-invalid');
            var subject = encodeURIComponent(document.title);
            var bodyTxt = encodeURIComponent("Thought you'd like this read:\n\n" + document.title + '\n' + location.href);
            window.location.href = 'mailto:' + encodeURIComponent(v) + '?subject=' + subject + '&body=' + bodyTxt;
            inpSend.value = '';
            showToast('Opening your mail app…');
        });
    }

    /* ── TOC build (nested H3 under H2 with per-section reading time) ── */
    var body = document.getElementById('ee-blog-body');
    var toc  = document.getElementById('ee-toc');
    var tocTime  = document.getElementById('ee-toc-time');
    var tocBar   = document.getElementById('ee-toc-bar-fill');
    var tocFab   = document.getElementById('ee-toc-fab');
    var tocFabPct= document.getElementById('ee-toc-fab-pct');
    var sectionItems = []; // [{ id, link, li, words, isH3, parentLi }]

    function wordsBetween(a, b){
        var n = 0; var cur = a.nextSibling;
        while (cur && cur !== b) {
            if (cur.nodeType === 1) {
                n += (cur.textContent || '').trim().split(/\s+/).filter(Boolean).length;
            }
            cur = cur.nextSibling;
        }
        return n;
    }
    function fmtTime(words){
        var m = Math.max(1, Math.ceil(words / 220));
        return m + ' min';
    }

    if (body && toc) {
        var nodes = Array.prototype.slice.call(body.querySelectorAll('h2, h3'));
        toc.innerHTML = ''; // wipe any placeholder
        var currentH2Li = null;
        var currentChildren = null;

        nodes.forEach(function(h, i){
            if (!h.id) h.id = 'ee-h-' + i + '-' + (h.textContent || '').toLowerCase().replace(/[^a-z0-9]+/g, '-').slice(0, 40);
            var next = nodes[i + 1] || null;
            var words = wordsBetween(h, next);
            var time  = fmtTime(words);

            var li = document.createElement('li');
            var a  = document.createElement('a');
            a.href = '#' + h.id;
            a.className = 'ee-toc-link';
            a.dataset.label = (h.textContent || '').toLowerCase();

            if (h.tagName === 'H2') {
                a.innerHTML =
                    '<span class="ee-toc-num"></span>' +
                    '<span class="ee-toc-text">' + h.textContent + '</span>' +
                    '<svg class="ee-toc-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l5 5l9-9"/></svg>' +
                    '<span class="ee-toc-time-mini">' + time + '</span>' +
                    '<svg class="ee-toc-chev" viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 6l6 6l-6 6"/></svg>';
                li.appendChild(a);
                currentH2Li = li;
                currentChildren = null;
                toc.appendChild(li);
                sectionItems.push({ id: h.id, link: a, li: li, isH3: false, parentLi: null });
            } else {
                // H3 — nest under last H2
                a.innerHTML =
                    '<span class="ee-toc-text">' + h.textContent + '</span>' +
                    '<span class="ee-toc-time-mini">' + time + '</span>';
                li.appendChild(a);
                if (currentH2Li) {
                    if (!currentChildren) {
                        currentChildren = document.createElement('ul');
                        currentH2Li.appendChild(currentChildren);
                        currentH2Li.classList.add('ee-has-children');
                    }
                    currentChildren.appendChild(li);
                    sectionItems.push({ id: h.id, link: a, li: li, isH3: true, parentLi: currentH2Li });
                } else {
                    toc.appendChild(li);
                    sectionItems.push({ id: h.id, link: a, li: li, isH3: false, parentLi: null });
                }
            }
        });

        // Chevron click on H2 with children → toggle expand
        toc.addEventListener('click', function(e){
            var chev = e.target.closest('.ee-toc-chev');
            if (!chev) return;
            var li = chev.closest('li.ee-has-children');
            if (li) { e.preventDefault(); li.classList.toggle('ee-expanded'); }
        });

        /* Update header read-time tag with total. */
        if (tocTime) {
            var totalWords = 0;
            body.querySelectorAll('h2, h3, p, li').forEach(function(el){
                totalWords += (el.textContent || '').trim().split(/\s+/).filter(Boolean).length;
            });
            tocTime.textContent = Math.max(1, Math.ceil(totalWords / 220)) + ' min total';
        }
    }

    /* TOC search filter */
    var tocSearch = document.getElementById('ee-toc-search');
    if (tocSearch && toc) {
        tocSearch.addEventListener('input', function(){
            var q = tocSearch.value.trim().toLowerCase();
            toc.querySelectorAll('li').forEach(function(li){
                var link = li.querySelector('.ee-toc-link');
                if (!link) return;
                var hit = !q || (link.dataset.label && link.dataset.label.indexOf(q) >= 0);
                li.style.display = hit ? '' : 'none';
            });
        });
    }

    /* TOC Print + Copy section link buttons */
    var tocPrint = document.getElementById('ee-toc-print');
    if (tocPrint) tocPrint.addEventListener('click', function(){ window.print(); });
    var tocCopy = document.getElementById('ee-toc-copy');
    if (tocCopy) tocCopy.addEventListener('click', function(){
        var active = toc && toc.querySelector('.ee-toc-link.ee-active');
        var url = location.origin + location.pathname + (active ? active.getAttribute('href') : '');
        navigator.clipboard.writeText(url).then(function(){ showToast('Section link copied!'); });
    });

    /* Mobile drawer */
    var fab        = document.getElementById('ee-toc-fab');
    var sidebar    = document.getElementById('ee-toc-sidebar');
    var backdrop   = document.getElementById('ee-toc-backdrop');
    var mobClose   = document.getElementById('ee-toc-mobile-close');
    function openDrawer(){
        if (sidebar) sidebar.classList.add('ee-drawer-open');
        if (backdrop) backdrop.classList.add('ee-show');
    }
    function closeDrawer(){
        if (sidebar) sidebar.classList.remove('ee-drawer-open');
        if (backdrop) backdrop.classList.remove('ee-show');
    }
    if (fab)      fab.addEventListener('click', openDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);
    if (mobClose) mobClose.addEventListener('click', closeDrawer);
    if (toc) toc.addEventListener('click', function(e){
        if (e.target.closest('.ee-toc-link')) closeDrawer();
    });

    /* Keyboard navigation — J/K to jump between H2 sections */
    document.addEventListener('keydown', function(e){
        if (e.target.matches('input, textarea, [contenteditable]')) return;
        if (e.key !== 'j' && e.key !== 'k') return;
        var h2s = body ? body.querySelectorAll('h2[id]') : [];
        if (!h2s.length) return;
        var y = window.scrollY;
        var idx = -1;
        h2s.forEach(function(h, i){
            if (h.getBoundingClientRect().top + window.scrollY <= y + 100) idx = i;
        });
        var target = (e.key === 'j') ? Math.min(idx + 1, h2s.length - 1) : Math.max(0, idx - 1);
        var t = h2s[target];
        if (t) window.scrollTo({ top: t.getBoundingClientRect().top + window.scrollY - 90, behavior: 'smooth' });
    });

    var bar       = document.getElementById('ee-progress-bar');
    var sTop      = document.getElementById('ee-scroll-top');
    var tocProg   = document.getElementById('ee-toc-progress');
    var tocBack   = document.getElementById('ee-toc-back');
    var tocLinks  = toc ? toc.querySelectorAll('.ee-toc-link') : [];
    var sections  = body ? body.querySelectorAll('h2[id], h3[id]') : [];

    function onScroll(){
        var h = document.documentElement;
        var max = h.scrollHeight - h.clientHeight;
        var pct = max > 0 ? (h.scrollTop / max) : 0;
        if (bar)    bar.style.width = (pct * 100) + '%';
        if (tocBar) tocBar.style.width = (pct * 100) + '%';
        if (tocFabPct) tocFabPct.textContent = Math.round(pct * 100) + '%';
        if (sTop)   sTop.classList.toggle('ee-show', h.scrollTop > 400);

        /* Highlight the section currently being read + mark earlier
           sections "completed" + auto-expand the active H2's children. */
        var cur = 'ee-intro';
        sections.forEach(function(s){ if (s.getBoundingClientRect().top < 220) cur = s.id; });
        var activeLink = null;
        var passedActive = false;
        sectionItems.slice().reverse(); // no-op, keeps lint happy
        sectionItems.forEach(function(item){
            var on = (item.id === cur);
            item.link.classList.toggle('ee-active', on);
            if (on) activeLink = item.link;
        });
        /* Completed = appears before the active section in document
           order. Mark the parent H2 li with .ee-completed once we've
           passed all its H3 children too. */
        for (var i = 0; i < sectionItems.length; i++) {
            var it = sectionItems[i];
            if (it.id === cur) { passedActive = true; }
            if (!it.isH3) it.li.classList.toggle('ee-completed', !passedActive || (passedActive && it.id !== cur && it.id < cur));
            // Simpler check: any item whose heading is above the
            // current viewport top is completed.
            var headEl = document.getElementById(it.id);
            if (headEl) {
                var done = headEl.getBoundingClientRect().bottom < 60;
                if (!it.isH3) it.li.classList.toggle('ee-completed', done);
            }
        }
        /* Auto-expand active H2's children; collapse the rest. */
        if (toc) {
            toc.querySelectorAll('li.ee-has-children').forEach(function(li){
                var holds = li.contains(activeLink) || li.querySelector('.ee-toc-link.ee-active');
                li.classList.toggle('ee-expanded', !!holds);
            });
        }

        /* Per-section progress rail on the TOC. Fills down to active. */
        if (tocProg && activeLink && toc) {
            var rail    = toc.parentElement; // .ee-toc-rail
            var rRect   = rail.getBoundingClientRect();
            var linkRect= activeLink.getBoundingClientRect();
            var fillTop = (linkRect.top - rRect.top) + (linkRect.height / 2);
            tocProg.style.height = Math.max(0, fillTop) + 'px';
        } else if (tocProg) {
            tocProg.style.height = '0px';
        }
    }
    window.addEventListener('scroll', onScroll, { passive:true });
    window.addEventListener('resize', onScroll);
    onScroll();

    /* ── Smooth-scroll TOC ── */
    tocLinks.forEach(function(l){
        l.addEventListener('click', function(e){
            var t = document.querySelector(l.getAttribute('href'));
            if (t) {
                e.preventDefault();
                /* Offset for the sticky header height so the heading
                   isn't hidden behind the navbar after scrolling. */
                var top = t.getBoundingClientRect().top + window.scrollY - 90;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

    /* ── Back-to-top TOC button ── */
    if (tocBack) {
        tocBack.addEventListener('click', function(){
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ── Bookmark (localStorage) ──
       Stores the article URL + title + timestamp under
       "ee_bookmarks". The button toggles state on click and
       reflects the saved state on subsequent visits. */
    var bmBtn = document.getElementById('ee-btn-bookmark');
    if (bmBtn) {
        function readBookmarks(){
            try { return JSON.parse(localStorage.getItem('ee_bookmarks') || '[]'); }
            catch(e){ return []; }
        }
        function writeBookmarks(arr){
            try { localStorage.setItem('ee_bookmarks', JSON.stringify(arr.slice(0, 50))); } catch(e){}
        }
        function isSaved(){
            return readBookmarks().some(function(b){ return b.url === location.href; });
        }
        function paint(){
            var saved = isSaved();
            bmBtn.classList.toggle('ee-saved', saved);
            var lbl = bmBtn.querySelector('.ee-bm-label');
            if (lbl) lbl.textContent = saved ? 'Saved' : 'Save';
            bmBtn.setAttribute('title', saved ? 'Remove from saved' : 'Save for later');
        }
        bmBtn.addEventListener('click', function(){
            var list = readBookmarks();
            var here = list.findIndex(function(b){ return b.url === location.href; });
            if (here >= 0) {
                list.splice(here, 1);
                showToast('Removed from saved');
            } else {
                list.unshift({ url: location.href, title: document.title, ts: Date.now() });
                showToast('Saved for later');
            }
            writeBookmarks(list);
            paint();
        });
        paint();
    }

    /* ── Reading-position memory ──
       Saves the visitor's scroll position per URL every 2s. On the
       next visit we offer to "resume reading" (only if they were
       past 15% and under 90%) so we don't pester for fresh opens. */
    (function(){
        var KEY = 'ee_read_pos_' + location.pathname;
        var saveTimer;
        window.addEventListener('scroll', function(){
            clearTimeout(saveTimer);
            saveTimer = setTimeout(function(){
                try { localStorage.setItem(KEY, String(window.scrollY)); } catch(e){}
            }, 500);
        }, { passive:true });
        var saved = 0;
        try { saved = parseInt(localStorage.getItem(KEY) || '0', 10) || 0; } catch(e){}
        if (saved > 400) {
            var docH = document.documentElement.scrollHeight - window.innerHeight;
            var pct  = docH > 0 ? saved / docH : 0;
            if (pct > 0.15 && pct < 0.9) {
                /* Soft resume toast — visitor can ignore or click. */
                setTimeout(function(){
                    var t = document.getElementById('ee-copy-toast');
                    var m = document.getElementById('ee-toast-msg');
                    if (!t || !m) return;
                    t.innerHTML = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#10B981" stroke-width="2" stroke-linecap="round"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/><path d="M12 8v4l3 2"/></svg> <span>Resume reading where you left off?</span> <button id="ee-resume-yes" style="margin-left:8px;background:#DE6E30;color:#fff;border:0;padding:5px 10px;border-radius:5px;font-weight:600;cursor:pointer;font-size:12px;">Resume</button>';
                    t.classList.add('ee-show');
                    setTimeout(function(){ t.classList.remove('ee-show'); }, 8000);
                    var resume = document.getElementById('ee-resume-yes');
                    if (resume) resume.addEventListener('click', function(){
                        window.scrollTo({ top: saved, behavior: 'smooth' });
                        t.classList.remove('ee-show');
                    });
                }, 1500);
            }
        }
    })();

    /* ═══════════════════════════════════════════════════════════
        CONVERSION TRIGGERS
        Coordinated via a tiny shared state so we never stack two
        popups, and each one respects per-session / per-day caps.
       ═══════════════════════════════════════════════════════════ */
    var EEConv = {
        shown: {},
        seen: function(k){ try { return sessionStorage.getItem('ee_seen_'+k) === '1'; } catch(e){ return false; } },
        mark: function(k){ try { sessionStorage.setItem('ee_seen_'+k, '1'); } catch(e){} },
        dayKey: function(k){ return 'ee_day_' + k + '_' + new Date().toDateString(); },
        seenToday: function(k){ try { return localStorage.getItem(EEConv.dayKey(k)) === '1'; } catch(e){ return false; } },
        markToday: function(k){ try { localStorage.setItem(EEConv.dayKey(k), '1'); } catch(e){} },
        anyOpen: function(){
            return document.querySelector('.ee-modal.ee-show, .ee-stick-cta.ee-show') !== null;
        }
    };

    /* A. Sticky bottom CTA bar — visible past 800px scroll, hides
       again if visitor scrolls back near the top; dismiss = silent
       for 24 hours via localStorage. */
    (function(){
        var bar   = document.getElementById('ee-stick-cta');
        var close = document.getElementById('ee-stick-cta-close');
        if (!bar) return;
        var dismissed = false;
        try { dismissed = localStorage.getItem(EEConv.dayKey('stick_cta')) === '1'; } catch(e){}
        if (dismissed) { bar.remove(); return; }
        function paint(){
            bar.classList.toggle('ee-show', window.scrollY > 800);
        }
        window.addEventListener('scroll', paint, { passive:true });
        paint();
        if (close) close.addEventListener('click', function(){
            bar.classList.remove('ee-show');
            EEConv.markToday('stick_cta');
            setTimeout(function(){ bar.remove(); }, 400);
        });
    })();

    /* B. Exit-intent popup — desktop only, once per session.
       Triggered when the mouse leaves through the top edge. */
    (function(){
        var modal = document.getElementById('ee-exit-modal');
        if (!modal) return;
        if (matchMedia('(pointer:coarse)').matches) return; // skip on touch
        function open(){
            if (EEConv.seen('exit') || EEConv.seenToday('exit') || EEConv.anyOpen()) return;
            EEConv.mark('exit'); EEConv.markToday('exit');
            modal.classList.add('ee-show');
        }
        document.addEventListener('mouseleave', function(e){
            if (e.clientY <= 5 && window.scrollY > 200) open();
        });
        /* Close handlers (shared across all modals) */
        document.addEventListener('click', function(e){
            var m = e.target.closest('[data-close]');
            if (m) {
                var id = m.getAttribute('data-close');
                var t = document.getElementById(id);
                if (t) t.classList.remove('ee-show');
            }
            if (e.target.classList && e.target.classList.contains('ee-modal')) {
                e.target.classList.remove('ee-show');
            }
        });
        document.addEventListener('keydown', function(e){
            if (e.key === 'Escape') document.querySelectorAll('.ee-modal.ee-show').forEach(function(m){ m.classList.remove('ee-show'); });
        });
        /* Generic modal form handler */
        document.querySelectorAll('.ee-modal-form').forEach(function(form){
            form.addEventListener('submit', function(e){
                e.preventDefault();
                var input = form.querySelector('input[type=email]');
                var v = input.value.trim();
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) {
                    input.style.borderColor = '#DC2626'; input.focus(); return;
                }
                var msg = form.getAttribute('data-success') || 'Thanks!';
                form.innerHTML = '<div class="ee-modal-ok">✓ ' + msg + '</div>';
                try {
                    var k = 'ee_lm_emails';
                    var arr = JSON.parse(localStorage.getItem(k) || '[]');
                    arr.unshift({ email: v, post: document.title, ts: Date.now() });
                    localStorage.setItem(k, JSON.stringify(arr.slice(0, 50)));
                } catch(e){}
            });
        });
    })();

    /* C. End-of-article CTA — reveal when visitor reaches 90 % of
       page height. Once revealed, stays in place. */
    (function(){
        var card = document.getElementById('ee-end-cta');
        if (!card) return;
        function paint(){
            var docH = document.documentElement.scrollHeight - window.innerHeight;
            var pct  = docH > 0 ? (window.scrollY / docH) : 0;
            if (pct > 0.88) card.classList.add('ee-show');
        }
        window.addEventListener('scroll', paint, { passive:true });
        paint();
    })();

    /* G. Scroll-stage prompts — small toast nudges at 25 / 50 / 75. */
    (function(){
        var stages = [
            { at: .25, msg: '💡 Liked the read so far? Hit "Save" up top to come back to it.',          key: 'p25' },
            { at: .55, msg: '📩 Want the PDF version? Scroll a bit further for the free download.',    key: 'p50' },
            { at: .80, msg: '🚀 Ready to chat? Book a free 20-min demo with our team.',               key: 'p75' }
        ];
        function paint(){
            if (EEConv.anyOpen()) return;
            var docH = document.documentElement.scrollHeight - window.innerHeight;
            var pct  = docH > 0 ? (window.scrollY / docH) : 0;
            stages.forEach(function(s){
                if (pct >= s.at && !EEConv.seen(s.key)) {
                    EEConv.mark(s.key);
                    showToast(s.msg);
                }
            });
        }
        window.addEventListener('scroll', paint, { passive:true });
    })();

    /* H. Social proof counter — animated random number that
       drifts slowly upward to feel "live". Capped 6-28. */
    (function(){
        var el = document.getElementById('ee-sproof-n');
        if (!el) return;
        var current = 6 + Math.floor(Math.random() * 16);
        el.textContent = current;
        setInterval(function(){
            if (Math.random() < .45) {
                current = Math.max(6, Math.min(28, current + (Math.random() < .65 ? 1 : -1)));
                el.textContent = current;
                el.style.animation = 'none';
                el.offsetHeight; // reflow
                el.style.animation = '';
            }
        }, 8000);
    })();

    /* ── Auto-scroll TOC sidebar to keep the active item in view ── */
    var lastActiveId = '';
    function syncTocScroll(){
        var act = toc && toc.querySelector('a.ee-active');
        if (!act) return;
        var id = act.getAttribute('href');
        if (id === lastActiveId) return;
        lastActiveId = id;
        var aside = document.querySelector('.ee-toc-sidebar');
        if (!aside) return;
        var aRect = aside.getBoundingClientRect();
        var lRect = act.getBoundingClientRect();
        if (lRect.top < aRect.top + 40 || lRect.bottom > aRect.bottom - 40) {
            act.scrollIntoView({ block: 'center', behavior: 'smooth' });
        }
    }
    setInterval(syncTocScroll, 300);

    /* ── Sidebar action buttons (Share / E-mail / PDF / Print) ── */
    var actShare = document.getElementById('ee-act-share');
    if (actShare) actShare.addEventListener('click', function(){
        if (navigator.share) {
            navigator.share({ title: document.title, url: location.href }).catch(function(){});
        } else {
            navigator.clipboard.writeText(location.href).then(function(){ showToast('Link copied!'); });
        }
    });
    var actPdf = document.getElementById('ee-act-pdf');
    if (actPdf) actPdf.addEventListener('click', function(){
        showToast('Choose "Save as PDF" in the print dialog');
        window.print();
    });
    var actPrint = document.getElementById('ee-act-print');
    if (actPrint) actPrint.addEventListener('click', function(){ window.print(); });

    /* ── Floating Quick Nav visibility ──
       Visible window:
         START — the sidebar "Last Updated" chip has entered the
                 viewport (i.e. its top has crossed the viewport
                 bottom). The visitor can now see it on screen.
         END   — the FAQ section's BOTTOM has scrolled past the
                 viewport top, meaning the visitor has finished
                 reading the FAQs.
       Outside that range the dashboard is hidden. Posts that lack
       either anchor fall back to a 50–90 % page-scroll window so
       the dashboard still appears on every article. */
    var fnav        = document.getElementById('ee-float-nav');
    var lastUpdated = document.getElementById('ee-last-updated');
    var faqSection  = document.getElementById('ee-faq-section');
    if (fnav) {
        function toggleFnav(){
            var started, ended;
            if (lastUpdated) {
                started = lastUpdated.getBoundingClientRect().top < window.innerHeight;
            }
            if (faqSection) {
                ended = faqSection.getBoundingClientRect().bottom < 0;
            }
            if (started === undefined || ended === undefined) {
                var docH = document.documentElement.scrollHeight - window.innerHeight;
                var pct  = docH > 0 ? (window.scrollY / docH) : 0;
                if (started === undefined) started = (pct > 0.50);
                if (ended   === undefined) ended   = (pct > 0.90);
            }
            fnav.classList.toggle('ee-visible', started && !ended);
        }
        window.addEventListener('scroll', toggleFnav, { passive:true });
        window.addEventListener('resize', toggleFnav);
        toggleFnav();
    }

})();

document.documentElement.classList.add('ee-thin-scroll');
</script>

<?php
endwhile;
get_footer();
