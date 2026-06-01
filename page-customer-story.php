<?php
/**
 * page-customer-story.php — /customers/{slug}/ full case-study page.
 * The custom-route handler in functions.php sets $GLOBALS['ee_cs_story']
 * to the matching row from ee_get_customers_stories().
 *
 * Per-story content comes from that row's `cs` array.
 * Anything left blank falls back to ee_get_case_study_globals().
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

$story = isset($GLOBALS['ee_cs_story']) && is_array($GLOBALS['ee_cs_story']) ? $GLOBALS['ee_cs_story'] : null;
if (!$story) { status_header(404); nocache_headers(); echo '<!doctype html><meta charset="utf-8"><title>404</title><p>Case study not found.</p>'; return; }

$g  = function_exists('ee_get_case_study_globals') ? ee_get_case_study_globals() : array();
$cs = isset($story['cs']) && is_array($story['cs']) ? $story['cs'] : array();

$name     = $story['name'] ?? 'Customer';
$person   = $story['person'] ?? '';
$role     = $story['role']   ?? '';
$note     = $story['note']   ?? '';
$initials = '';
foreach (preg_split('/\s+/', trim($person)) as $w) {
    if ($w !== '') $initials .= function_exists('mb_substr') ? mb_substr($w, 0, 1) : substr($w, 0, 1);
    if (strlen($initials) >= 2) break;
}
$initials = $initials !== '' ? strtoupper($initials) : strtoupper(substr($name, 0, 2));

/* Parser: pipe-delimited textarea → array of rows, each row trimmed */
$parse_lines = function ($text, $cols) {
    $out = array();
    if (!$text) return $out;
    foreach (preg_split('/\r?\n/', $text) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $parts = array_map('trim', explode('|', $line));
        while (count($parts) < $cols) $parts[] = '';
        $out[] = array_slice($parts, 0, $cols);
    }
    return $out;
};

/* Per-story → fallback to global */
$headline   = $cs['headline']  ?: ('How <em>' . esc_html($name) . '</em> transformed admissions with ExtraaEdge');
$sub        = $cs['sub']       ?: $note;
$industry   = $cs['industry']  ?: '';
$location   = $cs['location']  ?: '';
$year       = $cs['year']      ?: '';
$read_time  = $cs['read_time'] ?: '8-min read';

$hero_stats = $parse_lines($cs['stats'] ?? '', 3);
if (!$hero_stats) $hero_stats = array(
    array('3500', '+', 'Active Users'),
    array('250',  '+', 'Institutes Served'),
    array('20K',  '+', 'Applications Processed'),
    array('10K',  '+', 'Admissions Done'),
);

$about_html = $cs['about'] ?: '';
$facts      = $parse_lines($cs['facts'] ?? '', 2);
if (!$facts) $facts = array(
    array('ti-calendar-event', 'Established institution'),
    array('ti-certificate',     'Accredited & recognised'),
    array('ti-building-bank',   $location ?: 'Multi-campus'),
    array('ti-target',          'Growing applicant base'),
);

$challenges = $parse_lines($g['challenges'] ?? '', 3);
$solutions  = $parse_lines($g['solutions']  ?? '', 3);
$journey    = $parse_lines($g['journey']    ?? '', 3);
$why_cards  = $parse_lines($g['why_cards']  ?? '', 2);
$csm_team   = $parse_lines($g['csm_team']   ?? '', 4);

$results = $parse_lines($cs['results'] ?? '', 5);
if (!$results) $results = array(
    array('4', '×', 'Lead-to-Conversion Lift', '~2%',  '8–10%'),
    array('3', '×', 'Ad-to-Conversion Jump',   '10%',  '30%'),
    array('↑', '',  'Faster Response & Trust', 'Hours','Seconds'),
);
$impact  = $parse_lines($cs['impact']  ?? '', 2);
$compare = $parse_lines($cs['compare'] ?? '', 3);

$quote = $cs['quote'] ?: ('"With ExtraaEdge, our admissions transformed completely — faster responses, smarter automation, and measurable ROI from day one." — ' . $name);

add_action('wp_head', function () use ($name, $note, $story) {
    $title = $name . ' × ExtraaEdge — Case Study';
    $desc  = $note ?: 'How ' . $name . ' transformed admissions with ExtraaEdge.';
    $url   = home_url('/customers/' . ($story['slug'] ?? '') . '/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="theme-color" content="#19335D">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="article">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">' . "\n";
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">' . "\n";
}, 5);

get_header();
?>
<style>
.ee-cs *,.ee-cs *::before,.ee-cs *::after{box-sizing:border-box;margin:0;padding:0}
.ee-cs{--orange:#DE6E30;--orange-dark:#b85520;--orange-light:#f4956a;--orange-bg:#fdf1ea;--orange-border:#f5c4a0;--blue:#19335D;--blue-dark:#0f1f3a;--blue-mid:#1e3f72;--blue-light:#2a4f8f;--blue-bg:#eef2f9;--white:#fff;--text:#111827;--text2:#374151;--muted:#6b7280;--muted2:#9ca3af;--border:#e5e7eb;--border2:#d1d5db;--surface:#f9fafb;--surface2:#f3f4f6;font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;background:#fff;color:var(--text);line-height:1.6;-webkit-font-smoothing:antialiased}
.ee-cs .hero{background:var(--blue);color:#fff;padding:80px 2rem 70px;position:relative;overflow:hidden}
.ee-cs .hero-blob1{position:absolute;top:-120px;right:-120px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.18) 0%,transparent 70%);pointer-events:none}
.ee-cs .hero-blob2{position:absolute;bottom:-80px;left:20%;width:320px;height:320px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.09) 0%,transparent 70%);pointer-events:none}
.ee-cs .hero-grid-line{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);background-size:60px 60px;pointer-events:none}
.ee-cs .hero-inner{max-width:960px;margin:0 auto;position:relative;z-index:2}
.ee-cs .hero-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.15);border:1px solid rgba(222,110,48,.3);color:var(--orange-light);font-size:11px;font-weight:600;letter-spacing:1.8px;text-transform:uppercase;padding:6px 16px;border-radius:100px;margin-bottom:1.6rem}
.ee-cs .hero-eyebrow i{font-size:13px}
.ee-cs .hero h1{font-size:clamp(2rem,4.5vw,3.2rem);font-weight:800;line-height:1.15;max-width:720px;margin-bottom:1.2rem;letter-spacing:-.8px;color:#fff}
.ee-cs .hero h1 em{font-style:normal;color:var(--orange-light)}
.ee-cs .hero-sub{font-size:1.05rem;color:rgba(255,255,255,.58);max-width:560px;margin-bottom:2.8rem;font-weight:400;line-height:1.7}
.ee-cs .hero-meta{display:flex;align-items:center;gap:24px;flex-wrap:wrap;margin-bottom:3.5rem}
.ee-cs .hero-meta-item{display:flex;align-items:center;gap:8px;font-size:.83rem;color:rgba(255,255,255,.5)}
.ee-cs .hero-meta-item i{color:var(--orange-light);font-size:16px}
.ee-cs .stats-band{display:grid;grid-template-columns:repeat(<?php echo max(1, count($hero_stats)); ?>,1fr);background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:14px;overflow:hidden}
.ee-cs .stat-cell{padding:1.5rem 1rem;text-align:center;border-right:1px solid rgba(255,255,255,.07);position:relative}
.ee-cs .stat-cell:last-child{border-right:none}
.ee-cs .stat-cell::before{content:'';position:absolute;top:0;left:50%;transform:translateX(-50%);width:40px;height:2px;background:var(--orange)}
.ee-cs .stat-n{font-size:2.2rem;font-weight:800;color:#fff;display:block;line-height:1;letter-spacing:-1.5px;margin-bottom:5px}
.ee-cs .stat-n span{color:var(--orange-light)}
.ee-cs .stat-l{font-size:11.5px;color:rgba(255,255,255,.42);font-weight:400}

.ee-cs .wrap{max-width:960px;margin:0 auto;padding:0 2rem}
.ee-cs .section{padding:72px 0}
.ee-cs .section-inner{max-width:960px;margin:0 auto;padding:0 2rem}
.ee-cs .label{font-size:10.5px;font-weight:700;letter-spacing:2.2px;text-transform:uppercase;color:var(--orange);margin-bottom:.45rem;display:block}
.ee-cs .h2{font-size:clamp(1.5rem,2.8vw,2rem);font-weight:800;color:var(--blue);letter-spacing:-.4px;line-height:1.25;margin-bottom:.6rem}
.ee-cs .h2-sub{font-size:.97rem;color:var(--muted);max-width:600px;line-height:1.7;margin-bottom:2.2rem}
.ee-cs .rule{border:none;border-top:1px solid var(--border)}

.ee-cs .about-layout{display:grid;grid-template-columns:1fr 340px;gap:40px;align-items:start}
.ee-cs .about-text{font-size:.97rem;line-height:1.9;color:var(--text2)}
.ee-cs .about-text p+p{margin-top:1rem}
.ee-cs .about-text strong{color:var(--blue);font-weight:600}
.ee-cs .about-card{background:var(--blue);border-radius:14px;padding:1.8rem;color:#fff;position:relative;overflow:hidden}
.ee-cs .about-card::before{content:'';position:absolute;top:-40px;right:-40px;width:120px;height:120px;border-radius:50%;background:rgba(222,110,48,.2)}
.ee-cs .about-card-label{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--orange-light);margin-bottom:1rem;display:block}
.ee-cs .about-facts{list-style:none;display:flex;flex-direction:column;gap:12px}
.ee-cs .about-facts li{display:flex;gap:10px;align-items:flex-start;font-size:.87rem;line-height:1.5;color:rgba(255,255,255,.8)}
.ee-cs .about-facts li i{color:var(--orange-light);font-size:16px;margin-top:1px;flex-shrink:0}

.ee-cs .bg-surface{background:var(--surface)}
.ee-cs .challenge-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px}
.ee-cs .c-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.5rem 1.6rem;display:flex;gap:14px;align-items:flex-start;transition:box-shadow .22s,transform .22s}
.ee-cs .c-card:hover{box-shadow:0 8px 32px rgba(25,51,93,.1);transform:translateY(-2px)}
.ee-cs .c-icon{width:44px;height:44px;border-radius:10px;background:var(--orange-bg);border:1px solid var(--orange-border);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ee-cs .c-icon i{color:var(--orange);font-size:20px}
.ee-cs .c-card h4{font-size:.93rem;font-weight:700;color:var(--blue);margin-bottom:5px}
.ee-cs .c-card p{font-size:.84rem;color:var(--muted);line-height:1.65}

.ee-cs .sol-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px}
.ee-cs .s-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:1.5rem 1.6rem;transition:box-shadow .22s,transform .22s}
.ee-cs .s-card:hover{box-shadow:0 8px 32px rgba(25,51,93,.1);transform:translateY(-2px)}
.ee-cs .s-icon{width:44px;height:44px;border-radius:10px;background:var(--blue-bg);display:flex;align-items:center;justify-content:center;margin-bottom:1rem}
.ee-cs .s-icon i{color:var(--blue);font-size:20px}
.ee-cs .s-card h4{font-size:.93rem;font-weight:700;color:var(--blue);margin-bottom:5px}
.ee-cs .s-card p{font-size:.84rem;color:var(--muted);line-height:1.65}

.ee-cs .timeline{position:relative;padding-left:32px}
.ee-cs .timeline::before{content:'';position:absolute;left:10px;top:8px;bottom:0;width:2px;background:linear-gradient(to bottom,var(--orange),var(--blue))}
.ee-cs .tl-item{position:relative;margin-bottom:2.2rem}
.ee-cs .tl-item:last-child{margin-bottom:0}
.ee-cs .tl-dot{position:absolute;left:-28px;top:4px;width:18px;height:18px;border-radius:50%;background:#fff;border:3px solid var(--orange);z-index:1}
.ee-cs .tl-dot.blue{border-color:var(--blue)}
.ee-cs .tl-phase{font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--orange);margin-bottom:4px}
.ee-cs .tl-phase.blue{color:var(--blue)}
.ee-cs .tl-item h4{font-size:.95rem;font-weight:700;color:var(--blue);margin-bottom:4px}
.ee-cs .tl-item p{font-size:.86rem;color:var(--muted);line-height:1.65}

.ee-cs .results-hero{background:var(--blue);padding:72px 0}
.ee-cs .results-inner{max-width:960px;margin:0 auto;padding:0 2rem}
.ee-cs .results-hero .label{color:var(--orange-light)}
.ee-cs .results-hero .h2{color:#fff}
.ee-cs .results-hero .h2-sub{color:rgba(255,255,255,.5)}
.ee-cs .res-grid{display:grid;grid-template-columns:repeat(<?php echo max(1, count($results)); ?>,1fr);gap:16px;margin-bottom:2.5rem}
.ee-cs .res-card{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:2rem 1.5rem;text-align:center;position:relative;overflow:hidden;transition:background .2s}
.ee-cs .res-card::before{content:'';position:absolute;top:0;left:50%;transform:translateX(-50%);width:50px;height:3px;background:var(--orange);border-radius:0 0 4px 4px}
.ee-cs .res-card:hover{background:rgba(255,255,255,.1)}
.ee-cs .res-big{font-size:3.2rem;font-weight:800;color:#fff;display:block;line-height:1;letter-spacing:-3px;margin-bottom:.5rem}
.ee-cs .res-big em{font-style:normal;color:var(--orange-light)}
.ee-cs .res-label{font-size:.83rem;color:rgba(255,255,255,.5);line-height:1.6}
.ee-cs .res-before-after{display:flex;align-items:center;justify-content:center;gap:8px;margin-top:8px}
.ee-cs .res-before{font-size:11px;background:rgba(255,255,255,.1);color:rgba(255,255,255,.5);padding:2px 8px;border-radius:20px}
.ee-cs .res-arrow{color:var(--orange-light);font-size:14px}
.ee-cs .res-after{font-size:11px;font-weight:600;background:rgba(222,110,48,.2);color:var(--orange-light);padding:2px 8px;border-radius:20px}

.ee-cs .impact-list{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:2.5rem}
.ee-cs .impact-item{display:flex;gap:10px;align-items:flex-start;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:10px;padding:1rem 1.2rem}
.ee-cs .impact-item i{color:var(--orange-light);font-size:18px;flex-shrink:0;margin-top:1px}
.ee-cs .impact-item p{font-size:.86rem;color:rgba(255,255,255,.7);line-height:1.6}
.ee-cs .impact-item strong{color:#fff;font-weight:600}

.ee-cs .testimonial-card{background:rgba(255,255,255,.06);border:1px solid rgba(222,110,48,.3);border-radius:14px;padding:2.2rem 2.4rem;position:relative}
.ee-cs .quote-mark{font-size:5rem;line-height:1;color:rgba(222,110,48,.25);font-family:Georgia,serif;position:absolute;top:10px;left:24px}
.ee-cs .testimonial-card blockquote{font-size:1.05rem;font-style:italic;line-height:1.8;color:rgba(255,255,255,.88);margin-bottom:1.4rem;padding-left:1.2rem;position:relative;z-index:1}
.ee-cs .testi-person{display:flex;align-items:center;gap:12px}
.ee-cs .testi-avatar{width:46px;height:46px;border-radius:50%;background:var(--blue-mid);border:2px solid var(--orange);display:flex;align-items:center;justify-content:center;font-size:.9rem;font-weight:700;color:var(--orange-light);flex-shrink:0}
.ee-cs .testi-name{font-size:.9rem;font-weight:700;color:#fff}
.ee-cs .testi-role{font-size:.78rem;color:rgba(255,255,255,.45);margin-top:2px}

.ee-cs .compare-section{background:var(--surface);padding:72px 0}
.ee-cs .compare-wrap{max-width:960px;margin:0 auto;padding:0 2rem}
.ee-cs .compare-table{width:100%;border-collapse:collapse;border-radius:14px;overflow:hidden;border:1px solid var(--border);background:#fff}
.ee-cs .compare-table th{padding:1rem 1.4rem;text-align:left;font-size:.85rem;font-weight:700}
.ee-cs .compare-table th:first-child{background:var(--surface2);color:var(--muted);width:36%}
.ee-cs .compare-table th.before-col{background:#fef2f2;color:#b91c1c}
.ee-cs .compare-table th.after-col{background:#f0fdf4;color:#15803d}
.ee-cs .compare-table td{padding:.9rem 1.4rem;font-size:.88rem;border-top:1px solid var(--border)}
.ee-cs .compare-table td:first-child{color:var(--blue);font-weight:600}
.ee-cs .compare-table tr:hover td{background:var(--surface)}
.ee-cs .tag-bad{display:inline-flex;align-items:center;gap:5px;background:#fef2f2;color:#b91c1c;font-size:.82rem;padding:3px 10px;border-radius:20px;font-weight:500}
.ee-cs .tag-good{display:inline-flex;align-items:center;gap:5px;background:#f0fdf4;color:#15803d;font-size:.82rem;padding:3px 10px;border-radius:20px;font-weight:500}

.ee-cs .why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.ee-cs .why-card{border:1px solid var(--border);border-radius:12px;padding:1.6rem;background:#fff;transition:box-shadow .22s,transform .22s}
.ee-cs .why-card:hover{box-shadow:0 8px 32px rgba(25,51,93,.1);transform:translateY(-2px)}
.ee-cs .why-num{font-size:2rem;font-weight:800;color:var(--orange);letter-spacing:-2px;line-height:1;margin-bottom:.8rem;opacity:.25}
.ee-cs .why-card h4{font-size:.92rem;font-weight:700;color:var(--blue);margin-bottom:5px}
.ee-cs .why-card p{font-size:.83rem;color:var(--muted);line-height:1.65}

.ee-cs .csm-section{background:var(--surface);padding:72px 0}
.ee-cs .csm-inner{max-width:960px;margin:0 auto;padding:0 2rem}
.ee-cs .csm-quote{background:#fff;border:1px solid var(--border);border-left:4px solid var(--orange);border-radius:0 12px 12px 0;padding:1.8rem 2rem;margin-bottom:2.8rem}
.ee-cs .csm-quote blockquote{font-size:1.02rem;font-style:italic;color:var(--text2);line-height:1.8;margin-bottom:.9rem}
.ee-cs .csm-quote cite{font-size:.82rem;color:var(--muted);font-weight:600;font-style:normal}
.ee-cs .csm-team{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.ee-cs .csm-card{background:#fff;border:1px solid var(--border);border-radius:16px;padding:2rem 1.6rem 1.8rem;text-align:center;transition:box-shadow .22s,transform .22s}
.ee-cs .csm-card:hover{box-shadow:0 10px 36px rgba(25,51,93,.12);transform:translateY(-3px)}
.ee-cs .csm-avatar-wrap{position:relative;display:inline-block;margin-bottom:1.2rem}
.ee-cs .csm-avatar{width:96px;height:96px;border-radius:50%;border:3px solid var(--blue);overflow:hidden;background:var(--blue-bg);display:flex;align-items:center;justify-content:center;font-size:1.6rem;font-weight:800;color:var(--blue)}
.ee-cs .csm-avatar img{width:100%;height:100%;object-fit:cover}
.ee-cs .csm-online{position:absolute;bottom:4px;right:4px;width:14px;height:14px;background:#22c55e;border-radius:50%;border:2px solid #fff}
.ee-cs .csm-card h4{font-size:1rem;font-weight:700;color:var(--blue);margin-bottom:4px}
.ee-cs .csm-role{font-size:.8rem;color:var(--muted);margin-bottom:12px;line-height:1.4}
.ee-cs .csm-badge{display:inline-block;background:var(--orange-bg);color:var(--orange-dark);font-size:11px;font-weight:700;padding:4px 12px;border-radius:100px;border:1px solid var(--orange-border)}

.ee-cs .gated-section{background:var(--blue);padding:80px 2rem;text-align:center;position:relative;overflow:hidden;color:#fff}
.ee-cs .gated-section h2{color:#fff;font-size:clamp(1.6rem,3vw,2.3rem);font-weight:800;letter-spacing:-.5px;margin-bottom:.6rem;line-height:1.2}
.ee-cs .gated-blob1{position:absolute;bottom:-80px;left:-80px;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.14) 0%,transparent 70%);pointer-events:none}
.ee-cs .gated-blob2{position:absolute;top:-60px;right:5%;width:240px;height:240px;border-radius:50%;background:radial-gradient(circle,rgba(222,110,48,.1) 0%,transparent 70%);pointer-events:none}
.ee-cs .gated-inner{position:relative;z-index:1;max-width:960px;margin:0 auto}
.ee-cs .gated-eyebrow{display:inline-flex;align-items:center;gap:7px;background:rgba(222,110,48,.15);border:1px solid rgba(222,110,48,.25);color:var(--orange-light);font-size:11px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;padding:5px 16px;border-radius:100px;margin-bottom:1.3rem}
.ee-cs .gated-section .gated-sub{color:rgba(255,255,255,.5);font-size:.97rem;margin-bottom:2.8rem;line-height:1.7;max-width:600px;margin-left:auto;margin-right:auto}
.ee-cs .form-card{background:#fff;border-radius:20px;padding:2.4rem;max-width:540px;margin:0 auto;text-align:left;box-shadow:0 32px 80px rgba(0,0,0,.25);color:var(--text)}

@media (max-width:768px){
  .ee-cs .about-layout,.ee-cs .challenge-grid,.ee-cs .sol-grid,.ee-cs .res-grid,.ee-cs .impact-list,.ee-cs .csm-team{grid-template-columns:1fr!important}
  .ee-cs .why-grid{grid-template-columns:1fr 1fr}
  .ee-cs .stats-band{grid-template-columns:repeat(2,1fr)!important}
  .ee-cs .hero{padding:56px 1.2rem 48px}
  .ee-cs .section,.ee-cs .results-hero,.ee-cs .compare-section,.ee-cs .csm-section{padding:52px 0}
}
@media (max-width:480px){.ee-cs .why-grid{grid-template-columns:1fr}}
</style>

<div class="ee-cs">

<!-- HERO -->
<section class="hero">
  <div class="hero-grid-line"></div><div class="hero-blob1"></div><div class="hero-blob2"></div>
  <div class="hero-inner">
    <div class="hero-eyebrow"><i class="ti ti-award" aria-hidden="true"></i> Case Study · Admissions CRM</div>
    <h1><?php echo wp_kses_post($headline); ?></h1>
    <?php if ($sub): ?><p class="hero-sub"><?php echo esc_html($sub); ?></p><?php endif; ?>
    <div class="hero-meta">
      <?php if ($industry): ?><span class="hero-meta-item"><i class="ti ti-building"></i> <?php echo esc_html($industry); ?></span><?php endif; ?>
      <?php if ($location): ?><span class="hero-meta-item"><i class="ti ti-map-pin"></i> <?php echo esc_html($location); ?></span><?php endif; ?>
      <?php if ($year):     ?><span class="hero-meta-item"><i class="ti ti-calendar"></i> Implementation: <?php echo esc_html($year); ?></span><?php endif; ?>
      <?php if ($read_time):?><span class="hero-meta-item"><i class="ti ti-clock"></i> <?php echo esc_html($read_time); ?></span><?php endif; ?>
    </div>
    <div class="stats-band">
      <?php foreach ($hero_stats as $hs): ?>
        <div class="stat-cell">
          <span class="stat-n"><?php echo esc_html($hs[0]); ?><span><?php echo esc_html($hs[1]); ?></span></span>
          <span class="stat-l"><?php echo esc_html($hs[2]); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="section">
  <div class="section-inner">
    <span class="label">About the Institution</span>
    <h2 class="h2"><?php echo esc_html($name); ?></h2>
    <?php if ($note): ?><p class="h2-sub"><?php echo esc_html($note); ?></p><?php endif; ?>
    <div class="about-layout">
      <div class="about-text">
        <?php
        if ($about_html) echo wpautop($about_html);
        else             echo '<p>' . esc_html($name) . ' is a respected institution that partnered with ExtraaEdge to modernise admissions, automate communication, and gain real-time visibility into the enrolment funnel.</p>';
        ?>
      </div>
      <div class="about-card">
        <span class="about-card-label">Quick Facts</span>
        <ul class="about-facts">
          <?php foreach ($facts as $f): ?>
            <li><i class="ti <?php echo esc_attr($f[0]); ?>"></i> <?php echo esc_html($f[1]); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<hr class="rule"/>

<!-- CHALLENGES -->
<?php if ($challenges): ?>
<section class="section bg-surface">
  <div class="section-inner">
    <span class="label">The Challenge</span>
    <h2 class="h2">What was holding admissions back?</h2>
    <p class="h2-sub">The team was working hard — but the tools weren't keeping up.</p>
    <div class="challenge-grid">
      <?php foreach ($challenges as $c): ?>
        <div class="c-card">
          <div class="c-icon"><i class="ti <?php echo esc_attr($c[0]); ?>"></i></div>
          <div><h4><?php echo esc_html($c[1]); ?></h4><p><?php echo esc_html($c[2]); ?></p></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<hr class="rule"/>
<?php endif; ?>

<!-- SOLUTION -->
<?php if ($solutions): ?>
<section class="section">
  <div class="section-inner">
    <span class="label">The Solution</span>
    <h2 class="h2">How ExtraaEdge stepped in</h2>
    <p class="h2-sub">A purpose-built admissions CRM with integrated communication, automation, and real-time analytics.</p>
    <div class="sol-grid">
      <?php foreach ($solutions as $s): ?>
        <div class="s-card">
          <div class="s-icon"><i class="ti <?php echo esc_attr($s[0]); ?>"></i></div>
          <h4><?php echo esc_html($s[1]); ?></h4>
          <p><?php echo esc_html($s[2]); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<hr class="rule"/>
<?php endif; ?>

<!-- JOURNEY -->
<?php if ($journey): ?>
<section class="section bg-surface">
  <div class="section-inner">
    <span class="label">Implementation Journey</span>
    <h2 class="h2">From onboarding to transformation</h2>
    <p class="h2-sub">A structured rollout ensures results fast — every stage backed by dedicated support.</p>
    <div class="timeline">
      <?php foreach ($journey as $i => $j):
        $blue = $i >= 2 ? ' blue' : ''; ?>
        <div class="tl-item">
          <div class="tl-dot<?php echo $blue; ?>"></div>
          <span class="tl-phase<?php echo $blue; ?>"><?php echo esc_html($j[0]); ?></span>
          <h4><?php echo esc_html($j[1]); ?></h4>
          <p><?php echo esc_html($j[2]); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- RESULTS -->
<section class="results-hero">
  <div class="results-inner">
    <span class="label">The Results</span>
    <h2 class="h2">Numbers that speak for themselves</h2>
    <p class="h2-sub">Within months of go-live, the metrics were transformed.</p>

    <div class="res-grid">
      <?php foreach ($results as $rs): ?>
        <div class="res-card">
          <span class="res-big"><em><?php echo esc_html($rs[0]); ?></em><?php echo esc_html($rs[1]); ?></span>
          <span class="res-label"><?php echo esc_html($rs[2]); ?></span>
          <?php if ($rs[3] || $rs[4]): ?>
            <div class="res-before-after">
              <span class="res-before"><?php echo esc_html($rs[3]); ?></span>
              <span class="res-arrow">→</span>
              <span class="res-after"><?php echo esc_html($rs[4]); ?></span>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <?php if ($impact): ?>
    <div class="impact-list">
      <?php foreach ($impact as $im): ?>
        <div class="impact-item"><i class="ti <?php echo esc_attr($im[0]); ?>"></i><p><?php echo wp_kses_post($im[1]); ?></p></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="testimonial-card">
      <div class="quote-mark">"</div>
      <blockquote><?php echo esc_html($quote); ?></blockquote>
      <div class="testi-person">
        <div class="testi-avatar"><?php echo esc_html($initials); ?></div>
        <div>
          <div class="testi-name"><?php echo esc_html($person ?: $name); ?></div>
          <?php if ($role): ?><div class="testi-role"><?php echo esc_html($role); ?>, <?php echo esc_html($name); ?></div><?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- COMPARE TABLE -->
<?php if ($compare): ?>
<section class="compare-section">
  <div class="compare-wrap">
    <span class="label">Before vs After</span>
    <h2 class="h2">A clear transformation across every metric</h2>
    <p class="h2-sub" style="margin-bottom:2rem;">Side-by-side comparison of admissions operations.</p>
    <table class="compare-table">
      <thead>
        <tr>
          <th>Metric / Process</th>
          <th class="before-col"><i class="ti ti-x" style="font-size:13px;vertical-align:-1px;margin-right:4px"></i>Before ExtraaEdge</th>
          <th class="after-col"><i class="ti ti-check" style="font-size:13px;vertical-align:-1px;margin-right:4px"></i>After ExtraaEdge</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($compare as $row): ?>
          <tr>
            <td><?php echo esc_html($row[0]); ?></td>
            <td><span class="tag-bad"><i class="ti ti-trending-down"></i> <?php echo esc_html($row[1]); ?></span></td>
            <td><span class="tag-good"><i class="ti ti-trending-up"></i> <?php echo esc_html($row[2]); ?></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php endif; ?>

<!-- WHY EXTRAAEDGE -->
<?php if ($why_cards): ?>
<section class="section">
  <div class="section-inner">
    <span class="label">Why ExtraaEdge</span>
    <h2 class="h2">Built exclusively for admissions teams</h2>
    <p class="h2-sub">Unlike generic CRMs, ExtraaEdge is designed from the ground up for education.</p>
    <div class="why-grid">
      <?php foreach ($why_cards as $i => $w): ?>
        <div class="why-card">
          <div class="why-num"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></div>
          <h4><?php echo esc_html($w[0]); ?></h4>
          <p><?php echo esc_html($w[1]); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- CSM TEAM -->
<?php if ($csm_team || !empty($g['csm_quote'])): ?>
<section class="csm-section">
  <div class="csm-inner">
    <span class="label">The Support Effect</span>
    <h2 class="h2">People, people, and people</h2>
    <p class="h2-sub" style="margin-bottom:2rem;">Behind every successful implementation is a team that never lets the client feel alone.</p>
    <?php if (!empty($g['csm_quote'])): ?>
    <div class="csm-quote">
      <blockquote>"<?php echo esc_html($g['csm_quote']); ?>"</blockquote>
      <cite>— <?php echo esc_html($g['csm_quote_by'] ?? ''); ?></cite>
    </div>
    <?php endif; ?>
    <?php if ($csm_team): ?>
    <div class="csm-team">
      <?php foreach ($csm_team as $t): ?>
        <div class="csm-card">
          <div class="csm-avatar-wrap">
            <div class="csm-avatar">
              <?php if (!empty($t[3])): ?>
                <img src="<?php echo esc_url($t[3]); ?>" alt="<?php echo esc_attr($t[0]); ?>">
              <?php else: ?>
                <?php echo esc_html(strtoupper(substr($t[0], 0, 2))); ?>
              <?php endif; ?>
            </div>
            <div class="csm-online"></div>
          </div>
          <h4><?php echo esc_html($t[0]); ?></h4>
          <p class="csm-role"><?php echo esc_html($t[1]); ?></p>
          <span class="csm-badge"><?php echo esc_html($t[2]); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- GATED FORM -->
<section class="gated-section" id="get-pdf">
  <div class="gated-blob1"></div><div class="gated-blob2"></div>
  <div class="gated-inner">
    <?php if (!empty($g['gated_eyebrow'])): ?><div class="gated-eyebrow"><i class="ti ti-lock-open"></i> <?php echo esc_html($g['gated_eyebrow']); ?></div><?php endif; ?>
    <?php if (!empty($g['gated_title'])):   ?><h2><?php echo esc_html($g['gated_title']); ?></h2><?php endif; ?>
    <?php if (!empty($g['gated_sub'])):     ?><p class="gated-sub"><?php echo esc_html($g['gated_sub']); ?></p><?php endif; ?>
    <div class="form-card">
      <?php echo wp_kses_post($g['gated_form_html'] ?? ''); ?>
    </div>
  </div>
</section>

</div>

<?php get_footer();
