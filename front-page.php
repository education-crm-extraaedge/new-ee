<?php
/**
 * front-page.php — Home page template
 * Design preserved 1:1 from approved HTML.
 * All text + images editable via: WP Admin → Settings → 🏠 Home Page Editor
 * Header & Footer inherited from header.php / footer.php
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

// ── Safety net: inline helper functions in case inc/home-editor.php missing ──
if (!function_exists('ee_h')) {
    function ee_h($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        echo esc_html(isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default);
    }
}
if (!function_exists('ee_u')) {
    function ee_u($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        echo esc_url(isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default);
    }
}
if (!function_exists('ee_a')) {
    function ee_a($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        echo esc_attr(isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default);
    }
}
if (!function_exists('ee_raw')) {
    function ee_raw($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        return isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
    }
}

get_header();
?>

<!-- ── Global libs needed by sections (idempotent CDN) ── -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
  if (window.tailwind) {
    tailwind.config = {
      theme: { extend: { colors: {
        brandOrange:'#DE6E30', brandBlue:'#19335D',
        primary:'#19335D', accent:'#DE6E30'
      } } }
    };
  }
</script>

<div id="scroll-progress" style="position:fixed;top:0;left:0;width:0%;height:4px;background:linear-gradient(90deg,#DE6E30,#ff9d6c);z-index:9999"></div>

<!-- ======================== AI ADMISSION CRM HERO ======================== -->
<style>
.crm-hero{position:relative;width:100%;min-height:70vh;display:flex;align-items:center;justify-content:space-evenly;background:linear-gradient(160deg,#ffffff 0%,#f0f4f8 100%);font-family:'Open Sans',sans-serif;color:#19335D;overflow:hidden;padding:20px 5%;box-sizing:border-box;margin-top:15px}
.crm-hero *{box-sizing:border-box}
.crm-hero__bg-orb{position:absolute;width:800px;height:800px;background:radial-gradient(circle,rgba(222,110,48,.05) 0%,rgba(255,255,255,0) 70%);top:-300px;right:-200px;z-index:1;pointer-events:none}
.crm-hero__container{max-width:1300px;width:100%;display:grid;grid-template-columns:1.1fr .9fr;gap:60px;align-items:center;z-index:5}
.crm-hero__content{display:flex;flex-direction:column;gap:24px}
.crm-hero__badge{display:inline-flex;align-items:center;gap:10px;background:#fff;border:1px solid rgba(25,51,93,.12);padding:10px 20px;border-radius:50px;font-size:14px;font-weight:600;color:#19335D;width:fit-content;box-shadow:0 4px 15px rgba(25,51,93,.05);animation:fadeInDown .8s ease-out}
.crm-hero__badge-icon{color:#DE6E30;display:flex;align-items:center}
.crm-hero__headline{font-family:'Poppins',sans-serif;font-size:clamp(44px,5.5vw,72px);line-height:1.05;font-weight:800;margin:0;color:#19335D;letter-spacing:-1.5px}
.crm-hero__headline span{color:#DE6E30;display:block}
.crm-hero__supporting{font-family:'Poppins',sans-serif;font-size:clamp(18px,2.2vw,24px);font-weight:600;margin:0;color:#19335D;line-height:1.3}
.crm-hero__subtext{font-size:18px;line-height:1.8;color:rgba(25,51,93,.7);max-width:600px;margin:0}
.crm-hero__actions{display:flex;flex-direction:column;gap:14px;margin-top:15px}
.crm-hero__cta-wrapper{display:flex;align-items:center;gap:25px;flex-wrap:wrap}
.crm-hero__cta{background:#DE6E30;color:#fff;text-decoration:none;padding:22px 54px;border-radius:16px;font-family:'Poppins',sans-serif;font-weight:700;font-size:19px;transition:all .4s cubic-bezier(.165,.84,.44,1);box-shadow:0 12px 30px rgba(222,110,48,.35);text-align:center;border:2px solid transparent}
.crm-hero__cta:hover{transform:translateY(-5px);box-shadow:0 20px 45px rgba(222,110,48,.45);background:#c55a25}
.crm-hero__live-stats{display:flex;align-items:center;gap:12px}
.crm-hero__status-dot{width:10px;height:10px;background:#10b981;border-radius:50%;box-shadow:0 0 10px #10b981;animation:pulse-green 2s infinite}
.crm-hero__stat-text{font-weight:700;font-size:15px;color:#19335D}
.crm-hero__visual{position:relative;display:flex;flex-direction:column;align-items:center;gap:30px;padding:20px;min-height:500px;justify-content:center}
.flow-card{background:#fff;border:1px solid rgba(25,51,93,.12);border-radius:24px;padding:25px;box-shadow:0 25px 50px rgba(25,51,93,.08);width:100%;max-width:420px;position:relative;transition:all .5s cubic-bezier(.165,.84,.44,1);z-index:2;opacity:0;transform:translateY(20px);display:flex;flex-direction:column}
.flow-card.is-visible{opacity:1;transform:translateY(0)}
.ai-node-main{width:160px;height:160px;background:#19335D;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;position:relative;z-index:10;color:#fff;box-shadow:0 0 60px rgba(25,51,93,.25);transition:all .5s ease}
.ai-node-main.is-active{animation:ai-breathing 3s infinite ease-in-out}
.ai-scanner{position:absolute;top:0;left:0;width:100%;height:100%;border:2px solid #DE6E30;border-radius:50%;opacity:0;transform:scale(.8)}
.ai-node-main.is-active .ai-scanner{animation:scan-pulse 2s infinite ease-out}
.chat-msg{font-size:14px;padding:12px 18px;border-radius:16px;margin-bottom:12px;background:#f1f5f9;color:#19335D;display:inline-block;max-width:85%;line-height:1.5}
.msg-user{align-self:flex-start;border-bottom-left-radius:4px}
.msg-ai{align-self:flex-end;background:rgba(222,110,48,.12);color:#DE6E30;font-weight:600;border-bottom-right-radius:4px;text-align:right}
.crm-hero .status-tag{display:inline-flex;align-items:center;gap:6px;font-size:10px;text-transform:uppercase;font-weight:800;letter-spacing:1.2px;padding:5px 12px;border-radius:6px;background:#f1f5f9;margin-bottom:10px;width:fit-content}
.crm-hero .status-tag--hot{background:#fee2e2;color:#ef4444}
.crm-hero .status-tag--success{background:#dcfce7;color:#10b981}
@keyframes fadeInDown{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}
@keyframes ai-breathing{0%,100%{transform:scale(1);box-shadow:0 0 30px rgba(222,110,48,.15)}50%{transform:scale(1.1);box-shadow:0 0 70px rgba(222,110,48,.4)}}
@keyframes scan-pulse{0%{transform:scale(.9);opacity:.8}100%{transform:scale(1.4);opacity:0}}
@keyframes pulse-green{0%{transform:scale(.95);box-shadow:0 0 0 0 rgba(16,185,129,.7)}70%{transform:scale(1);box-shadow:0 0 0 10px rgba(16,185,129,0)}100%{transform:scale(.95);box-shadow:0 0 0 0 rgba(16,185,129,0)}}
@media(max-width:1024px){.crm-hero__container{grid-template-columns:1fr;text-align:center;gap:60px}.crm-hero__content{align-items:center}.crm-hero__subtext{max-width:100%}.crm-hero__visual{min-height:400px;padding:40px 0}.flow-card{margin:0 auto}}
@media(max-width:768px){.crm-hero{padding:60px 24px}.crm-hero__headline{font-size:42px}.crm-hero__supporting{font-size:18px}.crm-hero__cta{width:100%;padding:20px 30px}.crm-hero__cta-wrapper{justify-content:center;width:100%}.ai-node-main{width:130px;height:130px}}
</style>

<section class="crm-hero" aria-labelledby="hero-heading">
  <div class="crm-hero__bg-orb"></div>
  <div class="crm-hero__container">
    <div class="crm-hero__content">
      <div class="crm-hero__badge">
        <span class="crm-hero__badge-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </span>
        <?php ee_h('hero_badge', 'Loved by Leading Top 500+ Admission Teams'); ?>
      </div>
      <h1 class="crm-hero__headline" id="hero-heading">
        <?php ee_h('hero_h1_part1', 'Convert More Students.'); ?> <span><?php ee_h('hero_h1_part2', 'Automatically.'); ?></span>
      </h1>
      <p class="crm-hero__supporting"><?php ee_h('hero_supporting', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams'); ?></p>
      <p class="crm-hero__subtext"><?php ee_h('hero_subtext', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.'); ?></p>
      <div class="crm-hero__actions">
        <div class="crm-hero__cta-wrapper">
          <a href="<?php ee_u('hero_cta_url', '#demo'); ?>" class="crm-hero__cta"><?php ee_h('hero_cta_text', 'Book Demo'); ?></a>
          <div class="crm-hero__live-stats">
            <span class="crm-hero__status-dot"></span>
            <span class="crm-hero__stat-text"><span id="live-counter"><?php ee_h('hero_counter', '412'); ?></span> <?php ee_h('hero_counter_label', 'Students Converted Today'); ?></span>
          </div>
        </div>
      </div>
    </div>
    <div class="crm-hero__visual" aria-hidden="true">
      <div class="flow-card" id="card-inbound">
        <div class="status-tag">Inbound Message</div>
        <div class="chat-msg msg-user" id="text-inbound"></div>
      </div>
      <div class="ai-node-main" id="ai-processor">
        <div class="ai-scanner"></div>
        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:8px"><path d="M12 2a10 10 0 1 0 10 10H12V2z"></path><path d="M12 12L2.1 12"></path><path d="M12 12L12 22.1"></path><path d="M12 12l7.07-7.07"></path></svg>
        <span style="font-size:13px;font-weight:800;font-family:'Poppins';letter-spacing:1px">AI CORE</span>
        <span id="ai-status-label" style="font-size:9px;opacity:.8;margin-top:4px">IDLE</span>
      </div>
      <div class="flow-card" id="card-outcome">
        <div class="status-tag" style="align-self:flex-end">AI Response</div>
        <div class="chat-msg msg-ai" id="text-outcome"></div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:5px">
          <span class="status-tag status-tag--hot">Qualified Lead</span>
          <span class="status-tag status-tag--success" style="font-weight:800">Admitted 🎉</span>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
window.onscroll = () => {
  var sp = document.getElementById("scroll-progress");
  if(sp) sp.style.width = ((window.scrollY/(document.body.scrollHeight-window.innerHeight))*100)+"%";
};
(function(){
  const scenarios = [
    { in: "I want to apply for the Computer Science MBA. What's the deadline?", out: "Hi! Deadline is Oct 15th. I've analyzed your profile—you qualify for our fast-track scholarship! Book a call?", status: "ANALYZING INTENT" },
    { in: "Do you offer financial aid for international students from Asia?", out: "Yes! We have 3 specific grants for your region. I've sent the brochures to your email and notified a counselor.", status: "OPTIMIZING ENGAGEMENT" },
    { in: "I'm looking for a part-time Masters program that starts in January.", out: "Perfect. We have 2 hybrid spots left. I've prioritized your application for immediate review.", status: "PRIORITIZING LEAD" }
  ];
  let i=0;
  const inboundCard=document.getElementById('card-inbound'),outcomeCard=document.getElementById('card-outcome'),aiNode=document.getElementById('ai-processor'),aiLabel=document.getElementById('ai-status-label'),inText=document.getElementById('text-inbound'),outText=document.getElementById('text-outcome');
  if(!inboundCard) return;
  async function typeText(el,text,speed=40){el.innerHTML="";for(let i=0;i<text.length;i++){el.innerHTML+=text.charAt(i);await new Promise(r=>setTimeout(r,speed))}}
  async function run(){const s=scenarios[i];inboundCard.classList.remove('is-visible');outcomeCard.classList.remove('is-visible');aiNode.classList.remove('is-active');aiLabel.innerText="WAITING";await new Promise(r=>setTimeout(r,1000));inboundCard.classList.add('is-visible');await typeText(inText,s.in);await new Promise(r=>setTimeout(r,800));aiNode.classList.add('is-active');aiLabel.innerText=s.status;await new Promise(r=>setTimeout(r,2000));outcomeCard.classList.add('is-visible');await typeText(outText,s.out,30);i=(i+1)%scenarios.length;setTimeout(run,5000)}
  const cEl=document.getElementById('live-counter');
  const updateCounter=()=>{if(!cEl)return;let v=parseInt(cEl.innerText);if(Math.random()>.6)cEl.innerText=v+1;setTimeout(updateCounter,7000)};
  window.addEventListener('DOMContentLoaded',()=>{run();updateCounter()});
})();
</script>

<!-- ======================== LOGO MARQUEE ======================== -->
<style>
.sp-section{padding:15px 20px;position:relative;overflow:hidden;background:#fff;font-family:'Open Sans',sans-serif}
.sp-container{max-width:1200px;margin:0 auto;text-align:center}
.sp-header{margin-bottom:40px}
.sp-badge-modern{display:inline-block;background:rgba(222,110,48,.1);color:#DE6E30;padding:6px 16px;border-radius:100px;font-size:.875rem;font-weight:600;margin-bottom:15px;letter-spacing:.5px;text-transform:uppercase}
.sp-heading{font-family:'Poppins',sans-serif;color:#19335D;font-size:2.5rem;line-height:1.2;margin:0 auto 15px;max-width:800px}
.sp-subheading{color:#4B5563;font-size:1.125rem;max-width:600px;margin:0 auto}
.sp-marquee-container{position:relative;padding:20px 0}
.sp-marquee-container::before,.sp-marquee-container::after{content:"";position:absolute;top:0;width:150px;height:100%;z-index:2;pointer-events:none}
.sp-marquee-container::before{left:0;background:linear-gradient(to right,#fff,transparent)}
.sp-marquee-container::after{right:0;background:linear-gradient(to left,#fff,transparent)}
.sp-marquee-track{display:flex;gap:30px;padding-bottom:20px;width:max-content}
.sp-track-1{animation:scrollLeft 40s linear infinite}
.sp-track-2{animation:scrollRight 40s linear infinite}
.sp-logo-card{width:200px;height:100px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:flex;align-items:center;justify-content:center;padding:20px;transition:transform .3s ease,border-color .3s ease;flex-shrink:0}
.sp-logo-card:hover{border-color:#DE6E30;transform:translateY(-5px)}
.sp-img{max-width:100%;max-height:100%;object-fit:contain;filter:grayscale(100%);opacity:.7;transition:all .3s ease}
.sp-logo-card:hover .sp-img{filter:grayscale(0);opacity:1}
@keyframes scrollLeft{0%{transform:translateX(0)}100%{transform:translateX(calc(-50% - 15px))}}
@keyframes scrollRight{0%{transform:translateX(calc(-50% - 15px))}100%{transform:translateX(0)}}
.sp-footer{margin-top:30px;display:flex;flex-direction:column;align-items:center;gap:15px}
.sp-cta-btn{background:#DE6E30;color:#fff;text-decoration:none;padding:14px 28px;border-radius:8px;font-family:'Poppins',sans-serif;font-size:1rem;transition:background-color .3s ease,transform .2s ease;box-shadow:0 4px 14px rgba(222,110,48,.3)}
.sp-cta-btn:hover{background:#c55d28;transform:scale(1.05)}
.sp-live-indicator{display:flex;align-items:center;gap:10px;font-size:.85rem;color:#19335D;font-weight:600}
.sp-pulse-dot{width:8px;height:8px;background:#10b981;border-radius:50%;position:relative}
.sp-pulse-dot::after{content:"";position:absolute;width:100%;height:100%;background:#10b981;border-radius:50%;animation:sppulse 2s infinite}
@keyframes sppulse{0%{transform:scale(1);opacity:.8}100%{transform:scale(3);opacity:0}}
@media (max-width:768px){.sp-heading{font-size:1.6rem}.sp-logo-card{width:150px;height:80px}.sp-section{padding:15px}}
</style>
<section class="sp-section">
  <div class="sp-container">
    <header class="sp-header">
      <div class="sp-badge-modern"><?php ee_h('logos_badge', 'Leading Institutions'); ?></div>
      <h2 class="sp-heading"><?php ee_h('logos_heading', 'Trusted by 500+ Institutions Growing Faster Than Ever'); ?></h2>
      <p class="sp-subheading"><?php ee_h('logos_subheading', 'AI-powered automation for the next generation of education leaders.'); ?></p>
    </header>
    <div class="sp-marquee-container">
      <?php
      $t1 = array(
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp','XISS'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg','Logo'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png','Anant National University'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp','SR University'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp','Hamstek'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp','Adani'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp','Techno India'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp','Final Logo'),
      );
      $t2 = array(
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/JGI-JAIN-2.webp','Jain University'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/01/mit-shillong.png','MIT Shillong'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/isdi.webp','ISDI'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/09/jio-v3-3.png','Jio Institute'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/dpu-3.webp','DPU'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/Graphic-Era-3.webp','Graphic Era'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/fostima.webp','Fostima'),
      );
      ?>
      <div class="sp-marquee-track sp-track-1">
        <?php for ($i=1;$i<=8;$i++): $u=ee_raw("logo_t1_{$i}_url",$t1[$i-1][0]); $a=ee_raw("logo_t1_{$i}_alt",$t1[$i-1][1]); ?>
          <div class="sp-logo-card"><img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($a); ?>" class="sp-img" loading="lazy"></div>
        <?php endfor; ?>
        <?php for ($i=1;$i<=4;$i++): $u=ee_raw("logo_t1_{$i}_url",$t1[$i-1][0]); $a=ee_raw("logo_t1_{$i}_alt",$t1[$i-1][1]); ?>
          <div class="sp-logo-card"><img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($a); ?>" class="sp-img" loading="lazy"></div>
        <?php endfor; ?>
      </div>
      <div class="sp-marquee-track sp-track-2">
        <?php for ($i=1;$i<=7;$i++): $u=ee_raw("logo_t2_{$i}_url",$t2[$i-1][0]); $a=ee_raw("logo_t2_{$i}_alt",$t2[$i-1][1]); ?>
          <div class="sp-logo-card"><img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($a); ?>" class="sp-img" loading="lazy"></div>
        <?php endfor; ?>
        <?php for ($i=1;$i<=5;$i++): $u=ee_raw("logo_t2_{$i}_url",$t2[$i-1][0]); $a=ee_raw("logo_t2_{$i}_alt",$t2[$i-1][1]); ?>
          <div class="sp-logo-card"><img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($a); ?>" class="sp-img" loading="lazy"></div>
        <?php endfor; ?>
      </div>
    </div>
    <footer class="sp-footer">
      <a href="<?php ee_u('logos_cta_url','#get-started'); ?>" class="sp-cta-btn"><?php ee_h('logos_cta_text','Start Converting Today'); ?></a>
      <div class="sp-live-indicator">
        <span class="sp-pulse-dot"></span>
        <span><?php ee_h('logos_live_text','Live: +124 Admissions Processed in last 1hr'); ?></span>
      </div>
    </footer>
  </div>
</section>

<!-- ======================== VIDYAAI ADMISSION INTELLIGENCE ======================== -->
<style>
.vai-wrap{font-family:'Plus Jakarta Sans',sans-serif;background:#fff;color:#19335D;overflow-x:hidden}
.vai-wrap .story-section{min-height:100vh;display:flex;flex-direction:column;justify-content:center;opacity:.1;transition:all .9s cubic-bezier(.16,1,.3,1);transform:translateY(40px);padding:4rem 0}
.vai-wrap .story-section.active{opacity:1;transform:translateY(0)}
.vai-wrap .visual-viewport{position:sticky;top:0;height:100vh;display:flex;align-items:center;justify-content:center;perspective:2000px}
.vai-wrap .crm-interface{width:100%;height:85vh;max-height:700px;background:#fff;border-radius:24px;box-shadow:0 50px 100px -20px rgba(25,51,93,.15);border:1px solid rgba(25,51,93,.1);overflow:hidden;display:flex;flex-direction:column;transition:all .8s cubic-bezier(.19,1,.22,1)}
.vai-wrap .crm-sidebar{width:64px;background:#0F172A;height:100%;display:flex;flex-direction:column;align-items:center;padding:20px 0;gap:24px}
.vai-wrap .sidebar-icon{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.4);cursor:pointer;transition:.3s}
.vai-wrap .sidebar-icon.active{background:#DE6E30;color:#fff}
.vai-wrap .crm-main{flex:1;background:#F1F5F9;padding:24px;overflow-y:auto;position:relative}
.vai-wrap .wave-bar{width:3px;background:#DE6E30;border-radius:10px;animation:vai-wave 0.8s infinite ease-in-out}
@keyframes vai-wave{0%,100%{height:10px}50%{height:40px}}
.vai-wrap .text-gradient{background:linear-gradient(135deg,#19335D 0%,#DE6E30 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.vai-wrap .lead-card{background:#fff;border-radius:16px;padding:16px;border:1px solid rgba(0,0,0,.05);margin-bottom:12px;transition:.3s}
.vai-wrap .status-pill{font-size:9px;font-weight:800;text-transform:uppercase;padding:2px 8px;border-radius:99px}
@media(max-width:1024px){.vai-wrap .main-grid{display:block}.vai-wrap .visual-viewport{position:relative;height:auto;padding:2rem 0}.vai-wrap .story-section{min-height:auto;opacity:1;transform:none;padding:3rem 0}.vai-wrap .crm-interface{height:500px}}
</style>
<div class="vai-wrap">
<main class="max-w-[1440px] mx-auto px-6 lg:grid lg:grid-cols-2 gap-12 main-grid">
  <div class="relative z-10">
    <section id="vai-hero" class="story-section active" data-stage="hero">
      <div class="mb-6 inline-flex items-center gap-2 px-3 py-1 bg-blue-50 rounded-lg">
        <div class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></div>
        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest"><?php ee_h('vidya_badge','VidyaAI Admission Intelligence'); ?></span>
      </div>
      <h2 class="text-5xl lg:text-7xl font-extrabold leading-[1.1] mb-8">
        <?php ee_h('vidya_h1_part1','Powerful Admission CRM'); ?> <br><span class="text-gradient"><?php ee_h('vidya_h1_part2','with simplicity.'); ?></span>
      </h2>
      <p class="text-xl text-slate-500 mb-10 leading-relaxed max-w-lg"><?php ee_h('vidya_subtitle','A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.'); ?></p>
      <div class="flex flex-wrap gap-4">
        <a href="<?php ee_u('vidya_cta1_url','#demo'); ?>" class="bg-slate-900 text-white px-8 py-4 rounded-xl font-bold hover:shadow-xl transition-all"><?php ee_h('vidya_cta1_text','Book Private Demo'); ?></a>
        <a href="<?php ee_u('vidya_cta2_url','#platform'); ?>" class="bg-white border border-slate-200 text-slate-600 px-8 py-4 rounded-xl font-bold hover:bg-slate-50 transition-all"><?php ee_h('vidya_cta2_text','Explore Platform'); ?></a>
      </div>
    </section>
    <section id="vai-assist" class="story-section" data-stage="assist">
      <div class="mb-4 text-blue-600 font-bold tracking-tighter text-2xl">01.</div>
      <h2 class="text-4xl font-bold mb-6">AI Admission Assist</h2>
      <p class="text-slate-600 text-lg leading-relaxed mb-8">24×7 AI that answers student queries, guides applications, and supports counselors with live context to keep admissions moving without delays.</p>
      <div class="grid grid-cols-2 gap-4">
        <div class="p-4 bg-slate-50 rounded-2xl"><div class="text-blue-900 font-bold text-sm mb-1">Instant Guide</div><div class="text-xs text-slate-500 leading-snug">Answers eligibility and fee queries instantly.</div></div>
        <div class="p-4 bg-slate-50 rounded-2xl"><div class="text-blue-900 font-bold text-sm mb-1">Doc Assist</div><div class="text-xs text-slate-500 leading-snug">Guides students through complex upload processes.</div></div>
      </div>
    </section>
    <section id="vai-scoring" class="story-section" data-stage="scoring">
      <div class="mb-4 text-orange-600 font-bold tracking-tighter text-2xl">02.</div>
      <h2 class="text-4xl font-bold mb-6">AI Lead Intent Scoring</h2>
      <p class="text-slate-600 text-lg leading-relaxed mb-8">Automatically prioritizes high-intent leads using behavior and funnel signals so counselors focus only where conversions are most likely.</p>
      <div class="bg-[#19335D] text-white p-6 rounded-3xl">
        <div class="flex justify-between items-center mb-4"><span class="text-xs opacity-60 uppercase font-bold tracking-widest">Predictive Lift</span><span class="text-orange-400 font-bold">+340%</span></div>
        <p class="text-sm">High-intent leads are flagged in real-time based on session duration, page depth, and interaction frequency.</p>
      </div>
    </section>
    <section id="vai-followup" class="story-section" data-stage="followup">
      <div class="mb-4 text-indigo-600 font-bold tracking-tighter text-2xl">03.</div>
      <h2 class="text-4xl font-bold mb-6">Smart Follow-up Intelligence</h2>
      <p class="text-slate-600 text-lg leading-relaxed mb-8">AI tells your team who to follow up with, when to act, and what to do next, improving response speed and reducing missed opportunities.</p>
      <div class="space-y-4">
        <div class="flex items-center gap-4 p-4 border border-slate-100 rounded-2xl"><div class="w-2 h-2 rounded-full bg-green-500"></div><span class="text-sm font-semibold text-slate-700">Automated multi-channel sequencing</span></div>
        <div class="flex items-center gap-4 p-4 border border-slate-100 rounded-2xl"><div class="w-2 h-2 rounded-full bg-blue-500"></div><span class="text-sm font-semibold text-slate-700">Predictive 'Next Best Action' engine</span></div>
      </div>
    </section>
    <section id="vai-calling" class="story-section" data-stage="calling">
      <div class="mb-4 text-red-600 font-bold tracking-tighter text-2xl">04.</div>
      <h2 class="text-4xl font-bold mb-6">AI Calling for Qualification & Scale</h2>
      <p class="text-slate-600 text-lg leading-relaxed mb-8">AI-powered calling qualifies large volumes of inquiries, captures intent, and passes only serious prospects to counselors at scale.</p>
    </section>
    <section id="vai-performance" class="story-section" data-stage="performance">
      <div class="mb-4 text-green-600 font-bold tracking-tighter text-2xl">05.</div>
      <h2 class="text-4xl font-bold mb-6">Counselor Performance Intelligence</h2>
      <p class="text-slate-600 text-lg leading-relaxed mb-12">Clear visibility into response times, follow-ups, and conversion impact by counselor to drive focused coaching and better outcomes.</p>
      <a href="<?php ee_u('vidya_cta1_url','#demo'); ?>" class="block text-center bg-[#DE6E30] text-white w-full py-5 rounded-2xl font-bold text-lg hover:scale-[1.02] transition-transform"><?php ee_h('vidya_final_cta','Get Started with VidyaAI'); ?></a>
    </section>
  </div>
  <div class="visual-viewport">
    <div class="crm-interface" id="crmWindow">
      <div class="h-12 border-b bg-white flex items-center px-6 justify-between shrink-0">
        <div class="flex gap-2"><div class="w-3 h-3 rounded-full bg-[#FF5F56]"></div><div class="w-3 h-3 rounded-full bg-[#FFBD2E]"></div><div class="w-3 h-3 rounded-full bg-[#27C93F]"></div></div>
        <div class="bg-slate-100 px-4 py-1 rounded-lg text-[10px] font-bold text-slate-400">app.extraaedge.com/admissions/v2</div>
        <div class="w-4 h-4 bg-slate-200 rounded-full"></div>
      </div>
      <div class="flex flex-1 overflow-hidden">
        <aside class="crm-sidebar">
          <div class="sidebar-icon active" data-goto="hero"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></div>
          <div class="sidebar-icon" data-goto="assist"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg></div>
          <div class="sidebar-icon" data-goto="scoring"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
          <div class="sidebar-icon" data-goto="followup"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg></div>
          <div class="sidebar-icon" data-goto="performance"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg></div>
        </aside>
        <main class="crm-main" id="crmApp">
          <div id="view-hero" class="crm-view">
            <div class="flex justify-between items-center mb-6"><h3 class="font-bold text-lg">Admission Dashboard</h3><div class="text-[10px] bg-white border px-3 py-1 rounded-full font-bold">Aug 2024 Cycle</div></div>
            <div class="grid grid-cols-3 gap-4 mb-6">
              <div class="bg-white p-4 rounded-xl border border-slate-200"><div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Total Inquiries</div><div class="text-2xl font-black">12,482</div></div>
              <div class="bg-white p-4 rounded-xl border border-slate-200"><div class="text-[10px] text-slate-400 font-bold uppercase mb-1">AI Qualified</div><div class="text-2xl font-black text-blue-600">8,941</div></div>
              <div class="bg-white p-4 rounded-xl border border-slate-200"><div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Conversion</div><div class="text-2xl font-black text-orange-500">14.2%</div></div>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-4 h-48 flex items-end justify-between gap-2">
              <div class="bg-slate-100 w-full rounded-t-lg" style="height:40%"></div>
              <div class="bg-slate-100 w-full rounded-t-lg" style="height:60%"></div>
              <div class="bg-blue-200 w-full rounded-t-lg" style="height:45%"></div>
              <div class="bg-blue-600 w-full rounded-t-lg" style="height:85%"></div>
              <div class="bg-slate-100 w-full rounded-t-lg" style="height:50%"></div>
              <div class="bg-slate-100 w-full rounded-t-lg" style="height:30%"></div>
              <div class="bg-orange-500 w-full rounded-t-lg" style="height:95%"></div>
            </div>
          </div>
          <div id="view-assist" class="crm-view hidden">
            <div class="flex items-center gap-4 mb-8 bg-white p-4 rounded-2xl shadow-sm border border-slate-200">
              <div class="w-12 h-12 rounded-full bg-slate-200 border-2 border-white overflow-hidden"><img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="avatar"></div>
              <div class="flex-1"><p class="font-bold text-sm">Aditya Rao</p><p class="text-[10px] text-slate-400">Seeking BBA Admissions 2024</p></div>
              <span class="status-pill bg-green-100 text-green-700">Online</span>
            </div>
            <div class="space-y-4">
              <div class="bg-white p-3 rounded-2xl rounded-tl-none border shadow-sm max-w-[80%] text-[11px] leading-relaxed">"Is there any scholarship for students with 90%+ in Class 12?"</div>
              <div class="bg-slate-900 text-white p-4 rounded-2xl rounded-tr-none ml-auto max-w-[85%] text-[11px] leading-relaxed shadow-lg">
                <p id="typewriter"></p>
                <div class="mt-2 pt-2 border-t border-white/10 flex justify-between items-center"><span class="text-[9px] font-bold opacity-60">AI COUNSELOR</span><span class="text-[9px] bg-blue-600 px-2 py-0.5 rounded">Action Required</span></div>
              </div>
            </div>
          </div>
          <div id="view-scoring" class="crm-view hidden">
            <h3 class="font-bold text-sm mb-4">AI High-Intent Pipeline</h3>
            <div class="space-y-3">
              <div class="lead-card flex items-center justify-between">
                <div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center font-bold text-[10px]">SM</div><div><p class="text-[11px] font-bold">Siddharth M.</p><p class="text-[9px] text-slate-400">Viewed Fees 4 times</p></div></div>
                <div class="text-right"><span class="text-xs font-black text-orange-600" id="liveScore">0%</span><p class="text-[8px] font-bold text-slate-300">INTENT SCORE</p></div>
              </div>
              <div class="lead-card flex items-center justify-between opacity-40">
                <div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-slate-100"></div><div><p class="text-[11px] font-bold">Riya S.</p><p class="text-[9px] text-slate-400">Idle for 12 days</p></div></div>
                <div class="text-right"><span class="text-xs font-black text-slate-400">12%</span></div>
              </div>
            </div>
          </div>
          <div id="view-followup" class="crm-view hidden">
            <h3 class="font-bold text-sm mb-4">Team Next Actions</h3>
            <div class="space-y-3">
              <div class="p-3 bg-white rounded-xl border-l-4 border-l-blue-600 shadow-sm"><div class="flex justify-between items-center mb-1"><span class="text-[10px] font-bold text-blue-600">FOLLOW UP</span><span class="text-[9px] text-slate-400 font-bold">DUE NOW</span></div><p class="text-[11px] font-bold">Call Karan: Scholarship docs pending</p></div>
              <div class="p-3 bg-white rounded-xl border-l-4 border-l-orange-500 shadow-sm"><div class="flex justify-between items-center mb-1"><span class="text-[10px] font-bold text-orange-500">WHATSAPP</span><span class="text-[9px] text-slate-400 font-bold">10:30 AM</span></div><p class="text-[11px] font-bold">Send Brochure: Sneha P.</p></div>
            </div>
          </div>
          <div id="view-calling" class="crm-view hidden flex flex-col items-center justify-center h-full">
            <div class="w-20 h-20 bg-red-500 rounded-full flex items-center justify-center text-white mb-6 shadow-2xl relative">
              <div class="absolute inset-0 bg-red-400 rounded-full animate-ping opacity-20"></div>
              <svg class="w-8 h-8 relative" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
            </div>
            <div class="flex items-center gap-1.5 h-10 mb-4" id="waves"></div>
            <p class="text-xs font-bold">Calling +91 9876X XXX01</p>
            <p class="text-[9px] text-slate-400 mt-1">AI Qualification in Progress...</p>
          </div>
          <div id="view-performance" class="crm-view hidden">
            <h3 class="font-bold text-sm mb-6">Counselor Intelligence</h3>
            <div class="space-y-6">
              <div class="bg-white p-4 rounded-xl border border-slate-200"><div class="flex justify-between mb-2"><span class="text-[11px] font-bold">Conversion Rate</span><span class="text-[11px] font-black text-green-600">+12% vs last cycle</span></div><div class="h-2 bg-slate-100 rounded-full overflow-hidden"><div class="h-full bg-blue-600" style="width:76%"></div></div></div>
              <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 p-3 rounded-lg text-center"><p class="text-[8px] font-bold text-blue-400 mb-1">RESPONSE TIME</p><p class="text-lg font-black text-blue-900">1.4m</p></div>
                <div class="bg-orange-50 p-3 rounded-lg text-center"><p class="text-[8px] font-bold text-orange-400 mb-1">CLOSURE RATE</p><p class="text-lg font-black text-orange-900">9.2x</p></div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</main>
</div>
<script>
(function(){
  const sections=document.querySelectorAll('.vai-wrap .story-section'),crmWindow=document.getElementById('crmWindow'),views=document.querySelectorAll('.vai-wrap .crm-view'),sidebarIcons=document.querySelectorAll('.vai-wrap .sidebar-icon');
  if(!crmWindow) return;
  function typeEffect(text,id){const el=document.getElementById(id);if(!el)return;el.innerHTML="";let i=0;const t=setInterval(()=>{if(i<text.length){el.innerHTML+=text.charAt(i);i++}else clearInterval(t)},30)}
  function scoreSim(){const el=document.getElementById('liveScore');if(!el)return;let v=0;const t=setInterval(()=>{if(v<98){v++;el.innerText=v+'%'}else clearInterval(t)},15)}
  function waveSim(){const w=document.getElementById('waves');if(!w)return;w.innerHTML='';for(let i=0;i<12;i++){const b=document.createElement('div');b.className='wave-bar';b.style.animationDelay=`${i*.1}s`;w.appendChild(b)}}
  const obs=new IntersectionObserver((es)=>{es.forEach(e=>{if(e.isIntersecting){const s=e.target.getAttribute('data-stage');sections.forEach(x=>x.classList.remove('active'));e.target.classList.add('active');views.forEach(v=>v.classList.add('hidden'));const v=document.getElementById(`view-${s}`);if(v)v.classList.remove('hidden');sidebarIcons.forEach(i=>i.classList.toggle('active',i.dataset.goto===s));if(s==='assist')typeEffect("Yes, Aditya! We offer a Merit Scholarship. For 90%+ in Class 12, you get a 25% tuition fee waiver. Would you like to check the criteria?","typewriter");if(s==='scoring')scoreSim();if(s==='calling')waveSim();if(s==='hero')crmWindow.style.transform='perspective(1000px) rotateY(0deg)';if(s==='assist')crmWindow.style.transform='perspective(1000px) rotateY(-8deg) rotateX(2deg) scale(1.05)';if(s==='scoring')crmWindow.style.transform='perspective(1000px) rotateY(8deg) rotateX(-2deg) scale(1.05)';if(s==='calling')crmWindow.style.transform='scale(1.1) translateZ(100px)';if(s==='performance')crmWindow.style.transform='perspective(1000px) rotateX(5deg) scale(1.02)'}})},{threshold:.6});
  sections.forEach(s=>obs.observe(s));
})();
</script>

<!-- ======================== ADMISSION CRM (Pipeline) ======================== -->
<style>
#wp-admission-crm{--primary-accent:#DE6E30;--dark-base:#19335D;--bg-light:#f8fafc;background:var(--bg-light);font-family:'Open Sans',sans-serif;color:var(--dark-base);padding:80px 20px;overflow:hidden;line-height:1.6}
#wp-admission-crm .container{max-width:1200px;margin:0 auto;display:flex;flex-direction:column;align-items:center;gap:40px}
#wp-admission-crm .header-group{text-align:center;max-width:900px}
#wp-admission-crm h2{font-family:'Poppins',sans-serif;font-size:clamp(2rem,5vw,3.5rem);font-weight:700;margin-bottom:20px;line-height:1.1;color:var(--dark-base)}
#wp-admission-crm .subheadline{font-size:clamp(1rem,2vw,1.15rem);color:#4b5563;margin-bottom:30px;max-width:800px;margin-left:auto;margin-right:auto}
#wp-admission-crm .funnel-system{width:100%;position:relative;padding:100px 0 40px;margin:20px 0}
#wp-admission-crm .funnel-track{display:flex;justify-content:space-between;position:relative;z-index:2;gap:10px}
#wp-admission-crm .track-line{position:absolute;top:50%;left:10%;right:10%;height:4px;background:#e2e8f0;z-index:1;transform:translateY(-50%)}
#wp-admission-crm .track-progress{position:absolute;top:0;left:0;height:100%;width:0;background:var(--primary-accent);box-shadow:0 0 15px var(--primary-accent);transition:width .5s linear}
#wp-admission-crm .stage{flex:1;display:flex;flex-direction:column;align-items:center;text-align:center;position:relative}
#wp-admission-crm .stage-dot{width:20px;height:20px;background:#fff;border:3px solid #e2e8f0;border-radius:50%;margin-bottom:15px;z-index:3;transition:.4s cubic-bezier(.16,1,.3,1)}
#wp-admission-crm .stage.active .stage-dot{border-color:var(--primary-accent);background:var(--primary-accent);box-shadow:0 0 0 6px rgba(222,110,48,.15)}
#wp-admission-crm .lead-card{background:#fff;padding:14px;border-radius:12px;width:180px;box-shadow:0 10px 25px -5px rgba(25,51,93,.1);border-left:4px solid var(--primary-accent);position:absolute;top:-85px;left:0;z-index:10;pointer-events:none;display:flex;flex-direction:column;gap:4px}
#wp-admission-crm .card-title{font-weight:700;font-size:.85rem;color:var(--dark-base)}
#wp-admission-crm .card-meta{font-size:.75rem;color:#64748b}
#wp-admission-crm .stage-label{font-family:'Poppins',sans-serif;font-weight:600;font-size:.8rem;color:#94a3b8;transition:.4s}
#wp-admission-crm .stage.active .stage-label{color:var(--dark-base)}
#wp-admission-crm .moments-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:25px;width:100%}
#wp-admission-crm .moment-card{background:#fff;padding:30px;border-radius:20px;box-shadow:0 10px 25px -5px rgba(25,51,93,.1);transition:.4s;display:flex;flex-direction:column;height:100%}
#wp-admission-crm .moment-card:hover{transform:translateY(-5px)}
#wp-admission-crm .moment-icon{width:44px;height:44px;background:rgba(222,110,48,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:20px}
#wp-admission-crm .moment-label{font-family:'Poppins',sans-serif;font-size:1.15rem;font-weight:700;margin-bottom:12px;color:var(--dark-base)}
#wp-admission-crm .moment-desc{color:#64748b;font-size:.9rem;margin-bottom:20px;flex-grow:1}
#wp-admission-crm .insight-badge{align-self:flex-start;background:var(--dark-base);color:#fff;padding:5px 12px;border-radius:100px;font-size:.75rem;font-weight:600}
#wp-admission-crm .footer-cta{margin-top:20px;text-align:center}
#wp-admission-crm .btn-primary{background:var(--primary-accent);color:#fff;padding:18px 40px;border-radius:100px;font-family:'Poppins',sans-serif;font-weight:700;text-decoration:none;font-size:1rem;box-shadow:0 10px 20px rgba(222,110,48,.25);transition:.4s;display:inline-block}
#wp-admission-crm .btn-primary:hover{transform:translateY(-2px);background:#c85d25}
#wp-admission-crm .closing-statement{margin-top:25px;font-family:'Poppins',sans-serif;font-weight:600;color:#94a3b8;text-transform:uppercase;letter-spacing:1px;font-size:.8rem}
@media(max-width:992px){#wp-admission-crm{padding:60px 15px}#wp-admission-crm .moments-grid{grid-template-columns:1fr;gap:20px}#wp-admission-crm .funnel-system{padding:20px 0;margin:40px 0;max-width:320px}#wp-admission-crm .funnel-track{flex-direction:column;align-items:flex-start;gap:30px;padding-left:40px}#wp-admission-crm .track-line{left:50px;top:0;bottom:0;width:4px;height:100%;transform:none}#wp-admission-crm .track-progress{width:100%!important;height:0;transition:height .5s linear}#wp-admission-crm .stage{flex-direction:row;text-align:left;gap:20px}#wp-admission-crm .stage-dot{margin-bottom:0}#wp-admission-crm .lead-card{position:absolute;left:80px!important;top:0;width:160px;transform:none!important}}
@media(max-width:480px){#wp-admission-crm h2{font-size:1.8rem}#wp-admission-crm .btn-primary{width:100%;padding:18px 20px}}
</style>
<section id="wp-admission-crm">
  <div class="container">
    <div class="header-group">
      <h2><?php ee_h('adm_h2','Every admission. Tracked. Moving forward.'); ?></h2>
      <p class="subheadline"><?php ee_h('adm_subheadline','Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent lead prioritization ensures your team focuses on candidates that convert.'); ?></p>
    </div>
    <div class="funnel-system" id="pipeline-container">
      <div class="track-line"><div class="track-progress" id="pipeline-progress"></div></div>
      <div class="funnel-track">
        <div class="lead-card" id="active-lead"><span class="card-title" id="lead-name">New Inquiry</span><span class="card-meta" id="lead-status">Analyzing Intent...</span><div style="height:4px;background:#f1f5f9;border-radius:2px;margin-top:4px;overflow:hidden"><div id="card-inner-bar" style="height:100%;width:30%;background:#DE6E30;transition:width .5s"></div></div></div>
        <div class="stage" data-label="New Inquiry"><div class="stage-dot"></div><span class="stage-label">Inquiry</span></div>
        <div class="stage" data-label="Lead Scored"><div class="stage-dot"></div><span class="stage-label">Verified</span></div>
        <div class="stage" data-label="Nurturing"><div class="stage-dot"></div><span class="stage-label">Automation</span></div>
        <div class="stage" data-label="High Intent"><div class="stage-dot"></div><span class="stage-label">Counseling</span></div>
        <div class="stage" data-label="Finalizing"><div class="stage-dot"></div><span class="stage-label">Enrolled</span></div>
      </div>
    </div>
    <div class="moments-grid">
      <div class="moment-card">
        <div class="moment-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
        <div class="moment-label">Funnel Management</div>
        <p class="moment-desc">Gain full visibility into the prospect journey. Track every touchpoint and eliminate bottlenecks automatically.</p>
        <span class="insight-badge">"Nothing gets stuck"</span>
      </div>
      <div class="moment-card">
        <div class="moment-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
        <div class="moment-label">Smart Follow-ups</div>
        <p class="moment-desc">Intelligent triggers manage application reminders and engagement while your team focuses on high-potential leads.</p>
        <span class="insight-badge">Engagement: +65%</span>
      </div>
      <div class="moment-card">
        <div class="moment-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
        <div class="moment-label">Real-time Insights</div>
        <p class="moment-desc">Data-driven decisions guided by a central dashboard. Identify top-performing channels instantly.</p>
        <span class="insight-badge">Data-guided Growth</span>
      </div>
    </div>
    <div class="footer-cta">
      <a href="<?php ee_u('adm_cta_url','#'); ?>" class="btn-primary"><?php ee_h('adm_cta_text','Explore the Flow'); ?></a>
      <div class="closing-statement"><?php ee_h('adm_closing','Full visibility. Zero chaos. More conversions.'); ?></div>
    </div>
  </div>
</section>
<script>
(function(){
  const stages=document.querySelectorAll('#wp-admission-crm .stage'),progress=document.getElementById('pipeline-progress'),leadCard=document.getElementById('active-lead'),leadName=document.getElementById('lead-name'),leadStatus=document.getElementById('lead-status'),cardInnerBar=document.getElementById('card-inner-bar');
  if(!stages.length||!progress)return;
  const names=["Ruchika S.","Amit K.","Sara J.","David L."];let cs=0,ci=0;
  function up(){const isM=window.innerWidth<=992,cr=document.getElementById('pipeline-container').getBoundingClientRect(),ts=stages[cs],sr=ts.getBoundingClientRect();leadCard.style.transition="all .8s cubic-bezier(.16,1,.3,1)";if(!isM){const x=sr.left-cr.left+(sr.width/2)-(leadCard.offsetWidth/2);leadCard.style.left=x+"px";leadCard.style.top="-85px";const p=(cs/(stages.length-1))*80+10;progress.style.width=(cs===0?0:p)+"%";progress.style.height="100%"}else{const y=sr.top-cr.top+(sr.height/2)-(leadCard.offsetHeight/2);leadCard.style.top=y+"px";const p=(cs/(stages.length-1))*100;progress.style.height=p+"%";progress.style.width="100%"}stages.forEach((s,i)=>{if(i<=cs)s.classList.add('active');else s.classList.remove('active')});leadStatus.innerText=ts.getAttribute('data-label');cardInnerBar.style.width=((cs+1)*20)+"%";if(cs<stages.length-1)cs++;else setTimeout(()=>{cs=0;ci=(ci+1)%names.length;leadName.innerText=names[ci];leadCard.style.opacity="0";setTimeout(()=>leadCard.style.opacity="1",100)},2000)}
  leadName.innerText=names[0];setInterval(up,2500);window.addEventListener('resize',up);up();
})();
</script>

<!-- ======================== AI MARKETING SYSTEM ======================== -->
<style>
#wp-ai-marketing-system{--primary:#DE6E30;--secondary:#19335D;--bg:#F8FAFC;--card-bg:#fff;--text:#1e293b;--text-muted:#64748B;padding:clamp(60px,10vw,120px) 20px;font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);overflow-x:hidden}
#wp-ai-marketing-system .container{max-width:1140px;margin:0 auto}
#wp-ai-marketing-system .header-content{text-align:center;margin-bottom:60px;max-width:850px;margin-inline:auto}
#wp-ai-marketing-system .status-tag{display:inline-flex;align-items:center;gap:10px;background:#fff;padding:8px 18px;border-radius:100px;font-size:.75rem;font-weight:700;color:var(--secondary);box-shadow:0 4px 20px rgba(0,0,0,.06);border:1px solid rgba(0,0,0,.03);margin-bottom:24px}
#wp-ai-marketing-system .pulse-dot{width:10px;height:10px;background:#10b981;border-radius:50%;position:relative}
#wp-ai-marketing-system .pulse-dot::after{content:'';position:absolute;width:100%;height:100%;background:inherit;border-radius:50%;animation:mkt-dot 2s infinite}
@keyframes mkt-dot{0%{transform:scale(1);opacity:.8}100%{transform:scale(3);opacity:0}}
#wp-ai-marketing-system .main-headline{font-family:'Poppins',sans-serif;font-size:clamp(2rem,6vw,3.2rem);line-height:1.1;color:var(--secondary);margin-bottom:20px;font-weight:700;letter-spacing:-.02em}
#wp-ai-marketing-system .highlight{color:var(--primary)}
#wp-ai-marketing-system .subtext{font-size:1.1rem;color:var(--text-muted);line-height:1.6}
#wp-ai-marketing-system .engine-preview{background:var(--card-bg);border-radius:32px;padding:60px 40px;box-shadow:0 25px 60px -15px rgba(25,51,93,.08);margin-bottom:50px;border:1px solid rgba(25,51,93,.05)}
#wp-ai-marketing-system .visual-flow-wrapper{display:flex;align-items:center;justify-content:space-between;position:relative}
#wp-ai-marketing-system .flow-step{display:flex;flex-direction:column;align-items:center;gap:14px;flex:0 0 auto;width:130px;z-index:10;cursor:pointer}
#wp-ai-marketing-system .icon-box{width:68px;height:68px;background:var(--bg);border-radius:20px;display:flex;align-items:center;justify-content:center;color:var(--secondary);transition:.4s;border:1px solid rgba(0,0,0,.05)}
#wp-ai-marketing-system .flow-step:hover .icon-box{transform:translateY(-8px);box-shadow:0 15px 30px rgba(222,110,48,.15);border-color:var(--primary);color:var(--primary)}
#wp-ai-marketing-system .icon-box.ai-active{background:var(--secondary);color:#fff;border:none}
#wp-ai-marketing-system .icon-box.success-box{background:#10b981;color:#fff;border:none}
#wp-ai-marketing-system .step-label{font-size:.7rem;font-weight:800;text-transform:uppercase;color:var(--secondary);text-align:center;line-height:1.3;letter-spacing:.05em;margin:0}
#wp-ai-marketing-system .flow-connector{flex:1;height:2px;position:relative;margin-top:-34px;min-width:20px}
#wp-ai-marketing-system .arrow-container{position:relative;width:100%;height:100%;display:flex;align-items:center}
#wp-ai-marketing-system .arrow-line-bg{position:absolute;width:100%;height:2px;background:#f1f5f9}
#wp-ai-marketing-system .arrow-line-active{position:absolute;width:0;height:2px;background:var(--primary);animation:mkt-fill 3s infinite cubic-bezier(.4,0,.2,1)}
#wp-ai-marketing-system .arrow-head-moving{position:absolute;left:0;width:10px;height:10px;border-top:2.5px solid var(--primary);border-right:2.5px solid var(--primary);transform:rotate(45deg);margin-top:-4px;animation:mkt-mv 3s infinite cubic-bezier(.4,0,.2,1)}
@keyframes mkt-fill{0%{width:0;left:0;opacity:0}10%{opacity:1}40%,60%{width:100%;left:0;opacity:1}90%{opacity:1}100%{width:0;left:100%;opacity:0}}
@keyframes mkt-mv{0%{left:0;opacity:0}10%{opacity:1}90%{opacity:1}100%{left:100%;opacity:0}}
#wp-ai-marketing-system .flow-details-hint{text-align:center;margin-top:35px;font-size:.95rem;color:var(--text-muted);font-weight:500;height:1.5em;transition:.4s}
#wp-ai-marketing-system .automation-card{background:var(--card-bg);border-radius:32px;overflow:hidden;box-shadow:0 40px 100px -20px rgba(0,0,0,.05);border:1px solid rgba(0,0,0,.04)}
#wp-ai-marketing-system .card-grid{display:grid;grid-template-columns:1.1fr .9fr}
#wp-ai-marketing-system .content-side{padding:clamp(30px,6vw,60px)}
#wp-ai-marketing-system .badge{display:inline-block;background:rgba(222,110,48,.1);color:var(--primary);padding:6px 14px;border-radius:8px;font-size:.75rem;font-weight:800;margin-bottom:20px;text-transform:uppercase;letter-spacing:.1em}
#wp-ai-marketing-system .card-title{font-size:clamp(1.6rem,3.5vw,2.4rem);color:var(--secondary);margin-bottom:20px;font-family:'Poppins';line-height:1.2;font-weight:700}
#wp-ai-marketing-system .description{font-size:1.05rem;line-height:1.7;color:var(--text-muted);margin-bottom:35px}
#wp-ai-marketing-system .metric-row{display:flex;gap:45px;padding-top:30px;border-top:1px solid #f1f5f9}
#wp-ai-marketing-system .mini-stat .val{display:block;font-size:2.2rem;font-weight:800;color:var(--secondary);font-family:'Poppins';line-height:1;margin-bottom:8px}
#wp-ai-marketing-system .mini-stat .lbl{font-size:.8rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.05em}
#wp-ai-marketing-system .features-side{background:#f8fafc;padding:clamp(30px,6vw,60px);display:flex;flex-direction:column;justify-content:center;border-left:1px solid rgba(0,0,0,.03)}
#wp-ai-marketing-system .feature-title{font-weight:800;font-size:.85rem;margin-bottom:30px;color:var(--secondary);letter-spacing:.1em;opacity:.8}
#wp-ai-marketing-system .feature-list{list-style:none;padding:0;display:flex;flex-direction:column;gap:28px;margin:0}
#wp-ai-marketing-system .feature-item{display:flex;align-items:flex-start;gap:20px}
#wp-ai-marketing-system .feat-icon{width:44px;height:44px;background:#fff;border-radius:12px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;box-shadow:0 8px 16px rgba(0,0,0,.05)}
#wp-ai-marketing-system .feat-name{display:block;font-weight:700;font-size:1.05rem;color:var(--secondary);margin-bottom:2px}
#wp-ai-marketing-system .feat-desc{display:block;font-size:.85rem;color:var(--text-muted);font-weight:500}
#wp-ai-marketing-system .cta-box{text-align:center;margin-top:70px}
#wp-ai-marketing-system .btn-primary{display:inline-flex;align-items:center;gap:14px;background:var(--primary);color:#fff;padding:20px 50px;border-radius:16px;font-weight:700;text-decoration:none;box-shadow:0 15px 40px rgba(222,110,48,.4);transition:.4s;font-size:1.15rem}
#wp-ai-marketing-system .btn-primary:hover{transform:translateY(-4px);box-shadow:0 25px 50px rgba(222,110,48,.5)}
#wp-ai-marketing-system .stats-footer{margin-top:30px;font-size:.95rem;color:var(--text-muted);font-weight:500}
@media(max-width:960px){#wp-ai-marketing-system .card-grid{grid-template-columns:1fr}#wp-ai-marketing-system .features-side{border-left:none;border-top:1px solid rgba(0,0,0,.05)}#wp-ai-marketing-system .visual-flow-wrapper{flex-direction:column;align-items:flex-start;padding-left:30px;gap:0}#wp-ai-marketing-system .flow-step{flex-direction:row;width:100%;gap:25px;padding:15px 0;justify-content:flex-start}#wp-ai-marketing-system .step-label{text-align:left;font-size:.85rem}#wp-ai-marketing-system .icon-box{width:56px;height:56px;border-radius:16px}#wp-ai-marketing-system .flow-connector{width:2px;height:50px;margin-left:27px;margin-top:0;margin-bottom:0;flex:none}#wp-ai-marketing-system .arrow-container{flex-direction:column;height:100%;width:100%}#wp-ai-marketing-system .arrow-line-bg{width:2px;height:100%;left:0;top:0}#wp-ai-marketing-system .arrow-line-active{width:2px;height:0;left:0;top:0;animation:mkt-fillv 3s infinite cubic-bezier(.4,0,.2,1)}#wp-ai-marketing-system .arrow-head-moving{left:-4.5px;top:0;transform:rotate(135deg);animation:mkt-mvv 3s infinite cubic-bezier(.4,0,.2,1)}@keyframes mkt-fillv{0%{height:0;top:0;opacity:0}10%{opacity:1}40%,60%{height:100%;top:0;opacity:1}90%{opacity:1}100%{height:0;top:100%;opacity:0}}@keyframes mkt-mvv{0%{top:0;opacity:0}10%{opacity:1}90%{opacity:1}100%{top:100%;opacity:0}}}
</style>
<section id="wp-ai-marketing-system">
  <div class="container">
    <header class="header-content">
      <div class="status-tag"><span class="pulse-dot"></span><span><?php ee_h('mkt_status','AI Engine: Live Processing'); ?></span></div>
      <h2 class="main-headline"><?php ee_h('mkt_h2_part1','Automate Every Inquiry.'); ?><br><span class="highlight"><?php ee_h('mkt_h2_part2','Convert Every Student.'); ?></span></h2>
      <p class="subtext"><?php ee_h('mkt_subtext','From the first touchpoint to final enrollment, our AI-driven automation ensures no lead is left behind. Experience precision marketing that scales with your institution.'); ?></p>
    </header>
    <div class="engine-preview">
      <div class="visual-flow-wrapper">
        <div class="flow-step" data-info="Automatic lead capture from Web, WhatsApp, and Social Media inquiries instantly."><div class="icon-box"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><h3 class="step-label">Student Inquiry</h3></div>
        <div class="flow-connector"><div class="arrow-container"><div class="arrow-line-bg"></div><div class="arrow-line-active"></div><div class="arrow-head-moving"></div></div></div>
        <div class="flow-step" data-info="Intelligent audience segmentation based on student intent and real-time behavior."><div class="icon-box ai-active"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2a10 10 0 1 0 10 10H12V2z"></path><path d="M12 12L2.69 7"></path><path d="M12 12l5.63 8.16"></path></svg></div><h3 class="step-label">AI Segmentation</h3></div>
        <div class="flow-connector"><div class="arrow-container"><div class="arrow-line-bg"></div><div class="arrow-line-active"></div><div class="arrow-head-moving"></div></div></div>
        <div class="flow-step" data-info="Delivering hyper-personalized emails and targeted campaigns at the perfect moment."><div class="icon-box"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div><h3 class="step-label">Personalized Message</h3></div>
        <div class="flow-connector"><div class="arrow-container"><div class="arrow-line-bg"></div><div class="arrow-line-active"></div><div class="arrow-head-moving"></div></div></div>
        <div class="flow-step" data-info="Omnichannel nurturing across WhatsApp, SMS, and Email to ensure high engagement."><div class="icon-box"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div><h3 class="step-label">Auto Follow-ups</h3></div>
        <div class="flow-connector"><div class="arrow-container"><div class="arrow-line-bg"></div><div class="arrow-line-active"></div><div class="arrow-head-moving"></div></div></div>
        <div class="flow-step" data-info="Seamless CRM integration for final document verification and enrollment success."><div class="icon-box success-box"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg></div><h3 class="step-label">Admission Confirmed</h3></div>
      </div>
      <div id="flow-hint" class="flow-details-hint">Click a step to explore the AI logic</div>
    </div>
    <article class="automation-card">
      <div class="card-grid">
        <div class="content-side">
          <nav><span class="badge">Marketing Automation</span></nav>
          <h3 class="card-title"><?php ee_h('mkt_card_title','Scale Your Outreach With Precision'); ?></h3>
          <p class="description"><?php ee_h('mkt_description','Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time.'); ?></p>
          <div class="metric-row">
            <div class="mini-stat"><span class="val">98%</span><span class="lbl">Delivery Accuracy</span></div>
            <div class="mini-stat"><span class="val" id="enroll-counter">0</span><span class="lbl">Monthly Conversions</span></div>
          </div>
        </div>
        <div class="features-side">
          <h4 class="feature-title">POPULAR FEATURES:</h4>
          <ul class="feature-list">
            <li class="feature-item"><div class="feat-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div><div><span class="feat-name">Email Marketing</span><span class="feat-desc">Personalized drip campaigns</span></div></li>
            <li class="feature-item"><div class="feat-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div><div><span class="feat-name">Integrated Channels</span><span class="feat-desc">WhatsApp, SMS & Social Media</span></div></li>
            <li class="feature-item"><div class="feat-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></div><div><span class="feat-name">Campaign Analytics</span><span class="feat-desc">Real-time performance tracking</span></div></li>
          </ul>
        </div>
      </div>
    </article>
    <div class="cta-box">
      <a href="<?php ee_u('mkt_cta_url','#demo'); ?>" class="btn-primary"><?php ee_h('mkt_cta_text','Activate AI Automation'); ?><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" width="18"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
      <p class="stats-footer">Processing <span id="msg-total">0</span> data-driven student interactions today</p>
    </div>
  </div>
</section>
<script>
(function(){
  const steps=document.querySelectorAll('#wp-ai-marketing-system .flow-step'),hint=document.getElementById('flow-hint'),ec=document.getElementById('enroll-counter'),mt=document.getElementById('msg-total');
  if(!steps.length)return;
  steps.forEach(s=>{const info=s.getAttribute('data-info');s.addEventListener('mouseenter',()=>{hint.innerText=info;hint.style.color='#DE6E30';hint.style.fontWeight='700'});s.addEventListener('mouseleave',()=>{hint.innerText='Click a step to explore the AI logic';hint.style.color='#64748B';hint.style.fontWeight='500'})});
  const anim=(el,tgt)=>{const st=performance.now(),dur=2500;const stp=(now)=>{const p=Math.min((now-st)/dur,1),e=1-Math.pow(1-p,5);el.innerText=Math.floor(e*tgt).toLocaleString();if(p<1)requestAnimationFrame(stp)};requestAnimationFrame(stp)};
  const obs=new IntersectionObserver(es=>{if(es[0].isIntersecting){if(ec)anim(ec,142);if(mt)anim(mt,1245);obs.disconnect()}},{threshold:.1});
  if(ec)obs.observe(ec);
})();
</script>

<!-- ======================== CHATBOT & LIVE CHAT ======================== -->
<style>
#wp-chatbot-system{--primary:#DE6E30;--secondary:#19335D;--bg-light:#F8FAFC;--border:#E2E8F0;background:var(--bg-light);padding:100px 20px;font-family:'Open Sans',sans-serif;color:#334155;line-height:1.6;position:relative;overflow:hidden}
#wp-chatbot-system .container{max-width:1240px;margin:0 auto;position:relative;z-index:1}
#wp-chatbot-system .flex-wrapper{display:flex;flex-wrap:wrap;gap:60px;align-items:center}
#wp-chatbot-system .content-side{flex:1.2;min-width:320px}
#wp-chatbot-system .visual-side{flex:1;min-width:320px}
#wp-chatbot-system h2{font-family:'Poppins',sans-serif;font-size:clamp(34px,4.5vw,42px);line-height:1.2;color:var(--secondary);margin:0 0 20px}
#wp-chatbot-system .description{font-size:17px;color:#64748B;margin-bottom:25px}
#wp-chatbot-system .feature-highlights{display:flex;flex-direction:column;gap:15px;margin-bottom:35px}
#wp-chatbot-system .highlight-item{display:flex;align-items:center;gap:12px;font-weight:600;color:var(--secondary)}
#wp-chatbot-system .highlight-item svg{color:var(--primary)}
#wp-chatbot-system .chat-device{background:#fff;border-radius:32px;padding:10px;box-shadow:0 40px 80px -15px rgba(25,51,93,.15);border:1px solid var(--border);max-width:400px;margin:0 auto}
#wp-chatbot-system .chat-screen{background:#fff;border-radius:26px;height:600px;display:flex;flex-direction:column;overflow:hidden;border:1px solid #F1F5F9}
#wp-chatbot-system .chat-nav{padding:15px 20px;background:var(--secondary);color:#fff;display:flex;align-items:center;gap:12px}
#wp-chatbot-system .chat-content{flex:1;padding:20px;overflow-y:auto;display:flex;flex-direction:column;gap:12px;background:#F9FAFB}
#wp-chatbot-system .bubble{max-width:85%;padding:12px 16px;border-radius:16px;font-size:13.5px;opacity:0;transform:translateY(10px);transition:all .4s ease;line-height:1.5}
#wp-chatbot-system .bubble.show{opacity:1;transform:translateY(0)}
#wp-chatbot-system .bubble.bot{background:#fff;color:#334155;align-self:flex-start;border:1px solid var(--border);border-bottom-left-radius:2px}
#wp-chatbot-system .bubble.user{background:var(--primary);color:#fff;align-self:flex-end;border-bottom-right-radius:2px}
#wp-chatbot-system .bot-status{display:inline-block;margin-top:6px;font-size:9px;font-weight:700;color:var(--primary);background:rgba(222,110,48,.08);padding:2px 8px;border-radius:4px;text-transform:uppercase;letter-spacing:.5px}
#wp-chatbot-system .thinking{display:flex;gap:4px;padding:12px 16px;background:#f1f1f1;width:fit-content;border-radius:16px;margin-bottom:10px}
#wp-chatbot-system .dot{width:6px;height:6px;background:#888;border-radius:50%;animation:bot-bounce 1.4s infinite ease-in-out}
#wp-chatbot-system .dot:nth-child(1){animation-delay:-.32s}
#wp-chatbot-system .dot:nth-child(2){animation-delay:-.16s}
@keyframes bot-bounce{0%,80%,100%{transform:scale(0)}40%{transform:scale(1)}}
#wp-chatbot-system .calendar-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:12px;margin-top:5px;box-shadow:0 4px 6px rgba(0,0,0,.05)}
#wp-chatbot-system .cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:5px}
#wp-chatbot-system .cal-cell{aspect-ratio:1;display:flex;align-items:center;justify-content:center;font-size:10px;border-radius:4px;background:#F3F4F6}
#wp-chatbot-system .cal-cell.active{background:var(--primary);color:#fff;font-weight:bold}
@media(max-width:991px){#wp-chatbot-system .flex-wrapper{flex-direction:column;text-align:center}#wp-chatbot-system .feature-highlights{align-items:center}}
</style>
<section id="wp-chatbot-system">
  <div class="container">
    <div class="flex-wrapper">
      <article class="content-side">
        <h2><?php ee_h('bot_h2','Chatbot & Live Chat for Admissions'); ?></h2>
        <p class="description"><?php ee_h('bot_description','Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations.'); ?></p>
        <div style="font-family:'Poppins';font-weight:700;color:#19335D;margin-bottom:15px;font-size:14px;letter-spacing:1px;text-transform:uppercase">Popular Features:</div>
        <div class="feature-highlights">
          <div class="highlight-item"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg><?php ee_h('bot_feat1','Automated Chat Workflow'); ?></div>
          <div class="highlight-item"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg><?php ee_h('bot_feat2','Live Chat Enablement'); ?></div>
          <div class="highlight-item"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg><?php ee_h('bot_feat3','Meeting Scheduler'); ?></div>
        </div>
        <a href="<?php ee_u('bot_cta_url','#'); ?>" style="display:inline-block;background:#DE6E30;color:#fff;padding:16px 32px;border-radius:12px;text-decoration:none;font-weight:bold;font-family:'Poppins';transition:.3s;box-shadow:0 10px 20px rgba(222,110,48,.2)"><?php ee_h('bot_cta_text','See Live Demo'); ?></a>
      </article>
      <div class="visual-side">
        <div class="chat-device">
          <div class="chat-screen">
            <div class="chat-nav">
              <div style="background:#DE6E30;width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 8px rgba(222,110,48,.3)"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
              <div><div style="font-size:14px;font-weight:700">Admission Assistant</div><div style="font-size:10px;opacity:.8">Powered by AI • Active Now</div></div>
            </div>
            <div class="chat-content" id="chat-engine"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
(function(){
  const chatEngine=document.getElementById('chat-engine');
  if(!chatEngine)return;
  const calCard='<div class="calendar-card"><div style="font-size:11px;font-weight:700;text-align:center;margin-bottom:8px;color:#19335D">Choose a Date for Counseling</div><div class="cal-grid"><span class="cal-cell">15</span><span class="cal-cell">16</span><span class="cal-cell active">17</span><span class="cal-cell">18</span><span class="cal-cell">19</span><span class="cal-cell">20</span><span class="cal-cell">21</span></div><div style="text-align:center;margin-top:10px;font-size:10px;color:#DE6E30;font-weight:bold">Student selected 17th May</div></div>';
  const data=[
    {type:'user',text:"I'm interested in the MBA program. Can I get details?"},
    {type:'bot',text:"That's a great choice! To assist you better, could you please tell me your last educational qualification?",status:"AI Analyzing Inquiry"},
    {type:'user',text:"I have completed my Graduation recently."},
    {type:'bot',text:"Perfect! You are eligible for our MBA program. Let's schedule a 1-on-1 counseling session.",status:"Eligibility Verified"},
    {type:'bot',text:calCard},
    {type:'user',text:"I've selected May 17th."},
    {type:'bot',text:"Your meeting is confirmed!",status:"Success"}
  ];
  let idx=0;
  function think(cb){const d=document.createElement('div');d.className='thinking';d.innerHTML='<div class="dot"></div><div class="dot"></div><div class="dot"></div>';chatEngine.appendChild(d);chatEngine.scrollTop=chatEngine.scrollHeight;setTimeout(()=>{d.remove();cb()},1200)}
  function bubble(m){const b=document.createElement('div');b.className='bubble '+m.type;let c=m.text;if(m.status)c+='<br><span class="bot-status">'+m.status+'</span>';b.innerHTML=c;chatEngine.appendChild(b);setTimeout(()=>b.classList.add('show'),50);chatEngine.scrollTop=chatEngine.scrollHeight}
  function play(){if(idx>=data.length){setTimeout(()=>{chatEngine.innerHTML='';idx=0;play()},5000);return}const m=data[idx];if(m.type==='bot')think(()=>{bubble(m);idx++;play()});else setTimeout(()=>{bubble(m);idx++;play()},1500)}
  const obs=new IntersectionObserver(es=>{if(es[0].isIntersecting){play();obs.disconnect()}},{threshold:.4});
  obs.observe(document.getElementById('wp-chatbot-system'));
})();
</script>

<!-- ======================== APPLICATION MANAGEMENT SYSTEM ======================== -->
<style>
#wp-application-management{--primary:#DE6E30;--secondary:#19335D;--accent:#10B981;--glass:rgba(255,255,255,.9);padding:120px 5%;background:radial-gradient(circle at 10% 20%,#fdfdfd 0%,#f3f4f6 100%);font-family:'Open Sans',sans-serif;color:var(--secondary);overflow:hidden;position:relative}
#wp-application-management .ams-container{max-width:1240px;margin:0 auto}
#wp-application-management .ams-layout-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:60px;align-items:center}
#wp-application-management .ams-status-pill{display:inline-flex;align-items:center;background:#fff;padding:10px 20px;border-radius:50px;font-size:13px;font-weight:800;color:var(--secondary);box-shadow:0 4px 15px rgba(0,0,0,.05);margin-bottom:30px;letter-spacing:1px}
#wp-application-management .live-pulse{width:10px;height:10px;background:var(--accent);border-radius:50%;margin-right:12px;position:relative}
#wp-application-management .live-pulse::after{content:'';position:absolute;width:100%;height:100%;background:var(--accent);border-radius:50%;animation:ams-ring 2s infinite}
@keyframes ams-ring{0%{transform:scale(1);opacity:.8}100%{transform:scale(3.5);opacity:0}}
#wp-application-management .ams-headline{font-family:'Poppins',sans-serif;font-size:clamp(2.5rem,5vw,4rem);line-height:1.05;margin-bottom:30px;font-weight:800;color:var(--secondary)}
#wp-application-management .ams-headline .highlight{color:var(--primary)}
#wp-application-management .ams-description p{font-size:1.15rem;line-height:1.8;color:#4B5563;margin-bottom:20px}
#wp-application-management .ams-feature-box{background:#fff;padding:30px;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,.04);margin:40px 0;border:1px solid rgba(0,0,0,.05)}
#wp-application-management .features-title{font-size:14px;font-weight:800;color:#9CA3AF;letter-spacing:2px;margin-bottom:25px}
#wp-application-management .features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:20px}
#wp-application-management .feat-item{display:flex;align-items:flex-start;gap:15px}
#wp-application-management .feat-icon{font-size:24px}
#wp-application-management .feat-text strong{display:block;font-size:15px;color:var(--secondary)}
#wp-application-management .feat-text p{font-size:13px;color:#6B7280;margin:0}
#wp-application-management .ams-action-area{display:flex;align-items:center;gap:40px;margin-top:50px;flex-wrap:wrap}
#wp-application-management .ams-cta{background:var(--primary);color:#fff;padding:22px 50px;border-radius:18px;text-decoration:none;font-weight:800;font-size:1.1rem;transition:all .3s ease;box-shadow:0 15px 30px rgba(222,110,48,.3)}
#wp-application-management .ams-cta:hover{transform:translateY(-5px);box-shadow:0 20px 40px rgba(222,110,48,.4)}
#wp-application-management .ams-stats{display:flex;align-items:center;gap:25px}
#wp-application-management .stat-unit strong{display:block;font-size:20px;color:var(--secondary)}
#wp-application-management .stat-unit span{font-size:13px;color:#6B7280;font-weight:600}
#wp-application-management .stat-divider{width:1px;height:30px;background:#E5E7EB}
#wp-application-management .ams-visual-area{position:relative}
#wp-application-management .ams-live-label{position:absolute;top:-30px;right:0;font-size:12px;font-weight:800;color:var(--primary);opacity:.6}
#wp-application-management .ams-flow-track{display:flex;flex-direction:column;align-items:center}
#wp-application-management .ams-step{width:100%;max-width:300px;transition:all .6s cubic-bezier(.165,.84,.44,1);opacity:.3;filter:blur(2px);transform:scale(.9)}
#wp-application-management .ams-card{background:var(--glass);backdrop-filter:blur(10px);border-radius:24px;padding:25px;border:1px solid rgba(255,255,255,.4);box-shadow:0 10px 30px rgba(0,0,0,.05);position:relative}
#wp-application-management #step-1{animation:ams-glow 12s infinite 0s}
#wp-application-management #step-2{animation:ams-glow 12s infinite 3s}
#wp-application-management #step-3{animation:ams-glow 12s infinite 6s}
#wp-application-management #step-4{animation:ams-glow 12s infinite 9s}
@keyframes ams-glow{0%,20%{opacity:1;filter:blur(0);transform:scale(1.05);box-shadow:0 20px 40px rgba(0,0,0,.1)}25%,100%{opacity:.3;filter:blur(2px);transform:scale(.9)}}
#wp-application-management .ams-card-tag{font-size:10px;font-weight:800;color:var(--primary);margin-bottom:12px;letter-spacing:1px}
#wp-application-management .ams-card-tag.sec{color:var(--secondary)}
#wp-application-management .student-id{font-size:14px;font-weight:700;color:var(--secondary);margin-bottom:10px}
#wp-application-management .status-badge{display:inline-block;padding:4px 12px;border-radius:6px;font-size:11px;font-weight:700}
#wp-application-management .status-badge.success{background:#DCFCE7;color:#166534}
#wp-application-management .ai-glow{border:2px solid var(--primary)}
#wp-application-management .ams-ai-header{display:flex;align-items:center;gap:8px;font-weight:800;font-size:12px;color:var(--primary);margin-bottom:15px}
#wp-application-management .ai-status{font-size:15px;font-weight:700;margin-bottom:5px}
#wp-application-management .ai-typing{font-size:12px;color:#6B7280;margin-bottom:15px}
#wp-application-management .scanning-bar{height:4px;background:#E5E7EB;border-radius:2px;position:relative;overflow:hidden}
#wp-application-management .scanning-bar::after{content:'';position:absolute;left:-50%;width:50%;height:100%;background:var(--primary);animation:ams-scan 2s infinite}
@keyframes ams-scan{0%{left:-50%}100%{left:150%}}
#wp-application-management .counseling-info{display:flex;align-items:center;gap:15px;margin-bottom:15px}
#wp-application-management .counselor-avatar img{width:45px;height:45px;border-radius:50%;border:2px solid #fff}
#wp-application-management .counseling-text strong{display:block;font-size:14px}
#wp-application-management .counseling-text p{font-size:11px;margin:0;color:#6B7280}
#wp-application-management .ams-btn-mock{background:var(--secondary);color:#fff;text-align:center;padding:10px;border-radius:10px;font-size:11px;font-weight:700}
#wp-application-management .final-success{background:var(--secondary);color:#fff;border:none}
#wp-application-management .success-icon-wrap{background:var(--accent);width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 15px}
#wp-application-management .final-title{text-align:center;font-weight:800;font-size:18px;margin-bottom:10px}
#wp-application-management .payment-note{text-align:center;border-top:1px solid rgba(255,255,255,.1);padding-top:10px}
#wp-application-management .payment-note span{display:block;font-size:11px;opacity:.7;margin-bottom:4px}
#wp-application-management .payment-note code{font-size:12px;color:var(--primary);font-weight:700}
#wp-application-management .ams-connector{width:3px;height:35px;background:#E5E7EB;margin:5px 0;overflow:hidden}
#wp-application-management .progress-line{width:100%;height:0;background:var(--primary)}
#wp-application-management .line-1{animation:ams-line 12s infinite 1.5s}
#wp-application-management .line-2{animation:ams-line 12s infinite 4.5s}
#wp-application-management .line-3{animation:ams-line 12s infinite 7.5s}
@keyframes ams-line{0%{height:0}15%,25%{height:100%}30%,100%{height:0}}
@media(max-width:1024px){#wp-application-management .ams-layout-grid{grid-template-columns:1fr;gap:80px}#wp-application-management .ams-text-content{text-align:center}#wp-application-management .ams-status-pill,#wp-application-management .ams-action-area,#wp-application-management .ams-stats{justify-content:center}#wp-application-management .features-grid{justify-content:center;text-align:left}}
@media(max-width:600px){#wp-application-management .ams-headline{font-size:2.2rem}#wp-application-management .ams-cta{width:100%}#wp-application-management .stat-divider{display:none}#wp-application-management .ams-stats{flex-direction:column;gap:10px}#wp-application-management{padding:60px 5%}}
</style>
<section id="wp-application-management">
  <div class="ams-container">
    <div class="ams-layout-grid">
      <div class="ams-text-content">
        <div class="ams-status-pill"><span class="live-pulse"></span> <?php ee_h('ams_status','SYSTEM STATUS: ACTIVE'); ?></div>
        <h2 class="ams-headline"><?php ee_h('ams_h1_part1','Turn Applications into Admissions.'); ?><br><span class="highlight"><?php ee_h('ams_h1_part2','On Autopilot.'); ?></span></h2>
        <div class="ams-description">
          <p><?php ee_h('ams_para1','Our Application Management System streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly.'); ?></p>
          <p><?php ee_h('ams_para2','Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage, turning manual tasks into a hands-free, high-conversion workflow.'); ?></p>
        </div>
        <div class="ams-feature-box">
          <h3 class="features-title">CORE CAPABILITIES</h3>
          <div class="features-grid">
            <div class="feat-item"><span class="feat-icon">📋</span><div class="feat-text"><strong>Form Builder</strong><p>Custom widgets for any site</p></div></div>
            <div class="feat-item"><span class="feat-icon">🎥</span><div class="feat-text"><strong>Video GD-PI</strong><p>Automated counseling calls</p></div></div>
            <div class="feat-item"><span class="feat-icon">💳</span><div class="feat-text"><strong>Secure Payments</strong><p>Instant fee reconciliation</p></div></div>
          </div>
        </div>
        <div class="ams-action-area">
          <a href="<?php ee_u('ams_cta_url','#get-started'); ?>" class="ams-cta"><?php ee_h('ams_cta_text','Start Automating Now'); ?></a>
          <div class="ams-stats">
            <div class="stat-unit"><strong>500+</strong><span>Institutions</span></div>
            <div class="stat-divider"></div>
            <div class="stat-unit"><strong>1M+</strong><span>Apps Processed</span></div>
          </div>
        </div>
      </div>
      <div class="ams-visual-area">
        <div class="ams-live-label">LIVE SYSTEM FEED</div>
        <div class="ams-flow-track">
          <div class="ams-step" id="step-1"><div class="ams-card"><div class="ams-card-tag">NEW SUBMISSION</div><div><div class="student-id">Student ID: #APP-2024-88</div><div class="status-badge success">Application Submitted</div></div></div></div>
          <div class="ams-connector"><div class="progress-line line-1"></div></div>
          <div class="ams-step" id="step-2"><div class="ams-card ai-glow"><div class="ams-ai-header"><span>✨</span> AI VERIFICATION</div><div><div class="ai-status">Instant Verification</div><div class="ai-typing">AI verifying document authenticity...</div><div class="scanning-bar"></div></div></div></div>
          <div class="ams-connector"><div class="progress-line line-2"></div></div>
          <div class="ams-step" id="step-3"><div class="ams-card"><div class="ams-card-tag sec">GD-PI STAGE</div><div><div class="counseling-info"><div class="counselor-avatar"><img src="<?php ee_u('ams_counselor_img','https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80'); ?>" alt="Counselor"></div><div class="counseling-text"><strong>Counseling Scheduled</strong><p>Synced with availability</p></div></div><div class="ams-btn-mock">Join Video Call</div></div></div></div>
          <div class="ams-connector"><div class="progress-line line-3"></div></div>
          <div class="ams-step" id="step-4"><div class="ams-card final-success"><div><div class="success-icon-wrap"><svg viewBox="0 0 24 24" width="30" height="30" stroke="white" stroke-width="3" fill="none"><polyline points="20 6 9 17 4 12"></polyline></svg></div><div class="final-title">Admission Confirmed</div><div class="payment-note"><span>Payment Secured</span><code>TRN_99210-A</code></div></div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================== WHATSAPP BUSINESS API ======================== -->
<style>
.wa-story-section{font-family:'Open Sans',sans-serif;background:#fff;background-image:radial-gradient(at 0% 0%,hsla(20,72%,92%,1) 0,transparent 50%),radial-gradient(at 100% 100%,hsla(217,58%,95%,1) 0,transparent 50%);overflow:hidden;position:relative;padding:120px 0}
.wa-story-section h2{font-family:'Poppins',sans-serif;color:#19335D;line-height:1.1}
.wa-story-section .reveal-box{opacity:0;transform:translateY(50px);transition:all 1.2s cubic-bezier(.19,1,.22,1)}
.wa-story-section.is-active .reveal-box{opacity:1;transform:translateY(0)}
.wa-story-section .product-canvas{background:#fff;border-radius:40px;box-shadow:0 100px 150px -40px rgba(25,51,93,.2);border:1px solid rgba(25,51,93,.05);height:720px;width:100%;max-width:520px;margin:0 auto;display:flex;flex-direction:column;overflow:hidden;position:relative}
.wa-story-section .chat-bubble{padding:16px 20px;border-radius:22px;margin-bottom:15px;max-width:85%;font-size:14px;line-height:1.6;opacity:0;transform:scale(.9) translateY(30px);transition:.6s cubic-bezier(.34,1.56,.64,1);position:relative}
.wa-story-section .chat-bubble.visible{opacity:1;transform:scale(1) translateY(0)}
.wa-story-section .msg-inbound{background:#f1f5f9;align-self:flex-start;color:#19335D;border-bottom-left-radius:4px}
.wa-story-section .msg-outbound{background:#e0f2fe;align-self:flex-end;color:#0369a1;border-bottom-right-radius:4px}
.wa-story-section .live-indicator{display:inline-flex;align-items:center;gap:6px;padding:4px 10px;background:rgba(34,197,94,.1);color:#16a34a;border-radius:100px;font-size:10px;font-weight:700;text-transform:uppercase}
.wa-story-section .live-indicator .live-dot{width:6px;height:6px;background:#16a34a;border-radius:50%;animation:wa-pulse 1.5s infinite}
@keyframes wa-pulse{0%{transform:scale(1);opacity:1}100%{transform:scale(2.5);opacity:0}}
.wa-story-section .analytics-card{position:absolute;bottom:100px;left:-40px;background:#fff;padding:24px;border-radius:28px;box-shadow:0 40px 80px rgba(0,0,0,.12);width:260px;z-index:30;border:1px solid #f1f5f9}
.wa-story-section .stat-circle{width:45px;height:45px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-weight:bold}
.wa-story-section .pop-feature{display:flex;align-items:flex-start;gap:16px;padding:20px;background:#fff;border-radius:20px;border:1px solid #f1f5f9;transition:.4s}
.wa-story-section .pop-feature:hover{transform:translateX(12px);border-color:#DE6E30;box-shadow:0 10px 30px rgba(222,110,48,.08)}
.wa-story-section .pdf-component{display:flex;align-items:center;gap:12px;background:rgba(255,255,255,.8);border:1px solid #e2e8f0;padding:12px;border-radius:14px;margin-top:10px}
@media(max-width:1024px){.wa-story-section .analytics-card{left:20px;bottom:120px;width:220px}.wa-story-section .product-canvas{height:600px}.wa-story-section{padding:60px 0}}
</style>
<section class="wa-story-section" id="wa-storytelling-root" aria-labelledby="wa-heading">
  <div class="container mx-auto px-6 max-w-7xl">
    <div class="flex flex-wrap items-center -mx-4">
      <div class="w-full lg:w-5/12 px-4 mb-20 lg:mb-0">
        <div class="reveal-box" style="transition-delay:.1s">
          <div class="live-indicator mb-6"><span class="live-dot"></span> System Operational</div>
          <h2 id="wa-heading" class="text-5xl lg:text-7xl font-bold mb-8"><?php ee_h('wa_h2_part1','WhatsApp'); ?> <br><span style="color:#DE6E30"><?php ee_h('wa_h2_part2','Business API'); ?></span></h2>
          <p class="text-xl text-slate-500 mb-10 leading-relaxed"><?php ee_h('wa_description','WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM.'); ?></p>
          <div class="space-y-4 mb-12">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Popular Features</p>
            <div class="pop-feature"><div class="stat-circle bg-blue-50 text-blue-600">01</div><div><h4 class="font-bold text-slate-800"><?php ee_h('wa_feat1_title','Two-way WhatsApp and live chat'); ?></h4><p class="text-sm text-slate-500"><?php ee_h('wa_feat1_desc','Enable real-time human connection alongside automation.'); ?></p></div></div>
            <div class="pop-feature"><div class="stat-circle bg-orange-50 text-[#DE6E30]">02</div><div><h4 class="font-bold text-slate-800"><?php ee_h('wa_feat2_title','Bulk WhatsApp & automated campaigns'); ?></h4><p class="text-sm text-slate-500"><?php ee_h('wa_feat2_desc','Scale your outreach without losing the personal touch.'); ?></p></div></div>
            <div class="pop-feature"><div class="stat-circle bg-green-50 text-green-600">03</div><div><h4 class="font-bold text-slate-800"><?php ee_h('wa_feat3_title','Verified business account'); ?></h4><p class="text-sm text-slate-500"><?php ee_h('wa_feat3_desc','Official green badge to build instant trust with applicants.'); ?></p></div></div>
          </div>
          <div class="flex flex-wrap gap-5">
            <a href="<?php ee_u('wa_cta1_url','#'); ?>" class="px-10 py-5 bg-[#19335D] text-white font-bold rounded-2xl hover:shadow-2xl transition-all hover:-translate-y-1"><?php ee_h('wa_cta1_text','Start Optimizing Now'); ?></a>
            <a href="<?php ee_u('wa_cta2_url','#'); ?>" class="px-10 py-5 border-2 border-slate-200 text-[#19335D] font-bold rounded-2xl hover:bg-slate-50 transition-all"><?php ee_h('wa_cta2_text','View Case Studies'); ?></a>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-7/12 px-4">
        <div class="reveal-box" style="transition-delay:.4s">
          <div class="relative">
            <div class="analytics-card">
              <div class="flex justify-between items-center mb-6"><span class="text-xs font-bold text-slate-400">LIVE OPTIMIZATION</span><div class="text-[10px] bg-green-100 text-green-600 px-2 py-0.5 rounded">+12.4%</div></div>
              <div class="space-y-4">
                <div><div class="flex justify-between text-xs mb-2"><span>Messages Sent</span><span class="font-bold text-slate-800" id="live-sent">0</span></div><div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden"><div class="h-full bg-[#DE6E30] transition-all duration-500" id="bar-sent" style="width:0"></div></div></div>
                <div><div class="flex justify-between text-xs mb-2"><span>Open Rate</span><span class="font-bold text-[#DE6E30]" id="live-open">0%</span></div><div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden"><div class="h-full bg-[#19335D] transition-all duration-500" id="bar-open" style="width:0"></div></div></div>
              </div>
            </div>
            <div class="product-canvas">
              <div class="p-6 border-b bg-white flex items-center justify-between">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#DE6E30] to-orange-400 flex items-center justify-center text-white shadow-lg"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></div>
                  <div><h5 class="font-bold text-slate-800 text-sm">Campaign Engine</h5><p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Inbound Workflow Active</p></div>
                </div>
                <div class="flex gap-2"><span class="w-2 h-2 rounded-full bg-slate-200"></span><span class="w-2 h-2 rounded-full bg-slate-200"></span><span class="w-2 h-2 rounded-full bg-green-500"></span></div>
              </div>
              <div id="automation-flow" class="flex-1 p-8 flex flex-col bg-slate-50/40 overflow-y-auto"></div>
              <div class="p-6 bg-white border-t">
                <div class="flex items-center justify-between mb-4"><div class="flex gap-2"><div class="w-2 h-2 rounded-full bg-[#DE6E30] animate-ping"></div><span id="ai-status" class="text-xs font-bold text-slate-400 uppercase tracking-tighter">AI Processing Trigger...</span></div><span class="text-[10px] font-bold text-blue-600">Model: Admission-GPT 4.0</span></div>
                <div class="bg-slate-100 rounded-2xl px-6 py-4 flex items-center justify-between"><span class="text-sm text-slate-400" id="typing-sim">Awaiting next lead...</span><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path></svg></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded',function(){
  const section=document.getElementById('wa-storytelling-root');if(!section)return;
  const flowContainer=document.getElementById('automation-flow'),aiStatus=document.getElementById('ai-status'),typingSim=document.getElementById('typing-sim');
  const counters={sent:document.getElementById('live-sent'),open:document.getElementById('live-open'),barSent:document.getElementById('bar-sent'),barOpen:document.getElementById('bar-open')};
  let active=false;
  const seq=[
    {type:'bot',text:'Hello Sameer! Thank you for inquiring about our B.Tech program. Have you downloaded the latest fee structure?',delay:1000},
    {type:'user',text:'Not yet. Can you share it here?',delay:2000},
    {type:'bot',text:'Sure! Here is the PDF document for your reference.',file:'Fee_Structure_2024.pdf',delay:2000},
    {type:'user',text:'This is great. What is the last date to apply?',delay:3000},
    {type:'bot',text:'The deadline for early-bird applications is June 15th. Would you like me to book a call with an advisor?',delay:1500}
  ];
  function bubble(msg){const b=document.createElement('div');b.className='chat-bubble '+(msg.type==='bot'?'msg-inbound':'msg-outbound');let h='<p>'+msg.text+'</p>';if(msg.file)h+='<div class="pdf-component"><div class="w-10 h-10 bg-red-50 text-red-600 rounded-lg flex items-center justify-center font-bold text-[10px]">PDF</div><div class="flex-1"><div class="text-[11px] font-bold text-slate-800">'+msg.file+'</div><div class="text-[9px] text-slate-400">1.8 MB • Verified Document</div></div></div>';b.innerHTML=h;flowContainer.appendChild(b);setTimeout(()=>b.classList.add('visible'),50);flowContainer.scrollTop=flowContainer.scrollHeight}
  function anim(el,tgt,pct){let c=0;const s=tgt/40;const i=setInterval(()=>{c+=s;if(c>=tgt){el.innerText=Math.floor(tgt)+(pct?'%':'');clearInterval(i)}else el.innerText=Math.floor(c)+(pct?'%':'')},25)}
  function setStats(s,o){if(counters.sent)anim(counters.sent,s);if(counters.open)anim(counters.open,o,true);if(counters.barSent)counters.barSent.style.width=(s/3000*100)+'%';if(counters.barOpen)counters.barOpen.style.width=o+'%'}
  async function trigger(){if(active)return;active=true;flowContainer.innerHTML='';aiStatus.innerText='Scanning CRM Database...';typingSim.innerText='Identifying high-intent leads...';setStats(0,0);await new Promise(r=>setTimeout(r,2000));setStats(2480,92);aiStatus.innerText='Lead Detected: Sameer K.';typingSim.innerText='AI generating personalized response...';for(const msg of seq){aiStatus.innerText=msg.type==='bot'?'AI Optimizing Campaign...':'Lead Interacting...';typingSim.innerText=msg.type==='bot'?'Crafting WhatsApp Template...':'Waiting for reply...';await new Promise(r=>setTimeout(r,msg.delay));bubble(msg)}aiStatus.innerText='Enrolment Goal Achieved ✓';typingSim.innerText='Storing data in Admission CRM...';setTimeout(()=>{active=false;const r=section.getBoundingClientRect();if(r.top<window.innerHeight&&r.bottom>0)trigger()},8000)}
  new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){section.classList.add('is-active');trigger()}}),{threshold:.25}).observe(section);
});
</script>

<!-- ======================== MOBILE CRM ======================== -->
<style>
#wp-mobile-crm{--primary:#DE6E30;--secondary:#19335D;--green:#10B981;--accent-bg:#f0f4f8;--white:#fff;--text-body:#475569;--border:#e2e8f0;--shadow:0 20px 60px -15px rgba(25,51,93,.18);font-family:'Open Sans',sans-serif;background:#fff;padding:clamp(70px,10vh,120px) 5%;position:relative;overflow:hidden}
#wp-mobile-crm *,#wp-mobile-crm *::before,#wp-mobile-crm *::after{box-sizing:border-box}
#wp-mobile-crm::before{content:'';position:absolute;inset:0;background-image:radial-gradient(ellipse 70% 50% at 85% 15%,rgba(222,110,48,.06) 0%,transparent 60%),radial-gradient(ellipse 50% 40% at 10% 85%,rgba(25,51,93,.05) 0%,transparent 60%);pointer-events:none;z-index:0}
#wp-mobile-crm .crm-container{max-width:1240px;margin:0 auto;display:grid;grid-template-columns:1fr 1.15fr;align-items:center;gap:clamp(40px,6vw,90px);position:relative;z-index:10}
#wp-mobile-crm .crm-text-block{display:flex;flex-direction:column}
#wp-mobile-crm .crm-badge{display:inline-flex;align-items:center;gap:7px;background:var(--accent-bg);color:var(--primary);padding:7px 18px;border-radius:50px;font-weight:700;font-size:.78rem;text-transform:uppercase;letter-spacing:1.2px;margin-bottom:20px;border:1px solid rgba(222,110,48,.2);width:fit-content}
#wp-mobile-crm .badge-dot{width:7px;height:7px;border-radius:50%;background:var(--primary);animation:mc-bdot 1.6s ease-in-out infinite}
@keyframes mc-bdot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.3;transform:scale(.6)}}
#wp-mobile-crm h2{font-family:'Poppins',sans-serif;font-size:clamp(2.2rem,4vw,3.6rem);font-weight:800;color:var(--secondary);line-height:1.08;margin:0 0 20px;letter-spacing:-.03em}
#wp-mobile-crm h2 em{font-style:normal;color:var(--primary);position:relative}
#wp-mobile-crm h2 em::after{content:'';position:absolute;bottom:2px;left:0;width:100%;height:3px;background:linear-gradient(90deg,var(--primary),transparent);border-radius:3px;opacity:.5}
#wp-mobile-crm .crm-description{font-size:clamp(1rem,1.15vw,1.15rem);line-height:1.78;color:var(--text-body);margin-bottom:32px}
#wp-mobile-crm .crm-description strong{color:var(--secondary);font-weight:600}
#wp-mobile-crm .feat-section-label{font-size:11px;font-weight:800;letter-spacing:2.5px;text-transform:uppercase;color:#94a3b8;margin-bottom:14px;display:block}
#wp-mobile-crm .feature-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:36px}
#wp-mobile-crm .feature-pill{background:var(--white);border:1px solid var(--border);padding:18px 12px 14px;border-radius:16px;text-align:center;transition:.4s;box-shadow:0 4px 10px rgba(0,0,0,.04);position:relative;overflow:hidden}
#wp-mobile-crm .feature-pill:hover{border-color:rgba(222,110,48,.35);transform:translateY(-6px);box-shadow:0 14px 28px rgba(222,110,48,.12)}
#wp-mobile-crm .pill-icon{width:44px;height:44px;border-radius:12px;background:var(--accent-bg);display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-size:20px}
#wp-mobile-crm .feature-pill span{display:block;font-weight:700;font-size:.82rem;color:var(--secondary);line-height:1.3}
#wp-mobile-crm .crm-sync-note{display:flex;align-items:flex-start;gap:12px;background:linear-gradient(135deg,rgba(16,185,129,.06),rgba(16,185,129,.02));border:1px solid rgba(16,185,129,.22);border-left:4px solid var(--green);border-radius:0 12px 12px 0;padding:16px 18px;font-size:14px;color:var(--text-body);line-height:1.65}
#wp-mobile-crm .note-icon{width:30px;height:30px;border-radius:50%;background:rgba(16,185,129,.1);display:flex;align-items:center;justify-content:center;flex-shrink:0}
#wp-mobile-crm .crm-visual-engine{position:relative;display:flex;justify-content:center;align-items:center;height:680px}
#wp-mobile-crm .phone-glow{position:absolute;width:360px;height:360px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.16) 0%,transparent 70%);top:50%;left:50%;transform:translate(-50%,-50%);pointer-events:none;animation:mc-glow 4s ease-in-out infinite}
@keyframes mc-glow{0%,100%{transform:translate(-50%,-50%) scale(1);opacity:1}50%{transform:translate(-50%,-50%) scale(1.12);opacity:.6}}
#wp-mobile-crm .phone-device{width:300px;height:620px;background:linear-gradient(160deg,#1c2d44,#0d1b2e);border-radius:50px;padding:10px;box-shadow:var(--shadow),inset 0 0 0 1px rgba(255,255,255,.07);position:relative;z-index:10;flex-shrink:0}
#wp-mobile-crm .phone-notch{position:absolute;top:10px;left:50%;transform:translateX(-50%);width:88px;height:24px;background:#0d1b2e;border-radius:0 0 16px 16px;z-index:30;display:flex;align-items:center;justify-content:center;gap:6px}
#wp-mobile-crm .notch-dot{width:9px;height:9px;border-radius:50%;background:#1a2535}
#wp-mobile-crm .notch-bar{width:32px;height:4px;border-radius:3px;background:#1a2535}
#wp-mobile-crm .phone-screen{width:100%;height:100%;border-radius:41px;overflow:hidden;position:relative;display:flex;flex-direction:column;background:#0d1522}
#wp-mobile-crm .phone-map-bg{position:absolute;inset:0;z-index:1;overflow:hidden}
#wp-mobile-crm .phone-map-bg iframe{width:100%;height:100%;border:0;transform:scale(1.12);transform-origin:center;pointer-events:none;display:block;opacity:.88}
#wp-mobile-crm .map-overlay-grad{position:absolute;inset:0;z-index:2;background:linear-gradient(to bottom,rgba(13,27,46,.72) 0%,rgba(13,27,46,.15) 40%,rgba(13,27,46,.15) 60%,rgba(13,27,46,.75) 100%);pointer-events:none}
#wp-mobile-crm .gps-pin-wrap{position:absolute;z-index:6;top:42%;left:50%;transform:translate(-50%,-50%);pointer-events:none}
#wp-mobile-crm .gps-core{width:18px;height:18px;background:var(--primary);border:3px solid #fff;border-radius:50%;box-shadow:0 0 0 0 rgba(222,110,48,.15);animation:mc-gps 2.1s infinite}
@keyframes mc-gps{0%{box-shadow:0 0 0 0 rgba(222,110,48,.55)}70%{box-shadow:0 0 0 24px rgba(222,110,48,0)}100%{box-shadow:0 0 0 0 rgba(222,110,48,0)}}
#wp-mobile-crm .v-card{position:absolute;background:#fff;padding:14px;border-radius:16px;box-shadow:0 16px 40px rgba(0,0,0,.12);width:200px;z-index:20;opacity:0;transform:scale(.88) translateY(16px);transition:all .65s cubic-bezier(.34,1.56,.64,1);border:1px solid #f1f5f9}
#wp-mobile-crm .v-card.active{opacity:1;transform:scale(1) translateY(0)}
#wp-mobile-crm .v-card-1{top:4%;left:-20px}
#wp-mobile-crm .v-card-2{top:28%;right:-20px}
#wp-mobile-crm .v-card-3{bottom:30%;left:-20px}
#wp-mobile-crm .v-card-4{bottom:6%;right:-20px}
@media(min-width:1100px){#wp-mobile-crm .v-card-1{left:-60px}#wp-mobile-crm .v-card-2{right:-60px}#wp-mobile-crm .v-card-3{left:-60px}#wp-mobile-crm .v-card-4{right:-60px}}
#wp-mobile-crm .v-icon{width:32px;height:32px;background:var(--accent-bg);border-radius:8px;display:flex;align-items:center;justify-content:center;margin-bottom:10px;font-size:18px}
#wp-mobile-crm .v-title{font-weight:700;font-size:.88rem;color:var(--secondary);margin-bottom:3px}
#wp-mobile-crm .v-meta{font-size:.75rem;color:var(--text-body)}
@media(max-width:1100px){#wp-mobile-crm .crm-container{grid-template-columns:1fr;gap:60px;text-align:center}#wp-mobile-crm .crm-text-block{align-items:center}#wp-mobile-crm .crm-description,#wp-mobile-crm .crm-sync-note{text-align:left}#wp-mobile-crm .crm-visual-engine{height:700px;width:100%}#wp-mobile-crm .v-card-1,#wp-mobile-crm .v-card-3{left:0}#wp-mobile-crm .v-card-2,#wp-mobile-crm .v-card-4{right:0}}
@media(max-width:700px){#wp-mobile-crm{padding:60px 20px}#wp-mobile-crm .feature-grid{grid-template-columns:1fr 1fr}#wp-mobile-crm .feature-grid .feature-pill:last-child{grid-column:1/-1}#wp-mobile-crm .crm-visual-engine{height:640px}#wp-mobile-crm .phone-device{width:270px;height:570px}#wp-mobile-crm .v-card{width:155px;font-size:.82rem;padding:11px}}
@media(max-width:400px){#wp-mobile-crm .phone-device{width:250px;height:540px}#wp-mobile-crm .v-card{display:none}}
</style>
<section id="wp-mobile-crm" aria-labelledby="mcrm-heading">
  <div class="crm-container">
    <article class="crm-text-block">
      <div class="crm-badge"><span class="badge-dot"></span><?php ee_h('mcrm_badge','Next-Gen Mobility'); ?></div>
      <h2 id="mcrm-heading"><?php ee_h('mcrm_h2_p1','Mobile CRM: Powering'); ?><br><em><?php ee_h('mcrm_h2_em','Productivity'); ?></em> <?php ee_h('mcrm_h2_p2','on the Go'); ?></h2>
      <p class="crm-description"><?php ee_h('mcrm_description','Our Mobile CRM empowers work-from-home and field counselors to stay productive anywhere. Monitor visits, log activities, and complete follow-ups with real-time sync to your Admission CRM for intelligent, unified reporting.'); ?></p>
      <span class="feat-section-label">Popular Features</span>
      <div class="feature-grid">
        <div class="feature-pill"><div class="pill-icon">📞</div><span><?php ee_h('mcrm_feat1','Click-To-Call'); ?></span></div>
        <div class="feature-pill"><div class="pill-icon">📍</div><span><?php ee_h('mcrm_feat2','Field Tracker'); ?></span></div>
        <div class="feature-pill"><div class="pill-icon">📵</div><span><?php ee_h('mcrm_feat3','Missed Call Lead Capture'); ?></span></div>
      </div>
      <div class="crm-sync-note">
        <div class="note-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <span><?php ee_h('mcrm_note','Real-time sync with your Admission CRM ensures every interaction is captured for intelligent, unified reporting — zero data loss, always.'); ?></span>
      </div>
    </article>
    <div class="crm-visual-engine" id="visualizer-trigger">
      <div class="phone-glow"></div>
      <div class="phone-device">
        <div class="phone-notch"><div class="notch-dot"></div><div class="notch-bar"></div></div>
        <div class="phone-screen">
          <div class="phone-map-bg">
            <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=73.8197%2C18.5003%2C73.8697%2C18.5303&layer=mapnik&marker=18.5153%2C73.8447" loading="lazy" title="Live GPS Field Tracking Map"></iframe>
            <div class="map-overlay-grad"></div>
          </div>
          <div class="gps-pin-wrap"><div class="gps-core"></div></div>
        </div>
      </div>
      <div class="v-card v-card-1" id="v-step-1"><div class="v-icon">📞</div><div class="v-title">Missed Call Detected</div><div class="v-meta">Instant Lead Generation</div></div>
      <div class="v-card v-card-2" id="v-step-2"><div class="v-icon">⚡</div><div class="v-title">Click-To-Call</div><div class="v-meta">Counselor connected</div></div>
      <div class="v-card v-card-3" id="v-step-3"><div class="v-icon">📍</div><div class="v-title">Field Visit Logged</div><div class="v-meta">GPS Verified Activity</div></div>
      <div class="v-card v-card-4" id="v-step-4"><div class="v-icon">☁️</div><div class="v-title">Real-time Sync</div><div class="v-meta">Admission CRM Updated</div></div>
    </div>
  </div>
</section>
<script>
(function(){
  const cards=[document.getElementById('v-step-1'),document.getElementById('v-step-2'),document.getElementById('v-step-3'),document.getElementById('v-step-4')];
  if(!cards[0])return;
  let playing=false;
  function loop(){if(playing)return;playing=true;cards.forEach(c=>c.classList.remove('active'));let d=0;cards.forEach((c,i)=>{setTimeout(()=>c.classList.add('active'),d);d+=1800});setTimeout(()=>{playing=false;loop()},d+2800)}
  new IntersectionObserver(es=>{if(es[0].isIntersecting)loop()},{threshold:.25}).observe(document.getElementById('visualizer-trigger'));
})();
</script>

<!-- ======================== WHY INSTITUTES CHOOSE (Architect) ======================== -->
<style>
#extraaedge-architect-section{position:relative;overflow:hidden;background:#fff;margin-top:10px;margin-bottom:10px;padding:60px 0;font-family:'Open Sans',sans-serif}
#extraaedge-architect-section .font-poppins{font-family:'Poppins',sans-serif}
#extraaedge-architect-section [x-cloak]{display:none!important}
@keyframes arch-pulse{0%,100%{opacity:.3;transform:scale(1)}50%{opacity:.1;transform:scale(1.1)}}
#extraaedge-architect-section .animate-pulse-slow{animation:arch-pulse 8s infinite}
#extraaedge-architect-section .slide-in-right{animation:arch-slide .4s ease-out forwards}
@keyframes arch-slide{from{opacity:0;transform:translateX(20px)}to{opacity:1;transform:translateX(0)}}
</style>
<section id="extraaedge-architect-section"
  x-data="{ activeStep:0, isHovered:false, stats:{response:0,conversion:0,enroll:0,effort:0},
    steps:[
      {t:'One Unified Admission Cloud',d:'Run the entire enrollment journey from inquiry to enrollment without fragmented tools or manual follow-ups.',items:['Ads Integration','ERP Sync','Website Tracking']},
      {t:'24/7 AI Admission Assistance',d:'Handles student queries across web and WhatsApp instantly, providing counselors with full context for smarter responses.',items:['WhatsApp API','Web Chatbot','Counselor Handover']},
      {t:'AI Calling & Intelligent Agents',d:'Qualify and engage high-intent prospects at scale. Grow your outcomes without growing your headcount.',items:['Automated Qualification','Intent Scoring','Smart Routing']},
      {t:'Real-Time Intent Intelligence',d:'Surface bottlenecks and counselor performance in real-time so your team can act early and convert better.',items:['Performance Audit','Bottleneck Alerts','Live Funnel']},
      {t:'Built to Adapt & Scale',d:'Integrates seamlessly with ads, websites, ERP, and communication tools. Scales with your institute\'s growth.',items:['Custom Workflows','API Ecosystem','Global Scaling']}
    ],
    initStats(){let s=null;const d=2000;const a=t=>{if(!s)s=t;const p=Math.min((t-s)/d,1);this.stats.response=Math.floor(p*92);this.stats.conversion=Math.floor(p*48);this.stats.enroll=Math.floor(p*2450);this.stats.effort=Math.floor(p*100);if(p<1)requestAnimationFrame(a)};requestAnimationFrame(a)} }"
  x-init="const o=new IntersectionObserver(e=>{if(e[0].isIntersecting){initStats();o.disconnect()}},{threshold:.1});o.observe($el);setInterval(()=>{if(!isHovered)activeStep=(activeStep+1)%steps.length},5000)"
  @mouseenter="isHovered=true" @mouseleave="isHovered=false">
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-[#DE6E30]/5 rounded-full blur-[100px] animate-pulse-slow"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[500px] h-[500px] bg-[#19335D]/5 rounded-full blur-[100px] animate-pulse-slow"></div>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image:radial-gradient(#19335D 1px,transparent 1px);background-size:40px 40px"></div>
  </div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center max-w-4xl mx-auto mb-16">
      <span class="text-[#DE6E30] font-bold text-sm tracking-[0.2em] uppercase mb-4 block"><?php ee_h('arch_eyebrow','Admission Ecosystem'); ?></span>
      <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold text-[#19335D] leading-tight mb-6 font-poppins"><?php ee_h('arch_h2_p1','Why Institutes Choose ExtraaEdge as the'); ?> <span class="text-[#DE6E30] relative inline-block"><?php ee_h('arch_h2_em','Architect'); ?><svg class="absolute -bottom-2 left-0 w-full h-2 text-[#DE6E30]/30" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 25 0 50 5 T 100 5" fill="none" stroke="currentColor" stroke-width="4"></path></svg></span> <?php ee_h('arch_h2_p2','of Their Admission Process?'); ?></h2>
      <p class="text-lg text-gray-600 leading-relaxed"><?php ee_h('arch_subtext','Most Admission CRMs help you manage admissions. ExtraaEdge helps you design how admissions should work—end to end, at scale.'); ?></p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-20">
      <div class="lg:col-span-5 space-y-4">
        <template x-for="(step,index) in steps" :key="index">
          <button @click="activeStep=index" :class="activeStep===index?'bg-white border-[#DE6E30] shadow-2xl scale-[1.02] opacity-100':'bg-transparent border-transparent opacity-60 hover:opacity-100'" class="w-full text-left p-6 rounded-2xl transition-all duration-300 border-2 relative overflow-hidden group">
            <div class="flex items-start gap-4 relative z-10">
              <div :class="activeStep===index?'bg-[#DE6E30] text-white':'bg-gray-100 text-[#19335D]'" class="p-3 rounded-xl transition-colors w-12 h-12 flex items-center justify-center font-bold" x-text="index+1"></div>
              <div>
                <h3 :class="activeStep===index?'text-[#19335D]':'text-gray-500'" class="font-bold text-lg mb-1 transition-colors" x-text="step.t"></h3>
                <div x-show="activeStep===index">
                  <p class="text-sm text-gray-600 leading-relaxed" x-text="step.d"></p>
                  <div class="flex flex-wrap gap-2 mt-3"><template x-for="item in step.items"><span class="text-[10px] font-bold py-1 px-2 rounded bg-gray-100 text-[#19335D]/70 uppercase tracking-wider" x-text="item"></span></template></div>
                </div>
              </div>
            </div>
          </button>
        </template>
      </div>
      <div class="lg:col-span-7 lg:sticky lg:top-24 h-[550px] flex items-center justify-center">
        <div class="relative w-full max-w-[500px] h-full bg-white rounded-[40px] shadow-[0_50px_100px_-20px_rgba(25,51,93,0.15)] border-8 border-gray-100 p-8 overflow-hidden">
          <div class="flex items-center justify-between mb-8">
            <div class="flex gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-[#DE6E30]"></div><div class="w-2.5 h-2.5 rounded-full bg-gray-200"></div><div class="w-2.5 h-2.5 rounded-full bg-gray-200"></div></div>
            <div class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div><span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">ExtraaEdge Cloud Live</span></div>
          </div>
          <div class="h-full relative">
            <div x-show="activeStep===0" class="slide-in-right space-y-4"><h4 class="text-xs font-bold text-gray-400 uppercase">Unified Inquiry Feed</h4><div class="p-3 bg-gray-50 rounded-xl flex items-center justify-between border border-gray-100"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-[#19335D]/10 flex items-center justify-center text-[10px] font-bold">JD</div><div><p class="text-xs font-bold text-[#19335D]">Source: Facebook Ads</p><p class="text-[10px] text-gray-400">Campus: Mumbai South</p></div></div><span class="text-[10px] font-bold text-[#DE6E30]">SYNCED</span></div><div class="p-3 bg-gray-50 rounded-xl flex items-center justify-between border border-gray-100"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-[#19335D]/10 flex items-center justify-center text-[10px] font-bold">AM</div><div><p class="text-xs font-bold text-[#19335D]">Source: WhatsApp</p><p class="text-[10px] text-gray-400">Status: Hot Lead</p></div></div><span class="text-[10px] font-bold text-[#DE6E30]">SYNCED</span></div></div>
            <div x-show="activeStep===1" class="slide-in-right bg-gray-50 rounded-2xl p-4 h-64 flex flex-col justify-end gap-3 border border-gray-100"><div class="bg-white p-3 rounded-2xl rounded-bl-none text-[11px] shadow-sm max-w-[80%]">Student: "Is there a hostel facility?"</div><div class="bg-[#19335D] text-white p-3 rounded-2xl rounded-br-none text-[11px] shadow-lg self-end max-w-[80%]">AI: "Yes, we have 4 hostel blocks with 24/7 security. Sending brochure to your WhatsApp..."</div></div>
            <div x-show="activeStep===2" class="slide-in-right flex flex-col items-center justify-center py-10 text-center"><div class="w-20 h-20 bg-[#DE6E30]/10 rounded-full flex items-center justify-center"><svg class="w-10 h-10 text-[#DE6E30]" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg></div><h5 class="mt-6 font-bold text-[#19335D]">AI Calling & Routing</h5><p class="text-[10px] text-gray-500 uppercase mt-1">Qualification Agent Active</p></div>
            <div x-show="activeStep===3" class="slide-in-right space-y-6"><div class="p-4 bg-[#19335D] rounded-2xl text-white"><p class="text-[10px] opacity-70 uppercase mb-1">Intent Score</p><p class="text-2xl font-bold">94% High Conversion Chance</p></div><div class="grid grid-cols-2 gap-4"><div class="p-3 bg-gray-50 rounded-xl border border-gray-100"><p class="text-[10px] text-gray-400 mb-1">Counsellor KRA</p><p class="text-xs font-bold text-[#19335D]">Top Performer</p></div><div class="p-3 bg-gray-50 rounded-xl border border-gray-100"><p class="text-[10px] text-gray-400 mb-1">Lead Health</p><p class="text-xs font-bold text-green-500">Positive</p></div></div></div>
            <div x-show="activeStep===4" class="slide-in-right text-center py-10"><div class="w-16 h-16 bg-green-500 rounded-full mx-auto flex items-center justify-center text-white text-2xl font-bold">✓</div><h5 class="mt-6 font-bold text-[#19335D] text-lg">Scalable Journey</h5><p class="text-xs text-gray-500 mt-2">Process scales automatically as lead volume increases.</p></div>
          </div>
          <div class="absolute -top-4 -right-4 bg-[#DE6E30] text-white p-4 rounded-2xl shadow-xl z-30 transform rotate-3"><p class="text-[9px] uppercase font-bold opacity-80">Conversion Boost</p><p class="text-xl font-bold" x-text="'+'+stats.conversion+'%'"></p></div>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 border-t border-gray-100 pt-16">
      <div class="text-center p-4"><h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-[#19335D]" x-text="stats.response+'%'"></h4><p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Decrease Response Time</p></div>
      <div class="text-center p-4"><h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-[#DE6E30]" x-text="stats.conversion+'%'"></h4><p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Boost Conversion Rates</p></div>
      <div class="text-center p-4"><h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-[#19335D]" x-text="stats.enroll+'+'"></h4><p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Convert More Students</p></div>
      <div class="text-center p-4"><h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-[#DE6E30]" x-text="stats.effort+'%'"></h4><p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Measure Your Efforts</p></div>
    </div>
    <div class="mt-20 text-center">
      <div class="inline-flex items-center gap-4 px-6 py-3 bg-gray-50 rounded-full border border-gray-100">
        <div class="flex -space-x-2"><div class="w-6 h-6 rounded-full border-2 border-white bg-blue-500"></div><div class="w-6 h-6 rounded-full border-2 border-white bg-orange-500"></div><div class="w-6 h-6 rounded-full border-2 border-white bg-indigo-500"></div></div>
        <p class="text-xs font-bold text-[#19335D]"><?php ee_h('arch_proof_text','Trusted by 500+ Leading Institutes'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- ======================== RESPOND FIRST HERO ======================== -->
<style>
.ee-hero-outer{background:#fff;padding:10px 0;width:100%;display:flex;align-items:center;box-sizing:border-box;overflow:hidden}
.ee-hero-section{position:relative;width:95%;max-width:1400px;margin:0 auto;min-height:80vh;background:#fff;font-family:'Open Sans',sans-serif;color:#19335D;display:flex;align-items:center;border-radius:24px;border:1px solid rgba(25,51,93,.1);box-sizing:border-box;padding:60px 40px;box-shadow:0 10px 40px rgba(25,51,93,.03)}
.ee-hero-container{width:100%;display:grid;grid-template-columns:1fr 1.1fr;gap:60px;align-items:center;z-index:10}
.ee-content{position:relative;z-index:10}
.ee-eyebrow{font-family:'Poppins',sans-serif;font-weight:700;font-size:14px;letter-spacing:2px;color:#DE6E30;text-transform:uppercase;margin-bottom:20px;display:flex;align-items:center;gap:10px}
.ee-eyebrow::after{content:'';width:40px;height:2px;background:#DE6E30}
.ee-headline{font-family:'Poppins',sans-serif;font-weight:800;font-size:clamp(32px,4vw,54px);line-height:1.1;margin-bottom:25px;color:#19335D}
.ee-headline span{color:#DE6E30;display:block}
.ee-copy{font-size:17px;line-height:1.7;color:#4b5563;margin-bottom:35px;max-width:580px}
.ee-cta-wrapper{display:flex;flex-direction:column;gap:15px}
.ee-primary-cta{background:#DE6E30;color:#fff;font-family:'Poppins',sans-serif;font-weight:700;font-size:18px;padding:18px 45px;border-radius:12px;text-decoration:none;display:inline-block;width:fit-content;transition:all .3s cubic-bezier(.175,.885,.32,1.275);box-shadow:0 10px 25px rgba(222,110,48,.25)}
.ee-primary-cta:hover{transform:translateY(-5px);box-shadow:0 15px 35px rgba(222,110,48,.4);background:#19335D}
.ee-microcopy{font-size:13px;font-weight:600;color:#19335D;opacity:.7}
.ee-visual-engine{position:relative;height:550px;display:flex;align-items:center;justify-content:center;background:radial-gradient(circle at center,rgba(25,51,93,.02) 0%,transparent 70%);border-radius:40px;border:1px solid rgba(25,51,93,.1)}
.ee-hub-core{position:relative;width:150px;height:150px;background:#fff;border:4px solid #DE6E30;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:20;box-shadow:0 15px 45px rgba(222,110,48,.15);animation:hubRotate 15s linear infinite}
.ee-hub-inner{animation:hubRotateR 15s linear infinite;text-align:center;color:#19335D}
.ee-hub-inner b{font-family:'Poppins',sans-serif;font-size:20px;display:block}
.ee-hub-inner span{font-size:9px;font-weight:800;letter-spacing:1px;color:#DE6E30}
@keyframes hubRotate{from{transform:rotate(0)}to{transform:rotate(360deg)}}
@keyframes hubRotateR{from{transform:rotate(360deg)}to{transform:rotate(0)}}
.ee-orbit-chip{position:absolute;background:#fff;border:1px solid rgba(25,51,93,.1);padding:8px 16px;border-radius:30px;font-size:10px;font-weight:700;color:#19335D;box-shadow:0 4px 12px rgba(0,0,0,.05);white-space:nowrap;z-index:25;pointer-events:none}
.ee-lead-card{position:absolute;background:#19335D;color:#fff;padding:10px 18px;border-radius:10px;font-size:11px;font-weight:600;display:flex;align-items:center;gap:10px;box-shadow:0 8px 20px rgba(25,51,93,.2);z-index:15;opacity:0}
.ee-live-toast{position:absolute;top:30px;right:-10px;background:#fff;border-left:5px solid #DE6E30;padding:15px;border-radius:4px 12px 12px 4px;width:200px;font-size:12px;box-shadow:0 10px 30px rgba(0,0,0,.1);transform:translateX(120%);transition:transform .5s cubic-bezier(.175,.885,.32,1.275);z-index:35;color:#19335D}
.ee-live-toast.active{transform:translateX(0)}
.ee-pipeline{position:absolute;bottom:25px;width:90%;display:flex;justify-content:space-between}
.ee-step{flex:1;display:flex;flex-direction:column;align-items:center;gap:5px;opacity:.2;transition:.4s;color:#19335D}
.ee-step.active{opacity:1;transform:scale(1.1)}
.ee-step-dot{width:12px;height:12px;background:#19335D;border-radius:50%}
.ee-step.active .ee-step-dot{background:#DE6E30;box-shadow:0 0 12px #DE6E30}
.ee-step-label{font-size:9px;font-weight:800;text-transform:uppercase;margin-top:5px}
@media(max-width:1100px){.ee-hero-outer{padding:10px 0;height:auto}.ee-hero-section{width:98%;padding:40px 20px;min-height:auto}.ee-hero-container{grid-template-columns:1fr;text-align:center;gap:40px}.ee-content{display:flex;flex-direction:column;align-items:center}.ee-visual-engine{height:450px}}
@media(max-width:600px){.ee-headline{font-size:32px}.ee-hub-core{width:110px;height:110px}.ee-orbit-chip{font-size:9px;padding:5px 10px}.ee-step-label{font-size:7px}}
</style>
<div class="ee-hero-outer">
  <div class="ee-hero-section" id="respondHero">
    <div class="ee-hero-container">
      <div class="ee-content">
        <div class="ee-eyebrow"><?php ee_h('rf_eyebrow','Admission Response Automation'); ?></div>
        <h2 class="ee-headline"><?php ee_h('rf_h1_l1','Decrease Response Time.'); ?> <span><?php ee_h('rf_h1_l2','Respond First Using AI Agents.'); ?></span> <?php ee_h('rf_h1_l3','Win Admissions.'); ?></h2>
        <p class="ee-copy"><?php ee_h('rf_copy','Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation—and the conversion. ExtraaEdge automatically captures inquiries from every source and initiates AI-powered calls instantly.'); ?></p>
        <div class="ee-cta-wrapper">
          <a href="<?php ee_u('rf_cta_url','#'); ?>" class="ee-primary-cta"><?php ee_h('rf_cta_text','Book a Demo'); ?></a>
          <span class="ee-microcopy"><?php ee_h('rf_micro','See how institutes reduce response time by 90%'); ?></span>
        </div>
      </div>
      <div class="ee-visual-engine" id="engineStage">
        <div class="ee-live-toast" id="liveToast"><b style="color:#DE6E30;font-family:'Poppins'">AI ACTION</b><br>Connected in 18s<br><small>Counselor Assigned</small></div>
        <div id="orbitWrapper"></div>
        <div class="ee-hub-core" id="aiHub"><div class="ee-hub-inner"><span>LIVE ENGINE</span><b>AI HUB</b><span>EXTRAAEDGE</span></div></div>
        <div id="leadContainer"></div>
        <div class="ee-pipeline">
          <div class="ee-step active"><div class="ee-step-dot"></div><div class="ee-step-label">Inquiry</div></div>
          <div class="ee-step"><div class="ee-step-dot"></div><div class="ee-step-label">Contacted</div></div>
          <div class="ee-step"><div class="ee-step-dot"></div><div class="ee-step-label">Qualified</div></div>
          <div class="ee-step"><div class="ee-step-dot"></div><div class="ee-step-label">Counseling</div></div>
          <div class="ee-step"><div class="ee-step-dot"></div><div class="ee-step-label">Enrolled</div></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
(function(){
  const chips=['Unified Ingestion','Ads Sync','Form Capture','AI Calling','IVR Route','Live Analytics'],sources=['Meta Ads','Google Ads','Website','Shiksha','Form-X'];
  const ow=document.getElementById('orbitWrapper'),lc=document.getElementById('leadContainer'),toast=document.getElementById('liveToast'),hub=document.getElementById('aiHub'),steps=document.querySelectorAll('.ee-step');
  if(!ow)return;
  chips.forEach((t,i)=>{const c=document.createElement('div');c.className='ee-orbit-chip';c.innerText=t;ow.appendChild(c);let a=(i/chips.length)*Math.PI*2;const rx=window.innerWidth>600?220:140,ry=window.innerWidth>600?120:80;function o(){a+=.002;c.style.transform=`translate(${Math.cos(a)*rx}px,${Math.sin(a)*ry}px)`;requestAnimationFrame(o)}o()});
  let si=0;
  function lead(){const l=document.createElement('div');l.className='ee-lead-card';l.innerText=sources[Math.floor(Math.random()*sources.length)];const a=Math.random()*Math.PI*2;l.style.left=`calc(50% + ${Math.cos(a)*450}px)`;l.style.top=`calc(50% + ${Math.sin(a)*450}px)`;lc.appendChild(l);setTimeout(()=>{l.style.transition='all 2.2s cubic-bezier(.4,0,.2,1)';l.style.opacity='1';l.style.left='calc(50% - 40px)';l.style.top='calc(50% - 15px)';l.style.transform='scale(.5)'},100);setTimeout(()=>{l.style.opacity='0';proc();setTimeout(()=>l.remove(),600)},2300)}
  function proc(){hub.style.transform='scale(1.1)';hub.style.borderColor='#19335D';setTimeout(()=>{hub.style.transform='scale(1)';hub.style.borderColor='#DE6E30'},300);toast.classList.add('active');setTimeout(()=>toast.classList.remove('active'),2800);steps.forEach(s=>s.classList.remove('active'));si=(si+1)%steps.length;steps[si].classList.add('active')}
  let iv;
  new IntersectionObserver(es=>{if(es[0].isIntersecting){iv=setInterval(lead,4800);lead()}else clearInterval(iv)},{threshold:.1}).observe(document.getElementById('respondHero'));
})();
</script>

<!-- ======================== BOOST CONVERSION (Interactive Story) ======================== -->
<style>
#interactive-story-root{margin-top:10px;margin-bottom:10px;font-family:'Plus Jakarta Sans',sans-serif;background:#fff}
#interactive-story-root .system-idle{filter:grayscale(1) opacity(.6) blur(2px);transition:all 1s cubic-bezier(.16,1,.3,1)}
#interactive-story-root .glass-hud{background:rgba(25,51,93,.85);backdrop-filter:blur(16px);border:1px solid rgba(255,255,255,.1);box-shadow:0 25px 50px -12px rgba(0,0,0,.5)}
#interactive-story-root .pulse-orange{box-shadow:0 0 0 0 rgba(222,110,48,.4);animation:bc-pulse 2s infinite}
@keyframes bc-pulse{70%{box-shadow:0 0 0 20px rgba(222,110,48,0)}100%{box-shadow:0 0 0 0 rgba(222,110,48,0)}}
#interactive-story-root .scene-enter{animation:bc-scene .6s cubic-bezier(.23,1,.32,1) forwards}
@keyframes bc-scene{from{opacity:0;transform:translateY(20px) scale(.95)}to{opacity:1;transform:translateY(0) scale(1)}}
#interactive-story-root .step-card{border-left:4px solid transparent;transition:all .4s ease}
#interactive-story-root .step-card.active{border-left-color:#DE6E30;background:#fff;box-shadow:0 10px 30px rgba(25,51,93,.08);transform:translateX(8px)}
#interactive-story-root .scanner-line{height:100%;width:2px;background:linear-gradient(to bottom,transparent,#DE6E30,transparent);position:absolute;left:0;top:0;animation:bc-scanX 3s linear infinite;opacity:.3}
@keyframes bc-scanX{0%{left:0}100%{left:100%}}
</style>
<section id="interactive-story-root">
  <div class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-16 md:mb-24">
      <div class="inline-flex items-center gap-3 mb-6 bg-orange-50 px-5 py-2 rounded-full border border-orange-100 shadow-sm">
        <span class="flex h-2 w-2 rounded-full bg-orange-500 pulse-orange"></span>
        <span class="text-xs font-bold text-orange-700 uppercase tracking-[0.2em]"><?php ee_h('bc_badge','Boost Conversion Rates'); ?></span>
      </div>
      <h2 class="text-4xl md:text-6xl font-extrabold text-[#19335D] tracking-tight mb-8"><?php ee_h('bc_h2_p1','AI Decides the Right'); ?> <br class="hidden md:block"> <?php ee_h('bc_h2_p2','Admission Engagements.'); ?></h2>
      <p class="max-w-3xl mx-auto text-lg md:text-xl text-slate-500 leading-relaxed"><?php ee_h('bc_subtext','ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who, when, and how to engage. Every interaction is timely, relevant, and context-aware.'); ?></p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-stretch">
      <div id="logic-steps" class="lg:col-span-4 space-y-4 order-2 lg:order-1 system-idle">
        <div onclick="window.__bcJump(0)" class="step-card active p-6 rounded-3xl bg-slate-50 cursor-pointer">
          <div class="flex gap-5 items-center">
            <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-[#19335D] shadow-sm font-bold">1</div>
            <div><h4 class="font-bold text-[#19335D] text-lg">Behaviour Intelligence</h4><p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">Real-time Intent Tracking</p></div>
          </div>
        </div>
        <div onclick="window.__bcJump(1)" class="step-card p-6 rounded-3xl bg-slate-50 cursor-pointer">
          <div class="flex gap-5 items-center">
            <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-[#19335D] shadow-sm font-bold">2</div>
            <div><h4 class="font-bold text-[#19335D] text-lg">Dynamic Engagement</h4><p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">Contextual Routing</p></div>
          </div>
        </div>
        <div onclick="window.__bcJump(2)" class="step-card p-6 rounded-3xl bg-slate-50 cursor-pointer">
          <div class="flex gap-5 items-center">
            <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-[#19335D] shadow-sm font-bold">3</div>
            <div><h4 class="font-bold text-[#19335D] text-lg">VidyaGPT Support</h4><p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">24x7 AI Assistance</p></div>
          </div>
        </div>
        <div class="p-6 rounded-3xl border-2 border-dashed border-slate-100 mt-10"><p class="text-sm text-slate-500 leading-relaxed italic">"Admissions teams move away from manual follow-ups and generic messaging. AI-guided engagements adapt in real time and drive higher enrollments."</p></div>
      </div>
      <div id="ai-engine-console" class="lg:col-span-8 relative bg-[#19335D] rounded-[48px] p-8 md:p-16 overflow-hidden shadow-2xl flex items-center justify-center min-h-[550px] order-1 lg:order-2">
        <div class="scanner-line"></div>
        <div id="boot-overlay" class="absolute inset-0 bg-[#19335D] z-20 flex flex-col items-center justify-center transition-all duration-1000">
          <div class="w-24 h-24 rounded-full border-2 border-dashed border-orange-500/30 flex items-center justify-center mb-8 pulse-orange"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg></div>
          <div class="text-orange-500 font-mono text-[10px] uppercase tracking-[0.4em] mb-4">System Status: Standby</div>
          <p class="text-white/40 text-sm animate-pulse">HOVER TO BOOT AI ENGINE</p>
        </div>
        <div id="hud-container" class="w-full h-full opacity-0 scale-95 transition-all duration-700 z-10 flex flex-col justify-between">
          <div class="flex justify-between items-start mb-8">
            <div class="flex items-center gap-3"><div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div><span class="text-white/50 font-mono text-[10px] uppercase tracking-widest">Neural Link: Active</span></div>
            <div class="text-right"><span class="text-white/30 font-mono text-[10px] uppercase block mb-1">Processing Stage</span><span id="stage-name" class="text-orange-500 font-bold text-xs uppercase tracking-widest">---</span></div>
          </div>
          <div id="stage-mount" class="flex-grow flex items-center justify-center"></div>
          <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-6 pt-8 border-t border-white/10">
            <div><p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">Intent Score</p><p id="intent-val" class="text-white font-bold text-xl">--</p></div>
            <div><p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">Channel Opt.</p><p id="channel-val" class="text-orange-500 font-bold text-xl">--</p></div>
            <div class="hidden md:block"><p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">Enroll Prob.</p><div class="w-full bg-white/10 h-1.5 rounded-full mt-2"><div id="prob-bar" class="h-full bg-orange-500 w-0 transition-all duration-1000"></div></div></div>
            <div class="text-right"><p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">AI Decision</p><p class="text-green-400 font-mono text-[10px]">ENGAGE_NOW</p></div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl"><div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8">📧</div><h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f1_title','Trigger-Based Email & SMS'); ?></h5><p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f1_desc','Automated personalized outreach triggered by student behavior thresholds.'); ?></p></div>
      <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl"><div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8">📞</div><h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f2_title','AI Calling & Click-to-Call'); ?></h5><p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f2_desc','Intelligence-led queues that connect teams to high-intent leads instantly.'); ?></p></div>
      <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl"><div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8">🤖</div><h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f3_title','VidyaGPT AI Agents'); ?></h5><p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f3_desc','24x7 admission counselors providing accurate, contextual answers instantly.'); ?></p></div>
      <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl"><div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8">💬</div><h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f4_title','WhatsApp Communication'); ?></h5><p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f4_desc','Engage students where they are with official WhatsApp business API integration.'); ?></p></div>
    </div>
  </div>
</section>
<script>
(function(){
  const STAGES=[
    {name:"Behaviour Mapping",intent:"84/100",channel:"MONITOR",prob:"65%",html:'<div class="scene-enter glass-hud p-8 rounded-[32px] w-full max-w-md border-l-4 border-orange-500"><div class="flex items-center gap-4 mb-6"><div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">AK</div><div><div class="text-white font-bold">Ananya Kapoor</div><div class="text-[10px] text-white/40 uppercase tracking-widest font-mono">Prospect ID: #82910</div></div></div><div class="space-y-3"><div class="flex justify-between text-xs py-2 border-b border-white/5"><span class="text-white/60">Interest: MBA International</span><span class="text-green-400">HIGH</span></div><div class="flex justify-between text-xs py-2 border-b border-white/5"><span class="text-white/60">Time on Pricing Page</span><span class="text-white">04m 22s</span></div><p class="text-[10px] text-orange-500/80 font-mono italic pt-2">AI DECISION: Threshold met. Deploying engagement logic...</p></div></div>'},
    {name:"Dynamic Routing",intent:"92/100",channel:"WHATSAPP",prob:"88%",html:'<div class="scene-enter flex flex-col items-center gap-8 w-full"><div class="flex gap-4 items-center"><div class="w-16 h-16 rounded-3xl bg-white/5 flex items-center justify-center opacity-20 text-white">📧</div><div class="w-24 h-24 rounded-3xl bg-orange-500 flex flex-col items-center justify-center text-white shadow-2xl scale-125 z-10"><span class="text-2xl mb-1">💬</span><span class="text-[8px] font-black uppercase tracking-widest">Active</span></div><div class="w-16 h-16 rounded-3xl bg-white/5 flex items-center justify-center opacity-20 text-white">📞</div></div><p class="text-white/60 text-xs max-w-xs text-center leading-relaxed">Intelligence chooses <span class="text-white font-bold">WhatsApp</span> based on student\'s previous interaction patterns and device usage.</p></div>'},
    {name:"VidyaGPT Engagement",intent:"99/100",channel:"AI_AGENT",prob:"97%",html:'<div class="scene-enter w-full max-w-sm space-y-4"><div class="glass-hud p-4 rounded-2xl rounded-bl-none max-w-[90%] border-l-2 border-orange-500"><p class="text-xs text-white leading-relaxed">"Hello Ananya! I noticed you were looking at the MBA Scholarship structure. Need the PDF of eligibility criteria?"</p><p class="text-[8px] text-orange-500 font-bold mt-2 uppercase tracking-widest">VidyaGPT • 2s ago</p></div><div class="bg-white p-4 rounded-2xl rounded-br-none max-w-[80%] ml-auto shadow-xl"><p class="text-xs text-[#19335D] font-bold">"Yes, please send it over!"</p></div></div>'}
  ];
  let cur=0,live=false,loop=null;
  const root=document.getElementById('interactive-story-root'),ov=document.getElementById('boot-overlay'),hud=document.getElementById('hud-container'),sts=document.getElementById('logic-steps'),mnt=document.getElementById('stage-mount');
  if(!root)return;
  const sN=document.getElementById('stage-name'),iV=document.getElementById('intent-val'),cV=document.getElementById('channel-val'),pB=document.getElementById('prob-bar');
  function render(i){cur=i;const d=STAGES[i];document.querySelectorAll('#interactive-story-root .step-card').forEach((c,n)=>{if(n===i)c.classList.add('active');else c.classList.remove('active')});sN.innerText=d.name;iV.innerText=d.intent;cV.innerText=d.channel;pB.style.width=d.prob;mnt.innerHTML=d.html}
  function start(){if(loop)clearInterval(loop);loop=setInterval(()=>render((cur+1)%STAGES.length),5000)}
  function boot(){if(live)return;live=true;ov.classList.add('opacity-0','pointer-events-none','scale-110');hud.classList.remove('opacity-0','scale-95');hud.classList.add('opacity-100','scale-100');sts.classList.remove('system-idle');render(0);start()}
  window.__bcJump=function(i){clearInterval(loop);render(i);setTimeout(start,10000)};
  root.addEventListener('mouseenter',boot);root.addEventListener('touchstart',boot);
})();
</script>

<!-- ======================== CONVERT MORE ======================== -->
<style>
.cm-section{margin-top:10px;margin-bottom:10px;font-family:'Open Sans',sans-serif;background:#fff;padding:64px 0 112px;position:relative;overflow:hidden}
.cm-section .font-poppins{font-family:'Poppins',sans-serif}
.cm-section .dashboard-container{transition:all .9s cubic-bezier(.16,1,.3,1);filter:grayscale(100%) opacity(.6) blur(2px);transform:translateY(20px) scale(.97);width:100%;max-width:28rem;margin:0 auto;aspect-ratio:4/5;background:#fff;border-radius:3rem;box-shadow:0 60px 130px -20px rgba(25,51,93,.2);border:1px solid #f8fafc;overflow:hidden;position:relative;display:flex;flex-direction:column}
.cm-section:hover .dashboard-container{filter:grayscale(0) opacity(1) blur(0);transform:translateY(0) scale(1)}
.cm-section .story-card{display:none;opacity:0;transform:translateX(30px);transition:all .6s cubic-bezier(.34,1.56,.64,1)}
.cm-section .story-card.active{display:block;opacity:1;transform:translateX(0)}
.cm-section .glass-ui{background:rgba(255,255,255,.9);backdrop-filter:blur(15px);border:1px solid rgba(25,51,93,.1);box-shadow:0 20px 50px -10px rgba(25,51,93,.15)}
.cm-section .scan-laser{position:absolute;height:2px;width:100%;background:linear-gradient(90deg,transparent,#DE6E30,transparent);top:0;z-index:20;opacity:0}
.cm-section:hover .scan-laser{animation:cm-laser 3s infinite linear;opacity:.8}
@keyframes cm-laser{0%{top:0}100%{top:100%}}
.cm-section .propensity-ring{transition:stroke-dashoffset 1.5s cubic-bezier(.65,0,.35,1);transform:rotate(-90deg);transform-origin:50% 50%}
.cm-section .cta-magnetic{background:#DE6E30;transition:transform .4s cubic-bezier(.23,1,.32,1),box-shadow .4s ease}
.cm-section .cta-magnetic:hover{box-shadow:0 15px 30px rgba(222,110,48,.4)}
@media(max-width:1024px){.cm-section .dashboard-container{filter:none;opacity:1;transform:none}}
</style>
<section class="cm-section">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
      <div class="order-2 lg:order-1">
        <header class="mb-8">
          <span class="font-poppins text-sm font-bold uppercase tracking-[0.4em] mb-4 block text-[#DE6E30]"><?php ee_h('cm_eyebrow','Convert More'); ?></span>
          <h2 class="font-poppins text-5xl md:text-6xl lg:text-7xl font-bold leading-[1.05] mb-8 text-[#19335D]"><?php ee_h('cm_h2_p1','Turn Enquiries Into'); ?> <br><span class="text-[#DE6E30]"><?php ee_h('cm_h2_p2','Enrollments'); ?></span></h2>
          <p class="text-xl font-semibold mb-6 text-[#19335D]"><?php ee_h('cm_subtitle','Not every enquiry deserves the same attention.'); ?></p>
          <p class="text-lg opacity-80 leading-relaxed max-w-xl text-[#19335D]"><?php ee_h('cm_description','ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward. The result is higher efficiency and stronger enrollment conversions.'); ?></p>
        </header>
        <ul class="space-y-4 mb-12 font-poppins font-semibold">
          <li class="flex items-center space-x-3"><span class="text-2xl text-[#DE6E30]">•</span><span class="text-[#19335D]">Powered by Intelligent Prioritization</span></li>
          <li class="flex items-center space-x-3"><span class="text-2xl text-[#DE6E30]">•</span><span class="text-[#19335D]">Prediction Score</span></li>
          <li class="flex items-center space-x-3"><span class="text-2xl text-[#DE6E30]">•</span><span class="text-[#19335D]">Next Best Action</span></li>
          <li class="flex items-center space-x-3"><span class="text-2xl text-[#DE6E30]">•</span><span class="text-[#19335D]">Follow-Up Calendar</span></li>
          <li class="flex items-center space-x-3"><span class="text-2xl text-[#DE6E30]">•</span><span class="text-[#19335D]">Multi-Funnel Stages</span></li>
        </ul>
        <div class="relative inline-block">
          <a href="<?php ee_u('cm_cta_url','#'); ?>" class="cta-magnetic inline-flex items-center px-10 py-5 rounded-full text-white font-bold text-lg"><?php ee_h('cm_cta_text','Book a Demo'); ?><svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
        </div>
      </div>
      <div class="order-1 lg:order-2 relative">
        <div class="dashboard-container">
          <div class="scan-laser"></div>
          <div class="h-14 border-b flex items-center px-8 justify-between bg-slate-50/30" style="border-color:rgba(25,51,93,.05)"><div class="flex space-x-1.5"><div class="w-2.5 h-2.5 rounded-full bg-slate-200"></div><div class="w-2.5 h-2.5 rounded-full bg-slate-200"></div></div><div class="text-[9px] font-bold tracking-[0.2em] opacity-40 uppercase text-[#19335D]">ExtraaEdge AI Intelligence</div></div>
          <div id="cm-story-viewport" class="flex-1 p-8 relative flex flex-col justify-center overflow-hidden">
            <div class="story-card active" data-cm="0"><div class="mb-4"><span class="px-3 py-1 rounded-full text-[10px] font-bold text-white mb-4 inline-block bg-[#DE6E30]">NEW ENQUIRY DETECTED</span><h3 class="text-3xl font-bold mt-2 text-[#19335D]">Arjun Mehta</h3><p class="text-sm opacity-50">Course: Masters in AI & Data Science</p></div><div class="glass-ui p-5 rounded-3xl flex items-center space-x-4 border-dashed border-[#DE6E30]"><div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-2xl">⚡</div><div><div class="text-[9px] uppercase font-bold opacity-30">Engagement Level</div><div class="text-sm font-bold text-[#19335D]">Very Active (3 Sessions)</div></div></div></div>
            <div class="story-card" data-cm="1"><div class="flex flex-col items-center text-center"><div class="w-24 h-24 rounded-full border-4 border-dashed animate-[spin_8s_linear_infinite] mb-8 flex items-center justify-center border-[#DE6E30]"><span class="text-4xl">🧠</span></div><h4 class="text-2xl font-bold mb-2 text-[#19335D]">AI Intent Scoping</h4><p class="text-xs opacity-50 px-8">Calculating propensity based on application stage and historical enrollment patterns...</p></div></div>
            <div class="story-card" data-cm="2"><div class="flex flex-col items-center"><p class="text-[10px] font-bold uppercase tracking-widest mb-6 opacity-30 text-[#19335D]">Enrollment Prediction</p><div class="relative w-48 h-48 flex items-center justify-center"><svg class="w-full h-full"><circle cx="96" cy="96" r="85" stroke="#F1F5F9" stroke-width="14" fill="transparent"></circle><circle id="cm-score-ring" cx="96" cy="96" r="85" stroke="#DE6E30" stroke-width="14" fill="transparent" stroke-dasharray="534" stroke-dashoffset="534" class="propensity-ring"></circle></svg><div class="absolute flex flex-col items-center"><span class="text-6xl font-bold text-[#19335D]">92%</span><span class="text-[10px] font-bold text-green-500 uppercase mt-1">High Intent</span></div></div></div></div>
            <div class="story-card" data-cm="3"><p class="text-[10px] font-bold uppercase tracking-widest mb-4 opacity-30 text-[#19335D]">Next Best Action Recommendation</p><div class="glass-ui p-6 rounded-[2.5rem] border-l-[12px] border-[#DE6E30]"><h4 class="font-bold text-xl mb-2 text-[#19335D]">Personalized Follow-up</h4><p class="text-sm opacity-60 mb-6 italic">"Send Scholarship Guide - Arjun viewed the pricing page twice in 10 mins."</p><div class="flex space-x-2"><button class="flex-1 py-3 bg-slate-100 rounded-2xl text-[10px] font-bold opacity-50 uppercase">Later</button><button class="flex-[2] py-3 text-white rounded-2xl text-[10px] font-bold uppercase bg-[#19335D]">Execute Now</button></div></div></div>
            <div class="story-card" data-cm="4"><div class="flex flex-col items-center text-center"><div class="w-20 h-20 rounded-full flex items-center justify-center text-white mb-6 shadow-2xl bg-[#DE6E30]"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div><h3 class="text-3xl font-bold mb-2 text-[#19335D]">Enrollment Secured</h3><p class="text-sm opacity-50">Conversion cycle reduced by 40%</p></div></div>
          </div>
          <div class="h-20 bg-slate-50 border-t flex items-center px-8 justify-between" style="border-color:rgba(25,51,93,.05)"><div class="flex flex-col"><span class="text-[9px] font-bold opacity-30 uppercase">Automation Stats</span><span class="text-xs font-bold text-green-500">+22% Conv. Rate</span></div><div class="flex -space-x-3"><div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200"></div><div class="w-8 h-8 rounded-full border-2 border-white bg-slate-300"></div><div class="w-8 h-8 rounded-full border-2 border-white bg-orange-100 flex items-center justify-center text-[10px] font-bold text-[#DE6E30]">+12</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
(function(){
  const section=document.querySelector('.cm-section');if(!section)return;
  const cards=section.querySelectorAll('.story-card'),ring=document.getElementById('cm-score-ring');
  let idx=0,iv=null,running=false;
  function run(){cards.forEach(c=>c.classList.remove('active'));cards[idx].classList.add('active');if(idx===2&&ring){ring.style.strokeDashoffset=534;setTimeout(()=>ring.style.strokeDashoffset=534-(534*.92),100)}idx=(idx+1)%cards.length}
  section.addEventListener('mouseenter',()=>{if(!running){running=true;run();iv=setInterval(run,3500)}});
  section.addEventListener('mouseleave',()=>{running=false;clearInterval(iv)});
})();
</script>

<!-- ======================== INTELLIGENCE ENGINE / ANALYTICS ======================== -->
<style>
#analyticsModule{margin-top:10px;margin-bottom:10px;padding:100px 0;position:relative;background:#fff;transition:background .5s ease;font-family:'Plus Jakarta Sans',sans-serif}
#analyticsModule .perspective-view{perspective:2000px}
#analyticsModule .dashboard-canvas{transform-style:preserve-3d;transition:transform .2s ease-out,box-shadow .4s ease;background:rgba(255,255,255,.9);backdrop-filter:blur(20px);border:1px solid rgba(25,51,93,.1);border-radius:40px;box-shadow:0 30px 60px -12px rgba(25,51,93,.15)}
#analyticsModule .mono-font{font-family:'JetBrains Mono',monospace}
#analyticsModule .ai-cursor::after{content:'|';animation:ie-blink 1s step-end infinite;color:#DE6E30;font-weight:bold}
@keyframes ie-blink{50%{opacity:0}}
#analyticsModule .chart-path{stroke-dasharray:1500;stroke-dashoffset:1500}
#analyticsModule.is-active .chart-path{stroke-dashoffset:0;transition:stroke-dashoffset 5s cubic-bezier(.19,1,.22,1)}
#analyticsModule .activation-layer{position:absolute;inset:0;z-index:40;cursor:pointer}
#analyticsModule .custom-bullet{width:8px;height:8px;border-radius:2px;background:#DE6E30;transform:rotate(45deg)}
@keyframes ie-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-15px)}}
#analyticsModule .float-anim{animation:ie-float 6s ease-in-out infinite}
#analyticsModule .text-gradient{background:linear-gradient(135deg,#19335D 0%,#DE6E30 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
</style>
<section id="analyticsModule">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
    <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start">
      <div class="w-full lg:w-[45%]">
        <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-[#DE6E30]/10 border border-[#DE6E30]/20 text-[#DE6E30] text-[10px] font-black uppercase tracking-[0.4em] mb-8"><span class="w-2 h-2 rounded-full bg-[#DE6E30] animate-pulse"></span><?php ee_h('ie_badge','Measure your efforts'); ?></div>
        <h2 class="text-4xl lg:text-6xl font-extrabold text-[#19335D] leading-[1.1] mb-6 tracking-tight"><?php ee_h('ie_h2_p1',"Know What's Working."); ?> <br><span class="text-gradient"><?php ee_h('ie_h2_p2',"Fix What's Not."); ?></span></h2>
        <p class="text-lg text-slate-600 leading-relaxed mb-10"><?php ee_h('ie_description','Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance. Track counselors, campaigns, and lead sources in one place.'); ?></p>
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 mb-12">
          <li class="flex items-center gap-4"><div class="custom-bullet"></div><span class="text-sm font-bold text-[#19335D] tracking-tight">Analytics & Visibility Across</span></li>
          <li class="flex items-center gap-4"><div class="custom-bullet"></div><span class="text-sm font-bold text-[#19335D] tracking-tight">VidyaGPT Analytics + Analytics Builder</span></li>
          <li class="flex items-center gap-4"><div class="custom-bullet"></div><span class="text-sm font-bold text-[#19335D] tracking-tight">Counselor Dashboard</span></li>
          <li class="flex items-center gap-4"><div class="custom-bullet"></div><span class="text-sm font-bold text-[#19335D] tracking-tight">Custom Dashboards</span></li>
          <li class="flex items-center gap-4"><div class="custom-bullet"></div><span class="text-sm font-bold text-[#19335D] tracking-tight">Marketing Dashboard</span></li>
          <li class="flex items-center gap-4"><div class="custom-bullet"></div><span class="text-sm font-bold text-[#19335D] tracking-tight">Publisher Reports</span></li>
        </ul>
        <a href="<?php ee_u('ie_cta_url','#'); ?>" class="inline-block bg-[#DE6E30] text-white px-10 py-5 rounded-2xl font-black text-lg shadow-xl shadow-orange-500/30 hover:bg-[#19335D] hover:-translate-y-1 transform transition-all"><?php ee_h('ie_cta_text','Book a Demo'); ?></a>
      </div>
      <div class="w-full lg:w-[55%] perspective-view relative">
        <div id="engineActivator" class="activation-layer"></div>
        <div id="mainDashboard" class="dashboard-canvas p-6 md:p-10 relative overflow-hidden float-anim">
          <div class="flex justify-between items-center mb-10">
            <div class="flex items-center gap-4"><div class="w-10 h-10 rounded-xl bg-[#19335D] flex items-center justify-center shadow-lg"><svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M21 21H3V3h18v18zM5 19h14V5H5v14z"/><path d="M7 11h2v6H7zm4-4h2v10h-2zm4 7h2v3h-2z"/></svg></div><div><h4 class="text-sm font-black text-[#19335D] uppercase tracking-tighter">Live Intelligence Hub</h4><div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span><span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Processing Node 04</span></div></div></div>
            <div class="hidden md:block bg-slate-50 px-4 py-2 rounded-full border border-slate-100"><span id="ie-timestamp" class="text-[10px] font-bold text-slate-400 mono-font">SYNCING DATA...</span></div>
          </div>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm"><p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Admissions</p><div class="text-2xl font-black text-[#19335D] tabular-nums ie-counter" data-target="12480">0</div></div>
            <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm"><p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Campaign ROI</p><div class="text-2xl font-black text-[#DE6E30] tabular-nums ie-counter" data-target="4.8">0</div></div>
            <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm col-span-2 md:col-span-1"><p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Lead Health</p><div class="flex items-center gap-2"><div class="h-2 flex-1 bg-slate-100 rounded-full overflow-hidden"><div class="h-full bg-green-500 w-[85%]"></div></div><span class="text-xs font-bold text-slate-500">85%</span></div></div>
          </div>
          <div class="bg-[#19335D] rounded-[32px] p-8 mb-8 relative h-[240px] overflow-hidden">
            <div class="relative z-10 flex justify-between items-center text-white mb-4"><span class="text-xs font-bold uppercase tracking-widest opacity-60">Conversion Velocity</span><div class="flex gap-1 h-4 items-end"><div class="w-1 bg-[#DE6E30] h-full rounded-full animate-bounce"></div><div class="w-1 bg-white/20 h-1/2 rounded-full"></div><div class="w-1 bg-[#DE6E30] h-3/4 rounded-full"></div></div></div>
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 800 240" preserveAspectRatio="none"><path class="chart-path" d="M0,200 Q100,180 200,190 T400,100 T600,120 T800,40" fill="none" stroke="#DE6E30" stroke-width="6" stroke-linecap="round"></path><path d="M0,200 Q100,180 200,190 T400,100 T600,120 T800,40 V240 H0 Z" fill="rgba(222, 110, 48, 0.15)"></path></svg>
          </div>
          <div class="bg-slate-900 rounded-[24px] p-6 border-l-4 border-[#DE6E30]">
            <div class="flex items-center gap-3 mb-3"><div class="px-2 py-0.5 rounded bg-[#DE6E30] text-[8px] font-bold text-white uppercase">VidyaGPT v2.5</div><span class="text-[9px] text-slate-500 font-bold mono-font">PROCESSING...</span></div>
            <div id="aiTerm" class="mono-font text-xs md:text-sm text-slate-300 leading-relaxed ai-cursor min-h-[40px]">[System Idle. Initialize to scan lead health...]</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
(function(){
  const activator=document.getElementById('engineActivator'),section=document.getElementById('analyticsModule'),board=document.getElementById('mainDashboard'),terminal=document.getElementById('aiTerm'),counters=document.querySelectorAll('#analyticsModule .ie-counter');
  if(!activator)return;
  let active=false;
  const insights=["Analyzing Lead Sources... Google Ads delivering 2.4x quality increase.","Predictive Alert: High intent cluster detected in Facebook Retargeting.","Counselor 'Vikram' reached 115% of target conversion. Scaling insights...","Analytics Builder suggests re-distributing budget to High-ROI publishers.","Scanning Stage 2 drop-offs... Action: Triggering automated VidyaGPT SMS."];
  let mi=0,ci=0,del=false;
  function type(){if(!active)return;const m=insights[mi%insights.length];if(del){terminal.textContent='> '+m.substring(0,ci-1);ci--}else{terminal.textContent='> '+m.substring(0,ci+1);ci++}let sp=del?25:55;if(!del&&ci===m.length){sp=3500;del=true}else if(del&&ci===0){del=false;mi++;sp=500}setTimeout(type,sp)}
  function runCounters(){counters.forEach(c=>{const t=parseFloat(c.getAttribute('data-target')),d=2000,st=performance.now();function s(now){const p=Math.min((now-st)/d,1),v=p*t;c.textContent=t%1===0?Math.floor(v).toLocaleString():v.toFixed(1)+'x';if(p<1)requestAnimationFrame(s)}requestAnimationFrame(s)})}
  function activate(){if(active)return;active=true;section.classList.add('is-active');activator.style.display='none';board.classList.remove('float-anim');runCounters();type();setInterval(()=>{const d=new Date();const ts=document.getElementById('ie-timestamp');if(ts)ts.textContent=`SYSTIME: ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`},1000)}
  activator.addEventListener('mouseenter',activate);activator.addEventListener('touchstart',e=>{e.preventDefault();activate()},{passive:false});
})();
</script>

<!-- ======================== CRM IMPACT STORIES / TESTIMONIALS ======================== -->
<style>
#extraaedge-success-story-engine{margin:10px 0!important;padding:100px 0;background:#f8fafc;font-family:'Open Sans',sans-serif;color:#19335D;overflow:hidden;position:relative}
#extraaedge-success-story-engine .ee-logic-mesh{position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:1}
#extraaedge-success-story-engine .ee-pulse-line{position:absolute;background:linear-gradient(90deg,transparent,rgba(222,110,48,.15),transparent);height:1px;width:100%;opacity:0;transition:opacity 1s ease}
#extraaedge-success-story-engine.engine-active .ee-pulse-line{opacity:1;animation:ss-line 6s infinite linear}
@keyframes ss-line{from{transform:translateX(-100%)}to{transform:translateX(100%)}}
#extraaedge-success-story-engine .ee-container{max-width:1320px;margin:0 auto;padding:0 24px;position:relative;z-index:10}
#extraaedge-success-story-engine .ee-header-group{text-align:center;margin-bottom:70px;opacity:0;transform:translateY(30px);transition:all .6s cubic-bezier(.23,1,.32,1)}
#extraaedge-success-story-engine.engine-active .ee-header-group{opacity:1;transform:translateY(0)}
#extraaedge-success-story-engine .ee-tagline{font-family:'Poppins',sans-serif;color:#DE6E30;font-weight:700;letter-spacing:2px;text-transform:uppercase;font-size:14px;margin-bottom:15px;display:inline-block}
#extraaedge-success-story-engine .ee-title-main{font-family:'Poppins',sans-serif;font-size:clamp(32px,5vw,50px);font-weight:700;line-height:1.15;margin-bottom:25px}
#extraaedge-success-story-engine .ee-metrics-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:24px;margin-bottom:80px}
#extraaedge-success-story-engine .ee-metric-card{background:#fff;padding:35px 20px;border-radius:24px;text-align:center;box-shadow:0 4px 6px -1px rgba(0,0,0,.05);border:1px solid rgba(25,51,93,.05);transition:all .6s cubic-bezier(.23,1,.32,1);opacity:0;transform:scale(.9)}
#extraaedge-success-story-engine.engine-active .ee-metric-card{opacity:1;transform:scale(1)}
#extraaedge-success-story-engine .ee-metric-card:hover{border-color:#DE6E30;transform:translateY(-8px)}
#extraaedge-success-story-engine .ee-val{display:block;font-size:42px;font-weight:700;color:#DE6E30;font-family:'Poppins',sans-serif;margin-bottom:5px}
#extraaedge-success-story-engine .ee-lab{font-size:13px;font-weight:600;color:#475569;text-transform:uppercase;letter-spacing:1px}
#extraaedge-success-story-engine .ee-cards-layout{display:grid;grid-template-columns:repeat(auto-fit,minmax(390px,1fr));gap:35px}
#extraaedge-success-story-engine .ee-story-card{background:#fff;border-radius:35px;overflow:hidden;border:1px solid rgba(25,51,93,.04);box-shadow:0 20px 25px -5px rgba(25,51,93,.1),0 10px 10px -5px rgba(25,51,93,.04);display:flex;flex-direction:column;transition:all .6s cubic-bezier(.23,1,.32,1);opacity:0;transform:translateY(50px);height:100%}
#extraaedge-success-story-engine.engine-active .ee-story-card{opacity:1;transform:translateY(0)}
#extraaedge-success-story-engine .ee-story-card:hover{transform:translateY(-15px) scale(1.01);box-shadow:0 40px 70px -15px rgba(25,51,93,.2)}
#extraaedge-success-story-engine .ee-vid-container{width:100%;aspect-ratio:16/9;background:#000;position:relative;cursor:pointer}
#extraaedge-success-story-engine .ee-thumb-wrapper{position:absolute;top:0;left:0;width:100%;height:100%;z-index:10;transition:opacity .5s ease}
#extraaedge-success-story-engine .ee-vid-img{width:100%;height:100%;object-fit:cover;transition:transform 1s ease}
#extraaedge-success-story-engine .ee-story-card:hover .ee-vid-img{transform:scale(1.1)}
#extraaedge-success-story-engine .ee-play-btn{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:75px;height:75px;background:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 30px rgba(0,0,0,.3);transition:all .6s cubic-bezier(.23,1,.32,1)}
#extraaedge-success-story-engine .ee-play-btn::after{content:'';border-left:20px solid #DE6E30;border-top:13px solid transparent;border-bottom:13px solid transparent;margin-left:5px}
#extraaedge-success-story-engine .ee-story-card:hover .ee-play-btn{background:#DE6E30;transform:translate(-50%,-50%) scale(1.1)}
#extraaedge-success-story-engine .ee-story-card:hover .ee-play-btn::after{border-left-color:#fff}
#extraaedge-success-story-engine .ee-vid-container.active-play .ee-thumb-wrapper{opacity:0;pointer-events:none}
#extraaedge-success-story-engine .ee-story-body{padding:40px;flex-grow:1;display:flex;flex-direction:column}
#extraaedge-success-story-engine .ee-quote{font-size:15px;line-height:1.8;color:#475569;margin-bottom:30px;font-style:italic;position:relative}
#extraaedge-success-story-engine .ee-profile-box{margin-top:auto;display:flex;align-items:center;gap:18px;padding-top:25px;border-top:1px solid #f1f5f9}
#extraaedge-success-story-engine .ee-pfp{width:70px;height:70px;border-radius:18px;object-fit:cover;border:3px solid rgba(222,110,48,.2);transition:all .6s}
#extraaedge-success-story-engine .ee-story-card:hover .ee-pfp{border-color:#DE6E30;border-radius:50%}
#extraaedge-success-story-engine .ee-name{font-family:'Poppins',sans-serif;font-size:19px;font-weight:700;margin:0;color:#19335D}
#extraaedge-success-story-engine .ee-role{font-size:13px;font-weight:700;color:#DE6E30;margin:2px 0}
#extraaedge-success-story-engine .ee-inst{font-size:11px;color:#94a3b8;font-weight:600;text-transform:uppercase}
@media(max-width:1024px){#extraaedge-success-story-engine .ee-metrics-grid{grid-template-columns:repeat(2,1fr)}#extraaedge-success-story-engine .ee-cards-layout{grid-template-columns:repeat(auto-fit,minmax(340px,1fr))}}
@media(max-width:768px){#extraaedge-success-story-engine .ee-metrics-grid{grid-template-columns:1fr}#extraaedge-success-story-engine .ee-cards-layout{grid-template-columns:1fr}#extraaedge-success-story-engine .ee-title-main{font-size:32px}#extraaedge-success-story-engine{padding:60px 0}}
</style>
<section id="extraaedge-success-story-engine">
  <div class="ee-logic-mesh" id="ee-mesh"></div>
  <div class="ee-container">
    <header class="ee-header-group">
      <span class="ee-tagline"><?php ee_h('st_tagline','CRM Impact Stories'); ?></span>
      <h2 class="ee-title-main"><?php ee_h('st_h2_p1','Powering Growth for'); ?> <br><?php ee_h('st_h2_p2','500+ Happy Customers'); ?></h2>
      <p><?php ee_h('st_subtitle','From streamlined counselor workflows to data-driven reporting, see how education leaders are rewriting their success stories with ExtraaEdge.'); ?></p>
    </header>
    <div class="ee-metrics-grid">
      <div class="ee-metric-card"><span class="ee-val" data-target="<?php ee_a('st_m1_num','500'); ?>" data-suffix="+">0</span><span class="ee-lab"><?php ee_h('st_m1_lab','Happy Customers'); ?></span></div>
      <div class="ee-metric-card"><span class="ee-val" data-target="<?php ee_a('st_m2_num','3'); ?>" data-suffix="X">0</span><span class="ee-lab"><?php ee_h('st_m2_lab','X Conversion Rate'); ?></span></div>
      <div class="ee-metric-card"><span class="ee-val" data-target="<?php ee_a('st_m3_num','15000'); ?>" data-suffix="+">0</span><span class="ee-lab"><?php ee_h('st_m3_lab','Daily Power Users'); ?></span></div>
      <div class="ee-metric-card"><span class="ee-val" data-target="<?php ee_a('st_m4_num','99'); ?>" data-suffix="%">0</span><span class="ee-lab"><?php ee_h('st_m4_lab','% Support Rating'); ?></span></div>
    </div>
    <div class="ee-cards-layout">
      <?php
      $testi_defaults = array(
        1 => array(
          'video'=>'3SHgLf1GFgk','name'=>'Silky Jain Marwah','role'=>'Executive Director','inst'=>"Tula's Institute",
          'photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp',
          'quote'=>'"ExtraaEdge is an incredibly dynamic and trustworthy platform that truly understands our needs and bridges the gap with technology by providing effective solutions. Whether it\'s from a counsellor\'s or an admin\'s perspective, most of the changes we require in the CRM are implemented in a very short span of time. One of the things we love most is how user-friendly it is and our team adapted to it very quickly. Creating new reports on our own, without having to rely on the developer team, has been a game-changer."',
        ),
        2 => array(
          'video'=>'dWLdQ8E3FOU','name'=>'Pranay Rupani','role'=>'Head of Admissions & Marketing','inst'=>'Annapurna College of Film & Media',
          'photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp',
          'quote'=>'"ExtraaEdge has been a true game-changer for us at Annapurna College of Film and Media. Managing admissions in a creative environment like ours requires efficiency without losing the personal touch, and ExtraaEdge delivers exactly that. From seamless WhatsApp integrations to automated workflows, our entire lead journey is now streamlined and measurable. Most importantly, the team\'s dedication and deep understanding of our goals make them indispensable."',
        ),
        3 => array(
          'video'=>'yfK83D2SKps','name'=>'K. Nirmala Devi','role'=>'Assistant Manager','inst'=>'Indian Academy Group',
          'photo'=>'https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp',
          'quote'=>'"The platform is very user-friendly and allows us to customize the application to fit our specific needs. Tracking the lead journey is smooth. We received excellent training during the adoption phase. One of the best parts is how the ExtraaEdge technical team is accessible anytime, anywhere, and they resolve issues immediately without any delays. Our Customer Success Manager is also very responsive and follows up to ensure everything is resolved."',
        ),
      );
      foreach ($testi_defaults as $i => $d) :
        $vid   = ee_raw("st_t{$i}_video", $d['video']);
        $name  = ee_raw("st_t{$i}_name", $d['name']);
        $role  = ee_raw("st_t{$i}_role", $d['role']);
        $inst  = ee_raw("st_t{$i}_inst", $d['inst']);
        $photo = ee_raw("st_t{$i}_photo", $d['photo']);
        $quote = ee_raw("st_t{$i}_quote", $d['quote']);
      ?>
      <article class="ee-story-card">
        <div class="ee-vid-container" id="vid-<?php echo $i; ?>" data-yt="<?php echo esc_attr($vid); ?>" onclick="window.__eePlayInPlace('vid-<?php echo $i; ?>','<?php echo esc_js($vid); ?>')">
          <div class="ee-thumb-wrapper">
            <img src="https://img.youtube.com/vi/<?php echo esc_attr($vid); ?>/maxresdefault.jpg" class="ee-vid-img" alt="<?php echo esc_attr($name); ?> testimonial" loading="lazy">
            <div class="ee-play-btn"></div>
          </div>
          <div class="ee-slot" style="height:100%"></div>
        </div>
        <div class="ee-story-body">
          <div class="ee-quote"><?php echo wp_kses_post($quote); ?></div>
          <div class="ee-profile-box">
            <img src="<?php echo esc_url($photo); ?>" class="ee-pfp" alt="<?php echo esc_attr($name); ?>" loading="lazy">
            <div>
              <h4 class="ee-name"><?php echo esc_html($name); ?></h4>
              <p class="ee-role"><?php echo esc_html($role); ?></p>
              <span class="ee-inst"><?php echo esc_html($inst); ?></span>
            </div>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<script>
(function(){
  const wrapper=document.getElementById('extraaedge-success-story-engine'),mesh=document.getElementById('ee-mesh');
  if(!wrapper)return;
  let triggered=false;
  for(let i=0;i<12;i++){const l=document.createElement('div');l.className='ee-pulse-line';l.style.top=(Math.random()*100)+'%';l.style.animationDuration=(4+Math.random()*6)+'s';l.style.animationDelay=(Math.random()*5)+'s';mesh.appendChild(l)}
  function nums(){document.querySelectorAll('#extraaedge-success-story-engine .ee-val').forEach(c=>{const t=+c.getAttribute('data-target'),sfx=c.getAttribute('data-suffix')||'',d=2000;let s=null;function a(ts){if(!s)s=ts;const p=Math.min((ts-s)/d,1),cur=Math.floor(p*t);c.innerText=(t>=1000?cur.toLocaleString():cur)+sfx;if(p<1)requestAnimationFrame(a)}requestAnimationFrame(a)})}
  function activate(){if(triggered)return;triggered=true;wrapper.classList.add('engine-active');nums()}
  wrapper.addEventListener('mouseenter',activate);
  new IntersectionObserver(es=>{if(es[0].isIntersecting)activate()},{threshold:.2}).observe(wrapper);
  window.__eePlayInPlace=function(id,yt){const c=document.getElementById(id);if(!c||c.classList.contains('active-play'))return;c.querySelector('.ee-slot').innerHTML='<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+yt+'?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';c.classList.add('active-play')};
})();
</script>

<!-- ======================== FINAL AI DEMO CTA ======================== -->
<style>
#wp-ai-demo-cta{margin:10px 0;padding:80px 5%;background:#fff;font-family:'Open Sans',sans-serif;color:#19335D;overflow:hidden;position:relative;display:flex;justify-content:center}
#wp-ai-demo-cta .cta-max-width{max-width:1200px;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
#wp-ai-demo-cta .cta-headline{font-family:'Poppins',sans-serif;font-size:clamp(34px,4.5vw,52px);font-weight:700;line-height:1.15;margin-bottom:20px;color:#19335D}
#wp-ai-demo-cta .cta-subheadline{font-size:clamp(17px,2vw,20px);line-height:1.7;margin-bottom:40px;opacity:.95;max-width:580px}
#wp-ai-demo-cta .cta-action-area{display:flex;flex-direction:column;gap:20px}
#wp-ai-demo-cta .btn-premium{display:inline-block;background:#DE6E30;color:#fff;padding:22px 50px;font-family:'Poppins',sans-serif;font-size:18px;font-weight:600;text-decoration:none;border-radius:60px;width:fit-content;transition:all .5s cubic-bezier(.23,1,.32,1);box-shadow:0 12px 30px rgba(222,110,48,.3);border:2px solid transparent;text-align:center}
#wp-ai-demo-cta .btn-premium:hover{transform:translateY(-5px);box-shadow:0 20px 40px rgba(222,110,48,.45);background:#c75c24}
#wp-ai-demo-cta .trust-indicator{display:flex;align-items:center;gap:10px;font-size:14px;font-weight:600;opacity:.8}
#wp-ai-demo-cta .cta-storytelling-engine{position:relative;height:600px;display:flex;justify-content:center;align-items:center;perspective:1000px}
#wp-ai-demo-cta .expert-visual{position:relative;width:280px;height:280px;z-index:5;transition:all .5s}
#wp-ai-demo-cta .expert-visual img{width:100%;height:100%;object-fit:cover;border-radius:50%;border:8px solid #fff;box-shadow:0 30px 60px rgba(25,51,93,.15)}
#wp-ai-demo-cta .workflow-svg-layer{position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:2}
#wp-ai-demo-cta .connection-path{fill:none;stroke:#DE6E30;stroke-width:3;stroke-dasharray:10,10;opacity:0;transition:opacity .5s ease}
#wp-ai-demo-cta .story-node{position:absolute;background:rgba(255,255,255,.98);backdrop-filter:blur(15px);border-radius:16px;padding:14px 18px;box-shadow:0 20px 40px rgba(25,51,93,.08);display:flex;align-items:center;gap:15px;z-index:10;width:250px;opacity:.3;transform:scale(.85);transition:all .5s cubic-bezier(.23,1,.32,1);border:1px solid rgba(25,51,93,.05);cursor:pointer}
#wp-ai-demo-cta .story-node.active{opacity:1;transform:scale(1.08)!important;border-color:#DE6E30;box-shadow:0 25px 50px rgba(222,110,48,.18);z-index:100}
#wp-ai-demo-cta .node-icon{width:40px;height:40px;background:#19335D;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0;transition:all .5s;font-family:'Poppins',sans-serif;font-weight:700}
#wp-ai-demo-cta .story-node.active .node-icon{background:#DE6E30;transform:rotateY(360deg)}
#wp-ai-demo-cta .node-content h4{margin:0;font-size:14px;font-weight:700;font-family:'Poppins',sans-serif;color:#19335D}
#wp-ai-demo-cta .node-content p{margin:2px 0 0;font-size:11px;opacity:.7;color:#19335D}
#wp-ai-demo-cta .node-1{top:2%;left:50%;transform:translateX(-50%)}
#wp-ai-demo-cta .node-2{top:20%;right:-5%}
#wp-ai-demo-cta .node-3{bottom:20%;right:-5%}
#wp-ai-demo-cta .node-4{bottom:2%;left:50%;transform:translateX(-50%)}
#wp-ai-demo-cta .node-5{bottom:20%;left:-5%}
#wp-ai-demo-cta .node-6{top:20%;left:-5%}
@keyframes ctab-dash{to{stroke-dashoffset:-100}}
#wp-ai-demo-cta .active-path{opacity:.7!important;animation:ctab-dash 4s linear infinite}
#wp-ai-demo-cta #workflow-pulse{fill:#DE6E30;opacity:0;transition:opacity .3s}
@media(max-width:1100px){#wp-ai-demo-cta .cta-max-width{grid-template-columns:1fr;gap:80px}#wp-ai-demo-cta .cta-content-main{text-align:center}#wp-ai-demo-cta .btn-premium{margin:0 auto}#wp-ai-demo-cta .trust-indicator{justify-content:center}#wp-ai-demo-cta .cta-storytelling-engine{height:600px;transform:scale(.85)}}
@media(max-width:600px){#wp-ai-demo-cta{padding:40px 15px}#wp-ai-demo-cta .cta-storytelling-engine{transform:scale(.7);height:550px}#wp-ai-demo-cta .story-node{width:210px}#wp-ai-demo-cta .node-2,#wp-ai-demo-cta .node-3{right:-15%}#wp-ai-demo-cta .node-5,#wp-ai-demo-cta .node-6{left:-15%}}
</style>
<section id="wp-ai-demo-cta">
  <div class="cta-max-width">
    <div class="cta-content-main">
      <h2 class="cta-headline"><?php ee_h('ctab_h2','Ready to Move to an AI-Powered Admission CRM and Marketing Solution?'); ?></h2>
      <p class="cta-subheadline"><?php ee_h('ctab_subheadline','Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.'); ?></p>
      <div class="cta-action-area">
        <a href="<?php ee_u('ctab_cta_url','https://www.extraaedge.com/'); ?>" class="btn-premium"><?php ee_h('ctab_cta_text','Book a Demo'); ?></a>
        <div class="trust-indicator">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
          <?php ee_h('ctab_trust','Trusted by 250+ Premier Institutions Globally'); ?>
        </div>
      </div>
    </div>
    <div class="cta-storytelling-engine" id="cta-engine">
      <svg class="workflow-svg-layer" viewBox="0 0 500 500"><path id="flow-line" class="connection-path" d=""/><circle id="workflow-pulse" r="6"/></svg>
      <div class="expert-visual"><img src="<?php ee_u('ctab_expert_img','https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp'); ?>" alt="Admission Expert" loading="lazy"></div>
      <div class="story-node node-1"><div class="node-icon">1</div><div class="node-content"><h4>Inquiry Received</h4><p>Omnichannel lead capture</p></div></div>
      <div class="story-node node-2"><div class="node-icon">2</div><div class="node-content"><h4>AI Response</h4><p>Instant personalized reply</p></div></div>
      <div class="story-node node-3"><div class="node-icon">3</div><div class="node-content"><h4>Lead Scoring</h4><p>Predictive intent analysis</p></div></div>
      <div class="story-node node-4"><div class="node-icon">4</div><div class="node-content"><h4>Auto Nurture</h4><p>Behavioral drip marketing</p></div></div>
      <div class="story-node node-5"><div class="node-icon">5</div><div class="node-content"><h4>Counselor Alert</h4><p>High-priority task created</p></div></div>
      <div class="story-node node-6"><div class="node-icon">6</div><div class="node-content"><h4>Admission Won</h4><p>Target achieved successfully</p></div></div>
    </div>
  </div>
</section>
<script>
(function(){
  const engine=document.getElementById('cta-engine');if(!engine)return;
  const nodes=engine.querySelectorAll('.story-node'),flowLine=document.getElementById('flow-line'),pulse=document.getElementById('workflow-pulse');
  let idx=0,iv,active=false;
  function center(el){const r=el.getBoundingClientRect(),p=engine.getBoundingClientRect();return{x:(r.left+r.width/2)-p.left,y:(r.top+r.height/2)-p.top}}
  function cycle(){nodes.forEach(n=>n.classList.remove('active'));const a=nodes[idx];a.classList.add('active');const s={x:250,y:300},e=center(a);flowLine.setAttribute('d',`M${s.x},${s.y} L${e.x},${e.y}`);flowLine.classList.add('active-path');pulse.style.opacity='1';pulse.setAttribute('cx',e.x);pulse.setAttribute('cy',e.y);idx=(idx+1)%nodes.length}
  function activate(){if(active)return;active=true;cycle();iv=setInterval(cycle,3000)}
  engine.addEventListener('mouseenter',activate);
  new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)activate()}),{threshold:.4}).observe(engine);
  nodes.forEach((n,i)=>n.addEventListener('click',()=>{idx=i;clearInterval(iv);cycle();iv=setInterval(cycle,4000)}));
})();
</script>

<?php get_footer(); ?>
