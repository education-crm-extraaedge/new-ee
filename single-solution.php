<?php
/**
 * Single Solution Template — Admission Software redesign (DYNAMIC)
 *
 * Look + feel comes from the brief the editor supplied (hero with
 * embedded demo-form, logo marquee, four "alt" feature sections,
 * additional-features grid, comprehensive product grid, FAQ, sticky
 * cbar). All copy is sourced from the post's tabbed admin editor so
 * every Solution renders its own content; sections whose meta is
 * empty are skipped entirely.
 *
 * Template Name: Solution Landing Page
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
$hero_cta_text     = get_post_meta($pid, '_hero_cta_text',     true);
$hero_cta_url      = get_post_meta($pid, '_hero_cta_url',      true);
$hero_cta2_text    = get_post_meta($pid, '_hero_cta2_text',    true);
$hero_cta2_url     = get_post_meta($pid, '_hero_cta2_url',     true);
$trust_rating      = get_post_meta($pid, '_trust_rating',      true);
$trust_text        = get_post_meta($pid, '_trust_text',        true);
$compliance        = get_post_meta($pid, '_compliance',        true) ?: array();
$form_embed        = get_post_meta($pid, '_form_embed',        true);

/* Alt-section repeater (lead channels, communication, scoring, reporting…) */
$sections = get_post_meta($pid, '_content_sections', true) ?: array();

/* "Addon features" — 9-card grid of additional features. Stored under
   _addon_features (each: icon emoji, title, desc). */
$addon_h2       = get_post_meta($pid, '_addon_h2',       true);
$addon_sub      = get_post_meta($pid, '_addon_sub',      true);
$addon_features = get_post_meta($pid, '_addon_features', true) ?: array();

/* "Comprehensive products" — 8-card grid of platform modules. Reuses
   the same _products array used elsewhere (title, icon emoji, desc, url). */
$comp_h2     = get_post_meta($pid, '_comp_h2',  true) ?: get_post_meta($pid, '_bottom_h2', true);
$comp_sub    = get_post_meta($pid, '_comp_sub', true) ?: get_post_meta($pid, '_bottom_h3', true);
$comp_items  = get_post_meta($pid, '_comp_items', true);
if (empty($comp_items)) $comp_items = get_post_meta($pid, '_products', true) ?: array();

/* FAQ */
$faq_badge    = get_post_meta($pid, '_faq_badge',    true);
$faq_title    = get_post_meta($pid, '_faq_title',    true);
$faq_subtitle = get_post_meta($pid, '_faq_subtitle', true);
$faqs         = get_post_meta($pid, '_faqs',         true) ?: array();

/* SEO injection (per-post, gated on solution CPT) */
add_action('wp_head', function () use ($pid, $seo_title, $seo_desc, $seo_keywords, $og_image, $canonical, $twitter_title, $twitter_desc, $faqs) {
    if (!is_singular('solution')) return;
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
:root{--orange:#DE6E30;--orange-l:#E8843F;--orange-deep:#C2541C;--orange-50:#FDF3EC;--orange-100:#F9E4D5;--blue:#19335D;--blue-l:#264a85;--blue-deep:#0E1F39;--blue-50:#EEF1F7;--blue-100:#DCE3EE;--white:#fff;--ink:#19335D;--ink-soft:#4B5871;--ink-mute:#8A93A6;--line:#EDF0F5;--line-2:#E0E5EC;--panel:#FAFBFC;--grad-o:linear-gradient(135deg,#E8843F 0%,#DE6E30 55%,#C2541C 100%);--grad-b:linear-gradient(160deg,#234680 0%,#19335D 55%,#0E1F39 100%);--sh-1:0 1px 2px rgba(25,51,93,.05),0 4px 14px rgba(25,51,93,.05);--sh-2:0 14px 38px -12px rgba(25,51,93,.16);--sh-3:0 30px 70px -20px rgba(25,51,93,.26);--sh-o:0 18px 44px -14px rgba(222,110,48,.55);--r-s:12px;--r:18px;--r-l:26px;--r-pill:999px;--font:'Inter',system-ui,-apple-system,sans-serif;--ease:cubic-bezier(.22,1,.36,1);--t:.5s var(--ease);--maxw:1240px}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body.ee-solution-page{font-family:var(--font);color:var(--ink);background:var(--white);line-height:1.65;overflow-x:hidden;-webkit-font-smoothing:antialiased;font-size:16px;letter-spacing:-.005em}
body.ee-solution-page img{max-width:100%;height:auto;display:block}
body.ee-solution-page a{text-decoration:none;color:inherit}
body.ee-solution-page ::selection{background:var(--orange);color:#fff}
body.ee-solution-page strong{font-weight:700;color:var(--ink)}
.wrap{max-width:var(--maxw);margin:0 auto;padding:0 32px}
.kicker{display:inline-flex;align-items:center;gap:11px;margin-bottom:22px;padding:7px 15px 7px 12px;background:var(--orange-50);border:1px solid var(--orange-100);border-radius:var(--r-pill)}
.kicker .lbl{font-weight:700;font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-deep)}
.kicker.center{margin-left:auto;margin-right:auto}
.uacc{color:var(--orange)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;font-weight:700;font-size:15px;padding:15px 30px;border-radius:var(--r-pill);cursor:pointer;border:1.5px solid transparent;transition:var(--t);white-space:nowrap;letter-spacing:-.01em}
.btn svg{width:16px;height:16px;transition:var(--t)}
.btn-primary{background:var(--grad-o);color:#fff;box-shadow:var(--sh-o)}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 24px 54px -14px rgba(222,110,48,.62)}
.btn-primary:hover svg{transform:translateX(3px)}
.btn-outline{background:#fff;color:var(--blue);border-color:var(--line-2);box-shadow:var(--sh-1)}
.btn-outline:hover{border-color:var(--blue);transform:translateY(-3px);box-shadow:var(--sh-2)}
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
.section{padding:40px 0}
.section-head{text-align:center;max-width:700px;margin:0 auto 24px}
.section-head .kicker{margin-left:auto;margin-right:auto}
.section-head h2{font-weight:800;font-size:clamp(26px,3.5vw,44px);letter-spacing:-.04em;line-height:1.08;color:var(--blue);margin-bottom:14px}
.section-head p{color:var(--ink-soft);font-size:16.5px;line-height:1.7}
.lead-line{font-weight:800;font-size:clamp(17px,1.7vw,22px);color:var(--orange-deep);margin-bottom:14px;letter-spacing:-.015em;line-height:1.2}
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
.float-badge{position:absolute;background:rgba(255,255,255,.92);backdrop-filter:blur(10px);padding:10px 16px;border:1px solid var(--line);border-radius:var(--r-pill);display:flex;align-items:center;gap:9px;font-weight:700;font-size:11.5px;color:var(--blue);z-index:4;white-space:nowrap;box-shadow:var(--sh-2)}
.float-anim{position:relative}
.addon-section{padding:40px 0;background:#fff;position:relative}
.addon-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;position:relative;z-index:1}
.addon-card{background:#fff;border:1px solid var(--line);border-radius:var(--r);padding:26px;box-shadow:var(--sh-1);transition:var(--t);position:relative;overflow:hidden}
.addon-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--grad-o);transform:scaleX(0);transform-origin:left;transition:var(--t)}
.addon-card:hover{transform:translateY(-7px);box-shadow:var(--sh-3);border-color:var(--orange-100)}
.addon-card:hover::before{transform:scaleX(1)}
.addon-ic{width:50px;height:50px;border-radius:15px;background:var(--orange-50);border:1px solid var(--orange-100);display:flex;align-items:center;justify-content:center;font-size:23px;margin-bottom:16px}
.addon-card h3{font-weight:800;font-size:16px;color:var(--blue);margin-bottom:8px;letter-spacing:-.01em}
.addon-card p{font-size:14px;color:var(--ink-soft);line-height:1.6}
.comp-section{padding:40px 0;background:var(--panel);position:relative}
.comp-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;position:relative;z-index:1}
.comp-card{background:#fff;border:1px solid var(--line);border-radius:var(--r);padding:26px 22px;box-shadow:var(--sh-1);transition:var(--t);display:flex;flex-direction:column}
.comp-card:hover{transform:translateY(-7px);box-shadow:var(--sh-3);border-color:var(--orange-100)}
.comp-ic{width:54px;height:54px;border-radius:16px;background:var(--grad-b);display:flex;align-items:center;justify-content:center;font-size:25px;margin-bottom:16px;box-shadow:var(--sh-2);color:#fff}
.comp-card h3{font-weight:800;font-size:15.5px;color:var(--blue);margin-bottom:8px;letter-spacing:-.01em}
.comp-card p{font-size:13.5px;color:var(--ink-soft);line-height:1.56;margin-bottom:14px;flex-grow:1}
.comp-link{font-size:12.5px;font-weight:700;color:var(--orange-deep);display:inline-flex;align-items:center;gap:6px;margin-top:auto}
.comp-link svg{width:13px;height:13px}
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
@media(max-width:1080px){.hero-layout{grid-template-columns:1fr;gap:48px;padding:30px 0 40px}.hero-right{justify-content:center}.hero-form-aside{max-width:540px;margin:0 auto}.hero-badge{align-self:center}.cbar-rating{display:none}}
@media(max-width:980px){.hero-left{align-items:center;text-align:center}.hero-desc,.proof,.cta-row{margin-left:auto;margin-right:auto}.proof{display:inline-grid;text-align:left}.compliance-row{justify-content:center}.addon-grid{grid-template-columns:repeat(2,1fr)}.comp-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:880px){.alt-layout{flex-direction:column;gap:34px}.alt-visual{order:-1!important;width:100%}}
@media(max-width:680px){body.ee-solution-page{font-size:15.5px}.wrap,.faq-container{padding-left:18px;padding-right:18px}.section,.alt-section,.addon-section,.comp-section,.faq-section{padding:28px 0}.btn{width:100%}.cta-row{flex-direction:column}.cta-row .btn{width:100%}.float-badge{display:none}.cbar{padding:0 10px calc(10px + env(safe-area-inset-bottom,0px))}.cbar-inner{padding:11px 11px 11px 14px;gap:11px;border-radius:var(--r)}.cbar-tag{display:none}.cbar-txt b{font-size:13px;line-height:1.25}.cbar-txt span{display:none}.cbar .btn{width:auto;padding:12px 18px;font-size:13.5px}}
@media(max-width:560px){.addon-grid{grid-template-columns:1fr}.comp-grid{grid-template-columns:1fr}}
@media(max-width:380px){.hero-h1{font-size:31px}.cbar-txt b{font-size:12px}.cbar .btn{padding:11px 14px}}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.001ms!important;animation-iteration-count:1!important;transition-duration:.001ms!important;scroll-behavior:auto!important}.reveal{opacity:1!important;transform:none!important}}
</style>

<?php if ($hero_cta_text || $hero_cta2_text): ?>
<div class="cbar" id="cbar">
    <div class="cbar-inner">
        <div class="cbar-tag"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg></div>
        <div class="cbar-txt"><b><?php echo esc_html(get_the_title()); ?></b><?php if ($hero_desc) echo '<span>' . esc_html(wp_strip_all_tags(wp_trim_words($hero_desc, 12))) . '</span>'; ?></div>
        <?php if ($trust_rating): ?><div class="cbar-rating"><span class="s">&#9733;&#9733;&#9733;&#9733;&#9733;</span><?php echo esc_html($trust_rating); ?></div><?php endif; ?>
        <a href="<?php echo esc_url($hero_cta_url ?: '#demo-form'); ?>" class="btn btn-primary" onclick="scrollToForm(event)"><?php echo esc_html($hero_cta_text ?: 'Book a Demo'); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        <button class="cbar-close" id="cbar-close" aria-label="Dismiss"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
</div>
<?php endif; ?>

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
                <?php if ($hero_cta_text || $hero_cta2_text): ?>
                <div class="cta-row reveal">
                    <?php if ($hero_cta_text): ?>
                    <a href="<?php echo esc_url($hero_cta_url ?: '#demo-form'); ?>" class="btn btn-primary" onclick="scrollToForm(event)"><?php echo esc_html($hero_cta_text); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                    <?php endif; ?>
                    <?php if ($hero_cta2_text): ?>
                    <a href="<?php echo esc_url($hero_cta2_url ?: '#additional-features'); ?>" class="btn btn-outline"><?php echo esc_html($hero_cta2_text); ?></a>
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
                <aside class="hero-form-aside reveal" id="demo-form" aria-label="Book Demo Form">
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

<?php
/* Logo strip removed site-wide (2026-07) — see functions.php note. */

/* Post-content fallback — if the editor only filled the main WordPress
   content box (no custom content sections), show that copy so the page
   isn't blank. Skips silently when both meta sections AND the content
   editor are empty. */
$has_post_body = trim(strip_tags(get_post_field('post_content', $pid))) !== '';
if (empty($sections) && $has_post_body):
?>
<section class="section" id="overview">
    <div class="wrap" style="max-width:900px">
        <article class="reveal" style="font-size:16.5px;line-height:1.8;color:var(--ink-soft)">
            <?php
            $body = apply_filters('the_content', get_post_field('post_content', $pid));
            echo $body;
            ?>
        </article>
    </div>
</section>
<?php endif; ?>

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
            <?php if (!empty($sec['badge_top'])): ?><div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span><?php echo esc_html($sec['badge_top']); ?></div><?php endif; ?>
            <div class="float-anim"><img src="<?php echo esc_url($sec['image']); ?>" alt="<?php echo esc_attr($sh2); ?>" class="alt-img" loading="lazy" width="600" height="400"></div>
            <?php if (!empty($sec['badge_bottom'])): ?><div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#9889;</span><?php echo esc_html($sec['badge_bottom']); ?></div><?php endif; ?>
        </div>
        <?php endif; ?>
        <article class="alt-content reveal">
            <?php if (!empty($sec['kicker'])): ?><div class="kicker"><span class="lbl"><?php echo esc_html($sec['kicker']); ?></span></div><?php endif; ?>
            <h2 id="sec-<?php echo esc_attr($sid); ?>-h" class="alt-h2"><?php echo esc_html($sh2); ?></h2>
            <?php if (!empty($sec['lead_line'])): ?><p class="lead-line"><?php echo esc_html($sec['lead_line']); ?></p><?php endif; ?>
            <?php if (!empty($sec['description'])): ?><p class="alt-desc"><?php echo function_exists('ee_inline_links') ? ee_inline_links($sec['description']) : wp_kses_post($sec['description']); ?></p><?php endif; ?>
            <?php if (!empty($sec['features'])): ?>
            <?php if (!empty($sec['features_heading'])): ?><h3 class="alt-h3"><?php echo esc_html($sec['features_heading']); ?></h3><?php endif; ?>
            <ul class="feature-list">
                <?php foreach (preg_split('/\r?\n/', trim($sec['features'])) as $line): $line = trim($line); if ($line === '') continue; ?>
                <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text"><?php echo function_exists('ee_inline_links') ? ee_inline_links($line) : esc_html($line); ?></span></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if (!empty($sec['cta_text'])): ?>
            <a href="<?php echo esc_url($sec['cta_url'] ?: '#demo-form'); ?>" class="btn btn-outline" onclick="scrollToForm(event)"><?php echo esc_html($sec['cta_text']); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            <?php endif; ?>
        </article>
        <?php if (!$img_left && !empty($sec['image'])): ?>
        <div class="alt-visual reveal">
            <?php if (!empty($sec['badge_top'])): ?><div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span><?php echo esc_html($sec['badge_top']); ?></div><?php endif; ?>
            <div class="float-anim"><img src="<?php echo esc_url($sec['image']); ?>" alt="<?php echo esc_attr($sh2); ?>" class="alt-img" loading="lazy" width="600" height="400"></div>
            <?php if (!empty($sec['badge_bottom'])): ?><div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#9889;</span><?php echo esc_html($sec['badge_bottom']); ?></div><?php endif; ?>
        </div>
        <?php endif; ?>
    </div></div>
</section>
<?php endforeach; endif; ?>

<?php if (!empty($addon_features)): ?>
<section class="addon-section" id="additional-features" aria-labelledby="addon-h">
    <div class="wrap">
        <?php if ($addon_h2 || $addon_sub): ?>
        <div class="section-head reveal">
            <div class="kicker center"><span class="lbl">More Power</span></div>
            <?php if ($addon_h2):  ?><h2 id="addon-h"><?php echo esc_html($addon_h2); ?></h2><?php endif; ?>
            <?php if ($addon_sub): ?><p><?php echo function_exists('ee_inline_links') ? ee_inline_links($addon_sub) : wp_kses_post($addon_sub); ?></p><?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="addon-grid reveal">
            <?php foreach ($addon_features as $a): if (empty($a['title'])) continue; ?>
            <div class="addon-card">
                <?php if (!empty($a['icon'])): ?><div class="addon-ic"><?php echo wp_kses_post($a['icon']); ?></div><?php endif; ?>
                <h3><?php echo esc_html($a['title']); ?></h3>
                <?php if (!empty($a['desc'])): ?><p><?php echo esc_html($a['desc']); ?></p><?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($comp_items) || $comp_h2): ?>
<section class="comp-section" id="comprehensive" aria-labelledby="comp-h">
    <div class="wrap">
        <?php if ($comp_h2 || $comp_sub): ?>
        <div class="section-head reveal">
            <div class="kicker center"><span class="lbl">The Platform</span></div>
            <?php if ($comp_h2):  ?><h2 id="comp-h"><?php echo esc_html($comp_h2); ?></h2><?php endif; ?>
            <?php if ($comp_sub): ?><p><?php echo function_exists('ee_inline_links') ? ee_inline_links($comp_sub) : wp_kses_post($comp_sub); ?></p><?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if (!empty($comp_items)): ?>
        <div class="comp-grid reveal">
            <?php foreach ($comp_items as $c): if (empty($c['title'])) continue; ?>
            <div class="comp-card">
                <?php if (!empty($c['icon'])):  ?><div class="comp-ic"><?php echo wp_kses_post($c['icon']); ?></div>
                <?php elseif (!empty($c['logo'])): ?><div class="comp-ic"><img src="<?php echo esc_url($c['logo']); ?>" alt="<?php echo esc_attr($c['title']); ?>" style="width:28px;height:28px;object-fit:contain"></div>
                <?php endif; ?>
                <h3><?php echo esc_html($c['title']); ?></h3>
                <?php if (!empty($c['desc'])): ?><p><?php echo esc_html($c['desc']); ?></p><?php endif; ?>
                <a href="<?php echo esc_url($c['url'] ?: '#demo-form'); ?>" class="comp-link" <?php if (empty($c['url'])) echo 'onclick="scrollToForm(event)"'; ?>>Learn more<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($faqs)): ?>
<section class="faq-section" id="faq" aria-labelledby="faq-title">
    <div class="faq-container">
        <?php if ($faq_badge || $faq_title || $faq_subtitle): ?>
        <div class="faq-header reveal">
            <?php if ($faq_badge): ?><div class="kicker center"><span class="lbl"><?php echo esc_html($faq_badge); ?></span></div><?php endif; ?>
            <?php if ($faq_title): ?><h2 id="faq-title" class="faq-title"><?php echo esc_html($faq_title); ?></h2><?php endif; ?>
            <?php if ($faq_subtitle): ?><p class="faq-subtitle"><?php echo function_exists('ee_inline_links') ? ee_inline_links($faq_subtitle) : wp_kses_post($faq_subtitle); ?></p><?php endif; ?>
        </div>
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

<script>
(function(){'use strict';
var revObs=new IntersectionObserver(function(entries){entries.forEach(function(e,i){if(e.isIntersecting){setTimeout(function(){e.target.classList.add('visible');},i*55);revObs.unobserve(e.target);}});},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.reveal').forEach(function(el){revObs.observe(el);});
window.scrollToForm=function(e){if(e&&e.preventDefault)e.preventDefault();var t=document.getElementById('demo-form');if(t)window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-100,behavior:'smooth'});};
(function(){var bar=document.getElementById('cbar'),close=document.getElementById('cbar-close');if(!bar)return;var dismissed=false;function onScroll(){if(dismissed)return;bar.classList.toggle('show',window.pageYOffset>window.innerHeight*0.85);}if(close)close.addEventListener('click',function(){dismissed=true;bar.classList.remove('show');});window.addEventListener('scroll',onScroll,{passive:true});onScroll();})();
(function(){var items=document.querySelectorAll('#faq-list .faq-item');items.forEach(function(item){var trigger=item.querySelector('.faq-trigger'),body=item.querySelector('.faq-body');trigger.addEventListener('click',function(){var open=item.classList.contains('faq-open');items.forEach(function(i){i.classList.remove('faq-open');i.querySelector('.faq-body').style.maxHeight=null;i.querySelector('.faq-trigger').setAttribute('aria-expanded','false');});if(!open){item.classList.add('faq-open');trigger.setAttribute('aria-expanded','true');body.style.maxHeight=body.scrollHeight+'px';}});});})();
})();
</script>

<?php get_footer(); ?>
