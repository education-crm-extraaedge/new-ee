<?php
/**
 * Front Page v01 - "Gradient Horizon"
 * Warm enterprise language of the big CRM suites: soft gradient stage,
 * rounded cards, generous air, orange as the single action colour.
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
<!-- ee-front-v01 gradient-horizon -->
<main id="ee-main" class="eev1">
<style>
.eev1{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--mut:#5A6B85;--line:rgba(25,51,93,.12);--paper:#F6F8FB;font-family:'Inter',system-ui,sans-serif;color:#0F172A;background:#fff;line-height:1.6;display:block}
.eev1 *{box-sizing:border-box;margin:0;padding:0}
.eev1 img{max-width:100%;height:auto;display:block}
.eev1 a{text-decoration:none;color:inherit}
.eev1 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px;border-radius:4px}
.eev1 .wr{max-width:1180px;margin:0 auto;padding:0 22px}
.eev1 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:14.5px;border-radius:999px;padding:14px 26px;transition:.2s}
.eev1 .b-o{background:var(--o);color:#fff;box-shadow:0 14px 30px -12px rgba(222,110,48,.6)}
.eev1 .b-o:hover{background:var(--od);transform:translateY(-1px)}
.eev1 .b-g{border:1.5px solid var(--line);color:var(--navy);background:#fff}
.eev1 .b-g:hover{border-color:var(--navy)}
.eev1 .kick{display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--od);background:#fff;border:1px solid rgba(222,110,48,.25);border-radius:999px;padding:7px 15px;box-shadow:0 6px 16px -8px rgba(222,110,48,.4)}
.eev1 .kick i{width:7px;height:7px;border-radius:50%;background:var(--o)}
.eev1 h2{font-size:clamp(24px,3vw,37px);font-weight:800;letter-spacing:-.025em;line-height:1.15;color:var(--navy)}
.eev1 .sub{margin-top:12px;color:var(--mut);font-size:15.5px;max-width:64ch}
.eev1 section{padding:clamp(48px,6vw,84px) 0}
.eev1 .c{text-align:center}
.eev1 .c h2,.eev1 .c .sub{margin-left:auto;margin-right:auto}
/* hero */
.eev1 .hero{padding:clamp(56px,7.5vw,104px) 0 clamp(44px,5.5vw,72px);background:
 radial-gradient(60% 90% at 85% -10%,rgba(222,110,48,.14),transparent),
 radial-gradient(55% 80% at 8% 8%,rgba(25,51,93,.10),transparent),
 linear-gradient(180deg,#fff, #F6F8FB)}
.eev1 .hero .wr{text-align:center}
.eev1 h1{margin-top:20px;font-size:clamp(33px,4.8vw,60px);font-weight:900;letter-spacing:-.032em;line-height:1.06;color:var(--navy);max-width:21ch;margin-left:auto;margin-right:auto}
.eev1 h1 em{font-style:normal;color:var(--o)}
.eev1 .hero .lead{margin:18px auto 0;font-size:clamp(15px,1.5vw,17.5px);color:var(--mut);max-width:62ch}
.eev1 .hero .cta{display:flex;justify-content:center;gap:14px;flex-wrap:wrap;margin-top:28px}
.eev1 .hero .under{margin-top:16px;font-size:12.5px;color:var(--mut);font-weight:600}
.eev1 .statbar{max-width:900px;margin:clamp(30px,4vw,46px) auto 0;background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 30px 60px -32px rgba(25,51,93,.35);display:grid;grid-template-columns:repeat(4,1fr);overflow:hidden}
.eev1 .statbar div{padding:20px 12px;border-left:1px solid var(--line)}
.eev1 .statbar div:first-child{border-left:0}
.eev1 .statbar b{display:block;font-size:clamp(19px,2.2vw,26px);font-weight:900;color:var(--navy);letter-spacing:-.01em}
.eev1 .statbar b i{font-style:normal;color:var(--o)}
.eev1 .statbar span{font-size:11.5px;color:var(--mut)}
@media(max-width:720px){.eev1 .statbar{grid-template-columns:1fr 1fr}.eev1 .statbar div:nth-child(3){border-left:0}}
/* logos */
.eev1 .logos{padding:clamp(30px,4vw,44px) 0;background:#F6F8FB}
.eev1 .logos p{text-align:center;font-size:12px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--mut);margin-bottom:22px}
.eev1 .lrow{display:flex;justify-content:center;align-items:center;gap:30px 44px;flex-wrap:wrap}
.eev1 .lrow img{height:32px;width:auto;opacity:.8;filter:grayscale(22%);transition:.2s}
.eev1 .lrow img:hover{opacity:1;filter:none}
/* why */
.eev1 .why .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:34px}
.eev1 .card{background:#fff;border:1px solid var(--line);border-radius:20px;padding:26px 24px;transition:.2s}
.eev1 .card:hover{transform:translateY(-4px);box-shadow:0 26px 52px -26px rgba(25,51,93,.3)}
.eev1 .card .ic{width:46px;height:46px;border-radius:14px;background:linear-gradient(135deg,rgba(222,110,48,.14),rgba(25,51,93,.08));display:grid;place-items:center;margin-bottom:14px;font-size:20px}
.eev1 .card h3{font-size:16.5px;font-weight:800;color:var(--navy)}
.eev1 .card p{margin-top:8px;font-size:13.5px;color:var(--mut)}
.eev1 .card p b{color:var(--navy)}
@media(max-width:860px){.eev1 .why .grid{grid-template-columns:1fr}}
/* suite */
.eev1 .suite{background:linear-gradient(180deg,#F6F8FB,#fff)}
.eev1 .suite .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-top:34px}
.eev1 .scard{background:#fff;border:1px solid var(--line);border-radius:20px;padding:24px 20px;position:relative;overflow:hidden;transition:.2s}
.eev1 .scard::before{content:'';position:absolute;inset:0 0 auto;height:4px;background:linear-gradient(90deg,var(--o),var(--navy))}
.eev1 .scard:hover{transform:translateY(-4px);box-shadow:0 26px 52px -26px rgba(25,51,93,.3)}
.eev1 .scard img{width:38px;height:38px;margin-bottom:12px}
.eev1 .scard h3{font-size:15.5px;font-weight:800;color:var(--navy)}
.eev1 .scard em{display:block;font-style:normal;font-size:11px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;color:var(--od);margin-top:2px}
.eev1 .scard p{margin-top:8px;font-size:13px;color:var(--mut)}
@media(max-width:960px){.eev1 .suite .grid{grid-template-columns:1fr 1fr}}
@media(max-width:560px){.eev1 .suite .grid{grid-template-columns:1fr}}
/* stories */
.eev1 .st .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:34px}
.eev1 .vc{position:relative;border:0;padding:0;background:var(--navy);border-radius:20px;overflow:hidden;aspect-ratio:16/10;cursor:pointer;box-shadow:0 22px 46px -24px rgba(25,51,93,.4);width:100%}
.eev1 .vc img{width:100%;height:100%;object-fit:cover;opacity:.9}
.eev1 .vc .pb{position:absolute;left:50%;top:42%;transform:translate(-50%,-50%);width:56px;height:56px;border-radius:50%;background:rgba(255,255,255,.94);display:grid;place-items:center;transition:.2s}
.eev1 .vc:hover .pb{background:var(--o)}
.eev1 .vc .pb svg{width:19px;height:19px;color:var(--navy);margin-left:2px}
.eev1 .vc:hover .pb svg{color:#fff}
.eev1 .vc .who{position:absolute;left:0;right:0;bottom:0;padding:26px 16px 13px;background:linear-gradient(transparent,rgba(10,20,40,.88));color:#fff;text-align:left}
.eev1 .vc .who b{display:block;font-size:13.5px}
.eev1 .vc .who span{font-size:11.5px;color:#C8D4E6}
.eev1 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
@media(max-width:860px){.eev1 .st .grid{grid-template-columns:1fr}}
.eev1 .st .more{text-align:center;margin-top:26px}
.eev1 .st .more a{font-weight:800;font-size:14px;color:var(--navy);border-bottom:2px solid rgba(222,110,48,.4);padding-bottom:3px}
.eev1 .st .more a:hover{color:var(--od);border-color:var(--o)}
/* architect quote */
.eev1 .arch{background:var(--navy);color:#fff;text-align:center}
.eev1 .arch blockquote{font-size:clamp(21px,3vw,34px);font-weight:800;letter-spacing:-.025em;line-height:1.3;max-width:26ch;margin:0 auto}
.eev1 .arch blockquote em{font-style:normal;color:#FFB98A}
.eev1 .arch p{margin:16px auto 0;color:#C4D2E8;font-size:14px;max-width:56ch}
/* industries */
.eev1 .ind .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:32px}
.eev1 .icard{display:flex;align-items:center;justify-content:space-between;gap:10px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:18px 20px;font-weight:700;color:var(--navy);font-size:14.5px;transition:.2s}
.eev1 .icard span{font-size:12px;color:var(--mut);font-weight:600;display:block}
.eev1 .icard:hover{border-color:rgba(222,110,48,.5);transform:translateY(-2px);box-shadow:0 18px 36px -20px rgba(25,51,93,.3)}
.eev1 .icard i{font-style:normal;color:var(--o);font-weight:800}
@media(max-width:860px){.eev1 .ind .grid{grid-template-columns:1fr}}
/* compare */
.eev1 .cmp{background:var(--paper)}
.eev1 .cmp .tbl{margin:32px auto 0;max-width:880px;background:#fff;border:1px solid var(--line);border-radius:20px;overflow:hidden;box-shadow:0 24px 50px -28px rgba(25,51,93,.3)}
.eev1 .cmp table{width:100%;border-collapse:collapse;font-size:13.5px}
.eev1 .cmp th,.eev1 .cmp td{padding:13px 18px;border-bottom:1px solid var(--line);text-align:left}
.eev1 .cmp th{font-size:11px;letter-spacing:.07em;text-transform:uppercase;color:var(--mut);background:var(--paper)}
.eev1 .cmp td:first-child{font-weight:700;color:var(--navy)}
.eev1 .cmp .y{color:#1FAF66;font-weight:800}
.eev1 .cmp .n{color:#C43D3D}
.eev1 .cmp tr:last-child td{border-bottom:0}
/* trust band: integrations+security */
.eev1 .duo{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:32px}
.eev1 .duo .card h3{font-size:17px}
.eev1 .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:14px}
.eev1 .chip{font-size:12px;font-weight:700;color:var(--navy);background:var(--paper);border:1px solid var(--line);border-radius:999px;padding:7px 13px}
@media(max-width:820px){.eev1 .duo{grid-template-columns:1fr}}
/* golive + switch */
.eev1 .go{background:linear-gradient(135deg,var(--navy),#22467C);color:#fff;border-radius:26px;padding:clamp(30px,4vw,48px);display:grid;grid-template-columns:1.1fr .9fr;gap:clamp(22px,4vw,52px);align-items:center}
.eev1 .go h2{color:#fff}
.eev1 .go .sub{color:#C4D2E8}
.eev1 .go ol{margin:18px 0 0;padding:0;list-style:none;display:grid;gap:11px;counter-reset:g}
.eev1 .go ol li{display:flex;gap:12px;font-size:14px;color:#DCE6F4}
.eev1 .go ol li::before{counter-increment:g;content:counter(g);flex:none;width:24px;height:24px;border-radius:50%;background:rgba(222,110,48,.9);color:#fff;font-size:11.5px;font-weight:800;display:grid;place-items:center;margin-top:1px}
.eev1 .go .day{border:1px solid rgba(255,255,255,.2);border-radius:18px;padding:22px;background:rgba(255,255,255,.06);text-align:center}
.eev1 .go .day b{display:block;font-size:clamp(38px,5vw,56px);font-weight:900;color:#FFB98A;line-height:1}
.eev1 .go .day span{font-size:12.5px;color:#C4D2E8}
.eev1 .go .day p{margin-top:12px;font-size:12.5px;color:#AFC1DD}
@media(max-width:820px){.eev1 .go{grid-template-columns:1fr}}
/* pricing */
.eev1 .price .grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;max-width:760px;margin:32px auto 0}
.eev1 .pcard{background:#fff;border:1.5px solid var(--line);border-radius:20px;padding:26px;text-align:left;transition:.2s}
.eev1 .pcard:hover{border-color:var(--o);transform:translateY(-3px)}
.eev1 .pcard h3{font-size:17px;font-weight:800;color:var(--navy)}
.eev1 .pcard p{margin-top:8px;font-size:13.5px;color:var(--mut)}
.eev1 .pcard .go2{display:inline-block;margin-top:16px;font-weight:800;font-size:13.5px;color:var(--od)}
@media(max-width:680px){.eev1 .price .grid{grid-template-columns:1fr}}
/* faq */
.eev1 .faq .list{max-width:780px;margin:30px auto 0;display:grid;gap:10px}
.eev1 details{background:#fff;border:1px solid var(--line);border-radius:16px;padding:0 20px}
.eev1 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;align-items:center;gap:14px;padding:17px 0;font-weight:700;font-size:14.5px;color:var(--navy)}
.eev1 summary::-webkit-details-marker{display:none}
.eev1 summary::after{content:'+';font-size:20px;color:var(--o);font-weight:600;transition:.2s}
.eev1 details[open] summary::after{transform:rotate(45deg)}
.eev1 details p{padding:0 0 17px;font-size:13.8px;color:var(--mut)}
/* explore */
.eev1 .explore{background:var(--paper)}
.eev1 .cols{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:32px}
.eev1 .col h3{font-size:12px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--od);margin-bottom:12px}
.eev1 .col a{display:block;padding:9px 0;font-size:14px;font-weight:600;color:var(--navy);border-bottom:1px solid var(--line)}
.eev1 .col a:hover{color:var(--od)}
@media(max-width:820px){.eev1 .cols{grid-template-columns:1fr}}
/* blog */
.eev1 .blog .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:32px}
.eev1 .bcard{background:#fff;border:1px solid var(--line);border-radius:20px;padding:22px;transition:.2s}
.eev1 .bcard:hover{transform:translateY(-3px);box-shadow:0 22px 44px -24px rgba(25,51,93,.3)}
.eev1 .bcard time{font-size:11.5px;font-weight:700;color:var(--mut)}
.eev1 .bcard h3{margin-top:8px;font-size:15.5px;font-weight:800;color:var(--navy);line-height:1.35}
.eev1 .bcard span{display:inline-block;margin-top:12px;font-size:13px;font-weight:800;color:var(--od)}
@media(max-width:860px){.eev1 .blog .grid{grid-template-columns:1fr}}
/* close */
.eev1 .close{background:
 radial-gradient(60% 100% at 50% 0%,rgba(222,110,48,.14),transparent),var(--navy);color:#fff;text-align:center;border-radius:0}
.eev1 .close h2{color:#fff}
.eev1 .close .sub{color:#C4D2E8}
.eev1 .close .cta{display:flex;justify-content:center;gap:14px;flex-wrap:wrap;margin-top:26px}
.eev1 .close .b-g{background:transparent;border-color:rgba(255,255,255,.35);color:#fff}
@media(prefers-reduced-motion:reduce){.eev1 *{transition:none!important;animation:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v1h1">
  <div class="wr">
    <span class="kick"><i aria-hidden="true"></i> India's Intelligent Admissions Growth Platform</span>
    <h1 id="v1h1">Turn every enquiry into a conversation <em>in 60 seconds</em></h1>
    <p class="lead">Vidya AI answers, qualifies and books the counsellor call while competitors are still checking their inbox. One platform from first enquiry to enrolled student, trusted by 500+ institutions.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the live platform</a>
    </div>
    <p class="under">No signup for the tour &middot; go-live in 7 days &middot; rated 4.7/5 by 320+ admission teams</p>
    <div class="statbar" role="region" aria-label="Key outcomes">
      <div><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
      <div><b>Up to <i>40%</i></b><span>conversion lift</span></div>
      <div><b>10M<i>+</i></b><span>enquiries managed</span></div>
      <div><b>95%</b><span>counsellor adoption</span></div>
    </div>
  </div>
</section>

<!-- LOGOS -->
<section class="logos" aria-label="Institutions using ExtraaEdge">
  <div class="wr">
    <p>Trusted by 500+ educational institutions</p>
    <div class="lrow">
      <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY -->
<section class="why c" aria-labelledby="v1why">
  <div class="wr">
    <h2 id="v1why">Your funnel does not leak leads. It leaks time.</h2>
    <p class="sub">Enquiries arrive at 9pm and on Sundays. Follow-ups depend on memory. Reports arrive after the season. Three leaks, one platform.</p>
    <div class="grid">
      <div class="card"><div class="ic" aria-hidden="true">&#9200;</div><h3>The overnight queue</h3><p>A typical office replies in about 6 hours. <b>VidyaGPT answers in 60 seconds</b>, any hour, in 95+ languages, from your own brochure.</p></div>
      <div class="card"><div class="ic" aria-hidden="true">&#128203;</div><h3>The forgotten follow-up</h3><p>Every promise becomes a task with an SLA. Sequences run on WhatsApp, SMS and email; <b>the third follow-up finally happens</b>.</p></div>
      <div class="card"><div class="ic" aria-hidden="true">&#128202;</div><h3>The blind review meeting</h3><p>Funnel, source ROI and counsellor performance, live. <b>Cost per admission on screen</b>, not in a debate.</p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- VIDYA SUITE -->
<section class="suite c" aria-labelledby="v1suite">
  <div class="wr">
    <h2 id="v1suite">Meet Vidya AI, the layer that never sleeps</h2>
    <p class="sub">Three AI teammates working every enquiry, handing warm conversations to your counsellors.</p>
    <div class="grid">
      <article class="scard"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="" width="38" height="38"><h3>VidyaGPT</h3><em>24x7 AI chat</em><p>Answers on WhatsApp and web from your approved content; escalates instead of guessing.</p></article>
      <article class="scard"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="" width="38" height="38"><h3>VidyaPulse</h3><em>Intent scoring</em><p>Reads every conversation and orders the queue hot-first, with the reasons shown.</p></article>
      <article class="scard"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="" width="38" height="38"><h3>VidyaAgents</h3><em>AI calling</em><p>Calls, confirms interest and books the counsellor slot before a human dials.</p></article>
      <article class="scard"><img src="<?php echo esc_url($V.'vidya-ai.svg'); ?>" alt="" width="38" height="38"><h3>Vidya AI Suite</h3><em>One AI layer</em><p>All three on one timeline, on top of the full Education CRM.</p></article>
    </div>
  </div>
</section>

<!-- STORIES -->
<section class="st c" aria-labelledby="v1st">
  <div class="wr">
    <h2 id="v1st">What our clients are saying</h2>
    <p class="sub">Named teams, on camera.</p>
    <div class="grid">
      <?php foreach ($STORIES as $s): ?>
      <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
      </button>
      <?php endforeach; ?>
    </div>
    <p class="more"><a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>">View all customer stories &rarr;</a></p>
  </div>
</section>

<!-- ARCHITECT QUOTE -->
<section class="arch" aria-label="Our working principle">
  <div class="wr">
    <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
    <p>Configuration, not customization: we listen, study how your admissions actually run, then build the platform around it.</p>
  </div>
</section>

<!-- INDUSTRIES -->
<section class="ind c" aria-labelledby="v1ind">
  <div class="wr">
    <h2 id="v1ind">Built for every kind of institution</h2>
    <div class="grid">
      <a class="icard" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><span><b>Universities &amp; Colleges</b><span>Multi-course, multi-campus funnels</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><span><b>K-12 Schools</b><span>Parent-led admission journeys</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><span><b>Coaching &amp; Test Prep</b><span>High-volume, fast-cycle batches</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><span><b>Study Abroad</b><span>Counsellor-heavy, document-heavy</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><span><b>EdTech</b><span>Digital-first enrolment at scale</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><span><b>Vocational</b><span>Short courses, rolling intakes</span></span><i>&rarr;</i></a>
    </div>
  </div>
</section>

<!-- COMPARE -->
<section class="cmp c" aria-labelledby="v1cmp">
  <div class="wr">
    <h2 id="v1cmp">The only AI-native Admissions Growth Platform</h2>
    <p class="sub">Legacy CRMs organise your queue. ExtraaEdge removes it.</p>
    <div class="tbl">
      <table>
        <thead><tr><th scope="col">Question</th><th scope="col">Meritto / LeadSquared</th><th scope="col">Generic CRMs</th><th scope="col">ExtraaEdge</th></tr></thead>
        <tbody>
          <tr><td>Who answers at 2am?</td><td class="n">Forms wait</td><td class="n">Nobody</td><td class="y">Vidya AI, 60 sec</td></tr>
          <tr><td>Call order</td><td class="n">Newest first</td><td class="n">Newest first</td><td class="y">Intent first</td></tr>
          <tr><td>Built for</td><td>Education, pre-AI</td><td class="n">Sales pipelines</td><td class="y">AI-native admissions</td></tr>
          <tr><td>Go-live</td><td>Weeks to months</td><td class="n">Months</td><td class="y">7 days</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- INTEGRATIONS + SECURITY -->
<section class="c" aria-labelledby="v1trust">
  <div class="wr">
    <h2 id="v1trust">Plays well with your stack. Strict with your data.</h2>
    <div class="duo" style="text-align:left">
      <div class="card">
        <h3>50+ integrations</h3>
        <p style="margin-top:8px;font-size:13.5px;color:var(--mut)">Enquiries flow in automatically; nothing is imported by hand.</p>
        <div class="chips">
          <span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Cloud telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payment gateways</span><span class="chip">Webhooks &amp; API</span>
        </div>
      </div>
      <div class="card">
        <h3>Enterprise-grade security</h3>
        <p style="margin-top:8px;font-size:13.5px;color:var(--mut)">Admissions data is minors' and family data. It is treated accordingly.</p>
        <div class="chips">
          <span class="chip">ISO 27001 certified</span><span class="chip">GDPR compliant</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Full audit trail</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- GO-LIVE + SWITCH -->
<section aria-labelledby="v1go">
  <div class="wr">
    <div class="go">
      <div>
        <h2 id="v1go">Live in 7 days. Switching included.</h2>
        <p class="sub">Also switching from spreadsheets or a legacy CRM: we migrate your data and configure your funnel as part of go-live, 14 days total with migration.</p>
        <ol>
          <li>Day 1-2: we map your funnel, courses, sources and team</li>
          <li>Day 3-5: platform configured; data migrated and deduplicated</li>
          <li>Day 6-7: counsellor onboarding; Vidya AI answers its first enquiry</li>
        </ol>
      </div>
      <div class="day"><b>7</b><span>days to go live &middot; 14 with migration</span><p>Configuration, not customization; no consultant months, no redesigned Mondays.</p></div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="price c" aria-labelledby="v1price">
  <div class="wr">
    <h2 id="v1price">Pricing shaped like your institution</h2>
    <p class="sub">Team size, enquiry volume and modules decide it; a 30-minute call gets you an exact quote.</p>
    <div class="grid">
      <a class="pcard" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM</h3><p>Capture, counselling, follow-ups, applications, fees and analytics.</p><span class="go2">See CRM pricing &rarr;</span></a>
      <a class="pcard" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on top of your funnel.</p><span class="go2">See Vidya AI pricing &rarr;</span></a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq c" aria-labelledby="v1faq">
  <div class="wr">
    <h2 id="v1faq">Asked in every first meeting</h2>
    <div class="list">
      <details><summary>Will AI replace our counsellors?</summary><p>No. Vidya AI does the waiting, the repetition and the night shift; counsellors do the convincing. That is why 95% of counsellors are actively using the platform after go-live.</p></details>
      <details><summary>How fast can we go live?</summary><p>7 days as standard, 14 with data migration. Your funnel stages, courses and sources are configured around how your admissions already run.</p></details>
      <details><summary>Does it work with our existing tools?</summary><p>Yes: Meta and Google lead forms, education portals, telephony, payment gateways and more, 50+ integrations in total, so enquiries flow in automatically.</p></details>
      <details><summary>Is student data safe?</summary><p>ISO 27001 certified and GDPR compliant, with role-based access so counsellors, agencies and management each see exactly what they should.</p></details>
      <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs. When it is unsure, it books a counsellor instead of improvising.</p></details>
    </div>
  </div>
</section>

<!-- CLOSE -->
<section class="close" aria-labelledby="v1close">
  <div class="wr">
    <h2 id="v1close">See your own enquiry answered in 60 seconds</h2>
    <p class="sub">Bring one real enquiry to a 30-minute demo. We run it through Vidya AI live, on your courses and your funnel.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the platform first</a>
    </div>
  </div>
</section>

<!-- EXPLORE: products / solutions / resources -->
<section class="explore" aria-labelledby="v1explore">
  <div class="wr">
    <h2 id="v1explore" class="c" style="text-align:center">Explore the platform</h2>
    <div class="cols">
      <div class="col">
        <h3>Products</h3>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div class="col">
        <h3>Solutions</h3>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div class="col">
        <h3>Resources</h3>
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
<?php $v1_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v1_posts)): ?>
<section class="blog c" aria-labelledby="v1blog">
  <div class="wr">
    <h2 id="v1blog">Fresh from the blog</h2>
    <div class="grid" style="text-align:left">
      <?php foreach ($v1_posts as $bp): ?>
      <a class="bcard" href="<?php echo esc_url(get_permalink($bp)); ?>">
        <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
        <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
        <span>Read article &rarr;</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
/* click-to-play stories; nothing loads from YouTube until asked */
document.querySelectorAll('.eev1 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
