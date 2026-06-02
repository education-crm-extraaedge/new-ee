<?php
/**
 * Single Product Template — Higher Education CRM redesign
 *
 * Full design supplied by the editor (Higher Education CRM landing
 * page) ported into the WordPress theme:
 *   • <!doctype>, <html>, <head> and <body> shells come from
 *     header.php / footer.php as usual.
 *   • The design's own SEO + Open Graph + Twitter + JSON-LD schema
 *     blocks are injected into <head> via the wp_head action so the
 *     theme can still serve other CPTs from header.php unchanged.
 *   • Inline <style> stays in-page so its rules don't leak into other
 *     templates; same for the page's <script> at the end.
 *   • Layout / copy is rendered as static HTML — to edit content,
 *     edit this template directly (no post-meta wiring on this
 *     redesign by request).
 *
 * Template Name: Product Landing Page
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* ─────────────────────────────────────────────────────────────────
 * SEO / Open Graph / Twitter / JSON-LD — injected into the document
 * <head> only when WordPress is rendering a 'product' singular page.
 * Title comes from WP's title-tag theme support so it stays in sync
 * with the actual post title; everything else is verbatim from the
 * supplied redesign brief.
 * ──────────────────────────────────────────────────────────────── */
add_action('wp_head', function () {
    if (!is_singular('product')) return;
    ?>
    <meta name="description" content="ExtraaEdge Higher Education CRM helps universities and standalone institutes automate admissions, manage leads, and boost enrollment by 2X. Book a free demo today." />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="ExtraaEdge" />
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:title" content="Higher Education CRM Software | ExtraaEdge – Automate Admissions" />
    <meta property="og:description" content="Manage leads, automate communication, and increase student enrollments with ExtraaEdge Higher Education CRM. Trusted by 500+ educational institutions." />
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
    <meta property="og:image" content="https://www.extraaedge.com/assets/og/higher-education-crm-og.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:site_name" content="ExtraaEdge" />
    <meta property="og:locale" content="en_IN" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Higher Education CRM Software | Automate Admissions | ExtraaEdge" />
    <meta name="twitter:description" content="Boost enrollments with AI-driven lead management, multi-channel communication &amp; real-time analytics. Try ExtraaEdge Higher Education CRM." />
    <meta name="twitter:image" content="https://www.extraaedge.com/assets/og/higher-education-crm-og.png" />
    <meta name="twitter:site" content="@ExtraaEdge" />
    <meta name="twitter:creator" content="@ExtraaEdge" />
    <script type="application/ld+json">{
    "@context": "https://schema.org","@type": "SoftwareApplication",
    "name": "ExtraaEdge Higher Education CRM","applicationCategory": "BusinessApplication",
    "operatingSystem": "Web, Android, iOS","url": "<?php echo esc_url(get_permalink()); ?>",
    "description": "ExtraaEdge Higher Education CRM is an AI-powered admissions and lead management platform built for universities and standalone institutes to automate enrollment funnels, manage communications, and boost student admissions.",
    "offers": { "@type": "Offer", "priceCurrency": "USD", "price": "Contact for pricing", "availability": "https://schema.org/InStock" },
    "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.5", "reviewCount": "350" },
    "provider": { "@type": "Organization", "name": "ExtraaEdge", "url": "https://www.extraaedge.com" }
    }</script>
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
.kicker .num{font-weight:800;font-size:11.5px;color:var(--orange-deep);letter-spacing:.02em}
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
.btn-onnavy{background:#fff;color:var(--blue)}
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
.hero-layout{display:grid;grid-template-columns:1.05fr .95fr;gap:64px;align-items:center;padding:78px 0 92px;position:relative;z-index:2}
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
.hero-form-card::before{content:"Book a Free Demo";position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--grad-o);color:#fff;padding:7px 20px;border-radius:var(--r-pill);font-weight:700;font-size:11px;letter-spacing:.04em;white-space:nowrap;box-shadow:var(--sh-o)}
.secure-label{text-align:center;margin-top:18px;font-size:10.5px;color:var(--ink-mute);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
.logos{background:var(--white);padding:clamp(56px,7vw,86px) 0;overflow:hidden;border-top:1px solid var(--line)}
.logos-head{text-align:center;max-width:700px;margin:0 auto 44px;padding:0 24px}
.logos-kicker{font-weight:600;color:var(--ink-soft);font-size:14.5px;margin-bottom:10px}
.logos-title{font-weight:800;font-size:clamp(26px,3.4vw,42px);letter-spacing:-.04em;line-height:1.08;margin-bottom:14px;color:var(--blue)}
.logos-sub{color:var(--ink-soft);font-size:16px}
.marquee-wrap{position:relative;padding:8px 0}
.marquee-wrap::before,.marquee-wrap::after{content:"";position:absolute;top:0;width:150px;height:100%;z-index:2;pointer-events:none}
.marquee-wrap::before{left:0;background:linear-gradient(90deg,#fff,transparent)}
.marquee-wrap::after{right:0;background:linear-gradient(270deg,#fff,transparent)}
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
.toc-mobile-toggle{display:none;position:fixed;bottom:96px;right:24px;width:54px;height:54px;background:var(--grad-o);border-radius:50%;border:none;cursor:pointer;box-shadow:var(--sh-o);z-index:1000;transition:var(--t);align-items:center;justify-content:center}
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
.section{padding:clamp(60px,8vw,104px) 0}
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
.features-head{text-align:center;max-width:640px;margin:0 auto 46px}
.features-h2{font-weight:800;font-size:clamp(26px,3.4vw,42px);letter-spacing:-.04em;line-height:1.08;color:var(--blue)}
.features-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:18px}
.feat-card{background:#fff;border:1px solid var(--line);border-radius:var(--r-l);padding:18px;display:flex;flex-direction:column;text-align:center;transition:var(--t);box-shadow:var(--sh-1)}
.feat-card:hover{transform:translateY(-8px);box-shadow:var(--sh-3)}
.feat-img-wrap{width:100%;height:112px;background:var(--panel);border:1px solid var(--line);border-radius:var(--r);margin-bottom:15px;display:flex;align-items:center;justify-content:center;overflow:hidden}
.feat-img{max-width:88%;max-height:88%;object-fit:contain;transition:var(--t)}
.feat-card:hover .feat-img{transform:scale(1.07)}
.feat-title{font-weight:700;font-size:13px;color:var(--blue);display:flex;flex-direction:column;align-items:center;gap:8px;line-height:1.35;transition:.3s}
.feat-card:hover .feat-title{color:var(--orange-deep)}
.feat-dot{width:6px;height:6px;background:var(--orange);border-radius:50%}
.alt-section{padding:clamp(56px,7vw,92px) 0;overflow:hidden}
.alt-section:nth-of-type(even){background:var(--panel)}
.alt-layout{display:flex;align-items:center;gap:62px;flex-wrap:wrap}
.alt-content{flex:1;min-width:300px}
.alt-visual{flex:1.02;min-width:300px;position:relative}
.alt-h2{font-weight:800;font-size:clamp(26px,3.5vw,40px);letter-spacing:-.04em;line-height:1.1;margin-bottom:16px;color:var(--blue)}
.alt-desc{color:var(--ink-soft);font-size:16px;line-height:1.8;margin-bottom:24px}
.alt-h3{font-weight:800;font-size:11.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-deep);margin-bottom:16px}
.feature-list{list-style:none;display:flex;flex-direction:column;gap:10px;margin-bottom:30px}
.feature-item{display:flex;align-items:flex-start;gap:13px;background:#fff;padding:15px 17px;border-radius:var(--r);border:1px solid var(--line);transition:var(--t);box-shadow:var(--sh-1)}
.feature-item:hover{transform:translateX(6px);box-shadow:var(--sh-2);border-color:var(--orange-100)}
.feature-icon{width:24px;height:24px;background:var(--grad-o);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;box-shadow:0 6px 14px -6px rgba(222,110,48,.7)}
.feature-icon svg{width:13px;height:13px;fill:#fff}
.feature-text{font-size:14.5px;font-weight:500;color:var(--ink-soft);line-height:1.55}
.alt-img{width:100%;height:auto;border:1px solid var(--line);border-radius:var(--r-l);box-shadow:var(--sh-3)}
.alt-frame{position:relative}
.alt-frame::before{display:none}
.float-badge{position:absolute;background:rgba(255,255,255,.92);backdrop-filter:blur(10px);padding:10px 16px;border:1px solid var(--line);border-radius:var(--r-pill);display:flex;align-items:center;gap:9px;font-weight:700;font-size:11.5px;color:var(--blue);z-index:4;white-space:nowrap;box-shadow:var(--sh-2)}
@keyframes floatUD{0%,100%{transform:translateY(0)}50%{transform:translateY(-14px)}}
.float-anim{animation:floatUD 6.5s ease-in-out infinite}
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
.automation-track{margin-top:28px;padding-top:22px;border-top:1px solid var(--line)}
.auto-track-label{font-size:10px;font-weight:800;color:var(--ink-mute);margin-bottom:15px;text-align:center;text-transform:uppercase;letter-spacing:.12em}
.flow-viz{display:flex;align-items:center;justify-content:space-between}
.flow-node{font-size:10px;font-weight:800;text-transform:uppercase;color:var(--ink-soft);background:var(--panel);border:1px solid var(--line);padding:9px 13px;border-radius:12px;display:flex;flex-direction:column;align-items:center;gap:5px;letter-spacing:.03em}
.flow-node-icon{font-size:15px}
.flow-node-ai{background:var(--grad-b);color:#fff;border-color:transparent}
.flow-line{flex:1;height:3px;background:var(--line-2);margin:0 10px;position:relative;overflow:hidden;border-radius:9px}
.flow-shimmer{position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,var(--orange),transparent);animation:shimmer 2.6s infinite linear}
@keyframes shimmer{from{left:-100%}to{left:100%}}
.testimonials-section{padding:clamp(70px,8vw,110px) 0;background:var(--grad-b);position:relative;overflow:hidden;color:#fff}
.testi-mesh{position:absolute;inset:0;pointer-events:none;z-index:1;overflow:hidden}
.testi-pulse-line{position:absolute;background:linear-gradient(90deg,transparent,rgba(222,110,48,.3),transparent);height:1px;width:200%;opacity:0;left:-50%}
.testi-section-active .testi-pulse-line{opacity:1;animation:testiLine 6s infinite linear}
@keyframes testiLine{from{transform:translateX(-25%)}to{transform:translateX(25%)}}
.testi-inner{position:relative;z-index:10}
.testi-header{text-align:center;margin-bottom:52px;opacity:0;transform:translateY(26px);transition:all .7s var(--ease)}
.testi-section-active .testi-header{opacity:1;transform:none}
.testi-header .kicker{background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.16)}
.testi-header .kicker .num,.testi-header .kicker .lbl{color:#fff}
.testi-title{font-weight:800;font-size:clamp(28px,4.3vw,52px);letter-spacing:-.04em;line-height:1.06;margin-bottom:16px}
.testi-title .uacc{-webkit-text-fill-color:initial;background:none;color:var(--orange-l)}
.testi-sub{color:rgba(255,255,255,.74);font-size:16px;max-width:600px;margin:0 auto}
.testi-sub strong{color:#fff}
.testi-metrics{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:52px}
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
.ai-demo-section{padding:clamp(60px,8vw,104px) 0;background:#fff;overflow:hidden}
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
.faq-section{padding:clamp(60px,8vw,104px) 0;background:var(--panel)}
.faq-container{max-width:900px;margin:0 auto;padding:0 32px}
.faq-header{text-align:center;margin-bottom:44px}
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
.cbar-inner{max-width:var(--maxw);margin:0 auto;background:rgba(255,255,255,.86);backdrop-filter:blur(16px) saturate(160%);border:1px solid var(--line-2);border-radius:var(--r-l);box-shadow:var(--sh-3);display:flex;align-items:center;gap:20px;padding:14px 16px 14px 24px}
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
.wrap,.faq-container,.testi-inner{position:relative;z-index:1}
#what-is-education-crm,.features,.ai-demo-section,#products,.faq-section{position:relative}
#what-is-education-crm::before,.features::before,.ai-demo-section::before,#products::before,.faq-section::before{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;background-image:radial-gradient(rgba(25,51,93,.05) 1.1px,transparent 1.1px);background-size:24px 24px;-webkit-mask-image:radial-gradient(115% 80% at 50% 0%,#000,transparent 78%);mask-image:radial-gradient(115% 80% at 50% 0%,#000,transparent 78%)}
#what-is-education-crm::after{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;background:radial-gradient(38% 46% at 100% 4%,rgba(222,110,48,.10),transparent 62%),radial-gradient(34% 42% at 0% 96%,rgba(25,51,93,.06),transparent 64%)}
.features::after{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;background:radial-gradient(36% 60% at 4% 100%,rgba(25,51,93,.07),transparent 60%),radial-gradient(30% 50% at 98% 0%,rgba(222,110,48,.07),transparent 62%)}
.ai-demo-section::after{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;background:radial-gradient(40% 52% at 78% 50%,rgba(222,110,48,.08),transparent 60%),radial-gradient(34% 46% at 6% 12%,rgba(25,51,93,.06),transparent 64%)}
#products::after{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;background:radial-gradient(40% 52% at 100% 0%,rgba(25,51,93,.07),transparent 62%),radial-gradient(34% 46% at 0% 100%,rgba(222,110,48,.07),transparent 64%)}
.faq-section::after{content:'';position:absolute;inset:0;z-index:0;pointer-events:none;background:radial-gradient(46% 40% at 50% 0%,rgba(222,110,48,.06),transparent 66%)}
.testimonials-section::before{content:'';position:absolute;inset:0;z-index:1;pointer-events:none;background-image:radial-gradient(rgba(255,255,255,.06) 1.1px,transparent 1.1px);background-size:26px 26px;-webkit-mask-image:radial-gradient(120% 90% at 50% 0%,#000,transparent 80%);mask-image:radial-gradient(120% 90% at 50% 0%,#000,transparent 80%)}
body.ee-product-page,body.ee-product-page html{max-width:100%}
.ee-product-page img,.ee-product-page svg,.ee-product-page iframe,.ee-product-page video{max-width:100%}
.ee-product-page button,.ee-product-page a.btn,.ee-product-page .toc-link,.ee-product-page .faq-trigger{touch-action:manipulation}
.cbar-inner{margin-bottom:env(safe-area-inset-bottom,0px)}
@media(min-width:1600px){:root{--maxw:1340px}}
@media(max-width:1200px){.toc-zone-wrapper{display:block;padding:0}.toc-column{display:none}.toc-content-column>section{padding-left:0}.toc-mobile-toggle{display:flex}.toc-mobile-overlay,.toc-mobile-panel{display:block}}
@media(max-width:1080px){.hero-layout{grid-template-columns:1fr;gap:48px;padding:60px 0 78px}.hero-right{justify-content:center}.hero-form-aside{max-width:540px;margin:0 auto}.hero-badge{align-self:center}.what-layout{grid-template-columns:1fr;gap:38px}.flow-panel{position:relative;top:0}.features-grid{grid-template-columns:repeat(3,1fr)}.ai-demo-inner{grid-template-columns:1fr;gap:38px}.ai-story-engine{transform:scale(.86)}.ai-cta-content{text-align:center}.ai-cta-content .kicker,.ai-cta-actions{justify-content:center;align-items:center}.ai-cta-sub{margin-left:auto;margin-right:auto}.testi-metrics{grid-template-columns:repeat(2,1fr)}.cbar-rating{display:none}}
@media(max-width:980px){.hero-left{align-items:center;text-align:center}.hero-desc,.proof,.cta-row{margin-left:auto;margin-right:auto}.proof{display:inline-grid;text-align:left}.tag-row,.compliance-row{justify-content:center}}
@media(max-width:880px){.alt-layout{flex-direction:column;gap:34px}.alt-visual{order:-1!important;width:100%}.testi-cards{grid-template-columns:1fr;max-width:480px;margin-left:auto;margin-right:auto}.products-inner{flex-direction:column}.products-card{min-width:0;width:100%}.ai-story-engine{display:flex;flex-direction:column;align-items:center;gap:12px;height:auto;transform:none;width:100%}.workflow-svg{display:none}.expert-center{width:120px;height:120px;margin-bottom:6px}.expert-ring{display:none}.workflow-node{position:static!important;transform:none!important;opacity:1!important;width:100%;max-width:420px;top:auto;right:auto;bottom:auto;left:auto}}
@media(max-width:680px){body.ee-product-page{font-size:15.5px}.wrap,.faq-container{padding-left:18px;padding-right:18px}.section{padding:clamp(48px,11vw,72px) 0}.alt-section{padding:48px 0}.stat-strip{grid-template-columns:repeat(3,1fr);gap:8px}.stat-cell{padding:16px 8px}.features-grid{grid-template-columns:1fr 1fr}.btn{width:100%}.cta-row{flex-direction:column}.cta-row .btn{width:100%}.float-badge{display:none}.product-grid{grid-template-columns:1fr}.automation-track{display:none}.growth-card{flex-direction:column;text-align:center;gap:14px;padding:24px}.testi-metrics{grid-template-columns:1fr 1fr}.toc-mobile-toggle{bottom:auto;top:14px;right:14px;width:46px;height:46px}.toc-mobile-panel{width:100%;max-width:none}.faq-trigger{padding:18px 18px}.faq-q{font-size:15px;gap:10px}.faq-inner{padding:0 18px 20px 32px}.card-body{padding:24px}.cbar{padding:0 10px calc(10px + env(safe-area-inset-bottom,0px))}.cbar-inner{padding:11px 11px 11px 14px;gap:11px;border-radius:var(--r)}.cbar-tag{display:none}.cbar-txt b{font-size:13px;line-height:1.25}.cbar-txt span{display:none}.cbar .btn{width:auto;padding:12px 18px;font-size:13.5px}}
@media(max-width:480px){.stat-strip{grid-template-columns:1fr}.features-grid{grid-template-columns:1fr;max-width:360px;margin-left:auto;margin-right:auto}.testi-metrics{grid-template-columns:1fr}.hero-form-card{padding:24px 20px}.compliance-row{gap:14px}.marquee-wrap::before,.marquee-wrap::after{width:60px}}
@media(max-width:380px){.hero-h1{font-size:31px}.cbar-txt b{font-size:12px}.cbar .btn{padding:11px 14px}}
@media(max-height:560px) and (orientation:landscape){.toc-mobile-panel{padding-top:14px}.hero-layout{padding:40px 0 56px}}
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
            <li class="toc-item"><a href="#top" class="toc-link toc-link-mobile" data-section="top"><span class="toc-num">01</span>Home</a></li>
            <li class="toc-item"><a href="#trusted-institutions" class="toc-link toc-link-mobile"><span class="toc-num">02</span>Trusted Institutions</a></li>
            <li class="toc-item"><a href="#what-is-education-crm" class="toc-link toc-link-mobile"><span class="toc-num">03</span>Higher Education CRM</a></li>
            <li class="toc-item"><a href="#features" class="toc-link toc-link-mobile"><span class="toc-num">04</span>Features</a></li>
            <li class="toc-item"><a href="#lead-management" class="toc-link toc-link-mobile"><span class="toc-num">05</span>Lead Channels</a></li>
            <li class="toc-item"><a href="#lead-nurturing" class="toc-link toc-link-mobile"><span class="toc-num">06</span>Communication</a></li>
            <li class="toc-item"><a href="#lead-scoring" class="toc-link toc-link-mobile"><span class="toc-num">07</span>Application Forms</a></li>
            <li class="toc-item"><a href="#reporting" class="toc-link toc-link-mobile"><span class="toc-num">08</span>Reporting Dashboard</a></li>
            <li class="toc-item"><a href="#marketing-automation" class="toc-link toc-link-mobile"><span class="toc-num">09</span>Marketing Automation</a></li>
            <li class="toc-item"><a href="#integrations" class="toc-link toc-link-mobile"><span class="toc-num">10</span>Integrations</a></li>
            <li class="toc-item"><a href="#support" class="toc-link toc-link-mobile"><span class="toc-num">11</span>Support &amp; Training</a></li>
            <li class="toc-item"><a href="#vidyagpt" class="toc-link toc-link-mobile"><span class="toc-num">12</span>VidyaGPT AI</a></li>
            <li class="toc-item"><a href="#products" class="toc-link toc-link-mobile"><span class="toc-num">13</span>Products</a></li>
            <li class="toc-item"><a href="#testimonials" class="toc-link toc-link-mobile"><span class="toc-num">14</span>Testimonials</a></li>
            <li class="toc-item"><a href="#demo" class="toc-link toc-link-mobile"><span class="toc-num">15</span>Book Demo</a></li>
            <li class="toc-item"><a href="#faq" class="toc-link toc-link-mobile"><span class="toc-num">16</span>FAQ</a></li>
        </ul>
    </nav>
</div>

<main class="hero" id="top">
    <div class="hero-grid-bg"></div>
    <div class="wrap">
        <div class="hero-layout">
            <div class="hero-left">
                <div class="hero-badge reveal"><span class="pulse-dot"></span>500+ institutions scaling admissions with AI</div>
                <h1 class="hero-h1 reveal">Higher Education CRM for universities &amp; <span class="uacc">standalone institutes</span></h1>
                <p class="hero-desc reveal">An exclusively designed <strong>CRM for higher education</strong> that digitises your entire admissions process and boosts conversion rates by 2X — trusted by leading universities and standalone institutes across India.</p>
                <ul class="proof reveal">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>Trusted by 500+ educational institutions</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>Helped enroll 50,000+ students</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>Managed 1 million+ admissions leads</li>
                </ul>
                <div class="stat-strip reveal">
                    <div class="stat-cell"><span class="stat-num">2X</span><span class="stat-lab">Higher Conversion</span></div>
                    <div class="stat-cell"><span class="stat-num">90%</span><span class="stat-lab">Faster Response</span></div>
                    <div class="stat-cell"><span class="stat-num">50%</span><span class="stat-lab">Lower Cost</span></div>
                </div>
                <div class="result-strip reveal"><span class="pulse-dot"></span>Increase admissions by 2X within your first 90 days</div>
                <nav class="tag-row reveal" aria-label="Industry segments">
                    <span class="tag">Universities</span><span class="tag">Colleges</span><span class="tag">Standalone Institutes</span><span class="tag">EdTech</span><span class="tag">Higher Education CRM</span><span class="tag">Overseas</span>
                </nav>
                <div class="cta-row reveal">
                    <a href="#admission-form" class="btn btn-primary" onclick="scrollToForm(event)">Book a Demo<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                    <a href="#" class="btn btn-outline">Watch Product Tour</a>
                </div>
                <footer class="trust-bar reveal">
                    <div class="trust-rating"><span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>Rated 4.9/5 by education leaders <span>(500+ verified reviews)</span></div>
                    <div class="compliance-row">
                        <div class="compliance-item"><img src="https://www.extraaedge.com/wp-content/uploads/2025/09/GDPR-NEW.png" alt="GDPR Compliant Higher Education CRM" width="24" height="24"><span>GDPR Compliant</span></div>
                        <div class="compliance-item"><img src="https://www.extraaedge.com/wp-content/uploads/2025/09/iso-0001.png" alt="ISO Certified CRM Software" width="24" height="24"><span>ISO Certified</span></div>
                        <div class="compliance-item"><span style="font-size:18px">&#9729;&#65039;</span><span>Enterprise-Grade Secure Cloud</span></div>
                    </div>
                </footer>
            </div>
            <div class="hero-right">
                <aside class="hero-form-aside reveal" id="admission-form" aria-label="Book Demo Form">
                    <div class="hero-form-card">
                        <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
                        <div id="ee-form-7"></div>
                        <p class="secure-label">&#128274; Secure Data Transmission Active</p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>

<section class="logos" id="trusted-institutions" aria-label="Trusted Institutions">
    <div class="logos-head reveal">
        <div class="kicker center"><span class="lbl">Trusted Institutions</span></div>
        <p class="logos-kicker">Trusted by 500+ institutions growing faster than ever</p>
        <h2 class="logos-title">Why educational leaders choose <span class="uacc">ExtraaEdge CRM</span></h2>
        <p class="logos-sub">AI-powered <strong>admission automation</strong> and <strong>enrollment management</strong> built for the next generation of education leaders.</p>
    </div>
    <div class="marquee-wrap">
        <div class="marquee-track marquee-left">
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp" alt="XISS uses ExtraaEdge Higher Education CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg" alt="Institution using student enrollment CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png" alt="Anant National University admissions CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp" alt="SR University lead management for colleges" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp" alt="Hamstek higher education CRM software" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp" alt="Adani University admission CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp" alt="Techno India Group CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp" alt="Institution higher education CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp" alt="XISS uses ExtraaEdge Higher Education CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg" alt="Institution using student enrollment CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png" alt="Anant National University admissions CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp" alt="SR University lead management for colleges" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp" alt="Hamstek higher education CRM software" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp" alt="Adani University admission CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp" alt="Techno India Group CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp" alt="Institution higher education CRM" loading="lazy"></div>
        </div>
        <div class="marquee-track marquee-right" style="margin-top:14px">
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/JGI-JAIN-2.webp" alt="Jain University higher education CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/mit-shillong.png" alt="MIT Shillong student lead tracking CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/isdi.webp" alt="ISDI admission management CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/09/jio-v3-3.png" alt="Jio education marketing automation" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/dpu-3.webp" alt="DPU enrollment management system" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Graphic-Era-3.webp" alt="Graphic Era lead nurturing for universities" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/fostima.webp" alt="Fostima CRM for educational institutions" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/JGI-JAIN-2.webp" alt="Jain University higher education CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/mit-shillong.png" alt="MIT Shillong student lead tracking CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/isdi.webp" alt="ISDI admission management CRM" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/09/jio-v3-3.png" alt="Jio education marketing automation" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/dpu-3.webp" alt="DPU enrollment management system" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Graphic-Era-3.webp" alt="Graphic Era lead nurturing for universities" loading="lazy"></div>
            <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/fostima.webp" alt="Fostima CRM for educational institutions" loading="lazy"></div>
        </div>
    </div>
    <div class="logos-foot reveal">
        <a href="#admission-form" class="btn btn-primary" onclick="scrollToForm(event)">Start Converting Today<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        <div class="live-indicator"><span class="green-dot"></span><span>124 admissions processed in the last hour</span></div>
    </div>
</section>

<div class="toc-zone-wrapper" id="toc-zone-wrapper">
    <div class="toc-column" id="toc-column">
        <nav class="toc-wrapper" id="toc" aria-label="Table of Contents">
            <div class="toc-progress" id="toc-progress"></div>
            <div class="toc-header">
                <div class="toc-icon"><svg viewBox="0 0 24 24"><path d="M3 9h14V7H3v2zm0 4h14v-2H3v2zm0 4h14v-2H3v2zm16 0h2v-2h-2v2zm0-10v2h2V7h-2zm0 6h2v-2h-2v2z"/></svg></div>
                <p class="toc-title">Index</p>
            </div>
            <ul class="toc-list" id="toc-list">
                <li class="toc-item"><a href="#top" class="toc-link" data-section="top"><span class="toc-num">01</span>Home</a></li>
                <li class="toc-item"><a href="#trusted-institutions" class="toc-link"><span class="toc-num">02</span>Trusted Institutions</a></li>
                <li class="toc-item"><a href="#what-is-education-crm" class="toc-link"><span class="toc-num">03</span>Higher Education CRM</a></li>
                <li class="toc-item"><a href="#features" class="toc-link"><span class="toc-num">04</span>Features</a></li>
                <li class="toc-item"><a href="#lead-management" class="toc-link"><span class="toc-num">05</span>Lead Channels</a></li>
                <li class="toc-item"><a href="#lead-nurturing" class="toc-link"><span class="toc-num">06</span>Communication</a></li>
                <li class="toc-item"><a href="#lead-scoring" class="toc-link"><span class="toc-num">07</span>Application Forms</a></li>
                <li class="toc-item"><a href="#reporting" class="toc-link"><span class="toc-num">08</span>Reporting Dashboard</a></li>
                <li class="toc-item"><a href="#marketing-automation" class="toc-link"><span class="toc-num">09</span>Marketing Automation</a></li>
                <li class="toc-item"><a href="#integrations" class="toc-link"><span class="toc-num">10</span>Integrations</a></li>
                <li class="toc-item"><a href="#support" class="toc-link"><span class="toc-num">11</span>Support &amp; Training</a></li>
                <li class="toc-item"><a href="#vidyagpt" class="toc-link"><span class="toc-num">12</span>VidyaGPT AI</a></li>
                <li class="toc-item"><a href="#products" class="toc-link"><span class="toc-num">13</span>Products</a></li>
                <li class="toc-item"><a href="#testimonials" class="toc-link"><span class="toc-num">14</span>Testimonials</a></li>
                <li class="toc-item"><a href="#demo" class="toc-link"><span class="toc-num">15</span>Book Demo</a></li>
                <li class="toc-item"><a href="#faq" class="toc-link"><span class="toc-num">16</span>FAQ</a></li>
            </ul>
        </nav>
    </div>
    <div class="toc-content-column">

        <section class="section section-b" id="what-is-education-crm" aria-labelledby="edu-crm-h">
            <div class="wrap">
                <div class="what-layout">
                    <div>
                        <div class="kicker reveal"><span class="lbl">The Fundamentals</span><span class="ln"></span></div>
                        <h2 id="edu-crm-h" class="what-h2 reveal">What is a Higher Education CRM?</h2>
                        <p class="what-p reveal">A <strong>Higher Education CRM</strong> is purpose-built software that manages the student lifecycle — from first inquiry through enrollment. Unlike generic CRMs, it's designed specifically for the workflows of colleges and universities. It centralizes all student and applicant data in one place, automates repetitive tasks like follow-ups, email campaigns, and application tracking, and enables personalized, multi-channel communication with prospects.</p>
                        <p class="what-p reveal">Managing growing inquiry volumes manually leads to delays, errors, and missed opportunities. A <strong>CRM for higher education</strong> replaces scattered spreadsheets and siloed processes with a single, automated system that keeps students engaged and staff focused on high-value work. It provides analytics to guide admissions strategy and tracks payments, reminders, and engagement across the enrollment funnel.</p>
                        <p class="what-p reveal">It isn't just an efficiency tool — it's infrastructure for competing in a market where student expectations for timely, personalized communication are higher than ever. With built-in <strong>education marketing automation</strong>, institutions nurture leads on autopilot while counselors focus on high-priority conversions.</p>
                        <div class="growth-card reveal">
                            <div class="growth-val">33.12%</div>
                            <div class="growth-text"><strong>India's GER for tertiary education</strong> reached 33.12% in 2023 — meaning institutions must handle higher student volumes without proportionally increasing overhead. A robust <strong>student enrollment CRM</strong> is essential to manage this rising demand.</div>
                        </div>
                    </div>
                    <div class="flow-panel reveal" id="flow-zone">
                        <div class="flow-live"><span class="pulse-dot"></span>Status — Processing Admissions</div>
                        <div class="flow-steps" id="flow-stack">
                            <div class="flow-step" data-step="0"><div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><span class="step-label">Lead Captured</span></div>
                            <div class="flow-step" data-step="1"><div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.19 11.8 19.79 19.79 0 0 1 1.12 3.14 2 2 0 0 1 3.1 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div><span class="step-label">Auto-Nurturing Sent</span></div>
                            <div class="flow-step" data-step="2"><div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div><span class="step-label">Document Verification</span></div>
                            <div class="flow-step" data-step="3"><div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div><span class="step-label">Fee Collection</span></div>
                            <div class="flow-step" data-step="4"><div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div><span class="step-label">Enrollment Confirmed</span></div>
                        </div>
                        <div class="data-log" id="data-log">
                            <div class="log-line">Initiating CRM admission core...</div>
                            <div class="log-line">Listening for new inquiries...</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-b" id="features" aria-labelledby="features-h">
            <div class="wrap">
                <div class="features-head reveal">
                    <div class="kicker center"><span class="lbl">Platform</span></div>
                    <h2 id="features-h" class="features-h2">Features that give you an edge</h2>
                </div>
                <div class="features-grid reveal">
                    <article class="feat-card"><div class="feat-img-wrap"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Comprehensive-ROI-Dashboard-1.webp" alt="Comprehensive ROI Dashboard for Higher Education CRM" class="feat-img" loading="lazy" width="200" height="110"></div><h3 class="feat-title"><span class="feat-dot"></span>Comprehensive ROI Dashboard</h3></article>
                    <article class="feat-card"><div class="feat-img-wrap"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Counselor-Productivity-Dashboard-1.webp" alt="Counselor Productivity Dashboard" class="feat-img" loading="lazy" width="200" height="110"></div><h3 class="feat-title"><span class="feat-dot"></span>Counselor Productivity Dashboard</h3></article>
                    <article class="feat-card"><div class="feat-img-wrap"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Robust-Communication-Dashboard-1.webp" alt="Robust Communication Dashboard" class="feat-img" loading="lazy" width="200" height="110"></div><h3 class="feat-title"><span class="feat-dot"></span>Robust Communication Dashboard</h3></article>
                    <article class="feat-card"><div class="feat-img-wrap"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Efficient-Adoption-Dashboard-1.webp" alt="Efficient Adoption Dashboard" class="feat-img" loading="lazy" width="200" height="110"></div><h3 class="feat-title"><span class="feat-dot"></span>Efficient Adoption Dashboard</h3></article>
                    <article class="feat-card"><div class="feat-img-wrap"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Self-generating-Report-Dashboard.webp" alt="Self-generating Report Dashboard" class="feat-img" loading="lazy" width="200" height="110"></div><h3 class="feat-title"><span class="feat-dot"></span>Self-generating Report Dashboard</h3></article>
                </div>
            </div>
        </section>

        <section class="alt-section" id="lead-management" aria-labelledby="lead-mgmt-h">
            <div class="wrap"><div class="alt-layout">
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Lead Channels</span><span class="ln"></span></div>
                    <h2 id="lead-mgmt-h" class="alt-h2">Integrate all lead channels and auto-allocate leads</h2>
                    <p class="alt-desc">Manually entering each lead into a spreadsheet is cumbersome. With a <strong>higher education CRM</strong>, you integrate all lead sources and third-party vendors into a single system — minimising counselor effort, avoiding <strong>lead leakage</strong>, and optimising response time.</p>
                    <h3 class="alt-h3">Top Features</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Ad channel integration such as Google Adwords and Facebook Ads to avoid missing out on leads from paid sources.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Publisher panel integration to track and manage all publisher leads in a single system.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Social media integration across Facebook, Instagram, LinkedIn and Twitter to track interactions with leads and customers.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Auto-allocation to ensure the right counselors work on leads based on region or expertise.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Lead Management<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:8%;right:-10px"><span class="green-dot"></span>AI filtering junk leads</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Integrate-all-lead-channels-and-auto-allocate-leads.webp" alt="Integrate All Lead Channels and Auto-Allocate Leads in Higher Education CRM" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:10%;left:-10px"><span style="color:var(--orange)">&#9889;</span>Automated assignment active</div>
                </div>
            </div></div>
        </section>

        <section class="alt-section" id="lead-nurturing" aria-labelledby="nurturing-h">
            <div class="wrap"><div class="alt-layout">
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>Automating follow-ups</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Automate-all-communication-channels.webp" alt="Automate All Communication Channels in Higher Education CRM" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#128172;</span>Omnichannel connect active</div>
                </div>
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Communication</span><span class="ln"></span></div>
                    <h2 id="nurturing-h" class="alt-h2">Automate all communication channels</h2>
                    <p class="alt-desc">Manual communication is time-consuming and lowers productivity. With a <strong>CRM in higher education</strong>, you automate your entire communication across the admission cycle using our rule engine — assigning leads to counselors or triggering follow-ups automatically.</p>
                    <h3 class="alt-h3">Top Features</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Drip and trigger-based email campaigns to automate lead nurturing and keep prospects engaged.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Marketing automation to track campaign effectiveness and optimise future campaigns.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Inbuilt click-to-call to reduce response time and offer a personalised experience with web-based video calling.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Bulk SMS and two-way WhatsApp to reach prospects at the right time and nurture them.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Communication<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
            </div></div>
        </section>

        <section class="alt-section" id="lead-scoring" aria-labelledby="lead-score-h">
            <div class="wrap"><div class="alt-layout">
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Application Forms</span><span class="ln"></span></div>
                    <h2 id="lead-score-h" class="alt-h2">Customise and digitise application forms</h2>
                    <p class="alt-desc">Enough of time-consuming, manual, complicated application processes. Switch to our three-step online Application Management System to automate candidate management, improve conversions, and boost engagement. Design your own application forms and GD/PI workflows.</p>
                    <h3 class="alt-h3">Top Features</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Mobile-friendly application and communication to boost engagement, accessibility and user experience.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Application mapper to track student activity and know exactly which stage each applicant is at.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Integrated payment gateways for more control over transactions and effective monitoring.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Reminders and alerts for the counseling team to assist students with form filling.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Application Management<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>Digitising applications</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Robust-Communication-Dashboard.webp" alt="Customise and Digitise Application Forms Higher Education CRM" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#128200;</span>Online forms active</div>
                </div>
            </div></div>
        </section>

        <section class="alt-section" id="reporting" aria-labelledby="reporting-h">
            <div class="wrap"><div class="alt-layout">
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>Building analytics</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Efficient-Adoption-Dashboard.webp" alt="150+ Reports for Higher Education CRM" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#128202;</span>150+ reports live</div>
                </div>
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Reporting Dashboard</span><span class="ln"></span></div>
                    <h2 id="reporting-h" class="alt-h2">150+ reports for higher education CRM</h2>
                    <p class="alt-desc">Making data-driven decisions becomes effortless with actionable, insightful reports. Our inbuilt reporting dashboard offers 150+ tailored reports for deeper insight into counselor performance, marketing ROI, conversion funnels and more.</p>
                    <h3 class="alt-h3">Top Features</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">A single-view dashboard to analyse all marketing efforts and make data-driven decisions.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Publisher panel dashboard to analyse lead attribution from different publishers and track performance.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Counselor performance dashboard to measure individual counselors across different parameters.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">ROI and conversion reports to identify and replicate successful strategies from high-performing campaigns.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Reporting<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
            </div></div>
        </section>

        <section class="alt-section" id="marketing-automation" aria-labelledby="automation-h">
            <div class="wrap"><div class="alt-layout">
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Marketing Automation</span><span class="ln"></span></div>
                    <h2 id="automation-h" class="alt-h2">Workflow automation that saves counselor hours</h2>
                    <p class="alt-desc">Every minute is precious, and ExtraaEdge gets it. Our <strong>higher education CRM software</strong> features built-in <strong>education marketing automation</strong> that frees you from repetitive tasks, nurturing leads on auto-pilot with <strong>admission automation</strong> that truly works.</p>
                    <h3 class="alt-h3">Automate Marketing with ExtraaEdge</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Rule-based marketing to automate outreach based on specific criteria.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Advanced drip marketing to segment your audience and deliver targeted messages.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Two-way WhatsApp to personalize interaction and reduce response time.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Education chatbot with customizable chat flow to engage prospects 24/7.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Marketing Automation<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>Nurturing leads</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/08/Advanced-Marketing-Automation.webp" alt="Advanced Marketing Automation ExtraaEdge Higher Education CRM" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#129302;</span>Auto-pilot active</div>
                </div>
            </div></div>
        </section>

        <section class="alt-section" id="integrations" aria-labelledby="integrations-h">
            <div class="wrap"><div class="alt-layout">
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>Syncing data</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/08/Seamless-Integrations-Final.webp" alt="Seamless Integrations for higher education CRM software" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#128279;</span>Active integration</div>
                </div>
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Integrations</span><span class="ln"></span></div>
                    <h2 id="integrations-h" class="alt-h2">Seamless integrations: IVR, WhatsApp, ERP &amp; more</h2>
                    <p class="alt-desc">Whether it's social media, ERP systems, IVR, publishers, or payment gateways, ExtraaEdge <strong>Higher Education CRM</strong> integrates it all — a seamless flow of information while maintaining data integrity. The best <strong>student enrollment CRM</strong> connects with your entire tech stack effortlessly.</p>
                    <h3 class="alt-h3">How it works within ExtraaEdge</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Publisher integration eliminates manual oversight and effortlessly manages publisher leads.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">IVR integration guarantees data accuracy and equips your team with complete information for effective calls.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Payment gateway integration streamlines fee management and simplifies transactions.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Social media integration prevents lead leakage and ensures precise data capture.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Integrations<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
            </div></div>
        </section>

        <section class="alt-section" id="support" aria-labelledby="support-h">
            <div class="wrap"><div class="alt-layout">
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">Support &amp; Training</span><span class="ln"></span></div>
                    <h2 id="support-h" class="alt-h2">Responsive support and training</h2>
                    <p class="alt-desc">With ExtraaEdge, support and training are like having a personal coach by your side — always equipped with the right solutions. From navigating complex features to optimizing strategies, we empower you to excel with our <strong>higher education CRM software</strong>.</p>
                    <h3 class="alt-h3">Unmatched dedicated support, 24/7</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">24-hour ticket resolution so you're never stuck for long and productivity is maintained.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Dedicated CSMs assigned to consult and keep you at the forefront of admissions trends.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Technical account managers who quickly address and resolve issues to minimize disruptions.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Comprehensive CRM training to ensure 100% system adoption by your team.</span></li>
                    </ul>
                    <a href="#" class="btn btn-outline">Explore Support &amp; Training<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>Support active</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2024/08/Responsive-Support-and-Training02.webp" alt="Responsive Support and Training for higher education CRM" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#128222;</span>Fast resolution</div>
                </div>
            </div></div>
        </section>

        <section class="alt-section" id="vidyagpt" aria-labelledby="vidyagpt-h">
            <div class="wrap"><div class="alt-layout">
                <div class="alt-visual reveal">
                    <div class="float-badge" style="top:12%;left:-10px"><span class="green-dot"></span>VidyaGPT active</div>
                    <div class="float-anim alt-frame"><img src="https://www.extraaedge.com/wp-content/uploads/2025/05/vidya-ai-feature02.webp" alt="VidyaGPT AI Chatbot for higher education CRM admission automation" class="alt-img" loading="lazy" width="600" height="400"></div>
                    <div class="float-badge" style="bottom:16%;right:-10px"><span style="color:var(--orange)">&#129302;</span>AI-powered inquiry</div>
                </div>
                <article class="alt-content reveal">
                    <div class="kicker"><span class="lbl">VidyaGPT AI</span><span class="ln"></span></div>
                    <h2 id="vidyagpt-h" class="alt-h2">VidyaGPT AI chatbot for inquiries</h2>
                    <p class="alt-desc">In today's AI-driven age, keeping up matters. VidyaGPT AI is the most intelligent way of answering student queries — trained and designed specifically for your institute, providing accurate information 24/7. It assists students and empowers counselors, creating a positive, efficient admissions experience for everyone.</p>
                    <h3 class="alt-h3">What it does within ExtraaEdge</h3>
                    <ul class="feature-list">
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Trained exclusively on your institute's data using proprietary Edu LLMs.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Provides 24/7 support for students and admissions teams.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Delivers highly relevant, personalized answers to every query.</span></li>
                        <li class="feature-item"><span class="feature-icon"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text">Frees your admissions team for strategic tasks and engagement.</span></li>
                    </ul>
                    <a href="#" class="btn btn-primary">Explore VidyaGPT AI<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </article>
            </div></div>
        </section>

        <section class="section section-b" id="products" aria-labelledby="cta-h">
            <div class="wrap"><div class="products-inner">
                <div class="products-content reveal">
                    <div class="kicker"><span class="lbl">Products</span><span class="ln"></span></div>
                    <h2 id="cta-h" class="products-h2">Ready to move to a modern higher education CRM?</h2>
                    <p class="products-sub">Powerful <strong>CRM for higher education</strong> &amp; <strong>admission automation</strong> software that helps your teams increase, manage and predict admissions.</p>
                    <a href="#admission-form" class="btn btn-primary btn-lg" onclick="scrollToForm(event)">Book a Demo<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </div>
                <div class="products-card reveal">
                    <p class="featured-label">Featured Apps</p>
                    <div class="product-grid">
                        <a href="https://www.extraaedge.com/centralised-lead-management/" class="product-item" target="_blank" rel="noopener"><div class="product-logo"><img src="https://www.extraaedge.com/wp-content/uploads/2022/06/whatsapp-3.png" alt="Lead Management for higher education CRM" loading="lazy" width="40" height="40"></div><h4>Lead Management</h4><span class="product-view-link">View Product &#8594;</span></a>
                        <a href="https://www.extraaedge.com/strategic-lead-nurturing/" class="product-item" target="_blank" rel="noopener"><div class="product-logo"><img src="https://www.extraaedge.com/wp-content/uploads/2022/06/app-development-1.png" alt="Lead Nurturing for higher education" loading="lazy" width="40" height="40"></div><h4>Lead Nurturing</h4><span class="product-view-link">View Product &#8594;</span></a>
                        <a href="https://www.extraaedge.com/advanced-marketing-automation/" class="product-item" target="_blank" rel="noopener"><div class="product-logo"><img src="https://www.extraaedge.com/wp-content/uploads/2022/06/chatbot-2-e1654579573780.png" alt="Marketing Automation for higher education CRM" loading="lazy" width="40" height="40"></div><h4>Marketing Automation</h4><span class="product-view-link">View Product &#8594;</span></a>
                        <a href="https://www.extraaedge.com/responsive-support-and-training/" class="product-item" target="_blank" rel="noopener"><div class="product-logo"><img src="https://www.extraaedge.com/wp-content/uploads/2023/11/interactive-voice-response.png" alt="Support and Training for higher education CRM" loading="lazy" width="40" height="40"></div><h4>Support &amp; Training</h4><span class="product-view-link">View Product &#8594;</span></a>
                    </div>
                    <div class="automation-track">
                        <p class="auto-track-label">Live Automation Stream</p>
                        <div class="flow-viz">
                            <div class="flow-node"><span class="flow-node-icon">&#128229;</span>Lead</div>
                            <div class="flow-line"><div class="flow-shimmer"></div></div>
                            <div class="flow-node flow-node-ai"><span class="flow-node-icon">&#9881;&#65039;</span>AI Engine</div>
                            <div class="flow-line"><div class="flow-shimmer"></div></div>
                            <div class="flow-node"><span class="flow-node-icon">&#127891;</span>Admission</div>
                        </div>
                    </div>
                </div>
            </div></div>
        </section>

        <section class="testimonials-section" id="testimonials" aria-labelledby="testi-title">
            <div class="testi-mesh" id="testi-mesh"></div>
            <div class="wrap testi-inner">
                <header class="testi-header">
                    <div class="kicker center"><span class="lbl">CRM Impact Stories</span></div>
                    <h2 id="testi-title" class="testi-title">Powering growth for <span class="uacc">500+ happy customers</span></h2>
                    <p class="testi-sub">From streamlined <strong>counselor productivity</strong> to data-driven reporting, see how education leaders rewrite their success stories with ExtraaEdge <strong>Higher Education CRM</strong>.</p>
                </header>
                <div class="testi-metrics">
                    <div class="testi-metric"><span class="testi-metric-val" data-target="500" data-suffix="+">0</span><span class="testi-metric-lab">Happy Customers</span></div>
                    <div class="testi-metric"><span class="testi-metric-val" data-target="3" data-suffix="X">0</span><span class="testi-metric-lab">Conversion Rate</span></div>
                    <div class="testi-metric"><span class="testi-metric-val" data-target="15000" data-suffix="+" data-locale="true">0</span><span class="testi-metric-lab">Daily Power Users</span></div>
                    <div class="testi-metric"><span class="testi-metric-val" data-target="99" data-suffix="%">0</span><span class="testi-metric-lab">Support Rating</span></div>
                </div>
                <div class="testi-cards">
                    <article class="testi-card"><div class="vid-wrap" id="vid-1" onclick="playVideo('vid-1','3SHgLf1GFgk')" role="button" aria-label="Play testimonial video"><div class="vid-thumb"><img src="https://img.youtube.com/vi/3SHgLf1GFgk/maxresdefault.jpg" class="vid-thumb-img" alt="Silky Jain Marwah ExtraaEdge Higher Education CRM testimonial" width="640" height="360" loading="lazy"><div class="vid-play"></div></div><div class="vid-slot"></div></div><div class="card-body"><blockquote class="card-quote">"ExtraaEdge is an incredibly dynamic and trustworthy platform that truly understands our needs. Whether it's from a counsellor's or an admin's perspective, most of the changes we require are implemented in a very short span of time."</blockquote><div class="card-profile"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp" class="card-avatar" alt="Silky Jain Marwah" loading="lazy" width="54" height="54"><div><p class="card-name">Silky Jain Marwah</p><p class="card-role">Executive Director</p><span class="card-inst">Tula's Institute</span></div></div></div></article>
                    <article class="testi-card"><div class="vid-wrap" id="vid-2" onclick="playVideo('vid-2','dWLdQ8E3FOU')" role="button" aria-label="Play testimonial video"><div class="vid-thumb"><img src="https://img.youtube.com/vi/dWLdQ8E3FOU/maxresdefault.jpg" class="vid-thumb-img" alt="Pranay Rupani ExtraaEdge higher education CRM testimonial" width="640" height="360" loading="lazy"><div class="vid-play"></div></div><div class="vid-slot"></div></div><div class="card-body"><blockquote class="card-quote">"ExtraaEdge has been a true game-changer for us at Annapurna College of Film and Media. From seamless WhatsApp integrations to automated workflows, our entire lead journey is now streamlined and measurable."</blockquote><div class="card-profile"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp" class="card-avatar" alt="Pranay Rupani" loading="lazy" width="54" height="54"><div><p class="card-name">Pranay Rupani</p><p class="card-role">Head of Admissions &amp; Marketing</p><span class="card-inst">Annapurna College of Film &amp; Media</span></div></div></div></article>
                    <article class="testi-card"><div class="vid-wrap" id="vid-3" onclick="playVideo('vid-3','yfK83D2SKps')" role="button" aria-label="Play testimonial video"><div class="vid-thumb"><img src="https://img.youtube.com/vi/yfK83D2SKps/maxresdefault.jpg" class="vid-thumb-img" alt="K. Nirmala Devi ExtraaEdge higher education CRM testimonial" width="640" height="360" loading="lazy"><div class="vid-play"></div></div><div class="vid-slot"></div></div><div class="card-body"><blockquote class="card-quote">"The platform is very user-friendly and allows us to customize the application to fit our specific needs. The ExtraaEdge technical team is accessible anytime, anywhere, and resolves issues immediately without any delays."</blockquote><div class="card-profile"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp" class="card-avatar" alt="K. Nirmala Devi" loading="lazy" width="54" height="54"><div><p class="card-name">K. Nirmala Devi</p><p class="card-role">Assistant Manager</p><span class="card-inst">Indian Academy Group</span></div></div></div></article>
                </div>
            </div>
        </section>

        <section class="ai-demo-section" id="demo" aria-labelledby="ai-cta-h">
            <div class="wrap"><div class="ai-demo-inner">
                <div class="ai-cta-content reveal">
                    <div class="kicker"><span class="lbl">Book a Demo</span><span class="ln"></span></div>
                    <h2 id="ai-cta-h" class="ai-cta-h2">Ready to move to an AI-powered higher education CRM?</h2>
                    <p class="ai-cta-sub">See how you can scale your <strong>admission automation</strong> process and achieve your targets. Book a 45-minute free demo of our <strong>higher education CRM software</strong>.</p>
                    <div class="ai-cta-actions">
                        <a href="https://www.extraaedge.com/" class="btn btn-primary btn-lg">Book a Demo<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                        <div class="ai-trust"><svg viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Trusted by 250+ premier institutions globally</div>
                    </div>
                </div>
                <div class="ai-story-engine reveal" id="ai-engine">
                    <svg class="workflow-svg" viewBox="0 0 500 500"><path id="ai-conn-path" class="conn-path" d=""/><circle id="ai-pulse-dot" r="6" fill="#DE6E30" opacity="0" style="transition:opacity .3s"/></svg>
                    <div class="expert-center"><span class="expert-ring"></span><img src="https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp" alt="ExtraaEdge Admission Expert" width="226" height="226" loading="lazy"></div>
                    <div class="workflow-node wn-1" data-idx="0"><div class="wn-num">1</div><div><p class="wn-title">Inquiry Received</p><p class="wn-sub">Omnichannel lead capture</p></div></div>
                    <div class="workflow-node wn-2" data-idx="1"><div class="wn-num">2</div><div><p class="wn-title">AI Response</p><p class="wn-sub">Instant personalized reply</p></div></div>
                    <div class="workflow-node wn-3" data-idx="2"><div class="wn-num">3</div><div><p class="wn-title">Lead Scoring</p><p class="wn-sub">Predictive intent analysis</p></div></div>
                    <div class="workflow-node wn-4" data-idx="3"><div class="wn-num">4</div><div><p class="wn-title">Auto Nurture</p><p class="wn-sub">Behavioral drip marketing</p></div></div>
                    <div class="workflow-node wn-5" data-idx="4"><div class="wn-num">5</div><div><p class="wn-title">Counselor Alert</p><p class="wn-sub">High-priority task created</p></div></div>
                    <div class="workflow-node wn-6" data-idx="5"><div class="wn-num">6</div><div><p class="wn-title">Admission Won</p><p class="wn-sub">Target achieved successfully</p></div></div>
                </div>
            </div></div>
        </section>

        <section class="faq-section" id="faq" aria-labelledby="faq-title">
            <div class="faq-container">
                <header class="faq-header reveal">
                    <div class="kicker center"><span class="lbl">FAQ</span></div>
                    <h2 id="faq-title" class="faq-title">Frequently asked questions</h2>
                    <p class="faq-subtitle">Everything you need to know about <strong>Higher Education CRM</strong> and ExtraaEdge excellence.</p>
                </header>
                <div class="faq-list" id="faq-list">
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q1</span>How can a CRM for higher education help increase conversion rates?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>A <strong>higher education CRM</strong> improves conversion rates by centralizing lead data, automating communication, and giving counselors clear visibility into where each prospect stands. Key features that drive this include:</p><ul><li><strong>Multi-channel lead integration:</strong> Leads from all sources are captured, assigned, and tracked in one place — reducing leakage and improving response times.</li><li><strong>Automated application forms:</strong> Digital, paperless forms replace manual processes and can be customized per program.</li><li><strong>Lead verification via OTP:</strong> Filters out irrelevant leads upfront, so counselors spend time only on qualified prospects.</li><li><strong>Automated communication:</strong> Every touchpoint — emails, reminders, follow-ups — runs automatically.</li><li><strong>Lead status tracking:</strong> Counselors can see a prospect's engagement level at any time to time follow-ups effectively.</li></ul></div></div></div>
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q2</span>Can a higher education CRM support third-party integrations?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>Yes. A <strong>higher education CRM</strong> integrates with tools like IVR systems, bulk SMS platforms, Zapier, and ERP systems. You can manage automated calls, bulk messaging, task automation, and post-admission academic workflows — all within a single platform.</p></div></div></div>
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q3</span>What additional benefits does a higher education CRM offer?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>Beyond admissions, a <strong>CRM for higher education</strong> adds value in several areas:</p><ul><li><strong>Personalized communication:</strong> Segment your audience and tailor messaging based on student profiles and behavior.</li><li><strong>Always-on student support:</strong> Automated responses ensure students get answers at any time.</li><li><strong>Event management:</strong> Centralize event coordination across departments from one dashboard.</li><li><strong>Alumni engagement:</strong> Scheduled, relevant communication keeps alumni connected and encourages referrals.</li></ul></div></div></div>
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q4</span>How is an Application Management System useful in higher education?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>An Application Management System replaces manual, paper-based processes with a fully digital workflow. Applicants can save progress, upload documents, and receive instant confirmation. Staff get a real-time dashboard showing each application's status, pending tasks, and complete applicant profiles.</p><p>Additional benefits include online fee collection, real-time application tracking, and reduced risk of errors or processing delays — all in one centralized system.</p></div></div></div>
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q5</span>How do you choose the right higher education CRM?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>Evaluate any <strong>CRM for higher education</strong> against these six criteria:</p><ul><li><strong>Education-specific design:</strong> Built for admissions workflows, not adapted from a generic sales tool.</li><li><strong>Customizability:</strong> Flexible enough to match your specific processes and structure.</li><li><strong>Transparent pricing:</strong> No hidden fees that surprise you post-purchase.</li><li><strong>Mobile accessibility:</strong> Full functionality on smartphones and tablets for on-the-go teams.</li><li><strong>Behavioral automation:</strong> Triggers communication based on actions like email opens or form progress.</li><li><strong>Actionable reporting:</strong> Dashboards that support decisions, not just raw data exports.</li></ul></div></div></div>
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q6</span>What is a Mobile CRM?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>A Mobile CRM is a full-featured CRM accessible on smartphones and tablets. For admissions teams, it means real-time access to student data, emails, and follow-up tasks from anywhere — particularly valuable for counselors attending events, campus visits, or working across multiple locations.</p></div></div></div>
                    <div class="faq-item"><button class="faq-trigger" aria-expanded="false"><span class="faq-q"><span class="qn">Q7</span>What is an IVR?</span><span class="faq-icon" aria-hidden="true"></span></button><div class="faq-body"><div class="faq-inner"><p>An Interactive Voice Response (IVR) system automates inbound call handling for admissions. It greets callers, provides program information, answers common questions, and routes calls to the right counselor based on region or course interest — without manual intervention. The result is faster, more targeted support for prospective students.</p></div></div></div>
                </div>
            </div>
        </section>

    </div>
</div>

<div class="cbar" id="cbar">
    <div class="cbar-inner">
        <div class="cbar-tag"><svg viewBox="0 0 24 24"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg></div>
        <div class="cbar-txt"><b>Increase admissions by 2X in 90 days</b><span>Book a free 45-minute demo of ExtraaEdge Higher Education CRM</span></div>
        <div class="cbar-rating"><span class="s">&#9733;&#9733;&#9733;&#9733;&#9733;</span>4.9/5 &middot; 500+ reviews</div>
        <a href="#admission-form" class="btn btn-primary" onclick="scrollToForm(event)">Book a Demo<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        <button class="cbar-close" id="cbar-close" aria-label="Dismiss"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
</div>

<script>
(function(){'use strict';
/* Sticky conversion bar */
(function(){
var bar=document.getElementById('cbar'),close=document.getElementById('cbar-close');
if(!bar)return;
var dismissed=false;
function onScroll(){
if(dismissed)return;
var trigger=window.innerHeight*0.85;
if(window.pageYOffset>trigger) bar.classList.add('show'); else bar.classList.remove('show');
}
if(close)close.addEventListener('click',function(){dismissed=true;bar.classList.remove('show');});
window.addEventListener('scroll',onScroll,{passive:true});onScroll();
})();
/* Mobile TOC */
(function(){
var btn=document.getElementById('toc-mobile-btn'),panel=document.getElementById('toc-mobile-panel'),
overlay=document.getElementById('toc-mobile-overlay'),close=document.getElementById('toc-mobile-close'),
links=document.querySelectorAll('.toc-link-mobile');
if(!btn||!panel||!overlay)return;
function open(){panel.classList.add('active');overlay.classList.add('active');document.body.style.overflow='hidden';}
function shut(){panel.classList.remove('active');overlay.classList.remove('active');document.body.style.overflow='';}
btn.addEventListener('click',open);close.addEventListener('click',shut);overlay.addEventListener('click',shut);
links.forEach(function(link){link.addEventListener('click',function(e){
e.preventDefault();var t=document.getElementById(link.getAttribute('href').substring(1));shut();
if(t)setTimeout(function(){window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-100,behavior:'smooth'});},300);
});});
})();
/* TOC active + progress */
(function(){
var tocLinks=document.querySelectorAll('.toc-link'),tocLinksM=document.querySelectorAll('.toc-link-mobile'),
prog=document.getElementById('toc-progress'),progM=document.getElementById('toc-progress-mobile');
if(!tocLinks.length)return;
tocLinks.forEach(function(link){link.addEventListener('click',function(e){
e.preventDefault();var t=document.getElementById(link.getAttribute('href').substring(1));
if(t)window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-100,behavior:'smooth'});
});});
function update(){
var secs=[];tocLinks.forEach(function(link){var el=document.getElementById(link.getAttribute('href').substring(1));if(el)secs.push(el);});
var pos=window.pageYOffset+160,active=secs[0];
secs.forEach(function(s){if(s.offsetTop<=pos)active=s;});
tocLinks.forEach(function(l){l.classList.toggle('active',active&&l.getAttribute('href').substring(1)===active.id);});
tocLinksM.forEach(function(l){l.classList.toggle('active',active&&l.getAttribute('href').substring(1)===active.id);});
var zone=document.getElementById('toc-zone-wrapper');
if(zone&&prog){var pct=Math.max(0,Math.min(100,((window.pageYOffset-zone.offsetTop)/zone.offsetHeight)*100));
prog.style.height=pct+'%';if(progM)progM.style.height=pct+'%';}
}
var ticking=false;window.addEventListener('scroll',function(){if(!ticking){window.requestAnimationFrame(function(){update();ticking=false;});ticking=true;}});update();
})();
/* Reveal */
var revObs=new IntersectionObserver(function(entries){entries.forEach(function(e,i){
if(e.isIntersecting){setTimeout(function(){e.target.classList.add('visible');},i*55);revObs.unobserve(e.target);}});
},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.reveal').forEach(function(el){revObs.observe(el);});
/* Scroll to form */
window.scrollToForm=function(e){e.preventDefault();var t=document.getElementById('admission-form');
if(t)window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-28,behavior:'smooth'});};
/* Admissions flow panel — always running */
(function(){
var fz=document.getElementById('flow-zone'),steps=document.querySelectorAll('#flow-stack .flow-step'),log=document.getElementById('data-log');
if(!fz||!steps.length)return;
var cur=0,iv=null;
var msgs=["Lead #8821 captured via website","Auto-SMS sent: 'Welcome to admissions'","WhatsApp nurtured: course details delivered",
"Transcript uploaded: AI verification passed","Fee payment detected: INR 45,000 received","Offer letter released: ID #EDU-991","Counselor assigned for onboarding"];
function addLog(){var l=document.createElement('div');l.className='log-line';l.textContent=msgs[Math.floor(Math.random()*msgs.length)];
log.appendChild(l);if(log.childNodes.length>5)log.removeChild(log.firstChild);log.scrollTop=log.scrollHeight;}
function run(){steps.forEach(function(s){s.classList.remove('active');});steps[cur].classList.add('active');if(Math.random()>.4)addLog();cur=(cur+1)%steps.length;}
function start(){if(!iv){iv=setInterval(run,1800);run();}}
new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)start();});},{threshold:.2}).observe(fz);
steps.forEach(function(s,i){s.addEventListener('click',function(){cur=i;run();});});
})();
/* Testimonials */
(function(){
var section=document.querySelector('.testimonials-section'),mesh=document.getElementById('testi-mesh');
if(!section||!mesh)return;
for(var i=0;i<12;i++){var l=document.createElement('div');l.className='testi-pulse-line';
l.style.top=(Math.random()*100)+'%';l.style.animationDuration=(4+Math.random()*6)+'s';l.style.animationDelay=(Math.random()*5)+'s';mesh.appendChild(l);}
var triggered=false;
function activate(){if(triggered)return;triggered=true;section.classList.add('testi-section-active');
document.querySelectorAll('.testi-metric-val').forEach(function(el){
var target=+el.getAttribute('data-target'),suffix=el.getAttribute('data-suffix')||'',useLocale=el.getAttribute('data-locale')==='true',start=null,dur=2000;
function anim(ts){if(!start)start=ts;var p=Math.min((ts-start)/dur,1),c=Math.floor(p*target);
el.textContent=(useLocale?c.toLocaleString():c)+suffix;if(p<1)requestAnimationFrame(anim);}
requestAnimationFrame(anim);});}
new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)activate();});},{threshold:.15}).observe(section);
})();
/* Video play */
window.playVideo=function(id,yt){var c=document.getElementById(id);if(!c||c.classList.contains('playing'))return;
c.querySelector('.vid-slot').innerHTML='<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+yt+'?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="autoplay;encrypted-media" allowfullscreen style="display:block" title="ExtraaEdge Higher Education CRM Customer Testimonial"></iframe>';
c.classList.add('playing');};
/* AI engine */
(function(){
var eng=document.getElementById('ai-engine'),nodes=document.querySelectorAll('.workflow-node'),
connPath=document.getElementById('ai-conn-path'),pulseDot=document.getElementById('ai-pulse-dot');
if(!eng||!nodes.length)return;
var cur=0,cyc=null,on=false;
function center(el){var r=el.getBoundingClientRect(),pr=eng.getBoundingClientRect();return{x:(r.left+r.width/2)-pr.left,y:(r.top+r.height/2)-pr.top};}
function cycle(){nodes.forEach(function(n){n.classList.remove('wn-active');});nodes[cur].classList.add('wn-active');
var c=center(nodes[cur]);connPath.setAttribute('d','M250,283 L'+c.x+','+c.y);connPath.style.opacity='.6';
pulseDot.setAttribute('cx',c.x);pulseDot.setAttribute('cy',c.y);pulseDot.style.opacity='1';cur=(cur+1)%nodes.length;}
function start(){if(on)return;on=true;cycle();cyc=setInterval(cycle,2800);}
eng.addEventListener('mouseenter',start);
new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)start();});},{threshold:.35}).observe(eng);
nodes.forEach(function(n,i){n.addEventListener('click',function(){cur=i;clearInterval(cyc);cycle();cyc=setInterval(cycle,3500);});});
})();
/* FAQ */
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
