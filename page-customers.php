<?php
/**
 * page-customers.php — /customers/ Customer Success Stories landing.
 * Wired via the template_redirect override in functions.php.
 * Content comes from WP Admin → 👥 Customers.
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    $title = 'Customer Success Stories | ExtraaEdge';
    $desc  = 'Customer success stories from institutions that scaled admissions and enrollment with ExtraaEdge.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/customers/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="theme-color" content="#19335D">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;0,9..144,900;1,9..144,400;1,9..144,500&family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">' . "\n";
}, 5);

get_header();

$cu_set     = function_exists('ee_get_customers_settings') ? ee_get_customers_settings() : array();
$cu_stories = function_exists('ee_get_customers_stories')  ? ee_get_customers_stories()  : array();
$cu_cats    = function_exists('ee_customers_categories')   ? ee_customers_categories()   : array();

/* Only show filter chips whose category has at least one story */
$used_cats = array();
foreach ($cu_stories as $s) {
    if (!empty($s['cat'])) $used_cats[$s['cat']] = true;
}
$visible_cats = array_intersect_key($cu_cats, $used_cats);

/* SVG poster generator (matches the JS posterFor() in the original design) */
$ee_poster = function ($a, $b) {
    $svg  = '<svg xmlns="http://www.w3.org/2000/svg" width="640" height="360" viewBox="0 0 640 360">';
    $svg .= '<defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="' . $a . '"/><stop offset="100%" stop-color="' . $b . '"/></linearGradient></defs>';
    $svg .= '<rect width="640" height="360" fill="url(#g)"/>';
    $svg .= '<circle cx="500" cy="80"  r="140" fill="#ffffff" opacity="0.12"/>';
    $svg .= '<circle cx="120" cy="300" r="100" fill="#ffffff" opacity="0.10"/>';
    $svg .= '<circle cx="320" cy="180" r="40"  fill="#ffffff" opacity="0.95"/>';
    $svg .= '<path d="M309 162 L335 180 L309 198 Z" fill="' . $a . '"/></svg>';
    return 'data:image/svg+xml;charset=utf-8,' . rawurlencode($svg);
};
?>
<style>
.ee-cu{
  --navy:#19335D;--navy-mid:#1E3F73;--navy-deep:#112240;
  --orange:#DE6E30;--orange-deep:#C25A22;--orange-tint:#F7D9C8;
  --green:#1F4D3D;
  --paper:#F5F0E8;--card:#FCF9F3;
  --ink:#16243B;--ink-soft:#55617A;--ink-faint:#8A93A6;
  --line:rgba(25,51,93,0.14);--line-soft:rgba(25,51,93,0.07);
  --shadow-card:0 1px 3px rgba(17,34,64,.06),0 6px 22px -10px rgba(17,34,64,.18);
  --shadow-hover:0 18px 46px -20px rgba(17,34,64,.34),0 3px 10px rgba(17,34,64,.08);
  --tr:all .28s cubic-bezier(.4,0,.2,1);
  --tr-fast:all .18s cubic-bezier(.4,0,.2,1);
  background:var(--paper);color:var(--ink);font-family:'Hanken Grotesk',-apple-system,BlinkMacSystemFont,sans-serif;line-height:1.55;position:relative;
}
.ee-cu *,.ee-cu *::before,.ee-cu *::after{margin:0;padding:0;box-sizing:border-box}
.ee-cu::before{content:"";position:absolute;inset:0;pointer-events:none;z-index:1;opacity:.55;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");mix-blend-mode:multiply}
.ee-cu .wrap{max-width:1180px;margin:0 auto;padding:56px 28px 80px;position:relative;z-index:2}

.ee-cu .sec-head{display:flex;align-items:flex-end;justify-content:space-between;margin:0 0 8px;gap:24px;flex-wrap:wrap}
.ee-cu .sec-head h2{font-family:'Fraunces',serif;font-weight:500;font-size:clamp(1.9rem,4vw,2.8rem);letter-spacing:-.02em;line-height:1;color:var(--navy)}
.ee-cu .sec-head p{color:var(--ink-soft);max-width:34ch;font-size:.98rem}

.ee-cu .filters{display:flex;flex-wrap:wrap;gap:10px;margin:26px 0 10px}
.ee-cu .chip{font-family:'Hanken Grotesk',sans-serif;font-size:.86rem;font-weight:700;cursor:pointer;background:transparent;color:var(--ink-soft);border:1px solid var(--line);padding:9px 18px;border-radius:30px;transition:var(--tr-fast)}
.ee-cu .chip:hover{border-color:var(--navy);color:var(--navy)}
.ee-cu .chip.active{background:var(--navy);color:#fff;border-color:var(--navy)}
.ee-cu .chip:focus-visible{outline:2px solid var(--orange);outline-offset:2px}

.ee-cu .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:30px}
@media(max-width:1000px){.ee-cu .grid{grid-template-columns:1fr 1fr}}
@media(max-width:620px){.ee-cu .grid{grid-template-columns:1fr}}

.ee-cu .card{background:var(--card);border:1px solid var(--line-soft);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;position:relative;transition:transform .3s,box-shadow .3s,border-color .3s;opacity:0;transform:translateY(22px);box-shadow:var(--shadow-card)}
.ee-cu .card.shown{opacity:1;transform:none;transition:opacity .6s,transform .6s,box-shadow .3s,border-color .3s}
.ee-cu .card:hover{transform:translateY(-6px);box-shadow:var(--shadow-hover);border-color:var(--orange-tint)}
.ee-cu .card.hide{display:none}

.ee-cu .banner{position:relative;width:100%;aspect-ratio:16/9;overflow:hidden;flex-shrink:0;background:var(--card-grad,linear-gradient(135deg,var(--orange),var(--navy)))}
.ee-cu .banner video,.ee-cu .banner .poster{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:1;background:var(--card-grad);display:block}
.ee-cu .banner .poster{background-size:cover;background-position:center}
.ee-cu .scrim{position:absolute;inset:0;z-index:2;pointer-events:none;background:linear-gradient(180deg,rgba(17,34,64,.30) 0%,transparent 40%,rgba(17,34,64,.10) 100%)}
.ee-cu .b-tag{position:absolute;top:.9rem;left:.9rem;z-index:3;background:rgba(252,249,243,.94);color:var(--navy);font-size:.66rem;font-weight:800;letter-spacing:.06em;text-transform:uppercase;padding:.32rem .7rem;border-radius:100px;backdrop-filter:blur(4px)}
.ee-cu .b-metric{position:absolute;top:.9rem;right:.9rem;z-index:3;display:inline-flex;align-items:baseline;gap:.25rem;background:var(--navy-deep);color:#fff;font-size:.66rem;font-weight:700;padding:.32rem .65rem;border-radius:100px}
.ee-cu .b-metric b{font-size:.84rem;color:#FDBA74}

.ee-cu .cat{font-size:.68rem;text-transform:uppercase;letter-spacing:.14em;font-weight:800;color:var(--orange-deep)}
.ee-cu .cat.business{color:#946012}
.ee-cu .cat.skilling{color:var(--green)}
.ee-cu .cat.creative{color:#6B2E63}
.ee-cu .cat.fitness{color:#1B5A6B}
.ee-cu .cat.testimonial{color:var(--navy-mid)}
.ee-cu .card .body{padding:22px 26px 26px;display:flex;flex-direction:column;flex:1}
.ee-cu .card .toprow{display:flex;align-items:center;justify-content:space-between;margin-bottom:12px}
.ee-cu .card h3{font-family:'Fraunces',serif;font-weight:500;font-size:1.26rem;line-height:1.16;letter-spacing:-.01em;margin-bottom:8px;color:var(--navy)}
.ee-cu .card .est{font-size:.76rem;color:var(--ink-faint);font-weight:600;margin-bottom:14px}
.ee-cu .card p.exc{font-size:.92rem;color:var(--ink-soft);margin-bottom:20px;line-height:1.6}
.ee-cu .loves{font-size:.72rem;text-transform:uppercase;letter-spacing:.13em;font-weight:800;color:var(--ink-faint);margin-bottom:12px}
.ee-cu ul.hl{list-style:none;margin-bottom:20px;display:flex;flex-direction:column;gap:9px}
.ee-cu ul.hl li{font-size:.9rem;color:var(--ink);display:flex;gap:11px;align-items:flex-start;line-height:1.35}
.ee-cu ul.hl li::before{content:"";flex:none;width:7px;height:7px;border-radius:2px;background:var(--orange);margin-top:7px;transform:rotate(45deg)}
.ee-cu .card .read{margin-top:auto;display:inline-flex;align-items:center;gap:8px;font-weight:800;font-size:.86rem;color:var(--orange-deep);text-decoration:none;padding-top:14px;border-top:1px solid var(--line-soft)}
.ee-cu .card .read svg{transition:transform .3s}
.ee-cu .card:hover .read svg{transform:translateX(5px)}

.ee-cu .cta{margin:96px 0 0;background:var(--navy);border-radius:28px;padding:clamp(46px,7vw,80px);text-align:center;position:relative;overflow:hidden;color:#fff}
.ee-cu .cta::before{content:"";position:absolute;top:-80px;left:50%;transform:translateX(-50%);width:540px;height:320px;background:radial-gradient(ellipse,var(--orange) 0%,transparent 65%);opacity:.45}
.ee-cu .cta h2{font-family:'Fraunces',serif;font-weight:500;font-size:clamp(2rem,5vw,3.4rem);line-height:1.04;letter-spacing:-.02em;position:relative;max-width:18ch;margin:0 auto;color:#fff}
.ee-cu .cta h2 em{font-style:italic;color:#FDBA74}
.ee-cu .cta p{position:relative;margin:22px auto 34px;max-width:46ch;opacity:.85;font-size:1.05rem;color:#fff}
.ee-cu .cta-btn{position:relative;display:inline-flex;align-items:center;gap:10px;background:var(--orange);color:#fff;padding:16px 34px;border-radius:40px;font-weight:700;font-size:1rem;text-decoration:none;transition:var(--tr)}
.ee-cu .cta-btn:hover{transform:translateY(-3px);background:var(--orange-deep);color:#fff}

@media (prefers-reduced-motion:reduce){.ee-cu *,.ee-cu *::before,.ee-cu *::after{animation-duration:.01ms!important;transition-duration:.01ms!important}.ee-cu .card{opacity:1;transform:none}}
</style>

<div class="ee-cu">
<main class="wrap" id="ee-stories">

  <div class="sec-head">
    <h2><?php echo esc_html($cu_set['sec_title']); ?></h2>
    <p><?php echo esc_html($cu_set['sec_sub']); ?></p>
  </div>

  <?php if ($visible_cats): ?>
  <div class="filters" role="group" aria-label="Filter stories by category">
    <button type="button" class="chip active" data-filter="all">All stories</button>
    <?php foreach ($visible_cats as $k => $lab): ?>
      <button type="button" class="chip" data-filter="<?php echo esc_attr($k); ?>"><?php echo esc_html($lab); ?></button>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <div class="grid" role="list" aria-label="Customer success stories">
    <?php foreach ($cu_stories as $i => $s):
      $cat   = $s['cat']     ?? 'engineering';
      $tag   = $s['tag']     ?? '';
      $title = $s['title']   ?? '';
      $est   = $s['est']     ?? '';
      $bt    = ($s['body_type'] ?? 'excerpt') === 'loves' ? 'loves' : 'excerpt';
      $exc   = $s['excerpt'] ?? '';
      $loves = array_filter(array_map('trim', preg_split('/\r?\n/', (string) ($s['loves'] ?? ''))));
      $mv    = $s['metric_v'] ?? '';
      $ml    = $s['metric_l'] ?? '';
      $vid   = $s['video']   ?? '';
      $cA    = !empty($s['color_a']) ? $s['color_a'] : '#DE6E30';
      $cB    = !empty($s['color_b']) ? $s['color_b'] : '#F7B267';
      $url   = $s['url']     ?? '#';
      $grad  = "linear-gradient(135deg, $cA, $cB)";
      $poster = $ee_poster($cA, $cB);
    ?>
      <div class="card" role="listitem" data-cat="<?php echo esc_attr($cat); ?>">
        <div class="banner" style="--card-grad:<?php echo esc_attr($grad); ?>">
          <?php if ($vid): ?>
            <video controls playsinline preload="metadata" poster="<?php echo esc_attr($poster); ?>"><source src="<?php echo esc_url($vid); ?>" type="video/mp4">Your browser does not support video.</video>
          <?php else: ?>
            <div class="poster" style="background-image:url('<?php echo esc_attr($poster); ?>')" aria-hidden="true"></div>
          <?php endif; ?>
          <span class="scrim"></span>
          <?php if ($tag): ?><span class="b-tag"><?php echo esc_html($tag); ?></span><?php endif; ?>
          <?php if ($mv): ?><span class="b-metric"><b><?php echo esc_html($mv); ?></b> <?php echo esc_html($ml); ?></span><?php endif; ?>
        </div>
        <div class="body">
          <div class="toprow"><span class="cat <?php echo esc_attr($cat); ?>"><?php echo esc_html($cu_cats[$cat] ?? $cat); ?></span></div>
          <?php if ($title): ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
          <?php if ($est): ?><div class="est"><?php echo esc_html($est); ?></div><?php endif; ?>
          <?php if ($bt === 'loves' && $loves): ?>
            <p class="loves">Loves ExtraaEdge for</p>
            <ul class="hl"><?php foreach ($loves as $l): ?><li><?php echo esc_html($l); ?></li><?php endforeach; ?></ul>
          <?php elseif ($exc): ?>
            <p class="exc"><?php echo esc_html($exc); ?></p>
          <?php endif; ?>
          <a class="read" href="<?php echo esc_url($url); ?>">Read story <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M2 7H12M8 3L12 7L8 11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <section class="cta" id="cta">
    <h2><?php echo wp_kses_post($cu_set['cta_title']); ?></h2>
    <?php if (!empty($cu_set['cta_text'])): ?><p><?php echo esc_html($cu_set['cta_text']); ?></p><?php endif; ?>
    <a href="<?php echo esc_url($cu_set['cta_url']); ?>" class="cta-btn"><?php echo esc_html($cu_set['cta_btn']); ?> <span>→</span></a>
  </section>

</main>
</div>

<script>
(function(){
  var root = document.querySelector('.ee-cu'); if (!root) return;
  var chips = root.querySelectorAll('.chip');
  var cards = root.querySelectorAll('.card');
  chips.forEach(function(c){
    c.addEventListener('click', function(){
      chips.forEach(function(x){ x.classList.remove('active'); });
      c.classList.add('active');
      var f = c.dataset.filter;
      cards.forEach(function(card){
        card.classList.toggle('hide', !(f === 'all' || card.dataset.cat === f));
      });
    });
  });
  if (!('IntersectionObserver' in window)){
    cards.forEach(function(c){ c.classList.add('shown'); });
    return;
  }
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if (e.isIntersecting){
        var idx = Array.prototype.indexOf.call(cards, e.target) % 3;
        e.target.style.transitionDelay = (idx * 0.07) + 's';
        e.target.classList.add('shown');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  cards.forEach(function(c){ io.observe(c); });
  /* Pause other videos when one starts */
  root.querySelectorAll('video').forEach(function(v){
    v.addEventListener('play', function(){
      root.querySelectorAll('video').forEach(function(o){ if (o !== v) o.pause(); });
    });
  });
})();
</script>

<?php get_footer(); ?>
