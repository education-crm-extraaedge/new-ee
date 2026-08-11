<?php
/**
 * Front Page v09 - "Pipeline Flow"
 * The journey language of pipeline-first CRMs: one continuous flow line
 * runs down the page, every section is a numbered station on the way
 * from enquiry to enrolment. Scroll = travel.
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
<!-- ee-front-v09 pipeline-flow -->
<main id="ee-main" class="eev9">
<style>
.eev9{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#131E31;--mut:#5A6B85;--line:rgba(25,51,93,.13);--soft:#F6F8FB;font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:#fff;line-height:1.6;display:block}
.eev9 *{box-sizing:border-box;margin:0;padding:0}
.eev9 img{max-width:100%;height:auto;display:block}
.eev9 a{text-decoration:none;color:inherit}
.eev9 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px;border-radius:5px}
.eev9 .wr{max-width:1060px;margin:0 auto;padding:0 22px}
.eev9 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:14px;border-radius:999px;padding:13px 24px;transition:.18s}
.eev9 .b-o{background:var(--o);color:#fff;box-shadow:0 14px 30px -12px rgba(222,110,48,.6)}
.eev9 .b-o:hover{background:var(--od)}
.eev9 .b-g{border:1.5px solid var(--line);color:var(--navy);background:#fff}
.eev9 .b-g:hover{border-color:var(--navy)}
/* the spine */
.eev9 .flow{position:relative}
.eev9 .flow::before{content:'';position:absolute;left:50%;top:0;bottom:0;width:3px;transform:translateX(-50%);background:linear-gradient(180deg,transparent,var(--o) 90px,var(--o) calc(100% - 90px),transparent);opacity:.35}
.eev9 .station{position:relative;padding:clamp(38px,5vw,64px) 0}
.eev9 .stno{position:relative;z-index:2;width:52px;height:52px;margin:0 auto 18px;border-radius:50%;background:#fff;border:3px solid var(--o);color:var(--od);display:grid;place-items:center;font-size:15px;font-weight:900;box-shadow:0 0 0 8px #fff}
.eev9 .sthead{text-align:center;max-width:720px;margin:0 auto}
.eev9 .stlbl{font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--od)}
.eev9 h2{margin-top:8px;font-size:clamp(22px,2.8vw,33px);font-weight:800;letter-spacing:-.024em;line-height:1.16;color:var(--navy)}
.eev9 .sub{margin-top:10px;color:var(--mut);font-size:14.5px}
.eev9 .sub b{color:var(--navy)}
.eev9 .stbody{position:relative;z-index:1;margin-top:24px}
/* hero */
.eev9 .hero{padding:clamp(52px,7vw,96px) 0 clamp(30px,4vw,50px);text-align:center;background:radial-gradient(60% 80% at 50% -20%,rgba(222,110,48,.1),transparent)}
.eev9 .k{display:inline-flex;font-size:11px;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:var(--od);background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.25);border-radius:999px;padding:7px 15px}
.eev9 h1{margin:18px auto 0;font-size:clamp(31px,4.6vw,56px);font-weight:900;letter-spacing:-.033em;line-height:1.06;color:var(--navy);max-width:20ch}
.eev9 h1 em{font-style:normal;color:var(--o)}
.eev9 .hero .lead{margin:16px auto 0;font-size:clamp(14.5px,1.5vw,17px);color:var(--mut);max-width:56ch}
.eev9 .hero .lead b{color:var(--navy)}
.eev9 .hero .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:26px}
.eev9 .hero .fine{margin-top:14px;font-size:12.5px;color:var(--mut);font-weight:600}
.eev9 .kpirow{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:28px}
.eev9 .kpi{background:#fff;border:1px solid var(--line);border-radius:14px;padding:13px 22px;box-shadow:0 14px 30px -18px rgba(25,51,93,.3)}
.eev9 .kpi b{display:block;font-size:20px;font-weight:900;color:var(--navy)}
.eev9 .kpi b i{font-style:normal;color:var(--o)}
.eev9 .kpi span{font-size:11px;color:var(--mut)}
/* cards used inside stations */
.eev9 .duo{display:grid;grid-template-columns:1fr 1fr;gap:16px;align-items:stretch}
.eev9 .trio{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.eev9 .card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:20px;box-shadow:0 18px 40px -26px rgba(25,51,93,.35)}
.eev9 .card h3{font-size:15px;font-weight:800;color:var(--navy)}
.eev9 .card p{margin-top:7px;font-size:13px;color:var(--mut)}
.eev9 .card p b{color:var(--navy)}
.eev9 .card img.pi{width:32px;height:32px;margin-bottom:10px}
@media(max-width:860px){.eev9 .duo,.eev9 .trio{grid-template-columns:1fr}}
/* mini ui */
.eev9 .mini{background:var(--soft);border:1px solid var(--line);border-radius:14px;padding:13px;display:grid;gap:8px;font-size:12.5px}
.eev9 .mini .r{display:flex;justify-content:space-between;align-items:center;gap:10px;background:#fff;border:1px solid var(--line);border-radius:10px;padding:9px 12px}
.eev9 .mini .r b{color:var(--navy);font-size:12.5px}
.eev9 .mini .r span{color:var(--mut);font-size:11px}
.eev9 .pill{flex:none;font-size:10px;font-weight:800;border-radius:999px;padding:4px 10px}
.eev9 .p-o{background:rgba(222,110,48,.12);color:var(--od)}
.eev9 .p-g{background:rgba(31,175,102,.12);color:#157A49}
/* logos */
.eev9 .lrow{display:flex;justify-content:center;flex-wrap:wrap;align-items:center;gap:24px 36px;margin-top:22px}
.eev9 .lrow img{height:28px;width:auto;opacity:.8}
/* stories */
.eev9 .vc{position:relative;border:1px solid var(--line);padding:0;background:#0F2040;border-radius:18px;overflow:hidden;aspect-ratio:16/10;cursor:pointer;width:100%;box-shadow:0 18px 40px -24px rgba(25,51,93,.4)}
.eev9 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev9 .vc .pb{position:absolute;left:50%;top:42%;transform:translate(-50%,-50%);width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.95);display:grid;place-items:center}
.eev9 .vc:hover .pb{background:var(--o)}
.eev9 .vc .pb svg{width:17px;height:17px;color:var(--navy);margin-left:2px}
.eev9 .vc:hover .pb svg{color:#fff}
.eev9 .vc .who{position:absolute;left:0;right:0;bottom:0;padding:22px 12px 10px;background:linear-gradient(transparent,rgba(10,20,40,.9));color:#fff;text-align:left}
.eev9 .vc .who b{display:block;font-size:12.5px}
.eev9 .vc .who span{font-size:10.5px;color:#C8D4E6}
.eev9 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
/* quote */
.eev9 .quote{background:var(--navy);border-radius:20px;color:#fff;padding:clamp(26px,4vw,44px);text-align:center}
.eev9 .quote blockquote{font-size:clamp(20px,2.8vw,30px);font-weight:800;letter-spacing:-.02em;line-height:1.3;max-width:30ch;margin:0 auto}
.eev9 .quote blockquote em{font-style:normal;color:#FFB98A}
.eev9 .quote p{margin-top:12px;color:#C4D2E8;font-size:13px}
/* table */
.eev9 .tblw{border:1px solid var(--line);border-radius:16px;overflow:auto;background:#fff}
.eev9 table{width:100%;border-collapse:collapse;font-size:13px;min-width:560px}
.eev9 th,.eev9 td{padding:11px 15px;border-bottom:1px solid var(--line);text-align:left}
.eev9 th{font-size:10px;letter-spacing:.11em;text-transform:uppercase;color:var(--mut);background:var(--soft)}
.eev9 td:first-child{font-weight:700;color:var(--navy)}
.eev9 tr:last-child td{border-bottom:0}
.eev9 .y{color:#157A49;font-weight:800}
.eev9 .n{color:#C43D3D}
/* chips */
.eev9 .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.eev9 .chip{font-size:11.5px;font-weight:700;color:var(--navy);background:var(--soft);border:1px solid var(--line);border-radius:999px;padding:6px 12px}
/* faq */
.eev9 details{border:1px solid var(--line);border-radius:14px;background:#fff;padding:0 17px;margin-top:10px}
.eev9 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:14px 0;font-weight:700;font-size:13.8px;color:var(--navy)}
.eev9 summary::-webkit-details-marker{display:none}
.eev9 summary::after{content:'+';color:var(--o);font-size:17px;transition:.15s}
.eev9 details[open] summary::after{transform:rotate(45deg)}
.eev9 details p{padding-bottom:14px;font-size:13px;color:var(--mut)}
/* terminus */
.eev9 .terminus{position:relative;z-index:1;background:linear-gradient(135deg,var(--navy),#22467C);border-radius:22px;color:#fff;padding:clamp(30px,4.5vw,54px);text-align:center}
.eev9 .terminus h2{color:#fff;margin-left:auto;margin-right:auto}
.eev9 .terminus .sub{color:#C4D2E8}
.eev9 .terminus .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:22px}
.eev9 .terminus .b-g{background:transparent;border-color:rgba(255,255,255,.35);color:#fff}
/* explore + blog */
.eev9 .cols{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.eev9 .cols .card a{display:block;padding:7px 0;font-size:13.3px;font-weight:600;color:var(--navy);border-bottom:1px dashed var(--line)}
.eev9 .cols .card a:hover{color:var(--od)}
.eev9 .cols .card a:last-child{border-bottom:0}
.eev9 .cols .card h3{font-size:10.5px;font-weight:800;letter-spacing:.13em;text-transform:uppercase;color:var(--od)}
@media(max-width:820px){.eev9 .cols{grid-template-columns:1fr}}
.eev9 .blogr{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.eev9 .blogr time{font-size:11px;color:var(--mut);font-weight:800}
.eev9 .blogr h3{margin-top:5px;font-size:14px;line-height:1.35}
.eev9 .blogr span{display:inline-block;margin-top:8px;font-size:12.5px;font-weight:800;color:var(--od)}
@media(max-width:860px){.eev9 .blogr{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.eev9 *{transition:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v9h1">
  <div class="wr">
    <span class="k">India's Intelligent Admissions Growth Platform</span>
    <h1 id="v9h1">One line from <em>enquiry</em> to <em>enrolment</em></h1>
    <p class="lead">This page is the journey your students take. Follow the orange line: at every station, Vidya AI and the CRM do the work a queue used to lose. <b>500+ institutions</b> run this pipeline daily.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Ride it live, no signup</a>
    </div>
    <p class="fine">4.7/5 from 320+ admission teams &middot; go-live in 7 days</p>
    <div class="kpirow">
      <div class="kpi"><b>60 <i>sec</i></b><span>first response</span></div>
      <div class="kpi"><b>Up to <i>40%</i></b><span>conversion lift</span></div>
      <div class="kpi"><b>10M<i>+</i></b><span>enquiries managed</span></div>
      <div class="kpi"><b>95%</b><span>counsellor adoption</span></div>
    </div>
  </div>
</section>

<div class="flow">
  <!-- STATION 1: capture -->
  <section class="station" aria-labelledby="v9s1">
    <div class="wr">
      <div class="stno" aria-hidden="true">1</div>
      <div class="sthead">
        <p class="stlbl">Station 1 &middot; capture</p>
        <h2 id="v9s1">Every source flows into one line</h2>
        <p class="sub">Meta, Google, portals, website, walk-ins: <b>50+ integrations</b> feed the pipeline automatically, deduplicated, one timeline per student. Nobody imports a spreadsheet again.</p>
      </div>
      <div class="stbody">
        <div class="lrow" aria-label="Institutions using ExtraaEdge">
          <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- STATION 2: respond -->
  <section class="station" aria-labelledby="v9s2" style="background:var(--soft)">
    <div class="wr">
      <div class="stno" aria-hidden="true">2</div>
      <div class="sthead">
        <p class="stlbl">Station 2 &middot; respond</p>
        <h2 id="v9s2">Sixty seconds, any hour, any language</h2>
        <p class="sub">The average office replies in about 6 hours; students shortlist in the first one. <b>VidyaGPT answers in 60 seconds</b>, 24x7, in 95+ languages, from your own brochure and fee rules.</p>
      </div>
      <div class="stbody duo">
        <div class="card">
          <h3>Sunday, 9:41 pm</h3>
          <div class="mini" style="margin-top:10px">
            <div class="r"><div><b>Enquiry in</b> <span>&middot; B.Sc, Instagram</span></div><span class="pill p-g">Answered 60s</span></div>
            <div class="r"><div><b>Callback booked</b> <span>&middot; tomorrow 11am</span></div><span class="pill p-o">Queued</span></div>
          </div>
        </div>
        <div class="card"><h3>Why this station matters most</h3><p>Removing the wait is the single biggest lever in the funnel: institutions measure <b>up to 90% faster response</b> and it compounds through every station below.</p></div>
      </div>
    </div>
  </section>

  <!-- STATION 3: qualify -->
  <section class="station" aria-labelledby="v9s3">
    <div class="wr">
      <div class="stno" aria-hidden="true">3</div>
      <div class="sthead">
        <p class="stlbl">Station 3 &middot; qualify</p>
        <h2 id="v9s3">The queue re-orders itself by intent</h2>
        <p class="sub"><b>VidyaPulse scores every conversation</b>; <b>VidyaAgents calls</b> the hot ones and books the counsellor. Mornings start with the readiest students on top, reasons shown, overrulable in a click.</p>
      </div>
      <div class="stbody duo">
        <div class="card">
          <h3>The 9:00 am queue</h3>
          <div class="mini" style="margin-top:10px">
            <div class="r"><div><b>Ananya S.</b> <span>&middot; scholarship x2, parent joined</span></div><span class="pill p-o">Hot 92 &middot; first</span></div>
            <div class="r"><div><b>Rahul M.</b> <span>&middot; fee page x3, quiet 2 days</span></div><span class="pill p-g">Warm &middot; nurture</span></div>
          </div>
        </div>
        <div class="card"><img class="pi" src="<?php echo esc_url($V.'vidya-ai.svg'); ?>" alt="" width="32" height="32"><h3>The Vidya AI layer</h3><p><b>VidyaGPT</b> answers &middot; <b>VidyaPulse</b> scores &middot; <b>VidyaAgents</b> calls. Three AI teammates, one handoff to a fully-briefed human.</p></div>
      </div>
    </div>
  </section>

  <!-- LIVE PLATFORM DEMO as station 4 -->
  <?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

  <!-- STATION 5: counsel + nurture -->
  <section class="station" aria-labelledby="v9s5">
    <div class="wr">
      <div class="stno" aria-hidden="true">5</div>
      <div class="sthead">
        <p class="stlbl">Station 5 &middot; counsel &amp; nurture</p>
        <h2 id="v9s5">Humans convince. Nothing lapses.</h2>
        <p class="sub">Counsellors open one screen with the whole story and spend calls convincing, not collecting. Sequences keep every thread alive; every promise becomes a task with an SLA. <b>95% counsellor adoption</b> is the proof it works for the team, not just the dashboard.</p>
      </div>
      <div class="stbody trio">
        <?php foreach ($STORIES as $s): ?>
        <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
          <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
          <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
          <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
        </button>
        <?php endforeach; ?>
      </div>
      <p style="text-align:center;margin-top:16px;font-size:13px"><a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>" style="color:var(--od);font-weight:800">View all customer stories &rarr;</a></p>
    </div>
  </section>

  <!-- STATION 6: enrol + measure -->
  <section class="station" aria-labelledby="v9s6" style="background:var(--soft)">
    <div class="wr">
      <div class="stno" aria-hidden="true">6</div>
      <div class="sthead">
        <p class="stlbl">Station 6 &middot; enrol &amp; measure</p>
        <h2 id="v9s6">Application, fee, and the report that re-aims next season</h2>
        <p class="sub">Forms, documents and fees on the same line, and analytics that trace every admission to its source, counsellor and cost. The pipeline ends in a decision, not a debate.</p>
      </div>
      <div class="stbody">
        <div class="quote">
          <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
          <p>Configuration, not customization: the pipeline is laid along your process, never across it.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STATION 7: fit (industries + compare + trust) -->
  <section class="station" aria-labelledby="v9s7">
    <div class="wr">
      <div class="stno" aria-hidden="true">7</div>
      <div class="sthead">
        <p class="stlbl">Station 7 &middot; will it fit?</p>
        <h2 id="v9s7">Your institution, your stack, your standards</h2>
      </div>
      <div class="stbody">
        <div class="trio">
          <div class="card"><h3>Every institution type</h3><div class="chips">
            <a class="chip" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>">Universities</a>
            <a class="chip" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>">K-12 Schools</a>
            <a class="chip" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>">Coaching</a>
            <a class="chip" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>">Study Abroad</a>
            <a class="chip" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>">EdTech</a>
            <a class="chip" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>">Vocational</a>
          </div></div>
          <div class="card"><h3>50+ integrations</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Portals</span><span class="chip">Telephony</span><span class="chip">WhatsApp API</span><span class="chip">Payments</span></div></div>
          <div class="card"><h3>Security &amp; compliance</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
        </div>
        <div class="tblw" style="margin-top:16px">
          <table>
            <thead><tr><th scope="col">The only AI-native Admissions Growth Platform</th><th scope="col">Meritto / LeadSquared</th><th scope="col">Generic CRMs</th><th scope="col">ExtraaEdge</th></tr></thead>
            <tbody>
              <tr><td>2am enquiry</td><td class="n">Waits</td><td class="n">Waits</td><td class="y">Answered in 60s</td></tr>
              <tr><td>Call order</td><td class="n">Newest first</td><td class="n">Newest first</td><td class="y">Intent first</td></tr>
              <tr><td>Go-live</td><td>Weeks to months</td><td class="n">Months</td><td class="y">7 days</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- STATION 8: board (go-live, pricing, faq) -->
  <section class="station" aria-labelledby="v9s8" style="background:var(--soft)">
    <div class="wr">
      <div class="stno" aria-hidden="true">8</div>
      <div class="sthead">
        <p class="stlbl">Station 8 &middot; boarding</p>
        <h2 id="v9s8">Seven days to departure</h2>
        <p class="sub">Switching from spreadsheets or a legacy CRM is part of boarding: data migrated and deduplicated, funnel configured to how your admissions already run. 14 days total with migration.</p>
      </div>
      <div class="stbody">
        <div class="trio">
          <div class="card"><h3>Day 1-2 &middot; Map</h3><p>Funnel, courses, sources and team captured.</p></div>
          <div class="card"><h3>Day 3-5 &middot; Configure &amp; migrate</h3><p>Pipeline laid along your funnel; data in, deduped.</p></div>
          <div class="card"><h3>Day 6-7 &middot; Go live</h3><p>Counsellors onboarded; first enquiry answered.</p></div>
        </div>
        <div class="duo" style="margin-top:16px">
          <a class="card" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM pricing &rarr;</h3><p>Capture, counselling, follow-ups, applications, fees, analytics.</p></a>
          <a class="card" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI pricing &rarr;</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on your funnel.</p></a>
        </div>
        <div style="margin-top:16px">
          <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting and the night shift; counsellors do the convincing. 95% of counsellors are active after go-live.</p></details>
          <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs; when unsure, it books a counsellor.</p></details>
          <details><summary>Does it work with our tools?</summary><p>50+ native integrations plus API and webhooks; enquiries flow in automatically.</p></details>
          <details><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access, audit trail.</p></details>
        </div>
      </div>
    </div>
  </section>

  <!-- TERMINUS -->
  <section class="station" aria-labelledby="v9end">
    <div class="wr">
      <div class="stno" aria-hidden="true">&#10003;</div>
      <div class="terminus">
        <h2 id="v9end">Terminus: your funnel, riding this line</h2>
        <p class="sub">A 30-minute demo lays the pipeline on your courses, sources and team. Bring one real enquiry; watch station 2 happen in 60 seconds, live.</p>
        <div class="cta">
          <a class="btn b-o" href="#admission-form">Book a Demo</a>
          <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the platform first</a>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- EXPLORE + BLOG (off the line, as the map legend) -->
<section aria-labelledby="v9explore" style="padding:clamp(34px,4.5vw,56px) 0">
  <div class="wr">
    <div class="sthead" style="text-align:left;max-width:none">
      <p class="stlbl">The route map</p>
      <h2 id="v9explore">Explore the platform</h2>
    </div>
    <div class="cols" style="margin-top:20px">
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
    <?php $v9_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
    <?php if (!empty($v9_posts)): ?>
    <div class="blogr" style="margin-top:16px">
      <?php foreach ($v9_posts as $bp): ?>
      <a class="card" href="<?php echo esc_url(get_permalink($bp)); ?>">
        <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
        <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
        <span>Read &rarr;</span>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
document.querySelectorAll('.eev9 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
