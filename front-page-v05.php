<?php
/**
 * Front Page v05 - "Bento Board"
 * The tile language of modern work-OS suites: everything is a bento
 * cell, mixed sizes, tinted surfaces, dense but breathable. The page
 * feels like a well-organised board of the whole admission operation.
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
<!-- ee-front-v05 bento-board -->
<main id="ee-main" class="eev5">
<style>
.eev5{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#111A2B;--mut:#5A6B85;--line:rgba(25,51,93,.12);--t-n:rgba(25,51,93,.055);--t-o:rgba(222,110,48,.08);font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:#F3F6FA;line-height:1.6;display:block}
.eev5 *{box-sizing:border-box;margin:0;padding:0}
.eev5 img{max-width:100%;height:auto;display:block}
.eev5 a{text-decoration:none;color:inherit}
.eev5 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px;border-radius:6px}
.eev5 .wr{max-width:1160px;margin:0 auto;padding:0 20px}
.eev5 section{padding:clamp(30px,4vw,52px) 0}
.eev5 .shead{display:flex;align-items:baseline;justify-content:space-between;gap:14px;flex-wrap:wrap;margin-bottom:18px}
.eev5 h2{font-size:clamp(21px,2.7vw,31px);font-weight:800;letter-spacing:-.024em;color:var(--navy)}
.eev5 .shead a{font-size:13px;font-weight:800;color:var(--od)}
.eev5 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:14px;border-radius:13px;padding:13px 24px;transition:.18s}
.eev5 .b-o{background:var(--o);color:#fff;box-shadow:0 12px 26px -12px rgba(222,110,48,.6)}
.eev5 .b-o:hover{background:var(--od);transform:translateY(-1px)}
.eev5 .b-g{background:#fff;border:1.5px solid var(--line);color:var(--navy)}
.eev5 .b-g:hover{border-color:var(--navy)}
.eev5 .tile{background:#fff;border:1px solid var(--line);border-radius:20px;padding:22px;transition:.18s;position:relative;overflow:hidden}
.eev5 .tile:hover{transform:translateY(-3px);box-shadow:0 22px 44px -26px rgba(25,51,93,.35)}
.eev5 .tile .k{font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--od)}
.eev5 .tile h3{margin-top:6px;font-size:15.5px;font-weight:800;color:var(--navy);line-height:1.3}
.eev5 .tile p{margin-top:7px;font-size:13px;color:var(--mut)}
.eev5 .tile p b{color:var(--navy)}
.eev5 .t-navy{background:var(--navy);border-color:var(--navy);color:#fff}
.eev5 .t-navy h3,.eev5 .t-navy h2{color:#fff}
.eev5 .t-navy p{color:#C4D2E8}
.eev5 .t-tint{background:linear-gradient(160deg,var(--t-o),#fff)}
.eev5 .t-blue{background:linear-gradient(160deg,var(--t-n),#fff)}
/* hero board */
.eev5 .board{display:grid;grid-template-columns:repeat(12,1fr);gap:14px}
.eev5 .b-hero{grid-column:span 7;padding:clamp(26px,3.5vw,44px)}
.eev5 .b-hero .pill{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--od);background:var(--t-o);border-radius:999px;padding:7px 14px}
.eev5 h1{margin-top:16px;font-size:clamp(29px,3.9vw,46px);font-weight:900;letter-spacing:-.03em;line-height:1.08;color:var(--navy)}
.eev5 h1 em{font-style:normal;color:var(--o)}
.eev5 .b-hero .lead{margin-top:14px;font-size:15px;color:var(--mut);max-width:48ch}
.eev5 .b-hero .lead b{color:var(--navy)}
.eev5 .b-hero .cta{display:flex;gap:11px;flex-wrap:wrap;margin-top:22px}
.eev5 .b-chat{grid-column:span 5;display:flex;flex-direction:column;gap:9px;justify-content:center}
.eev5 .b-chat .m{font-size:12.6px;line-height:1.5;padding:10px 13px;border-radius:13px;max-width:88%}
.eev5 .b-chat .in{background:#F3F6FA;border:1px solid var(--line);border-radius:13px 13px 13px 4px}
.eev5 .b-chat .out{background:#E7F6EC;border:1px solid rgba(31,175,102,.25);margin-left:auto;border-radius:13px 13px 4px 13px}
.eev5 .b-chat .meta{font-size:10px;font-weight:800;color:var(--mut);letter-spacing:.06em;text-transform:uppercase}
.eev5 .b-stat{grid-column:span 3;text-align:center;display:flex;flex-direction:column;justify-content:center}
.eev5 .b-stat b{font-size:clamp(24px,2.8vw,34px);font-weight:900;color:var(--navy);letter-spacing:-.02em}
.eev5 .b-stat b i{font-style:normal;color:var(--o)}
.eev5 .b-stat span{font-size:11.5px;color:var(--mut)}
.eev5 .b-logos{grid-column:span 12;display:flex;align-items:center;gap:24px 36px;flex-wrap:wrap;justify-content:center;padding:18px 22px}
.eev5 .b-logos p{width:100%;text-align:center;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--mut)}
.eev5 .b-logos img{height:28px;width:auto;opacity:.8}
@media(max-width:920px){.eev5 .b-hero{grid-column:span 12}.eev5 .b-chat{grid-column:span 12}.eev5 .b-stat{grid-column:span 6}}
/* why bento */
.eev5 .g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
@media(max-width:860px){.eev5 .g3{grid-template-columns:1fr}}
/* suite bento: one big + three */
.eev5 .suiteb{display:grid;grid-template-columns:repeat(12,1fr);gap:14px}
.eev5 .s-big{grid-column:span 5;background:var(--navy);border-color:var(--navy);color:#fff;display:flex;flex-direction:column;justify-content:center;padding:28px}
.eev5 .s-big img{width:46px;height:46px;background:#fff;border-radius:12px;padding:8px;margin-bottom:14px}
.eev5 .s-big h3{color:#fff;font-size:19px}
.eev5 .s-big p{color:#C4D2E8}
.eev5 .s-sm{grid-column:span 7;display:grid;grid-template-columns:1fr 1fr;gap:14px}
.eev5 .s-sm .tile:last-child{grid-column:span 2}
.eev5 .s-sm img{width:34px;height:34px;margin-bottom:10px}
@media(max-width:920px){.eev5 .s-big{grid-column:span 12}.eev5 .s-sm{grid-column:span 12}}
@media(max-width:640px){.eev5 .s-sm{grid-template-columns:1fr}.eev5 .s-sm .tile:last-child{grid-column:span 1}}
/* stories bento */
.eev5 .stb{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.eev5 .vc{position:relative;border:1px solid var(--line);padding:0;background:#0F2040;border-radius:20px;overflow:hidden;aspect-ratio:16/11;cursor:pointer;width:100%}
.eev5 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev5 .vc .pb{position:absolute;left:14px;top:14px;width:42px;height:42px;border-radius:12px;background:rgba(255,255,255,.95);display:grid;place-items:center}
.eev5 .vc:hover .pb{background:var(--o)}
.eev5 .vc .pb svg{width:15px;height:15px;color:var(--navy);margin-left:2px}
.eev5 .vc:hover .pb svg{color:#fff}
.eev5 .vc .who{position:absolute;left:14px;right:14px;bottom:12px;background:rgba(255,255,255,.94);border-radius:12px;padding:9px 12px;text-align:left}
.eev5 .vc .who b{display:block;font-size:12.5px;color:var(--navy)}
.eev5 .vc .who span{font-size:10.5px;color:var(--mut)}
.eev5 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
@media(max-width:860px){.eev5 .stb{grid-template-columns:1fr}}
/* quote tile */
.eev5 .arch{padding:clamp(30px,4.5vw,54px)}
.eev5 .arch blockquote{font-size:clamp(20px,2.8vw,30px);font-weight:800;letter-spacing:-.02em;line-height:1.32;max-width:30ch}
.eev5 .arch blockquote em{font-style:normal;color:#FFB98A}
.eev5 .arch p{margin-top:12px;font-size:13px}
/* industries chips-board */
.eev5 .indb{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.eev5 .indb .tile{display:flex;justify-content:space-between;align-items:center;gap:10px;padding:18px 20px}
.eev5 .indb b{font-size:14px;color:var(--navy)}
.eev5 .indb span{display:block;font-size:11.5px;color:var(--mut)}
.eev5 .indb i{font-style:normal;color:var(--o);font-weight:900}
@media(max-width:860px){.eev5 .indb{grid-template-columns:1fr}}
/* compare board */
.eev5 .cmpb{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.eev5 .cmpb .tile h3{display:flex;justify-content:space-between;align-items:center}
.eev5 .cmpb ul{margin:12px 0 0;padding:0;list-style:none;display:grid;gap:8px}
.eev5 .cmpb li{font-size:12.6px;display:flex;gap:8px;color:var(--mut)}
.eev5 .cmpb li::before{content:'\2715';color:#C43D3D;font-weight:800;font-size:11px;margin-top:2px}
.eev5 .cmpb .tile.win li{color:var(--ink)}
.eev5 .cmpb .tile.win li::before{content:'\2713';color:#1FAF66}
@media(max-width:860px){.eev5 .cmpb{grid-template-columns:1fr}}
/* trust board */
.eev5 .g2{display:grid;grid-template-columns:1fr 1fr;gap:14px}
@media(max-width:820px){.eev5 .g2{grid-template-columns:1fr}}
.eev5 .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.eev5 .chip{font-size:11.5px;font-weight:700;color:var(--navy);background:#F3F6FA;border:1px solid var(--line);border-radius:999px;padding:7px 13px}
/* golive board */
.eev5 .gob{display:grid;grid-template-columns:repeat(12,1fr);gap:14px}
.eev5 .gob .day{grid-column:span 4;text-align:center;display:flex;flex-direction:column;justify-content:center}
.eev5 .gob .day b{font-size:clamp(40px,5vw,58px);font-weight:900;color:#FFB98A;line-height:1}
.eev5 .gob .day span{font-size:12px;color:#C4D2E8}
.eev5 .gob .steps{grid-column:span 8;display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
@media(max-width:920px){.eev5 .gob .day{grid-column:span 12}.eev5 .gob .steps{grid-column:span 12}}
@media(max-width:640px){.eev5 .gob .steps{grid-template-columns:1fr}}
/* pricing + faq */
.eev5 .prb{display:grid;grid-template-columns:1fr 1fr;gap:14px;max-width:780px}
@media(max-width:680px){.eev5 .prb{grid-template-columns:1fr}}
.eev5 .prb .go{display:inline-block;margin-top:12px;font-size:13px;font-weight:800;color:var(--od)}
.eev5 details.tile{padding:0 20px}
.eev5 details.tile:hover{transform:none}
.eev5 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:16px 0;font-weight:700;font-size:14px;color:var(--navy)}
.eev5 summary::-webkit-details-marker{display:none}
.eev5 summary::after{content:'+';color:var(--o);font-size:18px;transition:.18s}
.eev5 details[open] summary::after{transform:rotate(45deg)}
.eev5 details p{padding-bottom:16px;font-size:13.3px;color:var(--mut)}
.eev5 .faqg{display:grid;gap:10px;max-width:840px}
/* close + explore + blog */
.eev5 .closeb{padding:clamp(30px,4.5vw,54px);text-align:center}
.eev5 .closeb h2{margin:0 auto}
.eev5 .closeb p{margin:12px auto 0;max-width:54ch}
.eev5 .closeb .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:22px}
.eev5 .closeb .b-g{background:transparent;border-color:rgba(255,255,255,.35);color:#fff}
.eev5 .exg{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.eev5 .exg .tile a{display:block;padding:7px 0;font-size:13.5px;font-weight:600;color:var(--navy);border-bottom:1px dashed var(--line)}
.eev5 .exg .tile a:hover{color:var(--od)}
.eev5 .exg .tile a:last-child{border-bottom:0}
@media(max-width:820px){.eev5 .exg{grid-template-columns:1fr}}
.eev5 .blogb{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.eev5 .blogb time{font-size:11px;color:var(--mut);font-weight:800}
@media(max-width:860px){.eev5 .blogb{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.eev5 *{transition:none!important}}
</style>

<!-- HERO BOARD -->
<section aria-labelledby="v5h1" style="padding-top:clamp(24px,3.4vw,44px)">
  <div class="wr board">
    <div class="tile b-hero t-tint">
      <span class="pill">India's Intelligent Admissions Growth Platform</span>
      <h1 id="v5h1">Every enquiry on the board. <em>None off it.</em></h1>
      <p class="lead">Vidya AI answers in <b>60 seconds</b>, scores intent and books the counsellor; the CRM carries follow-ups, applications, fees and analytics. One board for the whole admission operation, run by <b>500+ institutions</b>.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the live platform</a>
      </div>
    </div>
    <div class="tile b-chat" role="img" aria-label="A night enquiry answered by Vidya AI in a minute">
      <span class="meta">Sunday 9:41 pm &middot; WhatsApp</span>
      <div class="m in">B.Sc Data Science: fees? Girls' hostel?</div>
      <div class="m out">Both, yes! Fee page attached; you qualify with PCM 60%+. Counsellor call tomorrow 11am?</div>
      <div class="m in">Book it &#128077;</div>
      <span class="meta" style="color:#1FAF66">Answered in 60 seconds &middot; scored: hot &middot; queued #1</span>
    </div>
    <div class="tile b-stat"><b>Up to <i>40%</i></b><span>conversion lift</span></div>
    <div class="tile b-stat"><b>10M<i>+</i></b><span>enquiries managed</span></div>
    <div class="tile b-stat"><b>4.7<i>/5</i></b><span>rated by 320+ teams</span></div>
    <div class="tile b-stat"><b>7 <i>days</i></b><span>to go live</span></div>
    <div class="tile b-logos" aria-label="Institutions using ExtraaEdge">
      <p>Trusted by 500+ institutions</p>
      <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY -->
<section aria-labelledby="v5why">
  <div class="wr">
    <div class="shead"><h2 id="v5why">Three leaks, three tiles, closed</h2></div>
    <div class="g3">
      <div class="tile t-blue"><span class="k">Leak 01</span><h3>The overnight queue</h3><p>Enquiries at 9pm wait till Monday. <b>VidyaGPT answers in 60 seconds</b>, 24x7, in 95+ languages, from your own brochure.</p></div>
      <div class="tile t-blue"><span class="k">Leak 02</span><h3>The lapsed follow-up</h3><p>Every promise becomes a task with an SLA and escalation. <b>The third follow-up finally happens.</b></p></div>
      <div class="tile t-blue"><span class="k">Leak 03</span><h3>The blind meeting</h3><p>Funnel, source ROI and counsellor analytics live. <b>Cost per admission on screen</b>, not in a debate.</p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- SUITE -->
<section aria-labelledby="v5suite">
  <div class="wr">
    <div class="shead"><h2 id="v5suite">The Vidya AI layer</h2></div>
    <div class="suiteb">
      <div class="tile s-big"><img src="<?php echo esc_url($V.'vidya-ai.svg'); ?>" alt="" width="46" height="46"><h3>Vidya AI Suite</h3><p>Three AI teammates on one student timeline, on top of the full Education CRM. The AI keeps the clock; your counsellors keep the relationship.</p></div>
      <div class="s-sm">
        <div class="tile"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="" width="34" height="34"><span class="k">24x7 chat</span><h3>VidyaGPT</h3><p>Answers on WhatsApp and web from approved content only.</p></div>
        <div class="tile"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="" width="34" height="34"><span class="k">Intent scoring</span><h3>VidyaPulse</h3><p>Orders the queue hot-first, with the reasons shown.</p></div>
        <div class="tile t-tint"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="" width="34" height="34"><span class="k">AI calling</span><h3>VidyaAgents</h3><p>Calls, confirms interest and books the counsellor slot, so every first human dial is a warm one.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- STORIES -->
<section aria-labelledby="v5st">
  <div class="wr">
    <div class="shead"><h2 id="v5st">What our clients are saying</h2><a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>">View all stories &rarr;</a></div>
    <div class="stb">
      <?php foreach ($STORIES as $s): ?>
      <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ARCHITECT -->
<section aria-label="Working principle">
  <div class="wr">
    <div class="tile t-navy arch">
      <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
      <p>Configuration, not customization: we study how your admissions actually run, then set the board around it.</p>
    </div>
  </div>
</section>

<!-- INDUSTRIES -->
<section aria-labelledby="v5ind">
  <div class="wr">
    <div class="shead"><h2 id="v5ind">A board for every institution</h2></div>
    <div class="indb">
      <a class="tile" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><span><b>Universities &amp; Colleges</b><span>multi-campus, multi-course</span></span><i>&rarr;</i></a>
      <a class="tile" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><span><b>K-12 Schools</b><span>parent-led journeys</span></span><i>&rarr;</i></a>
      <a class="tile" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><span><b>Coaching &amp; Test Prep</b><span>high volume, fast cycles</span></span><i>&rarr;</i></a>
      <a class="tile" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><span><b>Study Abroad</b><span>document-heavy pipelines</span></span><i>&rarr;</i></a>
      <a class="tile" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><span><b>EdTech</b><span>digital-first enrolment</span></span><i>&rarr;</i></a>
      <a class="tile" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><span><b>Vocational</b><span>rolling intakes</span></span><i>&rarr;</i></a>
    </div>
  </div>
</section>

<!-- COMPARE -->
<section aria-labelledby="v5cmp">
  <div class="wr">
    <div class="shead"><h2 id="v5cmp">The only AI-native Admissions Growth Platform</h2></div>
    <div class="cmpb">
      <div class="tile"><h3>Meritto / LeadSquared</h3><ul><li>Forms wait for office hours</li><li>Queue sorted newest-first</li><li>Education, but pre-AI</li></ul></div>
      <div class="tile"><h3>Generic CRMs</h3><ul><li>Built for sales pipelines</li><li>Months of setup</li><li>Nobody answers at 2am</li></ul></div>
      <div class="tile t-tint win"><h3>ExtraaEdge <span style="color:#1FAF66;font-size:12px">&#10003;</span></h3><ul><li>Vidya AI answers in 60 sec, 24x7</li><li>Queue ordered by intent</li><li>AI-native, admissions-only, live in 7 days</li></ul></div>
    </div>
  </div>
</section>

<!-- TRUST -->
<section aria-labelledby="v5trust">
  <div class="wr">
    <div class="shead"><h2 id="v5trust">Open to your stack. Strict with your data.</h2></div>
    <div class="g2">
      <div class="tile"><span class="k">Integrations</span><h3>50+ native connections</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payments</span><span class="chip">API &amp; webhooks</span></div></div>
      <div class="tile"><span class="k">Security</span><h3>Enterprise-grade handling</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
    </div>
  </div>
</section>

<!-- GO-LIVE + SWITCH -->
<section aria-labelledby="v5go">
  <div class="wr">
    <div class="shead"><h2 id="v5go">Live in 7 days, switching included</h2></div>
    <div class="gob">
      <div class="tile t-navy day"><b>7</b><span>days to go live &middot; 14 with migration</span></div>
      <div class="steps">
        <div class="tile"><span class="k">Day 1-2</span><h3>Map</h3><p>Funnel, courses, sources and team captured.</p></div>
        <div class="tile"><span class="k">Day 3-5</span><h3>Configure &amp; migrate</h3><p>Board set around your funnel; data in, deduped.</p></div>
        <div class="tile"><span class="k">Day 6-7</span><h3>Go live</h3><p>Counsellors onboarded; first enquiry answered.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section aria-labelledby="v5price">
  <div class="wr">
    <div class="shead"><h2 id="v5price">Pricing, sized to your board</h2></div>
    <div class="prb">
      <a class="tile" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><span class="k">Platform</span><h3>Education CRM</h3><p>Capture, counselling, follow-ups, applications, fees, analytics.</p><span class="go">CRM pricing &rarr;</span></a>
      <a class="tile t-tint" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><span class="k">AI layer</span><h3>Vidya AI</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on your funnel.</p><span class="go">Vidya AI pricing &rarr;</span></a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section aria-labelledby="v5faq">
  <div class="wr">
    <div class="shead"><h2 id="v5faq">Straight answers</h2></div>
    <div class="faqg">
      <details class="tile"><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting and the night shift; counsellors do the convincing. 95% of counsellors are active after go-live.</p></details>
      <details class="tile"><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs; it books a counsellor when unsure.</p></details>
      <details class="tile"><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration, configured around your existing process.</p></details>
      <details class="tile"><summary>Does it work with our tools?</summary><p>50+ native integrations plus API and webhooks; enquiries flow in automatically.</p></details>
      <details class="tile"><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access, full audit trail.</p></details>
    </div>
  </div>
</section>

<!-- CLOSE -->
<section aria-labelledby="v5close">
  <div class="wr">
    <div class="tile t-navy closeb">
      <h2 id="v5close">Put your funnel on the board</h2>
      <p>A 30-minute demo on your courses and sources; bring one real enquiry and watch the first 60 seconds happen live.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the platform first</a>
      </div>
    </div>
  </div>
</section>

<!-- EXPLORE -->
<section aria-labelledby="v5explore">
  <div class="wr">
    <div class="shead"><h2 id="v5explore">Explore the platform</h2></div>
    <div class="exg">
      <div class="tile"><span class="k">Products</span>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div class="tile"><span class="k">Solutions</span>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div class="tile"><span class="k">Resources</span>
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
<?php $v5_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v5_posts)): ?>
<section aria-labelledby="v5blog" style="padding-bottom:clamp(40px,5vw,64px)">
  <div class="wr">
    <div class="shead"><h2 id="v5blog">Fresh tiles from the blog</h2><a href="<?php echo esc_url(home_url('/blog/')); ?>">All posts &rarr;</a></div>
    <div class="blogb">
      <?php foreach ($v5_posts as $bp): ?>
      <a class="tile" href="<?php echo esc_url(get_permalink($bp)); ?>">
        <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
        <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
        <p style="font-weight:800;color:var(--od)">Read &rarr;</p>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
document.querySelectorAll('.eev5 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
