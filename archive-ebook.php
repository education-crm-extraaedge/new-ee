<?php
/**
 * archive-ebook.php — /ebooks/ Resource Library landing.
 * Standalone full HTML document (no site header / footer).
 * Dynamically renders the ebook CPT grid with format filters.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

$q = new WP_Query(array(
    'post_type'      => 'ebook',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
));

$books = array();
$totals = array('ebook' => 0, 'guide' => 0, 'report' => 0, 'tool' => 0);
if ($q->have_posts()) {
    while ($q->have_posts()) { $q->the_post();
        $pid     = get_the_ID();
        $fmt_raw = get_post_meta($pid, '_ee_ebook_format', true) ?: 'ebook';
        $fmt     = strtolower($fmt_raw);
        $bucket  = in_array($fmt, array('tool','toolkit','checklist'), true) ? 'tool' : (in_array($fmt, array('guide'), true) ? 'guide' : (in_array($fmt, array('report'), true) ? 'report' : 'ebook'));
        $topic   = get_post_meta($pid, '_ee_ebook_topic', true) ?: 'Admissions';
        $color   = get_post_meta($pid, '_ee_ebook_cover_color', true) ?: 'blue';
        $rt_raw  = get_post_meta($pid, '_ee_ebook_read_time', true);
        $rt_num  = $rt_raw ? $rt_raw : (max(1, (int) round(str_word_count(wp_strip_all_tags(get_the_content())) / 220)) . ' min');
        if (stripos($rt_num, 'read') === false) $rt_num .= ' read';
        $desc = get_post_meta($pid, '_ee_ebook_short_desc', true);
        if (!$desc) $desc = get_the_excerpt() ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 22);
        $books[] = array(
            'id'    => $pid,
            'title' => get_the_title(),
            'link'  => get_permalink(),
            'fmt'   => $bucket,
            'fmt_lab' => ucfirst($fmt_raw),
            'topic' => $topic,
            'color' => in_array($color, array('blue','orange','light'), true) ? $color : 'blue',
            'rt'    => $rt_num,
            'desc'  => $desc,
        );
        if (isset($totals[$bucket])) $totals[$bucket]++;
    }
    wp_reset_postdata();
}
$total = count($books);

$icons_by_fmt = array(
    'ebook'  => '<circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
    'guide'  => '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
    'report' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>',
    'tool'   => '<path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>',
);

$site_name = get_bloginfo('name');
$page_title = 'Resource Library — ' . $site_name;
$page_desc  = 'Free, research-backed e-books, guides, reports & tools for admissions, SEO, marketing and enrolment teams.';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
<title><?php echo esc_html($page_title); ?></title>
<meta name="description" content="<?php echo esc_attr($page_desc); ?>">
<link rel="canonical" href="<?php echo esc_url(get_post_type_archive_link('ebook')); ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo esc_attr($page_title); ?>">
<meta property="og:description" content="<?php echo esc_attr($page_desc); ?>">
<meta property="og:url" content="<?php echo esc_url(get_post_type_archive_link('ebook')); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --orange:#DE6E30; --orange-700:#C25A22; --orange-100:#FBE6D6; --orange-50:#FDF3EC;
    --blue:#19335D; --blue-700:#122845; --blue-900:#0C1B33; --blue-100:#E6ECF5; --blue-50:#F4F7FB;
    --ink:#0B1A33; --muted:#54627A; --muted-2:#8A97AC;
    --line:#E6EBF2; --line-strong:#D2DCE8; --paper:#FFFFFF;
    --mono:'IBM Plex Mono', ui-monospace, monospace;
    --sans:'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    --ease:cubic-bezier(.2,.7,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  }
  *{box-sizing:border-box}
  html{scroll-behavior:smooth}
  body{margin:0;background:var(--paper);color:var(--ink);font-family:var(--sans);line-height:1.5;-webkit-font-smoothing:antialiased;overflow-x:hidden}
  a{text-decoration:none;color:inherit}
  button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit}
  .tnum{font-variant-numeric:tabular-nums}
  .wrap{max-width:1200px;margin:0 auto;padding:0 40px;position:relative}

  /* Minimal page-local navbar (no site header) */
  .eb-topbar{position:sticky;top:0;z-index:30;background:rgba(255,255,255,.94);backdrop-filter:blur(12px);border-bottom:1px solid var(--line)}
  .eb-topbar-in{max-width:1200px;margin:0 auto;padding:14px 40px;display:flex;align-items:center;justify-content:space-between;gap:16px}
  .eb-brand{display:flex;align-items:center;gap:10px;font-weight:700;color:var(--ink);font-size:16px;letter-spacing:-.01em}
  .eb-brand-dot{width:28px;height:28px;border-radius:7px;background:var(--orange);color:#fff;display:grid;place-items:center;font-weight:800;font-size:13px}
  .eb-back{font-family:var(--mono);font-size:12px;color:var(--muted);letter-spacing:.06em;text-transform:uppercase}
  .eb-back:hover{color:var(--orange)}

  .grain{position:fixed;inset:0;z-index:1;pointer-events:none;opacity:.022;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")}
  .dotgrid{position:absolute;inset:0;z-index:0;pointer-events:none;background-image:radial-gradient(circle at 1px 1px, rgba(25,51,93,.07) 1px, transparent 0);background-size:26px 26px;mask-image:linear-gradient(180deg,#000,transparent 22%);-webkit-mask-image:linear-gradient(180deg,#000,transparent 22%)}

  .section{position:relative;z-index:2;padding:56px 0 110px}

  .kicker{font-family:var(--mono);font-size:11px;font-weight:500;letter-spacing:.22em;text-transform:uppercase;color:var(--orange);display:inline-flex;align-items:center;gap:10px}
  .kicker::before{content:"";width:18px;height:1px;background:var(--orange)}
  .ed-head{display:grid;grid-template-columns:1.15fr .85fr;gap:48px;align-items:end;padding-bottom:32px;border-bottom:1px solid var(--line);position:relative}
  .ed-head::before,.ed-head::after{content:"";position:absolute;bottom:-1px;width:10px;height:10px}
  .ed-head::before{left:0;border-left:1px solid var(--orange);border-bottom:1px solid var(--orange)}
  .ed-head::after{right:0;border-right:1px solid var(--orange);border-bottom:1px solid var(--orange)}
  .ed-title{font-size:clamp(34px,4.4vw,54px);line-height:1.03;font-weight:700;letter-spacing:-.035em;margin:18px 0 0;color:var(--ink)}
  .ed-title em{font-style:normal;color:var(--orange)}
  .ed-aside{padding-bottom:6px}
  .ed-aside p{font-size:16px;line-height:1.6;color:var(--muted);margin:0}
  .ed-aside .meta{margin-top:18px;display:flex;gap:26px;font-family:var(--mono)}
  .ed-aside .meta span{display:flex;flex-direction:column;gap:3px}
  .ed-aside .meta b{font-size:20px;font-weight:600;letter-spacing:-.02em;color:var(--ink)}
  .ed-aside .meta i{font-style:normal;color:var(--muted-2);font-size:10px;letter-spacing:.12em;text-transform:uppercase}

  .filterbar{margin-top:48px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;border-bottom:1px solid var(--line)}
  .tabs{display:flex;gap:2px;flex-wrap:wrap}
  .tab{position:relative;display:inline-flex;align-items:baseline;gap:7px;padding:14px 16px;font-size:13.5px;font-weight:600;color:var(--muted);transition:color .25s var(--ease)}
  .tab .count{font-family:var(--mono);font-size:11px;color:var(--muted-2);transition:color .25s var(--ease)}
  .tab::after{content:"";position:absolute;left:16px;right:16px;bottom:-1px;height:2px;background:var(--orange);transform:scaleX(0);transform-origin:left;transition:transform .3s var(--ease-out)}
  .tab:hover{color:var(--ink)}
  .tab.active{color:var(--ink)}
  .tab.active .count{color:var(--orange)}
  .tab.active::after{transform:scaleX(1)}
  .result-count{font-family:var(--mono);font-size:12px;color:var(--muted);letter-spacing:.04em;padding:10px 0}
  .result-count b{color:var(--ink)}

  .eb-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:44px}
  .ebook{border:1px solid var(--line-strong);border-radius:16px;overflow:hidden;background:var(--paper);display:flex;flex-direction:column;position:relative;transition:border-color .3s var(--ease), transform .4s var(--ease-out), box-shadow .4s var(--ease-out)}
  .ebook.hidden{display:none}
  .ebook:hover{border-color:var(--orange);transform:translateY(-6px);box-shadow:0 26px 50px -26px rgba(11,26,51,.3), 0 4px 12px -6px rgba(11,26,51,.1)}

  .eb-cover{position:relative;aspect-ratio:16/11;overflow:hidden;display:flex;align-items:center;justify-content:center;background:linear-gradient(165deg,#EDF2F9,#FBFCFE);border-bottom:1px solid var(--line);perspective:900px}
  .eb-cover::after{content:"";position:absolute;inset:0;background-image:radial-gradient(circle at 1px 1px, rgba(25,51,93,.06) 1px, transparent 0);background-size:18px 18px;opacity:.55}
  .eb-book{position:relative;z-index:1;width:132px;aspect-ratio:3/4;border-radius:3px 8px 8px 3px;padding:15px 15px 13px;display:flex;flex-direction:column;justify-content:space-between;color:#fff;overflow:hidden;box-shadow:0 22px 34px -14px rgba(11,26,51,.45), 0 2px 6px rgba(11,26,51,.2);transform:rotate(-3deg);transition:transform .55s var(--ease-out), box-shadow .55s var(--ease-out)}
  .ebook:hover .eb-book{transform:rotate(0deg) translateY(-5px) scale(1.05);box-shadow:0 32px 46px -16px rgba(11,26,51,.5)}
  .eb-book::before{content:"";position:absolute;left:0;top:0;bottom:0;width:7px;background:linear-gradient(90deg,rgba(0,0,0,.24),rgba(0,0,0,.03))}
  .eb-book::after{content:"";position:absolute;right:0;top:0;bottom:0;width:2px;background:rgba(255,255,255,.16)}
  .eb-book.blue{background:linear-gradient(150deg,var(--blue-900),var(--blue))}
  .eb-book.orange{background:linear-gradient(150deg,#A8480F,var(--orange))}
  .eb-book.light{background:linear-gradient(155deg,#fff,#E3EBF6);color:var(--blue)}
  .eb-book.light::before{background:linear-gradient(90deg,rgba(25,51,93,.16),rgba(25,51,93,.02))}
  .bk-fmt{font-family:var(--mono);font-size:8px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;opacity:.85}
  .bk-ico{align-self:center;opacity:.95}
  .bk-foot{display:flex;flex-direction:column;gap:6px}
  .bk-foot .ln{height:2px;width:24px;background:var(--orange);border-radius:2px}
  .bk-brand{font-family:var(--mono);font-size:7.5px;letter-spacing:.16em;text-transform:uppercase;opacity:.82}

  .eb-body{padding:20px 20px 20px;display:flex;flex-direction:column;gap:11px;flex:1}
  .eb-metarow{display:flex;align-items:center;gap:9px;font-family:var(--mono);font-size:10.5px;color:var(--muted-2);letter-spacing:.04em}
  .eb-metarow .topic{color:var(--orange);text-transform:uppercase;letter-spacing:.1em;font-weight:500}
  .eb-metarow .sep{width:3px;height:3px;border-radius:999px;background:var(--line-strong)}
  .eb-title{margin:0;font-size:16.5px;font-weight:600;letter-spacing:-.01em;line-height:1.3;color:var(--ink);display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;min-height:43px}
  .eb-desc{margin:0;font-size:13px;line-height:1.55;color:var(--muted);display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
  .eb-dl{margin-top:auto;display:flex;align-items:center;justify-content:center;gap:9px;padding:11px;border:1px solid var(--line-strong);border-radius:9px;font-family:var(--mono);font-size:12px;font-weight:500;letter-spacing:.06em;text-transform:uppercase;color:var(--ink);transition:all .3s var(--ease)}
  .eb-dl .ic{color:var(--orange);transition:transform .3s var(--ease-out)}
  .ebook:hover .eb-dl{background:var(--orange);border-color:var(--orange);color:#fff}
  .ebook:hover .eb-dl .ic{color:#fff;transform:scale(1.1)}

  .empty{padding:60px 24px;text-align:center;color:var(--muted);font-size:15px;border:1px dashed var(--line-strong);border-radius:14px;margin-top:30px}

  .reveal{opacity:0;transform:translateY(20px);transition:opacity .7s var(--ease-out), transform .7s var(--ease-out)}
  .reveal.in{opacity:1;transform:none}

  .toast{position:fixed;bottom:26px;left:50%;transform:translateX(-50%) translateY(140%);background:var(--ink);color:#fff;padding:13px 20px;border-radius:12px;font-family:var(--mono);font-size:12.5px;letter-spacing:.02em;box-shadow:0 24px 50px -16px rgba(11,26,51,.5);z-index:80;display:flex;align-items:center;gap:10px;transition:transform .45s var(--ease-out)}
  .toast.visible{transform:translateX(-50%) translateY(0)}
  .toast .tk{color:var(--orange)}

  .eb-footer{padding:30px 40px;text-align:center;font-family:var(--mono);font-size:11.5px;color:var(--muted-2);letter-spacing:.06em;text-transform:uppercase;border-top:1px solid var(--line)}
  .eb-footer a{color:var(--ink)}

  @media (max-width:1080px){
    .ed-head{grid-template-columns:1fr;gap:22px;align-items:start}
    .eb-grid{grid-template-columns:repeat(2,1fr)}
  }
  @media (max-width:720px){
    .wrap, .eb-topbar-in{padding-left:22px;padding-right:22px}
    .section{padding:36px 0 72px}
    .eb-grid{grid-template-columns:1fr}
    .tabs{overflow-x:auto;flex-wrap:nowrap;width:100%;scrollbar-width:none}
    .tabs::-webkit-scrollbar{display:none}
    .filterbar{flex-direction:column;align-items:stretch}
  }
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class('ee-ebook-archive'); ?>>
<div class="grain"></div>

<header class="eb-topbar">
  <div class="eb-topbar-in">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="eb-brand">
      <span class="eb-brand-dot">E</span> ExtraaEdge
    </a>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="eb-back">← Back to site</a>
  </div>
</header>

<section class="section" id="ebooks">
  <div class="dotgrid"></div>
  <div class="wrap">

    <header class="ed-head reveal">
      <div>
        <span class="kicker">Resource Library</span>
        <h1 class="ed-title">E-Books, guides &amp;<br><em>reports worth keeping.</em></h1>
      </div>
      <div class="ed-aside">
        <p>Free, research-backed resources to sharpen your SEO, marketing, and admissions funnel — written for teams that need results this intake.</p>
        <div class="meta tnum">
          <span><b><?php echo (int) $total; ?></b><i>Resources</i></span>
          <span><b>100%</b><i>Free</i></span>
          <span><b>PDF</b><i>Instant</i></span>
        </div>
      </div>
    </header>

    <div class="filterbar reveal">
      <div class="tabs" role="tablist">
        <button class="tab active" data-filter="all">All <span class="count tnum"><?php echo str_pad((string) $total, 2, '0', STR_PAD_LEFT); ?></span></button>
        <button class="tab" data-filter="ebook">Ebooks <span class="count tnum"><?php echo str_pad((string) $totals['ebook'], 2, '0', STR_PAD_LEFT); ?></span></button>
        <button class="tab" data-filter="guide">Guides <span class="count tnum"><?php echo str_pad((string) $totals['guide'], 2, '0', STR_PAD_LEFT); ?></span></button>
        <button class="tab" data-filter="report">Reports <span class="count tnum"><?php echo str_pad((string) $totals['report'], 2, '0', STR_PAD_LEFT); ?></span></button>
        <button class="tab" data-filter="tool">Tools <span class="count tnum"><?php echo str_pad((string) $totals['tool'], 2, '0', STR_PAD_LEFT); ?></span></button>
      </div>
      <div class="result-count tnum">SHOWING <b id="visibleCount"><?php echo (int) $total; ?></b> / <?php echo (int) $total; ?></div>
    </div>

    <?php if (!$total): ?>
      <div class="empty">No e-books published yet. Add one from <strong>WP Admin → E-books → Add New</strong>.</div>
    <?php else: ?>
    <div class="eb-grid" id="ebGrid">
      <?php foreach ($books as $b):
            $svg = isset($icons_by_fmt[$b['fmt']]) ? $icons_by_fmt[$b['fmt']] : $icons_by_fmt['ebook']; ?>
        <article class="ebook reveal" data-format="<?php echo esc_attr($b['fmt']); ?>">
          <a class="eb-cover" href="<?php echo esc_url($b['link']); ?>" aria-label="Open <?php echo esc_attr($b['title']); ?>">
            <div class="eb-book <?php echo esc_attr($b['color']); ?>">
              <span class="bk-fmt"><?php echo esc_html($b['fmt_lab']); ?></span>
              <span class="bk-ico"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $svg; ?></svg></span>
              <span class="bk-foot"><span class="ln"></span><span class="bk-brand"><?php echo esc_html($site_name); ?></span></span>
            </div>
          </a>
          <div class="eb-body">
            <div class="eb-metarow"><span class="topic"><?php echo esc_html($b['topic']); ?></span><span class="sep"></span><span><?php echo esc_html($b['rt']); ?></span></div>
            <h4 class="eb-title"><a href="<?php echo esc_url($b['link']); ?>"><?php echo esc_html($b['title']); ?></a></h4>
            <p class="eb-desc"><?php echo esc_html(wp_strip_all_tags($b['desc'])); ?></p>
            <a class="eb-dl" href="<?php echo esc_url($b['link']); ?>"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg></span>View Insights</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div>
</section>

<footer class="eb-footer">
  © <?php echo (int) date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($site_name); ?></a> · All resources free for educational use
</footer>

<div class="toast" id="toast"><span class="tk">→</span><span id="toastMsg">Ready</span></div>

<script>
(() => {
  const revObs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting){ e.target.classList.add('in'); revObs.unobserve(e.target); } });
  }, { threshold: .12 });
  document.querySelectorAll('.reveal').forEach(el => revObs.observe(el));

  const toast = document.getElementById('toast');
  const toastMsg = document.getElementById('toastMsg');
  function showToast(msg){
    if (!toast) return;
    toastMsg.textContent = msg;
    toast.classList.add('visible');
    clearTimeout(showToast._t);
    showToast._t = setTimeout(() => toast.classList.remove('visible'), 2200);
  }

  const tabs = document.querySelectorAll('.tab');
  const books = document.querySelectorAll('.ebook');
  const visibleCountEl = document.getElementById('visibleCount');
  tabs.forEach(tab => tab.addEventListener('click', () => {
    tabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    const f = tab.dataset.filter;
    let n = 0;
    books.forEach(b => {
      const show = f === 'all' || b.dataset.format === f;
      b.classList.toggle('hidden', !show);
      if (show) n++;
    });
    if (visibleCountEl) visibleCountEl.textContent = n;
  }));
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
