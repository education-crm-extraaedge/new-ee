<?php
/**
 * archive-webinar.php — /webinars/ Webinars & Live Sessions listing.
 * Design: brand navy #19335D / orange #DE6E30 on white, Inter only (design system).
 * Next-session hero + Upcoming grid + On-demand recordings (6/page, client-side
 * pagination - the URL always stays /webinars/) + subscribe CTA.
 * Custom fields: _webinar_subtitle, _webinar_start (ISO 8601), _webinar_timezone,
 *   _webinar_speaker_name, _webinar_speaker_role, _webinar_register_url,
 *   _webinar_status (scheduled|live|completed), _webinar_cta_text
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_post_type_archive('webinar')) return;
    echo '<script type="application/ld+json">' . wp_json_encode(array(
        '@context' => 'https://schema.org',
        '@type'    => 'CollectionPage',
        'name'     => 'Webinars & Live Sessions | ExtraaEdge',
        'url'      => get_post_type_archive_link('webinar'),
        'isPartOf' => array('@id' => 'https://www.extraaedge.com/#website'),
    )) . '</script>' . "\n";
});

$q = new WP_Query(array(
    'post_type'      => 'webinar',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
));

$now      = current_time('timestamp');
$upcoming = array();
$ondemand = array();
if ($q->have_posts()) {
    while ($q->have_posts()) { $q->the_post();
        $pid    = get_the_ID();
        $startr = get_post_meta($pid, '_webinar_start', true);
        $ts     = $startr ? strtotime($startr) : 0;
        $status = strtolower(get_post_meta($pid, '_webinar_status', true) ?: '');
        $item   = array(
            'title'   => get_the_title(),
            'url'     => get_permalink(),
            'img'     => get_the_post_thumbnail_url($pid, 'large'),
            'sub'     => get_post_meta($pid, '_webinar_subtitle', true) ?: wp_trim_words(get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 22),
            'ts'      => $ts,
            'date'    => $ts ? wp_date('j M Y', $ts) : get_the_date('j M Y'),
            'day'     => $ts ? wp_date('j', $ts) : get_the_date('j'),
            'mon'     => $ts ? wp_date('M', $ts) : get_the_date('M'),
            'time'    => $ts ? wp_date('g:i A', $ts) : '',
            'tz'      => get_post_meta($pid, '_webinar_timezone', true) ?: 'IST',
            'speaker' => get_post_meta($pid, '_webinar_speaker_name', true),
            'role'    => get_post_meta($pid, '_webinar_speaker_role', true),
            'reg'     => get_post_meta($pid, '_webinar_register_url', true) ?: get_permalink(),
            'cta'     => get_post_meta($pid, '_webinar_cta_text', true),
            'live'    => $status === 'live',
        );
        $is_upcoming = $status === 'live' || $status === 'scheduled' || ($status === '' && $ts && $ts >= $now);
        if ($is_upcoming && $ts && $ts < $now && $status !== 'live' && $status !== 'scheduled') $is_upcoming = false;
        if ($is_upcoming) $upcoming[] = $item; else $ondemand[] = $item;
    }
    wp_reset_postdata();
}
usort($upcoming, function ($a, $b) { return $a['ts'] <=> $b['ts']; });   /* soonest first */
usort($ondemand, function ($a, $b) { return $b['ts'] <=> $a['ts']; });   /* newest first  */
$next = $upcoming ? array_shift($upcoming) : null;

get_header();
?>
<style id="ee-webinars-archive">
/* ============ /webinars/ listing — scoped .wbx-* · navy/orange on white · Inter ============ */
.wbx{--nv:#19335D;--or:#DE6E30;--or2:#E8843F;--ink:#0b1c30;--mut:#5a6b85;--line:rgba(25,52,93,.12);--soft:#eff4ff;--grn:#1E9E6A;
  font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;color:var(--ink);background:#fff;-webkit-font-smoothing:antialiased}
.wbx *{box-sizing:border-box;margin:0;padding:0}
.wbx a{text-decoration:none;color:inherit}
.wbx .wbx-wrap{max-width:1280px;margin:0 auto;padding:clamp(28px,4vw,56px) 24px clamp(40px,5vw,72px);display:flex;flex-direction:column;gap:clamp(28px,4vw,52px)}
.wbx h1{font-weight:800;font-size:clamp(30px,4.4vw,48px);line-height:1.14;letter-spacing:-.02em;color:var(--nv)}
.wbx .wbx-sub{font-size:clamp(15px,1.6vw,17px);line-height:1.6;color:var(--mut);margin-top:12px;max-width:62ch}
/* next-session hero */
.wbx .wbx-feat{display:grid;grid-template-columns:1.05fr .95fr;background:var(--nv);border-radius:22px;overflow:hidden;min-height:400px;
  box-shadow:0 30px 70px -30px rgba(25,51,93,.55)}
.wbx .wbx-feat-tx{padding:clamp(26px,3.4vw,52px);display:flex;flex-direction:column;justify-content:center;gap:15px;color:#fff;position:relative;z-index:1}
.wbx .wbx-badge{display:inline-flex;align-items:center;gap:7px;width:fit-content;background:var(--or);color:#fff;font:800 11px/1 'Inter',sans-serif;
  letter-spacing:.12em;text-transform:uppercase;border-radius:6px;padding:7px 12px}
.wbx .wbx-badge.live{background:#c62828}
.wbx .wbx-badge.live i{width:7px;height:7px;border-radius:50%;background:#fff;animation:wbxPulse 1.6s ease-out infinite}
@keyframes wbxPulse{0%{box-shadow:0 0 0 0 rgba(255,255,255,.6)}70%{box-shadow:0 0 0 7px rgba(255,255,255,0)}100%{box-shadow:0 0 0 0 rgba(255,255,255,0)}}
.wbx .wbx-feat h2{font-weight:800;font-size:clamp(22px,2.8vw,34px);line-height:1.2;letter-spacing:-.01em}
.wbx .wbx-feat p{font-size:clamp(14px,1.5vw,17px);line-height:1.6;color:rgba(255,255,255,.8);max-width:56ch}
.wbx .wbx-meta{display:flex;flex-wrap:wrap;gap:10px 22px;font:700 13px/1.5 'Inter',sans-serif}
.wbx .wbx-meta span{display:inline-flex;align-items:center;gap:7px}
.wbx .wbx-meta svg{width:15px;height:15px;stroke:var(--or2)}
.wbx .wbx-meta small{font-weight:500;opacity:.75}
.wbx .wbx-cta{display:inline-flex;align-items:center;gap:8px;width:fit-content;background:var(--or);color:#fff;font:700 14px/1 'Inter',sans-serif;
  border-radius:12px;padding:14px 24px;transition:transform .2s,background .2s;box-shadow:0 14px 28px -10px rgba(222,110,48,.55)}
.wbx .wbx-cta:hover{transform:translateY(-2px);background:var(--or2)}
.wbx .wbx-cta svg{width:15px;height:15px;stroke:currentColor}
.wbx .wbx-feat-im{position:relative;min-height:230px}
.wbx .wbx-feat-im img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.wbx .wbx-feat-im::before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,var(--nv) 0%,transparent 45%);z-index:1}
.wbx .wbx-feat-im.noimg{background:radial-gradient(420px 260px at 70% 30%,rgba(222,110,48,.4),transparent 65%),linear-gradient(150deg,#22467c,var(--nv))}
/* section titles */
.wbx h3.wbx-sec{font-weight:800;font-size:clamp(19px,2.2vw,24px);line-height:1.3;letter-spacing:-.01em;color:var(--nv);margin-bottom:18px}
/* upcoming cards */
.wbx .wbx-up{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.wbx .wbx-ucard{display:flex;flex-direction:column;gap:12px;background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px;
  transition:box-shadow .25s,transform .25s,border-color .25s}
.wbx .wbx-ucard:hover{box-shadow:0 18px 40px -22px rgba(25,51,93,.35);transform:translateY(-3px);border-color:rgba(222,110,48,.35)}
.wbx .wbx-uhead{display:flex;align-items:center;gap:12px}
.wbx .wbx-datebox{flex:0 0 auto;width:52px;border-radius:12px;background:var(--nv);color:#fff;text-align:center;padding:7px 0 8px}
.wbx .wbx-datebox b{display:block;font:800 19px/1.1 'Inter',sans-serif}
.wbx .wbx-datebox span{display:block;font:700 10px/1.2 'Inter',sans-serif;letter-spacing:.1em;text-transform:uppercase;opacity:.85}
.wbx .wbx-type{display:inline-flex;align-items:center;gap:6px;font:800 10.5px/1 'Inter',sans-serif;letter-spacing:.08em;text-transform:uppercase;
  color:var(--or);background:rgba(222,110,48,.08);border:1px solid rgba(222,110,48,.28);border-radius:999px;padding:6px 11px}
.wbx .wbx-type.live{color:#c62828;background:rgba(198,40,40,.07);border-color:rgba(198,40,40,.3)}
.wbx .wbx-ucard h4{font-weight:700;font-size:17px;line-height:1.35;color:var(--nv)}
.wbx .wbx-ucard .wbx-usub{font-size:13.5px;line-height:1.55;color:var(--mut);display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.wbx .wbx-spk{font:600 12.5px/1.4 'Inter',sans-serif;color:var(--ink)}
.wbx .wbx-spk small{display:block;font-weight:500;color:var(--mut)}
.wbx .wbx-ufoot{margin-top:auto;display:flex;align-items:center;justify-content:space-between;gap:10px;border-top:1px solid var(--line);padding-top:12px}
.wbx .wbx-when{font:500 12px/1.4 'Inter',sans-serif;color:var(--mut)}
.wbx .wbx-reg{display:inline-flex;align-items:center;gap:5px;font:700 13px/1 'Inter',sans-serif;color:var(--or)}
.wbx .wbx-reg svg{width:14px;height:14px;stroke:var(--or);transition:transform .25s}
.wbx .wbx-ucard:hover .wbx-reg svg{transform:translateX(3px)}
/* on-demand grid */
.wbx .wbx-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.wbx .wbx-card{display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:16px;overflow:hidden;
  transition:box-shadow .3s,transform .3s,border-color .3s}
.wbx .wbx-card:hover{box-shadow:0 24px 50px -24px rgba(25,51,93,.4);transform:translateY(-4px);border-color:rgba(222,110,48,.35)}
.wbx .wbx-cim{height:178px;overflow:hidden;position:relative;background:linear-gradient(150deg,#22467c,var(--nv))}
.wbx .wbx-cim img{width:100%;height:100%;object-fit:cover;transition:transform .5s cubic-bezier(.2,.7,.2,1)}
.wbx .wbx-card:hover .wbx-cim img{transform:scale(1.05)}
.wbx .wbx-play{position:absolute;inset:0;display:grid;place-items:center;z-index:1}
.wbx .wbx-play i{width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.92);display:grid;place-items:center;transition:transform .25s,background .25s}
.wbx .wbx-play svg{width:20px;height:20px;fill:var(--or);margin-left:3px}
.wbx .wbx-card:hover .wbx-play i{background:var(--or);transform:scale(1.08)}
.wbx .wbx-card:hover .wbx-play svg{fill:#fff}
.wbx .wbx-cbody{display:flex;flex-direction:column;flex:1;padding:20px}
.wbx .wbx-klabel{font:800 11px/1 'Inter',sans-serif;letter-spacing:.08em;text-transform:uppercase;color:var(--mut);margin-bottom:9px}
.wbx .wbx-cbody h4{font-weight:700;font-size:16.5px;line-height:1.35;color:var(--nv);margin-bottom:9px}
.wbx .wbx-cbody p{font-size:13.5px;line-height:1.6;color:var(--mut);margin-bottom:16px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.wbx .wbx-cfoot{margin-top:auto;display:flex;align-items:center;justify-content:space-between;gap:10px;border-top:1px solid var(--line);padding-top:12px;font:500 12px/1.4 'Inter',sans-serif;color:var(--mut)}
.wbx .wbx-watch{display:inline-flex;align-items:center;gap:5px;font:700 13px/1 'Inter',sans-serif;color:var(--or)}
.wbx .wbx-watch svg{width:14px;height:14px;stroke:var(--or);transition:transform .25s}
.wbx .wbx-card:hover .wbx-watch svg{transform:translateX(3px)}
/* pagination (client-side - the URL always stays /webinars/) */
.wbx .wbx-hide{display:none!important}
.wbx .wbx-pag{display:flex;justify-content:center;align-items:center;gap:8px;margin-top:26px;flex-wrap:wrap}
.wbx .wbx-pg{display:grid;place-items:center;min-width:40px;height:40px;padding:0 12px;border:1px solid var(--line);border-radius:12px;cursor:pointer;
  font:700 14px/1 'Inter',sans-serif;color:var(--nv);background:#fff;transition:background .2s,color .2s,border-color .2s,transform .2s}
.wbx button.wbx-pg:hover{border-color:var(--or);color:var(--or);transform:translateY(-1px)}
.wbx .wbx-pg.on{background:var(--nv);border-color:var(--nv);color:#fff}
.wbx .wbx-pg-arr{color:var(--or)}
/* subscribe CTA */
.wbx .wbx-news{display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;background:var(--soft);
  border:1px solid var(--line);border-radius:18px;padding:clamp(22px,3vw,40px)}
.wbx .wbx-news h3{font-weight:800;font-size:clamp(18px,2vw,23px);color:var(--nv);margin-bottom:6px}
.wbx .wbx-news p{font-size:14px;line-height:1.6;color:var(--mut)}
.wbx .wbx-nform{display:flex;gap:10px;flex-wrap:wrap}
.wbx .wbx-nform input{flex:1;min-width:220px;padding:13px 16px;border:1px solid var(--line);border-radius:12px;background:#fff;
  font:400 14px/1.4 'Inter',sans-serif;color:var(--ink);outline:none;transition:border-color .2s,box-shadow .2s}
.wbx .wbx-nform input:focus{border-color:var(--or);box-shadow:0 0 0 3px rgba(222,110,48,.12)}
.wbx .wbx-nform button{background:var(--nv);color:#fff;border:0;border-radius:12px;padding:13px 24px;cursor:pointer;
  font:700 14px/1 'Inter',sans-serif;transition:background .2s,transform .2s;white-space:nowrap}
.wbx .wbx-nform button:hover{background:#22467c;transform:translateY(-1px)}
.wbx .wbx-nok{display:none;font:700 14px/1.5 'Inter',sans-serif;color:var(--grn)}
/* reveal */
.wbx .wbx-rv{opacity:0;transform:translateY(24px);transition:opacity .6s cubic-bezier(.2,.7,.2,1),transform .6s cubic-bezier(.2,.7,.2,1)}
.wbx .wbx-rv.in{opacity:1;transform:none}
@media(max-width:960px){
  .wbx .wbx-up,.wbx .wbx-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:720px){
  .wbx .wbx-feat{grid-template-columns:1fr;min-height:0}
  .wbx .wbx-feat-im{order:-1;height:190px;min-height:0}
  .wbx .wbx-feat-im::before{background:linear-gradient(0deg,var(--nv) 0%,transparent 55%)}
  .wbx .wbx-up,.wbx .wbx-grid{grid-template-columns:1fr}
  .wbx .wbx-nform{width:100%}
}
@media(prefers-reduced-motion:reduce){
  .wbx .wbx-rv{opacity:1!important;transform:none!important;transition:none}
  .wbx .wbx-card,.wbx .wbx-ucard,.wbx .wbx-cim img{transition:none}
  .wbx .wbx-badge.live i{animation:none}
}
</style>

<div class="wbx">
  <main class="wbx-wrap">

    <header class="wbx-rv in">
      <h1>Webinars &amp; Live Sessions</h1>
      <p class="wbx-sub">Join live sessions with admissions leaders and AI experts - or catch up on demand, whenever it suits you.</p>
    </header>

    <?php if (!$next && !$upcoming && !$ondemand) : ?>
      <p style="color:#5a6b85;font-size:16px">No webinars published yet — check back soon.</p>
    <?php endif; ?>

    <?php if ($next) : ?>
    <section class="wbx-rv" aria-label="Next session">
      <a class="wbx-feat" href="<?php echo esc_url($next['reg']); ?>">
        <div class="wbx-feat-tx">
          <?php if ($next['live']) : ?>
            <span class="wbx-badge live"><i aria-hidden="true"></i>Live Now</span>
          <?php else : ?>
            <span class="wbx-badge">Next Session</span>
          <?php endif; ?>
          <h2><?php echo esc_html($next['title']); ?></h2>
          <p><?php echo esc_html($next['sub']); ?></p>
          <div class="wbx-meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></svg><?php echo esc_html($next['date']); ?></span>
            <?php if ($next['time']) : ?><span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg><?php echo esc_html($next['time']); ?> <small><?php echo esc_html($next['tz']); ?></small></span><?php endif; ?>
            <?php if ($next['speaker']) : ?><span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg><?php echo esc_html($next['speaker']); ?><?php if ($next['role']) : ?>&nbsp;<small>&middot; <?php echo esc_html($next['role']); ?></small><?php endif; ?></span><?php endif; ?>
          </div>
          <span class="wbx-cta"><?php echo esc_html($next['cta'] ?: 'Register Free'); ?>
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
          </span>
        </div>
        <div class="wbx-feat-im<?php echo $next['img'] ? '' : ' noimg'; ?>">
          <?php if ($next['img']) : ?><img src="<?php echo esc_url($next['img']); ?>" alt="<?php echo esc_attr($next['title']); ?>" loading="eager" decoding="async"><?php endif; ?>
        </div>
      </a>
    </section>
    <?php endif; ?>

    <?php if ($upcoming) : ?>
    <section class="wbx-rv" aria-label="Upcoming webinars">
      <h3 class="wbx-sec">Upcoming Webinars</h3>
      <div class="wbx-up">
        <?php foreach ($upcoming as $w) : ?>
        <a class="wbx-ucard" href="<?php echo esc_url($w['reg']); ?>">
          <div class="wbx-uhead">
            <span class="wbx-datebox"><b><?php echo esc_html($w['day']); ?></b><span><?php echo esc_html($w['mon']); ?></span></span>
            <span class="wbx-type<?php echo $w['live'] ? ' live' : ''; ?>"><?php echo $w['live'] ? 'Live Now' : 'Webinar'; ?></span>
          </div>
          <h4><?php echo esc_html($w['title']); ?></h4>
          <p class="wbx-usub"><?php echo esc_html($w['sub']); ?></p>
          <?php if ($w['speaker']) : ?>
          <div class="wbx-spk"><?php echo esc_html($w['speaker']); ?><?php if ($w['role']) : ?><small><?php echo esc_html($w['role']); ?></small><?php endif; ?></div>
          <?php endif; ?>
          <div class="wbx-ufoot">
            <span class="wbx-when"><?php echo esc_html($w['date']); ?><?php echo $w['time'] ? ' &bull; ' . esc_html($w['time']) . ' ' . esc_html($w['tz']) : ''; ?></span>
            <span class="wbx-reg">Register
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
            </span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>

    <?php if ($ondemand) : ?>
    <section class="wbx-rv" aria-label="On-demand webinars">
      <h3 class="wbx-sec">Watch On Demand</h3>
      <div class="wbx-grid" id="wbxGrid">
        <?php foreach ($ondemand as $w) : ?>
        <a class="wbx-card" href="<?php echo esc_url($w['url']); ?>">
          <div class="wbx-cim">
            <?php if ($w['img']) : ?><img src="<?php echo esc_url($w['img']); ?>" alt="<?php echo esc_attr($w['title']); ?>" loading="lazy" decoding="async"><?php endif; ?>
            <span class="wbx-play" aria-hidden="true"><i><svg viewBox="0 0 24 24"><path d="M8 5l12 7-12 7V5z"/></svg></i></span>
          </div>
          <div class="wbx-cbody">
            <span class="wbx-klabel">On-Demand Webinar</span>
            <h4><?php echo esc_html($w['title']); ?></h4>
            <p><?php echo esc_html($w['sub']); ?></p>
            <div class="wbx-cfoot">
              <span><?php echo esc_html($w['date']); ?><?php echo $w['speaker'] ? ' &bull; ' . esc_html($w['speaker']) : ''; ?></span>
              <span class="wbx-watch">Watch Recording
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg>
              </span>
            </div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <nav class="wbx-pag" id="wbxPag" aria-label="Webinar pages"></nav>
    </section>
    <?php endif; ?>

    <section class="wbx-news wbx-rv" aria-label="Subscribe">
      <div>
        <h3>Never miss a session</h3>
        <p>Get upcoming webinar invites and fresh recordings straight to your inbox.</p>
      </div>
      <form class="wbx-nform" id="wbxNews" novalidate>
        <input type="email" required placeholder="Your work email" aria-label="Your work email">
        <button type="submit">Notify Me</button>
        <span class="wbx-nok" id="wbxNok">&#10003; You&rsquo;re on the list - see you at the next session.</span>
      </form>
    </section>

  </main>
</div>

<script>
(function(){
  var root=document.querySelector('.wbx'); if(!root) return;
  /* On-demand pager - 6 cards per page, URL stays /webinars/ */
  (function(){
    var grid=document.getElementById('wbxGrid'), pag=document.getElementById('wbxPag');
    if(!grid||!pag) return;
    var cards=[].slice.call(grid.querySelectorAll('.wbx-card'));
    var PER=6, pages=Math.ceil(cards.length/PER), cur=1;
    if(pages<=1){ pag.style.display='none'; return; }
    function show(p){
      cur=Math.min(Math.max(1,p),pages);
      cards.forEach(function(c,i){ c.classList.toggle('wbx-hide', Math.floor(i/PER)+1!==cur); });
      render();
      grid.parentElement.scrollIntoView({behavior:'smooth',block:'start'});
    }
    function btn(label,go,extra,disabled){
      var b=document.createElement('button'); b.type='button';
      b.className='wbx-pg'+(extra||''); b.innerHTML=label;
      if(disabled){ b.disabled=true; b.style.opacity='.4'; b.style.cursor='default'; }
      else b.addEventListener('click',function(){ show(go); });
      return b;
    }
    function render(){
      pag.innerHTML='';
      pag.appendChild(btn('&larr;',cur-1,' wbx-pg-arr',cur===1));
      for(var p=1;p<=pages;p++){
        var b=btn(String(p),p,cur===p?' on':'',false);
        if(cur===p)b.setAttribute('aria-current','page');
        pag.appendChild(b);
      }
      pag.appendChild(btn('&rarr;',cur+1,' wbx-pg-arr',cur===pages));
    }
    cards.forEach(function(c,i){ c.classList.toggle('wbx-hide', i>=PER); });
    render();
  })();
  /* subscribe */
  var nf=document.getElementById('wbxNews');
  if(nf)nf.addEventListener('submit',function(e){
    e.preventDefault();
    var em=nf.querySelector('input');
    if(!em.value||em.value.indexOf('@')===-1){em.focus();return;}
    em.style.display='none'; nf.querySelector('button').style.display='none';
    document.getElementById('wbxNok').style.display='inline-flex';
  });
  /* reveal */
  var rv=[].slice.call(root.querySelectorAll('.wbx-rv'));
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}});},{threshold:.1,rootMargin:'0px 0px -6%'});
    rv.forEach(function(el){io.observe(el);});
  } else { rv.forEach(function(el){el.classList.add('in');}); }
})();
</script>

<?php get_footer(); ?>
