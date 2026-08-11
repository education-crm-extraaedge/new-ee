<?php
/**
 * Front Page v10 - "Mono Minimal"
 * The confidence of saying less: one column, huge type, hairline
 * dividers, no cards, no gradients. Orange appears exactly where a
 * decision is asked for, and nowhere else.
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
<!-- ee-front-v10 mono-minimal -->
<main id="ee-main" class="eev10">
<style>
.eev10{--navy:#19335D;--o:#DE6E30;--od:#B5551D;--ink:#18202E;--mut:#5A6B85;--line:rgba(25,51,93,.14);font-family:'Inter',system-ui,sans-serif;color:var(--ink);background:#fff;line-height:1.7;display:block}
.eev10 *{box-sizing:border-box;margin:0;padding:0}
.eev10 img{max-width:100%;height:auto;display:block}
.eev10 a{text-decoration:none;color:inherit}
.eev10 :focus-visible{outline:2.5px solid var(--o);outline-offset:3px}
.eev10 .col{max-width:680px;margin:0 auto;padding:0 24px}
.eev10 .wide{max-width:920px;margin:0 auto;padding:0 24px}
.eev10 section{padding:clamp(44px,6.5vw,84px) 0}
.eev10 .hr{height:1px;background:var(--line);max-width:920px;margin:0 auto}
.eev10 h2{font-size:clamp(23px,3.1vw,36px);font-weight:800;letter-spacing:-.027em;line-height:1.15;color:var(--navy);max-width:24ch}
.eev10 .p{margin-top:14px;font-size:clamp(15px,1.6vw,17px);color:#33415C;max-width:58ch}
.eev10 .p b{color:var(--navy)}
.eev10 .small{font-size:12.5px;color:var(--mut)}
.eev10 .go{display:inline-block;margin-top:16px;font-size:14.5px;font-weight:800;color:var(--od);border-bottom:2px solid rgba(222,110,48,.35);padding-bottom:2px}
.eev10 .go:hover{border-color:var(--o)}
/* hero */
.eev10 .hero{padding:clamp(72px,11vw,150px) 0 clamp(48px,7vw,96px);text-align:left}
.eev10 .over{font-size:12px;font-weight:800;letter-spacing:.16em;text-transform:uppercase;color:var(--mut)}
.eev10 h1{margin-top:22px;font-size:clamp(38px,6.5vw,86px);font-weight:900;letter-spacing:-.042em;line-height:1.0;color:var(--navy);max-width:15ch}
.eev10 h1 em{font-style:normal;color:var(--o)}
.eev10 .stand{margin-top:24px;font-size:clamp(16px,2vw,21px);color:var(--mut);max-width:44ch;line-height:1.6}
.eev10 .stand b{color:var(--navy)}
.eev10 .acts{margin-top:34px;display:flex;align-items:center;gap:24px;flex-wrap:wrap}
.eev10 .cta1{display:inline-flex;background:var(--o);color:#fff;font-weight:800;font-size:15.5px;border-radius:999px;padding:17px 36px;box-shadow:0 18px 40px -16px rgba(222,110,48,.6);transition:.2s}
.eev10 .cta1:hover{background:var(--od);transform:translateY(-2px)}
.eev10 .cta2{font-weight:700;font-size:14.5px;color:var(--navy);border-bottom:2px solid var(--line);padding-bottom:3px}
.eev10 .cta2:hover{border-color:var(--o)}
.eev10 .fine{margin-top:20px;font-size:12.5px;color:var(--mut);font-weight:600}
/* facts line */
.eev10 .facts{display:flex;gap:clamp(24px,5vw,64px);flex-wrap:wrap}
.eev10 .facts div b{display:block;font-size:clamp(26px,3.4vw,42px);font-weight:900;color:var(--navy);letter-spacing:-.025em;line-height:1.05;font-variant-numeric:tabular-nums}
.eev10 .facts div b i{font-style:normal;color:var(--o)}
.eev10 .facts div span{font-size:12px;color:var(--mut)}
/* logos: one quiet line */
.eev10 .lrow{display:flex;flex-wrap:wrap;align-items:center;gap:26px 40px;margin-top:24px}
.eev10 .lrow img{height:28px;width:auto;opacity:.7;filter:grayscale(45%)}
/* plain lists */
.eev10 .list{margin-top:22px;border-top:1px solid var(--line)}
.eev10 .list .li{display:grid;grid-template-columns:44px 1fr;gap:16px;padding:20px 0;border-bottom:1px solid var(--line);align-items:baseline}
.eev10 .list .n{font-size:12px;font-weight:900;color:var(--od);font-variant-numeric:tabular-nums}
.eev10 .list h3{font-size:17px;font-weight:800;color:var(--navy)}
.eev10 .list p{margin-top:5px;font-size:14px;color:#33415C;max-width:58ch}
.eev10 .list p b{color:var(--navy)}
.eev10 .list img.pi{width:26px;height:26px;display:inline-block;vertical-align:-6px;margin-right:8px}
/* one story */
.eev10 .story{display:grid;grid-template-columns:minmax(0,1fr);gap:20px;margin-top:24px}
.eev10 .vc{position:relative;border:0;padding:0;background:#0F2040;border-radius:6px;overflow:hidden;aspect-ratio:16/9;cursor:pointer;width:100%}
.eev10 .vc img{width:100%;height:100%;object-fit:cover;opacity:.94}
.eev10 .vc .pb{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:62px;height:62px;border-radius:50%;background:rgba(255,255,255,.95);display:grid;place-items:center;transition:.2s}
.eev10 .vc:hover .pb{background:var(--o)}
.eev10 .vc .pb svg{width:20px;height:20px;color:var(--navy);margin-left:3px}
.eev10 .vc:hover .pb svg{color:#fff}
.eev10 .vc iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.eev10 .story blockquote{font-size:clamp(17px,2.1vw,22px);font-weight:700;color:var(--navy);line-height:1.5;max-width:44ch}
.eev10 .story footer{margin-top:10px;font-size:13px;color:var(--mut);font-weight:600}
.eev10 .others{margin-top:18px;font-size:13.5px;color:var(--mut)}
.eev10 .others a{color:var(--od);font-weight:800}
/* the belief band */
.eev10 .belief{background:var(--navy);color:#fff}
.eev10 .belief blockquote{font-size:clamp(24px,3.6vw,44px);font-weight:900;letter-spacing:-.03em;line-height:1.16;max-width:22ch}
.eev10 .belief blockquote em{font-style:normal;color:#FFB98A}
.eev10 .belief p{margin-top:18px;color:#C4D2E8;font-size:14px;max-width:52ch}
/* definition rows (industries/compare/trust condensed as prose definitions) */
.eev10 dl{margin-top:22px;border-top:1px solid var(--line)}
.eev10 dl>div{display:grid;grid-template-columns:200px 1fr;gap:18px;padding:18px 0;border-bottom:1px solid var(--line)}
.eev10 dt{font-size:13.5px;font-weight:800;color:var(--navy)}
.eev10 dd{font-size:14px;color:#33415C}
.eev10 dd b{color:var(--navy)}
.eev10 dd a{color:var(--od);font-weight:700}
@media(max-width:640px){.eev10 dl>div{grid-template-columns:1fr;gap:4px}}
/* faq minimal */
.eev10 details{border-bottom:1px solid var(--line)}
.eev10 summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:14px;align-items:baseline;padding:18px 0;font-weight:700;font-size:15.5px;color:var(--navy)}
.eev10 summary::-webkit-details-marker{display:none}
.eev10 summary::after{content:'+';color:var(--o);font-size:20px;font-weight:600;transition:.2s}
.eev10 details[open] summary::after{transform:rotate(45deg)}
.eev10 details p{padding-bottom:18px;font-size:14px;color:#33415C;max-width:60ch}
/* close */
.eev10 .close{text-align:center;padding:clamp(64px,10vw,130px) 0}
.eev10 .close h2{font-size:clamp(30px,4.8vw,58px);max-width:18ch;margin:0 auto;letter-spacing:-.035em}
.eev10 .close h2 em{font-style:normal;color:var(--o)}
.eev10 .close .p{margin-left:auto;margin-right:auto}
.eev10 .close .acts{justify-content:center}
/* index + blog minimal */
.eev10 .idx{display:grid;grid-template-columns:repeat(3,1fr);gap:clamp(18px,3vw,44px);margin-top:24px}
.eev10 .idx h3{font-size:11px;font-weight:800;letter-spacing:.15em;text-transform:uppercase;color:var(--mut);padding-bottom:10px;border-bottom:1px solid var(--line)}
.eev10 .idx a{display:block;padding:8px 0;font-size:14px;font-weight:600;color:var(--navy)}
.eev10 .idx a:hover{color:var(--od)}
@media(max-width:760px){.eev10 .idx{grid-template-columns:1fr}}
.eev10 .blogl{margin-top:24px;border-top:1px solid var(--line)}
.eev10 .blogl a{display:grid;grid-template-columns:96px 1fr auto;gap:16px;align-items:baseline;padding:16px 0;border-bottom:1px solid var(--line)}
.eev10 .blogl time{font-size:12px;color:var(--mut);font-weight:700;font-variant-numeric:tabular-nums}
.eev10 .blogl h3{font-size:15.5px;font-weight:800;color:var(--navy);line-height:1.35}
.eev10 .blogl a:hover h3{color:var(--od)}
.eev10 .blogl i{font-style:normal;color:var(--o);font-weight:900}
@media(max-width:600px){.eev10 .blogl a{grid-template-columns:1fr auto}.eev10 .blogl time{display:none}}
@media(prefers-reduced-motion:reduce){.eev10 *{transition:none!important}}
</style>

<!-- HERO -->
<section class="hero" aria-labelledby="v10h1">
  <div class="wide">
    <p class="over">ExtraaEdge &middot; India's Intelligent Admissions Growth Platform</p>
    <h1 id="v10h1">Answer in sixty seconds. <em>Enrol more.</em></h1>
    <p class="stand">That is the whole pitch. Vidya AI answers every enquiry in about a minute, day and night; your counsellors talk to students in the right order; the funnel stops leaking. <b>500+ institutions</b> already run on it.</p>
    <div class="acts">
      <a class="cta1" href="#admission-form">Book a Demo</a>
      <a class="cta2" href="<?php echo esc_url(home_url('/product-tour/')); ?>">or explore the live platform &rarr;</a>
    </div>
    <p class="fine">Rated 4.7/5 by 320+ admission teams &middot; go-live in 7 days &middot; no drip campaign afterwards</p>
  </div>
</section>
<div class="hr" role="presentation"></div>

<!-- NUMBERS + LOGOS -->
<section aria-labelledby="v10n">
  <div class="wide">
    <h2 id="v10n" class="visually-hidden" style="position:absolute;left:-9999px">The numbers</h2>
    <div class="facts" role="region" aria-label="Key outcomes">
      <div><b>60 <i>sec</i></b><span>first response, 24x7</span></div>
      <div><b>Up to <i>40%</i></b><span>conversion lift</span></div>
      <div><b>10M<i>+</i></b><span>enquiries managed</span></div>
      <div><b>95%</b><span>counsellor adoption</span></div>
    </div>
    <div class="lrow" aria-label="Institutions using ExtraaEdge">
      <?php foreach ($LOGOS as $lg): ?><img src="<?php echo esc_url($lg[0]); ?>" alt="<?php echo esc_attr($lg[1]); ?>" loading="lazy"><?php endforeach; ?>
    </div>
  </div>
</section>
<div class="hr" role="presentation"></div>

<!-- WHAT IT DOES -->
<section aria-labelledby="v10what">
  <div class="wide">
    <h2 id="v10what">Three problems. Three fixes. Nothing else.</h2>
    <div class="list">
      <div class="li"><span class="n">01</span><div><h3>Enquiries wait, students leave</h3><p><img class="pi" src="<?php echo esc_url($V.'vidya-gpt.svg'); ?>" alt="" width="26" height="26"><b>VidyaGPT</b> answers on WhatsApp and web in about 60 seconds, in 95+ languages, from your own brochure. It escalates instead of guessing.</p></div></div>
      <div class="li"><span class="n">02</span><div><h3>Counsellors dial the wrong order</h3><p><img class="pi" src="<?php echo esc_url($V.'vidya-pulse.svg'); ?>" alt="" width="26" height="26"><b>VidyaPulse</b> scores intent and re-orders the queue; <img class="pi" src="<?php echo esc_url($V.'vidya-ai-voice-agent.svg'); ?>" alt="" width="26" height="26"><b>VidyaAgents</b> calls, confirms and books the counsellor. First dial of the day is a warm one.</p></div></div>
      <div class="li"><span class="n">03</span><div><h3>Follow-ups and reports run on memory</h3><p>The CRM underneath turns every promise into a task with an SLA, and traces every admission to its source and cost. <b>The Friday report writes itself.</b></p></div></div>
    </div>
    <a class="go" href="<?php echo esc_url(home_url('/product-tour/')); ?>">See all of it working, live, no signup &rarr;</a>
  </div>
</section>

<!-- LIVE PLATFORM DEMO -->
<?php if (function_exists('ee_platform_section')) ee_platform_section(); ?>

<!-- ONE STORY -->
<section aria-labelledby="v10st">
  <div class="wide">
    <h2 id="v10st">One story, told properly</h2>
    <div class="story">
      <button class="vc" data-yt="<?php echo esc_attr($STORIES[0][0]); ?>" aria-label="Play customer story: <?php echo esc_attr($STORIES[0][1]); ?>">
        <img src="https://img.youtube.com/vi/<?php echo esc_attr($STORIES[0][0]); ?>/hqdefault.jpg" alt="<?php echo esc_attr($STORIES[0][1]); ?>" loading="lazy" width="480" height="360">
        <span class="pb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
      </button>
      <blockquote>
        &ldquo;ExtraaEdge is an incredibly dynamic and trustworthy platform that truly understands our needs and bridges the gap with technology.&rdquo;
        <footer><?php echo esc_html($STORIES[0][1]); ?>, <?php echo esc_html($STORIES[0][2]); ?></footer>
      </blockquote>
    </div>
    <p class="others">Also on camera: <?php echo esc_html($STORIES[1][1]); ?> (<?php echo esc_html($STORIES[1][2]); ?>), <?php echo esc_html($STORIES[2][1]); ?> (<?php echo esc_html($STORIES[2][2]); ?>) and more &middot; <a href="<?php echo esc_url(home_url('/videos/customer-stories/')); ?>">watch all stories &rarr;</a></p>
  </div>
</section>

<!-- BELIEF -->
<section class="belief" aria-label="Working principle">
  <div class="wide">
    <blockquote>Every admission team is different. We configure around <em>your funnel</em>, not the other way around.</blockquote>
    <p>Configuration, not customization. It is why go-live takes 7 days, 14 with migration, and why 95% of counsellors are still using the platform months later.</p>
  </div>
</section>

<!-- THE REST, AS DEFINITIONS -->
<section aria-labelledby="v10rest">
  <div class="wide">
    <h2 id="v10rest">Everything else you will ask, in one place</h2>
    <dl>
      <div><dt>Who it is for</dt><dd><a href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>">Universities &amp; colleges</a>, <a href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>">K-12 schools</a>, <a href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>">coaching &amp; test prep</a>, <a href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>">study abroad</a>, <a href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>">EdTech</a> and <a href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>">vocational</a> institutions.</dd></div>
      <div><dt>Against legacy CRMs</dt><dd>Meritto, LeadSquared and generic CRMs organise the queue; the <b>only AI-native Admissions Growth Platform</b> removes it: answered at 2am, called in intent order, live in 7 days instead of months.</dd></div>
      <div><dt>Integrations</dt><dd><b>50+</b>: Meta Lead Ads, Google, education portals, cloud telephony and IVR, official WhatsApp Business API, payment gateways, plus API and webhooks. Enquiries flow in automatically.</dd></div>
      <div><dt>Security</dt><dd><b>ISO 27001</b> certified, <b>GDPR</b> compliant, role-based access, India data residency, full audit trail. Admissions data is minors' data; it is treated accordingly.</dd></div>
      <div><dt>Go-live</dt><dd><b>7 days</b> standard, <b>14 with migration</b>: map (day 1-2), configure and migrate (3-5), onboard and answer the first enquiry (6-7). Switching from spreadsheets or a legacy CRM is included.</dd></div>
      <div><dt>Pricing</dt><dd>Sized to team, volume and modules; exact quote in one call. <a href="<?php echo esc_url(home_url('/pricing/crm/')); ?>">Education CRM pricing</a> &middot; <a href="<?php echo esc_url(home_url('/pricing/vidya-ai/')); ?>">Vidya AI pricing</a>.</dd></div>
    </dl>
  </div>
</section>
<div class="hr" role="presentation"></div>

<!-- FAQ -->
<section aria-labelledby="v10faq">
  <div class="wide">
    <h2 id="v10faq">The five questions every first meeting asks</h2>
    <div style="margin-top:16px">
      <details><summary>Will AI replace our counsellors?</summary><p>No. The AI does the waiting, the repetition and the night shift; counsellors do the convincing. That division of labour is why 95% of counsellors are active after go-live.</p></details>
      <details><summary>What does the AI answer from?</summary><p>Only your approved brochure, fee rules and FAQs. When it is unsure, it books a counsellor instead of improvising.</p></details>
      <details><summary>How long is implementation?</summary><p>7 days standard, 14 with data migration, configured around your existing process.</p></details>
      <details><summary>Does it work with our existing tools?</summary><p>Yes: 50+ native integrations plus API and webhooks.</p></details>
      <details><summary>Is student data safe?</summary><p>ISO 27001 certified, GDPR compliant, role-based access, full audit trail.</p></details>
    </div>
  </div>
</section>

<!-- CLOSE -->
<section class="close" aria-labelledby="v10close">
  <div class="wide">
    <h2 id="v10close">Thirty minutes. Your funnel. <em>One real enquiry.</em></h2>
    <p class="p">We run it through Vidya AI in front of you and put your projection in writing. The demo earns the next meeting or it does not.</p>
    <div class="acts">
      <a class="cta1" href="#admission-form">Book the conversation</a>
      <a class="cta2" href="<?php echo esc_url(home_url('/product-tour/')); ?>">or keep exploring alone &rarr;</a>
    </div>
  </div>
</section>
<div class="hr" role="presentation"></div>

<!-- INDEX -->
<section aria-labelledby="v10idx">
  <div class="wide">
    <h2 id="v10idx">The index</h2>
    <div class="idx">
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
    <?php $v10_posts = function_exists('get_posts') ? get_posts(array('numberposts' => 3, 'post_status' => 'publish')) : array(); ?>
    <?php if (!empty($v10_posts)): ?>
    <div class="blogl">
      <?php foreach ($v10_posts as $bp): ?>
      <a href="<?php echo esc_url(get_permalink($bp)); ?>">
        <time><?php echo esc_html(get_the_date('', $bp)); ?></time>
        <h3><?php echo esc_html(get_the_title($bp)); ?></h3>
        <i>&rarr;</i>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
</main>

<?php if (function_exists('ee_demo_drawer')) ee_demo_drawer(); ?>
<script>
document.querySelectorAll('.eev10 .vc').forEach(function(b){
  b.addEventListener('click',function(){
    if(b.dataset.on) return; b.dataset.on='1';
    b.innerHTML='<iframe src="https://www.youtube-nocookie.com/embed/'+b.dataset.yt+'?autoplay=1&rel=0" title="Customer story video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
  });
});
</script>
<?php get_footer(); ?>
