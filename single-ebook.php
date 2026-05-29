<?php
/**
 * single-ebook.php — Standalone premium e-book / white-paper landing page.
 * Renders the full HTML document (no site header / footer).
 * Pulls all editable copy from the 📚 Ebook Settings meta box.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

if (!have_posts()) { status_header(404); nocache_headers(); echo '<!doctype html><meta charset="utf-8"><title>404</title><p>Not found</p>'; exit; }
the_post();

$pid   = get_the_ID();
$g     = function ($k, $d = '') use ($pid) {
    $v = get_post_meta($pid, '_ee_ebook_' . $k, true);
    return ($v !== '' && $v !== null) ? $v : $d;
};

$title       = get_the_title($pid);
$permalink   = get_permalink($pid);
$seo_title   = get_post_meta($pid, '_seo_title', true) ?: $title . ' — ExtraaEdge';
$seo_desc    = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 30);
$og_image    = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');

$edition     = $g('edition', 'Edition 2024');
$subtitle    = $g('subtitle');
$read_time   = $g('read_time') ?: max(1, (int) round(str_word_count(wp_strip_all_tags(get_the_content())) / 220)) . ' min';
$cta1_text   = $g('cta1_text', 'Take the operational fit assessment');
$cta1_url    = $g('cta1_url', '#scorecard');
$cta2_text   = $g('cta2_text', 'Start reading');
$cta2_url    = $g('cta2_url', '#summary');

$stats = array();
for ($i = 1; $i <= 4; $i++) {
    $v = $g("stat{$i}_v");
    $l = $g("stat{$i}_l");
    if ($v || $l) $stats[] = array('v' => $v ?: '—', 'l' => $l ?: '');
}
if (!$stats) {
    $stats = array(
        array('v' => $read_time, 'l' => 'Read time'),
        array('v' => '6',        'l' => 'Chapters'),
        array('v' => '500+',     'l' => 'Institutions'),
        array('v' => '18-pt',    'l' => 'Scorecard'),
    );
}

$authors = array();
for ($i = 1; $i <= 2; $i++) {
    $n = $g("a{$i}_name");
    if (!$n) continue;
    $authors[] = array(
        'name'  => $n,
        'role'  => $g("a{$i}_role"),
        'creds' => $g("a{$i}_creds"),
        'bio'   => $g("a{$i}_bio"),
        'img'   => $g("a{$i}_img"),
    );
}

$intro_lead  = $g('intro_lead');
$intro_body  = $g('intro_body');

$fcta_kicker = $g('fcta_kicker', 'Your First Step — From Blueprint to Reality');
$fcta_h      = $g('fcta_h', 'Join the Admissions Transformation Masterclass');
$fcta_lead   = $g('fcta_lead');
$fcta_steps  = array_filter(array_map('trim', preg_split('/\r?\n/', (string) $g('fcta_steps'))));
$fcta_btn    = $g('fcta_btn', 'Request an invitation');
$fcta_url    = $g('fcta_url', '/book-demo/');

$pdf_url     = $g('pdf_url');
$form_title  = $g('form_title', 'Download the PDF');
$form_btn    = $g('form_btn', 'Download the Ebook');

$initials = function ($name) {
    $name = trim(preg_replace('/\s+/', ' ', $name));
    $parts = explode(' ', $name);
    $a = isset($parts[0][0]) ? $parts[0][0] : '';
    $b = (count($parts) > 1 && isset($parts[count($parts) - 1][0])) ? $parts[count($parts) - 1][0] : '';
    return strtoupper($a . $b);
};
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<title><?php echo esc_html($seo_title); ?></title>
<meta name="description" content="<?php echo esc_attr($seo_desc); ?>">
<link rel="canonical" href="<?php echo esc_url($permalink); ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo esc_attr($seo_title); ?>">
<meta property="og:description" content="<?php echo esc_attr($seo_desc); ?>">
<meta property="og:url" content="<?php echo esc_url($permalink); ?>">
<?php if ($og_image): ?><meta property="og:image" content="<?php echo esc_url($og_image); ?>"><?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo esc_attr($seo_title); ?>">
<meta name="twitter:description" content="<?php echo esc_attr($seo_desc); ?>">
<?php if ($og_image): ?><meta name="twitter:image" content="<?php echo esc_url($og_image); ?>"><?php endif; ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800;900&family=Source+Serif+Pro:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
<style>
/* ─────────────────────────────────────────────────────────────
   E-BOOK STANDALONE STYLES  (scoped under body.ee-ebook-body)
   ───────────────────────────────────────────────────────────── */
*,*::before,*::after{box-sizing:border-box}
body.ee-ebook-body{margin:0;padding:0;background:#fafaf7;color:#1a1a1a;font-family:'Inter',system-ui,-apple-system,sans-serif;font-size:17px;line-height:1.7;-webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility}
body.ee-ebook-body img{max-width:100%;height:auto}
body.ee-ebook-body a{color:#DE6E30;text-decoration:none}
body.ee-ebook-body a:hover{text-decoration:underline}
.ee-ebook{--orange:#DE6E30;--orange-d:#c85d20;--navy:#19335D;--ink:#1a1a1a;--mute:#5b5b5b;--cream:#fdf8f0;--line:#e5e1d8;--bg:#fafaf7}

/* PROGRESS BAR */
.ee-ebook .eeb-progress{position:fixed;top:0;left:0;height:3px;background:var(--orange);width:0;z-index:9999;transition:width .1s linear}

/* NAVBAR (page-local, brand only) */
.ee-ebook .eeb-nav{position:fixed;top:0;left:0;right:0;background:rgba(255,255,255,.96);backdrop-filter:blur(12px);border-bottom:1px solid var(--line);z-index:1000;transform:translateY(-100%);transition:transform .35s ease}
.ee-ebook .eeb-nav.show{transform:translateY(0)}
.ee-ebook .eeb-nav-in{max-width:1240px;margin:0 auto;padding:14px 32px;display:flex;align-items:center;justify-content:space-between;gap:16px}
.ee-ebook .eeb-brand{display:flex;align-items:center;gap:10px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;color:var(--navy);text-decoration:none;font-size:18px}
.ee-ebook .eeb-brand-dot{width:28px;height:28px;border-radius:7px;background:var(--orange);color:#fff;display:grid;place-items:center;font-weight:900;font-size:13px}
.ee-ebook .eeb-nav-cta{background:var(--navy);color:#fff;padding:9px 18px;border-radius:8px;font-weight:700;font-size:13px;text-decoration:none}
.ee-ebook .eeb-nav-cta:hover{background:#0f2547;text-decoration:none;color:#fff}

/* HERO */
.ee-ebook .eeb-hero{padding:90px 32px 70px;max-width:1240px;margin:0 auto;display:grid;grid-template-columns:1.35fr 1fr;gap:64px;align-items:start}
.ee-ebook .eeb-kicker{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.09);color:var(--orange);font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.8px;padding:7px 16px;border-radius:9999px;margin-bottom:22px;border:1px solid rgba(222,110,48,.18)}
.ee-ebook .eeb-h1{font-family:'Plus Jakarta Sans',sans-serif;font-weight:900;font-size:clamp(36px,4.6vw,58px);line-height:1.08;color:var(--navy);margin:0 0 22px;letter-spacing:-.025em}
.ee-ebook .eeb-h1 em{font-style:normal;color:var(--orange)}
.ee-ebook .eeb-sub{font-family:'Source Serif Pro',Georgia,serif;font-size:clamp(17px,1.5vw,21px);line-height:1.6;color:var(--mute);margin:0 0 30px;max-width:600px}
.ee-ebook .eeb-cta-row{display:flex;flex-wrap:wrap;gap:12px;margin-bottom:36px}
.ee-ebook .eeb-btn{display:inline-flex;align-items:center;gap:8px;padding:14px 26px;border-radius:10px;font-weight:700;font-size:14.5px;letter-spacing:.01em;text-decoration:none;transition:all .25s ease;border:1px solid transparent;cursor:pointer}
.ee-ebook .eeb-btn-primary{background:var(--orange);color:#fff;box-shadow:0 6px 18px rgba(222,110,48,.28)}
.ee-ebook .eeb-btn-primary:hover{background:var(--orange-d);transform:translateY(-2px);color:#fff;text-decoration:none;box-shadow:0 10px 24px rgba(222,110,48,.36)}
.ee-ebook .eeb-btn-ghost{background:#fff;color:var(--navy);border-color:var(--line)}
.ee-ebook .eeb-btn-ghost:hover{border-color:var(--navy);text-decoration:none;color:var(--navy)}
.ee-ebook .eeb-byline{display:flex;align-items:center;gap:14px;padding:18px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);margin-bottom:28px;color:var(--mute);font-size:14px}
.ee-ebook .eeb-byline strong{color:var(--ink);font-weight:700}
.ee-ebook .eeb-byline .sep{color:var(--line)}
.ee-ebook .eeb-stats{display:grid;grid-template-columns:repeat(<?php echo count($stats); ?>,1fr);gap:0;border-top:1px solid var(--line)}
.ee-ebook .eeb-stat{padding:18px 0;border-right:1px solid var(--line);text-align:left}
.ee-ebook .eeb-stat:last-child{border-right:0}
.ee-ebook .eeb-stat .v{font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:24px;color:var(--navy);line-height:1.1}
.ee-ebook .eeb-stat .l{font-size:11.5px;color:var(--mute);text-transform:uppercase;letter-spacing:1.2px;margin-top:4px;font-weight:600}

/* FORM CARD */
.ee-ebook .eeb-formcard{position:sticky;top:90px;background:#fff;border:1px solid var(--line);border-radius:18px;padding:30px;box-shadow:0 30px 80px rgba(25,51,93,.08)}
.ee-ebook .eeb-formcard h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:21px;font-weight:800;color:var(--navy);margin:0 0 8px}
.ee-ebook .eeb-formcard p.intro{font-size:14px;color:var(--mute);margin:0 0 20px;line-height:1.55}
.ee-ebook .eeb-field{margin-bottom:12px}
.ee-ebook .eeb-field label{display:block;font-size:11.5px;color:var(--mute);text-transform:uppercase;letter-spacing:1px;font-weight:700;margin-bottom:5px}
.ee-ebook .eeb-field input{width:100%;padding:11px 13px;border:1px solid var(--line);border-radius:8px;font-family:inherit;font-size:14px;color:var(--ink);background:#fafaf7;transition:all .2s ease}
.ee-ebook .eeb-field input:focus{outline:none;border-color:var(--orange);background:#fff;box-shadow:0 0 0 3px rgba(222,110,48,.12)}
.ee-ebook .eeb-field input.err{border-color:#c0392b;background:#fff5f4}
.ee-ebook .eeb-formcard button{width:100%;background:var(--orange);color:#fff;border:none;padding:14px;border-radius:10px;font-weight:700;font-size:15px;cursor:pointer;margin-top:8px;transition:all .25s ease;font-family:inherit}
.ee-ebook .eeb-formcard button:hover{background:var(--orange-d);transform:translateY(-2px);box-shadow:0 10px 24px rgba(222,110,48,.32)}
.ee-ebook .eeb-formcard .legal{font-size:11.5px;color:var(--mute);margin-top:14px;text-align:center;line-height:1.5}
.ee-ebook .eeb-formcard .legal a{color:var(--mute);text-decoration:underline}
.ee-ebook .eeb-formcard.is-success{background:linear-gradient(135deg,#f7fff4 0%,#fff 100%);border-color:#a3d9a5}
.ee-ebook .eeb-success{text-align:center}
.ee-ebook .eeb-success .ok{width:60px;height:60px;border-radius:50%;background:#10b981;color:#fff;display:grid;place-items:center;margin:0 auto 18px;font-size:30px}
.ee-ebook .eeb-success h4{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;color:var(--navy);margin:0 0 8px;font-weight:800}
.ee-ebook .eeb-success p{font-size:14px;color:var(--mute);margin:0 0 18px}

/* INTRO SECTION */
.ee-ebook .eeb-intro{max-width:780px;margin:0 auto;padding:50px 32px 30px}
.ee-ebook .eeb-intro .lead{font-family:'Source Serif Pro',Georgia,serif;font-size:clamp(20px,2vw,24px);line-height:1.55;color:var(--ink);margin:0 0 26px;font-weight:400}
.ee-ebook .eeb-intro p{font-size:17px;line-height:1.8;color:#333;margin:0 0 18px}

/* AUTHORS */
.ee-ebook .eeb-authors{max-width:980px;margin:0 auto;padding:40px 32px 30px}
.ee-ebook .eeb-authors-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:30px}
.ee-ebook .eeb-author{background:#fff;border:1px solid var(--line);border-radius:16px;padding:26px;display:grid;grid-template-columns:auto 1fr;gap:18px;align-items:start}
.ee-ebook .eeb-avatar{width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,var(--navy) 0%,#2a4a7d 100%);color:#fff;display:grid;place-items:center;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:21px;overflow:hidden;flex-shrink:0}
.ee-ebook .eeb-avatar img{width:100%;height:100%;object-fit:cover;display:block}
.ee-ebook .eeb-author h4{margin:0 0 3px;font-family:'Plus Jakarta Sans',sans-serif;font-size:17px;font-weight:800;color:var(--navy)}
.ee-ebook .eeb-author .role{font-size:13px;color:var(--orange);font-weight:600;margin:0 0 8px}
.ee-ebook .eeb-author .creds{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:10px}
.ee-ebook .eeb-author .creds span{font-size:11px;background:rgba(25,51,93,.06);color:var(--navy);padding:3px 9px;border-radius:9999px;font-weight:600}
.ee-ebook .eeb-author p{font-size:14px;line-height:1.65;color:var(--mute);margin:0 0 8px}

/* CHAPTERS SECTION HEADER */
.ee-ebook .eeb-chapters-head{max-width:980px;margin:30px auto 0;padding:20px 32px;border-top:1px solid var(--line)}
.ee-ebook .eeb-chapters-head .label{font-size:11px;color:var(--orange);text-transform:uppercase;letter-spacing:2px;font-weight:700}

/* ARTICLE BODY */
.ee-ebook .eeb-article{max-width:780px;margin:0 auto;padding:0 32px 60px}
.ee-ebook .eeb-article h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(26px,2.6vw,34px);font-weight:800;color:var(--navy);margin:48px 0 16px;line-height:1.2;letter-spacing:-.015em}
.ee-ebook .eeb-article h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(20px,1.9vw,24px);font-weight:700;color:var(--navy);margin:32px 0 12px;line-height:1.3}
.ee-ebook .eeb-article h4{font-family:'Plus Jakarta Sans',sans-serif;font-size:17px;font-weight:700;color:var(--navy);margin:24px 0 10px}
.ee-ebook .eeb-article p{font-size:17px;line-height:1.8;color:#2d2d2d;margin:0 0 18px}
.ee-ebook .eeb-article ul,.ee-ebook .eeb-article ol{margin:0 0 20px;padding-left:26px}
.ee-ebook .eeb-article li{font-size:16.5px;line-height:1.75;color:#333;margin-bottom:8px}
.ee-ebook .eeb-article strong{color:var(--navy)}
.ee-ebook .eeb-article a{color:var(--orange);text-decoration:underline;text-decoration-thickness:1px;text-underline-offset:3px}
.ee-ebook .eeb-article blockquote{border-left:4px solid var(--orange);background:var(--cream);padding:18px 24px;margin:24px 0;font-family:'Source Serif Pro',Georgia,serif;font-style:italic;font-size:18px;color:var(--ink);line-height:1.6;border-radius:0 8px 8px 0}
.ee-ebook .eeb-article table{width:100%;border-collapse:collapse;margin:24px 0;font-size:14.5px;border-radius:8px;overflow:hidden;box-shadow:0 6px 18px rgba(0,0,0,.04)}
.ee-ebook .eeb-article th{background:var(--navy);color:#fff;padding:12px 16px;text-align:left;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif}
.ee-ebook .eeb-article td{padding:12px 16px;border-top:1px solid var(--line);background:#fff;color:#333}
.ee-ebook .eeb-article tr:nth-child(even) td{background:#fafaf7}
.ee-ebook .eeb-article code{background:#f3f0e8;color:#7c2d12;padding:2px 7px;border-radius:4px;font-size:14px;font-family:ui-monospace,monospace}
.ee-ebook .eeb-article hr{border:0;border-top:1px solid var(--line);margin:32px 0}

/* DESIGN SHORTCODES */
.ee-ebook .ee-takeaway{background:linear-gradient(135deg,rgba(222,110,48,.08) 0%,rgba(222,110,48,.04) 100%);border-left:4px solid var(--orange);border-radius:0 12px 12px 0;padding:18px 22px;margin:22px 0;display:flex;gap:14px;align-items:flex-start;color:var(--ink)}
.ee-ebook .ee-takeaway svg{color:var(--orange);flex-shrink:0;margin-top:3px}
.ee-ebook .ee-takeaway .tx{font-size:15.5px;line-height:1.65}
.ee-ebook .ee-takeaway b{display:block;color:var(--orange);text-transform:uppercase;letter-spacing:1.2px;font-size:11.5px;font-weight:800;margin-bottom:5px}
.ee-ebook .ee-pull{margin:28px 0;padding:24px 32px;border-top:2px solid var(--orange);border-bottom:2px solid var(--orange);text-align:center}
.ee-ebook .ee-pull p{font-family:'Source Serif Pro',Georgia,serif;font-size:clamp(20px,2vw,26px);font-style:italic;font-weight:400;color:var(--navy);line-height:1.45;margin:0}
.ee-ebook .ee-callout-box{background:#fff;border:1px solid var(--line);border-top:4px solid var(--navy);border-radius:0 0 12px 12px;padding:20px 24px;margin:24px 0;box-shadow:0 4px 12px rgba(0,0,0,.03)}
.ee-ebook .ee-callout-box .ch{display:flex;align-items:center;gap:10px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;color:var(--navy);font-size:14px;text-transform:uppercase;letter-spacing:1.4px;margin-bottom:12px}
.ee-ebook .ee-callout-box .ch .pp{width:8px;height:8px;background:var(--orange);border-radius:50%}
.ee-ebook .ee-callout-box .cbody{font-size:15.5px;line-height:1.7;color:#333}
.ee-ebook .ee-statbox{display:inline-block;background:#fff;border:1px solid var(--line);border-radius:12px;padding:18px 24px;margin:6px 8px 6px 0;text-align:center;min-width:130px}
.ee-ebook .ee-statbox .big{font-family:'Plus Jakarta Sans',sans-serif;font-size:32px;font-weight:900;color:var(--navy);line-height:1}
.ee-ebook .ee-statbox .lab{font-size:11.5px;color:var(--orange);text-transform:uppercase;letter-spacing:1.2px;margin-top:6px;font-weight:700}
.ee-ebook .ee-note-box{background:var(--cream);border-radius:10px;padding:16px 20px;margin:20px 0;border:1px solid #f1ead8}
.ee-ebook .ee-note-box .nt{display:inline-block;color:var(--orange);text-transform:uppercase;letter-spacing:1.2px;font-size:11px;font-weight:800;margin-bottom:6px}
.ee-ebook .ee-note-box p{margin:0;font-size:15px;line-height:1.65;color:#333}

/* FINAL CTA */
.ee-ebook .eeb-fcta{background:linear-gradient(135deg,var(--navy) 0%,#0f2547 100%);color:#fff;padding:80px 32px;margin-top:30px}
.ee-ebook .eeb-fcta-in{max-width:780px;margin:0 auto;text-align:center}
.ee-ebook .eeb-fcta .kicker{display:inline-block;background:rgba(222,110,48,.18);color:var(--orange);font-weight:700;font-size:11.5px;text-transform:uppercase;letter-spacing:2px;padding:7px 16px;border-radius:9999px;margin-bottom:20px}
.ee-ebook .eeb-fcta h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(28px,3.4vw,40px);font-weight:800;margin:0 0 18px;line-height:1.2;color:#fff;letter-spacing:-.02em}
.ee-ebook .eeb-fcta .lead{font-size:17px;line-height:1.7;color:rgba(255,255,255,.85);margin:0 0 28px;max-width:620px;margin-left:auto;margin-right:auto}
.ee-ebook .eeb-fcta-steps{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:14px;margin:30px 0 36px;text-align:left}
.ee-ebook .eeb-fcta-steps li{list-style:none;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:18px 20px;font-size:14.5px;line-height:1.5;color:rgba(255,255,255,.92);position:relative;padding-left:54px;counter-increment:step}
.ee-ebook .eeb-fcta-steps li::before{content:counter(step,decimal-leading-zero);position:absolute;left:18px;top:16px;background:var(--orange);color:#fff;width:28px;height:28px;border-radius:50%;display:grid;place-items:center;font-weight:800;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif}
.ee-ebook .eeb-fcta-steps{counter-reset:step;list-style:none;padding:0}
.ee-ebook .eeb-fcta .eeb-btn-primary{background:var(--orange);color:#fff}
.ee-ebook .eeb-fcta .eeb-btn-primary:hover{background:var(--orange-d)}

/* PAGE FOOTER (minimal) */
.ee-ebook .eeb-footer{background:#f3efe5;padding:30px 32px;text-align:center;font-size:13px;color:var(--mute);border-top:1px solid var(--line)}
.ee-ebook .eeb-footer a{color:var(--navy);font-weight:600}

/* FAB */
.ee-ebook .eeb-fab{position:fixed;bottom:30px;right:30px;width:56px;height:56px;border-radius:50%;background:var(--orange);color:#fff;border:none;display:none;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 12px 30px rgba(222,110,48,.4);z-index:998;transition:all .25s ease}
.ee-ebook .eeb-fab.show{display:flex}
.ee-ebook .eeb-fab:hover{transform:translateY(-3px) scale(1.05)}

/* TOAST */
.ee-ebook .eeb-toast{position:fixed;bottom:30px;left:50%;transform:translateX(-50%) translateY(20px);background:var(--navy);color:#fff;padding:13px 22px;border-radius:10px;font-weight:600;font-size:14px;box-shadow:0 12px 30px rgba(0,0,0,.18);opacity:0;pointer-events:none;transition:all .3s ease;z-index:9999}
.ee-ebook .eeb-toast.show{opacity:1;transform:translateX(-50%) translateY(0)}

/* MOBILE */
@media(max-width:980px){
  .ee-ebook .eeb-hero{grid-template-columns:1fr;padding:80px 22px 50px;gap:36px}
  .ee-ebook .eeb-formcard{position:relative;top:0;padding:24px}
  .ee-ebook .eeb-authors-grid{grid-template-columns:1fr}
  .ee-ebook .eeb-author{grid-template-columns:1fr;text-align:left}
  .ee-ebook .eeb-stats{grid-template-columns:repeat(2,1fr)}
  .ee-ebook .eeb-stat{padding:14px 0}
  .ee-ebook .eeb-stat:nth-child(2){border-right:0}
  .ee-ebook .eeb-intro,.ee-ebook .eeb-article,.ee-ebook .eeb-authors,.ee-ebook .eeb-chapters-head{padding-left:22px;padding-right:22px}
  .ee-ebook .eeb-fcta{padding:60px 22px}
}
@media(max-width:560px){
  .ee-ebook .eeb-nav-in{padding:12px 20px}
  .ee-ebook .eeb-nav-cta{padding:8px 14px;font-size:12px}
  .ee-ebook .eeb-cta-row .eeb-btn{flex:1;justify-content:center}
}
@media print{
  .ee-ebook .eeb-nav,.ee-ebook .eeb-fab,.ee-ebook .eeb-toast,.ee-ebook .eeb-progress,.ee-ebook .eeb-formcard,.ee-ebook .eeb-fcta{display:none!important}
  .ee-ebook .eeb-hero{grid-template-columns:1fr;padding:20px 0}
  body.ee-ebook-body{background:#fff;font-size:13px}
}
</style>
<?php wp_head(); ?>
</head>
<body class="ee-ebook-body <?php echo implode(' ', get_body_class()); ?>">
<div class="ee-ebook">

  <div class="eeb-progress" id="eebProgress" aria-hidden="true"></div>

  <nav class="eeb-nav" id="eebNav" aria-label="Page navigation">
    <div class="eeb-nav-in">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="eeb-brand">
        <span class="eeb-brand-dot">E</span> ExtraaEdge
      </a>
      <a href="#download" class="eeb-nav-cta">⬇ <?php echo esc_html($form_btn); ?></a>
    </div>
  </nav>

  <header class="eeb-hero" id="top">
    <div>
      <span class="eeb-kicker"><?php echo esc_html($edition); ?> · <?php echo esc_html($read_time); ?> read</span>
      <h1 class="eeb-h1"><?php echo wp_kses_post($title); ?></h1>
      <?php if ($subtitle): ?>
        <p class="eeb-sub"><?php echo wp_kses_post($subtitle); ?></p>
      <?php endif; ?>
      <div class="eeb-cta-row">
        <?php if ($cta1_text): ?><a href="<?php echo esc_url($cta1_url); ?>" class="eeb-btn eeb-btn-primary"><?php echo esc_html($cta1_text); ?> →</a><?php endif; ?>
        <?php if ($cta2_text): ?><a href="<?php echo esc_url($cta2_url); ?>" class="eeb-btn eeb-btn-ghost"><?php echo esc_html($cta2_text); ?></a><?php endif; ?>
      </div>

      <?php if ($authors): ?>
      <div class="eeb-byline">
        <?php foreach ($authors as $i => $a): ?>
          <?php if ($i > 0): ?><span class="sep">·</span><?php endif; ?>
          <span><strong><?php echo esc_html($a['name']); ?></strong><?php if ($a['role']): ?>, <?php echo esc_html($a['role']); ?><?php endif; ?></span>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <div class="eeb-stats">
        <?php foreach ($stats as $s): ?>
          <div class="eeb-stat"><div class="v"><?php echo esc_html($s['v']); ?></div><div class="l"><?php echo esc_html($s['l']); ?></div></div>
        <?php endforeach; ?>
      </div>
    </div>

    <aside id="download">
      <div class="eeb-formcard" id="eebFormCard">
        <div id="eebFormState">
          <h3><?php echo esc_html($form_title); ?></h3>
          <p class="intro">Fill in your details to get instant access to the PDF — no spam, ever.</p>
          <form id="eebForm" novalidate>
            <div class="eeb-field"><label for="ebf-name">Full name</label><input type="text" id="ebf-name" name="name" required></div>
            <div class="eeb-field"><label for="ebf-email">Work email</label><input type="email" id="ebf-email" name="email" required></div>
            <div class="eeb-field"><label for="ebf-company">Institution / Company</label><input type="text" id="ebf-company" name="company" required></div>
            <div class="eeb-field"><label for="ebf-title">Designation</label><input type="text" id="ebf-title" name="title"></div>
            <div class="eeb-field"><label for="ebf-phone">Phone (optional)</label><input type="tel" id="ebf-phone" name="phone"></div>
            <button type="submit"><?php echo esc_html($form_btn); ?> ⬇</button>
            <p class="legal">By submitting, you agree to receive occasional updates from ExtraaEdge. <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy policy</a>.</p>
          </form>
        </div>
        <div id="eebFormSuccess" class="eeb-success" style="display:none">
          <div class="ok">✓</div>
          <h4>Your PDF is ready</h4>
          <p>Check your downloads — and your inbox for the backup link.</p>
          <button type="button" id="eebRedownload" style="background:var(--orange);color:#fff;border:none;padding:12px 22px;border-radius:9px;font-weight:700;cursor:pointer;font-family:inherit">⬇ Re-download</button>
        </div>
      </div>
    </aside>
  </header>

  <?php if ($intro_lead || $intro_body): ?>
  <section class="eeb-intro" id="summary">
    <?php if ($intro_lead): ?><p class="lead"><?php echo wp_kses_post($intro_lead); ?></p><?php endif; ?>
    <?php if ($intro_body): foreach (preg_split('/\r?\n\s*\r?\n/', $intro_body) as $para):
        $para = trim($para);
        if ($para !== ''): ?>
          <p><?php echo wp_kses_post($para); ?></p>
        <?php endif;
      endforeach; endif; ?>
  </section>
  <?php endif; ?>

  <?php if ($authors): ?>
  <section class="eeb-authors">
    <div class="eeb-authors-grid">
      <?php foreach ($authors as $a): ?>
        <article class="eeb-author">
          <div class="eeb-avatar">
            <?php if (!empty($a['img'])): ?>
              <img src="<?php echo esc_url($a['img']); ?>" alt="<?php echo esc_attr($a['name']); ?>" loading="lazy" width="64" height="64">
            <?php else: ?>
              <?php echo esc_html($initials($a['name'])); ?>
            <?php endif; ?>
          </div>
          <div>
            <h4><?php echo esc_html($a['name']); ?></h4>
            <?php if ($a['role']): ?><p class="role"><?php echo esc_html($a['role']); ?></p><?php endif; ?>
            <?php if ($a['creds']): ?>
              <div class="creds">
                <?php foreach (array_filter(array_map('trim', explode(',', $a['creds']))) as $c): ?>
                  <span><?php echo esc_html($c); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <?php if ($a['bio']): foreach (preg_split('/\r?\n\s*\r?\n/', $a['bio']) as $p): $p = trim($p); if ($p !== ''): ?>
              <p><?php echo wp_kses_post($p); ?></p>
            <?php endif; endforeach; endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if (get_the_content()): ?>
  <div class="eeb-chapters-head"><span class="label">The Chapters</span></div>
  <article class="eeb-article">
    <?php the_content(); ?>
  </article>
  <?php endif; ?>

  <section class="eeb-fcta" id="scorecard">
    <div class="eeb-fcta-in">
      <span class="kicker"><?php echo esc_html($fcta_kicker); ?></span>
      <h2><?php echo esc_html($fcta_h); ?></h2>
      <?php if ($fcta_lead): ?><p class="lead"><?php echo wp_kses_post($fcta_lead); ?></p><?php endif; ?>
      <?php if ($fcta_steps): ?>
      <ol class="eeb-fcta-steps">
        <?php foreach (array_slice($fcta_steps, 0, 5) as $st): ?>
          <li><?php echo esc_html($st); ?></li>
        <?php endforeach; ?>
      </ol>
      <?php endif; ?>
      <a href="<?php echo esc_url($fcta_url); ?>" class="eeb-btn eeb-btn-primary"><?php echo esc_html($fcta_btn); ?> →</a>
    </div>
  </section>

  <footer class="eeb-footer">
    <p>
      <a href="<?php echo esc_url(home_url('/')); ?>">ExtraaEdge</a> &nbsp;·&nbsp;
      <a href="<?php echo esc_url(get_post_type_archive_link('ebook')); ?>">Browse all e-books</a> &nbsp;·&nbsp;
      <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy</a> &nbsp;·&nbsp;
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
    </p>
    <p style="margin-top:6px;font-size:12px">© <?php echo (int) date('Y'); ?> ExtraaEdge. All rights reserved.</p>
  </footer>

  <button type="button" class="eeb-fab" id="eebFab" aria-label="Back to top">↑</button>
  <div class="eeb-toast" id="eebToast" role="status" aria-live="polite"></div>
</div>

<script>
(function(){
  var nav      = document.getElementById('eebNav');
  var progress = document.getElementById('eebProgress');
  var fab      = document.getElementById('eebFab');
  var hero     = document.getElementById('top');
  var pdfUrl   = <?php echo wp_json_encode($pdf_url ?: ''); ?>;
  var bookKey  = 'ee_ebook_lead_' + <?php echo (int) $pid; ?>;

  function onScroll(){
    var st = window.pageYOffset || document.documentElement.scrollTop;
    var dh = document.documentElement.scrollHeight - window.innerHeight;
    progress.style.width = dh > 0 ? Math.min(100, (st / dh) * 100) + '%' : '0';
    var hh = hero ? hero.getBoundingClientRect().bottom : 0;
    if (st > 240 && hh < 0) { nav.classList.add('show'); fab.classList.add('show'); }
    else { nav.classList.remove('show'); fab.classList.remove('show'); }
  }
  window.addEventListener('scroll', onScroll, {passive:true});
  onScroll();

  if (fab) fab.addEventListener('click', function(){ window.scrollTo({top:0, behavior:'smooth'}); });

  var toast = document.getElementById('eebToast');
  function showToast(msg){
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(function(){ toast.classList.remove('show'); }, 3000);
  }

  function downloadPdf(){
    if (!pdfUrl){ showToast('PDF link not configured yet.'); return; }
    var a = document.createElement('a');
    a.href = pdfUrl; a.download = ''; a.rel = 'noopener';
    document.body.appendChild(a); a.click(); document.body.removeChild(a);
  }

  var form = document.getElementById('eebForm');
  var state = document.getElementById('eebFormState');
  var success = document.getElementById('eebFormSuccess');
  var card = document.getElementById('eebFormCard');

  function showSuccess(){
    state.style.display = 'none';
    success.style.display = '';
    card.classList.add('is-success');
  }

  try {
    if (localStorage.getItem(bookKey) === '1') {
      showSuccess();
    }
  } catch(e){}

  if (form) {
    form.addEventListener('submit', function(e){
      e.preventDefault();
      var ok = true;
      ['ebf-name','ebf-email','ebf-company'].forEach(function(id){
        var el = document.getElementById(id);
        if (!el.value.trim()) { el.classList.add('err'); ok = false; }
        else el.classList.remove('err');
      });
      var em = document.getElementById('ebf-email');
      if (em.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em.value)){ em.classList.add('err'); ok = false; }
      if (!ok){ showToast('Please complete the required fields.'); return; }

      try { localStorage.setItem(bookKey, '1'); } catch(e){}
      showSuccess();
      showToast('Thanks! Starting your download…');
      setTimeout(downloadPdf, 600);
    });
  }

  var rd = document.getElementById('eebRedownload');
  if (rd) rd.addEventListener('click', downloadPdf);
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
