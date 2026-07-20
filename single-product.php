<?php
/**
 * Single Product Template — Higher Education CRM redesign (DYNAMIC)
 *
 * The redesigned look + feel is kept verbatim from the supplied brief
 * (hero, logos marquee, sticky TOC + content sections, testimonials,
 * AI demo, FAQ, sticky conversion bar). All copy / images / lists are
 * now sourced from the post's tabbed admin editor (post meta) so each
 * Product renders its own content. Sections whose meta is empty are
 * skipped entirely — no leftover "Higher Education CRM" defaults bleed
 * onto unrelated Product posts.
 *
 * Template Name: Product Landing Page
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

$pid = get_the_ID();

/* SEO */
$seo_title     = get_post_meta($pid, '_seo_title',       true) ?: get_the_title();
$seo_desc      = get_post_meta($pid, '_seo_description', true);
$seo_keywords  = get_post_meta($pid, '_seo_keywords',    true);
$og_image      = get_post_meta($pid, '_og_image',        true) ?: get_the_post_thumbnail_url($pid, 'full');
$canonical     = get_post_meta($pid, '_canonical_url',   true) ?: get_permalink();
$twitter_title = get_post_meta($pid, '_twitter_title',   true) ?: $seo_title;
$twitter_desc  = get_post_meta($pid, '_twitter_desc',    true) ?: $seo_desc;

/* Hero */
$hero_badge        = get_post_meta($pid, '_hero_badge',        true);
$hero_h1_before    = get_post_meta($pid, '_hero_h1_before',    true);
$hero_h1_highlight = get_post_meta($pid, '_hero_h1_highlight', true);
$hero_h1_after     = get_post_meta($pid, '_hero_h1_after',     true);
$hero_desc         = get_post_meta($pid, '_hero_description',  true);
$hero_proofs       = get_post_meta($pid, '_hero_proofs',       true) ?: array();
$stats             = get_post_meta($pid, '_stats',             true) ?: array();
$result_badge      = get_post_meta($pid, '_result_badge',      true);
$tags              = get_post_meta($pid, '_tags',              true) ?: array();
$hero_cta_text     = get_post_meta($pid, '_hero_cta_text',     true);
$hero_cta_url      = get_post_meta($pid, '_hero_cta_url',      true);
$hero_cta2_text    = get_post_meta($pid, '_hero_cta2_text',    true);
$hero_cta2_url     = get_post_meta($pid, '_hero_cta2_url',     true);
$trust_rating      = get_post_meta($pid, '_trust_rating',      true);
$trust_text        = get_post_meta($pid, '_trust_text',        true);
$compliance        = get_post_meta($pid, '_compliance',        true) ?: array();
$form_embed        = get_post_meta($pid, '_form_embed',        true);

/* Logos */
$logo_badge          = get_post_meta($pid, '_logo_badge',          true);
$logo_title_line1    = get_post_meta($pid, '_logo_title_line1',    true);
$logo_title          = get_post_meta($pid, '_logo_title',          true);
$logo_sub            = get_post_meta($pid, '_logo_sub',            true);
$logos               = function_exists('ee_get_client_logos') ? ee_get_client_logos($pid) : (get_post_meta($pid, '_logos', true) ?: array());
$logo_footer_cta     = get_post_meta($pid, '_logo_footer_cta',     true);
$logo_footer_cta_url = get_post_meta($pid, '_logo_footer_cta_url', true);
$logo_live_text      = get_post_meta($pid, '_logo_live_text',      true);

/* Overview section + sidebar flow */
$educrm_h2   = get_post_meta($pid, '_educrm_h2',   true);
$educrm_p1   = get_post_meta($pid, '_educrm_p1',   true);
$educrm_p2   = get_post_meta($pid, '_educrm_p2',   true);
$educrm_p3   = get_post_meta($pid, '_educrm_p3',   true);
$growth_val  = get_post_meta($pid, '_growth_val',  true);
$growth_text = get_post_meta($pid, '_growth_text', true);
$flow_steps  = get_post_meta($pid, '_flow_steps',  true) ?: array();

/* Features */
$features_h2 = get_post_meta($pid, '_features_h2', true);
$features    = get_post_meta($pid, '_features',    true) ?: array();

/* Alt-section repeater */
$sections = get_post_meta($pid, '_content_sections', true) ?: array();

/* Bottom CTA + products */
$bottom_label    = get_post_meta($pid, '_bottom_label',    true);
$bottom_h2       = get_post_meta($pid, '_bottom_h2',       true);
$bottom_h3       = get_post_meta($pid, '_bottom_h3',       true);
$bottom_cta_text = get_post_meta($pid, '_bottom_cta_text', true);
$bottom_cta_url  = get_post_meta($pid, '_bottom_cta_url',  true);
$products        = get_post_meta($pid, '_products',        true) ?: array();

/* Testimonials */
$testi_tagline = get_post_meta($pid, '_testi_tagline', true);
$testi_title   = get_post_meta($pid, '_testi_title',   true);
$testi_sub     = get_post_meta($pid, '_testi_sub',     true);
$metrics       = get_post_meta($pid, '_testi_metrics', true) ?: array();
$testimonials  = get_post_meta($pid, '_testimonials',  true) ?: array();

/* AI demo */
$aidemo_h2         = get_post_meta($pid, '_aidemo_h2',         true);
$aidemo_sub        = get_post_meta($pid, '_aidemo_sub',        true);
$aidemo_cta_text   = get_post_meta($pid, '_aidemo_cta_text',   true);
$aidemo_cta_url    = get_post_meta($pid, '_aidemo_cta_url',    true);
$aidemo_trust      = get_post_meta($pid, '_aidemo_trust',      true);
$aidemo_expert_img = get_post_meta($pid, '_aidemo_expert_img', true);
$workflow_nodes    = get_post_meta($pid, '_workflow_nodes',    true) ?: array();

/* FAQ */
$faq_badge    = get_post_meta($pid, '_faq_badge',    true);
$faq_title    = get_post_meta($pid, '_faq_title',    true);
$faq_subtitle = get_post_meta($pid, '_faq_subtitle', true);
$faqs         = get_post_meta($pid, '_faqs',         true) ?: array();

/* TOC — custom items or auto-derived from filled sections */
$toc_enabled = get_post_meta($pid, '_toc_enabled', true);
$toc_items   = get_post_meta($pid, '_toc_items',   true) ?: array();
$toc_final   = array();
if ($toc_enabled === 'custom' && !empty($toc_items)) {
    foreach ($toc_items as $item) {
        if (empty($item['anchor']) || empty($item['label']))     continue;
        if (isset($item['show']) && $item['show'] === '0')       continue;
        $toc_final[] = array('anchor' => $item['anchor'], 'label' => $item['label']);
    }
} else {
    $toc_final[] = array('anchor' => 'top', 'label' => 'Home');
    /* Global logo strip (ee_render_logo_marquee) renders unless hidden
       per-page; mirror that check so the TOC entry matches what's on screen. */
    $logos_visible = !function_exists('ee_should_hide_logos') || !ee_should_hide_logos();
    if ($logos_visible)                  $toc_final[] = array('anchor' => 'trusted-institutions',  'label' => 'Trusted Institutions');
    if ($educrm_h2)                      $toc_final[] = array('anchor' => 'what-is-education-crm', 'label' => 'Overview');
    if (!empty($features))               $toc_final[] = array('anchor' => 'features',              'label' => 'Features');
    if (!empty($sections)) {
        foreach ($sections as $s) {
            if (!empty($s['heading']) && !empty($s['id'])) {
                $toc_final[] = array('anchor' => $s['id'], 'label' => $s['heading']);
            }
        }
    }
    if ($bottom_h2 || !empty($products)) $toc_final[] = array('anchor' => 'products',     'label' => 'Products');
    if (!empty($testimonials))           $toc_final[] = array('anchor' => 'testimonials', 'label' => 'Testimonials');
    if ($aidemo_h2)                      $toc_final[] = array('anchor' => 'demo',         'label' => 'Book Demo');
    if (!empty($faqs))                   $toc_final[] = array('anchor' => 'faq',          'label' => 'FAQ');
}

/* SEO injection */
add_action('wp_head', function () use ($pid, $seo_title, $seo_desc, $seo_keywords, $og_image, $canonical, $twitter_title, $twitter_desc, $faqs) {
    if (!is_singular('product')) return;
    ?>
    <?php if ($seo_desc):     ?><meta name="description"      content="<?php echo esc_attr($seo_desc); ?>"><?php endif; ?>
    <?php if ($seo_keywords): ?><meta name="keywords"         content="<?php echo esc_attr($seo_keywords); ?>"><?php endif; ?>
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <meta property="og:type"      content="product">
    <meta property="og:title"     content="<?php echo esc_attr($seo_title); ?>">
    <?php if ($seo_desc): ?><meta property="og:description" content="<?php echo esc_attr($seo_desc); ?>"><?php endif; ?>
    <meta property="og:url"       content="<?php echo esc_url($canonical); ?>">
    <?php if ($og_image): ?><meta property="og:image" content="<?php echo esc_url($og_image); ?>"><?php endif; ?>
    <meta property="og:site_name" content="ExtraaEdge">
    <meta property="og:locale"    content="en_IN">
    <meta name="twitter:card"     content="summary_large_image">
    <meta name="twitter:title"    content="<?php echo esc_attr($twitter_title); ?>">
    <?php if ($twitter_desc): ?><meta name="twitter:description" content="<?php echo esc_attr($twitter_desc); ?>"><?php endif; ?>
    <?php if ($og_image): ?><meta name="twitter:image" content="<?php echo esc_url($og_image); ?>"><?php endif; ?>
    <?php
    $sw = array(
        '@context'           => 'https://schema.org',
        '@type'              => 'SoftwareApplication',
        'name'               => $seo_title,
        'url'                => $canonical,
        'applicationCategory'=> 'BusinessApplication',
        'operatingSystem'    => 'Web, Android, iOS',
    );
    if ($seo_desc) $sw['description'] = $seo_desc;
    if ($og_image) $sw['image']       = $og_image;
    $sw['provider'] = array('@type' => 'Organization', 'name' => 'ExtraaEdge', 'url' => 'https://www.extraaedge.com');
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($sw, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    /* BreadcrumbList — helps Google / AI answer-engines understand the page
       hierarchy (Home › Products › This product). */
    $crumb = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => home_url('/')),
            array('@type' => 'ListItem', 'position' => 2, 'name' => 'Products', 'item' => home_url('/products/')),
            array('@type' => 'ListItem', 'position' => 3, 'name' => wp_strip_all_tags(get_the_title($pid)), 'item' => $canonical),
        ),
    );
    echo "<script type=\"application/ld+json\">" . wp_json_encode($crumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    if (!empty($faqs)) {
        $faq_items = array();
        foreach ($faqs as $f) {
            if (empty($f['question']) || empty($f['answer'])) continue;
            $faq_items[] = array(
                '@type'          => 'Question',
                'name'           => wp_strip_all_tags($f['question']),
                'acceptedAnswer' => array('@type' => 'Answer', 'text' => wp_strip_all_tags($f['answer'])),
            );
        }
        if (!empty($faq_items)) {
            $faq_schema = array('@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faq_items);
            echo "<script type=\"application/ld+json\">" . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
        }
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php
});

get_header();
?>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--orange:#DE6E30;--orange-l:#E8843F;--orange-deep:#C2541C;--orange-50:#FDF3EC;--orange-100:#F9E4D5;--blue:#19335D;--blue-l:#264a85;--blue-deep:#0E1F39;--blue-50:#EEF1F7;--blue-100:#DCE3EE;--white:#fff;--ink:#19335D;--ink-soft:#4B5871;--ink-mute:#8A93A6;--line:#EDF0F5;--line-2:#E0E5EC;--panel:#FAFBFC;--grad-o:linear-gradient(135deg,#E8843F 0%,#DE6E30 55%,#C2541C 100%);--grad-b:linear-gradient(160deg,#234680 0%,#19335D 55%,#0E1F39 100%);--sh-1:0 1px 2px rgba(25,51,93,.05),0 4px 14px rgba(25,51,93,.05);--sh-2:0 14px 38px -12px rgba(25,51,93,.16);--sh-3:0 30px 70px -20px rgba(25,51,93,.26);--sh-o:0 18px 44px -14px rgba(222,110,48,.55);--r-s:12px;--r:18px;--r-l:26px;--r-pill:999px;--font:'Inter',system-ui,-apple-system,sans-serif;--ease:cubic-bezier(.22,1,.36,1);--t:.5s var(--ease);--toc-w:240px;--maxw:1240px}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body.ee-product-page{font-family:var(--font);color:var(--ink);background:var(--white);line-height:1.65;overflow-x:hidden;-webkit-font-smoothing:antialiased;font-size:16px;font-feature-settings:"cv11","ss01";letter-spacing:-.005em}
body.ee-product-page img{max-width:100%;height:auto;display:block}
body.ee-product-page a{text-decoration:none;color:inherit}
body.ee-product-page ::selection{background:var(--orange);color:#fff}
body.ee-product-page strong{font-weight:700;color:var(--ink)}
.wrap{max-width:var(--maxw);margin:0 auto;padding:0 32px}
.kicker{display:inline-flex;align-items:center;gap:11px;margin-bottom:22px;padding:7px 15px 7px 12px;background:var(--orange-50);border:1px solid var(--orange-100);border-radius:var(--r-pill)}
.kicker .lbl{font-weight:700;font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-deep)}
.kicker .ln{display:none}
.kicker.center{margin-left:auto;margin-right:auto}
.uacc{color:var(--orange)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;font-weight:700;font-size:15px;padding:15px 30px;border-radius:var(--r-pill);cursor:pointer;border:1.5px solid transparent;transition:var(--t);white-space:nowrap;letter-spacing:-.01em}
.btn svg{width:16px;height:16px;transition:var(--t)}
.btn-primary{background:var(--grad-o);color:#fff;box-shadow:var(--sh-o)}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 24px 54px -14px rgba(222,110,48,.62)}
.btn-primary:hover svg{transform:translateX(3px)}
.btn-outline{background:#fff;color:var(--blue);border-color:var(--line-2);box-shadow:var(--sh-1)}
.btn-outline:hover{border-color:var(--blue);transform:translateY(-3px);box-shadow:var(--sh-2)}
.btn-lg{padding:18px 38px;font-size:16px}
.pulse-dot{width:8px;height:8px;background:var(--orange);position:relative;flex-shrink:0;border-radius:50%}
.pulse-dot::after{content:'';position:absolute;inset:0;border-radius:50%;background:var(--orange);animation:ring 2.4s var(--ease) infinite}
.green-dot{width:8px;height:8px;background:#16A34A;position:relative;flex-shrink:0;border-radius:50%}
.green-dot::after{content:'';position:absolute;inset:0;border-radius:50%;background:#16A34A;animation:ring 2.4s var(--ease) infinite}
@keyframes ring{0%{transform:scale(1);opacity:.65}100%{transform:scale(3.4);opacity:0}}
.reveal{opacity:0;transform:translateY(26px);transition:opacity .8s var(--ease),transform .8s var(--ease)}
.reveal.visible{opacity:1;transform:none}
.hero{position:relative;background:var(--white);overflow:hidden}
.hero-grid-bg{position:absolute;inset:0;z-index:0;pointer-events:none;background:radial-gradient(50% 50% at 82% 18%,rgba(222,110,48,.14),transparent 70%),radial-gradient(46% 46% at 12% 86%,rgba(25,51,93,.10),transparent 72%),radial-gradient(rgba(25,51,93,.06) 1.2px,transparent 1.2px);background-size:auto,auto,26px 26px;-webkit-mask-image:radial-gradient(110% 95% at 70% 25%,#000 35%,transparent 82%);mask-image:radial-gradient(110% 95% at 70% 25%,#000 35%,transparent 82%)}
.hero-layout{display:grid;grid-template-columns:1.05fr .95fr;gap:64px;align-items:center;padding:40px 0 50px;position:relative;z-index:2}
.hero-left{display:flex;flex-direction:column;justify-content:center}
.hero-right{display:flex;align-items:center}
.hero-badge{display:inline-flex;align-items:center;gap:10px;background:#fff;color:var(--blue);font-weight:600;font-size:12.5px;padding:9px 18px;border-radius:var(--r-pill);margin-bottom:26px;align-self:flex-start;border:1px solid var(--line-2);box-shadow:var(--sh-1)}
.hero-h1{font-weight:800;font-size:clamp(40px,4.9vw,66px);letter-spacing:-.04em;line-height:1.03;margin-bottom:22px;color:var(--blue)}
.hero-h1 .uacc{position:relative;background:var(--grad-o);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
.hero-desc{max-width:540px;color:var(--ink-soft);font-size:clamp(15.5px,1.3vw,18px);line-height:1.72;margin-bottom:28px}
.proof{display:grid;gap:10px;margin-bottom:30px}
.proof li{list-style:none;display:flex;align-items:center;gap:11px;font-weight:600;font-size:14.5px;color:var(--ink-soft)}
.proof svg{width:18px;height:18px;color:var(--orange);flex-shrink:0}
.stat-strip{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:30px}
.stat-cell{background:#fff;border:1px solid var(--line);border-radius:var(--r);padding:22px 14px;text-align:center;box-shadow:var(--sh-1);transition:var(--t);position:relative;overflow:hidden}
.stat-cell::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--grad-o);transform:scaleX(0);transform-origin:left;transition:var(--t)}
.stat-cell:hover{transform:translateY(-5px);box-shadow:var(--sh-2)}
.stat-cell:hover::before{transform:scaleX(1)}
.stat-num{display:block;font-weight:800;font-size:clamp(28px,3vw,38px);color:var(--orange);letter-spacing:-.03em;line-height:1}
.stat-lab{display:block;margin-top:8px;font-weight:700;font-size:10px;letter-spacing:.06em;text-transform:uppercase;color:var(--ink-mute)}
.result-strip{display:inline-flex;align-items:center;gap:10px;background:var(--grad-b);color:#fff;padding:12px 22px;border-radius:var(--r-pill);font-weight:600;font-size:13px;margin-bottom:26px;box-shadow:var(--sh-2)}
.tag-row{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:30px}
.tag{background:var(--panel);border:1px solid var(--line);color:var(--ink-soft);font-weight:700;font-size:10.5px;letter-spacing:.04em;text-transform:uppercase;padding:7px 13px;border-radius:var(--r-pill);transition:var(--t)}
.tag:hover{background:var(--orange-50);border-color:var(--orange-100);color:var(--orange-deep)}
.cta-row{display:flex;gap:13px;flex-wrap:wrap;margin-bottom:34px}
.trust-bar{border-top:1px solid var(--line);padding-top:26px}
.trust-rating{font-weight:700;font-size:14px;color:var(--ink);margin-bottom:16px;display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.trust-rating .stars{color:var(--orange);letter-spacing:2px}
.trust-rating span{font-weight:500;font-size:12px;color:var(--ink-mute)}
.compliance-row{display:flex;gap:24px;flex-wrap:wrap;align-items:center}
.compliance-item{display:flex;align-items:center;gap:9px;font-weight:700;font-size:11.5px;color:var(--ink-mute)}
.compliance-item img{height:25px;width:auto;object-fit:contain}
.hero-form-aside{width:100%}
.hero-form-card{position:relative;background:#fff;border:1px solid var(--line);border-radius:var(--r-l);padding:clamp(26px,3vw,42px);box-shadow:var(--sh-3)}
.hero-form-card::after{content:'';position:absolute;inset:-1px;border-radius:inherit;padding:1px;pointer-events:none;background:linear-gradient(140deg,rgba(222,110,48,.5),transparent 40%,transparent 60%,rgba(25,51,93,.4));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.55}
.hero-form-card::before{content:"Book Demo Now";position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--grad-o);color:#fff;padding:7px 20px;border-radius:var(--r-pill);font-weight:700;font-size:11px;letter-spacing:.04em;white-space:nowrap;box-shadow:var(--sh-o)}
.secure-label{text-align:center;margin-top:18px;font-size:10.5px;color:var(--ink-mute);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
.logos{background:var(--white);padding:clamp(56px,7vw,86px) 0;overflow:hidden;border-top:1px solid var(--line)}
.logos-head{text-align:center;max-width:700px;margin:0 auto 44px;padding:0 24px}
.logos-kicker{font-weight:600;color:var(--ink-soft);font-size:14.5px;margin-bottom:10px}
.logos-title{font-weight:800;font-size:clamp(26px,3.4vw,42px);letter-spacing:-.04em;line-height:1.08;margin-bottom:14px;color:var(--blue)}
.logos-sub{color:var(--ink-soft);font-size:16px}
.marquee-wrap{position:relative;padding:8px 0}
.marquee-wrap::before,.marquee-wrap::after{display:none}
.marquee-track{display:flex;gap:20px;width:max-content;padding:10px 0}
.marquee-left{animation:scrollL 48s linear infinite}
.marquee-right{animation:scrollR 48s linear infinite}
@keyframes scrollL{from{transform:translateX(0)}to{transform:translateX(calc(-50% - 10px))}}
@keyframes scrollR{from{transform:translateX(calc(-50% - 10px))}to{transform:translateX(0)}}
.marquee-wrap:hover .marquee-left,.marquee-wrap:hover .marquee-right{animation-play-state:paused}
.logo-card{width:172px;height:88px;background:#fff;border:1px solid var(--line);border-radius:var(--r);display:flex;align-items:center;justify-content:center;padding:18px;flex-shrink:0;transition:var(--t);box-shadow:var(--sh-1)}
.logo-card:hover{transform:translateY(-5px);box-shadow:var(--sh-2)}
.logo-card img{max-width:100%;max-height:100%;object-fit:contain;filter:grayscale(1);opacity:.55;transition:var(--t)}
.logo-card:hover img{filter:none;opacity:1}
.logos-foot{margin-top:38px;display:flex;flex-direction:column;align-items:center;gap:16px}
.live-indicator{display:flex;align-items:center;gap:10px;font-weight:600;font-size:13px;color:var(--ink-soft)}
.toc-zone-wrapper{display:grid;grid-template-columns:var(--toc-w) 1fr;align-items:start;max-width:var(--maxw);margin:0 auto;padding:0 32px;position:relative}
.toc-column{position:sticky;top:110px;align-self:start;padding:8px 20px 8px 0;max-height:calc(100vh - 130px);overflow-y:auto;overflow-x:hidden;scrollbar-width:thin;scrollbar-color:var(--orange) transparent;z-index:50}
.toc-column::-webkit-scrollbar{width:3px}
.toc-column::-webkit-scrollbar-thumb{background:var(--orange);border-radius:9px}
.toc-content-column{min-width:0;width:100%}
.toc-content-column>section{padding-left:44px}
.toc-wrapper{background:#fff;border:1px solid var(--line);border-radius:var(--r-l);padding:18px 14px;position:relative;overflow:hidden;box-shadow:var(--sh-2)}
.toc-progress{position:absolute;top:0;left:0;width:3px;height:0;background:var(--grad-o);transition:height .3s ease-out}
.toc-header{display:flex;align-items:center;gap:10px;margin-bottom:14px;padding-bottom:13px;border-bottom:1px solid var(--line)}
.toc-icon{width:28px;height:28px;background:var(--grad-o);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:var(--sh-o)}
.toc-icon svg{width:13px;height:13px;fill:#fff}
.toc-title{font-size:10.5px;font-weight:800;color:var(--blue);letter-spacing:.16em;text-transform:uppercase}
.toc-list{list-style:none;display:flex;flex-direction:column;gap:1px}
.toc-item{position:relative}
.toc-link{display:flex;align-items:center;gap:10px;padding:7px 11px;font-weight:600;font-size:12.5px;color:var(--ink-soft);border-radius:10px;transition:all .25s var(--ease);position:relative;line-height:1.3}
.toc-num{font-weight:800;font-size:10px;color:var(--ink-mute);font-variant-numeric:tabular-nums;flex-shrink:0;width:18px;transition:.25s}
.toc-link:hover{color:var(--blue);background:var(--orange-50)}
.toc-link:hover .toc-num{color:var(--orange)}
.toc-link.active{color:var(--orange-deep);background:var(--orange-50);font-weight:800}
.toc-link.active .toc-num{color:var(--orange)}
.toc-mobile-toggle{display:none;position:fixed;bottom:96px;left:18px;width:54px;height:54px;background:var(--grad-o);border-radius:50%;border:none;cursor:pointer;box-shadow:var(--sh-o);z-index:1000;transition:var(--t);align-items:center;justify-content:center}
.toc-mobile-toggle:hover{transform:scale(1.08)}
.toc-mobile-toggle svg{width:23px;height:23px;fill:#fff}
.toc-mobile-overlay{display:none;position:fixed;inset:0;background:rgba(14,31,57,.5);backdrop-filter:blur(4px);z-index:999;opacity:0;transition:opacity .3s ease}
.toc-mobile-overlay.active{opacity:1}
.toc-mobile-panel{display:none;position:fixed;top:0;right:-100%;width:86%;max-width:330px;height:100%;background:#fff;z-index:1001;overflow-y:auto;transition:right .42s var(--ease);padding:24px 20px;box-shadow:var(--sh-3)}
.toc-mobile-panel.active{right:0}
.toc-mobile-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:14px;border-bottom:1px solid var(--line)}
.toc-mobile-title{font-weight:800;font-size:19px;letter-spacing:-.02em;color:var(--blue)}
.toc-mobile-close{width:34px;height:34px;background:var(--panel);border:1px solid var(--line);border-radius:10px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:var(--t)}
.toc-mobile-close:hover{background:var(--orange-50)}
.toc-mobile-close svg{width:17px;height:17px;stroke:var(--blue)}
.section{padding:40px 0}
.section-b{border-bottom:1px solid var(--line)}
.what-layout{display:grid;grid-template-columns:1.12fr .88fr;gap:58px;align-items:start}
.what-h2{font-weight:800;font-size:clamp(28px,3.6vw,46px);letter-spacing:-.04em;line-height:1.06;margin-bottom:24px;color:var(--blue)}
.what-p{color:var(--ink-soft);font-size:16px;line-height:1.8;margin-bottom:16px}
.growth-card{background:var(--grad-b);color:#fff;padding:30px;border-radius:var(--r-l);margin-top:30px;display:flex;align-items:center;gap:22px;position:relative;overflow:hidden;box-shadow:var(--sh-3)}
.growth-card::after{content:'';position:absolute;top:-40%;right:-6%;width:230px;height:230px;background:radial-gradient(circle,rgba(222,110,48,.35),transparent 68%);border-radius:50%}
.growth-val{font-weight:800;font-size:clamp(38px,5vw,54px);color:var(--orange-l);letter-spacing:-.04em;line-height:1;flex-shrink:0;position:relative}
.growth-text{font-size:13px;line-height:1.62;opacity:.92;position:relative}
.growth-text strong{color:#fff}
.flow-panel{position:sticky;top:28px;background:#fff;border:1px solid var(--line);border-radius:var(--r-l);padding:28px;box-shadow:var(--sh-2)}
.flow-live{display:flex;align-items:center;gap:9px;font-weight:800;font-size:10.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--orange-deep);margin-bottom:22px}
.flow-steps{display:flex;flex-direction:column;gap:11px}
.flow-step{background:var(--panel);padding:15px 16px;border-radius:var(--r);display:flex;align-items:center;gap:14px;transition:all .45s var(--ease);border:1px solid var(--line);opacity:.55;cursor:pointer}
.flow-step.active{opacity:1;transform:translateX(10px);border-color:var(--orange-100);background:#fff;box-shadow:var(--sh-2)}
.step-icon{width:40px;height:40px;background:#fff;border:1px solid var(--line);border-radius:12px;display:flex;align-items:center;justify-content:center;color:var(--blue);flex-shrink:0;transition:.3s}
.step-icon svg{width:18px;height:18px}
.flow-step.active .step-icon{background:var(--grad-o);border-color:transparent;color:#fff}
.step-label{font-weight:700;font-size:13.5px;color:var(--blue)}
.data-log{margin-top:22px;background:var(--blue-deep);border-radius:var(--r);padding:14px;font-size:11px;color:#5EEAD4;height:84px;overflow:hidden;font-weight:500;letter-spacing:.02em}
.log-line{margin-bottom:5px;white-space:nowrap;opacity:.92}
.log-line::before{content:'>';color:#52617d}
.features-head{text-align:center;max-width:640px;margin:0 auto 24px}
.features-h2{font-weight:800;font-size:clamp(26px,3.4vw,42px);letter-spacing:-.04em;line-height:1.08;color:var(--blue)}
.features-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:18px}
.feat-card{background:#fff;border:1px solid var(--line);border-radius:var(--r-l);padding:18px;display:flex;flex-direction:column;text-align:center;transition:var(--t);box-shadow:var(--sh-1)}
.feat-card:hover{transform:translateY(-8px);box-shadow:var(--sh-3)}
/* Feature images sit flat — no tile behind the image, no hover zoom. */
.feat-img-wrap{width:100%;height:112px;background:transparent;border:0;margin-bottom:15px;display:flex;align-items:center;justify-content:center}
.feat-img{max-width:88%;max-height:88%;object-fit:contain}
.feat-title{font-weight:700;font-size:13px;color:var(--blue);display:flex;flex-direction:column;align-items:center;gap:8px;line-height:1.35;transition:.3s}
.feat-card:hover .feat-title{color:var(--orange-deep)}
.feat-dot{width:6px;height:6px;background:var(--orange);border-radius:50%}
.alt-section{padding:40px 0;overflow:hidden}
.alt-section:nth-of-type(even){background:var(--panel)}
.alt-layout{display:flex;align-items:center;gap:48px;flex-wrap:wrap}
.alt-content{flex:1;min-width:300px}
.alt-visual{flex:1.1;min-width:300px;position:relative}
.alt-h2{font-weight:800;font-size:clamp(26px,3.5vw,40px);letter-spacing:-.04em;line-height:1.1;margin-bottom:16px;color:var(--blue)}
.alt-desc{color:var(--ink-soft);font-size:16px;line-height:1.8;margin-bottom:24px}
.alt-h3{font-weight:800;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-deep);margin-bottom:16px}
.feature-list{list-style:none;display:flex;flex-direction:column;gap:10px;margin-bottom:30px}
.feature-item{display:flex;align-items:flex-start;gap:13px;background:#fff;padding:15px 17px;border-radius:var(--r);border:1px solid var(--line);transition:var(--t);box-shadow:var(--sh-1)}
.feature-item:hover{transform:translateX(6px);box-shadow:var(--sh-2);border-color:var(--orange-100)}
.feature-icon{width:24px;height:24px;background:var(--grad-o);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;box-shadow:0 6px 14px -6px rgba(222,110,48,.7)}
.feature-icon svg{width:13px;height:13px;fill:#fff}
.feature-text{font-size:14.5px;font-weight:500;color:var(--ink-soft);line-height:1.55}
/* Section images sit flat on the background — no floating shadow or motion. */
.alt-img{width:100%;height:auto;border-radius:20px;display:block}
.alt-frame{position:relative}
.float-anim{position:relative}
.products-inner{display:flex;align-items:center;gap:58px;flex-wrap:wrap}
.products-content{flex:1;min-width:300px}
.products-h2{font-weight:800;font-size:clamp(28px,3.7vw,46px);letter-spacing:-.04em;line-height:1.08;margin-bottom:18px;color:var(--blue)}
.products-sub{color:var(--ink-soft);font-size:16.5px;line-height:1.68;margin-bottom:30px;max-width:500px}
.products-card{flex:1;min-width:340px;background:#fff;border:1px solid var(--line);padding:30px;border-radius:var(--r-l);box-shadow:var(--sh-3)}
.featured-label{font-size:10.5px;font-weight:800;color:var(--ink-mute);letter-spacing:.16em;margin-bottom:20px;text-align:center;text-transform:uppercase}
.product-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
.product-item{background:var(--panel);padding:20px;border:1px solid var(--line);border-radius:var(--r);display:flex;flex-direction:column;transition:var(--t)}
.product-item:hover{background:#fff;transform:translateY(-5px);box-shadow:var(--sh-2);border-color:var(--orange-100)}
.product-logo{width:42px;height:42px;margin-bottom:13px}
.product-logo img{width:100%;height:100%;object-fit:contain}
.product-item h4{font-weight:800;font-size:14px;color:var(--blue);margin-bottom:6px}
.product-view-link{font-size:12px;color:var(--orange-deep);font-weight:700}
.testimonials-section{padding:40px 0;background:var(--grad-b);position:relative;overflow:hidden;color:#fff}
.testi-mesh{position:absolute;inset:0;pointer-events:none;z-index:1;overflow:hidden}
.testi-pulse-line{position:absolute;background:linear-gradient(90deg,transparent,rgba(222,110,48,.3),transparent);height:1px;width:200%;opacity:0;left:-50%}
.testi-section-active .testi-pulse-line{opacity:1;animation:testiLine 6s infinite linear}
@keyframes testiLine{from{transform:translateX(-25%)}to{transform:translateX(25%)}}
.testi-inner{position:relative;z-index:10}
.testi-header{text-align:center;margin-bottom:28px;opacity:0;transform:translateY(26px);transition:all .7s var(--ease)}
.testi-section-active .testi-header{opacity:1;transform:none}
.testi-header .kicker{background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.16)}
.testi-header .kicker .lbl{color:#fff}
.testi-title{font-weight:800;font-size:clamp(28px,4.3vw,52px);letter-spacing:-.04em;line-height:1.06;margin-bottom:16px}
.testi-title .uacc{-webkit-text-fill-color:initial;background:none;color:var(--orange-l)}
.testi-sub{color:rgba(255,255,255,.74);font-size:16px;max-width:600px;margin:0 auto}
.testi-sub strong{color:#fff}
.testi-metrics{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:28px}
.testi-metric{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);border-radius:var(--r-l);padding:30px 18px;text-align:center;transition:var(--t);opacity:0;transform:scale(.94);backdrop-filter:blur(6px)}
.testi-section-active .testi-metric{opacity:1;transform:none}
.testi-metric:hover{background:rgba(255,255,255,.1);transform:translateY(-6px)}
.testi-metric-val{display:block;font-weight:800;font-size:clamp(32px,4vw,46px);color:var(--orange-l);letter-spacing:-.04em;line-height:1;margin-bottom:6px}
.testi-metric-lab{font-weight:700;font-size:10px;color:rgba(255,255,255,.62);text-transform:uppercase;letter-spacing:.1em}
.testi-cards{display:grid;grid-template-columns:repeat(3,1fr);gap:26px}
.testi-card{background:#fff;color:var(--blue);border-radius:var(--r-l);overflow:hidden;display:flex;flex-direction:column;transition:var(--t);opacity:0;transform:translateY(32px);box-shadow:var(--sh-3)}
.testi-section-active .testi-card{opacity:1;transform:none}
.testi-card:hover{transform:translateY(-10px)}
.vid-wrap{width:100%;aspect-ratio:16/9;background:#000;position:relative;cursor:pointer;overflow:hidden}
.vid-thumb{position:absolute;inset:0;z-index:10;transition:opacity .5s ease}
.vid-thumb-img{width:100%;height:100%;object-fit:cover;transition:transform 1s ease}
.testi-card:hover .vid-thumb-img{transform:scale(1.06)}
.vid-play{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:64px;height:64px;background:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 12px 30px rgba(0,0,0,.32);transition:var(--t)}
.vid-play::after{content:'';border-left:18px solid var(--orange);border-top:11px solid transparent;border-bottom:11px solid transparent;margin-left:5px}
.testi-card:hover .vid-play{background:var(--grad-o)}
.testi-card:hover .vid-play::after{border-left-color:#fff}
.vid-wrap.playing .vid-thumb{opacity:0;pointer-events:none}
.vid-slot{height:100%}
.card-body{padding:30px;flex-grow:1;display:flex;flex-direction:column}
.card-quote{font-size:14.5px;line-height:1.72;color:var(--ink-soft);margin-bottom:24px;font-style:italic}
.card-profile{margin-top:auto;display:flex;align-items:center;gap:14px;padding-top:20px;border-top:1px solid var(--line)}
.card-avatar{width:56px;height:56px;border-radius:14px;object-fit:cover;border:2px solid var(--orange-100);transition:var(--t);flex-shrink:0}
.testi-card:hover .card-avatar{border-color:var(--orange);border-radius:50%}
.card-name{font-weight:800;font-size:15.5px;margin-bottom:3px;color:var(--blue)}
.card-role{font-size:11.5px;font-weight:700;color:var(--orange-deep);margin-bottom:2px}
.card-inst{font-size:10.5px;color:var(--ink-mute);font-weight:700;text-transform:uppercase;letter-spacing:.04em}
.ai-demo-section{padding:40px 0;background:#fff;overflow:hidden}
.ai-demo-inner{display:grid;grid-template-columns:1fr 1fr;gap:58px;align-items:center}
.ai-cta-content{position:relative;z-index:10}
.ai-cta-h2{font-weight:800;font-size:clamp(28px,3.9vw,48px);letter-spacing:-.04em;line-height:1.08;margin-bottom:18px;color:var(--blue)}
.ai-cta-sub{color:var(--ink-soft);font-size:clamp(15.5px,1.5vw,18px);line-height:1.68;margin-bottom:32px;max-width:520px}
.ai-cta-actions{display:flex;flex-direction:column;gap:16px;align-items:flex-start}
.ai-trust{display:flex;align-items:center;gap:10px;font-weight:600;font-size:13px;color:var(--ink-soft)}
.ai-trust svg{width:19px;height:19px;flex-shrink:0}
.ai-story-engine{position:relative;height:540px;display:flex;justify-content:center;align-items:center}
.expert-center{position:relative;width:228px;height:228px;z-index:5}
.expert-center img{width:100%;height:100%;object-fit:cover;border-radius:50%;border:7px solid #fff;box-shadow:var(--sh-3)}
.expert-ring{position:absolute;inset:-16px;border:1.5px dashed var(--orange);border-radius:50%;opacity:.45;animation:spin 30s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.workflow-svg{position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:2}
.conn-path{fill:none;stroke:var(--orange);stroke-width:2.5;stroke-dasharray:7 7;opacity:0;transition:opacity .5s ease}
.workflow-node{position:absolute;background:#fff;border:1px solid var(--line);border-radius:var(--r);padding:12px 15px;display:flex;align-items:center;gap:11px;z-index:10;width:224px;opacity:.4;transform:scale(.88);transition:var(--t);cursor:pointer;box-shadow:var(--sh-1)}
.workflow-node.wn-active{opacity:1;border-color:var(--orange-100);box-shadow:var(--sh-3);z-index:100;transform:scale(1)}
.wn-num{width:36px;height:36px;background:var(--grad-b);border-radius:11px;display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0;font-weight:800;font-size:15px;transition:var(--t)}
.workflow-node.wn-active .wn-num{background:var(--grad-o)}
.wn-title{font-weight:800;font-size:12.5px;color:var(--blue);margin:0}
.wn-sub{font-size:10.5px;color:var(--ink-mute);margin:0}
.wn-1{top:1%;left:50%;transform:translateX(-50%)}
.wn-2{top:18%;right:-4%}
.wn-3{bottom:18%;right:-4%}
.wn-4{bottom:1%;left:50%;transform:translateX(-50%)}
.wn-5{bottom:18%;left:-4%}
.wn-6{top:18%;left:-4%}
.faq-section{padding:40px 0;background:var(--panel)}
.faq-container{max-width:900px;margin:0 auto;padding:0 32px}
.faq-header{text-align:center;margin-bottom:24px}
.faq-title{font-weight:800;font-size:clamp(26px,3.9vw,44px);letter-spacing:-.04em;line-height:1.08;margin-bottom:14px;color:var(--blue)}
.faq-subtitle{color:var(--ink-soft);font-size:16.5px;max-width:600px;margin:0 auto}
.faq-list{display:flex;flex-direction:column;gap:13px}
.faq-item{background:#fff;border:1px solid var(--line);border-radius:var(--r);overflow:hidden;transition:var(--t);box-shadow:var(--sh-1)}
.faq-item:hover{box-shadow:var(--sh-2)}
.faq-item.faq-open{border-color:var(--orange-100);box-shadow:var(--sh-2)}
.faq-trigger{width:100%;display:flex;align-items:center;justify-content:space-between;padding:22px 26px;background:none;border:none;cursor:pointer;text-align:left}
.faq-q{font-weight:700;font-size:16.5px;color:var(--blue);padding-right:18px;line-height:1.4;display:flex;gap:14px;align-items:baseline}
.faq-q .qn{font-weight:800;font-size:12px;color:var(--orange);flex-shrink:0;font-variant-numeric:tabular-nums}
.faq-item.faq-open .faq-q{color:var(--orange-deep)}
.faq-icon{width:20px;height:20px;position:relative;flex-shrink:0}
.faq-icon::before,.faq-icon::after{content:'';position:absolute;background:var(--ink-mute);transition:.3s ease}
.faq-icon::before{width:100%;height:2px;top:9px;left:0}
.faq-icon::after{width:2px;height:100%;left:9px;top:0}
.faq-item.faq-open .faq-icon::after{transform:rotate(90deg);opacity:0}
.faq-item.faq-open .faq-icon::before{background:var(--orange)}
.faq-body{max-height:0;overflow:hidden;transition:max-height .5s cubic-bezier(.4,0,.2,1)}
.faq-inner{padding:0 26px 24px 40px}
.faq-inner p{font-size:15px;color:var(--ink-soft);line-height:1.74;margin-bottom:12px}
.faq-inner p:last-child{margin-bottom:0}
.faq-inner ul{margin:12px 0;padding-left:18px}
.faq-inner ul li{font-size:15px;color:var(--ink-soft);margin-bottom:9px;line-height:1.7;list-style:none;position:relative;padding-left:18px}
.faq-inner ul li::before{content:'';position:absolute;left:0;top:.62em;width:7px;height:7px;background:var(--orange);border-radius:50%}
.cbar{position:fixed;left:0;right:0;bottom:0;z-index:980;transform:translateY(140%);transition:transform .55s var(--ease);padding:0 16px 16px}
.cbar.show{transform:none}
.cbar-inner{max-width:var(--maxw);margin:0 auto;background:rgba(255,255,255,.86);backdrop-filter:blur(16px) saturate(160%);border:1px solid var(--line-2);border-radius:var(--r-l);box-shadow:var(--sh-3);display:flex;align-items:center;gap:20px;padding:14px 16px 14px 24px;margin-bottom:env(safe-area-inset-bottom,0px)}
.cbar-tag{width:46px;height:46px;border-radius:13px;background:var(--grad-o);display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:var(--sh-o)}
.cbar-tag svg{width:22px;height:22px;fill:#fff}
.cbar-txt{flex:1;min-width:0}
.cbar-txt b{display:block;font-weight:800;font-size:15px;color:var(--blue);letter-spacing:-.02em}
.cbar-txt span{font-size:12.5px;color:var(--ink-mute);font-weight:500}
.cbar-rating{display:flex;align-items:center;gap:7px;font-weight:700;font-size:12.5px;color:var(--blue);white-space:nowrap}
.cbar-rating .s{color:var(--orange);letter-spacing:1px}
.cbar .btn{flex-shrink:0}
.cbar-close{width:34px;height:34px;border-radius:50%;border:1px solid var(--line-2);background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:var(--t)}
.cbar-close:hover{background:var(--panel)}
.cbar-close svg{width:15px;height:15px;stroke:var(--ink-soft)}
@media(min-width:1600px){:root{--maxw:1340px}}
@media(max-width:1200px){.toc-zone-wrapper{display:block;padding:0}.toc-column{display:none}.toc-content-column>section{padding-left:0}.toc-mobile-toggle{display:flex}.toc-mobile-overlay,.toc-mobile-panel{display:block}}
@media(max-width:1080px){.hero-layout{grid-template-columns:1fr;gap:48px;padding:30px 0 40px}.hero-right{justify-content:center}.hero-form-aside{max-width:540px;margin:0 auto}.hero-badge{align-self:center}.what-layout{grid-template-columns:1fr;gap:38px}.flow-panel{position:relative;top:0}.features-grid{grid-template-columns:repeat(3,1fr)}.ai-demo-inner{grid-template-columns:1fr;gap:38px}.ai-story-engine{transform:scale(.86)}.ai-cta-content{text-align:center}.ai-cta-content .kicker,.ai-cta-actions{justify-content:center;align-items:center}.ai-cta-sub{margin-left:auto;margin-right:auto}.testi-metrics{grid-template-columns:repeat(2,1fr)}.cbar-rating{display:none}}
@media(max-width:980px){.hero-left{align-items:center;text-align:center}.hero-desc,.proof,.cta-row{margin-left:auto;margin-right:auto}.proof{display:inline-grid;text-align:left}.tag-row,.compliance-row{justify-content:center}}
@media(max-width:880px){.alt-layout{flex-direction:column;gap:34px}.alt-visual{order:-1!important;width:100%}.testi-cards{grid-template-columns:1fr;max-width:480px;margin-left:auto;margin-right:auto}.products-inner{flex-direction:column}.products-card{min-width:0;width:100%}.ai-story-engine{display:flex;flex-direction:column;align-items:center;gap:12px;height:auto;transform:none;width:100%}.workflow-svg{display:none}.expert-center{width:120px;height:120px;margin-bottom:6px}.expert-ring{display:none}.workflow-node{position:static!important;transform:none!important;opacity:1!important;width:100%;max-width:420px;top:auto;right:auto;bottom:auto;left:auto}}
@media(max-width:680px){body.ee-product-page{font-size:15.5px}.wrap,.faq-container{padding-left:18px;padding-right:18px}.section{padding:28px 0}.alt-section{padding:28px 0}.testimonials-section,.ai-demo-section,.faq-section{padding:28px 0}.stat-strip{grid-template-columns:repeat(3,1fr);gap:8px}.stat-cell{padding:16px 8px}.features-grid{grid-template-columns:1fr 1fr}.btn{width:100%}.cta-row{flex-direction:column}.cta-row .btn{width:100%}.product-grid{grid-template-columns:1fr}.growth-card{flex-direction:column;text-align:center;gap:14px;padding:24px}.testi-metrics{grid-template-columns:1fr 1fr}.toc-mobile-toggle{bottom:90px;left:14px;right:auto;top:auto;width:46px;height:46px}.toc-mobile-panel{width:100%;max-width:none}.faq-trigger{padding:18px 18px}.faq-q{font-size:15px;gap:10px}.faq-inner{padding:0 18px 20px 32px}.card-body{padding:24px}.cbar{padding:0 10px calc(10px + env(safe-area-inset-bottom,0px))}.cbar-inner{padding:11px 11px 11px 14px;gap:11px;border-radius:var(--r)}.cbar-tag{display:none}.cbar-txt b{font-size:13px;line-height:1.25}.cbar-txt span{display:none}.cbar .btn{width:auto;padding:12px 18px;font-size:13.5px}}
@media(max-width:480px){.stat-strip{grid-template-columns:1fr}.features-grid{grid-template-columns:1fr;max-width:360px;margin-left:auto;margin-right:auto}.testi-metrics{grid-template-columns:1fr}.hero-form-card{padding:24px 20px}.compliance-row{gap:14px}}
@media(max-width:380px){.hero-h1{font-size:31px}.cbar-txt b{font-size:12px}.cbar .btn{padding:11px 14px}}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.001ms!important;animation-iteration-count:1!important;transition-duration:.001ms!important;scroll-behavior:auto!important}.reveal{opacity:1!important;transform:none!important}}
</style>

<button class="toc-mobile-toggle" id="toc-mobile-btn" aria-label="Toggle table of contents"><svg viewBox="0 0 24 24"><path d="M3 9h14V7H3v2zm0 4h14v-2H3v2zm0 4h14v-2H3v2zm16 0h2v-2h-2v2zm0-10v2h2V7h-2zm0 6h2v-2h-2v2z"/></svg></button>
<div class="toc-mobile-overlay" id="toc-mobile-overlay"></div>
<div class="toc-mobile-panel" id="toc-mobile-panel">
    <div class="toc-mobile-header">
        <span class="toc-mobile-title">Index</span>
        <button class="toc-mobile-close" id="toc-mobile-close" aria-label="Close"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
    <nav class="toc-wrapper">
        <div class="toc-progress" id="toc-progress-mobile"></div>
        <ul class="toc-list" id="toc-list-mobile">
            <?php $tn = 1; foreach ($toc_final as $tlink): ?>
            <li class="toc-item"><a href="#<?php echo esc_attr($tlink['anchor']); ?>" class="toc-link toc-link-mobile"><span class="toc-num"><?php echo str_pad($tn++, 2, '0', STR_PAD_LEFT); ?></span><?php echo esc_html($tlink['label']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>

<!-- START: Hero Section (editable via Product → Hero tab) -->
<main class="hero" id="top">
    <div class="hero-grid-bg"></div>
    <div class="wrap">
        <div class="hero-layout">
            <div class="hero-left">
                <?php if ($hero_badge): ?>
                <div class="hero-badge reveal"><span class="pulse-dot"></span><?php echo esc_html($hero_badge); ?></div>
                <?php endif; ?>
                <h1 class="hero-h1 reveal"><?php
                    if ($hero_h1_before || $hero_h1_highlight || $hero_h1_after) {
                        if ($hero_h1_before)    echo esc_html($hero_h1_before) . ' ';
                        if ($hero_h1_highlight) echo '<span class="uacc">' . esc_html($hero_h1_highlight) . '</span>';
                        if ($hero_h1_after)     echo ' ' . esc_html($hero_h1_after);
                    } else {
                        echo esc_html(get_the_title());
                    }
                ?></h1>
                <?php if ($hero_desc): ?>
                <p class="hero-desc reveal"><?php echo function_exists('ee_inline_links') ? ee_inline_links($hero_desc) : wp_kses_post($hero_desc); ?></p>
                <?php endif; ?>
                <?php if (!empty($hero_proofs)): ?>
                <ul class="proof reveal">
                    <?php foreach ($hero_proofs as $p): if (empty($p)) continue; ?>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg><?php echo esc_html(is_array($p) ? ($p['text'] ?? '') : $p); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if (!empty($stats)): ?>
                <div class="stat-strip reveal">
                    <?php foreach ($stats as $s): if (empty($s['num']) && empty($s['label'])) continue; ?>
                    <div class="stat-cell"><span class="stat-num"><?php echo esc_html($s['num'] ?? ''); ?></span><span class="stat-lab"><?php echo esc_html($s['label'] ?? ''); ?></span></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($result_badge): ?>
                <div class="result-strip reveal"><span class="pulse-dot"></span><?php echo esc_html($result_badge); ?></div>
                <?php endif; ?>
                <?php if (!empty($tags)): ?>
                <nav class="tag-row reveal" aria-label="Segments">
                    <?php foreach ($tags as $tag): if (empty($tag)) continue; ?>
                    <span class="tag"><?php echo esc_html(is_array($tag) ? ($tag['text'] ?? '') : $tag); ?></span>
                    <?php endforeach; ?>
                </nav>
                <?php endif; ?>
                <?php if ($hero_cta_text || $hero_cta2_text): ?>
                <div class="cta-row reveal">
                    <?php if ($hero_cta_text): ?>
                    <a href="<?php echo esc_url($hero_cta_url ?: '#admission-form'); ?>" class="btn btn-primary"><?php echo esc_html($hero_cta_text); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                    <?php endif; ?>
                    <?php if ($hero_cta2_text): ?>
                    <a href="<?php echo esc_url($hero_cta2_url ?: '#'); ?>" class="btn btn-outline"><?php echo esc_html($hero_cta2_text); ?></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ($trust_rating || $trust_text || !empty($compliance)): ?>
                <footer class="trust-bar reveal">
                    <?php if ($trust_rating || $trust_text): ?>
                    <div class="trust-rating"><span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span><?php if ($trust_rating) echo esc_html($trust_rating); ?> <?php if ($trust_text) echo '<span>' . esc_html($trust_text) . '</span>'; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($compliance)): ?>
                    <div class="compliance-row">
                        <?php foreach ($compliance as $c): if (empty($c['label']) && empty($c['icon'])) continue; ?>
                        <div class="compliance-item"><?php if (!empty($c['icon'])): ?><img src="<?php echo esc_url($c['icon']); ?>" alt="<?php echo esc_attr($c['label'] ?? ''); ?>" width="24" height="24"><?php endif; ?><span><?php echo esc_html($c['label'] ?? ''); ?></span></div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </footer>
                <?php endif; ?>
            </div>
            <?php if ($form_embed): ?>
            <div class="hero-right">
                <aside class="hero-form-aside reveal" id="admission-form" aria-label="Book Demo Form">
                    <div class="hero-form-card">
                        <?php echo $form_embed; ?>
                        <p class="secure-label">&#128274; Secure Data Transmission Active</p>
                    </div>
                </aside>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<!-- END: Hero Section -->

<?php /* Logo strip removed site-wide (2026-07) — see functions.php note. */ ?>

<!-- START: TOC Zone (sticky index + all content sections) -->
<div class="toc-zone-wrapper" id="toc-zone-wrapper">
    <div class="toc-column" id="toc-column">
        <nav class="toc-wrapper" id="toc" aria-label="Table of Contents">
            <div class="toc-progress" id="toc-progress"></div>
            <div class="toc-header">
                <div class="toc-icon"><svg viewBox="0 0 24 24"><path d="M3 9h14V7H3v2zm0 4h14v-2H3v2zm0 4h14v-2H3v2zm16 0h2v-2h-2v2zm0-10v2h2V7h-2zm0 6h2v-2h-2v2z"/></svg></div>
                <p class="toc-title">Index</p>
            </div>
            <ul class="toc-list" id="toc-list">
                <?php $tn = 1; foreach ($toc_final as $tlink): ?>
                <li class="toc-item"><a href="#<?php echo esc_attr($tlink['anchor']); ?>" class="toc-link"><span class="toc-num"><?php echo str_pad($tn++, 2, '0', STR_PAD_LEFT); ?></span><?php echo esc_html($tlink['label']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="toc-content-column">

        <!-- START: Overview Section (editable via Product → Education CRM tab) -->
        <?php if ($educrm_h2 || $educrm_p1): ?>
        <section class="section section-b" id="what-is-education-crm" aria-labelledby="edu-crm-h">
            <div class="wrap">
                <div class="what-layout">
                    <div>
                        <?php if ($educrm_h2): ?><h2 id="edu-crm-h" class="what-h2 reveal"><?php echo esc_html($educrm_h2); ?></h2><?php endif; ?>
                        <?php if ($educrm_p1): ?><p class="what-p reveal"><?php echo function_exists('ee_inline_links') ? ee_inline_links($educrm_p1) : wp_kses_post($educrm_p1); ?></p><?php endif; ?>
                        <?php if ($educrm_p2): ?><p class="what-p reveal"><?php echo function_exists('ee_inline_links') ? ee_inline_links($educrm_p2) : wp_kses_post($educrm_p2); ?></p><?php endif; ?>
                        <?php if ($educrm_p3): ?><p class="what-p reveal"><?php echo function_exists('ee_inline_links') ? ee_inline_links($educrm_p3) : wp_kses_post($educrm_p3); ?></p><?php endif; ?>
                        <?php if ($growth_val || $growth_text): ?>
                        <div class="growth-card reveal">
                            <?php if ($growth_val): ?><div class="growth-val"><?php echo esc_html($growth_val); ?></div><?php endif; ?>
                            <?php if ($growth_text): ?><div class="growth-text"><?php echo function_exists('ee_inline_links') ? ee_inline_links($growth_text) : wp_kses_post($growth_text); ?></div><?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($flow_steps)): ?>
                    <div class="flow-panel reveal" id="flow-zone">
                        <div class="flow-live"><span class="pulse-dot"></span>Status — Processing</div>
                        <div class="flow-steps" id="flow-stack">
                            <?php foreach ($flow_steps as $i => $step): if (empty($step['label'])) continue; ?>
                            <div class="flow-step" data-step="<?php echo (int)$i; ?>">
                                <div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                                <span class="step-label"><?php echo esc_html($step['label']); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="data-log" id="data-log">
                            <div class="log-line">Initiating CRM core...</div>
                            <div class="log-line">Listening for new events...</div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- END: Overview Section -->

        <!-- START: Features Section (editable via Product → Features tab) -->
        <?php if (!empty($features)): ?>
        <section class="section section-b" id="features" aria-labelledby="features-h">
            <div class="wrap">
                <?php if ($features_h2): ?>
                <div class="features-head reveal">
                    <div class="kicker center"><span class="lbl">Platform</span></div>
                    <h2 id="features-h" class="features-h2"><?php echo esc_html($features_h2); ?></h2>
                </div>
                <?php endif; ?>
                <div class="features-grid reveal">
                    <?php foreach ($features as $f): if (empty($f['title'])) continue; ?>
                    <article class="feat-card">
                        <?php if (!empty($f['image'])): ?>
                        <div class="feat-img-wrap"><img src="<?php echo esc_url($f['image']); ?>" alt="<?php echo esc_attr($f['alt'] ?: $f['title']); ?>" class="feat-img" loading="lazy" width="200" height="110"></div>
                        <?php endif; ?>
                        <h3 class="feat-title"><span class="feat-dot"></span><?php echo esc_html($f['title']); ?></h3>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- END: Features Section -->

        <!-- START: Alternating Content Sections (editable via Product → Sections tab) -->
        <?php if (!empty($sections)): foreach ($sections as $sec):
            $sid = $sec['id']      ?? '';
            $sh2 = $sec['heading'] ?? '';
            if (!$sid || !$sh2) continue;
            $img_left = (($sec['image_position'] ?? '') === 'left');
        ?>
        <section class="alt-section" id="<?php echo esc_attr($sid); ?>" aria-labelledby="sec-<?php echo esc_attr($sid); ?>-h">
            <div class="wrap"><div class="alt-layout">
                <?php if ($img_left && !empty($sec['image'])): ?>
                <div class="alt-visual reveal">
                    <div class="float-anim alt-frame"><img src="<?php echo esc_url($sec['image']); ?>" alt="<?php echo esc_attr($sh2); ?>" class="alt-img" loading="lazy" width="600" height="400"></div>
                </div>
                <?php endif; ?>
                <article class="alt-content reveal">
                    <?php if (!empty($sec['kicker'])): ?><div class="kicker"><span class="lbl"><?php echo esc_html($sec['kicker']); ?></span><span class="ln"></span></div><?php endif; ?>
                    <h2 id="sec-<?php echo esc_attr($sid); ?>-h" class="alt-h2"><?php echo esc_html($sh2); ?></h2>
                    <?php if (!empty($sec['description'])): ?><p class="alt-desc"><?php echo function_exists('ee_inline_links') ? ee_inline_links($sec['description']) : wp_kses_post($sec['description']); ?></p><?php endif; ?>
                    <?php if (!empty($sec['features'])): ?>
                    <?php if (!empty($sec['features_heading'])): ?><h3 class="alt-h3"><?php echo esc_html($sec['features_heading']); ?></h3><?php endif; ?>
                    <ul class="feature-list">
                        <?php foreach (preg_split('/\r?\n/', trim($sec['features'])) as $line): $line = trim($line); if ($line === '') continue; ?>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text"><?php echo esc_html($line); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php if (!empty($sec['cta_text'])): ?>
                    <a href="<?php echo esc_url($sec['cta_url'] ?: '#admission-form'); ?>" class="btn btn-outline"><?php echo esc_html($sec['cta_text']); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                    <?php endif; ?>
                </article>
                <?php if (!$img_left && !empty($sec['image'])): ?>
                <div class="alt-visual reveal">
                    <div class="float-anim alt-frame"><img src="<?php echo esc_url($sec['image']); ?>" alt="<?php echo esc_attr($sh2); ?>" class="alt-img" loading="lazy" width="600" height="400"></div>
                </div>
                <?php endif; ?>
            </div></div>
        </section>
        <?php endforeach; endif; ?>
        <!-- END: Alternating Content Sections -->

        <!-- START: Products / Bottom CTA Section (editable via Product → Bottom CTA tab) -->
        <?php if ($bottom_h2 || !empty($products)): ?>
        <section class="section section-b" id="products" aria-labelledby="cta-h">
            <div class="wrap"><div class="products-inner">
                <div class="products-content reveal">
                    <?php if ($bottom_label): ?><div class="kicker"><span class="lbl"><?php echo esc_html($bottom_label); ?></span><span class="ln"></span></div><?php endif; ?>
                    <?php if ($bottom_h2): ?><h2 id="cta-h" class="products-h2"><?php echo esc_html($bottom_h2); ?></h2><?php endif; ?>
                    <?php if ($bottom_h3): ?><p class="products-sub"><?php echo function_exists('ee_inline_links') ? ee_inline_links($bottom_h3) : wp_kses_post($bottom_h3); ?></p><?php endif; ?>
                    <?php if ($bottom_cta_text): ?>
                    <a href="<?php echo esc_url($bottom_cta_url ?: '#admission-form'); ?>" class="btn btn-primary btn-lg"><?php echo esc_html($bottom_cta_text); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                    <?php endif; ?>
                </div>
                <?php if (!empty($products)): ?>
                <div class="products-card reveal">
                    <p class="featured-label">Featured Apps</p>
                    <div class="product-grid">
                        <?php foreach ($products as $p): if (empty($p['title'])) continue; ?>
                        <a href="<?php echo esc_url($p['url'] ?: '#'); ?>" class="product-item" target="_blank" rel="noopener">
                            <?php if (!empty($p['logo'])): ?><div class="product-logo"><img src="<?php echo esc_url($p['logo']); ?>" alt="<?php echo esc_attr($p['title']); ?>" loading="lazy" width="40" height="40"></div><?php endif; ?>
                            <h4><?php echo esc_html($p['title']); ?></h4>
                            <span class="product-view-link">View Product &#8594;</span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div></div>
        </section>
        <?php endif; ?>
        <!-- END: Products / Bottom CTA Section -->

        <!-- START: Testimonials Section (editable via Product → Testimonials tab) -->
        <?php if (!empty($testimonials)): ?>
        <section class="testimonials-section" id="testimonials" aria-labelledby="testi-title">
            <div class="testi-mesh" id="testi-mesh"></div>
            <div class="wrap testi-inner">
                <?php if ($testi_tagline || $testi_title || $testi_sub): ?>
                <header class="testi-header">
                    <?php if ($testi_tagline): ?><div class="kicker center"><span class="lbl"><?php echo esc_html($testi_tagline); ?></span></div><?php endif; ?>
                    <?php if ($testi_title): ?><h2 id="testi-title" class="testi-title"><?php echo wp_kses_post($testi_title); ?></h2><?php endif; ?>
                    <?php if ($testi_sub): ?><p class="testi-sub"><?php echo function_exists('ee_inline_links') ? ee_inline_links($testi_sub) : wp_kses_post($testi_sub); ?></p><?php endif; ?>
                </header>
                <?php endif; ?>
                <?php if (!empty($metrics)): ?>
                <div class="testi-metrics">
                    <?php foreach ($metrics as $m): if (empty($m['label']) && empty($m['target'])) continue; ?>
                    <div class="testi-metric"><span class="testi-metric-val" data-target="<?php echo esc_attr($m['target'] ?? '0'); ?>" data-suffix="<?php echo esc_attr($m['suffix'] ?? ''); ?>" <?php if (!empty($m['locale'])): ?>data-locale="true"<?php endif; ?>>0</span><span class="testi-metric-lab"><?php echo esc_html($m['label'] ?? ''); ?></span></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="testi-cards">
                    <?php foreach ($testimonials as $i => $t): if (empty($t['name'])) continue; ?>
                    <article class="testi-card">
                        <?php if (!empty($t['youtube_id'])): ?>
                        <div class="vid-wrap" id="vid-<?php echo (int)$i; ?>" onclick="playVideo('vid-<?php echo (int)$i; ?>','<?php echo esc_js($t['youtube_id']); ?>')" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();playVideo('vid-<?php echo (int)$i; ?>','<?php echo esc_js($t['youtube_id']); ?>');}" role="button" tabindex="0" aria-label="<?php echo esc_attr('Play video testimonial from ' . $t['name']); ?>"><div class="vid-thumb"><img src="https://img.youtube.com/vi/<?php echo esc_attr($t['youtube_id']); ?>/maxresdefault.jpg" class="vid-thumb-img" alt="<?php echo esc_attr($t['name']); ?>" width="640" height="360" loading="lazy"><div class="vid-play"></div></div><div class="vid-slot"></div></div>
                        <?php endif; ?>
                        <div class="card-body">
                            <?php if (!empty($t['quote'])): ?><blockquote class="card-quote"><?php echo wp_kses_post($t['quote']); ?></blockquote><?php endif; ?>
                            <div class="card-profile">
                                <?php if (!empty($t['avatar'])): ?><img src="<?php echo esc_url($t['avatar']); ?>" class="card-avatar" alt="<?php echo esc_attr($t['name']); ?>" loading="lazy" width="54" height="54"><?php endif; ?>
                                <div>
                                    <p class="card-name"><?php echo esc_html($t['name']); ?></p>
                                    <?php if (!empty($t['role'])): ?><p class="card-role"><?php echo esc_html($t['role']); ?></p><?php endif; ?>
                                    <?php if (!empty($t['institution'])): ?><span class="card-inst"><?php echo esc_html($t['institution']); ?></span><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- END: Testimonials Section -->

        <!-- START: AI Demo Section (editable via Product → AI Demo tab) -->
        <?php if ($aidemo_h2): ?>
        <section class="ai-demo-section" id="demo" aria-labelledby="ai-cta-h">
            <div class="wrap"><div class="ai-demo-inner">
                <div class="ai-cta-content reveal">
                    <div class="kicker"><span class="lbl">Book a Demo</span><span class="ln"></span></div>
                    <h2 id="ai-cta-h" class="ai-cta-h2"><?php echo esc_html($aidemo_h2); ?></h2>
                    <?php if ($aidemo_sub): ?><p class="ai-cta-sub"><?php echo function_exists('ee_inline_links') ? ee_inline_links($aidemo_sub) : wp_kses_post($aidemo_sub); ?></p><?php endif; ?>
                    <div class="ai-cta-actions">
                        <?php if ($aidemo_cta_text): ?>
                        <a href="<?php echo esc_url($aidemo_cta_url ?: '#admission-form'); ?>" class="btn btn-primary btn-lg"><?php echo esc_html($aidemo_cta_text); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                        <?php endif; ?>
                        <?php if ($aidemo_trust): ?>
                        <div class="ai-trust"><svg viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><?php echo esc_html($aidemo_trust); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($workflow_nodes) || $aidemo_expert_img): ?>
                <div class="ai-story-engine reveal" id="ai-engine">
                    <svg class="workflow-svg" viewBox="0 0 500 500"><path id="ai-conn-path" class="conn-path" d=""/><circle id="ai-pulse-dot" r="6" fill="#DE6E30" opacity="0" style="transition:opacity .3s"/></svg>
                    <?php if ($aidemo_expert_img): ?>
                    <div class="expert-center"><span class="expert-ring"></span><img src="<?php echo esc_url($aidemo_expert_img); ?>" alt="ExtraaEdge Expert" width="226" height="226" loading="lazy"></div>
                    <?php endif; ?>
                    <?php foreach (array_slice($workflow_nodes, 0, 6) as $i => $n): ?>
                    <div class="workflow-node wn-<?php echo ($i + 1); ?>" data-idx="<?php echo (int)$i; ?>">
                        <div class="wn-num"><?php echo ($i + 1); ?></div>
                        <div>
                            <p class="wn-title"><?php echo esc_html($n['title'] ?? ''); ?></p>
                            <?php if (!empty($n['sub'])): ?><p class="wn-sub"><?php echo esc_html($n['sub']); ?></p><?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div></div>
        </section>
        <?php endif; ?>
        <!-- END: AI Demo Section -->

        <!-- START: FAQ Section (editable via Product → FAQ tab) -->
        <?php if (!empty($faqs)): ?>
        <section class="faq-section" id="faq" aria-labelledby="faq-title">
            <div class="faq-container">
                <?php if ($faq_badge || $faq_title || $faq_subtitle): ?>
                <header class="faq-header reveal">
                    <?php if ($faq_badge): ?><div class="kicker center"><span class="lbl"><?php echo esc_html($faq_badge); ?></span></div><?php endif; ?>
                    <?php if ($faq_title): ?><h2 id="faq-title" class="faq-title"><?php echo esc_html($faq_title); ?></h2><?php endif; ?>
                    <?php if ($faq_subtitle): ?><p class="faq-subtitle"><?php echo function_exists('ee_inline_links') ? ee_inline_links($faq_subtitle) : wp_kses_post($faq_subtitle); ?></p><?php endif; ?>
                </header>
                <?php endif; ?>
                <div class="faq-list" id="faq-list">
                    <?php foreach ($faqs as $i => $faq): if (empty($faq['question'])) continue; ?>
                    <div class="faq-item">
                        <button class="faq-trigger" aria-expanded="false">
                            <span class="faq-q"><span class="qn">Q<?php echo ($i + 1); ?></span><?php echo esc_html($faq['question']); ?></span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>
                        <div class="faq-body"><div class="faq-inner"><?php
                            $answer = $faq['answer'] ?? '';
                            echo function_exists('ee_format_rich_text') ? ee_format_rich_text($answer) : wp_kses_post(wpautop($answer));
                        ?></div></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- END: FAQ Section -->

    </div>
</div>
<!-- END: TOC Zone -->

<!-- START: Sticky Conversion Bar -->
<?php if ($bottom_h2 || $hero_cta_text): ?>
<div class="cbar" id="cbar">
    <div class="cbar-inner">
        <div class="cbar-tag"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg></div>
        <div class="cbar-txt"><b><?php echo esc_html($bottom_h2 ?: get_the_title()); ?></b><?php if ($bottom_h3) echo '<span>' . esc_html(wp_strip_all_tags($bottom_h3)) . '</span>'; ?></div>
        <?php if ($trust_rating): ?><div class="cbar-rating"><span class="s">&#9733;&#9733;&#9733;&#9733;&#9733;</span><?php echo esc_html($trust_rating); ?></div><?php endif; ?>
        <a href="<?php echo esc_url(($bottom_cta_url ?: $hero_cta_url) ?: '#admission-form'); ?>" class="btn btn-primary"><?php echo esc_html($bottom_cta_text ?: $hero_cta_text ?: 'Book a Demo'); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        <button class="cbar-close" id="cbar-close" aria-label="Dismiss"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
</div>
<?php endif; ?>
<!-- END: Sticky Conversion Bar -->

<script>
(function(){'use strict';
(function(){
var bar=document.getElementById('cbar'),close=document.getElementById('cbar-close');
if(!bar)return;
var dismissed=false;
function onScroll(){if(dismissed)return;var trigger=window.innerHeight*0.85;if(window.pageYOffset>trigger) bar.classList.add('show'); else bar.classList.remove('show');}
if(close)close.addEventListener('click',function(){dismissed=true;bar.classList.remove('show');});
window.addEventListener('scroll',onScroll,{passive:true});onScroll();
})();
(function(){
var btn=document.getElementById('toc-mobile-btn'),panel=document.getElementById('toc-mobile-panel'),overlay=document.getElementById('toc-mobile-overlay'),close=document.getElementById('toc-mobile-close'),links=document.querySelectorAll('.toc-link-mobile');
if(!btn||!panel||!overlay)return;
function open(){panel.classList.add('active');overlay.classList.add('active');document.body.style.overflow='hidden';}
function shut(){panel.classList.remove('active');overlay.classList.remove('active');document.body.style.overflow='';}
btn.addEventListener('click',open);close.addEventListener('click',shut);overlay.addEventListener('click',shut);
links.forEach(function(link){link.addEventListener('click',function(e){
e.preventDefault();var t=document.getElementById(link.getAttribute('href').substring(1));shut();
if(t)setTimeout(function(){window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-100,behavior:'smooth'});},300);
});});
})();
(function(){
var tocLinks=document.querySelectorAll('.toc-link'),tocLinksM=document.querySelectorAll('.toc-link-mobile'),prog=document.getElementById('toc-progress'),progM=document.getElementById('toc-progress-mobile');
if(!tocLinks.length)return;
/* While a click-driven smooth scroll is in flight, freeze the active
   state on the clicked link so the scrollspy doesn't briefly flash the
   sections we're scrolling through. */
var lockedLink=null,lockTimer=null;
function lockTo(link){lockedLink=link;clearTimeout(lockTimer);lockTimer=setTimeout(function(){lockedLink=null;},900);
    tocLinks.forEach(function(l){l.classList.toggle('active',l===link||(l.getAttribute('href')===link.getAttribute('href')));});
    tocLinksM.forEach(function(l){l.classList.toggle('active',l.getAttribute('href')===link.getAttribute('href'));});
}
tocLinks.forEach(function(link){link.addEventListener('click',function(e){e.preventDefault();var t=document.getElementById(link.getAttribute('href').substring(1));if(!t)return;lockTo(link);window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-100,behavior:'smooth'});});});
tocLinksM.forEach(function(link){link.addEventListener('click',function(e){var t=document.getElementById(link.getAttribute('href').substring(1));if(t)lockTo(link);});});
function update(){
if(lockedLink)return;var secs=[];tocLinks.forEach(function(link){var el=document.getElementById(link.getAttribute('href').substring(1));if(el)secs.push(el);});var pos=window.pageYOffset+160,active=secs[0];secs.forEach(function(s){var topAbs=s.getBoundingClientRect().top+window.pageYOffset;if(topAbs<=pos)active=s;});tocLinks.forEach(function(l){l.classList.toggle('active',active&&l.getAttribute('href').substring(1)===active.id);});tocLinksM.forEach(function(l){l.classList.toggle('active',active&&l.getAttribute('href').substring(1)===active.id);});var zone=document.getElementById('toc-zone-wrapper');if(zone&&prog){var zTop=zone.getBoundingClientRect().top+window.pageYOffset;var pct=Math.max(0,Math.min(100,((window.pageYOffset-zTop)/zone.offsetHeight)*100));prog.style.height=pct+'%';if(progM)progM.style.height=pct+'%';}}
var ticking=false;window.addEventListener('scroll',function(){if(!ticking){window.requestAnimationFrame(function(){update();ticking=false;});ticking=true;}});update();
})();
var revObs=new IntersectionObserver(function(entries){entries.forEach(function(e,i){if(e.isIntersecting){setTimeout(function(){e.target.classList.add('visible');},i*55);revObs.unobserve(e.target);}});},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.reveal').forEach(function(el){revObs.observe(el);});
window.scrollToForm=function(e){if(e&&e.preventDefault)e.preventDefault();var t=document.getElementById('admission-form');if(t)window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-28,behavior:'smooth'});};
(function(){
var fz=document.getElementById('flow-zone'),steps=document.querySelectorAll('#flow-stack .flow-step'),log=document.getElementById('data-log');
if(!fz||!steps.length)return;
var cur=0,iv=null,msgs=["Lead captured","Auto-message sent","Document verification","Fee processed","Enrollment confirmed"];
function addLog(){var l=document.createElement('div');l.className='log-line';l.textContent=msgs[Math.floor(Math.random()*msgs.length)];log.appendChild(l);if(log.childNodes.length>5)log.removeChild(log.firstChild);}
function run(){steps.forEach(function(s){s.classList.remove('active');});steps[cur].classList.add('active');if(Math.random()>.4)addLog();cur=(cur+1)%steps.length;}
function start(){if(!iv){iv=setInterval(run,1800);run();}}
new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)start();});},{threshold:.2}).observe(fz);
steps.forEach(function(s,i){s.addEventListener('click',function(){cur=i;run();});});
})();
(function(){
var section=document.querySelector('.testimonials-section'),mesh=document.getElementById('testi-mesh');
if(!section||!mesh)return;
for(var i=0;i<12;i++){var l=document.createElement('div');l.className='testi-pulse-line';l.style.top=(Math.random()*100)+'%';l.style.animationDuration=(4+Math.random()*6)+'s';l.style.animationDelay=(Math.random()*5)+'s';mesh.appendChild(l);}
var triggered=false;
function activate(){if(triggered)return;triggered=true;section.classList.add('testi-section-active');
document.querySelectorAll('.testi-metric-val').forEach(function(el){var target=+el.getAttribute('data-target'),suffix=el.getAttribute('data-suffix')||'',useLocale=el.getAttribute('data-locale')==='true',start=null,dur=2000;function anim(ts){if(!start)start=ts;var p=Math.min((ts-start)/dur,1),c=Math.floor(p*target);el.textContent=(useLocale?c.toLocaleString():c)+suffix;if(p<1)requestAnimationFrame(anim);}requestAnimationFrame(anim);});}
new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)activate();});},{threshold:.15}).observe(section);
})();
window.playVideo=function(id,yt){var c=document.getElementById(id);if(!c||c.classList.contains('playing'))return;c.querySelector('.vid-slot').innerHTML='<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+yt+'?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="autoplay;encrypted-media" allowfullscreen style="display:block"></iframe>';c.classList.add('playing');};
(function(){
var eng=document.getElementById('ai-engine'),nodes=document.querySelectorAll('.workflow-node'),connPath=document.getElementById('ai-conn-path'),pulseDot=document.getElementById('ai-pulse-dot');
if(!eng||!nodes.length)return;
var cur=0,cyc=null,on=false;
function center(el){var r=el.getBoundingClientRect(),pr=eng.getBoundingClientRect();return{x:(r.left+r.width/2)-pr.left,y:(r.top+r.height/2)-pr.top};}
function cycle(){nodes.forEach(function(n){n.classList.remove('wn-active');});nodes[cur].classList.add('wn-active');var c=center(nodes[cur]);if(connPath){connPath.setAttribute('d','M250,283 L'+c.x+','+c.y);connPath.style.opacity='.6';}if(pulseDot){pulseDot.setAttribute('cx',c.x);pulseDot.setAttribute('cy',c.y);pulseDot.style.opacity='1';}cur=(cur+1)%nodes.length;}
function start(){if(on)return;on=true;cycle();cyc=setInterval(cycle,2800);}
eng.addEventListener('mouseenter',start);
new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)start();});},{threshold:.35}).observe(eng);
nodes.forEach(function(n,i){n.addEventListener('click',function(){cur=i;clearInterval(cyc);cycle();cyc=setInterval(cycle,3500);});});
})();
(function(){
var items=document.querySelectorAll('#faq-list .faq-item');
items.forEach(function(item){var trigger=item.querySelector('.faq-trigger'),body=item.querySelector('.faq-body');
trigger.addEventListener('click',function(){var open=item.classList.contains('faq-open');
items.forEach(function(i){i.classList.remove('faq-open');i.querySelector('.faq-body').style.maxHeight=null;i.querySelector('.faq-trigger').setAttribute('aria-expanded','false');});
if(!open){item.classList.add('faq-open');trigger.setAttribute('aria-expanded','true');body.style.maxHeight=body.scrollHeight+'px';}});});
})();
})();
</script>

<?php get_footer(); ?>
