<?php
/**
 * Front Page v07 - "Aurora Glass"
 * The soft-light language of modern AI platforms: aurora gradients in
 * brand hues, frosted glass cards floating over them, depth through
 * blur instead of borders. Calm, premium, unmistakably AI-era.
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
<!-- ee-front-v07 aurora-glass -->
<main id="ee-main" class="eev7">
<style>
.eev7{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#152238;--mut:#546582;--glass:rgba(255,255,255,.66);--gline:rgba(255,255,255,.75);--shadow:0 26px 60px -28px rgba(25,51,93,.35);font-family:'Inter',system-ui,sans-serif;color:var(--ink);line-height:1.6;display:block;position:relative;background:#EEF3FA;overflow:hidden}
.eev7 *{box-sizing:border-box;margin:0;padding:0}
.eev7 img{max-width:100%;height:auto;display:block}
.eev7 a{text-decoration:none;color:inherit}
.eev7 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px;border-radius:6px}
.eev7 .aur{position:absolute;inset:0;pointer-events:none;z-index:0;background:
 radial-gradient(46% 34% at 12% 6%,rgba(222,110,48,.16),transparent),
 radial-gradient(50% 40% at 92% 14%,rgba(25,51,93,.16),transparent),
 radial-gradient(44% 36% at 20% 58%,rgba(25,51,93,.10),transparent),
 radial-gradient(46% 34% at 85% 72%,rgba(222,110,48,.12),transparent),
 radial-gradient(50% 30% at 50% 100%,rgba(25,51,93,.14),transparent)}
.eev7 .wr{position:relative;z-index:1;max-width:1140px;margin:0 auto;padding:0 22px}
.eev7 section{padding:clamp(36px,4.8vw,62px) 0;position:relative;z-index:1}
.eev7 .glass{background:var(--glass);-webkit-backdrop-filter:blur(16px) saturate(150%);backdrop-filter:blur(16px) saturate(150%);border:1px solid var(--gline);border-radius:22px;box-shadow:var(--shadow)}
.eev7 h2{font-size:clamp(22px,2.8vw,33px);font-weight:800;letter-spacing:-.024em;line-height:1.16;color:var(--navy)}
.eev7 .sub{margin-top:10px;color:var(--mut);font-size:14.5px;max-width:62ch}
.eev7 .sub b{color:var(--navy)}
.eev7 .k{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:var(--od);background:var(--glass);border:1px solid var(--gline);border-radius:999px;padding:7px 15px;box-shadow:0 8px 20px -12px rgba(25,51,93,.3)}
.eev7 .btn{display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:14px;border-radius:999px;padding:13px 25px;transition:.2s}
.eev7 .b-o{background:var(--o);color:#fff;box-shadow:0 16px 34px -14px rgba(222,110,48,.6)}
.eev7 .b-o:hover{background:var(--od);transform:translateY(-1px)}
.eev7 .b-g{background:var(--glass);border:1px solid var(--gline);color:var(--navy);-webkit-backdrop-filter:blur(10px);backdrop-filter:blur(10px)}
.eev7 .b-g:hover{border-color:rgba(25,51,93,.3)}
/* hero */
.eev7 .hero{padding:clamp(56px,7.5vw,104px) 0 clamp(36px,4.5vw,58px);text-align:center}
.eev7 h1{margin:18px auto 0;font-size:clamp(32px,4.7vw,58px);font-weight:900;letter-spacing:-.034em;line-height:1.05;color:var(--navy);max-width:19ch}
.eev7 h1 em{font-style:normal;background:linear-gradient(100deg,var(--o),var(--od));-webkit-background-clip:text;background-clip:text;color:transparent}
.eev7 .hero .lead{margin:16px auto 0;font-size:clamp(14.5px,1.5vw,17px);color:var(--mut);max-width:58ch}
.eev7 .hero .lead b{color:var(--navy)}
.eev7 .hero .cta{display:flex;justify-content:center;gap:13px;flex-wrap:wrap;margin-top:26px}
.eev7 .float{max-width:880px;margin:clamp(28px,4vw,44px) auto 0;padding:8px;display:grid;grid-template-columns:1.2fr .8fr;gap:8px}
.eev7 .float .pane{background:rgba(255,255,255,.85);border-radius:16px;padding:16px;text-align:left}
.eev7 .float .ph{font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--mut);margin-bottom:10px}
.eev7 .msg{font-size:12.5px;line-height:1.5;padding:9px 12px;border-radius:12px;max-width:90%;margin-bottom:7px}
.eev7 .m-in{background:#EEF3FA;border-radius:12px 12px 12px 4px}
.eev7 .m-out{background:#E7F6EC;margin-left:auto;border-radius:12px 12px 4px 12px}
.eev7 .score{display:flex;justify-content:space-between;align-items:center;gap:10px;background:#EEF3FA;border-radius:11px;padding:10px 12px;margin-bottom:7px;font-size:12.3px}
.eev7 .score b{color:var(--navy)}
.eev7 .score em{font-style:normal;font-size:10px;font-weight:800;color:var(--od);background:rgba(222,110,48,.12);border-radius:999px;padding:4px 9px}
@media(max-width:820px){.eev7 .float{grid-template-columns:1fr}}
.eev7 .statline{display:flex;justify-content:center;gap:26px 38px;flex-wrap:wrap;margin-top:26px;font-size:12.5px;color:var(--mut);font-weight:700}
.eev7 .statline b{color:var(--navy)}
/* logos */
.eev7 .lstrip{padding:20px 26px;display:flex;align-items:center;gap:24px 38px;flex-wrap:wrap;justify-content:center}
.eev7 .lstrip p{width:100%;text-align:center;font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.eev7 .lstrip img{height:28px;width:auto;opacity:.8}
/* cards */
.eev7 .g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev7 .g2{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:22px}
.eev7 .gcard{padding:22px;border-radius:22px}
.eev7 .gcard h3{font-size:15.5px;font-weight:800;color:var(--navy)}
.eev7 .gcard p{margin-top:7px;font-size:13px;color:var(--mut)}
.eev7 .gcard p b{color:var(--navy)}
.eev7 .gcard img.pi{width:34px;height:34px;margin-bottom:10px}
.eev7 .gcard em.t{display:block;font-style:normal;font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--od);margin-top:2px}
@media(max-width:860px){.eev7 .g3,.eev7 .g2{grid-template-columns:1fr}}
/* stories */
.eev7 .vrow{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev7 .vc{position:relative;border:1px solid var(--gline);padding:0;background:#0F2040;border-radius:22px;overflow:hidden;aspect-ratio:16/10;cursor:pointer;width:100%;box-shadow:var(--shadow)}
.eev7 .vc img{width:100%;height:100%;object-fit:cover;opacity:.92}
.eev7 .vc .pb{position:absolute;left:50%;top:42%;transform:translate(-50%,-50%);width:54px;height:54px;border-radius:50%;background:rgba(255,255,255,.85);-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px);display:grid;place-items:center}
.eev7 .vc:hover .pb{background:var(--o)}
.eev7 .vc .pb svg{width:18px;height:18px;color:var(--navy);margin-left:2px}
.eev7 .vc:hover .pb svg{color:#fff}
.eev7 .vc .who{position:absolute;left:10px;right:10px;bottom:10px;background:rgba(255,255,255,.8);-webkit-backdrop-filter:blur(10px);backdrop-filter:blur(10px);border-radius:14px;padding:9px 13px;text-align:left}
.eev7 .vc .who b{display:block;font-size:12.5px;color:var(--navy)}
.eev7 .vc .who span{font-size:10.5px;color:var(--mut)}
.eev7 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
@media(max-width:860px){.eev7 .vrow{grid-template-columns:1fr}}
/* quote */
.eev7 .quote{padding:clamp(28px,4vw,46px);background:linear-gradient(120deg,rgba(25,51,93,.94),rgba(34,70,124,.94));color:#fff;border:1px solid rgba(255,255,255,.2);border-radius:22px;box-shadow:var(--shadow)}
.eev7 .quote blockquote{font-size:clamp(20px,2.8vw,30px);font-weight:800;letter-spacing:-.02em;line-height:1.3;max-width:30ch}
.eev7 .quote blockquote em{font-style:normal;color:#FFB98A}
.eev7 .quote p{margin-top:12px;color:#C4D2E8;font-size:13px}
/* table glass */
.eev7 .tglass{margin-top:22px;overflow:auto;border-radius:22px}
.eev7 table{width:100%;border-collapse:collapse;font-size:13px;min-width:560px}
.eev7 th,.eev7 td{padding:12px 16px;border-bottom:1px solid rgba(25,51,93,.1);text-align:left}
.eev7 th{font-size:10px;letter-spacing:.11em;text-transform:uppercase;color:var(--mut)}
.eev7 td:first-child{font-weight:700;color:var(--navy)}
.eev7 tr:last-child td{border-bottom:0}
.eev7 .y{color:#157A49;font-weight:800}
.eev7 .n{color:#C43D3D}
/* chips */
.eev7 .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.eev7 .chip{font-size:11.5px;font-weight:700;color:var(--navy);background:rgba(255,255,255,.7);border:1px solid var(--gline);border-radius:999px;padding:6px 12px}
/* go band */
.eev7 .go{display:grid;grid-template-columns:.9fr 1.1fr;gap:14px;margin-top:22px}
.eev7 .go .big{text-align:center;display:flex;flex-direction:column;justify-content:center;padding:26px}
.eev7 .go .big b{font-size:clamp(44px,5.5vw,64px);font-weight:900;color:var(--navy);line-height:1}
.eev7 .go .big b i{font-style:normal;color:var(--o)}
.eev7 .go .big span{font-size:12.5px;color:var(--mut)}
.eev7 .go ol{margin:0;padding:22px;list-style:none;display:grid;gap:12px;counter-reset:g}
.eev7 .go ol li{display:flex;gap:12px;font-size:13.5px;color:var(--ink)}
.eev7 .go ol li::before{counter-increment:g;content:counter(g);flex:none;width:24px;height:24px;border-radius:50%;background:var(--o);color:#fff;font-size:11.5px;font-weight:800;display:grid;place-items:center}
@media(max-width:820px){.eev7 .go{grid-template-columns:1fr}}
/* faq */
.eev7 details{border-radius:16px;padding:0 18px;margin-top:10px}
.eev7 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:center;padding:15px 0;font-weight:700;font-size:14px;color:var(--navy)}
.eev7 summary::-webkit-details-marker{display:none}
.eev7 summary::after{content:'+';color:var(--o);font-size:18px;transition:.18s}
.eev7 details[open] summary::after{transform:rotate(45deg)}
.eev7 details p{padding-bottom:15px;font-size:13.3px;color:var(--mut)}
/* close */
.eev7 .closec{padding:clamp(30px,4.5vw,52px);text-align:center}
.eev7 .closec h2{margin:0 auto}
.eev7 .closec .sub{margin-left:auto;margin-right:auto}
.eev7 .closec .cta{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:22px}
/* explore + blog */
.eev7 .cols{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev7 .cols .gcard a{display:block;padding:7px 0;font-size:13.3px;font-weight:600;color:var(--navy);border-bottom:1px dashed rgba(25,51,93,.15)}
.eev7 .cols .gcard a:hover{color:var(--od)}
.eev7 .cols .gcard a:last-child{border-bottom:0}
@media(max-width:820px){.eev7 .cols{grid-template-columns:1fr}}
.eev7 .blogr{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.eev7 .blogr time{font-size:11px;color:var(--mut);font-weight:800}
.eev7 .blogr h3{margin-top:5px;font-size:14px;line-height:1.35}
.eev7 .blogr span{display:inline-block;margin-top:9px;font-size:12.5px;font-weight:800;color:var(--od)}
@media(max-width:860px){.eev7 .blogr{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.eev7 *{transition:none!important}}
</style>
<div class="aur" aria-hidden="true"></div>

<!-- HERO -->
<section class="hero" aria-labelledby="v7h1">
  <div class="wr">
    <span class="k">India's Intelligent Admissions Growth Platform</span>
    <h1 id="v7h1">Admissions in <em>a new light</em></h1>
    <p class="lead">Vidya AI answers every enquiry in <b>60 seconds</b>, scores intent and books the counsellor, while the CRM beneath carries the journey to enrolment. Run by <b>500+ institutions</b> across India.</p>
    <div class="cta">
      <a class="btn b-o" href="#admission-form">Book a Demo</a>
      <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the live platform</a>
    </div>
    <div class="glass float" role="img" aria-label="An enquiry answered and scored by Vidya AI">
      <div class="pane">
        <p class="ph">Sunday 9:41 pm &middot; WhatsApp &middot; sample data</p>
        <div class="msg m-in">B.Sc Data Science: fee structure? Girls' hostel available?</div>
        <div class="msg m-out">Both covered! Fee page attached; you qualify with PCM 60%+. Counsellor call tomorrow 11am?</div>
        <div class="msg m-in">Yes, book it &#128077;</div>
      </div>
      <div class="pane">
        <p class="ph">VidyaPulse &middot; the morning queue</p>
        <div class="score"><b>Ananya S. &middot; B.Tech</b><em>Hot 92 &middot; first</em></div>
        <div class="score"><b>Rahul M. &middot; MBA</b><em>Warm 61</em></div>
        <div class="score"><b>Ishita K. &middot; B.Com</b><em>Scored</em></div>
      </div>
    </div>
    <p class="statline"><span><b>60 sec</b> first response</span><span><b>Up to 40%</b> conversion lift</span><span><b>10M+</b> enquiries managed</span><span><b>4.7/5</b> from 320+ teams</span></p>
  </div>
</section>

<!-- LOGOS -->
<section aria-label="Institutions using ExtraaEdge" style="padding-top:0">
  <div class="wr">
    <div class="glass lstrip">
      <p>Trusted by 500+ educational institutions</p>
      <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY -->
<section aria-labelledby="v7why">
  <div class="wr">
    <span class="k">The three leaks</span>
    <h2 id="v7why" style="margin-top:12px">Funnels do not lose leads. They lose time.</h2>
    <div class="g3">
      <div class="glass gcard"><h3>The overnight queue</h3><p>Enquiries at 9pm wait till Monday. <b>VidyaGPT answers in 60 seconds</b>, 24x7, in 95+ languages, from your own brochure.</p></div>
      <div class="glass gcard"><h3>The lapsed follow-up</h3><p>Every promise becomes a task with an SLA and escalation. <b>The third follow-up finally happens.</b></p></div>
      <div class="glass gcard"><h3>The blind meeting</h3><p>Funnel, source ROI and counsellor analytics, live. <b>Cost per admission on screen.</b></p></div>
    </div>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- SUITE -->
<section aria-labelledby="v7suite">
  <div class="wr">
    <span class="k">The AI layer</span>
    <h2 id="v7suite" style="margin-top:12px">Vidya AI, floating above your funnel</h2>
    <div class="g3">
      <div class="glass gcard"><img class="pi" src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="" width="34" height="34"><h3>VidyaGPT</h3><em class="t">24x7 chat</em><p>Answers WhatsApp and web enquiries from approved content only; escalates instead of guessing.</p></div>
      <div class="glass gcard"><img class="pi" src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="" width="34" height="34"><h3>VidyaPulse</h3><em class="t">Intent scoring</em><p>Orders the queue hot-first, reasons shown; counsellors can overrule in one click.</p></div>
      <div class="glass gcard"><img class="pi" src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="" width="34" height="34"><h3>VidyaAgents</h3><em class="t">AI calling</em><p>Calls, confirms interest and books the counsellor slot; every first human dial is warm.</p></div>
    </div>
  </div>
</section>

<!-- STORIES -->
<section aria-labelledby="v7st">
  <div class="wr">
    <span class="k">Customer stories</span>
    <h2 id="v7st" style="margin-top:12px">What our clients are saying</h2>
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
  </div>
</section>

<!-- ARCHITECT -->
<section aria-label="Working principle">
  <div class="wr">
    <div class="quote">
      <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
      <p>Configuration, not customization: we study how your admissions actually run, then set the platform around it.</p>
    </div>
  </div>
</section>

<!-- INDUSTRIES -->
<section aria-labelledby="v7ind">
  <div class="wr">
    <span class="k">Fit</span>
    <h2 id="v7ind" style="margin-top:12px">For every kind of institution</h2>
    <div class="g3">
      <a class="glass gcard" href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>"><h3>Universities &amp; Colleges &rarr;</h3><p>Multi-campus, multi-course funnels.</p></a>
      <a class="glass gcard" href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>"><h3>K-12 Schools &rarr;</h3><p>Parent-led admission journeys.</p></a>
      <a class="glass gcard" href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>"><h3>Coaching &amp; Test Prep &rarr;</h3><p>High volume, fast cycles.</p></a>
      <a class="glass gcard" href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>"><h3>Study Abroad &rarr;</h3><p>Counsellor-heavy, document-heavy.</p></a>
      <a class="glass gcard" href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>"><h3>EdTech &rarr;</h3><p>Digital-first enrolment at scale.</p></a>
      <a class="glass gcard" href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>"><h3>Vocational &rarr;</h3><p>Short courses, rolling intakes.</p></a>
    </div>
  </div>
</section>

<!-- COMPARE -->
<section aria-labelledby="v7cmp">
  <div class="wr">
    <span class="k">The comparison</span>
    <h2 id="v7cmp" style="margin-top:12px">The only AI-native Admissions Growth Platform</h2>
    <div class="glass tglass">
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
  </div>
</section>

<!-- TRUST -->
<section aria-labelledby="v7trust">
  <div class="wr">
    <span class="k">Trust</span>
    <h2 id="v7trust" style="margin-top:12px">Open to your stack. Strict with your data.</h2>
    <div class="g2">
      <div class="glass gcard"><h3>50+ integrations</h3><div class="chips"><span class="chip">Meta Lead Ads</span><span class="chip">Google</span><span class="chip">Education portals</span><span class="chip">Telephony &amp; IVR</span><span class="chip">WhatsApp Business API</span><span class="chip">Payments</span><span class="chip">API &amp; webhooks</span></div></div>
      <div class="glass gcard"><h3>Security &amp; compliance</h3><div class="chips"><span class="chip">ISO 27001</span><span class="chip">GDPR</span><span class="chip">Role-based access</span><span class="chip">India data residency</span><span class="chip">Audit trail</span></div></div>
    </div>
  </div>
</section>

<!-- GO-LIVE + PRICING -->
<section aria-labelledby="v7go">
  <div class="wr">
    <span class="k">Logistics</span>
    <h2 id="v7go" style="margin-top:12px">Live in 7 days. Priced to your volumes.</h2>
    <div class="go">
      <div class="glass big"><b>7 <i>days</i></b><span>to go live &middot; 14 with migration &middot; switching included</span></div>
      <div class="glass">
        <ol>
          <li>Day 1-2: funnel, courses, sources and team mapped</li>
          <li>Day 3-5: platform configured; data migrated and deduplicated</li>
          <li>Day 6-7: counsellors onboarded; Vidya AI answers its first enquiry</li>
        </ol>
      </div>
    </div>
    <div class="g2">
      <a class="glass gcard" href="<?php echo esc_url(home_url('/pricing/crm/')); ?>"><h3>Education CRM pricing &rarr;</h3><p>Capture, counselling, follow-ups, applications, fees, analytics.</p></a>
      <a class="glass gcard" href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>"><h3>Vidya AI pricing &rarr;</h3><p>VidyaGPT, VidyaPulse and VidyaAgents on your funnel.</p></a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section aria-labelledby="v7faq">
  <div class="wr">
    <span class="k">FAQ</span>
    <h2 id="v7faq" style="margin-top:12px">Straight answers</h2>
    <details class="glass"><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. 95% of counsellors are active after go-live.</p></details>
    <details class="glass"><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs; when unsure, it books a counsellor.</p></details>
    <details class="glass"><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration.</p></details>
    <details class="glass"><summary>Does it work with our tools?</summary><p>50+ native integrations plus API and webhooks; enquiries flow in automatically.</p></details>
    <details class="glass"><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access, audit trail.</p></details>
  </div>
</section>

<!-- CLOSE -->
<section aria-labelledby="v7close">
  <div class="wr">
    <div class="glass closec">
      <h2 id="v7close">See your funnel in this light</h2>
      <p class="sub">A 30-minute demo on your courses and sources. Bring one real enquiry; watch the first 60 seconds happen live.</p>
      <div class="cta">
        <a class="btn b-o" href="#admission-form">Book a Demo</a>
        <a class="btn b-g" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the platform first</a>
      </div>
    </div>
  </div>
</section>

<!-- EXPLORE -->
<section aria-labelledby="v7explore" style="padding-top:0">
  <div class="wr">
    <h2 id="v7explore">Explore the platform</h2>
    <div class="cols">
      <div class="glass gcard"><em class="t">Products</em>
        <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>">Education CRM</a>
        <a href="<?php echo esc_url(home_url('/products/whatsapp-business-api/')); ?>">WhatsApp Business API</a>
        <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>">Application Management</a>
        <a href="<?php echo esc_url(home_url('/products/cloud-telephony/')); ?>">Cloud Telephony &amp; IVR</a>
        <a href="<?php echo esc_url(home_url('/products/marketing-automation/')); ?>">Marketing Automation</a>
      </div>
      <div class="glass gcard"><em class="t">Solutions</em>
        <a href="<?php echo esc_url(home_url('/use-case/admission-management/')); ?>">Admission Management</a>
        <a href="<?php echo esc_url(home_url('/use-case/enrollment-management/')); ?>">Enrollment Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/lead-management/')); ?>">Lead Management</a>
        <a href="<?php echo esc_url(home_url('/solutions/counselors/')); ?>">For Counsellors</a>
        <a href="<?php echo esc_url(home_url('/solutions/management/')); ?>">For Leadership</a>
      </div>
      <div class="glass gcard"><em class="t">Resources</em>
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
<?php $v7_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
<?php if (!empty($v7_posts)): ?>
<section aria-labelledby="v7blog" style="padding-top:0;padding-bottom:clamp(44px,5.5vw,72px)">
  <div class="wr">
    <h2 id="v7blog">Fresh from the blog</h2>
    <div class="blogr">
      <?php foreach ($v7_posts as $bp): ?>
      <a class="glass gcard" href="<?php echo esc_url(get_permalink($bp)); ?>">
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
document.querySelectorAll('.eev7 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
