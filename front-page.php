<?php
/**
 * Front Page (Home) - ExtraaEdge AI-Powered Admission CRM.
 *
 * WordPress theme template: renders the homepage design INSIDE the active
 * theme's header.php (get_header) and footer.php (get_footer). SEO meta,
 * Open Graph/Twitter cards, JSON-LD structured data and the Google Fonts
 * are injected into the theme <head> via the wp_head hook.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
?>
<!-- ee-front-tpl v2026-07-29-mods-rail -->
<!--
  NOTE: title / meta description / keywords / robots / canonical / hreflang /
  Open Graph / Twitter cards and the WebSite + Organization JSON-LD are emitted
  by the active theme's header.php (or SEO plugin). They are intentionally NOT
  repeated here to avoid duplicate-tag conflicts for Google & AI crawlers.
  This template only adds page-specific structured data (SoftwareApplication +
  FAQPage) and the homepage's Google Fonts.
-->

<!-- Page-specific structured data: powers rich results & AI search -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "SoftwareApplication",
      "@id": "https://www.extraaedge.com/#software",
      "name": "ExtraaEdge Admission CRM",
      "url": "https://www.extraaedge.com/",
      "applicationCategory": "BusinessApplication",
      "applicationSubCategory": "CRM Software",
      "operatingSystem": "Web, Android, iOS",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR", "description": "Free demo available. Contact for custom pricing." },
      "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.7", "reviewCount": "320", "bestRating": "5", "worstRating": "1" },
      "provider": { "@type": "Organization", "name": "ExtraaEdge Technology Solutions Pvt. Ltd", "url": "https://www.extraaedge.com/" },
      "featureList": [
        "AI Lead Intent Scoring",
        "Smart Follow-up Automation",
        "AI Calling at Scale",
        "Counselor Performance Intelligence",
        "Admission Pipeline Tracking",
        "Multi-channel Marketing Automation",
        "WhatsApp Business API",
        "Real-time Analytics & Reports"
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://www.extraaedge.com/#faq",
      "mainEntity": [
        { "@type": "Question", "name": "What is ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge is an AI-powered Admission CRM purpose-built for educational institutions - schools, colleges, universities and edtech companies. It automates lead capture, scores intent, triggers smart follow-ups and gives counselors real-time performance intelligence." } },
        { "@type": "Question", "name": "How does ExtraaEdge help convert more students?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge prioritises high-intent leads with AI scoring, responds to every enquiry in minutes with AI calling and WhatsApp automation, and tells counselors exactly who to follow up with next - reducing response time by up to 90% and boosting conversions by up to 48%." } },
        { "@type": "Question", "name": "Does ExtraaEdge offer a free demo?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. You can book a free personalised 45-minute demo on the ExtraaEdge website. A product expert will walk you through the platform live with data from your sector." } },
        { "@type": "Question", "name": "Is ExtraaEdge suitable for small colleges?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge serves institutions from single-campus colleges to large university groups processing 100,000+ applications per cycle. Pricing and features scale to your needs." } },
        { "@type": "Question", "name": "What AI features does ExtraaEdge offer?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge offers AI Lead Intent Scoring, AI Calling at scale via VidyaAI, Smart Follow-up Automation, WhatsApp Business API engagement and Counselor Performance Intelligence - all powered by its proprietary Admission Intelligence engine." } },
        { "@type": "Question", "name": "Will ExtraaEdge work with my existing ads and website?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge captures leads automatically from Meta and Google Ads, your website and landing pages, education portals, WhatsApp, IVR and more, with full source tracking. It also integrates with your ERP/SIS, payment gateway and cloud telephony." } },
        { "@type": "Question", "name": "How long does it take to implement ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "Most institutions go live in around 14 days, including data migration, integrations, workflow setup and counselor training, supported by a dedicated onboarding specialist and Customer Success Manager." } },
        { "@type": "Question", "name": "Does VidyaGPT support regional languages?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. VidyaGPT understands and responds in 95+ languages including Hindi, Marathi, Tamil, Telugu, Kannada, Bengali and Gujarati, over chat and on AI voice calls." } },
        { "@type": "Question", "name": "Is my data secure with ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails." } },
        { "@type": "Question", "name": "How does ExtraaEdge pricing work?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge uses simple, transparent product-based pricing rather than module-based pricing that adds cost as you scale. Book a demo for a tailored quote based on your enquiry volume and required modules, with no hidden third-party charges." } },
        { "@type": "Question", "name": "Can I migrate from my existing CRM or spreadsheets?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. The ExtraaEdge team handles full data migration from your existing CRM or spreadsheets, including leads, history, sources and stages, as part of onboarding so you go live without losing data." } },
        { "@type": "Question", "name": "Will counsellors adopt ExtraaEdge easily?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge is a single-window CRM designed around the admissions team and is quick to learn even for non-technical counsellors, with hands-on training, on-ground support and a dedicated Customer Success Manager." } }
      ]
    }
  ]
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
<link rel="preconnect" href="https://www.extraaedge.com" crossorigin />
<link rel="dns-prefetch" href="https://www.extraaedge.com" />
<link rel="preconnect" href="https://img.youtube.com" crossorigin />
<link rel="dns-prefetch" href="https://img.youtube.com" />
<?php
});

get_header();
?>

<style id="ee-home-zoom">
/* ── The site-wide 90% zoom now lives in header.php (ee-site-zoom): at
   100% browser zoom every page renders at 90%, on all screen sizes.
   Here we only counter-zoom the relocated full-screen demo overlay back
   to 1:1 (.9 × 1.1112 ≈ 1) so it still covers the whole viewport. */
body>.eep-window.eep-launched{zoom:1.1112}
</style>
<style id="ee-home-heading-scale">
/* ── Home page heading/paragraph override (larger than the site-wide
   default set in header.php's #ee-global-heading-scale): H1=40, H2=30,
   H3=20, H4=14. Same selector/specificity as that block, but this one
   loads later in the document, so it wins the cascade tie on this page
   only - no body class needed since this file only ever runs on the
   front page. */
html body #main-content h1:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:40px !important;
    line-height:1.12 !important;
    letter-spacing:-.02em !important;
}
html body #main-content h2:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:30px !important;
    line-height:1.22 !important;
    letter-spacing:-.015em !important;
}
html body #main-content h3:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:20px !important;
    line-height:1.3 !important;
    letter-spacing:-.01em !important;
}
html body #main-content h4:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:14px !important;
    line-height:1.35 !important;
}
/* ── phones: scale the home-page headings down so they read comfortably
   on small screens (desktop keeps 40/30/20/14) ── */
@media(max-width:820px){
html body #main-content h1:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:24px !important;
}
html body #main-content h2:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:18px !important;
}
html body #main-content h3:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:14.5px !important;
}
html body #main-content h4:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:12px !important;
}
html body #main-content p:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:13px !important;
}
}
</style>

<style>/* =====================================================================
   ExtraaEdge - Enterprise high-conversion Admission CRM homepage
   (no nav,no footer). Brand: Orange #DE6E30 · Blue #19335D · Inter.
   Pure CSS + raw WebGL + vanilla JS (no frameworks) for speed + SEO.
   Effects: WebGL hero,sticky scrollytelling,morphing/scroll-zoom
   dashboards,real-time streaming dashboard,AI network visualization,live system feed,typewriter,counters.
   ===================================================================== */
:root{
  --orange:#DE6E30; --orange-soft:#fbeadf; --blue:#19345d; --blue-2:#21457a;
  --ink:#19345d; --muted:#5b6b82; --line:#e7ecf3; --bg:#fff; --bg-soft:#f6f8fc;
  --green:#1054b9; --shadow:0 18px 50px rgba(25,52,93,.10);
  --shadow-sm:0 8px 24px rgba(25,52,93,.08); --radius:20px; --maxw:1200px;
}*{box-sizing:border-box;margin:0;padding:0}html{scroll-behavior:smooth}/* NOTE: do NOT put overflow on <body>. The theme header (#site-header) and its
   hover mega-menus/dropdowns live directly under <body>,so any overflow:hidden/
   clip on <body> clips those submenus (they don't open on the homepage) and an
   overflow:hidden would also turn <body> into a scroll container and break the
   header's position:sticky. Horizontal overflow from the wide hero/marquee
   animations is instead clipped on #main-content below,which does NOT contain
   the header. */
body{font-family:'Inter',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--ink);line-height:1.55;-webkit-font-smoothing:antialiased}/* Clip the homepage's horizontal overflow on the content wrapper (the header is
   a sibling outside #main-content,so its dropdowns are never clipped). clip
   (not hidden) keeps overflow-y visible so the sticky scrollytelling still works. */
#main-content{overflow-x:hidden;overflow-x:clip}.poppins{font-family:'Inter',sans-serif}.container{max-width:var(--maxw);margin:0 auto;padding:0 24px}.muted{color:var(--muted)}.grad-o{background:linear-gradient(95deg,var(--orange),#f0974f);-webkit-background-clip:text;background-clip:text;color:transparent}section{position:relative}section[id]{scroll-margin-top:24px}img{max-width:100%;display:block}a{color:inherit}/* keyboard accessibility */
a:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,[tabindex]:focus-visible{outline:3px solid var(--orange);outline-offset:2px;border-radius:6px}
/* respect reduced-motion / low-power devices */
@media (prefers-reduced-motion: reduce){html{scroll-behavior:auto}.marq__track,.arch-screen::after,.iphone-glow,.ip-spin,.wv i,.cwaves i,.scanbar::after,.ping::after,.ctyping i{animation:none!important}*,*::before,*::after{transition-duration:.01ms!important}
}/* buttons */
.btn{display:inline-flex;align-items:center;gap:9px;padding:14px 26px;border-radius:14px;font-weight:700;font-size:15px;text-decoration:none;cursor:pointer;border:1.5px solid transparent;transition:transform .18s,box-shadow .25s,background .2s,color .2s;font-family:inherit}.btn-primary{background:var(--orange);color:#fff;box-shadow:0 10px 26px rgba(222,110,48,.35)}.btn-primary:hover{transform:translateY(-3px);box-shadow:0 16px 34px rgba(222,110,48,.45)}.btn-dark{background:var(--blue);color:#fff;box-shadow:0 10px 26px rgba(25,52,93,.25)}.btn-dark:hover{transform:translateY(-3px)}.btn-ghost{background:#fff;color:var(--blue);border-color:var(--line)}.btn-ghost:hover{border-color:var(--orange);color:var(--orange)}.btn-lg{padding:17px 32px;font-size:16px}/* pills / tags */
.pill{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:700;background:var(--orange-soft);color:var(--orange);padding:8px 16px;border-radius:999px}.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:800;letter-spacing:1.4px;text-transform:uppercase;color:var(--orange);margin-bottom:14px}.dot{width:8px;height:8px;border-radius:50%;background:var(--orange)}.ping{position:relative;width:10px;height:10px;border-radius:50%;background:var(--green);flex:none}.ping::after{content:"";position:absolute;inset:0;border-radius:50%;background:var(--green);animation:ping 1.6s cubic-bezier(0,0,.2,1) infinite}
@keyframes ping{75%,100%{transform:scale(2.6);opacity:0}}/* heads / sections */
.head{max-width:780px;margin:0 auto;text-align:center}.h2{font-family:'Inter',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;letter-spacing:-1.2px;line-height:1.1}.lead{color:var(--muted);font-size:18px;margin-top:16px}.sec{padding:88px 0}.sec--soft{background:var(--bg-soft)}/* reveal */
.rv{opacity:0;transform:translateY(28px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}.rv.in{opacity:1;transform:none}.rv.d1{transition-delay:.08s}.rv.d2{transition-delay:.16s}.rv.d3{transition-delay:.24s}
@media (prefers-reduced-motion:reduce){.rv{opacity:1;transform:none;transition:none}}.card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow-sm)}.glass{background:rgba(255,255,255,.72);backdrop-filter:blur(10px);border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow-sm)}/* ===================== HERO + WebGL ===================== */
.hero{padding:70px 0 46px;overflow:hidden}#glsl{position:absolute;inset:0;width:100%;height:100%;z-index:0;opacity:.9;pointer-events:none}.hero__bg{position:absolute;inset:0;z-index:1;pointer-events:none;background:radial-gradient(600px 380px at 12% 0%,rgba(222,110,48,.10),transparent 60%),radial-gradient(620px 420px at 92% 18%,rgba(25,52,93,.09),transparent 60%)}.hero__in{position:relative;z-index:2;display:grid;grid-template-columns:1.04fr .96fr;gap:48px;align-items:center}.hero h1{font-family:'Inter',sans-serif;font-size:clamp(38px,5.2vw,64px);font-weight:800;letter-spacing:-1.8px;line-height:1.04;margin:16px 0}.hero__type{color:var(--orange)}.hero p.sub{font-size:18px;color:var(--muted);max-width:540px;margin-bottom:12px}.hero__feat{color:var(--blue);font-weight:600;max-width:540px;margin-bottom:24px;font-size:16px}.hero__cta{display:flex;gap:14px;flex-wrap:wrap;align-items:center}.hero__micro{margin-top:16px;font-size:13.5px;color:var(--muted);display:flex;align-items:center;gap:8px}.live{padding:22px;position:relative}.live__top{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}.live__brand{display:flex;align-items:center;gap:10px;font-weight:800;color:var(--blue)}.orb{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--orange),var(--blue));display:grid;place-items:center;color:#fff;font-weight:900;font-size:15px;flex:none}.live__count{font-size:13px;font-weight:800;color:var(--orange);display:flex;align-items:center;gap:7px}.hero__modules{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px;padding-top:14px;border-top:1px solid var(--line)}.hero__modules span{font-size:11px;font-weight:700;color:var(--blue);background:var(--bg-soft);border:1px solid var(--line);border-radius:999px;padding:5px 10px}.step{border:1px solid var(--line);border-radius:14px;padding:13px 15px;margin-bottom:10px;background:#fff;opacity:0;transform:translateY(10px);transition:.5s}.step.show{opacity:1;transform:none}.step__tag{font-size:10.5px;font-weight:800;letter-spacing:1px;color:var(--muted)}.step__txt{font-size:14.5px;margin-top:4px;font-weight:500;min-height:1.2em}.step--in{border-left:3px solid var(--blue)}.step--ai{border-left:3px solid var(--orange);background:linear-gradient(180deg,#fff,#fff8f3)}.step--ai .step__tag{color:var(--orange)}.step--ok{border-left:3px solid var(--green)}.step--ok .step__tag{color:#164ea3}.badge-ok{display:inline-flex;align-items:center;gap:6px;font-weight:800;color:#164ea3}.waiting{display:inline-flex;gap:4px;align-items:center;color:var(--orange);font-size:12px;font-weight:700}.wv{display:inline-flex;gap:3px;align-items:flex-end;height:16px}.wv i{width:3px;background:var(--orange);border-radius:2px;animation:wave 1s ease-in-out infinite;height:5px}.wv i:nth-child(2){animation-delay:.15s}.wv i:nth-child(3){animation-delay:.3s}.wv i:nth-child(4){animation-delay:.45s}.wv i:nth-child(5){animation-delay:.6s}
@keyframes wave{0%,100%{height:5px}50%{height:16px}}/* ===================== MARQUEE ===================== */
.marq{padding:34px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:#fff}.marq__lbl{text-align:center;color:var(--muted);font-weight:700;font-size:14px;margin-bottom:22px}.marq__wrap{overflow:visible}.marq__track{display:flex;flex-wrap:wrap;gap:22px 40px;width:auto;align-items:center;justify-content:center}.marq__track.t1{animation:none}
@keyframes scrollx{to{transform:translateX(-50%)}}.logo-card{width:170px;height:86px;flex:none;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}.logo-card:hover{border-color:var(--orange);transform:translateY(-4px)}.logo-card img{max-height:54px;width:auto;object-fit:contain;transition:.3s}/* ===================== STATS ===================== */
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}.stat{text-align:center;padding:28px 18px;border-radius:18px;background:#fff;border:1px solid var(--line);box-shadow:var(--shadow-sm)}.stat__n{font-family:'Inter',sans-serif;font-size:46px;font-weight:800;letter-spacing:-2px;line-height:1}.stat__l{color:var(--muted);font-size:14px;margin-top:8px;font-weight:600}/* ===================== CAPS ===================== */
.caps{display:grid;grid-template-columns:repeat(12,1fr);gap:18px;margin-top:40px}.cap{padding:26px;border-radius:var(--radius);background:#fff;border:1px solid var(--line);box-shadow:var(--shadow-sm);transition:transform .3s,box-shadow .3s,border-color .3s}.cap:hover{transform:translateY(-6px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}.cap h3{font-size:20px;margin:0 0 8px;letter-spacing:-.4px}.cap p{color:var(--muted);font-size:14.5px}.cap--lg{grid-column:span 6}.cap--md{grid-column:span 4}.chiprow{display:flex;flex-wrap:wrap;gap:8px;margin-top:16px}.chip{font-size:12.5px;font-weight:700;background:var(--bg-soft);border:1px solid var(--line);color:var(--blue);padding:7px 12px;border-radius:999px}/* ===================== VIDYA SCROLLYTELLING ===================== */
.vidya-wrap{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start;margin-top:30px}.vstory{min-height:80vh;display:flex;flex-direction:column;justify-content:center;opacity:.22;transform:translateY(30px);transition:opacity .7s,transform .7s;padding:24px 0}.vstory.active{opacity:1;transform:none}.vstory .vno{font-family:'Inter',sans-serif;font-weight:800;color:var(--orange);font-size:22px;margin-bottom:8px}.vstory h3{font-family:'Inter',sans-serif;font-size:clamp(26px,3vw,40px);font-weight:800;letter-spacing:-1px;margin-bottom:14px;line-height:1.08}.vstory p{color:var(--muted);font-size:17px;max-width:520px;margin-bottom:18px}.vstory .mini{display:grid;grid-template-columns:1fr 1fr;gap:12px;max-width:520px}.vstory .mini div{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px}.vstory .mini b{display:block;font-size:14px;margin-bottom:3px}.vstory .mini span{font-size:12.5px;color:var(--muted)}.lift-box{background:var(--blue);color:#fff;border-radius:18px;padding:20px;max-width:520px}.lift-box .row{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}.lift-box .row span{font-size:11px;opacity:.6;text-transform:uppercase;font-weight:800;letter-spacing:1px}.lift-box .row b{color:#ffd9bf;font-family:'Inter',sans-serif;font-size:18px}.lift-box p{color:#c6d3e6;font-size:13.5px;margin:0}.vsticky{position:sticky;top:84px;height:82vh;max-height:660px;display:flex;align-items:center;justify-content:center;perspective:2000px}.crm{width:100%;height:100%;background:#fff;border-radius:24px;box-shadow:0 50px 100px -20px rgba(25,52,93,.18);border:1px solid var(--line);overflow:hidden;display:flex;flex-direction:column;transition:transform .8s cubic-bezier(.19,1,.22,1);transform-style:preserve-3d}.crm-top{height:46px;border-bottom:1px solid var(--line);display:flex;align-items:center;gap:8px;padding:0 16px;flex:none}.crm-top .d{width:11px;height:11px;border-radius:50%}.crm-url{margin-left:auto;background:var(--bg-soft);border-radius:8px;font-size:10px;font-weight:700;color:var(--muted);padding:5px 12px}.crm-body{flex:1;display:flex;overflow:hidden}.crm-side{width:58px;background:#0f1a2a;display:flex;flex-direction:column;align-items:center;padding:18px 0;gap:16px;flex:none}.s-ic{width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.06);display:grid;place-items:center;color:rgba(255,255,255,.45);transition:.3s}.s-ic.on{background:var(--orange);color:#fff}.s-ic svg,.s-ic img.eeimg{width:18px;height:18px}.crm-main{flex:1;background:var(--bg-soft);padding:22px;overflow:hidden;position:relative}.cv{display:none}.cv.on{display:block;animation:slideIn .5s ease}
@keyframes slideIn{from{opacity:0;transform:translateX(18px)}to{opacity:1;transform:none}}.cv h4{font-size:15px;margin-bottom:14px}.kgrid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:14px}.kbox{background:#fff;border:1px solid var(--line);border-radius:12px;padding:12px}.kbox .l{font-size:9px;color:var(--muted);font-weight:800;letter-spacing:.5px;text-transform:uppercase;margin-bottom:4px}.kbox .v{font-family:'Inter',sans-serif;font-size:22px;font-weight:800}.cbars{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px;height:150px;display:flex;align-items:flex-end;gap:8px}.cbars i{flex:1;border-radius:6px 6px 0 0;transition:height .8s}.lcard{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px;display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}.lcard .av{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;font-weight:800;font-size:11px}.bub{background:#fff;border:1px solid var(--line);border-radius:14px;border-top-left-radius:4px;padding:11px 14px;font-size:12px;max-width:82%;margin-bottom:10px;line-height:1.5}.bub.ai{background:#0f1a2a;color:#fff;border:none;border-radius:14px;border-top-right-radius:4px;margin-left:auto;box-shadow:var(--shadow-sm)}.bub.ai .meta{margin-top:8px;padding-top:8px;border-top:1px solid rgba(255,255,255,.12);display:flex;justify-content:space-between;align-items:center;font-size:9px;font-weight:700}.bub.ai .tag{background:var(--orange);padding:2px 7px;border-radius:5px}.callbox{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}.callring{width:78px;height:78px;border-radius:50%;background:#ef8e44;display:grid;place-items:center;color:#fff;position:relative;margin-bottom:18px}.callring::after{content:"";position:absolute;inset:0;border-radius:50%;background:#ef8e44;opacity:.3;animation:ping 1.6s infinite}.cwaves{display:flex;align-items:flex-end;gap:4px;height:34px;margin-bottom:12px}.cwaves i{width:4px;border-radius:4px;background:var(--orange);animation:wave2 .8s infinite ease-in-out;height:8px}
@keyframes wave2{0%,100%{height:8px}50%{height:32px}}.perf{background:#fff;border:1px solid var(--line);border-radius:14px;padding:16px;margin-bottom:12px}.perf .pr{display:flex;justify-content:space-between;font-size:12px;font-weight:700;margin-bottom:8px}.pbar{height:8px;background:var(--bg-soft);border-radius:6px;overflow:hidden}.pbar i{display:block;height:100%;background:var(--orange);width:0;transition:width 1.2s}.todo{background:#fff;border-left:4px solid var(--orange);border-radius:10px;padding:12px;margin-bottom:10px}.todo .t{display:flex;justify-content:space-between;font-size:10px;font-weight:800;margin-bottom:4px}.todo b{font-size:12px}/* ===================== STREAMING DASHBOARD ===================== */
.split{display:grid;grid-template-columns:1fr 1fr;gap:54px;align-items:center}.dash{padding:22px;border-radius:22px}.dash__bar{display:flex;align-items:center;justify-content:space-between;font-size:12px;color:var(--muted);padding-bottom:14px;border-bottom:1px solid var(--line);margin-bottom:16px;font-weight:600;gap:8px;flex-wrap:wrap}.dash__url{background:var(--bg-soft);border-radius:8px;padding:5px 12px;font-weight:600;color:var(--blue)}#viewTag{font-weight:800;color:var(--orange)}.kpis{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}.kpi{background:var(--bg-soft);border-radius:14px;padding:16px;border:1px solid var(--line)}.kpi__l{font-size:11px;font-weight:800;letter-spacing:.6px;color:var(--muted)}.kpi__v{font-family:'Inter',sans-serif;font-size:24px;font-weight:800;color:var(--blue);margin-top:6px;letter-spacing:-1px}.kpi__v small{color:#164ea3;font-size:12px;font-weight:800}.bars{display:flex;align-items:flex-end;gap:8px;height:80px;margin-top:16px}.bars i{flex:1;background:linear-gradient(180deg,var(--orange),#f0a06a);border-radius:6px 6px 0 0;transition:height .6s;height:40%}#spark{width:100%;height:56px;display:block;margin-top:12px}.feats{display:flex;flex-direction:column;gap:16px;margin-top:26px}.feat{display:flex;gap:14px;align-items:flex-start}.feat__ic{width:42px;height:42px;border-radius:12px;background:var(--orange-soft);color:var(--orange);display:grid;place-items:center;font-size:19px;flex:none}.feat b{display:block;margin-bottom:2px}.feat span{color:var(--muted);font-size:14.5px}/* ===================== AUTOMATION FLOW (live) ===================== */
.flow{display:flex;align-items:center;gap:0;flex-wrap:wrap;margin-top:42px;justify-content:center}.fnode{flex:0 0 auto;width:150px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:18px;text-align:center;box-shadow:var(--shadow-sm);transition:.4s}.fnode.act{border-color:var(--orange);transform:translateY(-6px);box-shadow:0 18px 36px rgba(222,110,48,.18)}.fnode__ic{font-size:24px;transition:.3s}.fnode.act .fnode__ic{transform:scale(1.18)}.fnode b{display:block;margin-top:8px;font-size:14.5px}.fnode small{color:var(--muted);font-size:12px}.fconn{flex:1;min-width:26px;height:3px;position:relative;background:#eef2f7;margin-top:-26px;border-radius:3px;overflow:hidden}.fconn i{position:absolute;left:0;top:0;height:100%;width:0;background:var(--orange);border-radius:3px;transition:width .5s linear}.fconn.on i{width:100%}.fdart{position:absolute;top:50%;left:0;width:8px;height:8px;border-top:2px solid var(--orange);border-right:2px solid var(--orange);transform:translateY(-50%) rotate(45deg);opacity:0}/* ===================== CHAT ===================== */
.chat{max-width:430px;width:100%;border-radius:22px;overflow:hidden;border:1px solid var(--line);box-shadow:var(--shadow);background:#fff}.chat__hd{background:#1b3761;color:#fff;padding:16px 20px;display:flex;align-items:center;gap:12px}.chat__hd b{font-size:15px}.chat__hd small{opacity:.85;display:flex;align-items:center;gap:6px;font-size:12px}.chat__bd{padding:18px;height:420px;overflow-y:auto;display:flex;flex-direction:column;gap:10px;background:#E9F4FB}.chat__lang{font-size:10px;font-weight:800;letter-spacing:.5px;background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.25);color:#fff;padding:3px 9px;border-radius:999px;margin-left:auto;white-space:nowrap}.cmsg{max-width:84%;padding:11px 14px;border-radius:14px;font-size:14px;opacity:0;transform:translateY(8px);animation:cin .35s forwards}
@keyframes cin{to{opacity:1;transform:none}}.cmsg--u{align-self:flex-end;background:var(--blue);color:#fff;border-bottom-right-radius:4px}.cmsg--a{align-self:flex-start;background:#fff;border:1px solid var(--line);border-bottom-left-radius:4px}.cmsg--sys{align-self:center;font-size:11.5px;font-weight:800;letter-spacing:.4px;color:var(--orange);background:var(--orange-soft);padding:5px 12px;border-radius:999px}.cmsg ul{margin:8px 0 0 16px;font-size:13px}.ctyping{align-self:flex-start;display:inline-flex;gap:4px;padding:12px 14px;background:#fff;border:1px solid var(--line);border-radius:14px}.ctyping i{width:7px;height:7px;border-radius:50%;background:var(--muted);animation:blink 1.2s infinite}.ctyping i:nth-child(2){animation-delay:.2s}.ctyping i:nth-child(3){animation-delay:.4s}
@keyframes blink{0%,60%,100%{opacity:.25}30%{opacity:1}}/* ===================== APP MGMT LIVE FEED ===================== */
.ams-track{display:flex;flex-direction:column;align-items:center}.ams-step{width:100%;max-width:320px;transition:.6s cubic-bezier(.165,.84,.44,1);opacity:.32;filter:blur(1px);transform:scale(.94)}.ams-step.act{opacity:1;filter:none;transform:scale(1.03)}.ams-step.done{opacity:.6;filter:none;transform:scale(1)}.ams-card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px;box-shadow:var(--shadow-sm);position:relative}.ams-step.act .ams-card{border-color:var(--orange);box-shadow:0 16px 40px rgba(222,110,48,.16)}.ams-tag{font-size:10px;font-weight:800;color:var(--orange);letter-spacing:1px;margin-bottom:8px}.ams-tag.sec{color:var(--blue)}.ams-id{font-size:14px;font-weight:700;margin-bottom:8px}.ok-badge{display:inline-block;padding:3px 10px;border-radius:6px;font-size:11px;font-weight:700;background:#dce9fc;color:#163665}.ams-ai{display:flex;align-items:center;gap:6px;font-weight:800;font-size:11px;color:var(--orange);margin-bottom:8px}.scanbar{height:4px;background:#eef2f7;border-radius:3px;overflow:hidden;position:relative;margin-top:8px}.ams-step.act .scanbar::after{content:"";position:absolute;left:-50%;width:50%;height:100%;background:var(--orange);animation:scan 1.4s infinite}
@keyframes scan{0%{left:-50%}100%{left:150%}}.ams-co{display:flex;align-items:center;gap:12px;margin-bottom:10px}.ams-co img{width:42px;height:42px;border-radius:50%;border:2px solid #fff}.ams-btn{background:var(--blue);color:#fff;text-align:center;padding:9px;border-radius:9px;font-size:11px;font-weight:700}.ams-final{background:var(--blue);color:#fff;border:none}.ams-final .ic{width:46px;height:46px;border-radius:50%;background:var(--green);display:grid;place-items:center;margin:0 auto 10px}.ams-final .ft{text-align:center;font-weight:800;font-size:16px;margin-bottom:8px}.ams-pay{text-align:center;border-top:1px solid rgba(255,255,255,.12);padding-top:8px;font-size:11px}.ams-pay code{color:var(--orange);font-weight:700}.ams-conn{width:3px;height:30px;background:#eef2f7;overflow:hidden;border-radius:3px}.ams-conn i{display:block;width:100%;height:0;background:var(--orange);transition:height .5s linear}.ams-log{margin-top:18px;background:#0f1a2a;border-radius:12px;padding:12px 14px;font-family:ui-monospace,Menlo,monospace;font-size:11px;color:#9bb3d6;display:flex;align-items:center;gap:8px;min-height:40px}.ams-log b{color:#7cb0ff}/* ===================== AI NETWORK VISUALIZATION ===================== */
.aihub{background:var(--blue);color:#fff;border-radius:28px;padding:48px;position:relative;overflow:hidden}.aihub canvas{position:absolute;inset:0;width:100%;height:100%;opacity:.5}.aihub__in{position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:center}.aihub h2{font-family:'Inter',sans-serif;font-size:clamp(28px,3.6vw,40px);font-weight:800;letter-spacing:-1px;line-height:1.12}.aihub .lead{color:#c6d3e6}.aichips{display:flex;flex-wrap:wrap;gap:8px;margin-top:8px}.aichip{font-size:12.5px;font-weight:700;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);padding:7px 13px;border-radius:999px;color:#fff}.rf-stage{position:relative;height:380px;display:flex;align-items:center;justify-content:center}.rf-hub{width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.06);border:3px solid var(--orange);display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;z-index:5;transition:transform .3s,border-color .3s}.rf-hub b{font-family:'Inter',sans-serif;font-size:18px}.rf-hub span{font-size:8px;font-weight:800;letter-spacing:1px;color:#ffd9bf}.rf-chip{position:absolute;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);padding:6px 13px;border-radius:30px;font-size:10px;font-weight:700;white-space:nowrap;z-index:4;will-change:transform}.rf-lead{position:absolute;background:#fff;color:var(--blue);padding:7px 14px;border-radius:9px;font-size:11px;font-weight:700;z-index:3;opacity:0;box-shadow:0 8px 20px rgba(0,0,0,.25)}.rf-toast{position:absolute;top:8px;right:0;background:#fff;color:var(--blue);border-left:4px solid var(--orange);padding:12px 14px;border-radius:4px 12px 12px 4px;width:185px;font-size:11px;transform:translateX(130%);transition:transform .5s cubic-bezier(.175,.885,.32,1.275);z-index:8}.rf-toast.on{transform:none}.rf-toast b{color:var(--orange);font-family:'Inter',sans-serif}.rf-pipe{position:absolute;bottom:0;left:0;right:0;display:flex;justify-content:space-between}.rf-st{flex:1;display:flex;flex-direction:column;align-items:center;gap:5px;opacity:.3;transition:.4s}.rf-st.on{opacity:1;transform:scale(1.1)}.rf-st .pd{width:11px;height:11px;border-radius:50%;background:#fff}.rf-st.on .pd{background:var(--orange);box-shadow:0 0 12px var(--orange)}.rf-st small{font-size:8px;font-weight:800;text-transform:uppercase;color:#c6d3e6}/* ===================== ARCHITECT (sticky + scroll-zoom) ===================== */
.arch-wrap{display:grid;grid-template-columns:.9fr 1.1fr;gap:48px;align-items:start;margin-top:30px}.arch-story{min-height:78vh;display:flex;flex-direction:column;justify-content:center;opacity:.25;transform:translateY(24px);transition:.6s;padding:20px 0 20px 22px;border-left:2px solid var(--line)}.arch-story.active{opacity:1;transform:none;border-left-color:var(--orange)}.arch-story h3{font-family:'Inter',sans-serif;font-size:clamp(24px,2.7vw,34px);font-weight:800;letter-spacing:-.8px;margin-bottom:12px}.arch-story p{color:var(--muted);font-size:16.5px;max-width:460px;margin-bottom:16px}.arch-sticky{position:sticky;top:90px;height:78vh;max-height:600px;display:flex;align-items:center;justify-content:center;perspective:1400px}.arch-screen{width:100%;max-width:520px;height:100%;background:radial-gradient(130% 130% at 0% 0%,#21457a 0%,#162b4b 60%);border-radius:32px;padding:26px;color:#fff;position:relative;overflow:hidden;transition:transform .8s cubic-bezier(.19,1,.22,1);box-shadow:0 60px 120px -30px rgba(25,52,93,.55),inset 0 0 0 1px rgba(255,255,255,.06)}.arch-screen::after{content:"";position:absolute;left:0;top:0;height:100%;width:2px;background:linear-gradient(transparent,var(--orange),transparent);animation:scanX 3.5s linear infinite;opacity:.5}
@keyframes scanX{0%{left:0}100%{left:100%}}.arch-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}.arch-hd .live{font-size:9px;font-weight:800;letter-spacing:1px;color:#7cb0ff;text-transform:uppercase;padding:0}.av-view{display:none}.av-view.on{display:block;animation:slideIn .5s ease}.glass-row{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-radius:14px;padding:14px;margin-bottom:10px;display:flex;justify-content:space-between;align-items:center}.glass-row .av{width:30px;height:30px;border-radius:50%;background:rgba(255,255,255,.14);display:grid;place-items:center;font-size:10px;font-weight:800}.glass-row small{font-size:10px;color:#9bb3d6;display:block}.synced{font-size:10px;font-weight:800;color:#ffd9bf}.av-chat{background:rgba(255,255,255,.07);border-radius:14px;padding:16px;min-height:240px;display:flex;flex-direction:column;justify-content:flex-end;gap:10px}.av-chat .b{font-size:12px;padding:11px 14px;border-radius:14px;max-width:82%;line-height:1.5}.av-chat .b.u{background:#fff;color:var(--blue);border-bottom-left-radius:4px}.av-chat .b.a{background:var(--orange);color:#fff;align-self:flex-end;border-bottom-right-radius:4px}.av-center{display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:260px;text-align:center}.av-score{background:rgba(255,255,255,.07);border-radius:18px;padding:22px;text-align:center}.av-score .big{font-family:'Inter',sans-serif;font-size:46px;font-weight:800;color:#ffd9bf}.arch-metrics{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-top:50px;border-top:1px solid var(--line);padding-top:36px}.arch-metrics .m{text-align:center}.arch-metrics .m b{font-family:'Inter',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;display:block;letter-spacing:-2px}.arch-metrics .m span{font-size:11px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:var(--muted)}/* ===================== TESTIMONIALS ===================== */
/* impact stories polish */
.tcard{position:relative}.tcard::before{content:"";position:absolute;inset:0 0 auto 0;height:4px;background:linear-gradient(90deg,var(--orange),var(--blue));opacity:0;transition:opacity .3s;z-index:3}.tcard:hover::before{opacity:1}.tvid::after{content:"\25B6  Watch the 60-sec story";position:absolute;left:0;right:0;bottom:0;padding:22px 14px 12px;color:#fff;font-size:12px;font-weight:700;background:linear-gradient(transparent,rgba(0,0,0,.55));z-index:2;transition:opacity .3s}.tvid.playing::after{opacity:0}.tbody{position:relative}.tbody .q{position:relative;padding-top:8px}.tbody .q::before{content:"\201C";position:absolute;top:-14px;left:-4px;font-family:Georgia,serif;font-size:56px;line-height:1;color:rgba(222,110,48,.18);font-weight:700}.tmetric{box-shadow:0 6px 16px rgba(222,110,48,.18)}/* impact stories polish END */
.tcards{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:42px}.tcard{background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;transition:transform .4s,box-shadow .4s}.tcard:hover{transform:translateY(-8px);box-shadow:var(--shadow)}.tvid{aspect-ratio:16/9;background:#000;position:relative;cursor:pointer}.tvid img.thumb{width:100%;height:100%;object-fit:cover;transition:transform .8s}.tcard:hover .tvid img.thumb{transform:scale(1.07)}.tplay{position:absolute;inset:0;display:grid;place-items:center}.tplay span{width:64px;height:64px;border-radius:50%;background:#fff;display:grid;place-items:center;box-shadow:0 10px 30px rgba(0,0,0,.3);transition:.3s}.tplay span::after{content:"";border-left:18px solid var(--orange);border-top:11px solid transparent;border-bottom:11px solid transparent;margin-left:5px}.tcard:hover .tplay span{background:var(--orange);transform:scale(1.08)}.tcard:hover .tplay span::after{border-left-color:#fff}.tvid.playing .tplay,.tvid.playing img.thumb{opacity:0;pointer-events:none}.tbody{padding:26px;display:flex;flex-direction:column;flex:1}.stars{color:var(--orange);font-size:14px;margin-bottom:10px}.tmetric{display:inline-block;font-family:'Inter',sans-serif;font-weight:800;font-size:13.5px;color:var(--orange);background:var(--orange-soft);padding:5px 13px;border-radius:999px;margin-bottom:10px}.tbody p.q{font-size:14px;color:#333e4f;font-style:italic;line-height:1.7}.tby{display:flex;align-items:center;gap:12px;margin-top:auto;padding-top:18px;border-top:1px solid var(--line)}.tby img{width:52px;height:52px;border-radius:14px;object-fit:cover;border:2px solid var(--orange-soft)}.tby b{font-size:14.5px;display:block}.tby .role{color:var(--orange);font-size:12.5px;font-weight:700}.tby .inst{color:var(--muted);font-size:11.5px}/* ===================== FAQ ===================== */
.faq{max-width:820px;margin:42px auto 0}.qa{border:1px solid var(--line);border-radius:16px;margin-bottom:14px;background:#fff;overflow:hidden}.qa button{width:100%;display:flex;justify-content:space-between;align-items:center;gap:16px;padding:20px 22px;background:none;border:0;font:inherit;font-weight:700;font-size:16.5px;color:var(--blue);text-align:left;cursor:pointer}.qa button .ic{flex:none;width:26px;height:26px;border-radius:50%;background:var(--orange-soft);color:var(--orange);display:grid;place-items:center;font-weight:900;transition:.3s}.qa.open button .ic{background:var(--orange);color:#fff;transform:rotate(45deg)}.qa__a{max-height:0;overflow:hidden;transition:max-height .35s ease}.qa__a p{padding:0 22px 22px;color:var(--muted);font-size:15px;line-height:1.7}/* ===================== FINAL CTA ===================== */
.cta__box{background:linear-gradient(135deg,var(--blue) 0%,#21457a 100%);border-radius:28px;padding:60px 40px;text-align:center;color:#fff;position:relative;overflow:hidden}.cta__box::before{content:"";position:absolute;width:300px;height:300px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);top:-100px;right:-60px}.cta__box h2{font-family:'Inter',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;letter-spacing:-1.2px;position:relative}.cta__box p{color:#c6d3e6;font-size:18px;margin:14px 0 28px;position:relative}.cta__form{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;max-width:640px;margin:0 auto;position:relative}.cta__form input{flex:1;min-width:180px;padding:15px 18px;border-radius:12px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.1);color:#fff;font-size:15px;font-family:inherit}.cta__form input::placeholder{color:#aebed6}.cta__form input:focus{outline:none;border-color:var(--orange);background:rgba(255,255,255,.16)}.cta__form .btn{flex-basis:100%;justify-content:center}.cta__micro{color:#aebed6;font-size:13px;margin-top:14px;position:relative}.wa{position:fixed;right:22px;bottom:22px;width:58px;height:58px;border-radius:50%;background:#256bd3;color:#fff;display:grid;place-items:center;font-size:27px;text-decoration:none;z-index:50;box-shadow:0 12px 30px rgba(37,107,211,.45);transition:transform .2s}.wa:hover{transform:scale(1.1)}/* ===================== iPHONE LIVE MOBILE CRM ===================== */
.iphone-stage{position:relative;display:flex;align-items:center;justify-content:center;min-height:660px}.iphone-glow{position:absolute;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.18),transparent 70%);animation:glowp 4s ease-in-out infinite}
@keyframes glowp{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.14);opacity:.6}}.iphone{position:relative;width:300px;height:618px;background:linear-gradient(160deg,#222d3d,#0b1422);border-radius:52px;padding:11px;box-shadow:0 50px 90px -25px rgba(25,52,93,.55),inset 0 0 0 2px rgba(255,255,255,.06);z-index:5;flex:none}.iphone::before{content:"";position:absolute;right:-3px;top:130px;width:3px;height:62px;background:#101a2a;border-radius:0 3px 3px 0}.iphone::after{content:"";position:absolute;left:-3px;top:104px;width:3px;height:34px;background:#101a2a;border-radius:3px 0 0 3px;box-shadow:0 52px 0 #101a2a}.ip-screen{width:100%;height:100%;border-radius:42px;overflow:hidden;position:relative;background:linear-gradient(180deg,#0e1c30 0%,#13243d 45%,#0e1c30 100%);display:flex;flex-direction:column}.ip-island{position:absolute;top:12px;left:50%;transform:translateX(-50%);width:96px;height:26px;background:#05080f;border-radius:16px;z-index:30;display:flex;align-items:center;justify-content:center;gap:8px}.ip-island .cam{width:8px;height:8px;border-radius:50%;background:#1b2b42}.ip-island .spk{width:30px;height:4px;border-radius:3px;background:#142033}.ip-status{display:flex;justify-content:space-between;align-items:center;padding:16px 22px 0;color:rgba(255,255,255,.85);font-size:11px;font-weight:800;position:relative;z-index:6}.ip-sig{display:flex;gap:2px;align-items:flex-end}.ip-sig i{width:3px;border-radius:1px;background:rgba(255,255,255,.8)}.ip-head{padding:14px 18px 12px;display:flex;align-items:center;justify-content:space-between;position:relative;z-index:6}.ip-user{display:flex;align-items:center;gap:9px}.ip-av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--orange),#f59e0b);display:grid;place-items:center;color:#fff;font-weight:800;font-size:13px;border:2px solid var(--green)}.ip-user b{color:#fff;font-size:12.5px;display:block}.ip-user span{color:rgba(255,255,255,.55);font-size:9.5px;display:flex;align-items:center;gap:4px}.ip-live{background:rgba(16,84,185,.18);border:1px solid rgba(16,84,185,.45);color:#7cb0ff;padding:4px 10px;border-radius:100px;font-size:9px;font-weight:800;letter-spacing:.6px;display:flex;align-items:center;gap:5px}.ip-live i{width:6px;height:6px;border-radius:50%;background:#3474d3;animation:blink2 1.3s infinite}
@keyframes blink2{0%,100%{opacity:1}50%{opacity:.25}}.ip-kpis{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;padding:4px 16px 12px;position:relative;z-index:6}.ip-kpi{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);border-radius:12px;padding:9px 8px;text-align:center}.ip-kpi b{font-family:'Inter',sans-serif;color:#fff;font-size:16px;display:block;line-height:1}.ip-kpi span{color:rgba(255,255,255,.5);font-size:8px;font-weight:700;text-transform:uppercase;letter-spacing:.4px}.ip-feedwrap{flex:1;margin:0 12px 12px;background:rgba(5,10,20,.55);border:1px solid rgba(255,255,255,.07);border-radius:18px;padding:11px;overflow:hidden;position:relative;z-index:6}.ip-feedwrap .fh{display:flex;justify-content:space-between;align-items:center;margin-bottom:9px}.ip-feedwrap .fh b{color:rgba(255,255,255,.55);font-size:9px;font-weight:800;letter-spacing:1px;text-transform:uppercase}.ip-feedwrap .fh .sync{color:#7cb0ff;font-size:8px;font-weight:800;display:flex;align-items:center;gap:5px}.ip-spin{width:10px;height:10px;border:2px solid rgba(124,176,255,.25);border-top-color:#7cb0ff;border-radius:50%;animation:spin 1s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}.ip-feed{display:flex;flex-direction:column;gap:7px}.ip-item{display:flex;gap:9px;align-items:center;background:rgba(255,255,255,.06);border-left:3px solid var(--orange);border-radius:10px;padding:8px 10px;animation:ipIn .5s cubic-bezier(.34,1.56,.64,1)}
@keyframes ipIn{from{opacity:0;transform:translateX(16px)}to{opacity:1;transform:none}}.ip-item .e{font-size:15px;flex:none}.ip-item b{color:#fff;font-size:9.8px;font-weight:700;display:block;line-height:1.3}.ip-item span{color:rgba(255,255,255,.5);font-size:8.5px}.ip-cta{margin:0 12px 16px;position:relative;z-index:6}.ip-cta a{display:block;text-align:center;background:var(--orange);color:#fff;font-weight:800;font-size:12px;padding:11px;border-radius:13px;text-decoration:none}/* floating cards around phone */
.fcard{position:absolute;background:#fff;border:1px solid var(--line);border-radius:14px;padding:11px 13px;box-shadow:0 18px 40px rgba(25,52,93,.16);z-index:20;display:flex;gap:10px;align-items:center;opacity:0;transform:scale(.85) translateY(14px);transition:.6s cubic-bezier(.34,1.56,.64,1)}.fcard.on{opacity:1;transform:none}.fcard .fi{width:34px;height:34px;border-radius:10px;background:var(--orange-soft);display:grid;place-items:center;font-size:17px;flex:none}.fcard b{font-size:12px;display:block;color:var(--blue)}.fcard small{font-size:10.5px;color:var(--muted)}.fc1{top:6%;left:-26px}.fc2{top:34%;right:-30px}.fc3{bottom:20%;left:-34px}
@media(min-width:1100px){.fc1{left:-50px}.fc2{right:-54px}.fc3{left:-60px}}/* lead-journey roadmap behind the phone */
.iphone-stage{overflow:visible}.roadmap{position:absolute;inset:0;z-index:2;pointer-events:none}.roadmap svg,.roadmap img.eeimg{position:absolute;inset:0;width:100%;height:100%}.rm-path{fill:none;stroke:#e6c7af;stroke-width:2.5;stroke-dasharray:6 7;opacity:.6;vector-effect:non-scaling-stroke}.rm-prog{fill:none;stroke:var(--orange);stroke-width:3;stroke-linecap:round;stroke-dashoffset:100;transition:stroke-dashoffset 1s linear;vector-effect:non-scaling-stroke}.rm-node{position:absolute;transform:translate(-50%,-50%);display:flex;align-items:center;gap:8px;z-index:3}.rm-node.t{flex-direction:column}.rm-node.b{flex-direction:column-reverse}.rm-node.r{flex-direction:row-reverse}.rm-dot{width:15px;height:15px;border-radius:50%;background:#fff;border:3px solid #e6c7af;flex:none;transition:.4s}.rm-node.on .rm-dot{border-color:var(--orange);background:var(--orange);box-shadow:0 0 0 6px rgba(222,110,48,.15)}.rm-lbl{background:#fff;border:1px solid var(--line);border-radius:999px;padding:5px 11px;font-size:11px;font-weight:800;color:var(--blue);box-shadow:var(--shadow-sm);white-space:nowrap;opacity:.78;transition:.4s}.rm-node.on .rm-lbl{opacity:1;border-color:var(--orange);color:var(--orange)}
@media(max-width:400px){.rm-lbl{font-size:9.5px;padding:4px 8px}.rm-dot{width:12px;height:12px}}/* ===================== ROI CALCULATOR ===================== */
.roi{background:linear-gradient(135deg,var(--blue),#21457a);border-radius:28px;padding:46px;color:#fff;position:relative;overflow:hidden}.roi::before{content:"";position:absolute;width:320px;height:320px;border-radius:50%;background:rgba(222,110,48,.28);filter:blur(90px);top:-120px;left:-60px}.roi__in{position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:44px;align-items:center}.roi h2{font-family:'Inter',sans-serif;font-size:clamp(26px,3.2vw,38px);font-weight:800;letter-spacing:-1px;line-height:1.12;margin-bottom:12px}.roi p.sub{color:#c6d3e6;font-size:16px;margin-bottom:26px}.roi-field{margin-bottom:22px}.roi-field label{display:flex;justify-content:space-between;font-size:13px;font-weight:700;margin-bottom:10px}.roi-field label b{color:#ffd9bf;font-family:'Inter',sans-serif;font-size:16px}.roi-field input[type=range]{width:100%;-webkit-appearance:none;appearance:none;height:6px;border-radius:6px;background:rgba(255,255,255,.18);outline:none}.roi-field input[type=range]::-webkit-slider-thumb{-webkit-appearance:none;width:22px;height:22px;border-radius:50%;background:var(--orange);cursor:pointer;box-shadow:0 4px 12px rgba(222,110,48,.6);border:3px solid #fff}.roi-field input[type=range]::-moz-range-thumb{width:22px;height:22px;border-radius:50%;background:var(--orange);cursor:pointer;border:3px solid #fff}.roi-out{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.14);border-radius:20px;padding:26px}.roi-out .big{font-family:'Inter',sans-serif;font-size:clamp(40px,6vw,64px);font-weight:800;color:#ffd9bf;line-height:1;letter-spacing:-2px}.roi-out .biglbl{font-size:13px;color:#c6d3e6;font-weight:700;margin-top:6px}.roi-split{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin:22px 0}.roi-split div{background:rgba(255,255,255,.06);border-radius:14px;padding:14px}.roi-split b{font-family:'Inter',sans-serif;font-size:22px;display:block;color:#fff}.roi-split span{font-size:11px;color:#9bb3d6;font-weight:700;text-transform:uppercase;letter-spacing:.5px}.roi-note{font-size:11px;color:#9bb3d6;margin-top:6px}/* ===================== DEMO VALUE + BADGES ===================== */
.demo-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:0;border-radius:20px;overflow:hidden;box-shadow:var(--shadow);max-width:1020px;margin:0 auto}.demo-left{background:linear-gradient(135deg,var(--blue) 0%,#21457a 100%);color:#fff;padding:30px 28px;position:relative;overflow:hidden}.demo-left::before{content:"";position:absolute;width:280px;height:280px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);bottom:-110px;left:-50px}.demo-left h2{font-family:'Inter',sans-serif;font-size:clamp(21px,2.4vw,28px);font-weight:800;letter-spacing:-.5px;line-height:1.15;position:relative}.demo-left p.s{color:#c6d3e6;font-size:13.5px;line-height:1.55;margin:9px 0 16px;position:relative}.dchecks{list-style:none;display:flex;flex-direction:column;gap:9px;position:relative;margin-bottom:16px}.dchecks li{display:flex;gap:9px;align-items:flex-start;font-size:12.5px;line-height:1.5}.dchecks .ck{flex:none;width:18px;height:18px;border-radius:50%;background:var(--orange);display:grid;place-items:center;font-size:10px;font-weight:900}.dbadges{display:flex;gap:14px;flex-wrap:wrap;align-items:center;position:relative;padding-top:22px;border-top:1px solid rgba(255,255,255,.14)}.dbadge{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700;color:#dfe8f5}.dbadge img{height:34px;width:auto;filter:drop-shadow(0 0 6px rgba(255,255,255,.25))}.drating{display:flex;align-items:center;gap:7px;font-size:11px;font-weight:700;color:#dfe8f5}.drating .st{color:#ffb169;letter-spacing:1px}.dbadge-img{height:46px;width:auto;background:#fff;border-radius:8px;padding:5px 8px}.demo-right{background:#fff;padding:26px 24px;display:flex;flex-direction:column;justify-content:center}.demo-right h3{font-family:'Inter',sans-serif;font-size:18px;font-weight:800;margin-bottom:3px}.demo-right .sub2{color:var(--muted);font-size:12.5px;margin-bottom:12px}.demo-form{display:flex;flex-direction:column;gap:12px}.demo-form input,.demo-form select{padding:14px 16px;border-radius:12px;border:1.5px solid var(--line);font-size:15px;font-family:inherit;color:var(--ink);background:#fff;transition:border-color .2s}.demo-form input:focus,.demo-form select:focus{outline:none;border-color:var(--orange)}.demo-form .btn{justify-content:center;margin-top:4px}.demo-trust{display:flex;align-items:center;gap:7px;justify-content:center;font-size:11px;color:var(--muted);margin-top:10px;font-weight:600}.demo-ok{display:none;text-align:center;padding:18px;background:#dce9fc;color:#163665;border-radius:14px;font-weight:700;font-size:14px;margin-top:6px}/* ===================== STICKY CTA BAR ===================== */
.scta{position:fixed;left:0;right:0;bottom:0;z-index:55;background:rgba(25,52,93,.97);backdrop-filter:blur(10px);color:#fff;transform:translateY(120%);transition:transform .45s cubic-bezier(.19,1,.22,1);box-shadow:0 -10px 40px rgba(0,0,0,.25)}.scta.on{transform:none}.scta__in{max-width:var(--maxw);margin:0 auto;padding:12px 24px;display:flex;align-items:center;gap:16px;justify-content:space-between}.scta__txt{display:flex;align-items:center;gap:12px;font-weight:700;font-size:14.5px}.scta__txt .ping{flex:none}.scta__r{display:flex;align-items:center;gap:12px}.scta__x{background:none;border:0;color:rgba(255,255,255,.5);font-size:20px;cursor:pointer;line-height:1;padding:4px}.scta__x:hover{color:#fff}
@media(max-width:700px){.scta__txt span.dim{display:none}.scta__in{padding:10px 14px}.wa{bottom:78px}}/* ===================== VIDYAGPT WIDGET ===================== */
.vg{--vg-navy:#1b3761;--vg-soft:#E9F4FB;width:100%;max-width:392px;border-radius:22px;overflow:hidden;background:#fff;border:1px solid #dce7f2;box-shadow:0 40px 90px -25px rgba(27,55,97,.4);font-size:14px}.vg-hd{background:var(--vg-navy);color:#fff;display:flex;align-items:center;gap:12px;padding:14px 16px}.vg-hd .bk,.vg-hd .ex,.vg-hd .cl{opacity:.85}.vg-hd .ti{font-weight:800;font-size:15px;display:flex;align-items:center;gap:7px;flex:1}.vg-hd svg,.vg-hd img.eeimg{width:16px;height:16px;display:block}.vg-hd .spark{width:20px;height:20px;background:linear-gradient(135deg,#f59e0b,#468aef);border-radius:6px;display:grid;place-items:center;color:#fff;font-size:11px}.vg-bd{background:linear-gradient(180deg,#fff, var(--vg-soft));height:498px;position:relative;overflow:hidden}.vg-screen{position:absolute;inset:0;padding:18px;display:flex;flex-direction:column;opacity:0;visibility:hidden;transition:opacity .5s}.vg-screen.on{opacity:1;visibility:visible}.vg-today{align-self:center;background:#fff;border:1px solid #e7eef6;color:var(--vg-navy);font-size:11px;font-weight:700;padding:4px 14px;border-radius:999px;box-shadow:0 4px 12px rgba(27,55,97,.06);margin-bottom:14px}/* home screen */
.vg-ask{margin:6px 0 16px}.vg-ask .q1{font-family:'Inter',sans-serif;font-size:26px;font-weight:800;color:#aebacd;line-height:1.1}.vg-ask .q2{font-family:'Inter',sans-serif;font-size:26px;font-weight:800;color:var(--vg-navy);line-height:1.1}.vg-qa{position:relative;border-radius:16px;background:#fff;padding:16px 14px;box-shadow:0 10px 26px rgba(27,55,97,.07)}.vg-qa::before{content:"";position:absolute;inset:0;border-radius:16px;padding:1.6px;background:linear-gradient(120deg,#f59e0b,#1b3761,#468aef);-webkit-mask:linear-gradient(#fff 0 0) content-box,linear-gradient(#fff 0 0);-webkit-mask-composite:xor;mask-composite:exclude;pointer-events:none}.vg-qa h5{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:800;color:var(--vg-navy);padding-bottom:12px;margin-bottom:12px;border-bottom:1px solid #eef3f9}.vg-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px 6px}.vg-act{display:flex;flex-direction:column;align-items:center;gap:7px;text-align:center;cursor:pointer}.vg-act .ic{width:46px;height:46px;border-radius:50%;background:#f1f5f9;display:grid;place-items:center;color:var(--vg-navy);transition:.25s}.vg-act:hover .ic{background:var(--vg-navy);color:#fff;transform:translateY(-3px)}.vg-act .ic svg,.vg-act .ic img.eeimg{width:20px;height:20px}.vg-act span{font-size:11px;font-weight:600;color:#475569;line-height:1.2}.vg-chips{display:flex;gap:8px;overflow:hidden;margin-top:auto;padding:14px 0 12px;position:relative}.vg-chip{flex:none;background:#fff;border:1px solid #dbe6f1;border-radius:999px;padding:8px 14px;font-size:12px;font-weight:700;color:var(--vg-navy);white-space:nowrap}.vg-chev{flex:none;width:26px;height:26px;border-radius:50%;background:#fff;border:1px solid #dbe6f1;display:grid;place-items:center;color:var(--vg-navy);align-self:center}.vg-input{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid #dbe6f1;border-radius:14px;padding:10px 12px}.vg-input .ph{flex:1;color:#9aa6b8;font-size:13px}.vg-input .mic{color:#e1721d}.vg-input .snd{width:34px;height:34px;border-radius:10px;background:#8a9ebd;display:grid;place-items:center;color:#fff;flex:none}.vg-input .snd svg,.vg-input .snd img.eeimg{width:16px;height:16px}/* chat screen */
.vg-msg{max-width:88%;padding:12px 14px;border-radius:14px;font-size:13px;line-height:1.55;margin-bottom:12px;position:relative;animation:cin .35s both}.vg-msg.bot{align-self:flex-start;background:#fff;border:1px solid #e7eef6;box-shadow:0 6px 16px rgba(27,55,97,.06)}.vg-msg.bot.grad{border:none;border-left:3px solid transparent;border-image:linear-gradient(180deg,#f59e0b,#468aef) 1}.vg-msg.user{align-self:flex-end;background:var(--vg-navy);color:#fff}.vg-msg .who{display:flex;align-items:center;gap:6px;font-weight:800;color:var(--vg-navy);font-size:12px;margin-bottom:5px}.vg-msg .who .spark{width:16px;height:16px;font-size:9px}.vg-time{align-self:flex-end;font-size:10px;color:#9aa6b8;margin:-6px 2px 12px}.vg-ok{display:inline-flex;align-items:center;gap:6px}/* call screen */
.vg-call{align-items:center;justify-content:flex-start;text-align:center}.vg-call h4{font-family:'Inter',sans-serif;font-weight:800;color:var(--vg-navy);font-size:20px;margin-top:6px}.vg-call p.cs{color:#5b6b82;font-size:13px;margin:8px 0 0;max-width:260px}.vg-rings{position:relative;width:200px;height:200px;margin:22px auto;display:grid;place-items:center}.vg-rings .r{position:absolute;border:1.5px solid #dbe6f1;border-radius:50%}.vg-rings .r1{width:70px;height:70px}.vg-rings .r2{width:120px;height:120px}.vg-rings .r3{width:170px;height:170px}.vg-rings .r4{width:200px;height:200px}.vg-rings .core{width:74px;height:74px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#468aef,#639cf1);display:grid;place-items:center;color:#fff;z-index:2;box-shadow:0 10px 30px rgba(70,138,239,.35);animation:vgpulse 2s infinite}
@keyframes vgpulse{0%,100%{transform:scale(1)}50%{transform:scale(1.08)}}.vg-rings .wave{position:absolute;border:2px solid #468aef;border-radius:50%;width:74px;height:74px;opacity:0;animation:vgwave 2.4s infinite}.vg-rings .wave.w2{animation-delay:.8s}.vg-rings .wave.w3{animation-delay:1.6s}
@keyframes vgwave{0%{transform:scale(1);opacity:.5}100%{transform:scale(2.5);opacity:0}}.vg-timer{font-family:'Inter',sans-serif;font-size:42px;font-weight:800;color:var(--vg-navy);letter-spacing:1px}.vg-callst{color:#5b6b82;font-size:13px;margin-top:4px}.vg-callbtns{display:flex;align-items:center;gap:22px;margin-top:24px}.vg-mute{display:flex;align-items:center;gap:8px;color:var(--vg-navy);font-weight:700;font-size:14px}.vg-end{background:#ef8e44;color:#fff;border-radius:999px;padding:13px 26px;font-weight:800;font-size:14px;display:flex;align-items:center;gap:8px;box-shadow:0 12px 26px rgba(239,142,68,.35)}.vg-narr{background:#fff;border-top:1px solid #eef3f9;color:#5b6b82;font-size:11.5px;font-weight:600;padding:9px 14px;display:flex;align-items:center;gap:7px}.vg-foot{text-align:center;font-size:11px;color:#9aa6b8;padding:10px;background:#fff;border-top:1px solid #eef3f9}.vg-foot b{color:var(--orange);font-weight:800}/* ===================== SEGMENT SELECTOR ===================== */
.seg-tabs{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin:28px 0 22px}.seg-tab{padding:11px 20px;border-radius:999px;border:1.5px solid var(--line);background:#fff;font:inherit;font-weight:700;font-size:14px;color:var(--blue);cursor:pointer;transition:.2s}.seg-tab:hover{border-color:var(--orange);color:var(--orange)}.seg-tab.on{background:var(--blue);color:#fff;border-color:var(--blue)}.seg-panel{max-width:780px;margin:0 auto;background:#fff;border:1px solid var(--line);border-radius:20px;padding:32px;box-shadow:var(--shadow-sm);text-align:center}.seg-panel .ic{font-size:34px;margin-bottom:8px}.seg-panel h3{font-family:'Inter',sans-serif;font-size:22px;margin-bottom:8px}.seg-panel p{color:var(--muted);font-size:16px;max-width:560px;margin:0 auto 14px}.seg-panel .chiprow{justify-content:center}/* ===================== INTEGRATIONS ===================== */
.intg{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:30px}.intg span{display:inline-flex;align-items:center;gap:9px;background:#fff;border:1px solid var(--line);border-radius:12px;padding:12px 18px;font-weight:700;font-size:14px;color:var(--blue);box-shadow:var(--shadow-sm);transition:.25s}.intg span:hover{border-color:var(--orange);transform:translateY(-3px)}.intg span i{font-size:18px;font-style:normal}/* ===================== COMPARISON TABLE ===================== */
.cmp{overflow-x:auto;border:1px solid var(--line);border-radius:20px;box-shadow:var(--shadow-sm);background:#fff;margin-top:14px}.cmp table{width:100%;border-collapse:collapse;min-width:660px}.cmp th,.cmp td{padding:15px 18px;text-align:center;border-bottom:1px solid var(--line);font-size:14px}.cmp th:first-child,.cmp td:first-child{text-align:left;font-weight:600;color:var(--blue)}.cmp thead th{font-family:'Inter',sans-serif;font-weight:800;color:var(--muted);font-size:14px}.cmp thead th.ee,.cmp td.ee{background:var(--orange-soft)}.cmp thead th.ee{color:var(--orange);font-size:15px}.cmp tbody tr:last-child td{border-bottom:none}.cmp .y{color:#164ea3;font-weight:800;font-size:17px}.cmp .n{color:#c2ccd8;font-size:17px}.cmp .p{color:#d98a3a;font-size:12px;font-weight:700}/* ===================== CASE STUDIES ===================== */
.cs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:14px}.cs-card{background:#fff;border:1px solid var(--line);border-radius:20px;padding:26px;box-shadow:var(--shadow-sm);transition:.3s}.cs-card:hover{transform:translateY(-6px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}.cs-metric{font-family:'Inter',sans-serif;font-size:38px;font-weight:800;letter-spacing:-1px;line-height:1}.cs-card .cl{color:var(--muted);font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;margin-top:4px}.cs-card p{color:#333e4f;font-size:14px;margin:14px 0 16px;line-height:1.6}.cs-card .who{display:flex;align-items:center;gap:10px;padding-top:14px;border-top:1px solid var(--line)}.cs-card .who .av{width:40px;height:40px;border-radius:11px;background:var(--orange-soft);display:grid;place-items:center;font-weight:800;color:var(--orange);font-size:13px}.cs-card .who b{font-size:13.5px}.cs-card .who small{color:var(--muted);display:block;font-size:11.5px}/* ===================== SECURITY ===================== */
.sec-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-top:14px}.sec-item{background:#fff;border:1px solid var(--line);border-radius:13px;padding:14px 12px;text-align:center;box-shadow:var(--shadow-sm)}.sec-item .ic{margin-bottom:8px;height:36px;display:flex;align-items:center;justify-content:center}.sec-item .ic img{height:36px;width:auto;object-fit:contain}.sec-item b{display:block;font-size:13px;margin-bottom:3px}.sec-item span{font-size:11.5px;color:var(--muted)}.sec-badges{display:flex;gap:18px;justify-content:center;align-items:center;margin-top:20px;flex-wrap:wrap}.sec-badges img{height:46px;width:auto}/* ===================== LEAD MAGNET ===================== */
.lm{background:linear-gradient(135deg,var(--blue),#21457a);color:#fff;border-radius:24px;padding:40px;display:grid;grid-template-columns:1.15fr .85fr;gap:32px;align-items:center;position:relative;overflow:hidden}.lm::before{content:"";position:absolute;width:260px;height:260px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);top:-100px;right:-50px}.lm h3{font-family:'Inter',sans-serif;font-size:clamp(22px,2.6vw,30px);font-weight:800;letter-spacing:-.6px;position:relative}.lm p{color:#c6d3e6;font-size:15px;margin-top:10px;position:relative}.lm form{display:flex;gap:10px;flex-wrap:wrap;position:relative}.lm input{flex:1;min-width:170px;padding:14px 16px;border-radius:12px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.1);color:#fff;font-family:inherit;font-size:15px}.lm input::placeholder{color:#aebed6}.lm input:focus{outline:none;border-color:var(--orange)}.lm .btn{flex-basis:100%;justify-content:center}.lm .ok{display:none;background:rgba(16,84,185,.18);border:1px solid rgba(16,84,185,.4);color:#7cb0ff;padding:14px;border-radius:12px;font-weight:700;text-align:center;position:relative}/* ===================== SEGMENT · STICKY SCROLLYTELLING ===================== */
.sg-wrap{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start;margin-top:24px}.sg-story{min-height:74vh;display:flex;flex-direction:column;justify-content:center;opacity:.24;transform:translateY(26px);transition:.6s;padding:18px 0}.sg-story.active{opacity:1;transform:none}.sg-story .tag{font-family:'Inter',sans-serif;font-weight:800;color:var(--orange);font-size:14px;letter-spacing:.5px;margin-bottom:10px}.sg-story h3{font-family:'Inter',sans-serif;font-size:clamp(24px,2.8vw,36px);font-weight:800;letter-spacing:-.8px;margin-bottom:12px;line-height:1.1}.sg-story p{color:var(--muted);font-size:16.5px;max-width:480px;margin-bottom:16px}.sg-sticky{position:sticky;top:84px;height:78vh;max-height:600px;display:flex;align-items:center;justify-content:center}.sg-card{width:100%;max-width:460px;height:100%;border-radius:28px;padding:34px;color:#fff;background:linear-gradient(160deg,var(--blue),#21457a);position:relative;overflow:hidden;display:flex;flex-direction:column;justify-content:center;transition:transform .6s cubic-bezier(.19,1,.22,1)}.sg-card::before{content:"";position:absolute;width:240px;height:240px;border-radius:50%;background:rgba(222,110,48,.32);filter:blur(80px);top:-90px;right:-50px}.sg-emoji{font-size:60px;margin-bottom:14px;position:relative}.sg-card h4{font-family:'Inter',sans-serif;font-size:28px;font-weight:800;margin-bottom:10px;position:relative}.sg-card>p{color:rgba(255,255,255,.82);font-size:15px;margin-bottom:22px;position:relative}.sg-stats{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:18px;position:relative}.sg-stats div{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:14px;padding:14px}.sg-stats b{font-family:'Inter',sans-serif;font-size:24px;color:#ffd9bf;display:block;line-height:1}.sg-stats span{font-size:11px;color:#c6d3e6;font-weight:700;text-transform:uppercase;letter-spacing:.4px}.sg-card .chiprow{position:relative}.sg-card .chip{background:rgba(255,255,255,.12);border-color:rgba(255,255,255,.2);color:#fff}/* ===================== COMPARISON (tabbed) ===================== */
.cmp2-tabs{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin:26px 0 16px}.cmp2-tab{padding:11px 20px;border-radius:999px;border:1.5px solid var(--line);background:#fff;font:inherit;font-weight:700;font-size:14px;color:var(--blue);cursor:pointer;transition:.2s}.cmp2-tab:hover{border-color:var(--orange);color:var(--orange)}.cmp2-tab.on{background:var(--blue);color:#fff;border-color:var(--blue)}.cmp2-sum{max-width:800px;margin:0 auto 18px;text-align:center;color:var(--muted);font-size:15.5px}.cmp2-incl{margin-top:16px;background:var(--orange-soft);border:1px solid #f3d8c4;border-radius:16px;padding:15px 18px;display:flex;flex-wrap:wrap;gap:8px;align-items:center}.cmp2-incl b{color:var(--orange);font-size:14px;margin-right:6px}.cmp2-when{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:24px}.when{background:#fff;border:1px solid var(--line);border-radius:18px;padding:24px;box-shadow:var(--shadow-sm)}.when.eecol{border-color:rgba(222,110,48,.4);background:linear-gradient(180deg,#fff,#fff8f3)}.when h4{font-family:'Inter',sans-serif;font-size:17px;margin-bottom:14px}.when.eecol h4{color:var(--orange)}.when ul{list-style:none;display:flex;flex-direction:column;gap:10px}.when li{display:flex;gap:10px;font-size:14px;color:#333e4f;line-height:1.5}.when.eecol li::before{content:"✓";color:var(--orange);font-weight:900;flex:none}.when.uniq{border-color:rgba(222,110,48,.4);background:linear-gradient(180deg,#fff,#fffaf6)}.when.uniq h4{color:var(--orange)}.when.uniq li::before{content:"★";color:var(--orange);font-weight:900;flex:none;font-size:12px;padding-top:2px}/* ===================== SEGMENT · INTERACTIVE PREVIEW ===================== */
.sg2{display:grid;grid-template-columns:.92fr 1.08fr;gap:40px;align-items:start;margin-top:30px}.sg2-list{display:flex;flex-direction:column;gap:12px}.sg2-item{display:flex;gap:14px;align-items:flex-start;padding:16px 18px;border:1.5px solid var(--line);border-radius:16px;background:#fff;cursor:pointer;transition:.3s;text-align:left;width:100%;font:inherit;color:inherit}.sg2-item:hover{border-color:rgba(222,110,48,.45)}.sg2-item.on{border-color:var(--orange);box-shadow:0 14px 30px rgba(222,110,48,.13);background:linear-gradient(180deg,#fff,#fff8f3)}.sg2-ic{width:46px;height:46px;border-radius:13px;background:var(--orange-soft);display:grid;place-items:center;font-size:22px;flex:none;transition:.3s}.sg2-item.on .sg2-ic{background:var(--orange);transform:scale(1.05)}.sg2-tx{flex:1}.sg2-tx b{font-family:'Inter',sans-serif;font-size:16px;display:block;color:var(--blue)}.sg2-tx p{color:var(--muted);font-size:13.5px;margin:3px 0 0}.sg2-more{display:none;gap:8px;flex-wrap:wrap;margin-top:10px}.sg2-item.on .sg2-more{display:flex}.sg2-bar{display:none;height:3px;background:#eef2f7;border-radius:3px;margin-top:12px;overflow:hidden}.sg2-item.on .sg2-bar{display:block}.sg2-bar i{display:block;height:100%;width:0;background:var(--orange)}/* right preview */
.sg2-view{position:sticky;top:90px;border-radius:24px;overflow:hidden;border:1px solid var(--line);box-shadow:var(--shadow);background:#fff}.sg2-vhd{background:var(--blue);color:#fff;padding:14px 18px;display:flex;align-items:center;justify-content:space-between;font-weight:700;font-size:14px}.sg2-live{font-size:10px;font-weight:800;display:flex;align-items:center;gap:6px;color:#7cb0ff;text-transform:uppercase}.sg2-vbd{padding:20px;background:var(--bg-soft);min-height:360px;animation:slideIn .45s ease}.sgv-row{display:flex;align-items:center;justify-content:space-between;gap:10px;background:#fff;border:1px solid var(--line);border-radius:12px;padding:11px 13px;margin-bottom:9px}.sgv-row b{font-size:13px;color:var(--blue)}.sgv-row small{font-size:11px;color:var(--muted);display:block}.sgv-bar2{height:6px;width:84px;background:#eef2f7;border-radius:6px;overflow:hidden;flex:none}.sgv-bar2 i{display:block;height:100%;background:var(--orange)}.sgv-pill{font-size:10px;font-weight:800;padding:4px 10px;border-radius:999px;background:var(--orange-soft);color:var(--orange);white-space:nowrap}.sgv-pill.g{background:#dce9fc;color:#163665}.sgv-pill.d{background:#eef2f7;color:#64748b}.sgv-foot{margin-top:4px;font-family:'Inter',sans-serif;font-weight:800;color:var(--orange);font-size:15px}.sgv-bub{font-size:12px;padding:9px 12px;border-radius:12px;margin-bottom:8px;max-width:86%;line-height:1.45}.sgv-bub.b{background:#fff;border:1px solid var(--line);border-bottom-left-radius:3px}.sgv-bub.u{background:var(--blue);color:#fff;margin-left:auto;border-bottom-right-radius:3px}/* ===================== CRMX · REAL PRODUCT MOCKUP ===================== */
.crmx{border:1px solid var(--line);border-radius:16px;overflow:hidden;box-shadow:var(--shadow);background:#fff;font-size:13px}.crmx-top{background:#2f343a;display:flex;align-items:center;gap:14px;padding:10px 16px;color:#cbd2da}.crmx-logo{font-family:'Inter',sans-serif;display:flex;align-items:center;gap:7px}.crmx-logo .ee-mark{width:24px;height:24px;flex:none}.crmx-logo .ee-wm{font-weight:900;font-size:17px;letter-spacing:-.5px;color:#fff}.crmx-logo .ee-wm b{color:var(--orange);font-weight:900}/* step indicator bar */
.crmx-step{display:flex;align-items:center;gap:7px;background:#fff5ef;border-bottom:1px solid var(--line);color:var(--blue);font-size:11.5px;font-weight:700;padding:7px 16px}.crmx-step b{color:var(--orange)}.crmx-step .dotp{width:7px;height:7px;border-radius:50%;background:var(--green);box-shadow:0 0 0 0 rgba(16,84,185,.5);animation:pulse2 2s infinite}
@keyframes pulse2{0%{box-shadow:0 0 0 0 rgba(16,84,185,.5)}70%{box-shadow:0 0 0 7px rgba(16,84,185,0)}100%{box-shadow:0 0 0 0 rgba(16,84,185,0)}}.crmx-mi{cursor:pointer}.crmx-search{display:flex;align-items:center;gap:8px;background:#3c424a;border:1px solid #4a515a;border-radius:8px;padding:7px 12px;color:#9aa3ad;flex:1;max-width:430px;font-size:12px}.crmx-search .gs{background:#454c55;border-radius:5px;padding:3px 9px;color:#cbd2da;font-weight:600}.crmx-ico{display:flex;gap:16px;align-items:center;margin-left:auto;font-size:15px}.crmx-bdg{position:relative}.crmx-bdg i{position:absolute;top:-8px;right:-10px;background:var(--orange);color:#fff;font-size:9px;font-weight:800;border-radius:999px;padding:0 5px;font-style:normal}.crmx-bdg.wa i{background:#256bd3}.crmx-clock{font-variant-numeric:tabular-nums;font-weight:700;color:#e6eaef;font-size:12px}.crmx-av{width:26px;height:26px;border-radius:50%;background:#5b6b82;flex:none}.crmx-body{display:flex;min-height:560px}.crmx-side{width:190px;flex:none;border-right:1px solid var(--line);padding:8px 0;background:#fff;overflow-y:auto}.crmx-mi{display:flex;align-items:center;gap:11px;padding:10px 16px;color:#5b6b82;font-weight:600;cursor:pointer;border-left:3px solid transparent;font-size:12.5px}.crmx-mi:hover{background:var(--bg-soft)}.crmx-mi.on{background:#fff5ef;color:var(--orange);border-left-color:var(--orange)}.crmx-mi .e{font-size:15px;width:18px;text-align:center;flex:none}.crmx-mi .b{margin-left:auto;background:#256bd3;color:#fff;font-size:9px;font-weight:800;border-radius:999px;padding:1px 6px}.crmx-main{flex:1;background:#f4f6f9;overflow:auto;min-width:0}.crmx-view{display:none}.crmx-view.on{display:block}/* lead list */
.lx-folders{display:flex;gap:10px;padding:14px 14px 8px;overflow-x:auto}.lx-folder{flex:none;min-width:140px;background:#fff;border:1px solid var(--line);border-radius:10px;padding:10px 14px}.lx-folder .t{font-weight:700;color:var(--blue);font-size:12px;display:flex;gap:6px;align-items:center}.lx-folder .n{margin-top:8px;color:#5b6b82;font-size:12px;display:flex;gap:6px;align-items:center}.lx-pills{display:flex;gap:8px;padding:0 14px 10px;flex-wrap:wrap}.lx-pill{border:1px solid var(--line);border-radius:999px;padding:5px 12px;font-size:11px;font-weight:700;color:var(--blue);background:#fff}.lx-pill.o{border-color:var(--orange);color:var(--orange)}.lx-tabs{display:flex;gap:16px;padding:0 14px;border-bottom:1px solid var(--line);overflow-x:auto}.lx-tab{padding:10px 2px;font-size:12.5px;font-weight:700;color:#5b6b82;white-space:nowrap;border-bottom:2px solid transparent;cursor:pointer}.lx-tab.on{color:var(--orange);border-bottom-color:var(--orange)}.lx-toolbar{display:flex;gap:12px;padding:10px 14px;color:var(--orange);font-size:14px;align-items:center}.lx-toolbar .sp{margin-left:auto}.lx-row{background:#fff;border:1px solid var(--line);border-radius:10px;margin:0 14px 12px;padding:12px 14px}.lx-head{display:flex;align-items:center;gap:10px;flex-wrap:wrap}.lx-chk{width:15px;height:15px;border:1.5px solid #c2ccd8;border-radius:3px;flex:none}.lx-name{font-weight:700;color:var(--blue)}.lx-c{display:inline-grid;place-items:center;min-width:18px;height:18px;border-radius:999px;border:1px solid var(--line);font-size:10px;color:#5b6b82;padding:0 4px;margin-left:3px}.lx-c.o{border-color:var(--orange);color:var(--orange)}.lx-phone{color:#5b6b82;font-size:12px;margin-left:2px}.lx-tick{color:#164ea3}.lx-badge{background:#2f343a;color:#fff;font-size:10px;font-weight:700;padding:3px 9px;border-radius:4px}.lx-sub{background:#fff;border:1px solid var(--line);color:#5b6b82;font-size:9.5px;padding:3px 9px;border-radius:4px;display:inline-block;margin-top:3px}.lx-meta{margin-left:auto;display:flex;align-items:center;gap:12px;color:#5b6b82;font-size:11px}.lx-meta .va{color:var(--orange);font-weight:700}.lx-insight{margin-top:10px;border:1px solid var(--line);border-left:3px solid var(--orange);border-radius:8px;padding:9px 12px;font-size:12px;color:#5b6b82;line-height:1.5;position:relative;overflow:hidden}.lx-insight::before{content:"";position:absolute;left:0;top:0;bottom:0;width:3px;background:linear-gradient(180deg,#f59e0b,#468aef)}.lx-insight .src{color:var(--blue);font-weight:800;text-decoration:underline}.lx-insight .more{color:var(--orange);font-weight:700}/* management dashboard */
.mx-top{display:flex;align-items:center;justify-content:space-between;padding:16px 16px 6px;gap:10px;flex-wrap:wrap}.mx-top h4{font-size:16px;color:var(--blue)}.mx-create{background:var(--orange);color:#fff;font-weight:800;font-size:11px;padding:9px 16px;border-radius:6px}.mx-filters{display:flex;gap:10px;padding:10px 16px;flex-wrap:wrap}.mx-sel{background:#fff;border:1px solid var(--line);border-radius:8px;padding:8px 14px;font-size:12px;color:#5b6b82;display:flex;gap:18px;align-items:center}.mx-kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;padding:0 16px}.mx-kpi{background:#fff;border:1px solid var(--line);border-top:3px solid var(--blue-2);border-radius:8px;padding:13px 14px}.mx-kpi .h{font-size:12px;color:#5b6b82;font-weight:700}.mx-kpi .big{font-family:'Inter',sans-serif;font-size:24px;font-weight:800;color:var(--blue);background:#eef2f7;border-radius:6px;display:inline-block;padding:1px 9px;margin:8px 0}.mx-kpi .r{display:flex;justify-content:space-between;font-size:11.5px;color:#5b6b82;margin-top:5px}.mx-kpi .r b{color:var(--blue)}.mx-tabs2{display:flex;gap:24px;padding:14px 16px 0;border-bottom:1px solid var(--line);margin-top:12px}.mx-tab2{font-size:13px;font-weight:700;color:#5b6b82;padding-bottom:10px;border-bottom:2px solid transparent;cursor:pointer}.mx-tab2.on{color:var(--orange);border-bottom-color:var(--orange)}.mx-funnelwrap{display:flex;gap:30px;padding:24px 18px;align-items:center;flex-wrap:wrap}.mx-funnel{flex:1;min-width:240px;display:flex;flex-direction:column;align-items:center;gap:3px}.mx-funnel .total{font-family:'Inter',sans-serif;font-size:24px;font-weight:800;color:var(--blue);align-self:flex-start;margin-bottom:8px}.mx-seg{color:#fff;font-weight:700;font-size:12px;text-align:center;padding:7px 0;clip-path:polygon(7% 0,93% 0,85% 100%,15% 100%);transition:width .6s}.mx-legend{display:flex;flex-direction:column;gap:9px;font-size:12px;color:#5b6b82}.mx-legend div{display:flex;align-items:center;gap:8px}.mx-legend i{width:11px;height:11px;border-radius:3px;flex:none}/* crmx integrated inside the VidyaAI sticky dashboard */
.crm.crmx{padding:0}.crm .crmx-body{min-height:0;flex:1}.crm .crmx-main{overflow-y:auto}.crm .crmx-side{width:152px}.crm .crmx-top{padding:9px 12px}.crm .crmx-search{max-width:none;font-size:11px}.crm .mx-kpis{grid-template-columns:1fr 1fr;gap:8px;padding-top:6px}.crm .mx-kpi{padding:10px}.crm .mx-kpi .big{font-size:20px;margin:6px 0}.crm .mx-funnelwrap{padding:18px 14px;gap:18px}.crm .lx-row{margin:0 12px 10px}/* "view more dashboards" step + premium teaser */
.vd-step.vd-more{border-style:dashed;border-color:var(--orange);color:var(--orange);background:#fff5ef}.vd-step.vd-more b{background:var(--orange);color:#fff}.vd-more-head{text-align:center;margin-bottom:16px}.vd-more-eyebrow{display:inline-block;font-size:11px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:var(--orange);background:var(--orange-soft);padding:5px 13px;border-radius:999px;margin-bottom:10px}.vd-more-head h4{font-family:'Inter',sans-serif;font-size:22px;font-weight:800;color:var(--blue)}.vd-more-head p{color:var(--muted);font-size:14px;max-width:520px;margin:6px auto 0;line-height:1.5}.vd-locked{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin:16px 0}.vd-lk{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line);border-radius:12px;padding:12px 14px;font-size:13px;font-weight:700;color:var(--blue);transition:.2s}.vd-lk .ic{font-size:16px}.vd-lk .lock{margin-left:auto;font-size:12px;opacity:.45}.vd-lk:hover{border-color:var(--orange);transform:translateY(-2px);box-shadow:var(--shadow-sm)}.vd-more-cta{display:flex;align-items:center;justify-content:space-between;gap:18px;background:linear-gradient(135deg,var(--blue),#21457a);color:#fff;border-radius:16px;padding:18px 22px;flex-wrap:wrap}.vd-more-cta b{display:block;font-family:'Inter',sans-serif;font-size:15px;margin-bottom:3px}.vd-more-cta span{font-size:13px;color:#c6d3e6}.vd-more-cta .btn{flex:none}/* ===================== VIDYA DASHBOARD - advanced controls ===================== */
.vd-ctrl{display:flex;align-items:center;gap:12px;padding:10px 18px;background:#fff;border-bottom:1px solid var(--line)}.vd-nav{flex:none;width:34px;height:34px;border-radius:50%;border:1.5px solid var(--line);background:#fff;color:var(--blue);font-size:20px;line-height:1;cursor:pointer;display:grid;place-items:center;transition:.2s}.vd-nav:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-1px)}.vd-play{flex:none;width:34px;height:34px;border-radius:50%;border:none;background:var(--orange);color:#fff;font-size:12px;cursor:pointer;display:grid;place-items:center;box-shadow:0 6px 16px rgba(222,110,48,.35)}.vd-prog{flex:1;height:5px;background:#eef2f7;border-radius:5px;overflow:hidden}.vd-prog i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--orange),#f0974f);border-radius:5px}.vd-dot{display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--green);margin-left:4px;vertical-align:middle;box-shadow:0 0 0 0 rgba(16,84,185,.5);animation:pulse2 2s infinite}.vd-body{touch-action:pan-y}/* ===================== VIDYA DASHBOARD (clear tabbed) ===================== */
.vd{max-width:980px;margin:30px auto 0;border:1px solid var(--line);border-radius:18px;overflow:hidden;box-shadow:var(--shadow);background:#fff}.vd-top{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid var(--line);background:#fff}.vd-logo{height:30px;width:auto;display:block}.vd-live{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;color:#164ea3;text-transform:uppercase;letter-spacing:.5px}.vd-live::before{content:"";width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 0 0 rgba(16,84,185,.5);animation:pulse2 2s infinite}.vd-steps{display:flex;flex-wrap:wrap;gap:8px;padding:14px;background:#fafbfd;border-bottom:1px solid var(--line)}.vd-step{display:inline-flex;align-items:center;gap:8px;background:#fff;border:1.5px solid var(--line);border-radius:999px;padding:8px 14px;font:inherit;font-size:13px;font-weight:700;color:var(--blue);cursor:pointer;transition:.2s}.vd-step:hover{border-color:var(--orange);color:var(--orange)}.vd-step b{display:grid;place-items:center;width:20px;height:20px;border-radius:50%;background:#eef2f7;color:var(--blue);font-size:11px}.vd-step.on{background:var(--blue);color:#fff;border-color:var(--blue)}.vd-step.on b{background:var(--orange);color:#fff}.vd-cap{padding:13px 18px;background:#fff;color:var(--muted);font-size:14px;border-bottom:1px solid var(--line);line-height:1.5}.vd-body{padding:18px;background:#f4f6f9}.vd-view{display:none;animation:slideIn .4s ease}.vd-view.on{display:block}.vd .mx-kpis{grid-template-columns:1fr 1fr;gap:10px}.vd .mx-funnelwrap{padding:18px 6px;gap:18px}.vd .lx-row{margin:0 0 10px}/* ===================== SEGMENT CHOOSER (clear) ===================== */
.seg3-tabs{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin:26px 0}.seg3-tab{display:inline-flex;align-items:center;gap:9px;padding:12px 18px;border-radius:14px;border:1.5px solid var(--line);background:#fff;font:inherit;font-weight:700;font-size:14.5px;color:var(--blue);cursor:pointer;transition:.2s}.seg3-tab .e{font-size:18px}.seg3-tab:hover{border-color:var(--orange);color:var(--orange)}.seg3-tab.on{background:var(--blue);color:#fff;border-color:var(--blue)}.seg3-panel{display:grid;grid-template-columns:1.05fr .95fr;gap:0;background:#fff;border:1px solid var(--line);border-radius:24px;box-shadow:var(--shadow-sm);overflow:hidden}.seg3-left{padding:clamp(26px,4vw,40px)}.seg3-left .for{font-family:'Inter',sans-serif;font-size:13px;font-weight:800;letter-spacing:1px;text-transform:uppercase;color:var(--orange);margin-bottom:8px}.seg3-left h3{font-family:'Inter',sans-serif;font-size:clamp(22px,2.6vw,30px);font-weight:800;letter-spacing:-.6px;margin-bottom:12px;line-height:1.15}.seg3-left .desc{color:var(--muted);font-size:16px;margin-bottom:22px;line-height:1.6}.seg3-bl{list-style:none;display:flex;flex-direction:column;gap:14px;margin:0 0 26px}.seg3-bl li{display:flex;gap:12px;align-items:flex-start;font-size:15px;color:#333e4f;line-height:1.5}.seg3-bl .ck{flex:none;width:24px;height:24px;border-radius:7px;background:var(--orange-soft);color:var(--orange);display:grid;place-items:center;font-weight:900;font-size:13px}.seg3-right{background:linear-gradient(160deg,var(--blue),#21457a);color:#fff;padding:clamp(26px,4vw,40px);display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden}.seg3-right::before{content:"";position:absolute;width:240px;height:240px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);top:-90px;right:-50px}.seg3-emoji{font-size:54px;margin-bottom:12px;position:relative}.seg3-stat{font-family:'Inter',sans-serif;font-size:clamp(40px,6vw,58px);font-weight:800;color:#ffd9bf;line-height:1;letter-spacing:-2px;position:relative}.seg3-statl{font-size:14px;color:#c6d3e6;font-weight:600;margin:8px 0 22px;position:relative}.seg3-feat{position:relative;display:flex;flex-direction:column;gap:10px}.seg3-feat div{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:600;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:12px;padding:10px 14px}.seg3-feat .d{width:7px;height:7px;border-radius:50%;background:#7cb0ff;flex:none}/* ===================== WHATSAPP - realistic screen ===================== */
.wachat{max-width:380px;width:100%;border-radius:14px;overflow:hidden;box-shadow:var(--shadow);border:1px solid var(--line);background:#fff}.wa-hd{background:#072a5e;color:#fff;display:flex;align-items:center;gap:10px;padding:11px 13px}.wa-hd .bk{font-size:20px;opacity:.9}.wa-av{width:38px;height:38px;border-radius:50%;background:#fff;object-fit:contain;padding:3px;flex:none}.wa-hd b{font-size:14px;display:block;line-height:1.25}.wa-hd small{font-size:10.5px;opacity:.85}.wa-hd .wa-ic{margin-left:auto;font-size:14px;opacity:.92;letter-spacing:1px}.wa-bd{height:420px;overflow-y:auto;padding:16px 14px;display:flex;flex-direction:column;gap:8px;background:#ece5dd;background-image:radial-gradient(rgba(0,0,0,.03) 1px,transparent 1px);background-size:18px 18px}.wa-bd .cmsg{max-width:82%;padding:8px 11px 7px;border-radius:9px;font-size:13.5px;box-shadow:0 1px 1px rgba(0,0,0,.08);line-height:1.45;animation:cin .35s both}.wa-bd .cmsg--a{align-self:flex-start;background:#fff;color:var(--ink);border:none;border-bottom-left-radius:2px}.wa-bd .cmsg--u{align-self:flex-end;background:#c6daf8;color:#0b1e3b;border-bottom-right-radius:2px}.wa-bd .cmsg--u::after{content:"✓✓";color:#3480f1;font-size:10px;float:right;margin:3px 0 -3px 8px}.wa-bd .cmsg--sys{align-self:center;background:#ffe8d6;color:#7a4d2a;font-size:11px;font-weight:700;padding:4px 12px;border-radius:8px;box-shadow:none}.wa-bd .ctyping{align-self:flex-start;background:#fff;border:none}.wa-input{display:flex;align-items:center;gap:10px;padding:9px 12px;background:#f0f0f0;color:#8a96a3;font-size:13px}.wa-input>span:first-child{flex:1;background:#fff;border-radius:20px;padding:9px 14px}.wa-input .snd{width:36px;height:36px;border-radius:50%;background:#072a5e;color:#fff;display:grid;place-items:center;flex:none}/* ===================== WHATSAPP - realistic screen END ===================== */
/* counsellor intelligence - leaderboard */

/* ===================== INTEGRATIONS - explorer ===================== */
.ig-stats{display:flex;gap:46px;justify-content:center;margin:6px 0 30px;flex-wrap:wrap;text-align:center}.ig-stats .n{font-family:'Inter',sans-serif;font-size:32px;font-weight:800;line-height:1}.ig-stats .l{font-size:12.5px;color:var(--muted);font-weight:600;margin-top:6px}.ig{display:grid;grid-template-columns:290px 1fr;align-items:stretch;border:1px solid var(--line);border-radius:24px;box-shadow:var(--shadow-sm);overflow:hidden;background:#fff}.ig-nav{display:flex;flex-direction:column;background:var(--bg-soft);border-right:1px solid var(--line);padding:12px;gap:2px}.ig-nb{display:flex;align-items:center;gap:11px;padding:13px 14px;border:0;background:none;font:inherit;text-align:left;font-size:13.5px;font-weight:700;color:var(--muted);border-radius:12px;cursor:pointer;transition:.2s;border-left:3px solid transparent}.ig-nb .e{font-size:17px;width:20px;text-align:center;flex:none}.ig-nb:hover{color:var(--blue)}.ig-nb.on{background:#fff;color:var(--orange);box-shadow:var(--shadow-sm)}.ig-panel{padding:26px}.ig-phead{display:flex;align-items:center;gap:12px;margin-bottom:6px}.ig-arw{flex:none;width:34px;height:34px;border-radius:50%;border:1.5px solid var(--line);background:#fff;color:var(--blue);font-size:20px;line-height:1;cursor:pointer;display:grid;place-items:center;transition:.2s}.ig-arw:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-1px)}#igNext{margin-left:auto}.ig-count{font-family:'Inter',sans-serif;font-weight:800;color:var(--orange);font-size:14px}.ig-phead h3{font-family:'Inter',sans-serif;font-size:21px;font-weight:800;letter-spacing:-.4px}.ig-pd{color:var(--muted);font-size:14px;margin-bottom:18px;max-width:560px}.ig-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(178px,1fr));gap:18px}.ig-card{height:150px;border:1px solid var(--line);border-radius:16px;display:grid;place-items:center;padding:22px;transition:.25s;background:#fff;animation:igin .5s both}
@keyframes igin{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}.ig-card:hover{border-color:rgba(222,110,48,.4);box-shadow:var(--shadow-sm);transform:translateY(-3px)}.ig-card img{max-width:92%;max-height:96px;object-fit:contain;filter:none;opacity:1;mix-blend-mode:multiply;transition:transform .3s}.ig-card:hover img{transform:scale(1.07)}
@media(max-width:820px){.ig{grid-template-columns:1fr}.ig-nav{display:none}
}
@media(max-width:560px){.ig-grid{grid-template-columns:repeat(3,1fr);gap:8px}.ig-card{height:80px;padding:8px;border-radius:12px}.ig-card img{max-height:48px;max-width:90%}.ig-panel{padding:16px}
}/* ===================== SEGMENT - PREMIUM SCROLLYTELLING ===================== */
.sx{display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:start;margin-top:10px}.sx-ch{min-height:86vh;display:flex;flex-direction:column;justify-content:center;padding:40px 0;opacity:.26;transform:translateY(26px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}.sx-ch.active{opacity:1;transform:none}.sx-ix{display:flex;align-items:center;gap:14px;font-family:'Inter',sans-serif;font-size:15px;font-weight:800;color:var(--orange);letter-spacing:1px;margin-bottom:16px}.sx-kick{font-size:12px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:var(--muted)}.sx-ch h3{font-family:'Inter',sans-serif;font-size:clamp(28px,3.4vw,42px);font-weight:800;letter-spacing:-1.2px;line-height:1.08;margin-bottom:16px}.sx-ch p{color:var(--muted);font-size:17.5px;line-height:1.7;max-width:480px;margin-bottom:24px}.sx-feats{list-style:none;display:flex;flex-direction:column;border-top:1px solid var(--line);max-width:480px}.sx-feats li{display:flex;gap:16px;align-items:flex-start;padding:16px 0;border-bottom:1px solid var(--line)}.sx-feats .n{font-family:'Inter',sans-serif;font-size:12px;font-weight:800;color:var(--orange);padding-top:3px;min-width:22px}.sx-feats b{display:block;font-size:15px;color:var(--blue);margin-bottom:2px}.sx-feats span{font-size:13.5px;color:var(--muted)}/* sticky stage */
.sx-stage{position:sticky;top:92px;height:84vh;max-height:700px;display:grid;grid-template-columns:auto 1fr;gap:22px}.sx-rail{display:flex;flex-direction:column;justify-content:center;align-items:center;gap:2px}.sx-rdot{appearance:none;border:0;background:none;font:inherit;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:4px;color:#c2ccd8;font-family:'Inter',sans-serif;font-weight:800;font-size:12px;padding:3px}.sx-rdot .ln{width:2px;height:24px;background:var(--line);border-radius:2px;transition:.35s}.sx-rdot.on{color:var(--orange)}.sx-rdot.on .ln{background:var(--orange);height:40px}.sx-right{display:flex;flex-direction:column;gap:16px;min-height:0}.sx-visual{flex:1;position:relative;border-radius:30px;overflow:hidden;background:radial-gradient(130% 130% at 0% 0%,#21457a 0%,#19345d 58%);box-shadow:0 50px 100px -30px rgba(25,52,93,.55);min-height:360px}.sx-visual::before{content:"";position:absolute;width:320px;height:320px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(90px);top:-110px;right:-60px;z-index:0}.sx-visual::after{content:"";position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.045) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.045) 1px,transparent 1px);background-size:42px 42px;opacity:.5;z-index:0}.sx-scene{position:absolute;inset:0;z-index:1;padding:clamp(26px,3.4vw,42px);display:flex;flex-direction:column;justify-content:space-between;color:#fff;opacity:0;transform:scale(1.04) translateY(10px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1);pointer-events:none}.sx-scene.on{opacity:1;transform:none;pointer-events:auto}.sx-top{display:flex;align-items:center;gap:14px}.sx-badge{width:52px;height:52px;border-radius:15px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);display:grid;place-items:center;color:#fff;flex:none}.sx-badge svg,.sx-badge img.eeimg{width:26px;height:26px}.sx-tt .sx-nm{font-family:'Inter',sans-serif;font-weight:800;font-size:18px}.sx-tt .sx-sub{font-size:12px;color:#9bb3d6;font-weight:600}.sx-live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:800;letter-spacing:1.5px;color:#7cb0ff}.sx-live .d{width:7px;height:7px;border-radius:50%;background:#3474d3;animation:pulse2 2s infinite}.sx-metric{font-family:'Inter',sans-serif;font-size:clamp(46px,7vw,76px);font-weight:800;color:#ffd9bf;line-height:1;letter-spacing:-3px}.sx-metricl{font-size:15px;color:#c6d3e6;font-weight:500;margin-top:10px;max-width:320px}.sx-glass{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.14);border-radius:18px;-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);overflow:hidden}.sx-gr{display:flex;justify-content:space-between;align-items:center;padding:13px 18px;font-size:14px;border-bottom:1px solid rgba(255,255,255,.08)}.sx-gr:last-child{border-bottom:0}.sx-gr span{color:#9bb3d6}.sx-gr b{color:#fff;font-weight:700}.sx-cta{display:flex;align-items:center;justify-content:space-between;gap:14px;background:var(--orange);color:#fff;border-radius:16px;padding:16px 22px;font-family:'Inter',sans-serif;font-weight:700;font-size:15px;text-decoration:none;box-shadow:0 14px 30px rgba(222,110,48,.32);transition:transform .25s,box-shadow .25s}.sx-cta:hover{transform:translateY(-3px);box-shadow:0 20px 40px rgba(222,110,48,.42)}.sx-cta svg,.sx-cta img.eeimg{width:20px;height:20px;flex:none}
@media(max-width:980px){.sx{grid-template-columns:1fr;gap:8px}.sx-stage{position:sticky;top:64px;height:auto;order:-1;grid-template-columns:1fr;gap:14px}.sx-rail{display:none}.sx-visual{min-height:330px}.sx-ch{min-height:auto;opacity:1;transform:none;padding:24px 0}.sx-ch p,.sx-feats{max-width:none}
}

/* ===================== RESPONSIVE (all devices) ===================== */
/* Large tablet / small laptop */
@media(max-width:1024px){.vidya-wrap,.arch-wrap,.sg-wrap{grid-template-columns:1fr;gap:20px}.vsticky,.arch-sticky,.sg-sticky{position:sticky;top:60px;height:auto;max-height:none;order:-1}.vstory,.arch-story,.sg-story{min-height:auto;opacity:1;transform:none;padding:16px 0}.crm{height:440px}.arch-screen{height:auto;min-height:380px}.sg-card{height:auto}/* kill 3D morph on touch/narrow so nothing clips or overflows */
  .crm,.arch-screen,.sg-card{transform:none!important}.cmp2-when{grid-template-columns:1fr}.split{gap:40px}
}
/* Tablet portrait */
@media(max-width:920px){.hero{padding:48px 0 30px}.hero__in,.split,.aihub__in{grid-template-columns:1fr;gap:32px}.caps{grid-template-columns:1fr}.cap--lg,.cap--md{grid-column:auto}.stats,.tcards,.arch-metrics{grid-template-columns:1fr 1fr}.kpis{grid-template-columns:1fr 1fr}.aihub{padding:30px}.sec{padding:56px 0}.sg2{grid-template-columns:1fr;gap:22px}.sg2-view{position:static}.seg3-panel{grid-template-columns:1fr}.seg3-right{order:-1}.roi__in,.demo-grid,.lm{grid-template-columns:1fr}.roi{padding:30px}.demo-left,.demo-right{padding:34px 26px}.lm{padding:30px}.iphone-stage{min-height:580px}.rf-stage{height:340px}.cs-grid,.sec-grid{grid-template-columns:1fr 1fr}.crmx-side{width:60px}.crm .crmx-side{width:56px}.crmx-mi{font-size:0;justify-content:center;padding:12px 0;gap:0}.crmx-mi .e{font-size:17px}.crmx-mi .b{display:none}.mx-kpis,.crm .mx-kpis{grid-template-columns:1fr 1fr}
}
/* Large phone */
@media(max-width:640px){.container{padding:0 18px}.stats,.tcards,.arch-metrics,.kpis,.cs-grid,.sec-grid,.mx-kpis{grid-template-columns:1fr}/* compact outcomes stats on phones: 2x2,smaller */
  .stats--compact{grid-template-columns:1fr 1fr;gap:10px;margin-top:26px!important}.stats--compact .stat{padding:16px 10px;border-radius:14px}.stats--compact .stat__n{font-size:30px;letter-spacing:-1px}.stats--compact .stat__l{font-size:11.5px;margin-top:5px}.crmx-search{display:none}.crmx-top{gap:10px}.crmx-ico{font-size:14px;gap:11px}.vd-steps{gap:6px;padding:12px 10px}.vd-step{padding:7px 11px;font-size:12px;gap:6px}.vd-step b{width:18px;height:18px;font-size:10px}.vd-cap{font-size:13px;padding:11px 14px}.vd-body{padding:14px}.vd-locked{grid-template-columns:1fr 1fr}.vd-more-cta{flex-direction:column;align-items:stretch;text-align:center}.vd-more-cta .btn{justify-content:center}.vd-top{padding:12px 14px}.vd-logo{height:26px}.vd .mx-funnelwrap{flex-direction:column;align-items:stretch}.vd .mx-legend{display:grid;grid-template-columns:1fr 1fr;gap:6px}.crmx-side{display:none}.crmx-main{overflow-x:auto}.lx-meta{display:none}/* compact vertical timeline on phones */
  .flow{flex-direction:column;align-items:stretch;flex-wrap:nowrap;max-width:430px;margin:28px auto 0;gap:0}.fnode{flex:0 0 auto;width:100%;display:flex;align-items:center;gap:14px;text-align:left;padding:14px 16px}.fnode__ic{font-size:22px;flex:none;width:26px;text-align:center}.fnode b{margin-top:0;font-size:14.5px}.fnode small{font-size:12px}.fconn{flex:0 0 auto;width:3px;height:20px;min-width:0;margin:0 0 0 30px;border-radius:3px}.fconn i{width:100%;height:0;transition:height .5s linear}.fconn.on i{height:100%}.fdart{display:none}.h2{font-size:clamp(26px,7vw,34px)}.hero h1{font-size:clamp(34px,9vw,46px)}.lead{font-size:16px}.btn,.btn-lg{padding:14px 22px;font-size:15px}.hero__cta .btn,.btn-lg{flex:1 1 100%;justify-content:center}.demo-form select,.demo-form input{font-size:16px}/* avoids iOS zoom */
  .cta__form input{font-size:16px}.roi-split{grid-template-columns:1fr}.dbadges{justify-content:center;text-align:center}.demo-left,.demo-right{padding:30px 22px}
}
/* Small phone */
@media(max-width:400px){.iphone{width:262px;height:540px;border-radius:46px}.ip-screen{border-radius:37px}.fc1,.fc3{left:-6px}.fc2{right:-6px}.fcard{padding:9px 11px}.fcard .fi{width:30px;height:30px;font-size:15px}.fcard b{font-size:11px}.fcard small{font-size:9.5px}.iphone-stage{min-height:560px}.scta__r .btn{padding:12px 16px;font-size:14px}
}
</style>
<style id="ee-compact-rhythm">/* Uniform section rhythm: 18px top / 18px bottom on EVERY section - removes the
   large white space between sections. The two full-bleed interactive sections
   (Agentic pinned-scroll + the story iframe) keep their own spacing so their
   scroll mechanics aren't disturbed. */
.ee-home > section:not(#ee-vidya-suite):not(#ee-night){
  padding-top:30px!important;
  padding-bottom:30px!important;
}
.sec,.hero,#xhero,#platform,#stories,#segments,.vx-head,.vx-proof,.rf-wrap,.rf-band-in,.sec-auto,.ea-wrap,.ee-wrap,.wa-sec,.intro,.outro{
  padding-top:30px!important;
  padding-bottom:30px!important;
}.ts-grid{display:flex!important;flex-wrap:wrap!important;justify-content:center!important;overflow:visible!important;scroll-snap-type:none!important;margin-inline:auto!important;max-width:1180px;gap:clamp(16px,2.2vw,24px)!important}#stories .ts-card{flex:1 1 320px!important;max-width:382px!important;scroll-snap-align:none!important}#stories .ts-nav,#stories .ts-hint{display:none!important}
</style>

<!-- The theme's header.php already opens <main id="main-content">, so this
     homepage uses a plain wrapper <div> (not a second <main>) to avoid two
     nested <main> landmarks - invalid HTML and bad for SEO/screen readers. -->
<div class="ee-home">
<!-- ===================== HERO (WebGL) ===================== -->
<!-- ===================== HERO - brand edition (scoped #xhero) ===================== -->
<style>/* EXTRAAEDGE HERO - brand edition · scoped under #xhero (no global bleed) */
#xhero{
  --navy:#19345d; --orange:#DE6E30; --bg:#FFFFFF;
  --navy-90:rgba(25,52,93,.9); --navy-70:rgba(25,52,93,.7); --navy-55:rgba(25,52,93,.55);
  --navy-15:rgba(25,52,93,.15); --navy-10:rgba(25,52,93,.10); --navy-06:rgba(25,52,93,.06);
  --navy-03:rgba(25,52,93,.035); --org-12:rgba(222,110,48,.12); --org-25:rgba(222,110,48,.25);
  --r-lg:22px; --r-md:14px; --font:'Inter',sans-serif;
  position:relative;min-height:min(100vh,860px);display:flex;align-items:center;overflow:hidden;isolation:isolate;padding:96px 0 72px;
  background:var(--bg);color:var(--navy);font-family:var(--font);-webkit-font-smoothing:antialiased}#xhero *{margin:0;padding:0;box-sizing:border-box}#xhero a{text-decoration:none;color:inherit}#xhero .container{max-width:1500px;margin:0 auto;padding:0 32px;min-width:0;width:100%}@media(max-width:380px){#xhero .container{padding:0 16px}}#xhero #glsl{position:absolute;inset:0;width:100%;height:100%;z-index:-3;opacity:.6}#xhero .hero__veil{position:absolute;inset:0;z-index:-2;background:radial-gradient(110% 80% at 80% 0%,transparent 25%,var(--bg) 72%),linear-gradient(to top,var(--bg) 0%,transparent 30%)}#xhero .hero__grid{position:absolute;inset:0;z-index:-1;pointer-events:none;background-image:linear-gradient(var(--navy-06) 1px,transparent 1px),linear-gradient(90deg,var(--navy-06) 1px,transparent 1px);background-size:72px 72px;-webkit-mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%);mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%)}#xhero .hero__in{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1fr) minmax(480px,580px);gap:64px;align-items:center}#xhero .reveal{opacity:0;transform:translateY(22px);animation:xh-rise .9s cubic-bezier(.2,.7,.2,1) forwards}
@keyframes xh-rise{to{opacity:1;transform:none}}#xhero .d1{animation-delay:.05s}#xhero .d2{animation-delay:.16s}#xhero .d3{animation-delay:.27s}#xhero .d4{animation-delay:.38s}#xhero .d5{animation-delay:.5s}#xhero .d6{animation-delay:.64s}#xhero .pill{display:inline-flex;align-items:center;gap:9px;padding:7px 16px 7px 8px;border:1px solid var(--navy-15);border-radius:99px;background:linear-gradient(110deg,var(--org-12),rgba(222,110,48,.02) 60%);font-size:13px;font-weight:500;letter-spacing:.01em;color:var(--navy-70)}#xhero .pill b{color:var(--orange);font-weight:700}#xhero .pill__txt{flex:1;min-width:0}#xhero .pill__ico{width:20px;height:20px;object-fit:contain;border-radius:6px;background:#fff;padding:1.5px;box-shadow:0 0 0 1px var(--navy-10)}#xhero .pill__new{font-size:10px;font-weight:800;letter-spacing:.12em;color:#fff;background:var(--orange);padding:3px 8px;border-radius:99px}#xhero h1{font-family:var(--font);font-weight:800;font-size:clamp(40px,2.8vw,66px);line-height:1.05;letter-spacing:-.035em;margin:26px 0 0;color:var(--navy)}#xhero h1 .accent{color:var(--orange);position:relative;white-space:normal;overflow-wrap:break-word}#xhero h1 .accent svg,#xhero h1 .accent img.eeimg{position:absolute;left:0;right:0;bottom:-.14em;width:100%;height:.22em;overflow:visible}#xhero h1 .accent svg path,#xhero h1 .accent img.eeimg path{fill:none;stroke:var(--orange);stroke-width:7;stroke-linecap:round;opacity:.45;stroke-dasharray:600;stroke-dashoffset:600;animation:xh-draw 1.1s .9s ease forwards}
@keyframes xh-draw{to{stroke-dashoffset:0}}#xhero .hero__type-row{display:block;min-height:1.1em;white-space:normal;overflow-wrap:break-word;color:var(--navy)}#xhero .caret{display:none;width:3px;height:.84em;margin-left:6px;vertical-align:-.08em;background:var(--orange);animation:xh-blink 1s steps(1) infinite;border-radius:2px}
@keyframes xh-blink{50%{opacity:0}}#xhero .sub{margin-top:22px;max-width:540px;font-size:17.5px;line-height:1.65;color:var(--navy-70)}#xhero .sub b{color:var(--navy);font-weight:700}#xhero .chips{display:flex;flex-wrap:wrap;gap:9px;margin-top:22px}#xhero .chip{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-15);border-radius:9px;padding:7px 11px;background:#fff}#xhero .chip i{font-style:normal;color:var(--orange)}#xhero .hero__cta{display:flex;align-items:center;gap:16px;margin-top:34px;flex-wrap:wrap}#xhero .btn{position:relative;display:inline-flex;align-items:center;gap:10px;font-weight:700;font-size:15.5px;letter-spacing:-.01em;border-radius:13px;padding:17px 30px;cursor:pointer;transition:transform .25s cubic-bezier(.2,.7,.2,1),box-shadow .25s}#xhero .btn-primary{color:#fff;background:linear-gradient(180deg,#E87E43,var(--orange));overflow:hidden;box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 14px 34px -10px rgba(222,110,48,.55)}#xhero .btn-primary:hover{box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 20px 44px -10px rgba(222,110,48,.7);transform:translateY(-2px)}#xhero .btn-primary .shine{position:absolute;top:0;left:-80%;width:55%;height:100%;transform:skewX(-22deg);background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);animation:xh-shine 4.2s ease-in-out infinite}
@keyframes xh-shine{0%,55%{left:-80%}75%,100%{left:140%}}#xhero .btn-primary .arr{transition:transform .25s}#xhero .btn-primary:hover .arr{transform:translateX(4px)}#xhero .btn-ghost{color:var(--navy);border:1.5px solid var(--navy-15);background:#fff}#xhero .btn-ghost:hover{border-color:var(--navy);background:var(--navy-03)}#xhero .btn-ghost .play{display:grid;place-items:center;width:22px;height:22px;border-radius:50%;background:var(--navy-10);color:var(--navy);font-size:9px}#xhero .cta-note{font-size:12.5px;color:var(--navy-55)}#xhero .stats{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:38px;width:100%;max-width:480px}#xhero .stat{position:relative;background:#fff;border:1px solid var(--navy-10);border-radius:14px;padding:16px 18px;box-shadow:0 8px 24px rgba(25,52,93,.06);transition:transform .2s,box-shadow .25s,border-color .25s}#xhero .stat:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(25,52,93,.12);border-color:rgba(222,110,48,.45)}#xhero .stat__n{font-weight:800;font-size:30px;letter-spacing:-.03em;color:var(--navy);line-height:1}#xhero .stat__n em{font-style:normal;color:var(--orange)}#xhero .stat__l{margin-top:6px;font-size:12.5px;font-weight:600;color:var(--navy-55)}#xhero .console-wrap{position:relative;perspective:1400px}#xhero .console{position:relative;border-radius:var(--r-lg);border:1px solid var(--navy-15);background:#fff;box-shadow:0 40px 90px -34px rgba(25,52,93,.35),0 2px 6px rgba(25,52,93,.06);padding:22px 22px 18px;transform-style:preserve-3d;transition:transform .4s ease}#xhero .console::before{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1.5px;pointer-events:none;background:linear-gradient(135deg,var(--orange),transparent 32%,transparent 68%,var(--navy));opacity:.5;-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude}#xhero .console__top{display:flex;align-items:center;justify-content:space-between;gap:12px;padding-bottom:16px;border-bottom:1px dashed var(--navy-15)}#xhero .brand{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:700;color:var(--navy);white-space:nowrap}#xhero .orb{position:relative;display:grid;place-items:center;width:32px;height:32px;border-radius:10px;padding:2px;color:#fff;font-weight:800;font-size:14px;background:conic-gradient(from 200deg,var(--orange),var(--navy),var(--orange));box-shadow:0 4px 12px rgba(222,110,48,.3)}#xhero .orb img{width:100%;height:100%;object-fit:contain;border-radius:8px;background:#fff;padding:2px}#xhero .brand small{display:inline;font-weight:600;font-size:10px;color:var(--navy-55);letter-spacing:.1em;margin-left:7px;vertical-align:1px}#xhero .brand small::before{content:"·";margin-right:7px;color:var(--navy-55)}#xhero .live-dot{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.12em;color:var(--orange);border:1px solid var(--org-25);background:var(--org-12);border-radius:99px;padding:5px 11px}#xhero .ping{position:relative;width:7px;height:7px;border-radius:50%;background:var(--orange);display:inline-block}#xhero .ping::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:1px solid var(--orange);animation:xh-ping 1.6s ease-out infinite}
@keyframes xh-ping{0%{transform:scale(.4);opacity:.9}100%{transform:scale(1.5);opacity:0}}#xhero .feed{display:flex;flex-direction:column;gap:10px;margin-top:16px;min-height:268px}#xhero .step{border:1px solid var(--navy-10);border-radius:var(--r-md);padding:11px 14px;background:var(--navy-03);opacity:0;transform:translateY(12px);transition:opacity .5s,transform .5s cubic-bezier(.2,.7,.2,1)}#xhero .step.on{opacity:1;transform:none}#xhero .step__tag{display:flex;align-items:center;gap:8px;font-size:9.5px;font-weight:800;letter-spacing:.18em;color:var(--navy-55);margin-bottom:6px}#xhero .step__txt{font-size:13.5px;line-height:1.55;color:var(--navy-70)}#xhero .step__txt q{color:var(--navy);font-weight:500;quotes:"\201C" "\201D"}#xhero .step--in{border-left:3px solid var(--navy)}#xhero .step--ai{border-left:3px solid var(--orange);background:linear-gradient(110deg,var(--org-12),var(--navy-03) 60%)}#xhero .step--ai .step__tag{color:var(--orange)}#xhero .step--ok{border-left:3px solid var(--navy)}#xhero .step--ok .step__tag{color:var(--navy)}#xhero .src{font-size:11px;color:var(--navy-55);margin-top:3px}#xhero .wv{display:inline-flex;align-items:flex-end;gap:2px;height:10px;margin-left:4px}#xhero .wv i{width:2.5px;background:var(--orange);border-radius:2px;animation:xh-wv 1s ease-in-out infinite}#xhero .wv i:nth-child(1){animation-delay:0s}#xhero .wv i:nth-child(2){animation-delay:.12s}#xhero .wv i:nth-child(3){animation-delay:.24s}#xhero .wv i:nth-child(4){animation-delay:.36s}#xhero .wv i:nth-child(5){animation-delay:.48s}
@keyframes xh-wv{0%,100%{height:3px}50%{height:10px}}#xhero .think-line{display:flex;gap:8px;align-items:baseline}#xhero .think-line .tick{color:var(--orange);font-size:11px;font-weight:800;opacity:0;transition:opacity .3s}#xhero .think-line.done .tick{opacity:1}#xhero .badge-ok{display:inline-flex;align-items:center;gap:6px;color:var(--navy);font-weight:700}#xhero .badge-ok::before{content:"\2713";display:grid;place-items:center;width:16px;height:16px;border-radius:50%;background:var(--orange);color:#fff;font-size:10px}#xhero .acts{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}#xhero .act{font-size:11px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-10);border-radius:7px;padding:4px 8px;background:#fff;opacity:0;transform:scale(.92);transition:.35s}#xhero .act.on{opacity:1;transform:none}#xhero .console__mods{display:flex;flex-wrap:wrap;gap:8px;margin-top:16px;padding-top:14px;border-top:1px dashed var(--navy-15)}#xhero .mods__track{display:contents}#xhero .console__mods span{flex:none;font-size:11.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-10);border-radius:99px;padding:6px 12px;white-space:nowrap;background:#fff}#xhero .float{position:absolute;border-radius:16px;border:1px solid var(--navy-15);background:#fff;box-shadow:0 24px 50px -18px rgba(25,52,93,.35);padding:14px 16px;animation:xh-bob 6s ease-in-out infinite}
@keyframes xh-bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}#xhero .float--score{top:-72px;right:-22px;display:flex;align-items:center;gap:12px}#xhero .ring{position:relative;width:54px;height:54px}#xhero .ring svg,#xhero .ring img.eeimg{transform:rotate(-90deg)}#xhero .ring circle{fill:none;stroke-width:5}#xhero .ring .bg{stroke:var(--navy-10)}#xhero .ring .fg{stroke:url(#xhRingGrad);stroke-linecap:round;stroke-dasharray:138.2;stroke-dashoffset:138.2;transition:stroke-dashoffset 1.2s cubic-bezier(.2,.7,.2,1)}#xhero .ring b{position:absolute;inset:0;display:grid;place-items:center;font-size:14px;font-weight:800;color:var(--navy)}#xhero .float--score .lbl{font-size:10px;font-weight:800;letter-spacing:.14em;color:var(--navy-55)}#xhero .float--score .who{font-size:13px;font-weight:700;margin-top:2px;color:var(--navy)}#xhero .float--conv{bottom:-90px;left:-26px;animation-delay:1.4s}#xhero .float--conv .num{font-weight:800;font-size:22px;color:var(--orange);letter-spacing:-.02em}#xhero .float--conv .lbl{font-size:11px;font-weight:500;color:var(--navy-55);margin-top:2px}#xhero .spark{display:flex;align-items:flex-end;gap:3px;height:22px;margin-top:8px}#xhero .spark i{width:5px;border-radius:2px;background:linear-gradient(to top,var(--org-25),var(--orange));animation:xh-sp 2.6s ease-in-out infinite}
@keyframes xh-sp{0%,100%{transform:scaleY(.6)}50%{transform:scaleY(1)}}
@media(max-width:1024px){#xhero .hero__in{grid-template-columns:minmax(0,1fr);gap:48px}#xhero .console-wrap{max-width:560px;margin:0 auto}#xhero .hero-film{max-width:640px;margin:0 auto}#xhero .stats{grid-template-columns:repeat(2,1fr);gap:12px;max-width:100%}#xhero .stat:nth-child(odd)+.stat::before{display:none}
}
@media(max-width:560px){#xhero{padding:72px 0 56px}#xhero .pill{flex-wrap:wrap;row-gap:6px;border-radius:14px;padding:9px 14px 9px 10px;font-size:12px;line-height:1.55;max-width:100%}#xhero .pill__ico{width:18px;height:18px}#xhero .pill__new{font-size:9px;padding:3px 7px}#xhero h1{font-size:clamp(34px,9.5vw,44px)}#xhero .hero__type-row{white-space:normal}#xhero .float--score{right:-6px;top:-26px}#xhero .float--conv{left:-6px;bottom:-24px}#xhero .stats{grid-template-columns:repeat(2,1fr);width:100%}#xhero .brand{font-size:12.5px}#xhero .brand small{font-size:8.5px;letter-spacing:.06em;margin-left:5px}
}
@media(prefers-reduced-motion:reduce){#xhero *{animation:none!important;transition:none!important}#xhero .reveal,#xhero .step,#xhero .act{opacity:1;transform:none}#xhero h1 .accent svg path,#xhero h1 .accent img.eeimg path{stroke-dashoffset:0}
}
</style>

<!-- ===================== EE · QUICK TABLE OF CONTENTS (scoped #ee-toc) ===================== -->
<style>/* keep anchored jumps clear of any sticky chrome */
  #xhero,#trusted-institutions,#ee-platform,#ee-why,#ee-rfa,#ee-products,#ee-vidya-suite,#ee-teams,#ee-solutions,#ee-ind,#stories,#ee-cro,#ee-night,#integrations,#security,#ee-golive,#ee-resources,#faq,#admission-form{scroll-margin-top:86px}#ee-toc{font-family:'Inter',system-ui,-apple-system,sans-serif}#ee-toc button,#ee-toc a{font-family:inherit}/* launcher */
  #ee-toc .eetoc-fab{position:fixed;left:16px;top:50%;transform:translateY(-50%);z-index:99990;
    display:flex;align-items:center;justify-content:center;width:50px;height:50px;padding:0;border:2.5px solid #fff;cursor:pointer;
    background:#19335D;color:#fff;border-radius:50%;
    box-shadow:0 6px 14px rgba(15,32,64,.28);
    transition:transform .2s ease,box-shadow .2s ease;-webkit-tap-highlight-color:transparent}#ee-toc .eetoc-fab:hover,#ee-toc .eetoc-fab:focus-visible{transform:translateY(-50%) translateY(-2px) scale(1.05);box-shadow:0 10px 22px rgba(15,32,64,.34)}#ee-toc .eetoc-fab svg,#ee-toc .eetoc-fab img.eeimg{width:24px;height:24px;flex:none;filter:drop-shadow(0 1px 1px rgba(0,0,0,.15))}#ee-toc .eetoc-fab-tx{display:none}/* backdrop */
  #ee-toc .eetoc-backdrop{position:fixed;inset:0;z-index:99991;background:rgba(9,21,38,.42);
    opacity:0;visibility:hidden;transition:opacity .25s ease,visibility .25s ease;backdrop-filter:blur(2px)}#ee-toc.open .eetoc-backdrop{opacity:1;visibility:visible}/* panel */
  #ee-toc .eetoc-panel{position:fixed;left:16px;top:50%;transform:translateY(-50%) translateX(-14px) scale(.98);
    z-index:99992;width:296px;max-width:calc(100vw - 32px);max-height:80vh;display:flex;flex-direction:column;
    background:#fff;border-radius:18px;border:1px solid #EAEDF3;overflow:hidden;
    box-shadow:0 40px 90px -30px rgba(15,29,50,.5),0 0 0 1px rgba(25,52,93,.04);
    opacity:0;visibility:hidden;pointer-events:none;transition:opacity .24s ease,transform .24s ease,visibility .24s ease}#ee-toc.open .eetoc-panel{opacity:1;visibility:visible;pointer-events:auto;transform:translateY(-50%) translateX(0) scale(1)}#ee-toc .eetoc-head{display:flex;align-items:center;justify-content:space-between;padding:15px 16px 12px;border-bottom:1px solid #F0F2F7}#ee-toc .eetoc-head b{font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-700,#B5551D)}#ee-toc .eetoc-x{width:38px;height:38px;border-radius:50%;border:0;cursor:pointer;background:#F4F6FA;color:#5a6b85;
    font-size:13px;line-height:1;display:flex;align-items:center;justify-content:center;transition:background .2s,color .2s}#ee-toc .eetoc-x:hover{background:#FDEDE2;color:var(--orange-700,#B5551D)}#ee-toc .eetoc-list{list-style:none;margin:0;padding:8px 8px 4px;overflow-y:auto;overscroll-behavior:contain;-webkit-overflow-scrolling:touch}#ee-toc .eetoc-list::-webkit-scrollbar{width:7px}#ee-toc .eetoc-list::-webkit-scrollbar-thumb{background:#DDE3EC;border-radius:8px}#ee-toc .eetoc-list a{display:flex;align-items:center;gap:11px;padding:9px 11px;border-radius:11px;text-decoration:none;
    color:#22324a;transition:background .16s ease,color .16s ease}#ee-toc .eetoc-list a:hover{background:#F5F7FB}#ee-toc .eetoc-list a i{flex:none;width:22px;font-size:10px;font-weight:700;font-style:normal;color:#aab4c4;
    font-variant-numeric:tabular-nums;letter-spacing:.02em;transition:color .16s ease}#ee-toc .eetoc-list a span{font-size:13px;font-weight:600;line-height:1.3}#ee-toc .eetoc-list a.active{background:linear-gradient(135deg,rgba(222,110,48,.12),rgba(222,110,48,.05));color:var(--orange-700,#B5551D)}#ee-toc .eetoc-list a.active i{color:var(--orange-700,#B5551D)}#ee-toc .eetoc-cta{margin:8px 12px 14px;display:flex;align-items:center;justify-content:center;gap:8px;
    background:linear-gradient(90deg,#E8843F,#DE6E30);color:#fff;text-decoration:none;font-size:13.5px;font-weight:800;
    padding:12px 16px;border-radius:12px;box-shadow:0 12px 26px -10px rgba(222,110,48,.6);transition:transform .15s ease,box-shadow .15s ease}#ee-toc .eetoc-cta:hover{transform:translateY(-1px);box-shadow:0 16px 32px -10px rgba(222,110,48,.7)}#ee-toc .eetoc-cta svg,#ee-toc .eetoc-cta img.eeimg{width:15px;height:15px}

  @media(max-width:600px){#ee-toc .eetoc-fab{top:auto;bottom:16px;transform:none}#ee-toc .eetoc-fab:hover,#ee-toc .eetoc-fab:focus-visible{transform:scale(1.05)}#ee-toc .eetoc-panel{right:12px;left:12px;bottom:14px;top:auto;width:auto;max-width:none;
      transform:translateY(14px) scale(.99);max-height:74vh}#ee-toc.open .eetoc-panel{transform:translateY(0) scale(1)}
  }
  @media(prefers-reduced-motion:reduce){#ee-toc .eetoc-fab,#ee-toc .eetoc-panel,#ee-toc .eetoc-backdrop{transition:none}
  }
</style>
<div id="ee-toc">
  <button type="button" class="eetoc-fab" id="eetocFab" aria-label="Open table of contents" aria-expanded="false" aria-controls="eetocPanel">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M8 6h13M8 12h13M8 18h13"/><circle cx="3.5" cy="6" r="1.3" fill="currentColor" stroke="none"/><circle cx="3.5" cy="12" r="1.3" fill="currentColor" stroke="none"/><circle cx="3.5" cy="18" r="1.3" fill="currentColor" stroke="none"/></svg>
    <span class="eetoc-fab-tx">Contents</span>
  </button>
  <div class="eetoc-backdrop" id="eetocBackdrop" aria-hidden="true"></div>
  <nav class="eetoc-panel" id="eetocPanel" aria-label="Table of contents">
    <div class="eetoc-head"><b>Jump to section</b><button type="button" class="eetoc-x" id="eetocClose" aria-label="Close table of contents">&#10005;</button></div>
    <ul class="eetoc-list">
      <li><a href="#xhero" data-t="xhero"><i>01</i><span>Top</span></a></li>
      <li><a href="#trusted-institutions" data-t="trusted-institutions"><i>02</i><span>Broad Client Base</span></a></li>
      <li><a href="#ee-platform" data-t="ee-platform"><i>03</i><span>AI Product-Led Experience</span></a></li>
      <li><a href="#ee-night" data-t="ee-night"><i>04</i><span>The Admission Operating System</span></a></li>
      <li><a href="#ee-products" data-t="ee-products"><i>05</i><span>The admissions platform</span></a></li>
      <li><a href="#ee-vidya-suite" data-t="ee-vidya-suite"><i>06</i><span>Agentic AI Suite</span></a></li>
      <li><a href="#ee-teams" data-t="ee-teams"><i>07</i><span>One platform, every team</span></a></li>
      <li><a href="#ee-solutions" data-t="ee-solutions"><i>08</i><span>Solutions</span></a></li>
      <li><a href="#ee-ind" data-t="ee-ind"><i>09</i><span>Industries</span></a></li>
      <li><a href="#stories" data-t="stories"><i>10</i><span>CRM Impact Stories</span></a></li>
      <li><a href="#ee-cro" data-t="ee-cro"><i>11</i><span>Why teams switch to us</span></a></li>
      <li><a href="#integrations" data-t="integrations"><i>12</i><span>Extensions &amp; Integrations</span></a></li>
      <li><a href="#security" data-t="security"><i>13</i><span>Enterprise-grade trust</span></a></li>
      <li><a href="#ee-golive" data-t="ee-golive"><i>14</i><span>Fast implementation</span></a></li>
      <li><a href="#ee-resources" data-t="ee-resources"><i>15</i><span>Resources</span></a></li>
      <li><a href="#faq" data-t="faq"><i>16</i><span>Frequently Asked</span></a></li>
    </ul>
  </nav>
</div>
<script>
(function(){
  function init(){
  var root=document.getElementById('ee-toc'); if(!root) return;
  var fab=document.getElementById('eetocFab'),
      panel=document.getElementById('eetocPanel'),
      closeBtn=document.getElementById('eetocClose'),
      backdrop=document.getElementById('eetocBackdrop'),
      links=[].slice.call(root.querySelectorAll('.eetoc-list a'));
  function open(){ root.classList.add('open'); fab.setAttribute('aria-expanded','true'); }
  function close(){ root.classList.remove('open'); fab.setAttribute('aria-expanded','false'); }
  function toggle(){ root.classList.contains('open')?close():open(); }
  fab.addEventListener('click',toggle);
  closeBtn.addEventListener('click',close);
  backdrop.addEventListener('click',close);
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&root.classList.contains('open')) close(); });
  links.forEach(function(a){ a.addEventListener('click',function(){ close(); }); });
  /* scroll-spy: highlight the section currently in view */
  var byId={}; links.forEach(function(a){ byId[a.getAttribute('data-t')]=a; });
  var targets=links.map(function(a){ return document.getElementById(a.getAttribute('data-t')); }).filter(Boolean);
  function setActive(a){ links.forEach(function(l){ l.classList.toggle('active',l===a); });
    if(a && root.classList.contains('open')){ var p=a.parentNode; if(p&&p.scrollIntoView){ /* keep active visible */ var lp=a.offsetTop, lb=panel.querySelector('.eetoc-list'); if(lb){ if(lp<lb.scrollTop||lp>lb.scrollTop+lb.clientHeight){ lb.scrollTop=lp-60; } } } }
  }
  /* pick the last section whose top has crossed ~35% of the viewport */
  var tick=false;
  function onScroll(){
    if(tick) return; tick=true;
    requestAnimationFrame(function(){
      tick=false;
      var line=(window.innerHeight||document.documentElement.clientHeight)*0.35, curId=targets[0]&&targets[0].id;
      for(var i=0;i<targets.length;i++){ if(targets[i].getBoundingClientRect().top<=line) curId=targets[i].id; else break; }
      if(curId&&byId[curId]) setActive(byId[curId]);
    });
  }
  window.addEventListener('scroll',onScroll,{passive:true});
  window.addEventListener('resize',onScroll,{passive:true});
  onScroll();
  }
  if(document.readyState==='loading') document.addEventListener('DOMContentLoaded',init); else init();
})();
</script>
<!-- ===================== /EE · QUICK TABLE OF CONTENTS ===================== -->

<section id="xhero" aria-label="ExtraaEdge AI-Powered Admission CRM">
  <canvas id="glsl" aria-hidden="true"></canvas>
  <div class="hero__veil" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="container hero__in">
    <div>
      <style>#xhero .hero__rot{font-size:clamp(25px,3.4vw,46px)!important;line-height:1.12;letter-spacing:-.03em;min-height:clamp(118px,16vh,200px);min-height:max(clamp(118px,16vh,200px),4.6em);transition:opacity .4s cubic-bezier(.2,.7,.2,1),transform .4s cubic-bezier(.2,.7,.2,1);will-change:opacity,transform}#xhero .hero__rot.is-out{opacity:0!important;transform:translateY(14px)!important}#xhero .hero-caret{display:none;width:3px;height:.92em;margin-left:4px;border-radius:2px;background:var(--orange);vertical-align:-1px;animation:heroCaretBlink 1s steps(1) infinite}
        /* reserve space for the tallest rotating headline per width - text swaps must never push the layout (CLS) */
        @media(max-width:390px){#xhero .hero__rot{min-height:4.7em!important}}
        @keyframes heroCaretBlink{50%{opacity:0}}
        @media(prefers-reduced-motion:reduce){#xhero .hero-caret{display:none}}#xhero .hero__rot .accent{background:linear-gradient(100deg,var(--orange),#22467c);-webkit-background-clip:text;background-clip:text;color:transparent}
        @media(prefers-reduced-motion:reduce){#xhero .hero__rot{transition:none}}
      </style>
      <h1 class="reveal d2 hero__rot" id="heroRot" aria-live="polite">Convert More Student Enquiries Into Admissions With <span class="accent">AI-Powered Education CRM</span></h1>
      <p class="sub reveal d3">The AI-powered Admission CRM where co-pilots and agents <b>qualify leads, brief counsellors and follow up 24/7</b> - so your team spends time enrolling students, not chasing them.</p>
      <div class="chips reveal d4">
        <span class="chip"><i>&#9889;</i> Go live in 7 days</span>
        <span class="chip"><i>&#128279;</i> Works with your existing forms &amp; portals</span>
        <span class="chip"><i>&#128737;</i> ISO 27001 &middot; GDPR-ready</span>
      </div>
      <div class="hero__cta reveal d5">
        <a href="#admission-form" class="btn btn-primary" id="magnet">Book a Demo <span class="arr">&rarr;</span><span class="shine"></span></a>
        <a href="#stories" class="btn btn-watch"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="width:15px;height:15px;flex:none"><path d="M8 5v14l11-7z"/></svg> Watch 2-Min Product Tour</a>
        <span class="cta-note">No credit card &middot; Personalised to your institution &middot; <a href="#ee-cro" class="cta-roi-link">Calculate your admission ROI &rarr;</a></span>
      </div>
      <div class="stats reveal d6">
        <div class="stat"><div class="stat__n"><span data-xhcount="500">0</span><em>+</em></div><div class="stat__l">Institutions onboard</div></div>
        <div class="stat"><div class="stat__n"><span data-xhcount="10">0</span><em>M+</em></div><div class="stat__l">Enquiries managed</div></div>
        <div class="stat"><div class="stat__n"><span data-xhcount="37">0</span><em>%</em></div><div class="stat__l">Higher conversions</div></div>
        <div class="stat"><div class="stat__n"><span data-xhcount="60">0</span><em>s</em></div><div class="stat__l">Avg. first response</div></div>
      </div>
    </div>
    <style>/* Exact same demo-form card as the product page (single-product.php) */
      #xhero .hero-form-aside{width:100%}#xhero .hero-form-card{position:relative;background:#fff;border:1px solid #EDF0F5;border-radius:26px;padding:clamp(26px,3vw,42px);box-shadow:0 30px 70px -20px rgba(25,52,93,.26)}#xhero .hero-form-card::after{content:'';position:absolute;inset:-1px;border-radius:inherit;padding:1px;pointer-events:none;background:linear-gradient(140deg,rgba(222,110,48,.5),transparent 40%,transparent 60%,rgba(25,52,93,.4));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.55}#xhero .hero-form-card::before{content:"Book a Demo";position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:linear-gradient(135deg,#E8843F 0%,#DE6E30 55%,#C2541C 100%);color:#fff;padding:7px 20px;border-radius:999px;font-weight:700;font-size:11px;letter-spacing:.04em;white-space:nowrap;box-shadow:0 18px 44px -14px rgba(222,110,48,.55)}#xhero .secure-label{text-align:center;margin-top:18px;font-size:10.5px;color:rgba(25,52,93,.5);font-weight:600;letter-spacing:.08em;text-transform:uppercase}/* ── EE form-7 widget: FORCE clean single-column layout (overrides global page CSS + widget internals) ── */
      #ee-form-7,#ee-form-7 *{box-sizing:border-box!important}#ee-form-7 form{display:block!important;width:100%!important}#ee-form-7 form>div,#ee-form-7 form>div>div{display:block!important;width:100%!important;max-width:100%!important;float:none!important;grid-template-columns:1fr!important;margin-bottom:12px!important}#ee-form-7 h1,#ee-form-7 h2,#ee-form-7 h3,#ee-form-7 h4{line-height:1.2!important;margin:0 0 4px!important;text-align:center!important}#ee-form-7 p{line-height:1.45!important;margin:0 0 14px!important}#ee-form-7 label{display:block!important;float:none!important;width:auto!important;max-width:100%!important;text-align:left!important;color:#19345d!important;font-weight:600!important;font-size:13px!important;margin:0 0 6px!important}#ee-form-7 input[type="text"],#ee-form-7 input[type="email"],#ee-form-7 input[type="tel"],#ee-form-7 input[type="url"],#ee-form-7 input[type="number"],#ee-form-7 select,#ee-form-7 textarea{display:block!important;float:none!important;background-color:#fff!important;color:#19345d!important;border:1px solid #e2e8f0!important;border-radius:10px!important;padding:12px 14px!important;font-size:14px!important;font-family:'Inter',sans-serif!important;width:100%!important;max-width:100%!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s!important}#ee-form-7 input:focus,#ee-form-7 select:focus,#ee-form-7 textarea:focus{outline:none!important;border-color:#DE6E30!important;box-shadow:0 0 0 3px rgba(222,110,48,.12)!important}#ee-form-7 input::placeholder,#ee-form-7 textarea::placeholder{color:var(--text-muted,#5A6B85)!important;opacity:1!important}#ee-form-7 input[type="submit"],#ee-form-7 button[type="submit"]{display:block!important;background-color:var(--orange-700,#B5551D)!important;color:#fff!important;border:none!important;border-radius:12px!important;padding:14px 28px!important;font-size:15px!important;font-weight:700!important;font-family:'Inter',sans-serif!important;width:100%!important;cursor:pointer!important;transition:all .3s!important;box-shadow:0 8px 20px rgba(222,110,48,.25)!important}#ee-form-7 input[type="submit"]:hover,#ee-form-7 button[type="submit"]:hover{background-color:var(--orange-800,#A8501C)!important;transform:translateY(-2px)!important;box-shadow:0 12px 28px rgba(222,110,48,.35)!important}/* phone field (intl-tel-input) - restored AFTER the block resets so the +91 flag sits correctly */
      /* consent checkbox row - keep the box and its text on one tidy line (mobile friendly) */
      #ee-form-7 input[type="checkbox"]{display:inline-block!important;float:none!important;width:15px!important;height:15px!important;min-width:15px!important;max-width:15px!important;flex:0 0 auto!important;margin:2px 8px 0 0!important;padding:0!important;accent-color:#DE6E30!important;vertical-align:top!important;box-shadow:none!important}
      #ee-form-7 label:has(input[type="checkbox"]),#ee-form-7 div:has(>input[type="checkbox"]),#ee-form-7 p:has(>input[type="checkbox"]){display:flex!important;flex-direction:row!important;align-items:flex-start!important;gap:8px!important;width:100%!important;max-width:100%!important;margin:2px 0 12px!important;font-size:12px!important;font-weight:500!important;line-height:1.55!important;color:#5B6B84!important;text-align:left!important;text-transform:none!important;letter-spacing:0!important}
      #ee-form-7 label:has(input[type="checkbox"]) span,#ee-form-7 label:has(input[type="checkbox"]) p,#ee-form-7 div:has(>input[type="checkbox"]) label,#ee-form-7 div:has(>input[type="checkbox"]) span,#ee-form-7 div:has(>input[type="checkbox"]) p{display:inline!important;float:none!important;width:auto!important;max-width:100%!important;margin:0!important;font-size:12px!important;font-weight:500!important;line-height:1.55!important;color:#5B6B84!important;text-align:left!important}
      #ee-form-7 label:has(input[type="checkbox"]) a,#ee-form-7 div:has(>input[type="checkbox"]) a{color:var(--orange-700,#B5551D)!important;text-decoration:underline!important;font-weight:600!important}
      #ee-form-7 .iti,#ee-form-7 .iti__country-list{background-color:#fff!important;color:#19345d!important}#ee-form-7 .iti{position:relative!important;display:block!important;width:100%!important}#ee-form-7 .iti input[type="tel"]{padding-left:96px!important;width:100%!important}#ee-form-7 .iti__flag-container{position:absolute!important;top:0;bottom:0;left:0;z-index:2;display:flex!important;align-items:center}#ee-form-7 .iti__selected-flag{height:100%!important;padding:0 8px 0 14px!important;background:transparent!important;border-right:1px solid rgba(25,52,93,.10)!important;display:flex!important;align-items:center;gap:6px}#ee-form-7 .iti__selected-dial-code{color:#19345d!important;font-weight:700;font-size:.95rem}#ee-form-7 .iti__country-list{position:absolute!important;z-index:5!important}#ee-form-7 .iti__arrow{margin-left:4px!important}
      @media(max-width:1024px){#xhero .hero-form-aside{max-width:540px;margin:0 auto}}
      @media(max-width:480px){#xhero .hero-form-card{padding:24px 20px}}
    </style>
    <aside class="hero-form-aside reveal d4" id="admission-form" aria-label="Book Demo Form">
      <div class="hero-form-card">
        <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
        <div id="ee-form-7"></div>
        <p class="secure-label">&#128274; Secure Data Transmission Active</p>
      </div>
    </aside>
  </div>
</section>
<script>
/* hero rotating headlines - typewriter (text-telling) */
(function(){
  var DATA=[
    {pre:'Convert More Student Enquiries Into Admissions With ', acc:'AI-Powered Education CRM'},
    {pre:'Capture And Convert Student Leads 24/7 With ',          acc:'AI-Powered Education Chatbot'},
    {pre:'Engage Every Prospect Instantly With ',                 acc:'AI-Powered WhatsApp Admissions'},
    {pre:'Automate Student Recruitment Campaigns With ',          acc:'AI-Powered Marketing Automation'}
  ];
  var el=document.getElementById('heroRot'); if(!el) return;
  var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches;
  /* typing runs everywhere - many phones ship with OS-level animation
     reduction that used to freeze this headline on the first phrase */

  /* Build stable child nodes ONCE. Typing then only mutates their text content -
     no per-keystroke innerHTML reparse/reflow (that was the stutter), and the
     caret keeps its own steady blink instead of being recreated every frame. */
  var pre=document.createElement('span');
  var acc=document.createElement('span'); acc.className='accent';
  var caret=document.createElement('span'); caret.className='hero-caret'; caret.setAttribute('aria-hidden','true');
  el.textContent=''; el.appendChild(pre); el.appendChild(acc); el.appendChild(caret);

  var i=0,n=0,paused=false,t=null;
  var TYPE=26, DEL=12, HOLD=1600, GAP=260, START_HOLD=2000;   /* even cadence, no random jitter */
  function render(k){
    var d=DATA[i], pl=d.pre.length;
    if(k<=pl){ pre.textContent=d.pre.slice(0,k); acc.textContent=''; }
    else { pre.textContent=d.pre; acc.textContent=d.acc.slice(0,k-pl); }
  }
  function typeLoop(){
    if(paused){ t=setTimeout(typeLoop,200); return; }
    var full=DATA[i].pre.length+DATA[i].acc.length;
    n++; render(n);
    if(n>=full){ t=setTimeout(delLoop,HOLD); return; }
    t=setTimeout(typeLoop,TYPE);
  }
  function delLoop(){
    if(paused){ t=setTimeout(delLoop,200); return; }
    n--; render(n<0?0:n);
    if(n<=0){ n=0; i=(i+1)%DATA.length; t=setTimeout(typeLoop,GAP); return; }
    t=setTimeout(delLoop,DEL);
  }
  /* start fully showing headline 1 (SEO-friendly, no flash), then cycle */
  n=DATA[0].pre.length+DATA[0].acc.length; render(n);
  t=setTimeout(delLoop,START_HOLD);
  /* pause only when the tab is hidden - no hover pause (hovering the full-viewport
     hero was freezing the animation mid-word) */
  document.addEventListener('visibilitychange',function(){ paused=document.hidden; if(!paused){ /* resume promptly */ } });
})();
</script>
<script>
/* ===================== HERO - brand edition (scoped IIFE) ===================== */
(function(){
const $=s=>document.querySelector(s);
const reduced=matchMedia('(prefers-reduced-motion: reduce)').matches;

/* 1. WebGL wisps */
(function(){
  const cv=$('#glsl'); if(!cv) return;
  /* skip the WebGL hero animation on reduced-motion and on phones/tablets
     (touch or narrow) - the CSS gradient background stays; saves battery,
     GPU and main-thread work on mobile for better LCP/INP */
  var _small=(window.innerWidth||document.documentElement.clientWidth||0)<900;
  var _touch=window.matchMedia&&window.matchMedia('(hover:none)').matches;
  if(reduced||_small||_touch){cv.remove();return}
  const gl=cv.getContext('webgl',{antialias:false,alpha:true});
  if(!gl){cv.remove();return}
  const VS=`attribute vec2 p;void main(){gl_Position=vec4(p,0.,1.);}`;
  const FS=`precision mediump float;uniform vec2 r;uniform float t;
  float h(vec2 p){return fract(sin(dot(p,vec2(127.1,311.7)))*43758.5453);}
  float n(vec2 p){vec2 i=floor(p),f=fract(p);f=f*f*(3.-2.*f);
    return mix(mix(h(i),h(i+vec2(1,0)),f.x),mix(h(i+vec2(0,1)),h(i+vec2(1,1)),f.x),f.y);}
  float fbm(vec2 p){float v=0.,a=.5;for(int i=0;i<5;i++){v+=a*n(p);p=p*2.04+vec2(7.3,3.1);a*=.5;}return v;}
  void main(){
    vec2 uv=gl_FragCoord.xy/r; vec2 q=uv; q.x*=r.x/r.y;
    float T=t*.05;
    float f=fbm(q*1.5+vec2(T*.8,-T*.5));
    f=fbm(q*1.2+f*1.4+vec2(-T*.4,T*.3));
    vec3 white=vec3(1.);
    vec3 navy=vec3(.098,.2,.365);
    vec3 orange=vec3(.871,.431,.188);
    float band=smoothstep(.45,.85,f);
    float glowTR=smoothstep(.95,.15,distance(uv,vec2(.85,.85)));
    float glowBL=smoothstep(1.05,.2,distance(uv,vec2(.05,.1)));
    vec3 col=white;
    col=mix(col,navy,band*glowTR*.14);
    col=mix(col,navy,glowTR*.05);
    col=mix(col,orange,band*glowBL*.10);
    col=mix(col,orange,glowBL*.04);
    gl_FragColor=vec4(col,1.);
  }`;
  function sh(t,s){const o=gl.createShader(t);gl.shaderSource(o,s);gl.compileShader(o);return o}
  const pr=gl.createProgram();
  gl.attachShader(pr,sh(gl.VERTEX_SHADER,VS));gl.attachShader(pr,sh(gl.FRAGMENT_SHADER,FS));
  gl.linkProgram(pr);gl.useProgram(pr);
  const buf=gl.createBuffer();gl.bindBuffer(gl.ARRAY_BUFFER,buf);
  gl.bufferData(gl.ARRAY_BUFFER,new Float32Array([-1,-1,3,-1,-1,3]),gl.STATIC_DRAW);
  const loc=gl.getAttribLocation(pr,'p');gl.enableVertexAttribArray(loc);gl.vertexAttribPointer(loc,2,gl.FLOAT,false,0,0);
  const uR=gl.getUniformLocation(pr,'r'),uT=gl.getUniformLocation(pr,'t');
  function size(){const d=Math.min(devicePixelRatio||1,1.5);
    cv.width=innerWidth*d*.7;cv.height=cv.parentElement.offsetHeight*d*.7;
    gl.viewport(0,0,cv.width,cv.height);gl.uniform2f(uR,cv.width,cv.height);}
  size();addEventListener('resize',size);
  let vis=true;new IntersectionObserver(e=>vis=e[0].isIntersecting).observe(cv);
  (function loop(ts){if(vis){gl.uniform1f(uT,ts/1000);gl.drawArrays(gl.TRIANGLES,0,3);}requestAnimationFrame(loop);})(0);
})();

/* 2. typed headline */
(function(){
  const words=["Into Enrolled Students.","On WhatsApp - in Seconds.","Before Competitors Reply.","With 40% Less Effort."];
  const el=$('#typed');let w=0,c=0,del=false;
  if(!el) return; if(reduced){el.textContent=words[0];return}
  (function tick(){
    const word=words[w];
    el.textContent=word.slice(0,c+=del?-1:1);
    let t=del?34:62;
    if(!del&&c===word.length){t=2100;del=true}
    else if(del&&c===0){del=false;w=(w+1)%words.length;t=420}
    setTimeout(tick,t);
  })();
})();

/* 3. counters */
(function(){
  const ease=x=>1-Math.pow(1-x,3);
  function run(el,end,dur){const t0=performance.now();
    (function f(t){const p=Math.min((t-t0)/dur,1);el.textContent=Math.round(end*ease(p)).toLocaleString();
      if(p<1)requestAnimationFrame(f)})(t0)}
  const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){run(e.target,+e.target.dataset.xhcount,1400);io.unobserve(e.target)}}),{threshold:.6});
  document.querySelectorAll('#xhero [data-xhcount]').forEach(el=>io.observe(el));
  let conv=418;const cEl=$('#convNum'); if(cEl){run(cEl,conv,1600);
  setInterval(()=>{conv+=Math.random()<.6?1:2;cEl.textContent=conv.toLocaleString()},reduced?9999999:5200);}
})();

/* 4. VidyaAI journey simulation */
(function(){
  if(!$('#s1')) return;
  const scenarios=[
    {chan:'WHATSAPP',who:'Riya S. · Pune · 22:41',msg:'Hi! I want to apply for B.Tech CSE but I think I missed the deadline 😟',
     think:['Intent detected: Admission · B.Tech CSE','Eligibility & late-window policy checked','Scored 92/100 - high intent, hot region'],
     reply:'Good news, Riya - late applications close Friday! I’ve reserved your slot and sent the form. Want help with documents?',
     acts:['📅 Call auto-booked · tom 11:00','📄 Application link sent','🔥 Routed to Priya · CSE desk'],score:92,name:'Riya S.'},
    {chan:'INSTAGRAM DM',who:'Arjun M. · Jaipur · 09:12',msg:'What’s the fee for MBA and do you offer scholarships?',
     think:['Intent detected: Fees + Scholarship · MBA','Merit-scholarship matrix matched','Scored 78/100 - needs nurturing'],
     reply:'Hi Arjun! MBA fees start at ₹4.2L/yr - and you may qualify for up to 40% merit scholarship. Shall I check your eligibility in 2 minutes?',
     acts:['🎓 Scholarship quiz sent','✉️ Brochure delivered','📊 Added to MBA nurture journey'],score:78,name:'Arjun M.'},
    {chan:'WEBSITE FORM',who:'Fatima K. · Dubai · 17:55',msg:'Interested in B.Sc Nursing for my daughter. Is hostel available for international students?',
     think:['Intent detected: Parent enquiry · Intl','Hostel + visa docs retrieved','Scored 88/100 - decision-maker'],
     reply:'Absolutely, Fatima - we have secure girls’ hostels with airport pickup for international students. I’ve emailed the parent guide. Prefer a call this week?',
     acts:['🌍 Intl. counsellor assigned','🏠 Hostel guide emailed','📞 AI voice follow-up queued'],score:88,name:'Fatima K.'}
  ];
  const S=[ $('#s1'),$('#s2'),$('#s3'),$('#s4') ];
  const T=[ $('#t1'),$('#t2'),$('#t3') ];
  const ring=$('#ringFg'),ringVal=$('#ringVal'),ringWho=$('#ringWho');
  const C=138.2; let i=0;
  const wait=ms=>new Promise(r=>setTimeout(r,ms));
  async function play(sc){
    S.forEach(s=>s.classList.remove('on'));
    T.forEach(t=>{t.classList.remove('done');t.lastElementChild.textContent=''});
    ['a1','a2','a3'].forEach(id=>{const a=document.getElementById(id);a.classList.remove('on');a.textContent=''});
    ring.style.strokeDashoffset=C; ringVal.textContent='0';
    await wait(450);
    $('#srcChan').textContent=sc.chan;
    $('#hInbound').textContent=sc.msg;
    $('#hWho').textContent=sc.who;
    S[0].classList.add('on'); await wait(900);
    S[1].classList.add('on');
    for(let k=0;k<3;k++){T[k].lastElementChild.textContent=sc.think[k];await wait(700);T[k].classList.add('done');}
    ringWho.textContent=sc.name;
    ring.style.strokeDashoffset=C*(1-sc.score/100);
    let sv=0;const si=setInterval(()=>{sv+=2;if(sv>=sc.score){sv=sc.score;clearInterval(si)}ringVal.textContent=sv},22);
    await wait(700);
    S[2].classList.add('on');
    const r=$('#hReply');r.textContent='';
    if(reduced){r.textContent=sc.reply}
    else{for(const ch of sc.reply){r.textContent+=ch;await wait(13)}}
    await wait(800);
    S[3].classList.add('on');
    for(let k=0;k<3;k++){const a=document.getElementById('a'+(k+1));a.textContent=sc.acts[k];await wait(380);a.classList.add('on')}
    await wait(3600);
  }
  (async function loop(){for(;;){await play(scenarios[i%scenarios.length]);i++}})();
})();

/* 5. tilt + magnetic CTA */
(function(){
  if(reduced||!matchMedia('(pointer:fine)').matches)return;
  const card=$('#console'); if(!card) return; const wrap=card.parentElement;
  wrap.addEventListener('mousemove',e=>{const b=wrap.getBoundingClientRect();
    const x=(e.clientX-b.left)/b.width-.5,y=(e.clientY-b.top)/b.height-.5;
    card.style.transform=`rotateY(${x*6}deg) rotateX(${-y*6}deg)`});
  wrap.addEventListener('mouseleave',()=>card.style.transform='');
  const m=$('#magnet'); if(!m) return;
  m.addEventListener('mousemove',e=>{const b=m.getBoundingClientRect();
    m.style.transform=`translate(${(e.clientX-b.left-b.width/2)*.18}px,${(e.clientY-b.top-b.height/2)*.3}px)`});
  m.addEventListener('mouseleave',()=>m.style.transform='');
})();
})();
</script>

<!-- ═══ LOGO MARQUEE · styles ═══ -->
<style id="trusted-institutions-style">#trusted-institutions{
  --font-h:'Inter',sans-serif;
  padding:10px 0;background:#fff;font-family:'Inter',sans-serif;overflow:hidden;
  border-top:1px solid rgba(25,52,93,.08);border-bottom:1px solid rgba(25,52,93,.08);
}#trusted-institutions .logo-header{max-width:780px;margin:0 auto 18px;text-align:center;padding:0 24px}#trusted-institutions .logo-badge{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--orange-700,#B5551D);background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px;margin-bottom:12px}#trusted-institutions .logo-title{font-family:'Inter',sans-serif;font-weight:800;font-size:clamp(23px,3.4vw,40px);line-height:1.12;letter-spacing:-.02em;color:#19345d;margin:4px 0 10px}#trusted-institutions .logo-sub{font-size:clamp(14.5px,1.6vw,17px);line-height:1.6;color:rgba(25,52,93,.66);max-width:640px;margin:0 auto}#trusted-institutions .logo-sub strong{color:#19345d;font-weight:700}#trusted-institutions .marquee-wrap{overflow:hidden;padding:6px 0;-webkit-mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)}#trusted-institutions .marquee-track{display:flex;gap:26px;width:max-content;align-items:center;will-change:transform}#trusted-institutions .marquee-left{animation:ti-scroll-l 45s linear infinite}#trusted-institutions .marquee-right{animation:ti-scroll-r 45s linear infinite}@media(hover:hover){#trusted-institutions .marquee-wrap:hover .marquee-track{animation-play-state:paused}}
@keyframes ti-scroll-l{from{transform:translateX(0)}to{transform:translateX(-50%)}}
#trusted-institutions .lc-alt{font:700 11.5px/1.3 'Inter',sans-serif;color:#19345d;text-align:center;padding:0 6px}
@media(max-width:640px){#trusted-institutions .logo-card{width:132px;height:70px;padding:10px}#trusted-institutions .logo-card img{max-height:44px}#trusted-institutions .marquee-track{gap:16px}}

@keyframes ti-scroll-r{from{transform:translateX(-50%)}to{transform:translateX(0)}}#trusted-institutions .logo-card{flex:none;width:170px;height:86px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}#trusted-institutions .logo-card:hover{border-color:#DE6E30;transform:translateY(-4px)}#trusted-institutions .logo-card img{max-height:54px;width:auto;object-fit:contain;transition:.3s}#trusted-institutions .logo-footer{display:flex;flex-direction:column;align-items:center;gap:13px;margin-top:18px;padding:0 24px;text-align:center}#trusted-institutions .btn-primary{display:inline-flex;align-items:center;gap:8px;background:var(--orange-700,#B5551D);color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:99px;text-decoration:none;box-shadow:0 8px 24px rgba(222,110,48,.28);transition:.25s}#trusted-institutions .btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 30px rgba(222,110,48,.36)}#trusted-institutions .live-indicator{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:rgba(25,52,93,.7)}#trusted-institutions .green-dot{width:9px;height:9px;border-radius:50%;background:#2263c5;box-shadow:0 0 0 0 rgba(34,99,197,.5);animation:ti-pulse 1.8s infinite}
@keyframes ti-pulse{0%{box-shadow:0 0 0 0 rgba(34,99,197,.5)}70%{box-shadow:0 0 0 9px rgba(34,99,197,0)}100%{box-shadow:0 0 0 0 rgba(34,99,197,0)}}.section-divider{height:1px;background:linear-gradient(90deg,transparent,rgba(25,52,93,.12),transparent);max-width:1240px;margin:0 auto}

@media (prefers-reduced-motion:reduce){#trusted-institutions .marquee-track,#trusted-institutions .green-dot{animation:none}}
@media (max-width:600px){#trusted-institutions .logo-card{width:132px;height:72px;padding:12px}#trusted-institutions .logo-card img{max-height:44px}}
</style>
<!-- ═══ LOGO MARQUEE ═══ -->

<!-- ===================== EXTRAAEDGE PLATFORM · live interactive demo ===================== -->
<style>#ee-platform{position:relative;padding:clamp(64px,8vw,104px) 0;background:linear-gradient(180deg,#ffffff,#f5f8fc);overflow:hidden;font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased}#ee-platform .eep-wrap{max-width:1280px;margin:0 auto;padding:0 24px}#ee-platform .eep-head{max-width:760px;margin:0 auto clamp(28px,4vw,46px);text-align:center}#ee-platform .eep-eyebrow{display:inline-flex;align-items:center;gap:8px;font:700 12px/1 'Inter';letter-spacing:.14em;text-transform:uppercase;color:#19345d;background:rgba(255,255,255,.75);border:1px solid rgba(25,52,93,.1);border-radius:999px;padding:8px 15px;box-shadow:0 4px 14px rgba(25,52,93,.06)}#ee-platform .eep-eyebrow i{width:7px;height:7px;border-radius:50%;background:#DE6E30;box-shadow:0 0 0 4px rgba(222,110,48,.18)}#ee-platform .eep-head h2{font-weight:800;font-size:clamp(28px,4.2vw,46px);line-height:1.08;letter-spacing:-.03em;color:#19345d;margin:18px 0 12px}#ee-platform .eep-head p{font-size:clamp(15px,1.7vw,18px);line-height:1.6;color:#5a6b85;margin:0}#ee-platform .eep-window{position:relative;border-radius:16px;overflow:hidden;background:#fff;border:1px solid rgba(25,52,93,.12);box-shadow:0 44px 96px -34px rgba(25,52,93,.4),0 0 0 1px rgba(25,52,93,.04)}#ee-platform .eep-bar{display:flex;align-items:center;gap:8px;padding:11px 16px;background:#f1f3f7;border-bottom:1px solid rgba(25,52,93,.1)}#ee-platform .eep-bar .d{width:11px;height:11px;border-radius:50%;display:block}#ee-platform .eep-bar .d.r{background:#ec9c5e}#ee-platform .eep-bar .d.y{background:#f4964f}#ee-platform .eep-bar .d.g{background:#5481c4}#ee-platform .eep-bar .eep-url{margin:0 auto;font-size:12px;font-weight:600;color:#8a95a6;background:#fff;border:1px solid rgba(25,52,93,.08);border-radius:7px;padding:4px 16px}#ee-platform .eep-frame{display:block;width:100%;height:min(80vh,780px);border:0;background:#f4f5f7}
  @media(max-width:860px){#ee-platform .eep-frame{height:min(82vh,680px)}#ee-platform .eep-bar .eep-url{display:none}}#ee-platform .eep-cta{margin:clamp(26px,4vw,40px) auto 0;display:flex;flex-direction:column;align-items:center;gap:12px;text-align:center}#ee-platform .eep-cta-t{font-size:clamp(17px,2vw,21px);font-weight:700;color:#19345d;margin:0;line-height:1.4}#ee-platform .eep-cta-t strong{color:var(--orange-700,#B5551D)}#ee-platform .eep-cta-btn{display:inline-flex;align-items:center;gap:9px;background:var(--orange-700,#B5551D);color:#fff;font-weight:700;font-size:16px;padding:15px 30px;border-radius:999px;box-shadow:0 14px 30px -10px rgba(222,110,48,.6);transition:transform .2s ease,box-shadow .2s ease}#ee-platform .eep-cta-btn svg,#ee-platform .eep-cta-btn img.eeimg{width:18px;height:18px;transition:transform .2s ease}#ee-platform .eep-cta-btn:hover{transform:translateY(-2px);box-shadow:0 20px 38px -10px rgba(222,110,48,.7)}#ee-platform .eep-cta-btn:hover svg,#ee-platform .eep-cta-btn:hover img.eeimg{transform:translateX(4px)}#ee-platform .eep-cta-sub{font-size:13px;font-weight:600;color:#7a889e}
  @media(max-width:560px){#ee-platform{padding:46px 0 54px}#ee-platform .eep-wrap{padding:0 14px}#ee-platform .eep-window{border-radius:12px}#ee-platform .eep-cta-btn{width:100%;justify-content:center}}
</style>


<section class="logo-section" id="trusted-institutions" aria-label="Trusted Institutions">
  <div class="logo-header reveal">
    <h2 class="logo-title" style="font-family:var(--font-h);font-weight:800;font-size:clamp(1.5rem,3.2vw,2.2rem);color:var(--blue);line-height:1.18;letter-spacing:-.02em;margin:6px 0 12px">Trusted by 500+ educational institutions across India</h2>
    <p class="logo-sub" style="max-width:760px;margin:0 auto 18px;color:#5a6b85;font-size:clamp(.95rem,1.6vw,1.05rem);line-height:1.6">ExtraaEdge powers <strong>5M+ student leads</strong> and <strong>100M+ student interactions</strong>, enabling universities, colleges, and EdTech organizations to accelerate admissions with AI-powered CRM and intelligent automation.</p>
  </div>
  <div class="marquee-wrap">
    <div class="marquee-track marquee-left">
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-university-ambi-u2013pune-logo.svg" alt="D Y Patil University Ambi Pune — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/aip-education-pty-ltd-aus-logo.svg" alt="Aip Education Pty Ltd Aus — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iitm-college-of-engineering-logo.svg" alt="Iitm College of Engineering — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/sree-sloka-sai-dattatreya-edu-society-logo.svg" alt="Sree Sloka Sai Dattatreya Edu Society — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/seamless-education-services-logo.svg" alt="Seamless Education Services — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/ignite-academy-logo.svg" alt="Ignite Academy — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-quantium-school-vedaantha-fdn-logo.svg" alt="The Quantium School Vedaantha Fdn — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/dq-labs-pvt-ltd-logo.svg" alt="Dq Labs Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vikrant-university-logo.svg" alt="Vikrant University — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/results-consortium-ltd-logo.svg" alt="Results Consortium Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/iitians-prashikshan-kendra-logo.svg" alt="Iitians Prashikshan Kendra — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-pgdm-institute-akurdi-logo.svg" alt="D Y Patil Pgdm Institute Akurdi — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/school-of-innovation-and-management-logo.svg" alt="School of Innovation and Management — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/bareilly-scholars-educational-society-kcmt-logo.svg" alt="Bareilly Scholars Educational Society Kcmt — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/gold-gym-logo.svg" alt="Gold Gym — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/career-buddy-placement-and-training-logo.svg" alt="Career Buddy Placement and Training — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/park-s-college-logo.svg" alt="Park S College — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/academy-of-applied-arts-logo.svg" alt="Academy of Applied Arts — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg" alt="Reliance Foundation Inst of Edu and Research Jio — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/toms-college-of-engineering-logo.svg" alt="Toms College of Engineering — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-language-skool-logo.svg" alt="The Language Skool — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-university-ambi-u2013pune-logo.svg" alt="D Y Patil University Ambi Pune — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/aip-education-pty-ltd-aus-logo.svg" alt="Aip Education Pty Ltd Aus — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iitm-college-of-engineering-logo.svg" alt="Iitm College of Engineering — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/sree-sloka-sai-dattatreya-edu-society-logo.svg" alt="Sree Sloka Sai Dattatreya Edu Society — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/seamless-education-services-logo.svg" alt="Seamless Education Services — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/ignite-academy-logo.svg" alt="Ignite Academy — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/the-quantium-school-vedaantha-fdn-logo.svg" alt="The Quantium School Vedaantha Fdn — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/dq-labs-pvt-ltd-logo.svg" alt="Dq Labs Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/vikrant-university-logo.svg" alt="Vikrant University — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/results-consortium-ltd-logo.svg" alt="Results Consortium Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/iitians-prashikshan-kendra-logo.svg" alt="Iitians Prashikshan Kendra — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/d-y-patil-pgdm-institute-akurdi-logo.svg" alt="D Y Patil Pgdm Institute Akurdi — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/school-of-innovation-and-management-logo.svg" alt="School of Innovation and Management — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/bareilly-scholars-educational-society-kcmt-logo.svg" alt="Bareilly Scholars Educational Society Kcmt — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/gold-gym-logo.svg" alt="Gold Gym — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/career-buddy-placement-and-training-logo.svg" alt="Career Buddy Placement and Training — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/park-s-college-logo.svg" alt="Park S College — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/academy-of-applied-arts-logo.svg" alt="Academy of Applied Arts — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg" alt="Reliance Foundation Inst of Edu and Research Jio — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/toms-college-of-engineering-logo.svg" alt="Toms College of Engineering — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/the-language-skool-logo.svg" alt="The Language Skool — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
    </div>
    <div class="marquee-track marquee-right" style="margin-top:16px">
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fortune-cloud-technologies-logo.svg" alt="Fortune Cloud Technologies — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/dalhousie-public-school-edu-society-logo.svg" alt="Dalhousie Public School Edu Society — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/mit-univista-global-tech-logo.svg" alt="Mit Univista Global Tech — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aishwarya-college-udaipur-logo.svg" alt="Aishwarya College Udaipur — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kishkinda-university-logo.svg" alt="Kishkinda University — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mindcreed-logo.svg" alt="Mindcreed — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/trillium-foundation-logo.svg" alt="Trillium Foundation — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nilaya-edutech-pvt-ltd-logo.svg" alt="Nilaya Edutech Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/etherial-education-pvt-ltd-or-united-group-of-institute-logo.svg" alt="Etherial Education Pvt Ltd Or United Group of Institute — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/pixel-pop-academy-pvt-ltd-logo.svg" alt="Pixel Pop Academy Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-kanpur-logo.svg" alt="Seth Anandram Jaipuria School Kanpur — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/nips-school-of-hotel-management-logo.svg" alt="Nips School of Hotel Management — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/dr-rajkumar-academy-for-civil-services-logo.svg" alt="Dr Rajkumar Academy for Civil Services — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/velammal-vidhyashram-logo.svg" alt="Velammal Vidhyashram — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atharva-university-mumbai-logo.svg" alt="Atharva University Mumbai — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iibm-institute-of-business-mgmt-logo.svg" alt="Iibm Institute of Business Mgmt — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/modern-groups-of-institute-logo.svg" alt="Modern Groups of Institute — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ebek-language-laboratories-logo.svg" alt="Ebek Language Laboratories — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/srj-edu-services-pvt-ltd-logo.svg" alt="Srj Edu Services Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/universal-wisdom-school-logo.svg" alt="Universal Wisdom School — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/shree-om-university-logo.svg" alt="Shree Om University — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/fortune-cloud-technologies-logo.svg" alt="Fortune Cloud Technologies — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/dalhousie-public-school-edu-society-logo.svg" alt="Dalhousie Public School Edu Society — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/overseas/mit-univista-global-tech-logo.svg" alt="Mit Univista Global Tech — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/aishwarya-college-udaipur-logo.svg" alt="Aishwarya College Udaipur — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/kishkinda-university-logo.svg" alt="Kishkinda University — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/mindcreed-logo.svg" alt="Mindcreed — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/trillium-foundation-logo.svg" alt="Trillium Foundation — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/nilaya-edutech-pvt-ltd-logo.svg" alt="Nilaya Edutech Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/etherial-education-pvt-ltd-or-united-group-of-institute-logo.svg" alt="Etherial Education Pvt Ltd Or United Group of Institute — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/pixel-pop-academy-pvt-ltd-logo.svg" alt="Pixel Pop Academy Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/seth-anandram-jaipuria-school-kanpur-logo.svg" alt="Seth Anandram Jaipuria School Kanpur — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/nips-school-of-hotel-management-logo.svg" alt="Nips School of Hotel Management — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/coaching%20institute%20crm/dr-rajkumar-academy-for-civil-services-logo.svg" alt="Dr Rajkumar Academy for Civil Services — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/velammal-vidhyashram-logo.svg" alt="Velammal Vidhyashram — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/atharva-university-mumbai-logo.svg" alt="Atharva University Mumbai — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/iibm-institute-of-business-mgmt-logo.svg" alt="Iibm Institute of Business Mgmt — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/modern-groups-of-institute-logo.svg" alt="Modern Groups of Institute — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/vocational/ebek-language-laboratories-logo.svg" alt="Ebek Language Laboratories — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/srj-edu-services-pvt-ltd-logo.svg" alt="Srj Edu Services Pvt Ltd — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/universal-wisdom-school-logo.svg" alt="Universal Wisdom School — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/shree-om-university-logo.svg" alt="Shree Om University — ExtraaEdge admissions CRM" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
    </div>
  </div>
  <div style="text-align:center;margin-top:26px">
    <a href="#admission-form" style="display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:.95rem;color:#19345d;border:1.5px solid rgba(25,52,93,.18);background:#fff;border-radius:999px;padding:11px 24px;text-decoration:none;transition:all .2s ease" onmouseover="this.style.borderColor='#DE6E30';this.style.color='#DE6E30'" onmouseout="this.style.borderColor='rgba(25,52,93,.18)';this.style.color='#19345d'">View More Clients <span aria-hidden="true">&rarr;</span></a>
  </div>
</section>

<!-- ===================== WHY INSTITUTES CHOOSE EXTRAAEDGE (scoped #ee-why) ===================== -->
<style>#ee-why{position:relative;padding:clamp(48px,7vw,92px) 0;background:
  radial-gradient(900px 420px at 90% -6%, rgba(222,110,48,.06), transparent 60%),
  radial-gradient(760px 420px at 4% 104%, rgba(25,52,93,.05), transparent 60%),#fff;
  font-family:'Inter',system-ui,-apple-system,sans-serif;color:#0f203a;-webkit-font-smoothing:antialiased}
#ee-why *{box-sizing:border-box}
#ee-why .eew-wrap{max-width:1240px;margin:0 auto;padding:0 24px}
#ee-why .eew-eyebrow{display:inline-flex;align-items:center;gap:9px;padding:7px 14px 7px 11px;border-radius:999px;background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.2);color:#C45A20;font-size:11.5px;font-weight:700;letter-spacing:.13em;text-transform:uppercase;margin-bottom:14px}
#ee-why .eew-eyebrow i{width:7px;height:7px;border-radius:50%;background:#DE6E30;box-shadow:0 0 0 4px rgba(222,110,48,.15)}
#ee-why h2{color:#19345d;margin:0 auto 12px;max-width:44ch;text-align:center}
#ee-why .eew-lead{color:#5a6b85;line-height:1.6;margin:0 auto 8px;max-width:56ch;text-align:center}
#ee-why .eew-lead strong{color:#19345d}
#ee-why .eew-grid{display:grid;grid-template-columns:minmax(0,1.02fr) minmax(0,.98fr);gap:clamp(28px,4vw,54px);align-items:center;margin-top:clamp(20px,3vw,30px)}
#ee-why .eew-list{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:12px}
#ee-why .eew-item{display:flex;gap:14px;align-items:flex-start;background:#fff;border:1px solid rgba(25,52,93,.1);border-radius:14px;padding:14px 16px;transition:border-color .25s,box-shadow .25s,transform .25s}
#ee-why .eew-item:hover{border-color:rgba(222,110,48,.45);box-shadow:0 14px 32px -20px rgba(25,52,93,.35);transform:translateX(4px)}
#ee-why .eew-n{flex:none;width:30px;height:30px;border-radius:9px;display:grid;place-items:center;font:800 11px/1 'Inter',sans-serif;color:var(--orange-800,#A8501C);background:rgba(222,110,48,.09);border:1px solid rgba(222,110,48,.25)}
#ee-why .eew-tx h3{color:#19345d;margin:2px 0 4px}
#ee-why .eew-tx p{color:#5a6b85;line-height:1.55;margin:0}
#ee-why .eew-media{position:relative}
#ee-why .eew-media img{width:100%;height:auto;border-radius:18px;border:1px solid rgba(25,52,93,.1);box-shadow:0 30px 70px -30px rgba(25,52,93,.35)}
#ee-why .eew-media::after{content:"";position:absolute;inset:auto -14px -14px auto;width:120px;height:120px;border-radius:50%;background:radial-gradient(closest-side,rgba(222,110,48,.14),transparent 70%);z-index:-1}
@media(max-width:960px){
  #ee-why .eew-grid{grid-template-columns:minmax(0,1fr);gap:20px}
  #ee-why .eew-media{order:-1;max-width:520px;margin:0 auto}
  #ee-why .eew-item{padding:11px 12px;gap:10px;border-radius:12px}
  #ee-why .eew-n{width:26px;height:26px;border-radius:8px;font-size:10px}
  #ee-why .eew-list{gap:8px}
}
</style>
<section id="ee-why" aria-labelledby="eew-h">
  <div class="eew-wrap">
    <h2 id="eew-h">Why Institutes Choose ExtraaEdge as the Architect of Their Admission Process?</h2>
    <p class="eew-lead">Most Admission CRMs help you <strong>manage</strong> admissions. ExtraaEdge helps you <strong>design how admissions should work</strong> - end to end, at scale.</p>
    <div class="eew-grid">
      <ul class="eew-list">
        <li class="eew-item">
          <span class="eew-n">01</span>
          <div class="eew-tx"><h3>One unified Admission Cloud</h3><p>Run the entire enrollment journey from inquiry to enrollment, without fragmented tools or manual follow-ups.</p></div>
        </li>
        <li class="eew-item">
          <span class="eew-n">02</span>
          <div class="eew-tx"><h3>AI-powered admission assistance</h3><p>Handles student queries 24&times;7 across web and WhatsApp, while giving counselors full context to respond faster and smarter.</p></div>
        </li>
        <li class="eew-item">
          <span class="eew-n">03</span>
          <div class="eew-tx"><h3>AI calling and agents</h3><p>Qualify, engage, and route high-intent prospects at scale, helping teams grow outcomes without growing headcount.</p></div>
        </li>
        <li class="eew-item">
          <span class="eew-n">04</span>
          <div class="eew-tx"><h3>Real-time intelligence</h3><p>Surfaces intent, bottlenecks, and counselor performance so teams act early and convert better.</p></div>
        </li>
        <li class="eew-item">
          <span class="eew-n">05</span>
          <div class="eew-tx"><h3>Built to adapt and integrate</h3><p>Adapts to each institute&rsquo;s process, integrates seamlessly with ads, websites, ERP, and communication tools - and scales with your growth.</p></div>
        </li>
      </ul>
      <div class="eew-media">
        <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-institutes-choose-extraaedge.png" alt="Why institutes choose ExtraaEdge - the unified AI Admission Cloud" loading="lazy" decoding="async" onerror="this.closest('.eew-media').style.display='none'">
      </div>
    </div>
  </div>
</section>


<!-- ===================== RESPOND FIRST · AI STORYTELLING (scoped #ee-rfa) ===================== -->
<style>#ee-rfa{position:relative;padding:0;margin-top:clamp(32px,5vw,56px);background:
  radial-gradient(900px 480px at 92% 0%, rgba(222,110,48,.07), transparent 60%),
  radial-gradient(820px 460px at 2% 100%, rgba(25,52,93,.06), transparent 60%),#f6f8fc;
  font-family:'Inter',system-ui,-apple-system,sans-serif;color:#0f203a;-webkit-font-smoothing:antialiased}
#ee-rfa *{box-sizing:border-box}
/* blurred brand orbs behind the glass cards */
#ee-rfa .rfa-orb{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none;opacity:.5}
#ee-rfa .rfa-orb.o1{width:340px;height:340px;left:-80px;top:12%;background:rgba(222,110,48,.18)}
#ee-rfa .rfa-orb.o2{width:400px;height:400px;right:-100px;bottom:8%;background:rgba(34,99,197,.14)}
#ee-rfa .rfa-track{position:relative;height:calc(min(100vh,860px)*3.4)}
#ee-rfa .rfa-pin{position:sticky;top:86px;height:min(calc(100vh - 86px),820px);overflow:hidden;display:flex;align-items:center;align-items:safe center}
#ee-rfa .rfa-in{max-width:1270px;margin:0 auto;width:100%;padding:12px 24px;display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr) 18px;gap:clamp(18px,2.6vw,40px);align-items:center}#ee-rfa .rfa-in>.rfa-rail{order:3}#ee-rfa .rfa-in>.rfa-cards{order:2}#ee-rfa .rfa-in>.rfa-stagewrap,#ee-rfa .rfa-in>*:nth-child(3){order:1}
#ee-rfa .rfa-cards{max-height:calc(min(100vh - 86px,820px) - 24px);overflow-y:hidden}/* overflow-y:hidden (not auto): the column must never swallow the mouse wheel - page scroll drives the pinned story - while reveal() can still move scrollTop */
@media (max-height:860px){#ee-rfa .rfa-card{padding:11px 14px;margin-bottom:7px}#ee-rfa .rfa-kick{margin-bottom:7px}html body #main-content #ee-rfa h2.rfa-title{font-size:17px!important}#ee-rfa .rfa-body p{line-height:1.6;margin:8px 0 10px}#ee-rfa .rfa-chiplbl{margin:10px 0 7px}}
/* progress rail: fill tracks scroll, dots jump to a story */
#ee-rfa .rfa-rail{position:relative;align-self:stretch;display:flex;flex-direction:column;align-items:center;justify-content:space-between;padding:26px 0;width:18px}
#ee-rfa .rfa-rail::before{content:"";position:absolute;top:26px;bottom:26px;left:50%;width:2px;transform:translateX(-50%);background:rgba(25,52,93,.12);border-radius:2px}
#ee-rfa .rfa-fill{position:absolute;top:26px;left:50%;width:2px;transform:translateX(-50%);height:0;background:linear-gradient(180deg,#E8843F,#DE6E30);border-radius:2px;transition:height .2s linear}
#ee-rfa .rfa-dot{position:relative;z-index:1;width:14px;height:14px;border-radius:50%;border:2px solid rgba(25,52,93,.25);background:#fff;padding:0;cursor:pointer;transition:border-color .25s,box-shadow .25s,transform .25s}
#ee-rfa .rfa-dot:hover{transform:scale(1.25)}
#ee-rfa .rfa-dot.on{border-color:#DE6E30;box-shadow:0 0 0 5px rgba(222,110,48,.15)}
/* browser-chrome frame + live caption under the stage */
#ee-rfa .rfa-frame{border-radius:16px;overflow:hidden;background:#fff;border:1px solid rgba(25,52,93,.12);box-shadow:0 34px 70px -30px rgba(25,52,93,.35)}
#ee-rfa .rfa-chrome{display:flex;align-items:center;gap:6px;padding:10px 14px;background:#f4f6fa;border-bottom:1px solid rgba(25,52,93,.08)}
#ee-rfa .rfa-chrome i{width:9px;height:9px;border-radius:50%;background:rgba(25,52,93,.15)}
#ee-rfa .rfa-chrome i:nth-child(1){background:#ff5f57}
#ee-rfa .rfa-chrome i:nth-child(2){background:#febc2e}
#ee-rfa .rfa-chrome i:nth-child(3){background:#28c840}
#ee-rfa .rfa-chrome span{margin-left:8px;font:600 11px/1 'Inter',sans-serif;color:#7a889e;background:#fff;border:1px solid rgba(25,52,93,.1);border-radius:7px;padding:5px 11px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#ee-rfa .rfa-shots{position:relative;aspect-ratio:16/10;background:#fbfcfe}
#ee-rfa .rfa-foot{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-top:12px}
#ee-rfa .rfa-foot b{font-size:12.5px;font-weight:700;color:#19345d;line-height:1.35}
#ee-rfa .rfa-foot span{flex:none;font:700 11px/1 ui-monospace,Menlo,monospace;color:#C45A20;background:rgba(222,110,48,.09);border:1px solid rgba(222,110,48,.25);padding:6px 10px;border-radius:999px}
/* glass cards: fade-in + slide-up reveal, hover lift, active highlight */
#ee-rfa .rfa-card{position:relative;border-radius:16px;padding:16px 18px 20px;cursor:pointer;margin-bottom:10px;
  background:rgba(255,255,255,.55);border:1px solid rgba(25,52,93,.12);
  -webkit-backdrop-filter:blur(14px) saturate(140%);backdrop-filter:blur(14px) saturate(140%);
  box-shadow:inset 0 1px 0 rgba(255,255,255,.6),0 8px 24px -18px rgba(25,52,93,.25);
  opacity:0;transform:translateY(24px);
  transition:opacity .6s cubic-bezier(.2,.7,.2,1),transform .45s cubic-bezier(.2,.7,.2,1),background .35s,border-color .35s,box-shadow .35s}
#ee-rfa.rfa-rev .rfa-card{opacity:1;transform:none}
#ee-rfa.rfa-rev .rfa-card:nth-child(2){transition-delay:.08s}
#ee-rfa.rfa-rev .rfa-card:nth-child(3){transition-delay:.16s}
#ee-rfa.rfa-rev .rfa-card:nth-child(4){transition-delay:.24s}
#ee-rfa .rfa-card:hover{transform:translateY(-4px);box-shadow:inset 0 1px 0 rgba(255,255,255,.6),0 18px 40px -20px rgba(25,52,93,.4)}
#ee-rfa .rfa-card.on{background:rgba(255,255,255,.92);border-color:rgba(222,110,48,.55);
  box-shadow:inset 0 1px 0 #fff,0 20px 46px -22px rgba(222,110,48,.35),0 0 0 4px rgba(222,110,48,.08)}
#ee-rfa .rfa-kick{display:inline-block;font:700 10.5px/1 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-700,#B5551D);background:rgba(222,110,48,.09);border:1px solid rgba(222,110,48,.22);padding:5px 10px;border-radius:999px;margin-bottom:12px}
#ee-rfa .rfa-title{color:#19345d;margin:0 0 10px}
html body #main-content #ee-rfa h2.rfa-title{font-size:17px!important;line-height:1.35!important}
#ee-rfa .rfa-body{max-height:0;opacity:0;overflow:hidden;transition:max-height .55s cubic-bezier(.2,.7,.2,1),opacity .4s ease .1s}
#ee-rfa .rfa-card.on .rfa-body{max-height:560px;opacity:1}
#ee-rfa .rfa-body p{color:#5a6b85;line-height:1.72;margin:12px 0 18px}
#ee-rfa .rfa-chiplbl{display:block;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#8593a8;margin:14px 0 9px}
#ee-rfa .rfa-chips{display:flex;flex-wrap:wrap;gap:8px}
#ee-rfa .rfa-chips span{font:600 11.5px/1.3 'Inter',sans-serif;color:#19345d;background:rgba(25,52,93,.05);border:1px solid rgba(25,52,93,.13);padding:6px 11px;border-radius:999px;transition:border-color .2s,color .2s}
#ee-rfa .rfa-chips span:hover{border-color:rgba(222,110,48,.5);color:#C45A20}
#ee-rfa .rfa-cardimg{display:none;margin:12px 0 0}
/* sticky image stage: crossfade + scale animation */
#ee-rfa .rfa-stage{position:relative;min-height:340px}
#ee-rfa .rfa-shot{position:absolute;inset:0;width:100%;height:100%;object-fit:contain;padding:8px;
  opacity:0;transform:scale(.94);transition:opacity .55s cubic-bezier(.2,.7,.2,1),transform .55s cubic-bezier(.2,.7,.2,1);
}
#ee-rfa .rfa-shot.on{opacity:1;transform:scale(1)}
/* phones: no pinning - stacked story, image inside each card */
@media(max-width:960px){
  #ee-rfa{padding:40px 0 26px}
  #ee-rfa .rfa-track{height:auto}
  #ee-rfa .rfa-pin{position:static;height:auto;overflow:visible;display:block}
  #ee-rfa .rfa-in{grid-template-columns:1fr;gap:0;padding:0 18px}
  #ee-rfa .rfa-stage,#ee-rfa .rfa-rail{display:none}
  #ee-rfa .rfa-card{margin-bottom:12px;padding:14px 14px;background:rgba(255,255,255,.85)}
  #ee-rfa .rfa-card.mi{opacity:1;transform:none}
  #ee-rfa .rfa-card .rfa-body{max-height:none;opacity:1}
  #ee-rfa .rfa-cardimg{display:block}
  #ee-rfa .rfa-cardimg img{width:100%;height:auto;border-radius:12px;border:1px solid rgba(25,52,93,.1);box-shadow:0 16px 36px -20px rgba(25,52,93,.3)}
  #ee-rfa .rfa-chips span{font-size:10.5px;padding:5px 9px}
}
@media(prefers-reduced-motion:reduce){#ee-rfa .rfa-card,#ee-rfa .rfa-shot,#ee-rfa .rfa-body{transition:none!important}}
</style>
<section id="ee-rfa" aria-label="Respond first with AI agents - how ExtraaEdge wins admissions">
  <span class="rfa-orb o1" aria-hidden="true"></span>
  <span class="rfa-orb o2" aria-hidden="true"></span>
  <div class="rfa-track" id="rfaTrack">
  <div class="rfa-pin">
    <div class="rfa-in">
      <div class="rfa-rail" id="rfaRail" aria-hidden="true">
        <i class="rfa-fill" id="rfaFill"></i>
        <button type="button" class="rfa-dot on" data-i="0" aria-label="Story 1"></button>
        <button type="button" class="rfa-dot" data-i="1" aria-label="Story 2"></button>
        <button type="button" class="rfa-dot" data-i="2" aria-label="Story 3"></button>
        <button type="button" class="rfa-dot" data-i="3" aria-label="Story 4"></button>
      </div>
      <div class="rfa-cards" id="rfaCards">
      <article class="rfa-card on" data-i="0" tabindex="0">
        <span class="rfa-kick">Decrease response time</span>
        <h2 class="rfa-title">Respond First Using AI Agents. Win Admissions.</h2>
        <div class="rfa-body">
          <p>Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation and conversion. ExtraaEdge brings all admission inquiries into one Admission CRM. AI-powered calling and intelligent routing ensure every prospect is contacted at the right moment - so counselors engage the right students faster and close more enrollments.</p>
          <b class="rfa-chiplbl">Unified Lead Ingestion Across</b>
          <div class="rfa-chips"><span>Ads Integration</span><span>Forms Integration</span><span>Third-Party Publisher Integration</span><span>AI Calling &amp; IVR Integration</span></div>
          <figure class="rfa-cardimg"><img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Integration%20Hub%20Flowchart.png" alt="Integration hub - every admission inquiry flows into one CRM" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      <article class="rfa-card" data-i="1" tabindex="0">
        <span class="rfa-kick">Boost conversion rates</span>
        <h2 class="rfa-title">AI Decides the Right Admission Engagements.</h2>
        <div class="rfa-body">
          <p>ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who to engage, when to engage, and how to engage across channels. Every interaction is timely, relevant, and context-aware. Admissions teams move away from manual follow-ups and generic messaging - AI-guided engagements adapt in real time and drive higher enrollments.</p>
          <b class="rfa-chiplbl">Engagement Channels</b>
          <div class="rfa-chips"><span>Trigger-Based Email &amp; SMS</span><span>AI Calling &amp; Click-to-Call</span><span>VidyaGPT - AI-Based 24&times;7 Admission Agents</span><span>WhatsApp Communication</span></div>
          <figure class="rfa-cardimg"><img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Omnichannel%20Conversion%20Dashboard.png" alt="Omnichannel conversion dashboard" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      <article class="rfa-card" data-i="2" tabindex="0">
        <span class="rfa-kick">Convert more</span>
        <h2 class="rfa-title">Turn Enquiries Into Enrollments</h2>
        <div class="rfa-body">
          <p>Not every enquiry deserves the same attention. ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward - the result is higher efficiency and stronger enrollment conversions.</p>
          <b class="rfa-chiplbl">Powered by Intelligent Prioritization</b>
          <div class="rfa-chips"><span>Prediction Score</span><span>Next Best Action</span><span>Follow-Up Calendar</span><span>Multi-Funnel Stages</span></div>
          <figure class="rfa-cardimg"><img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Admissions%20CRM%20Dashboard%20Overview.png" alt="Admissions CRM dashboard overview" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      <article class="rfa-card" data-i="3" tabindex="0">
        <span class="rfa-kick">Measure your efforts</span>
        <h2 class="rfa-title">Know What&rsquo;s Working. Fix What&rsquo;s Not.</h2>
        <div class="rfa-body">
          <p>Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance. Track counselors, campaigns, and lead sources in one place. With Analytics Builder and VidyaGPT Analytics, insights are easier to explore and understand - so teams act faster on what&rsquo;s working and fix what&rsquo;s not.</p>
          <b class="rfa-chiplbl">Analytics &amp; Visibility Across</b>
          <div class="rfa-chips"><span>VidyaGPT Analytics + Analytics Builder</span><span>Counselor Dashboard</span><span>Custom Dashboards</span><span>Marketing Dashboard</span><span>Publisher Reports</span></div>
          <figure class="rfa-cardimg"><img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Dashboard%20analytics%20overview.png" alt="Dashboard analytics overview" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      </div>
      <div class="rfa-stage" id="rfaStage" aria-hidden="true">
        <div class="rfa-frame">
          <div class="rfa-chrome"><i></i><i></i><i></i><span id="rfaUrl">app.extraaedge.com &middot; decrease response time</span></div>
          <div class="rfa-shots">
      <img class="rfa-shot on" data-i="0" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Integration%20Hub%20Flowchart.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
      <img class="rfa-shot" data-i="1" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Omnichannel%20Conversion%20Dashboard.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
      <img class="rfa-shot" data-i="2" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Admissions%20CRM%20Dashboard%20Overview.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
      <img class="rfa-shot" data-i="3" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Dashboard%20analytics%20overview.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
        </div>
        <div class="rfa-foot"><b id="rfaCap">Respond First Using AI Agents. Win Admissions.</b><span id="rfaCount">01 / 04</span></div>
      </div>
    </div>
  </div>
  </div>
</section>
<script>
(function(){
  var sec=document.getElementById('ee-rfa'); if(!sec) return;
  var track=document.getElementById('rfaTrack');
  var cards=[].slice.call(sec.querySelectorAll('.rfa-card'));
  var shots=[].slice.call(sec.querySelectorAll('.rfa-shot'));
  var dots=[].slice.call(sec.querySelectorAll('.rfa-dot'));
  var fill=document.getElementById('rfaFill'),
      cap=document.getElementById('rfaCap'),
      cnt=document.getElementById('rfaCount'),
      urlEl=document.getElementById('rfaUrl');
  var mqd=window.matchMedia('(min-width:961px)');
  var cur=0;
  function render(i){
    cur=i;
    cards.forEach(function(c,j){ c.classList.toggle('on',j===i); });
    shots.forEach(function(s,j){ s.classList.toggle('on',j===i); });
    dots.forEach(function(d,j){ d.classList.toggle('on',j===i); });
    var t=cards[i].querySelector('.rfa-title'), k=cards[i].querySelector('.rfa-kick');
    if(cap&&t) cap.textContent=t.textContent;
    if(cnt) cnt.textContent='0'+(i+1)+' / 0'+cards.length;
    if(urlEl&&k) urlEl.textContent='app.extraaedge.com \u00b7 '+k.textContent.toLowerCase();
    reveal(i); setTimeout(function(){ reveal(cur); },620);
  }
  /* keep the active card fully visible inside the scrollable card column -
     without this, the expanded body of the last stories clips at the
     pinned box's bottom edge on shorter screens */
  var cardsBox=document.getElementById('rfaCards');
  function reveal(i){
    if(!cardsBox||!mqd.matches) return;
    var cr=cards[i].getBoundingClientRect(), br=cardsBox.getBoundingClientRect();
    var d=0;
    if(cr.bottom>br.bottom) d=cr.bottom-br.bottom+6;
    else if(cr.top<br.top) d=cr.top-br.top-6;
    if(d) cardsBox.scrollTo({top:cardsBox.scrollTop+d,behavior:'smooth'});
  }
  /* one-time fade-in reveal (desktop stagger) + per-card reveal on phones */
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ sec.classList.add('rfa-rev'); io.disconnect(); } }); },{threshold:.15});
    io.observe(sec);
    var mio=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('mi'); mio.unobserve(e.target); } }); },{threshold:.12});
    cards.forEach(function(c){ mio.observe(c); });
  } else { sec.classList.add('rfa-rev'); cards.forEach(function(c){ c.classList.add('mi'); }); }
  var ticking=false;
  function metrics(){
    var pin=track.querySelector('.rfa-pin');
    return { total: track.offsetHeight-(pin?pin.offsetHeight:window.innerHeight),
             top: track.getBoundingClientRect().top };
  }
  function upd(){
    ticking=false;
    if(!mqd.matches) return;
    var m=metrics();
    if(m.total<=0) return;
    var p=Math.min(1,Math.max(0,-m.top/m.total));
    if(fill) fill.style.height=(p*100)+'%';
    var i=Math.min(cards.length-1,Math.floor(p*cards.length+0.0001));
    if(i!==cur) render(i);
  }
  window.addEventListener('scroll',function(){ if(!ticking){ ticking=true; requestAnimationFrame(upd); } },{passive:true});
  window.addEventListener('resize',upd,{passive:true});
  /* click/keyboard on a card or rail dot scrolls the page to that story's
     position in the pinned track, so state and scroll stay in sync */
  function jumpTo(i){
    if(!mqd.matches){ render(i); return; }
    var m=metrics();
    if(m.total<=0){ render(i); return; }
    var trackTop=window.pageYOffset+m.top;
    var target=Math.round(trackTop+((i+0.5)/cards.length)*m.total);
    render(i);
    window.scrollTo({top:target,behavior:'smooth'});
  }
  cards.forEach(function(c,i){
    c.addEventListener('click',function(){ jumpTo(i); });
    c.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){ e.preventDefault(); jumpTo(i); } });
  });
  dots.forEach(function(d,i){ d.addEventListener('click',function(){ jumpTo(i); }); });
  render(0); upd();
})();
</script>


<!-- (removed) STORY 1 · THE REAL PROBLEM - empty shell cleaned up; content was superseded and removed earlier -->

<style>/* ===== AI Product-Led Experience: launch + full-screen overlay (all devices) ===== */
#ee-platform .eep-mlaunch{display:none;}#ee-platform .eep-close,#ee-platform .eep-mbook,#ee-platform .eep-expand{display:none;}/* ---- full-screen experience overlay - the window is relocated to <body> on
   open (escapes any transformed/contained ancestor so position:fixed maps to
   the real viewport) and these rules key off the window's own class ---- */
.eep-window.eep-launched{
  position:fixed!important;top:0;right:0;bottom:0;left:0;inset:0;z-index:2147483000;
  display:block!important;width:100vw;width:100dvw;height:100vh;height:100dvh;
  max-width:none;margin:0;border:0;border-radius:0;background:#0f203a;box-shadow:none;overflow:hidden;
}.eep-window.eep-launched .eep-bar{
  display:flex;align-items:center;gap:10px;height:56px;padding:0 clamp(12px,2vw,20px);
  background:#12243f;border-bottom:1px solid rgba(255,255,255,.08);border-radius:0;position:relative;z-index:2;
}.eep-window.eep-launched .eep-url{color:#aec0db;font-size:13px;}.eep-window.eep-launched .eep-frame{display:block;width:100%;height:calc(100% - 102px);border:0;border-radius:0;background:#fff;}.eep-window.eep-launched .eep-mbook{
  display:inline-flex;align-items:center;margin-left:auto;background:linear-gradient(135deg,#E8843F,#DE6E30);
  color:#fff;text-decoration:none;font-size:13px;font-weight:700;padding:9px 16px;border-radius:999px;white-space:nowrap;
}.eep-window.eep-launched .eep-close{
  display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;
  background:rgba(255,255,255,.14);color:#fff;border:0;font-size:15px;line-height:1;cursor:pointer;flex:0 0 auto;
}.eep-window.eep-launched .eep-expand{display:none !important;}html.eep-lock,body.eep-lock{overflow:hidden!important;overscroll-behavior:none;touch-action:none;}
body.eep-lock{position:fixed;left:0;right:0;width:100%;}
body.eep-lock::before{content:"";position:fixed;inset:0;background:rgba(9,17,30,.74);-webkit-backdrop-filter:blur(3px);backdrop-filter:blur(3px);z-index:2147482999;}

/* ---- desktop / tablet: keep the inline demo + a "Full screen" button ---- */
@media(min-width:861px){#ee-platform:not(.eep-launched) .eep-expand{
    display:inline-flex;align-items:center;gap:7px;margin-left:auto;cursor:pointer;
    background:rgba(25,52,93,.07);border:1px solid rgba(25,52,93,.14);color:#19345d;
    font-size:12.5px;font-weight:700;padding:6px 13px;border-radius:999px;transition:background .2s,color .2s,border-color .2s;
  }#ee-platform:not(.eep-launched) .eep-expand svg,#ee-platform:not(.eep-launched) .eep-expand img.eeimg{width:15px;height:15px;}#ee-platform:not(.eep-launched) .eep-expand:hover{background:rgba(222,110,48,.12);border-color:rgba(222,110,48,.32);color:#C45A20;}
}

/* ---- phones: hide the inline demo, offer a big launch card ---- */
@media(max-width:860px){#ee-platform .eep-window{display:none;}#ee-platform .eep-cta{display:none;}#ee-platform .eep-mlaunch{
    display:flex;align-items:center;gap:14px;width:100%;text-align:left;cursor:pointer;
    background:linear-gradient(135deg,#1b3255,#0f203a);color:#fff;border:0;border-radius:18px;
    padding:17px 18px;box-shadow:0 18px 40px -22px rgba(15,32,58,.75);-webkit-tap-highlight-color:transparent;
  }#ee-platform .eep-mlaunch:active{transform:scale(.99);}#ee-platform .eep-mlaunch-play{flex:0 0 auto;width:46px;height:46px;border-radius:50%;
    background:linear-gradient(135deg,#E8843F,#DE6E30);display:flex;align-items:center;justify-content:center;
    box-shadow:0 10px 22px -10px rgba(222,110,48,.8);}#ee-platform .eep-mlaunch-play svg,#ee-platform .eep-mlaunch-play img.eeimg{width:20px;height:20px;color:#fff;margin-left:2px;}#ee-platform .eep-mlaunch-tx{flex:1;min-width:0;}#ee-platform .eep-mlaunch-tx b{display:block;font-size:15.5px;font-weight:700;line-height:1.2;}#ee-platform .eep-mlaunch-tx i{display:block;font-style:normal;font-size:12.5px;color:#c0cee2;margin-top:3px;line-height:1.35;}#ee-platform .eep-mlaunch-arrow{flex:0 0 auto;color:#E8843F;}#ee-platform .eep-mlaunch-arrow svg,#ee-platform .eep-mlaunch-arrow img.eeimg{width:20px;height:20px;}/* when launched on a phone the window is relocated to <body> and full-screen (rules above) */
  .eep-window.eep-launched{display:block;}
  /* phones: bound the launched popup as a card and pin the close (X) to the
     top-right corner so it is always visible (Book button no longer hides it) */
  .eep-window.eep-launched{
    inset:0!important;top:0!important;right:0!important;bottom:0!important;left:0!important;
    width:100vw!important;width:100dvw!important;height:100vh!important;height:100dvh!important;
    border-radius:0!important;box-shadow:none!important;overflow:hidden!important;
  }
  .eep-window.eep-launched .eep-bar{padding-right:52px!important}
  .eep-window.eep-launched .eep-url{min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
  .eep-window.eep-launched .eep-mbook{font-size:12px!important;padding:7px 12px!important}
  .eep-window.eep-launched .eep-close{
    position:absolute!important;top:11px!important;right:11px!important;z-index:20!important;
    width:34px!important;height:34px!important;font-size:16px!important;
    background:rgba(15,32,58,.78)!important;box-shadow:0 4px 12px rgba(0,0,0,.35)!important;
  }
}

/* ---- floating module panel (Superleap-style): compact icon tiles overlapping
   the live demo window; clicking a tile switches the demo to that module's
   screen in place. On phones the same tiles become a swipeable pill strip
   and tapping opens the full-screen experience on that screen. ---- */
#ee-platform .eep-demo-wrap{position:relative}
#ee-platform .eep-mods{position:absolute;top:50%;right:-38px;z-index:6;width:96px;display:flex;flex-direction:column;background:#fff;border:1px solid #ECEFF4;border-radius:22px;box-shadow:0 2px 6px rgba(15,32,58,.05),0 34px 80px -30px rgba(15,32,58,.45);padding:14px 10px;transform:translate(28px,-50%);opacity:0;visibility:hidden;transition:transform .65s cubic-bezier(.22,1,.36,1),opacity .5s ease,visibility .5s}#ee-platform.eep-rail-in .eep-mods{transform:translate(0,-50%);opacity:1;visibility:visible}@media(max-width:860px){#ee-platform .eep-mods{position:static;transform:none!important;opacity:1!important;visibility:visible!important;width:auto;flex-direction:column;box-shadow:none;border:0;background:transparent;border-radius:0;padding:0;margin:0 0 14px}#ee-platform .eep-mods-grid{flex-direction:row;max-height:none;overflow-y:visible}#ee-platform .eep-mod .eep-mod-ic{width:auto;height:auto;border:0;background:transparent;box-shadow:none}#ee-platform .eep-mod.on .eep-mod-ic{border:0;background:transparent;box-shadow:none;color:#fff}#ee-platform .eep-mod-info{display:flex}}@media(max-width:1540px){#ee-platform .eep-mods{right:12px}}
html body #main-content #ee-platform .eep-mods-title{display:none!important}
#ee-platform .eep-mods-grid{display:flex;flex-direction:column;gap:13px;order:1;max-height:min(62vh,600px);overflow-y:auto;scrollbar-width:none}#ee-platform .eep-mods-grid::-webkit-scrollbar{display:none}
#ee-platform .eep-mod{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:5px;background:transparent;border:0;box-shadow:none;border-radius:0;padding:0;cursor:pointer;transition:border-color .18s,background .18s,transform .18s;-webkit-tap-highlight-color:transparent}
#ee-platform .eep-mod .eep-mod-ic{display:flex;align-items:center;justify-content:center;width:42px;height:42px;color:#19345d;background:#fff;border:1.4px solid #E7EBF1;border-radius:13px;box-shadow:0 1px 2px rgba(15,32,58,.05);transition:border-color .2s,background .2s,box-shadow .2s,transform .2s,color .2s}
#ee-platform .eep-mod .eep-mod-ic svg{width:19px;height:19px}
#ee-platform .eep-mod b{font-size:9.5px;font-weight:700;color:#334a68;line-height:1.15;text-align:center;transition:color .18s}
#ee-platform .eep-mod:hover .eep-mod-ic{border-color:#19345d;transform:translateY(-2px)}
#ee-platform .eep-mod.on .eep-mod-ic{border-color:#DE6E30;background:#FFF4EC;color:var(--orange-700,#B5551D);box-shadow:0 0 0 4px rgba(222,110,48,.13)}#ee-platform .eep-mod.on b{color:#19345d}
#ee-platform .eep-mod.on .eep-mod-ic,#ee-platform .eep-mod.on b{color:var(--orange-700,#B5551D)}
#ee-platform .eep-mods-head{display:flex;align-items:center;justify-content:center;order:2;margin:12px 0 0}
#ee-platform .eep-mods-head .eep-mods-title{margin:0!important;text-align:left}
#ee-platform .eep-tour{display:inline-flex;align-items:center;gap:5px;border:1px solid rgba(25,52,93,.18);background:#fff;color:#19345d;font:700 10.5px/1 'Inter',sans-serif;letter-spacing:.08em;text-transform:uppercase;padding:7px 11px;border-radius:999px;cursor:pointer;transition:background .2s,color .2s,border-color .2s}
#ee-platform .eep-tour svg{width:10px;height:10px}
#ee-platform .eep-tour:hover{border-color:rgba(222,110,48,.5);color:#C45A20}
#ee-platform .eep-tour.on{background:#19345d;border-color:#19345d;color:#fff}
#ee-platform .eep-mod-info{display:none;flex-direction:column;gap:3px;margin-top:11px;padding:10px 12px;border:1px solid rgba(25,52,93,.1);border-left:3px solid #DE6E30;border-radius:10px;background:#F8FAFC;animation:eepInfoIn .3s ease}
@keyframes eepInfoIn{from{opacity:0;transform:translateY(4px)}to{opacity:1;transform:none}}
#ee-platform .eep-mod-info b{font-size:12.5px;font-weight:800;color:#19345d}
#ee-platform .eep-mod-info span{font-size:11.5px;line-height:1.45;color:#5a6b85}
#ee-platform .eep-mod-info em{font-style:normal;font-size:11px;font-weight:700;color:#1FAF66}
#ee-platform .eep-mod-info em::before{content:"\2713  "}
#ee-platform .eep-mod-prog{display:none;position:relative;height:3px;margin-top:8px;border-radius:2px;background:rgba(25,52,93,.1);overflow:hidden}
#ee-platform .eep-mod-info.ticking .eep-mod-prog{display:block}
#ee-platform .eep-mod-info.ticking .eep-mod-prog::after{content:"";position:absolute;left:0;top:0;bottom:0;width:0;background:linear-gradient(90deg,#E8843F,#DE6E30);animation:eepTick 6s linear forwards}
@keyframes eepTick{to{width:100%}}
#ee-platform .eep-window{transition:box-shadow .4s ease}
#ee-platform .eep-window.eep-flash{box-shadow:0 0 0 3px rgba(222,110,48,.45),0 24px 60px -24px rgba(222,110,48,.35)}
/* overlay bottom module strip: switch screens without closing the experience */
.eep-ovnav{display:none;position:absolute;left:0;right:0;bottom:0;height:46px;z-index:15;background:#12243f;border-top:1px solid rgba(255,255,255,.1);overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch;white-space:nowrap;padding:7px 8px}
.eep-ovnav::-webkit-scrollbar{display:none}
.eep-window.eep-launched .eep-ovnav{display:block}
.eep-ovnav button{display:inline-flex;align-items:center;gap:5px;border:1px solid rgba(255,255,255,.18);background:rgba(255,255,255,.07);color:#cfdcf0;font:600 11.5px/1 'Inter',sans-serif;padding:8px 12px;border-radius:999px;margin-right:6px;cursor:pointer;white-space:nowrap}
.eep-ovnav button.on{background:#DE6E30;border-color:#DE6E30;color:#fff;font-weight:700}
@media(max-width:1240px){#ee-platform .eep-mods{}}
@media(max-width:860px){
  #ee-platform .eep-mods{position:static;width:auto;box-shadow:none;border:0;background:transparent;border-radius:0;padding:0;margin:0 0 14px}
  html body #main-content #ee-platform .eep-mods-title{text-align:left;margin-bottom:10px}
  #ee-platform .eep-mods-grid{display:flex;gap:8px;overflow-x:auto;padding-bottom:6px;scrollbar-width:none;-webkit-overflow-scrolling:touch}
  #ee-platform .eep-mods-grid::-webkit-scrollbar{display:none}
  #ee-platform .eep-mod{flex:none;flex-direction:row;gap:8px;padding:9px 14px;border-radius:999px;background:#fff;border:1px solid rgba(25,52,93,.16)}
  #ee-platform .eep-mod:hover{transform:none}
  #ee-platform .eep-mod .eep-mod-ic,#ee-platform .eep-mod .eep-mod-ic svg{width:14px;height:14px}
  #ee-platform .eep-mod b{white-space:nowrap;font-size:12px}
  #ee-platform .eep-tour{display:none}
  #ee-platform .eep-mod-info{margin-top:9px}
}
</style>

<section id="ee-platform" aria-label="Explore the ExtraaEdge platform">
  <div class="eep-wrap">
    <header class="eep-head">
      <h2>Explore the platform yourself - no sales call needed</h2>
      <p>An advanced, AI-powered interactive product experience. Click through the real Admission CRM - dashboards, AI, lead manager, WhatsApp &amp; automation. A guided tour walks you through it; click anywhere to take over. When you&rsquo;re ready, book a personalised demo on your own funnel.</p>
    </header>
    <div class="eep-demo-wrap">
    <aside class="eep-mods" aria-label="CRM modules - click to open that screen in the live demo">
      <div class="eep-mods-head">
        <h3 class="eep-mods-title">Every action, superpowered.</h3>
        <button type="button" class="eep-tour" id="eepTour" aria-pressed="false" title="Auto-play a tour of all modules"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 4l13 8-13 8V4z"/></svg><span id="eepTourN">Tour</span></button>
      </div>
      <div class="eep-mods-grid">
        <button type="button" class="eep-mod on" data-go="outcomes" data-url="/dashboards" data-info="Live funnel, source ROI and counsellor performance." data-gain="Decisions in minutes"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 20V10M10 20V4M16 20v-8M21 20H3"/></svg></span><b>Dashboards</b></button>
        <button type="button" class="eep-mod" data-go="ai" data-url="/vidya-ai" data-info="24x7 AI copilot - answers, scores intent, drafts follow-ups." data-gain="No enquiry waits"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/><path d="M19 15l.9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9L19 15z"/></svg></span><b>Vidya AI</b></button>
        <button type="button" class="eep-mod" data-go="leads" data-url="/leads" data-info="Every enquiry auto-captured and deduped on one timeline." data-gain="Zero leads lost"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="8" r="3.2"/><path d="M3.5 20a5.5 5.5 0 0 1 11 0M16 4.5a3.2 3.2 0 0 1 0 7M17.5 14.6a5.5 5.5 0 0 1 3 5.4"/></svg></span><b>Leads</b></button>
        <button type="button" class="eep-mod" data-go="wa" data-url="/whatsapp" data-info="Official WhatsApp - 1:1 and bulk, every message logged." data-gain="98% open rates"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16v10H9l-5 4V6z"/></svg></span><b>WhatsApp</b></button>
        <button type="button" class="eep-mod" data-go="followups" data-url="/follow-ups" data-info="Auto-built task list and SLA reminders per counsellor." data-gain="Nothing slips"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18M9 15.5l2 2 4-4"/></svg></span><b>Follow-ups</b></button>
        <button type="button" class="eep-mod" data-go="campaign" data-url="/campaigns" data-info="Segmented email, SMS and WhatsApp campaigns." data-gain="1:1 feel at scale"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l14-5v12L3 13v-2zM7 14v4a2 2 0 0 0 4 0v-2M17 8a4 4 0 0 1 0 6"/></svg></span><b>Campaigns</b></button>
        <button type="button" class="eep-mod" data-go="workflow" data-url="/workflows" data-info="No-code rules that assign, nurture and notify." data-gain="Runs itself"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/></svg></span><b>Workflows</b></button>
        <button type="button" class="eep-mod" data-go="rawdata" data-url="/data" data-info="Bulk-import, clean and re-verify lead data in-app." data-gain="Clean funnel"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><ellipse cx="12" cy="5.5" rx="8" ry="3"/><path d="M4 5.5V12c0 1.66 3.58 3 8 3s8-1.34 8-3V5.5M4 12v6.5c0 1.66 3.58 3 8 3s8-1.34 8-3V12"/></svg></span><b>Data</b></button>
        <button type="button" class="eep-mod" data-go="integration" data-url="/integrations" data-info="Meta, Google, portals, telephony and 50+ tools." data-gain="No manual imports"><span class="eep-mod-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="7" cy="7" r="3"/><circle cx="17" cy="17" r="3"/><path d="M10 7h7M7 10v7"/></svg></span><b>Integrations</b></button>
      </div>
      <div class="eep-mod-info" id="eepModInfo" aria-live="polite">
        <b id="eepModInfoName">Dashboards</b>
        <span id="eepModInfoTx">Live funnel, source ROI and counsellor performance.</span>
        <em id="eepModInfoGain">Decisions in minutes</em>
        <i class="eep-mod-prog" id="eepModProg" aria-hidden="true"></i>
      </div>
    </aside>
    <button type="button" class="eep-mlaunch" id="eepLaunch" aria-label="Open the interactive product experience">
      <span class="eep-mlaunch-play" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-01.svg" alt="" loading="lazy" decoding="async"></span>
      <span class="eep-mlaunch-tx"><b>Launch the live product experience</b><i>Tap to explore the AI Admission CRM - full screen</i></span>
      <span class="eep-mlaunch-arrow" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
    </button>
    <div class="eep-window">
      <div class="eep-bar"><span class="d r"></span><span class="d y"></span><span class="d g"></span><span class="eep-url">app.extraaedge.com</span><button type="button" class="eep-expand" id="eepExpand" aria-label="Open full screen"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-03.svg" alt="" loading="lazy" decoding="async"> Full screen</button><a class="eep-mbook" href="https://www.extraaedge.com/book-a-demo/">Book now</a><button type="button" class="eep-close" id="eepClose" aria-label="Close experience">&#10005;</button></div>
      <iframe class="eep-frame" title="ExtraaEdge - Lead Management Platform (interactive demo)" id="eepFrame" loading="lazy" sandbox="allow-scripts allow-same-origin allow-popups allow-forms" data-srcdoc="<!DOCTYPE html>
<html lang=&quot;en&quot;>
<head>
<meta charset=&quot;UTF-8&quot; />
<meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0, viewport-fit=cover&quot; />
<title>Laxmi | Lead Management Platform - ExtraaEdge (Interactive Replica)</title>
<meta name=&quot;description&quot; content=&quot;Fully functional, all-device-friendly interactive replica of the ExtraaEdge (Laxmi) Lead Management Platform - every module from the reference screenshots.&quot; />
<link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot; />
<link rel=&quot;preconnect&quot; href=&quot;https://fonts.gstatic.com&quot; crossorigin />
<link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap&quot; rel=&quot;stylesheet&quot; media=&quot;print&quot; onload=&quot;this.media='all'&quot; />
<style>:root{
  --o:#f47b20; --o-d:#dc6912; --o-soft:#fdeede; --o-soft2:#fff5ec; --o-line:#f6c9a3;
  --nav:#1f3a63; --nav-2:#2a4a7a; --ink:#2b3445; --mut:#6b7589; --dim:#94a0b4;
  --line:#e6e9ef; --line-2:#dce1ea; --paper:#f4f5f7; --white:#fff; --head:#3a4256;
  --grn:#2faf6a; --grn-soft:#e7f7ee; --red:#e0564a; --blue:#2f74d0;
  --f1:#f47b20; --f2:#f1c40f; --f3:#48b3a0; --f4:#7ed09a; --f5:#1f6fb2; --f6:#e87b6b; --f7:#f4e08a;
  --sb:248px; --top:58px;
  --sh:0 1px 3px rgba(25,40,70,.07),0 1px 2px rgba(25,40,70,.04);
  --sh-md:0 8px 28px -12px rgba(25,40,70,.28);
  --f:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;
}*{box-sizing:border-box;margin:0;padding:0}html,body{height:100%}body{font-family:var(--f);color:var(--ink);background:var(--paper);font-size:14px;-webkit-font-smoothing:antialiased;overflow:hidden}button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit}a{color:inherit;text-decoration:none}::-webkit-scrollbar{width:9px;height:9px}::-webkit-scrollbar-thumb{background:#c9d0db;border-radius:9px;border:2px solid var(--paper)}::-webkit-scrollbar-thumb:hover{background:#b3bccb}.app{display:grid;grid-template-columns:var(--sb) 1fr;grid-template-rows:var(--top) 1fr;
  grid-template-areas:&quot;brand top&quot; &quot;side main&quot;;height:100vh;height:100dvh}.brand{grid-area:brand;display:flex;align-items:center;gap:10px;padding:0 14px;border-bottom:1px solid var(--line);border-right:1px solid var(--line);background:var(--white)}.brand .logo{display:flex;align-items:center;gap:9px;font-weight:800;font-size:19px;letter-spacing:-.02em}.brand .logo-img{height:30px;width:auto;display:block}.brand .logo .gx{display:flex;gap:2px}.brand .logo .gx i{width:13px;height:13px;border-radius:3px;display:block}.brand .logo .gx i:nth-child(1){background:var(--o)}.brand .logo .gx i:nth-child(2){background:var(--nav)}.brand .logo b{color:var(--nav);font-weight:800}.brand .logo b em{color:var(--o);font-style:normal}.brand .burger{margin-left:auto;display:none;width:34px;height:34px;border-radius:8px;align-items:center;justify-content:center;color:var(--nav)}.brand .burger:hover{background:var(--paper)}.top{grid-area:top;display:flex;align-items:center;gap:14px;padding:0 18px;background:var(--white);border-bottom:1px solid var(--line);position:relative;z-index:20}.search{display:flex;align-items:center;background:var(--white);border:1px solid var(--line-2);border-radius:7px;height:36px;max-width:520px;flex:1}.search .gsel{display:flex;align-items:center;gap:5px;padding:0 11px;height:100%;border-right:1px solid var(--line);color:var(--nav);font-weight:600;font-size:12.5px;white-space:nowrap}.search .gsel svg,.search .gsel img.eeimg{width:12px;height:12px}.search input{flex:1;min-width:0;border:0;outline:0;background:transparent;font-family:inherit;font-size:13px;padding:0 11px;color:var(--ink)}.search input::placeholder{color:var(--dim)}.search .mag{padding:0 12px;color:var(--dim)}.search .mag svg,.search .mag img.eeimg{width:15px;height:15px;display:block}.top .acts{margin-left:auto;display:flex;align-items:center;gap:16px}.iconbtn{position:relative;color:var(--nav);display:flex;align-items:center;justify-content:center;width:30px;height:30px;border-radius:8px}.iconbtn:hover{background:var(--paper)}.iconbtn svg,.iconbtn img.eeimg{width:19px;height:19px}.iconbtn .dot{position:absolute;top:-3px;right:-4px;background:#e23b3b;color:#fff;font-size:9px;font-weight:700;line-height:1;border-radius:999px;padding:2px 4px;min-width:15px;text-align:center}.top .timer{display:flex;align-items:center;gap:6px;color:var(--mut);font-size:12.5px;font-weight:600;font-variant-numeric:tabular-nums}.top .timer svg,.top .timer img.eeimg{width:14px;height:14px}.avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#e2603a,#c0421f);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;border:2px solid #fff;box-shadow:0 0 0 1px var(--line-2)}.side{grid-area:side;background:var(--white);border-right:1px solid var(--line);overflow-y:auto;overflow-x:hidden;display:flex;flex-direction:column;padding:8px 0}.side>.nav,.side>.submenu,.side>.ticket,.side .subnav{flex-shrink:0}.nav{display:flex;align-items:center;gap:12px;padding:8px 18px;font-size:13.5px;font-weight:500;color:#56607a;width:100%;text-align:left;border-left:3px solid transparent;transition:background .15s,color .15s}.nav:hover{background:#fafbfc;color:var(--nav)}.nav.on{background:var(--o-soft);color:var(--o-d);font-weight:600;border-left-color:var(--o)}.nav svg,.nav img.eeimg{width:18px;height:18px;flex:none;stroke-width:1.8}.nav .cnt{margin-left:auto;background:var(--grn);color:#fff;font-size:10px;font-weight:700;border-radius:999px;min-width:18px;height:18px;display:flex;align-items:center;justify-content:center;padding:0 5px}.nav .chev{margin-left:auto;transition:transform .2s}.nav .chev svg,.nav .chev img.eeimg{width:14px;height:14px}.nav.exp .chev{transform:rotate(90deg)}.submenu{overflow:hidden;max-height:0;transition:max-height .28s ease}.submenu.open{max-height:320px}.subnav{display:flex;align-items:center;gap:10px;padding:7px 18px 7px 46px;font-size:12.5px;color:#697389;width:100%;text-align:left;border-left:3px solid transparent;transition:background .15s,color .15s}.subnav:hover{background:#fafbfc;color:var(--nav)}.subnav.on{color:var(--o-d);font-weight:600;background:var(--o-soft2);border-left-color:var(--o)}.subnav i{width:5px;height:5px;border-radius:50%;background:currentColor;opacity:.45;flex:none}.side .spacer{flex:1}.side .ticket{display:flex;align-items:center;gap:11px;padding:13px 18px;border-top:1px solid var(--line);color:var(--nav);font-weight:600;font-size:13px}.side .ticket svg,.side .ticket img.eeimg{width:17px;height:17px}.side .ticket:hover{background:#fafbfc}.scrim{position:fixed;inset:0;background:rgba(20,30,50,.4);z-index:40;opacity:0;visibility:hidden;transition:opacity .25s}.scrim.show{opacity:1;visibility:visible}.main{grid-area:main;overflow-y:auto;overflow-x:hidden;background:var(--paper);position:relative}.view{display:none;padding:20px 26px 60px;animation:fade .3s ease;min-height:100%}.view.on{display:block}
@keyframes fade{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}.vhead{display:flex;align-items:center;gap:14px;margin-bottom:16px;flex-wrap:wrap}.vhead h2{font-size:20px;font-weight:700;color:var(--head)}.vhead h2 .back{margin-right:8px;color:var(--mut);cursor:pointer}.vhead .right{margin-left:auto;display:flex;align-items:center;gap:10px;flex-wrap:wrap}.btn{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;border-radius:7px;padding:9px 15px;border:1px solid var(--line-2);background:#fff;color:var(--nav);transition:.15s}.btn:hover{border-color:var(--o-line);color:var(--o-d)}.btn.pri{background:var(--o);border-color:var(--o);color:#fff}.btn.pri:hover{background:var(--o-d);color:#fff}.btn svg,.btn img.eeimg{width:14px;height:14px}.ctrls{display:flex;align-items:center;gap:11px;margin-bottom:16px;flex-wrap:wrap}.ctrls .filtbtn{width:34px;height:34px;border-radius:7px;border:1px solid var(--line-2);background:#fff;color:var(--o);display:flex;align-items:center;justify-content:center}.ctrls .filtbtn svg,.ctrls .filtbtn img.eeimg{width:15px;height:15px}.ctrls .right{margin-left:auto;display:flex;align-items:center;gap:11px;flex-wrap:wrap}.synced{display:inline-flex;align-items:center;gap:7px;background:var(--o-soft);border:1px solid var(--o-line);color:var(--o-d);font-size:11.5px;font-weight:600;border-radius:7px;padding:7px 11px}.synced svg,.synced img.eeimg{width:14px;height:14px}.synced u{text-decoration:underline;cursor:pointer}.select,.daterange{display:inline-flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line-2);border-radius:7px;padding:8px 12px;font-size:12.5px;color:var(--ink);min-width:170px;justify-content:space-between;cursor:pointer}.select svg,.select img.eeimg,.daterange svg,.daterange img.eeimg{width:13px;height:13px;color:var(--mut)}.daterange{color:var(--o-d);font-weight:600;min-width:auto}.daterange .ar{color:var(--grn)}.statcards{display:flex;gap:16px;flex-wrap:wrap;margin-bottom:18px}.statcard{background:#fff;border-radius:8px;box-shadow:var(--sh);min-width:260px;flex:0 1 320px;overflow:hidden;border-bottom:3px solid var(--nav)}.statcard .h{display:flex;align-items:center;gap:8px;padding:13px 16px 4px;font-weight:700;color:var(--head);font-size:14px}.statcard .h .rf{margin-left:auto;color:var(--o);cursor:pointer}.statcard .h .rf svg,.statcard .h .rf img.eeimg{width:14px;height:14px;display:block}.statcard .rows{padding:6px 16px 16px}.statcard .r{display:flex;justify-content:space-between;align-items:baseline;padding:7px 0;font-size:13px;color:var(--mut)}.statcard .r b{color:var(--ink);font-weight:700;font-size:14px;font-variant-numeric:tabular-nums}.statcard .r.big b{font-size:26px;font-weight:800;color:var(--nav)}.statcard.two .grid{display:grid;grid-template-columns:1fr 1fr;gap:2px 22px;padding:6px 16px 16px}.tabbar{display:flex;border-bottom:1px solid var(--line);overflow-x:auto;scrollbar-width:none;background:#fff;border-radius:8px 8px 0 0}.tabbar::-webkit-scrollbar{display:none}.tab{flex:none;padding:13px 22px;font-size:13px;font-weight:600;color:var(--mut);border-bottom:3px solid transparent;white-space:nowrap;transition:.15s}.tab:hover{color:var(--nav)}.tab.on{color:var(--o-d);border-bottom-color:var(--o)}.subtabbar{display:flex;background:#fff;border:1px solid var(--line);border-top:0;overflow-x:auto;scrollbar-width:none}.subtabbar::-webkit-scrollbar{display:none}.subtab{flex:1;min-width:150px;padding:13px 16px;font-size:12.5px;font-weight:600;color:var(--mut);text-align:center;border-right:1px solid var(--line);position:relative;white-space:nowrap}.subtab:last-child{border-right:0}.subtab.on{color:var(--o-d)}.subtab.on::after{content:&quot;&quot;;position:absolute;left:0;right:0;bottom:0;height:3px;background:var(--o)}.panel{background:#fff;border:1px solid var(--line);border-top:0;border-radius:0 0 8px 8px;padding:18px}.panel .toolbar{display:flex;justify-content:flex-end;gap:14px;color:var(--mut);margin-bottom:6px}.panel .toolbar svg,.panel .toolbar img.eeimg{width:16px;height:16px;cursor:pointer}.panel .toolbar svg:hover,.panel .toolbar img.eeimg:hover{color:var(--o)}.funnel-wrap{display:flex;gap:24px;align-items:flex-start;flex-wrap:wrap}.funnel{flex:1;min-width:280px}.funnel .total{font-size:30px;font-weight:800;color:var(--nav);margin-bottom:10px}.fbar{height:34px;margin:0 auto;display:flex;align-items:center;justify-content:center;color:#fff;font-size:12px;font-weight:700;clip-path:polygon(0 0,100% 0,96% 100%,4% 100%);transition:width .8s cubic-bezier(.2,.8,.2,1)}.legend{display:flex;flex-direction:column;gap:9px;min-width:170px}.legend .li{display:flex;align-items:center;gap:9px;font-size:12.5px;color:var(--mut)}.legend .li i{width:11px;height:11px;border-radius:3px;flex:none}.legend .li b{margin-left:auto;color:var(--ink);font-weight:700}.tbl-wrap{overflow-x:auto;border:1px solid var(--line);border-radius:7px}table.tbl{width:100%;border-collapse:collapse;font-size:12.5px;min-width:560px}table.tbl thead th{background:#8b93a5;color:#fff;font-weight:600;text-align:left;padding:12px 14px;white-space:nowrap;position:sticky;top:0}table.tbl thead th.num,table.tbl td.num{text-align:right;font-variant-numeric:tabular-nums}table.tbl tbody td{padding:11px 14px;border-bottom:1px solid var(--line);color:var(--ink);white-space:nowrap}table.tbl tbody tr:nth-child(even){background:#fafbfc}table.tbl tbody tr:hover{background:var(--o-soft2)}table.tbl tbody tr.tot{font-weight:700;background:#f1f3f7}table.tbl tbody tr.tot:hover{background:#f1f3f7}table.tbl tr.hl{background:var(--o-soft)!important}table.tbl .exp{color:var(--mut);cursor:pointer;user-select:none;margin-right:5px;display:inline-block;width:12px}table.tbl .ind{display:inline-block}.badge{font-size:10.5px;font-weight:700;border-radius:5px;padding:3px 9px;white-space:nowrap}.badge.done{background:#2b3445;color:#fff}.badge.draft{background:#fff;color:var(--mut);border:1px solid var(--line-2)}.badge.green{display:inline-flex;align-items:center;gap:5px;background:var(--grn-soft);color:var(--grn);border:1px solid #bfe8d1}.badge.green::before{content:&quot;&quot;;width:6px;height:6px;border-radius:50%;background:var(--grn)}.actcell{display:flex;gap:10px;color:var(--o)}.actcell svg,.actcell img.eeimg{width:16px;height:16px;cursor:pointer}.actcell .del{color:var(--red)}.toggle{width:34px;height:18px;border-radius:999px;background:var(--o);position:relative;display:inline-block;cursor:pointer}.toggle::after{content:&quot;&quot;;position:absolute;top:2px;right:2px;width:14px;height:14px;border-radius:50%;background:#fff;transition:.2s}.toggle.off{background:#c9d0db}.toggle.off::after{right:auto;left:2px}.pager{display:flex;align-items:center;justify-content:center;gap:5px;margin-top:16px;color:var(--mut);font-size:12.5px}.pager button{width:28px;height:28px;border-radius:6px;border:1px solid var(--line-2);background:#fff;color:var(--mut);font-weight:600}.pager button.on{background:var(--o);border-color:var(--o);color:#fff}.pager button:hover:not(.on){border-color:var(--o-line);color:var(--o-d)}.lm-tabs{display:flex;gap:2px;border-bottom:2px solid var(--line);overflow-x:auto;scrollbar-width:none;margin-bottom:14px}.lm-tabs::-webkit-scrollbar{display:none}.lm-tab{flex:none;padding:11px 16px;font-size:12.5px;font-weight:600;color:var(--mut);border-bottom:3px solid transparent;margin-bottom:-2px;white-space:nowrap;border-radius:6px 6px 0 0;transition:.15s}.lm-tab:hover{background:#fff;color:var(--nav)}.lm-tab.on{color:#fff;background:var(--o);border-bottom-color:var(--o-d)}.lm-pill{border:1px solid var(--line-2);background:#fff;border-radius:7px;padding:8px 14px;font-size:12.5px;font-weight:600;color:var(--nav)}.lm-pill:hover{border-color:var(--o-line);color:var(--o-d)}.lm-toolbar{display:flex;align-items:center;justify-content:flex-end;gap:4px;margin-bottom:12px;flex-wrap:wrap}.lm-toolbar .tb{width:32px;height:32px;border-radius:7px;display:flex;align-items:center;justify-content:center;color:var(--o);background:var(--o-soft2);border:1px solid var(--o-line)}.lm-toolbar .tb.plain{color:var(--mut);background:#fff;border-color:var(--line-2)}.lm-toolbar .tb:hover{background:var(--o);color:#fff}.lm-toolbar .tb svg,.lm-toolbar .tb img.eeimg{width:15px;height:15px}.lm-sort{display:flex;align-items:center;gap:6px;color:var(--o);font-weight:600;font-size:12.5px;margin:0 auto 12px 0;cursor:pointer}.lm-sort svg,.lm-sort img.eeimg{width:15px;height:15px}.lead{background:#fff;border:1px solid var(--line);border-radius:8px;margin-bottom:12px;box-shadow:var(--sh);overflow:hidden}.lead-head{display:flex;align-items:center;gap:14px;padding:14px 16px;cursor:pointer}.lead-head .chk{width:17px;height:17px;border:1.5px solid var(--line-2);border-radius:4px;flex:none}.lead-head .name{min-width:160px}.lead-head .name b{font-weight:700;color:var(--nav);font-size:14px;display:flex;align-items:center;gap:7px}.lead-head .name b .ct{background:var(--o-soft);color:var(--o-d);border:1px solid var(--o-line);border-radius:999px;font-size:10px;padding:1px 7px;font-weight:700}.lead-head .name span{color:var(--mut);font-size:12px}.lead-head .status{margin:0 auto}.lead-head .status .s1{background:#2b3445;color:#fff;font-size:11px;font-weight:600;padding:4px 12px;border-radius:4px 4px 0 0;display:block;text-align:center}.lead-head .status .s2{background:var(--o-soft);color:var(--o-d);font-size:11px;font-weight:600;padding:3px 12px;border-radius:0 0 4px 4px;display:block;text-align:center;border:1px solid var(--o-line);border-top:0}.lead-head .metrics{display:flex;align-items:center;gap:14px;color:var(--mut);font-size:12px}.lead-head .metrics .m{display:flex;align-items:center;gap:5px}.lead-head .metrics .m svg,.lead-head .metrics .m img.eeimg{width:15px;height:15px}.lead-head .viewall{color:var(--o);font-weight:600;font-size:12px}.lead-head .kebab,.lead-head .caret{color:var(--mut);display:flex;align-items:center}.lead-head .kebab svg,.lead-head .kebab img.eeimg,.lead-head .caret svg,.lead-head .caret img.eeimg{width:17px;height:17px}.lead-head .caret{transition:transform .25s}.lead.open .lead-head .caret{transform:rotate(180deg)}.lead-body{max-height:0;overflow:hidden;transition:max-height .35s ease}.lead.open .lead-body{border-top:1px solid var(--line)}.lead-subtabs{display:flex;gap:22px;padding:12px 18px 0;border-bottom:1px solid var(--line);overflow-x:auto;scrollbar-width:none}.lead-subtabs::-webkit-scrollbar{display:none}.lead-subtab{padding:8px 2px 11px;font-size:12.5px;font-weight:600;color:var(--mut);border-bottom:2px solid transparent;white-space:nowrap}.lead-subtab.on{color:var(--nav);border-bottom-color:var(--o)}.lead-fields{display:grid;grid-template-columns:repeat(4,1fr);gap:18px 24px;padding:18px}.field .l{font-size:10.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--dim);margin-bottom:4px}.field .v{font-size:13px;color:var(--ink);font-weight:500}.field .v.link{color:var(--blue)}.field .v.rmk{color:var(--o-d);text-decoration:underline;cursor:pointer}.wa-list{background:#fff;border:1px solid var(--line);border-radius:8px;box-shadow:var(--sh);overflow:hidden}.wa-row{display:flex;align-items:center;gap:16px;padding:15px 18px;border-bottom:1px solid var(--line)}.wa-row:last-child{border-bottom:0}.wa-row:hover{background:var(--o-soft2)}.wa-row .chk{width:16px;height:16px;border:1.5px solid var(--line-2);border-radius:4px;flex:none}.wa-row .nm{min-width:190px;flex:1}.wa-row .nm b{display:block;font-weight:700;color:var(--nav);font-size:13.5px}.wa-row .nm span{font-size:12px;color:var(--mut)}.wa-row .st{min-width:150px}.wa-row .st .a{background:#2b3445;color:#fff;font-size:10.5px;font-weight:600;padding:3px 10px;border-radius:4px 4px 0 0;display:block;text-align:center}.wa-row .st .b{background:var(--o-soft);color:var(--o-d);font-size:10.5px;font-weight:600;padding:2px 10px;border-radius:0 0 4px 4px;display:block;text-align:center;border:1px solid var(--o-line);border-top:0}.wa-row .links{display:flex;gap:14px;color:var(--o);font-size:12px;font-weight:600;white-space:nowrap}.wa-row .links span{display:inline-flex;align-items:center;gap:5px;cursor:pointer}.wa-row .links svg,.wa-row .links img.eeimg{width:14px;height:14px}.wa-row .ic{display:flex;gap:12px;color:var(--o-d)}.wa-row .ic svg,.wa-row .ic img.eeimg{width:16px;height:16px;cursor:pointer}.wa-row .caret svg,.wa-row .caret img.eeimg{width:16px;height:16px;color:var(--mut)}
@media(max-width:760px){.wa-row .links,.wa-row .st{display:none}}.fu-grid{display:grid;grid-template-columns:1fr 300px;gap:18px;align-items:start}.cal{background:#fff;border:1px solid var(--line);border-radius:10px;box-shadow:var(--sh);padding:14px;position:sticky;top:0}.cal .ch{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;font-weight:700;color:var(--nav);font-size:13.5px}.cal .ch button{color:var(--mut);font-size:16px;padding:2px 6px}.cal .grid{display:grid;grid-template-columns:repeat(7,1fr);gap:3px;text-align:center}.cal .dow{font-size:10px;font-weight:700;color:var(--dim);padding:5px 0}.cal .d{font-size:12px;color:var(--ink);padding:7px 0;border-radius:7px;cursor:pointer}.cal .d:hover{background:var(--o-soft2)}.cal .d.mut{color:var(--dim)}.cal .d.on{background:var(--o);color:#fff;font-weight:700}.cal .d.dot{position:relative}.cal .d.dot::after{content:&quot;&quot;;position:absolute;bottom:3px;left:50%;transform:translateX(-50%);width:4px;height:4px;border-radius:50%;background:var(--o)}.cal .fhd{display:flex;align-items:center;gap:8px;font-weight:700;color:var(--nav);font-size:13px;margin-bottom:8px}
@media(max-width:980px){.fu-grid{grid-template-columns:1fr}.cal{position:static;order:-1}}.set-sec{margin-bottom:22px;max-width:620px}.set-sec .h{display:flex;align-items:center;gap:9px;font-weight:700;color:var(--head);font-size:14px;margin-bottom:10px}.set-sec .h svg,.set-sec .h img.eeimg{width:18px;height:18px;color:var(--mut)}.set-card{display:flex;align-items:center;justify-content:space-between;background:#fff;border:1px solid var(--line);border-radius:9px;padding:16px 18px;box-shadow:var(--sh);font-weight:600;color:var(--nav);cursor:pointer;transition:.15s}.set-card:hover{border-color:var(--o-line);box-shadow:var(--sh-md)}.set-card svg,.set-card img.eeimg{width:17px;height:17px;color:var(--mut)}.wf-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.wf-card{display:flex;gap:18px;background:#fff;border:1px solid var(--line);border-radius:12px;overflow:hidden;cursor:pointer;transition:.15s}.wf-card:hover{border-color:var(--o-line);box-shadow:var(--sh-md)}.wf-prev{flex:none;width:170px;background:var(--o-soft2);border-right:1px solid var(--o-line);padding:16px 14px;display:flex;flex-direction:column;gap:10px;justify-content:center}.wf-node{background:#fff;border:1px solid var(--line-2);border-radius:7px;padding:8px 10px;font-size:10px}.wf-info{padding:18px 18px 18px 0;flex:1}.wf-info h4{font-size:15px;font-weight:700;color:var(--nav);margin-bottom:9px}.wf-info ul{list-style:none;display:flex;flex-direction:column;gap:7px}.wf-info li{font-size:12.5px;color:var(--mut);line-height:1.5;padding-left:16px;position:relative}.wf-info li::before{content:&quot;•&quot;;position:absolute;left:3px;color:var(--o);font-weight:800}
@media(max-width:1024px){.wf-grid{grid-template-columns:1fr}}
@media(max-width:520px){.wf-card{flex-direction:column}.wf-prev{width:auto;flex-direction:row;border-right:0;border-bottom:1px solid var(--o-line)}}.int-stats{display:flex;gap:18px;flex-wrap:wrap;margin-bottom:16px}.int-stat{flex:1;min-width:200px;background:#fff;border:1px solid var(--line);border-radius:9px;box-shadow:var(--sh);padding:18px 20px}.int-stat .l{font-size:12.5px;color:var(--dim);margin-bottom:8px}.int-stat .v{font-size:30px;font-weight:800;color:var(--nav)}.int-stat.pub .v{color:var(--blue)}.int-stat.unp .v{color:var(--red)}.int-bar{display:flex;justify-content:flex-end;gap:8px;margin-bottom:14px}.int-cats{display:flex;flex-direction:column;gap:24px}.int-cat .ch{display:flex;align-items:center;gap:10px;margin-bottom:12px}.int-cat .ch h3{font-size:14.5px;font-weight:700;color:var(--head)}.int-cat .ch .ct{font-size:11px;font-weight:700;color:var(--o-d);background:var(--o-soft);border:1px solid var(--o-line);border-radius:999px;padding:2px 9px}.int-cat .ch .ln{flex:1;height:1px;background:var(--line)}.int-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:12px}.int-tile{background:#fff;border:1px solid var(--line);border-radius:11px;box-shadow:var(--sh);padding:16px 12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px;text-align:center;transition:box-shadow .2s,transform .2s,border-color .2s;min-height:104px}.int-tile:hover{box-shadow:var(--sh-md);transform:translateY(-3px);border-color:var(--o-line)}.int-tile .logo{height:38px;display:flex;align-items:center;justify-content:center;width:100%}.int-tile img{max-height:38px;max-width:108px;object-fit:contain}.int-tile span{font-size:11.5px;font-weight:600;color:var(--ink);line-height:1.2}.int-sec-badges .int-grid{grid-template-columns:repeat(auto-fill,minmax(170px,1fr))}.cmp-row{background:#fff;border:1px solid var(--line);border-radius:8px;box-shadow:var(--sh);padding:14px 18px;margin-bottom:10px;display:grid;grid-template-columns:1.4fr 1fr 1.2fr 1.2fr 1.2fr 1.4fr auto auto;gap:14px;align-items:center}.cmp-row .c .l{font-size:9.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--dim);margin-bottom:3px}.cmp-row .c .v{font-size:12.5px;color:var(--ink);font-weight:500}.cmp-row .acts{display:flex;gap:9px;color:var(--o)}.cmp-row .acts svg,.cmp-row .acts img.eeimg{width:16px;height:16px;cursor:pointer}.cmp-row .caret svg,.cmp-row .caret img.eeimg{width:16px;height:16px;color:var(--mut)}
@media(max-width:1100px){.cmp-row{grid-template-columns:1fr 1fr;gap:12px}.cmp-row .acts,.cmp-row .caret{grid-column:span 2;justify-content:flex-end}}.placeholder{background:#fff;border:1px dashed var(--line-2);border-radius:10px;padding:46px 24px;text-align:center;color:var(--mut)}.placeholder .ic{width:54px;height:54px;border-radius:14px;background:var(--o-soft);color:var(--o);display:flex;align-items:center;justify-content:center;margin:0 auto 14px}.placeholder .ic svg,.placeholder .ic img.eeimg{width:26px;height:26px}.placeholder b{display:block;color:var(--nav);font-size:16px;margin-bottom:6px}.toasts{position:fixed;right:18px;top:70px;z-index:9003;display:flex;flex-direction:column;gap:9px;max-width:300px}.toast{display:flex;gap:10px;background:#fff;border:1px solid var(--line);border-left:3px solid var(--o);border-radius:9px;padding:11px 14px;box-shadow:var(--sh-md);font-size:12.5px;color:var(--mut);opacity:0;transform:translateX(20px);transition:.35s}.toast.in{opacity:1;transform:none}.toast b{display:block;color:var(--nav);font-weight:700;margin-bottom:1px}.toast .ti{font-size:16px}
@media(max-width:1024px){.lead-fields{grid-template-columns:repeat(2,1fr)}}
@media(max-width:860px){:root{--sb:0px}.app{grid-template-columns:1fr}.brand{border-right:0}.brand .burger{display:flex}.side{position:fixed;top:0;left:0;bottom:0;width:268px;z-index:50;transform:translateX(-100%);transition:transform .28s ease;box-shadow:var(--sh-md)}.side.show{transform:none}.main{grid-column:1/-1}.search{display:none}.lead-head{flex-wrap:wrap}.lead-head .status{order:5;margin:0}
}
@media(max-width:520px){.view{padding:16px 14px 50px}.lead-fields{grid-template-columns:1fr}.vhead h2{font-size:18px}.top{padding:0 12px;gap:8px}.top .timer{display:none}.statcard{flex:1 1 100%;min-width:0}
}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}.vg-launch{position:fixed;left:18px;bottom:20px;z-index:9001;display:inline-flex;align-items:center;gap:9px;background:linear-gradient(120deg,var(--nav),#2a4a7a);color:#fff;border-radius:999px;padding:10px 16px 10px 11px;box-shadow:0 14px 34px -10px rgba(25,40,70,.6);cursor:pointer;font-weight:700;font-size:13px;transition:transform .2s}.vg-launch:hover{transform:translateY(-2px)}.vg-launch .av{width:30px;height:30px;border-radius:50%;background:var(--o);display:flex;align-items:center;justify-content:center;flex:none}.vg-launch .av svg,.vg-launch .av img.eeimg{width:17px;height:17px}.vg-launch .pp{width:8px;height:8px;border-radius:50%;background:#43d98a;box-shadow:0 0 0 3px rgba(67,217,138,.25);animation:aiblink 1.4s infinite}body.vg-open .vg-launch{display:none}.vg-panel{position:fixed;left:18px;bottom:20px;z-index:9002;width:350px;max-width:calc(100vw - 28px);height:500px;max-height:calc(100vh - 40px);background:#fff;border:1px solid var(--line);border-radius:16px;box-shadow:0 30px 70px -20px rgba(15,28,51,.5);display:flex;flex-direction:column;overflow:hidden;opacity:0;transform:translateY(12px) scale(.98);pointer-events:none;transition:.25s}.vg-panel.open{opacity:1;transform:none;pointer-events:auto}.vg-hd{display:flex;align-items:center;gap:11px;padding:13px 15px;background:linear-gradient(120deg,var(--nav),#2a4a7a);color:#fff}.vg-hd .av{width:38px;height:38px;border-radius:50%;background:var(--o);display:flex;align-items:center;justify-content:center;flex:none}.vg-hd .av svg,.vg-hd .av img.eeimg{width:20px;height:20px}.vg-hd .ti b{font-size:14px;font-weight:800;display:block;line-height:1.1}.vg-hd .ti span{font-size:11px;color:#c6d4ea;display:flex;align-items:center;gap:5px}.vg-hd .ti span i{width:6px;height:6px;border-radius:50%;background:#43d98a;display:inline-block}.vg-hd .tools{margin-left:auto;display:flex;gap:6px}.vg-hd .tools button{width:30px;height:30px;border-radius:8px;color:#fff;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,.12)}.vg-hd .tools button:hover{background:rgba(255,255,255,.22)}.vg-hd .tools button svg,.vg-hd .tools button img.eeimg{width:16px;height:16px}.vg-body{flex:1;overflow-y:auto;padding:14px;background:var(--paper);display:flex;flex-direction:column;gap:10px}.vg-msg{max-width:85%;font-size:12.8px;line-height:1.5;padding:10px 12px;border-radius:12px;white-space:pre-wrap;animation:vgin .3s ease}
@keyframes vgin{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}.vg-msg.bot{align-self:flex-start;background:#fff;border:1px solid var(--line);border-bottom-left-radius:4px;color:var(--ink)}.vg-msg.user{align-self:flex-end;background:var(--nav);color:#fff;border-bottom-right-radius:4px}.vg-typing{align-self:flex-start;background:#fff;border:1px solid var(--line);border-radius:12px;padding:11px 13px;display:inline-flex;gap:4px}.vg-typing i{width:6px;height:6px;border-radius:50%;background:var(--dim);animation:vgtyp 1.1s infinite}.vg-typing i:nth-child(2){animation-delay:.18s}.vg-typing i:nth-child(3){animation-delay:.36s}
@keyframes vgtyp{0%,60%,100%{opacity:.3;transform:translateY(0)}30%{opacity:1;transform:translateY(-3px)}}.vg-chips{display:flex;flex-wrap:wrap;gap:7px;padding:10px 12px 8px;border-top:1px solid var(--line);background:#fff}.vg-chip{font-size:11.5px;font-weight:600;color:var(--o-d);background:var(--o-soft);border:1px solid var(--o-line);border-radius:999px;padding:6px 11px;cursor:pointer;transition:.15s}.vg-chip:hover{background:var(--o);color:#fff}.vg-input{display:flex;gap:8px;padding:10px 12px;border-top:1px solid var(--line);background:#fff}.vg-input input{flex:1;border:1px solid var(--line-2);border-radius:999px;padding:9px 14px;font-family:inherit;font-size:12.8px;outline:none;color:var(--ink)}.vg-input input:focus{border-color:var(--o-line);box-shadow:0 0 0 3px var(--o-soft)}.vg-input button{width:38px;height:38px;border-radius:50%;background:var(--o);color:#fff;display:flex;align-items:center;justify-content:center;flex:none}.vg-input button:hover{background:var(--o-d)}.vg-input button svg,.vg-input button img.eeimg{width:17px;height:17px}
@media(max-width:860px){.vg-launch{bottom:78px}.vg-panel{bottom:14px;left:14px;height:72vh}}.ai-eyebrow{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--o-d);background:var(--o-soft);border:1px solid var(--o-line);border-radius:999px;padding:5px 12px}.ai-eyebrow svg,.ai-eyebrow img.eeimg{width:13px;height:13px}.ai-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(330px,1fr));gap:16px}.ai-card{background:#fff;border:1px solid var(--line);border-radius:14px;box-shadow:var(--sh);overflow:hidden;display:flex;flex-direction:column;transition:box-shadow .2s,transform .2s}.ai-card:hover{box-shadow:var(--sh-md);transform:translateY(-3px)}.ai-card .top{display:flex;align-items:center;gap:12px;padding:15px 18px;background:linear-gradient(120deg,var(--nav),#2a4a7a);color:#fff}.ai-ic{width:40px;height:40px;border-radius:11px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex:none}.ai-ic svg,.ai-ic img.eeimg{width:21px;height:21px}.ai-card .top .nm h3{font-size:15.5px;font-weight:800;line-height:1.1}.ai-card .top .nm span{font-size:11px;color:#c6d4ea}.ai-card .top .live{margin-left:auto;display:inline-flex;align-items:center;gap:5px;font-size:9.5px;font-weight:800;letter-spacing:.06em;background:rgba(47,175,106,.22);color:#9ff0c4;border:1px solid rgba(47,175,106,.5);border-radius:999px;padding:3px 8px}.ai-card .top .live i{width:5px;height:5px;border-radius:50%;background:#43d98a;animation:aiblink 1.3s infinite}
@keyframes aiblink{50%{opacity:.3}}.ai-viz{height:78px;display:flex;align-items:center;justify-content:center;background:var(--o-soft2);border-bottom:1px solid var(--line);overflow:hidden;padding:0 16px}.ai-body{padding:15px 18px;flex:1;display:flex;flex-direction:column}.ai-body p{font-size:12.8px;color:var(--mut);line-height:1.55;margin-bottom:13px}.ai-body ul{list-style:none;display:flex;flex-direction:column;gap:8px;margin-top:auto}.ai-body li{font-size:12.5px;color:var(--ink);display:flex;gap:8px;align-items:flex-start;line-height:1.4}.ai-body li svg,.ai-body li img.eeimg{width:15px;height:15px;color:var(--grn);flex:none;margin-top:1px}.ai-wave{display:flex;align-items:center;gap:3px;height:40px}.ai-wave i{width:4px;border-radius:4px;background:var(--o);animation:aiwv 1s ease-in-out infinite}
@keyframes aiwv{0%,100%{height:7px}50%{height:34px}}.ai-chat{display:flex;flex-direction:column;gap:6px;width:100%}.ai-bub{max-width:80%;font-size:11px;padding:6px 10px;border-radius:10px;line-height:1.3}.ai-bub.a{background:#fff;border:1px solid var(--line);align-self:flex-start;border-bottom-left-radius:3px}.ai-bub.u{background:var(--nav);color:#fff;align-self:flex-end;border-bottom-right-radius:3px}.ai-wabub{background:#dcf8c6;color:#0b3b2e;font-size:11px;padding:6px 10px;border-radius:10px;border-bottom-right-radius:3px;max-width:82%}.ai-wabub::after{content:&quot;✓✓&quot;;color:#34b7f1;font-size:9px;float:right;margin-left:8px}.ai-pulse{position:relative;width:54px;height:54px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:conic-gradient(var(--o) 0 92%,#e1e5ec 92% 100%)}.ai-pulse span{width:40px;height:40px;border-radius:50%;background:#fff;color:var(--nav);display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:800}.ai-pulse::before{content:&quot;&quot;;position:absolute;inset:-5px;border-radius:50%;border:2px solid var(--o);animation:aiping 1.8s ease-out infinite}
@keyframes aiping{0%{transform:scale(.85);opacity:.7}100%{transform:scale(1.25);opacity:0}}.nav .cnt.ai{background:var(--o)}.pii{filter:blur(4px);-webkit-user-select:none;user-select:none;cursor:not-allowed;letter-spacing:.5px}.sample-badge{display:inline-flex;align-items:center;gap:6px;background:var(--o-soft);color:var(--o-d);border:1px solid var(--o-line);font-size:11px;font-weight:700;border-radius:999px;padding:5px 11px;white-space:nowrap}.sample-badge svg,.sample-badge img.eeimg{width:12px;height:12px}.privacy-bar{display:flex;align-items:center;gap:9px;background:#eef6ff;border:1px solid #cfe3fb;color:#2c5b94;font-size:12.5px;font-weight:500;border-radius:9px;padding:10px 14px;margin-bottom:16px}.privacy-bar svg,.privacy-bar img.eeimg{width:16px;height:16px;flex:none}.privacy-bar b{font-weight:700}
@media(max-width:520px){.sample-badge span{display:none}}.oc-hero{background:linear-gradient(120deg,var(--nav),#2a4a7a);color:#fff;border-radius:12px;padding:22px 24px;margin-bottom:18px;display:flex;align-items:center;gap:18px;flex-wrap:wrap}.oc-hero .htxt h2{font-size:21px;font-weight:800;margin-bottom:4px}.oc-hero .htxt p{font-size:13px;color:#c6d4ea;max-width:560px;line-height:1.5}.oc-hero .hsum{margin-left:auto;display:flex;gap:22px;flex-wrap:wrap}.oc-hero .hsum .s b{font-size:24px;font-weight:800;display:block}.oc-hero .hsum .s span{font-size:11px;color:#c6d4ea}.oc-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(290px,1fr));gap:16px}.oc-card{background:#fff;border:1px solid var(--line);border-radius:12px;box-shadow:var(--sh);padding:18px 20px;position:relative;overflow:hidden;transition:box-shadow .2s,transform .2s}.oc-card:hover{box-shadow:var(--sh-md);transform:translateY(-2px)}.oc-card::after{content:&quot;&quot;;position:absolute;left:0;top:0;bottom:0;width:4px;background:var(--ac,var(--o))}.oc-card .ic{width:42px;height:42px;border-radius:11px;background:var(--acs,var(--o-soft));color:var(--ac,var(--o-d));display:flex;align-items:center;justify-content:center;margin-bottom:12px}.oc-card .ic svg,.oc-card .ic img.eeimg{width:21px;height:21px}.oc-card .lab{font-size:11.5px;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--mut)}.oc-card .big{font-size:38px;font-weight:800;color:var(--nav);line-height:1.05;margin:3px 0 2px;font-variant-numeric:tabular-nums}.oc-card .sub{font-size:12.5px;color:var(--mut);line-height:1.45}.oc-card .tr{display:inline-flex;align-items:center;gap:5px;margin-top:11px;font-size:11.5px;font-weight:700;color:var(--grn);background:var(--grn-soft);border-radius:999px;padding:4px 11px}.oc-card .ba{margin-top:13px;display:flex;flex-direction:column;gap:8px}.oc-card .ba .r{display:flex;align-items:center;gap:9px;font-size:11px}.oc-card .ba .r b{width:78px;color:var(--mut);font-weight:600}.oc-card .ba .tk{flex:1;height:8px;border-radius:5px;background:var(--paper);overflow:hidden}.oc-card .ba .tk i{display:block;height:100%;border-radius:5px;background:var(--ac,var(--o));width:0;transition:width 1s cubic-bezier(.2,.8,.2,1)}.oc-card .ba .r.old .tk i{background:#c9d0db}.oc-card .ba .r em{width:58px;text-align:right;font-style:normal;font-weight:700;color:var(--ink);font-size:11px}.bd-modal{position:fixed;inset:0;z-index:10000;display:flex;align-items:center;justify-content:center;padding:20px;background:rgba(15,28,51,.55);-webkit-backdrop-filter:blur(3px);backdrop-filter:blur(3px);opacity:0;visibility:hidden;transition:opacity .25s}.bd-modal.show{opacity:1;visibility:visible}.bd-card{background:#fff;border-radius:18px;max-width:390px;width:100%;padding:30px 26px;text-align:center;box-shadow:0 30px 80px -20px rgba(15,28,51,.55);transform:translateY(14px) scale(.97);transition:transform .28s}.bd-modal.show .bd-card{transform:none}.bd-logo-img{height:34px;width:auto;display:block;margin:0 auto 16px}.bd-logo{display:flex;align-items:center;justify-content:center;gap:8px;font-weight:800;font-size:17px;color:var(--nav);margin-bottom:16px}.bd-logo .gx{display:flex;gap:2px}.bd-logo .gx i{width:12px;height:12px;border-radius:3px;display:block}.bd-logo .gx i:nth-child(1){background:var(--o)}.bd-logo .gx i:nth-child(2){background:var(--nav)}.bd-logo b em{color:var(--o);font-style:normal}.bd-ic{width:60px;height:60px;border-radius:16px;background:var(--o-soft);display:flex;align-items:center;justify-content:center;font-size:28px;margin:0 auto 14px}.bd-card h3{font-size:20px;font-weight:800;color:var(--nav);margin-bottom:8px;line-height:1.2}.bd-card p{font-size:13.5px;color:var(--mut);line-height:1.6;margin-bottom:20px}.bd-go{display:block;background:var(--o);color:#fff;font-weight:700;font-size:15px;border-radius:11px;padding:14px;text-decoration:none;transition:background .2s,transform .15s}.bd-go:hover{background:var(--o-d)}.bd-go:active{transform:scale(.98)}.bd-close{margin-top:12px;font-size:12.5px;color:var(--dim);font-weight:600;background:none;border:0;cursor:pointer}.bd-close:hover{color:var(--mut)}.tour-spot{position:fixed;z-index:9000;border-radius:10px;border:2px solid var(--o);box-shadow:0 0 0 9999px rgba(15,28,51,.5);pointer-events:none;opacity:0;transition:all .5s cubic-bezier(.4,0,.2,1)}.tour-on .tour-spot{opacity:1}.tour-tip{position:fixed;z-index:9002;width:300px;max-width:calc(100vw - 28px);background:#fff;border-radius:14px;box-shadow:0 24px 60px rgba(15,28,51,.42);padding:17px 18px;opacity:0;transform:translateY(8px);transition:opacity .35s,transform .35s,left .45s cubic-bezier(.4,0,.2,1),top .45s cubic-bezier(.4,0,.2,1);pointer-events:none}.tour-on .tour-tip{opacity:1;transform:none;pointer-events:auto}.tour-tip .stp{font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--o);margin-bottom:7px}.tour-tip h4{font-size:15.5px;font-weight:700;color:var(--nav);line-height:1.25;margin-bottom:6px}.tour-tip p{font-size:12.8px;line-height:1.55;color:var(--mut)}.tour-tip .row{display:flex;align-items:center;gap:10px;margin-top:14px}.tour-tip .dts{display:flex;gap:5px;margin-right:auto}.tour-tip .dts b{width:7px;height:7px;border-radius:999px;background:var(--line-2);cursor:pointer;transition:.25s;display:block}.tour-tip .dts b.on{width:18px;background:var(--o)}.tour-tip .sk{font-size:11.5px;font-weight:600;color:var(--dim)}.tour-tip .nx{background:var(--o);color:#fff;font-weight:700;font-size:12.5px;border-radius:8px;padding:8px 15px}.tour-tip .nx:hover{background:var(--o-d)}.tour-dock{position:fixed;left:50%;bottom:20px;transform:translateX(-50%);z-index:9002;display:flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line);border-radius:999px;padding:7px 9px 7px 12px;box-shadow:0 16px 44px -14px rgba(25,40,70,.5)}.tour-dock .dbtn{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:var(--paper);color:var(--nav)}.tour-dock .dbtn:hover{background:var(--o-soft);color:var(--o-d)}.tour-dock .dbtn.play{background:var(--o);color:#fff}.tour-dock .dbtn.play:hover{background:var(--o-d)}.tour-dock .dbtn svg,.tour-dock .dbtn img.eeimg{width:15px;height:15px}.tour-dock .lbl{font-size:12.5px;font-weight:600;color:var(--nav);white-space:nowrap;padding:0 4px}.tour-dock .ddots{display:flex;gap:5px;padding:0 4px}.tour-dock .ddots b{width:6px;height:6px;border-radius:50%;background:var(--line-2);cursor:pointer}.tour-dock .ddots b.on{background:var(--o)}.demo-cta{position:fixed;right:18px;bottom:20px;z-index:9001;display:inline-flex;align-items:center;gap:8px;background:var(--o);color:#fff;font-weight:700;font-size:13px;border-radius:999px;padding:11px 18px;box-shadow:0 14px 34px -10px rgba(244,123,32,.7);cursor:pointer}.demo-cta:hover{background:var(--o-d)}.demo-cta svg,.demo-cta img.eeimg{width:15px;height:15px}
@media(max-width:860px){.tour-tip{left:14px!important;right:14px!important;top:auto!important;bottom:88px!important;width:auto;max-width:none}.tour-dock{left:14px;right:14px;transform:none;justify-content:center;bottom:14px}.tour-dock .lbl{display:none}.tour-dock .ddots{max-width:46vw;overflow:hidden}.demo-cta{bottom:66px;right:14px;padding:9px 14px;font-size:12px}
}
@media(max-width:420px){.tour-dock .ddots{display:none} }
</style>
</head>
<body>
<div class=&quot;app&quot; id=&quot;app&quot;>
  <div class=&quot;brand&quot;>
    <span class=&quot;logo&quot;><img class=&quot;logo-img&quot; src=&quot;https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg&quot; alt=&quot;ExtraaEdge&quot; onerror=&quot;this.style.display='none';this.nextElementSibling.style.display='flex'&quot;><span class=&quot;logo-fb&quot; style=&quot;display:none;align-items:center;gap:9px&quot;><span class=&quot;gx&quot;><i></i><i></i></span> <b>extraa<em>edge</em></b></span></span>
    <button class=&quot;burger&quot; id=&quot;burger&quot; aria-label=&quot;Menu&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><line x1=&quot;3&quot; y1=&quot;6&quot; x2=&quot;21&quot; y2=&quot;6&quot;/><line x1=&quot;3&quot; y1=&quot;12&quot; x2=&quot;21&quot; y2=&quot;12&quot;/><line x1=&quot;3&quot; y1=&quot;18&quot; x2=&quot;21&quot; y2=&quot;18&quot;/></svg></button>
  </div>
  <header class=&quot;top&quot;>
    <div class=&quot;search&quot;>
      <span class=&quot;gsel&quot;>Global Search <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span>
      <input id=&quot;search&quot; type=&quot;text&quot; placeholder=&quot;Search by Institute Name, Email ID or Mobile No.&quot; autocomplete=&quot;off&quot;>
      <span class=&quot;mag&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><circle cx=&quot;11&quot; cy=&quot;11&quot; r=&quot;7&quot;/><path d=&quot;m21 21-4.3-4.3&quot;/></svg></span>
    </div>
    <div class=&quot;acts&quot;>
      <span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Sample data</span></span>
      <button class=&quot;iconbtn&quot; id=&quot;bell&quot; title=&quot;Notifications&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9&quot;/><path d=&quot;M10.3 21a1.94 1.94 0 0 0 3.4 0&quot;/></svg><span class=&quot;dot&quot; id=&quot;bellCnt&quot;>193</span></button>
      <button class=&quot;iconbtn&quot; id=&quot;addBtn&quot; title=&quot;Add&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><line x1=&quot;12&quot; y1=&quot;5&quot; x2=&quot;12&quot; y2=&quot;19&quot;/><line x1=&quot;5&quot; y1=&quot;12&quot; x2=&quot;19&quot; y2=&quot;12&quot;/></svg></button>
      <button class=&quot;iconbtn&quot; title=&quot;Call transfer&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2 4.2 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7A2 2 0 0 1 22 16.9z&quot;/></svg></button>
      <span class=&quot;timer&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;9&quot;/><path d=&quot;M12 7v5l3 2&quot;/></svg><span id=&quot;sessTimer&quot;>00:00:00</span></span>
      <span class=&quot;avatar&quot;>M</span>
    </div>
  </header>
  <aside class=&quot;side&quot; id=&quot;side&quot;>
    <button class=&quot;nav on&quot; data-go=&quot;outcomes&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0z&quot;/><path d=&quot;M17 5h3v2a3 3 0 0 1-3 3M7 5H4v2a3 3 0 0 0 3 3&quot;/></svg> Business Outcomes</button>
    <button class=&quot;nav&quot; data-go=&quot;ai&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M12 3l1.7 4.3L18 9l-4.3 1.7L12 15l-1.7-4.3L6 9l4.3-1.7z&quot;/><path d=&quot;M19 14l.8 1.9 1.9.8-1.9.8L19 19.4l-.8-1.9-1.9-.8 1.9-.8z&quot;/></svg> Vidya AI <span class=&quot;cnt ai&quot;>AI</span></button>
    <button class=&quot;nav&quot; data-toggle=&quot;analytics&quot;>
      <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M3 3v18h18&quot;/><rect x=&quot;7&quot; y=&quot;10&quot; width=&quot;3&quot; height=&quot;7&quot;/><rect x=&quot;12&quot; y=&quot;6&quot; width=&quot;3&quot; height=&quot;11&quot;/><rect x=&quot;17&quot; y=&quot;13&quot; width=&quot;3&quot; height=&quot;4&quot;/></svg>
      Analytics Dashboard
      <span class=&quot;chev&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></span>
    </button>
    <div class=&quot;submenu&quot; id=&quot;sub-analytics&quot;>
      <button class=&quot;subnav&quot; data-go=&quot;mgmt&quot;><i></i>Management Dashboard</button>
      <button class=&quot;subnav&quot; data-go=&quot;counselor&quot;><i></i>Counselor Dashboard</button>
      <button class=&quot;subnav&quot; data-go=&quot;comm&quot;><i></i>Communication Dashboard</button>
      <button class=&quot;subnav&quot; data-go=&quot;publisher&quot;><i></i>Publisher Dashboard</button>
      <button class=&quot;subnav&quot; data-go=&quot;demographic&quot;><i></i>Demographic Dashboard</button>
    </div>
    <button class=&quot;nav&quot; data-go=&quot;leads&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2&quot;/><circle cx=&quot;9&quot; cy=&quot;7&quot; r=&quot;4&quot;/><path d=&quot;M22 21v-2a4 4 0 0 0-3-3.9&quot;/></svg> Lead Manager</button>
    <button class=&quot;nav&quot; data-go=&quot;rawdata&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><ellipse cx=&quot;12&quot; cy=&quot;5&quot; rx=&quot;8&quot; ry=&quot;3&quot;/><path d=&quot;M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5&quot;/><path d=&quot;M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6&quot;/></svg> Raw Data Manager</button>
    <button class=&quot;nav&quot; data-go=&quot;wa&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z&quot;/></svg> WhatsApp Chat <span class=&quot;cnt&quot;>7</span></button>
    <button class=&quot;nav&quot; data-go=&quot;followups&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><rect x=&quot;3&quot; y=&quot;4&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M16 2v4M8 2v4M3 10h18&quot;/></svg> Follow-ups Manager</button>
    <button class=&quot;nav&quot; data-go=&quot;failed&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4&quot;/><path d=&quot;M17 8l-5-5-5 5M12 3v12&quot;/></svg> Upload Failed Leads</button>
    <button class=&quot;nav&quot; data-go=&quot;bulk&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M9 11l3 3L22 4&quot;/><path d=&quot;M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11&quot;/></svg> Bulk Actions</button>
    <button class=&quot;nav&quot; data-go=&quot;campaign&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;m3 11 18-5v12L3 14v-3z&quot;/><path d=&quot;M11.6 16.8a3 3 0 1 1-5.8-1.6&quot;/></svg> Bulk Marketing Campaign</button>
    <button class=&quot;nav&quot; data-go=&quot;workflow&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><rect x=&quot;3&quot; y=&quot;3&quot; width=&quot;6&quot; height=&quot;6&quot; rx=&quot;1&quot;/><rect x=&quot;15&quot; y=&quot;15&quot; width=&quot;6&quot; height=&quot;6&quot; rx=&quot;1&quot;/><path d=&quot;M9 6h6a3 3 0 0 1 3 3v6&quot;/></svg> Workflow Automation</button>
    <button class=&quot;nav&quot; data-go=&quot;basic&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;3&quot;/><path d=&quot;M19.4 15a1.6 1.6 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.6 1.6 0 0 0-2.7 1.1V21a2 2 0 0 1-4 0v-.1A1.6 1.6 0 0 0 7 19.4a1.6 1.6 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1A1.6 1.6 0 0 0 3 14.3H3a2 2 0 0 1 0-4h.1A1.6 1.6 0 0 0 4.6 7a1.6 1.6 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1A1.6 1.6 0 0 0 9 3V3a2 2 0 0 1 4 0v.1A1.6 1.6 0 0 0 17 4.6a1.6 1.6 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.6 1.6 0 0 0-.3 1.8V9a2 2 0 0 1 0 4h-.1z&quot;/></svg> Basic Settings</button>
    <button class=&quot;nav&quot; data-go=&quot;advanced&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M14 3v4a1 1 0 0 0 1 1h4&quot;/><path d=&quot;M5 3h9l5 5v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z&quot;/><circle cx=&quot;11&quot; cy=&quot;14&quot; r=&quot;2&quot;/></svg> Advanced Settings</button>
    <button class=&quot;nav&quot; data-go=&quot;integration&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M10 13a5 5 0 0 0 7 0l3-3a5 5 0 0 0-7-7l-1.5 1.5&quot;/><path d=&quot;M14 11a5 5 0 0 0-7 0l-3 3a5 5 0 0 0 7 7l1.5-1.5&quot;/></svg> Third Party Integration</button>
    <div class=&quot;spacer&quot;></div>
    <button class=&quot;ticket&quot; data-go=&quot;ticket&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot;><path d=&quot;M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z&quot;/></svg> Raise a Ticket</button>
  </aside>
  <div class=&quot;scrim&quot; id=&quot;scrim&quot;></div>
  <main class=&quot;main&quot; id=&quot;main&quot;>
    <section class=&quot;view on&quot; data-v=&quot;outcomes&quot;>
      <div class=&quot;vhead&quot;><h2>Business Outcomes</h2><div class=&quot;right&quot;><span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Illustrative sample data</span></span></div></div>
      <div class=&quot;privacy-bar&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span><b>Privacy-first demo.</b> All names, numbers and emails shown are fictional samples - real student data is masked. No internal rules, keys or confidential reports are exposed.</span></div>
      <div class=&quot;oc-hero&quot;>
        <div class=&quot;htxt&quot;><h2>What ExtraaEdge delivers, in numbers</h2><p>Not just a dashboard - measurable results across response time, conversion, automation, productivity and ROI for your admission funnel.</p></div>
        <div class=&quot;hsum&quot;>
          <div class=&quot;s&quot;><b>+40%</b><span>Conversion lift</span></div>
          <div class=&quot;s&quot;><b>12×</b><span>Faster response</span></div>
          <div class=&quot;s&quot;><b>6.5×</b><span>ROI</span></div>
          <div class=&quot;s&quot;><b>₹4.2 Cr</b><span>Revenue influenced</span></div>
        </div>
      </div>
      <div class=&quot;oc-grid&quot; id=&quot;ocGrid&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;ai&quot;>
      <div class=&quot;vhead&quot;><div><span class=&quot;ai-eyebrow&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;><path d=&quot;M13 2 3 14h7l-1 8 10-12h-7z&quot;/></svg> Powered by Vidya AI</span><h2 style=&quot;margin-top:8px&quot;>AI that does the work - not just assists</h2></div><div class=&quot;right&quot;><span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Sample data</span></span></div></div>
      <div class=&quot;ai-grid&quot; id=&quot;aiGrid&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;mgmt&quot;>
      <div class=&quot;vhead&quot;><h2>Management Dashboard</h2><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;ctrls&quot;>
        <button class=&quot;filtbtn&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><polygon points=&quot;22 3 2 3 10 12.5 10 19 14 21 14 12.5&quot;/></svg></button>
        <div class=&quot;right&quot;>
          <span class=&quot;synced&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg> Last Synced: <u>03:04 pm</u></span>
          <span class=&quot;select&quot;>Select Counselor <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span>
          <span class=&quot;daterange&quot;><span class=&quot;ar&quot;>↕</span> Creation Date: Sep 21, 2025 - Jun 23, 2026 <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;4&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M16 2v4M8 2v4M3 10h18&quot;/></svg></span>
        </div>
      </div>
      <div class=&quot;statcards&quot;><div class=&quot;statcard&quot;><div class=&quot;h&quot;>Total Leads <span class=&quot;rf&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg></span></div><div class=&quot;rows&quot;><div class=&quot;r big&quot;><span>Leads</span><b>917</b></div><div class=&quot;r&quot;><span>Admissions</span><b>386</b></div><div class=&quot;r&quot;><span>Revenue influenced</span><b>₹4.2 Cr</b></div></div></div></div>
      <div class=&quot;tabbar&quot;><button class=&quot;tab on&quot;>Live Funnel</button><button class=&quot;tab&quot;>Conversions</button><button class=&quot;tab&quot;>ROI</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Lead List</button><button class=&quot;subtab&quot;>Program Vs Status</button><button class=&quot;subtab&quot;>Counselor Vs Status</button></div>
      <div class=&quot;panel&quot;>
        <div class=&quot;toolbar&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4&quot;/><path d=&quot;M7 10l5 5 5-5M12 15V3&quot;/></svg><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7&quot;/></svg></div>
        <div class=&quot;funnel-wrap&quot;><div class=&quot;funnel&quot; id=&quot;mgmtFunnel&quot;><div class=&quot;total&quot;>917</div></div><div class=&quot;legend&quot; id=&quot;mgmtLegend&quot;></div></div>
      </div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;counselor&quot;>
      <div class=&quot;vhead&quot;><h2>Counselor Dashboard</h2><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;ctrls&quot;>
        <button class=&quot;filtbtn&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><polygon points=&quot;22 3 2 3 10 12.5 10 19 14 21 14 12.5&quot;/></svg></button>
        <div class=&quot;right&quot;>
          <span class=&quot;synced&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg> Last Synced: <u>03:04 pm</u></span>
          <span class=&quot;select&quot;>Select Counselor <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span>
          <span class=&quot;daterange&quot;><span class=&quot;ar&quot;>↕</span> Creation Date: Sep 21, 2025 - Jun 23, 2026 <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;4&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M16 2v4M8 2v4M3 10h18&quot;/></svg></span>
        </div>
      </div>
      <div class=&quot;statcards&quot;><div class=&quot;statcard two&quot; style=&quot;flex:0 1 460px&quot;><div class=&quot;h&quot;>Counselor Pending Stats <span class=&quot;rf&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg></span></div><div class=&quot;grid&quot;><div class=&quot;r&quot;><span>Follow-ups On Time</span><b>98%</b></div><div class=&quot;r&quot;><span>Re-Engaged Leads</span><b>1,240</b></div><div class=&quot;r&quot;><span>Missed Follow Ups</span><b>6</b></div><div class=&quot;r&quot;><span>Unread Chats</span><b>0</b></div></div></div></div>
      <div class=&quot;tabbar&quot;><button class=&quot;tab on&quot;>Counselor Outcomes</button><button class=&quot;tab&quot;>Counselor Efforts</button><button class=&quot;tab&quot;>Mobile Calling Analysis</button><button class=&quot;tab&quot;>IVR Calling Analysis</button><button class=&quot;tab&quot;>More ▾</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Counselor</button><button class=&quot;subtab&quot;>Counselor Vs Status</button><button class=&quot;subtab&quot;>Counselor Status Change Tracker</button><button class=&quot;subtab&quot;>Counselor Vs Enrolled</button><button class=&quot;subtab&quot;>More ▾</button></div>
      <div class=&quot;panel&quot;>
        <div class=&quot;toolbar&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;3&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M9 3v18M3 9h18&quot;/></svg></div>
        <div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;counselorTbl&quot;><thead><tr><th>Counselor Name</th><th class=&quot;num&quot;>Total Leads</th><th class=&quot;num&quot;>Enrolled</th><th class=&quot;num&quot;>Lead To Enrolled Leads %</th></tr></thead><tbody></tbody></table></div>
      </div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;comm&quot;>
      <div class=&quot;vhead&quot;><h2>Communication Dashboard</h2><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;ctrls&quot;><button class=&quot;filtbtn&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><polygon points=&quot;22 3 2 3 10 12.5 10 19 14 21 14 12.5&quot;/></svg></button><div class=&quot;right&quot;><span class=&quot;select&quot;>Select Counselor <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span></div></div>
      <div class=&quot;statcards&quot;><div class=&quot;statcard two&quot; style=&quot;flex:0 1 460px&quot;><div class=&quot;h&quot;>Email Summary</div><div class=&quot;grid&quot;><div class=&quot;r&quot;><span>Sent</span><b>24620</b></div><div class=&quot;r&quot;><span>Bounce</span><b>410</b></div><div class=&quot;r&quot;><span>Delivered</span><b>23640</b></div><div class=&quot;r&quot;><span>Deferred</span><b>120</b></div><div class=&quot;r&quot;><span>Open</span><b>9460</b></div><div class=&quot;r&quot;><span>Click</span><b>2980</b></div></div></div></div>
      <div class=&quot;tabbar&quot;><button class=&quot;tab on&quot;>Sent Email Analysis</button><button class=&quot;tab&quot;>SMS Sent Analysis</button><button class=&quot;tab&quot;>Enterprise WhatsApp Sent Analysis</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Email Overview</button><button class=&quot;subtab&quot;>Template Wise Usage</button><button class=&quot;subtab&quot;>Marketing Campaign Performance</button></div>
      <div class=&quot;panel&quot;><div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;commTbl&quot;><thead><tr><th>Type</th><th class=&quot;num&quot;>Email Sent</th><th class=&quot;num&quot;>Email Delivered</th><th class=&quot;num&quot;>Delivery Rate</th><th class=&quot;num&quot;>Email Opened</th><th class=&quot;num&quot;>Open Rate</th><th class=&quot;num&quot;>Email Clicked</th><th class=&quot;num&quot;>Click Rate</th><th class=&quot;num&quot;>Click Through Rate</th></tr></thead><tbody></tbody></table></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;publisher&quot;>
      <div class=&quot;vhead&quot;><h2>Publisher Dashboard</h2><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;statcards&quot;>
        <div class=&quot;statcard two&quot;><div class=&quot;h&quot;>Lead Summary</div><div class=&quot;grid&quot; style=&quot;grid-template-columns:1fr&quot;><div class=&quot;r&quot;><span>Total Leads Count</span><b>10259</b></div><div class=&quot;r&quot;><span>Primary Leads &amp;gt;&amp;gt;</span><b>10259</b></div><div class=&quot;r&quot;><span>Non Primary Leads</span><b>20</b></div></div></div>
        <div class=&quot;statcard two&quot;><div class=&quot;h&quot;>Instance Summary</div><div class=&quot;grid&quot; style=&quot;grid-template-columns:1fr&quot;><div class=&quot;r&quot;><span>Total Instance Count &amp;gt;&amp;gt;</span><b>73770</b></div><div class=&quot;r&quot;><span>Primary Instance &amp;gt;&amp;gt;</span><b>10313</b></div><div class=&quot;r&quot;><span>Non Primary Instance &amp;gt;&amp;gt;</span><b>63452</b></div></div></div>
      </div>
      <div class=&quot;tabbar&quot; style=&quot;border-radius:8px 8px 0 0&quot;><button class=&quot;tab on&quot;>Publisher Analysis</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Program Wise Bifurcation</button><button class=&quot;subtab&quot;>Program wise Conversion</button></div>
      <div class=&quot;panel&quot;><div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;pubTbl&quot;><thead><tr><th>Deal-Month, Products Interested</th><th class=&quot;num&quot;>Total</th><th class=&quot;num&quot;>Lead Captured</th><th class=&quot;num&quot;>Open</th><th class=&quot;num&quot;>No SAL</th><th class=&quot;num&quot;>Demo Pipeline</th><th class=&quot;num&quot;>Demo Done</th><th class=&quot;num&quot;>Onboarding</th><th class=&quot;num&quot;>Deal Lost</th></tr></thead><tbody></tbody></table></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;demographic&quot;>
      <div class=&quot;vhead&quot;><h2>Demographic Dashboard</h2><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;tabbar&quot; style=&quot;border-radius:8px 8px 0 0&quot;><button class=&quot;tab on&quot;>Regional Analysis</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Country-State-City wise Conversion Analysis</button><button class=&quot;subtab&quot;>Country Wise Lead Count</button><button class=&quot;subtab&quot;>State Wise Lead Count</button></div>
      <div class=&quot;panel&quot;><div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;demoTbl&quot;><thead><tr><th>Country-State-City</th><th class=&quot;num&quot;>Total Leads</th><th class=&quot;num&quot;>Enrolled Leads</th><th class=&quot;num&quot;>Lead To Enrolled Leads %</th></tr></thead><tbody></tbody></table></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;leads&quot;>
      <div class=&quot;vhead&quot; style=&quot;justify-content:flex-end&quot;><div class=&quot;right&quot;><button class=&quot;lm-pill&quot;>Hot Leads (468)</button><button class=&quot;lm-pill&quot;>Verified Leads (1,206)</button></div></div>
      <div class=&quot;lm-tabs&quot; data-tabs=&quot;leads&quot;></div>
      <button class=&quot;lm-sort&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M3 7h6M3 12h12M3 17h18&quot;/><path d=&quot;M18 7l3-3 3 3M21 4v9&quot;/></svg> Sort</button>
      <div class=&quot;lm-toolbar&quot; data-tools=&quot;1&quot;></div>
      <div data-list=&quot;leads&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;rawdata&quot;>
      <div class=&quot;vhead&quot; style=&quot;justify-content:flex-end&quot;><div class=&quot;right&quot;><button class=&quot;lm-pill&quot;>Verified Leads (8,940)</button><button class=&quot;lm-pill&quot;>Enriched Leads (6,120)</button></div></div>
      <div class=&quot;lm-tabs&quot; data-tabs=&quot;rawdata&quot;></div>
      <button class=&quot;lm-sort&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M3 7h6M3 12h12M3 17h18&quot;/><path d=&quot;M18 7l3-3 3 3M21 4v9&quot;/></svg> Sort</button>
      <div class=&quot;lm-toolbar&quot; data-tools=&quot;1&quot;></div>
      <div data-list=&quot;rawdata&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;wa&quot;>
      <div class=&quot;vhead&quot;><h2>WhatsApp Chat</h2></div>
      <div class=&quot;wa-list&quot; id=&quot;waList&quot;></div>
      <div class=&quot;pager&quot; id=&quot;waPager&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;followups&quot;>
      <div class=&quot;lm-tabs&quot; data-tabs=&quot;followups&quot;></div>
      <div class=&quot;fu-grid&quot;>
        <div>
          <button class=&quot;lm-sort&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M3 7h6M3 12h12M3 17h18&quot;/><path d=&quot;M18 7l3-3 3 3M21 4v9&quot;/></svg> Sort</button>
          <div class=&quot;lm-toolbar&quot; data-tools=&quot;1&quot;></div>
          <div data-list=&quot;followups&quot;></div>
        </div>
        <div class=&quot;cal&quot; id=&quot;fuCal&quot;>
          <div class=&quot;fhd&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; style=&quot;width:16px;height:16px&quot;><rect x=&quot;3&quot; y=&quot;4&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M16 2v4M8 2v4M3 10h18&quot;/></svg> Followup Calendar</div>
          <div class=&quot;ch&quot;><button id=&quot;calPrev&quot;>‹</button><span id=&quot;calLabel&quot;>June 2026</span><button id=&quot;calNext&quot;>›</button></div>
          <div class=&quot;grid&quot; id=&quot;calGrid&quot;></div>
        </div>
      </div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;failed&quot;>
      <div class=&quot;vhead&quot;><h2>Failed Lead List</h2></div>
      <div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;failedTbl&quot;><thead><tr><th style=&quot;width:30px&quot;></th><th>Institute Name</th><th>EB Email</th><th>EB Contact No</th><th>Refered To</th><th>Created On</th><th>Error Message</th><th></th></tr></thead><tbody></tbody></table></div>
      <div class=&quot;pager&quot; id=&quot;failedPager&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;bulk&quot;>
      <div class=&quot;tabbar&quot; style=&quot;border-radius:8px 8px 0 0;margin-bottom:18px&quot;><button class=&quot;tab on&quot;>Bulk Upload</button><button class=&quot;tab&quot;>Data Download</button><button class=&quot;tab&quot;>Bulk Status Change</button><button class=&quot;tab&quot;>Bulk Refer</button></div>
      <div class=&quot;ctrls&quot;><div class=&quot;right&quot;><span class=&quot;select&quot;>File Name <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span><span class=&quot;select&quot; style=&quot;min-width:200px&quot;>ExtraaEdge Admin <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span></div></div>
      <div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;bulkTbl&quot;><thead><tr><th>File Name</th><th>Upload Date</th><th>Uploaded By</th><th class=&quot;num&quot;>Total Records</th><th>Stage</th></tr></thead><tbody></tbody></table></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;campaign&quot;>
      <div class=&quot;lm-tabs&quot;><button class=&quot;lm-tab on&quot;>All Bulk Communications (30)</button></div>
      <div id=&quot;cmpList&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;workflow&quot;>
      <div class=&quot;vhead&quot;><h2>Workflow Automation</h2><div class=&quot;right&quot;><span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Sample data</span></span></div></div>
      <div class=&quot;privacy-bar&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>These automations run quietly in the background to save your team time. <b>Internal rules, conditions and configuration are not shown.</b></span></div>
      <div class=&quot;wf-grid&quot; id=&quot;wfGrid&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;basic&quot;>
      <div class=&quot;tabbar&quot; style=&quot;border-radius:8px 8px 0 0;margin-bottom:18px&quot;><button class=&quot;tab on&quot;>Email Templates</button><button class=&quot;tab&quot;>SMS Templates</button><button class=&quot;tab&quot;>Lead Score</button><button class=&quot;tab&quot;>Assignment Rules</button></div>
      <div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;tmplTbl&quot;><thead><tr><th>Template Name</th><th>Subject</th><th>Stage</th><th>Visibility</th><th>Actions</th></tr></thead><tbody></tbody></table></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;advanced&quot;>
      <div class=&quot;vhead&quot;><h2>Settings</h2></div>
      <div class=&quot;set-sec&quot;><div class=&quot;h&quot;>Dropdown Values</div><div class=&quot;set-card&quot; data-toast=&quot;Setup Dropdown Values&quot;>Setup Dropdown Values <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></div></div>
      <div class=&quot;set-sec&quot;><div class=&quot;h&quot;>Users &amp;amp; Roles</div><div class=&quot;set-card&quot; data-toast=&quot;User Profiles&quot;>User Profiles <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></div></div>
      <div class=&quot;set-sec&quot;><div class=&quot;h&quot;>Communications</div><div class=&quot;set-card&quot; data-toast=&quot;Template Settings&quot;>Template Settings <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;integration&quot;>
      <div class=&quot;vhead&quot;><h2>Third Party integrations</h2></div>
      <div class=&quot;int-stats&quot;>
        <div class=&quot;int-stat&quot;><div class=&quot;l&quot;>Total Integrations</div><div class=&quot;v&quot;>60+</div></div>
        <div class=&quot;int-stat pub&quot;><div class=&quot;l&quot;>Live &amp;amp; Ready</div><div class=&quot;v&quot;>60+</div></div>
        <div class=&quot;int-stat unp&quot; style=&quot;border:0&quot;><div class=&quot;l&quot;>Categories</div><div class=&quot;v&quot; style=&quot;color:var(--o)&quot;>8</div></div>
      </div>
      <div class=&quot;int-bar&quot;><button class=&quot;btn&quot; id=&quot;intRefresh&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg> Refresh</button><button class=&quot;btn pri&quot; data-toast=&quot;Request an integration&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><line x1=&quot;12&quot; y1=&quot;5&quot; x2=&quot;12&quot; y2=&quot;19&quot;/><line x1=&quot;5&quot; y1=&quot;12&quot; x2=&quot;19&quot; y2=&quot;12&quot;/></svg> Request an integration</button></div>
      <div class=&quot;int-cats&quot; id=&quot;intCats&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;ticket&quot;>
      <div class=&quot;vhead&quot;><h2>Raise a Ticket</h2></div>
      <div class=&quot;placeholder&quot;><div class=&quot;ic&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;1.8&quot;><path d=&quot;M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z&quot;/></svg></div><b>Support</b><span>Our team responds to your tickets 24×7.</span></div>
    </section>
  </main>
</div>
<div class=&quot;toasts&quot; id=&quot;toasts&quot;></div>
<script>
(function(){
  var $=function(s,c){return (c||document).querySelector(s);};
  var $$=function(s,c){return [].slice.call((c||document).querySelectorAll(s));};
  var views=$$('.view'), navs=$$('.nav[data-go]'), subnavs=$$('.subnav'), ticket=$('.ticket');
  function go(v){
    views.forEach(function(s){s.classList.toggle('on', s.dataset.v===v);});
    navs.forEach(function(n){n.classList.toggle('on', n.dataset.go===v);});
    subnavs.forEach(function(n){n.classList.toggle('on', n.dataset.go===v);});
    var main=$('#main'); if(main) main.scrollTop=0;
    closeSidebar();
    if(v==='mgmt') drawFunnel();
    if(v==='outcomes') drawOutcomes();
    var av=$('.view[data-v=&quot;'+v+'&quot;]');
    if(av) $$('.lead.open',av).forEach(function(c){var b=c.querySelector('.lead-body');if(b)b.style.maxHeight=b.scrollHeight+'px';});
  }
  function userStop(){ if(window.__laxmiStopTour) window.__laxmiStopTour(); }
  navs.forEach(function(n){ n.addEventListener('click',function(){ userStop(); go(n.dataset.go); }); });
  subnavs.forEach(function(n){ n.addEventListener('click',function(){ userStop(); go(n.dataset.go); }); });
  if(ticket) ticket.addEventListener('click',function(){ userStop(); go('ticket'); });
  $$('.nav[data-toggle]').forEach(function(btn){btn.addEventListener('click',function(){
    var sub=$('#sub-'+btn.dataset.toggle);
    btn.classList.add('exp'); if(sub) sub.classList.add('open');
    if(btn.dataset.toggle==='analytics'){ userStop(); go('mgmt'); }
  });});
  var side=$('#side'), scrim=$('#scrim'), burger=$('#burger');
  function openSidebar(){ side.classList.add('show'); scrim.classList.add('show'); }
  function closeSidebar(){ side.classList.remove('show'); scrim.classList.remove('show'); }
  if(burger) burger.addEventListener('click',openSidebar);
  if(scrim) scrim.addEventListener('click',closeSidebar);
  var t0=Date.now(), tEl=$('#sessTimer');
  setInterval(function(){var s=Math.floor((Date.now()-t0)/1000);
    var h=Math.floor(s/3600),m=Math.floor(s%3600/60),ss=s%60;
    if(tEl) tEl.textContent=[h,m,ss].map(function(n){return(n<10?'0':'')+n;}).join(':');},1000);
  var toasts=$('#toasts');
  function toast(icon,title,msg){
    var t=document.createElement('div'); t.className='toast';
    t.innerHTML='<span class=&quot;ti&quot;>'+icon+'</span><div><b>'+title+'</b>'+(msg||'')+'</div>';
    toasts.appendChild(t);
    requestAnimationFrame(function(){requestAnimationFrame(function(){t.classList.add('in');});});
    setTimeout(function(){t.classList.remove('in');setTimeout(function(){t.remove();},400);},3000);
    while(toasts.children.length>3) toasts.removeChild(toasts.firstChild);
  }
  window.__toast=toast;
  $('#bell').addEventListener('click',function(){ $('#bellCnt').textContent='0'; toast('🔔','193 notifications','Latest: Meera J. paid fees · enrolled'); });
  $('#addBtn').addEventListener('click',function(){ toast('➕','Quick add','Create a new lead, task or campaign'); });
  $$('[data-toast]').forEach(function(el){el.addEventListener('click',function(){toast('✨',el.dataset.toast,'Live in your real workspace');});});
  $$('.tabbar').forEach(function(bar){bar.addEventListener('click',function(e){var t=e.target.closest('.tab');if(!t)return;$$('.tab',bar).forEach(function(x){x.classList.toggle('on',x===t);});});});
  $$('.subtabbar').forEach(function(bar){bar.addEventListener('click',function(e){var t=e.target.closest('.subtab');if(!t)return;$$('.subtab',bar).forEach(function(x){x.classList.toggle('on',x===t);});});});
  var FUNNEL=[{l:'New Leads',v:917,c:'var(--f1)'},{l:'Qualified',v:812,c:'var(--f3)'},{l:'Counselling',v:690,c:'var(--f4)'},{l:'Application',v:540,c:'var(--f5)'},{l:'Admission',v:386,c:'var(--grn)'}];
  function drawFunnel(){
    var f=$('#mgmtFunnel'), lg=$('#mgmtLegend'); if(!f||lg.dataset.done) return;
    var n=FUNNEL.length;
    FUNNEL.forEach(function(d,i){
      var bar=document.createElement('div'); bar.className='fbar';
      var topW=100-i*(70/n);
      bar.style.background=d.c; bar.style.color='#fff'; bar.style.width='0%'; bar.textContent=d.v;
      f.appendChild(bar);
      requestAnimationFrame(function(){requestAnimationFrame(function(){bar.style.width=topW+'%';});});
      var li=document.createElement('div'); li.className='li'; li.innerHTML='<i style=&quot;background:'+d.c+'&quot;></i>'+d.l+': <b>'+d.v+'</b>'; lg.appendChild(li);
    });
    lg.dataset.done='1';
  }
  drawFunnel();
  var aiIc={
    voice:'<path d=&quot;M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2 4.2 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.7c.4 2.3 1.2 3 .2 4.2L8 9.9a16 16 0 0 0 6 6l2-1.4c1.2-1 1.9-.2 4.2.2A2 2 0 0 1 22 16.9z&quot;/>',
    gpt:'<path d=&quot;M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z&quot;/><path d=&quot;M9 10h.01M13 10h.01&quot;/>',
    waba:'<path d=&quot;M21 11.5a8.4 8.4 0 0 1-11.3 7.6L3 21l1.9-5.7A8.5 8.5 0 1 1 21 11.5z&quot;/>',
    pulse:'<path d=&quot;M22 12h-4l-3 9L9 3l-3 9H2&quot;/>'
  };
  var chk='<svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2.5&quot;><path d=&quot;M20 6 9 17l-5-5&quot;/></svg>';
  function aiViz(k){
    if(k==='voice'){var s='';for(var i=0;i<15;i++){s+='<i style=&quot;animation-delay:'+(i*0.07)+'s;animation-duration:'+(0.7+(i%4)*0.12)+'s&quot;></i>';}return '<div class=&quot;ai-wave&quot;>'+s+'</div>';}
    if(k==='gpt')return '<div class=&quot;ai-chat&quot;><div class=&quot;ai-bub a&quot;>Hi! What are the fees?</div><div class=&quot;ai-bub u&quot;>Here you go 📄 - book a call?</div></div>';
    if(k==='waba')return '<div class=&quot;ai-chat&quot; style=&quot;align-items:flex-end&quot;><div class=&quot;ai-wabub&quot;>Your counselling slot is booked ✅</div></div>';
    if(k==='pulse')return '<div class=&quot;ai-pulse&quot;><span>92</span></div>';
    return '';
  }
  var AI=[
    {k:'voice',name:'VidyaAI Voice Agent',tag:'AI voice calls in 10+ languages',live:1,desc:'An AI voice agent that calls new enquiries the moment they arrive, qualifies them and books counselling slots - in Hindi, Marathi and 10+ Indian languages.',pts:['Human-like voice, 24×7','Calls &amp; qualifies in under 60 seconds','Books slots and updates the CRM on its own']},
    {k:'gpt',name:'VidyaGPT',tag:'Your 24×7 AI admissions counsellor',live:1,desc:'A conversational AI that answers student questions instantly, guides them through admissions and never lets a query go cold.',pts:['Answers course &amp; fee queries instantly','Understands context like a real counsellor','Hands warm leads off to your team']},
    {k:'waba',name:'VidyaWABA',tag:'WhatsApp Business API, automated',live:1,desc:'Official verified WhatsApp automation - segmented broadcasts, fee reminders and document nudges that run on their own, with every reply synced to the lead.',pts:['Verified WhatsApp Business API','Automated journeys &amp; broadcasts','Two-way chats synced to every lead']},
    {k:'pulse',name:'VidyaPulse',tag:'Real-time lead intent &amp; buying signals',live:1,desc:'Continuously scores every lead on intent and surfaces buying signals, so counsellors always act on the hottest leads first.',pts:['Live AI intent score per lead','Buying-signal alerts in real time','Auto-prioritised work queue']}
  ];
  (function(){
    var g=$('#aiGrid'); if(!g) return;
    AI.forEach(function(a){
      var c=document.createElement('div'); c.className='ai-card';
      c.innerHTML='<div class=&quot;top&quot;><div class=&quot;ai-ic&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;>'+aiIc[a.k]+'</svg></div>'+
        '<div class=&quot;nm&quot;><h3>'+a.name+'</h3><span>'+a.tag+'</span></div>'+(a.live?'<span class=&quot;live&quot;><i></i>LIVE</span>':'')+'</div>'+
        '<div class=&quot;ai-viz&quot;>'+aiViz(a.k)+'</div>'+
        '<div class=&quot;ai-body&quot;><p>'+a.desc+'</p><ul>'+a.pts.map(function(p){return '<li>'+chk+p+'</li>';}).join('')+'</ul></div>';
      g.appendChild(c);
    });
  })();
  var INTEG_BASE='https://www.extraaedge.com/wp-content/uploads/integration-icons/';
  var INTEG=[
    ['Cloud Telephony',[['3CX','3CX.png'],['Ameyo','Ameyo.png'],['Exotel','Exotel.png'],['Knowlarity','Knowlarity.png'],['MyOperator','MyOperator.png'],['Ozonetel','Ozonetel.png'],['Servetel','Servetel.png'],['Smartflo','Smartflo.png'],['TeleCMI','TeleCMI.png']]],
    ['Lead Sources &amp; Marketplaces',[['CollegeDekho','CollegeDekho.png'],['Jagran Josh','Jagran%20Josh.png'],['Justdial','Justdial.png'],['Shiksha','Shiksha.png'],['Sulekha','Sulekha.png']]],
    ['Advertising &amp; Remarketing',[['Google Ads','Google%20Ads.png'],['Facebook Ads','Facebook%20Ads.png'],['Instagram','Instagram.png'],['LinkedIn Ads','LinkedIn%20Ads.png']]],
    ['Payments &amp; Banking',[['Razorpay','Razorpay.png'],['Paytm','Paytm.png'],['Stripe','Stripe.png'],['HDFC Bank','HDFC%20Bank.png'],['Mastercard','Mastercard.png']]],
    ['Forms &amp; Website Builders',[['WordPress','WordPress.png'],['Wix','Wix.png'],['Contact Form 7','Contact%20Form%207.png'],['Zoho Forms','Zoho%20Forms.png']]],
    ['Learning &amp; Assessment',[['CollPoll','CollPoll.png'],['Learnyst','Learnyst.png'],['Populi','Populi.png'],['Wheebox','Wheebox.png']]],
    ['Automation &amp; Productivity',[['Zapier','Zapier.png'],['SendGrid','SendGrid.png']]]
  ];
  var INTEG_SEC=['Security &amp; Compliance',[['ISO Certified','iso%20certified%20logo.png'],['GDPR Ready','GDPR%20logo%20.png'],['India Data Residency','india-data-residency-logo.png'],['Role-Based Access','role-based-acccess-logo.png']]];
  (function(){var host=$('#intCats'); if(!host) return;
    function tile(it){return '<div class=&quot;int-tile&quot;><div class=&quot;logo&quot;><img src=&quot;'+INTEG_BASE+it[1]+'&quot; alt=&quot;'+it[0]+'&quot; loading=&quot;lazy&quot; onerror=&quot;this.closest(&amp;quot;.logo&amp;quot;).style.display=&amp;quot;none&amp;quot;&quot;></div><span>'+it[0]+'</span></div>';}
    function section(title,items,cls){var sec=document.createElement('div'); sec.className='int-cat'+(cls?' '+cls:'');
      sec.innerHTML='<div class=&quot;ch&quot;><h3>'+title+'</h3><span class=&quot;ct&quot;>'+items.length+'</span><span class=&quot;ln&quot;></span></div><div class=&quot;int-grid&quot;>'+items.map(tile).join('')+'</div>';
      host.appendChild(sec);}
    INTEG.forEach(function(c){section(c[0],c[1]);});
    section(INTEG_SEC[0],INTEG_SEC[1],'int-sec-badges');
  })();
  var _ir=$('#intRefresh'); if(_ir) _ir.addEventListener('click',function(){toast('🔄','Refreshed','All integrations up to date');});
  var ocIcon={bolt:'<path d=&quot;M13 2 3 14h7l-1 8 10-12h-7l1-8z&quot;/>',up:'<path d=&quot;M3 17l6-6 4 4 7-7&quot;/><path d=&quot;M17 8h4v4&quot;/>',wa:'<path d=&quot;M21 11.5a8.4 8.4 0 0 1-11.3 7.6L3 21l1.9-5.7A8.5 8.5 0 1 1 21 11.5z&quot;/>',people:'<path d=&quot;M17 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2&quot;/><circle cx=&quot;9&quot; cy=&quot;7&quot; r=&quot;4&quot;/>',roi:'<circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;9&quot;/><path d=&quot;M12 6v12M15 9.5A3.5 3 0 0 0 11.5 8H10a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-1.5A3.5 3 0 0 1 9 14.5&quot;/>'};
  var OUTCOMES=[
    {ac:'--o',acs:'var(--o-soft)',ic:'bolt',lab:'Lead Response Time',big:'30 sec',sub:'Average first response to a new enquiry - VidyaAI calls and messages the instant a lead arrives.',tr:'12× faster than manual',ba:[['Manual','old',100,'6h 12m'],['ExtraaEdge','',6,'30 sec']]},
    {ac:'--grn',acs:'var(--grn-soft)',ic:'up',lab:'Admission Conversion Rate',big:'42%',sub:'Enquiry → enrolled this cycle, with AI prioritising the hottest, highest-intent leads first.',tr:'+40% vs last cycle',ba:[['This cycle','',100,'42%'],['Last cycle','old',71,'30%']]},
    {ac:'--blue',acs:'#e6f0fb',ic:'wa',lab:'WhatsApp Automation',big:'94%',sub:'Conversations handled automatically - reminders, nudges and FAQs, synced to every lead.',tr:'24,000+ messages automated',ba:[['Automated','',94,'94%'],['Manual','old',6,'6%']]},
    {ac:'--nav',acs:'#e8edf5',ic:'people',lab:'Counselor Productivity',big:'3.5×',sub:'More leads converted per counsellor - they only talk to warm, ready-to-enrol students.',tr:'70 quality calls / day',ba:[['With AI','',100,'70/day'],['Before','old',27,'19/day']]},
    {ac:'--o',acs:'var(--o-soft)',ic:'roi',lab:'Revenue &amp; ROI',big:'6.5×',sub:'Return on investment, with ₹4.2 Cr in revenue influenced this cycle and a lower cost per enrolment.',tr:'₹4.2 Cr revenue · cost/enrol ↓ 46%',ba:[['Return','',100,'6.5×'],['Cost / enrol','old',54,'↓ 46%']]}
  ];
  function drawOutcomes(){
    var g=$('#ocGrid'); if(!g) return;
    if(!g.dataset.built){
      OUTCOMES.forEach(function(o){
        var c=document.createElement('div'); c.className='oc-card'; c.style.setProperty('--ac','var('+o.ac+')'); c.style.setProperty('--acs',o.acs);
        c.innerHTML='<div class=&quot;ic&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;>'+ocIcon[o.ic]+'</svg></div>'+
          '<div class=&quot;lab&quot;>'+o.lab+'</div><div class=&quot;big&quot;>'+o.big+'</div><div class=&quot;sub&quot;>'+o.sub+'</div>'+
          '<div class=&quot;tr&quot;>▲ '+o.tr+'</div>'+
          '<div class=&quot;ba&quot;>'+o.ba.map(function(r){return '<div class=&quot;r '+(r[1])+'&quot;><b>'+r[0]+'</b><span class=&quot;tk&quot;><i data-w=&quot;'+r[2]+'&quot;></i></span><em>'+r[3]+'</em></div>';}).join('')+'</div>';
        g.appendChild(c);
      });
      g.dataset.built='1';
    }
    g.querySelectorAll('.ba i').forEach(function(i){ i.style.width='0'; requestAnimationFrame(function(){requestAnimationFrame(function(){ i.style.width=i.dataset.w+'%'; });}); });
  }
  drawOutcomes();
  function rows(tb,data){var b=$(tb+' tbody'); if(!b)return; data.forEach(function(r){var tr=document.createElement('tr'); if(r.cls)tr.className=r.cls; if(r.lvl!=null)tr.dataset.level=r.lvl; tr.innerHTML=r.html; b.appendChild(tr);});}
  function wireTree(tb){var t=$(tb+' tbody'); if(!t)return;
    t.addEventListener('click',function(e){var ex=e.target.closest('.exp'); if(!ex)return;
      var tr=ex.closest('tr'), lvl=+tr.dataset.level; if(isNaN(lvl))return;
      var open=ex.textContent.indexOf('▾')>-1; ex.textContent=open?'▸':'▾';
      var n=tr.nextElementSibling;
      while(n){var nl=+n.dataset.level; if(isNaN(nl)||nl<=lvl)break;
        n.style.display=open?'none':''; n=n.nextElementSibling;}
    });
  }
  var COUNSELORS=[['Counsellor A',228,89,'39%'],['Counsellor B',216,80,'37%'],['Counsellor C',146,53,'36%'],['Counsellor D',145,49,'34%'],['Demo Admin',109,37,'34%'],['Counsellor E',42,15,'36%'],['Counsellor F',25,9,'36%'],['Counsellor G',18,6,'33%']];
  rows('#counselorTbl',COUNSELORS.map(function(r){return {html:'<td>'+r[0]+'</td><td class=&quot;num&quot;>'+r[1]+'</td><td class=&quot;num&quot;>'+r[2]+'</td><td class=&quot;num&quot;>'+r[3]+'</td>'};}));
  rows('#commTbl',[
    {lvl:0,html:'<td><span class=&quot;exp&quot;>▸</span> Manual (5)</td><td class=&quot;num&quot;>400</td><td class=&quot;num&quot;>388</td><td class=&quot;num&quot;>97.0</td><td class=&quot;num&quot;>168</td><td class=&quot;num&quot;>43.3</td><td class=&quot;num&quot;>58</td><td class=&quot;num&quot;>14.5</td><td class=&quot;num&quot;>34.5</td>'},
    {lvl:0,html:'<td><span class=&quot;exp&quot;>▸</span> Campaigns (2)</td><td class=&quot;num&quot;>24220</td><td class=&quot;num&quot;>23252</td><td class=&quot;num&quot;>96.0</td><td class=&quot;num&quot;>9292</td><td class=&quot;num&quot;>40.0</td><td class=&quot;num&quot;>2922</td><td class=&quot;num&quot;>12.6</td><td class=&quot;num&quot;>31.4</td>'},
    {cls:'tot',html:'<td>Total</td><td class=&quot;num&quot;>24620</td><td class=&quot;num&quot;>23640</td><td class=&quot;num&quot;>96.0</td><td class=&quot;num&quot;>9460</td><td class=&quot;num&quot;>40.0</td><td class=&quot;num&quot;>2980</td><td class=&quot;num&quot;>12.6</td><td class=&quot;num&quot;>31.5</td>'}
  ]);
  rows('#pubTbl',[
    {cls:'hl',lvl:0,html:'<td><span class=&quot;exp&quot;>▾</span> UG (1)</td><td class=&quot;num&quot;>10313</td><td class=&quot;num&quot;>2480</td><td class=&quot;num&quot;>760</td><td class=&quot;num&quot;>210</td><td class=&quot;num&quot;>1620</td><td class=&quot;num&quot;>2540</td><td class=&quot;num&quot;>2380</td><td class=&quot;num&quot;>123</td>'},
    {cls:'tot',html:'<td>Total</td><td class=&quot;num&quot;>10313</td><td class=&quot;num&quot;>2480</td><td class=&quot;num&quot;>760</td><td class=&quot;num&quot;>210</td><td class=&quot;num&quot;>1620</td><td class=&quot;num&quot;>2540</td><td class=&quot;num&quot;>2380</td><td class=&quot;num&quot;>123</td>'}
  ]);
  wireTree('#pubTbl'); wireTree('#commTbl');
  function ind(lv){return '<span class=&quot;ind&quot; style=&quot;width:'+(lv*16)+'px&quot;></span>';}
  rows('#demoTbl',[
    {lvl:0,html:'<td>'+ind(0)+'<span class=&quot;exp&quot;>▾</span> India (43)</td><td class=&quot;num&quot;>909</td><td class=&quot;num&quot;>382</td><td class=&quot;num&quot;>42%</td>'},
    {cls:'hl',lvl:1,html:'<td>'+ind(1)+'<span class=&quot;exp&quot;>▸</span> Maharashtra (12)</td><td class=&quot;num&quot;>286</td><td class=&quot;num&quot;>128</td><td class=&quot;num&quot;>45%</td>'},
    {lvl:1,html:'<td>'+ind(1)+'<span class=&quot;exp&quot;>▸</span> Uttar Pradesh (9)</td><td class=&quot;num&quot;>212</td><td class=&quot;num&quot;>88</td><td class=&quot;num&quot;>42%</td>'},
    {lvl:0,html:'<td>'+ind(0)+'<span class=&quot;exp&quot;>▸</span> United States (1)</td><td class=&quot;num&quot;>8</td><td class=&quot;num&quot;>4</td><td class=&quot;num&quot;>50%</td>'},
    {cls:'tot',html:'<td>Total</td><td class=&quot;num&quot;>917</td><td class=&quot;num&quot;>386</td><td class=&quot;num&quot;>42%</td>'}
  ]);
  wireTree('#demoTbl');
  function icon(p){return '<svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;>'+p+'</svg>';}
  var I={ppl:'<path d=&quot;M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2&quot;/><circle cx=&quot;10&quot; cy=&quot;7&quot; r=&quot;4&quot;/>',call:'<path d=&quot;M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2 4.2 2 2 0 0 1 4 2h3a2 2 0 0 1 2 1.7c.4 2.3 1.2 3 .2 4.2L8 9.9a16 16 0 0 0 6 6l2-1.4c1.2-1 1.9-.2 4.2.2A2 2 0 0 1 22 16.9z&quot;/>',mail:'<rect x=&quot;2&quot; y=&quot;4&quot; width=&quot;20&quot; height=&quot;16&quot; rx=&quot;2&quot;/><path d=&quot;m2 6 10 7L22 6&quot;/>',wa:'<path d=&quot;M21 11.5a8.4 8.4 0 0 1-11.3 7.6L3 21l1.9-5.7A8.5 8.5 0 1 1 21 11.5z&quot;/>',sms:'<path d=&quot;M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z&quot;/>',kebab:'<circle cx=&quot;12&quot; cy=&quot;5&quot; r=&quot;1.6&quot;/><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;1.6&quot;/><circle cx=&quot;12&quot; cy=&quot;19&quot; r=&quot;1.6&quot;/>',caret:'<path d=&quot;m6 9 6 6 6-6&quot;/>'};
  var SUBTABS=['Account Details','Deal Attributes','Contact Details','Source Details','Geography details'];
  var TOOLBAR='<span class=&quot;tb&quot;>'+icon('<path d=&quot;m3 11 18-5v12L3 14v-3z&quot;/>')+'</span><span class=&quot;tb&quot;>'+icon(I.call)+'</span><span class=&quot;tb&quot;>'+icon(I.wa)+'</span><span class=&quot;tb&quot;>'+icon(I.sms)+'</span><span class=&quot;tb plain refresh&quot;>'+icon('<path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/>')+'</span><span class=&quot;tb plain&quot;>'+icon('<polygon points=&quot;22 3 2 3 10 12.5 10 19 14 21 14 12.5&quot;/>')+'</span>';
  $$('.lm-toolbar[data-tools]').forEach(function(t){t.innerHTML=TOOLBAR;});
  function buildCard(l,open){
    var card=document.createElement('div'); card.className='lead'+(open?' open':'');
    var fields=l.fields.map(function(f){var cls='v'+(f[2]==='link'?' link':'')+(f[2]==='rmk'?' rmk':'');return '<div class=&quot;field&quot;><div class=&quot;l&quot;>'+f[0]+'</div><div class=&quot;'+cls+'&quot;>'+f[1]+'</div></div>';}).join('');
    var m=l.m||{};
    card.innerHTML='<div class=&quot;lead-head&quot;><span class=&quot;chk&quot;></span><div class=&quot;name&quot;><b>'+l.name+' <span class=&quot;ct&quot;>'+l.count+'</span></b><span>'+(/\d/.test(l.phone)?'<span class=&quot;pii&quot;>'+l.phone+'</span>':l.phone)+'</span></div><div class=&quot;status&quot;><span class=&quot;s1&quot;>'+l.s1+'</span><span class=&quot;s2&quot;>'+l.s2+'</span></div><div class=&quot;metrics&quot;><span class=&quot;m&quot;>'+icon(I.ppl)+(m.ppl||0)+'</span><a class=&quot;viewall&quot;>View all</a><span class=&quot;m&quot;>'+icon(I.call)+(m.call||0)+'</span><span class=&quot;m&quot;>'+icon(I.mail)+(m.mail||0)+'</span><span class=&quot;m&quot;>'+icon(I.wa)+(m.wa||0)+'</span><span class=&quot;m&quot;>'+icon(I.sms)+(m.sms||0)+'</span></div><span class=&quot;kebab&quot;>'+icon(I.kebab)+'</span><span class=&quot;caret&quot;>'+icon(I.caret)+'</span></div><div class=&quot;lead-body&quot;><div class=&quot;lead-subtabs&quot;>'+SUBTABS.map(function(s,i){return '<button class=&quot;lead-subtab'+(i===0?' on':'')+'&quot;>'+s+'</button>';}).join('')+'</div><div class=&quot;lead-fields&quot;>'+fields+'</div></div>';
    $('.lead-head',card).addEventListener('click',function(e){
      if(e.target.closest('.viewall')||e.target.closest('.kebab')){e.stopPropagation();toast('ℹ️','Lead action','Opening details');return;}
      setLeadOpen(card,!card.classList.contains('open'));
    });
    $$('.lead-subtab',card).forEach(function(st){st.addEventListener('click',function(){$$('.lead-subtab',card).forEach(function(x){x.classList.toggle('on',x===st);});});});
    return card;
  }
  function setLeadOpen(card,open){card.classList.toggle('open',open);var body=card.querySelector('.lead-body');if(body) body.style.maxHeight=open?body.scrollHeight+'px':'0px';}
  function renderList(key,data,tab){
    var host=$('[data-list=&quot;'+key+'&quot;]'); if(!host) return;
    var list=data.filter(function(l){return tab==='all'||!l.cat||l.cat.indexOf(tab)>-1;});
    host.innerHTML='';
    if(!list.length){host.innerHTML='<div class=&quot;placeholder&quot;><b>No leads</b><span>No leads in this view.</span></div>';return;}
    list.forEach(function(l,i){var c=buildCard(l,i===0);host.appendChild(c);if(i===0)setLeadOpen(c,true);});
  }
  window.addEventListener('resize',function(){$$('.lead.open').forEach(function(c){var b=c.querySelector('.lead-body');if(b)b.style.maxHeight=b.scrollHeight+'px';});});
  var TABSETS={
    leads:[['all','All',1420],['captured','Lead Captured',286],['open','Open',64],['demopipe','Demo Pipeline',168],['demodone','Demo Done',142],['onboard','Onboarding',96],['referred','Referred From Me',312]],
    rawdata:[['all','All',90328],['raw','Raw Data',90727],['reenq','Re-enquired',7908]],
    followups:[['all','All',50],['done','Done Followups',25],['missed','Missed Followups',5],['planned','Planned Followups',24]]
  };
  function field(l,v,t){return [l,v,t];}
  var WS='[www.example-edu](https://www.example-edu)...';
  var LEADS=[
    {cat:['all','demodone'],name:'Greenwood Institute (Sample)',count:2,phone:'+91 98•• ••• ••01',s1:'Demo Done',s2:'Proposal Sent',m:{ppl:6,call:4,mail:5,wa:3,sms:1},fields:[field('Lead Age','36 Days'),field('Account Segment','Universities'),field('EB Name','A. Sharma'),field('Deal Owner','Counsellor D'),field('Products Used','Admission CRM'),field('Deal Sub-stage','Proposal Sent'),field('Account_Website',WS,'link'),field('Deal Value','₹6.5 L'),field('Remarks','Hot lead - proposal accepted, closing this week','rmk'),field('Buying Month','June'),field('Subscription Status','Negotiation'),field('Lead Added On','May 18, 2026 10:19 AM'),field('Last Updated On','Jun 23, 2026 11:31 AM')]},
    {cat:['all','onboard'],name:'Sunrise Academy (Sample)',count:2,phone:'+91 98•• ••• ••06',s1:'Admission',s2:'Fee Paid',m:{ppl:5,call:3,mail:4,wa:5,sms:1},fields:[field('Lead Age','9 Days'),field('Account Segment','Edtech'),field('EB Name','R. Patel'),field('Deal Owner','Counsellor A'),field('Products Used','Admission CRM + WhatsApp'),field('Deal Sub-stage','Fee Paid'),field('Account_Website',WS,'link'),field('Deal Value','₹4.2 L'),field('Remarks','Enrolled - fee received, onboarding started','rmk'),field('Buying Month','June'),field('Subscription Status','Converted'),field('Lead Added On','Jun 14, 2026 02:10 PM'),field('Last Updated On','Jun 23, 2026 09:40 AM')]},
    {cat:['all','demopipe'],name:'Horizon School (Sample)',count:1,phone:'+91 98•• ••• ••78',s1:'Demo Pipeline',s2:'Demo Scheduled',m:{ppl:4,call:3,mail:1,wa:2,sms:0},fields:[field('Lead Age','12 Days'),field('Account Segment','K-12 Schools'),field('EB Name','M. Rao'),field('Deal Owner','Counsellor B'),field('Products Used','Admission CRM'),field('Deal Sub-stage','Demo Scheduled'),field('Account_Website',WS,'link'),field('Deal Value','₹3.8 L'),field('Remarks','High intent - demo booked for Friday 4 PM'),field('Buying Month','July'),field('Subscription Status','Trial'),field('Lead Added On','Jun 11, 2026 11:00 AM'),field('Last Updated On','Jun 23, 2026 10:05 AM')]}
  ];
  var RAWDATA=[
    {cat:['all','raw'],name:'Maple Academy (Sample)',count:2,phone:'+91 75•• ••• ••57',s1:'Raw Data',s2:'Follow Up 2',m:{ppl:3,call:0,mail:0,wa:0,sms:0},fields:[field('Lead Age','54 Days'),field('Account Segment','Vocational'),field('EB Name','S. Trivedi'),field('Deal Sub-stage','Follow Up 2'),field('Old Stage','01 - Leads'),field('Account_Website',WS,'link'),field('Subscription Status','Subscribed'),field('Lead Added On','Apr 30, 2026 2:53 PM'),field('Last Updated On','Jun 23, 2026 11:47 AM'),field('Old Lead Source','Sample Data')]},
    {cat:['all','raw'],name:'Pinnacle Research (Sample)',count:18,phone:'+91 70•• ••• ••86',s1:'Raw Data',s2:'Follow Up 2',m:{ppl:43,call:0,mail:23,wa:0,sms:0},fields:[field('Lead Age','70 Days'),field('Account Segment','GOI'),field('EB Name','V. Singh'),field('Deal Sub-stage','Follow Up 2'),field('Old Stage','01 - Leads'),field('Account_Website',WS,'link'),field('Subscription Status','Subscribed'),field('Lead Added On','Apr 14, 2026 10:02 AM'),field('Last Updated On','Jun 22, 2026 06:18 PM'),field('Old Lead Source','Sample Data')]}
  ];
  var FOLLOWUPS=[
    {cat:['all','missed'],name:'Riverside Institute (Sample)',count:15,phone:'No Phone',s1:'Raw Data',s2:'Follow Up 2',m:{ppl:64,call:3,mail:28,wa:0,sms:0},fields:[field('Lead Age','70 Days'),field('Account Segment','NGO'),field('EB Name','N. Bhatia'),field('Deal Sub-stage','Follow Up 2'),field('Country','India'),field('State','Delhi'),field('Account_Website',WS,'link'),field('Subscription Status','Subscribed'),field('Lead Added On','Apr 14, 2026 8:23 PM'),field('Last Updated On','Jun 11, 2026 2:46 PM'),field('UTM Campaign','Bulk Upload','link')]},
    {cat:['all','planned'],name:'Crestview Academy (Sample)',count:32,phone:'+91 91•• ••• ••97',s1:'Demo Pipeline',s2:'Demo Scheduled',m:{ppl:55,call:7,mail:12,wa:3,sms:0},fields:[field('Lead Age','41 Days'),field('Account Segment','Colleges'),field('EB Name','A. Verma'),field('Deal Owner','Counsellor C'),field('Deal Sub-stage','Demo Scheduled'),field('Country','India'),field('State','Maharashtra'),field('Account_Website',WS,'link'),field('Remarks','Demo set for Monday'),field('Subscription Status','Trial'),field('Lead Added On','May 13, 2026 3:11 PM'),field('UTM Campaign','Paid Search','link')]}
  ];
  var DATASETS={leads:LEADS,rawdata:RAWDATA,followups:FOLLOWUPS};
  $$('.lm-tabs[data-tabs]').forEach(function(bar){
    var key=bar.dataset.tabs;
    TABSETS[key].forEach(function(t,i){var b=document.createElement('button');b.className='lm-tab'+(i===0?' on':'');b.dataset.f=t[0];b.textContent=t[1]+' ('+t[2].toLocaleString()+')';bar.appendChild(b);});
    bar.addEventListener('click',function(e){var t=e.target.closest('.lm-tab');if(!t)return;$$('.lm-tab',bar).forEach(function(x){x.classList.toggle('on',x===t);});renderList(key,DATASETS[key],t.dataset.f);});
    renderList(key,DATASETS[key],'all');
  });
  $$('.lm-sort').forEach(function(s){s.addEventListener('click',function(){toast('↕️','Sorted','Order updated');});});
  document.addEventListener('click',function(e){var r=e.target.closest('.tb.refresh');if(r){toast('🔄','Refreshed','List updated');}});
  var WA=[{n:'Greenwood Institute (Sample)',p:'No Phone',a:'Open',b:'Unresponsive'},{n:'Maple Academy (Sample)',p:'+91 98•• ••• ••67',a:'Raw Data',b:'Untouched'},{n:'Horizon School (Sample)',p:'+91 92•• ••• ••38',a:'Raw Data',b:'Untouched'},{n:'Nova College (Sample)',p:'+91 96•• ••• ••34',a:'Raw Data',b:'Untouched'},{n:'Crestview Academy (Sample)',p:'+91 85•• ••• ••04',a:'Demo Pipeline',b:'Demo Scheduled'}];
  (function(){var host=$('#waList'); if(!host)return;
    WA.forEach(function(w){var row=document.createElement('div');row.className='wa-row';
      row.innerHTML='<span class=&quot;chk&quot;></span><div class=&quot;nm&quot;><b>'+w.n+'</b><span>'+(/\d/.test(w.p)?'<span class=&quot;pii&quot;>'+w.p+'</span>':w.p)+'</span></div><div class=&quot;st&quot;><span class=&quot;a&quot;>'+w.a+'</span><span class=&quot;b&quot;>'+w.b+'</span></div><div class=&quot;links&quot;><span>'+icon('<path d=&quot;M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7&quot;/>')+'Open Lead</span></div><div class=&quot;ic&quot;>'+icon(I.call)+icon(I.mail)+icon(I.wa)+'</div><span class=&quot;caret&quot;>'+icon(I.caret)+'</span>';
      row.addEventListener('click',function(){toast('💬','Chat opened',w.n);});
      host.appendChild(row);});
    var pg=$('#waPager');var html='<button>‹</button>';for(var i=1;i<=8;i++)html+='<button'+(i===1?' class=&quot;on&quot;':'')+'>'+i+'</button>';html+='<button>›</button>';pg.innerHTML=html;
    pg.addEventListener('click',function(e){var b=e.target.closest('button');if(!b||isNaN(+b.textContent))return;$$('button',pg).forEach(function(x){x.classList.toggle('on',x===b);});});
  })();
  (function(){
    var grid=$('#calGrid'), label=$('#calLabel'); if(!grid) return;
    var months=['January','February','March','April','May','June','July','August','September','October','November','December'];
    var cur=new Date(2026,5,1), dots=[3,12,18,24];
    function draw(){
      label.textContent=months[cur.getMonth()]+' '+cur.getFullYear();
      grid.innerHTML='';
      ['S','M','T','W','T','F','S'].forEach(function(d){var e=document.createElement('div');e.className='dow';e.textContent=d;grid.appendChild(e);});
      var first=new Date(cur.getFullYear(),cur.getMonth(),1).getDay();
      var days=new Date(cur.getFullYear(),cur.getMonth()+1,0).getDate();
      for(var i=0;i<first;i++){grid.appendChild(document.createElement('div'));}
      for(var d=1;d<=days;d++){var e=document.createElement('div');e.className='d';
        if(d===23&amp;&amp;cur.getMonth()===5)e.className+=' on';
        if(dots.indexOf(d)>-1)e.className+=' dot';
        e.textContent=d;(function(d){e.addEventListener('click',function(){toast('📅','Followups',months[cur.getMonth()]+' '+d);});})(d);
        grid.appendChild(e);}
    }
    $('#calPrev').addEventListener('click',function(){cur.setMonth(cur.getMonth()-1);draw();});
    $('#calNext').addEventListener('click',function(){cur.setMonth(cur.getMonth()+1);draw();});
    draw();
  })();
  var FAILED=[['Sample Lead 01'],['Sample Lead 02'],['Sample Lead 03'],['Sample Lead 04'],['Sample Lead 05'],['Sample Lead 06']];
  rows('#failedTbl',FAILED.map(function(r){return {html:'<td><span class=&quot;chk&quot; style=&quot;display:inline-block;width:15px;height:15px;border:1.5px solid #dce1ea;border-radius:4px&quot;></span></td><td>'+r[0]+'</td><td><span class=&quot;pii&quot;>name@example.edu</span></td><td><span class=&quot;pii&quot;>+91 98•• ••• ••00</span></td><td>Demo Admin</td><td>Jun 22, 2026 7:20 PM</td><td>Email or mobile number already registered</td><td><div class=&quot;actcell&quot;>'+icon('<line x1=&quot;12&quot; y1=&quot;5&quot; x2=&quot;12&quot; y2=&quot;19&quot;/><line x1=&quot;5&quot; y1=&quot;12&quot; x2=&quot;19&quot; y2=&quot;12&quot;/>')+'<span class=&quot;del&quot;>'+icon('<path d=&quot;M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6&quot;/>')+'</span></div></td>'};}));
  (function(){var pg=$('#failedPager'); if(!pg)return; var html='<button>‹</button>';[1,2,3,4,5].forEach(function(i){html+='<button'+(i===1?' class=&quot;on&quot;':'')+'>'+i+'</button>';});html+='<span style=&quot;margin:0 6px&quot;>...</span><button>290</button><button>›</button>';pg.innerHTML=html;
    pg.addEventListener('click',function(e){var b=e.target.closest('button');if(!b||isNaN(+b.textContent))return;$$('button',pg).forEach(function(x){x.classList.remove('on');});b.classList.add('on');});})();
  var BULK=[['Untitled spreadsheet - Sheet1 (5).csv','May 18, 2026 11:03 AM',7],['Upload updated data - Sheet1 (1).csv','May 18, 2026 10:19 AM',86],['Updated Data_4 - Sheet1.csv','May 11, 2026 6:22 PM',1158],['Updated Data_2 - Sheet1.csv','May 11, 2026 6:09 PM',300],['_upload data - Sheet1.csv','May 6, 2026 4:15 PM',17],['Datase - Sheet1.csv','May 5, 2026 5:30 PM',86]];
  rows('#bulkTbl',BULK.map(function(r){return {html:'<td>'+r[0]+'</td><td>'+r[1]+'</td><td>ExtraaEdge Admin</td><td class=&quot;num&quot;>'+r[2]+'</td><td><span class=&quot;badge green&quot;>Completed</span></td>'};}));
  var CMP=[['May 7, 2026 5:29 PM','May 7, 2026 5:31 PM'],['Apr 27, 2026 4:02 PM','Apr 27, 2026 4:04 PM'],['Apr 27, 2026 4:01 PM','Apr 27, 2026 4:03 PM'],['Apr 27, 2026 3:59 PM','Apr 27, 2026 4:01 PM']];
  (function(){var host=$('#cmpList'); if(!host)return;
    CMP.forEach(function(r){var row=document.createElement('div');row.className='cmp-row';
      row.innerHTML='<div class=&quot;c&quot;><div class=&quot;l&quot;>Institute Name</div><div class=&quot;v&quot;>BulkCommunication...</div></div><div class=&quot;c&quot;><div class=&quot;l&quot;>Stage</div><div class=&quot;v&quot;><span class=&quot;badge green&quot;>COMPLETED</span></div></div><div class=&quot;c&quot;><div class=&quot;l&quot;>Created On</div><div class=&quot;v&quot;>'+r[0]+'</div></div><div class=&quot;c&quot;><div class=&quot;l&quot;>Created By</div><div class=&quot;v&quot;>ExtraaEdge Admin</div></div><div class=&quot;c&quot;><div class=&quot;l&quot;>Updated On</div><div class=&quot;v&quot;>'+r[1]+'</div></div><div class=&quot;c&quot;><div class=&quot;l&quot;>Rule</div><div class=&quot;v&quot;>Based on No. of days...</div></div><div class=&quot;acts&quot;>'+icon('<path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/>')+'</div><span class=&quot;caret&quot;>'+icon(I.caret)+'</span>';
      host.appendChild(row);});
  })();
  var WF=[{title:'Instant lead response',desc:'New enquiry → AI call + WhatsApp within seconds.'},{title:'Fee reminder journey',desc:'Timely nudges until the admission fee is paid.'},{title:'Re-engagement for cold leads',desc:'Automatically wins back leads that went silent.'},{title:'Document collection nudges',desc:'Reminds applicants to upload pending documents.'},{title:'Counsellor handoff',desc:'Routes warm, qualified leads to the right counsellor.'},{title:'Post-demo follow-up',desc:'Keeps the momentum going after a demo or counselling call.'}];
  (function(){var g=$('#wfGrid'); if(!g)return;
    WF.forEach(function(w){var c=document.createElement('div');c.className='set-card';c.style.cssText='cursor:default;align-items:center';
      c.innerHTML='<div style=&quot;flex:1&quot;><div style=&quot;font-weight:700;color:var(--nav);margin-bottom:3px&quot;>'+w.title+'</div><div style=&quot;font-size:12.5px;color:var(--mut);font-weight:400&quot;>'+w.desc+'</div></div><span class=&quot;badge green&quot;>Active</span>';
      g.appendChild(c);});
  })();
  var TMPL=[['welcome_email_01','Welcome to our institute!','done',1],['followup_sms_02','Quick follow-up on your enquiry','draft',1],['call_reminder_01','Your counsellor will call you soon','done',1],['admission_update_03','Your application status update','done',1],['otp_verification_01','Verify your account to continue','done',1],['appointment_confirm_01','Your appointment is confirmed','done',1]];
  rows('#tmplTbl',TMPL.map(function(r){var badge=r[2]==='done'?'<span class=&quot;badge done&quot;>Published</span>':'<span class=&quot;badge draft&quot;>Draft</span>';return {html:'<td>'+r[0]+'</td><td>'+r[1]+'</td><td>'+badge+'</td><td><span class=&quot;toggle'+(r[3]?'':' off')+'&quot;></span></td><td><div class=&quot;actcell&quot;>'+icon('<rect x=&quot;9&quot; y=&quot;9&quot; width=&quot;13&quot; height=&quot;13&quot; rx=&quot;2&quot;/><path d=&quot;M5 15V5a2 2 0 0 1 2-2h10&quot;/>')+'<span class=&quot;del&quot;>'+icon('<path d=&quot;M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6&quot;/>')+'</span></div></td>'};}));
  document.addEventListener('click',function(e){var tg=e.target.closest('.toggle');if(tg)tg.classList.toggle('off');});
  var search=$('#search');
  if(search) search.addEventListener('keydown',function(e){if(e.key==='Enter'){userStop();go('leads');toast('🔎','Search','Showing matches for &quot;'+(search.value||'all')+'&quot;');}});
  /* ── guided tour ── */
  var tReduce=matchMedia('(prefers-reduced-motion: reduce)').matches;
  function tMobile(){return window.innerWidth<=860;}
  function si(p){return '<svg viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;>'+p+'</svg>';}
  var tSpot=document.createElement('div'); tSpot.className='tour-spot';
  var tTip=document.createElement('div'); tTip.className='tour-tip';
  tTip.innerHTML='<div class=&quot;stp&quot;></div><h4></h4><p></p><div class=&quot;row&quot;><div class=&quot;dts&quot;></div><button class=&quot;sk&quot;>Skip tour</button><button class=&quot;nx&quot;>Next →</button></div>';
  document.body.appendChild(tSpot); document.body.appendChild(tTip);
  var tDock=document.createElement('div'); tDock.className='tour-dock';
  tDock.innerHTML='<button class=&quot;dbtn restart&quot; title=&quot;Restart&quot;>'+si('<path d=&quot;M12 5V2L7 6l5 4V7a5 5 0 1 1-5 5H5a7 7 0 1 0 7-7z&quot;/>')+'</button><button class=&quot;dbtn play&quot; title=&quot;Play / Pause&quot;></button><div class=&quot;ddots&quot;></div><span class=&quot;lbl&quot;>Product tour</span><button class=&quot;dbtn close&quot; title=&quot;Close&quot;>'+si('<path d=&quot;M18.3 5.7 12 12l6.3 6.3-1.4 1.4L10.6 13.4 4.3 19.7 2.9 18.3 9.2 12 2.9 5.7 4.3 4.3l6.3 6.3 6.3-6.3z&quot;/>')+'</button>';
  document.body.appendChild(tDock);
  var demoCta=document.createElement('div'); demoCta.className='demo-cta';
  demoCta.innerHTML=si('<path d=&quot;M7 2v3M17 2v3M3.5 9h17M5 4h14a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z&quot;/>')+' Book a demo';
  document.body.appendChild(demoCta);
  demoCta.addEventListener('click',function(){ openBookModal(); });
  var BOOK_DEMO_URL='https://www.extraaedge.com/book-a-demo/';
  /* the rich popup lives on the parent page; the demo just asks it to open */
  function openBookModal(){ try{ if(window.parent && window.parent!==window){ window.parent.postMessage('ee-book-open','*'); } else { window.open(BOOK_DEMO_URL,'_blank','noopener'); } }catch(e){ window.open(BOOK_DEMO_URL,'_blank','noopener'); } }
  /* Explore mode: any click outside the left menu / tour controls opens the popup */
  document.addEventListener('click',function(e){
    var t=e.target;
    if(t && t.closest && t.closest('#side,#burger,#scrim,.tour-tip,.tour-dock,.tour-spot,.demo-cta,.toasts,.toast')) return;
    e.preventDefault(); e.stopPropagation();
    openBookModal();
  },true);
  var PLAY=si('<path d=&quot;M8 5v14l11-7z&quot;/>'), PAUSE=si('<path d=&quot;M6 5h4v14H6zM14 5h4v14h-4z&quot;/>');
  var playBtn=tDock.querySelector('.play'), ddots=tDock.querySelector('.ddots'), lbl=tDock.querySelector('.lbl'), tipDots=tTip.querySelector('.dts');
  var TSTEPS=[
    {v:'outcomes',sel:'#side',side:1,t:'This is your Admission CRM',b:'A privacy-first demo on <b>sample data</b>. Let us start with the <b>results</b> it delivers 👇'},
    {v:'outcomes',sel:'#ocGrid',t:'Business outcomes, not just screens',b:'Faster <b>lead response</b>, higher <b>conversion</b>, more <b>WhatsApp automation</b>, better <b>productivity</b> and stronger <b>ROI</b>.'},
    {v:'ai',sel:'#aiGrid',t:'Powered by Vidya AI',b:'Four AI products: <b>Voice Agent</b> calls leads, <b>VidyaGPT</b> chats 24×7, <b>VidyaWABA</b> automates WhatsApp, <b>VidyaPulse</b> scores intent.'},
    {v:'mgmt',sel:'.view[data-v=&quot;mgmt&quot;] .panel',t:'Management · Live Funnel',b:'<b>917 enquiries → 386 admissions (42%)</b>, with strong movement at every stage.'},
    {v:'counselor',sel:'#counselorTbl',t:'Counselor · Leaderboard',b:'Total leads, enrolled and <b>conversion %</b> for every counsellor.'},
    {v:'comm',sel:'#commTbl',t:'Communication · Email Overview',b:'<b>24,620 sent</b>, <b>96% delivered</b>, <b>40% open rate</b> - well above industry norms.'},
    {v:'leads',sel:'.view[data-v=&quot;leads&quot;] .lead',t:'Lead Manager · every lead, organised',b:'Open any lead to see its full history, contact details and status.'},
    {v:'wa',sel:'#waList',t:'WhatsApp Chat · talk directly',b:'Reach students where they reply. Every chat syncs to the lead.'},
    {v:'workflow',sel:'#wfGrid',t:'Automation working for you',b:'Follow-ups and WhatsApp journeys run automatically in the background.'},
    {v:'mgmt',sel:'.demo-cta',t:'Want this on your funnel?',b:'Lead capture → calling → WhatsApp → conversion - all in one window. Book a demo.'}
  ];
  var tIdx=-1, tTimer=null, tRun=false, TDUR=6500, tBooked=false;
  TSTEPS.forEach(function(_,i){var a=document.createElement('b');a.addEventListener('click',function(){tGo(i);});tipDots.appendChild(a);var b=document.createElement('b');b.addEventListener('click',function(){tGo(i);});ddots.appendChild(b);});
  function clamp(v,a,b){return Math.max(a,Math.min(b,v));}
  function tPlace(i){
    var st=TSTEPS[i]; go(st.v);
    if(st.side &amp;&amp; tMobile()) openSidebar(); else if(tMobile()) closeSidebar();
    setTimeout(function(){
      var target=document.querySelector(st.sel);
      if(!target){ tSpot.style.opacity='0'; return; }
      tSpot.style.opacity='';
      try{ var __mn=document.getElementById('main'); if(__mn&amp;&amp;__mn.contains(target)){ var __mr=__mn.getBoundingClientRect(),__tr=target.getBoundingClientRect(); __mn.scrollTop += (__tr.top-__mr.top) - (__mn.clientHeight/2 - __tr.height/2); } }catch(e){}
      setTimeout(function(){
        var r=target.getBoundingClientRect(), pad=6;
        tSpot.style.left=(r.left-pad)+'px'; tSpot.style.top=(r.top-pad)+'px'; tSpot.style.width=(r.width+pad*2)+'px'; tSpot.style.height=(r.height+pad*2)+'px';
        tTip.querySelector('.stp').textContent='Step '+(i+1)+' / '+TSTEPS.length;
        tTip.querySelector('h4').textContent=st.t; tTip.querySelector('p').innerHTML=st.b;
        tTip.querySelector('.nx').textContent=(i===TSTEPS.length-1)?'Finish ✓':'Next →';
        [].forEach.call(tipDots.children,function(d,j){d.classList.toggle('on',j===i);});
        [].forEach.call(ddots.children,function(d,j){d.classList.toggle('on',j===i);});
        if(!tMobile()){
          var vw=window.innerWidth,vh=window.innerHeight,tw=300,th=tTip.offsetHeight||190,gap=14,tx,ty;
          if(r.bottom+gap+th<vh){ ty=r.bottom+gap; tx=clamp(r.left,14,vw-tw-14); }
          else if(r.top-gap-th>0){ ty=r.top-gap-th; tx=clamp(r.left,14,vw-tw-14); }
          else if(r.right+gap+tw<vw){ tx=r.right+gap; ty=clamp(r.top,14,vh-th-14); }
          else { tx=clamp(r.left-gap-tw,14,vw-tw-14); ty=clamp(r.top,14,vh-th-14); }
          tTip.style.left=tx+'px'; tTip.style.top=ty+'px';
        } else { tTip.style.left=''; tTip.style.top=''; }
      }, tReduce?60:380);
    },120);
  }
  function tGo(i){ clearTimeout(tTimer); if(i>=TSTEPS.length){ tStop(); if(!tBooked){ tBooked=true; setTimeout(openBookModal,400); } return; } tIdx=i; tPlace(i); if(tRun &amp;&amp; !tReduce){ tTimer=setTimeout(function(){ tGo(tIdx+1); }, TDUR); } }
  function tStart(){ tRun=true; document.body.classList.add('tour-on'); playBtn.innerHTML=PAUSE; lbl.textContent='Auto-playing…'; tGo(tIdx<0?0:tIdx); }
  function tStop(){ tRun=false; clearTimeout(tTimer); document.body.classList.remove('tour-on'); playBtn.innerHTML=PLAY; lbl.textContent='Product tour'; }
  window.__laxmiStopTour=tStop;
  playBtn.innerHTML=PLAY;
  playBtn.addEventListener('click',function(){ tRun?tStop():tStart(); });
  tDock.querySelector('.restart').addEventListener('click',function(){ tIdx=-1; tStart(); });
  tDock.querySelector('.close').addEventListener('click',tStop);
  tTip.querySelector('.nx').addEventListener('click',function(){ if(tIdx===TSTEPS.length-1){ tStop(); tBooked=true; openBookModal(); } else { tGo(tIdx+1); } });
  tTip.querySelector('.sk').addEventListener('click',tStop);
  var tResizeT=null;
  window.addEventListener('resize',function(){ if(tRun){ clearTimeout(tResizeT); tResizeT=setTimeout(function(){ tPlace(tIdx); },150); } });
  $('#main').addEventListener('click',function(){ if(tRun) tStop(); });
  function tBoot(){ if(!tReduce){ setTimeout(function(){ if(!tRun &amp;&amp; tIdx<0) tStart(); },800); } else { document.body.classList.add('tour-on'); tPlace(0); } }
  var __standalone=(window.self===window.top);
  if(__standalone){
    if('IntersectionObserver' in window){
      var tio=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ tBoot(); tio.disconnect(); } }); },{threshold:.25});
      tio.observe(document.querySelector('.app'));
    } else { tBoot(); }
  } else {
    window.addEventListener('message',function(e){ var d=e.data;
      if(d==='ee-tour-start'){ if(!tRun) tStart(); }
      else if(d==='ee-tour-stop'){ if(tRun) tStop(); }
    });
  }
})();
</script>
</body>
</html>
"></iframe>
    </div>
    </div>
  </div>
</section>
<script>
(function(){
  var sec=document.getElementById('ee-platform'); if(!sec) return;
  if(!('IntersectionObserver' in window)){ sec.classList.add('eep-rail-in'); return; }
  var io=new IntersectionObserver(function(es){ es.forEach(function(e){
    if(e.isIntersecting){ sec.classList.add('eep-rail-in'); io.disconnect(); } }); },{threshold:.25});
  io.observe(sec);
})();
</script>
<script>
/* Run the platform demo's guided tour ONLY while the section is on screen,
   so the iframe never scroll-jumps the page back while the user reads on. */
(function(){
  var sec=document.getElementById('ee-platform'); if(!sec) return;
  var fr=sec.querySelector('.eep-frame'); if(!fr) return;
  var inView=false, loaded=false;
  function send(m){ try{ if(fr.contentWindow) fr.contentWindow.postMessage(m,'*'); }catch(e){} }
  fr.addEventListener('load',function(){ loaded=true; send(inView?'ee-tour-start':'ee-tour-stop'); });
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){ es.forEach(function(e){
      var nowIn=e.isIntersecting && e.intersectionRatio>=0.35;
      if(nowIn!==inView){ inView=nowIn; if(loaded) send(inView?'ee-tour-start':'ee-tour-stop'); }
    }); },{threshold:[0,0.35,0.6]});
    io.observe(sec);
  }
})();
</script>
<script>
/* AI Product-Led Experience: defer the iframe, load it inline on desktop and
   only on demand on phones, where it opens full-screen. Close returns to page. */
(function(){
  var sec=document.getElementById('ee-platform'); if(!sec) return;
  var fr=document.getElementById('eepFrame');
  var launch=document.getElementById('eepLaunch');
  var expand=document.getElementById('eepExpand');
  var closeBtn=document.getElementById('eepClose');
  var winEl=sec.querySelector('.eep-window');
  var winHome=null, winNext=null;   /* remembers where the window lived so we can put it back */
  var _lockY=0;   /* saved scroll position while the background is locked */
  function loadFrame(){
    if(fr && !fr.getAttribute('srcdoc')){
      var doc=fr.getAttribute('data-srcdoc');
      if(doc){ fr.setAttribute('srcdoc',doc); }
    }
  }
  var mq=window.matchMedia('(max-width:860px)');
  /* desktop: don't build the (large) demo document during initial page load -
     hydrate it only when the section is within ~800px of the viewport */
  if(!mq.matches){
    if('IntersectionObserver' in window){
      var lio=new IntersectionObserver(function(es){
        es.forEach(function(en){ if(en.isIntersecting){ loadFrame(); lio.disconnect(); } });
      },{rootMargin:'800px 0px'});
      lio.observe(sec);
    } else { loadFrame(); }
  }
  /* on phones the demo has a fixed ~460px min layout, so scale it to fill the
     viewport width (full-width, nothing clipped); desktop shows it at native size */
  function isOpen(){ return !!(winEl && winEl.classList.contains('eep-launched')); }
  function fitFrame(){
    if(!fr) return;
    if(isOpen() && mq.matches){
      var base=460, barH=102;   /* top bar 56 + bottom module strip 46 */
      var vw=document.documentElement.clientWidth||window.innerWidth;
      var availH=(window.innerHeight||document.documentElement.clientHeight)-barH;
      var scale=vw/base;
      fr.style.width=base+'px';
      fr.style.height=Math.ceil(availH/scale)+'px';
      fr.style.transformOrigin='top left';
      fr.style.transform='scale('+scale.toFixed(4)+')';
    } else {
      fr.style.width='';fr.style.height='';fr.style.transform='';fr.style.transformOrigin='';
    }
  }
  function openExp(){
    if(!winEl) return;
    loadFrame();
    /* relocate the window to <body> so position:fixed escapes any ancestor that
       establishes a containing block (transform/filter/contain/perspective) */
    if(winEl.parentNode!==document.body){
      winHome=winEl.parentNode; winNext=winEl.nextSibling;
      document.body.appendChild(winEl);
    }
    winEl.classList.add('eep-launched');
    /* lock the background so the home page can't scroll behind the popup
       (position:fixed + saved scroll offset is the iOS-safe method) */
    _lockY=window.pageYOffset||document.documentElement.scrollTop||0;
    document.documentElement.classList.add('eep-lock');
    document.body.classList.add('eep-lock');
    document.body.style.top=(-_lockY)+'px';
    fitFrame(); setTimeout(fitFrame,60);
  }
  function closeExp(){
    if(winEl) winEl.classList.remove('eep-launched');
    document.documentElement.classList.remove('eep-lock');
    document.body.classList.remove('eep-lock');
    document.body.style.top='';
    window.scrollTo(0,_lockY);
    /* put the window back exactly where it came from */
    if(winEl && winHome){ winHome.insertBefore(winEl, winNext); winHome=null; winNext=null; }
    fitFrame();
  }
  window.addEventListener('resize',function(){ if(isOpen()) fitFrame(); });
  window.addEventListener('orientationchange',function(){ setTimeout(fitFrame,120); });
  if(launch) launch.addEventListener('click',openExp);
  if(expand) expand.addEventListener('click',openExp);
  /* module tiles (Superleap-style): clicking a tile switches the live demo to
     that module's screen - the demo replica is same-origin (srcdoc), so we
     drive its own sidebar buttons ([data-go]) directly. Retries cover the
     frame still hydrating on first click. */
  var mods=[].slice.call(sec.querySelectorAll('.eep-mod'));
  var navToken=0;
  function navFrame(key){
    var token=++navToken, attempts=0;
    (function go(){
      if(token!==navToken) return;   /* a newer tile click supersedes this loop */
      var done=false;
      try{
        var d=fr.contentDocument||(fr.contentWindow&&fr.contentWindow.document);
        if(d&&d.body){
          var btn=d.querySelector('.nav[data-go="'+key+'"],.subnav[data-go="'+key+'"]');
          if(btn){
            btn.click();
            /* success only when the demo's own handler ran (it marks the nav
               active synchronously) - before that the frame's script is still
               waiting on its blocking stylesheets, so keep retrying */
            done=btn.classList.contains('on');
          }
        }
      }catch(e){}
      if(!done&&++attempts<50) setTimeout(go,300);
    })();
  }
  /* ---- live URL + info-strip sync ---- */
  var urlEl=winEl&&winEl.querySelector('.eep-url');
  var infoN=document.getElementById('eepModInfoName'),
      infoT=document.getElementById('eepModInfoTx'),
      infoG=document.getElementById('eepModInfoGain');
  function syncMeta(b){
    if(urlEl) urlEl.textContent='app.extraaedge.com'+(b.getAttribute('data-url')||'');
    if(infoN){
      infoN.textContent=b.querySelector('b').textContent;
      infoT.textContent=b.getAttribute('data-info')||'';
      infoG.textContent=b.getAttribute('data-gain')||'';
      var box=document.getElementById('eepModInfo');
      if(box){ box.style.animation='none'; void box.offsetWidth; box.style.animation=''; }
    }
  }
  /* ---- overlay bottom strip: switch modules inside the full-screen view ---- */
  var ovnav=null;
  function buildOvnav(){
    if(ovnav||!winEl) return;
    ovnav=document.createElement('div');
    ovnav.className='eep-ovnav';
    mods.forEach(function(b){
      var p=document.createElement('button');
      p.type='button';
      p.setAttribute('data-go',b.getAttribute('data-go'));
      p.textContent=b.querySelector('b').textContent;
      p.addEventListener('click',function(){ selectModule(b,false); });
      ovnav.appendChild(p);
    });
    winEl.appendChild(ovnav);
  }
  /* ---- single entry point for every module change ---- */
  function selectModule(b,fromTour){
    if(!fromTour) stopTour();
    mods.forEach(function(x){ x.classList.toggle('on',x===b); });
    if(ovnav){ [].forEach.call(ovnav.children,function(p){ p.classList.toggle('on',p.getAttribute('data-go')===b.getAttribute('data-go')); }); }
    loadFrame();
    syncMeta(b);
    navFrame(b.getAttribute('data-go'));
    /* glow flash on the window so the screen change reads instantly */
    if(winEl){ winEl.classList.remove('eep-flash'); void winEl.offsetWidth; winEl.classList.add('eep-flash');
      clearTimeout(winEl.__fl); winEl.__fl=setTimeout(function(){ winEl.classList.remove('eep-flash'); },700); }
    /* per-module countdown while the tour runs */
    var box=document.getElementById('eepModInfo');
    if(box){ box.classList.remove('ticking'); if(fromTour){ void box.offsetWidth; box.classList.add('ticking'); } }
  }
  mods.forEach(function(b){
    b.addEventListener('click',function(){
      selectModule(b,false);
      if(mq.matches){ openExp(); }
    });
  });
  buildOvnav();
  /* ---- auto tour: cycle through every module while the demo is on screen ---- */
  var tourBtn=document.getElementById('eepTour'), tourTimer=null, tourIdx=0;
  function stopTour(){
    if(tourTimer){ clearInterval(tourTimer); tourTimer=null; }
    if(tourBtn){ tourBtn.classList.remove('on'); tourBtn.setAttribute('aria-pressed','false'); }
    var n=document.getElementById('eepTourN'); if(n) n.textContent='Tour';
    var box=document.getElementById('eepModInfo'); if(box) box.classList.remove('ticking');
  }
  function tourLabel(){ var n=document.getElementById('eepTourN'); if(n) n.textContent=(tourIdx+1)+'/'+mods.length; }
  function startTour(){
    stopTour();
    if(tourBtn){ tourBtn.classList.add('on'); tourBtn.setAttribute('aria-pressed','true'); }
    tourIdx=mods.findIndex(function(b){ return b.classList.contains('on'); });
    tourTimer=setInterval(function(){
      tourIdx=(tourIdx+1)%mods.length;
      selectModule(mods[tourIdx],true); tourLabel();
    },6000);
    tourIdx=(tourIdx+1)%mods.length;
    selectModule(mods[tourIdx],true); tourLabel();
  }
  if(tourBtn) tourBtn.addEventListener('click',function(){ tourTimer?stopTour():startTour(); });
  /* pause the tour while the demo itself is being used or off screen;
     on desktop the tour starts by itself the first time the section is
     properly on screen - the demo literally plays itself */
  if(fr) fr.addEventListener('mouseenter',stopTour);
  var autoToured=false;
  if('IntersectionObserver' in window){
    new IntersectionObserver(function(es){ es.forEach(function(e){
      if(!e.isIntersecting){ stopTour(); return; }
      if(!autoToured && !mq.matches && e.intersectionRatio>=0.45){
        autoToured=true;
        setTimeout(function(){ if(!tourTimer && !mq.matches) startTour(); },1200);
      }
    }); },{threshold:[0,0.45]}).observe(sec);
  }
  if(closeBtn) closeBtn.addEventListener('click',closeExp);
  document.addEventListener('keydown',function(e){ if(e.key==='Escape' && isOpen()) closeExp(); });
  /* if the viewport grows past mobile while closed, make sure the inline demo is loaded */
  (mq.addEventListener?mq.addEventListener.bind(mq,'change'):mq.addListener.bind(mq))(function(){ if(!mq.matches){ closeExp(); loadFrame(); } });
})();
</script>


<!-- ===================== PRODUCTS / VIDYA AI / TEAMS / SOLUTIONS / INDUSTRIES (added) ===================== -->
<style>#ee-products{
    --navy:#19345d; --ink:#0f203a; --orange:#DE6E30; --orange-2:#E8843F;
    --line:rgba(25,52,93,.10); --muted:#5a6b85;
    position:relative;
    padding:clamp(60px,8vw,108px) 0;
    background:
      radial-gradient(1100px 480px at 88% -6%, rgba(222,110,48,.06), transparent 60%),
      radial-gradient(900px 460px at 8% 104%, rgba(25,52,93,.06), transparent 60%),
      #F6F8FC;
    font-family:'Inter',system-ui,-apple-system,sans-serif;
    color:var(--ink);
    -webkit-font-smoothing:antialiased;
  }#ee-products *{box-sizing:border-box;}#ee-products .eep-wrap{ max-width:1280px; margin:0 auto; padding:0 24px; }/* ---------- Header ---------- */
  #ee-products .eep-head{ display:flex; align-items:flex-end; justify-content:space-between; gap:28px; flex-wrap:wrap; margin-bottom:clamp(26px,3vw,38px); }#ee-products .eep-head-l{ max-width:660px; }#ee-products .eep-eyebrow{
    display:inline-flex; align-items:center; gap:9px;
    padding:7px 14px 7px 11px; border-radius:999px;
    background:rgba(222,110,48,.08); border:1px solid rgba(222,110,48,.2);
    color:#C45A20; font-size:11.5px; font-weight:600; letter-spacing:.13em; text-transform:uppercase;
    margin-bottom:18px;
  }#ee-products .eep-eyebrow .eep-dot{ width:7px; height:7px; border-radius:50%; background:var(--orange); box-shadow:0 0 0 4px rgba(222,110,48,.16); animation:eepPulse 2.6s ease-in-out infinite; }
  @keyframes eepPulse{0%,100%{box-shadow:0 0 0 3px rgba(222,110,48,.18);}50%{box-shadow:0 0 0 6px rgba(222,110,48,0);} }#ee-products h2{
    font-family:'Inter',sans-serif; font-weight:700;
    font-size:clamp(30px,4.4vw,46px); line-height:1.06; letter-spacing:-.022em;
    margin:0 0 14px; color:var(--navy);
  }#ee-products h2 .eep-accent{
    background:linear-gradient(120deg,var(--orange-2),var(--orange)); -webkit-background-clip:text; background-clip:text; color:transparent;
  }#ee-products .eep-sub{ font-size:clamp(15px,1.7vw,17.5px); line-height:1.55; color:var(--muted); margin:0; }/* ---------- Search ---------- */
  #ee-products .eep-search{ position:relative; flex:0 0 auto; width:min(300px,100%); }#ee-products .eep-search svg,#ee-products .eep-search img.eeimg{ position:absolute; left:14px; top:50%; transform:translateY(-50%); width:17px; height:17px; pointer-events:none; }#ee-products .eep-search svg *,#ee-products .eep-search img.eeimg *{ stroke:#8697b0; }#ee-products .eep-search input{
    width:100%; height:46px; padding:0 38px 0 40px;
    border:1px solid var(--line); border-radius:12px; background:#fff;
    font-family:inherit; font-size:14px; color:var(--ink);
    box-shadow:0 1px 2px rgba(25,52,93,.04); transition:border-color .2s ease, box-shadow .2s ease;
  }#ee-products .eep-search input::placeholder{ color:#9aa8bd; }#ee-products .eep-search input:focus{ outline:none; border-color:rgba(222,110,48,.5); box-shadow:0 0 0 4px rgba(222,110,48,.12); }#ee-products .eep-clear{ position:absolute; right:8px; top:50%; transform:translateY(-50%); display:none; width:24px; height:24px; border:0; border-radius:7px; background:rgba(25,52,93,.06); color:var(--navy); cursor:pointer; font-size:14px; line-height:1; }#ee-products .eep-search.has-val .eep-clear{ display:grid; place-items:center; }/* ---------- Filter pills ---------- */
  #ee-products .eep-filters{ display:flex; gap:9px; flex-wrap:wrap; margin-bottom:clamp(22px,2.6vw,30px); }#ee-products .eep-pill{
    display:inline-flex; align-items:center; gap:8px;
    padding:9px 16px; border-radius:999px; cursor:pointer;
    border:1px solid var(--line); background:#fff; color:var(--navy);
    font-family:inherit; font-size:13.5px; font-weight:600; letter-spacing:.005em;
    transition:transform .18s ease, border-color .2s ease, background .2s ease, color .2s ease, box-shadow .2s ease;
  }#ee-products .eep-pill .eep-count{ font-size:11px; font-weight:700; padding:1px 7px; border-radius:999px; background:rgba(25,52,93,.07); color:var(--navy); transition:background .2s ease,color .2s ease; }#ee-products .eep-pill:hover{ transform:translateY(-1px); border-color:rgba(222,110,48,.35); }#ee-products .eep-pill[aria-pressed="true"]{ background:linear-gradient(135deg,var(--orange-2),var(--orange)); border-color:transparent; color:#fff; box-shadow:0 8px 18px -10px rgba(222,110,48,.7); }#ee-products .eep-pill[aria-pressed="true"] .eep-count{ background:rgba(255,255,255,.24); color:#fff; }#ee-products .eep-pill:focus-visible{ outline:2px solid var(--orange); outline-offset:3px; }/* ---------- Main split ---------- */
  #ee-products .eep-main{ display:grid; grid-template-columns:minmax(0,380px) minmax(0,1fr); gap:24px; align-items:start; }/* ---------- Spotlight (signature) ---------- */
  #ee-products .eep-spot{
    --acc:#5c9af6; --acc-soft:rgba(92,154,246,.18);
    position:sticky; top:100px;
    border-radius:22px; overflow:hidden; isolation:isolate;
    background:linear-gradient(165deg,#1b355c 0%,#13294a 55%,#0e203b 100%);
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 30px 60px -30px rgba(11,26,48,.75), inset 0 1px 0 rgba(255,255,255,.06);
    color:#EAF0FA;
    min-height:520px; display:flex; flex-direction:column;
    transition:--acc .4s ease;
  }#ee-products .eep-spot::before{ /* accent glow keyed to active category */
    content:""; position:absolute; inset:0; z-index:0; pointer-events:none;
    background:radial-gradient(520px 320px at 78% -8%, var(--acc-soft), transparent 62%);
    transition:background .45s ease;
  }#ee-products .eep-spot::after{ /* fine grid texture */
    content:""; position:absolute; inset:0; z-index:0; pointer-events:none; opacity:.5;
    background-image:linear-gradient(rgba(255,255,255,.035) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.035) 1px,transparent 1px);
    background-size:30px 30px; mask-image:radial-gradient(420px 300px at 75% 0%, #000, transparent 75%);
  }#ee-products .eep-spot-top{ position:relative; z-index:2; padding:20px 22px 6px; display:flex; align-items:center; justify-content:space-between; gap:10px; }#ee-products .eep-spot-tag{ display:inline-flex; align-items:center; gap:7px; font-size:11px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:#aebcd2; }#ee-products .eep-spot-tag i{ width:8px; height:8px; border-radius:50%; background:var(--acc); box-shadow:0 0 0 4px var(--acc-soft); }#ee-products .eep-live{ display:inline-flex; align-items:center; gap:6px; font-size:10.5px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#7fa7e3; }#ee-products .eep-live b{ width:6px; height:6px; border-radius:50%; background:#3474d3; animation:eepBlink 1.4s ease-in-out infinite; }
  @keyframes eepBlink{0%,100%{opacity:1;}50%{opacity:.25;} }/* stage = animated scene */
  #ee-products .eep-stage{ position:relative; z-index:2; margin:8px 18px 4px; height:188px; border-radius:16px; background:rgba(8,20,38,.45); border:1px solid rgba(255,255,255,.07); overflow:hidden; display:grid; place-items:center; padding:16px; }#ee-products .eep-stage .eep-scene{ width:100%; height:100%; opacity:0; animation:eepSceneIn .5s ease forwards; }
  @keyframes eepSceneIn{from{opacity:0; transform:translateY(8px);}to{opacity:1; transform:none;} }/* spotlight text */
  #ee-products .eep-spot-body{ position:relative; z-index:2; padding:16px 22px 22px; display:flex; flex-direction:column; gap:12px; flex:1; }#ee-products .eep-spot-icon{ width:48px; height:48px; border-radius:13px; display:grid; place-items:center; background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 60%,#0b1a30)); box-shadow:0 10px 22px -10px var(--acc), inset 0 1px 0 rgba(255,255,255,.25); }#ee-products .eep-spot-icon svg,#ee-products .eep-spot-icon img.eeimg{ width:25px; height:25px; }#ee-products .eep-spot-icon svg *,#ee-products .eep-spot-icon img.eeimg *{ stroke:#fff; }#ee-products .eep-spot-title{ font-family:'Inter',sans-serif; font-size:21px; font-weight:600; letter-spacing:-.01em; color:#fff; margin:2px 0 0; display:flex; align-items:center; gap:10px; flex-wrap:wrap; }#ee-products .eep-spot-title .eep-new{ font-family:'Inter',sans-serif; font-size:9.5px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; padding:3px 8px; border-radius:999px; background:var(--acc); color:#0c1a30; }#ee-products .eep-spot-desc{ font-size:14px; line-height:1.6; color:#c2d0e4; margin:0; }#ee-products .eep-spot-tags{ display:flex; flex-wrap:wrap; gap:7px; margin-top:2px; }#ee-products .eep-spot-tags span{ font-size:11.5px; font-weight:500; color:#dfe7f4; padding:5px 11px; border-radius:999px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.1); }#ee-products .eep-spot-cta{ margin-top:auto; display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:13px 20px; border-radius:12px; background:linear-gradient(135deg,var(--orange-2),var(--orange)); color:#fff; font-weight:600; font-size:14.5px; text-decoration:none; box-shadow:0 12px 26px -12px rgba(222,110,48,.7), inset 0 1px 0 rgba(255,255,255,.22); transition:transform .2s ease, box-shadow .2s ease, filter .2s ease; }#ee-products .eep-spot-cta:hover{ transform:translateY(-2px); filter:saturate(1.05); }#ee-products .eep-spot-cta:focus-visible{ outline:2px solid #fff; outline-offset:3px; }#ee-products .eep-spot-cta svg,#ee-products .eep-spot-cta img.eeimg{ width:16px; height:16px; }#ee-products .eep-spot-cta svg *,#ee-products .eep-spot-cta img.eeimg *{ stroke:#fff; }/* ---------- Grid ---------- */
  #ee-products .eep-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:14px; }#ee-products .eep-card{
    position:relative; display:flex; flex-direction:column; gap:11px;
    padding:18px 17px; background:#fff; border:1px solid var(--line); border-radius:15px;
    text-decoration:none; color:inherit; cursor:pointer;
    box-shadow:0 1px 2px rgba(25,52,93,.04);
    transition:transform .22s cubic-bezier(.2,.7,.3,1), box-shadow .22s ease, border-color .22s ease;
  }#ee-products .eep-card::before{ content:""; position:absolute; left:0; top:14px; bottom:14px; width:3px; border-radius:0 3px 3px 0; background:var(--cardacc,var(--orange)); opacity:0; transform:scaleY(.4); transform-origin:center; transition:opacity .22s ease, transform .22s ease; }#ee-products .eep-card:hover,#ee-products .eep-card.is-active{ transform:translateY(-4px); border-color:rgba(222,110,48,.3); box-shadow:0 20px 38px -22px rgba(25,52,93,.4); }#ee-products .eep-card.is-active::before,#ee-products .eep-card:hover::before{ opacity:1; transform:scaleY(1); }#ee-products .eep-card:focus-visible{ outline:2px solid var(--orange); outline-offset:3px; }#ee-products .eep-card-top{ display:flex; align-items:center; gap:11px; }#ee-products .eep-chip{ flex:0 0 auto; width:40px; height:40px; border-radius:11px; display:grid; place-items:center; background:linear-gradient(135deg, color-mix(in srgb,var(--cardacc,#DE6E30) 88%,#fff), var(--cardacc,#DE6E30)); box-shadow:0 6px 14px -7px var(--cardacc,rgba(222,110,48,.6)), inset 0 1px 0 rgba(255,255,255,.3); }#ee-products .eep-chip svg,#ee-products .eep-chip img.eeimg{ width:21px; height:21px; }#ee-products .eep-chip svg *,#ee-products .eep-chip img.eeimg *{ stroke:#fff; }/* product icon shown as a logo image */
  #ee-products .eep-chip:has(img.eep-ic-img),#ee-products .eep-spot-icon:has(img.eep-ic-img){ background:transparent; padding:0; overflow:hidden; box-shadow:none; }#ee-products .eep-ic-img{ width:100%; height:100%; object-fit:cover; display:block; border-radius:inherit; }#ee-products .eep-card-title{ font-family:'Inter',sans-serif; font-size:14.5px; font-weight:600; line-height:1.25; letter-spacing:-.01em; color:var(--navy); display:flex; align-items:center; gap:7px; flex-wrap:wrap; }#ee-products .eep-badge{ font-size:9px; font-weight:700; letter-spacing:.07em; text-transform:uppercase; color:#fff; background:var(--orange); padding:2px 6px; border-radius:999px; }#ee-products .eep-card-desc{ font-size:12.5px; line-height:1.5; color:var(--muted); margin:0; }#ee-products .eep-card-foot{ margin-top:auto; display:flex; align-items:center; justify-content:space-between; gap:8px; }#ee-products .eep-card-cat{ font-size:10px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--cardacc,#C45A20); opacity:.85; }#ee-products .eep-card-go{ display:inline-flex; align-items:center; gap:5px; font-size:11.5px; font-weight:600; color:var(--navy); opacity:0; transform:translateX(-4px); transition:opacity .2s ease, transform .2s ease; }#ee-products .eep-card-go svg,#ee-products .eep-card-go img.eeimg{ width:13px; height:13px; }#ee-products .eep-card-go svg *,#ee-products .eep-card-go img.eeimg *{ stroke:var(--orange); }#ee-products .eep-card:hover .eep-card-go,#ee-products .eep-card:focus-visible .eep-card-go,#ee-products .eep-card.is-active .eep-card-go{ opacity:1; transform:none; }/* filtered out */
  #ee-products .eep-card[hidden]{ display:none; }/* empty state */
  #ee-products .eep-empty{ grid-column:1/-1; display:none; flex-direction:column; align-items:center; text-align:center; gap:10px; padding:48px 20px; border:1px dashed var(--line); border-radius:15px; color:var(--muted); }#ee-products .eep-empty.show{ display:flex; }#ee-products .eep-empty svg,#ee-products .eep-empty img.eeimg{ width:34px; height:34px; opacity:.5; }#ee-products .eep-empty svg *,#ee-products .eep-empty img.eeimg *{ stroke:var(--navy); }#ee-products .eep-empty b{ color:var(--navy); font-family:'Inter',sans-serif; font-size:16px; }#ee-products .eep-empty button{ margin-top:4px; padding:9px 16px; border:1px solid var(--line); border-radius:10px; background:#fff; color:var(--navy); font-family:inherit; font-weight:600; font-size:13px; cursor:pointer; }#ee-products .eep-empty button:hover{ border-color:rgba(222,110,48,.4); }/* ---------- Scene animation bits ---------- */
  #ee-products .sc{ font-size:11px; color:#cdd9ec; }/* AI scene */
  #ee-products .sc-ai{ display:flex; flex-direction:column; gap:8px; justify-content:center; }#ee-products .sc-bub{ max-width:78%; padding:8px 11px; border-radius:12px; font-size:11.5px; line-height:1.35; background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.08); opacity:0; transform:translateY(6px); animation:eepBub .5s ease forwards; }#ee-products .sc-bub.me{ align-self:flex-end; background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 55%,#10274a)); border-color:transparent; color:#fff; }#ee-products .sc-bub.b2{ animation-delay:.5s; }#ee-products .sc-bub.b3{ animation-delay:1.05s; }
  @keyframes eepBub{to{opacity:1; transform:none;} }#ee-products .sc-type{ display:inline-flex; gap:4px; align-self:flex-start; padding:9px 12px; border-radius:12px; background:rgba(255,255,255,.08); opacity:0; animation:eepBub .4s 1.55s ease forwards; }#ee-products .sc-type i{ width:5px; height:5px; border-radius:50%; background:#aebbcf; animation:eepDot 1.1s infinite; }#ee-products .sc-type i:nth-child(2){ animation-delay:.18s; }#ee-products .sc-type i:nth-child(3){ animation-delay:.36s; }
  @keyframes eepDot{0%,60%,100%{transform:translateY(0); opacity:.5;}30%{transform:translateY(-4px); opacity:1;} }#ee-products .sc-wave{ display:inline-flex; align-items:flex-end; gap:3px; height:18px; margin-left:6px; }#ee-products .sc-wave span{ width:3px; background:var(--acc); border-radius:2px; animation:eepWave 1s ease-in-out infinite; }#ee-products .sc-wave span:nth-child(2){animation-delay:.12s}#ee-products .sc-wave span:nth-child(3){animation-delay:.24s}#ee-products .sc-wave span:nth-child(4){animation-delay:.36s}#ee-products .sc-wave span:nth-child(5){animation-delay:.48s}
  @keyframes eepWave{0%,100%{height:5px;}50%{height:17px;} }/* Platform / kanban scene */
  #ee-products .sc-kan{ display:grid; grid-template-columns:repeat(3,1fr); gap:8px; align-content:center; width:100%; }#ee-products .sc-col{ background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.07); border-radius:9px; padding:7px 6px; display:flex; flex-direction:column; gap:6px; min-height:118px; }#ee-products .sc-col h6{ margin:0 0 1px; font-size:9px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#9fb1cc; }#ee-products .sc-lead{ height:18px; border-radius:6px; background:rgba(255,255,255,.1); }#ee-products .sc-lead.live{ background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 50%,#0c2140)); animation:eepHop 4s ease-in-out infinite; }
  @keyframes eepHop{0%,18%{transform:translateX(0);}33%,52%{transform:translateX(calc(100% + 14px));}67%,86%{transform:translateX(calc(200% + 28px));}100%{transform:translateX(0);} }/* Admissions scene */
  #ee-products .sc-adm{ width:100%; display:flex; flex-direction:column; gap:9px; justify-content:center; }#ee-products .sc-prog{ height:8px; border-radius:999px; background:rgba(255,255,255,.1); overflow:hidden; }#ee-products .sc-prog i{ display:block; height:100%; width:20%; border-radius:999px; background:linear-gradient(90deg,var(--acc),color-mix(in srgb,var(--acc) 55%,#fff)); animation:eepFill 4s ease-in-out infinite; }
  @keyframes eepFill{0%{width:12%;}45%{width:100%;}60%{width:100%;}100%{width:12%;} }#ee-products .sc-row{ display:flex; align-items:center; gap:9px; font-size:11px; color:#c7d4e8; }#ee-products .sc-tick{ width:18px; height:18px; border-radius:6px; border:1.5px solid rgba(255,255,255,.25); display:grid; place-items:center; flex:0 0 auto; }#ee-products .sc-tick.on{ background:var(--acc); border-color:transparent; }#ee-products .sc-tick svg,#ee-products .sc-tick img.eeimg{ width:11px; height:11px; opacity:0; }#ee-products .sc-tick.on svg,#ee-products .sc-tick.on img.eeimg{ opacity:1; }#ee-products .sc-tick svg *,#ee-products .sc-tick img.eeimg *{ stroke:#0c1a30; }#ee-products .sc-r1 .sc-tick{ animation:eepOn .1s 1s forwards; }#ee-products .sc-r2 .sc-tick{ animation:eepOn .1s 1.8s forwards; }#ee-products .sc-r3 .sc-tick{ animation:eepOn .1s 2.6s forwards; }
  @keyframes eepOn{to{ background:var(--acc); border-color:transparent; } }#ee-products .sc-r1 .sc-tick svg,#ee-products .sc-r1 .sc-tick img.eeimg,#ee-products .sc-r2 .sc-tick svg,#ee-products .sc-r2 .sc-tick img.eeimg,#ee-products .sc-r3 .sc-tick svg,#ee-products .sc-r3 .sc-tick img.eeimg{ animation:eepShow .1s forwards; }#ee-products .sc-r1 .sc-tick svg,#ee-products .sc-r1 .sc-tick img.eeimg{ animation-delay:1s; }#ee-products .sc-r2 .sc-tick svg,#ee-products .sc-r2 .sc-tick img.eeimg{ animation-delay:1.8s; }#ee-products .sc-r3 .sc-tick svg,#ee-products .sc-r3 .sc-tick img.eeimg{ animation-delay:2.6s; }
  @keyframes eepShow{to{opacity:1;} }/* Engage scene */
  #ee-products .sc-eng{ display:flex; flex-direction:column; gap:8px; justify-content:center; width:100%; }#ee-products .sc-msg{ display:flex; align-items:center; gap:8px; opacity:0; transform:translateX(-8px); animation:eepBub .5s ease forwards; }#ee-products .sc-msg.m2{ animation-delay:.6s; }#ee-products .sc-msg.m3{ animation-delay:1.2s; flex-direction:row-reverse; }#ee-products .sc-msg .av{ width:22px; height:22px; border-radius:50%; flex:0 0 auto; background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 50%,#0c2140)); }#ee-products .sc-msg .tx{ flex:1; height:13px; border-radius:6px; background:rgba(255,255,255,.1); }#ee-products .sc-msg.m3 .tx{ background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 55%,#10274a)); max-width:60%; }#ee-products .sc-verified{ align-self:center; display:inline-flex; align-items:center; gap:6px; font-size:10.5px; font-weight:600; color:#a9c3e9; margin-top:2px; opacity:0; animation:eepBub .5s 1.7s forwards; }#ee-products .sc-verified svg,#ee-products .sc-verified img.eeimg{ width:14px; height:14px; }#ee-products .sc-verified svg *,#ee-products .sc-verified img.eeimg *{ stroke:#3474d3; }/* Grow scene */
  #ee-products .sc-grow{ display:flex; align-items:flex-end; justify-content:space-between; gap:9px; height:100%; padding:6px 4px; width:100%; }#ee-products .sc-bar{ flex:1; border-radius:6px 6px 0 0; background:linear-gradient(180deg,var(--acc),color-mix(in srgb,var(--acc) 45%,#0c2140)); height:14%; transform-origin:bottom; animation:eepGrow 2.4s ease-in-out infinite; }#ee-products .sc-bar:nth-child(1){--h:40%;}#ee-products .sc-bar:nth-child(2){--h:62%;}#ee-products .sc-bar:nth-child(3){--h:50%;}#ee-products .sc-bar:nth-child(4){--h:82%;}#ee-products .sc-bar:nth-child(5){--h:96%;}#ee-products .sc-bar:nth-child(2){animation-delay:.12s}#ee-products .sc-bar:nth-child(3){animation-delay:.24s}#ee-products .sc-bar:nth-child(4){animation-delay:.36s}#ee-products .sc-bar:nth-child(5){animation-delay:.48s}
  @keyframes eepGrow{0%{height:14%;}55%,100%{height:var(--h);} }

  /* ---------- Responsive ---------- */
  @media(max-width:980px){#ee-products .eep-main{ grid-template-columns:1fr; }#ee-products .eep-spot{ position:static; min-height:auto; }#ee-products .eep-grid{ grid-template-columns:repeat(2,1fr); }
  }
  @media(max-width:620px){#ee-products .eep-head{ align-items:stretch; }#ee-products .eep-search{ width:100%; }#ee-products .eep-filters{ flex-wrap:nowrap; overflow-x:auto; padding-bottom:6px; -webkit-overflow-scrolling:touch; scrollbar-width:none; }#ee-products .eep-filters::-webkit-scrollbar{ display:none; }#ee-products .eep-pill{ flex:0 0 auto; }#ee-products .eep-grid{ grid-template-columns:repeat(2,1fr); gap:10px; }#ee-products .eep-card{ padding:15px 13px; }#ee-products .eep-card-go{ opacity:1; transform:none; }
  }
  @media(prefers-reduced-motion:reduce){#ee-products *{ animation-duration:.001s !important; animation-iteration-count:1 !important; transition-duration:.001s !important; }
  }
</style>

<!-- =========================================================
     VidyaAI "Powerful Admission CRM with Simplicity" section
     Paste this block directly into your home page where you
     want it to appear (e.g. inside <body>, between sections).
     Fully scoped under #vidyaai-embed-root — will NOT affect
     the rest of your homepage's fonts, headings, buttons, or
     scrollbars. Scroll progress bar removed as requested.
     ========================================================= -->

    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
*,:after,:before{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }#vidyaai-embed-root .pointer-events-none{pointer-events:none}#vidyaai-embed-root .visible{visibility:visible}#vidyaai-embed-root .invisible{visibility:hidden}#vidyaai-embed-root .fixed{position:fixed}#vidyaai-embed-root .absolute{position:absolute}#vidyaai-embed-root .relative{position:relative}#vidyaai-embed-root .sticky{position:sticky}#vidyaai-embed-root .inset-0{inset:0}#vidyaai-embed-root .bottom-0{bottom:0}#vidyaai-embed-root .bottom-1{bottom:.25rem}#vidyaai-embed-root .bottom-1\/3{bottom:33.333333%}#vidyaai-embed-root .bottom-full{bottom:100%}#vidyaai-embed-root .left-0{left:0}#vidyaai-embed-root .left-1{left:.25rem}#vidyaai-embed-root .left-1\/2{left:50%}#vidyaai-embed-root .left-10{left:2.5rem}#vidyaai-embed-root .right-0{right:0}#vidyaai-embed-root .right-1{right:.25rem}#vidyaai-embed-root .right-1\/4{right:25%}#vidyaai-embed-root .top-0{top:0}#vidyaai-embed-root .top-3{top:.75rem}#vidyaai-embed-root .top-full{top:100%}#vidyaai-embed-root .z-10{z-index:10}#vidyaai-embed-root .z-20{z-index:20}#vidyaai-embed-root .z-30{z-index:30}#vidyaai-embed-root .col-span-7{grid-column:span 7/span 7}#vidyaai-embed-root .mx-auto{margin-left:auto;margin-right:auto}#vidyaai-embed-root .mb-1{margin-bottom:.25rem}#vidyaai-embed-root .mb-10{margin-bottom:2.5rem}#vidyaai-embed-root .mb-2{margin-bottom:.5rem}#vidyaai-embed-root .mb-3{margin-bottom:.75rem}#vidyaai-embed-root .mb-4{margin-bottom:1rem}#vidyaai-embed-root .mb-6{margin-bottom:1.5rem}#vidyaai-embed-root .mb-8{margin-bottom:2rem}#vidyaai-embed-root .mt-0{margin-top:0}#vidyaai-embed-root .mt-0\.5{margin-top:.125rem}#vidyaai-embed-root .mt-4{margin-top:1rem}#vidyaai-embed-root .line-clamp-1{overflow:hidden;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:1}#vidyaai-embed-root .block{display:block}#vidyaai-embed-root .flex{display:flex}#vidyaai-embed-root .inline-flex{display:inline-flex}#vidyaai-embed-root .table{display:table}#vidyaai-embed-root .grid{display:grid}#vidyaai-embed-root .hidden{display:none}#vidyaai-embed-root .h-10{height:2.5rem}#vidyaai-embed-root .h-12{height:3rem}#vidyaai-embed-root .h-2{height:.5rem}#vidyaai-embed-root .h-32{height:8rem}#vidyaai-embed-root .h-96{height:24rem}#vidyaai-embed-root .h-\[500px\]{height:500px}#vidyaai-embed-root .h-auto{height:auto}#vidyaai-embed-root .w-1{width:.25rem}#vidyaai-embed-root .w-10{width:2.5rem}#vidyaai-embed-root .w-12{width:3rem}#vidyaai-embed-root .w-2{width:.5rem}#vidyaai-embed-root .w-32{width:8rem}#vidyaai-embed-root .w-52{width:13rem}#vidyaai-embed-root .w-96{width:24rem}#vidyaai-embed-root .w-\[500px\]{width:500px}#vidyaai-embed-root .w-full{width:100%}#vidyaai-embed-root .max-w-7xl{max-width:80rem}#vidyaai-embed-root .-translate-x-1{--tw-translate-x:-0.25rem}#vidyaai-embed-root .-translate-x-1,#vidyaai-embed-root .-translate-x-1\/2{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}#vidyaai-embed-root .-translate-x-1\/2{--tw-translate-x:-50%}#vidyaai-embed-root .translate-y-1{--tw-translate-y:0.25rem}#vidyaai-embed-root .rotate-45,#vidyaai-embed-root .translate-y-1{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}#vidyaai-embed-root .rotate-45{--tw-rotate:45deg}#vidyaai-embed-root .transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}#vidyaai-embed-root .cursor-help{cursor:help}#vidyaai-embed-root .resize{resize:both}#vidyaai-embed-root .grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}#vidyaai-embed-root .flex-wrap{flex-wrap:wrap}#vidyaai-embed-root .items-start{align-items:flex-start}#vidyaai-embed-root .items-center{align-items:center}#vidyaai-embed-root .justify-center{justify-content:center}#vidyaai-embed-root .justify-between{justify-content:space-between}#vidyaai-embed-root .gap-2{gap:.5rem}#vidyaai-embed-root .gap-3{gap:.75rem}#vidyaai-embed-root .gap-3\.5{gap:.875rem}#vidyaai-embed-root .gap-4{gap:1rem}#vidyaai-embed-root .gap-8{gap:2rem}#vidyaai-embed-root :is(.space-y-16>:not([hidden])~:not([hidden])){--tw-space-y-reverse:0;margin-top:calc(4rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(4rem*var(--tw-space-y-reverse))}#vidyaai-embed-root :is(.space-y-2>:not([hidden])~:not([hidden])){--tw-space-y-reverse:0;margin-top:calc(.5rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(.5rem*var(--tw-space-y-reverse))}#vidyaai-embed-root .overflow-hidden{overflow:hidden}#vidyaai-embed-root .scroll-smooth{scroll-behavior:smooth}#vidyaai-embed-root .rounded-2xl{border-radius:1rem}#vidyaai-embed-root .rounded-3xl{border-radius:1.5rem}#vidyaai-embed-root .rounded-full{border-radius:9999px}#vidyaai-embed-root .rounded-lg{border-radius:.5rem}#vidyaai-embed-root .rounded-xl{border-radius:.75rem}#vidyaai-embed-root .rounded-r{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem}#vidyaai-embed-root .rounded-bl-full{border-bottom-left-radius:9999px}#vidyaai-embed-root .border{border-width:1px}#vidyaai-embed-root .border-b{border-bottom-width:1px}#vidyaai-embed-root .border-t{border-top-width:1px}#vidyaai-embed-root .border-brand-orange{--tw-border-opacity:1;border-color:rgb(222 110 48/var(--tw-border-opacity,1))}#vidyaai-embed-root .border-slate-100{--tw-border-opacity:1;border-color:rgb(241 245 249/var(--tw-border-opacity,1))}#vidyaai-embed-root .border-transparent{border-color:transparent}#vidyaai-embed-root .bg-brand-navy{--tw-bg-opacity:1;background-color:rgb(25 51 93/var(--tw-bg-opacity,1))}#vidyaai-embed-root .bg-brand-navy\/10{background-color:rgba(25,51,93,.1)}#vidyaai-embed-root .bg-brand-navy\/5{background-color:rgba(25,51,93,.05)}#vidyaai-embed-root .bg-brand-orange{--tw-bg-opacity:1;background-color:rgb(222 110 48/var(--tw-bg-opacity,1))}#vidyaai-embed-root .bg-brand-orange\/10{background-color:rgba(222,110,48,.1)}#vidyaai-embed-root .bg-emerald-500{--tw-bg-opacity:1;background-color:rgb(16 185 129/var(--tw-bg-opacity,1))}#vidyaai-embed-root .bg-emerald-500\/10{background-color:rgba(16,185,129,.1)}#vidyaai-embed-root .bg-slate-100{--tw-bg-opacity:1;background-color:rgb(241 245 249/var(--tw-bg-opacity,1))}#vidyaai-embed-root .bg-slate-50{--tw-bg-opacity:1;background-color:rgb(248 250 252/var(--tw-bg-opacity,1))}#vidyaai-embed-root .bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255/var(--tw-bg-opacity,1))}#vidyaai-embed-root .bg-white\/95{background-color:hsla(0,0%,100%,.95)}#vidyaai-embed-root .object-cover{-o-object-fit:cover;object-fit:cover}#vidyaai-embed-root .p-2{padding:.5rem}#vidyaai-embed-root .p-2\.5{padding:.625rem}#vidyaai-embed-root .p-3{padding:.75rem}#vidyaai-embed-root .p-3\.5{padding:.875rem}#vidyaai-embed-root .p-4{padding:1rem}#vidyaai-embed-root .p-6{padding:1.5rem}#vidyaai-embed-root .px-3{padding-left:.75rem;padding-right:.75rem}#vidyaai-embed-root .px-3\.5{padding-left:.875rem;padding-right:.875rem}#vidyaai-embed-root .px-4{padding-left:1rem;padding-right:1rem}#vidyaai-embed-root .py-1{padding-top:.25rem;padding-bottom:.25rem}#vidyaai-embed-root .py-1\.5{padding-top:.375rem;padding-bottom:.375rem}#vidyaai-embed-root .py-12{padding-top:3rem;padding-bottom:3rem}#vidyaai-embed-root .py-2{padding-top:.5rem;padding-bottom:.5rem}#vidyaai-embed-root .py-3{padding-top:.75rem;padding-bottom:.75rem}#vidyaai-embed-root .pl-2{padding-left:.5rem}#vidyaai-embed-root .pt-2{padding-top:.5rem}#vidyaai-embed-root .pt-4{padding-top:1rem}#vidyaai-embed-root .text-left{text-align:left}#vidyaai-embed-root .text-center{text-align:center}#vidyaai-embed-root .text-2xl{font-size:1.5rem;line-height:2rem}#vidyaai-embed-root .text-\[11px\]{font-size:11px}#vidyaai-embed-root .text-lg{font-size:1.125rem;line-height:1.75rem}#vidyaai-embed-root .text-sm{font-size:.875rem;line-height:1.25rem}#vidyaai-embed-root .text-xs{font-size:.75rem;line-height:1rem}#vidyaai-embed-root .font-bold{font-weight:700}#vidyaai-embed-root .font-extrabold{font-weight:800}#vidyaai-embed-root .font-semibold{font-weight:600}#vidyaai-embed-root .uppercase{text-transform:uppercase}#vidyaai-embed-root .leading-relaxed{line-height:1.625}#vidyaai-embed-root .leading-snug{line-height:1.375}#vidyaai-embed-root .tracking-tight{letter-spacing:-.025em}#vidyaai-embed-root .tracking-wider{letter-spacing:.05em}#vidyaai-embed-root .text-brand-navy{--tw-text-opacity:1;color:rgb(25 51 93/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-brand-orange{--tw-text-opacity:1;color:rgb(222 110 48/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-emerald-600{--tw-text-opacity:1;color:rgb(5 150 105/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-slate-200{--tw-text-opacity:1;color:rgb(226 232 240/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-slate-300{--tw-text-opacity:1;color:rgb(203 213 225/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-slate-400{--tw-text-opacity:1;color:rgb(148 163 184/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-slate-500{--tw-text-opacity:1;color:rgb(100 116 139/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-slate-600{--tw-text-opacity:1;color:rgb(71 85 105/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-slate-700{--tw-text-opacity:1;color:rgb(51 65 85/var(--tw-text-opacity,1))}#vidyaai-embed-root .text-white{--tw-text-opacity:1;color:rgb(255 255 255/var(--tw-text-opacity,1))}#vidyaai-embed-root .antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}#vidyaai-embed-root .opacity-0{opacity:0}#vidyaai-embed-root .opacity-40{opacity:.4}#vidyaai-embed-root .shadow-figma{--tw-shadow:0 20px 50px rgba(25,51,93,.08);--tw-shadow-colored:0 20px 50px var(--tw-shadow-color)}#vidyaai-embed-root .shadow-figma,#vidyaai-embed-root .shadow-figma-hover{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}#vidyaai-embed-root .shadow-figma-hover{--tw-shadow:0 30px 60px rgba(222,110,48,.12);--tw-shadow-colored:0 30px 60px var(--tw-shadow-color)}#vidyaai-embed-root .shadow-inner{--tw-shadow:inset 0 2px 4px 0 rgba(0,0,0,.05);--tw-shadow-colored:inset 0 2px 4px 0 var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}#vidyaai-embed-root .outline{outline-style:solid}#vidyaai-embed-root .blur{--tw-blur:blur(8px)}#vidyaai-embed-root .blur,#vidyaai-embed-root .blur-3xl{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}#vidyaai-embed-root .blur-3xl{--tw-blur:blur(64px)}#vidyaai-embed-root .backdrop-blur-md{--tw-backdrop-blur:blur(12px)}#vidyaai-embed-root .backdrop-blur-md,#vidyaai-embed-root .backdrop-filter{-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}#vidyaai-embed-root .transition{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,-webkit-backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}#vidyaai-embed-root .transition-all{transition-property:all;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}#vidyaai-embed-root .transition-colors{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}#vidyaai-embed-root .transition-transform{transition-property:transform;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}#vidyaai-embed-root .duration-200{transition-duration:.2s}#vidyaai-embed-root .duration-300{transition-duration:.3s}#vidyaai-embed-root .duration-500{transition-duration:.5s}#vidyaai-embed-root .duration-700{transition-duration:.7s}#vidyaai-embed-root .hover\:border-brand-orange\/30:hover{border-color:rgba(222,110,48,.3)}#vidyaai-embed-root .hover\:bg-brand-orange:hover{--tw-bg-opacity:1;background-color:rgb(222 110 48/var(--tw-bg-opacity,1))}#vidyaai-embed-root .hover\:bg-brand-orangeLight:hover{--tw-bg-opacity:1;background-color:rgb(255 244 238/var(--tw-bg-opacity,1))}#vidyaai-embed-root .hover\:text-brand-orange:hover{--tw-text-opacity:1;color:rgb(222 110 48/var(--tw-text-opacity,1))}#vidyaai-embed-root .hover\:shadow-figma-hover:hover{--tw-shadow:0 30px 60px rgba(222,110,48,.12);--tw-shadow-colored:0 30px 60px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}#vidyaai-embed-root .focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}#vidyaai-embed-root :is(.group:hover .group-hover\:translate-x-1){--tw-translate-x:0.25rem;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}#vidyaai-embed-root :is(.group:hover .group-hover\:scale-110){--tw-scale-x:1.1;--tw-scale-y:1.1;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}#vidyaai-embed-root :is(.group:hover .group-hover\:scale-\[1\.02\]){--tw-scale-x:1.02;--tw-scale-y:1.02;transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}#vidyaai-embed-root :is(.group:hover .group-hover\:border-brand-orange\/30){border-color:rgba(222,110,48,.3)}#vidyaai-embed-root :is(.group:hover .group-hover\:bg-brand-orange\/10){background-color:rgba(222,110,48,.1)}#vidyaai-embed-root :is(.group:hover .group-hover\:text-brand-orange){--tw-text-opacity:1;color:rgb(222 110 48/var(--tw-text-opacity,1))}@media (min-width:640px){#vidyaai-embed-root .sm\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}#vidyaai-embed-root .sm\:p-4{padding:1rem}#vidyaai-embed-root .sm\:p-8{padding:2rem}#vidyaai-embed-root .sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}#vidyaai-embed-root .sm\:text-3xl{font-size:1.875rem;line-height:2.25rem}#vidyaai-embed-root .sm\:text-base{font-size:1rem;line-height:1.5rem}}@media (min-width:1024px){#vidyaai-embed-root .lg\:col-span-5{grid-column:span 5/span 5}#vidyaai-embed-root .lg\:col-span-7{grid-column:span 7/span 7}#vidyaai-embed-root .lg\:mb-14{margin-bottom:3.5rem}#vidyaai-embed-root .lg\:grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}#vidyaai-embed-root .lg\:gap-12{gap:3rem}#vidyaai-embed-root :is(.lg\:space-y-24>:not([hidden])~:not([hidden])){--tw-space-y-reverse:0;margin-top:calc(6rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(6rem*var(--tw-space-y-reverse))}#vidyaai-embed-root .lg\:px-8{padding-left:2rem;padding-right:2rem}#vidyaai-embed-root .lg\:py-24{padding-top:6rem;padding-bottom:6rem}#vidyaai-embed-root .lg\:text-4xl{font-size:2.25rem;line-height:2.5rem}}
</style>

    <style>
        #vidyaai-embed-root {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #19335D;
            overflow-x: hidden;
        }

        .gradient-text-navy {
            background: linear-gradient(135deg, #19335D 0%, #244579 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-text-orange {
            background: linear-gradient(135deg, #DE6E30 0%, #F38C52 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(25, 51, 93, 0.08);
        }

        /* Image transition effects */
        .story-img-container { transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1); }

        .feature-nav-item.active { border-color: #DE6E30; background-color: #FFF4EE; }
        .feature-nav-item.active .nav-icon { color: #DE6E30; transform: scale(1.1); }
        .feature-nav-item.active .nav-title { color: #19335D; font-weight: 700; }
        .feature-nav-item.active .nav-indicator { height: 100%; background-color: #DE6E30; }

        /* Pulse glow animation */
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.03); }
        }
        .animate-glow { animation: pulseGlow 4s infinite ease-in-out; }

        /* ---------- NEW: Core Capabilities nav — JS-driven sticky (works even if a parent has overflow/transform) ---------- */
        #navColumn { position: relative; }
        #navCard {
            max-height: calc(100vh - 2.5rem);
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        #navCard::-webkit-scrollbar { width: 5px; }
        #navCard::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 3px; }
        #navCard.js-fixed {
            position: fixed !important;
            z-index: 30;
        }
        #navCard.js-bottom {
            position: absolute !important;
            z-index: 30;
            left: 0;
            width: 100%;
        }

        /* ---------- NEW: Scroll-reveal for story cards ---------- */
        .story-card {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s cubic-bezier(0.16,1,0.3,1), transform 0.7s cubic-bezier(0.16,1,0.3,1);
        }
        .story-card.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------- NEW: Sub-feature card stagger ---------- */
        .story-card .grid > div {
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .story-card.in-view .grid > div {
            opacity: 1;
            transform: translateY(0);
        }
        .story-card.in-view .grid > div:nth-child(1) { transition-delay: 0.05s; }
        .story-card.in-view .grid > div:nth-child(2) { transition-delay: 0.12s; }
        .story-card.in-view .grid > div:nth-child(3) { transition-delay: 0.19s; }
        .story-card.in-view .grid > div:nth-child(4) { transition-delay: 0.26s; }

        /* ---------- NEW: Accessible focus states ---------- */
        button:focus-visible,
        a:focus-visible {
            outline: 2px solid #DE6E30;
            outline-offset: 2px;
            border-radius: 8px;
        }

        /* ---------- NEW: Back-to-top / jump button ---------- */
        /* phones/tablets: the 7-module navigation list is desktop-only -
           the feature cards themselves carry the story on mobile */
        @media (max-width: 1023px) {
            #vidyaai-embed-root #navColumn { display: none !important; }
        }
        /* UP button sits directly above the floating TOC button (same left
           rail, same 50px circle) instead of clashing with the WhatsApp/Call
           FABs bottom-right */
        #jumpToNav {
            position: fixed;
            left: 16px;
            top: 50%;
            right: auto;
            bottom: auto;
            width: 50px;
            height: 50px;
            border: 2.5px solid #fff;
            box-shadow: 0 6px 14px rgba(15,32,64,.28);
            z-index: 99989;
            opacity: 0;
            pointer-events: none;
            transform: translateY(calc(-50% - 62px)) scale(0.9);
            transition: all 0.3s cubic-bezier(0.16,1,0.3,1);
        }
        #jumpToNav.visible {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(calc(-50% - 62px)) scale(1);
        }
        /* phones: the TOC fab docks bottom-left, so the UP button docks right
           above it (16px fab + 50px height + 12px gap = bottom 78px) */
        @media (max-width: 600px) {
            #jumpToNav {
                top: auto;
                bottom: 78px;
                transform: scale(0.9);
            }
            #jumpToNav.visible {
                transform: scale(1);
            }
        }

        /* ---------- NEW: image skeleton shimmer while loading ---------- */
        .img-skeleton {
            position: relative;
            background: linear-gradient(90deg, #f1f5f9 25%, #f8fafc 37%, #f1f5f9 63%);
            background-size: 400% 100%;
            animation: shimmer 1.4s ease infinite;
        }
        @keyframes shimmer {
            0% { background-position: 100% 50%; }
            100% { background-position: 0 50%; }
        }
        .story-img-container img { opacity: 0; transition: opacity 0.4s ease; }
        .story-img-container img.loaded { opacity: 1; }

        /* ---------- NEW: hover/focus info tooltips on feature pills ---------- */
        .pill-wrap { position: relative; }
        .feature-tooltip {
            text-align: left;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .pill-wrap:hover .feature-tooltip,
        .pill-wrap:focus-within .feature-tooltip,
        .pill-wrap.tooltip-open .feature-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        /* Respect reduced motion preference */
        @media (prefers-reduced-motion: reduce) {
            .story-card,
            .story-card .grid > div,
            #jumpToNav,
            .animate-glow,
            #vidyaai-embed-root { transition: none !important; animation: none !important; }
            .story-card { opacity: 1; transform: none; }
            .story-card .grid > div { opacity: 1; transform: none; }
        }

        @media (max-width: 1023px) {
            /* keep first card visible immediately on mobile so page never looks empty before JS runs */
            .story-card:first-of-type { opacity: 1; transform: none; }
        }
    </style>

<div id="vidyaai-embed-root">
  <div class="bg-white text-brand-navy antialiased">

    <section class="w-full relative py-12 lg:py-24 bg-white">

        <!-- Background Architectural Grid & Subtle Blobs -->
        <div class="absolute inset-0 pointer-events-none opacity-40">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-brand-orange/10 rounded-full blur-3xl animate-glow"></div>
            <div class="absolute bottom-1/3 left-10 w-[500px] h-[500px] bg-brand-navy/5 rounded-full blur-3xl"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(#19335D 0.75px, transparent 0.75px); background-size: 24px 24px; opacity: 0.07;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-brand-navy text-center mb-10 lg:mb-14 tracking-tight">
                Powerful Admission CRM with Simplicity
            </h2>

            <!-- Sticky Scrolling Storytelling Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start relative">

                <!-- LEFT COLUMN: Sticky Navigation & Story Index (Desktop) -->
                <div class="lg:col-span-5 z-20" id="navColumn">
                    <div id="navCard" class="bg-white/95 backdrop-blur-md p-2 sm:p-4 rounded-2xl border border-slate-100 shadow-figma space-y-2">

                        <div class="pt-2"></div>

                        <!-- Navigation Item 1: VidyaAI -->
                        <button onclick="scrollToSection('vidyaai')" id="nav-vidyaai" aria-current="true" class="feature-nav-item active w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/01-VidyaAI-Intelligence.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-brand-navy nav-title transition-colors">VidyaAI Intelligence</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">24x7 Assistant, Intent Scoring & Calling</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>

                        <!-- Navigation Item 2: Admission CRM -->
                        <button onclick="scrollToSection('admission-crm')" id="nav-admission-crm" class="feature-nav-item w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/02-Admission-CRM.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-700 nav-title transition-colors">Admission CRM</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">Centralized Prospect Tracking</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>

                        <!-- Navigation Item 3: Marketing Automation -->
                        <button onclick="scrollToSection('marketing-automation')" id="nav-marketing-automation" class="feature-nav-item w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/03-Marketing-Automation.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-700 nav-title transition-colors">Marketing Automation</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">Targeted Multichannel Campaigns</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>

                        <!-- Navigation Item 4: Chatbot & Live Chat -->
                        <button onclick="scrollToSection('chatbot')" id="nav-chatbot" class="feature-nav-item w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/04-Chatbot-and-Live-Chat.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-700 nav-title transition-colors">Chatbot & Live Chat</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">24/7 Automated Engagement</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>

                        <!-- Navigation Item 5: Application Management -->
                        <button onclick="scrollToSection('application-mgmt')" id="nav-application-mgmt" class="feature-nav-item w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/05-Application-System.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-700 nav-title transition-colors">Application System</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">Forms, Verification & GD-PI</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>

                        <!-- Navigation Item 6: WhatsApp Business API -->
                        <button onclick="scrollToSection('whatsapp-api')" id="nav-whatsapp-api" class="feature-nav-item w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/06-WhatsApp-API.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-700 nav-title transition-colors">WhatsApp API</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">Two-Way Direct Messaging</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>

                        <!-- Navigation Item 7: Mobile CRM -->
                        <button onclick="scrollToSection('mobile-crm')" id="nav-mobile-crm" class="feature-nav-item w-full text-left p-3.5 rounded-xl border border-transparent transition-all duration-300 flex items-center justify-between group relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-1 nav-indicator rounded-r transition-all duration-300"></div>
                            <div class="flex items-center gap-3.5 pl-2">
                                <div class="w-10 h-10 rounded-lg bg-brand-navy/5 group-hover:bg-brand-orange/10 flex items-center justify-center text-brand-navy group-hover:text-brand-orange transition-colors nav-icon">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/07-Mobile-CRM.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-slate-700 nav-title transition-colors">Mobile CRM</h3>
                                    <p class="text-xs text-slate-500 line-clamp-1">Field Tracking & Click-To-Call</p>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:-1px"><path d="M9 6l6 6-6 6"/></svg>
                        </button>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Interactive Storytelling Stream Cards -->
                <div class="lg:col-span-7 space-y-16 lg:space-y-24">

                    <!-- ITEM 1: VidyaAI Admission Intelligence -->
                    <div id="vidyaai" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-brand-orange/10 rounded-bl-full pointer-events-none transition-transform group-hover:scale-110"></div>

                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-brand-orange/10 text-brand-orange rounded-xl text-lg"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/08-VidyaAI-Admission-Intelligence.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"></span>
                            <span class="text-xs font-bold tracking-wider text-brand-orange uppercase">AI Engine</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">VidyaAI Admission Intelligence</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            Next-gen artificial intelligence engineered to elevate counselor efficiency, accelerate response velocity, and qualify student intent in real-time.
                        </p>

                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/vidyaai-admission-intelligence-informative-image-by-extraaedge.png"
                                 alt="VidyaAI Admission Intelligence"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=VidyaAI+Admission+Intelligence'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-brand-orange/30 transition-all">
                                <div class="flex items-center gap-2 mb-1 text-brand-navy font-semibold text-sm">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/09-AI-Admission-Assist.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> AI Admission Assist
                                </div>
                                <p class="text-xs text-slate-600">24×7 AI that answers student queries, guides applications, and supports counselors with live context without delays.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-brand-orange/30 transition-all">
                                <div class="flex items-center gap-2 mb-1 text-brand-navy font-semibold text-sm">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/10-AI-Lead-Intent-Scoring.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> AI Lead Intent Scoring
                                </div>
                                <p class="text-xs text-slate-600">Automatically prioritizes high-intent leads using behavior signals so counselors focus on high conversion prospects.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-brand-orange/30 transition-all">
                                <div class="flex items-center gap-2 mb-1 text-brand-navy font-semibold text-sm">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/11-Smart-Follow-up-Intelligence.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Smart Follow-up Intelligence
                                </div>
                                <p class="text-xs text-slate-600">AI tells your team who to follow up with, when to act, and what to do next, reducing missed opportunities.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-brand-orange/30 transition-all">
                                <div class="flex items-center gap-2 mb-1 text-brand-navy font-semibold text-sm">
                                    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/12-AI-Calling-for-Qualification.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> AI Calling for Qualification
                                </div>
                                <p class="text-xs text-slate-600">Qualifies large volumes of inquiries, captures intent, and passes only serious prospects to counselors.</p>
                            </div>
                        </div>
                        <div class="mt-4 p-4 rounded-xl bg-brand-navy text-white flex items-start gap-3">
                            <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/13-Counselor-Performance-Intelligence.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
                            <div>
                                <h3 class="text-xs font-bold text-brand-orange uppercase">Counselor Performance Intelligence</h3>
                                <p class="text-xs text-slate-200 mt-0.5">Clear visibility into response times, follow-ups, and conversion impact by counselor to drive focused coaching and better outcomes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 2: Admission CRM -->
                    <div id="admission-crm" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-brand-navy/10 text-brand-navy rounded-xl text-lg"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/14-Core-System.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"></span>
                            <span class="text-xs font-bold tracking-wider text-brand-navy uppercase">Core System</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">Admission CRM</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            Admission CRM software centralizes your entire admissions process, giving you real-time visibility into every prospect's journey from enquiry to enrolment. Track inquiries, manage applications, and automate follow-ups seamlessly, all from one platform. With intelligent lead prioritization, your team focuses on high-potential candidates while data-driven insights guide every decision.
                        </p>
                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/admission-crm-informative-image-by-extraaedge.png"
                                 alt="Admission CRM"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=Admission+CRM'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Features</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/15-Funnel-Management.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Funnel Management</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">See every prospect's stage from enquiry to enrolment and spot drop-offs instantly.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/16-Follow-Up-Manager.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Follow-Up Manager</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Auto-schedules reminders so no prospect ever slips through the cracks.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/17-Reporting-Dashboard.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Reporting Dashboard</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Live conversion and counselor-performance reports, updated in real time.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 3: Marketing Automation -->
                    <div id="marketing-automation" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-brand-orange/10 text-brand-orange rounded-xl text-lg"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/18-Engagement-Engine.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"></span>
                            <span class="text-xs font-bold tracking-wider text-brand-orange uppercase">Engagement Engine</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">Marketing Automation</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time. Integrated with your Admission CRM, it streamlines lead nurturing across multiple channels while you focus on strategy. Intelligent audience segmentation ensures every message resonates, improving engagement and conversion rates.
                        </p>
                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/marketing-automation-image-by-extraaedge.png"
                                 alt="Marketing Automation"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=Marketing+Automation'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Features</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/19-Email-Marketing.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Email Marketing</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Personalized drip campaigns triggered automatically by prospect behavior.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/20-Integrated-Communication-Channels.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Integrated Communication Channels</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Email, SMS, and WhatsApp orchestrated from a single workflow.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/21-Campaign-Analytics.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Campaign Analytics</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Track opens, clicks, and conversions for every campaign you run.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 4: Chatbot & Live Chat -->
                    <div id="chatbot" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-brand-navy/10 text-brand-navy rounded-xl text-lg"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/22-24-7-Connectivity.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"></span>
                            <span class="text-xs font-bold tracking-wider text-brand-navy uppercase">24/7 Connectivity</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">Chatbot & Live Chat</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations. Smart routing directs prospects to the right team members based on their interests and application stage.
                        </p>
                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/chatbot-and-livechat-image-by-extraaedge.png"
                                 alt="Chatbot & Live Chat"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=Chatbot+and+Live+Chat'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Features</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/23-Automated-Chat-Workflow.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Automated Chat Workflow</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Pre-built conversation flows that qualify and route enquiries on their own.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/24-Live-Chat-Enablement.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Live Chat Enablement</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Seamless handoff from bot to human counselor whenever it's needed.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/25-Meeting-Scheduler.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Meeting Scheduler</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Prospects book a counselor slot directly from the chat window.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 5: Application Management System -->
                    <div id="application-mgmt" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-brand-orange/10 text-brand-orange rounded-xl text-lg"><svg viewBox="0 0 24 24" width="1em" height="1em" fill="currentColor" style="display:inline-block;vertical-align:-0.125em"><path d="M4 5a2 2 0 0 1 2-2h4.6l2 2H18a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5z"/></svg></span>
                            <span class="text-xs font-bold tracking-wider text-brand-orange uppercase">Enrolment Portal</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">Application Management System</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            Application management system streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly. Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage.
                        </p>
                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/application-management-sysytem-image-by-extraaedge.png"
                                 alt="Application Management System"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=Application+Management+System'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Features</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/26-Application-Form-Builder-and-Widgets.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Application Form Builder & Widgets</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Drag-and-drop forms you can embed anywhere on your site.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/27-Video-GD-PI-and-Counseling.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Video GD-PI & Counseling</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Run group discussions and interviews virtually, with recordings saved to the CRM.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><svg viewBox="0 0 24 24" width="1em" height="1em" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block;vertical-align:-0.125em"><rect x="2.5" y="5.5" width="19" height="13" rx="2"/><path d="M2.5 9.5h19"/></svg> Payment Integration</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Secure fee collection built right into the application flow.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 6: WhatsApp Business API -->
                    <div id="whatsapp-api" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-emerald-500/10 text-emerald-600 rounded-xl text-lg"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/28-Direct-Channel.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"></span>
                            <span class="text-xs font-bold tracking-wider text-emerald-600 uppercase">Direct Channel</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">WhatsApp Business API</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM. Data-driven campaign optimization ensures higher open rates and faster response times for improved enrolment outcomes.
                        </p>
                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/whatsapp-business-api-image-by-extraaedge.png"
                                 alt="WhatsApp Business API"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=WhatsApp+Business+API'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Features</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/29-Two-way-WhatsApp-and-live-chat.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Two-way WhatsApp and live chat</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Reply to prospects directly inside WhatsApp threads, synced with the CRM.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/30-Bulk-WhatsApp-and-automated-campaigns.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Bulk WhatsApp & automated campaigns</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Send templated updates to thousands of prospects instantly.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/31-Verified-business-account.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Verified business account</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Green-tick verified number builds instant trust with prospects.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 7: Mobile CRM -->
                    <div id="mobile-crm" class="story-card bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-figma hover:shadow-figma-hover transition-all duration-500 relative overflow-hidden group">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="p-2.5 bg-brand-navy/10 text-brand-navy rounded-xl text-lg"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/32-On-the-go-Productivity.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"></span>
                            <span class="text-xs font-bold tracking-wider text-brand-navy uppercase">On-the-go Productivity</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-brand-navy mb-4">Mobile CRM</h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                            Our Mobile CRM empowers work-from-home and field counselors to stay productive on the go. With built-in field tracking, monitor visits, log activities, and complete follow-ups efficiently from anywhere. Real-time sync with your Admission CRM ensures every interaction is captured for intelligent reporting.
                        </p>
                        <div class="story-img-container mb-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-inner group-hover:border-brand-orange/30 img-skeleton">
                            <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/mobaile-crm-image-by-extraaedge.png"
                                 alt="Mobile CRM"
                                 loading="lazy" decoding="async"
                                 class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-700"
                                 onload="this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')"
                                 onerror="this.src='https://placehold.co/800x450/19335D/ffffff?text=Mobile+CRM'; this.classList.add('loaded'); this.parentElement.classList.remove('img-skeleton')">
                        </div>
                        <div class="pt-4 border-t border-slate-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Features</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/33-Click-To-Call.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Click-To-Call</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Dial prospects straight from the mobile app; every call logs automatically.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/34-Field-Tracker.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Field Tracker</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">GPS check-in and check-out for on-ground counselor visits.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                                <span class="relative inline-flex pill-wrap"><span tabindex="0" class="px-3.5 py-1.5 rounded-lg bg-slate-100 text-brand-navy text-xs font-semibold flex items-center gap-2 hover:bg-brand-orangeLight hover:text-brand-orange transition-colors cursor-help focus:outline-none"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/35-Missed-Call-Lead-Capture.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em" loading="lazy" decoding="async"> Missed Call Lead Capture</span><span class="feature-tooltip pointer-events-none absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-52 rounded-lg bg-brand-navy text-white text-[11px] leading-snug px-3 py-2 opacity-0 invisible transition-all duration-200 translate-y-1 z-30 shadow-figma-hover">Every missed call auto-creates a fresh lead in the CRM.<span class="absolute left-1/2 -translate-x-1/2 top-full w-2 h-2 bg-brand-navy rotate-45"></span></span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- NEW: floating jump-to-nav button (mobile + desktop) -->
    <button id="jumpToNav" onclick="scrollToTopNav()" aria-label="Jump back to feature navigation"
        class="w-12 h-12 rounded-full bg-brand-navy text-white shadow-figma-hover flex items-center justify-center hover:bg-brand-orange transition-colors">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
    </button>

    <script>
        // ---------- Config: single source of truth for all 7 sections ----------
        const SECTIONS = [
            { id: 'vidyaai',              label: 'VidyaAI Intelligence',  icon: 'fa-solid fa-brain' },
            { id: 'admission-crm',        label: 'Admission CRM',         icon: 'fa-solid fa-users-gear' },
            { id: 'marketing-automation', label: 'Marketing Automation',  icon: 'fa-solid fa-bullhorn' },
            { id: 'chatbot',              label: 'Chatbot & Live Chat',   icon: 'fa-solid fa-comments' },
            { id: 'application-mgmt',     label: 'Application System',    icon: 'fa-solid fa-file-signature' },
            { id: 'whatsapp-api',         label: 'WhatsApp API',         icon: 'fa-brands fa-whatsapp' },
            { id: 'mobile-crm',           label: 'Mobile CRM',           icon: 'fa-solid fa-mobile-screen-button' },
        ];

        // Smooth scroll to card (used by desktop nav + mobile pills)
        function scrollToSection(id) {
            const element = document.getElementById(id);
            if (element) {
                const yOffset = window.innerWidth < 1024 ? -70 : -100;
                const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
                window.scrollTo({ top: y, behavior: 'smooth' });
                history.replaceState(null, '', `#${id}`);
            }
        }

        function scrollToTopNav() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.story-card');
            const navItems = document.querySelectorAll('.feature-nav-item');
            const navCard = document.getElementById('navCard');
            const navColumn = document.getElementById('navColumn');
            const rightColumn = document.querySelector('.lg\\:col-span-7');
            const jumpBtn = document.getElementById('jumpToNav');

            // ---------- JS-driven sticky nav card (immune to any parent overflow/transform) ----------
            let naturalTop = 0, naturalLeft = 0, naturalWidth = 0, containerBottom = 0;

            function getTopOffset(navHeight) {
                const vh = window.innerHeight;
                const margin = window.innerWidth >= 1024 ? 24 : 12;
                if (navHeight >= vh - margin * 2) {
                    // card taller than viewport: just pin near top with a small margin
                    return margin;
                }
                // vertically center the card in the viewport
                return Math.max(margin, (vh - navHeight) / 2);
            }

            function measureStickyBounds() {
                // reset to normal flow before measuring so we get true natural position
                navCard.classList.remove('js-fixed', 'js-bottom');
                navCard.style.top = '';
                navCard.style.left = '';
                navCard.style.width = '';

                const navColRect = navColumn.getBoundingClientRect();
                naturalTop = navColRect.top + window.scrollY;
                naturalLeft = navColRect.left;
                naturalWidth = navColRect.width;

                if (rightColumn) {
                    const rightRect = rightColumn.getBoundingClientRect();
                    containerBottom = rightRect.bottom + window.scrollY;
                } else {
                    containerBottom = naturalTop + navCard.offsetHeight;
                }

                updateStickyPosition();
            }

            function updateStickyPosition() {
                if (window.innerWidth < 640) {
                    // on very small screens keep it simple/static to avoid layout jitter
                    navCard.classList.remove('js-fixed', 'js-bottom');
                    navCard.style.top = '';
                    navCard.style.left = '';
                    navCard.style.width = '';
                }

                const scrollY = window.scrollY;
                const navHeight = navCard.offsetHeight;
                const topOffset = getTopOffset(navHeight);
                const stickyStartAt = naturalTop - topOffset;
                const stickyEndAt = containerBottom - topOffset - navHeight;

                if (scrollY <= stickyStartAt) {
                    navCard.classList.remove('js-fixed', 'js-bottom');
                    navCard.style.top = '';
                    navCard.style.left = '';
                    navCard.style.width = '';
                } else if (scrollY > stickyStartAt && scrollY <= stickyEndAt) {
                    navCard.classList.add('js-fixed');
                    navCard.classList.remove('js-bottom');
                    navCard.style.top = `${topOffset}px`;
                    navCard.style.left = `${naturalLeft}px`;
                    navCard.style.width = `${naturalWidth}px`;
                } else {
                    navCard.classList.add('js-bottom');
                    navCard.classList.remove('js-fixed');
                    navCard.style.top = `${containerBottom - naturalTop - navHeight}px`;
                    navCard.style.left = '';
                    navCard.style.width = '';
                }
            }

            let stickyTicking = false;
            window.addEventListener('scroll', () => {
                if (!stickyTicking) {
                    window.requestAnimationFrame(() => {
                        updateStickyPosition();
                        stickyTicking = false;
                    });
                    stickyTicking = true;
                }
            }, { passive: true });

            window.addEventListener('resize', () => {
                window.requestAnimationFrame(measureStickyBounds);
            });

            // re-measure if images loading inside the right column change its height
            if (rightColumn && 'ResizeObserver' in window) {
                const ro = new ResizeObserver(() => window.requestAnimationFrame(measureStickyBounds));
                ro.observe(rightColumn);
            }

            // initial measure (after layout settles)
            window.requestAnimationFrame(measureStickyBounds);
            window.addEventListener('load', measureStickyBounds);

            // ---------- Active state sync on the always-sticky Core Capabilities nav ----------
            const activeObserverOptions = {
                root: null,
                rootMargin: '-20% 0px -50% 0px',
                threshold: 0.1
            };
            const activeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const activeId = entry.target.getAttribute('id');

                        navItems.forEach(item => {
                            const isActive = item.id === `nav-${activeId}`;
                            item.classList.toggle('active', isActive);
                            item.setAttribute('aria-current', isActive ? 'true' : 'false');
                        });

                        // keep the active nav row scrolled into view inside the sticky card
                        // (relevant on short mobile screens where navCard itself scrolls)
                        const activeNavItem = document.getElementById(`nav-${activeId}`);
                        if (activeNavItem && navCard) {
                            const cardRect = navCard.getBoundingClientRect();
                            const itemRect = activeNavItem.getBoundingClientRect();
                            const isOutOfView = itemRect.top < cardRect.top || itemRect.bottom > cardRect.bottom;
                            if (isOutOfView) {
                                activeNavItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        }
                    }
                });
            }, activeObserverOptions);
            sections.forEach(section => activeObserver.observe(section));

            // ---------- Reveal-on-scroll for story cards ----------
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.12 });
            sections.forEach(section => revealObserver.observe(section));

            // ---------- Jump-to-nav button visibility on scroll ----------
            let ticking = false;
            function updateOnScroll() {
                jumpBtn.classList.toggle('visible', window.scrollY > 600);
                ticking = false;
            }
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(updateOnScroll);
                    ticking = true;
                }
            }, { passive: true });
            updateOnScroll();

            // ---------- Keyboard navigation: Left/Right arrows jump between sections ----------
            document.addEventListener('keydown', (e) => {
                if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
                const activeNav = document.querySelector('.feature-nav-item.active');
                if (!activeNav) return;
                const currentId = activeNav.id.replace('nav-', '');
                const idx = SECTIONS.findIndex(s => s.id === currentId);
                if (e.key === 'ArrowRight' && idx < SECTIONS.length - 1 && (e.altKey || e.metaKey)) {
                    scrollToSection(SECTIONS[idx + 1].id);
                } else if (e.key === 'ArrowLeft' && idx > 0 && (e.altKey || e.metaKey)) {
                    scrollToSection(SECTIONS[idx - 1].id);
                }
            });

            // ---------- Tap-to-toggle tooltips (robust fallback for touch devices) ----------
            const pillWraps = document.querySelectorAll('.pill-wrap');
            pillWraps.forEach(wrap => {
                wrap.addEventListener('click', (e) => {
                    const alreadyOpen = wrap.classList.contains('tooltip-open');
                    pillWraps.forEach(w => w.classList.remove('tooltip-open'));
                    if (!alreadyOpen) wrap.classList.add('tooltip-open');
                    e.stopPropagation();
                });
            });
            document.addEventListener('click', () => {
                pillWraps.forEach(w => w.classList.remove('tooltip-open'));
            });

            // ---------- Deep-link support: open directly to a section via #hash ----------
            if (window.location.hash) {
                const targetId = window.location.hash.replace('#', '');
                if (SECTIONS.some(s => s.id === targetId)) {
                    setTimeout(() => scrollToSection(targetId), 150);
                }
            }
        });
    </script>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
  </div>
</div>

<section id="ee-products" aria-label="Our products">
  <div class="eep-wrap">

    <div class="eep-head">
      <div class="eep-head-l">
        <h2>One platform. <span class="eep-accent">Every admissions tool.</span></h2>
        <p class="eep-sub">From first enquiry to enrolled - explore the suite. Tap or hover any product to see it come alive.</p>
      </div>
      <div class="eep-search" id="eepSearch">
        <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/products-icon-01.svg" alt="" loading="lazy" decoding="async">
        <input type="text" id="eepInput" placeholder="Search products…" aria-label="Search products" autocomplete="off">
        <button class="eep-clear" id="eepClear" aria-label="Clear search">&times;</button>
      </div>
    </div>

    <div class="eep-filters" id="eepFilters" role="group" aria-label="Filter products by category"></div>

    <div class="eep-main">
      <!-- Spotlight -->
      <aside class="eep-spot" id="eepSpot" aria-live="polite">
        <div class="eep-spot-top">
          <span class="eep-spot-tag"><i></i><span id="eepSpotCat">AI &amp; automation</span></span>
          <span class="eep-live"><b></b>Live preview</span>
        </div>
        <div class="eep-stage"><div class="eep-scene" id="eepScene"></div></div>
        <div class="eep-spot-body">
          <div class="eep-spot-icon" id="eepSpotIcon"></div>
          <h3 class="eep-spot-title" id="eepSpotTitle"></h3>
          <p class="eep-spot-desc" id="eepSpotDesc"></p>
          <div class="eep-spot-tags" id="eepSpotTags"></div>
          <a class="eep-spot-cta" id="eepSpotCta" href="#admission-form">See it in action <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/products-icon-02.svg" alt="" loading="lazy" decoding="async"></a>
        </div>
      </aside>

      <!-- Grid -->
      <div class="eep-grid" id="eepGrid">
        <div class="eep-empty" id="eepEmpty">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/products-icon-03.svg" alt="" loading="lazy" decoding="async">
          <b>No products match that</b>
          <span>Try a different word, or clear your search.</span>
          <button id="eepReset" type="button">Reset filters</button>
        </div>
      </div>
    </div>
    <div class="eep-explore-wrap" style="text-align:center;margin-top:clamp(26px,3.4vw,40px)">
      <a href="/products/" class="eep-explore-btn" style="display:inline-flex;align-items:center;gap:9px;background:var(--orange-700,#B5551D);color:#fff;font-weight:700;font-size:16px;padding:15px 34px;border-radius:999px;box-shadow:0 14px 30px -10px rgba(222,110,48,.55);transition:transform .2s ease,box-shadow .2s ease;text-decoration:none" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
        Explore All Products
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  </div>

  <script>
  (function(){
    var root = document.getElementById('ee-products');
    if(!root) return;

    /* ---- icons ---- */
    var IC = {
      crm:'<svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke-width="1.6"/><path d="M3.5 19c.6-3.1 2.8-5 5.5-5s4.9 1.9 5.5 5" stroke-width="1.6" stroke-linecap="round"/><path d="M16 8h5M16 12h4" stroke-width="1.6" stroke-linecap="round"/></svg>',
      spark:'<svg viewBox="0 0 24 24" fill="none"><path d="M12 3l1.6 4.4L18 9l-4.4 1.6L12 15l-1.6-4.4L6 9l4.4-1.6L12 3z" stroke-width="1.6" stroke-linejoin="round"/><path d="M18 14l.8 2.2L21 17l-2.2.8L18 20l-.8-2.2L15 17l2.2-.8L18 14z" stroke-width="1.5" stroke-linejoin="round"/></svg>',
      phone:'<svg viewBox="0 0 24 24" fill="none"><rect x="7" y="3" width="10" height="18" rx="2.4" stroke-width="1.6"/><path d="M11 18h2" stroke-width="1.6" stroke-linecap="round"/></svg>',
      gear:'<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="3" stroke-width="1.6"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1" stroke-width="1.6" stroke-linecap="round"/></svg>',
      doc:'<svg viewBox="0 0 24 24" fill="none"><path d="M7 3h7l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z" stroke-width="1.6" stroke-linejoin="round"/><path d="M14 3v4h4M9 13h6M9 16.5h4" stroke-width="1.6" stroke-linecap="round"/></svg>',
      shield:'<svg viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
      globe:'<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke-width="1.6"/><path d="M3 12h18M12 3c2.5 2.4 3.8 5.6 3.8 9S14.5 18.6 12 21c-2.5-2.4-3.8-5.6-3.8-9S9.5 5.4 12 3z" stroke-width="1.5"/></svg>',
      chat:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 5h16v11H8l-4 4V5z" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 10h.01M12 10h.01M15 10h.01" stroke-width="2" stroke-linecap="round"/></svg>',
      whatsapp:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 19l1.3-3.9A8 8 0 1112 20a8 8 0 01-3.9-1L4 19z" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 11c0 2 2 4 4 4l1-1.4c.3-.4-.1-.9-.6-1l-1.4-.4-.6.8c-.9-.4-1.7-1.2-2.1-2.1l.8-.6c.3-.5-.1-1.3-1-1.5C9 8.8 9 9.8 9 11z" stroke-width="1.4" stroke-linejoin="round"/></svg>',
      call:'<svg viewBox="0 0 24 24" fill="none"><path d="M5 4h3l1.5 4-2 1.4a12 12 0 005.6 5.6l1.4-2L18.5 18v3a1 1 0 01-1.1 1A15 15 0 013 6.6 1 1 0 014.1 5.5L5 4z" stroke-width="1.6" stroke-linejoin="round"/></svg>',
      send:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 8l13-4-2 16-4-3-2.5 2.5L8 16 4 8z" stroke-width="1.6" stroke-linejoin="round"/><path d="M8 16l9-12" stroke-width="1.5" stroke-linecap="round"/></svg>',
      heart:'<svg viewBox="0 0 24 24" fill="none"><path d="M12 21c4.5-2 7-5.2 7-9.5C19 7 16 4 12 4S5 7 5 11.5C5 15.8 7.5 19 12 21z" stroke-width="1.6" stroke-linejoin="round"/><path d="M12 12.5a2.2 2.2 0 100-4.4 2.2 2.2 0 000 4.4z" stroke-width="1.5"/></svg>',
      bars:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 20V4M4 20h16" stroke-width="1.6" stroke-linecap="round"/><path d="M8 16v-4M12 16V8M16 16v-6M20 16v-9" stroke-width="1.8" stroke-linecap="round"/></svg>'
    };

    /* ---- categories ---- (accent only shows inside the dark spotlight) */
    var CATS = {
      ai:        { label:'AI & automation', acc:'#5c9af6', scene:'ai'   },
      platform:  { label:'Core platform',   acc:'#F2935A', scene:'kan'  },
      admissions:{ label:'Admissions',      acc:'#5b96ef', scene:'adm'  },
      engage:    { label:'Engage',          acc:'#2564c2', scene:'eng'  },
      grow:      { label:'Grow',            acc:'#F2B441', scene:'grow' }
    };
    var FILTERS = [
      {id:'all', label:'All'},
      {id:'ai', label:'AI & automation'},
      {id:'platform', label:'Core platform'},
      {id:'admissions', label:'Admissions'},
      {id:'engage', label:'Engage'},
      {id:'grow', label:'Grow'}
    ];

    /* ---- products ---- */
    /* products flagged in wp-admin (Platform Listing metabox) take over;
       the hardcoded list below is only the fallback when none are flagged */
    var DYNP = <?php echo wp_json_encode(function_exists('ee_eep_collect') ? ee_eep_collect('home') : array()); ?>;
    var P = (DYNP && DYNP.length) ? DYNP : [
      {id:'edu-crm', t:'Education CRM', badge:'Popular', cat:'platform', ic:'crm', href:'/products/education-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/education-crm.svg',
        d:'Unify every enquiry, counsellor and campus on one purpose-built platform.',
        l:'Built for admissions, not retrofitted from sales. One view of every enquiry, every counsellor and every campus - so nothing slips between teams.',
        tags:['360\u00b0 enquiry view','Counsellor workflows','Multi-campus ready']},
      {id:'ams', t:'Admission Management', cat:'admissions', ic:'shield', href:'/admission-management-software/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/admission-management.svg',
        d:'Orchestrate fees, documents and approvals end-to-end in one auditable flow.',
        l:'Run the whole admission cycle - fees, documents, approvals - in one place, with a complete audit trail for every decision.',
        tags:['Fees & documents','Approval flows','Full audit trail']},
      {id:'app-mgmt', t:'Application Management', cat:'admissions', ic:'doc', href:'/products/application-management-system/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/application-management.svg',
        d:'Track every application stage with automated nudges so no form stalls.',
        l:'See where every applicant is, in real time. Automated nudges restart stalled forms before they go cold.',
        tags:['Stage tracking','Auto nudges','Status alerts']},
      {id:'chatbot', t:'AI Chatbot', badge:'New', cat:'ai', ic:'chat', href:'/products/chatbot-for-education/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/education-ai-chatbot.svg',
        d:'Answer student questions 24/7 and capture qualified enquiries while you sleep.',
        l:'An always-on assistant that answers questions on your site and WhatsApp, qualifies interest, and hands warm leads to counsellors.',
        tags:['24/7 answers','Qualifies enquiries','Site + WhatsApp']},
      {id:'waba', t:'WhatsApp API', cat:'engage', ic:'whatsapp', href:'/products/whatsapp-api/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/whatsapp-business-api.svg',
        d:'Reach families on their favourite channel with verified, automated conversations.',
        l:'Meet families where they already are. Verified WhatsApp with automated replies and broadcast campaigns that actually get read.',
        tags:['Verified sender','Automated replies','Broadcast campaigns']},
      {id:'mkt-auto', t:'Marketing Automation', cat:'grow', ic:'send', href:'/products/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/marketing-automation.svg',
        d:'Launch multi-channel campaigns that fill your funnel on autopilot.',
        l:'Build journeys once and let them run - email, SMS and WhatsApp triggered by what each prospect does.',
        tags:['Multi-channel drips','Triggered journeys','Campaign analytics']},
      {id:'mob-crm', t:'Mobile CRM', cat:'platform', ic:'phone', href:'/products/mobile-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/mobile-crm.svg',
        d:'Run admissions from your pocket - call, follow up and close on the go.',
        l:'Your full pipeline on mobile. Counsellors call, log and follow up from anywhere, with reminders that keep every lead moving.',
        tags:['Call from your phone','Push reminders','Works on the move']},
      {id:'analytics', t:'Analytics & Reporting', cat:'grow', ic:'bars', href:'/products/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/analytics-dashboard.svg',
        d:'See conversion, cost and counsellor performance in real time, in one view.',
        l:'Know what is working at a glance - funnels, cost per enrolment and counsellor scorecards, live and in one place.',
        tags:['Real-time funnels','Cost per enrol','Counsellor scorecards']}
    ];

    /* ---- scene builders ---- */
    function scene(type){
      switch(type){
        case 'ai': return '<div class="sc-ai">'+
          '<div class="sc-bub">Hi! Is the fee structure available?</div>'+
          '<div class="sc-bub me b2">Yes - sharing it now. Shall I call you to walk through it?</div>'+
          '<div class="sc-bub b3" style="display:flex;align-items:center;gap:6px">Calling you<span class="sc-wave"><span></span><span></span><span></span><span></span><span></span></span></div>'+
          '<div class="sc-type"><i></i><i></i><i></i></div></div>';
        case 'kan': return '<div class="sc-kan">'+
          '<div class="sc-col"><h6>New</h6><div class="sc-lead live"></div><div class="sc-lead"></div></div>'+
          '<div class="sc-col"><h6>Engaged</h6><div class="sc-lead"></div></div>'+
          '<div class="sc-col"><h6>Enrolled</h6><div class="sc-lead"></div><div class="sc-lead"></div></div></div>';
        case 'adm': var tk='<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>';
          return '<div class="sc-adm"><div class="sc-prog"><i></i></div>'+
          '<div class="sc-row sc-r1"><span class="sc-tick">'+tk+'</span>Documents verified</div>'+
          '<div class="sc-row sc-r2"><span class="sc-tick">'+tk+'</span>Fee received</div>'+
          '<div class="sc-row sc-r3"><span class="sc-tick">'+tk+'</span>Offer approved</div></div>';
        case 'eng': return '<div class="sc-eng">'+
          '<div class="sc-msg"><span class="av"></span><span class="tx"></span></div>'+
          '<div class="sc-msg m2"><span class="av"></span><span class="tx"></span></div>'+
          '<div class="sc-msg m3"><span class="av"></span><span class="tx"></span></div>'+
          '<div class="sc-verified"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke-width="1.6"/><path d="M8.5 12l2.5 2.5 4.5-5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>Verified business · delivered</div></div>';
        case 'grow': return '<div class="sc-grow"><span class="sc-bar"></span><span class="sc-bar"></span><span class="sc-bar"></span><span class="sc-bar"></span><span class="sc-bar"></span></div>';
      }
      return '';
    }

    /* ---- build filter pills ---- */
    var counts = {all:P.length};
    P.forEach(function(p){ counts[p.cat]=(counts[p.cat]||0)+1; });
    /* merge admin-defined categories (Products → Listing Categories & Badges):
       same slug overrides label/colour; brand-new slugs get their own filter
       chip automatically once at least one product uses them */
    var XCATS = <?php echo wp_json_encode(function_exists('ee_eep_all_cats') ? ee_eep_all_cats() : array()); ?>;
    if (XCATS && !Array.isArray(XCATS)) {
      Object.keys(XCATS).forEach(function(k){
        if (CATS[k]) { CATS[k].label = XCATS[k].label; CATS[k].acc = XCATS[k].acc; }
        else CATS[k] = { label: XCATS[k].label, acc: XCATS[k].acc, scene: 'kan' };
      });
      FILTERS.forEach(function(f){ if (f.id !== 'all' && CATS[f.id]) f.label = CATS[f.id].label; });
      Object.keys(XCATS).forEach(function(k){
        var used = P.some(function(p){ return p.cat === k; });
        if (used && !FILTERS.some(function(f){ return f.id === k; })) FILTERS.push({ id: k, label: XCATS[k].label });
      });
    }

    var filtersEl = document.getElementById('eepFilters');
    FILTERS.forEach(function(f,i){
      var b=document.createElement('button');
      b.className='eep-pill'; b.type='button'; b.dataset.cat=f.id;
      b.setAttribute('aria-pressed', i===0?'true':'false');
      b.innerHTML=f.label+' <span class="eep-count">'+(counts[f.id]||0)+'</span>';
      filtersEl.appendChild(b);
    });

    /* brand logo per product; falls back to the glyph icon if none is mapped */
    var LOGO_BASE='';
    var LOGO={};
    function ico(p){ var u=p.img||(LOGO[p.id]?LOGO_BASE+LOGO[p.id]:''); return u ? '<img class="eep-ic-img" src="'+u+'" alt="" loading="lazy" decoding="async">' : IC[p.ic]; }

    /* ---- build cards ---- */
    var grid = document.getElementById('eepGrid');
    var emptyEl = document.getElementById('eepEmpty');
    P.forEach(function(p){
      var c = CATS[p.cat];
      var a=document.createElement('a');
      a.className='eep-card'; a.href=p.href; a.dataset.id=p.id; a.dataset.cat=p.cat;
      a.dataset.search=(p.t+' '+p.d+' '+p.tags.join(' ')+' '+c.label).toLowerCase();
      a.style.setProperty('--cardacc', c.acc);
      a.innerHTML=''+
        '<div class="eep-card-top"><span class="eep-chip" aria-hidden="true">'+ico(p)+'</span>'+
        '<span class="eep-card-title">'+p.t+(p.badge?' <span class="eep-badge">'+p.badge+'</span>':'')+'</span></div>'+
        '<p class="eep-card-desc">'+p.d+'</p>'+
        '<div class="eep-card-foot"><span class="eep-card-cat">'+c.label+'</span>'+
        '<span class="eep-card-go" aria-label="Learn more"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div>';
      grid.insertBefore(a, emptyEl);
    });
    var cards = Array.prototype.slice.call(grid.querySelectorAll('.eep-card'));

    /* ---- spotlight refs ---- */
    var spot=document.getElementById('eepSpot'), sCat=document.getElementById('eepSpotCat'),
        sIcon=document.getElementById('eepSpotIcon'), sTitle=document.getElementById('eepSpotTitle'),
        sDesc=document.getElementById('eepSpotDesc'), sTags=document.getElementById('eepSpotTags'),
        sCta=document.getElementById('eepSpotCta'), sScene=document.getElementById('eepScene');
    var activeId=null;

    function setActive(id, fromUser){
      var p=P.filter(function(x){return x.id===id;})[0]; if(!p) return;
      activeId=id;
      var c=CATS[p.cat];
      spot.style.setProperty('--acc', c.acc);
      spot.style.setProperty('--acc-soft', hexA(c.acc,.18));
      sCat.textContent=c.label;
      sIcon.innerHTML=ico(p);
      sTitle.innerHTML=p.t+(p.badge?' <span class="eep-new">'+p.badge+'</span>':'');
      sDesc.textContent=p.l;
      sTags.innerHTML=p.tags.map(function(t){return '<span>'+t+'</span>';}).join('');
      sCta.setAttribute('href', p.href);
      sScene.innerHTML=''; // restart scene animation
      void sScene.offsetWidth;
      sScene.innerHTML=scene(c.scene);
      cards.forEach(function(cd){ cd.classList.toggle('is-active', cd.dataset.id===id); });
      if(fromUser) pauseRotate();
    }
    function hexA(hex,a){ var h=hex.replace('#',''); var r=parseInt(h.substr(0,2),16),g=parseInt(h.substr(2,2),16),b=parseInt(h.substr(4,2),16); return 'rgba('+r+','+g+','+b+','+a+')'; }

    /* ---- hover / focus updates spotlight ---- */
    var canHover = !!(window.matchMedia && window.matchMedia('(hover: hover)').matches);
    cards.forEach(function(cd){
      cd.addEventListener('mouseenter', function(){ setActive(cd.dataset.id, true); });
      cd.addEventListener('focus', function(){ setActive(cd.dataset.id, true); });
      /* Touch / no-hover devices: first tap previews the product in the
         spotlight (and brings it into view); a second tap on the already
         active card follows the link. Keeps desktop hover+click unchanged. */
      cd.addEventListener('click', function(e){
        if(canHover) return;                 // desktop: let the link work normally
        if(cd.dataset.id === activeId) return; // already previewed → allow navigation
        e.preventDefault();
        setActive(cd.dataset.id, true);
        try{ spot.scrollIntoView({behavior:'smooth', block:'center'}); }
        catch(_){ spot.scrollIntoView(); }
      });
    });

    /* ---- filtering + search ---- */
    var curCat='all', curQ='';
    function apply(){
      var shown=0, firstVisible=null;
      cards.forEach(function(cd){
        var okCat = curCat==='all' || cd.dataset.cat===curCat;
        var okQ = !curQ || cd.dataset.search.indexOf(curQ)>-1;
        var vis = okCat && okQ;
        cd.hidden = !vis;
        if(vis){ shown++; if(!firstVisible) firstVisible=cd; }
      });
      emptyEl.classList.toggle('show', shown===0);
      // keep spotlight pointing at something visible
      if(shown>0){
        var stillVisible = cards.some(function(cd){ return cd.dataset.id===activeId && !cd.hidden; });
        if(!stillVisible && firstVisible) setActive(firstVisible.dataset.id);
        rebuildRotation();
      }
    }

    filtersEl.addEventListener('click', function(e){
      var b=e.target.closest('.eep-pill'); if(!b) return;
      curCat=b.dataset.cat;
      filtersEl.querySelectorAll('.eep-pill').forEach(function(p){ p.setAttribute('aria-pressed', p===b?'true':'false'); });
      apply(); pauseRotate();
    });

    var input=document.getElementById('eepInput'), searchWrap=document.getElementById('eepSearch'),
        clearBtn=document.getElementById('eepClear');
    input.addEventListener('input', function(){
      curQ=input.value.trim().toLowerCase();
      searchWrap.classList.toggle('has-val', curQ.length>0);
      apply(); pauseRotate();
    });
    clearBtn.addEventListener('click', function(){ input.value=''; curQ=''; searchWrap.classList.remove('has-val'); apply(); input.focus(); });
    document.getElementById('eepReset').addEventListener('click', function(){
      input.value=''; curQ=''; curCat='all'; searchWrap.classList.remove('has-val');
      filtersEl.querySelectorAll('.eep-pill').forEach(function(p){ p.setAttribute('aria-pressed', p.dataset.cat==='all'?'true':'false'); });
      apply();
    });

    /* ---- idle auto-rotation through featured products ---- */
    var FEATURED=['vidya','edu-crm','analytics','waba','app-mgmt'];
    var rotePool=[], roteIdx=0, roteTimer=null, idleTimer=null;
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion:reduce)').matches;

    function rebuildRotation(){
      rotePool = FEATURED.filter(function(id){
        var cd=cards.filter(function(c){return c.dataset.id===id;})[0];
        return cd && !cd.hidden;
      });
      if(rotePool.length===0){
        rotePool = cards.filter(function(c){return !c.hidden;}).map(function(c){return c.dataset.id;});
      }
    }
    function startRotate(){
      if(reduce) return;
      stopRotate(); rebuildRotation();
      roteTimer=setInterval(function(){
        if(rotePool.length===0) return;
        roteIdx=(roteIdx+1)%rotePool.length;
        // skip if it lands on current
        if(rotePool[roteIdx]===activeId && rotePool.length>1) roteIdx=(roteIdx+1)%rotePool.length;
        setActive(rotePool[roteIdx]);
      }, 3600);
    }
    function stopRotate(){ if(roteTimer){ clearInterval(roteTimer); roteTimer=null; } }
    function pauseRotate(){
      stopRotate();
      if(idleTimer) clearTimeout(idleTimer);
      idleTimer=setTimeout(startRotate, 6000); // resume after 6s of no interaction
    }
    // stop rotation while the user is inside the section
    root.addEventListener('mouseenter', stopRotate);
    root.addEventListener('mouseleave', function(){ pauseRotate(); });

    /* ---- init ---- */
    setActive('vidya');
    apply();
    // begin idle rotation only when section scrolls into view
    if('IntersectionObserver' in window){
      var io=new IntersectionObserver(function(ents){
        ents.forEach(function(en){ if(en.isIntersecting){ startRotate(); io.disconnect(); } });
      }, {threshold:.25});
      io.observe(root);
    } else { startRotate(); }
  })();
  </script>
</section>

<style>#ee-vidya-suite{
    --vn:#19345d; --vn2:#122848; --or:#DE6E30; --or2:#E8843F;
    --cy:#2274ee; --vi:#8bb7fa; --gr:#3474d3; --go:#fb8124;
    position:relative; background:transparent;
    font-family:'Inter',system-ui,-apple-system,sans-serif;
    color:#EAF0FA; -webkit-font-smoothing:antialiased;
  }#ee-vidya-suite *{box-sizing:border-box;}/* ---- track + sticky pin ---- */
  #ee-vidya-suite .vsx-track{ position:relative; }#ee-vidya-suite .vsx-sticky{
    position:relative;
    border-radius:28px; overflow:hidden;
    margin:clamp(20px,3vw,40px) auto; max-width:1280px;
    background:radial-gradient(120% 120% at 85% -10%, #21457a 0%, var(--vn) 42%, var(--vn2) 100%);
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 40px 90px -40px rgba(8,22,42,.8), inset 0 1px 0 rgba(255,255,255,.06);
    padding:clamp(26px,4vw,52px) clamp(18px,3vw,40px);
  }#ee-vidya-suite .vsx-bg{ position:absolute; inset:0; z-index:0; pointer-events:none;
    background:radial-gradient(640px 360px at 88% 6%, rgba(222,110,48,.22), transparent 60%),
              radial-gradient(560px 360px at 6% 96%, rgba(34,116,238,.16), transparent 62%);
  }#ee-vidya-suite .vsx-bg::after{ content:""; position:absolute; inset:0; opacity:.5;
    background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);
    background-size:34px 34px; -webkit-mask-image:radial-gradient(620px 420px at 80% 0%,#000,transparent 75%); mask-image:radial-gradient(620px 420px at 80% 0%,#000,transparent 75%); }#ee-vidya-suite .vsx-inner{ position:relative; z-index:1; }/* ---- header ---- */
  #ee-vidya-suite .vsx-eyebrow{ display:inline-flex; align-items:center; gap:9px; padding:7px 14px 7px 11px; border-radius:999px;
    background:rgba(34,116,238,.1); border:1px solid rgba(34,116,238,.28); color:#bdd6fb;
    font-size:11.5px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; margin-bottom:16px; }#ee-vidya-suite .vsx-eyebrow i{ width:7px; height:7px; border-radius:50%; background:var(--cy); box-shadow:0 0 0 4px rgba(34,116,238,.18); animation:vsxBlink 1.8s ease-in-out infinite; }
  @keyframes vsxBlink{0%,100%{opacity:1}50%{opacity:.3} }#ee-vidya-suite h2{ font-family:'Inter',sans-serif; font-weight:700; color:#fff;
    font-size:clamp(23px,3.3vw,40px); line-height:1.14; letter-spacing:-.02em; margin:0 auto 12px; max-width:none; }#ee-vidya-suite h2 .vsx-h2b{ display:block; }#ee-vidya-suite .vsx-head{ text-align:center; }#ee-vidya-suite .vsx-lead{ font-size:clamp(14px,1.6vw,16.5px); line-height:1.6; color:#c2d0e4; margin:0 auto; max-width:68ch; }/* ---- stage / rail ---- */
  #ee-vidya-suite .vsx-stage{ margin-top:clamp(22px,3vw,38px); position:relative; }
  #ee-vidya-suite .vsx-arw{ display:none; }
  /* per-card CTA - small pill pinned top-right of every agent card */
  #ee-vidya-suite .vsx-card-cta{ position:absolute; top:16px; right:16px; z-index:5; display:inline-flex; align-items:center; gap:5px;
    padding:7px 13px; border-radius:999px; background:linear-gradient(135deg,#E8843F,#DE6E30); color:#fff; text-decoration:none;
    font:700 10.5px/1 'Inter',sans-serif; letter-spacing:.06em; text-transform:uppercase; white-space:nowrap;
    box-shadow:0 10px 22px -8px rgba(222,110,48,.65); transition:transform .2s, box-shadow .2s; }
  #ee-vidya-suite .vsx-card-cta svg{ width:11px; height:11px; stroke:currentColor; }
  #ee-vidya-suite .vsx-card-cta:hover{ transform:translateY(-2px); box-shadow:0 14px 28px -8px rgba(222,110,48,.8); }
  @media(max-width:640px){ #ee-vidya-suite .vsx-card-cta{ top:12px; right:12px; padding:6px 11px; font-size:9.5px; } }
  @media(min-width:0){
    #ee-vidya-suite .vsx-arw:active{ transform:translateY(-50%) scale(.93); }
  }
  #ee-vidya-suite .vsx-rail{
    display:flex; gap:clamp(16px,1.8vw,22px); align-items:stretch;
    /* default (mobile / no-JS): horizontal swipe carousel */
    overflow-x:auto; scroll-snap-type:x mandatory; padding-bottom:14px;
    -webkit-overflow-scrolling:touch; scrollbar-width:none;
  }#ee-vidya-suite .vsx-rail::-webkit-scrollbar{ display:none; }#ee-vidya-suite .vsx-card{
    scroll-snap-align:center; flex:0 0 clamp(280px,84vw,400px);
    display:flex; flex-direction:column; gap:14px;
    background:rgba(255,255,255,.055); border:1px solid rgba(255,255,255,.1);
    border-radius:24px; padding:28px 26px 30px; position:relative; overflow:hidden;
    box-shadow:0 20px 50px -30px rgba(0,0,0,.6), inset 0 1px 0 rgba(255,255,255,.05);
    transition:transform .4s cubic-bezier(.2,.7,.2,1), border-color .4s, background .4s;
  }#ee-vidya-suite .vsx-card::before{ content:""; position:absolute; left:0; top:0; height:4px; width:100%;
    background:linear-gradient(90deg,var(--ca,var(--cy)),transparent); opacity:.95; }#ee-vidya-suite .vsx-card::after{ content:""; position:absolute; right:-50px; top:-50px; width:180px; height:180px; border-radius:50%;
    background:radial-gradient(circle,var(--ca,var(--cy)),transparent 65%); opacity:.18; pointer-events:none; }/* large icon box */
  #ee-vidya-suite .vsx-ic{ width:72px; height:72px; border-radius:20px; display:grid; place-items:center; flex:0 0 auto;
    background:linear-gradient(150deg, color-mix(in srgb,var(--ca,#2274ee) 80%,#0c2140), color-mix(in srgb,var(--ca,#2274ee) 28%,#0c2140));
    box-shadow:0 14px 30px -12px var(--ca,#2274ee), inset 0 1px 0 rgba(255,255,255,.3); }#ee-vidya-suite .vsx-ic svg,#ee-vidya-suite .vsx-ic img.eeimg{ width:36px; height:36px; }#ee-vidya-suite .vsx-ic svg *,#ee-vidya-suite .vsx-ic img.eeimg *{ stroke:#fff; }/* brand icon image tiles */
  #ee-vidya-suite .vsx-ic.vsx-ic--img{ background:transparent; padding:0; overflow:hidden; }#ee-vidya-suite .vsx-ic.vsx-ic--img img{ width:100%; height:100%; object-fit:cover; display:block; border-radius:inherit; }#ee-vidya-suite .vsx-card h3{ font-family:'Inter',sans-serif; font-weight:600; font-size:21px; color:#fff; margin:4px 0 0; letter-spacing:-.01em; }#ee-vidya-suite .vsx-card .vsx-desc{ font-size:13.5px; line-height:1.55; color:#c2d0e4; margin:0; }/* features list */
  #ee-vidya-suite .vsx-feats{ list-style:none; margin:6px 0 0; padding:14px 0 0; border-top:1px solid rgba(255,255,255,.1); display:flex; flex-direction:column; gap:11px; }#ee-vidya-suite .vsx-feats li{ display:flex; align-items:flex-start; gap:10px; font-size:13.5px; line-height:1.4; color:#dbe4f3; }#ee-vidya-suite .vsx-feats li .fk{ flex:0 0 auto; width:20px; height:20px; border-radius:7px; display:grid; place-items:center; margin-top:1px;
    background:color-mix(in srgb,var(--ca,#2274ee) 22%, transparent); }#ee-vidya-suite .vsx-feats li .fk svg,#ee-vidya-suite .vsx-feats li .fk img.eeimg{ width:12px; height:12px; }#ee-vidya-suite .vsx-feats li .fk svg *,#ee-vidya-suite .vsx-feats li .fk img.eeimg *{ stroke:var(--ca,#2274ee); }/* CTA card */
  #ee-vidya-suite .vsx-cta-card{ background:linear-gradient(150deg, rgba(222,110,48,.2), rgba(255,255,255,.04)); border-color:rgba(222,110,48,.42); justify-content:center; align-items:flex-start; }#ee-vidya-suite .vsx-cta-card::before{ background:linear-gradient(90deg,var(--or),transparent); }#ee-vidya-suite .vsx-cta-card::after{ background:radial-gradient(circle,var(--or),transparent 65%); opacity:.24; }#ee-vidya-suite .vsx-cta-card h3{ font-size:24px; }#ee-vidya-suite .vsx-cta-btn{ margin-top:10px; display:inline-flex; align-items:center; justify-content:center; gap:9px;
    padding:15px 24px; border-radius:14px; background:linear-gradient(135deg,var(--or2),var(--or)); color:#fff;
    font-weight:700; font-size:15.5px; text-decoration:none; box-shadow:0 14px 30px -12px rgba(222,110,48,.7), inset 0 1px 0 rgba(255,255,255,.22);
    transition:transform .2s ease, box-shadow .2s ease; }#ee-vidya-suite .vsx-cta-btn:hover{ transform:translateY(-2px); }#ee-vidya-suite .vsx-cta-btn:focus-visible{ outline:2px solid #fff; outline-offset:3px; }#ee-vidya-suite .vsx-cta-btn svg,#ee-vidya-suite .vsx-cta-btn img.eeimg{ width:18px; height:18px; }#ee-vidya-suite .vsx-cta-btn svg *,#ee-vidya-suite .vsx-cta-btn img.eeimg *{ stroke:#fff; }/* ================= PINNED HORIZONTAL MODE (desktop,JS on) ================= */
  #ee-vidya-suite.vsx-on .vsx-track{ height:calc(min(100vh,820px)*3.2); }#ee-vidya-suite.vsx-on .vsx-sticky{ position:sticky; top:0; height:min(100vh,820px); min-height:0; margin-top:0; margin-bottom:0; border-radius:0; max-width:none;
    display:flex; flex-direction:column; justify-content:center; }#ee-vidya-suite.vsx-on .vsx-stage{ overflow:hidden; }#ee-vidya-suite.vsx-on .vsx-rail{ overflow:visible; scroll-snap-type:none; padding-bottom:0; flex-wrap:nowrap; will-change:transform; }#ee-vidya-suite.vsx-on .vsx-card{ flex:0 0 clamp(320px,30vw,420px); }
  @media (max-width:900px){
    #ee-vidya-suite.vsx-on{ background:radial-gradient(120% 60% at 85% 0%, #21457a 0%, var(--vn) 42%, var(--vn2) 100%); }
    #ee-vidya-suite.vsx-on .vsx-sticky{ top:64px; height:auto; min-height:0; justify-content:flex-start; padding:10px 0 16px;
      margin:0; border-radius:0!important; border:0; box-shadow:none; background:transparent; }
    #ee-vidya-suite.vsx-on .vsx-track{ height:calc(min(100vh,740px)*2.2); }
  }
  #ee-vidya-suite.vsx-on .vsx-inner{ max-width:1280px; margin:0 auto; width:100%; padding:0 24px; }

  /* ---- responsive (carousel mode) ---- */
  @media (max-width:900px){#ee-vidya-suite .vsx-sticky{ border-radius:22px; }
  }
  /* Phones: compact the whole suite so a card + header fit one screen */
  @media (max-width:640px){
    #ee-vidya-suite{ padding-top:10px; padding-bottom:10px; }
    #ee-vidya-suite .vsx-inner{ padding:16px 16px 18px; }
    #ee-vidya-suite .vsx-eyebrow{ margin-bottom:9px; }
    #ee-vidya-suite h2{ font-size:19px!important; margin:0 0 6px; }
    #ee-vidya-suite .vsx-lead{ font-size:12px!important; line-height:1.45!important;
      display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
    #ee-vidya-suite .vsx-stage{ margin-top:12px!important; }
    #ee-vidya-suite .vsx-card{ padding:16px 16px 18px!important; gap:9px!important; flex-basis:82vw!important; }
    #ee-vidya-suite .vsx-ic{ width:44px!important; height:44px!important; }
    #ee-vidya-suite .vsx-card h3{ font-size:16px!important; }
    #ee-vidya-suite .vsx-card .vsx-desc{ font-size:12px!important; line-height:1.4!important; }
    #ee-vidya-suite .vsx-feats li{ font-size:11.5px!important; gap:7px; }
    #ee-vidya-suite .vsx-arw{ top:58%; }
  }
  @media (prefers-reduced-motion:reduce){#ee-vidya-suite *{ animation:none !important; }
  }
</style>

<section id="ee-vidya-suite" aria-label="Meet Vidya AI">
  <div class="vsx-track">
    <div class="vsx-sticky">
      <div class="vsx-bg" aria-hidden="true"></div>
      <div class="vsx-inner">
        <header class="vsx-head">
          <h2>Meet Vidya AI, the Agentic AI Suite <span class="vsx-h2b">Built for Smarter Admissions</span></h2>
          <p class="vsx-lead">Vidya AI is your always-on AI workforce that engages every prospective student, qualifies leads instantly, automates follow-ups, supports counselors, and accelerates enrollments - so your teams can focus on building meaningful student relationships instead of repetitive tasks.</p>
        </header>

        <div class="vsx-stage">
          <button class="vsx-arw vsx-prev" type="button" aria-label="Previous"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
          <button class="vsx-arw vsx-next" type="button" aria-label="Next"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
          <div class="vsx-rail" id="vsxRail">

            <article class="vsx-card" style="--ca:#2274ee">
              <a class="vsx-card-cta" href="#admission-form" aria-label="Try Vidya GPT - book a demo">Try Vidya GPT <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
              <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-gpt.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
              <h3>Vidya GPT</h3>
              <p class="vsx-desc">Your 24×7 AI chat counsellor that answers every query and never sleeps.</p>
              <ul class="vsx-feats">
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Answers fees, courses, scholarships &amp; deadlines</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Works across website &amp; WhatsApp</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Replies instantly in 95+ languages</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Hands hot leads to your counsellors</li>
              </ul>
            </article>

            <article class="vsx-card" style="--ca:#DE6E30">
              <a class="vsx-card-cta" href="#admission-form" aria-label="Try Vidya Pulse - book a demo">Try Vidya Pulse <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
              <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-pulse.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
              <h3>Vidya Pulse</h3>
              <p class="vsx-desc">Real-time lead intent scoring that surfaces your hottest prospects first.</p>
              <ul class="vsx-feats">
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Scores every lead 0–100 on real intent</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Surfaces the hottest prospects first</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Re-scores in real time as leads engage</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Tells counsellors exactly who to call now</li>
              </ul>
            </article>

            <article class="vsx-card" style="--ca:#8bb7fa">
              <a class="vsx-card-cta" href="#admission-form" aria-label="Try Vidyaai Voice Agent - book a demo">Try Vidyaai Voice Agent <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
              <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-ai-voice-agent.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
              <h3>Vidyaai Voice Agent</h3>
              <p class="vsx-desc">Calls and qualifies leads with natural conversations in 10+ languages.</p>
              <ul class="vsx-feats">
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Calls every new lead within seconds</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Natural human-like conversations</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Qualifies &amp; books counselling slots</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Speaks 10+ Indian languages, 24/7</li>
              </ul>
            </article>

            <article class="vsx-card" style="--ca:#3474d3">
              <a class="vsx-card-cta" href="#admission-form" aria-label="Try VidyaWABA GPT - book a demo">Try VidyaWABA GPT <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
              <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidyawaba-gpt.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
              <h3>VidyaWABA GPT</h3>
              <p class="vsx-desc">Automated WhatsApp Business engagement that nurtures leads at scale.</p>
              <ul class="vsx-feats">
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Official, verified WhatsApp Business API</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Automated replies &amp; smart broadcasts</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Personalised nurture journeys at scale</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Every reply logged back to the lead</li>
              </ul>
            </article>

            <article class="vsx-card" style="--ca:#fb8124">
              <a class="vsx-card-cta" href="#admission-form" aria-label="Try Vidya Work - book a demo">Try Vidya Work <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
              <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-work.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
              <h3>Vidya Work</h3>
              <p class="vsx-desc">Autonomous workflow and follow-up automation that runs your busywork.</p>
              <ul class="vsx-feats">
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Auto-triggers follow-ups &amp; reminders</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Routes &amp; assigns tasks automatically</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Runs repetitive busywork on its own</li>
                <li><span class="fk"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6 9 17l-5-5" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>Keeps every lead moving forward</li>
              </ul>
            </article>

            <article class="vsx-card vsx-cta-card" style="--ca:#DE6E30">
              <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-ai.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
              <h3>Try Vidya AI Live</h3>
              <p class="vsx-desc">Explore the live AI inside the product demo - see every agent working on a real admission funnel.</p>
              <a class="vsx-cta-btn" href="#ee-platform">Try Vidya AI Live <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            </article>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  (function(){
    var sec=document.getElementById('ee-vidya-suite'); if(!sec) return;
    var track=sec.querySelector('.vsx-track'), rail=document.getElementById('vsxRail');
    var cards=Array.prototype.slice.call(rail.querySelectorAll('.vsx-card'));
    var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches;
    var mq=window.matchMedia('(min-width:901px)');

    var maxX=0, on=false;
    function clamp(v,a,b){ return v<a?a:(v>b?b:v); }
    function recalc(){ if(!on) return; maxX=Math.max(0, rail.scrollWidth - rail.clientWidth); onScroll(); }
    function onScroll(){
      if(!on) return;
      var rect=track.getBoundingClientRect();
      var stk=sec.querySelector('.vsx-sticky');
      var dist=track.offsetHeight - (stk?stk.offsetHeight:window.innerHeight);
      var p = dist>0 ? clamp(-rect.top/dist,0,1) : 0;
      rail.style.transform='translate3d('+(-(p*maxX))+'px,0,0)';
    }
    function enable(){
      if(on) return; on=true; sec.classList.add('vsx-on');
      rail.style.transform='translate3d(0,0,0)';
      window.addEventListener('scroll', onScroll, {passive:true});
      recalc();
    }
    function disable(){
      if(!on) return; on=false; sec.classList.remove('vsx-on');
      rail.style.transform='';
      window.removeEventListener('scroll', onScroll);
    }
    var vEMB=(document.documentElement.className+' '+(document.body?document.body.className:'')).indexOf('ee-embed-mode')!==-1;
    /* scroll-driven mode is desktop-only: on phones the rail stays a native
       swipe carousel (scroll-snap) - the pinned variant left users stuck on
       card 1 with no arrows and a tall empty track */
    function evaluate(){ (!reduce && !vEMB && mq.matches && window.innerHeight<1150) ? enable() : disable(); }

    evaluate();
    window.addEventListener('resize', function(){ evaluate(); recalc(); }, {passive:true});
    if(mq.addEventListener) mq.addEventListener('change', evaluate);
  })();
  /* mobile carousel arrows - scroll the swipe rail one card at a time */
  (function(){
    var rail=document.getElementById('vsxRail'); if(!rail) return;
    var sec=document.getElementById('ee-vidya-suite');
    var prev=sec&&sec.querySelector('.vsx-prev'), next=sec&&sec.querySelector('.vsx-next');
    function step(dir){ var c=rail.querySelector('.vsx-card'); var w=c?c.getBoundingClientRect().width+20:320; rail.scrollBy({left:dir*w,behavior:'smooth'}); }
    if(prev) prev.addEventListener('click',function(){ step(-1); });
    if(next) next.addEventListener('click',function(){ step(1); });
  })();
  </script>
</section>

<style>#ee-teams{
    background: transparent;
    padding: clamp(64px, 8vw, 104px) 0;
    font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
    color: #0f203a;
    -webkit-font-smoothing: antialiased;
  }#ee-teams *{ box-sizing: border-box; }#ee-teams .ee-teams-container{
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 24px;
  }#ee-teams .ee-teams-head{
    max-width: 760px;
    margin: 0 auto;
    text-align: center;
  }#ee-teams .ee-teams-eyebrow{
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 15px;
    border-radius: 999px;
    background: rgba(222, 110, 48, .08);
    border: 1px solid rgba(222, 110, 48, .22);
    color: #C25A22;
    font-size: 12.5px;
    font-weight: 600;
    letter-spacing: .04em;
    text-transform: uppercase;
  }#ee-teams .ee-teams-eyebrow .ee-dot{
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #DE6E30;
    box-shadow: 0 0 0 3px rgba(222, 110, 48, .18);
  }#ee-teams h2{
    font-family: 'Inter', system-ui, sans-serif;
    font-weight: 700;
    font-size: clamp(28px, 4vw, 44px);
    line-height: 1.12;
    letter-spacing: -.015em;
    margin: 20px 0 0;
    color: #19345d;
  }#ee-teams .ee-teams-lead{
    margin: 18px auto 0;
    max-width: 680px;
    font-size: clamp(15px, 1.6vw, 17px);
    line-height: 1.65;
    color: #5a6b85;
  }#ee-teams .ee-teams-grid{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: clamp(40px, 5vw, 60px);
  }#ee-teams .ee-card{
    display: flex;
    flex-direction: column;
    gap: 14px;
    text-decoration: none;
    color: inherit;
    background: #ffffff;
    border: 1px solid rgba(25,52,93,.09);
    border-radius: 16px;
    padding: 26px 24px 24px;
    box-shadow: 0 1px 2px rgba(15,32,58,.04), 0 10px 24px -16px rgba(15,32,58,.22);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    position: relative;
    overflow: hidden;
  }#ee-teams .ee-card::before{
    content: "";
    position: absolute;
    inset: 0 0 auto 0;
    height: 3px;
    background: linear-gradient(90deg, #DE6E30, #E8843F);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .3s ease;
  }#ee-teams a.ee-card:hover,#ee-teams a.ee-card:focus-visible{
    transform: translateY(-4px);
    box-shadow: 0 1px 2px rgba(15,32,58,.05), 0 22px 40px -22px rgba(25,52,93,.35);
    border-color: rgba(25,52,93,.16);
  }#ee-teams a.ee-card:hover::before,#ee-teams a.ee-card:focus-visible::before{
    transform: scaleX(1);
  }#ee-teams a.ee-card:focus-visible{
    outline: 2px solid #22467c;
    outline-offset: 3px;
  }#ee-teams .ee-chip{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 13px;
    font-size: 24px;
    line-height: 1;
    background: linear-gradient(160deg, rgba(34,70,124,.10), rgba(25,52,93,.05));
    border: 1px solid rgba(25,52,93,.10);
  }#ee-teams .ee-chip--img{background:none;border:0;padding:0;overflow:hidden}#ee-teams .ee-chip--img img{width:100%;height:100%;object-fit:contain;display:block}#ee-teams .ee-card-title{
    font-family: 'Inter', system-ui, sans-serif;
    font-weight: 600;
    font-size: 18px;
    line-height: 1.25;
    color: #0f203a;
    margin: 0;
  }#ee-teams .ee-card-benefit{
    font-size: 14.5px;
    line-height: 1.6;
    color: #5a6b85;
    margin: 0;
  }#ee-teams .ee-card-arrow{
    margin-top: auto;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
    color: #C25A22;
    opacity: 0;
    transform: translateY(4px);
    transition: opacity .25s ease, transform .25s ease;
  }#ee-teams a.ee-card:hover .ee-card-arrow,#ee-teams a.ee-card:focus-visible .ee-card-arrow{
    opacity: 1;
    transform: translateY(0);
  }#ee-teams .ee-card-arrow svg,#ee-teams .ee-card-arrow img.eeimg{ display: block; }

  @media (max-width: 900px){#ee-teams .ee-teams-grid{
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media (max-width: 560px){#ee-teams .ee-teams-grid{
      grid-template-columns: 1fr;
      gap: 16px;
    }#ee-teams .ee-card{ padding: 22px 20px; }
  }
  @media (prefers-reduced-motion: reduce){#ee-teams .ee-card,#ee-teams .ee-card::before,#ee-teams .ee-card-arrow{ transition: none; }
  }
</style>
<section id="ee-teams" aria-label="Built for Every Team">
  <div class="ee-teams-container">
    <div class="ee-teams-head">
      <h2>Built for Every Team Driving Student Enrollment</h2>
      <p class="ee-teams-lead">From marketing and admissions to counseling, finance, leadership, and AI-powered automation - ExtraaEdge brings every team together on one intelligent platform, helping institutions attract, engage, convert, and enroll more students with less effort.</p>
    </div>

    <div class="ee-teams-grid">
      <a class="ee-card" href="#admission-form">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/marketing-teams.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Marketing Teams</h3>
        <p class="ee-card-benefit">Capture every inquiry across channels and track which campaigns actually drive enrolled students, not just clicks.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#admission-form">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/admissions-teams.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Admissions Teams</h3>
        <p class="ee-card-benefit">Prioritize hot leads with smart scoring and automated follow-ups so no prospective student slips through the cracks.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#admission-form">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/counseling-teams.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Counseling Teams</h3>
        <p class="ee-card-benefit">Give counselors a full applicant history so every call, message, and meeting moves students closer to confirmation.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#admission-form">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/vidya-ai-agents.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Vidya AI Agents</h3>
        <p class="ee-card-benefit">Engage and qualify applicants instantly, around the clock, answering queries and booking counseling slots on autopilot.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#admission-form">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/leadership-and-analytics.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Leadership &amp; Analytics</h3>
        <p class="ee-card-benefit">See the full funnel in real time, from source to enrollment, and forecast intake with dashboards built for decisions.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#admission-form">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/finance-and-operations.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Finance &amp; Operations</h3>
        <p class="ee-card-benefit">Streamline fee collection, payment links, and reconciliation so confirmed admissions convert to paid enrollments faster.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>
    </div>
  </div>
</section>

<style>#ee-solutions{
  --navy:#19345d; --navy2:#22467c; --orange:#DE6E30; --orange2:#E8843F;
  --ink:#0f203a; --muted:#5a6b85; --hair:rgba(25,52,93,.09); --bg:#f6f8fc;
  position:relative; padding:clamp(64px,8vw,104px) 0; background:transparent;
  font-family:'Inter',system-ui,-apple-system,sans-serif; color:var(--ink);
  -webkit-font-smoothing:antialiased;
}#ee-solutions *{box-sizing:border-box;}#ee-solutions .ee-container{max-width:1240px;margin:0 auto;padding:0 24px;}#ee-solutions .ee-head{max-width:740px;margin:0 0 clamp(28px,3.6vw,44px);}#ee-solutions .ee-eyebrow{
  display:inline-flex;align-items:center;gap:8px;
  font-size:12px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;
  color:var(--orange);margin:0 0 16px;
}#ee-solutions .ee-eyebrow::before{
  content:"";width:22px;height:2px;border-radius:2px;
  background:linear-gradient(90deg,var(--orange),var(--orange2));
}#ee-solutions h2{
  font-family:'Inter',sans-serif;font-weight:600;
  font-size:clamp(28px,4vw,40px);line-height:1.12;letter-spacing:-.02em;
  margin:0 0 14px;color:var(--navy);
}#ee-solutions .ee-sub{font-size:clamp(15px,1.6vw,17px);line-height:1.6;color:var(--muted);margin:0;}
/* ---- category-wise bento grid ---- */
#ee-solutions .solb-grid{display:grid;grid-template-columns:repeat(12,1fr);gap:clamp(12px,1.6vw,18px);}
#ee-solutions .solb-card{position:relative;display:flex;flex-direction:column;border-radius:22px;padding:clamp(20px,2.6vw,30px);overflow:hidden;
  transition:transform .35s cubic-bezier(.2,.7,.2,1),box-shadow .35s,border-color .35s;}
#ee-solutions .solb-card:hover{transform:translateY(-4px);}
#ee-solutions .solb-a{grid-column:span 7;background:linear-gradient(165deg,#0f2547,#19345d 55%,#22467c);color:#fff;
  box-shadow:0 30px 70px -30px rgba(25,52,93,.6);}
#ee-solutions .solb-a::after{content:"";position:absolute;right:-80px;top:-80px;width:260px;height:260px;border-radius:50%;
  background:radial-gradient(circle,rgba(222,110,48,.5),transparent 65%);filter:blur(10px);pointer-events:none;}
#ee-solutions .solb-b{grid-column:span 5;background:#fff;border:1px solid var(--hair);
  box-shadow:0 1px 2px rgba(15,32,58,.04),0 14px 34px -22px rgba(15,32,58,.28);}
#ee-solutions .solb-b:hover{border-color:rgba(222,110,48,.35);box-shadow:0 24px 48px -24px rgba(25,52,93,.35);}
#ee-solutions .solb-c{grid-column:span 8;background:var(--bg);border:1px solid var(--hair);
  box-shadow:0 1px 2px rgba(15,32,58,.04),0 14px 34px -22px rgba(15,32,58,.22);}
#ee-solutions .solb-c:hover{border-color:rgba(222,110,48,.35);}
#ee-solutions .solb-d{grid-column:span 4;background:linear-gradient(150deg,var(--orange2),var(--orange) 70%,#C2541C);color:#fff;
  box-shadow:0 24px 50px -22px rgba(222,110,48,.65);justify-content:center;align-items:flex-start;}
#ee-solutions .solb-d::after{content:"";position:absolute;left:-60px;bottom:-70px;width:220px;height:220px;border-radius:50%;
  background:radial-gradient(circle,rgba(255,255,255,.3),transparent 65%);pointer-events:none;}
#ee-solutions .solb-ghost{position:absolute;right:14px;bottom:-24px;font-family:'Inter',sans-serif;
  font-weight:800;font-size:clamp(96px,12vw,150px);line-height:.8;pointer-events:none;user-select:none;color:rgba(25,52,93,.05);}
#ee-solutions .solb-a .solb-ghost{color:rgba(255,255,255,.05);}
#ee-solutions .solb-tag{display:inline-flex;align-items:center;gap:9px;align-self:flex-start;font-size:11.5px;font-weight:700;
  letter-spacing:.12em;text-transform:uppercase;border-radius:999px;padding:6px 14px 6px 10px;margin:0 0 14px;position:relative;z-index:1;
  color:var(--navy);background:rgba(25,52,93,.06);border:1px solid rgba(25,52,93,.12);}
#ee-solutions .solb-a .solb-tag{color:#ffd9c2;background:rgba(222,110,48,.18);border-color:rgba(222,110,48,.35);}
#ee-solutions .solb-tag img.eeimg,#ee-solutions .solb-tag svg{width:16px;height:16px;}
#ee-solutions .solb-card h3{font-family:'Inter',sans-serif;font-weight:700;font-size:clamp(19px,2.2vw,24px);
  line-height:1.22;letter-spacing:-.01em;margin:0 0 8px;position:relative;z-index:1;color:var(--navy);}
#ee-solutions .solb-a h3,#ee-solutions .solb-d h3{color:#fff;}
#ee-solutions .solb-desc{font-size:14px;line-height:1.55;color:var(--muted);margin:0 0 18px;max-width:52ch;position:relative;z-index:1;}
#ee-solutions .solb-a .solb-desc{color:rgba(255,255,255,.78);}
#ee-solutions .solb-d .solb-desc{color:rgba(255,255,255,.9);}
#ee-solutions .solb-links{display:flex;flex-direction:column;gap:9px;margin-top:auto;position:relative;z-index:1;}
#ee-solutions .solb-c .solb-links{display:grid;grid-template-columns:1fr 1fr;gap:9px;}
#ee-solutions .solb-link{display:flex;align-items:center;gap:12px;text-decoration:none;border-radius:13px;padding:11px 14px;
  background:#fff;border:1px solid var(--hair);color:var(--ink);
  transition:background .25s,border-color .25s,transform .25s,box-shadow .25s;}
#ee-solutions .solb-link:hover{border-color:rgba(222,110,48,.5);transform:translateX(4px);box-shadow:0 10px 22px -14px rgba(25,52,93,.4);}
#ee-solutions .solb-link:focus-visible{outline:2px solid var(--orange);outline-offset:2px;}
#ee-solutions .solb-a .solb-link{background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.1);color:#fff;}
#ee-solutions .solb-a .solb-link:hover{background:rgba(255,255,255,.12);border-color:rgba(222,110,48,.5);}
#ee-solutions .solb-chk{display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;width:28px;height:28px;border-radius:9px;
  background:linear-gradient(160deg,var(--orange),var(--orange2));color:#fff;}
#ee-solutions .solb-chk img.eeimg,#ee-solutions .solb-chk svg{width:15px;height:15px;}
#ee-solutions .solb-lt{display:flex;flex-direction:column;gap:2px;min-width:0;}
#ee-solutions .solb-lt b{font-family:'Inter',sans-serif;font-weight:600;font-size:14.5px;line-height:1.2;}
#ee-solutions .solb-lt span{font-size:12.5px;line-height:1.35;color:var(--muted);}
#ee-solutions .solb-a .solb-lt span{color:rgba(255,255,255,.62);}
#ee-solutions .solb-arr{margin-left:auto;flex-shrink:0;color:var(--muted);transition:color .25s,transform .25s;}
#ee-solutions .solb-a .solb-arr{color:rgba(255,255,255,.5);}
#ee-solutions .solb-arr img.eeimg,#ee-solutions .solb-arr svg{width:16px;height:16px;}
#ee-solutions .solb-link:hover .solb-arr{color:var(--orange);transform:translateX(3px);}
#ee-solutions .solb-a .solb-link:hover .solb-arr{color:#fff;}
#ee-solutions .solb-cta{display:inline-flex;align-items:center;gap:9px;position:relative;z-index:1;margin-top:18px;
  background:#fff;color:var(--orange);font-weight:700;font-size:14.5px;padding:12px 22px;border-radius:999px;text-decoration:none;
  box-shadow:0 14px 28px -12px rgba(15,32,58,.4);transition:transform .25s,box-shadow .25s;}
#ee-solutions .solb-cta svg,#ee-solutions .solb-cta img.eeimg{width:16px;height:16px;transition:transform .25s;}
#ee-solutions .solb-cta:hover{transform:translateY(-2px);}
#ee-solutions .solb-cta:hover svg{transform:translateX(3px);}
@media (max-width:900px){
  #ee-solutions .solb-a,#ee-solutions .solb-b,#ee-solutions .solb-c,#ee-solutions .solb-d{grid-column:span 12;}
  #ee-solutions .solb-c .solb-links{grid-template-columns:1fr;}
}
@media (max-width:560px){
  #ee-solutions .ee-container{padding:0 18px;}
  #ee-solutions .solb-card{padding:18px 16px;border-radius:18px;}
  #ee-solutions .solb-card h3{font-size:18px;}
  #ee-solutions .solb-desc{font-size:13px;margin-bottom:14px;}
  #ee-solutions .solb-link{padding:10px 12px;}
  #ee-solutions .solb-lt b{font-size:13.5px;}
  #ee-solutions .solb-lt span{font-size:12px;}
}
@media (prefers-reduced-motion:reduce){
  #ee-solutions .solb-card,#ee-solutions .solb-link,#ee-solutions .solb-cta{transition:none;}
}
</style>
<section id="ee-solutions" aria-label="Solutions">
  <div class="ee-container">
    <div class="ee-head">
      <h2>Solutions for every admissions motion</h2>
      <p class="ee-sub">From first enquiry to confirmed enrolment, ExtraaEdge brings the right workflow to every stage of your admissions journey - explore each category below.</p>
    </div>

    <div class="solb-grid">

      <article class="solb-card solb-a">
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-01.svg" alt="" loading="lazy" decoding="async">Admission Solutions</span>
        <h3>Run your core admissions engine end-to-end</h3>
        <p class="solb-desc">Capture, qualify, convert and enrol - one connected pipeline from first enquiry to fee paid.</p>
        <div class="solb-links">
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Admission Management</b><span>Track every applicant in one live pipeline</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Enrollment Management</b><span>Move offers to enrolled &amp; fee-paid, faster</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Walk-in Management</b><span>Log, assign &amp; follow up every campus visit</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
        </div>
      </article>

      <article class="solb-card solb-b">
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-03.svg" alt="" loading="lazy" decoding="async">Study Abroad</span>
        <h3>Purpose-built for overseas education counselling</h3>
        <p class="solb-desc">Manage country, course and intake journeys - with full visibility over agents and consultants.</p>
        <div class="solb-links">
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Study Abroad CRM</b><span>Country, course &amp; intake pipelines in one place</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Education Agents</b><span>Onboard &amp; track sub-agents with clear visibility</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Education Consultants</b><span>Counsellor workflows for visa, docs &amp; apps</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
        </div>
      </article>

      <article class="solb-card solb-c">
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-04.svg" alt="" loading="lazy" decoding="async">Recruitment &amp; Lead Management</span>
        <h3>Fill your funnel - and never let a lead go cold</h3>
        <p class="solb-desc">Source, score, route and nurture every enquiry automatically, from first touch to enrolled.</p>
        <div class="solb-links">
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Student Recruitment</b><span>Source verified enquiries from every channel</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Lead Management</b><span>Score, route &amp; prioritise leads automatically</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Lead Nurturing</b><span>Automated drips across WhatsApp, email &amp; SMS</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Enrollment CRM</b><span>One CRM from first touch to enrolled</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
        </div>
      </article>

      <aside class="solb-card solb-d">
        <h3>Not sure which solution fits?</h3>
        <p class="solb-desc">Tell us your admissions motion - we&rsquo;ll map the right workflow live on your own funnel in a 45-minute demo.</p>
        <a class="solb-cta" href="#admission-form">Book a Demo <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
      </aside>

    </div>
  </div>
</section>
<!-- ===================== EE INDUSTRIES - Apple spatial / glass UI ===================== -->
<style id="ee-ind-spatial">
#ee-ind{ position:relative; overflow:hidden; --or:#DE6E30; --nv:#19335D;
  background:#ffffff; font-family:'Inter',sans-serif; }
#ee-ind *{ box-sizing:border-box; }
/* ambient depth blobs - brand orange + navy only, on white */
#ee-ind .spx-bg{ position:absolute; inset:0; z-index:0; pointer-events:none; overflow:hidden; }
#ee-ind .spx-blob{ position:absolute; border-radius:50%; filter:blur(80px); opacity:.55; }
#ee-ind .spx-blob.b1{ width:520px; height:520px; top:-140px; left:-90px; background:radial-gradient(circle,rgba(222,110,48,.16),transparent 68%); }
#ee-ind .spx-blob.b2{ width:560px; height:560px; top:120px; right:-160px; background:radial-gradient(circle,rgba(25,51,93,.14),transparent 68%); }
#ee-ind .spx-blob.b3{ width:460px; height:460px; bottom:-160px; left:38%; background:radial-gradient(circle,rgba(222,110,48,.10),transparent 70%); opacity:.5; }
#ee-ind .spx-wrap{ position:relative; z-index:1; max-width:1200px; margin:0 auto; padding:26px 24px 30px; }
/* header */
#ee-ind .spx-head{ text-align:center; max-width:760px; margin:0 auto 40px; }
#ee-ind .eei-eyebrow{ display:inline-flex; align-items:center; gap:9px; padding:7px 15px 7px 12px;
  border-radius:999px; background:rgba(255,255,255,.6); border:1px solid rgba(255,255,255,.8);
  -webkit-backdrop-filter:blur(14px); backdrop-filter:blur(14px);
  box-shadow:0 6px 18px -10px rgba(25,52,93,.35), inset 0 1px 0 rgba(255,255,255,.9);
  font-size:11.5px; font-weight:800; letter-spacing:.14em; text-transform:uppercase; color:#19335D; }
#ee-ind .eei-dot{ width:7px; height:7px; border-radius:50%; background:var(--or);
  box-shadow:0 0 0 4px rgba(222,110,48,.16); }
#ee-ind .spx-head h2{ font-family:'Inter',sans-serif; font-weight:800; color:var(--nv);
  font-size:clamp(24px,3.2vw,40px); line-height:1.12; letter-spacing:-.02em; margin:16px 0 10px; }
#ee-ind .spx-head p{ font-size:clamp(14px,1.5vw,16px); line-height:1.6; color:rgba(25,51,93,.62); margin:0 auto; max-width:620px; }
/* glass card grid */
#ee-ind .spx-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(218px,1fr)); gap:14px; perspective:1100px; }
#ee-ind .spx-card{ position:relative; display:flex; flex-direction:column; border-radius:18px;
  padding:18px 16px 16px; text-decoration:none;
  background:linear-gradient(158deg,rgba(255,255,255,.95),rgba(255,255,255,.85));
  -webkit-backdrop-filter:blur(8px) saturate(140%); backdrop-filter:blur(8px) saturate(140%);
  border:1px solid rgba(255,255,255,.9);
  box-shadow:inset 0 1px 0 rgba(255,255,255,.9), 0 22px 44px -24px rgba(25,52,93,.34), 0 4px 12px -6px rgba(25,52,93,.14);
  transform-style:preserve-3d; will-change:transform;
  transition:transform .45s cubic-bezier(.2,.7,.2,1), box-shadow .45s cubic-bezier(.2,.7,.2,1), border-color .45s; }
/* moving specular sheen (follows the pointer via --mx/--my) */
#ee-ind .spx-card::after{ content:""; position:absolute; inset:0; border-radius:inherit; pointer-events:none;
  background:radial-gradient(130% 90% at var(--mx,50%) var(--my,0%), rgba(255,255,255,.6), transparent 52%);
  opacity:.55; transition:opacity .45s; }
#ee-ind .spx-card:hover{ transform:translateY(-6px); border-color:rgba(255,255,255,.95);
  box-shadow:inset 0 1px 0 rgba(255,255,255,1), 0 40px 70px -30px rgba(25,52,93,.5), 0 10px 24px -12px rgba(25,52,93,.28); }
#ee-ind .spx-card:hover::after{ opacity:.9; }
/* app-icon style gradient glass tile */
#ee-ind .spx-ic{ position:relative; width:44px; height:44px; border-radius:13px; display:grid; place-items:center;
  background:linear-gradient(150deg,var(--g1),var(--g2)); margin-bottom:12px; transform:translateZ(30px);
  box-shadow:0 10px 22px -8px var(--g2), inset 0 1px 0 rgba(255,255,255,.55); }
#ee-ind .spx-ic::before{ content:""; position:absolute; inset:0; border-radius:inherit;
  background:linear-gradient(180deg,rgba(255,255,255,.4),transparent 55%); }
#ee-ind .spx-ic svg{ width:22px; height:22px; fill:none; stroke:#fff; stroke-width:1.9;
  stroke-linecap:round; stroke-linejoin:round; position:relative; z-index:1; }
#ee-ind .spx-ic--img{ background:none; box-shadow:none; }
#ee-ind .spx-ic--img::before{ display:none; }
#ee-ind .spx-ic--img img{ width:100%; height:100%; object-fit:contain; display:block; position:relative; z-index:1; border-radius:13px; }
#ee-ind .spx-card h3{ font-family:'Inter',sans-serif; font-weight:700; font-size:15.5px;
  color:var(--nv); margin:0 0 6px; letter-spacing:-.01em; transform:translateZ(18px); }
#ee-ind .spx-card p{ font-size:12.5px; line-height:1.5; color:rgba(25,51,93,.6); margin:0 0 12px; transform:translateZ(12px); }
#ee-ind .spx-go{ margin-top:auto; display:inline-flex; align-items:center; gap:6px; font-size:12.5px;
  font-weight:700; color:var(--or); letter-spacing:.01em; transform:translateZ(18px); }
#ee-ind .spx-go svg{ width:14px; height:14px; fill:none; stroke:currentColor; stroke-width:2;
  stroke-linecap:round; stroke-linejoin:round; transition:transform .25s; }
#ee-ind .spx-card:hover .spx-go svg{ transform:translateX(4px); }
/* tablet / mobile */
@media(max-width:900px){ #ee-ind .spx-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; } }
@media(max-width:600px){
  #ee-ind .spx-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); gap:12px; }
  #ee-ind .spx-wrap{ padding:18px 16px 22px; }
  #ee-ind .spx-head{ margin-bottom:22px; }
  #ee-ind .spx-card{ padding:16px 14px 15px; border-radius:20px; }
  #ee-ind .spx-ic{ width:42px; height:42px; border-radius:13px; margin-bottom:12px; }
  #ee-ind .spx-ic svg{ width:21px; height:21px; }
  #ee-ind .spx-card h3{ font-size:13.5px; margin-bottom:5px; }
  #ee-ind .spx-card p{ font-size:11.5px; line-height:1.45; margin-bottom:12px; }
  #ee-ind .spx-go{ font-size:11.5px; }
}
@media(prefers-reduced-motion:reduce){ #ee-ind .spx-card{ transition:none; } }
</style>

<section id="ee-ind" aria-label="Industries we serve">
  <div class="spx-bg" aria-hidden="true">
    <span class="spx-blob b1"></span><span class="spx-blob b2"></span><span class="spx-blob b3"></span>
  </div>
  <div class="spx-wrap">
    <div class="spx-head">
      <h2>Built for every kind of institution</h2>
      <p>One AI-powered admissions platform, tuned to the way your category recruits, nurtures and enrols students.</p>
    </div>

    <div class="spx-grid">
      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/edtech.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>EdTech</h3>
        <p>You buy leads by the thousand - every enquiry has to convert.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/coaching-and-training.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>Coaching &amp; Training</h3>
        <p>Batches fill on deadlines - every enquiry counts.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/k-12-schools.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>K-12 Schools</h3>
        <p>Parents take months to choose - trust wins the seat.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/preschools-and-playschools.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>Preschools &amp; Playschools</h3>
        <p>It&rsquo;s their first school - reassurance closes the admission.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/online-degree-programmes.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>Online Degree Programmes</h3>
        <p>You compete nationally for every learner.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/higher-education.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>Higher Education</h3>
        <p>Many programmes, many counsellors - one admissions engine.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/study-abroad-consultants.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>Study Abroad Consultants</h3>
        <p>A single student journey can run for a year.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/channel-partners.svg" alt="" loading="lazy" decoding="async"></span>
        <h3>Channel Partners</h3>
        <p>Your partners send leads - you need to see every one.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>
    </div>
  </div>
</section>

<script>
/* Industries - spatial pointer-tilt (adds visionOS-style depth on hover) */
(function(){
  var root=document.getElementById('ee-ind'); if(!root) return;
  var mq=window.matchMedia;
  if(mq && (mq('(hover: none)').matches || mq('(prefers-reduced-motion: reduce)').matches)) return;
  var cards=root.querySelectorAll('.spx-card');
  cards.forEach(function(c){
    c.addEventListener('mousemove',function(e){
      var r=c.getBoundingClientRect();
      var px=(e.clientX-r.left)/r.width-0.5, py=(e.clientY-r.top)/r.height-0.5;
      c.style.transform='translateY(-6px) rotateX('+(-py*6)+'deg) rotateY('+(px*6)+'deg)';
      c.style.setProperty('--mx',(px*70+50)+'%');
      c.style.setProperty('--my',(py*70+30)+'%');
    });
    c.addEventListener('mouseleave',function(){ c.style.transform=''; c.style.removeProperty('--mx'); c.style.removeProperty('--my'); });
  });
})();
</script>

<!-- ===================== /EE INDUSTRIES SECTION ===================== -->

<section id="stories" aria-labelledby="stories-title">
  <div class="cis-wrap">
    <div class="cis-head">
      <h2 class="cis-title" id="stories-title">Powering growth for <em>500+ happy customers</em></h2>
      <p class="cis-lead">Real admissions leaders and the stories behind them. See how institutions grow with ExtraaEdge.</p>
    </div>

    <div class="cis-rail" role="list">

      <article class="cis-card" role="listitem">
        <div class="cis-video" data-yt="3SHgLf1GFgk" role="button" tabindex="0" aria-label="Play video testimonial: Silky Jain Marwah, Tula's Institute">
          <img src="https://img.youtube.com/vi/3SHgLf1GFgk/hqdefault.jpg" alt="Silky Jain Marwah, Executive Director, Tula's Institute - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-foot">
          <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp" alt="Silky Jain Marwah" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">SJ</span></span>
          <div class="cis-meta"><div class="cis-aname">Silky Jain Marwah</div><div class="cis-arole">Executive Director &middot; Tula's Institute</div></div>
        </div>
      </article>

      <article class="cis-card" role="listitem">
        <div class="cis-video" data-yt="dWLdQ8E3FOU" role="button" tabindex="0" aria-label="Play video testimonial: Pranay Rupani, Annapurna College of Film &amp; Media">
          <img src="https://img.youtube.com/vi/dWLdQ8E3FOU/hqdefault.jpg" alt="Pranay Rupani, Head of Admissions &amp; Marketing, Annapurna College of Film &amp; Media - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-foot">
          <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp" alt="Pranay Rupani" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">PR</span></span>
          <div class="cis-meta"><div class="cis-aname">Pranay Rupani</div><div class="cis-arole">Head of Admissions &amp; Marketing &middot; Annapurna College of Film &amp; Media</div></div>
        </div>
      </article>

      <article class="cis-card" role="listitem">
        <div class="cis-video" data-yt="yfK83D2SKps" role="button" tabindex="0" aria-label="Play video testimonial: K. Nirmala Devi, Indian Academy Group">
          <img src="https://img.youtube.com/vi/yfK83D2SKps/hqdefault.jpg" alt="K. Nirmala Devi, Assistant Manager, Indian Academy Group - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-foot">
          <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp" alt="K. Nirmala Devi" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">KN</span></span>
          <div class="cis-meta"><div class="cis-aname">K. Nirmala Devi</div><div class="cis-arole">Assistant Manager &middot; Indian Academy Group</div></div>
        </div>
      </article>

    </div>

    <div class="cis-cta">
      <a class="cis-btn primary" href="/customer-success-stories/">View All Customer Stories <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-03.svg" alt="" loading="lazy" decoding="async"></a>
    </div>
  </div>
</section>

<script>
(function(){
  var root=document.getElementById('stories');
  if(!root)return;
  root.querySelectorAll('.cis-video').forEach(function(v){
    var img=v.querySelector('img'), yt=v.getAttribute('data-yt');
    if(img){img.addEventListener('error',function(){img.src='https://img.youtube.com/vi/'+yt+'/0.jpg';},{once:true});}
    function play(){
      if(v.classList.contains('playing'))return;
      root.querySelectorAll('.cis-video.playing').forEach(function(o){var f=o.querySelector('iframe');if(f)f.remove();o.classList.remove('playing');});
      var fr=document.createElement('iframe');
      fr.src='https://www.youtube-nocookie.com/embed/'+yt+'?autoplay=1&rel=0&modestbranding=1&playsinline=1';
      fr.title='Video testimonial';
      fr.setAttribute('allow','autoplay; encrypted-media; picture-in-picture');
      fr.setAttribute('allowfullscreen','');
      v.appendChild(fr);v.classList.add('playing');
    }
    v.addEventListener('click',play);
    v.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();play();}});
  });
  root.querySelectorAll('.cis-av img').forEach(function(a){a.addEventListener('error',function(){a.closest('.cis-av').classList.add('noimg');},{once:true});});
  /* cards rise in only when the section is reached; the hidden state exists
     only once JS confirms it can also remove it (cis-anim), so no-JS/embed
     renders always show the cards */
  try{
    root.classList.add('cis-anim');
    var io=new IntersectionObserver(function(en){
      en.forEach(function(x){ if(x.isIntersecting){ root.classList.add('in'); io.disconnect(); } });
    },{threshold:.12});
    io.observe(root);
  }catch(e){ root.classList.add('in'); }
})();
</script>

<section id="ee-cro" aria-label="Why teams choose ExtraaEdge + ROI calculator">
  <div class="cw">
    <div class="ch">
      <h2>The only <em>AI-native</em> Admission CRM</h2>
      <p>Others automate. ExtraaEdge actually <b>calls, qualifies and follows up</b> with every student using AI - so your team only talks to ready-to-enrol leads.</p>
    </div>
    <div class="cmp" role="table" aria-label="Feature comparison">
      <div class="cmp-row head" role="row">
        <div>Capability</div>
        <div class="us"><span class="usbadge"><svg viewBox="0 0 24 24" fill="#fff"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg></span>ExtraaEdge</div>
        <div>Other CRMs</div>
        <div>Generic tools</div>
      </div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.9.6 2.9.7a2 2 0 0 1 1.7 2z"/></svg></span><span>AI Voice Agent<small>calls leads in 10+ languages</small></span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="no">&mdash;</span></div><div class="cell"><span class="no">&mdash;</span></div></div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.4 8.4 0 0 1-8.5 8.4 8.6 8.6 0 0 1-3.9-.9L3 21l2-5.5a8.4 8.4 0 1 1 16-4z"/><path d="M9 11h.01M12.5 11h.01M16 11h.01"/></svg></span><span>24&times;7 AI chat counsellor<small>VidyaGPT</small></span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="mid">Basic bot</span></div><div class="cell"><span class="mid">Basic bot</span></div></div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L4.1 12.6h6L9.9 22 19 11.4h-6L13 2z"/></svg></span><span>Real-time AI lead intent scoring</span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="mid">Rule-based</span></div><div class="cell"><span class="mid">Rule-based</span></div></div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16v10H9l-5 4V6z"/><path d="M8.5 10.5h.01M12 10.5h.01M15.5 10.5h.01"/></svg></span><span>Official WhatsApp Business API automation</span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="ok2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="ok2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div></div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 9L12 4 2 9l10 5 10-5z"/><path d="M6 11.5V16c0 1.5 2.7 3 6 3s6-1.5 6-3v-4.5"/></svg></span><span>Built only for admissions</span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="ok2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="mid">Generic CRM</span></div></div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.8.7-2-.1-2.8-.8-.7-2.1-.6-2.9-.2z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.9A12.9 12.9 0 0 1 22 2c0 2.7-.9 7.5-6 11a22.4 22.4 0 0 1-4 2z"/></svg></span><span>Go live in 7 days</span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="mid">Weeks</span></div><div class="cell"><span class="mid">Weeks</span></div></div>
      <div class="cmp-row" role="row"><div class="feat"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M12 8v13M5 12v9h14v-9"/><path d="M7.5 8a2.5 2.5 0 1 1 0-5C10 3 12 8 12 8s2-5 4.5-5a2.5 2.5 0 1 1 0 5"/></svg></span><span>Free migration &amp; 1:1 onboarding</span></div><div class="cell us"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell"><span class="no">&mdash;</span></div><div class="cell"><span class="no">&mdash;</span></div></div>
    </div>
    <p class="cmp-note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z"/></svg><span>Comparison based on publicly listed features (Jun 2026) - verify for your exact requirements. <b>Switching from another CRM? We migrate your data free.</b></span></p>
    <div class="roi" aria-label="ROI calculator">
      <div class="roi-in">
        <h3>How many more admissions could you get?</h3>
        <p class="sub">Move the sliders - see your upside instantly.</p>
        <div class="fld"><label>Monthly enquiries <b id="ro1">2,000</b></label><input id="ri1" type="range" min="200" max="20000" step="100" value="2000"><div class="nums"><span>200</span><span>20,000</span></div></div>
        <div class="fld"><label>Current conversion rate <b id="ro2">20%</b></label><input id="ri2" type="range" min="5" max="45" step="1" value="20"><div class="nums"><span>5%</span><span>45%</span></div></div>
        <div class="fld"><label>Average fee / student <b id="ro3">&#8377;1.0 L</b></label><input id="ri3" type="range" min="20000" max="800000" step="10000" value="100000"><div class="nums"><span>&#8377;20K</span><span>&#8377;8L</span></div></div>
      </div>
      <div class="roi-out">
        <span class="lab">Extra admissions / month with ExtraaEdge</span>
        <div class="big" id="roExtra">+96</div>
        <div class="rev">Extra revenue: <span id="roRev">&#8377;96.0 L</span> / mo</div>
        <div class="meta">
          <div><b id="roNow">400</b><span>Admissions now</span></div>
          <div><b id="roNew">496</b><span>With ExtraaEdge</span></div>
          <div><b>+40%</b><span>Conversion lift</span></div>
        </div>
        <a href="#admission-form" class="cta">Get my detailed ROI report &rarr;</a>
        <div class="fine">Projection based on a typical +40% conversion lift. Book a demo for numbers on your real funnel.</div>
      </div>
    </div>
  </div>
</section>
<!-- (removed) sticky "Fill more seats" CTA bar -->
<script>
(function(){
  /* ROI calculator */
  var i1=document.getElementById('ri1'),i2=document.getElementById('ri2'),i3=document.getElementById('ri3');
  if(i1){
    var o1=document.getElementById('ro1'),o2=document.getElementById('ro2'),o3=document.getElementById('ro3');
    var eEx=document.getElementById('roExtra'),eRev=document.getElementById('roRev'),eNow=document.getElementById('roNow'),eNew=document.getElementById('roNew');
    function inr(n){ if(n>=1e7)return '₹'+(n/1e7).toFixed(1)+' Cr'; if(n>=1e5)return '₹'+(n/1e5).toFixed(1)+' L'; if(n>=1e3)return '₹'+Math.round(n/1e3)+'K'; return '₹'+Math.round(n); }
    function calc(){
      var enq=+i1.value, conv=+i2.value, fee=+i3.value;
      var now=Math.round(enq*conv/100);
      var newConv=Math.min(conv*1.4,60);
      var nw=Math.round(enq*newConv/100);
      var extra=Math.max(nw-now,0);
      o1.textContent=enq.toLocaleString('en-IN'); o2.textContent=conv+'%'; o3.textContent=inr(fee);
      eNow.textContent=now.toLocaleString('en-IN'); eNew.textContent=nw.toLocaleString('en-IN');
      eEx.textContent='+'+extra.toLocaleString('en-IN'); eRev.textContent=inr(extra*fee);
    }
    function fill(sl){var p=(sl.value-sl.min)/(sl.max-sl.min)*100;sl.style.setProperty('--p',p+'%');}
    [i1,i2,i3].forEach(function(s){s.addEventListener('input',function(){fill(s);calc();});fill(s);}); calc();
  }
  /* sticky CTA bar removed */
})();
</script>

<!-- ===================== EE · WHILE YOUR CAMPUS SLEEPS (admission operating system story) ===================== -->
<style>#ee-night{position:relative;width:100%;background:#fff}
/* scroll-driven storytelling: tall track + sticky pinned viewport.
   Pin sits BELOW the sticky site header (≈ 90px) so the story isn't hidden. */
#ee-night .een-track{position:relative;height:calc(min(100vh,870px)*3.4)}
#ee-night .een-pin{position:sticky;top:90px;height:min(calc(100vh - 90px),780px);overflow:hidden}
#ee-night #ee-night-stage{display:block;width:100%;height:100%;overflow:hidden;position:relative;background:#fff}
#ee-night-embed{will-change:transform}
/* phones: the same scroll-driven pinning, just under the shorter mobile header */
@media(max-width:960px){
  #ee-night .een-pin{top:72px;height:min(calc(100vh - 72px),740px)}
  /* any sizing slack around the story must never show as a dark band between sections */
  #ee-night,#ee-night #ee-night-stage{background:#fff}
}
/* deep zoom-out: static autoplay block, full natural height, no clip/slide */
@media(min-height:1200px){
  #ee-night .een-track{height:auto!important}
  #ee-night .een-pin{position:static!important;height:auto!important;overflow:visible}
  #ee-night #ee-night-stage{height:auto;min-height:640px;overflow:visible}
  #ee-night,#ee-night #ee-night-stage{background:#fff}
}
#ee-night-embed{
  --orange:#DE6E30;--orange2:#E8843F;
  --wa:#25D366;--wadark:#075E54;--green:#2BC98A;--blue:#4E86D8;--red:#E5484D;
  --bg:#0F2144;--bg2:#132a55;--fg:#fff;--sub:rgba(255,255,255,.62);--faint:rgba(255,255,255,.36);--hair:rgba(255,255,255,.10);--panel:rgba(255,255,255,.05);
}#ee-night-embed.day{--bg:#fff;--bg2:#FBF6F1;--fg:#19335D;--sub:#7C8698;--faint:#A9B2C1;--hair:#ECEEF4;--panel:#fff}#ee-night-embed *{margin:0;padding:0;box-sizing:border-box}#ee-night-embed{scroll-behavior:smooth;-webkit-font-smoothing:antialiased}#ee-night-embed{font-family:'Inter',system-ui,sans-serif;color:var(--fg);background:linear-gradient(var(--bg),var(--bg2));transition:background 1.2s,color 1.2s}#ee-night-embed ::selection{background:rgba(222,110,48,.25)}#ee-night-embed h1,#ee-night-embed h2{font-family:'Inter',sans-serif;letter-spacing:-.02em;color:var(--fg);transition:color 1.2s}#ee-night-embed .o{color:var(--orange)}#ee-night-embed .rev{opacity:0;transform:translateY(18px);transition:opacity .55s,transform .55s}#ee-night-embed .rev.in{opacity:1;transform:none}#ee-night-embed .d1{transition-delay:.08s}#ee-night-embed .d2{transition-delay:.16s}#ee-night-embed #sky{position:absolute;inset:0;pointer-events:none;z-index:0;transition:opacity 1.4s;
  background-image:radial-gradient(1.5px 1.5px at 12% 18%,rgba(255,255,255,.7),transparent),radial-gradient(1px 1px at 28% 64%,rgba(255,255,255,.5),transparent),radial-gradient(1.5px 1.5px at 44% 30%,rgba(255,255,255,.6),transparent),radial-gradient(1px 1px at 61% 74%,rgba(255,255,255,.45),transparent),radial-gradient(2px 2px at 72% 12%,rgba(255,255,255,.65),transparent),radial-gradient(1px 1px at 84% 48%,rgba(255,255,255,.5),transparent);
  animation:eenTwinkle 5s ease-in-out infinite}#ee-night-embed.day #sky{opacity:0}@keyframes eenTwinkle{50%{opacity:.55}}@keyframes eenBlink{50%{opacity:.35}}#ee-night-embed .player{position:relative;z-index:1;min-height:min(100vh,820px);min-height:min(100svh,820px);display:grid;grid-template-columns:minmax(320px,38%) 1fr;gap:3vw;max-width:1280px;margin:0 auto;padding:26px 4vw;align-items:center}#ee-night-embed .pleft{display:flex;flex-direction:column;justify-content:center}#ee-night-embed .kick{font:600 10.5px/1 Inter;letter-spacing:.24em;text-transform:uppercase;color:var(--orange2)}#ee-night-embed .pleft h2{font-size:clamp(14px,1.7vw,22px)!important;font-weight:800;line-height:1.1;margin:12px 0 8px;max-width:18ch}#ee-night-embed .pleft .lede{color:var(--sub);font-size:13.5px;line-height:1.55;max-width:40ch;transition:color 1.2s}#ee-night-embed .steps{margin-top:24px;display:flex;flex-direction:column;gap:4px}#ee-night-embed .step{position:relative;display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:12px;cursor:pointer;border:1px solid transparent;transition:background .3s,border-color .3s;user-select:none}#ee-night-embed .step:hover{background:var(--panel)}#ee-night-embed .step.on{background:var(--panel);border-color:var(--hair);box-shadow:0 10px 30px rgba(3,10,26,.18)}#ee-night-embed.day .step.on{box-shadow:0 10px 30px rgba(25,51,93,.08)}#ee-night-embed .step .tno{font:700 10px/1 ui-monospace,Menlo,monospace;color:var(--faint);width:20px;flex:none;transition:color .3s}#ee-night-embed .step.on .tno{color:var(--orange)}#ee-night-embed .step .tt{flex:1;min-width:0}#ee-night-embed .step .tt h3{font:600 13px/1.3 Inter;color:var(--fg);display:block;transition:color 1.2s}#ee-night-embed .step .tt span{font:500 10.5px/1 Inter;color:var(--faint);transition:color 1.2s}#ee-night-embed .step .tm{font:600 10.5px/1 ui-monospace,Menlo,monospace;color:var(--sub);flex:none;transition:color 1.2s}#ee-night-embed .step.on .tm{color:var(--orange)}#ee-night-embed .step .pbar{position:absolute;left:12px;right:12px;bottom:4px;height:2px;border-radius:2px;background:var(--hair);overflow:hidden;opacity:0;transition:opacity .3s}#ee-night-embed .step.on .pbar{opacity:1}#ee-night-embed .step .pbar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--orange2),var(--orange))}#ee-night-embed .step.done .tno{color:var(--green)}#ee-night-embed .pctrl{display:none;align-items:center;gap:10px;margin-top:16px}#ee-night-embed .pbtn{width:34px;height:34px;border-radius:50%;border:1px solid var(--hair);background:var(--panel);color:var(--fg);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:border-color .3s,background 1.2s,color 1.2s}#ee-night-embed .pbtn:hover{border-color:var(--orange)}#ee-night-embed .pctrl span{font:500 10.5px/1 Inter;color:var(--faint);transition:color 1.2s}#ee-night-embed .pright{display:flex;flex-direction:column;align-items:center;justify-content:center}#ee-night-embed .stage{position:relative;width:100%;max-width:680px;height:min(700px,80vh);display:flex;align-items:center;justify-content:center}#ee-night-embed .shot{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;opacity:0;transform:translateY(16px) scale(.97);transition:opacity .45s,transform .45s;pointer-events:none}#ee-night-embed .shot.on{opacity:1;transform:none;pointer-events:auto;transition-delay:.08s}#ee-night-embed .evcap{margin-top:15px;text-align:center;font:500 13px/1.55 Inter;color:var(--sub);max-width:430px;transition:color 1.2s}#ee-night-embed .phone{position:relative;width:330px;background:#000;border-radius:42px;padding:10px;box-shadow:0 0 0 1.5px rgba(255,255,255,.12),0 26px 60px rgba(3,10,26,.5);transition:box-shadow 1.2s}#ee-night-embed.day .phone{box-shadow:0 0 0 1.5px #D8DEE9,0 26px 60px rgba(25,51,93,.18)}#ee-night-embed .phone .screen{border-radius:33px;overflow:hidden;background:#fff;position:relative;height:580px;display:flex;flex-direction:column}#ee-night-embed .notch{position:absolute;top:14px;left:50%;transform:translateX(-50%);width:92px;height:24px;background:#000;border-radius:999px;z-index:5;display:flex;align-items:center;justify-content:flex-end;padding-right:12px}#ee-night-embed .notch::after{content:"";width:8px;height:8px;border-radius:50%;background:radial-gradient(circle at 35% 30%,#3b4d61,#000 72%);box-shadow:inset 0 0 0 1px rgba(255,255,255,.08)}#ee-night-embed .appwin{width:min(600px,100%);border-radius:14px;overflow:hidden;background:#fff;box-shadow:0 0 0 1px rgba(255,255,255,.1),0 26px 60px rgba(3,10,26,.5);transition:box-shadow 1.2s}#ee-night-embed.day .appwin{box-shadow:0 0 0 1px #E6E9F0,0 26px 60px rgba(25,51,93,.14)}#ee-night-embed .appbar{display:flex;align-items:center;gap:9px;background:#F7F8FB;border-bottom:1px solid #ECEEF4;padding:10px 14px}#ee-night-embed .appbar .wd{display:flex;gap:5px}#ee-night-embed .appbar .wd i{width:8px;height:8px;border-radius:50%}#ee-night-embed .appbar .wd i:nth-child(1){background:#FF5F57}#ee-night-embed .appbar .wd i:nth-child(2){background:#FEBC2E}#ee-night-embed .appbar .wd i:nth-child(3){background:#28C840}#ee-night-embed .appbar .url{flex:1;background:#fff;border:1px solid #ECEEF4;border-radius:8px;padding:7px 12px;font:500 11px/1 Inter;color:#7C8698;display:flex;align-items:center;gap:6px;white-space:nowrap;overflow:hidden}#ee-night-embed .apptop{display:flex;align-items:center;gap:9px;padding:12px 16px;border-bottom:1px solid #ECEEF4}#ee-night-embed .apptop .alogo{width:24px;height:24px;border-radius:6px;background:conic-gradient(from 200deg,#DE6E30,#19335D 55%,#DE6E30);flex:none}#ee-night-embed .apptop b{font:700 13.5px/1 Inter;color:#19335D}#ee-night-embed .apptop .crumb{font:500 11.5px/1 Inter;color:#A9B2C1}#ee-night-embed .apptop .lvpill{margin-left:auto;font:600 10.5px/1 Inter;color:#1FAF66;background:#E7F8EF;padding:4px 8px;border-radius:999px;display:flex;align-items:center;gap:5px}#ee-night-embed .apptop .lvpill::before{content:"";width:5px;height:5px;border-radius:50%;background:#1FAF66;animation:eenBlink 1.4s infinite}#ee-night-embed .appbody{padding:16px 18px;color:#22314A}#ee-night-embed .leadhead{display:flex;align-items:center;gap:12px;margin-bottom:13px}#ee-night-embed .lava{width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,#8FB2E8,#4E86D8);color:#fff;display:flex;align-items:center;justify-content:center;font:700 16px/1 Inter;flex:none}#ee-night-embed .leadhead .ln b{font:700 16px/1.2 Inter;color:#19335D;display:flex;align-items:center;gap:6px}#ee-night-embed .leadhead .ln b .new{font:700 9.5px/1 Inter;letter-spacing:.08em;color:var(--orange-800,#A8501C);background:#FDF1E9;padding:3px 6px;border-radius:5px}#ee-night-embed .leadhead .ln span{font:500 11.5px/1 Inter;color:#A9B2C1;display:block;margin-top:3px}#ee-night-embed .grid2{display:grid;grid-template-columns:1fr 1fr;gap:9px}#ee-night-embed .fld{background:#F9FAFC;border:1px solid #EFF1F6;border-radius:10px;padding:10px 12px}#ee-night-embed .fld span{font:600 9.5px/1 Inter;letter-spacing:.1em;text-transform:uppercase;color:#A9B2C1;display:block;margin-bottom:5px}#ee-night-embed .fld b{font:600 13px/1.35 Inter;color:#22314A}#ee-night-embed .fld b.hl{color:var(--orange-700,#B5551D)}#ee-night-embed .appfoot{display:flex;gap:9px;margin-top:14px}#ee-night-embed .abtn{flex:1;text-align:center;font:600 12.5px/1 Inter;border-radius:9px;padding:11px 0}#ee-night-embed .abtn.pr{background:linear-gradient(90deg,#E8843F,#DE6E30);color:#fff}#ee-night-embed .abtn.sec{border:1px solid #ECEEF4;color:#19335D}#ee-night-embed .wchat{flex:1;display:flex;flex-direction:column;background:#EFE7DD}#ee-night-embed .whead{background:var(--wadark);color:#fff;display:flex;align-items:center;gap:10px;padding:32px 14px 11px}#ee-night-embed .whead .wava{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#E8843F,#DE6E30);display:flex;align-items:center;justify-content:center;font:700 14px/1 Inter;flex:none}#ee-night-embed .whead .wn{flex:1;min-width:0}#ee-night-embed .whead .wn b{font:600 14.5px/1.2 Inter;display:flex;align-items:center;gap:5px}#ee-night-embed .whead .wn b .vf{width:12px;height:12px;border-radius:50%;background:#25A9E0;display:inline-flex;align-items:center;justify-content:center;color:#fff;font-size:7px;flex:none}#ee-night-embed .whead .wn span{font:400 11px/1 Inter;opacity:.8}#ee-night-embed .wbody{flex:1;padding:13px 12px;display:flex;flex-direction:column;gap:8px;overflow:hidden}#ee-night-embed .wmsg{max-width:84%;border-radius:10px;padding:8px 11px 7px;font:400 13.5px/1.45 Inter;color:#111;box-shadow:0 1px 1px rgba(0,0,0,.08)}#ee-night-embed .wmsg .wtm{display:inline-flex;align-items:center;gap:3px;font:400 10px/1 Inter;color:#8696A0;margin-left:7px;position:relative;top:3px;float:right}#ee-night-embed .wmsg.in{background:#fff;align-self:flex-start;border-top-left-radius:2px}#ee-night-embed .wmsg.out{background:#DCF8C6;align-self:flex-end;border-top-right-radius:2px}#ee-night-embed .ticks{color:#4FC3F7;font-size:9px;letter-spacing:-2px}#ee-night-embed .wdate{align-self:center;background:#E1F2FA;border-radius:7px;padding:5px 11px;font:500 10.5px/1 Inter;color:#5B6B76}#ee-night-embed .wtyping{align-self:flex-start;background:#fff;border-radius:8px;border-top-left-radius:2px;padding:8px 11px;display:flex;gap:4px;box-shadow:0 1px 1px rgba(0,0,0,.08)}#ee-night-embed .wtyping i{width:5px;height:5px;border-radius:50%;background:#9AA7B0;animation:eenTy 1s infinite}#ee-night-embed .wtyping i:nth-child(2){animation-delay:.15s}#ee-night-embed .wtyping i:nth-child(3){animation-delay:.3s}@keyframes eenTy{0%,100%{transform:translateY(0);opacity:.4}50%{transform:translateY(-3px);opacity:1}}#ee-night-embed .winput{display:flex;align-items:center;gap:8px;padding:9px 12px 16px;background:#EFE7DD}#ee-night-embed .winput .wfield{flex:1;background:#fff;border-radius:999px;padding:11px 16px;font:400 12.5px/1 Inter;color:#8696A0}#ee-night-embed .winput .wmic{width:40px;height:40px;border-radius:50%;background:var(--wa);flex:none;display:flex;align-items:center;justify-content:center}#ee-night-embed .scorehead{display:flex;align-items:center;justify-content:space-between;margin-bottom:9px}#ee-night-embed .scorehead b{font:700 14.5px/1 Inter;color:#19335D}#ee-night-embed .scorenum{font:800 30px/1 Inter;color:#DE6E30}#ee-night-embed .factor{margin-bottom:11px}#ee-night-embed .factor .fl{display:flex;justify-content:space-between;font:500 12px/1.3 Inter;color:#7C8698;margin-bottom:5px;gap:10px}#ee-night-embed .factor .fl b{color:#22314A;font-weight:600;text-align:right}#ee-night-embed .factor .fb{height:8px;border-radius:4px;background:#F1F3F7;overflow:hidden}#ee-night-embed .factor .fb i{display:block;height:100%;border-radius:4px;background:linear-gradient(90deg,#E8843F,#DE6E30);width:0;transition:width .9s ease}#ee-night-embed .shot.on .factor .fb i{width:var(--w)}#ee-night-embed .shot.on .factor:nth-child(3) .fb i{transition-delay:.12s}#ee-night-embed .shot.on .factor:nth-child(4) .fb i{transition-delay:.24s}#ee-night-embed .shot.on .factor:nth-child(5) .fb i{transition-delay:.36s}#ee-night-embed .scoreverdict{margin-top:12px;background:#FDF1E9;border:1px solid #F6D9C4;border-radius:10px;padding:11px 13px;font:600 12.5px/1.45 Inter;color:#B4571F}#ee-night-embed .callscr{flex:1;display:flex;flex-direction:column;align-items:center;background:linear-gradient(180deg,#12233F,#0A1526);color:#fff;padding-top:36px}#ee-night-embed .callscr .cava{width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#E8843F,#DE6E30);display:flex;align-items:center;justify-content:center;font:700 25px/1 Inter;margin-bottom:13px;box-shadow:0 0 0 9px rgba(222,110,48,.12),0 0 0 19px rgba(222,110,48,.05)}#ee-night-embed .callscr .cname{font:600 17.5px/1.2 Inter}#ee-night-embed .callscr .cnum{font:400 12.5px/1 Inter;opacity:.65;margin-top:4px}#ee-night-embed .callscr .cstate{font:500 11.5px/1 Inter;color:#2BC98A;margin-top:8px;display:flex;align-items:center;gap:5px}#ee-night-embed .callscr .cstate::before{content:"";width:5px;height:5px;border-radius:50%;background:#2BC98A;animation:eenBlink 1.4s infinite}#ee-night-embed .callscr .ctimer{font:600 27px/1 Inter;font-variant-numeric:tabular-nums;margin-top:10px;letter-spacing:.04em}#ee-night-embed .transcript{width:calc(100% - 28px);margin:16px 14px 0;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:13px;padding:12px 13px;text-align:left}#ee-night-embed .transcript .tl{font:600 10px/1 Inter;letter-spacing:.16em;text-transform:uppercase;opacity:.5;margin-bottom:7px;display:flex;align-items:center;gap:5px}#ee-night-embed .transcript .tl::before{content:"";width:5px;height:5px;border-radius:50%;background:#E5484D;animation:eenBlink 1.2s infinite}#ee-night-embed .tline{font:400 12.5px/1.55 Inter;opacity:0;transform:translateY(5px);transition:opacity .45s,transform .45s;margin-bottom:5px}#ee-night-embed .tline b{font-weight:600;color:#F0A776}#ee-night-embed .tline.stu b{color:#8FB8F5}#ee-night-embed .shot.on .tline{opacity:.92;transform:none}#ee-night-embed .shot.on .tline:nth-child(2){transition-delay:.4s}#ee-night-embed .shot.on .tline:nth-child(3){transition-delay:1.1s}#ee-night-embed .shot.on .tline:nth-child(4){transition-delay:1.8s}#ee-night-embed .callbtns{margin-top:auto;display:flex;gap:36px;padding:18px 0 24px}#ee-night-embed .cbtn{width:54px;height:54px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,.12)}#ee-night-embed .cbtn.end{background:#E5484D}#ee-night-embed .assign{display:flex;align-items:flex-start;gap:9px}#ee-night-embed .assign .aicon{width:38px;height:38px;border-radius:8px;background:#FDF1E9;color:#DE6E30;flex:none;display:flex;align-items:center;justify-content:center}#ee-night-embed .assign h3{font:700 14.5px/1.35 Inter;color:#19335D}#ee-night-embed .assign p{font:400 12.5px/1.55 Inter;color:#7C8698;margin-top:4px}#ee-night-embed .attach{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}#ee-night-embed .att{display:flex;align-items:center;gap:6px;border:1px solid #ECEEF4;border-radius:9px;padding:8px 12px;font:600 11.5px/1 Inter;color:#22314A;background:#F9FAFC}#ee-night-embed .sla{margin-top:13px;display:flex;align-items:center;gap:9px;font:600 11.5px/1 Inter;color:#1FAF66}#ee-night-embed .sla .slabar{flex:1;height:7px;border-radius:4px;background:#F1F3F7;overflow:hidden}#ee-night-embed .sla .slabar i{display:block;height:100%;width:0;background:#2BC98A;transition:width 1.2s ease .25s}#ee-night-embed .shot.on .sla .slabar i{width:88%}#ee-night-embed .payscr{flex:1;display:flex;flex-direction:column;background:#F6F8FB}#ee-night-embed .payhead{background:#19335D;color:#fff;padding:34px 17px 14px;font:600 14px/1 Inter;display:flex;align-items:center;gap:7px}#ee-night-embed .paybody{flex:1;display:flex;flex-direction:column;align-items:center;padding:24px 17px}#ee-night-embed .payck{width:68px;height:68px;border-radius:50%;background:#E7F8EF;color:#1FAF66;display:flex;align-items:center;justify-content:center;margin-bottom:11px}#ee-night-embed .payck svg,#ee-night-embed .payck img.eeimg{width:33px;height:33px}#ee-night-embed .paybody h3{font:700 17px/1.2 Inter;color:#19335D}#ee-night-embed .payamt{font:800 32px/1 Inter;color:#19335D;margin:10px 0 3px}#ee-night-embed .paysub{font:400 12px/1 Inter;color:#7C8698}#ee-night-embed .payrows{width:100%;margin-top:16px;background:#fff;border:1px solid #ECEEF4;border-radius:13px;padding:4px 14px}#ee-night-embed .payrows .pr{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid #F1F3F7;font:400 12px/1.35 Inter;color:#7C8698;gap:8px}#ee-night-embed .payrows .pr:last-child{border-bottom:none}#ee-night-embed .payrows .pr b{color:#22314A;font-weight:600;text-align:right}#ee-night-embed .paypill{margin-top:15px;background:#E7F8EF;color:#1FAF66;font:700 11.5px/1 Inter;letter-spacing:.08em;padding:10px 17px;border-radius:999px}#ee-night-embed .flow{position:relative;z-index:1;padding:44px 4vw 40px;border-top:1px solid var(--hair);transition:border-color 1.2s}#ee-night-embed .flow h2{text-align:center;font-size:clamp(20px,2.6vw,30px)!important;font-weight:800}#ee-night-embed .flowline{display:flex;align-items:flex-start;justify-content:space-between;max-width:1080px;margin:28px auto 0;position:relative}#ee-night-embed .flowline::before{content:"";position:absolute;left:3%;right:3%;top:17px;height:2px;background:var(--hair);transition:background 1.2s}#ee-night-embed .fnode{position:relative;flex:1;text-align:center;min-width:0}#ee-night-embed .fnode .fdot{width:36px;height:36px;border-radius:50%;margin:0 auto 8px;background:var(--bg);border:2px solid var(--hair);display:flex;align-items:center;justify-content:center;position:relative;transition:background 1.2s,border-color .3s}#ee-night-embed .fnode .fdot svg{width:16px;height:16px}#ee-night-embed .fnode .fdot img.eeimg{width:20px;height:20px;border-radius:6px;display:block}#ee-night-embed .fnode b{font:600 10.5px/1.3 Inter;color:var(--fg);display:block;transition:color 1.2s}#ee-night-embed .fnode span{font:600 9px/1 ui-monospace,Menlo,monospace;color:var(--faint);display:block;margin-top:3px;transition:color 1.2s}#ee-night-embed .fnode.hot .fdot{border-color:var(--orange);box-shadow:0 0 0 5px rgba(222,110,48,.14)}#ee-night-embed .band{position:relative;z-index:1;padding:38px 4vw;border-top:1px solid var(--hair);transition:border-color 1.2s}#ee-night-embed .bandgrid{display:grid;grid-template-columns:1.1fr 1fr;gap:34px;max-width:1080px;margin:0 auto;align-items:center}#ee-night-embed .modrow{display:flex;flex-wrap:wrap;gap:7px}#ee-night-embed .modpill{display:flex;align-items:center;gap:6px;border:1px solid var(--hair);border-radius:999px;padding:7px 12px;font:600 10.5px/1 Inter;color:var(--fg);background:var(--panel);transition:color 1.2s,border-color 1.2s,background 1.2s}#ee-night-embed .modpill svg,#ee-night-embed .modpill img.eeimg{width:12px;height:12px;flex:none}#ee-night-embed .bandgrid h2{font-size:clamp(20px,2.4vw,28px)!important;font-weight:800;line-height:1.15}#ee-night-embed .bandgrid .bp{color:var(--sub);font-size:12.5px;line-height:1.55;margin-top:8px;transition:color 1.2s}#ee-night-embed .numrow{display:flex;gap:26px;flex-wrap:wrap;margin-top:6px}#ee-night-embed .num .nv{font:800 clamp(30px,3.6vw,44px)/1 'Inter',sans-serif;color:var(--orange)}#ee-night-embed .num .nd{margin-top:6px;font-size:10.5px;color:var(--sub);max-width:16ch;line-height:1.5;transition:color 1.2s}#ee-night-embed .ctaband{display:flex;align-items:center;justify-content:space-between;gap:22px;max-width:1080px;margin:0 auto;flex-wrap:wrap}#ee-night-embed .ctaband h2{font-size:clamp(22px,2.8vw,34px);font-weight:800;line-height:1.15}#ee-night-embed .ctaband p{color:var(--sub);font-size:12.5px;margin-top:6px;transition:color 1.2s}#ee-night-embed .cta{display:inline-block;background:linear-gradient(90deg,var(--orange2),var(--orange));color:#fff;font:700 14.5px/1 'Inter',sans-serif;text-decoration:none;border-radius:12px;padding:16px 28px;box-shadow:0 12px 30px rgba(222,110,48,.4);transition:transform .15s,box-shadow .15s;white-space:nowrap}#ee-night-embed .cta:hover{transform:translateY(-2px);box-shadow:0 16px 38px rgba(222,110,48,.5)}#ee-night-embed .trust{display:flex;flex-wrap:wrap;gap:8px 22px;margin-top:14px}#ee-night-embed .trust span{font:600 9.5px/1 Inter;letter-spacing:.1em;text-transform:uppercase;color:var(--faint);display:flex;align-items:center;gap:6px;transition:color 1.2s}#ee-night-embed .trust span::before{content:"";width:4px;height:4px;border-radius:50%;background:var(--orange2)}@media (max-width:960px){#ee-night-embed .player{grid-template-columns:1fr;gap:10px;padding:14px 5vw 12px;align-items:start;min-height:min(calc(100vh - 72px),740px);min-height:min(calc(100svh - 72px),740px)}#ee-night-embed .pleft h2{font-size:11px!important}#ee-night-embed .pleft .lede{display:none}#ee-night-embed .steps{flex-direction:row;gap:5px;margin-top:14px}#ee-night-embed .step{flex:1;padding:0;height:4px;border-radius:3px;background:var(--hair);border:none;overflow:hidden}#ee-night-embed .step .tno,#ee-night-embed .step .tt,#ee-night-embed .step .tm{display:none}#ee-night-embed .step .pbar{position:static;opacity:1;height:100%;background:transparent}#ee-night-embed .step.done .pbar i{width:100%!important}#ee-night-embed .stage{height:640px;max-width:100%}#ee-night-embed .bandgrid{grid-template-columns:1fr;gap:20px}#ee-night-embed .flowline{flex-wrap:wrap;gap:14px 0}#ee-night-embed .flowline::before{display:none}#ee-night-embed .fnode{flex:0 0 33%}#ee-night-embed .ctaband{justify-content:center;text-align:center}}@media (max-width:380px){#ee-night-embed .phone{width:290px}#ee-night-embed .phone .screen{height:520px}#ee-night-embed .appwin{width:100%}#ee-night-embed .stage{height:580px}}@media (prefers-reduced-motion:reduce){#ee-night-embed *,#ee-night-embed *::before,#ee-night-embed *::after{animation:none!important;transition:none!important}#ee-night-embed .rev,#ee-night-embed .shot,#ee-night-embed .tline{opacity:1!important;transform:none!important}#ee-night-embed .shot{position:relative;display:none}#ee-night-embed .shot.on{display:flex}#ee-night-embed .shot .factor .fb i{width:var(--w)!important}#ee-night-embed .sla .slabar i{width:88%!important}}
#ee-night-embed .apptop .alogo{background:#fff!important;overflow:hidden;display:flex;align-items:center;justify-content:center}#ee-night-embed .apptop .alogo img{width:100%;height:100%;object-fit:contain}#ee-night-embed .whead .wava,#ee-night-embed .callscr .cava{overflow:hidden}#ee-night-embed .whead .wava img,#ee-night-embed .callscr .cava img{width:100%;height:100%;object-fit:cover;display:block}#ee-night-embed .mnow{display:none;align-items:center;gap:11px;margin-top:15px;padding:12px 14px;border:1px solid var(--hair);border-radius:14px;background:var(--panel);transition:border-color 1.2s,background 1.2s}#ee-night-embed .mnow .mi{font:700 10px/1 ui-monospace,Menlo,monospace;color:var(--orange);background:rgba(222,110,48,.12);padding:6px 8px;border-radius:8px;flex:none;letter-spacing:.06em}#ee-night-embed .mnow .mm{flex:1;min-width:0}#ee-night-embed .mnow .mm b{display:block;font:600 14px/1.2 Inter;color:var(--fg);transition:color 1.2s}#ee-night-embed .mnow .mm span{display:block;font:500 11px/1.3 Inter;color:var(--faint);margin-top:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;transition:color 1.2s}#ee-night-embed .mnow .mt{font:600 11px/1 ui-monospace,Menlo,monospace;color:var(--orange);flex:none}@media(max-width:960px){#ee-night-embed .pleft,#ee-night-embed .pright{min-width:0}#ee-night-embed .mnow{display:flex}#ee-night-embed .steps{gap:6px;margin-top:16px}#ee-night-embed .step{height:5px;border-radius:3px}#ee-night-embed .step.on{box-shadow:none}#ee-night-embed .stage{height:auto!important;min-height:440px!important;max-width:100%!important;display:flex;align-items:center;justify-content:center;padding:4px 0}#ee-night-embed .shot{position:relative!important;inset:auto!important;opacity:1;transform:none;display:none!important;width:100%;transition:none}#ee-night-embed .shot{min-width:0}#ee-night-embed .shot.on{display:flex!important;animation:eenMfade .5s cubic-bezier(.23,1,.32,1) both}@keyframes eenMfade{from{opacity:0;transform:translateY(14px) scale(.985)}to{opacity:1;transform:none}}#ee-night-embed .phone{width:min(296px,80vw)}@media(max-height:760px){#ee-night-embed .phone{transform:scale(.76);transform-origin:top center}}@media(max-height:660px){#ee-night-embed .phone{transform:scale(.68);transform-origin:top center}}@media(max-height:600px){#ee-night-embed .phone{transform:scale(.6);transform-origin:top center}}@media(max-height:540px){#ee-night-embed .phone{transform:scale(.54);transform-origin:top center}}#ee-night-embed .phone .screen{height:auto!important;min-height:420px}#ee-night-embed .wbody{overflow:visible!important}#ee-night-embed .evcap{margin-top:16px;max-width:88vw}#ee-night-embed .appwin{width:100%!important;max-width:100%!important}#ee-night-embed .appbar .url{min-width:0}#ee-night-embed .apptop{flex-wrap:wrap;row-gap:4px}#ee-night-embed .apptop .lvpill{margin-left:auto}}@media(max-width:380px){#ee-night-embed .phone .screen{min-height:440px}#ee-night-embed .mnow .mm b{font-size:13px}}@media(max-width:960px){#ee-night-embed .player{display:flex!important;flex-direction:column;align-items:stretch}#ee-night-embed .pleft{display:contents}#ee-night-embed .steps{display:none!important}#ee-night-embed .kick{display:none!important}#ee-night-embed .pleft h2,#ee-night-embed .lede,#ee-night-embed .steps{order:0}#ee-night-embed .mnow{order:1;margin:10px 0 2px}#ee-night-embed .pright{order:2;position:relative}#ee-night-embed .pctrl{display:none!important}#ee-night-embed .pstage-arw{display:flex;align-items:center;justify-content:center;position:absolute;top:50%;transform:translateY(-50%);z-index:20;width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.24);background:rgba(15,28,48,.55);-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);color:#fff;cursor:pointer;box-shadow:0 6px 16px rgba(0,0,0,.28)}#ee-night-embed .pstage-arw svg{width:13px;height:13px}#ee-night-embed .pstage-prev{left:2px}#ee-night-embed .pstage-next{right:2px}#ee-night-embed .pstage-arw:active{transform:translateY(-50%) scale(.93)}#ee-night-embed .band{padding:16px 5vw 14px}#ee-night-embed .flow{padding:20px 5vw 16px}#ee-night-embed .flowline{margin-top:14px}#ee-night-embed .bandgrid{gap:16px}#ee-night-embed .modrow{display:grid!important;grid-template-columns:repeat(3,1fr);gap:6px}#ee-night-embed .modpill{justify-content:center;padding:7px 6px;font-size:9.5px;text-align:center}#ee-night-embed .numrow{display:grid!important;grid-template-columns:repeat(3,1fr);gap:10px}#ee-night-embed .num .nv{font-size:22px!important}#ee-night-embed .num .nd{font-size:9.5px;max-width:none}}#ee-night-embed h1,#ee-night-embed h2{font-family:'Inter',sans-serif!important}#ee-night-embed{background:
  radial-gradient(620px 520px at 10% 6%, rgba(222,110,48,.15), transparent 60%),
  radial-gradient(700px 580px at 94% 88%, rgba(46,78,133,.34), transparent 62%),
  linear-gradient(var(--bg),var(--bg2))!important}#ee-night-embed .mnow,#ee-night-embed .modpill,#ee-night-embed .pctrl{
  background:linear-gradient(158deg,rgba(255,255,255,.09),rgba(255,255,255,.035))!important;
  -webkit-backdrop-filter:blur(14px) saturate(140%);backdrop-filter:blur(14px) saturate(140%);
  border:1px solid rgba(255,255,255,.15)!important;
  box-shadow:inset 0 1px 0 rgba(255,255,255,.14),0 18px 38px -22px rgba(0,0,0,.6)!important;
}#ee-night-embed .step.on{
  background:linear-gradient(158deg,rgba(255,255,255,.10),rgba(255,255,255,.04))!important;
  -webkit-backdrop-filter:blur(12px) saturate(140%);backdrop-filter:blur(12px) saturate(140%);
  border:1px solid rgba(255,255,255,.16)!important;
  box-shadow:inset 0 1px 0 rgba(255,255,255,.12),0 14px 30px -18px rgba(0,0,0,.5)!important;
}#ee-night-embed .phone,#ee-night-embed .appwin{
  box-shadow:0 0 0 1px rgba(255,255,255,.10),0 44px 84px -30px rgba(0,0,0,.72),0 10px 34px -22px rgba(222,110,48,.5)!important;
}
/* Neutralize legacy global bare-class styles (.step/.fnode/.flow/.pbar/.fl
   from the old hero + flow widgets earlier in this template) that leak into
   this directly-embedded story. Without these, the 6-step list renders at
   opacity:0 (invisible), flow nodes become white cards, the .flow section
   turns into a flex row and score-factor lines go position:absolute. */
#ee-night-embed .step{opacity:1;transform:none;background:transparent;margin-bottom:0;box-shadow:none;width:auto}
#ee-night-embed .fnode{width:auto;background:transparent;border:0;border-radius:0;padding:0;box-shadow:none;transform:none}
#ee-night-embed .fnode b{margin-top:0}
#ee-night-embed .flow{display:block;margin-top:0}
#ee-night-embed .pbar{background:var(--hair);border-radius:2px}
#ee-night-embed .fl{position:static;background:transparent;border-radius:0;box-shadow:none;padding:0}
/* ── Mobile-first pass ── compact phone mockups (full WhatsApp chat visible in
   one screen), centred player, and card-style flow/modules/stats layout */
@media(max-width:960px){
  #ee-night-embed .player{justify-content:center}
  #ee-night-embed .phone{width:min(304px,86vw);padding:7px;border-radius:34px}
  #ee-night-embed .phone .screen{border-radius:28px}
  #ee-night-embed .notch{display:none}
  #ee-night-embed .notch{width:70px;height:18px;top:10px}
  #ee-night-embed .phone .screen{min-height:0!important}
  #ee-night-embed .whead{padding:12px 12px 8px}
  #ee-night-embed .whead .wava{width:30px;height:30px}
  #ee-night-embed .whead .wn b{font-size:12.5px}
  #ee-night-embed .whead .wn span{font-size:10px}
  #ee-night-embed .wbody{padding:9px 9px;gap:5px}
  #ee-night-embed .wmsg{font-size:11.5px;line-height:1.42;padding:5px 8px 4px;border-radius:9px;max-width:90%}
  #ee-night-embed .wmsg .wtm{font-size:8.5px}
  #ee-night-embed .wdate{font-size:9px;padding:4px 9px}
  #ee-night-embed .winput{padding:6px 9px 10px}
  #ee-night-embed .winput .wfield{padding:8px 13px;font-size:11px}
  #ee-night-embed .winput .wmic{width:32px;height:32px}
  #ee-night-embed .callscr{padding-top:16px}
  #ee-night-embed .callscr .cava{width:62px;height:62px;margin-bottom:10px}
  /* slide fitter: JS computes the exact stage height; every mockup is
     scaled to fill it so all six slides look consistent on any phone */
  #ee-night-embed .stage{height:var(--eenStageH,auto)!important;min-height:0!important;overflow:hidden}
  #ee-night-embed .payhead{padding:16px 14px 10px}
  /* short phones: drop the caption + context sub-line so the mockup itself
     gets the room and stays readable */
  @media(max-height:700px){
    #ee-night-embed .evcap{display:none}
    #ee-night-embed .mnow .mm span{display:none}
    #ee-night-embed .winput{display:none}
    #ee-night-embed .wdate{display:none}
    #ee-night-embed .callbtns{display:none}
  }
  #ee-night-embed .player{padding:8px 5vw 10px}
  #ee-night-embed .mnow{padding:8px 11px;margin-top:8px;border-radius:11px}
  #ee-night-embed .mnow .mm b{font-size:12.5px}
  #ee-night-embed .mnow .mm span{font-size:10px}
  #ee-night-embed .mnow .mi{font-size:9px;padding:5px 7px}
  #ee-night-embed .mnow .mt{font-size:10px}
  /* breathing room + clean alignment inside every mockup (phones) */
  #ee-night-embed .wbody{gap:7px;padding:10px 10px}
  #ee-night-embed .wmsg{line-height:1.45}
  #ee-night-embed .wmsg .wtm{margin-left:8px;top:4px}
  #ee-night-embed .whead{gap:9px}
  #ee-night-embed .whead .wn b{line-height:1.25}
  #ee-night-embed .apptop{gap:8px;row-gap:5px;padding:10px 13px}
  #ee-night-embed .apptop .crumb{font-size:10.5px}
  #ee-night-embed .apptop .lvpill{font-size:9.5px;padding:4px 7px}
  #ee-night-embed .appbody{padding:13px 14px}
  #ee-night-embed .leadhead{gap:10px;margin-bottom:11px}
  #ee-night-embed .leadhead .ln b{line-height:1.3;flex-wrap:wrap;gap:5px}
  #ee-night-embed .leadhead .ln span{line-height:1.45;margin-top:3px;white-space:normal}
  #ee-night-embed .grid2{gap:8px}
  #ee-night-embed .fld{padding:9px 11px}
  #ee-night-embed .fld span{margin-bottom:4px;letter-spacing:.06em}
  #ee-night-embed .fld b{line-height:1.35}
  #ee-night-embed .appfoot{gap:8px;margin-top:12px}
  #ee-night-embed .abtn{padding:10px 4px;line-height:1.25}
  #ee-night-embed .scorehead{margin-bottom:10px;gap:10px}
  #ee-night-embed .scorehead b{line-height:1.3}
  #ee-night-embed .factor{margin-bottom:10px}
  #ee-night-embed .factor .fl{gap:12px;margin-bottom:5px;line-height:1.35}
  #ee-night-embed .factor .fl b{max-width:52%;line-height:1.35}
  #ee-night-embed .scoreverdict{line-height:1.5;padding:10px 12px;margin-top:10px}
  #ee-night-embed .transcript{padding:11px 12px}
  #ee-night-embed .tline{line-height:1.5;margin-bottom:7px}
  #ee-night-embed .callscr .cname{line-height:1.25}
  #ee-night-embed .assign{gap:10px}
  #ee-night-embed .assign h3{line-height:1.35}
  #ee-night-embed .assign p{line-height:1.5;margin-top:5px}
  #ee-night-embed .attach{gap:7px;margin-top:10px}
  #ee-night-embed .att{padding:7px 10px;line-height:1.25}
  #ee-night-embed .sla{flex-wrap:wrap;gap:7px 9px;margin-top:11px;line-height:1.3}
  #ee-night-embed .paybody h3{line-height:1.3}
  #ee-night-embed .payamt{margin:8px 0 3px}
  #ee-night-embed .payrows{padding:3px 13px;margin-top:12px}
  #ee-night-embed .payrows .pr{padding:9px 0;line-height:1.4;gap:12px}
  #ee-night-embed .payrows .pr b{max-width:58%;word-break:break-all;line-height:1.4}
  #ee-night-embed .paypill{margin-top:12px}
  #ee-night-embed .evcap{line-height:1.5}
  /* display numbers + headers: compact on phones */
  #ee-night-embed .scorenum{font-size:24px}
  #ee-night-embed .scorenum span[style]{font-size:11px!important}
  #ee-night-embed .scorehead b{font-size:13px}
  #ee-night-embed .apptop b{font-size:12.5px}
  #ee-night-embed .payamt{font-size:24px}
  #ee-night-embed .paybody h3{font-size:15px}
  #ee-night-embed .payhead{font-size:12.5px}
  #ee-night-embed .paypill{font-size:10.5px;padding:8px 14px}
  #ee-night-embed .callscr .cname{font-size:15px}
  #ee-night-embed .callscr .ctimer{font-size:21px}
  /* readable in-mockup text on phones */
  #ee-night-embed .fld b{font-size:12px}
  #ee-night-embed .fld span{font-size:9.5px}
  #ee-night-embed .leadhead .ln b{font-size:13.5px}
  #ee-night-embed .tline{font-size:12px}
  #ee-night-embed .factor .fl{font-size:11.5px}
  #ee-night-embed .scoreverdict{font-size:11.5px}
  #ee-night-embed .assign h3{font-size:13px}
  #ee-night-embed .assign p{font-size:11.5px}
  #ee-night-embed .att{font-size:10.5px}
  #ee-night-embed .payrows .pr{font-size:11px}
  #ee-night-embed .evcap{font-size:11.5px;margin-top:9px;max-width:92vw}
  #ee-night-embed .paybody{padding:16px 13px}
  /* flow recap: tidy 2-up cards, icon left, label + time stacked */
  #ee-night-embed .flow{padding:16px 5vw 10px}
  #ee-night-embed .flow h2{font-size:17px!important}
  #ee-night-embed .flowline{display:grid!important;grid-template-columns:1fr 1fr;gap:8px;margin-top:12px}
  #ee-night-embed .flowline::before{display:none}
  #ee-night-embed .fnode{display:grid;grid-template-columns:auto 1fr;column-gap:9px;align-items:center;text-align:left;padding:8px 10px;border:1px solid var(--hair);border-radius:12px;background:var(--panel)}
  #ee-night-embed .fnode .fdot{grid-row:1/3;margin:0;width:30px;height:30px}
  #ee-night-embed .fnode .fdot img.eeimg{width:15px;height:15px}
  #ee-night-embed .fnode b{grid-column:2;font-size:11px;line-height:1.25}
  #ee-night-embed .fnode span{grid-column:2;font-size:9px;margin-top:1px}
  /* one brain / nine modules + stats: readable 2-up pills and stat cards */
  #ee-night-embed .band{padding:12px 5vw 18px}
  #ee-night-embed .bandgrid{gap:14px}
  #ee-night-embed .bandgrid h2{font-size:17px!important}
  #ee-night-embed .bandgrid .bp{font-size:12px;margin-top:6px}
  #ee-night-embed .modrow{display:grid!important;grid-template-columns:repeat(2,1fr)!important;gap:7px}
  #ee-night-embed .modpill{justify-content:flex-start!important;padding:9px 11px!important;font-size:11px!important;text-align:left!important}
  #ee-night-embed .numrow{display:grid!important;grid-template-columns:repeat(3,1fr)!important;gap:8px}
  #ee-night-embed .num{border:1px solid var(--hair);border-radius:12px;background:var(--panel);padding:10px 6px;text-align:center}
  #ee-night-embed .num .nv{font-size:20px!important}
  #ee-night-embed .num .nd{font-size:9.5px!important;margin-top:4px;max-width:none}
}
</style>
<noscript><style>#ee-night .een-track{height:auto!important}#ee-night .een-pin{position:static!important;height:auto!important;overflow:visible!important}#ee-night #ee-night-stage{height:auto!important;overflow:visible!important}#ee-night-embed .rev{opacity:1!important;transform:none!important}#ee-night-embed .shot{position:relative!important;inset:auto!important;opacity:1!important;transform:none!important;pointer-events:auto;display:flex!important;margin-bottom:26px}#ee-night-embed .stage{height:auto!important;display:block!important}#ee-night-embed .tline{opacity:.92!important;transform:none!important}#ee-night-embed .factor .fb i{width:var(--w)!important}#ee-night-embed .sla .slabar i{width:88%!important}</style></noscript>
<section id="ee-night" aria-label="The admission operating system in action">
  <div class="een-track" id="eenTrack">
  <div class="een-pin">
  <div id="ee-night-stage">
  <div id="ee-night-embed">
<div id="sky"></div>
<!-- ============ STORY PLAYER ============ -->
<section class="player" id="een-player">
  <div class="pleft">
    <h2 class="rev d1">While your campus sleeps, <span class="o">admissions don't.</span></h2>
    <p class="lede rev d2">One student, one night, six screens. Watch the whole process - it plays itself.</p>
    <div class="steps" id="steps">
      <div class="step on" data-i="0"><span class="tno">01</span><div class="tt"><h3>Lead captured</h3><span>Meta ad · auto-logged in CRM</span></div><span class="tm">11:02 PM</span><div class="pbar"><i></i></div></div>
      <div class="step" data-i="1"><span class="tno">02</span><div class="tt"><h3>VidyaGPT replies</h3><span>WhatsApp · her language · 24×7</span></div><span class="tm">11:02 PM</span><div class="pbar"><i></i></div></div>
      <div class="step" data-i="2"><span class="tno">03</span><div class="tt"><h3>Intent scored 96</h3><span>VidyaPulse ranks her priority</span></div><span class="tm">11:09 PM</span><div class="pbar"><i></i></div></div>
      <div class="step" data-i="3"><span class="tno">04</span><div class="tt"><h3>AI voice call</h3><span>Qualified · meeting booked</span></div><span class="tm">9:00 AM</span><div class="pbar"><i></i></div></div>
      <div class="step" data-i="4"><span class="tno">05</span><div class="tt"><h3>Counsellor handoff</h3><span>Full context · zero cold starts</span></div><span class="tm">9:04 AM</span><div class="pbar"><i></i></div></div>
      <div class="step" data-i="5"><span class="tno">06</span><div class="tt"><h3>Enrolled</h3><span>Fee paid · pipeline complete</span></div><span class="tm">Day 12</span><div class="pbar"><i></i></div></div>
    </div>
    <div class="mnow" id="mnow" aria-live="polite"><span class="mi">01 / 06</span><div class="mm"><b>Lead captured</b><span>Meta ad · auto-logged in CRM</span></div><span class="mt">11:02 PM</span></div>
    <div class="pctrl">
      <button class="pbtn" id="pprev" aria-label="Previous step"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
      <button class="pbtn" id="pplay" aria-label="Pause story">
        <svg id="icpause" width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="4" width="4" height="16" rx="1"/><rect x="14" y="4" width="4" height="16" rx="1"/></svg>
        <svg id="icplay" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" style="display:none"><path d="M7 4l13 8-13 8V4z"/></svg>
      </button>
      <button class="pbtn" id="pnext" aria-label="Next step"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
    </div>
  </div>

  <div class="pright">
    <div class="stage" id="stage">

      <div class="shot on" data-i="0">
        <div class="appwin">
          <div class="appbar"><div class="wd"><i></i><i></i><i></i></div><div class="url"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#1FAF66" stroke-width="3"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>app.extraaedge.com/leads/EE-2026-84517</div></div>
          <div class="apptop"><div class="alogo"><img src="https://www.extraaedge.com/wp-content/uploads/2026/brand-logo/extraaedge-mark.svg" alt="ExtraaEdge" loading="lazy" decoding="async" onerror="this.style.display='none'"></div><b>ExtraaEdge</b><span class="crumb">/ Leads / New</span><span class="lvpill">Auto-captured</span></div>
          <div class="appbody">
            <div class="leadhead"><div class="lava">PD</div><div class="ln"><b>Priya Deshmukh <span class="new">NEW LEAD</span></b><span>Lead ID EE-2026-84517 · Created 23:02:14 IST</span></div></div>
            <div class="grid2">
              <div class="fld"><span>Source</span><b class="hl">Meta Ads · Instagram</b></div>
              <div class="fld"><span>Campaign</span><b>MBA_Mumbai_Jul26</b></div>
              <div class="fld"><span>Course</span><b>MBA · 2026 Intake</b></div>
              <div class="fld"><span>Phone</span><b>+91 98••• ••342</b></div>
            </div>
            <div class="appfoot"><div class="abtn pr">Engage with VidyaGPT</div><div class="abtn sec">View timeline</div></div>
          </div>
        </div>
        <p class="evcap">Captured, deduped, enriched - no one typed this in.</p>
      </div>

      <div class="shot" data-i="1">
        <div class="phone"><div class="notch"></div>
          <div class="screen"><div class="wchat">
            <div class="whead"><svg width="7" height="12" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.6"><path d="M15 5l-7 7 7 7"/></svg><div class="wava"><img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/01-VidyaAI-Intelligence.svg" alt="Vidya AI" loading="lazy" decoding="async" onerror="this.style.display='none'"></div><div class="wn"><b>Vidya AI Counsellor <span class="vf">✓</span></b><span>online</span></div><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg></div>
            <div class="wbody">
              <div class="wdate">Today</div>
              <div class="wmsg out">MBA ki fees kya hai?<span class="wtm">11:02 PM <span class="ticks">✓✓</span></span></div>
              <div class="wmsg in">Hi Priya! 👋 Main Vidya hoon - aapki AI admission counsellor.<span class="wtm">11:02 PM</span></div>
              <div class="wmsg in">MBA 2026 ki total fees ₹8.4L hai. Aap 25% tak merit scholarship ke liye eligible ho sakti hain 🎓<span class="wtm">11:02 PM</span></div>
              <div class="wmsg out">Scholarship kaise milegi?<span class="wtm">11:03 PM <span class="ticks">✓✓</span></span></div>
              <div class="wmsg in">Aapke 12th marks pe aap seedha 25% merit scholarship ke liye eligible ho 🎉<span class="wtm">11:03 PM</span></div>
              <div class="wmsg in">Main kal subah 11 baje counsellor ke saath aapki call fix kar rahi hoon ✅<span class="wtm">11:04 PM</span></div>
            </div>
            <div class="winput"><div class="wfield">Message</div><div class="wmic"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5 11a7 7 0 0 0 14 0M12 18v3"/></svg></div></div>
          </div></div>
        </div>
        <p class="evcap">A real conversation at 11 PM - while your office is dark.</p>
      </div>

      <div class="shot" data-i="2">
        <div class="appwin">
          <div class="appbar"><div class="wd"><i></i><i></i><i></i></div><div class="url"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#1FAF66" stroke-width="3"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>app.extraaedge.com/leads/EE-2026-84517/score</div></div>
          <div class="apptop"><div class="alogo"><img src="https://www.extraaedge.com/wp-content/uploads/2026/fevicons/vidya-pulse-fevicon.png" alt="VidyaPulse" loading="lazy" decoding="async" onerror="this.style.display='none'"></div><b>VidyaPulse</b><span class="crumb">/ Lead Scoring</span><span class="lvpill">Live model</span></div>
          <div class="appbody">
            <div class="scorehead"><b>Intent Score - Priya Deshmukh</b><span class="scorenum"><span data-count="96">0</span><span style="font-size:13px">/100</span></span></div>
            <div class="factor"><div class="fl"><span>Response velocity</span><b>Replied in 41s avg</b></div><div class="fb"><i style="--w:92%"></i></div></div>
            <div class="factor"><div class="fl"><span>Engagement depth</span><b>6 questions · fees + scholarship</b></div><div class="fb"><i style="--w:88%"></i></div></div>
            <div class="factor"><div class="fl"><span>Course-fit signals</span><b>Work-ex 3 yrs · CAT registered</b></div><div class="fb"><i style="--w:84%"></i></div></div>
            <div class="factor"><div class="fl"><span>Page activity</span><b>Fee page ×3 · Placements ×2</b></div><div class="fb"><i style="--w:78%"></i></div></div>
            <div class="scoreverdict">⚡ Priority HIGH - queued for AI voice call at 9:00 AM.</div>
          </div>
        </div>
        <p class="evcap">Not a guess - a live model reading behaviour, not form fields.</p>
      </div>

      <div class="shot" data-i="3">
        <div class="phone"><div class="notch"></div>
          <div class="screen"><div class="callscr">
            <div class="cava"><img src="https://www.extraaedge.com/wp-content/uploads/2026/fevicons/vidya-ai-voice-agent-fevicon.png" alt="Vidya AI Voice Agent" loading="lazy" decoding="async" onerror="this.style.display='none'"></div>
            <div class="cname">Vidya AI Voice Agent</div>
            <div class="cnum">+91 89569 82897</div>
            <div class="cstate">Connected in 18s</div>
            <div class="ctimer" data-timer data-max="134">00:00</div>
            <div class="transcript">
              <div class="tl">Live transcript</div>
              <div class="tline"><b>Vidya:</b> Good morning Priya! Kal raat aapne MBA fees poocha tha…</div>
              <div class="tline stu"><b>Priya:</b> Haan! Scholarship ka process samajhna tha.</div>
              <div class="tline"><b>Vidya:</b> Main aapki counsellor ke saath 11 baje ki meeting book kar rahi hoon ✓</div>
            </div>
            <div class="callbtns">
              <div class="cbtn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5 11a7 7 0 0 0 14 0M12 18v3"/></svg></div>
              <div class="cbtn end"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" transform="rotate(135)"><path d="M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg></div>
              <div class="cbtn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M4 6h16v10H9l-5 4V6z"/></svg></div>
            </div>
          </div></div>
        </div>
        <p class="evcap">18 seconds after she's active - qualified, transcribed, booked.</p>
      </div>

      <div class="shot" data-i="4">
        <div class="appwin">
          <div class="appbar"><div class="wd"><i></i><i></i><i></i></div><div class="url"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#1FAF66" stroke-width="3"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>app.extraaedge.com/inbox</div></div>
          <div class="apptop"><div class="alogo"><img src="https://www.extraaedge.com/wp-content/uploads/2026/brand-logo/extraaedge-mark.svg" alt="ExtraaEdge" loading="lazy" decoding="async" onerror="this.style.display='none'"></div><b>ExtraaEdge</b><span class="crumb">/ Inbox - Rahul Verma</span><span class="lvpill">1 new</span></div>
          <div class="appbody">
            <div class="assign">
              <div class="aicon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/></svg></div>
              <div><h3>Priya Deshmukh assigned · Meeting 11:00 AM</h3><p>Smart-routed on score 96 and your 78% conversion on Meta leads. Context attached:</p></div>
            </div>
            <div class="attach">
              <div class="att"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#25D366" stroke-width="2.4"><path d="M4 6h16v10H9l-5 4V6z"/></svg>WhatsApp · 14 msgs</div>
              <div class="att"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.4"><path d="M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>Call rec · 02:14</div>
              <div class="att"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#4E86D8" stroke-width="2.4"><path d="M4 20V10M10 20V4M16 20v-8"/></svg>Score · 96/100</div>
              <div class="att"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#7A5AF8" stroke-width="2.4"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6"/></svg>AI summary</div>
            </div>
            <div class="sla"><span>Follow-up SLA</span><div class="slabar"><i></i></div><span>1h 56m left</span></div>
          </div>
        </div>
        <p class="evcap">Zero cold starts. AI did the night shift; humans do the human part.</p>
      </div>

      <div class="shot" data-i="5">
        <div class="phone"><div class="notch"></div>
          <div class="screen"><div class="payscr">
            <div class="payhead"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.6"><path d="M15 5l-7 7 7 7"/></svg>Admission Fee Payment</div>
            <div class="paybody">
              <div class="payck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></div>
              <h3>Payment Successful</h3>
              <div class="payamt">₹1,00,000</div>
              <div class="paysub">Admission Fee · MBA 2026</div>
              <div class="payrows">
                <div class="pr"><span>Transaction ID</span><b>pay_Oq8xT2mK4KzR</b></div>
                <div class="pr"><span>Method</span><b>UPI · priya.d@okhdfc</b></div>
                <div class="pr"><span>Receipt</span><b style="color:var(--orange-700,#B5551D)">Sent on WhatsApp ✓</b></div>
              </div>
              <div class="paypill">STATUS: ENROLLED 🎓</div>
            </div>
          </div></div>
        </div>
        <p class="evcap">Day 12: enrolled. All 12 days live in one timeline.</p>
      </div>

    </div>
  </div>
</section>

  </div>
  </div>
  </div>
  </div>
</section>
<script>
(function(){
  var root=document.getElementById('ee-night-embed');
  var stageWrap=document.getElementById('ee-night-stage');
  var track=document.getElementById('eenTrack');
  if(!root||!stageWrap||!track) return;
  var reduce=matchMedia('(prefers-reduced-motion: reduce)').matches;

  var io=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.2});
  root.querySelectorAll('.rev').forEach(el=>io.observe(el));

  function countUp(el){
    const end=+el.dataset.count,suf=el.dataset.suffix||'';
    if(reduce){el.textContent=end+suf;return}
    const t0=performance.now(),dur=1000;
    (function tick(t){const p=Math.min((t-t0)/dur,1),e=1-Math.pow(1-p,3);el.textContent=Math.round(end*e)+suf;if(p<1)requestAnimationFrame(tick)})(t0);
  }
  const cIO=new IntersectionObserver((es,o)=>{es.forEach(e=>{if(e.isIntersecting){countUp(e.target);o.unobserve(e.target)}})},{threshold:.6});
  root.querySelectorAll('.band [data-count]').forEach(el=>cIO.observe(el));

  function runTimer(el){
    const max=+el.dataset.max||120;
    if(reduce){el.textContent='02:14';return}
    const t0=performance.now(),dur=3000;
    (function tick(t){const p=Math.min((t-t0)/dur,1),s=Math.round(max*(1-Math.pow(1-p,2)));
      el.textContent=String(Math.floor(s/60)).padStart(2,'0')+':'+String(s%60).padStart(2,'0');
      if(p<1)requestAnimationFrame(tick)})(t0);
  }

  /* ---- story player ---- */
  const DUR=5200,N=6,DAY_AT=3,STORY=0.74;
  const steps=[...root.querySelectorAll('#steps .step')];
  const shots=[...root.querySelectorAll('#stage .shot')];
  const fnodes=[...root.querySelectorAll('#flowline .fnode')];
  const playBtn=root.querySelector('#pplay');
  const icPlay=root.querySelector('#icplay'),icPause=root.querySelector('#icpause');
  const mnow=root.querySelector('#mnow');
  let cur=0,elapsed=0,last=null,paused=false,raf=null,userPaused=false;
  const seen=new Set([0]);

  /* ---- phone slide fitter: every mockup is scaled to exactly fill the
     stage box, so all six slides render at a consistent, fully-visible
     size on every phone (replaces the coarse max-height CSS scales) ---- */
  const mqM=window.matchMedia('(max-width:960px)');
  function sizeStage(){
    if(!mqM.matches){ stage.style.removeProperty('--eenStageH'); return; }
    const pinBox=stageWrap.getBoundingClientRect();
    if(pinBox.height<200) return;
    const top=stage.getBoundingClientRect().top-pinBox.top;
    const h=Math.round(pinBox.height-top-14);
    if(h>240) stage.style.setProperty('--eenStageH',h+'px');
  }
  function fitShot(){
    const shot=root.querySelector('#stage .shot.on'); if(!shot) return;
    const inner=shot.firstElementChild; if(!inner) return;
    if(!mqM.matches){ inner.style.transform='';inner.style.marginBottom='';return; }
    const cap=shot.querySelector('.evcap');
    inner.style.transform='';inner.style.marginBottom='';inner.style.marginTop='';
    const capH=cap?cap.offsetHeight+10:0;
    const availH=stage.clientHeight-capH-6, availW=stage.clientWidth;
    const ih=inner.offsetHeight, iw=inner.offsetWidth;
    if(ih<10||availH<100) return;
    /* use nearly all the free space (text stays as large as possible),
       centre the mockup in whatever margin remains */
    const s=Math.min(1,(availH*0.96)/ih,(availW*0.94)/iw);
    const free=Math.max(0,availH-ih*s);
    inner.style.transform='scale('+s.toFixed(3)+')';
    inner.style.transformOrigin='top center';
    inner.style.marginTop=Math.round(free/2)+'px';
    inner.style.marginBottom=Math.round(ih*s-ih+free/2)+'px';
  }
  function render(i){
    steps.forEach((s,j)=>{s.classList.toggle('on',j===i);s.classList.toggle('done',j<i);
      if(j!==i)s.querySelector('.pbar i').style.width=j<i?'100%':'0%'});
    shots.forEach((s,j)=>s.classList.toggle('on',j===i));
    fnodes.forEach((f,j)=>f.classList.toggle('hot',j<=i));
    if(mnow){const s=steps[i];mnow.querySelector('.mi').textContent=String(i+1).padStart(2,'0')+' / '+String(N).padStart(2,'0');mnow.querySelector('.mm b').textContent=s.querySelector('.tt h3').textContent;mnow.querySelector('.mm span').textContent=s.querySelector('.tt span').textContent;mnow.querySelector('.mt').textContent=s.querySelector('.tm').textContent;}
    root.classList.toggle('day',i>=DAY_AT);
    if(!seen.has(i)){seen.add(i);
      const sh=shots[i];
      sh.querySelectorAll('[data-count]').forEach(countUp);
      const tm=sh.querySelector('[data-timer]');if(tm)runTimer(tm);
    }
    requestAnimationFrame(function(){ sizeStage(); fitShot(); });
  }
  function go(i,resetTimer=true){
    cur=(i+N)%N;
    if(resetTimer)elapsed=0;
    render(cur);
  }
  function loop(t){
    if(last===null)last=t;
    if(!paused&&!reduce){
      elapsed+=t-last;
      const bar=steps[cur].querySelector('.pbar i');
      bar.style.width=Math.min(elapsed/DUR*100,100)+'%';
      if(elapsed>=DUR)go(cur+1);
    }
    last=t;
    raf=requestAnimationFrame(loop);
  }
  function setPaused(p){
    paused=p;
    icPause.style.display=p?'none':'block';
    icPlay.style.display=p?'block':'none';
    playBtn.setAttribute('aria-label',p?'Play story':'Pause story');
  }
  steps.forEach(s=>s.addEventListener('click',()=>{userPaused=true;setPaused(true);go(+s.dataset.i)}));
  playBtn.addEventListener('click',()=>{userPaused=!userPaused;setPaused(userPaused)});
  var prevBtn=root.querySelector('#pprev'),nextBtn=root.querySelector('#pnext');
  function stepBy(d){ userPaused=true; setPaused(true); go(cur+d); }
  if(prevBtn) prevBtn.addEventListener('click',()=>stepBy(-1));
  if(nextBtn) nextBtn.addEventListener('click',()=>stepBy(1));
  const stage=root.querySelector('#stage');
  stage.addEventListener('mouseenter',()=>{if(!reduce)setPaused(true)});
  stage.addEventListener('mouseleave',()=>{if(!reduce&&!userPaused)setPaused(false)});
  document.addEventListener('visibilitychange',()=>{if(document.hidden)setPaused(true)});

  /* ---- scroll-driven storytelling (desktop + mobile pin): map scroll progress
     through the pinned track to the 6 story steps, then slide the lower
     sections into view for the tail of the pin - all in-process now, no
     postMessage/iframe boundary needed. ---- */
  var lastStep=-1, ticking=false, revealedPlayer=false, revealedAll=false;
  function scrollUpdate(){
    ticking=false;
    if(window.innerHeight>=1200||(document.documentElement.className+' '+document.body.className).indexOf('ee-embed-mode')!==-1) return;
    var pinEl=track.querySelector('.een-pin');
    var total=track.offsetHeight - (pinEl?pinEl.offsetHeight:(window.innerHeight||document.documentElement.clientHeight));
    if(total<=0) return;
    var top=track.getBoundingClientRect().top;
    var p=Math.min(1,Math.max(0, -top/total));
    /* deterministic reveals: the lower sections (.flow/.band) are clipped by
       the pin box until the tail-of-pin slide, so IntersectionObserver alone
       can miss them - force their .rev fade-ins from scroll progress */
    if(!revealedPlayer && p>0.01){ revealedPlayer=true; root.querySelectorAll('.player .rev').forEach(function(el){el.classList.add('in')}); }
    if(!revealedAll && p>STORY-0.1){ revealedAll=true; root.querySelectorAll('.rev').forEach(function(el){el.classList.add('in')}); }
    var sp=Math.min(1,p/STORY);
    var i=Math.min(N-1, Math.floor(sp*N + 0.0001));
    if(i!==lastStep){ lastStep=i; userPaused=true; setPaused(true); go(i); }
    var m=root.scrollHeight-stageWrap.clientHeight;
    var t=p<=STORY?0:(p-STORY)/(1-STORY);
    root.style.transform=m>0?'translateY('+(-Math.round(t*m))+'px)':'';
  }
  function onScroll(){ if(!ticking){ ticking=true; requestAnimationFrame(scrollUpdate); } }
  window.addEventListener('scroll',onScroll,{passive:true});
  window.addEventListener('resize',onScroll,{passive:true});

  /* play the story only while it's on screen */
  if('IntersectionObserver' in window){
    new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ if(!userPaused)setPaused(false); } else { setPaused(true); } }); },{rootMargin:'120px 0px'}).observe(stageWrap);
  }

  render(0);
  onScroll();
  window.addEventListener('resize',function(){ clearTimeout(root.__ft); root.__ft=setTimeout(function(){ sizeStage(); fitShot(); },120); },{passive:true});
  window.addEventListener('load',function(){ sizeStage(); fitShot(); });
  setTimeout(function(){ sizeStage(); fitShot(); },900);
  if(reduce){setPaused(true)}else{raf=requestAnimationFrame(loop)}
})();
</script>
<!-- ===================== /EE · WHILE YOUR CAMPUS SLEEPS ===================== -->


<div class="section-divider"></div>

<!-- ===================== VIDYA AI · STICKY SCROLLYTELLING + MORPHING DASHBOARD ===================== -->
<!-- ===================== VidyaAI scroll story - scoped #vidya ===================== -->
<style>#vidya{
  --navy:#19345d; --navy-2:#27497d; --ink:#1c2a3f; --muted:#5d6d86;
  --line:#e3e9f2; --paper:#f6f8fc;
  --orange:#DE6E30; --orange-soft:#fff1e9;
  --teal:#0f4ba4; --teal-soft:#e6f7f3;
  --gold:#ea6a08; --blue:#2f69c0; --green:#164ea3; --red:#e08b4a;
  --sh-sm:0 1px 2px rgba(25,52,93,.06);
  --sh-md:0 10px 30px -12px rgba(25,52,93,.18);
  --sh-lg:0 30px 70px -25px rgba(25,52,93,.35);
  --r-lg:20px; --r-md:14px; --r-sm:9px;
  --font-d:'Inter',sans-serif;
  --font-b:'Inter',sans-serif;
  --font-m:'Inter',sans-serif;
  --vh100:100vh;
}
@supports (height:100dvh){#vidya{ --vh100:100dvh; }}#vidya *{box-sizing:border-box;margin:0;padding:0}#vidya{scroll-behavior:smooth;-webkit-text-size-adjust:100%}#vidya{font-family:var(--font-b);color:var(--ink);background:var(--paper);-webkit-font-smoothing:antialiased}#vidya button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit;-webkit-tap-highlight-color:transparent}#vidya img,#vidya svg,#vidya img.eeimg{max-width:100%}#vidya :focus-visible{outline:3px solid rgba(222,110,48,.55);outline-offset:2px;border-radius:8px}#vidya{position:relative;background:
    radial-gradient(1100px 500px at 85% -5%, rgba(222,110,48,.07), transparent 60%),
    radial-gradient(900px 600px at -10% 105%, rgba(15,75,164,.07), transparent 55%),
    var(--paper);}#vidya::before{content:"";position:absolute;inset:0;pointer-events:none;opacity:.5;
  background-image:linear-gradient(var(--line) 1px,transparent 1px),linear-gradient(90deg,var(--line) 1px,transparent 1px);
  background-size:64px 64px;
  mask-image:radial-gradient(ellipse 70% 45% at 50% 22%,#000 25%,transparent 75%);
  -webkit-mask-image:radial-gradient(ellipse 70% 45% at 50% 22%,#000 25%,transparent 75%);}#vidya .wrap{position:relative;max-width:1240px;margin:0 auto;padding:0 clamp(16px,3vw,24px)}.vx-progress{position:fixed;top:0;left:0;right:0;height:3px;z-index:90;pointer-events:none;opacity:0;transition:opacity .3s}.vx-progress.show{opacity:1}.vx-progress i{display:block;height:100%;width:0;background:linear-gradient(90deg,#DE6E30,#ea6a08);box-shadow:0 0 12px rgba(222,110,48,.5)}.vx-toast{position:fixed;left:50%;bottom:max(22px,env(safe-area-inset-bottom));transform:translate(-50%,16px);z-index:95;
  background:#19345d;color:#fff;font-size:13px;font-weight:600;border-radius:99px;padding:10px 18px;box-shadow:0 30px 70px -25px rgba(25,52,93,.35);
  opacity:0;pointer-events:none;transition:opacity .3s,transform .3s;max-width:90vw;text-align:center}.vx-toast.show{opacity:1;transform:translate(-50%,0)}#vidya .vx-head{max-width:760px;margin-inline:auto;text-align:center;padding:clamp(56px,9vw,110px) 0 clamp(24px,4vw,48px)}#vidya .vx-eyebrow{display:inline-flex;align-items:center;gap:9px;font-size:11.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--orange);background:var(--orange-soft);border:1px solid #fbd4bd;padding:7px 13px;border-radius:99px}#vidya .vx-eyebrow .pulse{width:7px;height:7px;border-radius:50%;background:var(--orange);position:relative;flex:none}#vidya .vx-eyebrow .pulse::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:2px solid var(--orange);opacity:.5;animation:vx-ping 1.8s ease-out infinite}
@keyframes vx-ping{0%{transform:scale(.4);opacity:.7}80%,100%{transform:scale(1.4);opacity:0}}#vidya .vx-h2{font-family:var(--font-d);font-weight:760;font-size:clamp(27px,4.4vw,52px);line-height:1.08;letter-spacing:-.02em;color:var(--navy);margin:16px 0 13px;text-wrap:balance}#vidya .vx-h2 em{font-style:normal;color:var(--orange);position:relative}#vidya .vx-h2 em svg,#vidya .vx-h2 em img.eeimg{position:absolute;left:0;bottom:-.14em;width:100%;height:.32em;pointer-events:none}#vidya .vx-h2 em svg path,#vidya .vx-h2 em img.eeimg path{stroke:var(--orange);stroke-width:7;fill:none;stroke-linecap:round;opacity:.45;stroke-dasharray:600;stroke-dashoffset:600;animation:vx-draw 1.1s .5s ease forwards}
@keyframes vx-draw{to{stroke-dashoffset:0}}#vidya .vx-lead{font-size:clamp(14.5px,1.5vw,18px);line-height:1.65;color:var(--muted);max-width:600px;margin-inline:auto}#vidya .vx-lead b{color:var(--navy)}#vidya .vx-hint{display:inline-flex;align-items:center;gap:10px;margin-top:20px;font-family:var(--font-m);font-size:10.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--navy)}#vidya .vx-hint .mouse{width:20px;height:32px;border:2px solid var(--navy);border-radius:12px;position:relative;flex:none}#vidya .vx-hint .mouse::after{content:"";position:absolute;left:50%;top:6px;width:3px;height:7px;margin-left:-1.5px;border-radius:3px;background:var(--orange);animation:vx-scrollDot 1.6s ease-in-out infinite}
@keyframes vx-scrollDot{0%{transform:translateY(0);opacity:1}70%{transform:translateY(10px);opacity:0}100%{opacity:0}}#vidya .vx-scrolly{position:relative}#vidya .vx-grid{display:grid;grid-template-columns:minmax(290px,400px) 1fr;gap:clamp(24px,4vw,64px);align-items:start}#vidya .vx-rail{display:flex;flex-direction:column}#vidya .vx-trigger{min-height:92vh;min-height:92svh;display:flex;align-items:center;padding:6vh 0}#vidya .vx-trigger:first-child{min-height:76vh;min-height:76svh;padding-top:0}#vidya .vx-trigger:last-child{min-height:96vh;min-height:96svh}#vidya .vx-step{position:relative;width:100%;display:grid;grid-template-columns:46px 1fr;gap:15px;align-items:start;text-align:left;
  padding:20px 22px 20px 27px;border-radius:var(--r-md);background:#fff;border:1px solid var(--line);box-shadow:var(--sh-sm);
  opacity:.35;transform:translateY(26px) scale(.97);filter:saturate(.4);cursor:pointer;
  transition:opacity .5s cubic-bezier(.4,0,.2,1),transform .5s cubic-bezier(.4,0,.2,1),filter .5s,box-shadow .5s,border-color .5s}#vidya .vx-step .num{width:46px;height:46px;border-radius:13px;display:grid;place-items:center;font-family:var(--font-m);font-size:14px;font-weight:600;background:#eaeff7;color:var(--muted);transition:all .45s;flex:none}#vidya .vx-step .tt{font-family:var(--font-d);font-weight:700;font-size:clamp(16px,1.6vw,20px);color:var(--navy);line-height:1.2}#vidya .vx-step .dd{font-size:13.5px;line-height:1.6;color:var(--muted);margin-top:7px}#vidya .vx-step .vkpi{display:inline-flex;align-items:center;gap:5px;margin-top:11px;font-family:var(--font-m);font-size:10.5px;font-weight:600;color:var(--teal);background:var(--teal-soft);padding:4px 10px;border-radius:6px;opacity:0;transform:translateY(6px);transition:all .5s .15s}#vidya .vx-step .bar{position:absolute;left:0;top:14px;bottom:14px;width:4px;border-radius:4px;background:#edf1f8;overflow:hidden}#vidya .vx-step .bar i{display:block;width:100%;height:0;background:linear-gradient(var(--orange),#f4824d)}#vidya .vx-step.on{opacity:1;transform:none;filter:none;border-color:#dbe4f0;box-shadow:var(--sh-md)}#vidya .vx-step.on .num{background:var(--navy);color:#fff;box-shadow:0 8px 18px -7px rgba(25,52,93,.55)}#vidya .vx-step.on .vkpi{opacity:1;transform:none}#vidya .vx-step.done{opacity:.55;filter:none;transform:none}#vidya .vx-step.done .num{background:var(--teal-soft);color:var(--teal)}#vidya .vx-step.done .num::before{content:"✓";font-size:15px}#vidya .vx-step.done .num span{display:none}#vidya .vx-stage{position:sticky;top:0;height:var(--vh100);display:flex;flex-direction:column;justify-content:center;padding:20px 0;min-width:0}#vidya .vx-device{background:#fff;border:1px solid var(--line);border-radius:var(--r-lg);box-shadow:var(--sh-lg);overflow:hidden;will-change:transform}#vidya .vx-chrome{display:flex;align-items:center;gap:12px;padding:11px 14px;border-bottom:1px solid var(--line);background:linear-gradient(#fbfcfe,#f4f7fb);position:relative}#vidya .vx-chrome .dots{display:flex;gap:6px;flex:none}#vidya .vx-chrome .dots i{width:10px;height:10px;border-radius:50%}#vidya .vx-chrome .dots i:nth-child(1){background:#ffa057}#vidya .vx-chrome .dots i:nth-child(2){background:#fe882e}#vidya .vx-chrome .dots i:nth-child(3){background:#2868c8}#vidya .vx-url{flex:1;min-width:0;display:flex;align-items:center;gap:7px;background:#fff;border:1px solid var(--line);border-radius:8px;padding:6px 11px;font-family:var(--font-m);font-size:10.5px;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#vidya .vx-url .lock{color:var(--green);flex:none}#vidya .vx-live{display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:700;letter-spacing:.1em;color:var(--red);background:#fdecea;border:1px solid #f8ddc9;border-radius:99px;padding:4px 10px;flex:none}#vidya .vx-live i{width:6px;height:6px;border-radius:50%;background:var(--red);animation:vx-blink 1.2s infinite}
@keyframes vx-blink{50%{opacity:.25}}#vidya .vx-viewprog{position:absolute;left:0;bottom:-1px;height:2px;width:0;background:linear-gradient(90deg,var(--orange),var(--gold))}#vidya .vx-body{position:relative;height:min(56vh,520px);min-height:390px;background:#fbfcfe}#vidya .vx-view{position:absolute;inset:0;padding:clamp(14px,2.4vw,26px);opacity:0;visibility:hidden;will-change:transform,opacity;
  overflow-y:auto;overflow-x:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior:contain;scrollbar-width:thin;scrollbar-color:#c9d4e4 transparent}#vidya .vx-view::-webkit-scrollbar{width:5px}#vidya .vx-view::-webkit-scrollbar-thumb{background:#c9d4e4;border-radius:5px}#vidya .vx-view.on{opacity:1;visibility:visible;z-index:2}#vidya .vx-cap{display:flex;gap:12px;align-items:flex-start;margin-top:13px;padding:12px 16px;background:#fff;border:1px solid var(--line);border-radius:var(--r-md);box-shadow:var(--sh-sm)}#vidya .vx-cap .ic{flex:none;width:34px;height:34px;border-radius:10px;background:var(--orange-soft);display:grid;place-items:center;font-size:16px}#vidya .vx-cap p{font-size:13px;line-height:1.55;color:var(--muted)}#vidya .vx-cap p b{color:var(--navy)}#vidya .vx-dots{display:flex;gap:7px;justify-content:center;margin-top:13px}#vidya .vx-dots button{width:10px;height:10px;border-radius:99px;background:#cfd9e8;transition:all .35s cubic-bezier(.4,0,.2,1);padding:0;position:relative}#vidya .vx-dots button::after{content:"";position:absolute;inset:-7px}#vidya .vx-dots button.on{width:28px;background:var(--orange)}#vidya .dx-top{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-bottom:14px;flex-wrap:wrap}#vidya .dx-top h4{font-family:var(--font-d);font-size:15.5px;font-weight:700;color:var(--navy)}#vidya .dx-top .tag{font-family:var(--font-m);font-size:9.5px;font-weight:600;letter-spacing:.08em;color:var(--blue);background:#eaf2fc;border-radius:6px;padding:5px 9px;white-space:nowrap}#vidya .dx-kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:9px}#vidya .dx-kpi{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:12px 13px;position:relative;overflow:hidden;min-width:0}#vidya .dx-kpi::after{content:"";position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--kc,var(--orange))}#vidya .dx-kpi .h{font-size:10px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);display:flex;align-items:center;gap:5px;white-space:nowrap;overflow:hidden}#vidya .dx-kpi .big{font-family:var(--font-d);font-size:clamp(18px,2.1vw,25px);font-weight:760;color:var(--navy);margin:4px 0 3px;font-variant-numeric:tabular-nums}#vidya .dx-kpi .r{display:flex;justify-content:space-between;gap:6px;font-size:10.5px;color:var(--muted);white-space:nowrap}#vidya .dx-kpi .r b{color:var(--ink)}#vidya .dx-kpi .trend{font-family:var(--font-m);font-size:9.5px;font-weight:600;color:var(--green)}#vidya .dx-funnel{margin-top:14px;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:14px}#vidya .dx-funnel .fh{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:12px}#vidya .dx-funnel .fh b{font-size:12.5px;color:var(--navy)}#vidya .dx-funnel .fh span{font-family:var(--font-m);font-size:9.5px;color:var(--muted);white-space:nowrap}#vidya .dx-frow{display:grid;grid-template-columns:minmax(64px,92px) 1fr 46px;align-items:center;gap:9px;margin-bottom:8px;font-size:11px}#vidya .dx-frow .lbl{color:var(--muted);text-align:right;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#vidya .dx-frow .trk{height:17px;background:#eef2f8;border-radius:5px;overflow:hidden}#vidya .dx-frow .trk i{display:block;height:100%;width:0;border-radius:5px;background:var(--fc)}#vidya .dx-frow .val{font-family:var(--font-m);font-size:10.5px;font-weight:600;color:var(--navy);font-variant-numeric:tabular-nums;text-align:right}#vidya .lx-tabs{display:flex;gap:6px;overflow-x:auto;scrollbar-width:none;padding-bottom:2px}#vidya .lx-tabs::-webkit-scrollbar{display:none}#vidya .lx-tab{flex:none;font-size:11.5px;font-weight:600;color:var(--muted);background:#fff;border:1px solid var(--line);border-radius:8px;padding:7px 12px;transition:.2s}#vidya .lx-tab:hover{border-color:#c8d3e4}#vidya .lx-tab.on{color:#fff;background:var(--navy);border-color:var(--navy)}#vidya .lx-row{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:12px 14px;margin-top:10px;transition:.3s}#vidya .lx-row.hot{border-color:#f9c4a6;background:linear-gradient(#fff,#fffaf6)}#vidya .lx-head{display:flex;align-items:center;gap:9px;flex-wrap:wrap}#vidya .lx-av{width:30px;height:30px;border-radius:9px;display:grid;place-items:center;font-family:var(--font-m);font-size:10px;font-weight:600;color:#fff;background:var(--av,#7c91b0);flex:none}#vidya .lx-name{font-weight:600;font-size:13px;color:var(--navy)}#vidya .lx-meta{font-family:var(--font-m);font-size:10px;color:var(--muted)}#vidya .lx-badge{font-size:9.5px;font-weight:700;letter-spacing:.04em;color:#fff;border-radius:6px;padding:3px 8px;margin-left:auto;white-space:nowrap}#vidya .lx-ai{display:flex;gap:9px;margin-top:10px;padding:10px 12px;background:#f4f8ff;border:1px solid #dde9fb;border-radius:8px;font-size:12px;line-height:1.55;color:var(--ink)}#vidya .lx-ai .who{flex:none;font-family:var(--font-m);font-size:9.5px;font-weight:600;color:var(--blue);background:#fff;border:1px solid #dde9fb;border-radius:5px;padding:2px 7px;height:fit-content;margin-top:1px}#vidya .lx-ai .cursor{display:inline-block;width:7px;height:13px;background:var(--blue);vertical-align:-2px;animation:vx-blink 1s steps(1) infinite}#vidya .lx-act{display:flex;gap:7px;margin-top:10px;flex-wrap:wrap}#vidya .lx-btn{font-size:11px;font-weight:600;border-radius:7px;padding:7px 11px;border:1px solid var(--line);color:var(--navy);background:#fff;transition:.2s}#vidya .lx-btn:hover{border-color:var(--orange);color:var(--orange)}#vidya .lx-btn:active{transform:scale(.96)}#vidya .lx-btn.pri{background:var(--orange);border-color:var(--orange);color:#fff}#vidya .lx-btn.pri:hover{background:#c45a22;color:#fff}#vidya .sx-grid{display:grid;grid-template-columns:168px 1fr;gap:14px;align-items:stretch}#vidya .sx-ring{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:16px 12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px}#vidya .sx-ring svg,#vidya .sx-ring img.eeimg{transform:rotate(-90deg);width:118px;height:118px}#vidya .sx-ring .track{fill:none;stroke:#eef2f8;stroke-width:10}#vidya .sx-ring .fill{fill:none;stroke:url(#sxGrad);stroke-width:10;stroke-linecap:round;stroke-dasharray:339.3;stroke-dashoffset:339.3}#vidya .sx-ring .pct{font-family:var(--font-d);font-weight:760;font-size:26px;fill:var(--navy);transform:rotate(90deg);transform-origin:center}#vidya .sx-ring .scap{font-size:10.5px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);text-align:center}#vidya .sx-sigs{display:flex;flex-direction:column;gap:8px;min-width:0}#vidya .sx-sig{display:flex;align-items:center;gap:10px;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:10px 12px;font-size:12px;opacity:0;transform:translateX(18px)}#vidya .sx-sig .ic{flex:none;width:28px;height:28px;border-radius:8px;display:grid;place-items:center;font-size:13px;background:var(--sc,#eef2f8)}#vidya .sx-sig b{color:var(--navy)}#vidya .sx-sig .w{margin-left:auto;font-family:var(--font-m);font-size:10px;font-weight:600;color:var(--teal);flex:none}#vidya .sx-verdict{margin-top:12px;display:flex;align-items:center;gap:10px;background:linear-gradient(100deg,var(--navy),var(--navy-2));border-radius:var(--r-sm);padding:12px 15px;color:#fff;font-size:12.5px;line-height:1.5;opacity:0;transform:translateY(12px)}#vidya .sx-verdict b{color:#ffd9c2}#vidya .sx-verdict .zap{font-size:17px;flex:none}#vidya .fx-day{font-family:var(--font-m);font-size:10px;font-weight:600;letter-spacing:.1em;color:var(--muted);margin:13px 2px 7px}#vidya .fx-card{display:grid;grid-template-columns:auto 1fr auto;gap:11px;align-items:center;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:11px 13px;margin-bottom:8px;opacity:0;transform:translateY(14px)}#vidya .fx-card.due{border-color:#f9c4a6;background:linear-gradient(#fff,#fff8f3)}#vidya .fx-ic{width:33px;height:33px;border-radius:10px;display:grid;place-items:center;font-size:15px;background:var(--fic,#eef2f8);flex:none}#vidya .fx-tt{font-size:12.5px;font-weight:600;color:var(--navy);line-height:1.35}#vidya .fx-sub{font-size:11px;color:var(--muted);margin-top:2px;line-height:1.4}#vidya .fx-when{font-family:var(--font-m);font-size:9.5px;font-weight:600;color:var(--muted);text-align:right;white-space:nowrap}#vidya .fx-when.now{color:var(--orange)}#vidya .fx-auto{margin-top:12px;display:flex;align-items:center;gap:10px;font-size:11.5px;line-height:1.5;color:var(--muted);background:var(--teal-soft);border:1px dashed #9fb7dc;border-radius:var(--r-sm);padding:10px 13px;opacity:0;transform:translateY(14px)}#vidya .fx-auto b{color:var(--teal)}#vidya .cx{display:grid;grid-template-columns:198px 1fr;gap:14px;min-height:100%}#vidya .cx-card{background:linear-gradient(160deg,var(--navy),var(--navy-2));border-radius:var(--r-md);padding:20px 14px;color:#fff;display:flex;flex-direction:column;align-items:center;text-align:center;gap:11px;height:fit-content}#vidya .cx-ring{position:relative;width:58px;height:58px;border-radius:50%;background:rgba(255,255,255,.1);display:grid;place-items:center;flex:none}#vidya .cx-ring::before,#vidya .cx-ring::after{content:"";position:absolute;inset:0;border-radius:50%;border:2px solid rgba(222,110,48,.7);animation:vx-ping 2s ease-out infinite}#vidya .cx-ring::after{animation-delay:1s}#vidya .cx-ring svg,#vidya .cx-ring img.eeimg{width:22px;height:22px;color:#ffb38a;position:relative;z-index:1}#vidya .cx-num{font-family:var(--font-m);font-size:10.5px;color:#bfcfe6}#vidya .cx-tt{font-family:var(--font-d);font-size:13.5px;font-weight:700}#vidya .cx-waves{display:flex;align-items:center;gap:3px;height:24px}#vidya .cx-waves i{width:3px;border-radius:3px;background:var(--orange);animation:vx-wave 1s ease-in-out infinite}
@keyframes vx-wave{0%,100%{height:5px}50%{height:var(--h,20px)}}#vidya .cx-timer{font-family:var(--font-m);font-size:10.5px;color:#9fb3d0;background:rgba(255,255,255,.08);border-radius:6px;padding:3px 9px}#vidya .cx-script{display:flex;flex-direction:column;gap:8px;min-width:0}#vidya .cx-line{max-width:90%;font-size:12px;line-height:1.5;border-radius:11px;padding:9px 12px;opacity:0;transform:translateY(14px)}#vidya .cx-line.ai{align-self:flex-start;background:#fff;border:1px solid var(--line);color:var(--ink);border-bottom-left-radius:4px}#vidya .cx-line.ai b{color:var(--orange);font-family:var(--font-m);font-size:9px;font-weight:600;display:block;margin-bottom:2px;letter-spacing:.06em}#vidya .cx-line.hu{align-self:flex-end;background:var(--navy);color:#e9f0fa;border-bottom-right-radius:4px}#vidya .cx-line.sys{align-self:center;background:var(--teal-soft);border:1px solid #b6c9e6;color:var(--teal);font-family:var(--font-m);font-size:10px;font-weight:600;border-radius:99px;padding:5px 12px;text-align:center}#vidya .px-grid{display:grid;grid-template-columns:1fr 1fr;gap:11px}#vidya .px-card{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:14px;min-width:0}#vidya .px-card .h{font-size:10.5px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);margin-bottom:10px}#vidya .px-bars{display:flex;align-items:flex-end;gap:7px;height:86px;padding-top:16px}#vidya .px-bars i{flex:1;border-radius:5px 5px 2px 2px;background:linear-gradient(to top,#19345d,#3b6bb3);height:0;position:relative;min-width:0}#vidya .px-bars i.hot{background:linear-gradient(to top,#c45a22,var(--orange))}#vidya .px-bars i::after{content:attr(data-v);position:absolute;top:-16px;left:50%;transform:translateX(-50%);font-family:var(--font-m);font-size:8.5px;font-weight:600;color:var(--muted)}#vidya .px-leader{display:flex;flex-direction:column;gap:8px}#vidya .px-row{display:grid;grid-template-columns:auto 1fr auto;align-items:center;gap:9px;font-size:11.5px}#vidya .px-row .trk{height:7px;background:#eef2f8;border-radius:4px;overflow:hidden}#vidya .px-row .trk i{display:block;height:100%;width:0;background:var(--pc,var(--teal));border-radius:4px}#vidya .px-row .nm{font-weight:600;color:var(--navy);width:56px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#vidya .px-row .vl{font-family:var(--font-m);font-size:10px;font-weight:600;color:var(--muted);white-space:nowrap}#vidya .px-stats{grid-column:1/-1;display:grid;grid-template-columns:repeat(3,1fr);gap:9px}#vidya .px-stat{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:12px 8px;text-align:center;min-width:0}#vidya .px-stat .v{font-family:var(--font-d);font-size:clamp(16px,2vw,21px);font-weight:760;color:var(--navy);white-space:nowrap}#vidya .px-stat .v em{font-style:normal;font-size:12px;color:var(--green)}#vidya .px-stat .l{font-size:10px;color:var(--muted);margin-top:2px;line-height:1.35}#vidya .mx-head{text-align:center;max-width:430px;margin:0 auto 16px}#vidya .mx-head .eb{font-family:var(--font-m);font-size:10px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--orange)}#vidya .mx-head h4{font-family:var(--font-d);font-size:clamp(17px,2vw,21px);font-weight:760;color:var(--navy);margin:7px 0 6px}#vidya .mx-head p{font-size:12.5px;line-height:1.55;color:var(--muted)}#vidya .mx-locked{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}#vidya .mx-lk{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:10px 11px;font-size:11.5px;font-weight:600;color:var(--navy);opacity:0;transform:translateY(14px);cursor:pointer;min-width:0;transition:border-color .25s,box-shadow .25s}#vidya .mx-lk:hover{border-color:#c8d3e4;box-shadow:var(--sh-sm)}#vidya .mx-lk .ic{font-size:14px;flex:none}#vidya .mx-lk .nm{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#vidya .mx-lk .lock{margin-left:auto;font-size:11px;opacity:.45;flex:none}#vidya .mx-cta{margin-top:14px;display:flex;align-items:center;justify-content:space-between;gap:14px;background:linear-gradient(100deg,var(--navy),var(--navy-2));border-radius:var(--r-md);padding:16px 18px;color:#fff;opacity:0;transform:translateY(14px)}#vidya .mx-cta b{font-family:var(--font-d);font-size:14.5px;display:block}#vidya .mx-cta span{font-size:12px;color:#b9c8df;display:block;margin-top:3px;max-width:340px;line-height:1.5}#vidya .mx-btn{flex:none;display:inline-flex;align-items:center;gap:8px;background:var(--orange);color:#fff;font-weight:700;font-size:13px;border-radius:11px;padding:12px 19px;text-decoration:none;transition:.25s;box-shadow:0 10px 24px -8px rgba(222,110,48,.6)}#vidya .mx-btn:hover{background:#c45a22;transform:translateY(-2px)}#vidya .mx-btn svg,#vidya .mx-btn img.eeimg{width:14px;height:14px;transition:transform .25s}#vidya .mx-btn:hover svg,#vidya .mx-btn:hover img.eeimg{transform:translateX(3px)}#vidya .stg{transition:opacity .55s cubic-bezier(.3,.7,.3,1),transform .55s cubic-bezier(.3,.7,.3,1)}#vidya .stg.in{opacity:1;transform:none}#vidya .vx-proof{padding:clamp(36px,6vw,80px) 0;display:grid;grid-template-columns:repeat(4,1fr);gap:11px}#vidya .vx-pf{background:#fff;border:1px solid var(--line);border-radius:var(--r-md);padding:16px 18px;box-shadow:var(--sh-sm)}#vidya .vx-pf .v{font-family:var(--font-d);font-size:clamp(21px,2.6vw,30px);font-weight:760;color:var(--navy);font-variant-numeric:tabular-nums}#vidya .vx-pf .v em{font-style:normal;color:var(--orange)}#vidya .vx-pf .l{font-size:12px;color:var(--muted);margin-top:3px;line-height:1.45}#vidya .rv{opacity:0;transform:translateY(22px);transition:opacity .7s ease,transform .7s ease}#vidya .rv.in{opacity:1;transform:none}
@media (max-width:1120px){#vidya .vx-grid{grid-template-columns:minmax(260px,330px) 1fr}}
@media (max-width:920px){#vidya .vx-grid{display:block}#vidya .vx-stage{position:sticky;top:0;height:auto;z-index:8;padding:10px 0 8px;
    background:linear-gradient(var(--paper) 92%,rgba(246,248,252,0))}#vidya .vx-body{height:min(50vh,440px);height:min(50svh,440px);min-height:330px}#vidya .vx-cap{display:none}#vidya .vx-dots{margin-top:10px}#vidya .vx-rail{padding-top:8px}#vidya .vx-trigger{min-height:74vh;min-height:74svh;padding:5vh 0}#vidya .vx-trigger:first-child{min-height:62vh;min-height:62svh}#vidya .vx-trigger:last-child{min-height:86vh;min-height:86svh}#vidya .vx-step{grid-template-columns:38px 1fr;padding:17px 17px 17px 23px}#vidya .vx-step .num{width:38px;height:38px;border-radius:11px;font-size:12px}#vidya .sx-grid{grid-template-columns:150px 1fr}#vidya .vx-proof{grid-template-columns:repeat(2,1fr)}#vidya .mx-cta{flex-direction:column;align-items:flex-start}}
@media (max-width:640px){#vidya .dx-kpis{grid-template-columns:repeat(2,1fr)}#vidya .px-grid{grid-template-columns:1fr}#vidya .sx-grid{grid-template-columns:1fr}#vidya .sx-ring{flex-direction:row;justify-content:flex-start;gap:14px;padding:12px 14px}#vidya .sx-ring svg,#vidya .sx-ring img.eeimg{width:86px;height:86px;flex:none}#vidya .sx-ring .pct{font-size:30px}#vidya .cx{grid-template-columns:1fr}#vidya .cx-card{flex-direction:row;flex-wrap:wrap;text-align:left;justify-content:flex-start;padding:13px 14px;gap:10px}#vidya .cx-waves{margin-left:auto}#vidya .mx-locked{grid-template-columns:repeat(2,1fr)}#vidya .vx-live{display:none}#vidya .px-stats{grid-template-columns:repeat(3,1fr)}}
@media (max-width:400px){#vidya .vx-body{min-height:310px}#vidya .vx-view{padding:12px}#vidya .dx-frow{grid-template-columns:60px 1fr 40px}#vidya .lx-btn{padding:7px 9px;font-size:10.5px}#vidya .mx-locked{grid-template-columns:1fr 1fr}#vidya .px-stats{grid-template-columns:1fr 1fr;gap:8px}#vidya .vx-proof{grid-template-columns:1fr 1fr}}
@media (max-height:680px) and (min-width:921px){#vidya .vx-body{height:min(62vh,460px);min-height:340px}#vidya .vx-cap{display:none}#vidya .vx-stage{padding:12px 0}}
@media (max-height:540px) and (max-width:920px){#vidya .vx-body{height:58vh;min-height:260px}#vidya .vx-trigger{min-height:120vh}}
@media (prefers-reduced-motion:reduce){#vidya *,#vidya *::before,#vidya *::after{animation-duration:.001s!important;transition-duration:.001s!important}#vidya{scroll-behavior:auto}}
</style>
<noscript><style>#vidya .vx-view{position:static!important;opacity:1!important;visibility:visible!important;height:auto!important}#vidya .vx-body{height:auto!important}#vidya .vx-trigger{min-height:0!important;padding:14px 0!important}#vidya .vx-step{opacity:1!important;transform:none!important;filter:none!important}#vidya .stg{opacity:1!important;transform:none!important}#vidya .vx-stage{position:static!important;height:auto!important}#vidya .vx-hint,#vidya .vx-dots,.vx-progress{display:none!important}</style></noscript>

<div class="vx-progress" id="vxProgress" aria-hidden="true"><i></i></div>
<div class="vx-toast" id="vxToast" role="status" aria-live="polite"></div>

<!-- ===================== VIDYA AI · SCROLL STORYTELLING + STICKY SCROLL ANIMATION ===================== -->
<!-- ===================== COUNSELLOR · REAL-TIME STREAMING DASHBOARD ===================== -->
<!-- ===================== VIDYAGPT WIDGET ===================== -->
<!-- ===================== VidyaGPT · 24x7 AI Admission Agent (isolated iframe - pristine) ===================== -->
<style>#vidyagpt.vgpt-embed{padding:0;margin:0;border:0;background:#fff;overflow:hidden}#vidyagpt.vgpt-embed iframe{display:block;width:100%;border:0;background:#fff;height:920px}
@media(max-width:980px){#vidyagpt.vgpt-embed iframe{height:1480px}}
</style>

<!-- ===================== AUTOMATION · LIVE FLOW ===================== -->
<!-- ===================== AI Engine · Live Processing (isolated iframe - pristine) ===================== -->
<style>#automation.auto-embed{padding:0;margin:0;border:0;background:#fff;overflow:hidden}#automation.auto-embed iframe{display:block;width:100%;border:0;background:#fff;height:1400px}
@media(max-width:980px){#automation.auto-embed iframe{height:2050px}}
</style>

<!-- ===================== Mobile · AI Admission Journey (scoped .mx / #mobile) ===================== -->
<style>.mx{
  --org:#DE6E30; --org-dk:#C95F26; --org-soft:#FBEFE7; --org-line:rgba(222,110,48,.28);
  --navy:#19345d; --navy-2:#0f2547; --navy-soft:#EDF1F8;
  --bg:#fff; --txt:#19345d; --mut:#5a6e8c;
  --line:#E6EAF2; --line-2:#D5DCEA; --grn:#1f519d; --red:#d68445;
  --ff:"Inter",sans-serif;
  position:relative;background:var(--bg);color:var(--txt);font-family:var(--ff);
}.mx *{box-sizing:border-box;margin:0;padding:0}.mx button{font-family:var(--ff);cursor:pointer;-webkit-tap-highlight-color:transparent}.mx .bgfx{position:absolute;inset:-140px 0;pointer-events:none;
  background:
    radial-gradient(900px 480px at 84% 6%, rgba(222,110,48,.07), transparent 62%),
    radial-gradient(760px 480px at 6% 94%, rgba(25,52,93,.05), transparent 60%),
    repeating-linear-gradient(0deg, rgba(25,52,93,.03) 0 1px, transparent 1px 56px),
    repeating-linear-gradient(90deg, rgba(25,52,93,.03) 0 1px, transparent 1px 56px);
}.mx .wrap{max-width:1180px;margin:0 auto;padding:0 24px;position:relative;z-index:1}.mx .topbar{position:sticky;top:0;z-index:45;height:4px;background:var(--line)}.mx .topbar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--navy),var(--org))}.mx .intro{padding:88px 0 26px;text-align:center}.mx .eyebrow{display:inline-flex;align-items:center;gap:10px;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--org);border:1px solid var(--org-line);background:var(--org-soft);padding:8px 16px;border-radius:999px}.mx .eyebrow .pulse{width:8px;height:8px;border-radius:50%;background:var(--grn);box-shadow:0 0 0 0 rgba(31,81,157,.5);animation:mxPulse 2s infinite}
@keyframes mxPulse{70%{box-shadow:0 0 0 9px rgba(31,81,157,0)}100%{box-shadow:0 0 0 0 rgba(31,81,157,0)}}.mx h2{font-weight:800;font-size:clamp(30px,4.4vw,52px);line-height:1.08;letter-spacing:-.028em;margin:20px auto 14px;color:var(--navy);max-width:19ch}.mx h2 .hl{color:var(--org);position:relative}.mx h2 .hl::after{content:"";position:absolute;left:0;right:0;bottom:.02em;height:.16em;background:var(--org-soft);z-index:-1;border-radius:3px}.mx .lead{font-size:clamp(15px,1.6vw,17px);line-height:1.65;color:var(--mut);max-width:62ch;margin:0 auto}.mx .lead b{color:var(--navy);font-weight:600}.mx .scrollhint{margin:24px auto 0;display:flex;flex-direction:column;align-items:center;gap:6px;color:var(--mut);font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase}.mx .scrollhint i{width:22px;height:34px;border:2px solid var(--line-2);border-radius:12px;position:relative;font-style:normal}.mx .scrollhint i::after{content:"";position:absolute;left:50%;top:6px;width:4px;height:7px;margin-left:-2px;border-radius:3px;background:var(--org);animation:wheel 1.6s ease-in-out infinite}
@keyframes wheel{0%{transform:translateY(0);opacity:1}70%{transform:translateY(11px);opacity:0}100%{opacity:0}}.mx .scrolly{display:grid;grid-template-columns:1.02fr .98fr;gap:48px;align-items:stretch}.mx #mxSpacer{display:none}.mx .stepscol{position:relative;z-index:2}.mx .step{min-height:94vh;display:flex;align-items:center;width:100%}.mx .stepcard{position:relative;border:1.5px solid var(--line);border-radius:24px;background:#fff;padding:28px 28px 26px;width:100%;max-width:520px;box-shadow:0 10px 30px rgba(25,52,93,.06);transition:border-color .45s,box-shadow .45s,transform .45s,opacity .45s;opacity:.45;transform:scale(.97);cursor:pointer}.mx .step.act .stepcard{opacity:1;transform:scale(1);border-color:var(--org-line);box-shadow:0 24px 60px rgba(222,110,48,.14),0 8px 24px rgba(25,52,93,.08)}.mx .stepcard .bignum{position:absolute;top:14px;right:20px;font-size:clamp(42px,5vw,64px);font-weight:800;letter-spacing:-.04em;color:var(--navy-soft);line-height:1;transition:color .45s;user-select:none}.mx .step.act .stepcard .bignum{color:var(--org-soft)}.mx .stepcard .ai{display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:800;letter-spacing:.1em;color:var(--org);background:var(--org-soft);border:1px solid var(--org-line);border-radius:7px;padding:4px 9px;margin-bottom:12px}.mx .stepcard .ai.hum{color:var(--navy);background:var(--navy-soft);border-color:var(--line-2)}.mx .stepcard h3{font-size:clamp(19px,2vw,25px);font-weight:800;letter-spacing:-.02em;color:var(--navy);max-width:18ch;line-height:1.2}.mx .stepcard p{font-size:14px;line-height:1.65;color:var(--mut);margin-top:10px;max-width:46ch}.mx .stepcard p b{color:var(--navy);font-weight:700}.mx .metric{display:flex;align-items:baseline;gap:8px;margin-top:16px;border-top:1px dashed var(--line-2);padding-top:14px;flex-wrap:wrap}.mx .metric b{font-size:clamp(19px,2vw,24px);font-weight:800;color:var(--org);letter-spacing:-.02em}.mx .metric span{font-size:12px;color:var(--mut);font-weight:600}.mx .stepbar{position:absolute;left:28px;right:28px;bottom:12px;height:3px;border-radius:2px;background:var(--line);overflow:hidden;opacity:0;transition:opacity .3s}.mx .step.act .stepbar{opacity:1}.mx .stepbar i{display:block;height:100%;width:0;background:var(--org);border-radius:2px}.mx .stickycol{position:relative}.mx .sticky{position:sticky;top:max(20px,calc(50vh - 372px));display:flex;justify-content:center;gap:18px;padding:10px 0}.mx .glow{position:absolute;inset:4%;border-radius:50%;background:radial-gradient(closest-side,rgba(222,110,48,.13),transparent 72%);filter:blur(30px);z-index:0}.mx .rail{display:flex;flex-direction:column;align-items:center;padding-top:54px;z-index:2}.mx .railline{width:3px;flex:1;background:var(--line);border-radius:2px;position:relative;margin:6px 0}.mx .railline i{position:absolute;top:0;left:0;right:0;height:0;background:linear-gradient(180deg,var(--navy),var(--org));border-radius:2px}.mx .rdot{width:32px;height:32px;border-radius:50%;border:2px solid var(--line-2);background:#fff;color:var(--mut);font-size:11px;font-weight:800;display:grid;place-items:center;transition:.35s;padding:0;flex:0 0 auto}.mx .rdot.done{border-color:var(--navy);color:var(--navy)}.mx .rdot.act{background:var(--org);border-color:var(--org);color:#fff;box-shadow:0 0 0 5px var(--org-soft);transform:scale(1.1)}.mx .pstage{position:relative;display:flex;justify-content:center;width:min(460px,100%)}.mx .journey{position:absolute;inset:-14px -6px;z-index:1;pointer-events:none}.mx .journey svg,.mx .journey img.eeimg{width:100%;height:100%}.mx .j-path{fill:none;stroke:rgba(25,52,93,.16);stroke-width:.7;stroke-dasharray:2 2.4}.mx .j-prog{fill:none;stroke:url(#mxJg);stroke-width:1.1;stroke-linecap:round;stroke-dasharray:100;stroke-dashoffset:100;transition:stroke-dashoffset .25s linear;filter:drop-shadow(0 0 4px rgba(222,110,48,.45))}.mx .j-node{position:absolute;transform:translate(-50%,-50%);display:flex;align-items:center;gap:8px;z-index:1}.mx .j-node .jd{width:13px;height:13px;border-radius:50%;background:#fff;border:2px solid var(--line-2);transition:.5s}.mx .j-node .jl{font-size:11px;font-weight:700;color:var(--mut);background:rgba(255,255,255,.94);border:1px solid var(--line);border-radius:8px;padding:4px 10px;white-space:nowrap;transition:.5s;box-shadow:0 4px 12px rgba(25,52,93,.1)}.mx .j-node.on .jd{background:var(--org);border-color:var(--org);box-shadow:0 0 12px rgba(222,110,48,.6)}.mx .j-node.on .jl{color:var(--navy);border-color:var(--org-line)}.mx .j-node.l{flex-direction:row-reverse}.mx .j-node.t,.mx .j-node.b{flex-direction:column}.mx .phone{position:relative;z-index:2;width:318px;border-radius:52px;padding:11px;background:linear-gradient(160deg,#2b4c7e,var(--navy) 40%,var(--navy-2));box-shadow:0 0 0 1.5px rgba(25,52,93,.25),0 44px 90px rgba(25,52,93,.32),0 12px 30px rgba(25,52,93,.22);perspective:1600px;-webkit-perspective:1600px}.mx .flip{position:relative;height:622px;transform-style:preserve-3d;-webkit-transform-style:preserve-3d;transition:transform .9s cubic-bezier(.4,.05,.2,1)}.mx .flip.flipped{transform:rotateY(180deg)}.mx .screen{position:relative;height:100%;border-radius:42px;overflow:hidden;background:linear-gradient(175deg,#1e3c68 0%,var(--navy) 55%,var(--navy-2) 100%);display:flex;flex-direction:column;color:#fff;backface-visibility:hidden;-webkit-backface-visibility:hidden}.mx .island{position:absolute;top:11px;left:50%;transform:translateX(-50%);z-index:6;width:108px;height:30px;border-radius:18px;background:#0a1930;display:flex;align-items:center;justify-content:center;gap:8px}.mx .island i{display:block;border-radius:4px;background:#1a2f4f}.mx .island .s1{width:34px;height:5px}.mx .island .s2{width:9px;height:9px;border-radius:50%;background:#13294a;box-shadow:inset 0 0 3px #DE6E30}.mx .sbar{display:flex;justify-content:space-between;align-items:center;padding:16px 26px 4px;font-size:12.5px;font-weight:600}.mx .sig{display:flex;align-items:flex-end;gap:2px}.mx .sig i{width:3px;background:#fff;border-radius:1px;display:block}.mx .phead{display:flex;justify-content:space-between;align-items:center;padding:8px 16px 6px;gap:8px}.mx .ptitle{font-size:12px;font-weight:700;display:flex;align-items:center;gap:8px;min-width:0}.mx .aichip{font-size:9px;font-weight:800;letter-spacing:.1em;color:#FFB28A;border:1px solid rgba(222,110,48,.5);background:rgba(222,110,48,.18);border-radius:7px;padding:4px 9px;display:flex;align-items:center;gap:5px;white-space:nowrap}.mx .aichip i{width:6px;height:6px;border-radius:50%;background:var(--org);animation:mxBlink 1.1s infinite}
@keyframes mxBlink{50%{opacity:.25}}.mx .pfoot{display:flex;align-items:center;justify-content:space-between;padding:9px 18px 14px;border-top:1px solid rgba(255,255,255,.1);background:rgba(10,25,48,.5);font-size:10px;font-weight:800;letter-spacing:.08em;color:#a9bbd6}.mx .pfoot b{color:#fff}.mx .pfoot .sync{display:flex;align-items:center;gap:6px;color:#FFB28A}.mx .spin{width:10px;height:10px;border-radius:50%;border:1.5px solid rgba(222,110,48,.3);border-top-color:var(--org);animation:mxSpin 1s linear infinite}
@keyframes mxSpin{to{transform:rotate(360deg)}}.mx .scenes{flex:1;position:relative;min-height:0}.mx .scene{position:absolute;inset:0;display:flex;flex-direction:column;padding:8px 16px 12px;overflow:hidden;opacity:0;transform:translateY(26px) scale(.98);transition:opacity .5s,transform .5s cubic-bezier(.2,.8,.2,1);pointer-events:none}.mx .scene.act{opacity:1;transform:none}.mx .cap{font-size:10px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:#a9bbd6;margin:2px 2px 10px}.mx .cap em{font-style:normal;color:#FFB28A}.mx .wcard{background:rgba(255,255,255,.97);border-radius:16px;padding:13px;color:var(--navy);box-shadow:0 8px 20px rgba(10,25,48,.3)}.mx .fx{opacity:0;transform:translateY(14px) scale(.96);transition:opacity .5s,transform .5s cubic-bezier(.2,.9,.3,1.1)}.mx .fx.vis{opacity:1;transform:none}.mx .callbox{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px}.mx .callav{width:84px;height:84px;border-radius:50%;background:var(--org);display:grid;place-items:center;font-size:32px;font-weight:800;position:relative;animation:mxRing 1s ease-in-out infinite}.mx .callav::before,.mx .callav::after{content:"";position:absolute;inset:-10px;border-radius:50%;border:2px solid rgba(222,110,48,.45);animation:ripple 1.6s ease-out infinite}.mx .callav::after{animation-delay:.8s}
@keyframes ripple{from{transform:scale(.85);opacity:1}to{transform:scale(1.5);opacity:0}}
@keyframes mxRing{0%,100%{transform:rotate(0)}20%{transform:rotate(-6deg)}40%{transform:rotate(6deg)}60%{transform:rotate(-3deg)}80%{transform:rotate(3deg)}}.mx .scene[data-s="0"].miss .callav{animation:none;background:#56667e}.mx .scene[data-s="0"].miss .callav::before,.mx .scene[data-s="0"].miss .callav::after{animation:none;opacity:0}.mx .callbox b{font-size:17px}.mx .callbox small{color:#a9bbd6;font-size:12px}.mx .missed{margin-top:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#ffc79d;background:rgba(214,132,69,.18);border:1px solid rgba(214,132,69,.4);border-radius:8px;padding:6px 14px}.mx .s1note{text-align:center;font-size:11px;color:#8a9bb5;line-height:1.6}.mx .fline{display:flex;justify-content:space-between;align-items:center;padding:7px 0;border-bottom:1px dashed var(--line);gap:10px}.mx .fline:last-child{border-bottom:0}.mx .fline span{font-size:10.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--mut)}.mx .fline b{font-size:12.5px;font-weight:700;min-height:16px;text-align:right}.mx .fline b.typingnow::after{content:"▍";color:var(--org);animation:mxBlink .7s infinite}.mx .stamp{align-self:center;margin-top:12px;font-size:11px;font-weight:800;color:#fff;background:var(--grn);border-radius:999px;padding:7px 16px;display:flex;gap:7px;align-items:center}.mx .scorewrap{display:flex;gap:14px;align-items:center}.mx .dial{flex:0 0 92px;height:92px;border-radius:50%;display:grid;place-items:center;background:conic-gradient(var(--org) calc(var(--p,0)*1%), var(--navy-soft) 0);position:relative}.mx .dial::before{content:"";position:absolute;inset:9px;border-radius:50%;background:#fff}.mx .dial b{position:relative;font-size:21px;font-weight:800;color:var(--org)}.mx .dial small{position:absolute;bottom:17px;font-size:8px;letter-spacing:.08em;text-transform:uppercase;color:var(--mut);font-weight:700}.mx .signals{flex:1;display:flex;flex-direction:column;gap:7px}.mx .sig2{display:flex;gap:8px;align-items:center;font-size:11.5px;font-weight:600;color:var(--navy)}.mx .sig2 i{flex:0 0 17px;height:17px;border-radius:50%;background:#E7F6EF;border:1px solid rgba(31,81,157,.35);display:grid;place-items:center;font-size:9px;font-style:normal;color:var(--grn)}.mx .verdict{margin-top:10px;font-size:11.5px;font-weight:800;color:var(--org);background:var(--org-soft);border:1px solid var(--org-line);border-radius:10px;padding:8px 12px;text-align:center}.mx .crow{display:flex;gap:10px;align-items:center;background:rgba(255,255,255,.97);border-radius:13px;padding:10px 12px;color:var(--navy);box-shadow:0 6px 14px rgba(10,25,48,.25);border:2px solid transparent;transition:border-color .4s,transform .4s}.mx .crow+.crow{margin-top:8px}.mx .crow .cav{flex:0 0 32px;height:32px;border-radius:10px;background:var(--navy);color:#fff;display:grid;place-items:center;font-weight:800;font-size:12px;transition:background .4s}.mx .crow b{font-size:12.5px;display:block}.mx .crow small{font-size:10.5px;color:var(--mut)}.mx .crow .pct{margin-left:auto;font-size:12.5px;font-weight:800;color:var(--mut);transition:color .4s}.mx .crow.win{border-color:var(--org);transform:translateX(4px)}.mx .crow.win .pct{color:var(--org)}.mx .crow.win .cav{background:var(--org)}.mx .why{display:flex;gap:6px;flex-wrap:wrap;margin-top:10px}.mx .why i{font-style:normal;font-size:10px;font-weight:700;color:var(--navy);background:rgba(255,255,255,.94);border-radius:7px;padding:5px 9px}.mx .chat{flex:1;display:flex;flex-direction:column;gap:8px;padding-top:2px}.mx .bub{max-width:86%;background:#fff;color:var(--navy);border-radius:14px 14px 14px 4px;padding:9px 12px;font-size:11.5px;line-height:1.5;box-shadow:0 6px 14px rgba(10,25,48,.25)}.mx .bub small{display:block;font-size:8.5px;color:#9aa9c0;text-align:right;margin-top:3px}.mx .bub .doc{display:flex;gap:8px;align-items:center;background:var(--navy-soft);border-radius:9px;padding:7px 9px;margin-top:7px;font-weight:700;font-size:11px}.mx .bub .doc i{font-style:normal;font-size:15px}.mx .botchip{align-self:flex-start;font-size:9px;font-weight:800;letter-spacing:.08em;color:#FFB28A;background:rgba(222,110,48,.18);border:1px solid rgba(222,110,48,.5);border-radius:6px;padding:3px 8px}.mx .sched{align-self:center;margin-top:auto;font-size:10.5px;font-weight:800;color:#fff;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);border-radius:999px;padding:7px 15px;text-align:center}.mx .donebox{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px;text-align:center;position:relative}.mx .bigok{width:78px;height:78px;border-radius:50%;background:#E7F6EF;border:2px solid rgba(31,81,157,.45);display:grid;place-items:center;font-size:32px}.mx .donebox b{font-size:17px}.mx .donebox small{color:#a9bbd6;font-size:11.5px}.mx .dstats{display:flex;gap:8px;margin-top:10px;width:100%}.mx .dstat{flex:1;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.16);border-radius:12px;padding:9px 4px}.mx .dstat b{font-size:16px;display:block}.mx .dstat span{font-size:8.5px;letter-spacing:.06em;text-transform:uppercase;color:#a9bbd6;font-weight:700}.mx .confetti{position:absolute;width:7px;height:7px;border-radius:2px;top:-10px;animation:fall 2.6s linear forwards;pointer-events:none}
@keyframes fall{to{transform:translateY(560px) rotate(540deg);opacity:0}}.mx .fmap{padding:70px 0 30px}.mx .fmap .mhead{text-align:center;margin-bottom:26px}.mx .fmap h3{font-size:clamp(24px,3vw,36px);font-weight:800;letter-spacing:-.025em;color:var(--navy)}.mx .fmap h3 em{font-style:normal;color:var(--org)}.mx .fmap .msub{font-size:14.5px;color:var(--mut);margin:10px auto 0;max-width:56ch;line-height:1.6}.mx .controls{display:flex;gap:16px;align-items:center;justify-content:center;flex-wrap:wrap;margin:22px 0 30px}.mx .modes{display:inline-flex;padding:5px;gap:4px;background:var(--navy-soft);border:1px solid var(--line);border-radius:14px}.mx .modes button{font-size:13px;font-weight:700;color:var(--mut);background:transparent;border:0;border-radius:10px;padding:10px 16px;transition:.25s;min-height:42px}.mx .modes button[aria-pressed="true"]{color:#fff;background:var(--navy);box-shadow:0 6px 16px rgba(25,52,93,.28)}.mx .modes button[aria-pressed="true"].ai-on{background:var(--org);box-shadow:0 6px 16px rgba(222,110,48,.35)}.mx .inqctl{display:flex;align-items:center;gap:12px;background:#fff;border:1px solid var(--line);border-radius:14px;padding:10px 16px;box-shadow:0 6px 18px rgba(25,52,93,.06)}.mx .inqctl label{font-size:11px;font-weight:800;letter-spacing:.07em;text-transform:uppercase;color:var(--mut)}.mx .inqctl input[type=range]{width:min(180px,38vw);accent-color:var(--org)}.mx .inqctl output{font-size:15px;font-weight:800;color:var(--navy);min-width:64px;text-align:right}.mx .funnel{display:grid;grid-template-columns:1fr 44px 1fr 44px 1fr 44px 1fr 44px 1fr;gap:0;align-items:stretch}.mx .fstage{border:1.5px solid var(--line);border-radius:18px;background:#fff;padding:16px 14px 14px;text-align:center;position:relative;transition:border-color .3s,box-shadow .3s,transform .3s;cursor:pointer;min-height:148px;display:flex;flex-direction:column;box-shadow:0 8px 22px rgba(25,52,93,.05)}.mx .fstage:hover{transform:translateY(-3px)}.mx .fstage.sel{border-color:var(--org);box-shadow:0 18px 44px rgba(222,110,48,.16)}.mx .fstage .fic{font-size:21px;line-height:1}.mx .fstage h4{font-size:12.5px;font-weight:800;color:var(--navy);margin-top:7px;letter-spacing:-.01em}.mx .fstage .cnt{font-size:clamp(20px,2.4vw,28px);font-weight:800;color:var(--navy);letter-spacing:-.02em;margin-top:5px}.mx .fstage.sel .cnt{color:var(--org)}.mx .fstage .fbar{height:6px;border-radius:3px;background:var(--navy-soft);overflow:hidden;margin-top:auto}.mx .fstage .fbar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--navy),var(--org));border-radius:3px;transition:width .8s cubic-bezier(.2,.8,.2,1)}.mx .fstage .aimk{position:absolute;top:-9px;left:50%;transform:translateX(-50%);font-size:8.5px;font-weight:800;letter-spacing:.1em;color:#fff;background:var(--org);border-radius:6px;padding:3px 8px;opacity:0;transition:opacity .3s;white-space:nowrap}.mx.aimode .fstage .aimk{opacity:1}.mx .fconn{position:relative;display:flex;align-items:center;justify-content:center}.mx .fconn::before{content:"";position:absolute;left:-2px;right:-2px;top:50%;height:2.5px;margin-top:-22px;background:repeating-linear-gradient(90deg,var(--line-2) 0 7px,transparent 7px 13px)}.mx.aimode .fconn::before{background:repeating-linear-gradient(90deg,var(--org) 0 7px,transparent 7px 13px);animation:flowx 1s linear infinite}
@keyframes flowx{to{background-position:13px 0}}.mx .fconn .arrow{position:absolute;top:50%;margin-top:-27px;right:-3px;color:var(--org);font-size:12px;font-weight:800}.mx .loss{position:relative;z-index:1;font-size:9.5px;font-weight:800;color:var(--red);background:#FDECEC;border:1px solid rgba(214,132,69,.3);border-radius:7px;padding:4px 7px;margin-top:34px;white-space:nowrap;transition:.3s}.mx .loss.ok{color:var(--grn);background:#E7F6EF;border-color:rgba(31,81,157,.3)}.mx .fsummary{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-top:26px}.mx .fdstats{display:grid;grid-template-columns:repeat(3,1fr);gap:9px;margin-top:14px}.mx .fdstats>div{background:var(--navy-soft);border-radius:12px;padding:10px 8px;text-align:center;transition:background .3s}.mx.aimode .fdstats>div{background:var(--org-soft)}.mx .fdstats b{font-size:15px;font-weight:800;color:var(--navy);display:block;letter-spacing:-.01em}.mx .fdstats span{font-size:9px;letter-spacing:.05em;text-transform:uppercase;color:var(--mut);font-weight:700}.mx .fstage .cmp{display:block;font-size:9.5px;font-weight:700;color:var(--mut);margin:2px 0 7px}.mx.aimode .fstage .cmp{color:var(--grn)}.mx .fsum{border:1px solid var(--line);border-radius:16px;background:#FBFCFE;padding:16px;text-align:center}.mx .fsum b{font-size:clamp(20px,2.4vw,26px);font-weight:800;color:var(--navy);display:block;letter-spacing:-.02em}.mx .fsum b em{font-style:normal;color:var(--org)}.mx .fsum.win{border-color:var(--org-line);background:var(--org-soft)}.mx .fsum span{font-size:11px;color:var(--mut);letter-spacing:.05em;text-transform:uppercase;font-weight:700}.mx .fdetail{margin-top:18px;border:1.5px solid var(--org-line);border-radius:20px;background:#fff;padding:22px 24px;display:none;animation:dIn .35s both}.mx .fdetail.show{display:block}
@keyframes dIn{from{opacity:0;transform:translateY(12px)}}.mx .fdetail .dh{display:flex;align-items:center;gap:12px;flex-wrap:wrap}.mx .fdetail .dic{width:44px;height:44px;border-radius:13px;background:var(--org-soft);border:1px solid var(--org-line);display:grid;place-items:center;font-size:20px}.mx .fdetail h5{font-size:17px;font-weight:800;color:var(--navy)}.mx .fdetail .dh small{font-size:12px;color:var(--mut);display:block;margin-top:2px}.mx .fdetail .dnum{margin-left:auto;text-align:right}.mx .fdetail .dnum b{font-size:24px;font-weight:800;color:var(--org)}.mx .fdetail .dnum span{display:block;font-size:10px;letter-spacing:.06em;text-transform:uppercase;color:var(--mut);font-weight:700}.mx .fdetail p{font-size:13.5px;line-height:1.65;color:var(--mut);margin-top:12px}.mx .fdetail p b{color:var(--navy)}.mx .dtags{display:flex;gap:7px;flex-wrap:wrap;margin-top:12px}.mx .dtags i{font-style:normal;font-size:11px;font-weight:700;color:var(--navy);background:var(--navy-soft);border-radius:8px;padding:6px 11px}.mx.aimode .dtags i{color:var(--org);background:var(--org-soft)}.mx .outro{padding:54px 0 100px;text-align:center}.mx .outro h3{font-size:clamp(22px,3vw,34px);font-weight:800;letter-spacing:-.025em;color:var(--navy);max-width:26ch;margin:0 auto}.mx .outro h3 em{font-style:normal;color:var(--org)}.mx .outro .sub2{font-size:15px;color:var(--mut);margin:12px auto 26px;max-width:52ch;line-height:1.6}.mx .ctas{display:flex;gap:14px;flex-wrap:wrap;align-items:center;justify-content:center}.mx .btn{font-weight:700;font-size:15px;text-decoration:none;border:0;border-radius:14px;padding:15px 26px;display:inline-flex;align-items:center;gap:9px;transition:.2s;min-height:48px}.mx .btn:active{transform:scale(.98)}.mx .btn-pri{color:#fff;background:var(--org);box-shadow:0 12px 28px rgba(222,110,48,.35)}.mx .btn-pri:hover{transform:translateY(-2px);box-shadow:0 18px 38px rgba(222,110,48,.45);background:var(--org-dk)}.mx .btn-gho{color:var(--navy);border:1.5px solid var(--line-2);background:#fff}.mx .btn-gho:hover{border-color:var(--navy);background:var(--navy-soft)}.mx .cta-note{font-size:12.5px;color:var(--mut);width:100%;display:flex;gap:18px;flex-wrap:wrap;justify-content:center;margin-top:14px}.mx .cta-note i{font-style:normal;display:inline-flex;align-items:center;gap:6px}.mx .cta-note i::before{content:"";width:5px;height:5px;border-radius:50%;background:var(--grn)}.mx .modal{position:fixed;inset:0;z-index:50;display:none;align-items:center;justify-content:center;padding:16px}.mx .modal.open{display:flex}.mx .mback{position:absolute;inset:0;background:rgba(15,37,71,.55);backdrop-filter:blur(5px);border:0;width:100%;cursor:default}.mx .mbox{position:relative;background:#fff;border-radius:24px;width:min(520px,100%);max-height:88vh;overflow-y:auto;padding:28px;box-shadow:0 40px 100px rgba(15,37,71,.4);animation:dIn .35s both;-webkit-overflow-scrolling:touch}.mx .mbox h3{font-size:21px;font-weight:800;color:var(--navy);letter-spacing:-.02em}.mx .mbox .sub{font-size:13.5px;color:var(--mut);margin:6px 0 18px;line-height:1.55}.mx .mclose{position:absolute;top:14px;right:14px;width:38px;height:38px;border-radius:10px;border:1px solid var(--line);background:#fff;color:var(--mut);font-size:16px}.mx .mclose:hover{border-color:var(--navy);color:var(--navy)}.mx .mfield{margin-bottom:13px}.mx .mfield label{display:block;font-size:11.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--mut);margin-bottom:6px}.mx .mfield input{width:100%;border:1.5px solid var(--line-2);border-radius:12px;padding:13px 14px;font-family:var(--ff);font-size:15px;color:var(--navy);outline:0;transition:border-color .2s}.mx .mfield input:focus{border-color:var(--org)}.mx .mfield .ferr{font-size:11.5px;color:var(--red);margin-top:4px;display:none}.mx .mfield.bad input{border-color:var(--red)}.mx .mfield.bad .ferr{display:block}.mx .range{display:flex;align-items:center;gap:12px}.mx .range input[type=range]{flex:1;accent-color:var(--org);padding:0;border:0}.mx .range output{flex:0 0 86px;text-align:right;font-weight:800;font-size:14px;color:var(--navy)}.mx .roi-out{margin-top:18px;border:1px solid var(--org-line);background:var(--org-soft);border-radius:18px;padding:18px}.mx .roi-row{display:flex;justify-content:space-between;align-items:baseline;padding:7px 0;border-bottom:1px dashed var(--org-line);gap:10px}.mx .roi-row:last-child{border-bottom:0}.mx .roi-row span{font-size:12.5px;color:var(--mut);font-weight:600}.mx .roi-row b{font-size:15px;color:var(--navy);font-weight:800;white-space:nowrap}.mx .roi-big{font-size:22px!important;color:var(--org)!important}.mx .roi-note{font-size:10.5px;color:var(--mut);margin-top:10px;line-height:1.5}.mx .msubmit{width:100%;margin-top:6px;justify-content:center}.mx .msuccess{text-align:center;padding:26px 8px;display:none}.mx .msuccess.show{display:block}.mx .msuccess .ok{width:62px;height:62px;border-radius:50%;background:#E7F6EF;border:1.5px solid rgba(31,81,157,.35);display:grid;place-items:center;font-size:26px;margin:0 auto 14px}.mx .msuccess h4{font-size:18px;font-weight:800;color:var(--navy)}.mx .msuccess p{font-size:13px;color:var(--mut);margin-top:6px;line-height:1.55}.mx.jsfx .stepcard{transition:border-color .45s,box-shadow .45s}.mx.jsfx .phone{will-change:transform}.mx.jsfx .bgfx{will-change:transform}.mx.jsfx .intro{will-change:transform,opacity}.mx .step.act .metric b{animation:mpop .6s cubic-bezier(.2,.9,.3,1.4) both}
@keyframes mpop{0%{transform:scale(.6);opacity:0}100%{transform:scale(1);opacity:1}}.mx .rvl{opacity:0;transform:translateY(34px);transition:opacity .9s cubic-bezier(.2,.8,.2,1),transform .9s cubic-bezier(.2,.8,.2,1)}.mx .rvl.vis{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.mx *{animation:none!important;transition:none!important}.mx .fx{opacity:1;transform:none}.mx .step{min-height:auto;padding:24px 0}.mx .stepcard{opacity:1;transform:none}
}
@media (max-width:1020px){.mx .scrolly{display:block}.mx .stickycol{z-index:6;background:linear-gradient(180deg,#fff 82%,rgba(255,255,255,0));padding-bottom:8px}.mx .stickycol.pinned{position:fixed;top:0;left:0;width:100%}.mx .stickycol.pinned-end{position:absolute;left:0;width:100%}.mx .sticky{position:static;justify-content:center;gap:12px;transform:scale(.72);transform-origin:top center;height:476px}.mx .rail{display:none}.mx .step{min-height:64vh}.mx .stepcard{max-width:100%;margin:0 auto}.mx #mxSpacer{display:block}.mx:not(.jsfx) .funnel{grid-template-columns:1fr;gap:10px}.mx:not(.jsfx) .fconn{display:none}.mx:not(.jsfx) .fstage{flex-direction:row;align-items:center;text-align:left;gap:12px;min-height:0;padding:14px 16px}.mx:not(.jsfx) .fstage .cnt{margin:0 0 0 auto}.mx:not(.jsfx) .fstage .fbar{display:none}.mx .fmap{padding-top:36px}.mx .fsummary{grid-template-columns:repeat(2,1fr)}
}
@media (max-width:560px){.mx .intro{padding:64px 0 18px}.mx .wrap{padding:0 16px}.mx .sticky{transform:scale(.6);height:398px}.mx .step{min-height:56vh}.mx .stepcard{padding:20px 18px 24px}.mx .controls{gap:10px}.mx .inqctl{width:100%;justify-content:space-between}.mx .fdetail{padding:18px 16px}.mx .fdetail .dnum{margin-left:0;width:100%;text-align:left}.mx .j-node .jl{font-size:9.5px;padding:3px 7px}
}
@media (max-width:380px){.mx .sticky{transform:scale(.54);height:360px}
}/* fix: neutralize global bare-class leaks (.step/.chat/.cap/.bub) into this section */
#mobile .step{opacity:1;transform:none;border:0;background:none;border-radius:0;box-shadow:none}#mobile .chat{max-width:none;border:0;box-shadow:none;background:none;border-radius:0;overflow:visible}#mobile .cap{background:none;border:0;box-shadow:none;border-radius:0}#mobile .bub{border:0}#mobile .lead{margin-top:0}
</style>

<!-- ===================== CRM Impact Stories (scoped #stories) ===================== -->
<style id="cis-style">/* Salesforce-style customer video band: navy canvas, white-framed
   video cards, avatar + name strip. Scoped to #stories. */
section#stories{background:linear-gradient(180deg,#1c3966 0%,#19335D 46%,#132845 100%)!important;font-family:'Inter',sans-serif;overflow:hidden}
#stories .cis-wrap{max-width:1240px;margin:0 auto;padding:54px 24px 58px}
#stories .cis-head{text-align:center;max-width:780px;margin:0 auto 36px}
#stories .cis-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#fff;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.18);padding:7px 16px;border-radius:99px}
#stories .cis-eyebrow .d{width:7px;height:7px;border-radius:50%;background:#DE6E30;box-shadow:0 0 8px rgba(222,110,48,.7);animation:cisPulse 2.2s infinite}
@keyframes cisPulse{0%,100%{opacity:1}50%{opacity:.35}}
#stories .cis-title{font-weight:800;font-size:clamp(28px,4.4vw,50px);line-height:1.1;letter-spacing:-.025em;margin:16px 0 12px;color:#fff}
#stories .cis-title em{font-style:normal;color:#DE6E30;position:relative;white-space:nowrap}
#stories .cis-title em::after{content:"";position:absolute;left:0;right:0;bottom:.02em;height:.16em;background:rgba(222,110,48,.3);border-radius:99px;z-index:-1}
#stories .cis-lead{font-size:clamp(15px,1.6vw,17.5px);line-height:1.6;color:rgba(255,255,255,.74);max-width:620px;margin:0 auto}
/* ---- the card rail: 3-up on desktop, swipe rail on phones ---- */
#stories .cis-rail{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px;max-width:1200px;margin:0 auto}
#stories .cis-card{background:#fff;border-radius:22px;padding:10px 10px 0;box-shadow:0 20px 46px -14px rgba(4,12,26,.55);transition:transform .35s cubic-bezier(.2,.8,.2,1),box-shadow .35s}
#stories .cis-card:hover{transform:translateY(-6px);box-shadow:0 30px 62px -14px rgba(4,12,26,.65)}
#stories .cis-video{position:relative;aspect-ratio:16/10;border-radius:15px;overflow:hidden;background:#0d1c33;cursor:pointer}
#stories .cis-video img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
#stories .cis-card:hover .cis-video img{transform:scale(1.05)}
#stories .cis-video::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(13,28,51,0) 55%,rgba(13,28,51,.34));pointer-events:none}
#stories .cis-play{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:64px;height:64px;border-radius:50%;background:rgba(255,255,255,.94);display:grid;place-items:center;z-index:2;transition:.3s;box-shadow:0 10px 28px rgba(0,0,0,.35)}
#stories .cis-play svg,#stories .cis-play img.eeimg{width:26px;height:26px;fill:#DE6E30;margin-left:3px}
#stories .cis-card:hover .cis-play{background:#DE6E30;transform:translate(-50%,-50%) scale(1.08)}
#stories .cis-card:hover .cis-play svg,#stories .cis-card:hover .cis-play img.eeimg{fill:#fff;filter:brightness(0) invert(1)}
#stories .cis-dur{position:absolute;bottom:12px;right:12px;z-index:2;font-size:12px;font-weight:600;color:#fff;background:rgba(13,28,51,.72);padding:4px 10px;border-radius:99px}
#stories .cis-video.playing img,#stories .cis-video.playing::after,#stories .cis-video.playing .cis-play,#stories .cis-video.playing .cis-dur{display:none}
#stories .cis-video iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
/* ---- white footer strip: avatar + name + role (the Salesforce logo row) ---- */
#stories .cis-foot{display:flex;align-items:center;gap:12px;padding:14px 10px 16px}
#stories .cis-av{position:relative;width:44px;height:44px;flex:none}
#stories .cis-av img{width:44px;height:44px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 2px #DE6E30}
#stories .cis-av .fb{display:none;width:44px;height:44px;border-radius:50%;background:#DE6E30;color:#fff;font-weight:800;font-size:15px;place-items:center;border:2px solid #fff;box-shadow:0 0 0 2px #DE6E30}
#stories .cis-av.noimg img{display:none}
#stories .cis-av.noimg .fb{display:grid}
#stories .cis-meta{min-width:0}
#stories .cis-aname{font-weight:800;font-size:15px;color:#19335D;line-height:1.25}
#stories .cis-arole{font-size:12.5px;color:rgba(25,51,93,.62);margin-top:2px;line-height:1.4}
#stories .cis-cta{display:flex;justify-content:center;margin-top:38px}
#stories .cis-btn{display:inline-flex;align-items:center;gap:9px;font-weight:700;font-size:15px;padding:14px 28px;border-radius:99px;text-decoration:none;transition:.25s}
#stories .cis-btn svg,#stories .cis-btn img.eeimg{width:18px;height:18px;fill:currentColor}
#stories .cis-btn.primary{background:#DE6E30;color:#fff;box-shadow:0 10px 26px rgba(222,110,48,.4)}
#stories .cis-btn.primary:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(222,110,48,.5)}
/* ---- reveal: cards rise in when the section is reached (JS-gated) ---- */
#stories.cis-anim .cis-card{opacity:0;transform:translateY(26px);transition:opacity .55s ease,transform .55s cubic-bezier(.2,.8,.2,1)}
#stories.cis-anim .cis-card:nth-child(2){transition-delay:.1s}
#stories.cis-anim .cis-card:nth-child(3){transition-delay:.2s}
#stories.cis-anim.in .cis-card{opacity:1;transform:none;transition-property:opacity,transform,box-shadow}
#stories.cis-anim.in .cis-card:hover{transform:translateY(-6px)}
@media(prefers-reduced-motion:reduce){#stories .cis-eyebrow .d{animation:none}#stories.cis-anim .cis-card{opacity:1!important;transform:none!important;transition:none}}
/* ---- phones + small tablets: swipe rail with a peeking next card ---- */
@media(max-width:960px){
  #stories .cis-rail{display:flex;overflow-x:auto;gap:14px;padding:4px 4px 12px;margin:0;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;scrollbar-width:none}
  #stories .cis-rail::-webkit-scrollbar{display:none}
  #stories .cis-card{flex:0 0 46%;min-width:300px;scroll-snap-align:center}
}
@media(max-width:640px){
  #stories .cis-wrap{padding:30px 14px 34px}
  #stories .cis-head{margin-bottom:22px}
  #stories .cis-card{flex-basis:82%;min-width:0}
  #stories .cis-play{width:54px;height:54px}
  #stories .cis-cta{margin-top:22px}
}
</style>



<!-- ===================== SEGMENT · INTERACTIVE PREVIEW ===================== -->
<!-- ===================== SEGMENTS · Built for your institution (scoped #segments) ===================== -->
<!-- (removed dead hidden section: #segments) -->
<!-- (removed dead hidden section: #ecosystem) -->
<!-- ===================== INTEGRATIONS ===================== -->
<section class="sec" id="integrations">
  <div class="container">
    <div class="head rv">
      <h2 class="h2">One platform, <span class="grad-o">infinite connections.</span></h2>
      <p class="lead">Plug ExtraaEdge into the tools your team already loves - telephony, payments, marketplaces, marketing &amp; more. No rip-and-replace.</p>
    </div>
    <div class="ig-stats rv">
      <div><div class="n grad-o">50+</div><div class="l">Native integrations</div></div>
      <div><div class="n grad-o">8</div><div class="l">Categories</div></div>
      <div><div class="n grad-o">0</div><div class="l">Code required</div></div>
    </div>
    <div class="ig rv" id="ig">
      <div class="ig-nav" id="igNav" role="tablist"></div>
      <div class="ig-panel">
        <div class="ig-phead"><button class="ig-arw" id="igPrev" type="button" aria-label="Previous category">‹</button><span class="ig-count" id="igCount">01 / 08</span><h3 id="igTitle">Integrations &amp; ecosystem</h3><button class="ig-arw" id="igNext" type="button" aria-label="Next category">›</button></div>
        <p class="ig-pd" id="igDesc"></p>
        <div class="ig-grid" id="igGrid"></div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== WhatsApp Business API (scoped .wa-sec / #whatsapp) ===================== -->
<!-- (removed dead hidden section: #whatsapp) -->
<!-- ===================== SECURITY & COMPLIANCE ===================== -->
<section class="sec sec--soft" id="security">
  <div class="container">
    <div class="head rv">
      <h2 class="h2">Your students' data, <span class="grad-o">protected by design.</span></h2>
      <p class="lead">Bank-grade security and compliance, so your institution and applicants are always safe.</p>
    </div>
    <div class="sec-grid rv">
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/iso%20certified%20logo.png" alt="ISO 27001" loading="lazy"></div><b>ISO 27001 Certified</b><span>Audited information-security management.</span></div>
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/GDPR%20logo%20.png" alt="GDPR" loading="lazy"></div><b>GDPR Compliant</b><span>Privacy-first data handling &amp; consent.</span></div>
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/india-data-residency-logo.png" alt="India Data Residency" loading="lazy"></div><b>India Data Residency</b><span>Hosted on secure, scalable cloud.</span></div>
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/role-based-acccess-logo.png" alt="Role-Based Access" loading="lazy"></div><b>Role-Based Access</b><span>Granular permissions &amp; full audit trails.</span></div>
    </div>
  </div>
</section>

<!-- ===================== FAQ ===================== -->
<!-- ===================== CRO · COMPARISON + ROI CALCULATOR + STICKY CTA ===================== -->
<style>/* whitespace tighten across the home (safe higher-specificity override) */
  .ee-home .sec{padding-top:64px;padding-bottom:64px}
  @media(max-width:768px){.ee-home .sec{padding-top:44px;padding-bottom:44px}}#ee-cro{--nv:#19345d;--nv2:#22467c;--or:#DE6E30;--mut:#5a6b85;--line:rgba(25,52,93,.1);position:relative;padding:clamp(56px,7vw,92px) 0;background:linear-gradient(180deg,#fff,#f5f8fc);font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased;overflow:hidden}#ee-cro *{box-sizing:border-box}#ee-cro .cw{max-width:1140px;margin:0 auto;padding:0 22px}#ee-cro .ch{text-align:center;max-width:680px;margin:0 auto 34px}#ee-cro .eyebrow{display:inline-flex;align-items:center;gap:8px;font:700 12px/1 'Inter';letter-spacing:.13em;text-transform:uppercase;color:var(--orange-700,#B5551D);margin-bottom:12px}#ee-cro .eyebrow i{width:7px;height:7px;border-radius:50%;background:var(--or)}#ee-cro h2{font-weight:800;font-size:clamp(26px,3.8vw,42px);line-height:1.1;letter-spacing:-.03em;color:var(--nv);margin:0 0 10px}#ee-cro h2 em{font-style:normal;color:var(--or)}#ee-cro .ch p{font-size:clamp(15px,1.6vw,17px);color:var(--mut);line-height:1.6;margin:0}/* comparison table */
  #ee-cro .cmp{background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 30px 70px -34px rgba(25,52,93,.35);overflow:hidden;margin-bottom:12px}#ee-cro .cmp-row{display:grid;grid-template-columns:1.9fr 1.15fr 1fr 1fr;align-items:stretch}#ee-cro .cmp-row+.cmp-row{border-top:1px solid rgba(25,52,93,.07)}#ee-cro .cmp-row>div{display:flex;align-items:center;padding:13px 16px;font-size:13.5px}#ee-cro .cmp-row.head{background:linear-gradient(180deg,#fbfdff,#f3f7fc)}#ee-cro .cmp-row.head>div{font-weight:800;font-size:11.5px;justify-content:center;color:var(--mut);text-transform:uppercase;letter-spacing:.08em;padding:15px 14px}#ee-cro .cmp-row.head>div:first-child{justify-content:flex-start}#ee-cro .cmp-row.head .us{background:linear-gradient(135deg,var(--nv2),var(--nv));color:#fff;font-size:14px;letter-spacing:.01em;text-transform:none;gap:8px}#ee-cro .usbadge{display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:50%;background:var(--or);flex:none}#ee-cro .usbadge svg{width:11px;height:11px}#ee-cro .cmp-row:not(.head):hover{background:#fafcff}#ee-cro .cell{justify-content:center;text-align:center;color:var(--mut)}#ee-cro .cell.us{background:linear-gradient(180deg,rgba(222,110,48,.08),rgba(222,110,48,.04));border-left:1px solid rgba(222,110,48,.22);border-right:1px solid rgba(222,110,48,.22)}#ee-cro .feat{gap:11px;font-weight:700;color:var(--nv);line-height:1.3}#ee-cro .feat small{display:block;font-weight:500;font-size:11.5px;color:var(--mut);margin-top:2px}#ee-cro .fico{flex:none;width:32px;height:32px;border-radius:10px;background:linear-gradient(135deg,rgba(222,110,48,.13),rgba(25,52,93,.07));display:inline-flex;align-items:center;justify-content:center;color:var(--or)}#ee-cro .fico svg{width:16px;height:16px}#ee-cro .ok{display:inline-flex;align-items:center;justify-content:center;width:23px;height:23px;border-radius:50%;background:var(--or);box-shadow:0 6px 14px -4px rgba(222,110,48,.55);flex:none}#ee-cro .ok svg{width:12px;height:12px}#ee-cro .ok2{display:inline-flex;align-items:center;justify-content:center;width:23px;height:23px;border-radius:50%;border:1.6px solid rgba(25,52,93,.25);color:#5a6b85;flex:none}#ee-cro .ok2 svg{width:11px;height:11px}#ee-cro .mid{font-size:11px;font-weight:700;color:var(--warning,#8A5A00);background:#fcf3e1;border:1px solid #f3e3c0;padding:3px 10px;border-radius:999px;white-space:nowrap}#ee-cro .no{color:#c4ccd9;font-weight:700;font-size:15px}#ee-cro .cmp-note{display:flex;align-items:center;justify-content:center;gap:7px;font-size:11.5px;color:var(--mut);text-align:center;margin:10px auto 0;max-width:640px}#ee-cro .cmp-note svg{width:14px;height:14px;flex:none;color:var(--or)}#ee-cro .cmp-note b{color:var(--nv)}
  @media(max-width:720px){#ee-cro .cmp-row{grid-template-columns:1.5fr .95fr .8fr .8fr}#ee-cro .cmp-row>div{padding:11px 7px;font-size:12px}#ee-cro .cmp-row.head>div{padding:12px 5px;font-size:9.5px}#ee-cro .cmp-row.head .us{font-size:11.5px;gap:5px}#ee-cro .usbadge{width:15px;height:15px}#ee-cro .usbadge svg{width:8px;height:8px}#ee-cro .fico{display:none}#ee-cro .feat{font-size:12px;gap:0}#ee-cro .feat small{font-size:10px}#ee-cro .ok,#ee-cro .ok2{width:19px;height:19px}#ee-cro .mid{font-size:9px;padding:2px 6px}
  }/* ROI calculator */
  #ee-cro .roi{display:grid;grid-template-columns:1fr 1.05fr;gap:0;background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 30px 70px -34px rgba(25,52,93,.35);overflow:hidden;margin-top:44px}#ee-cro .roi-in{padding:clamp(24px,3vw,38px)}#ee-cro .roi-in h3{font-size:20px;font-weight:800;color:var(--nv);margin:0 0 4px}#ee-cro .roi-in .sub{font-size:13px;color:var(--mut);margin:0 0 24px}#ee-cro .fld{margin-bottom:20px}#ee-cro .fld label{display:flex;justify-content:space-between;align-items:center;font-size:12.5px;font-weight:700;color:var(--nv);margin-bottom:9px}#ee-cro .fld label b{color:var(--orange-700,#B5551D);font-weight:800;background:rgba(222,110,48,.1);border:1px solid rgba(222,110,48,.18);padding:3px 11px;border-radius:999px;font-size:12.5px}#ee-cro .fld input[type=range]{-webkit-appearance:none;appearance:none;width:100%;height:6px;border-radius:6px;background:linear-gradient(90deg,var(--or) var(--p,50%),#e8eef6 var(--p,50%));outline:none;cursor:pointer}#ee-cro .fld input[type=range]::-webkit-slider-thumb{-webkit-appearance:none;width:20px;height:20px;border-radius:50%;background:#fff;border:3px solid var(--or);box-shadow:0 4px 10px rgba(25,52,93,.28)}#ee-cro .fld input[type=range]::-moz-range-thumb{width:14px;height:14px;border-radius:50%;background:#fff;border:3px solid var(--or);box-shadow:0 4px 10px rgba(25,52,93,.28)}#ee-cro .fld .nums{display:flex;justify-content:space-between;font-size:10.5px;color:var(--mut);margin-top:5px}#ee-cro .roi-out{position:relative;background:linear-gradient(150deg,var(--nv2),var(--nv));color:#fff;padding:clamp(24px,3vw,38px);display:flex;flex-direction:column;justify-content:center;overflow:hidden}#ee-cro .roi-out:before{content:"";position:absolute;top:-80px;right:-80px;width:260px;height:260px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.38),transparent 70%)}#ee-cro .roi-out:after{content:"";position:absolute;bottom:-90px;left:-60px;width:220px;height:220px;border-radius:50%;background:radial-gradient(circle,rgba(111,163,242,.2),transparent 70%)}#ee-cro .roi-out>*{position:relative;z-index:1}#ee-cro .roi-out .lab{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#c6d4ea}#ee-cro .roi-out .big{font-size:clamp(34px,5vw,52px);font-weight:800;letter-spacing:-.03em;line-height:1.05;background:linear-gradient(100deg,#fff,#E8843F);-webkit-background-clip:text;background-clip:text;color:transparent;margin:2px 0 0}#ee-cro .roi-out .rev{font-size:clamp(18px,2.4vw,24px);font-weight:800;margin-top:12px}#ee-cro .roi-out .rev span{color:#ffb37e}#ee-cro .roi-out .meta{display:flex;gap:10px;margin-top:20px;flex-wrap:wrap}#ee-cro .roi-out .meta div{flex:1;min-width:92px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.13);border-radius:13px;padding:11px 10px;text-align:center;backdrop-filter:blur(4px)}#ee-cro .roi-out .meta div b{display:block;font-size:19px;font-weight:800}#ee-cro .roi-out .meta div span{font-size:10.5px;color:#c6d4ea}#ee-cro .roi-out .cta{display:inline-flex;align-items:center;justify-content:center;gap:9px;margin-top:22px;background:var(--or);color:#fff;font-weight:700;font-size:15px;padding:14px 24px;border-radius:12px;text-decoration:none;box-shadow:0 14px 30px -10px rgba(222,110,48,.6);transition:transform .2s}#ee-cro .roi-out .cta:hover{transform:translateY(-2px)}#ee-cro .roi-out .fine{font-size:10.5px;color:#c6d4ea;margin-top:12px;text-align:center}
  @media(max-width:760px){#ee-cro .roi{grid-template-columns:1fr}}
</style>
<!-- ===================== COMPETITOR-BEATING · GO-LIVE / PRICING / SWITCH ===================== -->
<style>#ee-golive,#ee-pricing,#ee-switch{--nv:#19345d;--nv2:#22467c;--or:#DE6E30;--mut:#5a6b85;--line:rgba(25,52,93,.1);position:relative;padding:clamp(54px,7vw,88px) 0;font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased}#ee-golive *,#ee-pricing *,#ee-switch *{box-sizing:border-box}.rvw{max-width:1140px;margin:0 auto;padding:0 22px}.rvh{text-align:center;max-width:680px;margin:0 auto 36px}.rvh .eb{display:inline-flex;align-items:center;gap:8px;font:700 12px/1 'Inter';letter-spacing:.13em;text-transform:uppercase;color:var(--or);margin-bottom:12px}.rvh .eb i{width:7px;height:7px;border-radius:50%;background:var(--or)}.rvh h2{font-weight:800;font-size:clamp(26px,3.8vw,42px);line-height:1.1;letter-spacing:-.03em;color:var(--nv);margin:0 0 10px}.rvh h2 em{font-style:normal;color:var(--or)}.rvh p{font-size:clamp(15px,1.6vw,17px);color:var(--mut);line-height:1.6;margin:0}/* GO-LIVE timeline */
  #ee-golive .tl{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;position:relative}#ee-golive .tl::before{content:"";position:absolute;top:34px;left:8%;right:8%;height:2px;background:linear-gradient(90deg,var(--or),var(--nv2))}#ee-golive .st{position:relative;background:#fff;border:1px solid var(--line);border-radius:16px;padding:24px 18px;box-shadow:0 12px 30px -18px rgba(25,52,93,.25);text-align:center}#ee-golive .st .n{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--or),var(--nv2));color:#fff;font-weight:800;display:grid;place-items:center;margin:0 auto 12px;position:relative;z-index:1}#ee-golive .st .day{font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--or);margin-bottom:5px}#ee-golive .st h4{font-size:15px;font-weight:700;color:var(--nv);margin:0 0 5px}#ee-golive .st p{font-size:12.5px;color:var(--mut);line-height:1.5;margin:0}#ee-golive .note{text-align:center;margin-top:26px;font-size:14px;color:var(--nv);font-weight:600}#ee-golive .note b{color:var(--or)}
  @media(max-width:760px){#ee-golive .tl{grid-template-columns:1fr 1fr}#ee-golive .tl::before{display:none}}
  @media(max-width:430px){#ee-golive .tl{grid-template-columns:1fr}}/* PRICING */
  #ee-pricing{background:transparent}#ee-pricing .pg{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;align-items:stretch}#ee-pricing .pc{display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:18px;padding:26px 22px;box-shadow:0 14px 36px -22px rgba(25,52,93,.28)}#ee-pricing .pc.pop{border:2px solid var(--or);box-shadow:0 26px 60px -26px rgba(222,110,48,.5);position:relative}#ee-pricing .pc.pop::before{content:"Most popular";position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--or);color:#fff;font-size:11px;font-weight:800;letter-spacing:.04em;padding:5px 14px;border-radius:999px;white-space:nowrap}#ee-pricing .pc .pn{font-size:17px;font-weight:800;color:var(--nv)}#ee-pricing .pc .pd{font-size:12.5px;color:var(--mut);margin:4px 0 14px}#ee-pricing .pc .pp{font-size:26px;font-weight:800;color:var(--nv);letter-spacing:-.02em}#ee-pricing .pc .pp span{font-size:13px;font-weight:600;color:var(--mut)}#ee-pricing .pc ul{list-style:none;margin:16px 0 18px;padding:0;display:flex;flex-direction:column;gap:9px}#ee-pricing .pc li{font-size:13px;color:var(--nv);display:flex;gap:8px;align-items:flex-start;line-height:1.4}#ee-pricing .pc li svg,#ee-pricing .pc li img.eeimg{width:15px;height:15px;color:#1f519d;flex:none;margin-top:1px}#ee-pricing .pc .pb{margin-top:auto;display:inline-flex;align-items:center;justify-content:center;gap:8px;font-weight:700;font-size:14px;padding:12px;border-radius:11px;text-decoration:none;transition:transform .2s}#ee-pricing .pc .pb.ghost{border:1.5px solid var(--line);color:var(--nv)}#ee-pricing .pc .pb.solid{background:var(--or);color:#fff;box-shadow:0 12px 26px -10px rgba(222,110,48,.5)}#ee-pricing .pc .pb:hover{transform:translateY(-2px)}#ee-pricing .pnote{text-align:center;margin-top:18px;font-size:12.5px;color:var(--mut)}#ee-pricing .pnote b{color:var(--nv)}
  @media(max-width:820px){#ee-pricing .pg{grid-template-columns:1fr;max-width:420px;margin:0 auto}}/* SWITCH */
  #ee-switch .sw{display:grid;grid-template-columns:1.1fr .9fr;gap:0;background:linear-gradient(150deg,var(--nv2),var(--nv));border-radius:20px;overflow:hidden;box-shadow:0 30px 70px -34px rgba(25,52,93,.55)}#ee-switch .swl{padding:clamp(28px,3.4vw,44px);color:#fff}#ee-switch .swl .eb{display:inline-flex;align-items:center;gap:8px;font:800 11px/1 'Inter';letter-spacing:.12em;text-transform:uppercase;color:#E8843F;margin-bottom:12px}#ee-switch .swl h2{font-size:clamp(24px,3.2vw,36px);font-weight:800;line-height:1.12;letter-spacing:-.02em;margin:0 0 12px}#ee-switch .swl p{font-size:14.5px;color:#c6d4ea;line-height:1.6;margin:0 0 20px;max-width:46ch}#ee-switch .swl ul{list-style:none;margin:0 0 24px;padding:0;display:grid;gap:11px}#ee-switch .swl li{font-size:14px;display:flex;gap:10px;align-items:flex-start;color:#eaf0f8}#ee-switch .swl li svg,#ee-switch .swl li img.eeimg{width:18px;height:18px;color:#9fb9e0;flex:none;margin-top:1px}#ee-switch .swl .cta{display:inline-flex;align-items:center;gap:9px;background:var(--or);color:#fff;font-weight:700;font-size:15px;padding:14px 26px;border-radius:12px;text-decoration:none;box-shadow:0 14px 30px -10px rgba(222,110,48,.6);transition:transform .2s}#ee-switch .swl .cta:hover{transform:translateY(-2px)}#ee-switch .swr{background:rgba(255,255,255,.06);border-left:1px solid rgba(255,255,255,.12);padding:clamp(28px,3.4vw,44px);display:flex;flex-direction:column;justify-content:center;gap:14px}#ee-switch .swr .gain{font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#9fb4d4;margin-bottom:2px}#ee-switch .swr .g{display:flex;gap:11px;align-items:center;color:#fff;font-size:14px;font-weight:600}#ee-switch .swr .g b{width:34px;height:34px;border-radius:9px;background:#ffffff;color:#E8843F;display:grid;place-items:center;flex:none;box-shadow:0 2px 8px rgba(0,0,0,.18)}#ee-switch .swr .g b svg,#ee-switch .swr .g b img.eeimg{width:18px;height:18px}
  @media(max-width:760px){#ee-switch .sw{grid-template-columns:1fr}#ee-switch .swr{border-left:0;border-top:1px solid rgba(255,255,255,.12)}}
</style>

<section id="ee-golive" aria-label="Go live in 7 days">
  <div class="rvw">
    <div class="rvh">
      <h2>Go live in <em>7 days</em> - not months.</h2>
      <p>No long IT projects. Our team imports your data, configures your AI &amp; WhatsApp, trains your counsellors and gets you live in a single week.</p>
    </div>
    <div class="tl">
      <div class="st"><div class="n">1</div><div class="day">Day 1&ndash;2</div><h3>Kickoff &amp; data import</h3><p>We migrate your leads &amp; history - zero manual work for you.</p></div>
      <div class="st"><div class="n">2</div><div class="day">Day 3&ndash;4</div><h3>Setup &amp; branding</h3><p>Stages, forms, templates &amp; dashboards mapped to your funnel.</p></div>
      <div class="st"><div class="n">3</div><div class="day">Day 5&ndash;6</div><h3>AI &amp; WhatsApp config</h3><p>VidyaAI calling, VidyaGPT &amp; WhatsApp API live and tested.</p></div>
      <div class="st"><div class="n">4</div><div class="day">Day 7</div><h3>Go live + training</h3><p>Counsellors trained, you start converting from day one.</p></div>
    </div>
    <p class="note">Most CRMs take <b>weeks of onboarding</b>. With ExtraaEdge you&rsquo;re live in <b>7 days</b>.</p>
  </div>
</section>


<section id="ee-switch" aria-label="Switch from your current CRM">
  <div class="rvw">
    <div class="sw">
      <div class="swl">
        <span class="eb">🔁 Switching is easy</span>
        <h2>On a legacy CRM? Switch in 14 days.</h2>
        <p>Outgrown a generic CRM or a basic enrollment tool? Move to the AI-native platform built only for admissions - we do the heavy lifting.</p>
        <ul>
          <li><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-01.svg" alt="" loading="lazy" decoding="async"> <b>Free data migration</b> - leads, history &amp; templates</li>
          <li><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-01.svg" alt="" loading="lazy" decoding="async"> Run both in parallel - <b>zero downtime</b></li>
          <li><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-01.svg" alt="" loading="lazy" decoding="async"> 1:1 onboarding &amp; counsellor training included</li>
        </ul>
        <a href="#admission-form" class="cta">Get a free migration plan &rarr;</a>
      </div>
      <div class="swr">
        <div class="gain">What you gain on day one</div>
        <div class="g"><b><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-02.svg" alt="" loading="lazy" decoding="async"></b> AI Voice Agent that calls leads in 30 sec</div>
        <div class="g"><b><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-03.svg" alt="" loading="lazy" decoding="async"></b> VidyaGPT - 24&times;7 AI counsellor</div>
        <div class="g"><b><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-04.svg" alt="" loading="lazy" decoding="async"></b> Real-time AI lead intent scoring</div>
        <div class="g"><b><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-05.svg" alt="" loading="lazy" decoding="async"></b> 95+ languages on chat &amp; voice</div>
      </div>
    </div>
  </div>
</section>



<!-- ===================== RESOURCES / EVENTS (added) ===================== -->
<style>#ee-resources{
    --navy:#19345d; --navy2:#22467c; --orange:#DE6E30; --orange2:#E8843F;
    --ink:#0f203a; --muted:#5a6b85; --hair:rgba(25,52,93,.09);
    position:relative; padding:clamp(64px,8vw,104px) 0;
    font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;
    color:var(--ink); background:transparent;
  }#ee-resources *{box-sizing:border-box;}#ee-resources .ee-r-container{max-width:1240px;margin:0 auto;padding:0 24px;}#ee-resources .ee-r-head{max-width:760px;margin:0 0 clamp(32px,4vw,48px);}#ee-resources .ee-r-eyebrow{
    display:inline-flex;align-items:center;gap:8px;
    font-size:12px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;
    color:var(--orange);margin:0 0 16px;
  }#ee-resources .ee-r-eyebrow::before{
    content:"";width:22px;height:2px;border-radius:2px;
    background:linear-gradient(90deg,var(--orange),var(--orange2));
  }#ee-resources h2{
    font-family:'Inter',system-ui,sans-serif;
    font-weight:600;font-size:clamp(28px,3.6vw,42px);line-height:1.12;
    letter-spacing:-.015em;margin:0 0 14px;color:var(--navy);
  }#ee-resources .ee-r-sub{
    margin:0;font-size:clamp(15px,1.6vw,17px);line-height:1.6;color:var(--muted);max-width:600px;
  }#ee-resources .ee-r-grid{
    display:grid;gap:12px;
    grid-template-columns:repeat(4,minmax(0,1fr));
  }#ee-resources .ee-r-card{
    position:relative;display:flex;flex-direction:column;align-items:flex-start;
    background:#fff;border:1px solid var(--hair);border-radius:13px;
    padding:16px 15px;text-decoration:none;color:inherit;
    box-shadow:0 1px 2px rgba(15,32,58,.04),0 8px 24px -16px rgba(15,32,58,.18);
    transition:transform .28s cubic-bezier(.2,.7,.3,1),box-shadow .28s ease,border-color .28s ease;
    overflow:hidden;
  }#ee-resources .ee-r-card::after{
    content:"";position:absolute;left:0;top:0;height:3px;width:100%;
    background:linear-gradient(90deg,var(--orange),var(--orange2));
    transform:scaleX(0);transform-origin:left;transition:transform .3s ease;
  }#ee-resources .ee-r-card:hover{
    transform:translateY(-6px);border-color:rgba(25,52,93,.16);
    box-shadow:0 2px 4px rgba(15,32,58,.05),0 22px 40px -22px rgba(25,52,93,.32);
  }#ee-resources .ee-r-card:hover::after{transform:scaleX(1);}#ee-resources .ee-r-card:focus-visible{
    outline:3px solid rgba(222,110,48,.55);outline-offset:3px;
  }#ee-resources .ee-r-ico{
    display:inline-flex;align-items:center;justify-content:center;
    width:46px;height:46px;border-radius:12px;margin-bottom:18px;
    background:linear-gradient(160deg,rgba(34,70,124,.10),rgba(34,70,124,.04));
    color:var(--navy2);border:1px solid var(--hair);
    transition:background .28s ease,color .28s ease;
  }#ee-resources .ee-r-card:hover .ee-r-ico{
    background:linear-gradient(160deg,rgba(222,110,48,.16),rgba(232,132,63,.06));
    color:var(--orange);
  }#ee-resources .ee-r-ico svg,#ee-resources .ee-r-ico img.eeimg{width:23px;height:23px;display:block;}#ee-resources .ee-r-title{
    font-family:'Inter',system-ui,sans-serif;
    font-weight:600;font-size:16.5px;line-height:1.25;margin:0 0 7px;color:var(--navy);
  }#ee-resources .ee-r-desc{
    margin:0 0 16px;font-size:14px;line-height:1.55;color:var(--muted);
  }#ee-resources .ee-r-link{
    margin-top:auto;display:inline-flex;align-items:center;gap:6px;
    font-size:13.5px;font-weight:600;color:var(--orange);letter-spacing:.01em;
  }#ee-resources .ee-r-link svg,#ee-resources .ee-r-link img.eeimg{width:14px;height:14px;transition:transform .25s ease;}#ee-resources .ee-r-card:hover .ee-r-link svg,#ee-resources .ee-r-card:hover .ee-r-link img.eeimg{transform:translateX(4px);}

  @media (max-width:900px){#ee-resources .ee-r-grid{grid-template-columns:repeat(2,minmax(0,1fr));}
  }
  @media (max-width:560px){#ee-resources .ee-r-grid{grid-template-columns:1fr;gap:14px;}#ee-resources .ee-r-container{padding:0 18px;}
  }
  @media (prefers-reduced-motion:reduce){#ee-resources .ee-r-card,#ee-resources .ee-r-card::after,#ee-resources .ee-r-ico,#ee-resources .ee-r-link svg,#ee-resources .ee-r-link img.eeimg{transition:none;}
  }
</style>
<section id="ee-resources" aria-label="Resources">
  <div class="ee-r-container">
    <div class="ee-r-head">
      <h2>Everything you need to win admissions</h2>
      <p class="ee-r-sub">Practical guides, data-backed reports, and ready-to-use tools that help your team enroll more students, faster.</p>
    </div>
    <div class="ee-r-grid">

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-01.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Guides</h3>
        <p class="ee-r-desc">Step-by-step playbooks to set up and scale a high-converting admissions funnel.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-03.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Reports</h3>
        <p class="ee-r-desc">Benchmark studies on enrollment performance across institutions like yours.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-04.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Admission Trends</h3>
        <p class="ee-r-desc">What's shifting in applicant behavior, channels, and timelines this cycle.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-05.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Templates</h3>
        <p class="ee-r-desc">Proven email, SMS, and counselor scripts you can deploy in minutes.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-06.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Playbooks</h3>
        <p class="ee-r-desc">End-to-end strategies for lead nurturing, follow-ups, and yield management.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-07.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">ROI Calculator</h3>
        <p class="ee-r-desc">Estimate the revenue lift ExtraaEdge can unlock for your admissions team.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-08.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Webinars</h3>
        <p class="ee-r-desc">Expert-led sessions on AI, counseling, and modern admissions operations.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-09.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Customer Stories</h3>
        <p class="ee-r-desc">See how institutions grew enrollments and slashed response times with us.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-10.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Videos</h3>
        <p class="ee-r-desc">Short, practical walkthroughs of features, workflows, and best practices.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#admission-form">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-11.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Events</h3>
        <p class="ee-r-desc">Workshops and meetups where admissions leaders share what's working now.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

    </div>
  </div>
</section>

<section class="sec sec--soft" id="faq">
  <div class="container">
    <div class="head rv">
      <h2 class="h2">Everything you need to know about <span class="grad-o">ExtraaEdge.</span></h2>
    </div>
    <div class="faq rv">
      <div class="qa"><button aria-expanded="false"><span>What is ExtraaEdge?</span><span class="ic">+</span></button><div class="qa__a"><p>ExtraaEdge is an AI-powered Admission CRM purpose-built for educational institutions - schools, colleges, universities and edtech companies. It automates lead capture, scores intent, triggers smart follow-ups and gives counsellors real-time performance intelligence.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How does ExtraaEdge help convert more students?</span><span class="ic">+</span></button><div class="qa__a"><p>ExtraaEdge prioritises high-intent leads with AI scoring, responds to every enquiry in minutes with AI calling and WhatsApp automation, and tells counsellors exactly who to follow up with next - reducing response time by up to 90% and boosting conversions by up to 48%.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Does ExtraaEdge offer a free demo?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. You can book a free personalised 45-minute demo. A product expert will walk you through the platform live with data relevant to your sector.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Is ExtraaEdge suitable for small colleges?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge serves institutions from single-campus colleges to large university groups processing 100,000+ applications per cycle. Pricing and features scale to your needs.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>What AI features does ExtraaEdge offer?</span><span class="ic">+</span></button><div class="qa__a"><p>AI Lead Intent Scoring, AI Calling at scale via VidyaAI, Smart Follow-up Automation, WhatsApp Business API engagement and Counsellor Performance Intelligence - all powered by ExtraaEdge's proprietary Admission Intelligence engine.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Will ExtraaEdge work with my existing ads and website?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge captures leads automatically from Meta &amp; Google Ads, your website and landing pages, education portals (Shiksha, Collegedunia), WhatsApp, IVR and more - so every enquiry lands in one place with full source tracking. It also connects to your ERP/SIS, payment gateway and telephony.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How long does it take to go live?</span><span class="ic">+</span></button><div class="qa__a"><p>Most institutions go live in around 14 days. That includes data migration, integrations (ads, website, WhatsApp, telephony), workflow set-up and counsellor training - with a dedicated onboarding specialist and Customer Success Manager.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Does VidyaGPT support regional languages?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. VidyaGPT understands and responds in 95+ languages including Hindi, Marathi, Tamil, Telugu, Kannada, Bengali, Gujarati and more - over chat and on AI voice calls - so you can engage every student in their preferred language.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Is my data secure with ExtraaEdge?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails - enterprise-grade protection for your institution and applicants.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How does pricing work?</span><span class="ic">+</span></button><div class="qa__a"><p>ExtraaEdge uses simple, transparent product-based pricing - not module-based pricing that adds cost every time you scale. Your demo includes a tailored quote based on your enquiry volume and the modules you need, with no hidden third-party charges.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Can I migrate from my existing CRM or spreadsheets?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. Our team handles full data migration from your existing CRM or spreadsheets - leads, history, sources and stages - as part of onboarding, so you go live without losing any data.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Will my counsellors actually adopt it?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge is a single-window CRM designed around the admissions team, so it's quick to learn even for non-technical counsellors. Every account gets hands-on training, on-ground support and a dedicated Customer Success Manager to drive adoption.</p></div></div>
    </div>
  </div>
</section>

<!-- ===================== LEAD MAGNET ===================== -->
<!-- (final CTA section removed - every Book-a-Demo link goes to the hero form #admission-form) -->
</div>

<script>
/* honour reduced-motion / low-power devices */
var RM = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* progress bar removed - #ee-progress (global, rAF-driven) is the single scroll progress indicator */

/* reveal */
var rvObs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');rvObs.unobserve(e.target);}});},{threshold:0,rootMargin:'0px 0px -8%'});
document.querySelectorAll('.rv').forEach(function(el){rvObs.observe(el);});

/* (hero typewriter removed - now handled by the scoped #xhero hero script) */

/* counters */
function animate(el){var t=parseFloat(el.dataset.count),pre=el.dataset.prefix||'',suf=el.dataset.suffix||'';var dec=t%1!==0,cur=0,steps=46,inc=t/steps;var id=setInterval(function(){cur+=inc;if(cur>=t){cur=t;clearInterval(id);}el.textContent=pre+(dec?cur.toFixed(1):Math.round(cur).toLocaleString())+suf;},26);}
var cObs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){animate(e.target);cObs.unobserve(e.target);}});},{threshold:.6});
document.querySelectorAll('[data-count]').forEach(function(el){cObs.observe(el);});

/* (hero live flow removed - replaced by the scoped #xhero VidyaAI console simulation) */

/* marquee is now a static centered grid - logos shown once, no duplication/scroll */

/* ============ Counsellor streaming dashboard ============ */
(function(){
  var bars=document.getElementById('bars');
  if(bars){var bi=[].slice.call(bars.children);(function r(){bi.forEach(function(b){b.style.height=(28+Math.random()*62)+'%';});setTimeout(r,1600);})();}
  /* streaming sparkline */
  var cv=document.getElementById('spark');
  if(cv){var ctx=cv.getContext('2d');var data=[];for(var i=0;i<60;i++)data.push(40+Math.random()*40);
    function rs(){cv.width=cv.clientWidth;cv.height=56;}rs();addEventListener('resize',rs);
    setInterval(function(){data.push(35+Math.random()*55);data.shift();},220);
    (function draw(){var w=cv.width,h=cv.height;ctx.clearRect(0,0,w,h);
      var g=ctx.createLinearGradient(0,0,w,0);g.addColorStop(0,'#DE6E30');g.addColorStop(1,'#19345d');
      ctx.beginPath();data.forEach(function(v,i){var x=i/(data.length-1)*w,y=h-(v/100)*h;i?ctx.lineTo(x,y):ctx.moveTo(x,y);});
      ctx.strokeStyle=g;ctx.lineWidth=2;ctx.stroke();ctx.lineTo(w,h);ctx.lineTo(0,h);ctx.closePath();
      var f=ctx.createLinearGradient(0,0,0,h);f.addColorStop(0,'rgba(222,110,48,.22)');f.addColorStop(1,'rgba(222,110,48,0)');ctx.fillStyle=f;ctx.fill();
      if(!RM)requestAnimationFrame(draw);})();
  }
  /* morphing KPI views */
  var views=[{t:'· TODAY',conv:'+12%',rt:'58s',clo:'9.2x'},{t:'· THIS WEEK',conv:'+19%',rt:'1.1m',clo:'7.8x'},{t:'· THIS CYCLE',conv:'+48%',rt:'1.4m',clo:'9.2x'}];
  var v=0,tag=document.getElementById('viewTag'),kc=document.getElementById('kConv'),kr=document.getElementById('kRt'),kl=document.getElementById('kClo');
  if(tag&&kc&&kr&&kl){ setInterval(function(){v=(v+1)%views.length;var d=views[v];tag.textContent=d.t;kc.textContent=d.conv;kr.textContent=d.rt;kl.textContent=d.clo;},2600); }
})();



/* ============ Self-typing chats ============ */
function runChat(bodyId,script){
  var body=document.getElementById(bodyId);if(!body)return;var i=0;
  function push(m){var d=document.createElement('div');d.className='cmsg cmsg--'+(m.who==='u'?'u':m.who==='sys'?'sys':'a');d.innerHTML=m.text;body.appendChild(d);body.scrollTop=body.scrollHeight;i++;}
  function next(){if(i>=script.length)return;var m=script[i];
    if(m.who==='a'){var t=document.createElement('div');t.className='ctyping';t.innerHTML='<i></i><i></i><i></i>';body.appendChild(t);body.scrollTop=body.scrollHeight;setTimeout(function(){t.remove();push(m);setTimeout(next,650);},950);}
    else if(m.who==='sys'){push(m);setTimeout(next,500);}else{push(m);setTimeout(next,700);}}
  var obs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){next();obs.disconnect();}});},{threshold:.4});
  obs.observe(body);
}

/* ============ Live system-feed counter ============ */
(function(){
  var el=document.getElementById('amsToday');if(!el||RM)return;
  var started=false;var sec=el.closest('section');
  var o=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting&&!started){started=true;
    setInterval(function(){if(Math.random()>0.4){el.textContent=(parseInt(el.textContent,10)+1);}},3200);o.disconnect();}});},{threshold:.2});
  if(sec)o.observe(sec);
})();



/* ============ FAQ accordion ============ */
document.querySelectorAll('.qa button').forEach(function(b){
  b.addEventListener('click',function(){var qa=b.parentElement,a=qa.querySelector('.qa__a'),open=qa.classList.contains('open');
    document.querySelectorAll('.qa').forEach(function(x){x.classList.remove('open');x.querySelector('.qa__a').style.maxHeight=null;x.querySelector('button').setAttribute('aria-expanded','false');});
    if(!open){qa.classList.add('open');a.style.maxHeight=a.scrollHeight+'px';b.setAttribute('aria-expanded','true');}});
});



/* ============ Integrations explorer ============ */
(function(){
  var nav=document.getElementById('igNav');if(!nav)return;
  var B='https://www.extraaedge.com/wp-content/uploads/2026/intigration-logo/';
  var C=[
   {e:'📞',t:'Cloud Telephony',d:'Run your entire calling stack - IVR, click-to-call & recording - natively inside ExtraaEdge.',g:[['3cx.svg','3CX'],['3gcallnet.svg','3G Callnet'],['ameyo.svg','Ameyo'],['asterisk.svg','Asterisk'],['c-zentrix.svg','C-Zentrix'],['exotel.svg','Exotel'],['ivr-guru.svg','IVR Guru'],['knowlarity.svg','Knowlarity'],['mcube.svg','MCUBE'],['myoperator.svg','MyOperator'],['ozonetel.svg','Ozonetel'],['servetel.svg','Servetel'],['smartflo.svg','Smartflo'],['telecmi.svg','TeleCMI'],['voxbay.svg','Voxbay']]},
   {e:'💬',t:'Messaging & SMS',d:'Reach every prospect on WhatsApp, SMS and RCS through India’s leading messaging gateways.',g:[['gupshup.svg','Gupshup'],['msg91.svg','MSG91'],['twilio.svg','Twilio'],['netcore.svg','Netcore']]},
   {e:'🎯',t:'Lead Sources & Marketplaces',d:'Pull verified enquiries from India’s largest education marketplaces in real time.',g:[['careers360.svg','Careers360'],['collegedekho.svg','CollegeDekho'],['collegedunia-learn.svg','Collegedunia'],['collegesearch.svg','CollegeSearch'],['edugorilla.svg','EduGorilla'],['getmyuni.svg','GetMyUni'],['india-study-channel.svg','India Study Channel'],['jagran-josh.svg','Jagran Josh'],['justdial.svg','Justdial'],['mba-universe.svg','MBA Universe'],['shiksha.svg','Shiksha'],['sulekha.svg','Sulekha']]},
   {e:'📢',t:'Advertising & Remarketing',d:'Sync audiences and conversions back to your ad platforms - close the loop on every rupee.',g:[['google-ads.svg','Google Ads'],['google-remarketing.svg','Google Remarketing'],['facebook-ads.svg','Facebook Ads'],['facebook-remarketing.svg','Facebook Remarketing'],['instagram.svg','Instagram'],['linkedin-ads.svg','LinkedIn Ads']]},
   {e:'💳',t:'Payments & Banking',d:'PCI-compliant gateways and banking partners for secure, frictionless fee collection.',g:[['razorpay.svg','Razorpay'],['paytm.svg','Paytm'],['stripe.svg','Stripe'],['easebuzz.svg','Easebuzz'],['hdfc-bank.svg','HDFC Bank'],['adib.svg','ADIB'],['mastercard.svg','Mastercard']]},
   {e:'🌐',t:'Forms & Website Builders',d:'Native connectors for the form and CMS tools you already use - no website lead slips through.',g:[['wordpress.svg','WordPress'],['elementor.svg','Elementor'],['wix.svg','Wix'],['contact-form-7.svg','Contact Form 7'],['typeform.svg','Typeform'],['zoho-forms.svg','Zoho Forms'],['unlayer.svg','Unlayer']]},
   {e:'🧠',t:'Sales Intelligence',d:'Conversation intelligence that turns every counsellor call into coachable insight.',g:[['salesken.svg','Salesken'],['salesquared.svg','Salesquared']]},
   {e:'🎓',t:'Learning & Assessment',d:'Plug into LMS and assessment platforms for one unified journey from admission to classroom.',g:[['collpoll.svg','CollPoll'],['learnyst.svg','Learnyst'],['populi.svg','Populi'],['wheebox.svg','Wheebox'],['unipro-education.svg','Unipro Education']]},
   {e:'⚡',t:'Automation & Productivity',d:'Trigger workflows, send transactional emails and connect 1000+ apps - no code needed.',g:[['zapier.svg','Zapier'],['sendgrid.svg','SendGrid']]}
  ];
  var count=document.getElementById('igCount'),title=document.getElementById('igTitle'),desc=document.getElementById('igDesc'),grid=document.getElementById('igGrid');
  function pad(n){return (n<10?'0':'')+n;}
  C.forEach(function(c,i){var b=document.createElement('button');b.className='ig-nb'+(i===0?' on':'');b.setAttribute('role','tab');b.innerHTML='<span class="e">'+c.e+'</span> '+c.t;b.addEventListener('click',function(){sel(i);});nav.appendChild(b);});
  var btns=nav.querySelectorAll('.ig-nb');var cur=0,timer=null,hovered=false;
  function sel(i){cur=i;btns.forEach(function(b,j){b.classList.toggle('on',j===i);});var c=C[i];
    count.textContent=pad(i+1)+' / '+pad(C.length);title.innerHTML=c.t;desc.innerHTML=c.d;
    grid.innerHTML=c.g.map(function(x){return '<div class="ig-card"><img decoding="async" loading="lazy" src="'+B+x[0]+'" alt="'+x[1]+'"></div>';}).join('');
  }
  sel(0);
  function stepCat(d){if(timer){clearInterval(timer);timer=null;}sel((cur+d+C.length)%C.length);}
  var ip=document.getElementById('igPrev'),inx=document.getElementById('igNext');
  if(ip)ip.addEventListener('click',function(){stepCat(-1);});
  if(inx)inx.addEventListener('click',function(){stepCat(1);});
  var ig=document.getElementById('ig');
  ig.addEventListener('mouseenter',function(){hovered=true;});
  ig.addEventListener('mouseleave',function(){hovered=false;});
  /* Only auto-rotate while the section is actually on screen - otherwise the
     changing grid height reflows the page and jumps content the reader is on. */
  var visible=false;
  var o=new IntersectionObserver(function(es){es.forEach(function(e){visible=e.isIntersecting;});},{threshold:.2});
  o.observe(ig);
  if(!RM)timer=setInterval(function(){if(visible&&!hovered)sel((cur+1)%C.length);},3500);
})();




/* ============ Lead-journey roadmap behind phone ============ */
(function(){
  var rm=document.getElementById('roadmap');if(!rm)return;
  var nodes=rm.querySelectorAll('.rm-node'),prog=document.getElementById('rmProg');
  var i=0,started=false;
  function step(){
    nodes.forEach(function(n,idx){n.classList.toggle('on',idx<=i);});
    if(prog)prog.style.strokeDashoffset=(100-(i+1)*20);
    i++;if(i>=nodes.length){setTimeout(function(){i=0;nodes.forEach(function(n){n.classList.remove('on');});if(prog)prog.style.strokeDashoffset=100;},900);}
  }
  var o=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting&&!started){started=true;step();setInterval(step,RM?4000:1600);o.disconnect();}});},{threshold:.2});
  o.observe(rm);
})();

/* ============ Demo form - functional lead capture via WhatsApp ============ */
(function(){
  var f=document.getElementById('demoForm');if(!f)return;
  function esc(s){return String(s).replace(/[<>&]/g,function(c){return{'<':'&lt;','>':'&gt;','&':'&amp;'}[c];});}
  f.addEventListener('submit',function(e){
    e.preventDefault();
    if(!f.checkValidity()){f.reportValidity&&f.reportValidity();return;}
    var el=f.querySelectorAll('input,select');
    var name=el[0].value.trim(),inst=el[1].value.trim(),wa=el[2].value.trim(),email=el[3].value.trim(),vol=el[4].value;
    var msg='Hi ExtraaEdge! I would like to book a free demo of your AI Admission CRM.%0A'+
      '%0AName: '+encodeURIComponent(name)+'%0AInstitute: '+encodeURIComponent(inst)+
      '%0AWhatsApp: '+encodeURIComponent(wa)+'%0AEmail: '+encodeURIComponent(email)+
      '%0AMonthly enquiries: '+encodeURIComponent(vol);
    var link='https://wa.me/918956982897?text='+msg;
    var ok=document.getElementById('demoOk');
    ok.innerHTML='🎉 Thanks '+esc(name.split(' ')[0]||'')+'! Your request is in - our admissions expert will reach out within the hour.'+
      '<br><a href="'+link+'" target="_blank" rel="noopener" class="btn btn-dark" style="margin-top:14px">Confirm instantly on WhatsApp →</a>';
    f.style.display='none';ok.style.display='block';
    ok.scrollIntoView({behavior:'smooth',block:'center'});
  });
})();



/* (legacy duplicate WebGL hero loop removed - #xhero's scoped renderer owns the canvas and pauses off-screen) */
</script>

<style id="ee-responsive-100">/* ============================================================
   DEVICE-FRIENDLY SAFETY LAYER - 100% readable on all screens.
   Appended last so it wins the cascade over every section style.
   Scoped to .ee-home so the theme header/footer stay untouched.
   Improves readability + removes horizontal overflow on phones &
   tablets without rewriting each section's bespoke design.
   ============================================================ */

/* Contain everything: no sideways scroll,media never overflows. */
.ee-home{overflow-x:clip}.ee-home img,.ee-home svg,.ee-home img.eeimg,.ee-home video,.ee-home iframe,.ee-home canvas{max-width:100%}/* Long words / URLs wrap instead of forcing the page wider. */
.ee-home h1,.ee-home h2,.ee-home h3,.ee-home h4,.ee-home p,.ee-home a,.ee-home li,.ee-home span,.ee-home td{overflow-wrap:normal;word-break:keep-all;hyphens:none}/* Stop iOS inflating text on rotate. */
html{-webkit-text-size-adjust:100%;text-size-adjust:100%}/* Anchor jumps land below the sticky header,not hidden under it. */
.ee-home :target{scroll-margin-top:88px}

/* ---------- Tablet (≤900px) ---------- */
@media (max-width:900px){.ee-home .container{padding-left:20px;padding-right:20px}
}

/* ---------- Phone (≤640px): cap headings, comfy text & taps ---------- */
@media (max-width:640px){.ee-home h1{font-size:clamp(28px,8.4vw,40px)!important;line-height:1.14!important;letter-spacing:-.02em!important}.ee-home h2{font-size:clamp(23px,6.6vw,32px)!important;line-height:1.18!important;letter-spacing:-.01em!important}.ee-home h3{font-size:clamp(18px,5vw,22px)!important;line-height:1.25!important}.ee-home .lead{font-size:clamp(15.5px,4.3vw,17.5px)!important;line-height:1.6!important}.ee-home .container,.ee-home #xhero .container{padding-left:18px!important;padding-right:18px!important}/* Comfortable,finger-friendly buttons */
  .ee-home .btn{padding:13px 20px!important;font-size:15px!important;min-height:48px}
  #xhero .hero__cta{flex-direction:column;align-items:stretch;gap:12px;margin-top:26px}
  #xhero .hero__cta .btn{width:100%;justify-content:center;min-height:54px}
  #xhero .cta-note{text-align:center;font-size:12.5px}
}

/* ---------- Small phone (≤400px) ---------- */
@media (max-width:400px){.ee-home h1{font-size:clamp(25px,8.6vw,33px)!important}.ee-home h2{font-size:clamp(21px,7vw,27px)!important}.ee-home .container,.ee-home #xhero .container{padding-left:15px!important;padding-right:15px!important}/* Full-width stacked buttons are easier to tap on tiny screens */
  .ee-home .btn{width:100%;justify-content:center}
}

/* ============================================================
   MOBILE: flatten the tall scroll-story sections so they stop
   leaving huge empty vh gaps, and tighten every section to a
   ~10px top/bottom rhythm so sections read as distinct blocks.
   ============================================================ */
@media (max-width:768px){/* -- VidyaAI · Admission Intelligence (#vidya) --
     The desktop scroll-scrubbing uses 74-92vh-tall triggers per step,which read as enormous white gaps on a phone. Collapse to a compact
     stacked layout with every step + its visual fully visible (mirrors the
     theme's own no-JS fallback). */
  #vidya .vx-stage{position:static!important;height:auto!important;padding:6px 0!important}#vidya .vx-view{position:static!important;opacity:1!important;visibility:visible!important;height:auto!important}#vidya .vx-body{height:auto!important;min-height:0!important}#vidya .vx-trigger,#vidya .vx-trigger:first-child,#vidya .vx-trigger:last-child{min-height:0!important;padding:8px 0!important}#vidya .vx-step{opacity:1!important;transform:none!important;filter:none!important;margin-bottom:10px}#vidya .stg{opacity:1!important;transform:none!important}#vidya .vx-rail,#vidya .vx-hint,#vidya .vx-dots,#vidya .vx-progress,.vx-progress{display:none!important}/* -- "From first click to enrolment - four moves" (#respond-first) --
     Each of the four "moves" had 48px top+bottom padding on mobile; tighten
     so the steps sit close together without big empty bands. */
  #respond-first .rf-story,#respond-first .rf-story:first-child{padding-top:12px!important;padding-bottom:12px!important}#respond-first .rf-sticky{padding-bottom:8px!important}/* -- Admission Ecosystem (#ecosystem) + every section --
     Uniform 10px top/bottom on the section wrappers so no two sections
     blur together and none carries a tall empty gap on mobile. */
  .ee-home > section{padding-top:10px!important;padding-bottom:10px!important}.ee-home .ee-wrap,.ee-home .rf-wrap,.ee-home .ea-wrap,.ee-home .vx-head,.ee-home .vx-proof{padding-top:10px!important;padding-bottom:10px!important}/* The story iframe section has a dark backdrop - any padding on it shows up
     as a dark horizontal line between sections, so it gets none. */
  .ee-home > #ee-night{padding-top:0!important;padding-bottom:0!important}/* Tighten the gap under each section's heading/intro on mobile. */
  .ee-home .intro,.ee-home .ee-head,.ee-home .sg-head,.ee-home .ci-head{margin-bottom:14px!important}
}/* ============================================================
   PERFORMANCE - Core Web Vitals (LCP + CLS)
   ============================================================ */
/* LCP: the hero <h1> is the page's largest element. It was held at
   opacity:0 for ~0.9s by an entrance animation,so it painted late and
   pushed LCP to ~6s. Show the above-the-fold hero immediately. */
#xhero .reveal,#xhero .reveal.d1,#xhero .reveal.d2,#xhero .reveal.d3,#xhero .reveal.d4,#xhero .step,#xhero .act{opacity:1!important;transform:none!important;animation:none!important}/* CLS: images always keep their natural aspect (never distort) and the
   logo/card boxes already reserve space,so media stops shifting layout. */
.ee-home img{height:auto}
</style>
<!-- ===================== GLOBAL PREMIUM MOTION + POLISH PASS ===================== -->
<style>html{scroll-behavior:smooth}html,body{overflow-x:clip}/* scroll progress bar (brand gradient) */
  #ee-progress{position:fixed;top:0;left:0;height:3px;width:100%;transform:scaleX(0);transform-origin:0 50%;z-index:99999;background:linear-gradient(90deg,#19345d,#DE6E30);box-shadow:0 0 12px rgba(222,110,48,.45);pointer-events:none;will-change:transform}/* section scroll-reveal - class is added by JS only,so no-JS users always see content */
  .ee-reveal{opacity:0;transform:translateY(26px);transition:opacity .85s cubic-bezier(.2,.7,.2,1),transform .85s cubic-bezier(.2,.7,.2,1);will-change:opacity,transform}.ee-reveal.ee-in{opacity:1;transform:none}
  @media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}#ee-progress{display:none}.ee-reveal{opacity:1!important;transform:none!important;transition:none!important}
  }
</style>
<div id="ee-progress" aria-hidden="true"></div>
<script>
(function(){
  /* ---- scroll progress bar ---- */
  var bar=document.getElementById('ee-progress');
  if(bar){
    var barTicking=false;
    var tick=function(){
      if(barTicking) return; barTicking=true;
      requestAnimationFrame(function(){
        barTicking=false;
        var d=document.documentElement, sc=d.scrollTop||document.body.scrollTop, max=(d.scrollHeight-d.clientHeight)||1;
        /* scaleX on a composited layer - no layout/paint work per frame */
        bar.style.transform='scaleX('+Math.min(1,sc/max).toFixed(4)+')';
      });
    };
    window.addEventListener('scroll',tick,{passive:true});
    window.addEventListener('resize',tick,{passive:true}); tick();
  }
  /* ---- premium section scroll-reveal (IntersectionObserver, 60fps) ---- */
  var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches;
  if(reduce||!('IntersectionObserver' in window)) return;     // a11y / old browser: content stays visible
  var skip={xhero:1,'vidya-film':1,'ee-os':1,'ee-night':1};    // these animate themselves
  var io=new IntersectionObserver(function(entries){
    entries.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('ee-in'); io.unobserve(e.target); } });
  },{threshold:0,rootMargin:'0px 0px -12% 0px'});
  var vh=window.innerHeight||document.documentElement.clientHeight;
  [].forEach.call(document.querySelectorAll('section[id]'),function(sec){
    if(skip[sec.id]) return;
    var r=sec.getBoundingClientRect();
    if(r.top < vh*0.9) return;                                // already in/near view -> never hide
    sec.classList.add('ee-reveal');
    io.observe(sec);
  });
})();
</script>

<style id="ee-brand-standard">/* ============================================================
   DESIGN SYSTEM GUARD - Inter only · Navy #19335D · Orange #DE6E30 · white canvas.
   Standardizes the typographic voice on every section without redesigning:
   phones keep the uniform scale defined in ee-responsive-100.
   ============================================================ */
.ee-home{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif}
.ee-home button,.ee-home input,.ee-home select,.ee-home textarea{font-family:inherit}
@media(min-width:761px){
  .ee-home h1{font-weight:800;letter-spacing:-.03em;line-height:1.08}
  .ee-home h2{font-size:clamp(26px,3.2vw,38px)!important;font-weight:800!important;line-height:1.18!important;letter-spacing:-.02em}
  .ee-home h3{line-height:1.3;letter-spacing:-.01em}
  .ee-home h4,.ee-home h5,.ee-home h6{line-height:1.35}
}
/* NOTE: content-visibility:auto was evaluated for the below-fold sections but
   rejected - the placeholder/real height mismatch shifted scroll positions and
   broke scroll-reveal timing (the exact glitches this pass is meant to remove). */
</style>
<style id="ee-seamless">/* One continuous background across the homepage - no divider lines,no section seams */
.ee-home .section-divider{display:none!important}/* ---- premium SaaS abstract background (CSS only · zero images) ---- */
body.ee-home{
  background-color:#ffffff!important;
  background-image:
    radial-gradient(circle at 14% 6%, rgba(34,70,124,.08), transparent 40%),
    radial-gradient(circle at 88% 14%, rgba(222,110,48,.07), transparent 42%),
    radial-gradient(circle at 78% 72%, rgba(34,70,124,.07), transparent 46%),
    radial-gradient(circle at 8% 86%, rgba(222,110,48,.05), transparent 40%),
    linear-gradient(rgba(25,52,93,.022) 1px, transparent 1px),
    linear-gradient(90deg, rgba(25,52,93,.022) 1px, transparent 1px)!important;
  background-size:100% 100%,100% 100%,100% 100%,100% 100%,48px 48px,48px 48px!important;
  background-position:0 0,0 0,0 0,0 0,0 0,0 0!important;
  background-repeat:no-repeat,no-repeat,no-repeat,no-repeat,repeat,repeat!important;
  background-attachment:fixed,fixed,fixed,fixed,fixed,fixed!important;
}
@media (max-width:768px){/* avoid fixed-attachment jank on mobile; drop the grid for clarity */
  body.ee-home{
    background-image:
      radial-gradient(circle at 12% 4%, rgba(34,70,124,.08), transparent 44%),
      radial-gradient(circle at 90% 12%, rgba(222,110,48,.06), transparent 46%)!important;
    background-size:100% 100%,100% 100%!important;
    background-repeat:no-repeat,no-repeat!important;
    background-attachment:scroll,scroll!important;
  }
}#ee-platform,#ee-os,#trusted-institutions,#platform,#respond-first,#ams,#stories,#segments,#ecosystem,#integrations,#whatsapp,#security,#faq,#demo,#ee-cro,.ee-home .sec,.ee-home .sec--soft,.ee-home .logo-section,.ee-home .ci-sec,.ee-home .rf-bp,.ee-home .ea-bp,.ee-home .ee-bp,.ee-home .wa-sec{
  background:transparent!important;border-top:0!important;border-bottom:0!important
}
</style>

<style id="ee-ctx-bg">/* ===== Plain white background across the whole homepage ===== */
body.ee-home{ background:#ffffff!important; }/* remove all graphic background motifs */
#ee-products::before,#ee-teams::before,#ee-solutions::before,#ee-resources::before,#integrations::before,#security::before,#stories::before{ display:none!important; }/* plain white section backgrounds (keeps intentional dark component panels intact) */
#ee-products,#ee-teams,#ee-solutions,#ee-resources,#ee-industries{ background:#ffffff!important; }
</style>

<!-- (removed) EE · SMOOTH INERTIA SCROLL - wheel hijack dropped in favor of native scrolling for performance -->


<style id="ee-brand-lock">
.ee-home, .ee-home *:not(svg):not(svg *){ font-family:'Inter',system-ui,-apple-system,'Segoe UI',Roboto,'Apple Color Emoji','Segoe UI Emoji','Noto Color Emoji',sans-serif !important; }
.ee-home{ background:#ffffff !important; }
</style>

<!-- ===================== See-the-real-CRM popup (opened from the demo CRM iframe) ===================== -->
<style>

*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Inter',system-ui,sans-serif;background:#0f1c30}
.eebk-ov{position:fixed;inset:0;z-index:2147483647;display:none;align-items:center;justify-content:center;padding:24px;background:rgba(9,17,30,.72);backdrop-filter:blur(6px);overflow:auto}
.eebk{position:relative;width:100%;max-width:1220px;background:#fff;border-radius:26px;box-shadow:0 40px 120px rgba(6,14,28,.55);overflow:hidden;font-family:'Inter',sans-serif}
.eebk-x{position:absolute;top:18px;right:18px;z-index:6;width:44px;height:44px;border-radius:50%;border:1px solid #e7ecf3;background:#fff;display:flex;align-items:center;justify-content:center;color:#6b7789;cursor:pointer;transition:.2s;box-shadow:0 4px 12px rgba(25,51,93,.08)}
.eebk-x:hover{background:#f4f6fa;color:#19335D;transform:rotate(90deg)}
.eebk-x svg{width:20px;height:20px}
.eebk-top{display:grid;grid-template-columns:0.68fr 1.32fr;gap:16px;padding:38px 36px 24px;align-items:center}
/* left */
.eebk-brand{display:flex;align-items:center;gap:11px;margin-bottom:26px}
.eebk-brand .wm{height:30px;width:auto;display:block}
.eebk-brand .mk{height:34px;width:auto;display:block}
.eebk-brand .lbl{font-size:12.5px;font-weight:600;color:#8a95a6;border-left:1px solid #e2e7ef;padding-left:11px;letter-spacing:.01em}
.eebk h2{font-family:'Inter',sans-serif;font-size:clamp(30px,3.4vw,44px);font-weight:800;line-height:1.05;letter-spacing:-.03em;color:#19335D;margin:0 0 16px}
.eebk h2 .o{color:#DE6E30}
.eebk .bar{width:54px;height:5px;border-radius:5px;background:#DE6E30;margin:0 0 20px}
.eebk .lead{font-size:16px;line-height:1.62;color:#5a6577;margin:0 0 26px;max-width:34ch}
.eebk-feat{display:flex;align-items:center;gap:14px;margin-bottom:15px}
.eebk-feat .fi{flex:none;width:48px;height:48px;border-radius:13px;display:flex;align-items:center;justify-content:center;color:#fff}
.eebk-feat .fi svg{width:23px;height:23px}
.eebk-feat.f1 .fi{background:linear-gradient(135deg,#2f5aa8,#19335D)}
.eebk-feat.f2 .fi{background:linear-gradient(135deg,#E8843F,#DE6E30)}
.eebk-feat.f3 .fi{background:linear-gradient(135deg,#2f5aa8,#19335D)}
.eebk-feat b{display:block;font-size:16px;font-weight:700;color:#19335D;line-height:1.25}
.eebk-feat span{display:block;font-size:13.5px;color:#8a95a6;margin-top:1px}
/* right - laptop illustration */
.eebk-art{position:relative;display:flex;align-items:center;justify-content:center;min-height:380px}
.eebk-shot{width:100%;height:auto;max-width:100%;display:block;filter:drop-shadow(0 24px 50px rgba(25,51,93,.18))}
.eebk-art .orbit{position:absolute;top:2px;left:44%;transform:translateX(-50%);width:78px;height:78px;border-radius:50%;background:linear-gradient(135deg,#eef3fb,#fff);border:1px solid #e7ecf3;display:flex;align-items:center;justify-content:center;box-shadow:0 12px 30px rgba(25,51,93,.12);z-index:3}
.eebk-art .orbit img{width:42px;height:42px}
.eebk-art .dots{position:absolute;inset:0;z-index:1;pointer-events:none}
.lp{position:relative;width:100%;max-width:460px;z-index:2;margin-top:36px}
.lp-scr{border:7px solid #1a2740;border-bottom:0;border-radius:14px 14px 0 0;background:#12233c;overflow:hidden;display:flex;height:250px}
.lp-side{width:42px;flex:none;background:#0d1b30;display:flex;flex-direction:column;align-items:center;gap:12px;padding:12px 0}
.lp-side i{width:17px;height:17px;border-radius:5px;background:rgba(255,255,255,.14);display:block}
.lp-side i:first-child{background:#DE6E30}
.lp-dash{flex:1;background:#f4f6fa;padding:11px 12px;overflow:hidden}
.lp-dh{display:flex;align-items:center;justify-content:space-between;margin-bottom:9px}
.lp-dh b{font-size:11px;font-weight:700;color:#19335D}
.lp-dh em{width:34px;height:6px;border-radius:3px;background:#dbe2ec;font-style:normal}
.lp-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:6px;margin-bottom:9px}
.lp-st{background:#fff;border-radius:7px;padding:7px 6px;box-shadow:0 1px 3px rgba(25,51,93,.06)}
.lp-st .k{font-size:6px;font-weight:700;letter-spacing:.02em;color:#9aa6b6;text-transform:uppercase;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.lp-st .v{font-size:13px;font-weight:800;color:#19335D;display:block;margin:2px 0}
.lp-st .g{font-size:7px;font-weight:700;color:#1faf66}
.lp-panels{display:grid;grid-template-columns:1fr 1.2fr;gap:6px}
.lp-pan{background:#fff;border-radius:7px;padding:8px;box-shadow:0 1px 3px rgba(25,51,93,.06)}
.lp-pan .pt{font-size:8px;font-weight:700;color:#19335D;margin-bottom:6px;display:flex;justify-content:space-between}
.lp-donut{display:flex;align-items:center;gap:8px}
.lp-donut .ring{width:52px;height:52px;border-radius:50%;flex:none;background:conic-gradient(#3474d3 0 46%,#DE6E30 46% 72%,#E5484D 72% 84%,#7aa5e6 84% 94%,#f0b64a 94% 100%);display:flex;align-items:center;justify-content:center;position:relative}
.lp-donut .ring::after{content:"";position:absolute;width:32px;height:32px;border-radius:50%;background:#fff}
.lp-donut .ring b{position:relative;z-index:1;font-size:9px;font-weight:800;color:#19335D}
.lp-donut .leg{display:flex;flex-direction:column;gap:3px}
.lp-donut .leg span{display:flex;align-items:center;gap:4px;font-size:6.5px;color:#6b7789}
.lp-donut .leg span i{width:5px;height:5px;border-radius:50%;display:block}
.lp-line{width:100%;height:66px;display:block}
.lp-base{height:13px;background:linear-gradient(#c4ccd8,#aab4c3);border-radius:0 0 4px 4px;position:relative;box-shadow:0 12px 26px rgba(25,51,93,.22)}
.lp-base::after{content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);width:56px;height:5px;border-radius:0 0 6px 6px;background:#8f9bad}
/* floating cards */
.fl{position:absolute;background:#fff;border-radius:13px;box-shadow:0 16px 40px rgba(25,51,93,.16);z-index:4}
.fl-ai{top:34px;right:-6px;padding:9px 12px;display:flex;align-items:center;gap:9px;max-width:190px}
.fl-ai .bot{width:30px;height:30px;border-radius:9px;flex:none;background:linear-gradient(135deg,#E8843F,#DE6E30);display:flex;align-items:center;justify-content:center}
.fl-ai .bot svg{width:17px;height:17px;color:#fff}
.fl-ai b{font-size:11px;font-weight:700;color:#19335D;display:block}
.fl-ai span{font-size:9.5px;color:#8a95a6;display:block;margin-top:1px}
.fl-lead{bottom:6px;right:-10px;padding:11px;width:150px;text-align:center}
.fl-lead .av{width:42px;height:42px;border-radius:50%;margin:0 auto 6px;background:linear-gradient(135deg,#8FB2E8,#4E86D8);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:15px;border:2px solid #fff;box-shadow:0 4px 10px rgba(25,51,93,.15)}
.fl-lead p{font-size:11px;font-weight:600;color:#19335D;line-height:1.3;margin:0 0 7px}
.fl-lead .pill{display:inline-block;font-size:9px;font-weight:700;color:#1faf66;background:#e7f8ef;padding:3px 9px;border-radius:99px}
/* bottom cta bar */
.eebk-cta{margin:0 44px;padding:20px 24px;border:1px solid #eef1f5;border-radius:16px;display:grid;grid-template-columns:1fr auto;gap:20px;align-items:center;background:linear-gradient(180deg,#fff,#fcfdff)}
.eebk-cta .lhs{display:flex;align-items:center;gap:15px}
.eebk-cta .hs{width:52px;height:52px;border-radius:50%;flex:none;background:#fff3ec;display:flex;align-items:center;justify-content:center;color:#DE6E30}
.eebk-cta .hs svg{width:26px;height:26px}
.eebk-cta .lhs b{display:block;font-size:16px;font-weight:800;color:#19335D}
.eebk-cta .lhs span{display:block;font-size:13.5px;color:#8a95a6;margin-top:2px}
.eebk-cta .rhs{text-align:center}
.eebk-book{display:inline-flex;align-items:center;justify-content:center;gap:9px;background:linear-gradient(135deg,#E8843F,#DE6E30);color:#fff;font-weight:700;font-size:16px;text-decoration:none;padding:15px 34px;border-radius:12px;box-shadow:0 14px 30px -10px rgba(222,110,48,.65);transition:.2s;white-space:nowrap}
.eebk-book:hover{transform:translateY(-2px);box-shadow:0 20px 40px -10px rgba(222,110,48,.75)}
.eebk-book svg{width:19px;height:19px}
.eebk-keep{display:block;width:100%;margin-top:9px;padding:4px;background:none;border:0;font-family:inherit;font-size:13.5px;font-weight:600;color:#8a95a6;cursor:pointer}
.eebk-keep:hover{color:#19335D}
/* footer trust */
.eebk-foot{display:flex;align-items:center;justify-content:center;gap:9px;padding:20px;margin-top:6px;font-size:14.5px;color:#5a6577;font-weight:500}
.eebk-foot svg{width:19px;height:19px;color:#DE6E30}
.eebk-foot b{color:#19335D;font-weight:800}
@media(max-width:860px){
  .eebk-ov{padding:8px;align-items:flex-start;overflow:auto}
  .eebk{max-width:296px;border-radius:15px;min-height:auto;max-height:calc(100vh - 16px);overflow:auto;margin:6px auto}
  .eebk-top{grid-template-columns:1fr;padding:16px 14px 6px;gap:5px}
  .eebk-art{display:none}
  .eebk-x{top:8px;right:8px;width:32px;height:32px;z-index:6}
  .eebk h2{font-size:17px;line-height:1.2;padding-right:30px}
  .eebk .lead{font-size:11.5px;line-height:1.45;margin-bottom:10px}
  .eebk-feat{margin-bottom:8px;gap:9px}
  .eebk-feat .fi{width:30px;height:30px;border-radius:8px}
  .eebk-feat .fi svg{width:15px;height:15px}
  .eebk-feat b{font-size:12px}
  .eebk-feat span{font-size:10.5px}
  .eebk-cta{grid-template-columns:1fr;margin:0 12px;padding:10px 12px;text-align:center;gap:7px}
  .eebk-cta .lhs{flex-direction:column;text-align:center;gap:8px}
  .eebk-cta .hs{width:32px;height:32px}
  .eebk-cta .hs svg{width:16px;height:16px}
  .eebk-cta .lhs b{font-size:12.5px}
  .eebk-cta .lhs span{font-size:10.5px}
  .eebk-book{width:100%;font-size:13px;padding:10px 18px}
  .eebk-keep{font-size:11.5px;margin-top:5px}
  .eebk-foot{padding:8px 10px 12px;font-size:10.5px}
}

.eebk-ov.on{display:flex}
html.eebk-lock,body.eebk-lock{overflow:hidden}
</style>
<div class="eebk-ov" id="eebkOv">
  <div class="eebk" role="dialog" aria-modal="true">
    <button class="eebk-x" aria-label="Close"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg></button>
    <div class="eebk-top">
      <div class="eebk-left">
        <div class="eebk-brand">
          <img class="wm" src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg" alt="ExtraaEdge" loading="lazy" decoding="async">
          <span class="lbl">Education CRM</span>
        </div>
        <h2>Want to see<br>the <span class="o">real</span> CRM?</h2>
        <div class="bar"></div>
        <p class="lead">This is a guided demo on sample data. Explore the complete, live CRM - every feature, with your own data - just message our team and we will get in touch to give you a full walkthrough.</p>
        <div class="eebk-feat f1"><div class="fi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z"/><path d="M9 12l2 2 4-4"/></svg></div><div><b>100% Secure</b><span>Your data is safe</span></div></div>
        <div class="eebk-feat f2"><div class="fi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></div><div><b>Personalized Walkthrough</b><span>Tailored to your needs</span></div></div>
        <div class="eebk-feat f3"><div class="fi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 2.1 3.1-.5 1 3 2.8 1.5-1.2 2.9 1.2 2.9-2.8 1.5-1 3-3.1-.5L12 22l-2.4-2.1-3.1.5-1-3L2.7 16.4l1.2-2.9-1.2-2.9 2.8-1.5 1-3 3.1.5z"/><path d="M9 12l2 2 4-4"/></svg></div><div><b>No Obligation</b><span>Just explore and decide</span></div></div>
      </div>
      <div class="eebk-art">
        <img class="eebk-shot" src="https://www.extraaedge.com/wp-content/uploads/2026/brand-logo/crm-info-laptop-screen-pop-up.png" alt="ExtraaEdge Education CRM dashboard" loading="lazy" decoding="async">
      </div>
    </div>
    <div class="eebk-cta">
      <div class="lhs"><div class="hs"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 13a8 8 0 0 1 16 0M4 13v3a2 2 0 0 0 2 2h1v-6H6a2 2 0 0 0-2 2zM20 13v3a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 2z"/></svg></div><div><b>See it in action. Experience the difference.</b><span>No commitment. Just clarity.</span></div></div>
      <div class="rhs">
        <a class="eebk-book" href="https://www.extraaedge.com/book-a-demo/" target="_blank" rel="noopener">Book a Demo <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        <button class="eebk-keep" type="button">Keep exploring the demo</button>
      </div>
    </div>
    <div class="eebk-foot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z"/><path d="M9 12l2 2 4-4"/></svg><span>Trusted by <b>500+</b> educational institutes across India</span></div>
  </div>
</div>
<script>
(function(){
  var ov=document.getElementById('eebkOv'); if(!ov) return;
  if(ov.parentNode!==document.body){ document.body.appendChild(ov); }
  function openM(){ ov.classList.add('on'); document.documentElement.classList.add('eebk-lock'); }
  function closeM(){ ov.classList.remove('on'); document.documentElement.classList.remove('eebk-lock'); }
  var x=ov.querySelector('.eebk-x'); if(x) x.addEventListener('click',closeM);
  var keep=ov.querySelector('.eebk-keep'); if(keep) keep.addEventListener('click',closeM);
  var book=ov.querySelector('.eebk-book'); if(book) book.addEventListener('click',function(){ setTimeout(closeM,120); });
  ov.addEventListener('click',function(e){ if(e.target===ov) closeM(); });
  document.addEventListener('keydown',function(e){ if(e.key==='Escape' && ov.classList.contains('on')) closeM(); });
  window.addEventListener('message',function(e){ if(e && e.data==='ee-book-open') openM(); });
})();
</script>




<style id="ee-mobile-grids">
/* No dark page/theme background may peek through at the very bottom
   (the front-page content → footer boundary showed a black strip). Force the
   page wrappers white and remove any collapsing gap at that seam. */
html, body, #main-content, .ee-home{ background-color:#ffffff !important; }
.ee-home{ margin-bottom:0 !important; }
#main-content{ padding-bottom:0 !important; }

/* ---- Mobile: show these sections as 2-up grids ---- */
@media (max-width:640px){
  /* Uniform type scale on phones: H1=28, H2-H6=19, body=14.
     Grid cards keep their own smaller sizes (id-scoped rules below). */
  .ee-home h1{font-size:28px!important;line-height:1.15!important}
  .ee-home h2{font-size:19px!important;line-height:1.25!important}
  .ee-home h3,.ee-home h4,.ee-home h5,.ee-home h6{font-size:19px!important;line-height:1.3!important}
  .ee-home p,.ee-home li{font-size:14px!important;line-height:1.55!important}

  #ee-teams .ee-teams-grid,
  #security .sec-grid,
  #ee-golive .tl,
  #ee-resources .ee-r-grid{
    grid-template-columns:repeat(2,minmax(0,1fr))!important;
    gap:12px!important;
  }
  /* Solutions: show all solution cards as a 2-up grid */
  /* The admissions platform: hide the live spotlight preview on phones,
     show only the products grid */
  #ee-products .eep-spot{display:none!important}
  #ee-products .eep-main{grid-template-columns:1fr!important}

  /* ---- Smaller card text inside the 2-up grids on phones ---- */
  /* One platform, every team */
  #ee-teams .ee-card{padding:16px 14px!important}
  #ee-teams .ee-card-title{font-size:14px!important;line-height:1.2!important}
  #ee-teams .ee-card-benefit{font-size:11.5px!important;line-height:1.45!important}
  #ee-teams .ee-card-arrow{font-size:11.5px!important}
  #ee-teams .ee-chip{width:38px!important;height:38px!important;font-size:18px!important}

  /* Enterprise-grade trust */
  #security .sec-item{padding:16px 12px!important}
  #security .sec-item .ic,#security .sec-item .ic img{height:36px!important}
  #security .sec-item b{font-size:12.5px!important}
  #security .sec-item span{font-size:11px!important;line-height:1.4!important}

  /* Fast implementation timeline */
  #ee-golive .st{padding:18px 12px!important}
  #ee-golive .st .n{width:32px!important;height:32px!important;font-size:14px!important}
  #ee-golive .st .day{font-size:10px!important}
  #ee-golive .st h4{font-size:13px!important}
  #ee-golive .st p{font-size:11.5px!important;line-height:1.4!important}

  /* Resources */
  #ee-resources .ee-r-card{padding:18px 14px!important}
  #ee-resources .ee-r-ico svg,#ee-resources .ee-r-ico img.eeimg{width:20px!important;height:20px!important}
  #ee-resources .ee-r-title{font-size:13.5px!important;margin-bottom:5px!important}
  #ee-resources .ee-r-desc{font-size:11.5px!important;line-height:1.45!important;margin-bottom:12px!important}
  #ee-resources .ee-r-link{font-size:11.5px!important}

  /* Solutions tabs as cards */
  #ee-solutions .sol-tt b{font-size:13.5px!important}
  #ee-solutions .sol-tt span{font-size:11.5px!important;line-height:1.35!important}
  #ee-solutions .sol-ico{width:38px!important;height:38px!important}
  #ee-solutions .sol-ico svg,#ee-solutions .sol-ico img.eeimg{width:20px!important;height:20px!important}

  /* The admissions platform product cards */
  #ee-products .eep-card-title{font-size:13px!important}
  #ee-products .eep-card-desc{font-size:11.5px!important;line-height:1.4!important}
  #ee-products .eep-card-cat{font-size:9px!important}
  #ee-products .eep-card-go{font-size:10.5px!important}
  #ee-products .eep-chip{width:34px!important;height:34px!important}
  #ee-products .eep-chip svg,#ee-products .eep-chip img.eeimg{width:18px!important;height:18px!important}


  /* Hero stats: smaller boxes + numbers */
  #xhero .stats{gap:9px!important;max-width:100%!important;margin-top:24px!important}
  #xhero .stat{padding:11px 12px!important;border-radius:12px!important}
  #xhero .stat__n{font-size:21px!important}
  #xhero .stat__l{font-size:10.5px!important;margin-top:4px!important}

  /* Broad Client Base: 3 stats on a single line */
  #trusted-institutions .logo-stats{display:grid!important;grid-template-columns:repeat(3,1fr)!important;gap:8px!important}
  #trusted-institutions .logo-stats>div>div:first-child{font-size:20px!important}
  #trusted-institutions .logo-stats>div>div:last-child{font-size:9px!important}

  /* ROI calculator: 3 metrics on one line + smaller box */
  #ee-cro .roi-out{padding:16px 14px!important}
  #ee-cro .roi-out .meta{display:grid!important;grid-template-columns:repeat(3,1fr)!important;gap:8px!important}
  #ee-cro .roi-out .meta div b{font-size:15px!important}
  #ee-cro .roi-out .meta div span{font-size:9px!important}
  #ee-cro .roi-out .big{font-size:34px!important}
  #ee-cro .roi-out .rev{font-size:15px!important}

  /* Extensions & Integrations: 3 stats on one line */
  #integrations .ig-stats{display:grid!important;grid-template-columns:repeat(3,1fr)!important;gap:10px!important}
  #integrations .ig-stats .n{font-size:22px!important}
  #integrations .ig-stats .l{font-size:10px!important}

  /* One platform, every team: tighter grid */
  #ee-teams .ee-teams-grid{gap:10px!important}
  #ee-teams .ee-card{padding:13px 11px!important}

  /* Switching is easy: friendlier text sizes */
  #ee-switch .swl h2{font-size:20px!important;line-height:1.2!important}
  #ee-switch .swl p{font-size:13px!important}
  #ee-switch .swl li{font-size:12.5px!important}
  #ee-switch .swr .g{font-size:12.5px!important}
  #ee-switch .swr .gain{font-size:10px!important}
  #ee-switch .swl .cta{font-size:13.5px!important;padding:12px 20px!important}

  /* Hero: keep the trust pill on ONE line, drop the credit-card note,
     keep the secure-transmission label on one line. */
  #xhero .pill{flex-wrap:nowrap!important;gap:6px!important;font-size:9px!important;padding:5px 11px 5px 6px!important;max-width:100%!important}
  #xhero .pill__txt{white-space:nowrap!important;min-width:0!important}
  #xhero .pill__new{font-size:8px!important;padding:2px 6px!important;white-space:nowrap!important}
  #xhero .pill__ico{width:16px!important;height:16px!important}
  #xhero .cta-note{display:none!important}
  #xhero .secure-label{white-space:nowrap!important;letter-spacing:.03em!important;font-size:9.5px!important}

  /* Remove the small eyebrow/label above each section heading - on phones the
     label + the main H2 read as a duplicate "double heading". Sections stay. */
  #trusted-institutions .logo-badge,
  #ee-platform .eep-eyebrow,
  #ee-products .eep-eyebrow,
  #ee-vidya-suite .vsx-eyebrow,
  #ee-teams .ee-teams-eyebrow,
  #ee-solutions .ee-eyebrow,
  #ee-ind .eei-eyebrow,
  #stories .cis-eyebrow,
  #ee-cro .eyebrow,
  #integrations .eyebrow,
  #security .eyebrow,
  #ee-golive .eb,
  #ee-resources .ee-r-eyebrow{ display:none!important; }
}
</style>

<style id="ee-spatial-skin">
/* Apple visionOS "spatial" skin - VISUAL ONLY. Layout, markup and content of
   these sections are untouched; only their backgrounds turn into soft ambient
   depth and their existing cards become frosted glass. */

/* soft ambient depth behind the light sections */
#ee-products, #ee-teams, #ee-solutions, #ee-golive, #ee-resources{
  position:relative;
  background:
    radial-gradient(560px 440px at 6% -8%, rgba(222,110,48,.12), transparent 60%),
    radial-gradient(640px 500px at 102% 8%, rgba(25,51,93,.10), transparent 62%),
    radial-gradient(540px 460px at 48% 112%, rgba(222,110,48,.07), transparent 66%),
    #ffffff !important;
}

/* Spatial cards - ONLY the simple white cards that have dark text. We use a
   near-solid white (readable) + soft depth shadow instead of heavy blur.
   The content panels (.eep-spot / .sol-panel / .sol-tab) are intentionally
   left ALONE: they have their own dark backgrounds with white text, and
   glassing them made that text invisible. */
#ee-products .eep-card,
#ee-teams .ee-card,
#ee-golive .st,
#ee-resources .ee-r-card{
  background:rgba(255,255,255,.96) !important;
  border:1px solid rgba(255,255,255,.9);
  box-shadow:inset 0 1px 0 rgba(255,255,255,.9),
             0 22px 44px -24px rgba(25,52,93,.34),
             0 4px 12px -6px rgba(25,52,93,.14);
}
</style>

<style id="ee-cro-order">
/* CRO / lead-gen section order - DESIGN UNCHANGED, CSS order only.
   Journey: Attention (hero+form) -> instant credibility (logos) ->
   positioning "why us" BEFORE heavy demos (users invest scroll only after
   a reason) -> show-don't-tell interactive demo -> #1 pain differentiator
   (speed-to-lead) -> CRM simplicity -> immersive long-form OS story (deep
   engagement only after buy-in; a 3.4-screen pinned story too early causes
   drop-off) -> platform depth -> AI differentiator -> every team ->
   self-identification (solutions, industries) -> proof from "institutes
   like mine" -> decision tools (comparison + ROI) -> objection handling
   (integrations, security, fast go-live, easy switch) -> nurture ->
   final objections (FAQ) -> footer CTA. */
.ee-home{display:flex;flex-direction:column}
.ee-home>#ee-toc{order:-1}
.ee-home>#xhero{order:10}                 /* Attention: value prop + lead form */
.ee-home>#trusted-institutions{order:20}  /* Instant social proof */
.ee-home>#ee-why{order:30}                /* Positioning: why ExtraaEdge */
.ee-home>#ee-platform{order:40}           /* Show, don't tell: live demo */
.ee-home>#ee-rfa{order:50}                /* Speed-to-lead differentiator */
.ee-home>#vidyaai-embed-root{order:55}    /* Powerful CRM with simplicity */
.ee-home>#ee-night{order:60}              /* Immersive OS story */
.ee-home>#ee-products{order:70}           /* Full platform / modules */
.ee-home>#ee-vidya-suite{order:80}        /* AI differentiator */
.ee-home>#ee-teams{order:90}              /* Every team */
.ee-home>#ee-solutions{order:100}         /* Relevance: solutions */
.ee-home>#ee-ind{order:110}               /* Relevance: industries */
.ee-home>#stories{order:120}              /* Proof: impact stories */
.ee-home>#ee-cro{order:130}               /* Decision: comparison + ROI */
.ee-home>#integrations{order:140}         /* Objection: fits your stack */
.ee-home>#security{order:150}             /* Objection: enterprise trust */
.ee-home>#ee-golive{order:160}            /* Objection: fast go-live */
.ee-home>#ee-switch{order:170}            /* Objection: easy switch */
.ee-home>#ee-resources{order:180}         /* Nurture the not-ready */
.ee-home>#faq{order:190}                  /* Final objections */
</style>

<script>
/* Anchor-landing corrector: with content-visibility, sections render
   just-in-time while a long smooth anchor-scroll is in flight, so estimated
   heights can leave the jump a few hundred px off. Shortly after any hash
   navigation, re-align the target once (instant, imperceptible). Armed only
   around hash changes so normal scrolling is never touched. */
(function(){
  var armedUntil=0;
  function check(){
    if(Date.now()>armedUntil) return;
    var h=location.hash; if(!h||h.length<2) return;
    var el=document.getElementById(decodeURIComponent(h.slice(1))); if(!el) return;
    var sm=parseFloat(getComputedStyle(el).scrollMarginTop)||0;
    var top=el.getBoundingClientRect().top;
    if(Math.abs(top-sm)>12){
      window.scrollTo({top:Math.round(window.pageYOffset+top-sm),left:0,behavior:'instant'});
    }
  }
  function arm(){ armedUntil=Date.now()+2400; setTimeout(check,700); setTimeout(check,1500); setTimeout(check,2300); }
  window.addEventListener('hashchange',arm);
  if(location.hash){ (document.readyState==='complete') ? arm() : window.addEventListener('load',arm); }
})();
</script>
<style id="ee-mobile-compact">
/* ── Mobile compaction pass: smaller grids/cards on phones ── */
@media(max-width:640px){
  /* One platform, every team */
  #ee-teams{padding:44px 0}
  #ee-teams .ee-teams-grid{grid-template-columns:1fr 1fr;gap:10px;margin-top:22px}
  #ee-teams .ee-card{padding:14px 13px;gap:8px;border-radius:13px}
  /* Industries */
  #ee-ind .spx-grid{gap:10px}
  #ee-ind .spx-card{padding:14px 13px;border-radius:13px}
  /* ROI calculator + comparison table */
  #ee-cro .roi-in{padding:16px 14px}
  #ee-cro .roi{border-radius:14px}
  #ee-cro table th,#ee-cro table td{padding:8px 8px;font-size:11px}
  /* Fast implementation timeline */
  #ee-golive{padding:38px 0}
  #ee-golive .rvh{margin-bottom:20px}
  #ee-golive .tl{gap:9px}
  #ee-golive .st{padding:12px 12px;border-radius:12px}
  /* Switching is easy */
  #ee-switch{padding:38px 0}
  #ee-switch .sw{display:grid;grid-template-columns:1fr;gap:14px}
  #ee-switch .swl,#ee-switch .swr{padding:16px 14px;border-radius:14px}
  #ee-switch .g{gap:8px}
  #ee-switch .gain{padding:9px 10px;border-radius:11px}
  #ee-switch .cta{padding:12px 18px;font-size:13.5px}
  /* Resources */
  #ee-resources .ee-r-grid{gap:10px}
  #ee-resources .ee-r-card{padding:14px 13px;border-radius:13px}
  #ee-resources .ee-r-ico{width:34px;height:34px}
}
/* Agentic AI Suite: small side arrows over the swipe rail (phones) */
@media(max-width:900px){
  #ee-vidya-suite .vsx-arw{display:flex;position:absolute;top:50%;transform:translateY(-50%);z-index:6;width:30px;height:30px;border-radius:50%;align-items:center;justify-content:center;border:1px solid rgba(255,255,255,.25);background:rgba(15,28,48,.55);color:#fff;-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);cursor:pointer;box-shadow:0 6px 16px rgba(0,0,0,.28);padding:0}
  #ee-vidya-suite .vsx-arw svg{width:14px;height:14px}
  #ee-vidya-suite .vsx-prev{left:4px}
  #ee-vidya-suite .vsx-next{right:4px}
  #ee-vidya-suite .vsx-arw:active{transform:translateY(-50%) scale(.93)}
}
</style>
<script>
/* Logo marquee watchdog: a few mobile browsers/settings stop the CSS keyframe
   animation (e.g. animation-reducing modes). If a track has not moved ~1s
   after load, drive the same seamless loop with JS instead. Runs only while
   the strip is on screen. */
(function(){
  var sec=document.getElementById('trusted-institutions'); if(!sec) return;
  var visible=true;
  if('IntersectionObserver' in window){
    new IntersectionObserver(function(es){ es.forEach(function(e){ visible=e.isIntersecting; }); },{rootMargin:'100px 0px'}).observe(sec);
  }
  function watch(sel,dir){
    var el=sec.querySelector(sel); if(!el) return;
    var t1=getComputedStyle(el).transform;
    setTimeout(function(){
      var t2=getComputedStyle(el).transform;
      if(t1!==t2) return;                       /* CSS animation is running fine */
      el.style.animation='none';
      var half=el.scrollWidth/2||1, x=(dir>0?-half:0);
      (function step(){
        if(visible){
          x+=dir*0.55;
          if(dir<0&&-x>=half)x=0;
          if(dir>0&&x>=0)x=-half;
          el.style.transform='translateX('+x+'px)';
        }
        requestAnimationFrame(step);
      })();
    },1000);
  }
  setTimeout(function(){ watch('.marquee-left',-1); watch('.marquee-right',1); },1400);
})();
</script>
<style id="ee-render-lazy">
/* ── Rendering performance: below-the-fold static sections skip layout/paint
   entirely while off-screen (content-visibility). The browser renders them
   just-in-time as they approach the viewport; contain-intrinsic-size keeps
   the scrollbar stable. Interactive/pinned sections (hero, product demo,
   night story, CRM, scrollytelling) are deliberately NOT included - their
   scripts measure geometry at load. Unsupported browsers simply ignore. */
#ee-teams,#ee-solutions,#ee-ind,#stories,#ee-cro,#integrations,#security,
#ee-golive,#ee-switch,#ee-resources,#faq{
  content-visibility:auto;
  contain-intrinsic-size:auto 760px;
}
</style>

<style id="ee-cta-unify">
#xhero .cta-roi-link{color:var(--orange-700,#B5551D);font-weight:600;text-decoration:underline;text-underline-offset:3px}
#xhero .cta-roi-link:hover{color:var(--orange-800,#A8501C)}

/* Low-friction secondary CTA: quiet outline so Book a Demo stays dominant */
#xhero .btn-watch{background:transparent!important;color:#19335D!important;
  border:1.5px solid rgba(25,51,93,.35)!important;border-radius:9px!important;
  font-weight:600!important;box-shadow:none!important}
#xhero .btn-watch:hover{background:#EEF2F8!important;border-color:#19335D!important;
  transform:translateY(-2px);box-shadow:none!important}

/* ── Unified CTA look: every page-level button matches the header's
   "Book Demo" (same orange gradient, 9px radius, 600 weight, hover lift).
   Mockup-internal buttons (phone/app replicas) keep their own styles. ── */
.ee-home .btn.btn-primary,.ee-home .btn.btn-dark,
#trusted-institutions .btn-primary,
.eep-explore-btn,.eep-spot-cta,.eep-mbook,
#stories .cis-btn.primary,
#ee-cro .roi-out .cta,
.vsx-card-cta,.vsx-cta-btn,
#ee-solutions .solb-cta,
#ee-golive .eebk-book,
#ee-form-7 input[type="submit"],#ee-form-7 button[type="submit"]{
  background:linear-gradient(135deg,#DE6E30,#FF8A5C)!important;
  color:#fff!important;
  border-radius:9px!important;
  font-weight:600!important;
  border:none!important;
  box-shadow:0 4px 14px rgba(222,110,48,.25)!important;
}
.ee-home .btn.btn-primary:hover,.ee-home .btn.btn-dark:hover,
#trusted-institutions .btn-primary:hover,
.eep-explore-btn:hover,.eep-spot-cta:hover,.eep-mbook:hover,
#stories .cis-btn.primary:hover,
#ee-cro .roi-out .cta:hover,
.vsx-card-cta:hover,.vsx-cta-btn:hover,
#ee-solutions .solb-cta:hover,
#ee-golive .eebk-book:hover,
#ee-form-7 input[type="submit"]:hover,#ee-form-7 button[type="submit"]:hover{
  background:linear-gradient(135deg,#B85920,#C75E24)!important;
  color:#fff!important;
  transform:translateY(-2px);
  box-shadow:0 6px 22px rgba(222,110,48,.35)!important;
}
</style>

<style id="ee-sol-white">
/* ── Solutions: all-white treatment. The navy hero card (solb-a), tinted
   card (solb-c) and orange card (solb-d) all become white cards with the
   same hairline border + soft shadow as solb-b; their text recolours to
   the standard navy/muted palette. ── */
#ee-solutions{background:#ffffff!important}
#ee-solutions::before{display:none!important}
#ee-solutions .solb-a,#ee-solutions .solb-c,#ee-solutions .solb-d{
  background:#ffffff!important;color:var(--ink,#0f203a)!important;
  border:1px solid rgba(25,52,93,.09)!important;
  box-shadow:0 1px 2px rgba(15,32,58,.04),0 14px 34px -22px rgba(15,32,58,.22)!important;
}
#ee-solutions .solb-a::after,#ee-solutions .solb-d::after{display:none!important}
#ee-solutions .solb-a h3,#ee-solutions .solb-d h3{color:#19345d!important}
#ee-solutions .solb-a .solb-desc,#ee-solutions .solb-d .solb-desc{color:#5a6b85!important}
#ee-solutions .solb-a .solb-tag{
  color:var(--orange-700,#B5551D)!important;
  background:rgba(222,110,48,.08)!important;
  border-color:rgba(222,110,48,.22)!important;
}
#ee-solutions .solb-a .solb-ghost{color:rgba(25,52,93,.05)!important}
#ee-solutions .solb-a .solb-link{
  background:#fff!important;border:1px solid rgba(25,52,93,.09)!important;color:var(--ink,#0f203a)!important;
}
#ee-solutions .solb-a .solb-link:hover{background:#fff!important;border-color:rgba(222,110,48,.5)!important}
#ee-solutions .solb-a .solb-lt span{color:#5a6b85!important}
#ee-solutions .solb-a .solb-arr{color:#5a6b85!important}
#ee-solutions .solb-a .solb-link:hover .solb-arr{color:var(--orange-700,#B5551D)!important}
</style>
<?php get_footer(); ?>
