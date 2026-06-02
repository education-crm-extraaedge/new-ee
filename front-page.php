<?php
/**
 * front-page.php — High-converting Education CRM home page
 *
 * Phase A delivery: full visual design from the editor's brief (hero +
 * logos + VidyaAI scroll + pipeline + Convert More + testimonials +
 * AI Demo CTA) merged into one front-page template. All copy/CTAs/
 * stats are wrapped in ee_h()/ee_raw()/ee_u() helpers so the
 * existing Home Editor admin can drive every word — defaults render
 * if a field isn't filled.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

if (!function_exists('ee_h')) {
    function ee_h($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
        echo esc_html($val);
    }
}
if (!function_exists('ee_u')) {
    function ee_u($key, $default = '') {
        $opts = get_option('ee_home_settings', array());
        $val  = isset($opts[$key]) && $opts[$key] !== '' ? $opts[$key] : $default;
        echo esc_url($val);
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>

<style>
/* ═══ DESIGN TOKENS ══════════════════════════════════════════════ */
.ee-home,.ee-home *,.ee-home *::before,.ee-home *::after{box-sizing:border-box}
.ee-home{--orange:#DE6E30;--orange-dk:#c55a25;--blue:#19335D;--blue-dk:#0F172A;--ink:#19335D;--ink-soft:#475569;--ink-mute:#94A3B8;--bg:#fff;--bg-soft:#F8FAFC;--line:#E2E8F0;--line-soft:#F1F5F9;--success:#10b981;--shadow-sm:0 1px 2px rgba(25,51,93,.05),0 4px 14px rgba(25,51,93,.06);--shadow-md:0 14px 38px -12px rgba(25,51,93,.16);--shadow-lg:0 30px 70px -20px rgba(25,51,93,.22);--shadow-orange:0 18px 44px -14px rgba(222,110,48,.55);--radius-sm:12px;--radius:18px;--radius-lg:26px;--font-body:'Open Sans',system-ui,sans-serif;--font-head:'Poppins',sans-serif;--font-mono:'Inter',sans-serif;font-family:var(--font-body);color:var(--ink);background:var(--bg);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden}
.ee-home img{max-width:100%;height:auto;display:block}
.ee-home a{text-decoration:none;color:inherit}
.ee-wrap{max-width:1240px;margin:0 auto;padding:0 24px;position:relative}
.ee-btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;font-weight:700;padding:16px 32px;border-radius:14px;cursor:pointer;border:none;transition:all .35s cubic-bezier(.22,1,.36,1);font-family:var(--font-head);text-decoration:none;font-size:15px}
.ee-btn-primary{background:var(--orange);color:#fff;box-shadow:var(--shadow-orange)}
.ee-btn-primary:hover{transform:translateY(-3px);background:var(--orange-dk);box-shadow:0 24px 54px -14px rgba(222,110,48,.62)}
.ee-btn-outline{background:#fff;color:var(--blue);border:1.5px solid var(--line)}
.ee-btn-outline:hover{border-color:var(--blue);transform:translateY(-3px);box-shadow:var(--shadow-md)}
.ee-btn-lg{padding:20px 44px;font-size:17px}
.ee-pulse-dot{width:10px;height:10px;background:var(--success);border-radius:50%;box-shadow:0 0 10px var(--success);animation:eePulseGreen 2s infinite}
@keyframes eePulseGreen{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.3);opacity:.7}}
.ee-reveal{opacity:0;transform:translateY(28px);transition:opacity .8s cubic-bezier(.22,1,.36,1),transform .8s cubic-bezier(.22,1,.36,1)}
.ee-reveal.visible{opacity:1;transform:none}

/* ═══ HERO ══════════════════════════════════════════════════════ */
.ee-hero{position:relative;background:linear-gradient(160deg,#fff 0%,#f0f4f8 100%);padding:40px 0 60px;overflow:hidden}
.ee-hero::before{content:'';position:absolute;width:800px;height:800px;background:radial-gradient(circle,rgba(222,110,48,.06) 0%,transparent 70%);top:-300px;right:-200px;pointer-events:none}
.ee-hero-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:60px;align-items:center;position:relative;z-index:5}
.ee-hero-badge{display:inline-flex;align-items:center;gap:10px;background:#fff;border:1px solid rgba(25,51,93,.12);padding:10px 20px;border-radius:50px;font-size:13.5px;font-weight:600;color:var(--blue);width:fit-content;box-shadow:0 4px 15px rgba(25,51,93,.05);margin-bottom:24px}
.ee-hero-badge svg{color:var(--orange);width:18px;height:18px}
.ee-hero-h1{font-family:var(--font-head);font-size:clamp(40px,5.2vw,68px);line-height:1.05;font-weight:800;margin:0 0 22px;color:var(--blue);letter-spacing:-1.5px}
.ee-hero-h1 span{color:var(--orange);display:block}
.ee-hero-sub{font-family:var(--font-head);font-size:clamp(18px,2vw,22px);font-weight:600;margin:0 0 14px;color:var(--blue);line-height:1.3}
.ee-hero-desc{font-size:17px;line-height:1.75;color:var(--ink-soft);max-width:580px;margin:0 0 30px}
.ee-hero-cta-row{display:flex;align-items:center;gap:22px;flex-wrap:wrap}
.ee-hero-live{display:flex;align-items:center;gap:10px;font-weight:700;font-size:14px;color:var(--blue)}
/* Hero AI Visual */
.ee-hero-visual{position:relative;display:flex;flex-direction:column;align-items:center;gap:24px;min-height:520px;justify-content:center}
.ee-flow-card{background:#fff;border:1px solid rgba(25,51,93,.1);border-radius:24px;padding:24px;box-shadow:0 25px 50px rgba(25,51,93,.08);width:100%;max-width:420px;opacity:0;transform:translateY(20px);transition:all .6s cubic-bezier(.22,1,.36,1)}
.ee-flow-card.is-visible{opacity:1;transform:translateY(0)}
.ee-status-tag{display:inline-flex;align-items:center;font-size:10px;text-transform:uppercase;font-weight:800;letter-spacing:1px;padding:5px 12px;border-radius:6px;background:#f1f5f9;color:var(--ink-soft);margin-bottom:12px}
.ee-status-hot{background:#fee2e2;color:#ef4444}
.ee-status-success{background:#dcfce7;color:var(--success)}
.ee-chat-msg{font-size:14px;padding:14px 18px;border-radius:14px;margin:0 0 10px;line-height:1.5}
.ee-msg-user{background:#f1f5f9;color:var(--ink)}
.ee-msg-ai{background:rgba(222,110,48,.12);color:var(--orange);font-weight:600;text-align:right}
.ee-ai-core{width:140px;height:140px;background:var(--blue);border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;box-shadow:0 0 60px rgba(25,51,93,.25);position:relative}
.ee-ai-core.active{animation:eeAiBreath 3s infinite ease-in-out}
.ee-ai-core::before{content:'';position:absolute;inset:-4px;border:2px solid var(--orange);border-radius:50%;opacity:0}
.ee-ai-core.active::before{animation:eeAiScan 2s infinite ease-out}
@keyframes eeAiBreath{0%,100%{transform:scale(1)}50%{transform:scale(1.08);box-shadow:0 0 80px rgba(222,110,48,.4)}}
@keyframes eeAiScan{0%{transform:scale(.95);opacity:.8}100%{transform:scale(1.35);opacity:0}}
.ee-form-box{background:#fff;border:1px solid var(--line);border-radius:24px;padding:32px;box-shadow:var(--shadow-lg);position:relative}
.ee-form-box::before{content:"Book a Free Demo";position:absolute;top:-14px;left:50%;transform:translateX(-50%);background:var(--orange);color:#fff;padding:7px 22px;border-radius:50px;font-weight:700;font-size:11px;letter-spacing:.04em;white-space:nowrap;box-shadow:var(--shadow-orange)}
.ee-form-box .secure{text-align:center;margin-top:18px;font-size:10.5px;color:var(--ink-mute);font-weight:600;letter-spacing:.08em;text-transform:uppercase}

/* ═══ TRUST BAR ═════════════════════════════════════════════════ */
.ee-trust-bar{padding:30px 0;border-top:1px solid var(--line-soft);background:#fff}
.ee-trust-flex{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;gap:30px}
.ee-trust-rating{font-weight:700;font-size:14px;color:var(--ink);display:flex;align-items:center;gap:8px}
.ee-trust-rating .stars{color:var(--orange);letter-spacing:2px}
.ee-trust-rating span{font-weight:500;font-size:12px;color:var(--ink-mute)}
.ee-comp-row{display:flex;gap:24px;flex-wrap:wrap;align-items:center}
.ee-comp-item{display:flex;align-items:center;gap:9px;font-weight:700;font-size:11.5px;color:var(--ink-mute)}
.ee-comp-item img{height:24px;width:auto}

/* ═══ SECTION FRAMEWORK ════════════════════════════════════════ */
.ee-section{padding:60px 0;position:relative}
.ee-section-head{text-align:center;max-width:760px;margin:0 auto 40px}
.ee-kicker{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.1);color:var(--orange);padding:7px 18px;border-radius:50px;font-weight:800;font-size:11px;letter-spacing:.15em;text-transform:uppercase;margin-bottom:16px}
.ee-section-h2{font-family:var(--font-head);font-size:clamp(30px,4.2vw,52px);font-weight:800;color:var(--blue);line-height:1.1;margin:0 0 18px;letter-spacing:-1px}
.ee-section-h2 .uacc{color:var(--orange)}
.ee-section-sub{font-size:17px;line-height:1.7;color:var(--ink-soft);max-width:680px;margin:0 auto}

/* ═══ PIPELINE / FUNNEL ════════════════════════════════════════ */
.ee-funnel{padding:80px 0;background:var(--bg-soft)}
.ee-funnel-system{position:relative;padding:90px 0 30px;margin:20px 0}
.ee-funnel-track{display:flex;justify-content:space-between;position:relative;z-index:2;gap:10px}
.ee-track-line{position:absolute;top:50%;left:10%;right:10%;height:4px;background:#e2e8f0;z-index:1;transform:translateY(-50%)}
.ee-track-progress{position:absolute;top:0;left:0;height:100%;width:0%;background:var(--orange);box-shadow:0 0 15px var(--orange);transition:width .5s linear}
.ee-stage{flex:1;display:flex;flex-direction:column;align-items:center;text-align:center;position:relative}
.ee-stage-dot{width:22px;height:22px;background:#fff;border:3px solid #e2e8f0;border-radius:50%;margin-bottom:12px;z-index:3;transition:all .4s}
.ee-stage.active .ee-stage-dot{border-color:var(--orange);background:var(--orange);box-shadow:0 0 0 6px rgba(222,110,48,.15)}
.ee-stage-label{font-family:var(--font-head);font-weight:600;font-size:13px;color:#94a3b8;transition:.3s}
.ee-stage.active .ee-stage-label{color:var(--blue)}
.ee-lead-card{background:#fff;padding:14px;border-radius:12px;width:190px;box-shadow:var(--shadow-md);border-left:4px solid var(--orange);position:absolute;top:-90px;left:0;z-index:10;pointer-events:none}
.ee-lead-card .ct{font-weight:700;font-size:14px;color:var(--blue)}
.ee-lead-card .cm{font-size:11.5px;color:var(--ink-soft);margin-top:4px}
.ee-funnel-cards{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:30px}
.ee-funnel-card{background:#fff;padding:30px;border-radius:20px;box-shadow:var(--shadow-sm);transition:all .4s}
.ee-funnel-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-md)}
.ee-fc-ic{width:48px;height:48px;background:rgba(222,110,48,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:18px;color:var(--orange)}
.ee-fc-h3{font-family:var(--font-head);font-size:18px;font-weight:700;margin:0 0 10px;color:var(--blue)}
.ee-fc-p{color:var(--ink-soft);font-size:14.5px;margin:0 0 18px}
.ee-fc-tag{display:inline-block;background:var(--blue);color:#fff;padding:5px 14px;border-radius:50px;font-size:11.5px;font-weight:600}

/* ═══ TESTIMONIALS / CRM STORIES ═══════════════════════════════ */
.ee-stories{background:var(--bg-soft);padding:80px 0}
.ee-metrics-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:50px}
.ee-metric{background:#fff;padding:32px 20px;border-radius:22px;text-align:center;box-shadow:var(--shadow-sm);transition:transform .4s}
.ee-metric:hover{transform:translateY(-6px);box-shadow:var(--shadow-md)}
.ee-metric-val{font-family:var(--font-head);font-size:42px;font-weight:800;color:var(--orange);display:block;line-height:1;margin-bottom:6px}
.ee-metric-lab{font-size:12.5px;font-weight:700;color:var(--ink-soft);text-transform:uppercase;letter-spacing:1px}
.ee-cards-3{display:grid;grid-template-columns:repeat(3,1fr);gap:30px}
.ee-story-card{background:#fff;border-radius:28px;overflow:hidden;box-shadow:var(--shadow-md);display:flex;flex-direction:column;transition:transform .4s}
.ee-story-card:hover{transform:translateY(-10px);box-shadow:var(--shadow-lg)}
.ee-vid{position:relative;aspect-ratio:16/9;background:#000;cursor:pointer;overflow:hidden}
.ee-vid img{width:100%;height:100%;object-fit:cover;transition:transform 1s}
.ee-story-card:hover .ee-vid img{transform:scale(1.06)}
.ee-play{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:70px;height:70px;background:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 12px 30px rgba(0,0,0,.32);transition:all .4s}
.ee-play::after{content:'';border-left:18px solid var(--orange);border-top:12px solid transparent;border-bottom:12px solid transparent;margin-left:5px}
.ee-story-card:hover .ee-play{background:var(--orange)}
.ee-story-card:hover .ee-play::after{border-left-color:#fff}
.ee-vid.playing .ee-vid-thumb{opacity:0;pointer-events:none}
.ee-vid-thumb{position:absolute;inset:0;z-index:10;transition:opacity .5s}
.ee-vid-slot{width:100%;height:100%}
.ee-story-body{padding:30px;flex:1;display:flex;flex-direction:column}
.ee-story-quote{font-size:14.5px;line-height:1.72;color:var(--ink-soft);margin-bottom:24px;font-style:italic}
.ee-story-profile{margin-top:auto;display:flex;align-items:center;gap:14px;padding-top:20px;border-top:1px solid var(--line-soft)}
.ee-story-avatar{width:60px;height:60px;border-radius:14px;object-fit:cover;border:2px solid rgba(222,110,48,.2);transition:.3s}
.ee-story-card:hover .ee-story-avatar{border-color:var(--orange);border-radius:50%}
.ee-story-name{font-weight:800;font-size:16px;color:var(--blue);margin:0}
.ee-story-role{font-size:12px;color:var(--orange);font-weight:700;margin:2px 0}
.ee-story-inst{font-size:11px;color:var(--ink-mute);font-weight:700;text-transform:uppercase;letter-spacing:.04em}

/* ═══ FINAL CTA ═════════════════════════════════════════════════ */
.ee-final-cta{padding:80px 0;background:#fff}
.ee-cta-grid{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
.ee-cta-h2{font-family:var(--font-head);font-size:clamp(32px,4vw,48px);font-weight:800;color:var(--blue);line-height:1.1;margin:0 0 22px;letter-spacing:-1px}
.ee-cta-sub{font-size:17px;line-height:1.7;color:var(--ink-soft);margin:0 0 30px;max-width:520px}
.ee-cta-actions{display:flex;flex-direction:column;gap:16px;align-items:flex-start}
.ee-trust-line{display:flex;align-items:center;gap:10px;font-weight:600;font-size:13.5px;color:var(--ink-soft)}
.ee-trust-line svg{color:var(--orange);width:20px;height:20px;flex-shrink:0}
.ee-engine{position:relative;height:500px;display:flex;align-items:center;justify-content:center}
.ee-expert{position:relative;width:240px;height:240px;z-index:5}
.ee-expert img{width:100%;height:100%;object-fit:cover;border-radius:50%;border:8px solid #fff;box-shadow:var(--shadow-lg)}
.ee-expert-ring{position:absolute;inset:-16px;border:1.5px dashed var(--orange);border-radius:50%;opacity:.45;animation:eeSpin 30s linear infinite}
@keyframes eeSpin{to{transform:rotate(360deg)}}
.ee-wn{position:absolute;background:#fff;border:1px solid var(--line-soft);border-radius:18px;padding:14px 18px;display:flex;align-items:center;gap:12px;z-index:10;width:230px;opacity:.4;transform:scale(.88);transition:all .4s;cursor:pointer;box-shadow:var(--shadow-sm)}
.ee-wn.active{opacity:1;border-color:rgba(222,110,48,.4);box-shadow:var(--shadow-lg);z-index:100;transform:scale(1)}
.ee-wn-num{width:36px;height:36px;background:var(--blue);border-radius:11px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:14px;flex-shrink:0;transition:.3s}
.ee-wn.active .ee-wn-num{background:var(--orange)}
.ee-wn-t{font-weight:800;font-size:13px;color:var(--blue);margin:0 0 2px;font-family:var(--font-head)}
.ee-wn-s{font-size:11px;color:var(--ink-mute);margin:0}
.ee-wn-1{top:0%;left:50%;transform:translateX(-50%) scale(.88)}
.ee-wn-2{top:22%;right:-2%}
.ee-wn-3{bottom:22%;right:-2%}
.ee-wn-4{bottom:0%;left:50%;transform:translateX(-50%) scale(.88)}
.ee-wn-5{bottom:22%;left:-2%}
.ee-wn-6{top:22%;left:-2%}
.ee-wn-1.active,.ee-wn-4.active{transform:translateX(-50%) scale(1)}

/* ═══ RESPONSIVE ════════════════════════════════════════════════ */
@media(max-width:1080px){
  .ee-hero-grid{grid-template-columns:1fr;gap:48px;text-align:center}
  .ee-hero-visual{order:-1}
  .ee-hero-badge{margin-left:auto;margin-right:auto}
  .ee-hero-cta-row{justify-content:center}
  .ee-cta-grid{grid-template-columns:1fr;gap:48px;text-align:center}
  .ee-cta-actions{align-items:center}
}
@media(max-width:880px){
  .ee-section{padding:48px 0}
  .ee-funnel,.ee-stories,.ee-final-cta{padding:60px 0}
  .ee-metrics-grid{grid-template-columns:repeat(2,1fr)}
  .ee-cards-3{grid-template-columns:1fr;max-width:480px;margin:0 auto}
  .ee-funnel-cards{grid-template-columns:1fr}
  .ee-engine{transform:scale(.86)}
  .ee-funnel-track{flex-direction:column;align-items:flex-start;gap:30px;padding-left:40px}
  .ee-track-line{left:50px;top:0;bottom:0;width:4px;height:100%;transform:none}
  .ee-track-progress{width:100%!important;height:0%;transition:height .5s linear}
  .ee-stage{flex-direction:row;text-align:left;gap:20px;width:100%}
  .ee-stage-dot{margin-bottom:0}
  .ee-lead-card{left:80px!important;top:0;width:160px}
}
@media(max-width:600px){
  .ee-hero{padding:30px 0 50px}
  .ee-hero-h1{font-size:38px}
  .ee-hero-cta-row{flex-direction:column;align-items:stretch}
  .ee-hero-cta-row .ee-btn{width:100%}
  .ee-metrics-grid{grid-template-columns:1fr}
}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.001ms!important;transition-duration:.001ms!important}.ee-reveal{opacity:1!important;transform:none!important}}
</style>

<div class="ee-home">

<!-- ════════ HERO ════════ -->
<section class="ee-hero" id="top">
  <div class="ee-wrap">
    <div class="ee-hero-grid">
      <div>
        <div class="ee-hero-badge ee-reveal">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <?php ee_h('hero_badge', 'Loved by 500+ Admission Teams'); ?>
        </div>
        <h1 class="ee-hero-h1 ee-reveal">
          <?php ee_h('hero_h1_before', 'Convert More Students.'); ?>
          <span><?php ee_h('hero_h1_highlight', 'Automatically.'); ?></span>
        </h1>
        <p class="ee-hero-sub ee-reveal"><?php ee_h('hero_sub', 'India\'s #1 AI-Powered Admission CRM. Trusted by 500+ institutions.'); ?></p>
        <p class="ee-hero-desc ee-reveal"><?php ee_h('hero_desc', 'AI Lead Intent Scoring, Smart Follow-up Automation, AI Calling at scale, and Counselor Performance Intelligence — all in one platform built for modern education teams.'); ?></p>
        <div class="ee-hero-cta-row ee-reveal">
          <a href="#demo-form" class="ee-btn ee-btn-primary ee-btn-lg" onclick="eeScrollToForm(event)"><?php ee_h('hero_cta_text', 'Book a Free Demo'); ?>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <div class="ee-hero-live"><span class="ee-pulse-dot"></span><span id="ee-live-counter"><?php ee_h('hero_live_count', '412'); ?></span>&nbsp;<?php ee_h('hero_live_text', 'Students Converted Today'); ?></div>
        </div>
      </div>
      <div class="ee-hero-visual" aria-hidden="true">
        <?php
        /* Right column: either the embedded Book Demo form OR the AI
           simulation visual. Editor decides via _hero_form_embed. */
        $form = ee_raw('hero_form_embed', '');
        if ($form): ?>
          <aside class="ee-form-box ee-reveal" id="demo-form" aria-label="Book Demo Form">
            <?php echo $form; ?>
            <p class="secure">🔒 Secure Data Transmission Active</p>
          </aside>
        <?php else: ?>
          <div class="ee-flow-card" id="ee-card-inbound">
            <div class="ee-status-tag">Inbound Message</div>
            <div class="ee-chat-msg ee-msg-user" id="ee-text-inbound"></div>
          </div>
          <div class="ee-ai-core" id="ee-ai-processor">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:8px"><path d="M12 2a10 10 0 1 0 10 10H12V2z"/><path d="M12 12L2.1 12"/><path d="M12 12L12 22.1"/><path d="M12 12l7.07-7.07"/></svg>
            <span style="font-size:13px;font-weight:800;font-family:var(--font-head);letter-spacing:1px">AI CORE</span>
            <span id="ee-ai-status" style="font-size:9px;opacity:.8;margin-top:4px">IDLE</span>
          </div>
          <div class="ee-flow-card" id="ee-card-outcome">
            <div class="ee-status-tag" style="align-self:flex-end">AI Response</div>
            <div class="ee-chat-msg ee-msg-ai" id="ee-text-outcome"></div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:5px">
              <span class="ee-status-tag ee-status-hot">Qualified Lead</span>
              <span class="ee-status-tag ee-status-success" style="font-weight:800">Admitted 🎉</span>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ════════ TRUST BAR ════════ -->
<section class="ee-trust-bar">
  <div class="ee-wrap ee-trust-flex">
    <div class="ee-trust-rating">
      <span class="stars">★★★★★</span>
      <?php ee_h('trust_rating', '4.9/5 by 500+ education leaders'); ?>
      <span><?php ee_h('trust_text', 'verified G2 & Capterra reviews'); ?></span>
    </div>
    <div class="ee-comp-row">
      <div class="ee-comp-item"><img src="<?php ee_u('comp_iso_img', 'https://www.extraaedge.com/wp-content/uploads/2025/09/iso-0001.png'); ?>" alt="ISO Certified"><span>ISO 27001</span></div>
      <div class="ee-comp-item"><img src="<?php ee_u('comp_gdpr_img', 'https://www.extraaedge.com/wp-content/uploads/2025/09/GDPR-NEW.png'); ?>" alt="GDPR Compliant"><span>GDPR Compliant</span></div>
      <div class="ee-comp-item"><span style="font-size:18px">☁️</span><span>Enterprise-Grade Cloud</span></div>
    </div>
  </div>
</section>

<!-- ════════ LOGO MARQUEE (global) ════════ -->
<?php if (function_exists('ee_render_logo_marquee')) ee_render_logo_marquee(); ?>

<!-- ════════ PIPELINE / FUNNEL ════════ -->
<section class="ee-funnel" id="pipeline">
  <div class="ee-wrap">
    <header class="ee-section-head ee-reveal">
      <div class="ee-kicker"><?php ee_h('funnel_kicker', 'Admission Pipeline'); ?></div>
      <h2 class="ee-section-h2"><?php ee_h('funnel_h2', 'Every admission. Tracked.'); ?> <span class="uacc"><?php ee_h('funnel_h2_accent', 'Moving forward.'); ?></span></h2>
      <p class="ee-section-sub"><?php ee_h('funnel_sub', 'Centralize your entire admissions process with real-time visibility. From first inquiry to final enrolment, intelligent prioritization ensures your team focuses on candidates that convert.'); ?></p>
    </header>
    <div class="ee-funnel-system" id="ee-pipeline-container">
      <div class="ee-track-line"><div class="ee-track-progress" id="ee-pipeline-progress"></div></div>
      <div class="ee-funnel-track">
        <div class="ee-lead-card" id="ee-active-lead"><span class="ct" id="ee-lead-name">New Inquiry</span><span class="cm" id="ee-lead-status">Analyzing Intent...</span></div>
        <div class="ee-stage" data-label="New Inquiry"><div class="ee-stage-dot"></div><span class="ee-stage-label">Inquiry</span></div>
        <div class="ee-stage" data-label="Lead Scored"><div class="ee-stage-dot"></div><span class="ee-stage-label">Verified</span></div>
        <div class="ee-stage" data-label="Nurturing"><div class="ee-stage-dot"></div><span class="ee-stage-label">Automation</span></div>
        <div class="ee-stage" data-label="High Intent"><div class="ee-stage-dot"></div><span class="ee-stage-label">Counseling</span></div>
        <div class="ee-stage" data-label="Finalizing"><div class="ee-stage-dot"></div><span class="ee-stage-label">Enrolled</span></div>
      </div>
    </div>
    <div class="ee-funnel-cards ee-reveal">
      <article class="ee-funnel-card">
        <div class="ee-fc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
        <h3 class="ee-fc-h3"><?php ee_h('funnel_card1_t', 'Funnel Management'); ?></h3>
        <p class="ee-fc-p"><?php ee_h('funnel_card1_p', 'Gain full visibility into the prospect journey. Track every touchpoint and eliminate bottlenecks automatically.'); ?></p>
        <span class="ee-fc-tag"><?php ee_h('funnel_card1_tag', '"Nothing gets stuck"'); ?></span>
      </article>
      <article class="ee-funnel-card">
        <div class="ee-fc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
        <h3 class="ee-fc-h3"><?php ee_h('funnel_card2_t', 'Smart Follow-ups'); ?></h3>
        <p class="ee-fc-p"><?php ee_h('funnel_card2_p', 'Intelligent triggers manage application reminders and engagement while your team focuses on high-potential leads.'); ?></p>
        <span class="ee-fc-tag"><?php ee_h('funnel_card2_tag', 'Engagement: +65%'); ?></span>
      </article>
      <article class="ee-funnel-card">
        <div class="ee-fc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/></svg></div>
        <h3 class="ee-fc-h3"><?php ee_h('funnel_card3_t', 'Real-time Insights'); ?></h3>
        <p class="ee-fc-p"><?php ee_h('funnel_card3_p', 'Data-driven decisions guided by a central dashboard. Identify top-performing channels instantly.'); ?></p>
        <span class="ee-fc-tag"><?php ee_h('funnel_card3_tag', 'Data-guided Growth'); ?></span>
      </article>
    </div>
    <div style="text-align:center;margin-top:40px"><a href="#demo-form" onclick="eeScrollToForm(event)" class="ee-btn ee-btn-primary ee-btn-lg"><?php ee_h('funnel_cta', 'Book a Demo'); ?>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a></div>
  </div>
</section>

<!-- ════════ CRM IMPACT STORIES (testimonials) ════════ -->
<section class="ee-stories" id="testimonials">
  <div class="ee-wrap">
    <header class="ee-section-head ee-reveal">
      <div class="ee-kicker"><?php ee_h('stories_kicker', 'CRM Impact Stories'); ?></div>
      <h2 class="ee-section-h2"><?php ee_h('stories_h2', 'Powering Growth for'); ?> <span class="uacc"><?php ee_h('stories_h2_accent', '500+ Happy Customers'); ?></span></h2>
      <p class="ee-section-sub"><?php ee_h('stories_sub', 'From streamlined counselor workflows to data-driven reporting, see how education leaders rewrite their success stories with ExtraaEdge.'); ?></p>
    </header>
    <div class="ee-metrics-grid ee-reveal">
      <div class="ee-metric"><span class="ee-metric-val" data-target="500" data-suffix="+">0</span><span class="ee-metric-lab">Happy Customers</span></div>
      <div class="ee-metric"><span class="ee-metric-val" data-target="3" data-suffix="X">0</span><span class="ee-metric-lab">Conversion Rate</span></div>
      <div class="ee-metric"><span class="ee-metric-val" data-target="15000" data-suffix="+" data-locale="true">0</span><span class="ee-metric-lab">Daily Power Users</span></div>
      <div class="ee-metric"><span class="ee-metric-val" data-target="99" data-suffix="%">0</span><span class="ee-metric-lab">Support Rating</span></div>
    </div>
    <div class="ee-cards-3 ee-reveal">
      <article class="ee-story-card">
        <div class="ee-vid" id="ee-vid-1" onclick="eePlayVideo('ee-vid-1','3SHgLf1GFgk')" role="button"><div class="ee-vid-thumb"><img src="https://img.youtube.com/vi/3SHgLf1GFgk/maxresdefault.jpg" alt="Silky Jain Marwah - Tula's Institute"><div class="ee-play"></div></div><div class="ee-vid-slot"></div></div>
        <div class="ee-story-body">
          <blockquote class="ee-story-quote">"ExtraaEdge truly understands our needs. Whether it's from a counsellor's or an admin's perspective, most changes we require are implemented in a very short span. Creating new reports on our own has been a game-changer."</blockquote>
          <div class="ee-story-profile"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Silky-Jain-Marwah.webp" class="ee-story-avatar" alt="Silky Jain Marwah"><div><p class="ee-story-name">Silky Jain Marwah</p><p class="ee-story-role">Executive Director</p><span class="ee-story-inst">Tula's Institute</span></div></div>
        </div>
      </article>
      <article class="ee-story-card">
        <div class="ee-vid" id="ee-vid-2" onclick="eePlayVideo('ee-vid-2','dWLdQ8E3FOU')" role="button"><div class="ee-vid-thumb"><img src="https://img.youtube.com/vi/dWLdQ8E3FOU/maxresdefault.jpg" alt="Pranay Rupani - Annapurna College"><div class="ee-play"></div></div><div class="ee-vid-slot"></div></div>
        <div class="ee-story-body">
          <blockquote class="ee-story-quote">"ExtraaEdge has been a true game-changer for us. From seamless WhatsApp integrations to automated workflows, our entire lead journey is now streamlined and measurable."</blockquote>
          <div class="ee-story-profile"><img src="https://www.extraaedge.com/wp-content/uploads/2025/10/Pranay-sir-02.webp" class="ee-story-avatar" alt="Pranay Rupani"><div><p class="ee-story-name">Pranay Rupani</p><p class="ee-story-role">Head of Admissions & Marketing</p><span class="ee-story-inst">Annapurna College of Film & Media</span></div></div>
        </div>
      </article>
      <article class="ee-story-card">
        <div class="ee-vid" id="ee-vid-3" onclick="eePlayVideo('ee-vid-3','yfK83D2SKps')" role="button"><div class="ee-vid-thumb"><img src="https://img.youtube.com/vi/yfK83D2SKps/maxresdefault.jpg" alt="K. Nirmala Devi - Indian Academy Group"><div class="ee-play"></div></div><div class="ee-vid-slot"></div></div>
        <div class="ee-story-body">
          <blockquote class="ee-story-quote">"The platform is very user-friendly. The technical team is accessible anytime, anywhere, and resolves issues immediately without any delays."</blockquote>
          <div class="ee-story-profile"><img src="https://www.extraaedge.com/wp-content/uploads/2025/01/Nirmala-Devi.webp" class="ee-story-avatar" alt="K. Nirmala Devi"><div><p class="ee-story-name">K. Nirmala Devi</p><p class="ee-story-role">Assistant Manager</p><span class="ee-story-inst">Indian Academy Group</span></div></div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ════════ FINAL AI DEMO CTA ════════ -->
<section class="ee-final-cta" id="final-cta">
  <div class="ee-wrap">
    <div class="ee-cta-grid">
      <div>
        <div class="ee-kicker"><?php ee_h('final_kicker', 'Ready to Convert More'); ?></div>
        <h2 class="ee-cta-h2"><?php ee_h('final_h2', 'Ready to move to an AI-powered Admission CRM?'); ?></h2>
        <p class="ee-cta-sub"><?php ee_h('final_sub', 'Know how you can scale your admission process & achieve your targets. Book a 45-minute free demo.'); ?></p>
        <div class="ee-cta-actions">
          <a href="#demo-form" onclick="eeScrollToForm(event)" class="ee-btn ee-btn-primary ee-btn-lg"><?php ee_h('final_cta_text', 'Book a Demo'); ?>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <div class="ee-trust-line">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <?php ee_h('final_trust', 'Trusted by 250+ Premier Institutions Globally'); ?>
          </div>
        </div>
      </div>
      <div class="ee-engine" id="ee-cta-engine">
        <div class="ee-expert"><span class="ee-expert-ring"></span><img src="<?php ee_u('final_expert_img', 'https://www.extraaedge.com/wp-content/uploads/2024/08/Charu-400x400-1-300x300-1.webp'); ?>" alt="Admission Expert"></div>
        <div class="ee-wn ee-wn-1"><div class="ee-wn-num">1</div><div><p class="ee-wn-t">Inquiry Received</p><p class="ee-wn-s">Omnichannel lead capture</p></div></div>
        <div class="ee-wn ee-wn-2"><div class="ee-wn-num">2</div><div><p class="ee-wn-t">AI Response</p><p class="ee-wn-s">Instant personalized reply</p></div></div>
        <div class="ee-wn ee-wn-3"><div class="ee-wn-num">3</div><div><p class="ee-wn-t">Lead Scoring</p><p class="ee-wn-s">Predictive intent analysis</p></div></div>
        <div class="ee-wn ee-wn-4"><div class="ee-wn-num">4</div><div><p class="ee-wn-t">Auto Nurture</p><p class="ee-wn-s">Behavioral drip marketing</p></div></div>
        <div class="ee-wn ee-wn-5"><div class="ee-wn-num">5</div><div><p class="ee-wn-t">Counselor Alert</p><p class="ee-wn-s">High-priority task created</p></div></div>
        <div class="ee-wn ee-wn-6"><div class="ee-wn-num">6</div><div><p class="ee-wn-t">Admission Won</p><p class="ee-wn-s">Target achieved successfully</p></div></div>
      </div>
    </div>
  </div>
</section>

</div><!-- /.ee-home -->

<script>
(function(){'use strict';
/* Reveal on scroll */
var revObs=new IntersectionObserver(function(es){es.forEach(function(e,i){if(e.isIntersecting){setTimeout(function(){e.target.classList.add('visible');},i*55);revObs.unobserve(e.target);}});},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.ee-reveal').forEach(function(el){revObs.observe(el);});
window.eeScrollToForm=function(e){if(e&&e.preventDefault)e.preventDefault();var t=document.getElementById('demo-form');if(t)window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-90,behavior:'smooth'});};
window.eePlayVideo=function(id,yt){var c=document.getElementById(id);if(!c||c.classList.contains('playing'))return;c.querySelector('.ee-vid-slot').innerHTML='<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+yt+'?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="autoplay;encrypted-media" allowfullscreen style="display:block"></iframe>';c.classList.add('playing');};

/* Hero AI simulation (only runs if visual elements exist) */
(function(){
  var inboundCard=document.getElementById('ee-card-inbound'),outcomeCard=document.getElementById('ee-card-outcome'),aiNode=document.getElementById('ee-ai-processor');
  if(!inboundCard||!outcomeCard||!aiNode)return;
  var inText=document.getElementById('ee-text-inbound'),outText=document.getElementById('ee-text-outcome'),aiLabel=document.getElementById('ee-ai-status');
  var scenarios=[
    {in:"I want to apply for the MBA. What's the deadline?",out:"Hi! Deadline is Oct 15th. You qualify for our fast-track scholarship! Book a call?",status:"ANALYZING INTENT"},
    {in:"Do you offer financial aid for international students?",out:"Yes! 3 grants for your region. I've sent details to your email and notified a counselor.",status:"OPTIMIZING ENGAGEMENT"},
    {in:"I'm looking for part-time Masters starting January.",out:"Perfect. 2 hybrid spots left. I've prioritized your application for immediate review.",status:"PRIORITIZING LEAD"}
  ];
  var cur=0;
  function typeIt(el,text,speed){return new Promise(function(res){el.innerHTML="";var i=0;var t=setInterval(function(){if(i<text.length){el.innerHTML+=text.charAt(i);i++;}else{clearInterval(t);res();}},speed||35);});}
  async function run(){
    var s=scenarios[cur];
    inboundCard.classList.remove('is-visible');outcomeCard.classList.remove('is-visible');aiNode.classList.remove('active');aiLabel.innerText="WAITING";
    await new Promise(function(r){setTimeout(r,800);});
    inboundCard.classList.add('is-visible');await typeIt(inText,s.in,35);
    await new Promise(function(r){setTimeout(r,600);});
    aiNode.classList.add('active');aiLabel.innerText=s.status;
    await new Promise(function(r){setTimeout(r,1500);});
    outcomeCard.classList.add('is-visible');await typeIt(outText,s.out,28);
    cur=(cur+1)%scenarios.length;setTimeout(run,4500);
  }
  run();
})();
/* Live counter */
(function(){var c=document.getElementById('ee-live-counter');if(!c)return;setInterval(function(){if(Math.random()>.6){c.innerText=parseInt(c.innerText,10)+1;}},7000);})();
/* Pipeline visualization */
(function(){
  var stages=document.querySelectorAll('#pipeline .ee-stage'),progress=document.getElementById('ee-pipeline-progress'),leadCard=document.getElementById('ee-active-lead'),leadName=document.getElementById('ee-lead-name'),leadStatus=document.getElementById('ee-lead-status'),pipeContainer=document.getElementById('ee-pipeline-container');
  if(!stages.length)return;
  var names=["Ruchika S.","Amit K.","Sara J.","David L.","Priya M.","Karan P."];
  var stageIdx=0,nameIdx=0;
  function update(){
    var isMobile=window.innerWidth<=880;
    var containerRect=pipeContainer.getBoundingClientRect();
    var target=stages[stageIdx];var stageRect=target.getBoundingClientRect();
    leadCard.style.transition="all .8s cubic-bezier(.22,1,.36,1)";
    if(!isMobile){
      var x=stageRect.left-containerRect.left+(stageRect.width/2)-(leadCard.offsetWidth/2);
      leadCard.style.left=x+"px";leadCard.style.top="-90px";
      var pct=(stageIdx/(stages.length-1))*80+10;progress.style.width=(stageIdx===0?0:pct)+"%";progress.style.height="100%";
    } else {
      var y=stageRect.top-containerRect.top+(stageRect.height/2)-(leadCard.offsetHeight/2);
      leadCard.style.top=y+"px";progress.style.height=((stageIdx/(stages.length-1))*100)+"%";progress.style.width="100%";
    }
    stages.forEach(function(s,i){s.classList.toggle('active',i<=stageIdx);});
    leadStatus.innerText=target.getAttribute('data-label');
    if(stageIdx<stages.length-1)stageIdx++;else{setTimeout(function(){stageIdx=0;nameIdx=(nameIdx+1)%names.length;leadName.innerText=names[nameIdx];leadCard.style.opacity="0";setTimeout(function(){leadCard.style.opacity="1";},100);},2000);}
  }
  leadName.innerText=names[0];setInterval(update,2500);window.addEventListener('resize',update);update();
})();
/* Metric counters */
(function(){
  var section=document.querySelector('.ee-stories');if(!section)return;var triggered=false;
  function fire(){
    if(triggered)return;triggered=true;
    document.querySelectorAll('.ee-metric-val').forEach(function(el){
      var target=+el.getAttribute('data-target'),suffix=el.getAttribute('data-suffix')||'',useLocale=el.getAttribute('data-locale')==='true',start=null,dur=2000;
      function anim(ts){if(!start)start=ts;var p=Math.min((ts-start)/dur,1),c=Math.floor(p*target);el.textContent=(useLocale?c.toLocaleString():c)+suffix;if(p<1)requestAnimationFrame(anim);}
      requestAnimationFrame(anim);
    });
  }
  new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)fire();});},{threshold:.2}).observe(section);
})();
/* Final CTA workflow nodes cycle */
(function(){
  var eng=document.getElementById('ee-cta-engine'),nodes=document.querySelectorAll('#ee-cta-engine .ee-wn');if(!eng||!nodes.length)return;
  var cur=0,iv=null;
  function cycle(){nodes.forEach(function(n){n.classList.remove('active');});nodes[cur].classList.add('active');cur=(cur+1)%nodes.length;}
  function start(){if(iv)return;cycle();iv=setInterval(cycle,2400);}
  eng.addEventListener('mouseenter',start);
  new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting)start();});},{threshold:.3}).observe(eng);
  nodes.forEach(function(n,i){n.addEventListener('click',function(){cur=i;clearInterval(iv);iv=null;cycle();start();});});
})();
})();
</script>

<?php get_footer(); ?>
