<?php
/**
 * Front Page v02 - "Obsidian Terminal"
 * The dark, precise language of modern dev-grade SaaS: near-black stage,
 * hairline borders, uppercase micro-labels, orange used like a status light.
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
<!-- ee-front-v02 obsidian-terminal -->
<main id="ee-main" class="eev2">
<style>
.eev2{--bg:#0A1322;--panel:#0F1B30;--edge:#1D2C49;--ink:#E8EEF8;--mut:#8CA0BF;--o:#DE6E30;--ob:#FFB98A;--good:#4ADE97;font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:var(--bg);line-height:1.6;display:block}
.eev2 *{box-sizing:border-box;margin:0;padding:0}
.eev2 img{max-width:100%;height:auto;display:block}
.eev2 a{text-decoration:none;color:inherit}
.eev2 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px;border-radius:4px}
.eev2 .wr{max-width:1120px;margin:0 auto;padding:0 22px}
.eev2 .lbl{font-size:10.5px;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:var(--ob)}
.eev2 .lbl::before{content:'/ '}
.eev2 h2{margin-top:10px;font-size:clamp(22px,2.9vw,34px);font-weight:800;letter-spacing:-.025em;line-height:1.16;color:#fff;max-width:28ch}
.eev2 .sub{margin-top:10px;color:var(--mut);font-size:14.5px;max-width:62ch}
.eev2 .sub b{color:var(--ink)}
.eev2 section{padding:clamp(44px,5.8vw,76px) 0;border-top:1px solid var(--edge)}
.eev2 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:14px;border-radius:9px;padding:12px 22px;transition:.18s}
.eev2 .b-o{background:var(--o);color:#fff;box-shadow:0 0 0 1px rgba(222,110,48,.4),0 12px 30px -12px rgba(222,110,48,.6)}
.eev2 .b-o:hover{background:#B5551D}
.eev2 .b-g{border:1px solid var(--edge);color:var(--ink);background:var(--panel)}
.eev2 .b-g:hover{border-color:var(--mut)}
/* hero */
.eev2 .hero{border-top:0;padding:clamp(52px,7vw,96px) 0;background:radial-gradient(50% 60% at 80% 0%,rgba(222,110,48,.13),transparent),radial-gradient(40% 50% at 10% 100%,rgba(61,90,142,.18),transparent)}
.eev2 .status{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--good);border:1px solid var(--edge);background:rgba(74,222,151,.06);border-radius:999px;padding:7px 14px}
.eev2 .status::before{content:'';width:7px;height:7px;border-radius:50%;background:var(--good);box-shadow:0 0 10px var(--good)}
.eev2 h1{margin-top:20px;font-size:clamp(32px,4.8vw,58px);font-weight:900;letter-spacing:-.034em;line-height:1.05;color:#fff;max-width:20ch}
.eev2 h1 em{font-style:normal;color:var(--ob)}
.eev2 .hero .lead{margin-top:16px;font-size:clamp(14.5px,1.5vw,17px);color:var(--mut);max-width:56ch}
.eev2 .hero .lead b{color:var(--ink)}
.eev2 .hero .cta{display:flex;gap:12px;flex-wrap:wrap;margin-top:26px}
.eev2 .ticker{margin-top:clamp(28px,4vw,42px);border:1px solid var(--edge);border-radius:12px;background:var(--panel);overflow:hidden}
.eev2 .ticker .th{display:flex;gap:8px;padding:9px 14px;border-bottom:1px solid var(--edge);font-size:10px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.eev2 .ticker .th i{width:9px;height:9px;border-radius:50%;background:var(--edge);font-style:normal}
.eev2 .ticker .th i:first-child{background:#C43D3D}.eev2 .ticker .th i:nth-child(2){background:#D9A32C}.eev2 .ticker .th i:nth-child(3){background:var(--good)}
.eev2 .ticker .row{display:flex;justify-content:space-between;gap:14px;padding:11px 14px;border-bottom:1px solid var(--edge);font-size:12.8px;font-variant-numeric:tabular-nums}
.eev2 .ticker .row:last-child{border-bottom:0}
.eev2 .ticker .row span{color:var(--mut)}
.eev2 .ticker .row b{color:#fff;font-weight:700}
.eev2 .ticker .ok{color:var(--good);font-weight:800;font-size:11px}
.eev2 .hero .grid{display:grid;grid-template-columns:1.05fr .95fr;gap:clamp(26px,4vw,60px);align-items:center}
@media(max-width:900px){.eev2 .hero .grid{grid-template-columns:1fr}}
/* metrics strip */
.eev2 .metrics{display:grid;grid-template-columns:repeat(4,1fr);border:1px solid var(--edge);border-radius:12px;overflow:hidden;background:var(--panel);margin-top:34px}
.eev2 .metrics div{padding:18px;border-left:1px solid var(--edge)}
.eev2 .metrics div:first-child{border-left:0}
.eev2 .metrics b{display:block;font-size:clamp(19px,2.2vw,26px);font-weight:900;color:#fff;font-variant-numeric:tabular-nums}
.eev2 .metrics b i{font-style:normal;color:var(--ob)}
.eev2 .metrics span{font-size:11px;color:var(--mut)}
@media(max-width:720px){.eev2 .metrics{grid-template-columns:1fr 1fr}.eev2 .metrics div:nth-child(3){border-left:0}}
/* logos on dark: white tiles */
.eev2 .lrow{display:flex;flex-wrap:wrap;gap:12px;margin-top:26px}
.eev2 .lrow span{background:#fff;border-radius:10px;padding:10px 16px;display:flex;align-items:center}
.eev2 .lrow img{height:26px;width:auto}
/* why rows */
.eev2 .why .rows{margin-top:26px;border:1px solid var(--edge);border-radius:12px;overflow:hidden}
.eev2 .wrow{display:grid;grid-template-columns:44px 1fr 1fr;gap:16px;align-items:center;padding:16px 18px;border-bottom:1px solid var(--edge);background:var(--panel)}
.eev2 .wrow:last-child{border-bottom:0}
.eev2 .wrow .n{font-size:12px;font-weight:900;color:var(--ob);font-variant-numeric:tabular-nums}
.eev2 .wrow h3{font-size:14.5px;font-weight:800;color:#fff}
.eev2 .wrow h3 span{display:block;font-size:12px;font-weight:600;color:var(--mut);margin-top:2px}
.eev2 .wrow p{font-size:12.8px;color:var(--mut)}
.eev2 .wrow p b{color:var(--good)}
@media(max-width:820px){.eev2 .wrow{grid-template-columns:34px 1fr}.eev2 .wrow p{grid-column:2}}
/* suite */
.eev2 .suite .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-top:26px}
.eev2 .scard{border:1px solid var(--edge);border-radius:12px;padding:20px 18px;background:var(--panel);position:relative;transition:.18s}
.eev2 .scard:hover{border-color:rgba(222,110,48,.5);transform:translateY(-2px)}
.eev2 .scard .tile{width:40px;height:40px;border-radius:10px;background:#fff;display:grid;place-items:center;margin-bottom:12px}
.eev2 .scard img{width:26px;height:26px}
.eev2 .scard h3{font-size:14.5px;font-weight:800;color:#fff}
.eev2 .scard em{display:block;font-style:normal;font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--ob);margin-top:3px}
.eev2 .scard p{margin-top:8px;font-size:12.5px;color:var(--mut)}
@media(max-width:960px){.eev2 .suite .grid{grid-template-columns:1fr 1fr}}
@media(max-width:560px){.eev2 .suite .grid{grid-template-columns:1fr}}
/* stories */
.eev2 .st .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:26px}
.eev2 .vc{position:relative;border:1px solid var(--edge);padding:0;background:#000;border-radius:12px;overflow:hidden;aspect-ratio:16/10;cursor:pointer;width:100%}
.eev2 .vc img{width:100%;height:100%;object-fit:cover;opacity:.85;transition:.2s}
.eev2 .vc:hover img{opacity:1}
.eev2 .vc .pb{position:absolute;left:12px;bottom:12px;width:40px;height:40px;border-radius:9px;background:var(--o);display:grid;place-items:center}
.eev2 .vc .pb svg{width:15px;height:15px;color:#fff;margin-left:2px}
.eev2 .vc .who{position:absolute;left:64px;bottom:12px;right:12px;text-align:left;color:#fff}
.eev2 .vc .who b{display:block;font-size:12.5px;text-shadow:0 1px 8px rgba(0,0,0,.8)}
.eev2 .vc .who span{font-size:10.5px;color:#C8D4E6;text-shadow:0 1px 8px rgba(0,0,0,.8)}
.eev2 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
@media(max-width:860px){.eev2 .st .grid{grid-template-columns:1fr}}
.eev2 .st .more{margin-top:18px;font-size:13px}
.eev2 .st .more a{color:var(--ob);font-weight:700}
/* quote */
.eev2 .arch blockquote{font-size:clamp(20px,2.9vw,32px);font-weight:800;letter-spacing:-.02em;line-height:1.32;color:#fff;max-width:30ch}
.eev2 .arch blockquote em{font-style:normal;color:var(--ob)}
.eev2 .arch .by{margin-top:14px;font-size:12.5px;color:var(--mut)}
/* industries */
.eev2 .ind .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:26px}
.eev2 .icard{border:1px solid var(--edge);border-radius:12px;padding:16px 18px;background:var(--panel);display:flex;justify-content:space-between;align-items:center;gap:10px;transition:.18s}
.eev2 .icard:hover{border-color:rgba(222,110,48,.5)}
.eev2 .icard b{font-size:13.8px;color:#fff}
.eev2 .icard span{display:block;font-size:11.5px;color:var(--mut)}
.eev2 .icard i{font-style:normal;color:var(--ob)}
@media(max-width:860px){.eev2 .ind .grid{grid-template-columns:1fr}}
/* compare */
.eev2 .cmp .tbl{margin-top:26px;border:1px solid var(--edge);border-radius:12px;overflow:auto;background:var(--panel)}
.eev2 .cmp table{width:100%;border-collapse:collapse;font-size:13px;min-width:560px}
.eev2 .cmp th,.eev2 .cmp td{padding:12px 16px;border-bottom:1px solid var(--edge);text-align:left}
.eev2 .cmp th{font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.eev2 .cmp td:first-child{font-weight:700;color:#fff}
.eev2 .cmp td{color:var(--mut)}
.eev2 .cmp .y{color:var(--good);font-weight:800}
.eev2 .cmp .n{color:#F3808B}
.eev2 .cmp tr:last-child td{border-bottom:0}
/* trust duo */
.eev2 .duo{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:26px}
.eev2 .dcard{border:1px solid var(--edge);border-radius:12px;padding:20px;background:var(--panel)}
.eev2 .dcard h3{font-size:15px;font-weight:800;color:#fff}
.eev2 .chips{display:flex;flex-wrap:wrap;gap:7px;margin-top:12px}
.eev2 .chip{font-size:11px;font-weight:700;color:var(--ink);border:1px solid var(--edge);border-radius:999px;padding:6px 12px;background:rgba(255,255,255,.03)}
@media(max-width:820px){.eev2 .duo{grid-template-columns:1fr}}
/* golive */
.eev2 .go .track{margin-top:26px;display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
.eev2 .tcard{border:1px solid var(--edge);border-radius:12px;padding:18px;background:var(--panel)}
.eev2 .tcard .d{font-size:10px;font-weight:800;letter-spacing:.12em;color:var(--ob);text-transform:uppercase}
.eev2 .tcard h3{margin-top:6px;font-size:14px;font-weight:800;color:#fff}
.eev2 .tcard p{margin-top:6px;font-size:12.5px;color:var(--mut)}
@media(max-width:820px){.eev2 .go .track{grid-template-columns:1fr}}
/* pricing */
.eev2 .price .grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:26px;max-width:760px}
.eev2 .pcard{border:1px solid var(--edge);border-radius:12px;padding:22px;background:var(--panel);transition:.18s}
.eev2 .pcard:hover{border-color:rgba(222,110,48,.5)}
.eev2 .pcard h3{font-size:15.5px;font-weight:800;color:#fff}
.eev2 .pcard p{margin-top:6px;font-size:12.8px;color:var(--mut)}
.eev2 .pcard span{display:inline-block;margin-top:12px;font-size:12.8px;font-weight:800;color:var(--ob)}
@media(max-width:680px){.eev2 .price .grid{grid-template-columns:1fr}}
/* faq */
.eev2 .faq .list{margin-top:26px;display:grid;gap:8px;max-width:820px}
.eev2 details{border:1px solid var(--edge);border-radius:11px;background:var(--panel);padding:0 18px}
.eev2 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:15px 0;font-weight:700;font-size:14px;color:#fff}
.eev2 summary::-webkit-details-marker{display:none}
.eev2 summary::after{content:'+';color:var(--ob);font-size:18px;transition:.2s}
.eev2 details[open] summary::after{transform:rotate(45deg)}
.eev2 details p{padding-bottom:15px;font-size:13px;color:var(--mut)}
/* close */
.eev2 .close{text-align:center;background:radial-gradient(50% 80% at 50% 0%,rgba(222,110,48,.14),transparent)}
.eev2 .close h2{margin-left:auto;margin-right:auto}
.eev2 .close .sub{margin-left:auto;margin-right:auto}
.eev2 .close .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:24px}
/* explore + blog */
.eev2 .cols{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:26px}
.eev2 .col h3{font-size:10.5px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--ob);margin-bottom:10px}
.eev2 .col a{display:block;padding:8px 0;font-size:13.5px;font-weight:600;color:var(--ink);border-bottom:1px solid var(--edge)}
.eev2 .col a:hover{color:var(--ob)}
@media(max-width:820px){.eev2 .cols{grid-template-columns:1fr}}
.eev2 .blog .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:26px}
.eev2 .bcard{border:1px solid var(--edge);border-radius:12px;padding:18px;background:var(--panel);transition:.18s}
.eev2 .bcard:hover{border-color:rgba(222,110,48,.5)}
.eev2 .bcard time{font-size:11px;color:var(--mut);font-weight:700}
.eev2 .bcard h3{margin-top:6px;font-size:14.5px;font-weight:800;color:#fff;line-height:1.35}
.eev2 .bcard span{display:inline-block;margin-top:10px;font-size:12.5px;font-weight:800;color:var(--ob)}
@media(max-width:860px){.eev2 .blog .grid{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.eev2 *{transition:none!important;animation:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v2h1">
  <div class="wr grid">
    <div>
      <span class="status">Vidya AI online &middot; answering in 60 sec</span>
      <h1 id="v2h1">The admission stack that <em>never sleeps</em></h1>
      <p class="lead">ExtraaEdge is <b>India's Intelligent Admissions Growth Platform</b>: an AI layer that answers, scores and calls in the first 60 seconds, on top of a full Education CRM. Built for admission teams, run by 500+ institutions.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Open the live console</a>
      </div>
    </div>
    <div class="ticker" role="img" aria-label="Live feed of enquiries being answered by Vidya AI">
      <div class="th"><i></i><i></i><i></i><span style="margin-left:6px">live &middot; sample data</span></div>
      <div class="row"><span>21:41:08 &middot; Instagram &rarr; B.Tech enquiry</span><b class="ok">ANSWERED 60s</b></div>
      <div class="row"><span>21:41:44 &middot; VidyaPulse intent score</span><b>HIGH &middot; queue #1</b></div>
      <div class="row"><span>21:42:10 &middot; VidyaAgents callback</span><b class="ok">BOOKED 11:00</b></div>
      <div class="row"><span>02:11:52 &middot; portal &rarr; M.Sc enquiry (Marathi)</span><b class="ok">ANSWERED 58s</b></div>
      <div class="row"><span>09:00:00 &middot; counsellor queue built</span><b>HOT FIRST</b></div>
    </div>
  </div>
  <div class="wr">
    <div class="metrics" role="region" aria-label="Key outcomes">
      <div><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
      <div><b>Up to <i>40%</i></b><span>conversion lift</span></div>
      <div><b>10M<i>+</i></b><span>enquiries managed</span></div>
      <div><b>4.7<i>/5</i></b><span>rated by 320+ teams</span></div>
    </div>
  </div>
</section>

<!-- LOGOS -->
<section aria-labelledby="v2logos">
  <div class="wr">
    <p class="lbl" id="v2logos">Running in production</p>
    <h2>500+ institutions, from universities to study-abroad desks</h2>
    <div class="lrow">
      <?php foreach ($LOGOS as $lg): ?><span><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"></span><?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY -->
<section class="why" aria-labelledby="v2why">
  <div class="wr">
    <p class="lbl">The three leaks</p>
    <h2 id="v2why">Funnels do not lose leads. They lose time.</h2>
    <div class="rows">
      <div class="wrow"><span class="n">01</span><h3>The overnight queue<span>Enquiries at 9pm wait till Monday</span></h3><p>VidyaGPT answers in 60 seconds, 24x7, in 95+ languages. <b>Queue removed.</b></p></div>
      <div class="wrow"><span class="n">02</span><h3>The lapsed follow-up<span>The third follow-up never happens</span></h3><p>Sequences with SLAs and escalations. <b>Nothing rides on memory.</b></p></div>
      <div class="wrow"><span class="n">03</span><h3>The blind meeting<span>Nobody can trace spend to admissions</span></h3><p>Funnel, source ROI and counsellor analytics, live. <b>Decisions in minutes.</b></p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- SUITE -->
<section class="suite" aria-labelledby="v2suite">
  <div class="wr">
    <p class="lbl">The AI layer</p>
    <h2 id="v2suite">Vidya AI: three processes, always running</h2>
    <div class="grid">
      <article class="scard"><span class="tile"><img src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt=""></span><h3>VidyaGPT</h3><em>answer()</em><p>Replies on WhatsApp and chat from your approved content only.</p></article>
      <article class="scard"><span class="tile"><img src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt=""></span><h3>VidyaPulse</h3><em>score()</em><p>Ranks every conversation by intent, with the signals shown.</p></article>
      <article class="scard"><span class="tile"><img src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt=""></span><h3>VidyaAgents</h3><em>call()</em><p>Confirms interest by phone and books the counsellor slot.</p></article>
      <article class="scard"><span class="tile"><img src="<?php echo esc_url($V.'vidya-ai.svg'); ?>" alt=""></span><h3>Vidya AI Suite</h3><em>orchestrate()</em><p>All three on one student timeline, on the full CRM.</p></article>
    </div>
  </div>
</section>

<!-- STORIES -->
<section class="st" aria-labelledby="v2st">
  <div class="wr">
    <p class="lbl">Field reports</p>
    <h2 id="v2st">What our clients are saying</h2>
    <div class="grid">
      <?php foreach ($STORIES as $s): ?>
      <button class="vc" data-yt="<?php echo esc_attr($s[0]); ?>" aria-label="Play customer story: <?php echo esc_attr($s[1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($s[0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($s[1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <span class="who"><b><?php echo esc_html($s[1]); ?></b><span><?php echo esc_html($s[2]); ?></span></span>
      </button>
      <?php endforeach; ?>
    </div>
    <p class="more"><a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>">cat all-stories &rarr;</a></p>
  </div>
</section>

<!-- ARCHITECT -->
<section class="arch" aria-label="Working principle">
  <div class="wr">
    <p class="lbl">Configuration policy</p>
    <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
    <p class="by">Configuration, not customization. Applied on every implementation since day one.</p>
  </div>
</section>

<!-- INDUSTRIES -->
<section class="ind" aria-labelledby="v2ind">
  <div class="wr">
    <p class="lbl">Environments</p>
    <h2 id="v2ind">Deployed across every kind of institution</h2>
    <div class="grid">
      <a class="icard" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><span><b>Universities &amp; Colleges</b><span>multi-campus &middot; multi-course</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><span><b>K-12 Schools</b><span>parent-led journeys</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><span><b>Coaching &amp; Test Prep</b><span>high volume &middot; fast cycles</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><span><b>Study Abroad</b><span>document-heavy pipelines</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><span><b>EdTech</b><span>digital-first enrolment</span></span><i>&rarr;</i></a>
      <a class="icard" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><span><b>Vocational</b><span>rolling intakes</span></span><i>&rarr;</i></a>
    </div>
  </div>
</section>

<!-- COMPARE -->
<section class="cmp" aria-labelledby="v2cmp">
  <div class="wr">
    <p class="lbl">diff legacy-crm extraaedge</p>
    <h2 id="v2cmp">The only AI-native Admissions Growth Platform</h2>
    <div class="tbl">
      <table>
        <thead><tr><th scope="col">Question</th><th scope="col">Meritto / LeadSquared</th><th scope="col">Generic CRMs</th><th scope="col">ExtraaEdge</th></tr></thead>
        <tbody>
          <tr><td>2am enquiry</td><td class="n">- waits</td><td class="n">- waits</td><td class="y">+ answered in 60s</td></tr>
          <tr><td>Call order</td><td class="n">- newest first</td><td class="n">- newest first</td><td class="y">+ intent first</td></tr>
          <tr><td>Built for</td><td>education, pre-AI</td><td class="n">- sales pipelines</td><td class="y">+ AI-native admissions</td></tr>
          <tr><td>Go-live</td><td>weeks to months</td><td class="n">- months</td><td class="y">+ 7 days</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- TRUST -->
<section aria-labelledby="v2trust">
  <div class="wr">
    <p class="lbl">Interfaces &amp; guarantees</p>
    <h2 id="v2trust">Open to your stack. Closed to everyone else.</h2>
    <div class="duo">
      <div class="dcard"><h3>50+ integrations</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payments</span><span class="chip">Webhooks &amp; API</span></div></div>
      <div class="dcard"><h3>Security posture</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
    </div>
  </div>
</section>

<!-- GO-LIVE + SWITCH -->
<section class="go" aria-labelledby="v2go">
  <div class="wr">
    <p class="lbl">Deployment</p>
    <h2 id="v2go">7 days to production. 14 with migration.</h2>
    <p class="sub">Switching from spreadsheets or a legacy CRM is part of the same run: data migrated, deduplicated, funnel configured to how your admissions already work.</p>
    <div class="track">
      <div class="tcard"><span class="d">Day 1-2</span><h3>Map</h3><p>Funnel, courses, sources, team structure and rules captured.</p></div>
      <div class="tcard"><span class="d">Day 3-5</span><h3>Configure + migrate</h3><p>Platform set around your funnel; historical data in and deduped.</p></div>
      <div class="tcard"><span class="d">Day 6-7</span><h3>Go live</h3><p>Counsellors onboarded; Vidya AI answers its first real enquiry.</p></div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="price" aria-labelledby="v2price">
  <div class="wr">
    <p class="lbl">Pricing</p>
    <h2 id="v2price">Sized to your institution, quoted in one call</h2>
    <div class="grid">
      <a class="pcard" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM</h3><p>Capture, counselling, follow-ups, applications, fees, analytics.</p><span>CRM pricing &rarr;</span></a>
      <a class="pcard" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on your funnel.</p><span>Vidya AI pricing &rarr;</span></a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq" aria-labelledby="v2faq">
  <div class="wr">
    <p class="lbl">FAQ</p>
    <h2 id="v2faq">Straight answers</h2>
    <div class="list">
      <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. 95% of counsellors are active on the platform after go-live.</p></details>
      <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fees and rules. When unsure, it books a counsellor instead of improvising.</p></details>
      <details><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration, configured around your existing process.</p></details>
      <details><summary>Does it integrate with our tools?</summary><p>Meta, Google, portals, telephony, payments and more: 50+ native integrations plus API and webhooks.</p></details>
      <details><summary>Is the data secure?</summary><p>ISO 27001 certified, GDPR compliant, role-based access and full audit trail.</p></details>
    </div>
  </div>
</section>

<!-- CLOSE -->
<section class="close" aria-labelledby="v2close">
  <div class="wr">
    <p class="lbl" style="text-align:center">Next step</p>
    <h2 id="v2close">Run your own enquiry through it, live</h2>
    <p class="sub">A 30-minute demo on your courses, your sources, your funnel. Watch the 60 seconds happen.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Keep exploring alone</a>
    </div>
  </div>
</section>

<!-- EXPLORE -->
<section aria-labelledby="v2explore">
  <div class="wr">
    <p class="lbl">Index</p>
    <h2 id="v2explore">Explore the platform</h2>
    <div class="cols">
      <div class="col"><h3>Products</h3>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div class="col"><h3>Solutions</h3>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div class="col"><h3>Resources</h3>
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
<?php $v2_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v2_posts)): ?>
<section class="blog" aria-labelledby="v2blog">
  <div class="wr">
    <p class="lbl">Changelog for admissions</p>
    <h2 id="v2blog">Latest from the blog</h2>
    <div class="grid">
      <?php foreach ($v2_posts as $bp): ?>
      <a class="bcard" href="<?php echo esc_url(get_permalink($bp)); ?>">
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
document.querySelectorAll('.eev2 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
