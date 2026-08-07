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
<!-- ee-front-tpl v2026-08-08-hero-thumb -->
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
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}.stat{text-align:center;padding:28px 18px;border-radius:18px;background:#fff;border:1px solid var(--line);box-shadow:var(--shadow-sm)}.stat__n{font-family:'Inter',sans-serif;font-size:46px;font-weight:800;letter-spacing:-2px;line-height:1}.stat__l{color:#33415C;font-size:14px;margin-top:8px;font-weight:600}/* ===================== CAPS ===================== */
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
.ee-home > section:not(#ee-vidya-suite){
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
  background:var(--bg);color:var(--navy);font-family:var(--font);-webkit-font-smoothing:antialiased}#xhero *{margin:0;padding:0;box-sizing:border-box}#xhero a{text-decoration:none;color:inherit}#xhero .container{max-width:1500px;margin:0 auto;padding:0 32px;min-width:0;width:100%}@media(max-width:380px){#xhero .container{padding:0 16px}}#xhero #glsl{position:absolute;inset:0;width:100%;height:100%;z-index:-3;opacity:.6}#xhero .hero__veil{position:absolute;inset:0;z-index:-2;background:radial-gradient(110% 80% at 80% 0%,transparent 25%,var(--bg) 72%),linear-gradient(to top,var(--bg) 0%,transparent 30%)}#xhero .hero__grid{position:absolute;inset:0;z-index:-1;pointer-events:none;background-image:linear-gradient(var(--navy-06) 1px,transparent 1px),linear-gradient(90deg,var(--navy-06) 1px,transparent 1px);background-size:72px 72px;-webkit-mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%);mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%)}#xhero .hero__in{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1fr) minmax(520px,760px);gap:40px;align-items:center}#xhero .reveal{opacity:0;transform:translateY(22px);animation:xh-rise .9s cubic-bezier(.2,.7,.2,1) forwards}
@keyframes xh-rise{to{opacity:1;transform:none}}#xhero .d1{animation-delay:.05s}#xhero .d2{animation-delay:.16s}#xhero .d3{animation-delay:.27s}#xhero .d4{animation-delay:.38s}#xhero .d5{animation-delay:.5s}#xhero .d6{animation-delay:.64s}#xhero .pill{display:inline-flex;align-items:center;gap:9px;padding:7px 16px 7px 8px;border:1px solid var(--navy-15);border-radius:99px;background:linear-gradient(110deg,var(--org-12),rgba(222,110,48,.02) 60%);font-size:13px;font-weight:500;letter-spacing:.01em;color:var(--navy-70)}#xhero .pill b{color:var(--orange);font-weight:700}#xhero .pill__txt{flex:1;min-width:0}#xhero .pill__ico{width:20px;height:20px;object-fit:contain;border-radius:6px;background:#fff;padding:1.5px;box-shadow:0 0 0 1px var(--navy-10)}#xhero .pill__new{font-size:10px;font-weight:800;letter-spacing:.12em;color:#fff;background:var(--orange);padding:3px 8px;border-radius:99px}#xhero h1{font-family:var(--font);font-weight:800;font-size:clamp(40px,2.8vw,66px);line-height:1.05;letter-spacing:-.035em;margin:26px 0 0;color:var(--navy)}#xhero h1 .accent{color:var(--orange);position:relative;white-space:normal;overflow-wrap:break-word}#xhero h1 .accent svg,#xhero h1 .accent img.eeimg{position:absolute;left:0;right:0;bottom:-.14em;width:100%;height:.22em;overflow:visible}#xhero h1 .accent svg path,#xhero h1 .accent img.eeimg path{fill:none;stroke:var(--orange);stroke-width:7;stroke-linecap:round;opacity:.45;stroke-dasharray:600;stroke-dashoffset:600;animation:xh-draw 1.1s .9s ease forwards}
@keyframes xh-draw{to{stroke-dashoffset:0}}#xhero .hero__type-row{display:block;min-height:1.1em;white-space:normal;overflow-wrap:break-word;color:var(--navy)}#xhero .caret{display:none;width:3px;height:.84em;margin-left:6px;vertical-align:-.08em;background:var(--orange);animation:xh-blink 1s steps(1) infinite;border-radius:2px}
@keyframes xh-blink{50%{opacity:0}}#xhero .sub{margin-top:22px;max-width:540px;font-size:17.5px;line-height:1.65;color:var(--navy-70)}#xhero .sub b{color:var(--navy);font-weight:700}#xhero .chips{display:flex;flex-wrap:wrap;gap:9px;margin-top:22px}#xhero .chip{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-15);border-radius:9px;padding:7px 11px;background:#fff}#xhero .chip i{font-style:normal;color:var(--orange)}#xhero .hero__cta{display:flex;align-items:center;gap:16px;margin-top:34px;flex-wrap:wrap}#xhero .btn{position:relative;display:inline-flex;align-items:center;gap:10px;font-weight:700;font-size:15.5px;letter-spacing:-.01em;border-radius:13px;padding:17px 30px;cursor:pointer;transition:transform .25s cubic-bezier(.2,.7,.2,1),box-shadow .25s}#xhero .btn-primary{color:#fff;background:linear-gradient(180deg,#E87E43,var(--orange));overflow:hidden;box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 14px 34px -10px rgba(222,110,48,.55)}#xhero .btn-primary:hover{box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 20px 44px -10px rgba(222,110,48,.7);transform:translateY(-2px)}#xhero .btn-primary .shine{position:absolute;top:0;left:-80%;width:55%;height:100%;transform:skewX(-22deg);background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);animation:xh-shine 4.2s ease-in-out infinite}
@keyframes xh-shine{0%,55%{left:-80%}75%,100%{left:140%}}#xhero .btn-primary .arr{transition:transform .25s}#xhero .btn-primary:hover .arr{transform:translateX(4px)}#xhero .btn-ghost{color:var(--navy);border:1.5px solid var(--navy-15);background:#fff}#xhero .btn-ghost:hover{border-color:var(--navy);background:var(--navy-03)}#xhero .btn-ghost .play{display:grid;place-items:center;width:22px;height:22px;border-radius:50%;background:var(--navy-10);color:var(--navy);font-size:9px}#xhero .cta-note{font-size:12.5px;color:var(--navy-55)}#xhero .stats{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:38px;width:100%;max-width:480px}#xhero .stat{position:relative;background:#fff;border:1px solid var(--navy-10);border-radius:14px;padding:16px 18px;box-shadow:0 8px 24px rgba(25,52,93,.06);transition:transform .2s,box-shadow .25s,border-color .25s}#xhero .stat:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(25,52,93,.12);border-color:rgba(222,110,48,.45)}#xhero .stat__n{font-weight:800;font-size:30px;letter-spacing:-.03em;color:var(--navy);line-height:1}#xhero .stat__n em{font-style:normal;color:var(--orange)}#xhero .stat__l{margin-top:6px;font-size:12.5px;font-weight:600;color:#33415C}#xhero .console-wrap{position:relative;perspective:1400px}#xhero .console{position:relative;border-radius:var(--r-lg);border:1px solid var(--navy-15);background:#fff;box-shadow:0 40px 90px -34px rgba(25,52,93,.35),0 2px 6px rgba(25,52,93,.06);padding:22px 22px 18px;transform-style:preserve-3d;transition:transform .4s ease}#xhero .console::before{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1.5px;pointer-events:none;background:linear-gradient(135deg,var(--orange),transparent 32%,transparent 68%,var(--navy));opacity:.5;-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude}#xhero .console__top{display:flex;align-items:center;justify-content:space-between;gap:12px;padding-bottom:16px;border-bottom:1px dashed var(--navy-15)}#xhero .brand{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:700;color:var(--navy);white-space:nowrap}#xhero .orb{position:relative;display:grid;place-items:center;width:32px;height:32px;border-radius:10px;padding:2px;color:#fff;font-weight:800;font-size:14px;background:conic-gradient(from 200deg,var(--orange),var(--navy),var(--orange));box-shadow:0 4px 12px rgba(222,110,48,.3)}#xhero .orb img{width:100%;height:100%;object-fit:contain;border-radius:8px;background:#fff;padding:2px}#xhero .brand small{display:inline;font-weight:600;font-size:10px;color:var(--navy-55);letter-spacing:.1em;margin-left:7px;vertical-align:1px}#xhero .brand small::before{content:"·";margin-right:7px;color:var(--navy-55)}#xhero .live-dot{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.12em;color:var(--orange);border:1px solid var(--org-25);background:var(--org-12);border-radius:99px;padding:5px 11px}#xhero .ping{position:relative;width:7px;height:7px;border-radius:50%;background:var(--orange);display:inline-block}#xhero .ping::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:1px solid var(--orange);animation:xh-ping 1.6s ease-out infinite}
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
  #xhero,#trusted-institutions,#ee-platform,#ee-why,#ee-rfa,#ee-products,#ee-vidya-suite,#ee-solutions,#ee-ind,#stories,#ee-cro,#integrations,#security,#ee-golive,#ee-resources,#faq,#admission-form{scroll-margin-top:86px}#ee-toc{font-family:'Inter',system-ui,-apple-system,sans-serif}#ee-toc button,#ee-toc a{font-family:inherit}/* launcher */
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
      <li><a href="#ee-products" data-t="ee-products"><i>04</i><span>The admissions platform</span></a></li>
      <li><a href="#ee-vidya-suite" data-t="ee-vidya-suite"><i>05</i><span>Agentic AI Suite</span></a></li>
      <li><a href="#ee-solutions" data-t="ee-solutions"><i>06</i><span>Solutions</span></a></li>
      <li><a href="#ee-ind" data-t="ee-ind"><i>07</i><span>Industries</span></a></li>
      <li><a href="#stories" data-t="stories"><i>08</i><span>CRM Impact Stories</span></a></li>
      <li><a href="#ee-cro" data-t="ee-cro"><i>09</i><span>Why teams switch to us</span></a></li>
      <li><a href="#integrations" data-t="integrations"><i>10</i><span>Extensions &amp; Integrations</span></a></li>
      <li><a href="#security" data-t="security"><i>11</i><span>Enterprise-grade trust</span></a></li>
      <li><a href="#ee-golive" data-t="ee-golive"><i>12</i><span>Fast implementation</span></a></li>
      <li><a href="#ee-resources" data-t="ee-resources"><i>13</i><span>Resources</span></a></li>
      <li><a href="#faq" data-t="faq"><i>14</i><span>Frequently Asked</span></a></li>
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
      <style>#xhero .hero__rot{font-size:clamp(25px,3.4vw,46px)!important;line-height:1.12;letter-spacing:-.03em;min-height:clamp(118px,16vh,200px);min-height:max(clamp(118px,16vh,200px),4.6em);transition:opacity .55s cubic-bezier(.25,.6,.25,1),transform .55s cubic-bezier(.25,.6,.25,1);will-change:opacity,transform}#xhero .hero__rot.is-out{opacity:0!important;transform:translateY(10px)!important}#xhero .hero-caret{display:none;width:3px;height:.92em;margin-left:4px;border-radius:2px;background:var(--orange);vertical-align:-1px;animation:heroCaretBlink 1s steps(1) infinite}
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
        <a href="#ee-platform" class="btn btn-watch" data-eep-full><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="width:15px;height:15px;flex:none"><path d="M8 5v14l11-7z"/></svg> Explore the Platform Yourself</a>
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
    <style>/* ── Product Overview panel — sits where the demo form used to ── */
      #xhero .hero-pov{width:100%;position:relative;text-align:center}
      /* soft ambient glow so the frame sits IN the page, not on a card */
      #xhero .hero-pov::before{content:'';position:absolute;left:50%;top:54%;transform:translate(-50%,-50%);width:118%;height:82%;pointer-events:none;z-index:0;background:radial-gradient(48% 42% at 32% 38%,rgba(222,110,48,.16),transparent 70%),radial-gradient(52% 46% at 72% 62%,rgba(25,52,93,.14),transparent 72%);filter:blur(34px)}
      #xhero .hero-pov>*{position:relative;z-index:1}
      #xhero .hp-chip{display:inline-flex;background:linear-gradient(135deg,#E8843F 0%,#DE6E30 55%,#C2541C 100%);color:#fff;font:800 11px/1 'Inter',sans-serif;letter-spacing:.1em;text-transform:uppercase;padding:8px 18px;border-radius:999px;box-shadow:0 18px 44px -14px rgba(222,110,48,.55);margin-bottom:10px}
      /* same id/class/type counts as the site heading-scale rule; prints later, wins the tie */
      html body #main-content #xhero h2.h2.hp-h2{margin:0 0 8px !important;color:#19335D !important;font-weight:800 !important;text-align:center !important}
      #xhero .hp-sub{max-width:48ch;margin:0 auto 12px;color:#5a6b85;font-size:13.5px;line-height:1.6}
      #xhero .hp-vid{position:relative;border-radius:20px;overflow:hidden;cursor:pointer;background:#0F2040;aspect-ratio:16/9;border:1px solid rgba(255,255,255,.65);outline:1px solid rgba(25,52,93,.12);box-shadow:0 60px 120px -36px rgba(15,32,64,.55),0 24px 48px -24px rgba(15,32,64,.35),0 2px 8px rgba(15,32,64,.12)}
      #xhero .hp-vid img{width:100%;height:100%;object-fit:cover;display:block}
      #xhero .hp-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,.94);backdrop-filter:blur(4px);display:grid;place-items:center;box-shadow:0 18px 44px rgba(15,32,64,.45),0 0 0 10px rgba(255,255,255,.18);transition:transform .2s ease,box-shadow .2s ease}
      #xhero .hp-play svg{width:22px;height:22px;margin-left:3px;color:#DE6E30}
      #xhero .hp-vid:hover .hp-play{transform:translate(-50%,-50%) scale(1.08);box-shadow:0 22px 52px rgba(15,32,64,.5),0 0 0 14px rgba(255,255,255,.22)}
      #xhero .hp-vid:focus-visible{outline:3px solid #19335D;outline-offset:3px}
      #xhero .hp-vid.playing{cursor:default}
      #xhero .hp-vid iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
      #xhero .hp-trio{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-top:18px}
      #xhero .hp-t{display:flex;align-items:center;justify-content:center;gap:8px;text-align:left}
      #xhero .hp-t svg{width:22px;height:22px;flex:none;color:var(--orange-700,#B5551D)}
      #xhero .hp-t b{display:block;font:700 12px/1.3 'Inter',sans-serif;color:#19335D}
      #xhero .hp-t small{display:block;font:600 10.5px/1.3 'Inter',sans-serif;color:#7a889e}
      @media(max-width:1024px){#xhero .hero-pov{max-width:540px;margin:0 auto}}
      @media(max-width:480px){#xhero .hp-vid{border-radius:14px}/* the trio stays on one line - three tight columns, smaller marks */#xhero .hp-trio{grid-template-columns:repeat(3,1fr);gap:6px;margin-top:14px;padding-top:12px}#xhero .hp-t{justify-content:center;gap:5px}#xhero .hp-t svg{width:16px;height:16px}#xhero .hp-t b{font-size:10px;white-space:nowrap}#xhero .hp-t small{font-size:9px;white-space:nowrap}}
      @media(prefers-reduced-motion:reduce){#xhero .hp-play{transition:none}}
    </style>
    <aside class="hero-pov reveal d4" aria-label="Product overview">
      <h2 class="h2 hp-h2">See ExtraaEdge in Action - 2-Minute Product Overview</h2>
      <p class="hp-sub">How our AI-powered Admission CRM helps you attract, engage and enroll more students.</p>
      <div class="hp-vid" id="hpVid" data-yt="cCa7ZOJi694" role="button" tabindex="0" aria-label="Play the ExtraaEdge product overview video">
        <img src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/hero-thubnail.png" alt="ExtraaEdge product overview" loading="lazy" decoding="async" width="1280" height="720"
             onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/cCa7ZOJi694/maxresdefault.jpg';">
        <span class="hp-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </div>
      <div class="hp-trio">
        <div class="hp-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M22 9l-10-4-10 4 10 4 10-4v6"/><path d="M6 10.6V16a6 3 0 0 0 12 0v-5.4"/></svg><span><b>Built for</b><small>Education</small></span></div>
        <div class="hp-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/><path d="M18.5 15.5l.7 1.8 1.8.7-1.8.7-.7 1.8-.7-1.8-1.8-.7 1.8-.7.7-1.8z"/></svg><span><b>AI-Powered</b><small>Automation</small></span></div>
        <div class="hp-t"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path d="M21 21v-2a4 4 0 0 0-3-3.85"/></svg><span><b>Trusted by</b><small>500+ Institutions</small></span></div>
      </div>
    </aside>
  </div>
</section>

<!-- ── Book-a-Demo drawer — the hero form lives here now; every link to
     #admission-form on this page slides it open ── -->
<style id="ee-demo-drawer-css">
.eedd-backdrop{position:fixed;inset:0;background:rgba(10,20,40,.52);opacity:0;visibility:hidden;transition:opacity .28s ease,visibility .28s ease;z-index:99996}
.eedd-backdrop.open{opacity:1;visibility:visible}
.ee-demo-drawer{position:fixed;top:0;right:0;bottom:0;width:min(440px,100vw);background:#F6F8FB;z-index:99997;
  transform:translateX(105%);transition:transform .38s cubic-bezier(.3,.8,.3,1);display:flex;flex-direction:column;
  box-shadow:-28px 0 70px rgba(15,32,64,.3)}
.ee-demo-drawer.open{transform:none}
.eedd-head{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:16px 20px;background:#19335D;color:#fff}
.eedd-head b{font:800 16px/1.2 'Inter',system-ui,sans-serif}
.eedd-head small{display:block;font:600 11px/1.4 'Inter',sans-serif;color:#C8D4E6;margin-top:3px}
.eedd-x{flex:none;width:34px;height:34px;border-radius:50%;border:0;background:rgba(255,255,255,.14);color:#fff;font-size:16px;line-height:1;cursor:pointer}
.eedd-x:hover{background:rgba(255,255,255,.28)}
.eedd-body{flex:1 1 auto;overflow-y:auto;padding:22px 20px 28px}
.eedd-body .secure-label{text-align:center;margin-top:16px;font-size:10.5px;color:rgba(25,52,93,.5);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
@media(prefers-reduced-motion:reduce){.ee-demo-drawer,.eedd-backdrop{transition:none}}
</style>
<div class="eedd-backdrop" id="eeddBack" aria-hidden="true"></div>
<aside class="ee-demo-drawer" id="admission-form" role="dialog" aria-modal="true" aria-label="Book a demo">
  <div class="eedd-head">
    <span><b>Book a Demo</b><small>Personalised to your institution &middot; No credit card</small></span>
    <button type="button" class="eedd-x" id="eeddClose" aria-label="Close">&#10005;</button>
  </div>
  <div class="eedd-body">
    <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
    <div id="ee-form-7"></div>
    <p class="secure-label">&#128274; Secure Data Transmission Active</p>
  </div>
</aside>
<script>
(function(){
  /* Product overview video — nothing loads from YouTube until it is asked for */
  var v=document.getElementById('hpVid');
  if(v){
    var play=function(){
      if(v.classList.contains('playing')) return;
      v.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+v.getAttribute('data-yt')+'?autoplay=1&rel=0&modestbranding=1" title="ExtraaEdge product overview" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      v.classList.add('playing'); v.removeAttribute('role'); v.removeAttribute('tabindex');
    };
    v.addEventListener('click',play);
    v.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){ e.preventDefault(); play(); } });
  }

  /* Drawer. Every #admission-form link on the page slides it open, so the
     hero button, the Vidya cards and the Solutions bento all land here. */
  var dr=document.getElementById('admission-form'),
      back=document.getElementById('eeddBack'),
      x=document.getElementById('eeddClose'),
      last=null;
  if(!dr||!back||!x) return;
  function openD(from){
    last=from||null;
    dr.classList.add('open'); back.classList.add('open');
    document.body.style.overflow='hidden';
    x.focus();
  }
  function closeD(){
    dr.classList.remove('open'); back.classList.remove('open');
    document.body.style.overflow='';
    if(last&&last.focus) last.focus();
  }
  document.addEventListener('click',function(e){
    var a=e.target.closest('a[href$="#admission-form"]');
    if(!a) return;
    e.preventDefault(); openD(a);
  });
  x.addEventListener('click',closeD);
  back.addEventListener('click',closeD);
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&dr.classList.contains('open')) closeD(); });
})();
</script>
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
  /* Unhurried, even cadence. No character-by-character backspacing - the
     finished line holds, fades out as a whole (the .is-out transition),
     and the next phrase types in. Deleting backwards read as jittery;
     the crossfade is what makes it feel composed. */
  var TYPE=40, HOLD=3000, GAP=300, FADE=580, START_HOLD=3200;
  function render(k){
    var d=DATA[i], pl=d.pre.length;
    if(k<=pl){ pre.textContent=d.pre.slice(0,k); acc.textContent=''; }
    else { pre.textContent=d.pre; acc.textContent=d.acc.slice(0,k-pl); }
  }
  function typeLoop(){
    if(paused){ t=setTimeout(typeLoop,200); return; }
    var full=DATA[i].pre.length+DATA[i].acc.length;
    n++; render(n);
    if(n>=full){ t=setTimeout(swapLoop,HOLD); return; }
    t=setTimeout(typeLoop,TYPE);
  }
  function swapLoop(){
    if(paused){ t=setTimeout(swapLoop,200); return; }
    el.classList.add('is-out');
    t=setTimeout(function(){
      i=(i+1)%DATA.length; n=0; render(0);
      el.classList.remove('is-out');
      t=setTimeout(typeLoop,GAP);
    },FADE);
  }
  /* start fully showing headline 1 (SEO-friendly, no flash), then cycle */
  n=DATA[0].pre.length+DATA[0].acc.length; render(n);
  t=setTimeout(swapLoop,START_HOLD);
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
/* ── strip breathing room ──────────────────────────────────────────────────
   The two rows sat directly on top of each other and the cards were 26px
   apart, so the strip read as one dense block. Last in the stylesheet so it
   wins the ties above. */
#trusted-institutions .marquee-wrap{padding:10px 0}
#trusted-institutions .marquee-track{gap:34px}
#trusted-institutions .marquee-right{margin-top:20px}
#trusted-institutions .logo-card{padding:18px}
@media(max-width:900px){
  #trusted-institutions .marquee-track{gap:24px}
  #trusted-institutions .marquee-right{margin-top:14px}
}
@media(max-width:600px){
  #trusted-institutions .marquee-track{gap:16px}
  #trusted-institutions .marquee-right{margin-top:12px}
  #trusted-institutions .logo-card{padding:12px}
}
</style>
<!-- ═══ LOGO MARQUEE ═══ -->

<!-- ===================== EXTRAAEDGE PLATFORM · live interactive demo ===================== -->
</style>


<section class="logo-section" id="trusted-institutions" aria-label="Trusted Institutions">
  <div class="logo-header reveal">
    <h2 class="logo-title" style="font-family:var(--font-h);font-weight:800;font-size:clamp(1.5rem,3.2vw,2.2rem);color:var(--blue);line-height:1.18;letter-spacing:-.02em;margin:6px 0 12px">Trusted by 500+ educational institutions across India</h2>
    <p class="logo-sub" style="max-width:760px;margin:0 auto 18px;color:#5a6b85;font-size:clamp(.95rem,1.6vw,1.05rem);line-height:1.6">ExtraaEdge powers <strong>5M+ student leads</strong> and <strong>100M+ student interactions</strong>, enabling universities, colleges, and EdTech organizations to accelerate admissions with AI-powered CRM and intelligent automation.</p>
  </div>
  <?php
  /* The home logo set lives in inc/institute-logos.php alongside every other
     category, so this strip and the [ee_logos] shortcode can never disagree.
     Odd/even split feeds the two counter-scrolling rows; each row is printed
     twice because the -50% loop needs a duplicate to be seamless. */
  $ee_home_logos  = function_exists('ee_institute_logos_for') ? ee_institute_logos_for('home') : array();
  $ee_quotes      = function_exists('ee_logo_quotes') ? ee_logo_quotes() : array();
  if (function_exists('ee_logos_quote_ui')) ee_logos_quote_ui();
  $ee_row_a = array(); $ee_row_b = array();
  foreach ($ee_home_logos as $ee_i => $ee_l) { if ($ee_i % 2 === 0) $ee_row_a[] = $ee_l; else $ee_row_b[] = $ee_l; }
  $ee_rows = array('marquee-left' => $ee_row_a, 'marquee-right' => $ee_row_b);
  ?>
  <div class="marquee-wrap">
    <?php foreach ($ee_rows as $ee_dir => $ee_row) : if (!$ee_row) continue; ?>
    <div class="marquee-track <?php echo esc_attr($ee_dir); ?>">
      <?php for ($ee_pass = 0; $ee_pass < 2; $ee_pass++) : foreach ($ee_row as $ee_l) : ?>
      <?php $ee_q = isset($ee_quotes[$ee_l['u']]) ? trim($ee_quotes[$ee_l['u']]) : ''; ?>
      <div class="logo-card<?php echo $ee_q ? ' has-q' : ''; ?>"<?php
        echo $ee_pass ? ' aria-hidden="true"' : '';
        /* the quote written in Site Editor rides along, so hovering a logo
           here shows the same testimonial as anywhere else it appears */
        if ($ee_q) echo ' data-q="' . esc_attr($ee_q) . '" data-who="' . esc_attr($ee_l['a']) . '" tabindex="0"';
      ?>><img src="<?php echo esc_url($ee_l['u']); ?>" alt="<?php echo $ee_pass ? '' : esc_attr($ee_l['a'] . ' — ExtraaEdge admissions CRM'); ?>" loading="lazy" decoding="async" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <?php endforeach; endfor; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <div style="text-align:center;margin-top:26px">
    <a href="#admission-form" style="display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:.95rem;color:#19345d;border:1.5px solid rgba(25,52,93,.18);background:#fff;border-radius:999px;padding:11px 24px;text-decoration:none;transition:all .2s ease" onmouseover="this.style.borderColor='#DE6E30';this.style.color='#DE6E30'" onmouseout="this.style.borderColor='rgba(25,52,93,.18)';this.style.color='#19345d'">View More Clients <span aria-hidden="true">&rarr;</span></a>
  </div>
</section>

<!-- ===================== WHY INSTITUTES CHOOSE EXTRAAEDGE (scoped #ee-why) ===================== -->
<style id="eew2-style">
/* ── Why ExtraaEdge: pinned scroll story. The visual + step list stay
   centred mid-viewport while scroll progress drives the five stages. ── */
#ee-why{position:relative;background:
  radial-gradient(720px 420px at 8% 4%, rgba(222,110,48,.06), transparent 62%),
  radial-gradient(720px 460px at 96% 90%, rgba(25,52,93,.06), transparent 62%),#fff;
  font-family:'Inter',system-ui,sans-serif;padding:0}
#ee-why *{box-sizing:border-box}
#ee-why .eew2-track{position:relative;height:calc(min(100vh,880px)*2.6)}
#ee-why .eew2-pin{position:sticky;top:86px;height:min(calc(100vh - 86px),820px);overflow:hidden;
  display:flex;flex-direction:column;justify-content:center;justify-content:safe center}
#ee-why .eew2-wrap{max-width:1240px;margin:0 auto;padding:0 24px;width:100%}
#ee-why h2{color:#19345d;margin:0 auto 12px;max-width:44ch;text-align:center}
#ee-why .eew2-lead{color:#5a6b85;line-height:1.6;margin:0 auto 8px;max-width:56ch;text-align:center}
#ee-why .eew2-lead strong{color:#19345d}
/* Steps read on the left, screenshots on the right. The markup keeps the
   visual first (it is the section's primary content for crawlers and for
   the no-CSS fallback), so the swap is done with order, and the wider
   1.18fr share travels with the images to the second column. */
#ee-why .eew2-grid{display:grid;grid-template-columns:minmax(0,.82fr) minmax(0,1.18fr);gap:clamp(26px,3.4vw,54px);align-items:center;margin-top:clamp(14px,2vw,24px)}
#ee-why .eew2-grid>.eew2-steps{order:1}
#ee-why .eew2-grid>.eew2-visual{order:2}
/* visual */
#ee-why .eew2-vframe{position:relative;aspect-ratio:16/11;border-radius:20px;background:#fff;
  border:1px solid rgba(25,52,93,.1);overflow:hidden;cursor:zoom-in;
  box-shadow:0 2px 6px rgba(15,32,58,.05),0 42px 90px -34px rgba(25,52,93,.42)}
#ee-why .eew2-vframe.eew2-noimg{cursor:default}
#ee-why .eew2-vframe::before{content:"";position:absolute;inset:0;border-radius:inherit;padding:1px;
  background:linear-gradient(135deg,rgba(222,110,48,.5),rgba(25,52,93,.18) 45%,transparent 70%);
  -webkit-mask:linear-gradient(#fff 0 0) content-box,linear-gradient(#fff 0 0);
  -webkit-mask-composite:xor;mask-composite:exclude;pointer-events:none;z-index:3}
#ee-why .eew2-img{position:absolute;inset:0;width:100%;height:100%;object-fit:contain;padding:16px;
  opacity:0;transform:scale(.955) translateY(14px);z-index:1;
  transition:opacity .55s cubic-bezier(.22,1,.36,1),transform .6s cubic-bezier(.22,1,.36,1)}
#ee-why .eew2-img.on{opacity:1;transform:none;z-index:2}
#ee-why .eew2-vframe.eew2-noimg::after{content:"";position:absolute;inset:0;background:
  radial-gradient(420px 260px at 30% 30%,rgba(222,110,48,.12),transparent 60%),
  radial-gradient(420px 300px at 75% 75%,rgba(25,52,93,.1),transparent 60%)}
/* continuous progress under the frame */
#ee-why .eew2-progress{display:flex;align-items:center;gap:12px;margin-top:14px}
#ee-why .eew2-pline{position:relative;flex:1;height:3px;border-radius:3px;background:rgba(25,52,93,.1);overflow:hidden}
#ee-why .eew2-pfill{position:absolute;left:0;top:0;bottom:0;width:0;border-radius:3px;
  background:linear-gradient(90deg,#E8843F,#DE6E30)}
/* steps */
#ee-why .eew2-steps{list-style:none;margin:0;padding:0}
#ee-why .eew2-step{position:relative;padding:15px 16px 15px 20px;cursor:pointer;
  border-left:3px solid rgba(25,52,93,.1);
  opacity:.42;transition:opacity .45s ease,border-color .45s ease,background .45s ease,transform .45s ease}
#ee-why .eew2-step.on{opacity:1;border-left-color:#DE6E30;
  background:linear-gradient(90deg,rgba(222,110,48,.05),transparent 65%)}
#ee-why .eew2-step:focus-visible{border-radius:14px}
#ee-why .eew2-tx h3{margin:0 0 6px;color:#19345d}
#ee-why .eew2-tx p{margin:0;color:#5a6b85;line-height:1.62;max-width:52ch}
#ee-why .eew2-mimg{display:none}
@media(min-width:901px){
  #ee-why .eew2-step{padding:12px 16px 12px 20px}
  #ee-why .eew2-tx p{max-height:0;opacity:0;overflow:hidden;margin:0;
    transition:max-height .5s cubic-bezier(.2,.7,.2,1),opacity .35s ease .08s}
  #ee-why .eew2-step.on .eew2-tx p{max-height:220px;opacity:1;margin:6px 0 0}
}
#ee-why .eew2-steps:not(.in) .eew2-step{opacity:0;transform:translateY(18px)}
#ee-why .eew2-steps.in .eew2-step{transform:none}
#ee-why .eew2-steps.in .eew2-step:nth-child(1){transition-delay:.05s}
#ee-why .eew2-steps.in .eew2-step:nth-child(2){transition-delay:.12s}
#ee-why .eew2-steps.in .eew2-step:nth-child(3){transition-delay:.19s}
#ee-why .eew2-steps.in .eew2-step:nth-child(4){transition-delay:.26s}
#ee-why .eew2-steps.in .eew2-step:nth-child(5){transition-delay:.33s}
/* lightbox */
#ee-why .eew2-lb{position:fixed;inset:0;z-index:3000;display:flex;align-items:center;justify-content:center;
  background:rgba(15,33,67,.82);-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);
  opacity:0;visibility:hidden;transition:opacity .3s ease,visibility .3s}
#ee-why .eew2-lb.open{opacity:1;visibility:visible}
#ee-why .eew2-lb img{max-width:min(92vw,1400px);max-height:86vh;border-radius:16px;background:#fff;
  padding:14px;box-shadow:0 40px 120px -30px rgba(0,0,0,.6);
  transform:scale(.94);transition:transform .35s cubic-bezier(.22,1,.36,1)}
#ee-why .eew2-lb.open img{transform:none}
#ee-why .eew2-lb-x{position:absolute;top:22px;right:26px;width:42px;height:42px;border-radius:50%;border:0;
  background:rgba(255,255,255,.14);color:#fff;font-size:19px;line-height:1;cursor:pointer;
  display:grid;place-items:center;transition:background .2s,transform .2s}
#ee-why .eew2-lb-x:hover{background:rgba(255,255,255,.26);transform:rotate(90deg)}
#ee-why .eew2-lb-cap{position:absolute;bottom:26px;left:50%;transform:translateX(-50%);
  font:600 13px/1.4 'Inter',sans-serif;color:#c6d4ea;background:rgba(15,33,67,.6);
  padding:8px 16px;border-radius:999px;white-space:nowrap}
@media(prefers-reduced-motion:reduce){#ee-why .eew2-img,#ee-why .eew2-step{transition:none}}
/* phones: no pinning - stacked story cards with inline images */
@media(max-width:900px){
  #ee-why{padding:30px 0}
  #ee-why .eew2-track{height:auto}
  #ee-why .eew2-pin{position:static;height:auto;overflow:visible;display:block}
  #ee-why .eew2-grid{grid-template-columns:1fr;gap:14px;align-items:start}
  #ee-why .eew2-visual{display:none}
  #ee-why .eew2-step{opacity:1;padding:16px;background:#fff;border:1px solid rgba(25,52,93,.1);
    border-left:3px solid rgba(222,110,48,.5);border-radius:16px;margin-bottom:12px;
    box-shadow:0 10px 26px -18px rgba(25,52,93,.3)}
  #ee-why .eew2-mimg{display:block;width:100%;height:auto;border-radius:12px;margin-top:12px;
    border:1px solid rgba(25,52,93,.08)}
}
</style>
<section id="ee-why" aria-labelledby="eew-h">
  <div class="eew2-track" id="eew2Track">
  <div class="eew2-pin">
  <div class="eew2-wrap">
    <h2 id="eew-h">Why Institutes Choose ExtraaEdge as the Architect of Their Admission Process?</h2>
    <p class="eew2-lead">Most Admission CRMs help you <strong>manage</strong> admissions. ExtraaEdge helps you <strong>design how admissions should work</strong> - end to end, at scale.</p>
    <div class="eew2-grid">
      <div class="eew2-visual">
        <div class="eew2-vframe" id="eew2Frame" tabindex="0" role="button" aria-label="Enlarge the current screenshot">
          <img class="eew2-img on" data-i="0" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/unified-admission-ecosystem.webp" alt="Everything in one platform" loading="lazy" decoding="async">
          <img class="eew2-img" data-i="1" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/ai-guided-student-journey.webp" alt="Complete enrollment flow" loading="lazy" decoding="async">
          <img class="eew2-img" data-i="2" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/intelligent-counselor-workspace.webp" alt="Counselors work smarter" loading="lazy" decoding="async">
          <img class="eew2-img" data-i="3" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/automation-connected-operations.webp" alt="Processes run automatically" loading="lazy" decoding="async">
          <img class="eew2-img" data-i="4" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/executive-decision-intelligence.webp" alt="Leadership gets actionable insights" loading="lazy" decoding="async">
        </div>
        <div class="eew2-progress" aria-hidden="true">
          <span class="eew2-pline"><i class="eew2-pfill" id="eew2Fill"></i></span>
        </div>
      </div>
      <ol class="eew2-steps" id="eew2Steps">
        <li class="eew2-step on" data-i="0" tabindex="0" aria-current="step">
          <div class="eew2-tx">
            <h3>Everything in one platform</h3>
            <p>One unified Admission Cloud to run the entire enrollment journey from inquiry to enrollment, without fragmented tools or manual follow-ups.</p>
            <img class="eew2-mimg" width="1200" height="825" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/unified-admission-ecosystem.webp" alt="" loading="lazy" decoding="async">
          </div>
        </li>
        <li class="eew2-step" data-i="1" tabindex="0">
          <div class="eew2-tx">
            <h3>Complete enrollment flow</h3>
            <p>AI-powered admission assistance handles student queries 24&times;7 across web and WhatsApp, while giving counselors full context to respond faster and smarter.</p>
            <img class="eew2-mimg" width="1200" height="825" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/ai-guided-student-journey.webp" alt="" loading="lazy" decoding="async">
          </div>
        </li>
        <li class="eew2-step" data-i="2" tabindex="0">
          <div class="eew2-tx">
            <h3>Counselors work smarter</h3>
            <p>AI calling and agents qualify, engage, and route high-intent prospects at scale, helping teams grow outcomes without growing headcount.</p>
            <img class="eew2-mimg" width="1200" height="825" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/intelligent-counselor-workspace.webp" alt="" loading="lazy" decoding="async">
          </div>
        </li>
        <li class="eew2-step" data-i="3" tabindex="0">
          <div class="eew2-tx">
            <h3>Processes run automatically</h3>
            <p>Built to adapt to each institute&rsquo;s process, ExtraaEdge integrates seamlessly with ads, websites, ERP, and communication tools - and scales with your growth.</p>
            <img class="eew2-mimg" width="1200" height="825" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/automation-connected-operations.webp" alt="" loading="lazy" decoding="async">
          </div>
        </li>
        <li class="eew2-step" data-i="4" tabindex="0">
          <div class="eew2-tx">
            <h3>Leadership gets actionable insights</h3>
            <p>Real-time intelligence surfaces intent, bottlenecks, and counselor performance so teams act early and convert better.</p>
            <img class="eew2-mimg" width="1200" height="825" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/why-extraaedge/executive-decision-intelligence.webp" alt="" loading="lazy" decoding="async">
          </div>
        </li>
      </ol>
    </div>
  </div>
  </div>
  </div>
  <div class="eew2-lb" id="eew2Lb" role="dialog" aria-modal="true" aria-label="Enlarged screenshot">
    <button type="button" class="eew2-lb-x" id="eew2LbX" aria-label="Close">&#10005;</button>
    <img id="eew2LbImg" width="1600" height="1100" src="" alt="">
    <span class="eew2-lb-cap" id="eew2LbCap"></span>
  </div>
</section>
<script>
(function(){
  var sec=document.getElementById('ee-why'); if(!sec) return;
  var track=document.getElementById('eew2Track');
  var steps=[].slice.call(sec.querySelectorAll('.eew2-step'));
  var imgs=[].slice.call(sec.querySelectorAll('.eew2-img'));
  var list=document.getElementById('eew2Steps'),
      frame=document.getElementById('eew2Frame'),
      fill=document.getElementById('eew2Fill'),
      lb=document.getElementById('eew2Lb'),
      lbImg=document.getElementById('eew2LbImg'),
      lbCap=document.getElementById('eew2LbCap'),
      lbX=document.getElementById('eew2LbX');
  var heads=['Everything in one platform','Complete enrollment flow','Counselors work smarter','Processes run automatically','Leadership gets actionable insights'];
  var mq=window.matchMedia('(min-width:901px)');
  var cur=0,failed=0,ticking=false;

  imgs.forEach(function(im){
    var pre=new Image(); pre.src=im.src;
    im.addEventListener('error',function(){ if(++failed>=imgs.length&&frame) frame.classList.add('eew2-noimg'); });
  });

  function render(i){
    i=Math.max(0,Math.min(steps.length-1,i));
    if(i===cur) return;
    cur=i;
    steps.forEach(function(st,j){ st.classList.toggle('on',j===i);
      if(j===i){ st.setAttribute('aria-current','step'); } else { st.removeAttribute('aria-current'); } });
    imgs.forEach(function(im,j){ im.classList.toggle('on',j===i); });
  }
  function metrics(){
    var pin=track.querySelector('.eew2-pin');
    return { total: track.offsetHeight-(pin?pin.offsetHeight:window.innerHeight),
             top: track.getBoundingClientRect().top };
  }
  function upd(){
    ticking=false;
    if(!mq.matches) return;
    var m=metrics(); if(m.total<=0) return;
    var p=Math.min(1,Math.max(0,-m.top/m.total));
    if(fill) fill.style.width=(p*100)+'%';
    render(Math.min(steps.length-1,Math.floor(p*steps.length+0.0001)));
  }
  window.addEventListener('scroll',function(){ if(!ticking){ ticking=true; requestAnimationFrame(upd); } },{passive:true});
  window.addEventListener('resize',upd,{passive:true});

  /* click / keyboard jumps scroll to that stage's spot in the track */
  function jumpTo(i){
    if(!mq.matches){ render(i); return; }
    var m=metrics(); if(m.total<=0){ render(i); return; }
    var trackTop=window.pageYOffset+m.top;
    window.scrollTo({top:Math.round(trackTop+((i+0.5)/steps.length)*m.total),behavior:'smooth'});
    render(i);
  }
  steps.forEach(function(st){
    st.addEventListener('click',function(){ jumpTo(+st.dataset.i); });
    st.addEventListener('keydown',function(e){
      if(e.key==='Enter'||e.key===' '){ e.preventDefault(); jumpTo(+st.dataset.i); }
      else if(e.key==='ArrowDown'||e.key==='ArrowRight'){ e.preventDefault(); jumpTo(cur+1); steps[Math.min(cur+1,steps.length-1)].focus(); }
      else if(e.key==='ArrowUp'||e.key==='ArrowLeft'){ e.preventDefault(); jumpTo(cur-1); steps[Math.max(cur-1,0)].focus(); }
    });
  });

  /* entrance stagger */
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){ es.forEach(function(e){
      if(e.isIntersecting){ if(list) list.classList.add('in'); io.disconnect(); } }); },{threshold:.2});
    io.observe(sec);
  } else if(list){ list.classList.add('in'); }

  /* click-to-zoom lightbox */
  var lastFocus=null;
  function lbOpen(){
    if(!lb||frame.classList.contains('eew2-noimg')) return;
    lbImg.src=imgs[cur].src; lbImg.alt=imgs[cur].alt||'';
    if(lbCap) lbCap.textContent=heads[cur];
    lb.classList.add('open');
    document.documentElement.style.overflow='hidden';
    lastFocus=document.activeElement; if(lbX) lbX.focus();
  }
  function lbClose(){
    if(!lb) return;
    lb.classList.remove('open');
    document.documentElement.style.overflow='';
    if(lastFocus&&lastFocus.focus) lastFocus.focus();
  }
  if(frame){
    frame.addEventListener('click',lbOpen);
    frame.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){ e.preventDefault(); lbOpen(); } });
  }
  if(lbX) lbX.addEventListener('click',lbClose);
  if(lb) lb.addEventListener('click',function(e){ if(e.target===lb) lbClose(); });
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&lb&&lb.classList.contains('open')) lbClose(); });
  upd();
})();
</script>


<!-- ===================== RESPOND FIRST · AI STORYTELLING (scoped #ee-rfa) ===================== -->
<style>#ee-rfa{position:relative;padding:0;margin-top:clamp(32px,5vw,56px);background:
  radial-gradient(900px 480px at 92% 0%, rgba(222,110,48,.07), transparent 60%),
  radial-gradient(820px 460px at 2% 100%, rgba(25,52,93,.06), transparent 60%),#f6f8fc;
  font-family:'Inter',system-ui,-apple-system,sans-serif;color:#0f203a;-webkit-font-smoothing:antialiased}
#ee-rfa *{box-sizing:border-box}
/* section heading: eyebrow + H2 + sub, same head pattern as the other home
   sections; the long selector matches the site heading-scale rule's
   specificity and prints later, so it wins the tie */
#ee-rfa .rfa-head{position:relative;z-index:1;max-width:820px;margin:0 auto;padding:clamp(44px,6vw,68px) 22px 0;text-align:center}
html body #main-content #ee-rfa h2.h2.rfa-h2{margin:0 0 12px!important;color:#19345d!important;font-weight:800!important;}
#ee-rfa .rfa-h2 em{font-style:normal;color:#DE6E30}
#ee-rfa .rfa-sub{font-size:clamp(15px,1.7vw,18px);line-height:1.6;color:#5a6b85;margin:0}
/* blurred brand orbs behind the glass cards */
#ee-rfa .rfa-orb{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none;opacity:.5}
#ee-rfa .rfa-orb.o1{width:340px;height:340px;left:-80px;top:12%;background:rgba(222,110,48,.18)}
#ee-rfa .rfa-orb.o2{width:400px;height:400px;right:-100px;bottom:8%;background:rgba(34,99,197,.14)}
#ee-rfa .rfa-track{position:relative;height:calc(min(100vh,860px)*3.4)}
#ee-rfa .rfa-pin{position:sticky;top:86px;height:min(calc(100vh - 86px),820px);overflow:hidden;display:flex;align-items:center;align-items:safe center}
#ee-rfa .rfa-in{max-width:1270px;margin:0 auto;width:100%;padding:12px 24px;display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr) 18px;gap:clamp(18px,2.6vw,40px);align-items:center}#ee-rfa .rfa-in>.rfa-rail{order:3}#ee-rfa .rfa-in>.rfa-cards{order:2}#ee-rfa .rfa-in>.rfa-stagewrap,#ee-rfa .rfa-in>*:nth-child(3){order:1}
#ee-rfa .rfa-cards{max-height:calc(min(100vh - 86px,820px) - 24px);overflow-y:hidden}/* overflow-y:hidden (not auto): the column must never swallow the mouse wheel - page scroll drives the pinned story - while reveal() can still move scrollTop */
@media (max-height:860px){#ee-rfa .rfa-card{padding:11px 14px;margin-bottom:7px}#ee-rfa .rfa-kick{margin-bottom:7px}#ee-rfa .rfa-body p{line-height:1.6;margin:8px 0 10px}#ee-rfa .rfa-chiplbl{margin:10px 0 7px}}
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
#ee-rfa .rfa-tabs{display:flex;justify-content:center;margin-top:14px;min-height:34px}
#ee-rfa .rfa-tab{display:none;font:700 12px/1 'Inter',sans-serif;letter-spacing:.03em;
  padding:10px 18px;border-radius:999px;cursor:default;border:1.4px solid rgba(222,110,48,.5);
  color:var(--orange-700,#B5551D);background:rgba(222,110,48,.09);
  box-shadow:0 6px 16px -8px rgba(222,110,48,.5)}
#ee-rfa .rfa-tab.on{display:inline-flex;animation:rfaTabIn .45s cubic-bezier(.22,1,.36,1)}
@keyframes rfaTabIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
@media(prefers-reduced-motion:reduce){#ee-rfa .rfa-tab.on{animation:none}}
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
  #ee-rfa{padding:34px 0 26px}
  #ee-rfa .rfa-head{padding-top:0;margin-bottom:22px}
  #ee-rfa .rfa-track{height:auto}
  #ee-rfa .rfa-pin{position:static;height:auto;overflow:visible;display:block}
  #ee-rfa .rfa-in{grid-template-columns:1fr;gap:0;padding:0 18px}
  #ee-rfa .rfa-stage,#ee-rfa .rfa-rail{display:none}
  #ee-rfa .rfa-card{margin-bottom:12px;padding:15px 48px 15px 15px;background:rgba(255,255,255,.9)}
  #ee-rfa .rfa-card.mi{opacity:1;transform:none}
  #ee-rfa .rfa-card:hover{transform:none}
  #ee-rfa .rfa-card .rfa-title{margin:0}
  /* tap-to-open accordion: only the open card shows its body; the default
     collapsed rules already hide the rest */
  #ee-rfa .rfa-card.on .rfa-body{max-height:1400px;opacity:1}
  #ee-rfa .rfa-card::after{content:"";position:absolute;top:13px;right:13px;width:26px;height:26px;border-radius:50%;background:rgba(25,52,93,.06) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2319335D' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") center/13px 13px no-repeat;transition:transform .35s ease,background-color .3s ease}
  #ee-rfa .rfa-card.on::after{transform:rotate(180deg);background-color:rgba(222,110,48,.14)}
  #ee-rfa .rfa-cardimg{display:block}
  #ee-rfa .rfa-cardimg img{width:100%;height:auto;border-radius:12px;border:1px solid rgba(25,52,93,.1);box-shadow:0 16px 36px -20px rgba(25,52,93,.3)}
  #ee-rfa .rfa-chips span{font-size:10.5px;padding:5px 9px}
}
@media(prefers-reduced-motion:reduce){#ee-rfa .rfa-card,#ee-rfa .rfa-shot,#ee-rfa .rfa-body{transition:none!important}}
</style>
<section id="ee-rfa" aria-label="Respond first with AI agents - how ExtraaEdge wins admissions">
  <span class="rfa-orb o1" aria-hidden="true"></span>
  <span class="rfa-orb o2" aria-hidden="true"></span>
  <header class="rfa-head">
    <h2 class="h2 rfa-h2">How Institutes Win - From First Enquiry to <em>Final Enrollment</em></h2>
    <p class="rfa-sub">The four moves that decide admissions - respond first, engage right, prioritise the best-fit students and measure everything, on one AI Admission CRM.</p>
  </header>
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
        <h3 class="rfa-title">Respond First Using AI Agents. Win Admissions.</h3>
        <div class="rfa-body">
          <p>Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation and conversion. ExtraaEdge brings all admission inquiries into one Admission CRM. AI-powered calling and intelligent routing ensure every prospect is contacted at the right moment - so counselors engage the right students faster and close more enrollments.</p>
          <b class="rfa-chiplbl">Unified Lead Ingestion Across</b>
          <div class="rfa-chips"><span>Ads Integration</span><span>Forms Integration</span><span>Third-Party Publisher Integration</span><span>AI Calling &amp; IVR Integration</span></div>
          <figure class="rfa-cardimg"><img width="1600" height="1000" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Integration%20Hub%20Flowchart.png" alt="Integration hub - every admission inquiry flows into one CRM" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      <article class="rfa-card" data-i="1" tabindex="0">
        <h3 class="rfa-title">AI Decides the Right Admission Engagements.</h3>
        <div class="rfa-body">
          <p>ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who to engage, when to engage, and how to engage across channels. Every interaction is timely, relevant, and context-aware. Admissions teams move away from manual follow-ups and generic messaging - AI-guided engagements adapt in real time and drive higher enrollments.</p>
          <b class="rfa-chiplbl">Engagement Channels</b>
          <div class="rfa-chips"><span>Trigger-Based Email &amp; SMS</span><span>AI Calling &amp; Click-to-Call</span><span>VidyaGPT - AI-Based 24&times;7 Admission Agents</span><span>WhatsApp Communication</span></div>
          <figure class="rfa-cardimg"><img width="1600" height="1000" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Omnichannel%20Conversion%20Dashboard.png" alt="Omnichannel conversion dashboard" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      <article class="rfa-card" data-i="2" tabindex="0">
        <h3 class="rfa-title">Turn Enquiries Into Enrollments</h3>
        <div class="rfa-body">
          <p>Not every enquiry deserves the same attention. ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward - the result is higher efficiency and stronger enrollment conversions.</p>
          <b class="rfa-chiplbl">Powered by Intelligent Prioritization</b>
          <div class="rfa-chips"><span>Prediction Score</span><span>Next Best Action</span><span>Follow-Up Calendar</span><span>Multi-Funnel Stages</span></div>
          <figure class="rfa-cardimg"><img width="1600" height="1000" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Admissions%20CRM%20Dashboard%20Overview.png" alt="Admissions CRM dashboard overview" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      <article class="rfa-card" data-i="3" tabindex="0">
        <h3 class="rfa-title">Know What&rsquo;s Working. Fix What&rsquo;s Not.</h3>
        <div class="rfa-body">
          <p>Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance. Track counselors, campaigns, and lead sources in one place. With Analytics Builder and VidyaGPT Analytics, insights are easier to explore and understand - so teams act faster on what&rsquo;s working and fix what&rsquo;s not.</p>
          <b class="rfa-chiplbl">Analytics &amp; Visibility Across</b>
          <div class="rfa-chips"><span>VidyaGPT Analytics + Analytics Builder</span><span>Counselor Dashboard</span><span>Custom Dashboards</span><span>Marketing Dashboard</span><span>Publisher Reports</span></div>
          <figure class="rfa-cardimg"><img width="1600" height="1000" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Dashboard%20analytics%20overview.png" alt="Dashboard analytics overview" loading="lazy" decoding="async" onerror="this.closest('figure').style.display='none'"></figure>
        </div>
      </article>
      </div>
      <div class="rfa-stage" id="rfaStage" aria-hidden="true">
        <div class="rfa-frame">
                    <div class="rfa-shots">
      <img class="rfa-shot on" data-i="0" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Integration%20Hub%20Flowchart.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
      <img class="rfa-shot" data-i="1" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Omnichannel%20Conversion%20Dashboard.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
      <img class="rfa-shot" data-i="2" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Admissions%20CRM%20Dashboard%20Overview.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
      <img class="rfa-shot" data-i="3" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/decrease-time-section/Dashboard%20analytics%20overview.png" alt="" aria-hidden="true" loading="lazy" decoding="async" onerror="this.style.display='none'">
          </div>
        </div>
        <div class="rfa-tabs" id="rfaTabs" role="tablist" aria-label="Stories">
          <button type="button" class="rfa-tab on" data-i="0">Decrease response time</button>
          <button type="button" class="rfa-tab" data-i="1">Boost conversion rates</button>
          <button type="button" class="rfa-tab" data-i="2">Convert more</button>
          <button type="button" class="rfa-tab" data-i="3">Measure your efforts</button>
        </div>
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
  var tabs=[].slice.call(sec.querySelectorAll('.rfa-tab'));
  function render(i){
    cur=i;
    cards.forEach(function(c,j){ c.classList.toggle('on',j===i); });
    shots.forEach(function(s,j){ s.classList.toggle('on',j===i); });
    dots.forEach(function(d,j){ d.classList.toggle('on',j===i); });
    tabs.forEach(function(t,j){ t.classList.toggle('on',j===i); });
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
    if(cr.height>=br.height-4||cr.top<br.top) d=cr.top-br.top-6;
    else if(cr.bottom>br.bottom) d=cr.bottom-br.bottom+6;
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
  /* phones: the stacked cards behave as an accordion - tapping the open
     card's header closes it, tapping another opens that one. Taps inside an
     open body (chips, image) must not collapse the card mid-read. Desktop
     keeps the scroll-story jump. */
  function tap(i,e){
    if(!mqd.matches){
      if(e&&e.target&&e.target.closest&&e.target.closest('.rfa-body')) return;
      if(cards[i].classList.contains('on')){ cards[i].classList.remove('on'); return; }
      render(i);
      var r=cards[i].getBoundingClientRect();
      if(r.top<70) window.scrollBy({top:r.top-84,behavior:'smooth'});
      return;
    }
    jumpTo(i);
  }
  cards.forEach(function(c,i){
    c.addEventListener('click',function(e){ tap(i,e); });
    c.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){ e.preventDefault(); tap(i,e); } });
  });
  dots.forEach(function(d,i){ d.addEventListener('click',function(){ jumpTo(i); }); });
  tabs.forEach(function(t,i){ t.addEventListener('click',function(){ jumpTo(i); }); });
  render(0); upd();
})();
</script>


<!-- (removed) STORY 1 · THE REAL PROBLEM - empty shell cleaned up; content was superseded and removed earlier -->

<?php /* The whole platform section - styles, dummy CRM, overlay, tour and the
   "real CRM" popup - lives in inc/platform-demo.php so the same block also
   serves /product-tour/ and the [ee_platform] shortcode. */
ee_platform_section(); ?>


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
                            <img class="eeimg ee-ico-white" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/powerfull-crm/icons/13-Counselor-Performance-Intelligence.svg" alt="" style="width:1em;height:1em;object-fit:contain;display:inline-block;vertical-align:-0.125em;font-size:1.125rem" loading="lazy" decoding="async">
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
                /* body{zoom:.9}: rect measurements are visual px but style px
                   get re-scaled by the zoom - divide so fixed mode keeps the
                   card at its natural size instead of shrinking */
                const Z = parseFloat(getComputedStyle(document.body).zoom) || 1;
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
                    navCard.style.top = `${topOffset / Z}px`;
                    navCard.style.left = `${naturalLeft / Z}px`;
                    navCard.style.width = `${naturalWidth / Z}px`;
                } else {
                    navCard.classList.add('js-bottom');
                    navCard.classList.remove('js-fixed');
                    navCard.style.top = `${(containerBottom - naturalTop) / Z - navHeight}px`;
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

<style id="ee-products-cards">
/* ── Our Products: category bento ────────────────────────────────────────
   Soft light stage, centred eyebrow/heading, then the catalogue laid out
   by category: four cards across, then a wider row where Integrations
   sits between Communication and Analytics, a stats strip, and one CTA.

   Only routes this install actually serves are links; every other line is
   plain text. The old grid linked each tile, and most of this catalogue
   has no page yet — as text it still reads as the capability map the
   layout is for, and nothing can land on a 404.

   Palette is ExtraaEdge's: navy headings and navy-tinted icons, #DE6E30
   for the warm icons, eyebrow and the Vidya AI card, and the two corner
   washes. Loaded after the section's base rules so it wins without
   !important. */
#ee-products{ position:relative; overflow:hidden;
  background:linear-gradient(180deg,#FFFFFF 0%, #F8FAFD 55%, #FFFFFF 100%);
  padding:clamp(54px,7vw,96px) 0; }
#ee-products::before,#ee-products::after{ content:""; position:absolute; pointer-events:none; }
#ee-products::before{ right:-12%; top:-16%; width:52%; height:62%;
  background:radial-gradient(circle,rgba(222,110,48,.14),transparent 66%); }
#ee-products::after{ left:-14%; bottom:-18%; width:54%; height:64%;
  background:radial-gradient(circle,rgba(25,51,93,.11),transparent 68%); }
#ee-products .epx-wrap{ position:relative; z-index:1;
  max-width:1180px; margin:0 auto; padding:0 22px;
  font-family:'Inter',system-ui,sans-serif; }

/* head */
#ee-products .epx-head{ text-align:center; margin-bottom:clamp(26px,3.2vw,42px); }
#ee-products .epx-eyebrow{ display:inline-flex; align-items:center; gap:8px;
  padding:9px 18px; border-radius:999px; background:#fff;
  border:1px solid rgba(222,110,48,.28); box-shadow:0 6px 18px -12px rgba(25,51,93,.5);
  font:800 11.5px/1 'Inter',sans-serif; letter-spacing:.1em; text-transform:uppercase;
  color:var(--orange-700,#B5551D); }
#ee-products .epx-eyebrow svg{ width:15px; height:15px; }
/* size, weight and tracking come from the site-wide heading scale, the
   same as every other section heading - only the spacing and colour are
   set here */
#ee-products .epx-head h2{ margin:clamp(14px,1.6vw,20px) 0 12px; color:#19335D; }
#ee-products .epx-head p{ max-width:60ch; margin:0 auto; color:#6B7C96;
  font-size:clamp(14px,1.5vw,16.5px); line-height:1.6; }

/* cards */
#ee-products .epx-grid{ display:grid; grid-template-columns:repeat(4,minmax(0,1fr));
  gap:clamp(14px,1.6vw,22px); margin-bottom:clamp(14px,1.6vw,22px); }
#ee-products .epx-grid--b{ grid-template-columns:minmax(0,1fr) minmax(0,1.25fr) minmax(0,1fr); }
#ee-products .epx-card{ display:flex; flex-direction:column;
  padding:clamp(20px,1.9vw,26px);
  background:rgba(255,255,255,.78); border:1px solid rgba(25,51,93,.09);
  border-radius:20px; box-shadow:0 18px 40px -30px rgba(25,51,93,.55);
  -webkit-backdrop-filter:blur(6px); backdrop-filter:blur(6px);
  transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
#ee-products .epx-card:hover{ transform:translateY(-4px);
  border-color:rgba(222,110,48,.3); box-shadow:0 26px 50px -28px rgba(25,51,93,.6); }
/* the Vidya card is the one the eye should land on */
#ee-products .epx-card--hero{ background:linear-gradient(170deg,#FFF6F0,#FFFDFB);
  border-color:rgba(222,110,48,.34); box-shadow:0 26px 54px -28px rgba(222,110,48,.55); }

#ee-products .epx-top{ position:relative; display:flex; align-items:center;
  gap:13px; margin-bottom:clamp(14px,1.5vw,18px); }
#ee-products .epx-ic{ flex:0 0 auto; width:52px; height:52px; border-radius:15px;
  display:grid; place-items:center; }
#ee-products .epx-ic svg{ width:25px; height:25px; }
#ee-products .epx-ic--nv{ background:#EEF3FB; color:#19335D; border:1px solid rgba(25,51,93,.1); }
#ee-products .epx-ic--or{ background:#FDF1E9; color:var(--orange-700,#B5551D);
  border:1px solid rgba(222,110,48,.22); }
html body #main-content #ee-products .epx-wrap .epx-card h3{
  margin:0; color:#0F2143; font-family:'Inter',sans-serif;
  font-weight:700 !important; }
#ee-products .epx-ai{ position:absolute; top:-26px; right:-12px;
  width:40px; height:40px; border-radius:50%;
  display:grid; place-items:center;
  background:linear-gradient(140deg,#E8843F,#2E4A78); color:#fff;
  font:800 13px/1 'Inter',sans-serif; letter-spacing:-.02em;
  box-shadow:0 10px 22px -10px rgba(222,110,48,.85), 0 0 0 4px rgba(255,255,255,.9); }

#ee-products .epx-list{ list-style:none; margin:0; padding:0; }
#ee-products .epx-list li{ border-top:1px solid rgba(25,51,93,.09); }
#ee-products .epx-list li:first-child{ border-top:0; }
#ee-products .epx-list>li>a,#ee-products .epx-list>li>span{
  display:block; padding:11px 0; color:#33415C; font-size:14px; line-height:1.4;
  text-decoration:none; transition:color .2s ease; }
#ee-products .epx-list>li>a:hover{ color:var(--orange-700,#B5551D); }
#ee-products .epx-list>li>a:focus-visible{ outline:2px solid var(--focus-ring,#1A5FB4); outline-offset:2px; }
#ee-products .epx-soon{ display:inline-block; margin-left:7px; padding:4px 9px;
  border-radius:999px; background:#FDF2EB; color:var(--orange-700,#B5551D);
  border:1px solid rgba(222,110,48,.32);
  font:800 9.5px/1 'Inter',sans-serif; letter-spacing:.06em; text-transform:uppercase; }

/* integrations card: hub illustration beside the copy */
#ee-products .epx-card--integ{ flex-direction:row; align-items:center; gap:clamp(14px,1.8vw,26px); }
#ee-products .epx-hub{ position:relative; flex:0 0 auto;
  width:clamp(132px,12.5vw,172px); height:clamp(132px,12.5vw,172px); }
#ee-products .epx-hub-core{ position:absolute; left:50%; top:50%; transform:translate(-50%,-50%);
  width:64px; height:64px; border-radius:20px; display:grid; place-items:center;
  background:linear-gradient(150deg,#2E4A78,#19335D); color:#fff;
  box-shadow:0 16px 32px -14px rgba(25,51,93,.75); }
#ee-products .epx-hub-core svg{ width:30px; height:30px; }
#ee-products .epx-hub .n{ position:absolute; width:38px; height:38px; border-radius:50%;
  display:grid; place-items:center; background:#fff; color:#2E4A78;
  border:1px solid rgba(25,51,93,.1); box-shadow:0 8px 18px -10px rgba(25,51,93,.5); }
#ee-products .epx-hub .n svg{ width:18px; height:18px; }
#ee-products .epx-hub .n1{ left:6%;  top:26%; }
#ee-products .epx-hub .n2{ right:8%; top:16%; }
#ee-products .epx-hub .n3{ left:44%; top:0; }
#ee-products .epx-hub .n4{ right:2%; top:52%; }
#ee-products .epx-hub .n5{ left:26%; bottom:2%; }
#ee-products .epx-hub .n6{ right:16%; bottom:6%; }
#ee-products .epx-integ-tx{ flex:1 1 auto; min-width:0; }
#ee-products .epx-integ-lead{ margin:9px 0 6px; }
#ee-products .epx-integ-lead a{ color:#0F2143; font-weight:600; font-size:15px;
  text-decoration:none; }
#ee-products .epx-integ-lead a:hover{ color:var(--orange-700,#B5551D); }
html body #main-content #ee-products .epx-wrap .epx-integ-tx p{
  margin:0; color:#6B7C96; }

/* one CTA closes the section - same button as the header's Book Demo
   (see the .ih-cta block in the integrations section for the source rule) */
#ee-products .epx-cta{ text-align:center; margin-top:clamp(22px,2.8vw,36px); }
html body #ee-products a.epx-btn,
html body #main-content #ee-products a.epx-btn{
  display:inline-flex !important;align-items:center !important;justify-content:center !important;
  width:auto !important;height:auto !important;min-height:0 !important;
  padding:.55rem 1.2rem !important;gap:.4rem !important;
  border-radius:9px !important;border:none !important;
  background:linear-gradient(135deg,#DE6E30,#FF8A5C) !important;
  color:#fff !important;text-decoration:none !important;
  font-family:'Inter','-apple-system','BlinkMacSystemFont','Segoe UI',Roboto,sans-serif !important;
  font-size:.82rem !important;font-weight:600 !important;letter-spacing:normal !important;
  box-shadow:0 4px 14px rgba(222,110,48,.25) !important;
  cursor:pointer;transition:all .3s ease}
html body #ee-products a.epx-btn:hover,
html body #main-content #ee-products a.epx-btn:hover{
  background:linear-gradient(135deg,#B85920,#C75E24) !important;color:#fff !important;
  transform:translateY(-2px) !important;box-shadow:0 6px 22px rgba(222,110,48,.35) !important}
html body #ee-products a.epx-btn svg{width:16px !important;height:16px !important;
  flex:0 0 auto;stroke:currentColor;fill:none}
#ee-products .epx-btn:focus-visible{ outline:2px solid #19345d; outline-offset:3px; }

@media(max-width:1080px){
  #ee-products .epx-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); }
  #ee-products .epx-grid--b{ grid-template-columns:repeat(2,minmax(0,1fr)); }
  #ee-products .epx-card--integ{ grid-column:1 / -1; }
}
@media(max-width:640px){
  #ee-products .epx-grid,#ee-products .epx-grid--b{ grid-template-columns:1fr; gap:10px; }
  #ee-products .epx-card{ padding:16px 15px; border-radius:16px; }
  #ee-products .epx-ic{ width:42px; height:42px; border-radius:12px; }
  #ee-products .epx-ic svg{ width:20px; height:20px; }
  #ee-products .epx-list>li>a,#ee-products .epx-list>li>span{ padding:9px 0; font-size:13px; }
  #ee-products .epx-card--integ{ flex-direction:column; align-items:flex-start; }
  #ee-products .epx-hub{ width:150px; height:150px; margin:0 auto; }
}
/* the header shrinks its CTA at these two points, so this one does too */
@media(max-width:1023.98px){
  html body #ee-products a.epx-btn,
  html body #main-content #ee-products a.epx-btn{
    padding:.42rem .75rem !important;font-size:.72rem !important;gap:.25rem !important;white-space:nowrap}
  html body #ee-products a.epx-btn svg{width:12px !important;height:12px !important}
}
@media(max-width:400px){
  html body #ee-products a.epx-btn,
  html body #main-content #ee-products a.epx-btn{padding:.62rem .7rem !important;font-size:.72rem !important}
}
@media(prefers-reduced-motion:reduce){
  #ee-products .epx-card,#ee-products .epx-btn{ transition:none; } }
</style>

<section id="ee-products" aria-label="Our products">
  <div class="epx-wrap">

    <header class="epx-head">
      <h2>Our Products - the <span class="eep-accent">All-in-One Admissions Platform</span></h2>
      <p>Everything you need to attract, engage, enroll, and retain students &mdash; powered by AI and built for education.</p>
    </header>

    <div class="epx-grid">
        <article class="epx-card">
          <div class="epx-top">
            <span class="epx-ic epx-ic--nv" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l9 5-9 5-9-5 9-5z"/><path d="M3 13l9 5 9-5"/><path d="M3 17l9 5 9-5"/></svg></span>
            <h3>Core Platform</h3>
          </div>
          <ul class="epx-list">
            <li><a href="/products/education-crm/">Education CRM</a></li>
            <li><a href="/products/">Marketing Automation</a></li>
            <li><a href="/products/application-management-system/">Application Management System (AMS)</a></li>
            <li><span>Payment &amp; Enrollment</span></li>
          </ul>
        </article>
        <article class="epx-card">
          <div class="epx-top">
            <span class="epx-ic epx-ic--or" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.2 5.2l2.1 2.1M16.7 16.7l2.1 2.1M18.8 5.2l-2.1 2.1M7.3 16.7l-2.1 2.1"/></svg></span>
            <h3>Automation</h3>
          </div>
          <ul class="epx-list">
            <li><span>Workflow Automation</span></li>
            <li><span>Journey Builder</span></li>
            <li><span>Lead Assignment</span></li>
            <li><span>Lead Routing</span></li>
            <li><span>Task Automation</span></li>
            <li><span>Follow-up Automation</span></li>
          </ul>
        </article>
        <article class="epx-card epx-card--hero">
          <div class="epx-top">
            <span class="epx-ic epx-ic--or" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3z"/><path d="M18.5 15.5l.7 1.8 1.8.7-1.8.7-.7 1.8-.7-1.8-1.8-.7 1.8-.7.7-1.8z"/></svg></span>
            <h3>Vidya AI Suite</h3><span class="epx-ai" aria-hidden="true">AI</span>
          </div>
          <ul class="epx-list">
            <li><span>VidyaGPT</span></li>
            <li><span>VidyaAI Voice Agent</span></li>
            <li><span>VidyaPulse</span></li>
            <li><span>VidyaWABA GPT</span></li>
            <li><span>Vidya Work <span class="epx-soon">Upcoming</span></span></li>
          </ul>
        </article>
        <article class="epx-card">
          <div class="epx-top">
            <span class="epx-ic epx-ic--nv" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2.8l7.5 3v6c0 4.2-3.1 8-7.5 9.4C7.6 19.8 4.5 16 4.5 11.8v-6l7.5-3z"/></svg></span>
            <h3>Security</h3>
          </div>
          <ul class="epx-list">
            <li><span>Role Management</span></li>
            <li><span>Permissions</span></li>
            <li><span>Audit Logs</span></li>
            <li><span>Data Security</span></li>
            <li><span>Compliance</span></li>
          </ul>
        </article>
    </div>

    <div class="epx-grid epx-grid--b">
        <article class="epx-card">
          <div class="epx-top">
            <span class="epx-ic epx-ic--or" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.5 12a7.5 7.5 0 01-7.5 7.5H4.5l1.9-2.9A7.5 7.5 0 1120.5 12z"/><path d="M9 11h6M9 14h4"/></svg></span>
            <h3>Communication</h3>
          </div>
          <ul class="epx-list">
            <li><a href="/products/chatbot-for-education/">Education Chatbot</a></li>
            <li><a href="/products/whatsapp-api/">WhatsApp Business API</a></li>
            <li><span>Cloud Telephony</span></li>
            <li><a href="/products/ivr/">IVR</a></li>
            <li><span>Email</span></li>
            <li><span>SMS</span></li>
            <li><a href="/products/mobile-crm/">Mobile CRM</a></li>
          </ul>
        </article>
        <article class="epx-card epx-card--integ">
          <div class="epx-hub" aria-hidden="true">
            <span class="epx-hub-core"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.5 18.5H7a4.5 4.5 0 01-.6-9A6.5 6.5 0 0119 10.4a4.1 4.1 0 01-1.5 8.1z"/></svg></span>
            <i class="n n1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="3.2"/><path d="M5.5 19a6.5 6.5 0 0113 0"/></svg></i><i class="n n2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3.5" y="5" width="17" height="15" rx="2.5"/><path d="M3.5 9.5h17M8 3v4M16 3v4"/></svg></i><i class="n n3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M12 4.5V7M12 17v2.5M4.5 12H7M17 12h2.5"/></svg></i>
            <i class="n n4"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l7.5 4.3v9L12 20.6 4.5 16.3v-9L12 3z"/></svg></i><i class="n n5"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="6.5" rx="7" ry="3"/><path d="M5 6.5v11c0 1.7 3.1 3 7 3s7-1.3 7-3v-11"/><path d="M5 12c0 1.7 3.1 3 7 3s7-1.3 7-3"/></svg></i><i class="n n6"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5.5" width="18" height="13" rx="2.5"/><path d="M3.6 7l8.4 6 8.4-6"/></svg></i>
          </div>
          <div class="epx-integ-tx">
            <h3>Integrations</h3>
            <p class="epx-integ-lead"><a href="/products/">All integrations</a></p>
            <p>Seamlessly connect with your favourite tools and platforms.</p>
          </div>
        </article>
        <article class="epx-card">
          <div class="epx-top">
            <span class="epx-ic epx-ic--or" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/></svg></span>
            <h3>Analytics</h3>
          </div>
          <ul class="epx-list">
            <li><span>Executive Dashboard</span></li>
            <li><span>Admission Analytics</span></li>
            <li><span>Marketing Analytics</span></li>
            <li><span>Lead Analytics</span></li>
            <li><span>Funnel Analytics</span></li>
            <li><span>Custom Reports</span></li>
          </ul>
        </article>
    </div>

    <div class="epx-cta">
      <a href="/products/" class="epx-btn">Explore All Features
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
      </a>
    </div>

  </div>
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
  #ee-vidya-suite.vsx-on .vsx-track{ height:calc(min(100vh,820px)*4.2); }#ee-vidya-suite.vsx-on .vsx-sticky{ position:sticky; top:0; height:min(100vh,820px); min-height:0; margin-top:0; margin-bottom:0; border-radius:0; max-width:none;
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


            <article class="vsx-card vsx-job is-focus" style="--ca:#2274ee;transform:scale(1);opacity:1;filter:none">
              <div class="vsx-jrow">
                <div class="vsx-jhead">
                  <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-gpt.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
                  <span class="vsx-brand">Vidya AI <svg class="vsx-verified" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg></span>
                </div>
                <span class="vsx-tag">AI COUNSELLOR</span>
              </div>
              <h3>Vidya GPT</h3>
              <dl class="vsx-meta">
                  <div><dt>Channels</dt><dd>Web &amp; WhatsApp</dd></div>
                  <div><dt>Languages</dt><dd>95+</dd></div>
                  <div><dt>Available</dt><dd>24&times;7</dd></div>
              </dl>
              <div class="vsx-quote">
                <span class="vsx-qm" aria-hidden="true">&ldquo;</span>
                <p class="vsx-desc">Your 24&times;7 AI chat counsellor answers fees, courses, scholarships and deadline queries across your website and WhatsApp, replies instantly in 95+ languages, and hands hot leads straight to your counsellors.</p>
                <svg class="vsx-net" viewBox="0 0 150 130" fill="none" aria-hidden="true"><path d="M18 96 58 60 96 78 132 34M58 60 44 18M96 78 104 118" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="96" r="4"/><circle cx="58" cy="60" r="5"/><circle cx="96" cy="78" r="4.5"/><circle cx="132" cy="34" r="4"/><circle cx="44" cy="18" r="3.5"/><circle cx="104" cy="118" r="3.5"/></svg>
              </div>
              <div class="vsx-jfoot">
                <a class="vsx-apply" href="#admission-form" aria-label="Try Vidya GPT - book a demo">Try it now <span class="vsx-arw2" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h12M12 6l6 6-6 6"/></svg></span></a>
                <span class="vsx-stat"><i class="vsx-stat-i" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.6 2.6 15.4 0 18M12 3c-2.6 2.6-2.6 15.4 0 18"/></svg></i>95+ languages</span>
              </div>
            </article>

            <article class="vsx-card vsx-job" style="--ca:#DE6E30;transform:scale(.87);opacity:.72;filter:blur(3px)">
              <div class="vsx-jrow">
                <div class="vsx-jhead">
                  <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-pulse.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
                  <span class="vsx-brand">Vidya AI <svg class="vsx-verified" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg></span>
                </div>
                <span class="vsx-tag">LEAD SCORING</span>
              </div>
              <h3>Vidya Pulse</h3>
              <dl class="vsx-meta">
                  <div><dt>Score</dt><dd>0&ndash;100</dd></div>
                  <div><dt>Updates</dt><dd>Real time</dd></div>
                  <div><dt>Signal</dt><dd>Buying intent</dd></div>
              </dl>
              <div class="vsx-quote">
                <span class="vsx-qm" aria-hidden="true">&ldquo;</span>
                <p class="vsx-desc">Scores every lead 0&ndash;100 on real buying intent and re-scores in real time as they engage, so the hottest prospects surface first and counsellors know exactly who to call now.</p>
                <svg class="vsx-net" viewBox="0 0 150 130" fill="none" aria-hidden="true"><path d="M18 96 58 60 96 78 132 34M58 60 44 18M96 78 104 118" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="96" r="4"/><circle cx="58" cy="60" r="5"/><circle cx="96" cy="78" r="4.5"/><circle cx="132" cy="34" r="4"/><circle cx="44" cy="18" r="3.5"/><circle cx="104" cy="118" r="3.5"/></svg>
              </div>
              <div class="vsx-jfoot">
                <a class="vsx-apply" href="#admission-form" aria-label="Try Vidya Pulse - book a demo">Try it now <span class="vsx-arw2" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h12M12 6l6 6-6 6"/></svg></span></a>
                <span class="vsx-stat"><i class="vsx-stat-i" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 14a2 2 0 100-4 2 2 0 000 4z"/><path d="M13.4 10.6L18 6"/><path d="M3.5 18a9 9 0 1117 0"/></svg></i>0&ndash;100 score</span>
              </div>
            </article>

            <article class="vsx-card vsx-job" style="--ca:#8bb7fa;transform:scale(.87);opacity:.72;filter:blur(3px)">
              <div class="vsx-jrow">
                <div class="vsx-jhead">
                  <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-ai-voice-agent.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
                  <span class="vsx-brand">Vidya AI <svg class="vsx-verified" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg></span>
                </div>
                <span class="vsx-tag">VOICE AI</span>
              </div>
              <h3>Vidyaai Voice Agent</h3>
              <dl class="vsx-meta">
                  <div><dt>Channel</dt><dd>Outbound</dd></div>
                  <div><dt>Languages</dt><dd>10+ Indian</dd></div>
                  <div><dt>Available</dt><dd>24&times;7</dd></div>
              </dl>
              <div class="vsx-quote">
                <span class="vsx-qm" aria-hidden="true">&ldquo;</span>
                <p class="vsx-desc">Calls every new lead within seconds and holds natural, human-like conversations that qualify interest and book counselling slots &mdash; in 10+ Indian languages, around the clock.</p>
                <svg class="vsx-net" viewBox="0 0 150 130" fill="none" aria-hidden="true"><path d="M18 96 58 60 96 78 132 34M58 60 44 18M96 78 104 118" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="96" r="4"/><circle cx="58" cy="60" r="5"/><circle cx="96" cy="78" r="4.5"/><circle cx="132" cy="34" r="4"/><circle cx="44" cy="18" r="3.5"/><circle cx="104" cy="118" r="3.5"/></svg>
              </div>
              <div class="vsx-jfoot">
                <a class="vsx-apply" href="#admission-form" aria-label="Try Vidyaai Voice Agent - book a demo">Try it now <span class="vsx-arw2" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h12M12 6l6 6-6 6"/></svg></span></a>
                <span class="vsx-stat"><i class="vsx-stat-i" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.6 2.6 15.4 0 18M12 3c-2.6 2.6-2.6 15.4 0 18"/></svg></i>10+ languages</span>
              </div>
            </article>

            <article class="vsx-card vsx-job" style="--ca:#3474d3;transform:scale(.87);opacity:.72;filter:blur(3px)">
              <div class="vsx-jrow">
                <div class="vsx-jhead">
                  <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidyawaba-gpt.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
                  <span class="vsx-brand">Vidya AI <svg class="vsx-verified" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg></span>
                </div>
                <span class="vsx-tag">WHATSAPP</span>
              </div>
              <h3>VidyaWABA GPT</h3>
              <dl class="vsx-meta">
                  <div><dt>Channel</dt><dd>WhatsApp API</dd></div>
                  <div><dt>Account</dt><dd>Verified</dd></div>
                  <div><dt>Journeys</dt><dd>Automated</dd></div>
              </dl>
              <div class="vsx-quote">
                <span class="vsx-qm" aria-hidden="true">&ldquo;</span>
                <p class="vsx-desc">Runs admissions on the official, verified WhatsApp Business API &mdash; automated replies, smart broadcasts and personalised nurture journeys at scale, with every reply logged back to the lead.</p>
                <svg class="vsx-net" viewBox="0 0 150 130" fill="none" aria-hidden="true"><path d="M18 96 58 60 96 78 132 34M58 60 44 18M96 78 104 118" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="96" r="4"/><circle cx="58" cy="60" r="5"/><circle cx="96" cy="78" r="4.5"/><circle cx="132" cy="34" r="4"/><circle cx="44" cy="18" r="3.5"/><circle cx="104" cy="118" r="3.5"/></svg>
              </div>
              <div class="vsx-jfoot">
                <a class="vsx-apply" href="#admission-form" aria-label="Try VidyaWABA GPT - book a demo">Try it now <span class="vsx-arw2" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h12M12 6l6 6-6 6"/></svg></span></a>
                <span class="vsx-stat"><i class="vsx-stat-i" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12a8 8 0 01-8 8H4l2.1-3.1A8 8 0 1121 12z"/></svg></i>Official WABA</span>
              </div>
            </article>

            <article class="vsx-card vsx-job" style="--ca:#fb8124;transform:scale(.87);opacity:.72;filter:blur(3px)">
              <div class="vsx-jrow">
                <div class="vsx-jhead">
                  <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-work.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
                  <span class="vsx-brand">Vidya AI <svg class="vsx-verified" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg></span>
                </div>
                <span class="vsx-tag">AUTOMATION</span>
              </div>
              <h3>Vidya Work <span class="vsx-soon">Upcoming</span></h3>
              <dl class="vsx-meta">
                  <div><dt>Runs</dt><dd>Follow-ups</dd></div>
                  <div><dt>Routing</dt><dd>Automatic</dd></div>
                  <div><dt>Available</dt><dd>24&times;7</dd></div>
              </dl>
              <div class="vsx-quote">
                <span class="vsx-qm" aria-hidden="true">&ldquo;</span>
                <p class="vsx-desc">Auto-triggers follow-ups and reminders, routes and assigns tasks on its own, and runs the repetitive busywork in the background so every lead keeps moving forward.</p>
                <svg class="vsx-net" viewBox="0 0 150 130" fill="none" aria-hidden="true"><path d="M18 96 58 60 96 78 132 34M58 60 44 18M96 78 104 118" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="96" r="4"/><circle cx="58" cy="60" r="5"/><circle cx="96" cy="78" r="4.5"/><circle cx="132" cy="34" r="4"/><circle cx="44" cy="18" r="3.5"/><circle cx="104" cy="118" r="3.5"/></svg>
              </div>
              <div class="vsx-jfoot">
                <a class="vsx-apply" href="#admission-form" aria-label="Try Vidya Work - book a demo">Try it now <span class="vsx-arw2" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h12M12 6l6 6-6 6"/></svg></span></a>
                <span class="vsx-stat"><i class="vsx-stat-i" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13 2L4.5 13.5H11L10 22l8.5-11.5H12L13 2z"/></svg></i>Zero busywork</span>
              </div>
            </article>

            <article class="vsx-card vsx-job vsx-cta-card" style="--ca:#DE6E30;transform:scale(.87);opacity:.72;filter:blur(3px)">
              <div class="vsx-jrow">
                <div class="vsx-jhead">
                  <span class="vsx-ic vsx-ic--img" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-ai.svg" alt="" loading="lazy" decoding="async" onerror="this.parentNode.classList.remove('vsx-ic--img');this.remove()"></span>
                  <span class="vsx-brand">Vidya AI <svg class="vsx-verified" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg></span>
                </div>
                <span class="vsx-tag">LIVE DEMO</span>
              </div>
              <h3>Try Vidya AI Live</h3>
              <dl class="vsx-meta">
                  <div><dt>Access</dt><dd>Instant</dd></div>
                  <div><dt>Signup</dt><dd>Not needed</dd></div>
                  <div><dt>Agents</dt><dd>All five</dd></div>
              </dl>
              <div class="vsx-quote">
                <span class="vsx-qm" aria-hidden="true">&ldquo;</span>
                <p class="vsx-desc">Explore the live AI inside the product demo and watch every agent work a real admission funnel &mdash; no sales call, no signup.</p>
                <svg class="vsx-net" viewBox="0 0 150 130" fill="none" aria-hidden="true"><path d="M18 96 58 60 96 78 132 34M58 60 44 18M96 78 104 118" stroke="currentColor" stroke-width="1.4"/><circle cx="18" cy="96" r="4"/><circle cx="58" cy="60" r="5"/><circle cx="96" cy="78" r="4.5"/><circle cx="132" cy="34" r="4"/><circle cx="44" cy="18" r="3.5"/><circle cx="104" cy="118" r="3.5"/></svg>
              </div>
              <div class="vsx-jfoot">
                <a class="vsx-apply" href="#ee-platform" aria-label="Open the live Vidya AI demo">Open demo <span class="vsx-arw2" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h12M12 6l6 6-6 6"/></svg></span></a>
                <span class="vsx-stat"><i class="vsx-stat-i" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M10 8.5l6 3.5-6 3.5v-7z"/></svg></i>Live demo</span>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>

<style id="ee-vsx-jobcard">
/* ── Vidya AI agent cards ────────────────────────────────────────────────
   Light card: brand row with the category pill opposite it, a large navy
   agent name, a three-cell fact strip, the description inside a quoted
   panel, and a footer pairing the orange CTA with a fact chip.

   The card paints an opaque near-white surface, so it needs no help from
   the section's navy gradient behind it; the warm corner glows are drawn
   inside the card rather than blended with what is behind. --ca is the
   per-agent accent already set inline on each card.
   Loaded after the section's base rules, so it wins without !important
   except on phones, where the compaction block above uses !important. */
#ee-vidya-suite .vsx-job{
  --jink:#19335D; --jmut:#6B7C96; --jline:#E4E9F1; --jrad:26px;
  position:relative; overflow:hidden;
  display:flex; flex-direction:column; gap:16px; padding:22px 22px 20px;
  background:linear-gradient(180deg,#FFFFFF 0%, #F7F9FC 100%);
  border:1px solid var(--jline); border-radius:var(--jrad);
  box-shadow:0 26px 50px -28px rgba(11,24,48,.55);
}
/* warm corner glows, matching the reference's soft orange bloom */
#ee-vidya-suite .vsx-job::before{
  content:""; position:absolute; left:-90px; top:-70px; width:260px; height:220px;
  background:radial-gradient(circle,rgba(222,110,48,.16),transparent 68%);
  pointer-events:none; height:220px; width:260px; }
#ee-vidya-suite .vsx-job::after{
  content:""; position:absolute; left:-70px; bottom:-60px; width:250px; height:220px;
  background:radial-gradient(circle,rgba(222,110,48,.2),transparent 66%);
  border-radius:0; opacity:1; right:auto; top:auto; pointer-events:none; }
#ee-vidya-suite .vsx-job>*{ position:relative; z-index:1; }

/* brand row */
#ee-vidya-suite .vsx-jrow{ display:flex; align-items:center; gap:10px; }
#ee-vidya-suite .vsx-jhead{ display:flex; align-items:center; gap:10px; min-width:0; }
#ee-vidya-suite .vsx-job .vsx-ic{ width:34px; height:34px; border-radius:10px;
  background:transparent; box-shadow:none; }
#ee-vidya-suite .vsx-job .vsx-ic svg,#ee-vidya-suite .vsx-job .vsx-ic img.eeimg{ width:30px; height:30px; }
#ee-vidya-suite .vsx-job .vsx-ic.vsx-ic--img img{ object-fit:contain; }
#ee-vidya-suite .vsx-brand{ display:inline-flex; align-items:center; gap:6px; min-width:0;
  font:800 17px/1 'Inter',sans-serif; color:var(--jink); letter-spacing:-.02em;
  white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
#ee-vidya-suite .vsx-verified{ width:15px; height:15px; color:#DE6E30; flex:0 0 auto; }
#ee-vidya-suite .vsx-tag{ margin-left:auto; flex:0 0 auto;
  padding:9px 14px; border-radius:999px; background:var(--jink); color:#fff;
  font:800 10.5px/1 'Inter',sans-serif; letter-spacing:.06em; white-space:nowrap; }

/* the site-wide heading scale pins every #main-content h3 to 20px with
   !important, so the agent name has to out-specify it to stay display-sized */
html body #main-content #ee-vidya-suite .vsx-card.vsx-job h3{ margin:0; color:var(--jink);
  font-family:'Inter',sans-serif; font-weight:800 !important; }

/* "Upcoming" tag - Vidya Work is not shipped yet, so the card says so
   next to the name rather than reading like a live module */
#ee-vidya-suite .vsx-soon{ display:inline-block; vertical-align:middle;
  margin-left:8px; padding:5px 10px; border-radius:999px;
  background:var(--orange-050,#FDF2EB); color:var(--orange-700,#B5551D);
  border:1px solid rgba(222,110,48,.32);
  font:800 10.5px/1 'Inter',sans-serif; letter-spacing:.06em;
  text-transform:uppercase; white-space:nowrap; }
@media (max-width:640px){ #ee-vidya-suite .vsx-soon{ font-size:9px; padding:4px 8px; margin-left:6px; } }

/* fact strip */
#ee-vidya-suite .vsx-meta{ display:flex; align-items:stretch; margin:0; padding:0; }
#ee-vidya-suite .vsx-meta>div{ flex:1 1 0; min-width:0; padding:0 12px; }
#ee-vidya-suite .vsx-meta>div:first-child{ padding-left:0; }
#ee-vidya-suite .vsx-meta>div:last-child{ padding-right:0; }
#ee-vidya-suite .vsx-meta>div+div{ border-left:1px solid var(--jline); }
#ee-vidya-suite .vsx-meta dt{ font:500 12px/1.3 'Inter',sans-serif; color:var(--jmut); margin:0 0 5px; }
#ee-vidya-suite .vsx-meta dd{ font:800 14.5px/1.25 'Inter',sans-serif; color:var(--jink);
  margin:0; letter-spacing:-.02em; overflow-wrap:anywhere; }

/* quoted description panel */
#ee-vidya-suite .vsx-quote{ position:relative; overflow:hidden; flex:1 1 auto;
  display:flex; gap:10px; padding:16px 18px;
  background:rgba(240,244,250,.85); border:1px solid rgba(228,233,241,.9);
  border-radius:18px; }
#ee-vidya-suite .vsx-qm{ flex:0 0 auto; color:#DE6E30; font:800 34px/.72 Georgia,'Times New Roman',serif; }
html body #main-content #ee-vidya-suite .vsx-card.vsx-job .vsx-desc{ margin:0; color:#33415C; }
#ee-vidya-suite .vsx-net{ position:absolute; right:-16px; bottom:6px; width:130px; height:112px;
  color:rgba(222,110,48,.22); fill:none; pointer-events:none; }
/* fill belongs to the nodes only - on the connecting path it renders as a solid blob */
#ee-vidya-suite .vsx-net circle{ fill:rgba(222,110,48,.26); }

/* footer: CTA + fact chip */
#ee-vidya-suite .vsx-jfoot{ display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
#ee-vidya-suite .vsx-apply{ display:inline-flex; align-items:center; gap:12px;
  padding:7px 7px 7px 20px; border-radius:999px; text-decoration:none; color:#fff;
  background:linear-gradient(135deg,#E8843F,#DE6E30);
  font:800 14.5px/1 'Inter',sans-serif; letter-spacing:-.01em;
  box-shadow:0 12px 26px -10px rgba(222,110,48,.85), inset 0 1px 0 rgba(255,255,255,.3);
  transition:transform .2s ease, box-shadow .2s ease; }
#ee-vidya-suite .vsx-arw2{ display:grid; place-items:center; width:32px; height:32px;
  border-radius:50%; background:#fff; color:#DE6E30; flex:0 0 auto; }
#ee-vidya-suite .vsx-arw2 svg{ width:16px; height:16px; }
#ee-vidya-suite .vsx-apply:hover{ transform:translateY(-2px);
  box-shadow:0 16px 32px -10px rgba(222,110,48,.95), inset 0 1px 0 rgba(255,255,255,.35); }
#ee-vidya-suite .vsx-apply:focus-visible{ outline:3px solid var(--jink); outline-offset:3px; }
#ee-vidya-suite .vsx-stat{ display:inline-flex; align-items:center; gap:9px; min-width:0;
  padding:10px 16px 10px 11px; border-radius:999px; background:#fff;
  border:1px solid var(--jline); box-shadow:0 6px 16px -10px rgba(11,24,48,.5);
  font:700 13px/1 'Inter',sans-serif; color:var(--jink); white-space:nowrap; }
#ee-vidya-suite .vsx-stat-i{ display:grid; place-items:center; width:24px; height:24px;
  color:var(--jink); flex:0 0 auto; }
#ee-vidya-suite .vsx-stat-i svg{ width:20px; height:20px; }

/* closing card: same build, warm surface */
#ee-vidya-suite .vsx-job.vsx-cta-card{
  background:linear-gradient(180deg,#FFFFFF 0%, #FDF2EB 100%);
  border-color:#F3DDCC; align-items:stretch; justify-content:flex-start; }

/* ── centre-focus rail ──────────────────────────────────────────────────
   The card the reader is on renders full size; its neighbours sit back at
   87% and slightly dimmed. Scale is a transform, so nothing reflows and the
   pinned rail's scroll maths (which measures layout width) is untouched.
   Exactly one card is focused at all times: the one nearest the stage
   centre, or the one being hovered/focused on a fine pointer.

   The script writes transform and opacity as inline styles rather than
   relying on the .is-focus class alone. Unused-CSS removal keeps only the
   selectors it can find in the served HTML, and a class that appears just
   at runtime does not survive it — inline styles do, and they also outrank
   anything a combined stylesheet could put in front of them. The class is
   still set (and rendered on the middle card below, so it is present in
   the source) for the shadow and stacking order. */
#ee-vidya-suite .vsx-job{
  transform:scale(.87); transform-origin:50% 50%; opacity:.72; filter:blur(3px);
  transition:transform .5s cubic-bezier(.2,.7,.2,1), opacity .5s ease,
             filter .5s ease, box-shadow .5s ease; }
#ee-vidya-suite .vsx-job.is-focus{
  transform:scale(1); opacity:1; filter:none; z-index:2;
  box-shadow:0 34px 66px -28px rgba(11,24,48,.75); }
/* the pinned rail moves a whole card per step, so it eases between
   positions instead of tracking the scroll pixel for pixel */
#ee-vidya-suite.vsx-on .vsx-rail{ transition:transform .55s cubic-bezier(.2,.7,.2,1); }
@media (prefers-reduced-motion:reduce){
  #ee-vidya-suite .vsx-job,#ee-vidya-suite.vsx-on .vsx-rail{ transition:none; } }

@media (prefers-reduced-motion:reduce){ #ee-vidya-suite .vsx-apply{ transition:none; } }

/* phones — the compaction block above sets !important on .vsx-card */
@media (max-width:640px){
  #ee-vidya-suite .vsx-job{ padding:16px 16px 15px!important; gap:12px!important; --jrad:20px; }
  #ee-vidya-suite .vsx-job .vsx-ic{ width:28px!important; height:28px!important; }
  #ee-vidya-suite .vsx-job .vsx-ic svg,#ee-vidya-suite .vsx-job .vsx-ic img.eeimg{ width:26px; height:26px; }
  #ee-vidya-suite .vsx-brand{ font-size:14.5px; }
  #ee-vidya-suite .vsx-tag{ font-size:8.5px; padding:7px 10px; }
  #ee-vidya-suite .vsx-meta>div{ padding:0 9px; }
  #ee-vidya-suite .vsx-meta dt{ font-size:10px; margin-bottom:3px; }
  #ee-vidya-suite .vsx-meta dd{ font-size:12.5px; }
  #ee-vidya-suite .vsx-quote{ padding:12px 13px; border-radius:14px; gap:8px; }
  #ee-vidya-suite .vsx-qm{ font-size:27px; }
  #ee-vidya-suite .vsx-net{ width:96px; height:82px; right:-14px; }
  #ee-vidya-suite .vsx-apply{ padding:6px 6px 6px 16px; font-size:13px; gap:9px; }
  #ee-vidya-suite .vsx-arw2{ width:28px; height:28px; }
  #ee-vidya-suite .vsx-stat{ padding:8px 13px 8px 9px; font-size:11.5px; gap:7px; }
  #ee-vidya-suite .vsx-stat-i{ width:20px; height:20px; }
  #ee-vidya-suite .vsx-stat-i svg{ width:17px; height:17px; }
}
</style>

  <script>
  (function(){
    var sec=document.getElementById('ee-vidya-suite'); if(!sec) return;
    var track=sec.querySelector('.vsx-track'), rail=document.getElementById('vsxRail');
    var cards=Array.prototype.slice.call(rail.querySelectorAll('.vsx-card'));
    var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches;
    var mq=window.matchMedia('(min-width:901px)');

    var on=false, step=-1;
    function clamp(v,a,b){ return v<a?a:(v>b?b:v); }
    function recalc(){ if(!on) return; step=-1; onScroll(); }
    /* offset that puts card i in the middle of the rail's viewport.
       offsetLeft/offsetWidth are layout values, so they stay correct under
       the site-wide zoom and are not skewed by the cards' own scale. */
    function centreX(i){
      var c=cards[i];
      return Math.round(c.offsetLeft + c.offsetWidth/2 - rail.clientWidth/2);
    }
    function onScroll(){
      if(!on) return;
      var rect=track.getBoundingClientRect();
      var stk=sec.querySelector('.vsx-sticky');
      var dist=track.offsetHeight - (stk?stk.offsetHeight:window.innerHeight);
      var p = dist>0 ? clamp(-rect.top/dist,0,1) : 0;
      /* one card per slice of the track: scrolling advances the rail a whole
         card at a time and parks it in the middle, rather than sliding
         continuously past the reader */
      var i = clamp(Math.floor(p*cards.length), 0, cards.length-1);
      if(i===step) return;
      step=i;
      rail.style.transform='translate3d('+(-centreX(i))+'px,0,0)';
      if(sec.__vsxActive) sec.__vsxActive(i);
    }
    sec.__vsxPinned=function(){ return on; };
    sec.__vsxStep=function(){ return step; };
    function enable(){
      if(on) return; on=true; sec.classList.add('vsx-on');
      rail.style.transform='translate3d(0,0,0)';
      window.addEventListener('scroll', onScroll, {passive:true});
      recalc();
    }
    function disable(){
      if(!on) return; on=false; step=-1; sec.classList.remove('vsx-on');
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

  /* One product at a time: the card in the middle is full size and sharp,
     the rest are stepped back and blurred. Nothing plays on its own — the
     reader's scroll drives it. On the pinned desktop rail the scroll handler
     above reports which card it parked in the middle; on the phone rail the
     cards snap natively, so the nearest one to the middle is the active one.

     transform, opacity and filter are written as inline styles rather than
     left to the .is-focus class alone: unused-CSS removal keeps only the
     selectors it can find in the served HTML, and a class that appears just
     at runtime does not survive it. */
  (function(){
    var sec=document.getElementById('ee-vidya-suite'); if(!sec) return;
    var rail=document.getElementById('vsxRail'); if(!rail) return;
    var cards=Array.prototype.slice.call(rail.querySelectorAll('.vsx-card'));
    if(cards.length<2) return;
    var frame=sec.querySelector('.vsx-stage')||rail;
    var ticking=false, active=-1;

    function paint(i){
      if(i===active) return;
      active=i;
      for(var j=0;j<cards.length;j++){
        var f=(j===i), c=cards[j];
        c.classList.toggle('is-focus', f);
        c.style.transform=f?'scale(1)':'scale(.87)';
        c.style.opacity=f?'1':'.72';
        c.style.filter=f?'none':'blur(3px)';
      }
    }
    function nearest(){
      var f=frame.getBoundingClientRect(), cx=f.left+f.width/2, best=0, bd=Infinity;
      for(var j=0;j<cards.length;j++){
        var r=cards[j].getBoundingClientRect();
        var d=Math.abs(r.left+r.width/2-cx);
        if(d<bd){ bd=d; best=j; }
      }
      return best;
    }
    function update(){
      ticking=false;
      var pinned=!!(sec.__vsxPinned&&sec.__vsxPinned());
      var i=pinned ? (sec.__vsxStep?sec.__vsxStep():-1) : nearest();
      paint(i<0?nearest():i);
    }
    function schedule(){ if(!ticking){ ticking=true; requestAnimationFrame(update); } }

    /* the pinned handler calls this the moment it changes card, so the
       spotlight lands with the slide instead of a frame later */
    sec.__vsxActive=function(i){ paint(i); };

    rail.addEventListener('scroll',schedule,{passive:true});
    window.addEventListener('scroll',schedule,{passive:true});
    window.addEventListener('resize',function(){ active=-1; schedule(); },{passive:true});
    update();
  })();
  </script>
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
/* White tick on the orange tile. It used to be an external <img> whose own
   artwork was dark, so the color:#fff here never reached it - inline SVG
   takes currentColor. */
#ee-solutions .solb-chk{display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;width:28px;height:28px;border-radius:9px;
  background:linear-gradient(160deg,var(--orange),var(--orange2));color:#fff;}
#ee-solutions .solb-chk svg{color:#fff;}
#ee-solutions .solb-chk svg path{stroke:#fff;}
#ee-solutions .solb-chk img.eeimg,#ee-solutions .solb-chk svg{width:15px;height:15px;}
#ee-solutions .solb-lt{display:flex;flex-direction:column;gap:2px;min-width:0;}
#ee-solutions .solb-lt b{font-family:'Inter',sans-serif;font-weight:600;font-size:14.5px;line-height:1.2;}
#ee-solutions .solb-lt span{font-size:12.5px;line-height:1.35;color:var(--muted);}
#ee-solutions .solb-a .solb-lt span{color:rgba(255,255,255,.62);}
/* Blue row arrows. They used to be an external <img>, which no CSS colour
   can reach - they are inline SVG now so currentColor drives them. The
   .solb-a override is gone with them: that card is white since the
   all-white pass, and a white arrow on it was invisible. */
#ee-solutions .solb-arr{margin-left:auto;flex-shrink:0;color:#1A5FB4;transition:color .25s,transform .25s;}
#ee-solutions .solb-a .solb-arr{color:#1A5FB4;}
#ee-solutions .solb-arr img.eeimg,#ee-solutions .solb-arr svg{width:16px;height:16px;}
#ee-solutions .solb-link:hover .solb-arr{color:#123F73;transform:translateX(3px);}
#ee-solutions .solb-a .solb-link:hover .solb-arr{color:#123F73;}
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
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Admission Management</b><span>Track every applicant in one live pipeline</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Enrollment Management</b><span>Move offers to enrolled &amp; fee-paid, faster</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Walk-in Management</b><span>Log, assign &amp; follow up every campus visit</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
        </div>
      </article>

      <article class="solb-card solb-b">
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-03.svg" alt="" loading="lazy" decoding="async">Study Abroad</span>
        <h3>Purpose-built for overseas education counselling</h3>
        <p class="solb-desc">Manage country, course and intake journeys - with full visibility over agents and consultants.</p>
        <div class="solb-links">
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Study Abroad CRM</b><span>Country, course &amp; intake pipelines in one place</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Education Agents</b><span>Onboard &amp; track sub-agents with clear visibility</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Education Consultants</b><span>Counsellor workflows for visa, docs &amp; apps</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
        </div>
      </article>

      <article class="solb-card solb-c">
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-04.svg" alt="" loading="lazy" decoding="async">Recruitment &amp; Lead Management</span>
        <h3>Fill your funnel - and never let a lead go cold</h3>
        <p class="solb-desc">Source, score, route and nurture every enquiry automatically, from first touch to enrolled.</p>
        <div class="solb-links">
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Student Recruitment</b><span>Source verified enquiries from every channel</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Lead Management</b><span>Score, route &amp; prioritise leads automatically</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Lead Nurturing</b><span>Automated drips across WhatsApp, email &amp; SMS</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
          <a class="solb-link" href="#admission-form"><span class="solb-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="solb-lt"><b>Enrollment CRM</b><span>One CRM from first touch to enrolled</span></span><span class="solb-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
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

<style id="ee-ind-cards">
/* ── Built for every kind of institution ─────────────────────────────────
   Card anatomy from the reference: a large soft icon tile with the name
   beside it, a short orange dash-and-dot rule under the name, the copy
   below across the full card, an orange "Explore" at the foot and a faint
   sparkle in the corner. Three across, and because there are eight
   segments rather than the reference's six, the grid is flex so the short
   last row centres instead of hanging left.

   Type and palette are this site's: Inter throughout, #19335D headings,
   #6B7C96 copy, #B5551D for the link and the rule. Loaded after the
   section's base rules so it wins without !important, except where the
   phone block further down uses !important itself. */
#ee-ind .spx-grid{ display:flex!important; flex-wrap:wrap; justify-content:center;
  gap:clamp(14px,1.7vw,24px); perspective:none; }
#ee-ind .spx-card{ flex:0 1 calc(33.333% - 16px); min-width:250px;
  display:flex; flex-direction:column; align-items:stretch;
  padding:clamp(20px,2vw,28px); border-radius:24px;
  background:rgba(255,255,255,.86); border:1px solid rgba(25,51,93,.07);
  box-shadow:0 20px 44px -32px rgba(25,51,93,.6);
  -webkit-backdrop-filter:blur(6px); backdrop-filter:blur(6px);
  text-decoration:none; overflow:hidden;
  transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
#ee-ind .spx-card:hover{ transform:translateY(-5px);
  border-color:rgba(222,110,48,.28); box-shadow:0 30px 56px -30px rgba(25,51,93,.65); }
#ee-ind .spx-card:focus-visible{ outline:3px solid var(--focus-ring,#1A5FB4); outline-offset:3px; }

/* icon beside the name */
#ee-ind .spx-hd{ display:flex; align-items:center; gap:clamp(13px,1.4vw,20px);
  margin-bottom:clamp(14px,1.6vw,20px); }
#ee-ind .spx-ic{ flex:0 0 auto; width:clamp(56px,5vw,72px); height:clamp(56px,5vw,72px);
  border-radius:20px; display:grid; place-items:center; margin:0;
  background:linear-gradient(160deg,#fff, color-mix(in srgb, var(--g1,#DE6E30) 9%, #fff));
  border:1px solid rgba(25,51,93,.07);
  box-shadow:0 10px 22px -16px rgba(25,51,93,.7), inset 0 1px 0 #fff; }
#ee-ind .spx-ic img,#ee-ind .spx-ic svg{ width:60%; height:60%; object-fit:contain; }
#ee-ind .spx-tt{ min-width:0; }
html body #main-content #ee-ind .spx-wrap .spx-card h3{
  margin:0; color:#19335D; font-family:'Inter',sans-serif;
  font-weight:800 !important; }
/* the dash-and-dot under the name */
#ee-ind .spx-rule{ display:flex; align-items:center; gap:6px; margin-top:9px; }
#ee-ind .spx-rule::before{ content:""; width:26px; height:2px; border-radius:2px;
  background:var(--orange-700,#B5551D); }
#ee-ind .spx-rule::after{ content:""; width:4px; height:4px; border-radius:50%;
  background:var(--orange-700,#B5551D); opacity:.6; }

html body #main-content #ee-ind .spx-wrap .spx-card p{
  margin:0 0 clamp(16px,1.8vw,22px); color:#6B7C96; }

#ee-ind .spx-go{ margin-top:auto; display:inline-flex; align-items:center; gap:7px;
  color:var(--orange-700,#B5551D); font-weight:700; font-size:14px; letter-spacing:-.01em; }
#ee-ind .spx-go svg{ width:15px; height:15px; fill:none; stroke:currentColor;
  stroke-width:2.2; stroke-linecap:round; stroke-linejoin:round;
  transition:transform .25s ease; }
#ee-ind .spx-card:hover .spx-go svg{ transform:translateX(4px); }

/* the corner sparkle */
#ee-ind .spx-spark{ position:absolute; right:18px; bottom:16px;
  width:26px; height:26px; color:rgba(25,51,93,.07); pointer-events:none; }

@media(max-width:980px){ #ee-ind .spx-card{ flex-basis:calc(50% - 12px); } }
@media(max-width:640px){
  /* phones: two cards per row - icon above the name, tighter copy */
  #ee-ind .spx-grid{ gap:9px; }
  #ee-ind .spx-card{ flex:0 1 calc(50% - 5px); min-width:0; padding:13px 12px!important; border-radius:16px; }
  #ee-ind .spx-hd{ flex-direction:column; align-items:flex-start; gap:9px; margin-bottom:9px; }
  #ee-ind .spx-ic{ width:42px!important; height:42px!important; border-radius:13px; }
  #ee-ind .spx-rule{ margin-top:6px; }
  html body #main-content #ee-ind .spx-wrap .spx-card p{ margin-bottom:10px !important; }
  #ee-ind .spx-go{ font-size:11.5px; }
  #ee-ind .spx-go svg{ width:13px; height:13px; }
  #ee-ind .spx-spark{ display:none; }
}
@media(prefers-reduced-motion:reduce){
  #ee-ind .spx-card,#ee-ind .spx-go svg{ transition:none; } }
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
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/edtech.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>EdTech</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>You buy leads by the thousand - every enquiry has to convert.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/coaching-and-training.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>Coaching &amp; Training</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>Batches fill on deadlines - every enquiry counts.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/k-12-schools.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>K-12 Schools</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>Parents take months to choose - trust wins the seat.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/preschools-and-playschools.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>Preschools &amp; Playschools</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>It&rsquo;s their first school - reassurance closes the admission.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/online-degree-programmes.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>Online Degree Programmes</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>You compete nationally for every learner.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/higher-education.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>Higher Education</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>Many programmes, many counsellors - one admissions engine.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/study-abroad-consultants.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>Study Abroad Consultants</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>A single student journey can run for a year.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
      </a>

      <a class="spx-card" href="#admission-form" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-hd">
          <span class="spx-ic spx-ic--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/home-page/channel-partners.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="spx-tt">
            <h3>Channel Partners</h3>
            <span class="spx-rule" aria-hidden="true"></span>
          </span>
        </span>
        <p>Your partners send leads - you need to see every one.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
        <svg class="spx-spark" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c.6 4.9 4.5 8.8 9.4 9.4-4.9.6-8.8 4.5-9.4 9.4-.6-4.9-4.5-8.8-9.4-9.4C7.5 10.8 11.4 6.9 12 2z"/></svg>
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
      <h2 class="cis-title" id="stories-title">Customer Stories - Powering Growth for <em>500+ Happy Customers</em></h2>
      <p class="cis-lead">See how leading education institutions are transforming admissions, improving counsellor productivity, and creating better student experiences with ExtraaEdge.</p>
    </div>

    <div class="cis-rail" role="list">

      <div class="cis-card" role="listitem">
        <div class="cis-video" data-yt="3SHgLf1GFgk" role="button" tabindex="0" aria-label="Play video testimonial: Silky Jain Marwah, Tula's Institute">
          <img src="https://img.youtube.com/vi/3SHgLf1GFgk/hqdefault.jpg" alt="Silky Jain Marwah, Executive Director, Tula's Institute - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 1.8"/></svg>2 min</span>
        </div>
        <div class="cis-foot">
          <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp" alt="Silky Jain Marwah" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">SJ</span></span>
          <div class="cis-meta"><div class="cis-aname">Silky Jain Marwah</div><div class="cis-arole">Executive Director &middot; Tula's Institute</div></div>
        </div>
        <p class="cis-blurb">See how Tula&rsquo;s Institute streamlined its admissions process, strengthened student engagement, and empowered its team with a more organised admissions workflow.</p>
        <button type="button" class="cis-watch">Watch Story <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></button>
      </div>

      <div class="cis-card" role="listitem">
        <div class="cis-video" data-yt="dWLdQ8E3FOU" role="button" tabindex="0" aria-label="Play video testimonial: Pranay Rupani, Annapurna College of Film &amp; Media">
          <img src="https://img.youtube.com/vi/dWLdQ8E3FOU/hqdefault.jpg" alt="Pranay Rupani, Head of Admissions &amp; Marketing, Annapurna College of Film &amp; Media - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 1.8"/></svg>2 min</span>
        </div>
        <div class="cis-foot">
          <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp" alt="Pranay Rupani" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">PR</span></span>
          <div class="cis-meta"><div class="cis-aname">Pranay Rupani</div><div class="cis-arole">Head of Admissions &amp; Marketing &middot; Annapurna College of Film &amp; Media</div></div>
        </div>
        <p class="cis-blurb">Discover how a unified admissions platform helped the team manage enquiries, improve follow-ups, and build a more efficient applicant journey.</p>
        <button type="button" class="cis-watch">Watch Story <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></button>
      </div>

      <div class="cis-card" role="listitem">
        <div class="cis-video" data-yt="yfK83D2SKps" role="button" tabindex="0" aria-label="Play video testimonial: K. Nirmala Devi, Indian Academy Group">
          <img src="https://img.youtube.com/vi/yfK83D2SKps/hqdefault.jpg" alt="K. Nirmala Devi, Assistant Manager, Indian Academy Group - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 1.8"/></svg>2 min</span>
        </div>
        <div class="cis-foot">
          <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp" alt="K. Nirmala Devi" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">KN</span></span>
          <div class="cis-meta"><div class="cis-aname">K. Nirmala Devi</div><div class="cis-arole">Assistant Manager &middot; Indian Academy Group</div></div>
        </div>
        <p class="cis-blurb">Learn how the institution simplified lead management and communication while giving counsellors better visibility across the student admissions journey.</p>
        <button type="button" class="cis-watch">Watch Story <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></button>
      </div>

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
  /* "Watch Story" is the same action as the thumbnail, so it just forwards */
  root.querySelectorAll('.cis-watch').forEach(function(w){
    w.addEventListener('click',function(){
      var v=w.closest('.cis-card').querySelector('.cis-video');
      if(v) v.click();
      if(v) v.scrollIntoView({block:'center',behavior:'smooth'});
    });
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
        <div role="columnheader">Capability</div>
        <div class="us" role="columnheader"><span class="usbadge"><svg viewBox="0 0 24 24" fill="#fff"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg></span>ExtraaEdge</div>
        <div role="columnheader">Other CRMs</div>
        <div role="columnheader">Generic tools</div>
      </div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.9.6 2.9.7a2 2 0 0 1 1.7 2z"/></svg></span><span>AI Voice Agent<small>calls leads in 10+ languages</small></span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="no">&mdash;</span></div><div class="cell" role="cell"><span class="no">&mdash;</span></div></div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.4 8.4 0 0 1-8.5 8.4 8.6 8.6 0 0 1-3.9-.9L3 21l2-5.5a8.4 8.4 0 1 1 16-4z"/><path d="M9 11h.01M12.5 11h.01M16 11h.01"/></svg></span><span>24&times;7 AI chat counsellor<small>VidyaGPT</small></span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="mid">Basic bot</span></div><div class="cell" role="cell"><span class="mid">Basic bot</span></div></div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L4.1 12.6h6L9.9 22 19 11.4h-6L13 2z"/></svg></span><span>Real-time AI lead intent scoring</span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="mid">Rule-based</span></div><div class="cell" role="cell"><span class="mid">Rule-based</span></div></div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16v10H9l-5 4V6z"/><path d="M8.5 10.5h.01M12 10.5h.01M15.5 10.5h.01"/></svg></span><span>Official WhatsApp Business API automation</span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="ok2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="ok2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div></div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 9L12 4 2 9l10 5 10-5z"/><path d="M6 11.5V16c0 1.5 2.7 3 6 3s6-1.5 6-3v-4.5"/></svg></span><span>Built only for admissions</span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="ok2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="mid">Generic CRM</span></div></div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.8.7-2-.1-2.8-.8-.7-2.1-.6-2.9-.2z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.9A12.9 12.9 0 0 1 22 2c0 2.7-.9 7.5-6 11a22.4 22.4 0 0 1-4 2z"/></svg></span><span>Go live in 7 days</span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="mid">Weeks</span></div><div class="cell" role="cell"><span class="mid">Weeks</span></div></div>
      <div class="cmp-row" role="row"><div class="feat" role="rowheader"><span class="fico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="8" width="18" height="4" rx="1"/><path d="M12 8v13M5 12v9h14v-9"/><path d="M7.5 8a2.5 2.5 0 1 1 0-5C10 3 12 8 12 8s2-5 4.5-5a2.5 2.5 0 1 1 0 5"/></svg></span><span>Free migration &amp; 1:1 onboarding</span></div><div class="cell us" role="cell"><span class="ok"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M4 12.5l5 5L20 6.5"/></svg></span></div><div class="cell" role="cell"><span class="no">&mdash;</span></div><div class="cell" role="cell"><span class="no">&mdash;</span></div></div>
    </div>
    <p class="cmp-note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z"/></svg><span>Comparison based on publicly listed features (Jun 2026) - verify for your exact requirements. <b>Switching from another CRM? We migrate your data free.</b></span></p>
    <div class="roi" aria-label="ROI calculator">
      <div class="roi-in">
        <h3>How many more admissions could you get?</h3>
        <p class="sub">Move the sliders - see your upside instantly.</p>
        <div class="fld"><label for="ri1">Monthly enquiries <b id="ro1">2,000</b></label><input id="ri1" type="range" min="200" max="20000" step="100" value="2000"><div class="nums"><span>200</span><span>20,000</span></div></div>
        <div class="fld"><label for="ri2">Current conversion rate <b id="ro2">20%</b></label><input id="ri2" type="range" min="5" max="45" step="1" value="20"><div class="nums"><span>5%</span><span>45%</span></div></div>
        <div class="fld"><label for="ri3">Average fee / student <b id="ro3">&#8377;1.0 L</b></label><input id="ri3" type="range" min="20000" max="800000" step="10000" value="100000"><div class="nums"><span>&#8377;20K</span><span>&#8377;8L</span></div></div>
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
        <a href="#admission-form" class="cta">Get my detailed ROI report</a>
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
@keyframes mxPulse{70%{box-shadow:0 0 0 9px rgba(31,81,157,0)}100%{box-shadow:0 0 0 0 rgba(31,81,157,0)}}.mx h2{font-weight:800;font-size:clamp(30px,4.4vw,52px);line-height:1.08;letter-spacing:-.028em;margin:20px auto 14px;color:var(--navy);max-width:19ch}.mx h2 .hl{color:var(--org);position:relative}.mx .lead{font-size:clamp(15px,1.6vw,17px);line-height:1.65;color:var(--mut);max-width:62ch;margin:0 auto}.mx .lead b{color:var(--navy);font-weight:600}.mx .scrollhint{margin:24px auto 0;display:flex;flex-direction:column;align-items:center;gap:6px;color:var(--mut);font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase}.mx .scrollhint i{width:22px;height:34px;border:2px solid var(--line-2);border-radius:12px;position:relative;font-style:normal}.mx .scrollhint i::after{content:"";position:absolute;left:50%;top:6px;width:4px;height:7px;margin-left:-2px;border-radius:3px;background:var(--org);animation:wheel 1.6s ease-in-out infinite}
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
/* (removed) highlight bar behind .cis-title em - the orange text carries the emphasis on its own */
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

<style id="ee-stories-light">
/* ── Customer stories: light treatment ───────────────────────────────────
   The section was a navy panel; the reference is a light one, so the stage
   turns white with the two brand washes, the cards become white, and every
   text colour flips to the on-white palette. Each card now carries a line
   about the story and a "Watch Story" link, which plays the same video the
   thumbnail does.

   The base rule sets the navy background with !important, so the override
   has to as well. Type and palette are this site's: Inter, #19335D
   headings, #6B7C96 copy, #B5551D links. Loaded after the section's base
   rules, and after the phone block, so both are settled here. */
section#stories{ background:#fff !important; position:relative; overflow:hidden; }
section#stories::before,section#stories::after{ content:""; position:absolute; pointer-events:none; }
section#stories::before{ left:-12%; top:-16%; width:48%; height:60%;
  background:radial-gradient(circle,rgba(222,110,48,.1),transparent 68%); }
section#stories::after{ right:-12%; bottom:-18%; width:50%; height:62%;
  background:radial-gradient(circle,rgba(25,51,93,.09),transparent 70%); }
#stories .cis-wrap{ position:relative; z-index:1; }

/* head */
#stories .cis-head{ text-align:center; }
#stories .cis-eyebrow{ display:inline-flex; align-items:center; gap:8px;
  padding:9px 18px; border-radius:999px; background:#FDF2EB;
  color:var(--orange-700,#B5551D);
  font:800 11.5px/1 'Inter',sans-serif; letter-spacing:.1em; text-transform:uppercase; }
#stories .cis-eyebrow svg{ width:15px; height:15px; }
#stories .cis-title{ color:#19335D; }
#stories .cis-title em{ color:#DE6E30; }
#stories .cis-lead{ color:#6B7C96; max-width:66ch; margin-left:auto; margin-right:auto; }

/* cards */
#stories .cis-card{ background:#fff; border:1px solid rgba(25,51,93,.08);
  border-radius:22px; padding:clamp(14px,1.4vw,18px);
  box-shadow:0 20px 44px -32px rgba(25,51,93,.6);
  display:flex; flex-direction:column; }
#stories .cis-card:hover{ border-color:rgba(222,110,48,.26);
  box-shadow:0 28px 54px -30px rgba(25,51,93,.65); }
#stories .cis-video{ border-radius:14px; overflow:hidden; }
/* white disc play button, centred */
#stories .cis-play{ width:62px; height:62px; border-radius:50%; background:#fff;
  display:grid; place-items:center; box-shadow:0 12px 28px -10px rgba(11,24,48,.6); }
#stories .cis-play img,#stories .cis-play svg{ width:22px; height:22px; }
/* navy duration pill, bottom-right of the thumbnail */
#stories .cis-dur{ display:inline-flex; align-items:center; gap:6px;
  background:#19335D; color:#fff; border-radius:999px;
  padding:6px 12px; font:700 12px/1 'Inter',sans-serif; }
#stories .cis-dur svg{ width:13px; height:13px; }

#stories .cis-foot{ padding:clamp(13px,1.3vw,17px) 2px 0; }
#stories .cis-av{ border:2px solid rgba(222,110,48,.4); }
#stories .cis-aname{ color:#19335D; font-weight:700; }
#stories .cis-arole{ color:#6B7C96; }
html body #main-content #stories .cis-wrap .cis-blurb{
  margin:clamp(11px,1.2vw,15px) 2px clamp(14px,1.5vw,18px); color:#33415C; }

#stories .cis-watch{ margin:auto 2px 4px; align-self:flex-start;
  display:inline-flex; align-items:center; gap:8px;
  background:none; border:0; padding:0; cursor:pointer;
  color:var(--orange-700,#B5551D); font:700 14px/1 'Inter',sans-serif;
  letter-spacing:-.01em; }
#stories .cis-watch svg{ width:15px; height:15px; transition:transform .25s ease; }
#stories .cis-watch:hover svg{ transform:translateX(4px); }
#stories .cis-watch:focus-visible{ outline:3px solid var(--focus-ring,#1A5FB4); outline-offset:3px; border-radius:6px; }

@media(max-width:640px){
  #stories .cis-eyebrow{ font-size:9.5px; padding:7px 13px; }
  #stories .cis-play{ width:48px; height:48px; }
  #stories .cis-dur{ font-size:10.5px; padding:5px 10px; }

  #stories .cis-watch{ font-size:12.5px; }
}
@media(prefers-reduced-motion:reduce){
  #stories .cis-card,#stories .cis-watch svg{ transition:none; } }
</style>




<!-- ===================== SEGMENT · INTERACTIVE PREVIEW ===================== -->
<!-- ===================== SEGMENTS · Built for your institution (scoped #segments) ===================== -->
<!-- (removed dead hidden section: #segments) -->
<!-- (removed dead hidden section: #ecosystem) -->
<!-- ===================== INTEGRATIONS ===================== -->
<style id="ee-integrations-hub">
/* ── Integrations hub ──────────────────────────────────────────────────────
   ExtraaEdge in the middle, the tools an admissions team already runs around
   it, and dotted lines drawn from each tile back to the hub. The lines are
   measured in JS because they start at real tile positions - CSS has no way
   to know where a wrapped grid put things.

   Brand palette only: #19345D navy, #DE6E30 orange, Inter. */
#integrations{background:linear-gradient(180deg,#FBFCFE 0%,#F5F7FB 100%);overflow:hidden}
/* the board is the section, so it gets the full width the shell allows -
   eleven columns at 1320px left each logo about 80px to live in */
#integrations .container{max-width:1440px}

/* header */
#integrations .ih-head{text-align:center;max-width:900px;margin:0 auto clamp(26px,4vw,42px)}
html body #main-content #integrations h2.h2.ih-h2{
  text-align:center !important;font-weight:800 !important;
  
  color:#19345d !important;margin:0 0 14px !important}
#integrations .ih-h2 em{font-style:normal;color:#DE6E30}
#integrations .ih-lead{margin:0 auto;max-width:62ch;font-size:clamp(14.5px,1.6vw,17px);line-height:1.65;color:#6B7C96}
#integrations .ih-lead b{font-weight:600;color:var(--orange-700,#B5551D)}

/* Closing CTA - a copy of the header's Book Demo button, taken from the
   "CTA button" rule in header.php (#site-header .eh-cta): the 135deg
   #DE6E30 -> #FF8A5C gradient, 9px radius, white 600 label, the same arrow
   glyph, soft orange shadow, and a 2px lift into the darker gradient on
   hover. --eh-accent lives on #site-header, so the hexes are literal here.
   Written at the weight the theme's own heading scale uses
   (html body #id a.class + !important) so no cached or plugin stylesheet
   can undo it. */
#integrations .ih-act{display:flex;flex-direction:column;align-items:center;gap:12px;margin:clamp(28px,4vw,44px) 0 0}
html body #integrations a.ih-cta,
html body #main-content #integrations a.ih-cta{
  display:inline-flex !important;align-items:center !important;justify-content:center !important;
  width:auto !important;height:auto !important;min-height:0 !important;
  padding:.55rem 1.2rem !important;gap:.4rem !important;
  border-radius:9px !important;border:none !important;
  background:linear-gradient(135deg,#DE6E30,#FF8A5C) !important;
  color:#fff !important;text-decoration:none !important;
  font-family:'Inter','-apple-system','BlinkMacSystemFont','Segoe UI',Roboto,sans-serif !important;
  font-size:.82rem !important;font-weight:600 !important;letter-spacing:normal !important;
  box-shadow:0 4px 14px rgba(222,110,48,.25) !important;
  cursor:pointer;transition:all .3s ease}
html body #integrations a.ih-cta:hover,
html body #main-content #integrations a.ih-cta:hover{
  background:linear-gradient(135deg,#B85920,#C75E24) !important;color:#fff !important;
  transform:translateY(-2px) !important;box-shadow:0 6px 22px rgba(222,110,48,.35) !important}
html body #integrations a.ih-cta svg{width:16px !important;height:16px !important;
  flex:0 0 auto;stroke:currentColor;fill:none}
#integrations .ih-cta:focus-visible{outline:2px solid #19345d;outline-offset:3px}
#integrations .ih-note{font:600 12.5px/1.5 'Inter',system-ui,sans-serif;color:#6B7C96}

/* board */
#integrations .ih-board{position:relative;margin:clamp(24px,4vw,40px) 0 0}
#integrations .ih-lines{position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:0}
#integrations .ih-lines path{fill:none;stroke-dasharray:3 6;stroke-linecap:round}
#integrations .ih-grid{position:relative;z-index:1;display:grid;
  grid-template-columns:repeat(5,minmax(0,1fr)) minmax(168px,1.05fr) repeat(5,minmax(0,1fr));
  gap:10px;align-items:center}
#integrations .ih-row1{grid-column:1 / -1;display:grid;grid-template-columns:repeat(10,minmax(0,1fr));gap:10px;margin-bottom:10px}
#integrations .ih-hub{grid-row:span 2;display:grid;place-items:center}

/* tiles */
/* tiles carry the logo, so the padding is kept tight and the cap is high -
   the mark should fill the card, not float in it */
#integrations .ih-t{aspect-ratio:1.16;display:grid;place-items:center;padding:6px;
  background:#fff;border:1px solid rgba(25,52,93,.08);border-radius:16px;
  box-shadow:0 8px 22px -16px rgba(25,52,93,.45),0 1px 3px rgba(25,52,93,.04);
  transition:transform .26s cubic-bezier(.2,.9,.3,1),box-shadow .26s ease,border-color .26s ease}
#integrations .ih-t:hover{transform:translateY(-5px);border-color:rgba(222,110,48,.35);
  box-shadow:0 22px 40px -20px rgba(25,52,93,.45)}
/* width/height 100% (not auto) so small-intrinsic SVG logos scale UP to fill
   the tile - auto left them at natural size, floating in white space */
#integrations .ih-t img{width:100%;height:100%;object-fit:contain}

/* the hub itself */
#integrations .ih-core{position:relative;width:min(210px,100%);aspect-ratio:1;display:grid;place-items:center}
#integrations .ih-core::before,#integrations .ih-core::after{content:"";position:absolute;border-radius:50%;border:1px dashed rgba(25,52,93,.18)}
#integrations .ih-core::before{inset:0}
#integrations .ih-core::after{inset:13%;border-color:rgba(222,110,48,.28)}
#integrations .ih-disc{position:relative;width:74%;aspect-ratio:1;border-radius:50%;background:#fff;
  border:1px solid rgba(25,52,93,.08);display:grid;place-items:center;padding:10px;
  box-shadow:0 22px 46px -20px rgba(25,52,93,.45)}
#integrations .ih-disc img{max-width:100%;height:auto}
@keyframes ihPulse{0%{transform:scale(1);opacity:.5}70%{transform:scale(1.18);opacity:0}100%{opacity:0}}
#integrations .ih-core i{position:absolute;inset:6%;border-radius:50%;border:1px solid rgba(222,110,48,.35);animation:ihPulse 3.4s ease-out infinite}

/* benefits bar */
#integrations .ih-bar{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:0;
  margin:clamp(28px,4vw,44px) 0 0;background:#fff;border:1px solid rgba(25,52,93,.08);
  border-radius:18px;box-shadow:0 14px 34px -26px rgba(25,52,93,.5);overflow:hidden}
#integrations .ih-bar div{display:flex;align-items:center;gap:12px;padding:18px 20px;border-left:1px solid rgba(25,52,93,.07)}
#integrations .ih-bar div:first-child{border-left:0}
#integrations .ih-bar svg{width:26px;height:26px;flex:0 0 auto;color:var(--orange-700,#B5551D)}
#integrations .ih-bar b{font:700 14.5px/1.3 'Inter',system-ui,sans-serif;color:#19345d}

@media(max-width:1100px){
  #integrations .ih-lines{display:none}
  #integrations .ih-grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:12px}
  #integrations .ih-row1{grid-template-columns:repeat(6,minmax(0,1fr));gap:12px}
  #integrations .ih-hub{grid-column:1 / -1;grid-row:auto;order:-1;margin-bottom:6px}
  #integrations .ih-bar{grid-template-columns:repeat(2,minmax(0,1fr))}
  #integrations .ih-bar div:nth-child(odd){border-left:0}
  #integrations .ih-bar div{border-top:1px solid rgba(25,52,93,.07)}
  #integrations .ih-bar div:nth-child(-n+2){border-top:0}
}
/* the header shrinks its CTA at these two points, so this one does too */
@media(max-width:1023.98px){
  html body #integrations a.ih-cta,
  html body #main-content #integrations a.ih-cta{
    padding:.42rem .75rem !important;font-size:.72rem !important;gap:.25rem !important;white-space:nowrap}
  html body #integrations a.ih-cta svg{width:12px !important;height:12px !important}
}
@media(max-width:400px){
  html body #integrations a.ih-cta,
  html body #main-content #integrations a.ih-cta{padding:.62rem .7rem !important;font-size:.72rem !important}
}
/* phones rebuild the logo wall as a marquee (built by the script after the
   section); hidden everywhere until that build actually runs, so desktop
   and no-JS keep the grid exactly as it is */
#integrations .ih-mq{display:none}
@media(max-width:640px){
  /* phones: the hub stays as the centrepiece, the 30-tile wall becomes two
     auto-scrolling logo rows (same marquee language as the trusted-logos
     strip), and the benefits bar turns into tidy 2-col chips */
  #integrations .ih-h2 br{display:none}
  #integrations .ih-lead{font-size:13.5px}
  #integrations .ih-grid,#integrations .ih-row1{grid-template-columns:repeat(4,minmax(0,1fr));gap:8px}
  #integrations .ih-t{border-radius:12px;padding:6px}
  #integrations .ih-t:hover{transform:none}
  #integrations.ih-has-mq .ih-row1{display:none}
  #integrations.ih-has-mq #ihGrid .ih-t{display:none}
  #integrations.ih-has-mq .ih-grid{display:block}
  #integrations.ih-has-mq .ih-board{margin-top:18px}
  #integrations.ih-has-mq .ih-mq{display:block;position:relative;margin:16px -18px 0;overflow:hidden;
    -webkit-mask-image:linear-gradient(90deg,transparent,#000 9%,#000 91%,transparent);
    mask-image:linear-gradient(90deg,transparent,#000 9%,#000 91%,transparent)}
  #integrations .ih-mq-row{display:flex;width:max-content;animation:ihMq 36s linear infinite;padding:5px 0}
  #integrations .ih-mq-row.r2{animation-duration:44s;animation-direction:reverse}
  #integrations .ih-mq-set{display:flex;gap:9px;padding-right:9px}
  #integrations .ih-mq .ih-t{display:grid;flex:0 0 auto;width:78px;border-radius:13px;padding:7px;
    box-shadow:0 6px 16px -12px rgba(25,52,93,.45),0 1px 3px rgba(25,52,93,.05)}
  #integrations .ih-core{width:120px}
  #integrations .ih-bar{grid-template-columns:repeat(2,minmax(0,1fr));border-radius:15px;margin-top:22px}
  #integrations .ih-bar div{border-left:0;border-top:1px solid rgba(25,52,93,.07);padding:11px 12px;gap:9px}
  #integrations .ih-bar div:nth-child(-n+2){border-top:0}
  #integrations .ih-bar div:last-child{grid-column:1 / -1;justify-content:center}
  #integrations .ih-bar svg{width:18px;height:18px}
  #integrations .ih-bar b{font-size:11.5px;line-height:1.35}
  #integrations .ih-note{font-size:12px;text-align:center}
}
@keyframes ihMq{to{transform:translateX(-50%)}}
@media(prefers-reduced-motion:reduce){
  #integrations .ih-mq-row{animation:none}
  #integrations .ih-mq{overflow-x:auto}
}
@media(prefers-reduced-motion:reduce){
  #integrations .ih-t{transition:none}
  #integrations .ih-core i{animation:none}
  #integrations .ih-cta{transition:none}
  #integrations .ih-cta:hover{transform:none}
}
</style>

<section class="sec" id="integrations">
  <div class="container">
    <div class="ih-head rv">
      <h2 class="h2 ih-h2">Connect Your <em>Admissions Stack</em><br> With <em>ExtraaEdge</em></h2>
      <p class="ih-lead">Seamlessly integrate the tools your team already uses and manage every student interaction from <b>one connected CRM</b>.</p>
    </div>

    <div class="ih-board rv" id="ihBoard">
      <svg class="ih-lines" id="ihLines" aria-hidden="true"></svg>
      <div class="ih-grid" id="ihGrid">
        <?php
        /* Only the tools on the approved artwork. Filenames are the ones
           already in the media library, so nothing new has to be uploaded. */
        $IH_B  = 'https://www.extraaedge.com/wp-content/uploads/2026/intigration-logo/';
        $IH_WA = 'https://www.extraaedge.com/wp-content/uploads/2026/social-icons/whatsapp-icon.webp';
        $ih_row1 = array(
          array('linkedin-ads.svg','LinkedIn Ads'), array('google-ads.svg','Google Ads'),
          array('google-remarketing.svg','Google Analytics'), array('facebook-ads.svg','Facebook Ads'),
          array('instagram.svg','Instagram'), array('__wa','WhatsApp'),
          array('shiksha.svg','Shiksha'), array('collegedekho.svg','CollegeDekho'),
          array('collegedunia-learn.svg','Collegedunia'), array('justdial.svg','Justdial'),
        );
        $ih_left = array(
          array('wix.svg','Wix'), array('wordpress.svg','WordPress'), array('asterisk.svg','Asterisk'),
          array('zoho-forms.svg','Zoho Forms'), array('contact-form-7.svg','Contact Form 7'),
          array('sendgrid.svg','SendGrid'), array('msg91.svg','MSG91'), array('netcore.svg','Netcore'),
          array('razorpay.svg','Razorpay'), array('stripe.svg','Stripe'),
        );
        $ih_right = array(
          array('typeform.svg','Typeform'), array('elementor.svg','Elementor'), array('populi.svg','Populi'),
          array('unlayer.svg','Unlayer'), array('twilio.svg','Twilio'),
          array('paytm.svg','Paytm'), array('adib.svg','ADIB'), array('hdfc-bank.svg','HDFC Bank'),
          array('mastercard.svg','Mastercard'), array('easebuzz.svg','Easebuzz'),
        );
        $ih_tile = function ($x) use ($IH_B, $IH_WA) {
          $src = ($x[0] === '__wa') ? $IH_WA : $IH_B . $x[0];
          echo '<div class="ih-t"><img src="' . esc_url($src) . '" alt="' . esc_attr($x[1])
             . '" loading="lazy" decoding="async" onerror="this.closest(\'.ih-t\').remove()"></div>';
        };
        ?>
        <div class="ih-row1"><?php foreach ($ih_row1 as $x) $ih_tile($x); ?></div>

        <?php foreach (array_slice($ih_left, 0, 5) as $x) $ih_tile($x); ?>
        <div class="ih-hub">
          <div class="ih-core">
            <i aria-hidden="true"></i>
            <div class="ih-disc"><img src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg" alt="ExtraaEdge" width="120" height="30" loading="lazy" decoding="async"></div>
          </div>
        </div>
        <?php foreach (array_slice($ih_right, 0, 5) as $x) $ih_tile($x); ?>

        <?php foreach (array_slice($ih_left, 5) as $x) $ih_tile($x); ?>
        <?php foreach (array_slice($ih_right, 5) as $x) $ih_tile($x); ?>
      </div>
    </div>

    <div class="ih-bar rv">
      <div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.5.5l3-3a5 5 0 0 0-7-7l-1.7 1.7"/><path d="M14 11a5 5 0 0 0-7.5-.5l-3 3a5 5 0 0 0 7 7L12 19"/></svg><b>Easy<br>Integrations</b></div>
      <div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 1-15.5 6.2L3 16"/><path d="M3 12a9 9 0 0 1 15.5-6.2L21 8"/><path d="M21 3v5h-5M3 21v-5h5"/></svg><b>Real-time<br>Data Sync</b></div>
      <div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3.5v5c0 4.8-3.3 8.7-8 9.5-4.7-.8-8-4.7-8-9.5v-5z"/><path d="M9 12l2 2 4-4"/></svg><b>Secure &amp;<br>Reliable</b></div>
      <div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3.2"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1A1.7 1.7 0 0 0 8.9 19a1.7 1.7 0 0 0-1.9.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1A1.7 1.7 0 0 0 4.6 8.4a1.7 1.7 0 0 0-.3-1.9l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.9.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.9V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1z"/></svg><b>Automate<br>Workflows</b></div>
      <div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M10 20V4M16 20v-8M21 20H3"/></svg><b>Smarter Decisions.<br>Better Outcomes.</b></div>
    </div>

    <div class="ih-act rv">
      <a class="ih-cta" href="/products/">See All Integrations
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
      </a>
      <span class="ih-note">Setup handled by our team &middot; Don&rsquo;t see your tool? We&rsquo;ll integrate it.</span>
    </div>
  </div>
</section>

<script>
/* ── hub connectors ──
   Curves from every tile to the hub, drawn once the grid has been laid out
   and redrawn on resize. Off below 1100px, where the hub sits above the
   tiles and lines would only be noise. */
(function(){
  var board=document.getElementById('ihBoard'); if(!board) return;
  var svg=document.getElementById('ihLines'), grid=document.getElementById('ihGrid');
  function draw(){
    svg.innerHTML='';
    if(window.innerWidth<=1100) return;
    var core=board.querySelector('.ih-core'); if(!core) return;
    var b=board.getBoundingClientRect(), c=core.getBoundingClientRect();
    svg.setAttribute('viewBox','0 0 '+Math.round(b.width)+' '+Math.round(b.height));
    var cx=c.left-b.left+c.width/2, cy=c.top-b.top+c.height/2, r=c.width/2;
    var tiles=[].slice.call(grid.querySelectorAll('.ih-t'));
    var out='';
    tiles.forEach(function(t,i){
      var q=t.getBoundingClientRect();
      var x=q.left-b.left+q.width/2, y=q.top-b.top+q.height/2;
      var dx=cx-x, dy=cy-y, d=Math.sqrt(dx*dx+dy*dy) || 1;
      /* stop at the ring rather than the centre, so nothing runs under the disc */
      var ex=cx-dx/d*(r+6), ey=cy-dy/d*(r+6);
      /* bow each curve a little, alternating sides, for the fanned look */
      var mx=(x+ex)/2 + (-dy/d)*(i%2?18:-18), my=(y+ey)/2 + (dx/d)*(i%2?18:-18);
      out+='<path d="M'+x.toFixed(1)+' '+y.toFixed(1)+' Q'+mx.toFixed(1)+' '+my.toFixed(1)+' '+ex.toFixed(1)+' '+ey.toFixed(1)+'" stroke="'+(i%3?'rgba(25,52,93,.28)':'rgba(222,110,48,.42)')+'" stroke-width="1"/>';
    });
    svg.innerHTML=out;
  }
  var t=null;
  function later(){ clearTimeout(t); t=setTimeout(draw,120); }
  if(document.readyState==='loading') document.addEventListener('DOMContentLoaded',later); else later();
  window.addEventListener('resize',later);
  window.addEventListener('load',later);
})();
/* ── phone marquee ──
   On phones the 30-tile wall reads as a shapeless brick grid, so the tiles
   are cloned into two counter-scrolling rows under the hub (each row's set
   doubled for the seamless -50% loop). Built once, the first time the
   viewport is actually a phone; the .ih-has-mq class swaps grid -> marquee
   purely in CSS, so no-JS and desktop never change. */
(function(){
  var sec=document.getElementById('integrations'); if(!sec) return;
  var built=false, mq=window.matchMedia('(max-width:640px)');
  function build(){
    if(built||!mq.matches) return;
    var tiles=[].slice.call(sec.querySelectorAll('#ihGrid .ih-t'));
    if(tiles.length<6) return;
    built=true;
    var wrap=document.createElement('div');
    wrap.className='ih-mq'; wrap.setAttribute('aria-hidden','true');
    var half=Math.ceil(tiles.length/2);
    [tiles.slice(0,half),tiles.slice(half)].forEach(function(set,ri){
      var row=document.createElement('div');
      row.className='ih-mq-row'+(ri?' r2':'');
      for(var k=0;k<2;k++){
        var g=document.createElement('div'); g.className='ih-mq-set';
        set.forEach(function(tile){ g.appendChild(tile.cloneNode(true)); });
        row.appendChild(g);
      }
      wrap.appendChild(row);
    });
    document.getElementById('ihBoard').appendChild(wrap);
    sec.classList.add('ih-has-mq');
  }
  if(document.readyState==='loading') document.addEventListener('DOMContentLoaded',build); else build();
  (mq.addEventListener?mq.addEventListener.bind(mq,'change'):mq.addListener.bind(mq))(build);
})();
</script>


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
  /* SWITCH - compact: the section reads as a closing nudge, not a hero.
     Later in the same sheet than the grouped rules above, so ties resolve here. */
  #ee-switch{padding:clamp(34px,4.5vw,56px) 0}
  #ee-switch .rvw{max-width:960px}
  #ee-switch .swl,#ee-switch .swr{padding:clamp(20px,2.6vw,32px)}
  #ee-switch .swl h2{font-size:clamp(20px,2.6vw,28px);margin:0 0 10px}
  #ee-switch .swl h2 em{font-style:normal;color:#E8843F}
  #ee-switch .swl p{font-size:13.5px;margin:0 0 16px}
  #ee-switch .swl ul{gap:9px;margin:0 0 18px}
  #ee-switch .swl li{font-size:13px}
  #ee-switch .swl li svg,#ee-switch .swl li img.eeimg{width:16px;height:16px}
  #ee-switch .swl .cta{font-size:14px;padding:12px 22px;border-radius:10px}
  #ee-switch .swr{gap:11px}
  #ee-switch .swr .g{font-size:13px;gap:10px}
  #ee-switch .swr .g b{width:30px;height:30px}
  /* phones: the section is dropped entirely */
  @media(max-width:820px){#ee-switch{display:none!important}}
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
                <h2>Switching is easy - leave your legacy CRM in <em>14 days</em>.</h2>
        <p>Outgrown a generic CRM or a basic enrollment tool? Move to the AI-native platform built only for admissions - we do the heavy lifting.</p>
        <ul>
          <li><img class="eeimg ee-ico-white" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-01.svg" alt="" loading="lazy" decoding="async"> <b>Free data migration</b> - leads, history &amp; templates</li>
          <li><img class="eeimg ee-ico-white" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-01.svg" alt="" loading="lazy" decoding="async"> Run both in parallel - <b>zero downtime</b></li>
          <li><img class="eeimg ee-ico-white" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/switch-icon-01.svg" alt="" loading="lazy" decoding="async"> 1:1 onboarding &amp; counsellor training included</li>
        </ul>
        <a href="#admission-form" class="cta">Get a free migration plan</a>
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



/* The integrations explorer (category tabs + rotating grid) is gone - the
   section is a single hub board now, and its connector script lives with the
   markup. */




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
      '<br><a href="'+link+'" target="_blank" rel="noopener" class="btn btn-dark" style="margin-top:14px">Confirm instantly on WhatsApp</a>';
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
/* #ee-products is exempt from both rules below: it is now a deliberate
   dark stage with its own glow orbs, not a white section that picked up a
   stray motif. */
#ee-solutions::before,#ee-resources::before,#integrations::before,#security::before,#stories::before{ display:none!important; }/* plain white section backgrounds (keeps intentional dark component panels intact) */
#ee-solutions,#ee-resources,#ee-industries{ background:#ffffff!important; }
</style>

<!-- (removed) EE · SMOOTH INERTIA SCROLL - wheel hijack dropped in favor of native scrolling for performance -->


<style id="ee-brand-lock">
.ee-home, .ee-home *:not(svg):not(svg *){ font-family:'Inter',system-ui,-apple-system,'Segoe UI',Roboto,'Apple Color Emoji','Segoe UI Emoji','Noto Color Emoji',sans-serif !important; }
.ee-home{ background:#ffffff !important; }
</style>





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

  /* (eyebrow labels were removed from the markup site-wide - their meaning
     now lives inside each section's H2, so there is nothing left to hide) */
}
</style>

<style id="ee-spatial-skin">
/* Apple visionOS "spatial" skin - VISUAL ONLY. Layout, markup and content of
   these sections are untouched; only their backgrounds turn into soft ambient
   depth and their existing cards become frosted glass. */

/* soft ambient depth behind the light sections. #ee-products is not one of
   them any more - it is a dark navy stage with its own orbs, and this rule
   carried !important, so leaving it listed would repaint it white. */
#ee-teams, #ee-solutions, #ee-golive, #ee-resources{
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
.ee-home>#ee-products{order:70}           /* Full platform / modules */
.ee-home>#ee-vidya-suite{order:80}        /* AI differentiator */
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
#ee-solutions,#ee-ind,#stories,#ee-cro,#integrations,#security,
#ee-golive,#ee-switch,#ee-resources,#faq{
  content-visibility:auto;
  contain-intrinsic-size:auto 760px;
}
</style>

<style id="ee-ico-white">
/* Icons sitting on the navy panels are external SVG files with their own
   orange artwork, so no CSS colour reaches them. brightness(0) flattens
   whatever is inside to black while keeping its alpha, and invert(1) turns
   that black to white — the shape survives, the colour does not. */
.ee-ico-white{ filter:brightness(0) invert(1); }
</style>

<style id="ee-cta-unify">
/* The shared button skin moved to footer.php (#ee-btn-standard) so every
   page gets the same one, header CTA included. Only the two home-page
   exceptions live here. */
#xhero .cta-roi-link{color:var(--orange-700,#B5551D);font-weight:600;text-decoration:underline;text-underline-offset:3px}
#xhero .cta-roi-link:hover{color:var(--orange-800,#A8501C)}

/* Low-friction secondary CTA: quiet outline so Book a Demo stays dominant.
   Geometry matches the standard button so the pair reads as one system. */
#xhero .btn-watch{background:transparent!important;color:#19335D!important;
  border:1.5px solid rgba(25,51,93,.35)!important;border-radius:10px!important;
  font-weight:700!important;box-shadow:none!important}
#xhero .btn-watch:hover{background:#EEF2F8!important;border-color:#19335D!important;
  transform:translateY(-2px);box-shadow:none!important}
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
/* the row arrows are blue now - this block set them muted grey when the
   card turned white, and it carries !important, so it has to say blue too */
#ee-solutions .solb-a .solb-arr{color:#1A5FB4!important}
#ee-solutions .solb-a .solb-link:hover .solb-arr{color:#123F73!important}
</style>

<style id="ee-img-boost">
/* ── Bigger product imagery: users must be able to read what's inside the
   screenshots. Desktop-only column rebalance - phones keep their layouts. ── */
@media(min-width:961px){
  /* Architect of Admissions: image column grows from ~49% to 56% */
    /* Respond First: browser-preview column grows, story cards narrow */
  #ee-rfa .rfa-in{grid-template-columns:minmax(0,1.2fr) minmax(0,.8fr) 18px}
  #ee-rfa .rfa-shot{padding:4px}
}
/* Powerful Admission CRM with Simplicity: screenshot column 7/12 -> 8/12 */
@media(min-width:1024px){
  #vidyaai-embed-root .lg\:col-span-5{grid-column:span 4/span 4}
  #vidyaai-embed-root .lg\:col-span-7{grid-column:span 8/span 8}
}
</style>

<style id="vz-pro">
/* ── Powerful Admission CRM: professional skin. Scoped overrides only -
   markup and the embed's own scroll-sync stay untouched. ── */
/* story cards: gradient hairline, layered depth, hover lift */
#vidyaai-embed-root .story-card{position:relative;border-radius:24px!important;border:1px solid #E7EBF1!important;
  box-shadow:0 2px 6px rgba(15,32,58,.04),0 30px 70px -34px rgba(25,52,93,.35)!important;
  transition:transform .35s cubic-bezier(.22,1,.36,1),box-shadow .35s ease,opacity .6s ease!important;overflow:hidden}
#vidyaai-embed-root .story-card::before{content:"";position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,#DE6E30,#FF8A5C 45%,transparent 85%)}
#vidyaai-embed-root .story-card:hover{transform:translateY(-4px);
  box-shadow:0 2px 6px rgba(15,32,58,.05),0 44px 90px -34px rgba(25,52,93,.45)!important}
/* screenshots inside a mac-style window frame */
#vidyaai-embed-root .story-img-container{position:relative;background:#fff!important;
  border:1px solid rgba(25,52,93,.12)!important;border-radius:16px!important;overflow:hidden}
#vidyaai-embed-root .story-img-container img{display:block;background:#fff;
  transition:transform .5s cubic-bezier(.22,1,.36,1)}
#vidyaai-embed-root .story-card:hover .story-img-container img{transform:scale(1.015)}
/* left rail: card polish + orange active state */
#vidyaai-embed-root #navCard{border-radius:20px!important;border:1px solid #E7EBF1!important;
  box-shadow:0 2px 6px rgba(15,32,58,.05),0 26px 60px -30px rgba(25,52,93,.35)!important}
#vidyaai-embed-root .feature-nav-item{border-radius:14px!important;
  transition:transform .3s cubic-bezier(.22,1,.36,1),background .3s,border-color .3s!important}
#vidyaai-embed-root .feature-nav-item:hover{transform:translateX(3px)}
#vidyaai-embed-root .feature-nav-item.active{
  background:linear-gradient(90deg,rgba(222,110,48,.1),rgba(222,110,48,.03))!important;
  border-color:rgba(222,110,48,.35)!important}
#vidyaai-embed-root .feature-nav-item.active .w-10{
  background:linear-gradient(135deg,#E8843F,#DE6E30)!important;
  box-shadow:0 8px 18px -6px rgba(222,110,48,.55)}
#vidyaai-embed-root .feature-nav-item.active .w-10 img{filter:brightness(0) invert(1)}
#vidyaai-embed-root .feature-nav-item.active .nav-title{color:var(--orange-700,#B5551D)!important}
/* mini feature tiles: lively hover */
#vidyaai-embed-root .story-card .bg-slate-50{transition:transform .25s ease,border-color .25s,box-shadow .25s}
#vidyaai-embed-root .story-card .bg-slate-50:hover{transform:translateY(-3px);
  border-color:rgba(222,110,48,.45)!important;box-shadow:0 12px 26px -14px rgba(25,52,93,.3)}
/* scroll reveal (JS-gated so no-JS never hides content) */
#vidyaai-embed-root.vz-ready .story-card{opacity:0;transform:translateY(26px)}
#vidyaai-embed-root.vz-ready .story-card.vz-in{opacity:1;transform:none}
#vidyaai-embed-root.vz-ready .story-card.vz-in:hover{transform:translateY(-4px)}
@media(prefers-reduced-motion:reduce){
  #vidyaai-embed-root.vz-ready .story-card{opacity:1;transform:none;transition:none!important}
  #vidyaai-embed-root .story-img-container img{transition:none}
}
</style>
<script>
(function(){
  var root=document.getElementById('vidyaai-embed-root');
  if(!root||!('IntersectionObserver' in window)) return;
  root.classList.add('vz-ready');
  var io=new IntersectionObserver(function(es){ es.forEach(function(e){
    if(e.isIntersecting){ e.target.classList.add('vz-in'); io.unobserve(e.target); } }); },{threshold:.1});
  root.querySelectorAll('.story-card').forEach(function(c){ io.observe(c); });
})();
</script>

<style id="ee-nav-wow">
/* ── Powerful CRM: "wow" navigation panel. Deep navy glass card with
   glowing orange active row - markup and scroll-sync untouched. ── */
#vidyaai-embed-root #navCard{position:relative;overflow:hidden;
  background:linear-gradient(150deg,#0F2547,#19345D 55%,#22467C)!important;
  border:1px solid rgba(255,255,255,.08)!important;border-radius:22px!important;
  box-shadow:0 30px 80px -30px rgba(15,32,58,.65),0 12px 34px -18px rgba(222,110,48,.35)!important}
#vidyaai-embed-root #navCard::before{content:"";position:absolute;inset:0;border-radius:inherit;padding:1px;
  background:linear-gradient(135deg,rgba(222,110,48,.55),rgba(255,255,255,.12) 40%,transparent 70%);
  -webkit-mask:linear-gradient(#fff 0 0) content-box,linear-gradient(#fff 0 0);
  -webkit-mask-composite:xor;mask-composite:exclude;pointer-events:none;z-index:0}
#vidyaai-embed-root #navCard::after{content:"";position:absolute;top:-70px;right:-70px;width:230px;height:230px;
  border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.38),transparent 70%);
  filter:blur(8px);pointer-events:none;z-index:0}
/* rows: frosted glass on navy */
#vidyaai-embed-root .feature-nav-item{position:relative;z-index:1;
  background:rgba(255,255,255,.045)!important;border:1px solid rgba(255,255,255,.08)!important;
  border-radius:14px!important;margin-bottom:8px;
  transition:transform .3s cubic-bezier(.22,1,.36,1),background .3s,border-color .3s,box-shadow .3s!important}
#vidyaai-embed-root .feature-nav-item:hover{background:rgba(255,255,255,.1)!important;
  border-color:rgba(255,255,255,.18)!important;transform:translateX(4px)}
#vidyaai-embed-root .feature-nav-item .nav-title{color:#fff!important}
#vidyaai-embed-root .feature-nav-item p{color:rgba(198,212,234,.78)!important}
#vidyaai-embed-root .feature-nav-item .w-10{background:rgba(255,255,255,.09)!important;
  border:1px solid rgba(255,255,255,.14);box-shadow:none!important;transition:background .3s,transform .3s}
#vidyaai-embed-root .feature-nav-item .w-10 img{filter:brightness(0) invert(1)}
#vidyaai-embed-root .feature-nav-item>svg{color:rgba(255,255,255,.5);transition:transform .25s,color .25s}
#vidyaai-embed-root .feature-nav-item:hover>svg{transform:translateX(3px);color:#fff}
#vidyaai-embed-root .nav-indicator{display:none!important}
/* active row: full orange gradient with glow */
#vidyaai-embed-root .feature-nav-item.active{
  background:linear-gradient(95deg,#DE6E30,#E8843F 70%,#FF8A5C)!important;
  border-color:rgba(255,255,255,.28)!important;transform:translateX(4px);
  box-shadow:0 16px 34px -12px rgba(222,110,48,.75)!important}
#vidyaai-embed-root .feature-nav-item.active .nav-title{color:#fff!important}
#vidyaai-embed-root .feature-nav-item.active p{color:rgba(255,244,236,.92)!important}
#vidyaai-embed-root .feature-nav-item.active .w-10{background:rgba(255,255,255,.18)!important;
  border-color:rgba(255,255,255,.3);transform:scale(1.06)}
#vidyaai-embed-root .feature-nav-item.active>svg{color:#fff;transform:translateX(3px)}
@media(prefers-reduced-motion:reduce){#vidyaai-embed-root .feature-nav-item{transition:none!important}}
</style>

<style id="ee-nav-sticky-fix">
/* ── CRM nav: replace the JS fixed-positioning (which fights the site-wide
   body zoom - shrink + left drift) with plain CSS sticky. The old script
   still runs but its classes and inline styles are neutralised here. ── */
@media(min-width:1024px){
  /* overflow-x:hidden made this a scroll container and killed sticky;
     clip gives identical clipping without breaking it */
  #vidyaai-embed-root{overflow-x:clip!important;overflow-y:visible!important}
  #vidyaai-embed-root #navColumn{align-self:stretch}
  #vidyaai-embed-root #navCard{position:-webkit-sticky!important;position:sticky!important;top:96px!important}
  #vidyaai-embed-root #navCard.js-fixed,
  #vidyaai-embed-root #navCard.js-bottom{
    position:-webkit-sticky!important;position:sticky!important;
    top:96px!important;left:auto!important;width:auto!important;bottom:auto!important}
}
@media(max-width:1023px){
  #vidyaai-embed-root #navCard,
  #vidyaai-embed-root #navCard.js-fixed,
  #vidyaai-embed-root #navCard.js-bottom{
    position:static!important;top:auto!important;left:auto!important;width:auto!important}
}
</style>

<!-- (removed) EE · VidyaGPT live conversation strip -->

<?php get_footer(); ?>
