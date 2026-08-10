<?php
/**
 * page-thank-you.php — /thank-you/ split landing.
 *
 * Left: navy proof panel (Dr Umesh Patwardhan story, badges, brands).
 * Right: thank-you confirmation + the Quick Enquiry form widget, so a
 * visitor who lands here directly can still book a demo.
 *
 * Routed via $ee_custom_routes in functions.php.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* conversion endpoint - keep it out of search results */
add_action('wp_head', function () {
    echo '<meta name="robots" content="noindex, follow">' . "\n";
}, 4);

get_header();
?>
<!-- ee-thankyou-tpl v2026-08-10-split -->
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
  #ee-ty .ty-brands{display:flex;flex-wrap:wrap;gap:12px}
  #ee-ty .ty-brand{width:104px;height:56px;background:#fff;border-radius:12px;display:grid;place-items:center;padding:9px;box-shadow:0 12px 26px -14px rgba(0,0,0,.5)}
  #ee-ty .ty-brand img{max-width:100%;max-height:100%;object-fit:contain}
  /* ── right · thank you + form ── */
  #ee-ty .ty-r{padding:clamp(36px,5vw,72px) clamp(22px,4.5vw,72px);display:flex;flex-direction:column;justify-content:center}
  #ee-ty .ty-ok{display:inline-flex;align-items:center;gap:9px;align-self:flex-start;background:rgba(46,125,91,.1);border:1px solid rgba(46,125,91,.28);color:#22684B;font:700 12.5px/1 'Inter',sans-serif;border-radius:999px;padding:8px 16px;margin:0 0 18px}
  #ee-ty .ty-ok svg{width:14px;height:14px;flex:none}
  html body #main-content #ee-ty h1.ty-h1{margin:0 0 10px !important;font-weight:800 !important;letter-spacing:-.02em;color:var(--nv) !important}
  #ee-ty .ty-h1 em{font-style:normal;color:var(--or)}
  #ee-ty .ty-lead{margin:0 0 26px;color:var(--mut);font-size:clamp(14px,1.5vw,16px);line-height:1.65;max-width:56ch}
  #ee-ty .ty-card{background:#fff;border:1px solid #EDF0F5;border-radius:22px;padding:clamp(22px,2.8vw,38px);box-shadow:0 30px 70px -24px rgba(25,52,93,.28);position:relative;max-width:640px}
  #ee-ty .ty-card::after{content:"";position:absolute;inset:-1px;border-radius:inherit;padding:1px;pointer-events:none;background:linear-gradient(140deg,rgba(222,110,48,.5),transparent 40%,transparent 60%,rgba(25,52,93,.4));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.5}
  #ee-ty .ty-card h3{margin:0 0 4px;text-align:center;font-size:clamp(19px,2.2vw,24px);font-weight:800;color:var(--nv);letter-spacing:-.01em}
  #ee-ty .ty-card .ty-cs{text-align:center;font-size:12.5px;color:var(--mut);margin:0 0 18px}
  #ee-ty .secure-label{text-align:center;margin-top:16px;font-size:10.5px;color:rgba(25,52,93,.5);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
  /* form widget: clean single-column inputs on brand tokens */
  #ee-ty #ee-form-7,#ee-ty #ee-form-7 *{box-sizing:border-box!important}
  #ee-ty #ee-form-7 form{display:block!important;width:100%!important}
  #ee-ty #ee-form-7 form>div,#ee-ty #ee-form-7 form>div>div{display:block!important;width:100%!important;max-width:100%!important;float:none!important;grid-template-columns:1fr!important;margin-bottom:12px!important}
  #ee-ty #ee-form-7 h1,#ee-ty #ee-form-7 h2,#ee-ty #ee-form-7 h3,#ee-ty #ee-form-7 h4{line-height:1.2!important;margin:0 0 4px!important;text-align:center!important}
  #ee-ty #ee-form-7 label{display:block!important;float:none!important;width:auto!important;max-width:100%!important;text-align:left!important;color:#19345d!important;font-weight:600!important;font-size:13px!important;margin:0 0 6px!important}
  #ee-ty #ee-form-7 input[type="text"],#ee-ty #ee-form-7 input[type="email"],#ee-ty #ee-form-7 input[type="tel"],#ee-ty #ee-form-7 input[type="url"],#ee-ty #ee-form-7 input[type="number"],#ee-ty #ee-form-7 select,#ee-ty #ee-form-7 textarea{display:block!important;float:none!important;background:#fff!important;color:#19345d!important;border:1px solid #e2e8f0!important;border-radius:10px!important;padding:12px 14px!important;font-size:14px!important;font-family:'Inter',sans-serif!important;width:100%!important;max-width:100%!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s!important}
  #ee-ty #ee-form-7 input:focus,#ee-ty #ee-form-7 select:focus,#ee-ty #ee-form-7 textarea:focus{outline:none!important;border-color:#DE6E30!important;box-shadow:0 0 0 3px rgba(222,110,48,.12)!important}
  #ee-ty #ee-form-7 input[type="submit"],#ee-ty #ee-form-7 button[type="submit"]{display:block!important;background:var(--or7)!important;color:#fff!important;border:none!important;border-radius:12px!important;padding:14px 28px!important;font-size:15px!important;font-weight:700!important;font-family:'Inter',sans-serif!important;width:100%!important;cursor:pointer!important;transition:all .3s!important;box-shadow:0 8px 20px rgba(222,110,48,.25)!important}
  #ee-ty #ee-form-7 input[type="submit"]:hover,#ee-ty #ee-form-7 button[type="submit"]:hover{background:#A8501C!important;transform:translateY(-2px)!important;box-shadow:0 12px 28px rgba(222,110,48,.35)!important}
  /* stack on phones - confirmation + form first, proof after */
  @media(max-width:900px){
    #ee-ty .ty-grid{grid-template-columns:1fr}
    #ee-ty .ty-l{order:2}
    #ee-ty .ty-r{order:1;padding-top:34px}
    #ee-ty .ty-card{max-width:none}
  }
</style>

<section id="ee-ty" aria-label="Thank you">
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
        <span class="ty-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="9" r="6"/><path d="M8.5 14L7 22l5-2.6L17 22l-1.5-8"/></svg><span><b>Best Value Software</b><span>SoftwareSuggest &middot; 2022</span></span></span>
        <span class="ty-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg><span><b>Quality Choice</b><span>Crozdesk &middot; Top Ranked</span></span></span>
        <span class="ty-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 11v9M3 11h4l3.2-7.2A2 2 0 0 1 12 2.6l.4.2c.6.4 1 1.1 1 1.8V9h6a2 2 0 0 1 2 2.4l-1.4 7A2 2 0 0 1 18 20H7"/></svg><span><b>Great User Experience</b><span>Certificate</span></span></span>
      </div>

      <p class="ty-sub">Brands</p>
      <div class="ty-brands">
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/ashoka-university-haryana-logo.svg" alt="Ashoka University" loading="lazy" decoding="async"></span>
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/school/narayana-hrudayalaya-foundations-logo.svg" alt="Narayana" loading="lazy" decoding="async"></span>
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/reliance-foundation-inst-of-edu-and-research-jio-logo.svg" alt="Jio Institute" loading="lazy" decoding="async"></span>
        <span class="ty-brand"><img src="https://www.extraaedge.com/wp-content/uploads/2026/all-institues-logo/higher%20education/xiss-ranchi-logo.svg" alt="XISS Ranchi" loading="lazy" decoding="async"></span>
      </div>
    </div>

    <div class="ty-r">
      <span class="ty-ok"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12.5l5 5L20 6.5"/></svg> Details received &mdash; our team will reach out within one working day</span>
      <h1 class="ty-h1"><em>Thank you</em> for reaching out!</h1>
      <p class="ty-lead">Empower your admissions and marketing teams with ExtraaEdge CRM software. Want to add anything or book for a colleague? Use the quick enquiry below.</p>

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

<?php get_footer(); ?>
