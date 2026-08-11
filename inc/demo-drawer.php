<?php
/**
 * Book-a-Demo drawer — the slide-in form panel the home page hero uses.
 *
 * Any template that calls ee_demo_drawer() gets the same behaviour: every
 * link ending in #admission-form on that page slides the form in from the
 * right instead of navigating away.
 *
 * The home page keeps its own inline copy (it carries extra ROI-calculator
 * context), so never call this on the front page - two #admission-form
 * panels on one document would fight over the id.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

if (!function_exists('ee_demo_drawer')) {
    /**
     * @param string $embed_html Optional form embed saved on the post. Empty
     *                           falls back to the standard ee-form-7 widget,
     *                           which is what the home page drawer uses.
     */
    function ee_demo_drawer($embed_html = '') {
        static $printed = false;
        if ($printed) return;          // one drawer per document, whoever asks first
        $printed = true;
        ?>
<style id="ee-demo-drawer-css">
.eedd-backdrop{position:fixed;inset:0;background:rgba(10,20,40,.52);opacity:0;visibility:hidden;transition:opacity .28s ease,visibility .28s ease;z-index:99996}
.eedd-backdrop.open{opacity:1;visibility:visible}
.ee-demo-drawer{position:fixed;top:0;right:0;bottom:0;width:min(440px,100vw);background:#F6F8FB;z-index:99997;
  transform:translateX(105%);transition:transform .38s cubic-bezier(.3,.8,.3,1);display:flex;flex-direction:column;
  box-shadow:-28px 0 70px rgba(15,32,64,.3);font-family:'Inter',system-ui,sans-serif}
.ee-demo-drawer.open{transform:none}
.eedd-head{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:16px 20px;background:#19335D;color:#fff}
.eedd-head b{font:800 16px/1.2 'Inter',system-ui,sans-serif}
.eedd-head small{display:block;font:600 11px/1.4 'Inter',sans-serif;color:#C8D4E6;margin-top:3px}
.eedd-x{flex:none;width:34px;height:34px;border-radius:50%;border:0;background:rgba(255,255,255,.14);color:#fff;font-size:16px;line-height:1;cursor:pointer}
.eedd-x:hover{background:rgba(255,255,255,.28)}
.eedd-body{flex:1 1 auto;overflow-y:auto;padding:22px 20px 28px}
.eedd-body .secure-label{text-align:center;margin-top:16px;font-size:10.5px;color:rgba(25,52,93,.5);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
@media(prefers-reduced-motion:reduce){.ee-demo-drawer,.eedd-backdrop{transition:none}}
</style>
<div class="eedd-backdrop" id="eeddBack" aria-hidden="true"></div>
<aside class="ee-demo-drawer" id="admission-form" role="dialog" aria-modal="true" aria-label="Book a demo">
  <div class="eedd-head">
    <span><b>Book a Demo</b><small>Personalised to your institution &middot; No credit card</small></span>
    <button type="button" class="eedd-x" id="eeddClose" aria-label="Close">&#10005;</button>
  </div>
  <div class="eedd-body">
    <?php if ($embed_html) : ?>
    <?php echo wp_kses($embed_html, array(
        'script' => array('src'=>array(),'async'=>array(),'defer'=>array(),'type'=>array(),'charset'=>array(),'id'=>array()),
        'div'    => array('id'=>array(),'class'=>array(),'style'=>array(),'data-*'=>array()),
        'iframe' => array('src'=>array(),'width'=>array(),'height'=>array(),'style'=>array(),'frameborder'=>array(),'allow'=>array(),'title'=>array(),'loading'=>array()),
        'style'  => array(),
    )); ?>
    <?php else : ?>
    <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
    <div id="ee-form-7"></div>
    <?php endif; ?>
    <p class="secure-label">&#128274; Secure Data Transmission Active &middot; ISO 27001 Certified &middot; GDPR Compliant</p>
  </div>
</aside>
<script>
(function(){
  var dr=document.getElementById('admission-form'),
      back=document.getElementById('eeddBack'),
      x=document.getElementById('eeddClose'),
      last=null;
  if(!dr||!back||!x) return;
  function openD(from){
    last=from||null;
    dr.classList.add('open'); back.classList.add('open');
    document.body.style.overflow='hidden';
    document.body.classList.add('eedd-on');
    x.focus();
  }
  function closeD(){
    dr.classList.remove('open'); back.classList.remove('open');
    document.body.style.overflow='';
    document.body.classList.remove('eedd-on');
    if(last&&last.focus) last.focus();
  }
  /* delegated, so buttons rendered later still open the drawer */
  document.addEventListener('click',function(e){
    var a=e.target.closest('a[href$="#admission-form"]');
    if(!a) return;
    e.preventDefault();
    openD(a);
  });
  back.addEventListener('click',closeD);
  x.addEventListener('click',closeD);
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&dr.classList.contains('open')) closeD(); });
  /* arriving on #admission-form from another page opens it straight away */
  if(location.hash==='#admission-form') setTimeout(function(){ openD(null); },350);
})();
</script>
        <?php
    }
}
