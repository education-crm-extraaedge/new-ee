<?php
/**
 * Front Page v04 - "Editorial"
 * The calm publishing language of premium fintech sites: numbered
 * chapters, oversized type, thin rules, one column of argument with
 * proof set like pull-quotes. Reads like a report, converts like a page.
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
<!-- ee-front-v04 editorial -->
<main id="ee-main" class="eev4">
<style>
.eev4{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#1B2434;--mut:#5A6B85;--line:rgba(25,51,93,.14);--wash:rgba(25,51,93,.035);font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:#fff;line-height:1.68;display:block}
.eev4 *{box-sizing:border-box;margin:0;padding:0}
.eev4 img{max-width:100%;height:auto;display:block}
.eev4 a{text-decoration:none;color:inherit}
.eev4 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px}
.eev4 .col{max-width:760px;margin:0 auto;padding:0 24px}
.eev4 .wide{max-width:1060px;margin:0 auto;padding:0 24px}
.eev4 .rule{height:1px;background:var(--line);margin:0 auto;max-width:1060px}
.eev4 .ch{font-size:11.5px;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:var(--od)}
.eev4 .ch::after{content:'';display:block;width:34px;height:2.5px;background:var(--o);margin-top:10px;border-radius:2px}
.eev4 h2{margin-top:18px;font-size:clamp(24px,3.2vw,40px);font-weight:800;letter-spacing:-.028em;line-height:1.14;color:var(--navy);max-width:24ch}
.eev4 .prose{margin-top:14px;font-size:clamp(15px,1.6vw,17.5px);color:#33415C;max-width:64ch}
.eev4 .prose b{color:var(--navy)}
.eev4 section{padding:clamp(46px,6.4vw,86px) 0}
.eev4 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:14.5px;transition:.2s}
.eev4 .b-o{background:var(--o);color:#fff;border-radius:999px;padding:15px 30px;box-shadow:0 16px 34px -14px rgba(222,110,48,.55)}
.eev4 .b-o:hover{background:var(--od);transform:translateY(-1px)}
.eev4 .b-t{color:var(--navy);border-bottom:2px solid var(--line);padding-bottom:3px}
.eev4 .b-t:hover{border-color:var(--o);color:var(--od)}
/* hero */
.eev4 .hero{padding:clamp(60px,9vw,120px) 0 clamp(40px,5vw,64px);background:linear-gradient(180deg,var(--wash),#fff 70%)}
.eev4 .issue{display:flex;justify-content:space-between;gap:14px;flex-wrap:wrap;font-size:11.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--mut);border-bottom:1px solid var(--line);padding-bottom:14px}
.eev4 h1{margin-top:clamp(24px,4vw,44px);font-size:clamp(36px,5.8vw,72px);font-weight:900;letter-spacing:-.04em;line-height:1.03;color:var(--navy);max-width:18ch}
.eev4 h1 em{font-style:normal;color:var(--o)}
.eev4 .stand{margin-top:22px;font-size:clamp(16px,1.9vw,20px);color:var(--mut);max-width:48ch;line-height:1.6}
.eev4 .stand b{color:var(--navy)}
.eev4 .hero .acts{margin-top:30px;display:flex;align-items:center;gap:22px;flex-wrap:wrap}
.eev4 .hero .fine{margin-top:18px;font-size:12.5px;color:var(--mut);font-weight:600}
/* figures */
.eev4 .figure{border:1px solid var(--line);border-radius:4px;overflow:hidden;background:#fff}
.eev4 .figure figcaption{padding:10px 16px;border-top:1px solid var(--line);font-size:11.5px;color:var(--mut);letter-spacing:.03em}
.eev4 .figure figcaption b{color:var(--navy)}
.eev4 .numbers{display:grid;grid-template-columns:repeat(4,1fr)}
.eev4 .numbers div{padding:22px 18px;border-left:1px solid var(--line)}
.eev4 .numbers div:first-child{border-left:0}
.eev4 .numbers b{display:block;font-size:clamp(22px,2.6vw,32px);font-weight:900;color:var(--navy);letter-spacing:-.02em;font-variant-numeric:tabular-nums}
.eev4 .numbers b i{font-style:normal;color:var(--o)}
.eev4 .numbers span{font-size:11.5px;color:var(--mut)}
@media(max-width:720px){.eev4 .numbers{grid-template-columns:1fr 1fr}.eev4 .numbers div:nth-child(odd){border-left:0}}
/* logos as a footnote line */
.eev4 .lrow{display:flex;align-items:center;gap:28px 40px;flex-wrap:wrap;margin-top:22px}
.eev4 .lrow img{height:30px;width:auto;opacity:.75;filter:grayscale(35%)}
/* chapter list rows */
.eev4 .rows{margin-top:26px;border-top:1px solid var(--line)}
.eev4 .rows .r{display:grid;grid-template-columns:70px 1fr 1.1fr;gap:18px;padding:20px 0;border-bottom:1px solid var(--line);align-items:baseline}
.eev4 .rows .n{font-size:12px;font-weight:900;color:var(--od);font-variant-numeric:tabular-nums}
.eev4 .rows h3{font-size:16.5px;font-weight:800;color:var(--navy)}
.eev4 .rows h3 span{display:block;font-size:12.5px;font-weight:600;color:var(--mut);margin-top:3px}
.eev4 .rows p{font-size:14px;color:#33415C}
.eev4 .rows p b{color:var(--navy)}
@media(max-width:820px){.eev4 .rows .r{grid-template-columns:44px 1fr}.eev4 .rows p{grid-column:2}}
/* suite as annotated list */
.eev4 .slist{margin-top:26px;display:grid;gap:0;border-top:1px solid var(--line)}
.eev4 .slist .s{display:grid;grid-template-columns:52px 1fr auto;gap:16px;align-items:center;padding:18px 0;border-bottom:1px solid var(--line)}
.eev4 .slist img{width:36px;height:36px}
.eev4 .slist h3{font-size:16px;font-weight:800;color:var(--navy)}
.eev4 .slist h3 span{display:block;font-size:13px;font-weight:600;color:var(--mut);margin-top:2px}
.eev4 .slist em{font-style:normal;font-size:11px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--od);white-space:nowrap}
@media(max-width:640px){.eev4 .slist .s{grid-template-columns:44px 1fr}.eev4 .slist em{display:none}}
/* pull-quote proof */
.eev4 .pull{background:var(--navy);color:#fff}
.eev4 .pull blockquote{font-size:clamp(22px,3.2vw,36px);font-weight:800;letter-spacing:-.025em;line-height:1.28;max-width:26ch}
.eev4 .pull blockquote em{font-style:normal;color:#FFB98A}
.eev4 .pull .by{margin-top:16px;color:#C4D2E8;font-size:13px}
/* stories: one feature + two footnotes */
.eev4 .feature{display:grid;grid-template-columns:1.15fr .85fr;gap:clamp(22px,4vw,52px);align-items:center;margin-top:26px}
.eev4 .vc{position:relative;border:0;padding:0;background:#0F2040;border-radius:4px;overflow:hidden;aspect-ratio:16/9;cursor:pointer;width:100%}
.eev4 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev4 .vc .pb{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:62px;height:62px;border-radius:50%;background:rgba(255,255,255,.95);display:grid;place-items:center}
.eev4 .vc:hover .pb{background:var(--o)}
.eev4 .vc .pb svg{width:20px;height:20px;color:var(--navy);margin-left:2px}
.eev4 .vc:hover .pb svg{color:#fff}
.eev4 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.eev4 .feature blockquote{font-size:clamp(16px,1.9vw,20px);font-weight:700;color:var(--navy);line-height:1.55}
.eev4 .feature footer{margin-top:12px;font-size:13px;color:var(--mut);font-weight:600}
.eev4 .fnotes{margin-top:22px;display:grid;grid-template-columns:1fr 1fr;gap:0;border-top:1px solid var(--line)}
.eev4 .fnote{display:flex;gap:14px;align-items:center;padding:16px 18px 16px 0;border-bottom:1px solid var(--line)}
.eev4 .fnote:nth-child(2){border-left:1px solid var(--line);padding-left:18px}
.eev4 .fnote img{width:66px;height:44px;object-fit:cover;border-radius:3px}
.eev4 .fnote b{display:block;font-size:13px;color:var(--navy)}
.eev4 .fnote span{font-size:11.5px;color:var(--mut)}
.eev4 .fnote a{margin-left:auto;font-size:12px;font-weight:800;color:var(--od);white-space:nowrap}
@media(max-width:840px){.eev4 .feature{grid-template-columns:1fr}.eev4 .fnotes{grid-template-columns:1fr}.eev4 .fnote:nth-child(2){border-left:0;padding-left:0}}
/* table set like a report exhibit */
.eev4 .exh table{width:100%;border-collapse:collapse;font-size:13.5px;min-width:600px}
.eev4 .exh th,.eev4 .exh td{padding:12px 16px;border-bottom:1px solid var(--line);text-align:left}
.eev4 .exh th{font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.eev4 .exh td:first-child{font-weight:700;color:var(--navy)}
.eev4 .exh .y{color:#157A49;font-weight:800}
.eev4 .exh .n{color:#C43D3D}
.eev4 .exh .scroll{overflow-x:auto}
/* margin-note pairs */
.eev4 .pair{display:grid;grid-template-columns:1fr 1fr;gap:clamp(20px,3.5vw,44px);margin-top:26px}
.eev4 .pair .p h3{font-size:16px;font-weight:800;color:var(--navy)}
.eev4 .pair .p p{margin-top:8px;font-size:14px;color:#33415C}
.eev4 .tags{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.eev4 .tags span{font-size:11.5px;font-weight:700;color:var(--navy);border:1px solid var(--line);border-radius:3px;padding:6px 11px;background:var(--wash)}
@media(max-width:760px){.eev4 .pair{grid-template-columns:1fr}}
/* timeline strip */
.eev4 .steps{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border:1px solid var(--line);border-radius:4px;overflow:hidden;margin-top:26px}
.eev4 .steps div{padding:20px;border-left:1px solid var(--line)}
.eev4 .steps div:first-child{border-left:0}
.eev4 .steps .d{font-size:10.5px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--od)}
.eev4 .steps h3{margin-top:6px;font-size:15px;font-weight:800;color:var(--navy)}
.eev4 .steps p{margin-top:6px;font-size:13px;color:var(--mut)}
@media(max-width:760px){.eev4 .steps{grid-template-columns:1fr}.eev4 .steps div{border-left:0;border-top:1px solid var(--line)}.eev4 .steps div:first-child{border-top:0}}
/* pricing lines */
.eev4 .plines{margin-top:26px;border-top:1px solid var(--line)}
.eev4 .plines a{display:grid;grid-template-columns:1fr auto;gap:14px;align-items:center;padding:20px 0;border-bottom:1px solid var(--line);transition:.15s}
.eev4 .plines a:hover h3{color:var(--od)}
.eev4 .plines h3{font-size:17px;font-weight:800;color:var(--navy);transition:.15s}
.eev4 .plines p{margin-top:4px;font-size:13.5px;color:var(--mut)}
.eev4 .plines i{font-style:normal;color:var(--o);font-weight:900;font-size:18px}
/* faq */
.eev4 details{border-bottom:1px solid var(--line)}
.eev4 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:baseline;padding:17px 0;font-weight:700;font-size:15px;color:var(--navy)}
.eev4 summary::-webkit-details-marker{display:none}
.eev4 summary::after{content:'+';color:var(--o);font-size:19px;font-weight:600;transition:.2s}
.eev4 details[open] summary::after{transform:rotate(45deg)}
.eev4 details p{padding-bottom:17px;font-size:14px;color:#33415C;max-width:64ch}
/* close */
.eev4 .close{text-align:center;padding:clamp(56px,8vw,104px) 0}
.eev4 .close h2{margin:16px auto 0;max-width:20ch}
.eev4 .close .prose{margin-left:auto;margin-right:auto}
.eev4 .close .acts{margin-top:30px;display:flex;justify-content:center;align-items:center;gap:22px;flex-wrap:wrap}
/* explore + blog condensed as an index page */
.eev4 .index{display:grid;grid-template-columns:repeat(3,1fr);gap:clamp(18px,3vw,40px);margin-top:26px}
.eev4 .index h3{font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--od);border-bottom:1px solid var(--line);padding-bottom:9px}
.eev4 .index a{display:block;padding:8px 0;font-size:14px;font-weight:600;color:var(--navy);border-bottom:1px dashed var(--line)}
.eev4 .index a:hover{color:var(--od)}
@media(max-width:820px){.eev4 .index{grid-template-columns:1fr}}
.eev4 .blogl{margin-top:26px;border-top:1px solid var(--line)}
.eev4 .blogl a{display:grid;grid-template-columns:110px 1fr auto;gap:16px;align-items:baseline;padding:16px 0;border-bottom:1px solid var(--line)}
.eev4 .blogl time{font-size:12px;color:var(--mut);font-weight:700;font-variant-numeric:tabular-nums}
.eev4 .blogl h3{font-size:15.5px;font-weight:800;color:var(--navy);line-height:1.35}
.eev4 .blogl a:hover h3{color:var(--od)}
.eev4 .blogl i{font-style:normal;color:var(--o);font-weight:900}
@media(max-width:640px){.eev4 .blogl a{grid-template-columns:1fr auto}.eev4 .blogl time{display:none}}
@media(prefers-reduced-motion:reduce){.eev4 *{transition:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v4h1">
  <div class="wide">
    <div class="issue"><span>ExtraaEdge &middot; on admissions</span><span>India's Intelligent Admissions Growth Platform</span></div>
    <h1 id="v4h1">The admission office, <em>re-argued</em> from first principles</h1>
    <p class="stand">Five chapters on why enquiries leak, what an AI layer changes, and the evidence from <b>500+ institutions</b> and <b>10M+ managed enquiries</b>. Four minutes to read; one demo to verify.</p>
    <div class="acts">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-t" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Or open the live platform &rarr;</a>
    </div>
    <p class="fine">Rated 4.7/5 by 320+ admission teams &middot; go-live in 7 days</p>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- CH I: THE NUMBERS -->
<section aria-labelledby="v4n">
  <div class="wide">
    <p class="ch">Chapter I &middot; the numbers</p>
    <h2 id="v4n">What changes, measured</h2>
    <figure class="figure" style="margin-top:24px">
      <div class="numbers" role="region" aria-label="Key outcomes">
        <div><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
        <div><b>Up to <i>40%</i></b><span>conversion lift</span></div>
        <div><b>Up to <i>90%</i></b><span>faster response</span></div>
        <div><b>95%</b><span>counsellor adoption</span></div>
      </div>
      <figcaption>Exhibit A &middot; measured across institutions after switching; <b>baselines decide exact figures</b>, the demo maps yours.</figcaption>
    </figure>
    <div class="lrow" aria-label="Institutions using ExtraaEdge">
      <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
    </div>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- CH II: THE LEAKS -->
<section aria-labelledby="v4why">
  <div class="wide">
    <p class="ch">Chapter II &middot; the diagnosis</p>
    <h2 id="v4why">Funnels do not lose leads. They lose time.</h2>
    <div class="rows">
      <div class="r"><span class="n">II.1</span><h3>The overnight queue<span>Enquiries arrive at 9pm; replies at 10am</span></h3><p><b>VidyaGPT answers in 60 seconds</b>, any hour, in 95+ languages, from your own brochure and fee rules.</p></div>
      <div class="r"><span class="n">II.2</span><h3>The lapsed follow-up<span>The third follow-up never happens</span></h3><p>Sequences with SLAs and escalations; every promise becomes a task. <b>Nothing rides on memory.</b></p></div>
      <div class="r"><span class="n">II.3</span><h3>The blind meeting<span>Spend cannot be traced to admissions</span></h3><p>Funnel, source ROI and counsellor analytics, live. <b>Cost per admission on one screen.</b></p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- CH III: THE AI LAYER -->
<section aria-labelledby="v4suite">
  <div class="wide">
    <p class="ch">Chapter III &middot; the mechanism</p>
    <h2 id="v4suite">Vidya AI, in three verbs</h2>
    <p class="prose">Not a chatbot bolted onto a database: an AI layer that runs the first hour of every enquiry, then hands a fully-briefed conversation to a human.</p>
    <div class="slist">
      <div class="s"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt=""><h3>VidyaGPT answers<span>24x7 on WhatsApp and chat, from approved content only; escalates instead of guessing</span></h3><em>Second 0-10</em></div>
      <div class="s"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt=""><h3>VidyaPulse qualifies<span>Scores intent from the conversation and orders the queue hot-first, reasons shown</span></h3><em>Second 10-40</em></div>
      <div class="s"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt=""><h3>VidyaAgents connects<span>Calls, confirms interest and books the counsellor; your team's first dial is warm</span></h3><em>Second 40-60</em></div>
    </div>
  </div>
</section>

<!-- PULL QUOTE: architect -->
<section class="pull" aria-label="Working principle">
  <div class="wide">
    <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
    <p class="by">Configuration, not customization: the working principle behind every implementation.</p>
  </div>
</section>

<!-- CH IV: THE WITNESSES -->
<section aria-labelledby="v4st">
  <div class="wide">
    <p class="ch">Chapter IV &middot; the witnesses</p>
    <h2 id="v4st">What our clients are saying</h2>
    <div class="feature">
      <button class="vc" data-yt="<?php echo esc_attr($STORIES[0][0]); ?>" aria-label="Play customer story: <?php echo esc_attr($STORIES[0][1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($STORIES[0][0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($STORIES[0][1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </button>
      <blockquote>
        &ldquo;ExtraaEdge is an incredibly dynamic and trustworthy platform that truly understands our needs.&rdquo;
        <footer><?php echo esc_html($STORIES[0][1]); ?>, <?php echo esc_html($STORIES[0][2]); ?></footer>
      </blockquote>
    </div>
    <div class="fnotes">
      <?php foreach (array_slice($STORIES,1) as $s): ?>
      <div class="fnote">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="66" height="44">
        <span><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
        <a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>">Watch &rarr;</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- CH V: THE COMPARISON -->
<section aria-labelledby="v4cmp">
  <div class="wide">
    <p class="ch">Chapter V &middot; the alternatives</p>
    <h2 id="v4cmp">Exhibit B: against the legacy CRMs</h2>
    <figure class="figure exh" style="margin-top:24px">
      <div class="scroll">
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
      <figcaption>Exhibit B &middot; the queue is the difference: legacy tools organise it, the <b>only AI-native Admissions Growth Platform</b> removes it.</figcaption>
    </figure>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- APPENDIX A: industries + integrations + security -->
<section aria-labelledby="v4app">
  <div class="wide">
    <p class="ch">Appendix A &middot; fit</p>
    <h2 id="v4app">For your kind of institution, inside your stack</h2>
    <div class="pair">
      <div class="p">
        <h3>Every institution type</h3>
        <div class="tags">
          <a href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><span>Universities &amp; Colleges</span></a>
          <a href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><span>K-12 Schools</span></a>
          <a href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><span>Coaching &amp; Test Prep</span></a>
          <a href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><span>Study Abroad</span></a>
          <a href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><span>EdTech</span></a>
          <a href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><span>Vocational</span></a>
        </div>
      </div>
      <div class="p">
        <h3>50+ integrations, certified handling</h3>
        <p>Meta, Google, portals, telephony, WhatsApp Business API and payments feed the funnel automatically. ISO 27001 certified, GDPR compliant, role-based access, India data residency.</p>
      </div>
    </div>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- APPENDIX B: go-live + pricing -->
<section aria-labelledby="v4go">
  <div class="wide">
    <p class="ch">Appendix B &middot; logistics</p>
    <h2 id="v4go">Seven days to live. Fourteen with migration.</h2>
    <p class="prose">Switching from spreadsheets or a legacy CRM is part of the same run; data is migrated and deduplicated, and the platform arrives configured to your funnel.</p>
    <div class="steps">
      <div><span class="d">Day 1-2</span><h3>Map</h3><p>Funnel, courses, sources and team captured.</p></div>
      <div><span class="d">Day 3-5</span><h3>Configure &amp; migrate</h3><p>Platform set around your funnel; data in, deduped.</p></div>
      <div><span class="d">Day 6-7</span><h3>Go live</h3><p>Counsellors onboarded; first enquiry answered.</p></div>
    </div>
    <div class="plines" style="max-width:760px">
      <a href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><span><h3>Education CRM pricing</h3><p>Sized to team, volume and modules; exact quote in one call.</p></span><i>&rarr;</i></a>
      <a href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><span><h3>Vidya AI pricing</h3><p>The AI layer on top of your funnel.</p></span><i>&rarr;</i></a>
    </div>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- FAQ -->
<section aria-labelledby="v4faq">
  <div class="wide">
    <p class="ch">Notes &amp; queries</p>
    <h2 id="v4faq">Asked in every first meeting</h2>
    <div style="margin-top:20px;max-width:820px">
      <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. 95% of counsellors are actively using the platform after go-live.</p></details>
      <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs. When unsure, it books a counsellor instead of improvising.</p></details>
      <details><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration, configured around your existing process.</p></details>
      <details><summary>Does it work with our existing tools?</summary><p>50+ native integrations: Meta, Google, portals, telephony and payments, plus API and webhooks.</p></details>
      <details><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, with role-based access and a full audit trail.</p></details>
    </div>
  </div>
</section>

<!-- CLOSE -->
<section class="close" aria-labelledby="v4close" style="background:linear-gradient(180deg,#fff,var(--wash))">
  <div class="wide">
    <p class="ch" style="display:inline-block">The last page</p>
    <h2 id="v4close">Verify the argument on <span style="color:var(--o)">your funnel</span></h2>
    <p class="prose">A 30-minute demo: your courses, your sources, one real enquiry through Vidya AI, live. The projection in writing.</p>
    <div class="acts">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-t" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the platform alone &rarr;</a>
    </div>
  </div>
</section>
<div class="rule" role="presentation"></div>

<!-- INDEX: explore -->
<section aria-labelledby="v4index">
  <div class="wide">
    <p class="ch">Index</p>
    <h2 id="v4index">Everything else, by page</h2>
    <div class="index">
      <div><h3>Products</h3>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div><h3>Solutions</h3>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div><h3>Resources</h3>
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
<?php $v4_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v4_posts)): ?>
<div class="rule" role="presentation"></div>
<section aria-labelledby="v4blog">
  <div class="wide">
    <p class="ch">Recently published</p>
    <h2 id="v4blog">From the blog</h2>
    <div class="blogl">
      <?php foreach ($v4_posts as $bp): ?>
      <a href="<?php echo esc_url(get_permalink($bp)); ?>">
        <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
        <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
        <i>&rarr;</i>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
document.querySelectorAll('.eev4 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
