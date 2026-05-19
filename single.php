<?php
/**
 * Single Blog Post Template — premium reading layout
 *
 * - get_header() / get_footer() provide the site chrome (no DOCTYPE/html
 *   wrappers here).
 * - All editable fields come from the "📰 Blog Page Settings" meta box on
 *   the post edit screen, plus the standard WP post editor for the body.
 * - Left TOC auto-builds from the H2/H3 headings in the_content().
 * - Right sidebar: follow + lead form + product list + featured posts +
 *   newsletter subscribe. Featured posts auto-load the 3 most recent
 *   published posts.
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

/* Pull tabler-icons CDN — used inside the layout. Lazy-print to avoid
   double-loading. */
add_action('wp_head', function () {
    if (!is_singular('post')) return;
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/tabler-icons.min.css">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">' . "\n";
}, 5);

get_header();

while (have_posts()) : the_post();
    $author_id      = get_post_field('post_author', $pid);
    $author_name    = get_the_author_meta('display_name', $author_id);
    $author_title   = get_the_author_meta('description', $author_id) ?: 'Contributor · ExtraaEdge';
    $author_short   = get_user_meta($author_id, 'description', true);
    $author_initials = strtoupper(mb_substr($author_name, 0, 1) . (preg_match('/\s(\S)/u', $author_name, $m) ? $m[1] : ''));

    $category    = $f('category_tag', '');
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

    $stats = array();
    for ($i = 1; $i <= 3; $i++) {
        $n = $f("stat{$i}_num");
        if ($n !== '') $stats[] = array('num' => $n, 'lab' => $f("stat{$i}_lab"));
    }
?>

<style>
.ee-blog-page {
    --b-orange:#DE6E30;--b-orange-dark:#B85920;--b-orange-light:#FFF3EC;
    --b-blue:#19335D;--b-blue-dark:#0F2040;--b-blue-light:#EEF2F8;
    --b-bg:#F8F9FB;--b-border:#E5E7EB;--b-border-dark:#D1D5DB;
    --b-text:#1F2937;--b-text-soft:#374151;--b-muted:#6B7280;--b-muted-soft:#9CA3AF;
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

.ee-blog-page .ee-progress-bar{position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,var(--b-orange),var(--b-blue));width:0%;z-index:9990;transition:width .1s linear;}

.ee-blog-wrap{display:grid;grid-template-columns:240px minmax(0,1fr) 300px;max-width:1280px;margin:0 auto;}

.ee-toc-sidebar{padding:32px 20px;border-right:1px solid var(--b-border);position:sticky;top:96px;height:calc(100vh - 96px);overflow-y:auto;}
.ee-toc-sidebar h3{font-size:11px;font-weight:700;letter-spacing:.14em;color:var(--b-muted);text-transform:uppercase;margin-bottom:16px;}
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
.ee-author-chip{display:flex;align-items:center;gap:10px;position:relative;}
.ee-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--b-blue),var(--b-blue-dark));color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;flex-shrink:0;letter-spacing:.02em;}
.ee-author-name{font-size:13.5px;font-weight:600;color:var(--b-blue);line-height:1.2;}
.ee-author-title{font-size:11.5px;color:var(--b-muted);margin-top:2px;}
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

.ee-stat-row{display:grid;grid-template-columns:repeat(<?php echo max(1, count($stats)); ?>,1fr);gap:14px;margin:24px 0;}
.ee-stat-card{background:#fff;border:1px solid var(--b-border);border-radius:var(--b-radius-md);padding:18px;text-align:center;transition:all var(--b-transition);}
.ee-stat-card:hover{border-color:var(--b-orange);box-shadow:var(--b-shadow-md);transform:translateY(-2px);}
.ee-stat-num{font-size:28px;font-weight:800;color:var(--b-orange);line-height:1;letter-spacing:-.02em;}
.ee-stat-label{font-size:12px;color:var(--b-muted);margin-top:6px;font-weight:500;}

.ee-share-section{margin:36px 0;padding:22px;background:var(--b-bg);border-radius:var(--b-radius-md);}
.ee-share-section h4{font-size:14px;font-weight:700;color:var(--b-blue);margin:0 0 14px;display:flex;align-items:center;gap:8px;}
.ee-social-icons{display:flex;gap:8px;flex-wrap:wrap;}
.ee-soc-btn{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:all var(--b-transition);color:#fff;text-decoration:none;}
.ee-soc-btn:hover{transform:translateY(-1px);box-shadow:var(--b-shadow-md);color:#fff;}
.ee-soc-fb{background:#1877F2;}.ee-soc-tw{background:#000;}.ee-soc-li{background:#0A66C2;}
.ee-soc-wa{background:#25D366;}.ee-soc-em{background:var(--b-blue);}.ee-soc-cp{background:#6B7280;}

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
.ee-crm-banner h3{font-size:22px;font-weight:700;margin:0 0 8px;letter-spacing:-.01em;color:#fff;}
.ee-crm-banner p{font-size:13.5px;opacity:.88;margin:0;max-width:520px;color:#fff;}
.ee-crm-badge{background:var(--b-orange);color:#fff;font-size:10px;font-weight:700;padding:3px 10px;border-radius:20px;display:inline-block;margin-bottom:10px;letter-spacing:.08em;text-transform:uppercase;}
.ee-meta-bottom{padding:22px 0;border-top:1px solid var(--b-border);margin-top:36px;font-size:12.5px;color:var(--b-muted);display:flex;flex-wrap:wrap;gap:18px;}
.ee-meta-bottom strong{color:var(--b-text);font-weight:600;}

.ee-right-sidebar{padding:32px 22px;border-left:1px solid var(--b-border);background:var(--b-bg);}
.ee-sidebar-section{margin-bottom:30px;}
.ee-sidebar-section h4{font-size:11px;font-weight:700;letter-spacing:.12em;color:var(--b-muted);text-transform:uppercase;margin:0 0 14px;display:flex;align-items:center;gap:6px;}

.ee-follow-icons{display:flex;gap:8px;flex-wrap:wrap;}
.ee-follow-btn{width:38px;height:38px;border-radius:var(--b-radius-sm);display:flex;align-items:center;justify-content:center;cursor:pointer;border:none;font-size:17px;transition:all var(--b-transition);color:#fff;text-decoration:none;}
.ee-follow-btn:hover{transform:translateY(-2px);box-shadow:var(--b-shadow-md);color:#fff;}
.ee-f-li{background:#0A66C2;}.ee-f-tw{background:#000;}.ee-f-fb{background:#1877F2;}
.ee-f-ig{background:linear-gradient(45deg,#F09433,#E6683C,#DC2743,#CC2366,#BC1888);}
.ee-f-yt{background:#FF0000;}

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
.ee-subscribe-box h4{font-size:14px;font-weight:700;margin:0 0 4px;text-transform:none;letter-spacing:0;color:#fff;}
.ee-subscribe-box p{font-size:12px;opacity:.85;margin:0 0 14px;line-height:1.55;color:#fff;}
.ee-sub-input{width:100%;border:1px solid rgba(255,255,255,.25);border-radius:var(--b-radius-sm);padding:10px 12px;font-size:12.5px;font-family:inherit;background:rgba(255,255,255,.08);color:#fff;outline:none;margin-bottom:8px;box-sizing:border-box;}
.ee-sub-input::placeholder{color:rgba(255,255,255,.55);}
.ee-sub-input:focus{border-color:var(--b-orange);background:rgba(255,255,255,.12);}
.ee-sub-btn{width:100%;background:var(--b-orange);color:#fff;border:none;padding:10px;border-radius:var(--b-radius-sm);font-size:12.5px;font-weight:700;cursor:pointer;transition:background var(--b-transition);}
.ee-sub-btn:hover{background:var(--b-orange-dark);}

.ee-floating-contact{position:fixed;right:20px;bottom:20px;display:flex;flex-direction:column;gap:12px;z-index:1000;}
.ee-float-btn{display:flex;align-items:center;gap:10px;padding:12px 16px 12px 14px;border-radius:50px;color:#fff;font-weight:600;font-size:13.5px;text-decoration:none;box-shadow:0 6px 20px rgba(15,32,64,.18);transition:all .25s ease;cursor:pointer;border:none;font-family:inherit;}
.ee-float-btn:hover{transform:translateY(-2px) scale(1.03);box-shadow:0 10px 28px rgba(15,32,64,.25);color:#fff;}
.ee-float-btn .ee-float-icon-wrap{width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,.22);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
.ee-float-btn .ee-float-label{display:flex;flex-direction:column;line-height:1.15;}
.ee-float-btn .ee-float-label small{font-size:10px;opacity:.9;font-weight:500;letter-spacing:.04em;text-transform:uppercase;}
.ee-float-btn .ee-float-label strong{font-size:13px;font-weight:700;letter-spacing:.01em;}
.ee-float-whatsapp{background:linear-gradient(135deg,#25D366,#1DA851);}
.ee-float-call{background:linear-gradient(135deg,var(--b-orange),#C55E24);}

.ee-scroll-top{position:fixed;left:20px;bottom:20px;width:42px;height:42px;border-radius:50%;background:var(--b-blue);color:#fff;border:none;cursor:pointer;display:none;align-items:center;justify-content:center;font-size:18px;box-shadow:var(--b-shadow-md);transition:all var(--b-transition);z-index:999;}
.ee-scroll-top.ee-show{display:flex;}
.ee-scroll-top:hover{background:var(--b-blue-dark);transform:translateY(-2px);}

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
            <h3>On this page</h3>
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
                <div class="ee-author-chip">
                    <div class="ee-avatar"><?php echo esc_html($author_initials); ?></div>
                    <div>
                        <div class="ee-author-name"><?php echo esc_html($author_name); ?></div>
                        <div class="ee-author-title"><?php echo esc_html($author_title); ?></div>
                    </div>
                </div>
                <span class="ee-meta-item"><i class="ti ti-clock"></i> <?php echo esc_html($read_time); ?></span>
                <span class="ee-meta-item"><i class="ti ti-calendar"></i> <?php echo esc_html(get_the_date()); ?></span>
                <div class="ee-top-actions">
                    <button class="ee-icon-btn" onclick="navigator.clipboard.writeText(location.href);this.innerHTML='<i class=&quot;ti ti-check&quot;></i> Copied';" title="Copy link"><i class="ti ti-link"></i> Copy</button>
                    <button class="ee-icon-btn" onclick="if(navigator.share){navigator.share({title:document.title,url:location.href})}" title="Share"><i class="ti ti-share-3"></i> Share</button>
                    <button class="ee-icon-btn" onclick="window.print()" title="Print"><i class="ti ti-printer"></i> Print</button>
                </div>
            </div>

            <?php
            $featured = get_the_post_thumbnail($pid, 'full', array('alt' => esc_attr(get_the_title())));
            ?>
            <div class="ee-hero-img<?php echo $featured ? ' has-featured' : ''; ?>" aria-hidden="true">
                <?php if ($featured) : ?>
                    <?php echo $featured; ?>
                <?php else : ?>
                    <div class="ee-hero-img-content">
                        <i class="ti <?php echo esc_attr($hero_icon); ?>"></i>
                        <?php if ($hero_caption) : ?><div><?php echo esc_html($hero_caption); ?></div><?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($callout) : ?>
                <div class="ee-callout">
                    <i class="ti ti-bulb"></i>
                    <p><?php echo wp_kses_post($callout); ?></p>
                </div>
            <?php endif; ?>

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
                <h4><i class="ti ti-share-3"></i> Share this article</h4>
                <div class="ee-social-icons">
                    <?php $u = urlencode(get_permalink()); $t = urlencode(get_the_title()); ?>
                    <a class="ee-soc-btn ee-soc-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $u; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-facebook"></i> Facebook</a>
                    <a class="ee-soc-btn ee-soc-tw" href="https://twitter.com/intent/tweet?url=<?php echo $u; ?>&text=<?php echo $t; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-x"></i> Twitter</a>
                    <a class="ee-soc-btn ee-soc-li" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $u; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-linkedin"></i> LinkedIn</a>
                    <a class="ee-soc-btn ee-soc-wa" href="https://api.whatsapp.com/send?text=<?php echo $t; ?>%20<?php echo $u; ?>" target="_blank" rel="noopener"><i class="ti ti-brand-whatsapp"></i> WhatsApp</a>
                    <a class="ee-soc-btn ee-soc-em" href="mailto:?subject=<?php echo $t; ?>&body=<?php echo $u; ?>"><i class="ti ti-mail"></i> Email</a>
                </div>
            </div>

            <?php if (!empty($faqs)) : ?>
                <div class="ee-faq-section" id="ee-faq-section">
                    <h2>Frequently Asked Questions</h2>
                    <?php foreach ($faqs as $faq) : ?>
                        <div class="ee-faq-item">
                            <button class="ee-faq-q" onclick="this.parentElement.classList.toggle('ee-open')">
                                <?php echo esc_html($faq['q']); ?>
                                <i class="ti ti-chevron-down ee-faq-icon"></i>
                            </button>
                            <div class="ee-faq-a"><?php echo wp_kses_post($faq['a']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="ee-crm-banner">
                <div>
                    <div class="ee-crm-badge"><?php echo esc_html($banner_badge); ?></div>
                    <h3><?php echo esc_html($banner_title); ?></h3>
                    <p><?php echo wp_kses_post($banner_desc); ?></p>
                </div>
                <a href="<?php echo esc_url($banner_cta_url); ?>" class="ee-btn-primary" style="white-space:nowrap;flex-shrink:0;"><i class="ti ti-rocket"></i> <?php echo esc_html($banner_cta_text); ?></a>
            </div>

            <div class="ee-meta-bottom">
                <span><strong>Last Updated:</strong> <?php echo esc_html(get_the_modified_date()); ?></span>
                <?php $cats = get_the_category(); if (!empty($cats)) : ?>
                    <span><strong>Category:</strong> <?php echo esc_html($cats[0]->name); ?></span>
                <?php endif; ?>
                <span><strong>Author:</strong> <?php echo esc_html($author_name); ?></span>
            </div>
        </main>

        <aside class="ee-right-sidebar" aria-label="Sidebar">

            <div class="ee-sidebar-section">
                <h4><i class="ti ti-heart"></i> Follow Us</h4>
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
                <h4><i class="ti ti-package"></i> View Products</h4>
                <div class="ee-product-list">
                    <?php foreach ($sidebar_products as $p) : ?>
                        <a class="ee-product-pill" href="<?php echo esc_url($p['url']); ?>"><?php echo esc_html($p['title']); ?> <i class="ti ti-chevron-right"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php
            /* Featured Blogs — 3 most recent posts excluding the current. */
            $featured_q = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => array($pid),
                'no_found_rows'  => true,
            ));
            if ($featured_q->have_posts()) :
            ?>
            <div class="ee-sidebar-section">
                <h4><i class="ti ti-star"></i> Featured Blogs</h4>
                <div class="ee-featured-grid">
                    <?php while ($featured_q->have_posts()) : $featured_q->the_post();
                        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $cat   = get_the_category(); $cat_name = $cat ? $cat[0]->name : 'Blog';
                    ?>
                        <a class="ee-feat-card" href="<?php the_permalink(); ?>">
                            <div class="ee-feat-img">
                                <?php if ($thumb) : ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="">
                                <?php else : ?>
                                    <i class="ti ti-news"></i>
                                <?php endif; ?>
                            </div>
                            <div class="ee-feat-body">
                                <div class="ee-feat-tag"><?php echo esc_html($cat_name); ?></div>
                                <div class="ee-feat-title"><?php echo esc_html(get_the_title()); ?></div>
                                <div class="ee-feat-date"><?php echo esc_html(get_the_date()); ?></div>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="ee-subscribe-box">
                <h4>Join 20K+ Education Professionals</h4>
                <p>Get better business insights &amp; strategies weekly from ExtraaEdge.</p>
                <input class="ee-sub-input" type="email" placeholder="Your email address" aria-label="Subscribe email" id="ee-sub-email">
                <button class="ee-sub-btn" onclick="var v=document.getElementById('ee-sub-email').value.trim();if(/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)){this.innerText='Subscribed!';this.disabled=true;document.getElementById('ee-sub-email').value='';}">Subscribe</button>
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
</div>

<script>
(function(){
    /* Build TOC from H2/H3 inside .ee-blog-body */
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
    /* Reading progress + scroll-top + TOC active state */
    var bar = document.getElementById('ee-progress-bar');
    var sTop = document.getElementById('ee-scroll-top');
    var tocLinks = toc ? toc.querySelectorAll('a') : [];
    var sections = body ? body.querySelectorAll('h2[id], h3[id]') : [];
    function onScroll(){
        var h = document.documentElement;
        var max = h.scrollHeight - h.clientHeight;
        bar.style.width = max > 0 ? (h.scrollTop / max * 100) + '%' : '0%';
        if (sTop) sTop.classList.toggle('ee-show', h.scrollTop > 400);
        var cur = 'ee-intro';
        sections.forEach(function(s){ if (s.getBoundingClientRect().top < 220) cur = s.id; });
        tocLinks.forEach(function(l){ l.classList.toggle('ee-active', l.getAttribute('href') === '#' + cur); });
    }
    window.addEventListener('scroll', onScroll, { passive:true });
    onScroll();

    /* Smooth-scroll TOC */
    tocLinks.forEach(function(l){
        l.addEventListener('click', function(e){
            var t = document.querySelector(l.getAttribute('href'));
            if (t) { e.preventDefault(); t.scrollIntoView({ behavior:'smooth', block:'start' }); }
        });
    });
})();
</script>

<?php
endwhile;
get_footer();
