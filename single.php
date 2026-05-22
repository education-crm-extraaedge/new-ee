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
    $read_time   = $f('read_time', '6 min read');
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

.ee-toc-sidebar{padding:32px 20px;border-right:1px solid var(--b-border);position:sticky;top:96px;height:calc(100vh - 96px);overflow-y:auto;scrollbar-width:none;-ms-overflow-style:none;}
.ee-toc-sidebar::-webkit-scrollbar{display:none;width:0;height:0;}
.ee-toc-sidebar h3,
.ee-toc-sidebar .ee-toc-heading{font-size:11px;font-weight:700;letter-spacing:.14em;color:var(--b-muted);text-transform:uppercase;margin-bottom:16px;}
.ee-toc-list{list-style:none;margin:0;padding:0;}
.ee-toc-list li{margin-bottom:2px;}
.ee-toc-list a{font-size:13px;color:var(--b-muted);display:block;padding:7px 12px;border-left:2px solid transparent;border-radius:0 6px 6px 0;transition:all var(--b-transition);line-height:1.4;}
.ee-toc-list a:hover{color:var(--b-orange);background:var(--b-orange-light);}
.ee-toc-list a.ee-active{color:var(--b-orange);border-left-color:var(--b-orange);background:var(--b-orange-light);font-weight:600;}
.ee-toc-list .ee-toc-h3{padding-left:24px;font-size:12.5px;}

.ee-main-content{padding:36px 44px;min-width:0;}
.ee-category-tag{display:inline-flex;align-items:center;gap:6px;background:var(--b-orange-light);color:var(--b-orange);font-size:12px;font-weight:600;padding:5px 14px;border-radius:20px;margin-bottom:18px;}
.ee-blog-title{font-size:34px;font-weight:800;color:var(--b-blue);line-height:1.2;letter-spacing:-.02em;margin:0 0 14px;}
.ee-blog-subtitle{font-size:16px;color:var(--b-text-soft);line-height:1.6;margin:0 0 24px;max-width:680px;}

.ee-cta-row{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:26px;}
.ee-btn-primary{background:var(--b-orange);color:#fff;border:none;padding:11px 22px;border-radius:var(--b-radius-sm);font-size:13.5px;font-weight:600;cursor:pointer;transition:all var(--b-transition);display:inline-flex;align-items:center;gap:7px;box-shadow:var(--b-shadow-sm);text-decoration:none;}
.ee-btn-primary:hover{background:var(--b-orange-dark);color:#fff;transform:translateY(-1px);box-shadow:var(--b-shadow-md);}
.ee-btn-outline{background:#fff;color:var(--b-blue);border:2px solid var(--b-blue);padding:9px 20px;border-radius:var(--b-radius-sm);font-size:13.5px;font-weight:600;cursor:pointer;transition:all var(--b-transition);display:inline-flex;align-items:center;gap:7px;text-decoration:none;}
.ee-btn-outline:hover{background:var(--b-blue);color:#fff;}

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
.ee-icon-btn{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:7px 12px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;font-size:12px;color:var(--b-muted);font-weight:500;transition:all var(--b-transition);}
.ee-icon-btn:hover{border-color:var(--b-orange);color:var(--b-orange);background:var(--b-orange-light);}

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
.ee-soc-btn{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:all var(--b-transition);color:#fff;text-decoration:none;}
.ee-soc-btn:hover{transform:translateY(-1px);box-shadow:var(--b-shadow-md);color:#fff;}
.ee-soc-fb{background:#1877F2;}.ee-soc-tw{background:#000;}.ee-soc-li{background:#0A66C2;}
.ee-soc-wa{background:#25D366;}.ee-soc-em{background:var(--b-blue);}.ee-soc-cp{background:#6B7280;}

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
.ee-follow-btn{width:38px;height:38px;border-radius:var(--b-radius-sm);display:flex;align-items:center;justify-content:center;cursor:pointer;border:none;font-size:17px;transition:all var(--b-transition);color:#fff;text-decoration:none;}
.ee-follow-btn:hover{transform:translateY(-2px);box-shadow:var(--b-shadow-md);color:#fff;}
.ee-f-li{background:#0A66C2;}.ee-f-tw{background:#000;}.ee-f-fb{background:#1877F2;}
.ee-f-ig{background:linear-gradient(45deg,#F09433,#E6683C,#DC2743,#CC2366,#BC1888);}
.ee-f-yt{background:#FF0000;}

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
.ee-right-sidebar .ee-blog-form button{width:100%;background:var(--b-orange);color:#fff;border:none;padding:11px;border-radius:var(--b-radius-sm);font-size:13.5px;font-weight:700;cursor:pointer;transition:background var(--b-transition);display:inline-flex;align-items:center;justify-content:center;gap:6px;}
.ee-right-sidebar .ee-blog-form button:hover{background:var(--b-orange-dark);}

.ee-product-list{display:flex;flex-direction:column;gap:8px;}
.ee-product-pill{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:11px 14px;display:flex;align-items:center;justify-content:space-between;font-size:13px;font-weight:500;color:var(--b-blue);cursor:pointer;transition:all var(--b-transition);text-decoration:none;}
.ee-product-pill:hover{border-color:var(--b-orange);background:var(--b-orange-light);color:var(--b-orange);transform:translateX(2px);}
.ee-product-pill i{font-size:15px;}

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
.ee-sub-btn{width:100%;background:var(--b-orange);color:#fff;border:none;padding:10px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:700;cursor:pointer;transition:background var(--b-transition);}
.ee-sub-btn:hover{background:var(--b-orange-dark);}
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
.ee-promo-card .ee-promo-btn{display:inline-flex;align-items:center;gap:6px;background:var(--b-orange);color:#fff;border:none;padding:9px 16px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:700;cursor:pointer;text-decoration:none;transition:background var(--b-transition);}
.ee-promo-card .ee-promo-btn:hover{background:var(--b-orange-dark);color:#fff;}
.ee-promo-card.ee-promo-orange .ee-promo-btn{background:#fff;color:var(--b-orange);}
.ee-promo-card.ee-promo-orange .ee-promo-btn:hover{background:#fff8f1;}

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
.ee-compliance-logos{display:flex;gap:8px;margin-bottom:10px;flex-wrap:wrap;}
.ee-compliance-logo{font-size:9px;font-weight:800;letter-spacing:.06em;background:var(--b-blue-light);color:var(--b-blue);padding:5px 8px;border-radius:4px;border:1px solid #C7D5E8;}
.ee-compliance p{font-size:11.5px;color:var(--b-muted);line-height:1.55;margin:0 0 10px;}
.ee-compliance a{color:var(--b-orange);font-weight:600;}
.ee-action-row{display:grid;grid-template-columns:1fr 1fr;gap:6px;}
.ee-action-btn{display:inline-flex;align-items:center;justify-content:center;gap:5px;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);padding:8px 6px;font-size:11.5px;font-weight:600;color:var(--b-blue);cursor:pointer;transition:all var(--b-transition);text-decoration:none;}
.ee-action-btn:hover{border-color:var(--b-orange);color:var(--b-orange);background:var(--b-orange-light);}
.ee-action-btn i{font-size:14px;}

/* ── Quick Navigation inside the right sidebar ──
   Icon-on-top + label-below tiles in a 3-column grid so all 7 links
   stay scannable inside the 280px-wide sidebar. */
.ee-side-nav-section{margin-top:18px;}
.ee-side-nav-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:6px;}
.ee-side-nav-grid a{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;padding:12px 6px;background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-sm);text-decoration:none;color:var(--b-text-soft);font-size:11px;font-weight:600;text-align:center;line-height:1.2;transition:all var(--b-transition);}
.ee-side-nav-grid a i{font-size:20px;color:var(--b-blue);transition:color var(--b-transition);}
.ee-side-nav-grid a:hover{border-color:var(--b-orange);background:var(--b-orange-light);color:var(--b-orange);transform:translateY(-1px);box-shadow:var(--b-shadow-sm);}
.ee-side-nav-grid a:hover i{color:var(--b-orange);}
.ee-side-nav-grid a span{display:block;white-space:nowrap;}

.ee-floating-contact{position:fixed;right:20px;bottom:20px;display:flex;flex-direction:column;gap:12px;z-index:1000;}
.ee-float-btn{display:flex;align-items:center;gap:10px;padding:12px 16px 12px 14px;border-radius:50px;color:#fff;font-weight:600;font-size:13.5px;text-decoration:none;box-shadow:0 6px 20px rgba(15,32,64,.18);transition:all .25s ease;cursor:pointer;border:none;font-family:inherit;}
.ee-float-btn:hover{transform:translateY(-2px) scale(1.03);box-shadow:0 10px 28px rgba(15,32,64,.25);color:#fff;}
.ee-float-btn .ee-float-icon-wrap{width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,.22);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
.ee-float-btn .ee-float-label{display:flex;flex-direction:column;line-height:1.15;}
.ee-float-btn .ee-float-label small{font-size:10px;opacity:.9;font-weight:500;letter-spacing:.04em;text-transform:uppercase;}
.ee-float-btn .ee-float-label strong{font-size:13px;font-weight:700;letter-spacing:.01em;}
.ee-float-whatsapp{background:linear-gradient(135deg,#25D366,#1DA851);}
.ee-float-whatsapp .ee-float-icon-wrap{animation:ee-wa-pulse 2.4s infinite;}
@keyframes ee-wa-pulse{0%,100%{box-shadow:0 0 0 0 rgba(255,255,255,.4);}50%{box-shadow:0 0 0 8px rgba(255,255,255,0);}}
.ee-float-call{background:linear-gradient(135deg,var(--b-orange),#C55E24);}
.ee-float-call .ee-float-icon-wrap i{animation:ee-phone-shake 1.6s infinite;}
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
@media (max-width:820px){
    .ee-blog-wrap{grid-template-columns:1fr;}
    .ee-toc-sidebar{display:none;}
    .ee-main-content{padding:24px 18px;}
    .ee-blog-title{font-size:26px;}
    .ee-blog-body h2{font-size:21px;}
    .ee-stat-row{grid-template-columns:1fr;}
    .ee-crm-banner{padding:24px;}
    .ee-crm-banner h3{font-size:18px;}
    .ee-floating-contact{right:14px;bottom:14px;}
    .ee-scroll-top{left:14px;bottom:14px;}
    .ee-top-actions{margin-left:0;width:100%;}
}
</style>

<div class="ee-blog-page">
    <div class="ee-progress-bar" id="ee-progress-bar"></div>

    <div class="ee-blog-wrap">

        <aside class="ee-toc-sidebar" aria-label="Table of Contents">
            <div class="ee-toc-heading">On this page</div>
            <ul class="ee-toc-list" id="ee-toc">
                <li><a href="#ee-intro" class="ee-active">Introduction</a></li>
                <!-- Auto-built from content H2/H3 by JS -->
            </ul>
        </aside>

        <main class="ee-main-content">

            <?php if ($category) : ?>
                <div class="ee-category-tag"><i class="ti ti-tag"></i> <?php echo esc_html($category); ?></div>
            <?php endif; ?>

            <h1 class="ee-blog-title" id="ee-intro"><?php the_title(); ?></h1>

            <?php if ($subtitle) : ?>
                <p class="ee-blog-subtitle"><?php echo wp_kses_post($subtitle); ?></p>
            <?php endif; ?>

            <div class="ee-cta-row">
                <a href="/book-demo/" class="ee-btn-primary"><i class="ti ti-presentation"></i> Take a Tour / Book a Demo</a>
                <a href="/contact-us/" class="ee-btn-outline"><i class="ti ti-phone"></i> Contact Us</a>
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
                <span class="ee-meta-item"><i class="ti ti-clock"></i> <?php echo esc_html($read_time); ?></span>
                <span class="ee-meta-item"><i class="ti ti-calendar"></i> <?php echo esc_html(get_the_date()); ?></span>
                <div class="ee-top-actions">
                    <button class="ee-icon-btn" id="ee-btn-copy-md" title="Copy article as Markdown"><i class="ti ti-markdown"></i> Copy MD</button>
                    <button class="ee-icon-btn" id="ee-btn-share" title="Share this page"><i class="ti ti-share-3"></i> Share</button>
                    <button class="ee-icon-btn" onclick="window.print()" title="Print"><i class="ti ti-printer"></i> Print</button>
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
                <div class="ee-section-label"><i class="ti ti-share-3"></i> Share this article</div>
                <div class="ee-social-icons">
                    <?php $u = urlencode(get_permalink()); $t = urlencode(get_the_title()); ?>
                    <a class="ee-soc-btn ee-soc-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $u; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-facebook"></i> Facebook</a>
                    <a class="ee-soc-btn ee-soc-tw" href="https://twitter.com/intent/tweet?url=<?php echo $u; ?>&text=<?php echo $t; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-x"></i> Twitter/X</a>
                    <a class="ee-soc-btn ee-soc-li" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $u; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-linkedin"></i> LinkedIn</a>
                    <a class="ee-soc-btn ee-soc-wa" href="https://api.whatsapp.com/send?text=<?php echo $t; ?>%20<?php echo $u; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-whatsapp"></i> WhatsApp</a>
                    <a class="ee-soc-btn ee-soc-em" href="mailto:?subject=<?php echo $t; ?>&body=<?php echo $u; ?>"><i class="ti ti-mail"></i> Email</a>
                    <button class="ee-soc-btn ee-soc-cp" id="ee-btn-copy-link" type="button"><i class="ti ti-link"></i> Copy Link</button>
                </div>
            </div>

            <div class="ee-send-article">
                <div class="ee-section-label"><i class="ti ti-send"></i> Send this article to someone who'd like it</div>
                <p>Share this guide with a colleague or friend in education marketing.</p>
                <div class="ee-send-row">
                    <input type="email" id="ee-send-email" placeholder="Enter their email address..." aria-label="Recipient email">
                    <button type="button" id="ee-btn-send-article">Send <i class="ti ti-arrow-right"></i></button>
                </div>
            </div>

            <?php if (!empty($faqs)) : ?>
                <div class="ee-faq-section" id="ee-faq-section">
                    <h2>Frequently Asked Questions</h2>
                    <?php foreach ($faqs as $faq) : ?>
                        <div class="ee-faq-item">
                            <button class="ee-faq-q" type="button" aria-expanded="false">
                                <span><?php echo esc_html($faq['q']); ?></span>
                                <i class="ti ti-chevron-down ee-faq-icon" aria-hidden="true"></i>
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
                <a href="<?php echo esc_url($banner_cta_url); ?>" class="ee-btn-primary" style="white-space:nowrap;flex-shrink:0;"><i class="ti ti-rocket"></i> <?php echo esc_html($banner_cta_text); ?></a>
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
                                    <i class="ti ti-news"></i>
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
        </main>

        <aside class="ee-right-sidebar" aria-label="Sidebar">

            <div class="ee-sidebar-section">
                <div class="ee-section-label"><i class="ti ti-heart"></i> Follow Us</div>
                <div class="ee-follow-icons">
                    <a class="ee-follow-btn ee-f-li" href="https://www.linkedin.com/company/extraaedge/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="ti ti-brand-linkedin"></i></a>
                    <a class="ee-follow-btn ee-f-tw" href="https://twitter.com/extraaedge" target="_blank" rel="noopener" aria-label="Twitter"><i class="ti ti-brand-x"></i></a>
                    <a class="ee-follow-btn ee-f-fb" href="https://www.facebook.com/extraaedge/" target="_blank" rel="noopener" aria-label="Facebook"><i class="ti ti-brand-facebook"></i></a>
                    <a class="ee-follow-btn ee-f-ig" href="https://www.instagram.com/extraaedge/" target="_blank" rel="noopener" aria-label="Instagram"><i class="ti ti-brand-instagram"></i></a>
                    <a class="ee-follow-btn ee-f-yt" href="https://www.youtube.com/@ExtraaEdge" target="_blank" rel="noopener" aria-label="YouTube"><i class="ti ti-brand-youtube"></i></a>
                </div>
            </div>

            <?php
            /* Products list — pulls from the Product CPT helper if available. */
            $sidebar_products = function_exists('ee_get_product_menu_items') ? ee_get_product_menu_items(5) : array();
            if (!empty($sidebar_products)) :
            ?>
            <div class="ee-sidebar-section">
                <div class="ee-section-label"><i class="ti ti-package"></i> View All Products</div>
                <div class="ee-product-list">
                    <?php foreach ($sidebar_products as $p) : ?>
                        <a class="ee-product-pill" href="<?php echo esc_url($p['url']); ?>"><?php echo esc_html($p['title']); ?> <i class="ti ti-chevron-right"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php
            /* ── New Update — single most recent post (excluding current)
               highlighted with a "NEW" badge so visitors always see the
               freshest piece of content on every article. */
            $new_q = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'post__not_in'   => array($pid),
                'no_found_rows'  => true,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
            if ($new_q->have_posts()) : $new_q->the_post();
                $new_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
            <div class="ee-sidebar-section">
                <div class="ee-section-label"><i class="ti ti-flame"></i> New Update</div>
                <a class="ee-new-update" href="<?php the_permalink(); ?>">
                    <div class="ee-new-update-thumb">
                        <?php if ($new_thumb) : ?>
                            <img src="<?php echo esc_url($new_thumb); ?>" alt="">
                        <?php else : ?>
                            <i class="ti ti-news"></i>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span class="ee-new-update-tag">New</span>
                        <div class="ee-new-update-title"><?php echo esc_html(get_the_title()); ?></div>
                        <div class="ee-new-update-date"><?php echo esc_html(get_the_date()); ?></div>
                    </div>
                </a>
            </div>
            <?php wp_reset_postdata(); endif; ?>

            <?php
            /* ── Solutions list — pulled from the same admin source as
               the header mega-menu so editors don't repeat themselves. */
            $sidebar_solutions = function_exists('ee_get_solution_items') ? ee_get_solution_items() : array();
            if (!empty($sidebar_solutions)) :
                /* Flatten in case helper returns grouped/category data. */
                $flat_solutions = array();
                foreach ($sidebar_solutions as $row) {
                    if (isset($row['items']) && is_array($row['items'])) {
                        foreach ($row['items'] as $it) $flat_solutions[] = $it;
                    } else {
                        $flat_solutions[] = $row;
                    }
                }
                $flat_solutions = array_slice($flat_solutions, 0, 5);
            ?>
            <div class="ee-sidebar-section">
                <div class="ee-section-label"><i class="ti ti-bulb"></i> Solutions</div>
                <div class="ee-product-list">
                    <?php foreach ($flat_solutions as $s) :
                        $s_url   = $s['url']   ?? $s['link']  ?? '#';
                        $s_label = $s['title'] ?? $s['label'] ?? $s['name'] ?? '';
                        if (!$s_label) continue;
                    ?>
                        <a class="ee-product-pill" href="<?php echo esc_url($s_url); ?>"><?php echo esc_html($s_label); ?> <i class="ti ti-chevron-right"></i></a>
                    <?php endforeach; ?>
                </div>
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
                    <a class="ee-promo-btn" href="https://getvidya.ai/" target="_blank" rel="noopener">Explore Vidya AI <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>

            <!-- ── Smarter Admissions CTA banner ── -->
            <div class="ee-sidebar-section">
                <div class="ee-promo-card ee-promo-orange">
                    <h3>Need a Smarter Admissions Process?</h3>
                    <p>Customise your entire admission workflow — funnels, reports, automations &amp; AI journeys built for your institution.</p>
                    <a class="ee-promo-btn" href="/book-demo/">Book a Free Demo <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>

            <!-- ── Compliance + action buttons ── -->
            <div class="ee-sidebar-section">
                <div class="ee-compliance">
                    <div class="ee-compliance-logos">
                        <span class="ee-compliance-logo">GDPR</span>
                        <span class="ee-compliance-logo">CCPA</span>
                        <span class="ee-compliance-logo">ISO 27001</span>
                    </div>
                    <p>We are <strong>GDPR and CCPA compliant</strong>! Your transaction &amp; personal information is safe and secure. For more details, please read our <a href="/privacy-policy/">privacy policy</a>.</p>
                    <div class="ee-action-row">
                        <button type="button" class="ee-action-btn" id="ee-act-share"><i class="ti ti-share-3"></i> Share</button>
                        <a class="ee-action-btn" id="ee-act-email" href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>"><i class="ti ti-mail"></i> E-mail</a>
                        <button type="button" class="ee-action-btn" id="ee-act-pdf"><i class="ti ti-file-text"></i> Save PDF</button>
                        <button type="button" class="ee-action-btn" id="ee-act-print"><i class="ti ti-printer"></i> Print</button>
                    </div>
                </div>
            </div>

            <div class="ee-last-updated">
                <i class="ti ti-calendar-check"></i> Last Updated: <strong style="margin-left:4px;"><?php echo esc_html(get_the_modified_date()); ?></strong>
            </div>

            <!-- ── Quick navigation (inside the right sidebar, icon-grid style) ── -->
            <div class="ee-sidebar-section ee-side-nav-section">
                <div class="ee-section-label"><i class="ti ti-compass"></i> Quick Navigation</div>
                <nav class="ee-side-nav-grid" aria-label="Quick navigation">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><i class="ti ti-home"></i><span>Home</span></a>
                    <a href="<?php echo esc_url(home_url('/products/')); ?>"><i class="ti ti-package"></i><span>Products</span></a>
                    <a href="<?php echo esc_url(home_url('/industries/')); ?>"><i class="ti ti-building"></i><span>Industries</span></a>
                    <a href="<?php echo esc_url(home_url('/solutions/')); ?>"><i class="ti ti-bulb"></i><span>Solutions</span></a>
                    <a href="<?php echo esc_url(home_url('/case-studies/')); ?>"><i class="ti ti-quote"></i><span>Testimonials</span></a>
                    <a href="<?php echo esc_url(home_url('/resources/')); ?>"><i class="ti ti-book"></i><span>Resources</span></a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"><i class="ti ti-mail"></i><span>Contact&nbsp;Us</span></a>
                </nav>
            </div>

        </aside>
    </div>

    <div class="ee-floating-contact" role="region" aria-label="Quick contact">
        <a class="ee-float-btn ee-float-whatsapp" href="https://api.whatsapp.com/send/?phone=918956982897" target="_blank" rel="noopener" aria-label="WhatsApp">
            <span class="ee-float-icon-wrap"><i class="ti ti-brand-whatsapp"></i></span>
            <span class="ee-float-label"><small>Chat on</small><strong>WhatsApp</strong></span>
        </a>
        <a class="ee-float-btn ee-float-call" href="tel:+918956982897" aria-label="Call us">
            <span class="ee-float-icon-wrap"><i class="ti ti-phone-call"></i></span>
            <span class="ee-float-label"><small>Call us</small><strong>+91 89569 82897</strong></span>
        </a>
    </div>

    <button class="ee-scroll-top" id="ee-scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Scroll to top"><i class="ti ti-arrow-up"></i></button>

    <div class="ee-copy-toast" id="ee-copy-toast"><i class="ti ti-circle-check"></i> <span id="ee-toast-msg">Copied!</span></div>
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

    /* ── TOC build + scrollspy + progress ── */
    var body = document.getElementById('ee-blog-body');
    var toc  = document.getElementById('ee-toc');
    if (body && toc) {
        var nodes = body.querySelectorAll('h2, h3');
        nodes.forEach(function(h, i){
            if (!h.id) h.id = 'ee-h-' + i + '-' + (h.textContent || '').toLowerCase().replace(/[^a-z0-9]+/g, '-').slice(0, 40);
            var li = document.createElement('li');
            var a  = document.createElement('a');
            a.href = '#' + h.id;
            a.textContent = h.textContent;
            if (h.tagName === 'H3') a.className = 'ee-toc-h3';
            li.appendChild(a);
            toc.appendChild(li);
        });
    }
    var bar      = document.getElementById('ee-progress-bar');
    var sTop     = document.getElementById('ee-scroll-top');
    var tocLinks = toc ? toc.querySelectorAll('a') : [];
    var sections = body ? body.querySelectorAll('h2[id], h3[id]') : [];
    function onScroll(){
        var h = document.documentElement;
        var max = h.scrollHeight - h.clientHeight;
        if (bar) bar.style.width = max > 0 ? (h.scrollTop / max * 100) + '%' : '0%';
        if (sTop) sTop.classList.toggle('ee-show', h.scrollTop > 400);
        var cur = 'ee-intro';
        sections.forEach(function(s){ if (s.getBoundingClientRect().top < 220) cur = s.id; });
        tocLinks.forEach(function(l){ l.classList.toggle('ee-active', l.getAttribute('href') === '#' + cur); });
    }
    window.addEventListener('scroll', onScroll, { passive:true });
    onScroll();

    /* ── Smooth-scroll TOC ── */
    tocLinks.forEach(function(l){
        l.addEventListener('click', function(e){
            var t = document.querySelector(l.getAttribute('href'));
            if (t) { e.preventDefault(); t.scrollIntoView({ behavior:'smooth', block:'start' }); }
        });
    });

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

})();

document.documentElement.classList.add('ee-thin-scroll');
</script>

<?php
endwhile;
get_footer();
