<?php
/**
 * front-page.php — Home page template
 * EXACT design preserved from approved HTML (zero changes to CSS/JS/animations)
 * Only <head>, <nav>, mobile menu, and footer skipped — inherited from header.php/footer.php
 * Editable content via: WP Admin → Settings → 🏠 Home Page Editor
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

// ── Safety net: inline helpers in case inc/home-editor.php is missing ──
// Behaviour: $default is intentionally IGNORED. Empty field = empty output.
if (!function_exists('ee_h')) {
    function ee_h($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) ? $opts[$key] : '';
        echo esc_html($val);
    }
}
if (!function_exists('ee_u')) {
    function ee_u($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) ? $opts[$key] : '';
        echo esc_url($val);
    }
}
if (!function_exists('ee_a')) {
    function ee_a($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) ? $opts[$key] : '';
        echo esc_attr($val);
    }
}
if (!function_exists('ee_raw')) {
    function ee_raw($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        return isset($opts[$key]) ? $opts[$key] : '';
    }
}

get_header();
?>

<!-- ─── Global libs needed by sections (Alpine + extra fonts only — Tailwind & Lucide already loaded by header.php) ─── -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    if (window.tailwind) {
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brandOrange: '#DE6E30',
                        brandBlue: '#19335D',
                        primary: '#19335D',
                        accent: '#DE6E30',
                    },
                }
            }
        };
    }
</script>

<style>
    /* === Original first <style> block (hero + utilities) — preserved exactly === */
    .home-page-root {
        font-family: 'Open Sans', sans-serif;
        color: #19335D;
        /* overflow-x: clip prevents horizontal scrollbars without breaking position:sticky descendants */
        overflow-x: clip;
        scroll-behavior: smooth;
    }
    .poppins { font-family: 'Poppins', sans-serif; }
    /* --- Scroll Progress Bar --- */
    #scroll-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, #DE6E30, #ff9d6c);
        z-index: 9999;
    }
    /* --- Reveal Animation --- */
    .reveal { opacity: 0; transform: translateY(20px); transition: all 0.6s ease-out; }
    .reveal.active { opacity: 1; transform: translateY(0); }
    /* --- Magnetic Button --- */
    .magnetic-btn {
        background: #DE6E30;
        color: white;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }
    .magnetic-btn:hover {
        box-shadow: 0 8px 24px rgba(222, 110, 48, 0.4);
    }

    /* ========== AI ADMISSION CRM HERO STYLES ========== */
    .crm-hero {
      --primary-accent: #DE6E30;
      --secondary-base: #19335D;
      --white: #ffffff;
      --text-main: #19335D;
      --text-muted: rgba(25, 51, 93, 0.7);
      --glass-bg: rgba(255, 255, 255, 0.9);
      --glass-border: rgba(25, 51, 93, 0.12);
      --gradient-soft: linear-gradient(160deg, #ffffff 0%, #f0f4f8 100%);
      position: relative;
      width: 100%;
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: space-evenly;
      background: var(--gradient-soft);
      font-family: 'Open Sans', sans-serif;
      color: var(--text-main);
      overflow: hidden;
      padding: 20px 5%;
      box-sizing: border-box;
      margin-top: 15px;
    }
    .crm-hero * { box-sizing: border-box; }
    .crm-hero__bg-orb {
      position: absolute;
      width: 800px;
      height: 800px;
      background: radial-gradient(circle, rgba(222, 110, 48, 0.05) 0%, rgba(255,255,255,0) 70%);
      top: -300px;
      right: -200px;
      z-index: 1;
      pointer-events: none;
    }
    .crm-hero__container {
      max-width: 1300px;
      width: 100%;
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 60px;
      align-items: center;
      z-index: 5;
    }
    .crm-hero__content {
      display: flex;
      flex-direction: column;
      gap: 24px;
    }
    .crm-hero__badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: var(--white);
      border: 1px solid var(--glass-border);
      padding: 10px 20px;
      border-radius: 50px;
      font-size: 14px;
      font-weight: 600;
      color: var(--secondary-base);
      width: fit-content;
      box-shadow: 0 4px 15px rgba(25, 51, 93, 0.05);
      animation: fadeInDown 0.8s ease-out;
    }
    .crm-hero__badge-icon {
      color: var(--primary-accent);
      display: flex;
      align-items: center;
    }
    .crm-hero__headline {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(44px, 5.5vw, 72px);
      line-height: 1.05;
      font-weight: 800;
      margin: 0;
      color: var(--secondary-base);
      letter-spacing: -1.5px;
    }
    .crm-hero__headline span {
      color: var(--primary-accent);
      display: block;
    }
    .crm-hero__supporting {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(18px, 2.2vw, 24px);
      font-weight: 600;
      margin: 0;
      color: var(--secondary-base);
      line-height: 1.3;
    }
    .crm-hero__subtext {
      font-size: 18px;
      line-height: 1.8;
      color: var(--text-muted);
      max-width: 600px;
      margin: 0;
    }
    .crm-hero__actions {
      display: flex;
      flex-direction: column;
      gap: 14px;
      margin-top: 15px;
    }
    .crm-hero__cta-wrapper {
      display: flex;
      align-items: center;
      gap: 25px;
      flex-wrap: wrap;
    }
    .crm-hero__cta {
      background: var(--primary-accent);
      color: var(--white);
      text-decoration: none;
      padding: 22px 54px;
      border-radius: 16px;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 19px;
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      box-shadow: 0 12px 30px rgba(222, 110, 48, 0.35);
      text-align: center;
      border: 2px solid transparent;
    }
    .crm-hero__cta:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 45px rgba(222, 110, 48, 0.45);
      background: #c55a25;
    }
    .crm-hero__live-stats {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .crm-hero__status-dot {
      width: 10px;
      height: 10px;
      background: #10b981;
      border-radius: 50%;
      box-shadow: 0 0 10px #10b981;
      animation: pulse-green 2s infinite;
    }
    .crm-hero__stat-text {
      font-weight: 700;
      font-size: 15px;
      color: var(--secondary-base);
    }
    .crm-hero__visual {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 30px;
      padding: 20px;
      min-height: 500px;
      justify-content: center;
    }
    .flow-card {
      background: #fff;
      border: 1px solid rgba(25, 51, 93, 0.12);
      border-radius: 24px;
      padding: 25px;
      box-shadow: 0 25px 50px rgba(25, 51, 93, 0.08);
      width: 100%;
      max-width: 420px;
      position: relative;
      transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
      z-index: 2;
      opacity: 0;
      transform: translateY(20px);
      display: flex;
      flex-direction: column;
    }
    .flow-card.is-visible {
      opacity: 1;
      transform: translateY(0);
    }
    .ai-node-main {
      width: 160px;
      height: 160px;
      background: #19335D;
      border-radius: 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      z-index: 10;
      color: #fff;
      box-shadow: 0 0 60px rgba(25, 51, 93, 0.25);
      transition: all 0.5s ease;
    }
    .ai-node-main.is-active {
      animation: ai-breathing 3s infinite ease-in-out;
    }
    .ai-scanner {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 2px solid #DE6E30;
      border-radius: 50%;
      opacity: 0;
      transform: scale(0.8);
    }
    .ai-node-main.is-active .ai-scanner {
      animation: scan-pulse 2s infinite ease-out;
    }
    .crm-hero .chat-msg {
      font-size: 14px;
      padding: 12px 18px;
      border-radius: 16px;
      margin-bottom: 12px;
      background: #f1f5f9;
      color: #19335D;
      display: inline-block;
      max-width: 85%;
      line-height: 1.5;
    }
    .crm-hero .msg-user {
      align-self: flex-start;
      border-bottom-left-radius: 4px;
    }
    .crm-hero .msg-ai {
      align-self: flex-end;
      background: rgba(222, 110, 48, 0.12);
      color: #DE6E30;
      font-weight: 600;
      border-bottom-right-radius: 4px;
      text-align: right;
    }
    .crm-hero .status-tag {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 10px;
      text-transform: uppercase;
      font-weight: 800;
      letter-spacing: 1.2px;
      padding: 5px 12px;
      border-radius: 6px;
      background: #f1f5f9;
      margin-bottom: 10px;
      width: fit-content;
    }
    .crm-hero .status-tag--hot { background: #fee2e2; color: #ef4444; }
    .crm-hero .status-tag--success { background: #dcfce7; color: #10b981; }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes ai-breathing {
      0%, 100% { transform: scale(1); box-shadow: 0 0 30px rgba(222, 110, 48, 0.15); }
      50% { transform: scale(1.1); box-shadow: 0 0 70px rgba(222, 110, 48, 0.4); }
    }
    @keyframes scan-pulse {
      0% { transform: scale(0.9); opacity: 0.8; }
      100% { transform: scale(1.4); opacity: 0; }
    }
    @keyframes pulse-green {
      0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
      70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
      100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
    @media (max-width: 1024px) {
      .crm-hero__container {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 60px;
      }
      .crm-hero__content { align-items: center; }
      .crm-hero__subtext { max-width: 100%; }
      .crm-hero__visual { min-height: 400px; padding: 40px 0; }
      .flow-card { margin: 0 auto; }
    }
    @media (max-width: 768px) {
      .crm-hero { padding: 60px 24px; }
      .crm-hero__headline { font-size: 42px; }
      .crm-hero__supporting { font-size: 18px; }
      .crm-hero__cta { width: 100%; padding: 20px 30px; }
      .crm-hero__cta-wrapper { justify-content: center; width: 100%; }
      .ai-node-main { width: 130px; height: 130px; }
    }
</style>

<div id="scroll-progress"></div>

<!-- ======================== AI ADMISSION CRM HERO ======================== -->
<section class="crm-hero" aria-labelledby="hero-heading">
  <div class="crm-hero__bg-orb"></div>
  <div class="crm-hero__container">
    <div class="crm-hero__content">
      <!-- Trust Signal -->
      <div class="crm-hero__badge">
        <span class="crm-hero__badge-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </span>
        <?php ee_h('hero_badge', 'Loved by Leading Top 500+ Admission Teams'); ?>
      </div>

      <!-- Headlines -->
      <h1 class="crm-hero__headline" id="hero-heading">
        <?php ee_h('hero_h1_part1', 'Convert More Students.'); ?> <span><?php ee_h('hero_h1_part2', 'Automatically.'); ?></span>
      </h1>

      <p class="crm-hero__supporting">
        <?php ee_h('hero_supporting', 'Introducing our AI-Powered Admission CRM Built for Modern Education Teams'); ?>
      </p>

      <p class="crm-hero__subtext">
        <?php ee_h('hero_subtext', 'Co-pilots, agents, and intelligence that prioritise leads, guide counsellors, personalise engagement, and convert students faster.'); ?>
      </p>
      <!-- CTA Elements -->
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
    <!-- Live AI Simulation Visualization -->
    <div class="crm-hero__visual" aria-hidden="true">
      <!-- Inbound Card (User Inquiry) -->
      <div class="flow-card" id="card-inbound">
        <div class="status-tag">Inbound Message</div>
        <div class="chat-msg msg-user" id="text-inbound"></div>
      </div>
      <!-- AI Processor Node -->
      <div class="ai-node-main" id="ai-processor">
        <div class="ai-scanner"></div>
        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:8px;"><path d="M12 2a10 10 0 1 0 10 10H12V2z"></path><path d="M12 12L2.1 12"></path><path d="M12 12L12 22.1"></path><path d="M12 12l7.07-7.07"></path></svg>
        <span style="font-size: 13px; font-weight: 800; font-family: 'Poppins'; letter-spacing: 1px;">AI CORE</span>
        <span id="ai-status-label" style="font-size: 9px; opacity: 0.8; margin-top:4px;">IDLE</span>
      </div>
      <!-- Outcome Card (AI Reply) -->
      <div class="flow-card" id="card-outcome">
        <div class="status-tag" style="align-self: flex-end;">AI Response</div>
        <div class="chat-msg msg-ai" id="text-outcome"></div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 5px;">
          <span class="status-tag status-tag--hot">Qualified Lead</span>
          <span class="status-tag status-tag--success" style="font-weight:800;">Admitted 🎉</span>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    // Scroll Progress
    window.onscroll = () => {
        const sp = document.getElementById("scroll-progress");
        if (sp) sp.style.width = ((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100) + "%";
    };
    // Reveal on scroll
    const obs = new IntersectionObserver((es) => es.forEach(e => e.isIntersecting && e.target.classList.add('active')));
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
    // Magnetic Buttons
    document.querySelectorAll('.magnetic-btn').forEach(b => {
        b.onmousemove = (e) => {
            const r = b.getBoundingClientRect();
            b.style.transform = `translate(${(e.clientX - r.left - r.width / 2) * 0.2}px, ${(e.clientY - r.top - r.height / 2) * 0.2}px)`;
        };
        b.onmouseleave = () => b.style.transform = '';
    });
    // Lucide Icons
    if (window.lucide) lucide.createIcons();

    // ========== AI HERO SIMULATION ==========
    (function(){
      const scenarios = [
        {
          in: "I want to apply for the Computer Science MBA. What's the deadline?",
          out: "Hi! Deadline is Oct 15th. I've analyzed your profile—you qualify for our fast-track scholarship! Book a call?",
          status: "ANALYZING INTENT"
        },
        {
          in: "Do you offer financial aid for international students from Asia?",
          out: "Yes! We have 3 specific grants for your region. I've sent the brochures to your email and notified a counselor.",
          status: "OPTIMIZING ENGAGEMENT"
        },
        {
          in: "I'm looking for a part-time Masters program that starts in January.",
          out: "Perfect. We have 2 hybrid spots left. I've prioritized your application for immediate review.",
          status: "PRIORITIZING LEAD"
        }
      ];
      let currentScenario = 0;
      const inboundCard = document.getElementById('card-inbound');
      const outcomeCard = document.getElementById('card-outcome');
      const aiNode = document.getElementById('ai-processor');
      const aiLabel = document.getElementById('ai-status-label');
      const inText = document.getElementById('text-inbound');
      const outText = document.getElementById('text-outcome');
      if (!inboundCard) return;
      async function typeText(element, text, speed = 40) {
        element.innerHTML = "";
        for(let i=0; i<text.length; i++) {
          element.innerHTML += text.charAt(i);
          await new Promise(r => setTimeout(r, speed));
        }
      }
      async function startSimulation() {
        const s = scenarios[currentScenario];
        inboundCard.classList.remove('is-visible');
        outcomeCard.classList.remove('is-visible');
        aiNode.classList.remove('is-active');
        aiLabel.innerText = "WAITING";
        await new Promise(r => setTimeout(r, 1000));
        inboundCard.classList.add('is-visible');
        await typeText(inText, s.in);
        await new Promise(r => setTimeout(r, 800));
        aiNode.classList.add('is-active');
        aiLabel.innerText = s.status;
        await new Promise(r => setTimeout(r, 2000));
        outcomeCard.classList.add('is-visible');
        await typeText(outText, s.out, 30);
        currentScenario = (currentScenario + 1) % scenarios.length;
        setTimeout(startSimulation, 5000);
      }
      const updateCounter = () => {
        const counterEl = document.getElementById('live-counter');
        if(!counterEl) return;
        let val = parseInt(counterEl.innerText);
        if(Math.random() > 0.6) counterEl.innerText = val + 1;
        setTimeout(updateCounter, 7000);
      };
      window.addEventListener('DOMContentLoaded', () => {
        startSimulation();
        updateCounter();
      });
    })();
</script>

<!-- Logo Section -->
<style>
    .sp-section {
      --primary-blue: #19335D;
      --accent-orange: #DE6E30;
      --bg-white: #FFFFFF;
      --text-gray: #4B5563;
      --font-heading: 'Poppins', sans-serif;
      --font-body: 'Open Sans', sans-serif;
      padding: 15px 20px;
      position: relative;
      overflow: hidden;
      background-color: var(--bg-white);
      font-family: var(--font-body);
    }

    .sp-container {
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }

    .sp-header {
      margin-bottom: 40px;
    }

    .sp-badge-modern {
      display: inline-block;
      background-color: rgba(222, 110, 48, 0.1);
      color: var(--accent-orange);
      padding: 6px 16px;
      border-radius: 100px;
      font-size: 0.875rem;
      font-weight: 600;
      margin-bottom: 15px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .sp-heading {
      font-family: var(--font-heading);
      color: var(--primary-blue);
      font-size: 2.5rem;
      line-height: 1.2;
      margin: 0 auto 15px;
      max-width: 800px;
    }

    .sp-subheading {
      color: var(--text-gray);
      font-size: 1.125rem;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Marquee Styles */
    .sp-marquee-container {
      position: relative;
      padding: 20px 0;
    }

    .sp-marquee-container::before,
    .sp-marquee-container::after {
      content: "";
      position: absolute;
      top: 0;
      width: 150px;
      height: 100%;
      z-index: 2;
      pointer-events: none;
    }

    .sp-marquee-container::before {
      left: 0;
      background: linear-gradient(to right, #FFFFFF, transparent);
    }

    .sp-marquee-container::after {
      right: 0;
      background: linear-gradient(to left, #FFFFFF, transparent);
    }

    .sp-marquee-track {
      display: flex;
      gap: 30px;
      padding-bottom: 20px;
      width: max-content;
    }

    .sp-track-1 {
      animation: scrollLeft 40s linear infinite;
    }

    .sp-track-2 {
      animation: scrollRight 40s linear infinite;
    }

    .sp-logo-card {
      width: 200px;
      height: 100px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      transition: transform 0.3s ease, border-color 0.3s ease;
      flex-shrink: 0;
    }

    .sp-logo-card:hover {
      border-color: #DE6E30;
      transform: translateY(-5px);
    }

    /* Hide alt-text fallback rendering when an image fails — paired with
       the onerror handler that removes the whole card. font-size:0 keeps
       the alt text invisible in the brief window before JS fires. */
    .sp-logo-card img { font-size: 0; color: transparent; }

    .sp-img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      filter: grayscale(100%);
      opacity: 0.7;
      transition: all 0.3s ease;
    }

    .sp-logo-card:hover .sp-img {
      filter: grayscale(0%);
      opacity: 1;
    }

    @keyframes scrollLeft {
      0% { transform: translateX(0); }
      100% { transform: translateX(calc(-50% - 15px)); }
    }

    @keyframes scrollRight {
      0% { transform: translateX(calc(-50% - 15px)); }
      100% { transform: translateX(0); }
    }

    /* Footer Styles */
    .sp-footer {
      margin-top: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
    }

    .sp-cta-btn {
      background-color: #DE6E30;
      color: white;
      text-decoration: none;
      padding: 14px 28px;
      border-radius: 8px;
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
      transition: background-color 0.3s ease, transform 0.2s ease;
      box-shadow: 0 4px 14px rgba(222, 110, 48, 0.3);
    }

    .sp-cta-btn:hover {
      background-color: #c55d28;
      transform: scale(1.05);
    }

    .sp-live-indicator {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.85rem;
      color: #19335D;
      font-weight: 600;
    }

    .sp-pulse-dot {
      width: 8px;
      height: 8px;
      background-color: #10b981;
      border-radius: 50%;
      position: relative;
    }

    .sp-pulse-dot::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #10b981;
      border-radius: 50%;
      animation: sp-pulse 2s infinite;
    }

    @keyframes sp-pulse {
      0% { transform: scale(1); opacity: 0.8; }
      100% { transform: scale(3); opacity: 0; }
    }

    @media (max-width: 768px) {
      .sp-heading { font-size: 1.6rem; }
      .sp-logo-card { width: 150px; height: 80px; }
      .sp-section { padding: 15px 15px; }
    }
</style>

<section class="sp-section">
  <div class="sp-container">
    <!-- Header Section -->
    <header class="sp-header">
      <div class="sp-badge-modern"><?php ee_h('logos_badge', 'Leading Institutions'); ?></div>
      <h2 id="sp-heading" class="sp-heading"><?php ee_h('logos_heading', 'Trusted by 500+ Institutions Growing Faster Than Ever'); ?></h2>
      <p class="sp-subheading"><?php ee_h('logos_subheading', 'AI-powered automation for the next generation of education leaders.'); ?></p>
    </header>

    <!-- Logo Marquee Section -->
    <div class="sp-marquee-container">
      <?php
      $t1 = array(
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/Xiss-3.webp', 'XISS'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/OIP-20.jpg', 'Logo'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/10/Anant-National-University.png', 'Anant'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/sr-university.webp', 'SR University'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/hamstek-1.webp', 'Hamstek'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/adani.webp', 'Adani'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/techno-india-group.webp', 'Techno India'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/10/cropped-final-logo.webp', 'Final Logo'),
      );
      $t2 = array(
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/JGI-JAIN-2.webp', 'Jain University'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/01/mit-shillong.png', 'MIT Shillong'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/isdi.webp', 'ISDI'),
        array('https://www.extraaedge.com/wp-content/uploads/2025/09/jio-v3-3.png', 'Jio'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/dpu-3.webp', 'DPU'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/Graphic-Era-3.webp', 'Graphic Era'),
        array('https://www.extraaedge.com/wp-content/uploads/2024/12/fostima.webp', 'Fostima'),
      );
      ?>
      <?php
      /* Build clean lists first — skip any slot whose URL the editor cleared
         in the home editor so empty cards do not render. */
      $row_t1 = array();
      for ($i = 1; $i <= 8; $i++) {
          $u = trim((string) ee_raw("logo_t1_{$i}_url"));
          if ($u === '') continue;
          $row_t1[] = array('u' => $u, 'a' => ee_raw("logo_t1_{$i}_alt"));
      }
      $row_t2 = array();
      for ($i = 1; $i <= 7; $i++) {
          $u = trim((string) ee_raw("logo_t2_{$i}_url"));
          if ($u === '') continue;
          $row_t2[] = array('u' => $u, 'a' => ee_raw("logo_t2_{$i}_alt"));
      }
      ?>
      <!-- Track 1: Moving Left -->
      <?php if (!empty($row_t1)): ?>
      <div class="sp-marquee-track sp-track-1">
        <?php /* render twice for a seamless loop */
        for ($pass = 0; $pass < 2; $pass++):
          foreach ($row_t1 as $logo): ?>
        <div class="sp-logo-card"><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" class="sp-img" onerror="this.closest('.sp-logo-card').remove()"></div>
        <?php endforeach;
        endfor; ?>
      </div>
      <?php endif; ?>

      <!-- Track 2: Moving Right -->
      <?php if (!empty($row_t2)): ?>
      <div class="sp-marquee-track sp-track-2">
        <?php for ($pass = 0; $pass < 2; $pass++):
          foreach ($row_t2 as $logo): ?>
        <div class="sp-logo-card"><img src="<?php echo esc_url($logo['u']); ?>" alt="<?php echo esc_attr($logo['a']); ?>" class="sp-img" onerror="this.closest('.sp-logo-card').remove()"></div>
        <?php endforeach;
        endfor; ?>
      </div>
      <?php endif; ?>
    </div>

    <script>
    /* Safety net: catch images that already failed before the inline onerror
       attached (e.g. cached HTML, page-loaders that defer JS). Removes their
       card and hides the parent track if the row ends up empty. */
    (function(){
        function cleanupBroken() {
            document.querySelectorAll('.sp-logo-card img').forEach(function(img){
                if (!img.complete || img.naturalWidth === 0) {
                    var card = img.closest('.sp-logo-card');
                    if (card) card.remove();
                }
            });
            document.querySelectorAll('.sp-marquee-track').forEach(function(t){
                if (!t.querySelector('.sp-logo-card')) t.style.display = 'none';
            });
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', cleanupBroken);
        } else {
            cleanupBroken();
        }
        window.addEventListener('load', cleanupBroken);
    })();
    </script>

    <!-- Footer Action Section -->
    <footer class="sp-footer">
      <a href="<?php ee_u('logos_cta_url', '#get-started'); ?>" class="sp-cta-btn"><?php ee_h('logos_cta_text', 'Start Converting Today'); ?></a>
      <div class="sp-live-indicator">
        <span class="sp-pulse-dot"></span>
        <span><?php ee_h('logos_live_text', 'Live: +124 Admissions Processed in last 1hr'); ?></span>
      </div>
    </footer>
  </div>
</section>

<!-- VidyaAI Admission Intelligence Section -->
<style>
    .vidya-wrap {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #FFFFFF;
        color: #19335D;
        scroll-behavior: smooth;
        /* NOTE: overflow-x must NOT be hidden here — it breaks position:sticky on .visual-viewport */
        overflow-x: clip;
    }

    /* Scroll Interaction Classes */
    .vidya-wrap .story-section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        opacity: 0.1;
        transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
        transform: translateY(40px);
        padding: 4rem 0;
    }

    .vidya-wrap .story-section.active {
        opacity: 1;
        transform: translateY(0);
    }

    .vidya-wrap .visual-viewport {
        position: sticky;
        /* Sticky header is h-20 (80px) on mobile, h-24 (96px) on desktop — match the offset to avoid the CRM mock disappearing behind the nav */
        top: 80px;
        height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        perspective: 2000px;
    }
    @media (min-width: 768px) {
        .vidya-wrap .visual-viewport {
            top: 96px;
            height: calc(100vh - 96px);
        }
    }

    /* Real CRM Mockup Styling */
    .vidya-wrap .crm-interface {
        width: 100%;
        height: 85vh;
        max-height: 700px;
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 50px 100px -20px rgba(25, 51, 93, 0.15);
        border: 1px solid rgba(25, 51, 93, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    }

    /* CRM Components */
    .vidya-wrap .crm-sidebar {
        width: 64px;
        background: #0F172A;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        gap: 24px;
    }

    .vidya-wrap .sidebar-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: rgba(255,255,255,0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.4);
        cursor: pointer;
        transition: 0.3s;
    }

    .vidya-wrap .sidebar-icon.active {
        background: #DE6E30;
        color: white;
    }

    .vidya-wrap .crm-main {
        flex: 1;
        background: #F1F5F9;
        padding: 24px;
        overflow-y: auto;
        position: relative;
    }

    /* AI Voice Wave */
    .vidya-wrap .wave-bar {
        width: 3px;
        background: #DE6E30;
        border-radius: 10px;
        animation: wave-play 0.8s infinite ease-in-out;
    }
    @keyframes wave-play {
        0%, 100% { height: 10px; }
        50% { height: 40px; }
    }

    /* Mobile Responsive */
    @media (max-width: 1024px) {
        .vidya-wrap .main-grid { display: block; }
        .vidya-wrap .visual-viewport { position: relative; height: auto; padding: 2rem 0; }
        .vidya-wrap .story-section { min-height: auto; opacity: 1; transform: none; padding: 3rem 0; }
        .vidya-wrap .crm-interface { height: 500px; }
    }

    .vidya-wrap .text-gradient {
        background: linear-gradient(135deg, #19335D 0%, #DE6E30 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .vidya-wrap .lead-card {
        background: white;
        border-radius: 16px;
        padding: 16px;
        border: 1px solid rgba(0,0,0,0.05);
        margin-bottom: 12px;
        transition: 0.3s;
    }

    .vidya-wrap .status-pill {
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        padding: 2px 8px;
        border-radius: 99px;
    }
</style>

<div class="vidya-wrap antialiased">
    <div class="max-w-[1440px] mx-auto px-6 lg:grid lg:grid-cols-2 gap-12 main-grid">

        <!-- Left: Intelligence Storytelling -->
        <div class="relative z-10">

            <!-- Hero Content -->
            <section id="vidya-hero" class="story-section active" data-stage="hero">
                <div class="mb-6 inline-flex items-center gap-2 px-3 py-1 bg-blue-50 rounded-lg">
                    <div class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></div>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest"><?php ee_h('vidya_badge', 'VidyaAI Admission Intelligence'); ?></span>
                </div>
                <h2 class="text-5xl lg:text-7xl font-extrabold leading-[1.1] mb-8">
                    <?php ee_h('vidya_h1_part1', 'Powerful Admission CRM'); ?> <br><span class="text-gradient"><?php ee_h('vidya_h1_part2', 'with simplicity.'); ?></span>
                </h2>
                <p class="text-xl text-slate-500 mb-10 leading-relaxed max-w-lg">
                    <?php ee_h('vidya_subtitle', 'A next-gen platform designed to convert inquiries into enrollments using autonomous intelligence and streamlined counselor workflows.'); ?>
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php ee_u('vidya_cta1_url', '#demo'); ?>" class="bg-slate-900 text-white px-8 py-4 rounded-xl font-bold hover:shadow-xl transition-all"><?php ee_h('vidya_cta1_text', 'Book Private Demo'); ?></a>
                    <a href="<?php ee_u('vidya_cta2_url', '#platform'); ?>" class="bg-white border border-slate-200 text-slate-600 px-8 py-4 rounded-xl font-bold hover:bg-slate-50 transition-all"><?php ee_h('vidya_cta2_text', 'Explore Platform'); ?></a>
                </div>
            </section>

            <!-- 1. AI Admission Assist -->
            <section id="vidya-assist" class="story-section" data-stage="assist">
                <div class="mb-4 text-blue-600 font-bold tracking-tighter text-2xl"><?php ee_h('vidya_s1_num'); ?></div>
                <h2 class="text-4xl font-bold mb-6"><?php ee_h('vidya_s1_title'); ?></h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    <?php ee_h('vidya_s1_desc'); ?>
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <div class="text-blue-900 font-bold text-sm mb-1"><?php ee_h('vidya_s1_box1_title'); ?></div>
                        <div class="text-xs text-slate-500 leading-snug"><?php ee_h('vidya_s1_box1_desc'); ?></div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <div class="text-blue-900 font-bold text-sm mb-1"><?php ee_h('vidya_s1_box2_title'); ?></div>
                        <div class="text-xs text-slate-500 leading-snug"><?php ee_h('vidya_s1_box2_desc'); ?></div>
                    </div>
                </div>
            </section>

            <!-- 2. AI Lead Intent Scoring -->
            <section id="vidya-scoring" class="story-section" data-stage="scoring">
                <div class="mb-4 text-orange-600 font-bold tracking-tighter text-2xl"><?php ee_h('vidya_s2_num'); ?></div>
                <h2 class="text-4xl font-bold mb-6"><?php ee_h('vidya_s2_title'); ?></h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    <?php ee_h('vidya_s2_desc'); ?>
                </p>
                <div class="bg-[#19335D] text-white p-6 rounded-3xl">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xs opacity-60 uppercase font-bold tracking-widest"><?php ee_h('vidya_s2_lift_label'); ?></span>
                        <span class="text-orange-400 font-bold"><?php ee_h('vidya_s2_lift_value'); ?></span>
                    </div>
                    <p class="text-sm"><?php ee_h('vidya_s2_lift_body'); ?></p>
                </div>
            </section>

            <!-- 3. Smart Follow-up Intelligence -->
            <section id="vidya-followup" class="story-section" data-stage="followup">
                <div class="mb-4 text-indigo-600 font-bold tracking-tighter text-2xl"><?php ee_h('vidya_s3_num'); ?></div>
                <h2 class="text-4xl font-bold mb-6"><?php ee_h('vidya_s3_title'); ?></h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    <?php ee_h('vidya_s3_desc'); ?>
                </p>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 border border-slate-100 rounded-2xl">
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                        <span class="text-sm font-semibold text-slate-700"><?php ee_h('vidya_s3_li1'); ?></span>
                    </div>
                    <div class="flex items-center gap-4 p-4 border border-slate-100 rounded-2xl">
                        <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                        <span class="text-sm font-semibold text-slate-700"><?php ee_h('vidya_s3_li2'); ?></span>
                    </div>
                </div>
            </section>

            <!-- 4. AI Calling for Qualification & Scale -->
            <section id="vidya-calling" class="story-section" data-stage="calling">
                <div class="mb-4 text-red-600 font-bold tracking-tighter text-2xl"><?php ee_h('vidya_s4_num'); ?></div>
                <h2 class="text-4xl font-bold mb-6"><?php ee_h('vidya_s4_title'); ?></h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    <?php ee_h('vidya_s4_desc'); ?>
                </p>
            </section>

            <!-- 5. Counselor Performance Intelligence -->
            <section id="vidya-performance" class="story-section" data-stage="performance">
                <div class="mb-4 text-green-600 font-bold tracking-tighter text-2xl"><?php ee_h('vidya_s5_num'); ?></div>
                <h2 class="text-4xl font-bold mb-6"><?php ee_h('vidya_s5_title'); ?></h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-12">
                    <?php ee_h('vidya_s5_desc'); ?>
                </p>
                <a href="<?php ee_u('vidya_cta1_url'); ?>" class="block text-center bg-[#DE6E30] text-white w-full py-5 rounded-2xl font-bold text-lg hover:scale-[1.02] transition-transform"><?php ee_h('vidya_final_cta'); ?></a>
            </section>
        </div>

        <!-- Right: Real CRM Simulation -->
        <div class="visual-viewport">
            <div class="crm-interface" id="crmWindow">
                <!-- Mac Browser Top -->
                <div class="h-12 border-b bg-white flex items-center px-6 justify-between shrink-0">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-[#FF5F56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#FFBD2E]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27C93F]"></div>
                    </div>
                    <div class="bg-slate-100 px-4 py-1 rounded-lg text-[10px] font-bold text-slate-400">app.extraaedge.com/admissions/v2</div>
                    <div class="w-4 h-4 bg-slate-200 rounded-full"></div>
                </div>

                <div class="flex flex-1 overflow-hidden">
                    <!-- Nav -->
                    <aside class="crm-sidebar">
                        <div class="sidebar-icon active" data-goto="hero"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></div>
                        <div class="sidebar-icon" data-goto="assist"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg></div>
                        <div class="sidebar-icon" data-goto="scoring"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></div>
                        <div class="sidebar-icon" data-goto="followup"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg></div>
                        <div class="sidebar-icon" data-goto="performance"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg></div>
                    </aside>

                    <!-- Main Viewport -->
                    <main class="crm-main" id="crmApp">

                        <!-- Hero View -->
                        <div id="view-hero" class="crm-view">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-bold text-lg">Admission Dashboard</h3>
                                <div class="text-[10px] bg-white border px-3 py-1 rounded-full font-bold">Aug 2024 Cycle</div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="bg-white p-4 rounded-xl border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Total Inquiries</div>
                                    <div class="text-2xl font-black">12,482</div>
                                </div>
                                <div class="bg-white p-4 rounded-xl border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">AI Qualified</div>
                                    <div class="text-2xl font-black text-blue-600">8,941</div>
                                </div>
                                <div class="bg-white p-4 rounded-xl border border-slate-200">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Conversion</div>
                                    <div class="text-2xl font-black text-orange-500">14.2%</div>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl border border-slate-200 p-4 h-48 flex items-end justify-between gap-2">
                                <div class="bg-slate-100 w-full rounded-t-lg" style="height: 40%"></div>
                                <div class="bg-slate-100 w-full rounded-t-lg" style="height: 60%"></div>
                                <div class="bg-blue-200 w-full rounded-t-lg" style="height: 45%"></div>
                                <div class="bg-blue-600 w-full rounded-t-lg" style="height: 85%"></div>
                                <div class="bg-slate-100 w-full rounded-t-lg" style="height: 50%"></div>
                                <div class="bg-slate-100 w-full rounded-t-lg" style="height: 30%"></div>
                                <div class="bg-orange-500 w-full rounded-t-lg" style="height: 95%"></div>
                            </div>
                        </div>

                        <!-- Assist View -->
                        <div id="view-assist" class="crm-view hidden">
                            <div class="flex items-center gap-4 mb-8 bg-white p-4 rounded-2xl shadow-sm border border-slate-200">
                                <div class="w-12 h-12 rounded-full bg-slate-200 border-2 border-white overflow-hidden"><img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="avatar"></div>
                                <div class="flex-1">
                                    <p class="font-bold text-sm">Aditya Rao</p>
                                    <p class="text-[10px] text-slate-400">Seeking BBA Admissions 2024</p>
                                </div>
                                <span class="status-pill bg-green-100 text-green-700">Online</span>
                            </div>
                            <div class="space-y-4">
                                <div class="bg-white p-3 rounded-2xl rounded-tl-none border shadow-sm max-w-[80%] text-[11px] leading-relaxed">
                                    "Is there any scholarship for students with 90%+ in Class 12?"
                                </div>
                                <div class="bg-slate-900 text-white p-4 rounded-2xl rounded-tr-none ml-auto max-w-[85%] text-[11px] leading-relaxed shadow-lg">
                                    <p id="typewriter"></p>
                                    <div class="mt-2 pt-2 border-t border-white/10 flex justify-between items-center">
                                        <span class="text-[9px] font-bold opacity-60">AI COUNSELOR</span>
                                        <span class="text-[9px] bg-blue-600 px-2 py-0.5 rounded">Action Required</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Scoring View -->
                        <div id="view-scoring" class="crm-view hidden">
                            <h3 class="font-bold text-sm mb-4">AI High-Intent Pipeline</h3>
                            <div class="space-y-3" id="leadList">
                                <div class="lead-card flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center font-bold text-[10px]">SM</div>
                                        <div>
                                            <p class="text-[11px] font-bold">Siddharth M.</p>
                                            <p class="text-[9px] text-slate-400">Viewed Fees 4 times</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xs font-black text-orange-600" id="liveScore">0%</span>
                                        <p class="text-[8px] font-bold text-slate-300">INTENT SCORE</p>
                                    </div>
                                </div>
                                <div class="lead-card flex items-center justify-between opacity-40">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100"></div>
                                        <div><p class="text-[11px] font-bold">Riya S.</p><p class="text-[9px] text-slate-400">Idle for 12 days</p></div>
                                    </div>
                                    <div class="text-right"><span class="text-xs font-black text-slate-400">12%</span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Followup View -->
                        <div id="view-followup" class="crm-view hidden">
                            <h3 class="font-bold text-sm mb-4">Team Next Actions</h3>
                            <div class="space-y-3">
                                <div class="p-3 bg-white rounded-xl border-l-4 border-l-blue-600 shadow-sm">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-[10px] font-bold text-blue-600">FOLLOW UP</span>
                                        <span class="text-[9px] text-slate-400 font-bold">DUE NOW</span>
                                    </div>
                                    <p class="text-[11px] font-bold">Call Karan: Scholarship docs pending</p>
                                </div>
                                <div class="p-3 bg-white rounded-xl border-l-4 border-l-orange-500 shadow-sm">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-[10px] font-bold text-orange-500">WHATSAPP</span>
                                        <span class="text-[9px] text-slate-400 font-bold">10:30 AM</span>
                                    </div>
                                    <p class="text-[11px] font-bold">Send Brochure: Sneha P.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Calling View -->
                        <div id="view-calling" class="crm-view hidden flex flex-col items-center justify-center h-full">
                            <div class="w-20 h-20 bg-red-500 rounded-full flex items-center justify-center text-white mb-6 shadow-2xl relative">
                                <div class="absolute inset-0 bg-red-400 rounded-full animate-ping opacity-20"></div>
                                <svg class="w-8 h-8 relative" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                            </div>
                            <div class="flex items-center gap-1.5 h-10 mb-4" id="waves"></div>
                            <p class="text-xs font-bold">Calling +91 9876X XXX01</p>
                            <p class="text-[9px] text-slate-400 mt-1">AI Qualification in Progress...</p>
                        </div>

                        <!-- Performance View -->
                        <div id="view-performance" class="crm-view hidden">
                            <h3 class="font-bold text-sm mb-6">Counselor Intelligence</h3>
                            <div class="space-y-6">
                                <div class="bg-white p-4 rounded-xl border border-slate-200">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-[11px] font-bold">Conversion Rate</span>
                                        <span class="text-[11px] font-black text-green-600">+12% vs last cycle</span>
                                    </div>
                                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-600" style="width: 76%"></div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-blue-50 p-3 rounded-lg text-center">
                                        <p class="text-[8px] font-bold text-blue-400 mb-1">RESPONSE TIME</p>
                                        <p class="text-lg font-black text-blue-900">1.4m</p>
                                    </div>
                                    <div class="bg-orange-50 p-3 rounded-lg text-center">
                                        <p class="text-[8px] font-bold text-orange-400 mb-1">CLOSURE RATE</p>
                                        <p class="text-lg font-black text-orange-900">9.2x</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function(){
        const sections = document.querySelectorAll('.vidya-wrap .story-section');
        const crmWindow = document.getElementById('crmWindow');
        const views = document.querySelectorAll('.vidya-wrap .crm-view');
        const sidebarIcons = document.querySelectorAll('.vidya-wrap .sidebar-icon');
        if (!crmWindow) return;

        // Typing Effect Sim
        function typeEffect(text, targetId) {
            const el = document.getElementById(targetId);
            if (!el) return;
            el.innerHTML = "";
            let i = 0;
            const timer = setInterval(() => {
                if (i < text.length) {
                    el.innerHTML += text.charAt(i);
                    i++;
                } else { clearInterval(timer); }
            }, 30);
        }

        // Live Scoring Sim
        function scoreSim() {
            const el = document.getElementById('liveScore');
            if (!el) return;
            let val = 0;
            const timer = setInterval(() => {
                if (val < 98) {
                    val++;
                    el.innerText = val + '%';
                } else { clearInterval(timer); }
            }, 15);
        }

        // Voice Wave Sim
        function waveSim() {
            const waveBox = document.getElementById('waves');
            if (!waveBox) return;
            waveBox.innerHTML = '';
            for(let i=0; i<12; i++) {
                const b = document.createElement('div');
                b.className = 'wave-bar';
                b.style.animationDelay = `${i * 0.1}s`;
                waveBox.appendChild(b);
            }
        }

        // Scroll Logic
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const stage = entry.target.getAttribute('data-stage');

                    // Activate Stage UI
                    sections.forEach(s => s.classList.remove('active'));
                    entry.target.classList.add('active');

                    // Switch CRM View
                    views.forEach(v => v.classList.add('hidden'));
                    const view = document.getElementById(`view-${stage}`);
                    if (view) view.classList.remove('hidden');

                    // Update Sidebar Icons
                    sidebarIcons.forEach(icon => {
                        icon.classList.toggle('active', icon.dataset.goto === stage);
                    });

                    // Logic Triggers
                    if(stage === 'assist') typeEffect("Yes, Aditya! We offer a Merit Scholarship. For 90%+ in Class 12, you get a 25% tuition fee waiver. Would you like to check the criteria?", "typewriter");
                    if(stage === 'scoring') scoreSim();
                    if(stage === 'calling') waveSim();

                    // 3D Effects
                    if(stage === 'hero') crmWindow.style.transform = 'perspective(1000px) rotateY(0deg)';
                    if(stage === 'assist') crmWindow.style.transform = 'perspective(1000px) rotateY(-8deg) rotateX(2deg) scale(1.05)';
                    if(stage === 'scoring') crmWindow.style.transform = 'perspective(1000px) rotateY(8deg) rotateX(-2deg) scale(1.05)';
                    if(stage === 'calling') crmWindow.style.transform = 'scale(1.1) translateZ(100px)';
                    if(stage === 'performance') crmWindow.style.transform = 'perspective(1000px) rotateX(5deg) scale(1.02)';
                }
            });
        }, { threshold: 0.6 });

        sections.forEach(s => observer.observe(s));
    })();
</script>
<!-- VidyaAI Admission Intelligence Section END -->

<!-- START Admission CRM Section -->
<style>
  #wp-admission-crm {
    --primary-accent: #DE6E30;
    --dark-base: #19335D;
    --bg-light: #f8fafc;
    --card-shadow: 0 10px 25px -5px rgba(25, 51, 93, 0.1), 0 8px 10px -6px rgba(25, 51, 93, 0.1);
    --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);

    background-color: var(--bg-light);
    font-family: 'Open Sans', sans-serif;
    color: var(--dark-base);
    padding: 80px 20px;
    overflow: hidden;
    line-height: 1.6;
  }

  #wp-admission-crm .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
  }

  /* Typography */
  #wp-admission-crm .header-group {
    text-align: center;
    max-width: 900px;
  }

  #wp-admission-crm h2 {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.1;
    color: var(--dark-base);
  }

  #wp-admission-crm .subheadline {
    font-size: clamp(1rem, 2vw, 1.15rem);
    color: #4b5563;
    margin-bottom: 30px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  /* Funnel Visualization System */
  #wp-admission-crm .funnel-system {
    width: 100%;
    position: relative;
    padding: 100px 0 40px 0;
    margin: 20px 0;
  }

  #wp-admission-crm .funnel-track {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 2;
    gap: 10px;
  }

  #wp-admission-crm .track-line {
    position: absolute;
    top: 50%;
    left: 10%;
    right: 10%;
    height: 4px;
    background: #e2e8f0;
    z-index: 1;
    transform: translateY(-50%);
  }

  #wp-admission-crm .track-progress {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0%;
    background: var(--primary-accent);
    box-shadow: 0 0 15px var(--primary-accent);
    transition: width 0.5s linear;
  }

  #wp-admission-crm .stage {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
  }

  #wp-admission-crm .stage-dot {
    width: 20px;
    height: 20px;
    background: white;
    border: 3px solid #e2e8f0;
    border-radius: 50%;
    margin-bottom: 15px;
    z-index: 3;
    transition: var(--transition);
  }

  #wp-admission-crm .stage.active .stage-dot {
    border-color: var(--primary-accent);
    background: var(--primary-accent);
    box-shadow: 0 0 0 6px rgba(222, 110, 48, 0.15);
  }

  #wp-admission-crm .lead-card {
    background: white;
    padding: 14px;
    border-radius: 12px;
    width: 180px;
    box-shadow: var(--card-shadow);
    border-left: 4px solid var(--primary-accent);
    position: absolute;
    top: -85px;
    left: 0;
    z-index: 10;
    pointer-events: none;
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  #wp-admission-crm .card-title {
    font-weight: 700;
    font-size: 0.85rem;
    color: var(--dark-base);
  }

  #wp-admission-crm .card-meta {
    font-size: 0.75rem;
    color: #64748b;
  }

  #wp-admission-crm .stage-label {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 0.8rem;
    color: #94a3b8;
    transition: var(--transition);
  }

  #wp-admission-crm .stage.active .stage-label {
    color: var(--dark-base);
  }

  /* Moments Grid */
  #wp-admission-crm .moments-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    width: 100%;
  }

  #wp-admission-crm .moment-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: var(--card-shadow);
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  #wp-admission-crm .moment-card:hover {
    transform: translateY(-5px);
  }

  #wp-admission-crm .moment-icon {
    width: 44px;
    height: 44px;
    background: rgba(222, 110, 48, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
  }

  #wp-admission-crm .moment-label {
    font-family: 'Poppins', sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--dark-base);
  }

  #wp-admission-crm .moment-desc {
    color: #64748b;
    font-size: 0.9rem;
    margin-bottom: 20px;
    flex-grow: 1;
  }

  #wp-admission-crm .insight-badge {
    align-self: flex-start;
    background: var(--dark-base);
    color: #ffffff;
    padding: 5px 12px;
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 600;
  }

  #wp-admission-crm .footer-cta {
    margin-top: 20px;
    text-align: center;
  }

  #wp-admission-crm .btn-primary {
    background: var(--primary-accent);
    color: #ffffff;
    padding: 18px 40px;
    border-radius: 100px;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    text-decoration: none;
    font-size: 1rem;
    box-shadow: 0 10px 20px rgba(222, 110, 48, 0.25);
    transition: var(--transition);
    display: inline-block;
  }

  #wp-admission-crm .btn-primary:hover {
    transform: translateY(-2px);
    background: #c85d25;
  }

  #wp-admission-crm .closing-statement {
    margin-top: 25px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 0.8rem;
  }

  /* MOBILE RESPONSIVE OPTIMIZATION */
  @media (max-width: 992px) {
    #wp-admission-crm { padding: 60px 15px; }
    #wp-admission-crm .moments-grid { grid-template-columns: 1fr; gap: 20px; }

    /* Convert Funnel to Vertical Flow on Mobile */
    #wp-admission-crm .funnel-system {
      padding: 20px 0;
      margin: 40px 0;
      max-width: 320px;
    }
    #wp-admission-crm .funnel-track {
      flex-direction: column;
      align-items: flex-start;
      gap: 30px;
      padding-left: 40px;
    }
    #wp-admission-crm .track-line {
      left: 50px;
      top: 0;
      bottom: 0;
      width: 4px;
      height: 100%;
      transform: none;
    }
    #wp-admission-crm .track-progress {
      width: 100% !important;
      height: 0%;
      transition: height 0.5s linear;
    }
    #wp-admission-crm .stage {
      flex-direction: row;
      text-align: left;
      gap: 20px;
    }
    #wp-admission-crm .stage-dot { margin-bottom: 0; }
    #wp-admission-crm .lead-card {
      position: absolute;
      left: 80px !important;
      top: 0;
      width: 160px;
      transform: none !important;
    }
  }

  @media (max-width: 480px) {
    #wp-admission-crm h2 { font-size: 1.8rem; }
    #wp-admission-crm .btn-primary { width: 100%; padding: 18px 20px; }
  }
</style>

<section id="wp-admission-crm">
  <div class="container">

    <!-- Outcome-Driven Header -->
    <div class="header-group">
      <h2><?php ee_h('adm_h2', 'Every admission. Tracked. Moving forward.'); ?></h2>
      <p class="subheadline">
        <?php ee_h('adm_subheadline', 'Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent lead prioritization ensures your team focuses on candidates that convert.'); ?>
      </p>
    </div>

    <!-- The Alive Pipeline Visualization -->
    <div class="funnel-system" id="pipeline-container">
      <div class="track-line">
        <div class="track-progress" id="pipeline-progress"></div>
      </div>

      <div class="funnel-track">
        <!-- The Floating Lead Card -->
        <div class="lead-card" id="active-lead">
          <span class="card-title" id="lead-name">New Inquiry</span>
          <span class="card-meta" id="lead-status">Analyzing Intent...</span>
          <div style="height: 4px; background: #f1f5f9; border-radius: 2px; margin-top: 4px; overflow: hidden;">
            <div id="card-inner-bar" style="height: 100%; width: 30%; background: #DE6E30; transition: width 0.5s;"></div>
          </div>
        </div>

        <div class="stage" data-label="New Inquiry">
          <div class="stage-dot"></div>
          <span class="stage-label">Inquiry</span>
        </div>
        <div class="stage" data-label="Lead Scored">
          <div class="stage-dot"></div>
          <span class="stage-label">Verified</span>
        </div>
        <div class="stage" data-label="Nurturing">
          <div class="stage-dot"></div>
          <span class="stage-label">Automation</span>
        </div>
        <div class="stage" data-label="High Intent">
          <div class="stage-dot"></div>
          <span class="stage-label">Counseling</span>
        </div>
        <div class="stage" data-label="Finalizing">
          <div class="stage-dot"></div>
          <span class="stage-label">Enrolled</span>
        </div>
      </div>
    </div>

    <!-- Feature Moments -->
    <div class="moments-grid">
      <!-- Funnel Management -->
      <div class="moment-card">
        <div class="moment-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <div class="moment-label">Funnel Management</div>
        <p class="moment-desc">Gain full visibility into the prospect journey. Track every touchpoint and eliminate bottlenecks automatically.</p>
        <span class="insight-badge">"Nothing gets stuck"</span>
      </div>

      <!-- Follow-Up Manager -->
      <div class="moment-card">
        <div class="moment-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        </div>
        <div class="moment-label">Smart Follow-ups</div>
        <p class="moment-desc">Intelligent triggers manage application reminders and engagement while your team focuses on high-potential leads.</p>
        <span class="insight-badge">Engagement: +65%</span>
      </div>

      <!-- Reporting Dashboard -->
      <div class="moment-card">
        <div class="moment-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
        </div>
        <div class="moment-label">Real-time Insights</div>
        <p class="moment-desc">Data-driven decisions guided by a central dashboard. Identify top-performing channels instantly.</p>
        <span class="insight-badge">Data-guided Growth</span>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="footer-cta">
      <a href="<?php ee_u('adm_cta_url', '#'); ?>" class="btn-primary"><?php ee_h('adm_cta_text', 'Explore the Flow'); ?></a>
      <div class="closing-statement"><?php ee_h('adm_closing', 'Full visibility. Zero chaos. More conversions.'); ?></div>
    </div>

  </div>
</section>

<script>
  (function() {
    const stages = document.querySelectorAll('#wp-admission-crm .stage');
    const progress = document.getElementById('pipeline-progress');
    const leadCard = document.getElementById('active-lead');
    const leadName = document.getElementById('lead-name');
    const leadStatus = document.getElementById('lead-status');
    const cardInnerBar = document.getElementById('card-inner-bar');
    if (!stages.length || !progress) return;

    const names = ["Ruchika S.", "Amit K.", "Sara J.", "David L."];
    let currentStage = 0;
    let currentNameIdx = 0;

    function updatePipeline() {
      const isMobile = window.innerWidth <= 992;
      const containerRect = document.getElementById('pipeline-container').getBoundingClientRect();
      const targetStage = stages[currentStage];
      const stageRect = targetStage.getBoundingClientRect();

      leadCard.style.transition = "all 0.8s cubic-bezier(0.16, 1, 0.3, 1)";

      if (!isMobile) {
        const targetX = stageRect.left - containerRect.left + (stageRect.width / 2) - (leadCard.offsetWidth / 2);
        leadCard.style.left = `${targetX}px`;
        leadCard.style.top = `-85px`;

        const progressPercent = (currentStage / (stages.length - 1)) * 80 + 10;
        progress.style.width = `${currentStage === 0 ? 0 : progressPercent}%`;
        progress.style.height = `100%`;
      } else {
        const targetY = stageRect.top - containerRect.top + (stageRect.height / 2) - (leadCard.offsetHeight / 2);
        leadCard.style.top = `${targetY}px`;

        const progressPercent = (currentStage / (stages.length - 1)) * 100;
        progress.style.height = `${progressPercent}%`;
        progress.style.width = `100%`;
      }

      stages.forEach((s, idx) => {
        if(idx <= currentStage) s.classList.add('active');
        else s.classList.remove('active');
      });

      leadStatus.innerText = targetStage.getAttribute('data-label');
      cardInnerBar.style.width = `${(currentStage + 1) * 20}%`;

      if (currentStage < stages.length - 1) {
        currentStage++;
      } else {
        setTimeout(() => {
          currentStage = 0;
          currentNameIdx = (currentNameIdx + 1) % names.length;
          leadName.innerText = names[currentNameIdx];
          leadCard.style.opacity = "0";
          setTimeout(() => { leadCard.style.opacity = "1"; }, 100);
        }, 2000);
      }
    }

    leadName.innerText = names[0];
    setInterval(updatePipeline, 2500);
    window.addEventListener('resize', updatePipeline);
    updatePipeline();
  })();
</script>
<!-- END Admission CRM Section -->

<!-- START Section: AI Admission Marketing System -->
<style>
    #wp-ai-marketing-system {
      --primary: #DE6E30;
      --primary-hover: #c55a24;
      --secondary: #19335D;
      --bg: #F8FAFC;
      --card-bg: #FFFFFF;
      --text: #1e293b;
      --text-muted: #64748B;
      --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);

      padding: clamp(60px, 10vw, 120px) 20px;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow-x: hidden;
    }

    #wp-ai-marketing-system .container { max-width: 1140px; margin: 0 auto; }

    #wp-ai-marketing-system .header-content { text-align: center; margin-bottom: 60px; max-width: 850px; margin-inline: auto; }
    #wp-ai-marketing-system .status-tag {
      display: inline-flex; align-items: center; gap: 10px;
      background: white; padding: 8px 18px; border-radius: 100px;
      font-size: 0.75rem; font-weight: 700; color: var(--secondary);
      box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.03); margin-bottom: 24px;
    }
    #wp-ai-marketing-system .pulse-dot {
      width: 10px; height: 10px; background: #10b981; border-radius: 50%;
      position: relative;
    }
    #wp-ai-marketing-system .pulse-dot::after {
      content: ''; position: absolute; width: 100%; height: 100%;
      background: inherit; border-radius: 50%; animation: mkt-dot-pulse 2s infinite;
    }
    @keyframes mkt-dot-pulse {
      0% { transform: scale(1); opacity: 0.8; }
      100% { transform: scale(3); opacity: 0; }
    }

    #wp-ai-marketing-system .main-headline {
      font-family: 'Poppins', sans-serif; font-size: clamp(2rem, 6vw, 3.2rem);
      line-height: 1.1; color: var(--secondary); margin-bottom: 20px; font-weight: 700;
      letter-spacing: -0.02em;
    }
    #wp-ai-marketing-system .highlight { color: var(--primary); }
    #wp-ai-marketing-system .subtext { font-size: 1.1rem; color: var(--text-muted); line-height: 1.6; }

    #wp-ai-marketing-system .engine-preview {
      background: var(--card-bg); border-radius: 32px; padding: 60px 40px;
      box-shadow: 0 25px 60px -15px rgba(25, 51, 93, 0.08); margin-bottom: 50px;
      border: 1px solid rgba(25, 51, 93, 0.05);
    }

    #wp-ai-marketing-system .visual-flow-wrapper {
      display: flex; align-items: center; justify-content: space-between;
      position: relative;
    }

    #wp-ai-marketing-system .flow-step {
      display: flex; flex-direction: column; align-items: center; gap: 14px;
      flex: 0 0 auto; width: 130px; z-index: 10; cursor: pointer;
    }

    #wp-ai-marketing-system .icon-box {
      width: 68px; height: 68px; background: var(--bg); border-radius: 20px;
      display: flex; align-items: center; justify-content: center; color: var(--secondary);
      transition: var(--transition); border: 1px solid rgba(0,0,0,0.05);
    }
    #wp-ai-marketing-system .icon-box svg { width: 24px; height: 24px; }
    #wp-ai-marketing-system .flow-step:hover .icon-box {
      transform: translateY(-8px); box-shadow: 0 15px 30px rgba(222, 110, 48, 0.15);
      border-color: var(--primary); color: var(--primary);
    }
    #wp-ai-marketing-system .icon-box.ai-active { background: var(--secondary); color: white; border: none; }
    #wp-ai-marketing-system .icon-box.success-box { background: #10b981; color: white; border: none; }

    #wp-ai-marketing-system .step-label {
      font-size: 0.7rem; font-weight: 800; text-transform: uppercase;
      color: var(--secondary); text-align: center; line-height: 1.3;
      letter-spacing: 0.05em; margin: 0;
    }

    #wp-ai-marketing-system .flow-connector {
      flex: 1; height: 2px; position: relative; margin-top: -34px;
      min-width: 20px;
    }

    #wp-ai-marketing-system .arrow-container {
      position: relative; width: 100%; height: 100%; display: flex; align-items: center;
    }

    #wp-ai-marketing-system .arrow-line-bg {
      position: absolute; width: 100%; height: 2px; background: #f1f5f9;
    }

    #wp-ai-marketing-system .arrow-line-active {
      position: absolute; width: 0; height: 2px; background: var(--primary);
      animation: mkt-arrow-line-fill 3s infinite cubic-bezier(0.4, 0, 0.2, 1);
    }

    #wp-ai-marketing-system .arrow-head-moving {
      position: absolute; left: 0; width: 10px; height: 10px;
      border-top: 2.5px solid var(--primary); border-right: 2.5px solid var(--primary);
      transform: rotate(45deg); margin-top: -4px;
      animation: mkt-arrow-move 3s infinite cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes mkt-arrow-line-fill {
      0% { width: 0; left: 0; opacity: 0; }
      10% { opacity: 1; }
      40%, 60% { width: 100%; left: 0; opacity: 1; }
      90% { opacity: 1; }
      100% { width: 0; left: 100%; opacity: 0; }
    }

    @keyframes mkt-arrow-move {
      0% { left: 0; opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { left: 100%; opacity: 0; }
    }

    #wp-ai-marketing-system .flow-details-hint {
      text-align: center; margin-top: 35px; font-size: 0.95rem;
      color: var(--text-muted); font-weight: 500; height: 1.5em;
      transition: var(--transition);
    }

    #wp-ai-marketing-system .automation-card {
      background: var(--card-bg); border-radius: 32px; overflow: hidden;
      box-shadow: 0 40px 100px -20px rgba(0,0,0,0.05);
      border: 1px solid rgba(0,0,0,0.04);
    }
    #wp-ai-marketing-system .card-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; }

    #wp-ai-marketing-system .content-side { padding: clamp(30px, 6vw, 60px); }
    #wp-ai-marketing-system .badge {
      display: inline-block; background: rgba(222, 110, 48, 0.1); color: var(--primary);
      padding: 6px 14px; border-radius: 8px; font-size: 0.75rem; font-weight: 800;
      margin-bottom: 20px; text-transform: uppercase; letter-spacing: 0.1em;
    }
    #wp-ai-marketing-system .card-title {
      font-size: clamp(1.6rem, 3.5vw, 2.4rem); color: var(--secondary);
      margin-bottom: 20px; font-family: 'Poppins'; line-height: 1.2; font-weight: 700;
    }
    #wp-ai-marketing-system .description {
      font-size: 1.05rem; line-height: 1.7; color: var(--text-muted); margin-bottom: 35px;
    }
    #wp-ai-marketing-system .metric-row {
      display: flex; gap: 45px; padding-top: 30px; border-top: 1px solid #f1f5f9;
    }
    #wp-ai-marketing-system .mini-stat .val {
      display: block; font-size: 2.2rem; font-weight: 800; color: var(--secondary);
      font-family: 'Poppins'; line-height: 1; margin-bottom: 8px;
    }
    #wp-ai-marketing-system .mini-stat .lbl {
      font-size: 0.8rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;
    }

    #wp-ai-marketing-system .features-side {
      background: #f8fafc; padding: clamp(30px, 6vw, 60px);
      display: flex; flex-direction: column; justify-content: center;
      border-left: 1px solid rgba(0,0,0,0.03);
    }
    #wp-ai-marketing-system .feature-title {
      font-weight: 800; font-size: 0.85rem; margin-bottom: 30px; color: var(--secondary);
      letter-spacing: 0.1em; opacity: 0.8;
    }
    #wp-ai-marketing-system .feature-list { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 28px; margin: 0; }
    #wp-ai-marketing-system .feature-item { display: flex; align-items: flex-start; gap: 20px; }
    #wp-ai-marketing-system .feat-icon {
      width: 44px; height: 44px; background: white; border-radius: 12px;
      display: flex; align-items: center; justify-content: center; color: var(--primary);
      flex-shrink: 0; box-shadow: 0 8px 16px rgba(0,0,0,0.05);
    }
    #wp-ai-marketing-system .feat-icon svg { width: 22px; height: 22px; }
    #wp-ai-marketing-system .feat-name { display: block; font-weight: 700; font-size: 1.05rem; color: var(--secondary); margin-bottom: 2px; }
    #wp-ai-marketing-system .feat-desc { display: block; font-size: 0.85rem; color: var(--text-muted); font-weight: 500; }

    #wp-ai-marketing-system .cta-box { text-align: center; margin-top: 70px; }
    #wp-ai-marketing-system .btn-primary {
      display: inline-flex; align-items: center; gap: 14px;
      background: var(--primary); color: white; padding: 20px 50px;
      border-radius: 16px; font-weight: 700; text-decoration: none;
      box-shadow: 0 15px 40px rgba(222, 110, 48, 0.4); transition: var(--transition);
      font-size: 1.15rem;
    }
    #wp-ai-marketing-system .btn-primary:hover { transform: translateY(-4px); box-shadow: 0 25px 50px rgba(222, 110, 48, 0.5); }
    #wp-ai-marketing-system .stats-footer {
      margin-top: 30px; font-size: 0.95rem; color: var(--text-muted); font-weight: 500;
    }

    @media (max-width: 960px) {
      #wp-ai-marketing-system .card-grid { grid-template-columns: 1fr; }
      #wp-ai-marketing-system .features-side { border-left: none; border-top: 1px solid rgba(0,0,0,0.05); }

      #wp-ai-marketing-system .visual-flow-wrapper {
        flex-direction: column; align-items: flex-start; padding-left: 30px; gap: 0;
      }
      #wp-ai-marketing-system .flow-step {
        flex-direction: row; width: 100%; gap: 25px; padding: 15px 0; justify-content: flex-start;
      }
      #wp-ai-marketing-system .step-label { text-align: left; font-size: 0.85rem; }
      #wp-ai-marketing-system .icon-box { width: 56px; height: 56px; border-radius: 16px; }

      #wp-ai-marketing-system .flow-connector {
        width: 2px; height: 50px; margin-left: 27px; margin-top: 0; margin-bottom: 0; flex: none;
      }
      #wp-ai-marketing-system .arrow-container { flex-direction: column; height: 100%; width: 100%; }
      #wp-ai-marketing-system .arrow-line-bg { width: 2px; height: 100%; left: 0; top: 0; }
      #wp-ai-marketing-system .arrow-line-active { width: 2px; height: 0; left: 0; top: 0; animation: mkt-arrow-line-fill-v 3s infinite cubic-bezier(0.4, 0, 0.2, 1); }
      #wp-ai-marketing-system .arrow-head-moving {
        left: -4.5px; top: 0; transform: rotate(135deg);
        animation: mkt-arrow-move-v 3s infinite cubic-bezier(0.4, 0, 0.2, 1);
      }

      @keyframes mkt-arrow-line-fill-v {
        0% { height: 0; top: 0; opacity: 0; }
        10% { opacity: 1; }
        40%, 60% { height: 100%; top: 0; opacity: 1; }
        90% { opacity: 1; }
        100% { height: 0; top: 100%; opacity: 0; }
      }
      @keyframes mkt-arrow-move-v {
        0% { top: 0; opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { top: 100%; opacity: 0; }
      }
    }
</style>
<section id="wp-ai-marketing-system">
  <div class="container">
    <header class="header-content">
      <div class="status-tag">
        <span class="pulse-dot"></span>
        <span class="status-text"><?php ee_h('mkt_status', 'AI Engine: Live Processing'); ?></span>
      </div>
      <h2 class="main-headline"><?php ee_h('mkt_h2_part1', 'Automate Every Inquiry.'); ?><br><span class="highlight"><?php ee_h('mkt_h2_part2', 'Convert Every Student.'); ?></span></h2>
      <p class="subtext"><?php ee_h('mkt_subtext', 'From the first touchpoint to final enrollment, our AI-driven automation ensures no lead is left behind. Experience precision marketing that scales with your institution.'); ?></p>
    </header>

    <div class="engine-preview">
      <div class="visual-flow-wrapper">
        <div class="flow-step" data-info="Automatic lead capture from Web, WhatsApp, and Social Media inquiries instantly.">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </div>
          <h4 class="step-label">Student Inquiry</h4>
        </div>

        <div class="flow-connector">
          <div class="arrow-container">
            <div class="arrow-line-bg"></div>
            <div class="arrow-line-active"></div>
            <div class="arrow-head-moving"></div>
          </div>
        </div>

        <div class="flow-step" data-info="Intelligent audience segmentation based on student intent and real-time behavior.">
          <div class="icon-box ai-active">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 2a10 10 0 1 0 10 10H12V2z"></path><path d="M12 12L2.69 7"></path><path d="M12 12l5.63 8.16"></path></svg>
          </div>
          <h4 class="step-label">AI Segmentation</h4>
        </div>

        <div class="flow-connector">
          <div class="arrow-container">
            <div class="arrow-line-bg"></div>
            <div class="arrow-line-active"></div>
            <div class="arrow-head-moving"></div>
          </div>
        </div>

        <div class="flow-step" data-info="Delivering hyper-personalized emails and targeted campaigns at the perfect moment.">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
          </div>
          <h4 class="step-label">Personalized Message</h4>
        </div>

        <div class="flow-connector">
          <div class="arrow-container">
            <div class="arrow-line-bg"></div>
            <div class="arrow-line-active"></div>
            <div class="arrow-head-moving"></div>
          </div>
        </div>

        <div class="flow-step" data-info="Omnichannel nurturing across WhatsApp, SMS, and Email to ensure high engagement.">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
          </div>
          <h4 class="step-label">Auto Follow-ups</h4>
        </div>

        <div class="flow-connector">
          <div class="arrow-container">
            <div class="arrow-line-bg"></div>
            <div class="arrow-line-active"></div>
            <div class="arrow-head-moving"></div>
          </div>
        </div>

        <div class="flow-step" data-info="Seamless CRM integration for final document verification and enrollment success.">
          <div class="icon-box success-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
          </div>
          <h4 class="step-label">Admission Confirmed</h4>
        </div>

      </div>
      <div id="flow-hint" class="flow-details-hint">Click a step to explore the AI logic</div>
    </div>

    <article class="automation-card">
      <div class="card-grid">
        <div class="content-side">
          <nav class="breadcrumb-nav"><span class="badge">Marketing Automation</span></nav>
          <h3 class="card-title"><?php ee_h('mkt_card_title', 'Scale Your Outreach With Precision'); ?></h3>
          <p class="description">
            <?php ee_h('mkt_description', 'Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time. Integrated with your Admission CRM, it streamlines lead nurturing across multiple channels while you focus on strategy. Intelligent audience segmentation ensures every message resonates, significantly improving engagement and conversion rates.'); ?>
          </p>

          <div class="metric-row">
            <div class="mini-stat">
              <span class="val">98%</span>
              <span class="lbl">Delivery Accuracy</span>
            </div>
            <div class="mini-stat">
              <span class="val" id="enroll-counter">0</span>
              <span class="lbl">Monthly Conversions</span>
            </div>
          </div>
        </div>

        <div class="features-side">
          <h5 class="feature-title">POPULAR FEATURES:</h5>
          <ul class="feature-list">
            <li class="feature-item">
              <div class="feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
              <div class="feat-text">
                <span class="feat-name">Email Marketing</span>
                <span class="feat-desc">Personalized drip campaigns</span>
              </div>
            </li>
            <li class="feature-item">
              <div class="feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
              <div class="feat-text">
                <span class="feat-name">Integrated Channels</span>
                <span class="feat-desc">WhatsApp, SMS & Social Media</span>
              </div>
            </li>
            <li class="feature-item">
              <div class="feat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></div>
              <div class="feat-text">
                <span class="feat-name">Campaign Analytics</span>
                <span class="feat-desc">Real-time performance tracking</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </article>

    <div class="cta-box">
      <a href="<?php ee_u('mkt_cta_url', '#demo'); ?>" class="btn-primary" role="button">
        <?php ee_h('mkt_cta_text', 'Activate AI Automation'); ?>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" width="18" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
      </a>
      <p class="stats-footer">Processing <span id="msg-total">0</span> data-driven student interactions today</p>
    </div>
  </div>
</section>
<script>
    (function() {
      const steps = document.querySelectorAll('#wp-ai-marketing-system .flow-step');
      const hint = document.getElementById('flow-hint');
      const enrollVal = document.getElementById('enroll-counter');
      const msgTotal = document.getElementById('msg-total');
      if (!steps.length) return;

      steps.forEach(s => {
        const info = s.getAttribute('data-info');
        const show = () => {
          hint.innerText = info;
          hint.style.color = '#DE6E30';
          hint.style.fontWeight = '700';
        };
        const hide = () => {
          hint.innerText = 'Click a step to explore the AI logic';
          hint.style.color = '#64748B';
          hint.style.fontWeight = '500';
        };
        s.addEventListener('mouseenter', show);
        s.addEventListener('mouseleave', hide);
        s.addEventListener('click', show);
      });

      const animateNumber = (el, target) => {
        let current = 0;
        const duration = 2500;
        const startTime = performance.now();

        const step = (now) => {
          const progress = Math.min((now - startTime) / duration, 1);
          const easeOutQuint = 1 - Math.pow(1 - progress, 5);
          const value = Math.floor(easeOutQuint * target);
          el.innerText = value.toLocaleString();
          if (progress < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
      };

      const obs = new IntersectionObserver((entries) => {
        if(entries[0].isIntersecting) {
          if (enrollVal) animateNumber(enrollVal, 142);
          if (msgTotal) animateNumber(msgTotal, 1245);
          obs.disconnect();
        }
      }, { threshold: 0.1 });

      if(enrollVal) obs.observe(enrollVal);
    })();
</script>
<!-- END Section: AI Admission Marketing System -->

<!-- START AI Admission Chatbot Section -->
<style>
    #wp-chatbot-system {
      --primary: #DE6E30;
      --secondary: #19335D;
      --bg-light: #F8FAFC;
      --white: #FFFFFF;
      --text-main: #334155;
      --text-muted: #64748B;
      --border: #E2E8F0;
      --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);

      background: var(--bg-light);
      padding: 100px 20px;
      font-family: 'Open Sans', sans-serif;
      color: var(--text-main);
      line-height: 1.6;
      position: relative;
      overflow: hidden;
    }

    #wp-chatbot-system .container {
      max-width: 1240px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    #wp-chatbot-system .flex-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 60px;
      align-items: center;
    }

    #wp-chatbot-system .content-side {
      flex: 1.2;
      min-width: 320px;
    }

    #wp-chatbot-system .visual-side {
      flex: 1;
      min-width: 320px;
    }

    #wp-chatbot-system h2 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(34px, 4.5vw, 42px);
      line-height: 1.2;
      color: var(--secondary);
      margin: 0 0 20px 0;
    }

    #wp-chatbot-system .description {
      font-size: 17px;
      color: var(--text-muted);
      margin-bottom: 25px;
    }

    #wp-chatbot-system .feature-highlights {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-bottom: 35px;
    }

    #wp-chatbot-system .highlight-item {
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 600;
      color: var(--secondary);
    }

    #wp-chatbot-system .highlight-item svg {
      color: var(--primary);
    }

    #wp-chatbot-system .chat-device {
      background: var(--white);
      border-radius: 32px;
      padding: 10px;
      box-shadow: 0 40px 80px -15px rgba(25, 51, 93, 0.15);
      border: 1px solid var(--border);
      max-width: 400px;
      margin: 0 auto;
    }

    #wp-chatbot-system .chat-screen {
      background: #FFFFFF;
      border-radius: 26px;
      height: 600px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      border: 1px solid #F1F5F9;
    }

    #wp-chatbot-system .chat-nav {
      padding: 15px 20px;
      background: var(--secondary);
      color: white;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    #wp-chatbot-system .chat-content {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 12px;
      background: #F9FAFB;
    }

    #wp-chatbot-system .bubble {
      max-width: 85%;
      padding: 12px 16px;
      border-radius: 16px;
      font-size: 13.5px;
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.4s ease;
      line-height: 1.5;
    }

    #wp-chatbot-system .bubble.show {
      opacity: 1;
      transform: translateY(0);
    }

    #wp-chatbot-system .bubble.bot {
      background: var(--white);
      color: var(--text-main);
      align-self: flex-start;
      border: 1px solid var(--border);
      border-bottom-left-radius: 2px;
    }

    #wp-chatbot-system .bubble.user {
      background: var(--primary);
      color: var(--white);
      align-self: flex-end;
      border-bottom-right-radius: 2px;
    }

    #wp-chatbot-system .bot-status {
      display: inline-block;
      margin-top: 6px;
      font-size: 9px;
      font-weight: 700;
      color: var(--primary);
      background: rgba(222, 110, 48, 0.08);
      padding: 2px 8px;
      border-radius: 4px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    #wp-chatbot-system .thinking {
      display: flex;
      gap: 4px;
      padding: 12px 16px;
      background: #f1f1f1;
      width: fit-content;
      border-radius: 16px;
      margin-bottom: 10px;
    }

    #wp-chatbot-system .dot {
      width: 6px;
      height: 6px;
      background: #888;
      border-radius: 50%;
      animation: chatbot-bounce 1.4s infinite ease-in-out;
    }
    #wp-chatbot-system .dot:nth-child(1) { animation-delay: -0.32s; }
    #wp-chatbot-system .dot:nth-child(2) { animation-delay: -0.16s; }

    @keyframes chatbot-bounce {
      0%, 80%, 100% { transform: scale(0); }
      40% { transform: scale(1); }
    }

    #wp-chatbot-system .calendar-card {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 12px;
      margin-top: 5px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    #wp-chatbot-system .cal-title {
      font-size: 11px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 8px;
      color: var(--secondary);
    }

    #wp-chatbot-system .cal-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 5px;
    }

    #wp-chatbot-system .cal-cell {
      aspect-ratio: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      border-radius: 4px;
      background: #F3F4F6;
    }

    #wp-chatbot-system .cal-cell.active {
      background: var(--primary);
      color: white;
      font-weight: bold;
      box-shadow: 0 3px 6px rgba(222, 110, 48, 0.3);
    }

    #wp-chatbot-system .sync-feedback {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-top: 10px;
      padding-top: 10px;
      border-top: 1px dashed #DDD;
    }

    #wp-chatbot-system .sync-item {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 11.5px;
      color: #059669;
      font-weight: 600;
    }

    #wp-chatbot-system .benefit-list {
      margin: 10px 0;
      padding-left: 18px;
      font-size: 12.5px;
      color: var(--text-main);
    }

    #wp-chatbot-system .benefit-list li { margin-bottom: 4px; }

    @media (max-width: 991px) {
      #wp-chatbot-system .flex-wrapper { flex-direction: column; text-align: center; }
      #wp-chatbot-system .feature-highlights { align-items: center; }
    }
</style>
<section id="wp-chatbot-system" aria-labelledby="chatbot-headline">
  <div class="container">
    <div class="flex-wrapper">
      <article class="content-side">
        <h2 id="chatbot-headline"><?php ee_h('bot_h2', 'Chatbot & Live Chat for Admissions'); ?></h2>
        <p class="description">
          <?php ee_h('bot_description', 'Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations. Smart routing directs prospects to the right team members based on their interests and application stage.'); ?>
        </p>

        <div style="font-family:'Poppins'; font-weight:700; color:#19335D; margin-bottom:15px; font-size:14px; letter-spacing:1px; text-transform:uppercase;">Popular Features:</div>
        <div class="feature-highlights">
          <div class="highlight-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <?php ee_h('bot_feat1', 'Automated Chat Workflow'); ?>
          </div>
          <div class="highlight-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <?php ee_h('bot_feat2', 'Live Chat Enablement'); ?>
          </div>
          <div class="highlight-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <?php ee_h('bot_feat3', 'Meeting Scheduler'); ?>
          </div>
        </div>

        <a href="<?php ee_u('bot_cta_url', '#'); ?>" class="btn-primary" style="display:inline-block; background:#DE6E30; color:white; padding:16px 32px; border-radius:12px; text-decoration:none; font-weight:bold; font-family:'Poppins'; transition: 0.3s; box-shadow: 0 10px 20px rgba(222,110,48,0.2);"><?php ee_h('bot_cta_text', 'See Live Demo'); ?></a>
      </article>

      <div class="visual-side">
        <div class="chat-device">
          <div class="chat-screen">
            <div class="chat-nav">
              <div style="background:#DE6E30; width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; box-shadow: 0 4px 8px rgba(222,110,48,0.3);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              </div>
              <div>
                <div style="font-size:14px; font-weight:700;">Admission Assistant</div>
                <div style="font-size:10px; opacity:0.8;">Powered by AI • Active Now</div>
              </div>
            </div>
            <div class="chat-content" id="chat-engine"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    (function() {
      const chatEngine = document.getElementById('chat-engine');
      if (!chatEngine) return;

      const calendarCard = '<div class="calendar-card">' +
          '<div class="cal-title">Choose a Date for Counseling</div>' +
          '<div class="cal-grid">' +
            '<span class="cal-cell">15</span><span class="cal-cell">16</span><span class="cal-cell active">17</span>' +
            '<span class="cal-cell">18</span><span class="cal-cell">19</span><span class="cal-cell">20</span><span class="cal-cell">21</span>' +
          '</div>' +
          '<div style="text-align:center; margin-top:10px; font-size:10px; color:#DE6E30; font-weight:bold;">Student selected 17th May</div>' +
        '</div>';

      const successFeedback = '<div class="sync-feedback">' +
          '<div class="sync-item">✓ Booking Confirmation Email Sent</div>' +
          '<div class="sync-item">✓ WhatsApp Reminder Scheduled</div>' +
          '<div class="sync-item">✓ Meeting Linked to Counselor CRM</div>' +
        '</div>';

      const chatData = [
        { type: 'user', text: "I'm interested in the MBA program. Can I get details?" },
        { type: 'bot', text: "That's a great choice! To assist you better, could you please tell me your last educational qualification?", status: "AI Analyzing Inquiry" },
        { type: 'user', text: "I have completed my Graduation recently." },
        { type: 'bot', text: "Perfect! You are eligible for our MBA program. Here are the key benefits of our University:", status: "Eligibility Verified" },
        { type: 'bot', text: "<ul class='benefit-list'><li>100% Placement Assistance with Top MNCs</li><li>Global Industry Certifications</li><li>Mentorship from Industry Leaders</li></ul>Do these benefits align with your goals?", status: "Course Perks" },
        { type: 'user', text: "Yes, these are exactly what I'm looking for!" },
        { type: 'bot', text: "Wonderful! Let's schedule a 1-on-1 counseling session to discuss your path. Please select a date from the calendar below.", status: "AI Scheduler Triggered" },
        { type: 'bot', text: calendarCard, isHtml: true },
        { type: 'user', text: "I've selected May 17th." },
        { type: 'bot', text: "Your meeting is confirmed for May 17th! " + successFeedback, status: "Integration Success" },
        { type: 'bot', text: "Our admission counselor will reach out to you soon. Have a productive day!", status: "Ready for Handoff" }
      ];

      let currentIndex = 0;

      function showThinking(callback) {
        const thinkingDiv = document.createElement('div');
        thinkingDiv.className = 'thinking';
        thinkingDiv.innerHTML = '<div class="dot"></div><div class="dot"></div><div class="dot"></div>';
        chatEngine.appendChild(thinkingDiv);
        chatEngine.scrollTo({ top: chatEngine.scrollHeight, behavior: 'smooth' });

        setTimeout(function() {
          thinkingDiv.remove();
          callback();
        }, 1200);
      }

      function createBubble(data) {
        const bubble = document.createElement('div');
        bubble.className = 'bubble ' + data.type;

        let content = data.text;
        if (data.status) {
          content += '<br><span class="bot-status">' + data.status + '</span>';
        }

        bubble.innerHTML = content;
        chatEngine.appendChild(bubble);

        setTimeout(function() {
          bubble.classList.add('show');
        }, 10);

        chatEngine.scrollTo({ top: chatEngine.scrollHeight, behavior: 'smooth' });
      }

      function playSimulation() {
        if (currentIndex >= chatData.length) {
          setTimeout(function() {
            chatEngine.innerHTML = '';
            currentIndex = 0;
            playSimulation();
          }, 8000);
          return;
        }

        const data = chatData[currentIndex];

        if (data.type === 'bot') {
          showThinking(function() {
            createBubble(data);
            currentIndex++;
            playSimulation();
          });
        } else {
          setTimeout(function() {
            createBubble(data);
            currentIndex++;
            playSimulation();
          }, 1500);
        }
      }

      const observer = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) {
          playSimulation();
          observer.disconnect();
        }
      }, { threshold: 0.5 });

      observer.observe(document.getElementById('wp-chatbot-system'));
    })();
  </script>
</section>
<!-- END AI Admission Chatbot Section -->

<!-- START Section: Application Management System -->
<style>
    #wp-application-management {
        --primary: #DE6E30;
        --secondary: #19335D;
        --accent: #10B981;
        --bg-body: #F3F4F6;
        --glass: rgba(255, 255, 255, 0.9);
        --transition-speed: 0.5s;

        padding: 120px 5%;
        background: radial-gradient(circle at 10% 20%, #fdfdfd 0%, #f3f4f6 100%);
        font-family: 'Open Sans', sans-serif;
        color: var(--secondary);
        overflow: hidden;
        position: relative;
    }

    #wp-application-management .ams-container { max-width: 1240px; margin: 0 auto; }

    #wp-application-management .ams-layout-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 60px;
        align-items: center;
    }

    #wp-application-management .ams-status-pill {
        display: inline-flex;
        align-items: center;
        background: #fff;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 800;
        color: var(--secondary);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        letter-spacing: 1px;
    }

    #wp-application-management .live-pulse {
        width: 10px; height: 10px; background: var(--accent);
        border-radius: 50%; margin-right: 12px; position: relative;
    }
    #wp-application-management .live-pulse::after {
        content: ''; position: absolute; width: 100%; height: 100%;
        background: var(--accent); border-radius: 50%; animation: ams-pulseRing 2s infinite;
    }

    @keyframes ams-pulseRing {
        0% { transform: scale(1); opacity: 0.8; }
        100% { transform: scale(3.5); opacity: 0; }
    }

    #wp-application-management .ams-headline {
        font-family: 'Poppins', sans-serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        line-height: 1.05;
        margin-bottom: 30px;
        font-weight: 800;
        color: var(--secondary);
    }
    #wp-application-management .ams-headline .highlight { color: var(--primary); }

    #wp-application-management .ams-description p {
        font-size: 1.15rem; line-height: 1.8; color: #4B5563; margin-bottom: 20px;
    }

    #wp-application-management .ams-feature-box {
        background: #fff;
        padding: 30px; border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.04);
        margin: 40px 0; border: 1px solid rgba(0,0,0,0.05);
    }
    #wp-application-management .features-title {
        font-size: 14px; font-weight: 800; color: #9CA3AF;
        letter-spacing: 2px; margin-bottom: 25px;
    }
    #wp-application-management .features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; }
    #wp-application-management .feat-item { display: flex; align-items: flex-start; gap: 15px; }
    #wp-application-management .feat-icon { font-size: 24px; }
    #wp-application-management .feat-text strong { display: block; font-size: 15px; color: var(--secondary); }
    #wp-application-management .feat-text p { font-size: 13px; color: #6B7280; margin: 0; }

    #wp-application-management .ams-action-area { display: flex; align-items: center; gap: 40px; margin-top: 50px; flex-wrap: wrap; }
    #wp-application-management .ams-cta {
        background: var(--primary); color: white; padding: 22px 50px;
        border-radius: 18px; text-decoration: none; font-weight: 800;
        font-size: 1.1rem; transition: all 0.3s ease;
        box-shadow: 0 15px 30px rgba(222, 110, 48, 0.3);
    }
    #wp-application-management .ams-cta:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(222, 110, 48, 0.4); }

    #wp-application-management .ams-stats { display: flex; align-items: center; gap: 25px; }
    #wp-application-management .stat-unit strong { display: block; font-size: 20px; color: var(--secondary); }
    #wp-application-management .stat-unit span { font-size: 13px; color: #6B7280; font-weight: 600; }
    #wp-application-management .stat-divider { width: 1px; height: 30px; background: #E5E7EB; }

    #wp-application-management .ams-visual-area { position: relative; }
    #wp-application-management .ams-live-label {
        position: absolute; top: -30px; right: 0; font-size: 12px;
        font-weight: 800; color: var(--primary); opacity: 0.6;
    }

    #wp-application-management .ams-flow-track { display: flex; flex-direction: column; align-items: center; }

    #wp-application-management .ams-step {
        width: 100%; max-width: 300px;
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        opacity: 0.3; filter: blur(2px); transform: scale(0.9);
    }

    #wp-application-management .ams-card {
        background: var(--glass); backdrop-filter: blur(10px);
        border-radius: 24px; padding: 25px; border: 1px solid rgba(255,255,255,0.4);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: relative;
    }

    #wp-application-management #step-1 { animation: ams-stepGlow 12s infinite 0s; }
    #wp-application-management #step-2 { animation: ams-stepGlow 12s infinite 3s; }
    #wp-application-management #step-3 { animation: ams-stepGlow 12s infinite 6s; }
    #wp-application-management #step-4 { animation: ams-stepGlow 12s infinite 9s; }

    @keyframes ams-stepGlow {
        0%, 20% { opacity: 1; filter: blur(0); transform: scale(1.05); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        25%, 100% { opacity: 0.3; filter: blur(2px); transform: scale(0.9); }
    }

    #wp-application-management .ams-card-tag { font-size: 10px; font-weight: 800; color: var(--primary); margin-bottom: 12px; letter-spacing: 1px; }
    #wp-application-management .ams-card-tag.sec { color: var(--secondary); }
    #wp-application-management .student-id { font-size: 14px; font-weight: 700; color: var(--secondary); margin-bottom: 10px; }
    #wp-application-management .status-badge { display: inline-block; padding: 4px 12px; border-radius: 6px; font-size: 11px; font-weight: 700; }
    #wp-application-management .status-badge.success { background: #DCFCE7; color: #166534; }

    #wp-application-management .ai-glow { border: 2px solid var(--primary); }
    #wp-application-management .ams-ai-header { display: flex; align-items: center; gap: 8px; font-weight: 800; font-size: 12px; color: var(--primary); margin-bottom: 15px; }
    #wp-application-management .ai-status { font-size: 15px; font-weight: 700; margin-bottom: 5px; }
    #wp-application-management .ai-typing { font-size: 12px; color: #6B7280; margin-bottom: 15px; }
    #wp-application-management .scanning-bar { height: 4px; background: #E5E7EB; border-radius: 2px; position: relative; overflow: hidden; }
    #wp-application-management .scanning-bar::after {
        content: ''; position: absolute; left: -50%; width: 50%; height: 100%;
        background: var(--primary); animation: ams-scan 2s infinite;
    }

    @keyframes ams-scan { 0% { left: -50%; } 100% { left: 150%; } }

    #wp-application-management .counseling-info { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
    #wp-application-management .counselor-avatar img { width: 45px; height: 45px; border-radius: 50%; border: 2px solid #fff; }
    #wp-application-management .counseling-text strong { display: block; font-size: 14px; }
    #wp-application-management .counseling-text p { font-size: 11px; margin: 0; color: #6B7280; }
    #wp-application-management .ams-btn-mock { background: var(--secondary); color: white; text-align: center; padding: 10px; border-radius: 10px; font-size: 11px; font-weight: 700; }

    #wp-application-management .final-success { background: var(--secondary); color: white; border: none; }
    #wp-application-management .success-icon-wrap { background: var(--accent); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; }
    #wp-application-management .final-title { text-align: center; font-weight: 800; font-size: 18px; margin-bottom: 10px; }
    #wp-application-management .payment-note { text-align: center; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 10px; }
    #wp-application-management .payment-note span { display: block; font-size: 11px; opacity: 0.7; margin-bottom: 4px; }
    #wp-application-management .payment-note code { font-size: 12px; color: var(--primary); font-weight: 700; }

    #wp-application-management .ams-connector { width: 3px; height: 35px; background: #E5E7EB; margin: 5px 0; overflow: hidden; }
    #wp-application-management .progress-line { width: 100%; height: 0%; background: var(--primary); }

    #wp-application-management .line-1 { animation: ams-lineActive 12s infinite 1.5s; }
    #wp-application-management .line-2 { animation: ams-lineActive 12s infinite 4.5s; }
    #wp-application-management .line-3 { animation: ams-lineActive 12s infinite 7.5s; }

    @keyframes ams-lineActive {
        0% { height: 0%; } 15%, 25% { height: 100%; } 30%, 100% { height: 0%; }
    }

    @media (max-width: 1024px) {
        #wp-application-management .ams-layout-grid { grid-template-columns: 1fr; gap: 80px; }
        #wp-application-management .ams-text-content { text-align: center; }
        #wp-application-management .ams-status-pill, #wp-application-management .ams-action-area, #wp-application-management .ams-stats { justify-content: center; }
        #wp-application-management .features-grid { justify-content: center; text-align: left; }
    }

    @media (max-width: 600px) {
        #wp-application-management .ams-headline { font-size: 2.2rem; }
        #wp-application-management .ams-cta { width: 100%; }
        #wp-application-management .stat-divider { display: none; }
        #wp-application-management .ams-stats { flex-direction: column; gap: 10px; }
        #wp-application-management { padding: 60px 5%; }
    }
</style>
<section id="wp-application-management">
    <div class="ams-container">
        <div class="ams-layout-grid">

            <div class="ams-text-content">
                <div class="ams-status-pill">
                    <span class="live-pulse"></span> <?php ee_h('ams_status', 'SYSTEM STATUS: ACTIVE'); ?>
                </div>
                <h2 class="ams-headline"><?php ee_h('ams_h1_part1', 'Turn Applications into Admissions.'); ?><br><span class="highlight"><?php ee_h('ams_h1_part2', 'On Autopilot.'); ?></span></h2>

                <div class="ams-description">
                    <p><?php ee_h('ams_para1', 'Our Application Management System streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly.'); ?></p>
                    <p><?php ee_h('ams_para2', 'Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage, turning manual tasks into a hands-free, high-conversion workflow.'); ?></p>
                </div>

                <div class="ams-feature-box">
                    <h3 class="features-title">CORE CAPABILITIES</h3>
                    <div class="features-grid">
                        <div class="feat-item">
                            <span class="feat-icon">📋</span>
                            <div class="feat-text">
                                <strong>Form Builder</strong>
                                <p>Custom widgets for any site</p>
                            </div>
                        </div>
                        <div class="feat-item">
                            <span class="feat-icon">🎥</span>
                            <div class="feat-text">
                                <strong>Video GD-PI</strong>
                                <p>Automated counseling calls</p>
                            </div>
                        </div>
                        <div class="feat-item">
                            <span class="feat-icon">💳</span>
                            <div class="feat-text">
                                <strong>Secure Payments</strong>
                                <p>Instant fee reconciliation</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ams-action-area">
                    <a href="<?php ee_u('ams_cta_url', '#get-started'); ?>" class="ams-cta"><?php ee_h('ams_cta_text', 'Start Automating Now'); ?></a>
                    <div class="ams-stats">
                        <div class="stat-unit">
                            <strong>500+</strong>
                            <span>Institutions</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-unit">
                            <strong>1M+</strong>
                            <span>Apps Processed</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ams-visual-area">
                <div class="ams-live-label">LIVE SYSTEM FEED</div>
                <div class="ams-flow-track">

                    <div class="ams-step" id="step-1">
                        <div class="ams-card">
                            <div class="ams-card-tag">NEW SUBMISSION</div>
                            <div class="ams-card-body">
                                <div class="student-id">Student ID: #APP-2024-88</div>
                                <div class="skeleton-line sm"></div>
                                <div class="status-badge success">Application Submitted</div>
                            </div>
                        </div>
                    </div>

                    <div class="ams-connector"><div class="progress-line line-1"></div></div>

                    <div class="ams-step" id="step-2">
                        <div class="ams-card ai-glow">
                            <div class="ams-ai-header">
                                <span class="ai-sparkle">✨</span> AI VERIFICATION
                            </div>
                            <div class="ams-card-body">
                                <div class="ai-status">Instant Verification</div>
                                <div class="ai-typing">AI verifying document authenticity...</div>
                                <div class="scanning-bar"></div>
                            </div>
                        </div>
                    </div>

                    <div class="ams-connector"><div class="progress-line line-2"></div></div>

                    <div class="ams-step" id="step-3">
                        <div class="ams-card">
                            <div class="ams-card-tag sec">GD-PI STAGE</div>
                            <div class="ams-card-body">
                                <div class="counseling-info">
                                    <div class="counselor-avatar">
                                        <img src="<?php ee_u('ams_counselor_img', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=80&h=80'); ?>" alt="Counselor">
                                    </div>
                                    <div class="counseling-text">
                                        <strong>Counseling Scheduled</strong>
                                        <p>Synced with availability</p>
                                    </div>
                                </div>
                                <div class="ams-btn-mock">Join Video Call</div>
                            </div>
                        </div>
                    </div>

                    <div class="ams-connector"><div class="progress-line line-3"></div></div>

                    <div class="ams-step" id="step-4">
                        <div class="ams-card final-success">
                            <div class="ams-card-body">
                                <div class="success-icon-wrap">
                                    <svg viewBox="0 0 24 24" width="30" height="30" stroke="white" stroke-width="3" fill="none"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                <div class="final-title">Admission Confirmed</div>
                                <div class="payment-note">
                                    <span>Payment Secured</span>
                                    <code>TRN_99210-A</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Section: Application Management System -->

<!-- WhatsApp Business API Section -->
<style>
    .wa-story-section {
        --wp-orange: #DE6E30;
        --wp-blue: #19335D;
        --soft-bg: #f8fafc;
        font-family: 'Open Sans', sans-serif;
        background-color: #ffffff;
        background-image: radial-gradient(at 0% 0%, hsla(20, 72%, 92%, 1) 0, transparent 50%),
                          radial-gradient(at 100% 100%, hsla(217, 58%, 95%, 1) 0, transparent 50%);
        overflow: hidden;
        position: relative;
        padding: 120px 0;
    }

    .wa-story-section h2 {
        font-family: 'Poppins', sans-serif;
        color: var(--wp-blue);
        line-height: 1.1;
    }

    .wa-story-section .reveal-box {
        opacity: 0;
        transform: translateY(50px);
        transition: all 1.2s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .wa-story-section.is-active .reveal-box {
        opacity: 1;
        transform: translateY(0);
    }

    .wa-story-section .product-canvas {
        background: #ffffff;
        border-radius: 40px;
        box-shadow: 0 100px 150px -40px rgba(25, 51, 93, 0.2);
        border: 1px solid rgba(25, 51, 93, 0.05);
        height: 720px;
        width: 100%;
        max-width: 520px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
    }

    .wa-story-section .chat-bubble {
        padding: 16px 20px;
        border-radius: 22px;
        margin-bottom: 15px;
        max-width: 85%;
        font-size: 14px;
        line-height: 1.6;
        opacity: 0;
        transform: scale(0.9) translateY(30px);
        transition: 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .wa-story-section .chat-bubble.visible {
        opacity: 1;
        transform: scale(1) translateY(0);
    }

    .wa-story-section .msg-inbound { background: #f1f5f9; align-self: flex-start; color: var(--wp-blue); border-bottom-left-radius: 4px; }
    .wa-story-section .msg-outbound { background: #e0f2fe; align-self: flex-end; color: #0369a1; border-bottom-right-radius: 4px; }

    .wa-story-section .live-indicator {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        background: rgba(34, 197, 94, 0.1);
        color: #16a34a;
        border-radius: 100px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .wa-story-section .live-indicator .live-dot {
        width: 6px;
        height: 6px;
        background: #16a34a;
        border-radius: 50%;
        animation: wa-pulse 1.5s infinite;
    }

    @keyframes wa-pulse {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(2.5); opacity: 0; }
    }

    .wa-story-section .analytics-card {
        position: absolute;
        bottom: 100px;
        left: -40px;
        background: white;
        padding: 24px;
        border-radius: 28px;
        box-shadow: 0 40px 80px rgba(0,0,0,0.12);
        width: 260px;
        z-index: 30;
        border: 1px solid #f1f5f9;
        backdrop-filter: blur(12px);
    }

    .wa-story-section .stat-circle {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .wa-story-section .pop-feature {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 20px;
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        transition: 0.4s;
    }

    .wa-story-section .pop-feature:hover {
        transform: translateX(12px);
        border-color: var(--wp-orange);
        box-shadow: 0 10px 30px rgba(222, 110, 48, 0.08);
    }

    .wa-story-section .pdf-component {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.8);
        border: 1px solid #e2e8f0;
        padding: 12px;
        border-radius: 14px;
        margin-top: 10px;
    }

    @media (max-width: 1024px) {
        .wa-story-section .analytics-card { left: 20px; bottom: 120px; width: 220px; }
        .wa-story-section .product-canvas { height: 600px; }
        .wa-story-section { padding: 60px 0; }
    }
</style>

<section class="wa-story-section" id="wa-storytelling-root" aria-labelledby="wa-heading">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="flex flex-wrap items-center -mx-4">

            <div class="w-full lg:w-5/12 px-4 mb-20 lg:mb-0">
                <div class="reveal-box" style="transition-delay: 0.1s;">
                    <div class="live-indicator mb-6">
                        <span class="live-dot"></span> System Operational
                    </div>

                    <h2 id="wa-heading" class="text-5xl lg:text-7xl font-bold mb-8">
                        <?php ee_h('wa_h2_part1', 'WhatsApp'); ?> <br><span style="color: #DE6E30;"><?php ee_h('wa_h2_part2', 'Business API'); ?></span>
                    </h2>

                    <p class="text-xl text-slate-500 mb-10 leading-relaxed">
                        <?php ee_h('wa_description', 'WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM. Data-driven campaign optimization ensures higher open rates and faster response times for improved enrolment outcomes.'); ?>
                    </p>

                    <div class="space-y-4 mb-12">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Popular Features</p>

                        <div class="pop-feature">
                            <div class="stat-circle bg-blue-50 text-blue-600">01</div>
                            <div>
                                <h4 class="font-bold text-slate-800"><?php ee_h('wa_feat1_title', 'Two-way WhatsApp and live chat'); ?></h4>
                                <p class="text-sm text-slate-500"><?php ee_h('wa_feat1_desc', 'Enable real-time human connection alongside automation.'); ?></p>
                            </div>
                        </div>

                        <div class="pop-feature">
                            <div class="stat-circle bg-orange-50 text-[#DE6E30]">02</div>
                            <div>
                                <h4 class="font-bold text-slate-800"><?php ee_h('wa_feat2_title', 'Bulk WhatsApp & automated campaigns'); ?></h4>
                                <p class="text-sm text-slate-500"><?php ee_h('wa_feat2_desc', 'Scale your outreach without losing the personal touch.'); ?></p>
                            </div>
                        </div>

                        <div class="pop-feature">
                            <div class="stat-circle bg-green-50 text-green-600">03</div>
                            <div>
                                <h4 class="font-bold text-slate-800"><?php ee_h('wa_feat3_title', 'Verified business account'); ?></h4>
                                <p class="text-sm text-slate-500"><?php ee_h('wa_feat3_desc', 'Official green badge to build instant trust with applicants.'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-5">
                        <a href="<?php ee_u('wa_cta1_url', '#'); ?>" class="px-10 py-5 bg-[#19335D] text-white font-bold rounded-2xl hover:shadow-2xl transition-all hover:-translate-y-1"><?php ee_h('wa_cta1_text', 'Start Optimizing Now'); ?></a>
                        <a href="<?php ee_u('wa_cta2_url', '#'); ?>" class="px-10 py-5 border-2 border-slate-200 text-[#19335D] font-bold rounded-2xl hover:bg-slate-50 transition-all"><?php ee_h('wa_cta2_text', 'View Case Studies'); ?></a>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-7/12 px-4">
                <div class="reveal-box" style="transition-delay: 0.4s;">
                    <div class="relative">

                        <div class="analytics-card">
                            <div class="flex justify-between items-center mb-6">
                                <span class="text-xs font-bold text-slate-400">LIVE OPTIMIZATION</span>
                                <div class="text-[10px] bg-green-100 text-green-600 px-2 py-0.5 rounded">+12.4%</div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-xs mb-2"><span>Messages Sent</span> <span class="font-bold text-slate-800" id="live-sent">0</span></div>
                                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-[#DE6E30] transition-all duration-500" id="bar-sent" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs mb-2"><span>Open Rate</span> <span class="font-bold text-[#DE6E30]" id="live-open">0%</span></div>
                                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-[#19335D] transition-all duration-500" id="bar-open" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-canvas">
                            <div class="p-6 border-b bg-white flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#DE6E30] to-orange-400 flex items-center justify-center text-white shadow-lg">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-slate-800 text-sm">Campaign Engine</h5>
                                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Inbound Workflow Active</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <span class="w-2 h-2 rounded-full bg-slate-200"></span>
                                    <span class="w-2 h-2 rounded-full bg-slate-200"></span>
                                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                </div>
                            </div>

                            <div id="automation-flow" class="flex-1 p-8 flex flex-col bg-slate-50/40 overflow-y-auto"></div>

                            <div class="p-6 bg-white border-t">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex gap-2">
                                        <div class="w-2 h-2 rounded-full bg-[#DE6E30] animate-ping"></div>
                                        <span id="ai-status" class="text-xs font-bold text-slate-400 uppercase tracking-tighter">AI Processing Trigger...</span>
                                    </div>
                                    <span class="text-[10px] font-bold text-blue-600">Model: Admission-GPT 4.0</span>
                                </div>
                                <div class="bg-slate-100 rounded-2xl px-6 py-4 flex items-center justify-between">
                                    <span class="text-sm text-slate-400" id="typing-sim">Awaiting next lead...</span>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="2.5"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const section = document.getElementById('wa-storytelling-root');
    if (!section) return;
    const flowContainer = document.getElementById('automation-flow');
    const aiStatus = document.getElementById('ai-status');
    const typingSim = document.getElementById('typing-sim');

    const counters = {
        sent: document.getElementById('live-sent'),
        open: document.getElementById('live-open'),
        barSent: document.getElementById('bar-sent'),
        barOpen: document.getElementById('bar-open')
    };

    let activeScenario = false;

    const dataSequence = [
        { type: 'bot', text: 'Hello Sameer! Thank you for inquiring about our B.Tech program. Have you downloaded the latest fee structure?', delay: 1000 },
        { type: 'user', text: 'Not yet. Can you share it here?', delay: 2000 },
        { type: 'bot', text: 'Sure! Here is the PDF document for your reference.', file: 'Fee_Structure_2024.pdf', delay: 2000 },
        { type: 'user', text: 'This is great. What is the last date to apply?', delay: 3000 },
        { type: 'bot', text: 'The deadline for early-bird applications is June 15th. Would you like me to book a call with an advisor?', delay: 1500 }
    ];

    function createBubble(msg) {
        const bubble = document.createElement('div');
        bubble.className = `chat-bubble ${msg.type === 'bot' ? 'msg-inbound' : 'msg-outbound'}`;

        let html = `<p>${msg.text}</p>`;
        if(msg.file) {
            html += `
                <div class="pdf-component">
                    <div class="w-10 h-10 bg-red-50 text-red-600 rounded-lg flex items-center justify-center font-bold text-[10px]">PDF</div>
                    <div class="flex-1">
                        <div class="text-[11px] font-bold text-slate-800">${msg.file}</div>
                        <div class="text-[9px] text-slate-400">1.8 MB • Verified Document</div>
                    </div>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
                </div>
            `;
        }

        bubble.innerHTML = html;
        flowContainer.appendChild(bubble);

        setTimeout(() => bubble.classList.add('visible'), 50);
        flowContainer.scrollTop = flowContainer.scrollHeight;
    }

    function updateAnalytics(s, o) {
        animateCounter(counters.sent, s);
        animateCounter(counters.open, o, true);
        counters.barSent.style.width = (s / 3000 * 100) + '%';
        counters.barOpen.style.width = o + '%';
    }

    function animateCounter(el, target, isPercent = false) {
        let curr = 0;
        const step = target / 40;
        const intv = setInterval(() => {
            curr += step;
            if(curr >= target) {
                el.innerText = Math.floor(target) + (isPercent ? '%' : '');
                clearInterval(intv);
            } else {
                el.innerText = Math.floor(curr) + (isPercent ? '%' : '');
            }
        }, 25);
    }

    async function triggerAutomation() {
        if (activeScenario) return;
        activeScenario = true;

        flowContainer.innerHTML = '';
        aiStatus.innerText = "Scanning CRM Database...";
        typingSim.innerText = "Identifying high-intent leads...";
        updateAnalytics(0, 0);

        await new Promise(r => setTimeout(r, 2000));

        updateAnalytics(2480, 92);
        aiStatus.innerText = "Lead Detected: Sameer K.";
        typingSim.innerText = "AI generating personalized response...";

        for(let msg of dataSequence) {
            aiStatus.innerText = msg.type === 'bot' ? "AI Optimizing Campaign..." : "Lead Interacting...";
            typingSim.innerText = msg.type === 'bot' ? "Crafting WhatsApp Template..." : "Waiting for reply...";
            await new Promise(r => setTimeout(r, msg.delay));
            createBubble(msg);
        }

        aiStatus.innerText = "Enrolment Goal Achieved ✓";
        typingSim.innerText = "Storing data in Admission CRM...";

        setTimeout(() => {
            activeScenario = false;
            if (isSectionVisible()) triggerAutomation();
        }, 8000);
    }

    function isSectionVisible() {
        const rect = section.getBoundingClientRect();
        return (rect.top < window.innerHeight && rect.bottom > 0);
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                section.classList.add('is-active');
                triggerAutomation();
            }
        });
    }, { threshold: 0.25 });

    observer.observe(section);
});
</script>
<!-- WhatsApp Business API Section END -->

<!-- Mobile CRM Section -->
<style>
#wp-mobile-crm {
  --primary:    #DE6E30;
  --primary-dk: #b85520;
  --primary-gl: rgba(222,110,48,0.15);
  --secondary:  #19335D;
  --sec-light:  #1e3d72;
  --green:      #10B981;
  --accent-bg:  #f0f4f8;
  --white:      #ffffff;
  --text-body:  #475569;
  --border:     #e2e8f0;
  --shadow:     0 20px 60px -15px rgba(25,51,93,0.18);
  --transition: all 0.4s cubic-bezier(0.4,0,0.2,1);

  font-family: 'Open Sans', sans-serif;
  background: var(--white);
  padding: clamp(70px,10vh,120px) 5%;
  position: relative;
  overflow: hidden;
}
#wp-mobile-crm *, #wp-mobile-crm *::before, #wp-mobile-crm *::after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
}

#wp-mobile-crm::before {
  content:'';
  position:absolute; inset:0;
  background-image:
    radial-gradient(ellipse 70% 50% at 85% 15%, rgba(222,110,48,0.06) 0%, transparent 60%),
    radial-gradient(ellipse 50% 40% at 10% 85%, rgba(25,51,93,0.05) 0%, transparent 60%);
  pointer-events:none; z-index:0;
}

#wp-mobile-crm .crm-container {
  max-width: 1240px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1.15fr;
  align-items: center;
  gap: clamp(40px,6vw,90px);
  position: relative;
  z-index: 10;
}

#wp-mobile-crm .crm-text-block { display:flex; flex-direction:column; }

#wp-mobile-crm .crm-badge {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: var(--accent-bg);
  color: var(--primary);
  padding: 7px 18px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  margin-bottom: 20px;
  border: 1px solid rgba(222,110,48,0.2);
  width: fit-content;
}
#wp-mobile-crm .badge-dot {
  width:7px; height:7px; border-radius:50%;
  background:var(--primary);
  animation: mcrm-bdot 1.6s ease-in-out infinite;
}
@keyframes mcrm-bdot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.3;transform:scale(0.6)} }

#wp-mobile-crm h2 {
  font-family: 'Poppins', sans-serif;
  font-size: clamp(2.2rem,4vw,3.6rem);
  font-weight: 800;
  color: var(--secondary);
  line-height: 1.08;
  margin: 0 0 20px;
  letter-spacing: -0.03em;
}
#wp-mobile-crm h2 em {
  font-style: normal;
  color: var(--primary);
  position: relative;
}
#wp-mobile-crm h2 em::after {
  content:'';
  position:absolute;
  bottom:2px; left:0;
  width:100%; height:3px;
  background: linear-gradient(90deg,var(--primary),transparent);
  border-radius:3px; opacity:0.5;
}

#wp-mobile-crm .crm-description {
  font-size: clamp(1rem,1.15vw,1.15rem);
  line-height: 1.78;
  color: var(--text-body);
  margin-bottom: 32px;
}
#wp-mobile-crm .crm-description strong { color:var(--secondary); font-weight:600; }

#wp-mobile-crm .feat-section-label {
  font-size: 11px;
  font-weight: 800;
  letter-spacing: 2.5px;
  text-transform: uppercase;
  color: #94a3b8;
  margin-bottom: 14px;
  display: block;
}
#wp-mobile-crm .feature-grid {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 14px;
  margin-bottom: 36px;
}
#wp-mobile-crm .feature-pill {
  background: var(--white);
  border: 1px solid var(--border);
  padding: 18px 12px 14px;
  border-radius: 16px;
  text-align: center;
  transition: var(--transition);
  box-shadow: 0 4px 10px rgba(0,0,0,0.04);
  cursor: default;
  position: relative;
  overflow: hidden;
}
#wp-mobile-crm .feature-pill::after {
  content:'';
  position:absolute; bottom:0; left:0;
  width:100%; height:3px;
  background:var(--primary);
  transform:scaleX(0);
  transition:transform 0.3s ease;
  border-radius:0 0 3px 3px;
}
#wp-mobile-crm .feature-pill:hover {
  border-color: rgba(222,110,48,0.35);
  transform: translateY(-6px);
  box-shadow: 0 14px 28px rgba(222,110,48,0.12);
}
#wp-mobile-crm .feature-pill:hover::after { transform:scaleX(1); }
#wp-mobile-crm .pill-icon {
  width:44px; height:44px;
  border-radius:12px;
  background:var(--accent-bg);
  display:flex; align-items:center; justify-content:center;
  margin:0 auto 10px;
  font-size:20px;
  transition:transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
}
#wp-mobile-crm .feature-pill:hover .pill-icon { transform:scale(1.2) rotate(-8deg); }
#wp-mobile-crm .feature-pill span {
  display:block;
  font-weight:700;
  font-size:0.82rem;
  color:var(--secondary);
  line-height:1.3;
}

#wp-mobile-crm .crm-sync-note {
  display:flex;
  align-items:flex-start;
  gap:12px;
  background:linear-gradient(135deg,rgba(16,185,129,0.06),rgba(16,185,129,0.02));
  border:1px solid rgba(16,185,129,0.22);
  border-left:4px solid var(--green);
  border-radius:0 12px 12px 0;
  padding:16px 18px;
  font-size:14px;
  color:var(--text-body);
  line-height:1.65;
}
#wp-mobile-crm .note-icon {
  width:30px; height:30px;
  border-radius:50%;
  background:rgba(16,185,129,0.1);
  display:flex; align-items:center; justify-content:center;
  flex-shrink:0;
}

#wp-mobile-crm .crm-visual-engine {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 680px;
}

#wp-mobile-crm .phone-glow {
  position:absolute;
  width:360px; height:360px;
  border-radius:50%;
  background:radial-gradient(circle, rgba(222,110,48,0.16) 0%, transparent 70%);
  top:50%; left:50%;
  transform:translate(-50%,-50%);
  pointer-events:none;
  animation:mcrm-glow-pulse 4s ease-in-out infinite;
}
@keyframes mcrm-glow-pulse {
  0%,100%{transform:translate(-50%,-50%) scale(1); opacity:1;}
  50%    {transform:translate(-50%,-50%) scale(1.12); opacity:0.6;}
}

#wp-mobile-crm .phone-device {
  width: 300px;
  height: 620px;
  background: linear-gradient(160deg,#1c2d44,#0d1b2e);
  border-radius: 50px;
  padding: 10px;
  box-shadow: var(--shadow), inset 0 0 0 1px rgba(255,255,255,0.07);
  position: relative;
  z-index: 10;
  flex-shrink: 0;
}
#wp-mobile-crm .phone-device::before {
  content:'';
  position:absolute;
  right:-4px; top:110px;
  width:4px; height:56px;
  background:#1a2535; border-radius:0 4px 4px 0;
}
#wp-mobile-crm .phone-device::after {
  content:'';
  position:absolute;
  left:-4px; top:90px;
  width:4px; height:36px;
  background:#1a2535; border-radius:4px 0 0 4px;
  box-shadow:0 50px 0 #1a2535;
}

#wp-mobile-crm .phone-notch {
  position:absolute;
  top:10px; left:50%;
  transform:translateX(-50%);
  width:88px; height:24px;
  background:#0d1b2e;
  border-radius:0 0 16px 16px;
  z-index:30;
  display:flex; align-items:center; justify-content:center; gap:6px;
}
#wp-mobile-crm .notch-dot { width:9px; height:9px; border-radius:50%; background:#1a2535; }
#wp-mobile-crm .notch-bar { width:32px; height:4px; border-radius:3px; background:#1a2535; }

#wp-mobile-crm .phone-screen {
  width:100%; height:100%;
  border-radius:41px;
  overflow:hidden;
  position:relative;
  display:flex;
  flex-direction:column;
  background:#0d1522;
}

#wp-mobile-crm .phone-map-bg {
  position:absolute;
  inset:0;
  z-index:1;
  overflow:hidden;
}
#wp-mobile-crm .phone-map-bg iframe {
  width:100%;
  height:100%;
  border:none;
  transform:scale(1.12);
  transform-origin:center center;
  pointer-events:none;
  display:block;
  opacity:0.88;
}
#wp-mobile-crm .map-overlay-grad {
  position:absolute;
  inset:0; z-index:2;
  background:
    linear-gradient(to bottom, rgba(13,27,46,0.72) 0%, rgba(13,27,46,0.15) 40%, rgba(13,27,46,0.15) 60%, rgba(13,27,46,0.75) 100%);
  pointer-events:none;
}

#wp-mobile-crm .app-statusbar {
  position:relative; z-index:5;
  padding:32px 16px 0;
  display:flex; justify-content:space-between; align-items:center;
  color:rgba(255,255,255,0.8);
  font-size:10px; font-weight:700;
}
#wp-mobile-crm .sig-bars { display:flex; gap:2px; align-items:flex-end; }
#wp-mobile-crm .sig-bars span { width:3px; background:rgba(255,255,255,0.7); border-radius:1px; }

#wp-mobile-crm .app-header {
  position:relative; z-index:5;
  padding:10px 16px 14px;
  display:flex; align-items:center; justify-content:space-between;
}
#wp-mobile-crm .app-user-row { display:flex; align-items:center; gap:9px; }
#wp-mobile-crm .app-avatar {
  width:34px; height:34px; border-radius:50%;
  background:linear-gradient(135deg,var(--primary),#f59e0b);
  border:2.5px solid var(--green);
  color:#fff; font-weight:800; font-size:13px;
  display:flex; align-items:center; justify-content:center;
}
#wp-mobile-crm .app-name { color:#fff; font-weight:700; font-size:12px; }
#wp-mobile-crm .app-status-row {
  display:flex; align-items:center; gap:4px;
  font-size:9px; color:rgba(255,255,255,0.65);
}
#wp-mobile-crm .live-dot { width:6px; height:6px; border-radius:50%; background:var(--green); animation:mcrm-blink 1.3s infinite; }
@keyframes mcrm-blink {0%,100%{opacity:1}50%{opacity:0.2}}
#wp-mobile-crm .live-chip {
  background:rgba(16,185,129,0.2);
  border:1px solid rgba(16,185,129,0.45);
  color:var(--green);
  padding:4px 10px; border-radius:100px;
  font-size:9px; font-weight:800; letter-spacing:0.8px;
  display:flex; align-items:center; gap:4px;
}

#wp-mobile-crm .gps-pin-wrap {
  position:absolute;
  z-index:6;
  top:42%; left:50%;
  transform:translate(-50%,-50%);
  pointer-events:none;
}
#wp-mobile-crm .gps-core {
  width:18px; height:18px;
  background:var(--primary);
  border:3px solid #fff;
  border-radius:50%;
  box-shadow:0 0 0 0 var(--primary-gl);
  animation:mcrm-gps-ping 2.1s infinite;
}
@keyframes mcrm-gps-ping {
  0%  {box-shadow:0 0 0 0 rgba(222,110,48,0.55);}
  70% {box-shadow:0 0 0 24px rgba(222,110,48,0);}
  100%{box-shadow:0 0 0 0 rgba(222,110,48,0);}
}

#wp-mobile-crm .map-badge {
  position:absolute; z-index:7;
  background:rgba(255,255,255,0.92);
  backdrop-filter:blur(10px);
  border-radius:9px; padding:5px 10px;
  font-size:9px; font-weight:700; color:var(--secondary);
  display:flex; align-items:center; gap:4px;
  border:1px solid rgba(0,0,0,0.06);
}
#wp-mobile-crm .mb-bl { bottom:32%; left:10px; }
#wp-mobile-crm .mb-tr { top:20%; right:10px; background:var(--secondary); color:#fff; }

#wp-mobile-crm .phone-bottom-panel {
  position:absolute;
  bottom:0; left:0; right:0;
  z-index:8;
  padding:0 10px 10px;
}
#wp-mobile-crm .panel-inner {
  background:rgba(13,27,46,0.82);
  backdrop-filter:blur(16px);
  border-radius:20px;
  padding:12px;
  border:1px solid rgba(255,255,255,0.1);
}
#wp-mobile-crm .panel-header {
  display:flex; align-items:center; justify-content:space-between;
  margin-bottom:10px;
}
#wp-mobile-crm .panel-title {
  font-size:9px; font-weight:800; letter-spacing:1.5px;
  text-transform:uppercase; color:rgba(255,255,255,0.55);
}
#wp-mobile-crm .panel-sync {
  display:flex; align-items:center; gap:5px;
  font-size:8px; font-weight:700; color:var(--green);
  letter-spacing:0.5px;
}
#wp-mobile-crm .spin {
  width:11px; height:11px;
  border:2px solid rgba(16,185,129,0.25);
  border-top-color:var(--green);
  border-radius:50%;
  animation:mcrm-spin 1.1s linear infinite;
}
@keyframes mcrm-spin{to{transform:rotate(360deg)}}
#wp-mobile-crm .feed-list {
  display:flex; flex-direction:column; gap:7px;
  min-height:80px;
}
#wp-mobile-crm .feed-item {
  display:flex; align-items:center; gap:8px;
  background:rgba(255,255,255,0.07);
  border-radius:11px; padding:8px 10px;
  border-left:3px solid var(--primary);
  animation:mcrm-feedIn 0.5s cubic-bezier(0.34,1.56,0.64,1) both;
}
@keyframes mcrm-feedIn {
  from{opacity:0;transform:translateX(16px);}
  to  {opacity:1;transform:translateX(0);}
}
#wp-mobile-crm .feed-emoji { font-size:14px; flex-shrink:0; }
#wp-mobile-crm .feed-strong { display:block; font-size:9.5px; font-weight:700; color:#fff; line-height:1.3; }
#wp-mobile-crm .feed-sub    { font-size:8.5px; color:rgba(255,255,255,0.5); }

#wp-mobile-crm .v-card {
  position:absolute;
  background:var(--white);
  padding:14px;
  border-radius:16px;
  box-shadow:0 16px 40px rgba(0,0,0,0.12);
  width:200px; z-index:20;
  opacity:0;
  transform:scale(0.88) translateY(16px);
  transition:all 0.65s cubic-bezier(0.34,1.56,0.64,1);
  border:1px solid #f1f5f9;
}
#wp-mobile-crm .v-card.active { opacity:1; transform:scale(1) translateY(0); }
#wp-mobile-crm .v-card-1 { top:4%;  left:-20px; }
#wp-mobile-crm .v-card-2 { top:28%; right:-20px; }
#wp-mobile-crm .v-card-3 { bottom:30%; left:-20px; }
#wp-mobile-crm .v-card-4 { bottom:6%; right:-20px; }
@media(min-width:1100px) {
  #wp-mobile-crm .v-card-1 { left:-60px; }
  #wp-mobile-crm .v-card-2 { right:-60px; }
  #wp-mobile-crm .v-card-3 { left:-60px; }
  #wp-mobile-crm .v-card-4 { right:-60px; }
}
#wp-mobile-crm .v-icon {
  width:32px; height:32px;
  background:var(--accent-bg); border-radius:8px;
  display:flex; align-items:center; justify-content:center;
  margin-bottom:10px; font-size:18px;
}
#wp-mobile-crm .v-title { font-weight:700; font-size:0.88rem; color:var(--secondary); margin-bottom:3px; }
#wp-mobile-crm .v-meta  { font-size:0.75rem; color:var(--text-body); }
#wp-mobile-crm .sync-bar  { width:100%; height:4px; background:var(--border); border-radius:2px; margin-top:9px; overflow:hidden; }
#wp-mobile-crm .sync-prog { height:100%; width:0%; background:var(--primary); transition:width 1.5s ease; }
#wp-mobile-crm .active .sync-prog { width:100%; }
#wp-mobile-crm .v-connector {
  position:absolute;
  width:10px; height:10px;
  border-radius:50%;
  background:var(--primary);
  opacity:0;
  transition:opacity 0.4s ease 0.4s;
  z-index:6;
}
#wp-mobile-crm .v-card.active .v-connector { opacity:1; }
#wp-mobile-crm .v-card-1 .v-connector { bottom:-5px; right:20px; }
#wp-mobile-crm .v-card-2 .v-connector { bottom:-5px; left:20px; }
#wp-mobile-crm .v-card-3 .v-connector { top:-5px; right:20px; }
#wp-mobile-crm .v-card-4 .v-connector { top:-5px; left:20px; }

#wp-mobile-crm .flow-svg {
  position:absolute; top:0; left:0;
  width:100%; height:100%; z-index:9;
  pointer-events:none;
}
#wp-mobile-crm .path-line   { fill:none; stroke:#cbd5e1; stroke-width:1.5; stroke-dasharray:6 4; }
#wp-mobile-crm .path-active { fill:none; stroke:var(--primary); stroke-width:2.5; stroke-dasharray:1000; stroke-dashoffset:1000; transition:stroke-dashoffset 2s linear; }

@media(max-width:1100px) {
  #wp-mobile-crm .crm-container { grid-template-columns:1fr; gap:60px; text-align:center; }
  #wp-mobile-crm .crm-text-block { align-items:center; display:flex; flex-direction:column; }
  #wp-mobile-crm .crm-description, #wp-mobile-crm .crm-sync-note { text-align:left; }
  #wp-mobile-crm .crm-visual-engine { height:700px; width:100%; }
  #wp-mobile-crm .v-card-1, #wp-mobile-crm .v-card-3 { left:0; }
  #wp-mobile-crm .v-card-2, #wp-mobile-crm .v-card-4 { right:0; }
}
@media(max-width:700px) {
  #wp-mobile-crm { padding:60px 20px; }
  #wp-mobile-crm .feature-grid { grid-template-columns:1fr 1fr; }
  #wp-mobile-crm .feature-grid .feature-pill:last-child { grid-column:1/-1; }
  #wp-mobile-crm .crm-visual-engine { height:640px; }
  #wp-mobile-crm .phone-device { width:270px; height:570px; }
  #wp-mobile-crm .v-card { width:155px; font-size:0.82rem; padding:11px; }
  #wp-mobile-crm .v-card-1 { top:2%; left:-5px; }
  #wp-mobile-crm .v-card-2 { top:22%; right:-5px; }
  #wp-mobile-crm .v-card-3 { bottom:28%; left:-5px; }
  #wp-mobile-crm .v-card-4 { bottom:4%; right:-5px; }
}
@media(max-width:400px) {
  #wp-mobile-crm .phone-device { width:250px; height:540px; }
  #wp-mobile-crm .v-card { display:none; }
}
</style>

<section id="wp-mobile-crm" aria-labelledby="mcrm-heading">

  <div class="crm-container">

    <article class="crm-text-block">

      <div class="crm-badge">
        <span class="badge-dot" aria-hidden="true"></span>
        <?php ee_h('mcrm_badge', 'Next-Gen Mobility'); ?>
      </div>

      <h2 id="mcrm-heading">
        <?php ee_h('mcrm_h2_p1', 'Mobile CRM: Powering'); ?><br>
        <em><?php ee_h('mcrm_h2_em', 'Productivity'); ?></em> <?php ee_h('mcrm_h2_p2', 'on the Go'); ?>
      </h2>

      <p class="crm-description">
        <?php ee_h('mcrm_description', 'Our Mobile CRM empowers work-from-home and field counselors to stay productive anywhere. Monitor visits, log activities, and complete follow-ups with real-time sync to your Admission CRM for intelligent, unified reporting.'); ?>
      </p>

      <span class="feat-section-label">Popular Features</span>
      <div class="feature-grid" role="list">
        <div class="feature-pill" role="listitem" tabindex="0">
          <div class="pill-icon" aria-hidden="true">📞</div>
          <span><?php ee_h('mcrm_feat1', 'Click-To-Call'); ?></span>
        </div>
        <div class="feature-pill" role="listitem" tabindex="0">
          <div class="pill-icon" aria-hidden="true">📍</div>
          <span><?php ee_h('mcrm_feat2', 'Field Tracker'); ?></span>
        </div>
        <div class="feature-pill" role="listitem" tabindex="0">
          <div class="pill-icon" aria-hidden="true">📵</div>
          <span><?php ee_h('mcrm_feat3', 'Missed Call Lead Capture'); ?></span>
        </div>
      </div>

      <div class="crm-sync-note" role="note">
        <div class="note-icon" aria-hidden="true">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
        </div>
        <span><?php ee_h('mcrm_note', 'Real-time sync with your Admission CRM ensures every interaction is captured for intelligent, unified reporting — zero data loss, always.'); ?></span>
      </div>

    </article>

    <div class="crm-visual-engine" id="visualizer-trigger" role="img" aria-label="Mobile CRM app with live GPS map showing field counselor tracking">

      <div class="phone-glow" aria-hidden="true"></div>

      <svg class="flow-svg" aria-hidden="true">
        <path class="path-line"   d="M80,60   C160,60  200,140 280,170 S420,300 140,380 S260,530 400,550"/>
        <path class="path-active" id="active-path"
                                  d="M80,60   C160,60  200,140 280,170 S420,300 140,380 S260,530 400,550"/>
      </svg>

      <div class="phone-device">
        <div class="phone-notch" aria-hidden="true">
          <div class="notch-dot"></div>
          <div class="notch-bar"></div>
        </div>

        <div class="phone-screen">

          <div class="phone-map-bg" aria-hidden="true">
            <iframe
              src="https://www.openstreetmap.org/export/embed.html?bbox=73.8197%2C18.5003%2C73.8697%2C18.5303&layer=mapnik&marker=18.5153%2C73.8447"
              loading="lazy"
              title="Live GPS Field Tracking Map — Pune, Maharashtra"
              tabindex="-1"
            ></iframe>
            <div class="map-overlay-grad"></div>
          </div>

          <div class="gps-pin-wrap" aria-hidden="true">
            <div class="gps-core"></div>
          </div>

          <div class="map-badge mb-bl" aria-hidden="true">
            <span class="live-dot"></span> GPS Active · Pune
          </div>
          <div class="map-badge mb-tr" aria-hidden="true">±5m</div>

          <div class="app-statusbar" aria-hidden="true">
            <span style="font-weight:800;">9:41</span>
            <div style="display:flex;gap:5px;align-items:center;">
              <div class="sig-bars">
                <span style="height:4px;"></span>
                <span style="height:7px;"></span>
                <span style="height:10px;"></span>
                <span style="height:12px;"></span>
              </div>
              <svg width="12" height="10" viewBox="0 0 24 24" fill="rgba(255,255,255,0.75)"><path d="M1 6l11 5L23 6 12 1z"/></svg>
              <svg width="14" height="10" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.75)" stroke-width="2.2"><rect x="2" y="7" width="18" height="11" rx="2"/><path d="M22 11h1.5v4H22"/></svg>
            </div>
          </div>
          <div class="app-header" aria-hidden="true">
            <div class="app-user-row">
              <div class="app-avatar">A</div>
              <div>
                <div class="app-name">Field Counselor</div>
                <div class="app-status-row"><span class="live-dot"></span> Tracking On</div>
              </div>
            </div>
            <div class="live-chip">
              <span class="live-dot"></span> LIVE
            </div>
          </div>

          <div class="phone-bottom-panel" aria-live="polite" aria-label="Live activity feed">
            <div class="panel-inner">
              <div class="panel-header">
                <span class="panel-title">Live Operations</span>
                <span class="panel-sync">
                  <span class="spin"></span> Syncing CRM
                </span>
              </div>
              <div class="feed-list" id="phone-feed"></div>
            </div>
          </div>

        </div>
      </div>

      <div class="v-card v-card-1" id="v-step-1">
        <div class="v-connector"></div>
        <div class="v-icon">📞</div>
        <div class="v-title">Missed Call Detected</div>
        <div class="v-meta">Instant Lead Generation</div>
      </div>

      <div class="v-card v-card-2" id="v-step-2">
        <div class="v-connector"></div>
        <div class="v-icon">⚡</div>
        <div class="v-title">Click-To-Call</div>
        <div class="v-meta">Counselor connected</div>
      </div>

      <div class="v-card v-card-3" id="v-step-3">
        <div class="v-connector"></div>
        <div class="v-icon">📍</div>
        <div class="v-title">Field Visit Logged</div>
        <div class="v-meta">GPS Verified Activity</div>
      </div>

      <div class="v-card v-card-4" id="v-step-4">
        <div class="v-connector"></div>
        <div class="v-icon">☁️</div>
        <div class="v-title">Real-time Sync</div>
        <div class="v-meta">Admission CRM Updated</div>
        <div class="sync-bar"><div class="sync-prog"></div></div>
      </div>

    </div>

  </div>
</section>

<script>
(function () {
  'use strict';

  var cards = [
    document.getElementById('v-step-1'),
    document.getElementById('v-step-2'),
    document.getElementById('v-step-3'),
    document.getElementById('v-step-4')
  ];
  if (!cards[0]) return;
  var path      = document.getElementById('active-path');
  var isPlaying = false;

  function animateFlow() {
    if (isPlaying) return;
    isPlaying = true;
    cards.forEach(function(c){ c.classList.remove('active'); });
    path.style.strokeDashoffset = '1000';
    var delay = 0;
    cards.forEach(function(card, i) {
      setTimeout(function() {
        card.classList.add('active');
        path.style.strokeDashoffset = String(1000 - (i + 1) * 250);
      }, delay);
      delay += 1800;
    });
    setTimeout(function() { isPlaying = false; animateFlow(); }, delay + 2800);
  }

  var flowObs = new IntersectionObserver(function(entries) {
    if (entries[0].isIntersecting) animateFlow();
  }, { threshold: 0.25 });
  flowObs.observe(document.getElementById('visualizer-trigger'));

  var feedEl = document.getElementById('phone-feed');
  var events = [
    { e:'📞', t:'New lead: Missed call auto-captured',  s:'Just now',                c:'#DE6E30' },
    { e:'📍', t:'Check-in: Pune University Campus',     s:'GPS verified · Kothrud',  c:'#19335D' },
    { e:'✅', t:'Activity: Document pickup logged',     s:'Amit V. confirmed',        c:'#10B981' },
    { e:'💬', t:'WhatsApp follow-up automated',         s:'+91 91234 5XXXX',          c:'#19335D' },
    { e:'☁️', t:'CRM Sync: 8 entries pushed',           s:'Admission CRM updated',   c:'#DE6E30' },
    { e:'📵', t:'Missed call → lead in 2 sec',          s:'Auto-assigned to Rahul',  c:'#b85520' },
  ];
  var idx = 0;

  function addFeedItem() {
    var e = events[idx % events.length]; idx++;
    var items = feedEl.querySelectorAll('.feed-item');
    if (items.length >= 2) items[0].remove();
    var d = document.createElement('div');
    d.className = 'feed-item';
    d.style.borderLeftColor = e.c;
    d.setAttribute('role', 'listitem');
    d.innerHTML =
      '<span class="feed-emoji" aria-hidden="true">' + e.e + '</span>' +
      '<div><strong class="feed-strong">' + e.t + '</strong>' +
      '<span class="feed-sub">' + e.s + '</span></div>';
    feedEl.appendChild(d);
  }

  var feedObs = new IntersectionObserver(function(entries) {
    if (entries[0].isIntersecting) {
      addFeedItem();
      setInterval(addFeedItem, 2900);
      feedObs.disconnect();
    }
  }, { threshold: 0.1 });
  feedObs.observe(document.getElementById('visualizer-trigger'));

})();
</script>
<!-- Mobile CRM Section END -->

<!-- START Why Institutes Choose ExtraaEdge Section -->
<style>
    #extraaedge-architect-section { font-family: 'Open Sans', sans-serif; }
    #extraaedge-architect-section .font-poppins { font-family: 'Poppins', sans-serif; }
    #extraaedge-architect-section [x-cloak] { display: none !important; }
    #extraaedge-architect-section .custom-scroll::-webkit-scrollbar { width: 3px; }
    #extraaedge-architect-section .custom-scroll::-webkit-scrollbar-thumb { background: #DE6E30; border-radius: 10px; }

    @keyframes arch-pulse-slow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.1; transform: scale(1.1); }
    }
    #extraaedge-architect-section .animate-pulse-slow { animation: arch-pulse-slow 8s infinite; }

    #extraaedge-architect-section .slide-in-right {
        animation: archSlideIn 0.4s ease-out forwards;
    }
    @keyframes archSlideIn {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }
</style>
<section
    id="extraaedge-architect-section"
    x-data="{
        activeStep: 0,
        isHovered: false,
        stats: { response: 0, conversion: 0, enroll: 0, effort: 0 },
        steps: [
            { t: 'One Unified Admission Cloud', d: 'Run the entire enrollment journey from inquiry to enrollment without fragmented tools or manual follow-ups.', items: ['Ads Integration', 'ERP Sync', 'Website Tracking'] },
            { t: '24/7 AI Admission Assistance', d: 'Handles student queries across web and WhatsApp instantly, providing counselors with full context for smarter responses.', items: ['WhatsApp API', 'Web Chatbot', 'Counselor Handover'] },
            { t: 'AI Calling & Intelligent Agents', d: 'Qualify and engage high-intent prospects at scale. Grow your outcomes without growing your headcount.', items: ['Automated Qualification', 'Intent Scoring', 'Smart Routing'] },
            { t: 'Real-Time Intent Intelligence', d: 'Surface bottlenecks and counselor performance in real-time so your team can act early and convert better.', items: ['Performance Audit', 'Bottleneck Alerts', 'Live Funnel'] },
            { t: 'Built to Adapt & Scale', d: 'Integrates seamlessly with ads, websites, ERP, and communication tools. Scales with your institute\'s growth.', items: ['Custom Workflows', 'API Ecosystem', 'Global Scaling'] }
        ],
        initStats() {
            let start = null;
            const duration = 2000;
            const animate = (timestamp) => {
                if (!start) start = timestamp;
                const progress = Math.min((timestamp - start) / duration, 1);
                this.stats.response = Math.floor(progress * 92);
                this.stats.conversion = Math.floor(progress * 48);
                this.stats.enroll = Math.floor(progress * 2450);
                this.stats.effort = Math.floor(progress * 100);
                if (progress < 1) window.requestAnimationFrame(animate);
            };
            window.requestAnimationFrame(animate);
        }
    }"
    x-init="
        const observer = new IntersectionObserver((entries) => {
            if(entries[0].isIntersecting) {
                initStats();
                observer.disconnect();
            }
        }, { threshold: 0.1 });
        observer.observe($el);

        setInterval(() => {
            if(!isHovered) {
                activeStep = (activeStep + 1) % steps.length;
            }
        }, 5000);
    "
    @mouseenter="isHovered = true"
    @mouseleave="isHovered = false"
    class="relative overflow-hidden bg-white selection:bg-accent/20"
    style="margin-top: 10px; margin-bottom: 10px; padding: 60px 0;"
>

    <!-- Background Decor -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-accent/5 rounded-full blur-[100px] animate-pulse-slow"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[500px] h-[500px] bg-primary/5 rounded-full blur-[100px] animate-pulse-slow"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#19335D 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center max-w-4xl mx-auto mb-16">
            <span class="text-accent font-bold text-sm tracking-[0.2em] uppercase mb-4 block"><?php ee_h('arch_eyebrow', 'Admission Ecosystem'); ?></span>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold text-primary leading-tight mb-6 font-poppins">
                <?php ee_h('arch_h2_p1', 'Why Institutes Choose ExtraaEdge as the'); ?> <span class="text-accent relative inline-block">
                    <?php ee_h('arch_h2_em', 'Architect'); ?>
                    <svg class="absolute -bottom-2 left-0 w-full h-2 text-accent/30" viewBox="0 0 100 10" preserveAspectRatio="none">
                        <path d="M0 5 Q 25 0 50 5 T 100 5" fill="none" stroke="currentColor" stroke-width="4"></path>
                    </svg>
                </span> <?php ee_h('arch_h2_p2', 'of Their Admission Process?'); ?>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                <?php ee_h('arch_subtext', 'Most Admission CRMs help you manage admissions. ExtraaEdge helps you design how admissions should work—end to end, at scale.'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-20">

            <div class="lg:col-span-5 space-y-4">
                <template x-for="(step, index) in steps" :key="index">
                    <button
                        @click="activeStep = index"
                        :class="activeStep === index ? 'bg-white border-accent shadow-2xl scale-[1.02] opacity-100' : 'bg-transparent border-transparent opacity-60 hover:opacity-100'"
                        class="w-full text-left p-6 rounded-2xl transition-all duration-300 border-2 relative overflow-hidden group"
                    >
                        <div class="flex items-start gap-4 relative z-10">
                            <div
                                :class="activeStep === index ? 'bg-accent text-white' : 'bg-gray-100 text-primary'"
                                class="p-3 rounded-xl transition-colors"
                            >
                                <svg x-show="index === 0" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                <svg x-show="index === 1" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                <svg x-show="index === 2" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <svg x-show="index === 3" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                <svg x-show="index === 4" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            </div>
                            <div>
                                <h3
                                    :class="activeStep === index ? 'text-primary' : 'text-gray-500'"
                                    class="font-bold text-lg mb-1 transition-colors"
                                    x-text="step.t"
                                ></h3>
                                <div x-show="activeStep === index" x-collapse.duration.300ms>
                                    <p class="text-sm text-gray-600 leading-relaxed" x-text="step.d"></p>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <template x-for="item in step.items">
                                            <span class="text-[10px] font-bold py-1 px-2 rounded bg-gray-100 text-primary/70 uppercase tracking-wider" x-text="item"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </template>
            </div>

            <div class="lg:col-span-7 lg:sticky lg:top-24 h-[550px] flex items-center justify-center">
                <div class="relative w-full max-w-[500px] h-full bg-white rounded-[40px] shadow-[0_50px_100px_-20px_rgba(25,51,93,0.15)] border-8 border-gray-100 p-8 overflow-hidden">

                    <div class="flex items-center justify-between mb-8">
                        <div class="flex gap-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-accent"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-gray-200"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-gray-200"></div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">ExtraaEdge Cloud Live</span>
                        </div>
                    </div>

                    <div class="h-full relative">
                        <div x-show="activeStep === 0" class="slide-in-right space-y-4">
                            <h4 class="text-xs font-bold text-gray-400 uppercase">Unified Inquiry Feed</h4>
                            <div class="p-3 bg-gray-50 rounded-xl flex items-center justify-between border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-[10px] font-bold">JD</div>
                                    <div><p class="text-xs font-bold text-primary">Source: Facebook Ads</p><p class="text-[10px] text-gray-400">Campus: Mumbai South</p></div>
                                </div>
                                <span class="text-[10px] font-bold text-accent">SYNCED</span>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-xl flex items-center justify-between border border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-[10px] font-bold">AM</div>
                                    <div><p class="text-xs font-bold text-primary">Source: WhatsApp</p><p class="text-[10px] text-gray-400">Status: Hot Lead</p></div>
                                </div>
                                <span class="text-[10px] font-bold text-accent">SYNCED</span>
                            </div>
                        </div>

                        <div x-show="activeStep === 1" class="slide-in-right bg-gray-50 rounded-2xl p-4 h-64 flex flex-col justify-end gap-3 border border-gray-100">
                            <div class="bg-white p-3 rounded-2xl rounded-bl-none text-[11px] shadow-sm max-w-[80%]">
                                Student: "Is there a hostel facility?"
                            </div>
                            <div class="bg-primary text-white p-3 rounded-2xl rounded-br-none text-[11px] shadow-lg self-end max-w-[80%]">
                                AI: "Yes, we have 4 hostel blocks with 24/7 security. Sending brochure to your WhatsApp..."
                            </div>
                        </div>

                        <div x-show="activeStep === 2" class="slide-in-right flex flex-col items-center justify-center py-10 text-center">
                            <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                            </div>
                            <h5 class="mt-6 font-bold text-primary">AI Calling & Routing</h5>
                            <p class="text-[10px] text-gray-500 uppercase mt-1">Qualification Agent Active</p>
                        </div>

                        <div x-show="activeStep === 3" class="slide-in-right space-y-6">
                            <div class="p-4 bg-primary rounded-2xl text-white">
                                <p class="text-[10px] opacity-70 uppercase mb-1">Intent Score</p>
                                <p class="text-2xl font-bold">94% High Conversion Chance</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                                    <p class="text-[10px] text-gray-400 mb-1">Counsellor KRA</p>
                                    <p class="text-xs font-bold text-primary">Top Performer</p>
                                </div>
                                <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                                    <p class="text-[10px] text-gray-400 mb-1">Lead Health</p>
                                    <p class="text-xs font-bold text-green-500">Positive</p>
                                </div>
                            </div>
                        </div>

                        <div x-show="activeStep === 4" class="slide-in-right text-center py-10">
                            <div class="w-16 h-16 bg-green-500 rounded-full mx-auto flex items-center justify-center text-white text-2xl font-bold">✓</div>
                            <h5 class="mt-6 font-bold text-primary text-lg">Scalable Journey</h5>
                            <p class="text-xs text-gray-500 mt-2">Process scales automatically as lead volume increases.</p>
                        </div>
                    </div>

                    <div class="absolute -top-4 -right-4 bg-accent text-white p-4 rounded-2xl shadow-xl z-30 transform rotate-3">
                        <p class="text-[9px] uppercase font-bold opacity-80">Conversion Boost</p>
                        <p class="text-xl font-bold" x-text="'+' + stats.conversion + '%'"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 border-t border-gray-100 pt-16">
            <div class="text-center p-4">
                <h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-primary" x-text="stats.response + '%'"></h4>
                <p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Decrease Response Time</p>
            </div>
            <div class="text-center p-4">
                <h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-accent" x-text="stats.conversion + '%'"></h4>
                <p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Boost Conversion Rates</p>
            </div>
            <div class="text-center p-4">
                <h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-primary" x-text="stats.enroll + '+'"></h4>
                <p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Convert More Students</p>
            </div>
            <div class="text-center p-4">
                <h4 class="text-3xl md:text-5xl font-extrabold mb-2 text-accent" x-text="stats.effort + '%'"></h4>
                <p class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Measure Your Efforts</p>
            </div>
        </div>

        <div class="mt-20 text-center">
            <div class="inline-flex items-center gap-4 px-6 py-3 bg-gray-50 rounded-full border border-gray-100">
                <div class="flex -space-x-2">
                    <div class="w-6 h-6 rounded-full border-2 border-white bg-blue-500"></div>
                    <div class="w-6 h-6 rounded-full border-2 border-white bg-orange-500"></div>
                    <div class="w-6 h-6 rounded-full border-2 border-white bg-indigo-500"></div>
                </div>
                <p class="text-xs font-bold text-primary"><?php ee_h('arch_proof_text', 'Trusted by 500+ Leading Institutes'); ?></p>
            </div>
        </div>
    </div>

    <div class="absolute right-4 top-1/2 -translate-y-1/2 flex flex-col gap-2 z-50">
        <template x-for="(s, i) in steps">
            <div :class="activeStep === i ? 'h-8 bg-accent' : 'h-2 bg-gray-200'" class="w-1 transition-all duration-300"></div>
        </template>
    </div>

</section>
<!-- END Why Institutes Choose ExtraaEdge Section -->

<!-- START Respond First Hero Section -->
<style>
  .ee-hero-outer {
    --primary: #DE6E30;
    --secondary: #19335D;
    --bg-white: #ffffff;
    --primary-glow: rgba(222, 110, 48, 0.2);
    --glass-light: rgba(25, 51, 93, 0.05);
    --border-light: rgba(25, 51, 93, 0.1);
    background-color: var(--bg-white);
    padding: 10px 0;
    width: 100%;
    min-height: auto;
    display: flex;
    align-items: center;
    box-sizing: border-box;
    overflow: hidden;
  }

  .ee-hero-section {
    position: relative;
    width: 95%;
    max-width: 1400px;
    margin: 0 auto;
    min-height: 80vh;
    background-color: #fff;
    font-family: 'Open Sans', sans-serif;
    color: #19335D;
    display: flex;
    align-items: center;
    border-radius: 24px;
    border: 1px solid rgba(25, 51, 93, 0.1);
    box-sizing: border-box;
    padding: 60px 40px;
    box-shadow: 0 10px 40px rgba(25, 51, 93, 0.03);
  }

  .ee-hero-container {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    gap: 60px;
    align-items: center;
    z-index: 10;
  }

  .ee-content {
    position: relative;
    z-index: 10;
  }

  .ee-eyebrow {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 2px;
    color: #DE6E30;
    text-transform: uppercase;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .ee-eyebrow::after {
    content: '';
    width: 40px;
    height: 2px;
    background: #DE6E30;
  }

  .ee-headline {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: clamp(32px, 4vw, 54px);
    line-height: 1.1;
    margin-bottom: 25px;
    color: #19335D;
  }

  .ee-headline span {
    color: #DE6E30;
    display: block;
  }

  .ee-copy {
    font-size: 17px;
    line-height: 1.7;
    color: #4b5563;
    margin-bottom: 35px;
    max-width: 580px;
  }

  .ee-cta-wrapper {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .ee-primary-cta {
    background: #DE6E30;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 18px;
    padding: 18px 45px;
    border-radius: 12px;
    text-decoration: none;
    display: inline-block;
    width: fit-content;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 25px rgba(222, 110, 48, 0.25);
  }

  .ee-primary-cta:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(222, 110, 48, 0.4);
    background: #19335D;
  }

  .ee-microcopy {
    font-size: 13px;
    font-weight: 600;
    color: #19335D;
    opacity: 0.7;
  }

  .ee-visual-engine {
    position: relative;
    height: 550px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: radial-gradient(circle at center, rgba(25, 51, 93, 0.02) 0%, transparent 70%);
    border-radius: 40px;
    border: 1px solid rgba(25, 51, 93, 0.1);
  }

  .ee-hub-core {
    position: relative;
    width: 150px;
    height: 150px;
    background: #fff;
    border: 4px solid #DE6E30;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 20;
    box-shadow: 0 15px 45px rgba(222, 110, 48, 0.15);
    animation: hubRotate 15s linear infinite;
  }

  .ee-hub-inner {
    animation: hubRotateReverse 15s linear infinite;
    text-align: center;
    color: #19335D;
  }

  .ee-hub-inner b { font-family: 'Poppins', sans-serif; font-size: 20px; display: block; }
  .ee-hub-inner span { font-size: 9px; font-weight: 800; letter-spacing: 1px; color: #DE6E30; }

  @keyframes hubRotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
  @keyframes hubRotateReverse { from { transform: rotate(360deg); } to { transform: rotate(0deg); } }

  .ee-orbit-chip {
    position: absolute;
    background: #fff;
    border: 1px solid rgba(25, 51, 93, 0.1);
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 10px;
    font-weight: 700;
    color: #19335D;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    white-space: nowrap;
    z-index: 25;
    pointer-events: none;
  }

  .ee-lead-card {
    position: absolute;
    background: #19335D;
    color: #fff;
    padding: 10px 18px;
    border-radius: 10px;
    font-size: 11px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 8px 20px rgba(25, 51, 93, 0.2);
    z-index: 15;
    opacity: 0;
  }

  .ee-live-toast {
    position: absolute;
    top: 30px;
    right: -10px;
    background: #fff;
    border-left: 5px solid #DE6E30;
    padding: 15px;
    border-radius: 4px 12px 12px 4px;
    width: 200px;
    font-size: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transform: translateX(120%);
    transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    z-index: 35;
    color: #19335D;
  }

  .ee-live-toast.active { transform: translateX(0); }

  .ee-pipeline {
    position: absolute;
    bottom: 25px;
    width: 90%;
    display: flex;
    justify-content: space-between;
  }

  .ee-step {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    opacity: 0.2;
    transition: all 0.4s ease;
    color: #19335D;
  }

  .ee-step.active { opacity: 1; transform: scale(1.1); }
  .ee-step-dot { width: 12px; height: 12px; background: #19335D; border-radius: 50%; }
  .ee-step.active .ee-step-dot { background: #DE6E30; box-shadow: 0 0 12px #DE6E30; }
  .ee-step-label { font-size: 9px; font-weight: 800; text-transform: uppercase; margin-top: 5px; }

  @media (max-width: 1100px) {
    .ee-hero-outer { padding: 10px 0; height: auto; }
    .ee-hero-section { width: 98%; padding: 40px 20px; min-height: auto; }
    .ee-hero-container { grid-template-columns: 1fr; text-align: center; gap: 40px; }
    .ee-content { display: flex; flex-direction: column; align-items: center; }
    .ee-visual-engine { height: 450px; }
  }

  @media (max-width: 600px) {
    .ee-headline { font-size: 32px; }
    .ee-hub-core { width: 110px; height: 110px; }
    .ee-orbit-chip { font-size: 9px; padding: 5px 10px; }
    .ee-step-label { font-size: 7px; }
  }
</style>

<div class="ee-hero-outer">
  <div class="ee-hero-section" id="respondHero">
    <div class="ee-hero-container">
      <div class="ee-content">
        <div class="ee-eyebrow"><?php ee_h('rf_eyebrow', 'Admission Response Automation'); ?></div>
        <h2 class="ee-headline">
          <?php ee_h('rf_h1_l1', 'Decrease Response Time.'); ?>
          <span><?php ee_h('rf_h1_l2', 'Respond First Using AI Agents.'); ?></span>
          <?php ee_h('rf_h1_l3', 'Win Admissions.'); ?>
        </h2>
        <p class="ee-copy">
          <?php ee_h('rf_copy', 'Respond to every admission inquiry in minutes, not hours. Because the institute that responds first controls the conversation—and the conversion. ExtraaEdge automatically captures inquiries from every source and initiates AI-powered calls instantly.'); ?>
        </p>

        <div class="ee-cta-wrapper">
          <a href="<?php ee_u('rf_cta_url', '#'); ?>" class="ee-primary-cta"><?php ee_h('rf_cta_text', 'Book a Demo'); ?></a>
          <span class="ee-microcopy"><?php ee_h('rf_micro', 'See how institutes reduce response time by 90%'); ?></span>
        </div>
      </div>

      <div class="ee-visual-engine" id="engineStage">
        <div class="ee-live-toast" id="liveToast">
          <b style="color: #DE6E30; font-family: 'Poppins'">AI ACTION</b><br>
          Connected in 18s<br>
          <small>Counselor Assigned</small>
        </div>

        <div id="orbitWrapper"></div>

        <div class="ee-hub-core" id="aiHub">
          <div class="ee-hub-inner">
            <span>LIVE ENGINE</span>
            <b>AI HUB</b>
            <span>EXTRAAEDGE</span>
          </div>
        </div>

        <div id="leadContainer"></div>

        <div class="ee-pipeline">
          <div class="ee-step active" data-step="0"><div class="ee-step-dot"></div><div class="ee-step-label">Inquiry</div></div>
          <div class="ee-step" data-step="1"><div class="ee-step-dot"></div><div class="ee-step-label">Contacted</div></div>
          <div class="ee-step" data-step="2"><div class="ee-step-dot"></div><div class="ee-step-label">Qualified</div></div>
          <div class="ee-step" data-step="3"><div class="ee-step-dot"></div><div class="ee-step-label">Counseling</div></div>
          <div class="ee-step" data-step="4"><div class="ee-step-dot"></div><div class="ee-step-label">Enrolled</div></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
(function() {
  const chipTexts = ['Unified Ingestion', 'Ads Sync', 'Form Capture', 'AI Calling', 'IVR Route', 'Live Analytics'];
  const leadSources = ['Meta Ads', 'Google Ads', 'Website', 'Shiksha', 'Form-X'];

  const orbitWrapper = document.getElementById('orbitWrapper');
  const leadContainer = document.getElementById('leadContainer');
  const liveToast = document.getElementById('liveToast');
  const aiHub = document.getElementById('aiHub');
  const steps = document.querySelectorAll('.ee-step');
  if (!orbitWrapper) return;

  chipTexts.forEach((text, i) => {
    const chip = document.createElement('div');
    chip.className = 'ee-orbit-chip';
    chip.innerText = text;
    orbitWrapper.appendChild(chip);

    let angle = (i / chipTexts.length) * Math.PI * 2;
    const radiusX = window.innerWidth > 600 ? 220 : 140;
    const radiusY = window.innerWidth > 600 ? 120 : 80;

    function animateOrbit() {
      angle += 0.002;
      const x = Math.cos(angle) * radiusX;
      const y = Math.sin(angle) * radiusY;
      chip.style.transform = `translate(${x}px, ${y}px)`;
      requestAnimationFrame(animateOrbit);
    }
    animateOrbit();
  });

  function createLead() {
    const lead = document.createElement('div');
    lead.className = 'ee-lead-card';
    const source = leadSources[Math.floor(Math.random() * leadSources.length)];
    lead.innerText = source;

    const angle = Math.random() * Math.PI * 2;
    const startDist = 450;
    lead.style.left = `calc(50% + ${Math.cos(angle) * startDist}px)`;
    lead.style.top = `calc(50% + ${Math.sin(angle) * startDist}px)`;

    leadContainer.appendChild(lead);

    setTimeout(() => {
      lead.style.transition = 'all 2.2s cubic-bezier(0.4, 0, 0.2, 1)';
      lead.style.opacity = '1';
      lead.style.left = 'calc(50% - 40px)';
      lead.style.top = 'calc(50% - 15px)';
      lead.style.transform = 'scale(0.5)';
    }, 100);

    setTimeout(() => {
      lead.style.opacity = '0';
      processLead();
      setTimeout(() => lead.remove(), 600);
    }, 2300);
  }

  let stepIdx = 0;
  function processLead() {
    aiHub.style.transform = 'scale(1.1)';
    aiHub.style.borderColor = '#19335D';
    setTimeout(() => {
      aiHub.style.transform = 'scale(1)';
      aiHub.style.borderColor = '#DE6E30';
    }, 300);

    liveToast.classList.add('active');
    setTimeout(() => liveToast.classList.remove('active'), 2800);

    steps.forEach(s => s.classList.remove('active'));
    stepIdx = (stepIdx + 1) % steps.length;
    steps[stepIdx].classList.add('active');
  }

  let interval;
  const obs = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      interval = setInterval(createLead, 4800);
      createLead();
    } else {
      clearInterval(interval);
    }
  }, { threshold: 0.1 });

  obs.observe(document.getElementById('respondHero'));
})();
</script>
<!-- END Respond First Hero Section -->

<!-- Boost Conversion Rates Section -->
<style>
    #interactive-story-root {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #fff;
        margin: 0;
        padding: 0;
    }

    #interactive-story-root .wp-section-spacer {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    #interactive-story-root .system-idle {
        filter: grayscale(1) opacity(0.6) blur(2px);
        transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }
    #interactive-story-root .system-online {
        filter: grayscale(0) opacity(1) blur(0px);
    }

    #interactive-story-root .cursor { border-right: 2px solid #DE6E30; animation: bc-blink 0.7s infinite; }
    @keyframes bc-blink { 50% { border-color: transparent; } }

    #interactive-story-root .glass-hud {
        background: rgba(25, 51, 93, 0.85);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    #interactive-story-root .pulse-orange {
        box-shadow: 0 0 0 0 rgba(222, 110, 48, 0.4);
        animation: bc-pulse-ring 2s infinite;
    }
    @keyframes bc-pulse-ring {
        70% { box-shadow: 0 0 0 20px rgba(222, 110, 48, 0); }
        100% { box-shadow: 0 0 0 0 rgba(222, 110, 48, 0); }
    }

    #interactive-story-root .scene-enter { animation: bc-sceneIn 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
    @keyframes bc-sceneIn {
        from { opacity: 0; transform: translateY(20px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    #interactive-story-root .step-card {
        border-left: 4px solid transparent;
        transition: all 0.4s ease;
    }
    #interactive-story-root .step-card.active {
        border-left-color: #DE6E30;
        background: #fff;
        box-shadow: 0 10px 30px rgba(25, 51, 93, 0.08);
        transform: translateX(8px);
    }

    #interactive-story-root .scanner-line {
        height: 100%;
        width: 2px;
        background: linear-gradient(to bottom, transparent, #DE6E30, transparent);
        position: absolute;
        left: 0;
        top: 0;
        animation: bc-scanX 3s linear infinite;
        opacity: 0.3;
    }
    @keyframes bc-scanX {
        0% { left: 0%; }
        100% { left: 100%; }
    }
</style>

<section id="interactive-story-root" class="wp-section-spacer bg-white">
    <div class="max-w-7xl mx-auto px-4 py-20">

        <div class="text-center mb-16 md:mb-24">
            <div class="inline-flex items-center gap-3 mb-6 bg-orange-50 px-5 py-2 rounded-full border border-orange-100 shadow-sm">
                <span class="flex h-2 w-2 rounded-full bg-orange-500 pulse-orange"></span>
                <span class="text-xs font-bold text-orange-700 uppercase tracking-[0.2em]"><?php ee_h('bc_badge', 'Boost Conversion Rates'); ?></span>
            </div>
            <h2 class="text-4xl md:text-6xl font-extrabold text-[#19335D] tracking-tight mb-8">
                <?php ee_h('bc_h2_p1', 'AI Decides the Right'); ?> <br class="hidden md:block"> <?php ee_h('bc_h2_p2', 'Admission Engagements.'); ?>
            </h2>
            <p class="max-w-3xl mx-auto text-lg md:text-xl text-slate-500 leading-relaxed">
                <?php ee_h('bc_subtext', 'ExtraaEdge uses intelligence across student behaviour, intent, and application stage. It decides who, when, and how to engage. Every interaction is timely, relevant, and context-aware.'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-stretch">

            <div id="logic-steps" class="lg:col-span-4 space-y-4 order-2 lg:order-1 system-idle">
                <div onclick="bcJumpToScene(0)" class="step-card active p-6 rounded-3xl bg-slate-50 cursor-pointer group" data-idx="0">
                    <div class="flex gap-5 items-center">
                        <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-[#19335D] shadow-sm group-[.active]:bg-orange-500 group-[.active]:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#19335D] text-lg">Behaviour Intelligence</h4>
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">Real-time Intent Tracking</p>
                        </div>
                    </div>
                </div>

                <div onclick="bcJumpToScene(1)" class="step-card p-6 rounded-3xl bg-slate-50 cursor-pointer group" data-idx="1">
                    <div class="flex gap-5 items-center">
                        <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-[#19335D] shadow-sm group-[.active]:bg-orange-500 group-[.active]:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#19335D] text-lg">Dynamic Engagement</h4>
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">Contextual Routing</p>
                        </div>
                    </div>
                </div>

                <div onclick="bcJumpToScene(2)" class="step-card p-6 rounded-3xl bg-slate-50 cursor-pointer group" data-idx="2">
                    <div class="flex gap-5 items-center">
                        <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-[#19335D] shadow-sm group-[.active]:bg-orange-500 group-[.active]:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#19335D] text-lg">VidyaGPT Support</h4>
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold mt-0.5">24x7 AI Assistance</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-3xl border-2 border-dashed border-slate-100 mt-10">
                    <p class="text-sm text-slate-500 leading-relaxed italic">
                        "Admissions teams move away from manual follow-ups and generic messaging. AI-guided engagements adapt in real time and drive higher enrollments."
                    </p>
                </div>
            </div>

            <div id="ai-engine-console" class="lg:col-span-8 relative bg-[#19335D] rounded-[48px] p-8 md:p-16 overflow-hidden shadow-2xl flex items-center justify-center min-h-[550px] order-1 lg:order-2">
                <div class="scanner-line"></div>

                <div id="boot-overlay" class="absolute inset-0 bg-[#19335D] z-20 flex flex-col items-center justify-center transition-all duration-1000">
                    <div class="w-24 h-24 rounded-full border-2 border-dashed border-orange-500/30 flex items-center justify-center mb-8 pulse-orange">
                        <svg class="w-10 h-10 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div class="text-orange-500 font-mono text-[10px] uppercase tracking-[0.4em] mb-4">System Status: Standby</div>
                    <p class="text-white/40 text-sm animate-pulse">HOVER TO BOOT AI ENGINE</p>
                </div>

                <div id="hud-container" class="w-full h-full opacity-0 scale-95 transition-all duration-700 z-10 flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-white/50 font-mono text-[10px] uppercase tracking-widest">Neural Link: Active</span>
                        </div>
                        <div class="text-right">
                            <span class="text-white/30 font-mono text-[10px] uppercase block mb-1">Processing Stage</span>
                            <span id="stage-name" class="text-orange-500 font-bold text-xs uppercase tracking-widest">---</span>
                        </div>
                    </div>

                    <div id="stage-mount" class="flex-grow flex items-center justify-center"></div>

                    <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-6 pt-8 border-t border-white/10">
                        <div>
                            <p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">Intent Score</p>
                            <p id="intent-val" class="text-white font-bold text-xl">--</p>
                        </div>
                        <div>
                            <p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">Channel Opt.</p>
                            <p id="channel-val" class="text-orange-500 font-bold text-xl">--</p>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">Enroll Prob.</p>
                            <div class="w-full bg-white/10 h-1.5 rounded-full mt-2">
                                <div id="prob-bar" class="h-full bg-orange-500 w-0 transition-all duration-1000"></div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white/30 text-[9px] uppercase tracking-widest mb-1">AI Decision</p>
                            <p class="text-green-400 font-mono text-[10px]">ENGAGE_NOW</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20 wp-section-spacer grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl group cursor-pointer">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8 group-hover:scale-110 transition-transform">📧</div>
                <h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f1_title', 'Trigger-Based Email & SMS'); ?></h5>
                <p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f1_desc', 'Automated personalized outreach triggered by student behavior thresholds.'); ?></p>
            </div>

            <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl group cursor-pointer">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8 group-hover:scale-110 transition-transform">📞</div>
                <h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f2_title', 'AI Calling & Click-to-Call'); ?></h5>
                <p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f2_desc', 'Intelligence-led queues that connect teams to high-intent leads instantly.'); ?></p>
            </div>

            <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl group cursor-pointer">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8 group-hover:scale-110 transition-transform">🤖</div>
                <h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f3_title', 'VidyaGPT AI Agents'); ?></h5>
                <p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f3_desc', '24x7 admission counselors providing accurate, contextual answers instantly.'); ?></p>
            </div>

            <div class="p-10 rounded-[40px] bg-white border border-slate-100 hover:border-orange-500/20 transition-all shadow-sm hover:shadow-xl group cursor-pointer">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 mb-8 group-hover:scale-110 transition-transform">💬</div>
                <h5 class="font-extrabold text-[#19335D] text-lg mb-3"><?php ee_h('bc_f4_title', 'WhatsApp Communication'); ?></h5>
                <p class="text-sm text-slate-500 leading-relaxed"><?php ee_h('bc_f4_desc', 'Engage students where they are with official WhatsApp business API integration.'); ?></p>
            </div>
        </div>

    </div>
</section>

<script>
(function(){
    const STAGES = [
        {
            name: "Behaviour Mapping",
            intent: "84/100",
            channel: "MONITOR",
            prob: "65%",
            html: `
                <div class="scene-enter glass-hud p-8 rounded-[32px] w-full max-w-md border-l-4 border-orange-500">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">AK</div>
                        <div>
                            <div class="text-white font-bold">Ananya Kapoor</div>
                            <div class="text-[10px] text-white/40 uppercase tracking-widest font-mono">Prospect ID: #82910</div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between text-xs py-2 border-b border-white/5">
                            <span class="text-white/60">Interest: MBA International</span>
                            <span class="text-green-400">HIGH</span>
                        </div>
                        <div class="flex justify-between text-xs py-2 border-b border-white/5">
                            <span class="text-white/60">Time on Pricing Page</span>
                            <span class="text-white">04m 22s</span>
                        </div>
                        <p class="text-[10px] text-orange-500/80 font-mono italic pt-2">AI DECISION: Threshold met. Deploying engagement logic...</p>
                    </div>
                </div>
            `
        },
        {
            name: "Dynamic Routing",
            intent: "92/100",
            channel: "WHATSAPP",
            prob: "88%",
            html: `
                <div class="scene-enter flex flex-col items-center gap-8 w-full">
                    <div class="flex gap-4 items-center">
                        <div class="w-16 h-16 rounded-3xl bg-white/5 flex items-center justify-center opacity-20 text-white text-2xl">📧</div>
                        <div class="w-24 h-24 rounded-3xl bg-orange-500 flex flex-col items-center justify-center text-white shadow-2xl scale-125 z-10">
                            <span class="text-2xl mb-1">💬</span>
                            <span class="text-[8px] font-black uppercase tracking-widest">Active</span>
                        </div>
                        <div class="w-16 h-16 rounded-3xl bg-white/5 flex items-center justify-center opacity-20 text-white text-2xl">📞</div>
                    </div>
                    <p class="text-white/60 text-xs max-w-xs text-center leading-relaxed">
                        Intelligence chooses <span class="text-white font-bold">WhatsApp</span> based on student's previous interaction patterns and device usage.
                    </p>
                </div>
            `
        },
        {
            name: "VidyaGPT Engagement",
            intent: "99/100",
            channel: "AI_AGENT",
            prob: "97%",
            html: `
                <div class="scene-enter w-full max-w-sm space-y-4">
                    <div class="glass-hud p-4 rounded-2xl rounded-bl-none max-w-[90%] border-l-2 border-orange-500">
                        <p class="text-xs text-white leading-relaxed">"Hello Ananya! I noticed you were looking at the MBA Scholarship structure. Need the PDF of eligibility criteria?"</p>
                        <p class="text-[8px] text-orange-500 font-bold mt-2 uppercase tracking-widest">VidyaGPT • 2s ago</p>
                    </div>
                    <div class="bg-white p-4 rounded-2xl rounded-br-none max-w-[80%] ml-auto shadow-xl">
                        <p class="text-xs text-[#19335D] font-bold">"Yes, please send it over!"</p>
                    </div>
                    <div class="flex items-center gap-3 px-2 pt-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-ping"></span>
                        <span class="text-[10px] text-white/50 font-mono uppercase tracking-widest">Context-Aware Response Complete</span>
                    </div>
                </div>
            `
        }
    ];

    let currentScene = 0;
    let isLive = false;
    let loopInterval = null;

    const root = document.getElementById('interactive-story-root');
    const overlay = document.getElementById('boot-overlay');
    const hud = document.getElementById('hud-container');
    const steps = document.getElementById('logic-steps');
    const mount = document.getElementById('stage-mount');
    if (!root) return;

    const stageTxt = document.getElementById('stage-name');
    const intentTxt = document.getElementById('intent-val');
    const channelTxt = document.getElementById('channel-val');
    const probBar = document.getElementById('prob-bar');

    function bootSystem() {
        if (isLive) return;
        isLive = true;

        overlay.classList.add('opacity-0', 'pointer-events-none', 'scale-110');
        hud.classList.remove('opacity-0', 'scale-95');
        hud.classList.add('opacity-100', 'scale-100');
        steps.classList.remove('system-idle');

        renderScene(0);
        startLoop();
    }

    function renderScene(idx) {
        currentScene = idx;
        const data = STAGES[idx];

        document.querySelectorAll('#interactive-story-root .step-card').forEach((card, i) => {
            if (i === idx) card.classList.add('active');
            else card.classList.remove('active');
        });

        stageTxt.innerText = data.name;
        intentTxt.innerText = data.intent;
        channelTxt.innerText = data.channel;
        probBar.style.width = data.prob;

        mount.innerHTML = data.html;
    }

    function startLoop() {
        if (loopInterval) clearInterval(loopInterval);
        loopInterval = setInterval(() => {
            let next = (currentScene + 1) % STAGES.length;
            renderScene(next);
        }, 5000);
    }

    window.bcJumpToScene = function(idx) {
        clearInterval(loopInterval);
        renderScene(idx);
        setTimeout(startLoop, 10000);
    };

    root.addEventListener('mouseenter', bootSystem);
    root.addEventListener('touchstart', bootSystem);
})();
</script>
<!-- Boost Conversion Rates Section END -->

<!-- Convert More Section -->
<style>
    .cm-section-trigger {
        --cm-primary: #DE6E30;
        --cm-secondary: #19335D;
        background-color: #FFFFFF;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .cm-section-trigger .font-poppins { font-family: 'Poppins', sans-serif; }
    .cm-section-trigger .font-opensans { font-family: 'Open Sans', sans-serif; }

    .cm-section-trigger.wp-section-replacement {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .cm-section-trigger .dashboard-container {
        transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
        filter: grayscale(100%) opacity(0.6) blur(2px);
        transform: translateY(20px) scale(0.97);
    }

    .cm-section-trigger:hover .dashboard-container {
        filter: grayscale(0%) opacity(1) blur(0px);
        transform: translateY(0) scale(1);
    }

    .cm-section-trigger .story-card {
        display: none;
        opacity: 0;
        transform: translateX(30px);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .cm-section-trigger .story-card.active {
        display: block;
        opacity: 1;
        transform: translateX(0);
    }

    .cm-section-trigger .glass-ui {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(25, 51, 93, 0.1);
        box-shadow: 0 20px 50px -10px rgba(25, 51, 93, 0.15);
    }

    .cm-section-trigger .scan-laser {
        position: absolute;
        height: 2px;
        width: 100%;
        background: linear-gradient(90deg, transparent, #DE6E30, transparent);
        top: 0;
        z-index: 20;
        opacity: 0;
    }

    .cm-section-trigger:hover .scan-laser {
        animation: cmLaserMove 3s infinite linear;
        opacity: 0.8;
    }

    @keyframes cmLaserMove {
        0% { top: 0%; }
        100% { top: 100%; }
    }

    .cm-section-trigger .propensity-ring {
        transition: stroke-dashoffset 1.5s cubic-bezier(0.65, 0, 0.35, 1);
        transform: rotate(-90deg);
        transform-origin: 50% 50%;
    }

    .cm-section-trigger .cta-magnetic {
        background-color: #DE6E30;
        transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.4s ease;
    }

    .cm-section-trigger .cta-magnetic:hover {
        box-shadow: 0 15px 30px rgba(222, 110, 48, 0.4);
    }

    .cm-section-trigger .bullet-point {
        transition: all 0.3s ease;
    }
    .cm-section-trigger .bullet-point:hover {
        transform: translateX(8px);
        color: #DE6E30;
    }

    @media (max-width: 1024px) {
        .cm-section-trigger .dashboard-container { filter: none; opacity: 1; transform: none; }
        .cm-section-trigger:hover .scan-laser { display: none; }
    }
</style>

<section class="wp-section-replacement cm-section-trigger font-opensans relative w-full overflow-hidden bg-white py-16 md:py-28 group cursor-pointer">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            <div class="order-2 lg:order-1">
                <header class="mb-8">
                    <span class="font-poppins text-sm font-bold uppercase tracking-[0.4em] mb-4 block" style="color: #DE6E30;">
                        <?php ee_h('cm_eyebrow', 'Convert More'); ?>
                    </span>
                    <h2 class="font-poppins text-5xl md:text-6xl lg:text-7xl font-bold leading-[1.05] mb-8" style="color: #19335D;">
                        <?php ee_h('cm_h2_p1', 'Turn Enquiries Into'); ?> <br>
                        <span style="color: #DE6E30;"><?php ee_h('cm_h2_p2', 'Enrollments'); ?></span>
                    </h2>
                    <p class="text-xl font-semibold mb-6" style="color: #19335D;">
                        <?php ee_h('cm_subtitle', 'Not every enquiry deserves the same attention.'); ?>
                    </p>
                    <p class="text-lg opacity-80 leading-relaxed max-w-xl" style="color: #19335D;">
                        <?php ee_h('cm_description', 'ExtraaEdge helps teams focus on prospects most likely to enroll. Intelligent prioritization uses engagement, intent, and application stage. Teams know exactly who to follow up, nurture, or move forward. The result is higher efficiency and stronger enrollment conversions.'); ?>
                    </p>
                </header>

                <ul class="space-y-4 mb-12 font-poppins font-semibold">
                    <li class="bullet-point flex items-center space-x-3">
                        <span class="text-2xl" style="color: #DE6E30;">•</span>
                        <span style="color: #19335D;">Powered by Intelligent Prioritization</span>
                    </li>
                    <li class="bullet-point flex items-center space-x-3">
                        <span class="text-2xl" style="color: #DE6E30;">•</span>
                        <span style="color: #19335D;">Prediction Score</span>
                    </li>
                    <li class="bullet-point flex items-center space-x-3">
                        <span class="text-2xl" style="color: #DE6E30;">•</span>
                        <span style="color: #19335D;">Next Best Action</span>
                    </li>
                    <li class="bullet-point flex items-center space-x-3">
                        <span class="text-2xl" style="color: #DE6E30;">•</span>
                        <span style="color: #19335D;">Follow-Up Calendar</span>
                    </li>
                    <li class="bullet-point flex items-center space-x-3">
                        <span class="text-2xl" style="color: #DE6E30;">•</span>
                        <span style="color: #19335D;">Multi-Funnel Stages</span>
                    </li>
                </ul>

                <div class="relative inline-block">
                    <a href="<?php ee_u('cm_cta_url', '#'); ?>" class="cta-magnetic inline-flex items-center px-10 py-5 rounded-full text-white font-bold text-lg">
                        <?php ee_h('cm_cta_text', 'Book a Demo'); ?>
                        <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="order-1 lg:order-2 relative perspective-1000">
                <div class="dashboard-container w-full max-w-md mx-auto aspect-[4/5] bg-white rounded-[3rem] shadow-[0_60px_130px_-20px_rgba(25,51,93,0.2)] border border-slate-50 overflow-hidden relative flex flex-col">

                    <div class="scan-laser"></div>

                    <div class="h-14 border-b flex items-center px-8 justify-between bg-slate-50/30" style="border-color: rgba(25, 51, 93, 0.05);">
                        <div class="flex space-x-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-slate-200"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-slate-200"></div>
                        </div>
                        <div class="text-[9px] font-bold tracking-[0.2em] opacity-40 uppercase" style="color: #19335D;">ExtraaEdge AI Intelligence</div>
                    </div>

                    <div id="story-viewport" class="flex-1 p-8 relative flex flex-col justify-center overflow-hidden">

                        <div class="story-card active" id="cm-card-0">
                            <div class="mb-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold text-white mb-4 inline-block" style="background-color: #DE6E30;">NEW ENQUIRY DETECTED</span>
                                <h3 class="text-3xl font-bold mt-2" style="color: #19335D;">Arjun Mehta</h3>
                                <p class="text-sm opacity-50">Course: Masters in AI & Data Science</p>
                            </div>
                            <div class="glass-ui p-5 rounded-3xl flex items-center space-x-4 border-dashed" style="border-color: #DE6E30;">
                                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-2xl">⚡</div>
                                <div>
                                    <div class="text-[9px] uppercase font-bold opacity-30">Engagement Level</div>
                                    <div class="text-sm font-bold" style="color: #19335D;">Very Active (3 Sessions)</div>
                                </div>
                            </div>
                        </div>

                        <div class="story-card" id="cm-card-1">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-24 h-24 rounded-full border-4 border-dashed animate-[spin_8s_linear_infinite] mb-8 flex items-center justify-center" style="border-color: #DE6E30;">
                                    <span class="text-4xl">🧠</span>
                                </div>
                                <h4 class="text-2xl font-bold mb-2" style="color: #19335D;">AI Intent Scoping</h4>
                                <p class="text-xs opacity-50 px-8">Calculating propensity based on application stage and historical enrollment patterns...</p>
                            </div>
                        </div>

                        <div class="story-card" id="cm-card-2">
                            <div class="flex flex-col items-center">
                                <p class="text-[10px] font-bold uppercase tracking-widest mb-6 opacity-30" style="color: #19335D;">Enrollment Prediction</p>
                                <div class="relative w-48 h-48 flex items-center justify-center">
                                    <svg class="w-full h-full">
                                        <circle cx="96" cy="96" r="85" stroke="#F1F5F9" stroke-width="14" fill="transparent"></circle>
                                        <circle id="score-ring" cx="96" cy="96" r="85" stroke="#DE6E30" stroke-width="14" fill="transparent" stroke-dasharray="534" stroke-dashoffset="534" class="propensity-ring"></circle>
                                    </svg>
                                    <div class="absolute flex flex-col items-center">
                                        <span class="text-6xl font-bold" style="color: #19335D;">92%</span>
                                        <span class="text-[10px] font-bold text-green-500 uppercase mt-1">High Intent</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="story-card" id="cm-card-3">
                            <p class="text-[10px] font-bold uppercase tracking-widest mb-4 opacity-30" style="color: #19335D;">Next Best Action Recommendation</p>
                            <div class="glass-ui p-6 rounded-[2.5rem] border-l-[12px]" style="border-color: #DE6E30;">
                                <h4 class="font-bold text-xl mb-2" style="color: #19335D;">Personalized Follow-up</h4>
                                <p class="text-sm opacity-60 mb-6 italic">"Send Scholarship Guide - Arjun viewed the pricing page twice in 10 mins."</p>
                                <div class="flex space-x-2">
                                    <button class="flex-1 py-3 bg-slate-100 rounded-2xl text-[10px] font-bold opacity-50 uppercase">Later</button>
                                    <button class="flex-[2] py-3 text-white rounded-2xl text-[10px] font-bold uppercase" style="background-color: #19335D;">Execute Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="story-card" id="cm-card-4">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-20 h-20 rounded-full flex items-center justify-center text-white mb-6 shadow-2xl scale-up-anim" style="background-color: #DE6E30;">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <h3 class="text-3xl font-bold mb-2" style="color: #19335D;">Enrollment Secured</h3>
                                <p class="text-sm opacity-50">Conversion cycle reduced by 40%</p>
                            </div>
                        </div>

                    </div>

                    <div class="h-20 bg-slate-50 border-t flex items-center px-8 justify-between" style="border-color: rgba(25, 51, 93, 0.05);">
                        <div class="flex flex-col">
                            <span class="text-[9px] font-bold opacity-30 uppercase">Automation Stats</span>
                            <span class="text-xs font-bold text-green-500">+22% Conv. Rate</span>
                        </div>
                        <div class="flex -space-x-3">
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200"></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-300"></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-orange-100 flex items-center justify-center text-[10px] font-bold" style="color: #DE6E30;">+12</div>
                        </div>
                    </div>
                </div>

                <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full blur-[100px] opacity-10 pointer-events-none" style="background-color: #DE6E30;"></div>
                <div class="absolute -bottom-12 -left-12 w-48 h-48 rounded-full blur-[100px] opacity-10 pointer-events-none" style="background-color: #19335D;"></div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const section = document.querySelector('.cm-section-trigger');
        if (!section) return;
        const cards = section.querySelectorAll('.story-card');
        const ring = document.getElementById('score-ring');
        const cta = section.querySelector('.cta-magnetic');

        let activeIndex = 0;
        let storyLoop = null;
        let isRunning = false;

        function runStory() {
            cards.forEach(c => c.classList.remove('active'));
            cards[activeIndex].classList.add('active');

            if (activeIndex === 2 && ring) {
                ring.style.strokeDashoffset = 534;
                setTimeout(() => {
                    ring.style.strokeDashoffset = 534 - (534 * 0.92);
                }, 100);
            }

            activeIndex = (activeIndex + 1) % cards.length;
        }

        section.addEventListener('mouseenter', () => {
            if (!isRunning) {
                isRunning = true;
                runStory();
                storyLoop = setInterval(runStory, 3500);
            }
        });

        section.addEventListener('mouseleave', () => {
            isRunning = false;
            clearInterval(storyLoop);
        });

        section.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 1024 && cta) {
                const rect = cta.getBoundingClientRect();
                const mouseX = e.clientX - rect.left - rect.width / 2;
                const mouseY = e.clientY - rect.top - rect.height / 2;

                const dist = Math.sqrt(mouseX * mouseX + mouseY * mouseY);
                if (dist < 150) {
                    cta.style.transform = `translate(${mouseX * 0.2}px, ${mouseY * 0.2}px)`;
                } else {
                    cta.style.transform = `translate(0, 0)`;
                }
            }
        });
    });
</script>
<!-- Convert More Section END -->

<!-- Intelligence Engine / Analytics -->
<style>
    #analyticsModule {
        --primary-ee: #DE6E30;
        --navy-ee: #19335D;
        --accent-glow: rgba(222, 110, 48, 0.4);
        font-family: 'Plus Jakarta Sans', sans-serif;
        overflow-x: hidden;
        background: #ffffff;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 100px 0;
        position: relative;
        transition: background 0.5s ease;
    }

    #analyticsModule .perspective-view {
        perspective: 2000px;
    }

    #analyticsModule .dashboard-canvas {
        transform-style: preserve-3d;
        transition: transform 0.2s ease-out, box-shadow 0.4s ease;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(25, 51, 93, 0.1);
        border-radius: 40px;
        box-shadow: 0 30px 60px -12px rgba(25, 51, 93, 0.15);
    }

    #analyticsModule .data-particle {
        position: absolute;
        background: #DE6E30;
        border-radius: 50%;
        pointer-events: none;
        opacity: 0;
    }

    #analyticsModule.is-active .data-particle {
        animation: ie-particleFlow 4s infinite linear;
    }

    @keyframes ie-particleFlow {
        0% { transform: translateY(0) scale(1); opacity: 0; }
        20% { opacity: 0.6; }
        80% { opacity: 0.6; }
        100% { transform: translateY(-500px) scale(0); opacity: 0; }
    }

    #analyticsModule .mono-font { font-family: 'JetBrains Mono', monospace; }

    #analyticsModule .ai-cursor::after {
        content: '|';
        animation: ie-blink 1s step-end infinite;
        color: #DE6E30;
        font-weight: bold;
    }

    @keyframes ie-blink { 50% { opacity: 0; } }

    #analyticsModule .chart-path {
        stroke-dasharray: 1500;
        stroke-dashoffset: 1500;
    }

    #analyticsModule.is-active .chart-path {
        stroke-dashoffset: 0;
        transition: stroke-dashoffset 5s cubic-bezier(0.19, 1, 0.22, 1);
    }

    #analyticsModule .activation-layer {
        position: absolute;
        inset: 0;
        z-index: 40;
        cursor: pointer;
    }

    #analyticsModule .custom-bullet {
        width: 8px;
        height: 8px;
        border-radius: 2px;
        background: #DE6E30;
        transform: rotate(45deg);
    }

    @keyframes ie-float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    #analyticsModule .float-anim { animation: ie-float 6s ease-in-out infinite; }

    #analyticsModule .text-gradient {
        background: linear-gradient(135deg, #19335D 0%, #DE6E30 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<section id="analyticsModule" class="group/section">
    <div id="particleContainer" class="absolute inset-0 overflow-hidden pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start">

            <div class="w-full lg:w-[45%]">
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-[#DE6E30]/10 border border-[#DE6E30]/20 text-[#DE6E30] text-[10px] font-black uppercase tracking-[0.4em] mb-8">
                    <span class="w-2 h-2 rounded-full bg-[#DE6E30] animate-pulse"></span>
                    <?php ee_h('ie_badge', 'Measure your efforts'); ?>
                </div>

                <h2 class="text-4xl lg:text-6xl font-extrabold text-[#19335D] leading-[1.1] mb-6 tracking-tight">
                    <?php ee_h('ie_h2_p1', "Know What's Working."); ?> <br/>
                    <span class="text-gradient"><?php ee_h('ie_h2_p2', "Fix What's Not."); ?></span>
                </h2>

                <p class="text-lg text-slate-600 leading-relaxed mb-10">
                    <?php ee_h('ie_description', 'Measure what matters across admissions and marketing. ExtraaEdge gives teams clear, actionable visibility into performance. Track counselors, campaigns, and lead sources in one place. With Analytics Builder and VidyaGPT Analytics, insights are easier to explore and understand. So teams act faster on what\'s working and fix what\'s not.'); ?>
                </p>

                <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 mb-12">
                    <li class="flex items-center gap-4 group/item">
                        <div class="custom-bullet group-hover/item:scale-150 transition-transform"></div>
                        <span class="text-sm font-bold text-[#19335D] tracking-tight">Analytics & Visibility Across</span>
                    </li>
                    <li class="flex items-center gap-4 group/item">
                        <div class="custom-bullet group-hover/item:scale-150 transition-transform"></div>
                        <span class="text-sm font-bold text-[#19335D] tracking-tight">VidyaGPT Analytics + Analytics Builder</span>
                    </li>
                    <li class="flex items-center gap-4 group/item">
                        <div class="custom-bullet group-hover/item:scale-150 transition-transform"></div>
                        <span class="text-sm font-bold text-[#19335D] tracking-tight">Counselor Dashboard</span>
                    </li>
                    <li class="flex items-center gap-4 group/item">
                        <div class="custom-bullet group-hover/item:scale-150 transition-transform"></div>
                        <span class="text-sm font-bold text-[#19335D] tracking-tight">Custom Dashboards</span>
                    </li>
                    <li class="flex items-center gap-4 group/item">
                        <div class="custom-bullet group-hover/item:scale-150 transition-transform"></div>
                        <span class="text-sm font-bold text-[#19335D] tracking-tight">Marketing Dashboard</span>
                    </li>
                    <li class="flex items-center gap-4 group/item">
                        <div class="custom-bullet group-hover/item:scale-150 transition-transform"></div>
                        <span class="text-sm font-bold text-[#19335D] tracking-tight">Publisher Reports</span>
                    </li>
                </ul>

                <a href="<?php ee_u('ie_cta_url', '#'); ?>" class="inline-block bg-[#DE6E30] text-white px-10 py-5 rounded-2xl font-black text-lg shadow-xl shadow-orange-500/30 hover:bg-[#19335D] hover:shadow-navy-blue/30 transform transition-all hover:-translate-y-1 active:scale-95">
                    <?php ee_h('ie_cta_text', 'Book a Demo'); ?>
                </a>
            </div>

            <div class="w-full lg:w-[55%] perspective-view relative">
                <div id="engineActivator" class="activation-layer"></div>

                <div id="mainDashboard" class="dashboard-canvas p-6 md:p-10 relative overflow-hidden float-anim">

                    <div class="flex justify-between items-center mb-10">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-[#19335D] flex items-center justify-center shadow-lg">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M21 21H3V3h18v18zM5 19h14V5H5v14z"/><path d="M7 11h2v6H7zm4-4h2v10h-2zm4 7h2v3h-2z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-[#19335D] uppercase tracking-tighter">Live Intelligence Hub</h4>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Processing Node 04</span>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block bg-slate-50 px-4 py-2 rounded-full border border-slate-100">
                            <span id="timestamp" class="text-[10px] font-bold text-slate-400 mono-font">SYNCING DATA...</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Admissions</p>
                            <div class="text-2xl font-black text-[#19335D] tabular-nums counter" data-target="12480">0</div>
                        </div>
                        <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Campaign ROI</p>
                            <div class="text-2xl font-black text-[#DE6E30] tabular-nums counter" data-target="4.8">0</div>
                        </div>
                        <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm col-span-2 md:col-span-1">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Lead Health</p>
                            <div class="flex items-center gap-2">
                                <div class="h-2 flex-1 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-green-500 w-[85%] origin-left transition-transform duration-1000 scale-x-0 progress-bar"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-500">85%</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#19335D] rounded-[32px] p-8 mb-8 relative h-[240px] overflow-hidden group/graph">
                        <div class="relative z-10 flex justify-between items-center text-white mb-4">
                            <span class="text-xs font-bold uppercase tracking-widest opacity-60">Conversion Velocity</span>
                            <div class="flex gap-1 h-4 items-end">
                                <div class="w-1 bg-[#DE6E30] h-full rounded-full animate-bounce"></div>
                                <div class="w-1 bg-white/20 h-1/2 rounded-full animate-[bounce_1s_infinite]"></div>
                                <div class="w-1 bg-[#DE6E30] h-3/4 rounded-full animate-[bounce_1.5s_infinite]"></div>
                            </div>
                        </div>
                        <svg class="absolute inset-0 w-full h-full" viewBox="0 0 800 240" preserveAspectRatio="none">
                            <path class="chart-path" d="M0,200 Q100,180 200,190 T400,100 T600,120 T800,40" fill="none" stroke="#DE6E30" stroke-width="6" stroke-linecap="round"></path>
                            <path d="M0,200 Q100,180 200,190 T400,100 T600,120 T800,40 V240 H0 Z" fill="rgba(222, 110, 48, 0.15)"></path>
                        </svg>
                    </div>

                    <div class="bg-slate-900 rounded-[24px] p-6 border-l-4 border-[#DE6E30]">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="px-2 py-0.5 rounded bg-[#DE6E30] text-[8px] font-bold text-white uppercase">VidyaGPT v2.5</div>
                            <span class="text-[9px] text-slate-500 font-bold mono-font">PROCESSING...</span>
                        </div>
                        <div id="aiTerm" class="mono-font text-xs md:text-sm text-slate-300 leading-relaxed ai-cursor min-h-[40px]">
                            [System Idle. Initialize to scan lead health...]
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const activator = document.getElementById('engineActivator');
        if (!activator) return;
        const section = document.getElementById('analyticsModule');
        const board = document.getElementById('mainDashboard');
        const terminal = document.getElementById('aiTerm');
        const counters = document.querySelectorAll('#analyticsModule .counter');
        const particles = document.getElementById('particleContainer');
        const bars = document.querySelectorAll('#analyticsModule .progress-bar');

        let isActive = false;
        const insights = [
            "Analyzing Lead Sources... Google Ads delivering 2.4x quality increase.",
            "Predictive Alert: High intent cluster detected in Facebook Retargeting.",
            "Counselor 'Vikram' reached 115% of target conversion. Scaling insights...",
            "Analytics Builder suggests re-distributing budget to High-ROI publishers.",
            "Scanning Stage 2 drop-offs... Action: Triggering automated VidyaGPT SMS."
        ];

        for(let i=0; i<15; i++) {
            const p = document.createElement('div');
            p.className = 'data-particle';
            p.style.width = Math.random() * 4 + 2 + 'px';
            p.style.height = p.style.width;
            p.style.left = Math.random() * 100 + '%';
            p.style.top = Math.random() * 100 + '%';
            p.style.animationDelay = Math.random() * 5 + 's';
            particles.appendChild(p);
        }

        let msgIdx = 0;
        let charIdx = 0;
        let isDeleting = false;

        function typeEngine() {
            if (!isActive) return;
            const fullMsg = insights[msgIdx % insights.length];

            if (isDeleting) {
                terminal.textContent = `> ${fullMsg.substring(0, charIdx - 1)}`;
                charIdx--;
            } else {
                terminal.textContent = `> ${fullMsg.substring(0, charIdx + 1)}`;
                charIdx++;
            }

            let speed = isDeleting ? 25 : 55;

            if (!isDeleting && charIdx === fullMsg.length) {
                speed = 3500;
                isDeleting = true;
            } else if (isDeleting && charIdx === 0) {
                isDeleting = false;
                msgIdx++;
                speed = 500;
            }

            setTimeout(typeEngine, speed);
        }

        function runCounters() {
            counters.forEach(c => {
                const target = parseFloat(c.getAttribute('data-target'));
                const duration = 2000;
                let start = 0;
                const startTime = performance.now();

                function step(now) {
                    const progress = Math.min((now - startTime) / duration, 1);
                    const current = progress * target;

                    if (target % 1 === 0) {
                        c.textContent = Math.floor(current).toLocaleString();
                    } else {
                        c.textContent = current.toFixed(1) + 'x';
                    }

                    if (progress < 1) requestAnimationFrame(step);
                }
                requestAnimationFrame(step);
            });

            bars.forEach(b => b.style.transform = 'scaleX(1)');
        }

        function activateSystem() {
            if (isActive) return;
            isActive = true;
            section.classList.add('is-active');
            activator.style.display = 'none';
            board.classList.remove('float-anim');
            runCounters();
            typeEngine();

            setInterval(() => {
                const d = new Date();
                document.getElementById('timestamp').textContent = `SYSTIME: ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
            }, 1000);
        }

        activator.addEventListener('mouseenter', activateSystem);
        activator.addEventListener('touchstart', (e) => {
            e.preventDefault();
            activateSystem();
        }, {passive: false});

        section.addEventListener('mousemove', (e) => {
            if (!isActive) return;
            const rect = section.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            board.style.transform = `rotateY(${x * 15}deg) rotateX(${-y * 15}deg) translateY(-5px)`;
            board.style.boxShadow = `${-x * 50}px ${-y * 50}px 100px -20px rgba(25, 51, 93, 0.2)`;
        });

        section.addEventListener('mouseleave', () => {
            if (isActive) {
                board.style.transform = `rotateY(0deg) rotateX(0deg)`;
                board.style.boxShadow = `0 30px 60px -12px rgba(25, 51, 93, 0.15)`;
            }
        });

        board.addEventListener('click', () => {
            if (isActive) {
                terminal.style.color = '#DE6E30';
                setTimeout(() => terminal.style.color = '', 300);
            }
        });
    });
</script>
<!-- Intelligence Engine / Analytics END -->

<!-- CRM Impact Stories Section -->
<style>
    #extraaedge-success-story-engine {
        --primary-orange: #DE6E30;
        --deep-blue: #19335D;
        --white: #FFFFFF;
        --slate-50: #f8fafc;
        --slate-600: #475569;
        --shadow-xl: 0 20px 25px -5px rgba(25, 51, 93, 0.1), 0 10px 10px -5px rgba(25, 51, 93, 0.04);
        --transition-premium: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        margin: 10px 0 !important;
        padding: 100px 0;
        background: var(--slate-50);
        font-family: 'Open Sans', sans-serif;
        color: var(--deep-blue);
        overflow: hidden;
        position: relative;
    }

    #extraaedge-success-story-engine .ee-logic-mesh {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    #extraaedge-success-story-engine .ee-pulse-line {
        position: absolute;
        background: linear-gradient(90deg, transparent, rgba(222, 110, 48, 0.15), transparent);
        height: 1px; width: 100%;
        opacity: 0;
        transition: opacity 1s ease;
    }

    #extraaedge-success-story-engine.engine-active .ee-pulse-line {
        opacity: 1;
        animation: ee-move-line 6s infinite linear;
    }

    @keyframes ee-move-line {
        from { transform: translateX(-100%); }
        to { transform: translateX(100%); }
    }

    #extraaedge-success-story-engine .ee-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 10;
    }

    #extraaedge-success-story-engine .ee-header-group {
        text-align: center;
        margin-bottom: 70px;
        opacity: 0;
        transform: translateY(30px);
        transition: var(--transition-premium);
    }

    #extraaedge-success-story-engine.engine-active .ee-header-group {
        opacity: 1;
        transform: translateY(0);
    }

    #extraaedge-success-story-engine .ee-tagline {
        font-family: 'Poppins', sans-serif;
        color: var(--primary-orange);
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 14px;
        margin-bottom: 15px;
        display: inline-block;
    }

    #extraaedge-success-story-engine .ee-title-main {
        font-family: 'Poppins', sans-serif;
        font-size: clamp(32px, 5vw, 50px);
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 25px;
    }

    #extraaedge-success-story-engine .ee-metrics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px;
        margin-bottom: 80px;
    }

    #extraaedge-success-story-engine .ee-metric-card {
        background: var(--white);
        padding: 35px 20px;
        border-radius: 24px;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(25, 51, 93, 0.05);
        transition: var(--transition-premium);
        opacity: 0;
        transform: scale(0.9);
    }

    #extraaedge-success-story-engine.engine-active .ee-metric-card {
        opacity: 1;
        transform: scale(1);
    }

    #extraaedge-success-story-engine .ee-metric-card:hover {
        border-color: var(--primary-orange);
        transform: translateY(-8px);
    }

    #extraaedge-success-story-engine .ee-val {
        display: block;
        font-size: 42px;
        font-weight: 700;
        color: var(--primary-orange);
        font-family: 'Poppins', sans-serif;
        margin-bottom: 5px;
    }

    #extraaedge-success-story-engine .ee-lab {
        font-size: 13px;
        font-weight: 600;
        color: var(--slate-600);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    #extraaedge-success-story-engine .ee-cards-layout {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(390px, 1fr));
        gap: 35px;
    }

    #extraaedge-success-story-engine .ee-story-card {
        background: var(--white);
        border-radius: 35px;
        overflow: hidden;
        border: 1px solid rgba(25, 51, 93, 0.04);
        box-shadow: var(--shadow-xl);
        display: flex;
        flex-direction: column;
        transition: var(--transition-premium);
        opacity: 0;
        transform: translateY(50px);
        height: 100%;
    }

    #extraaedge-success-story-engine.engine-active .ee-story-card {
        opacity: 1;
        transform: translateY(0);
    }

    #extraaedge-success-story-engine .ee-story-card:hover {
        transform: translateY(-15px) scale(1.01);
        box-shadow: 0 40px 70px -15px rgba(25, 51, 93, 0.2);
    }

    #extraaedge-success-story-engine .ee-vid-container {
        width: 100%;
        aspect-ratio: 16/9;
        background: #000;
        position: relative;
        cursor: pointer;
    }

    #extraaedge-success-story-engine .ee-thumb-wrapper {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 10;
        transition: opacity 0.5s ease;
    }

    #extraaedge-success-story-engine .ee-vid-img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 1s ease;
    }

    #extraaedge-success-story-engine .ee-story-card:hover .ee-vid-img {
        transform: scale(1.1);
    }

    #extraaedge-success-story-engine .ee-play-btn {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 75px; height: 75px;
        background: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        transition: var(--transition-premium);
    }

    #extraaedge-success-story-engine .ee-play-btn::after {
        content: '';
        border-left: 20px solid var(--primary-orange);
        border-top: 13px solid transparent;
        border-bottom: 13px solid transparent;
        margin-left: 5px;
    }

    #extraaedge-success-story-engine .ee-story-card:hover .ee-play-btn {
        background: var(--primary-orange);
        transform: translate(-50%, -50%) scale(1.1);
    }

    #extraaedge-success-story-engine .ee-story-card:hover .ee-play-btn::after {
        border-left-color: #fff;
    }

    #extraaedge-success-story-engine .ee-vid-container.active-play .ee-thumb-wrapper {
        opacity: 0;
        pointer-events: none;
    }

    #extraaedge-success-story-engine .ee-story-body {
        padding: 40px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    #extraaedge-success-story-engine .ee-quote {
        font-size: 15px;
        line-height: 1.8;
        color: var(--slate-600);
        margin-bottom: 30px;
        font-style: italic;
        position: relative;
    }

    #extraaedge-success-story-engine .ee-profile-box {
        margin-top: auto;
        display: flex;
        align-items: center;
        gap: 18px;
        padding-top: 25px;
        border-top: 1px solid #f1f5f9;
    }

    #extraaedge-success-story-engine .ee-pfp {
        width: 70px; height: 70px;
        border-radius: 18px;
        object-fit: cover;
        border: 3px solid rgba(222, 110, 48, 0.2);
        transition: var(--transition-premium);
    }

    #extraaedge-success-story-engine .ee-story-card:hover .ee-pfp {
        border-color: var(--primary-orange);
        border-radius: 50%;
    }

    #extraaedge-success-story-engine .ee-name {
        font-family: 'Poppins', sans-serif;
        font-size: 19px;
        font-weight: 700;
        margin: 0;
        color: var(--deep-blue);
    }

    #extraaedge-success-story-engine .ee-role {
        font-size: 13px;
        font-weight: 700;
        color: var(--primary-orange);
        margin: 2px 0;
    }

    #extraaedge-success-story-engine .ee-inst {
        font-size: 11px;
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
    }

    @media (max-width: 1024px) {
        #extraaedge-success-story-engine .ee-metrics-grid { grid-template-columns: repeat(2, 1fr); }
        #extraaedge-success-story-engine .ee-cards-layout { grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); }
    }

    @media (max-width: 768px) {
        #extraaedge-success-story-engine .ee-metrics-grid { grid-template-columns: 1fr; }
        #extraaedge-success-story-engine .ee-cards-layout { grid-template-columns: 1fr; }
        #extraaedge-success-story-engine .ee-title-main { font-size: 32px; }
        #extraaedge-success-story-engine { padding: 60px 0; }
    }
</style>

<section id="extraaedge-success-story-engine">
    <div class="ee-logic-mesh" id="ee-mesh"></div>

    <div class="ee-container">
        <header class="ee-header-group">
            <span class="ee-tagline"><?php ee_h('st_tagline', 'CRM Impact Stories'); ?></span>
            <h2 class="ee-title-main"><?php ee_h('st_h2_p1', 'Powering Growth for'); ?> <br><?php ee_h('st_h2_p2', '500+ Happy Customers'); ?></h2>
            <p><?php ee_h('st_subtitle', 'From streamlined counselor workflows to data-driven reporting, see how education leaders are rewriting their success stories with ExtraaEdge.'); ?></p>
        </header>

        <div class="ee-metrics-grid">
            <div class="ee-metric-card" style="transition-delay: 0.1s">
                <span class="ee-val" data-target="<?php ee_a('st_m1_num', '500'); ?>" data-suffix="+">0</span>
                <span class="ee-lab"><?php ee_h('st_m1_lab', 'Happy Customers'); ?></span>
            </div>
            <div class="ee-metric-card" style="transition-delay: 0.2s">
                <span class="ee-val" data-target="<?php ee_a('st_m2_num', '3'); ?>" data-suffix="X">0</span>
                <span class="ee-lab"><?php ee_h('st_m2_lab', 'X Conversion Rate'); ?></span>
            </div>
            <div class="ee-metric-card" style="transition-delay: 0.3s">
                <span class="ee-val" data-target="<?php ee_a('st_m3_num', '15000'); ?>" data-suffix="+">0</span>
                <span class="ee-lab"><?php ee_h('st_m3_lab', 'Daily Power Users'); ?></span>
            </div>
            <div class="ee-metric-card" style="transition-delay: 0.4s">
                <span class="ee-val" data-target="<?php ee_a('st_m4_num', '99'); ?>" data-suffix="%">0</span>
                <span class="ee-lab"><?php ee_h('st_m4_lab', '% Support Rating'); ?></span>
            </div>
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
                $delay = $i * 0.1;
            ?>
            <article class="ee-story-card" style="transition-delay: <?php echo $delay; ?>s">
                <div class="ee-vid-container" id="vid-<?php echo $i; ?>" onclick="eePlayInPlace('vid-<?php echo $i; ?>','<?php echo esc_js($vid); ?>')">
                    <div class="ee-thumb-wrapper">
                        <img src="https://img.youtube.com/vi/<?php echo esc_attr($vid); ?>/maxresdefault.jpg" class="ee-vid-img" alt="<?php echo esc_attr($name); ?> Testimony">
                        <div class="ee-play-btn"></div>
                    </div>
                    <div class="ee-slot" style="height: 100%;"></div>
                </div>
                <div class="ee-story-body">
                    <div class="ee-quote">
                        <?php echo wp_kses_post($quote); ?>
                    </div>
                    <div class="ee-profile-box">
                        <img src="<?php echo esc_url($photo); ?>" class="ee-pfp" alt="<?php echo esc_attr($name); ?>">
                        <div class="ee-info">
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
    const wrapper = document.getElementById('extraaedge-success-story-engine');
    if (!wrapper) return;
    const mesh = document.getElementById('ee-mesh');
    let hasTriggered = false;

    function buildMesh() {
        for(let i=0; i<12; i++) {
            const line = document.createElement('div');
            line.className = 'ee-pulse-line';
            line.style.top = (Math.random() * 100) + '%';
            line.style.animationDuration = (4 + Math.random() * 6) + 's';
            line.style.animationDelay = (Math.random() * 5) + 's';
            mesh.appendChild(line);
        }
    }
    buildMesh();

    wrapper.addEventListener('mouseenter', () => {
        if(!hasTriggered) {
            hasTriggered = true;
            wrapper.classList.add('engine-active');
            initNumbers();
        }
    });

    window.addEventListener('scroll', () => {
        const rect = wrapper.getBoundingClientRect();
        if(rect.top < window.innerHeight * 0.8 && !hasTriggered) {
            hasTriggered = true;
            wrapper.classList.add('engine-active');
            initNumbers();
        }
    });

    function initNumbers() {
        const counters = document.querySelectorAll('#extraaedge-success-story-engine .ee-val');
        counters.forEach(c => {
            const target = +c.getAttribute('data-target');
            const suffix = c.getAttribute('data-suffix') || '';
            const duration = 2000;
            let start = null;

            function animate(timestamp) {
                if(!start) start = timestamp;
                const progress = Math.min((timestamp - start) / duration, 1);
                const current = Math.floor(progress * target);
                c.innerText = (target >= 1000 ? current.toLocaleString() : current) + suffix;
                if(progress < 1) requestAnimationFrame(animate);
            }
            requestAnimationFrame(animate);
        });
    }

    window.eePlayInPlace = function(containerId, youtubeId) {
        const container = document.getElementById(containerId);
        if(!container || container.classList.contains('active-play')) return;
        const slot = container.querySelector('.ee-slot');
        slot.innerHTML = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${youtubeId}?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
        container.classList.add('active-play');
    };
})();
</script>
<!-- CRM Impact Stories Section END -->

<!-- AI Demo CTA Section -->
<style>
    #wp-ai-demo-cta {
        --primary-orange: #DE6E30;
        --premium-blue: #19335D;
        --bg-white: #FFFFFF;
        --card-shadow: 0 20px 40px rgba(25, 51, 93, 0.08);
        --transition-main: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);

        margin: 10px 0;
        padding: 80px 5%;
        background: var(--bg-white);
        font-family: 'Open Sans', sans-serif;
        color: var(--premium-blue);
        overflow: hidden;
        position: relative;
        display: flex;
        justify-content: center;
    }

    #wp-ai-demo-cta * { box-sizing: border-box; -webkit-font-smoothing: antialiased; }

    #wp-ai-demo-cta .cta-max-width {
        max-width: 1200px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    #wp-ai-demo-cta .cta-content-main {
        position: relative;
        z-index: 10;
    }

    #wp-ai-demo-cta .cta-headline {
        font-family: 'Poppins', sans-serif;
        font-size: clamp(34px, 4.5vw, 52px);
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 20px;
        color: var(--premium-blue);
    }

    #wp-ai-demo-cta .cta-subheadline {
        font-size: clamp(17px, 2vw, 20px);
        line-height: 1.7;
        margin-bottom: 40px;
        opacity: 0.95;
        max-width: 580px;
    }

    #wp-ai-demo-cta .cta-action-area {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    #wp-ai-demo-cta .btn-premium {
        display: inline-block;
        background: var(--primary-orange);
        color: #FFFFFF;
        padding: 22px 50px;
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;
        border-radius: 60px;
        width: fit-content;
        transition: var(--transition-main);
        box-shadow: 0 12px 30px rgba(222, 110, 48, 0.3);
        border: 2px solid transparent;
        text-align: center;
    }

    #wp-ai-demo-cta .btn-premium:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(222, 110, 48, 0.45);
        background: #c75c24;
    }

    #wp-ai-demo-cta .trust-indicator {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
        opacity: 0.8;
    }

    #wp-ai-demo-cta .cta-storytelling-engine {
        position: relative;
        height: 600px;
        display: flex;
        justify-content: center;
        align-items: center;
        perspective: 1000px;
    }

    #wp-ai-demo-cta .expert-visual {
        position: relative;
        width: 280px;
        height: 280px;
        z-index: 5;
        transition: var(--transition-main);
    }

    #wp-ai-demo-cta .expert-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 8px solid #fff;
        box-shadow: 0 30px 60px rgba(25, 51, 93, 0.15);
    }

    #wp-ai-demo-cta .workflow-svg-layer {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        pointer-events: none;
        z-index: 2;
    }

    #wp-ai-demo-cta .connection-path {
        fill: none;
        stroke: var(--primary-orange);
        stroke-width: 3;
        stroke-dasharray: 10, 10;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    #wp-ai-demo-cta .story-node {
        position: absolute;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(15px);
        border-radius: 16px;
        padding: 14px 18px;
        box-shadow: var(--card-shadow);
        display: flex;
        align-items: center;
        gap: 15px;
        z-index: 10;
        width: 250px;
        opacity: 0.3;
        transform: scale(0.85);
        transition: var(--transition-main);
        border: 1px solid rgba(25, 51, 93, 0.05);
        cursor: pointer;
    }

    #wp-ai-demo-cta .story-node.active {
        opacity: 1;
        transform: scale(1.08) !important;
        border-color: var(--primary-orange);
        box-shadow: 0 25px 50px rgba(222, 110, 48, 0.18);
        z-index: 100;
    }

    #wp-ai-demo-cta .node-icon {
        width: 40px;
        height: 40px;
        background: var(--premium-blue);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        flex-shrink: 0;
        transition: var(--transition-main);
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
    }

    #wp-ai-demo-cta .story-node.active .node-icon {
        background: var(--primary-orange);
        transform: rotateY(360deg);
    }

    #wp-ai-demo-cta .node-content h4 {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        color: var(--premium-blue);
    }

    #wp-ai-demo-cta .node-content p {
        margin: 2px 0 0;
        font-size: 11px;
        opacity: 0.7;
        color: var(--premium-blue);
    }

    #wp-ai-demo-cta .node-1 { top: 2%; left: 50%; transform: translateX(-50%); }
    #wp-ai-demo-cta .node-2 { top: 20%; right: -5%; }
    #wp-ai-demo-cta .node-3 { bottom: 20%; right: -5%; }
    #wp-ai-demo-cta .node-4 { bottom: 2%; left: 50%; transform: translateX(-50%); }
    #wp-ai-demo-cta .node-5 { bottom: 20%; left: -5%; }
    #wp-ai-demo-cta .node-6 { top: 20%; left: -5%; }

    @media (max-width: 1100px) {
        #wp-ai-demo-cta .cta-max-width { grid-template-columns: 1fr; gap: 80px; }
        #wp-ai-demo-cta .cta-content-main { text-align: center; }
        #wp-ai-demo-cta .btn-premium { margin: 0 auto; }
        #wp-ai-demo-cta .trust-indicator { justify-content: center; }
        #wp-ai-demo-cta .cta-storytelling-engine { height: 600px; transform: scale(0.85); }
    }

    @media (max-width: 600px) {
        #wp-ai-demo-cta { padding: 40px 15px; }
        #wp-ai-demo-cta .cta-storytelling-engine { transform: scale(0.7); height: 550px; }
        #wp-ai-demo-cta .story-node { width: 210px; }
        #wp-ai-demo-cta .node-2, #wp-ai-demo-cta .node-3 { right: -15%; }
        #wp-ai-demo-cta .node-5, #wp-ai-demo-cta .node-6 { left: -15%; }
    }

    @keyframes ctab-flowDash {
        to { stroke-dashoffset: -100; }
    }
    #wp-ai-demo-cta .active-path {
        opacity: 0.7 !important;
        animation: ctab-flowDash 4s linear infinite;
    }

    #wp-ai-demo-cta #workflow-pulse {
        fill: var(--primary-orange);
        opacity: 0;
        transition: opacity 0.3s;
    }
</style>

<section id="wp-ai-demo-cta">
    <div class="cta-max-width">

        <div class="cta-content-main">
            <h2 class="cta-headline"><?php ee_h('ctab_h2', 'Ready to Move to an AI-Powered Admission CRM and Marketing Solution?'); ?></h2>
            <p class="cta-subheadline"><?php ee_h('ctab_subheadline', 'Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.'); ?></p>

            <div class="cta-action-area">
                <a href="<?php ee_u('ctab_cta_url', 'https://www.extraaedge.com/'); ?>" class="btn-premium"><?php ee_h('ctab_cta_text', 'Book a Demo'); ?></a>
                <div class="trust-indicator">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <?php ee_h('ctab_trust', 'Trusted by 250+ Premier Institutions Globally'); ?>
                </div>
            </div>
        </div>

        <div class="cta-storytelling-engine" id="cta-engine">
            <svg class="workflow-svg-layer" viewBox="0 0 500 500">
                <path id="flow-line" class="connection-path" d="" />
                <circle id="workflow-pulse" r="6" />
            </svg>

            <div class="expert-visual" id="expert-anchor">
                <img src="<?php ee_u('ctab_expert_img', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp'); ?>" alt="Admission Expert">
            </div>

            <div class="story-node node-1" data-id="0">
                <div class="node-icon">1</div>
                <div class="node-content">
                    <h4>Inquiry Received</h4>
                    <p>Omnichannel lead capture</p>
                </div>
            </div>

            <div class="story-node node-2" data-id="1">
                <div class="node-icon">2</div>
                <div class="node-content">
                    <h4>AI Response</h4>
                    <p>Instant personalized reply</p>
                </div>
            </div>

            <div class="story-node node-3" data-id="2">
                <div class="node-icon">3</div>
                <div class="node-content">
                    <h4>Lead Scoring</h4>
                    <p>Predictive intent analysis</p>
                </div>
            </div>

            <div class="story-node node-4" data-id="3">
                <div class="node-icon">4</div>
                <div class="node-content">
                    <h4>Auto Nurture</h4>
                    <p>Behavioral drip marketing</p>
                </div>
            </div>

            <div class="story-node node-5" data-id="4">
                <div class="node-icon">5</div>
                <div class="node-content">
                    <h4>Counselor Alert</h4>
                    <p>High-priority task created</p>
                </div>
            </div>

            <div class="story-node node-6" data-id="5">
                <div class="node-icon">6</div>
                <div class="node-content">
                    <h4>Admission Won</h4>
                    <p>Target achieved successfully</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        (function() {
            const engine = document.getElementById('cta-engine');
            if (!engine) return;
            const nodes = engine.querySelectorAll('.story-node');
            const flowLine = document.getElementById('flow-line');
            const pulse = document.getElementById('workflow-pulse');
            let currentIndex = 0;
            let cycleInterval;
            let engineIsActive = false;

            function getLocalCenter(el) {
                const rect = el.getBoundingClientRect();
                const parentRect = engine.getBoundingClientRect();
                return {
                    x: (rect.left + rect.width / 2) - parentRect.left,
                    y: (rect.top + rect.height / 2) - parentRect.top
                };
            }

            function runCycle() {
                nodes.forEach(n => n.classList.remove('active'));
                const activeNode = nodes[currentIndex];
                activeNode.classList.add('active');

                const start = { x: 250, y: 300 };
                const end = getLocalCenter(activeNode);

                flowLine.setAttribute('d', `M${start.x},${start.y} L${end.x},${end.y}`);
                flowLine.classList.add('active-path');

                pulse.style.opacity = "1";
                pulse.setAttribute('cx', end.x);
                pulse.setAttribute('cy', end.y);

                currentIndex = (currentIndex + 1) % nodes.length;
            }

            function activateEngine() {
                if(engineIsActive) return;
                engineIsActive = true;
                runCycle();
                cycleInterval = setInterval(runCycle, 3000);
            }

            engine.addEventListener('mouseenter', activateEngine);

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) activateEngine();
                });
            }, { threshold: 0.4 });
            observer.observe(engine);

            nodes.forEach((node, idx) => {
                node.addEventListener('click', () => {
                    currentIndex = idx;
                    clearInterval(cycleInterval);
                    runCycle();
                    cycleInterval = setInterval(runCycle, 4000);
                });
            });

            engine.addEventListener('mousemove', (e) => {
                if(!engineIsActive) return;
                const rect = engine.getBoundingClientRect();
                const mouseX = (e.clientX - rect.left) / rect.width - 0.5;
                const mouseY = (e.clientY - rect.top) / rect.height - 0.5;

                nodes.forEach((node, i) => {
                    const factor = (i + 1) * 8;
                    const isCentered = node.classList.contains('node-1') || node.classList.contains('node-4');
                    const xTrans = isCentered ? '-50%' : '0%';
                    node.style.transform = `translate(calc(${xTrans} + ${mouseX * factor}px), ${mouseY * factor}px) ${node.classList.contains('active') ? 'scale(1.08)' : 'scale(0.85)'}`;
                });
            });
        })();
    </script>
</section>
<!-- END AI Demo CTA Section -->

<?php get_footer(); ?>
