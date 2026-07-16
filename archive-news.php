<?php
/**
 * archive-news.php — /news/ Latest Updates & Insights listing.
 * Design: brand navy #19335D / orange #DE6E30 on white, Inter only (design system).
 * Featured latest story + Trending row + Latest grid + newsletter CTA.
 * Category chips + search filter client-side over the rendered cards.
 * Custom fields used: _news_section (category chip), _news_subtitle.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_post_type_archive('news')) return;
    $url = get_post_type_archive_link('news');
    echo '<script type="application/ld+json">' . wp_json_encode(array(
        '@context' => 'https://schema.org',
        '@type'    => 'CollectionPage',
        'name'     => 'Latest Updates & Insights | ExtraaEdge News',
        'url'      => $url,
        'isPartOf' => array('@id' => 'https://www.extraaedge.com/#website'),
    )) . '</script>' . "\n";
});

$q = new WP_Query(array(
    'post_type'      => 'news',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
));

$items = array();
$sections = array();
if ($q->have_posts()) {
    while ($q->have_posts()) { $q->the_post();
        $pid  = get_the_ID();
        $sec  = get_post_meta($pid, '_news_section', true) ?: 'Industry Insights';
        $sub  = get_post_meta($pid, '_news_subtitle', true);
        $mins = max(2, (int) round(str_word_count(wp_strip_all_tags(get_the_content())) / 220));
        $items[] = array(
            'id'     => $pid,
            'title'  => get_the_title(),
            'url'    => get_permalink(),
            'img'    => get_the_post_thumbnail_url($pid, 'large'),
            'sec'    => $sec,
            'sub'    => $sub ?: wp_trim_words(get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 26),
            'date'   => get_the_date('j M Y'),
            'mins'   => $mins,
            'author' => get_the_author_meta('display_name') ?: 'ExtraaEdge Newsroom',
            'avatar' => get_avatar_url(get_the_author_meta('ID'), array('size' => 64)),
        );
        $sections[$sec] = true;
    }
    wp_reset_postdata();
}
$sections = array_keys($sections);
sort($sections);
$featured = $items ? $items[0] : null;
$trending = array_slice($items, 1, 3);
$latest   = array_slice($items, 4);
if (!$latest && $items) $latest = array_slice($items, 1);

get_header();

$slug = function ($s) { return sanitize_title($s); };
?>
<style id="ee-news-archive">
/* ============ /news/ listing — scoped .nwx-* · navy/orange on white · Inter ============ */
.nwx{--nv:#19335D;--or:#DE6E30;--or2:#E8843F;--ink:#0b1c30;--mut:#5a6b85;--line:rgba(25,52,93,.12);--soft:#eff4ff;
  font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;color:var(--ink);background:#fff;
  -webkit-font-smoothing:antialiased}
.nwx *{box-sizing:border-box;margin:0;padding:0}
.nwx a{text-decoration:none;color:inherit}
.nwx .nwx-wrap{max-width:1280px;margin:0 auto;padding:clamp(28px,4vw,56px) 24px clamp(40px,5vw,72px);display:flex;flex-direction:column;gap:clamp(28px,4vw,52px)}
/* header + chips */
.nwx h1{font-weight:800;font-size:clamp(30px,4.4vw,48px);line-height:1.14;letter-spacing:-.02em;color:var(--nv)}
.nwx .nwx-bar{display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin-top:16px}
.nwx .nwx-chip{cursor:pointer;font:600 13px/1 'Inter',sans-serif;letter-spacing:.02em;color:var(--mut);
  background:#fff;border:1px solid var(--line);border-radius:999px;padding:10px 18px;transition:background .2s,color .2s,border-color .2s}
.nwx .nwx-chip:hover{background:var(--soft)}
.nwx .nwx-chip.on{background:var(--nv);border-color:var(--nv);color:#fff}
.nwx .nwx-search{position:relative;margin-left:auto}
.nwx .nwx-search svg{position:absolute;left:12px;top:50%;transform:translateY(-50%);width:16px;height:16px;stroke:var(--mut)}
.nwx .nwx-search input{width:min(64vw,256px);padding:10px 14px 10px 36px;border:1px solid var(--line);border-radius:10px;
  font:400 14px/1.4 'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color .2s,box-shadow .2s}
.nwx .nwx-search input:focus{border-color:var(--or);box-shadow:0 0 0 3px rgba(222,110,48,.12)}
/* featured */
.nwx .nwx-feat{display:grid;grid-template-columns:1.05fr .95fr;background:var(--nv);border-radius:22px;overflow:hidden;min-height:420px;
  box-shadow:0 30px 70px -30px rgba(25,51,93,.55)}
.nwx .nwx-feat-tx{padding:clamp(26px,3.4vw,52px);display:flex;flex-direction:column;justify-content:center;gap:16px;color:#fff;position:relative;z-index:1}
.nwx .nwx-feat-badge{display:inline-block;width:fit-content;background:var(--or);color:#fff;font:800 11px/1 'Inter',sans-serif;
  letter-spacing:.12em;text-transform:uppercase;border-radius:6px;padding:7px 12px}
.nwx .nwx-feat h2{font-weight:800;font-size:clamp(22px,2.8vw,34px);line-height:1.2;letter-spacing:-.01em}
.nwx .nwx-feat p{font-size:clamp(14px,1.5vw,17px);line-height:1.6;color:rgba(255,255,255,.8);max-width:56ch}
.nwx .nwx-feat-meta{font:700 13px/1.5 'Inter',sans-serif}
.nwx .nwx-feat-meta small{display:block;font-weight:500;font-size:12px;opacity:.7;margin-top:2px}
.nwx .nwx-feat-cta{display:inline-flex;align-items:center;gap:8px;width:fit-content;background:var(--or);color:#fff;
  font:700 14px/1 'Inter',sans-serif;border-radius:12px;padding:14px 24px;transition:transform .2s,box-shadow .2s,background .2s;
  box-shadow:0 14px 28px -10px rgba(222,110,48,.55)}
.nwx .nwx-feat-cta:hover{transform:translateY(-2px);background:var(--or2)}
.nwx .nwx-feat-im{position:relative;min-height:240px}
.nwx .nwx-feat-im img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.nwx .nwx-feat-im::before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,var(--nv) 0%,transparent 45%);z-index:1}
.nwx .nwx-feat-im.noimg{background:radial-gradient(420px 260px at 70% 30%,rgba(222,110,48,.4),transparent 65%),linear-gradient(150deg,#22467c,var(--nv))}
/* section titles */
.nwx h3.nwx-sec{font-weight:800;font-size:clamp(19px,2.2vw,24px);line-height:1.3;letter-spacing:-.01em;color:var(--nv);margin-bottom:18px}
/* trending cards */
.nwx .nwx-trend{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.nwx .nwx-tcard{display:flex;flex-direction:column;gap:10px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px;
  transition:box-shadow .25s,transform .25s,border-color .25s}
.nwx .nwx-tcard:hover{box-shadow:0 18px 40px -22px rgba(25,51,93,.35);transform:translateY(-3px);border-color:rgba(222,110,48,.35)}
.nwx .nwx-cat{display:inline-flex;align-items:center;gap:6px;font:800 11px/1 'Inter',sans-serif;letter-spacing:.06em;text-transform:uppercase;color:var(--or)}
.nwx .nwx-cat svg{width:14px;height:14px;stroke:var(--or)}
.nwx .nwx-tcard h4{font-weight:700;font-size:17px;line-height:1.35;color:var(--nv)}
.nwx .nwx-tmeta{margin-top:auto;display:flex;align-items:center;justify-content:space-between;gap:10px;padding-top:12px;font:500 12px/1.4 'Inter',sans-serif;color:var(--mut)}
.nwx .nwx-auth{display:inline-flex;align-items:center;gap:7px;font-weight:600;color:var(--ink)}
.nwx .nwx-auth img{width:26px;height:26px;border-radius:50%;object-fit:cover;border:1px solid var(--line)}
/* latest grid */
.nwx .nwx-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.nwx .nwx-card{display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:16px;overflow:hidden;
  transition:box-shadow .3s,transform .3s,border-color .3s}
.nwx .nwx-card:hover{box-shadow:0 24px 50px -24px rgba(25,51,93,.4);transform:translateY(-4px);border-color:rgba(222,110,48,.35)}
.nwx .nwx-cim{height:188px;overflow:hidden;position:relative;background:linear-gradient(150deg,#22467c,var(--nv))}
.nwx .nwx-cim img{width:100%;height:100%;object-fit:cover;transition:transform .5s cubic-bezier(.2,.7,.2,1)}
.nwx .nwx-card:hover .nwx-cim img{transform:scale(1.05)}
.nwx .nwx-cim .nwx-ph{position:absolute;inset:0;display:grid;place-items:center;color:rgba(255,255,255,.28);font:800 40px/1 'Inter',sans-serif;letter-spacing:-.02em}
.nwx .nwx-cbody{display:flex;flex-direction:column;flex:1;padding:20px}
.nwx .nwx-klabel{font:800 11px/1 'Inter',sans-serif;letter-spacing:.08em;text-transform:uppercase;color:var(--mut);margin-bottom:9px}
.nwx .nwx-cbody h4{font-weight:700;font-size:17px;line-height:1.35;color:var(--nv);margin-bottom:9px}
.nwx .nwx-cbody p{font-size:14px;line-height:1.6;color:var(--mut);margin-bottom:16px;
  display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.nwx .nwx-cfoot{margin-top:auto;display:flex;align-items:center;justify-content:space-between;gap:10px;border-top:1px solid var(--line);padding-top:12px;font:500 12px/1.4 'Inter',sans-serif;color:var(--mut)}
.nwx .nwx-read{display:inline-flex;align-items:center;gap:5px;font:600 13px/1 'Inter',sans-serif;color:var(--or)}
.nwx .nwx-read svg{width:14px;height:14px;stroke:var(--or);transition:transform .25s}
.nwx .nwx-card:hover .nwx-read svg{transform:translateX(3px)}
/* newsletter */
.nwx .nwx-news{display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;background:var(--soft);
  border:1px solid var(--line);border-radius:18px;padding:clamp(22px,3vw,40px)}
.nwx .nwx-news h3{font-weight:800;font-size:clamp(18px,2vw,23px);color:var(--nv);margin-bottom:6px}
.nwx .nwx-news p{font-size:14px;line-height:1.6;color:var(--mut)}
.nwx .nwx-nform{display:flex;gap:10px;flex-wrap:wrap}
.nwx .nwx-nform input{flex:1;min-width:220px;padding:13px 16px;border:1px solid var(--line);border-radius:12px;
  font:400 14px/1.4 'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color .2s,box-shadow .2s;background:#fff}
.nwx .nwx-nform input:focus{border-color:var(--or);box-shadow:0 0 0 3px rgba(222,110,48,.12)}
.nwx .nwx-nform button{background:var(--nv);color:#fff;border:0;border-radius:12px;padding:13px 24px;cursor:pointer;
  font:700 14px/1 'Inter',sans-serif;transition:background .2s,transform .2s;white-space:nowrap}
.nwx .nwx-nform button:hover{background:#22467c;transform:translateY(-1px)}
.nwx .nwx-nok{display:none;font:700 14px/1.5 'Inter',sans-serif;color:#1E9E6A}
/* filter/search state + empty */
.nwx .nwx-hide{display:none!important}
.nwx .nwx-empty{display:none;text-align:center;color:var(--mut);font-size:15px;padding:26px 0}
/* reveal */
.nwx .nwx-rv{opacity:0;transform:translateY(24px);transition:opacity .6s cubic-bezier(.2,.7,.2,1),transform .6s cubic-bezier(.2,.7,.2,1)}
.nwx .nwx-rv.in{opacity:1;transform:none}
@media(max-width:960px){
  .nwx .nwx-trend{grid-template-columns:1fr 1fr}
  .nwx .nwx-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:720px){
  .nwx .nwx-feat{grid-template-columns:1fr;min-height:0}
  .nwx .nwx-feat-im{order:-1;height:200px;min-height:0}
  .nwx .nwx-feat-im::before{background:linear-gradient(0deg,var(--nv) 0%,transparent 55%)}
  .nwx .nwx-trend,.nwx .nwx-grid{grid-template-columns:1fr}
  .nwx .nwx-search{margin-left:0;width:100%}
  .nwx .nwx-search input{width:100%}
  .nwx .nwx-nform{width:100%}
}
@media(prefers-reduced-motion:reduce){
  .nwx .nwx-rv{opacity:1!important;transform:none!important;transition:none}
  .nwx .nwx-card,.nwx .nwx-tcard,.nwx .nwx-cim img{transition:none}
}
</style>

<div class="nwx">
  <main class="nwx-wrap">

    <header class="nwx-rv in">
      <h1>Latest Updates &amp; Insights</h1>
      <div class="nwx-bar" role="tablist" aria-label="News categories">
        <button type="button" class="nwx-chip on" data-cat="*">All News</button>
        <?php foreach ($sections as $sec) : ?>
        <button type="button" class="nwx-chip" data-cat="<?php echo esc_attr($slug($sec)); ?>"><?php echo esc_html($sec); ?></button>
        <?php endforeach; ?>
        <div class="nwx-search">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
          <input type="text" id="nwxSearch" placeholder="Search" aria-label="Search news">
        </div>
      </div>
    </header>

    <?php if (!$items) : ?>
      <p style="color:#5a6b85;font-size:16px">No news published yet — check back soon.</p>
    <?php endif; ?>

    <?php if ($featured) : ?>
    <section class="nwx-rv" aria-label="Featured story">
      <a class="nwx-feat" href="<?php echo esc_url($featured['url']); ?>">
        <div class="nwx-feat-tx">
          <span class="nwx-feat-badge">Featured</span>
          <h2><?php echo esc_html($featured['title']); ?></h2>
          <p><?php echo esc_html($featured['sub']); ?></p>
          <div class="nwx-feat-meta"><?php echo esc_html($featured['date']); ?> &bull; <?php echo (int) $featured['mins']; ?> min read
            <small>By <?php echo esc_html($featured['author']); ?></small>
          </div>
          <span class="nwx-feat-cta">Read Full Report
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="width:15px;height:15px"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
          </span>
        </div>
        <div class="nwx-feat-im<?php echo $featured['img'] ? '' : ' noimg'; ?>">
          <?php if ($featured['img']) : ?><img src="<?php echo esc_url($featured['img']); ?>" alt="<?php echo esc_attr($featured['title']); ?>" loading="eager" decoding="async"><?php endif; ?>
        </div>
      </a>
    </section>
    <?php endif; ?>

    <?php if ($trending) : ?>
    <section class="nwx-rv" aria-label="Trending now">
      <h3 class="nwx-sec">Trending Now</h3>
      <div class="nwx-trend">
        <?php foreach ($trending as $it) : ?>
        <a class="nwx-tcard nwx-item" data-cat="<?php echo esc_attr($slug($it['sec'])); ?>" href="<?php echo esc_url($it['url']); ?>">
          <span class="nwx-cat">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 17l6-6 4 4 8-8"/><path d="M14 7h7v7"/></svg>
            <?php echo esc_html($it['sec']); ?>
          </span>
          <h4><?php echo esc_html($it['title']); ?></h4>
          <div class="nwx-tmeta">
            <span><?php echo esc_html($it['date']); ?> &bull; <?php echo (int) $it['mins']; ?> min read</span>
            <span class="nwx-auth"><img src="<?php echo esc_url($it['avatar']); ?>" alt="" loading="lazy" decoding="async">By <?php echo esc_html($it['author']); ?></span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>

    <?php if ($latest) : ?>
    <section class="nwx-rv" aria-label="Latest articles">
      <h3 class="nwx-sec">Latest Articles</h3>
      <div class="nwx-grid" id="nwxGrid">
        <?php foreach ($latest as $it) : ?>
        <a class="nwx-card nwx-item" data-cat="<?php echo esc_attr($slug($it['sec'])); ?>" href="<?php echo esc_url($it['url']); ?>">
          <div class="nwx-cim">
            <?php if ($it['img']) : ?>
              <img src="<?php echo esc_url($it['img']); ?>" alt="<?php echo esc_attr($it['title']); ?>" loading="lazy" decoding="async">
            <?php else : ?>
              <span class="nwx-ph" aria-hidden="true">ee</span>
            <?php endif; ?>
          </div>
          <div class="nwx-cbody">
            <span class="nwx-klabel"><?php echo esc_html($it['sec']); ?></span>
            <h4><?php echo esc_html($it['title']); ?></h4>
            <p><?php echo esc_html($it['sub']); ?></p>
            <div class="nwx-cfoot">
              <span><?php echo esc_html($it['date']); ?> &bull; <?php echo (int) $it['mins']; ?> min read</span>
              <span class="nwx-read">Read Article
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
              </span>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <p class="nwx-empty" id="nwxEmpty">No articles match your filter.</p>
    </section>
    <?php endif; ?>

    <section class="nwx-news nwx-rv" aria-label="Newsletter">
      <div>
        <h3>Get the latest insights delivered to your inbox</h3>
        <p>Weekly updates on AI, higher education, and recruitment best practices.</p>
      </div>
      <form class="nwx-nform" id="nwxNews" novalidate>
        <input type="email" required placeholder="Your work email" aria-label="Your work email">
        <button type="submit">Subscribe Now</button>
        <span class="nwx-nok" id="nwxNok">&#10003; You&rsquo;re in! Watch your inbox for the next edition.</span>
      </form>
    </section>

  </main>
</div>

<script>
(function(){
  var root=document.querySelector('.nwx'); if(!root) return;
  /* chips + search filter over every card (trending + latest) */
  var chips=[].slice.call(root.querySelectorAll('.nwx-chip'));
  var itemsEls=[].slice.call(root.querySelectorAll('.nwx-item'));
  var search=document.getElementById('nwxSearch');
  var empty=document.getElementById('nwxEmpty');
  var cat='*';
  function apply(){
    var q=(search&&search.value?search.value:'').trim().toLowerCase();
    var shown=0;
    itemsEls.forEach(function(el){
      var okCat=cat==='*'||el.getAttribute('data-cat')===cat;
      var okQ=!q||el.textContent.toLowerCase().indexOf(q)!==-1;
      var ok=okCat&&okQ;
      el.classList.toggle('nwx-hide',!ok);
      if(ok)shown++;
    });
    if(empty)empty.style.display=shown?'none':'block';
  }
  chips.forEach(function(c){
    c.addEventListener('click',function(){
      chips.forEach(function(x){x.classList.remove('on');});
      c.classList.add('on'); cat=c.getAttribute('data-cat'); apply();
    });
  });
  if(search)search.addEventListener('input',apply);
  /* newsletter */
  var nf=document.getElementById('nwxNews');
  if(nf)nf.addEventListener('submit',function(e){
    e.preventDefault();
    var em=nf.querySelector('input');
    if(!em.value||em.value.indexOf('@')===-1){em.focus();return;}
    em.style.display='none'; nf.querySelector('button').style.display='none';
    document.getElementById('nwxNok').style.display='inline-flex';
  });
  /* reveal */
  var rv=[].slice.call(root.querySelectorAll('.nwx-rv'));
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}});},{threshold:.1,rootMargin:'0px 0px -6%'});
    rv.forEach(function(el){io.observe(el);});
  } else { rv.forEach(function(el){el.classList.add('in');}); }
})();
</script>

<?php get_footer(); ?>
