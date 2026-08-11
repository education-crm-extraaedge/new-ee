<?php
/**
 * page-book-demo.php — /book-a-demo/ light split landing.
 *
 * Left: customer-success story (quote + verified customer card + video),
 * outcome stats, trust badges and the institution logo marquee.
 * Right: sticky demo card running the ee-form-7 enquiry widget.
 *
 * Routed via $ee_custom_routes in functions.php.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

get_header();
?>
<!-- ee-bookdemo-tpl v2026-08-10-real-badges -->
<style>
  #ee-bd{--nv:#19335D;--nv2:#2A4E85;--or:#DE6E30;--or7:#B5551D;--mut:#5a6b85;--line:rgba(25,52,93,.12);
    position:relative;overflow:hidden;font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased;
    background:#FBFCFE;padding:clamp(30px,4vw,58px) 22px clamp(44px,5vw,72px)}
  #ee-bd::before{content:"";position:absolute;top:-160px;right:-140px;width:480px;height:480px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.1),transparent 70%)}
  #ee-bd::after{content:"";position:absolute;bottom:-180px;left:-140px;width:440px;height:440px;border-radius:50%;background:radial-gradient(circle,rgba(25,52,93,.07),transparent 70%)}
  #ee-bd *{box-sizing:border-box}
  #ee-bd .bd-wrap{position:relative;z-index:1;max-width:1360px;margin:0 auto;display:grid;grid-template-columns:minmax(0,1.55fr) minmax(0,1fr);gap:clamp(24px,3vw,44px);align-items:stretch}
  #ee-bd .sr{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0)}

  /* ── left · story ── */
  #ee-bd .bd-eb{display:block;font:800 11.5px/1 'Inter',sans-serif;letter-spacing:.15em;text-transform:uppercase;color:var(--or);margin:6px 0 12px}
  html body #main-content #ee-bd h2.bd-h{color:var(--nv) !important;font-weight:800 !important;line-height:1.14 !important;letter-spacing:-.02em;margin:0 0 18px !important;max-width:19ch}
  #ee-bd .bd-h em{font-style:normal;color:var(--or)}
  #ee-bd .bd-top{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1.05fr);gap:clamp(16px,2.2vw,28px);align-items:start}
  #ee-bd .bd-qm{display:block;width:34px;height:26px;color:var(--or);margin:2px 0 8px}
  #ee-bd .bd-q{font-size:clamp(13.5px,1.25vw,15px);line-height:1.7;color:#3c4a63;margin:0 0 12px;max-width:44ch}
  #ee-bd .bd-read{display:inline-flex;align-items:center;gap:7px;font-weight:700;font-size:13.5px;color:var(--or);text-decoration:none;margin-bottom:18px}
  #ee-bd .bd-read svg{width:14px;height:14px;transition:transform .2s}
  #ee-bd .bd-read:hover svg{transform:translateX(3px)}
  #ee-bd .bd-who{display:flex;align-items:center;gap:14px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:14px 18px;box-shadow:0 14px 34px -22px rgba(25,52,93,.35)}
  #ee-bd .bd-who img{width:62px;height:62px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 2px var(--or);background:#fff;flex:none}
  #ee-bd .bd-who b{display:block;font-size:15px;font-weight:800;color:var(--nv)}
  #ee-bd .bd-who span{display:block;font-size:12px;color:var(--mut);line-height:1.45}
  #ee-bd .bd-ver{display:inline-flex;align-items:center;gap:5px;margin-top:5px;font-size:11px;font-weight:700;color:#22684B}
  #ee-bd .bd-ver svg{width:13px;height:13px;flex:none}
  /* video card */
  #ee-bd .bd-vcard{background:#fff;border:1px solid var(--line);border-radius:18px;overflow:hidden;box-shadow:0 24px 54px -26px rgba(25,52,93,.4)}
  #ee-bd .bd-vid{position:relative;aspect-ratio:16/9;background:#0F2040;cursor:pointer}
  #ee-bd .bd-vid img{width:100%;height:100%;object-fit:cover;display:block}
  #ee-bd .bd-vid iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
  #ee-bd .bd-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:62px;height:62px;border-radius:50%;background:rgba(255,255,255,.94);backdrop-filter:blur(4px);display:grid;place-items:center;box-shadow:0 16px 38px rgba(15,32,64,.4),0 0 0 9px rgba(255,255,255,.2);transition:transform .2s}
  #ee-bd .bd-play svg{width:22px;height:22px;color:var(--or);margin-left:3px}
  #ee-bd .bd-vid:hover .bd-play{transform:translate(-50%,-50%) scale(1.08)}
  #ee-bd .bd-vid.playing .bd-play{display:none}
  #ee-bd .bd-vbody{padding:14px 18px 16px}
  #ee-bd .bd-vbody b{display:block;font-size:14.5px;font-weight:800;color:var(--nv);line-height:1.35;margin-bottom:7px}
  #ee-bd .bd-watch{display:inline-flex;align-items:center;gap:7px;border:0;background:none;padding:0;cursor:pointer;font:700 12.5px/1 'Inter',sans-serif;color:var(--or)}
  #ee-bd .bd-watch svg{width:13px;height:13px;transition:transform .2s}
  #ee-bd .bd-watch:hover svg{transform:translateX(3px)}
  /* stats */
  #ee-bd .bd-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin:clamp(18px,2.4vw,28px) 0 0;background:#fff;border:1px solid var(--line);border-radius:18px;padding:16px clamp(12px,1.6vw,22px);box-shadow:0 14px 34px -24px rgba(25,52,93,.35)}
  #ee-bd .bd-stat{display:flex;align-items:center;gap:12px;justify-content:center}
  #ee-bd .bd-stat+.bd-stat{border-left:1px solid var(--line)}
  #ee-bd .bd-stat .ic{flex:none;width:40px;height:40px;border-radius:12px;background:rgba(222,110,48,.1);display:grid;place-items:center;color:var(--or)}
  #ee-bd .bd-stat .ic svg{width:20px;height:20px}
  #ee-bd .bd-stat b{display:block;font-size:clamp(19px,2vw,26px);font-weight:800;color:var(--nv);letter-spacing:-.02em;line-height:1}
  #ee-bd .bd-stat span{display:block;font-size:11px;color:var(--mut);font-weight:600;margin-top:3px}
  /* section labels */
  #ee-bd .bd-sub{display:block;font:800 11px/1 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:var(--nv);margin:clamp(22px,2.8vw,32px) 0 12px}
  /* trust badges - icon slot upgrades to the real artwork when a file exists */
  #ee-bd .bd-badges{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
  #ee-bd .bd-badge{display:flex;align-items:center;gap:11px;background:#fff;border:1px solid var(--line);border-radius:14px;padding:13px 15px;box-shadow:0 12px 30px -24px rgba(25,52,93,.4)}
  #ee-bd .bd-badge .bic{flex:none;width:52px;height:48px;display:grid;place-items:center}
  #ee-bd .bd-badge .bic img{max-width:52px;max-height:48px;object-fit:contain}
  #ee-bd .bd-badge .bic svg{width:26px;height:26px;color:var(--or)}
  #ee-bd .bd-badge.noimg .bic img{display:none}
  #ee-bd .bd-badge:not(.noimg) .bic svg{display:none}
  #ee-bd .bd-badge b{display:block;font-size:12.5px;font-weight:800;color:var(--nv);line-height:1.25}
  #ee-bd .bd-badge span{display:block;font-size:10.5px;color:var(--mut);font-weight:600;margin-top:2px}
  /* logo marquee - light tiles */
  #ee-bd .bd-mq{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent);mask-image:linear-gradient(90deg,transparent,#000 7%,#000 93%,transparent)}
  #ee-bd .bd-mq-track{display:flex;gap:12px;width:max-content;align-items:center;animation:eeBdMq 45s linear infinite}
  @keyframes eeBdMq{to{transform:translateX(-50%)}}
  #ee-bd .bd-mq:hover .bd-mq-track{animation-play-state:paused}
  @media(prefers-reduced-motion:reduce){#ee-bd .bd-mq-track{animation:none}}
  #ee-bd .bd-brand{flex:none;width:132px;height:66px;background:#fff;border:1px solid #e2e8f0;border-radius:12px;display:flex;align-items:center;justify-content:center;padding:11px}
  #ee-bd .bd-brand img{max-height:42px;max-width:106px;width:auto;object-fit:contain;display:block}

  /* ── right · sticky demo card ── */
  #ee-bd .bd-r{display:flex}
  #ee-bd .bd-card{flex:1;display:flex;flex-direction:column;background:#fff;border:1px solid #EDF0F5;border-radius:24px;padding:clamp(22px,2.4vw,32px);box-shadow:0 34px 80px -28px rgba(25,52,93,.32);position:relative}
  #ee-bd .bd-card::after{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1px;pointer-events:none;background:linear-gradient(140deg,rgba(222,110,48,.45),transparent 40%,transparent 60%,rgba(25,52,93,.35));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.5}
  #ee-bd .bd-pill{display:flex;align-items:center;justify-content:center;gap:8px;width:fit-content;margin:0 auto 14px;background:rgba(222,110,48,.1);border:1px solid rgba(222,110,48,.22);color:var(--or7);font:800 11px/1 'Inter',sans-serif;letter-spacing:.1em;text-transform:uppercase;border-radius:999px;padding:9px 18px}
  #ee-bd .bd-pill svg{width:14px;height:14px;flex:none}
  #ee-bd .bd-card h3{margin:0 0 6px;text-align:center;font-size:clamp(20px,2.1vw,25px);font-weight:800;color:var(--nv);letter-spacing:-.01em}
  #ee-bd .bd-cs{text-align:center;font-size:12.5px;color:var(--mut);line-height:1.55;margin:0 auto 18px;max-width:38ch}
  #ee-bd .bd-trust{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:7px 14px;margin-top:auto;padding-top:15px}
  #ee-bd .bd-trust span{display:inline-flex;align-items:center;gap:5px;font-size:10.5px;font-weight:700;color:var(--mut)}
  #ee-bd .bd-trust svg{width:12px;height:12px;color:var(--nv);flex:none}
  #ee-bd .bd-iso{display:flex;align-items:center;justify-content:center;gap:16px;margin-top:12px}
  #ee-bd .bd-iso img{height:46px;width:auto;object-fit:contain}

  /* form widget: brand inputs; the tuner below owns layout */
  #ee-bd #ee-form-7,#ee-bd #ee-form-7 *{box-sizing:border-box!important}
  #ee-bd #ee-form-7 h1,#ee-bd #ee-form-7 h2,#ee-bd #ee-form-7 h3,#ee-bd #ee-form-7 h4{display:none!important}
  #ee-bd #ee-form-7 form{width:100%!important}
  #ee-bd #ee-form-7 form div{float:none!important;max-width:100%!important}
  #ee-bd #ee-form-7 p{text-align:center!important;font-size:12px!important;color:#5a6b85!important;margin:0 0 10px!important}
  #ee-bd #ee-form-7 label{display:block!important;float:none!important;width:auto!important;max-width:100%!important;text-align:left!important;color:#19345d!important;font-weight:600!important;font-size:12.5px!important;margin:0 0 5px!important}
  #ee-bd #ee-form-7 input[type="text"],#ee-bd #ee-form-7 input[type="email"],#ee-bd #ee-form-7 input[type="tel"],#ee-bd #ee-form-7 input[type="url"],#ee-bd #ee-form-7 input[type="number"],#ee-bd #ee-form-7 select,#ee-bd #ee-form-7 textarea{display:block!important;float:none!important;background:#fff!important;color:#19345d!important;border:1px solid #e2e8f0!important;border-radius:11px!important;padding:12px 14px!important;font-size:13.5px!important;font-family:'Inter',sans-serif!important;width:100%!important;max-width:100%!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s!important}
  #ee-bd #ee-form-7 input:focus,#ee-bd #ee-form-7 select:focus,#ee-bd #ee-form-7 textarea:focus{outline:none!important;border-color:#DE6E30!important;box-shadow:0 0 0 3px rgba(222,110,48,.12)!important}
  #ee-bd #ee-form-7 input[type="submit"],#ee-bd #ee-form-7 button[type="submit"]{display:block!important;background:linear-gradient(180deg,#E8843F,#DE6E30)!important;color:#fff!important;border:none!important;border-radius:13px!important;padding:15px 28px!important;font-size:15px!important;font-weight:800!important;font-family:'Inter',sans-serif!important;width:100%!important;cursor:pointer!important;transition:all .3s!important;box-shadow:0 14px 30px -8px rgba(222,110,48,.55)!important}
  #ee-bd #ee-form-7 input[type="submit"]:hover,#ee-bd #ee-form-7 button[type="submit"]:hover{transform:translateY(-2px)!important;box-shadow:0 18px 38px -8px rgba(222,110,48,.65)!important}

  /* ── responsive ── */
  @media(max-width:1080px){
    #ee-bd .bd-wrap{grid-template-columns:1fr}
    #ee-bd .bd-r{order:-1;max-width:560px;margin:0 auto;width:100%}
    #ee-bd .bd-card{flex:none;width:100%}
  }
  @media(max-width:760px){
    #ee-bd .bd-top{grid-template-columns:1fr}
    #ee-bd .bd-stats{grid-template-columns:1fr;gap:14px}
    #ee-bd .bd-stat{justify-content:flex-start}
    #ee-bd .bd-stat+.bd-stat{border-left:0;border-top:1px solid var(--line);padding-top:14px}
    #ee-bd .bd-badges{grid-template-columns:1fr;gap:10px}
  }
</style>

<section id="ee-bd" aria-label="Book a demo">
  <h1 class="sr">Book a Demo &mdash; ExtraaEdge Intelligent Admissions Growth Platform</h1>
  <div class="bd-wrap">

    <div class="bd-l">
      <span class="bd-eb">Customer Success</span>
      <h2 class="bd-h">We increased our admissions <em>by 50%</em></h2>

      <div class="bd-top">
        <div>
          <svg class="bd-qm" viewBox="0 0 34 26" fill="currentColor" aria-hidden="true"><path d="M0 26V14.6C0 6.8 4.6 1.4 13 0l1.6 4.6C9.4 6 7 9 6.8 12.4H14V26H0zm20 0V14.6C20 6.8 24.6 1.4 33 0l1.6 4.6C29.4 6 27 9 26.8 12.4H34V26H20z"/></svg>
          <p class="bd-q">&ldquo;ExtraaEdge has helped us tremendously with admissions. Our application flow increased by 3X and overall admissions increased by 50%.&rdquo;</p>
          <a class="bd-read" href="/videos/customer-stories/">Read customer story <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
          <div class="bd-who">
            <img src="https://www.extraaedge.com/wp-content/uploads/2023/02/umesh-patwardhan.png" alt="Dr Umesh Patwardhan" loading="lazy" decoding="async">
            <div>
              <b>Dr Umesh Patwardhan</b>
              <span>Director of Admissions</span>
              <span>Vishwakarma University</span>
              <span class="bd-ver"><svg viewBox="0 0 24 24" fill="#22684B" aria-hidden="true"><path d="M12 1.8l2.4 1.9 3-.3 1 2.9 2.6 1.6-1 2.9 1 2.9-2.6 1.6-1 2.9-3-.3L12 22.2 9.6 20.3l-3 .3-1-2.9L3 16.1l1-2.9-1-2.9 2.6-1.6 1-2.9 3 .3z"/><path d="M10.6 15.3l-2.9-2.9 1.3-1.3 1.6 1.6 4-4 1.3 1.3z" fill="#fff"/></svg> Verified Customer</span>
            </div>
          </div>
        </div>

        <div class="bd-vcard">
          <div class="bd-vid" id="eeBdVid" data-yt="a-DrEJ4HC_Y" role="button" tabindex="0" aria-label="Play: how Vishwakarma University transformed their admissions">
            <img src="https://i.ytimg.com/vi/a-DrEJ4HC_Y/maxresdefault.jpg" alt="Vishwakarma University customer success video" loading="lazy" decoding="async"
                 onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/a-DrEJ4HC_Y/hqdefault.jpg'">
            <span class="bd-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
          </div>
          <div class="bd-vbody">
            <b>See how Vishwakarma University transformed their admissions</b>
            <button type="button" class="bd-watch" id="eeBdWatch">Watch customer success video <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></button>
          </div>
        </div>
      </div>

      <div class="bd-stats">
        <div class="bd-stat"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 17l6-6 4 4 8-8"/><path d="M15 7h6v6"/></svg></span><div><b>3X</b><span>Application Flow</span></div></div>
        <div class="bd-stat"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/></svg></span><div><b>50%</b><span>Admissions Growth</span></div></div>
        <div class="bd-stat"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></span><div><b>500+</b><span>Institutions Onboard</span></div></div>
      </div>

      <span class="bd-sub">Trust &amp; Recognition</span>
      <div class="bd-badges">
        <?php $ee_bd_badges = array(
            array('https://www.extraaedge.com/wp-content/uploads/2022/06/Best-Value-Software-header.png', 'Best Value Software',   'SoftwareSuggest &middot; 2022',
                  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 0 1-10 0V4z"/><path d="M7 6H4a2 2 0 0 0 0 4h3M17 6h3a2 2 0 0 1 0 4h-3"/></svg>'),
            array('https://www.extraaedge.com/wp-content/uploads/2022/06/Quality-Choice-header.png', 'Quality Choice',        'Crozdesk &middot; Top Rated',
                  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="9" r="6"/><path d="M8.5 14L7 22l5-2.6L17 22l-1.5-8"/></svg>'),
            array('https://www.extraaedge.com/wp-content/uploads/2022/06/Great-User-Experience-Award-header.png', 'Great User Experience', 'Crozdesk Certificate',
                  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>'),
        );
        foreach ($ee_bd_badges as $ee_b) : ?>
        <div class="bd-badge">
          <span class="bic">
            <img src="<?php echo esc_url($ee_b[0]); ?>" alt="<?php echo esc_attr($ee_b[1]); ?>" decoding="async"
                 onerror="this.closest('.bd-badge').classList.add('noimg')">
            <?php echo $ee_b[3]; ?>
          </span>
          <div><b><?php echo $ee_b[1]; ?></b><span><?php echo $ee_b[2]; ?></span></div>
        </div>
        <?php endforeach; ?>
      </div>

      <span class="bd-sub">Trusted by Leading Institutions</span>
      <?php $ee_bd_logos = function_exists('ee_institute_logos_for') ? ee_institute_logos_for('home') : array(); ?>
      <?php if ($ee_bd_logos) : ?>
      <div class="bd-mq" aria-label="Institutions using ExtraaEdge">
        <div class="bd-mq-track">
          <?php for ($ee_p = 0; $ee_p < 2; $ee_p++) : foreach ($ee_bd_logos as $ee_l) : ?>
          <span class="bd-brand"><img src="<?php echo esc_url($ee_l['u']); ?>" alt="<?php echo esc_attr($ee_l['a'] ?? ''); ?>" decoding="async" onerror="this.closest('.bd-brand').style.display='none'"></span>
          <?php endforeach; endfor; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div class="bd-r">
      <div class="bd-card">
        <span class="bd-pill"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 2v4M16 2v4"/></svg> Get a Personalized Demo</span>
        <h3>See ExtraaEdge in Action</h3>
        <p class="bd-cs">Get a personalized walkthrough of the Intelligent Admissions Growth Platform built for your institution.</p>
        <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
        <div id="ee-form-7"></div>
        <div class="bd-trust">
          <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg> Secure &amp; Confidential</span>
          <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z"/><path d="M9 12l2 2 4-4"/></svg> No Commitment</span>
          <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 21c.8-4 4-6 8-6s7.2 2 8 6"/></svg> Personalized Walkthrough</span>
        </div>
        <div class="bd-iso">
          <img src="https://www.extraaedge.com/wp-content/uploads/2025/09/iso-0001.png" alt="ISO 27001 Certified" decoding="async" onerror="this.style.display='none'">
          <img src="https://www.extraaedge.com/wp-content/uploads/2025/09/GDPR-NEW.png" alt="GDPR Ready" decoding="async" onerror="this.style.display='none'">
        </div>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  /* customer video - click the thumbnail or the caption link to play inline */
  var v = document.getElementById('eeBdVid');
  if (v){
    var play = function(){
      if (v.classList.contains('playing')) return;
      v.classList.add('playing');
      v.innerHTML = '<iframe src="https://www.youtube-nocookie.com/embed/' + v.getAttribute('data-yt') +
        '?autoplay=1&rel=0&modestbranding=1" title="Vishwakarma University customer story" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    };
    v.addEventListener('click', play);
    v.addEventListener('keydown', function(e){ if (e.key === 'Enter' || e.key === ' '){ e.preventDefault(); play(); } });
    var w = document.getElementById('eeBdWatch');
    if (w) w.addEventListener('click', function(){ play(); v.scrollIntoView({ block: 'center', behavior: 'smooth' }); });
  }
})();
</script>

<script>
(function(){
  /* The enquiry widget builds its own DOM after load, so this tuner waits
     for the fields, hides the widget's duplicate heading block by text,
     tightens field spacing and renames the submit to the design's CTA.
     In this narrow card the fields stay single-column like the mock. */
  var box = document.getElementById('ee-form-7'); if (!box) return;

  function isNoise(el){
    var t = (el.textContent || '').replace(/\s+/g, ' ').trim();
    return t === 'Book Your Demo Now' || /^Get a personalized walkthrough/i.test(t);
  }
  function tune(){
    var inputs = [].slice.call(box.querySelectorAll('input[type="text"],input[type="email"],input[type="tel"],input[type="url"],input[type="number"],select'));
    if (inputs.length < 2) return false;

    [].slice.call(box.querySelectorAll('h1,h2,h3,h4,h5,p,div,span,strong,b')).forEach(function(el){
      if (el.children.length <= 1 && isNoise(el) && !el.querySelector('input,select,button')) el.style.display = 'none';
    });

    var wraps = [];
    inputs.forEach(function(i){
      var w = i.parentElement;
      while (w && w !== box && !w.querySelector('label')) w = w.parentElement;
      if (w && w !== box && wraps.indexOf(w) === -1) wraps.push(w);
    });
    if (wraps.length < 2) return false;
    var host = wraps[0].parentElement;
    if (wraps.every(function(w){ return w.parentElement === host; })){
      /* wide hosts get a two-up grid; the sticky card is narrow, so on this
         page the fields naturally stay stacked like the mock */
      if (host.offsetWidth >= 520 && window.matchMedia('(min-width:561px)').matches){
        host.style.display = 'grid';
        host.style.gridTemplateColumns = '1fr 1fr';
        host.style.columnGap = '14px';
        host.style.alignItems = 'start';
      }
      [].slice.call(host.children).forEach(function(ch){
        if (ch.style.display === 'none') return;
        var full = ch.querySelector('input[type="submit"],button,input[type="checkbox"],textarea') || !ch.querySelector('input,select');
        ch.style.gridColumn = full ? '1 / -1' : 'auto';
        ch.style.minWidth = '0';
        ch.style.marginBottom = '10px';
      });
    }
    var sub = box.querySelector('input[type="submit"]');
    if (sub && !/Book My Demo/.test(sub.value)) sub.value = 'Book My Demo →';
    return true;
  }

  window.eeFormTune = tune; /* console hook */
  var tries = 0;
  var t = setInterval(function(){ if (tune() || ++tries > 60) clearInterval(t); }, 250);
  try {
    new MutationObserver(function(){ tune(); }).observe(box, { childList: true, subtree: false });
  } catch(e){}
})();
</script>

<?php get_footer(); ?>
