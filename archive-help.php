<?php
/**
 * archive-help.php — Help Center at /help/ (user-approved glass design).
 *
 * Hero (navy gradient + big rounded search), overlapping glass quick-link
 * tiles (one per category), 2-col category cards with colored icon tiles
 * and article link lists, support band. Articles group by the same
 * `_help_category` meta single-help.php uses. Search filters the article
 * links client-side; quick tiles smooth-scroll to their category card.
 * No CDN frameworks / icon fonts — inline SVGs, scoped .hcx-* styles.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* ---- editable page settings (Help → Page Settings) with defaults ---- */
$hcx_opt = get_option('ee_help_page_settings', array());
$hcx_t = function ($k, $d = '') use ($hcx_opt) {
    return (isset($hcx_opt[$k]) && trim((string) $hcx_opt[$k]) !== '') ? $hcx_opt[$k] : $d;
};

/* hero video: YouTube / Vimeo / direct file → embed markup */
$hcx_embed = function ($url) {
    $url = trim((string) $url);
    if ($url === '') return '';
    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{6,20})~', $url, $m)) {
        return '<iframe src="https://www.youtube-nocookie.com/embed/' . esc_attr($m[1]) . '" title="Help Center video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    if (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $m)) {
        return '<iframe src="https://player.vimeo.com/video/' . esc_attr($m[1]) . '" title="Help Center video" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    if (preg_match('~\.(mp4|webm|ogv|ogg)(\?.*)?$~i', $url)) {
        return '<video controls preload="metadata" src="' . esc_url($url) . '"></video>';
    }
    return '';
};
$hcx_video_html = $hcx_embed($hcx_t('hero_video'));
$hcx_hero_img   = $hcx_t('hero_image');

/* extra rich section (text/images/videos from the admin editor) */
$hcx_rich = trim((string) $hcx_t('extra_content'));
if ($hcx_rich !== '') {
    if (!empty($GLOBALS['wp_embed']) && is_object($GLOBALS['wp_embed'])) {
        $hcx_rich = $GLOBALS['wp_embed']->autoembed($hcx_rich);
    }
    $hcx_rich = do_shortcode(wpautop($hcx_rich));
}

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
        $hid = get_the_ID();
        $cat = trim((string) get_post_meta($hid, '_help_category', true));
        if ($cat === '') $cat = 'General';
        $hcx_groups[$cat][] = array(
            'title' => get_the_title(),
            'url'   => get_permalink(),
        );
    }
    wp_reset_postdata();
}
$hcx_total = 0;
foreach ($hcx_groups as $g) { $hcx_total += count($g); }

/* admin-managed category overrides (Help → Page Settings): color/icon/order */
$hcx_cat_over = array();
foreach ((array) get_option('ee_help_categories', array()) as $hcx_row) {
    if (!empty($hcx_row['name'])) $hcx_cat_over[mb_strtolower(trim($hcx_row['name']))] = $hcx_row;
}
if ($hcx_cat_over && $hcx_groups) {
    $hcx_ord = array();
    $hcx_pos = 0;
    foreach ($hcx_groups as $k => $v) {
        $ov = isset($hcx_cat_over[mb_strtolower(trim($k))]) ? $hcx_cat_over[mb_strtolower(trim($k))] : null;
        $hcx_ord[$k] = ($ov && isset($ov['order']) && $ov['order'] !== '') ? (int) $ov['order'] : 1000 + $hcx_pos;
        $hcx_pos++;
    }
    uksort($hcx_groups, function ($a, $b) use ($hcx_ord) { return $hcx_ord[$a] <=> $hcx_ord[$b]; });
}

$hcx_slug = function ($name) { return sanitize_title($name); };
/* display name: admin "Shown as" rename wins over the raw meta value */
$hcx_disp = function ($cat) use ($hcx_cat_over) {
    $k = mb_strtolower(trim($cat));
    return (isset($hcx_cat_over[$k]) && !empty($hcx_cat_over[$k]['label'])) ? $hcx_cat_over[$k]['label'] : $cat;
};

/* accent colors + icons cycle per category (mockup palette) */
$hcx_accents = array('#DE6E30', '#4CAF50', '#673AB7', '#2196F3', '#E91E63', '#009688', '#9C27B0', '#19335D');
/* known CRM categories keep the exact color + icon from the approved
   mockup (icon value = index into $hcx_icons); anything else cycles */
$hcx_cat_map = array(
    'overview'            => array('#19335D', 8),
    'adding leads'        => array('#DE6E30', 0),
    'managing leads'      => array('#4CAF50', 1),
    'activities tracking' => array('#673AB7', 2),
    'messaging leads'     => array('#2196F3', 10),
    'email leads'         => array('#E91E63', 9),
    'calling leads'       => array('#DE6E30', 3),
    'lead follow ups'     => array('#9C27B0', 4),
    'bulk activities'     => array('#19335D', 5),
    'admin settings'      => array('#009688', 6),
    'my account'          => array('#673AB7', 7),
);
$hcx_icons = array(
    '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>',
    '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
    '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>',
    '<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="m9 16 2 2 4-4"/>',
    '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
    '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>',
    '<circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/>',
    '<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>',
    '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
    '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
);
$hcx_look = function ($cat, $i) use ($hcx_cat_map, $hcx_accents, $hcx_icons, $hcx_cat_over) {
    $k = mb_strtolower(trim($cat));
    $color = null;
    $icon  = null;
    /* 1) admin override wins */
    if (isset($hcx_cat_over[$k])) {
        $ov = $hcx_cat_over[$k];
        if (!empty($ov['color'])) $color = $ov['color'];
        if (isset($ov['icon']) && $ov['icon'] !== '' && isset($hcx_icons[(int) $ov['icon']])) $icon = $hcx_icons[(int) $ov['icon']];
    }
    /* 2) built-in map for known CRM categories */
    if (isset($hcx_cat_map[$k])) {
        if ($color === null) $color = $hcx_cat_map[$k][0];
        if ($icon === null)  $icon = $hcx_icons[$hcx_cat_map[$k][1]];
    }
    /* 3) cycling palette fallback */
    if ($color === null) $color = $hcx_accents[$i % count($hcx_accents)];
    if ($icon === null)  $icon = $hcx_icons[$i % count($hcx_icons)];
    return array($color, $icon);
};

/* ---- SEO ---- */
add_action('wp_head', function () use ($hcx_groups, $hcx_total) {
    $url = home_url('/help/');
    echo '<meta name="description" content="ExtraaEdge CRM Help Center — ' . esc_attr($hcx_total) . ' guides and answers across ' . esc_attr(count($hcx_groups)) . ' categories to help you manage leads and grow your admissions.">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<script type="application/ld+json">' . wp_json_encode(array(
        '@context' => 'https://schema.org',
        '@type'    => 'CollectionPage',
        'name'     => 'ExtraaEdge CRM Help Center',
        'url'      => $url,
        'isPartOf' => array('@type' => 'WebSite', 'name' => get_bloginfo('name'), 'url' => home_url('/')),
    )) . '</script>' . "\n";
}, 5);

get_header();
?>
<style id="hcx-style">
.hcx{--nv:#19335D;--or:#DE6E30;--bg:#f8f9ff;--line:rgba(0,0,0,.05);--mut:#44474f;font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:#0b1c30;background:var(--bg)}
.hcx *{box-sizing:border-box}
.hcx .w{max-width:1280px;margin:0 auto;padding:0 clamp(16px,3.5vw,40px)}
.hcx a{text-decoration:none}
/* hero */
.hcx-hero{position:relative;overflow:hidden;background:linear-gradient(135deg,#19335D 0%,#2A4E8C 100%);padding:clamp(48px,7vw,80px) 0 clamp(96px,12vw,128px)}
.hcx-hero::before{content:"";position:absolute;top:-80px;right:-80px;width:384px;height:384px;border-radius:50%;background:rgba(255,255,255,.05);filter:blur(64px)}
.hcx-hero::after{content:"";position:absolute;bottom:-80px;left:-80px;width:256px;height:256px;border-radius:50%;background:rgba(222,110,48,.12);filter:blur(48px)}
.hcx-hero .w{position:relative;z-index:2;display:flex;align-items:center;justify-content:space-between;gap:48px}
.hcx-hero-txt{max-width:640px}
.hcx-hero h1{font-size:clamp(30px,4.4vw,48px);line-height:1.15;font-weight:800;letter-spacing:-.02em;color:#fff;margin:0 0 14px}
.hcx-hero p{font-size:clamp(15.5px,1.8vw,18px);line-height:1.6;color:rgba(211,228,254,.9);margin:0 0 clamp(26px,4vw,44px)}
.hcx-search{position:relative;width:100%;max-width:640px;transition:transform .25s}
.hcx-search.zoom{transform:scale(1.02)}
.hcx-search svg{position:absolute;left:22px;top:50%;transform:translateY(-50%);width:22px;height:22px;color:#747780;pointer-events:none}
.hcx-search input{width:100%;padding:19px 56px 19px 60px;border-radius:999px;border:0;background:#fff;font:400 16px/1.4 'Inter',sans-serif;color:#0b1c30;outline:none;box-shadow:0 20px 44px -14px rgba(4,12,30,.5);transition:box-shadow .25s}
.hcx-search input:focus{box-shadow:0 20px 44px -14px rgba(4,12,30,.5),0 0 0 4px rgba(25,51,93,.2)}
.hcx-search input::placeholder{color:rgba(116,119,128,.6)}
.hcx-search .x{position:absolute;right:12px;top:50%;transform:translateY(-50%);width:34px;height:34px;border-radius:50%;background:#eff4ff;color:var(--nv);border:0;cursor:pointer;font-weight:800;display:none}
.hcx-search.has .x{display:block}
.hcx-count{margin-top:13px;font-size:12.5px;color:rgba(211,228,254,.75);font-weight:600;min-height:18px}
.hcx-hero-art{display:none;flex:0 0 30%;aspect-ratio:1/1;background:rgba(255,255,255,.05);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,.1);border-radius:24px;position:relative;align-items:center;justify-content:center}
.hcx-hero-art .book{width:120px;height:120px;color:rgba(255,255,255,.2);animation:hcxPulse 2.4s ease-in-out infinite}
.hcx-hero-art .badge{position:absolute;top:44px;right:44px;width:38px;height:38px;color:var(--or)}
.hcx-hero-art.media{padding:0;overflow:hidden}
.hcx-hero-art.media img{width:100%;height:100%;object-fit:cover;display:block}
.hcx-hero-art.video{aspect-ratio:16/9;flex:0 0 42%}
.hcx-hero-art.video iframe,.hcx-hero-art.video video{width:100%;height:100%;border:0;display:block}
@keyframes hcxPulse{0%,100%{opacity:1}50%{opacity:.5}}
@media(min-width:1024px){.hcx-hero-art{display:flex}}
/* editable rich section (text / images / videos from admin) */
.hcx-rich{background:rgba(255,255,255,.85);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid var(--line);border-radius:24px;padding:clamp(20px,3.2vw,40px);margin:0 0 clamp(24px,4vw,40px);color:var(--mut);font-size:16px;line-height:1.65;overflow-wrap:break-word}
.hcx-rich h1,.hcx-rich h2,.hcx-rich h3,.hcx-rich h4{color:var(--nv);line-height:1.3;margin:0 0 12px}
.hcx-rich h2{font-size:clamp(20px,2.4vw,26px)}
.hcx-rich h3{font-size:clamp(17px,2vw,20px)}
.hcx-rich p{margin:0 0 14px}
.hcx-rich p:last-child{margin-bottom:0}
.hcx-rich a{color:var(--or);font-weight:600}
.hcx-rich img{max-width:100%;height:auto;border-radius:12px}
.hcx-rich iframe,.hcx-rich video{width:100%;max-width:100%;aspect-ratio:16/9;height:auto;border-radius:12px;border:0;display:block}
.hcx-rich ul,.hcx-rich ol{margin:0 0 14px;padding-left:22px}
/* quick tiles (overlap the hero) */
.hcx-quick{position:relative;z-index:20;margin-top:-64px}
.hcx-quick .grid{display:grid;grid-template-columns:repeat(var(--qcols,7),minmax(0,1fr));gap:16px}
.hcx-tile{background:rgba(255,255,255,.85);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid var(--line);border-radius:16px;padding:22px 12px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;gap:11px;cursor:pointer;transition:transform .3s cubic-bezier(.4,0,.2,1),box-shadow .3s}
.hcx-tile:hover{transform:translateY(-4px);box-shadow:0 10px 30px rgba(25,51,93,.08)}
.hcx-tile svg{width:30px;height:30px}
.hcx-tile span{font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--mut);line-height:1.3}
/* category cards — bento grid: card size follows article count */
.hcx-main{padding:clamp(44px,6vw,80px) 0 20px}
.hcx-grid{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));grid-auto-flow:dense;gap:clamp(14px,2.2vw,24px)}
.hcx-card{grid-column:span 2}
.hcx-card.lg{grid-column:span 4}
.hcx-card.lg .hcx-links{display:grid;grid-template-columns:1fr 1fr;gap:12px 20px}
.hcx-card.sm{background:color-mix(in srgb,var(--ac) 5%,#fff);border-color:color-mix(in srgb,var(--ac) 16%,transparent)}
.hcx-cnt{position:absolute;top:16px;right:16px;font-size:11px;font-weight:700;letter-spacing:.04em;color:var(--ac);background:color-mix(in srgb,var(--ac) 10%,#fff);border:1px solid color-mix(in srgb,var(--ac) 22%,transparent);padding:4px 10px;border-radius:999px;pointer-events:none}
.hcx-card{position:relative;background:rgba(255,255,255,.85);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid var(--line);border-radius:24px;padding:clamp(22px,3vw,34px);display:flex;flex-direction:column;gap:clamp(14px,2vw,20px);transition:transform .3s cubic-bezier(.4,0,.2,1),box-shadow .3s;scroll-margin-top:90px}
.hcx-card:hover{transform:translateY(-4px);box-shadow:0 10px 30px rgba(25,51,93,.08)}
.hcx-card.hide{display:none}
.hcx-card.flash{box-shadow:0 0 0 3px var(--ac),0 10px 30px rgba(25,51,93,.12)}
.hcx-ic{width:64px;height:64px;border-radius:16px;background:color-mix(in srgb,var(--ac) 10%,#fff);color:var(--ac);display:flex;align-items:center;justify-content:center;flex:none;transition:background .3s,color .3s}
.hcx-card:hover .hcx-ic{background:var(--ac);color:#fff}
.hcx-ic svg{width:30px;height:30px}
.hcx-body{min-width:0;flex:1}
.hcx-card h2{font-size:clamp(19px,2.2vw,24px);line-height:1.3;font-weight:600;letter-spacing:-.01em;color:var(--ac);margin:0 0 clamp(14px,2vw,24px)}
.hcx-links{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:14px}
.hcx-links a{display:flex;align-items:center;gap:8px;font-size:16px;line-height:1.5;color:var(--mut);transition:color .2s}
.hcx-links a:hover{color:var(--nv)}
.hcx-links a svg{width:14px;height:14px;flex:none;color:var(--ac);opacity:0;transform:translateX(-4px);transition:.2s}
.hcx-links a:hover svg{opacity:1;transform:none}
.hcx-links li.hide{display:none}
.hcx-empty{display:none;text-align:center;padding:56px 20px;color:var(--mut)}
.hcx-empty.show{display:block}
.hcx-empty b{display:block;font-size:18px;color:var(--nv);margin-bottom:6px}
/* support band */
.hcx-support{background:#eff4ff;border:1px solid rgba(196,198,208,.2);border-radius:24px;padding:clamp(24px,3.4vw,40px);margin:clamp(40px,6vw,64px) 0 clamp(48px,7vw,80px);display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
.hcx-support .lhs{display:flex;align-items:center;gap:clamp(18px,2.6vw,32px)}
.hcx-support .agent{width:80px;height:80px;border-radius:50%;background:var(--nv);color:#fff;display:flex;align-items:center;justify-content:center;flex:none}
.hcx-support .agent svg{width:36px;height:36px}
.hcx-support h3{font-size:clamp(19px,2.2vw,24px);font-weight:600;color:var(--nv);margin:0 0 8px}
.hcx-support p{font-size:16px;line-height:1.5;color:var(--mut);margin:0;max-width:480px}
.hcx-support .act{display:flex;gap:16px;flex-wrap:wrap}
.hcx-btn{display:inline-flex;align-items:center;gap:9px;font-weight:600;font-size:14px;letter-spacing:.02em;padding:16px 32px;border-radius:12px;transition:.25s;white-space:nowrap;cursor:pointer}
.hcx-btn svg{width:19px;height:19px}
.hcx-btn.solid{background:var(--nv);color:#fff}
.hcx-btn.solid:hover{background:#2A4E8C;color:#fff;transform:translateY(-2px)}
.hcx-btn.line{background:#fff;color:var(--nv);border:2px solid var(--nv)}
.hcx-btn.line:hover{background:rgba(25,51,93,.05);color:var(--nv)}
/* responsive */
@media(max-width:1100px){
  .hcx-quick .grid{grid-template-columns:repeat(4,minmax(0,1fr))}
  .hcx-grid{grid-template-columns:repeat(4,minmax(0,1fr))}
  .hcx-card,.hcx-card.sm{grid-column:span 2}
  .hcx-card.lg{grid-column:span 4}
}
@media(max-width:860px){
  .hcx-grid{grid-template-columns:1fr}
  .hcx-card,.hcx-card.lg,.hcx-card.sm{grid-column:span 1}
  .hcx-card.lg .hcx-links{grid-template-columns:1fr;gap:14px}
  .hcx-hero .w{flex-direction:column;text-align:center}
  .hcx-hero-txt{max-width:none}
  .hcx-search{margin:0 auto}
}
@media(max-width:600px){
  .hcx-quick .grid{grid-template-columns:repeat(2,minmax(0,1fr))}
  .hcx-support{flex-direction:column;align-items:flex-start}
  .hcx-support .lhs{flex-direction:column;align-items:flex-start}
  .hcx-support .act,.hcx-support .act .hcx-btn{width:100%;justify-content:center}
  .hcx-search input{padding:16px 48px 16px 52px}
}
@media(prefers-reduced-motion:reduce){.hcx-tile,.hcx-card,.hcx-btn,.hcx-search{transition:none}.hcx-hero-art .book{animation:none}}
</style>

<main id="main-content" class="hcx">

  <section class="hcx-hero">
    <div class="w">
      <div class="hcx-hero-txt">
        <h1><?php echo esc_html($hcx_t('hero_title', 'ExtraaEdge CRM Help Center')); ?></h1>
        <p><?php echo esc_html($hcx_t('hero_sub', 'Find guides and answers to help you manage leads and grow your admissions.')); ?></p>
        <div class="hcx-search" id="hcxSearch">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <input type="search" id="hcxQ" placeholder="<?php echo esc_attr($hcx_t('search_ph', 'Search for help articles...')); ?>" autocomplete="off" aria-label="Search help articles">
          <button class="x" id="hcxX" type="button" aria-label="Clear search">✕</button>
        </div>
        <div class="hcx-count" id="hcxCount" aria-live="polite"></div>
      </div>
      <?php if ($hcx_video_html) : ?>
      <div class="hcx-hero-art media video"><?php echo $hcx_video_html; ?></div>
      <?php elseif ($hcx_hero_img) : ?>
      <div class="hcx-hero-art media" aria-hidden="true"><img src="<?php echo esc_url($hcx_hero_img); ?>" alt="" loading="lazy"></div>
      <?php else : ?>
      <div class="hcx-hero-art" aria-hidden="true">
        <svg class="book" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><line x1="9" y1="7" x2="16" y2="7"/><line x1="9" y1="11" x2="14" y2="11"/></svg>
        <svg class="badge" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 15h-2v-2h2zm1.07-5.25-.9.92A1.49 1.49 0 0 0 13 14h-2v-.5a3 3 0 0 1 .88-2.12l1.24-1.26a1.46 1.46 0 0 0 .38-1A1.5 1.5 0 0 0 10.5 9H8.5a3.5 3.5 0 0 1 7 0 2.89 2.89 0 0 1-.93 2.75z"/></svg>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <?php if ($hcx_groups) : $hcx_i = 0; ?>
  <!-- quick links: one glass tile per category, scrolls to its card -->
  <section class="hcx-quick">
    <div class="w">
      <div class="grid" style="--qcols:<?php echo max(2, min(7, count($hcx_groups))); ?>">
        <?php foreach ($hcx_groups as $cat => $items) :
            list($ac, $ico) = $hcx_look($cat, $hcx_i);
            $hcx_i++;
        ?>
        <button class="hcx-tile" type="button" data-go="cat-<?php echo esc_attr($hcx_slug($cat)); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($ac); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $ico; ?></svg>
          <span><?php echo esc_html($hcx_disp($cat)); ?></span>
        </button>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- category cards with article link lists -->
  <section class="hcx-main">
    <div class="w">
      <?php if ($hcx_rich !== '') : ?><div class="hcx-rich"><?php echo $hcx_rich; ?></div><?php endif; ?>
      <div class="hcx-grid" id="hcxGrid">
        <?php $hcx_i = 0; foreach ($hcx_groups as $cat => $items) :
            list($ac, $ico) = $hcx_look($cat, $hcx_i);
            $hcx_i++;
            $hcx_n  = count($items);
            $hcx_sz = $hcx_n >= 5 ? 'lg' : ($hcx_n >= 3 ? 'md' : 'sm');
        ?>
        <article class="hcx-card <?php echo esc_attr($hcx_sz); ?>" id="cat-<?php echo esc_attr($hcx_slug($cat)); ?>" style="--ac:<?php echo esc_attr($ac); ?>">
          <span class="hcx-cnt"><?php echo esc_html(str_replace('{count}', $hcx_n, $hcx_t($hcx_n === 1 ? 'lbl_badge_one' : 'lbl_badge_many', '{count} article' . ($hcx_n === 1 ? '' : 's')))); ?></span>
          <div class="hcx-ic" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $ico; ?></svg>
          </div>
          <div class="hcx-body">
            <h2><?php echo esc_html($hcx_disp($cat)); ?></h2>
            <ul class="hcx-links">
              <?php foreach ($items as $a) : ?>
              <li data-s="<?php echo esc_attr(mb_strtolower($a['title'] . ' ' . $cat . ' ' . $hcx_disp($cat))); ?>">
                <a href="<?php echo esc_url($a['url']); ?>"><?php echo esc_html($a['title']); ?>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
      <div class="hcx-empty" id="hcxEmpty"><b><?php echo esc_html($hcx_t('empty_search', 'No articles match your search.')); ?></b><?php echo esc_html($hcx_t('empty_search2', 'Try a different word, or browse the categories above.')); ?></div>
    <?php else : ?>
  <section class="hcx-main">
    <div class="w">
      <?php if ($hcx_rich !== '') : ?><div class="hcx-rich"><?php echo $hcx_rich; ?></div><?php endif; ?>
      <div class="hcx-empty show" style="display:block"><b><?php echo esc_html($hcx_t('empty_soon', 'Help articles are coming soon.')); ?></b><?php echo esc_html($hcx_t('empty_soon2', 'Meanwhile, our team is one click away.')); ?></div>
    <?php endif; ?>

      <!-- support band -->
      <div class="hcx-support">
        <div class="lhs">
          <div class="agent" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
          </div>
          <div>
            <h3><?php echo esc_html($hcx_t('support_title', 'Need more help?')); ?></h3>
            <p><?php echo esc_html($hcx_t('support_text', "If you can't find what you're looking for, please contact your administrator or reach out to our support team.")); ?></p>
          </div>
        </div>
        <div class="act">
          <a class="hcx-btn solid" href="<?php echo esc_url($hcx_t('b1_url', home_url('/contact-us/'))); ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
            <?php echo esc_html($hcx_t('b1_label', 'Email Support')); ?>
          </a>
          <a class="hcx-btn line" href="<?php echo esc_url($hcx_t('b2_url', home_url('/book-demo/'))); ?>">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            <?php echo esc_html($hcx_t('b2_label', 'Live Chat')); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
(function(){
  /* editable label templates ({count} = live number) */
  var L = <?php echo str_replace('</script', '<\\/script', wp_json_encode(array(
      'b1' => $hcx_t('lbl_badge_one', '{count} article'),
      'bm' => $hcx_t('lbl_badge_many', '{count} articles'),
      'f1' => $hcx_t('lbl_found_one', '{count} article found'),
      'fm' => $hcx_t('lbl_found_many', '{count} articles found'),
  ))); ?>;

  /* quick tiles -> smooth scroll to the category card + brief highlight */
  document.querySelectorAll('.hcx-tile[data-go]').forEach(function(t){
    t.addEventListener('click', function(){
      var el = document.getElementById(t.dataset.go);
      if (!el) return;
      el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      el.classList.add('flash');
      setTimeout(function(){ el.classList.remove('flash'); }, 1400);
    });
  });

  /* live search across article links; cards hide when empty */
  var q = document.getElementById('hcxQ');
  var xBtn = document.getElementById('hcxX');
  var box = document.getElementById('hcxSearch');
  var cnt = document.getElementById('hcxCount');
  var empty = document.getElementById('hcxEmpty');
  var cards = document.querySelectorAll('.hcx-card');
  if (!q) return;

  q.addEventListener('focus', function(){ box.classList.add('zoom'); });
  q.addEventListener('blur', function(){ box.classList.remove('zoom'); });

  function apply(){
    var term = q.value.trim().toLowerCase();
    box.classList.toggle('has', term !== '');
    var visible = 0;
    cards.forEach(function(card){
      var inCard = 0;
      card.querySelectorAll('.hcx-links li').forEach(function(li){
        var hit = term === '' || (li.dataset.s || '').indexOf(term) !== -1;
        li.classList.toggle('hide', !hit);
        if (hit) inCard++;
      });
      card.classList.toggle('hide', inCard === 0);
      var badge = card.querySelector('.hcx-cnt');
      if (badge) badge.textContent = (inCard === 1 ? L.b1 : L.bm).replace('{count}', inCard);
      visible += inCard;
    });
    if (empty) empty.classList.toggle('show', visible === 0);
    if (cnt) cnt.textContent = term !== '' ? (visible === 1 ? L.f1 : L.fm).replace('{count}', visible) : '';
  }
  q.addEventListener('input', apply);
  if (xBtn) xBtn.addEventListener('click', function(){ q.value = ''; apply(); q.focus(); });

  /* deep link: /help/?q=whatsapp pre-fills and runs the search */
  var pre = new URLSearchParams(location.search).get('q');
  if (pre) { q.value = pre; apply(); }
})();
</script>

<?php get_footer(); ?>
