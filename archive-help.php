<?php
/**
 * archive-help.php — Help Center / knowledge-base listing at /help/.
 *
 * Articles are grouped by their `_help_category` meta (the same field
 * single-help.php shows). Category chips + the search box filter entirely
 * client-side (the URL never changes shape, so page caches can't serve a
 * stale variant), with #cat=… hash deep-links. Scoped styles: .hcx-*
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* ---- gather every published help article, grouped by category ---- */
$hcx_q = new WP_Query(array(
    'post_type'      => 'help',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
    'no_found_rows'  => true,
));

$hcx_groups = array();
if ($hcx_q->have_posts()) {
    while ($hcx_q->have_posts()) {
        $hcx_q->the_post();
        $hid  = get_the_ID();
        $cat  = trim((string) get_post_meta($hid, '_help_category', true));
        if ($cat === '') $cat = 'General';
        $sub  = get_post_meta($hid, '_help_subtitle', true);
        if (!$sub) $sub = get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 22, '…');
        $hcx_groups[$cat][] = array(
            'title' => get_the_title(),
            'url'   => get_permalink(),
            'sub'   => $sub,
            'diff'  => strtolower((string) get_post_meta($hid, '_help_difficulty', true)) ?: 'beginner',
            'time'  => get_post_meta($hid, '_help_reading_time', true),
        );
    }
    wp_reset_postdata();
}
ksort($hcx_groups, SORT_NATURAL | SORT_FLAG_CASE);
$hcx_total = 0;
foreach ($hcx_groups as $g) { $hcx_total += count($g); }

$hcx_slug = function ($name) { return sanitize_title($name); };

/* ---- SEO ---- */
add_action('wp_head', function () use ($hcx_groups, $hcx_total) {
    $url = home_url('/help/');
    echo '<meta name="description" content="ExtraaEdge Help Center — ' . esc_attr($hcx_total) . ' guides and answers across ' . esc_attr(count($hcx_groups)) . ' categories. Setup, lead management, automation, integrations and more.">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<script type="application/ld+json">' . wp_json_encode(array(
        '@context' => 'https://schema.org',
        '@type'    => 'CollectionPage',
        'name'     => 'ExtraaEdge Help Center',
        'url'      => $url,
        'isPartOf' => array('@type' => 'WebSite', 'name' => get_bloginfo('name'), 'url' => home_url('/')),
    )) . '</script>' . "\n";
}, 5);

get_header();
?>
<style id="hcx-style">
.hcx{--nv:#19335D;--or:#DE6E30;--line:#e7ecf3;--mut:rgba(25,51,93,.68);font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:var(--nv);background:#fff}
.hcx *{box-sizing:border-box}
.hcx .w{max-width:1140px;margin:0 auto;padding:0 22px}
/* hero */
.hcx-hero{background:linear-gradient(160deg,#1c3966 0%,#19335D 55%,#142948 100%);color:#fff;padding:clamp(44px,7vw,80px) 0 clamp(56px,8vw,88px);text-align:center}
.hcx-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:12px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#fff;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.18);padding:7px 16px;border-radius:99px}
.hcx-eyebrow i{width:7px;height:7px;border-radius:50%;background:var(--or);font-style:normal}
.hcx-hero h1{font-size:clamp(30px,4.6vw,50px);font-weight:800;letter-spacing:-.025em;line-height:1.1;margin:18px 0 12px;color:#fff}
.hcx-hero p{font-size:clamp(15px,1.7vw,17.5px);color:rgba(255,255,255,.75);max-width:560px;margin:0 auto 26px;line-height:1.6}
.hcx-search{position:relative;max-width:600px;margin:0 auto}
.hcx-search svg{position:absolute;left:18px;top:50%;transform:translateY(-50%);width:19px;height:19px;color:rgba(25,51,93,.5);pointer-events:none}
.hcx-search input{width:100%;padding:16px 48px 16px 48px;border-radius:999px;border:0;font:500 15.5px/1.3 'Inter',sans-serif;color:var(--nv);outline:none;box-shadow:0 18px 44px -18px rgba(4,12,26,.55)}
.hcx-search input::placeholder{color:rgba(25,51,93,.45)}
.hcx-search .x{position:absolute;right:10px;top:50%;transform:translateY(-50%);width:32px;height:32px;border-radius:50%;background:#f1f4f9;color:var(--nv);border:0;cursor:pointer;font-weight:800;display:none}
.hcx-search.has .x{display:block}
.hcx-count{margin-top:14px;font-size:12.5px;color:rgba(255,255,255,.6);font-weight:600;min-height:18px}
/* chips */
.hcx-chips{display:flex;gap:9px;overflow-x:auto;scrollbar-width:none;padding:22px 0 6px;-webkit-overflow-scrolling:touch}
.hcx-chips::-webkit-scrollbar{display:none}
.hcx-chip{flex:none;display:inline-flex;align-items:center;gap:7px;font:700 13px/1 'Inter',sans-serif;color:var(--nv);background:#fff;border:1.5px solid var(--line);border-radius:999px;padding:10px 16px;cursor:pointer;transition:.2s;white-space:nowrap}
.hcx-chip b{font-size:11px;color:var(--or);font-weight:800}
.hcx-chip:hover{border-color:var(--or)}
.hcx-chip.on{background:var(--nv);border-color:var(--nv);color:#fff}
.hcx-chip.on b{color:#f2a06e}
/* category sections */
.hcx-cats{padding:8px 0 54px}
.hcx-cat{margin-top:34px}
.hcx-cat.hide{display:none}
.hcx-cat-h{display:flex;align-items:center;gap:13px;margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid var(--line)}
.hcx-cat-h .ic{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,var(--or),#e8843f);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:16px;flex:none}
.hcx-cat-h h2{font-size:clamp(19px,2.4vw,24px);font-weight:800;letter-spacing:-.02em;margin:0;flex:1;min-width:0}
.hcx-cat-h .n{font-size:12px;font-weight:700;color:var(--mut);white-space:nowrap}
.hcx-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}
.hcx-card{display:flex;flex-direction:column;gap:9px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px;text-decoration:none;color:var(--nv);transition:transform .25s,box-shadow .25s,border-color .25s}
.hcx-card:hover{transform:translateY(-3px);border-color:rgba(222,110,48,.5);box-shadow:0 18px 38px -20px rgba(25,51,93,.28)}
.hcx-card.hide{display:none}
.hcx-card h3{font-size:15.5px;font-weight:800;letter-spacing:-.01em;line-height:1.35;margin:0}
.hcx-card p{font-size:13px;color:var(--mut);line-height:1.55;margin:0;flex:1}
.hcx-meta{display:flex;align-items:center;gap:10px;font-size:11px;font-weight:700}
.hcx-diff{padding:3px 9px;border-radius:99px;letter-spacing:.05em;text-transform:uppercase}
.hcx-diff.beginner{background:#eaf7ee;color:#1a7f37}
.hcx-diff.intermediate{background:#fff3e8;color:#c85d20}
.hcx-diff.advanced{background:#edf1fb;color:#19335D}
.hcx-meta .t{color:rgba(25,51,93,.5)}
.hcx-meta .go{margin-left:auto;color:var(--or);font-weight:800;transition:transform .2s}
.hcx-card:hover .go{transform:translateX(3px)}
/* empty state */
.hcx-empty{display:none;text-align:center;padding:60px 20px;color:var(--mut)}
.hcx-empty.show{display:block}
.hcx-empty b{display:block;font-size:18px;color:var(--nv);margin-bottom:6px}
/* contact band */
.hcx-cta{background:linear-gradient(135deg,#19335D,#22467c);border-radius:22px;padding:clamp(26px,4vw,44px);display:flex;align-items:center;justify-content:space-between;gap:22px;flex-wrap:wrap;color:#fff;margin:10px 0 60px}
.hcx-cta h2{font-size:clamp(20px,2.8vw,28px);font-weight:800;letter-spacing:-.02em;margin:0 0 6px;color:#fff}
.hcx-cta p{margin:0;font-size:14px;color:rgba(255,255,255,.75)}
.hcx-cta .act{display:flex;gap:12px;flex-wrap:wrap}
.hcx-btn{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:14.5px;padding:13px 24px;border-radius:999px;text-decoration:none;transition:.2s;white-space:nowrap}
.hcx-btn.solid{background:var(--or);color:#fff;box-shadow:0 12px 26px -12px rgba(222,110,48,.7)}
.hcx-btn.solid:hover{transform:translateY(-2px);background:#c85d20;color:#fff}
.hcx-btn.ghost{background:rgba(255,255,255,.08);color:#fff;border:1px solid rgba(255,255,255,.25)}
.hcx-btn.ghost:hover{background:rgba(255,255,255,.16);color:#fff}
/* breadcrumb */
.hcx-bc{padding:16px 0 0;font-size:12.5px;font-weight:600;color:var(--mut)}
.hcx-bc a{color:var(--nv);text-decoration:none}
.hcx-bc a:hover{color:var(--or)}
@media(max-width:900px){.hcx-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:600px){
  .hcx-grid{grid-template-columns:1fr}
  .hcx-search input{padding:14px 44px}
  .hcx-cta{flex-direction:column;align-items:flex-start}
  .hcx-cta .act,.hcx-cta .act .hcx-btn{width:100%;justify-content:center}
}
@media(prefers-reduced-motion:reduce){.hcx-card,.hcx-chip,.hcx-btn{transition:none}}
</style>

<main id="main-content" class="hcx">

  <section class="hcx-hero">
    <div class="w">
      <span class="hcx-eyebrow"><i></i> Help Center</span>
      <h1>How can we help you today?</h1>
      <p>Guides, answers and best practices for every corner of ExtraaEdge — from first login to advanced automation.</p>
      <div class="hcx-search" id="hcxSearch">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
        <input type="search" id="hcxQ" placeholder="Search <?php echo (int) $hcx_total; ?> articles… (e.g. WhatsApp, import leads)" autocomplete="off" aria-label="Search help articles">
        <button class="x" id="hcxX" type="button" aria-label="Clear search">✕</button>
      </div>
      <div class="hcx-count" id="hcxCount" aria-live="polite"></div>
    </div>
  </section>

  <div class="w">
    <nav class="hcx-bc" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <span style="color:var(--or)">Help Center</span></nav>

    <?php if ($hcx_groups) : ?>
    <div class="hcx-chips" id="hcxChips" role="tablist" aria-label="Help categories">
      <button class="hcx-chip on" data-cat="all" type="button">All <b><?php echo (int) $hcx_total; ?></b></button>
      <?php foreach ($hcx_groups as $cat => $items) : ?>
        <button class="hcx-chip" data-cat="<?php echo esc_attr($hcx_slug($cat)); ?>" type="button"><?php echo esc_html($cat); ?> <b><?php echo count($items); ?></b></button>
      <?php endforeach; ?>
    </div>

    <div class="hcx-cats" id="hcxCats">
      <?php foreach ($hcx_groups as $cat => $items) : ?>
      <section class="hcx-cat" data-cat="<?php echo esc_attr($hcx_slug($cat)); ?>" id="cat-<?php echo esc_attr($hcx_slug($cat)); ?>">
        <div class="hcx-cat-h">
          <span class="ic" aria-hidden="true"><?php echo esc_html(strtoupper(mb_substr($cat, 0, 1))); ?></span>
          <h2><?php echo esc_html($cat); ?></h2>
          <span class="n"><?php echo count($items); ?> article<?php echo count($items) === 1 ? '' : 's'; ?></span>
        </div>
        <div class="hcx-grid">
          <?php foreach ($items as $a) : ?>
          <a class="hcx-card" href="<?php echo esc_url($a['url']); ?>" data-s="<?php echo esc_attr(mb_strtolower($a['title'] . ' ' . $a['sub'] . ' ' . $cat)); ?>">
            <h3><?php echo esc_html($a['title']); ?></h3>
            <p><?php echo esc_html($a['sub']); ?></p>
            <span class="hcx-meta">
              <span class="hcx-diff <?php echo esc_attr(in_array($a['diff'], array('beginner', 'intermediate', 'advanced'), true) ? $a['diff'] : 'beginner'); ?>"><?php echo esc_html(ucfirst($a['diff'])); ?></span>
              <?php if ($a['time']) : ?><span class="t"><?php echo esc_html($a['time']); ?> min read</span><?php endif; ?>
              <span class="go" aria-hidden="true">→</span>
            </span>
          </a>
          <?php endforeach; ?>
        </div>
      </section>
      <?php endforeach; ?>
      <div class="hcx-empty" id="hcxEmpty"><b>No articles match your search.</b>Try a different word, or browse a category above.</div>
    </div>
    <?php else : ?>
    <div class="hcx-empty show" style="display:block"><b>Help articles are coming soon.</b>Meanwhile, our team is one click away.</div>
    <?php endif; ?>

    <section class="hcx-cta">
      <div>
        <h2>Still stuck? Talk to a human.</h2>
        <p>Our support team answers within a few hours — or see the platform live with a guided demo.</p>
      </div>
      <div class="act">
        <a class="hcx-btn solid" href="<?php echo esc_url(home_url('/book-demo/')); ?>">Book a Demo →</a>
        <a class="hcx-btn ghost" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Support</a>
      </div>
    </section>
  </div>

</main>

<script>
(function(){
  var chips = document.querySelectorAll('.hcx-chip');
  var cats  = document.querySelectorAll('.hcx-cat');
  var cards = document.querySelectorAll('.hcx-card');
  var q     = document.getElementById('hcxQ');
  var xBtn  = document.getElementById('hcxX');
  var box   = document.getElementById('hcxSearch');
  var cnt   = document.getElementById('hcxCount');
  var empty = document.getElementById('hcxEmpty');
  if (!q) return;
  var activeCat = 'all';

  function apply(){
    var term = q.value.trim().toLowerCase();
    box.classList.toggle('has', term !== '');
    var visible = 0;
    cats.forEach(function(sec){
      var catOk = activeCat === 'all' || sec.dataset.cat === activeCat;
      var inSec = 0;
      sec.querySelectorAll('.hcx-card').forEach(function(c){
        var hit = catOk && (term === '' || (c.dataset.s || '').indexOf(term) !== -1);
        c.classList.toggle('hide', !hit);
        if (hit) inSec++;
      });
      sec.classList.toggle('hide', inSec === 0);
      visible += inSec;
    });
    if (empty) empty.classList.toggle('show', visible === 0);
    if (cnt) cnt.textContent = term !== '' ? (visible + ' article' + (visible === 1 ? '' : 's') + ' found') : '';
  }

  chips.forEach(function(ch){
    ch.addEventListener('click', function(){
      chips.forEach(function(x){ x.classList.remove('on'); });
      ch.classList.add('on');
      activeCat = ch.dataset.cat;
      /* hash deep-link — the path never changes, so page caches stay valid */
      try { history.replaceState(null, '', activeCat === 'all' ? location.pathname : '#cat=' + activeCat); } catch (e) {}
      apply();
    });
  });
  q.addEventListener('input', apply);
  if (xBtn) xBtn.addEventListener('click', function(){ q.value = ''; apply(); q.focus(); });

  /* deep link: /help/#cat=getting-started (on load and on hash change) */
  function fromHash(){
    var m = /#cat=([a-z0-9\-]+)/.exec(location.hash || '');
    var want = m ? m[1] : 'all';
    chips.forEach(function(ch){
      if (ch.dataset.cat === want) {
        chips.forEach(function(x){ x.classList.remove('on'); });
        ch.classList.add('on');
        activeCat = want;
        apply();
      }
    });
  }
  window.addEventListener('hashchange', fromHash);
  fromHash();
})();
</script>

<?php get_footer(); ?>
