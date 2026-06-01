<?php
/**
 * page-customers.php — /customers/ Customer Stories landing.
 * Wired via the template_redirect override in functions.php.
 * Content comes from WP Admin → 👥 Customers.
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    $title = 'Customer Stories — ExtraaEdge';
    $desc  = 'Customer success stories from institutions that scaled admissions and enrollment with ExtraaEdge.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/customers/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">' . "\n";
}, 5);

get_header();

$cu_set     = function_exists('ee_get_customers_settings') ? ee_get_customers_settings() : array();
$cu_stories = function_exists('ee_get_customers_stories')  ? ee_get_customers_stories()  : array();
$cu_cats    = function_exists('ee_customers_categories')   ? ee_customers_categories()   : array();

$stats = isset($cu_set['stats']) && is_array($cu_set['stats']) ? $cu_set['stats'] : array();
while (count($stats) < 4) $stats[] = array('num' => '', 'suffix' => '', 'lbl' => '');

/* Classify a video URL — returns array(type, embed_url, thumb_url)
 *   type = 'youtube' | 'vimeo' | 'mp4' | '' */
$ee_classify_video = function ($u) {
    $u = trim((string) $u);
    if ($u === '') return array('', '', '');
    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|v/|shorts/)|youtu\.be/)([A-Za-z0-9_\-]{6,})~i', $u, $m)) {
        $id = $m[1];
        return array(
            'youtube',
            'https://www.youtube.com/embed/' . $id . '?autoplay=1&rel=0&modestbranding=1&playsinline=1',
            'https://i.ytimg.com/vi/' . $id . '/hqdefault.jpg',
        );
    }
    if (preg_match('~vimeo\.com/(?:video/)?(\d+)~i', $u, $m)) {
        return array('vimeo', 'https://player.vimeo.com/video/' . $m[1] . '?autoplay=1&title=0&byline=0&portrait=0', '');
    }
    return array('mp4', $u, '');
};

/* Normalise rows (back-compat with the old schema) */
$rows = array();
foreach ($cu_stories as $r) {
    $cat = $r['cat'] ?? 'university';
    if (!isset($cu_cats[$cat])) $cat = 'university';
    $rows[] = array(
        'name'   => $r['name']   ?? ($r['title']   ?? ''),
        'person' => $r['person'] ?? '',
        'role'   => $r['role']   ?? ($r['est']     ?? ''),
        'cat'    => $cat,
        'note'   => $r['note']   ?? ($r['excerpt'] ?? ''),
        'video'  => $r['video']  ?? '',
        'thumb'  => $r['thumb']  ?? '',
        'url'    => $r['url']    ?? '#',
    );
}

/* Which category chips to show — only the ones with stories */
$used_cats = array();
foreach ($rows as $r) $used_cats[$r['cat']] = true;
$visible_cats = array_intersect_key($cu_cats, $used_cats);

/* Helper: initials from institute name (matches the JS in the design) */
$ee_initials = function ($name) {
    $stop = array('of','the','and','&','for','group','institute','institutes','university','college','school','academy','education');
    $clean = preg_replace('/[(),.]/', '', $name);
    $words = preg_split('/\s+/', trim($clean));
    $words = array_filter($words, function ($w) use ($stop) { return $w !== '' && !in_array(strtolower($w), $stop, true); });
    if (!$words) $words = preg_split('/\s+/', trim($name));
    $pick = array_slice(array_values($words), 0, 2);
    $ini  = '';
    foreach ($pick as $w) $ini .= function_exists('mb_substr') ? mb_substr($w, 0, 1) : substr($w, 0, 1);
    if ($ini === '') $ini = substr($name, 0, 2);
    return strtoupper($ini);
};

/* Cap output to avoid 70+ video iframes pre-rendering — design uses
   click-to-watch links; we don't auto-embed video on the grid. */
?>
<style>
.ee-cu{
  --cream:#FAF5EC;--paper:#FFFDF8;--ink:#1C1A16;--ink-soft:#5C564B;--ink-faint:#8A8377;
  --accent:#E2532A;--accent-deep:#BC3D17;
  --line:rgba(28,26,22,.12);--line-soft:rgba(28,26,22,.07);
  --shadow:0 1px 2px rgba(28,26,22,.04),0 8px 24px -12px rgba(28,26,22,.18);
  --shadow-lift:0 2px 4px rgba(28,26,22,.06),0 24px 48px -20px rgba(28,26,22,.34);
  background:var(--cream);color:var(--ink);font-family:'Hanken Grotesk',sans-serif;-webkit-font-smoothing:antialiased;line-height:1.5;position:relative;
}
.ee-cu *,.ee-cu *::before,.ee-cu *::after{box-sizing:border-box;margin:0;padding:0}
.ee-cu::before{content:"";position:absolute;inset:0;pointer-events:none;z-index:1;opacity:.035;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")}
.ee-cu .wrap{max-width:1240px;margin:0 auto;padding:0 28px;position:relative;z-index:2}

/* HERO */
.ee-cu .hero{padding:78px 0 56px;position:relative;overflow:hidden}
.ee-cu .eyebrow{font-size:12.5px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--accent-deep);margin-bottom:22px}
.ee-cu .hero h1{font-family:'Fraunces',serif;font-weight:600;font-size:clamp(40px,6.4vw,78px);line-height:1.02;letter-spacing:-.025em;max-width:15ch;color:var(--ink)}
.ee-cu .hero h1 em{font-style:italic;color:var(--accent)}
.ee-cu .hero p{font-size:clamp(17px,1.6vw,20px);color:var(--ink-soft);max-width:54ch;margin-top:26px}
.ee-cu .hero-deco{position:absolute;top:-40px;right:-60px;width:360px;height:360px;border-radius:50%;background:radial-gradient(circle at 30% 30%,rgba(226,83,42,.14),transparent 62%);pointer-events:none}

.ee-cu .reveal{opacity:0;transform:translateY(16px);animation:ee-cu-rise .8s cubic-bezier(.2,.7,.2,1) forwards}
@keyframes ee-cu-rise{to{opacity:1;transform:none}}
.ee-cu .d1{animation-delay:.05s}.ee-cu .d2{animation-delay:.15s}.ee-cu .d3{animation-delay:.25s}.ee-cu .d4{animation-delay:.35s}

/* OUTCOMES */
.ee-cu .outcomes{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--line);border:1px solid var(--line);border-radius:18px;overflow:hidden;margin-top:56px}
.ee-cu .stat{background:var(--paper);padding:30px 26px}
.ee-cu .stat .num{font-family:'Fraunces',serif;font-weight:600;font-size:clamp(34px,4vw,48px);letter-spacing:-.03em;line-height:1;color:var(--ink)}
.ee-cu .stat .num span{color:var(--accent)}
.ee-cu .stat .lbl{font-size:14px;color:var(--ink-soft);margin-top:12px;font-weight:500}
@media(max-width:760px){.ee-cu .outcomes{grid-template-columns:repeat(2,1fr)}}

/* CONTROLS */
.ee-cu .controls{position:sticky;top:0;z-index:50;background:rgba(250,245,236,.9);backdrop-filter:blur(10px);padding:24px 0 18px;margin-top:72px;border-bottom:1px solid var(--line-soft)}
.ee-cu .controls-row{display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap}
.ee-cu .pills{display:flex;flex-wrap:wrap;gap:8px}
.ee-cu .pill{font-family:inherit;font-size:13.5px;font-weight:600;color:var(--ink-soft);background:transparent;border:1px solid var(--line);padding:8px 15px;border-radius:100px;cursor:pointer;transition:all .2s;white-space:nowrap}
.ee-cu .pill:hover{border-color:var(--ink);color:var(--ink)}
.ee-cu .pill.active{background:var(--ink);color:var(--paper);border-color:var(--ink)}
.ee-cu .search{position:relative;flex:0 0 260px}
.ee-cu .search input{width:100%;font-family:inherit;font-size:14.5px;color:var(--ink);background:var(--paper);border:1px solid var(--line);border-radius:100px;padding:10px 16px 10px 40px;outline:none;transition:border-color .2s}
.ee-cu .search input:focus{border-color:var(--accent)}
.ee-cu .search svg{position:absolute;left:14px;top:50%;transform:translateY(-50%);opacity:.4}
.ee-cu .count{font-size:13.5px;color:var(--ink-faint);margin-top:14px;font-weight:500}
.ee-cu .count b{color:var(--ink);font-weight:700}
@media(max-width:640px){.ee-cu .search{flex-basis:100%}}

/* GRID */
.ee-cu .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:22px;padding:36px 0 30px}
.ee-cu .card{background:var(--paper);border:1px solid var(--line);border-radius:18px;overflow:hidden;box-shadow:var(--shadow);transition:transform .35s cubic-bezier(.2,.7,.2,1),box-shadow .35s,border-color .35s;display:flex;flex-direction:column;opacity:0;transform:translateY(14px);text-decoration:none;color:inherit}
.ee-cu .card.in{opacity:1;transform:none}
.ee-cu .card:hover{transform:translateY(-5px);box-shadow:var(--shadow-lift);border-color:rgba(28,26,22,.2)}
.ee-cu .card.hide{display:none}
.ee-cu .media{position:relative;aspect-ratio:16/10;background:#211D17;overflow:hidden;display:flex;align-items:center;justify-content:center}
.ee-cu .media.has-thumb{background-size:cover;background-position:center}
.ee-cu .media.has-thumb::before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,26,22,.05) 0%,rgba(28,26,22,.55) 100%);z-index:0}
.ee-cu .media.has-thumb .mono{display:none}
.ee-cu .media .glow{position:absolute;inset:0;background:radial-gradient(circle at 70% 25%,rgba(226,83,42,.32),transparent 60%)}
.ee-cu .media.has-thumb .glow{opacity:.35}
.ee-cu .mono{font-family:'Fraunces',serif;font-weight:600;font-size:46px;color:rgba(255,253,248,.16);letter-spacing:-.02em;user-select:none}
.ee-cu .chip{position:absolute;top:13px;left:13px;font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--ink);background:rgba(255,253,248,.92);padding:5px 10px;border-radius:100px}
.ee-cu .play{position:absolute;width:48px;height:48px;border-radius:50%;background:var(--accent);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 18px rgba(226,83,42,.5);transition:transform .3s}
.ee-cu .play::after{content:"";border-style:solid;border-width:8px 0 8px 13px;border-color:transparent transparent transparent var(--paper);margin-left:3px}
.ee-cu .card:hover .play{transform:scale(1.12)}
.ee-cu .tag-watch{position:absolute;bottom:13px;right:13px;font-size:11px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:rgba(255,253,248,.7)}
.ee-cu .body{padding:20px 21px 22px;display:flex;flex-direction:column;flex:1}
.ee-cu .body h3{font-family:'Fraunces',serif;font-weight:600;font-size:20px;line-height:1.15;letter-spacing:-.015em;margin-bottom:10px;color:var(--ink)}
.ee-cu .person{font-size:14px;font-weight:600;color:var(--ink)}
.ee-cu .role{font-size:13px;color:var(--ink-faint);margin-top:1px}
.ee-cu .note{font-size:14px;color:var(--ink-soft);line-height:1.5;margin-top:14px;padding-top:14px;border-top:1px solid var(--line-soft);flex:1}
.ee-cu .watch{font-size:13.5px;font-weight:700;color:var(--accent-deep);margin-top:16px;display:inline-flex;align-items:center;gap:6px;text-decoration:none}
.ee-cu .watch .arr{transition:transform .25s}
.ee-cu .card:hover .watch .arr{transform:translateX(4px)}
.ee-cu .empty{grid-column:1/-1;text-align:center;padding:60px 20px;color:var(--ink-faint);font-size:16px}

/* CTA */
.ee-cu .cta{margin:48px 0 70px;background:var(--ink);border-radius:24px;padding:clamp(40px,6vw,72px);color:var(--cream);position:relative;overflow:hidden}
.ee-cu .cta::after{content:"";position:absolute;bottom:-80px;right:-60px;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(226,83,42,.4),transparent 65%)}
.ee-cu .cta h2{font-family:'Fraunces',serif;font-weight:600;font-size:clamp(30px,4vw,46px);letter-spacing:-.02em;line-height:1.05;max-width:18ch;position:relative;color:var(--cream)}
.ee-cu .cta p{color:rgba(250,245,236,.7);margin-top:18px;font-size:17px;max-width:46ch;position:relative}
.ee-cu .cta a{display:inline-block;margin-top:30px;background:var(--accent);color:var(--paper);font-weight:700;font-size:15px;text-decoration:none;padding:14px 28px;border-radius:100px;position:relative;transition:transform .25s,background .25s}
.ee-cu .cta a:hover{background:var(--paper);color:var(--ink);transform:translateY(-2px)}

@media (prefers-reduced-motion:reduce){.ee-cu *,.ee-cu *::before,.ee-cu *::after{animation-duration:.01ms!important;transition-duration:.01ms!important}.ee-cu .card{opacity:1;transform:none}}

/* Inline video player swap — lives inside .media */
.ee-cu .media iframe,.ee-cu .media > video{position:absolute;inset:0;width:100%;height:100%;border:0;background:#000;z-index:5}
.ee-cu .media.playing .glow,.ee-cu .media.playing .chip,.ee-cu .media.playing .mono,.ee-cu .media.playing .play,.ee-cu .media.playing .tag-watch{display:none}
.ee-cu .media.playing::before{display:none}
.ee-cu .card.playing{cursor:default}
</style>

<div class="ee-cu" id="ee-customers">

  <section class="hero">
    <div class="wrap">
      <?php if (!empty($cu_set['eyebrow'])): ?><div class="eyebrow reveal d1"><?php echo esc_html($cu_set['eyebrow']); ?></div><?php endif; ?>
      <?php if (!empty($cu_set['hero_h1'])): ?><h1 class="reveal d2"><?php echo wp_kses_post($cu_set['hero_h1']); ?></h1><?php endif; ?>
      <?php if (!empty($cu_set['hero_p'])):  ?><p class="reveal d3"><?php echo esc_html($cu_set['hero_p']); ?></p><?php endif; ?>

      <div class="outcomes reveal d4">
        <?php foreach (array_slice($stats, 0, 4) as $st): ?>
          <div class="stat">
            <div class="num"><?php echo esc_html($st['num']); ?><span><?php echo esc_html($st['suffix']); ?></span></div>
            <div class="lbl"><?php echo esc_html($st['lbl']); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="hero-deco"></div>
  </section>

  <div class="controls">
    <div class="wrap">
      <div class="controls-row">
        <div class="pills" role="group" aria-label="Filter stories by category">
          <button type="button" class="pill active" data-cat="all">All stories</button>
          <?php foreach ($visible_cats as $k => $lab): ?>
            <button type="button" class="pill" data-cat="<?php echo esc_attr($k); ?>"><?php echo esc_html($lab); ?></button>
          <?php endforeach; ?>
        </div>
        <div class="search">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <input id="ee-cu-search" type="text" placeholder="Search institute or person…" aria-label="Search stories">
        </div>
      </div>
      <div class="count" id="ee-cu-count"></div>
    </div>
  </div>

  <div class="wrap">
    <div class="grid" id="ee-cu-grid">
      <?php foreach ($rows as $idx => $r):
        $name  = $r['name'];
        $cat   = $r['cat'];
        $label = $cu_cats[$cat] ?? $cat;
        $hue   = ((ord(substr($name, 0, 1)) * 7) % 30) - 15;
        list($vtype, $vembed, $vyt_thumb) = $ee_classify_video($r['video']);

        /* Thumbnail priority: custom upload → YouTube cover → none (initials fallback) */
        $thumb = $r['thumb'] ?: $vyt_thumb;
        $has_video = ($vtype !== '');
        /* Card behaviour: if video → open lightbox; else if external link → open it; else dead `<button>` */
        $has_link  = $has_video || (!empty($r['url']) && $r['url'] !== '#');
        $tag       = $has_link ? 'a' : 'div';
        $href      = $has_video ? '#'              : ($r['url'] ?: '#');
        $target    = ($has_video || empty($r['url'])) ? '' : ' target="_blank" rel="noopener"';

        $haystack = strtolower($name . ' ' . $r['person'] . ' ' . $r['role']);
      ?>
        <<?php echo $tag; ?> class="card"<?php echo $tag === 'a' ? ' href="' . esc_url($href) . '"' . $target : ''; ?>
           data-cat="<?php echo esc_attr($cat); ?>" data-q="<?php echo esc_attr($haystack); ?>" data-i="<?php echo (int) $idx; ?>"
           <?php if ($has_video): ?>data-vtype="<?php echo esc_attr($vtype); ?>" data-vsrc="<?php echo esc_attr($vembed); ?>" data-vtitle="<?php echo esc_attr($name); ?>"<?php endif; ?>>
          <div class="media<?php echo $thumb ? ' has-thumb' : ''; ?>"<?php echo $thumb ? ' style="background-image:url(\'' . esc_url($thumb) . '\')"' : ''; ?>>
            <div class="glow" style="filter:hue-rotate(<?php echo (int) $hue; ?>deg)"></div>
            <span class="chip"><?php echo esc_html($label); ?></span>
            <span class="mono"><?php echo esc_html($ee_initials($name)); ?></span>
            <?php if ($has_video): ?><span class="play" aria-hidden="true"></span><span class="tag-watch">Play video</span><?php endif; ?>
          </div>
          <div class="body">
            <h3><?php echo esc_html($name); ?></h3>
            <?php if (!empty($r['person'])): ?><div class="person"><?php echo esc_html($r['person']); ?></div><?php endif; ?>
            <?php if (!empty($r['role'])):   ?><div class="role"><?php echo esc_html($r['role']); ?></div><?php endif; ?>
            <?php if (!empty($r['note'])):   ?><p class="note"><?php echo esc_html($r['note']); ?></p><?php endif; ?>
            <?php if ($has_link): ?><span class="watch"><?php echo $has_video ? 'Watch the story' : 'Read the story'; ?> <span class="arr">→</span></span><?php endif; ?>
          </div>
        </<?php echo $tag; ?>>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="wrap">
    <div class="cta">
      <h2><?php echo esc_html($cu_set['cta_title']); ?></h2>
      <?php if (!empty($cu_set['cta_text'])): ?><p><?php echo esc_html($cu_set['cta_text']); ?></p><?php endif; ?>
      <a href="<?php echo esc_url($cu_set['cta_url']); ?>"><?php echo esc_html($cu_set['cta_btn']); ?> →</a>
    </div>
  </div>

</div>

<script>
(function(){
  var root  = document.getElementById('ee-customers'); if (!root) return;
  var pills = root.querySelectorAll('.pill');
  var grid  = document.getElementById('ee-cu-grid');
  var cards = grid ? grid.querySelectorAll('.card') : [];
  var search = document.getElementById('ee-cu-search');
  var countEl = document.getElementById('ee-cu-count');
  var CATS = <?php echo wp_json_encode($cu_cats); ?>;
  var state = { cat: 'all', q: '' };

  function visibleStories(){
    var n = 0;
    cards.forEach(function(c){
      var ok = (state.cat === 'all' || c.dataset.cat === state.cat)
            && (!state.q || c.dataset.q.indexOf(state.q) !== -1);
      c.classList.toggle('hide', !ok);
      if (ok) n++;
    });
    if (countEl){
      var word = (n === 1 ? 'story' : 'stories');
      var msg = 'Showing <b>' + n + '</b> ' + word;
      if (state.cat !== 'all' && CATS[state.cat]) msg += ' in ' + CATS[state.cat];
      if (state.q) msg += ' matching “' + state.q.replace(/[<>]/g, '') + '”';
      countEl.innerHTML = msg;
    }
  }

  pills.forEach(function(p){
    p.addEventListener('click', function(){
      pills.forEach(function(x){ x.classList.remove('active'); });
      p.classList.add('active');
      state.cat = p.dataset.cat;
      visibleStories();
    });
  });
  if (search){
    search.addEventListener('input', function(e){ state.q = e.target.value.trim().toLowerCase(); visibleStories(); });
  }

  /* In-card video swap — clicking the play button replaces the
     thumbnail with an iframe/video right inside the same .media box. */
  function stopOthers(except){
    cards.forEach(function(c){
      if (c === except) return;
      var media = c.querySelector('.media');
      if (!media || !media.classList.contains('playing')) return;
      var el = media.querySelector('iframe,video');
      if (el) el.parentNode.removeChild(el);
      media.classList.remove('playing');
      c.classList.remove('playing');
    });
  }
  function playInCard(card){
    var type = card.dataset.vtype;
    var src  = card.dataset.vsrc;
    var title = card.dataset.vtitle || '';
    if (!src) return;
    stopOthers(card);
    var media = card.querySelector('.media');
    if (!media || media.classList.contains('playing')) return;
    var el;
    if (type === 'mp4'){
      el = document.createElement('video');
      el.src = src; el.controls = true; el.autoplay = true; el.playsInline = true;
    } else {
      el = document.createElement('iframe');
      el.src = src; el.title = title;
      el.setAttribute('allow','accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
      el.setAttribute('allowfullscreen','');
      el.setAttribute('loading','lazy');
    }
    media.appendChild(el);
    media.classList.add('playing');
    card.classList.add('playing');
  }

  cards.forEach(function(c){
    if (!c.dataset.vsrc) return;
    c.addEventListener('click', function(e){
      /* Allow native link behaviour to bubble for keyboard-Enter on
         the underlying <a>, but for normal clicks we play inline. */
      e.preventDefault();
      playInCard(c);
    });
  });

  if ('IntersectionObserver' in window){
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          var i = parseInt(e.target.dataset.i || '0', 10);
          e.target.style.transitionDelay = (Math.min(i, 12) * 22) + 'ms';
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.08 });
    cards.forEach(function(c){ io.observe(c); });
  } else {
    cards.forEach(function(c){ c.classList.add('in'); });
  }

  visibleStories();
})();
</script>

<?php get_footer(); ?>
