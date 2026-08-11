<?php
/**
 * Front Page v08 - "Blueprint"
 * The drawing-office language of the Architect Mindset: a faint grid
 * across the page, figure numbers, dashed annotation frames and
 * measured captions. The brand's deepest idea, made literal.
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
<!-- ee-front-v08 blueprint -->
<main id="ee-main" class="eev8">
<style>
.eev8{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#152238;--mut:#5A6B85;--bline:rgba(25,51,93,.10);--dash:rgba(25,51,93,.35);font-family:'Inter',system-ui,sans-serif;color:var(--ink);line-height:1.6;display:block;background:#FBFCFE;background-image:linear-gradient(var(--bline) 1px,transparent 1px),linear-gradient(90deg,var(--bline) 1px,transparent 1px);background-size:44px 44px}
.eev8 *{box-sizing:border-box;margin:0;padding:0}
.eev8 img{max-width:100%;height:auto;display:block}
.eev8 a{text-decoration:none;color:inherit}
.eev8 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px}
.eev8 .wr{max-width:1100px;margin:0 auto;padding:0 22px}
.eev8 section{padding:clamp(38px,5vw,64px) 0}
.eev8 .fig{font-size:10.5px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--od)}
.eev8 .fig::before{content:'\2014 '}
.eev8 h2{margin-top:10px;font-size:clamp(22px,2.8vw,33px);font-weight:800;letter-spacing:-.024em;line-height:1.16;color:var(--navy);max-width:28ch}
.eev8 .sub{margin-top:10px;color:var(--mut);font-size:14.5px;max-width:62ch}
.eev8 .sub b{color:var(--navy)}
.eev8 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:14px;border-radius:6px;padding:13px 24px;transition:.18s}
.eev8 .b-o{background:var(--o);color:#fff;box-shadow:4px 4px 0 rgba(25,51,93,.25)}
.eev8 .b-o:hover{background:var(--od);transform:translate(-1px,-1px);box-shadow:5px 5px 0 rgba(25,51,93,.25)}
.eev8 .b-g{border:1.5px solid var(--navy);color:var(--navy);background:#fff}
.eev8 .b-g:hover{background:rgba(25,51,93,.05)}
.eev8 .sheet{background:#fff;border:1.5px solid var(--navy);border-radius:2px;box-shadow:6px 6px 0 rgba(25,51,93,.12);position:relative}
.eev8 .sheet .cap{display:flex;justify-content:space-between;gap:12px;padding:9px 16px;border-bottom:1.5px solid var(--navy);font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--navy);background:rgba(25,51,93,.04)}
.eev8 .sheet .cap i{font-style:normal;color:var(--od)}
.eev8 .dashed{border:1.5px dashed var(--dash);border-radius:2px;padding:18px;background:rgba(255,255,255,.8)}
.eev8 .note{font-size:11.5px;color:var(--mut);margin-top:10px}
.eev8 .note b{color:var(--navy)}
/* hero */
.eev8 .hero{padding:clamp(52px,7vw,96px) 0 clamp(30px,4vw,48px)}
.eev8 .stamp{display:inline-flex;align-items:center;gap:10px;border:1.5px solid var(--navy);border-radius:2px;padding:8px 14px;font-size:10.5px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--navy);background:#fff;transform:rotate(-1deg)}
.eev8 .stamp i{font-style:normal;color:var(--od)}
.eev8 h1{margin-top:20px;font-size:clamp(31px,4.6vw,56px);font-weight:900;letter-spacing:-.033em;line-height:1.06;color:var(--navy);max-width:20ch}
.eev8 h1 em{font-style:normal;color:var(--o)}
.eev8 .hero .lead{margin-top:16px;font-size:clamp(14.5px,1.5vw,17px);color:var(--mut);max-width:56ch}
.eev8 .hero .lead b{color:var(--navy)}
.eev8 .hero .cta{display:flex;gap:12px;flex-wrap:wrap;margin-top:24px}
.eev8 .hero .fine{margin-top:14px;font-size:12.5px;color:var(--mut);font-weight:600}
/* drawing: funnel diagram */
.eev8 .draw{margin-top:clamp(26px,4vw,42px)}
.eev8 .draw .bd{padding:22px;display:grid;gap:10px}
.eev8 .stage{display:grid;grid-template-columns:130px 1fr auto;gap:12px;align-items:center;font-size:12.8px}
.eev8 .stage .nm{font-weight:800;color:var(--navy);font-size:12px}
.eev8 .stage .bar{height:26px;border:1.5px solid var(--navy);border-radius:2px;position:relative;background:#fff;overflow:hidden}
.eev8 .stage .bar i{position:absolute;inset:0;background:repeating-linear-gradient(45deg,rgba(222,110,48,.35) 0 6px,rgba(222,110,48,.15) 6px 12px);font-style:normal}
.eev8 .stage .an{font-size:11px;font-weight:800;color:var(--od);white-space:nowrap}
.eev8 .stage.s1 .bar i{width:100%}.eev8 .stage.s2 .bar i{width:100%}.eev8 .stage.s3 .bar i{width:78%}.eev8 .stage.s4 .bar i{width:52%}
@media(max-width:640px){.eev8 .stage{grid-template-columns:90px 1fr}.eev8 .stage .an{display:none}}
/* measures */
.eev8 .meas{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:22px}
.eev8 .meas .dashed{text-align:center}
.eev8 .meas b{display:block;font-size:clamp(21px,2.4vw,28px);font-weight:900;color:var(--navy);font-variant-numeric:tabular-nums}
.eev8 .meas b i{font-style:normal;color:var(--o)}
.eev8 .meas span{font-size:11px;color:var(--mut)}
@media(max-width:760px){.eev8 .meas{grid-template-columns:1fr 1fr}}
/* logos */
.eev8 .lrow{display:flex;flex-wrap:wrap;align-items:center;gap:22px 34px;padding:18px 22px}
.eev8 .lrow img{height:28px;width:auto;opacity:.85}
/* why annotations */
.eev8 .ann{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev8 .ann .dashed h3{font-size:15px;font-weight:800;color:var(--navy);display:flex;gap:8px;align-items:baseline}
.eev8 .ann .dashed h3 i{font-style:normal;font-size:10.5px;color:var(--od);font-weight:900}
.eev8 .ann .dashed p{margin-top:7px;font-size:13px;color:var(--mut)}
.eev8 .ann .dashed p b{color:var(--navy)}
@media(max-width:860px){.eev8 .ann{grid-template-columns:1fr}}
/* suite spec table */
.eev8 .spec table{width:100%;border-collapse:collapse;font-size:13px;min-width:560px}
.eev8 .spec th,.eev8 .spec td{padding:11px 15px;border-bottom:1px solid rgba(25,51,93,.15);text-align:left}
.eev8 .spec th{font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.eev8 .spec td:first-child{font-weight:800;color:var(--navy)}
.eev8 .spec tr:last-child td{border-bottom:0}
.eev8 .spec .pr{display:flex;align-items:center;gap:9px}
.eev8 .spec .pr img{width:22px;height:22px}
.eev8 .spec .scroll{overflow-x:auto}
.eev8 .y{color:#157A49;font-weight:800}
.eev8 .n{color:#C43D3D}
/* stories */
.eev8 .vrow{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev8 .vc{position:relative;border:1.5px solid var(--navy);padding:0;background:#0F2040;border-radius:2px;overflow:hidden;aspect-ratio:16/10;cursor:pointer;width:100%;box-shadow:5px 5px 0 rgba(25,51,93,.12)}
.eev8 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev8 .vc .pb{position:absolute;left:50%;top:40%;transform:translate(-50%,-50%);width:50px;height:50px;border-radius:50%;background:#fff;border:1.5px solid var(--navy);display:grid;place-items:center}
.eev8 .vc:hover .pb{background:var(--o);border-color:var(--o)}
.eev8 .vc .pb svg{width:17px;height:17px;color:var(--navy);margin-left:2px}
.eev8 .vc:hover .pb svg{color:#fff}
.eev8 .vc .who{position:absolute;left:0;right:0;bottom:0;background:#fff;border-top:1.5px solid var(--navy);padding:8px 12px;text-align:left}
.eev8 .vc .who b{display:block;font-size:12.3px;color:var(--navy)}
.eev8 .vc .who span{font-size:10.5px;color:var(--mut)}
.eev8 .vc iframe{position:absolute;inset:0;width:100%;height:calc(100% - 44px);border:0}
@media(max-width:860px){.eev8 .vrow{grid-template-columns:1fr}}
/* the master quote: title block of the drawing */
.eev8 .title-block{background:var(--navy);color:#fff;border:1.5px solid var(--navy);box-shadow:6px 6px 0 rgba(25,51,93,.2)}
.eev8 .title-block .in{padding:clamp(26px,4vw,44px)}
.eev8 .title-block blockquote{font-size:clamp(21px,3vw,32px);font-weight:800;letter-spacing:-.02em;line-height:1.3;max-width:28ch}
.eev8 .title-block blockquote em{font-style:normal;color:#FFB98A}
.eev8 .title-block .sig{margin-top:16px;display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:#AFC1DD;border-top:1px dashed rgba(255,255,255,.3);padding-top:12px}
/* industries plots */
.eev8 .plots{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev8 .plots a{border:1.5px solid var(--navy);border-radius:2px;background:#fff;padding:16px 18px;display:flex;justify-content:space-between;align-items:center;gap:10px;transition:.15s;box-shadow:3px 3px 0 rgba(25,51,93,.1)}
.eev8 .plots a:hover{transform:translate(-1px,-1px);box-shadow:4px 4px 0 rgba(25,51,93,.15)}
.eev8 .plots b{font-size:13.5px;color:var(--navy)}
.eev8 .plots span{display:block;font-size:11.5px;color:var(--mut)}
.eev8 .plots i{font-style:normal;color:var(--o);font-weight:900}
@media(max-width:860px){.eev8 .plots{grid-template-columns:1fr}}
/* chips */
.eev8 .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.eev8 .chip{font-size:11.5px;font-weight:700;color:var(--navy);background:#fff;border:1px solid var(--dash);border-radius:2px;padding:6px 11px}
.eev8 .g2{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:22px}
@media(max-width:820px){.eev8 .g2{grid-template-columns:1fr}}
.eev8 .g2 h3{font-size:15px;font-weight:800;color:var(--navy)}
/* schedule */
.eev8 .sched{margin-top:22px}
.eev8 .sched .row{display:grid;grid-template-columns:110px 1fr;gap:14px;padding:13px 18px;border-bottom:1px dashed var(--dash);font-size:13px;align-items:baseline}
.eev8 .sched .row:last-child{border-bottom:0}
.eev8 .sched .d{font-size:11px;font-weight:900;color:var(--od);letter-spacing:.08em;text-transform:uppercase}
.eev8 .sched b{color:var(--navy)}
.eev8 .sched p{color:var(--mut);font-size:12.8px}
/* faq */
.eev8 details{border:1.5px dashed var(--dash);border-radius:2px;background:#fff;padding:0 16px;margin-top:10px}
.eev8 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:14px 0;font-weight:700;font-size:13.8px;color:var(--navy)}
.eev8 summary::-webkit-details-marker{display:none}
.eev8 summary::after{content:'+';color:var(--o);font-size:17px;transition:.15s}
.eev8 details[open] summary::after{transform:rotate(45deg)}
.eev8 details p{padding-bottom:14px;font-size:13px;color:var(--mut)}
/* close + explore + blog */
.eev8 .closec{text-align:center;padding:clamp(28px,4vw,48px) 22px}
.eev8 .closec h2{margin-left:auto;margin-right:auto}
.eev8 .closec .sub{margin-left:auto;margin-right:auto}
.eev8 .closec .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:22px}
.eev8 .cols{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev8 .cols .dashed h3{font-size:10.5px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--od);margin-bottom:8px}
.eev8 .cols .dashed a{display:block;padding:7px 0;font-size:13.3px;font-weight:600;color:var(--navy);border-bottom:1px dashed var(--bline)}
.eev8 .cols .dashed a:hover{color:var(--od)}
.eev8 .cols .dashed a:last-child{border-bottom:0}
@media(max-width:820px){.eev8 .cols{grid-template-columns:1fr}}
.eev8 .blogr{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev8 .blogr a{border:1.5px solid var(--navy);border-radius:2px;background:#fff;padding:18px;box-shadow:3px 3px 0 rgba(25,51,93,.1);transition:.15s}
.eev8 .blogr a:hover{transform:translate(-1px,-1px)}
.eev8 .blogr time{font-size:11px;color:var(--mut);font-weight:800}
.eev8 .blogr h3{margin-top:5px;font-size:14px;font-weight:800;color:var(--navy);line-height:1.35}
.eev8 .blogr span{display:inline-block;margin-top:8px;font-size:12.5px;font-weight:800;color:var(--od)}
@media(max-width:860px){.eev8 .blogr{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.eev8 *{transition:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v8h1">
  <div class="wr">
    <span class="stamp">Drawing No. <i>EE-2026</i> &middot; India's Intelligent Admissions Growth Platform</span>
    <h1 id="v8h1">Your funnel, <em>re-drawn</em> by people who measure twice</h1>
    <p class="lead">We do not sell a template. We study how your admissions actually run, then configure the platform around it: <b>Vidya AI answering in 60 seconds</b>, follow-ups that never lapse, and a funnel traced end to end. Built this way for <b>500+ institutions</b>.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Inspect the live platform</a>
    </div>
    <p class="fine">Rated 4.7/5 by 320+ admission teams &middot; go-live in 7 days</p>
    <figure class="sheet draw" aria-label="Diagram of the admission funnel with the repaired stages marked">
      <div class="cap"><span>Fig. 01 &middot; the admission funnel, as found / as repaired</span><i>scale: one season</i></div>
      <div class="bd">
        <div class="stage s1"><span class="nm">Enquiries in</span><div class="bar"><i></i></div><span class="an">100% &middot; all sources captured</span></div>
        <div class="stage s2"><span class="nm">Answered</span><div class="bar"><i></i></div><span class="an">100% &middot; Vidya AI, 60 sec</span></div>
        <div class="stage s3"><span class="nm">Counselled</span><div class="bar"><i></i></div><span class="an">intent-first order</span></div>
        <div class="stage s4"><span class="nm">Enrolled</span><div class="bar"><i></i></div><span class="an">up to 40% lift vs baseline</span></div>
      </div>
    </figure>
  </div>
</section>

<!-- MEASURES + LOGOS -->
<section aria-labelledby="v8meas" style="padding-top:0">
  <div class="wr">
    <p class="fig" id="v8meas">Fig. 02 &middot; site measurements</p>
    <div class="meas">
      <div class="dashed"><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
      <div class="dashed"><b>10M<i>+</i></b><span>enquiries managed</span></div>
      <div class="dashed"><b>95%</b><span>counsellor adoption</span></div>
      <div class="dashed"><b>Up to <i>90%</i></b><span>faster response</span></div>
    </div>
    <div class="sheet" style="margin-top:22px">
      <div class="cap"><span>Fig. 03 &middot; commissioned by 500+ institutions</span><i>a sample</i></div>
      <div class="lrow">
        <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- WHY -->
<section aria-labelledby="v8why">
  <div class="wr">
    <p class="fig">Fig. 04 &middot; defects found on survey</p>
    <h2 id="v8why">Three structural leaks, one repair</h2>
    <div class="ann">
      <div class="dashed"><h3><i>A.</i> The overnight queue</h3><p>Enquiries at 9pm wait till Monday. Repair: <b>VidyaGPT answers in 60 seconds</b>, in 95+ languages, from your own brochure.</p></div>
      <div class="dashed"><h3><i>B.</i> The lapsed follow-up</h3><p>The third follow-up never happens. Repair: sequences with SLAs and escalations; <b>nothing rides on memory</b>.</p></div>
      <div class="dashed"><h3><i>C.</i> The blind meeting</h3><p>Spend cannot be traced to admissions. Repair: live funnel, source-ROI and counsellor analytics; <b>cost per admission on screen</b>.</p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- SUITE -->
<section aria-labelledby="v8suite">
  <div class="wr">
    <p class="fig">Fig. 05 &middot; the AI layer, specification</p>
    <h2 id="v8suite">Vidya AI, to spec</h2>
    <div class="sheet spec" style="margin-top:20px">
      <div class="cap"><span>Component schedule</span><i>3 units</i></div>
      <div class="scroll">
      <table>
        <thead><tr><th scope="col">Component</th><th scope="col">Duty</th><th scope="col">Behaviour</th></tr></thead>
        <tbody>
          <tr><td><span class="pr"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="">VidyaGPT</span></td><td>24x7 chat</td><td>Answers from approved content only; escalates instead of guessing</td></tr>
          <tr><td><span class="pr"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="">VidyaPulse</span></td><td>Intent scoring</td><td>Orders the queue hot-first; reasons shown; overrulable in one click</td></tr>
          <tr><td><span class="pr"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="">VidyaAgents</span></td><td>AI calling</td><td>Confirms interest by phone and books the counsellor slot</td></tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</section>

<!-- STORIES -->
<section aria-labelledby="v8st">
  <div class="wr">
    <p class="fig">Fig. 06 &middot; site visits</p>
    <h2 id="v8st">What our clients are saying</h2>
    <div class="vrow">
      <?php foreach ($STORIES as $s): ?>
      <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
      </button>
      <?php endforeach; ?>
    </div>
    <p class="note"><b>Full archive:</b> <a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>" style="color:var(--od);font-weight:800">all customer stories &rarr;</a></p>
  </div>
</section>

<!-- ARCHITECT: the title block -->
<section aria-label="Working principle">
  <div class="wr">
    <div class="title-block">
      <div class="in">
        <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
        <div class="sig"><span>Principle &middot; configuration, not customization</span><span>Checked on every build</span></div>
      </div>
    </div>
  </div>
</section>

<!-- INDUSTRIES -->
<section aria-labelledby="v8ind">
  <div class="wr">
    <p class="fig">Fig. 07 &middot; building types served</p>
    <h2 id="v8ind">Drawn for every kind of institution</h2>
    <div class="plots">
      <a href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><span><b>Universities &amp; Colleges</b><span>multi-campus, multi-course</span></span><i>&rarr;</i></a>
      <a href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><span><b>K-12 Schools</b><span>parent-led journeys</span></span><i>&rarr;</i></a>
      <a href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><span><b>Coaching &amp; Test Prep</b><span>high volume, fast cycles</span></span><i>&rarr;</i></a>
      <a href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><span><b>Study Abroad</b><span>document-heavy pipelines</span></span><i>&rarr;</i></a>
      <a href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><span><b>EdTech</b><span>digital-first enrolment</span></span><i>&rarr;</i></a>
      <a href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><span><b>Vocational</b><span>rolling intakes</span></span><i>&rarr;</i></a>
    </div>
  </div>
</section>

<!-- COMPARE -->
<section aria-labelledby="v8cmp">
  <div class="wr">
    <p class="fig">Fig. 08 &middot; materials comparison</p>
    <h2 id="v8cmp">The only AI-native Admissions Growth Platform</h2>
    <div class="sheet spec" style="margin-top:20px">
      <div class="cap"><span>Tested against alternatives</span><i>4 checks</i></div>
      <div class="scroll">
      <table>
        <thead><tr><th scope="col">Check</th><th scope="col">Meritto / LeadSquared</th><th scope="col">Generic CRMs</th><th scope="col">ExtraaEdge</th></tr></thead>
        <tbody>
          <tr><td>2am enquiry</td><td class="n">Fails &middot; waits</td><td class="n">Fails &middot; waits</td><td class="y">Passes &middot; 60s</td></tr>
          <tr><td>Call order</td><td class="n">Newest first</td><td class="n">Newest first</td><td class="y">Intent first</td></tr>
          <tr><td>Built for</td><td>Education, pre-AI</td><td class="n">Sales pipelines</td><td class="y">AI-native admissions</td></tr>
          <tr><td>Go-live</td><td>Weeks to months</td><td class="n">Months</td><td class="y">7 days</td></tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</section>

<!-- TRUST -->
<section aria-labelledby="v8trust">
  <div class="wr">
    <p class="fig">Fig. 09 &middot; services &amp; safety</p>
    <h2 id="v8trust">Connected to your stack. Certified on your data.</h2>
    <div class="g2">
      <div class="dashed"><h3>50+ integrations</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payments</span><span class="chip">API &amp; webhooks</span></div></div>
      <div class="dashed"><h3>Security &amp; compliance</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
    </div>
  </div>
</section>

<!-- GO-LIVE + PRICING -->
<section aria-labelledby="v8go">
  <div class="wr">
    <p class="fig">Fig. 10 &middot; construction schedule</p>
    <h2 id="v8go">Seven days from survey to occupancy</h2>
    <div class="sheet sched">
      <div class="cap"><span>Work schedule &middot; switching &amp; migration included</span><i>7-14 days</i></div>
      <div class="row"><span class="d">Day 1-2</span><span><b>Survey.</b> <p style="display:inline">Funnel, courses, sources and team mapped.</p></span></div>
      <div class="row"><span class="d">Day 3-5</span><span><b>Build.</b> <p style="display:inline">Platform configured; data migrated and deduplicated.</p></span></div>
      <div class="row"><span class="d">Day 6-7</span><span><b>Handover.</b> <p style="display:inline">Counsellors onboarded; Vidya AI answers its first enquiry.</p></span></div>
    </div>
    <div class="g2">
      <a class="dashed" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM pricing &rarr;</h3><p class="note" style="margin-top:6px">Sized to team, volume and modules; exact quote in one call.</p></a>
      <a class="dashed" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI pricing &rarr;</h3><p class="note" style="margin-top:6px">The AI layer on top of your funnel.</p></a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section aria-labelledby="v8faq">
  <div class="wr">
    <p class="fig">Fig. 11 &middot; queries from the client</p>
    <h2 id="v8faq">Answered before the meeting</h2>
    <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. 95% of counsellors are active after go-live.</p></details>
    <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs; when unsure, it books a counsellor.</p></details>
    <details><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration, configured around your existing process.</p></details>
    <details><summary>Does it work with our tools?</summary><p>50+ native integrations plus API and webhooks; enquiries flow in automatically.</p></details>
    <details><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access, full audit trail.</p></details>
  </div>
</section>

<!-- CLOSE -->
<section aria-labelledby="v8close">
  <div class="wr">
    <div class="sheet closec">
      <div class="cap"><span>Fig. 12 &middot; next revision</span><i>yours</i></div>
      <h2 id="v8close" style="margin-top:18px">Bring the site plan. We draw your funnel live.</h2>
      <p class="sub">A 30-minute demo on your courses and sources; one real enquiry through Vidya AI, timed in front of you.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Inspect the platform first</a>
      </div>
    </div>
  </div>
</section>

<!-- EXPLORE -->
<section aria-labelledby="v8explore" style="padding-top:0">
  <div class="wr">
    <p class="fig">Appendix &middot; sheet index</p>
    <h2 id="v8explore">Explore the platform</h2>
    <div class="cols">
      <div class="dashed"><h3>Products</h3>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div class="dashed"><h3>Solutions</h3>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div class="dashed"><h3>Resources</h3>
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
<?php $v8_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v8_posts)): ?>
<section aria-labelledby="v8blog" style="padding-top:0;padding-bottom:clamp(44px,5.5vw,72px)">
  <div class="wr">
    <p class="fig">Recently issued</p>
    <h2 id="v8blog">From the drawing office</h2>
    <div class="blogr">
      <?php foreach ($v8_posts as $bp): ?>
      <a href="<?php echo esc_url(get_permalink($bp)); ?>">
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
document.querySelectorAll('.eev8 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.insertAdjacentHTML('afterbegin','<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>');
    b.querySelectorAll('img,.pb').forEach(function(x){x.remove();});
  });
});
</script>
<?php get_footer(); ?>
