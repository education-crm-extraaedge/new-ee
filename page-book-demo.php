<?php
/**
 * page-book-demo.php — /book-a-demo/ split landing.
 *
 * Left: navy proof panel (Dr Umesh Patwardhan story, badges, brands).
 * Right: Book-a-demo headline + the Quick Enquiry form widget.
 *
 * Routed via $ee_custom_routes in functions.php.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

get_header();
?>
<!-- ee-bookdemo-tpl v2026-08-10-form-tuner2 -->
<style>
  #ee-ty{--nv:#19335D;--nv2:#2A4E85;--or:#DE6E30;--or7:#B5551D;--mut:#5a6b85;--line:rgba(25,52,93,.12);
    font-family:'Inter',system-ui,sans-serif;-webkit-font-smoothing:antialiased;background:#fff}
  #ee-ty *{box-sizing:border-box}
  #ee-ty .ty-grid{display:grid;grid-template-columns:minmax(0,.92fr) minmax(0,1.08fr);min-height:calc(100vh - 80px)}
  /* ── left · proof panel ── */
  #ee-ty .ty-l{position:relative;overflow:hidden;background:linear-gradient(160deg,var(--nv2) 0%,var(--nv) 55%,#122645 100%);color:#fff;padding:clamp(40px,5vw,84px) clamp(26px,4.5vw,72px)}
  #ee-ty .ty-l::before{content:"";position:absolute;top:-140px;right:-120px;width:380px;height:380px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.28),transparent 70%)}
  #ee-ty .ty-l::after{content:"";position:absolute;bottom:-160px;left:-120px;width:360px;height:360px;border-radius:50%;background:radial-gradient(circle,rgba(111,163,242,.16),transparent 70%)}
  #ee-ty .ty-l>*{position:relative;z-index:1}
  html body #main-content #ee-ty h2.ty-big{color:#fff !important;font-weight:800 !important;line-height:1.15 !important;letter-spacing:-.02em;margin:0 0 18px !important}
  #ee-ty .ty-big em{font-style:normal;color:#E8843F}
  #ee-ty .ty-q{font-size:clamp(13.5px,1.35vw,15.5px);line-height:1.75;color:#d5dff0;margin:0 0 16px;max-width:56ch}
  #ee-ty .ty-who{display:flex;align-items:center;gap:14px;margin:24px 0 0}
  #ee-ty .ty-who img{width:56px;height:56px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 0 0 3px rgba(222,110,48,.65);background:#fff}
  #ee-ty .ty-who b{display:block;font-size:15px;font-weight:800;color:#fff}
  #ee-ty .ty-who span{font-size:12.5px;color:#b9c8e2}
  #ee-ty .ty-sub{font:800 12px/1 'Inter',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:#E8843F;margin:clamp(28px,3.6vw,46px) 0 14px}
  #ee-ty .ty-badges{display:flex;flex-wrap:wrap;gap:10px}
  #ee-ty .ty-badge{display:inline-flex;align-items:center;gap:9px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);border-radius:12px;padding:9px 14px;backdrop-filter:blur(4px)}
  #ee-ty .ty-badge svg{width:20px;height:20px;color:#E8843F;flex:none}
  #ee-ty .ty-badge b{display:block;font-size:11.5px;font-weight:800;color:#fff;line-height:1.2}
  #ee-ty .ty-badge span{display:block;font-size:9.5px;color:#b9c8e2;font-weight:600}
  /* badge svgs on white tiles; .noimg swaps a tile for its text chip */
  #ee-ty .ty-badge2{display:inline-flex}
  #ee-ty .ty-badge2 img{height:74px;width:auto;max-width:120px;object-fit:contain;background:#fff;border-radius:12px;padding:8px 12px;box-shadow:0 12px 26px -14px rgba(0,0,0,.5)}
  #ee-ty .ty-badge2 .ty-bchip{display:none;align-items:center;gap:9px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);border-radius:12px;padding:9px 14px;backdrop-filter:blur(4px)}
  #ee-ty .ty-badge2 .ty-bchip svg{width:20px;height:20px;color:#E8843F;flex:none}
  #ee-ty .ty-badge2 .ty-bchip b{display:block;font-size:11.5px;font-weight:800;color:#fff;line-height:1.2}
  #ee-ty .ty-badge2 .ty-bchip span span{display:block;font-size:9.5px;color:#b9c8e2;font-weight:600}
  #ee-ty .ty-badge2.noimg img{display:none}
  #ee-ty .ty-badge2.noimg .ty-bchip{display:inline-flex}
  /* brand marquee - same seamless -50% loop as the home strip */
  #ee-ty .ty-mq{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 8%,#000 92%,transparent);mask-image:linear-gradient(90deg,transparent,#000 8%,#000 92%,transparent)}
  #ee-ty .ty-mq-track{display:flex;gap:12px;width:max-content;align-items:center;animation:eeTyMq 45s linear infinite}
  @keyframes eeTyMq{to{transform:translateX(-50%)}}
  #ee-ty .ty-mq:hover .ty-mq-track{animation-play-state:paused}
  @media(prefers-reduced-motion:reduce){#ee-ty .ty-mq-track{animation:none}}
  #ee-ty .ty-brands{display:flex;flex-wrap:wrap;gap:12px}
  #ee-ty .ty-brand{flex:none;width:150px;height:74px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;display:flex;align-items:center;justify-content:center;padding:12px;box-shadow:0 12px 26px -14px rgba(0,0,0,.45)}
  #ee-ty .ty-brand img{max-height:46px;max-width:122px;width:auto;object-fit:contain;display:block}
  /* ── right · thank you + form ── */
  #ee-ty .ty-r{padding:clamp(28px,3.6vw,52px) clamp(22px,4.5vw,72px);display:flex;flex-direction:column;justify-content:flex-start}
  #ee-ty .ty-ok{display:inline-flex;align-items:center;gap:9px;align-self:flex-start;background:rgba(46,125,91,.1);border:1px solid rgba(46,125,91,.28);color:#22684B;font:700 12.5px/1 'Inter',sans-serif;border-radius:999px;padding:8px 16px;margin:0 0 18px}
  #ee-ty .ty-ok svg{width:14px;height:14px;flex:none}
  html body #main-content #ee-ty h1.ty-h1{margin:0 0 10px !important;font-weight:800 !important;letter-spacing:-.02em;color:var(--nv) !important}
  #ee-ty .ty-h1 em{font-style:normal;color:var(--or)}
  #ee-ty .ty-lead{margin:0 0 26px;color:var(--mut);font-size:clamp(14px,1.5vw,16px);line-height:1.65;max-width:56ch}
  #ee-ty .ty-card{background:#fff;border:1px solid #EDF0F5;border-radius:22px;padding:clamp(20px,2.4vw,30px);box-shadow:0 30px 70px -24px rgba(25,52,93,.28);position:relative;max-width:600px}
  #ee-ty .ty-card::after{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1px;pointer-events:none;background:linear-gradient(140deg,rgba(222,110,48,.5),transparent 40%,transparent 60%,rgba(25,52,93,.4));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.5}
  #ee-ty .ty-card h3{margin:0 0 4px;text-align:center;font-size:clamp(19px,2.2vw,24px);font-weight:800;color:var(--nv);letter-spacing:-.01em}
  #ee-ty .ty-card .ty-cs{text-align:center;font-size:12.5px;color:var(--mut);margin:0 0 18px}
  #ee-ty .secure-label{text-align:center;margin-top:16px;font-size:10.5px;color:rgba(25,52,93,.5);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
  /* form widget: compact two-column field grid on brand tokens.
     The card already carries the "Quick Enquiry" title, so the widget's own
     heading block is hidden to stop the form running twice as tall. */
  #ee-ty #ee-form-7,#ee-ty #ee-form-7 *{box-sizing:border-box!important}
  #ee-ty #ee-form-7 h1,#ee-ty #ee-form-7 h2,#ee-ty #ee-form-7 h3,#ee-ty #ee-form-7 h4{display:none!important}
  /* layout belongs to the tuner script below - CSS only neutralises the
     widget's floats/widths so the grid it applies can breathe */
  #ee-ty #ee-form-7 form{width:100%!important}
  #ee-ty #ee-form-7 form div{float:none!important;max-width:100%!important}
  #ee-ty #ee-form-7 p{text-align:center!important;font-size:12px!important;color:#5a6b85!important;margin:0 0 12px!important}
  #ee-ty #ee-form-7 label{display:block!important;float:none!important;width:auto!important;max-width:100%!important;text-align:left!important;color:#19345d!important;font-weight:600!important;font-size:12.5px!important;margin:0 0 5px!important}
  #ee-ty #ee-form-7 input[type="text"],#ee-ty #ee-form-7 input[type="email"],#ee-ty #ee-form-7 input[type="tel"],#ee-ty #ee-form-7 input[type="url"],#ee-ty #ee-form-7 input[type="number"],#ee-ty #ee-form-7 select,#ee-ty #ee-form-7 textarea{display:block!important;float:none!important;background:#fff!important;color:#19345d!important;border:1px solid #e2e8f0!important;border-radius:10px!important;padding:11px 13px!important;font-size:13.5px!important;font-family:'Inter',sans-serif!important;width:100%!important;max-width:100%!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s!important}
  #ee-ty #ee-form-7 input:focus,#ee-ty #ee-form-7 select:focus,#ee-ty #ee-form-7 textarea:focus{outline:none!important;border-color:#DE6E30!important;box-shadow:0 0 0 3px rgba(222,110,48,.12)!important}
  #ee-ty #ee-form-7 input[type="submit"],#ee-ty #ee-form-7 button[type="submit"]{display:block!important;background:var(--or7)!important;color:#fff!important;border:none!important;border-radius:12px!important;padding:13px 26px!important;font-size:14.5px!important;font-weight:700!important;font-family:'Inter',sans-serif!important;width:100%!important;cursor:pointer!important;transition:all .3s!important;box-shadow:0 8px 20px rgba(222,110,48,.25)!important}
  #ee-ty #ee-form-7 input[type="submit"]:hover,#ee-ty #ee-form-7 button[type="submit"]:hover{background:#A8501C!important;transform:translateY(-2px)!important;box-shadow:0 12px 28px rgba(222,110,48,.35)!important}
  /* stack on phones - confirmation + form first, proof after */
  @media(max-width:900px){
    #ee-ty .ty-grid{grid-template-columns:1fr}
    #ee-ty .ty-l{order:2}
    #ee-ty .ty-r{order:1;padding-top:30px}
    #ee-ty .ty-card{max-width:none}
  }
  @media(max-width:560px){
    #ee-ty #ee-form-7 form{grid-template-columns:1fr}
  }
</style>

<section id="ee-ty" aria-label="Book a demo">
  <div class="ty-grid">

    <div class="ty-l">
      <h2 class="ty-big">We increased our admissions <em>by 50%</em></h2>
      <p class="ty-q">&ldquo;ExtraaEdge has helped us a lot when it comes to admissions. Our application flow increased by 3X and overall admissions increased by 50%.</p>
      <p class="ty-q">Also, the dynamic reporting dashboard is such a unique feature &mdash; as a director, I can keep track of all individual data points. I consider ExtraaEdge to be a full package, right from user friendliness to impeccable customisation.&rdquo;</p>
      <div class="ty-who">
        <img src="https://www.extraaedge.com/wp-content/uploads/2023/02/umesh-patwardhan.png" alt="Dr Umesh Patwardhan" loading="lazy" decoding="async">
        <div><b>Dr Umesh Patwardhan</b><span>Director of Admissions, Vishwakarma University</span></div>
      </div>

      <p class="ty-sub">Badges</p>
      <div class="ty-badges">
        <?php /* badge artwork loads from uploads; until an svg exists at its
                 path the onerror flips the tile to a styled text chip, so the
                 row never shows a broken image */
        $ee_bd_badges = array(
            array('badge-01.svg', 'Best Value Software',   'SoftwareSuggest &middot; 2022'),
            array('badge-02.svg', 'Quality Choice',        'Crozdesk &middot; Top Ranked'),
            array('badge-03.svg', 'Great User Experience', 'Certificate'),
        );
        foreach ($ee_bd_badges as $ee_b) : ?>
        <span class="ty-badge2">
          <img src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/badges/<?php echo esc_attr($ee_b[0]); ?>" alt="<?php echo esc_attr($ee_b[1]); ?>" loading="lazy" decoding="async"
               onerror="this.closest('.ty-badge2').classList.add('noimg')">
          <span class="ty-bchip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="9" r="6"/><path d="M8.5 14L7 22l5-2.6L17 22l-1.5-8"/></svg><span><b><?php echo $ee_b[1]; ?></b><span><?php echo $ee_b[2]; ?></span></span></span>
        </span>
        <?php endforeach; ?>
      </div>

      <p class="ty-sub">Brands</p>
      <?php $ee_bd_logos = function_exists('ee_institute_logos_for') ? ee_institute_logos_for('home') : array(); ?>
      <?php if ($ee_bd_logos) : ?>
      <div class="ty-mq" aria-label="Institutions using ExtraaEdge">
        <div class="ty-mq-track">
          <?php for ($ee_p = 0; $ee_p < 2; $ee_p++) : foreach ($ee_bd_logos as $ee_l) : ?>
          <span class="ty-brand"><img src="<?php echo esc_url($ee_l['u']); ?>" alt="<?php echo esc_attr($ee_l['a'] ?? ''); ?>" decoding="async" onerror="this.closest('.ty-brand').style.display='none'"></span>
          <?php endforeach; endfor; ?>
        </div>
      </div>
      <?php else : ?>
      <div class="ty-brands">
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-university-haryana-logo.svg" alt="Ashoka University" loading="lazy" decoding="async"></span>
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/narayana-hrudayalaya-foundations-logo.svg" alt="Narayana" loading="lazy" decoding="async"></span>
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg" alt="Jio Institute" loading="lazy" decoding="async"></span>
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xiss-ranchi-logo.svg" alt="XISS Ranchi" loading="lazy" decoding="async"></span>
      </div>
      <?php endif; ?>
    </div>

    <div class="ty-r">
      <h1 class="ty-h1"><em>Book</em> a demo</h1>
      <p class="ty-lead">Empower your admissions and marketing teams with ExtraaEdge CRM software.</p>

      <div class="ty-card">
        <h3>Quick Enquiry</h3>
        <p class="ty-cs">Personalised to your institution &middot; No credit card</p>
        <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
        <div id="ee-form-7"></div>
        <p class="secure-label">&#128274; Secure Data Transmission Active &middot; ISO 27001 &middot; GDPR</p>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  /* The enquiry widget builds its own DOM after load, so pure CSS cannot be
     trusted to reshape it. This tuner waits for the fields, hides the
     widget's duplicate heading block, and grids the real field wrappers
     two-up (submit / consent / plain text rows stay full width). It runs
     again if the widget re-renders. */
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

    /* a field's wrapper = the closest ancestor that also carries its label */
    var wraps = [];
    inputs.forEach(function(i){
      var w = i.parentElement;
      while (w && w !== box && !w.querySelector('label')) w = w.parentElement;
      if (w && w !== box && wraps.indexOf(w) === -1) wraps.push(w);
    });
    if (wraps.length < 2) return false;
    var host = wraps[0].parentElement;
    if (!wraps.every(function(w){ return w.parentElement === host; })) return false;

    if (window.matchMedia('(min-width:561px)').matches){
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
    return true;
  }

  window.eeFormTune = tune; /* console hook: run the reshape by hand */
  var tries = 0;
  var t = setInterval(function(){ if (tune() || ++tries > 60) clearInterval(t); }, 250);
  try {
    new MutationObserver(function(){ tune(); }).observe(box, { childList: true, subtree: false });
  } catch(e){}
})();
</script>

<?php get_footer(); ?>
