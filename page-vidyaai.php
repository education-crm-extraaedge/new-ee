<?php
/**
 * Page Template — auto-loaded for any WordPress Page whose slug is "vidyaai"
 * URL: /vidyaai/
 *
 * Setup (non-coder):
 *   1. WP Admin → Pages → Add New
 *   2. Title: VidyaAI   (permalink/slug must be "vidyaai")
 *   3. Publish — WordPress auto-uses this template. Live at /vidyaai/
 *
 * VidyaAI landing page (standalone, self-contained: own <head>, fonts, SEO,
 * nav, sections, footer — intentionally does NOT use get_header/get_footer).
 * Also deployable as the getvidya.ai home (where the live URL is just "/").
 * Design system:
 *   Navy #19335D / #1E3A8A · Teal/Cyan #06B6D4 · Off-white #F8FAFC ·
 *   Brand navy #19335D · Inter (headings + body).
 */
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
<title>VidyaAI — The 24/7 AI Admission Agent | VidyaGPT, AI Calling & Intent Scoring</title>
<meta name="description" content="VidyaAI is the 24/7 AI admission agent that answers, qualifies and follows up with every student across WhatsApp, web and phone — in 95+ languages. VidyaGPT chat, AI voice calling and intent scoring that hand counsellors only hot, ready-to-enrol leads. Book a demo." />
<meta name="keywords" content="VidyaAI, VidyaGPT, AI admission agent, AI calling admissions, admission chatbot, AI lead scoring, WhatsApp admission automation, education AI agent" />
<meta name="robots" content="index, follow, max-image-preview:large" />
<link rel="canonical" href="https://getvidya.ai/" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="VidyaAI" />
<meta property="og:title" content="VidyaAI — The 24/7 AI Admission Agent" />
<meta property="og:description" content="AI that answers, qualifies and follows up with every student 24/7 — VidyaGPT chat, AI voice calling & intent scoring. Counsellors get only hot leads." />
<meta property="og:url" content="https://getvidya.ai/" />
<meta name="twitter:card" content="summary_large_image" />

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"VidyaAI","applicationCategory":"BusinessApplication","operatingSystem":"Web, WhatsApp, Phone","description":"24/7 AI admission agent — VidyaGPT chat, AI voice calling and intent scoring for educational institutions.","offers":{"@type":"Offer","price":"0","priceCurrency":"INR","description":"Free demo"},"provider":{"@type":"Organization","name":"ExtraaEdge Technology Solutions Pvt. Ltd","url":"https://www.extraaedge.com/"}}
</script>

<style>
/* ===================== VidyaAI design system ===================== */
:root{
  --navy:#19335D; --navy-2:#1E3A8A; --navy-deep:#122548;
  --teal:#06B6D4; --teal-2:#22D3EE; --teal-soft:#CFFAFE;
  --bg:#F8FAFC; --slate:#0F172A; --slate-2:#1E293B; --slate-3:#334155;
  --ink:#0F172A; --muted:#64748B; --line:#E2E8F0; --white:#fff;
  --radius:18px; --radius-lg:24px; --maxw:1200px;
  --shadow:0 18px 50px rgba(15,23,42,.10); --shadow-sm:0 6px 20px rgba(15,23,42,.07);
  --shadow-teal:0 14px 36px rgba(6,182,212,.30);
  --font-h:'Inter',system-ui,sans-serif; --font-b:'Inter',system-ui,sans-serif;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{font-family:var(--font-b);background:var(--bg);color:var(--ink);line-height:1.6;-webkit-font-smoothing:antialiased;overflow-x:clip}
h1,h2,h3,h4{font-family:var(--font-h);line-height:1.12;letter-spacing:-.02em;font-weight:800}
img,svg{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
.wrap{max-width:var(--maxw);margin:0 auto;padding:0 24px}
.eyebrow{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:12.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);font-family:var(--font-h)}
.muted{color:var(--muted)}
.tealtxt{color:var(--teal)}
section{position:relative;padding:64px 0}
.sec-head{max-width:720px;margin:0 auto 44px;text-align:center}
.sec-head h2{font-size:clamp(28px,4.4vw,46px);color:var(--navy);margin:12px 0}
.sec-head p{font-size:clamp(16px,1.8vw,18px);color:var(--muted)}

/* buttons */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;padding:14px 26px;border-radius:13px;font-weight:700;font-size:15px;font-family:var(--font-h);cursor:pointer;border:2px solid transparent;transition:transform .18s,box-shadow .25s,background .2s}
.btn-primary{background:var(--teal);color:#04222a;box-shadow:var(--shadow-teal)}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 18px 44px rgba(6,182,212,.42)}
.btn-navy{background:var(--navy);color:#fff}
.btn-navy:hover{transform:translateY(-3px)}
.btn-ghost{background:transparent;color:var(--navy);border-color:var(--line)}
.btn-ghost:hover{border-color:var(--teal);color:var(--teal)}
.btn-ghost-light{background:rgba(255,255,255,.06);color:#fff;border-color:rgba(255,255,255,.22)}
.btn-ghost-light:hover{border-color:var(--teal);color:var(--teal-2)}

/* ===================== NAV ===================== */
#nav{position:sticky;top:0;z-index:100;background:rgba(248,250,252,.85);backdrop-filter:saturate(160%) blur(12px);border-bottom:1px solid var(--line)}
#nav .wrap{display:flex;align-items:center;justify-content:space-between;height:70px;gap:18px}
.logo{display:flex;align-items:center;gap:10px;font-family:var(--font-h);font-weight:800;font-size:20px;color:var(--navy)}
.logo .mark{width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,var(--teal),var(--navy-2));display:grid;place-items:center;color:#fff;font-weight:800;box-shadow:var(--shadow-teal)}
.logo b{color:var(--teal)}
.nav-links{display:flex;align-items:center;gap:28px}
.nav-links a{font-weight:600;font-size:14.5px;color:var(--slate-3);transition:color .2s}
.nav-links a:hover{color:var(--teal)}
.nav-cta{display:flex;align-items:center;gap:12px}
.nav-burger{display:none;background:none;border:0;cursor:pointer;font-size:24px;color:var(--navy)}
@media(max-width:900px){.nav-links{display:none}.nav-burger{display:block}.nav-cta .btn-ghost{display:none}}

/* ===================== HERO ===================== */
#hero{padding:72px 0 56px;background:
  radial-gradient(900px 500px at 80% -10%, rgba(6,182,212,.12), transparent 60%),
  radial-gradient(700px 500px at -10% 20%, rgba(30,58,138,.08), transparent 55%),
  var(--bg);overflow:hidden}
.hero-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:48px;align-items:center}
.hero-pill{display:inline-flex;align-items:center;gap:9px;background:#fff;border:1px solid var(--line);border-radius:999px;padding:7px 14px;font-size:13px;font-weight:600;color:var(--navy);box-shadow:var(--shadow-sm);margin-bottom:20px}
.hero-pill .dot{width:8px;height:8px;border-radius:50%;background:var(--teal);box-shadow:0 0 0 4px rgba(6,182,212,.2);animation:pulse 2s infinite}
@keyframes pulse{50%{box-shadow:0 0 0 8px rgba(6,182,212,0)}}
#hero h1{font-size:clamp(36px,5.4vw,62px);color:var(--navy)}
#hero h1 .g{background:linear-gradient(100deg,var(--teal),var(--navy-2));-webkit-background-clip:text;background-clip:text;color:transparent}
.hero-sub{font-size:clamp(16px,1.9vw,19px);color:var(--slate-3);max-width:560px;margin:20px 0 28px}
.hero-cta{display:flex;flex-wrap:wrap;gap:14px;align-items:center}
.hero-note{font-size:13px;color:var(--muted);margin-top:16px}
.hero-stats{display:flex;flex-wrap:wrap;gap:28px;margin-top:34px;padding-top:26px;border-top:1px solid var(--line)}
.hero-stats .s b{display:block;font-family:var(--font-h);font-weight:800;font-size:26px;color:var(--navy)}
.hero-stats .s span{font-size:12.5px;color:var(--muted)}

/* hero chat device (dark slate) */
.hero-visual{position:relative}
.chat-card{background:var(--slate);border-radius:var(--radius-lg);padding:18px;box-shadow:0 30px 70px rgba(15,23,42,.30);border:1px solid #1e293b;color:#e2e8f0}
.chat-top{display:flex;align-items:center;gap:11px;padding:6px 6px 14px;border-bottom:1px solid #1e293b}
.chat-av{width:40px;height:40px;border-radius:11px;background:linear-gradient(135deg,var(--teal),var(--navy-2));display:grid;place-items:center;font-weight:800;color:#fff}
.chat-top .nm{font-family:var(--font-h);font-weight:700;font-size:14.5px;color:#fff}
.chat-top .st{font-size:11.5px;color:var(--teal-2);display:flex;align-items:center;gap:6px}
.chat-top .st i{width:7px;height:7px;border-radius:50%;background:#22c55e;display:inline-block}
.chat-body{padding:16px 4px 4px;display:flex;flex-direction:column;gap:12px;min-height:300px}
.bub{max-width:82%;padding:11px 14px;border-radius:14px;font-size:13.5px;line-height:1.5;opacity:0;transform:translateY(8px);animation:bubIn .5s forwards}
.bub.user{align-self:flex-end;background:#1e293b;border-bottom-right-radius:5px}
.bub.ai{align-self:flex-start;background:linear-gradient(135deg,var(--teal),#0891b2);color:#04222a;border-bottom-left-radius:5px;font-weight:500}
.bub.b2{animation-delay:.5s}.bub.b3{animation-delay:1.1s}.bub.b4{animation-delay:1.7s}
@keyframes bubIn{to{opacity:1;transform:none}}
.chat-tag{align-self:center;font-size:10.5px;letter-spacing:.1em;text-transform:uppercase;color:#22D3EE;background:rgba(6,182,212,.12);border:1px solid rgba(6,182,212,.3);padding:4px 11px;border-radius:999px;opacity:0;animation:bubIn .5s 2.2s forwards}
.float-badge{position:absolute;background:#fff;border:1px solid var(--line);border-radius:14px;padding:10px 14px;box-shadow:var(--shadow);font-size:12.5px;font-weight:700;color:var(--navy);display:flex;align-items:center;gap:9px}
.float-badge .ic{width:30px;height:30px;border-radius:9px;background:var(--teal-soft);color:#0891b2;display:grid;place-items:center}
.fb1{top:-18px;left:-22px;animation:floaty 4s ease-in-out infinite}
.fb2{bottom:24px;right:-26px;animation:floaty 4.5s ease-in-out infinite .6s}
@keyframes floaty{50%{transform:translateY(-10px)}}
@media(max-width:900px){.hero-grid{grid-template-columns:1fr;gap:40px}.fb1,.fb2{display:none}}

@media(prefers-reduced-motion:reduce){*{animation:none!important}.bub,.chat-tag{opacity:1;transform:none}}
</style>
</head>
<body>

<!-- ===================== NAV ===================== -->
<header id="nav">
  <div class="wrap">
    <a href="/" class="logo"><span class="mark">V</span>Vidya<b>AI</b></a>
    <nav class="nav-links">
      <a href="#vidyagpt">VidyaGPT</a>
      <a href="#calling">AI Calling</a>
      <a href="#scoring">Intent Scoring</a>
      <a href="#how">How it works</a>
      <a href="#integrations">Integrations</a>
    </nav>
    <div class="nav-cta">
      <a href="https://www.extraaedge.com/" class="btn btn-ghost">ExtraaEdge CRM</a>
      <a href="#demo" class="btn btn-primary">Book a Demo</a>
      <button class="nav-burger" aria-label="Menu" onclick="document.getElementById('mnav').classList.toggle('open')">&#9776;</button>
    </div>
  </div>
  <div id="mnav" style="display:none"></div>
</header>

<!-- ===================== HERO ===================== -->
<section id="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="hero-pill"><span class="dot"></span> Powered by ExtraaEdge · Trusted by 500+ institutions</span>
      <h1>The <span class="g">24/7 AI agent</span> that turns every enquiry into an enrolment.</h1>
      <p class="hero-sub">VidyaAI answers, qualifies and follows up with every student across WhatsApp, web and phone — in 95+ languages — and hands your counsellors only hot, ready-to-enrol leads.</p>
      <div class="hero-cta">
        <a href="#demo" class="btn btn-primary">Book a Free Demo <span>&rarr;</span></a>
        <a href="#vidyagpt" class="btn btn-ghost"><span>&#9654;</span> See VidyaAI live</a>
      </div>
      <p class="hero-note">No credit card · Personalised to your institution</p>
      <div class="hero-stats">
        <div class="s"><b>95+</b><span>Languages</span></div>
        <div class="s"><b>&lt;60s</b><span>First response</span></div>
        <div class="s"><b>24/7</b><span>Always on</span></div>
        <div class="s"><b>10M+</b><span>Enquiries handled</span></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="float-badge fb1"><span class="ic">&#9889;</span> Replies in 4s</div>
      <div class="float-badge fb2"><span class="ic">&#127919;</span> Intent 92/100</div>
      <div class="chat-card">
        <div class="chat-top">
          <div class="chat-av">V</div>
          <div><div class="nm">VidyaAI · Admission Agent</div><div class="st"><i></i> Online · replies in seconds</div></div>
        </div>
        <div class="chat-body">
          <div class="bub user">Hi! I want to apply for B.Tech CSE but I think I missed the deadline 😟</div>
          <div class="bub ai b2">Good news — late applications close this Friday! 🎉 I've reserved your slot and sent the form to your WhatsApp.</div>
          <div class="bub user b3">Oh great! What documents do I need?</div>
          <div class="bub ai b4">Just 3: marksheet, ID proof &amp; photo. Want me to book a counsellor call for tomorrow 11 AM?</div>
          <div class="chat-tag">✓ Qualified · scored 92/100 · routed to counsellor</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== TRUST BAR ===================== -->
<style>
#trust{padding:30px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:#fff}
#trust .wrap{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;gap:14px 38px}
#trust .lbl{font-size:12.5px;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);font-weight:700}
#trust .chip{display:flex;align-items:center;gap:8px;font-weight:700;color:var(--navy);font-size:14px}
#trust .chip .ic{color:var(--teal)}
</style>
<section id="trust">
  <div class="wrap">
    <span class="lbl">Built into the ExtraaEdge admission stack · trusted across</span>
    <span class="chip"><span class="ic">&#127891;</span> 500+ Institutions</span>
    <span class="chip"><span class="ic">&#127757;</span> 12+ Countries</span>
    <span class="chip"><span class="ic">&#11088;</span> 4.7/5 on G2</span>
    <span class="chip"><span class="ic">&#128274;</span> ISO 27001 · GDPR</span>
  </div>
</section>

<!-- ===================== PROBLEM ===================== -->
<style>
#problem{background:linear-gradient(180deg,#fff,var(--bg))}
.prob-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;margin-top:8px}
.prob-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:26px;box-shadow:var(--shadow-sm)}
.prob-card .big{font-family:var(--font-h);font-weight:800;font-size:40px;color:var(--navy);line-height:1}
.prob-card .big em{font-style:normal;color:var(--teal)}
.prob-card p{margin-top:10px;color:var(--muted);font-size:14.5px}
@media(max-width:760px){.prob-grid{grid-template-columns:1fr}}
</style>
<section id="problem">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">The admission gap</span>
      <h2>Students enrol with whoever replies first. Most institutes reply too late.</h2>
      <p>Peak season, every counsellor busy, enquiries pouring in at 2 AM. The fastest, most consistent responder wins the admission — and humans can't be everywhere, always.</p>
    </div>
    <div class="prob-grid">
      <div class="prob-card"><div class="big">35–<em>40%</em></div><p>of admission-season calls &amp; enquiries go unanswered at peak times.</p></div>
      <div class="prob-card"><div class="big"><em>78%</em></div><p>of students enrol with the institute that contacts them first.</p></div>
      <div class="prob-card"><div class="big">17<em>h</em></div><p>average industry response time — VidyaAI replies in under 60 seconds.</p></div>
    </div>
  </div>
</section>

<!-- ===================== 4 PILLARS ===================== -->
<style>
#pillars{background:var(--slate);color:#cbd5e1}
#pillars .sec-head h2{color:#fff}
#pillars .sec-head p{color:#94a3b8}
.pill-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.pcard{background:linear-gradient(180deg,#1e293b,#162033);border:1px solid #283449;border-radius:var(--radius);padding:24px;transition:transform .25s,border-color .25s}
.pcard:hover{transform:translateY(-5px);border-color:var(--teal)}
.pcard .ic{width:48px;height:48px;border-radius:13px;background:rgba(6,182,212,.14);color:var(--teal-2);display:grid;place-items:center;font-size:22px;margin-bottom:14px}
.pcard h3{font-size:18px;color:#fff;margin-bottom:8px}
.pcard p{font-size:13.5px;color:#94a3b8}
@media(max-width:900px){.pill-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:520px){.pill-grid{grid-template-columns:1fr}}
</style>
<section id="pillars">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">One AI agent · four superpowers</span>
      <h2>Everything a great counsellor does — at infinite scale.</h2>
      <p>VidyaAI works the top of your funnel 24/7 so your team spends time enrolling students, not chasing them.</p>
    </div>
    <div class="pill-grid">
      <div class="pcard"><div class="ic">&#128172;</div><h3>VidyaGPT Chat</h3><p>Answers fees, courses, eligibility &amp; hostel questions on web and WhatsApp — instantly, in the student's language.</p></div>
      <div class="pcard"><div class="ic">&#128222;</div><h3>AI Voice Calling</h3><p>Calls every new lead in seconds, qualifies intent and books counselling slots — thousands of calls, zero fatigue.</p></div>
      <div class="pcard"><div class="ic">&#127919;</div><h3>Intent Scoring</h3><p>Reads real behaviour and scores every lead 0–100, so counsellors always call the hottest applicant first.</p></div>
      <div class="pcard"><div class="ic">&#129518;</div><h3>Smart Routing</h3><p>Matches each student to the best counsellor by language, course &amp; availability — and hands over with full context.</p></div>
    </div>
  </div>
</section>

<!-- ===================== VIDYAGPT ===================== -->
<style>
.feat{display:grid;grid-template-columns:1fr 1fr;gap:52px;align-items:center}
.feat .copy .eyebrow{margin-bottom:14px}
.feat h2{font-size:clamp(26px,3.6vw,40px);color:var(--navy);margin-bottom:16px}
.feat .copy p.lead{font-size:17px;color:var(--slate-3);margin-bottom:22px}
.feat ul{list-style:none;display:grid;gap:13px;margin-bottom:26px}
.feat ul li{display:flex;gap:11px;align-items:flex-start;font-size:15px;color:var(--ink)}
.feat ul li .tick{flex:none;width:24px;height:24px;border-radius:7px;background:var(--teal-soft);color:#0891b2;display:grid;place-items:center;font-size:13px;font-weight:800}
@media(max-width:860px){.feat{grid-template-columns:1fr;gap:36px}.feat.rev .copy{order:-1}}
/* whatsapp panel */
.wa{background:#fff;border:1px solid var(--line);border-radius:var(--radius-lg);box-shadow:var(--shadow);overflow:hidden;max-width:420px;margin:0 auto}
.wa-top{background:var(--navy);color:#fff;padding:14px 16px;display:flex;align-items:center;gap:11px}
.wa-top .av{width:38px;height:38px;border-radius:50%;background:var(--teal);display:grid;place-items:center;font-weight:800;color:#04222a}
.wa-top .nm{font-family:var(--font-h);font-weight:700;font-size:14.5px}
.wa-top .st{font-size:11.5px;color:var(--teal-2)}
.wa-body{padding:16px;background:#eef2f7;display:flex;flex-direction:column;gap:10px;min-height:280px}
.wa-msg{max-width:84%;padding:10px 13px;border-radius:12px;font-size:13.5px;line-height:1.5;box-shadow:0 1px 2px rgba(0,0,0,.06)}
.wa-msg.in{align-self:flex-start;background:#fff}
.wa-msg.out{align-self:flex-end;background:#d9fdd3}
.wa-doc{align-self:flex-start;background:#fff;border:1px solid var(--line);border-radius:12px;padding:10px 13px;display:flex;align-items:center;gap:10px;font-size:12.5px;font-weight:600;color:var(--navy)}
.wa-doc .ic{width:32px;height:32px;border-radius:8px;background:var(--teal-soft);color:#0891b2;display:grid;place-items:center}
.wa-chips{display:flex;gap:7px;flex-wrap:wrap}
.wa-chips span{background:#fff;border:1px solid var(--teal);color:#0891b2;border-radius:999px;padding:6px 12px;font-size:12px;font-weight:600}
</style>
<section id="vidyagpt">
  <div class="wrap feat">
    <div class="copy">
      <span class="eyebrow">VidyaGPT · Conversational AI</span>
      <h2>A counsellor that never sleeps — on chat &amp; WhatsApp.</h2>
      <p class="lead">VidyaGPT understands real student questions and answers with your exact fees, courses, scholarships and deadlines — then nudges them towards applying.</p>
      <ul>
        <li><span class="tick">&#10003;</span> Answers in 95+ languages, including Hindi, Marathi, Tamil &amp; Bengali — on chat and voice.</li>
        <li><span class="tick">&#10003;</span> Trained on <b>your</b> brochure, fee structure &amp; policies — no generic replies.</li>
        <li><span class="tick">&#10003;</span> Captures the lead, sends the form &amp; books a counsellor call automatically.</li>
        <li><span class="tick">&#10003;</span> Full context handed to a human the moment buying intent appears.</li>
      </ul>
      <a href="#demo" class="btn btn-primary">See VidyaGPT on your data <span>&rarr;</span></a>
    </div>
    <div class="wa">
      <div class="wa-top"><div class="av">V</div><div><div class="nm">VidyaGPT</div><div class="st">online · 02:47 AM</div></div></div>
      <div class="wa-body">
        <div class="wa-msg out">Is there a hostel facility? 🏠</div>
        <div class="wa-msg in">Yes! 4 hostel blocks with 24/7 security. Sending the brochure to your WhatsApp now 📄</div>
        <div class="wa-doc"><span class="ic">📄</span> Brochure + Fee Structure 2026.pdf</div>
        <div class="wa-msg out">And the fee for B.Tech CSE?</div>
        <div class="wa-msg in">₹1.85L/yr with scholarships up to 40%. Want me to book a counsellor call?</div>
        <div class="wa-chips"><span>📅 Book a call</span><span>📝 Apply now</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== AI CALLING ===================== -->
<style>
#calling{background:var(--slate);color:#cbd5e1}
#calling h2{color:#fff}#calling .lead{color:#94a3b8}
#calling .feat ul li{color:#cbd5e1}
#calling .feat ul li .tick{background:rgba(6,182,212,.16);color:var(--teal-2)}
.callsim{background:linear-gradient(180deg,#1e293b,#13202f);border:1px solid #283449;border-radius:var(--radius-lg);padding:22px;box-shadow:0 30px 70px rgba(0,0,0,.35)}
.callsim .hd{display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid #283449;padding-bottom:12px;margin-bottom:6px}
.callsim .hd .t{font-family:var(--font-h);font-weight:700;color:#fff;font-size:14px;display:flex;align-items:center;gap:9px}
.callsim .hd .t .ph{width:30px;height:30px;border-radius:9px;background:rgba(6,182,212,.16);color:var(--teal-2);display:grid;place-items:center}
.callsim .live{font-size:11px;color:#22c55e;display:flex;align-items:center;gap:6px}.callsim .live i{width:7px;height:7px;border-radius:50%;background:#22c55e;animation:pulse 1.6s infinite}
.tl{position:relative;padding:14px 0 2px 26px}
.tl::before{content:"";position:absolute;left:7px;top:14px;bottom:10px;width:2px;background:#283449}
.tl .row{position:relative;padding:9px 0;opacity:0;transform:translateX(8px);animation:tlIn .5s forwards}
.tl .row:nth-child(1){animation-delay:.2s}.tl .row:nth-child(2){animation-delay:.7s}.tl .row:nth-child(3){animation-delay:1.2s}.tl .row:nth-child(4){animation-delay:1.7s}.tl .row:nth-child(5){animation-delay:2.2s}
@keyframes tlIn{to{opacity:1;transform:none}}
.tl .row::before{content:"";position:absolute;left:-26px;top:13px;width:16px;height:16px;border-radius:50%;background:var(--teal);border:3px solid #13202f}
.tl .tm{font-size:11px;color:var(--teal-2);font-weight:700;font-family:var(--font-h)}
.tl .tx{font-size:13.5px;color:#e2e8f0;margin-top:2px}.tl .tx small{color:#94a3b8}
.callsim .res{margin-top:12px;background:rgba(34,197,94,.12);border:1px solid rgba(34,197,94,.3);color:#4ade80;border-radius:12px;padding:11px 14px;font-weight:700;font-size:13.5px;display:flex;justify-content:space-between}
</style>
<section id="calling">
  <div class="wrap feat rev">
    <div class="callsim">
      <div class="hd"><div class="t"><span class="ph">📞</span> VidyaAI Voice Agent</div><div class="live"><i></i> LIVE CALL</div></div>
      <div class="tl">
        <div class="row"><div class="tm">T+0.0s</div><div class="tx">Inquiry detected · Meta Lead Ad <small>— Aarav S. · B.Tech CSE · Pune</small></div></div>
        <div class="row"><div class="tm">T+1.4s</div><div class="tx">Lead scored &amp; routed <small>— Intent HIGH · program match 94%</small></div></div>
        <div class="row"><div class="tm">T+3.8s</div><div class="tx">AI voice call initiated <small>— language auto-detected: English + Hindi</small></div></div>
        <div class="row"><div class="tm">T+18s</div><div class="tx">Connected &amp; qualified ✓ <small>— counselling slot booked tomorrow 11 AM</small></div></div>
        <div class="row"><div class="tm">T+19s</div><div class="tx">Warm summary pushed to counsellor <small>— score 92/100</small></div></div>
      </div>
      <div class="res"><span>QUALIFIED IN 18 SECONDS</span><span>0 min counsellor time</span></div>
    </div>
    <div class="copy">
      <span class="eyebrow">AI Voice Calling</span>
      <h2>Calls every lead in seconds — in their language.</h2>
      <p class="lead">The moment a lead arrives, VidyaAI dials, verifies intent, answers program &amp; fee questions and books the counselling slot. 24/7, in 10+ languages, every call transcribed and scored.</p>
      <ul>
        <li><span class="tick">&#10003;</span> Leads contacted in &lt;5 min are <b>21× more likely</b> to qualify.</li>
        <li><span class="tick">&#10003;</span> Thousands of simultaneous calls — no missed peak-hour enquiry.</li>
        <li><span class="tick">&#10003;</span> Every call transcribed, summarised &amp; scored into your CRM.</li>
      </ul>
      <a href="#demo" class="btn btn-primary">Hear a sample call <span>&rarr;</span></a>
    </div>
  </div>
</section>

<!-- ===================== INTENT SCORING ===================== -->
<style>
.score-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius-lg);box-shadow:var(--shadow);padding:26px;max-width:440px;margin:0 auto}
.score-top{display:flex;align-items:center;gap:18px;margin-bottom:18px}
.ring{--p:92;width:108px;height:108px;border-radius:50%;flex:none;display:grid;place-items:center;background:conic-gradient(var(--teal) calc(var(--p)*1%),#e2e8f0 0)}
.ring .in{width:84px;height:84px;border-radius:50%;background:#fff;display:grid;place-items:center;text-align:center}
.ring .in b{font-family:var(--font-h);font-weight:800;font-size:30px;color:var(--navy);line-height:1}
.ring .in span{font-size:10px;color:var(--muted);letter-spacing:.08em}
.score-top .who b{font-family:var(--font-h);font-size:18px;color:var(--navy)}
.score-top .who .tag{display:inline-block;margin-top:6px;background:#fef3c7;color:#b45309;font-size:11px;font-weight:700;padding:4px 10px;border-radius:999px}
.signals{display:grid;gap:9px}
.signals .sg{display:flex;align-items:center;gap:10px;font-size:13.5px;color:var(--ink);background:var(--bg);border:1px solid var(--line);border-radius:10px;padding:9px 12px}
.signals .sg .ck{color:var(--teal)}
</style>
<section id="scoring">
  <div class="wrap feat">
    <div class="copy">
      <span class="eyebrow">Intent Intelligence</span>
      <h2>Always call the hottest applicant first.</h2>
      <p class="lead">Not all leads are equal. VidyaAI reads real behavioural signals — fee-page visits, course searches, replies, distance — and rolls them into one intent score, so your team never wastes a minute on cold lists.</p>
      <ul>
        <li><span class="tick">&#10003;</span> Behaviour-based scoring, not guesswork or round-robin.</li>
        <li><span class="tick">&#10003;</span> Auto-flags "contact within 5 minutes" for hot leads.</li>
        <li><span class="tick">&#10003;</span> 2.4× faster conversions when teams work by score.</li>
      </ul>
      <a href="#demo" class="btn btn-primary">See scoring on your funnel <span>&rarr;</span></a>
    </div>
    <div class="score-card">
      <div class="score-top">
        <div class="ring"><div class="in"><b>92</b><span>INTENT</span></div></div>
        <div class="who"><b>Riya's Parent</b><div class="muted" style="font-size:13px">B.Tech (CS) · Missed Call · Google Ads</div><span class="tag">🔥 HOT — contact in 5 min</span></div>
      </div>
      <div class="signals">
        <div class="sg"><span class="ck">&#10003;</span> Visited fee page 3× this week</div>
        <div class="sg"><span class="ck">&#10003;</span> Searched "B.Tech CS placements"</div>
        <div class="sg"><span class="ck">&#10003;</span> Lives 4 km from campus</div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== HOW IT WORKS ===================== -->
<style>
#how{background:linear-gradient(180deg,var(--bg),#fff)}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;counter-reset:s}
.step{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px;position:relative;box-shadow:var(--shadow-sm)}
.step .n{width:40px;height:40px;border-radius:11px;background:linear-gradient(135deg,var(--teal),var(--navy-2));color:#fff;font-family:var(--font-h);font-weight:800;display:grid;place-items:center;margin-bottom:14px}
.step h3{font-size:16.5px;color:var(--navy);margin-bottom:7px}
.step p{font-size:13.5px;color:var(--muted)}
.step .arrow{position:absolute;right:-13px;top:50%;color:var(--teal);font-size:22px;z-index:2}
.step:last-child .arrow{display:none}
@media(max-width:900px){.steps{grid-template-columns:1fr 1fr}.step .arrow{display:none}}
@media(max-width:520px){.steps{grid-template-columns:1fr}}
</style>
<section id="how">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">From missed call to admission</span>
      <h2>How VidyaAI works — in four moves.</h2>
      <p>One real enquiry, fully handled. 7 of 9 touchpoints are AI; your counsellor does only the two that need a human.</p>
    </div>
    <div class="steps">
      <div class="step"><div class="n">1</div><h3>Capture</h3><p>Every enquiry — ads, forms, missed calls, walk-ins, WhatsApp — logged in 1.8s with source &amp; intent. Zero leakage.</p><span class="arrow">&rarr;</span></div>
      <div class="step"><div class="n">2</div><h3>Engage</h3><p>AI calls &amp; messages within the same minute, answers questions and books a slot — in the student's language.</p><span class="arrow">&rarr;</span></div>
      <div class="step"><div class="n">3</div><h3>Qualify</h3><p>Behavioural intent scoring ranks every lead and picks the best counsellor by language, course &amp; availability.</p><span class="arrow">&rarr;</span></div>
      <div class="step"><div class="n">4</div><h3>Hand over</h3><p>Warm, fully-briefed lead lands on a counsellor's screen with full context — they close, the student enrols. 🎉</p><span class="arrow">&rarr;</span></div>
    </div>
  </div>
</section>

<!-- ===================== LANGUAGES ===================== -->
<style>
#langs{background:var(--navy);color:#dbe4f3;text-align:center;overflow:hidden}
#langs h2{color:#fff;font-size:clamp(26px,3.6vw,42px);margin-bottom:14px}
#langs p{color:#a9bbd6;max-width:620px;margin:0 auto 30px}
.lang-marq{display:flex;gap:12px;flex-wrap:wrap;justify-content:center;max-width:900px;margin:0 auto}
.lang-marq span{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.14);border-radius:999px;padding:9px 18px;font-size:14px;font-weight:600;color:#fff;transition:.2s}
.lang-marq span:hover{background:var(--teal);color:#04222a;border-color:var(--teal)}
</style>
<section id="langs">
  <div class="wrap">
    <span class="eyebrow">95+ languages · chat &amp; voice</span>
    <h2>Talks to every family in the language they trust.</h2>
    <p>VidyaAI understands and responds in 95+ languages across chat and AI voice calls — so no enquiry is lost to a language barrier.</p>
    <div class="lang-marq">
      <span>English</span><span>हिन्दी</span><span>मराठी</span><span>தமிழ்</span><span>తెలుగు</span><span>ಕನ್ನಡ</span><span>বাংলা</span><span>ગુજરાતી</span><span>മലയാളം</span><span>ਪੰਜਾਬੀ</span><span>اردو</span><span>+ 84 more</span>
    </div>
  </div>
</section>

<!-- ===================== INTEGRATIONS ===================== -->
<style>
.int-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:8px}
.int{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:22px;text-align:center;box-shadow:var(--shadow-sm);transition:.25s}
.int:hover{transform:translateY(-4px);border-color:var(--teal)}
.int .ic{width:48px;height:48px;border-radius:13px;margin:0 auto 12px;background:var(--teal-soft);color:#0891b2;display:grid;place-items:center;font-size:22px}
.int h3{font-size:15px;color:var(--navy);margin-bottom:5px}
.int p{font-size:12.5px;color:var(--muted)}
@media(max-width:860px){.int-grid{grid-template-columns:1fr 1fr}}
</style>
<section id="integrations">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">50+ native integrations</span>
      <h2>Plugs into the tools your team already uses.</h2>
      <p>VidyaAI lives inside the ExtraaEdge Admission CRM and connects to your ads, telephony, payments and WhatsApp — no rip-and-replace.</p>
    </div>
    <div class="int-grid">
      <div class="int"><div class="ic">💬</div><h3>WhatsApp Business API</h3><p>Official partner · verified sending</p></div>
      <div class="int"><div class="ic">📞</div><h3>Cloud Telephony</h3><p>AI calling on your numbers</p></div>
      <div class="int"><div class="ic">📣</div><h3>Meta &amp; Google Ads</h3><p>Auto lead capture + attribution</p></div>
      <div class="int"><div class="ic">🎓</div><h3>ERP / SIS</h3><p>Two-way student data sync</p></div>
      <div class="int"><div class="ic">💳</div><h3>Payments</h3><p>Razorpay, Paytm, Stripe &amp; more</p></div>
      <div class="int"><div class="ic">🌐</div><h3>Forms &amp; Website</h3><p>Embed chat &amp; capture anywhere</p></div>
      <div class="int"><div class="ic">📊</div><h3>ExtraaEdge CRM</h3><p>Native — scores write back live</p></div>
      <div class="int"><div class="ic">⚡</div><h3>Automation</h3><p>Webhooks &amp; Zapier-ready</p></div>
    </div>
  </div>
</section>

<!-- ===================== PROOF ===================== -->
<style>
#proof{background:var(--bg)}
.tg-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.tcard{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;gap:14px}
.tcard .stars{color:#f59e0b;font-size:15px;letter-spacing:2px}
.tcard p{font-size:14.5px;color:var(--slate-3)}
.tcard .who{display:flex;align-items:center;gap:11px;margin-top:auto}
.tcard .who .av{width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--teal),var(--navy-2));color:#fff;display:grid;place-items:center;font-weight:800;font-family:var(--font-h)}
.tcard .who b{font-size:14px;color:var(--navy);font-family:var(--font-h)}
.tcard .who span{font-size:12px;color:var(--muted)}
.proof-bar{display:flex;justify-content:center;flex-wrap:wrap;gap:14px 40px;margin-bottom:36px}
.proof-bar .m{text-align:center}.proof-bar .m b{display:block;font-family:var(--font-h);font-weight:800;font-size:30px;color:var(--navy)}.proof-bar .m span{font-size:12.5px;color:var(--muted)}
@media(max-width:860px){.tg-grid{grid-template-columns:1fr}}
</style>
<section id="proof">
  <div class="wrap">
    <div class="sec-head">
      <span class="eyebrow">Loved by admission teams</span>
      <h2>Powering growth for 500+ institutions.</h2>
    </div>
    <div class="proof-bar">
      <div class="m"><b>4.7/5</b><span>on G2 &amp; Capterra</span></div>
      <div class="m"><b>500+</b><span>Institutions</span></div>
      <div class="m"><b>12+</b><span>Countries</span></div>
      <div class="m"><b>10M+</b><span>Enquiries handled</span></div>
    </div>
    <div class="tg-grid">
      <div class="tcard"><div class="stars">★★★★★</div><p>"Most changes we need are implemented fast, and creating our own reports has been a game-changer. Dynamic and trustworthy."</p><div class="who"><div class="av">SM</div><div><b>Silky Jain Marwah</b><br><span>Executive Director · Tula's Institute</span></div></div></div>
      <div class="tcard"><div class="stars">★★★★★</div><p>"From seamless WhatsApp integrations to automated workflows, our entire lead journey is now streamlined and measurable."</p><div class="who"><div class="av">PR</div><div><b>Pranay Rupani</b><br><span>Head of Admissions · Annapurna College</span></div></div></div>
      <div class="tcard"><div class="stars">★★★★★</div><p>"Very user-friendly and fully customizable. Tracking the lead journey is smooth and the team resolves issues immediately."</p><div class="who"><div class="av">ND</div><div><b>K. Nirmala Devi</b><br><span>Assistant Manager · Indian Academy Group</span></div></div></div>
    </div>
  </div>
</section>

<!-- ===================== SECURITY ===================== -->
<style>
.sec-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.scard{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:22px;text-align:center;box-shadow:var(--shadow-sm)}
.scard .ic{font-size:26px;margin-bottom:10px}
.scard b{display:block;font-family:var(--font-h);color:var(--navy);font-size:15px;margin-bottom:5px}
.scard p{font-size:12.5px;color:var(--muted)}
@media(max-width:860px){.sec-grid{grid-template-columns:1fr 1fr}}
</style>
<section id="security">
  <div class="wrap">
    <div class="sec-head"><span class="eyebrow">Enterprise-grade trust</span><h2>Your students' data, protected by design.</h2></div>
    <div class="sec-grid">
      <div class="scard"><div class="ic">🛡️</div><b>ISO 27001</b><p>Audited information-security management</p></div>
      <div class="scard"><div class="ic">🔒</div><b>GDPR Compliant</b><p>Privacy-first handling &amp; consent</p></div>
      <div class="scard"><div class="ic">🇮🇳</div><b>India Data Residency</b><p>Secure, scalable cloud hosting</p></div>
      <div class="scard"><div class="ic">👥</div><b>Role-Based Access</b><p>Granular permissions &amp; audit trails</p></div>
    </div>
  </div>
</section>

<!-- ===================== FAQ ===================== -->
<style>
#faq .wrap{max-width:820px}
.faq-item{background:#fff;border:1px solid var(--line);border-radius:14px;margin-bottom:12px;overflow:hidden}
.faq-q{width:100%;text-align:left;background:none;border:0;cursor:pointer;padding:18px 20px;font-family:var(--font-h);font-weight:700;font-size:16px;color:var(--navy);display:flex;justify-content:space-between;align-items:center;gap:14px}
.faq-q .pm{flex:none;width:26px;height:26px;border-radius:8px;background:var(--teal-soft);color:#0891b2;display:grid;place-items:center;font-size:18px;transition:transform .25s}
.faq-item.open .faq-q .pm{transform:rotate(45deg)}
.faq-a{max-height:0;overflow:hidden;transition:max-height .3s ease;padding:0 20px;color:var(--slate-3);font-size:14.5px}
.faq-item.open .faq-a{max-height:240px;padding:0 20px 18px}
</style>
<section id="faq">
  <div class="wrap">
    <div class="sec-head"><span class="eyebrow">Frequently asked</span><h2>Everything about VidyaAI.</h2></div>
    <div class="faq-item"><button class="faq-q">What is VidyaAI? <span class="pm">+</span></button><div class="faq-a">VidyaAI is a 24/7 AI admission agent — VidyaGPT chat, AI voice calling and intent scoring — that answers, qualifies and follows up with every student and hands counsellors only hot, ready-to-enrol leads. It runs inside the ExtraaEdge Admission CRM.</div></div>
    <div class="faq-item"><button class="faq-q">Which languages does it support? <span class="pm">+</span></button><div class="faq-a">95+ languages on chat and AI voice calls, including Hindi, Marathi, Tamil, Telugu, Kannada, Bengali, Gujarati and more.</div></div>
    <div class="faq-item"><button class="faq-q">Does it work on WhatsApp? <span class="pm">+</span></button><div class="faq-a">Yes — VidyaAI is an official WhatsApp Business API partner. It runs verified, personalised conversations and hands off to counsellors with full context.</div></div>
    <div class="faq-item"><button class="faq-q">How is it trained on our data? <span class="pm">+</span></button><div class="faq-a">VidyaGPT is grounded on your brochure, fee structure, courses, scholarships and policies during onboarding, so every answer is accurate to your institution — no generic replies.</div></div>
    <div class="faq-item"><button class="faq-q">Does it replace our counsellors? <span class="pm">+</span></button><div class="faq-a">No — it removes the repetitive 80% (instant replies, follow-ups, qualification) so your counsellors spend their time on warm, ready families and actually closing admissions.</div></div>
    <div class="faq-item"><button class="faq-q">Is our data secure? <span class="pm">+</span></button><div class="faq-a">Yes — ISO 27001 certified, GDPR compliant, India data residency, role-based access and full audit trails.</div></div>
  </div>
</section>

<!-- ===================== FINAL CTA + FORM ===================== -->
<style>
#demo{background:var(--slate);color:#cbd5e1}
.demo-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:48px;align-items:center}
#demo h2{color:#fff;font-size:clamp(28px,4vw,44px);margin-bottom:16px}
#demo .lead{color:#94a3b8;font-size:17px;margin-bottom:24px}
.demo-list{list-style:none;display:grid;gap:13px}
.demo-list li{display:flex;gap:11px;color:#dbe4f3;font-size:15px}
.demo-list .tick{flex:none;width:24px;height:24px;border-radius:7px;background:rgba(6,182,212,.16);color:var(--teal-2);display:grid;place-items:center;font-weight:800}
.formcard{background:#fff;border-radius:var(--radius-lg);padding:30px;box-shadow:0 30px 70px rgba(0,0,0,.4)}
.formcard h3{color:var(--navy);font-size:22px;margin-bottom:6px}
.formcard .sm{color:var(--muted);font-size:13.5px;margin-bottom:18px}
.formcard .f{display:grid;gap:13px}
.formcard input,.formcard select{width:100%;padding:13px 15px;border:1.5px solid var(--line);border-radius:11px;font-family:var(--font-b);font-size:15px;background:var(--bg)}
.formcard input:focus,.formcard select:focus{outline:none;border-color:var(--teal);background:#fff}
.formcard .btn{width:100%;margin-top:4px}
.formcard .trust{margin-top:14px;font-size:12px;color:var(--muted);text-align:center}
@media(max-width:860px){.demo-grid{grid-template-columns:1fr;gap:36px}}
</style>
<section id="demo">
  <div class="wrap demo-grid">
    <div>
      <span class="eyebrow">Book your free demo</span>
      <h2>See VidyaAI run on your admission funnel.</h2>
      <p class="lead">A live 30-minute walkthrough mapped to your courses, sources and team — plus a personalised ROI projection for this cycle.</p>
      <ul class="demo-list">
        <li><span class="tick">&#10003;</span> VidyaGPT, AI calling &amp; scoring working on your use case</li>
        <li><span class="tick">&#10003;</span> Your personalised ROI &amp; extra-enrolment projection</li>
        <li><span class="tick">&#10003;</span> A 14-day go-live plan — no IT team required</li>
        <li><span class="tick">&#10003;</span> No obligation, no credit card</li>
      </ul>
    </div>
    <div class="formcard">
      <h3>Get your free demo</h3>
      <p class="sm">We'll reach out within the hour · 500+ institutions trust us</p>
      <form class="f" onsubmit="return false">
        <input type="text" name="name" placeholder="Your full name *" required>
        <input type="text" name="institute" placeholder="Institute / organisation *" required>
        <input type="email" name="email" placeholder="Work email *" required>
        <input type="tel" name="phone" placeholder="WhatsApp number *" required>
        <select name="volume"><option value="">Monthly enquiry volume (optional)</option><option>&lt; 500</option><option>500 – 2,000</option><option>2,000 – 10,000</option><option>10,000+</option></select>
        <button type="submit" class="btn btn-primary">Book My Free Demo &rarr;</button>
      </form>
      <p class="trust">🔒 ISO 27001 &amp; GDPR compliant · No spam, ever</p>
    </div>
  </div>
</section>

<!-- ===================== FOOTER ===================== -->
<style>
#ft{background:var(--navy-deep);color:#a9bbd6;padding:48px 0 28px}
.ft-top{display:flex;flex-wrap:wrap;justify-content:space-between;gap:28px;padding-bottom:26px;border-bottom:1px solid rgba(255,255,255,.1)}
.ft-top .logo{color:#fff}
.ft-cols{display:flex;flex-wrap:wrap;gap:48px}
.ft-cols h4{color:#fff;font-size:13px;letter-spacing:.08em;text-transform:uppercase;margin-bottom:12px}
.ft-cols a{display:block;color:#a9bbd6;font-size:14px;margin-bottom:9px;transition:.2s}
.ft-cols a:hover{color:var(--teal-2)}
.ft-bot{padding-top:20px;font-size:12.5px;color:#7e93b5;display:flex;flex-wrap:wrap;justify-content:space-between;gap:10px}
</style>
<footer id="ft">
  <div class="wrap">
    <div class="ft-top">
      <div style="max-width:300px">
        <a href="/" class="logo"><span class="mark">V</span>Vidya<b>AI</b></a>
        <p style="margin-top:14px;font-size:14px">The 24/7 AI admission agent — part of the ExtraaEdge admission stack.</p>
      </div>
      <div class="ft-cols">
        <div><h4>Product</h4><a href="#vidyagpt">VidyaGPT</a><a href="#calling">AI Calling</a><a href="#scoring">Intent Scoring</a><a href="#integrations">Integrations</a></div>
        <div><h4>Company</h4><a href="https://www.extraaedge.com/">ExtraaEdge CRM</a><a href="#demo">Book a Demo</a><a href="#faq">FAQ</a></div>
        <div><h4>Trust</h4><a href="#security">Security</a><a href="#security">ISO 27001</a><a href="#security">GDPR</a></div>
      </div>
    </div>
    <div class="ft-bot">
      <span>© <?php echo date('Y'); ?> ExtraaEdge Technology Solutions Pvt. Ltd · VidyaAI</span>
      <span>Made for admission teams · getvidya.ai</span>
    </div>
  </div>
</footer>

<script>
/* Mobile nav toggle */
(function(){
  var b=document.querySelector('.nav-burger'), links=document.querySelector('.nav-links');
  if(b&&links){b.addEventListener('click',function(){
    var open=links.style.display==='flex';
    links.style.cssText=open?'':'display:flex;position:absolute;top:70px;left:0;right:0;flex-direction:column;background:#fff;padding:18px 24px;gap:16px;border-bottom:1px solid var(--line);box-shadow:0 18px 40px rgba(15,23,42,.12)';
  });}
})();
/* FAQ accordion */
document.querySelectorAll('.faq-q').forEach(function(q){
  q.addEventListener('click',function(){
    var it=q.closest('.faq-item'); var open=it.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(function(i){i.classList.remove('open')});
    if(!open) it.classList.add('open');
  });
});
</script>
</body>
</html>
