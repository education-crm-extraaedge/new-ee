<?php
/**
 * Front Page (Home) — ExtraaEdge AI-Powered Admission CRM.
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
        { "@type": "Question", "name": "What is ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge is an AI-powered Admission CRM purpose-built for educational institutions — schools, colleges, universities and edtech companies. It automates lead capture, scores intent, triggers smart follow-ups and gives counselors real-time performance intelligence." } },
        { "@type": "Question", "name": "How does ExtraaEdge help convert more students?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge prioritises high-intent leads with AI scoring, responds to every enquiry in minutes with AI calling and WhatsApp automation, and tells counselors exactly who to follow up with next — reducing response time by up to 90% and boosting conversions by up to 48%." } },
        { "@type": "Question", "name": "Does ExtraaEdge offer a free demo?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. You can book a free personalised 45-minute demo on the ExtraaEdge website. A product expert will walk you through the platform live with data from your sector." } },
        { "@type": "Question", "name": "Is ExtraaEdge suitable for small colleges?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge serves institutions from single-campus colleges to large university groups processing 100,000+ applications per cycle. Pricing and features scale to your needs." } },
        { "@type": "Question", "name": "What AI features does ExtraaEdge offer?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge offers AI Lead Intent Scoring, AI Calling at scale via VidyaAI, Smart Follow-up Automation, WhatsApp Business API engagement and Counselor Performance Intelligence — all powered by its proprietary Admission Intelligence engine." } },
        { "@type": "Question", "name": "Will ExtraaEdge work with my existing ads and website?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge captures leads automatically from Meta and Google Ads, your website and landing pages, education portals, WhatsApp, IVR and more, with full source tracking. It also integrates with your ERP/SIS, payment gateway and cloud telephony." } },
        { "@type": "Question", "name": "How long does it take to implement ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "Most institutions go live in around 14 days, including data migration, integrations, workflow setup and counselor training, supported by a dedicated onboarding specialist and Customer Success Manager." } },
        { "@type": "Question", "name": "Does VidyaGPT support regional languages?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. VidyaGPT understands and responds in 95+ languages including Hindi, Marathi, Tamil, Telugu, Kannada, Bengali and Gujarati, over chat and on AI voice calls." } },
        { "@type": "Question", "name": "Is my data secure with ExtraaEdge?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails." } },
        { "@type": "Question", "name": "How does ExtraaEdge pricing work?", "acceptedAnswer": { "@type": "Answer", "text": "ExtraaEdge uses simple, transparent product-based pricing rather than module-based pricing that adds cost as you scale. Book a demo for a tailored quote based on your enquiry volume and required modules, with no hidden third-party charges." } },
        { "@type": "Question", "name": "Can I migrate from my existing CRM like Meritto, LeadSquared or Zoho?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. The ExtraaEdge team handles full data migration from your existing CRM or spreadsheets, including leads, history, sources and stages, as part of onboarding so you go live without losing data." } },
        { "@type": "Question", "name": "Will counsellors adopt ExtraaEdge easily?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. ExtraaEdge is a single-window CRM designed around the admissions team and is quick to learn even for non-technical counsellors, with hands-on training, on-ground support and a dedicated Customer Success Manager." } }
      ]
    }
  ]
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet" />
<link rel="preconnect" href="https://www.extraaedge.com" crossorigin />
<link rel="dns-prefetch" href="https://www.extraaedge.com" />
<link rel="preconnect" href="https://img.youtube.com" crossorigin />
<link rel="dns-prefetch" href="https://img.youtube.com" />
<?php
});

get_header();
?>

<style>
/* =====================================================================
   ExtraaEdge — Enterprise high-conversion Admission CRM homepage
   (no nav, no footer). Brand: Orange #DE6E30 · Blue #19335D · Inter+Poppins.
   Pure CSS + raw WebGL + vanilla JS (no frameworks) for speed + SEO.
   Effects: WebGL hero, sticky scrollytelling, morphing/scroll-zoom
   dashboards, real-time streaming dashboard, AI network visualization,
   live system feed, typewriter, counters.
   ===================================================================== */
:root{
  --orange:#DE6E30; --orange-soft:#fbeadf; --blue:#19335D; --blue-2:#21407a;
  --ink:#19335D; --muted:#5b6b82; --line:#e7ecf3; --bg:#fff; --bg-soft:#f6f8fc;
  --green:#10b981; --shadow:0 18px 50px rgba(25,51,93,.10);
  --shadow-sm:0 8px 24px rgba(25,51,93,.08); --radius:20px; --maxw:1200px;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
/* NOTE: do NOT put overflow on <body>. The theme header (#site-header) and its
   hover mega-menus/dropdowns live directly under <body>, so any overflow:hidden/
   clip on <body> clips those submenus (they don't open on the homepage) and an
   overflow:hidden would also turn <body> into a scroll container and break the
   header's position:sticky. Horizontal overflow from the wide hero/marquee
   animations is instead clipped on #main-content below, which does NOT contain
   the header. */
body{font-family:'Inter',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--ink);line-height:1.55;-webkit-font-smoothing:antialiased}
/* Clip the homepage's horizontal overflow on the content wrapper (the header is
   a sibling outside #main-content, so its dropdowns are never clipped). clip
   (not hidden) keeps overflow-y visible so the sticky scrollytelling still works. */
#main-content{overflow-x:hidden;overflow-x:clip}
.poppins{font-family:'Poppins',sans-serif}
.container{max-width:var(--maxw);margin:0 auto;padding:0 24px}
.muted{color:var(--muted)}
.grad-o{background:linear-gradient(95deg,var(--orange),#f0974f);-webkit-background-clip:text;background-clip:text;color:transparent}
section{position:relative}
section[id]{scroll-margin-top:24px}
img{max-width:100%;display:block}
a{color:inherit}
/* keyboard accessibility */
a:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,[tabindex]:focus-visible{outline:3px solid var(--orange);outline-offset:2px;border-radius:6px}
/* respect reduced-motion / low-power devices */
@media (prefers-reduced-motion: reduce){
  html{scroll-behavior:auto}
  .marq__track,.arch-screen::after,.iphone-glow,.ip-spin,.wv i,.cwaves i,.scanbar::after,.ping::after,.ctyping i{animation:none!important}
  *,*::before,*::after{transition-duration:.01ms!important}
}
#prog{position:fixed;top:0;left:0;height:3px;width:0;z-index:60;background:linear-gradient(90deg,var(--orange),var(--blue));box-shadow:0 0 12px rgba(222,110,48,.5)}

/* buttons */
.btn{display:inline-flex;align-items:center;gap:9px;padding:14px 26px;border-radius:14px;font-weight:700;font-size:15px;text-decoration:none;cursor:pointer;border:1.5px solid transparent;transition:transform .18s,box-shadow .25s,background .2s,color .2s;font-family:inherit}
.btn-primary{background:var(--orange);color:#fff;box-shadow:0 10px 26px rgba(222,110,48,.35)}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 16px 34px rgba(222,110,48,.45)}
.btn-dark{background:var(--blue);color:#fff;box-shadow:0 10px 26px rgba(25,51,93,.25)}
.btn-dark:hover{transform:translateY(-3px)}
.btn-ghost{background:#fff;color:var(--blue);border-color:var(--line)}
.btn-ghost:hover{border-color:var(--orange);color:var(--orange)}
.btn-lg{padding:17px 32px;font-size:16px}

/* pills / tags */
.pill{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:700;background:var(--orange-soft);color:var(--orange);padding:8px 16px;border-radius:999px}
.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:800;letter-spacing:1.4px;text-transform:uppercase;color:var(--orange);margin-bottom:14px}
.dot{width:8px;height:8px;border-radius:50%;background:var(--orange)}
.ping{position:relative;width:10px;height:10px;border-radius:50%;background:var(--green);flex:none}
.ping::after{content:"";position:absolute;inset:0;border-radius:50%;background:var(--green);animation:ping 1.6s cubic-bezier(0,0,.2,1) infinite}
@keyframes ping{75%,100%{transform:scale(2.6);opacity:0}}

/* heads / sections */
.head{max-width:780px;margin:0 auto;text-align:center}
.h2{font-family:'Poppins',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;letter-spacing:-1.2px;line-height:1.1}
.lead{color:var(--muted);font-size:18px;margin-top:16px}
.sec{padding:88px 0}
.sec--soft{background:var(--bg-soft)}

/* reveal */
.rv{opacity:0;transform:translateY(28px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}
.rv.in{opacity:1;transform:none}
.rv.d1{transition-delay:.08s}.rv.d2{transition-delay:.16s}.rv.d3{transition-delay:.24s}
@media (prefers-reduced-motion:reduce){.rv{opacity:1;transform:none;transition:none}}

.card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow-sm)}
.glass{background:rgba(255,255,255,.72);backdrop-filter:blur(10px);border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow-sm)}

/* ===================== HERO + WebGL ===================== */
.hero{padding:70px 0 46px;overflow:hidden}
#glsl{position:absolute;inset:0;width:100%;height:100%;z-index:0;opacity:.9;pointer-events:none}
.hero__bg{position:absolute;inset:0;z-index:1;pointer-events:none;background:radial-gradient(600px 380px at 12% 0%,rgba(222,110,48,.10),transparent 60%),radial-gradient(620px 420px at 92% 18%,rgba(25,51,93,.09),transparent 60%)}
.hero__in{position:relative;z-index:2;display:grid;grid-template-columns:1.04fr .96fr;gap:48px;align-items:center}
.hero h1{font-family:'Poppins',sans-serif;font-size:clamp(38px,5.2vw,64px);font-weight:800;letter-spacing:-1.8px;line-height:1.04;margin:16px 0}
.hero__type{color:var(--orange)}
.hero p.sub{font-size:18px;color:var(--muted);max-width:540px;margin-bottom:12px}
.hero__feat{color:var(--blue);font-weight:600;max-width:540px;margin-bottom:24px;font-size:16px}
.hero__cta{display:flex;gap:14px;flex-wrap:wrap;align-items:center}
.hero__micro{margin-top:16px;font-size:13.5px;color:var(--muted);display:flex;align-items:center;gap:8px}

.live{padding:22px;position:relative}
.live__top{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}
.live__brand{display:flex;align-items:center;gap:10px;font-weight:800;color:var(--blue)}
.orb{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--orange),var(--blue));display:grid;place-items:center;color:#fff;font-weight:900;font-size:15px;flex:none}
.live__count{font-size:13px;font-weight:800;color:var(--orange);display:flex;align-items:center;gap:7px}
.hero__modules{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px;padding-top:14px;border-top:1px solid var(--line)}
.hero__modules span{font-size:11px;font-weight:700;color:var(--blue);background:var(--bg-soft);border:1px solid var(--line);border-radius:999px;padding:5px 10px}
.step{border:1px solid var(--line);border-radius:14px;padding:13px 15px;margin-bottom:10px;background:#fff;opacity:0;transform:translateY(10px);transition:.5s}
.step.show{opacity:1;transform:none}
.step__tag{font-size:10.5px;font-weight:800;letter-spacing:1px;color:var(--muted)}
.step__txt{font-size:14.5px;margin-top:4px;font-weight:500;min-height:1.2em}
.step--in{border-left:3px solid var(--blue)}
.step--ai{border-left:3px solid var(--orange);background:linear-gradient(180deg,#fff,#fff8f3)}
.step--ai .step__tag{color:var(--orange)}
.step--ok{border-left:3px solid var(--green)}
.step--ok .step__tag{color:#16a34a}
.badge-ok{display:inline-flex;align-items:center;gap:6px;font-weight:800;color:#16a34a}
.waiting{display:inline-flex;gap:4px;align-items:center;color:var(--orange);font-size:12px;font-weight:700}
.wv{display:inline-flex;gap:3px;align-items:flex-end;height:16px}
.wv i{width:3px;background:var(--orange);border-radius:2px;animation:wave 1s ease-in-out infinite;height:5px}
.wv i:nth-child(2){animation-delay:.15s}.wv i:nth-child(3){animation-delay:.3s}.wv i:nth-child(4){animation-delay:.45s}.wv i:nth-child(5){animation-delay:.6s}
@keyframes wave{0%,100%{height:5px}50%{height:16px}}

/* ===================== MARQUEE ===================== */
.marq{padding:34px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:#fff}
.marq__lbl{text-align:center;color:var(--muted);font-weight:700;font-size:14px;margin-bottom:22px}
.marq__wrap{overflow:visible}
.marq__track{display:flex;flex-wrap:wrap;gap:22px 40px;width:auto;align-items:center;justify-content:center}
.marq__track.t1{animation:none}
@keyframes scrollx{to{transform:translateX(-50%)}}
.logo-card{width:170px;height:86px;flex:none;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}
.logo-card:hover{border-color:var(--orange);transform:translateY(-4px)}
.logo-card img{max-height:54px;width:auto;object-fit:contain;filter:grayscale(100%);opacity:.7;transition:.3s}
.logo-card:hover img{filter:grayscale(0);opacity:1}

/* ===================== STATS ===================== */
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.stat{text-align:center;padding:28px 18px;border-radius:18px;background:#fff;border:1px solid var(--line);box-shadow:var(--shadow-sm)}
.stat__n{font-family:'Poppins',sans-serif;font-size:46px;font-weight:800;letter-spacing:-2px;line-height:1}
.stat__l{color:var(--muted);font-size:14px;margin-top:8px;font-weight:600}

/* ===================== CAPS ===================== */
.caps{display:grid;grid-template-columns:repeat(12,1fr);gap:18px;margin-top:40px}
.cap{padding:26px;border-radius:var(--radius);background:#fff;border:1px solid var(--line);box-shadow:var(--shadow-sm);transition:transform .3s,box-shadow .3s,border-color .3s}
.cap:hover{transform:translateY(-6px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}
.cap h3{font-size:20px;margin:0 0 8px;letter-spacing:-.4px}
.cap p{color:var(--muted);font-size:14.5px}
.cap--lg{grid-column:span 6}.cap--md{grid-column:span 4}
.chiprow{display:flex;flex-wrap:wrap;gap:8px;margin-top:16px}
.chip{font-size:12.5px;font-weight:700;background:var(--bg-soft);border:1px solid var(--line);color:var(--blue);padding:7px 12px;border-radius:999px}

/* ===================== VIDYA SCROLLYTELLING ===================== */
.vidya-wrap{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start;margin-top:30px}
.vstory{min-height:80vh;display:flex;flex-direction:column;justify-content:center;opacity:.22;transform:translateY(30px);transition:opacity .7s,transform .7s;padding:24px 0}
.vstory.active{opacity:1;transform:none}
.vstory .vno{font-family:'Poppins',sans-serif;font-weight:800;color:var(--orange);font-size:22px;margin-bottom:8px}
.vstory h3{font-family:'Poppins',sans-serif;font-size:clamp(26px,3vw,40px);font-weight:800;letter-spacing:-1px;margin-bottom:14px;line-height:1.08}
.vstory p{color:var(--muted);font-size:17px;max-width:520px;margin-bottom:18px}
.vstory .mini{display:grid;grid-template-columns:1fr 1fr;gap:12px;max-width:520px}
.vstory .mini div{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px}
.vstory .mini b{display:block;font-size:14px;margin-bottom:3px}
.vstory .mini span{font-size:12.5px;color:var(--muted)}
.lift-box{background:var(--blue);color:#fff;border-radius:18px;padding:20px;max-width:520px}
.lift-box .row{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
.lift-box .row span{font-size:11px;opacity:.6;text-transform:uppercase;font-weight:800;letter-spacing:1px}
.lift-box .row b{color:#ffd9bf;font-family:'Poppins',sans-serif;font-size:18px}
.lift-box p{color:#c6d2e6;font-size:13.5px;margin:0}

.vsticky{position:sticky;top:84px;height:82vh;max-height:660px;display:flex;align-items:center;justify-content:center;perspective:2000px}
.crm{width:100%;height:100%;background:#fff;border-radius:24px;box-shadow:0 50px 100px -20px rgba(25,51,93,.18);border:1px solid var(--line);overflow:hidden;display:flex;flex-direction:column;transition:transform .8s cubic-bezier(.19,1,.22,1);transform-style:preserve-3d}
.crm-top{height:46px;border-bottom:1px solid var(--line);display:flex;align-items:center;gap:8px;padding:0 16px;flex:none}
.crm-top .d{width:11px;height:11px;border-radius:50%}
.crm-url{margin-left:auto;background:var(--bg-soft);border-radius:8px;font-size:10px;font-weight:700;color:var(--muted);padding:5px 12px}
.crm-body{flex:1;display:flex;overflow:hidden}
.crm-side{width:58px;background:#0f172a;display:flex;flex-direction:column;align-items:center;padding:18px 0;gap:16px;flex:none}
.s-ic{width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.06);display:grid;place-items:center;color:rgba(255,255,255,.45);transition:.3s}
.s-ic.on{background:var(--orange);color:#fff}
.s-ic svg{width:18px;height:18px}
.crm-main{flex:1;background:var(--bg-soft);padding:22px;overflow:hidden;position:relative}
.cv{display:none}
.cv.on{display:block;animation:slideIn .5s ease}
@keyframes slideIn{from{opacity:0;transform:translateX(18px)}to{opacity:1;transform:none}}
.cv h4{font-size:15px;margin-bottom:14px}
.kgrid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:14px}
.kbox{background:#fff;border:1px solid var(--line);border-radius:12px;padding:12px}
.kbox .l{font-size:9px;color:var(--muted);font-weight:800;letter-spacing:.5px;text-transform:uppercase;margin-bottom:4px}
.kbox .v{font-family:'Poppins',sans-serif;font-size:22px;font-weight:800}
.cbars{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px;height:150px;display:flex;align-items:flex-end;gap:8px}
.cbars i{flex:1;border-radius:6px 6px 0 0;transition:height .8s}
.lcard{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px;display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
.lcard .av{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;font-weight:800;font-size:11px}
.bub{background:#fff;border:1px solid var(--line);border-radius:14px;border-top-left-radius:4px;padding:11px 14px;font-size:12px;max-width:82%;margin-bottom:10px;line-height:1.5}
.bub.ai{background:#0f172a;color:#fff;border:none;border-radius:14px;border-top-right-radius:4px;margin-left:auto;box-shadow:var(--shadow-sm)}
.bub.ai .meta{margin-top:8px;padding-top:8px;border-top:1px solid rgba(255,255,255,.12);display:flex;justify-content:space-between;align-items:center;font-size:9px;font-weight:700}
.bub.ai .tag{background:var(--orange);padding:2px 7px;border-radius:5px}
.callbox{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}
.callring{width:78px;height:78px;border-radius:50%;background:#ef4444;display:grid;place-items:center;color:#fff;position:relative;margin-bottom:18px}
.callring::after{content:"";position:absolute;inset:0;border-radius:50%;background:#ef4444;opacity:.3;animation:ping 1.6s infinite}
.cwaves{display:flex;align-items:flex-end;gap:4px;height:34px;margin-bottom:12px}
.cwaves i{width:4px;border-radius:4px;background:var(--orange);animation:wave2 .8s infinite ease-in-out;height:8px}
@keyframes wave2{0%,100%{height:8px}50%{height:32px}}
.perf{background:#fff;border:1px solid var(--line);border-radius:14px;padding:16px;margin-bottom:12px}
.perf .pr{display:flex;justify-content:space-between;font-size:12px;font-weight:700;margin-bottom:8px}
.pbar{height:8px;background:var(--bg-soft);border-radius:6px;overflow:hidden}
.pbar i{display:block;height:100%;background:var(--orange);width:0;transition:width 1.2s}
.todo{background:#fff;border-left:4px solid var(--orange);border-radius:10px;padding:12px;margin-bottom:10px}
.todo .t{display:flex;justify-content:space-between;font-size:10px;font-weight:800;margin-bottom:4px}
.todo b{font-size:12px}

/* ===================== STREAMING DASHBOARD ===================== */
.split{display:grid;grid-template-columns:1fr 1fr;gap:54px;align-items:center}
.dash{padding:22px;border-radius:22px}
.dash__bar{display:flex;align-items:center;justify-content:space-between;font-size:12px;color:var(--muted);padding-bottom:14px;border-bottom:1px solid var(--line);margin-bottom:16px;font-weight:600;gap:8px;flex-wrap:wrap}
.dash__url{background:var(--bg-soft);border-radius:8px;padding:5px 12px;font-weight:600;color:var(--blue)}
#viewTag{font-weight:800;color:var(--orange)}
.kpis{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
.kpi{background:var(--bg-soft);border-radius:14px;padding:16px;border:1px solid var(--line)}
.kpi__l{font-size:11px;font-weight:800;letter-spacing:.6px;color:var(--muted)}
.kpi__v{font-family:'Poppins',sans-serif;font-size:24px;font-weight:800;color:var(--blue);margin-top:6px;letter-spacing:-1px}
.kpi__v small{color:#16a34a;font-size:12px;font-weight:800}
.bars{display:flex;align-items:flex-end;gap:8px;height:80px;margin-top:16px}
.bars i{flex:1;background:linear-gradient(180deg,var(--orange),#f0a06a);border-radius:6px 6px 0 0;transition:height .6s;height:40%}
#spark{width:100%;height:56px;display:block;margin-top:12px}
.feats{display:flex;flex-direction:column;gap:16px;margin-top:26px}
.feat{display:flex;gap:14px;align-items:flex-start}
.feat__ic{width:42px;height:42px;border-radius:12px;background:var(--orange-soft);color:var(--orange);display:grid;place-items:center;font-size:19px;flex:none}
.feat b{display:block;margin-bottom:2px}
.feat span{color:var(--muted);font-size:14.5px}

/* ===================== AUTOMATION FLOW (live) ===================== */
.flow{display:flex;align-items:center;gap:0;flex-wrap:wrap;margin-top:42px;justify-content:center}
.fnode{flex:0 0 auto;width:150px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:18px;text-align:center;box-shadow:var(--shadow-sm);transition:.4s}
.fnode.act{border-color:var(--orange);transform:translateY(-6px);box-shadow:0 18px 36px rgba(222,110,48,.18)}
.fnode__ic{font-size:24px;transition:.3s}
.fnode.act .fnode__ic{transform:scale(1.18)}
.fnode b{display:block;margin-top:8px;font-size:14.5px}
.fnode small{color:var(--muted);font-size:12px}
.fconn{flex:1;min-width:26px;height:3px;position:relative;background:#eef2f7;margin-top:-26px;border-radius:3px;overflow:hidden}
.fconn i{position:absolute;left:0;top:0;height:100%;width:0;background:var(--orange);border-radius:3px;transition:width .5s linear}
.fconn.on i{width:100%}
.fdart{position:absolute;top:50%;left:0;width:8px;height:8px;border-top:2px solid var(--orange);border-right:2px solid var(--orange);transform:translateY(-50%) rotate(45deg);opacity:0}

/* ===================== CHAT ===================== */
.chat{max-width:430px;width:100%;border-radius:22px;overflow:hidden;border:1px solid var(--line);box-shadow:var(--shadow);background:#fff}
.chat__hd{background:#1B3761;color:#fff;padding:16px 20px;display:flex;align-items:center;gap:12px}
.chat__hd b{font-size:15px}.chat__hd small{opacity:.85;display:flex;align-items:center;gap:6px;font-size:12px}
.chat__bd{padding:18px;height:420px;overflow-y:auto;display:flex;flex-direction:column;gap:10px;background:#E9F4FB}
.chat__lang{font-size:10px;font-weight:800;letter-spacing:.5px;background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.25);color:#fff;padding:3px 9px;border-radius:999px;margin-left:auto;white-space:nowrap}
.cmsg{max-width:84%;padding:11px 14px;border-radius:14px;font-size:14px;opacity:0;transform:translateY(8px);animation:cin .35s forwards}
@keyframes cin{to{opacity:1;transform:none}}
.cmsg--u{align-self:flex-end;background:var(--blue);color:#fff;border-bottom-right-radius:4px}
.cmsg--a{align-self:flex-start;background:#fff;border:1px solid var(--line);border-bottom-left-radius:4px}
.cmsg--sys{align-self:center;font-size:11.5px;font-weight:800;letter-spacing:.4px;color:var(--orange);background:var(--orange-soft);padding:5px 12px;border-radius:999px}
.cmsg ul{margin:8px 0 0 16px;font-size:13px}
.ctyping{align-self:flex-start;display:inline-flex;gap:4px;padding:12px 14px;background:#fff;border:1px solid var(--line);border-radius:14px}
.ctyping i{width:7px;height:7px;border-radius:50%;background:var(--muted);animation:blink 1.2s infinite}
.ctyping i:nth-child(2){animation-delay:.2s}.ctyping i:nth-child(3){animation-delay:.4s}
@keyframes blink{0%,60%,100%{opacity:.25}30%{opacity:1}}

/* ===================== APP MGMT LIVE FEED ===================== */
.ams-track{display:flex;flex-direction:column;align-items:center}
.ams-step{width:100%;max-width:320px;transition:.6s cubic-bezier(.165,.84,.44,1);opacity:.32;filter:blur(1px);transform:scale(.94)}
.ams-step.act{opacity:1;filter:none;transform:scale(1.03)}
.ams-step.done{opacity:.6;filter:none;transform:scale(1)}
.ams-card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px;box-shadow:var(--shadow-sm);position:relative}
.ams-step.act .ams-card{border-color:var(--orange);box-shadow:0 16px 40px rgba(222,110,48,.16)}
.ams-tag{font-size:10px;font-weight:800;color:var(--orange);letter-spacing:1px;margin-bottom:8px}
.ams-tag.sec{color:var(--blue)}
.ams-id{font-size:14px;font-weight:700;margin-bottom:8px}
.ok-badge{display:inline-block;padding:3px 10px;border-radius:6px;font-size:11px;font-weight:700;background:#dcfce7;color:#166534}
.ams-ai{display:flex;align-items:center;gap:6px;font-weight:800;font-size:11px;color:var(--orange);margin-bottom:8px}
.scanbar{height:4px;background:#eef2f7;border-radius:3px;overflow:hidden;position:relative;margin-top:8px}
.ams-step.act .scanbar::after{content:"";position:absolute;left:-50%;width:50%;height:100%;background:var(--orange);animation:scan 1.4s infinite}
@keyframes scan{0%{left:-50%}100%{left:150%}}
.ams-co{display:flex;align-items:center;gap:12px;margin-bottom:10px}
.ams-co img{width:42px;height:42px;border-radius:50%;border:2px solid #fff}
.ams-btn{background:var(--blue);color:#fff;text-align:center;padding:9px;border-radius:9px;font-size:11px;font-weight:700}
.ams-final{background:var(--blue);color:#fff;border:none}
.ams-final .ic{width:46px;height:46px;border-radius:50%;background:var(--green);display:grid;place-items:center;margin:0 auto 10px}
.ams-final .ft{text-align:center;font-weight:800;font-size:16px;margin-bottom:8px}
.ams-pay{text-align:center;border-top:1px solid rgba(255,255,255,.12);padding-top:8px;font-size:11px}
.ams-pay code{color:var(--orange);font-weight:700}
.ams-conn{width:3px;height:30px;background:#eef2f7;overflow:hidden;border-radius:3px}
.ams-conn i{display:block;width:100%;height:0;background:var(--orange);transition:height .5s linear}
.ams-log{margin-top:18px;background:#0f172a;border-radius:12px;padding:12px 14px;font-family:ui-monospace,Menlo,monospace;font-size:11px;color:#9bb3d6;display:flex;align-items:center;gap:8px;min-height:40px}
.ams-log b{color:#7CFFB2}

/* ===================== AI NETWORK VISUALIZATION ===================== */
.aihub{background:var(--blue);color:#fff;border-radius:28px;padding:48px;position:relative;overflow:hidden}
.aihub canvas{position:absolute;inset:0;width:100%;height:100%;opacity:.5}
.aihub__in{position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:center}
.aihub h2{font-family:'Poppins',sans-serif;font-size:clamp(28px,3.6vw,40px);font-weight:800;letter-spacing:-1px;line-height:1.12}
.aihub .lead{color:#c6d2e6}
.aichips{display:flex;flex-wrap:wrap;gap:8px;margin-top:8px}
.aichip{font-size:12.5px;font-weight:700;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);padding:7px 13px;border-radius:999px;color:#fff}
.rf-stage{position:relative;height:380px;display:flex;align-items:center;justify-content:center}
.rf-hub{width:130px;height:130px;border-radius:50%;background:rgba(255,255,255,.06);border:3px solid var(--orange);display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;z-index:5;transition:transform .3s,border-color .3s}
.rf-hub b{font-family:'Poppins',sans-serif;font-size:18px}
.rf-hub span{font-size:8px;font-weight:800;letter-spacing:1px;color:#ffd9bf}
.rf-chip{position:absolute;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);padding:6px 13px;border-radius:30px;font-size:10px;font-weight:700;white-space:nowrap;z-index:4;will-change:transform}
.rf-lead{position:absolute;background:#fff;color:var(--blue);padding:7px 14px;border-radius:9px;font-size:11px;font-weight:700;z-index:3;opacity:0;box-shadow:0 8px 20px rgba(0,0,0,.25)}
.rf-toast{position:absolute;top:8px;right:0;background:#fff;color:var(--blue);border-left:4px solid var(--orange);padding:12px 14px;border-radius:4px 12px 12px 4px;width:185px;font-size:11px;transform:translateX(130%);transition:transform .5s cubic-bezier(.175,.885,.32,1.275);z-index:8}
.rf-toast.on{transform:none}
.rf-toast b{color:var(--orange);font-family:'Poppins',sans-serif}
.rf-pipe{position:absolute;bottom:0;left:0;right:0;display:flex;justify-content:space-between}
.rf-st{flex:1;display:flex;flex-direction:column;align-items:center;gap:5px;opacity:.3;transition:.4s}
.rf-st.on{opacity:1;transform:scale(1.1)}
.rf-st .pd{width:11px;height:11px;border-radius:50%;background:#fff}
.rf-st.on .pd{background:var(--orange);box-shadow:0 0 12px var(--orange)}
.rf-st small{font-size:8px;font-weight:800;text-transform:uppercase;color:#c6d2e6}

/* ===================== ARCHITECT (sticky + scroll-zoom) ===================== */
.arch-wrap{display:grid;grid-template-columns:.9fr 1.1fr;gap:48px;align-items:start;margin-top:30px}
.arch-story{min-height:78vh;display:flex;flex-direction:column;justify-content:center;opacity:.25;transform:translateY(24px);transition:.6s;padding:20px 0 20px 22px;border-left:2px solid var(--line)}
.arch-story.active{opacity:1;transform:none;border-left-color:var(--orange)}
.arch-story h3{font-family:'Poppins',sans-serif;font-size:clamp(24px,2.7vw,34px);font-weight:800;letter-spacing:-.8px;margin-bottom:12px}
.arch-story p{color:var(--muted);font-size:16.5px;max-width:460px;margin-bottom:16px}
.arch-sticky{position:sticky;top:90px;height:78vh;max-height:600px;display:flex;align-items:center;justify-content:center;perspective:1400px}
.arch-screen{width:100%;max-width:520px;height:100%;background:radial-gradient(130% 130% at 0% 0%,#21407a 0%,#16294b 60%);border-radius:32px;padding:26px;color:#fff;position:relative;overflow:hidden;transition:transform .8s cubic-bezier(.19,1,.22,1);box-shadow:0 60px 120px -30px rgba(25,51,93,.55),inset 0 0 0 1px rgba(255,255,255,.06)}
.arch-screen::after{content:"";position:absolute;left:0;top:0;height:100%;width:2px;background:linear-gradient(transparent,var(--orange),transparent);animation:scanX 3.5s linear infinite;opacity:.5}
@keyframes scanX{0%{left:0}100%{left:100%}}
.arch-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
.arch-hd .live{font-size:9px;font-weight:800;letter-spacing:1px;color:#7CFFB2;text-transform:uppercase;padding:0}
.av-view{display:none}
.av-view.on{display:block;animation:slideIn .5s ease}
.glass-row{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-radius:14px;padding:14px;margin-bottom:10px;display:flex;justify-content:space-between;align-items:center}
.glass-row .av{width:30px;height:30px;border-radius:50%;background:rgba(255,255,255,.14);display:grid;place-items:center;font-size:10px;font-weight:800}
.glass-row small{font-size:10px;color:#9bb3d6;display:block}
.synced{font-size:10px;font-weight:800;color:#ffd9bf}
.av-chat{background:rgba(255,255,255,.07);border-radius:14px;padding:16px;min-height:240px;display:flex;flex-direction:column;justify-content:flex-end;gap:10px}
.av-chat .b{font-size:12px;padding:11px 14px;border-radius:14px;max-width:82%;line-height:1.5}
.av-chat .b.u{background:#fff;color:var(--blue);border-bottom-left-radius:4px}
.av-chat .b.a{background:var(--orange);color:#fff;align-self:flex-end;border-bottom-right-radius:4px}
.av-center{display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:260px;text-align:center}
.av-score{background:rgba(255,255,255,.07);border-radius:18px;padding:22px;text-align:center}
.av-score .big{font-family:'Poppins',sans-serif;font-size:46px;font-weight:800;color:#ffd9bf}
.arch-metrics{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-top:50px;border-top:1px solid var(--line);padding-top:36px}
.arch-metrics .m{text-align:center}
.arch-metrics .m b{font-family:'Poppins',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;display:block;letter-spacing:-2px}
.arch-metrics .m span{font-size:11px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:var(--muted)}

/* ===================== TESTIMONIALS ===================== */
/* impact stories polish */
.tcard{position:relative}
.tcard::before{content:"";position:absolute;inset:0 0 auto 0;height:4px;background:linear-gradient(90deg,var(--orange),var(--blue));opacity:0;transition:opacity .3s;z-index:3}
.tcard:hover::before{opacity:1}
.tvid::after{content:"\25B6  Watch the 60-sec story";position:absolute;left:0;right:0;bottom:0;padding:22px 14px 12px;color:#fff;font-size:12px;font-weight:700;background:linear-gradient(transparent,rgba(0,0,0,.55));z-index:2;transition:opacity .3s}
.tvid.playing::after{opacity:0}
.tbody{position:relative}
.tbody .q{position:relative;padding-top:8px}
.tbody .q::before{content:"\201C";position:absolute;top:-14px;left:-4px;font-family:Georgia,serif;font-size:56px;line-height:1;color:rgba(222,110,48,.18);font-weight:700}
.tmetric{box-shadow:0 6px 16px rgba(222,110,48,.18)}
/* impact stories polish END */
.tcards{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:42px}
.tcard{background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;transition:transform .4s,box-shadow .4s}
.tcard:hover{transform:translateY(-8px);box-shadow:var(--shadow)}
.tvid{aspect-ratio:16/9;background:#000;position:relative;cursor:pointer}
.tvid img.thumb{width:100%;height:100%;object-fit:cover;transition:transform .8s}
.tcard:hover .tvid img.thumb{transform:scale(1.07)}
.tplay{position:absolute;inset:0;display:grid;place-items:center}
.tplay span{width:64px;height:64px;border-radius:50%;background:#fff;display:grid;place-items:center;box-shadow:0 10px 30px rgba(0,0,0,.3);transition:.3s}
.tplay span::after{content:"";border-left:18px solid var(--orange);border-top:11px solid transparent;border-bottom:11px solid transparent;margin-left:5px}
.tcard:hover .tplay span{background:var(--orange);transform:scale(1.08)}
.tcard:hover .tplay span::after{border-left-color:#fff}
.tvid.playing .tplay,.tvid.playing img.thumb{opacity:0;pointer-events:none}
.tbody{padding:26px;display:flex;flex-direction:column;flex:1}
.stars{color:var(--orange);font-size:14px;margin-bottom:10px}
.tmetric{display:inline-block;font-family:'Poppins',sans-serif;font-weight:800;font-size:13.5px;color:var(--orange);background:var(--orange-soft);padding:5px 13px;border-radius:999px;margin-bottom:12px}
.tbody p.q{font-size:14px;color:#33404f;font-style:italic;line-height:1.7}
.tby{display:flex;align-items:center;gap:12px;margin-top:auto;padding-top:18px;border-top:1px solid var(--line)}
.tby img{width:52px;height:52px;border-radius:14px;object-fit:cover;border:2px solid var(--orange-soft)}
.tby b{font-size:14.5px;display:block}.tby .role{color:var(--orange);font-size:12.5px;font-weight:700}.tby .inst{color:var(--muted);font-size:11.5px}

/* ===================== FAQ ===================== */
.faq{max-width:820px;margin:42px auto 0}
.qa{border:1px solid var(--line);border-radius:16px;margin-bottom:14px;background:#fff;overflow:hidden}
.qa button{width:100%;display:flex;justify-content:space-between;align-items:center;gap:16px;padding:20px 22px;background:none;border:0;font:inherit;font-weight:700;font-size:16.5px;color:var(--blue);text-align:left;cursor:pointer}
.qa button .ic{flex:none;width:26px;height:26px;border-radius:50%;background:var(--orange-soft);color:var(--orange);display:grid;place-items:center;font-weight:900;transition:.3s}
.qa.open button .ic{background:var(--orange);color:#fff;transform:rotate(45deg)}
.qa__a{max-height:0;overflow:hidden;transition:max-height .35s ease}
.qa__a p{padding:0 22px 22px;color:var(--muted);font-size:15px;line-height:1.7}

/* ===================== FINAL CTA ===================== */
.cta__box{background:linear-gradient(135deg,var(--blue) 0%,#21407a 100%);border-radius:28px;padding:60px 40px;text-align:center;color:#fff;position:relative;overflow:hidden}
.cta__box::before{content:"";position:absolute;width:300px;height:300px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);top:-100px;right:-60px}
.cta__box h2{font-family:'Poppins',sans-serif;font-size:clamp(30px,4vw,46px);font-weight:800;letter-spacing:-1.2px;position:relative}
.cta__box p{color:#c6d2e6;font-size:18px;margin:14px 0 28px;position:relative}
.cta__form{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;max-width:640px;margin:0 auto;position:relative}
.cta__form input{flex:1;min-width:180px;padding:15px 18px;border-radius:12px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.1);color:#fff;font-size:15px;font-family:inherit}
.cta__form input::placeholder{color:#aebfd6}
.cta__form input:focus{outline:none;border-color:var(--orange);background:rgba(255,255,255,.16)}
.cta__form .btn{flex-basis:100%;justify-content:center}
.cta__micro{color:#aebfd6;font-size:13px;margin-top:14px;position:relative}

.wa{position:fixed;right:22px;bottom:22px;width:58px;height:58px;border-radius:50%;background:#25d366;color:#fff;display:grid;place-items:center;font-size:27px;text-decoration:none;z-index:50;box-shadow:0 12px 30px rgba(37,211,102,.45);transition:transform .2s}
.wa:hover{transform:scale(1.1)}

/* ===================== iPHONE LIVE MOBILE CRM ===================== */
.iphone-stage{position:relative;display:flex;align-items:center;justify-content:center;min-height:660px}
.iphone-glow{position:absolute;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.18),transparent 70%);animation:glowp 4s ease-in-out infinite}
@keyframes glowp{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.14);opacity:.6}}
.iphone{position:relative;width:300px;height:618px;background:linear-gradient(160deg,#222c3d,#0b1422);border-radius:52px;padding:11px;box-shadow:0 50px 90px -25px rgba(25,51,93,.55),inset 0 0 0 2px rgba(255,255,255,.06);z-index:5;flex:none}
.iphone::before{content:"";position:absolute;right:-3px;top:130px;width:3px;height:62px;background:#10192a;border-radius:0 3px 3px 0}
.iphone::after{content:"";position:absolute;left:-3px;top:104px;width:3px;height:34px;background:#10192a;border-radius:3px 0 0 3px;box-shadow:0 52px 0 #10192a}
.ip-screen{width:100%;height:100%;border-radius:42px;overflow:hidden;position:relative;background:linear-gradient(180deg,#0e1b30 0%,#13233d 45%,#0e1b30 100%);display:flex;flex-direction:column}
.ip-island{position:absolute;top:12px;left:50%;transform:translateX(-50%);width:96px;height:26px;background:#05080f;border-radius:16px;z-index:30;display:flex;align-items:center;justify-content:center;gap:8px}
.ip-island .cam{width:8px;height:8px;border-radius:50%;background:#1b2942}
.ip-island .spk{width:30px;height:4px;border-radius:3px;background:#141f33}
.ip-status{display:flex;justify-content:space-between;align-items:center;padding:16px 22px 0;color:rgba(255,255,255,.85);font-size:11px;font-weight:800;position:relative;z-index:6}
.ip-sig{display:flex;gap:2px;align-items:flex-end}
.ip-sig i{width:3px;border-radius:1px;background:rgba(255,255,255,.8)}
.ip-head{padding:14px 18px 12px;display:flex;align-items:center;justify-content:space-between;position:relative;z-index:6}
.ip-user{display:flex;align-items:center;gap:9px}
.ip-av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--orange),#f59e0b);display:grid;place-items:center;color:#fff;font-weight:800;font-size:13px;border:2px solid var(--green)}
.ip-user b{color:#fff;font-size:12.5px;display:block}
.ip-user span{color:rgba(255,255,255,.55);font-size:9.5px;display:flex;align-items:center;gap:4px}
.ip-live{background:rgba(16,185,129,.18);border:1px solid rgba(16,185,129,.45);color:#7CFFB2;padding:4px 10px;border-radius:100px;font-size:9px;font-weight:800;letter-spacing:.6px;display:flex;align-items:center;gap:5px}
.ip-live i{width:6px;height:6px;border-radius:50%;background:#34d399;animation:blink2 1.3s infinite}
@keyframes blink2{0%,100%{opacity:1}50%{opacity:.25}}
.ip-kpis{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;padding:4px 16px 12px;position:relative;z-index:6}
.ip-kpi{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);border-radius:12px;padding:9px 8px;text-align:center}
.ip-kpi b{font-family:'Poppins',sans-serif;color:#fff;font-size:16px;display:block;line-height:1}
.ip-kpi span{color:rgba(255,255,255,.5);font-size:8px;font-weight:700;text-transform:uppercase;letter-spacing:.4px}
.ip-feedwrap{flex:1;margin:0 12px 12px;background:rgba(5,10,20,.55);border:1px solid rgba(255,255,255,.07);border-radius:18px;padding:11px;overflow:hidden;position:relative;z-index:6}
.ip-feedwrap .fh{display:flex;justify-content:space-between;align-items:center;margin-bottom:9px}
.ip-feedwrap .fh b{color:rgba(255,255,255,.55);font-size:9px;font-weight:800;letter-spacing:1px;text-transform:uppercase}
.ip-feedwrap .fh .sync{color:#7CFFB2;font-size:8px;font-weight:800;display:flex;align-items:center;gap:5px}
.ip-spin{width:10px;height:10px;border:2px solid rgba(124,255,178,.25);border-top-color:#7CFFB2;border-radius:50%;animation:spin 1s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.ip-feed{display:flex;flex-direction:column;gap:7px}
.ip-item{display:flex;gap:9px;align-items:center;background:rgba(255,255,255,.06);border-left:3px solid var(--orange);border-radius:10px;padding:8px 10px;animation:ipIn .5s cubic-bezier(.34,1.56,.64,1)}
@keyframes ipIn{from{opacity:0;transform:translateX(16px)}to{opacity:1;transform:none}}
.ip-item .e{font-size:15px;flex:none}
.ip-item b{color:#fff;font-size:9.8px;font-weight:700;display:block;line-height:1.3}
.ip-item span{color:rgba(255,255,255,.5);font-size:8.5px}
.ip-cta{margin:0 12px 16px;position:relative;z-index:6}
.ip-cta a{display:block;text-align:center;background:var(--orange);color:#fff;font-weight:800;font-size:12px;padding:11px;border-radius:13px;text-decoration:none}
/* floating cards around phone */
.fcard{position:absolute;background:#fff;border:1px solid var(--line);border-radius:14px;padding:11px 13px;box-shadow:0 18px 40px rgba(25,51,93,.16);z-index:20;display:flex;gap:10px;align-items:center;opacity:0;transform:scale(.85) translateY(14px);transition:.6s cubic-bezier(.34,1.56,.64,1)}
.fcard.on{opacity:1;transform:none}
.fcard .fi{width:34px;height:34px;border-radius:10px;background:var(--orange-soft);display:grid;place-items:center;font-size:17px;flex:none}
.fcard b{font-size:12px;display:block;color:var(--blue)}
.fcard small{font-size:10.5px;color:var(--muted)}
.fc1{top:6%;left:-26px}.fc2{top:34%;right:-30px}.fc3{bottom:20%;left:-34px}
@media(min-width:1100px){.fc1{left:-50px}.fc2{right:-54px}.fc3{left:-60px}}
/* lead-journey roadmap behind the phone */
.iphone-stage{overflow:visible}
.roadmap{position:absolute;inset:0;z-index:2;pointer-events:none}
.roadmap svg{position:absolute;inset:0;width:100%;height:100%}
.rm-path{fill:none;stroke:#e6c7af;stroke-width:2.5;stroke-dasharray:6 7;opacity:.6;vector-effect:non-scaling-stroke}
.rm-prog{fill:none;stroke:var(--orange);stroke-width:3;stroke-linecap:round;stroke-dashoffset:100;transition:stroke-dashoffset 1s linear;vector-effect:non-scaling-stroke}
.rm-node{position:absolute;transform:translate(-50%,-50%);display:flex;align-items:center;gap:8px;z-index:3}
.rm-node.t{flex-direction:column}.rm-node.b{flex-direction:column-reverse}.rm-node.r{flex-direction:row-reverse}
.rm-dot{width:15px;height:15px;border-radius:50%;background:#fff;border:3px solid #e6c7af;flex:none;transition:.4s}
.rm-node.on .rm-dot{border-color:var(--orange);background:var(--orange);box-shadow:0 0 0 6px rgba(222,110,48,.15)}
.rm-lbl{background:#fff;border:1px solid var(--line);border-radius:999px;padding:5px 11px;font-size:11px;font-weight:800;color:var(--blue);box-shadow:var(--shadow-sm);white-space:nowrap;opacity:.78;transition:.4s}
.rm-node.on .rm-lbl{opacity:1;border-color:var(--orange);color:var(--orange)}
@media(max-width:400px){.rm-lbl{font-size:9.5px;padding:4px 8px}.rm-dot{width:12px;height:12px}}

/* ===================== ROI CALCULATOR ===================== */
.roi{background:linear-gradient(135deg,var(--blue),#21407a);border-radius:28px;padding:46px;color:#fff;position:relative;overflow:hidden}
.roi::before{content:"";position:absolute;width:320px;height:320px;border-radius:50%;background:rgba(222,110,48,.28);filter:blur(90px);top:-120px;left:-60px}
.roi__in{position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:44px;align-items:center}
.roi h2{font-family:'Poppins',sans-serif;font-size:clamp(26px,3.2vw,38px);font-weight:800;letter-spacing:-1px;line-height:1.12;margin-bottom:12px}
.roi p.sub{color:#c6d2e6;font-size:16px;margin-bottom:26px}
.roi-field{margin-bottom:22px}
.roi-field label{display:flex;justify-content:space-between;font-size:13px;font-weight:700;margin-bottom:10px}
.roi-field label b{color:#ffd9bf;font-family:'Poppins',sans-serif;font-size:16px}
.roi-field input[type=range]{width:100%;-webkit-appearance:none;appearance:none;height:6px;border-radius:6px;background:rgba(255,255,255,.18);outline:none}
.roi-field input[type=range]::-webkit-slider-thumb{-webkit-appearance:none;width:22px;height:22px;border-radius:50%;background:var(--orange);cursor:pointer;box-shadow:0 4px 12px rgba(222,110,48,.6);border:3px solid #fff}
.roi-field input[type=range]::-moz-range-thumb{width:22px;height:22px;border-radius:50%;background:var(--orange);cursor:pointer;border:3px solid #fff}
.roi-out{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.14);border-radius:20px;padding:26px}
.roi-out .big{font-family:'Poppins',sans-serif;font-size:clamp(40px,6vw,64px);font-weight:800;color:#ffd9bf;line-height:1;letter-spacing:-2px}
.roi-out .biglbl{font-size:13px;color:#c6d2e6;font-weight:700;margin-top:6px}
.roi-split{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin:22px 0}
.roi-split div{background:rgba(255,255,255,.06);border-radius:14px;padding:14px}
.roi-split b{font-family:'Poppins',sans-serif;font-size:22px;display:block;color:#fff}
.roi-split span{font-size:11px;color:#9bb3d6;font-weight:700;text-transform:uppercase;letter-spacing:.5px}
.roi-note{font-size:11px;color:#9bb3d6;margin-top:6px}

/* ===================== DEMO VALUE + BADGES ===================== */
.demo-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:0;border-radius:28px;overflow:hidden;box-shadow:var(--shadow)}
.demo-left{background:linear-gradient(135deg,var(--blue) 0%,#21407a 100%);color:#fff;padding:48px 42px;position:relative;overflow:hidden}
.demo-left::before{content:"";position:absolute;width:280px;height:280px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);bottom:-110px;left:-50px}
.demo-left h2{font-family:'Poppins',sans-serif;font-size:clamp(26px,3vw,38px);font-weight:800;letter-spacing:-1px;line-height:1.1;position:relative}
.demo-left p.s{color:#c6d2e6;font-size:16px;margin:12px 0 26px;position:relative}
.dchecks{list-style:none;display:flex;flex-direction:column;gap:14px;position:relative;margin-bottom:28px}
.dchecks li{display:flex;gap:12px;align-items:flex-start;font-size:14.5px}
.dchecks .ck{flex:none;width:24px;height:24px;border-radius:50%;background:var(--orange);display:grid;place-items:center;font-size:13px;font-weight:900}
.dbadges{display:flex;gap:14px;flex-wrap:wrap;align-items:center;position:relative;padding-top:22px;border-top:1px solid rgba(255,255,255,.14)}
.dbadge{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700;color:#dfe8f5}
.dbadge img{height:34px;width:auto;filter:drop-shadow(0 0 6px rgba(255,255,255,.25))}
.drating{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:700;color:#dfe8f5}
.drating .st{color:#ffb169;letter-spacing:1px}
.dbadge-img{height:46px;width:auto;background:#fff;border-radius:8px;padding:5px 8px}
.demo-right{background:#fff;padding:44px 38px;display:flex;flex-direction:column;justify-content:center}
.demo-right h3{font-family:'Poppins',sans-serif;font-size:22px;font-weight:800;margin-bottom:4px}
.demo-right .sub2{color:var(--muted);font-size:14px;margin-bottom:22px}
.demo-form{display:flex;flex-direction:column;gap:12px}
.demo-form input,.demo-form select{padding:14px 16px;border-radius:12px;border:1.5px solid var(--line);font-size:15px;font-family:inherit;color:var(--ink);background:#fff;transition:border-color .2s}
.demo-form input:focus,.demo-form select:focus{outline:none;border-color:var(--orange)}
.demo-form .btn{justify-content:center;margin-top:4px}
.demo-trust{display:flex;align-items:center;gap:8px;justify-content:center;font-size:12.5px;color:var(--muted);margin-top:14px;font-weight:600}
.demo-ok{display:none;text-align:center;padding:18px;background:#dcfce7;color:#166534;border-radius:14px;font-weight:700;font-size:14px;margin-top:6px}

/* ===================== STICKY CTA BAR ===================== */
.scta{position:fixed;left:0;right:0;bottom:0;z-index:55;background:rgba(25,51,93,.97);backdrop-filter:blur(10px);color:#fff;transform:translateY(120%);transition:transform .45s cubic-bezier(.19,1,.22,1);box-shadow:0 -10px 40px rgba(0,0,0,.25)}
.scta.on{transform:none}
.scta__in{max-width:var(--maxw);margin:0 auto;padding:12px 24px;display:flex;align-items:center;gap:16px;justify-content:space-between}
.scta__txt{display:flex;align-items:center;gap:12px;font-weight:700;font-size:14.5px}
.scta__txt .ping{flex:none}
.scta__r{display:flex;align-items:center;gap:12px}
.scta__x{background:none;border:0;color:rgba(255,255,255,.5);font-size:20px;cursor:pointer;line-height:1;padding:4px}
.scta__x:hover{color:#fff}
@media(max-width:700px){.scta__txt span.dim{display:none}.scta__in{padding:10px 14px}.wa{bottom:78px}}

/* ===================== VIDYAGPT WIDGET ===================== */
.vg{--vg-navy:#1B3761;--vg-soft:#E9F4FB;width:100%;max-width:392px;border-radius:22px;overflow:hidden;background:#fff;border:1px solid #dce7f2;box-shadow:0 40px 90px -25px rgba(27,55,97,.4);font-size:14px}
.vg-hd{background:var(--vg-navy);color:#fff;display:flex;align-items:center;gap:12px;padding:14px 16px}
.vg-hd .bk,.vg-hd .ex,.vg-hd .cl{opacity:.85}
.vg-hd .ti{font-weight:800;font-size:15px;display:flex;align-items:center;gap:7px;flex:1}
.vg-hd svg{width:16px;height:16px;display:block}
.vg-hd .spark{width:20px;height:20px;background:linear-gradient(135deg,#f59e0b,#d946ef);border-radius:6px;display:grid;place-items:center;color:#fff;font-size:11px}
.vg-bd{background:linear-gradient(180deg,#fff, var(--vg-soft));height:498px;position:relative;overflow:hidden}
.vg-screen{position:absolute;inset:0;padding:18px;display:flex;flex-direction:column;opacity:0;visibility:hidden;transition:opacity .5s}
.vg-screen.on{opacity:1;visibility:visible}
.vg-today{align-self:center;background:#fff;border:1px solid #e7eef6;color:var(--vg-navy);font-size:11px;font-weight:700;padding:4px 14px;border-radius:999px;box-shadow:0 4px 12px rgba(27,55,97,.06);margin-bottom:14px}
/* home screen */
.vg-ask{margin:6px 0 16px}
.vg-ask .q1{font-family:'Poppins',sans-serif;font-size:26px;font-weight:800;color:#aebccd;line-height:1.1}
.vg-ask .q2{font-family:'Poppins',sans-serif;font-size:26px;font-weight:800;color:var(--vg-navy);line-height:1.1}
.vg-qa{position:relative;border-radius:16px;background:#fff;padding:16px 14px;box-shadow:0 10px 26px rgba(27,55,97,.07)}
.vg-qa::before{content:"";position:absolute;inset:0;border-radius:16px;padding:1.6px;background:linear-gradient(120deg,#f59e0b,#1B3761,#d946ef);-webkit-mask:linear-gradient(#fff 0 0) content-box,linear-gradient(#fff 0 0);-webkit-mask-composite:xor;mask-composite:exclude;pointer-events:none}
.vg-qa h5{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:800;color:var(--vg-navy);padding-bottom:12px;margin-bottom:12px;border-bottom:1px solid #eef3f9}
.vg-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px 6px}
.vg-act{display:flex;flex-direction:column;align-items:center;gap:7px;text-align:center;cursor:pointer}
.vg-act .ic{width:46px;height:46px;border-radius:50%;background:#f1f5f9;display:grid;place-items:center;color:var(--vg-navy);transition:.25s}
.vg-act:hover .ic{background:var(--vg-navy);color:#fff;transform:translateY(-3px)}
.vg-act .ic svg{width:20px;height:20px}
.vg-act span{font-size:11px;font-weight:600;color:#475569;line-height:1.2}
.vg-chips{display:flex;gap:8px;overflow:hidden;margin-top:auto;padding:14px 0 12px;position:relative}
.vg-chip{flex:none;background:#fff;border:1px solid #dbe6f1;border-radius:999px;padding:8px 14px;font-size:12px;font-weight:700;color:var(--vg-navy);white-space:nowrap}
.vg-chev{flex:none;width:26px;height:26px;border-radius:50%;background:#fff;border:1px solid #dbe6f1;display:grid;place-items:center;color:var(--vg-navy);align-self:center}
.vg-input{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid #dbe6f1;border-radius:14px;padding:10px 12px}
.vg-input .ph{flex:1;color:#9aa7b8;font-size:13px}
.vg-input .mic{color:#e11d48}.vg-input .snd{width:34px;height:34px;border-radius:10px;background:#8aa0bd;display:grid;place-items:center;color:#fff;flex:none}
.vg-input .snd svg{width:16px;height:16px}
/* chat screen */
.vg-msg{max-width:88%;padding:12px 14px;border-radius:14px;font-size:13px;line-height:1.55;margin-bottom:12px;position:relative;animation:cin .35s both}
.vg-msg.bot{align-self:flex-start;background:#fff;border:1px solid #e7eef6;box-shadow:0 6px 16px rgba(27,55,97,.06)}
.vg-msg.bot.grad{border:none;border-left:3px solid transparent;border-image:linear-gradient(180deg,#f59e0b,#d946ef) 1}
.vg-msg.user{align-self:flex-end;background:var(--vg-navy);color:#fff}
.vg-msg .who{display:flex;align-items:center;gap:6px;font-weight:800;color:var(--vg-navy);font-size:12px;margin-bottom:5px}
.vg-msg .who .spark{width:16px;height:16px;font-size:9px}
.vg-time{align-self:flex-end;font-size:10px;color:#9aa7b8;margin:-6px 2px 12px}
.vg-ok{display:inline-flex;align-items:center;gap:6px}
/* call screen */
.vg-call{align-items:center;justify-content:flex-start;text-align:center}
.vg-call h4{font-family:'Poppins',sans-serif;font-weight:800;color:var(--vg-navy);font-size:20px;margin-top:6px}
.vg-call p.cs{color:#5b6b82;font-size:13px;margin:8px 0 0;max-width:260px}
.vg-rings{position:relative;width:200px;height:200px;margin:22px auto;display:grid;place-items:center}
.vg-rings .r{position:absolute;border:1.5px solid #dbe6f1;border-radius:50%}
.vg-rings .r1{width:70px;height:70px}.vg-rings .r2{width:120px;height:120px}.vg-rings .r3{width:170px;height:170px}.vg-rings .r4{width:200px;height:200px}
.vg-rings .core{width:74px;height:74px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#d946ef,#6366f1);display:grid;place-items:center;color:#fff;z-index:2;box-shadow:0 10px 30px rgba(217,70,239,.35);animation:vgpulse 2s infinite}
@keyframes vgpulse{0%,100%{transform:scale(1)}50%{transform:scale(1.08)}}
.vg-rings .wave{position:absolute;border:2px solid #d946ef;border-radius:50%;width:74px;height:74px;opacity:0;animation:vgwave 2.4s infinite}
.vg-rings .wave.w2{animation-delay:.8s}.vg-rings .wave.w3{animation-delay:1.6s}
@keyframes vgwave{0%{transform:scale(1);opacity:.5}100%{transform:scale(2.5);opacity:0}}
.vg-timer{font-family:'Poppins',sans-serif;font-size:42px;font-weight:800;color:var(--vg-navy);letter-spacing:1px}
.vg-callst{color:#5b6b82;font-size:13px;margin-top:4px}
.vg-callbtns{display:flex;align-items:center;gap:22px;margin-top:24px}
.vg-mute{display:flex;align-items:center;gap:8px;color:var(--vg-navy);font-weight:700;font-size:14px}
.vg-end{background:#ef4444;color:#fff;border-radius:999px;padding:13px 26px;font-weight:800;font-size:14px;display:flex;align-items:center;gap:8px;box-shadow:0 12px 26px rgba(239,68,68,.35)}
.vg-narr{background:#fff;border-top:1px solid #eef3f9;color:#5b6b82;font-size:11.5px;font-weight:600;padding:9px 14px;display:flex;align-items:center;gap:7px}
.vg-foot{text-align:center;font-size:11px;color:#9aa7b8;padding:10px;background:#fff;border-top:1px solid #eef3f9}
.vg-foot b{color:var(--orange);font-weight:800}

/* ===================== SEGMENT SELECTOR ===================== */
.seg-tabs{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin:28px 0 22px}
.seg-tab{padding:11px 20px;border-radius:999px;border:1.5px solid var(--line);background:#fff;font:inherit;font-weight:700;font-size:14px;color:var(--blue);cursor:pointer;transition:.2s}
.seg-tab:hover{border-color:var(--orange);color:var(--orange)}
.seg-tab.on{background:var(--blue);color:#fff;border-color:var(--blue)}
.seg-panel{max-width:780px;margin:0 auto;background:#fff;border:1px solid var(--line);border-radius:20px;padding:32px;box-shadow:var(--shadow-sm);text-align:center}
.seg-panel .ic{font-size:34px;margin-bottom:8px}
.seg-panel h3{font-family:'Poppins',sans-serif;font-size:22px;margin-bottom:8px}
.seg-panel p{color:var(--muted);font-size:16px;max-width:560px;margin:0 auto 14px}
.seg-panel .chiprow{justify-content:center}

/* ===================== INTEGRATIONS ===================== */
.intg{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:30px}
.intg span{display:inline-flex;align-items:center;gap:9px;background:#fff;border:1px solid var(--line);border-radius:12px;padding:12px 18px;font-weight:700;font-size:14px;color:var(--blue);box-shadow:var(--shadow-sm);transition:.25s}
.intg span:hover{border-color:var(--orange);transform:translateY(-3px)}
.intg span i{font-size:18px;font-style:normal}

/* ===================== COMPARISON TABLE ===================== */
.cmp{overflow-x:auto;border:1px solid var(--line);border-radius:20px;box-shadow:var(--shadow-sm);background:#fff;margin-top:14px}
.cmp table{width:100%;border-collapse:collapse;min-width:660px}
.cmp th,.cmp td{padding:15px 18px;text-align:center;border-bottom:1px solid var(--line);font-size:14px}
.cmp th:first-child,.cmp td:first-child{text-align:left;font-weight:600;color:var(--blue)}
.cmp thead th{font-family:'Poppins',sans-serif;font-weight:800;color:var(--muted);font-size:14px}
.cmp thead th.ee,.cmp td.ee{background:var(--orange-soft)}
.cmp thead th.ee{color:var(--orange);font-size:15px}
.cmp tbody tr:last-child td{border-bottom:none}
.cmp .y{color:#16a34a;font-weight:800;font-size:17px}
.cmp .n{color:#c2ccd8;font-size:17px}
.cmp .p{color:#d98a3a;font-size:12px;font-weight:700}

/* ===================== CASE STUDIES ===================== */
.cs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:14px}
.cs-card{background:#fff;border:1px solid var(--line);border-radius:20px;padding:26px;box-shadow:var(--shadow-sm);transition:.3s}
.cs-card:hover{transform:translateY(-6px);box-shadow:var(--shadow);border-color:rgba(222,110,48,.4)}
.cs-metric{font-family:'Poppins',sans-serif;font-size:38px;font-weight:800;letter-spacing:-1px;line-height:1}
.cs-card .cl{color:var(--muted);font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;margin-top:4px}
.cs-card p{color:#33404f;font-size:14px;margin:14px 0 16px;line-height:1.6}
.cs-card .who{display:flex;align-items:center;gap:10px;padding-top:14px;border-top:1px solid var(--line)}
.cs-card .who .av{width:40px;height:40px;border-radius:11px;background:var(--orange-soft);display:grid;place-items:center;font-weight:800;color:var(--orange);font-size:13px}
.cs-card .who b{font-size:13.5px}.cs-card .who small{color:var(--muted);display:block;font-size:11.5px}

/* ===================== SECURITY ===================== */
.sec-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-top:14px}
.sec-item{background:#fff;border:1px solid var(--line);border-radius:16px;padding:22px;text-align:center;box-shadow:var(--shadow-sm)}
.sec-item .ic{margin-bottom:10px;height:48px;display:flex;align-items:center;justify-content:center}
.sec-item .ic img{height:48px;width:auto;object-fit:contain}
.sec-item b{display:block;font-size:14.5px;margin-bottom:4px}
.sec-item span{font-size:12.5px;color:var(--muted)}
.sec-badges{display:flex;gap:22px;justify-content:center;align-items:center;margin-top:26px;flex-wrap:wrap}
.sec-badges img{height:56px;width:auto}

/* ===================== LEAD MAGNET ===================== */
.lm{background:linear-gradient(135deg,var(--blue),#21407a);color:#fff;border-radius:24px;padding:40px;display:grid;grid-template-columns:1.15fr .85fr;gap:32px;align-items:center;position:relative;overflow:hidden}
.lm::before{content:"";position:absolute;width:260px;height:260px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);top:-100px;right:-50px}
.lm h3{font-family:'Poppins',sans-serif;font-size:clamp(22px,2.6vw,30px);font-weight:800;letter-spacing:-.6px;position:relative}
.lm p{color:#c6d2e6;font-size:15px;margin-top:10px;position:relative}
.lm form{display:flex;gap:10px;flex-wrap:wrap;position:relative}
.lm input{flex:1;min-width:170px;padding:14px 16px;border-radius:12px;border:1px solid rgba(255,255,255,.2);background:rgba(255,255,255,.1);color:#fff;font-family:inherit;font-size:15px}
.lm input::placeholder{color:#aebfd6}
.lm input:focus{outline:none;border-color:var(--orange)}
.lm .btn{flex-basis:100%;justify-content:center}
.lm .ok{display:none;background:rgba(16,185,129,.18);border:1px solid rgba(16,185,129,.4);color:#7CFFB2;padding:14px;border-radius:12px;font-weight:700;text-align:center;position:relative}

/* ===================== SEGMENT · STICKY SCROLLYTELLING ===================== */
.sg-wrap{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:start;margin-top:24px}
.sg-story{min-height:74vh;display:flex;flex-direction:column;justify-content:center;opacity:.24;transform:translateY(26px);transition:.6s;padding:18px 0}
.sg-story.active{opacity:1;transform:none}
.sg-story .tag{font-family:'Poppins',sans-serif;font-weight:800;color:var(--orange);font-size:14px;letter-spacing:.5px;margin-bottom:10px}
.sg-story h3{font-family:'Poppins',sans-serif;font-size:clamp(24px,2.8vw,36px);font-weight:800;letter-spacing:-.8px;margin-bottom:12px;line-height:1.1}
.sg-story p{color:var(--muted);font-size:16.5px;max-width:480px;margin-bottom:16px}
.sg-sticky{position:sticky;top:84px;height:78vh;max-height:600px;display:flex;align-items:center;justify-content:center}
.sg-card{width:100%;max-width:460px;height:100%;border-radius:28px;padding:34px;color:#fff;background:linear-gradient(160deg,var(--blue),#21407a);position:relative;overflow:hidden;display:flex;flex-direction:column;justify-content:center;transition:transform .6s cubic-bezier(.19,1,.22,1)}
.sg-card::before{content:"";position:absolute;width:240px;height:240px;border-radius:50%;background:rgba(222,110,48,.32);filter:blur(80px);top:-90px;right:-50px}
.sg-emoji{font-size:60px;margin-bottom:14px;position:relative}
.sg-card h4{font-family:'Poppins',sans-serif;font-size:28px;font-weight:800;margin-bottom:10px;position:relative}
.sg-card>p{color:rgba(255,255,255,.82);font-size:15px;margin-bottom:22px;position:relative}
.sg-stats{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:18px;position:relative}
.sg-stats div{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:14px;padding:14px}
.sg-stats b{font-family:'Poppins',sans-serif;font-size:24px;color:#ffd9bf;display:block;line-height:1}
.sg-stats span{font-size:11px;color:#c6d2e6;font-weight:700;text-transform:uppercase;letter-spacing:.4px}
.sg-card .chiprow{position:relative}
.sg-card .chip{background:rgba(255,255,255,.12);border-color:rgba(255,255,255,.2);color:#fff}

/* ===================== COMPARISON (tabbed) ===================== */
.cmp2-tabs{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin:26px 0 16px}
.cmp2-tab{padding:11px 20px;border-radius:999px;border:1.5px solid var(--line);background:#fff;font:inherit;font-weight:700;font-size:14px;color:var(--blue);cursor:pointer;transition:.2s}
.cmp2-tab:hover{border-color:var(--orange);color:var(--orange)}
.cmp2-tab.on{background:var(--blue);color:#fff;border-color:var(--blue)}
.cmp2-sum{max-width:800px;margin:0 auto 18px;text-align:center;color:var(--muted);font-size:15.5px}
.cmp2-incl{margin-top:16px;background:var(--orange-soft);border:1px solid #f3d8c4;border-radius:16px;padding:15px 18px;display:flex;flex-wrap:wrap;gap:8px;align-items:center}
.cmp2-incl b{color:var(--orange);font-size:14px;margin-right:6px}
.cmp2-when{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:24px}
.when{background:#fff;border:1px solid var(--line);border-radius:18px;padding:24px;box-shadow:var(--shadow-sm)}
.when.eecol{border-color:rgba(222,110,48,.4);background:linear-gradient(180deg,#fff,#fff8f3)}
.when h4{font-family:'Poppins',sans-serif;font-size:17px;margin-bottom:14px}
.when.eecol h4{color:var(--orange)}
.when ul{list-style:none;display:flex;flex-direction:column;gap:10px}
.when li{display:flex;gap:10px;font-size:14px;color:#33404f;line-height:1.5}
.when.eecol li::before{content:"✓";color:var(--orange);font-weight:900;flex:none}
.when.uniq{border-color:rgba(222,110,48,.4);background:linear-gradient(180deg,#fff,#fffaf6)}
.when.uniq h4{color:var(--orange)}
.when.uniq li::before{content:"★";color:var(--orange);font-weight:900;flex:none;font-size:12px;padding-top:2px}

/* ===================== SEGMENT · INTERACTIVE PREVIEW ===================== */
.sg2{display:grid;grid-template-columns:.92fr 1.08fr;gap:40px;align-items:start;margin-top:30px}
.sg2-list{display:flex;flex-direction:column;gap:12px}
.sg2-item{display:flex;gap:14px;align-items:flex-start;padding:16px 18px;border:1.5px solid var(--line);border-radius:16px;background:#fff;cursor:pointer;transition:.3s;text-align:left;width:100%;font:inherit;color:inherit}
.sg2-item:hover{border-color:rgba(222,110,48,.45)}
.sg2-item.on{border-color:var(--orange);box-shadow:0 14px 30px rgba(222,110,48,.13);background:linear-gradient(180deg,#fff,#fff8f3)}
.sg2-ic{width:46px;height:46px;border-radius:13px;background:var(--orange-soft);display:grid;place-items:center;font-size:22px;flex:none;transition:.3s}
.sg2-item.on .sg2-ic{background:var(--orange);transform:scale(1.05)}
.sg2-tx{flex:1}
.sg2-tx b{font-family:'Poppins',sans-serif;font-size:16px;display:block;color:var(--blue)}
.sg2-tx p{color:var(--muted);font-size:13.5px;margin:3px 0 0}
.sg2-more{display:none;gap:8px;flex-wrap:wrap;margin-top:10px}
.sg2-item.on .sg2-more{display:flex}
.sg2-bar{display:none;height:3px;background:#eef2f7;border-radius:3px;margin-top:12px;overflow:hidden}
.sg2-item.on .sg2-bar{display:block}
.sg2-bar i{display:block;height:100%;width:0;background:var(--orange)}
/* right preview */
.sg2-view{position:sticky;top:90px;border-radius:24px;overflow:hidden;border:1px solid var(--line);box-shadow:var(--shadow);background:#fff}
.sg2-vhd{background:var(--blue);color:#fff;padding:14px 18px;display:flex;align-items:center;justify-content:space-between;font-weight:700;font-size:14px}
.sg2-live{font-size:10px;font-weight:800;display:flex;align-items:center;gap:6px;color:#7CFFB2;text-transform:uppercase}
.sg2-vbd{padding:20px;background:var(--bg-soft);min-height:360px;animation:slideIn .45s ease}
.sgv-row{display:flex;align-items:center;justify-content:space-between;gap:10px;background:#fff;border:1px solid var(--line);border-radius:12px;padding:11px 13px;margin-bottom:9px}
.sgv-row b{font-size:13px;color:var(--blue)}
.sgv-row small{font-size:11px;color:var(--muted);display:block}
.sgv-bar2{height:6px;width:84px;background:#eef2f7;border-radius:6px;overflow:hidden;flex:none}
.sgv-bar2 i{display:block;height:100%;background:var(--orange)}
.sgv-pill{font-size:10px;font-weight:800;padding:4px 10px;border-radius:999px;background:var(--orange-soft);color:var(--orange);white-space:nowrap}
.sgv-pill.g{background:#dcfce7;color:#166534}
.sgv-pill.d{background:#eef2f7;color:#64748b}
.sgv-foot{margin-top:4px;font-family:'Poppins',sans-serif;font-weight:800;color:var(--orange);font-size:15px}
.sgv-bub{font-size:12px;padding:9px 12px;border-radius:12px;margin-bottom:8px;max-width:86%;line-height:1.45}
.sgv-bub.b{background:#fff;border:1px solid var(--line);border-bottom-left-radius:3px}
.sgv-bub.u{background:var(--blue);color:#fff;margin-left:auto;border-bottom-right-radius:3px}

/* ===================== CRMX · REAL PRODUCT MOCKUP ===================== */
.crmx{border:1px solid var(--line);border-radius:16px;overflow:hidden;box-shadow:var(--shadow);background:#fff;font-size:13px}
.crmx-top{background:#2f343a;display:flex;align-items:center;gap:14px;padding:10px 16px;color:#cbd2da}
.crmx-logo{font-family:'Poppins',sans-serif;display:flex;align-items:center;gap:7px}
.crmx-logo .ee-mark{width:24px;height:24px;flex:none}
.crmx-logo .ee-wm{font-weight:900;font-size:17px;letter-spacing:-.5px;color:#fff}
.crmx-logo .ee-wm b{color:var(--orange);font-weight:900}
/* step indicator bar */
.crmx-step{display:flex;align-items:center;gap:7px;background:#fff5ef;border-bottom:1px solid var(--line);color:var(--blue);font-size:11.5px;font-weight:700;padding:7px 16px}
.crmx-step b{color:var(--orange)}
.crmx-step .dotp{width:7px;height:7px;border-radius:50%;background:var(--green);box-shadow:0 0 0 0 rgba(16,185,129,.5);animation:pulse2 2s infinite}
@keyframes pulse2{0%{box-shadow:0 0 0 0 rgba(16,185,129,.5)}70%{box-shadow:0 0 0 7px rgba(16,185,129,0)}100%{box-shadow:0 0 0 0 rgba(16,185,129,0)}}
.crmx-mi{cursor:pointer}
.crmx-search{display:flex;align-items:center;gap:8px;background:#3c424a;border:1px solid #4a515a;border-radius:8px;padding:7px 12px;color:#9aa3ad;flex:1;max-width:430px;font-size:12px}
.crmx-search .gs{background:#454c55;border-radius:5px;padding:3px 9px;color:#cbd2da;font-weight:600}
.crmx-ico{display:flex;gap:16px;align-items:center;margin-left:auto;font-size:15px}
.crmx-bdg{position:relative}
.crmx-bdg i{position:absolute;top:-8px;right:-10px;background:var(--orange);color:#fff;font-size:9px;font-weight:800;border-radius:999px;padding:0 5px;font-style:normal}
.crmx-bdg.wa i{background:#25d366}
.crmx-clock{font-variant-numeric:tabular-nums;font-weight:700;color:#e6eaef;font-size:12px}
.crmx-av{width:26px;height:26px;border-radius:50%;background:#5b6b82;flex:none}
.crmx-body{display:flex;min-height:560px}
.crmx-side{width:190px;flex:none;border-right:1px solid var(--line);padding:8px 0;background:#fff;overflow-y:auto}
.crmx-mi{display:flex;align-items:center;gap:11px;padding:10px 16px;color:#5b6b82;font-weight:600;cursor:pointer;border-left:3px solid transparent;font-size:12.5px}
.crmx-mi:hover{background:var(--bg-soft)}
.crmx-mi.on{background:#fff5ef;color:var(--orange);border-left-color:var(--orange)}
.crmx-mi .e{font-size:15px;width:18px;text-align:center;flex:none}
.crmx-mi .b{margin-left:auto;background:#25d366;color:#fff;font-size:9px;font-weight:800;border-radius:999px;padding:1px 6px}
.crmx-main{flex:1;background:#f4f6f9;overflow:auto;min-width:0}
.crmx-view{display:none}.crmx-view.on{display:block}
/* lead list */
.lx-folders{display:flex;gap:10px;padding:14px 14px 8px;overflow-x:auto}
.lx-folder{flex:none;min-width:140px;background:#fff;border:1px solid var(--line);border-radius:10px;padding:10px 14px}
.lx-folder .t{font-weight:700;color:var(--blue);font-size:12px;display:flex;gap:6px;align-items:center}
.lx-folder .n{margin-top:8px;color:#5b6b82;font-size:12px;display:flex;gap:6px;align-items:center}
.lx-pills{display:flex;gap:8px;padding:0 14px 10px;flex-wrap:wrap}
.lx-pill{border:1px solid var(--line);border-radius:999px;padding:5px 12px;font-size:11px;font-weight:700;color:var(--blue);background:#fff}
.lx-pill.o{border-color:var(--orange);color:var(--orange)}
.lx-tabs{display:flex;gap:16px;padding:0 14px;border-bottom:1px solid var(--line);overflow-x:auto}
.lx-tab{padding:10px 2px;font-size:12.5px;font-weight:700;color:#5b6b82;white-space:nowrap;border-bottom:2px solid transparent;cursor:pointer}
.lx-tab.on{color:var(--orange);border-bottom-color:var(--orange)}
.lx-toolbar{display:flex;gap:12px;padding:10px 14px;color:var(--orange);font-size:14px;align-items:center}
.lx-toolbar .sp{margin-left:auto}
.lx-row{background:#fff;border:1px solid var(--line);border-radius:10px;margin:0 14px 12px;padding:12px 14px}
.lx-head{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.lx-chk{width:15px;height:15px;border:1.5px solid #c2ccd8;border-radius:3px;flex:none}
.lx-name{font-weight:700;color:var(--blue)}
.lx-c{display:inline-grid;place-items:center;min-width:18px;height:18px;border-radius:999px;border:1px solid var(--line);font-size:10px;color:#5b6b82;padding:0 4px;margin-left:3px}
.lx-c.o{border-color:var(--orange);color:var(--orange)}
.lx-phone{color:#5b6b82;font-size:12px;margin-left:2px}
.lx-tick{color:#16a34a}
.lx-badge{background:#2f343a;color:#fff;font-size:10px;font-weight:700;padding:3px 9px;border-radius:4px}
.lx-sub{background:#fff;border:1px solid var(--line);color:#5b6b82;font-size:9.5px;padding:3px 9px;border-radius:4px;display:inline-block;margin-top:3px}
.lx-meta{margin-left:auto;display:flex;align-items:center;gap:12px;color:#5b6b82;font-size:11px}
.lx-meta .va{color:var(--orange);font-weight:700}
.lx-insight{margin-top:10px;border:1px solid var(--line);border-left:3px solid var(--orange);border-radius:8px;padding:9px 12px;font-size:12px;color:#5b6b82;line-height:1.5;position:relative;overflow:hidden}
.lx-insight::before{content:"";position:absolute;left:0;top:0;bottom:0;width:3px;background:linear-gradient(180deg,#f59e0b,#d946ef)}
.lx-insight .src{color:var(--blue);font-weight:800;text-decoration:underline}
.lx-insight .more{color:var(--orange);font-weight:700}
/* management dashboard */
.mx-top{display:flex;align-items:center;justify-content:space-between;padding:16px 16px 6px;gap:10px;flex-wrap:wrap}
.mx-top h4{font-size:16px;color:var(--blue)}
.mx-create{background:var(--orange);color:#fff;font-weight:800;font-size:11px;padding:9px 16px;border-radius:6px}
.mx-filters{display:flex;gap:10px;padding:10px 16px;flex-wrap:wrap}
.mx-sel{background:#fff;border:1px solid var(--line);border-radius:8px;padding:8px 14px;font-size:12px;color:#5b6b82;display:flex;gap:18px;align-items:center}
.mx-kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;padding:0 16px}
.mx-kpi{background:#fff;border:1px solid var(--line);border-top:3px solid var(--blue-2);border-radius:8px;padding:13px 14px}
.mx-kpi .h{font-size:12px;color:#5b6b82;font-weight:700}
.mx-kpi .big{font-family:'Poppins',sans-serif;font-size:24px;font-weight:800;color:var(--blue);background:#eef2f7;border-radius:6px;display:inline-block;padding:1px 9px;margin:8px 0}
.mx-kpi .r{display:flex;justify-content:space-between;font-size:11.5px;color:#5b6b82;margin-top:5px}
.mx-kpi .r b{color:var(--blue)}
.mx-tabs2{display:flex;gap:24px;padding:14px 16px 0;border-bottom:1px solid var(--line);margin-top:12px}
.mx-tab2{font-size:13px;font-weight:700;color:#5b6b82;padding-bottom:10px;border-bottom:2px solid transparent;cursor:pointer}
.mx-tab2.on{color:var(--orange);border-bottom-color:var(--orange)}
.mx-funnelwrap{display:flex;gap:30px;padding:24px 18px;align-items:center;flex-wrap:wrap}
.mx-funnel{flex:1;min-width:240px;display:flex;flex-direction:column;align-items:center;gap:3px}
.mx-funnel .total{font-family:'Poppins',sans-serif;font-size:24px;font-weight:800;color:var(--blue);align-self:flex-start;margin-bottom:8px}
.mx-seg{color:#fff;font-weight:700;font-size:12px;text-align:center;padding:7px 0;clip-path:polygon(7% 0,93% 0,85% 100%,15% 100%);transition:width .6s}
.mx-legend{display:flex;flex-direction:column;gap:9px;font-size:12px;color:#5b6b82}
.mx-legend div{display:flex;align-items:center;gap:8px}
.mx-legend i{width:11px;height:11px;border-radius:3px;flex:none}

/* crmx integrated inside the VidyaAI sticky dashboard */
.crm.crmx{padding:0}
.crm .crmx-body{min-height:0;flex:1}
.crm .crmx-main{overflow-y:auto}
.crm .crmx-side{width:152px}
.crm .crmx-top{padding:9px 12px}
.crm .crmx-search{max-width:none;font-size:11px}
.crm .mx-kpis{grid-template-columns:1fr 1fr;gap:8px;padding-top:6px}
.crm .mx-kpi{padding:10px}.crm .mx-kpi .big{font-size:20px;margin:6px 0}
.crm .mx-funnelwrap{padding:18px 14px;gap:18px}
.crm .lx-row{margin:0 12px 10px}

/* "view more dashboards" step + premium teaser */
.vd-step.vd-more{border-style:dashed;border-color:var(--orange);color:var(--orange);background:#fff5ef}
.vd-step.vd-more b{background:var(--orange);color:#fff}
.vd-more-head{text-align:center;margin-bottom:16px}
.vd-more-eyebrow{display:inline-block;font-size:11px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:var(--orange);background:var(--orange-soft);padding:5px 13px;border-radius:999px;margin-bottom:10px}
.vd-more-head h4{font-family:'Poppins',sans-serif;font-size:22px;font-weight:800;color:var(--blue)}
.vd-more-head p{color:var(--muted);font-size:14px;max-width:520px;margin:6px auto 0;line-height:1.5}
.vd-locked{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin:16px 0}
.vd-lk{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line);border-radius:12px;padding:12px 14px;font-size:13px;font-weight:700;color:var(--blue);transition:.2s}
.vd-lk .ic{font-size:16px}
.vd-lk .lock{margin-left:auto;font-size:12px;opacity:.45}
.vd-lk:hover{border-color:var(--orange);transform:translateY(-2px);box-shadow:var(--shadow-sm)}
.vd-more-cta{display:flex;align-items:center;justify-content:space-between;gap:18px;background:linear-gradient(135deg,var(--blue),#21407a);color:#fff;border-radius:16px;padding:18px 22px;flex-wrap:wrap}
.vd-more-cta b{display:block;font-family:'Poppins',sans-serif;font-size:15px;margin-bottom:3px}
.vd-more-cta span{font-size:13px;color:#c6d2e6}
.vd-more-cta .btn{flex:none}

/* ===================== VIDYA DASHBOARD — advanced controls ===================== */
.vd-ctrl{display:flex;align-items:center;gap:12px;padding:10px 18px;background:#fff;border-bottom:1px solid var(--line)}
.vd-nav{flex:none;width:34px;height:34px;border-radius:50%;border:1.5px solid var(--line);background:#fff;color:var(--blue);font-size:20px;line-height:1;cursor:pointer;display:grid;place-items:center;transition:.2s}
.vd-nav:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-1px)}
.vd-play{flex:none;width:34px;height:34px;border-radius:50%;border:none;background:var(--orange);color:#fff;font-size:12px;cursor:pointer;display:grid;place-items:center;box-shadow:0 6px 16px rgba(222,110,48,.35)}
.vd-prog{flex:1;height:5px;background:#eef2f7;border-radius:5px;overflow:hidden}
.vd-prog i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--orange),#f0974f);border-radius:5px}
.vd-dot{display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--green);margin-left:4px;vertical-align:middle;box-shadow:0 0 0 0 rgba(16,185,129,.5);animation:pulse2 2s infinite}
.vd-body{touch-action:pan-y}

/* ===================== VIDYA DASHBOARD (clear tabbed) ===================== */
.vd{max-width:980px;margin:30px auto 0;border:1px solid var(--line);border-radius:18px;overflow:hidden;box-shadow:var(--shadow);background:#fff}
.vd-top{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid var(--line);background:#fff}
.vd-logo{height:30px;width:auto;display:block}
.vd-live{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;color:#16a34a;text-transform:uppercase;letter-spacing:.5px}
.vd-live::before{content:"";width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 0 0 rgba(16,185,129,.5);animation:pulse2 2s infinite}
.vd-steps{display:flex;flex-wrap:wrap;gap:8px;padding:14px;background:#fafbfd;border-bottom:1px solid var(--line)}
.vd-step{display:inline-flex;align-items:center;gap:8px;background:#fff;border:1.5px solid var(--line);border-radius:999px;padding:8px 14px;font:inherit;font-size:13px;font-weight:700;color:var(--blue);cursor:pointer;transition:.2s}
.vd-step:hover{border-color:var(--orange);color:var(--orange)}
.vd-step b{display:grid;place-items:center;width:20px;height:20px;border-radius:50%;background:#eef2f7;color:var(--blue);font-size:11px}
.vd-step.on{background:var(--blue);color:#fff;border-color:var(--blue)}
.vd-step.on b{background:var(--orange);color:#fff}
.vd-cap{padding:13px 18px;background:#fff;color:var(--muted);font-size:14px;border-bottom:1px solid var(--line);line-height:1.5}
.vd-body{padding:18px;background:#f4f6f9}
.vd-view{display:none;animation:slideIn .4s ease}
.vd-view.on{display:block}
.vd .mx-kpis{grid-template-columns:1fr 1fr;gap:10px}
.vd .mx-funnelwrap{padding:18px 6px;gap:18px}
.vd .lx-row{margin:0 0 10px}

/* ===================== SEGMENT CHOOSER (clear) ===================== */
.seg3-tabs{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin:26px 0}
.seg3-tab{display:inline-flex;align-items:center;gap:9px;padding:12px 18px;border-radius:14px;border:1.5px solid var(--line);background:#fff;font:inherit;font-weight:700;font-size:14.5px;color:var(--blue);cursor:pointer;transition:.2s}
.seg3-tab .e{font-size:18px}
.seg3-tab:hover{border-color:var(--orange);color:var(--orange)}
.seg3-tab.on{background:var(--blue);color:#fff;border-color:var(--blue)}
.seg3-panel{display:grid;grid-template-columns:1.05fr .95fr;gap:0;background:#fff;border:1px solid var(--line);border-radius:24px;box-shadow:var(--shadow-sm);overflow:hidden}
.seg3-left{padding:clamp(26px,4vw,40px)}
.seg3-left .for{font-family:'Poppins',sans-serif;font-size:13px;font-weight:800;letter-spacing:1px;text-transform:uppercase;color:var(--orange);margin-bottom:8px}
.seg3-left h3{font-family:'Poppins',sans-serif;font-size:clamp(22px,2.6vw,30px);font-weight:800;letter-spacing:-.6px;margin-bottom:12px;line-height:1.15}
.seg3-left .desc{color:var(--muted);font-size:16px;margin-bottom:22px;line-height:1.6}
.seg3-bl{list-style:none;display:flex;flex-direction:column;gap:14px;margin:0 0 26px}
.seg3-bl li{display:flex;gap:12px;align-items:flex-start;font-size:15px;color:#33404f;line-height:1.5}
.seg3-bl .ck{flex:none;width:24px;height:24px;border-radius:7px;background:var(--orange-soft);color:var(--orange);display:grid;place-items:center;font-weight:900;font-size:13px}
.seg3-right{background:linear-gradient(160deg,var(--blue),#21407a);color:#fff;padding:clamp(26px,4vw,40px);display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden}
.seg3-right::before{content:"";position:absolute;width:240px;height:240px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(80px);top:-90px;right:-50px}
.seg3-emoji{font-size:54px;margin-bottom:12px;position:relative}
.seg3-stat{font-family:'Poppins',sans-serif;font-size:clamp(40px,6vw,58px);font-weight:800;color:#ffd9bf;line-height:1;letter-spacing:-2px;position:relative}
.seg3-statl{font-size:14px;color:#c6d2e6;font-weight:600;margin:8px 0 22px;position:relative}
.seg3-feat{position:relative;display:flex;flex-direction:column;gap:10px}
.seg3-feat div{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:600;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:12px;padding:10px 14px}
.seg3-feat .d{width:7px;height:7px;border-radius:50%;background:#7CFFB2;flex:none}

/* ===================== WHATSAPP — realistic screen ===================== */
.wachat{max-width:380px;width:100%;border-radius:14px;overflow:hidden;box-shadow:var(--shadow);border:1px solid var(--line);background:#fff}
.wa-hd{background:#075E54;color:#fff;display:flex;align-items:center;gap:10px;padding:11px 13px}
.wa-hd .bk{font-size:20px;opacity:.9}
.wa-av{width:38px;height:38px;border-radius:50%;background:#fff;object-fit:contain;padding:3px;flex:none}
.wa-hd b{font-size:14px;display:block;line-height:1.25}
.wa-hd small{font-size:10.5px;opacity:.85}
.wa-hd .wa-ic{margin-left:auto;font-size:14px;opacity:.92;letter-spacing:1px}
.wa-bd{height:420px;overflow-y:auto;padding:16px 14px;display:flex;flex-direction:column;gap:8px;background:#ece5dd;background-image:radial-gradient(rgba(0,0,0,.03) 1px,transparent 1px);background-size:18px 18px}
.wa-bd .cmsg{max-width:82%;padding:8px 11px 7px;border-radius:9px;font-size:13.5px;box-shadow:0 1px 1px rgba(0,0,0,.08);line-height:1.45;animation:cin .35s both}
.wa-bd .cmsg--a{align-self:flex-start;background:#fff;color:var(--ink);border:none;border-bottom-left-radius:2px}
.wa-bd .cmsg--u{align-self:flex-end;background:#dcf8c6;color:#0b3b2e;border-bottom-right-radius:2px}
.wa-bd .cmsg--u::after{content:"✓✓";color:#34b7f1;font-size:10px;float:right;margin:3px 0 -3px 8px}
.wa-bd .cmsg--sys{align-self:center;background:#fff6d6;color:#7a6a2a;font-size:11px;font-weight:700;padding:4px 12px;border-radius:8px;box-shadow:none}
.wa-bd .ctyping{align-self:flex-start;background:#fff;border:none}
.wa-input{display:flex;align-items:center;gap:10px;padding:9px 12px;background:#f0f0f0;color:#8a96a3;font-size:13px}
.wa-input>span:first-child{flex:1;background:#fff;border-radius:20px;padding:9px 14px}
.wa-input .snd{width:36px;height:36px;border-radius:50%;background:#075E54;color:#fff;display:grid;place-items:center;flex:none}

/* ===================== WHATSAPP — realistic screen END ===================== */
/* counsellor intelligence — leaderboard */

/* ===================== INTEGRATIONS — explorer ===================== */
.ig-stats{display:flex;gap:46px;justify-content:center;margin:6px 0 30px;flex-wrap:wrap;text-align:center}
.ig-stats .n{font-family:'Poppins',sans-serif;font-size:32px;font-weight:800;line-height:1}
.ig-stats .l{font-size:12.5px;color:var(--muted);font-weight:600;margin-top:6px}
.ig{display:grid;grid-template-columns:290px 1fr;align-items:stretch;border:1px solid var(--line);border-radius:24px;box-shadow:var(--shadow-sm);overflow:hidden;background:#fff}
.ig-nav{display:flex;flex-direction:column;background:var(--bg-soft);border-right:1px solid var(--line);padding:12px;gap:2px}
.ig-nb{display:flex;align-items:center;gap:11px;padding:13px 14px;border:0;background:none;font:inherit;text-align:left;font-size:13.5px;font-weight:700;color:var(--muted);border-radius:12px;cursor:pointer;transition:.2s;border-left:3px solid transparent}
.ig-nb .e{font-size:17px;width:20px;text-align:center;flex:none}
.ig-nb:hover{color:var(--blue)}
.ig-nb.on{background:#fff;color:var(--orange);box-shadow:var(--shadow-sm)}
.ig-panel{padding:26px}
.ig-phead{display:flex;align-items:center;gap:12px;margin-bottom:6px}
.ig-arw{flex:none;width:34px;height:34px;border-radius:50%;border:1.5px solid var(--line);background:#fff;color:var(--blue);font-size:20px;line-height:1;cursor:pointer;display:grid;place-items:center;transition:.2s}
.ig-arw:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-1px)}
#igNext{margin-left:auto}
.ig-count{font-family:'Poppins',sans-serif;font-weight:800;color:var(--orange);font-size:14px}
.ig-phead h3{font-family:'Poppins',sans-serif;font-size:21px;font-weight:800;letter-spacing:-.4px}
.ig-pd{color:var(--muted);font-size:14px;margin-bottom:18px;max-width:560px}
.ig-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(178px,1fr));gap:18px}
.ig-card{height:150px;border:1px solid var(--line);border-radius:16px;display:grid;place-items:center;padding:22px;transition:.25s;background:#fff;animation:igin .5s both}
@keyframes igin{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}
.ig-card:hover{border-color:rgba(222,110,48,.4);box-shadow:var(--shadow-sm);transform:translateY(-3px)}
.ig-card img{max-width:92%;max-height:96px;object-fit:contain;filter:none;opacity:1;mix-blend-mode:multiply;transition:transform .3s}
.ig-card:hover img{transform:scale(1.07)}
@media(max-width:820px){
  .ig{grid-template-columns:1fr}
  .ig-nav{display:none}
}
@media(max-width:560px){
  .ig-grid{grid-template-columns:repeat(3,1fr);gap:8px}
  .ig-card{height:80px;padding:8px;border-radius:12px}
  .ig-card img{max-height:48px;max-width:90%}
  .ig-panel{padding:16px}
}

/* ===================== SEGMENT — PREMIUM SCROLLYTELLING ===================== */
.sx{display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:start;margin-top:10px}
.sx-ch{min-height:86vh;display:flex;flex-direction:column;justify-content:center;padding:40px 0;opacity:.26;transform:translateY(26px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1)}
.sx-ch.active{opacity:1;transform:none}
.sx-ix{display:flex;align-items:center;gap:14px;font-family:'Poppins',sans-serif;font-size:15px;font-weight:800;color:var(--orange);letter-spacing:1px;margin-bottom:16px}
.sx-kick{font-size:12px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:var(--muted)}
.sx-ch h3{font-family:'Poppins',sans-serif;font-size:clamp(28px,3.4vw,42px);font-weight:800;letter-spacing:-1.2px;line-height:1.08;margin-bottom:16px}
.sx-ch p{color:var(--muted);font-size:17.5px;line-height:1.7;max-width:480px;margin-bottom:24px}
.sx-feats{list-style:none;display:flex;flex-direction:column;border-top:1px solid var(--line);max-width:480px}
.sx-feats li{display:flex;gap:16px;align-items:flex-start;padding:16px 0;border-bottom:1px solid var(--line)}
.sx-feats .n{font-family:'Poppins',sans-serif;font-size:12px;font-weight:800;color:var(--orange);padding-top:3px;min-width:22px}
.sx-feats b{display:block;font-size:15px;color:var(--blue);margin-bottom:2px}
.sx-feats span{font-size:13.5px;color:var(--muted)}
/* sticky stage */
.sx-stage{position:sticky;top:92px;height:84vh;max-height:700px;display:grid;grid-template-columns:auto 1fr;gap:22px}
.sx-rail{display:flex;flex-direction:column;justify-content:center;align-items:center;gap:2px}
.sx-rdot{appearance:none;border:0;background:none;font:inherit;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:4px;color:#c2ccd8;font-family:'Poppins',sans-serif;font-weight:800;font-size:12px;padding:3px}
.sx-rdot .ln{width:2px;height:24px;background:var(--line);border-radius:2px;transition:.35s}
.sx-rdot.on{color:var(--orange)}
.sx-rdot.on .ln{background:var(--orange);height:40px}
.sx-right{display:flex;flex-direction:column;gap:16px;min-height:0}
.sx-visual{flex:1;position:relative;border-radius:30px;overflow:hidden;background:radial-gradient(130% 130% at 0% 0%,#21407a 0%,#19335D 58%);box-shadow:0 50px 100px -30px rgba(25,51,93,.55);min-height:360px}
.sx-visual::before{content:"";position:absolute;width:320px;height:320px;border-radius:50%;background:rgba(222,110,48,.3);filter:blur(90px);top:-110px;right:-60px;z-index:0}
.sx-visual::after{content:"";position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.045) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.045) 1px,transparent 1px);background-size:42px 42px;opacity:.5;z-index:0}
.sx-scene{position:absolute;inset:0;z-index:1;padding:clamp(26px,3.4vw,42px);display:flex;flex-direction:column;justify-content:space-between;color:#fff;opacity:0;transform:scale(1.04) translateY(10px);transition:opacity .7s cubic-bezier(.2,.7,.2,1),transform .7s cubic-bezier(.2,.7,.2,1);pointer-events:none}
.sx-scene.on{opacity:1;transform:none;pointer-events:auto}
.sx-top{display:flex;align-items:center;gap:14px}
.sx-badge{width:52px;height:52px;border-radius:15px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);display:grid;place-items:center;color:#fff;flex:none}
.sx-badge svg{width:26px;height:26px}
.sx-tt .sx-nm{font-family:'Poppins',sans-serif;font-weight:800;font-size:18px}
.sx-tt .sx-sub{font-size:12px;color:#9bb3d6;font-weight:600}
.sx-live{margin-left:auto;display:inline-flex;align-items:center;gap:7px;font-size:10px;font-weight:800;letter-spacing:1.5px;color:#7CFFB2}
.sx-live .d{width:7px;height:7px;border-radius:50%;background:#34d399;animation:pulse2 2s infinite}
.sx-metric{font-family:'Poppins',sans-serif;font-size:clamp(46px,7vw,76px);font-weight:800;color:#ffd9bf;line-height:1;letter-spacing:-3px}
.sx-metricl{font-size:15px;color:#c6d2e6;font-weight:500;margin-top:10px;max-width:320px}
.sx-glass{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.14);border-radius:18px;-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);overflow:hidden}
.sx-gr{display:flex;justify-content:space-between;align-items:center;padding:13px 18px;font-size:14px;border-bottom:1px solid rgba(255,255,255,.08)}
.sx-gr:last-child{border-bottom:0}
.sx-gr span{color:#9bb3d6}.sx-gr b{color:#fff;font-weight:700}
.sx-cta{display:flex;align-items:center;justify-content:space-between;gap:14px;background:var(--orange);color:#fff;border-radius:16px;padding:16px 22px;font-family:'Poppins',sans-serif;font-weight:700;font-size:15px;text-decoration:none;box-shadow:0 14px 30px rgba(222,110,48,.32);transition:transform .25s,box-shadow .25s}
.sx-cta:hover{transform:translateY(-3px);box-shadow:0 20px 40px rgba(222,110,48,.42)}
.sx-cta svg{width:20px;height:20px;flex:none}
@media(max-width:980px){
  .sx{grid-template-columns:1fr;gap:8px}
  .sx-stage{position:sticky;top:64px;height:auto;order:-1;grid-template-columns:1fr;gap:14px}
  .sx-rail{display:none}
  .sx-visual{min-height:330px}
  .sx-ch{min-height:auto;opacity:1;transform:none;padding:24px 0}
  .sx-ch p,.sx-feats{max-width:none}
}

/* ===================== RESPONSIVE (all devices) ===================== */
/* Large tablet / small laptop */
@media(max-width:1024px){
  .vidya-wrap,.arch-wrap,.sg-wrap{grid-template-columns:1fr;gap:20px}
  .vsticky,.arch-sticky,.sg-sticky{position:sticky;top:60px;height:auto;max-height:none;order:-1}
  .vstory,.arch-story,.sg-story{min-height:auto;opacity:1;transform:none;padding:16px 0}
  .crm{height:440px}.arch-screen{height:auto;min-height:380px}.sg-card{height:auto}
  /* kill 3D morph on touch/narrow so nothing clips or overflows */
  .crm,.arch-screen,.sg-card{transform:none!important}
  .cmp2-when{grid-template-columns:1fr}
  .split{gap:40px}
}
/* Tablet portrait */
@media(max-width:920px){
  .hero{padding:48px 0 30px}
  .hero__in,.split,.aihub__in{grid-template-columns:1fr;gap:32px}
  .caps{grid-template-columns:1fr}
  .cap--lg,.cap--md{grid-column:auto}
  .stats,.tcards,.arch-metrics{grid-template-columns:1fr 1fr}
  .kpis{grid-template-columns:1fr 1fr}
  .aihub{padding:30px}.sec{padding:56px 0}
  .sg2{grid-template-columns:1fr;gap:22px}.sg2-view{position:static}
  .seg3-panel{grid-template-columns:1fr}.seg3-right{order:-1}
  .roi__in,.demo-grid,.lm{grid-template-columns:1fr}
  .roi{padding:30px}.demo-left,.demo-right{padding:34px 26px}.lm{padding:30px}
  .iphone-stage{min-height:580px}
  .rf-stage{height:340px}
  .cs-grid,.sec-grid{grid-template-columns:1fr 1fr}
  .crmx-side{width:60px}.crm .crmx-side{width:56px}.crmx-mi{font-size:0;justify-content:center;padding:12px 0;gap:0}
  .crmx-mi .e{font-size:17px}.crmx-mi .b{display:none}
  .mx-kpis,.crm .mx-kpis{grid-template-columns:1fr 1fr}
}
/* Large phone */
@media(max-width:640px){
  .container{padding:0 18px}
  .stats,.tcards,.arch-metrics,.kpis,.cs-grid,.sec-grid,.mx-kpis{grid-template-columns:1fr}
  /* compact outcomes stats on phones: 2x2, smaller */
  .stats--compact{grid-template-columns:1fr 1fr;gap:10px;margin-top:26px!important}
  .stats--compact .stat{padding:16px 10px;border-radius:14px}
  .stats--compact .stat__n{font-size:30px;letter-spacing:-1px}
  .stats--compact .stat__l{font-size:11.5px;margin-top:5px}
  .crmx-search{display:none}.crmx-top{gap:10px}.crmx-ico{font-size:14px;gap:11px}
  .vd-steps{gap:6px;padding:12px 10px}
  .vd-step{padding:7px 11px;font-size:12px;gap:6px}
  .vd-step b{width:18px;height:18px;font-size:10px}
  .vd-cap{font-size:13px;padding:11px 14px}
  .vd-body{padding:14px}
  .vd-locked{grid-template-columns:1fr 1fr}
  .vd-more-cta{flex-direction:column;align-items:stretch;text-align:center}
  .vd-more-cta .btn{justify-content:center}
  .vd-top{padding:12px 14px}.vd-logo{height:26px}
  .vd .mx-funnelwrap{flex-direction:column;align-items:stretch}
  .vd .mx-legend{display:grid;grid-template-columns:1fr 1fr;gap:6px}
  .crmx-side{display:none}
  .crmx-main{overflow-x:auto}.lx-meta{display:none}
  /* compact vertical timeline on phones */
  .flow{flex-direction:column;align-items:stretch;flex-wrap:nowrap;max-width:430px;margin:28px auto 0;gap:0}
  .fnode{flex:0 0 auto;width:100%;display:flex;align-items:center;gap:14px;text-align:left;padding:14px 16px}
  .fnode__ic{font-size:22px;flex:none;width:26px;text-align:center}
  .fnode b{margin-top:0;font-size:14.5px}
  .fnode small{font-size:12px}
  .fconn{flex:0 0 auto;width:3px;height:20px;min-width:0;margin:0 0 0 30px;border-radius:3px}
  .fconn i{width:100%;height:0;transition:height .5s linear}
  .fconn.on i{height:100%}
  .fdart{display:none}
  .h2{font-size:clamp(26px,7vw,34px)}
  .hero h1{font-size:clamp(34px,9vw,46px)}
  .lead{font-size:16px}
  .btn,.btn-lg{padding:14px 22px;font-size:15px}
  .hero__cta .btn,.btn-lg{flex:1 1 100%;justify-content:center}
  .demo-form select,.demo-form input{font-size:16px} /* avoids iOS zoom */
  .cta__form input{font-size:16px}
  .roi-split{grid-template-columns:1fr}
  .dbadges{justify-content:center;text-align:center}
  .demo-left,.demo-right{padding:30px 22px}
}
/* Small phone */
@media(max-width:400px){
  .iphone{width:262px;height:540px;border-radius:46px}
  .ip-screen{border-radius:37px}
  .fc1,.fc3{left:-6px}.fc2{right:-6px}
  .fcard{padding:9px 11px}.fcard .fi{width:30px;height:30px;font-size:15px}.fcard b{font-size:11px}.fcard small{font-size:9.5px}
  .iphone-stage{min-height:560px}
  .scta__r .btn{padding:12px 16px;font-size:14px}
}
</style>
<style id="ee-compact-rhythm">
/* Compact, device-friendly section rhythm: 10px top / 10px bottom between sections.
   Interactive scroll-story spacing (vh) and inner card padding are intentionally untouched. */
.sec,.hero,#xhero,#platform,#stories,#segments,
.vx-head,.vx-proof,.rf-wrap,.rf-band-in,
.sec-auto,.ea-wrap,.ee-wrap,.wa-sec,
.intro,.outro{
  padding-top:10px!important;
  padding-bottom:10px!important;
}
.ts-grid{display:flex!important;flex-wrap:wrap!important;justify-content:center!important;overflow:visible!important;scroll-snap-type:none!important;margin-inline:auto!important;max-width:1180px;gap:clamp(16px,2.2vw,24px)!important}
#stories .ts-card{flex:1 1 320px!important;max-width:382px!important;scroll-snap-align:none!important}
#stories .ts-nav,#stories .ts-hint{display:none!important}
</style>
<div id="prog"></div>

<!-- The theme's header.php already opens <main id="main-content">, so this
     homepage uses a plain wrapper <div> (not a second <main>) to avoid two
     nested <main> landmarks — invalid HTML and bad for SEO/screen readers. -->
<div class="ee-home">
<!-- ===================== HERO (WebGL) ===================== -->
<!-- ===================== HERO — brand edition (scoped #xhero) ===================== -->
<style>
/* EXTRAAEDGE HERO — brand edition · scoped under #xhero (no global bleed) */
#xhero{
  --navy:#19335D; --orange:#DE6E30; --bg:#FFFFFF;
  --navy-90:rgba(25,51,93,.9); --navy-70:rgba(25,51,93,.7); --navy-55:rgba(25,51,93,.55);
  --navy-15:rgba(25,51,93,.15); --navy-10:rgba(25,51,93,.10); --navy-06:rgba(25,51,93,.06);
  --navy-03:rgba(25,51,93,.035); --org-12:rgba(222,110,48,.12); --org-25:rgba(222,110,48,.25);
  --r-lg:22px; --r-md:14px; --font:'Inter',sans-serif;
  position:relative;min-height:100vh;display:flex;align-items:center;overflow:hidden;isolation:isolate;padding:96px 0 72px;
  background:var(--bg);color:var(--navy);font-family:var(--font);-webkit-font-smoothing:antialiased}
#xhero *{margin:0;padding:0;box-sizing:border-box}
#xhero a{text-decoration:none;color:inherit}
#xhero .container{max-width:1240px;margin:0 auto;padding:0 32px}
#xhero #glsl{position:absolute;inset:0;width:100%;height:100%;z-index:-3;opacity:.6}
#xhero .hero__veil{position:absolute;inset:0;z-index:-2;background:radial-gradient(110% 80% at 80% 0%,transparent 25%,var(--bg) 72%),linear-gradient(to top,var(--bg) 0%,transparent 30%)}
#xhero .hero__grid{position:absolute;inset:0;z-index:-1;pointer-events:none;background-image:linear-gradient(var(--navy-06) 1px,transparent 1px),linear-gradient(90deg,var(--navy-06) 1px,transparent 1px);background-size:72px 72px;-webkit-mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%);mask-image:radial-gradient(75% 60% at 50% 38%,#000 0%,transparent 100%)}
#xhero .hero__in{position:relative;z-index:1;display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:64px;align-items:center}
#xhero .reveal{opacity:0;transform:translateY(22px);animation:xh-rise .9s cubic-bezier(.2,.7,.2,1) forwards}
@keyframes xh-rise{to{opacity:1;transform:none}}
#xhero .d1{animation-delay:.05s}#xhero .d2{animation-delay:.16s}#xhero .d3{animation-delay:.27s}#xhero .d4{animation-delay:.38s}#xhero .d5{animation-delay:.5s}#xhero .d6{animation-delay:.64s}
#xhero .pill{display:inline-flex;align-items:center;gap:9px;padding:7px 16px 7px 8px;border:1px solid var(--navy-15);border-radius:99px;background:linear-gradient(110deg,var(--org-12),rgba(222,110,48,.02) 60%);font-size:13px;font-weight:500;letter-spacing:.01em;color:var(--navy-70)}
#xhero .pill b{color:var(--orange);font-weight:700}
#xhero .pill__txt{flex:1;min-width:0}
#xhero .pill__ico{width:20px;height:20px;object-fit:contain;border-radius:6px;background:#fff;padding:1.5px;box-shadow:0 0 0 1px var(--navy-10)}
#xhero .pill__new{font-size:10px;font-weight:800;letter-spacing:.12em;color:#fff;background:var(--orange);padding:3px 8px;border-radius:99px}
#xhero h1{font-family:var(--font);font-weight:800;font-size:clamp(40px,2.8vw,66px);line-height:1.05;letter-spacing:-.035em;margin:26px 0 0;color:var(--navy)}
#xhero h1 .accent{color:var(--orange);position:relative;white-space:nowrap}
#xhero h1 .accent svg{position:absolute;left:0;right:0;bottom:-.14em;width:100%;height:.22em;overflow:visible}
#xhero h1 .accent svg path{fill:none;stroke:var(--orange);stroke-width:7;stroke-linecap:round;opacity:.45;stroke-dasharray:600;stroke-dashoffset:600;animation:xh-draw 1.1s .9s ease forwards}
@keyframes xh-draw{to{stroke-dashoffset:0}}
#xhero .hero__type-row{display:block;min-height:1.1em;white-space:nowrap;color:var(--navy)}
#xhero .caret{display:inline-block;width:3px;height:.84em;margin-left:6px;vertical-align:-.08em;background:var(--orange);animation:xh-blink 1s steps(1) infinite;border-radius:2px}
@keyframes xh-blink{50%{opacity:0}}
#xhero .sub{margin-top:22px;max-width:540px;font-size:17.5px;line-height:1.65;color:var(--navy-70)}
#xhero .sub b{color:var(--navy);font-weight:700}
#xhero .chips{display:flex;flex-wrap:wrap;gap:9px;margin-top:22px}
#xhero .chip{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-15);border-radius:9px;padding:7px 11px;background:#fff}
#xhero .chip i{font-style:normal;color:var(--orange)}
#xhero .hero__cta{display:flex;align-items:center;gap:16px;margin-top:34px;flex-wrap:wrap}
#xhero .btn{position:relative;display:inline-flex;align-items:center;gap:10px;font-weight:700;font-size:15.5px;letter-spacing:-.01em;border-radius:13px;padding:17px 30px;cursor:pointer;transition:transform .25s cubic-bezier(.2,.7,.2,1),box-shadow .25s}
#xhero .btn-primary{color:#fff;background:linear-gradient(180deg,#E87E43,var(--orange));overflow:hidden;box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 14px 34px -10px rgba(222,110,48,.55)}
#xhero .btn-primary:hover{box-shadow:0 1px 0 rgba(255,255,255,.35) inset,0 20px 44px -10px rgba(222,110,48,.7);transform:translateY(-2px)}
#xhero .btn-primary .shine{position:absolute;top:0;left:-80%;width:55%;height:100%;transform:skewX(-22deg);background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);animation:xh-shine 4.2s ease-in-out infinite}
@keyframes xh-shine{0%,55%{left:-80%}75%,100%{left:140%}}
#xhero .btn-primary .arr{transition:transform .25s}
#xhero .btn-primary:hover .arr{transform:translateX(4px)}
#xhero .btn-ghost{color:var(--navy);border:1.5px solid var(--navy-15);background:#fff}
#xhero .btn-ghost:hover{border-color:var(--navy);background:var(--navy-03)}
#xhero .btn-ghost .play{display:grid;place-items:center;width:22px;height:22px;border-radius:50%;background:var(--navy-10);color:var(--navy);font-size:9px}
#xhero .cta-note{font-size:12.5px;color:var(--navy-55)}
#xhero .stats{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-top:38px;width:100%;max-width:480px}
#xhero .stat{position:relative;background:#fff;border:1px solid var(--navy-10);border-radius:14px;padding:16px 18px;box-shadow:0 8px 24px rgba(25,51,93,.06);transition:transform .2s,box-shadow .25s,border-color .25s}
#xhero .stat:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(25,51,93,.12);border-color:rgba(222,110,48,.45)}
#xhero .stat__n{font-weight:800;font-size:30px;letter-spacing:-.03em;color:var(--navy);line-height:1}
#xhero .stat__n em{font-style:normal;color:var(--orange)}
#xhero .stat__l{margin-top:6px;font-size:12.5px;font-weight:600;color:var(--navy-55)}
#xhero .console-wrap{position:relative;perspective:1400px}
#xhero .console{position:relative;border-radius:var(--r-lg);border:1px solid var(--navy-15);background:#fff;box-shadow:0 40px 90px -34px rgba(25,51,93,.35),0 2px 6px rgba(25,51,93,.06);padding:22px 22px 18px;transform-style:preserve-3d;transition:transform .4s ease}
#xhero .console::before{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1.5px;pointer-events:none;background:linear-gradient(135deg,var(--orange),transparent 32%,transparent 68%,var(--navy));opacity:.5;-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude}
#xhero .console__top{display:flex;align-items:center;justify-content:space-between;gap:12px;padding-bottom:16px;border-bottom:1px dashed var(--navy-15)}
#xhero .brand{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:700;color:var(--navy);white-space:nowrap}
#xhero .orb{position:relative;display:grid;place-items:center;width:32px;height:32px;border-radius:10px;padding:2px;color:#fff;font-weight:800;font-size:14px;background:conic-gradient(from 200deg,var(--orange),var(--navy),var(--orange));box-shadow:0 4px 12px rgba(222,110,48,.3)}
#xhero .orb img{width:100%;height:100%;object-fit:contain;border-radius:8px;background:#fff;padding:2px}
#xhero .brand small{display:inline;font-weight:600;font-size:10px;color:var(--navy-55);letter-spacing:.1em;margin-left:7px;vertical-align:1px}
#xhero .brand small::before{content:"·";margin-right:7px;color:var(--navy-55)}
#xhero .live-dot{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.12em;color:var(--orange);border:1px solid var(--org-25);background:var(--org-12);border-radius:99px;padding:5px 11px}
#xhero .ping{position:relative;width:7px;height:7px;border-radius:50%;background:var(--orange);display:inline-block}
#xhero .ping::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:1px solid var(--orange);animation:xh-ping 1.6s ease-out infinite}
@keyframes xh-ping{0%{transform:scale(.4);opacity:.9}100%{transform:scale(1.5);opacity:0}}
#xhero .feed{display:flex;flex-direction:column;gap:10px;margin-top:16px;min-height:268px}
#xhero .step{border:1px solid var(--navy-10);border-radius:var(--r-md);padding:11px 14px;background:var(--navy-03);opacity:0;transform:translateY(12px);transition:opacity .5s,transform .5s cubic-bezier(.2,.7,.2,1)}
#xhero .step.on{opacity:1;transform:none}
#xhero .step__tag{display:flex;align-items:center;gap:8px;font-size:9.5px;font-weight:800;letter-spacing:.18em;color:var(--navy-55);margin-bottom:6px}
#xhero .step__txt{font-size:13.5px;line-height:1.55;color:var(--navy-70)}
#xhero .step__txt q{color:var(--navy);font-weight:500;quotes:"\201C" "\201D"}
#xhero .step--in{border-left:3px solid var(--navy)}
#xhero .step--ai{border-left:3px solid var(--orange);background:linear-gradient(110deg,var(--org-12),var(--navy-03) 60%)}
#xhero .step--ai .step__tag{color:var(--orange)}
#xhero .step--ok{border-left:3px solid var(--navy)}
#xhero .step--ok .step__tag{color:var(--navy)}
#xhero .src{font-size:11px;color:var(--navy-55);margin-top:3px}
#xhero .wv{display:inline-flex;align-items:flex-end;gap:2px;height:10px;margin-left:4px}
#xhero .wv i{width:2.5px;background:var(--orange);border-radius:2px;animation:xh-wv 1s ease-in-out infinite}
#xhero .wv i:nth-child(1){animation-delay:0s}#xhero .wv i:nth-child(2){animation-delay:.12s}#xhero .wv i:nth-child(3){animation-delay:.24s}#xhero .wv i:nth-child(4){animation-delay:.36s}#xhero .wv i:nth-child(5){animation-delay:.48s}
@keyframes xh-wv{0%,100%{height:3px}50%{height:10px}}
#xhero .think-line{display:flex;gap:8px;align-items:baseline}
#xhero .think-line .tick{color:var(--orange);font-size:11px;font-weight:800;opacity:0;transition:opacity .3s}
#xhero .think-line.done .tick{opacity:1}
#xhero .badge-ok{display:inline-flex;align-items:center;gap:6px;color:var(--navy);font-weight:700}
#xhero .badge-ok::before{content:"\2713";display:grid;place-items:center;width:16px;height:16px;border-radius:50%;background:var(--orange);color:#fff;font-size:10px}
#xhero .acts{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}
#xhero .act{font-size:11px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-10);border-radius:7px;padding:4px 8px;background:#fff;opacity:0;transform:scale(.92);transition:.35s}
#xhero .act.on{opacity:1;transform:none}
#xhero .console__mods{display:flex;flex-wrap:wrap;gap:8px;margin-top:16px;padding-top:14px;border-top:1px dashed var(--navy-15)}
#xhero .mods__track{display:contents}
#xhero .console__mods span{flex:none;font-size:11.5px;font-weight:600;color:var(--navy-70);border:1px solid var(--navy-10);border-radius:99px;padding:6px 12px;white-space:nowrap;background:#fff}
#xhero .float{position:absolute;border-radius:16px;border:1px solid var(--navy-15);background:#fff;box-shadow:0 24px 50px -18px rgba(25,51,93,.35);padding:14px 16px;animation:xh-bob 6s ease-in-out infinite}
@keyframes xh-bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
#xhero .float--score{top:-72px;right:-22px;display:flex;align-items:center;gap:12px}
#xhero .ring{position:relative;width:54px;height:54px}
#xhero .ring svg{transform:rotate(-90deg)}
#xhero .ring circle{fill:none;stroke-width:5}
#xhero .ring .bg{stroke:var(--navy-10)}
#xhero .ring .fg{stroke:url(#xhRingGrad);stroke-linecap:round;stroke-dasharray:138.2;stroke-dashoffset:138.2;transition:stroke-dashoffset 1.2s cubic-bezier(.2,.7,.2,1)}
#xhero .ring b{position:absolute;inset:0;display:grid;place-items:center;font-size:14px;font-weight:800;color:var(--navy)}
#xhero .float--score .lbl{font-size:10px;font-weight:800;letter-spacing:.14em;color:var(--navy-55)}
#xhero .float--score .who{font-size:13px;font-weight:700;margin-top:2px;color:var(--navy)}
#xhero .float--conv{bottom:-90px;left:-26px;animation-delay:1.4s}
#xhero .float--conv .num{font-weight:800;font-size:22px;color:var(--orange);letter-spacing:-.02em}
#xhero .float--conv .lbl{font-size:11px;font-weight:500;color:var(--navy-55);margin-top:2px}
#xhero .spark{display:flex;align-items:flex-end;gap:3px;height:22px;margin-top:8px}
#xhero .spark i{width:5px;border-radius:2px;background:linear-gradient(to top,var(--org-25),var(--orange));animation:xh-sp 2.6s ease-in-out infinite}
@keyframes xh-sp{0%,100%{transform:scaleY(.6)}50%{transform:scaleY(1)}}
@media(max-width:1024px){
  #xhero .hero__in{grid-template-columns:1fr;gap:48px}
  #xhero .console-wrap{max-width:560px;margin:0 auto}
  #xhero .hero-film{max-width:640px;margin:0 auto}
  #xhero .stats{grid-template-columns:repeat(2,1fr);gap:12px;max-width:100%}
  #xhero .stat:nth-child(odd)+.stat::before{display:none}
}
@media(max-width:560px){
  #xhero{padding:72px 0 56px}
  #xhero .pill{flex-wrap:wrap;row-gap:6px;border-radius:14px;padding:9px 14px 9px 10px;font-size:12px;line-height:1.55;max-width:100%}
  #xhero .pill__ico{width:18px;height:18px}
  #xhero .pill__new{font-size:9px;padding:3px 7px}
  #xhero h1{font-size:clamp(34px,9.5vw,44px)}
  #xhero .hero__type-row{white-space:normal}
  #xhero .float--score{right:-6px;top:-26px}
  #xhero .float--conv{left:-6px;bottom:-24px}
  #xhero .stats{grid-template-columns:repeat(2,1fr);width:100%}
  #xhero .brand{font-size:12.5px}
  #xhero .brand small{font-size:8.5px;letter-spacing:.06em;margin-left:5px}
}
@media(prefers-reduced-motion:reduce){
  #xhero *{animation:none!important;transition:none!important}
  #xhero .reveal,#xhero .step,#xhero .act{opacity:1;transform:none}
  #xhero h1 .accent svg path{stroke-dashoffset:0}
}
</style>
<section id="xhero" aria-label="ExtraaEdge AI-Powered Admission CRM">
  <canvas id="glsl" aria-hidden="true"></canvas>
  <div class="hero__veil" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="container hero__in">
    <div>
      <span class="pill reveal d1"><img decoding="async" class="pill__ico" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/vidya-ai-icon.png" alt="" onerror="this.remove()"><span class="pill__new">NEW &middot; VidyaAI</span><span class="pill__txt">Trusted by <b>500+ admission teams</b> across 12 countries</span></span>
      <h1 class="reveal d2">
        Every enquiry,<br />
        answered <span class="accent">instantly.<svg aria-hidden="true" viewBox="0 0 300 24" preserveAspectRatio="none"><path d="M4 18 C 70 6, 220 4, 296 14"/></svg></span><br />
        <span class="hero__type-row"><span id="typed"></span><span class="caret"></span></span>
      </h1>
      <p class="sub reveal d3">The AI-powered Admission CRM where co-pilots and agents <b>qualify leads, brief counsellors and follow up 24/7</b> &mdash; so your team spends time enrolling students, not chasing them.</p>
      <div class="chips reveal d4">
        <span class="chip"><i>&#9889;</i> Go live in 7 days</span>
        <span class="chip"><i>&#128279;</i> Works with your existing forms &amp; portals</span>
        <span class="chip"><i>&#128737;</i> ISO 27001 &middot; GDPR-ready</span>
      </div>
      <div class="hero__cta reveal d5">
        <a href="#demo" class="btn btn-primary" id="magnet">Book a Free Demo <span class="arr">&rarr;</span><span class="shine"></span></a>
        <a href="https://getvidya.ai/" class="btn btn-ghost"><span class="play">&#9654;</span> Meet VidyaAI</a>
        <span class="cta-note">No credit card &middot; Personalised to your institution</span>
      </div>
      <div class="stats reveal d6">
        <div class="stat"><div class="stat__n"><span data-xhcount="500">0</span><em>+</em></div><div class="stat__l">Institutions onboard</div></div>
        <div class="stat"><div class="stat__n"><span data-xhcount="10">0</span><em>M+</em></div><div class="stat__l">Enquiries managed</div></div>
        <div class="stat"><div class="stat__n"><span data-xhcount="37">0</span><em>%</em></div><div class="stat__l">Higher conversions</div></div>
        <div class="stat"><div class="stat__n"><span data-xhcount="60">0</span><em>s</em></div><div class="stat__l">Avg. first response</div></div>
      </div>
    </div>
    <style>
      /* Exact same demo-form card as the product page (single-product.php) */
      #xhero .hero-form-aside{width:100%}
      #xhero .hero-form-card{position:relative;background:#fff;border:1px solid #EDF0F5;border-radius:26px;padding:clamp(26px,3vw,42px);box-shadow:0 30px 70px -20px rgba(25,51,93,.26)}
      #xhero .hero-form-card::after{content:'';position:absolute;inset:-1px;border-radius:inherit;padding:1px;pointer-events:none;background:linear-gradient(140deg,rgba(222,110,48,.5),transparent 40%,transparent 60%,rgba(25,51,93,.4));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.55}
      #xhero .hero-form-card::before{content:"Book a Free Demo";position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:linear-gradient(135deg,#E8843F 0%,#DE6E30 55%,#C2541C 100%);color:#fff;padding:7px 20px;border-radius:999px;font-weight:700;font-size:11px;letter-spacing:.04em;white-space:nowrap;box-shadow:0 18px 44px -14px rgba(222,110,48,.55)}
      #xhero .secure-label{text-align:center;margin-top:18px;font-size:10.5px;color:rgba(25,51,93,.5);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
      /* ── EE form-7 widget: force light theme + proper stacked layout (same as product page) ── */
      #ee-form-7 label{color:#19335D!important;font-weight:600!important;font-size:13px!important;margin-bottom:6px!important;display:block!important}
      #ee-form-7 input[type="text"],#ee-form-7 input[type="email"],#ee-form-7 input[type="tel"],#ee-form-7 input[type="url"],#ee-form-7 input[type="number"],#ee-form-7 select,#ee-form-7 textarea{background-color:#fff!important;color:#19335D!important;border:1px solid #e2e8f0!important;border-radius:10px!important;padding:12px 14px!important;font-size:14px!important;font-family:'Inter',sans-serif!important;width:100%!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s!important}
      #ee-form-7 input:focus,#ee-form-7 select:focus,#ee-form-7 textarea:focus{outline:none!important;border-color:#DE6E30!important;box-shadow:0 0 0 3px rgba(222,110,48,.12)!important}
      #ee-form-7 input::placeholder,#ee-form-7 textarea::placeholder{color:#94a3b8!important;opacity:1!important}
      #ee-form-7 input[type="submit"],#ee-form-7 button[type="submit"]{background-color:#DE6E30!important;color:#fff!important;border:none!important;border-radius:12px!important;padding:14px 28px!important;font-size:15px!important;font-weight:700!important;font-family:'Inter',sans-serif!important;width:100%!important;cursor:pointer!important;transition:all .3s!important;box-shadow:0 8px 20px rgba(222,110,48,.25)!important}
      #ee-form-7 input[type="submit"]:hover,#ee-form-7 button[type="submit"]:hover{background-color:#c85d20!important;transform:translateY(-2px)!important;box-shadow:0 12px 28px rgba(222,110,48,.35)!important}
      #ee-form-7 .iti,#ee-form-7 .iti__country-list{background-color:#fff!important;color:#19335D!important}
      #ee-form-7 .iti{width:100%!important;display:block!important;position:relative}
      #ee-form-7 .iti input[type="tel"]{padding-left:78px!important;width:100%!important}
      #ee-form-7 .iti__flag-container{position:absolute!important;top:0;bottom:0;left:0;z-index:2;display:flex!important;align-items:center}
      #ee-form-7 .iti__selected-flag{height:100%!important;padding:0 8px 0 14px!important;background:transparent!important;border-right:1px solid rgba(25,51,93,.10)!important;display:flex!important;align-items:center;gap:6px}
      #ee-form-7 .iti__selected-dial-code{color:#19335D!important;font-weight:700;font-size:.95rem}
      #ee-form-7 .iti__arrow{margin-left:4px!important}
      #ee-form-7 form>div{margin-bottom:12px!important}
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
/* ===================== HERO — brand edition (scoped IIFE) ===================== */
(function(){
const $=s=>document.querySelector(s);
const reduced=matchMedia('(prefers-reduced-motion: reduce)').matches;

/* 1. WebGL wisps */
(function(){
  const cv=$('#glsl'); if(!cv) return; if(reduced){cv.remove();return}
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
     think:['Intent detected: Admission · B.Tech CSE','Eligibility & late-window policy checked','Scored 92/100 — high intent, hot region'],
     reply:'Good news, Riya — late applications close Friday! I’ve reserved your slot and sent the form. Want help with documents?',
     acts:['📅 Call auto-booked · tom 11:00','📄 Application link sent','🔥 Routed to Priya · CSE desk'],score:92,name:'Riya S.'},
    {chan:'INSTAGRAM DM',who:'Arjun M. · Jaipur · 09:12',msg:'What’s the fee for MBA and do you offer scholarships?',
     think:['Intent detected: Fees + Scholarship · MBA','Merit-scholarship matrix matched','Scored 78/100 — needs nurturing'],
     reply:'Hi Arjun! MBA fees start at ₹4.2L/yr — and you may qualify for up to 40% merit scholarship. Shall I check your eligibility in 2 minutes?',
     acts:['🎓 Scholarship quiz sent','✉️ Brochure delivered','📊 Added to MBA nurture journey'],score:78,name:'Arjun M.'},
    {chan:'WEBSITE FORM',who:'Fatima K. · Dubai · 17:55',msg:'Interested in B.Sc Nursing for my daughter. Is hostel available for international students?',
     think:['Intent detected: Parent enquiry · Intl','Hostel + visa docs retrieved','Scored 88/100 — decision-maker'],
     reply:'Absolutely, Fatima — we have secure girls’ hostels with airport pickup for international students. I’ve emailed the parent guide. Prefer a call this week?',
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
<style id="trusted-institutions-style">
#trusted-institutions{
  --font-h:'Poppins',sans-serif;
  padding:10px 0;background:#fff;font-family:'Inter',sans-serif;overflow:hidden;
  border-top:1px solid rgba(25,51,93,.08);border-bottom:1px solid rgba(25,51,93,.08);
}
#trusted-institutions .logo-header{max-width:780px;margin:0 auto 18px;text-align:center;padding:0 24px}
#trusted-institutions .logo-badge{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#DE6E30;background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px;margin-bottom:12px}
#trusted-institutions .logo-title{font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(23px,3.4vw,40px);line-height:1.12;letter-spacing:-.02em;color:#19335D;margin:4px 0 10px}
#trusted-institutions .logo-sub{font-size:clamp(14.5px,1.6vw,17px);line-height:1.6;color:rgba(25,51,93,.66);max-width:640px;margin:0 auto}
#trusted-institutions .logo-sub strong{color:#19335D;font-weight:700}

#trusted-institutions .marquee-wrap{overflow:hidden;padding:6px 0;-webkit-mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)}
#trusted-institutions .marquee-track{display:flex;gap:26px;width:max-content;align-items:center;will-change:transform}
#trusted-institutions .marquee-left{animation:ti-scroll-l 45s linear infinite}
#trusted-institutions .marquee-right{animation:ti-scroll-r 45s linear infinite}
#trusted-institutions .marquee-wrap:hover .marquee-track{animation-play-state:paused}
@keyframes ti-scroll-l{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@keyframes ti-scroll-r{from{transform:translateX(-50%)}to{transform:translateX(0)}}

#trusted-institutions .logo-card{flex:none;width:170px;height:86px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:grid;place-items:center;padding:16px;transition:.3s}
#trusted-institutions .logo-card:hover{border-color:#DE6E30;transform:translateY(-4px)}
#trusted-institutions .logo-card img{max-height:54px;width:auto;object-fit:contain;filter:grayscale(100%);opacity:.7;transition:.3s}
#trusted-institutions .logo-card:hover img{filter:none;opacity:1}

#trusted-institutions .logo-footer{display:flex;flex-direction:column;align-items:center;gap:13px;margin-top:18px;padding:0 24px;text-align:center}
#trusted-institutions .btn-primary{display:inline-flex;align-items:center;gap:8px;background:#DE6E30;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:99px;text-decoration:none;box-shadow:0 8px 24px rgba(222,110,48,.28);transition:.25s}
#trusted-institutions .btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 30px rgba(222,110,48,.36)}
#trusted-institutions .live-indicator{display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:rgba(25,51,93,.7)}
#trusted-institutions .green-dot{width:9px;height:9px;border-radius:50%;background:#22c55e;box-shadow:0 0 0 0 rgba(34,197,94,.5);animation:ti-pulse 1.8s infinite}
@keyframes ti-pulse{0%{box-shadow:0 0 0 0 rgba(34,197,94,.5)}70%{box-shadow:0 0 0 9px rgba(34,197,94,0)}100%{box-shadow:0 0 0 0 rgba(34,197,94,0)}}
.section-divider{height:1px;background:linear-gradient(90deg,transparent,rgba(25,51,93,.12),transparent);max-width:1240px;margin:0 auto}

@media (prefers-reduced-motion:reduce){#trusted-institutions .marquee-track,#trusted-institutions .green-dot{animation:none}}
@media (max-width:600px){#trusted-institutions .logo-card{width:132px;height:72px;padding:12px}#trusted-institutions .logo-card img{max-height:44px}}
</style>
<!-- ═══ LOGO MARQUEE ═══ -->

<!-- ===================== VIDYAAI FILM · full-width feature ===================== -->
<style>
  #vidya-film{padding:66px 0 70px;background:linear-gradient(180deg,#ffffff,#f6f8fb)}
  #vidya-film .vf-wrap{max-width:1320px;margin:0 auto;padding:0 24px}
  #vidya-film .vf-head{text-align:center;max-width:760px;margin:0 auto 34px}
  #vidya-film .vf-eyebrow{display:inline-flex;align-items:center;gap:8px;font:700 12.5px/1 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:#DE6E30;margin-bottom:14px}
  #vidya-film .vf-eyebrow i{width:8px;height:8px;border-radius:50%;background:#DE6E30;display:inline-block}
  #vidya-film .vf-head h2{font-family:'Inter',sans-serif;font-weight:800;font-size:clamp(26px,3.4vw,42px);letter-spacing:-.02em;line-height:1.1;color:#19335D;margin:0 0 12px}
  #vidya-film .vf-head p{color:rgba(25,51,93,.6);font-size:clamp(15px,1.6vw,18px);margin:0;line-height:1.6}
  #vidya-film .vf-frame{position:relative;width:100%;border-radius:24px;overflow:hidden;
    box-shadow:0 54px 120px rgba(25,51,93,.26),0 0 0 1px rgba(25,51,93,.07);border:1px solid rgba(25,51,93,.10);background:#eef1f5}
  #vidya-film .hero-film__frame{display:block;width:100%;aspect-ratio:16/9;border:0;background:#eef1f5}
  @media(max-width:560px){#vidya-film{padding:46px 0 50px}#vidya-film .vf-wrap{padding:0 16px}}
</style>
<section id="vidya-film" aria-label="VidyaAI — Admission Intelligence film">
  <div class="vf-wrap">
    <div class="vf-head">
      <span class="vf-eyebrow"><i></i> See VidyaAI in action</span>
      <h2>Watch VidyaAI run your admissions — live</h2>
      <p>From the first enquiry to enrolled: every lead answered, qualified and followed up automatically, 24/7.</p>
    </div>
    <div class="vf-frame">
            <iframe class="hero-film__frame" title="VidyaAI — Admission Intelligence film" loading="eager" scrolling="no" frameborder="0" sandbox="allow-scripts allow-same-origin allow-popups" srcdoc="<!DOCTYPE html>
<html lang=&quot;en&quot;>
<head>
<meta charset=&quot;UTF-8&quot;>
<meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;>
<title>Vidya AI — Admission Intelligence | Hero Film</title>
<meta name=&quot;description&quot; content=&quot;Vidya AI — the AI operating system that runs admissions. Every lead answered instantly, qualified, and enrolled. Cinematic hero film.&quot;>
<link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot;>
<link rel=&quot;preconnect&quot; href=&quot;https://fonts.gstatic.com&quot; crossorigin>
<link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap&quot; rel=&quot;stylesheet&quot;>
<style>
/* =================================================================
   VIDYA AI — HERO FILM
   Brand system (STRICTLY FOLLOWED):
     • Background : #FFFFFF (pure white, light-mode SaaS)
     • Brand blue : #19335D  (structure, AI, data, headings)
     • Accent     : #DE6E30  (CTA, hot leads, active states, glow)
     • Type       : Inter only
   Aesthetic    : Apple × HubSpot × OpenAI (light). Soft shadows,
                  glassmorphism (subtle), generous whitespace.
   Behaviour    : Autoplay, seamless loop, ~28s, scene-directed.
   ================================================================= */

:root{
  --blue:#19335D;
  --blue-700:#22467c;
  --blue-200:rgba(25,51,93,.14);
  --blue-50:rgba(25,51,93,.045);
  --orange:#DE6E30;
  --orange-soft:rgba(222,110,48,.12);
  --ink:#19335D;
  --muted:rgba(25,51,93,.58);
  --line:rgba(25,51,93,.10);
  --white:#ffffff;
  --shadow-sm:0 6px 20px rgba(25,51,93,.07);
  --shadow:0 18px 50px rgba(25,51,93,.12);
  --shadow-lg:0 30px 80px rgba(25,51,93,.16);
  --r:20px;
  --ease:cubic-bezier(.2,.7,.2,1);
}

*{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%}
body{
  font-family:'Inter',system-ui,-apple-system,sans-serif;
  background:#eef1f5;
  color:var(--ink);
  -webkit-font-smoothing:antialiased;
  display:grid;place-items:center;
  min-height:100vh;min-height:100dvh;
  padding:0;overflow:hidden;
}

/* ---- The film frame (fixed 16:9 canvas, scaled to fit any device) ---- */
.stage{
  position:relative;
  width:1280px;height:720px;
  transform-origin:center center;
  will-change:transform;
  background:var(--white);
  border-radius:26px;
  overflow:hidden;
  box-shadow:0 50px 120px rgba(25,51,93,.22);
  isolation:isolate;
}
/* soft ambient depth — never dark, just airy blue light */
.stage::before{
  content:&quot;&quot;;position:absolute;inset:0;z-index:0;pointer-events:none;
  background:
    radial-gradient(900px 600px at 80% -10%, rgba(222,110,48,.06), transparent 60%),
    radial-gradient(1000px 700px at 10% 110%, rgba(25,51,93,.06), transparent 60%),
    linear-gradient(180deg,#ffffff 0%,#f6f8fb 100%);
}
/* faint enterprise grid for depth */
.stage::after{
  content:&quot;&quot;;position:absolute;inset:0;z-index:0;pointer-events:none;opacity:.5;
  background-image:
    linear-gradient(rgba(25,51,93,.035) 1px,transparent 1px),
    linear-gradient(90deg,rgba(25,51,93,.035) 1px,transparent 1px);
  background-size:46px 46px;
  -webkit-mask-image:radial-gradient(circle at 50% 45%,#000 30%,transparent 75%);
          mask-image:radial-gradient(circle at 50% 45%,#000 30%,transparent 75%);
}

/* ---- Scene base ---- */
.scene{
  position:absolute;inset:0;z-index:1;
  display:none;
  align-items:center;justify-content:center;
  padding:54px 6% 128px;            /* bottom safe-area clears caption + player */
  opacity:0;
}
.scene.active{display:flex;animation:sceneIn .6s var(--ease) forwards}
.scene.leaving{animation:sceneOut .45s var(--ease) forwards}
@keyframes sceneIn{from{opacity:0;transform:scale(.992)}to{opacity:1;transform:none}}
@keyframes sceneOut{from{opacity:1}to{opacity:0;transform:scale(1.006)}}

/* ---- Reusable atoms ---- */
.eyebrow{
  display:inline-flex;align-items:center;gap:9px;
  font-size:12px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;
  color:var(--blue);background:var(--white);
  border:1px solid var(--line);border-radius:999px;
  padding:8px 16px;box-shadow:var(--shadow-sm);
}
.dot{width:8px;height:8px;border-radius:50%;background:var(--orange);
  box-shadow:0 0 0 0 rgba(222,110,48,.5);animation:pulse 1.8s infinite}
@keyframes pulse{0%{box-shadow:0 0 0 0 rgba(222,110,48,.45)}70%{box-shadow:0 0 0 10px rgba(222,110,48,0)}100%{box-shadow:0 0 0 0 rgba(222,110,48,0)}}

.card{
  background:rgba(255,255,255,.72);
  backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);
  border:1px solid var(--line);
  border-radius:var(--r);
  box-shadow:var(--shadow);
}

/* fade/rise helper driven by parent .active */
.rise{opacity:0;transform:translateY(16px)}
.scene.active .rise{animation:rise .7s var(--ease) forwards}
@keyframes rise{to{opacity:1;transform:none}}
/* centered variant — preserves translate(-50%,-50%) anchoring */
@keyframes riseC{from{opacity:0;transform:translate(-50%,-50%) scale(.7)}
  to{opacity:1;transform:translate(-50%,-50%) scale(1)}}

/* =================================================================
   SCENE 0 — OPENING : pulse → enquiry → particles → AI Core
   ================================================================= */
#s0{flex-direction:column;gap:34px;text-align:center}
.core-wrap{position:relative;width:300px;height:300px;display:grid;place-items:center}
/* the AI Core */
.core{
  position:relative;width:128px;height:128px;border-radius:50%;
  background:radial-gradient(circle at 35% 30%,#2a4d85,#19335D 70%);
  box-shadow:0 24px 60px rgba(25,51,93,.35),inset 0 0 30px rgba(255,255,255,.15);
  display:grid;place-items:center;color:#fff;
  opacity:0;transform:scale(.2);
}
.scene.active .core{animation:coreIn 1s var(--ease) .5s forwards}
@keyframes coreIn{0%{opacity:0;transform:scale(.2)}60%{opacity:1}100%{opacity:1;transform:scale(1)}}
.core b{font-size:34px;font-weight:800;letter-spacing:-1px}
.core::after{/* breathing halo */
  content:&quot;&quot;;position:absolute;inset:-22px;border-radius:50%;
  border:1.5px solid rgba(25,51,93,.18);
}
/* opening shot shows the real brand logo on a soft white card */
#s0 .core{width:auto;height:auto;min-width:0;padding:22px 30px;border-radius:26px;
  background:radial-gradient(circle at 50% 30%,#ffffff,#eef2f8);
  box-shadow:0 26px 60px rgba(25,51,93,.18),inset 0 0 0 1px rgba(25,51,93,.06)}
#s0 .core::after{inset:-16px;border-radius:34px}
#s0 .core .vmark{width:66px;height:66px}
#s0 .core .eelogo__img{height:46px}
/* rotating orbit rings around the core */
.ring{position:absolute;inset:0;margin:auto;border-radius:50%;border:1.5px solid var(--blue-200);opacity:0}
.ring.r1{width:200px;height:200px}
.ring.r2{width:264px;height:264px;border-style:dashed}
.scene.active .ring{animation:ringIn .8s var(--ease) 1s forwards,spin 18s linear 1s infinite}
.scene.active .ring.r2{animation:ringIn .8s var(--ease) 1.1s forwards,spinR 26s linear 1.1s infinite}
@keyframes ringIn{to{opacity:1}}
@keyframes spin{to{transform:rotate(360deg)}}
@keyframes spinR{to{transform:rotate(-360deg)}}
/* orbiting accent node */
.orbit-node{position:absolute;top:50%;left:50%;width:200px;height:200px;margin:-100px;opacity:0}
.scene.active .orbit-node{animation:ringIn .6s 1.2s forwards,spin 18s linear 1.2s infinite}
.orbit-node i{position:absolute;top:-6px;left:50%;width:12px;height:12px;margin-left:-6px;border-radius:50%;
  background:var(--orange);box-shadow:0 0 14px rgba(222,110,48,.6)}
/* the very first pulse + enquiry chip */
.seed{
  position:absolute;top:50%;left:50%;margin:-7px;width:14px;height:14px;border-radius:50%;background:var(--orange);
  box-shadow:0 0 0 0 rgba(222,110,48,.6);
}
.scene.active .seed{animation:seedPulse 1.4s ease-out forwards}
@keyframes seedPulse{
  0%{transform:scale(.4);opacity:0}
  18%{opacity:1}
  40%{box-shadow:0 0 0 26px rgba(222,110,48,0)}
  60%{transform:scale(1);opacity:1}
  100%{transform:scale(.2);opacity:0}
}
/* data particles streaming inward */
.particles i{
  position:absolute;top:50%;left:50%;width:6px;height:6px;border-radius:50%;
  background:var(--blue);opacity:0;
}
.scene.active .particles i{animation:flowIn 1.4s ease-in forwards}
@keyframes flowIn{
  0%{opacity:0;transform:translate(var(--x),var(--y)) scale(.4)}
  25%{opacity:.9}
  100%{opacity:0;transform:translate(0,0) scale(.6)}
}
.s0-head{font-size:clamp(28px,2vw,52px);font-weight:800;letter-spacing:-1.6px;line-height:1.04}
.s0-head .ax{color:var(--orange)}
.s0-sub{font-size:clamp(13px,1.5vw,17px);color:var(--muted);font-weight:500;max-width:560px;line-height:1.6}
.scene.active .d1{animation-delay:1.6s}
.scene.active .d2{animation-delay:1.85s}

/* =================================================================
   SCENE 2 — MULTI-CHANNEL INTAKE
   ================================================================= */
#s2{flex-direction:column;gap:30px}
.s2-top{display:flex;align-items:center;justify-content:space-between;width:100%;max-width:1040px}
.s2-stats{display:flex;gap:14px}
.stat-chip{display:flex;flex-direction:column;gap:2px;padding:12px 18px;border-radius:14px;
  background:var(--white);border:1px solid var(--line);box-shadow:var(--shadow-sm);min-width:120px}
.stat-chip .n{font-size:22px;font-weight:800;letter-spacing:-.5px}
.stat-chip .n.hot{color:var(--orange)}
.stat-chip .l{font-size:11px;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:.06em}
.netviz{position:relative;width:100%;max-width:1040px;height:46%;display:grid;place-items:center}
.channels{position:absolute;inset:0}
.chan{
  position:absolute;display:flex;align-items:center;gap:10px;
  padding:7px 18px 7px 7px;border-radius:999px;background:var(--white);
  border:1px solid var(--line);box-shadow:var(--shadow-sm);
  font-size:14px;font-weight:600;color:var(--blue);
  transform:translate(-50%,-50%) scale(.7);opacity:0;white-space:nowrap;
}
.scene.active .chan{animation:riseC .6s var(--ease) forwards}
.chan .g{width:9px;height:9px;border-radius:3px;background:var(--blue)}
.chan.on .g{background:var(--orange)}
.hub{position:relative;width:96px;height:96px;border-radius:50%;z-index:3;
  background:radial-gradient(circle at 35% 30%,#2a4d85,#19335D 72%);color:#fff;
  display:grid;place-items:center;font-weight:800;box-shadow:var(--shadow-lg)}
.hub small{font-size:11px;opacity:.85;font-weight:600}
.hub b{font-size:15px}
/* animated lead pulses traveling along lines */
.lead-pulse{position:absolute;top:50%;left:50%;width:9px;height:9px;border-radius:50%;
  background:var(--orange);box-shadow:0 0 10px rgba(222,110,48,.55);opacity:0}
.scene.active .lead-pulse{animation:travel 1.8s ease-in-out infinite}
@keyframes travel{0%{opacity:0;transform:translate(var(--fx),var(--fy)) scale(.5)}
  15%{opacity:1}85%{opacity:1}100%{opacity:0;transform:translate(0,0) scale(.7)}}
#netlines{position:absolute;inset:0;width:100%;height:100%;overflow:visible}
.netviz svg line{stroke:var(--blue-200);stroke-width:1.4;stroke-dasharray:5 7;opacity:0}
.scene.active .netviz svg line{animation:lineDraw .8s ease forwards .2s,dash 1.4s linear infinite .8s}
@keyframes lineDraw{to{opacity:1}}
@keyframes dash{to{stroke-dashoffset:-24}}
.section-eyebrow{position:absolute;top:6%;right:7%;left:auto}

/* =================================================================
   SCENE 3 — AI REASONING ENGINE
   ================================================================= */
#s3{flex-direction:column;gap:26px}
.s3-grid{display:grid;grid-template-columns:1fr auto;gap:38px;align-items:center;width:100%;max-width:1000px}
.reason-cloud{position:relative;display:flex;flex-wrap:wrap;gap:12px;max-width:560px}
.kw{padding:10px 16px;border-radius:12px;background:var(--white);border:1px solid var(--line);
  box-shadow:var(--shadow-sm);font-size:14px;font-weight:600;color:var(--blue);opacity:0;transform:translateY(10px)}
.scene.active .kw{animation:rise .55s var(--ease) forwards}
.kw .pct{color:var(--orange);font-weight:800;margin-left:8px}
.verdict{display:flex;flex-direction:column;align-items:center;gap:10px;padding:32px 38px;
  border-radius:24px;background:var(--blue);color:#fff;box-shadow:var(--shadow-lg);min-width:220px;
  opacity:0;transform:scale(.9)}
.scene.active .verdict{animation:pop .7s var(--ease) 1.7s forwards}
@keyframes pop{0%{opacity:0;transform:scale(.9)}60%{transform:scale(1.03)}100%{opacity:1;transform:scale(1)}}
.verdict .label{font-size:12px;letter-spacing:.18em;font-weight:700;text-transform:uppercase;opacity:.8}
.verdict .big{font-size:54px;font-weight:800;letter-spacing:-2px;line-height:1}
.verdict .tag{display:inline-flex;align-items:center;gap:8px;background:var(--orange);
  padding:7px 16px;border-radius:999px;font-size:13px;font-weight:700}
.ms-note{font-size:13px;color:var(--muted);font-weight:500}

/* =================================================================
   SCENE 4/5/6 — LIVE STUDENT CASES (chat + action chain)
   ================================================================= */
.case{display:grid;grid-template-columns:1.05fr .95fr;gap:34px;align-items:center;width:100%;max-width:1000px}
.phone{
  background:var(--white);border:1px solid var(--line);border-radius:26px;
  box-shadow:var(--shadow-lg);overflow:hidden;
}
.phone-head{display:flex;align-items:center;gap:12px;padding:16px 20px;border-bottom:1px solid var(--line)}
.avatar{width:42px;height:42px;border-radius:50%;display:grid;place-items:center;color:#fff;
  font-weight:800;background:linear-gradient(135deg,#2a4d85,#19335D)}
.avatar.alt{background:linear-gradient(135deg,#e98a52,#DE6E30)}
.who{display:flex;flex-direction:column;line-height:1.2}
.who b{font-size:15px}
.who span{font-size:12px;color:var(--muted);display:flex;align-items:center;gap:6px}
.chan-pill{margin-left:auto;font-size:11px;font-weight:700;color:var(--blue);
  background:var(--blue-50);border:1px solid var(--line);padding:5px 11px;border-radius:999px;
  display:inline-flex;align-items:center;gap:6px}
.chat{padding:20px;display:flex;flex-direction:column;gap:12px;min-height:240px}
.bubble{max-width:84%;padding:12px 15px;font-size:14px;line-height:1.5;border-radius:16px;
  opacity:0;transform:translateY(10px)}
.scene.active .bubble{animation:rise .5s var(--ease) forwards}
.bubble.in{align-self:flex-start;background:#f1f4f8;border:1px solid var(--line);border-bottom-left-radius:5px}
.bubble.ai{align-self:flex-end;color:#fff;background:linear-gradient(135deg,#22467c,#19335D);border-bottom-right-radius:5px}
/* analysis + action side */
.case-side{display:flex;flex-direction:column;gap:14px}
.case-side h4{font-size:13px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}
.overlay-list{display:flex;flex-direction:column;gap:9px}
.ov{display:flex;align-items:center;gap:11px;padding:11px 15px;border-radius:13px;
  background:var(--white);border:1px solid var(--line);box-shadow:var(--shadow-sm);
  font-size:14px;font-weight:600;color:var(--blue);opacity:0;transform:translateX(14px)}
.scene.active .ov{animation:slideIn .55s var(--ease) forwards}
@keyframes slideIn{to{opacity:1;transform:none}}
.ov .tick{flex:0 0 auto;width:22px;height:22px;border-radius:50%;background:var(--blue);
  display:grid;place-items:center;color:#fff;font-size:12px}
.ov.accent{border-color:rgba(222,110,48,.4);background:var(--orange-soft)}
.ov.accent .tick{background:var(--orange)}
.ov .val{margin-left:auto;font-weight:800;color:var(--orange)}
.case-eyebrow{position:absolute;top:6%;right:7%;left:auto}

/* =================================================================
   SCENE 7 — AUTOPILOT FUNNEL
   ================================================================= */
#s7{flex-direction:column;gap:30px}
.funnel{display:flex;align-items:center;gap:6px;flex-wrap:nowrap;justify-content:center;max-width:100%}
.fstep{position:relative;padding:11px 14px;border-radius:13px;background:var(--white);
  border:1px solid var(--line);box-shadow:var(--shadow-sm);font-size:13.5px;font-weight:700;color:var(--blue);
  opacity:.35;transform:translateY(8px);display:inline-flex;align-items:center;gap:7px;white-space:nowrap}
.scene.active .fstep{animation:funnelLight .5s var(--ease) forwards}
@keyframes funnelLight{to{opacity:1;transform:none;box-shadow:0 14px 36px rgba(25,51,93,.16);
  border-color:rgba(222,110,48,.45)}}
.farrow{color:var(--blue-200);font-size:15px;font-weight:800;opacity:0;flex:0 0 auto}
.scene.active .farrow{animation:rise .4s forwards}
.enrolled{display:flex;flex-direction:column;align-items:center;gap:6px;opacity:0;transform:scale(.85)}
.scene.active .enrolled{animation:pop .7s var(--ease) 2.4s forwards}
.enrolled .badge{font-size:clamp(34px,5vw,60px);font-weight:800;letter-spacing:-2px;color:var(--orange)}
.enrolled .sub{font-size:13px;font-weight:600;color:var(--muted);letter-spacing:.16em;text-transform:uppercase}

/* =================================================================
   SCENE 8 — BUSINESS IMPACT METRICS
   ================================================================= */
#s8{flex-direction:column;gap:34px}
.metrics{display:grid;grid-template-columns:repeat(5,1fr);gap:16px;width:100%;max-width:1080px}
.metric{padding:26px 18px;border-radius:18px;background:var(--white);border:1px solid var(--line);
  box-shadow:var(--shadow);text-align:center;opacity:0;transform:translateY(18px)}
.scene.active .metric{animation:rise .6s var(--ease) forwards}
.metric .v{font-size:clamp(24px,3vw,38px);font-weight:800;letter-spacing:-1.5px;line-height:1;color:var(--blue)}
.metric .v.accent{color:var(--orange)}
.metric .l{margin-top:9px;font-size:12px;font-weight:600;color:var(--muted);line-height:1.35}

/* =================================================================
   SCENE 9 — PRODUCT ECOSYSTEM (orbiting modules)
   ================================================================= */
#s9{flex-direction:column;gap:18px}
.ecosystem{position:relative;width:min(560px,80%);aspect-ratio:1;display:grid;place-items:center}
.eco-core{width:120px;height:120px;border-radius:50%;color:#fff;display:grid;place-items:center;text-align:center;
  background:radial-gradient(circle at 35% 30%,#2a4d85,#19335D 72%);box-shadow:var(--shadow-lg);z-index:3}
.eco-core b{font-size:20px;letter-spacing:-.5px}.eco-core small{font-size:10px;opacity:.85;letter-spacing:.12em}
.eco-ring{position:absolute;inset:0;margin:auto;border-radius:50%;border:1px dashed var(--blue-200);opacity:0}
.eco-ring.a{width:78%;height:78%}.eco-ring.b{width:100%;height:100%}
.scene.active .eco-ring.a{animation:ringIn .6s .2s forwards,spin 30s linear .2s infinite}
.scene.active .eco-ring.b{animation:ringIn .6s .3s forwards,spinR 40s linear .3s infinite}
.mod{position:absolute;display:flex;align-items:center;gap:8px;padding:9px 14px;border-radius:999px;
  background:var(--white);border:1px solid var(--line);box-shadow:var(--shadow-sm);
  font-size:12.5px;font-weight:600;color:var(--blue);white-space:nowrap;
  transform:translate(-50%,-50%) scale(.7);opacity:0}
.scene.active .mod{animation:riseC .5s var(--ease) forwards}
.mod .emo{font-size:14px}

/* =================================================================
   FINAL SHOT — logo convergence + CTA + light sweep
   ================================================================= */
#sf{flex-direction:column;gap:26px;text-align:center}
.logo-final{display:flex;align-items:center;gap:16px;opacity:0;transform:scale(.9)}
.scene.active .logo-final{animation:pop .8s var(--ease) .2s forwards}
.logo-mark{width:64px;height:64px;border-radius:18px;display:grid;place-items:center;color:#fff;
  font-size:30px;font-weight:800;background:radial-gradient(circle at 35% 30%,#2a4d85,#19335D 72%);
  box-shadow:var(--shadow-lg)}
.logo-word{font-size:42px;font-weight:800;letter-spacing:-1.5px}
.logo-word .ax{color:var(--orange)}
.final-head{font-size:clamp(26px,3.6vw,46px);font-weight:800;letter-spacing:-1.4px;line-height:1.06;max-width:760px}
.final-sub{font-size:clamp(13px,1.5vw,17px);color:var(--muted);font-weight:500;line-height:1.6}
.final-sub b{color:var(--blue);font-weight:700}
.cta{display:inline-flex;align-items:center;gap:10px;background:var(--orange);color:#fff;
  font-size:17px;font-weight:700;padding:16px 32px;border-radius:14px;text-decoration:none;
  box-shadow:0 18px 40px rgba(222,110,48,.35)}
.cta .arw{transition:transform .3s}
/* light sweep across the whole final scene */
.sweep{position:absolute;inset:0;z-index:5;pointer-events:none;opacity:0;
  background:linear-gradient(105deg,transparent 35%,rgba(255,255,255,.85) 50%,transparent 65%);
  transform:translateX(-120%)}
.scene.active .sweep{animation:sweep 1.3s var(--ease) 2.6s forwards}
@keyframes sweep{0%{opacity:0;transform:translateX(-120%)}10%{opacity:1}100%{opacity:0;transform:translateX(120%)}}

/* ---- inline icon system (currentColor strokes) ---- */
.ic{width:1em;height:1em;display:block;fill:none;stroke:currentColor;stroke-width:2;
  stroke-linecap:round;stroke-linejoin:round;flex:0 0 auto}
.ic--fill{fill:currentColor;stroke:none}

.brandtag{position:absolute;z-index:9;top:20px;left:24px;display:flex;align-items:center;gap:10px}
/* brand logo mark + gradient wordmark (matches supplied asset) */
.vmark{display:block;filter:drop-shadow(0 3px 8px rgba(25,51,93,.12))}
.vword{font-family:'Inter',sans-serif;font-weight:800;letter-spacing:-.5px;line-height:1;
  background:linear-gradient(90deg,#FF8A3D,#EC4899 42%,#A855F7 72%,#EC4899);
  -webkit-background-clip:text;background-clip:text;color:transparent}
/* official ExtraaEdge brand logo (loads from URL; falls back to mark if blocked) */
.eelogo{display:inline-flex;align-items:center}
.eelogo__img{display:none;width:auto;filter:drop-shadow(0 3px 8px rgba(25,51,93,.10))}
.eelogo__img.ok{display:block}

/* contextual icons in scene content */
/* channel icons sit in a neat circular badge — clearly visible &amp; aligned */
.chan-ic{flex:0 0 auto;width:34px;height:34px;border-radius:50%;
  display:inline-flex;align-items:center;justify-content:center;
  background:var(--blue-50);color:var(--blue)}
.chan-ic .ic{width:19px;height:19px;color:inherit;flex:0 0 auto}
.chan.on .chan-ic{background:var(--orange-soft);color:var(--orange)}
.mod .ic{width:15px;height:15px;color:var(--orange)}
.ov .tick .ic{width:13px;height:13px;color:#fff}
.chan-pill .ic{width:13px;height:13px;color:var(--blue)}
.fstep .ic{width:15px;height:15px;color:var(--orange)}
.metric .mic{width:42px;height:42px;border-radius:13px;background:var(--blue-50);
  display:grid;place-items:center;margin:0 auto 13px}
.metric .mic .ic{width:21px;height:21px;color:var(--blue)}
.cta .ic{width:18px;height:18px;color:#fff}

/* explanatory caption bar (sits above the player) */
.caption{position:absolute;z-index:9;left:50%;bottom:92px;transform:translateX(-50%) translateY(8px);
  display:inline-flex;align-items:center;gap:11px;max-width:84%;
  font-size:17px;font-weight:600;color:var(--blue);text-align:center;
  background:rgba(255,255,255,.74);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
  border:1px solid var(--line);padding:11px 24px;border-radius:999px;box-shadow:var(--shadow-sm);
  opacity:0;transition:opacity .45s var(--ease),transform .45s var(--ease)}
.caption.show{opacity:1;transform:translateX(-50%) translateY(0)}
.caption .cdot{flex:0 0 auto;width:8px;height:8px;border-radius:50%;background:var(--orange);
  box-shadow:0 0 0 0 rgba(222,110,48,.5);animation:pulse 1.8s infinite}

/* ---- modern player control bar ---- */
.controls{position:absolute;z-index:10;left:50%;bottom:20px;transform:translateX(-50%);
  display:flex;align-items:center;gap:12px;width:min(720px,86%);
  background:rgba(255,255,255,.80);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
  border:1px solid var(--line);border-radius:999px;padding:9px 16px;box-shadow:var(--shadow)}
.cbtn{flex:0 0 auto;width:34px;height:34px;border-radius:50%;border:none;cursor:pointer;
  display:grid;place-items:center;background:transparent;color:var(--blue);transition:background .2s,color .2s}
.cbtn:hover{background:var(--blue-50)}
.cbtn .ic{width:18px;height:18px;color:inherit}
#btnSound.on{color:var(--orange)}
.scrub{position:relative;flex:1;height:6px;border-radius:99px;background:var(--blue-200);cursor:pointer}
.scrub__fill{position:absolute;left:0;top:0;height:100%;width:0;border-radius:99px;background:var(--orange)}
.scrub__segs{position:absolute;inset:0;pointer-events:none}
.scrub__segs i{position:absolute;top:-1px;width:2px;height:8px;background:#fff;opacity:.85}
.time{flex:0 0 auto;font-size:12px;font-weight:600;color:var(--muted);
  font-variant-numeric:tabular-nums;min-width:78px;text-align:right}

/* paused state freezes all scene motion */
.stage.paused .scene,.stage.paused .scene *,
.stage.paused .scene *::before,.stage.paused .scene *::after{animation-play-state:paused!important}

@media (prefers-reduced-motion:reduce){
  *{animation-duration:.001s!important;animation-iteration-count:1!important}
}
</style>
</head>
<body>

<div class=&quot;stage&quot; id=&quot;stage&quot;>

  <!-- ===== brand logo gradients (defined once, referenced everywhere) ===== -->
  <svg width=&quot;0&quot; height=&quot;0&quot; style=&quot;position:absolute&quot; aria-hidden=&quot;true&quot;><defs>
    <linearGradient id=&quot;vg-main&quot; x1=&quot;0%&quot; y1=&quot;100%&quot; x2=&quot;100%&quot; y2=&quot;0%&quot;>
      <stop offset=&quot;0%&quot; stop-color=&quot;#FF8A3D&quot;/><stop offset=&quot;32%&quot; stop-color=&quot;#EC4899&quot;/>
      <stop offset=&quot;62%&quot; stop-color=&quot;#A855F7&quot;/><stop offset=&quot;100%&quot; stop-color=&quot;#22D3EE&quot;/>
    </linearGradient>
    <linearGradient id=&quot;vg-head&quot; x1=&quot;0%&quot; y1=&quot;0%&quot; x2=&quot;100%&quot; y2=&quot;100%&quot;>
      <stop offset=&quot;0%&quot; stop-color=&quot;#FB7185&quot;/><stop offset=&quot;100%&quot; stop-color=&quot;#EC4899&quot;/>
    </linearGradient>
    <linearGradient id=&quot;vg-star1&quot; x1=&quot;0%&quot; y1=&quot;0%&quot; x2=&quot;100%&quot; y2=&quot;100%&quot;>
      <stop offset=&quot;0%&quot; stop-color=&quot;#60A5FA&quot;/><stop offset=&quot;100%&quot; stop-color=&quot;#A855F7&quot;/>
    </linearGradient>
    <linearGradient id=&quot;vg-star2&quot; x1=&quot;0%&quot; y1=&quot;0%&quot; x2=&quot;100%&quot; y2=&quot;100%&quot;>
      <stop offset=&quot;0%&quot; stop-color=&quot;#F472B6&quot;/><stop offset=&quot;100%&quot; stop-color=&quot;#EC4899&quot;/>
    </linearGradient>
  </defs></svg>

  <!-- ===== icon sprite (inline, no CDN — strokes inherit currentColor) ===== -->
  <svg width=&quot;0&quot; height=&quot;0&quot; style=&quot;position:absolute&quot; aria-hidden=&quot;true&quot;><defs>
    <symbol id=&quot;ic-whatsapp&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8z&quot;/></symbol>
    <symbol id=&quot;ic-instagram&quot; viewBox=&quot;0 0 24 24&quot;><rect x=&quot;2&quot; y=&quot;2&quot; width=&quot;20&quot; height=&quot;20&quot; rx=&quot;5&quot;/><path d=&quot;M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z&quot;/><line x1=&quot;17.5&quot; y1=&quot;6.5&quot; x2=&quot;17.51&quot; y2=&quot;6.5&quot;/></symbol>
    <symbol id=&quot;ic-globe&quot; viewBox=&quot;0 0 24 24&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;10&quot;/><line x1=&quot;2&quot; y1=&quot;12&quot; x2=&quot;22&quot; y2=&quot;12&quot;/><path d=&quot;M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z&quot;/></symbol>
    <symbol id=&quot;ic-mail&quot; viewBox=&quot;0 0 24 24&quot;><rect x=&quot;2&quot; y=&quot;4&quot; width=&quot;20&quot; height=&quot;16&quot; rx=&quot;2&quot;/><path d=&quot;m22 6-10 7L2 6&quot;/></symbol>
    <symbol id=&quot;ic-phone&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z&quot;/></symbol>
    <symbol id=&quot;ic-facebook&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z&quot;/></symbol>
    <symbol id=&quot;ic-megaphone&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;m3 11 18-5v12L3 14v-3z&quot;/><path d=&quot;M11.6 16.8a3 3 0 1 1-5.8-1.6&quot;/></symbol>
    <symbol id=&quot;ic-book&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z&quot;/><path d=&quot;M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z&quot;/></symbol>
    <symbol id=&quot;ic-clock&quot; viewBox=&quot;0 0 24 24&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;10&quot;/><polyline points=&quot;12 6 12 12 16 14&quot;/></symbol>
    <symbol id=&quot;ic-zap&quot; viewBox=&quot;0 0 24 24&quot;><polygon points=&quot;13 2 3 14 12 14 11 22 21 10 12 10 13 2&quot;/></symbol>
    <symbol id=&quot;ic-trending&quot; viewBox=&quot;0 0 24 24&quot;><polyline points=&quot;23 6 13.5 15.5 8.5 10.5 1 18&quot;/><polyline points=&quot;17 6 23 6 23 12&quot;/></symbol>
    <symbol id=&quot;ic-send&quot; viewBox=&quot;0 0 24 24&quot;><line x1=&quot;22&quot; y1=&quot;2&quot; x2=&quot;11&quot; y2=&quot;13&quot;/><polygon points=&quot;22 2 15 22 11 13 2 9 22 2&quot;/></symbol>
    <symbol id=&quot;ic-calendar&quot; viewBox=&quot;0 0 24 24&quot;><rect x=&quot;3&quot; y=&quot;4&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot;/><line x1=&quot;16&quot; y1=&quot;2&quot; x2=&quot;16&quot; y2=&quot;6&quot;/><line x1=&quot;8&quot; y1=&quot;2&quot; x2=&quot;8&quot; y2=&quot;6&quot;/><line x1=&quot;3&quot; y1=&quot;10&quot; x2=&quot;21&quot; y2=&quot;10&quot;/></symbol>
    <symbol id=&quot;ic-user-check&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2&quot;/><circle cx=&quot;9&quot; cy=&quot;7&quot; r=&quot;4&quot;/><polyline points=&quot;16 11 18 13 22 9&quot;/></symbol>
    <symbol id=&quot;ic-award&quot; viewBox=&quot;0 0 24 24&quot;><circle cx=&quot;12&quot; cy=&quot;8&quot; r=&quot;6&quot;/><path d=&quot;M15.477 12.89 17 22l-5-3-5 3 1.523-9.11&quot;/></symbol>
    <symbol id=&quot;ic-check&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M22 11.08V12a10 10 0 1 1-5.93-9.14&quot;/><polyline points=&quot;22 4 12 14.01 9 11.01&quot;/></symbol>
    <symbol id=&quot;ic-file&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z&quot;/><polyline points=&quot;14 2 14 8 20 8&quot;/><line x1=&quot;16&quot; y1=&quot;13&quot; x2=&quot;8&quot; y2=&quot;13&quot;/><line x1=&quot;16&quot; y1=&quot;17&quot; x2=&quot;8&quot; y2=&quot;17&quot;/></symbol>
    <symbol id=&quot;ic-route&quot; viewBox=&quot;0 0 24 24&quot;><circle cx=&quot;6&quot; cy=&quot;19&quot; r=&quot;3&quot;/><path d=&quot;M9 19h8.5a3.5 3.5 0 0 0 0-7h-11a3.5 3.5 0 0 1 0-7H15&quot;/><circle cx=&quot;18&quot; cy=&quot;5&quot; r=&quot;3&quot;/></symbol>
    <symbol id=&quot;ic-home&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M3 9.5 12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z&quot;/></symbol>
    <symbol id=&quot;ic-plane&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.4-.1.9.3 1.2L8 11l-2 3-2.5-.5L2 15l3 2 2 3 1-1.5L7.5 16l3-2 2.8 4.3c.3.4.8.5 1.2.3l.5-.3c.4-.2.6-.6.5-1.1z&quot;/></symbol>
    <symbol id=&quot;ic-mic&quot; viewBox=&quot;0 0 24 24&quot;><rect x=&quot;9&quot; y=&quot;2&quot; width=&quot;6&quot; height=&quot;12&quot; rx=&quot;3&quot;/><path d=&quot;M19 10v2a7 7 0 0 1-14 0v-2&quot;/><line x1=&quot;12&quot; y1=&quot;19&quot; x2=&quot;12&quot; y2=&quot;23&quot;/><line x1=&quot;8&quot; y1=&quot;23&quot; x2=&quot;16&quot; y2=&quot;23&quot;/></symbol>
    <symbol id=&quot;ic-users&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2&quot;/><circle cx=&quot;9&quot; cy=&quot;7&quot; r=&quot;4&quot;/><path d=&quot;M23 21v-2a4 4 0 0 0-3-3.87&quot;/><path d=&quot;M16 3.13a4 4 0 0 1 0 7.75&quot;/></symbol>
    <symbol id=&quot;ic-user-plus&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2&quot;/><circle cx=&quot;9&quot; cy=&quot;7&quot; r=&quot;4&quot;/><line x1=&quot;19&quot; y1=&quot;8&quot; x2=&quot;19&quot; y2=&quot;14&quot;/><line x1=&quot;22&quot; y1=&quot;11&quot; x2=&quot;16&quot; y2=&quot;11&quot;/></symbol>
    <symbol id=&quot;ic-message&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z&quot;/></symbol>
    <symbol id=&quot;ic-clipboard&quot; viewBox=&quot;0 0 24 24&quot;><rect x=&quot;8&quot; y=&quot;2&quot; width=&quot;8&quot; height=&quot;4&quot; rx=&quot;1&quot;/><path d=&quot;M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2&quot;/></symbol>
    <symbol id=&quot;ic-funnel&quot; viewBox=&quot;0 0 24 24&quot;><polygon points=&quot;22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3&quot;/></symbol>
    <symbol id=&quot;ic-sparkles&quot; viewBox=&quot;0 0 24 24&quot;><path d=&quot;M12 3l1.8 4.7L18.5 9.5 13.8 11.3 12 16l-1.8-4.7L5.5 9.5l4.7-1.8z&quot;/><path d=&quot;M19 14l.6 1.6 1.6.6-1.6.6-.6 1.6-.6-1.6-1.6-.6 1.6-.6z&quot;/></symbol>
    <symbol id=&quot;ic-target&quot; viewBox=&quot;0 0 24 24&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;10&quot;/><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;6&quot;/><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;2&quot;/></symbol>
    <symbol id=&quot;ic-arrow-right&quot; viewBox=&quot;0 0 24 24&quot;><line x1=&quot;5&quot; y1=&quot;12&quot; x2=&quot;19&quot; y2=&quot;12&quot;/><polyline points=&quot;12 5 19 12 12 19&quot;/></symbol>
    <symbol id=&quot;ic-play&quot; viewBox=&quot;0 0 24 24&quot;><polygon points=&quot;6 4 20 12 6 20 6 4&quot;/></symbol>
    <symbol id=&quot;ic-pause&quot; viewBox=&quot;0 0 24 24&quot;><rect x=&quot;6&quot; y=&quot;4&quot; width=&quot;4&quot; height=&quot;16&quot; rx=&quot;1&quot;/><rect x=&quot;14&quot; y=&quot;4&quot; width=&quot;4&quot; height=&quot;16&quot; rx=&quot;1&quot;/></symbol>
    <symbol id=&quot;ic-replay&quot; viewBox=&quot;0 0 24 24&quot;><polyline points=&quot;1 4 1 10 7 10&quot;/><path d=&quot;M3.51 15a9 9 0 1 0 2.13-9.36L1 10&quot;/></symbol>
    <symbol id=&quot;ic-volume&quot; viewBox=&quot;0 0 24 24&quot;><polygon points=&quot;11 5 6 9 2 9 2 15 6 15 11 19 11 5&quot;/><path d=&quot;M15.54 8.46a5 5 0 0 1 0 7.07&quot;/><path d=&quot;M19.07 4.93a10 10 0 0 1 0 14.14&quot;/></symbol>
    <symbol id=&quot;ic-volume-x&quot; viewBox=&quot;0 0 24 24&quot;><polygon points=&quot;11 5 6 9 2 9 2 15 6 15 11 19 11 5&quot;/><line x1=&quot;23&quot; y1=&quot;9&quot; x2=&quot;17&quot; y2=&quot;15&quot;/><line x1=&quot;17&quot; y1=&quot;9&quot; x2=&quot;23&quot; y2=&quot;15&quot;/></symbol>
  </defs></svg>

  <!-- persistent overlay UI -->
  <div class=&quot;brandtag&quot;>
    <span class=&quot;eelogo&quot;>
      <span class=&quot;eelogo__fb&quot; style=&quot;display:flex;align-items:center;gap:10px&quot;>
        <svg class=&quot;vmark&quot; viewBox=&quot;0 0 120 120&quot; style=&quot;width:28px;height:28px&quot;>
          <path d=&quot;M60 51 C 46 42 27 42 11 48 L11 92 C 27 86 46 86 60 94 Z&quot; fill=&quot;url(#vg-main)&quot;/>
          <path d=&quot;M60 51 C 74 42 93 42 109 48 L109 92 C 93 86 74 86 60 94 Z&quot; fill=&quot;url(#vg-main)&quot;/>
          <circle cx=&quot;48&quot; cy=&quot;31&quot; r=&quot;15&quot; fill=&quot;url(#vg-head)&quot;/>
          <path transform=&quot;translate(80,14) scale(0.32)&quot; d=&quot;M50 0 C54 28 72 46 100 50 C72 54 54 72 50 100 C46 72 28 54 0 50 C28 46 46 28 50 0 Z&quot; fill=&quot;url(#vg-star1)&quot;/>
          <path transform=&quot;translate(99,38) scale(0.19)&quot; d=&quot;M50 0 C54 28 72 46 100 50 C72 54 54 72 50 100 C46 72 28 54 0 50 C28 46 46 28 50 0 Z&quot; fill=&quot;url(#vg-star2)&quot;/>
        </svg>
        <span class=&quot;vword&quot; style=&quot;font-size:16px&quot;>Vidya AI</span>
      </span>
      <img class=&quot;eelogo__img&quot; alt=&quot;ExtraaEdge&quot; style=&quot;height:30px&quot;
           src=&quot;https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg&quot;
           onload=&quot;this.classList.add('ok');this.previousElementSibling.style.display='none'&quot;>
    </span>
  </div>

  <!-- explanatory caption (plain-English benefit per scene) -->
  <div class=&quot;caption&quot; id=&quot;caption&quot;><span class=&quot;cdot&quot;></span><span id=&quot;captionText&quot;></span></div>

  <!-- ============ SCENE 0 — OPENING ============ -->
  <section class=&quot;scene&quot; id=&quot;s0&quot;>
    <div class=&quot;core-wrap&quot;>
      <div class=&quot;ring r1&quot;></div>
      <div class=&quot;ring r2&quot;></div>
      <div class=&quot;orbit-node&quot;><i></i></div>
      <div class=&quot;seed&quot;></div>
      <div class=&quot;particles&quot; id=&quot;p0&quot;></div>
      <div class=&quot;core&quot;>
        <span class=&quot;eelogo&quot;>
          <span class=&quot;eelogo__fb&quot;>
            <svg class=&quot;vmark&quot; viewBox=&quot;0 0 120 120&quot;>
              <path d=&quot;M60 51 C 46 42 27 42 11 48 L11 92 C 27 86 46 86 60 94 Z&quot; fill=&quot;url(#vg-main)&quot;/>
              <path d=&quot;M60 51 C 74 42 93 42 109 48 L109 92 C 93 86 74 86 60 94 Z&quot; fill=&quot;url(#vg-main)&quot;/>
              <circle cx=&quot;48&quot; cy=&quot;31&quot; r=&quot;15&quot; fill=&quot;url(#vg-head)&quot;/>
              <path transform=&quot;translate(80,14) scale(0.32)&quot; d=&quot;M50 0 C54 28 72 46 100 50 C72 54 54 72 50 100 C46 72 28 54 0 50 C28 46 46 28 50 0 Z&quot; fill=&quot;url(#vg-star1)&quot;/>
              <path transform=&quot;translate(99,38) scale(0.19)&quot; d=&quot;M50 0 C54 28 72 46 100 50 C72 54 54 72 50 100 C46 72 28 54 0 50 C28 46 46 28 50 0 Z&quot; fill=&quot;url(#vg-star2)&quot;/>
            </svg>
          </span>
          <img class=&quot;eelogo__img&quot; alt=&quot;ExtraaEdge&quot; style=&quot;height:46px&quot;
               src=&quot;https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg&quot;
               onload=&quot;this.classList.add('ok');this.previousElementSibling.style.display='none'&quot;>
        </span>
      </div>
    </div>
    <h1 class=&quot;s0-head rise d1&quot;>Your Competitors Reply First. <span class=&quot;ax&quot;>They Win the Student.</span></h1>
<div style=&quot;text-align:center;&quot;>
<span class=&quot;s0-sub rise d2&quot;>Every student answered. Every lead qualified.</span><br><span class=&quot;s0-sub rise d2&quot;>Every opportunity captured.</span>
</div>
  </section>

  <!-- ============ SCENE 2 — MULTI-CHANNEL INTAKE ============ -->
  <section class=&quot;scene&quot; id=&quot;s2&quot;>
    <span class=&quot;eyebrow section-eyebrow rise&quot;><span class=&quot;dot&quot;></span> Multi-channel intake</span>
    <div class=&quot;s2-top&quot; style=&quot;margin-top:36px&quot;>
      <div></div>
      <div class=&quot;s2-stats&quot;>
        <div class=&quot;stat-chip rise&quot; style=&quot;animation-delay:.5s&quot;><span class=&quot;n&quot; id=&quot;convN&quot;>1,284</span><span class=&quot;l&quot;>Active conversations</span></div>
        <div class=&quot;stat-chip rise&quot; style=&quot;animation-delay:.7s&quot;><span class=&quot;n hot&quot;>+14</span><span class=&quot;l&quot;>New leads</span></div>
        <div class=&quot;stat-chip rise&quot; style=&quot;animation-delay:.9s&quot;><span class=&quot;n hot&quot;>+6</span><span class=&quot;l&quot;>Hot leads</span></div>
      </div>
    </div>
    <div class=&quot;netviz&quot; id=&quot;netviz&quot;>
      <svg id=&quot;netlines&quot;></svg>
      <div class=&quot;channels&quot; id=&quot;channels&quot;></div>
      <div class=&quot;hub&quot;><div><small>Vidya</small><br><b>AI Core</b></div></div>
    </div>
  </section>

  <!-- ============ SCENE 3 — AI REASONING ENGINE ============ -->
  <section class=&quot;scene&quot; id=&quot;s3&quot;>
    <span class=&quot;eyebrow section-eyebrow rise&quot;><span class=&quot;dot&quot;></span> AI reasoning engine</span>
    <div class=&quot;s3-grid&quot;>
      <div>
        <div class=&quot;reason-cloud&quot;>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:.2s&quot;>Program interest <span class=&quot;pct&quot;>96%</span></span>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:.35s&quot;>Budget fit <span class=&quot;pct&quot;>88%</span></span>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:.5s&quot;>Scholarship probability <span class=&quot;pct&quot;>71%</span></span>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:.65s&quot;>Application stage</span>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:.8s&quot;>Location match <span class=&quot;pct&quot;>94%</span></span>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:.95s&quot;>Intent score <span class=&quot;pct&quot;>92%</span></span>
          <span class=&quot;kw rise&quot; style=&quot;animation-delay:1.1s&quot;>Enrollment probability <span class=&quot;pct&quot;>92%</span></span>
        </div>
        <p class=&quot;ms-note rise&quot; style=&quot;animation-delay:1.3s;margin-top:18px&quot;>Reasoned in milliseconds — across every signal, for every student.</p>
      </div>
      <div class=&quot;verdict&quot;>
        <span class=&quot;label&quot;>Verdict</span>
        <span class=&quot;big&quot;>0<span style=&quot;font-size:24px;opacity:.6&quot;>/100</span></span>
        <span class=&quot;tag&quot;>● High intent</span>
      </div>
    </div>
  </section>

  <!-- ============ SCENE 4 — LIVE CASE #1 : Riya ============ -->
  <section class=&quot;scene&quot; id=&quot;s4&quot;>
    <span class=&quot;eyebrow case-eyebrow rise&quot;><span class=&quot;dot&quot;></span> Live student case</span>
    <div class=&quot;case&quot;>
      <div class=&quot;phone&quot;>
        <div class=&quot;phone-head&quot;>
          <div class=&quot;avatar&quot;>R</div>
          <div class=&quot;who&quot;><b>Riya S.</b><span>Pune</span></div>
          <span class=&quot;chan-pill&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-whatsapp&quot;/></svg>WhatsApp</span>
        </div>
        <div class=&quot;chat&quot;>
          <div class=&quot;bubble in&quot; style=&quot;animation-delay:.3s&quot;>Hi! I want to apply for B.Tech CSE but I think I missed the deadline 😟</div>
          <div class=&quot;bubble ai&quot; style=&quot;animation-delay:1.6s&quot;>Good news, Riya. Late applications close Friday. I've already reserved your slot. ✅</div>
        </div>
      </div>
      <div class=&quot;case-side&quot;>
        <h4 class=&quot;rise&quot;>Instant analysis</h4>
        <div class=&quot;overlay-list&quot;>
          <div class=&quot;ov&quot; style=&quot;animation-delay:.6s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-book&quot;/></svg></span> Program match found</div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:.8s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-clock&quot;/></svg></span> Late window available</div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:1.0s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-zap&quot;/></svg></span> Intent detected</div>
          <div class=&quot;ov accent&quot; style=&quot;animation-delay:1.2s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-trending&quot;/></svg></span> Enrollment probability <span class=&quot;val&quot;>92%</span></div>
        </div>
        <h4 class=&quot;rise&quot; style=&quot;animation-delay:1.8s&quot;>Action chain activated</h4>
        <div class=&quot;overlay-list&quot;>
          <div class=&quot;ov accent&quot; style=&quot;animation-delay:2.0s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-send&quot;/></svg></span> Application sent</div>
          <div class=&quot;ov accent&quot; style=&quot;animation-delay:2.2s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-calendar&quot;/></svg></span> Call scheduled</div>
          <div class=&quot;ov accent&quot; style=&quot;animation-delay:2.4s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-user-check&quot;/></svg></span> Counsellor assigned</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ SCENE 5 — LIVE CASE #2 : Arjun ============ -->
  <section class=&quot;scene&quot; id=&quot;s5&quot;>
    <span class=&quot;eyebrow case-eyebrow rise&quot;><span class=&quot;dot&quot;></span> Live student case</span>
    <div class=&quot;case&quot;>
      <div class=&quot;phone&quot;>
        <div class=&quot;phone-head&quot;>
          <div class=&quot;avatar alt&quot;>A</div>
          <div class=&quot;who&quot;><b>Arjun M.</b><span>MBA aspirant</span></div>
          <span class=&quot;chan-pill&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-instagram&quot;/></svg>Instagram</span>
        </div>
        <div class=&quot;chat&quot;>
          <div class=&quot;bubble in&quot; style=&quot;animation-delay:.3s&quot;>What are the fees and scholarships?</div>
          <div class=&quot;bubble ai&quot; style=&quot;animation-delay:1.4s&quot;>Here's a personalised estimate — you qualify for up to 40% scholarship. Brochure &amp; eligibility check are on the way. 🎓</div>
        </div>
      </div>
      <div class=&quot;case-side&quot;>
        <h4 class=&quot;rise&quot;>AI instantly generates</h4>
        <div class=&quot;overlay-list&quot;>
          <div class=&quot;ov accent&quot; style=&quot;animation-delay:.6s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-award&quot;/></svg></span> Personalised scholarship estimate <span class=&quot;val&quot;>40%</span></div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:.85s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-check&quot;/></svg></span> Eligibility checker <span class=&quot;val&quot; style=&quot;color:var(--blue)&quot;>Ready</span></div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:1.1s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-file&quot;/></svg></span> Brochure <span class=&quot;val&quot; style=&quot;color:var(--blue)&quot;>Delivered</span></div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:1.35s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-route&quot;/></svg></span> Journey <span class=&quot;val&quot;>Activated</span></div>
        </div>
        <p class=&quot;ms-note rise&quot; style=&quot;animation-delay:1.7s&quot;>Lead moved into the nurture workflow — automatically.</p>
      </div>
    </div>
  </section>

  <!-- ============ SCENE 6 — LIVE CASE #3 : Fatima ============ -->
  <section class=&quot;scene&quot; id=&quot;s6&quot;>
    <span class=&quot;eyebrow case-eyebrow rise&quot;><span class=&quot;dot&quot;></span> International enquiry</span>
    <div class=&quot;case&quot;>
      <div class=&quot;phone&quot;>
        <div class=&quot;phone-head&quot;>
          <div class=&quot;avatar&quot;>F</div>
          <div class=&quot;who&quot;><b>Fatima K.</b><span>Dubai 🇦🇪</span></div>
          <span class=&quot;chan-pill&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-book&quot;/></svg>B.Sc Nursing</span>
        </div>
        <div class=&quot;chat&quot;>
          <div class=&quot;bubble in&quot; style=&quot;animation-delay:.3s&quot;>Hello, I'm enquiring from Dubai about B.Sc Nursing for the next intake.</div>
          <div class=&quot;bubble ai&quot; style=&quot;animation-delay:1.3s&quot;>Welcome, Fatima! I've looped in our international team and sent your hostel, travel and parent information pack. ✈️</div>
        </div>
      </div>
      <div class=&quot;case-side&quot;>
        <h4 class=&quot;rise&quot;>AI immediately activates</h4>
        <div class=&quot;overlay-list&quot;>
          <div class=&quot;ov accent&quot; style=&quot;animation-delay:.6s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-users&quot;/></svg></span> International team</div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:.8s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-home&quot;/></svg></span> Hostel information</div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:1.0s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-plane&quot;/></svg></span> Airport pickup guide</div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:1.2s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-mic&quot;/></svg></span> Voice follow-up</div>
          <div class=&quot;ov&quot; style=&quot;animation-delay:1.4s&quot;><span class=&quot;tick&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-file&quot;/></svg></span> Parent information pack</div>
        </div>
        <p class=&quot;ms-note rise&quot; style=&quot;animation-delay:1.8s&quot;>Everything happens automatically — across borders and time zones.</p>
      </div>
    </div>
  </section>

  <!-- ============ SCENE 7 — AUTOPILOT FUNNEL ============ -->
  <section class=&quot;scene&quot; id=&quot;s7&quot;>
    <span class=&quot;eyebrow section-eyebrow rise&quot;><span class=&quot;dot&quot;></span> Admissions on autopilot</span>
    <div class=&quot;funnel&quot;>
      <span class=&quot;fstep&quot; style=&quot;animation-delay:.2s&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-user-plus&quot;/></svg>Lead</span><span class=&quot;farrow&quot; style=&quot;animation-delay:.35s&quot;>→</span>
      <span class=&quot;fstep&quot; style=&quot;animation-delay:.5s&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-message&quot;/></svg>Conversation</span><span class=&quot;farrow&quot; style=&quot;animation-delay:.65s&quot;>→</span>
      <span class=&quot;fstep&quot; style=&quot;animation-delay:.8s&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-zap&quot;/></svg>Qualification</span><span class=&quot;farrow&quot; style=&quot;animation-delay:.95s&quot;>→</span>
      <span class=&quot;fstep&quot; style=&quot;animation-delay:1.1s&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-file&quot;/></svg>Application</span><span class=&quot;farrow&quot; style=&quot;animation-delay:1.25s&quot;>→</span>
      <span class=&quot;fstep&quot; style=&quot;animation-delay:1.4s&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-user-check&quot;/></svg>Counselling</span><span class=&quot;farrow&quot; style=&quot;animation-delay:1.55s&quot;>→</span>
      <span class=&quot;fstep&quot; style=&quot;animation-delay:1.7s&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-award&quot;/></svg>Enrollment</span>
    </div>
    <div class=&quot;enrolled&quot;>
      <span class=&quot;badge&quot;>ENROLLED</span>
      <span class=&quot;sub&quot;>One intelligent, self-driving stream</span>
    </div>
  </section>

  <!-- ============ SCENE 8 — BUSINESS IMPACT ============ -->
  <section class=&quot;scene&quot; id=&quot;s8&quot;>
    <span class=&quot;eyebrow section-eyebrow rise&quot;><span class=&quot;dot&quot;></span> Business impact</span>
    <div class=&quot;metrics&quot;>
      <div class=&quot;metric&quot; style=&quot;animation-delay:.2s&quot;><div class=&quot;mic&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-user-check&quot;/></svg></div><div class=&quot;v accent&quot;>+48</div><div class=&quot;l&quot;>Students enrolled today</div></div>
      <div class=&quot;metric&quot; style=&quot;animation-delay:.35s&quot;><div class=&quot;mic&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-trending&quot;/></svg></div><div class=&quot;v&quot;>₹1.8&amp;nbsp;Cr</div><div class=&quot;l&quot;>Pipeline created</div></div>
      <div class=&quot;metric&quot; style=&quot;animation-delay:.5s&quot;><div class=&quot;mic&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-clock&quot;/></svg></div><div class=&quot;v&quot;>2.4s</div><div class=&quot;l&quot;>Average response time</div></div>
      <div class=&quot;metric&quot; style=&quot;animation-delay:.65s&quot;><div class=&quot;mic&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-award&quot;/></svg></div><div class=&quot;v accent&quot;>24×</div><div class=&quot;l&quot;>Return on investment</div></div>
      <div class=&quot;metric&quot; style=&quot;animation-delay:.8s&quot;><div class=&quot;mic&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-users&quot;/></svg></div><div class=&quot;v&quot;>95%</div><div class=&quot;l&quot;>Counsellor adoption</div></div>
    </div>
  </section>

  <!-- ============ SCENE 9 — PRODUCT ECOSYSTEM ============ -->
  <section class=&quot;scene&quot; id=&quot;s9&quot;>
    <span class=&quot;eyebrow section-eyebrow rise&quot;><span class=&quot;dot&quot;></span> One operating system</span>
    <div class=&quot;ecosystem&quot; id=&quot;ecosystem&quot;>
      <div class=&quot;eco-ring a&quot;></div>
      <div class=&quot;eco-ring b&quot;></div>
      <div class=&quot;eco-core&quot;><div><b>Vidya</b><br><small>AI CORE</small></div></div>
    </div>
  </section>

  <!-- ============ FINAL SHOT ============ -->
  <section class=&quot;scene&quot; id=&quot;sf&quot;>
    <div class=&quot;logo-final&quot;>
      <span class=&quot;eelogo&quot;>
        <span class=&quot;eelogo__fb&quot; style=&quot;display:flex;align-items:center;gap:16px&quot;>
          <svg class=&quot;vmark&quot; viewBox=&quot;0 0 120 120&quot; style=&quot;width:72px;height:72px&quot;>
            <path d=&quot;M60 51 C 46 42 27 42 11 48 L11 92 C 27 86 46 86 60 94 Z&quot; fill=&quot;url(#vg-main)&quot;/>
            <path d=&quot;M60 51 C 74 42 93 42 109 48 L109 92 C 93 86 74 86 60 94 Z&quot; fill=&quot;url(#vg-main)&quot;/>
            <circle cx=&quot;48&quot; cy=&quot;31&quot; r=&quot;15&quot; fill=&quot;url(#vg-head)&quot;/>
            <path transform=&quot;translate(80,14) scale(0.32)&quot; d=&quot;M50 0 C54 28 72 46 100 50 C72 54 54 72 50 100 C46 72 28 54 0 50 C28 46 46 28 50 0 Z&quot; fill=&quot;url(#vg-star1)&quot;/>
            <path transform=&quot;translate(99,38) scale(0.19)&quot; d=&quot;M50 0 C54 28 72 46 100 50 C72 54 54 72 50 100 C46 72 28 54 0 50 C28 46 46 28 50 0 Z&quot; fill=&quot;url(#vg-star2)&quot;/>
          </svg>
          <span class=&quot;vword&quot; style=&quot;font-size:46px&quot;>Vidya AI</span>
        </span>
        <img class=&quot;eelogo__img&quot; alt=&quot;ExtraaEdge&quot; style=&quot;height:64px&quot;
             src=&quot;https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg&quot;
             onload=&quot;this.classList.add('ok');this.previousElementSibling.style.display='none'&quot;>
      </span>
    </div>
    <h2 class=&quot;final-head rise&quot; style=&quot;animation-delay:.6s&quot;>Admissions is a velocity game.<br>Win it with VidyaAI.</h2>
    <p class=&quot;final-sub rise&quot; style=&quot;animation-delay:.9s&quot;><b>Respond in seconds.</b> &amp;nbsp;·&amp;nbsp; <b>Qualify automatically.</b> &amp;nbsp;·&amp;nbsp; <b>Enroll more students.</b></p>
    <a href=&quot;https://www.extraaedge.com/book-a-demo/&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; class=&quot;cta rise&quot; style=&quot;animation-delay:1.2s&quot;>Book a Demo <svg class=&quot;ic&quot;><use href=&quot;#ic-arrow-right&quot;/></svg></a>
    <div class=&quot;sweep&quot;></div>
  </section>

  <!-- modern player controls -->
  <div class=&quot;controls&quot; id=&quot;controls&quot;>
    <button class=&quot;cbtn&quot; id=&quot;btnPlay&quot; aria-label=&quot;Play / Pause&quot;><svg class=&quot;ic ic--fill&quot;><use href=&quot;#ic-pause&quot;/></svg></button>
    <button class=&quot;cbtn&quot; id=&quot;btnReplay&quot; aria-label=&quot;Restart&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-replay&quot;/></svg></button>
    <div class=&quot;scrub&quot; id=&quot;scrub&quot;><div class=&quot;scrub__fill&quot; id=&quot;scrubFill&quot;></div><div class=&quot;scrub__segs&quot; id=&quot;scrubSegs&quot;></div></div>
    <span class=&quot;time&quot; id=&quot;time&quot;>0:00 / 0:35</span>
    <button class=&quot;cbtn&quot; id=&quot;btnSound&quot; aria-label=&quot;Sound on / off&quot;><svg class=&quot;ic&quot;><use href=&quot;#ic-volume-x&quot;/></svg></button>
  </div>
</div>

<script>
/* =================================================================
   SCENE DIRECTOR — sequences the film and loops seamlessly.
   Using display:none/flex toggling so every CSS animation restarts
   cleanly on each pass (true seamless loop).
   ================================================================= */
const SCENES = [
  {id:'s0', dur:4200},   // opening  (storyboard 0–2s, extended for read)
  {id:'s2', dur:3200},   // multi-channel
  {id:'s3', dur:3200},   // reasoning engine
  {id:'s4', dur:4000},   // case 1 — Riya (longest action chain)
  {id:'s5', dur:3000},   // case 2 — Arjun
  {id:'s6', dur:3000},   // case 3 — Fatima
  {id:'s7', dur:3600},   // autopilot funnel
  {id:'s8', dur:3000},   // business impact
  {id:'s9', dur:3400},   // ecosystem
  {id:'sf', dur:4600},   // final + CTA + sweep, then loop
];
const FADE = 450;

/* connected narrative — one story told across the film */
const CAPTIONS = {
  s0:'Every day, thousands of students reach out — and most never get an answer in time.',
  s2:'The moment a student says hello — on any channel — Vidya AI is already there.',
  s3:'In milliseconds it reads their intent, budget and real chance to enroll.',
  s4:'Riya fears she missed the deadline. Vidya reassures her — and reserves her seat.',
  s5:'Arjun asks about fees — and instantly gets a scholarship offer and a clear plan.',
  s6:'Fatima writes from Dubai. Her entire international journey begins on its own.',
  s7:'Every enquiry flows from first hello to enrolled — automatically.',
  s8:'By morning: more students enrolled, a fuller pipeline, real ROI.',
  s9:'One intelligent system, quietly running your whole admissions team.',
  sf:'This is admissions on autopilot. This is Vidya AI.',
};

/* ---- build the multi-channel network (positions + lines + pulses) ---- */
function buildNetwork(){
  const channels = [
    ['WhatsApp','ic-whatsapp'],['Instagram','ic-instagram'],['Website','ic-globe'],
    ['Email','ic-mail'],['Phone Calls','ic-phone'],['Facebook Leads','ic-facebook'],['Google Ads','ic-megaphone']
  ];
  const wrap = document.getElementById('channels');
  const svg  = document.getElementById('netlines');
  wrap.innerHTML=''; svg.innerHTML='';
  const cx=50, cy=50;                       // hub center (%)
  const N=channels.length;
  channels.forEach((c,i)=>{
    const ang = (-90 + i*(360/N)) * Math.PI/180;
    const rx = 42, ry = 40;                  // ellipse radius (%)
    const x = cx + Math.cos(ang)*rx;
    const y = cy + Math.sin(ang)*ry;
    // chip
    const el=document.createElement('div');
    el.className='chan'+(i%3===0?' on':'');
    el.style.left=x+'%'; el.style.top=y+'%';
    el.style.animationDelay=(0.3+i*0.12)+'s';
    el.innerHTML='<span class=&quot;chan-ic&quot;><svg class=&quot;ic&quot;><use href=&quot;#'+c[1]+'&quot;/></svg></span>'+c[0];
    wrap.appendChild(el);
    // line to hub
    const ln=document.createElementNS('http://www.w3.org/2000/svg','line');
    ln.setAttribute('x1',x); ln.setAttribute('y1',y);
    ln.setAttribute('x2',cx); ln.setAttribute('y2',cy);
    ln.style.animationDelay=(0.3+i*0.12)+'s, '+(0.8+i*0.12)+'s';
    svg.appendChild(ln);
    // traveling lead pulse (uses px offset from center)
    const p=document.createElement('div');
    p.className='lead-pulse';
    p.style.setProperty('--fx', ((x-cx)*8)+'px');
    p.style.setProperty('--fy', ((y-cy)*4.4)+'px');
    p.style.animationDelay=(1+i*0.18)+'s';
    document.getElementById('netviz').appendChild(p);
  });
}

/* ---- opening particle field flowing into the core ---- */
function buildParticles(){
  const host=document.getElementById('p0');
  host.innerHTML='';
  for(let i=0;i<26;i++){
    const a=Math.random()*Math.PI*2, d=90+Math.random()*120;
    const dot=document.createElement('i');
    dot.style.setProperty('--x',Math.cos(a)*d+'px');
    dot.style.setProperty('--y',Math.sin(a)*d+'px');
    dot.style.animationDelay=(0.6+Math.random()*0.9)+'s';
    dot.style.background = i%4===0 ? 'var(--orange)' : 'var(--blue)';
    host.appendChild(dot);
  }
}

/* ---- orbiting product modules ---- */
function buildEcosystem(){
  const mods=[
    ['ic-users','Lead Manager'],['ic-phone','AI Calling Agent'],['ic-whatsapp','WhatsApp Automation'],
    ['ic-clipboard','Application Tracker'],['ic-funnel','Funnel Analytics'],['ic-sparkles','VidyaGPT'],
    ['ic-target','Smart Lead Scoring'],['ic-mail','Email Journeys']
  ];
  const host=document.getElementById('ecosystem');
  host.querySelectorAll('.mod').forEach(m=>m.remove());
  const N=mods.length;
  mods.forEach((m,i)=>{
    const ang=(-90 + i*(360/N))*Math.PI/180;
    const r = i%2===0 ? 40 : 50;
    const x=50+Math.cos(ang)*r, y=50+Math.sin(ang)*r;
    const el=document.createElement('div');
    el.className='mod';
    el.style.left=x+'%'; el.style.top=y+'%';
    el.style.animationDelay=(0.4+i*0.13)+'s';
    el.innerHTML='<svg class=&quot;ic&quot;><use href=&quot;#'+m[0]+'&quot;/></svg>'+m[1];
    host.appendChild(el);
  });
}

/* ---- count-up for the active-conversations number in scene 2 ---- */
function countUp(){
  const el=document.getElementById('convN');
  if(!el) return;
  const target=1284; let cur=1180;
  const t=setInterval(()=>{
    cur+=Math.ceil((target-cur)/6);
    if(cur>=target){cur=target;clearInterval(t);}
    el.textContent=cur.toLocaleString('en-IN');
  },60);
}

/* ---- count-up for the reasoning verdict score (0 → 92) ---- */
function countVerdict(){
  const el=document.querySelector('#s3 .verdict .big');
  if(!el) return;
  let cur=0;const target=92;
  const t=setInterval(()=>{
    cur+=4; if(cur>=target){cur=target;clearInterval(t);}
    el.innerHTML=cur+'<span style=&quot;font-size:24px;opacity:.6&quot;>/100</span>';
  },45);
}

/* ---- caption controller ---- */
const captionEl=document.getElementById('caption');
const captionTxt=document.getElementById('captionText');
function setCaption(id){
  if(!CAPTIONS[id]){captionEl.classList.remove('show');return;}
  captionTxt.textContent=CAPTIONS[id];
  captionEl.classList.add('show');
}

/* =================================================================
   PLAYER ENGINE — rAF timeline with play / pause / seek / sound.
   A single clock drives scene activation; every scene restarts its
   own CSS animations on entry (display toggle), so the film loops
   seamlessly and stays in sync after a seek.
   ================================================================= */
let total=0; SCENES.forEach(s=>{ s.start=total; total+=s.dur; });
const LOOP=total;

const stage     = document.getElementById('stage');
const scrub     = document.getElementById('scrub');
const scrubFill = document.getElementById('scrubFill');
const scrubSegs = document.getElementById('scrubSegs');
const timeEl    = document.getElementById('time');
const btnPlay   = document.getElementById('btnPlay');
const btnReplay = document.getElementById('btnReplay');
const btnSound  = document.getElementById('btnSound');

/* ---- device-friendly: scale the fixed 16:9 canvas to fit any screen ---- */
const STAGE_W=1280, STAGE_H=720;
function fitStage(){
  if(location.search.includes('sync')) return;   // render harness sizes the stage itself
  const s=Math.min(window.innerWidth/STAGE_W, window.innerHeight/STAGE_H, 1);
  stage.style.position='fixed';
  stage.style.left='50%';
  stage.style.top='50%';
  stage.style.transform='translate(-50%,-50%) scale('+s+')';
}
window.addEventListener('resize',fitStage,{passive:true});
window.addEventListener('orientationchange',fitStage);
fitStage();

// scene boundary markers on the scrub
SCENES.forEach(s=>{ if(s.start>0){const i=document.createElement('i');i.style.left=(s.start/LOOP*100)+'%';scrubSegs.appendChild(i);} });

let clock=0, last=performance.now(), playing=true, curIndex=-1, perScene=[];
function clearScene(){ perScene.forEach(clearTimeout); perScene=[]; }
const useHref=(svg,id)=>svg.firstElementChild.setAttribute('href','#'+id);

function sceneAt(t){ let i=0; for(let k=0;k<SCENES.length;k++){ if(t>=SCENES[k].start) i=k; } return i; }

function activate(i){
  clearScene();
  document.querySelectorAll('.scene').forEach(s=>{s.classList.remove('active','leaving');s.style.display='none';});
  const sc=SCENES[i], el=document.getElementById(sc.id);
  if(sc.id==='s0') buildParticles();
  if(sc.id==='s2') buildNetwork();
  if(sc.id==='s9') buildEcosystem();
  el.style.display='flex';
  void el.offsetWidth;                 // reflow → restart CSS anims from 0
  el.classList.add('active');
  setCaption(sc.id);
  if(sc.id==='s2') perScene.push(setTimeout(countUp,500));
  if(sc.id==='s3') perScene.push(setTimeout(countVerdict,1750));
  sceneSound(sc.id);                   // scene-matched SFX choreography
  curIndex=i;
}

const fmt=ms=>'0:'+String(Math.floor(ms/1000)).padStart(2,'0');

function frame(now){
  const dt=now-last; last=now;
  if(playing){
    clock+=dt; if(clock>=LOOP) clock-=LOOP;
    const i=sceneAt(clock);
    if(i!==curIndex) activate(i);
    scrubFill.style.width=(clock/LOOP*100)+'%';
    timeEl.textContent=fmt(clock)+' / '+fmt(LOOP);
  }
  requestAnimationFrame(frame);
}

function setPlaying(p){
  playing=p; stage.classList.toggle('paused',!p);
  const svg=btnPlay.firstElementChild; svg.classList.toggle('ic--fill',true);
  useHref(svg, p?'ic-pause':'ic-play');
}
btnPlay.addEventListener('click',()=>setPlaying(!playing));
btnReplay.addEventListener('click',()=>{ clock=0; activate(0); scrubFill.style.width='0%'; setPlaying(true); });

scrub.addEventListener('click',e=>{
  const r=scrub.getBoundingClientRect();
  const frac=Math.max(0,Math.min(.999,(e.clientX-r.left)/r.width));
  const i=sceneAt(frac*LOOP);
  clock=SCENES[i].start;               // snap to scene start so visuals + bar align
  activate(i);
  scrubFill.style.width=(clock/LOOP*100)+'%';
  timeEl.textContent=fmt(clock)+' / '+fmt(LOOP);
});

/* ---- ADVANCED UI / TECH SOUND ENGINE (synthesised, in-browser, gesture-gated) ---- */
let actx=null, master=null, amb=null, soundOn=false;
function initAudio(){
  if(actx) return;
  actx=new (window.AudioContext||window.webkitAudioContext)();
  master=actx.createGain(); master.gain.value=0; master.connect(actx.destination);
  /* soft light-tech ambient pad — airy high chord, gentle drift (no low rumble) */
  amb=actx.createGain(); amb.gain.value=0; amb.connect(master);
  [329.63,392.0,493.88].forEach(function(f,i){
    const o=actx.createOscillator(); o.type='sine'; o.frequency.value=f;
    const lfo=actx.createOscillator(); lfo.type='sine'; lfo.frequency.value=0.05+i*0.02;
    const lg=actx.createGain(); lg.gain.value=2; lfo.connect(lg); lg.connect(o.detune);
    const g=actx.createGain(); g.gain.value=0.016; o.connect(g); g.connect(amb);
    o.start(); lfo.start();
  });
}
const aNow=function(){ return actx.currentTime; };
/* generic enveloped tone (optional pitch glide) */
function tone(f,t0,dur,type,peak,glideTo){
  const o=actx.createOscillator(); o.type=type||'sine'; o.frequency.setValueAtTime(f,t0);
  if(glideTo) o.frequency.exponentialRampToValueAtTime(glideTo,t0+dur);
  const g=actx.createGain();
  g.gain.setValueAtTime(0.0001,t0);
  g.gain.exponentialRampToValueAtTime(peak||0.25,t0+0.012);
  g.gain.exponentialRampToValueAtTime(0.0001,t0+dur);
  o.connect(g); g.connect(master); o.start(t0); o.stop(t0+dur+0.02);
}
/* filtered noise burst (optional filter sweep) */
function noise(t0,dur,type,freq,q,peak,sweepTo){
  const n=Math.floor(actx.sampleRate*dur), buf=actx.createBuffer(1,n,actx.sampleRate), d=buf.getChannelData(0);
  for(let i=0;i<n;i++){ const k=i/n; d[i]=(Math.random()*2-1)*(1-k); }
  const src=actx.createBufferSource(); src.buffer=buf;
  const bp=actx.createBiquadFilter(); bp.type=type||'bandpass'; bp.frequency.setValueAtTime(freq,t0); bp.Q.value=q||0.8;
  if(sweepTo) bp.frequency.exponentialRampToValueAtTime(sweepTo,t0+dur);
  const g=actx.createGain(); g.gain.setValueAtTime(peak||0.18,t0); g.gain.exponentialRampToValueAtTime(0.0001,t0+dur);
  src.connect(bp); bp.connect(g); g.connect(master); src.start(t0);
}
/* named sound effects */
const SFX={
  uiBeep:function(){ const t=aNow(); tone(880,t,0.12,'triangle',0.16); tone(1318.5,t+0.05,0.12,'sine',0.10); },
  pop:function(){ tone(420,aNow(),0.14,'sine',0.26,900); },                         // chat bubble pop
  sent:function(){ noise(aNow(),0.28,'highpass',700,0.5,0.14,4200); },              // message sent whoosh
  ping:function(){ const t=aNow(); tone(1568,t,0.18,'sine',0.16); tone(2093,t+0.08,0.22,'sine',0.12); }, // notification ping
  tick:function(){ tone(2400,aNow(),0.03,'square',0.05); },                         // counter tick
  ding:function(){ const t=aNow(); tone(1046.5,t,0.5,'sine',0.20); tone(1568,t+0.006,0.5,'sine',0.11); }, // success ding
  chime:function(){ const t=aNow(); [523.25,659.25,783.99,1046.5].forEach(function(f,i){ tone(f,t+i*0.09,0.6,'sine',0.15); }); }, // achievement chime
  hum:function(){ const t=aNow(); tone(330,t,0.5,'sawtooth',0.045,520); noise(t,0.5,'bandpass',1000,2,0.04); }, // AI processing (brief, textured)
  scan:function(){ noise(aNow(),0.5,'bandpass',400,3,0.10,3200); },                 // digital scan / hologram reveal
  whoosh:function(){ noise(aNow(),0.42,'bandpass',320,0.6,0.16,2200); },            // transition / page slide
  kaching:function(){ const t=aNow(); tone(1318.5,t,0.12,'square',0.13); tone(1760,t+0.09,0.3,'square',0.15); }, // cash register
  type:function(){ noise(aNow(),0.04,'bandpass',2600,1,0.06); },                    // keyboard click
  riser:function(){ const t=aNow(); const o=actx.createOscillator(); o.type='sawtooth';
    o.frequency.setValueAtTime(180,t); o.frequency.exponentialRampToValueAtTime(1200,t+1.2);
    const g=actx.createGain(); g.gain.setValueAtTime(0.0001,t); g.gain.linearRampToValueAtTime(0.10,t+1.1);
    g.gain.exponentialRampToValueAtTime(0.0001,t+1.35); o.connect(g); g.connect(master); o.start(t); o.stop(t+1.4); },
  impact:function(){ const t=aNow(); const o=actx.createOscillator(); o.type='sine';
    o.frequency.setValueAtTime(220,t); o.frequency.exponentialRampToValueAtTime(46,t+0.7);
    const g=actx.createGain(); g.gain.setValueAtTime(0.55,t); g.gain.exponentialRampToValueAtTime(0.0001,t+0.9);
    o.connect(g); g.connect(master); o.start(t); o.stop(t+0.95); noise(t,0.5,'lowpass',1300,0.7,0.22); } // cinematic boom
};
/* scene-by-scene sound choreography */
function sceneSound(id){
  if(!soundOn||!actx) return;
  const q=function(fn,delay){ setTimeout(function(){ if(soundOn) fn(); }, delay); };
  switch(id){
    case 's0': SFX.scan(); q(SFX.uiBeep,520); break;
    case 's2': SFX.whoosh(); q(SFX.ping,520); q(SFX.ping,1100); q(SFX.pop,1700); break;
    case 's3': SFX.hum(); q(SFX.scan,320); [0,1,2,3,4,5,6].forEach(function(k){ q(SFX.tick,520+k*150); }); break;
    case 's4': SFX.pop(); [0,1,2,3].forEach(function(k){ q(SFX.type,360+k*90); }); q(SFX.sent,1500); q(SFX.ding,3200); break;
    case 's5': SFX.pop(); q(SFX.sent,1300); q(SFX.uiBeep,2000); break;
    case 's6': SFX.pop(); q(SFX.sent,1200); q(SFX.ping,2200); break;
    case 's7': [0,1,2,3,4,5].forEach(function(k){ q(SFX.tick,200+k*260); }); q(SFX.chime,2400); break;
    case 's8': SFX.kaching(); [0,1,2,3,4].forEach(function(k){ q(SFX.tick,320+k*180); }); q(SFX.ding,1400); break;
    case 's9': SFX.whoosh(); q(SFX.uiBeep,420); break;
    case 'sf': SFX.riser(); q(SFX.impact,1300); q(SFX.chime,1700); break;
    default: SFX.uiBeep();
  }
}
function setSound(on){
  soundOn=on; btnSound.classList.toggle('on',on);
  useHref(btnSound.firstElementChild, on?'ic-volume':'ic-volume-x');
  if(on){
    initAudio(); if(actx.state==='suspended') actx.resume();
    master.gain.cancelScheduledValues(actx.currentTime);
    master.gain.linearRampToValueAtTime(0.6, actx.currentTime+0.3);
    amb.gain.linearRampToValueAtTime(0.5, actx.currentTime+1.6);
    sceneSound((typeof curIndex==='number'&amp;&amp;curIndex>=0&amp;&amp;SCENES[curIndex])?SCENES[curIndex].id:'s0');
  } else if(actx){
    amb.gain.linearRampToValueAtTime(0, actx.currentTime+0.4);
    master.gain.linearRampToValueAtTime(0, actx.currentTime+0.4);
  }
}
btnSound.addEventListener('click',function(){ setSound(!soundOn); });

/* ---- start ---- */
function start(){ clock=0; last=performance.now(); curIndex=-1; activate(0); setPlaying(true);
                  scrubFill.style.width='0%'; requestAnimationFrame(frame); }
window.__go = start;                              // render harness triggers an exact start
if(!location.search.includes('sync')) start();    // normal viewing: autoplay
</script>
</body>
</html>
"></iframe>
    </div>
  </div>
</section>

<section class="logo-section" id="trusted-institutions" aria-label="Trusted Institutions">
  <div class="logo-header reveal">
    <div class="logo-badge">Leading Institutions</div>
    <p style="font-family:var(--font-h);font-weight:700;font-size:1rem;color:var(--blue);margin-bottom:10px">Trusted by 500+ Institutions Growing Faster Than Ever</p>
    <h2 class="logo-title">Why Educational Institutions Choose ExtraaEdge CRM</h2>
    <p class="logo-sub">AI-powered <strong>admission automation</strong> and <strong>enrollment management system</strong> for the next generation of education leaders.</p>
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
  <div class="logo-footer reveal">
    <a href="#demo" class="btn-primary">Start Converting Today</a>
    <div class="live-indicator"><span class="green-dot"></span><span>Live: +124 Admissions Processed in last 1hr</span></div>
  </div>
</section>
<div class="section-divider"></div>

<!-- ===================== VIDYA AI · STICKY SCROLLYTELLING + MORPHING DASHBOARD ===================== -->
<!-- ===================== VidyaAI scroll story — scoped #vidya ===================== -->
<style>
#vidya{
  --navy:#19335D; --navy-2:#27497d; --ink:#1c2b3f; --muted:#5d6f86;
  --line:#e3e9f2; --paper:#f6f8fc;
  --orange:#DE6E30; --orange-soft:#fff1e9;
  --teal:#0fa48d; --teal-soft:#e6f7f3;
  --gold:#eab308; --blue:#2f6fc0; --green:#16a34a; --red:#e0564a;
  --sh-sm:0 1px 2px rgba(25,51,93,.06);
  --sh-md:0 10px 30px -12px rgba(25,51,93,.18);
  --sh-lg:0 30px 70px -25px rgba(25,51,93,.35);
  --r-lg:20px; --r-md:14px; --r-sm:9px;
  --font-d:'Poppins',sans-serif;
  --font-b:'Inter',sans-serif;
  --font-m:'Inter',sans-serif;
  --vh100:100vh;
}
@supports (height:100dvh){#vidya{ --vh100:100dvh; }}
#vidya *{box-sizing:border-box;margin:0;padding:0}
#vidya{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
#vidya{font-family:var(--font-b);color:var(--ink);background:var(--paper);-webkit-font-smoothing:antialiased}
#vidya button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit;-webkit-tap-highlight-color:transparent}
#vidya img, #vidya svg{max-width:100%}
#vidya :focus-visible{outline:3px solid rgba(222,110,48,.55);outline-offset:2px;border-radius:8px}
#vidya{position:relative;background:
    radial-gradient(1100px 500px at 85% -5%, rgba(222,110,48,.07), transparent 60%),
    radial-gradient(900px 600px at -10% 105%, rgba(15,164,141,.07), transparent 55%),
    var(--paper);}
#vidya::before{content:"";position:absolute;inset:0;pointer-events:none;opacity:.5;
  background-image:linear-gradient(var(--line) 1px,transparent 1px),linear-gradient(90deg,var(--line) 1px,transparent 1px);
  background-size:64px 64px;
  mask-image:radial-gradient(ellipse 70% 45% at 50% 22%,#000 25%,transparent 75%);
  -webkit-mask-image:radial-gradient(ellipse 70% 45% at 50% 22%,#000 25%,transparent 75%);}
#vidya .wrap{position:relative;max-width:1240px;margin:0 auto;padding:0 clamp(16px,3vw,24px)}
.vx-progress{position:fixed;top:0;left:0;right:0;height:3px;z-index:90;pointer-events:none;opacity:0;transition:opacity .3s}
.vx-progress.show{opacity:1}
.vx-progress i{display:block;height:100%;width:0;background:linear-gradient(90deg,#DE6E30,#eab308);box-shadow:0 0 12px rgba(222,110,48,.5)}
.vx-toast{position:fixed;left:50%;bottom:max(22px,env(safe-area-inset-bottom));transform:translate(-50%,16px);z-index:95;
  background:#19335D;color:#fff;font-size:13px;font-weight:600;border-radius:99px;padding:10px 18px;box-shadow:0 30px 70px -25px rgba(25,51,93,.35);
  opacity:0;pointer-events:none;transition:opacity .3s,transform .3s;max-width:90vw;text-align:center}
.vx-toast.show{opacity:1;transform:translate(-50%,0)}
#vidya .vx-head{max-width:760px;margin-inline:auto;text-align:center;padding:clamp(56px,9vw,110px) 0 clamp(24px,4vw,48px)}
#vidya .vx-eyebrow{display:inline-flex;align-items:center;gap:9px;font-size:11.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--orange);background:var(--orange-soft);border:1px solid #fbd4bd;padding:7px 13px;border-radius:99px}
#vidya .vx-eyebrow .pulse{width:7px;height:7px;border-radius:50%;background:var(--orange);position:relative;flex:none}
#vidya .vx-eyebrow .pulse::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:2px solid var(--orange);opacity:.5;animation:vx-ping 1.8s ease-out infinite}
@keyframes vx-ping{0%{transform:scale(.4);opacity:.7}80%,100%{transform:scale(1.4);opacity:0}}
#vidya .vx-h2{font-family:var(--font-d);font-weight:760;font-size:clamp(27px,4.4vw,52px);line-height:1.08;letter-spacing:-.02em;color:var(--navy);margin:16px 0 13px;text-wrap:balance}
#vidya .vx-h2 em{font-style:normal;color:var(--orange);position:relative}
#vidya .vx-h2 em svg{position:absolute;left:0;bottom:-.14em;width:100%;height:.32em;pointer-events:none}
#vidya .vx-h2 em svg path{stroke:var(--orange);stroke-width:7;fill:none;stroke-linecap:round;opacity:.45;stroke-dasharray:600;stroke-dashoffset:600;animation:vx-draw 1.1s .5s ease forwards}
@keyframes vx-draw{to{stroke-dashoffset:0}}
#vidya .vx-lead{font-size:clamp(14.5px,1.5vw,18px);line-height:1.65;color:var(--muted);max-width:600px;margin-inline:auto}
#vidya .vx-lead b{color:var(--navy)}
#vidya .vx-hint{display:inline-flex;align-items:center;gap:10px;margin-top:20px;font-family:var(--font-m);font-size:10.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--navy)}
#vidya .vx-hint .mouse{width:20px;height:32px;border:2px solid var(--navy);border-radius:12px;position:relative;flex:none}
#vidya .vx-hint .mouse::after{content:"";position:absolute;left:50%;top:6px;width:3px;height:7px;margin-left:-1.5px;border-radius:3px;background:var(--orange);animation:vx-scrollDot 1.6s ease-in-out infinite}
@keyframes vx-scrollDot{0%{transform:translateY(0);opacity:1}70%{transform:translateY(10px);opacity:0}100%{opacity:0}}
#vidya .vx-scrolly{position:relative}
#vidya .vx-grid{display:grid;grid-template-columns:minmax(290px,400px) 1fr;gap:clamp(24px,4vw,64px);align-items:start}
#vidya .vx-rail{display:flex;flex-direction:column}
#vidya .vx-trigger{min-height:92vh;min-height:92svh;display:flex;align-items:center;padding:6vh 0}
#vidya .vx-trigger:first-child{min-height:76vh;min-height:76svh;padding-top:0}
#vidya .vx-trigger:last-child{min-height:96vh;min-height:96svh}
#vidya .vx-step{position:relative;width:100%;display:grid;grid-template-columns:46px 1fr;gap:15px;align-items:start;text-align:left;
  padding:20px 22px 20px 27px;border-radius:var(--r-md);background:#fff;border:1px solid var(--line);box-shadow:var(--sh-sm);
  opacity:.35;transform:translateY(26px) scale(.97);filter:saturate(.4);cursor:pointer;
  transition:opacity .5s cubic-bezier(.4,0,.2,1),transform .5s cubic-bezier(.4,0,.2,1),filter .5s,box-shadow .5s,border-color .5s}
#vidya .vx-step .num{width:46px;height:46px;border-radius:13px;display:grid;place-items:center;font-family:var(--font-m);font-size:14px;font-weight:600;background:#eaeff7;color:var(--muted);transition:all .45s;flex:none}
#vidya .vx-step .tt{font-family:var(--font-d);font-weight:700;font-size:clamp(16px,1.6vw,20px);color:var(--navy);line-height:1.2}
#vidya .vx-step .dd{font-size:13.5px;line-height:1.6;color:var(--muted);margin-top:7px}
#vidya .vx-step .vkpi{display:inline-flex;align-items:center;gap:5px;margin-top:11px;font-family:var(--font-m);font-size:10.5px;font-weight:600;color:var(--teal);background:var(--teal-soft);padding:4px 10px;border-radius:6px;opacity:0;transform:translateY(6px);transition:all .5s .15s}
#vidya .vx-step .bar{position:absolute;left:0;top:14px;bottom:14px;width:4px;border-radius:4px;background:#edf1f8;overflow:hidden}
#vidya .vx-step .bar i{display:block;width:100%;height:0;background:linear-gradient(var(--orange),#f4824d)}
#vidya .vx-step.on{opacity:1;transform:none;filter:none;border-color:#dbe4f0;box-shadow:var(--sh-md)}
#vidya .vx-step.on .num{background:var(--navy);color:#fff;box-shadow:0 8px 18px -7px rgba(25,51,93,.55)}
#vidya .vx-step.on .vkpi{opacity:1;transform:none}
#vidya .vx-step.done{opacity:.55;filter:none;transform:none}
#vidya .vx-step.done .num{background:var(--teal-soft);color:var(--teal)}
#vidya .vx-step.done .num::before{content:"✓";font-size:15px}
#vidya .vx-step.done .num span{display:none}
#vidya .vx-stage{position:sticky;top:0;height:var(--vh100);display:flex;flex-direction:column;justify-content:center;padding:20px 0;min-width:0}
#vidya .vx-device{background:#fff;border:1px solid var(--line);border-radius:var(--r-lg);box-shadow:var(--sh-lg);overflow:hidden;will-change:transform}
#vidya .vx-chrome{display:flex;align-items:center;gap:12px;padding:11px 14px;border-bottom:1px solid var(--line);background:linear-gradient(#fbfcfe,#f4f7fb);position:relative}
#vidya .vx-chrome .dots{display:flex;gap:6px;flex:none}
#vidya .vx-chrome .dots i{width:10px;height:10px;border-radius:50%}
#vidya .vx-chrome .dots i:nth-child(1){background:#ff5f57}
#vidya .vx-chrome .dots i:nth-child(2){background:#febc2e}
#vidya .vx-chrome .dots i:nth-child(3){background:#28c840}
#vidya .vx-url{flex:1;min-width:0;display:flex;align-items:center;gap:7px;background:#fff;border:1px solid var(--line);border-radius:8px;padding:6px 11px;font-family:var(--font-m);font-size:10.5px;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#vidya .vx-url .lock{color:var(--green);flex:none}
#vidya .vx-live{display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:700;letter-spacing:.1em;color:var(--red);background:#fdecea;border:1px solid #f8cfc9;border-radius:99px;padding:4px 10px;flex:none}
#vidya .vx-live i{width:6px;height:6px;border-radius:50%;background:var(--red);animation:vx-blink 1.2s infinite}
@keyframes vx-blink{50%{opacity:.25}}
#vidya .vx-viewprog{position:absolute;left:0;bottom:-1px;height:2px;width:0;background:linear-gradient(90deg,var(--orange),var(--gold))}
#vidya .vx-body{position:relative;height:min(56vh,520px);min-height:390px;background:#fbfcfe}
#vidya .vx-view{position:absolute;inset:0;padding:clamp(14px,2.4vw,26px);opacity:0;visibility:hidden;will-change:transform,opacity;
  overflow-y:auto;overflow-x:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior:contain;scrollbar-width:thin;scrollbar-color:#c9d4e4 transparent}
#vidya .vx-view::-webkit-scrollbar{width:5px}
#vidya .vx-view::-webkit-scrollbar-thumb{background:#c9d4e4;border-radius:5px}
#vidya .vx-view.on{opacity:1;visibility:visible;z-index:2}
#vidya .vx-cap{display:flex;gap:12px;align-items:flex-start;margin-top:13px;padding:12px 16px;background:#fff;border:1px solid var(--line);border-radius:var(--r-md);box-shadow:var(--sh-sm)}
#vidya .vx-cap .ic{flex:none;width:34px;height:34px;border-radius:10px;background:var(--orange-soft);display:grid;place-items:center;font-size:16px}
#vidya .vx-cap p{font-size:13px;line-height:1.55;color:var(--muted)}
#vidya .vx-cap p b{color:var(--navy)}
#vidya .vx-dots{display:flex;gap:7px;justify-content:center;margin-top:13px}
#vidya .vx-dots button{width:10px;height:10px;border-radius:99px;background:#cfd9e8;transition:all .35s cubic-bezier(.4,0,.2,1);padding:0;position:relative}
#vidya .vx-dots button::after{content:"";position:absolute;inset:-7px}
#vidya .vx-dots button.on{width:28px;background:var(--orange)}
#vidya .dx-top{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-bottom:14px;flex-wrap:wrap}
#vidya .dx-top h4{font-family:var(--font-d);font-size:15.5px;font-weight:700;color:var(--navy)}
#vidya .dx-top .tag{font-family:var(--font-m);font-size:9.5px;font-weight:600;letter-spacing:.08em;color:var(--blue);background:#eaf2fc;border-radius:6px;padding:5px 9px;white-space:nowrap}
#vidya .dx-kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:9px}
#vidya .dx-kpi{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:12px 13px;position:relative;overflow:hidden;min-width:0}
#vidya .dx-kpi::after{content:"";position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--kc,var(--orange))}
#vidya .dx-kpi .h{font-size:10px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);display:flex;align-items:center;gap:5px;white-space:nowrap;overflow:hidden}
#vidya .dx-kpi .big{font-family:var(--font-d);font-size:clamp(18px,2.1vw,25px);font-weight:760;color:var(--navy);margin:4px 0 3px;font-variant-numeric:tabular-nums}
#vidya .dx-kpi .r{display:flex;justify-content:space-between;gap:6px;font-size:10.5px;color:var(--muted);white-space:nowrap}
#vidya .dx-kpi .r b{color:var(--ink)}
#vidya .dx-kpi .trend{font-family:var(--font-m);font-size:9.5px;font-weight:600;color:var(--green)}
#vidya .dx-funnel{margin-top:14px;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:14px}
#vidya .dx-funnel .fh{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:12px}
#vidya .dx-funnel .fh b{font-size:12.5px;color:var(--navy)}
#vidya .dx-funnel .fh span{font-family:var(--font-m);font-size:9.5px;color:var(--muted);white-space:nowrap}
#vidya .dx-frow{display:grid;grid-template-columns:minmax(64px,92px) 1fr 46px;align-items:center;gap:9px;margin-bottom:8px;font-size:11px}
#vidya .dx-frow .lbl{color:var(--muted);text-align:right;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#vidya .dx-frow .trk{height:17px;background:#eef2f8;border-radius:5px;overflow:hidden}
#vidya .dx-frow .trk i{display:block;height:100%;width:0;border-radius:5px;background:var(--fc)}
#vidya .dx-frow .val{font-family:var(--font-m);font-size:10.5px;font-weight:600;color:var(--navy);font-variant-numeric:tabular-nums;text-align:right}
#vidya .lx-tabs{display:flex;gap:6px;overflow-x:auto;scrollbar-width:none;padding-bottom:2px}
#vidya .lx-tabs::-webkit-scrollbar{display:none}
#vidya .lx-tab{flex:none;font-size:11.5px;font-weight:600;color:var(--muted);background:#fff;border:1px solid var(--line);border-radius:8px;padding:7px 12px;transition:.2s}
#vidya .lx-tab:hover{border-color:#c8d4e4}
#vidya .lx-tab.on{color:#fff;background:var(--navy);border-color:var(--navy)}
#vidya .lx-row{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:12px 14px;margin-top:10px;transition:.3s}
#vidya .lx-row.hot{border-color:#f9c4a6;background:linear-gradient(#fff,#fffaf6)}
#vidya .lx-head{display:flex;align-items:center;gap:9px;flex-wrap:wrap}
#vidya .lx-av{width:30px;height:30px;border-radius:9px;display:grid;place-items:center;font-family:var(--font-m);font-size:10px;font-weight:600;color:#fff;background:var(--av,#7c8db0);flex:none}
#vidya .lx-name{font-weight:600;font-size:13px;color:var(--navy)}
#vidya .lx-meta{font-family:var(--font-m);font-size:10px;color:var(--muted)}
#vidya .lx-badge{font-size:9.5px;font-weight:700;letter-spacing:.04em;color:#fff;border-radius:6px;padding:3px 8px;margin-left:auto;white-space:nowrap}
#vidya .lx-ai{display:flex;gap:9px;margin-top:10px;padding:10px 12px;background:#f4f8ff;border:1px solid #dde9fb;border-radius:8px;font-size:12px;line-height:1.55;color:var(--ink)}
#vidya .lx-ai .who{flex:none;font-family:var(--font-m);font-size:9.5px;font-weight:600;color:var(--blue);background:#fff;border:1px solid #dde9fb;border-radius:5px;padding:2px 7px;height:fit-content;margin-top:1px}
#vidya .lx-ai .cursor{display:inline-block;width:7px;height:13px;background:var(--blue);vertical-align:-2px;animation:vx-blink 1s steps(1) infinite}
#vidya .lx-act{display:flex;gap:7px;margin-top:10px;flex-wrap:wrap}
#vidya .lx-btn{font-size:11px;font-weight:600;border-radius:7px;padding:7px 11px;border:1px solid var(--line);color:var(--navy);background:#fff;transition:.2s}
#vidya .lx-btn:hover{border-color:var(--orange);color:var(--orange)}
#vidya .lx-btn:active{transform:scale(.96)}
#vidya .lx-btn.pri{background:var(--orange);border-color:var(--orange);color:#fff}
#vidya .lx-btn.pri:hover{background:#c45a22;color:#fff}
#vidya .sx-grid{display:grid;grid-template-columns:168px 1fr;gap:14px;align-items:stretch}
#vidya .sx-ring{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:16px 12px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px}
#vidya .sx-ring svg{transform:rotate(-90deg);width:118px;height:118px}
#vidya .sx-ring .track{fill:none;stroke:#eef2f8;stroke-width:10}
#vidya .sx-ring .fill{fill:none;stroke:url(#sxGrad);stroke-width:10;stroke-linecap:round;stroke-dasharray:339.3;stroke-dashoffset:339.3}
#vidya .sx-ring .pct{font-family:var(--font-d);font-weight:760;font-size:26px;fill:var(--navy);transform:rotate(90deg);transform-origin:center}
#vidya .sx-ring .scap{font-size:10.5px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);text-align:center}
#vidya .sx-sigs{display:flex;flex-direction:column;gap:8px;min-width:0}
#vidya .sx-sig{display:flex;align-items:center;gap:10px;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:10px 12px;font-size:12px;opacity:0;transform:translateX(18px)}
#vidya .sx-sig .ic{flex:none;width:28px;height:28px;border-radius:8px;display:grid;place-items:center;font-size:13px;background:var(--sc,#eef2f8)}
#vidya .sx-sig b{color:var(--navy)}
#vidya .sx-sig .w{margin-left:auto;font-family:var(--font-m);font-size:10px;font-weight:600;color:var(--teal);flex:none}
#vidya .sx-verdict{margin-top:12px;display:flex;align-items:center;gap:10px;background:linear-gradient(100deg,var(--navy),var(--navy-2));border-radius:var(--r-sm);padding:12px 15px;color:#fff;font-size:12.5px;line-height:1.5;opacity:0;transform:translateY(12px)}
#vidya .sx-verdict b{color:#ffd9c2}
#vidya .sx-verdict .zap{font-size:17px;flex:none}
#vidya .fx-day{font-family:var(--font-m);font-size:10px;font-weight:600;letter-spacing:.1em;color:var(--muted);margin:13px 2px 7px}
#vidya .fx-card{display:grid;grid-template-columns:auto 1fr auto;gap:11px;align-items:center;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:11px 13px;margin-bottom:8px;opacity:0;transform:translateY(14px)}
#vidya .fx-card.due{border-color:#f9c4a6;background:linear-gradient(#fff,#fff8f3)}
#vidya .fx-ic{width:33px;height:33px;border-radius:10px;display:grid;place-items:center;font-size:15px;background:var(--fic,#eef2f8);flex:none}
#vidya .fx-tt{font-size:12.5px;font-weight:600;color:var(--navy);line-height:1.35}
#vidya .fx-sub{font-size:11px;color:var(--muted);margin-top:2px;line-height:1.4}
#vidya .fx-when{font-family:var(--font-m);font-size:9.5px;font-weight:600;color:var(--muted);text-align:right;white-space:nowrap}
#vidya .fx-when.now{color:var(--orange)}
#vidya .fx-auto{margin-top:12px;display:flex;align-items:center;gap:10px;font-size:11.5px;line-height:1.5;color:var(--muted);background:var(--teal-soft);border:1px dashed #9fdcd0;border-radius:var(--r-sm);padding:10px 13px;opacity:0;transform:translateY(14px)}
#vidya .fx-auto b{color:var(--teal)}
#vidya .cx{display:grid;grid-template-columns:198px 1fr;gap:14px;min-height:100%}
#vidya .cx-card{background:linear-gradient(160deg,var(--navy),var(--navy-2));border-radius:var(--r-md);padding:20px 14px;color:#fff;display:flex;flex-direction:column;align-items:center;text-align:center;gap:11px;height:fit-content}
#vidya .cx-ring{position:relative;width:58px;height:58px;border-radius:50%;background:rgba(255,255,255,.1);display:grid;place-items:center;flex:none}
#vidya .cx-ring::before, #vidya .cx-ring::after{content:"";position:absolute;inset:0;border-radius:50%;border:2px solid rgba(222,110,48,.7);animation:vx-ping 2s ease-out infinite}
#vidya .cx-ring::after{animation-delay:1s}
#vidya .cx-ring svg{width:22px;height:22px;color:#ffb38a;position:relative;z-index:1}
#vidya .cx-num{font-family:var(--font-m);font-size:10.5px;color:#bfd0e6}
#vidya .cx-tt{font-family:var(--font-d);font-size:13.5px;font-weight:700}
#vidya .cx-waves{display:flex;align-items:center;gap:3px;height:24px}
#vidya .cx-waves i{width:3px;border-radius:3px;background:var(--orange);animation:vx-wave 1s ease-in-out infinite}
@keyframes vx-wave{0%,100%{height:5px}50%{height:var(--h,20px)}}
#vidya .cx-timer{font-family:var(--font-m);font-size:10.5px;color:#9fb4d0;background:rgba(255,255,255,.08);border-radius:6px;padding:3px 9px}
#vidya .cx-script{display:flex;flex-direction:column;gap:8px;min-width:0}
#vidya .cx-line{max-width:90%;font-size:12px;line-height:1.5;border-radius:11px;padding:9px 12px;opacity:0;transform:translateY(14px)}
#vidya .cx-line.ai{align-self:flex-start;background:#fff;border:1px solid var(--line);color:var(--ink);border-bottom-left-radius:4px}
#vidya .cx-line.ai b{color:var(--orange);font-family:var(--font-m);font-size:9px;font-weight:600;display:block;margin-bottom:2px;letter-spacing:.06em}
#vidya .cx-line.hu{align-self:flex-end;background:var(--navy);color:#e9f0fa;border-bottom-right-radius:4px}
#vidya .cx-line.sys{align-self:center;background:var(--teal-soft);border:1px solid #b6e6dc;color:var(--teal);font-family:var(--font-m);font-size:10px;font-weight:600;border-radius:99px;padding:5px 12px;text-align:center}
#vidya .px-grid{display:grid;grid-template-columns:1fr 1fr;gap:11px}
#vidya .px-card{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:14px;min-width:0}
#vidya .px-card .h{font-size:10.5px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);margin-bottom:10px}
#vidya .px-bars{display:flex;align-items:flex-end;gap:7px;height:86px;padding-top:16px}
#vidya .px-bars i{flex:1;border-radius:5px 5px 2px 2px;background:linear-gradient(to top,#19335D,#3b6db3);height:0;position:relative;min-width:0}
#vidya .px-bars i.hot{background:linear-gradient(to top,#c45a22,var(--orange))}
#vidya .px-bars i::after{content:attr(data-v);position:absolute;top:-16px;left:50%;transform:translateX(-50%);font-family:var(--font-m);font-size:8.5px;font-weight:600;color:var(--muted)}
#vidya .px-leader{display:flex;flex-direction:column;gap:8px}
#vidya .px-row{display:grid;grid-template-columns:auto 1fr auto;align-items:center;gap:9px;font-size:11.5px}
#vidya .px-row .trk{height:7px;background:#eef2f8;border-radius:4px;overflow:hidden}
#vidya .px-row .trk i{display:block;height:100%;width:0;background:var(--pc,var(--teal));border-radius:4px}
#vidya .px-row .nm{font-weight:600;color:var(--navy);width:56px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#vidya .px-row .vl{font-family:var(--font-m);font-size:10px;font-weight:600;color:var(--muted);white-space:nowrap}
#vidya .px-stats{grid-column:1/-1;display:grid;grid-template-columns:repeat(3,1fr);gap:9px}
#vidya .px-stat{background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:12px 8px;text-align:center;min-width:0}
#vidya .px-stat .v{font-family:var(--font-d);font-size:clamp(16px,2vw,21px);font-weight:760;color:var(--navy);white-space:nowrap}
#vidya .px-stat .v em{font-style:normal;font-size:12px;color:var(--green)}
#vidya .px-stat .l{font-size:10px;color:var(--muted);margin-top:2px;line-height:1.35}
#vidya .mx-head{text-align:center;max-width:430px;margin:0 auto 16px}
#vidya .mx-head .eb{font-family:var(--font-m);font-size:10px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--orange)}
#vidya .mx-head h4{font-family:var(--font-d);font-size:clamp(17px,2vw,21px);font-weight:760;color:var(--navy);margin:7px 0 6px}
#vidya .mx-head p{font-size:12.5px;line-height:1.55;color:var(--muted)}
#vidya .mx-locked{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}
#vidya .mx-lk{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--line);border-radius:var(--r-sm);padding:10px 11px;font-size:11.5px;font-weight:600;color:var(--navy);opacity:0;transform:translateY(14px);cursor:pointer;min-width:0;transition:border-color .25s,box-shadow .25s}
#vidya .mx-lk:hover{border-color:#c8d4e4;box-shadow:var(--sh-sm)}
#vidya .mx-lk .ic{font-size:14px;flex:none}
#vidya .mx-lk .nm{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#vidya .mx-lk .lock{margin-left:auto;font-size:11px;opacity:.45;flex:none}
#vidya .mx-cta{margin-top:14px;display:flex;align-items:center;justify-content:space-between;gap:14px;background:linear-gradient(100deg,var(--navy),var(--navy-2));border-radius:var(--r-md);padding:16px 18px;color:#fff;opacity:0;transform:translateY(14px)}
#vidya .mx-cta b{font-family:var(--font-d);font-size:14.5px;display:block}
#vidya .mx-cta span{font-size:12px;color:#b9c9df;display:block;margin-top:3px;max-width:340px;line-height:1.5}
#vidya .mx-btn{flex:none;display:inline-flex;align-items:center;gap:8px;background:var(--orange);color:#fff;font-weight:700;font-size:13px;border-radius:11px;padding:12px 19px;text-decoration:none;transition:.25s;box-shadow:0 10px 24px -8px rgba(222,110,48,.6)}
#vidya .mx-btn:hover{background:#c45a22;transform:translateY(-2px)}
#vidya .mx-btn svg{width:14px;height:14px;transition:transform .25s}
#vidya .mx-btn:hover svg{transform:translateX(3px)}
#vidya .stg{transition:opacity .55s cubic-bezier(.3,.7,.3,1),transform .55s cubic-bezier(.3,.7,.3,1)}
#vidya .stg.in{opacity:1;transform:none}
#vidya .vx-proof{padding:clamp(36px,6vw,80px) 0;display:grid;grid-template-columns:repeat(4,1fr);gap:11px}
#vidya .vx-pf{background:#fff;border:1px solid var(--line);border-radius:var(--r-md);padding:16px 18px;box-shadow:var(--sh-sm)}
#vidya .vx-pf .v{font-family:var(--font-d);font-size:clamp(21px,2.6vw,30px);font-weight:760;color:var(--navy);font-variant-numeric:tabular-nums}
#vidya .vx-pf .v em{font-style:normal;color:var(--orange)}
#vidya .vx-pf .l{font-size:12px;color:var(--muted);margin-top:3px;line-height:1.45}
#vidya .rv{opacity:0;transform:translateY(22px);transition:opacity .7s ease,transform .7s ease}
#vidya .rv.in{opacity:1;transform:none}
@media (max-width:1120px){#vidya .vx-grid{grid-template-columns:minmax(260px,330px) 1fr}}
@media (max-width:920px){#vidya .vx-grid{display:block}
#vidya .vx-stage{position:sticky;top:0;height:auto;z-index:8;padding:10px 0 8px;
    background:linear-gradient(var(--paper) 92%,rgba(246,248,252,0))}
#vidya .vx-body{height:min(50vh,440px);height:min(50svh,440px);min-height:330px}
#vidya .vx-cap{display:none}
#vidya .vx-dots{margin-top:10px}
#vidya .vx-rail{padding-top:8px}
#vidya .vx-trigger{min-height:74vh;min-height:74svh;padding:5vh 0}
#vidya .vx-trigger:first-child{min-height:62vh;min-height:62svh}
#vidya .vx-trigger:last-child{min-height:86vh;min-height:86svh}
#vidya .vx-step{grid-template-columns:38px 1fr;padding:17px 17px 17px 23px}
#vidya .vx-step .num{width:38px;height:38px;border-radius:11px;font-size:12px}
#vidya .sx-grid{grid-template-columns:150px 1fr}
#vidya .vx-proof{grid-template-columns:repeat(2,1fr)}
#vidya .mx-cta{flex-direction:column;align-items:flex-start}}
@media (max-width:640px){#vidya .dx-kpis{grid-template-columns:repeat(2,1fr)}
#vidya .px-grid{grid-template-columns:1fr}
#vidya .sx-grid{grid-template-columns:1fr}
#vidya .sx-ring{flex-direction:row;justify-content:flex-start;gap:14px;padding:12px 14px}
#vidya .sx-ring svg{width:86px;height:86px;flex:none}
#vidya .sx-ring .pct{font-size:30px}
#vidya .cx{grid-template-columns:1fr}
#vidya .cx-card{flex-direction:row;flex-wrap:wrap;text-align:left;justify-content:flex-start;padding:13px 14px;gap:10px}
#vidya .cx-waves{margin-left:auto}
#vidya .mx-locked{grid-template-columns:repeat(2,1fr)}
#vidya .vx-live{display:none}
#vidya .px-stats{grid-template-columns:repeat(3,1fr)}}
@media (max-width:400px){#vidya .vx-body{min-height:310px}
#vidya .vx-view{padding:12px}
#vidya .dx-frow{grid-template-columns:60px 1fr 40px}
#vidya .lx-btn{padding:7px 9px;font-size:10.5px}
#vidya .mx-locked{grid-template-columns:1fr 1fr}
#vidya .px-stats{grid-template-columns:1fr 1fr;gap:8px}
#vidya .vx-proof{grid-template-columns:1fr 1fr}}
@media (max-height:680px) and (min-width:921px){#vidya .vx-body{height:min(62vh,460px);min-height:340px}
#vidya .vx-cap{display:none}
#vidya .vx-stage{padding:12px 0}}
@media (max-height:540px) and (max-width:920px){#vidya .vx-body{height:58vh;min-height:260px}
#vidya .vx-trigger{min-height:120vh}}
@media (prefers-reduced-motion:reduce){#vidya *, #vidya *::before, #vidya *::after{animation-duration:.001s!important;transition-duration:.001s!important}
#vidya{scroll-behavior:auto}}
</style>
<noscript><style>#vidya .vx-view{position:static!important;opacity:1!important;visibility:visible!important;height:auto!important}#vidya .vx-body{height:auto!important}#vidya .vx-trigger{min-height:0!important;padding:14px 0!important}#vidya .vx-step{opacity:1!important;transform:none!important;filter:none!important}#vidya .stg{opacity:1!important;transform:none!important}#vidya .vx-stage{position:static!important;height:auto!important}#vidya .vx-hint,#vidya .vx-dots,.vx-progress{display:none!important}</style></noscript>

<div class="vx-progress" id="vxProgress" aria-hidden="true"><i></i></div>
<div class="vx-toast" id="vxToast" role="status" aria-live="polite"></div>

<!-- ===================== VIDYA AI · SCROLL STORYTELLING + STICKY SCROLL ANIMATION ===================== -->
<!-- ===================== COUNSELLOR · REAL-TIME STREAMING DASHBOARD ===================== -->
<!-- ===================== Counsellor Intelligence (scoped #platform) ===================== -->
<style>
#platform{
  --orange:#DE6E30;
  --blue:#19335D;
  --white:#FFFFFF;
  --blue-70:rgba(25,51,93,.70);
  --blue-55:rgba(25,51,93,.55);
  --blue-12:rgba(25,51,93,.12);
  --blue-08:rgba(25,51,93,.08);
  --blue-04:rgba(25,51,93,.04);
  --orange-12:rgba(222,110,48,.12);
  --orange-08:rgba(222,110,48,.08);
  --radius:18px;
  --shadow:0 24px 60px -24px rgba(25,51,93,.22);
  font-size:16px;
}
#platform *{margin:0;padding:0;box-sizing:border-box}
#platform{font-family:'Inter',sans-serif;background:var(--white);color:var(--blue);-webkit-font-smoothing:antialiased}
#platform{position:relative;padding:104px 0;overflow:hidden;background:var(--white)}
#platform::before{content:"";position:absolute;inset:0;pointer-events:none;background:radial-gradient(900px 500px at 88% 8%, var(--orange-08), transparent 60%),radial-gradient(700px 460px at 0% 100%, var(--blue-04), transparent 60%);}
#platform .ci-container{max-width:1240px;margin:0 auto;padding:0 28px;position:relative}
#platform .ci-split{display:grid;grid-template-columns:0.86fr 1.14fr;gap:64px;align-items:center}
#platform .ci-eyebrow{display:inline-flex;align-items:center;gap:9px;font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--orange);background:var(--white);border:1px solid var(--blue-12);padding:8px 14px;border-radius:999px;box-shadow:0 2px 10px var(--blue-08);}
#platform .ci-dot{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:ci-pulse 1.8s ease-out infinite}
@keyframes ci-pulse{0%{box-shadow:0 0 0 0 rgba(222,110,48,.45)}70%{box-shadow:0 0 0 9px rgba(222,110,48,0)}100%{box-shadow:0 0 0 0 rgba(222,110,48,0)}}
#platform .ci-h2{font-weight:800;font-size:clamp(2.05rem,3.5vw,2.9rem);line-height:1.12;letter-spacing:-.025em;margin:22px 0 18px;color:var(--blue);}
#platform .ci-h2 em{font-style:normal;color:var(--orange)}
#platform .ci-lead{font-size:1.05rem;line-height:1.65;color:var(--blue-70);max-width:46ch}
#platform .ci-feats{margin-top:34px;display:flex;flex-direction:column}
#platform .ci-feat{display:grid;grid-template-columns:46px 1fr auto;gap:16px;align-items:center;padding:18px 4px;border-top:1px solid var(--blue-12);transition:background .25s ease,padding-left .25s ease;cursor:default;}
#platform .ci-feat:last-of-type{border-bottom:1px solid var(--blue-12)}
#platform .ci-feat:hover{background:var(--orange-08);padding-left:12px;border-radius:12px}
#platform .ci-feat__ic{width:46px;height:46px;border-radius:14px;display:grid;place-items:center;font-size:1.2rem;background:var(--white);border:1px solid var(--blue-12);box-shadow:0 4px 12px var(--blue-08);}
#platform .ci-feat b{display:block;font-size:.98rem;font-weight:700;margin-bottom:3px;color:var(--blue)}
#platform .ci-feat span.d{display:block;font-size:.86rem;color:var(--blue-70);line-height:1.5}
#platform .ci-feat .stat{font-weight:800;font-size:1.2rem;color:var(--orange);white-space:nowrap;letter-spacing:-.02em}
#platform .ci-feat .stat small{display:block;font-weight:600;font-size:.6rem;color:var(--blue-55);letter-spacing:.08em;text-transform:uppercase;text-align:right}
#platform .ci-ctas{display:flex;align-items:center;gap:18px;margin-top:30px;flex-wrap:wrap}
#platform .ci-btn{display:inline-flex;align-items:center;gap:10px;background:var(--blue);color:var(--white);text-decoration:none;font-weight:600;font-size:.92rem;padding:15px 26px;border-radius:999px;transition:transform .2s ease,box-shadow .2s ease,background .2s;}
#platform .ci-btn:hover{transform:translateY(-2px);background:var(--orange);box-shadow:0 14px 30px -12px rgba(222,110,48,.5)}
#platform .ci-btn svg{transition:transform .2s}
#platform .ci-btn:hover svg{transform:translateX(4px)}
#platform .ci-link{font-size:.9rem;font-weight:600;color:var(--blue);text-decoration:none;border-bottom:2px solid var(--orange);padding-bottom:2px}
#platform .ci-link:hover{color:var(--orange)}
#platform .ci-dash{background:var(--white);border:1px solid var(--blue-12);border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;transform:perspective(1400px) rotateY(-2.5deg) rotateX(1deg);transition:transform .5s ease;}
#platform .ci-dash:hover{transform:perspective(1400px) rotateY(0) rotateX(0)}
#platform .ci-bar{display:flex;align-items:center;gap:12px;padding:13px 18px;border-bottom:1px solid var(--blue-12);background:var(--blue-04);}
#platform .ci-traffic{display:flex;gap:6px}
#platform .ci-traffic i{width:9px;height:9px;border-radius:50%}
#platform .ci-traffic i:nth-child(1){background:var(--orange)}
#platform .ci-traffic i:nth-child(2){background:rgba(222,110,48,.5)}
#platform .ci-traffic i:nth-child(3){background:var(--blue-12)}
#platform .ci-url{flex:1;font-size:.74rem;color:var(--blue-70);background:var(--white);border:1px solid var(--blue-12);border-radius:8px;padding:6px 12px;text-align:center;}
#platform .ci-live{display:inline-flex;align-items:center;gap:7px;font-size:.7rem;font-weight:700;color:var(--orange);letter-spacing:.05em}
#platform .ci-live i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:ci-pulse 1.6s infinite}
#platform .ci-tabs{display:flex;gap:6px;padding:14px 18px 0}
#platform .ci-tab{border:1px solid var(--blue-12);background:var(--white);color:var(--blue-70);font-family:'Inter',sans-serif;font-size:.74rem;font-weight:600;padding:7px 16px;border-radius:999px;cursor:pointer;transition:all .2s;}
#platform .ci-tab.on{background:var(--blue);color:var(--white);border-color:var(--blue)}
#platform .ci-tab:not(.on):hover{border-color:var(--blue)}
#platform .ci-kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;padding:14px 18px 4px}
#platform .ci-kpi{background:var(--blue-04);border:1px solid var(--blue-12);border-radius:13px;padding:12px 14px;transition:transform .2s,box-shadow .2s;}
#platform .ci-kpi:hover{transform:translateY(-3px);box-shadow:0 10px 22px -12px rgba(25,51,93,.3)}
#platform .ci-kpi .l{font-size:.6rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--blue-55)}
#platform .ci-kpi .v{font-weight:800;font-size:1.4rem;margin-top:4px;color:var(--blue);letter-spacing:-.02em}
#platform .ci-kpi .t{font-size:.66rem;font-weight:600;margin-top:3px}
#platform .t.up{color:var(--blue-70)}
#platform .t.dn{color:var(--orange)}
#platform .ci-label{display:flex;justify-content:space-between;align-items:baseline;padding:16px 18px 8px;font-size:.78rem;font-weight:700;color:var(--blue)}
#platform .ci-label span{font-weight:400;font-size:.68rem;color:var(--blue-55)}
#platform .ci-funnel{display:flex;flex-direction:column;gap:6px;padding:0 18px}
#platform .ci-stage{display:grid;grid-template-columns:96px 1fr 64px;gap:12px;align-items:center;font-size:.74rem}
#platform .ci-stage .n{color:var(--blue-70);font-weight:500}
#platform .ci-stage .bar{height:22px;border-radius:7px;background:var(--blue-08);overflow:hidden;position:relative}
#platform .ci-stage .bar i{display:block;height:100%;border-radius:7px;width:0;background:linear-gradient(90deg,var(--blue),rgba(25,51,93,.75));transition:width 1.1s cubic-bezier(.22,.8,.3,1);position:relative;}
#platform .ci-stage .bar i::after{content:"";position:absolute;inset:0;background:linear-gradient(110deg,transparent 30%,rgba(255,255,255,.3) 50%,transparent 70%);transform:translateX(-100%);animation:ci-sheen 3.2s ease infinite;}
@keyframes ci-sheen{60%{transform:translateX(100%)}100%{transform:translateX(100%)}}
#platform .ci-stage .c{font-weight:700;text-align:right;font-variant-numeric:tabular-nums;color:var(--blue)}
#platform .ci-stage.alert .bar i{background:linear-gradient(90deg,var(--orange),rgba(222,110,48,.8))}
#platform .ci-stuck{margin:10px 18px 0;display:flex;align-items:center;gap:10px;background:var(--orange-08);border:1px solid rgba(222,110,48,.3);border-radius:11px;padding:9px 13px;font-size:.74rem;color:var(--blue-70);}
#platform .ci-stuck b{color:var(--orange)}
#platform .ci-stuck .fix{margin-left:auto;font-weight:700;font-size:.7rem;color:var(--orange);cursor:pointer;white-space:nowrap}
#platform .ci-leadb{padding:4px 18px 6px;display:flex;flex-direction:column;gap:5px}
#platform .ci-row{display:grid;grid-template-columns:34px 1fr 110px 44px 70px;gap:11px;align-items:center;padding:8px 10px;border-radius:11px;font-size:.78rem;transition:background .2s;}
#platform .ci-row:hover{background:var(--orange-08)}
#platform .ci-av{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;font-size:.66rem;font-weight:700;color:var(--white);background:var(--blue);}
#platform .ci-row:nth-child(1) .ci-av{background:var(--orange)}
#platform .ci-row:nth-child(3) .ci-av{background:rgba(25,51,93,.75)}
#platform .ci-row:nth-child(4) .ci-av{background:rgba(25,51,93,.55)}
#platform .ci-row .nm b{display:block;font-weight:600;color:var(--blue)}
#platform .ci-row .nm small{color:var(--blue-55);font-size:.64rem}
#platform .ci-track{height:7px;border-radius:99px;background:var(--blue-08);overflow:hidden}
#platform .ci-track i{display:block;height:100%;border-radius:99px;background:linear-gradient(90deg,var(--orange),rgba(222,110,48,.75));width:0;transition:width 1.2s cubic-bezier(.22,.8,.3,1)}
#platform .ci-pct{font-weight:700;text-align:right;font-variant-numeric:tabular-nums;color:var(--blue)}
#platform .ci-tag{font-size:.6rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;text-align:center;padding:4px 0;border-radius:99px}
#platform .ci-tag.top{background:var(--blue);color:var(--white)}
#platform .ci-tag.ok{background:var(--blue-08);color:var(--blue-70)}
#platform .ci-tag.coach{background:var(--orange-12);color:var(--orange)}
#platform .ci-feed{border-top:1px solid var(--blue-12);background:var(--blue-04);padding:12px 18px 16px}
#platform .ci-feed .hd{display:flex;align-items:center;gap:8px;font-size:.66rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--blue-55);margin-bottom:9px}
#platform .ci-feed .hd i{width:6px;height:6px;border-radius:50%;background:var(--orange);animation:ci-pulse 1.6s infinite}
#platform .ci-feed-item{display:flex;gap:9px;align-items:center;font-size:.74rem;color:var(--blue-70);padding:5px 0;animation:ci-slideIn .45s ease both;}
#platform .ci-feed-item b{color:var(--blue);font-weight:600}
#platform .ci-feed-item .tm{margin-left:auto;font-size:.64rem;color:var(--blue-55);white-space:nowrap}
@keyframes ci-slideIn{from{opacity:0;transform:translateY(-7px)}to{opacity:1;transform:none}}
#platform .rv2{opacity:0;transform:translateY(26px);transition:opacity .7s ease,transform .7s ease}
#platform .rv2.in{opacity:1;transform:none}
@media(max-width:980px){#platform .ci-split{grid-template-columns:1fr;gap:44px}
#platform .ci-dash{transform:none}
#platform .ci-kpis{grid-template-columns:repeat(2,1fr)}
#platform .ci-row{grid-template-columns:34px 1fr 44px 70px}
#platform .ci-track{display:none}}
</style>

<section class="ci-sec" id="platform">
  <div class="ci-container ci-split">

    <!-- LEFT -->
    <div class="rv2">
      <span class="ci-eyebrow"><span class="ci-dot"></span> Counsellor Intelligence</span>
      <h2 class="ci-h2">Every admission. Tracked.<br><em>Moving forward.</em></h2>
      <p class="ci-lead">Your entire admission team on one live screen — who is converting, who needs coaching, and exactly where each lead is stuck. No exports. No guesswork. Just numbers that update as your team works.</p>

      <div class="ci-feats">
        <div class="ci-feat">
          <div class="ci-feat__ic">🎯</div>
          <div><b>Funnel Management</b><span class="d">Spot the exact stage where leads stall and clear bottlenecks before the cycle slips.</span></div>
          <div class="stat">0<small>leads lost</small></div>
        </div>
        <div class="ci-feat">
          <div class="ci-feat__ic">🔔</div>
          <div><b>Smart Follow-ups</b><span class="d">Auto-triggers fire reminders, WhatsApp nudges and call tasks at the right moment.</span></div>
          <div class="stat">+65%<small>engagement</small></div>
        </div>
        <div class="ci-feat">
          <div class="ci-feat__ic">📊</div>
          <div><b>Real-time Insights</b><span class="d">See top-performing sources, courses and counsellors the moment trends shift.</span></div>
          <div class="stat">1.4m<small>avg response</small></div>
        </div>
      </div>

      <div class="ci-ctas">
        <a href="#demo" class="ci-btn">Explore the Flow
          <svg aria-hidden="true" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="#demo" class="ci-link">Watch 2-min walkthrough</a>
      </div>
    </div>

    <!-- RIGHT · DASHBOARD -->
    <div class="ci-dash rv2" aria-hidden="true">
      <div class="ci-bar">
        <span class="ci-traffic"><i></i><i></i><i></i></span>
        <span class="ci-url">app.extraaedge.com/admissions</span>
        <span class="ci-live"><i></i>LIVE</span>
      </div>

      <div class="ci-tabs">
        <button class="ci-tab on" data-view="today">Today</button>
        <button class="ci-tab" data-view="week">This Week</button>
        <button class="ci-tab" data-view="cycle">Cycle</button>
      </div>

      <div class="ci-kpis">
        <div class="ci-kpi"><div class="l">Conversion</div><div class="v" id="kConv">0%</div><div class="t up" id="tConv">▲ 12% vs last</div></div>
        <div class="ci-kpi"><div class="l">Response time</div><div class="v" id="kRt">0m</div><div class="t up" id="tRt">▲ 9.2x faster</div></div>
        <div class="ci-kpi"><div class="l">Active leads</div><div class="v" id="kAct">0</div><div class="t up" id="tAct">▲ 184 new</div></div>
        <div class="ci-kpi"><div class="l">Idle &gt; 48h</div><div class="v" id="kIdle" style="color:var(--orange)">0</div><div class="t dn" id="tIdle">needs action</div></div>
      </div>

      <div class="ci-label">Pipeline by stage <span id="viewTag">· today</span></div>
      <div class="ci-funnel" id="funnel">
        <div class="ci-stage"><span class="n">Enquiry</span><span class="bar"><i data-w="96"></i></span><span class="c">1,248</span></div>
        <div class="ci-stage"><span class="n">Counselling</span><span class="bar"><i data-w="71"></i></span><span class="c">912</span></div>
        <div class="ci-stage alert"><span class="n">Application</span><span class="bar"><i data-w="42"></i></span><span class="c">534</span></div>
        <div class="ci-stage"><span class="n">Fee paid</span><span class="bar"><i data-w="27"></i></span><span class="c">341</span></div>
      </div>
      <div class="ci-stuck">⚠️ <span><b>23 leads</b> idle at Application for 48h+</span><span class="fix">Auto-assign follow-ups →</span></div>

      <div class="ci-label">Counsellor leaderboard <span>this cycle</span></div>
      <div class="ci-leadb">
        <div class="ci-row">
          <span class="ci-av">PS</span>
          <span class="nm"><b>Priya S.</b><small>62 calls · 31 follow-ups</small></span>
          <span class="ci-track"><i data-w="92"></i></span>
          <span class="ci-pct">24%</span><span class="ci-tag top">▲ Top</span>
        </div>
        <div class="ci-row">
          <span class="ci-av">RM</span>
          <span class="nm"><b>Rahul M.</b><small>54 calls · 26 follow-ups</small></span>
          <span class="ci-track"><i data-w="74"></i></span>
          <span class="ci-pct">19%</span><span class="ci-tag ok">On track</span>
        </div>
        <div class="ci-row">
          <span class="ci-av">AK</span>
          <span class="nm"><b>Aisha K.</b><small>49 calls · 22 follow-ups</small></span>
          <span class="ci-track"><i data-w="62"></i></span>
          <span class="ci-pct">16%</span><span class="ci-tag ok">On track</span>
        </div>
        <div class="ci-row">
          <span class="ci-av">VT</span>
          <span class="nm"><b>Vikram T.</b><small>28 calls · 9 follow-ups</small></span>
          <span class="ci-track"><i data-w="42"></i></span>
          <span class="ci-pct">11%</span><span class="ci-tag coach">Coach</span>
        </div>
      </div>

      <div class="ci-feed">
        <div class="hd"><i></i> Live activity</div>
        <div id="feed"></div>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
const io = new IntersectionObserver(es => es.forEach(e => {
  if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
}), { threshold: .15 });
document.querySelectorAll('.rv2').forEach(el => io.observe(el));

function countUp(el, end, suffix, dur = 1100, decimals = 0) {
  const t0 = performance.now();
  (function step(t) {
    const p = Math.min((t - t0) / dur, 1);
    const eased = 1 - Math.pow(1 - p, 3);
    el.textContent = (end * eased).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',') + suffix;
    if (p < 1) requestAnimationFrame(step);
  })(t0);
}

const VIEWS = {
  today: { conv: [38, '%'], rt: [1.4, 'm', 1], act: [1248, ''], idle: [23, ''],
           stages: [[96, '1,248'], [71, '912'], [42, '534'], [27, '341']] },
  week:  { conv: [34, '%'], rt: [1.8, 'm', 1], act: [6930, ''], idle: [61, ''],
           stages: [[96, '6,930'], [68, '4,710'], [39, '2,720'], [24, '1,660']] },
  cycle: { conv: [29, '%'], rt: [2.3, 'm', 1], act: [48210, ''], idle: [204, ''],
           stages: [[96, '48,210'], [64, '32,400'], [36, '17,900'], [21, '10,350']] }
};

function render(view) {
  const v = VIEWS[view];
  countUp(document.getElementById('kConv'), v.conv[0], v.conv[1]);
  countUp(document.getElementById('kRt'),  v.rt[0],  v.rt[1], 1100, v.rt[2]);
  countUp(document.getElementById('kAct'), v.act[0], v.act[1]);
  countUp(document.getElementById('kIdle'),v.idle[0],v.idle[1]);
  document.getElementById('viewTag').textContent = '· ' + (view === 'today' ? 'today' : view === 'week' ? 'this week' : 'full cycle');
  document.querySelectorAll('#funnel .ci-stage').forEach((row, i) => {
    row.querySelector('.bar i').style.width = v.stages[i][0] + '%';
    row.querySelector('.c').textContent = v.stages[i][1];
  });
}

document.querySelectorAll('.ci-tab').forEach(tab => tab.addEventListener('click', () => {
  document.querySelectorAll('.ci-tab').forEach(t => t.classList.remove('on'));
  tab.classList.add('on');
  render(tab.dataset.view);
}));

const dashIO = new IntersectionObserver(es => es.forEach(e => {
  if (!e.isIntersecting) return;
  render('today');
  document.querySelectorAll('.ci-track i').forEach(i => i.style.width = i.dataset.w + '%');
  startFeed();
  dashIO.disconnect();
}), { threshold: .3 });
dashIO.observe(document.querySelector('.ci-dash'));

const EVENTS = [
  ['📞', '<b>Priya S.</b> connected with Ananya R. — MBA enquiry'],
  ['✅', '<b>Rohan D.</b> moved to <b>Application</b> stage'],
  ['💬', 'WhatsApp nudge auto-sent to <b>12 idle leads</b>'],
  ['💰', '<b>Fee received</b> — Kavya N., B.Tech CSE'],
  ['🔔', 'Follow-up auto-assigned to <b>Vikram T.</b>'],
  ['📈', 'Source <b>Google Ads</b> conversion up 8% today'],
  ['📞', '<b>Aisha K.</b> scheduled campus visit — Arjun P.'],
  ['✅', '<b>Meera J.</b> verified documents — moved forward']
];
let feedTimer = null, ei = 0;
function pushEvent() {
  const feed = document.getElementById('feed');
  const [ic, txt] = EVENTS[ei++ % EVENTS.length];
  const el = document.createElement('div');
  el.className = 'ci-feed-item';
  el.innerHTML = `<span>${ic}</span><span>${txt}</span><span class="tm">just now</span>`;
  feed.prepend(el);
  feed.querySelectorAll('.tm').forEach((t, i) => { if (i > 0) t.textContent = i + 'm ago'; });
  while (feed.children.length > 3) feed.lastChild.remove();
}
function startFeed() {
  pushEvent(); pushEvent(); pushEvent();
  feedTimer = setInterval(pushEvent, 3800);
}
})();
</script>
<!-- ===================== Admission Response Automation · Respond First (inline, namespaced rf-) ===================== -->
<style>
.rf-bp{
  --orange:#DE6E30;
  --orange-90:rgba(222,110,48,.9);
  --orange-60:rgba(222,110,48,.6);
  --orange-12:rgba(222,110,48,.12);
  --orange-08:rgba(222,110,48,.08);
  --blue:#19335D;
  --blue-70:rgba(25,51,93,.7);
  --blue-55:rgba(25,51,93,.55);
  --blue-12:rgba(25,51,93,.12);
  --blue-04:rgba(25,51,93,.04);
  --line:rgba(25,51,93,.12);
  --line-strong:rgba(25,51,93,.45);
  --w-90:rgba(255,255,255,.9);
  --w-60:rgba(255,255,255,.6);
  --w-35:rgba(255,255,255,.35);
  --w-15:rgba(255,255,255,.15);
  --w-06:rgba(255,255,255,.06);
  --font:'Inter',sans-serif;
  font-family:var(--font);
  background:#ffffff; color:var(--blue);
  position:relative;
  -webkit-font-smoothing:antialiased;
}
.rf-bp *{box-sizing:border-box;margin:0;padding:0}
.rf-bp::before{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:
    repeating-linear-gradient(0deg,transparent 0 35px,var(--line) 35px 36px),
    repeating-linear-gradient(90deg,transparent 0 35px,var(--line) 35px 36px);
  mask-image:radial-gradient(130% 100% at 65% 0%,#000 25%,transparent 78%);
  opacity:.6;
}
.rf-wrap{max-width:1200px;margin:0 auto;padding:96px 28px 0;position:relative;z-index:1}
.rf-anno{font:600 10px/1.6 var(--font);letter-spacing:.18em;text-transform:uppercase;color:var(--blue-55)}
.rf-anno b{color:var(--orange);font-weight:700}
.rf-hero{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:clamp(36px,5vw,72px);align-items:center}
.rf-kicker{display:inline-flex;align-items:center;gap:10px;font:700 10.5px/1 var(--font);letter-spacing:.22em;text-transform:uppercase;color:var(--orange);border:1px solid var(--orange-60);border-radius:3px;padding:9px 14px;background:#fff;position:relative}
.rf-kicker::before{content:"";position:absolute;left:-1px;top:-1px;width:8px;height:8px;border-top:2px solid var(--orange);border-left:2px solid var(--orange)}
.rf-kicker i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:rf-ping 1.6s ease-out infinite}
@keyframes rf-ping{0%{box-shadow:0 0 0 0 rgba(222,110,48,.5)}100%{box-shadow:0 0 0 11px rgba(222,110,48,0)}}
.rf-h1{font:800 clamp(38px,5.2vw,68px)/1.05 var(--font);letter-spacing:-.03em;margin:24px 0 20px;max-width:15ch}
.rf-h1 em{font-style:italic;font-weight:700;color:var(--orange);position:relative;white-space:nowrap}
.rf-h1 em svg{position:absolute;left:0;right:0;bottom:-.16em;width:100%;height:.3em;overflow:visible}
.rf-h1 em svg path{fill:none;stroke:var(--orange);stroke-width:3.4;stroke-linecap:round;stroke-dasharray:320;stroke-dashoffset:320;animation:rf-draw 1s ease .5s forwards}
@keyframes rf-draw{to{stroke-dashoffset:0}}
.rf-lead{max-width:50ch;font-size:17px;line-height:1.7;color:var(--blue-70);font-weight:400}
.rf-lead b{color:var(--blue);font-weight:600}
.rf-race{margin-top:34px;border:1.5px solid var(--blue);border-radius:14px;background:#fff;padding:18px 20px 20px;position:relative;box-shadow:6px 6px 0 var(--blue-12)}
.rf-race .rf-anno{display:flex;justify-content:space-between;margin-bottom:14px}
.rf-lane{margin-top:12px}
.rf-lane small{display:flex;justify-content:space-between;font:600 10px var(--font);letter-spacing:.12em;color:var(--blue-55);text-transform:uppercase}
.rf-lane small output{font-size:12px}
.rf-lane .bar{height:12px;margin-top:7px;border-radius:99px;background:var(--blue-04);border:1px solid var(--line);overflow:hidden;position:relative}
.rf-lane .fill{height:100%;width:0;border-radius:99px;transition:width 1.6s cubic-bezier(.2,.8,.2,1)}
.rf-lane.you .fill{background:var(--orange);box-shadow:0 0 14px rgba(222,110,48,.45)}
.rf-lane.you output{color:var(--orange);font-weight:700}
.rf-lane.them .fill{background:repeating-linear-gradient(135deg,var(--blue-12) 0 8px,rgba(25,51,93,.22) 8px 16px)}
.rf-race-foot{margin-top:14px;font:500 11.5px var(--font);color:var(--blue-55)}
.rf-race-foot b{color:var(--orange);font-weight:700}
.rf-ctarow{display:flex;flex-wrap:wrap;align-items:center;gap:16px;margin-top:30px}
.rf-cta{display:inline-flex;align-items:center;gap:10px;font:600 14.5px var(--font);color:#fff;text-decoration:none;background:var(--blue);padding:16px 26px;border-radius:10px;box-shadow:5px 5px 0 var(--orange);transition:.18s;border:none;cursor:pointer}
.rf-cta:hover{transform:translate(3px,3px);box-shadow:2px 2px 0 var(--orange)}
.rf-cta svg{transition:transform .2s}
.rf-cta:hover svg{transform:translateX(4px)}
.rf-cta--ghost{background:#fff;color:var(--blue);border:1.5px solid var(--blue);box-shadow:5px 5px 0 var(--blue-12)}
.rf-cta--ghost:hover{box-shadow:2px 2px 0 var(--blue-12)}
.rf-trust{font-size:12.5px;color:var(--blue-55);margin-top:14px;display:flex;align-items:center;gap:8px}
.rf-trust .stars{color:var(--orange);letter-spacing:2px}
.rf-sim{position:relative}
.rf-sim-frame{border-radius:20px;background:var(--blue);border:1px solid var(--w-15);color:#fff;box-shadow:0 50px 90px -34px rgba(25,51,93,.55),0 0 0 9px var(--w-60),0 0 0 10px var(--line);overflow:hidden;position:relative}
.rf-sim-frame::before{content:"";position:absolute;inset:0;pointer-events:none;background:repeating-linear-gradient(0deg,transparent 0 35px,var(--w-06) 35px 36px),repeating-linear-gradient(90deg,transparent 0 35px,var(--w-06) 35px 36px)}
.rf-sim-hd{display:flex;justify-content:space-between;align-items:center;padding:15px 20px;border-bottom:1px solid var(--w-15);font:700 11px var(--font);letter-spacing:.14em}
.rf-live{display:inline-flex;align-items:center;gap:8px;font:700 10px var(--font);letter-spacing:.18em;color:var(--orange)}
.rf-live i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:rf-ping 1.5s infinite}
.rf-sim-body{padding:22px 20px 20px;position:relative;min-height:336px}
.rf-clock{display:flex;align-items:baseline;gap:10px;font:800 54px/1 var(--font);color:#fff;letter-spacing:-.03em;font-variant-numeric:tabular-nums}
.rf-clock small{font:700 10px var(--font);letter-spacing:.2em;color:var(--w-35)}
.rf-clock .unit{font-size:20px;color:var(--orange)}
.rf-ledger{margin-top:18px;display:flex;flex-direction:column;font:500 12px var(--font)}
.rf-ev{display:grid;grid-template-columns:60px 18px 1fr;align-items:start;gap:10px;padding:9px 0;opacity:.25;transition:opacity .4s}
.rf-ev.on{opacity:1}
.rf-ev .t{color:var(--orange);font-weight:700;font-size:11px;letter-spacing:.04em}
.rf-ev .nd{width:11px;height:11px;margin-top:2px;border-radius:50%;border:2px solid var(--w-35);position:relative}
.rf-ev.on .nd{border-color:var(--orange);background:var(--orange);box-shadow:0 0 10px rgba(222,110,48,.6)}
.rf-ev .nd::after{content:"";position:absolute;left:50%;top:13px;width:2px;height:22px;background:var(--w-15);transform:translateX(-50%)}
.rf-ev:last-child .nd::after{display:none}
.rf-ev .x{color:var(--w-90);line-height:1.5}
.rf-ev .x small{display:block;color:var(--w-35);font-size:10.5px}
.rf-ev .x .ok{color:var(--orange);font-weight:600}
.rf-stamp{position:absolute;right:22px;bottom:20px;transform:rotate(-7deg) scale(.6);opacity:0;border:2.5px solid var(--orange);color:var(--orange);border-radius:8px;padding:8px 14px;font:800 13px var(--font);letter-spacing:.2em;text-transform:uppercase;transition:.35s cubic-bezier(.2,1.6,.4,1)}
.rf-stamp.show{opacity:1;transform:rotate(-7deg) scale(1)}
.rf-sim-ft{display:flex;gap:10px;align-items:center;padding:14px 20px;border-top:1px solid var(--w-15)}
.rf-simbtn{flex:0 0 auto;font:700 12px var(--font);letter-spacing:.04em;color:#fff;background:var(--orange);border:none;border-radius:8px;padding:12px 18px;cursor:pointer;transition:.18s;box-shadow:0 4px 14px rgba(222,110,48,.4)}
.rf-simbtn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(222,110,48,.5)}
.rf-simbtn:disabled{opacity:.5;cursor:wait;transform:none}
.rf-sim-ft p{font:500 10.5px/1.5 var(--font);color:var(--w-35)}
.rf-spec{position:absolute;font:600 9.5px var(--font);letter-spacing:.14em;color:var(--blue-55);background:#fff;border:1px solid var(--line-strong);border-radius:4px;padding:6px 9px;z-index:2;box-shadow:3px 3px 0 var(--blue-12)}
.rf-spec b{color:var(--orange)}
.rf-spec--a{top:-14px;left:-18px;transform:rotate(-2deg)}
.rf-spec--b{bottom:34px;right:-16px;transform:rotate(2deg)}
.rf-section-hd{margin:96px 0 56px;display:flex;justify-content:space-between;align-items:flex-end;gap:40px}
.rf-h2{font:800 clamp(30px,3.6vw,48px)/1.1 var(--font);letter-spacing:-.025em;max-width:21ch}
.rf-h2 em{font-style:italic;font-weight:700;color:var(--orange)}
.rf-index{font:600 10.5px/2 var(--font);letter-spacing:.06em;color:var(--blue-55);text-align:right;white-space:nowrap;display:none}
@media(min-width:960px){.rf-index{display:block}}
.rf-index span{color:var(--orange)}
.rf-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:clamp(36px,6vw,90px);align-items:start}
.rf-stories{position:relative;padding-left:42px}
.rf-rail{position:absolute;left:11px;top:8px;bottom:8px;width:2px;background:var(--line)}
.rf-rail i{position:absolute;left:0;top:0;width:2px;height:0;background:var(--orange)}
.rf-story{padding:8.5vh 0;max-width:46ch;position:relative;opacity:.28;transition:opacity .5s ease}
.rf-story:first-child{padding-top:2vh}
.rf-story.on{opacity:1}
.rf-node{position:absolute;left:-42px;top:calc(8.5vh + 4px);width:26px;height:26px;display:grid;place-items:center;font:700 10.5px var(--font);color:var(--blue-55);background:#fff;border:1.5px solid var(--line-strong);border-radius:50%;cursor:pointer;transition:.3s}
.rf-story:first-child .rf-node{top:calc(2vh + 4px)}
.rf-node:hover{border-color:var(--orange);color:var(--orange);transform:scale(1.14)}
.rf-story.on .rf-node{background:var(--orange);border-color:var(--orange);color:#fff;box-shadow:0 0 0 7px var(--orange-12)}
.rf-tag{font:700 10px/1 var(--font);letter-spacing:.22em;text-transform:uppercase;color:var(--orange)}
.rf-story h3{font:700 clamp(23px,2.5vw,30px)/1.18 var(--font);letter-spacing:-.02em;margin:13px 0 14px}
.rf-story p{font-size:15.5px;line-height:1.72;color:var(--blue-70)}
.rf-story p b{color:var(--blue);font-weight:600}
.rf-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:18px}
.rf-chip{font:600 11px var(--font);color:var(--blue);border:1px solid var(--line-strong);background:#fff;padding:7px 12px;border-radius:5px;transition:.2s;cursor:default}
.rf-chip:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-2px);box-shadow:2px 2px 0 var(--orange-12)}
.rf-sticky{position:sticky;top:7vh;height:86vh;display:flex;align-items:center;perspective:1300px}
.rf-device{width:100%;max-width:500px;margin:0 auto;border-radius:20px;background:var(--blue);border:1px solid var(--w-15);color:#fff;box-shadow:0 44px 84px -30px rgba(25,51,93,.5),0 0 0 9px var(--w-60),0 0 0 10px var(--line);overflow:hidden;position:relative;transform-style:preserve-3d;transition:transform .25s ease;will-change:transform}
.rf-device::after{content:"";position:absolute;inset:10px;border:1px dashed var(--w-15);border-radius:14px;pointer-events:none}
.rf-shine{position:absolute;inset:0;background:linear-gradient(105deg,transparent 40%,rgba(255,255,255,.08) 50%,transparent 60%);transform:translateX(-130%);pointer-events:none;z-index:4}
.rf-device.shined .rf-shine{animation:rf-shine 1s ease}
@keyframes rf-shine{to{transform:translateX(130%)}}
.rf-dhd{display:flex;justify-content:space-between;align-items:center;padding:14px 18px;border-bottom:1px solid var(--w-15);font:700 11px var(--font);letter-spacing:.12em}
.rf-pills{display:flex;gap:6px;padding:10px 14px;border-bottom:1px solid var(--w-15);overflow-x:auto;scrollbar-width:none}
.rf-pills::-webkit-scrollbar{display:none}
.rf-pill{flex:0 0 auto;font:700 10px var(--font);letter-spacing:.08em;color:var(--w-35);background:var(--w-06);border:1px solid var(--w-15);border-radius:999px;padding:8px 13px;cursor:pointer;transition:.22s;white-space:nowrap}
.rf-pill:hover{color:#fff;border-color:var(--w-35)}
.rf-pill.on{background:var(--orange);border-color:var(--orange);color:#fff;box-shadow:0 4px 14px rgba(222,110,48,.4)}
.rf-screen{position:relative;height:372px;padding:20px 18px}
.rf-view{position:absolute;inset:20px 18px;opacity:0;transform:translateY(14px) scale(.985);transition:opacity .45s ease,transform .45s ease;pointer-events:none}
.rf-view.on{opacity:1;transform:none;pointer-events:auto}
.rf-mono-dim{font:700 10px var(--font);letter-spacing:.2em;text-transform:uppercase;color:var(--w-35);margin-bottom:12px;display:flex;justify-content:space-between}
.rf-mono-dim b{color:var(--orange)}
.rf-feed{display:flex;flex-direction:column;gap:9px;overflow:hidden;max-height:296px}
.rf-row{display:flex;justify-content:space-between;align-items:center;gap:12px;background:var(--w-06);border:1px solid var(--w-15);border-radius:12px;padding:11px 13px}
.rf-row.new{animation:rf-drop .5s cubic-bezier(.2,.8,.2,1)}
@keyframes rf-drop{from{opacity:0;transform:translateY(-16px) scale(.97)}to{opacity:1;transform:none}}
.rf-id{display:flex;gap:11px;align-items:center;min-width:0}
.rf-av{width:34px;height:34px;border-radius:9px;display:grid;place-items:center;font:700 11px var(--font);background:var(--orange);color:#fff;flex:0 0 auto}
.rf-row b{font:600 12.5px var(--font);display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.rf-row small{font:500 10.5px var(--font);color:var(--w-35)}
.rf-sync{font:700 9px var(--font);letter-spacing:.14em;color:var(--orange);border:1px solid var(--orange-60);border-radius:5px;padding:4px 7px;flex:0 0 auto}
.rf-center{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}
.rf-ring{width:72px;height:72px;border-radius:50%;display:grid;place-items:center;background:var(--orange);position:relative;font-size:26px}
.rf-ring::before,.rf-ring::after{content:"";position:absolute;inset:-13px;border-radius:50%;border:1px solid var(--orange-60);animation:rf-rg 2.2s ease-out infinite}
.rf-ring::after{animation-delay:1.1s}
@keyframes rf-rg{0%{transform:scale(.7);opacity:1}100%{transform:scale(1.55);opacity:0}}
.rf-wave{display:flex;gap:4px;align-items:flex-end;height:26px;margin-top:16px}
.rf-wave i{width:4px;border-radius:3px;background:var(--orange);animation:rf-wv 1s ease-in-out infinite}
@keyframes rf-wv{0%,100%{height:6px}50%{height:26px}}
.rf-calllog{margin-top:16px;width:100%;max-width:300px;text-align:left}
.rf-calllog div{font:500 10.5px var(--font);color:var(--w-35);padding:6px 0;border-bottom:1px dashed var(--w-15);opacity:0;transform:translateX(-8px);transition:.4s}
.rf-calllog div.show{opacity:1;transform:none}
.rf-calllog b{color:var(--orange)}
.rf-bubble{max-width:84%;padding:11px 14px;border-radius:13px;font-size:12.5px;line-height:1.55;margin-bottom:10px;opacity:0;transform:translateY(8px);transition:.4s}
.rf-bubble.show{opacity:1;transform:none}
.rf-bubble.u{background:var(--w-06);border:1px solid var(--w-15);border-bottom-left-radius:4px}
.rf-bubble.a{background:var(--orange);color:#fff;margin-left:auto;border-bottom-right-radius:4px}
.rf-typing{display:none;gap:4px;padding:10px 13px;background:var(--w-06);border:1px solid var(--w-15);border-radius:13px;width:fit-content;margin-left:auto}
.rf-typing.show{display:inline-flex}
.rf-typing i{width:5px;height:5px;border-radius:50%;background:var(--w-35);animation:rf-tp 1s infinite}
.rf-typing i:nth-child(2){animation-delay:.15s}.rf-typing i:nth-child(3){animation-delay:.3s}
@keyframes rf-tp{0%,100%{opacity:.3;transform:translateY(0)}50%{opacity:1;transform:translateY(-3px)}}
.rf-handover{display:flex;align-items:center;gap:8px;margin-top:6px;font:700 9.5px var(--font);letter-spacing:.14em;color:var(--orange);opacity:0;transition:.4s}
.rf-handover.show{opacity:1}
.rf-handover::before,.rf-handover::after{content:"";flex:1;height:1px;background:var(--w-15)}
.rf-gaugewrap{display:flex;gap:18px;align-items:center}
.rf-gauge{position:relative;width:150px;height:150px;flex:0 0 auto}
.rf-gauge svg{transform:rotate(-90deg)}
.rf-gauge .bg{stroke:var(--w-15)}
.rf-gauge .fg{stroke:var(--orange);stroke-linecap:round;stroke-dasharray:408;stroke-dashoffset:408;transition:stroke-dashoffset 1.4s cubic-bezier(.2,.8,.2,1)}
.rf-gauge .num{position:absolute;inset:0;display:grid;place-items:center;font:800 40px/1 var(--font);letter-spacing:-.02em;color:var(--orange)}
.rf-gstats{flex:1;display:flex;flex-direction:column;gap:8px}
.rf-gstat{background:var(--w-06);border:1px solid var(--w-15);border-radius:10px;padding:9px 12px;display:flex;justify-content:space-between;align-items:center}
.rf-gstat small{font:600 9px var(--font);letter-spacing:.1em;color:var(--w-35);text-transform:uppercase}
.rf-gstat b{font:700 12px var(--font);color:var(--orange)}
.rf-spark{margin-top:14px}
.rf-spark path.l{stroke:var(--orange);stroke-width:2;fill:none;stroke-dasharray:600;stroke-dashoffset:600;transition:stroke-dashoffset 1.6s ease .3s}
.rf-spark.run path.l{stroke-dashoffset:0}
.rf-spark .area{fill:url(#rfAreaGrad);stroke:none;opacity:0;transition:opacity .8s ease .8s}
.rf-spark.run .area{opacity:1}
.rf-stage-label{position:absolute;right:18px;bottom:12px;z-index:3;font:600 9.5px var(--font);color:var(--w-35);letter-spacing:.2em}
.rf-metrics{margin-top:96px;border-top:1.5px solid var(--blue);border-bottom:1.5px solid var(--blue);display:grid;grid-template-columns:repeat(4,1fr);background:#fff}
.rf-m{padding:32px 24px;border-left:1px solid var(--line)}
.rf-m:first-child{border-left:none}
.rf-m b{display:flex;align-items:baseline;font:800 clamp(34px,3.6vw,48px)/1 var(--font);color:var(--orange);letter-spacing:-.03em;font-variant-numeric:tabular-nums}
.rf-m b sup{font:700 18px var(--font);margin-left:2px}
.rf-m span{display:block;margin-top:10px;font:700 10px var(--font);letter-spacing:.18em;text-transform:uppercase;color:var(--blue-55)}
.rf-roi{margin:84px 0 0;display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);border:1.5px solid var(--blue);border-radius:18px;overflow:hidden;background:#fff;box-shadow:8px 8px 0 var(--blue-12)}
.rf-roi-l{padding:40px 38px}
.rf-roi-l h3{font:800 clamp(25px,2.8vw,36px)/1.15 var(--font);letter-spacing:-.025em}
.rf-roi-l h3 em{font-style:italic;font-weight:700;color:var(--orange)}
.rf-roi-l>p{margin-top:12px;font-size:14.5px;line-height:1.68;color:var(--blue-70);max-width:46ch}
.rf-sliderbox{margin-top:30px}
.rf-sliderbox+.rf-sliderbox{margin-top:24px}
.rf-sliderbox label{display:flex;justify-content:space-between;align-items:baseline;font:700 10.5px var(--font);letter-spacing:.14em;text-transform:uppercase;color:var(--blue-55)}
.rf-sliderbox label output{color:var(--orange);font-size:14px;font-weight:700}
.rf-range{appearance:none;-webkit-appearance:none;width:100%;height:4px;border-radius:99px;background:linear-gradient(90deg,var(--orange) var(--p,30%),var(--line) var(--p,30%));margin-top:16px;cursor:pointer}
.rf-range::-webkit-slider-thumb{appearance:none;-webkit-appearance:none;width:22px;height:22px;border-radius:50%;background:#fff;border:5px solid var(--orange);box-shadow:0 2px 8px var(--blue-12);transition:transform .15s}
.rf-range::-webkit-slider-thumb:hover{transform:scale(1.15)}
.rf-range::-moz-range-thumb{width:22px;height:22px;border-radius:50%;background:#fff;border:5px solid var(--orange);box-shadow:0 2px 8px var(--blue-12)}
.rf-roi-note{margin-top:20px;font:500 10px/1.7 var(--font);color:var(--blue-55)}
.rf-roi-r{background:var(--blue);color:#fff;padding:40px 38px;display:flex;flex-direction:column;justify-content:center;gap:24px;position:relative;overflow:hidden}
.rf-roi-r::before{content:"";position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent 0 35px,var(--w-06) 35px 36px),repeating-linear-gradient(90deg,transparent 0 35px,var(--w-06) 35px 36px);pointer-events:none}
.rf-roi-stat{position:relative}
.rf-roi-stat small{font:700 9.5px var(--font);letter-spacing:.2em;text-transform:uppercase;color:var(--w-35);display:block;margin-bottom:9px}
.rf-roi-stat b{font:800 clamp(28px,3.2vw,42px)/1 var(--font);letter-spacing:-.025em;color:var(--orange);font-variant-numeric:tabular-nums}
.rf-roi-stat.hero b{font-size:clamp(40px,4.6vw,56px);text-shadow:0 0 44px rgba(222,110,48,.45)}
.rf-roi-cta{position:relative;display:inline-flex;align-items:center;gap:10px;width:fit-content;font:700 14px var(--font);color:var(--blue);background:#fff;text-decoration:none;padding:15px 24px;border-radius:10px;box-shadow:4px 4px 0 var(--orange);transition:.2s}
.rf-roi-cta:hover{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--orange)}
.rf-quote{margin:84px 0 0;display:grid;grid-template-columns:auto 1fr;gap:26px;align-items:start;border-left:3px solid var(--orange);padding:6px 0 6px 28px}
.rf-quote .mark{font:800 90px/0.6 var(--font);color:var(--orange);opacity:.9}
.rf-quote blockquote{font:500 clamp(19px,2.2vw,25px)/1.5 var(--font);font-style:italic;color:var(--blue);max-width:40ch;letter-spacing:-.01em}
.rf-quote figcaption{margin-top:16px;font:700 11px var(--font);letter-spacing:.14em;text-transform:uppercase;color:var(--blue-55)}
.rf-quote figcaption b{color:var(--orange)}
.rf-band{margin-top:96px;background:var(--blue);color:#fff;position:relative;overflow:hidden}
.rf-band::before{content:"";position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent 0 35px,var(--w-06) 35px 36px),repeating-linear-gradient(90deg,transparent 0 35px,var(--w-06) 35px 36px);mask-image:radial-gradient(100% 130% at 50% 0%,#000 30%,transparent 80%)}
.rf-band-in{max-width:1200px;margin:0 auto;padding:84px 28px;position:relative;display:grid;grid-template-columns:1.2fr .8fr;gap:48px;align-items:center}
.rf-band h2{font:800 clamp(32px,3.8vw,52px)/1.1 var(--font);letter-spacing:-.025em}
.rf-band h2 em{font-style:italic;font-weight:700;color:var(--orange)}
.rf-band p{margin-top:16px;font-size:15.5px;line-height:1.7;color:var(--w-60);max-width:46ch}
.rf-band-r{display:flex;flex-direction:column;gap:14px;align-items:flex-start}
.rf-band .rf-cta{background:var(--orange);box-shadow:5px 5px 0 var(--w-90)}
.rf-band .rf-cta:hover{box-shadow:2px 2px 0 var(--w-90)}
.rf-band small{font:500 11px var(--font);color:var(--w-35)}
.rf-band small b{color:var(--orange);font-weight:700}
.rf-rv{opacity:0;transform:translateY(24px);transition:.75s cubic-bezier(.2,.7,.2,1)}
.rf-rv.in{opacity:1;transform:none}
.rf-rv.d1{transition-delay:.1s}.rf-rv.d2{transition-delay:.2s}.rf-rv.d3{transition-delay:.3s}
@media(max-width:980px){
  .rf-hero{grid-template-columns:1fr}
  .rf-spec{display:none}
  .rf-band-in{grid-template-columns:1fr}
}
@media(max-width:880px){
  .rf-grid{grid-template-columns:1fr}
  .rf-sticky{position:sticky;top:8px;height:auto;order:-1;z-index:5;padding:0 0 14px;perspective:none}
  .rf-device{max-width:none}
  .rf-screen{height:330px}
  .rf-story{padding:48px 0}
  .rf-node,.rf-story:first-child .rf-node{top:50px}
  .rf-story:first-child{padding-top:48px}
  .rf-roi{grid-template-columns:1fr}
  .rf-metrics{grid-template-columns:repeat(2,1fr)}
  .rf-m:nth-child(3){border-left:none;border-top:1px solid var(--line)}
  .rf-m:nth-child(4){border-top:1px solid var(--line)}
  .rf-quote{grid-template-columns:1fr;gap:8px}
  .rf-quote .mark{font-size:60px}
}
@media(prefers-reduced-motion:reduce){
  .rf-bp *,.rf-bp *::before,.rf-bp *::after{animation:none!important;transition:none!important}
  .rf-rv,.rf-bubble,.rf-ev,.rf-calllog div{opacity:1!important;transform:none!important}
}
</style>

<section class="rf-bp" id="respond-first">
  <div class="rf-wrap">

    <div class="rf-hero">
      <div class="rf-rv">
        <span class="rf-kicker"><i></i> Admission Response Automation</span>
        <h2 class="rf-h1">The institute that responds first, <em>wins<svg aria-hidden="true" viewBox="0 0 120 12" preserveAspectRatio="none"><path d="M2 9 C 30 3, 60 11, 118 5"/></svg></em>.</h2>
        <p class="rf-lead">78% of students enrol with the institute that contacts them <b>first</b>. ExtraaEdge captures every inquiry — ads, forms, portals, walk-ins — and places an AI-powered call <b>within seconds</b>, so your counsellors only talk to warm, qualified leads.</p>

        <div class="rf-race rf-rv d1" id="rfRace">
          <div class="rf-anno"><span>FIG 01 · SPEED-TO-LEAD</span><span><b>LIVE BENCHMARK</b></span></div>
          <div class="rf-lane you">
            <small><span>With ExtraaEdge AI</span><output id="rfRaceYou">0s</output></small>
            <div class="bar"><div class="fill" data-w="9%"></div></div>
          </div>
          <div class="rf-lane them">
            <small><span>Industry average</span><output id="rfRaceThem">0h</output></small>
            <div class="bar"><div class="fill" data-w="96%"></div></div>
          </div>
          <p class="rf-race-foot">→ Leads contacted in &lt;5 min are <b>21× more likely</b> to qualify.</p>
        </div>

        <div class="rf-ctarow rf-rv d2">
          <a href="#demo" class="rf-cta">Book a Demo <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
          <a href="#rfRoiLab" class="rf-cta rf-cta--ghost">Calculate My ROI</a>
        </div>
        <p class="rf-trust rf-rv d3"><span class="stars">★★★★★</span> Trusted by 400+ institutes · 22M+ inquiries processed</p>
      </div>

      <div class="rf-sim rf-rv d1">
        <span class="rf-spec rf-spec--a">RESPONSE ENGINE <b>v4.2</b></span>
        <span class="rf-spec rf-spec--b">UPTIME <b>99.98%</b></span>
        <div class="rf-sim-frame">
          <div class="rf-sim-hd"><span>RESPONSE SIMULATOR</span><span class="rf-live"><i></i> LIVE</span></div>
          <div class="rf-sim-body">
            <div class="rf-clock"><span id="rfSimClock">00.0</span><span class="unit">sec</span><small>ELAPSED SINCE INQUIRY</small></div>
            <div class="rf-ledger" id="rfSimLedger">
              <div class="rf-ev" data-at="0"><span class="t">T+0.0s</span><span class="nd"></span><span class="x">Inquiry detected · Meta Lead Ad<small>Aarav S. · B.Tech CSE · Pune</small></span></div>
              <div class="rf-ev" data-at="14"><span class="t">T+1.4s</span><span class="nd"></span><span class="x">Lead scored &amp; routed<small>Intent: HIGH · Program match: 94%</small></span></div>
              <div class="rf-ev" data-at="38"><span class="t">T+3.8s</span><span class="nd"></span><span class="x">AI voice call initiated<small>Language auto-detected: English + Hindi</small></span></div>
              <div class="rf-ev" data-at="180"><span class="t">T+18s</span><span class="nd"></span><span class="x"><span class="ok">Connected &amp; qualified ✓</span><small>Counsellor Priya assigned · WhatsApp brochure sent</small></span></div>
            </div>
            <div class="rf-stamp" id="rfSimStamp">QUALIFIED · 18s</div>
          </div>
          <div class="rf-sim-ft">
            <button class="rf-simbtn" id="rfSimBtn">▶ Simulate an inquiry</button>
            <p>Watch what happens in the first 18 seconds after a student hits "submit".</p>
          </div>
        </div>
      </div>
    </div>

    <div class="rf-section-hd">
      <h2 class="rf-h2 rf-rv">From first click to enrolment — <em>one engine</em>, four moves.</h2>
    </div>

    <div class="rf-grid">
      <div class="rf-stories" id="rfStories">
        <div class="rf-rail"><i id="rfRailFill"></i></div>

        <article class="rf-story on" data-view="0">
          <span class="rf-node">01</span>
          <span class="rf-tag">Capture · Zero Leakage</span>
          <h3>Every inquiry lands in one queue. None slip away.</h3>
          <p>Ads, portals, forms, missed calls, walk-ins — <b>auto-synced in real time</b> with duplicates merged and sources tagged. Your team starts the day with one clean, prioritised pipeline instead of six spreadsheets.</p>
          <div class="rf-chips"><span class="rf-chip">Ads Sync</span><span class="rf-chip">Form Capture</span><span class="rf-chip">Dedup Engine</span><span class="rf-chip">Source Attribution</span></div>
        </article>

        <article class="rf-story" data-view="1">
          <span class="rf-node">02</span>
          <span class="rf-tag">Engage · AI Voice</span>
          <h3>AI calls in seconds — in the student's language.</h3>
          <p>The moment a lead arrives, an AI agent dials, verifies intent, answers program and fee questions, and books counselling slots. <b>24/7, in 10+ languages</b>, with every call transcribed and scored.</p>
          <div class="rf-chips"><span class="rf-chip">AI Calling</span><span class="rf-chip">IVR Routing</span><span class="rf-chip">Multilingual</span><span class="rf-chip">Call Transcripts</span></div>
        </article>

        <article class="rf-story" data-view="2">
          <span class="rf-node">03</span>
          <span class="rf-tag">Nurture · Smart Handover</span>
          <h3>Warm leads handed to humans at the perfect moment.</h3>
          <p>AI handles the repetitive 80% — follow-ups, reminders, document nudges on WhatsApp and email. The instant a student shows buying intent, <b>a counsellor takes over with full context</b>.</p>
          <div class="rf-chips"><span class="rf-chip">WhatsApp Automation</span><span class="rf-chip">Drip Journeys</span><span class="rf-chip">Intent Triggers</span><span class="rf-chip">Context Handover</span></div>
        </article>

        <article class="rf-story" data-view="3">
          <span class="rf-node">04</span>
          <span class="rf-tag">Convert · Command Center</span>
          <h3>See exactly which rupee turns into an enrolment.</h3>
          <p>Live funnels, counsellor leaderboards, source-level ROI and response-time SLAs — <b>one dashboard your director will actually open</b>. Cut spend on what doesn't convert, double down on what does.</p>
          <div class="rf-chips"><span class="rf-chip">Live Funnel</span><span class="rf-chip">Source ROI</span><span class="rf-chip">SLA Alerts</span><span class="rf-chip">Forecasting</span></div>
        </article>
      </div>

      <div class="rf-sticky">
        <div class="rf-device" id="rfDevice">
          <div class="rf-shine"></div>
          <div class="rf-dhd"><span>EXTRAAEDGE · AI HUB</span><span class="rf-live"><i></i> LIVE</span></div>
          <div class="rf-pills" id="rfPills">
            <button class="rf-pill on" data-view="0">01 CAPTURE</button>
            <button class="rf-pill" data-view="1">02 AI CALL</button>
            <button class="rf-pill" data-view="2">03 NURTURE</button>
            <button class="rf-pill" data-view="3">04 ANALYTICS</button>
          </div>
          <div class="rf-screen">
            <div class="rf-view on" data-view="0">
              <div class="rf-mono-dim"><span>INBOUND QUEUE</span><b id="rfFeedCount">+0 TODAY</b></div>
              <div class="rf-feed" id="rfFeed"></div>
            </div>
            <div class="rf-view" data-view="1">
              <div class="rf-center">
                <div class="rf-ring">📞</div>
                <div class="rf-wave" aria-hidden="true"></div>
                <div class="rf-calllog" id="rfCallLog">
                  <div>→ Dialing <b>+91 98••• ••421</b> · attempt 1</div>
                  <div>→ Connected · language: <b>English</b></div>
                  <div>→ Intent verified: <b>MBA 2026 · High</b></div>
                  <div>→ Slot booked: <b>Tomorrow 11:00 AM</b></div>
                  <div>→ Summary pushed to CRM · <b>score 92/100</b></div>
                </div>
              </div>
            </div>
            <div class="rf-view" data-view="2">
              <div class="rf-mono-dim"><span>WHATSAPP · AUTOPILOT</span><b>RIYA M.</b></div>
              <div id="rfChat">
                <div class="rf-bubble u">Hi, what's the fee for B.Des and is hostel included? 🏠</div>
                <div class="rf-bubble a">Hi Riya! B.Des is ₹2.4L/yr — hostel + mess is ₹85K extra. I've sent the full breakdown to your WhatsApp. Want me to book a campus tour this Saturday?</div>
                <div class="rf-bubble u">Yes please, Saturday works!</div>
                <div class="rf-typing" id="rfTyping"><i></i><i></i><i></i></div>
                <div class="rf-handover" id="rfHandover">HIGH INTENT → COUNSELLOR ARJUN ASSIGNED</div>
              </div>
            </div>
            <div class="rf-view" data-view="3">
              <div class="rf-mono-dim"><span>FUNNEL VELOCITY</span><b>THIS WEEK</b></div>
              <div class="rf-gaugewrap">
                <div class="rf-gauge">
                  <svg aria-hidden="true" width="150" height="150" viewBox="0 0 150 150">
                    <defs>
                      <linearGradient id="rfAreaGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0" stop-color="rgba(222,110,48,.35)"/><stop offset="1" stop-color="rgba(222,110,48,0)"/>
                      </linearGradient>
                    </defs>
                    <circle class="bg" cx="75" cy="75" r="65" fill="none" stroke-width="10"/>
                    <circle class="fg" id="rfGaugeFg" cx="75" cy="75" r="65" fill="none" stroke-width="10"/>
                  </svg>
                  <span class="num" id="rfGaugeNum">0%</span>
                </div>
                <div class="rf-gstats">
                  <div class="rf-gstat"><small>Avg response</small><b>22 sec</b></div>
                  <div class="rf-gstat"><small>Calls today</small><b>1,284</b></div>
                  <div class="rf-gstat"><small>Hot leads</small><b>312 ↑</b></div>
                </div>
              </div>
              <svg aria-hidden="true" class="rf-spark" id="rfSpark" width="100%" height="64" viewBox="0 0 420 64" preserveAspectRatio="none">
                <path class="area" d="M0,52 C40,48 70,38 110,40 C150,42 180,26 220,28 C260,30 290,16 330,14 C370,12 400,8 420,6 L420,64 L0,64 Z"/>
                <path class="l" d="M0,52 C40,48 70,38 110,40 C150,42 180,26 220,28 C260,30 290,16 330,14 C370,12 400,8 420,6"/>
              </svg>
            </div>
            <span class="rf-stage-label" id="rfStageLabel">STAGE 01 / 04</span>
          </div>
        </div>
      </div>
    </div>

    <div class="rf-metrics rf-rv">
      <div class="rf-m"><b><span data-rfcount="90">0</span><sup>%</sup></b><span>Faster first response</span></div>
      <div class="rf-m"><b><span data-rfcount="3.2" data-dec="1">0</span><sup>×</sup></b><span>More leads contacted</span></div>
      <div class="rf-m"><b><span data-rfcount="41">0</span><sup>%</sup></b><span>Lift in enrolments</span></div>
      <div class="rf-m"><b><span data-rfcount="60">0</span><sup>%</sup></b><span>Counsellor hours saved</span></div>
    </div>

    <div class="rf-roi rf-rv" id="rfRoiLab">
      <div class="rf-roi-l">
        <h3>What is slow response <em>costing you</em>?</h3>
        <p>Drag the sliders to your numbers. We'll show the enrolments — and revenue — currently leaking out of your funnel every admission season.</p>

        <div class="rf-sliderbox">
          <label>Inquiries per month <output id="rfOLeads">2,000</output></label>
          <input class="rf-range" type="range" id="rfLeads" min="200" max="10000" step="100" value="2000">
        </div>
        <div class="rf-sliderbox">
          <label>Avg. annual fee (₹) <output id="rfOFee">₹1.5L</output></label>
          <input class="rf-range" type="range" id="rfFee" min="50000" max="1000000" step="10000" value="150000">
        </div>
        <div class="rf-sliderbox">
          <label>Current conversion rate <output id="rfOConv">3%</output></label>
          <input class="rf-range" type="range" id="rfConv" min="1" max="12" step="0.5" value="3">
        </div>
        <p class="rf-roi-note">* Model assumes a conservative 35% conversion lift from sub-minute response, based on aggregate outcomes across ExtraaEdge institutes. Your demo includes a calibrated projection.</p>
      </div>
      <div class="rf-roi-r">
        <div class="rf-roi-stat"><small>Extra enrolments / season</small><b id="rfEnrol">+252</b></div>
        <div class="rf-roi-stat hero"><small>Recovered revenue / year</small><b id="rfRev">₹3.8 Cr</b></div>
        <div class="rf-roi-stat"><small>Counsellor hours freed / month</small><b id="rfHours">640 hrs</b></div>
        <a href="#demo" class="rf-roi-cta">Get my calibrated projection →</a>
      </div>
    </div>
  </div>

</section>

<script>
(function(){
  "use strict";
  var bp = document.getElementById('respond-first');
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var rvIO = new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('in'); rvIO.unobserve(e.target);} });
  },{threshold:.15});
  bp.querySelectorAll('.rf-rv').forEach(function(el){ rvIO.observe(el); });
  var race = document.getElementById('rfRace');
  var raceIO = new IntersectionObserver(function(es){
    es.forEach(function(e){
      if(!e.isIntersecting) return;
      raceIO.disconnect();
      race.querySelectorAll('.fill').forEach(function(f){ f.style.width = f.dataset.w; });
      animNum(document.getElementById('rfRaceYou'), 18, 1500, function(v){ return Math.round(v)+'s'; });
      animNum(document.getElementById('rfRaceThem'), 17, 1500, function(v){ return Math.round(v)+'h'; });
    });
  },{threshold:.5});
  raceIO.observe(race);
  function animNum(el, to, dur, fmt){
    if(reduced){ el.textContent = fmt(to); return; }
    var t0 = performance.now();
    (function step(t){
      var p = Math.min((t-t0)/dur, 1), e = 1-Math.pow(1-p,3);
      el.textContent = fmt(to*e);
      if(p<1) requestAnimationFrame(step);
    })(t0);
  }
  var rfSimBtn = document.getElementById('rfSimBtn'),
      rfSimClock = document.getElementById('rfSimClock'),
      rfSimStamp = document.getElementById('rfSimStamp'),
      simEvents = Array.prototype.slice.call(document.querySelectorAll('#rfSimLedger .rf-ev')),
      simTimer = null;
  function resetSim(){
    clearInterval(simTimer);
    rfSimClock.textContent = '00.0';
    rfSimStamp.classList.remove('show');
    simEvents.forEach(function(ev){ ev.classList.remove('on'); });
  }
  function runSim(){
    resetSim();
    rfSimBtn.disabled = true;
    var tick = 0;
    var schedule = [0, 14, 38, 180];
    var i = 0;
    if(reduced){
      simEvents.forEach(function(ev){ ev.classList.add('on'); });
      rfSimClock.textContent='18.0'; rfSimStamp.classList.add('show'); rfSimBtn.disabled=false;
      rfSimBtn.textContent = '↻ Replay simulation';
      return;
    }
    simTimer = setInterval(function(){
      tick = tick < 40 ? tick + 1 : tick + 6;
      if(tick >= 180){ tick = 180; }
      var s = (tick/10);
      rfSimClock.textContent = (s<10?'0':'') + s.toFixed(1);
      while(i < schedule.length && tick >= schedule[i]){
        simEvents[i].classList.add('on'); i++;
      }
      if(tick >= 180){
        clearInterval(simTimer);
        rfSimStamp.classList.add('show');
        rfSimBtn.disabled = false;
        rfSimBtn.textContent = '↻ Replay simulation';
      }
    }, 100);
  }
  rfSimBtn.addEventListener('click', runSim);
  var simIO = new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ simIO.disconnect(); setTimeout(runSim, 700); } });
  },{threshold:.4});
  simIO.observe(rfSimBtn);
  var wave = bp.querySelector('.rf-wave');
  for(var w=0; w<14; w++){
    var bar = document.createElement('i');
    bar.style.animationDelay = (w*0.07)+'s';
    bar.style.animationDuration = (0.7 + (w%4)*0.12)+'s';
    wave.appendChild(bar);
  }
  var device = document.getElementById('rfDevice'),
      pills = Array.prototype.slice.call(document.querySelectorAll('#rfPills .rf-pill')),
      views = Array.prototype.slice.call(bp.querySelectorAll('.rf-view')),
      stories = Array.prototype.slice.call(document.querySelectorAll('#rfStories .rf-story')),
      stageLabel = document.getElementById('rfStageLabel'),
      current = 0, pinnedUntil = 0;
  function setView(n, fromUser){
    if(n === current && !fromUser) return;
    current = n;
    pills.forEach(function(p,i){ p.classList.toggle('on', i===n); });
    views.forEach(function(v,i){ v.classList.toggle('on', i===n); });
    stories.forEach(function(s,i){ s.classList.toggle('on', i===n); });
    stageLabel.textContent = 'STAGE 0'+(n+1)+' / 04';
    device.classList.remove('shined'); void device.offsetWidth; device.classList.add('shined');
    if(n===1) playCallLog();
    if(n===2) playChat();
    if(n===3) playGauge();
    if(fromUser) pinnedUntil = Date.now() + 4000;
  }
  pills.forEach(function(p){ p.addEventListener('click', function(){ setView(+p.dataset.view, true); }); });
  stories.forEach(function(s){
    s.querySelector('.rf-node').addEventListener('click', function(){
      s.scrollIntoView({behavior: reduced?'auto':'smooth', block:'center'});
    });
  });
  var storyIO = new IntersectionObserver(function(es){
    es.forEach(function(e){
      if(e.isIntersecting && Date.now() > pinnedUntil){
        setView(+e.target.dataset.view, false);
      }
    });
  },{rootMargin:'-40% 0px -40% 0px'});
  stories.forEach(function(s){ storyIO.observe(s); });
  var railFill = document.getElementById('rfRailFill'), storiesWrap = document.getElementById('rfStories');
  function updRail(){
    var r = storiesWrap.getBoundingClientRect();
    var p = Math.min(Math.max((window.innerHeight*0.55 - r.top) / r.height, 0), 1);
    railFill.style.height = (p*100)+'%';
  }
  window.addEventListener('scroll', updRail, {passive:true}); updRail();
  if(!reduced && matchMedia('(pointer:fine)').matches){
    device.addEventListener('mousemove', function(e){
      var r = device.getBoundingClientRect();
      var x = (e.clientX - r.left)/r.width - .5, y = (e.clientY - r.top)/r.height - .5;
      device.style.transform = 'rotateY('+(x*5)+'deg) rotateX('+(-y*4)+'deg)';
    });
    device.addEventListener('mouseleave', function(){ device.style.transform=''; });
  }
  var feed = document.getElementById('rfFeed'), rfFeedCount = document.getElementById('rfFeedCount'), fc = 0;
  var people = [
    ['AS','Aarav Shah','Meta Ads · B.Tech CSE'],['RM','Riya Mehta','Website · B.Des'],
    ['KP','Kabir Patel','Shiksha · MBA'],['ZK','Zara Khan','Google Ads · BBA'],
    ['VN','Vihaan Nair','Walk-in · M.Tech'],['IA','Ishita Agarwal','WhatsApp · B.Com'],
    ['DR','Dev Reddy','Collegedunia · B.Arch'],['MJ','Meera Joshi','IVR · MBBS Coaching']
  ];
  function pushLead(){
    var p = people[fc % people.length]; fc++;
    var row = document.createElement('div');
    row.className = 'rf-row new';
    row.innerHTML = '<span class="rf-id"><span class="rf-av">'+p[0]+'</span><span><b>'+p[1]+'</b><small>'+p[2]+'</small></span></span><span class="rf-sync">SYNCED</span>';
    feed.prepend(row);
    while(feed.children.length > 5) feed.removeChild(feed.lastChild);
    rfFeedCount.textContent = '+'+(214+fc)+' TODAY';
  }
  for(var s0=0;s0<4;s0++) pushLead();
  if(!reduced) setInterval(function(){ if(current===0) pushLead(); }, 2600);
  var callLines = Array.prototype.slice.call(document.querySelectorAll('#rfCallLog div'));
  function playCallLog(){
    callLines.forEach(function(l){ l.classList.remove('show'); });
    callLines.forEach(function(l,i){
      setTimeout(function(){ if(current===1) l.classList.add('show'); }, reduced?0:300+i*550);
    });
  }
  var bubbles = Array.prototype.slice.call(document.querySelectorAll('#rfChat .rf-bubble')),
      typing = document.getElementById('rfTyping'), handover = document.getElementById('rfHandover');
  function playChat(){
    bubbles.forEach(function(b){ b.classList.remove('show'); });
    typing.classList.remove('show'); handover.classList.remove('show');
    if(reduced){ bubbles.forEach(function(b){b.classList.add('show');}); handover.classList.add('show'); return; }
    setTimeout(function(){ if(current!==2)return; bubbles[0].classList.add('show'); }, 250);
    setTimeout(function(){ if(current!==2)return; typing.classList.add('show'); }, 850);
    setTimeout(function(){ if(current!==2)return; typing.classList.remove('show'); bubbles[1].classList.add('show'); }, 1900);
    setTimeout(function(){ if(current!==2)return; bubbles[2].classList.add('show'); }, 2700);
    setTimeout(function(){ if(current!==2)return; handover.classList.add('show'); }, 3400);
  }
  var gaugeFg = document.getElementById('rfGaugeFg'), gaugeNum = document.getElementById('rfGaugeNum'), spark = document.getElementById('rfSpark');
  function playGauge(){
    var C = 408;
    gaugeFg.style.strokeDashoffset = C; spark.classList.remove('run');
    void gaugeFg.offsetWidth;
    gaugeFg.style.strokeDashoffset = C - (C * 0.78);
    spark.classList.add('run');
    animNum(gaugeNum, 41, 1300, function(v){ return Math.round(v)+'%'; });
  }
  var counters = bp.querySelectorAll('[data-rfcount]');
  var cntIO = new IntersectionObserver(function(es){
    es.forEach(function(e){
      if(!e.isIntersecting) return; cntIO.unobserve(e.target);
      var to = parseFloat(e.target.dataset.rfcount), dec = +(e.target.dataset.dec||0);
      animNum(e.target, to, 1400, function(v){ return v.toFixed(dec); });
    });
  },{threshold:.6});
  counters.forEach(function(c){ cntIO.observe(c); });
  var rfLeads = document.getElementById('rfLeads'), rfFee = document.getElementById('rfFee'), rfConv = document.getElementById('rfConv');
  var rfOLeads = document.getElementById('rfOLeads'), rfOFee = document.getElementById('rfOFee'), rfOConv = document.getElementById('rfOConv');
  var rfEnrol = document.getElementById('rfEnrol'), rfRev = document.getElementById('rfRev'), rfHours = document.getElementById('rfHours');
  function inr(n){
    if(n >= 1e7) return '₹'+(n/1e7).toFixed(1).replace(/\.0$/,'')+' Cr';
    if(n >= 1e5) return '₹'+(n/1e5).toFixed(1).replace(/\.0$/,'')+'L';
    return '₹'+Math.round(n).toLocaleString('en-IN');
  }
  function fmtInt(n){ return Math.round(n).toLocaleString('en-IN'); }
  function paintRange(el){
    var p = (el.value - el.min)/(el.max - el.min)*100;
    el.style.setProperty('--p', p+'%');
  }
  function calc(){
    var leads = +rfLeads.value, fee = +rfFee.value, conv = +rfConv.value/100;
    paintRange(rfLeads); paintRange(rfFee); paintRange(rfConv);
    rfOLeads.textContent = fmtInt(leads);
    rfOFee.textContent = inr(fee);
    rfOConv.textContent = (+rfConv.value)+'%';
    var LIFT = 0.35, SEASON = 12;
    var extraEnrol = leads * SEASON * conv * LIFT;
    var revenue = extraEnrol * fee;
    var hours = Math.round(leads * 0.32);
    rfEnrol.textContent = '+'+fmtInt(extraEnrol);
    rfRev.textContent = inr(revenue);
    rfHours.textContent = fmtInt(hours)+' hrs';
  }
  [rfLeads,rfFee,rfConv].forEach(function(r){ r.addEventListener('input', calc); });
  calc();
})();
</script>
<!-- ===================== VIDYAGPT WIDGET ===================== -->
<!-- ===================== VidyaGPT · 24x7 AI Admission Agent (isolated iframe — pristine) ===================== -->
<style>
#vidyagpt.vgpt-embed{padding:0;margin:0;border:0;background:#fff;overflow:hidden}
#vidyagpt.vgpt-embed iframe{display:block;width:100%;border:0;background:#fff;height:920px}
@media(max-width:980px){#vidyagpt.vgpt-embed iframe{height:1480px}}
</style>

<!-- ===================== AUTOMATION · LIVE FLOW ===================== -->
<!-- ===================== AI Engine · Live Processing (isolated iframe — pristine) ===================== -->
<style>
#automation.auto-embed{padding:0;margin:0;border:0;background:#fff;overflow:hidden}
#automation.auto-embed iframe{display:block;width:100%;border:0;background:#fff;height:1400px}
@media(max-width:980px){#automation.auto-embed iframe{height:2050px}}
</style>

<!-- ===================== Application Mgmt · The Assembly Line (scoped .ea-bp / #ams) ===================== -->
<style>
.ea-bp{
  --orange:#DE6E30;
  --blue:#19335D;
  --bg:#ffffff;
  --line:rgba(25,51,93,.12);
  --line-soft:rgba(25,51,93,.07);
  --txt:#19335D;
  --txt-soft:rgba(25,51,93,.66);
  --orange-soft:rgba(222,110,48,.12);
  --orange-mid:rgba(222,110,48,.45);
  --panel:#19335D;
  --panel-line:rgba(255,255,255,.14);
  --panel-txt:#ffffff;
  --panel-dim:rgba(255,255,255,.6);
  font-family:'Inter',sans-serif;
  background:var(--bg); color:var(--txt);
  position:relative; overflow:clip;
}
.ea-bp::before{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:
    repeating-linear-gradient(0deg,transparent 0 31px,var(--line-soft) 31px 32px),
    repeating-linear-gradient(90deg,transparent 0 31px,var(--line-soft) 31px 32px);
  mask-image:radial-gradient(120% 90% at 25% 20%,#000 30%,transparent 75%);
}
.ea-bp *{box-sizing:border-box;margin:0;padding:0}
.ea-wrap{max-width:1180px;margin:0 auto;padding:104px 28px;position:relative}
.ea-split{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1.05fr);gap:clamp(36px,5.5vw,80px);align-items:center}
.ea-kicker{display:inline-flex;align-items:center;gap:10px;font:600 11px/1 'Inter',sans-serif;letter-spacing:.18em;text-transform:uppercase;color:var(--orange);border:1px solid var(--orange-mid);border-radius:999px;padding:8px 14px;background:var(--orange-soft)}
.ea-kicker i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:ea-ping 1.6s ease-out infinite}
@keyframes ea-ping{0%{box-shadow:0 0 0 0 rgba(222,110,48,.45)}100%{box-shadow:0 0 0 10px rgba(222,110,48,0)}}
.ea-h2{font:800 clamp(32px,4.2vw,52px)/1.08 'Inter',sans-serif;letter-spacing:-.03em;margin:22px 0 16px;color:var(--blue)}
.ea-h2 em{font-style:normal;color:var(--orange);background-image:linear-gradient(transparent 80%,var(--orange-soft) 80%)}
.ea-lead{font-size:16.5px;line-height:1.68;color:var(--txt-soft);max-width:52ch}
.ea-lead b{color:var(--blue);font-weight:600}
.ea-feats{margin-top:28px;border-top:2px solid var(--blue)}
.ea-feat{display:flex;gap:16px;align-items:center;padding:16px 6px;border-bottom:1px solid var(--line);cursor:pointer;transition:.25s;position:relative}
.ea-feat::after{content:"→";position:absolute;right:8px;font:700 14px 'Inter',sans-serif;color:var(--orange);opacity:0;transform:translateX(-6px);transition:.25s}
.ea-feat:hover{background:var(--orange-soft);padding-left:14px}
.ea-feat:hover::after{opacity:1;transform:none}
.ea-fic{width:42px;height:42px;flex:0 0 auto;border-radius:10px;border:1.5px solid var(--blue);display:grid;place-items:center;font-size:18px;background:#fff;box-shadow:3px 3px 0 var(--orange-soft)}
.ea-feat b{display:block;font-size:14.5px;font-weight:700;color:var(--blue)}
.ea-feat span{font-size:12.5px;color:var(--txt-soft)}
.ea-feat small{margin-left:auto;margin-right:26px;font:600 9.5px 'Inter',sans-serif;letter-spacing:.14em;color:var(--txt-soft);text-transform:uppercase;white-space:nowrap}
.ea-stats{display:flex;margin:30px 0 28px;border:1.5px solid var(--blue);border-radius:14px;overflow:hidden;width:fit-content;background:#fff}
.ea-stat{padding:18px 26px;border-left:1px solid var(--line)}
.ea-stat:first-child{border-left:none}
.ea-stat b{display:block;font:800 32px/1 'Inter',sans-serif;letter-spacing:-.02em;color:var(--orange)}
.ea-stat span{display:block;margin-top:7px;font:600 10px 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:var(--txt-soft)}
.ea-cta{display:inline-flex;align-items:center;gap:10px;font:700 14px 'Inter',sans-serif;color:#fff;text-decoration:none;background:var(--orange);padding:15px 24px;border-radius:10px;box-shadow:4px 4px 0 var(--blue);transition:.2s}
.ea-cta:hover{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--blue)}
.ea-cta-sub{display:block;margin-top:12px;font:500 11px 'Inter',sans-serif;color:var(--txt-soft)}
.ea-machine{
  border-radius:20px;background:var(--panel);
  color:var(--panel-txt);
  box-shadow:0 40px 80px -30px rgba(25,51,93,.5),0 0 0 1px var(--line);
  overflow:hidden;position:relative;
}
.ea-machine::after{content:"";position:absolute;inset:10px;border:1px dashed rgba(255,255,255,.12);border-radius:14px;pointer-events:none}
.ea-mhd{display:flex;justify-content:space-between;align-items:center;padding:15px 20px;border-bottom:1px solid var(--panel-line)}
.ea-mhd b{font:700 11px 'Inter',sans-serif;letter-spacing:.16em;color:var(--panel-txt)}
.ea-mhd .ea-live{display:inline-flex;align-items:center;gap:8px;font:600 10px 'Inter',sans-serif;letter-spacing:.1em;color:var(--panel-dim)}
.ea-mhd .ea-live b{color:var(--orange);letter-spacing:0;font-size:13px}
.ea-mhd .ea-live i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:ea-ping2 1.6s infinite}
@keyframes ea-ping2{0%{box-shadow:0 0 0 0 rgba(222,110,48,.55)}100%{box-shadow:0 0 0 9px rgba(222,110,48,0)}}
.ea-pipe{position:relative;padding:26px 22px 18px 64px}
.ea-spine{position:absolute;left:38px;top:34px;bottom:26px;width:2px;background:rgba(255,255,255,.16)}
.ea-spine i{position:absolute;left:0;top:0;width:2px;height:0;background:var(--orange);transition:height .8s cubic-bezier(.2,.8,.2,1)}
.ea-packet{
  position:absolute;left:31px;top:30px;width:16px;height:16px;border-radius:4px;
  background:var(--orange);box-shadow:0 0 0 4px rgba(222,110,48,.25),0 0 18px rgba(222,110,48,.6);
  transition:top .8s cubic-bezier(.2,.8,.2,1);z-index:2;transform:rotate(45deg);
}
.ea-station{position:relative;margin-bottom:14px;cursor:pointer}
.ea-station:last-child{margin-bottom:0}
.ea-dot{position:absolute;left:-33px;top:18px;width:14px;height:14px;border-radius:50%;background:var(--panel);border:2px solid rgba(255,255,255,.35);transition:.3s;z-index:1}
.ea-station.done .ea-dot{background:var(--orange);border-color:var(--orange)}
.ea-station.on .ea-dot{background:var(--orange);border-color:#fff;box-shadow:0 0 0 5px rgba(222,110,48,.3)}
.ea-scard{background:rgba(255,255,255,.05);border:1px solid var(--panel-line);border-radius:13px;padding:13px 15px;transition:.3s;opacity:.55}
.ea-station:hover .ea-scard{opacity:.85;border-color:rgba(255,255,255,.3)}
.ea-station.on .ea-scard{opacity:1;background:rgba(255,255,255,.09);border-color:rgba(222,110,48,.7);box-shadow:0 8px 30px -12px rgba(222,110,48,.4)}
.ea-station.done .ea-scard{opacity:.8}
.ea-tag{font:700 9px 'Inter',sans-serif;letter-spacing:.16em;color:var(--orange);text-transform:uppercase}
.ea-tag.alt{color:rgba(255,255,255,.75)}
.ea-st{font-size:13.5px;font-weight:700;margin-top:5px}
.ea-sd{font-size:11px;color:var(--panel-dim);margin-top:3px;line-height:1.5}
.ea-stamp{
  position:absolute;right:12px;top:12px;font:700 8.5px 'Inter',sans-serif;letter-spacing:.1em;
  color:#fff;background:var(--orange);border-radius:5px;padding:3px 7px;
  opacity:0;transform:scale(1.6) rotate(-8deg);transition:.35s cubic-bezier(.2,.8,.2,1);
}
.ea-station.done .ea-stamp,.ea-station.on.fin .ea-stamp{opacity:1;transform:scale(1) rotate(-4deg)}
.ea-scan{height:5px;border-radius:99px;background:rgba(255,255,255,.12);margin-top:9px;overflow:hidden;position:relative}
.ea-scan i{position:absolute;inset:0;width:34%;border-radius:99px;background:linear-gradient(90deg,transparent,var(--orange),transparent)}
.ea-station.on .ea-scan i{animation:ea-scan 1.2s ease-in-out infinite}
@keyframes ea-scan{0%{left:-34%}100%{left:100%}}
.ea-docs{display:flex;gap:6px;margin-top:9px}
.ea-doc{font:600 8.5px 'Inter',sans-serif;letter-spacing:.06em;color:var(--panel-dim);border:1px solid var(--panel-line);border-radius:5px;padding:3px 7px;transition:.3s}
.ea-doc.ok{color:#fff;border-color:var(--orange);background:rgba(222,110,48,.25)}
.ea-doc.ok::after{content:" ✓"}
.ea-gdpi{display:flex;align-items:center;gap:11px;margin-top:9px}
.ea-faces{display:flex}
.ea-face{width:30px;height:30px;border-radius:50%;border:2px solid var(--panel);display:grid;place-items:center;font:700 9.5px 'Inter',sans-serif;color:#fff;margin-left:-8px}
.ea-face:first-child{margin-left:0}
.ea-face.f1{background:var(--orange)}
.ea-face.f2{background:rgba(255,255,255,.22)}
.ea-face.f3{background:rgba(222,110,48,.55)}
.ea-joinbtn{margin-left:auto;font:700 9.5px 'Inter',sans-serif;letter-spacing:.08em;color:var(--blue);background:#fff;border-radius:7px;padding:7px 11px;display:inline-flex;align-items:center;gap:6px}
.ea-joinbtn i{width:6px;height:6px;border-radius:50%;background:var(--orange)}
.ea-station.on .ea-joinbtn i{animation:ea-blink 1s infinite}
@keyframes ea-blink{50%{opacity:.2}}
.ea-paywrap{display:flex;align-items:center;gap:10px;margin-top:9px}
.ea-payok{width:30px;height:30px;border-radius:50%;background:var(--orange);display:grid;place-items:center;flex:0 0 auto;transform:scale(0);transition:transform .45s cubic-bezier(.3,1.6,.4,1)}
.ea-station.on .ea-payok,.ea-station.done .ea-payok{transform:scale(1)}
.ea-payok svg{stroke:#fff;stroke-width:3;fill:none}
.ea-trn{font:500 10px 'Inter',sans-serif;color:var(--panel-dim)}
.ea-trn code{font-family:'Inter',sans-serif;font-weight:600;color:#fff;background:rgba(255,255,255,.1);padding:2px 6px;border-radius:4px;border:1px solid var(--panel-line)}
.ea-log{
  margin:6px 16px 16px;background:rgba(0,0,0,.25);border:1px solid var(--panel-line);border-radius:12px;
  padding:12px 14px;height:96px;overflow:hidden;font:500 10.5px/1.9 'Inter',sans-serif;color:var(--panel-dim);
  position:relative;
}
.ea-log::before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,var(--panel) 0,transparent 26px);pointer-events:none;z-index:1;opacity:.7}
.ea-log div b{color:var(--orange);font-weight:700}
.ea-log div em{color:#fff;font-style:normal;font-weight:600}
.ea-mft{display:flex;justify-content:space-between;align-items:center;padding:0 20px 16px;font:600 9.5px 'Inter',sans-serif;letter-spacing:.12em;color:var(--panel-dim)}
.ea-mft b{color:var(--orange)}
.ea-rv{opacity:0;transform:translateY(22px);transition:.7s cubic-bezier(.2,.7,.2,1)}
.ea-rv.in{opacity:1;transform:none}
@media(max-width:920px){
  .ea-split{grid-template-columns:1fr}
  .ea-stats{width:100%;justify-content:space-between}
  .ea-stat{flex:1}
}
@media(prefers-reduced-motion:reduce){
  .ea-bp *,.ea-bp *::before,.ea-bp *::after{animation:none!important;transition:none!important}
  .ea-rv{opacity:1;transform:none}
  .ea-scard{opacity:1!important}
}
</style>

<section class="ea-bp" id="ams">
  <div class="ea-wrap">
    <div class="ea-split">

      <div class="ea-rv">
        <span class="ea-kicker"><i></i> System Status · Active</span>
        <h2 class="ea-h2">Turn applications into admissions. <em>On autopilot.</em></h2>
        <p class="ea-lead">Our Application Management System streamlines the entire process for you and your students. Integrated with your Admission CRM and optimised for mobile, it handles <b>form submissions</b>, <b>document verification</b> and <b>payments</b> effortlessly.</p>

        <div class="ea-feats">
          <div class="ea-feat" data-jump="0"><div class="ea-fic">📋</div><div><b>Form Builder</b><span>Custom widgets for any site</span></div><small>Stage 01</small></div>
          <div class="ea-feat" data-jump="2"><div class="ea-fic">🎥</div><div><b>Video GD-PI</b><span>Automated counselling calls</span></div><small>Stage 03</small></div>
          <div class="ea-feat" data-jump="3"><div class="ea-fic">💳</div><div><b>Secure Payments</b><span>Instant fee reconciliation</span></div><small>Stage 04</small></div>
        </div>

        <div class="ea-stats">
          <div class="ea-stat"><b><span data-eacnt="500" data-suffix="+">0</span></b><span>Institutions</span></div>
          <div class="ea-stat"><b><span data-eacnt="1" data-suffix="M+">0</span></b><span>Apps Processed</span></div>
          <div class="ea-stat"><b><span data-eacnt="0">0</span></b><span>Apps Lost</span></div>
        </div>

        <a href="#demo" class="ea-cta">Start Automating Now <span aria-hidden="true">→</span></a>
        <span class="ea-cta-sub">Go live in days, not semesters — no IT team required.</span>
      </div>

      <div class="ea-machine ea-rv" id="eaMachine">
        <div class="ea-mhd">
          <b>LIVE SYSTEM FEED</b>
          <span class="ea-live"><b id="eaToday">128</b>&nbsp;apps today · <i></i> LIVE</span>
        </div>

        <div class="ea-pipe">
          <div class="ea-spine"><i id="eaSpine"></i></div>
          <div class="ea-packet" id="eaPacket"></div>

          <div class="ea-station" data-s="0" role="button" tabindex="0" aria-label="Stage 1: Application submitted">
            <span class="ea-dot"></span>
            <div class="ea-scard">
              <span class="ea-stamp">DONE ✓</span>
              <div class="ea-tag">New Submission</div>
              <div class="ea-st" id="eaAppId">Student ID · #APP-2026-1481</div>
              <div class="ea-sd">Form completed on mobile · 2 min 40 s</div>
            </div>
          </div>

          <div class="ea-station" data-s="1" role="button" tabindex="0" aria-label="Stage 2: AI verification">
            <span class="ea-dot"></span>
            <div class="ea-scard">
              <span class="ea-stamp">DONE ✓</span>
              <div class="ea-tag alt">✨ AI Verification</div>
              <div class="ea-st">Instant Document Check</div>
              <div class="ea-scan"><i></i></div>
              <div class="ea-docs">
                <span class="ea-doc" data-doc="0">MARKSHEET</span>
                <span class="ea-doc" data-doc="1">ID PROOF</span>
                <span class="ea-doc" data-doc="2">PHOTO</span>
              </div>
            </div>
          </div>

          <div class="ea-station" data-s="2" role="button" tabindex="0" aria-label="Stage 3: Video GD-PI">
            <span class="ea-dot"></span>
            <div class="ea-scard">
              <span class="ea-stamp">DONE ✓</span>
              <div class="ea-tag">GD-PI Stage</div>
              <div class="ea-st">Counselling Scheduled</div>
              <div class="ea-gdpi">
                <div class="ea-faces"><span class="ea-face f1">AR</span><span class="ea-face f2">PK</span><span class="ea-face f3">+4</span></div>
                <span class="ea-sd" style="margin:0">Synced with availability</span>
                <span class="ea-joinbtn"><i></i> JOIN CALL</span>
              </div>
            </div>
          </div>

          <div class="ea-station" data-s="3" role="button" tabindex="0" aria-label="Stage 4: Admission confirmed">
            <span class="ea-dot"></span>
            <div class="ea-scard">
              <div class="ea-tag">Admission Confirmed</div>
              <div class="ea-paywrap">
                <span class="ea-payok"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>
                <div>
                  <div class="ea-st" style="margin:0">Payment Secured</div>
                  <div class="ea-trn">TXN <code id="eaTrn">TRN_99210-A</code> · reconciled instantly</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="ea-log" id="eaLog" aria-hidden="true"></div>

        <div class="ea-mft">
          <span>AVG PROCESSING — <b>4 MIN 12 S</b></span>
          <span>DROP-OFFS — <b>0</b></span>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
(function(){
  var root=document.getElementById('ams');
  if(!root) return;
  var reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var stations=[].slice.call(root.querySelectorAll('.ea-station'));
  var packet=root.querySelector('#eaPacket');
  var spine=root.querySelector('#eaSpine');
  var pipe=root.querySelector('.ea-pipe');
  var docs=[].slice.call(root.querySelectorAll('.ea-doc'));
  var logEl=root.querySelector('#eaLog');
  var todayEl=root.querySelector('#eaToday');
  var appIdEl=root.querySelector('#eaAppId');
  var trnEl=root.querySelector('#eaTrn');

  var timers=[], cur=-1, today=128, running=true;
  function later(fn,ms){var t=setTimeout(fn,ms);timers.push(t);return t;}
  function clearTimers(){timers.forEach(clearTimeout);timers=[];}

  var LOGS=[
    ['<b>›</b> intake/forms — submission received <em>200 OK</em>',0],
    ['<b>›</b> ai/verify — 3 documents scanned · <em>authentic</em>',1],
    ['<b>›</b> scheduler — GD-PI slot locked with counsellor',2],
    ['<b>›</b> payments — fee captured · <em>reconciled</em>',3],
    ['<b>›</b> crm/sync — record pushed to Admission CRM',3]
  ];
  function logLine(html){
    if(!logEl) return;
    var d=document.createElement('div');
    d.innerHTML='['+new Date().toTimeString().slice(0,8)+'] '+html;
    logEl.appendChild(d);
    while(logEl.children.length>4) logEl.removeChild(logEl.firstChild);
  }

  function moveTo(n){
    var st=stations[n];
    if(!st||!packet||!spine||!pipe) return;
    var top=st.offsetTop+18;
    packet.style.top=(top+8)+'px';
    var first=stations[0].offsetTop+24;
    spine.style.height=Math.max(0,top-first+12)+'px';
  }

  function newIds(){
    var id=1400+Math.floor(Math.random()*500);
    if(appIdEl) appIdEl.textContent='Student ID · #APP-2026-'+id;
    if(trnEl) trnEl.textContent='TRN_'+(99000+Math.floor(Math.random()*999))+'-'+String.fromCharCode(65+Math.floor(Math.random()*6));
  }

  function setStage(n,manual){
    clearTimers();
    cur=n;
    stations.forEach(function(s,i){
      s.classList.toggle('on',i===n);
      s.classList.toggle('done',i<n);
      s.classList.toggle('fin',i===n&&n===stations.length-1);
    });
    moveTo(n);
    docs.forEach(function(d){d.classList.remove('ok');});
    LOGS.filter(function(l){return l[1]===n;}).forEach(function(l,i){
      later(function(){logLine(l[0]);},300+i*500);
    });
    if(n===1){
      docs.forEach(function(d,i){ later(function(){d.classList.add('ok');}, reduced?0:700+i*420); });
    }
    if(n===stations.length-1){
      later(function(){ today++; if(todayEl) todayEl.textContent=today; }, reduced?0:900);
    }
    if(manual){ pauseAuto(); }
  }

  var auto=null, resumeT=null;
  var DUR=[2600,3400,3000,3600];
  function tick(){
    var next=(cur+1)%stations.length;
    if(next===0){ newIds(); logLine('<b>›</b> pipeline — next application queued…'); }
    setStage(next,false);
    auto=setTimeout(tick,DUR[next]);
  }
  function startAuto(){ if(auto)clearTimeout(auto); tick(); }
  function pauseAuto(){
    if(auto)clearTimeout(auto);
    if(resumeT)clearTimeout(resumeT);
    resumeT=setTimeout(function(){ if(running) startAuto(); },6000);
  }

  stations.forEach(function(s,i){
    function go(){ setStage(i,true); }
    s.addEventListener('click',go);
    s.addEventListener('keydown',function(e){ if(e.key==='Enter'||e.key===' '){e.preventDefault();go();} });
  });
  [].slice.call(root.querySelectorAll('.ea-feat[data-jump]')).forEach(function(f){
    f.addEventListener('click',function(){ setStage(+f.dataset.jump,true); });
  });

  var seen=false;
  var io=new IntersectionObserver(function(es){
    es.forEach(function(e){
      if(e.isIntersecting && !seen){
        seen=true; running=true;
        logLine('<b>›</b> Booting application pipeline… <em>ready</em>');
        if(reduced){ setStage(3,false); stations.forEach(function(s,i){s.classList.toggle('done',i<3);}); }
        else startAuto();
      }else if(!e.isIntersecting && seen){
        running=false; if(auto)clearTimeout(auto); clearTimers();
      }else if(e.isIntersecting && seen && !reduced){
        running=true; startAuto();
      }
    });
  },{threshold:.25});
  io.observe(root.querySelector('#eaMachine'));

  window.addEventListener('resize',function(){ if(cur>=0) moveTo(cur); });

  var rv=new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){e.target.classList.add('in');rv.unobserve(e.target);} });
  },{threshold:.12});
  [].slice.call(root.querySelectorAll('.ea-rv')).forEach(function(el){rv.observe(el);});

  function animateNum(el,target,dur,prefix,suffix){
    if(!el) return;
    prefix=prefix||'';suffix=suffix||'';
    if(reduced||target===0){el.textContent=prefix+target.toLocaleString()+suffix;return;}
    var t0=null;
    function step(t){
      if(!t0)t0=t;
      var k=Math.min(1,(t-t0)/dur), eased=1-Math.pow(1-k,3);
      el.textContent=prefix+Math.round(target*eased).toLocaleString()+suffix;
      if(k<1)requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var co=new IntersectionObserver(function(es){
    es.forEach(function(e){
      if(e.isIntersecting){
        var el=e.target;
        animateNum(el,+el.dataset.eacnt,1400,el.dataset.prefix||'',el.dataset.suffix||'');
        co.unobserve(el);
      }
    });
  },{threshold:.4});
  [].slice.call(root.querySelectorAll('[data-eacnt]')).forEach(function(c){co.observe(c);});
})();
</script>
<!-- ===================== Mobile · AI Admission Journey (scoped .mx / #mobile) ===================== -->
<style>
.mx{
  --org:#DE6E30; --org-dk:#C95F26; --org-soft:#FBEFE7; --org-line:rgba(222,110,48,.28);
  --navy:#19335D; --navy-2:#0F2347; --navy-soft:#EDF1F8;
  --bg:#fff; --txt:#19335D; --mut:#5A6B8C;
  --line:#E6EAF2; --line-2:#D5DCEA; --grn:#1F9D6B; --red:#D64545;
  --ff:"Inter",sans-serif;
  position:relative;background:var(--bg);color:var(--txt);font-family:var(--ff);
}
.mx *{box-sizing:border-box;margin:0;padding:0}
.mx button{font-family:var(--ff);cursor:pointer;-webkit-tap-highlight-color:transparent}
.mx .bgfx{position:absolute;inset:-140px 0;pointer-events:none;
  background:
    radial-gradient(900px 480px at 84% 6%, rgba(222,110,48,.07), transparent 62%),
    radial-gradient(760px 480px at 6% 94%, rgba(25,51,93,.05), transparent 60%),
    repeating-linear-gradient(0deg, rgba(25,51,93,.03) 0 1px, transparent 1px 56px),
    repeating-linear-gradient(90deg, rgba(25,51,93,.03) 0 1px, transparent 1px 56px);
}
.mx .wrap{max-width:1180px;margin:0 auto;padding:0 24px;position:relative;z-index:1}
.mx .topbar{position:sticky;top:0;z-index:45;height:4px;background:var(--line)}
.mx .topbar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--navy),var(--org))}
.mx .intro{padding:88px 0 26px;text-align:center}
.mx .eyebrow{display:inline-flex;align-items:center;gap:10px;font-size:12px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--org);border:1px solid var(--org-line);background:var(--org-soft);padding:8px 16px;border-radius:999px}
.mx .eyebrow .pulse{width:8px;height:8px;border-radius:50%;background:var(--grn);box-shadow:0 0 0 0 rgba(31,157,107,.5);animation:mxPulse 2s infinite}
@keyframes mxPulse{70%{box-shadow:0 0 0 9px rgba(31,157,107,0)}100%{box-shadow:0 0 0 0 rgba(31,157,107,0)}}
.mx h2{font-weight:800;font-size:clamp(30px,4.4vw,52px);line-height:1.08;letter-spacing:-.028em;margin:20px auto 14px;color:var(--navy);max-width:19ch}
.mx h2 .hl{color:var(--org);position:relative}
.mx h2 .hl::after{content:"";position:absolute;left:0;right:0;bottom:.02em;height:.16em;background:var(--org-soft);z-index:-1;border-radius:3px}
.mx .lead{font-size:clamp(15px,1.6vw,17px);line-height:1.65;color:var(--mut);max-width:62ch;margin:0 auto}
.mx .lead b{color:var(--navy);font-weight:600}
.mx .scrollhint{margin:24px auto 0;display:flex;flex-direction:column;align-items:center;gap:6px;color:var(--mut);font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase}
.mx .scrollhint i{width:22px;height:34px;border:2px solid var(--line-2);border-radius:12px;position:relative;font-style:normal}
.mx .scrollhint i::after{content:"";position:absolute;left:50%;top:6px;width:4px;height:7px;margin-left:-2px;border-radius:3px;background:var(--org);animation:wheel 1.6s ease-in-out infinite}
@keyframes wheel{0%{transform:translateY(0);opacity:1}70%{transform:translateY(11px);opacity:0}100%{opacity:0}}
.mx .scrolly{display:grid;grid-template-columns:1.02fr .98fr;gap:48px;align-items:stretch}
.mx #mxSpacer{display:none}
.mx .stepscol{position:relative;z-index:2}
.mx .step{min-height:94vh;display:flex;align-items:center;width:100%}
.mx .stepcard{position:relative;border:1.5px solid var(--line);border-radius:24px;background:#fff;padding:28px 28px 26px;width:100%;max-width:520px;box-shadow:0 10px 30px rgba(25,51,93,.06);transition:border-color .45s,box-shadow .45s,transform .45s,opacity .45s;opacity:.45;transform:scale(.97);cursor:pointer}
.mx .step.act .stepcard{opacity:1;transform:scale(1);border-color:var(--org-line);box-shadow:0 24px 60px rgba(222,110,48,.14),0 8px 24px rgba(25,51,93,.08)}
.mx .stepcard .bignum{position:absolute;top:14px;right:20px;font-size:clamp(42px,5vw,64px);font-weight:800;letter-spacing:-.04em;color:var(--navy-soft);line-height:1;transition:color .45s;user-select:none}
.mx .step.act .stepcard .bignum{color:var(--org-soft)}
.mx .stepcard .ai{display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:800;letter-spacing:.1em;color:var(--org);background:var(--org-soft);border:1px solid var(--org-line);border-radius:7px;padding:4px 9px;margin-bottom:12px}
.mx .stepcard .ai.hum{color:var(--navy);background:var(--navy-soft);border-color:var(--line-2)}
.mx .stepcard h3{font-size:clamp(19px,2vw,25px);font-weight:800;letter-spacing:-.02em;color:var(--navy);max-width:18ch;line-height:1.2}
.mx .stepcard p{font-size:14px;line-height:1.65;color:var(--mut);margin-top:10px;max-width:46ch}
.mx .stepcard p b{color:var(--navy);font-weight:700}
.mx .metric{display:flex;align-items:baseline;gap:8px;margin-top:16px;border-top:1px dashed var(--line-2);padding-top:14px;flex-wrap:wrap}
.mx .metric b{font-size:clamp(19px,2vw,24px);font-weight:800;color:var(--org);letter-spacing:-.02em}
.mx .metric span{font-size:12px;color:var(--mut);font-weight:600}
.mx .stepbar{position:absolute;left:28px;right:28px;bottom:12px;height:3px;border-radius:2px;background:var(--line);overflow:hidden;opacity:0;transition:opacity .3s}
.mx .step.act .stepbar{opacity:1}
.mx .stepbar i{display:block;height:100%;width:0;background:var(--org);border-radius:2px}
.mx .stickycol{position:relative}
.mx .sticky{position:sticky;top:max(20px,calc(50vh - 372px));display:flex;justify-content:center;gap:18px;padding:10px 0}
.mx .glow{position:absolute;inset:4%;border-radius:50%;background:radial-gradient(closest-side,rgba(222,110,48,.13),transparent 72%);filter:blur(30px);z-index:0}
.mx .rail{display:flex;flex-direction:column;align-items:center;padding-top:54px;z-index:2}
.mx .railline{width:3px;flex:1;background:var(--line);border-radius:2px;position:relative;margin:6px 0}
.mx .railline i{position:absolute;top:0;left:0;right:0;height:0;background:linear-gradient(180deg,var(--navy),var(--org));border-radius:2px}
.mx .rdot{width:32px;height:32px;border-radius:50%;border:2px solid var(--line-2);background:#fff;color:var(--mut);font-size:11px;font-weight:800;display:grid;place-items:center;transition:.35s;padding:0;flex:0 0 auto}
.mx .rdot.done{border-color:var(--navy);color:var(--navy)}
.mx .rdot.act{background:var(--org);border-color:var(--org);color:#fff;box-shadow:0 0 0 5px var(--org-soft);transform:scale(1.1)}
.mx .pstage{position:relative;display:flex;justify-content:center;width:min(460px,100%)}
.mx .journey{position:absolute;inset:-14px -6px;z-index:1;pointer-events:none}
.mx .journey svg{width:100%;height:100%}
.mx .j-path{fill:none;stroke:rgba(25,51,93,.16);stroke-width:.7;stroke-dasharray:2 2.4}
.mx .j-prog{fill:none;stroke:url(#mxJg);stroke-width:1.1;stroke-linecap:round;stroke-dasharray:100;stroke-dashoffset:100;transition:stroke-dashoffset .25s linear;filter:drop-shadow(0 0 4px rgba(222,110,48,.45))}
.mx .j-node{position:absolute;transform:translate(-50%,-50%);display:flex;align-items:center;gap:8px;z-index:1}
.mx .j-node .jd{width:13px;height:13px;border-radius:50%;background:#fff;border:2px solid var(--line-2);transition:.5s}
.mx .j-node .jl{font-size:11px;font-weight:700;color:var(--mut);background:rgba(255,255,255,.94);border:1px solid var(--line);border-radius:8px;padding:4px 10px;white-space:nowrap;transition:.5s;box-shadow:0 4px 12px rgba(25,51,93,.1)}
.mx .j-node.on .jd{background:var(--org);border-color:var(--org);box-shadow:0 0 12px rgba(222,110,48,.6)}
.mx .j-node.on .jl{color:var(--navy);border-color:var(--org-line)}
.mx .j-node.l{flex-direction:row-reverse}.mx .j-node.t,.mx .j-node.b{flex-direction:column}
.mx .phone{position:relative;z-index:2;width:318px;border-radius:52px;padding:11px;background:linear-gradient(160deg,#2B4A7E,var(--navy) 40%,var(--navy-2));box-shadow:0 0 0 1.5px rgba(25,51,93,.25),0 44px 90px rgba(25,51,93,.32),0 12px 30px rgba(25,51,93,.22);perspective:1600px;-webkit-perspective:1600px}
.mx .flip{position:relative;height:622px;transform-style:preserve-3d;-webkit-transform-style:preserve-3d;transition:transform .9s cubic-bezier(.4,.05,.2,1)}
.mx .flip.flipped{transform:rotateY(180deg)}
.mx .screen{position:relative;height:100%;border-radius:42px;overflow:hidden;background:linear-gradient(175deg,#1E3A68 0%,var(--navy) 55%,var(--navy-2) 100%);display:flex;flex-direction:column;color:#fff;backface-visibility:hidden;-webkit-backface-visibility:hidden}
.mx .island{position:absolute;top:11px;left:50%;transform:translateX(-50%);z-index:6;width:108px;height:30px;border-radius:18px;background:#0A1730;display:flex;align-items:center;justify-content:center;gap:8px}
.mx .island i{display:block;border-radius:4px;background:#1A2C4F}
.mx .island .s1{width:34px;height:5px}
.mx .island .s2{width:9px;height:9px;border-radius:50%;background:#13254A;box-shadow:inset 0 0 3px #DE6E30}
.mx .sbar{display:flex;justify-content:space-between;align-items:center;padding:16px 26px 4px;font-size:12.5px;font-weight:600}
.mx .sig{display:flex;align-items:flex-end;gap:2px}
.mx .sig i{width:3px;background:#fff;border-radius:1px;display:block}
.mx .phead{display:flex;justify-content:space-between;align-items:center;padding:8px 16px 6px;gap:8px}
.mx .ptitle{font-size:12px;font-weight:700;display:flex;align-items:center;gap:8px;min-width:0}
.mx .aichip{font-size:9px;font-weight:800;letter-spacing:.1em;color:#FFB28A;border:1px solid rgba(222,110,48,.5);background:rgba(222,110,48,.18);border-radius:7px;padding:4px 9px;display:flex;align-items:center;gap:5px;white-space:nowrap}
.mx .aichip i{width:6px;height:6px;border-radius:50%;background:var(--org);animation:mxBlink 1.1s infinite}
@keyframes mxBlink{50%{opacity:.25}}
.mx .pfoot{display:flex;align-items:center;justify-content:space-between;padding:9px 18px 14px;border-top:1px solid rgba(255,255,255,.1);background:rgba(10,23,48,.5);font-size:10px;font-weight:800;letter-spacing:.08em;color:#A9B8D6}
.mx .pfoot b{color:#fff}
.mx .pfoot .sync{display:flex;align-items:center;gap:6px;color:#FFB28A}
.mx .spin{width:10px;height:10px;border-radius:50%;border:1.5px solid rgba(222,110,48,.3);border-top-color:var(--org);animation:mxSpin 1s linear infinite}
@keyframes mxSpin{to{transform:rotate(360deg)}}
.mx .scenes{flex:1;position:relative;min-height:0}
.mx .scene{position:absolute;inset:0;display:flex;flex-direction:column;padding:8px 16px 12px;overflow:hidden;opacity:0;transform:translateY(26px) scale(.98);transition:opacity .5s,transform .5s cubic-bezier(.2,.8,.2,1);pointer-events:none}
.mx .scene.act{opacity:1;transform:none}
.mx .cap{font-size:10px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:#A9B8D6;margin:2px 2px 10px}
.mx .cap em{font-style:normal;color:#FFB28A}
.mx .wcard{background:rgba(255,255,255,.97);border-radius:16px;padding:13px;color:var(--navy);box-shadow:0 8px 20px rgba(10,23,48,.3)}
.mx .fx{opacity:0;transform:translateY(14px) scale(.96);transition:opacity .5s,transform .5s cubic-bezier(.2,.9,.3,1.1)}
.mx .fx.vis{opacity:1;transform:none}
.mx .callbox{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px}
.mx .callav{width:84px;height:84px;border-radius:50%;background:var(--org);display:grid;place-items:center;font-size:32px;font-weight:800;position:relative;animation:mxRing 1s ease-in-out infinite}
.mx .callav::before,.mx .callav::after{content:"";position:absolute;inset:-10px;border-radius:50%;border:2px solid rgba(222,110,48,.45);animation:ripple 1.6s ease-out infinite}
.mx .callav::after{animation-delay:.8s}
@keyframes ripple{from{transform:scale(.85);opacity:1}to{transform:scale(1.5);opacity:0}}
@keyframes mxRing{0%,100%{transform:rotate(0)}20%{transform:rotate(-6deg)}40%{transform:rotate(6deg)}60%{transform:rotate(-3deg)}80%{transform:rotate(3deg)}}
.mx .scene[data-s="0"].miss .callav{animation:none;background:#56627E}
.mx .scene[data-s="0"].miss .callav::before,.mx .scene[data-s="0"].miss .callav::after{animation:none;opacity:0}
.mx .callbox b{font-size:17px}
.mx .callbox small{color:#A9B8D6;font-size:12px}
.mx .missed{margin-top:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#FF9D9D;background:rgba(214,69,69,.18);border:1px solid rgba(214,69,69,.4);border-radius:8px;padding:6px 14px}
.mx .s1note{text-align:center;font-size:11px;color:#8A98B5;line-height:1.6}
.mx .fline{display:flex;justify-content:space-between;align-items:center;padding:7px 0;border-bottom:1px dashed var(--line);gap:10px}
.mx .fline:last-child{border-bottom:0}
.mx .fline span{font-size:10.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--mut)}
.mx .fline b{font-size:12.5px;font-weight:700;min-height:16px;text-align:right}
.mx .fline b.typingnow::after{content:"▍";color:var(--org);animation:mxBlink .7s infinite}
.mx .stamp{align-self:center;margin-top:12px;font-size:11px;font-weight:800;color:#fff;background:var(--grn);border-radius:999px;padding:7px 16px;display:flex;gap:7px;align-items:center}
.mx .scorewrap{display:flex;gap:14px;align-items:center}
.mx .dial{flex:0 0 92px;height:92px;border-radius:50%;display:grid;place-items:center;background:conic-gradient(var(--org) calc(var(--p,0)*1%), var(--navy-soft) 0);position:relative}
.mx .dial::before{content:"";position:absolute;inset:9px;border-radius:50%;background:#fff}
.mx .dial b{position:relative;font-size:21px;font-weight:800;color:var(--org)}
.mx .dial small{position:absolute;bottom:17px;font-size:8px;letter-spacing:.08em;text-transform:uppercase;color:var(--mut);font-weight:700}
.mx .signals{flex:1;display:flex;flex-direction:column;gap:7px}
.mx .sig2{display:flex;gap:8px;align-items:center;font-size:11.5px;font-weight:600;color:var(--navy)}
.mx .sig2 i{flex:0 0 17px;height:17px;border-radius:50%;background:#E7F6EF;border:1px solid rgba(31,157,107,.35);display:grid;place-items:center;font-size:9px;font-style:normal;color:var(--grn)}
.mx .verdict{margin-top:10px;font-size:11.5px;font-weight:800;color:var(--org);background:var(--org-soft);border:1px solid var(--org-line);border-radius:10px;padding:8px 12px;text-align:center}
.mx .crow{display:flex;gap:10px;align-items:center;background:rgba(255,255,255,.97);border-radius:13px;padding:10px 12px;color:var(--navy);box-shadow:0 6px 14px rgba(10,23,48,.25);border:2px solid transparent;transition:border-color .4s,transform .4s}
.mx .crow+.crow{margin-top:8px}
.mx .crow .cav{flex:0 0 32px;height:32px;border-radius:10px;background:var(--navy);color:#fff;display:grid;place-items:center;font-weight:800;font-size:12px;transition:background .4s}
.mx .crow b{font-size:12.5px;display:block}
.mx .crow small{font-size:10.5px;color:var(--mut)}
.mx .crow .pct{margin-left:auto;font-size:12.5px;font-weight:800;color:var(--mut);transition:color .4s}
.mx .crow.win{border-color:var(--org);transform:translateX(4px)}
.mx .crow.win .pct{color:var(--org)}
.mx .crow.win .cav{background:var(--org)}
.mx .why{display:flex;gap:6px;flex-wrap:wrap;margin-top:10px}
.mx .why i{font-style:normal;font-size:10px;font-weight:700;color:var(--navy);background:rgba(255,255,255,.94);border-radius:7px;padding:5px 9px}
.mx .chat{flex:1;display:flex;flex-direction:column;gap:8px;padding-top:2px}
.mx .bub{max-width:86%;background:#fff;color:var(--navy);border-radius:14px 14px 14px 4px;padding:9px 12px;font-size:11.5px;line-height:1.5;box-shadow:0 6px 14px rgba(10,23,48,.25)}
.mx .bub small{display:block;font-size:8.5px;color:#9AA7C0;text-align:right;margin-top:3px}
.mx .bub .doc{display:flex;gap:8px;align-items:center;background:var(--navy-soft);border-radius:9px;padding:7px 9px;margin-top:7px;font-weight:700;font-size:11px}
.mx .bub .doc i{font-style:normal;font-size:15px}
.mx .botchip{align-self:flex-start;font-size:9px;font-weight:800;letter-spacing:.08em;color:#FFB28A;background:rgba(222,110,48,.18);border:1px solid rgba(222,110,48,.5);border-radius:6px;padding:3px 8px}
.mx .sched{align-self:center;margin-top:auto;font-size:10.5px;font-weight:800;color:#fff;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);border-radius:999px;padding:7px 15px;text-align:center}
.mx .donebox{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px;text-align:center;position:relative}
.mx .bigok{width:78px;height:78px;border-radius:50%;background:#E7F6EF;border:2px solid rgba(31,157,107,.45);display:grid;place-items:center;font-size:32px}
.mx .donebox b{font-size:17px}
.mx .donebox small{color:#A9B8D6;font-size:11.5px}
.mx .dstats{display:flex;gap:8px;margin-top:10px;width:100%}
.mx .dstat{flex:1;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.16);border-radius:12px;padding:9px 4px}
.mx .dstat b{font-size:16px;display:block}
.mx .dstat span{font-size:8.5px;letter-spacing:.06em;text-transform:uppercase;color:#A9B8D6;font-weight:700}
.mx .confetti{position:absolute;width:7px;height:7px;border-radius:2px;top:-10px;animation:fall 2.6s linear forwards;pointer-events:none}
@keyframes fall{to{transform:translateY(560px) rotate(540deg);opacity:0}}
.mx .fmap{padding:70px 0 30px}
.mx .fmap .mhead{text-align:center;margin-bottom:26px}
.mx .fmap h3{font-size:clamp(24px,3vw,36px);font-weight:800;letter-spacing:-.025em;color:var(--navy)}
.mx .fmap h3 em{font-style:normal;color:var(--org)}
.mx .fmap .msub{font-size:14.5px;color:var(--mut);margin:10px auto 0;max-width:56ch;line-height:1.6}
.mx .controls{display:flex;gap:16px;align-items:center;justify-content:center;flex-wrap:wrap;margin:22px 0 30px}
.mx .modes{display:inline-flex;padding:5px;gap:4px;background:var(--navy-soft);border:1px solid var(--line);border-radius:14px}
.mx .modes button{font-size:13px;font-weight:700;color:var(--mut);background:transparent;border:0;border-radius:10px;padding:10px 16px;transition:.25s;min-height:42px}
.mx .modes button[aria-pressed="true"]{color:#fff;background:var(--navy);box-shadow:0 6px 16px rgba(25,51,93,.28)}
.mx .modes button[aria-pressed="true"].ai-on{background:var(--org);box-shadow:0 6px 16px rgba(222,110,48,.35)}
.mx .inqctl{display:flex;align-items:center;gap:12px;background:#fff;border:1px solid var(--line);border-radius:14px;padding:10px 16px;box-shadow:0 6px 18px rgba(25,51,93,.06)}
.mx .inqctl label{font-size:11px;font-weight:800;letter-spacing:.07em;text-transform:uppercase;color:var(--mut)}
.mx .inqctl input[type=range]{width:min(180px,38vw);accent-color:var(--org)}
.mx .inqctl output{font-size:15px;font-weight:800;color:var(--navy);min-width:64px;text-align:right}
.mx .funnel{display:grid;grid-template-columns:1fr 44px 1fr 44px 1fr 44px 1fr 44px 1fr;gap:0;align-items:stretch}
.mx .fstage{border:1.5px solid var(--line);border-radius:18px;background:#fff;padding:16px 14px 14px;text-align:center;position:relative;transition:border-color .3s,box-shadow .3s,transform .3s;cursor:pointer;min-height:148px;display:flex;flex-direction:column;box-shadow:0 8px 22px rgba(25,51,93,.05)}
.mx .fstage:hover{transform:translateY(-3px)}
.mx .fstage.sel{border-color:var(--org);box-shadow:0 18px 44px rgba(222,110,48,.16)}
.mx .fstage .fic{font-size:21px;line-height:1}
.mx .fstage h4{font-size:12.5px;font-weight:800;color:var(--navy);margin-top:7px;letter-spacing:-.01em}
.mx .fstage .cnt{font-size:clamp(20px,2.4vw,28px);font-weight:800;color:var(--navy);letter-spacing:-.02em;margin-top:5px}
.mx .fstage.sel .cnt{color:var(--org)}
.mx .fstage .fbar{height:6px;border-radius:3px;background:var(--navy-soft);overflow:hidden;margin-top:auto}
.mx .fstage .fbar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--navy),var(--org));border-radius:3px;transition:width .8s cubic-bezier(.2,.8,.2,1)}
.mx .fstage .aimk{position:absolute;top:-9px;left:50%;transform:translateX(-50%);font-size:8.5px;font-weight:800;letter-spacing:.1em;color:#fff;background:var(--org);border-radius:6px;padding:3px 8px;opacity:0;transition:opacity .3s;white-space:nowrap}
.mx.aimode .fstage .aimk{opacity:1}
.mx .fconn{position:relative;display:flex;align-items:center;justify-content:center}
.mx .fconn::before{content:"";position:absolute;left:-2px;right:-2px;top:50%;height:2.5px;margin-top:-22px;background:repeating-linear-gradient(90deg,var(--line-2) 0 7px,transparent 7px 13px)}
.mx.aimode .fconn::before{background:repeating-linear-gradient(90deg,var(--org) 0 7px,transparent 7px 13px);animation:flowx 1s linear infinite}
@keyframes flowx{to{background-position:13px 0}}
.mx .fconn .arrow{position:absolute;top:50%;margin-top:-27px;right:-3px;color:var(--org);font-size:12px;font-weight:800}
.mx .loss{position:relative;z-index:1;font-size:9.5px;font-weight:800;color:var(--red);background:#FDECEC;border:1px solid rgba(214,69,69,.3);border-radius:7px;padding:4px 7px;margin-top:34px;white-space:nowrap;transition:.3s}
.mx .loss.ok{color:var(--grn);background:#E7F6EF;border-color:rgba(31,157,107,.3)}
.mx .fsummary{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-top:26px}
.mx .fdstats{display:grid;grid-template-columns:repeat(3,1fr);gap:9px;margin-top:14px}
.mx .fdstats>div{background:var(--navy-soft);border-radius:12px;padding:10px 8px;text-align:center;transition:background .3s}
.mx.aimode .fdstats>div{background:var(--org-soft)}
.mx .fdstats b{font-size:15px;font-weight:800;color:var(--navy);display:block;letter-spacing:-.01em}
.mx .fdstats span{font-size:9px;letter-spacing:.05em;text-transform:uppercase;color:var(--mut);font-weight:700}
.mx .fstage .cmp{display:block;font-size:9.5px;font-weight:700;color:var(--mut);margin:2px 0 7px}
.mx.aimode .fstage .cmp{color:var(--grn)}
.mx .fsum{border:1px solid var(--line);border-radius:16px;background:#FBFCFE;padding:16px;text-align:center}
.mx .fsum b{font-size:clamp(20px,2.4vw,26px);font-weight:800;color:var(--navy);display:block;letter-spacing:-.02em}
.mx .fsum b em{font-style:normal;color:var(--org)}
.mx .fsum.win{border-color:var(--org-line);background:var(--org-soft)}
.mx .fsum span{font-size:11px;color:var(--mut);letter-spacing:.05em;text-transform:uppercase;font-weight:700}
.mx .fdetail{margin-top:18px;border:1.5px solid var(--org-line);border-radius:20px;background:#fff;padding:22px 24px;display:none;animation:dIn .35s both}
.mx .fdetail.show{display:block}
@keyframes dIn{from{opacity:0;transform:translateY(12px)}}
.mx .fdetail .dh{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.mx .fdetail .dic{width:44px;height:44px;border-radius:13px;background:var(--org-soft);border:1px solid var(--org-line);display:grid;place-items:center;font-size:20px}
.mx .fdetail h5{font-size:17px;font-weight:800;color:var(--navy)}
.mx .fdetail .dh small{font-size:12px;color:var(--mut);display:block;margin-top:2px}
.mx .fdetail .dnum{margin-left:auto;text-align:right}
.mx .fdetail .dnum b{font-size:24px;font-weight:800;color:var(--org)}
.mx .fdetail .dnum span{display:block;font-size:10px;letter-spacing:.06em;text-transform:uppercase;color:var(--mut);font-weight:700}
.mx .fdetail p{font-size:13.5px;line-height:1.65;color:var(--mut);margin-top:12px}
.mx .fdetail p b{color:var(--navy)}
.mx .dtags{display:flex;gap:7px;flex-wrap:wrap;margin-top:12px}
.mx .dtags i{font-style:normal;font-size:11px;font-weight:700;color:var(--navy);background:var(--navy-soft);border-radius:8px;padding:6px 11px}
.mx.aimode .dtags i{color:var(--org);background:var(--org-soft)}
.mx .outro{padding:54px 0 100px;text-align:center}
.mx .outro h3{font-size:clamp(22px,3vw,34px);font-weight:800;letter-spacing:-.025em;color:var(--navy);max-width:26ch;margin:0 auto}
.mx .outro h3 em{font-style:normal;color:var(--org)}
.mx .outro .sub2{font-size:15px;color:var(--mut);margin:12px auto 26px;max-width:52ch;line-height:1.6}
.mx .ctas{display:flex;gap:14px;flex-wrap:wrap;align-items:center;justify-content:center}
.mx .btn{font-weight:700;font-size:15px;text-decoration:none;border:0;border-radius:14px;padding:15px 26px;display:inline-flex;align-items:center;gap:9px;transition:.2s;min-height:48px}
.mx .btn:active{transform:scale(.98)}
.mx .btn-pri{color:#fff;background:var(--org);box-shadow:0 12px 28px rgba(222,110,48,.35)}
.mx .btn-pri:hover{transform:translateY(-2px);box-shadow:0 18px 38px rgba(222,110,48,.45);background:var(--org-dk)}
.mx .btn-gho{color:var(--navy);border:1.5px solid var(--line-2);background:#fff}
.mx .btn-gho:hover{border-color:var(--navy);background:var(--navy-soft)}
.mx .cta-note{font-size:12.5px;color:var(--mut);width:100%;display:flex;gap:18px;flex-wrap:wrap;justify-content:center;margin-top:14px}
.mx .cta-note i{font-style:normal;display:inline-flex;align-items:center;gap:6px}
.mx .cta-note i::before{content:"";width:5px;height:5px;border-radius:50%;background:var(--grn)}
.mx .modal{position:fixed;inset:0;z-index:50;display:none;align-items:center;justify-content:center;padding:16px}
.mx .modal.open{display:flex}
.mx .mback{position:absolute;inset:0;background:rgba(15,35,71,.55);backdrop-filter:blur(5px);border:0;width:100%;cursor:default}
.mx .mbox{position:relative;background:#fff;border-radius:24px;width:min(520px,100%);max-height:88vh;overflow-y:auto;padding:28px;box-shadow:0 40px 100px rgba(15,35,71,.4);animation:dIn .35s both;-webkit-overflow-scrolling:touch}
.mx .mbox h3{font-size:21px;font-weight:800;color:var(--navy);letter-spacing:-.02em}
.mx .mbox .sub{font-size:13.5px;color:var(--mut);margin:6px 0 18px;line-height:1.55}
.mx .mclose{position:absolute;top:14px;right:14px;width:38px;height:38px;border-radius:10px;border:1px solid var(--line);background:#fff;color:var(--mut);font-size:16px}
.mx .mclose:hover{border-color:var(--navy);color:var(--navy)}
.mx .mfield{margin-bottom:13px}
.mx .mfield label{display:block;font-size:11.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--mut);margin-bottom:6px}
.mx .mfield input{width:100%;border:1.5px solid var(--line-2);border-radius:12px;padding:13px 14px;font-family:var(--ff);font-size:15px;color:var(--navy);outline:0;transition:border-color .2s}
.mx .mfield input:focus{border-color:var(--org)}
.mx .mfield .ferr{font-size:11.5px;color:var(--red);margin-top:4px;display:none}
.mx .mfield.bad input{border-color:var(--red)}
.mx .mfield.bad .ferr{display:block}
.mx .range{display:flex;align-items:center;gap:12px}
.mx .range input[type=range]{flex:1;accent-color:var(--org);padding:0;border:0}
.mx .range output{flex:0 0 86px;text-align:right;font-weight:800;font-size:14px;color:var(--navy)}
.mx .roi-out{margin-top:18px;border:1px solid var(--org-line);background:var(--org-soft);border-radius:18px;padding:18px}
.mx .roi-row{display:flex;justify-content:space-between;align-items:baseline;padding:7px 0;border-bottom:1px dashed var(--org-line);gap:10px}
.mx .roi-row:last-child{border-bottom:0}
.mx .roi-row span{font-size:12.5px;color:var(--mut);font-weight:600}
.mx .roi-row b{font-size:15px;color:var(--navy);font-weight:800;white-space:nowrap}
.mx .roi-big{font-size:22px!important;color:var(--org)!important}
.mx .roi-note{font-size:10.5px;color:var(--mut);margin-top:10px;line-height:1.5}
.mx .msubmit{width:100%;margin-top:6px;justify-content:center}
.mx .msuccess{text-align:center;padding:26px 8px;display:none}
.mx .msuccess.show{display:block}
.mx .msuccess .ok{width:62px;height:62px;border-radius:50%;background:#E7F6EF;border:1.5px solid rgba(31,157,107,.35);display:grid;place-items:center;font-size:26px;margin:0 auto 14px}
.mx .msuccess h4{font-size:18px;font-weight:800;color:var(--navy)}
.mx .msuccess p{font-size:13px;color:var(--mut);margin-top:6px;line-height:1.55}
.mx.jsfx .stepcard{transition:border-color .45s,box-shadow .45s}
.mx.jsfx .phone{will-change:transform}
.mx.jsfx .bgfx{will-change:transform}
.mx.jsfx .intro{will-change:transform,opacity}
.mx .step.act .metric b{animation:mpop .6s cubic-bezier(.2,.9,.3,1.4) both}
@keyframes mpop{0%{transform:scale(.6);opacity:0}100%{transform:scale(1);opacity:1}}
.mx .rvl{opacity:0;transform:translateY(34px);transition:opacity .9s cubic-bezier(.2,.8,.2,1),transform .9s cubic-bezier(.2,.8,.2,1)}
.mx .rvl.vis{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){
  .mx *{animation:none!important;transition:none!important}
  .mx .fx{opacity:1;transform:none}
  .mx .step{min-height:auto;padding:24px 0}
  .mx .stepcard{opacity:1;transform:none}
}
@media (max-width:1020px){
  .mx .scrolly{display:block}
  .mx .stickycol{z-index:6;background:linear-gradient(180deg,#fff 82%,rgba(255,255,255,0));padding-bottom:8px}
  .mx .stickycol.pinned{position:fixed;top:0;left:0;width:100%}
  .mx .stickycol.pinned-end{position:absolute;left:0;width:100%}
  .mx .sticky{position:static;justify-content:center;gap:12px;transform:scale(.72);transform-origin:top center;height:476px}
  .mx .rail{display:none}
  .mx .step{min-height:64vh}
  .mx .stepcard{max-width:100%;margin:0 auto}
  .mx #mxSpacer{display:block}
  .mx:not(.jsfx) .funnel{grid-template-columns:1fr;gap:10px}
  .mx:not(.jsfx) .fconn{display:none}
  .mx:not(.jsfx) .fstage{flex-direction:row;align-items:center;text-align:left;gap:12px;min-height:0;padding:14px 16px}
  .mx:not(.jsfx) .fstage .cnt{margin:0 0 0 auto}
  .mx:not(.jsfx) .fstage .fbar{display:none}
  .mx .fmap{padding-top:36px}
  .mx .fsummary{grid-template-columns:repeat(2,1fr)}
}
@media (max-width:560px){
  .mx .intro{padding:64px 0 18px}
  .mx .wrap{padding:0 16px}
  .mx .sticky{transform:scale(.6);height:398px}
  .mx .step{min-height:56vh}
  .mx .stepcard{padding:20px 18px 24px}
  .mx .controls{gap:10px}
  .mx .inqctl{width:100%;justify-content:space-between}
  .mx .fdetail{padding:18px 16px}
  .mx .fdetail .dnum{margin-left:0;width:100%;text-align:left}
  .mx .j-node .jl{font-size:9.5px;padding:3px 7px}
}
@media (max-width:380px){
  .mx .sticky{transform:scale(.54);height:360px}
}
/* fix: neutralize global bare-class leaks (.step/.chat/.cap/.bub) into this section */
#mobile .step{opacity:1;transform:none;border:0;background:none;border-radius:0;box-shadow:none}
#mobile .chat{max-width:none;border:0;box-shadow:none;background:none;border-radius:0;overflow:visible}
#mobile .cap{background:none;border:0;box-shadow:none;border-radius:0}
#mobile .bub{border:0}
#mobile .lead{margin-top:0}
</style>

<!-- ===================== CRM Impact Stories (scoped #stories) ===================== -->
<style id="cis-style">
#stories{--cis-navy:#19335D;--cis-orange:#DE6E30;background:linear-gradient(180deg,#ffffff 0%,#fbf8f5 100%);font-family:'Inter',sans-serif;color:var(--cis-navy);overflow:hidden}
#stories .cis-wrap{max-width:1200px;margin:0 auto;padding:38px 24px}
#stories .cis-head{text-align:center;max-width:720px;margin:0 auto}
#stories .cis-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--cis-orange);background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.18);padding:7px 16px;border-radius:99px}
#stories .cis-eyebrow .d{width:7px;height:7px;border-radius:50%;background:var(--cis-orange);box-shadow:0 0 8px rgba(222,110,48,.6);animation:cisPulse 2.2s infinite}
@keyframes cisPulse{0%,100%{opacity:1}50%{opacity:.35}}
#stories .cis-title{font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(28px,4.4vw,50px);line-height:1.1;letter-spacing:-.025em;margin:16px 0 12px}
#stories .cis-title em{font-style:normal;color:var(--cis-orange);position:relative;white-space:nowrap}
#stories .cis-title em::after{content:"";position:absolute;left:0;right:0;bottom:.02em;height:.16em;background:rgba(222,110,48,.22);border-radius:99px;z-index:-1}
#stories .cis-lead{font-size:clamp(15px,1.6vw,17.5px);line-height:1.6;color:rgba(25,51,93,.66);max-width:600px;margin:0 auto}
#stories .cis-trust{display:flex;flex-wrap:wrap;justify-content:center;gap:10px 12px;margin:22px auto 0;max-width:780px}
#stories .cis-chip{display:inline-flex;align-items:center;gap:7px;font-size:13px;font-weight:600;color:var(--cis-navy);background:#fff;border:1px solid rgba(25,51,93,.1);box-shadow:0 4px 14px rgba(25,51,93,.05);padding:9px 15px;border-radius:99px}
#stories .cis-chip svg{width:15px;height:15px;fill:#f5a623}
#stories .cis-chip b{font-weight:800}
#stories .cis-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;max-width:1140px;margin:38px auto 0;justify-content:center}
#stories .cis-card{position:relative;display:flex;flex-direction:column;background:#fff;border:1px solid rgba(25,51,93,.1);border-radius:20px;overflow:hidden;box-shadow:0 10px 30px rgba(25,51,93,.06);transition:transform .35s cubic-bezier(.2,.8,.2,1),box-shadow .35s,border-color .35s;animation:cisRise .6s both}
@keyframes cisRise{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:none}}
#stories .cis-card:nth-child(2){animation-delay:.1s}
#stories .cis-card:nth-child(3){animation-delay:.2s}
#stories .cis-card::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--cis-orange),#f1a877);transform:scaleX(0);transform-origin:left;transition:transform .4s;z-index:3}
#stories .cis-card:hover{transform:translateY(-6px);box-shadow:0 22px 50px rgba(25,51,93,.14);border-color:rgba(222,110,48,.4)}
#stories .cis-card:hover::before{transform:scaleX(1)}
#stories .cis-video{position:relative;aspect-ratio:16/9;background:#0d1b33;cursor:pointer;overflow:hidden}
#stories .cis-video img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
#stories .cis-card:hover .cis-video img{transform:scale(1.06)}
#stories .cis-video::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(13,27,51,.04),rgba(13,27,51,.42));pointer-events:none}
#stories .cis-play{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:60px;height:60px;border-radius:50%;background:rgba(255,255,255,.92);display:grid;place-items:center;z-index:2;transition:.3s;box-shadow:0 8px 24px rgba(0,0,0,.25)}
#stories .cis-play svg{width:24px;height:24px;fill:var(--cis-orange);margin-left:3px}
#stories .cis-card:hover .cis-play{background:var(--cis-orange);transform:translate(-50%,-50%) scale(1.1)}
#stories .cis-card:hover .cis-play svg{fill:#fff}
#stories .cis-dur{position:absolute;bottom:12px;right:12px;z-index:2;font-size:12px;font-weight:600;color:#fff;background:rgba(13,27,51,.72);padding:4px 10px;border-radius:99px}
#stories .cis-video.playing img,#stories .cis-video.playing::after,#stories .cis-video.playing .cis-play,#stories .cis-video.playing .cis-dur{display:none}
#stories .cis-video iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
#stories .cis-body{display:flex;flex-direction:column;gap:14px;padding:22px 22px 24px;flex:1}
#stories .cis-stars{display:flex;gap:3px}
#stories .cis-stars svg{width:17px;height:17px;fill:#f5a623}
#stories .cis-quote{font-size:15px;line-height:1.65;color:rgba(25,51,93,.82);flex:1;position:relative;margin:0}
#stories .cis-quote::before{content:"\201C";font-family:'Poppins',serif;color:rgba(222,110,48,.22);font-size:3.4em;line-height:0;position:absolute;top:.42em;left:-3px;z-index:0}
#stories .cis-quote span{position:relative;z-index:1}
#stories .cis-author{display:flex;align-items:center;gap:13px;padding-top:16px;border-top:1px solid rgba(25,51,93,.08)}
#stories .cis-av{position:relative;width:48px;height:48px;flex:none}
#stories .cis-av img{width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 2px var(--cis-orange)}
#stories .cis-av .fb{display:none;width:48px;height:48px;border-radius:50%;background:var(--cis-orange);color:#fff;font-weight:800;font-size:16px;place-items:center;border:2px solid #fff;box-shadow:0 0 0 2px var(--cis-orange)}
#stories .cis-av.noimg img{display:none}
#stories .cis-av.noimg .fb{display:grid}
#stories .cis-aname{font-weight:700;font-size:15px;color:var(--cis-navy)}
#stories .cis-arole{font-size:12.5px;color:rgba(25,51,93,.6);margin-top:2px;line-height:1.4}
#stories .cis-cta{display:flex;flex-wrap:wrap;justify-content:center;gap:14px;margin-top:36px}
#stories .cis-btn{display:inline-flex;align-items:center;gap:9px;font-weight:700;font-size:15px;padding:14px 28px;border-radius:99px;text-decoration:none;transition:.25s}
#stories .cis-btn svg{width:18px;height:18px;fill:currentColor}
#stories .cis-btn.primary{background:var(--cis-orange);color:#fff;box-shadow:0 10px 26px rgba(222,110,48,.3)}
#stories .cis-btn.primary:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(222,110,48,.4)}
#stories .cis-btn.ghost{background:#fff;color:var(--cis-navy);border:1.5px solid rgba(25,51,93,.18)}
#stories .cis-btn.ghost:hover{border-color:var(--cis-orange);color:var(--cis-orange)}
@media(prefers-reduced-motion:reduce){#stories .cis-card{animation:none}#stories .cis-eyebrow .d{animation:none}}
@media(max-width:600px){#stories .cis-wrap{padding:26px 18px}}
</style>

<section id="stories" aria-labelledby="stories-title">
  <div class="cis-wrap">
    <div class="cis-head">
      <span class="cis-eyebrow"><span class="d"></span> CRM Impact Stories</span>
      <h2 class="cis-title" id="stories-title">Powering growth for <em>500+ happy customers</em></h2>
      <p class="cis-lead">Real admissions leaders and the stories behind them. See how institutions grow with ExtraaEdge.</p>
      <div class="cis-trust">
        <span class="cis-chip"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><b>4.7</b>/5 on G2</span>
        <span class="cis-chip"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg>Top rated on Capterra</span>
        <span class="cis-chip">&#127891; <b>500+</b> Institutions</span>
        <span class="cis-chip">&#127757; <b>12+</b> Countries</span>
      </div>
    </div>

    <div class="cis-grid">

      <article class="cis-card">
        <div class="cis-video" data-yt="3SHgLf1GFgk" role="button" tabindex="0" aria-label="Play video testimonial: Silky Jain Marwah, Tula's Institute">
          <img src="https://img.youtube.com/vi/3SHgLf1GFgk/hqdefault.jpg" alt="Silky Jain Marwah, Executive Director, Tula's Institute — ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5.5v13l11-6.5z"/></svg></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-body">
          <div class="cis-stars" aria-label="Rated 5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg></div>
          <p class="cis-quote"><span>ExtraaEdge is an incredibly dynamic and trustworthy platform that truly understands our needs. Most changes we require are implemented in a very short span of time, and creating reports on our own has been a game-changer.</span></p>
          <div class="cis-author">
            <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp" alt="Silky Jain Marwah" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">SJ</span></span>
            <div><div class="cis-aname">Silky Jain Marwah</div><div class="cis-arole">Executive Director &middot; Tula's Institute</div></div>
          </div>
        </div>
      </article>

      <article class="cis-card">
        <div class="cis-video" data-yt="dWLdQ8E3FOU" role="button" tabindex="0" aria-label="Play video testimonial: Pranay Rupani, Annapurna College of Film &amp; Media">
          <img src="https://img.youtube.com/vi/dWLdQ8E3FOU/hqdefault.jpg" alt="Pranay Rupani, Head of Admissions &amp; Marketing, Annapurna College of Film &amp; Media — ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5.5v13l11-6.5z"/></svg></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-body">
          <div class="cis-stars" aria-label="Rated 5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg></div>
          <p class="cis-quote"><span>A true game-changer for us at Annapurna College. From seamless WhatsApp integrations to automated workflows, our entire lead journey is now streamlined and measurable. The team's dedication makes them indispensable.</span></p>
          <div class="cis-author">
            <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp" alt="Pranay Rupani" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">PR</span></span>
            <div><div class="cis-aname">Pranay Rupani</div><div class="cis-arole">Head of Admissions &amp; Marketing &middot; Annapurna College of Film &amp; Media</div></div>
          </div>
        </div>
      </article>

      <article class="cis-card">
        <div class="cis-video" data-yt="yfK83D2SKps" role="button" tabindex="0" aria-label="Play video testimonial: K. Nirmala Devi, Indian Academy Group">
          <img src="https://img.youtube.com/vi/yfK83D2SKps/hqdefault.jpg" alt="K. Nirmala Devi, Assistant Manager, Indian Academy Group — ExtraaEdge CRM review" loading="lazy" decoding="async">
          <span class="cis-play"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5.5v13l11-6.5z"/></svg></span>
          <span class="cis-dur">&#9654; 2 min</span>
        </div>
        <div class="cis-body">
          <div class="cis-stars" aria-label="Rated 5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.6 7.1.7-5.4 4.8 1.6 7L12 19.8 5.8 23l1.6-7L2 9.3l7.1-.7z"/></svg></div>
          <p class="cis-quote"><span>Very user-friendly and fully customizable to our needs. Tracking the lead journey is smooth, and the technical team is accessible anytime — they resolve issues immediately without any delays.</span></p>
          <div class="cis-author">
            <span class="cis-av"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp" alt="K. Nirmala Devi" loading="lazy" decoding="async"><span class="fb" aria-hidden="true">KN</span></span>
            <div><div class="cis-aname">K. Nirmala Devi</div><div class="cis-arole">Assistant Manager &middot; Indian Academy Group</div></div>
          </div>
        </div>
      </article>

    </div>

    <div class="cis-cta">
      <a class="cis-btn primary" href="#demo">Book a free demo <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.2 5l7 7-7 7-1.6-1.6 4.3-4.3H4v-2.2h11.9l-4.3-4.3z"/></svg></a>
      <a class="cis-btn ghost" href="#demo">Browse all success stories</a>
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

<!-- ===================== SEGMENT · INTERACTIVE PREVIEW ===================== -->
<!-- ===================== SEGMENTS · Built for your institution (scoped #segments) ===================== -->
<style>
#segments{
  --sg-orange:#DE6E30;
  --sg-blue:#19335D;
  --sg-bg:#FFFFFF;
  --sg-txt:var(--sg-blue);
  --sg-mut:rgba(25,51,93,.66);
  --sg-dim:rgba(25,51,93,.45);
  --sg-line:rgba(25,51,93,.12);
  --sg-line2:rgba(25,51,93,.22);
  --sg-card:rgba(25,51,93,.025);
  --sg-o-soft:rgba(222,110,48,.08);
  --sg-o-line:rgba(222,110,48,.35);
  --sg-grad:linear-gradient(98deg,#DE6E30,#E8854D);
  --sg-font:'Inter',sans-serif;
  --sg-r:20px;
  position:relative;
  padding:clamp(72px,9vw,128px) 0;
  background:
    radial-gradient(900px 480px at 88% -5%,rgba(222,110,48,.06),transparent 60%),
    radial-gradient(760px 520px at -5% 105%,rgba(25,51,93,.045),transparent 60%),
    var(--sg-bg);
  color:var(--sg-txt);
  font-family:var(--sg-font);
  overflow:clip;
}
#segments *{box-sizing:border-box;margin:0;padding:0}
#segments .sg-wrap{max-width:1200px;margin:0 auto;padding:0 24px;display:block}

#segments .sg-eyebrow{display:inline-flex;align-items:center;gap:9px;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--sg-orange);border:1px solid var(--sg-o-line);background:var(--sg-o-soft);padding:8px 16px;border-radius:99px}
#segments .sg-eyebrow .dot{width:7px;height:7px;border-radius:50%;background:var(--sg-orange);box-shadow:0 0 8px rgba(222,110,48,.6);animation:sgPulse 2.2s infinite}
@keyframes sgPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.35);opacity:.55}}
#segments .sg-h2{font-weight:800;font-size:clamp(31px,4.3vw,50px);line-height:1.08;letter-spacing:-.025em;margin:20px 0 16px;max-width:780px;color:var(--sg-blue)}
#segments .sg-h2 em{font-style:normal;color:var(--sg-orange);position:relative}
#segments .sg-h2 em::after{content:"";position:absolute;left:0;right:0;bottom:.04em;height:.14em;background:rgba(222,110,48,.22);border-radius:99px;z-index:-1}
#segments .sg-lead{font-size:clamp(15px,1.6vw,17.5px);line-height:1.65;color:var(--sg-mut);max-width:620px}

#segments .sg-intro{font-size:clamp(15px,1.6vw,17.5px);line-height:1.65;color:var(--sg-mut);max-width:620px}
.sg-chip-q{font-size:12.5px;font-weight:700;color:var(--sg-dim);letter-spacing:.08em;text-transform:uppercase;margin:18px 0 0}
#segments .sg-personas{display:flex;gap:10px;margin:12px 0 8px;overflow-x:auto;scrollbar-width:none;padding-bottom:6px}
#segments .sg-personas::-webkit-scrollbar{display:none}
#segments .sg-chip{flex:0 0 auto;display:inline-flex;align-items:center;gap:9px;padding:11px 18px;border-radius:99px;border:1px solid var(--sg-line2);background:#fff;color:var(--sg-mut);font:600 13.5px/1 var(--sg-font);cursor:pointer;transition:all .25s ease;white-space:nowrap}
#segments .sg-chip svg{width:16px;height:16px;stroke-width:1.8}
#segments .sg-chip:hover{border-color:var(--sg-blue);color:var(--sg-blue);transform:translateY(-1px);box-shadow:0 4px 14px -6px rgba(25,51,93,.25)}
#segments .sg-chip.on{background:var(--sg-blue);border-color:var(--sg-blue);color:#fff;box-shadow:0 8px 22px -8px rgba(25,51,93,.5)}

#segments .sg-grid{display:grid;grid-template-columns:minmax(0,1fr) 30px minmax(0,1.06fr);gap:0 28px;margin-top:30px;align-items:start}
#segments .sg-railwrap{align-self:stretch}
#segments .sg-stage{align-self:start}

#segments .sg-rail{position:sticky;top:var(--sg-stick,0px);height:calc(100vh - var(--sg-stick,0px));display:flex;flex-direction:column;align-items:center;justify-content:center}
#segments .sg-rdot{position:relative;width:30px;height:30px;border-radius:50%;border:1px solid var(--sg-line2);background:#fff;color:var(--sg-dim);font:700 10.5px var(--sg-font);cursor:pointer;transition:all .3s;z-index:1}
#segments .sg-rdot.on{border-color:var(--sg-orange);color:#fff;background:var(--sg-orange);box-shadow:0 0 0 4px rgba(222,110,48,.15)}
#segments .sg-rln{width:2px;height:34px;background:var(--sg-line);position:relative;overflow:hidden}
#segments .sg-rln i{position:absolute;inset:0;background:var(--sg-orange);transform:scaleY(0);transform-origin:top;transition:transform .5s ease;display:block}
#segments .sg-rln.fill i{transform:scaleY(1)}

#segments .sg-ch{padding:13vh 0;opacity:.3;transition:opacity .5s ease,transform .5s ease;transform:translateY(8px)}
#segments .sg-ch.active{opacity:1;transform:none}
#segments .sg-ch:first-child{padding-top:4vh}
#segments .sg-ix{display:flex;align-items:center;gap:12px;font:800 13px var(--sg-font);color:var(--sg-orange);letter-spacing:.04em}
#segments .sg-ix .k{font-size:11px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--sg-dim);padding-left:12px;border-left:1px solid var(--sg-line2)}
#segments .sg-ch h3{font-weight:800;font-size:clamp(22px,2.5vw,29px);line-height:1.18;letter-spacing:-.02em;margin:14px 0 12px;color:var(--sg-blue)}
#segments .sg-ch>p{font-size:15.5px;line-height:1.7;color:var(--sg-mut);max-width:480px}
#segments .sg-feats{list-style:none;margin-top:24px;display:grid;gap:10px}
#segments .sg-feats li{display:flex;gap:14px;align-items:flex-start;padding:14px 16px;border:1px solid var(--sg-line);border-radius:14px;background:#fff;transition:border-color .25s,box-shadow .25s,transform .25s}
#segments .sg-feats li:hover{border-color:var(--sg-o-line);box-shadow:0 8px 22px -12px rgba(25,51,93,.22);transform:translateX(4px)}
#segments .sg-feats .n{flex:0 0 auto;width:26px;height:26px;border-radius:8px;display:grid;place-items:center;font:700 11px var(--sg-font);color:var(--sg-orange);background:var(--sg-o-soft);border:1px solid var(--sg-o-line)}
#segments .sg-feats b{display:block;font-size:14.5px;font-weight:700;letter-spacing:-.01em;color:var(--sg-blue)}
#segments .sg-feats span.s{display:block;font-size:13px;color:var(--sg-mut);margin-top:3px;line-height:1.5}
#segments .sg-proof{display:flex;gap:14px;align-items:flex-start;margin-top:22px;padding:16px 18px;border-radius:14px;border:1px dashed var(--sg-o-line);background:var(--sg-o-soft)}
#segments .sg-proof .q{font-size:13.5px;line-height:1.6;color:var(--sg-blue);font-style:italic}
#segments .sg-proof .a{display:block;margin-top:7px;font-style:normal;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--sg-dim)}
#segments .sg-proof svg{flex:0 0 auto;width:18px;height:18px;color:var(--sg-orange);margin-top:2px}

#segments .sg-stage{position:sticky;top:var(--sg-stick,0px);height:calc(100vh - var(--sg-stick,0px));display:flex;flex-direction:column;justify-content:center;padding:20px 0}
#segments .sg-win{max-height:100%}
#segments .sg-win{border:1px solid var(--sg-line2);border-radius:var(--sg-r);background:#fff;box-shadow:0 34px 70px -28px rgba(25,51,93,.28),0 4px 16px -8px rgba(25,51,93,.12);overflow:hidden auto;scrollbar-width:thin;position:relative}
#segments .sg-win::before{content:"";position:absolute;top:0;left:0;right:0;height:4px;background:var(--sg-grad)}
#segments .sg-chrome{display:flex;align-items:center;gap:8px;padding:14px 18px 12px;border-bottom:1px solid var(--sg-line);background:rgba(25,51,93,.02)}
#segments .sg-chrome i{width:10px;height:10px;border-radius:50%;background:rgba(25,51,93,.14)}
#segments .sg-chrome i:nth-child(1){background:rgba(222,110,48,.85)}
#segments .sg-chrome i:nth-child(2){background:rgba(222,110,48,.4)}
#segments .sg-chrome i:nth-child(3){background:rgba(25,51,93,.3)}
#segments .sg-url{margin-left:10px;font:600 11.5px var(--sg-font);color:var(--sg-dim);background:#fff;border:1px solid var(--sg-line);padding:5px 12px;border-radius:8px}
#segments .sg-live{margin-left:auto;display:inline-flex;align-items:center;gap:6px;font:800 10px var(--sg-font);letter-spacing:.14em;color:var(--sg-orange);background:var(--sg-o-soft);border:1px solid var(--sg-o-line);padding:5px 10px;border-radius:99px}
#segments .sg-live .d{width:6px;height:6px;border-radius:50%;background:var(--sg-orange);animation:sgPulse 1.6s infinite}
#segments .sg-body{padding:22px 22px 20px;position:relative}
#segments .sg-fade{transition:opacity .28s ease,transform .28s ease}
#segments .sg-fade.out{opacity:0;transform:translateY(8px)}

#segments .sg-id{display:flex;align-items:center;gap:13px}
#segments .sg-badge{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;background:var(--sg-blue);color:#fff;box-shadow:0 8px 18px -8px rgba(25,51,93,.5)}
#segments .sg-badge svg{width:21px;height:21px;stroke-width:1.7}
#segments .sg-nm{font-weight:800;font-size:16.5px;letter-spacing:-.015em;color:var(--sg-blue)}
#segments .sg-sub{font-size:12px;color:var(--sg-dim);margin-top:2px;font-weight:500}

#segments .sg-metric{display:flex;align-items:baseline;gap:12px;margin:20px 0 4px}
#segments .sg-mv{font-weight:900;font-size:clamp(38px,4vw,50px);letter-spacing:-.035em;color:var(--sg-orange);font-variant-numeric:tabular-nums}
#segments .sg-ml{font-size:13px;color:var(--sg-mut);line-height:1.45;max-width:200px;font-weight:500}

#segments .sg-pipe{margin:18px 0 16px}
#segments .sg-pipe-h{display:flex;justify-content:space-between;font:700 10.5px var(--sg-font);letter-spacing:.1em;text-transform:uppercase;color:var(--sg-dim);margin-bottom:8px}
#segments .sg-bar{height:8px;border-radius:99px;background:rgba(25,51,93,.08);overflow:hidden;position:relative}
#segments .sg-bar i{position:absolute;inset:0;width:0;background:var(--sg-grad);border-radius:inherit;transition:width 1.1s cubic-bezier(.22,1,.36,1);display:block}
#segments .sg-bar i::after{content:"";position:absolute;inset:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);animation:sgSheen 2.4s infinite}
@keyframes sgSheen{0%{transform:translateX(-100%)}60%,100%{transform:translateX(100%)}}

#segments .sg-leads{display:grid;gap:8px;margin:14px 0}
#segments .sg-lead{display:flex;align-items:center;gap:12px;padding:11px 13px;border-radius:12px;border:1px solid var(--sg-line);background:#fff;opacity:0;transform:translateX(14px);transition:opacity .4s ease,transform .4s ease}
#segments .sg-lead.in{opacity:1;transform:none}
#segments .sg-av{flex:0 0 auto;width:32px;height:32px;border-radius:50%;display:grid;place-items:center;font:700 11px var(--sg-font);color:#fff;background:var(--sg-blue)}
#segments .sg-li{min-width:0;flex:1}
#segments .sg-li b{display:block;font-size:13px;font-weight:700;color:var(--sg-blue);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#segments .sg-li span{display:block;font-size:11.5px;color:var(--sg-dim);margin-top:1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
#segments .sg-score{flex:0 0 auto;font:700 11px var(--sg-font);padding:5px 9px;border-radius:8px}
#segments .sg-score.hot{color:#fff;background:var(--sg-orange)}
#segments .sg-score.warm{color:var(--sg-orange);background:var(--sg-o-soft);border:1px solid var(--sg-o-line)}
#segments .sg-score.ok{color:var(--sg-blue);background:rgba(25,51,93,.07);border:1px solid var(--sg-line2)}

#segments .sg-wa{display:flex;gap:10px;align-items:flex-start;margin-top:14px}
#segments .sg-wa-ic{flex:0 0 auto;width:28px;height:28px;border-radius:50%;display:grid;place-items:center;background:rgba(25,51,93,.07);border:1px solid var(--sg-line2);color:var(--sg-blue)}
#segments .sg-wa-ic svg{width:14px;height:14px}
#segments .sg-bub{position:relative;font-size:12.5px;line-height:1.55;color:var(--sg-blue);background:rgba(25,51,93,.045);border:1px solid var(--sg-line);padding:10px 32px 10px 13px;border-radius:4px 14px 14px 14px;min-height:38px;flex:1}
#segments .sg-bub .cur{display:inline-block;width:6px;height:13px;background:var(--sg-orange);margin-left:2px;vertical-align:-2px;animation:sgBlink .8s infinite}
@keyframes sgBlink{50%{opacity:0}}
#segments .sg-bub .tick{position:absolute;right:9px;bottom:6px;font-size:10px;color:var(--sg-orange);letter-spacing:-2px;font-weight:700}

#segments .sg-cta{display:flex;align-items:center;justify-content:space-between;gap:14px;margin-top:18px;padding:15px 18px;border-radius:14px;background:var(--sg-orange);color:#fff;font:700 14.5px var(--sg-font);text-decoration:none;letter-spacing:-.01em;box-shadow:0 14px 32px -12px rgba(222,110,48,.6);transition:transform .25s,box-shadow .25s,background .25s}
#segments .sg-cta:hover{transform:translateY(-2px);background:#C95F26;box-shadow:0 20px 40px -12px rgba(222,110,48,.7)}
#segments .sg-cta svg{width:18px;height:18px;flex:0 0 auto;transition:transform .25s}
#segments .sg-cta:hover svg{transform:translateX(4px)}
#segments .sg-trust{display:flex;flex-wrap:wrap;gap:7px 16px;justify-content:center;margin-top:12px;font-size:11.5px;font-weight:500;color:var(--sg-dim)}
#segments .sg-trust span{display:inline-flex;align-items:center;gap:6px}
#segments .sg-trust svg{width:12px;height:12px;color:var(--sg-orange)}

#segments.sg-paused .dot,#segments.sg-paused .sg-live .d,#segments.sg-paused .sg-bar i::after{animation-play-state:paused}

#segments .sg-chip:focus-visible,#segments .sg-rdot:focus-visible,#segments .sg-cta:focus-visible{
  outline:3px solid rgba(222,110,48,.55);outline-offset:2px}

@media (max-width:1020px){
  #segments .sg-grid{grid-template-columns:1fr;gap:26px}
  #segments .sg-railwrap{display:none}
  #segments .sg-stage{position:static;height:auto;display:block;padding:0;order:2}
  #segments .sg-ch{display:none;padding:0;opacity:1;transform:none}
  #segments .sg-ch.active{display:block;animation:sgIn .45s ease}
  @keyframes sgIn{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
  #segments .sg-ch>p{max-width:none}
}
@media (prefers-reduced-motion:reduce){
  #segments *,#segments *::before,#segments *::after{animation:none!important;transition:none!important}
}
</style>

<section id="segments" aria-label="Built for your institution">
  <div class="sg-wrap">

    <div class="sg-eyebrow"><span class="dot"></span> Built for your institution</div>
    <h2 class="sg-h2">One platform. Tuned to the way <em>your institution runs.</em></h2>
    <p class="sg-intro">Not a one-size-fits-all CRM. Pick your institution type and watch ExtraaEdge reshape itself — your channels, your pipeline, your admission model.</p>

    <p class="sg-chip-q">Which one are you?</p>
    <div class="sg-personas" role="tablist" aria-label="Institution type">
      <button class="sg-chip on" data-seg="he" role="tab" aria-selected="true"><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-4 9 4-9 4z"/><path d="M7.5 11.5V16c0 1.1 2 2.2 4.5 2.2s4.5-1.1 4.5-2.2v-4.5"/></svg>Higher Education</button>
      <button class="sg-chip" data-seg="school" role="tab" aria-selected="false"><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V8l7-4 7 4v13"/><path d="M10 21v-5h4v5"/></svg>Schools · K-12</button>
      <button class="sg-chip" data-seg="edtech" role="tab" aria-selected="false"><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="12" rx="2"/><path d="M2 20h20"/></svg>EdTech</button>
      <button class="sg-chip" data-seg="coaching" role="tab" aria-selected="false"><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h13a1 1 0 011 1v13H7a2 2 0 00-2 2z"/><path d="M5 19a2 2 0 012-2h12"/></svg>Coaching</button>
      <button class="sg-chip" data-seg="overseas" role="tab" aria-selected="false"><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3c2.5 2.6 2.5 15.4 0 18M12 3c-2.5 2.6-2.5 15.4 0 18"/></svg>Study Abroad</button>
    </div>

    <div class="sg-grid">

      <!-- LEFT · narrative -->
      <div class="sg-narr">

        <article class="sg-ch active" data-seg="he" id="sg-he">
          <div class="sg-ix">01 <span class="k">Higher Education</span></div>
          <h3>Universities &amp; colleges, run end to end.</h3>
          <p>From first enquiry to final enrolment — capture every lead, let AI prioritise real intent, and orchestrate programs, campuses and scholarships from one platform.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Omnichannel capture</b><span class="s">Ads, website, WhatsApp &amp; portals land in one inbox — zero leakage</span></div></li>
            <li><span class="n">02</span><div><b>AI lead scoring</b><span class="s">Counsellors spend their day on students most likely to enrol</span></div></li>
            <li><span class="n">03</span><div><b>Multi-campus workflows</b><span class="s">Programs, intakes &amp; scholarships, perfectly organised</span></div></li>
          </ul>
          <div class="sg-proof"><svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M7.2 11c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5H4v6h3.2zm10 0c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5h-6.6v6h3.2z"/></svg><div class="q">Our counsellors stopped chasing cold lists. Conversion moved within the first intake itself.<span class="a">— Director of Admissions, Multi-campus University</span></div></div>
        </article>

        <article class="sg-ch" data-seg="school" id="sg-school">
          <div class="sg-ix">02 <span class="k">Schools · K-12</span></div>
          <h3>Admissions parents actually enjoy.</h3>
          <p>Digitise enquiries and applications for every grade, automate warm WhatsApp follow-ups, and move each family cleanly from first visit to fee payment.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Forms for every grade</b><span class="s">Branded online enquiry &amp; application, mobile-first for parents</span></div></li>
            <li><span class="n">02</span><div><b>Parent WhatsApp automation</b><span class="s">Timely, personalised nudges — never spammy</span></div></li>
            <li><span class="n">03</span><div><b>Enquiry → fee pipeline</b><span class="s">One clean view of every family's journey</span></div></li>
          </ul>
          <div class="sg-proof"><svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M7.2 11c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5H4v6h3.2zm10 0c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5h-6.6v6h3.2z"/></svg><div class="q">Parents now get a reply before they've left the campus gate. Walk-in to admission jumped visibly.<span class="a">— Principal, K-12 School Group</span></div></div>
        </article>

        <article class="sg-ch" data-seg="edtech" id="sg-edtech">
          <div class="sg-ix">03 <span class="k">EdTech</span></div>
          <h3>Qualify at scale. Sell to the serious.</h3>
          <p>AI calling works through thousands of leads 24×7, scores intent from real behaviour, and routes only hot prospects to sales — grow without growing headcount.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>24×7 AI calling</b><span class="s">Thousands of leads qualified automatically, even at 2 AM</span></div></li>
            <li><span class="n">02</span><div><b>Behavioural intent scoring</b><span class="s">Real signals from clicks, calls &amp; replies — not guesswork</span></div></li>
            <li><span class="n">03</span><div><b>Smart sales routing</b><span class="s">Hot leads hit a rep's screen in seconds</span></div></li>
          </ul>
          <div class="sg-proof"><svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M7.2 11c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5H4v6h3.2zm10 0c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5h-6.6v6h3.2z"/></svg><div class="q">Same sales team, three times the pipeline. The AI does the first conversation for us.<span class="a">— Growth Head, EdTech Platform</span></div></div>
        </article>

        <article class="sg-ch" data-seg="coaching" id="sg-coaching">
          <div class="sg-ix">04 <span class="k">Coaching Institutes</span></div>
          <h3>Every batch, walk-in &amp; centre, in control.</h3>
          <p>Run batch-wise admissions with live seats and waitlists, capture every walk-in, and compare counsellor performance across all your centres in one view.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Batch &amp; seat management</b><span class="s">Live capacity, automatic waitlists, zero overbooking</span></div></li>
            <li><span class="n">02</span><div><b>Walk-in capture</b><span class="s">Front-desk app — no enquiry slips through</span></div></li>
            <li><span class="n">03</span><div><b>Multi-centre dashboard</b><span class="s">One unified command view of every branch</span></div></li>
          </ul>
          <div class="sg-proof"><svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M7.2 11c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5H4v6h3.2zm10 0c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5h-6.6v6h3.2z"/></svg><div class="q">I open one dashboard at 9 AM and know exactly which centre needs my attention today.<span class="a">— Founder, Multi-centre Coaching Institute</span></div></div>
        </article>

        <article class="sg-ch" data-seg="overseas" id="sg-overseas">
          <div class="sg-ix">05 <span class="k">Overseas · Study Abroad</span></div>
          <h3>Global applications, one calm pipeline.</h3>
          <p>Track applications across countries and universities, manage document checklists and verification, and keep every student updated automatically at every stage.</p>
          <ul class="sg-feats">
            <li><span class="n">01</span><div><b>Multi-country pipeline</b><span class="s">Universities, intakes &amp; deadlines — organised by default</span></div></li>
            <li><span class="n">02</span><div><b>Document management</b><span class="s">Checklists, uploads &amp; verification in one place</span></div></li>
            <li><span class="n">03</span><div><b>Automated student updates</b><span class="s">Status at every stage, hands-free</span></div></li>
          </ul>
          <div class="sg-proof"><svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M7.2 11c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5H4v6h3.2zm10 0c-.5 2.6-2 4.4-4.2 5.6l1 2.4c4-1.6 6.6-4.9 6.6-9.6V5h-6.6v6h3.2z"/></svg><div class="q">No more spreadsheets per country. Every counsellor sees the same live pipeline.<span class="a">— CEO, Study Abroad Consultancy</span></div></div>
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
                <span class="sg-wa-ic"><svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 00-8.6 15.1L2 22l5-1.3A10 10 0 1012 2zm5.4 13.9c-.2.7-1.3 1.3-1.9 1.4-.5.1-1.1.1-1.8-.1-3.2-1-5.3-3.1-6.5-5.9-.4-.9.3-2.4 1-2.7.3-.1.7-.1.9.2l1 1.7c.1.3 0 .6-.2.8l-.5.6c.6 1.3 1.7 2.4 3 3l.6-.5c.2-.2.5-.3.8-.2l1.7.9c.2.2.3.5.1.8z"/></svg></span>
                <div class="sg-bub"><span id="sgWa"></span><span class="cur" id="sgCur"></span><span class="tick">✓✓</span></div>
              </div>
            </div>
            <a class="sg-cta" href="https://www.extraaedge.com/book-a-demo/" id="sgCta"><span id="sgCtaT">See it live for Higher Education</span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            <div class="sg-trust">
              <span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>30-min personalised demo</span>
              <span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>No credit card</span>
              <span><svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Trusted by 500+ institutes</span>
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
      leads:[{av:'AI',b:'AI Caller · Batch #214',s:'1,240 calls completed overnight',score:'Running',cls:'ok'},
             {av:'NV',b:'Neha V. · Data Science Pro',s:'Asked about EMI · attended webinar',score:'96 · Hot',cls:'hot'},
             {av:'AT',b:'Arjun T. · UX Bootcamp',s:'Opened pricing page 3× today',score:'78 · Warm',cls:'warm'}],
      wa:'Hi Neha! Great talking to you. Booking your counselling call for 6 PM today — our advisor Rahul will join.',
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
<style>

.ee-bp{
  --paper:#ffffff; --paper-2:#f6f8fc;
  --ink:#19335D; --ink-soft:#5b6b82;
  --line:rgba(25,51,93,.12);
  --orange:#DE6E30; --orange-2:#f0974f; --orange-soft:#fbeadf;
  --green:#10b981; --mint:#7CFFB2;
  --panel:#19335D; --panel-2:#21407a;
  --panel-line:rgba(151,178,229,.16);
  --panel-txt:#dfe8fa; --panel-dim:#8ea4cd;
  font-family:'Inter',sans-serif;
  background:var(--paper); color:var(--ink);
  position:relative; overflow:clip;
}
.ee-bp::before{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:
    repeating-linear-gradient(0deg,transparent 0 31px,var(--line) 31px 32px),
    repeating-linear-gradient(90deg,transparent 0 31px,var(--line) 31px 32px);
  mask-image:radial-gradient(120% 90% at 70% 10%,#000 30%,transparent 75%);
  opacity:.5;
}
.ee-bp *{box-sizing:border-box;margin:0;padding:0}
.ee-bp .ee-wrap{max-width:1180px;margin:0 auto;padding:104px 28px 88px;position:relative}
.ee-kicker{display:inline-flex;align-items:center;gap:10px;font:600 11px/1 'Inter',sans-serif;letter-spacing:.22em;text-transform:uppercase;color:var(--orange);border:1px solid currentColor;border-radius:999px;padding:8px 14px;background:rgba(255,255,255,.55)}
.ee-kicker i{width:7px;height:7px;border-radius:50%;background:var(--orange);animation:ee-ping 1.6s ease-out infinite}
@keyframes ee-ping{0%{box-shadow:0 0 0 0 rgba(222,110,48,.5)}100%{box-shadow:0 0 0 10px rgba(222,110,48,0)}}
.ee-h2{font:600 clamp(34px,4.6vw,58px)/1.06 'Poppins',sans-serif;letter-spacing:-.015em;margin:22px 0 18px;max-width:18ch}
.ee-h2 em{font-style:italic;font-weight:500;color:var(--orange);background-image:linear-gradient(transparent 78%,var(--orange-soft) 78%)}
.ee-lead{max-width:54ch;font-size:17px;line-height:1.65;color:var(--ink-soft)}
.ee-lead b{color:var(--ink)}
.ee-headrow{display:flex;justify-content:space-between;align-items:flex-end;gap:40px;margin-bottom:64px}
.ee-index{font:500 12px/1.9 'Inter',sans-serif;color:var(--ink-soft);text-align:right;white-space:nowrap;display:none}
@media(min-width:960px){.ee-index{display:block}}
.ee-index span{color:var(--orange)}
.ee-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:clamp(36px,6vw,90px);align-items:start}
.ee-stories{position:relative;padding-left:38px}
.ee-rail{position:absolute;left:10px;top:6px;bottom:6px;width:2px;background:var(--line)}
.ee-rail i{position:absolute;left:0;top:0;width:2px;height:0;background:var(--orange)}
.ee-story{padding:9vh 0;max-width:46ch;position:relative;opacity:.3;transition:opacity .5s ease}
.ee-story:first-child{padding-top:2vh}
.ee-story.on{opacity:1}
.ee-node{position:absolute;left:-38px;top:calc(9vh + 2px);width:24px;height:24px;display:grid;place-items:center;font:600 10px 'Inter',sans-serif;color:var(--ink-soft);background:var(--paper);border:1.5px solid var(--line);border-radius:50%;cursor:pointer;transition:.35s;}
.ee-story:first-child .ee-node{top:calc(2vh + 2px)}
.ee-node:hover{border-color:var(--orange);color:var(--orange);transform:scale(1.12)}
.ee-story.on .ee-node{background:var(--orange);border-color:var(--orange);color:#fff;box-shadow:0 0 0 6px rgba(222,110,48,.14)}
.ee-tag{font:600 10px/1 'Inter',sans-serif;letter-spacing:.2em;text-transform:uppercase;color:var(--orange)}
.ee-story h3{font:600 clamp(24px,2.6vw,31px)/1.15 'Poppins',sans-serif;letter-spacing:-.01em;margin:12px 0 14px}
.ee-story p{font-size:15.5px;line-height:1.7;color:var(--ink-soft)}
.ee-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:18px}
.ee-chip{font:500 11.5px 'Inter',sans-serif;color:var(--ink);border:1px solid var(--line);background:rgba(255,255,255,.6);padding:7px 12px;border-radius:6px;transition:.2s}
.ee-chip:hover{border-color:var(--orange);color:var(--orange);transform:translateY(-2px)}
.ee-cta{display:inline-flex;align-items:center;gap:10px;margin-top:26px;font:600 14px 'Inter',sans-serif;color:#fff;text-decoration:none;background:var(--ink);padding:14px 22px;border-radius:10px;box-shadow:4px 4px 0 var(--orange);transition:.2s}
.ee-cta:hover{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--orange)}
.ee-sticky{position:sticky;top:7vh;height:86vh;display:flex;align-items:center;perspective:1200px}
.ee-device{width:100%;max-width:490px;margin:0 auto;border-radius:20px;background:linear-gradient(165deg,var(--panel-2),var(--panel) 55%);border:1px solid var(--panel-line);color:var(--panel-txt);box-shadow:0 40px 80px -30px rgba(25,51,93,.4),0 0 0 8px rgba(255,255,255,.5),0 0 0 9px var(--line);overflow:hidden;position:relative;transform-style:preserve-3d;transition:transform .25s ease;will-change:transform;}
.ee-device::after{content:"";position:absolute;inset:10px;border:1px dashed rgba(151,178,229,.12);border-radius:14px;pointer-events:none}
.ee-shine{position:absolute;inset:0;background:linear-gradient(105deg,transparent 40%,rgba(255,255,255,.07) 50%,transparent 60%);transform:translateX(-120%);pointer-events:none;z-index:4}
.ee-device.shined .ee-shine{animation:ee-shine 1.1s ease}
@keyframes ee-shine{to{transform:translateX(120%)}}
.ee-dhd{display:flex;justify-content:space-between;align-items:center;padding:14px 18px;border-bottom:1px solid var(--panel-line);font:600 13px 'Inter',sans-serif}
.ee-live{display:inline-flex;align-items:center;gap:7px;font:600 10px 'Inter',sans-serif;letter-spacing:.15em;color:var(--mint)}
.ee-live i{width:7px;height:7px;border-radius:50%;background:var(--mint);animation:ee-ping 1.6s infinite}
.ee-pills{display:flex;gap:6px;padding:10px 14px;border-bottom:1px solid var(--panel-line);overflow-x:auto;scrollbar-width:none}
.ee-pills::-webkit-scrollbar{display:none}
.ee-pill{flex:0 0 auto;font:600 10px 'Inter',sans-serif;letter-spacing:.08em;color:var(--panel-dim);background:rgba(255,255,255,.04);border:1px solid var(--panel-line);border-radius:999px;padding:7px 12px;cursor:pointer;transition:.25s;white-space:nowrap;}
.ee-pill:hover{color:var(--panel-txt);border-color:rgba(151,178,229,.4)}
.ee-pill.on{background:var(--orange);border-color:var(--orange);color:#fff}
.ee-screen{position:relative;height:368px;padding:20px 18px}
.ee-view{position:absolute;inset:20px 18px;opacity:0;transform:translateY(14px) scale(.985);transition:opacity .45s ease,transform .45s ease;pointer-events:none}
.ee-view.on{opacity:1;transform:none;pointer-events:auto}
.ee-mono-dim{font:600 10px 'Inter',sans-serif;letter-spacing:.18em;text-transform:uppercase;color:var(--panel-dim);margin-bottom:12px}
.ee-feed{display:flex;flex-direction:column;gap:9px;overflow:hidden;max-height:300px}
.ee-row{display:flex;justify-content:space-between;align-items:center;gap:12px;background:rgba(255,255,255,.045);border:1px solid var(--panel-line);border-radius:12px;padding:11px 13px}
.ee-row.new{animation:ee-drop .5s cubic-bezier(.2,.8,.2,1)}
@keyframes ee-drop{from{opacity:0;transform:translateY(-16px) scale(.97)}to{opacity:1;transform:none}}
.ee-id{display:flex;gap:11px;align-items:center}
.ee-av{width:33px;height:33px;border-radius:9px;display:grid;place-items:center;font:600 11px 'Inter',sans-serif;background:linear-gradient(135deg,var(--orange),var(--orange-2));color:#fff;flex:0 0 auto}
.ee-row b{font-size:12.5px;display:block}
.ee-row small{font-size:10.5px;color:var(--panel-dim)}
.ee-sync{font:600 9px 'Inter',sans-serif;letter-spacing:.14em;color:var(--mint);border:1px solid rgba(124,255,178,.35);border-radius:5px;padding:4px 7px;flex:0 0 auto}
.ee-feedfoot{margin-top:10px;font:500 10px 'Inter',sans-serif;color:var(--panel-dim)}
.ee-feedfoot b{color:var(--mint)}
.ee-bubble{max-width:84%;padding:11px 14px;border-radius:13px;font-size:12.5px;line-height:1.55;margin-bottom:10px;opacity:0;transform:translateY(8px);transition:.4s}
.ee-bubble.show{opacity:1;transform:none}
.ee-bubble.u{background:rgba(255,255,255,.07);border:1px solid var(--panel-line);border-bottom-left-radius:4px}
.ee-bubble.a{background:linear-gradient(135deg,var(--orange),#e07d3a);color:#fff;margin-left:auto;border-bottom-right-radius:4px}
.ee-typing{display:none;gap:4px;padding:10px 13px;background:rgba(255,255,255,.07);border-radius:13px;width:fit-content;margin-left:auto}
.ee-typing.show{display:inline-flex}
.ee-typing i{width:5px;height:5px;border-radius:50%;background:var(--panel-dim);animation:ee-tp 1s infinite}
.ee-typing i:nth-child(2){animation-delay:.15s}.ee-typing i:nth-child(3){animation-delay:.3s}
@keyframes ee-tp{0%,100%{opacity:.3;transform:translateY(0)}50%{opacity:1;transform:translateY(-3px)}}
.ee-handover{display:flex;align-items:center;gap:8px;margin-top:6px;font:600 9.5px 'Inter',sans-serif;letter-spacing:.12em;color:var(--mint);opacity:0;transition:.4s}
.ee-handover.show{opacity:1}
.ee-handover::before{content:"";flex:1;height:1px;background:var(--panel-line)}
.ee-handover::after{content:"";flex:1;height:1px;background:var(--panel-line)}
.ee-center{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}
.ee-ring{width:70px;height:70px;border-radius:50%;display:grid;place-items:center;background:var(--orange);position:relative}
.ee-ring::before,.ee-ring::after{content:"";position:absolute;inset:-12px;border-radius:50%;border:1px solid rgba(222,110,48,.5);animation:ee-rg 2.2s ease-out infinite}
.ee-ring::after{animation-delay:1.1s}
@keyframes ee-rg{0%{transform:scale(.7);opacity:1}100%{transform:scale(1.5);opacity:0}}
.ee-wave{display:flex;gap:4px;align-items:flex-end;height:26px;margin-top:16px}
.ee-wave i{width:4px;border-radius:3px;background:linear-gradient(180deg,var(--orange-2),var(--orange));animation:ee-wv 1s ease-in-out infinite}
@keyframes ee-wv{0%,100%{height:6px}50%{height:26px}}
.ee-calllog{margin-top:16px;width:100%;max-width:280px;text-align:left}
.ee-calllog div{font:500 10.5px 'Inter',sans-serif;color:var(--panel-dim);padding:5px 0;border-bottom:1px dashed var(--panel-line);opacity:0;transform:translateX(-8px);transition:.4s}
.ee-calllog div.show{opacity:1;transform:none}
.ee-calllog b{color:var(--mint)}
.ee-gaugewrap{display:flex;gap:18px;align-items:center}
.ee-gauge{position:relative;width:150px;height:150px;flex:0 0 auto}
.ee-gauge svg{transform:rotate(-90deg)}
.ee-gauge .bg{stroke:rgba(255,255,255,.08)}
.ee-gauge .fg{stroke:url(#eeGrad);stroke-linecap:round;stroke-dasharray:408;stroke-dashoffset:408;transition:stroke-dashoffset 1.4s cubic-bezier(.2,.8,.2,1)}
.ee-gauge .num{position:absolute;inset:0;display:grid;place-items:center;font:600 44px/1 'Poppins',sans-serif;color:#f0974f}
.ee-gstats{flex:1;display:flex;flex-direction:column;gap:8px}
.ee-gstat{background:rgba(255,255,255,.04);border:1px solid var(--panel-line);border-radius:10px;padding:9px 12px;display:flex;justify-content:space-between;align-items:center}
.ee-gstat small{font:500 9.5px 'Inter',sans-serif;letter-spacing:.08em;color:var(--panel-dim);text-transform:uppercase}
.ee-gstat b{font-size:12px}
.ee-spark{margin-top:14px}
.ee-spark path{stroke:var(--orange-2);stroke-width:2;fill:none;stroke-dasharray:600;stroke-dashoffset:600;transition:stroke-dashoffset 1.6s ease .3s}
.ee-spark.run path{stroke-dashoffset:0}
.ee-spark .area{fill:url(#eeAreaGrad);stroke:none;opacity:0;transition:opacity .8s ease .8s}
.ee-spark.run .area{opacity:1}
.ee-orbit{position:relative;width:170px;height:170px;margin-bottom:14px}
.ee-orbit .core{position:absolute;inset:50px;border-radius:50%;background:var(--green);display:grid;place-items:center;font-size:26px;color:#fff;box-shadow:0 0 0 10px rgba(16,185,129,.15)}
.ee-orbit .path{position:absolute;inset:0;border:1px dashed rgba(151,178,229,.3);border-radius:50%;animation:ee-spin 14s linear infinite}
.ee-orbit .sat{position:absolute;top:-13px;left:50%;margin-left:-13px;width:26px;height:26px;border-radius:8px;background:var(--panel-2);border:1px solid var(--panel-line);display:grid;place-items:center;font:600 8px 'Inter',sans-serif;color:var(--panel-txt);animation:ee-counterspin 14s linear infinite}
.ee-orbit .path.p2{inset:14px;animation-duration:10s;animation-direction:reverse}
.ee-orbit .path.p2 .sat{animation-duration:10s;animation-direction:reverse}
@keyframes ee-spin{to{transform:rotate(360deg)}}
@keyframes ee-counterspin{to{transform:rotate(-360deg)}}
.ee-scalecount{font:600 30px/1 'Poppins',sans-serif;color:#ffd9bf}
.ee-scalecount small{font:600 10px 'Inter',sans-serif;letter-spacing:.15em;color:var(--panel-dim);display:block;margin-top:6px}
.ee-stage-label{position:absolute;right:18px;bottom:12px;z-index:3;font:500 10px 'Inter',sans-serif;color:var(--panel-dim);letter-spacing:.18em}
.ee-metrics{margin-top:96px;border-top:1.5px solid var(--ink);border-bottom:1.5px solid var(--ink);display:grid;grid-template-columns:repeat(4,1fr)}
.ee-m{padding:30px 22px;border-left:1px solid var(--line)}
.ee-m:first-child{border-left:none}
.ee-m b{display:block;font:600 clamp(34px,3.6vw,46px)/1 'Poppins',sans-serif;color:var(--orange);letter-spacing:-.01em}
.ee-m span{display:block;margin-top:10px;font:500 11px 'Inter',sans-serif;letter-spacing:.16em;text-transform:uppercase;color:var(--ink-soft)}
.ee-roi{margin-top:72px;display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,1fr);border:1.5px solid var(--ink);border-radius:18px;overflow:hidden;background:rgba(255,255,255,.55);}
.ee-roi-l{padding:38px 36px}
.ee-roi-l h3{font:600 clamp(24px,2.8vw,34px)/1.15 'Poppins',sans-serif;letter-spacing:-.01em}
.ee-roi-l h3 em{font-style:italic;color:var(--orange)}
.ee-roi-l p{margin-top:12px;font-size:14.5px;line-height:1.65;color:var(--ink-soft);max-width:44ch}
.ee-sliderbox{margin-top:30px}
.ee-sliderbox label{display:flex;justify-content:space-between;font:600 11px 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft)}
.ee-sliderbox label output{color:var(--orange);font-size:13px}
.ee-range{appearance:none;-webkit-appearance:none;width:100%;height:4px;border-radius:99px;background:linear-gradient(90deg,var(--orange) var(--p,30%),var(--line) var(--p,30%));margin-top:16px;cursor:pointer}
.ee-range::-webkit-slider-thumb{appearance:none;-webkit-appearance:none;width:22px;height:22px;border-radius:50%;background:var(--paper);border:5px solid var(--orange);box-shadow:0 2px 8px rgba(25,51,93,.3);transition:transform .15s}
.ee-range::-webkit-slider-thumb:hover{transform:scale(1.15)}
.ee-range::-moz-range-thumb{width:22px;height:22px;border-radius:50%;background:var(--paper);border:5px solid var(--orange);box-shadow:0 2px 8px rgba(25,51,93,.3)}
.ee-roi-note{margin-top:18px;font:500 10px 'Inter',sans-serif;color:var(--ink-soft);opacity:.75}
.ee-roi-r{background:var(--ink);color:#fff;padding:38px 36px;display:flex;flex-direction:column;justify-content:center;gap:22px;position:relative;overflow:hidden}
.ee-roi-r::before{content:"";position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent 0 31px,rgba(255,255,255,.05) 31px 32px),repeating-linear-gradient(90deg,transparent 0 31px,rgba(255,255,255,.05) 31px 32px);pointer-events:none}
.ee-roi-stat small{font:600 10px 'Inter',sans-serif;letter-spacing:.18em;text-transform:uppercase;color:#9bb3d6;display:block;margin-bottom:8px}
.ee-roi-stat b{font:600 clamp(30px,3.4vw,44px)/1 'Poppins',sans-serif;color:#f0974f}
.ee-roi-stat.hero b{font-size:clamp(40px,4.6vw,60px);color:var(--orange-2);text-shadow:0 0 40px rgba(222,110,48,.4)}
.ee-roi-cta{position:relative;display:inline-flex;align-items:center;gap:10px;width:fit-content;font:600 14px 'Inter',sans-serif;color:var(--ink);background:#fff;text-decoration:none;padding:14px 24px;border-radius:10px;box-shadow:4px 4px 0 var(--orange);transition:.2s}
.ee-roi-cta:hover{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--orange)}
.ee-rv{opacity:0;transform:translateY(22px);transition:.7s cubic-bezier(.2,.7,.2,1)}
.ee-rv.in{opacity:1;transform:none}
@media(max-width:880px){
  .ee-grid{grid-template-columns:1fr}
  .ee-sticky{position:sticky;top:8px;height:auto;order:-1;z-index:5;padding:0 0 14px;perspective:none}
  .ee-device{max-width:none}
  .ee-screen{height:330px}
  .ee-story{padding:48px 0}
  .ee-node{top:50px}
  .ee-story:first-child .ee-node{top:50px}
  .ee-story:first-child{padding-top:48px}
  .ee-roi{grid-template-columns:1fr}
  .ee-metrics{grid-template-columns:repeat(2,1fr)}
  .ee-m:nth-child(3){border-left:none;border-top:1px solid var(--line)}
  .ee-m:nth-child(4){border-top:1px solid var(--line)}
}
@media(prefers-reduced-motion:reduce){
  .ee-bp *,.ee-bp *::before,.ee-bp *::after{animation:none!important;transition:none!important}
  .ee-rv,.ee-bubble{opacity:1!important;transform:none!important}
}
</style>

<section class="ee-bp" id="ecosystem">
  <div class="ee-wrap">
    <div class="ee-headrow ee-rv">
      <div>
        <span class="ee-kicker"><i></i> Admission Ecosystem</span>
        <h2 class="ee-h2">Why institutes choose ExtraaEdge as the <em>architect of their admissions.</em></h2>
        <p class="ee-lead">Most Admission CRMs help you <b>manage</b> admissions. ExtraaEdge helps you <b>design</b> how admissions should work — end to end, at scale.</p>
      </div>
    </div>
    <div class="ee-grid">
      <div class="ee-stories">
        <div class="ee-rail"><i id="eeRail"></i></div>
        <article class="ee-story on" data-stage="0">
          <button class="ee-node" aria-label="Go to stage 1">01</button>
          <span class="ee-tag">Foundation</span>
          <h3>One Unified Admission Cloud</h3>
          <p>Every channel, team and stage on a single intelligent platform — no fragmented tools, no manual follow-ups.</p>
          <div class="ee-chips"><span class="ee-chip">Ads Integration</span><span class="ee-chip">ERP Sync</span><span class="ee-chip">Website Tracking</span></div>
        </article>
        <article class="ee-story" data-stage="1">
          <button class="ee-node" aria-label="Go to stage 2">02</button>
          <span class="ee-tag">Front Door</span>
          <h3>24/7 AI Admission Assistance</h3>
          <p>VidyaGPT answers, qualifies and routes student queries across web and WhatsApp — round the clock, with full counsellor context.</p>
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
          <p>Behaviour-driven scoring that decides who, when and how to engage — surfacing bottlenecks before they cost you a student.</p>
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
                <div class="ee-ring"><svg width="26" height="26" viewBox="0 0 24 24" fill="#fff" aria-hidden="true"><path d="M2 3a1 1 0 011-1h2.2a1 1 0 01.98.8l.7 4.4a1 1 0 01-.54 1.06l-1.5.77a11 11 0 006.1 6.1l.77-1.5a1 1 0 011.06-.54l4.4.7a1 1 0 01.83.99V17a1 1 0 01-1 1h-2C8 18 2 12 2 5V3z"/></svg></div>
                <div class="ee-wave" aria-hidden="true"><i style="animation-delay:0s"></i><i style="animation-delay:.1s"></i><i style="animation-delay:.2s"></i><i style="animation-delay:.3s"></i><i style="animation-delay:.15s"></i><i style="animation-delay:.05s"></i><i style="animation-delay:.25s"></i></div>
                <div class="ee-calllog" id="eeCallLog">
                  <div>DIALED — 412 prospects this morning</div>
                  <div>QUALIFIED — <b>118 high-intent</b></div>
                  <div>ROUTED — 118 &#8594; 6 counsellors</div>
                  <div>HUMAN TIME SAVED — <b>34 hrs</b></div>
                </div>
              </div>
            </div>
            <div class="ee-view" data-v="3">
              <div class="ee-mono-dim">Live Intent Intelligence</div>
              <div class="ee-gaugewrap">
                <div class="ee-gauge">
                  <svg aria-hidden="true" width="150" height="150" viewBox="0 0 150 150">
                    <defs>
                      <linearGradient id="eeGrad" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f0974f"/><stop offset="1" stop-color="#DE6E30"/></linearGradient>
                      <linearGradient id="eeAreaGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#f0974f" stop-opacity=".35"/><stop offset="1" stop-color="#f0974f" stop-opacity="0"/></linearGradient>
                    </defs>
                    <circle class="bg" cx="75" cy="75" r="65" fill="none" stroke-width="10"/>
                    <circle class="fg" id="eeGaugeFg" cx="75" cy="75" r="65" fill="none" stroke-width="10"/>
                  </svg>
                  <span class="num" id="eeScore">0</span>
                </div>
                <div class="ee-gstats">
                  <div class="ee-gstat"><small>Signal</small><b style="color:var(--mint)">Hot</b></div>
                  <div class="ee-gstat"><small>Next action</small><b>Call in 11 min</b></div>
                  <div class="ee-gstat"><small>Counsellor KRA</small><b style="color:#ffd9bf">Top Performer</b></div>
                </div>
              </div>
              <svg class="ee-spark" id="eeSpark" width="100%" height="56" viewBox="0 0 420 56" preserveAspectRatio="none" aria-hidden="true">
                <path class="area" d="M0,46 C40,42 70,30 110,32 C150,34 180,18 220,20 C260,22 300,10 340,12 C370,13 400,6 420,5 L420,56 L0,56 Z"/>
                <path d="M0,46 C40,42 70,30 110,32 C150,34 180,18 220,20 C260,22 300,10 340,12 C370,13 400,6 420,5"/>
              </svg>
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
      <p class="lead">Plug ExtraaEdge into the tools your team already loves — telephony, payments, marketplaces, marketing &amp; more. No rip-and-replace.</p>
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
<style>
.wa-sec{
  --orange:#DE6E30;
  --blue:#19335D;
  --white:#FFFFFF;
  --blue-70:rgba(25,51,93,.7);
  --blue-10:rgba(25,51,93,.08);
  --blue-line:rgba(25,51,93,.14);
  --orange-10:rgba(222,110,48,.1);
  --orange-line:rgba(222,110,48,.25);
  font-family:'Inter',sans-serif;
  background:var(--white);
  color:var(--blue);
  position:relative;
  overflow:hidden;
  padding:clamp(72px,9vw,128px) 24px;
}
.wa-sec *{box-sizing:border-box;margin:0;padding:0}
.wa-sec::before{
  content:"";position:absolute;inset:0;pointer-events:none;
  background:
    radial-gradient(640px 420px at 88% 6%, rgba(222,110,48,.07), transparent 65%),
    radial-gradient(520px 380px at 2% 94%, rgba(25,51,93,.06), transparent 60%);
}
.wa-wrap{max-width:1180px;margin:0 auto;position:relative;z-index:1;
  display:grid;grid-template-columns:1.08fr .92fr;gap:clamp(40px,5vw,72px);align-items:center}
.wa-eyebrow{display:inline-flex;align-items:center;gap:10px;
  font-size:12.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;
  color:var(--orange);background:var(--white);border:1px solid var(--blue-line);
  padding:8px 16px 8px 12px;border-radius:999px;box-shadow:0 2px 8px var(--blue-10)}
.wa-eyebrow .pulse{width:8px;height:8px;border-radius:50%;background:var(--orange);position:relative}
.wa-eyebrow .pulse::after{content:"";position:absolute;inset:-4px;border-radius:50%;
  border:2px solid var(--orange);animation:waPulse 1.8s ease-out infinite}
@keyframes waPulse{0%{transform:scale(.5);opacity:1}100%{transform:scale(1.4);opacity:0}}
.wa-h2{font-weight:800;font-size:clamp(34px,4.2vw,50px);line-height:1.08;letter-spacing:-.025em;
  color:var(--blue);margin:22px 0 18px}
.wa-h2 .hl{position:relative;white-space:nowrap;color:var(--orange)}
.wa-h2 .hl svg{position:absolute;left:0;bottom:-10px;width:100%;height:12px;overflow:visible}
.wa-h2 .hl svg path{fill:none;stroke:var(--orange);stroke-width:3.5;stroke-linecap:round;
  stroke-dasharray:320;stroke-dashoffset:320;animation:waDraw 1s .5s ease forwards}
@keyframes waDraw{to{stroke-dashoffset:0}}
.wa-lead{font-size:17px;line-height:1.65;color:var(--blue-70);max-width:54ch;margin-bottom:28px}
.wa-lead b{color:var(--blue);font-weight:700}
.wa-tabs{display:flex;gap:8px;margin-bottom:20px;flex-wrap:wrap}
.wa-tab{font:600 13.5px/1 'Inter',sans-serif;cursor:pointer;
  padding:11px 18px;border-radius:999px;border:1px solid var(--blue-line);background:var(--white);
  color:var(--blue-70);transition:all .25s ease;display:flex;align-items:center;gap:7px}
.wa-tab:hover{border-color:var(--orange);color:var(--blue)}
.wa-tab.on{background:var(--blue);color:var(--white);border-color:var(--blue);
  box-shadow:0 6px 18px rgba(25,51,93,.3)}
.wa-tab .tic{font-size:15px}
.wa-panel{background:var(--white);border:1px solid var(--blue-line);border-radius:20px;
  padding:22px 24px;box-shadow:0 10px 30px var(--blue-10);min-height:128px;position:relative;overflow:hidden}
.wa-panel::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:var(--orange)}
.wa-panel h4{font-size:17px;font-weight:700;color:var(--blue);margin-bottom:8px;
  display:flex;align-items:center;gap:8px}
.wa-panel p{font-size:14.5px;line-height:1.6;color:var(--blue-70)}
.wa-panel .chips{display:flex;gap:8px;margin-top:14px;flex-wrap:wrap}
.wa-panel .chip{font-size:12px;font-weight:600;color:var(--orange);
  background:var(--orange-10);border:1px solid var(--orange-line);padding:5px 11px;border-radius:999px}
.wa-panel.swap{animation:waSwap .35s ease}
@keyframes waSwap{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
.wa-stats{display:flex;margin:28px 0 30px;background:var(--white);border:1px solid var(--blue-line);
  border-radius:18px;overflow:hidden;box-shadow:0 8px 24px var(--blue-10)}
.wa-stat{flex:1;padding:18px 20px}
.wa-stat + .wa-stat{border-left:1px solid var(--blue-line)}
.wa-stat .n{font-weight:800;font-size:clamp(24px,2.6vw,32px);color:var(--blue);
  font-variant-numeric:tabular-nums;letter-spacing:-.02em}
.wa-stat .l{font-size:11.5px;font-weight:600;letter-spacing:.07em;text-transform:uppercase;
  color:var(--blue-70);margin-top:4px}
.wa-stat .vs{font-size:11.5px;color:var(--orange);font-weight:600;margin-top:2px}
.wa-ctas{display:flex;gap:14px;align-items:center;flex-wrap:wrap}
.wa-btn{font:600 15px/1 'Inter',sans-serif;text-decoration:none;cursor:pointer;
  display:inline-flex;align-items:center;gap:10px;padding:16px 28px;border-radius:14px;transition:all .25s ease}
.wa-btn--p{background:var(--orange);color:var(--white);box-shadow:0 10px 26px rgba(222,110,48,.35)}
.wa-btn--p:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(222,110,48,.45)}
.wa-btn--p .arr{transition:transform .25s}
.wa-btn--p:hover .arr{transform:translateX(4px)}
.wa-btn--g{color:var(--blue);border:1.5px solid var(--blue-line);background:var(--white)}
.wa-btn--g:hover{border-color:var(--blue)}
.wa-btn--g .play{width:30px;height:30px;border-radius:50%;background:var(--blue-10);
  display:grid;place-items:center;font-size:11px;color:var(--blue)}
.wa-stage{position:relative;display:flex;justify-content:center}
.wa-phone{width:min(330px,100%);background:var(--blue);border-radius:38px;padding:10px;
  box-shadow:0 30px 70px rgba(25,51,93,.3),0 4px 14px rgba(25,51,93,.18);
  position:relative;z-index:2;transform:rotate(1.5deg);transition:transform .5s ease}
.wa-stage:hover .wa-phone{transform:rotate(0deg)}
.wa-screen{background:var(--white);border-radius:30px;overflow:hidden;display:flex;flex-direction:column;height:560px;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' opacity='0.05'%3E%3Cpath d='M20 20h8v8h-8zM52 12h6v6h-6zM38 50h10v10H38zM12 56h6v6h-6z' fill='%2319335D'/%3E%3C/svg%3E")}
.wa-hd{background:var(--blue);color:var(--white);padding:14px 14px 12px;display:flex;align-items:center;gap:10px}
.wa-hd .bk{font-size:20px;opacity:.85}
.wa-hd .av{width:36px;height:36px;border-radius:50%;background:var(--white);display:grid;place-items:center;
  font-weight:800;color:var(--orange);font-size:15px;flex-shrink:0}
.wa-hd .who{flex:1;min-width:0}
.wa-hd .who b{font-size:14px;display:flex;align-items:center;gap:5px}
.wa-hd .badge{width:14px;height:14px;border-radius:50%;background:var(--orange);display:inline-grid;place-items:center;flex-shrink:0}
.wa-hd .badge svg{width:8px;height:8px}
.wa-hd .who small{font-size:11px;opacity:.8;display:block;margin-top:1px}
.wa-hd .ics{font-size:14px;letter-spacing:6px;opacity:.9}
.wa-bd{flex:1;padding:14px 12px;overflow:hidden;display:flex;flex-direction:column;gap:8px;justify-content:flex-end}
.wa-msg{max-width:82%;padding:9px 12px;border-radius:12px;font-size:13px;line-height:1.45;
  box-shadow:0 1px 3px var(--blue-10);position:relative;
  opacity:0;transform:translateY(12px) scale(.97);transition:opacity .4s ease,transform .4s cubic-bezier(.2,.9,.3,1.2)}
.wa-msg.in{opacity:1;transform:none}
.wa-msg--biz{align-self:flex-start;background:var(--blue-10);color:var(--blue);border-top-left-radius:4px}
.wa-msg--usr{align-self:flex-end;background:var(--orange-10);color:var(--blue);
  border:1px solid var(--orange-line);border-top-right-radius:4px}
.wa-msg .meta{display:flex;justify-content:flex-end;gap:4px;align-items:center;margin-top:3px;
  font-size:10px;color:var(--blue-70)}
.wa-msg .ticks{color:var(--orange);font-size:11px;letter-spacing:-3px}
.wa-msg .doc{display:flex;align-items:center;gap:9px;background:var(--white);
  border:1px solid var(--blue-line);border-radius:9px;padding:9px 11px;margin-bottom:5px}
.wa-msg .doc .di{width:32px;height:32px;border-radius:8px;background:var(--orange);color:var(--white);
  display:grid;place-items:center;font-size:10px;font-weight:700;flex-shrink:0}
.wa-msg .doc b{font-size:12px;display:block;color:var(--blue)}
.wa-msg .doc small{font-size:10.5px;color:var(--blue-70)}
.wa-qrs{display:flex;flex-direction:column;gap:5px;align-self:flex-start;max-width:82%;
  opacity:0;transition:opacity .4s ease}
.wa-qrs.in{opacity:1}
.wa-qr{background:var(--white);border:1px solid var(--orange-line);color:var(--orange);font-weight:600;
  font-size:12.5px;text-align:center;padding:8px 14px;border-radius:18px;box-shadow:0 1px 3px var(--blue-10)}
.wa-typing{align-self:flex-start;background:var(--blue-10);border-radius:12px;border-top-left-radius:4px;
  padding:12px 16px;display:none;gap:4px}
.wa-typing.show{display:flex}
.wa-typing i{width:7px;height:7px;border-radius:50%;background:var(--blue-70);animation:waDot 1.2s infinite}
.wa-typing i:nth-child(2){animation-delay:.15s}
.wa-typing i:nth-child(3){animation-delay:.3s}
@keyframes waDot{0%,60%,100%{transform:translateY(0);opacity:.5}30%{transform:translateY(-5px);opacity:1}}
.wa-ft{background:var(--blue-10);padding:9px 12px;display:flex;align-items:center;gap:10px}
.wa-ft .field{flex:1;background:var(--white);border-radius:18px;padding:9px 14px;font-size:13px;color:var(--blue-70)}
.wa-ft .snd{width:38px;height:38px;border-radius:50%;background:var(--orange);display:grid;place-items:center;flex-shrink:0}
.wa-ft .snd svg{width:16px;height:16px;fill:var(--white);margin-left:2px}
.wa-float{position:absolute;background:var(--white);border:1px solid var(--blue-line);border-radius:16px;
  padding:13px 16px;box-shadow:0 14px 34px rgba(25,51,93,.16);z-index:3;
  display:flex;align-items:center;gap:11px;animation:waBob 5s ease-in-out infinite}
.wa-float .fi{width:36px;height:36px;border-radius:11px;display:grid;place-items:center;font-size:16px;flex-shrink:0}
.wa-float b{font-size:15px;font-weight:800;display:block;color:var(--blue)}
.wa-float small{font-size:11px;color:var(--blue-70)}
.wa-float--tl{top:6%;left:-6%;animation-delay:.6s}
.wa-float--tl .fi{background:var(--blue-10)}
.wa-float--br{bottom:9%;right:-7%}
.wa-float--br .fi{background:var(--orange-10)}
@keyframes waBob{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
.wa-glow{position:absolute;width:78%;height:78%;top:11%;left:11%;border-radius:50%;z-index:1;
  background:radial-gradient(circle,rgba(222,110,48,.12),transparent 70%);filter:blur(20px)}
.wa-rv{opacity:0;transform:translateY(24px);transition:opacity .7s ease,transform .7s ease}
.wa-rv.vis{opacity:1;transform:none}
.wa-rv.d1{transition-delay:.15s}
@media(max-width:920px){
  .wa-wrap{grid-template-columns:1fr;gap:56px}
  .wa-float--tl{left:0}.wa-float--br{right:0}
  .wa-stats{flex-direction:column}
  .wa-stat + .wa-stat{border-left:0;border-top:1px solid var(--blue-line)}
}
</style>

<section class="wa-sec" id="whatsapp">
  <div class="wa-wrap">

    <div class="wa-rv">
      <span class="wa-eyebrow"><span class="pulse"></span> WhatsApp Business API · Official Partner</span>

      <h2 class="wa-h2">Turn enquiries into enrolments,
        <span class="hl">right inside WhatsApp.
          <svg aria-hidden="true" viewBox="0 0 300 12" preserveAspectRatio="none"><path d="M2 9 C 60 2, 240 2, 298 8"/></svg>
        </span>
      </h2>

      <p class="wa-lead">Your prospects check WhatsApp <b>23 times a day</b> — not their inbox. Run verified, personalised conversations at scale from your Admission CRM, with every reply, click and counsellor handoff tracked automatically.</p>

      <div class="wa-tabs" role="tablist">
        <button class="wa-tab on" data-tab="0" role="tab"><span class="tic">📣</span> Broadcast</button>
        <button class="wa-tab" data-tab="1" role="tab"><span class="tic">⚡</span> Automate</button>
        <button class="wa-tab" data-tab="2" role="tab"><span class="tic">🎯</span> Convert</button>
      </div>

      <div class="wa-panel" id="waPanel">
        <h4>📣 Bulk campaigns that feel 1:1</h4>
        <p>Segment by course, stage or source and send personalised broadcasts with merge fields, media and CTA buttons — without ever risking your number.</p>
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
              <b>ExtraaEdge Admissions <span class="badge"><svg aria-hidden="true" viewBox="0 0 12 12" fill="none"><path d="M2.5 6.2l2.3 2.3 4.7-4.8" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg></span></b>
              <small>online · replies in seconds</small>
            </div>
            <span class="ics">📹 📞 ⋮</span>
          </div>
          <div class="wa-bd" id="waBody">
            <div class="wa-typing" id="waTyping"><i></i><i></i><i></i></div>
          </div>
          <div class="wa-ft">
            <div class="field">Type a message…</div>
            <span class="snd"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg></span>
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
    {h:'📣 Bulk campaigns that feel 1:1',p:'Segment by course, stage or source and send personalised broadcasts with merge fields, media and CTA buttons — without ever risking your number.',c:['Smart segments','Template library','Scheduled sends']},
    {h:'⚡ Journeys that run themselves',p:'Auto-trigger fee reminders, document nudges and counselling follow-ups based on lead stage. Hand off to a human the moment intent spikes.',c:['Drip sequences','Smart handoff','24×7 chatbot']},
    {h:'🎯 Every chat tied to revenue',p:'Replies, clicks and applications sync to the lead record instantly — so you know exactly which message moved which student to enrol.',c:['CRM auto-sync','Attribution reports','Counsellor inbox']}
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
      {who:'biz',html:'Hi <b>Riya</b> 👋 Applications for <b>B.Tech CSE 2026</b> close in 5 days. Your profile is a strong fit — shall I reserve your slot?'},
      {who:'usr',html:'Yes! What documents do I need?'},
      {who:'biz',html:'<div class="doc"><div class="di">PDF</div><div><b>Admission_Checklist.pdf</b><small>2 pages · 240 KB</small></div></div>Here you go! Just 3 documents. Want me to book a counselling call too?'},
      {who:'qr',opts:['📅 Book a call','📝 Apply now','💬 Talk to counsellor']},
      {who:'usr',html:'📝 Apply now'},
      {who:'biz',html:'Perfect 🎉 Your application link: <b>extraaedge.in/apply/riya</b> — I\'ve pre-filled your details. Takes 4 minutes!'}
    ],
    [
      {who:'biz',html:'⏰ Reminder: your <b>fee payment</b> for Semester 1 is due tomorrow. Pay securely here 👇'},
      {who:'qr',opts:['💳 Pay now','📄 View invoice','🗓️ Request extension']},
      {who:'usr',html:'💳 Pay now'},
      {who:'biz',html:'Payment of <b>₹45,000</b> received ✅ Receipt sent to your email. Your seat is confirmed, Riya! 🎓'},
      {who:'biz',html:'Next step: orientation on <b>July 14</b>. I\'ll send the joining kit a week before — no action needed.'}
    ],
    [
      {who:'usr',html:'Hi, I filled the enquiry form on your website'},
      {who:'biz',html:'Welcome Riya! I can see you\'re interested in <b>MBA — Marketing</b>. You\'re eligible for our <b>merit scholarship</b> (up to 40%). Want the details?'},
      {who:'usr',html:'Yes please! 🙌'},
      {who:'biz',html:'Connecting you to <b>Priya from Admissions</b> — she\'s helped 200+ students get this scholarship. She\'ll message you in under a minute ⏱️'},
      {who:'biz',html:'Hi Riya, Priya here 👋 I\'ve reviewed your profile — let\'s get your scholarship application in today. Free for a quick call at 4 PM?'}
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
<section class="sec sec--soft" id="faq">
  <div class="container">
    <div class="head rv">
      <span class="eyebrow"><span class="dot"></span> Frequently Asked</span>
      <h2 class="h2">Everything you need to know about <span class="grad-o">ExtraaEdge.</span></h2>
    </div>
    <div class="faq rv">
      <div class="qa"><button aria-expanded="false"><span>What is ExtraaEdge?</span><span class="ic">+</span></button><div class="qa__a"><p>ExtraaEdge is an AI-powered Admission CRM purpose-built for educational institutions — schools, colleges, universities and edtech companies. It automates lead capture, scores intent, triggers smart follow-ups and gives counsellors real-time performance intelligence.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How does ExtraaEdge help convert more students?</span><span class="ic">+</span></button><div class="qa__a"><p>ExtraaEdge prioritises high-intent leads with AI scoring, responds to every enquiry in minutes with AI calling and WhatsApp automation, and tells counsellors exactly who to follow up with next — reducing response time by up to 90% and boosting conversions by up to 48%.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Does ExtraaEdge offer a free demo?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. You can book a free personalised 45-minute demo. A product expert will walk you through the platform live with data relevant to your sector.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Is ExtraaEdge suitable for small colleges?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge serves institutions from single-campus colleges to large university groups processing 100,000+ applications per cycle. Pricing and features scale to your needs.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>What AI features does ExtraaEdge offer?</span><span class="ic">+</span></button><div class="qa__a"><p>AI Lead Intent Scoring, AI Calling at scale via VidyaAI, Smart Follow-up Automation, WhatsApp Business API engagement and Counsellor Performance Intelligence — all powered by ExtraaEdge's proprietary Admission Intelligence engine.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Will ExtraaEdge work with my existing ads and website?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge captures leads automatically from Meta &amp; Google Ads, your website and landing pages, education portals (Shiksha, Collegedunia), WhatsApp, IVR and more — so every enquiry lands in one place with full source tracking. It also connects to your ERP/SIS, payment gateway and telephony.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How long does it take to go live?</span><span class="ic">+</span></button><div class="qa__a"><p>Most institutions go live in around 14 days. That includes data migration, integrations (ads, website, WhatsApp, telephony), workflow set-up and counsellor training — with a dedicated onboarding specialist and Customer Success Manager.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Does VidyaGPT support regional languages?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. VidyaGPT understands and responds in 95+ languages including Hindi, Marathi, Tamil, Telugu, Kannada, Bengali, Gujarati and more — over chat and on AI voice calls — so you can engage every student in their preferred language.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Is my data secure with ExtraaEdge?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails — enterprise-grade protection for your institution and applicants.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>How does pricing work?</span><span class="ic">+</span></button><div class="qa__a"><p>ExtraaEdge uses simple, transparent product-based pricing — not module-based pricing that adds cost every time you scale. Your demo includes a tailored quote based on your enquiry volume and the modules you need, with no hidden third-party charges.</p></div></div>
      <div class="qa"><button aria-expanded="false"><span>Can I migrate from my existing CRM (e.g. Meritto, LeadSquared, Zoho or spreadsheets)?</span><span class="ic">+</span></button><div class="qa__a"><p>Yes. Our team handles full data migration from your existing CRM or spreadsheets — leads, history, sources and stages — as part of onboarding, so you go live without losing any data.</p></div></div>
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
        <p class="s">Book a free 45-minute demo. We'll map ExtraaEdge to your exact admission funnel — and show the conversion lift live with data from your sector.</p>
        <ul class="dchecks">
          <li><span class="ck">✓</span><div><b>A live walk-through of VidyaAI</b> — lead scoring, AI calling, WhatsApp &amp; follow-up automation working on your use case.</div></li>
          <li><span class="ck">✓</span><div><b>Your personalised ROI model</b> — exactly how many extra admissions you can expect this cycle.</div></li>
          <li><span class="ck">✓</span><div><b>A 14-day go-live plan</b> — migration, integrations and counsellor onboarding mapped out.</div></li>
          <li><span class="ck">✓</span><div><b>No obligation, no credit card</b> — just answers and a clear path to more enrolments.</div></li>
        </ul>
        <div class="dbadges">
          <img decoding="async" class="dbadge-img" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/iso%20certified%20logo.png" alt="ISO 27001 Certified" loading="lazy">
          <img decoding="async" class="dbadge-img" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/GDPR%20logo%20.png" alt="GDPR Compliant" loading="lazy">
          <img decoding="async" class="dbadge-img" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/india-data-residency-logo.png" alt="India Data Residency" loading="lazy">
          <img decoding="async" class="dbadge-img" src="https://www.extraaedge.com/wp-content/uploads/integration-icons/role-based-acccess-logo.png" alt="Role-Based Access" loading="lazy">
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
        <p class="demo-trust">🔒 Your data is safe — ISO 27001 &amp; GDPR compliant. No spam, ever.</p>
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

/* (hero typewriter removed — now handled by the scoped #xhero hero script) */

/* counters */
function animate(el){var t=parseFloat(el.dataset.count),pre=el.dataset.prefix||'',suf=el.dataset.suffix||'';var dec=t%1!==0,cur=0,steps=46,inc=t/steps;var id=setInterval(function(){cur+=inc;if(cur>=t){cur=t;clearInterval(id);}el.textContent=pre+(dec?cur.toFixed(1):Math.round(cur).toLocaleString())+suf;},26);}
var cObs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){animate(e.target);cObs.unobserve(e.target);}});},{threshold:.6});
document.querySelectorAll('[data-count]').forEach(function(el){cObs.observe(el);});

/* (hero live flow removed — replaced by the scoped #xhero VidyaAI console simulation) */

/* marquee is now a static centered grid — logos shown once, no duplication/scroll */

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
      var g=ctx.createLinearGradient(0,0,w,0);g.addColorStop(0,'#DE6E30');g.addColorStop(1,'#19335D');
      ctx.beginPath();data.forEach(function(v,i){var x=i/(data.length-1)*w,y=h-(v/100)*h;i?ctx.lineTo(x,y):ctx.moveTo(x,y);});
      ctx.strokeStyle=g;ctx.lineWidth=2;ctx.stroke();ctx.lineTo(w,h);ctx.lineTo(0,h);ctx.closePath();
      var f=ctx.createLinearGradient(0,0,0,h);f.addColorStop(0,'rgba(222,110,48,.22)');f.addColorStop(1,'rgba(222,110,48,0)');ctx.fillStyle=f;ctx.fill();
      if(!RM)requestAnimationFrame(draw);})();
  }
  /* morphing KPI views */
  var views=[{t:'· TODAY',conv:'+12%',rt:'58s',clo:'9.2x'},{t:'· THIS WEEK',conv:'+19%',rt:'1.1m',clo:'7.8x'},{t:'· THIS CYCLE',conv:'+48%',rt:'1.4m',clo:'9.2x'}];
  var v=0,tag=document.getElementById('viewTag'),kc=document.getElementById('kConv'),kr=document.getElementById('kRt'),kl=document.getElementById('kClo');
  setInterval(function(){v=(v+1)%views.length;var d=views[v];tag.textContent=d.t;kc.textContent=d.conv;kr.textContent=d.rt;kl.textContent=d.clo;},2600);
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
  var B='https://www.extraaedge.com/wp-content/uploads/integration-icons/';
  var C=[
   {e:'📞',t:'Cloud Telephony',d:'Run your entire calling stack — IVR, click-to-call & recording — natively inside ExtraaEdge.',g:[['3CX.png','3CX'],['Ameyo.png','Ameyo'],['Exotel.png','Exotel'],['Knowlarity.png','Knowlarity'],['MCUBE.png','MCUBE'],['MyOperator.png','MyOperator'],['Ozonetel.png','Ozonetel'],['Servetel.png','Servetel'],['Smartflo.png','Smartflo'],['TeleCMI.png','TeleCMI'],['C-Zentrix.png','C-Zentrix'],['Voxbay.png','Voxbay']]},
   {e:'🎯',t:'Lead Sources & Marketplaces',d:'Pull verified enquiries from India’s largest education marketplaces in real time.',g:[['CollegeDekho.png','CollegeDekho'],['CollegeDunia%20Learn.png','CollegeDunia'],['Jagran%20Josh.png','Jagran Josh'],['Justdial.png','Justdial'],['Shiksha.png','Shiksha'],['Sulekha.png','Sulekha']]},
   {e:'📢',t:'Advertising & Remarketing',d:'Sync audiences and conversions back to your ad platforms — close the loop on every rupee.',g:[['Google%20Ads.png','Google Ads'],['Google%20Remarketing.png','Google Remarketing'],['Facebook%20Ads.png','Facebook Ads'],['Facebook%20Remarketing.png','Facebook Remarketing'],['Instagram.png','Instagram'],['LinkedIn%20Ads.png','LinkedIn Ads']]},
   {e:'💳',t:'Payments & Banking',d:'PCI-compliant gateways and banking partners for secure, frictionless fee collection.',g:[['Razorpay.png','Razorpay'],['Paytm.png','Paytm'],['Stripe.png','Stripe'],['Easebuzz_alt.png','Easebuzz'],['HDFC%20Bank.png','HDFC Bank'],['ADIB.png','ADIB'],['Mastercard.png','Mastercard']]},
   {e:'🌐',t:'Forms & Website Builders',d:'Native connectors for the form and CMS tools you already use — no website lead slips through.',g:[['WordPress.png','WordPress'],['Elementor_alt.png','Elementor'],['Wix.png','Wix'],['Contact%20Form%207.png','Contact Form 7'],['Typeform_alt.png','Typeform'],['Zoho%20Forms.png','Zoho Forms'],['Unlayer.png','Unlayer']]},
   {e:'🧠',t:'Sales Intelligence',d:'Conversation intelligence that turns every counsellor call into coachable insight.',g:[['Salesken.png','Salesken'],['Salesquared.png','Salesquared']]},
   {e:'🎓',t:'Learning & Assessment',d:'Plug into LMS and assessment platforms for one unified journey from admission to classroom.',g:[['CollPoll.png','CollPoll'],['Learnyst.png','Learnyst'],['Populi.png','Populi'],['Wheebox.png','Wheebox']]},
   {e:'⚡',t:'Automation & Productivity',d:'Trigger workflows, send transactional emails and connect 1000+ apps — no code needed.',g:[['Zapier.png','Zapier'],['SendGrid.png','SendGrid']]}
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
  var started=false;
  var o=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting&&!started){started=true;if(!RM)timer=setInterval(function(){if(!hovered)sel((cur+1)%C.length);},3500);o.disconnect();}});},{threshold:.2});
  o.observe(ig);
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

/* ============ Demo form — functional lead capture via WhatsApp ============ */
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
    ok.innerHTML='🎉 Thanks '+esc(name.split(' ')[0]||'')+'! Your request is in — our admissions expert will reach out within the hour.'+
      '<br><a href="'+link+'" target="_blank" rel="noopener" class="btn btn-dark" style="margin-top:14px">Confirm instantly on WhatsApp →</a>';
    f.style.display='none';ok.style.display='block';
    ok.scrollIntoView({behavior:'smooth',block:'center'});
  });
})();



/* ============ WebGL hero (raw shader, graceful fallback) ============ */
(function(){
  var cv=document.getElementById('glsl');if(!cv)return;var gl=cv.getContext('webgl');if(!gl){cv.style.display='none';return;}
  function rs(){cv.width=cv.clientWidth;cv.height=cv.clientHeight;gl.viewport(0,0,cv.width,cv.height);}
  var vs='attribute vec2 p;void main(){gl_Position=vec4(p,0.,1.);}';
  var fs='precision highp float;uniform vec2 r;uniform float t;'+
    'float h(vec2 p){return fract(sin(dot(p,vec2(127.1,311.7)))*43758.5453);}'+
    'float n(vec2 p){vec2 i=floor(p),f=fract(p);f=f*f*(3.-2.*f);return mix(mix(h(i),h(i+vec2(1,0)),f.x),mix(h(i+vec2(0,1)),h(i+vec2(1,1)),f.x),f.y);}'+
    'float fbm(vec2 p){float v=0.,a=.5;for(int i=0;i<5;i++){v+=a*n(p);p*=2.02;a*=.5;}return v;}'+
    'void main(){vec2 uv=gl_FragCoord.xy/r.xy;vec2 q=uv*2.4;float f=fbm(q+vec2(t*.05,t*.04)+fbm(q-t*.03));'+
    'vec3 orange=vec3(0.871,0.431,0.188);vec3 blue=vec3(0.098,0.200,0.365);vec3 white=vec3(1.0);'+
    'vec3 col=mix(white,mix(orange,blue,smoothstep(.2,.8,uv.x+f*.3)),pow(f,1.3)*.55);'+
    'col=mix(white,col,smoothstep(.0,.9,f)*.5);gl_FragColor=vec4(col,1.0);}';
  function sh(ty,s){var o=gl.createShader(ty);gl.shaderSource(o,s);gl.compileShader(o);return o;}
  var pr=gl.createProgram();gl.attachShader(pr,sh(gl.VERTEX_SHADER,vs));gl.attachShader(pr,sh(gl.FRAGMENT_SHADER,fs));gl.linkProgram(pr);gl.useProgram(pr);
  var buf=gl.createBuffer();gl.bindBuffer(gl.ARRAY_BUFFER,buf);gl.bufferData(gl.ARRAY_BUFFER,new Float32Array([-1,-1,3,-1,-1,3]),gl.STATIC_DRAW);
  var loc=gl.getAttribLocation(pr,'p');gl.enableVertexAttribArray(loc);gl.vertexAttribPointer(loc,2,gl.FLOAT,false,0,0);
  var uR=gl.getUniformLocation(pr,'r'),uT=gl.getUniformLocation(pr,'t');rs();addEventListener('resize',rs);var start=performance.now();
  (function frame(){gl.uniform2f(uR,cv.width,cv.height);gl.uniform1f(uT,(performance.now()-start)/1000);gl.drawArrays(gl.TRIANGLES,0,3);if(!RM)requestAnimationFrame(frame);})();
})();
</script>

<style id="ee-responsive-100">
/* ============================================================
   DEVICE-FRIENDLY SAFETY LAYER — 100% readable on all screens.
   Appended last so it wins the cascade over every section style.
   Scoped to .ee-home so the theme header/footer stay untouched.
   Improves readability + removes horizontal overflow on phones &
   tablets without rewriting each section's bespoke design.
   ============================================================ */

/* Contain everything: no sideways scroll, media never overflows. */
.ee-home{overflow-x:clip}
.ee-home img,.ee-home svg,.ee-home video,.ee-home iframe,.ee-home canvas{max-width:100%}
/* Long words / URLs wrap instead of forcing the page wider. */
.ee-home h1,.ee-home h2,.ee-home h3,.ee-home h4,.ee-home p,.ee-home a,.ee-home li,.ee-home span,.ee-home td{overflow-wrap:break-word;word-break:break-word}
/* Stop iOS inflating text on rotate. */
html{-webkit-text-size-adjust:100%;text-size-adjust:100%}
/* Anchor jumps land below the sticky header, not hidden under it. */
.ee-home :target{scroll-margin-top:88px}

/* ---------- Tablet (≤900px) ---------- */
@media (max-width:900px){
  .ee-home .container{padding-left:20px;padding-right:20px}
}

/* ---------- Phone (≤640px): cap headings, comfy text & taps ---------- */
@media (max-width:640px){
  .ee-home h1{font-size:clamp(28px,8.4vw,40px)!important;line-height:1.14!important;letter-spacing:-.02em!important}
  .ee-home h2{font-size:clamp(23px,6.6vw,32px)!important;line-height:1.18!important;letter-spacing:-.01em!important}
  .ee-home h3{font-size:clamp(18px,5vw,22px)!important;line-height:1.25!important}
  .ee-home .lead{font-size:clamp(15.5px,4.3vw,17.5px)!important;line-height:1.6!important}
  .ee-home .container,.ee-home #xhero .container{padding-left:18px!important;padding-right:18px!important}
  /* Comfortable, finger-friendly buttons */
  .ee-home .btn{padding:13px 20px!important;font-size:15px!important;min-height:46px}
}

/* ---------- Small phone (≤400px) ---------- */
@media (max-width:400px){
  .ee-home h1{font-size:clamp(25px,8.6vw,33px)!important}
  .ee-home h2{font-size:clamp(21px,7vw,27px)!important}
  .ee-home .container,.ee-home #xhero .container{padding-left:15px!important;padding-right:15px!important}
  /* Full-width stacked buttons are easier to tap on tiny screens */
  .ee-home .btn{width:100%;justify-content:center}
}

/* ============================================================
   MOBILE: flatten the tall scroll-story sections so they stop
   leaving huge empty vh gaps, and tighten every section to a
   ~10px top/bottom rhythm so sections read as distinct blocks.
   ============================================================ */
@media (max-width:768px){
  /* —— VidyaAI · Admission Intelligence (#vidya) ——
     The desktop scroll-scrubbing uses 74-92vh-tall triggers per step,
     which read as enormous white gaps on a phone. Collapse to a compact
     stacked layout with every step + its visual fully visible (mirrors the
     theme's own no-JS fallback). */
  #vidya .vx-stage{position:static!important;height:auto!important;padding:6px 0!important}
  #vidya .vx-view{position:static!important;opacity:1!important;visibility:visible!important;height:auto!important}
  #vidya .vx-body{height:auto!important;min-height:0!important}
  #vidya .vx-trigger,
  #vidya .vx-trigger:first-child,
  #vidya .vx-trigger:last-child{min-height:0!important;padding:8px 0!important}
  #vidya .vx-step{opacity:1!important;transform:none!important;filter:none!important;margin-bottom:10px}
  #vidya .stg{opacity:1!important;transform:none!important}
  #vidya .vx-rail,#vidya .vx-hint,#vidya .vx-dots,#vidya .vx-progress,.vx-progress{display:none!important}

  /* —— "From first click to enrolment — four moves" (#respond-first) ——
     Each of the four "moves" had 48px top+bottom padding on mobile; tighten
     so the steps sit close together without big empty bands. */
  #respond-first .rf-story,
  #respond-first .rf-story:first-child{padding-top:12px!important;padding-bottom:12px!important}
  #respond-first .rf-sticky{padding-bottom:8px!important}

  /* —— Admission Ecosystem (#ecosystem) + every section ——
     Uniform 10px top/bottom on the section wrappers so no two sections
     blur together and none carries a tall empty gap on mobile. */
  .ee-home > section{padding-top:10px!important;padding-bottom:10px!important}
  .ee-home .ee-wrap,
  .ee-home .rf-wrap,
  .ee-home .ea-wrap,
  .ee-home .vx-head,
  .ee-home .vx-proof{padding-top:10px!important;padding-bottom:10px!important}
  /* Tighten the gap under each section's heading/intro on mobile. */
  .ee-home .intro,.ee-home .ee-head,.ee-home .sg-head,.ee-home .ci-head{margin-bottom:14px!important}
}

/* ============================================================
   PERFORMANCE — Core Web Vitals (LCP + CLS)
   ============================================================ */
/* LCP: the hero <h1> is the page's largest element. It was held at
   opacity:0 for ~0.9s by an entrance animation, so it painted late and
   pushed LCP to ~6s. Show the above-the-fold hero immediately. */
#xhero .reveal,
#xhero .reveal.d1,#xhero .reveal.d2,#xhero .reveal.d3,#xhero .reveal.d4,
#xhero .step,#xhero .act{opacity:1!important;transform:none!important;animation:none!important}

/* CLS: images always keep their natural aspect (never distort) and the
   logo/card boxes already reserve space, so media stops shifting layout. */
.ee-home img{height:auto}
</style>
<?php get_footer(); ?>
