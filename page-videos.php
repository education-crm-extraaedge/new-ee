<?php
/**
 * /videos/ — the video library.
 *
 * Two shapes, both rendered from here via the router in functions.php:
 *   /videos/           landing — every category with a preview row
 *   /videos/{slug}/    one category, grouped by section, everything shown
 *
 * Data lives in inc/videos-data.php. Thumbnails come straight from
 * YouTube (i.ytimg.com) and nothing embeds until the visitor clicks, so
 * a 229-video page still loads as fast as a normal listing.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

$ee_vid_data = get_stylesheet_directory() . '/inc/videos-data.php';
if (!file_exists($ee_vid_data)) $ee_vid_data = get_template_directory() . '/inc/videos-data.php';
if (file_exists($ee_vid_data)) require_once $ee_vid_data;

if (!function_exists('ee_video_library')) { get_header(); echo '<div class="container" style="padding:80px 0">Video library data file is missing.</div>'; get_footer(); return; }

$ee_vid_cats   = ee_video_library();
$ee_vid_slug   = isset($GLOBALS['ee_video_cat']) ? $GLOBALS['ee_video_cat'] : '';
$ee_vid_active = $ee_vid_slug ? ee_video_category($ee_vid_slug) : null;

$ee_vid_title = $ee_vid_active ? $ee_vid_active['name'] : 'Videos';
$GLOBALS['ee_custom_route_title'] = $ee_vid_title;
add_filter('pre_get_document_title', function () use ($ee_vid_title) {
    return $ee_vid_title . ' — ExtraaEdge Video Library';
}, 99);

/* How many cards each category shows on the landing page. */
$EE_VID_PREVIEW = 8;

get_header();
?>

<!-- ee-videos-tpl v2026-08-04-videos-admin -->
<style id="ee-videos-css">
/* ── /videos/ ────────────────────────────────────────────────────────────
   Brand palette only: #19335D navy, #DE6E30 orange, Inter. Cards are a
   16:9 YouTube thumbnail with a play badge; the player is a dialog that
   only builds its iframe on click. */
#ee-videos{ --v-navy:#19335D; --v-orange:#DE6E30; --v-orange-700:#B5551D;
  --v-ink:#1F2937; --v-muted:#6B7C96; --v-line:#E5E7EB; --v-bg:#F8FAFC;
  font-family:'Inter',system-ui,sans-serif; color:var(--v-ink);
  background:linear-gradient(180deg,#FBFCFE 0%,#fff 320px); padding:clamp(28px,4vw,48px) 0 clamp(48px,6vw,80px); }
#ee-videos .v-wrap{ max-width:1280px; margin:0 auto; padding:0 22px; }

/* head */
#ee-videos .v-eyebrow{ display:block; font:800 11.5px/1 'Inter',sans-serif; letter-spacing:.13em;
  text-transform:uppercase; color:var(--v-orange-700); margin-bottom:10px; }
html body #main-content #ee-videos h1.v-h1{
  margin:0 0 12px !important; color:var(--v-navy) !important; font-weight:800 !important; }
#ee-videos .v-h1 em{ font-style:normal; color:var(--v-orange); }
#ee-videos .v-lead{ margin:0; max-width:62ch; color:var(--v-muted); font-size:15.5px; line-height:1.65; }

/* category nav */
#ee-videos .v-nav{ display:flex; flex-wrap:wrap; gap:9px; margin:clamp(20px,3vw,30px) 0 0; }
#ee-videos .v-nav a{ display:inline-flex; align-items:center; padding:9px 16px; border-radius:999px;
  border:1px solid var(--v-line); background:#fff; color:var(--v-navy); text-decoration:none;
  font-size:13.5px; font-weight:600; transition:border-color .2s ease,color .2s ease,background .2s ease; }
#ee-videos .v-nav a:hover{ border-color:rgba(222,110,48,.5); color:var(--v-orange-700); }
#ee-videos .v-nav a.on{ background:var(--v-navy); border-color:var(--v-navy); color:#fff; }

/* search */
#ee-videos .v-search{ position:relative; margin:18px 0 0; max-width:420px; }
#ee-videos .v-search svg{ position:absolute; left:15px; top:50%; transform:translateY(-50%);
  width:17px; height:17px; color:#93A6C2; pointer-events:none; }
#ee-videos .v-search input{ width:100%; height:46px; padding:0 16px 0 42px; box-sizing:border-box;
  border:1px solid var(--v-line); border-radius:999px; background:#fff;
  font:400 14px/1 'Inter',sans-serif; color:var(--v-navy); }
#ee-videos .v-search input::placeholder{ color:#93A6C2; }
#ee-videos .v-search input:focus{ outline:none; border-color:rgba(222,110,48,.55);
  box-shadow:0 0 0 4px rgba(222,110,48,.13); }
#ee-videos .v-empty{ display:none; margin:26px 0 0; color:var(--v-muted); font-size:15px; }

/* sections */
#ee-videos .v-sec{ margin:clamp(30px,4vw,46px) 0 0; }
#ee-videos .v-sec-head{ display:flex; align-items:baseline; justify-content:space-between;
  gap:16px; flex-wrap:wrap; margin:0 0 16px; padding-bottom:12px; border-bottom:1px solid var(--v-line); }
html body #main-content #ee-videos h2.v-h2{
  margin:0 !important; color:var(--v-navy) !important; font-weight:800 !important; }
html body #main-content #ee-videos h3.v-h3{
  margin:26px 0 13px !important; color:var(--v-navy) !important; font-weight:700 !important; }
#ee-videos .v-more{ display:inline-flex; align-items:center; gap:6px; color:var(--v-orange-700);
  text-decoration:none; font-size:13.5px; font-weight:700; white-space:nowrap; }
#ee-videos .v-more svg{ width:15px; height:15px; transition:transform .2s ease; }
#ee-videos .v-more:hover svg{ transform:translateX(3px); }

/* cards */
#ee-videos .v-grid{ display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
#ee-videos .v-card{ display:flex; flex-direction:column; text-align:left; padding:0; cursor:pointer;
  background:#fff; border:1px solid #EAEEF5; border-radius:14px; overflow:hidden; font-family:inherit;
  box-shadow:0 14px 34px -28px rgba(25,51,93,.6);
  transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease; }
#ee-videos .v-card:hover{ transform:translateY(-4px); border-color:rgba(222,110,48,.32);
  box-shadow:0 22px 44px -26px rgba(25,51,93,.65); }
#ee-videos .v-card:focus-visible{ outline:2px solid var(--v-navy); outline-offset:3px; }
#ee-videos .v-thumb{ position:relative; aspect-ratio:16/9; background:#E8EDF5; overflow:hidden; }
#ee-videos .v-thumb img{ width:100%; height:100%; object-fit:cover; display:block; }
#ee-videos .v-play{ position:absolute; inset:0; display:grid; place-items:center;
  background:linear-gradient(180deg,rgba(15,32,64,0) 40%,rgba(15,32,64,.35) 100%); }
#ee-videos .v-play i{ display:grid; place-items:center; width:46px; height:46px; border-radius:50%;
  background:var(--v-orange); box-shadow:0 8px 20px -6px rgba(222,110,48,.7);
  transition:transform .2s ease, background .2s ease; }
#ee-videos .v-play svg{ width:17px; height:17px; margin-left:2px; color:#fff; }
#ee-videos .v-card:hover .v-play i{ transform:scale(1.1); background:var(--v-orange-700); }
#ee-videos .v-body{ padding:12px 13px 14px; display:flex; flex-direction:column; gap:7px; flex:1 1 auto; }
#ee-videos .v-tag{ align-self:flex-start; padding:4px 9px; border-radius:5px; background:#FDF2EB;
  color:var(--v-orange-700); font:700 10px/1 'Inter',sans-serif; letter-spacing:.05em; text-transform:uppercase; }
#ee-videos .v-title{ margin:0; color:var(--v-navy); font-size:14px; font-weight:600; line-height:1.4;
  display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }

/* player dialog */
#ee-videos .v-modal{ position:fixed; inset:0; z-index:10000; display:none;
  align-items:center; justify-content:center; padding:20px; background:rgba(10,20,40,.82); }
#ee-videos .v-modal.open{ display:flex; }
#ee-videos .v-modal-box{ position:relative; width:min(1000px,100%); }
#ee-videos .v-modal-frame{ position:relative; aspect-ratio:16/9; background:#000;
  border-radius:14px; overflow:hidden; box-shadow:0 40px 90px -30px rgba(0,0,0,.8); }
#ee-videos .v-modal-frame iframe{ position:absolute; inset:0; width:100%; height:100%; border:0; }
#ee-videos .v-modal-cap{ display:flex; align-items:center; justify-content:space-between; gap:16px;
  flex-wrap:wrap; margin-top:13px; color:#fff; }
#ee-videos .v-modal-cap p{ margin:0; font-size:15px; font-weight:600; line-height:1.4; }
#ee-videos .v-modal-cap a{ color:#FFC9A6; font-size:13px; font-weight:600; text-decoration:none; white-space:nowrap; }
#ee-videos .v-modal-cap a:hover{ color:#fff; }
#ee-videos .v-modal-x{ position:absolute; top:-44px; right:0; width:34px; height:34px; border-radius:50%;
  border:0; background:rgba(255,255,255,.16); color:#fff; font-size:17px; line-height:1; cursor:pointer; }
#ee-videos .v-modal-x:hover{ background:rgba(255,255,255,.3); }

@media(max-width:1100px){ #ee-videos .v-grid{ grid-template-columns:repeat(3,minmax(0,1fr)); } }
@media(max-width:820px){
  #ee-videos .v-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; }
  #ee-videos .v-wrap{ padding:0 16px; }
  #ee-videos .v-modal-x{ top:auto; bottom:-44px; right:50%; transform:translateX(50%); }
}
@media(max-width:520px){
  #ee-videos .v-grid{ grid-template-columns:1fr; }
  #ee-videos .v-nav a{ padding:8px 13px; font-size:12.5px; }
}
@media(prefers-reduced-motion:reduce){
  #ee-videos .v-card,#ee-videos .v-play i,#ee-videos .v-more svg{ transition:none; }
  #ee-videos .v-card:hover{ transform:none; }
}
</style>

<section id="ee-videos">
  <div class="v-wrap">

    <header>
      <span class="v-eyebrow">Video Library</span>
      <h1 class="v-h1"><?php echo $ee_vid_active
          ? esc_html($ee_vid_active['name'])
          : 'See ExtraaEdge <em>in action</em>'; ?></h1>
      <p class="v-lead"><?php echo $ee_vid_active
          ? 'Every ' . esc_html(strtolower($ee_vid_active['name'])) . ' video in one place. Pick one to play it right here.'
          : 'Customer stories, product walkthroughs, webinars and step-by-step tutorials &mdash; everything we have on video, in one place.'; ?></p>

      <nav class="v-nav" aria-label="Video categories">
        <a href="<?php echo esc_url(home_url('/videos/')); ?>" class="<?php echo $ee_vid_active ? '' : 'on'; ?>">All videos</a>
        <?php foreach ($ee_vid_cats as $c) : ?>
          <a href="<?php echo esc_url(home_url('/videos/' . $c['slug'] . '/')); ?>"
             class="<?php echo ($ee_vid_active && $ee_vid_active['slug'] === $c['slug']) ? 'on' : ''; ?>"><?php echo esc_html($c['name']); ?></a>
        <?php endforeach; ?>
      </nav>

      <div class="v-search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.6-3.6"/></svg>
        <input type="search" id="eeVidSearch" placeholder="Search videos&hellip;" aria-label="Search videos" autocomplete="off">
      </div>
      <p class="v-empty" id="eeVidEmpty">Nothing matched that search. Try a different word.</p>
    </header>

    <?php
    /* One card. $tag is the little chip above the title — the section name
       inside a category, the category name on the landing page. */
    $ee_vid_card = function ($title, $id, $tag) {
        ?>
        <button type="button" class="v-card" data-v="<?php echo esc_attr($id); ?>"
                data-t="<?php echo esc_attr($title); ?>"
                data-s="<?php echo esc_attr(strtolower($title . ' ' . $tag)); ?>">
          <span class="v-thumb">
            <img src="https://i.ytimg.com/vi/<?php echo esc_attr($id); ?>/hqdefault.jpg"
                 alt="" width="480" height="360" loading="lazy" decoding="async">
            <span class="v-play"><i><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg></i></span>
          </span>
          <span class="v-body">
            <span class="v-tag"><?php echo esc_html($tag); ?></span>
            <span class="v-title"><?php echo esc_html($title); ?></span>
          </span>
        </button>
        <?php
    };
    ?>

    <?php if ($ee_vid_active) : ?>

      <?php foreach ($ee_vid_active['sections'] as $sec) : ?>
        <div class="v-sec" data-group>
          <div class="v-sec-head"><h2 class="v-h2"><?php echo esc_html($sec['name']); ?></h2></div>
          <div class="v-grid">
            <?php foreach ($sec['videos'] as $v) $ee_vid_card($v[0], $v[1], $sec['name']); ?>
          </div>
        </div>
      <?php endforeach; ?>

    <?php else : ?>

      <?php foreach ($ee_vid_cats as $c) :
          $flat = ee_video_flatten($c); ?>
        <div class="v-sec" data-group>
          <div class="v-sec-head">
            <h2 class="v-h2"><?php echo esc_html($c['name']); ?></h2>
            <a class="v-more" href="<?php echo esc_url(home_url('/videos/' . $c['slug'] . '/')); ?>">
              See all <?php echo esc_html($c['name']); ?>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
            </a>
          </div>
          <div class="v-grid">
            <?php foreach (array_slice($flat, 0, $EE_VID_PREVIEW) as $v) $ee_vid_card($v['title'], $v['id'], $v['section']); ?>
          </div>
        </div>
      <?php endforeach; ?>

    <?php endif; ?>

    <div class="v-modal" id="eeVidModal" role="dialog" aria-modal="true" aria-label="Video player">
      <div class="v-modal-box">
        <button type="button" class="v-modal-x" id="eeVidClose" aria-label="Close video">&#10005;</button>
        <div class="v-modal-frame" id="eeVidFrame"></div>
        <div class="v-modal-cap">
          <p id="eeVidCap"></p>
          <a id="eeVidYT" href="#" target="_blank" rel="noopener">Watch on YouTube &rarr;</a>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  var root = document.getElementById('ee-videos');
  if (!root) return;

  /* ── player ──
     The iframe is created on click and destroyed on close, so no video
     is ever loaded (or left playing) unless the visitor asked for it. */
  var modal = document.getElementById('eeVidModal'),
      frame = document.getElementById('eeVidFrame'),
      cap   = document.getElementById('eeVidCap'),
      yt    = document.getElementById('eeVidYT'),
      last  = null;

  function open(id, title){
    frame.innerHTML = '<iframe src="https://www.youtube-nocookie.com/embed/' + encodeURIComponent(id) +
      '?autoplay=1&rel=0&modestbranding=1" title="' + String(title).replace(/"/g,'&quot;') +
      '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    cap.textContent = title;
    yt.href = 'https://www.youtube.com/watch?v=' + id;
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
    document.getElementById('eeVidClose').focus();
  }
  function close(){
    modal.classList.remove('open');
    frame.innerHTML = '';                 /* stops playback */
    document.body.style.overflow = '';
    if (last) last.focus();
  }

  root.addEventListener('click', function(e){
    var card = e.target.closest('.v-card');
    if (card) { last = card; open(card.dataset.v, card.dataset.t); return; }
    if (e.target === modal) close();
  });
  document.getElementById('eeVidClose').addEventListener('click', close);
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && modal.classList.contains('open')) close();
  });

  /* ── search ──
     Filters cards in place and hides any section left with none, so the
     page never shows an empty heading. */
  var box    = document.getElementById('eeVidSearch'),
      empty  = document.getElementById('eeVidEmpty'),
      cards  = [].slice.call(root.querySelectorAll('.v-card')),
      groups = [].slice.call(root.querySelectorAll('[data-group]')),
      timer;

  function filter(){
    var q = box.value.trim().toLowerCase();
    cards.forEach(function(c){
      c.style.display = (!q || c.dataset.s.indexOf(q) !== -1) ? '' : 'none';
    });
    var shown = 0;
    groups.forEach(function(g){
      var any = g.querySelector('.v-card:not([style*="display: none"])');
      g.style.display = any ? '' : 'none';
      if (any) shown++;
    });
    empty.style.display = (q && !shown) ? 'block' : 'none';
  }
  if (box) box.addEventListener('input', function(){
    clearTimeout(timer); timer = setTimeout(filter, 120);
  });
})();
</script>

<?php get_footer(); ?>
