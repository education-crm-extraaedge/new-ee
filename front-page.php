<?php
/**
 * Front Page (Home) - ExtraaEdge AI-Powered Admissions Growth Platform.
 *
 * Owner's final formula build:
 *   Clean-Sheet Strategy  +  Admissions OS Product Depth  +  Orange Visual Personality.
 *
 * Structure (one section = one message):
 *   01 Hero (Admissions OS product UI, live state flow)
 *   02 Trusted logos
 *   03 The problem
 *   04 Before / After (the shift)
 *   05 How it works (4-step system story)
 *   06 Vidya AI (the AI layer, navy band)
 *   07 Live interactive demo (inc/platform-demo.php)
 *      Mid-page CTA
 *   08 Built for your team (role-based outcomes)
 *   09 Customer stories (video carousel)
 *   10 Enterprise readiness (integrations + security + go-live, one compact band)
 *   11 Focused FAQ
 *   12 Final CTA
 *   Book-a-Demo drawer (#admission-form) - header, hero, mid-page and footer CTAs all open it.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
?>
<!-- ee-front-tpl v2026-08-12-owner-formula -->
<!--
  NOTE: title / meta description / keywords / robots / canonical / hreflang /
  Open Graph / Twitter cards and the WebSite + Organization JSON-LD are emitted
  by the active theme's header.php (or SEO plugin). They are intentionally NOT
  repeated here to avoid duplicate-tag conflicts for Google & AI crawlers.
  This template only adds page-specific structured data (SoftwareApplication +
  FAQPage) and the homepage's Google Fonts.
-->

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "SoftwareApplication",
      "@id": "https://www.extraaedge.com/#software",
      "name": "ExtraaEdge Intelligent Admissions Growth Platform",
      "url": "https://www.extraaedge.com/",
      "applicationCategory": "BusinessApplication",
      "applicationSubCategory": "CRM Software",
      "operatingSystem": "Web, Android, iOS",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR", "description": "Personalised demo available. Contact for custom pricing." },
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
        { "@type": "Question", "name": "What is ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge is India's AI-powered Admissions Growth Platform, purpose-built for educational institutions - schools, colleges, universities, coaching and study-abroad companies. Its Vidya AI suite (VidyaGPT, VidyaPulse and VidyaAgents) handles enquiry response, lead prioritisation and follow-up automatically, so counsellors focus on conversion." } },
        { "@type": "Question", "name": "How does ExtraaEdge help convert more students?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge answers every enquiry in 60 seconds with VidyaGPT chat and WhatsApp automation, ranks every lead HOT, WARM or COLD with VidyaPulse scoring, and tells counsellors exactly who to follow up with next - reducing response effort by up to 90% and lifting conversions by up to 40%." } },
        { "@type": "Question", "name": "What AI features does ExtraaEdge offer?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge offers VidyaGPT: 24x7 AI chat on your website and WhatsApp in 95+ languages. VidyaPulse: lead intent scoring (HOT / WARM / COLD). VidyaAgents: AI calling, smart follow-ups and counsellor performance intelligence. All part of the Vidya AI suite, engineered for the admission workflow." } },
        { "@type": "Question", "name": "How long does it take to implement ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "Starting fresh: 7 days to go live. Switching from an existing system: 14 days, including full data migration, integrations (ads, website, WhatsApp, telephony), workflow set-up and counsellor training, with a dedicated onboarding specialist and Customer Success Manager." } },
        { "@type": "Question", "name": "Will ExtraaEdge work with my existing ads, website and CRM data?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge captures leads automatically from Meta and Google Ads, your website and landing pages, education portals, WhatsApp, IVR and more, with full source tracking. It connects with 50+ systems including your ERP/SIS, payment gateway and cloud telephony, and the team migrates your existing CRM or spreadsheet data as part of onboarding." } },
        { "@type": "Question", "name": "Is my data secure with ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails." } }
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
   H3=20. Same selector/specificity as that block, but this one loads
   later in the document, so it wins the cascade tie on this page only. */
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
@media(max-width:820px){
html body #main-content h1:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:25px !important;
}
html body #main-content h2:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:19px !important;
}
html body #main-content h3:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:15px !important;
}
html body #main-content p:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:13.5px !important;
}
}
</style>

<style id="ee-home-base">
/* =====================================================================
   ExtraaEdge homepage - owner formula edition.
   Brand: Orange #DE6E30 · Navy #19335D · white · Inter. No other colours.
   ===================================================================== */
:root{
  --orange:#DE6E30; --orange-2:#E8843F; --orange-soft:#FBEADF;
  --navy:#19335D; --ink:#19335D; --muted:#5A6B85; --line:rgba(25,52,93,.10);
  --bg:#fff; --bg-soft:#F7F9FC;
  --shadow:0 18px 50px rgba(25,52,93,.10); --shadow-sm:0 8px 24px rgba(25,52,93,.08);
  --radius:18px; --maxw:1200px;
}
html{scroll-behavior:smooth}
/* NOTE: do NOT put overflow on <body>. The theme header (#site-header) and its
   hover mega-menus live directly under <body>, so any overflow on <body> clips
   those submenus and breaks the header's position:sticky. Horizontal overflow
   is instead clipped on #main-content, which does NOT contain the header. */
#main-content{overflow-x:hidden;overflow-x:clip}
body{font-family:'Inter',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--ink);line-height:1.55;-webkit-font-smoothing:antialiased}
/* inc/platform-demo.php ships a popup stylesheet that also paints body dark
   (#0f1c30). The homepage must stay white, so force it here with !important -
   same guard footer.php carries for body.home. */
html body{background:#fff !important}
html body #main-content{background:#fff}
.ee-home *{box-sizing:border-box}
.ee-home img{max-width:100%}
.ee-home .container{max-width:var(--maxw);margin:0 auto;padding:0 24px}
.ee-home a:focus-visible,.ee-home button:focus-visible,.ee-home [tabindex]:focus-visible{outline:3px solid var(--orange);outline-offset:2px;border-radius:6px}
.ee-home section[id]{scroll-margin-top:86px}
#admission-form{scroll-margin-top:86px}

/* section rhythm: calm, even, no dead air */
.ee-home > section{padding-top:clamp(44px,6vw,78px);padding-bottom:clamp(44px,6vw,78px)}

/* kicker: the little orange chapter label above every section heading */
.ee-home .os-kick{display:inline-flex;align-items:center;gap:9px;font-size:12px;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:var(--orange);margin-bottom:14px}
.ee-home .os-kick::before{content:"";width:22px;height:2.5px;border-radius:2px;background:var(--orange)}
.ee-home .os-head{max-width:820px;margin:0 auto;text-align:center}
.ee-home .os-head .os-kick{justify-content:center}
.ee-home .os-head h2{margin:0;color:var(--navy);font-weight:800}
.ee-home .os-head .os-sub{margin:14px auto 0;max-width:640px;color:var(--muted);font-size:16px;line-height:1.65}

/* buttons */
.ee-home .os-btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:15px 28px;border-radius:13px;font-weight:700;font-size:15.5px;letter-spacing:-.01em;text-decoration:none;cursor:pointer;border:1.5px solid transparent;transition:transform .2s cubic-bezier(.2,.7,.2,1),box-shadow .25s,background .2s,color .2s,border-color .2s;font-family:inherit}
.ee-home .os-btn .arr{transition:transform .22s}
.ee-home .os-btn:hover .arr{transform:translateX(4px)}
.ee-home .os-btn--primary{color:#fff;background:linear-gradient(180deg,var(--orange-2),var(--orange));box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 14px 32px -10px rgba(222,110,48,.55)}
.ee-home .os-btn--primary:hover{transform:translateY(-2px);box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 20px 42px -10px rgba(222,110,48,.7)}
.ee-home .os-btn--ghost{color:var(--navy);border-color:rgba(25,52,93,.18);background:#fff}
.ee-home .os-btn--ghost:hover{border-color:var(--orange);color:var(--orange)}
.ee-home .os-btn--white{color:var(--navy);background:#fff;box-shadow:0 14px 32px -12px rgba(9,20,40,.55)}
.ee-home .os-btn--white:hover{transform:translateY(-2px);color:var(--orange)}

/* reveal on scroll */
.ee-home .rv{opacity:0;transform:translateY(26px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}
.ee-home .rv.in{opacity:1;transform:none}
.ee-home .rv.d1{transition-delay:.08s}.ee-home .rv.d2{transition-delay:.16s}.ee-home .rv.d3{transition-delay:.24s}.ee-home .rv.d4{transition-delay:.32s}
@media(prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  .ee-home .rv{opacity:1;transform:none;transition:none}
}
</style>

<!-- The theme's header.php already opens <main id="main-content">, so this
     homepage uses a plain wrapper <div> (not a second <main>) to avoid two
     nested <main> landmarks. -->
<div class="ee-home">

<!-- ═════════════════ 01 · HERO (Admissions OS product UI) ═════════════════ -->
<style id="os-hero-css">
#os-hero{position:relative;overflow:hidden;isolation:isolate;background:var(--bg);color:var(--navy);
  padding-top:clamp(56px,7vw,96px)!important;padding-bottom:clamp(56px,7vw,96px)!important}
#os-hero .os-grid-bg{position:absolute;inset:0;z-index:-2;pointer-events:none;
  background-image:linear-gradient(rgba(25,52,93,.055) 1px,transparent 1px),linear-gradient(90deg,rgba(25,52,93,.055) 1px,transparent 1px);
  background-size:64px 64px;
  -webkit-mask-image:radial-gradient(80% 70% at 55% 20%,#000 0%,transparent 100%);
  mask-image:radial-gradient(80% 70% at 55% 20%,#000 0%,transparent 100%)}
#os-hero .os-glow{position:absolute;z-index:-1;width:640px;height:640px;border-radius:50%;pointer-events:none;
  background:radial-gradient(circle,rgba(222,110,48,.14),transparent 65%);top:-220px;right:-160px}
#os-hero .hero-in{display:grid;grid-template-columns:minmax(0,1fr) minmax(480px,620px);gap:clamp(32px,4vw,64px);align-items:center}
#os-hero .h-kick{display:inline-flex;align-items:center;gap:9px;padding:8px 16px;border:1px solid rgba(222,110,48,.25);border-radius:99px;
  background:linear-gradient(110deg,rgba(222,110,48,.10),rgba(222,110,48,.02) 65%);font-size:12.5px;font-weight:700;letter-spacing:.02em;color:var(--navy)}
#os-hero .h-kick i{font-style:normal;color:var(--orange);font-weight:800}
#os-hero h1{margin:22px 0 0;color:var(--navy);font-weight:800}
#os-hero h1 em{font-style:normal;color:var(--orange);position:relative;display:inline-block}
#os-hero h1 em svg{position:absolute;left:0;right:0;bottom:-.12em;width:100%;height:.2em;overflow:visible}
#os-hero h1 em svg path{fill:none;stroke:var(--orange);stroke-width:7;stroke-linecap:round;opacity:.4;stroke-dasharray:600;stroke-dashoffset:600;animation:osh-draw 1s .8s ease forwards}
@keyframes osh-draw{to{stroke-dashoffset:0}}
#os-hero .h-sub{margin:20px 0 0;max-width:540px;color:var(--muted);font-size:17px;line-height:1.65}
#os-hero .h-sub b{color:var(--navy);font-weight:700}
#os-hero .h-cta{display:flex;align-items:center;gap:14px;margin-top:30px;flex-wrap:wrap}
#os-hero .h-note{margin:12px 0 0;font-size:12.5px;color:rgba(25,52,93,.55)}
#os-hero .h-proof{display:flex;flex-wrap:wrap;gap:8px 22px;align-items:center;margin-top:26px;padding-top:20px;border-top:1px dashed rgba(25,52,93,.14)}
#os-hero .h-proof span{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:var(--muted)}
#os-hero .h-proof b{color:var(--navy);font-weight:800}
#os-hero .h-proof .star{color:var(--orange);font-size:14px}
/* rise-in */
#os-hero .hr{opacity:0;transform:translateY(20px);animation:osh-rise .8s cubic-bezier(.2,.7,.2,1) forwards}
#os-hero .hr1{animation-delay:.05s}#os-hero .hr2{animation-delay:.14s}#os-hero .hr3{animation-delay:.24s}#os-hero .hr4{animation-delay:.34s}#os-hero .hr5{animation-delay:.46s}
@keyframes osh-rise{to{opacity:1;transform:none}}
/* ── the product window: a live Admissions OS state flow ── */
#os-hero .osx{position:relative;border-radius:20px;border:1px solid rgba(25,52,93,.14);background:#fff;
  box-shadow:0 40px 90px -34px rgba(25,52,93,.35),0 2px 6px rgba(25,52,93,.06);padding:18px 18px 14px}
#os-hero .osx::before{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1.5px;pointer-events:none;
  background:linear-gradient(135deg,var(--orange),transparent 34%,transparent 66%,var(--navy));opacity:.45;
  -webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude}
#os-hero .osx-top{display:flex;align-items:center;gap:12px;padding-bottom:13px;border-bottom:1px dashed rgba(25,52,93,.14)}
#os-hero .osx-dots{display:flex;gap:5px}
#os-hero .osx-dots i{width:9px;height:9px;border-radius:50%;background:rgba(25,52,93,.14)}
#os-hero .osx-dots i:first-child{background:var(--orange)}
#os-hero .osx-url{flex:1;min-width:0;display:flex;align-items:center;gap:7px;font-size:11.5px;font-weight:600;color:var(--muted);
  border:1px solid rgba(25,52,93,.10);background:var(--bg-soft);border-radius:8px;padding:6px 11px;white-space:nowrap;overflow:hidden}
#os-hero .osx-url b{color:var(--navy)}
#os-hero .osx-live{display:inline-flex;align-items:center;gap:7px;font-size:10.5px;font-weight:800;letter-spacing:.12em;color:var(--orange);
  border:1px solid rgba(222,110,48,.25);background:rgba(222,110,48,.10);border-radius:99px;padding:5px 11px;white-space:nowrap}
#os-hero .osx-ping{position:relative;width:7px;height:7px;border-radius:50%;background:var(--orange)}
#os-hero .osx-ping::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:1px solid var(--orange);animation:osx-ping 1.6s ease-out infinite}
@keyframes osx-ping{0%{transform:scale(.4);opacity:.9}100%{transform:scale(1.5);opacity:0}}
#os-hero .osx-feed{display:flex;flex-direction:column;gap:10px;margin-top:14px;min-height:300px}
#os-hero .osx-step{border:1px solid rgba(25,52,93,.10);border-left-width:3px;border-radius:13px;padding:11px 14px;background:rgba(25,52,93,.035);
  opacity:0;transform:translateY(12px);transition:opacity .5s,transform .5s cubic-bezier(.2,.7,.2,1)}
#os-hero .osx-step.on{opacity:1;transform:none}
#os-hero .osx-tag{display:flex;align-items:center;gap:8px;font-size:9.5px;font-weight:800;letter-spacing:.16em;color:rgba(25,52,93,.55);margin-bottom:6px}
#os-hero .osx-txt{font-size:13.5px;line-height:1.55;color:var(--muted)}
#os-hero .osx-txt b{color:var(--navy);font-weight:700}
#os-hero .osx-step--in{border-left-color:var(--navy)}
#os-hero .osx-step--ai{border-left-color:var(--orange);background:linear-gradient(110deg,rgba(222,110,48,.10),rgba(25,52,93,.035) 60%)}
#os-hero .osx-step--ai .osx-tag{color:var(--orange)}
#os-hero .osx-step--ok{border-left-color:var(--navy)}
#os-hero .osx-q{display:block;margin-top:5px;border:1px solid rgba(25,52,93,.10);background:#fff;border-radius:10px;padding:8px 11px;font-size:12.5px;color:var(--navy)}
#os-hero .osx-hot{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;color:#fff;background:linear-gradient(90deg,var(--orange-2),var(--orange));border-radius:99px;padding:4px 11px;letter-spacing:.06em}
#os-hero .osx-meter{position:relative;flex:1;max-width:170px;height:6px;border-radius:99px;background:rgba(25,52,93,.10);overflow:hidden}
#os-hero .osx-meter i{position:absolute;inset:0;right:8%;border-radius:inherit;background:linear-gradient(90deg,var(--orange-2),var(--orange));transform-origin:left;transform:scaleX(0);transition:transform 1s .3s cubic-bezier(.2,.7,.2,1)}
#os-hero .osx-step.on .osx-meter i{transform:none}
#os-hero .osx-row{display:flex;align-items:center;gap:10px;margin-top:7px;flex-wrap:wrap}
#os-hero .osx-ok{display:inline-flex;align-items:center;gap:7px;color:var(--navy);font-weight:700}
#os-hero .osx-ok::before{content:"\2713";display:grid;place-items:center;width:16px;height:16px;border-radius:50%;background:var(--orange);color:#fff;font-size:10px}
#os-hero .osx-mods{display:flex;flex-wrap:wrap;gap:7px;margin-top:14px;padding-top:12px;border-top:1px dashed rgba(25,52,93,.14)}
#os-hero .osx-mods span{font-size:11px;font-weight:600;color:var(--muted);border:1px solid rgba(25,52,93,.10);border-radius:99px;padding:5px 11px;background:#fff;white-space:nowrap}
@media(max-width:1024px){
  #os-hero .hero-in{grid-template-columns:minmax(0,1fr)}
  #os-hero .osx{max-width:600px;margin:0 auto;width:100%}
}
@media(max-width:560px){
  #os-hero .osx{padding:14px 12px 12px}
  #os-hero .osx-url{display:none}
  #os-hero .osx-feed{min-height:0}
  #os-hero .h-cta .os-btn{width:100%}
}
@media(prefers-reduced-motion:reduce){
  #os-hero .hr{animation:none;opacity:1;transform:none}
  #os-hero .osx-step{opacity:1;transform:none;transition:none}
  #os-hero .osx-meter i{transform:none;transition:none}
  #os-hero .osx-ping::after{animation:none}
  #os-hero h1 em svg path{animation:none;stroke-dashoffset:0}
}
</style>
<section id="os-hero" aria-label="ExtraaEdge AI-powered Admissions Growth Platform">
  <div class="os-grid-bg" aria-hidden="true"></div>
  <div class="os-glow" aria-hidden="true"></div>
  <div class="container">
    <div class="hero-in">
      <div>
        <span class="h-kick hr hr1"><i>AI</i> Admissions Growth Platform for education</span>
        <h1 class="hr hr2">Convert more enquiries into <em>enrolments<svg viewBox="0 0 300 24" preserveAspectRatio="none" aria-hidden="true"><path d="M4 18 C 80 8, 220 8, 296 16"/></svg></em></h1>
        <p class="h-sub hr hr3">ExtraaEdge answers every enquiry in <b>60 seconds</b>, tells counsellors exactly <b>who to call next</b>, and gives leadership one clear view from enquiry to enrolment. Purpose-built AI for admissions, deeply integrated across CRM, applications and communication.</p>
        <div class="h-cta hr hr4">
          <a href="#admission-form" class="os-btn os-btn--primary">Book a personalised demo <span class="arr">&rarr;</span></a>
          <a href="#ee-platform" class="os-btn os-btn--ghost">Explore the live demo</a>
        </div>
        <p class="h-note hr hr4">45 minutes, live on data from your sector.</p>
        <div class="h-proof hr hr5">
          <span><b>500+</b> institutions</span>
          <span><b>10M+</b> enquiries managed</span>
          <span><span class="star" aria-hidden="true">&#9733;</span> <b>4.7/5</b> from 320+ admission teams</span>
        </div>
      </div>

      <div class="hr hr3">
        <div class="osx" role="img" aria-label="ExtraaEdge Admissions OS: a new enquiry is answered by VidyaGPT in 60 seconds, scored HOT by VidyaPulse, and assigned to a counsellor with the next best action.">
          <div class="osx-top">
            <span class="osx-dots" aria-hidden="true"><i></i><i></i><i></i></span>
            <span class="osx-url"><b>app.extraaedge.com</b>/enquiry-inbox</span>
            <span class="osx-live"><span class="osx-ping"></span>LIVE</span>
          </div>
          <div class="osx-feed" id="osxFeed">
            <div class="osx-step osx-step--in">
              <div class="osx-tag">NEW ENQUIRY &middot; 10:42 AM</div>
              <div class="osx-txt"><b>Aarav Sharma</b> &middot; B.Tech CSE <span style="opacity:.65">&middot; Source: Instagram Ads</span>
                <span class="osx-q">&ldquo;What are the fees and scholarship options for B.Tech CSE?&rdquo;</span>
              </div>
            </div>
            <div class="osx-step osx-step--ai">
              <div class="osx-tag">VIDYAGPT &middot; REPLIED IN 60 SECONDS</div>
              <div class="osx-txt"><span class="osx-q">&ldquo;Hi Aarav! Here is the B.Tech CSE fee structure, plus 3 scholarships you may qualify for. Want me to book a campus visit?&rdquo;</span></div>
            </div>
            <div class="osx-step osx-step--ai">
              <div class="osx-tag">VIDYAPULSE &middot; INTENT SCORE</div>
              <div class="osx-row"><span class="osx-hot">HOT &middot; 92</span><span class="osx-meter" aria-hidden="true"><i></i></span></div>
              <div class="osx-txt" style="margin-top:7px">Opened the fee page 3 times, asked about scholarships.</div>
            </div>
            <div class="osx-step osx-step--ok">
              <div class="osx-tag">NEXT BEST ACTION</div>
              <div class="osx-txt"><span class="osx-ok">Call Aarav today at 4 PM</span> &middot; assigned to counsellor Priya</div>
            </div>
          </div>
          <div class="osx-mods" aria-hidden="true">
            <span>Enquiry Inbox</span><span>Applications</span><span>WhatsApp</span><span>AI Calling</span><span>Fee Payments</span><span>Analytics</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
/* Hero product window: the four states play in sequence, hold, then loop. */
(function(){
  var steps=[].slice.call(document.querySelectorAll('#osxFeed .osx-step'));
  if(!steps.length) return;
  if(window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches){
    steps.forEach(function(s){s.classList.add('on');});
    return;
  }
  var i=0,t=null;
  function tick(){
    if(i<steps.length){
      steps[i].classList.add('on'); i++;
      t=setTimeout(tick, i===steps.length?4200:1350);
    } else {
      steps.forEach(function(s){s.classList.remove('on');});
      i=0; t=setTimeout(tick,700);
    }
  }
  t=setTimeout(tick,600);
  document.addEventListener('visibilitychange',function(){
    if(document.hidden){ clearTimeout(t); }
    else { clearTimeout(t); t=setTimeout(tick,400); }
  });
})();
</script>

<!-- ═════════════════ 02 · TRUSTED LOGOS ═════════════════ -->
<style id="trusted-institutions-style">
#trusted-institutions{padding-top:clamp(34px,4vw,52px)!important;padding-bottom:clamp(34px,4vw,52px)!important;
  background:#fff;font-family:'Inter',sans-serif;overflow:hidden;
  border-top:1px solid rgba(25,52,93,.08);border-bottom:1px solid rgba(25,52,93,.08)}
#trusted-institutions .logo-header{max-width:780px;margin:0 auto 18px;text-align:center;padding:0 24px}
#trusted-institutions .logo-sub{font-size:14.5px;line-height:1.6;color:var(--muted);max-width:640px;margin:0 auto}
#trusted-institutions .logo-sub strong{color:var(--navy);font-weight:700}
#trusted-institutions .marquee-wrap{overflow:hidden;padding:10px 0;-webkit-mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)}
#trusted-institutions .marquee-track{display:flex;gap:30px;width:max-content;align-items:center;will-change:transform}
#trusted-institutions .marquee-left{animation:ti-scroll-l 45s linear infinite}
#trusted-institutions .marquee-right{animation:ti-scroll-r 45s linear infinite;margin-top:18px}
@media(hover:hover){#trusted-institutions .marquee-wrap:hover .marquee-track{animation-play-state:paused}}
@keyframes ti-scroll-l{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@keyframes ti-scroll-r{from{transform:translateX(-50%)}to{transform:translateX(0)}}
#trusted-institutions .logo-card{flex:none;width:168px;height:84px;background:var(--bg-soft);border:1px solid rgba(25,52,93,.10);border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}
#trusted-institutions .logo-card:hover{border-color:var(--orange);transform:translateY(-4px)}
#trusted-institutions .logo-card img{max-height:52px;width:auto;object-fit:contain}
#trusted-institutions .lc-alt{font:700 11.5px/1.3 'Inter',sans-serif;color:var(--navy);text-align:center;padding:0 6px}
#trusted-institutions .ee-rate{display:inline-flex;align-items:center;gap:10px;margin:0 auto 8px;padding:9px 18px;background:#fff;border:1px solid rgba(25,52,93,.12);border-radius:999px;box-shadow:0 10px 24px -14px rgba(25,52,93,.28);font-size:13.5px;color:var(--muted)}
#trusted-institutions .ee-rate-stars{display:inline-flex;gap:2px}
#trusted-institutions .ee-rate-stars svg{width:16px;height:16px;display:block}
#trusted-institutions .ee-rate b{color:var(--navy);font-weight:800}
#trusted-institutions .ee-rate i{width:1px;height:16px;background:rgba(25,52,93,.15)}
@media(max-width:640px){
  #trusted-institutions .logo-card{width:130px;height:70px;padding:10px}
  #trusted-institutions .logo-card img{max-height:42px}
  #trusted-institutions .marquee-track{gap:16px}
  #trusted-institutions .marquee-right{margin-top:12px}
  #trusted-institutions .ee-rate{font-size:12px;padding:8px 13px;gap:8px}
  #trusted-institutions .ee-rate-stars svg{width:13px;height:13px}
}
@media(prefers-reduced-motion:reduce){#trusted-institutions .marquee-track{animation:none}}
</style>
<section class="logo-section" id="trusted-institutions" aria-label="Trusted institutions">
  <div class="logo-header">
    <h2 style="color:var(--navy);margin:0 0 10px">Trusted by 500+ educational institutions across India</h2>
    <?php /* visible twin of the AggregateRating in the JSON-LD schema (4.7 / 320) -
             the two must always quote the same numbers */ ?>
    <div class="ee-rate" role="img" aria-label="Rated 4.7 out of 5 by over 320 admission teams">
      <span class="ee-rate-stars" aria-hidden="true">
        <?php for ($ee_s = 0; $ee_s < 5; $ee_s++) : ?>
        <svg viewBox="0 0 24 24"><defs><linearGradient id="eeStarG<?php echo $ee_s; ?>" x1="0" x2="1" y1="0" y2="0"><stop offset="70%" stop-color="#DE6E30"/><stop offset="70%" stop-color="#e8d5c7"/></linearGradient></defs><path fill="<?php echo $ee_s === 4 ? 'url(#eeStarG4)' : '#DE6E30'; ?>" d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>
        <?php endfor; ?>
      </span>
      <b>4.7 / 5</b>
      <i></i>
      <span>Rated by <b>320+</b> admission teams</span>
    </div>
    <p class="logo-sub"><strong>10M+ student enquiries</strong> managed for universities, colleges, coaching and study-abroad teams.</p>
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
        if ($ee_q) echo ' data-q="' . esc_attr($ee_q) . '" data-who="' . esc_attr($ee_l['a']) . '" tabindex="0"';
      ?>><img src="<?php echo esc_url($ee_l['u']); ?>" alt="<?php echo $ee_pass ? '' : esc_attr($ee_l['a'] . ' - ExtraaEdge admissions platform'); ?>" loading="lazy" decoding="async" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt,className:'lc-alt'}))"></div>
      <?php endforeach; endfor; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ═════════════════ 03 · THE PROBLEM ═════════════════ -->
<style id="os-problem-css">
#os-problem{background:var(--bg-soft)}
#os-problem .pb-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;max-width:1080px;margin:clamp(28px,4vw,44px) auto 0}
#os-problem .pb-card{position:relative;background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:26px 24px;box-shadow:var(--shadow-sm);transition:transform .25s,box-shadow .3s,border-color .3s}
#os-problem .pb-card:hover{transform:translateY(-4px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}
#os-problem .pb-n{display:grid;place-items:center;width:42px;height:42px;border-radius:12px;background:rgba(222,110,48,.10);border:1px solid rgba(222,110,48,.22);margin-bottom:16px}
#os-problem .pb-n svg{width:21px;height:21px;stroke:var(--orange)}
#os-problem h3{margin:0 0 8px;color:var(--navy);font-weight:700}
#os-problem p{margin:0;color:var(--muted);font-size:14.5px;line-height:1.65}
@media(max-width:900px){#os-problem .pb-grid{grid-template-columns:1fr;max-width:560px}}
</style>
<section id="os-problem" aria-labelledby="osp-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">The problem</span>
      <h2 id="osp-h">Institutions do not lose students to competitors. They lose them to slow follow-up.</h2>
    </div>
    <div class="pb-grid">
      <article class="pb-card rv d1">
        <span class="pb-n" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></span>
        <h3>Enquiries wait hours for a reply</h3>
        <p>Students shortlist 3 or 4 institutions at once. The first one to respond usually wins the conversation.</p>
      </article>
      <article class="pb-card rv d2">
        <span class="pb-n" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v14H4z"/><path d="M4 10h16M9 5v14"/></svg></span>
        <h3>Counsellors drown in spreadsheets</h3>
        <p>Hot leads and cold leads look identical in a list, so effort goes to the wrong students every day.</p>
      </article>
      <article class="pb-card rv d3">
        <span class="pb-n" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20h18"/><path d="M6 16v-5M11 16V8M16 16v-3M21 16V5"/></svg></span>
        <h3>Leadership sees the funnel too late</h3>
        <p>By the time reports are compiled, the admission cycle has already moved on. Decisions come after the damage.</p>
      </article>
    </div>
  </div>
</section>

<!-- ═════════════════ 04 · BEFORE / AFTER (the shift) ═════════════════ -->
<style id="os-shift-css">
#os-shift{background:#fff}
#os-shift .sh-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;max-width:1020px;margin:clamp(28px,4vw,44px) auto 0}
#os-shift .sh-col{border-radius:var(--radius);padding:28px 26px;border:1px solid var(--line)}
#os-shift .sh-col--before{background:var(--bg-soft)}
#os-shift .sh-col--after{background:linear-gradient(180deg,rgba(222,110,48,.06),#fff 55%);border-color:rgba(222,110,48,.35);box-shadow:var(--shadow-sm);position:relative}
#os-shift .sh-col--after::before{content:"";position:absolute;inset:0 0 auto 0;height:3px;border-radius:18px 18px 0 0;background:linear-gradient(90deg,var(--orange-2),var(--orange))}
#os-shift .sh-lab{display:inline-flex;align-items:center;gap:8px;font-size:11.5px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;margin-bottom:16px}
#os-shift .sh-col--before .sh-lab{color:var(--muted)}
#os-shift .sh-col--after .sh-lab{color:var(--orange)}
#os-shift ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:13px}
#os-shift li{display:flex;gap:11px;align-items:flex-start;font-size:14.5px;line-height:1.55}
#os-shift .sh-col--before li{color:var(--muted)}
#os-shift .sh-col--after li{color:var(--navy);font-weight:500}
#os-shift li i{flex:none;display:grid;place-items:center;width:20px;height:20px;border-radius:50%;font-style:normal;font-size:11px;font-weight:800;margin-top:1px}
#os-shift .sh-col--before li i{background:rgba(25,52,93,.08);color:rgba(25,52,93,.45)}
#os-shift .sh-col--after li i{background:var(--orange);color:#fff}
@media(max-width:820px){#os-shift .sh-grid{grid-template-columns:1fr;max-width:560px}}
</style>
<section id="os-shift" aria-labelledby="oss-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">The shift</span>
      <h2 id="oss-h">What changes when admissions run on ExtraaEdge</h2>
    </div>
    <div class="sh-grid">
      <div class="sh-col sh-col--before rv d1">
        <span class="sh-lab">Before</span>
        <ul>
          <li><i>&#10005;</i>Enquiries answered the next working day</li>
          <li><i>&#10005;</i>Follow-ups tracked in spreadsheets and memory</li>
          <li><i>&#10005;</i>Every lead treated the same, hot or cold</li>
          <li><i>&#10005;</i>Marketing spend with no source-level answer</li>
          <li><i>&#10005;</i>Funnel reports compiled by hand, weeks late</li>
        </ul>
      </div>
      <div class="sh-col sh-col--after rv d2">
        <span class="sh-lab">With ExtraaEdge</span>
        <ul>
          <li><i>&#10003;</i>Every enquiry answered in 60 seconds, 24x7</li>
          <li><i>&#10003;</i>Follow-ups run automatically until human handover</li>
          <li><i>&#10003;</i>VidyaPulse ranks every lead HOT, WARM or COLD</li>
          <li><i>&#10003;</i>Source-level ROI on every campaign and portal</li>
          <li><i>&#10003;</i>Live dashboards from enquiry to enrolment</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═════════════════ 05 · HOW IT WORKS (4-step system story) ═════════════════ -->
<style id="os-system-css">
#os-system{background:var(--bg-soft)}
#os-system .sy-wrap{max-width:1080px;margin:clamp(28px,4vw,48px) auto 0;display:flex;flex-direction:column;gap:18px}
#os-system .sy-step{display:grid;grid-template-columns:64px minmax(0,1fr) minmax(0,380px);gap:22px;align-items:center;
  background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px 26px;box-shadow:var(--shadow-sm);transition:transform .25s,box-shadow .3s,border-color .3s}
#os-system .sy-step:hover{transform:translateY(-3px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.35)}
#os-system .sy-no{position:relative;display:grid;place-items:center;width:56px;height:56px;border-radius:16px;
  background:linear-gradient(180deg,var(--orange-2),var(--orange));color:#fff;font-size:20px;font-weight:800;box-shadow:0 12px 26px -10px rgba(222,110,48,.6)}
#os-system .sy-step h3{margin:0 0 6px;color:var(--navy);font-weight:700}
#os-system .sy-step p{margin:0;color:var(--muted);font-size:14.5px;line-height:1.6;max-width:52ch}
#os-system .sy-step p b{color:var(--navy);font-weight:700}
/* mini product vignettes */
#os-system .sy-ui{border:1px solid var(--line);border-radius:14px;background:var(--bg-soft);padding:14px 15px;min-width:0}
#os-system .sy-chips{display:flex;flex-wrap:wrap;gap:6px}
#os-system .sy-chips span{font-size:11px;font-weight:600;color:var(--navy);border:1px solid rgba(25,52,93,.12);background:#fff;border-radius:99px;padding:5px 10px;white-space:nowrap}
#os-system .sy-chips span.hi{color:#fff;background:var(--orange);border-color:var(--orange)}
#os-system .sy-bub{font-size:12.5px;line-height:1.5;color:var(--navy);background:#fff;border:1px solid rgba(25,52,93,.12);border-radius:12px 12px 12px 3px;padding:9px 12px}
#os-system .sy-bub + .sy-bub{margin-top:7px;border-radius:12px 12px 3px 12px;background:linear-gradient(110deg,rgba(222,110,48,.10),#fff 70%);border-color:rgba(222,110,48,.3)}
#os-system .sy-bub small{display:block;font-size:9.5px;font-weight:800;letter-spacing:.12em;color:var(--orange);margin-bottom:3px}
#os-system .sy-leads{display:flex;flex-direction:column;gap:6px}
#os-system .sy-lead{display:flex;align-items:center;justify-content:space-between;gap:10px;font-size:12px;font-weight:600;color:var(--navy);background:#fff;border:1px solid rgba(25,52,93,.12);border-radius:10px;padding:8px 11px}
#os-system .sy-lead b{font-size:10px;font-weight:800;letter-spacing:.06em;border-radius:99px;padding:3px 9px;color:#fff}
#os-system .sy-lead .t-hot{background:var(--orange)}
#os-system .sy-lead .t-warm{background:rgba(222,110,48,.55)}
#os-system .sy-lead .t-cold{background:rgba(25,52,93,.35)}
#os-system .sy-funnel{display:flex;flex-direction:column;gap:6px}
#os-system .sy-fr{display:flex;align-items:center;gap:9px;font-size:11.5px;font-weight:600;color:var(--navy)}
#os-system .sy-fr i{height:9px;border-radius:99px;background:linear-gradient(90deg,var(--orange-2),var(--orange));opacity:.9}
#os-system .sy-fr:nth-child(1) i{width:78%}#os-system .sy-fr:nth-child(2) i{width:56%}
#os-system .sy-fr:nth-child(3) i{width:38%}#os-system .sy-fr:nth-child(4) i{width:26%}
#os-system .sy-fr span{flex:none;width:86px}
@media(max-width:900px){
  #os-system .sy-step{grid-template-columns:48px minmax(0,1fr)}
  #os-system .sy-no{width:44px;height:44px;font-size:16px;border-radius:13px}
  #os-system .sy-ui{grid-column:2}
}
@media(max-width:560px){#os-system .sy-step{padding:18px 16px;gap:14px}}
</style>
<section id="os-system" aria-labelledby="osy-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">How it works</span>
      <h2 id="osy-h">One system that carries a student from first enquiry to enrolment</h2>
      <p class="os-sub">Four steps. Each one automated, measured and visible to your whole team.</p>
    </div>
    <div class="sy-wrap">
      <article class="sy-step rv">
        <span class="sy-no" aria-hidden="true">1</span>
        <div>
          <h3>Capture every enquiry in one inbox</h3>
          <p>Ads, website, education portals, WhatsApp, walk-ins and calls land in one place automatically, <b>with the source attached</b>. Nothing sits in a spreadsheet or a personal phone.</p>
        </div>
        <div class="sy-ui" aria-hidden="true">
          <div class="sy-chips"><span class="hi">Meta Ads</span><span>Google</span><span>Website</span><span>WhatsApp</span><span>Portals</span><span>IVR</span><span>Walk-in</span></div>
        </div>
      </article>
      <article class="sy-step rv">
        <span class="sy-no" aria-hidden="true">2</span>
        <div>
          <h3>Engage in 60 seconds, in the student&rsquo;s language</h3>
          <p><b>VidyaGPT</b> answers fees, courses and scholarships instantly on chat and WhatsApp, in <b>95+ languages</b>, day and night. No enquiry waits for office hours.</p>
        </div>
        <div class="sy-ui" aria-hidden="true">
          <div class="sy-bub">What is the fee for MBA?</div>
          <div class="sy-bub"><small>VIDYAGPT &middot; 60 SECONDS</small>Here is the MBA fee structure and the scholarship you may qualify for. Shall I book a counselling call?</div>
        </div>
      </article>
      <article class="sy-step rv">
        <span class="sy-no" aria-hidden="true">3</span>
        <div>
          <h3>Prioritise the students most likely to join</h3>
          <p><b>VidyaPulse</b> scores every lead HOT, WARM or COLD from real behaviour, so counsellors start each day with a ranked call list instead of a raw list of names.</p>
        </div>
        <div class="sy-ui" aria-hidden="true">
          <div class="sy-leads">
            <div class="sy-lead">Aarav S. &middot; B.Tech <b class="t-hot">HOT 92</b></div>
            <div class="sy-lead">Meera K. &middot; MBA <b class="t-warm">WARM 71</b></div>
            <div class="sy-lead">Rohan P. &middot; B.Com <b class="t-cold">COLD 38</b></div>
          </div>
        </div>
      </article>
      <article class="sy-step rv">
        <span class="sy-no" aria-hidden="true">4</span>
        <div>
          <h3>Enrol with applications, fees and offers on rails</h3>
          <p>Application forms, document checks, fee payments and offer letters tracked to the finish line, with <b>live dashboards</b> for admission heads and leadership.</p>
        </div>
        <div class="sy-ui" aria-hidden="true">
          <div class="sy-funnel">
            <div class="sy-fr"><span>Enquiries</span><i></i></div>
            <div class="sy-fr"><span>Qualified</span><i></i></div>
            <div class="sy-fr"><span>Applications</span><i></i></div>
            <div class="sy-fr"><span>Enrolled</span><i></i></div>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ═════════════════ 06 · VIDYA AI (the AI layer · navy band) ═════════════════ -->
<style id="os-vidya-css">
#os-vidya{background:linear-gradient(180deg,#16294B,var(--navy) 45%,#1D3A69);color:#fff;position:relative;overflow:hidden}
#os-vidya::before{content:"";position:absolute;width:560px;height:560px;border-radius:50%;top:-260px;right:-180px;pointer-events:none;
  background:radial-gradient(circle,rgba(222,110,48,.22),transparent 65%)}
#os-vidya .os-kick{color:var(--orange-2)}
#os-vidya .os-kick::before{background:var(--orange-2)}
html body #main-content #os-vidya h2{color:#fff !important}
#os-vidya .os-sub{color:rgba(255,255,255,.72)}
#os-vidya .vd-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;max-width:1080px;margin:clamp(28px,4vw,44px) auto 0;position:relative;z-index:1}
#os-vidya .vd-card{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.12);border-radius:var(--radius);padding:26px 24px;backdrop-filter:blur(4px);transition:transform .25s,border-color .3s,background .3s}
#os-vidya .vd-card:hover{transform:translateY(-4px);border-color:rgba(222,110,48,.55);background:rgba(255,255,255,.08)}
#os-vidya .vd-tag{display:inline-flex;align-items:center;gap:8px;font-size:10.5px;font-weight:800;letter-spacing:.14em;color:var(--orange-2);
  border:1px solid rgba(222,110,48,.4);background:rgba(222,110,48,.12);border-radius:99px;padding:5px 12px;margin-bottom:14px}
html body #main-content #os-vidya .vd-card h3{color:#fff !important;margin:0 0 8px}
#os-vidya .vd-card p{margin:0;color:rgba(255,255,255,.72);font-size:14px;line-height:1.65}
#os-vidya .vd-card p b{color:#fff;font-weight:700}
#os-vidya .vd-foot{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:16px;margin-top:clamp(26px,4vw,40px);position:relative;z-index:1;text-align:center}
#os-vidya .vd-foot p{margin:0;font-size:15px;font-weight:600;color:rgba(255,255,255,.85)}
#os-vidya .vd-foot p b{color:var(--orange-2)}
@media(max-width:900px){#os-vidya .vd-grid{grid-template-columns:1fr;max-width:560px}}
</style>
<section id="os-vidya" aria-labelledby="osv-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">The AI layer</span>
      <h2 id="osv-h">Meet Vidya AI</h2>
      <p class="os-sub">Purpose-built AI for admissions, deeply integrated across CRM, applications and communication. Not a chatbot bolted on top.</p>
    </div>
    <div class="vd-grid">
      <article class="vd-card rv d1">
        <span class="vd-tag">VIDYAGPT</span>
        <h3>Answers every student, 24x7</h3>
        <p>Website chat and WhatsApp in <b>95+ languages</b>, trained on your courses, fees and scholarships. Every enquiry gets a correct answer in <b>60 seconds</b>.</p>
      </article>
      <article class="vd-card rv d2">
        <span class="vd-tag">VIDYAPULSE</span>
        <h3>Ranks every lead by intent</h3>
        <p><b>HOT, WARM or COLD</b> scoring from real behaviour, so counsellor time goes where enrolment is most likely. Cuts response effort by <b>up to 90%</b>.</p>
      </article>
      <article class="vd-card rv d3">
        <span class="vd-tag">VIDYAAGENTS</span>
        <h3>Calls and follows up at scale</h3>
        <p>AI voice calls, smart follow-up sequences and counsellor performance intelligence, handing over to a human <b>at the right moment</b>.</p>
      </article>
    </div>
    <div class="vd-foot rv">
      <p><b>Up to 40% more conversions</b> when every enquiry gets an instant, intelligent response.</p>
      <a href="#admission-form" class="os-btn os-btn--white">See Vidya AI on your funnel <span class="arr">&rarr;</span></a>
    </div>
  </div>
</section>

<!-- ═════════════════ 07 · LIVE INTERACTIVE DEMO ═════════════════ -->
<style id="os-demo-kick-css">
#os-demo-kick{padding:clamp(40px,5vw,64px) 24px 0;text-align:center}
#os-demo-kick .os-kick{justify-content:center}
#os-demo-kick h2{max-width:760px;margin:0 auto;color:var(--navy);font-weight:800}
#os-demo-kick p{max-width:600px;margin:12px auto 0;color:var(--muted);font-size:15.5px;line-height:1.65}
</style>
<div id="os-demo-kick" class="rv">
  <span class="os-kick">See it yourself</span>
  <h2>Do not take our word for it. Click around the platform right here.</h2>
  <p>A live, self-guided walkthrough on sample data. Start with Vidya AI, then see the admission workflows it runs on.</p>
</div>
<?php /* The whole platform section - styles, dummy CRM, overlay, tour and the
   "real CRM" popup - lives in inc/platform-demo.php so the same block also
   serves /product-tour/ and the [ee_platform] shortcode. */
if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- ═════════════════ MID-PAGE CTA ═════════════════ -->
<style id="os-midcta-css">
#os-midcta{background:#fff;padding-top:clamp(30px,4vw,48px)!important;padding-bottom:clamp(30px,4vw,48px)!important}
#os-midcta .mc-band{position:relative;overflow:hidden;max-width:1080px;margin:0 auto;border-radius:22px;
  background:linear-gradient(120deg,#16294B,var(--navy) 55%,#24457E);color:#fff;
  padding:clamp(30px,4.5vw,50px) clamp(24px,4vw,56px);display:flex;align-items:center;justify-content:space-between;gap:26px;flex-wrap:wrap;
  box-shadow:0 30px 70px -30px rgba(15,32,64,.55)}
#os-midcta .mc-band::before{content:"";position:absolute;width:420px;height:420px;border-radius:50%;right:-140px;top:-180px;pointer-events:none;
  background:radial-gradient(circle,rgba(222,110,48,.3),transparent 65%)}
html body #main-content #os-midcta h2{color:#fff !important;margin:0 0 8px}
#os-midcta p{margin:0;color:rgba(255,255,255,.75);font-size:14.5px}
#os-midcta .mc-cta{position:relative;z-index:1;flex:none}
@media(max-width:700px){#os-midcta .mc-band{flex-direction:column;align-items:flex-start}}
</style>
<section id="os-midcta" aria-label="Book a demo">
  <div class="container">
    <div class="mc-band rv">
      <div style="position:relative;z-index:1;min-width:0">
        <h2>Liked the demo? See it on your own funnel.</h2>
        <p>Book a personalised demo. 45 minutes, live with data from your sector.</p>
      </div>
      <div class="mc-cta">
        <a href="#admission-form" class="os-btn os-btn--primary">Book a personalised demo <span class="arr">&rarr;</span></a>
      </div>
    </div>
  </div>
</section>

<!-- ═════════════════ 08 · BUILT FOR YOUR TEAM (role-based outcomes) ═════════════════ -->
<style id="os-roles-css">
#os-roles{background:var(--bg-soft)}
#os-roles .rl-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;max-width:1140px;margin:clamp(28px,4vw,44px) auto 0}
#os-roles .rl-card{display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px 22px;box-shadow:var(--shadow-sm);transition:transform .25s,box-shadow .3s,border-color .3s}
#os-roles .rl-card:hover{transform:translateY(-4px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}
#os-roles .rl-ic{display:grid;place-items:center;width:42px;height:42px;border-radius:12px;background:rgba(222,110,48,.10);border:1px solid rgba(222,110,48,.22);margin-bottom:14px}
#os-roles .rl-ic svg{width:20px;height:20px;stroke:var(--orange)}
#os-roles h3{margin:0 0 10px;color:var(--navy);font-weight:700}
#os-roles ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:8px}
#os-roles li{display:flex;gap:8px;align-items:flex-start;font-size:13px;line-height:1.55;color:var(--muted)}
#os-roles li::before{content:"\2713";flex:none;display:grid;place-items:center;width:15px;height:15px;border-radius:50%;background:rgba(222,110,48,.14);color:var(--orange);font-size:9px;font-weight:800;margin-top:2px}
#os-roles .rl-stat{margin-top:auto;padding-top:14px;border-top:1px dashed rgba(25,52,93,.14);font-size:12px;font-weight:600;color:var(--muted)}
#os-roles .rl-stat b{display:block;font-size:20px;font-weight:800;letter-spacing:-.02em;color:var(--orange)}
@media(max-width:1024px){#os-roles .rl-grid{grid-template-columns:1fr 1fr}}
@media(max-width:600px){#os-roles .rl-grid{grid-template-columns:1fr;max-width:480px}}
</style>
<section id="os-roles" aria-labelledby="osr-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">Built for your team</span>
      <h2 id="osr-h">Every role sees the funnel. Every role wins from it.</h2>
    </div>
    <div class="rl-grid">
      <article class="rl-card rv d1">
        <span class="rl-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" transform="translate(0 3)"/><path d="M5 21v-1a7 7 0 0 1 14 0v1"/></svg></span>
        <h3>Counsellors</h3>
        <ul>
          <li>A ranked call list every morning, HOT first</li>
          <li>Full student context on one screen</li>
          <li>WhatsApp, calls and notes in one window</li>
        </ul>
        <div class="rl-stat"><b>95%</b>counsellor adoption</div>
      </article>
      <article class="rl-card rv d2">
        <span class="rl-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6a3 3 0 1 1 6 0 3 3 0 0 1-6 0z"/><path d="M4 21v-1a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v1"/><path d="M17 8a3 3 0 1 0 0-6"/></svg></span>
        <h3>Admission heads</h3>
        <ul>
          <li>Team performance and follow-up discipline, live</li>
          <li>No enquiry left unattended, ever</li>
          <li>Stage-wise funnel with drop-off alerts</li>
        </ul>
        <div class="rl-stat"><b>Up to 90%</b>less response effort</div>
      </article>
      <article class="rl-card rv d3">
        <span class="rl-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-7-7 18-2.5-7.5L3 11z"/></svg></span>
        <h3>Marketing teams</h3>
        <ul>
          <li>Source-level ROI on every campaign</li>
          <li>Spend shifts to the channels that enrol</li>
          <li>Landing pages and ads wired in automatically</li>
        </ul>
        <div class="rl-stat"><b>50+</b>integrations and sources</div>
      </article>
      <article class="rl-card rv d4">
        <span class="rl-ic" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20h18"/><path d="M6 16v-5M11 16V8M16 16v-3M21 16V5"/></svg></span>
        <h3>Leadership</h3>
        <ul>
          <li>One dashboard from enquiry to enrolment</li>
          <li>Predictable cycle, not end-of-season surprises</li>
          <li>Numbers you can take to the board</li>
        </ul>
        <div class="rl-stat"><b>Up to 40%</b>conversion lift</div>
      </article>
    </div>
  </div>
</section>

<!-- ═════════════════ 09 · CUSTOMER STORIES (video carousel) ═════════════════ -->
<section id="stories" aria-labelledby="stories-title">
  <style>
    #stories{position:relative;overflow:hidden;background:#fff;padding-left:0;padding-right:0}
    #stories .cs3-head{text-align:center;max-width:760px;margin:0 auto clamp(24px,3vw,38px);padding:0 24px}
    #stories .cs3-head .os-kick{justify-content:center}
    html body #main-content #stories h2{color:#19335D !important;margin:0 !important}
    #stories .cs3-zone{position:relative}
    #stories .cs3-rail{--wc:min(880px,64vw);display:flex;gap:clamp(14px,2vw,24px);overflow-x:auto;scroll-snap-type:x mandatory;scroll-behavior:smooth;scrollbar-width:none;padding:6px calc((100vw - var(--wc))/2) 6px}
    #stories .cs3-rail::-webkit-scrollbar{display:none}
    #stories .cs3-card{position:relative;flex:0 0 var(--wc);min-width:0;scroll-snap-align:center;aspect-ratio:16/9;border-radius:20px;overflow:hidden;background:#0F2040;border:1px solid rgba(255,255,255,.65);outline:1px solid rgba(25,52,93,.12);box-shadow:0 24px 55px -30px rgba(25,51,93,.4);cursor:pointer;opacity:.55;transform:scale(.8);transition:opacity .45s ease,transform .5s cubic-bezier(.2,.7,.2,1),box-shadow .45s ease}
    #stories .cs3-card.on{opacity:1;transform:scale(1);box-shadow:0 60px 120px -36px rgba(15,32,64,.55),0 24px 48px -24px rgba(15,32,64,.35),0 2px 8px rgba(15,32,64,.12)}
    #stories .cs3-card:focus-visible{outline:2px solid #DE6E30;outline-offset:3px}
    #stories .cs3-card img{width:100%;height:100%;object-fit:cover;display:block}
    #stories .cs3-card iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
    #stories .cs3-pb{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%) scale(.9);width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,.94);backdrop-filter:blur(4px);display:grid;place-items:center;box-shadow:0 18px 44px rgba(15,32,64,.45),0 0 0 10px rgba(255,255,255,.18);opacity:0;pointer-events:none;transition:opacity .25s ease,transform .25s ease}
    #stories .cs3-pb svg{width:26px;height:26px;color:#19335D;margin-left:3px}
    #stories .cs3-card.on:hover .cs3-pb{opacity:1;transform:translate(-50%,-50%) scale(1)}
    @media(hover:none){#stories .cs3-card.on .cs3-pb{opacity:1;transform:translate(-50%,-50%) scale(1)}}
    #stories .cs3-card.playing .cs3-pb{display:none}
    #stories .cs3-arw{position:absolute;top:calc(50% - 22px);z-index:5;width:44px;height:44px;border-radius:50%;border:1px solid rgba(25,51,93,.14);cursor:pointer;display:grid;place-items:center;background:#fff;color:#19335D;box-shadow:0 12px 28px -12px rgba(25,51,93,.35);transition:transform .2s,background .2s,color .2s}
    #stories .cs3-arw svg{width:18px;height:18px}
    #stories .cs3-arw:hover{background:#DE6E30;color:#fff;transform:scale(1.07)}
    #stories .cs3-arw--l{left:clamp(24px,5vw,90px)}
    #stories .cs3-arw--r{right:clamp(24px,5vw,90px)}
    #stories .cs3-cap{max-width:min(880px,64vw);margin:clamp(18px,2.4vw,26px) auto 0;padding:0 6px;display:flex;align-items:flex-start;justify-content:space-between;gap:clamp(18px,3vw,46px);transition:opacity .3s ease}
    #stories .cs3-cap.fade{opacity:0}
    #stories .cs3-q{margin:0 0 10px;color:#5A6B85;font-size:13px;line-height:1.7;max-width:62ch}
    #stories .cs3-n{margin:0;color:#19335D;font-size:12.5px}
    #stories .cs3-n b{font-weight:700}
    #stories .cs3-who{display:flex;align-items:center;gap:12px}
    #stories .cs3-logo{flex:none;width:46px;height:46px;object-fit:contain;background:#fff;border:1px solid rgba(25,51,93,.12);border-radius:12px;padding:5px;box-shadow:0 8px 18px -12px rgba(25,51,93,.45)}
    #stories .cs3-logo[hidden]{display:none}
    #stories .cs3-playbtn{flex:none;display:inline-flex;align-items:center;gap:9px;border:0;cursor:pointer;background:#19335D;color:#fff;font:700 13px/1 'Inter',system-ui,sans-serif;padding:13px 22px;border-radius:999px;box-shadow:0 14px 30px -12px rgba(25,51,93,.55);transition:background .2s,transform .2s}
    #stories .cs3-playbtn:hover{background:#DE6E30;transform:translateY(-2px)}
    #stories .cs3-playbtn svg{width:13px;height:13px}
    #stories .cs3-more{text-align:center;margin-top:clamp(22px,3vw,32px)}
    #stories .cs3-more a{display:inline-flex;align-items:center;gap:8px;color:#19335D;font-weight:700;font-size:14px;text-decoration:none;border-bottom:2px solid rgba(222,110,48,.4);padding-bottom:3px;transition:color .2s,border-color .2s}
    #stories .cs3-more a:hover{color:#DE6E30;border-color:#DE6E30}
    @media(max-width:820px){
      #stories .cs3-rail{--wc:86vw}
      #stories .cs3-arw{display:none}
      #stories .cs3-cap{max-width:86vw;flex-direction:column;gap:14px}
      #stories .cs3-playbtn{align-self:flex-start}
    }
  </style>
  <div class="cs3-head rv">
    <span class="os-kick">The proof</span>
    <h2 class="cs3-title" id="stories-title">What Our Clients Are Saying</h2>
  </div>

  <div class="cs3-zone">
    <button type="button" class="cs3-arw cs3-arw--l" aria-label="Previous story"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg></button>
    <button type="button" class="cs3-arw cs3-arw--r" aria-label="Next story"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
    <div class="cs3-rail" role="list" aria-label="Customer stories">

      <article class="cs3-card" role="listitem" data-yt="3SHgLf1GFgk" data-logo="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/tula-s-institute-dehradun-logo.svg" data-q="&ldquo;Tula's Institute streamlined its admissions process, strengthened student engagement, and empowered its team with a more organised admissions workflow.&rdquo;" data-n="Silky Jain Marwah" data-r="Executive Director at Tula's Institute, Dehradun" tabindex="0" aria-label="Customer story: Silky Jain Marwah">
        <img src="https://img.youtube.com/vi/3SHgLf1GFgk/maxresdefault.jpg" alt="Silky Jain Marwah - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/3SHgLf1GFgk/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="dWLdQ8E3FOU" data-logo="" data-q="&ldquo;A unified admissions platform helped the team manage enquiries, improve follow-ups, and build a more efficient applicant journey.&rdquo;" data-n="Pranay Rupani" data-r="Head of Admissions &amp; Marketing at Annapurna College of Film &amp; Media" tabindex="0" aria-label="Customer story: Pranay Rupani">
        <img src="https://img.youtube.com/vi/dWLdQ8E3FOU/maxresdefault.jpg" alt="Pranay Rupani - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/dWLdQ8E3FOU/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="yfK83D2SKps" data-logo="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/indian-academy-degree-college-logo.svg" data-q="&ldquo;Simplified lead management and communication, with better counsellor visibility across the student admissions journey.&rdquo;" data-n="K. Nirmala Devi" data-r="Assistant Manager at Indian Academy Group, Bengaluru" tabindex="0" aria-label="Customer story: K. Nirmala Devi">
        <img src="https://img.youtube.com/vi/yfK83D2SKps/maxresdefault.jpg" alt="K. Nirmala Devi - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/yfK83D2SKps/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="tLExH5jpQbw" data-logo="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/uttaranchal-university-logo.svg" data-q="&ldquo;Streamlined enquiry handling, faster follow-ups and clearer visibility across the entire admission funnel.&rdquo;" data-n="Uttaranchal University" data-r="University &middot; Dehradun" tabindex="0" aria-label="Customer story: Uttaranchal University">
        <img src="https://img.youtube.com/vi/tLExH5jpQbw/maxresdefault.jpg" alt="Uttaranchal University - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/tLExH5jpQbw/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="9l99MjTfEbw" data-logo="" data-q="&ldquo;One platform for leads, counsellors and communication across the group&rsquo;s campuses.&rdquo;" data-n="Amrapali Group of Institutes" data-r="Group of Institutes &middot; Haldwani" tabindex="0" aria-label="Customer story: Amrapali Group of Institutes">
        <img src="https://img.youtube.com/vi/9l99MjTfEbw/maxresdefault.jpg" alt="Amrapali Group of Institutes - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/9l99MjTfEbw/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="7sPbL3uvha0" data-logo="" data-q="&ldquo;ExtraaEdge helped the team hit its admissions target for the cycle.&rdquo;" data-n="DPU Global Business School" data-r="B-School &middot; Pune" tabindex="0" aria-label="Customer story: DPU Global Business School">
        <img src="https://img.youtube.com/vi/7sPbL3uvha0/maxresdefault.jpg" alt="DPU Global Business School - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/7sPbL3uvha0/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="KisEkYkGYs8" data-logo="" data-q="&ldquo;The team adopted ExtraaEdge in just 10 days and brought its counselling pipeline into one organised view.&rdquo;" data-n="Admit Abroad" data-r="Study Abroad Consultants" tabindex="0" aria-label="Customer story: Admit Abroad">
        <img src="https://img.youtube.com/vi/KisEkYkGYs8/maxresdefault.jpg" alt="Admit Abroad - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/KisEkYkGYs8/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="q53VDQFTq04" data-logo="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/edtech/fostiima-business-school-logo.svg" data-q="&ldquo;From first enquiry to final PGDM enrolment, the full admission journey on one platform.&rdquo;" data-n="FOSTIIMA Business School" data-r="B-School &middot; New Delhi" tabindex="0" aria-label="Customer story: FOSTIIMA Business School">
        <img src="https://img.youtube.com/vi/q53VDQFTq04/maxresdefault.jpg" alt="FOSTIIMA Business School - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/q53VDQFTq04/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="ApP0hhJ45NQ" data-logo="" data-q="&ldquo;Structure and speed for the admission journey, with organised leads and timely follow-ups.&rdquo;" data-n="IBSC" data-r="Institute of Management" tabindex="0" aria-label="Customer story: IBSC">
        <img src="https://img.youtube.com/vi/ApP0hhJ45NQ/maxresdefault.jpg" alt="IBSC - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/ApP0hhJ45NQ/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

      <article class="cs3-card" role="listitem" data-yt="K3kqAHKJAgo" data-logo="" data-q="&ldquo;One place to manage enquiries, follow-ups and admissions for the whole team.&rdquo;" data-n="IIFT" data-r="Institute of Management" tabindex="0" aria-label="Customer story: IIFT">
        <img src="https://img.youtube.com/vi/K3kqAHKJAgo/maxresdefault.jpg" alt="IIFT - ExtraaEdge customer story" loading="lazy" decoding="async"
             onerror="this.onerror=null;this.src='https://img.youtube.com/vi/K3kqAHKJAgo/hqdefault.jpg'">
        <span class="cs3-pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </article>

    </div>
  </div>

  <div class="cs3-cap" id="cs3Cap" aria-live="polite">
    <div>
      <p class="cs3-q" id="cs3Q"></p>
      <div class="cs3-who">
        <img class="cs3-logo" id="cs3Logo" src="" alt="" width="46" height="46" decoding="async" hidden>
        <p class="cs3-n" id="cs3N"></p>
      </div>
    </div>
    <button type="button" class="cs3-playbtn" id="cs3Play"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg> Play customer story</button>
  </div>

  <div class="cs3-more">
    <a href="/videos/customer-stories/">View All Customer Stories &rarr;</a>
  </div>
</section>

<script>
(function(){
  var root=document.getElementById('stories'); if(!root) return;
  var rail=root.querySelector('.cs3-rail');
  var cards=[].slice.call(root.querySelectorAll('.cs3-card'));
  var cap=document.getElementById('cs3Cap'), capQ=document.getElementById('cs3Q'), capN=document.getElementById('cs3N'), capL=document.getElementById('cs3Logo');
  var active=-1, raf=0, capT=0;

  cards.forEach(function(c){ c.__media=c.innerHTML; });
  function stop(c){
    if(!c.classList.contains('playing')) return;
    c.classList.remove('playing');
    c.innerHTML=c.__media;
  }
  /* The speaker's logo is optional: a card with no data-logo, or one whose
     image fails to load, just shows the name on its own. */
  function setLogo(c){
    if(!capL) return;
    var src=c.getAttribute('data-logo')||'';
    if(!src){ capL.hidden=true; capL.removeAttribute('src'); return; }
    capL.onerror=function(){ capL.hidden=true; };
    capL.src=src;
    capL.alt=(c.dataset.n||'')+' logo';
    capL.hidden=false;
  }
  function caption(c){
    clearTimeout(capT);
    cap.classList.add('fade');
    capT=setTimeout(function(){
      capQ.innerHTML=c.dataset.q;
      capN.innerHTML='<b>'+c.dataset.n+'</b>, '+c.dataset.r;
      setLogo(c);
      cap.classList.remove('fade');
    },160);
  }
  function update(){
    raf=0;
    var mid=rail.scrollLeft+rail.clientWidth/2, best=0, bd=Infinity;
    cards.forEach(function(c,i){
      var d=Math.abs(c.offsetLeft+c.offsetWidth/2-mid);
      if(d<bd){bd=d;best=i;}
    });
    if(best!==active){
      active=best;
      cards.forEach(function(c,i){ c.classList.toggle('on',i===best); if(i!==best) stop(c); });
      caption(cards[best]);
    }
  }
  rail.addEventListener('scroll',function(){ if(!raf) raf=requestAnimationFrame(update); },{passive:true});
  update();

  function center(c){ rail.scrollTo({left:c.offsetLeft+c.offsetWidth/2-rail.clientWidth/2,behavior:'smooth'}); }
  function play(c){
    if(c.classList.contains('playing')) return;
    c.classList.add('playing');
    c.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+c.dataset.yt+
      '?autoplay=1&rel=0&modestbranding=1" title="Customer story video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
  }
  cards.forEach(function(c){
    c.addEventListener('click',function(){ c.classList.contains('on') ? play(c) : center(c); });
    c.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){ e.preventDefault(); c.classList.contains('on') ? play(c) : center(c); } });
  });
  var pb=document.getElementById('cs3Play');
  if(pb) pb.addEventListener('click',function(){ if(active>-1) play(cards[active]); });

  var aL=root.querySelector('.cs3-arw--l'), aR=root.querySelector('.cs3-arw--r');
  function go(dir){ var n=Math.min(Math.max(active+dir,0),cards.length-1); center(cards[n]); }
  if(aL) aL.addEventListener('click',function(){go(-1); restart();});
  if(aR) aR.addEventListener('click',function(){go(1); restart();});

  /* auto-advance: one story every 3 seconds. Pauses on hover/touch, while a
     video plays, off-screen, and for reduced-motion visitors. */
  var auto=null, inView=false;
  var noMotion=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function tick(){
    if(document.hidden || !inView) return;
    if(root.querySelector('.cs3-card.playing')) return;
    center(cards[(active+1)%cards.length]);
  }
  function startAuto(){ if(!auto && !noMotion) auto=setInterval(tick,3000); }
  function stopAuto(){ if(auto){ clearInterval(auto); auto=null; } }
  function restart(){ stopAuto(); startAuto(); }
  try{
    var io=new IntersectionObserver(function(en){
      en.forEach(function(x){ inView=x.isIntersecting; });
    },{threshold:.35});
    io.observe(root);
  }catch(e){ inView=true; }
  rail.addEventListener('mouseenter',stopAuto);
  rail.addEventListener('mouseleave',startAuto);
  rail.addEventListener('touchstart',stopAuto,{passive:true});
  rail.addEventListener('touchend',function(){ restart(); },{passive:true});
  cards.forEach(function(c){ c.addEventListener('click',restart); });
  startAuto();
})();
</script>

<!-- ═════════════════ 10 · ENTERPRISE READINESS (one compact band) ═════════════════ -->
<style id="os-enterprise-css">
#os-enterprise{background:var(--bg-soft)}
#os-enterprise .en-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;max-width:1140px;margin:clamp(28px,4vw,44px) auto 0}
#os-enterprise .en-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px 22px;box-shadow:var(--shadow-sm);transition:transform .25s,box-shadow .3s,border-color .3s}
#os-enterprise .en-card:hover{transform:translateY(-4px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}
#os-enterprise .en-n{font-size:24px;font-weight:800;letter-spacing:-.02em;color:var(--orange);line-height:1.1}
#os-enterprise .en-n small{display:block;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);margin-top:5px}
#os-enterprise h3{margin:14px 0 6px;color:var(--navy);font-weight:700}
#os-enterprise p{margin:0;color:var(--muted);font-size:13.5px;line-height:1.6}
#os-enterprise .en-inds{display:flex;flex-wrap:wrap;justify-content:center;gap:8px;max-width:820px;margin:clamp(24px,3.5vw,36px) auto 0}
#os-enterprise .en-inds span{font-size:12.5px;font-weight:600;color:var(--navy);border:1px solid rgba(25,52,93,.14);background:#fff;border-radius:99px;padding:8px 16px}
@media(max-width:1024px){#os-enterprise .en-grid{grid-template-columns:1fr 1fr}}
@media(max-width:600px){#os-enterprise .en-grid{grid-template-columns:1fr;max-width:480px}}
</style>
<section id="os-enterprise" aria-labelledby="ose-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">Ready for your institution</span>
      <h2 id="ose-h">Enterprise-grade from day one</h2>
    </div>
    <div class="en-grid">
      <article class="en-card rv d1">
        <div class="en-n">50+<small>Integrations</small></div>
        <h3>Fits your stack</h3>
        <p>ERP/SIS, payment gateways, cloud telephony, Meta and Google Ads, education portals and WhatsApp Business API.</p>
      </article>
      <article class="en-card rv d2">
        <div class="en-n">ISO 27001<small>Certified</small></div>
        <h3>Security first</h3>
        <p>GDPR compliant with India data residency, role-based access, encryption and full audit trails.</p>
      </article>
      <article class="en-card rv d3">
        <div class="en-n">7 days<small>To go live</small></div>
        <h3>Fast implementation</h3>
        <p>Live in 7 days starting fresh, 14 days when switching, including full data migration from your current CRM or spreadsheets.</p>
      </article>
      <article class="en-card rv d4">
        <div class="en-n">Dedicated<small>Success team</small></div>
        <h3>Adoption guaranteed by design</h3>
        <p>Hands-on counsellor training, on-ground support and a dedicated Customer Success Manager for every account.</p>
      </article>
    </div>
    <div class="en-inds rv" aria-label="Institution types ExtraaEdge serves">
      <span>Higher education</span><span>K-12 schools</span><span>Coaching &amp; test prep</span><span>Study abroad</span><span>EdTech</span><span>University groups</span>
    </div>
  </div>
</section>

<!-- ═════════════════ 11 · FOCUSED FAQ ═════════════════ -->
<style id="os-faq-css">
#faq{background:#fff}
#faq .faq{max-width:820px;margin:clamp(26px,4vw,40px) auto 0}
#faq .qa{border:1px solid var(--line);border-radius:14px;background:#fff;margin-bottom:12px;overflow:hidden;transition:border-color .25s,box-shadow .25s}
#faq .qa:hover{border-color:rgba(222,110,48,.35)}
#faq .qa.open{border-color:rgba(222,110,48,.45);box-shadow:var(--shadow-sm)}
#faq .qa button{display:flex;align-items:center;justify-content:space-between;gap:16px;width:100%;text-align:left;background:none;border:0;cursor:pointer;
  padding:18px 20px;font-family:inherit;font-size:15.5px;font-weight:700;color:var(--navy)}
#faq .qa .ic{flex:none;display:grid;place-items:center;width:26px;height:26px;border-radius:50%;background:rgba(222,110,48,.12);color:var(--orange);font-size:15px;font-weight:800;transition:transform .3s,background .2s,color .2s}
#faq .qa.open .ic{transform:rotate(45deg);background:var(--orange);color:#fff}
#faq .qa__a{max-height:0;overflow:hidden;transition:max-height .35s cubic-bezier(.2,.7,.2,1)}
#faq .qa__a p{margin:0;padding:0 20px 18px;color:var(--muted);font-size:14.5px;line-height:1.7}
</style>
<section class="sec--soft" id="faq" aria-labelledby="osf-h">
  <div class="container">
    <div class="os-head rv">
      <span class="os-kick">Questions</span>
      <h2 id="osf-h">Everything you need to know</h2>
    </div>
    <?php /* the visible twin of the FAQPage JSON-LD in wp_head above -
             the two lists must always match, question for question */ ?>
    <div class="faq rv">
      <div class="qa"><button aria-expanded="false"><span>What is ExtraaEdge?</span><span class="ic" aria-hidden="true">+</span></button><div class="qa__a"><p>ExtraaEdge is India's AI-powered Admissions Growth Platform, purpose-built for educational institutions - schools, colleges, universities, coaching and study-abroad companies. Its Vidya AI suite (VidyaGPT, VidyaPulse and VidyaAgents) handles enquiry response, lead prioritisation and follow-up automatically, so counsellors focus on conversion.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How does ExtraaEdge help convert more students?</span><span class="ic" aria-hidden="true">+</span></button><div class="qa__a"><p>ExtraaEdge answers every enquiry in 60 seconds with VidyaGPT chat and WhatsApp automation, ranks every lead HOT, WARM or COLD with VidyaPulse scoring, and tells counsellors exactly who to follow up with next - reducing response effort by up to 90% and lifting conversions by up to 40%.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>What AI features does ExtraaEdge offer?</span><span class="ic" aria-hidden="true">+</span></button><div class="qa__a"><p>VidyaGPT: 24x7 AI chat on your website and WhatsApp in 95+ languages. VidyaPulse: lead intent scoring (HOT / WARM / COLD). VidyaAgents: AI calling, smart follow-ups and counsellor performance intelligence. All part of the Vidya AI suite, engineered for the admission workflow.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How long does it take to implement ExtraaEdge?</span><span class="ic" aria-hidden="true">+</span></button><div class="qa__a"><p>Starting fresh: 7 days to go live. Switching from an existing system: 14 days, including full data migration, integrations (ads, website, WhatsApp, telephony), workflow set-up and counsellor training, with a dedicated onboarding specialist and Customer Success Manager.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Will ExtraaEdge work with my existing ads, website and CRM data?</span><span class="ic" aria-hidden="true">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge captures leads automatically from Meta and Google Ads, your website and landing pages, education portals, WhatsApp, IVR and more, with full source tracking. It connects with 50+ systems including your ERP/SIS, payment gateway and cloud telephony, and the team migrates your existing CRM or spreadsheet data as part of onboarding.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Is my data secure with ExtraaEdge?</span><span class="ic" aria-hidden="true">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails.</p></div></div>
    </div>
  </div>
</section>

<script>
/* FAQ accordion: one open at a time, accessible */
(function(){
  var qas=[].slice.call(document.querySelectorAll('#faq .qa'));
  qas.forEach(function(qa){
    var btn=qa.querySelector('button'), body=qa.querySelector('.qa__a');
    btn.addEventListener('click',function(){
      var open=qa.classList.contains('open');
      qas.forEach(function(o){
        o.classList.remove('open');
        o.querySelector('button').setAttribute('aria-expanded','false');
        o.querySelector('.qa__a').style.maxHeight='';
      });
      if(!open){
        qa.classList.add('open');
        btn.setAttribute('aria-expanded','true');
        body.style.maxHeight=body.scrollHeight+'px';
      }
    });
  });
})();
</script>

<!-- ═════════════════ 12 · FINAL CTA ═════════════════ -->
<style id="os-final-css">
#os-final{background:linear-gradient(180deg,#16294B,var(--navy) 50%,#1D3A69);color:#fff;position:relative;overflow:hidden;text-align:center}
#os-final::before{content:"";position:absolute;width:640px;height:640px;border-radius:50%;left:50%;transform:translateX(-50%);bottom:-420px;pointer-events:none;
  background:radial-gradient(circle,rgba(222,110,48,.28),transparent 65%)}
#os-final .fin-in{position:relative;z-index:1;max-width:720px;margin:0 auto}
#os-final .os-kick{color:var(--orange-2);justify-content:center}
#os-final .os-kick::before{background:var(--orange-2)}
html body #main-content #os-final h2{color:#fff !important;margin:0}
#os-final p{margin:14px auto 0;max-width:560px;color:rgba(255,255,255,.75);font-size:15.5px;line-height:1.65}
#os-final .fin-cta{display:flex;align-items:center;justify-content:center;gap:14px;margin-top:28px;flex-wrap:wrap}
#os-final .fin-alt{display:inline-flex;align-items:center;gap:7px;color:rgba(255,255,255,.85);font-weight:700;font-size:14px;text-decoration:none;border-bottom:2px solid rgba(222,110,48,.5);padding-bottom:3px;transition:color .2s,border-color .2s}
#os-final .fin-alt:hover{color:var(--orange-2);border-color:var(--orange-2)}
#os-final .fin-proof{display:flex;flex-wrap:wrap;justify-content:center;gap:8px 24px;margin-top:26px}
#os-final .fin-proof span{font-size:12.5px;font-weight:600;color:rgba(255,255,255,.6)}
#os-final .fin-proof b{color:#fff}
</style>
<section id="os-final" aria-labelledby="osfin-h">
  <div class="container">
    <div class="fin-in rv">
      <span class="os-kick">Next step</span>
      <h2 id="osfin-h">Ready to answer every enquiry in 60 seconds?</h2>
      <p>Book a personalised demo. 45 minutes, live on data from your sector, with a tailored quote at the end.</p>
      <div class="fin-cta">
        <a href="#admission-form" class="os-btn os-btn--primary">Book a personalised demo <span class="arr">&rarr;</span></a>
        <a href="#ee-platform" class="fin-alt">Or explore the live demo first</a>
      </div>
      <div class="fin-proof">
        <span><b>500+</b> institutions</span>
        <span><b>10M+</b> enquiries managed</span>
        <span><b>4.7/5</b> from 320+ teams</span>
        <span>Live in <b>7 days</b></span>
      </div>
    </div>
  </div>
</section>

</div><!-- /.ee-home -->

<!-- ── Book-a-Demo drawer: every link to #admission-form slides it open ── -->
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
    <span><b>Book a Demo</b><small>Personalised to your institution &middot; 45 minutes</small></span>
    <button type="button" class="eedd-x" id="eeddClose" aria-label="Close">&#10005;</button>
  </div>
  <div class="eedd-body">
    <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
    <div id="ee-form-7"></div>
    <p class="secure-label">&#128274; Secure Data Transmission Active &middot; ISO 27001 Certified &middot; GDPR Compliant</p>
  </div>
</aside>
<script>
(function(){
  var dr=document.getElementById('admission-form'),
      back=document.getElementById('eeddBack'),
      x=document.getElementById('eeddClose'),
      last=null;
  if(!dr||!back||!x) return;
  function openD(from){
    last=from||null;
    dr.classList.add('open'); back.classList.add('open');
    document.body.style.overflow='hidden';
    document.body.classList.add('eedd-on');
    x.focus();
  }
  function closeD(){
    dr.classList.remove('open'); back.classList.remove('open');
    document.body.style.overflow='';
    document.body.classList.remove('eedd-on');
    if(last&&last.focus) last.focus();
  }
  document.addEventListener('click',function(e){
    var a=e.target.closest('a[href$="#admission-form"]');
    if(!a) return;
    e.preventDefault();
    openD(a);
  });
  x.addEventListener('click',closeD);
  back.addEventListener('click',closeD);
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&dr.classList.contains('open')) closeD(); });
})();
</script>

<script>
/* reveal-on-scroll for .rv elements */
(function(){
  var els=[].slice.call(document.querySelectorAll('.ee-home .rv, #os-demo-kick.rv'));
  if(!els.length) return;
  if(window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches){
    els.forEach(function(el){el.classList.add('in');});
    return;
  }
  try{
    var io=new IntersectionObserver(function(en){
      en.forEach(function(x){ if(x.isIntersecting){ x.target.classList.add('in'); io.unobserve(x.target); } });
    },{threshold:.14,rootMargin:'0px 0px -6% 0px'});
    els.forEach(function(el){io.observe(el);});
  }catch(e){ els.forEach(function(el){el.classList.add('in');}); }
})();
</script>

<style id="os-demo-kick-rv">
/* #os-demo-kick sits outside .ee-home section rhythm but shares the reveal */
#os-demo-kick.rv{opacity:0;transform:translateY(26px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}
#os-demo-kick.rv.in{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){#os-demo-kick.rv{opacity:1;transform:none;transition:none}}
</style>

<?php get_footer(); ?>
