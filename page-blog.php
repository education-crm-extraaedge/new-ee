<?php
/**
 * /blog/ landing page — grid of every WP category as a clickable card.
 * Wired up via the template_redirect override in functions.php.
 *
 * Editor publishes a post and assigns one or more categories →
 * the post automatically appears in each of those categories. No
 * manual mapping needed.
 */
if (!defined('ABSPATH')) exit;

/* Look up the optional ?cat= filter. When present we narrow the
   listing to posts in that one category and switch the breadcrumb /
   <title> to the category name, all without leaving /blog/. */
/* Active category comes from $_GET['bcat'], which the template_redirect
   router in functions.php populates when the URL is /blog/{slug}/.
   ?bcat= is also still honoured as a fallback if a deploy hasn't had
   permalinks flushed yet (Settings → Permalinks → Save). */
$ee_cat_slug   = isset($_GET['bcat']) ? sanitize_title(wp_unslash($_GET['bcat'])) : '';
$ee_active_cat = $ee_cat_slug ? get_category_by_slug($ee_cat_slug) : null;
if ($ee_active_cat) {
    $GLOBALS['ee_blog_active_cat']    = $ee_active_cat;
    $GLOBALS['ee_custom_route_title'] = $ee_active_cat->name; // breadcrumb tail
}

/* SEO + Article schema is handled by wp_head in header.php — we
   just override the document title here. */
add_filter('pre_get_document_title', function () use ($ee_active_cat) {
    if ($ee_active_cat) {
        return $ee_active_cat->name . ' — Blog | ExtraaEdge';
    }
    return 'Blog — Insights & Resources from ExtraaEdge';
}, 99);

/* Define $ee_blog_cats up front so the page renders even if the
   sidebar partial is missing on disk. The partial overwrites this
   with the same value when it loads, so behaviour is identical.
   hide_empty=false so editors see every category they've created,
   even before they've published a post into it. */
$ee_blog_cats = get_categories(array(
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'      => 'DESC',
));

/* Drop the WordPress default "Uncategorized" bucket — most editors
   never use it and it clutters the public landing. */
$ee_blog_cats = array_filter($ee_blog_cats, function ($c) {
    return $c->slug !== 'uncategorized';
});

get_header();
?>

<style id="ee-blog-listing">
/* ── /blog/ listing ──────────────────────────────────────────────────────
   Eyebrow, title and search across the top, one lead card, then the rest
   three across, with a promo rail on the right. The page shell (the three
   column grid and the category sidebar) is shared with single posts and is
   left alone; only the middle and right columns are rebuilt here.

   The rail is widened from the shell's 300px, since the promo cards carry
   real content rather than a share strip. Type and palette are the site's:
   Inter, #19335D headings, #6B7C96 copy, #DE6E30 accents. */
/* The shell's own responsive steps are in single.php; this widens the rail
   at desktop only, so the narrow-screen columns there still apply - stating
   it unconditionally kept three columns at 390px and pushed the page into a
   horizontal scroll. */
@media(min-width:1101px){
  .ee-blog-page .ee-blog-wrap{ grid-template-columns:230px minmax(0,1fr) 300px; } }
/* The shell caps at 1280px, and once the category sidebar and the rail have
   taken their share the middle column is only ~180px - narrow enough that
   every title ran to six lines. Wide screens get a wider shell, and below
   that the grid drops to two so the cards keep a readable measure. */
@media(min-width:1500px){
  .ee-blog-page .ee-blog-wrap{ max-width:1440px; } }
.ee-blog-page .ee-blog-wrap{ gap:26px; padding:0 22px; }
@media(max-width:1100px){
  .ee-blog-page .ee-blog-wrap{ grid-template-columns:220px minmax(0,1fr); }
  .ee-bl-rail{ grid-column:1 / -1; } }
@media(max-width:820px){
  .ee-blog-page .ee-blog-wrap{ grid-template-columns:1fr; padding:0 16px; } }
.ee-bl{ font-family:'Inter',system-ui,sans-serif; }

/* head */
.ee-bl-head{ display:flex; align-items:flex-start; justify-content:space-between;
  gap:24px; flex-wrap:wrap; margin:0 0 22px; }
/* keep the search on the heading's row rather than letting the copy push it
   onto its own line */
@media(min-width:900px){
  .ee-bl-head{ flex-wrap:nowrap; }
  .ee-bl-head-tx{ flex:1 1 auto; }
  .ee-bl-head p{ max-width:48ch; } }
.ee-bl-head-tx{ min-width:0; }
.ee-bl-eyebrow{ display:block; font:800 11.5px/1 'Inter',sans-serif; letter-spacing:.13em;
  text-transform:uppercase; color:var(--orange-700,#B5551D); margin-bottom:10px; }
.ee-bl-head h1{ margin:0 0 10px; color:#19335D; font-weight:800;
  font-size:clamp(28px,3.2vw,42px); line-height:1.08; letter-spacing:-.03em; }
.ee-bl-head p{ margin:0; max-width:56ch; color:#6B7C96; font-size:15px; line-height:1.6; }
.ee-bl-search{ position:relative; flex:0 1 320px; min-width:230px; }
.ee-bl-search svg{ position:absolute; left:15px; top:50%; transform:translateY(-50%);
  width:17px; height:17px; color:#93A6C2; pointer-events:none; }
.ee-bl-search input{ width:100%; height:48px; padding:0 16px 0 42px;
  border:1px solid #E4E9F1; border-radius:999px; background:#fff;
  font:400 14px/1 'Inter',sans-serif; color:#19335D; }
.ee-bl-search input::placeholder{ color:#93A6C2; }
.ee-bl-search input:focus{ outline:none; border-color:rgba(222,110,48,.55);
  box-shadow:0 0 0 4px rgba(222,110,48,.13); }
.ee-bl-result{ margin:0 0 16px; color:#6B7C96; font-size:14px; }
.ee-bl-result a{ color:var(--orange-700,#B5551D); font-weight:600; }

/* cards */
.ee-bl-grid{ display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:16px; }
.ee-bl-card{ display:flex; flex-direction:column; overflow:hidden;
  background:#fff; border:1px solid #EAEEF5; border-radius:16px;
  box-shadow:0 14px 34px -28px rgba(25,51,93,.6);
  transition:transform .22s ease, box-shadow .22s ease, border-color .22s ease; }
.ee-bl-card:hover{ transform:translateY(-4px); border-color:rgba(222,110,48,.3);
  box-shadow:0 22px 44px -26px rgba(25,51,93,.65); }
/* With the Read More row gone from the grid, the title's link is stretched
   over the whole tile so the card itself is the click target. The category
   tag sits above it so it stays separately clickable. */
.ee-bl-card{ position:relative; }
.ee-bl-card:not(.ee-bl-card--hero) .ee-bl-title a::after{
  content:""; position:absolute; inset:0; border-radius:inherit; }
.ee-bl-cat{ position:relative; z-index:2; }
/* the lead card spans the row and turns side-by-side */
.ee-bl-card--hero{ grid-column:1 / -1; flex-direction:row; align-items:stretch; }
.ee-bl-card--hero .ee-bl-thumb{ flex:0 0 42%; }
.ee-bl-card--hero .ee-bl-body{ padding:26px 28px; justify-content:center; }

.ee-bl-thumb{ display:block; background:#F1F5FA; }
.ee-bl-thumb img{ width:100%; height:100%; min-height:150px; max-height:176px;
  object-fit:cover; display:block; }
.ee-bl-card--hero .ee-bl-thumb img{ max-height:none; }
.ee-bl-body{ display:flex; flex-direction:column; flex:1 1 auto; padding:13px 14px 14px; }
.ee-bl-meta{ display:flex; align-items:center; justify-content:space-between;
  gap:10px; margin-bottom:10px; flex-wrap:wrap; }
.ee-bl-cat{ display:inline-block; padding:5px 10px; border-radius:6px;
  background:#FDF2EB; color:var(--orange-700,#B5551D); text-decoration:none;
  font:700 10.5px/1 'Inter',sans-serif; letter-spacing:.05em; text-transform:uppercase; }
.ee-bl-cat:hover{ background:#F8E3D5; }
.ee-bl-date{ display:inline-flex; align-items:center; gap:6px;
  color:#8A9AB4; font-size:11.5px; font-weight:600; white-space:nowrap; }
.ee-bl-date svg{ width:13px; height:13px; }
/* Short category names left the date sitting beside the tag while long ones
   pushed it to a second line, so cards in the same row started at different
   heights. Grid cards always stack; only the hero keeps the two on one row. */
.ee-bl-card:not(.ee-bl-card--hero) .ee-bl-meta{
  flex-direction:column; align-items:flex-start; gap:7px; }
/* The site-wide heading scale pins every #main-content h2 to 30px with
   !important at (2 ids, 2 classes, 3 types). Card titles are h2 for the
   listing's outline, so they have to match that count to stay card-sized -
   hence the #ee-blog id on the shell and two classes here. */
/* Cards sit in a column barely 220px wide once the category sidebar and the
   rail have taken their share, so a long title ran to six or seven lines and
   left the rows very tall. It is clamped, and the foot is kept on one line.
   With no excerpt and no read-time row under it in the grid, the title is
   the last thing in the card, so it carries a fourth line and no bottom
   margin - the body's own padding closes the card. */
html body #main-content #ee-blog .ee-bl-card h2.ee-bl-title{
  margin:0 !important; font-size:16px !important; line-height:1.32 !important;
  letter-spacing:-.015em !important; font-weight:700 !important;
  display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical; overflow:hidden; }
html body #main-content #ee-blog .ee-bl-card--hero h2.ee-bl-title{
  margin:0 0 10px !important; -webkit-line-clamp:3; }
html body #main-content #ee-blog .ee-bl-card--hero h2.ee-bl-title{
  font-size:clamp(19px,1.9vw,25px) !important; line-height:1.25 !important; }
/* the excerpt loses to the same scale, so it is matched the same way */
html body #main-content #ee-blog .ee-bl-card p.ee-bl-x{
  margin:0 0 12px !important; font-size:13px !important; line-height:1.55 !important;
  display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
html body #main-content #ee-blog .ee-bl-card--hero p.ee-bl-x{ -webkit-line-clamp:4; }
html body #main-content #ee-blog .ee-bl-card--hero p.ee-bl-x{ font-size:14.5px !important; }
.ee-bl-title{ margin:0 0 8px; font-size:16px; line-height:1.35; letter-spacing:-.015em; }
.ee-bl-title a{ color:#19335D; font-weight:700; text-decoration:none; }
.ee-bl-title a:hover{ color:var(--orange-700,#B5551D); }
.ee-bl-x{ margin:0 0 14px; color:#6B7C96; font-size:13.5px; line-height:1.6; }
.ee-bl-foot{ margin-top:auto; display:flex; align-items:center;
  justify-content:space-between; gap:10px; }
.ee-bl-time{ display:inline-flex; align-items:center; gap:6px; white-space:nowrap;
  color:#8A9AB4; font-size:11.5px; font-weight:600; }
.ee-bl-time svg{ width:13px; height:13px; }
.ee-bl-more{ display:inline-flex; align-items:center; gap:6px; white-space:nowrap;
  color:var(--orange-700,#B5551D); font-weight:700; font-size:12.5px; text-decoration:none; }
.ee-bl-more svg{ width:14px; height:14px; transition:transform .22s ease; }
.ee-bl-more:hover svg{ transform:translateX(4px); }

/* promo rail — the two built cards have been replaced by artwork, so the
   rail is now just the banner links (plus a text fallback if no artwork has
   been uploaded yet). */
.ee-bl-rail{ display:flex; flex-direction:column; gap:16px; }
.ee-bl-banner{ display:block; border-radius:16px; overflow:hidden;
  box-shadow:0 14px 34px -28px rgba(25,51,93,.6);
  transition:transform .22s ease, box-shadow .22s ease; }
.ee-bl-banner img{ display:block; width:100%; height:auto; }
.ee-bl-banner:hover{ transform:translateY(-3px);
  box-shadow:0 22px 44px -26px rgba(25,51,93,.65); }
.ee-bl-banner:focus-visible{ outline:3px solid rgba(222,110,48,.55); outline-offset:3px; }
/* The shared shell in inc/blog-sidebar.php hides the right rail below 1100px
   (.ee-blog-side-r{display:none}) - which used to be reasonable when the rail
   was two long promo cards, but the rail is now a single Book a Demo banner
   and hiding it on phones loses the CTA for most blog traffic. It is brought
   back here, on the listing only, so single posts keep the shell's behaviour.

   Three classes are needed to beat that rule: it lives in the sidebar
   partial, whose <style> is printed after this one, so an equal-specificity
   selector would lose on source order. Same reason this sits after the
   .ee-bl-rail base above, which also sets flex-direction.

   Across the page the banners run in a row rather than down it, capped
   rather than stretched since they are tall portraits. */
@media(max-width:1100px){
  .ee-blog-page .ee-blog-side-r.ee-bl-rail{
    display:flex; grid-column:1 / -1;
    flex-direction:row; flex-wrap:wrap;
    justify-content:center; align-items:flex-start; }
  .ee-bl-banner{ flex:0 1 300px; }
  .ee-bl-promo{ flex:1 1 300px; } }
@media(max-width:620px){
  .ee-bl-banner{ flex:0 1 340px; } }
/* admin-only "where is the image" note */
.ee-bl-note{ margin:0; padding:12px 14px; border-radius:12px;
  border:1px dashed #E4B99A; background:#FFF8F3;
  color:#8A5A33; font-size:11.5px; line-height:1.6; }
.ee-bl-note code{ font-size:10.5px; word-break:break-all; }
/* only shown when neither banner image is in place */
.ee-bl-promo{ background:#fff; border:1px solid #EAEEF5; border-radius:16px;
  padding:20px 18px; box-shadow:0 14px 34px -28px rgba(25,51,93,.6); }
.ee-bl-promo h2{ margin:0 0 9px; color:#19335D; font-weight:800;
  font-size:20px; line-height:1.2; letter-spacing:-.025em; }
.ee-bl-promo p{ margin:0 0 13px; color:#6B7C96; font-size:13px; line-height:1.6; }
.ee-bl-btn{ display:flex; align-items:center; justify-content:center; gap:9px;
  padding:13px 18px; border-radius:10px; text-decoration:none; color:#fff;
  background:linear-gradient(135deg,#E8843F,#DE6E30);
  font:700 14.5px/1 'Inter',sans-serif;
  box-shadow:0 10px 24px -10px rgba(222,110,48,.7);
  transition:transform .2s ease, box-shadow .2s ease; }
.ee-bl-btn::after{ content:"\2192"; font-size:1.05em; line-height:1; }
.ee-bl-btn:hover{ transform:translateY(-2px); }

/* Three across only once the shell is allowed past 1280px; below that the
   sidebar and the rail leave the middle column under 200px per card, which
   is what made every title run six lines. */
@media(max-width:1499px){
  .ee-bl-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); } }
@media(max-width:900px){
  .ee-bl-card--hero{ flex-direction:column; }
  .ee-bl-card--hero .ee-bl-thumb{ flex:0 0 auto; }
  .ee-bl-card--hero .ee-bl-body{ padding:16px; } }
@media(max-width:620px){
  .ee-bl-grid{ grid-template-columns:1fr; gap:12px; }
  .ee-bl-head h1{ font-size:24px; }
  .ee-bl-search{ flex:1 1 100%; } }
@media(prefers-reduced-motion:reduce){
  .ee-bl-card,.ee-bl-btn,.ee-bl-more svg{ transition:none; } }
</style>

<!-- ee-blog-tpl v2026-08-03-root-routes -->
<div class="ee-blog-page" id="ee-blog">
    <div class="ee-blog-wrap">

        <?php
        /* No $GLOBALS['ee_blog_active_cat'] set on the landing page,
           so the sidebar's "All Categories" row gets the active state. */
        $ee_sidebar_path = get_stylesheet_directory() . '/inc/blog-sidebar.php';
        if (file_exists($ee_sidebar_path)) {
            include $ee_sidebar_path;
        }
        ?>

        <main class="ee-blog-main ee-bl">

            <?php
            $ee_q      = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';
            $ee_paged  = max(1, get_query_var('paged') ?: get_query_var('page'));

            /* Pull every published post once - even if the post sits in
               multiple categories WP returns it a single time. Narrowed by
               the sidebar category and by the search box when either is on. */
            $ee_query_args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 12,
                'paged'          => $ee_paged,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'ignore_sticky_posts' => true,
            );
            if ($ee_active_cat) { $ee_query_args['cat'] = $ee_active_cat->term_id; }
            if ($ee_q !== '')   { $ee_query_args['s']   = $ee_q; }
            $ee_blog_query = new WP_Query($ee_query_args);

            /* Minutes to read, from the post's own word count. */
            if (!function_exists('ee_blog_read_time')) {
                function ee_blog_read_time($id) {
                    $w = str_word_count(wp_strip_all_tags(strip_shortcodes(get_post_field('post_content', $id))));
                    return max(1, (int) round($w / 200));
                }
            }
            /* Excerpt trimmed on a word boundary. */
            if (!function_exists('ee_blog_excerpt')) {
                function ee_blog_excerpt($len = 150) {
                    $x = get_the_excerpt() ?: strip_shortcodes(get_the_content());
                    $x = trim(preg_replace('/\s+/u', ' ', wp_strip_all_tags($x)));
                    if (mb_strlen($x) > $len) {
                        $x = mb_substr($x, 0, $len);
                        $x = preg_replace('/\s+\S*$/u', '', $x) . '…';
                    }
                    return $x;
                }
            }
            /* Resolve a rail banner to a URL, looking in the three places the
               image could plausibly have been put:

                 1. a full https:// URL, used exactly as given;
                 2. the theme folder - child theme first, then parent, since
                    get_template_directory() points at the parent and would
                    miss a file uploaded into an active child theme;
                 3. the Media Library, matched on the filename, so uploading
                    the image through Media -> Add New is enough on its own.

               The extension is not trusted either: a .png entry still matches
               a .jpg/.jpeg/.webp export of the same name. Returns '' when the
               image genuinely is not there yet. */
            if (!function_exists('ee_blog_banner_url')) {
                function ee_blog_banner_url($ref) {
                    $ref = trim($ref);
                    if ($ref === '') return '';
                    if (strpos($ref, 'http') === 0) return $ref;

                    $rel  = ltrim($ref, '/');
                    $stem = pathinfo($rel, PATHINFO_FILENAME);
                    $exts = array_unique(array_filter(array(
                        pathinfo($rel, PATHINFO_EXTENSION), 'png', 'jpg', 'jpeg', 'webp',
                    )));

                    $dirs = array(get_stylesheet_directory() => get_stylesheet_directory_uri());
                    $dirs[get_template_directory()] = get_template_directory_uri();
                    foreach ($dirs as $dir => $uri) {
                        foreach ($exts as $ext) {
                            $try = preg_replace('/\.[^.\/]+$/', '.' . $ext, $rel);
                            if (file_exists($dir . '/' . $try)) return $uri . '/' . $try;
                        }
                    }

                    /* Media Library lookup is a DB hit, so it is cached - but
                       briefly, so a freshly uploaded image appears without
                       anyone having to wait out a long transient. */
                    $key = 'ee_blog_banner_' . md5($stem);
                    $hit = get_transient($key);
                    if ($hit !== false) return $hit === 'none' ? '' : $hit;

                    $url = '';
                    $ids = get_posts(array(
                        'post_type'      => 'attachment',
                        'post_status'    => 'inherit',
                        'posts_per_page' => 1,
                        'fields'         => 'ids',
                        'meta_query'     => array(array(
                            'key'     => '_wp_attached_file',
                            'value'   => $stem,
                            'compare' => 'LIKE',
                        )),
                    ));
                    if (!empty($ids)) {
                        $url = (string) wp_get_attachment_url($ids[0]);
                    }
                    set_transient($key, $url !== '' ? $url : 'none', 5 * MINUTE_IN_SECONDS);
                    return $url;
                }
            }
            /* The lead card only makes sense on an unfiltered first page -
               on page 2, or inside a search, every result is equal. */
            $ee_show_hero = ($ee_paged === 1 && $ee_q === '');
            $ee_i = 0;
            ?>

            <header class="ee-bl-head">
                <div class="ee-bl-head-tx">
                    <span class="ee-bl-eyebrow">Insights &amp; Resources</span>
                    <h1><?php echo $ee_active_cat ? esc_html($ee_active_cat->name) : 'Latest from the Blog'; ?></h1>
                    <p>Expert insights, practical strategies, and the latest ideas to help education teams improve admissions, student recruitment and growth.</p>
                </div>
                <form class="ee-bl-search" role="search" method="get"
                      action="<?php echo esc_url(!empty($GLOBALS['ee_blog_base_url'])
                          ? $GLOBALS['ee_blog_base_url']
                          : ($ee_active_cat ? home_url('/blog/' . $ee_active_cat->slug . '/') : home_url('/blog/'))); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.6-3.6"/></svg>
                    <input type="search" name="s" value="<?php echo esc_attr($ee_q); ?>"
                           placeholder="Search articles, topics or guides…" aria-label="Search articles">
                </form>
            </header>

            <?php if ($ee_q !== '') : ?>
            <p class="ee-bl-result">
                <?php echo (int) $ee_blog_query->found_posts; ?> result<?php echo $ee_blog_query->found_posts === 1 ? '' : 's'; ?>
                for &ldquo;<?php echo esc_html($ee_q); ?>&rdquo;
                &middot; <a href="<?php echo esc_url($ee_active_cat ? home_url('/blog/' . $ee_active_cat->slug . '/') : home_url('/blog/')); ?>">clear</a>
            </p>
            <?php endif; ?>

            <?php if ($ee_blog_query->have_posts()) : ?>
                <div class="ee-bl-grid">
                <?php while ($ee_blog_query->have_posts()) : $ee_blog_query->the_post();
                    $ee_i++;
                    $cats    = get_the_category();
                    $primary = !empty($cats) ? $cats[0] : null;
                    $hero    = ($ee_show_hero && $ee_i === 1);
                    $thumb   = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium_large') : '';
                ?>
                <article class="ee-bl-card<?php echo $hero ? ' ee-bl-card--hero' : ''; ?>">
                    <?php if ($thumb) : ?>
                    <a class="ee-bl-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                        <img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" decoding="async">
                    </a>
                    <?php endif; ?>
                    <div class="ee-bl-body">
                        <div class="ee-bl-meta">
                            <?php if ($primary) : ?>
                            <a class="ee-bl-cat" href="<?php echo esc_url(home_url('/blog/' . $primary->slug . '/')); ?>"><?php echo esc_html($primary->name); ?></a>
                            <?php endif; ?>
                            <span class="ee-bl-date">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" aria-hidden="true"><rect x="3.5" y="5" width="17" height="15" rx="2.5"/><path d="M3.5 9.5h17M8 3v4M16 3v4"/></svg>
                                <?php echo esc_html(get_the_date('d M Y')); ?>
                            </span>
                        </div>
                        <h2 class="ee-bl-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php /* Only the lead card carries the excerpt and the read-time /
                                 Read More row. In the grid the column is narrow enough that
                                 both were mostly height, so the tile is thumbnail, category,
                                 date and title - the whole card is already a link. */ ?>
                        <?php if ($hero) : ?>
                        <p class="ee-bl-x"><?php echo esc_html(ee_blog_excerpt(190)); ?></p>
                        <div class="ee-bl-foot">
                            <span class="ee-bl-time">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 1.8"/></svg>
                                <?php echo (int) ee_blog_read_time(get_the_ID()); ?> min read
                            </span>
                            <a class="ee-bl-more" href="<?php the_permalink(); ?>">
                                Read Article
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>

                <?php
                /* $ee_blog_base_url is set by the router when the page was
                   reached through a root-level section (/crm/, /insights/ …),
                   so paging stays on that URL instead of jumping to /blog/. */
                $pagi_base = !empty($GLOBALS['ee_blog_base_url'])
                    ? $GLOBALS['ee_blog_base_url'] . '%_%'
                    : ($ee_active_cat
                        ? trailingslashit(home_url('/blog/' . $ee_active_cat->slug)) . '%_%'
                        : trailingslashit(home_url('/blog/')) . '%_%');
                $pagi = paginate_links(array(
                    'total'   => $ee_blog_query->max_num_pages,
                    'current' => $ee_paged,
                    'type'    => 'array',
                    'base'    => $pagi_base,
                    'format'  => 'page/%#%/',
                ));
                if ($pagi) : ?>
                <nav class="ee-blog-pagi" aria-label="Pagination">
                    <p>Page <?php echo (int) $ee_paged; ?> of <?php echo (int) $ee_blog_query->max_num_pages; ?>, showing <?php echo (int) $ee_blog_query->post_count; ?> of <?php echo (int) $ee_blog_query->found_posts; ?> articles</p>
                    <?php foreach ($pagi as $link) echo $link; ?>
                </nav>
                <?php endif; ?>

            <?php else : ?>
                <div class="ee-blog-empty">
                    <p><?php echo $ee_q !== ''
                        ? 'Nothing matched that search. Try a different word, or clear the search to see everything.'
                        : 'No posts published yet. Head to <strong>Blog → Add New</strong> in your admin, assign a category, and your first article will land here automatically.'; ?></p>
                </div>
            <?php endif; ?>
        </main>

        <aside class="ee-blog-side-r ee-bl-rail" aria-label="Sidebar">
            <?php
            /* ── Rail banners ────────────────────────────────────────────────
               The two hand-built promo cards (Admissions CRM and Vidya AI
               Suite) have been replaced by the designed artwork, so the rail
               is now just images that link out.

               TO SWAP AN IMAGE: put the file in the theme folder under
               assets/blog/ and keep the filename, or paste a full
               https://... URL from the Media Library instead — anything
               starting with http is used as-is.

               An entry whose file is not on disk is skipped, so nothing
               broken renders while artwork is still being uploaded. */
            $ee_bl_banners = array(
                array(
                    'src'  => 'https://www.extraaedge.com/wp-content/uploads/2026/blog-side-bar/admission-crm-banner.png',
                    'href' => 'https://www.extraaedge.com/book-a-demo/',
                    'alt'  => 'ExtraaEdge Admissions CRM — turn more enquiries into enrollments. Book a demo.',
                ),
                array(
                    'src'  => 'https://www.extraaedge.com/wp-content/uploads/2026/blog-side-bar/vidya-ai-suite-admissions-banner.png',
                    'href' => 'https://www.extraaedge.com/book-a-demo/',
                    'alt'  => 'Vidya AI Suite — meet your AI admissions team. Book a demo.',
                ),
            );

            $ee_bl_shown   = 0;
            $ee_bl_missing = array();
            foreach ($ee_bl_banners as $b) {
                $url = ee_blog_banner_url($b['src']);
                if ($url === '') { $ee_bl_missing[] = $b['src']; continue; }
                $ee_bl_shown++;
                ?>
                <a class="ee-bl-banner" href="<?php echo esc_url($b['href']); ?>">
                    <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($b['alt']); ?>"
                         loading="lazy" decoding="async">
                </a>
                <?php
            }

            /* Nothing found — keep a plain CTA in the rail rather than
               leaving the column empty. */
            if (!$ee_bl_shown) : ?>
                <section class="ee-bl-promo">
                    <h2>Turn More Enquiries Into Enrollments</h2>
                    <p>See how ExtraaEdge helps your admissions team manage leads, automate follow-ups and convert more students.</p>
                    <a class="ee-bl-btn" href="https://www.extraaedge.com/book-a-demo/">Book a Demo</a>
                </section>
            <?php endif; ?>

            <?php /* Only an administrator sees this, and only while an image is
                     still missing - so "the banner isn't showing" says which
                     file it could not find instead of failing silently. */ ?>
            <?php if ($ee_bl_missing && current_user_can('manage_options')) : ?>
                <?php $ee_bl_dirs = array_unique(array(get_stylesheet_directory(), get_template_directory())); ?>
                <p class="ee-bl-note">
                    <b>Banner not found</b> (visible to admins only). Looked for
                    <?php echo esc_html(implode(' and ', $ee_bl_missing)); ?> under
                    <?php foreach ($ee_bl_dirs as $d) : ?><code><?php echo esc_html($d); ?></code> <?php endforeach; ?>
                    and in the Media Library. Upload the image through
                    <b>Media &rarr; Add New</b> keeping that filename, or put the
                    file at that path in the theme. .png / .jpg / .webp all work.
                </p>
            <?php endif; ?>
        </aside>

    </div>
</div>

<?php
get_footer();
