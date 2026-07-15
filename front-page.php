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
}#prog{position:fixed;top:0;left:0;height:3px;width:0;z-index:60;background:linear-gradient(90deg,var(--orange),var(--blue));box-shadow:0 0 12px rgba(222,110,48,.5)}/* buttons */
.btn{display:inline-flex;align-items:center;gap:9px;padding:14px 26px;border-radius:14px;font-weight:700;font-size:15px;text-decoration:none;cursor:pointer;border:1.5px solid transparent;transition:transform .18s,box-shadow .25s,background .2s,color .2s;font-family:inherit}.btn-primary{background:var(--orange);color:#fff;box-shadow:0 10px 26px rgba(222,110,48,.35)}.btn-primary:hover{transform:translateY(-3px);box-shadow:0 16px 34px rgba(222,110,48,.45)}.btn-dark{background:var(--blue);color:#fff;box-shadow:0 10px 26px rgba(25,52,93,.25)}.btn-dark:hover{transform:translateY(-3px)}.btn-ghost{background:#fff;color:var(--blue);border-color:var(--line)}.btn-ghost:hover{border-color:var(--orange);color:var(--orange)}.btn-lg{padding:17px 32px;font-size:16px}/* pills / tags */
.pill{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:700;background:var(--orange-soft);color:var(--orange);padding:8px 16px;border-radius:999px}.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:800;letter-spacing:1.4px;text-transform:uppercase;color:var(--orange);margin-bottom:14px}.dot{width:8px;height:8px;border-radius:50%;background:var(--orange)}.ping{position:relative;width:10px;height:10px;border-radius:50%;background:var(--green);flex:none}.ping::after{content:"";position:absolute;inset:0;border-radius:50%;background:var(--green);animation:ping 1.6s cubic-bezier(0,0,.2,1) infinite}
@keyframes ping{75%,100%{transform:scale(2.6);opacity:0}}/* heads / sections */
.head{max-width:780px;margin:0 auto;text-align:center}.h2{font-family:'Inter',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;letter-spacing:-1.2px;line-height:1.1}.lead{color:var(--muted);font-size:18px;margin-top:16px}.sec{padding:88px 0}.sec--soft{background:var(--bg-soft)}/* reveal */
.rv{opacity:0;transform:translateY(28px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}.rv.in{opacity:1;transform:none}.rv.d1{transition-delay:.08s}.rv.d2{transition-delay:.16s}.rv.d3{transition-delay:.24s}
@media (prefers-reduced-motion:reduce){.rv{opacity:1;transform:none;transition:none}}.card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow-sm)}.glass{background:rgba(255,255,255,.72);backdrop-filter:blur(10px);border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow-sm)}/* ===================== HERO + WebGL ===================== */
.hero{padding:70px 0 46px;overflow:hidden}#glsl{position:absolute;inset:0;width:100%;height:100%;z-index:0;opacity:.9;pointer-events:none}.hero__bg{position:absolute;inset:0;z-index:1;pointer-events:none;background:radial-gradient(600px 380px at 12% 0%,rgba(222,110,48,.10),transparent 60%),radial-gradient(620px 420px at 92% 18%,rgba(25,52,93,.09),transparent 60%)}.hero__in{position:relative;z-index:2;display:grid;grid-template-columns:1.04fr .96fr;gap:48px;align-items:center}.hero h1{font-family:'Inter',sans-serif;font-size:clamp(38px,5.2vw,64px);font-weight:800;letter-spacing:-1.8px;line-height:1.04;margin:16px 0}.hero__type{color:var(--orange)}.hero p.sub{font-size:18px;color:var(--muted);max-width:540px;margin-bottom:12px}.hero__feat{color:var(--blue);font-weight:600;max-width:540px;margin-bottom:24px;font-size:16px}.hero__cta{display:flex;gap:14px;flex-wrap:wrap;align-items:center}.hero__micro{margin-top:16px;font-size:13.5px;color:var(--muted);display:flex;align-items:center;gap:8px}.live{padding:22px;position:relative}.live__top{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}.live__brand{display:flex;align-items:center;gap:10px;font-weight:800;color:var(--blue)}.orb{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--orange),var(--blue));display:grid;place-items:center;color:#fff;font-weight:900;font-size:15px;flex:none}.live__count{font-size:13px;font-weight:800;color:var(--orange);display:flex;align-items:center;gap:7px}.hero__modules{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px;padding-top:14px;border-top:1px solid var(--line)}.hero__modules span{font-size:11px;font-weight:700;color:var(--blue);background:var(--bg-soft);border:1px solid var(--line);border-radius:999px;padding:5px 10px}.step{border:1px solid var(--line);border-radius:14px;padding:13px 15px;margin-bottom:10px;background:#fff;opacity:0;transform:translateY(10px);transition:.5s}.step.show{opacity:1;transform:none}.step__tag{font-size:10.5px;font-weight:800;letter-spacing:1px;color:var(--muted)}.step__txt{font-size:14.5px;margin-top:4px;font-weight:500;min-height:1.2em}.step--in{border-left:3px solid var(--blue)}.step--ai{border-left:3px solid var(--orange);background:linear-gradient(180deg,#fff,#fff8f3)}.step--ai .step__tag{color:var(--orange)}.step--ok{border-left:3px solid var(--green)}.step--ok .step__tag{color:#164ea3}.badge-ok{display:inline-flex;align-items:center;gap:6px;font-weight:800;color:#164ea3}.waiting{display:inline-flex;gap:4px;align-items:center;color:var(--orange);font-size:12px;font-weight:700}.wv{display:inline-flex;gap:3px;align-items:flex-end;height:16px}.wv i{width:3px;background:var(--orange);border-radius:2px;animation:wave 1s ease-in-out infinite;height:5px}.wv i:nth-child(2){animation-delay:.15s}.wv i:nth-child(3){animation-delay:.3s}.wv i:nth-child(4){animation-delay:.45s}.wv i:nth-child(5){animation-delay:.6s}
@keyframes wave{0%,100%{height:5px}50%{height:16px}}/* ===================== MARQUEE ===================== */
.marq{padding:34px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:#fff}.marq__lbl{text-align:center;color:var(--muted);font-weight:700;font-size:14px;margin-bottom:22px}.marq__wrap{overflow:visible}.marq__track{display:flex;flex-wrap:wrap;gap:22px 40px;width:auto;align-items:center;justify-content:center}.marq__track.t1{animation:none}
@keyframes scrollx{to{transform:translateX(-50%)}}.logo-card{width:170px;height:86px;flex:none;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}.logo-card:hover{border-color:var(--orange);transform:translateY(-4px)}.logo-card img{max-height:54px;width:auto;object-fit:contain;filter:grayscale(100%);opacity:.7;transition:.3s}.logo-card:hover img{filter:grayscale(0);opacity:1}/* ===================== STATS ===================== */
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
.tcards{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:42px}.tcard{background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;transition:transform .4s,box-shadow .4s}.tcard:hover{transform:translateY(-8px);box-shadow:var(--shadow)}.tvid{aspect-ratio:16/9;background:#000;position:relative;cursor:pointer}.tvid img.thumb{width:100%;height:100%;object-fit:cover;transition:transform .8s}.tcard:hover .tvid img.thumb{transform:scale(1.07)}.tplay{position:absolute;inset:0;display:grid;place-items:center}.tplay span{width:64px;height:64px;border-radius:50%;background:#fff;display:grid;place-items:center;box-shadow:0 10px 30px rgba(0,0,0,.3);transition:.3s}.tplay span::after{content:"";border-left:18px solid var(--orange);border-top:11px solid transparent;border-bottom:11px solid transparent;margin-left:5px}.tcard:hover .tplay span{background:var(--orange);transform:scale(1.08)}.tcard:hover .tplay span::after{border-left-color:#fff}.tvid.playing .tplay,.tvid.playing img.thumb{opacity:0;pointer-events:none}.tbody{padding:26px;display:flex;flex-direction:column;flex:1}.stars{color:var(--orange);font-size:14px;margin-bottom:10px}.tmetric{display:inline-block;font-family:'Inter',sans-serif;font-weight:800;font-size:13.5px;color:var(--orange);background:var(--orange-soft);padding:5px 13px;border-radius:999px;margin-bottom:12px}.tbody p.q{font-size:14px;color:#333e4f;font-style:italic;line-height:1.7}.tby{display:flex;align-items:center;gap:12px;margin-top:auto;padding-top:18px;border-top:1px solid var(--line)}.tby img{width:52px;height:52px;border-radius:14px;object-fit:cover;border:2px solid var(--orange-soft)}.tby b{font-size:14.5px;display:block}.tby .role{color:var(--orange);font-size:12.5px;font-weight:700}.tby .inst{color:var(--muted);font-size:11.5px}/* ===================== FAQ ===================== */
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
.demo-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:0;border-radius:28px;overflow:hidden;box-shadow:var(--shadow)}.demo-left{background:linear-gradient(135deg,var(--blue) 0%,#21457a 100%);color:#fff;padding:48px 42px;position:relative;overflow:hidden}.demo-left::before{content:"";position:absolute;width:280px;height:280px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);bottom:-110px;left:-50px}.demo-left h2{font-family:'Inter',sans-serif;font-size:clamp(26px,3vw,38px);font-weight:800;letter-spacing:-1px;line-height:1.1;position:relative}.demo-left p.s{color:#c6d3e6;font-size:16px;margin:12px 0 26px;position:relative}.dchecks{list-style:none;display:flex;flex-direction:column;gap:14px;position:relative;margin-bottom:28px}.dchecks li{display:flex;gap:12px;align-items:flex-start;font-size:14.5px}.dchecks .ck{flex:none;width:24px;height:24px;border-radius:50%;background:var(--orange);display:grid;place-items:center;font-size:13px;font-weight:900}.dbadges{display:flex;gap:14px;flex-wrap:wrap;align-items:center;position:relative;padding-top:22px;border-top:1px solid rgba(255,255,255,.14)}.dbadge{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700;color:#dfe8f5}.dbadge img{height:34px;width:auto;filter:drop-shadow(0 0 6px rgba(255,255,255,.25))}.drating{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700;color:#dfe8f5}.drating .st{color:#ffb169;letter-spacing:1px}.dbadge-img{height:46px;width:auto;background:#fff;border-radius:8px;padding:5px 8px}.demo-right{background:#fff;padding:44px 38px;display:flex;flex-direction:column;justify-content:center}.demo-right h3{font-family:'Inter',sans-serif;font-size:22px;font-weight:800;margin-bottom:4px}.demo-right .sub2{color:var(--muted);font-size:14px;margin-bottom:22px}.demo-form{display:flex;flex-direction:column;gap:12px}.demo-form input,.demo-form select{padding:14px 16px;border-radius:12px;border:1.5px solid var(--line);font-size:15px;font-family:inherit;color:var(--ink);background:#fff;transition:border-color .2s}.demo-form input:focus,.demo-form select:focus{outline:none;border-color:var(--orange)}.demo-form .btn{justify-content:center;margin-top:4px}.demo-trust{display:flex;align-items:center;gap:8px;justify-content:center;font-size:12.5px;color:var(--muted);margin-top:14px;font-weight:600}.demo-ok{display:none;text-align:center;padding:18px;background:#dce9fc;color:#163665;border-radius:14px;font-weight:700;font-size:14px;margin-top:6px}/* ===================== STICKY CTA BAR ===================== */
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
  padding-top:18px!important;
  padding-bottom:18px!important;
}
.sec,.hero,#xhero,#platform,#stories,#segments,.vx-head,.vx-proof,.rf-wrap,.rf-band-in,.sec-auto,.ea-wrap,.ee-wrap,.wa-sec,.intro,.outro{
  padding-top:18px!important;
  padding-bottom:18px!important;
}.ts-grid{display:flex!important;flex-wrap:wrap!important;justify-content:center!important;overflow:visible!important;scroll-snap-type:none!important;margin-inline:auto!important;max-width:1180px;gap:clamp(16px,2.2vw,24px)!important}#stories .ts-card{flex:1 1 320px!important;max-width:382px!important;scroll-snap-align:none!important}#stories .ts-nav,#stories .ts-hint{display:none!important}
</style>
<div id="prog"></div>

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
  position:relative;min-height:100vh;display:flex;align-items:center;overflow:hidden;isolation:isolate;padding:96px 0 72px;
  background:var(--bg);color:var(--navy);font-family:var(--font);-webkit-font-smoothing:antialiased}#xhero *{margin:0;padding:0;box-sizing:border-box}#xhero a{text-decoration:none;color:inherit}#xhero .container{max-width:1500px;margin:0 auto;padding:0 32px}#xhero #glsl{position:absolute;inset:0;width:100%;height:100%;z-index:-3;opacity:.6}#xhero .hero__veil{position:absolute;inset:0;z-index:-2;background:radial-gradient(110% 80% at 80% 0%,transparent 25%,var(--bg) 72%),linear-gradient(to top,var(--bg) 0%,transparent 30%)}#xhero .hero__grid{position:absolute;inset:0;z-index:-1;pointer-events:none;background-image:linear-gradient(var(--navy-06) 1px,transparent 1px),linear-gradient(90deg,var(--navy-06) 1px,transparent 1px);background-size:72px 72px;-webkit-mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%);mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%)}#xhero .hero__in{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1fr) minmax(480px,580px);gap:64px;align-items:center}#xhero .reveal{opacity:0;transform:translateY(22px);animation:xh-rise .9s cubic-bezier(.2,.7,.2,1) forwards}
@keyframes xh-rise{to{opacity:1;transform:none}}#xhero .d1{animation-delay:.05s}#xhero .d2{animation-delay:.16s}#xhero .d3{animation-delay:.27s}#xhero .d4{animation-delay:.38s}#xhero .d5{animation-delay:.5s}#xhero .d6{animation-delay:.64s}#xhero .pill{display:inline-flex;align-items:center;gap:9px;padding:7px 16px 7px 8px;border:1px solid var(--navy-15);border-radius:99px;background:linear-gradient(110deg,var(--org-12),rgba(222,110,48,.02) 60%);font-size:13px;font-weight:500;letter-spacing:.01em;color:var(--navy-70)}#xhero .pill b{color:var(--orange);font-weight:700}#xhero .pill__txt{flex:1;min-width:0}#xhero .pill__ico{width:20px;height:20px;object-fit:contain;border-radius:6px;background:#fff;padding:1.5px;box-shadow:0 0 0 1px var(--navy-10)}#xhero .pill__new{font-size:10px;font-weight:800;letter-spacing:.12em;color:#fff;background:var(--orange);padding:3px 8px;border-radius:99px}#xhero h1{font-family:var(--font);font-weight:800;font-size:clamp(40px,2.8vw,66px);line-height:1.05;letter-spacing:-.035em;margin:26px 0 0;color:var(--navy)}#xhero h1 .accent{color:var(--orange);position:relative;white-space:normal;overflow-wrap:break-word}#xhero h1 .accent svg,#xhero h1 .accent img.eeimg{position:absolute;left:0;right:0;bottom:-.14em;width:100%;height:.22em;overflow:visible}#xhero h1 .accent svg path,#xhero h1 .accent img.eeimg path{fill:none;stroke:var(--orange);stroke-width:7;stroke-linecap:round;opacity:.45;stroke-dasharray:600;stroke-dashoffset:600;animation:xh-draw 1.1s .9s ease forwards}
@keyframes xh-draw{to{stroke-dashoffset:0}}#xhero .hero__type-row{display:block;min-height:1.1em;white-space:normal;overflow-wrap:break-word;color:var(--navy)}#xhero .caret{display:none;width:3px;height:.84em;margin-left:6px;vertical-align:-.08em;background:var(--orange);animation:xh-blink 1s steps(1) infinite;border-radius:2px}
@keyframes xh-blink{50%{opacity:0}}#xhero .sub{margin-top:22px;max-width:540px;font-size:17.5px;line-height:1.65;color:var(--navy-70)}#xhero .sub b{color:var(--navy);font-weight:700}#xhero .chips{display:flex;flex-wrap:wrap;gap:9px;margin-top:22px}#xhero .chip{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-15);border-radius:9px;padding:7px 11px;background:#fff}#xhero .chip i{font-style:normal;color:var(--orange)}#xhero .hero__cta{display:flex;align-items:center;gap:16px;margin-top:34px;flex-wrap:wrap}#xhero .btn{position:relative;display:inline-flex;align-items:center;gap:10px;font-weight:700;font-size:15.5px;letter-spacing:-.01em;border-radius:13px;padding:17px 30px;cursor:pointer;transition:transform .25s cubic-bezier(.2,.7,.2,1),box-shadow .25s}#xhero .btn-primary{color:#fff;background:linear-gradient(180deg,#E87E43,var(--orange));overflow:hidden;box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 14px 34px -10px rgba(222,110,48,.55)}#xhero .btn-primary:hover{box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 20px 44px -10px rgba(222,110,48,.7);transform:translateY(-2px)}#xhero .btn-primary .shine{position:absolute;top:0;left:-80%;width:55%;height:100%;transform:skewX(-22deg);background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);animation:xh-shine 4.2s ease-in-out infinite}
@keyframes xh-shine{0%,55%{left:-80%}75%,100%{left:140%}}#xhero .btn-primary .arr{transition:transform .25s}#xhero .btn-primary:hover .arr{transform:translateX(4px)}#xhero .btn-ghost{color:var(--navy);border:1.5px solid var(--navy-15);background:#fff}#xhero .btn-ghost:hover{border-color:var(--navy);background:var(--navy-03)}#xhero .btn-ghost .play{display:grid;place-items:center;width:22px;height:22px;border-radius:50%;background:var(--navy-10);color:var(--navy);font-size:9px}#xhero .cta-note{font-size:12.5px;color:var(--navy-55)}#xhero .stats{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:38px;width:100%;max-width:480px}#xhero .stat{position:relative;background:#fff;border:1px solid var(--navy-10);border-radius:14px;padding:16px 18px;box-shadow:0 8px 24px rgba(25,52,93,.06);transition:transform .2s,box-shadow .25s,border-color .25s}#xhero .stat:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(25,52,93,.12);border-color:rgba(222,110,48,.45)}#xhero .stat__n{font-weight:800;font-size:30px;letter-spacing:-.03em;color:var(--navy);line-height:1}#xhero .stat__n em{font-style:normal;color:var(--orange)}#xhero .stat__l{margin-top:6px;font-size:12.5px;font-weight:600;color:var(--navy-55)}#xhero .console-wrap{position:relative;perspective:1400px}#xhero .console{position:relative;border-radius:var(--r-lg);border:1px solid var(--navy-15);background:#fff;box-shadow:0 40px 90px -34px rgba(25,52,93,.35),0 2px 6px rgba(25,52,93,.06);padding:22px 22px 18px;transform-style:preserve-3d;transition:transform .4s ease}#xhero .console::before{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1.5px;pointer-events:none;background:linear-gradient(135deg,var(--orange),transparent 32%,transparent 68%,var(--navy));opacity:.5;-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude}#xhero .console__top{display:flex;align-items:center;justify-content:space-between;gap:12px;padding-bottom:16px;border-bottom:1px dashed var(--navy-15)}#xhero .brand{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:700;color:var(--navy);white-space:nowrap}#xhero .orb{position:relative;display:grid;place-items:center;width:32px;height:32px;border-radius:10px;padding:2px;color:#fff;font-weight:800;font-size:14px;background:conic-gradient(from 200deg,var(--orange),var(--navy),var(--orange));box-shadow:0 4px 12px rgba(222,110,48,.3)}#xhero .orb img{width:100%;height:100%;object-fit:contain;border-radius:8px;background:#fff;padding:2px}#xhero .brand small{display:inline;font-weight:600;font-size:10px;color:var(--navy-55);letter-spacing:.1em;margin-left:7px;vertical-align:1px}#xhero .brand small::before{content:"·";margin-right:7px;color:var(--navy-55)}#xhero .live-dot{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.12em;color:var(--orange);border:1px solid var(--org-25);background:var(--org-12);border-radius:99px;padding:5px 11px}#xhero .ping{position:relative;width:7px;height:7px;border-radius:50%;background:var(--orange);display:inline-block}#xhero .ping::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:1px solid var(--orange);animation:xh-ping 1.6s ease-out infinite}
@keyframes xh-ping{0%{transform:scale(.4);opacity:.9}100%{transform:scale(1.5);opacity:0}}#xhero .feed{display:flex;flex-direction:column;gap:10px;margin-top:16px;min-height:268px}#xhero .step{border:1px solid var(--navy-10);border-radius:var(--r-md);padding:11px 14px;background:var(--navy-03);opacity:0;transform:translateY(12px);transition:opacity .5s,transform .5s cubic-bezier(.2,.7,.2,1)}#xhero .step.on{opacity:1;transform:none}#xhero .step__tag{display:flex;align-items:center;gap:8px;font-size:9.5px;font-weight:800;letter-spacing:.18em;color:var(--navy-55);margin-bottom:6px}#xhero .step__txt{font-size:13.5px;line-height:1.55;color:var(--navy-70)}#xhero .step__txt q{color:var(--navy);font-weight:500;quotes:"\201C" "\201D"}#xhero .step--in{border-left:3px solid var(--navy)}#xhero .step--ai{border-left:3px solid var(--orange);background:linear-gradient(110deg,var(--org-12),var(--navy-03) 60%)}#xhero .step--ai .step__tag{color:var(--orange)}#xhero .step--ok{border-left:3px solid var(--navy)}#xhero .step--ok .step__tag{color:var(--navy)}#xhero .src{font-size:11px;color:var(--navy-55);margin-top:3px}#xhero .wv{display:inline-flex;align-items:flex-end;gap:2px;height:10px;margin-left:4px}#xhero .wv i{width:2.5px;background:var(--orange);border-radius:2px;animation:xh-wv 1s ease-in-out infinite}#xhero .wv i:nth-child(1){animation-delay:0s}#xhero .wv i:nth-child(2){animation-delay:.12s}#xhero .wv i:nth-child(3){animation-delay:.24s}#xhero .wv i:nth-child(4){animation-delay:.36s}#xhero .wv i:nth-child(5){animation-delay:.48s}
@keyframes xh-wv{0%,100%{height:3px}50%{height:10px}}#xhero .think-line{display:flex;gap:8px;align-items:baseline}#xhero .think-line .tick{color:var(--orange);font-size:11px;font-weight:800;opacity:0;transition:opacity .3s}#xhero .think-line.done .tick{opacity:1}#xhero .badge-ok{display:inline-flex;align-items:center;gap:6px;color:var(--navy);font-weight:700}#xhero .badge-ok::before{content:"\2713";display:grid;place-items:center;width:16px;height:16px;border-radius:50%;background:var(--orange);color:#fff;font-size:10px}#xhero .acts{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}#xhero .act{font-size:11px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-10);border-radius:7px;padding:4px 8px;background:#fff;opacity:0;transform:scale(.92);transition:.35s}#xhero .act.on{opacity:1;transform:none}#xhero .console__mods{display:flex;flex-wrap:wrap;gap:8px;margin-top:16px;padding-top:14px;border-top:1px dashed var(--navy-15)}#xhero .mods__track{display:contents}#xhero .console__mods span{flex:none;font-size:11.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-10);border-radius:99px;padding:6px 12px;white-space:nowrap;background:#fff}#xhero .float{position:absolute;border-radius:16px;border:1px solid var(--navy-15);background:#fff;box-shadow:0 24px 50px -18px rgba(25,52,93,.35);padding:14px 16px;animation:xh-bob 6s ease-in-out infinite}
@keyframes xh-bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}#xhero .float--score{top:-72px;right:-22px;display:flex;align-items:center;gap:12px}#xhero .ring{position:relative;width:54px;height:54px}#xhero .ring svg,#xhero .ring img.eeimg{transform:rotate(-90deg)}#xhero .ring circle{fill:none;stroke-width:5}#xhero .ring .bg{stroke:var(--navy-10)}#xhero .ring .fg{stroke:url(#xhRingGrad);stroke-linecap:round;stroke-dasharray:138.2;stroke-dashoffset:138.2;transition:stroke-dashoffset 1.2s cubic-bezier(.2,.7,.2,1)}#xhero .ring b{position:absolute;inset:0;display:grid;place-items:center;font-size:14px;font-weight:800;color:var(--navy)}#xhero .float--score .lbl{font-size:10px;font-weight:800;letter-spacing:.14em;color:var(--navy-55)}#xhero .float--score .who{font-size:13px;font-weight:700;margin-top:2px;color:var(--navy)}#xhero .float--conv{bottom:-90px;left:-26px;animation-delay:1.4s}#xhero .float--conv .num{font-weight:800;font-size:22px;color:var(--orange);letter-spacing:-.02em}#xhero .float--conv .lbl{font-size:11px;font-weight:500;color:var(--navy-55);margin-top:2px}#xhero .spark{display:flex;align-items:flex-end;gap:3px;height:22px;margin-top:8px}#xhero .spark i{width:5px;border-radius:2px;background:linear-gradient(to top,var(--org-25),var(--orange));animation:xh-sp 2.6s ease-in-out infinite}
@keyframes xh-sp{0%,100%{transform:scaleY(.6)}50%{transform:scaleY(1)}}
@media(max-width:1024px){#xhero .hero__in{grid-template-columns:1fr;gap:48px}#xhero .console-wrap{max-width:560px;margin:0 auto}#xhero .hero-film{max-width:640px;margin:0 auto}#xhero .stats{grid-template-columns:repeat(2,1fr);gap:12px;max-width:100%}#xhero .stat:nth-child(odd)+.stat::before{display:none}
}
@media(max-width:560px){#xhero{padding:72px 0 56px}#xhero .pill{flex-wrap:wrap;row-gap:6px;border-radius:14px;padding:9px 14px 9px 10px;font-size:12px;line-height:1.55;max-width:100%}#xhero .pill__ico{width:18px;height:18px}#xhero .pill__new{font-size:9px;padding:3px 7px}#xhero h1{font-size:clamp(34px,9.5vw,44px)}#xhero .hero__type-row{white-space:normal}#xhero .float--score{right:-6px;top:-26px}#xhero .float--conv{left:-6px;bottom:-24px}#xhero .stats{grid-template-columns:repeat(2,1fr);width:100%}#xhero .brand{font-size:12.5px}#xhero .brand small{font-size:8.5px;letter-spacing:.06em;margin-left:5px}
}
@media(prefers-reduced-motion:reduce){#xhero *{animation:none!important;transition:none!important}#xhero .reveal,#xhero .step,#xhero .act{opacity:1;transform:none}#xhero h1 .accent svg path,#xhero h1 .accent img.eeimg path{stroke-dashoffset:0}
}
</style>

<!-- ===================== EE · QUICK TABLE OF CONTENTS (scoped #ee-toc) ===================== -->
<style>/* keep anchored jumps clear of any sticky chrome */
  #xhero,#trusted-institutions,#ee-platform,#ee-products,#ee-vidya-suite,#ee-teams,#ee-solutions,#ee-ind,#stories,#ee-cro,#ee-night,#integrations,#security,#ee-golive,#ee-resources,#ee-events,#faq{scroll-margin-top:86px}#ee-toc{font-family:'Inter',system-ui,-apple-system,sans-serif}#ee-toc button,#ee-toc a{font-family:inherit}/* launcher */
  #ee-toc .eetoc-fab{position:fixed;right:16px;top:50%;transform:translateY(-50%);z-index:99990;
    display:flex;align-items:center;gap:8px;height:46px;padding:0 15px 0 13px;border:0;cursor:pointer;
    background:linear-gradient(135deg,#22406e,#19345d);color:#fff;border-radius:999px;
    box-shadow:0 14px 30px -10px rgba(25,52,93,.55),0 0 0 1px rgba(255,255,255,.06) inset;
    transition:transform .18s ease,box-shadow .18s ease;-webkit-tap-highlight-color:transparent}#ee-toc .eetoc-fab:hover{transform:translateY(-50%) scale(1.04);box-shadow:0 18px 40px -12px rgba(25,52,93,.65)}#ee-toc .eetoc-fab svg,#ee-toc .eetoc-fab img.eeimg{width:18px;height:18px;flex:none}#ee-toc .eetoc-fab-tx{font-size:13px;font-weight:700;letter-spacing:.01em;white-space:nowrap}/* backdrop */
  #ee-toc .eetoc-backdrop{position:fixed;inset:0;z-index:99991;background:rgba(9,21,38,.42);
    opacity:0;visibility:hidden;transition:opacity .25s ease,visibility .25s ease;backdrop-filter:blur(2px)}#ee-toc.open .eetoc-backdrop{opacity:1;visibility:visible}/* panel */
  #ee-toc .eetoc-panel{position:fixed;right:16px;top:50%;transform:translateY(-50%) translateX(14px) scale(.98);
    z-index:99992;width:296px;max-width:calc(100vw - 32px);max-height:80vh;display:flex;flex-direction:column;
    background:#fff;border-radius:18px;border:1px solid #EAEDF3;overflow:hidden;
    box-shadow:0 40px 90px -30px rgba(15,29,50,.5),0 0 0 1px rgba(25,52,93,.04);
    opacity:0;visibility:hidden;pointer-events:none;transition:opacity .24s ease,transform .24s ease,visibility .24s ease}#ee-toc.open .eetoc-panel{opacity:1;visibility:visible;pointer-events:auto;transform:translateY(-50%) translateX(0) scale(1)}#ee-toc .eetoc-head{display:flex;align-items:center;justify-content:space-between;padding:15px 16px 12px;border-bottom:1px solid #F0F2F7}#ee-toc .eetoc-head b{font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#DE6E30}#ee-toc .eetoc-x{width:28px;height:28px;border-radius:50%;border:0;cursor:pointer;background:#F4F6FA;color:#5a6b85;
    font-size:13px;line-height:1;display:flex;align-items:center;justify-content:center;transition:background .2s,color .2s}#ee-toc .eetoc-x:hover{background:#FDEDE2;color:#DE6E30}#ee-toc .eetoc-list{list-style:none;margin:0;padding:8px 8px 4px;overflow-y:auto;overscroll-behavior:contain;-webkit-overflow-scrolling:touch}#ee-toc .eetoc-list::-webkit-scrollbar{width:7px}#ee-toc .eetoc-list::-webkit-scrollbar-thumb{background:#DDE3EC;border-radius:8px}#ee-toc .eetoc-list a{display:flex;align-items:center;gap:11px;padding:9px 11px;border-radius:11px;text-decoration:none;
    color:#22324a;transition:background .16s ease,color .16s ease}#ee-toc .eetoc-list a:hover{background:#F5F7FB}#ee-toc .eetoc-list a i{flex:none;width:22px;font-size:10px;font-weight:700;font-style:normal;color:#aab4c4;
    font-variant-numeric:tabular-nums;letter-spacing:.02em;transition:color .16s ease}#ee-toc .eetoc-list a span{font-size:13px;font-weight:600;line-height:1.3}#ee-toc .eetoc-list a.active{background:linear-gradient(135deg,rgba(222,110,48,.12),rgba(222,110,48,.05));color:#C45A20}#ee-toc .eetoc-list a.active i{color:#DE6E30}#ee-toc .eetoc-cta{margin:8px 12px 14px;display:flex;align-items:center;justify-content:center;gap:8px;
    background:linear-gradient(90deg,#E8843F,#DE6E30);color:#fff;text-decoration:none;font-size:13.5px;font-weight:800;
    padding:12px 16px;border-radius:12px;box-shadow:0 12px 26px -10px rgba(222,110,48,.6);transition:transform .15s ease,box-shadow .15s ease}#ee-toc .eetoc-cta:hover{transform:translateY(-1px);box-shadow:0 16px 32px -10px rgba(222,110,48,.7)}#ee-toc .eetoc-cta svg,#ee-toc .eetoc-cta img.eeimg{width:15px;height:15px}

  @media(max-width:600px){#ee-toc .eetoc-fab{top:auto;bottom:84px;transform:none;height:44px}#ee-toc .eetoc-fab:hover{transform:scale(1.03)}#ee-toc .eetoc-fab-tx{display:none}#ee-toc .eetoc-fab{width:46px;padding:0;justify-content:center}#ee-toc .eetoc-panel{right:12px;left:12px;bottom:14px;top:auto;width:auto;max-width:none;
      transform:translateY(14px) scale(.99);max-height:74vh}#ee-toc.open .eetoc-panel{transform:translateY(0) scale(1)}
  }
  @media(prefers-reduced-motion:reduce){#ee-toc .eetoc-fab,#ee-toc .eetoc-panel,#ee-toc .eetoc-backdrop{transition:none}
  }
</style>
<div id="ee-toc">
  <button type="button" class="eetoc-fab" id="eetocFab" aria-label="Open table of contents" aria-expanded="false" aria-controls="eetocPanel">
    <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/page-icon-01.svg" alt="" loading="lazy" decoding="async">
    <span class="eetoc-fab-tx">Contents</span>
  </button>
  <div class="eetoc-backdrop" id="eetocBackdrop" aria-hidden="true"></div>
  <nav class="eetoc-panel" id="eetocPanel" aria-label="Table of contents">
    <div class="eetoc-head"><b>Jump to section</b><button type="button" class="eetoc-x" id="eetocClose" aria-label="Close table of contents">&#10005;</button></div>
    <ul class="eetoc-list">
      <li><a href="#xhero" data-t="xhero"><i>01</i><span>Top</span></a></li>
      <li><a href="#trusted-institutions" data-t="trusted-institutions"><i>02</i><span>Broad Client Base</span></a></li>
      <li><a href="#why-admissions-leak" data-t="why-admissions-leak"><i>03</i><span>Where admissions leak</span></a></li>
      <li><a href="#feature-pillars" data-t="feature-pillars"><i>04</i><span>Feature pillars</span></a></li>
      <li><a href="#ee-night" data-t="ee-night"><i>05</i><span>The Admission Operating System</span></a></li>
      <li><a href="#ee-platform" data-t="ee-platform"><i>06</i><span>AI Product-Led Experience</span></a></li>
      <li><a href="#ee-products" data-t="ee-products"><i>07</i><span>The admissions platform</span></a></li>
      <li><a href="#ee-vidya-suite" data-t="ee-vidya-suite"><i>08</i><span>Agentic AI Suite</span></a></li>
      <li><a href="#ee-teams" data-t="ee-teams"><i>09</i><span>One platform, every team</span></a></li>
      <li><a href="#ee-solutions" data-t="ee-solutions"><i>10</i><span>Solutions</span></a></li>
      <li><a href="#ee-ind" data-t="ee-ind"><i>11</i><span>Industries</span></a></li>
      <li><a href="#stories" data-t="stories"><i>12</i><span>CRM Impact Stories</span></a></li>
      <li><a href="#ee-cro" data-t="ee-cro"><i>13</i><span>Why teams switch to us</span></a></li>
      <li><a href="#integrations" data-t="integrations"><i>14</i><span>Extensions &amp; Integrations</span></a></li>
      <li><a href="#security" data-t="security"><i>15</i><span>Enterprise-grade trust</span></a></li>
      <li><a href="#ee-golive" data-t="ee-golive"><i>16</i><span>Fast implementation</span></a></li>
      <li><a href="#ee-resources" data-t="ee-resources"><i>17</i><span>Resources</span></a></li>
      <li><a href="#ee-events" data-t="ee-events"><i>18</i><span>Events &amp; Webinars</span></a></li>
      <li><a href="#faq" data-t="faq"><i>19</i><span>Frequently Asked</span></a></li>
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
      <style>#xhero .hero__rot{font-size:clamp(25px,3.4vw,46px)!important;line-height:1.12;letter-spacing:-.03em;min-height:clamp(118px,16vh,200px);transition:opacity .4s cubic-bezier(.2,.7,.2,1),transform .4s cubic-bezier(.2,.7,.2,1);will-change:opacity,transform}#xhero .hero__rot.is-out{opacity:0!important;transform:translateY(14px)!important}#xhero .hero-caret{display:none;width:3px;height:.92em;margin-left:4px;border-radius:2px;background:var(--orange);vertical-align:-1px;animation:heroCaretBlink 1s steps(1) infinite}
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
        <a href="#demo" class="btn btn-primary" id="magnet">Book a Demo <span class="arr">&rarr;</span><span class="shine"></span></a>
        <span class="cta-note">No credit card &middot; Personalised to your institution</span>
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
      #ee-form-7,#ee-form-7 *{box-sizing:border-box!important}#ee-form-7 form{display:block!important;width:100%!important}#ee-form-7 form>div,#ee-form-7 form>div>div{display:block!important;width:100%!important;max-width:100%!important;float:none!important;grid-template-columns:1fr!important;margin-bottom:12px!important}#ee-form-7 h1,#ee-form-7 h2,#ee-form-7 h3,#ee-form-7 h4{line-height:1.2!important;margin:0 0 4px!important;text-align:center!important}#ee-form-7 p{line-height:1.45!important;margin:0 0 14px!important}#ee-form-7 label{display:block!important;float:none!important;width:auto!important;max-width:100%!important;text-align:left!important;color:#19345d!important;font-weight:600!important;font-size:13px!important;margin:0 0 6px!important}#ee-form-7 input[type="text"],#ee-form-7 input[type="email"],#ee-form-7 input[type="tel"],#ee-form-7 input[type="url"],#ee-form-7 input[type="number"],#ee-form-7 select,#ee-form-7 textarea{display:block!important;float:none!important;background-color:#fff!important;color:#19345d!important;border:1px solid #e2e8f0!important;border-radius:10px!important;padding:12px 14px!important;font-size:14px!important;font-family:'Inter',sans-serif!important;width:100%!important;max-width:100%!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s!important}#ee-form-7 input:focus,#ee-form-7 select:focus,#ee-form-7 textarea:focus{outline:none!important;border-color:#DE6E30!important;box-shadow:0 0 0 3px rgba(222,110,48,.12)!important}#ee-form-7 input::placeholder,#ee-form-7 textarea::placeholder{color:#94a2b8!important;opacity:1!important}#ee-form-7 input[type="submit"],#ee-form-7 button[type="submit"]{display:block!important;background-color:#DE6E30!important;color:#fff!important;border:none!important;border-radius:12px!important;padding:14px 28px!important;font-size:15px!important;font-weight:700!important;font-family:'Inter',sans-serif!important;width:100%!important;cursor:pointer!important;transition:all .3s!important;box-shadow:0 8px 20px rgba(222,110,48,.25)!important}#ee-form-7 input[type="submit"]:hover,#ee-form-7 button[type="submit"]:hover{background-color:#c85d20!important;transform:translateY(-2px)!important;box-shadow:0 12px 28px rgba(222,110,48,.35)!important}/* phone field (intl-tel-input) - restored AFTER the block resets so the +91 flag sits correctly */
      /* consent checkbox row - keep the box and its text on one tidy line (mobile friendly) */
      #ee-form-7 input[type="checkbox"]{display:inline-block!important;float:none!important;width:15px!important;height:15px!important;min-width:15px!important;max-width:15px!important;flex:0 0 auto!important;margin:2px 8px 0 0!important;padding:0!important;accent-color:#DE6E30!important;vertical-align:top!important;box-shadow:none!important}
      #ee-form-7 label:has(input[type="checkbox"]),#ee-form-7 div:has(>input[type="checkbox"]),#ee-form-7 p:has(>input[type="checkbox"]){display:flex!important;flex-direction:row!important;align-items:flex-start!important;gap:8px!important;width:100%!important;max-width:100%!important;margin:2px 0 12px!important;font-size:12px!important;font-weight:500!important;line-height:1.55!important;color:#5B6B84!important;text-align:left!important;text-transform:none!important;letter-spacing:0!important}
      #ee-form-7 label:has(input[type="checkbox"]) span,#ee-form-7 label:has(input[type="checkbox"]) p,#ee-form-7 div:has(>input[type="checkbox"]) label,#ee-form-7 div:has(>input[type="checkbox"]) span,#ee-form-7 div:has(>input[type="checkbox"]) p{display:inline!important;float:none!important;width:auto!important;max-width:100%!important;margin:0!important;font-size:12px!important;font-weight:500!important;line-height:1.55!important;color:#5B6B84!important;text-align:left!important}
      #ee-form-7 label:has(input[type="checkbox"]) a,#ee-form-7 div:has(>input[type="checkbox"]) a{color:#DE6E30!important;text-decoration:underline!important;font-weight:600!important}
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
  if(reduce){ var d0=DATA[0]; el.innerHTML=d0.pre+'<span class="accent">'+d0.acc+'</span>'; return; }

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
}#trusted-institutions .logo-header{max-width:780px;margin:0 auto 18px;text-align:center;padding:0 24px}#trusted-institutions .logo-badge{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#DE6E30;background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px;margin-bottom:12px}#trusted-institutions .logo-title{font-family:'Inter',sans-serif;font-weight:800;font-size:clamp(23px,3.4vw,40px);line-height:1.12;letter-spacing:-.02em;color:#19345d;margin:4px 0 10px}#trusted-institutions .logo-sub{font-size:clamp(14.5px,1.6vw,17px);line-height:1.6;color:rgba(25,52,93,.66);max-width:640px;margin:0 auto}#trusted-institutions .logo-sub strong{color:#19345d;font-weight:700}#trusted-institutions .marquee-wrap{overflow:hidden;padding:6px 0;-webkit-mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)}#trusted-institutions .marquee-track{display:flex;gap:26px;width:max-content;align-items:center;will-change:transform}#trusted-institutions .marquee-left{animation:ti-scroll-l 45s linear infinite}#trusted-institutions .marquee-right{animation:ti-scroll-r 45s linear infinite}#trusted-institutions .marquee-wrap:hover .marquee-track{animation-play-state:paused}
@keyframes ti-scroll-l{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@keyframes ti-scroll-r{from{transform:translateX(-50%)}to{transform:translateX(0)}}#trusted-institutions .logo-card{flex:none;width:170px;height:86px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}#trusted-institutions .logo-card:hover{border-color:#DE6E30;transform:translateY(-4px)}#trusted-institutions .logo-card img{max-height:54px;width:auto;object-fit:contain;filter:grayscale(100%);opacity:.7;transition:.3s}#trusted-institutions .logo-card:hover img{filter:none;opacity:1}#trusted-institutions .logo-footer{display:flex;flex-direction:column;align-items:center;gap:13px;margin-top:18px;padding:0 24px;text-align:center}#trusted-institutions .btn-primary{display:inline-flex;align-items:center;gap:8px;background:#DE6E30;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:99px;text-decoration:none;box-shadow:0 8px 24px rgba(222,110,48,.28);transition:.25s}#trusted-institutions .btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 30px rgba(222,110,48,.36)}#trusted-institutions .live-indicator{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:rgba(25,52,93,.7)}#trusted-institutions .green-dot{width:9px;height:9px;border-radius:50%;background:#2263c5;box-shadow:0 0 0 0 rgba(34,99,197,.5);animation:ti-pulse 1.8s infinite}
@keyframes ti-pulse{0%{box-shadow:0 0 0 0 rgba(34,99,197,.5)}70%{box-shadow:0 0 0 9px rgba(34,99,197,0)}100%{box-shadow:0 0 0 0 rgba(34,99,197,0)}}.section-divider{height:1px;background:linear-gradient(90deg,transparent,rgba(25,52,93,.12),transparent);max-width:1240px;margin:0 auto}

@media (prefers-reduced-motion:reduce){#trusted-institutions .marquee-track,#trusted-institutions .green-dot{animation:none}}
@media (max-width:600px){#trusted-institutions .logo-card{width:132px;height:72px;padding:12px}#trusted-institutions .logo-card img{max-height:44px}}
</style>
<!-- ═══ LOGO MARQUEE ═══ -->

<!-- ===================== EXTRAAEDGE PLATFORM · live interactive demo ===================== -->
<style>#ee-platform{position:relative;padding:clamp(64px,8vw,104px) 0;background:linear-gradient(180deg,#ffffff,#f5f8fc);overflow:hidden;font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased}#ee-platform .eep-wrap{max-width:1280px;margin:0 auto;padding:0 24px}#ee-platform .eep-head{max-width:760px;margin:0 auto clamp(28px,4vw,46px);text-align:center}#ee-platform .eep-eyebrow{display:inline-flex;align-items:center;gap:8px;font:700 12px/1 'Inter';letter-spacing:.14em;text-transform:uppercase;color:#19345d;background:rgba(255,255,255,.75);border:1px solid rgba(25,52,93,.1);border-radius:999px;padding:8px 15px;box-shadow:0 4px 14px rgba(25,52,93,.06)}#ee-platform .eep-eyebrow i{width:7px;height:7px;border-radius:50%;background:#DE6E30;box-shadow:0 0 0 4px rgba(222,110,48,.18)}#ee-platform .eep-head h2{font-weight:800;font-size:clamp(28px,4.2vw,46px);line-height:1.08;letter-spacing:-.03em;color:#19345d;margin:18px 0 12px}#ee-platform .eep-head p{font-size:clamp(15px,1.7vw,18px);line-height:1.6;color:#5a6b85;margin:0}#ee-platform .eep-window{position:relative;border-radius:16px;overflow:hidden;background:#fff;border:1px solid rgba(25,52,93,.12);box-shadow:0 44px 96px -34px rgba(25,52,93,.4),0 0 0 1px rgba(25,52,93,.04)}#ee-platform .eep-bar{display:flex;align-items:center;gap:8px;padding:11px 16px;background:#f1f3f7;border-bottom:1px solid rgba(25,52,93,.1)}#ee-platform .eep-bar .d{width:11px;height:11px;border-radius:50%;display:block}#ee-platform .eep-bar .d.r{background:#ec9c5e}#ee-platform .eep-bar .d.y{background:#f4964f}#ee-platform .eep-bar .d.g{background:#5481c4}#ee-platform .eep-bar .eep-url{margin:0 auto;font-size:12px;font-weight:600;color:#8a95a6;background:#fff;border:1px solid rgba(25,52,93,.08);border-radius:7px;padding:4px 16px}#ee-platform .eep-frame{display:block;width:100%;height:min(80vh,780px);border:0;background:#f4f5f7}
  @media(max-width:860px){#ee-platform .eep-frame{height:min(82vh,680px)}#ee-platform .eep-bar .eep-url{display:none}}#ee-platform .eep-cta{margin:clamp(26px,4vw,40px) auto 0;display:flex;flex-direction:column;align-items:center;gap:12px;text-align:center}#ee-platform .eep-cta-t{font-size:clamp(17px,2vw,21px);font-weight:700;color:#19345d;margin:0;line-height:1.4}#ee-platform .eep-cta-t strong{color:#DE6E30}#ee-platform .eep-cta-btn{display:inline-flex;align-items:center;gap:9px;background:#DE6E30;color:#fff;font-weight:700;font-size:16px;padding:15px 30px;border-radius:999px;box-shadow:0 14px 30px -10px rgba(222,110,48,.6);transition:transform .2s ease,box-shadow .2s ease}#ee-platform .eep-cta-btn svg,#ee-platform .eep-cta-btn img.eeimg{width:18px;height:18px;transition:transform .2s ease}#ee-platform .eep-cta-btn:hover{transform:translateY(-2px);box-shadow:0 20px 38px -10px rgba(222,110,48,.7)}#ee-platform .eep-cta-btn:hover svg,#ee-platform .eep-cta-btn:hover img.eeimg{transform:translateX(4px)}#ee-platform .eep-cta-sub{font-size:13px;font-weight:600;color:#7a889e}
  @media(max-width:560px){#ee-platform{padding:46px 0 54px}#ee-platform .eep-wrap{padding:0 14px}#ee-platform .eep-window{border-radius:12px}#ee-platform .eep-cta-btn{width:100%;justify-content:center}}
</style>


<section class="logo-section" id="trusted-institutions" aria-label="Trusted Institutions">
  <div class="logo-header reveal">
    <div class="logo-badge">Broad Client Base</div>
    <h2 class="logo-title" style="font-family:var(--font-h);font-weight:800;font-size:clamp(1.5rem,3.2vw,2.2rem);color:var(--blue);line-height:1.18;letter-spacing:-.02em;margin:6px 0 12px">Trusted by 500+ educational institutions across India</h2>
    <p class="logo-sub" style="max-width:760px;margin:0 auto 18px;color:#5a6b85;font-size:clamp(.95rem,1.6vw,1.05rem);line-height:1.6">ExtraaEdge powers <strong>5M+ student leads</strong> and <strong>100M+ student interactions</strong>, enabling universities, colleges, and EdTech organizations to accelerate admissions with AI-powered CRM and intelligent automation.</p>
  </div>
  <div class="marquee-wrap">
    <div class="marquee-track marquee-left">
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp" alt="XISS uses ExtraaEdge Higher Education CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg" alt="Institution using student enrollment CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png" alt="Anant National University admissions CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp" alt="SR University lead management for colleges" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp" alt="Hamstek higher education CRM software" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp" alt="Adani University admission CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp" alt="Techno India Group CRM for educational institutions" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp" alt="Institution higher education CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp" alt="XISS uses ExtraaEdge Higher Education CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg" alt="Institution using student enrollment CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png" alt="Anant National University admissions CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp" alt="SR University lead management for colleges" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp" alt="Hamstek higher education CRM software" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp" alt="Adani University admission CRM" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp" alt="Techno India Group CRM for educational institutions" loading="lazy"></div>
      <div class="logo-card"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp" alt="Institution higher education CRM" loading="lazy"></div>
    </div>
    <div class="marquee-track marquee-right" style="margin-top:16px">
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
  <div style="text-align:center;margin-top:26px">
    <a href="#demo" style="display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:.95rem;color:#19345d;border:1.5px solid rgba(25,52,93,.18);background:#fff;border-radius:999px;padding:11px 24px;text-decoration:none;transition:all .2s ease" onmouseover="this.style.borderColor='#DE6E30';this.style.color='#DE6E30'" onmouseout="this.style.borderColor='rgba(25,52,93,.18)';this.style.color='#19345d'">View More Clients <span aria-hidden="true">&rarr;</span></a>
  </div>
</section>


<!-- STORY 1 · THE REAL PROBLEM -->
<!-- ================= The Real Problem - The Admissions Narrative (scoped .tan-*) ================= -->
<section id="why-admissions-leak" class="tan-sec" aria-labelledby="tan-h">
<style id="ee-tan">
  #why-admissions-leak.tan-sec{--nv:#19335D;--or:#DE6E30;--mut:#5B6B84;--ink:#2B3A52;--line:#E4E9F1;--soft:#F7F9FC;
    background:#fff;color:var(--ink);font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;overflow-x:clip}
  #why-admissions-leak.tan-sec *{box-sizing:border-box;margin:0;padding:0}
  #why-admissions-leak .tan-hero{max-width:760px;margin:0 auto;text-align:center;padding:8px 24px clamp(22px,4vw,38px)}
  #why-admissions-leak .tan-eyebrow{color:var(--or);font-weight:800;letter-spacing:.14em;text-transform:uppercase;font-size:12px;margin-bottom:14px}
  #why-admissions-leak .tan-title{font-weight:800;color:var(--nv);font-size:clamp(26px,3.6vw,40px);line-height:1.18;letter-spacing:-.02em;margin-bottom:14px;min-height:1.2em}
  #why-admissions-leak .tan-caret{color:var(--or);animation:tanBlink 1s steps(1) infinite;font-weight:400}
  @keyframes tanBlink{50%{opacity:0}}
  #why-admissions-leak .tan-lead{font-size:clamp(15px,1.6vw,17px);color:var(--mut);max-width:600px;margin:0 auto;line-height:1.65;font-weight:500}
  #why-admissions-leak .tan-main{max-width:1100px;margin:0 auto;padding:clamp(6px,2vw,18px) 24px clamp(22px,4vw,40px)}
  #why-admissions-leak .tan-row{display:grid;grid-template-columns:4fr 8fr;gap:clamp(22px,3vw,40px);align-items:start;margin-bottom:clamp(26px,4vw,52px)}
  #why-admissions-leak .tan-side{position:sticky;top:100px;align-self:flex-start}
  #why-admissions-leak .tan-bar{width:52px;height:3px;background:var(--or);margin-bottom:16px;border-radius:2px}
  #why-admissions-leak .tan-h3{font-size:clamp(19px,2.2vw,24px);font-weight:800;color:var(--nv);letter-spacing:-.01em}
  #why-admissions-leak .tan-side-sub{color:var(--mut);margin-top:6px;font-weight:600;font-size:13.5px}
  #why-admissions-leak .tan-bento{background:#fff;border:1px solid var(--line);border-radius:22px;padding:clamp(18px,2.4vw,28px);box-shadow:0 14px 40px -26px rgba(25,51,93,.28);transition:border-color .4s,box-shadow .4s}
  #why-admissions-leak .tan-bento:hover{border-color:rgba(222,110,48,.28);box-shadow:0 26px 56px -28px rgba(25,51,93,.35)}
  #why-admissions-leak .tan-grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  #why-admissions-leak .tan-col2{grid-column:1 / -1}
  #why-admissions-leak .tan-panel{border-radius:16px;padding:clamp(16px,2vw,22px)}
  #why-admissions-leak .tan-soft{background:var(--soft);border:1px solid var(--line)}
  #why-admissions-leak .tan-white{background:#fff;border:1px solid var(--line);transition:background .3s}
  #why-admissions-leak .tan-white:hover{background:var(--soft)}
  #why-admissions-leak .tan-navy{background:var(--nv);color:#fff}
  #why-admissions-leak .tan-klabel{color:var(--or);font-weight:800;font-size:11px;text-transform:uppercase;letter-spacing:.12em;margin-bottom:8px}
  #why-admissions-leak .tan-chal{color:var(--ink);font-size:14.5px;line-height:1.6}
  #why-admissions-leak .tan-cap{font-size:12.5px;font-weight:600;margin-bottom:6px}
  #why-admissions-leak .tan-cap.op{color:rgba(255,255,255,.78)}
  #why-admissions-leak .tan-cap.mut{color:var(--mut)}
  #why-admissions-leak .tan-big{font-size:clamp(17px,1.8vw,20px);font-weight:800}
  #why-admissions-leak .tan-big.nv{color:var(--nv)}
  #why-admissions-leak .tan-note{margin-top:7px;font-size:13px;line-height:1.5}
  #why-admissions-leak .tan-note.lt{color:rgba(255,255,255,.72)}
  #why-admissions-leak .tan-note.mut{color:var(--mut)}
  #why-admissions-leak .tan-h5{color:var(--nv);font-weight:800;font-size:16px;margin-bottom:6px}
  #why-admissions-leak .tan-sm{font-size:13.5px;color:var(--mut);line-height:1.55}
  #why-admissions-leak .tan-quotewrap{background:var(--nv);color:#fff;padding:clamp(20px,3vw,32px);border-radius:16px;box-shadow:0 20px 44px -22px rgba(25,51,93,.5)}
  #why-admissions-leak .tan-quotewrap h4{font-weight:800;font-size:clamp(18px,2vw,22px);margin-bottom:12px}
  #why-admissions-leak .tan-quote{color:rgba(255,255,255,.86);font-style:italic;line-height:1.6;font-size:14.5px;margin-bottom:20px}
  #why-admissions-leak .tan-pills{display:flex;flex-wrap:wrap;gap:10px}
  #why-admissions-leak .tan-pill{padding:8px 16px;border-radius:999px;font-size:10.5px;font-weight:800;text-transform:uppercase;letter-spacing:.06em}
  #why-admissions-leak .tan-pill.or{background:var(--or);color:#fff}
  #why-admissions-leak .tan-pill.gh{background:rgba(255,255,255,.12);color:rgba(255,255,255,.85)}
  #why-admissions-leak .tan-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:18px}
  #why-admissions-leak .tan-stat{padding:clamp(14px,1.8vw,20px);background:var(--soft);border:1px solid var(--line);border-radius:16px;text-align:center}
  #why-admissions-leak .tan-stat b{display:block;color:var(--or);font-size:clamp(24px,3vw,34px);font-weight:800;line-height:1}
  #why-admissions-leak .tan-stat span{display:block;font-size:10.5px;color:var(--mut);font-weight:700;text-transform:uppercase;letter-spacing:.1em;margin-top:7px}
  #why-admissions-leak .tan-closer{color:var(--mut);text-align:center;font-style:italic;line-height:1.6;font-size:14px}
  #why-admissions-leak .reveal-node{opacity:0;transform:translateY(30px);transition:opacity .8s cubic-bezier(.16,1,.3,1),transform .8s cubic-bezier(.16,1,.3,1)}
  #why-admissions-leak .reveal-node.is-visible{opacity:1;transform:none}
  @media(max-width:820px){
    #why-admissions-leak .tan-row{grid-template-columns:1fr;gap:12px;margin-bottom:clamp(18px,5vw,28px)}
    #why-admissions-leak .tan-side{position:static;top:auto}
    #why-admissions-leak .tan-bar{margin-bottom:10px;width:40px}
    #why-admissions-leak .tan-grid2{grid-template-columns:1fr;gap:8px}
    #why-admissions-leak .tan-stats{grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:12px}
    /* compact boxes on phones - all info visible without oversized cards */
    #why-admissions-leak .tan-hero{padding:4px 18px 18px}
    #why-admissions-leak .tan-title{font-size:clamp(22px,6.4vw,28px);margin-bottom:10px}
    #why-admissions-leak .tan-lead{font-size:13.5px;line-height:1.6}
    #why-admissions-leak .tan-eyebrow{font-size:11px;margin-bottom:10px}
    #why-admissions-leak .tan-main{padding:4px 16px 20px}
    #why-admissions-leak .tan-h3{font-size:17px}
    #why-admissions-leak .tan-side-sub{font-size:12px;margin-top:3px}
    #why-admissions-leak .tan-bento{padding:12px;border-radius:16px}
    #why-admissions-leak .tan-panel{padding:13px 14px;border-radius:12px}
    #why-admissions-leak .tan-klabel{font-size:10px;margin-bottom:6px}
    #why-admissions-leak .tan-chal{font-size:13px;line-height:1.55}
    #why-admissions-leak .tan-cap{font-size:11.5px;margin-bottom:4px}
    #why-admissions-leak .tan-big{font-size:15.5px}
    #why-admissions-leak .tan-note{font-size:12px;margin-top:5px}
    #why-admissions-leak .tan-h5{font-size:14.5px;margin-bottom:4px}
    #why-admissions-leak .tan-sm{font-size:12.5px}
    #why-admissions-leak .tan-quotewrap{padding:16px;border-radius:12px}
    #why-admissions-leak .tan-quotewrap h4{font-size:16px;margin-bottom:8px}
    #why-admissions-leak .tan-quote{font-size:13px;margin-bottom:14px}
    #why-admissions-leak .tan-pill{padding:6px 12px;font-size:9.5px}
    #why-admissions-leak .tan-stat{padding:10px 8px;border-radius:12px}
    #why-admissions-leak .tan-stat b{font-size:21px}
    #why-admissions-leak .tan-stat span{font-size:9px;margin-top:5px}
    #why-admissions-leak .tan-closer{font-size:12.5px}
  }
  @media(prefers-reduced-motion:reduce){#why-admissions-leak .reveal-node{opacity:1!important;transform:none!important}#why-admissions-leak .tan-caret{animation:none}}
</style>

  <div class="tan-hero">
    <div class="tan-hero-in">
      <p class="tan-eyebrow">The Admission Funnel Leak</p>
      <h2 class="tan-title" id="tan-h"><span id="tanType"></span><span class="tan-caret" aria-hidden="true">|</span></h2>
      <p class="tan-lead">Admissions aren&rsquo;t lost at the marketing top-of-funnel; they evaporate in the gap between enquiry and engagement.</p>
    </div>
  </div>

  <div class="tan-main">

    <section class="tan-row reveal-node">
      <div class="tan-side">
        <div class="tan-bar"></div>
        <h3 class="tan-h3">Scattered Chaos</h3>
        <p class="tan-side-sub">The Operational Tax</p>
      </div>
      <div class="tan-bento tan-grid2">
        <div class="tan-panel tan-soft tan-col2">
          <h4 class="tan-klabel">The Operational Challenge</h4>
          <p class="tan-chal">Leads are fragmented across 10+ disparate sources. Without a single source of truth, teams rely on manual spreadsheet data entry, creating an &ldquo;operational tax&rdquo; that slows response times to a crawl.</p>
        </div>
        <div class="tan-panel tan-navy">
          <p class="tan-cap op">Automated Capture</p>
          <p class="tan-big">10+ Source Integration</p>
          <p class="tan-note lt">Unified digital inbox ensures no lead is left behind.</p>
        </div>
        <div class="tan-panel tan-white">
          <p class="tan-cap mut">Conflict Resolution</p>
          <p class="tan-big nv">Real-time Deduplication</p>
          <p class="tan-note mut">Prevents lead collisions and maintains clean data integrity.</p>
        </div>
      </div>
    </section>

    <section class="tan-row reveal-node">
      <div class="tan-side">
        <div class="tan-bar"></div>
        <h3 class="tan-h3">Latency Trap</h3>
        <p class="tan-side-sub">Speed-to-Lead Gap</p>
      </div>
      <div class="tan-bento tan-grid2">
        <div class="tan-panel tan-soft tan-col2">
          <h4 class="tan-klabel">The Strategic Challenge</h4>
          <p class="tan-chal">Prospects apply to multiple institutions simultaneously. Research confirms that response time is the #1 predictor of conversion. A slow follow-up means your prospect is already in a conversation with your competitor.</p>
        </div>
        <div class="tan-panel tan-white">
          <h5 class="tan-h5">Instant Activation</h5>
          <p class="tan-sm">Triggered WhatsApp and email replies fire within milliseconds of lead arrival, capturing attention at the peak of interest.</p>
        </div>
        <div class="tan-panel tan-white">
          <h5 class="tan-h5">AI Continuity</h5>
          <p class="tan-sm">24&times;7 intelligent bot qualification ensures zero gaps in conversation coverage, even outside office hours.</p>
        </div>
      </div>
    </section>

    <section class="tan-row reveal-node">
      <div class="tan-side">
        <div class="tan-bar"></div>
        <h3 class="tan-h3">Counselor Fatigue</h3>
        <p class="tan-side-sub">Workload Inefficiency</p>
      </div>
      <div class="tan-bento">
        <h4 class="tan-klabel">The ExtraaEdge Strategy</h4>
        <div class="tan-quotewrap" style="margin-top:16px">
          <h4>AI-Prioritized Focus</h4>
          <p class="tan-quote">&ldquo;Stop the spray-and-pray approach. Our predictive AI ranks leads by intent, providing a Next-Best-Action worklist that tells your team exactly who to call, ensuring your best assets speak to your most promising prospects.&rdquo;</p>
          <div class="tan-pills">
            <span class="tan-pill or">Predictive Scoring</span>
            <span class="tan-pill gh">Worklist Automation</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tan-row reveal-node">
      <div class="tan-side">
        <div class="tan-bar"></div>
        <h3 class="tan-h3">Blind Spots</h3>
        <p class="tan-side-sub">Attribution Intelligence</p>
      </div>
      <div class="tan-bento">
        <h4 class="tan-klabel" style="margin-bottom:26px">The CFO&rsquo;s Dashboard</h4>
        <div class="tan-stats">
          <div class="tan-stat"><b>50+</b><span>Ready Reports</span></div>
          <div class="tan-stat"><b>100%</b><span>Attribution</span></div>
          <div class="tan-stat"><b>ROI</b><span>Predictability</span></div>
        </div>
        <p class="tan-closer">&ldquo;Gain full, granular visibility into which marketing channels actually drive enrollment vs. those that just generate low-intent clicks.&rdquo;</p>
      </div>
    </section>

  </div>
</section>
<script>
(function(){
  var root=document.getElementById('why-admissions-leak'); if(!root) return;
  var el=document.getElementById('tanType');
  var txt='Good enquiries quietly slip away.';
  var started=false;
  var RM=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function typeStart(){ if(started||!el) return; started=true;
    if(RM){ el.textContent=txt; return; }
    var i=0; (function t(){ if(i<txt.length){ el.textContent+=txt.charAt(i++); setTimeout(t,70); } })();
  }
  function fillNow(){ if(!started&&el){ started=true; el.textContent=txt; } }
  if('IntersectionObserver' in window){
    if(el){ var hero=root.querySelector('.tan-hero');
      var to=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)typeStart();});},{threshold:.4});
      to.observe(hero);
    }
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('is-visible');fillNow();io.unobserve(e.target);}});},{threshold:.15});
    [].slice.call(root.querySelectorAll('.reveal-node')).forEach(function(n){io.observe(n);});
  } else {
    if(el) el.textContent=txt;
    [].slice.call(root.querySelectorAll('.reveal-node')).forEach(function(n){n.classList.add('is-visible');});
  }
})();
</script>


<!-- STORY 2 · BUILT FOR ADMISSION TEAMS — Admission Intelligence horizontal scrollytelling (scoped .flw-*) -->
<section id="feature-pillars" class="flw-sec" aria-labelledby="flw-h">
<style id="ee-flw">
  #feature-pillars.flw-sec{--nv:#19335D;--nvd:#10233F;--or:#DE6E30;--or2:#E8843F;--ink:#2B3A52;--mut:#5B6B84;--line:#E4E9F1;--soft:#F7F9FC;--grn:#1E9E6A;
    position:relative;background:#fff;color:var(--ink);
    font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;overflow-x:clip;
    padding:clamp(40px,5vw,64px) 0 0}
  #feature-pillars.flw-sec *{box-sizing:border-box;margin:0;padding:0}
  #feature-pillars .flw-wrap{position:relative;max-width:1060px;margin:0 auto;padding:0 24px}
  /* header (scrolls away normally, then the cards pin) */
  #feature-pillars .flw-head{max-width:760px;margin-bottom:clamp(10px,1.6vw,18px)}
  #feature-pillars .flw-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--or)}
  #feature-pillars .flw-eyebrow::before{content:"";width:26px;height:2px;background:var(--or);border-radius:2px}
  #feature-pillars .flw-h2{font-weight:800;font-size:clamp(26px,3.4vw,38px);line-height:1.16;letter-spacing:-.02em;color:var(--nv);margin-top:14px}
  #feature-pillars .flw-h2 em{font-style:normal;color:var(--or)}
  #feature-pillars .flw-sub{font-size:clamp(15px,1.6vw,17px);line-height:1.65;color:var(--mut);margin-top:14px;max-width:640px}
  #feature-pillars .flw-status{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-top:16px}
  #feature-pillars .flw-syslabel{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--nv);background:rgba(25,51,93,.06);border:1px solid rgba(25,51,93,.12);border-radius:999px;padding:7px 14px}
  #feature-pillars .flw-monitor{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--grn);background:rgba(30,158,106,.08);border:1px solid rgba(30,158,106,.25);border-radius:999px;padding:7px 14px}
  #feature-pillars .flw-monitor i{width:7px;height:7px;border-radius:50%;background:#2BC98A;animation:flwPulse 1.8s ease-out infinite}
  @keyframes flwPulse{0%{box-shadow:0 0 0 0 rgba(43,201,138,.55)}70%{box-shadow:0 0 0 8px rgba(43,201,138,0)}100%{box-shadow:0 0 0 0 rgba(43,201,138,0)}}
  /* ---- default / fallback: native swipe rail ---- */
  #feature-pillars .flw-track{position:relative}
  #feature-pillars .flw-pin{padding:0 0 12px}
  #feature-pillars .flw-row{display:flex;gap:clamp(14px,1.8vw,22px);align-items:stretch;overflow-x:auto;
    scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;scrollbar-width:none;
    padding:6px max(24px,calc((100vw - 1060px)/2 + 24px)) 16px}
  #feature-pillars .flw-row::-webkit-scrollbar{display:none}
  /* ---- pinned scrollytelling mode (JS adds .flw-on): page scroll slides the boxes sideways ---- */
  /* pin hugs its content - no viewport-height centering, so no dead space above/below the card */
  #feature-pillars.flw-on .flw-pin{position:sticky;top:90px;height:auto;
    display:flex;flex-direction:column;justify-content:flex-start;overflow:hidden;padding:4px 0 8px}
  #feature-pillars.flw-on .flw-row{overflow:visible;scroll-snap-type:none;will-change:transform;padding-bottom:0;
    transition:transform .6s cubic-bezier(.2,.7,.2,1)}
  /* one box in focus at a time - the rest blur out */
  #feature-pillars.flw-on .flw-card{transition:filter .5s ease,opacity .5s ease,transform .5s cubic-bezier(.2,.7,.2,1),border-color .4s,box-shadow .4s}
  #feature-pillars.flw-on .flw-card:not(.on){filter:blur(3px);opacity:.42;transform:scale(.94);pointer-events:none}
  #feature-pillars.flw-on .flw-card.on{border-color:rgba(222,110,48,.32);box-shadow:0 26px 56px -28px rgba(25,51,93,.38)}
  /* stage card */
  #feature-pillars .flw-card{position:relative;flex:0 0 min(86vw,470px);scroll-snap-align:center;
    background:#fff;border:1px solid var(--line);border-radius:20px;padding:clamp(18px,2.2vw,26px);
    box-shadow:0 14px 40px -26px rgba(25,51,93,.3);transition:border-color .4s,box-shadow .4s}
  #feature-pillars .flw-card:hover{border-color:rgba(222,110,48,.32);box-shadow:0 26px 56px -28px rgba(25,51,93,.38)}
  #feature-pillars .flw-chead{display:flex;align-items:center;gap:12px;margin-bottom:12px}
  #feature-pillars .flw-node{flex:0 0 auto;width:40px;height:40px;border-radius:50%;display:grid;place-items:center;
    font-weight:800;font-size:14px;color:#fff;background:linear-gradient(150deg,var(--or2),var(--or));
    box-shadow:0 10px 22px -8px rgba(222,110,48,.65)}
  #feature-pillars .flw-title{font-weight:800;font-size:clamp(17px,2vw,21px);line-height:1.25;letter-spacing:-.01em;color:var(--nv)}
  #feature-pillars .flw-insight{background:var(--soft);border:1px solid var(--line);border-radius:14px;padding:12px 14px;margin-bottom:12px}
  #feature-pillars .flw-klabel{display:block;font-size:10px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--or);margin-bottom:6px}
  #feature-pillars .flw-desc{font-size:12.5px;line-height:1.6;color:var(--ink);font-style:italic;border-left:2px solid var(--or);padding-left:11px}
  /* input -> AI -> output stack */
  #feature-pillars .flw-io{display:flex;flex-direction:column;gap:5px}
  #feature-pillars .flw-box{border-radius:11px;padding:9px 13px;min-width:0}
  #feature-pillars .flw-box span{display:block;font-size:9.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:3px}
  #feature-pillars .flw-box b{display:block;font-size:13px;font-weight:700;line-height:1.3}
  #feature-pillars .flw-box.in{background:rgba(25,51,93,.05);border:1px solid rgba(25,51,93,.12)}
  #feature-pillars .flw-box.in span{color:var(--mut)}
  #feature-pillars .flw-box.in b{color:var(--nv)}
  #feature-pillars .flw-box.ai{background:rgba(222,110,48,.06);border:1px solid rgba(222,110,48,.28)}
  #feature-pillars .flw-box.ai span{color:var(--or)}
  #feature-pillars .flw-box.ai b{color:var(--nv)}
  #feature-pillars .flw-box.out{background:rgba(30,158,106,.06);border:1px solid rgba(30,158,106,.25)}
  #feature-pillars .flw-box.out span{color:var(--grn)}
  #feature-pillars .flw-box.out b{color:var(--nv)}
  #feature-pillars .flw-arr{align-self:center;color:var(--or);line-height:0}
  #feature-pillars .flw-arr svg{width:14px;height:14px;display:block}
  /* progress dots */
  #feature-pillars .flw-dots{display:flex;gap:9px;justify-content:center;align-items:center;padding:12px 0 6px}
  #feature-pillars .flw-dot{width:9px;height:9px;border-radius:50%;background:var(--line);transition:transform .3s,background .3s,box-shadow .3s}
  #feature-pillars .flw-dot.on{background:var(--or);transform:scale(1.35);box-shadow:0 0 0 4px rgba(222,110,48,.16)}
  #feature-pillars .flw-hint{display:none;text-align:center;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--mut);padding-bottom:18px}
  #feature-pillars:not(.flw-on) .flw-hint{display:block}
  /* desktop: bigger boxes that fill the pinned viewport */
  @media(min-width:900px){
    #feature-pillars.flw-on .flw-pin{height:calc(100vh - 90px);height:calc(100svh - 90px);justify-content:center;padding:0}
    #feature-pillars .flw-card{flex-basis:min(58vw,660px);padding:28px 32px;border-radius:24px}
    #feature-pillars .flw-chead{gap:14px;margin-bottom:16px}
    #feature-pillars .flw-node{width:48px;height:48px;font-size:16px}
    #feature-pillars .flw-title{font-size:26px}
    #feature-pillars .flw-insight{padding:18px 20px;margin-bottom:16px}
    #feature-pillars .flw-klabel{font-size:11px;margin-bottom:8px}
    #feature-pillars .flw-desc{font-size:15px;line-height:1.65;padding-left:14px}
    #feature-pillars .flw-io{gap:7px}
    #feature-pillars .flw-box{padding:14px 18px;border-radius:13px}
    #feature-pillars .flw-box span{font-size:10.5px;margin-bottom:5px}
    #feature-pillars .flw-box b{font-size:15.5px}
    #feature-pillars .flw-arr svg{width:16px;height:16px}
    #feature-pillars .flw-dots{padding:16px 0 0}
  }
  @media(max-width:760px){
    #feature-pillars.flw-on .flw-pin{top:72px}
    #feature-pillars .flw-card{flex-basis:84vw;padding:15px 14px;border-radius:16px}
    #feature-pillars .flw-node{width:32px;height:32px;font-size:12px}
    #feature-pillars .flw-title{font-size:16px}
    #feature-pillars .flw-desc{font-size:12px}
    #feature-pillars .flw-box b{font-size:12px}
    #feature-pillars .flw-status{gap:8px;margin-top:12px}
    #feature-pillars .flw-syslabel,#feature-pillars .flw-monitor{font-size:9.5px;padding:6px 11px}
    #feature-pillars .flw-row{padding-left:18px;padding-right:18px}
  }
  @media(prefers-reduced-motion:reduce){
    #feature-pillars .flw-monitor i{animation:none}
    #feature-pillars .flw-card{transition:none}
  }
</style>
  <div class="flw-wrap flw-head">
    <span class="flw-eyebrow">Built For Admission Teams</span>
    <h2 class="flw-h2" id="flw-h">Admission Intelligence: <em>The Definite Enrollment Pipeline</em></h2>
    <p class="flw-sub">A fully automated, AI-driven engine designed to turn raw inquiry data into high-intent enrollments with surgical precision.</p>
    <div class="flw-status">
      <span class="flw-syslabel">System Workflow</span>
      <span class="flw-monitor"><i aria-hidden="true"></i>Active Pipeline Monitor</span>
    </div>
  </div>

  <div class="flw-track" id="flwTrack">
    <div class="flw-pin">
      <div class="flw-row" id="flwRow">

        <article class="flw-card">
          <div class="flw-chead"><span class="flw-node" aria-hidden="true">01</span><h3 class="flw-title">Lead Ingestion</h3></div>
          <div class="flw-insight">
            <span class="flw-klabel">Strategic Insight</span>
            <p class="flw-desc">We centralize your entire ecosystem. By normalizing data schemas across 50+ channels, we eliminate data silos. This ensures every prospect, regardless of origin, is immediately formatted, deduplicated, and ready for action.</p>
          </div>
          <div class="flw-io">
            <div class="flw-box in"><span>Primary Input Data</span><b>Omni-channel API Gateways</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box ai"><span>AI Processing Engine</span><b>Data Normalization &amp; Deduplication</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box out"><span>Finalized Output</span><b>Verified Prospect Record</b></div>
          </div>
        </article>

        <article class="flw-card">
          <div class="flw-chead"><span class="flw-node" aria-hidden="true">02</span><h3 class="flw-title">Smart Engagement</h3></div>
          <div class="flw-insight">
            <span class="flw-klabel">Strategic Insight</span>
            <p class="flw-desc">Generic outreach is a cost, not an asset. Our system analyzes user behavior to trigger context-aware communication. Whether via WhatsApp, SMS, or Email, the message aligns perfectly with the prospect&rsquo;s current intent.</p>
          </div>
          <div class="flw-io">
            <div class="flw-box in"><span>Primary Input Data</span><b>User Behavior Signals</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box ai"><span>AI Processing Engine</span><b>Adaptive Engagement Logic</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box out"><span>Finalized Output</span><b>High-Intent Dialogue</b></div>
          </div>
        </article>

        <article class="flw-card">
          <div class="flw-chead"><span class="flw-node" aria-hidden="true">03</span><h3 class="flw-title">AI Prioritization</h3></div>
          <div class="flw-insight">
            <span class="flw-klabel">Strategic Insight</span>
            <p class="flw-desc">Your counselors should spend time closing, not sorting. We apply behavioral scoring models that analyze thousands of data points to predict who is most likely to enroll. This focuses your best human assets where they matter most.</p>
          </div>
          <div class="flw-io">
            <div class="flw-box in"><span>Primary Input Data</span><b>Interaction History</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box ai"><span>AI Processing Engine</span><b>Predictive Scoring Models</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box out"><span>Finalized Output</span><b>Weighted Priority Queue</b></div>
          </div>
        </article>

        <article class="flw-card">
          <div class="flw-chead"><span class="flw-node" aria-hidden="true">04</span><h3 class="flw-title">Funnel Analytics</h3></div>
          <div class="flw-insight">
            <span class="flw-klabel">Strategic Insight</span>
            <p class="flw-desc">Decision-making requires clarity. We provide predictive forecasting on your pipeline health. Identify bottlenecks before they impact your enrollment targets and optimize your recruitment spend with verifiable ROI data.</p>
          </div>
          <div class="flw-io">
            <div class="flw-box in"><span>Primary Input Data</span><b>Pipeline/Conversion Logs</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box ai"><span>AI Processing Engine</span><b>Predictive ROI Analytics</b></div>
            <span class="flw-arr" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M6 13l6 6 6-6"/></svg></span>
            <div class="flw-box out"><span>Finalized Output</span><b>Actionable Strategic Roadmap</b></div>
          </div>
        </article>

      </div>
      <div class="flw-dots" aria-hidden="true">
        <span class="flw-dot on"></span><span class="flw-dot"></span><span class="flw-dot"></span><span class="flw-dot"></span>
      </div>
    </div>
  </div>
  <p class="flw-hint" aria-hidden="true">Swipe to explore &rarr;</p>
</section>
<script>
(function(){
  var root=document.getElementById('feature-pillars'); if(!root) return;
  var track=document.getElementById('flwTrack'), pin=root.querySelector('.flw-pin'), row=document.getElementById('flwRow');
  var dots=[].slice.call(root.querySelectorAll('.flw-dot'));
  var RM=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if(RM||!track||!pin||!row) return;          /* fallback stays a native swipe rail */
  root.classList.add('flw-on');
  var cards=[].slice.call(row.querySelectorAll('.flw-card'));
  var N=cards.length, dist=0, xs=[], cur=-1, tick=false;
  function measure(){
    /* end padding so the first AND last card can sit exactly mid-screen */
    var pad=Math.max(18,(pin.clientWidth-cards[0].offsetWidth)/2);
    row.style.paddingLeft=pad+'px'; row.style.paddingRight=pad+'px';
    /* x offset that centers each card in the pinned viewport
       (scrollWidth is unreliable with overflow:visible, so the travel
       distance comes from the last card's own centering offset) */
    xs=cards.map(function(c){
      return Math.max(0,c.offsetLeft+c.offsetWidth/2-pin.clientWidth/2);
    });
    dist=xs[xs.length-1]||0;
    /* short scroll-step per card, so the section ends quickly and the
       content below it comes into view without endless scrolling */
    var step=window.innerWidth>=900?300:260;
    track.style.height=(pin.offsetHeight+step*N)+'px';
    cur=-1; upd();
  }
  function setActive(i){
    cur=i;
    row.style.transform='translate3d('+(-xs[i])+'px,0,0)';
    cards.forEach(function(c,j){c.classList.toggle('on',j===i);});
    dots.forEach(function(d,j){d.classList.toggle('on',j===i);});
  }
  function upd(){
    tick=false;
    var total=track.offsetHeight-pin.offsetHeight;
    var p= total>0 ? Math.min(1,Math.max(0,-track.getBoundingClientRect().top/total)) : 0;
    /* quantize scroll progress to one card per step - the row eases to it */
    var i=Math.min(N-1,Math.floor(p*N+0.0001));
    if(i!==cur) setActive(i);
  }
  function onScroll(){ if(!tick){tick=true;requestAnimationFrame(upd);} }
  window.addEventListener('scroll',onScroll,{passive:true});
  window.addEventListener('resize',function(){clearTimeout(root.__t);root.__t=setTimeout(measure,120);},{passive:true});
  if(document.fonts&&document.fonts.ready){document.fonts.ready.then(function(){measure();});}
  measure(); setTimeout(measure,450); setTimeout(measure,1400);
})();
</script>

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
}.eep-window.eep-launched .eep-url{color:#aec0db;font-size:13px;}.eep-window.eep-launched .eep-frame{display:block;width:100%;height:calc(100% - 56px);border:0;border-radius:0;background:#fff;}.eep-window.eep-launched .eep-mbook{
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
</style>
<section id="ee-platform" aria-label="Explore the ExtraaEdge platform">
  <div class="eep-wrap">
    <header class="eep-head">
      <span class="eep-eyebrow"><i></i> AI Product-Led Experience</span>
      <h2>Explore the platform yourself - no sales call needed</h2>
      <p>An advanced, AI-powered interactive product experience. Click through the real Admission CRM - dashboards, AI, lead manager, WhatsApp &amp; automation. A guided tour walks you through it; click anywhere to take over. When you&rsquo;re ready, book a personalised demo on your own funnel.</p>
    </header>
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
<link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap&quot; rel=&quot;stylesheet&quot; />
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
@keyframes fade{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}.vhead{display:flex;align-items:center;gap:14px;margin-bottom:16px;flex-wrap:wrap}.vhead h1{font-size:20px;font-weight:700;color:var(--head)}.vhead h1 .back{margin-right:8px;color:var(--mut);cursor:pointer}.vhead .right{margin-left:auto;display:flex;align-items:center;gap:10px;flex-wrap:wrap}.btn{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;border-radius:7px;padding:9px 15px;border:1px solid var(--line-2);background:#fff;color:var(--nav);transition:.15s}.btn:hover{border-color:var(--o-line);color:var(--o-d)}.btn.pri{background:var(--o);border-color:var(--o);color:#fff}.btn.pri:hover{background:var(--o-d);color:#fff}.btn svg,.btn img.eeimg{width:14px;height:14px}.ctrls{display:flex;align-items:center;gap:11px;margin-bottom:16px;flex-wrap:wrap}.ctrls .filtbtn{width:34px;height:34px;border-radius:7px;border:1px solid var(--line-2);background:#fff;color:var(--o);display:flex;align-items:center;justify-content:center}.ctrls .filtbtn svg,.ctrls .filtbtn img.eeimg{width:15px;height:15px}.ctrls .right{margin-left:auto;display:flex;align-items:center;gap:11px;flex-wrap:wrap}.synced{display:inline-flex;align-items:center;gap:7px;background:var(--o-soft);border:1px solid var(--o-line);color:var(--o-d);font-size:11.5px;font-weight:600;border-radius:7px;padding:7px 11px}.synced svg,.synced img.eeimg{width:14px;height:14px}.synced u{text-decoration:underline;cursor:pointer}.select,.daterange{display:inline-flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line-2);border-radius:7px;padding:8px 12px;font-size:12.5px;color:var(--ink);min-width:170px;justify-content:space-between;cursor:pointer}.select svg,.select img.eeimg,.daterange svg,.daterange img.eeimg{width:13px;height:13px;color:var(--mut)}.daterange{color:var(--o-d);font-weight:600;min-width:auto}.daterange .ar{color:var(--grn)}.statcards{display:flex;gap:16px;flex-wrap:wrap;margin-bottom:18px}.statcard{background:#fff;border-radius:8px;box-shadow:var(--sh);min-width:260px;flex:0 1 320px;overflow:hidden;border-bottom:3px solid var(--nav)}.statcard .h{display:flex;align-items:center;gap:8px;padding:13px 16px 4px;font-weight:700;color:var(--head);font-size:14px}.statcard .h .rf{margin-left:auto;color:var(--o);cursor:pointer}.statcard .h .rf svg,.statcard .h .rf img.eeimg{width:14px;height:14px;display:block}.statcard .rows{padding:6px 16px 16px}.statcard .r{display:flex;justify-content:space-between;align-items:baseline;padding:7px 0;font-size:13px;color:var(--mut)}.statcard .r b{color:var(--ink);font-weight:700;font-size:14px;font-variant-numeric:tabular-nums}.statcard .r.big b{font-size:26px;font-weight:800;color:var(--nav)}.statcard.two .grid{display:grid;grid-template-columns:1fr 1fr;gap:2px 22px;padding:6px 16px 16px}.tabbar{display:flex;border-bottom:1px solid var(--line);overflow-x:auto;scrollbar-width:none;background:#fff;border-radius:8px 8px 0 0}.tabbar::-webkit-scrollbar{display:none}.tab{flex:none;padding:13px 22px;font-size:13px;font-weight:600;color:var(--mut);border-bottom:3px solid transparent;white-space:nowrap;transition:.15s}.tab:hover{color:var(--nav)}.tab.on{color:var(--o-d);border-bottom-color:var(--o)}.subtabbar{display:flex;background:#fff;border:1px solid var(--line);border-top:0;overflow-x:auto;scrollbar-width:none}.subtabbar::-webkit-scrollbar{display:none}.subtab{flex:1;min-width:150px;padding:13px 16px;font-size:12.5px;font-weight:600;color:var(--mut);text-align:center;border-right:1px solid var(--line);position:relative;white-space:nowrap}.subtab:last-child{border-right:0}.subtab.on{color:var(--o-d)}.subtab.on::after{content:&quot;&quot;;position:absolute;left:0;right:0;bottom:0;height:3px;background:var(--o)}.panel{background:#fff;border:1px solid var(--line);border-top:0;border-radius:0 0 8px 8px;padding:18px}.panel .toolbar{display:flex;justify-content:flex-end;gap:14px;color:var(--mut);margin-bottom:6px}.panel .toolbar svg,.panel .toolbar img.eeimg{width:16px;height:16px;cursor:pointer}.panel .toolbar svg:hover,.panel .toolbar img.eeimg:hover{color:var(--o)}.funnel-wrap{display:flex;gap:24px;align-items:flex-start;flex-wrap:wrap}.funnel{flex:1;min-width:280px}.funnel .total{font-size:30px;font-weight:800;color:var(--nav);margin-bottom:10px}.fbar{height:34px;margin:0 auto;display:flex;align-items:center;justify-content:center;color:#fff;font-size:12px;font-weight:700;clip-path:polygon(0 0,100% 0,96% 100%,4% 100%);transition:width .8s cubic-bezier(.2,.8,.2,1)}.legend{display:flex;flex-direction:column;gap:9px;min-width:170px}.legend .li{display:flex;align-items:center;gap:9px;font-size:12.5px;color:var(--mut)}.legend .li i{width:11px;height:11px;border-radius:3px;flex:none}.legend .li b{margin-left:auto;color:var(--ink);font-weight:700}.tbl-wrap{overflow-x:auto;border:1px solid var(--line);border-radius:7px}table.tbl{width:100%;border-collapse:collapse;font-size:12.5px;min-width:560px}table.tbl thead th{background:#8b93a5;color:#fff;font-weight:600;text-align:left;padding:12px 14px;white-space:nowrap;position:sticky;top:0}table.tbl thead th.num,table.tbl td.num{text-align:right;font-variant-numeric:tabular-nums}table.tbl tbody td{padding:11px 14px;border-bottom:1px solid var(--line);color:var(--ink);white-space:nowrap}table.tbl tbody tr:nth-child(even){background:#fafbfc}table.tbl tbody tr:hover{background:var(--o-soft2)}table.tbl tbody tr.tot{font-weight:700;background:#f1f3f7}table.tbl tbody tr.tot:hover{background:#f1f3f7}table.tbl tr.hl{background:var(--o-soft)!important}table.tbl .exp{color:var(--mut);cursor:pointer;user-select:none;margin-right:5px;display:inline-block;width:12px}table.tbl .ind{display:inline-block}.badge{font-size:10.5px;font-weight:700;border-radius:5px;padding:3px 9px;white-space:nowrap}.badge.done{background:#2b3445;color:#fff}.badge.draft{background:#fff;color:var(--mut);border:1px solid var(--line-2)}.badge.green{display:inline-flex;align-items:center;gap:5px;background:var(--grn-soft);color:var(--grn);border:1px solid #bfe8d1}.badge.green::before{content:&quot;&quot;;width:6px;height:6px;border-radius:50%;background:var(--grn)}.actcell{display:flex;gap:10px;color:var(--o)}.actcell svg,.actcell img.eeimg{width:16px;height:16px;cursor:pointer}.actcell .del{color:var(--red)}.toggle{width:34px;height:18px;border-radius:999px;background:var(--o);position:relative;display:inline-block;cursor:pointer}.toggle::after{content:&quot;&quot;;position:absolute;top:2px;right:2px;width:14px;height:14px;border-radius:50%;background:#fff;transition:.2s}.toggle.off{background:#c9d0db}.toggle.off::after{right:auto;left:2px}.pager{display:flex;align-items:center;justify-content:center;gap:5px;margin-top:16px;color:var(--mut);font-size:12.5px}.pager button{width:28px;height:28px;border-radius:6px;border:1px solid var(--line-2);background:#fff;color:var(--mut);font-weight:600}.pager button.on{background:var(--o);border-color:var(--o);color:#fff}.pager button:hover:not(.on){border-color:var(--o-line);color:var(--o-d)}.lm-tabs{display:flex;gap:2px;border-bottom:2px solid var(--line);overflow-x:auto;scrollbar-width:none;margin-bottom:14px}.lm-tabs::-webkit-scrollbar{display:none}.lm-tab{flex:none;padding:11px 16px;font-size:12.5px;font-weight:600;color:var(--mut);border-bottom:3px solid transparent;margin-bottom:-2px;white-space:nowrap;border-radius:6px 6px 0 0;transition:.15s}.lm-tab:hover{background:#fff;color:var(--nav)}.lm-tab.on{color:#fff;background:var(--o);border-bottom-color:var(--o-d)}.lm-pill{border:1px solid var(--line-2);background:#fff;border-radius:7px;padding:8px 14px;font-size:12.5px;font-weight:600;color:var(--nav)}.lm-pill:hover{border-color:var(--o-line);color:var(--o-d)}.lm-toolbar{display:flex;align-items:center;justify-content:flex-end;gap:4px;margin-bottom:12px;flex-wrap:wrap}.lm-toolbar .tb{width:32px;height:32px;border-radius:7px;display:flex;align-items:center;justify-content:center;color:var(--o);background:var(--o-soft2);border:1px solid var(--o-line)}.lm-toolbar .tb.plain{color:var(--mut);background:#fff;border-color:var(--line-2)}.lm-toolbar .tb:hover{background:var(--o);color:#fff}.lm-toolbar .tb svg,.lm-toolbar .tb img.eeimg{width:15px;height:15px}.lm-sort{display:flex;align-items:center;gap:6px;color:var(--o);font-weight:600;font-size:12.5px;margin:0 auto 12px 0;cursor:pointer}.lm-sort svg,.lm-sort img.eeimg{width:15px;height:15px}.lead{background:#fff;border:1px solid var(--line);border-radius:8px;margin-bottom:12px;box-shadow:var(--sh);overflow:hidden}.lead-head{display:flex;align-items:center;gap:14px;padding:14px 16px;cursor:pointer}.lead-head .chk{width:17px;height:17px;border:1.5px solid var(--line-2);border-radius:4px;flex:none}.lead-head .name{min-width:160px}.lead-head .name b{font-weight:700;color:var(--nav);font-size:14px;display:flex;align-items:center;gap:7px}.lead-head .name b .ct{background:var(--o-soft);color:var(--o-d);border:1px solid var(--o-line);border-radius:999px;font-size:10px;padding:1px 7px;font-weight:700}.lead-head .name span{color:var(--mut);font-size:12px}.lead-head .status{margin:0 auto}.lead-head .status .s1{background:#2b3445;color:#fff;font-size:11px;font-weight:600;padding:4px 12px;border-radius:4px 4px 0 0;display:block;text-align:center}.lead-head .status .s2{background:var(--o-soft);color:var(--o-d);font-size:11px;font-weight:600;padding:3px 12px;border-radius:0 0 4px 4px;display:block;text-align:center;border:1px solid var(--o-line);border-top:0}.lead-head .metrics{display:flex;align-items:center;gap:14px;color:var(--mut);font-size:12px}.lead-head .metrics .m{display:flex;align-items:center;gap:5px}.lead-head .metrics .m svg,.lead-head .metrics .m img.eeimg{width:15px;height:15px}.lead-head .viewall{color:var(--o);font-weight:600;font-size:12px}.lead-head .kebab,.lead-head .caret{color:var(--mut);display:flex;align-items:center}.lead-head .kebab svg,.lead-head .kebab img.eeimg,.lead-head .caret svg,.lead-head .caret img.eeimg{width:17px;height:17px}.lead-head .caret{transition:transform .25s}.lead.open .lead-head .caret{transform:rotate(180deg)}.lead-body{max-height:0;overflow:hidden;transition:max-height .35s ease}.lead.open .lead-body{border-top:1px solid var(--line)}.lead-subtabs{display:flex;gap:22px;padding:12px 18px 0;border-bottom:1px solid var(--line);overflow-x:auto;scrollbar-width:none}.lead-subtabs::-webkit-scrollbar{display:none}.lead-subtab{padding:8px 2px 11px;font-size:12.5px;font-weight:600;color:var(--mut);border-bottom:2px solid transparent;white-space:nowrap}.lead-subtab.on{color:var(--nav);border-bottom-color:var(--o)}.lead-fields{display:grid;grid-template-columns:repeat(4,1fr);gap:18px 24px;padding:18px}.field .l{font-size:10.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--dim);margin-bottom:4px}.field .v{font-size:13px;color:var(--ink);font-weight:500}.field .v.link{color:var(--blue)}.field .v.rmk{color:var(--o-d);text-decoration:underline;cursor:pointer}.wa-list{background:#fff;border:1px solid var(--line);border-radius:8px;box-shadow:var(--sh);overflow:hidden}.wa-row{display:flex;align-items:center;gap:16px;padding:15px 18px;border-bottom:1px solid var(--line)}.wa-row:last-child{border-bottom:0}.wa-row:hover{background:var(--o-soft2)}.wa-row .chk{width:16px;height:16px;border:1.5px solid var(--line-2);border-radius:4px;flex:none}.wa-row .nm{min-width:190px;flex:1}.wa-row .nm b{display:block;font-weight:700;color:var(--nav);font-size:13.5px}.wa-row .nm span{font-size:12px;color:var(--mut)}.wa-row .st{min-width:150px}.wa-row .st .a{background:#2b3445;color:#fff;font-size:10.5px;font-weight:600;padding:3px 10px;border-radius:4px 4px 0 0;display:block;text-align:center}.wa-row .st .b{background:var(--o-soft);color:var(--o-d);font-size:10.5px;font-weight:600;padding:2px 10px;border-radius:0 0 4px 4px;display:block;text-align:center;border:1px solid var(--o-line);border-top:0}.wa-row .links{display:flex;gap:14px;color:var(--o);font-size:12px;font-weight:600;white-space:nowrap}.wa-row .links span{display:inline-flex;align-items:center;gap:5px;cursor:pointer}.wa-row .links svg,.wa-row .links img.eeimg{width:14px;height:14px}.wa-row .ic{display:flex;gap:12px;color:var(--o-d)}.wa-row .ic svg,.wa-row .ic img.eeimg{width:16px;height:16px;cursor:pointer}.wa-row .caret svg,.wa-row .caret img.eeimg{width:16px;height:16px;color:var(--mut)}
@media(max-width:760px){.wa-row .links,.wa-row .st{display:none}}.fu-grid{display:grid;grid-template-columns:1fr 300px;gap:18px;align-items:start}.cal{background:#fff;border:1px solid var(--line);border-radius:10px;box-shadow:var(--sh);padding:14px;position:sticky;top:0}.cal .ch{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;font-weight:700;color:var(--nav);font-size:13.5px}.cal .ch button{color:var(--mut);font-size:16px;padding:2px 6px}.cal .grid{display:grid;grid-template-columns:repeat(7,1fr);gap:3px;text-align:center}.cal .dow{font-size:10px;font-weight:700;color:var(--dim);padding:5px 0}.cal .d{font-size:12px;color:var(--ink);padding:7px 0;border-radius:7px;cursor:pointer}.cal .d:hover{background:var(--o-soft2)}.cal .d.mut{color:var(--dim)}.cal .d.on{background:var(--o);color:#fff;font-weight:700}.cal .d.dot{position:relative}.cal .d.dot::after{content:&quot;&quot;;position:absolute;bottom:3px;left:50%;transform:translateX(-50%);width:4px;height:4px;border-radius:50%;background:var(--o)}.cal .fhd{display:flex;align-items:center;gap:8px;font-weight:700;color:var(--nav);font-size:13px;margin-bottom:8px}
@media(max-width:980px){.fu-grid{grid-template-columns:1fr}.cal{position:static;order:-1}}.set-sec{margin-bottom:22px;max-width:620px}.set-sec .h{display:flex;align-items:center;gap:9px;font-weight:700;color:var(--head);font-size:14px;margin-bottom:10px}.set-sec .h svg,.set-sec .h img.eeimg{width:18px;height:18px;color:var(--mut)}.set-card{display:flex;align-items:center;justify-content:space-between;background:#fff;border:1px solid var(--line);border-radius:9px;padding:16px 18px;box-shadow:var(--sh);font-weight:600;color:var(--nav);cursor:pointer;transition:.15s}.set-card:hover{border-color:var(--o-line);box-shadow:var(--sh-md)}.set-card svg,.set-card img.eeimg{width:17px;height:17px;color:var(--mut)}.wf-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.wf-card{display:flex;gap:18px;background:#fff;border:1px solid var(--line);border-radius:12px;overflow:hidden;cursor:pointer;transition:.15s}.wf-card:hover{border-color:var(--o-line);box-shadow:var(--sh-md)}.wf-prev{flex:none;width:170px;background:var(--o-soft2);border-right:1px solid var(--o-line);padding:16px 14px;display:flex;flex-direction:column;gap:10px;justify-content:center}.wf-node{background:#fff;border:1px solid var(--line-2);border-radius:7px;padding:8px 10px;font-size:10px}.wf-info{padding:18px 18px 18px 0;flex:1}.wf-info h4{font-size:15px;font-weight:700;color:var(--nav);margin-bottom:9px}.wf-info ul{list-style:none;display:flex;flex-direction:column;gap:7px}.wf-info li{font-size:12.5px;color:var(--mut);line-height:1.5;padding-left:16px;position:relative}.wf-info li::before{content:&quot;•&quot;;position:absolute;left:3px;color:var(--o);font-weight:800}
@media(max-width:1024px){.wf-grid{grid-template-columns:1fr}}
@media(max-width:520px){.wf-card{flex-direction:column}.wf-prev{width:auto;flex-direction:row;border-right:0;border-bottom:1px solid var(--o-line)}}.int-stats{display:flex;gap:18px;flex-wrap:wrap;margin-bottom:16px}.int-stat{flex:1;min-width:200px;background:#fff;border:1px solid var(--line);border-radius:9px;box-shadow:var(--sh);padding:18px 20px}.int-stat .l{font-size:12.5px;color:var(--dim);margin-bottom:8px}.int-stat .v{font-size:30px;font-weight:800;color:var(--nav)}.int-stat.pub .v{color:var(--blue)}.int-stat.unp .v{color:var(--red)}.int-bar{display:flex;justify-content:flex-end;gap:8px;margin-bottom:14px}.int-cats{display:flex;flex-direction:column;gap:24px}.int-cat .ch{display:flex;align-items:center;gap:10px;margin-bottom:12px}.int-cat .ch h3{font-size:14.5px;font-weight:700;color:var(--head)}.int-cat .ch .ct{font-size:11px;font-weight:700;color:var(--o-d);background:var(--o-soft);border:1px solid var(--o-line);border-radius:999px;padding:2px 9px}.int-cat .ch .ln{flex:1;height:1px;background:var(--line)}.int-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:12px}.int-tile{background:#fff;border:1px solid var(--line);border-radius:11px;box-shadow:var(--sh);padding:16px 12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px;text-align:center;transition:box-shadow .2s,transform .2s,border-color .2s;min-height:104px}.int-tile:hover{box-shadow:var(--sh-md);transform:translateY(-3px);border-color:var(--o-line)}.int-tile .logo{height:38px;display:flex;align-items:center;justify-content:center;width:100%}.int-tile img{max-height:38px;max-width:108px;object-fit:contain}.int-tile span{font-size:11.5px;font-weight:600;color:var(--ink);line-height:1.2}.int-sec-badges .int-grid{grid-template-columns:repeat(auto-fill,minmax(170px,1fr))}.cmp-row{background:#fff;border:1px solid var(--line);border-radius:8px;box-shadow:var(--sh);padding:14px 18px;margin-bottom:10px;display:grid;grid-template-columns:1.4fr 1fr 1.2fr 1.2fr 1.2fr 1.4fr auto auto;gap:14px;align-items:center}.cmp-row .c .l{font-size:9.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--dim);margin-bottom:3px}.cmp-row .c .v{font-size:12.5px;color:var(--ink);font-weight:500}.cmp-row .acts{display:flex;gap:9px;color:var(--o)}.cmp-row .acts svg,.cmp-row .acts img.eeimg{width:16px;height:16px;cursor:pointer}.cmp-row .caret svg,.cmp-row .caret img.eeimg{width:16px;height:16px;color:var(--mut)}
@media(max-width:1100px){.cmp-row{grid-template-columns:1fr 1fr;gap:12px}.cmp-row .acts,.cmp-row .caret{grid-column:span 2;justify-content:flex-end}}.placeholder{background:#fff;border:1px dashed var(--line-2);border-radius:10px;padding:46px 24px;text-align:center;color:var(--mut)}.placeholder .ic{width:54px;height:54px;border-radius:14px;background:var(--o-soft);color:var(--o);display:flex;align-items:center;justify-content:center;margin:0 auto 14px}.placeholder .ic svg,.placeholder .ic img.eeimg{width:26px;height:26px}.placeholder b{display:block;color:var(--nav);font-size:16px;margin-bottom:6px}.toasts{position:fixed;right:18px;top:70px;z-index:9003;display:flex;flex-direction:column;gap:9px;max-width:300px}.toast{display:flex;gap:10px;background:#fff;border:1px solid var(--line);border-left:3px solid var(--o);border-radius:9px;padding:11px 14px;box-shadow:var(--sh-md);font-size:12.5px;color:var(--mut);opacity:0;transform:translateX(20px);transition:.35s}.toast.in{opacity:1;transform:none}.toast b{display:block;color:var(--nav);font-weight:700;margin-bottom:1px}.toast .ti{font-size:16px}
@media(max-width:1024px){.lead-fields{grid-template-columns:repeat(2,1fr)}}
@media(max-width:860px){:root{--sb:0px}.app{grid-template-columns:1fr}.brand{border-right:0}.brand .burger{display:flex}.side{position:fixed;top:0;left:0;bottom:0;width:268px;z-index:50;transform:translateX(-100%);transition:transform .28s ease;box-shadow:var(--sh-md)}.side.show{transform:none}.main{grid-column:1/-1}.search{display:none}.lead-head{flex-wrap:wrap}.lead-head .status{order:5;margin:0}
}
@media(max-width:520px){.view{padding:16px 14px 50px}.lead-fields{grid-template-columns:1fr}.vhead h1{font-size:18px}.top{padding:0 12px;gap:8px}.top .timer{display:none}.statcard{flex:1 1 100%;min-width:0}
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
      <div class=&quot;vhead&quot;><h1>Business Outcomes</h1><div class=&quot;right&quot;><span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Illustrative sample data</span></span></div></div>
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
      <div class=&quot;vhead&quot;><div><span class=&quot;ai-eyebrow&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;><path d=&quot;M13 2 3 14h7l-1 8 10-12h-7z&quot;/></svg> Powered by Vidya AI</span><h1 style=&quot;margin-top:8px&quot;>AI that does the work - not just assists</h1></div><div class=&quot;right&quot;><span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Sample data</span></span></div></div>
      <div class=&quot;ai-grid&quot; id=&quot;aiGrid&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;mgmt&quot;>
      <div class=&quot;vhead&quot;><h1>Management Dashboard</h1><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
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
      <div class=&quot;vhead&quot;><h1>Counselor Dashboard</h1><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
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
      <div class=&quot;vhead&quot;><h1>Communication Dashboard</h1><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;ctrls&quot;><button class=&quot;filtbtn&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><polygon points=&quot;22 3 2 3 10 12.5 10 19 14 21 14 12.5&quot;/></svg></button><div class=&quot;right&quot;><span class=&quot;select&quot;>Select Counselor <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m6 9 6 6 6-6&quot;/></svg></span></div></div>
      <div class=&quot;statcards&quot;><div class=&quot;statcard two&quot; style=&quot;flex:0 1 460px&quot;><div class=&quot;h&quot;>Email Summary</div><div class=&quot;grid&quot;><div class=&quot;r&quot;><span>Sent</span><b>24620</b></div><div class=&quot;r&quot;><span>Bounce</span><b>410</b></div><div class=&quot;r&quot;><span>Delivered</span><b>23640</b></div><div class=&quot;r&quot;><span>Deferred</span><b>120</b></div><div class=&quot;r&quot;><span>Open</span><b>9460</b></div><div class=&quot;r&quot;><span>Click</span><b>2980</b></div></div></div></div>
      <div class=&quot;tabbar&quot;><button class=&quot;tab on&quot;>Sent Email Analysis</button><button class=&quot;tab&quot;>SMS Sent Analysis</button><button class=&quot;tab&quot;>Enterprise WhatsApp Sent Analysis</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Email Overview</button><button class=&quot;subtab&quot;>Template Wise Usage</button><button class=&quot;subtab&quot;>Marketing Campaign Performance</button></div>
      <div class=&quot;panel&quot;><div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;commTbl&quot;><thead><tr><th>Type</th><th class=&quot;num&quot;>Email Sent</th><th class=&quot;num&quot;>Email Delivered</th><th class=&quot;num&quot;>Delivery Rate</th><th class=&quot;num&quot;>Email Opened</th><th class=&quot;num&quot;>Open Rate</th><th class=&quot;num&quot;>Email Clicked</th><th class=&quot;num&quot;>Click Rate</th><th class=&quot;num&quot;>Click Through Rate</th></tr></thead><tbody></tbody></table></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;publisher&quot;>
      <div class=&quot;vhead&quot;><h1>Publisher Dashboard</h1><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
      <div class=&quot;statcards&quot;>
        <div class=&quot;statcard two&quot;><div class=&quot;h&quot;>Lead Summary</div><div class=&quot;grid&quot; style=&quot;grid-template-columns:1fr&quot;><div class=&quot;r&quot;><span>Total Leads Count</span><b>10259</b></div><div class=&quot;r&quot;><span>Primary Leads &amp;gt;&amp;gt;</span><b>10259</b></div><div class=&quot;r&quot;><span>Non Primary Leads</span><b>20</b></div></div></div>
        <div class=&quot;statcard two&quot;><div class=&quot;h&quot;>Instance Summary</div><div class=&quot;grid&quot; style=&quot;grid-template-columns:1fr&quot;><div class=&quot;r&quot;><span>Total Instance Count &amp;gt;&amp;gt;</span><b>73770</b></div><div class=&quot;r&quot;><span>Primary Instance &amp;gt;&amp;gt;</span><b>10313</b></div><div class=&quot;r&quot;><span>Non Primary Instance &amp;gt;&amp;gt;</span><b>63452</b></div></div></div>
      </div>
      <div class=&quot;tabbar&quot; style=&quot;border-radius:8px 8px 0 0&quot;><button class=&quot;tab on&quot;>Publisher Analysis</button></div>
      <div class=&quot;subtabbar&quot;><button class=&quot;subtab on&quot;>Program Wise Bifurcation</button><button class=&quot;subtab&quot;>Program wise Conversion</button></div>
      <div class=&quot;panel&quot;><div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;pubTbl&quot;><thead><tr><th>Deal-Month, Products Interested</th><th class=&quot;num&quot;>Total</th><th class=&quot;num&quot;>Lead Captured</th><th class=&quot;num&quot;>Open</th><th class=&quot;num&quot;>No SAL</th><th class=&quot;num&quot;>Demo Pipeline</th><th class=&quot;num&quot;>Demo Done</th><th class=&quot;num&quot;>Onboarding</th><th class=&quot;num&quot;>Deal Lost</th></tr></thead><tbody></tbody></table></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;demographic&quot;>
      <div class=&quot;vhead&quot;><h1>Demographic Dashboard</h1><div class=&quot;right&quot;><button class=&quot;btn pri&quot;>CREATE REPORTS</button></div></div>
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
      <div class=&quot;vhead&quot;><h1>WhatsApp Chat</h1></div>
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
      <div class=&quot;vhead&quot;><h1>Failed Lead List</h1></div>
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
      <div class=&quot;vhead&quot;><h1>Workflow Automation</h1><div class=&quot;right&quot;><span class=&quot;sample-badge&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>Sample data</span></span></div></div>
      <div class=&quot;privacy-bar&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/></svg><span>These automations run quietly in the background to save your team time. <b>Internal rules, conditions and configuration are not shown.</b></span></div>
      <div class=&quot;wf-grid&quot; id=&quot;wfGrid&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;basic&quot;>
      <div class=&quot;tabbar&quot; style=&quot;border-radius:8px 8px 0 0;margin-bottom:18px&quot;><button class=&quot;tab on&quot;>Email Templates</button><button class=&quot;tab&quot;>SMS Templates</button><button class=&quot;tab&quot;>Lead Score</button><button class=&quot;tab&quot;>Assignment Rules</button></div>
      <div class=&quot;tbl-wrap&quot;><table class=&quot;tbl&quot; id=&quot;tmplTbl&quot;><thead><tr><th>Template Name</th><th>Subject</th><th>Stage</th><th>Visibility</th><th>Actions</th></tr></thead><tbody></tbody></table></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;advanced&quot;>
      <div class=&quot;vhead&quot;><h1>Settings</h1></div>
      <div class=&quot;set-sec&quot;><div class=&quot;h&quot;>Dropdown Values</div><div class=&quot;set-card&quot; data-toast=&quot;Setup Dropdown Values&quot;>Setup Dropdown Values <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></div></div>
      <div class=&quot;set-sec&quot;><div class=&quot;h&quot;>Users &amp;amp; Roles</div><div class=&quot;set-card&quot; data-toast=&quot;User Profiles&quot;>User Profiles <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></div></div>
      <div class=&quot;set-sec&quot;><div class=&quot;h&quot;>Communications</div><div class=&quot;set-card&quot; data-toast=&quot;Template Settings&quot;>Template Settings <svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;m9 18 6-6-6-6&quot;/></svg></div></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;integration&quot;>
      <div class=&quot;vhead&quot;><h1>Third Party integrations</h1></div>
      <div class=&quot;int-stats&quot;>
        <div class=&quot;int-stat&quot;><div class=&quot;l&quot;>Total Integrations</div><div class=&quot;v&quot;>60+</div></div>
        <div class=&quot;int-stat pub&quot;><div class=&quot;l&quot;>Live &amp;amp; Ready</div><div class=&quot;v&quot;>60+</div></div>
        <div class=&quot;int-stat unp&quot; style=&quot;border:0&quot;><div class=&quot;l&quot;>Categories</div><div class=&quot;v&quot; style=&quot;color:var(--o)&quot;>8</div></div>
      </div>
      <div class=&quot;int-bar&quot;><button class=&quot;btn&quot; id=&quot;intRefresh&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M21 12a9 9 0 1 1-3-6.7L21 8&quot;/><path d=&quot;M21 3v5h-5&quot;/></svg> Refresh</button><button class=&quot;btn pri&quot; data-toast=&quot;Request an integration&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><line x1=&quot;12&quot; y1=&quot;5&quot; x2=&quot;12&quot; y2=&quot;19&quot;/><line x1=&quot;5&quot; y1=&quot;12&quot; x2=&quot;19&quot; y2=&quot;12&quot;/></svg> Request an integration</button></div>
      <div class=&quot;int-cats&quot; id=&quot;intCats&quot;></div>
    </section>
    <section class=&quot;view&quot; data-v=&quot;ticket&quot;>
      <div class=&quot;vhead&quot;><h1>Raise a Ticket</h1></div>
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
  var tIdx=-1, tTimer=null, tRun=false, TDUR=6500;
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
  function tGo(i){ clearTimeout(tTimer); if(i>=TSTEPS.length){ tStop(); return; } tIdx=i; tPlace(i); if(tRun &amp;&amp; !tReduce){ tTimer=setTimeout(function(){ tGo(tIdx+1); }, TDUR); } }
  function tStart(){ tRun=true; document.body.classList.add('tour-on'); playBtn.innerHTML=PAUSE; lbl.textContent='Auto-playing…'; tGo(tIdx<0?0:tIdx); }
  function tStop(){ tRun=false; clearTimeout(tTimer); document.body.classList.remove('tour-on'); playBtn.innerHTML=PLAY; lbl.textContent='Product tour'; }
  window.__laxmiStopTour=tStop;
  playBtn.innerHTML=PLAY;
  playBtn.addEventListener('click',function(){ tRun?tStop():tStart(); });
  tDock.querySelector('.restart').addEventListener('click',function(){ tIdx=-1; tStart(); });
  tDock.querySelector('.close').addEventListener('click',tStop);
  tTip.querySelector('.nx').addEventListener('click',function(){ tGo(tIdx+1); });
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
    <div class="eep-cta">
      <p class="eep-cta-t">Explored the platform? See it run on <strong>your</strong> admission funnel.</p>
      <a href="https://www.extraaedge.com/book-a-demo/" class="eep-cta-btn">Book demo Now <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-04.svg" alt="" loading="lazy" decoding="async"></a>
      <span class="eep-cta-sub">30-min personalised walkthrough &middot; No credit card</span>
    </div>
  </div>
</section>
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
  if(!mq.matches){ loadFrame(); }           /* desktop: load inline as before */
  /* on phones the demo has a fixed ~460px min layout, so scale it to fill the
     viewport width (full-width, nothing clipped); desktop shows it at native size */
  function isOpen(){ return !!(winEl && winEl.classList.contains('eep-launched')); }
  function fitFrame(){
    if(!fr) return;
    if(isOpen() && mq.matches){
      var base=460, barH=56;
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

<section id="ee-products" aria-label="Our products">
  <div class="eep-wrap">

    <div class="eep-head">
      <div class="eep-head-l">
        <span class="eep-eyebrow"><span class="eep-dot" aria-hidden="true"></span>The admissions platform</span>
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
          <a class="eep-spot-cta" id="eepSpotCta" href="#demo">See it in action <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/products-icon-02.svg" alt="" loading="lazy" decoding="async"></a>
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
    var P = [
      {id:'vidya', t:'VidyaAI', badge:'New', cat:'ai', ic:'spark', img:'https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-ai.svg', href:'#demo',
        d:'Your AI admissions copilot - drafts replies, scores intent and rings visitors live.',
        l:'The AI layer across your whole funnel. It drafts counsellor replies, scores every lead by intent, and can call a website visitor the moment they show interest - the live experience competitors do not offer.',
        tags:['Drafts replies','Scores lead intent','Rings visitors live']},
      {id:'edu-crm', t:'Education CRM', cat:'platform', ic:'crm', href:'#demo',
        d:'Unify every enquiry, counsellor and campus on one purpose-built platform.',
        l:'Built for admissions, not retrofitted from sales. One view of every enquiry, every counsellor and every campus - so nothing slips between teams.',
        tags:['360° enquiry view','Counsellor workflows','Multi-campus ready']},
      {id:'mob-crm', t:'Mobile CRM', badge:'New', cat:'platform', ic:'phone', href:'#demo',
        d:'Run admissions from your pocket - call, follow up and close on the go.',
        l:'Your full pipeline on mobile. Counsellors call, log and follow up from anywhere, with reminders that keep every lead moving.',
        tags:['Call from your phone','Push reminders','Works on the move']},
      {id:'core-crm', t:'Core CRM', cat:'platform', ic:'gear', href:'#demo',
        d:'The reliable engine for pipelines, tasks and workflows that never drops a lead.',
        l:'The dependable core underneath it all - pipelines, tasks and automation tuned so a lead is never forgotten or double-handled.',
        tags:['Smart pipelines','Task automation','Zero lead leakage']},
      {id:'app-mgmt', t:'Application Management', cat:'admissions', ic:'doc', href:'#demo',
        d:'Track every application stage with automated nudges so no form stalls.',
        l:'See where every applicant is, in real time. Automated nudges restart stalled forms before they go cold.',
        tags:['Stage tracking','Auto nudges','Status alerts']},
      {id:'ams', t:'Admission Management System', cat:'admissions', ic:'shield', href:'#demo',
        d:'Orchestrate fees, documents and approvals end-to-end in one auditable flow.',
        l:'Run the whole admission cycle - fees, documents, approvals - in one place, with a complete audit trail for every decision.',
        tags:['Fees & documents','Approval flows','Full audit trail']},
      {id:'online-adm', t:'Online Admissions', cat:'admissions', ic:'globe', href:'#demo',
        d:'Let applicants apply and pay from anywhere with a frictionless journey.',
        l:'A clean, mobile-first apply-and-pay flow that students finish - fewer drop-offs, more completed applications.',
        tags:['Apply anywhere','Integrated payments','Frictionless forms']},
      {id:'chatbot', t:'Education AI Chatbot', cat:'ai', ic:'chat', href:'#demo',
        d:'Answer student questions 24/7 and capture qualified enquiries while you sleep.',
        l:'An always-on assistant that answers questions on your site and WhatsApp, qualifies interest, and hands warm leads to counsellors.',
        tags:['24/7 answers','Qualifies enquiries','Site + WhatsApp']},
      {id:'waba', t:'WhatsApp Business API', cat:'engage', ic:'whatsapp', href:'#demo',
        d:'Reach families on their favourite channel with verified, automated conversations.',
        l:'Meet families where they already are. Verified WhatsApp with automated replies and broadcast campaigns that actually get read.',
        tags:['Verified sender','Automated replies','Broadcast campaigns']},
      {id:'ivr', t:'IVR System', cat:'engage', ic:'call', href:'#demo',
        d:'Route, record and track every call so no enquiry rings out unanswered.',
        l:'Smart call routing with recording and missed-call capture - every ring becomes a tracked, followed-up enquiry.',
        tags:['Smart call routing','Call recording','Missed-call capture']},
      {id:'mkt-auto', t:'Marketing Automation', cat:'grow', ic:'send', href:'#demo',
        d:'Launch multi-channel campaigns that fill your funnel on autopilot.',
        l:'Build journeys once and let them run - email, SMS and WhatsApp triggered by what each prospect does.',
        tags:['Multi-channel drips','Triggered journeys','Campaign analytics']},
      {id:'nurture', t:'Lead Nurturing', cat:'grow', ic:'heart', href:'#demo',
        d:'Warm every prospect with timely, personalised drips until they enrol.',
        l:'Keep undecided prospects engaged with personalised, behaviour-based drips that bring them back to apply.',
        tags:['Personalised drips','Behaviour triggers','Re-engagement']},
      {id:'analytics', t:'Analytics Dashboard', cat:'grow', ic:'bars', href:'#demo',
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
    var LOGO={ 'vidya':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfdmlkeWFhaSIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0VGOUM1NyIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjREU2RTMwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjQjg1NDIwIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X3ZpZHlhYWkiIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMTkzMzVEIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF92aWR5YWFpIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX3ZpZHlhYWkpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfdmlkeWFhaSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfdmlkeWFhaSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAyLjVsMi4yIDYuMSA2LjMgMi4yLTYuMyAyLjJMMTIgMTkuM2wtMi4yLTYuMy02LjMtMi4yIDYuMy0yLjJ6Ii8+PC9nPgo8L3N2Zz4=','edu-crm':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfZWR1Y2F0aW9uY3JtIiB4MT0iMCIgeTE9IjAiIHgyPSIxIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMkU1NDhGIi8+PHN0b3Agb2Zmc2V0PSIuNTUiIHN0b3AtY29sb3I9IiMxOTMzNUQiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwRTFGM0IiLz48L2xpbmVhckdyYWRpZW50Pgo8cmFkaWFsR3JhZGllbnQgaWQ9Imdsb3dfZWR1Y2F0aW9uY3JtIiBjeD0iODIlIiBjeT0iMTYlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0RFNkUzMCIgc3RvcC1vcGFjaXR5PSIuMzgiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNERTZFMzAiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ2xfZWR1Y2F0aW9uY3JtIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2VkdWNhdGlvbmNybSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xvd19lZHVjYXRpb25jcm0pIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsX2VkdWNhdGlvbmNybSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxjaXJjbGUgY3g9IjkiIGN5PSI4IiByPSIzIi8+PHBhdGggZD0iTTMuNSAxOWE1LjUgNS41IDAgMCAxIDExIDAiLz48cGF0aCBkPSJNMTYgOGg1TTE2IDEyaDVNMTYgMTZoMyIvPjwvZz4KPC9zdmc+','mob-crm':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfbW9iaWxlY3JtIiB4MT0iMCIgeTE9IjAiIHgyPSIxIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjRUY5QzU3Ii8+PHN0b3Agb2Zmc2V0PSIuNTUiIHN0b3AtY29sb3I9IiNERTZFMzAiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNCODU0MjAiLz48L2xpbmVhckdyYWRpZW50Pgo8cmFkaWFsR3JhZGllbnQgaWQ9Imdsb3dfbW9iaWxlY3JtIiBjeD0iODIlIiBjeT0iMTYlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIuMzgiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMxOTMzNUQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ2xfbW9iaWxlY3JtIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX21vYmlsZWNybSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xvd19tb2JpbGVjcm0pIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsX21vYmlsZWNybSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxyZWN0IHg9IjciIHk9IjIuNSIgd2lkdGg9IjEwIiBoZWlnaHQ9IjE5IiByeD0iMi42Ii8+PHBhdGggZD0iTTEwLjUgMTguNWgzIi8+PC9nPgo8L3N2Zz4=','core-crm':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfY29yZWNybSIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzJFNTQ4RiIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjMTkzMzVEIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMEUxRjNCIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X2NvcmVjcm0iIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjREU2RTMwIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI0RFNkUzMCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF9jb3JlY3JtIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2NvcmVjcm0pIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfY29yZWNybSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfY29yZWNybSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxjaXJjbGUgY3g9IjEyIiBjeT0iMTIiIHI9IjMiLz48cGF0aCBkPSJNMTIgM3YzTTEyIDE4djNNMyAxMmgzTTE4IDEyaDNNNS42IDUuNmwyLjEgMi4xTTE2LjMgMTYuM2wyLjEgMi4xTTE4LjQgNS42bC0yLjEgMi4xTTcuNyAxNi4zbC0yLjEgMi4xIi8+PC9nPgo8L3N2Zz4=','app-mgmt':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfYXBwbGljYXRpb25tYW5hZ2VtZW50IiB4MT0iMCIgeTE9IjAiIHgyPSIxIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjRUY5QzU3Ii8+PHN0b3Agb2Zmc2V0PSIuNTUiIHN0b3AtY29sb3I9IiNERTZFMzAiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNCODU0MjAiLz48L2xpbmVhckdyYWRpZW50Pgo8cmFkaWFsR3JhZGllbnQgaWQ9Imdsb3dfYXBwbGljYXRpb25tYW5hZ2VtZW50IiBjeD0iODIlIiBjeT0iMTYlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIuMzgiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMxOTMzNUQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ2xfYXBwbGljYXRpb25tYW5hZ2VtZW50IiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2FwcGxpY2F0aW9ubWFuYWdlbWVudCkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xvd19hcHBsaWNhdGlvbm1hbmFnZW1lbnQpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsX2FwcGxpY2F0aW9ubWFuYWdlbWVudCkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxyZWN0IHg9IjUiIHk9IjMiIHdpZHRoPSIxNCIgaGVpZ2h0PSIxOCIgcng9IjIuNCIvPjxwYXRoIGQ9Ik05IDhoNk05IDEyaDZNOSAxNmg0Ii8+PC9nPgo8L3N2Zz4=','ams':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfYWRtaXNzaW9ubWFuYWdlbWVudHN5c3RlbSIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzJFNTQ4RiIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjMTkzMzVEIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMEUxRjNCIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X2FkbWlzc2lvbm1hbmFnZW1lbnRzeXN0ZW0iIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjREU2RTMwIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI0RFNkUzMCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF9hZG1pc3Npb25tYW5hZ2VtZW50c3lzdGVtIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2FkbWlzc2lvbm1hbmFnZW1lbnRzeXN0ZW0pIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfYWRtaXNzaW9ubWFuYWdlbWVudHN5c3RlbSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfYWRtaXNzaW9ubWFuYWdlbWVudHN5c3RlbSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAzbDcgM3Y1YzAgNS0zIDgtNyAxMC00LTItNy01LTctMTBWNnoiLz48cGF0aCBkPSJNOSAxMS41bDIgMiA0LTQuMiIvPjwvZz4KPC9zdmc+','online-adm':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9Imdfb25saW5lYWRtaXNzaW9ucyIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0VGOUM1NyIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjREU2RTMwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjQjg1NDIwIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X29ubGluZWFkbWlzc2lvbnMiIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMTkzMzVEIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF9vbmxpbmVhZG1pc3Npb25zIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX29ubGluZWFkbWlzc2lvbnMpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfb25saW5lYWRtaXNzaW9ucykiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfb25saW5lYWRtaXNzaW9ucykiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxjaXJjbGUgY3g9IjEyIiBjeT0iMTIiIHI9IjguNiIvPjxwYXRoIGQ9Ik0zLjQgMTJoMTcuMk0xMiAzLjRjMi42IDIuNiAyLjYgMTQuNiAwIDE3LjJNMTIgMy40Yy0yLjYgMi42LTIuNiAxNC42IDAgMTcuMiIvPjwvZz4KPC9zdmc+','chatbot':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfZWR1Y2F0aW9uYWljaGF0Ym90IiB4MT0iMCIgeTE9IjAiIHgyPSIxIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMkU1NDhGIi8+PHN0b3Agb2Zmc2V0PSIuNTUiIHN0b3AtY29sb3I9IiMxOTMzNUQiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwRTFGM0IiLz48L2xpbmVhckdyYWRpZW50Pgo8cmFkaWFsR3JhZGllbnQgaWQ9Imdsb3dfZWR1Y2F0aW9uYWljaGF0Ym90IiBjeD0iODIlIiBjeT0iMTYlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0RFNkUzMCIgc3RvcC1vcGFjaXR5PSIuMzgiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNERTZFMzAiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ2xfZWR1Y2F0aW9uYWljaGF0Ym90IiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2VkdWNhdGlvbmFpY2hhdGJvdCkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xvd19lZHVjYXRpb25haWNoYXRib3QpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsX2VkdWNhdGlvbmFpY2hhdGJvdCkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik00IDVoMTZ2MTFIOWwtNCA0VjV6Ii8+PHBhdGggZD0iTTEyIDguMmwuOCAyIDIgLjgtMiAuOEwxMiAxNGwtLjgtMi0yLS44IDItLjh6IiBzdHJva2Utd2lkdGg9IjEuNCIvPjwvZz4KPC9zdmc+','waba':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9Imdfd2hhdHNhcHBidXNpbmVzc2FwaSIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0VGOUM1NyIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjREU2RTMwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjQjg1NDIwIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X3doYXRzYXBwYnVzaW5lc3NhcGkiIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMTkzMzVEIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF93aGF0c2FwcGJ1c2luZXNzYXBpIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX3doYXRzYXBwYnVzaW5lc3NhcGkpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfd2hhdHNhcHBidXNpbmVzc2FwaSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfd2hhdHNhcHBidXNpbmVzc2FwaSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0zLjYgMjAuNGwxLjUtNC4zQTguMiA4LjIgMCAxIDEgMTIgMjAuMmE4LjIgOC4yIDAgMCAxLTQuMi0xLjJ6Ii8+PHBhdGggZD0iTTguNiA5LjRjMCAzLjIgMi44IDYgNiA2IC42IDAgMS4yLS41IDEuMi0xLjIgMC0uMy0uMi0uNy0uNi0uOWwtMS43LS43Yy0uNC0uMS0uOCAwLTEgLjNsLS40LjVjLTEuMS0uNS0yLTEuNC0yLjUtMi41bC41LS40Yy4zLS4yLjQtLjcuMy0xbC0uNy0xLjdjLS4yLS40LS41LS42LS45LS42LS43IDAtMS4yLjYtMS4yIDEuMnoiIHN0cm9rZS13aWR0aD0iMS40Ii8+PC9nPgo8L3N2Zz4=','ivr':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfaXZyc3lzdGVtIiB4MT0iMCIgeTE9IjAiIHgyPSIxIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMkU1NDhGIi8+PHN0b3Agb2Zmc2V0PSIuNTUiIHN0b3AtY29sb3I9IiMxOTMzNUQiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwRTFGM0IiLz48L2xpbmVhckdyYWRpZW50Pgo8cmFkaWFsR3JhZGllbnQgaWQ9Imdsb3dfaXZyc3lzdGVtIiBjeD0iODIlIiBjeT0iMTYlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0RFNkUzMCIgc3RvcC1vcGFjaXR5PSIuMzgiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNERTZFMzAiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ2xfaXZyc3lzdGVtIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2l2cnN5c3RlbSkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xvd19pdnJzeXN0ZW0pIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsX2l2cnN5c3RlbSkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik01IDRoNGwyIDUtMi41IDEuNWExMiAxMiAwIDAgMCA1IDVMMTYgMTNsNSAydjRhMiAyIDAgMCAxLTIgMkExNiAxNiAwIDAgMSAzIDZhMiAyIDAgMCAxIDItMnoiLz48L2c+Cjwvc3ZnPg==','mkt-auto':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfbWFya2V0aW5nYXV0b21hdGlvbiIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI0VGOUM1NyIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjREU2RTMwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjQjg1NDIwIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X21hcmtldGluZ2F1dG9tYXRpb24iIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMTkzMzVEIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF9tYXJrZXRpbmdhdXRvbWF0aW9uIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX21hcmtldGluZ2F1dG9tYXRpb24pIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfbWFya2V0aW5nYXV0b21hdGlvbikiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfbWFya2V0aW5nYXV0b21hdGlvbikiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0yMSAzTDMgMTAuNWw3IDIuNSAyLjUgN3oiLz48cGF0aCBkPSJNMjEgM2wtOSAxMCIvPjwvZz4KPC9zdmc+','nurture':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfbGVhZG51cnR1cmluZyIgeDE9IjAiIHkxPSIwIiB4Mj0iMSIgeTI9IjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzJFNTQ4RiIvPjxzdG9wIG9mZnNldD0iLjU1IiBzdG9wLWNvbG9yPSIjMTkzMzVEIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMEUxRjNCIi8+PC9saW5lYXJHcmFkaWVudD4KPHJhZGlhbEdyYWRpZW50IGlkPSJnbG93X2xlYWRudXJ0dXJpbmciIGN4PSI4MiUiIGN5PSIxNiUiIHI9IjcwJSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjREU2RTMwIiBzdG9wLW9wYWNpdHk9Ii4zOCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI0RFNkUzMCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJnbF9sZWFkbnVydHVyaW5nIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2xlYWRudXJ0dXJpbmcpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsb3dfbGVhZG51cnR1cmluZykiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xfbGVhZG51cnR1cmluZykiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAyMC4zcy03LjItNC42LTcuMi05LjhBMy42IDMuNiAwIDAgMSAxMiA4LjJhMy42IDMuNiAwIDAgMSA3LjIgMi4zYzAgNS4yLTcuMiA5LjgtNy4yIDkuOHoiLz48L2c+Cjwvc3ZnPg==','analytics':'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSI+CjxkZWZzPgo8bGluZWFyR3JhZGllbnQgaWQ9ImdfYW5hbHl0aWNzZGFzaGJvYXJkIiB4MT0iMCIgeTE9IjAiIHgyPSIxIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjRUY5QzU3Ii8+PHN0b3Agb2Zmc2V0PSIuNTUiIHN0b3AtY29sb3I9IiNERTZFMzAiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNCODU0MjAiLz48L2xpbmVhckdyYWRpZW50Pgo8cmFkaWFsR3JhZGllbnQgaWQ9Imdsb3dfYW5hbHl0aWNzZGFzaGJvYXJkIiBjeD0iODIlIiBjeT0iMTYlIiByPSI3MCUiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzE5MzM1RCIgc3RvcC1vcGFjaXR5PSIuMzgiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMxOTMzNUQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ2xfYW5hbHl0aWNzZGFzaGJvYXJkIiB4MT0iMCIgeTE9IjAiIHgyPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii4yMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+PC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iNTgiIGhlaWdodD0iNTgiIHJ4PSIxNyIgZmlsbD0idXJsKCNnX2FuYWx5dGljc2Rhc2hib2FyZCkiLz4KPHJlY3QgeD0iMyIgeT0iMyIgd2lkdGg9IjU4IiBoZWlnaHQ9IjU4IiByeD0iMTciIGZpbGw9InVybCgjZ2xvd19hbmFseXRpY3NkYXNoYm9hcmQpIi8+CjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSI1OCIgaGVpZ2h0PSI1OCIgcng9IjE3IiBmaWxsPSJ1cmwoI2dsX2FuYWx5dGljc2Rhc2hib2FyZCkiLz4KPHJlY3QgeD0iMy43NSIgeT0iMy43NSIgd2lkdGg9IjU2LjUiIGhlaWdodD0iNTYuNSIgcng9IjE2LjI1IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuMjIiIHN0cm9rZS13aWR0aD0iMS41Ii8+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE0IDE0KSBzY2FsZSgxLjUpIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS13aWR0aD0iMi4xIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik00IDIwVjEwTTEwIDIwVjRNMTYgMjB2LThNMjEuNSAyMGgtMTkiLz48L2c+Cjwvc3ZnPg==' };
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
    font-size:clamp(23px,3.3vw,40px); line-height:1.1; letter-spacing:-.02em; margin:0 0 12px; max-width:18ch; }#ee-vidya-suite .vsx-lead{ font-size:clamp(14px,1.6vw,16.5px); line-height:1.6; color:#c2d0e4; margin:0; max-width:62ch; }/* ---- stage / rail ---- */
  #ee-vidya-suite .vsx-stage{ margin-top:clamp(22px,3vw,38px); position:relative; }
  #ee-vidya-suite .vsx-arw{ display:none; }
  @media (max-width:900px){
    #ee-vidya-suite .vsx-arw{ display:flex; align-items:center; justify-content:center; position:absolute; top:46%; transform:translateY(-50%); z-index:6; width:28px; height:28px; border-radius:50%; border:1px solid rgba(255,255,255,.24); background:rgba(15,28,48,.55); -webkit-backdrop-filter:blur(6px); backdrop-filter:blur(6px); color:#fff; cursor:pointer; box-shadow:0 6px 16px rgba(0,0,0,.28); }
    #ee-vidya-suite .vsx-arw svg{ width:13px; height:13px; }
    #ee-vidya-suite .vsx-arw.vsx-prev{ left:2px; }
    #ee-vidya-suite .vsx-arw.vsx-next{ right:2px; }
  }
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
  #ee-vidya-suite.vsx-on .vsx-track{ height:420vh; }#ee-vidya-suite.vsx-on .vsx-sticky{ position:sticky; top:0; height:100vh; min-height:680px; margin-top:0; margin-bottom:0; border-radius:0; max-width:none;
    display:flex; flex-direction:column; justify-content:center; }#ee-vidya-suite.vsx-on .vsx-stage{ overflow:hidden; }#ee-vidya-suite.vsx-on .vsx-rail{ overflow:visible; scroll-snap-type:none; padding-bottom:0; flex-wrap:nowrap; will-change:transform; }#ee-vidya-suite.vsx-on .vsx-card{ flex:0 0 clamp(320px,30vw,420px); }#ee-vidya-suite.vsx-on .vsx-inner{ max-width:1280px; margin:0 auto; width:100%; padding:0 24px; }

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
          <span class="vsx-eyebrow"><i></i> Agentic AI Suite</span>
          <h2>Meet Vidya AI, the Agentic AI Suite Built for Smarter Admissions</h2>
          <p class="vsx-lead">Vidya AI is your always-on AI workforce that engages every prospective student, qualifies leads instantly, automates follow-ups, supports counselors, and accelerates enrollments - so your teams can focus on building meaningful student relationships instead of repetitive tasks.</p>
        </header>

        <div class="vsx-stage">
          <button class="vsx-arw vsx-prev" type="button" aria-label="Previous"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
          <button class="vsx-arw vsx-next" type="button" aria-label="Next"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
          <div class="vsx-rail" id="vsxRail">

            <article class="vsx-card" style="--ca:#2274ee">
              <a class="vsx-card-cta" href="#demo" aria-label="Book a demo">Demo <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
              <a class="vsx-card-cta" href="#demo" aria-label="Book a demo">Demo <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
              <a class="vsx-card-cta" href="#demo" aria-label="Book a demo">Demo <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
              <a class="vsx-card-cta" href="#demo" aria-label="Book a demo">Demo <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
              <a class="vsx-card-cta" href="#demo" aria-label="Book a demo">Demo <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
      var dist=track.offsetHeight - window.innerHeight;
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
    function evaluate(){ (mq.matches && !reduce) ? enable() : disable(); }

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
      <span class="ee-teams-eyebrow"><span class="ee-dot" aria-hidden="true"></span>One platform, every team</span>
      <h2>Built for Every Team Driving Student Enrollment</h2>
      <p class="ee-teams-lead">From marketing and admissions to counseling, finance, leadership, and AI-powered automation - ExtraaEdge brings every team together on one intelligent platform, helping institutions attract, engage, convert, and enroll more students with less effort.</p>
    </div>

    <div class="ee-teams-grid">
      <a class="ee-card" href="#demo">
        <span class="ee-chip" aria-hidden="true">&#127919;</span>
        <h3 class="ee-card-title">Marketing Teams</h3>
        <p class="ee-card-benefit">Capture every inquiry across channels and track which campaigns actually drive enrolled students, not just clicks.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#demo">
        <span class="ee-chip" aria-hidden="true">&#128222;</span>
        <h3 class="ee-card-title">Admissions Teams</h3>
        <p class="ee-card-benefit">Prioritize hot leads with smart scoring and automated follow-ups so no prospective student slips through the cracks.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#demo">
        <span class="ee-chip" aria-hidden="true">&#128172;</span>
        <h3 class="ee-card-title">Counseling Teams</h3>
        <p class="ee-card-benefit">Give counselors a full applicant history so every call, message, and meeting moves students closer to confirmation.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#demo">
        <span class="ee-chip ee-chip--img" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/vidya-ai.svg" alt="" loading="lazy" decoding="async"></span>
        <h3 class="ee-card-title">Vidya AI Agents</h3>
        <p class="ee-card-benefit">Engage and qualify applicants instantly, around the clock, answering queries and booking counseling slots on autopilot.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#demo">
        <span class="ee-chip" aria-hidden="true">&#128202;</span>
        <h3 class="ee-card-title">Leadership &amp; Analytics</h3>
        <p class="ee-card-benefit">See the full funnel in real time, from source to enrollment, and forecast intake with dashboards built for decisions.</p>
        <span class="ee-card-arrow" aria-hidden="true">See it in action
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/teams-icon-01.svg" alt="" width="14" height="14" loading="lazy" decoding="async">
        </span>
      </a>

      <a class="ee-card" href="#demo">
        <span class="ee-chip" aria-hidden="true">&#128179;</span>
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
      <p class="ee-eyebrow">Solutions</p>
      <h2>Solutions for every admissions motion</h2>
      <p class="ee-sub">From first enquiry to confirmed enrolment, ExtraaEdge brings the right workflow to every stage of your admissions journey - explore each category below.</p>
    </div>

    <div class="solb-grid">

      <article class="solb-card solb-a">
        <span class="solb-ghost" aria-hidden="true">01</span>
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-01.svg" alt="" loading="lazy" decoding="async">Admission Solutions</span>
        <h3>Run your core admissions engine end-to-end</h3>
        <p class="solb-desc">Capture, qualify, convert and enrol - one connected pipeline from first enquiry to fee paid.</p>
        <div class="solb-links">
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Admission Management</b><span>Track every applicant in one live pipeline</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Enrollment Management</b><span>Move offers to enrolled &amp; fee-paid, faster</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Walk-in Management</b><span>Log, assign &amp; follow up every campus visit</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
        </div>
      </article>

      <article class="solb-card solb-b">
        <span class="solb-ghost" aria-hidden="true">02</span>
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-03.svg" alt="" loading="lazy" decoding="async">Study Abroad</span>
        <h3>Purpose-built for overseas education counselling</h3>
        <p class="solb-desc">Manage country, course and intake journeys - with full visibility over agents and consultants.</p>
        <div class="solb-links">
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Study Abroad CRM</b><span>Country, course &amp; intake pipelines in one place</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Education Agents</b><span>Onboard &amp; track sub-agents with clear visibility</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Education Consultants</b><span>Counsellor workflows for visa, docs &amp; apps</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
        </div>
      </article>

      <article class="solb-card solb-c">
        <span class="solb-ghost" aria-hidden="true">03</span>
        <span class="solb-tag"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-04.svg" alt="" loading="lazy" decoding="async">Recruitment &amp; Lead Management</span>
        <h3>Fill your funnel - and never let a lead go cold</h3>
        <p class="solb-desc">Source, score, route and nurture every enquiry automatically, from first touch to enrolled.</p>
        <div class="solb-links">
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Student Recruitment</b><span>Source verified enquiries from every channel</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Lead Management</b><span>Score, route &amp; prioritise leads automatically</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Lead Nurturing</b><span>Automated drips across WhatsApp, email &amp; SMS</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
          <a class="solb-link" href="#demo"><span class="solb-chk" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-05.svg" alt="" loading="lazy" decoding="async"></span><span class="solb-lt"><b>Enrollment CRM</b><span>One CRM from first touch to enrolled</span></span><span class="solb-arr" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/solutions-icon-06.svg" alt="" loading="lazy" decoding="async"></span></a>
        </div>
      </article>

      <aside class="solb-card solb-d">
        <h3>Not sure which solution fits?</h3>
        <p class="solb-desc">Tell us your admissions motion - we&rsquo;ll map the right workflow live on your own funnel in a 45-minute demo.</p>
        <a class="solb-cta" href="#demo">Book a Demo <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
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
      <span class="eei-eyebrow"><span class="eei-dot" aria-hidden="true"></span>Industries</span>
      <h2>Built for every kind of institution</h2>
      <p>One AI-powered admissions platform, tuned to the way your category recruits, nurtures and enrols students.</p>
    </div>

    <div class="spx-grid">
      <a class="spx-card" href="#demo" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8z"/></svg></span>
        <h3>EdTech</h3>
        <p>You buy leads by the thousand - every enquiry has to convert.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 5a2 2 0 0 1 2-2h10v16H7a2 2 0 0 0-2 2z"/><path d="M17 3v16"/></svg></span>
        <h3>Coaching &amp; Training</h3>
        <p>Batches fill on deadlines - every enquiry counts.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V10l7-5 7 5v11M10 21v-6h4v6"/></svg></span>
        <h3>K-12 Schools</h3>
        <p>Parents take months to choose - trust wins the seat.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 2.6 5.6L21 9.3l-4.6 4.3 1.1 6.1L12 17l-5.5 2.7 1-6.1L3 9.3l6.4-.7z"/></svg></span>
        <h3>Preschools &amp; Playschools</h3>
        <p>It&rsquo;s their first school - reassurance closes the admission.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4"/></svg></span>
        <h3>Online Degree Programmes</h3>
        <p>You compete nationally for every learner.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1.3 3 3 6 3s6-1.7 6-3v-5"/></svg></span>
        <h3>Higher Education</h3>
        <p>Many programmes, many counsellors - one admissions engine.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#E8843F;--g2:#DE6E30">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18"/></svg></span>
        <h3>Study Abroad Consultants</h3>
        <p>A single student journey can run for a year.</p>
        <span class="spx-go">Explore <svg viewBox="0 0 24 24"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span>
      </a>

      <a class="spx-card" href="#demo" style="--g1:#2A4E85;--g2:#19335D">
        <span class="spx-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M9 15l6-6M10 6l1-1a4 4 0 0 1 6 6l-1 1M14 18l-1 1a4 4 0 0 1-6-6l1-1"/></svg></span>
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
      <span class="cis-eyebrow"><span class="d"></span> CRM Impact Stories</span>
      <h2 class="cis-title" id="stories-title">Powering growth for <em>500+ happy customers</em></h2>
      <p class="cis-lead">Real admissions leaders and the stories behind them. See how institutions grow with ExtraaEdge.</p>
    </div>

    <div class="cis-grid">

      <article class="cis-card">
        <div class="cis-video" data-yt="3SHgLf1GFgk" role="button" tabindex="0" aria-label="Play video testimonial: Silky Jain Marwah, Tula's Institute">
          <img src="https://img.youtube.com/vi/3SHgLf1GFgk/hqdefault.jpg" alt="Silky Jain Marwah, Executive Director, Tula's Institute - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-body">
          <div class="cis-stars" aria-label="Rated 5 out of 5 stars"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"></div>
          <p class="cis-quote"><span>ExtraaEdge is an incredibly dynamic and trustworthy platform that truly understands our needs. Most changes we require are implemented in a very short span of time, and creating reports on our own has been a game-changer.</span></p>
          <div class="cis-author">
            <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp" alt="Silky Jain Marwah" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">SJ</span></span>
            <div><div class="cis-aname">Silky Jain Marwah</div><div class="cis-arole">Executive Director &middot; Tula's Institute</div></div>
          </div>
        </div>
      </article>

      <article class="cis-card">
        <div class="cis-video" data-yt="dWLdQ8E3FOU" role="button" tabindex="0" aria-label="Play video testimonial: Pranay Rupani, Annapurna College of Film &amp; Media">
          <img src="https://img.youtube.com/vi/dWLdQ8E3FOU/hqdefault.jpg" alt="Pranay Rupani, Head of Admissions &amp; Marketing, Annapurna College of Film &amp; Media - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-body">
          <div class="cis-stars" aria-label="Rated 5 out of 5 stars"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"></div>
          <p class="cis-quote"><span>A true game-changer for us at Annapurna College. From seamless WhatsApp integrations to automated workflows, our entire lead journey is now streamlined and measurable. The team's dedication makes them indispensable.</span></p>
          <div class="cis-author">
            <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp" alt="Pranay Rupani" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">PR</span></span>
            <div><div class="cis-aname">Pranay Rupani</div><div class="cis-arole">Head of Admissions &amp; Marketing &middot; Annapurna College of Film &amp; Media</div></div>
          </div>
        </div>
      </article>

      <article class="cis-card">
        <div class="cis-video" data-yt="yfK83D2SKps" role="button" tabindex="0" aria-label="Play video testimonial: K. Nirmala Devi, Indian Academy Group">
          <img src="https://img.youtube.com/vi/yfK83D2SKps/hqdefault.jpg" alt="K. Nirmala Devi, Assistant Manager, Indian Academy Group - ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-body">
          <div class="cis-stars" aria-label="Rated 5 out of 5 stars"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-01.svg" alt="" loading="lazy" decoding="async"></div>
          <p class="cis-quote"><span>Very user-friendly and fully customizable to our needs. Tracking the lead journey is smooth, and the technical team is accessible anytime - they resolve issues immediately without any delays.</span></p>
          <div class="cis-author">
            <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp" alt="K. Nirmala Devi" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">KN</span></span>
            <div><div class="cis-aname">K. Nirmala Devi</div><div class="cis-arole">Assistant Manager &middot; Indian Academy Group</div></div>
          </div>
        </div>
      </article>

    </div>

    <div class="cis-cta">
      <a class="cis-btn primary" href="https://www.extraaedge.com/book-a-demo/">Book demo Now <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/stories-icon-03.svg" alt="" loading="lazy" decoding="async"></a>
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
})();
</script>

<section id="ee-cro" aria-label="Why teams choose ExtraaEdge + ROI calculator">
  <div class="cw">
    <div class="ch">
      <span class="eyebrow"><i></i> Why teams switch to us</span>
      <h2>The only <em>AI-native</em> Admission CRM</h2>
      <p>Others automate. ExtraaEdge actually <b>calls, qualifies and follows up</b> with every student using AI - so your team only talks to ready-to-enrol leads.</p>
    </div>
    <div class="cmp" role="table" aria-label="Feature comparison">
      <div class="cmp-row head" role="row"><div>Capability</div><div class="us">ExtraaEdge</div><div>Other CRMs</div><div>Generic tools</div></div>
      <div class="cmp-row"><div class="feat">AI Voice Agent (calls leads in 10+ languages)</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="no">-</span></div><div class="cell"><span class="no">-</span></div></div>
      <div class="cmp-row"><div class="feat">24&times;7 AI chat counsellor (VidyaGPT)</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="part">Basic bot</span></div><div class="cell"><span class="part">Basic bot</span></div></div>
      <div class="cmp-row"><div class="feat">Real-time AI lead intent scoring</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="part">Rule-based</span></div><div class="cell"><span class="part">Rule-based</span></div></div>
      <div class="cmp-row"><div class="feat">Official WhatsApp Business API automation</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="yes">&#10003;</span></div><div class="cell"><span class="yes">&#10003;</span></div></div>
      <div class="cmp-row"><div class="feat">Built only for admissions</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="yes">&#10003;</span></div><div class="cell"><span class="part">Generic CRM</span></div></div>
      <div class="cmp-row"><div class="feat">Go live in 7 days</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="part">Weeks</span></div><div class="cell"><span class="part">Weeks</span></div></div>
      <div class="cmp-row"><div class="feat">Free migration &amp; 1:1 onboarding</div><div class="cell us"><span class="yes">&#10003;</span></div><div class="cell"><span class="no">-</span></div><div class="cell"><span class="no">-</span></div></div>
    </div>
    <p class="cmp-note">Comparison based on publicly listed features (Jun 2026) - verify for your exact requirements. Switching from another CRM? We migrate your data free.</p>
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
        <a href="#demo" class="cta">Get my detailed ROI report &rarr;</a>
        <div class="fine">Projection based on a typical +40% conversion lift. Book a demo for numbers on your real funnel.</div>
      </div>
    </div>
  </div>
</section>
<div id="ee-sticky" aria-hidden="true">
  <div class="sw">
    <div class="txt">🎓 <b>Fill more seats this cycle.</b><span class="hide"> See ExtraaEdge on your funnel in 30 minutes.</span></div>
    <div class="sp"><a href="#demo" class="go">Book a Free Demo &rarr;</a><button class="x" aria-label="Dismiss" id="eeStickyX">&times;</button></div>
  </div>
</div>
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
    [i1,i2,i3].forEach(function(s){s.addEventListener('input',calc);}); calc();
  }
  /* sticky CTA - show after scrolling past the hero, hide near the final demo form */
  var bar=document.getElementById('ee-sticky'); 
  if(bar){
    var dismissed=false;
    var x=document.getElementById('eeStickyX'); if(x) x.addEventListener('click',function(){dismissed=true;bar.classList.remove('show');});
    bar.querySelector('.go').addEventListener('click',function(){bar.classList.remove('show');});
    var hero=document.getElementById('xhero'), demo=document.getElementById('demo');
    function upd(){
      if(dismissed){bar.classList.remove('show');return;}
      var y=window.pageYOffset, past=hero?(y>hero.offsetHeight*0.9):(y>500);
      var nearDemo=demo?(y+window.innerHeight > demo.offsetTop+80):false;
      bar.classList.toggle('show', past && !nearDemo);
    }
    window.addEventListener('scroll',upd,{passive:true}); window.addEventListener('resize',upd,{passive:true}); upd();
  }
})();
</script>

<!-- ===================== EE · WHILE YOUR CAMPUS SLEEPS (admission operating system story) ===================== -->
<style>#ee-night{position:relative;width:100%;background:#0f2444}
/* scroll-driven storytelling: tall track + sticky pinned viewport.
   Pin sits BELOW the sticky site header (≈90px) so the story isn't hidden. */
#ee-night .een-track{position:relative;height:640vh}
#ee-night .een-pin{position:sticky;top:90px;height:calc(100vh - 90px);overflow:hidden}
#ee-night iframe{display:block;width:100%;height:100%;border:0;background:#0f2444}
/* phones: no pinning - keep the normal auto-play + side-arrow story */
@media(max-width:960px){
  #ee-night .een-track{height:auto}
  #ee-night .een-pin{position:static;height:auto;overflow:visible}
  #ee-night iframe{height:auto;min-height:640px}
  /* any sizing slack around the story must never show as a dark band between sections */
  #ee-night,#ee-night iframe{background:#fff}
}
</style>
<section id="ee-night" aria-label="The admission operating system in action">
  <div class="een-track" id="eenTrack">
  <div class="een-pin">
  <iframe id="eeNightFrame" title="ExtraaEdge - the admission operating system, from lead to enrolled" loading="lazy" scrolling="no" sandbox="allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox" srcdoc="<!DOCTYPE html>
<html lang=&quot;en&quot;>
<head>
<meta charset=&quot;UTF-8&quot;>
<meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;>
<meta name=&quot;robots&quot; content=&quot;noindex, nofollow&quot;>
<title>ExtraaEdge - While Your Campus Sleeps</title>
<link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot;>
<link rel=&quot;preconnect&quot; href=&quot;https://fonts.gstatic.com&quot; crossorigin>
<link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap&quot; rel=&quot;stylesheet&quot;>
<style>:root{
  --orange:#DE6E30;--orange2:#E8843F;
  --wa:#25D366;--wadark:#075E54;--green:#2BC98A;--blue:#4E86D8;--red:#E5484D;
  --bg:#0F2144;--bg2:#132a55;--fg:#fff;--sub:rgba(255,255,255,.62);--faint:rgba(255,255,255,.36);--hair:rgba(255,255,255,.10);--panel:rgba(255,255,255,.05);
}body.day{--bg:#fff;--bg2:#FBF6F1;--fg:#19335D;--sub:#7C8698;--faint:#A9B2C1;--hair:#ECEEF4;--panel:#fff}*{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth;-webkit-font-smoothing:antialiased}body{font-family:'Inter',system-ui,sans-serif;color:var(--fg);background:linear-gradient(var(--bg),var(--bg2));transition:background 1.2s,color 1.2s}::selection{background:rgba(222,110,48,.25)}h1,h2{font-family:'Inter',sans-serif;letter-spacing:-.02em;color:var(--fg);transition:color 1.2s}.o{color:var(--orange)}.rev{opacity:0;transform:translateY(18px);transition:opacity .55s,transform .55s}.rev.in{opacity:1;transform:none}.d1{transition-delay:.08s}.d2{transition-delay:.16s}#sky{position:fixed;inset:0;pointer-events:none;z-index:0;transition:opacity 1.4s;
  background-image:radial-gradient(1.5px 1.5px at 12% 18%,rgba(255,255,255,.7),transparent),radial-gradient(1px 1px at 28% 64%,rgba(255,255,255,.5),transparent),radial-gradient(1.5px 1.5px at 44% 30%,rgba(255,255,255,.6),transparent),radial-gradient(1px 1px at 61% 74%,rgba(255,255,255,.45),transparent),radial-gradient(2px 2px at 72% 12%,rgba(255,255,255,.65),transparent),radial-gradient(1px 1px at 84% 48%,rgba(255,255,255,.5),transparent);
  animation:twinkle 5s ease-in-out infinite}body.day #sky{opacity:0}
@keyframes twinkle{50%{opacity:.55}}
@keyframes blink{50%{opacity:.35}}/* ============ PLAYER ============ */
.player{position:relative;z-index:1;min-height:100vh;min-height:100svh;display:grid;grid-template-columns:minmax(320px,38%) 1fr;gap:3vw;max-width:1280px;margin:0 auto;padding:26px 4vw;align-items:center}.pleft{display:flex;flex-direction:column;justify-content:center}.kick{font:600 10.5px/1 Inter;letter-spacing:.24em;text-transform:uppercase;color:var(--orange2)}.pleft h1{font-size:clamp(28px,3.4vw,44px);font-weight:800;line-height:1.1;margin:12px 0 8px;max-width:18ch}.pleft .lede{color:var(--sub);font-size:13.5px;line-height:1.55;max-width:40ch;transition:color 1.2s}/* step list */
.steps{margin-top:24px;display:flex;flex-direction:column;gap:4px}.step{position:relative;display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:12px;cursor:pointer;border:1px solid transparent;transition:background .3s,border-color .3s;user-select:none}.step:hover{background:var(--panel)}.step.on{background:var(--panel);border-color:var(--hair);box-shadow:0 10px 30px rgba(3,10,26,.18)}body.day .step.on{box-shadow:0 10px 30px rgba(25,51,93,.08)}.step .tno{font:700 10px/1 ui-monospace,Menlo,monospace;color:var(--faint);width:20px;flex:none;transition:color .3s}.step.on .tno{color:var(--orange)}.step .tt{flex:1;min-width:0}.step .tt b{font:600 13px/1.3 Inter;color:var(--fg);display:block;transition:color 1.2s}.step .tt span{font:500 10.5px/1 Inter;color:var(--faint);transition:color 1.2s}.step .tm{font:600 10.5px/1 ui-monospace,Menlo,monospace;color:var(--sub);flex:none;transition:color 1.2s}.step.on .tm{color:var(--orange)}.step .pbar{position:absolute;left:12px;right:12px;bottom:4px;height:2px;border-radius:2px;background:var(--hair);overflow:hidden;opacity:0;transition:opacity .3s}.step.on .pbar{opacity:1}.step .pbar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--orange2),var(--orange))}.step.done .tno{color:var(--green)}.pctrl{display:flex;align-items:center;gap:10px;margin-top:16px}.pbtn{width:34px;height:34px;border-radius:50%;border:1px solid var(--hair);background:var(--panel);color:var(--fg);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:border-color .3s,background 1.2s,color 1.2s}.pbtn:hover{border-color:var(--orange)}.pctrl span{font:500 10.5px/1 Inter;color:var(--faint);transition:color 1.2s}/* stage */
.pright{display:flex;flex-direction:column;align-items:center;justify-content:center}.stage{position:relative;width:100%;max-width:680px;height:min(700px,80vh);display:flex;align-items:center;justify-content:center}.shot{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;opacity:0;transform:translateY(16px) scale(.97);transition:opacity .45s,transform .45s;pointer-events:none}.shot.on{opacity:1;transform:none;pointer-events:auto;transition-delay:.08s}.evcap{margin-top:15px;text-align:center;font:500 13px/1.55 Inter;color:var(--sub);max-width:430px;transition:color 1.2s}/* phone */
.phone{position:relative;width:330px;background:#000;border-radius:42px;padding:10px;box-shadow:0 0 0 1.5px rgba(255,255,255,.12),0 26px 60px rgba(3,10,26,.5);transition:box-shadow 1.2s}body.day .phone{box-shadow:0 0 0 1.5px #D8DEE9,0 26px 60px rgba(25,51,93,.18)}.phone .screen{border-radius:33px;overflow:hidden;background:#fff;position:relative;height:580px;display:flex;flex-direction:column}.notch{position:absolute;top:14px;left:50%;transform:translateX(-50%);width:92px;height:24px;background:#000;border-radius:999px;z-index:5;display:flex;align-items:center;justify-content:flex-end;padding-right:12px}.notch::after{content:&quot;&quot;;width:8px;height:8px;border-radius:50%;background:radial-gradient(circle at 35% 30%,#3b4d61,#000 72%);box-shadow:inset 0 0 0 1px rgba(255,255,255,.08)}/* app window */
.appwin{width:min(600px,100%);border-radius:14px;overflow:hidden;background:#fff;box-shadow:0 0 0 1px rgba(255,255,255,.1),0 26px 60px rgba(3,10,26,.5);transition:box-shadow 1.2s}body.day .appwin{box-shadow:0 0 0 1px #E6E9F0,0 26px 60px rgba(25,51,93,.14)}.appbar{display:flex;align-items:center;gap:9px;background:#F7F8FB;border-bottom:1px solid #ECEEF4;padding:10px 14px}.appbar .wd{display:flex;gap:5px}.appbar .wd i{width:8px;height:8px;border-radius:50%}.appbar .wd i:nth-child(1){background:#FF5F57}.appbar .wd i:nth-child(2){background:#FEBC2E}.appbar .wd i:nth-child(3){background:#28C840}.appbar .url{flex:1;background:#fff;border:1px solid #ECEEF4;border-radius:8px;padding:7px 12px;font:500 11px/1 Inter;color:#7C8698;display:flex;align-items:center;gap:6px;white-space:nowrap;overflow:hidden}.apptop{display:flex;align-items:center;gap:9px;padding:12px 16px;border-bottom:1px solid #ECEEF4}.apptop .alogo{width:24px;height:24px;border-radius:6px;background:conic-gradient(from 200deg,#DE6E30,#19335D 55%,#DE6E30);flex:none}.apptop b{font:700 13.5px/1 Inter;color:#19335D}.apptop .crumb{font:500 11.5px/1 Inter;color:#A9B2C1}.apptop .lvpill{margin-left:auto;font:600 10.5px/1 Inter;color:#1FAF66;background:#E7F8EF;padding:4px 8px;border-radius:999px;display:flex;align-items:center;gap:5px}.apptop .lvpill::before{content:&quot;&quot;;width:5px;height:5px;border-radius:50%;background:#1FAF66;animation:blink 1.4s infinite}.appbody{padding:16px 18px;color:#22314A}.leadhead{display:flex;align-items:center;gap:12px;margin-bottom:13px}.lava{width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,#8FB2E8,#4E86D8);color:#fff;display:flex;align-items:center;justify-content:center;font:700 16px/1 Inter;flex:none}.leadhead .ln b{font:700 16px/1.2 Inter;color:#19335D;display:flex;align-items:center;gap:6px}.leadhead .ln b .new{font:700 9.5px/1 Inter;letter-spacing:.08em;color:#DE6E30;background:#FDF1E9;padding:3px 6px;border-radius:5px}.leadhead .ln span{font:500 11.5px/1 Inter;color:#A9B2C1;display:block;margin-top:3px}.grid2{display:grid;grid-template-columns:1fr 1fr;gap:9px}.fld{background:#F9FAFC;border:1px solid #EFF1F6;border-radius:10px;padding:10px 12px}.fld span{font:600 9.5px/1 Inter;letter-spacing:.1em;text-transform:uppercase;color:#A9B2C1;display:block;margin-bottom:5px}.fld b{font:600 13px/1.35 Inter;color:#22314A}.fld b.hl{color:#DE6E30}.appfoot{display:flex;gap:9px;margin-top:14px}.abtn{flex:1;text-align:center;font:600 12.5px/1 Inter;border-radius:9px;padding:11px 0}.abtn.pr{background:linear-gradient(90deg,#E8843F,#DE6E30);color:#fff}.abtn.sec{border:1px solid #ECEEF4;color:#19335D}/* whatsapp */
.wchat{flex:1;display:flex;flex-direction:column;background:#EFE7DD}.whead{background:var(--wadark);color:#fff;display:flex;align-items:center;gap:10px;padding:32px 14px 11px}.whead .wava{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#E8843F,#DE6E30);display:flex;align-items:center;justify-content:center;font:700 14px/1 Inter;flex:none}.whead .wn{flex:1;min-width:0}.whead .wn b{font:600 14.5px/1.2 Inter;display:flex;align-items:center;gap:5px}.whead .wn b .vf{width:12px;height:12px;border-radius:50%;background:#25A9E0;display:inline-flex;align-items:center;justify-content:center;color:#fff;font-size:7px;flex:none}.whead .wn span{font:400 11px/1 Inter;opacity:.8}.wbody{flex:1;padding:13px 12px;display:flex;flex-direction:column;gap:8px;overflow:hidden}.wmsg{max-width:84%;border-radius:10px;padding:8px 11px 7px;font:400 13.5px/1.45 Inter;color:#111;box-shadow:0 1px 1px rgba(0,0,0,.08)}.wmsg .wtm{display:inline-flex;align-items:center;gap:3px;font:400 10px/1 Inter;color:#8696A0;margin-left:7px;position:relative;top:3px;float:right}.wmsg.in{background:#fff;align-self:flex-start;border-top-left-radius:2px}.wmsg.out{background:#DCF8C6;align-self:flex-end;border-top-right-radius:2px}.ticks{color:#4FC3F7;font-size:9px;letter-spacing:-2px}.wdate{align-self:center;background:#E1F2FA;border-radius:7px;padding:5px 11px;font:500 10.5px/1 Inter;color:#5B6B76}.wtyping{align-self:flex-start;background:#fff;border-radius:8px;border-top-left-radius:2px;padding:8px 11px;display:flex;gap:4px;box-shadow:0 1px 1px rgba(0,0,0,.08)}.wtyping i{width:5px;height:5px;border-radius:50%;background:#9AA7B0;animation:ty 1s infinite}.wtyping i:nth-child(2){animation-delay:.15s}.wtyping i:nth-child(3){animation-delay:.3s}
@keyframes ty{0%,100%{transform:translateY(0);opacity:.4}50%{transform:translateY(-3px);opacity:1}}.winput{display:flex;align-items:center;gap:8px;padding:9px 12px 16px;background:#EFE7DD}.winput .wfield{flex:1;background:#fff;border-radius:999px;padding:11px 16px;font:400 12.5px/1 Inter;color:#8696A0}.winput .wmic{width:40px;height:40px;border-radius:50%;background:var(--wa);flex:none;display:flex;align-items:center;justify-content:center}/* score */
.scorehead{display:flex;align-items:center;justify-content:space-between;margin-bottom:9px}.scorehead b{font:700 14.5px/1 Inter;color:#19335D}.scorenum{font:800 30px/1 Inter;color:#DE6E30}.factor{margin-bottom:11px}.factor .fl{display:flex;justify-content:space-between;font:500 12px/1.3 Inter;color:#7C8698;margin-bottom:5px;gap:10px}.factor .fl b{color:#22314A;font-weight:600;text-align:right}.factor .fb{height:8px;border-radius:4px;background:#F1F3F7;overflow:hidden}.factor .fb i{display:block;height:100%;border-radius:4px;background:linear-gradient(90deg,#E8843F,#DE6E30);width:0;transition:width .9s ease}.shot.on .factor .fb i{width:var(--w)}.shot.on .factor:nth-child(3) .fb i{transition-delay:.12s}.shot.on .factor:nth-child(4) .fb i{transition-delay:.24s}.shot.on .factor:nth-child(5) .fb i{transition-delay:.36s}.scoreverdict{margin-top:12px;background:#FDF1E9;border:1px solid #F6D9C4;border-radius:10px;padding:11px 13px;font:600 12.5px/1.45 Inter;color:#B4571F}/* call */
.callscr{flex:1;display:flex;flex-direction:column;align-items:center;background:linear-gradient(180deg,#12233F,#0A1526);color:#fff;padding-top:36px}.callscr .cava{width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#E8843F,#DE6E30);display:flex;align-items:center;justify-content:center;font:700 25px/1 Inter;margin-bottom:13px;box-shadow:0 0 0 9px rgba(222,110,48,.12),0 0 0 19px rgba(222,110,48,.05)}.callscr .cname{font:600 17.5px/1.2 Inter}.callscr .cnum{font:400 12.5px/1 Inter;opacity:.65;margin-top:4px}.callscr .cstate{font:500 11.5px/1 Inter;color:#2BC98A;margin-top:8px;display:flex;align-items:center;gap:5px}.callscr .cstate::before{content:&quot;&quot;;width:5px;height:5px;border-radius:50%;background:#2BC98A;animation:blink 1.4s infinite}.callscr .ctimer{font:600 27px/1 Inter;font-variant-numeric:tabular-nums;margin-top:10px;letter-spacing:.04em}.transcript{width:calc(100% - 28px);margin:16px 14px 0;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:13px;padding:12px 13px;text-align:left}.transcript .tl{font:600 10px/1 Inter;letter-spacing:.16em;text-transform:uppercase;opacity:.5;margin-bottom:7px;display:flex;align-items:center;gap:5px}.transcript .tl::before{content:&quot;&quot;;width:5px;height:5px;border-radius:50%;background:#E5484D;animation:blink 1.2s infinite}.tline{font:400 12.5px/1.55 Inter;opacity:0;transform:translateY(5px);transition:opacity .45s,transform .45s;margin-bottom:5px}.tline b{font-weight:600;color:#F0A776}.tline.stu b{color:#8FB8F5}.shot.on .tline{opacity:.92;transform:none}.shot.on .tline:nth-child(2){transition-delay:.4s}.shot.on .tline:nth-child(3){transition-delay:1.1s}.shot.on .tline:nth-child(4){transition-delay:1.8s}.callbtns{margin-top:auto;display:flex;gap:36px;padding:18px 0 24px}.cbtn{width:54px;height:54px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,.12)}.cbtn.end{background:#E5484D}/* assign */
.assign{display:flex;align-items:flex-start;gap:9px}.assign .aicon{width:38px;height:38px;border-radius:8px;background:#FDF1E9;color:#DE6E30;flex:none;display:flex;align-items:center;justify-content:center}.assign h3{font:700 14.5px/1.35 Inter;color:#19335D}.assign p{font:400 12.5px/1.55 Inter;color:#7C8698;margin-top:4px}.attach{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}.att{display:flex;align-items:center;gap:6px;border:1px solid #ECEEF4;border-radius:9px;padding:8px 12px;font:600 11.5px/1 Inter;color:#22314A;background:#F9FAFC}.sla{margin-top:13px;display:flex;align-items:center;gap:9px;font:600 11.5px/1 Inter;color:#1FAF66}.sla .slabar{flex:1;height:7px;border-radius:4px;background:#F1F3F7;overflow:hidden}.sla .slabar i{display:block;height:100%;width:0;background:#2BC98A;transition:width 1.2s ease .25s}.shot.on .sla .slabar i{width:88%}/* payment */
.payscr{flex:1;display:flex;flex-direction:column;background:#F6F8FB}.payhead{background:#19335D;color:#fff;padding:34px 17px 14px;font:600 14px/1 Inter;display:flex;align-items:center;gap:7px}.paybody{flex:1;display:flex;flex-direction:column;align-items:center;padding:24px 17px}.payck{width:68px;height:68px;border-radius:50%;background:#E7F8EF;color:#1FAF66;display:flex;align-items:center;justify-content:center;margin-bottom:11px}.payck svg,.payck img.eeimg{width:33px;height:33px}.paybody h3{font:700 17px/1.2 Inter;color:#19335D}.payamt{font:800 32px/1 Inter;color:#19335D;margin:10px 0 3px}.paysub{font:400 12px/1 Inter;color:#7C8698}.payrows{width:100%;margin-top:16px;background:#fff;border:1px solid #ECEEF4;border-radius:13px;padding:4px 14px}.payrows .pr{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid #F1F3F7;font:400 12px/1.35 Inter;color:#7C8698;gap:8px}.payrows .pr:last-child{border-bottom:none}.payrows .pr b{color:#22314A;font-weight:600;text-align:right}.paypill{margin-top:15px;background:#E7F8EF;color:#1FAF66;font:700 11.5px/1 Inter;letter-spacing:.08em;padding:10px 17px;border-radius:999px}/* ============ FLOWLINE RECAP ============ */
.flow{position:relative;z-index:1;padding:44px 4vw 40px;border-top:1px solid var(--hair);transition:border-color 1.2s}.flow h2{text-align:center;font-size:clamp(20px,2.6vw,30px);font-weight:800}.flowline{display:flex;align-items:flex-start;justify-content:space-between;max-width:1080px;margin:28px auto 0;position:relative}.flowline::before{content:&quot;&quot;;position:absolute;left:3%;right:3%;top:17px;height:2px;background:var(--hair);transition:background 1.2s}.fnode{position:relative;flex:1;text-align:center;min-width:0}.fnode .fdot{width:36px;height:36px;border-radius:50%;margin:0 auto 8px;background:var(--bg);border:2px solid var(--hair);display:flex;align-items:center;justify-content:center;position:relative;transition:background 1.2s,border-color .3s}.fnode .fdot svg,.fnode .fdot img.eeimg{width:16px;height:16px}.fnode b{font:600 10.5px/1.3 Inter;color:var(--fg);display:block;transition:color 1.2s}.fnode span{font:600 9px/1 ui-monospace,Menlo,monospace;color:var(--faint);display:block;margin-top:3px;transition:color 1.2s}.fnode.hot .fdot{border-color:var(--orange);box-shadow:0 0 0 5px rgba(222,110,48,.14)}/* ============ FOOTER BANDS ============ */
.band{position:relative;z-index:1;padding:38px 4vw;border-top:1px solid var(--hair);transition:border-color 1.2s}.bandgrid{display:grid;grid-template-columns:1.1fr 1fr;gap:34px;max-width:1080px;margin:0 auto;align-items:center}.modrow{display:flex;flex-wrap:wrap;gap:7px}.modpill{display:flex;align-items:center;gap:6px;border:1px solid var(--hair);border-radius:999px;padding:7px 12px;font:600 10.5px/1 Inter;color:var(--fg);background:var(--panel);transition:color 1.2s,border-color 1.2s,background 1.2s}.modpill svg,.modpill img.eeimg{width:12px;height:12px;flex:none}.bandgrid h2{font-size:clamp(20px,2.4vw,28px);font-weight:800;line-height:1.15}.bandgrid .bp{color:var(--sub);font-size:12.5px;line-height:1.55;margin-top:8px;transition:color 1.2s}.numrow{display:flex;gap:26px;flex-wrap:wrap;margin-top:6px}.num .nv{font:800 clamp(30px,3.6vw,44px)/1 'Inter',sans-serif;color:var(--orange)}.num .nd{margin-top:6px;font-size:10.5px;color:var(--sub);max-width:16ch;line-height:1.5;transition:color 1.2s}.ctaband{display:flex;align-items:center;justify-content:space-between;gap:22px;max-width:1080px;margin:0 auto;flex-wrap:wrap}.ctaband h2{font-size:clamp(22px,2.8vw,34px);font-weight:800;line-height:1.15}.ctaband p{color:var(--sub);font-size:12.5px;margin-top:6px;transition:color 1.2s}.cta{display:inline-block;background:linear-gradient(90deg,var(--orange2),var(--orange));color:#fff;font:700 14.5px/1 'Inter',sans-serif;text-decoration:none;border-radius:12px;padding:16px 28px;box-shadow:0 12px 30px rgba(222,110,48,.4);transition:transform .15s,box-shadow .15s;white-space:nowrap}.cta:hover{transform:translateY(-2px);box-shadow:0 16px 38px rgba(222,110,48,.5)}.trust{display:flex;flex-wrap:wrap;gap:8px 22px;margin-top:14px}.trust span{font:600 9.5px/1 Inter;letter-spacing:.1em;text-transform:uppercase;color:var(--faint);display:flex;align-items:center;gap:6px;transition:color 1.2s}.trust span::before{content:&quot;&quot;;width:4px;height:4px;border-radius:50%;background:var(--orange2)}

@media (max-width:960px){.player{grid-template-columns:1fr;gap:14px;padding:18px 5vw 16px;align-items:start;min-height:0}.pleft h1{font-size:26px}.steps{flex-direction:row;gap:5px;margin-top:14px}.step{flex:1;padding:0;height:4px;border-radius:3px;background:var(--hair);border:none;overflow:hidden}.step .tno,.step .tt,.step .tm{display:none}.step .pbar{position:static;opacity:1;height:100%;background:transparent}.step.done .pbar i{width:100%!important}.stage{height:640px;max-width:100%}.bandgrid{grid-template-columns:1fr;gap:20px}.flowline{flex-wrap:wrap;gap:14px 0}.flowline::before{display:none}.fnode{flex:0 0 33%}.ctaband{justify-content:center;text-align:center}
}
@media (max-width:380px){.phone{width:290px}.phone .screen{height:520px}.appwin{width:100%}.stage{height:580px}
}
@media (prefers-reduced-motion:reduce){*,*::before,*::after{animation:none!important;transition:none!important}.rev,.shot,.tline{opacity:1!important;transform:none!important}.shot{position:relative;display:none}.shot.on{display:flex}.shot .factor .fb i{width:var(--w)!important}.sla .slabar i{width:88%!important}
}
</style>
<style id=&quot;ee-embed-fix&quot;>html,body{height:auto!important;min-height:0!important;overflow:visible!important}.player{min-height:0!important}.stage{height:700px!important}
  @media(max-width:960px){.stage{height:640px!important}}
  @media(max-width:380px){.stage{height:580px!important}}
</style>
<style id=&quot;ee-mobile-redesign&quot;>
/* ---- real brand marks inside the story mockups ---- */
.apptop .alogo{background:#fff!important;overflow:hidden;display:flex;align-items:center;justify-content:center}
.apptop .alogo img{width:100%;height:100%;object-fit:contain}
.whead .wava,.callscr .cava{overflow:hidden}
.whead .wava img,.callscr .cava img{width:100%;height:100%;object-fit:cover;display:block}
/* ---- contextual 'now playing' card (mobile only) ---- */
.mnow{display:none;align-items:center;gap:11px;margin-top:15px;padding:12px 14px;border:1px solid var(--hair);border-radius:14px;background:var(--panel);transition:border-color 1.2s,background 1.2s}
.mnow .mi{font:700 10px/1 ui-monospace,Menlo,monospace;color:var(--orange);background:rgba(222,110,48,.12);padding:6px 8px;border-radius:8px;flex:none;letter-spacing:.06em}
.mnow .mm{flex:1;min-width:0}
.mnow .mm b{display:block;font:600 14px/1.2 Inter;color:var(--fg);transition:color 1.2s}
.mnow .mm span{display:block;font:500 11px/1.3 Inter;color:var(--faint);margin-top:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;transition:color 1.2s}
.mnow .mt{font:600 11px/1 ui-monospace,Menlo,monospace;color:var(--orange);flex:none}
@media(max-width:960px){
  .pleft,.pright{min-width:0}
  .mnow{display:flex}
  /* nicer tappable segment track */
  .steps{gap:6px;margin-top:16px}
  .step{height:5px;border-radius:3px}
  .step.on{box-shadow:none}
  /* stage sizes to the active shot - no clipping, minimal dead space */
  .stage{height:auto!important;min-height:540px!important;max-width:100%!important;display:flex;align-items:center;justify-content:center;padding:4px 0}
  .shot{position:relative!important;inset:auto!important;opacity:1;transform:none;display:none!important;width:100%;transition:none}
  .shot{min-width:0}
  .shot.on{display:flex!important;animation:mfade .5s cubic-bezier(.23,1,.32,1) both}
  @keyframes mfade{from{opacity:0;transform:translateY(14px) scale(.985)}to{opacity:1;transform:none}}
  /* a real phone: fit the whole screen, don't cut off the chat */
  .phone{width:min(330px,86vw)}
  .phone .screen{height:auto!important;min-height:480px}
  .wbody{overflow:visible!important}
  .evcap{margin-top:16px;max-width:88vw}
  .appwin{width:100%!important;max-width:100%!important}
  .appbar .url{min-width:0}
  .apptop{flex-wrap:wrap;row-gap:4px}
  .apptop .lvpill{margin-left:auto}
}
@media(max-width:380px){
  .phone .screen{min-height:440px}
  .mnow .mm b{font-size:13px}
}
/* Mobile: put the visual result on top and float the prev/next
   arrows as a sticky bar so tapping updates the result in place. */
@media(max-width:960px){
  .player{display:flex!important;flex-direction:column;align-items:stretch}
  .pleft{display:contents}
  /* thin segment bars are redundant on phones (arrows + context card handle nav) */
  .steps{display:none!important}
  /* hide the eyebrow label - the story headline already leads the section */
  .kick{display:none!important}
  .pleft h1,.lede,.steps{order:0}
  .pright{order:1;position:relative}
  .mnow{order:2;margin-top:12px}
  .pctrl{display:none!important}
  /* prev/next as side arrows over the stage - same as Agentic AI Suite */
  .pstage-arw{display:flex;align-items:center;justify-content:center;position:absolute;top:50%;transform:translateY(-50%);z-index:20;width:28px;height:28px;border-radius:50%;border:1px solid rgba(255,255,255,.24);background:rgba(15,28,48,.55);-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);color:#fff;cursor:pointer;box-shadow:0 6px 16px rgba(0,0,0,.28)}
  .pstage-arw svg{width:13px;height:13px}
  .pstage-prev{left:2px}
  .pstage-next{right:2px}
  .pstage-arw:active{transform:translateY(-50%) scale(.93)}
  /* One brain. Nine modules. - modules + numbers as tidy 3-up grids, less whitespace */
  .band{padding:16px 5vw 14px}
  .flow{padding:20px 5vw 16px}
  .flowline{margin-top:14px}
  .bandgrid{gap:16px}
  .modrow{display:grid!important;grid-template-columns:repeat(3,1fr);gap:6px}
  .modpill{justify-content:center;padding:7px 6px;font-size:9.5px;text-align:center}
  .numrow{display:grid!important;grid-template-columns:repeat(3,1fr);gap:10px}
  .num .nv{font-size:22px!important}
  .num .nd{font-size:9.5px;max-width:none}
}
/* ===== Apple visionOS spatial skin - brand navy + orange, Inter, dark frosted glass ===== */
h1,h2{font-family:'Inter',sans-serif!important}
body{background:
  radial-gradient(620px 520px at 10% 6%, rgba(222,110,48,.15), transparent 60%),
  radial-gradient(700px 580px at 94% 88%, rgba(46,78,133,.34), transparent 62%),
  linear-gradient(var(--bg),var(--bg2))!important}
/* frosted DARK-glass panels - stay dark so the light story text remains readable */
.mnow,.modpill,.pctrl{
  background:linear-gradient(158deg,rgba(255,255,255,.09),rgba(255,255,255,.035))!important;
  -webkit-backdrop-filter:blur(14px) saturate(140%);backdrop-filter:blur(14px) saturate(140%);
  border:1px solid rgba(255,255,255,.15)!important;
  box-shadow:inset 0 1px 0 rgba(255,255,255,.14),0 18px 38px -22px rgba(0,0,0,.6)!important;
}
.step.on{
  background:linear-gradient(158deg,rgba(255,255,255,.10),rgba(255,255,255,.04))!important;
  -webkit-backdrop-filter:blur(12px) saturate(140%);backdrop-filter:blur(12px) saturate(140%);
  border:1px solid rgba(255,255,255,.16)!important;
  box-shadow:inset 0 1px 0 rgba(255,255,255,.12),0 14px 30px -18px rgba(0,0,0,.5)!important;
}
/* spatial float for the device mockups + a subtle orange rim light */
.phone,.appwin{
  box-shadow:0 0 0 1px rgba(255,255,255,.10),0 44px 84px -30px rgba(0,0,0,.72),0 10px 34px -22px rgba(222,110,48,.5)!important;
}
</style>
</head>
<body>
<div id=&quot;sky&quot;></div>
<!-- ============ STORY PLAYER ============ -->
<section class=&quot;player&quot; id=&quot;top&quot;>
  <div class=&quot;pleft&quot;>
    <span class=&quot;kick rev&quot;>The Admission Operating System</span>
    <h1 class=&quot;rev d1&quot;>While your campus sleeps, <span class=&quot;o&quot;>admissions don't.</span></h1>
    <p class=&quot;lede rev d2&quot;>One student, one night, six screens. Watch the whole process - it plays itself.</p>
    <div class=&quot;steps&quot; id=&quot;steps&quot;>
      <div class=&quot;step on&quot; data-i=&quot;0&quot;><span class=&quot;tno&quot;>01</span><div class=&quot;tt&quot;><b>Lead captured</b><span>Meta ad · auto-logged in CRM</span></div><span class=&quot;tm&quot;>11:02 PM</span><div class=&quot;pbar&quot;><i></i></div></div>
      <div class=&quot;step&quot; data-i=&quot;1&quot;><span class=&quot;tno&quot;>02</span><div class=&quot;tt&quot;><b>VidyaGPT replies</b><span>WhatsApp · her language · 24×7</span></div><span class=&quot;tm&quot;>11:02 PM</span><div class=&quot;pbar&quot;><i></i></div></div>
      <div class=&quot;step&quot; data-i=&quot;2&quot;><span class=&quot;tno&quot;>03</span><div class=&quot;tt&quot;><b>Intent scored 96</b><span>VidyaPulse ranks her priority</span></div><span class=&quot;tm&quot;>11:09 PM</span><div class=&quot;pbar&quot;><i></i></div></div>
      <div class=&quot;step&quot; data-i=&quot;3&quot;><span class=&quot;tno&quot;>04</span><div class=&quot;tt&quot;><b>AI voice call</b><span>Qualified · meeting booked</span></div><span class=&quot;tm&quot;>9:00 AM</span><div class=&quot;pbar&quot;><i></i></div></div>
      <div class=&quot;step&quot; data-i=&quot;4&quot;><span class=&quot;tno&quot;>05</span><div class=&quot;tt&quot;><b>Counsellor handoff</b><span>Full context · zero cold starts</span></div><span class=&quot;tm&quot;>9:04 AM</span><div class=&quot;pbar&quot;><i></i></div></div>
      <div class=&quot;step&quot; data-i=&quot;5&quot;><span class=&quot;tno&quot;>06</span><div class=&quot;tt&quot;><b>Enrolled</b><span>Fee paid · pipeline complete</span></div><span class=&quot;tm&quot;>Day 12</span><div class=&quot;pbar&quot;><i></i></div></div>
    </div>
    <div class=&quot;mnow&quot; id=&quot;mnow&quot; aria-live=&quot;polite&quot;><span class=&quot;mi&quot;>01 / 06</span><div class=&quot;mm&quot;><b>Lead captured</b><span>Meta ad · auto-logged in CRM</span></div><span class=&quot;mt&quot;>11:02 PM</span></div>
    <div class=&quot;pctrl&quot;>
      <button class=&quot;pbtn&quot; id=&quot;pprev&quot; aria-label=&quot;Previous step&quot;><svg width=&quot;12&quot; height=&quot;12&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2.4&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><path d=&quot;M15 18l-6-6 6-6&quot;/></svg></button>
      <button class=&quot;pbtn&quot; id=&quot;pplay&quot; aria-label=&quot;Pause story&quot;>
        <svg id=&quot;icpause&quot; width=&quot;12&quot; height=&quot;12&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot;><rect x=&quot;6&quot; y=&quot;4&quot; width=&quot;4&quot; height=&quot;16&quot; rx=&quot;1&quot;/><rect x=&quot;14&quot; y=&quot;4&quot; width=&quot;4&quot; height=&quot;16&quot; rx=&quot;1&quot;/></svg>
        <svg id=&quot;icplay&quot; width=&quot;12&quot; height=&quot;12&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot; style=&quot;display:none&quot;><path d=&quot;M7 4l13 8-13 8V4z&quot;/></svg>
      </button>
      <button class=&quot;pbtn&quot; id=&quot;pnext&quot; aria-label=&quot;Next step&quot;><svg width=&quot;12&quot; height=&quot;12&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2.4&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><path d=&quot;M9 6l6 6-6 6&quot;/></svg></button>
      <span>Auto-playing · click any step to jump</span>
    </div>
  </div>

  <div class=&quot;pright&quot;>
    <div class=&quot;stage&quot; id=&quot;stage&quot;>

      <div class=&quot;shot on&quot; data-i=&quot;0&quot;>
        <div class=&quot;appwin&quot;>
          <div class=&quot;appbar&quot;><div class=&quot;wd&quot;><i></i><i></i><i></i></div><div class=&quot;url&quot;><svg width=&quot;9&quot; height=&quot;9&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#1FAF66&quot; stroke-width=&quot;3&quot;><rect x=&quot;5&quot; y=&quot;10&quot; width=&quot;14&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M8 10V7a4 4 0 0 1 8 0v3&quot;/></svg>app.extraaedge.com/leads/EE-2026-84517</div></div>
          <div class=&quot;apptop&quot;><div class=&quot;alogo&quot;><img src=&quot;https://www.extraaedge.com/wp-content/uploads/2026/brand-logo/extraaedge-mark.svg&quot; alt=&quot;ExtraaEdge&quot;></div><b>ExtraaEdge</b><span class=&quot;crumb&quot;>/ Leads / New</span><span class=&quot;lvpill&quot;>Auto-captured</span></div>
          <div class=&quot;appbody&quot;>
            <div class=&quot;leadhead&quot;><div class=&quot;lava&quot;>PD</div><div class=&quot;ln&quot;><b>Priya Deshmukh <span class=&quot;new&quot;>NEW LEAD</span></b><span>Lead ID EE-2026-84517 · Created 23:02:14 IST</span></div></div>
            <div class=&quot;grid2&quot;>
              <div class=&quot;fld&quot;><span>Source</span><b class=&quot;hl&quot;>Meta Ads · Instagram</b></div>
              <div class=&quot;fld&quot;><span>Campaign</span><b>MBA_Mumbai_Jul26</b></div>
              <div class=&quot;fld&quot;><span>Course</span><b>MBA · 2026 Intake</b></div>
              <div class=&quot;fld&quot;><span>Phone</span><b>+91 98••• ••342</b></div>
            </div>
            <div class=&quot;appfoot&quot;><div class=&quot;abtn pr&quot;>Engage with VidyaGPT</div><div class=&quot;abtn sec&quot;>View timeline</div></div>
          </div>
        </div>
        <p class=&quot;evcap&quot;>Captured, deduped, enriched - no one typed this in.</p>
      </div>

      <div class=&quot;shot&quot; data-i=&quot;1&quot;>
        <div class=&quot;phone&quot;><div class=&quot;notch&quot;></div>
          <div class=&quot;screen&quot;><div class=&quot;wchat&quot;>
            <div class=&quot;whead&quot;><svg width=&quot;7&quot; height=&quot;12&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2.6&quot;><path d=&quot;M15 5l-7 7 7 7&quot;/></svg><div class=&quot;wava&quot;><img src=&quot;https://www.extraaedge.com/wp-content/uploads/2026/fevicons/vidyaai-fevicon.png&quot; alt=&quot;Vidya AI&quot;></div><div class=&quot;wn&quot;><b>Vidya AI Counsellor <span class=&quot;vf&quot;>✓</span></b><span>online</span></div><svg width=&quot;14&quot; height=&quot;14&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2&quot;><path d=&quot;M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z&quot;/></svg></div>
            <div class=&quot;wbody&quot;>
              <div class=&quot;wdate&quot;>Today</div>
              <div class=&quot;wmsg out&quot;>MBA ki fees kya hai?<span class=&quot;wtm&quot;>11:02 PM <span class=&quot;ticks&quot;>✓✓</span></span></div>
              <div class=&quot;wmsg in&quot;>Hi Priya! 👋 Main Vidya hoon - aapki AI admission counsellor.<span class=&quot;wtm&quot;>11:02 PM</span></div>
              <div class=&quot;wmsg in&quot;>MBA 2026 ki total fees ₹8.4L hai. Aap 25% tak merit scholarship ke liye eligible ho sakti hain 🎓<span class=&quot;wtm&quot;>11:02 PM</span></div>
              <div class=&quot;wmsg out&quot;>Scholarship kaise milegi?<span class=&quot;wtm&quot;>11:03 PM <span class=&quot;ticks&quot;>✓✓</span></span></div>
              <div class=&quot;wmsg in&quot;>Aapke 12th marks pe aap seedha 25% merit scholarship ke liye eligible ho 🎉<span class=&quot;wtm&quot;>11:03 PM</span></div>
              <div class=&quot;wmsg in&quot;>Main kal subah 11 baje counsellor ke saath aapki call fix kar rahi hoon ✅<span class=&quot;wtm&quot;>11:04 PM</span></div>
            </div>
            <div class=&quot;winput&quot;><div class=&quot;wfield&quot;>Message</div><div class=&quot;wmic&quot;><svg width=&quot;13&quot; height=&quot;13&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2&quot;><rect x=&quot;9&quot; y=&quot;3&quot; width=&quot;6&quot; height=&quot;11&quot; rx=&quot;3&quot;/><path d=&quot;M5 11a7 7 0 0 0 14 0M12 18v3&quot;/></svg></div></div>
          </div></div>
        </div>
        <p class=&quot;evcap&quot;>A real conversation at 11 PM - while your office is dark.</p>
      </div>

      <div class=&quot;shot&quot; data-i=&quot;2&quot;>
        <div class=&quot;appwin&quot;>
          <div class=&quot;appbar&quot;><div class=&quot;wd&quot;><i></i><i></i><i></i></div><div class=&quot;url&quot;><svg width=&quot;9&quot; height=&quot;9&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#1FAF66&quot; stroke-width=&quot;3&quot;><rect x=&quot;5&quot; y=&quot;10&quot; width=&quot;14&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M8 10V7a4 4 0 0 1 8 0v3&quot;/></svg>app.extraaedge.com/leads/EE-2026-84517/score</div></div>
          <div class=&quot;apptop&quot;><div class=&quot;alogo&quot;><img src=&quot;https://www.extraaedge.com/wp-content/uploads/2026/fevicons/vidya-pulse-fevicon.png&quot; alt=&quot;VidyaPulse&quot;></div><b>VidyaPulse</b><span class=&quot;crumb&quot;>/ Lead Scoring</span><span class=&quot;lvpill&quot;>Live model</span></div>
          <div class=&quot;appbody&quot;>
            <div class=&quot;scorehead&quot;><b>Intent Score - Priya Deshmukh</b><span class=&quot;scorenum&quot;><span data-count=&quot;96&quot;>0</span><span style=&quot;font-size:13px&quot;>/100</span></span></div>
            <div class=&quot;factor&quot;><div class=&quot;fl&quot;><span>Response velocity</span><b>Replied in 41s avg</b></div><div class=&quot;fb&quot;><i style=&quot;--w:92%&quot;></i></div></div>
            <div class=&quot;factor&quot;><div class=&quot;fl&quot;><span>Engagement depth</span><b>6 questions · fees + scholarship</b></div><div class=&quot;fb&quot;><i style=&quot;--w:88%&quot;></i></div></div>
            <div class=&quot;factor&quot;><div class=&quot;fl&quot;><span>Course-fit signals</span><b>Work-ex 3 yrs · CAT registered</b></div><div class=&quot;fb&quot;><i style=&quot;--w:84%&quot;></i></div></div>
            <div class=&quot;factor&quot;><div class=&quot;fl&quot;><span>Page activity</span><b>Fee page ×3 · Placements ×2</b></div><div class=&quot;fb&quot;><i style=&quot;--w:78%&quot;></i></div></div>
            <div class=&quot;scoreverdict&quot;>⚡ Priority HIGH - queued for AI voice call at 9:00 AM.</div>
          </div>
        </div>
        <p class=&quot;evcap&quot;>Not a guess - a live model reading behaviour, not form fields.</p>
      </div>

      <div class=&quot;shot&quot; data-i=&quot;3&quot;>
        <div class=&quot;phone&quot;><div class=&quot;notch&quot;></div>
          <div class=&quot;screen&quot;><div class=&quot;callscr&quot;>
            <div class=&quot;cava&quot;><img src=&quot;https://www.extraaedge.com/wp-content/uploads/2026/fevicons/vidya-ai-voice-agent-fevicon.png&quot; alt=&quot;Vidya AI Voice Agent&quot;></div>
            <div class=&quot;cname&quot;>Vidya AI Voice Agent</div>
            <div class=&quot;cnum&quot;>+91 89569 82897</div>
            <div class=&quot;cstate&quot;>Connected in 18s</div>
            <div class=&quot;ctimer&quot; data-timer data-max=&quot;134&quot;>00:00</div>
            <div class=&quot;transcript&quot;>
              <div class=&quot;tl&quot;>Live transcript</div>
              <div class=&quot;tline&quot;><b>Vidya:</b> Good morning Priya! Kal raat aapne MBA fees poocha tha…</div>
              <div class=&quot;tline stu&quot;><b>Priya:</b> Haan! Scholarship ka process samajhna tha.</div>
              <div class=&quot;tline&quot;><b>Vidya:</b> Main aapki counsellor ke saath 11 baje ki meeting book kar rahi hoon ✓</div>
            </div>
            <div class=&quot;callbtns&quot;>
              <div class=&quot;cbtn&quot;><svg width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2&quot;><rect x=&quot;9&quot; y=&quot;3&quot; width=&quot;6&quot; height=&quot;11&quot; rx=&quot;3&quot;/><path d=&quot;M5 11a7 7 0 0 0 14 0M12 18v3&quot;/></svg></div>
              <div class=&quot;cbtn end&quot;><svg width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2&quot; transform=&quot;rotate(135)&quot;><path d=&quot;M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z&quot;/></svg></div>
              <div class=&quot;cbtn&quot;><svg width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2&quot;><path d=&quot;M4 6h16v10H9l-5 4V6z&quot;/></svg></div>
            </div>
          </div></div>
        </div>
        <p class=&quot;evcap&quot;>18 seconds after she's active - qualified, transcribed, booked.</p>
      </div>

      <div class=&quot;shot&quot; data-i=&quot;4&quot;>
        <div class=&quot;appwin&quot;>
          <div class=&quot;appbar&quot;><div class=&quot;wd&quot;><i></i><i></i><i></i></div><div class=&quot;url&quot;><svg width=&quot;9&quot; height=&quot;9&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#1FAF66&quot; stroke-width=&quot;3&quot;><rect x=&quot;5&quot; y=&quot;10&quot; width=&quot;14&quot; height=&quot;10&quot; rx=&quot;2&quot;/><path d=&quot;M8 10V7a4 4 0 0 1 8 0v3&quot;/></svg>app.extraaedge.com/inbox</div></div>
          <div class=&quot;apptop&quot;><div class=&quot;alogo&quot;><img src=&quot;https://www.extraaedge.com/wp-content/uploads/2026/brand-logo/extraaedge-mark.svg&quot; alt=&quot;ExtraaEdge&quot;></div><b>ExtraaEdge</b><span class=&quot;crumb&quot;>/ Inbox - Rahul Verma</span><span class=&quot;lvpill&quot;>1 new</span></div>
          <div class=&quot;appbody&quot;>
            <div class=&quot;assign&quot;>
              <div class=&quot;aicon&quot;><svg width=&quot;15&quot; height=&quot;15&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><path d=&quot;M13 2L4 14h6l-1 8 9-12h-6l1-8z&quot;/></svg></div>
              <div><h3>Priya Deshmukh assigned · Meeting 11:00 AM</h3><p>Smart-routed on score 96 and your 78% conversion on Meta leads. Context attached:</p></div>
            </div>
            <div class=&quot;attach&quot;>
              <div class=&quot;att&quot;><svg width=&quot;10&quot; height=&quot;10&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#25D366&quot; stroke-width=&quot;2.4&quot;><path d=&quot;M4 6h16v10H9l-5 4V6z&quot;/></svg>WhatsApp · 14 msgs</div>
              <div class=&quot;att&quot;><svg width=&quot;10&quot; height=&quot;10&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#DE6E30&quot; stroke-width=&quot;2.4&quot;><path d=&quot;M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z&quot;/></svg>Call rec · 02:14</div>
              <div class=&quot;att&quot;><svg width=&quot;10&quot; height=&quot;10&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#4E86D8&quot; stroke-width=&quot;2.4&quot;><path d=&quot;M4 20V10M10 20V4M16 20v-8&quot;/></svg>Score · 96/100</div>
              <div class=&quot;att&quot;><svg width=&quot;10&quot; height=&quot;10&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#7A5AF8&quot; stroke-width=&quot;2.4&quot;><rect x=&quot;5&quot; y=&quot;3&quot; width=&quot;14&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M9 8h6M9 12h6&quot;/></svg>AI summary</div>
            </div>
            <div class=&quot;sla&quot;><span>Follow-up SLA</span><div class=&quot;slabar&quot;><i></i></div><span>1h 56m left</span></div>
          </div>
        </div>
        <p class=&quot;evcap&quot;>Zero cold starts. AI did the night shift; humans do the human part.</p>
      </div>

      <div class=&quot;shot&quot; data-i=&quot;5&quot;>
        <div class=&quot;phone&quot;><div class=&quot;notch&quot;></div>
          <div class=&quot;screen&quot;><div class=&quot;payscr&quot;>
            <div class=&quot;payhead&quot;><svg width=&quot;12&quot; height=&quot;12&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#fff&quot; stroke-width=&quot;2.6&quot;><path d=&quot;M15 5l-7 7 7 7&quot;/></svg>Admission Fee Payment</div>
            <div class=&quot;paybody&quot;>
              <div class=&quot;payck&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2.6&quot;><path d=&quot;M4 12.5l5 5L20 6.5&quot;/></svg></div>
              <h3>Payment Successful</h3>
              <div class=&quot;payamt&quot;>₹1,00,000</div>
              <div class=&quot;paysub&quot;>Admission Fee · MBA 2026</div>
              <div class=&quot;payrows&quot;>
                <div class=&quot;pr&quot;><span>Transaction ID</span><b>pay_Oq8xT2mK4KzR</b></div>
                <div class=&quot;pr&quot;><span>Method</span><b>UPI · priya.d@okhdfc</b></div>
                <div class=&quot;pr&quot;><span>Receipt</span><b style=&quot;color:#DE6E30&quot;>Sent on WhatsApp ✓</b></div>
              </div>
              <div class=&quot;paypill&quot;>STATUS: ENROLLED 🎓</div>
            </div>
          </div></div>
        </div>
        <p class=&quot;evcap&quot;>Day 12: enrolled. All 12 days live in one timeline.</p>
      </div>

    </div>
  </div>
</section>

<!-- ============ FLOW RECAP ============ -->
<section class=&quot;flow&quot;>
  <h2 class=&quot;rev&quot;>The whole night, <span class=&quot;o&quot;>on one line.</span></h2>
  <div class=&quot;flowline&quot; id=&quot;flowline&quot;>
    <div class=&quot;fnode&quot;><div class=&quot;fdot&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#DE6E30&quot; stroke-width=&quot;2&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;8&quot;/><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;3&quot;/></svg></div><b>Lead captured</b><span>11:02 PM</span></div>
    <div class=&quot;fnode&quot;><div class=&quot;fdot&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#25D366&quot; stroke-width=&quot;2&quot;><path d=&quot;M4 6h16v10H9l-5 4V6z&quot;/></svg></div><b>VidyaGPT chat</b><span>11:02 PM</span></div>
    <div class=&quot;fnode&quot;><div class=&quot;fdot&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#E8843F&quot; stroke-width=&quot;2&quot;><path d=&quot;M4 20V10M10 20V4M16 20v-8M22 20H2&quot;/></svg></div><b>Scored 96</b><span>11:09 PM</span></div>
    <div class=&quot;fnode&quot;><div class=&quot;fdot&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#6FA3F2&quot; stroke-width=&quot;2&quot;><path d=&quot;M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z&quot;/></svg></div><b>AI voice call</b><span>9:00 AM</span></div>
    <div class=&quot;fnode&quot;><div class=&quot;fdot&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#B29CFF&quot; stroke-width=&quot;2&quot;><circle cx=&quot;12&quot; cy=&quot;8&quot; r=&quot;3.5&quot;/><path d=&quot;M5 20a7 7 0 0 1 14 0&quot;/></svg></div><b>Handoff</b><span>9:04 AM</span></div>
    <div class=&quot;fnode&quot;><div class=&quot;fdot&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#2BC98A&quot; stroke-width=&quot;2&quot;><path d=&quot;M4 12.5l5 5L20 6.5&quot;/></svg></div><b>Enrolled</b><span>Day 12</span></div>
  </div>
</section>

<!-- ============ MODULES + NUMBERS ============ -->
<section class=&quot;band&quot;>
  <div class=&quot;bandgrid&quot;>
    <div>
      <h2 class=&quot;rev&quot;>One brain. <span class=&quot;o&quot;>Nine modules.</span></h2>
      <p class=&quot;bp rev d1&quot;>Every screen above runs on the same platform - zero handoff gaps, one student timeline.</p>
      <div class=&quot;modrow rev d2&quot; style=&quot;margin-top:14px&quot;>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#DE6E30&quot; stroke-width=&quot;2.2&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;3&quot;/><path d=&quot;M12 2v4M12 18v4M2 12h4M18 12h4&quot;/></svg>AI Engine</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#6FA3F2&quot; stroke-width=&quot;2.2&quot;><circle cx=&quot;9&quot; cy=&quot;8&quot; r=&quot;3&quot;/><path d=&quot;M3 20a6 6 0 0 1 12 0&quot;/></svg>Admissions CRM</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#B29CFF&quot; stroke-width=&quot;2.2&quot;><path d=&quot;M13 2L4 14h6l-1 8 9-12h-6l1-8z&quot;/></svg>Automation</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#2BC98A&quot; stroke-width=&quot;2.2&quot;><path d=&quot;M4 20V10M10 20V4M16 20v-8&quot;/></svg>Analytics</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#E8843F&quot; stroke-width=&quot;2.2&quot;><circle cx=&quot;12&quot; cy=&quot;8&quot; r=&quot;3.5&quot;/><path d=&quot;M5 20a7 7 0 0 1 14 0&quot;/></svg>Student Database</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#DE6E30&quot; stroke-width=&quot;2.2&quot;><circle cx=&quot;7&quot; cy=&quot;7&quot; r=&quot;3&quot;/><circle cx=&quot;17&quot; cy=&quot;17&quot; r=&quot;3&quot;/><path d=&quot;M10 7h7M7 10v7&quot;/></svg>Workflow Engine</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#25D366&quot; stroke-width=&quot;2.2&quot;><path d=&quot;M4 6h16v10H9l-5 4V6z&quot;/></svg>Communication</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#6FA3F2&quot; stroke-width=&quot;2.2&quot;><rect x=&quot;5&quot; y=&quot;3&quot; width=&quot;14&quot; height=&quot;18&quot; rx=&quot;2&quot;/><path d=&quot;M9 8h6M9 12h6&quot;/></svg>Applications</span>
        <span class=&quot;modpill&quot;><svg viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#2BC98A&quot; stroke-width=&quot;2.2&quot;><path d=&quot;M12 3l7 3v5c0 5-3 8-7 10-4-2-7-5-7-10V6l7-3z&quot;/></svg>Security</span>
      </div>
    </div>
    <div class=&quot;numrow&quot;>
      <div class=&quot;num rev&quot;><div class=&quot;nv&quot;><span data-count=&quot;10&quot; data-suffix=&quot;M+&quot;>0M+</span></div><div class=&quot;nd&quot;>enquiries managed end-to-end</div></div>
      <div class=&quot;num rev d1&quot;><div class=&quot;nv&quot;><span data-count=&quot;500&quot; data-suffix=&quot;+&quot;>0+</span></div><div class=&quot;nd&quot;>institutions on ExtraaEdge</div></div>
      <div class=&quot;num rev d2&quot;><div class=&quot;nv&quot;><span data-count=&quot;37&quot; data-suffix=&quot;%&quot;>0%</span>↑</div><div class=&quot;nd&quot;>higher conversion - no lead waits</div></div>
    </div>
  </div>
</section>


<script>
(function(){
  const reduce=matchMedia('(prefers-reduced-motion: reduce)').matches;
  const io=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.2});
  document.querySelectorAll('.rev').forEach(el=>io.observe(el));

  function countUp(el){
    const end=+el.dataset.count,suf=el.dataset.suffix||'';
    if(reduce){el.textContent=end+suf;return}
    const t0=performance.now(),dur=1000;
    (function tick(t){const p=Math.min((t-t0)/dur,1),e=1-Math.pow(1-p,3);el.textContent=Math.round(end*e)+suf;if(p<1)requestAnimationFrame(tick)})(t0);
  }
  const cIO=new IntersectionObserver((es,o)=>{es.forEach(e=>{if(e.isIntersecting){countUp(e.target);o.unobserve(e.target)}})},{threshold:.6});
  document.querySelectorAll('.band [data-count]').forEach(el=>cIO.observe(el));

  function runTimer(el){
    const max=+el.dataset.max||120;
    if(reduce){el.textContent='02:14';return}
    const t0=performance.now(),dur=3000;
    (function tick(t){const p=Math.min((t-t0)/dur,1),s=Math.round(max*(1-Math.pow(1-p,2)));
      el.textContent=String(Math.floor(s/60)).padStart(2,'0')+':'+String(s%60).padStart(2,'0');
      if(p<1)requestAnimationFrame(tick)})(t0);
  }

  /* ---- story player ---- */
  const DUR=5200,N=6,DAY_AT=3;
  const steps=[...document.querySelectorAll('#steps .step')];
  const shots=[...document.querySelectorAll('#stage .shot')];
  const fnodes=[...document.querySelectorAll('#flowline .fnode')];
  const playBtn=document.getElementById('pplay');
  const icPlay=document.getElementById('icplay'),icPause=document.getElementById('icpause');
  const mnow=document.getElementById('mnow');
  let cur=0,elapsed=0,last=null,paused=false,raf=null;
  const seen=new Set([0]);

  function render(i){
    steps.forEach((s,j)=>{s.classList.toggle('on',j===i);s.classList.toggle('done',j<i);
      if(j!==i)s.querySelector('.pbar i').style.width=j<i?'100%':'0%'});
    shots.forEach((s,j)=>s.classList.toggle('on',j===i));
    fnodes.forEach((f,j)=>f.classList.toggle('hot',j<=i));
    if(mnow){const s=steps[i];mnow.querySelector('.mi').textContent=String(i+1).padStart(2,'0')+' / '+String(N).padStart(2,'0');mnow.querySelector('.mm b').textContent=s.querySelector('.tt b').textContent;mnow.querySelector('.mm span').textContent=s.querySelector('.tt span').textContent;mnow.querySelector('.mt').textContent=s.querySelector('.tm').textContent;}
    document.body.classList.toggle('day',i>=DAY_AT);
    if(!seen.has(i)){seen.add(i);
      const sh=shots[i];
      sh.querySelectorAll('[data-count]').forEach(countUp);
      const tm=sh.querySelector('[data-timer]');if(tm)runTimer(tm);
    }
  }
  function go(i,resetTimer=true){
    cur=(i+N)%N;
    if(resetTimer)elapsed=0;
    render(cur);
  }
  function loop(t){
    if(last===null)last=t;
    if(!paused&amp;&amp;!reduce){
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
  let userPaused=false;
  steps.forEach(s=>s.addEventListener('click',()=>go(+s.dataset.i)));
  playBtn.addEventListener('click',()=>{userPaused=!userPaused;setPaused(userPaused)});
  var prevBtn=document.getElementById('pprev'),nextBtn=document.getElementById('pnext');
  function stepBy(d){ userPaused=true; setPaused(true); go(cur+d); }
  if(prevBtn) prevBtn.addEventListener('click',()=>stepBy(-1));
  if(nextBtn) nextBtn.addEventListener('click',()=>stepBy(1));
  const stage=document.getElementById('stage');
  /* On phones, move the prev/next buttons onto the stage as left/right
     side arrows (same pattern as the Agentic AI Suite carousel). */
  var mqSide=window.matchMedia('(max-width:960px)');
  function placeArrows(){
    if(!prevBtn||!nextBtn) return;
    if(mqSide.matches){
      prevBtn.classList.add('pstage-arw','pstage-prev');
      nextBtn.classList.add('pstage-arw','pstage-next');
      stage.insertBefore(prevBtn,stage.firstChild); stage.appendChild(nextBtn);
    } else {
      prevBtn.classList.remove('pstage-arw','pstage-prev');
      nextBtn.classList.remove('pstage-arw','pstage-next');
      var pc=document.querySelector('.pctrl');
      if(pc){ pc.insertBefore(prevBtn,pc.firstChild); if(playBtn) pc.insertBefore(nextBtn,playBtn.nextSibling); else pc.appendChild(nextBtn); }
    }
  }
  placeArrows();
  if(mqSide.addEventListener) mqSide.addEventListener('change',placeArrows);
  stage.addEventListener('mouseenter',()=>{if(!reduce)setPaused(true)});
  stage.addEventListener('mouseleave',()=>{if(!reduce&amp;&amp;!userPaused)setPaused(false)});
  document.addEventListener('visibilitychange',()=>{if(document.hidden)setPaused(true)});
  window.addEventListener('message',e=>{
    if(e.data==='ee-pause')setPaused(true);
    else if(e.data==='ee-play'&amp;&amp;!userPaused)setPaused(false);
    else if(typeof e.data==='string'&amp;&amp;e.data.indexOf('ee-goto-')===0){
      /* scroll-driven: parent tells us which step to show */
      userPaused=true; setPaused(true);
      var gi=parseInt(e.data.slice(8),10); if(!isNaN(gi))go(gi);
    }
  });

  render(0);
  if(reduce){setPaused(true)}else{raf=requestAnimationFrame(loop)}
})();
</script>
</body>
</html>
"></iframe>
  </div>
  </div>
</section>
<script>
/* Scroll-driven storytelling controller (desktop): map scroll progress through
   the pinned track to the 6 story steps and tell the iframe which step to show. */
(function(){
  var track=document.getElementById('eenTrack');
  var frame=document.getElementById('eeNightFrame');
  if(!track||!frame) return;
  var N=6, last=-1, ticking=false;
  var mq=window.matchMedia('(max-width:960px)');
  function update(){
    ticking=false;
    if(mq.matches) return;            /* phones keep auto-play + arrows */
    var vh=window.innerHeight||document.documentElement.clientHeight;
    var total=track.offsetHeight - vh;
    if(total<=0) return;
    var top=track.getBoundingClientRect().top;
    var p=Math.min(1,Math.max(0, -top/total));
    var i=Math.min(N-1, Math.floor(p*N + 0.0001));
    if(i!==last){ last=i; try{ frame.contentWindow.postMessage('ee-goto-'+i,'*'); }catch(e){} }
  }
  function onScroll(){ if(!ticking){ ticking=true; requestAnimationFrame(update); } }
  window.addEventListener('scroll',onScroll,{passive:true});
  window.addEventListener('resize',onScroll,{passive:true});
  onScroll();
})();
</script>
<script>
(function(){
  var f=document.getElementById('eeNightFrame'); if(!f) return;
  var mqm=window.matchMedia('(max-width:960px)');
  function fit(){
    try{
      /* desktop uses the pinned 100% layout - never force an inline height there */
      if(!mqm.matches){ if(f.style.height) f.style.height=''; return; }
      var d=f.contentDocument||(f.contentWindow&&f.contentWindow.document);
      if(!d||!d.body) return;
      /* measure the body box, NOT scrollHeight: scrollHeight is floored at the
         current iframe height, so the frame could grow but never shrink back,
         leaving a dead empty band under the story */
      var h=Math.ceil(d.body.getBoundingClientRect().height);
      if(h>300 && Math.abs(h-(parseInt(f.style.height,10)||0))>2) f.style.height=h+'px';
    }catch(e){}
  }
  if(mqm.addEventListener) mqm.addEventListener('change',fit);
  function post(m){ try{ if(f.contentWindow) f.contentWindow.postMessage(m,'*'); }catch(e){} }
  f.addEventListener('load',function(){
    fit(); setTimeout(fit,300); setTimeout(fit,1200);
    /* resize only when the story's own size actually changes - no periodic reflow polling */
    try{
      var d=f.contentDocument||(f.contentWindow&&f.contentWindow.document);
      if(d&&d.body&&'ResizeObserver' in window){ new ResizeObserver(function(){ requestAnimationFrame(fit); }).observe(d.body); }
      else { var n=0, iv=setInterval(function(){ fit(); if(++n>20) clearInterval(iv); }, 800); }
    }catch(e){}
  });
  window.addEventListener('resize',function(){ clearTimeout(f.__t); f.__t=setTimeout(fit,150); });
  /* play the story only while it's on screen - off-screen it's paused, so it never competes for frames */
  if('IntersectionObserver' in window){
    new IntersectionObserver(function(es){ es.forEach(function(e){ post(e.isIntersecting?'ee-play':'ee-pause'); }); },{rootMargin:'120px 0px'}).observe(f);
  }
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
<style id="cis-style">#stories{--cis-navy:#19345d;--cis-orange:#DE6E30;background:linear-gradient(180deg,#ffffff 0%,#fbf8f5 100%);font-family:'Inter',sans-serif;color:var(--cis-navy);overflow:hidden}#stories .cis-wrap{max-width:1200px;margin:0 auto;padding:38px 24px}#stories .cis-head{text-align:center;max-width:720px;margin:0 auto}#stories .cis-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--cis-orange);background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px}#stories .cis-eyebrow .d{width:7px;height:7px;border-radius:50%;background:var(--cis-orange);box-shadow:0 0 8px rgba(222,110,48,.6);animation:cisPulse 2.2s infinite}
@keyframes cisPulse{0%,100%{opacity:1}50%{opacity:.35}}#stories .cis-title{font-family:'Inter',sans-serif;font-weight:800;font-size:clamp(28px,4.4vw,50px);line-height:1.1;letter-spacing:-.025em;margin:16px 0 12px}#stories .cis-title em{font-style:normal;color:var(--cis-orange);position:relative;white-space:nowrap}#stories .cis-title em::after{content:"";position:absolute;left:0;right:0;bottom:.02em;height:.16em;background:rgba(222,110,48,.22);border-radius:99px;z-index:-1}#stories .cis-lead{font-size:clamp(15px,1.6vw,17.5px);line-height:1.6;color:rgba(25,52,93,.66);max-width:600px;margin:0 auto}#stories .cis-trust{display:flex;flex-wrap:wrap;justify-content:center;gap:10px 12px;margin:22px auto 0;max-width:780px}#stories .cis-chip{display:inline-flex;align-items:center;gap:7px;font-size:13px;font-weight:600;color:var(--cis-navy);background:#fff;border:1px solid rgba(25,52,93,.1);box-shadow:0 4px 14px rgba(25,52,93,.05);padding:9px 15px;border-radius:99px}#stories .cis-chip svg,#stories .cis-chip img.eeimg{width:15px;height:15px;fill:#f5a623}#stories .cis-chip b{font-weight:800}#stories .cis-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;max-width:1140px;margin:38px auto 0;justify-content:center}#stories .cis-card{position:relative;display:flex;flex-direction:column;background:#fff;border:1px solid rgba(25,52,93,.1);border-radius:20px;overflow:hidden;box-shadow:0 10px 30px rgba(25,52,93,.06);transition:transform .35s cubic-bezier(.2,.8,.2,1),box-shadow .35s,border-color .35s;animation:cisRise .6s both}
@keyframes cisRise{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:none}}#stories .cis-card:nth-child(2){animation-delay:.1s}#stories .cis-card:nth-child(3){animation-delay:.2s}#stories .cis-card::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--cis-orange),#f1a877);transform:scaleX(0);transform-origin:left;transition:transform .4s;z-index:3}#stories .cis-card:hover{transform:translateY(-6px);box-shadow:0 22px 50px rgba(25,52,93,.14);border-color:rgba(222,110,48,.4)}#stories .cis-card:hover::before{transform:scaleX(1)}#stories .cis-video{position:relative;aspect-ratio:16/9;background:#0d1c33;cursor:pointer;overflow:hidden}#stories .cis-video img{width:100%;height:100%;object-fit:cover;transition:transform .5s}#stories .cis-card:hover .cis-video img{transform:scale(1.06)}#stories .cis-video::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(13,28,51,.04),rgba(13,28,51,.42));pointer-events:none}#stories .cis-play{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:60px;height:60px;border-radius:50%;background:rgba(255,255,255,.92);display:grid;place-items:center;z-index:2;transition:.3s;box-shadow:0 8px 24px rgba(0,0,0,.25)}#stories .cis-play svg,#stories .cis-play img.eeimg{width:24px;height:24px;fill:var(--cis-orange);margin-left:3px}#stories .cis-card:hover .cis-play{background:var(--cis-orange);transform:translate(-50%,-50%) scale(1.1)}#stories .cis-card:hover .cis-play svg,#stories .cis-card:hover .cis-play img.eeimg{fill:#fff}#stories .cis-dur{position:absolute;bottom:12px;right:12px;z-index:2;font-size:12px;font-weight:600;color:#fff;background:rgba(13,28,51,.72);padding:4px 10px;border-radius:99px}#stories .cis-video.playing img,#stories .cis-video.playing::after,#stories .cis-video.playing .cis-play,#stories .cis-video.playing .cis-dur{display:none}#stories .cis-video iframe{position:absolute;inset:0;width:100%;height:100%;border:0}#stories .cis-body{display:flex;flex-direction:column;gap:14px;padding:22px 22px 24px;flex:1}#stories .cis-stars{display:flex;gap:3px}#stories .cis-stars svg,#stories .cis-stars img.eeimg{width:17px;height:17px;fill:#f5a623}#stories .cis-quote{font-size:15px;line-height:1.65;color:rgba(25,52,93,.82);flex:1;position:relative;margin:0}#stories .cis-quote::before{content:"\201C";font-family:'Inter',sans-serif;color:rgba(222,110,48,.22);font-size:3.4em;line-height:0;position:absolute;top:.42em;left:-3px;z-index:0}#stories .cis-quote span{position:relative;z-index:1}#stories .cis-author{display:flex;align-items:center;gap:13px;padding-top:16px;border-top:1px solid rgba(25,52,93,.08)}#stories .cis-av{position:relative;width:48px;height:48px;flex:none}#stories .cis-av img{width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 2px var(--cis-orange)}#stories .cis-av .fb{display:none;width:48px;height:48px;border-radius:50%;background:var(--cis-orange);color:#fff;font-weight:800;font-size:16px;place-items:center;border:2px solid #fff;box-shadow:0 0 0 2px var(--cis-orange)}#stories .cis-av.noimg img{display:none}#stories .cis-av.noimg .fb{display:grid}#stories .cis-aname{font-weight:700;font-size:15px;color:var(--cis-navy)}#stories .cis-arole{font-size:12.5px;color:rgba(25,52,93,.6);margin-top:2px;line-height:1.4}#stories .cis-cta{display:flex;flex-wrap:wrap;justify-content:center;gap:14px;margin-top:36px}#stories .cis-btn{display:inline-flex;align-items:center;gap:9px;font-weight:700;font-size:15px;padding:14px 28px;border-radius:99px;text-decoration:none;transition:.25s}#stories .cis-btn svg,#stories .cis-btn img.eeimg{width:18px;height:18px;fill:currentColor}#stories .cis-btn.primary{background:var(--cis-orange);color:#fff;box-shadow:0 10px 26px rgba(222,110,48,.3)}#stories .cis-btn.primary:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(222,110,48,.4)}#stories .cis-btn.ghost{background:#fff;color:var(--cis-navy);border:1.5px solid rgba(25,52,93,.18)}#stories .cis-btn.ghost:hover{border-color:var(--cis-orange);color:var(--cis-orange)}
@media(prefers-reduced-motion:reduce){#stories .cis-card{animation:none}#stories .cis-eyebrow .d{animation:none}}
@media(max-width:600px){#stories .cis-wrap{padding:26px 18px}}
</style>



<!-- ===================== SEGMENT · INTERACTIVE PREVIEW ===================== -->
<!-- ===================== SEGMENTS · Built for your institution (scoped #segments) ===================== -->
<style>#segments{
  --sg-orange:#DE6E30;
  --sg-blue:#19345d;
  --sg-bg:#FFFFFF;
  --sg-txt:var(--sg-blue);
  --sg-mut:rgba(25,52,93,.66);
  --sg-dim:rgba(25,52,93,.45);
  --sg-line:rgba(25,52,93,.12);
  --sg-line2:rgba(25,52,93,.22);
  --sg-card:rgba(25,52,93,.025);
  --sg-o-soft:rgba(222,110,48,.08);
  --sg-o-line:rgba(222,110,48,.35);
  --sg-grad:linear-gradient(98deg,#DE6E30,#E8854D);
  --sg-font:'Inter',sans-serif;
  --sg-r:20px;
  position:relative;
  padding:clamp(72px,9vw,128px) 0;
  background:
    radial-gradient(900px 480px at 88% -5%,rgba(222,110,48,.06),transparent 60%),
    radial-gradient(760px 520px at -5% 105%,rgba(25,52,93,.045),transparent 60%),
    var(--sg-bg);
  color:var(--sg-txt);
  font-family:var(--sg-font);
  overflow:clip;
}#segments *{box-sizing:border-box;margin:0;padding:0}#segments .sg-wrap{max-width:1200px;margin:0 auto;padding:0 24px;display:block}#segments .sg-eyebrow{display:inline-flex;align-items:center;gap:9px;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--sg-orange);border:1px solid var(--sg-o-line);background:var(--sg-o-soft);padding:8px 16px;border-radius:99px}#segments .sg-eyebrow .dot{width:7px;height:7px;border-radius:50%;background:var(--sg-orange);box-shadow:0 0 8px rgba(222,110,48,.6);animation:sgPulse 2.2s infinite}
@keyframes sgPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.35);opacity:.55}}#segments .sg-h2{font-weight:800;font-size:clamp(31px,4.3vw,50px);line-height:1.08;letter-spacing:-.025em;margin:20px 0 16px;max-width:780px;color:var(--sg-blue)}#segments .sg-h2 em{font-style:normal;color:var(--sg-orange);position:relative}#segments .sg-h2 em::after{content:"";position:absolute;left:0;right:0;bottom:.04em;height:.14em;background:rgba(222,110,48,.22);border-radius:99px;z-index:-1}#segments .sg-lead{font-size:clamp(15px,1.6vw,17.5px);line-height:1.65;color:var(--sg-mut);max-width:620px}#segments .sg-intro{font-size:clamp(15px,1.6vw,17.5px);line-height:1.65;color:var(--sg-mut);max-width:620px}.sg-chip-q{font-size:12.5px;font-weight:700;color:var(--sg-dim);letter-spacing:.08em;text-transform:uppercase;margin:18px 0 0}#segments .sg-personas{display:flex;gap:10px;margin:12px 0 8px;overflow-x:auto;scrollbar-width:none;padding-bottom:6px}#segments .sg-personas::-webkit-scrollbar{display:none}#segments .sg-chip{flex:0 0 auto;display:inline-flex;align-items:center;gap:9px;padding:11px 18px;border-radius:99px;border:1px solid var(--sg-line2);background:#fff;color:var(--sg-mut);font:600 13.5px/1 var(--sg-font);cursor:pointer;transition:all .25s ease;white-space:nowrap}#segments .sg-chip svg,#segments .sg-chip img.eeimg{width:16px;height:16px;stroke-width:1.8}#segments .sg-chip:hover{border-color:var(--sg-blue);color:var(--sg-blue);transform:translateY(-1px);box-shadow:0 4px 14px -6px rgba(25,52,93,.25)}#segments .sg-chip.on{background:var(--sg-blue);border-color:var(--sg-blue);color:#fff;box-shadow:0 8px 22px -8px rgba(25,52,93,.5)}#segments .sg-grid{display:grid;grid-template-columns:minmax(0,1fr) 30px minmax(0,1.06fr);gap:0 28px;margin-top:30px;align-items:start}#segments .sg-railwrap{align-self:stretch}#segments .sg-stage{align-self:start}#segments .sg-rail{position:sticky;top:var(--sg-stick,0px);height:calc(100vh - var(--sg-stick,0px));display:flex;flex-direction:column;align-items:center;justify-content:center}#segments .sg-rdot{position:relative;width:30px;height:30px;border-radius:50%;border:1px solid var(--sg-line2);background:#fff;color:var(--sg-dim);font:700 10.5px var(--sg-font);cursor:pointer;transition:all .3s;z-index:1}#segments .sg-rdot.on{border-color:var(--sg-orange);color:#fff;background:var(--sg-orange);box-shadow:0 0 0 4px rgba(222,110,48,.15)}#segments .sg-rln{width:2px;height:34px;background:var(--sg-line);position:relative;overflow:hidden}#segments .sg-rln i{position:absolute;inset:0;background:var(--sg-orange);transform:scaleY(0);transform-origin:top;transition:transform .5s ease;display:block}#segments .sg-rln.fill i{transform:scaleY(1)}#segments .sg-ch{padding:13vh 0;opacity:.3;transition:opacity .5s ease,transform .5s ease;transform:translateY(8px)}#segments .sg-ch.active{opacity:1;transform:none}#segments .sg-ch:first-child{padding-top:4vh}#segments .sg-ix{display:flex;align-items:center;gap:12px;font:800 13px var(--sg-font);color:var(--sg-orange);letter-spacing:.04em}#segments .sg-ix .k{font-size:11px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--sg-dim);padding-left:12px;border-left:1px solid var(--sg-line2)}#segments .sg-ch h3{font-weight:800;font-size:clamp(22px,2.5vw,29px);line-height:1.18;letter-spacing:-.02em;margin:14px 0 12px;color:var(--sg-blue)}#segments .sg-ch>p{font-size:15.5px;line-height:1.7;color:var(--sg-mut);max-width:480px}#segments .sg-feats{list-style:none;margin-top:24px;display:grid;gap:10px}#segments .sg-feats li{display:flex;gap:14px;align-items:flex-start;padding:14px 16px;border:1px solid var(--sg-line);border-radius:14px;background:#fff;transition:border-color .25s,box-shadow .25s,transform .25s}#segments .sg-feats li:hover{border-color:var(--sg-o-line);box-shadow:0 8px 22px -12px rgba(25,52,93,.22);transform:translateX(4px)}#segments .sg-feats .n{flex:0 0 auto;width:26px;height:26px;border-radius:8px;display:grid;place-items:center;font:700 11px var(--sg-font);color:var(--sg-orange);background:var(--sg-o-soft);border:1px solid var(--sg-o-line)}#segments .sg-feats b{display:block;font-size:14.5px;font-weight:700;letter-spacing:-.01em;color:var(--sg-blue)}#segments .sg-feats span.s{display:block;font-size:13px;color:var(--sg-mut);margin-top:3px;line-height:1.5}#segments .sg-proof{display:flex;gap:14px;align-items:flex-start;margin-top:22px;padding:16px 18px;border-radius:14px;border:1px dashed var(--sg-o-line);background:var(--sg-o-soft)}#segments .sg-proof .q{font-size:13.5px;line-height:1.6;color:var(--sg-blue);font-style:italic}#segments .sg-proof .a{display:block;margin-top:7px;font-style:normal;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--sg-dim)}#segments .sg-proof svg,#segments .sg-proof img.eeimg{flex:0 0 auto;width:18px;height:18px;color:var(--sg-orange);margin-top:2px}#segments .sg-stage{position:sticky;top:var(--sg-stick,0px);height:calc(100vh - var(--sg-stick,0px));display:flex;flex-direction:column;justify-content:center;padding:20px 0}#segments .sg-win{max-height:100%}#segments .sg-win{border:1px solid var(--sg-line2);border-radius:var(--sg-r);background:#fff;box-shadow:0 34px 70px -28px rgba(25,52,93,.28),0 4px 16px -8px rgba(25,52,93,.12);overflow:hidden auto;scrollbar-width:thin;position:relative}#segments .sg-win::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;background:var(--sg-grad)}#segments .sg-chrome{display:flex;align-items:center;gap:8px;padding:14px 18px 12px;border-bottom:1px solid var(--sg-line);background:rgba(25,52,93,.02)}#segments .sg-chrome i{width:10px;height:10px;border-radius:50%;background:rgba(25,52,93,.14)}#segments .sg-chrome i:nth-child(1){background:rgba(222,110,48,.85)}#segments .sg-chrome i:nth-child(2){background:rgba(222,110,48,.4)}#segments .sg-chrome i:nth-child(3){background:rgba(25,52,93,.3)}#segments .sg-url{margin-left:10px;font:600 11.5px var(--sg-font);color:var(--sg-dim);background:#fff;border:1px solid var(--sg-line);padding:5px 12px;border-radius:8px}#segments .sg-live{margin-left:auto;display:inline-flex;align-items:center;gap:6px;font:800 10px var(--sg-font);letter-spacing:.14em;color:var(--sg-orange);background:var(--sg-o-soft);border:1px solid var(--sg-o-line);padding:5px 10px;border-radius:99px}#segments .sg-live .d{width:6px;height:6px;border-radius:50%;background:var(--sg-orange);animation:sgPulse 1.6s infinite}#segments .sg-body{padding:22px 22px 20px;position:relative}#segments .sg-fade{transition:opacity .28s ease,transform .28s ease}#segments .sg-fade.out{opacity:0;transform:translateY(8px)}#segments .sg-id{display:flex;align-items:center;gap:13px}#segments .sg-badge{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;background:var(--sg-blue);color:#fff;box-shadow:0 8px 18px -8px rgba(25,52,93,.5)}#segments .sg-badge svg,#segments .sg-badge img.eeimg{width:21px;height:21px;stroke-width:1.7}#segments .sg-nm{font-weight:800;font-size:16.5px;letter-spacing:-.015em;color:var(--sg-blue)}#segments .sg-sub{font-size:12px;color:var(--sg-dim);margin-top:2px;font-weight:500}#segments .sg-metric{display:flex;align-items:baseline;gap:12px;margin:20px 0 4px}#segments .sg-mv{font-weight:900;font-size:clamp(38px,4vw,50px);letter-spacing:-.035em;color:var(--sg-orange);font-variant-numeric:tabular-nums}#segments .sg-ml{font-size:13px;color:var(--sg-mut);line-height:1.45;max-width:200px;font-weight:500}#segments .sg-pipe{margin:18px 0 16px}#segments .sg-pipe-h{display:flex;justify-content:space-between;font:700 10.5px var(--sg-font);letter-spacing:.1em;text-transform:uppercase;color:var(--sg-dim);margin-bottom:8px}#segments .sg-bar{height:8px;border-radius:99px;background:rgba(25,52,93,.08);overflow:hidden;position:relative}#segments .sg-bar i{position:absolute;inset:0;width:0;background:var(--sg-grad);border-radius:inherit;transition:width 1.1s cubic-bezier(.22,1,.36,1);display:block}#segments .sg-bar i::after{content:"";position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);animation:sgSheen 2.4s infinite}
@keyframes sgSheen{0%{transform:translateX(-100%)}60%,100%{transform:translateX(100%)}}#segments .sg-leads{display:grid;gap:8px;margin:14px 0}#segments .sg-lead{display:flex;align-items:center;gap:12px;padding:11px 13px;border-radius:12px;border:1px solid var(--sg-line);background:#fff;opacity:0;transform:translateX(14px);transition:opacity .4s ease,transform .4s ease}#segments .sg-lead.in{opacity:1;transform:none}#segments .sg-av{flex:0 0 auto;width:32px;height:32px;border-radius:50%;display:grid;place-items:center;font:700 11px var(--sg-font);color:#fff;background:var(--sg-blue)}#segments .sg-li{min-width:0;flex:1}#segments .sg-li b{display:block;font-size:13px;font-weight:700;color:var(--sg-blue);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#segments .sg-li span{display:block;font-size:11.5px;color:var(--sg-dim);margin-top:1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}#segments .sg-score{flex:0 0 auto;font:700 11px var(--sg-font);padding:5px 9px;border-radius:8px}#segments .sg-score.hot{color:#fff;background:var(--sg-orange)}#segments .sg-score.warm{color:var(--sg-orange);background:var(--sg-o-soft);border:1px solid var(--sg-o-line)}#segments .sg-score.ok{color:var(--sg-blue);background:rgba(25,52,93,.07);border:1px solid var(--sg-line2)}#segments .sg-wa{display:flex;gap:10px;align-items:flex-start;margin-top:14px}#segments .sg-wa-ic{flex:0 0 auto;width:28px;height:28px;border-radius:50%;display:grid;place-items:center;background:rgba(25,52,93,.07);border:1px solid var(--sg-line2);color:var(--sg-blue)}#segments .sg-wa-ic svg,#segments .sg-wa-ic img.eeimg{width:14px;height:14px}#segments .sg-bub{position:relative;font-size:12.5px;line-height:1.55;color:var(--sg-blue);background:rgba(25,52,93,.045);border:1px solid var(--sg-line);padding:10px 32px 10px 13px;border-radius:4px 14px 14px 14px;min-height:38px;flex:1}#segments .sg-bub .cur{display:inline-block;width:6px;height:13px;background:var(--sg-orange);margin-left:2px;vertical-align:-2px;animation:sgBlink .8s infinite}
@keyframes sgBlink{50%{opacity:0}}#segments .sg-bub .tick{position:absolute;right:9px;bottom:6px;font-size:10px;color:var(--sg-orange);letter-spacing:-2px;font-weight:700}#segments .sg-cta{display:flex;align-items:center;justify-content:space-between;gap:14px;margin-top:18px;padding:15px 18px;border-radius:14px;background:var(--sg-orange);color:#fff;font:700 14.5px var(--sg-font);text-decoration:none;letter-spacing:-.01em;box-shadow:0 14px 32px -12px rgba(222,110,48,.6);transition:transform .25s,box-shadow .25s,background .25s}#segments .sg-cta:hover{transform:translateY(-2px);background:#C95F26;box-shadow:0 20px 40px -12px rgba(222,110,48,.7)}#segments .sg-cta svg,#segments .sg-cta img.eeimg{width:18px;height:18px;flex:0 0 auto;transition:transform .25s}#segments .sg-cta:hover svg,#segments .sg-cta:hover img.eeimg{transform:translateX(4px)}#segments .sg-trust{display:flex;flex-wrap:wrap;gap:7px 16px;justify-content:center;margin-top:12px;font-size:11.5px;font-weight:500;color:var(--sg-dim)}#segments .sg-trust span{display:inline-flex;align-items:center;gap:6px}#segments .sg-trust svg,#segments .sg-trust img.eeimg{width:12px;height:12px;color:var(--sg-orange)}#segments.sg-paused .dot,#segments.sg-paused .sg-live .d,#segments.sg-paused .sg-bar i::after{animation-play-state:paused}#segments .sg-chip:focus-visible,#segments .sg-rdot:focus-visible,#segments .sg-cta:focus-visible{
  outline:3px solid rgba(222,110,48,.55);outline-offset:2px}

@media (max-width:1020px){#segments .sg-grid{grid-template-columns:1fr;gap:26px}#segments .sg-railwrap{display:none}#segments .sg-stage{position:static;height:auto;display:block;padding:0;order:2}#segments .sg-ch{display:none;padding:0;opacity:1;transform:none}#segments .sg-ch.active{display:block;animation:sgIn .45s ease}
  @keyframes sgIn{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}#segments .sg-ch>p{max-width:none}
}
@media (prefers-reduced-motion:reduce){#segments *,#segments *::before,#segments *::after{animation:none!important;transition:none!important}
}
</style>

<section id="segments" aria-label="Built for your institution">
  <div class="sg-wrap">

    <div class="sg-eyebrow"><span class="dot"></span> Built for your institution</div>
    <h2 class="sg-h2">One platform. Tuned to the way <em>your institution runs.</em></h2>
    <p class="sg-intro">Not a one-size-fits-all CRM. Pick your institution type and watch ExtraaEdge reshape itself - your channels, your pipeline, your admission model.</p>

    <p class="sg-chip-q">Which one are you?</p>
    <div class="sg-personas" role="tablist" aria-label="Institution type">
      <button class="sg-chip on" data-seg="he" role="tab" aria-selected="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-01.svg" alt="" loading="lazy" decoding="async">Higher Education</button>
      <button class="sg-chip" data-seg="school" role="tab" aria-selected="false"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-02.svg" alt="" loading="lazy" decoding="async">Schools · K-12</button>
      <button class="sg-chip" data-seg="edtech" role="tab" aria-selected="false"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-03.svg" alt="" loading="lazy" decoding="async">EdTech</button>
      <button class="sg-chip" data-seg="coaching" role="tab" aria-selected="false"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-04.svg" alt="" loading="lazy" decoding="async">Coaching</button>
      <button class="sg-chip" data-seg="overseas" role="tab" aria-selected="false"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-05.svg" alt="" loading="lazy" decoding="async">Study Abroad</button>
    </div>

    <div class="sg-grid">

      <!-- LEFT · narrative -->
      <div class="sg-narr">

        <article class="sg-ch active" data-seg="he" id="sg-he">
          <div class="sg-ix">01 <span class="k">Higher Education</span></div>
          <h3>Universities &amp; colleges, run end to end.</h3>
          <p>From first enquiry to final enrolment - capture every lead, let AI prioritise real intent, and orchestrate programs, campuses and scholarships from one platform.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Omnichannel capture</b><span class="s">Ads, website, WhatsApp &amp; portals land in one inbox - zero leakage</span></div></li>
            <li><span class="n">02</span><div><b>AI lead scoring</b><span class="s">Counsellors spend their day on students most likely to enrol</span></div></li>
            <li><span class="n">03</span><div><b>Multi-campus workflows</b><span class="s">Programs, intakes &amp; scholarships, perfectly organised</span></div></li>
          </ul>
          <div class="sg-proof"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-06.svg" alt="" loading="lazy" decoding="async"><div class="q">Our counsellors stopped chasing cold lists. Conversion moved within the first intake itself.<span class="a">- Director of Admissions, Multi-campus University</span></div></div>
        </article>

        <article class="sg-ch" data-seg="school" id="sg-school">
          <div class="sg-ix">02 <span class="k">Schools · K-12</span></div>
          <h3>Admissions parents actually enjoy.</h3>
          <p>Digitise enquiries and applications for every grade, automate warm WhatsApp follow-ups, and move each family cleanly from first visit to fee payment.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Forms for every grade</b><span class="s">Branded online enquiry &amp; application, mobile-first for parents</span></div></li>
            <li><span class="n">02</span><div><b>Parent WhatsApp automation</b><span class="s">Timely, personalised nudges - never spammy</span></div></li>
            <li><span class="n">03</span><div><b>Enquiry → fee pipeline</b><span class="s">One clean view of every family's journey</span></div></li>
          </ul>
          <div class="sg-proof"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-06.svg" alt="" loading="lazy" decoding="async"><div class="q">Parents now get a reply before they've left the campus gate. Walk-in to admission jumped visibly.<span class="a">- Principal, K-12 School Group</span></div></div>
        </article>

        <article class="sg-ch" data-seg="edtech" id="sg-edtech">
          <div class="sg-ix">03 <span class="k">EdTech</span></div>
          <h3>Qualify at scale. Sell to the serious.</h3>
          <p>AI calling works through thousands of leads 24×7, scores intent from real behaviour, and routes only hot prospects to sales - grow without growing headcount.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>24×7 AI calling</b><span class="s">Thousands of leads qualified automatically, even at 2 AM</span></div></li>
            <li><span class="n">02</span><div><b>Behavioural intent scoring</b><span class="s">Real signals from clicks, calls &amp; replies - not guesswork</span></div></li>
            <li><span class="n">03</span><div><b>Smart sales routing</b><span class="s">Hot leads hit a rep's screen in seconds</span></div></li>
          </ul>
          <div class="sg-proof"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-06.svg" alt="" loading="lazy" decoding="async"><div class="q">Same sales team, three times the pipeline. The AI does the first conversation for us.<span class="a">- Growth Head, EdTech Platform</span></div></div>
        </article>

        <article class="sg-ch" data-seg="coaching" id="sg-coaching">
          <div class="sg-ix">04 <span class="k">Coaching Institutes</span></div>
          <h3>Every batch, walk-in &amp; centre, in control.</h3>
          <p>Run batch-wise admissions with live seats and waitlists, capture every walk-in, and compare counsellor performance across all your centres in one view.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Batch &amp; seat management</b><span class="s">Live capacity, automatic waitlists, zero overbooking</span></div></li>
            <li><span class="n">02</span><div><b>Walk-in capture</b><span class="s">Front-desk app - no enquiry slips through</span></div></li>
            <li><span class="n">03</span><div><b>Multi-centre dashboard</b><span class="s">One unified command view of every branch</span></div></li>
          </ul>
          <div class="sg-proof"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-06.svg" alt="" loading="lazy" decoding="async"><div class="q">I open one dashboard at 9 AM and know exactly which centre needs my attention today.<span class="a">- Founder, Multi-centre Coaching Institute</span></div></div>
        </article>

        <article class="sg-ch" data-seg="overseas" id="sg-overseas">
          <div class="sg-ix">05 <span class="k">Overseas · Study Abroad</span></div>
          <h3>Global applications, one calm pipeline.</h3>
          <p>Track applications across countries and universities, manage document checklists and verification, and keep every student updated automatically at every stage.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Multi-country pipeline</b><span class="s">Universities, intakes &amp; deadlines - organised by default</span></div></li>
            <li><span class="n">02</span><div><b>Document management</b><span class="s">Checklists, uploads &amp; verification in one place</span></div></li>
            <li><span class="n">03</span><div><b>Automated student updates</b><span class="s">Status at every stage, hands-free</span></div></li>
          </ul>
          <div class="sg-proof"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-06.svg" alt="" loading="lazy" decoding="async"><div class="q">No more spreadsheets per country. Every counsellor sees the same live pipeline.<span class="a">- CEO, Study Abroad Consultancy</span></div></div>
        </article>

      </div>

      <!-- MIDDLE · rail -->
      <div class="sg-railwrap"><div class="sg-rail" aria-hidden="true">
        <button class="sg-rdot on" data-seg="he">01</button><span class="sg-rln"><i></i></span>
        <button class="sg-rdot" data-seg="school">02</button><span class="sg-rln"><i></i></span>
        <button class="sg-rdot" data-seg="edtech">03</button><span class="sg-rln"><i></i></span>
        <button class="sg-rdot" data-seg="coaching">04</button><span class="sg-rln"><i></i></span>
        <button class="sg-rdot" data-seg="overseas">05</button>
      </div></div>

      <!-- RIGHT · live product stage -->
      <div class="sg-stage">
        <div class="sg-win">
          <div class="sg-chrome"><i></i><i></i><i></i><span class="sg-url">app.extraaedge.com</span><span class="sg-live"><span class="d"></span>LIVE</span></div>
          <div class="sg-body">
            <div class="sg-fade" id="sgScene">
              <div class="sg-id">
                <span class="sg-badge" id="sgIcon"></span>
                <div><div class="sg-nm" id="sgName"></div><div class="sg-sub" id="sgSub"></div></div>
              </div>
              <div class="sg-metric"><span class="sg-mv" id="sgMetric">0</span><span class="sg-ml" id="sgMetricL"></span></div>
              <div class="sg-pipe">
                <div class="sg-pipe-h"><span id="sgStageA"></span><span id="sgStageB"></span></div>
                <div class="sg-bar"><i id="sgBarFill"></i></div>
              </div>
              <div class="sg-leads" id="sgLeads"></div>
              <div class="sg-wa">
                <span class="sg-wa-ic"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-07.svg" alt="" loading="lazy" decoding="async"></span>
                <div class="sg-bub"><span id="sgWa"></span><span class="cur" id="sgCur"></span><span class="tick">✓✓</span></div>
              </div>
            </div>
            <a class="sg-cta" href="https://www.extraaedge.com/book-a-demo/" id="sgCta"><span id="sgCtaT">See it live for Higher Education</span><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-08.svg" alt="" loading="lazy" decoding="async"></a>
            <div class="sg-trust">
              <span><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-09.svg" alt="" loading="lazy" decoding="async">30-min personalised demo</span>
              <span><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-09.svg" alt="" loading="lazy" decoding="async">No credit card</span>
              <span><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/segments-icon-09.svg" alt="" loading="lazy" decoding="async">Trusted by 500+ institutes</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
(function(){
  var SEGS = ['he','school','edtech','coaching','overseas'];
  var mm = window.matchMedia ? function(q){ return window.matchMedia(q); }
                             : function(){ return {matches:false, addEventListener:function(){}}; };
  var isMobile = function(){ return mm('(max-width:1020px)').matches; };
  var hasIO = 'IntersectionObserver' in window;
  var BOOK_URL = 'https://www.extraaedge.com/book-a-demo/';
  var DATA = {
    he:{name:'Higher Education',sub:'Admission Cloud · Multi-campus',
      icon:'<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-4 9 4-9 4z"/><path d="M7.5 11.5V16c0 1.1 2 2.2 4.5 2.2s4.5-1.1 4.5-2.2v-4.5"/></svg>',
      metric:48,prefix:'+',suffix:'%',label:'average conversion uplift across programs',
      stageA:'Enquiry',stageB:'Enrolment',bar:78,
      leads:[{av:'AS',b:'Aarav Sharma · B.Tech CSE',s:'Source: Google Ads · Campus A',score:'92 · Hot',cls:'hot'},
             {av:'PK',b:'Priya Kulkarni · MBA',s:'Source: Website · Scholarship query',score:'81 · Warm',cls:'warm'},
             {av:'RD',b:'Rohan Deshmukh · B.Com',s:'Source: WhatsApp · Campus B',score:'Enrolled',cls:'ok'}],
      wa:'Hi Aarav! Your B.Tech CSE application is shortlisted. Your counsellor Sneha will call you today at 4 PM.',
      cta:'See it live for Higher Education'},
    school:{name:'Schools · K-12',sub:'Parent Engagement Suite',
      icon:'<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V8l7-4 7 4v13"/><path d="M10 21v-5h4v5"/></svg>',
      metric:90,prefix:'',suffix:'%',label:'faster first response to every parent',
      stageA:'Enquiry',stageB:'Fee paid',bar:84,
      leads:[{av:'MJ',b:'Mehta Family · Grade 1',s:'Campus visit booked · Sat 11 AM',score:'Visit',cls:'warm'},
             {av:'KP',b:'Kapoor Family · Grade 5',s:'Application submitted · Docs pending',score:'Applied',cls:'hot'},
             {av:'SI',b:'Singh Family · Grade 8',s:'Fee link sent on WhatsApp',score:'Fee due',cls:'ok'}],
      wa:'Hello Mrs. Mehta! Reminder: your campus tour for Grade 1 admission is tomorrow at 11 AM. Reply 1 to confirm.',
      cta:'See it live for your School'},
    edtech:{name:'EdTech',sub:'AI Qualification Engine',
      icon:'<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="12" rx="2"/><path d="M2 20h20"/></svg>',
      metric:5000,prefix:'',suffix:'+',label:'leads qualified by AI calling, every single day',
      stageA:'Raw leads',stageB:'Sales-ready',bar:64,
      leads:[{av:'AI',b:'AI Caller · Batch #112544',s:'1,240 calls completed overnight',score:'Running',cls:'ok'},
             {av:'NV',b:'Neha V. · Data Science Pro',s:'Asked about EMI · attended webinar',score:'96 · Hot',cls:'hot'},
             {av:'AT',b:'Arjun T. · UX Bootcamp',s:'Opened pricing page 3× today',score:'78 · Warm',cls:'warm'}],
      wa:'Hi Neha! Great talking to you. Booking your counselling call for 6 PM today - our advisor Rahul will join.',
      cta:'See AI calling in action'},
    coaching:{name:'Coaching Institutes',sub:'Batch & Centre Operations',
      icon:'<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h13a1 1 0 011 1v13H7a2 2 0 00-2 2z"/><path d="M5 19a2 2 0 012-2h12"/></svg>',
      metric:65,prefix:'+',suffix:'%',label:'lead engagement across all centres',
      stageA:'JEE Batch A · seats',stageB:'58 / 60 filled',bar:96,
      leads:[{av:'VW',b:'Vivaan W. · NEET Repeater',s:'Walk-in · Andheri centre · 10:42 AM',score:'New',cls:'warm'},
             {av:'IS',b:'Ishita S. · JEE Batch A',s:'Seat blocked · payment pending',score:'Hold',cls:'hot'},
             {av:'C2',b:'Centre 2 · Thane',s:'Counsellor conv. rate 41% this week',score:'Top',cls:'ok'}],
      wa:'Hi Vivaan! Only 2 seats left in JEE Batch A (Mon-Wed-Fri). Shall I block one for you till tomorrow?',
      cta:'See it live for your Institute'},
    overseas:{name:'Overseas · Study Abroad',sub:'Global Application Pipeline',
      icon:'<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3c2.5 2.6 2.5 15.4 0 18M12 3c-2.5 2.6-2.5 15.4 0 18"/></svg>',
      metric:100,prefix:'',suffix:'%',label:'applications & documents tracked, zero misses',
      stageA:'Shortlist',stageB:'Visa filed',bar:71,
      leads:[{av:'TR',b:'Tanvi R. → University of Toronto',s:'SOP verified · LOR 2 of 3 received',score:'Docs',cls:'warm'},
             {av:'KM',b:'Kabir M. → TU Munich',s:'Offer received · visa slot booked',score:'Offer',cls:'ok'},
             {av:'ZA',b:'Zoya A. → University of Melbourne',s:'IELTS pending · deadline in 9 days',score:'Urgent',cls:'hot'}],
      wa:'Hi Tanvi! Your University of Toronto application moved to "Under Review". Next: upload financial docs by Friday.',
      cta:'See it live for Study Abroad'},
  };

  var reduced = mm('(prefers-reduced-motion: reduce)').matches;
  var scene = document.getElementById('sgScene');
  var els = {
    icon:document.getElementById('sgIcon'), name:document.getElementById('sgName'),
    sub:document.getElementById('sgSub'), metric:document.getElementById('sgMetric'),
    metricL:document.getElementById('sgMetricL'), stageA:document.getElementById('sgStageA'),
    stageB:document.getElementById('sgStageB'), bar:document.getElementById('sgBarFill'),
    leads:document.getElementById('sgLeads'), wa:document.getElementById('sgWa'),
    cur:document.getElementById('sgCur'), ctaT:document.getElementById('sgCtaT'),
    cta:document.getElementById('sgCta')
  };
  if(!scene) return;
  var current = null, counterRAF = null, typeTimer = null, leadTimers = [];

  function fmt(n){ return n >= 1000 ? n.toLocaleString('en-IN') : n; }

  function countTo(target, prefix, suffix){
    if(counterRAF) cancelAnimationFrame(counterRAF);
    if(reduced){ els.metric.textContent = prefix + fmt(target) + suffix; return; }
    var start = null, dur = 900;
    function step(ts){
      if(!start) start = ts;
      var p = Math.min((ts-start)/dur, 1);
      p = 1 - Math.pow(1-p, 3);
      els.metric.textContent = prefix + fmt(Math.round(target*p)) + suffix;
      if(p < 1) counterRAF = requestAnimationFrame(step);
    }
    counterRAF = requestAnimationFrame(step);
  }

  function typeWa(text){
    if(typeTimer) clearInterval(typeTimer);
    if(reduced){ els.wa.textContent = text; els.cur.style.display='none'; return; }
    els.cur.style.display='inline-block';
    els.wa.textContent = '';
    var i = 0;
    typeTimer = setInterval(function(){
      i += 2;
      els.wa.textContent = text.slice(0, i);
      if(i >= text.length){ clearInterval(typeTimer); els.cur.style.display='none'; }
    }, 18);
  }

  function renderLeads(list){
    leadTimers.forEach(clearTimeout); leadTimers = [];
    els.leads.innerHTML = '';
    list.forEach(function(l, i){
      var d = document.createElement('div');
      d.className = 'sg-lead';
      d.innerHTML = '<span class="sg-av">'+l.av+'</span><div class="sg-li"><b>'+l.b+'</b><span>'+l.s+'</span></div><span class="sg-score '+l.cls+'">'+l.score+'</span>';
      els.leads.appendChild(d);
      leadTimers.push(setTimeout(function(){ d.classList.add('in'); }, reduced ? 0 : 120 + i*140));
    });
  }

  function setSegment(seg){
    if(seg === current || !DATA[seg]) return;
    current = seg;
    var d = DATA[seg];

    document.querySelectorAll('#segments .sg-chip').forEach(function(c){
      var on = c.dataset.seg === seg;
      c.classList.toggle('on', on);
      c.setAttribute('aria-selected', on);
    });
    var idx = SEGS.indexOf(seg);
    document.querySelectorAll('#segments .sg-rdot').forEach(function(r,i){ r.classList.toggle('on', i <= idx); });
    document.querySelectorAll('#segments .sg-rln').forEach(function(l,i){ l.classList.toggle('fill', i < idx); });
    if(isMobile()){
      document.querySelectorAll('#segments .sg-ch').forEach(function(ch){
        ch.classList.toggle('active', ch.dataset.seg === seg);
      });
    }

    scene.classList.add('out');
    setTimeout(function(){
      els.icon.innerHTML = d.icon;
      els.name.textContent = d.name;
      els.sub.textContent = d.sub;
      els.metricL.textContent = d.label;
      els.stageA.textContent = d.stageA;
      els.stageB.textContent = d.stageB;
      els.bar.style.width = '0%';
      requestAnimationFrame(function(){ requestAnimationFrame(function(){ els.bar.style.width = d.bar + '%'; }); });
      countTo(d.metric, d.prefix, d.suffix);
      renderLeads(d.leads);
      typeWa(d.wa);
      els.ctaT.textContent = d.cta;
      els.cta.href = BOOK_URL + '?seg=' + seg;
      scene.classList.remove('out');
    }, reduced ? 0 : 200);
  }

  var chapters = document.querySelectorAll('#segments .sg-ch');
  var io = hasIO ? new IntersectionObserver(function(entries){
    if(isMobile()) return;
    entries.forEach(function(e){
      if(e.isIntersecting){
        chapters.forEach(function(c){ c.classList.toggle('active', c === e.target); });
        setSegment(e.target.dataset.seg);
      }
    });
  }, {rootMargin:'-42% 0px -42% 0px'}) : null;
  if(io) chapters.forEach(function(c){ io.observe(c); });

  function jump(seg){
    setSegment(seg);
    if(!isMobile()){
      var t = document.getElementById('sg-' + seg);
      if(t && t.scrollIntoView) t.scrollIntoView({behavior: reduced ? 'auto' : 'smooth', block:'center'});
    }
  }
  document.querySelectorAll('#segments .sg-chip, #segments .sg-rdot').forEach(function(b){
    b.addEventListener('click', function(){ jump(b.dataset.seg); });
  });

  mm('(max-width:1020px)').addEventListener('change', function(m){
    if(m.matches){
      chapters.forEach(function(c){ c.classList.toggle('active', c.dataset.seg === (current||'he')); });
    } else {
      chapters.forEach(function(c){ c.style.display=''; });
    }
  });

  var chips = Array.prototype.slice.call(document.querySelectorAll('#segments .sg-chip'));
  chips.forEach(function(chip, i){
    chip.addEventListener('keydown', function(e){
      var ni = null;
      if(e.key === 'ArrowRight') ni = (i+1) % chips.length;
      if(e.key === 'ArrowLeft') ni = (i-1+chips.length) % chips.length;
      if(e.key === 'Home') ni = 0;
      if(e.key === 'End') ni = chips.length-1;
      if(ni !== null){ e.preventDefault(); chips[ni].focus(); jump(chips[ni].dataset.seg); }
    });
  });

  function initialSeg(){
    var q = new URLSearchParams(location.search).get('seg');
    if(q && DATA[q]) return q;
    var h = (location.hash.match(/^#seg-(\w+)/)||[])[1];
    if(h && DATA[h]) return h;
    return 'he';
  }

  var sec = document.getElementById('segments');
  if(hasIO){
    var secIO = new IntersectionObserver(function(en){
      en.forEach(function(e){ sec.classList.toggle('sg-paused', !e.isIntersecting); });
    }, {threshold:0});
    secIO.observe(sec);
  }

  var start = initialSeg();
  setSegment(start);
  if(start !== 'he'){
    requestAnimationFrame(function(){
      var t = document.getElementById('sg-' + start);
      if(t && t.scrollIntoView && !isMobile()) t.scrollIntoView({block:'center'});
    });
  }
})();
</script>
<style>.ee-bp{
  --paper:#ffffff; --paper-2:#f6f8fc;
  --ink:#19345d; --ink-soft:#5b6b82;
  --line:rgba(25,52,93,.12);
  --orange:#DE6E30; --orange-2:#f0974f; --orange-soft:#fbeadf;
  --green:#1054b9; --mint:#7cb0ff;
  --panel:#19345d; --panel-2:#21457a;
  --panel-line:rgba(151,182,229,.16);
  --panel-txt:#dfeafa; --panel-dim:#8ea7cd;
  font-family:'Inter',sans-serif;
  background:var(--paper); color:var(--ink);
  position:relative; overflow:clip;
}.ee-bp::before{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:
    repeating-linear-gradient(0deg,transparent 0 31px,var(--line) 31px 32px),
    repeating-linear-gradient(90deg,transparent 0 31px,var(--line) 31px 32px);
  mask-image:radial-gradient(120% 90% at 70% 10%,#000 30%,transparent 75%);
  opacity:.5;
}.ee-bp *{box-sizing:border-box;margin:0;padding:0}.ee-bp .ee-wrap{max-width:1180px;margin:0 auto;padding:104px 28px 88px;position:relative}.ee-kicker{display:inline-flex;align-items:center;gap:10px;font:600 11px/1 'Inter',sans-serif;letter-spacing:.22em;text-transform:uppercase;color:var(--orange);border:1px solid currentColor;border-radius:999px;padding:8px 14px;background:rgba(255,255,255,.55)}.ee-kicker i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:ee-ping 1.6s ease-out infinite}
@keyframes ee-ping{0%{box-shadow:0 0 0 0 rgba(222,110,48,.5)}100%{box-shadow:0 0 0 10px rgba(222,110,48,0)}}.ee-h2{font:600 clamp(34px,4.6vw,58px)/1.06 'Inter',sans-serif;letter-spacing:-.015em;margin:22px 0 18px;max-width:18ch}.ee-h2 em{font-style:italic;font-weight:500;color:var(--orange);background-image:linear-gradient(transparent 78%,var(--orange-soft) 78%)}.ee-lead{max-width:54ch;font-size:17px;line-height:1.65;color:var(--ink-soft)}.ee-lead b{color:var(--ink)}.ee-headrow{display:flex;justify-content:space-between;align-items:flex-end;gap:40px;margin-bottom:64px}.ee-index{font:500 12px/1.9 'Inter',sans-serif;color:var(--ink-soft);text-align:right;white-space:nowrap;display:none}
@media(min-width:960px){.ee-index{display:block}}.ee-index span{color:var(--orange)}.ee-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:clamp(36px,6vw,90px);align-items:start}.ee-stories{position:relative;padding-left:38px}.ee-rail{position:absolute;left:10px;top:6px;bottom:6px;width:2px;background:var(--line)}.ee-rail i{position:absolute;left:0;top:0;width:2px;height:0;background:var(--orange)}.ee-story{padding:9vh 0;max-width:46ch;position:relative;opacity:.3;transition:opacity .5s ease}.ee-story:first-child{padding-top:2vh}.ee-story.on{opacity:1}.ee-node{position:absolute;left:-38px;top:calc(9vh + 2px);width:24px;height:24px;display:grid;place-items:center;font:600 10px 'Inter',sans-serif;color:var(--ink-soft);background:var(--paper);border:1.5px solid var(--line);border-radius:50%;cursor:pointer;transition:.35s;}.ee-story:first-child .ee-node{top:calc(2vh + 2px)}.ee-node:hover{border-color:var(--orange);color:var(--orange);transform:scale(1.12)}.ee-story.on .ee-node{background:var(--orange);border-color:var(--orange);color:#fff;box-shadow:0 0 0 6px rgba(222,110,48,.14)}.ee-tag{font:600 10px/1 'Inter',sans-serif;letter-spacing:.2em;text-transform:uppercase;color:var(--orange)}.ee-story h3{font:600 clamp(24px,2.6vw,31px)/1.15 'Inter',sans-serif;letter-spacing:-.01em;margin:12px 0 14px}.ee-story p{font-size:15.5px;line-height:1.7;color:var(--ink-soft)}.ee-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:18px}.ee-chip{font:500 11.5px 'Inter',sans-serif;color:var(--ink);border:1px solid var(--line);background:rgba(255,255,255,.6);padding:7px 12px;border-radius:6px;transition:.2s}.ee-chip:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-2px)}.ee-cta{display:inline-flex;align-items:center;gap:10px;margin-top:26px;font:600 14px 'Inter',sans-serif;color:#fff;text-decoration:none;background:var(--ink);padding:14px 22px;border-radius:10px;box-shadow:4px 4px 0 var(--orange);transition:.2s}.ee-cta:hover{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--orange)}.ee-sticky{position:sticky;top:7vh;height:86vh;display:flex;align-items:center;perspective:1200px}.ee-device{width:100%;max-width:490px;margin:0 auto;border-radius:20px;background:linear-gradient(165deg,var(--panel-2),var(--panel) 55%);border:1px solid var(--panel-line);color:var(--panel-txt);box-shadow:0 40px 80px -30px rgba(25,52,93,.4),0 0 0 8px rgba(255,255,255,.5),0 0 0 9px var(--line);overflow:hidden;position:relative;transform-style:preserve-3d;transition:transform .25s ease;will-change:transform;}.ee-device::after{content:"";position:absolute;inset:10px;border:1px dashed rgba(151,182,229,.12);border-radius:14px;pointer-events:none}.ee-shine{position:absolute;inset:0;background:linear-gradient(105deg,transparent 40%,rgba(255,255,255,.07) 50%,transparent 60%);transform:translateX(-120%);pointer-events:none;z-index:4}.ee-device.shined .ee-shine{animation:ee-shine 1.1s ease}
@keyframes ee-shine{to{transform:translateX(120%)}}.ee-dhd{display:flex;justify-content:space-between;align-items:center;padding:14px 18px;border-bottom:1px solid var(--panel-line);font:600 13px 'Inter',sans-serif}.ee-live{display:inline-flex;align-items:center;gap:7px;font:600 10px 'Inter',sans-serif;letter-spacing:.15em;color:var(--mint)}.ee-live i{width:7px;height:7px;border-radius:50%;background:var(--mint);animation:ee-ping 1.6s infinite}.ee-pills{display:flex;gap:6px;padding:10px 14px;border-bottom:1px solid var(--panel-line);overflow-x:auto;scrollbar-width:none}.ee-pills::-webkit-scrollbar{display:none}.ee-pill{flex:0 0 auto;font:600 10px 'Inter',sans-serif;letter-spacing:.08em;color:var(--panel-dim);background:rgba(255,255,255,.04);border:1px solid var(--panel-line);border-radius:999px;padding:7px 12px;cursor:pointer;transition:.25s;white-space:nowrap;}.ee-pill:hover{color:var(--panel-txt);border-color:rgba(151,182,229,.4)}.ee-pill.on{background:var(--orange);border-color:var(--orange);color:#fff}.ee-screen{position:relative;height:368px;padding:20px 18px}.ee-view{position:absolute;inset:20px 18px;opacity:0;transform:translateY(14px) scale(.985);transition:opacity .45s ease,transform .45s ease;pointer-events:none}.ee-view.on{opacity:1;transform:none;pointer-events:auto}.ee-mono-dim{font:600 10px 'Inter',sans-serif;letter-spacing:.18em;text-transform:uppercase;color:var(--panel-dim);margin-bottom:12px}.ee-feed{display:flex;flex-direction:column;gap:9px;overflow:hidden;max-height:300px}.ee-row{display:flex;justify-content:space-between;align-items:center;gap:12px;background:rgba(255,255,255,.045);border:1px solid var(--panel-line);border-radius:12px;padding:11px 13px}.ee-row.new{animation:ee-drop .5s cubic-bezier(.2,.8,.2,1)}
@keyframes ee-drop{from{opacity:0;transform:translateY(-16px) scale(.97)}to{opacity:1;transform:none}}.ee-id{display:flex;gap:11px;align-items:center}.ee-av{width:33px;height:33px;border-radius:9px;display:grid;place-items:center;font:600 11px 'Inter',sans-serif;background:linear-gradient(135deg,var(--orange),var(--orange-2));color:#fff;flex:0 0 auto}.ee-row b{font-size:12.5px;display:block}.ee-row small{font-size:10.5px;color:var(--panel-dim)}.ee-sync{font:600 9px 'Inter',sans-serif;letter-spacing:.14em;color:var(--mint);border:1px solid rgba(124,176,255,.35);border-radius:5px;padding:4px 7px;flex:0 0 auto}.ee-feedfoot{margin-top:10px;font:500 10px 'Inter',sans-serif;color:var(--panel-dim)}.ee-feedfoot b{color:var(--mint)}.ee-bubble{max-width:84%;padding:11px 14px;border-radius:13px;font-size:12.5px;line-height:1.55;margin-bottom:10px;opacity:0;transform:translateY(8px);transition:.4s}.ee-bubble.show{opacity:1;transform:none}.ee-bubble.u{background:rgba(255,255,255,.07);border:1px solid var(--panel-line);border-bottom-left-radius:4px}.ee-bubble.a{background:linear-gradient(135deg,var(--orange),#e07d3a);color:#fff;margin-left:auto;border-bottom-right-radius:4px}.ee-typing{display:none;gap:4px;padding:10px 13px;background:rgba(255,255,255,.07);border-radius:13px;width:fit-content;margin-left:auto}.ee-typing.show{display:inline-flex}.ee-typing i{width:5px;height:5px;border-radius:50%;background:var(--panel-dim);animation:ee-tp 1s infinite}.ee-typing i:nth-child(2){animation-delay:.15s}.ee-typing i:nth-child(3){animation-delay:.3s}
@keyframes ee-tp{0%,100%{opacity:.3;transform:translateY(0)}50%{opacity:1;transform:translateY(-3px)}}.ee-handover{display:flex;align-items:center;gap:8px;margin-top:6px;font:600 9.5px 'Inter',sans-serif;letter-spacing:.12em;color:var(--mint);opacity:0;transition:.4s}.ee-handover.show{opacity:1}.ee-handover::before{content:"";flex:1;height:1px;background:var(--panel-line)}.ee-handover::after{content:"";flex:1;height:1px;background:var(--panel-line)}.ee-center{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}.ee-ring{width:70px;height:70px;border-radius:50%;display:grid;place-items:center;background:var(--orange);position:relative}.ee-ring::before,.ee-ring::after{content:"";position:absolute;inset:-12px;border-radius:50%;border:1px solid rgba(222,110,48,.5);animation:ee-rg 2.2s ease-out infinite}.ee-ring::after{animation-delay:1.1s}
@keyframes ee-rg{0%{transform:scale(.7);opacity:1}100%{transform:scale(1.5);opacity:0}}.ee-wave{display:flex;gap:4px;align-items:flex-end;height:26px;margin-top:16px}.ee-wave i{width:4px;border-radius:3px;background:linear-gradient(180deg,var(--orange-2),var(--orange));animation:ee-wv 1s ease-in-out infinite}
@keyframes ee-wv{0%,100%{height:6px}50%{height:26px}}.ee-calllog{margin-top:16px;width:100%;max-width:280px;text-align:left}.ee-calllog div{font:500 10.5px 'Inter',sans-serif;color:var(--panel-dim);padding:5px 0;border-bottom:1px dashed var(--panel-line);opacity:0;transform:translateX(-8px);transition:.4s}.ee-calllog div.show{opacity:1;transform:none}.ee-calllog b{color:var(--mint)}.ee-gaugewrap{display:flex;gap:18px;align-items:center}.ee-gauge{position:relative;width:150px;height:150px;flex:0 0 auto}.ee-gauge svg,.ee-gauge img.eeimg{transform:rotate(-90deg)}.ee-gauge .bg{stroke:rgba(255,255,255,.08)}.ee-gauge .fg{stroke:url(#eeGrad);stroke-linecap:round;stroke-dasharray:408;stroke-dashoffset:408;transition:stroke-dashoffset 1.4s cubic-bezier(.2,.8,.2,1)}.ee-gauge .num{position:absolute;inset:0;display:grid;place-items:center;font:600 44px/1 'Inter',sans-serif;color:#f0974f}.ee-gstats{flex:1;display:flex;flex-direction:column;gap:8px}.ee-gstat{background:rgba(255,255,255,.04);border:1px solid var(--panel-line);border-radius:10px;padding:9px 12px;display:flex;justify-content:space-between;align-items:center}.ee-gstat small{font:500 9.5px 'Inter',sans-serif;letter-spacing:.08em;color:var(--panel-dim);text-transform:uppercase}.ee-gstat b{font-size:12px}.ee-spark{margin-top:14px}.ee-spark path{stroke:var(--orange-2);stroke-width:2;fill:none;stroke-dasharray:600;stroke-dashoffset:600;transition:stroke-dashoffset 1.6s ease .3s}.ee-spark.run path{stroke-dashoffset:0}.ee-spark .area{fill:url(#eeAreaGrad);stroke:none;opacity:0;transition:opacity .8s ease .8s}.ee-spark.run .area{opacity:1}.ee-orbit{position:relative;width:170px;height:170px;margin-bottom:14px}.ee-orbit .core{position:absolute;inset:50px;border-radius:50%;background:var(--green);display:grid;place-items:center;font-size:26px;color:#fff;box-shadow:0 0 0 10px rgba(16,84,185,.15)}.ee-orbit .path{position:absolute;inset:0;border:1px dashed rgba(151,182,229,.3);border-radius:50%;animation:ee-spin 14s linear infinite}.ee-orbit .sat{position:absolute;top:-13px;left:50%;margin-left:-13px;width:26px;height:26px;border-radius:8px;background:var(--panel-2);border:1px solid var(--panel-line);display:grid;place-items:center;font:600 8px 'Inter',sans-serif;color:var(--panel-txt);animation:ee-counterspin 14s linear infinite}.ee-orbit .path.p2{inset:14px;animation-duration:10s;animation-direction:reverse}.ee-orbit .path.p2 .sat{animation-duration:10s;animation-direction:reverse}
@keyframes ee-spin{to{transform:rotate(360deg)}}
@keyframes ee-counterspin{to{transform:rotate(-360deg)}}.ee-scalecount{font:600 30px/1 'Inter',sans-serif;color:#ffd9bf}.ee-scalecount small{font:600 10px 'Inter',sans-serif;letter-spacing:.15em;color:var(--panel-dim);display:block;margin-top:6px}.ee-stage-label{position:absolute;right:18px;bottom:12px;z-index:3;font:500 10px 'Inter',sans-serif;color:var(--panel-dim);letter-spacing:.18em}.ee-metrics{margin-top:96px;border-top:1.5px solid var(--ink);border-bottom:1.5px solid var(--ink);display:grid;grid-template-columns:repeat(4,1fr)}.ee-m{padding:30px 22px;border-left:1px solid var(--line)}.ee-m:first-child{border-left:none}.ee-m b{display:block;font:600 clamp(34px,3.6vw,46px)/1 'Inter',sans-serif;color:var(--orange);letter-spacing:-.01em}.ee-m span{display:block;margin-top:10px;font:500 11px 'Inter',sans-serif;letter-spacing:.16em;text-transform:uppercase;color:var(--ink-soft)}.ee-roi{margin-top:72px;display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,1fr);border:1.5px solid var(--ink);border-radius:18px;overflow:hidden;background:rgba(255,255,255,.55);}.ee-roi-l{padding:38px 36px}.ee-roi-l h3{font:600 clamp(24px,2.8vw,34px)/1.15 'Inter',sans-serif;letter-spacing:-.01em}.ee-roi-l h3 em{font-style:italic;color:var(--orange)}.ee-roi-l p{margin-top:12px;font-size:14.5px;line-height:1.65;color:var(--ink-soft);max-width:44ch}.ee-sliderbox{margin-top:30px}.ee-sliderbox label{display:flex;justify-content:space-between;font:600 11px 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft)}.ee-sliderbox label output{color:var(--orange);font-size:13px}.ee-range{appearance:none;-webkit-appearance:none;width:100%;height:4px;border-radius:99px;background:linear-gradient(90deg,var(--orange) var(--p,30%),var(--line) var(--p,30%));margin-top:16px;cursor:pointer}.ee-range::-webkit-slider-thumb{appearance:none;-webkit-appearance:none;width:22px;height:22px;border-radius:50%;background:var(--paper);border:5px solid var(--orange);box-shadow:0 2px 8px rgba(25,52,93,.3);transition:transform .15s}.ee-range::-webkit-slider-thumb:hover{transform:scale(1.15)}.ee-range::-moz-range-thumb{width:22px;height:22px;border-radius:50%;background:var(--paper);border:5px solid var(--orange);box-shadow:0 2px 8px rgba(25,52,93,.3)}.ee-roi-note{margin-top:18px;font:500 10px 'Inter',sans-serif;color:var(--ink-soft);opacity:.75}.ee-roi-r{background:var(--ink);color:#fff;padding:38px 36px;display:flex;flex-direction:column;justify-content:center;gap:22px;position:relative;overflow:hidden}.ee-roi-r::before{content:"";position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent 0 31px,rgba(255,255,255,.05) 31px 32px),repeating-linear-gradient(90deg,transparent 0 31px,rgba(255,255,255,.05) 31px 32px);pointer-events:none}.ee-roi-stat small{font:600 10px 'Inter',sans-serif;letter-spacing:.18em;text-transform:uppercase;color:#9bb3d6;display:block;margin-bottom:8px}.ee-roi-stat b{font:600 clamp(30px,3.4vw,44px)/1 'Inter',sans-serif;color:#f0974f}.ee-roi-stat.hero b{font-size:clamp(40px,4.6vw,60px);color:var(--orange-2);text-shadow:0 0 40px rgba(222,110,48,.4)}.ee-roi-cta{position:relative;display:inline-flex;align-items:center;gap:10px;width:fit-content;font:600 14px 'Inter',sans-serif;color:var(--ink);background:#fff;text-decoration:none;padding:14px 24px;border-radius:10px;box-shadow:4px 4px 0 var(--orange);transition:.2s}.ee-roi-cta:hover{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--orange)}.ee-rv{opacity:0;transform:translateY(22px);transition:.7s cubic-bezier(.2,.7,.2,1)}.ee-rv.in{opacity:1;transform:none}
@media(max-width:880px){.ee-grid{grid-template-columns:1fr}.ee-sticky{position:sticky;top:8px;height:auto;order:-1;z-index:5;padding:0 0 14px;perspective:none}.ee-device{max-width:none}.ee-screen{height:330px}.ee-story{padding:48px 0}.ee-node{top:50px}.ee-story:first-child .ee-node{top:50px}.ee-story:first-child{padding-top:48px}.ee-roi{grid-template-columns:1fr}.ee-metrics{grid-template-columns:repeat(2,1fr)}.ee-m:nth-child(3){border-left:none;border-top:1px solid var(--line)}.ee-m:nth-child(4){border-top:1px solid var(--line)}
}
@media(prefers-reduced-motion:reduce){.ee-bp *,.ee-bp *::before,.ee-bp *::after{animation:none!important;transition:none!important}.ee-rv,.ee-bubble{opacity:1!important;transform:none!important}
}
</style>

<section class="ee-bp" id="ecosystem">
  <div class="ee-wrap">
    <div class="ee-headrow ee-rv">
      <div>
        <span class="ee-kicker"><i></i> Admission Ecosystem</span>
        <h2 class="ee-h2">Why institutes choose ExtraaEdge as the <em>architect of their admissions.</em></h2>
        <p class="ee-lead">Most Admission CRMs help you <b>manage</b> admissions. ExtraaEdge helps you <b>design</b> how admissions should work - end to end, at scale.</p>
      </div>
    </div>
    <div class="ee-grid">
      <div class="ee-stories">
        <div class="ee-rail"><i id="eeRail"></i></div>
        <article class="ee-story on" data-stage="0">
          <button class="ee-node" aria-label="Go to stage 1">01</button>
          <span class="ee-tag">Foundation</span>
          <h3>One Unified Admission Cloud</h3>
          <p>Every channel, team and stage on a single intelligent platform - no fragmented tools, no manual follow-ups.</p>
          <div class="ee-chips"><span class="ee-chip">Ads Integration</span><span class="ee-chip">ERP Sync</span><span class="ee-chip">Website Tracking</span></div>
        </article>
        <article class="ee-story" data-stage="1">
          <button class="ee-node" aria-label="Go to stage 2">02</button>
          <span class="ee-tag">Front Door</span>
          <h3>24/7 AI Admission Assistance</h3>
          <p>VidyaGPT answers, qualifies and routes student queries across web and WhatsApp - round the clock, with full counsellor context.</p>
          <div class="ee-chips"><span class="ee-chip">WhatsApp API</span><span class="ee-chip">Web Chatbot</span><span class="ee-chip">Counsellor Handover</span></div>
        </article>
        <article class="ee-story" data-stage="2">
          <button class="ee-node" aria-label="Go to stage 3">03</button>
          <span class="ee-tag">Engine Room</span>
          <h3>AI Calling &amp; Intelligent Agents</h3>
          <p>Qualify large volumes and pass only serious prospects to counsellors. Grow outcomes without growing headcount.</p>
          <div class="ee-chips"><span class="ee-chip">Auto Qualification</span><span class="ee-chip">Intent Scoring</span><span class="ee-chip">Smart Routing</span></div>
        </article>
        <article class="ee-story" data-stage="3">
          <button class="ee-node" aria-label="Go to stage 4">04</button>
          <span class="ee-tag">Control Tower</span>
          <h3>Real-Time Intent Intelligence</h3>
          <p>Behaviour-driven scoring that decides who, when and how to engage - surfacing bottlenecks before they cost you a student.</p>
          <div class="ee-chips"><span class="ee-chip">Performance Audit</span><span class="ee-chip">Bottleneck Alerts</span><span class="ee-chip">Live Funnel</span></div>
        </article>
        <article class="ee-story" data-stage="4">
          <button class="ee-node" aria-label="Go to stage 5">05</button>
          <span class="ee-tag">Horizon</span>
          <h3>Built to Adapt &amp; Scale</h3>
          <p>Integrates seamlessly with ads, websites, ERP and communication tools. Scales with your institute's growth.</p>
          <div class="ee-chips"><span class="ee-chip">Custom Workflows</span><span class="ee-chip">API Ecosystem</span><span class="ee-chip">Global Scaling</span></div>
          <a href="#demo" class="ee-cta">Book a Demo <span aria-hidden="true">&#8594;</span></a>
        </article>
      </div>
      <div class="ee-sticky">
        <div class="ee-device" id="eeDevice">
          <span class="ee-shine"></span>
          <div class="ee-dhd"><b>ExtraaEdge Cloud</b><span class="ee-live"><i></i> LIVE</span></div>
          <div class="ee-pills" role="tablist" aria-label="Platform stages">
            <button class="ee-pill on" data-go="0" role="tab">UNIFIED</button>
            <button class="ee-pill" data-go="1" role="tab">AI ASSIST</button>
            <button class="ee-pill" data-go="2" role="tab">AI CALLING</button>
            <button class="ee-pill" data-go="3" role="tab">INTENT</button>
            <button class="ee-pill" data-go="4" role="tab">SCALE</button>
          </div>
          <div class="ee-screen">
            <div class="ee-view on" data-v="0">
              <div class="ee-mono-dim">Unified Inquiry Feed &middot; Streaming</div>
              <div class="ee-feed" id="eeFeed"></div>
              <div class="ee-feedfoot"><b id="eeFeedCount">0</b> INQUIRIES CAPTURED TODAY &middot; 0 LOST</div>
            </div>
            <div class="ee-view" data-v="1">
              <div class="ee-mono-dim">VidyaGPT &middot; WhatsApp &middot; 02:47 AM</div>
              <div class="ee-bubble u" data-step="0">&ldquo;Is there a hostel facility?&rdquo;</div>
              <span class="ee-typing" data-step="1"><i></i><i></i><i></i></span>
              <div class="ee-bubble a" data-step="2">Yes! 4 hostel blocks with 24/7 security. Sending the brochure to your WhatsApp now &#128196;</div>
              <div class="ee-bubble u" data-step="3">&ldquo;And the fee for B.Tech CSE?&rdquo;</div>
              <div class="ee-bubble a" data-step="4">&#8377;1.85L/yr with scholarships up to 40%. Want me to book a counsellor call?</div>
              <div class="ee-handover" data-step="5">LEAD QUALIFIED &#8594; ROUTED TO COUNSELLOR</div>
            </div>
            <div class="ee-view" data-v="2">
              <div class="ee-center">
                <div class="ee-ring"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ecosystem-icon-01.svg" alt="" width="26" height="26" loading="lazy" decoding="async"></div>
                <div class="ee-wave" aria-hidden="true"><i style="animation-delay:0s"></i><i style="animation-delay:.1s"></i><i style="animation-delay:.2s"></i><i style="animation-delay:.3s"></i><i style="animation-delay:.15s"></i><i style="animation-delay:.05s"></i><i style="animation-delay:.25s"></i></div>
                <div class="ee-calllog" id="eeCallLog">
                  <div>DIALED - 412 prospects this morning</div>
                  <div>QUALIFIED - <b>118 high-intent</b></div>
                  <div>ROUTED - 118 &#8594; 6 counsellors</div>
                  <div>HUMAN TIME SAVED - <b>34 hrs</b></div>
                </div>
              </div>
            </div>
            <div class="ee-view" data-v="3">
              <div class="ee-mono-dim">Live Intent Intelligence</div>
              <div class="ee-gaugewrap">
                <div class="ee-gauge">
                  <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ecosystem-icon-02.svg" alt="" width="150" height="150" loading="lazy" decoding="async">
                  <span class="num" id="eeScore">0</span>
                </div>
                <div class="ee-gstats">
                  <div class="ee-gstat"><small>Signal</small><b style="color:var(--mint)">Hot</b></div>
                  <div class="ee-gstat"><small>Next action</small><b>Call in 11 min</b></div>
                  <div class="ee-gstat"><small>Counsellor KRA</small><b style="color:#ffd9bf">Top Performer</b></div>
                </div>
              </div>
              <img class="eeimg ee-spark" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ecosystem-icon-03.svg" alt="" loading="lazy" decoding="async">
            </div>
            <div class="ee-view" data-v="4">
              <div class="ee-center">
                <div class="ee-orbit" aria-hidden="true"><div class="path"><span class="sat">ADS</span></div><div class="path p2"><span class="sat">ERP</span></div><div class="core">&#10003;</div></div>
                <div class="ee-scalecount"><span id="eeScale">0</span> leads/day<small>HANDLED WITHOUT ADDING HEADCOUNT</small></div>
              </div>
            </div>
          </div>
          <span class="ee-stage-label" id="eeStageLabel">STAGE 01 / 05</span>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function(){
  var root=document.getElementById('ecosystem');
  if(!root) return;
  var reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var stories=[].slice.call(root.querySelectorAll('.ee-story'));
  var views=[].slice.call(root.querySelectorAll('.ee-view'));
  var pills=[].slice.call(root.querySelectorAll('.ee-pill'));
  var rail=root.querySelector('#eeRail');
  var label=root.querySelector('#eeStageLabel');
  var device=root.querySelector('#eeDevice');
  var current=0, timers=[];
  function clearTimers(){ timers.forEach(function(t){clearTimeout(t);clearInterval(t);}); timers=[]; }
  function later(fn,ms){ var t=setTimeout(fn,ms); timers.push(t); return t; }
  function every(fn,ms){ var t=setInterval(fn,ms); timers.push(t); return t; }
  var LEADS=[['FB','Facebook Ads','Campus - Mumbai South'],['WA','WhatsApp','Status - Hot Lead'],['WB','Website Form','Course - B.Tech CSE'],['GA','Google Ads','Campaign - MBA 2026'],['IG','Instagram','DM - Fee Inquiry'],['ED','Education Fair','Scan - Pune Expo'],['RF','Referral','Source - Alumni'],['LP','Landing Page','Course - BBA']];
  var feedEl=root.querySelector('#eeFeed'), feedCount=root.querySelector('#eeFeedCount'), fi=0, captured=0;
  function pushLead(animate){
    var d=LEADS[fi++ % LEADS.length];
    var row=document.createElement('div');
    row.className='ee-row'+(animate?' new':'');
    row.innerHTML='<div class="ee-id"><div class="ee-av">'+d[0]+'</div><div><b>'+d[1]+'</b><small>'+d[2]+'</small></div></div><span class="ee-sync">SYNCED</span>';
    feedEl.insertBefore(row,feedEl.firstChild);
    while(feedEl.children.length>4) feedEl.removeChild(feedEl.lastChild);
    captured++; if(feedCount) feedCount.textContent=captured.toLocaleString();
  }
  function sceneFeed(){
    feedEl.innerHTML=''; captured=46+Math.floor(Math.random()*9);
    pushLead(false); pushLead(false); pushLead(false);
    if(!reduced) every(function(){pushLead(true);},1900);
    else if(feedCount) feedCount.textContent=captured.toLocaleString();
  }
  function sceneChat(v){
    var steps=[].slice.call(v.querySelectorAll('[data-step]'));
    steps.forEach(function(s){s.classList.remove('show');});
    if(reduced){steps.forEach(function(s){if(!s.classList.contains('ee-typing'))s.classList.add('show');});return;}
    var typing=v.querySelector('.ee-typing');
    var seq=[[0,200],[1,900],[2,2100],[3,3400],[1,4100],[4,5300],[5,6300]];
    seq.forEach(function(p){
      later(function(){
        var el=steps.filter(function(s){return +s.dataset.step===p[0];})[0];
        if(!el) return;
        if(el===typing){el.classList.add('show');}
        else{el.classList.add('show'); if(typing)typing.classList.remove('show');}
      },p[1]);
    });
  }
  function sceneCall(v){
    var lines=[].slice.call(v.querySelectorAll('.ee-calllog div'));
    lines.forEach(function(l){l.classList.remove('show');});
    lines.forEach(function(l,i){ later(function(){l.classList.add('show');}, reduced?0:300+i*450); });
  }
  var gaugeFg=root.querySelector('#eeGaugeFg'), scoreEl=root.querySelector('#eeScore'), spark=root.querySelector('#eeSpark');
  function sceneGauge(){
    gaugeFg.style.strokeDashoffset=408; spark.classList.remove('run');
    void gaugeFg.getBoundingClientRect();
    later(function(){
      gaugeFg.style.strokeDashoffset=408-(408*0.87);
      spark.classList.add('run');
      animateNum(scoreEl,87,1300);
    },120);
  }
  var scaleEl=root.querySelector('#eeScale');
  function sceneScale(){ animateNum(scaleEl,1240,1600); }
  var SCENES=[sceneFeed,sceneChat,sceneCall,sceneGauge,sceneScale];
  function setStage(n,fromClick){
    if(n===current && !fromClick) return;
    current=n; clearTimers();
    stories.forEach(function(s){s.classList.toggle('on',+s.dataset.stage===n);});
    views.forEach(function(v){v.classList.toggle('on',+v.dataset.v===n);});
    pills.forEach(function(p){p.classList.toggle('on',+p.dataset.go===n);});
    if(label) label.textContent='STAGE 0'+(n+1)+' / 05';
    if(device && !reduced){device.classList.remove('shined');void device.offsetWidth;device.classList.add('shined');}
    var v=views.filter(function(x){return +x.dataset.v===n;})[0];
    if(SCENES[n]) SCENES[n](v);
  }
  pills.forEach(function(p){
    p.addEventListener('click',function(){
      var n=+p.dataset.go;
      setStage(n,true);
      if(window.innerWidth>880){ var target=stories[n]; if(target) target.scrollIntoView({behavior:reduced?'auto':'smooth',block:'center'}); }
    });
  });
  stories.forEach(function(s){
    var node=s.querySelector('.ee-node');
    if(node) node.addEventListener('click',function(){ setStage(+s.dataset.stage,true); s.scrollIntoView({behavior:reduced?'auto':'smooth',block:'center'}); });
  });
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting) setStage(+e.target.dataset.stage); }); },{rootMargin:'-45% 0px -45% 0px'});
    stories.forEach(function(s){io.observe(s);});
  }
  var col=root.querySelector('.ee-stories');
  function onScroll(){
    if(!col||!rail) return;
    var r=col.getBoundingClientRect(), vh=window.innerHeight;
    var p=Math.min(1,Math.max(0,(vh*0.5-r.top)/r.height));
    rail.style.height=(p*100)+'%';
  }
  window.addEventListener('scroll',onScroll,{passive:true}); onScroll();
  if(!reduced && window.matchMedia('(pointer:fine)').matches && device){
    var sticky=root.querySelector('.ee-sticky');
    sticky.addEventListener('mousemove',function(e){
      var r=device.getBoundingClientRect();
      var x=(e.clientX-r.left)/r.width-.5, y=(e.clientY-r.top)/r.height-.5;
      device.style.transform='rotateY('+(x*7)+'deg) rotateX('+(-y*7)+'deg)';
    });
    sticky.addEventListener('mouseleave',function(){device.style.transform='';});
  }
  var rv=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){e.target.classList.add('in');rv.unobserve(e.target);} }); },{threshold:.12});
  [].slice.call(root.querySelectorAll('.ee-rv')).forEach(function(el){rv.observe(el);});
  function animateNum(el,target,dur,prefix,suffix){
    if(!el) return;
    prefix=prefix||'';suffix=suffix||'';
    if(reduced){el.textContent=prefix+target.toLocaleString()+suffix;return;}
    var t0=null;
    function step(t){ if(!t0)t0=t; var k=Math.min(1,(t-t0)/dur), eased=1-Math.pow(1-k,3); el.textContent=prefix+Math.round(target*eased).toLocaleString()+suffix; if(k<1)requestAnimationFrame(step); }
    requestAnimationFrame(step);
  }
  var co=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ var el=e.target; animateNum(el,+el.dataset.count,1500,el.dataset.prefix||'',el.dataset.suffix||''); co.unobserve(el); } }); },{threshold:.4});
  [].slice.call(root.querySelectorAll('[data-count]')).forEach(function(c){co.observe(c);});

  var kick=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ setStage(0,true); kick.disconnect(); } }); },{threshold:.2});
  kick.observe(root);
})();
</script>
<!-- ===================== INTEGRATIONS ===================== -->
<section class="sec" id="integrations">
  <div class="container">
    <div class="head rv">
      <span class="eyebrow"><span class="dot"></span> Extensions &amp; Integrations</span>
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
<style>.wa-sec{
  --orange:#DE6E30;
  --blue:#19345d;
  --white:#FFFFFF;
  --blue-70:rgba(25,52,93,.7);
  --blue-10:rgba(25,52,93,.08);
  --blue-line:rgba(25,52,93,.14);
  --orange-10:rgba(222,110,48,.1);
  --orange-line:rgba(222,110,48,.25);
  font-family:'Inter',sans-serif;
  background:var(--white);
  color:var(--blue);
  position:relative;
  overflow:hidden;
  padding:clamp(72px,9vw,128px) 24px;
}.wa-sec *{box-sizing:border-box;margin:0;padding:0}.wa-sec::before{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:
    radial-gradient(640px 420px at 88% 6%, rgba(222,110,48,.07), transparent 65%),
    radial-gradient(520px 380px at 2% 94%, rgba(25,52,93,.06), transparent 60%);
}.wa-wrap{max-width:1180px;margin:0 auto;position:relative;z-index:1;
  display:grid;grid-template-columns:1.08fr .92fr;gap:clamp(40px,5vw,72px);align-items:center}.wa-eyebrow{display:inline-flex;align-items:center;gap:10px;
  font-size:12.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;
  color:var(--orange);background:var(--white);border:1px solid var(--blue-line);
  padding:8px 16px 8px 12px;border-radius:999px;box-shadow:0 2px 8px var(--blue-10)}.wa-eyebrow .pulse{width:8px;height:8px;border-radius:50%;background:var(--orange);position:relative}.wa-eyebrow .pulse::after{content:"";position:absolute;inset:-4px;border-radius:50%;
  border:2px solid var(--orange);animation:waPulse 1.8s ease-out infinite}
@keyframes waPulse{0%{transform:scale(.5);opacity:1}100%{transform:scale(1.4);opacity:0}}.wa-h2{font-weight:800;font-size:clamp(34px,4.2vw,50px);line-height:1.08;letter-spacing:-.025em;
  color:var(--blue);margin:22px 0 18px}.wa-h2 .hl{position:relative;white-space:nowrap;color:var(--orange)}.wa-h2 .hl svg,.wa-h2 .hl img.eeimg{position:absolute;left:0;bottom:-10px;width:100%;height:12px;overflow:visible}.wa-h2 .hl svg path,.wa-h2 .hl img.eeimg path{fill:none;stroke:var(--orange);stroke-width:3.5;stroke-linecap:round;
  stroke-dasharray:320;stroke-dashoffset:320;animation:waDraw 1s .5s ease forwards}
@keyframes waDraw{to{stroke-dashoffset:0}}.wa-lead{font-size:17px;line-height:1.65;color:var(--blue-70);max-width:54ch;margin-bottom:28px}.wa-lead b{color:var(--blue);font-weight:700}.wa-tabs{display:flex;gap:8px;margin-bottom:20px;flex-wrap:wrap}.wa-tab{font:600 13.5px/1 'Inter',sans-serif;cursor:pointer;
  padding:11px 18px;border-radius:999px;border:1px solid var(--blue-line);background:var(--white);
  color:var(--blue-70);transition:all .25s ease;display:flex;align-items:center;gap:7px}.wa-tab:hover{border-color:var(--orange);color:var(--blue)}.wa-tab.on{background:var(--blue);color:var(--white);border-color:var(--blue);
  box-shadow:0 6px 18px rgba(25,52,93,.3)}.wa-tab .tic{font-size:15px}.wa-panel{background:var(--white);border:1px solid var(--blue-line);border-radius:20px;
  padding:22px 24px;box-shadow:0 10px 30px var(--blue-10);min-height:128px;position:relative;overflow:hidden}.wa-panel::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:var(--orange)}.wa-panel h4{font-size:17px;font-weight:700;color:var(--blue);margin-bottom:8px;
  display:flex;align-items:center;gap:8px}.wa-panel p{font-size:14.5px;line-height:1.6;color:var(--blue-70)}.wa-panel .chips{display:flex;gap:8px;margin-top:14px;flex-wrap:wrap}.wa-panel .chip{font-size:12px;font-weight:600;color:var(--orange);
  background:var(--orange-10);border:1px solid var(--orange-line);padding:5px 11px;border-radius:999px}.wa-panel.swap{animation:waSwap .35s ease}
@keyframes waSwap{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}.wa-stats{display:flex;margin:28px 0 30px;background:var(--white);border:1px solid var(--blue-line);
  border-radius:18px;overflow:hidden;box-shadow:0 8px 24px var(--blue-10)}.wa-stat{flex:1;padding:18px 20px}.wa-stat + .wa-stat{border-left:1px solid var(--blue-line)}.wa-stat .n{font-weight:800;font-size:clamp(24px,2.6vw,32px);color:var(--blue);
  font-variant-numeric:tabular-nums;letter-spacing:-.02em}.wa-stat .l{font-size:11.5px;font-weight:600;letter-spacing:.07em;text-transform:uppercase;
  color:var(--blue-70);margin-top:4px}.wa-stat .vs{font-size:11.5px;color:var(--orange);font-weight:600;margin-top:2px}.wa-ctas{display:flex;gap:14px;align-items:center;flex-wrap:wrap}.wa-btn{font:600 15px/1 'Inter',sans-serif;text-decoration:none;cursor:pointer;
  display:inline-flex;align-items:center;gap:10px;padding:16px 28px;border-radius:14px;transition:all .25s ease}.wa-btn--p{background:var(--orange);color:var(--white);box-shadow:0 10px 26px rgba(222,110,48,.35)}.wa-btn--p:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(222,110,48,.45)}.wa-btn--p .arr{transition:transform .25s}.wa-btn--p:hover .arr{transform:translateX(4px)}.wa-btn--g{color:var(--blue);border:1.5px solid var(--blue-line);background:var(--white)}.wa-btn--g:hover{border-color:var(--blue)}.wa-btn--g .play{width:30px;height:30px;border-radius:50%;background:var(--blue-10);
  display:grid;place-items:center;font-size:11px;color:var(--blue)}.wa-stage{position:relative;display:flex;justify-content:center}.wa-phone{width:min(330px,100%);background:var(--blue);border-radius:38px;padding:10px;
  box-shadow:0 30px 70px rgba(25,52,93,.3),0 4px 14px rgba(25,52,93,.18);
  position:relative;z-index:2;transform:rotate(1.5deg);transition:transform .5s ease}.wa-stage:hover .wa-phone{transform:rotate(0deg)}.wa-screen{background:var(--white);border-radius:30px;overflow:hidden;display:flex;flex-direction:column;height:560px;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' opacity='0.05'%3E%3Cpath d='M20 20h8v8h-8zM52 12h6v6h-6zM38 50h10v10H38zM12 56h6v6h-6z' fill='%2319335D'/%3E%3C/svg%3E")}.wa-hd{background:var(--blue);color:var(--white);padding:14px 14px 12px;display:flex;align-items:center;gap:10px}.wa-hd .bk{font-size:20px;opacity:.85}.wa-hd .av{width:36px;height:36px;border-radius:50%;background:var(--white);display:grid;place-items:center;
  font-weight:800;color:var(--orange);font-size:15px;flex-shrink:0}.wa-hd .who{flex:1;min-width:0}.wa-hd .who b{font-size:14px;display:flex;align-items:center;gap:5px}.wa-hd .badge{width:14px;height:14px;border-radius:50%;background:var(--orange);display:inline-grid;place-items:center;flex-shrink:0}.wa-hd .badge svg,.wa-hd .badge img.eeimg{width:8px;height:8px}.wa-hd .who small{font-size:11px;opacity:.8;display:block;margin-top:1px}.wa-hd .ics{font-size:14px;letter-spacing:6px;opacity:.9}.wa-bd{flex:1;padding:14px 12px;overflow:hidden;display:flex;flex-direction:column;gap:8px;justify-content:flex-end}.wa-msg{max-width:82%;padding:9px 12px;border-radius:12px;font-size:13px;line-height:1.45;
  box-shadow:0 1px 3px var(--blue-10);position:relative;
  opacity:0;transform:translateY(12px) scale(.97);transition:opacity .4s ease,transform .4s cubic-bezier(.2,.9,.3,1.2)}.wa-msg.in{opacity:1;transform:none}.wa-msg--biz{align-self:flex-start;background:var(--blue-10);color:var(--blue);border-top-left-radius:4px}.wa-msg--usr{align-self:flex-end;background:var(--orange-10);color:var(--blue);
  border:1px solid var(--orange-line);border-top-right-radius:4px}.wa-msg .meta{display:flex;justify-content:flex-end;gap:4px;align-items:center;margin-top:3px;
  font-size:10px;color:var(--blue-70)}.wa-msg .ticks{color:var(--orange);font-size:11px;letter-spacing:-3px}.wa-msg .doc{display:flex;align-items:center;gap:9px;background:var(--white);
  border:1px solid var(--blue-line);border-radius:9px;padding:9px 11px;margin-bottom:5px}.wa-msg .doc .di{width:32px;height:32px;border-radius:8px;background:var(--orange);color:var(--white);
  display:grid;place-items:center;font-size:10px;font-weight:700;flex-shrink:0}.wa-msg .doc b{font-size:12px;display:block;color:var(--blue)}.wa-msg .doc small{font-size:10.5px;color:var(--blue-70)}.wa-qrs{display:flex;flex-direction:column;gap:5px;align-self:flex-start;max-width:82%;
  opacity:0;transition:opacity .4s ease}.wa-qrs.in{opacity:1}.wa-qr{background:var(--white);border:1px solid var(--orange-line);color:var(--orange);font-weight:600;
  font-size:12.5px;text-align:center;padding:8px 14px;border-radius:18px;box-shadow:0 1px 3px var(--blue-10)}.wa-typing{align-self:flex-start;background:var(--blue-10);border-radius:12px;border-top-left-radius:4px;
  padding:12px 16px;display:none;gap:4px}.wa-typing.show{display:flex}.wa-typing i{width:7px;height:7px;border-radius:50%;background:var(--blue-70);animation:waDot 1.2s infinite}.wa-typing i:nth-child(2){animation-delay:.15s}.wa-typing i:nth-child(3){animation-delay:.3s}
@keyframes waDot{0%,60%,100%{transform:translateY(0);opacity:.5}30%{transform:translateY(-5px);opacity:1}}.wa-ft{background:var(--blue-10);padding:9px 12px;display:flex;align-items:center;gap:10px}.wa-ft .field{flex:1;background:var(--white);border-radius:18px;padding:9px 14px;font-size:13px;color:var(--blue-70)}.wa-ft .snd{width:38px;height:38px;border-radius:50%;background:var(--orange);display:grid;place-items:center;flex-shrink:0}.wa-ft .snd svg,.wa-ft .snd img.eeimg{width:16px;height:16px;fill:var(--white);margin-left:2px}.wa-float{position:absolute;background:var(--white);border:1px solid var(--blue-line);border-radius:16px;
  padding:13px 16px;box-shadow:0 14px 34px rgba(25,52,93,.16);z-index:3;
  display:flex;align-items:center;gap:11px;animation:waBob 5s ease-in-out infinite}.wa-float .fi{width:36px;height:36px;border-radius:11px;display:grid;place-items:center;font-size:16px;flex-shrink:0}.wa-float b{font-size:15px;font-weight:800;display:block;color:var(--blue)}.wa-float small{font-size:11px;color:var(--blue-70)}.wa-float--tl{top:6%;left:-6%;animation-delay:.6s}.wa-float--tl .fi{background:var(--blue-10)}.wa-float--br{bottom:9%;right:-7%}.wa-float--br .fi{background:var(--orange-10)}
@keyframes waBob{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}.wa-glow{position:absolute;width:78%;height:78%;top:11%;left:11%;border-radius:50%;z-index:1;
  background:radial-gradient(circle,rgba(222,110,48,.12),transparent 70%);filter:blur(20px)}.wa-rv{opacity:0;transform:translateY(24px);transition:opacity .7s ease,transform .7s ease}.wa-rv.vis{opacity:1;transform:none}.wa-rv.d1{transition-delay:.15s}
@media(max-width:920px){.wa-wrap{grid-template-columns:1fr;gap:56px}.wa-float--tl{left:0}.wa-float--br{right:0}.wa-stats{flex-direction:column}.wa-stat + .wa-stat{border-left:0;border-top:1px solid var(--blue-line)}
}
</style>

<section class="wa-sec" id="whatsapp">
  <div class="wa-wrap">

    <div class="wa-rv">
      <span class="wa-eyebrow"><span class="pulse"></span> WhatsApp Business API · Official Partner</span>

      <h2 class="wa-h2">Turn enquiries into enrolments,
        <span class="hl">right inside WhatsApp.
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/whatsapp-icon-01.svg" alt="" loading="lazy" decoding="async">
        </span>
      </h2>

      <p class="wa-lead">Your prospects check WhatsApp <b>23 times a day</b> - not their inbox. Run verified, personalised conversations at scale from your Admission CRM, with every reply, click and counsellor handoff tracked automatically.</p>

      <div class="wa-tabs" role="tablist">
        <button class="wa-tab on" data-tab="0" role="tab"><span class="tic">📣</span> Broadcast</button>
        <button class="wa-tab" data-tab="1" role="tab"><span class="tic">⚡</span> Automate</button>
        <button class="wa-tab" data-tab="2" role="tab"><span class="tic">🎯</span> Convert</button>
      </div>

      <div class="wa-panel" id="waPanel">
        <h4>📣 Bulk campaigns that feel 1:1</h4>
        <p>Segment by course, stage or source and send personalised broadcasts with merge fields, media and CTA buttons - without ever risking your number.</p>
        <div class="chips"><span class="chip">Smart segments</span><span class="chip">Template library</span><span class="chip">Scheduled sends</span></div>
      </div>

      <div class="wa-stats">
        <div class="wa-stat"><div class="n"><span data-wacount="92" data-suffix="%">0</span></div><div class="l">Open rate</div><div class="vs">↑ vs 21% on email</div></div>
        <div class="wa-stat"><div class="n"><span data-wacount="2480">0</span></div><div class="l">Msgs / counsellor / mo</div><div class="vs">↑ 4× more reach</div></div>
        <div class="wa-stat"><div class="n">&lt;<span data-wacount="60">0</span>s</div><div class="l">First response time</div><div class="vs">↑ +12% conversions</div></div>
      </div>

      <div class="wa-ctas">
        <a href="#demo" class="wa-btn wa-btn--p">Get verified in 48 hrs <span class="arr">→</span></a>
        <a href="#video" class="wa-btn wa-btn--g"><span class="play">▶</span> Watch 2-min demo</a>
      </div>
    </div>

    <div class="wa-rv d1 wa-stage">
      <div class="wa-glow"></div>

      <div class="wa-float wa-float--tl">
        <div class="fi">📊</div>
        <div><b id="fcRead">0%</b><small>Read within 5 min</small></div>
      </div>

      <div class="wa-phone">
        <div class="wa-screen">
          <div class="wa-hd">
            <span class="bk">‹</span>
            <span class="av">E</span>
            <div class="who">
              <b>ExtraaEdge Admissions <span class="badge"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/whatsapp-icon-02.svg" alt="" loading="lazy" decoding="async"></span></b>
              <small>online · replies in seconds</small>
            </div>
            <span class="ics">📹 📞 ⋮</span>
          </div>
          <div class="wa-bd" id="waBody">
            <div class="wa-typing" id="waTyping"><i></i><i></i><i></i></div>
          </div>
          <div class="wa-ft">
            <div class="field">Type a message…</div>
            <span class="snd"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/whatsapp-icon-03.svg" alt="" loading="lazy" decoding="async"></span>
          </div>
        </div>
      </div>

      <div class="wa-float wa-float--br">
        <div class="fi">🎓</div>
        <div><b>Application started</b><small>Auto-synced to CRM · just now</small></div>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  const io = new IntersectionObserver(es=>es.forEach(e=>{
    if(e.isIntersecting){e.target.classList.add('vis');io.unobserve(e.target);}
  }),{threshold:.15});
  document.querySelectorAll('.wa-rv').forEach(el=>io.observe(el));

  const sio = new IntersectionObserver(es=>es.forEach(e=>{
    if(!e.isIntersecting) return;
    sio.unobserve(e.target);
    const el=e.target, end=+el.dataset.wacount, pre=el.dataset.prefix||'', suf=el.dataset.suffix||'';
    const t0=performance.now(), dur=1400;
    (function tick(t){
      const p=Math.min((t-t0)/dur,1), ease=1-Math.pow(1-p,3);
      el.textContent=pre+Math.round(end*ease).toLocaleString()+suf;
      if(p<1) requestAnimationFrame(tick);
    })(t0);
  }),{threshold:.5});
  document.querySelectorAll('.wa-sec [data-wacount]').forEach(el=>sio.observe(el));

  const fc=document.getElementById('fcRead');
  let fv=0; const fT=setInterval(()=>{fv+=3;fc.textContent=Math.min(fv,89)+'%';if(fv>=89)clearInterval(fT);},40);

  const panels=[
    {h:'📣 Bulk campaigns that feel 1:1',p:'Segment by course, stage or source and send personalised broadcasts with merge fields, media and CTA buttons - without ever risking your number.',c:['Smart segments','Template library','Scheduled sends']},
    {h:'⚡ Journeys that run themselves',p:'Auto-trigger fee reminders, document nudges and counselling follow-ups based on lead stage. Hand off to a human the moment intent spikes.',c:['Drip sequences','Smart handoff','24×7 chatbot']},
    {h:'🎯 Every chat tied to revenue',p:'Replies, clicks and applications sync to the lead record instantly - so you know exactly which message moved which student to enrol.',c:['CRM auto-sync','Attribution reports','Counsellor inbox']}
  ];
  const panel=document.getElementById('waPanel');
  document.querySelectorAll('.wa-tab').forEach(tab=>tab.addEventListener('click',()=>{
    document.querySelectorAll('.wa-tab').forEach(t=>t.classList.remove('on'));
    tab.classList.add('on');
    const d=panels[+tab.dataset.tab];
    panel.classList.remove('swap'); void panel.offsetWidth;
    panel.innerHTML=`<h4>${d.h}</h4><p>${d.p}</p><div class="chips">${d.c.map(x=>`<span class="chip">${x}</span>`).join('')}</div>`;
    panel.classList.add('swap');
    playScript(+tab.dataset.tab);
  }));

  const body=document.getElementById('waBody');
  const typing=document.getElementById('waTyping');
  const scripts=[
    [
      {who:'biz',html:'Hi <b>Riya</b> 👋 Applications for <b>B.Tech CSE 2026</b> close in 5 days. Your profile is a strong fit - shall I reserve your slot?'},
      {who:'usr',html:'Yes! What documents do I need?'},
      {who:'biz',html:'<div class="doc"><div class="di">PDF</div><div><b>Admission_Checklist.pdf</b><small>2 pages · 240 KB</small></div></div>Here you go! Just 3 documents. Want me to book a counselling call too?'},
      {who:'qr',opts:['📅 Book a call','📝 Apply now','💬 Talk to counsellor']},
      {who:'usr',html:'📝 Apply now'},
      {who:'biz',html:'Perfect 🎉 Your application link: <b>extraaedge.in/apply/riya</b> - I\'ve pre-filled your details. Takes 4 minutes!'}
    ],
    [
      {who:'biz',html:'⏰ Reminder: your <b>fee payment</b> for Semester 1 is due tomorrow. Pay securely here 👇'},
      {who:'qr',opts:['💳 Pay now','📄 View invoice','🗓️ Request extension']},
      {who:'usr',html:'💳 Pay now'},
      {who:'biz',html:'Payment of <b>₹45,000</b> received ✅ Receipt sent to your email. Your seat is confirmed, Riya! 🎓'},
      {who:'biz',html:'Next step: orientation on <b>July 14</b>. I\'ll send the joining kit a week before - no action needed.'}
    ],
    [
      {who:'usr',html:'Hi, I filled the enquiry form on your website'},
      {who:'biz',html:'Welcome Riya! I can see you\'re interested in <b>MBA - Marketing</b>. You\'re eligible for our <b>merit scholarship</b> (up to 40%). Want the details?'},
      {who:'usr',html:'Yes please! 🙌'},
      {who:'biz',html:'Connecting you to <b>Priya from Admissions</b> - she\'s helped 200+ students get this scholarship. She\'ll message you in under a minute ⏱️'},
      {who:'biz',html:'Hi Riya, Priya here 👋 I\'ve reviewed your profile - let\'s get your scholarship application in today. Free for a quick call at 4 PM?'}
    ]
  ];

  let timers=[];
  function clearChat(){
    timers.forEach(clearTimeout); timers=[];
    typing.classList.remove('show');
    body.querySelectorAll('.wa-msg,.wa-qrs').forEach(n=>n.remove());
  }
  function addMsg(m){
    let el;
    if(m.who==='qr'){
      el=document.createElement('div'); el.className='wa-qrs';
      el.innerHTML=m.opts.map(o=>`<div class="wa-qr">${o}</div>`).join('');
      body.appendChild(el); requestAnimationFrame(()=>el.classList.add('in'));
    }else{
      el=document.createElement('div'); el.className='wa-msg wa-msg--'+m.who;
      const time=new Date().toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
      el.innerHTML=m.html+`<div class="meta">${time}${m.who==='usr'?' <span class="ticks">✓✓</span>':''}</div>`;
      body.appendChild(el); requestAnimationFrame(()=>el.classList.add('in'));
    }
    body.scrollTop=body.scrollHeight;
  }
  function playScript(i){
    clearChat();
    let delay=500;
    scripts[i].forEach(m=>{
      if(m.who==='biz'){
        timers.push(setTimeout(()=>{typing.classList.add('show');body.appendChild(typing);},delay));
        delay+=1100;
        timers.push(setTimeout(()=>{typing.classList.remove('show');addMsg(m);},delay));
      }else{
        timers.push(setTimeout(()=>addMsg(m),delay));
      }
      delay+=1500;
    });
    timers.push(setTimeout(()=>playScript(i),delay+4000));
  }

  const pio=new IntersectionObserver(es=>es.forEach(e=>{
    if(e.isIntersecting){playScript(0);pio.disconnect();}
  }),{threshold:.3});
  pio.observe(document.querySelector('.wa-phone'));
})();
</script>
<!-- ===================== SECURITY & COMPLIANCE ===================== -->
<section class="sec sec--soft" id="security">
  <div class="container">
    <div class="head rv">
      <span class="eyebrow"><span class="dot"></span> Enterprise-grade trust</span>
      <h2 class="h2">Your students' data, <span class="grad-o">protected by design.</span></h2>
      <p class="lead">Bank-grade security and compliance, so your institution and applicants are always safe.</p>
    </div>
    <div class="sec-grid rv">
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/iso%20certified%20logo.png" alt="ISO 27001"></div><b>ISO 27001 Certified</b><span>Audited information-security management.</span></div>
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/GDPR%20logo%20.png" alt="GDPR"></div><b>GDPR Compliant</b><span>Privacy-first data handling &amp; consent.</span></div>
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/india-data-residency-logo.png" alt="India Data Residency"></div><b>India Data Residency</b><span>Hosted on secure, scalable cloud.</span></div>
      <div class="sec-item"><div class="ic"><img decoding="async" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/role-based-acccess-logo.png" alt="Role-Based Access"></div><b>Role-Based Access</b><span>Granular permissions &amp; full audit trails.</span></div>
    </div>
  </div>
</section>

<!-- ===================== FAQ ===================== -->
<!-- ===================== CRO · COMPARISON + ROI CALCULATOR + STICKY CTA ===================== -->
<style>/* whitespace tighten across the home (safe higher-specificity override) */
  .ee-home .sec{padding-top:64px;padding-bottom:64px}
  @media(max-width:768px){.ee-home .sec{padding-top:44px;padding-bottom:44px}}#ee-cro{--nv:#19345d;--nv2:#22467c;--or:#DE6E30;--mut:#5a6b85;--line:rgba(25,52,93,.1);position:relative;padding:clamp(56px,7vw,92px) 0;background:linear-gradient(180deg,#fff,#f5f8fc);font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased;overflow:hidden}#ee-cro *{box-sizing:border-box}#ee-cro .cw{max-width:1140px;margin:0 auto;padding:0 22px}#ee-cro .ch{text-align:center;max-width:680px;margin:0 auto 34px}#ee-cro .eyebrow{display:inline-flex;align-items:center;gap:8px;font:700 12px/1 'Inter';letter-spacing:.13em;text-transform:uppercase;color:var(--or);margin-bottom:12px}#ee-cro .eyebrow i{width:7px;height:7px;border-radius:50%;background:var(--or)}#ee-cro h2{font-weight:800;font-size:clamp(26px,3.8vw,42px);line-height:1.1;letter-spacing:-.03em;color:var(--nv);margin:0 0 10px}#ee-cro h2 em{font-style:normal;color:var(--or)}#ee-cro .ch p{font-size:clamp(15px,1.6vw,17px);color:var(--mut);line-height:1.6;margin:0}/* comparison table */
  #ee-cro .cmp{background:#fff;border:1px solid var(--line);border-radius:18px;box-shadow:0 24px 60px -30px rgba(25,52,93,.3);overflow:hidden;margin-bottom:46px}#ee-cro .cmp-row{display:grid;grid-template-columns:1.6fr 1fr 1fr 1fr;align-items:center}#ee-cro .cmp-row+.cmp-row{border-top:1px solid var(--line)}#ee-cro .cmp-row.head{background:linear-gradient(180deg,#fbfdff,#f3f7fc);position:sticky;top:0}#ee-cro .cmp-row.head>div{padding:16px 14px;font-weight:800;font-size:13px;text-align:center;color:var(--nv)}#ee-cro .cmp-row.head>div:first-child{text-align:left;font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:var(--mut)}#ee-cro .cmp-row.head .us{background:linear-gradient(180deg,var(--nv2),var(--nv));color:#fff;border-radius:12px 12px 0 0;font-size:14px}#ee-cro .cmp-row>div{padding:13px 14px;font-size:13.5px}#ee-cro .cmp-row .feat{font-weight:600;color:var(--nv)}#ee-cro .cmp-row .cell{text-align:center;color:var(--mut)}#ee-cro .cmp-row .cell.us{background:rgba(222,110,48,.06);color:var(--nv);font-weight:700}#ee-cro .cmp-row:last-child .cell.us{border-radius:0 0 12px 12px}#ee-cro .yes{color:#1f519d;font-weight:800}#ee-cro .no{color:#c2c9d6}#ee-cro .part{color:#b9852b;font-weight:600;font-size:12px}#ee-cro .cmp-note{font-size:11.5px;color:var(--mut);text-align:center;margin-top:10px}
  @media(max-width:720px){#ee-cro .cmp-row{grid-template-columns:1.4fr .9fr .9fr .9fr}#ee-cro .cmp-row>div{padding:11px 8px;font-size:12px}#ee-cro .cmp-row.head>div{padding:12px 6px;font-size:11px}#ee-cro .cmp-row .feat{font-size:12px}
  }/* ROI calculator */
  #ee-cro .roi{display:grid;grid-template-columns:1fr 1.05fr;gap:0;background:#fff;border:1px solid var(--line);border-radius:18px;box-shadow:0 24px 60px -30px rgba(25,52,93,.3);overflow:hidden}#ee-cro .roi-in{padding:clamp(24px,3vw,38px)}#ee-cro .roi-in h3{font-size:20px;font-weight:800;color:var(--nv);margin:0 0 4px}#ee-cro .roi-in .sub{font-size:13px;color:var(--mut);margin:0 0 22px}#ee-cro .fld{margin-bottom:18px}#ee-cro .fld label{display:flex;justify-content:space-between;font-size:12.5px;font-weight:700;color:var(--nv);margin-bottom:7px}#ee-cro .fld label b{color:var(--or);font-weight:800}#ee-cro .fld input[type=range]{width:100%;accent-color:var(--or);height:5px}#ee-cro .fld .nums{display:flex;justify-content:space-between;font-size:10.5px;color:var(--mut);margin-top:4px}#ee-cro .roi-out{background:linear-gradient(150deg,var(--nv2),var(--nv));color:#fff;padding:clamp(24px,3vw,38px);display:flex;flex-direction:column;justify-content:center}#ee-cro .roi-out .lab{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#c6d4ea}#ee-cro .roi-out .big{font-size:clamp(34px,5vw,52px);font-weight:800;letter-spacing:-.03em;line-height:1.05;background:linear-gradient(100deg,#fff,#E8843F);-webkit-background-clip:text;background-clip:text;color:transparent;margin:2px 0 0}#ee-cro .roi-out .rev{font-size:clamp(18px,2.4vw,24px);font-weight:800;margin-top:14px}#ee-cro .roi-out .rev span{color:#9fb9e0}#ee-cro .roi-out .meta{display:flex;gap:22px;margin-top:18px;flex-wrap:wrap}#ee-cro .roi-out .meta div b{display:block;font-size:19px;font-weight:800}#ee-cro .roi-out .meta div span{font-size:11px;color:#c6d4ea}#ee-cro .roi-out .cta{display:inline-flex;align-items:center;justify-content:center;gap:9px;margin-top:24px;background:var(--or);color:#fff;font-weight:700;font-size:15px;padding:14px 24px;border-radius:12px;text-decoration:none;box-shadow:0 14px 30px -10px rgba(222,110,48,.6);transition:transform .2s}#ee-cro .roi-out .cta:hover{transform:translateY(-2px)}#ee-cro .roi-out .fine{font-size:10.5px;color:#9fb1cc;margin-top:12px;text-align:center}
  @media(max-width:760px){#ee-cro .roi{grid-template-columns:1fr}}/* sticky CTA bar */
  #ee-sticky{position:fixed;left:0;right:0;bottom:0;z-index:990;transform:translateY(120%);transition:transform .4s cubic-bezier(.2,.8,.2,1);background:rgba(15,29,51,.96);-webkit-backdrop-filter:blur(8px);backdrop-filter:blur(8px);border-top:1px solid rgba(255,255,255,.12);box-shadow:0 -10px 40px rgba(15,29,51,.3)}#ee-sticky.show{transform:none}#ee-sticky .sw{max-width:1140px;margin:0 auto;padding:11px 18px;display:flex;align-items:center;gap:16px}#ee-sticky .txt{color:#fff;font-size:14px;font-weight:600}#ee-sticky .txt b{color:#E8843F}#ee-sticky .sp{margin-left:auto;display:flex;align-items:center;gap:10px}#ee-sticky .go{background:var(--or,#DE6E30);color:#fff;font-weight:700;font-size:14px;padding:11px 22px;border-radius:10px;text-decoration:none;white-space:nowrap;transition:transform .2s}#ee-sticky .go:hover{transform:translateY(-2px)}#ee-sticky .x{background:rgba(255,255,255,.12);color:#fff;border:0;width:34px;height:34px;border-radius:9px;cursor:pointer;font-size:18px;line-height:1}#ee-sticky .x:hover{background:rgba(255,255,255,.22)}
  @media(max-width:600px){#ee-sticky .txt{font-size:12.5px}#ee-sticky .txt .hide{display:none}#ee-sticky .sw{padding:9px 12px;gap:10px}#ee-sticky .go{padding:10px 16px;font-size:13px}}
  @media(prefers-reduced-motion:reduce){#ee-sticky{transition:none}}
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
      <span class="eb"><i></i> Fast implementation</span>
      <h2>Go live in <em>7 days</em> - not months.</h2>
      <p>No long IT projects. Our team imports your data, configures your AI &amp; WhatsApp, trains your counsellors and gets you live in a single week.</p>
    </div>
    <div class="tl">
      <div class="st"><div class="n">1</div><div class="day">Day 1&ndash;2</div><h4>Kickoff &amp; data import</h4><p>We migrate your leads &amp; history - zero manual work for you.</p></div>
      <div class="st"><div class="n">2</div><div class="day">Day 3&ndash;4</div><h4>Setup &amp; branding</h4><p>Stages, forms, templates &amp; dashboards mapped to your funnel.</p></div>
      <div class="st"><div class="n">3</div><div class="day">Day 5&ndash;6</div><h4>AI &amp; WhatsApp config</h4><p>VidyaAI calling, VidyaGPT &amp; WhatsApp API live and tested.</p></div>
      <div class="st"><div class="n">4</div><div class="day">Day 7</div><h4>Go live + training</h4><p>Counsellors trained, you start converting from day one.</p></div>
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
        <a href="#demo" class="cta">Get a free migration plan &rarr;</a>
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
      <p class="ee-r-eyebrow">Resources</p>
      <h2>Everything you need to win admissions</h2>
      <p class="ee-r-sub">Practical guides, data-backed reports, and ready-to-use tools that help your team enroll more students, faster.</p>
    </div>
    <div class="ee-r-grid">

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-01.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Guides</h3>
        <p class="ee-r-desc">Step-by-step playbooks to set up and scale a high-converting admissions funnel.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-03.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Reports</h3>
        <p class="ee-r-desc">Benchmark studies on enrollment performance across institutions like yours.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-04.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Admission Trends</h3>
        <p class="ee-r-desc">What's shifting in applicant behavior, channels, and timelines this cycle.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-05.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Templates</h3>
        <p class="ee-r-desc">Proven email, SMS, and counselor scripts you can deploy in minutes.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-06.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Playbooks</h3>
        <p class="ee-r-desc">End-to-end strategies for lead nurturing, follow-ups, and yield management.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-07.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">ROI Calculator</h3>
        <p class="ee-r-desc">Estimate the revenue lift ExtraaEdge can unlock for your admissions team.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-08.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Webinars</h3>
        <p class="ee-r-desc">Expert-led sessions on AI, counseling, and modern admissions operations.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-09.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Customer Stories</h3>
        <p class="ee-r-desc">See how institutions grew enrollments and slashed response times with us.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
        <span class="ee-r-ico" aria-hidden="true">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-10.svg" alt="" loading="lazy" decoding="async">
        </span>
        <h3 class="ee-r-title">Videos</h3>
        <p class="ee-r-desc">Short, practical walkthroughs of features, workflows, and best practices.</p>
        <span class="ee-r-link">Explore <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-r-card" href="#demo">
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

<style>#ee-events{
    --navy:#19345d; --navy2:#22467c; --orange:#DE6E30; --orange2:#E8843F;
    --ink:#0f203a; --muted:#5a6b85; --hair:rgba(25,52,93,.09);
    position:relative; padding:clamp(64px,8vw,104px) 0;
    font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;
    color:var(--ink);
    background:linear-gradient(180deg,rgba(34,70,124,.025),rgba(34,70,124,0) 40%);
  }#ee-events *{box-sizing:border-box;}#ee-events .ee-e-container{max-width:1240px;margin:0 auto;padding:0 24px;}#ee-events .ee-e-head{max-width:760px;margin:0 0 clamp(32px,4vw,48px);}#ee-events .ee-e-eyebrow{
    display:inline-flex;align-items:center;gap:8px;
    font-size:12px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;
    color:var(--orange);margin:0 0 16px;
  }#ee-events .ee-e-eyebrow::before{
    content:"";width:22px;height:2px;border-radius:2px;
    background:linear-gradient(90deg,var(--orange),var(--orange2));
  }#ee-events h2{
    font-family:'Inter',system-ui,sans-serif;
    font-weight:600;font-size:clamp(28px,3.6vw,42px);line-height:1.12;
    letter-spacing:-.015em;margin:0 0 14px;color:var(--navy);
  }#ee-events .ee-e-sub{
    margin:0;font-size:clamp(15px,1.6vw,17px);line-height:1.6;color:var(--muted);max-width:600px;
  }#ee-events .ee-e-grid{
    display:grid;gap:12px;margin-bottom:clamp(28px,4vw,40px);
    grid-template-columns:repeat(3,minmax(0,1fr));
  }#ee-events .ee-e-card{
    position:relative;display:flex;flex-direction:column;
    background:#fff;border:1px solid var(--hair);border-radius:14px;
    padding:16px;text-decoration:none;color:inherit;
    box-shadow:0 1px 2px rgba(15,32,58,.04),0 10px 28px -18px rgba(15,32,58,.22);
    transition:transform .28s cubic-bezier(.2,.7,.3,1),box-shadow .28s ease,border-color .28s ease;
  }#ee-events .ee-e-card:hover{
    transform:translateY(-6px);border-color:rgba(25,52,93,.16);
    box-shadow:0 2px 4px rgba(15,32,58,.05),0 24px 44px -22px rgba(25,52,93,.34);
  }#ee-events .ee-e-card:focus-within{outline:3px solid rgba(222,110,48,.4);outline-offset:3px;}#ee-events .ee-e-top{display:flex;align-items:center;gap:12px;margin-bottom:18px;}#ee-events .ee-e-date{
    flex:0 0 auto;display:flex;flex-direction:column;align-items:center;justify-content:center;
    width:58px;height:62px;border-radius:14px;line-height:1;
    background:linear-gradient(160deg,var(--navy),var(--navy2));color:#fff;
    box-shadow:0 8px 18px -10px rgba(25,52,93,.6);
  }#ee-events .ee-e-date .d{font-family:'Inter',sans-serif;font-weight:600;font-size:22px;}#ee-events .ee-e-date .m{font-size:10.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;margin-top:4px;opacity:.92;}#ee-events .ee-e-date .y{font-size:10px;font-weight:500;margin-top:3px;opacity:.7;}#ee-events .ee-e-tag{
    display:inline-flex;align-items:center;gap:6px;
    font-size:11.5px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;
    padding:6px 11px;border-radius:999px;
    color:var(--navy2);background:rgba(34,70,124,.08);border:1px solid var(--hair);
  }#ee-events .ee-e-tag.is-live{color:var(--orange);background:rgba(222,110,48,.10);border-color:rgba(222,110,48,.18);}#ee-events .ee-e-tag .dot{width:6px;height:6px;border-radius:50%;background:currentColor;}#ee-events .ee-e-title{
    font-family:'Inter',system-ui,sans-serif;
    font-weight:600;font-size:18px;line-height:1.28;margin:0 0 9px;color:var(--navy);
  }#ee-events .ee-e-desc{margin:0 0 20px;font-size:14px;line-height:1.55;color:var(--muted);}#ee-events .ee-e-link{
    margin-top:auto;display:inline-flex;align-items:center;gap:6px;
    font-size:13.5px;font-weight:600;color:var(--orange);
  }#ee-events .ee-e-link svg,#ee-events .ee-e-link img.eeimg{width:14px;height:14px;transition:transform .25s ease;}#ee-events .ee-e-card:hover .ee-e-link svg,#ee-events .ee-e-card:hover .ee-e-link img.eeimg{transform:translateX(4px);}#ee-events .ee-e-link:focus-visible{outline:3px solid rgba(222,110,48,.55);outline-offset:3px;border-radius:4px;}#ee-events .ee-e-odhead{
    display:flex;align-items:baseline;gap:12px;margin:0 0 18px;
    font-family:'Inter',sans-serif;font-weight:600;font-size:15px;color:var(--navy);
  }#ee-events .ee-e-odhead::before{
    content:"On-demand";font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;
    color:var(--orange);
  }#ee-events .ee-e-odgrid{
    display:grid;gap:16px;grid-template-columns:repeat(3,minmax(0,1fr));
  }#ee-events .ee-e-od{
    display:flex;align-items:center;gap:14px;
    background:#fff;border:1px solid var(--hair);border-radius:14px;padding:16px 18px;
    text-decoration:none;color:inherit;
    box-shadow:0 1px 2px rgba(15,32,58,.04),0 8px 22px -16px rgba(15,32,58,.2);
    transition:transform .26s cubic-bezier(.2,.7,.3,1),box-shadow .26s ease,border-color .26s ease;
  }#ee-events .ee-e-od:hover{transform:translateY(-4px);border-color:rgba(25,52,93,.16);box-shadow:0 2px 4px rgba(15,32,58,.05),0 18px 34px -20px rgba(25,52,93,.3);}#ee-events .ee-e-od:focus-visible{outline:3px solid rgba(222,110,48,.55);outline-offset:3px;}#ee-events .ee-e-play{
    flex:0 0 auto;display:inline-flex;align-items:center;justify-content:center;
    width:42px;height:42px;border-radius:50%;
    background:linear-gradient(160deg,var(--orange),var(--orange2));color:#fff;
    box-shadow:0 8px 18px -9px rgba(222,110,48,.65);
  }#ee-events .ee-e-play svg,#ee-events .ee-e-play img.eeimg{width:16px;height:16px;margin-left:2px;}#ee-events .ee-e-od-body{display:flex;flex-direction:column;gap:5px;min-width:0;}#ee-events .ee-e-od-title{font-family:'Inter',sans-serif;font-weight:600;font-size:14.5px;line-height:1.25;color:var(--navy);}#ee-events .ee-e-od-link{display:inline-flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--orange);}#ee-events .ee-e-od-link svg,#ee-events .ee-e-od-link img.eeimg{width:12px;height:12px;transition:transform .25s ease;}#ee-events .ee-e-od:hover .ee-e-od-link svg,#ee-events .ee-e-od:hover .ee-e-od-link img.eeimg{transform:translateX(3px);}

  @media (max-width:900px){#ee-events .ee-e-grid{grid-template-columns:repeat(2,minmax(0,1fr));}#ee-events .ee-e-odgrid{grid-template-columns:repeat(2,minmax(0,1fr));}#ee-events .ee-e-grid .ee-e-card:nth-child(3){grid-column:1 / -1;}
  }
  @media (max-width:560px){#ee-events .ee-e-grid,#ee-events .ee-e-odgrid{grid-template-columns:1fr;}#ee-events .ee-e-grid .ee-e-card:nth-child(3){grid-column:auto;}#ee-events .ee-e-container{padding:0 18px;}
  }
  @media (prefers-reduced-motion:reduce){#ee-events .ee-e-card,#ee-events .ee-e-od,#ee-events .ee-e-link svg,#ee-events .ee-e-link img.eeimg,#ee-events .ee-e-od-link svg,#ee-events .ee-e-od-link img.eeimg{transition:none;}
  }
</style>
<section id="ee-events" aria-label="Events and Webinars">
  <div class="ee-e-container">
    <div class="ee-e-head">
      <p class="ee-e-eyebrow">Events &amp; Webinars</p>
      <h2>Live events &amp; on-demand webinars</h2>
      <p class="ee-e-sub">Learn from admissions leaders and AI experts, then revisit the sessions that matter most, anytime.</p>
    </div>

    <div class="ee-e-grid">

      <a class="ee-e-card" href="#demo">
        <div class="ee-e-top">
          <div class="ee-e-date"><span class="d">12</span><span class="m">Jul</span><span class="y">2026</span></div>
          <span class="ee-e-tag"><span class="dot"></span>Webinar</span>
        </div>
        <h3 class="ee-e-title">Using AI to Convert Inquiries into Enrollments</h3>
        <p class="ee-e-desc">A practical look at AI-led lead scoring and automated follow-ups that lift yield.</p>
        <span class="ee-e-link">Register free <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-e-card" href="#demo">
        <div class="ee-e-top">
          <div class="ee-e-date"><span class="d">29</span><span class="m">Jul</span><span class="y">2026</span></div>
          <span class="ee-e-tag"><span class="dot"></span>Workshop</span>
        </div>
        <h3 class="ee-e-title">Building a Counselor Workflow That Scales</h3>
        <p class="ee-e-desc">Hands-on session to design follow-up cadences your team can actually sustain.</p>
        <span class="ee-e-link">Register free <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

      <a class="ee-e-card" href="#demo">
        <div class="ee-e-top">
          <div class="ee-e-date"><span class="d">14</span><span class="m">Aug</span><span class="y">2026</span></div>
          <span class="ee-e-tag is-live"><span class="dot"></span>Live Event</span>
        </div>
        <h3 class="ee-e-title">Admissions Summit 2026: The AI-First Campus</h3>
        <p class="ee-e-desc">A flagship gathering of admissions leaders shaping the next enrollment era.</p>
        <span class="ee-e-link">Register free <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/resources-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
      </a>

    </div>

    <h3 class="ee-e-odhead">webinars you can watch right now</h3>
    <div class="ee-e-odgrid">

      <a class="ee-e-od" href="#demo">
        <span class="ee-e-play" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/events-icon-01.svg" alt="" loading="lazy" decoding="async"></span>
        <span class="ee-e-od-body">
          <span class="ee-e-od-title">Cutting Lead Response Time to Under 5 Minutes</span>
          <span class="ee-e-od-link">Watch now <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
        </span>
      </a>

      <a class="ee-e-od" href="#demo">
        <span class="ee-e-play" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/events-icon-01.svg" alt="" loading="lazy" decoding="async"></span>
        <span class="ee-e-od-body">
          <span class="ee-e-od-title">Personalizing Outreach at Scale with AI</span>
          <span class="ee-e-od-link">Watch now <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
        </span>
      </a>

      <a class="ee-e-od" href="#demo">
        <span class="ee-e-play" aria-hidden="true"><img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/events-icon-01.svg" alt="" loading="lazy" decoding="async"></span>
        <span class="ee-e-od-body">
          <span class="ee-e-od-title">Measuring True ROI Across Your Admissions Funnel</span>
          <span class="ee-e-od-link">Watch now <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/ai-experience-icon-02.svg" alt="" loading="lazy" decoding="async"></span>
        </span>
      </a>

    </div>
  </div>
</section>

<section class="sec sec--soft" id="faq">
  <div class="container">
    <div class="head rv">
      <span class="eyebrow"><span class="dot"></span> Frequently Asked</span>
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
<!-- ===================== FINAL CTA · VALUE + FORM ===================== -->
<section class="sec" id="demo">
  <div class="container">
    <div class="demo-grid rv">
      <!-- value side -->
      <div class="demo-left">
        <h2>Ready to convert more students, automatically?</h2>
        <p class="s">Book a free 45-minute demo. We'll map ExtraaEdge to your exact admission funnel - and show the conversion lift live with data from your sector.</p>
        <ul class="dchecks">
          <li><span class="ck">✓</span><div><b>A live walk-through of VidyaAI</b> - lead scoring, AI calling, WhatsApp &amp; follow-up automation working on your use case.</div></li>
          <li><span class="ck">✓</span><div><b>Your personalised ROI model</b> - exactly how many extra admissions you can expect this cycle.</div></li>
          <li><span class="ck">✓</span><div><b>A 14-day go-live plan</b> - migration, integrations and counsellor onboarding mapped out.</div></li>
          <li><span class="ck">✓</span><div><b>No obligation, no credit card</b> - just answers and a clear path to more enrolments.</div></li>
        </ul>
        <div class="dbadges">
          <div class="drating"><span class="st">★★★★★</span> 4.7/5 on G2 &amp; Capterra</div>
        </div>
      </div>
      <!-- form side -->
      <div class="demo-right">
        <h3>Get your free demo</h3>
        <p class="sub2"><span class="ping" style="display:inline-block;vertical-align:middle"></span> We'll reach out within the hour · 500+ institutions trust us</p>
        <form class="demo-form" id="demoForm" novalidate>
          <input type="text" placeholder="Your full name *" required aria-label="Your full name" />
          <input type="text" placeholder="Institute / organisation *" required aria-label="Institute name" />
          <input type="tel" placeholder="WhatsApp number *" required aria-label="WhatsApp number" />
          <input type="email" placeholder="Work email *" required aria-label="Work email" />
          <select required aria-label="Monthly enquiry volume">
            <option value="" disabled selected>Monthly enquiry volume</option>
            <option>Under 1,000</option><option>1,000 – 5,000</option><option>5,000 – 20,000</option><option>20,000+</option>
          </select>
          <button type="submit" class="btn btn-primary btn-lg">Book My Free Demo →</button>
        </form>
        <div class="demo-ok" id="demoOk">🎉 Thank you! Our admissions expert will reach out within the hour.</div>
        <p class="demo-trust">🔒 Your data is safe - ISO 27001 &amp; GDPR compliant. No spam, ever.</p>
      </div>
    </div>
  </div>
</section>
</div>

<script>
/* honour reduced-motion / low-power devices */
var RM = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* progress */
var prog=document.getElementById('prog');
addEventListener('scroll',function(){var h=document.documentElement;prog.style.width=(h.scrollTop/(h.scrollHeight-h.clientHeight)*100)+'%';},{passive:true});

/* reveal */
var rvObs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');rvObs.unobserve(e.target);}});},{threshold:.14});
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
  #ee-progress{position:fixed;top:0;left:0;height:3px;width:0;z-index:99999;background:linear-gradient(90deg,#19345d,#DE6E30);box-shadow:0 0 12px rgba(222,110,48,.45);pointer-events:none;transition:width .08s linear}/* section scroll-reveal - class is added by JS only,so no-JS users always see content */
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
    var tick=function(){
      var d=document.documentElement, sc=d.scrollTop||document.body.scrollTop, max=(d.scrollHeight-d.clientHeight)||1;
      bar.style.width=Math.min(100,(sc/max*100))+'%';
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
/* ---- Core Web Vitals: below-the-fold sections render lazily (faster first
   paint, lighter main thread -> better LCP/INP). Pinned / scroll-driven
   sections and anchor-critical blocks are excluded so their mechanics,
   animations and deep links are untouched. ---- */
#ee-teams,#ee-solutions,#ee-ind,#stories,#ee-cro,#integrations,#security,#ee-golive,#ee-switch,#ee-resources,#ee-events,#faq{content-visibility:auto;contain-intrinsic-size:auto 640px}
</style>
<style id="ee-seamless">/* One continuous background across the homepage - no divider lines,no section seams */
.ee-home .section-divider{display:none!important}#ecosystem,#segments,#whatsapp{display:none!important}/* ---- premium SaaS abstract background (CSS only · zero images) ---- */
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
#ee-products::before,#ee-teams::before,#ee-solutions::before,#ee-resources::before,#ee-events::before,#integrations::before,#security::before,#stories::before{ display:none!important; }/* plain white section backgrounds (keeps intentional dark component panels intact) */
#ee-products,#ee-teams,#ee-solutions,#ee-resources,#ee-events,#ee-industries{ background:#ffffff!important; }
</style>

<!-- ===================== EE · SMOOTH INERTIA SCROLL (desktop wheel, scoped/guarded) ===================== -->
<script>
(function(){
  var docEl=document.documentElement;
  try{
    if(matchMedia('(pointer:coarse)').matches) return;            // touch already scrolls smoothly
    if(matchMedia('(prefers-reduced-motion:reduce)').matches) return;
  }catch(e){ return; }
  if(!('requestAnimationFrame' in window)) return;

  var target=window.scrollY||window.pageYOffset||0, current=target, running=false;
  var EASE=0.2;                                                   // snappy, not laggy
  function maxScroll(){ return Math.max(0, docEl.scrollHeight - window.innerHeight); }
  /* let native handle the wheel when it's over a scrollable inner element
     (TOC list, horizontal rails, etc.) that can still move in this direction */
  function innerScrollable(node, dir){
    while(node && node!==document.body && node!==docEl && node.nodeType===1){
      var s=window.getComputedStyle(node), oy=s.overflowY;
      if((oy==='auto'||oy==='scroll') && node.scrollHeight>node.clientHeight+2){
        if(dir<0 && node.scrollTop>0) return true;
        if(dir>0 && node.scrollTop+node.clientHeight < node.scrollHeight-1) return true;
      }
      node=node.parentNode;
    }
    return false;
  }
  function step(){
    current += (target-current)*EASE;
    if(Math.abs(target-current)<0.5){ current=target; running=false; }
    window.scrollTo({top:Math.round(current), left:0, behavior:'instant'});  // 'instant' so CSS smooth doesn't double-animate
    if(running) requestAnimationFrame(step);
  }
  function onWheel(e){
    if(e.ctrlKey || e.deltaMode!==0) return;                      // pinch-zoom / line|page mode -> native
    if(Math.abs(e.deltaX) > Math.abs(e.deltaY)) return;           // horizontal intent -> native
    if(innerScrollable(e.target, e.deltaY)) return;               // inner scroller -> native
    var mx=maxScroll();
    if(!running){ current=target=(window.scrollY||window.pageYOffset||0); }
    var nt=Math.max(0, Math.min(mx, target + e.deltaY));
    if(nt===target) return;                                       // at an edge -> let the browser handle it
    target=nt;
    e.preventDefault();
    if(!running){ running=true; requestAnimationFrame(step); }
  }
  /* keep our target in sync with any non-wheel scrolling (scrollbar drag, keys, anchor jumps) */
  window.addEventListener('scroll', function(){ if(!running){ current=target=(window.scrollY||window.pageYOffset||0); } }, {passive:true});
  window.addEventListener('wheel', onWheel, {passive:false});
})();
</script>
<!-- ===================== /EE · SMOOTH INERTIA SCROLL ===================== -->


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
  .eebk-ov{padding:14px;align-items:center}
  .eebk{max-width:358px;border-radius:18px;min-height:auto}
  .eebk-top{grid-template-columns:1fr;padding:22px 18px 8px;gap:6px}
  .eebk-art{display:none}
  .eebk-x{top:10px;right:10px;width:34px;height:34px}
  .eebk h2{font-size:21px}
  .eebk .lead{font-size:12.5px;line-height:1.5;margin-bottom:14px}
  .eebk-feat{margin-bottom:10px;gap:11px}
  .eebk-feat .fi{width:36px;height:36px;border-radius:10px}
  .eebk-feat .fi svg{width:18px;height:18px}
  .eebk-feat b{font-size:13.5px}
  .eebk-feat span{font-size:11.5px}
  .eebk-cta{grid-template-columns:1fr;margin:0 16px;padding:13px 15px;text-align:center;gap:10px}
  .eebk-cta .lhs{flex-direction:column;text-align:center;gap:8px}
  .eebk-cta .hs{width:42px;height:42px}
  .eebk-cta .hs svg{width:21px;height:21px}
  .eebk-cta .lhs b{font-size:14px}
  .eebk-cta .lhs span{font-size:12px}
  .eebk-book{width:100%;font-size:14.5px;padding:12px 22px}
  .eebk-keep{font-size:12.5px;margin-top:7px}
  .eebk-foot{padding:12px;font-size:12px}
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
          <img class="wm" src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg" alt="ExtraaEdge">
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

  /* CRM Impact Stories: trust stats as a 2-up grid */
  #stories .cis-trust{display:grid!important;grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:10px!important;max-width:420px!important}
  #stories .cis-chip{justify-content:center;text-align:center;font-size:12px!important;padding:10px 8px!important}

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
  #ee-resources .ee-r-eyebrow,
  #ee-events .ee-e-eyebrow{ display:none!important; }
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
/* CRO / lead-gen section reorder - ideal user journey, DESIGN UNCHANGED.
   Uses CSS order only (no markup moved) so every section keeps its exact
   design, scripts and scroll behaviour. Flow: what it is -> proof -> problem
   -> value -> how it works -> product -> differentiator -> relevance ->
   social proof/ROI -> trust -> nurture -> FAQ -> convert. */
.ee-home{display:flex;flex-direction:column}
.ee-home>#ee-toc{order:-1}
.ee-home>#xhero{order:10}                 /* What it is + primary CTA */
.ee-home>#trusted-institutions{order:20}  /* Instant social proof */
.ee-home>#why-admissions-leak{order:30}   /* The problem */
.ee-home>#feature-pillars{order:40}       /* The value, at a glance */
.ee-home>#ee-night{order:50}              /* How it works, end to end */
.ee-home>#ee-platform{order:60}           /* See the product */
.ee-home>#ee-products{order:70}           /* Full platform / modules */
.ee-home>#ee-vidya-suite{order:80}        /* AI differentiator */
.ee-home>#ee-teams{order:90}              /* Every team */
.ee-home>#whatsapp{order:100}
.ee-home>#segments{order:110}
.ee-home>#ecosystem{order:120}
.ee-home>#ee-solutions{order:130}         /* Relevance: solutions */
.ee-home>#ee-ind{order:140}               /* Relevance: industries */
.ee-home>#stories{order:150}              /* Proof: impact stories */
.ee-home>#ee-cro{order:160}               /* Why switch + ROI value */
.ee-home>#integrations{order:170}         /* Trust: fits your stack */
.ee-home>#security{order:180}             /* Trust: enterprise-grade */
.ee-home>#ee-golive{order:190}            /* Objection: fast go-live */
.ee-home>#ee-switch{order:200}            /* Objection: easy switch */
.ee-home>#ee-resources{order:210}         /* Nurture */
.ee-home>#ee-events{order:220}            /* Nurture */
.ee-home>#faq{order:230}                  /* Final objections */
.ee-home>#demo{order:240}                 /* Convert */
</style>

<?php get_footer(); ?>
