<?php
/**
 * VidyaAI theme — footer (site footer, page scripts, wp_footer).
 */
?>
<footer id="ft">
  <div class="wrap">
    <div class="ft-top">
      <div style="max-width:300px">
        <a href="/" class="logo"><span class="mark">V</span>Vidya<b>AI</b></a>
        <p style="margin-top:14px;font-size:14px">The 24/7 AI admission agent — part of the ExtraaEdge admission stack.</p>
      </div>
      <div class="ft-cols">
        <div><h4>Product</h4><a href="#vidyagpt">VidyaGPT</a><a href="#calling">AI Calling</a><a href="#scoring">Intent Scoring</a><a href="#integrations">Integrations</a></div>
        <div><h4>Company</h4><a href="https://www.extraaedge.com/">ExtraaEdge CRM</a><a href="#demo">Book a Demo</a><a href="#faq">FAQ</a></div>
        <div><h4>Trust</h4><a href="#security">Security</a><a href="#security">ISO 27001</a><a href="#security">GDPR</a></div>
      </div>
    </div>
    <div class="ft-bot">
      <span>© <?php echo date('Y'); ?> ExtraaEdge Technology Solutions Pvt. Ltd · VidyaAI</span>
      <span>Made for admission teams · getvidya.ai</span>
    </div>
  </div>
</footer>

<script>
/* Mobile nav toggle */
(function(){
  var b=document.querySelector('.nav-burger'), links=document.querySelector('.nav-links');
  if(b&&links){b.addEventListener('click',function(){
    var open=links.style.display==='flex';
    links.style.cssText=open?'':'display:flex;position:absolute;top:70px;left:0;right:0;flex-direction:column;background:#fff;padding:18px 24px;gap:16px;border-bottom:1px solid var(--line);box-shadow:0 18px 40px rgba(15,23,42,.12)';
  });}
})();
/* FAQ accordion */
document.querySelectorAll('.faq-q').forEach(function(q){
  q.addEventListener('click',function(){
    var it=q.closest('.faq-item'); var open=it.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(function(i){i.classList.remove('open')});
    if(!open) it.classList.add('open');
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
