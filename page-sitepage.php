<?php
/**
 * Shared landing template for every registry page in inc/site-pages.php.
 * The router puts the matched entry in $GLOBALS['ee_sitepage'] (with 'key').
 * One design, many pages: hero -> feature grid -> steps (when the group has
 * them) -> stats band -> related pages -> closing CTA. Brand system only:
 * Inter, #19335D navy, #DE6E30 orange; sizes come from the global scale.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

$sp = isset($GLOBALS['ee_sitepage']) ? $GLOBALS['ee_sitepage'] : null;
if (!$sp) { wp_safe_redirect(home_url('/')); exit; }

$groups = ee_site_page_groups();
$grp    = isset($groups[$sp['g']]) ? $groups[$sp['g']] : array('label' => '', 'steps' => null, 'stats' => array(), 'cta' => 'Book a demo');
$steps  = isset($sp['steps']) ? $sp['steps'] : $grp['steps'];
$stats  = isset($sp['stats']) ? $sp['stats'] : $grp['stats'];
$ctaTxt = isset($sp['cta']) ? $sp['cta'] : $grp['cta'];
$rel    = ee_site_page_related($sp['key']);
$split  = function ($s) { $p = explode('|', $s, 2); return array($p[0], isset($p[1]) ? $p[1] : ''); };

add_filter('pre_get_document_title', function () use ($sp) {
    return $sp['t'] . ' — ExtraaEdge AI Admission CRM';
}, 99);

get_header();
?>
<!-- ee-sitepage-tpl v2026-08-08-launch -->
<style id="ee-sp-css">
#ee-sp{--nv:#19335D;--nv2:#22467c;--or:#DE6E30;--or2:#E8843F;--mut:#5a6b85;--line:rgba(25,52,93,.1);
  font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased;color:#0f203a;background:#fff}
#ee-sp *{box-sizing:border-box}
#ee-sp .spw{max-width:1140px;margin:0 auto;padding:0 22px}

/* hero */
#ee-sp .sp-hero{position:relative;overflow:hidden;text-align:center;padding:clamp(44px,6vw,74px) 0 clamp(36px,5vw,56px);
  background:radial-gradient(900px 420px at 85% -10%,rgba(222,110,48,.07),transparent 60%),
             radial-gradient(760px 400px at 5% 108%,rgba(25,52,93,.06),transparent 60%),linear-gradient(180deg,#FBFCFE,#fff)}
#ee-sp .sp-hero .spw{max-width:860px}
html body #main-content #ee-sp h1.h1.sp-h1{margin:0 0 12px !important;color:#19335D !important;font-weight:800 !important}
#ee-sp .sp-h1 em{font-style:normal;color:var(--or)}
#ee-sp .sp-sub{margin:0 auto;max-width:62ch;color:var(--mut)}
#ee-sp .sp-ctas{display:flex;align-items:center;justify-content:center;gap:12px;flex-wrap:wrap;margin:22px 0 0}
html body #main-content #ee-sp a.sp-cta{display:inline-flex !important;align-items:center !important;gap:.45rem !important;
  padding:.68rem 1.4rem !important;border-radius:9px !important;border:none !important;
  background:linear-gradient(135deg,#DE6E30,#FF8A5C) !important;color:#fff !important;text-decoration:none !important;
  font-weight:600 !important;font-size:.92rem !important;box-shadow:0 4px 14px rgba(222,110,48,.25) !important;
  transition:all .3s ease;cursor:pointer}
html body #main-content #ee-sp a.sp-cta:hover{background:linear-gradient(135deg,#B85920,#C75E24) !important;
  transform:translateY(-2px) !important;box-shadow:0 6px 22px rgba(222,110,48,.35) !important;color:#fff !important}
#ee-sp a.sp-cta2{display:inline-flex;align-items:center;gap:8px;padding:.62rem 1.25rem;border-radius:9px;
  border:1.4px solid rgba(25,52,93,.22);background:#fff;color:var(--nv);text-decoration:none;font-weight:700;font-size:.9rem;
  transition:border-color .2s,color .2s,transform .2s}
#ee-sp a.sp-cta2:hover{border-color:rgba(222,110,48,.5);color:#C45A20;transform:translateY(-2px)}
#ee-sp .sp-chips{display:flex;justify-content:center;flex-wrap:wrap;gap:8px;margin:22px 0 0}
#ee-sp .sp-chips span{display:inline-flex;align-items:center;gap:7px;padding:7px 13px 7px 10px;border-radius:999px;
  background:rgba(255,255,255,.85);border:1px solid var(--line);box-shadow:0 4px 14px rgba(25,52,93,.05);
  font:600 12px/1 'Inter',sans-serif;color:var(--nv);white-space:nowrap}
#ee-sp .sp-chips span::before{content:"";width:14px;height:14px;flex:0 0 auto;
  background:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Ccircle cx='12' cy='12' r='11' fill='%23DE6E30'/%3E%3Cpath d='M7 12.3l3.3 3.3L17 8.9' fill='none' stroke='%23fff' stroke-width='2.6' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") center/contain no-repeat}

/* feature grid */
#ee-sp .sp-feats{padding:clamp(36px,5vw,60px) 0 0}
#ee-sp .sp-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px}
#ee-sp .sp-card{background:rgba(255,255,255,.9);border:1px solid var(--line);border-radius:16px;padding:18px 18px 16px;
  box-shadow:0 18px 40px -34px rgba(25,52,93,.5);transition:transform .22s ease,border-color .22s ease,box-shadow .22s ease}
#ee-sp .sp-card:hover{transform:translateY(-3px);border-color:rgba(222,110,48,.32);box-shadow:0 26px 50px -30px rgba(25,52,93,.55)}
#ee-sp .sp-card i{display:grid;place-items:center;width:34px;height:34px;border-radius:11px;margin-bottom:11px;
  background:rgba(222,110,48,.1);color:var(--or);font-style:normal}
#ee-sp .sp-card i svg{width:17px;height:17px}
#ee-sp .sp-card h3{margin:0 0 6px;color:#19335D}
#ee-sp .sp-card p{margin:0;color:var(--mut)}

/* steps */
#ee-sp .sp-steps{padding:clamp(40px,5.5vw,64px) 0 0}
#ee-sp .sp-steps h2,#ee-sp .sp-rel h2{margin:0 0 18px;color:#19335D;text-align:center}
#ee-sp .sp-steprow{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px;counter-reset:spstep}
#ee-sp .sp-step{position:relative;background:linear-gradient(180deg,#FBFCFE,#fff);border:1px solid var(--line);border-radius:16px;padding:18px}
#ee-sp .sp-step b{display:flex;align-items:center;gap:10px;color:#19335D;font-size:15px;margin-bottom:7px}
#ee-sp .sp-step b::before{counter-increment:spstep;content:counter(spstep);display:grid;place-items:center;width:26px;height:26px;
  flex:0 0 auto;border-radius:50%;background:linear-gradient(135deg,#E8843F,#DE6E30);color:#fff;font-size:12.5px;font-weight:800}
#ee-sp .sp-step p{margin:0;color:var(--mut)}

/* stats band */
#ee-sp .sp-stats{margin:clamp(40px,5.5vw,64px) 0 0;background:linear-gradient(150deg,var(--nv2),var(--nv));border-radius:20px;
  padding:clamp(24px,3.4vw,38px);display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;text-align:center}
#ee-sp .sp-stat b{display:block;font-size:clamp(24px,2.8vw,34px);font-weight:800;color:#fff;line-height:1.05}
#ee-sp .sp-stat b em{font-style:normal;color:#F2B98F}
#ee-sp .sp-stat span{display:block;margin-top:5px;font-size:12.5px;font-weight:600;color:#c6d4ea}

/* related */
#ee-sp .sp-rel{padding:clamp(40px,5.5vw,64px) 0 0}
#ee-sp .sp-relrow{display:flex;flex-wrap:wrap;justify-content:center;gap:9px}
#ee-sp .sp-relrow a{display:inline-flex;align-items:center;gap:7px;padding:9px 16px;border-radius:999px;
  border:1px solid var(--line);background:#fff;color:var(--nv);text-decoration:none;font-weight:600;font-size:13px;
  transition:border-color .2s,color .2s,transform .2s}
#ee-sp .sp-relrow a:hover{border-color:rgba(222,110,48,.5);color:#C45A20;transform:translateY(-2px)}
#ee-sp .sp-relrow a svg{width:13px;height:13px}

/* closing cta */
#ee-sp .sp-close{margin:clamp(44px,6vw,72px) 0 clamp(52px,7vw,84px);text-align:center}
#ee-sp .sp-close .box{background:linear-gradient(180deg,#FBFCFE,#fff);border:1px solid var(--line);border-radius:20px;
  padding:clamp(26px,3.6vw,42px);box-shadow:0 24px 60px -40px rgba(25,52,93,.5)}
#ee-sp .sp-close h2{margin:0 0 8px;color:#19335D}
#ee-sp .sp-close p{margin:0 0 18px;color:var(--mut)}
#ee-sp .sp-close .sp-note{display:block;margin:12px 0 0;font-size:12.5px;font-weight:600;color:#7a889e}

@media(max-width:960px){
  #ee-sp .sp-grid,#ee-sp .sp-steprow{grid-template-columns:repeat(2,minmax(0,1fr))}
  #ee-sp .sp-stats{grid-template-columns:repeat(2,minmax(0,1fr))}
}
@media(max-width:600px){
  #ee-sp .spw{padding:0 16px}
  #ee-sp .sp-grid,#ee-sp .sp-steprow{grid-template-columns:1fr;gap:10px}
  #ee-sp .sp-card{padding:15px}
  #ee-sp .sp-stats{padding:20px 14px;gap:14px;border-radius:16px}
  #ee-sp .sp-chips span{font-size:11px;padding:6px 10px 6px 8px}
  #ee-sp .sp-ctas a{width:100%;justify-content:center}
}
@media(prefers-reduced-motion:reduce){#ee-sp .sp-card,#ee-sp .sp-relrow a,#ee-sp a.sp-cta2{transition:none}}
</style>

<div id="ee-sp">

  <section class="sp-hero">
    <div class="spw">
      <h1 class="h1 sp-h1"><?php echo esc_html($sp['h1']); ?></h1>
      <p class="sp-sub"><?php echo esc_html($sp['sub']); ?></p>
      <div class="sp-ctas">
        <a class="sp-cta" href="https://www.extraaedge.com/book-a-demo/">Book a Demo
          <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
        <a class="sp-cta2" href="<?php echo esc_url(home_url('/product-tour/')); ?>">Explore the live platform</a>
      </div>
      <div class="sp-chips">
        <span>Go live in 7 days</span>
        <span>ISO 27001 &middot; GDPR-ready</span>
        <span>Trusted by 500+ institutions</span>
      </div>
    </div>
  </section>

  <section class="sp-feats">
    <div class="spw">
      <div class="sp-grid">
        <?php foreach ($sp['f'] as $i => $feat) : list($ft, $fd) = $split($feat); ?>
        <div class="sp-card">
          <i><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg></i>
          <h3><?php echo esc_html($ft); ?></h3>
          <?php if ($fd) : ?><p><?php echo esc_html($fd); ?></p><?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php if ($steps) : ?>
  <section class="sp-steps">
    <div class="spw">
      <h2>How it works</h2>
      <div class="sp-steprow">
        <?php foreach ($steps as $st) : list($stt, $std) = $split($st); ?>
        <div class="sp-step"><b><?php echo esc_html($stt); ?></b><p><?php echo esc_html($std); ?></p></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if ($stats) : ?>
  <div class="spw">
    <div class="sp-stats">
      <?php foreach ($stats as $stx) : list($sv, $sl) = $split($stx); ?>
      <div class="sp-stat"><b><?php echo esc_html($sv); ?></b><span><?php echo esc_html($sl); ?></span></div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if ($rel) : ?>
  <section class="sp-rel">
    <div class="spw">
      <h2>Explore more in <?php echo esc_html($grp['label']); ?></h2>
      <div class="sp-relrow">
        <?php foreach ($rel as $rk => $rt) : ?>
        <a href="<?php echo esc_url(home_url('/' . $rk . '/')); ?>"><?php echo esc_html($rt); ?>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg></a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="sp-close">
    <div class="spw">
      <div class="box">
        <h2><?php echo esc_html($ctaTxt); ?></h2>
        <p>30 minutes on your funnel &mdash; your courses, your sources, your team. No credit card, no commitment.</p>
        <a class="sp-cta" href="https://www.extraaedge.com/book-a-demo/">Book a Demo
          <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
        <span class="sp-note">Prefer WhatsApp? <a href="https://api.whatsapp.com/send/?phone=918956982897" target="_blank" rel="noopener" style="color:#C45A20;font-weight:700">Chat with us</a> &middot; Call +91 89569 82897</span>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
