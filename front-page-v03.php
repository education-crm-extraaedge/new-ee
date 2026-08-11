<?php
/**
 * Front Page v03 - "Data Grid"
 * The structured, table-native language of modern data CRMs: visible
 * gridlines, cells, tags and tabular numbers. The page reads like a
 * well-kept workspace, because that is what the product sells.
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
  array($L.'higher%20education/bharati-vidyapeeth-deemed-univ-pune-logo.svg','Bharati Vidyapeeth'),
  array($L.'higher%20education/mit-art-design-and-tech-university-logo.svg','MIT ADT University'),
);
$STORIES = array(
  array('3SHgLf1GFgk','Silky Jain Marwah',"Executive Director, Tula's Institute"),
  array('yfK83D2SKps','K. Nirmala Devi','Assistant Manager, Indian Academy Group'),
  array('dWLdQ8E3FOU','Pranay Rupani','Head of Admissions, Annapurna College'),
);
?>
<!-- ee-front-v03 data-grid -->
<main id="ee-main" class="eev3">
<style>
.eev3{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#101827;--mut:#5A6B85;--line:#DCE3EE;--soft:#F7F9FC;font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:#fff;line-height:1.6;display:block}
.eev3 *{box-sizing:border-box;margin:0;padding:0}
.eev3 img{max-width:100%;height:auto;display:block}
.eev3 a{text-decoration:none;color:inherit}
.eev3 :focus-visible{outline:2.5px solid var(--o);outline-offset:2px}
.eev3 .wr{max-width:1140px;margin:0 auto;padding:0 22px}
.eev3 .frame{border:1px solid var(--line);border-radius:14px;overflow:hidden;background:#fff}
.eev3 .fh{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:11px 16px;background:var(--soft);border-bottom:1px solid var(--line)}
.eev3 .fh b{font-size:12px;font-weight:800;color:var(--navy);letter-spacing:.02em}
.eev3 .fh .tag{font-size:10px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--od);background:rgba(222,110,48,.09);border:1px solid rgba(222,110,48,.25);border-radius:5px;padding:3px 8px}
.eev3 section{padding:clamp(34px,4.6vw,58px) 0}
.eev3 h2{font-size:clamp(21px,2.7vw,31px);font-weight:800;letter-spacing:-.022em;line-height:1.2;color:var(--navy)}
.eev3 .sub{margin-top:8px;color:var(--mut);font-size:14px;max-width:64ch}
.eev3 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:13.8px;border-radius:9px;padding:11px 20px;border:1px solid transparent;transition:.15s}
.eev3 .b-o{background:var(--o);color:#fff}
.eev3 .b-o:hover{background:var(--od)}
.eev3 .b-g{border-color:var(--line);color:var(--navy);background:#fff}
.eev3 .b-g:hover{border-color:var(--navy)}
.eev3 .cellgrid{display:grid;border:1px solid var(--line);border-radius:14px;overflow:hidden}
.eev3 .cell{padding:20px;border-top:1px solid var(--line);border-left:1px solid var(--line);background:#fff}
/* hero */
.eev3 .hero{padding:clamp(40px,5.5vw,72px) 0 clamp(26px,3.5vw,44px);background:linear-gradient(180deg,var(--soft),#fff)}
.eev3 .crumbs{font-size:11px;font-weight:700;color:var(--mut);letter-spacing:.02em}
.eev3 .crumbs b{color:var(--od)}
.eev3 h1{margin-top:12px;font-size:clamp(30px,4.4vw,52px);font-weight:900;letter-spacing:-.032em;line-height:1.07;color:var(--navy);max-width:22ch}
.eev3 h1 em{font-style:normal;color:var(--o)}
.eev3 .hero .lead{margin-top:14px;font-size:clamp(14.5px,1.4vw,16.5px);color:var(--mut);max-width:60ch}
.eev3 .hero .lead b{color:var(--navy)}
.eev3 .hero .cta{display:flex;gap:10px;flex-wrap:wrap;margin-top:22px}
.eev3 .sheet{margin-top:clamp(26px,3.6vw,40px)}
.eev3 .sheet table{width:100%;border-collapse:collapse;font-size:12.8px;min-width:640px}
.eev3 .sheet th,.eev3 .sheet td{padding:10px 14px;border-bottom:1px solid var(--line);border-left:1px solid var(--line);text-align:left;white-space:nowrap}
.eev3 .sheet th:first-child,.eev3 .sheet td:first-child{border-left:0}
.eev3 .sheet th{font-size:10px;letter-spacing:.1em;text-transform:uppercase;color:var(--mut);background:var(--soft)}
.eev3 .sheet td b{color:var(--navy)}
.eev3 .sheet tr:last-child td{border-bottom:0}
.eev3 .sheet .scroll{overflow-x:auto}
.eev3 .pill{font-size:10.5px;font-weight:800;border-radius:5px;padding:3px 8px}
.eev3 .p-hot{background:rgba(222,110,48,.12);color:var(--od)}
.eev3 .p-ok{background:rgba(31,175,102,.12);color:#157A49}
.eev3 .p-n{background:var(--soft);color:var(--mut);border:1px solid var(--line)}
.eev3 .num{font-variant-numeric:tabular-nums}
/* metric cells */
.eev3 .kpis{grid-template-columns:repeat(4,1fr)}
.eev3 .kpis .cell b{display:block;font-size:clamp(20px,2.3vw,27px);font-weight:900;color:var(--navy);font-variant-numeric:tabular-nums}
.eev3 .kpis .cell b i{font-style:normal;color:var(--o)}
.eev3 .kpis .cell span{font-size:11.5px;color:var(--mut)}
@media(max-width:760px){.eev3 .kpis{grid-template-columns:1fr 1fr}}
/* logo cells */
.eev3 .logocells{grid-template-columns:repeat(4,1fr)}
.eev3 .logocells .cell{display:grid;place-items:center;min-height:76px}
.eev3 .logocells img{height:28px;width:auto;opacity:.85}
@media(max-width:760px){.eev3 .logocells{grid-template-columns:1fr 1fr}}
/* why : three-column cells */
.eev3 .why3{grid-template-columns:repeat(3,1fr)}
.eev3 .why3 .cell .k{font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--od)}
.eev3 .why3 .cell h3{margin-top:6px;font-size:15px;font-weight:800;color:var(--navy)}
.eev3 .why3 .cell p{margin-top:6px;font-size:13px;color:var(--mut)}
.eev3 .why3 .cell p b{color:var(--navy)}
@media(max-width:820px){.eev3 .why3{grid-template-columns:1fr}}
/* suite table */
.eev3 .suitetbl td img{width:22px;height:22px}
.eev3 .suitetbl td .pr{display:flex;align-items:center;gap:9px;font-weight:800;color:var(--navy)}
/* stories */
.eev3 .st .row{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border:1px solid var(--line);border-radius:14px;overflow:hidden}
.eev3 .vc{position:relative;border:0;border-left:1px solid var(--line);padding:0;background:#0F2040;aspect-ratio:16/10;cursor:pointer;width:100%}
.eev3 .vc:first-child{border-left:0}
.eev3 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev3 .vc .pb{position:absolute;left:50%;top:40%;transform:translate(-50%,-50%);width:48px;height:48px;border-radius:50%;background:rgba(255,255,255,.95);display:grid;place-items:center}
.eev3 .vc:hover .pb{background:var(--o)}
.eev3 .vc .pb svg{width:16px;height:16px;color:var(--navy);margin-left:2px}
.eev3 .vc:hover .pb svg{color:#fff}
.eev3 .vc .who{position:absolute;left:0;right:0;bottom:0;background:#fff;border-top:1px solid var(--line);padding:9px 12px;text-align:left}
.eev3 .vc .who b{display:block;font-size:12.5px;color:var(--navy)}
.eev3 .vc .who span{font-size:11px;color:var(--mut)}
.eev3 .vc iframe{position:absolute;inset:0;width:100%;height:calc(100% - 46px);border:0}
@media(max-width:860px){.eev3 .st .row{grid-template-columns:1fr}.eev3 .vc{border-left:0;border-top:1px solid var(--line)}.eev3 .vc:first-child{border-top:0}}
/* quote row */
.eev3 .arch .frame{background:var(--navy);border-color:var(--navy)}
.eev3 .arch blockquote{padding:clamp(26px,4vw,44px);color:#fff;font-size:clamp(19px,2.6vw,29px);font-weight:800;letter-spacing:-.02em;line-height:1.35;max-width:34ch}
.eev3 .arch blockquote em{font-style:normal;color:#FFB98A}
.eev3 .arch .byline{padding:12px 20px;border-top:1px solid rgba(255,255,255,.16);color:#C4D2E8;font-size:12px}
/* industries grid */
.eev3 .indgrid{grid-template-columns:repeat(3,1fr)}
.eev3 .indgrid a.cell{display:flex;justify-content:space-between;align-items:center;gap:10px;transition:.15s}
.eev3 .indgrid a.cell:hover{background:var(--soft)}
.eev3 .indgrid b{font-size:13.5px;color:var(--navy)}
.eev3 .indgrid span{display:block;font-size:11.5px;color:var(--mut)}
.eev3 .indgrid i{font-style:normal;color:var(--o);font-weight:800}
@media(max-width:820px){.eev3 .indgrid{grid-template-columns:1fr}}
/* compare uses .sheet */
.eev3 .y{color:#157A49;font-weight:800}
.eev3 .n{color:#C43D3D}
/* trust cells */
.eev3 .duo{grid-template-columns:1fr 1fr}
.eev3 .chips{display:flex;flex-wrap:wrap;gap:7px;margin-top:10px}
.eev3 .chip{font-size:11px;font-weight:700;color:var(--navy);background:var(--soft);border:1px solid var(--line);border-radius:6px;padding:5px 10px}
@media(max-width:760px){.eev3 .duo{grid-template-columns:1fr}}
/* go-live: 3 cells */
.eev3 .track{grid-template-columns:repeat(3,1fr)}
.eev3 .track .cell .d{font-size:10px;font-weight:800;letter-spacing:.1em;color:var(--od);text-transform:uppercase}
.eev3 .track .cell h3{margin-top:5px;font-size:14.5px;font-weight:800;color:var(--navy)}
.eev3 .track .cell p{margin-top:5px;font-size:12.8px;color:var(--mut)}
@media(max-width:820px){.eev3 .track{grid-template-columns:1fr}}
/* pricing + faq + explore + blog reuse frames */
.eev3 .pricegrid{grid-template-columns:1fr 1fr}
.eev3 .pricegrid a.cell:hover{background:var(--soft)}
.eev3 .pricegrid h3{font-size:15px;font-weight:800;color:var(--navy)}
.eev3 .pricegrid p{margin-top:5px;font-size:12.8px;color:var(--mut)}
.eev3 .pricegrid span{display:inline-block;margin-top:10px;font-size:12.5px;font-weight:800;color:var(--od)}
@media(max-width:680px){.eev3 .pricegrid{grid-template-columns:1fr}}
.eev3 details{border-bottom:1px solid var(--line);padding:0 16px;background:#fff}
.eev3 details:last-child{border-bottom:0}
.eev3 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:14px 0;font-weight:700;font-size:13.8px;color:var(--navy)}
.eev3 summary::-webkit-details-marker{display:none}
.eev3 summary::after{content:'+';color:var(--o);font-size:17px;transition:.15s}
.eev3 details[open] summary::after{transform:rotate(45deg)}
.eev3 details p{padding-bottom:14px;font-size:13px;color:var(--mut)}
.eev3 .cols{grid-template-columns:repeat(3,1fr)}
.eev3 .cols .cell h3{font-size:10.5px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--od);margin-bottom:8px}
.eev3 .cols .cell a{display:block;padding:7px 0;font-size:13px;font-weight:600;color:var(--navy);border-bottom:1px dashed var(--line)}
.eev3 .cols .cell a:hover{color:var(--od)}
.eev3 .cols .cell a:last-child{border-bottom:0}
@media(max-width:820px){.eev3 .cols{grid-template-columns:1fr}}
.eev3 .bloggrid{grid-template-columns:repeat(3,1fr)}
.eev3 .bloggrid a.cell:hover{background:var(--soft)}
.eev3 .bloggrid time{font-size:11px;color:var(--mut);font-weight:700}
.eev3 .bloggrid h3{margin-top:5px;font-size:14px;font-weight:800;color:var(--navy);line-height:1.35}
.eev3 .bloggrid span{display:inline-block;margin-top:8px;font-size:12.5px;font-weight:800;color:var(--od)}
@media(max-width:860px){.eev3 .bloggrid{grid-template-columns:1fr}}
/* close */
.eev3 .close .frame{background:var(--navy);border-color:var(--navy);text-align:center;padding:clamp(30px,4.5vw,52px) 22px}
.eev3 .close h2{color:#fff}
.eev3 .close .sub{color:#C4D2E8;margin-left:auto;margin-right:auto}
.eev3 .close .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:22px}
.eev3 .close .b-g{background:transparent;border-color:rgba(255,255,255,.35);color:#fff}
@media(prefers-reduced-motion:reduce){.eev3 *{transition:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v3h1">
  <div class="wr">
    <p class="crumbs">Workspace / Admissions / <b>Live</b></p>
    <h1 id="v3h1">Your whole admission funnel, <em>kept like a ledger</em></h1>
    <p class="lead">ExtraaEdge is <b>India's Intelligent Admissions Growth Platform</b>: every enquiry captured, answered by Vidya AI in 60 seconds, scored, assigned and traced to enrolment. One workspace, no spreadsheets, used by 500+ institutions.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Open the live workspace</a>
    </div>
    <div class="frame sheet">
      <div class="fh"><b>enquiries &middot; today</b><span class="tag">sample data</span></div>
      <div class="scroll">
      <table aria-label="Example of the enquiry workspace">
        <thead><tr><th>Student</th><th>Source</th><th>First response</th><th>Intent</th><th>Next step</th></tr></thead>
        <tbody>
          <tr><td><b>Ananya S.</b> &middot; B.Tech</td><td>Instagram</td><td class="num">60 sec &middot; VidyaGPT</td><td><span class="pill p-hot">Hot 92</span></td><td>Counsellor call 9:10</td></tr>
          <tr><td><b>Rahul M.</b> &middot; MBA</td><td>Portal</td><td class="num">58 sec &middot; VidyaGPT</td><td><span class="pill p-n">Warm 61</span></td><td>Day-2 nurture running</td></tr>
          <tr><td><b>Ishita K.</b> &middot; B.Com</td><td>Website</td><td class="num">61 sec &middot; VidyaGPT</td><td><span class="pill p-ok">Scored</span></td><td>Deduped &middot; merged</td></tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</section>

<!-- KPIs -->
<section aria-label="Key outcomes" style="padding-top:0">
  <div class="wr">
    <div class="cellgrid kpis">
      <div class="cell"><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
      <div class="cell"><b>Up to <i>40%</i></b><span>conversion lift</span></div>
      <div class="cell"><b>10M<i>+</i></b><span>enquiries managed</span></div>
      <div class="cell"><b>95%</b><span>counsellor adoption</span></div>
    </div>
  </div>
</section>

<!-- LOGOS -->
<section aria-labelledby="v3logos" style="padding-top:0">
  <div class="wr">
    <h2 id="v3logos">Trusted by 500+ institutions</h2>
    <div class="cellgrid logocells" style="margin-top:18px">
      <?php foreach ($LOGOS as $lg): ?><div class="cell"><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"></div><?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY -->
<section aria-labelledby="v3why">
  <div class="wr">
    <h2 id="v3why">Three leaks, closed in one workspace</h2>
    <div class="cellgrid why3" style="margin-top:18px">
      <div class="cell"><span class="k">Leak 01 &middot; response</span><h3>The overnight queue</h3><p>Enquiries at 9pm wait till Monday. <b>VidyaGPT answers in 60 seconds</b>, 24x7, in 95+ languages.</p></div>
      <div class="cell"><span class="k">Leak 02 &middot; follow-up</span><h3>The lapsed callback</h3><p>Every promise becomes a task with an SLA and escalation. <b>Nothing rides on memory.</b></p></div>
      <div class="cell"><span class="k">Leak 03 &middot; visibility</span><h3>The untraceable spend</h3><p>Funnel, source ROI and counsellor analytics live. <b>Cost per admission on screen.</b></p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- SUITE as a table -->
<section aria-labelledby="v3suite">
  <div class="wr">
    <h2 id="v3suite">Vidya AI: the layer working every row</h2>
    <div class="frame sheet suitetbl" style="margin-top:18px">
      <div class="fh"><b>ai-layer &middot; processes</b><span class="tag">always on</span></div>
      <div class="scroll">
      <table aria-label="The three Vidya AI products">
        <thead><tr><th>Process</th><th>Runs</th><th>What it does</th><th>Effect</th></tr></thead>
        <tbody>
          <tr><td><span class="pr"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="">VidyaGPT</span></td><td class="num">24x7</td><td>Answers on WhatsApp and chat from your approved content</td><td><span class="pill p-ok">No enquiry waits</span></td></tr>
          <tr><td><span class="pr"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="">VidyaPulse</span></td><td class="num">Every message</td><td>Scores intent and orders the queue, reasons shown</td><td><span class="pill p-hot">Hot first</span></td></tr>
          <tr><td><span class="pr"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="">VidyaAgents</span></td><td class="num">On hot leads</td><td>Calls, confirms interest, books the counsellor slot</td><td><span class="pill p-ok">Warm handoffs</span></td></tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</section>

<!-- STORIES -->
<section class="st" aria-labelledby="v3st">
  <div class="wr">
    <h2 id="v3st">What our clients are saying</h2>
    <div class="row" style="margin-top:18px">
      <?php foreach ($STORIES as $s): ?>
      <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
      </button>
      <?php endforeach; ?>
    </div>
    <p style="margin-top:14px;font-size:13px"><a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>" style="color:var(--od);font-weight:800">View all customer stories &rarr;</a></p>
  </div>
</section>

<!-- ARCHITECT -->
<section class="arch" aria-label="Working principle">
  <div class="wr">
    <div class="frame">
      <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
      <div class="byline">Configuration, not customization &middot; applied on every implementation</div>
    </div>
  </div>
</section>

<!-- INDUSTRIES -->
<section aria-labelledby="v3ind">
  <div class="wr">
    <h2 id="v3ind">Views for every kind of institution</h2>
    <div class="cellgrid indgrid" style="margin-top:18px">
      <a class="cell" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><span><b>Universities &amp; Colleges</b><span>multi-campus, multi-course</span></span><i>&rarr;</i></a>
      <a class="cell" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><span><b>K-12 Schools</b><span>parent-led journeys</span></span><i>&rarr;</i></a>
      <a class="cell" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><span><b>Coaching &amp; Test Prep</b><span>high volume, fast cycles</span></span><i>&rarr;</i></a>
      <a class="cell" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><span><b>Study Abroad</b><span>document-heavy pipelines</span></span><i>&rarr;</i></a>
      <a class="cell" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><span><b>EdTech</b><span>digital-first enrolment</span></span><i>&rarr;</i></a>
      <a class="cell" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><span><b>Vocational</b><span>rolling intakes</span></span><i>&rarr;</i></a>
    </div>
  </div>
</section>

<!-- COMPARE -->
<section aria-labelledby="v3cmp">
  <div class="wr">
    <h2 id="v3cmp">The comparison, kept honest</h2>
    <p class="sub">Legacy CRMs organise the queue. The only AI-native Admissions Growth Platform removes it.</p>
    <div class="frame sheet" style="margin-top:18px">
      <div class="fh"><b>compare &middot; platforms</b><span class="tag">4 columns</span></div>
      <div class="scroll">
      <table>
        <thead><tr><th>Question</th><th>Meritto / LeadSquared</th><th>Generic CRMs</th><th>ExtraaEdge</th></tr></thead>
        <tbody>
          <tr><td><b>2am enquiry</b></td><td class="n">Waits</td><td class="n">Waits</td><td class="y">Answered in 60s</td></tr>
          <tr><td><b>Call order</b></td><td class="n">Newest first</td><td class="n">Newest first</td><td class="y">Intent first</td></tr>
          <tr><td><b>Built for</b></td><td>Education, pre-AI</td><td class="n">Sales pipelines</td><td class="y">AI-native admissions</td></tr>
          <tr><td><b>Go-live</b></td><td>Weeks to months</td><td class="n">Months</td><td class="y">7 days</td></tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</section>

<!-- TRUST -->
<section aria-labelledby="v3trust">
  <div class="wr">
    <h2 id="v3trust">Connected to your stack. Sealed around your data.</h2>
    <div class="cellgrid duo" style="margin-top:18px">
      <div class="cell"><h3 style="font-size:15px;font-weight:800;color:var(--navy)">50+ integrations</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payments</span><span class="chip">API &amp; webhooks</span></div></div>
      <div class="cell"><h3 style="font-size:15px;font-weight:800;color:var(--navy)">Security &amp; compliance</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
    </div>
  </div>
</section>

<!-- GO-LIVE -->
<section aria-labelledby="v3go">
  <div class="wr">
    <h2 id="v3go">Live in 7 days. Switching and migration included.</h2>
    <p class="sub">14 days total with data migration; your funnel, courses and sources configured to how your admissions already run.</p>
    <div class="cellgrid track" style="margin-top:18px">
      <div class="cell"><span class="d">Day 1-2</span><h3>Map your funnel</h3><p>Stages, courses, sources, team and rules captured in one workshop.</p></div>
      <div class="cell"><span class="d">Day 3-5</span><h3>Configure and migrate</h3><p>Workspace set around your funnel; data imported and deduplicated.</p></div>
      <div class="cell"><span class="d">Day 6-7</span><h3>Go live</h3><p>Counsellors onboarded; Vidya AI answers its first enquiry.</p></div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section aria-labelledby="v3price">
  <div class="wr">
    <h2 id="v3price">Pricing, quoted to your volumes</h2>
    <div class="cellgrid pricegrid" style="margin-top:18px;max-width:760px">
      <a class="cell" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM</h3><p>Capture, counselling, follow-ups, applications, fees, analytics.</p><span>CRM pricing &rarr;</span></a>
      <a class="cell" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on your funnel.</p><span>Vidya AI pricing &rarr;</span></a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section aria-labelledby="v3faq">
  <div class="wr">
    <h2 id="v3faq">Questions, answered in one screen</h2>
    <div class="frame" style="margin-top:18px;max-width:840px">
      <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. 95% of counsellors are active after go-live.</p></details>
      <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs; it books a counsellor when unsure.</p></details>
      <details><summary>How long is implementation?</summary><p>7 days standard, 14 with migration, configured around your existing process.</p></details>
      <details><summary>Does it work with our tools?</summary><p>50+ native integrations: Meta, Google, portals, telephony, payments, plus API and webhooks.</p></details>
      <details><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access and a full audit trail.</p></details>
    </div>
  </div>
</section>

<!-- CLOSE -->
<section class="close" aria-labelledby="v3close">
  <div class="wr">
    <div class="frame">
      <h2 id="v3close">Add your funnel to the workspace</h2>
      <p class="sub">A 30-minute demo on your courses and sources. Bring one real enquiry; watch the first 60 seconds happen.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the platform first</a>
      </div>
    </div>
  </div>
</section>

<!-- EXPLORE -->
<section aria-labelledby="v3explore" style="padding-top:0">
  <div class="wr">
    <h2 id="v3explore">Explore</h2>
    <div class="cellgrid cols" style="margin-top:18px">
      <div class="cell"><h3>Products</h3>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div class="cell"><h3>Solutions</h3>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div class="cell"><h3>Resources</h3>
        <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a>
        <a href="<?php echo esc_url(home_url('/videos/')); ?>">Videos</a>
        <a href="<?php echo esc_url(home_url('/webinars/')); ?>">Webinars</a>
        <a href="<?php echo esc_url(home_url('/help/')); ?>">Help Centre</a>
        <a href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a>
      </div>
    </div>
  </div>
</section>

<!-- BLOG -->
<?php $v3_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v3_posts)): ?>
<section aria-labelledby="v3blog" style="padding-top:0">
  <div class="wr">
    <h2 id="v3blog">Latest entries</h2>
    <div class="cellgrid bloggrid" style="margin-top:18px">
      <?php foreach ($v3_posts as $bp): ?>
      <a class="cell" href="<?php echo esc_url(get_permalink($bp)); ?>">
        <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
        <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
        <span>Read &rarr;</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
document.querySelectorAll('.eev3 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    var w=b.querySelector('.who');
    b.insertAdjacentHTML('afterbegin','<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>');
    b.querySelectorAll('img,.pb').forEach(function(x){x.remove();});
  });
});
</script>
<?php get_footer(); ?>
