<?php
/**
 * Front Page v06 - "Split Rail"
 * The app-frame language of messaging-era SaaS: a sticky left rail
 * navigates the page like a product sidebar, content scrolls on the
 * right. The site feels like software before you ever open the demo.
 * To use: copy this file over front-page.php (keep a backup).
 */
if (!defined('ABSPATH')) exit;
get_header();
$V = 'https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/vidya-ai-fevicons/';
$L = 'https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/';
$LOGOS = array(
  array($L.'higher%20education/tula-s-institute-dehradun-logo.svg',"Tula's Institute"),
  array($L.'higher%20education/uttaranchal-university-logo.svg','Uttaranchal University'),
  array($L.'higher%20education/imt-ghaziabad-logo.svg','IMT Ghaziabad'),
  array($L.'higher%20education/fore-school-of-management-logo.svg','FORE School of Management'),
  array($L.'higher%20education/ashoka-university-haryana-logo.svg','Ashoka University'),
  array($L.'edtech/fostiima-business-school-logo.svg','FOSTIIMA Business School'),
);
$STORIES = array(
  array('3SHgLf1GFgk','Silky Jain Marwah',"Executive Director, Tula's Institute"),
  array('yfK83D2SKps','K. Nirmala Devi','Assistant Manager, Indian Academy Group'),
  array('dWLdQ8E3FOU','Pranay Rupani','Head of Admissions, Annapurna College'),
);
?>
<!-- ee-front-v06 split-rail -->
<main id="ee-main" class="eev6">
<style>
.eev6{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#111A2B;--mut:#5A6B85;--line:rgba(25,51,93,.12);--soft:#F6F8FB;font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:#fff;line-height:1.6;display:block}
.eev6 *{box-sizing:border-box;margin:0;padding:0}
.eev6 img{max-width:100%;height:auto;display:block}
.eev6 a{text-decoration:none;color:inherit}
.eev6 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px;border-radius:4px}
.eev6 .shell{max-width:1240px;margin:0 auto;padding:0 20px;display:grid;grid-template-columns:236px minmax(0,1fr);gap:clamp(20px,3vw,44px);align-items:start}
.eev6 .rail{position:sticky;top:86px;border:1px solid var(--line);border-radius:16px;background:var(--soft);padding:12px;display:grid;gap:2px;max-height:calc(100vh - 106px);overflow:auto}
.eev6 .rail .rh{font-size:10px;font-weight:800;letter-spacing:.13em;text-transform:uppercase;color:var(--mut);padding:6px 10px}
.eev6 .rail a{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:10px;font-size:13px;font-weight:600;color:var(--mut)}
.eev6 .rail a i{font-style:normal;width:6px;height:6px;border-radius:50%;background:var(--line);flex:none}
.eev6 .rail a.on{background:#fff;color:var(--navy);box-shadow:0 6px 16px -10px rgba(25,51,93,.35)}
.eev6 .rail a.on i{background:var(--o)}
.eev6 .rail .cta{margin-top:10px;display:inline-flex;justify-content:center;background:var(--o);color:#fff;font-weight:800;font-size:13px;border-radius:11px;padding:12px}
.eev6 .rail .cta:hover{background:var(--od)}
@media(max-width:940px){.eev6 .shell{grid-template-columns:minmax(0,1fr)}.eev6 .rail{display:none}}
.eev6 section{padding:clamp(28px,3.8vw,48px) 0;border-bottom:1px solid var(--line)}
.eev6 section:last-of-type{border-bottom:0}
.eev6 .tag{display:inline-flex;font-size:10.5px;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:var(--od);background:rgba(222,110,48,.08);border-radius:7px;padding:5px 11px}
.eev6 h2{margin-top:10px;font-size:clamp(21px,2.6vw,30px);font-weight:800;letter-spacing:-.022em;line-height:1.2;color:var(--navy)}
.eev6 .sub{margin-top:8px;color:var(--mut);font-size:14px;max-width:60ch}
.eev6 .sub b{color:var(--navy)}
.eev6 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:14px;border-radius:11px;padding:12px 22px;transition:.18s}
.eev6 .b-o{background:var(--o);color:#fff}
.eev6 .b-o:hover{background:var(--od)}
.eev6 .b-g{border:1.5px solid var(--line);color:var(--navy);background:#fff}
.eev6 .b-g:hover{border-color:var(--navy)}
/* hero (full width above the shell) */
.eev6 .hero{border-bottom:1px solid var(--line);background:linear-gradient(180deg,var(--soft),#fff);padding:clamp(44px,6vw,80px) 0}
.eev6 .hero .in{max-width:1240px;margin:0 auto;padding:0 20px;display:grid;grid-template-columns:1.05fr .95fr;gap:clamp(24px,4vw,60px);align-items:center}
.eev6 h1{font-size:clamp(30px,4.3vw,52px);font-weight:900;letter-spacing:-.032em;line-height:1.07;color:var(--navy)}
.eev6 h1 em{font-style:normal;color:var(--o)}
.eev6 .hero .lead{margin-top:14px;font-size:15.5px;color:var(--mut);max-width:50ch}
.eev6 .hero .lead b{color:var(--navy)}
.eev6 .hero .cta{display:flex;gap:11px;flex-wrap:wrap;margin-top:22px}
.eev6 .hero .fine{margin-top:14px;font-size:12.5px;color:var(--mut);font-weight:600}
.eev6 .app{border:1px solid var(--line);border-radius:18px;background:#fff;box-shadow:0 30px 60px -32px rgba(25,51,93,.4);overflow:hidden}
.eev6 .app .ab{display:flex;gap:6px;align-items:center;padding:10px 14px;border-bottom:1px solid var(--line);background:var(--soft)}
.eev6 .app .ab i{width:9px;height:9px;border-radius:50%;background:var(--line);font-style:normal}
.eev6 .app .ab span{margin-left:8px;font-size:11px;font-weight:700;color:var(--mut)}
.eev6 .app .row{display:flex;justify-content:space-between;align-items:center;gap:10px;padding:11px 14px;border-bottom:1px solid var(--line);font-size:12.6px}
.eev6 .app .row:last-child{border-bottom:0}
.eev6 .app .row b{color:var(--navy)}
.eev6 .app .row span{color:var(--mut);font-size:11.5px}
.eev6 .pill{flex:none;font-size:10px;font-weight:800;border-radius:999px;padding:4px 10px}
.eev6 .p-o{background:rgba(222,110,48,.12);color:var(--od)}
.eev6 .p-g{background:rgba(31,175,102,.12);color:#157A49}
.eev6 .p-n{background:var(--soft);color:var(--mut);border:1px solid var(--line)}
@media(max-width:900px){.eev6 .hero .in{grid-template-columns:1fr}}
/* generic grids */
.eev6 .g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:20px}
.eev6 .g2{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:20px}
.eev6 .card{border:1px solid var(--line);border-radius:16px;padding:20px;background:#fff;transition:.18s}
.eev6 .card:hover{box-shadow:0 18px 40px -24px rgba(25,51,93,.3)}
.eev6 .card h3{font-size:15px;font-weight:800;color:var(--navy)}
.eev6 .card p{margin-top:7px;font-size:13px;color:var(--mut)}
.eev6 .card p b{color:var(--navy)}
@media(max-width:860px){.eev6 .g3,.eev6 .g2{grid-template-columns:1fr}}
/* stats */
.eev6 .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:20px}
.eev6 .stats .card{text-align:center}
.eev6 .stats b{display:block;font-size:24px;font-weight:900;color:var(--navy)}
.eev6 .stats b i{font-style:normal;color:var(--o)}
.eev6 .stats span{font-size:11.5px;color:var(--mut)}
@media(max-width:760px){.eev6 .stats{grid-template-columns:1fr 1fr}}
/* logos */
.eev6 .lrow{display:flex;flex-wrap:wrap;align-items:center;gap:22px 34px;margin-top:20px}
.eev6 .lrow img{height:28px;width:auto;opacity:.8}
/* suite convo */
.eev6 .convo{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:20px}
.eev6 .convo .card img{width:32px;height:32px;margin-bottom:10px}
.eev6 .convo .card em{display:block;font-style:normal;font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--od);margin-top:2px}
@media(max-width:760px){.eev6 .convo{grid-template-columns:1fr}}
/* stories */
.eev6 .vrow{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:20px}
.eev6 .vc{position:relative;border:1px solid var(--line);padding:0;background:#0F2040;border-radius:16px;overflow:hidden;aspect-ratio:16/10;cursor:pointer;width:100%}
.eev6 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev6 .vc .pb{position:absolute;left:50%;top:42%;transform:translate(-50%,-50%);width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,.95);display:grid;place-items:center}
.eev6 .vc:hover .pb{background:var(--o)}
.eev6 .vc .pb svg{width:17px;height:17px;color:var(--navy);margin-left:2px}
.eev6 .vc:hover .pb svg{color:#fff}
.eev6 .vc .who{position:absolute;left:0;right:0;bottom:0;padding:22px 12px 10px;background:linear-gradient(transparent,rgba(10,20,40,.9));color:#fff;text-align:left}
.eev6 .vc .who b{display:block;font-size:12.5px}
.eev6 .vc .who span{font-size:10.5px;color:#C8D4E6}
.eev6 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
@media(max-width:860px){.eev6 .vrow{grid-template-columns:1fr}}
/* quote */
.eev6 .quote{background:var(--navy);border-radius:18px;color:#fff;padding:clamp(26px,4vw,44px);margin-top:20px}
.eev6 .quote blockquote{font-size:clamp(19px,2.6vw,28px);font-weight:800;letter-spacing:-.02em;line-height:1.32;max-width:30ch}
.eev6 .quote blockquote em{font-style:normal;color:#FFB98A}
.eev6 .quote p{margin-top:12px;color:#C4D2E8;font-size:13px}
/* table */
.eev6 .tblw{border:1px solid var(--line);border-radius:16px;overflow:auto;margin-top:20px}
.eev6 table{width:100%;border-collapse:collapse;font-size:13px;min-width:560px}
.eev6 th,.eev6 td{padding:11px 15px;border-bottom:1px solid var(--line);text-align:left}
.eev6 th{font-size:10px;letter-spacing:.11em;text-transform:uppercase;color:var(--mut);background:var(--soft)}
.eev6 td:first-child{font-weight:700;color:var(--navy)}
.eev6 tr:last-child td{border-bottom:0}
.eev6 .y{color:#157A49;font-weight:800}
.eev6 .n{color:#C43D3D}
/* chips */
.eev6 .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.eev6 .chip{font-size:11.5px;font-weight:700;color:var(--navy);background:var(--soft);border:1px solid var(--line);border-radius:999px;padding:6px 12px}
/* faq */
.eev6 details{border:1px solid var(--line);border-radius:13px;background:#fff;padding:0 16px;margin-top:10px}
.eev6 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:14px 0;font-weight:700;font-size:13.8px;color:var(--navy)}
.eev6 summary::-webkit-details-marker{display:none}
.eev6 summary::after{content:'+';color:var(--o);font-size:17px;transition:.15s}
.eev6 details[open] summary::after{transform:rotate(45deg)}
.eev6 details p{padding-bottom:14px;font-size:13px;color:var(--mut)}
/* close */
.eev6 .closec{background:var(--navy);border-radius:18px;color:#fff;padding:clamp(28px,4vw,48px);text-align:center;margin-top:20px}
.eev6 .closec h2{color:#fff}
.eev6 .closec .sub{color:#C4D2E8;margin-left:auto;margin-right:auto}
.eev6 .closec .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:20px}
.eev6 .closec .b-g{background:transparent;border-color:rgba(255,255,255,.35);color:#fff}
/* explore + blog */
.eev6 .cols{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:20px}
.eev6 .cols .card a{display:block;padding:7px 0;font-size:13px;font-weight:600;color:var(--navy);border-bottom:1px dashed var(--line)}
.eev6 .cols .card a:hover{color:var(--od)}
.eev6 .cols .card a:last-child{border-bottom:0}
@media(max-width:860px){.eev6 .cols{grid-template-columns:1fr}}
.eev6 .blogr{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:20px}
.eev6 .blogr time{font-size:11px;color:var(--mut);font-weight:800}
.eev6 .blogr h3{margin-top:5px;font-size:14px;line-height:1.35}
.eev6 .blogr span{display:inline-block;margin-top:8px;font-size:12.5px;font-weight:800;color:var(--od)}
@media(max-width:860px){.eev6 .blogr{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.eev6 *{transition:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v6h1">
  <div class="in">
    <div>
      <span class="tag">India's Intelligent Admissions Growth Platform</span>
      <h1 id="v6h1" style="margin-top:14px">Admissions, run like a <em>well-built app</em></h1>
      <p class="lead">Vidya AI answers every enquiry in <b>60 seconds</b>, scores intent and books your counsellor. The CRM around it carries follow-ups, applications, fees and analytics. <b>500+ institutions</b> work in it daily.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Open the live platform</a>
      </div>
      <p class="fine">4.7/5 from 320+ admission teams &middot; go-live in 7 days</p>
    </div>
    <div class="app" role="img" aria-label="The morning queue inside the platform">
      <div class="ab"><i></i><i></i><i></i><span>app.extraaedge.com &middot; sample data</span></div>
      <div class="row"><div><b>Ananya S. &middot; B.Tech</b> <span>&middot; answered 9:41pm, intent 92</span></div><span class="pill p-o">Call first</span></div>
      <div class="row"><div><b>Rahul M. &middot; MBA</b> <span>&middot; fee page x3, nurture day 2</span></div><span class="pill p-n">Warm</span></div>
      <div class="row"><div><b>Ishita K. &middot; B.Com</b> <span>&middot; new, deduped, scored</span></div><span class="pill p-g">Auto</span></div>
      <div class="row"><div><b>11 overnight enquiries</b> <span>&middot; all answered by Vidya AI</span></div><span class="pill p-g">60 sec each</span></div>
    </div>
  </div>
</section>

<div class="shell">
  <nav class="rail" aria-label="Page sections">
    <span class="rh">On this page</span>
    <a href="#v6-why" class="on"><i></i> The three leaks</a>
    <a href="#ee-platform"><i></i> Live platform</a>
    <a href="#v6-suite"><i></i> Vidya AI</a>
    <a href="#v6-proof"><i></i> Customer stories</a>
    <a href="#v6-ind"><i></i> Industries</a>
    <a href="#v6-cmp"><i></i> Comparison</a>
    <a href="#v6-trust"><i></i> Trust &amp; security</a>
    <a href="#v6-go"><i></i> Go-live &amp; pricing</a>
    <a href="#v6-faq"><i></i> FAQ</a>
    <a href="#v6-more"><i></i> Explore &amp; blog</a>
    <a class="cta" href="#admission-form">Book a Demo</a>
  </nav>

  <div class="content">
    <section id="v6-why" aria-labelledby="v6why-h">
      <span class="tag">The diagnosis</span>
      <h2 id="v6why-h">Funnels do not lose leads. They lose time.</h2>
      <div class="stats">
        <div class="card"><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
        <div class="card"><b>Up to <i>40%</i></b><span>conversion lift</span></div>
        <div class="card"><b>10M<i>+</i></b><span>enquiries managed</span></div>
        <div class="card"><b>95%</b><span>counsellor adoption</span></div>
      </div>
      <div class="g3">
        <div class="card"><h3>The overnight queue</h3><p>Enquiries at 9pm wait till Monday. <b>VidyaGPT answers in 60 seconds</b>, in 95+ languages, from your own brochure.</p></div>
        <div class="card"><h3>The lapsed follow-up</h3><p>Every promise becomes a task with an SLA and escalation. <b>Nothing rides on memory.</b></p></div>
        <div class="card"><h3>The blind meeting</h3><p>Funnel, source ROI, counsellor analytics, live. <b>Cost per admission on screen.</b></p></div>
      </div>
      <div class="lrow" aria-label="Institutions using ExtraaEdge">
        <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
      </div>
    </section>

    <?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

    <section id="v6-suite" aria-labelledby="v6suite-h">
      <span class="tag">The AI layer</span>
      <h2 id="v6suite-h">Vidya AI, working every thread</h2>
      <div class="convo">
        <div class="card"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="" width="32" height="32"><h3>VidyaGPT</h3><em>24x7 chat</em><p>Answers WhatsApp and web enquiries from approved content; escalates instead of guessing.</p></div>
        <div class="card"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="" width="32" height="32"><h3>VidyaPulse</h3><em>Intent scoring</em><p>Orders the queue hot-first with the reasons shown; counsellors can overrule in a click.</p></div>
        <div class="card"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="" width="32" height="32"><h3>VidyaAgents</h3><em>AI calling</em><p>Calls, confirms interest and books the counsellor slot; first human dial is warm.</p></div>
        <div class="card"><img src="<?php echo esc_url($V.'vidya-ai.svg'); ?>" alt="" width="32" height="32"><h3>Vidya AI Suite</h3><em>One timeline</em><p>All three on one student record, on top of the full Education CRM.</p></div>
      </div>
    </section>

    <section id="v6-proof" aria-labelledby="v6proof-h">
      <span class="tag">Customer stories</span>
      <h2 id="v6proof-h">What our clients are saying</h2>
      <div class="vrow">
        <?php foreach ($STORIES as $s): ?>
        <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
          <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
          <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
          <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
        </button>
        <?php endforeach; ?>
      </div>
      <p style="margin-top:14px;font-size:13px"><a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>" style="color:var(--od);font-weight:800">View all customer stories &rarr;</a></p>
      <div class="quote">
        <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
        <p>Configuration, not customization: the working principle on every implementation.</p>
      </div>
    </section>

    <section id="v6-ind" aria-labelledby="v6ind-h">
      <span class="tag">Fit</span>
      <h2 id="v6ind-h">For every kind of institution</h2>
      <div class="g3">
        <a class="card" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><h3>Universities &amp; Colleges</h3><p>Multi-campus, multi-course funnels.</p></a>
        <a class="card" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><h3>K-12 Schools</h3><p>Parent-led admission journeys.</p></a>
        <a class="card" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><h3>Coaching &amp; Test Prep</h3><p>High volume, fast cycles.</p></a>
        <a class="card" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><h3>Study Abroad</h3><p>Document-heavy pipelines.</p></a>
        <a class="card" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><h3>EdTech</h3><p>Digital-first enrolment at scale.</p></a>
        <a class="card" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><h3>Vocational</h3><p>Short courses, rolling intakes.</p></a>
      </div>
    </section>

    <section id="v6-cmp" aria-labelledby="v6cmp-h">
      <span class="tag">The comparison</span>
      <h2 id="v6cmp-h">The only AI-native Admissions Growth Platform</h2>
      <div class="tblw">
        <table>
          <thead><tr><th scope="col">Question</th><th scope="col">Meritto / LeadSquared</th><th scope="col">Generic CRMs</th><th scope="col">ExtraaEdge</th></tr></thead>
          <tbody>
            <tr><td>2am enquiry</td><td class="n">Waits</td><td class="n">Waits</td><td class="y">Answered in 60s</td></tr>
            <tr><td>Call order</td><td class="n">Newest first</td><td class="n">Newest first</td><td class="y">Intent first</td></tr>
            <tr><td>Built for</td><td>Education, pre-AI</td><td class="n">Sales pipelines</td><td class="y">AI-native admissions</td></tr>
            <tr><td>Go-live</td><td>Weeks to months</td><td class="n">Months</td><td class="y">7 days</td></tr>
          </tbody>
        </table>
      </div>
    </section>

    <section id="v6-trust" aria-labelledby="v6trust-h">
      <span class="tag">Trust</span>
      <h2 id="v6trust-h">Open to your stack. Strict with your data.</h2>
      <div class="g2">
        <div class="card"><h3>50+ integrations</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payments</span><span class="chip">API &amp; webhooks</span></div></div>
        <div class="card"><h3>Security &amp; compliance</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
      </div>
    </section>

    <section id="v6-go" aria-labelledby="v6go-h">
      <span class="tag">Logistics</span>
      <h2 id="v6go-h">Live in 7 days. Priced to your volumes.</h2>
      <p class="sub">Switching from spreadsheets or a legacy CRM is part of go-live: data migrated and deduplicated, funnel configured to how your admissions already run, 14 days total with migration.</p>
      <div class="g3">
        <div class="card"><h3>Day 1-2 &middot; Map</h3><p>Funnel, courses, sources and team captured.</p></div>
        <div class="card"><h3>Day 3-5 &middot; Configure &amp; migrate</h3><p>Platform set around your funnel; data in, deduped.</p></div>
        <div class="card"><h3>Day 6-7 &middot; Go live</h3><p>Counsellors onboarded; first enquiry answered.</p></div>
      </div>
      <div class="g2">
        <a class="card" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM pricing &rarr;</h3><p>Capture, counselling, follow-ups, applications, fees, analytics.</p></a>
        <a class="card" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI pricing &rarr;</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on your funnel.</p></a>
      </div>
    </section>

    <section id="v6-faq" aria-labelledby="v6faq-h">
      <span class="tag">FAQ</span>
      <h2 id="v6faq-h">Straight answers</h2>
      <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. 95% of counsellors are active after go-live.</p></details>
      <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs; when unsure it books a counsellor.</p></details>
      <details><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration.</p></details>
      <details><summary>Does it work with our tools?</summary><p>50+ native integrations plus API and webhooks.</p></details>
      <details><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access, audit trail.</p></details>
      <div class="closec">
        <h2>See your funnel in the app</h2>
        <p class="sub">A 30-minute demo on your courses and sources. Bring one real enquiry; watch the first 60 seconds live.</p>
        <div class="cta">
          <a class="btn b-o" href="#admission-form">Book a Demo</a>
          <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Keep exploring alone</a>
        </div>
      </div>
    </section>

    <section id="v6-more" aria-labelledby="v6more-h">
      <span class="tag">Everything else</span>
      <h2 id="v6more-h">Explore the platform</h2>
      <div class="cols">
        <div class="card"><h3>Products</h3>
          <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
          <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
          <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
          <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
          <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
        </div>
        <div class="card"><h3>Solutions</h3>
          <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
          <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
          <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
          <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
          <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
        </div>
        <div class="card"><h3>Resources</h3>
          <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a>
          <a href="<?php echo esc_url(home_url('/videos/')); ?>">Videos</a>
          <a href="<?php echo esc_url(home_url('/webinars/')); ?>">Webinars</a>
          <a href="<?php echo esc_url(home_url('/help/')); ?>">Help Centre</a>
          <a href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a>
        </div>
      </div>
      <?php $v6_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
      <?php if (!empty($v6_posts)): ?>
      <div class="blogr">
        <?php foreach ($v6_posts as $bp): ?>
        <a class="card" href="<?php echo esc_url(get_permalink($bp)); ?>">
          <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
          <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
          <span>Read &rarr;</span>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </section>
  </div>
</div>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
(function(){
  document.querySelectorAll('.eev6 .vc').forEach(function(b){
    b.addEventListener('click',function(){
      if(b.dataset.on) return; b.dataset.on='1';
      b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
    });
  });
  /* rail scrollspy */
  var links=[].slice.call(document.querySelectorAll('.eev6 .rail a[href^="#"]')).filter(function(a){return !a.classList.contains('cta');});
  var secs=links.map(function(a){return document.querySelector(a.getAttribute('href'));}).filter(Boolean);
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){
      es.forEach(function(e){
        if(!e.isIntersecting) return;
        links.forEach(function(a){a.classList.toggle('on',document.querySelector(a.getAttribute('href'))===e.target);});
      });
    },{rootMargin:'-30% 0px -60% 0px'});
    secs.forEach(function(s){io.observe(s);});
  }
})();
</script>
<?php get_footer(); ?>
