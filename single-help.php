<?php
/**
 * single-help.php — Help / Knowledge Base article (Help Center design).
 *
 * Navy gradient hero with breadcrumb + meta chips, glass article card
 * with styled steps/screenshots, sticky sidebar ("In this category"
 * from _help_category meta, related links, support card), prev/next
 * within the category. Everything the editor writes in the normal
 * WordPress editor (text, images, videos) renders styled here.
 *
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _help_subtitle, _help_category, _help_difficulty (beginner|intermediate|advanced)
 *   _help_reading_time, _help_related_links (one per line: label|url)
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('help')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $diff      = get_post_meta($pid, '_help_difficulty', true) ?: 'Beginner';
    $category  = get_post_meta($pid, '_help_category', true) ?: 'General';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'TechArticle',
        '@id'              => $url . '#techarticle',
        'headline'         => $title,
        'description'      => $desc,
        'image'            => $image,
        'url'              => $url,
        'datePublished'    => get_the_date('c', $pid),
        'dateModified'     => get_the_modified_date('c', $pid),
        'proficiencyLevel' => ucfirst($diff),
        'articleSection'   => $category,
        'inLanguage'       => 'en',
        'author'           => array('@id' => 'https://www.extraaedge.com/#organization'),
        'publisher'        => array('@id' => 'https://www.extraaedge.com/#organization'),
        'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => $url),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
    $crumbs = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Help Center', 'item' => home_url('/help/')),
            array('@type' => 'ListItem', 'position' => 2, 'name' => $category, 'item' => home_url('/help/#cat-' . sanitize_title($category))),
            array('@type' => 'ListItem', 'position' => 3, 'name' => get_the_title($pid)),
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode($crumbs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_help_subtitle', true);
$category  = get_post_meta($pid, '_help_category', true) ?: 'General';
$diff      = get_post_meta($pid, '_help_difficulty', true) ?: 'beginner';
$read_time = get_post_meta($pid, '_help_reading_time', true);
$related   = get_post_meta($pid, '_help_related_links', true);
$video     = get_post_meta($pid, '_help_video', true);

/* shared Help Center page settings (support card texts/buttons) */
$hsx_opt = get_option('ee_help_page_settings', array());
$hsx_t = function ($k, $d = '') use ($hsx_opt) {
    return (isset($hsx_opt[$k]) && trim((string) $hsx_opt[$k]) !== '') ? $hsx_opt[$k] : $d;
};

/* article video: YouTube / Vimeo / direct file → embed markup */
$hsx_embed = function ($url) {
    $url = trim((string) $url);
    if ($url === '') return '';
    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{6,20})~', $url, $m)) {
        return '<iframe src="https://www.youtube-nocookie.com/embed/' . esc_attr($m[1]) . '" title="Article video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    if (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $m)) {
        return '<iframe src="https://player.vimeo.com/video/' . esc_attr($m[1]) . '" title="Article video" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    if (preg_match('~\.(mp4|webm|ogv|ogg)(\?.*)?$~i', $url)) {
        return '<video controls preload="metadata" src="' . esc_url($url) . '"></video>';
    }
    return '';
};
$video_html = $hsx_embed($video);

/* auto reading time when the meta is blank */
if (!$read_time) {
    $words = str_word_count(wp_strip_all_tags(get_post_field('post_content', $pid)));
    $read_time = max(1, (int) ceil($words / 200));
}

/* category accent — same palette as the /help/ archive */
$hsx_cat_map = array(
    'overview'            => '#19335D',
    'adding leads'        => '#DE6E30',
    'managing leads'      => '#4CAF50',
    'activities tracking' => '#673AB7',
    'messaging leads'     => '#2196F3',
    'email leads'         => '#E91E63',
    'calling leads'       => '#DE6E30',
    'lead follow ups'     => '#9C27B0',
    'bulk activities'     => '#19335D',
    'admin settings'      => '#009688',
    'my account'          => '#673AB7',
);
$accent = isset($hsx_cat_map[mb_strtolower(trim($category))]) ? $hsx_cat_map[mb_strtolower(trim($category))] : '#DE6E30';
/* admin override from Help → Page Settings wins */
foreach ((array) get_option('ee_help_categories', array()) as $hsx_row) {
    if (!empty($hsx_row['name']) && mb_strtolower(trim($hsx_row['name'])) === mb_strtolower(trim($category)) && !empty($hsx_row['color'])) {
        $accent = $hsx_row['color'];
        break;
    }
}

/* siblings in the same category (for the sidebar + prev/next) */
$siblings = get_posts(array(
    'post_type'      => 'help',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
    'meta_key'       => '_help_category',
    'meta_value'     => $category,
));
$prev = null;
$next = null;
foreach ($siblings as $i => $s) {
    if ((int) $s->ID === (int) $pid) {
        if ($i > 0) $prev = $siblings[$i - 1];
        if ($i < count($siblings) - 1) $next = $siblings[$i + 1];
        break;
    }
}
$cat_url = home_url('/help/#cat-' . sanitize_title($category));
?>

<style id="hsx-style">
.hsx{--nv:#19335D;--or:#DE6E30;--ac:<?php echo esc_html($accent); ?>;--bg:#f8f9ff;--line:rgba(0,0,0,.05);--mut:#44474f;font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:#0b1c30;background:var(--bg)}
.hsx *{box-sizing:border-box}
.hsx .w{max-width:1280px;margin:0 auto;padding:0 clamp(16px,3.5vw,40px)}
.hsx a{text-decoration:none}
/* hero */
.hsx-hero{position:relative;overflow:hidden;background:linear-gradient(135deg,#19335D 0%,#2A4E8C 100%);padding:clamp(36px,5vw,56px) 0 clamp(44px,6vw,64px)}
.hsx-hero::before{content:"";position:absolute;top:-80px;right:-80px;width:340px;height:340px;border-radius:50%;background:rgba(255,255,255,.05);filter:blur(64px)}
.hsx-hero .w{position:relative;z-index:2}
.hsx-crumb{display:flex;flex-wrap:wrap;align-items:center;gap:8px;font-size:13px;font-weight:600;color:rgba(211,228,254,.75);margin-bottom:16px}
.hsx-crumb a{color:rgba(211,228,254,.9)}
.hsx-crumb a:hover{color:#fff}
.hsx-crumb .sep{opacity:.5}
.hsx-crumb .cur{color:#fff}
.hsx-hero h1{font-size:clamp(26px,3.6vw,40px);line-height:1.2;font-weight:800;letter-spacing:-.02em;color:#fff;margin:0 0 10px;max-width:860px}
.hsx-hero .sub{font-size:clamp(15px,1.6vw,17px);line-height:1.6;color:rgba(211,228,254,.9);margin:0 0 18px;max-width:760px}
.hsx-meta{display:flex;flex-wrap:wrap;gap:10px}
.hsx-chip{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:700;letter-spacing:.02em;padding:7px 14px;border-radius:999px;background:rgba(255,255,255,.12);color:#fff;border:1px solid rgba(255,255,255,.16)}
.hsx-chip.cat{background:var(--ac);border-color:var(--ac)}
.hsx-chip svg{width:14px;height:14px}
/* layout */
.hsx-body{padding:clamp(28px,4.5vw,56px) 0 clamp(48px,7vw,80px)}
.hsx-body .w{display:grid;grid-template-columns:minmax(0,1fr) 320px;gap:clamp(20px,3vw,40px);align-items:start}
.hsx-article{background:rgba(255,255,255,.9);border:1px solid var(--line);border-radius:24px;padding:clamp(20px,3.4vw,44px);min-width:0}
/* content typography */
.hsx-content{font-size:16px;line-height:1.75;color:var(--mut);overflow-wrap:break-word}
.hsx-content h2{font-size:clamp(21px,2.4vw,26px);line-height:1.3;font-weight:700;color:var(--nv);margin:30px 0 12px;scroll-margin-top:90px}
.hsx-content h3{font-size:clamp(17.5px,2vw,20px);line-height:1.35;font-weight:700;color:var(--nv);margin:26px 0 10px;scroll-margin-top:90px}
.hsx-content h2:first-child,.hsx-content h3:first-child,.hsx-content p:first-child{margin-top:0}
.hsx-content p{margin:0 0 15px}
.hsx-content ul,.hsx-content ol{margin:0 0 16px;padding-left:22px}
.hsx-content li{margin-bottom:7px}
.hsx-content a{color:var(--or);font-weight:600}
.hsx-content a:hover{text-decoration:underline}
.hsx-content strong{color:var(--nv)}
.hsx-content img{max-width:100%;height:auto;border-radius:12px;border:1px solid var(--line);display:block;margin:6px 0;cursor:zoom-in}
.hsx-video{margin:0 0 clamp(18px,3vw,26px)}
.hsx-video iframe,.hsx-video video{width:100%;max-width:100%;aspect-ratio:16/9;height:auto;border-radius:14px;border:0;display:block}
/* screenshot lightbox */
.hsx-lb{position:fixed;inset:0;z-index:99999;background:rgba(8,16,32,.92);display:none;align-items:center;justify-content:center;padding:4vw;cursor:zoom-out}
.hsx-lb.open{display:flex}
.hsx-lb img{max-width:100%;max-height:100%;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,.5)}
.hsx-lb button{position:absolute;top:16px;right:16px;width:40px;height:40px;border-radius:50%;border:0;background:rgba(255,255,255,.15);color:#fff;font-size:16px;cursor:pointer}
.hsx-content figure{margin:14px 0 20px}
.hsx-content figure.hlp-shot img,.hsx-content .wp-block-image img{box-shadow:0 8px 26px rgba(25,51,93,.08)}
.hsx-content figcaption{font-size:13px;color:#747780;margin-top:8px;text-align:center}
.hsx-content iframe,.hsx-content video{width:100%;max-width:100%;aspect-ratio:16/9;height:auto;border-radius:12px;border:0;display:block;margin:14px 0 20px}
.hsx-content blockquote{border-left:4px solid var(--ac);background:color-mix(in srgb,var(--ac) 6%,#fff);padding:14px 20px;margin:18px 0;border-radius:0 12px 12px 0}
.hsx-content table{width:100%;border-collapse:collapse;margin:16px 0;font-size:14.5px}
.hsx-content th,.hsx-content td{border:1px solid #e3e6ef;padding:10px 12px;text-align:left}
.hsx-content th{background:#eff4ff;color:var(--nv)}
.hsx-content code{background:#f1f4fb;color:var(--or);padding:2px 8px;border-radius:6px;font-size:14px}
/* prev / next */
.hsx-pn{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:clamp(26px,4vw,40px);padding-top:clamp(20px,3vw,28px);border-top:1px solid #e8ebf4}
.hsx-pn a{display:flex;flex-direction:column;gap:5px;border:1px solid var(--line);background:#fff;border-radius:14px;padding:14px 18px;transition:border-color .2s,box-shadow .2s}
.hsx-pn a:hover{border-color:var(--ac);box-shadow:0 8px 22px rgba(25,51,93,.08)}
.hsx-pn .lbl{font-size:11.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#8a8f9b}
.hsx-pn .ttl{font-size:14.5px;font-weight:600;color:var(--nv);line-height:1.4}
.hsx-pn a.next{text-align:right;align-items:flex-end}
.hsx-pn .ghost{visibility:hidden}
/* sidebar */
.hsx-aside{position:sticky;top:96px;display:flex;flex-direction:column;gap:18px;min-width:0}
.hsx-card{background:rgba(255,255,255,.9);border:1px solid var(--line);border-radius:20px;padding:22px}
.hsx-card h3{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--nv);margin:0 0 14px}
.hsx-card h3 .dot{width:10px;height:10px;border-radius:3px;background:var(--ac);flex:none}
.hsx-card ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column}
.hsx-card li{border-bottom:1px solid #eef1f8}
.hsx-card li:last-child{border-bottom:0}
.hsx-card li a{display:block;padding:9px 2px;font-size:14px;font-weight:600;color:var(--mut);line-height:1.45;transition:color .2s}
.hsx-card li a:hover{color:var(--ac)}
.hsx-card li.now a{color:var(--ac);position:relative;padding-left:14px}
.hsx-card li.now a::before{content:"";position:absolute;left:0;top:50%;transform:translateY(-50%);width:5px;height:5px;border-radius:50%;background:var(--ac)}
.hsx-card .all{display:inline-flex;align-items:center;gap:6px;margin-top:12px;font-size:13px;font-weight:700;color:var(--or)}
.hsx-card .all:hover{text-decoration:underline}
.hsx-help{background:linear-gradient(135deg,#19335D,#2A4E8C);border:0;color:#fff;text-align:center}
.hsx-help .agent{width:56px;height:56px;border-radius:50%;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;margin:0 auto 12px}
.hsx-help .agent svg{width:26px;height:26px;color:#fff}
.hsx-help p{font-size:13.5px;line-height:1.55;color:rgba(211,228,254,.9);margin:0 0 14px}
.hsx-help a{display:block;font-size:13.5px;font-weight:700;padding:12px 16px;border-radius:10px;margin-top:8px}
.hsx-help a.solid{background:var(--or);color:#fff}
.hsx-help a.solid:hover{filter:brightness(1.08)}
.hsx-help a.line{border:1.5px solid rgba(255,255,255,.4);color:#fff}
.hsx-help a.line:hover{background:rgba(255,255,255,.08)}
/* responsive */
@media(max-width:980px){
  .hsx-body .w{grid-template-columns:1fr}
  .hsx-aside{position:static}
}
@media(max-width:600px){
  .hsx-pn{grid-template-columns:1fr}
  .hsx-pn a.next{text-align:left;align-items:flex-start}
  .hsx-pn .ghost{display:none}
}
@media(prefers-reduced-motion:reduce){.hsx-pn a,.hsx-card li a{transition:none}}
</style>

<main id="main-content" class="hsx" role="main">

  <section class="hsx-hero">
    <div class="w">
      <nav class="hsx-crumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url(home_url('/help/')); ?>"><?php echo esc_html($hsx_t('lbl_home', 'Help Center')); ?></a>
        <span class="sep">›</span>
        <a href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($category); ?></a>
        <span class="sep">›</span>
        <span class="cur"><?php the_title(); ?></span>
      </nav>
      <h1><?php the_title(); ?></h1>
      <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
      <div class="hsx-meta">
        <a class="hsx-chip cat" href="<?php echo esc_url($cat_url); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
          <?php echo esc_html($category); ?>
        </a>
        <span class="hsx-chip">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
          <?php echo esc_html(ucfirst($diff)); ?>
        </span>
        <span class="hsx-chip">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15.5 13.5"/></svg>
          <?php echo esc_html($read_time . ' ' . $hsx_t('lbl_read', 'min read')); ?>
        </span>
        <span class="hsx-chip">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-3-6.7"/><polyline points="21 3 21 9 15 9"/></svg>
          <?php echo esc_html($hsx_t('lbl_updated', 'Updated') . ' ' . get_the_modified_date('M j, Y', $pid)); ?>
        </span>
      </div>
    </div>
  </section>

  <section class="hsx-body">
    <div class="w">

      <article class="hsx-article" itemscope itemtype="https://schema.org/TechArticle">
        <?php if ($video_html) : ?><div class="hsx-video"><?php echo $video_html; ?></div><?php endif; ?>
        <div class="hsx-content" itemprop="articleBody">
          <?php the_content(); ?>
        </div>
        <?php if ($prev || $next) : ?>
        <nav class="hsx-pn" aria-label="More in <?php echo esc_attr($category); ?>">
          <?php if ($prev) : ?>
          <a href="<?php echo esc_url(get_permalink($prev)); ?>">
            <span class="lbl"><?php echo esc_html($hsx_t('lbl_prev', '← Previous')); ?></span>
            <span class="ttl"><?php echo esc_html(get_the_title($prev)); ?></span>
          </a>
          <?php else : ?><span class="ghost"></span><?php endif; ?>
          <?php if ($next) : ?>
          <a class="next" href="<?php echo esc_url(get_permalink($next)); ?>">
            <span class="lbl"><?php echo esc_html($hsx_t('lbl_next', 'Next →')); ?></span>
            <span class="ttl"><?php echo esc_html(get_the_title($next)); ?></span>
          </a>
          <?php endif; ?>
        </nav>
        <?php endif; ?>
      </article>

      <aside class="hsx-aside" role="complementary">
        <div class="hsx-card" id="hsxToc" hidden>
          <h3><span class="dot"></span><?php echo esc_html($hsx_t('lbl_onpage', 'On this page')); ?></h3>
          <ul id="hsxTocL"></ul>
        </div>
        <?php if (count($siblings) > 1) : ?>
        <div class="hsx-card">
          <h3><span class="dot"></span><?php echo esc_html($hsx_t('lbl_incat', 'In') . ' ' . $category); ?></h3>
          <ul>
            <?php foreach ($siblings as $s) : ?>
            <li<?php echo ((int) $s->ID === (int) $pid) ? ' class="now"' : ''; ?>>
              <a href="<?php echo esc_url(get_permalink($s)); ?>"><?php echo esc_html(get_the_title($s)); ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
          <a class="all" href="<?php echo esc_url(home_url('/help/')); ?>"><?php echo esc_html($hsx_t('lbl_all', '← All help articles')); ?></a>
        </div>
        <?php endif; ?>

        <?php if ($related) : ?>
        <div class="hsx-card">
          <h3><span class="dot"></span><?php echo esc_html($hsx_t('lbl_related', 'Related Articles')); ?></h3>
          <ul>
            <?php foreach (explode("\n", trim($related)) as $line) :
              $line = trim($line);
              if (!$line) continue;
              $parts = array_map('trim', explode('|', $line, 2));
              if (count($parts) < 2) continue;
            ?>
            <li><a href="<?php echo esc_url($parts[1]); ?>"><?php echo esc_html($parts[0]); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <div class="hsx-card hsx-help">
          <div class="agent" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
          </div>
          <p><?php echo esc_html($hsx_t('support_text', 'Still need help? Our team responds within 24 hours.')); ?></p>
          <a class="solid" href="<?php echo esc_url($hsx_t('b1_url', home_url('/contact-us/'))); ?>"><?php echo esc_html($hsx_t('b1_label', 'Email Support')); ?></a>
          <a class="line" href="<?php echo esc_url($hsx_t('b2_url', home_url('/book-demo/'))); ?>"><?php echo esc_html($hsx_t('b2_label', 'Live Chat')); ?></a>
        </div>
      </aside>

    </div>
  </section>

  <?php if (current_user_can('edit_post', $pid)) : ?>
  <a href="<?php echo esc_url(get_edit_post_link($pid)); ?>" style="position:fixed;right:18px;bottom:18px;z-index:9999;background:#19335D;color:#fff;font:600 13px/1 'Inter',sans-serif;padding:12px 18px;border-radius:999px;text-decoration:none;box-shadow:0 8px 24px rgba(0,0,0,.25)">✏️ Edit this article</a>
  <?php endif; ?>

</main>

<script>
(function(){
  /* "On this page" — auto-built from the article's h2/h3 headings */
  var hs = document.querySelectorAll('.hsx-content h2, .hsx-content h3');
  var toc = document.getElementById('hsxToc');
  var list = document.getElementById('hsxTocL');
  if (toc && list && hs.length >= 2) {
    hs.forEach(function(h, i){
      if (!h.id) h.id = 'sec-' + i + '-' + (h.textContent || '').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href = '#' + h.id;
      a.textContent = h.textContent;
      if (h.tagName === 'H3') li.style.paddingLeft = '12px';
      li.appendChild(a);
      list.appendChild(li);
      a.addEventListener('click', function(e){
        e.preventDefault();
        h.scrollIntoView({ behavior: 'smooth', block: 'start' });
        history.replaceState(null, '', '#' + h.id);
      });
    });
    toc.hidden = false;
  }

  /* screenshot lightbox — click any article image to zoom */
  var lb = document.createElement('div');
  lb.className = 'hsx-lb';
  lb.innerHTML = '<img alt=""><button type="button" aria-label="Close">✕</button>';
  document.body.appendChild(lb);
  var lbi = lb.querySelector('img');
  function lbClose(){ lb.classList.remove('open'); document.documentElement.style.overflow = ''; }
  document.querySelectorAll('.hsx-content img').forEach(function(im){
    im.addEventListener('click', function(){
      lbi.src = im.currentSrc || im.src;
      lb.classList.add('open');
      document.documentElement.style.overflow = 'hidden';
    });
  });
  lb.addEventListener('click', lbClose);
  document.addEventListener('keydown', function(e){ if (e.key === 'Escape') lbClose(); });
})();
</script>

<?php endwhile; get_footer(); ?>
