<?php
/**
 * page-solution.php — Custom landing for /solution/.
 * Wired up via the template_redirect override in functions.php.
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    $title = 'Admissions Platform — Solutions | ExtraaEdge';
    $desc  = 'Purpose-built solutions for every stage of admissions — from first inquiry to enrollment confirmation. Admission management, study abroad, recruitment & lead nurturing.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/solution/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">' . "\n";
}, 5);

/* Resolve a solutions-grid card to a real published post so clicks never
   fall into WP's 404 redirect-guesser. Tries the solution CPT first, then
   a page, then any product/use_case with the same slug; if nothing exists
   the card safely stays on /solutions/. */
if (!function_exists('ee_sol_find_url')) {
    function ee_sol_find_url(array $slugs) {
        foreach (array('solution', 'page', 'product', 'use_case') as $pt) {
            foreach ($slugs as $slug) {
                $found = get_posts(array(
                    'name'        => $slug,
                    'post_type'   => $pt,
                    'post_status' => 'publish',
                    'numberposts' => 1,
                ));
                if ($found) return get_permalink($found[0]);
            }
        }
        return home_url('/solutions/');
    }
}

get_header();
?>
<!-- ee-solutions-tpl v2026-07-22-cardlinks -->
<style>
.ee-sol{
  --orange:#DE6E30;--orange-2:#c8601f;--orange-soft:#FBE6D6;--orange-50:#FFF6EE;--orange-glow:rgba(222,110,48,.18);
  --blue:#19335D;--blue-2:#0F2243;--blue-soft:#E8EEF8;--blue-50:#F4F7FC;--blue-glow:rgba(25,51,93,.16);
  --ink:#0B1A33;--ink-2:#3A4A66;--muted:#6B7A93;--muted-2:#94A0B5;
  --line:#E7ECF3;--line-2:#F1F4F9;--white:#FFFFFF;--green:#16a34a;--green-soft:#DCFCE7;
  --radius-sm:8px;--radius:14px;--radius-lg:20px;--radius-xl:28px;
  --shadow-sm:0 1px 2px rgba(15,34,67,.05),0 1px 1px rgba(15,34,67,.03);
  --shadow:0 1px 2px rgba(15,34,67,.05),0 8px 24px -8px rgba(15,34,67,.08);
  --shadow-md:0 1px 2px rgba(15,34,67,.06),0 18px 40px -12px rgba(15,34,67,.14);
  --shadow-lg:0 30px 60px -24px rgba(15,34,67,.22),0 8px 20px -8px rgba(15,34,67,.10);
  --ease:cubic-bezier(.2,.7,.2,1);
  font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;color:var(--ink);-webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility;line-height:1.5
}
.ee-sol *,.ee-sol *::before,.ee-sol *::after{box-sizing:border-box}
.ee-sol a{text-decoration:none;color:inherit}
.ee-sol button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit}
.ee-sol .wrap{max-width:1240px;margin:0 auto;padding:0 32px;position:relative}

.ee-sol .section{padding:96px 0;position:relative;background:#fff}
.ee-sol .section-head{text-align:center;max-width:760px;margin:0 auto 40px}
.ee-sol .section-eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--orange);margin-bottom:14px}
.ee-sol .section-eyebrow::before,.ee-sol .section-eyebrow::after{content:"";display:inline-block;width:24px;height:2px;background:var(--orange);vertical-align:middle;border-radius:1px}
.ee-sol .section-eyebrow::before{margin-right:10px}.ee-sol .section-eyebrow::after{margin-left:10px}
.ee-sol .section-title{font-size:44px;line-height:1.1;font-weight:700;letter-spacing:-.022em;color:var(--ink);margin:0 0 14px}
.ee-sol .section-sub{font-size:17px;line-height:1.6;color:var(--ink-2);margin:0}

.ee-sol .controls{display:flex;align-items:center;gap:16px;flex-wrap:wrap;background:#fff;border:1px solid var(--line);border-radius:18px;padding:10px;box-shadow:var(--shadow-sm);margin-bottom:48px}
.ee-sol .tabs{display:flex;align-items:center;gap:4px;background:var(--blue-50);padding:4px;border-radius:12px;flex-shrink:0}
.ee-sol .tab{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border-radius:9px;font-size:13px;font-weight:600;color:var(--ink-2);transition:all .2s var(--ease);position:relative;white-space:nowrap}
.ee-sol .tab .count{background:rgba(25,51,93,.08);padding:2px 7px;border-radius:999px;font-size:11px;font-weight:600;color:var(--blue);transition:all .2s var(--ease)}
.ee-sol .tab:hover{color:var(--ink)}
.ee-sol .tab.active{background:#fff;color:var(--blue);box-shadow:var(--shadow-sm)}
.ee-sol .tab.active .count{background:var(--orange);color:#fff}
.ee-sol .result-count{font-size:13px;color:var(--muted);font-weight:500;flex-shrink:0;padding:0 10px;margin-left:auto}
.ee-sol .result-count strong{color:var(--ink);font-weight:600}

.ee-sol .category-block{margin-bottom:56px;transition:opacity .35s var(--ease),transform .35s var(--ease)}
.ee-sol .category-block:last-child{margin-bottom:0}
.ee-sol .category-block.hidden{display:none}
.ee-sol .cat-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;padding-bottom:20px;border-bottom:1px solid var(--line);gap:20px;flex-wrap:wrap}
.ee-sol .cat-header .left{display:flex;align-items:center;gap:16px;min-width:0}
.ee-sol .cat-num{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,var(--blue),#2a4d7a);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;flex-shrink:0;box-shadow:0 8px 20px -8px var(--blue-glow)}
.ee-sol .cat-header h3{margin:0;font-size:22px;font-weight:700;color:var(--ink);letter-spacing:-.01em}
.ee-sol .cat-header .desc{font-size:13px;color:var(--muted);margin-top:2px}
.ee-sol .cat-header .right{display:flex;align-items:center;gap:14px;color:var(--muted);font-size:13px;font-weight:500}
.ee-sol .cat-header .right strong{color:var(--ink);font-weight:600}

.ee-sol .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.ee-sol .cards.col-4{grid-template-columns:repeat(4,1fr)}
.ee-sol .card{position:relative;background:#fff;border:1px solid var(--line);border-radius:var(--radius-lg);padding:24px 24px 20px;transition:all .35s var(--ease);overflow:hidden;isolation:isolate;display:flex;flex-direction:column;gap:16px;cursor:pointer}
.ee-sol .card::before{content:"";position:absolute;inset:auto -40% -60% auto;width:240px;height:240px;border-radius:999px;background:radial-gradient(circle,var(--orange-glow),transparent 65%);opacity:0;transition:opacity .4s var(--ease);z-index:-1}
.ee-sol .card:hover{transform:translateY(-4px);border-color:#D6DEEB;box-shadow:var(--shadow-md)}
.ee-sol .card:hover::before{opacity:1}
.ee-sol .card:hover .card-cta{color:var(--orange)}
.ee-sol .card:hover .card-cta svg{transform:translateX(3px)}
.ee-sol .card.hidden{display:none}
.ee-sol .card.featured{border-color:var(--orange-soft);background:linear-gradient(180deg,#FFFAF6 0%,#fff 60%)}
.ee-sol .card-top{display:flex;align-items:flex-start;justify-content:space-between;gap:12px}
/* Card icons sit flat on the card — no floating tile behind the image. */
.ee-sol .card-ico{width:48px;height:48px;background:transparent;border:0;display:flex;align-items:center;justify-content:center;color:var(--blue);flex-shrink:0}
.ee-sol .card-ico svg{width:28px;height:28px}
.ee-sol .card.accent .card-ico{color:var(--orange)}
.ee-sol .badge{display:inline-flex;align-items:center;gap:5px;padding:4px 9px;border-radius:999px;font-size:10.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;flex-shrink:0}
.ee-sol .badge.popular{background:var(--orange-soft);color:var(--orange)}
.ee-sol .badge.new{background:var(--green-soft);color:var(--green)}
.ee-sol .badge.enterprise{background:var(--blue-soft);color:var(--blue)}
.ee-sol .badge.ai{background:linear-gradient(135deg,#fff,#fff) padding-box,linear-gradient(135deg,var(--orange),var(--blue)) border-box;border:1px solid transparent;color:var(--ink)}
.ee-sol .badge.ai::before{content:"";width:6px;height:6px;border-radius:999px;background:linear-gradient(135deg,var(--orange),var(--blue))}
.ee-sol .card h4{margin:0 0 6px;font-size:17px;font-weight:600;color:var(--ink);letter-spacing:-.005em;line-height:1.3}
.ee-sol .card p.lead{margin:0;font-size:13.5px;line-height:1.55;color:var(--ink-2)}
.ee-sol .features-row{display:flex;flex-wrap:wrap;gap:6px;margin-top:auto}
.ee-sol .feat{display:inline-flex;align-items:center;gap:5px;padding:4px 9px;border-radius:7px;background:var(--blue-50);font-size:11.5px;font-weight:500;color:var(--blue)}
.ee-sol .feat svg{flex-shrink:0;opacity:.7}
.ee-sol .card-bottom{display:flex;align-items:center;justify-content:space-between;padding-top:14px;border-top:1px solid var(--line-2);gap:8px}
.ee-sol .card-cta{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:var(--blue);transition:color .25s var(--ease)}
.ee-sol .card-cta svg{transition:transform .25s var(--ease)}

.ee-sol .help-card{margin-top:48px;background:linear-gradient(135deg,var(--blue-50),#fff);border:1px solid var(--line);border-radius:var(--radius-xl);padding:28px 32px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;position:relative;overflow:hidden}
.ee-sol .help-card::after{content:"";position:absolute;top:-50%;right:-10%;width:300px;height:300px;border-radius:999px;background:radial-gradient(circle,var(--orange-glow),transparent 65%);z-index:0}
.ee-sol .help-card > *{position:relative;z-index:1}
.ee-sol .help-card .ht{display:flex;align-items:center;gap:18px}
.ee-sol .help-card .hi{width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,var(--blue),#2a4d7a);color:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 24px -8px var(--blue-glow)}
.ee-sol .help-card h4{margin:0;font-size:18px;font-weight:700;color:var(--ink);letter-spacing:-.005em}
.ee-sol .help-card p{margin:4px 0 0;font-size:13.5px;color:var(--muted)}
.ee-sol .help-card .hcta{display:flex;gap:10px;flex-wrap:wrap}
.ee-sol .btn{display:inline-flex;align-items:center;gap:8px;padding:11px 18px;border-radius:10px;font-size:13.5px;font-weight:600;transition:all .25s var(--ease);border:1px solid transparent;white-space:nowrap}
.ee-sol .btn-primary{background:var(--orange);color:#fff;box-shadow:0 1px 0 rgba(255,255,255,.2) inset,0 8px 20px -10px rgba(222,110,48,.6)}
.ee-sol .btn-primary:hover{transform:translateY(-1px);background:var(--orange-2);color:#fff}
.ee-sol .btn-ghost{background:#fff;color:var(--blue);border-color:var(--line)}
.ee-sol .btn-ghost:hover{border-color:var(--blue);transform:translateY(-1px)}
.ee-sol .btn svg{transition:transform .25s var(--ease)}
.ee-sol .btn:hover svg{transform:translateX(2px)}

.ee-sol .stats{padding:96px 0 110px;background:radial-gradient(900px 500px at 80% 30%,rgba(222,110,48,.18),transparent 60%),radial-gradient(800px 400px at 10% 80%,rgba(255,255,255,.06),transparent 60%),linear-gradient(180deg,var(--blue) 0%,var(--blue-2) 100%);color:#fff;position:relative;overflow:hidden}
.ee-sol .stats::before{content:"";position:absolute;inset:0;background-image:linear-gradient(to right,rgba(255,255,255,.04) 1px,transparent 1px),linear-gradient(to bottom,rgba(255,255,255,.04) 1px,transparent 1px);background-size:80px 80px;mask-image:radial-gradient(ellipse 70% 70% at 50% 50%,#000 30%,transparent 80%);-webkit-mask-image:radial-gradient(ellipse 70% 70% at 50% 50%,#000 30%,transparent 80%)}
.ee-sol .stats-head{text-align:center;margin-bottom:56px;position:relative}
.ee-sol .stats-head .se{color:var(--orange);font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase}
.ee-sol .stats-head h2{font-size:40px;line-height:1.15;font-weight:700;letter-spacing:-.02em;color:#fff;margin:14px 0}
.ee-sol .stats-head p{font-size:16px;color:rgba(255,255,255,.7);max-width:600px;margin:0 auto;line-height:1.6}
.ee-sol .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;position:relative}
.ee-sol .stat{background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.02));border:1px solid rgba(255,255,255,.12);border-radius:var(--radius-lg);padding:28px 26px;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);position:relative;overflow:hidden;transition:all .3s var(--ease)}
.ee-sol .stat:hover{border-color:rgba(222,110,48,.4);transform:translateY(-3px)}
.ee-sol .stat::before{content:"";position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(255,255,255,.3),transparent)}
.ee-sol .stat .stat-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:18px}
.ee-sol .stat .si{width:42px;height:42px;border-radius:11px;background:rgba(222,110,48,.18);color:var(--orange);display:flex;align-items:center;justify-content:center;border:1px solid rgba(222,110,48,.3)}
.ee-sol .stat .trend{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;color:#fff;background:rgba(34,197,94,.18);padding:4px 8px;border-radius:6px;border:1px solid rgba(34,197,94,.3)}
.ee-sol .stat .num{font-size:42px;font-weight:700;line-height:1;letter-spacing:-.025em;color:#fff;display:flex;align-items:baseline;gap:3px}
.ee-sol .stat .num .suffix{font-size:22px;color:var(--orange);font-weight:600}
.ee-sol .stat .lab{font-size:13.5px;color:rgba(255,255,255,.78);margin-top:10px;font-weight:500}
.ee-sol .stat .desc{font-size:12px;color:rgba(255,255,255,.5);margin-top:6px;line-height:1.5}
.ee-sol .stat .spark{margin-top:14px;opacity:.85}

.ee-sol .trust{margin-top:64px;display:grid;grid-template-columns:repeat(3,1fr);gap:24px;position:relative}
.ee-sol .testimonial{background:linear-gradient(180deg,rgba(222,110,48,.12),rgba(222,110,48,.04));border:1px solid rgba(222,110,48,.25);border-radius:var(--radius-lg);padding:26px;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);display:flex;flex-direction:column;position:relative}
.ee-sol .testimonial .quote-mark{position:absolute;top:18px;right:22px;font-size:60px;line-height:1;color:rgba(222,110,48,.25);font-family:Georgia,serif}
.ee-sol .testimonial .tq{font-size:14.5px;line-height:1.55;color:#fff;margin:0 0 18px;font-weight:500;letter-spacing:-.005em;flex:1}
.ee-sol .testimonial .ta{display:flex;align-items:center;gap:12px;padding-top:16px;border-top:1px solid rgba(255,255,255,.1)}
.ee-sol .testimonial .tav{width:38px;height:38px;border-radius:999px;background:linear-gradient(135deg,var(--orange),#f29654);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0}
.ee-sol .testimonial .tn{font-size:13px;font-weight:600;color:#fff}
.ee-sol .testimonial .tr{font-size:11.5px;color:rgba(255,255,255,.6);margin-top:1px}

.ee-sol .toast{position:fixed;bottom:24px;right:24px;background:var(--ink);color:#fff;padding:12px 18px;border-radius:12px;font-size:13px;font-weight:500;transform:translateY(120%);opacity:0;transition:all .35s var(--ease);box-shadow:0 20px 40px -10px rgba(15,34,67,.4);z-index:60;display:flex;align-items:center;gap:10px}
.ee-sol .toast.visible{transform:translateY(0);opacity:1}

@media (max-width:1100px){.ee-sol .section-title{font-size:36px}.ee-sol .cards,.ee-sol .cards.col-4{grid-template-columns:repeat(2,1fr)}}
@media (max-width:900px){.ee-sol .stats-grid{grid-template-columns:repeat(2,1fr)}.ee-sol .controls{padding:8px;flex-direction:column;align-items:stretch;gap:10px}.ee-sol .tabs{order:1;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch}.ee-sol .tabs::-webkit-scrollbar{display:none}.ee-sol .result-count{order:2;text-align:center;padding:4px 0;margin-left:0}.ee-sol .section{padding:72px 0}.ee-sol .stats{padding:72px 0 80px}.ee-sol .trust{grid-template-columns:1fr}.ee-sol .help-card{padding:24px}}
@media (max-width:600px){.ee-sol .wrap{padding:0 20px}.ee-sol .section-title{font-size:26px}.ee-sol .stats-head h2{font-size:28px}.ee-sol .cards,.ee-sol .cards.col-4{grid-template-columns:1fr}.ee-sol .stats-grid{grid-template-columns:1fr}.ee-sol .cat-header{flex-direction:column;align-items:flex-start;gap:10px}.ee-sol .help-card{padding:22px;flex-direction:column;align-items:flex-start;text-align:left}.ee-sol .help-card .ht{align-items:flex-start}}
</style>

<div class="ee-sol">
<section class="section">
  <div class="wrap">
    <div class="section-head">
      <span class="section-eyebrow">Solution Categories</span>
      <h2 class="section-title">A purpose-built suite for every stage of admissions</h2>
      <p class="section-sub">From the first inquiry to enrollment confirmation — explore solutions designed for the way modern institutions recruit, manage, and convert.</p>
    </div>

    <div class="controls">
      <div class="tabs" role="tablist">
        <button class="tab active" data-filter="all" type="button">All Solutions <span class="count">10</span></button>
        <button class="tab" data-filter="admissions" type="button">Admissions <span class="count">3</span></button>
        <button class="tab" data-filter="abroad" type="button">Study Abroad <span class="count">3</span></button>
        <button class="tab" data-filter="recruitment" type="button">Recruitment <span class="count">4</span></button>
      </div>
      <div class="result-count"><strong id="visibleCount">10</strong> results</div>
    </div>

    <div id="solutionsContainer">

      <div class="category-block" data-cat="admissions">
        <div class="cat-header">
          <div class="left">
            <div class="cat-num">01</div>
            <div>
              <h3>Admission Solutions</h3>
              <div class="desc">Lifecycle tooling from application to enrollment confirmation</div>
            </div>
          </div>
          <div class="right"><strong>3</strong> modules · <span style="color:var(--green);font-weight:600">●</span> Production</div>
        </div>
        <div class="cards">

          <a href="<?php echo esc_url(ee_sol_find_url(array('admission-management-software','admission-management','admission-management-system'))); ?>" class="card featured accent" data-cat="admissions">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
              <span class="badge popular">★ Most Popular</span>
            </div>
            <div><h4>Admission Management</h4><p class="lead">Manage the complete admission lifecycle — applications, document collection, approvals, and offer letters in one workflow.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Auto-routing</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Doc tracking</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Multi-step approval</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('enrollment-management-software','enrollment-management','crm-enrollment-management'))); ?>" class="card" data-cat="admissions">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
              <span class="badge enterprise">Enterprise</span>
            </div>
            <div><h4>Enrollment Management</h4><p class="lead">Track student enrollment with precision — from fee payments to seat allocation and confirmation in real time.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Fee tracking</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Seat allocation</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Real-time sync</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('walk-in-management-system','walk-in-management'))); ?>" class="card" data-cat="admissions">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 7-8 12-8 12s-8-5-8-12a8 8 0 0116 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            </div>
            <div><h4>Walk-in Management</h4><p class="lead">Track campus visits, counselor interactions, and walk-in conversions — never lose a prospect to manual paperwork again.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Visit logging</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Live calendar</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>QR check-in</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

        </div>
      </div>

      <div class="category-block" data-cat="abroad">
        <div class="cat-header">
          <div class="left">
            <div class="cat-num">02</div>
            <div><h3>Study Abroad</h3><div class="desc">International student recruitment, agents, and consultancy tools</div></div>
          </div>
          <div class="right"><strong>3</strong> modules · 32 countries supported</div>
        </div>
        <div class="cards">

          <a href="<?php echo esc_url(ee_sol_find_url(array('study-abroad-crm','study-abroad-management-software'))); ?>" class="card" data-cat="abroad">
            <div class="card-top"><div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg></div></div>
            <div><h4>Study Abroad CRM</h4><p class="lead">Purpose-built CRM for international student recruitment — visa tracking, country pipelines, and university partnerships.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Visa tracking</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>30+ countries</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Multi-currency</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('education-agents','education-agent-crm'))); ?>" class="card accent" data-cat="abroad">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></div>
              <span class="badge new">● New</span>
            </div>
            <div><h4>Education Agents</h4><p class="lead">Empower recruitment agents with branded portals, commission tracking, and end-to-end student application management.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Branded portal</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Commission tracking</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Sub-agent network</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('education-consultants','oversea-education-consultant-software'))); ?>" class="card" data-cat="abroad">
            <div class="card-top"><div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg></div></div>
            <div><h4>Education Consultants</h4><p class="lead">Scale your consulting business with student lifecycle tools, automated follow-ups, and white-labeled client experiences.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>White-label</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Client portal</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Retainer billing</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

        </div>
      </div>

      <div class="category-block" data-cat="recruitment">
        <div class="cat-header">
          <div class="left">
            <div class="cat-num">03</div>
            <div><h3>Recruitment &amp; Lead Management</h3><div class="desc">Attract, capture, nurture, and convert at every funnel stage</div></div>
          </div>
          <div class="right"><strong>4</strong> modules · AI-powered</div>
        </div>
        <div class="cards col-4">

          <a href="<?php echo esc_url(ee_sol_find_url(array('student-recruitment-software','student-recruitment'))); ?>" class="card" data-cat="recruitment">
            <div class="card-top"><div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v6m0 6v6"/><path d="M21 12h-6m-6 0H3"/><circle cx="12" cy="12" r="3"/></svg></div></div>
            <div><h4>Student Recruitment</h4><p class="lead">Attract top-quality students across channels with targeted outreach and campaign analytics.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Campaign tools</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Attribution</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('lead-management','centralised-lead-management'))); ?>" class="card accent" data-cat="recruitment">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></div>
              <span class="badge popular">★ Popular</span>
            </div>
            <div><h4>Lead Management</h4><p class="lead">Centralized lead tracking across every source — web, social, events, and partner referrals.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Multi-source</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Dedup engine</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('lead-nurturing','strategic-lead-nurturing'))); ?>" class="card" data-cat="recruitment">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div>
              <span class="badge ai">AI-Powered</span>
            </div>
            <div><h4>Lead Nurturing</h4><p class="lead">Convert more leads with personalized drip campaigns, scoring, and AI-powered next-best-action.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Drip campaigns</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>AI scoring</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

          <a href="<?php echo esc_url(ee_sol_find_url(array('enrollment-crm','crm-enrollment-management','university-crm'))); ?>" class="card" data-cat="recruitment">
            <div class="card-top">
              <div class="card-ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
              <span class="badge enterprise">Enterprise</span>
            </div>
            <div><h4>Enrollment CRM</h4><p class="lead">Boost enrollment with pipeline visibility, counselor performance tracking, and revenue forecasting.</p></div>
            <div class="features-row">
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Forecasting</span>
              <span class="feat"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Counselor KPIs</span>
            </div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>

        </div>
      </div>

      <?php $ee_pb_sol = function_exists('ee_pb_pages_in_category') ? ee_pb_pages_in_category('solutions') : array(); ?>
      <?php if ($ee_pb_sol) : ?>
      <div class="category-block" data-cat="custom">
        <div class="cat-header">
          <div class="left">
            <div class="cat-num">04</div>
            <div><h3>More Solutions</h3><div class="desc">Purpose-built pages from our team</div></div>
          </div>
          <div class="right"><strong><?php echo count($ee_pb_sol); ?></strong> pages</div>
        </div>
        <div class="cards">
          <?php foreach ($ee_pb_sol as $c) : ?>
          <a href="<?php echo esc_url($c['url']); ?>" class="card" data-cat="custom">
            <div><h4><?php echo esc_html($c['title']); ?></h4><p class="lead"><?php echo esc_html($c['desc']); ?></p></div>
            <div class="card-bottom"><span class="card-cta">Learn more <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span></div>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>

    <div class="help-card">
      <div class="ht">
        <div class="hi"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
        <div>
          <h4>Not sure which solution fits your institution?</h4>
          <p>Our solution architects will recommend a tailored stack in under 30 minutes — no pitch, just clarity.</p>
        </div>
      </div>
      <div class="hcta">
        <a href="<?php echo esc_url(home_url('/book-demo/')); ?>" class="btn btn-primary">Book a free consult <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
      </div>
    </div>

  </div>
</section>

<section class="stats">
  <div class="wrap">
    <div class="stats-head">
      <div class="se">Proven at Scale</div>
      <h2>Powering admissions for institutions, worldwide.</h2>
      <p>Numbers from the last 12 months — across universities, K-12 schools, ed-consultancies, and global agent networks.</p>
    </div>

    <div class="stats-grid">
      <div class="stat">
        <div class="stat-top"><div class="si"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg></div><span class="trend">▲ 32%</span></div>
        <div class="num" data-target="2400" data-suffix="+"><span class="value">0</span><span class="suffix">+</span></div>
        <div class="lab">Institutions Served</div>
        <div class="desc">Universities, colleges, and K-12 schools across 32 countries.</div>
        <svg class="spark" width="100%" height="22" viewBox="0 0 120 22" preserveAspectRatio="none"><polyline points="0,18 12,16 24,17 36,14 48,15 60,11 72,10 84,8 96,5 108,6 120,2" fill="none" stroke="#DE6E30" stroke-width="1.5"/></svg>
      </div>
      <div class="stat">
        <div class="stat-top"><div class="si"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></div><span class="trend">▲ 41%</span></div>
        <div class="num" data-target="18" data-suffix="M+"><span class="value">0</span><span class="suffix">M+</span></div>
        <div class="lab">Student Leads Managed</div>
        <div class="desc">From first inquiry to enrolled — every interaction tracked.</div>
        <svg class="spark" width="100%" height="22" viewBox="0 0 120 22" preserveAspectRatio="none"><polyline points="0,16 12,15 24,12 36,13 48,10 60,12 72,8 84,7 96,9 108,4 120,3" fill="none" stroke="#DE6E30" stroke-width="1.5"/></svg>
      </div>
      <div class="stat">
        <div class="stat-top"><div class="si"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div><span class="trend">▲ avg.</span></div>
        <div class="num" data-target="3.4" data-suffix="x" data-decimal="true"><span class="value">0</span><span class="suffix">x</span></div>
        <div class="lab">Enrollment Growth</div>
        <div class="desc">Year-over-year lift for institutions in their first 12 months.</div>
        <svg class="spark" width="100%" height="22" viewBox="0 0 120 22" preserveAspectRatio="none"><polyline points="0,19 12,18 24,15 36,13 48,11 60,9 72,8 84,6 96,5 108,4 120,2" fill="none" stroke="#DE6E30" stroke-width="1.5"/></svg>
      </div>
      <div class="stat">
        <div class="stat-top"><div class="si"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><span class="trend">live</span></div>
        <div class="num" data-target="62" data-suffix="%"><span class="value">0</span><span class="suffix">%</span></div>
        <div class="lab">Automation Efficiency</div>
        <div class="desc">Of workflow tasks handled by AI Copilot — freeing teams.</div>
        <svg class="spark" width="100%" height="22" viewBox="0 0 120 22" preserveAspectRatio="none"><polyline points="0,17 12,16 24,14 36,15 48,11 60,12 72,9 84,10 96,7 108,6 120,4" fill="none" stroke="#DE6E30" stroke-width="1.5"/></svg>
      </div>
    </div>

    <div class="trust">
      <div class="testimonial">
        <span class="quote-mark">"</span>
        <p class="tq">We replaced four point tools and a spreadsheet swamp with a single platform. Our application-to-enrollment time dropped from 21 days to under 9, and counselors finally have their evenings back.</p>
        <div class="ta"><div class="tav">RM</div><div><div class="tn">Dr. Rashmi Menon</div><div class="tr">VP, Admissions · Westbrook University</div></div></div>
      </div>
      <div class="testimonial">
        <span class="quote-mark">"</span>
        <p class="tq">Our lead response time went from hours to seconds. The AI scoring tells counselors exactly who to call first — conversion is up 38% across our last two intakes, with the same team size.</p>
        <div class="ta"><div class="tav">MC</div><div><div class="tn">Marcus Chen</div><div class="tr">Director of Enrollment · Pacific Tech Institute</div></div></div>
      </div>
      <div class="testimonial">
        <span class="quote-mark">"</span>
        <p class="tq">Managing 200+ agents across 14 countries used to be pure chaos. Now every application, commission, and visa milestone lives in one place. It's transformed how our global network operates.</p>
        <div class="ta"><div class="tav">AO</div><div><div class="tn">Aisha Okafor</div><div class="tr">Head of Global Recruitment · Stellar Edu Group</div></div></div>
      </div>
    </div>
  </div>
</section>

<div class="toast" id="ee-sol-toast"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg><span id="ee-sol-toast-msg">Ready</span></div>
</div>

<script>
(() => {
  const root = document.querySelector('.ee-sol'); if (!root) return;

  const counters = root.querySelectorAll('.num[data-target]');
  const counterObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      const target = parseFloat(el.dataset.target);
      const isDecimal = el.dataset.decimal === 'true';
      const valueEl = el.querySelector('.value');
      const duration = 1800;
      const start = performance.now();
      function step(now){
        const t = Math.min(1, (now - start) / duration);
        const eased = 1 - Math.pow(1 - t, 3);
        const current = target * eased;
        valueEl.textContent = isDecimal ? current.toFixed(1) : Math.floor(current).toLocaleString();
        if (t < 1) requestAnimationFrame(step);
        else valueEl.textContent = isDecimal ? target.toFixed(1) : target.toLocaleString();
      }
      requestAnimationFrame(step);
      counterObs.unobserve(el);
    });
  }, { threshold: 0.3 });
  counters.forEach(c => counterObs.observe(c));

  const tabs = root.querySelectorAll('.tab');
  const visibleCountEl = document.getElementById('visibleCount');
  const categoryBlocks = root.querySelectorAll('.category-block');
  let currentFilter = 'all';
  function applyFilters(){
    let visibleTotal = 0;
    categoryBlocks.forEach(block => {
      const cat = block.dataset.cat;
      const match = currentFilter === 'all' || currentFilter === cat;
      block.classList.toggle('hidden', !match);
      if (match) visibleTotal += block.querySelectorAll('.card').length;
    });
    if (visibleCountEl) visibleCountEl.textContent = visibleTotal;
  }
  tabs.forEach(tab => tab.addEventListener('click', () => {
    tabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    currentFilter = tab.dataset.filter;
    applyFilters();
  }));
})();
</script>

<?php get_footer(); ?>
