<?php
/**
 * single-ebook.php — Premium white-paper / e-book template (standalone HTML).
 * Pulls editable content from the 📚 Ebook Settings meta box + body shortcodes.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

if (!have_posts()) { status_header(404); nocache_headers(); echo '<!doctype html><meta charset="utf-8"><title>404</title>'; exit; }
the_post();

$pid = get_the_ID();
$g   = function ($k, $d = '') use ($pid) {
    $v = get_post_meta($pid, '_ee_ebook_' . $k, true);
    return ($v !== '' && $v !== null) ? $v : $d;
};

$title      = get_the_title($pid);
$permalink  = get_permalink($pid);
$seo_title  = get_post_meta($pid, '_seo_title', true) ?: $title;
$seo_desc   = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 30);
$og_image   = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');

$edition    = $g('edition', 'White Paper · Edition 2024');
$subtitle   = $g('subtitle');
$cta1_text  = $g('cta1_text', 'Take the operational fit assessment');
$cta1_url   = $g('cta1_url', '#scorecard');
$cta2_text  = $g('cta2_text', 'Start reading');
$cta2_url   = $g('cta2_url', '#summary');

$stats = array();
for ($i = 1; $i <= 4; $i++) {
    $v = $g("stat{$i}_v"); $l = $g("stat{$i}_l");
    if ($v || $l) $stats[] = array('v' => $v ?: '—', 'l' => $l ?: '');
}
if (!$stats) $stats = array(
    array('v' => '—',    'l' => 'Read time'),
    array('v' => '6',    'l' => 'Chapters'),
    array('v' => '500+', 'l' => 'Institutions'),
    array('v' => '18-pt','l' => 'Scorecard'),
);

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
$initials = function ($name) {
    $parts = preg_split('/\s+/', trim($name));
    $a = isset($parts[0][0]) ? $parts[0][0] : '';
    $b = (count($parts) > 1 && isset($parts[count($parts) - 1][0])) ? $parts[count($parts) - 1][0] : '';
    return strtoupper($a . $b);
};

$intro_lead = $g('intro_lead');
$intro_body = $g('intro_body');

$fcta_kicker = $g('fcta_kicker', 'Your First Step — From Blueprint to Reality');
$fcta_h      = $g('fcta_h', 'Join the Admissions Transformation Masterclass');
$fcta_lead   = $g('fcta_lead');
$fcta_steps  = array_filter(array_map('trim', preg_split('/\r?\n/', (string) $g('fcta_steps'))));
$fcta_btn    = $g('fcta_btn', 'Request an invitation');
$fcta_url    = $g('fcta_url', '/book-demo/');

$pdf_url     = $g('pdf_url');
$form_title  = $g('form_title', 'Download the PDF');
$form_btn    = $g('form_btn', 'Download the Ebook');

/* Chapters come from the repeater meta field. Fallback: the_content(). */
$chapters = get_post_meta($pid, '_ee_ebook_chapters', true);
if (!is_array($chapters)) $chapters = array();

$toc = array();
$body_html = '';
if ($chapters) {
    $last = count($chapters) - 1;
    foreach ($chapters as $i => $ch) {
        $cid   = !empty($ch['id'])  ? $ch['id']  : ('ch' . ($i + 1));
        $cnum  = isset($ch['num'])  ? $ch['num'] : '';
        $cha   = isset($ch['h'])    ? $ch['h']   : '';
        $cbody = isset($ch['body']) ? $ch['body'] : '';
        $cscor = !empty($ch['scorecard']);

        $toc[] = array('id' => $cid, 'num' => $cnum, 'h' => $cha);

        $body_html .= '<section class="chapter reveal" id="' . esc_attr($cid) . '">';
        $body_html .= '<div class="chap-head">';
        if ($cnum !== '') $body_html .= '<div class="chap-num">' . esc_html($cnum) . ' <span class="rt" data-rt></span></div>';
        if ($cha  !== '') $body_html .= '<h2>' . esc_html($cha) . '</h2>';
        $body_html .= '</div>';
        $body_html .= do_shortcode(wpautop(trim($cbody)));
        if ($cscor) $body_html .= do_shortcode('[ee_scorecard]');
        $body_html .= '</section>';
        if ($i < $last) $body_html .= '<div class="divider-d"></div>';
    }
} else {
    /* Legacy fallback: render the WordPress editor content. */
    $body_html = apply_filters('the_content', get_the_content());
    $body_html = str_replace(']]>', ']]&gt;', $body_html);
    if (preg_match_all('/<section[^>]*class="[^"]*chapter[^"]*"[^>]*(?:id="([^"]+)")?[^>]*>.*?<div\s+class="chap-num">([^<]+)<.*?<h2[^>]*>(.*?)<\/h2>/is', $body_html, $m, PREG_SET_ORDER)) {
        foreach ($m as $hit) {
            $id  = $hit[1] ? $hit[1] : sanitize_title($hit[3]);
            $num = trim(wp_strip_all_tags($hit[2]));
            $h   = trim(wp_strip_all_tags($hit[3]));
            $toc[] = array('id' => $id, 'num' => $num, 'h' => $h);
        }
    }
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
<title><?php echo esc_html($seo_title); ?> — White Paper</title>
<meta name="description" content="<?php echo esc_attr($seo_desc); ?>">
<link rel="canonical" href="<?php echo esc_url($permalink); ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo esc_attr($seo_title); ?>">
<meta property="og:description" content="<?php echo esc_attr($seo_desc); ?>">
<meta property="og:url" content="<?php echo esc_url($permalink); ?>">
<?php if ($og_image): ?><meta property="og:image" content="<?php echo esc_url($og_image); ?>"><?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{
  --orange:#DE6E30; --orange-700:#C25A22; --orange-100:#FBE6D6; --orange-50:#FDF4EC;
  --blue:#19335D; --blue-700:#122845; --blue-900:#0C1B33; --blue-100:#E6ECF5; --blue-50:#F3F6FB;
  --ink:#0B1A33; --body:#2A384E; --muted:#5A6880; --muted-2:#909CB0;
  --line:#E8EDF4; --line-strong:#D5DEEA; --paper:#FFFFFF; --paper-2:#FBFCFE;
  --green:#1A9E5F; --red:#D9534F;
  /* Inter-only — the site design system (labels keep their spaced-caps
     voice via letter-spacing, not a second typeface) */
  --mono:'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  --sans:'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  --serif:'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  --ease:cubic-bezier(.2,.7,.2,1); --ease-out:cubic-bezier(.16,1,.3,1);
  --maxw:1240px;
}
*,*::before,*::after{box-sizing:border-box}
html{scroll-behavior:smooth}
body.ee-ebook-body{margin:0;background:var(--paper);color:var(--body);font-family:var(--sans);line-height:1.5;-webkit-font-smoothing:antialiased;overflow-x:hidden}
body.ee-ebook-body.lock{overflow:hidden}
body.ee-ebook-body a{text-decoration:none;color:inherit}
body.ee-ebook-body button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit}
.ee-ebook .tnum{font-variant-numeric:tabular-nums}
.ee-ebook .wrap{max-width:var(--maxw);margin:0 auto;padding:0 clamp(18px,4vw,44px);position:relative}
.ee-ebook .grain{position:fixed;inset:0;z-index:120;pointer-events:none;opacity:.018;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")}
.ee-ebook .progress{position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,var(--orange),#f0a25e);width:0;z-index:130;transition:width .08s linear}

/* NAVBAR */
.ee-ebook .nav{position:fixed;top:0;left:0;right:0;z-index:110;background:rgba(255,255,255,.86);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid var(--line);transform:translateY(-100%);transition:transform .4s var(--ease-out)}
.ee-ebook .nav.show{transform:none}
.ee-ebook .nav-in{max-width:var(--maxw);margin:0 auto;padding:0 clamp(14px,4vw,44px);height:62px;display:flex;align-items:center;justify-content:space-between;gap:14px}
.ee-ebook .brand{display:flex;align-items:center;gap:12px;min-width:0}
.ee-ebook .brand .logo{display:flex;align-items:center;gap:8px;font-weight:700;font-size:14px;letter-spacing:-.01em;color:var(--ink);white-space:nowrap}
.ee-ebook .brand .logo .x{color:var(--muted-2);font-weight:400}
.ee-ebook .brand .tag{font-family:var(--mono);font-size:9.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--muted-2);border-left:1px solid var(--line-strong);padding-left:12px}
.ee-ebook .nav-mid{flex:1;min-width:0;text-align:center;font-size:12.5px;color:var(--muted);font-weight:500;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.ee-ebook .nav-act{display:flex;align-items:center;gap:10px}
.ee-ebook .pct{font-family:var(--mono);font-size:12px;color:var(--muted);min-width:36px;text-align:right}
.ee-ebook .nav-btn{display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;padding:9px 14px;border-radius:9px;transition:all .25s var(--ease)}
.ee-ebook .nav-btn.ghost{color:var(--ink);border:1px solid var(--line-strong)}
.ee-ebook .nav-btn.ghost:hover{border-color:var(--blue);background:var(--blue-50)}
.ee-ebook .nav-btn.solid{background:var(--orange);color:#fff;box-shadow:0 8px 18px -8px rgba(222,110,48,.7)}
.ee-ebook .nav-btn.solid:hover{background:var(--orange-700);color:#fff}

.ee-ebook .kicker{font-family:var(--mono);font-size:11px;font-weight:500;letter-spacing:.22em;text-transform:uppercase;color:var(--orange);display:inline-flex;align-items:center;gap:10px}
.ee-ebook .kicker::before{content:"";width:18px;height:1px;background:var(--orange)}

/* HERO */
.ee-ebook .hero{position:relative;overflow:hidden;color:#fff;background:linear-gradient(155deg,var(--blue-900),var(--blue) 70%,#1d3c6b);padding:80px 0 76px}
.ee-ebook .hero::before{content:"";position:absolute;inset:0;z-index:0;background:radial-gradient(760px 440px at 88% 0%, rgba(222,110,48,.36), transparent 58%)}
.ee-ebook .hero::after{content:"";position:absolute;inset:0;z-index:0;background-image:linear-gradient(to right,rgba(255,255,255,.04) 1px,transparent 1px),linear-gradient(to bottom,rgba(255,255,255,.04) 1px,transparent 1px);background-size:54px 54px;mask-image:radial-gradient(ellipse 100% 80% at 22% 0%,#000 30%,transparent 78%);-webkit-mask-image:radial-gradient(ellipse 100% 80% at 22% 0%,#000 30%,transparent 78%)}
.ee-ebook .hero .wrap{position:relative;z-index:2}
.ee-ebook .hero-grid{display:grid;grid-template-columns:1fr 380px;gap:48px;align-items:start}
.ee-ebook .issue{display:flex;align-items:center;gap:14px;font-family:var(--mono);font-size:10.5px;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:24px}
.ee-ebook .issue .pill{border:1px solid rgba(255,255,255,.22);padding:6px 12px;border-radius:999px;color:rgba(255,255,255,.84)}
.ee-ebook .issue .ln{flex:0 0 30px;height:1px;background:rgba(255,255,255,.25)}
.ee-ebook .hero h1{font-size:clamp(29px,4.6vw,52px);line-height:1.03;font-weight:700;letter-spacing:-.035em;margin:0 0 20px;color:#fff}
.ee-ebook .hero h1 em{font-style:normal;color:var(--orange)}
.ee-ebook .hero .sub{font-size:17.5px;line-height:1.6;color:rgba(255,255,255,.78);margin:0 0 26px;max-width:560px}
.ee-ebook .hero .by{display:flex;gap:10px;align-items:center;font-family:var(--mono);font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:rgba(255,255,255,.6);flex-wrap:wrap;margin-bottom:26px}
.ee-ebook .hero .by b{color:#fff;font-weight:600}
.ee-ebook .hero .by .dim{color:rgba(255,255,255,.42)}
.ee-ebook .hero .by .dot{width:4px;height:4px;border-radius:999px;background:var(--orange)}
.ee-ebook .hero-cta{display:flex;gap:12px;flex-wrap:wrap;align-items:center;margin-bottom:34px}
.ee-ebook .btn{display:inline-flex;align-items:center;gap:10px;padding:13px 22px;border-radius:11px;font-size:14px;font-weight:600;transition:all .3s var(--ease);white-space:nowrap;cursor:pointer;border:0;font-family:inherit}
.ee-ebook .btn-orange{background:var(--orange);color:#fff;box-shadow:0 16px 34px -12px rgba(222,110,48,.7)}
.ee-ebook .btn-orange:hover{background:var(--orange-700);transform:translateY(-2px);color:#fff}
.ee-ebook .btn-ghost-d{background:rgba(255,255,255,.06);color:#fff;border:1px solid rgba(255,255,255,.22)}
.ee-ebook .btn-ghost-d:hover{background:rgba(255,255,255,.12);color:#fff}
.ee-ebook .hero-meta{display:flex;gap:0;border:1px solid rgba(255,255,255,.14);border-radius:13px;overflow:hidden;background:rgba(255,255,255,.03);max-width:560px}
.ee-ebook .hero-meta .m{flex:1;padding:15px 18px;border-right:1px solid rgba(255,255,255,.12)}
.ee-ebook .hero-meta .m:last-child{border-right:0}
.ee-ebook .hero-meta .m b{display:block;font-size:19px;font-weight:700;letter-spacing:-.02em}
.ee-ebook .hero-meta .m span{font-family:var(--mono);font-size:9.5px;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.5)}

/* FORM CARD */
.ee-ebook .form-card{background:var(--paper);border-radius:18px;overflow:hidden;box-shadow:0 50px 100px -40px rgba(0,0,0,.7), 0 12px 30px -12px rgba(0,0,0,.45);position:relative}
.ee-ebook .fc-top{position:relative;background:linear-gradient(155deg,var(--orange-50),#fff);padding:22px 24px;border-bottom:1px solid var(--line);display:flex;align-items:center;gap:14px}
.ee-ebook .fc-book{width:46px;height:60px;flex-shrink:0;border-radius:2px 5px 5px 2px;background:linear-gradient(150deg,var(--blue-900),var(--blue));position:relative;box-shadow:0 14px 24px -10px rgba(11,26,51,.55);display:flex;align-items:center;justify-content:center;transform:rotate(-4deg);color:#fff}
.ee-ebook .fc-book::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:rgba(0,0,0,.3);border-radius:2px 0 0 2px}
.ee-ebook .fc-book::after{content:"";position:absolute;left:8px;right:6px;top:48px;height:2px;background:var(--orange);border-radius:1px}
.ee-ebook .fc-top .meta .tag{font-family:var(--mono);font-size:9.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange);font-weight:600}
.ee-ebook .fc-top .meta h3{margin:5px 0 4px;font-size:14.5px;font-weight:700;letter-spacing:-.01em;color:var(--ink);line-height:1.3}
.ee-ebook .fc-top .meta .fmt{font-family:var(--mono);font-size:10px;color:var(--muted);letter-spacing:.04em}
.ee-ebook .fc-body{padding:20px 22px 22px}
.ee-ebook .fc-body .ft{font-size:14px;font-weight:700;letter-spacing:-.005em;color:var(--ink);margin-bottom:14px}
.ee-ebook .field{margin-bottom:11px}
.ee-ebook .field label{display:block;font-family:var(--mono);font-size:9.5px;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:var(--muted);margin-bottom:5px}
.ee-ebook .field label .req{color:var(--orange)}
.ee-ebook .field input{width:100%;padding:10px 12px;border:1px solid var(--line-strong);border-radius:9px;font-size:13.5px;color:var(--ink);background:var(--paper);transition:all .2s var(--ease);outline:none;font-family:inherit}
.ee-ebook .field input::placeholder{color:var(--muted-2)}
.ee-ebook .field input:focus{border-color:var(--blue);box-shadow:0 0 0 3px var(--blue-50)}
.ee-ebook .field input.err{border-color:var(--red);box-shadow:0 0 0 3px #fdece8}
.ee-ebook .field .msg{font-size:10.5px;color:var(--red);margin-top:4px;display:none}
.ee-ebook .field.invalid .msg{display:block}
.ee-ebook .grid2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.ee-ebook .grid2 .field{margin-bottom:0}
.ee-ebook .fc-submit{width:100%;margin-top:14px;padding:13px;border-radius:10px;background:var(--orange);color:#fff;font-size:13.5px;font-weight:600;display:inline-flex;align-items:center;justify-content:center;gap:9px;transition:all .3s var(--ease);box-shadow:0 14px 28px -10px rgba(222,110,48,.7);border:0;cursor:pointer;font-family:inherit}
.ee-ebook .fc-submit:hover{background:var(--orange-700);transform:translateY(-1px)}
.ee-ebook .consent{font-size:10.5px;line-height:1.5;color:var(--muted-2);margin:10px 0 0;text-align:center}
.ee-ebook .consent a{color:var(--muted);text-decoration:underline;text-underline-offset:2px}
.ee-ebook .trustline{display:flex;align-items:center;justify-content:center;gap:7px;margin-top:10px;font-family:var(--mono);font-size:9.5px;letter-spacing:.04em;color:var(--muted-2)}
.ee-ebook .trustline svg{color:var(--green)}
.ee-ebook .fc-success{display:none;text-align:center;padding:12px 4px}
.ee-ebook .fc-success.show{display:block}
.ee-ebook .fc-success .ok{width:54px;height:54px;border-radius:999px;background:#EAF7EE;color:var(--green);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;border:1px solid #CDEBD6}
.ee-ebook .fc-success h4{margin:0 0 6px;font-size:16px;font-weight:700;letter-spacing:-.015em;color:var(--ink)}
.ee-ebook .fc-success p{margin:0 0 14px;font-size:12.5px;color:var(--muted);line-height:1.55}
.ee-ebook .fc-success p b{color:var(--ink)}
.ee-ebook .fc-success .relink{display:inline-flex;align-items:center;gap:7px;font-family:var(--mono);font-size:11px;letter-spacing:.04em;color:var(--orange);font-weight:500;text-transform:uppercase;padding:9px 14px;border:1px solid var(--orange-100);border-radius:9px;transition:all .25s var(--ease);cursor:pointer;background:transparent}
.ee-ebook .fc-success .relink:hover{background:var(--orange-50)}
.ee-ebook .form-hidden{display:none !important}

/* MODAL */
.ee-ebook .modal-bg{position:fixed;inset:0;z-index:150;background:rgba(11,26,51,.55);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;pointer-events:none;transition:opacity .3s var(--ease)}
.ee-ebook .modal-bg.show{opacity:1;pointer-events:auto}
.ee-ebook .modal-card{background:var(--paper);border-radius:18px;overflow:hidden;max-width:460px;width:100%;box-shadow:0 60px 120px -40px rgba(0,0,0,.6);transform:scale(.96) translateY(8px);transition:transform .35s var(--ease-out);max-height:calc(100vh - 48px);max-height:calc(100dvh - 48px);overflow-y:auto;position:relative}
.ee-ebook .modal-bg.show .modal-card{transform:none}
.ee-ebook .modal-close{position:absolute;top:18px;right:20px;width:32px;height:32px;border-radius:9px;background:rgba(255,255,255,.12);color:#fff;display:flex;align-items:center;justify-content:center;transition:all .2s;z-index:5;cursor:pointer;border:0}
.ee-ebook .modal-close:hover{background:rgba(255,255,255,.22)}

/* INTRO */
.ee-ebook .intro{padding:72px 0;border-bottom:1px solid var(--line)}
.ee-ebook .intro .wrap{max-width:860px}
.ee-ebook .intro p{font-size:17px;line-height:1.78;color:var(--body);margin:0 0 18px}
.ee-ebook .intro p.lead{font-size:clamp(19px,2.6vw,24px);line-height:1.5;font-weight:600;letter-spacing:-.015em;color:var(--ink);margin-bottom:22px}
.ee-ebook .intro b,.ee-ebook .intro strong{font-weight:600;color:var(--ink)}
.ee-ebook .term{color:var(--orange);font-weight:600}

/* AUTHORS */
.ee-ebook .authors{padding:64px 0;background:var(--paper-2);border-bottom:1px solid var(--line)}
.ee-ebook .authors .eyebrow{font-family:var(--mono);font-size:11px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--orange);margin-bottom:8px}
.ee-ebook .authors h3.sec{font-size:24px;font-weight:700;letter-spacing:-.02em;color:var(--ink);margin:0 0 32px}
.ee-ebook .author-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:24px}
.ee-ebook .author{background:var(--paper);border:1px solid var(--line-strong);border-radius:18px;padding:30px;transition:box-shadow .35s var(--ease),transform .35s var(--ease-out);position:relative;overflow:hidden}
.ee-ebook .author:hover{box-shadow:0 30px 60px -32px rgba(11,26,51,.3);transform:translateY(-4px)}
.ee-ebook .author .ah{display:flex;align-items:center;gap:18px;margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--line)}
.ee-ebook .author .portrait{width:78px;height:78px;border-radius:999px;flex-shrink:0;overflow:hidden;border:3px solid var(--paper);box-shadow:0 18px 30px -16px rgba(11,26,51,.4), 0 0 0 1px var(--line-strong);background:linear-gradient(135deg,var(--blue),#2a4a7d);color:#fff;display:grid;place-items:center;font-family:var(--sans);font-weight:800;font-size:22px}
.ee-ebook .author .portrait img{width:100%;height:100%;object-fit:cover;display:block}
.ee-ebook .author .an{font-size:18px;font-weight:700;letter-spacing:-.015em;color:var(--ink)}
.ee-ebook .author .ar{font-family:var(--mono);font-size:11px;color:var(--muted);letter-spacing:.02em;margin-top:3px}
.ee-ebook .author .creds{margin-top:6px;display:flex;gap:8px;flex-wrap:wrap}
.ee-ebook .author .creds span{font-family:var(--mono);font-size:9.5px;letter-spacing:.06em;text-transform:uppercase;color:var(--muted);background:var(--blue-50);padding:3px 8px;border-radius:5px}
.ee-ebook .author p{font-size:13.5px;line-height:1.72;color:var(--muted);margin:0 0 12px}
.ee-ebook .author p:last-child{margin-bottom:0}

/* READER */
.ee-ebook .reader{padding:72px 0 100px}
.ee-ebook .reader-grid{display:grid;grid-template-columns:260px 1fr;gap:64px;align-items:start}
.ee-ebook .toc{position:sticky;top:80px;max-height:calc(100vh - 110px);overflow-y:auto;scrollbar-width:thin;padding-right:6px}
.ee-ebook .toc::-webkit-scrollbar{width:4px}.ee-ebook .toc::-webkit-scrollbar-thumb{background:var(--line-strong);border-radius:4px}
.ee-ebook .toc .th{font-family:var(--mono);font-size:10px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--muted-2);margin-bottom:8px;display:flex;justify-content:space-between;align-items:center}
.ee-ebook .toc .th .rt{color:var(--orange)}
.ee-ebook .toc-prog{height:3px;background:var(--line);border-radius:3px;overflow:hidden;margin-bottom:18px}
.ee-ebook .toc-prog i{display:block;height:100%;width:0;background:var(--orange);transition:width .15s linear}
.ee-ebook .toc ul{list-style:none;margin:0;padding:0}
.ee-ebook .toc > ul > li{margin-bottom:2px}
.ee-ebook .toc a{display:block;font-size:13px;color:var(--muted);padding:7px 11px;border-radius:8px;line-height:1.35;transition:all .2s var(--ease);border-left:2px solid transparent}
.ee-ebook .toc a:hover{color:var(--ink);background:var(--blue-50)}
.ee-ebook .toc a.chap{font-weight:600;color:var(--ink);font-size:13px;display:flex;align-items:center;gap:9px}
.ee-ebook .toc a.active{color:var(--orange-700);background:var(--orange-50);border-left-color:var(--orange)}
.ee-ebook .toc .num{font-family:var(--mono);color:var(--orange);font-size:11px}
.ee-ebook .toc-dl{margin-top:18px;width:100%;display:flex;align-items:center;justify-content:center;gap:8px;padding:12px;background:var(--orange);color:#fff;border-radius:11px;font-size:12.5px;font-weight:600;transition:all .25s var(--ease);box-shadow:0 12px 26px -14px rgba(222,110,48,.7);cursor:pointer;border:0;font-family:inherit}
.ee-ebook .toc-dl:hover{background:var(--orange-700);transform:translateY(-1px)}

/* ARTICLE */
.ee-ebook .article{max-width:760px;min-width:0}
.ee-ebook .article .chapter{scroll-margin-top:80px;margin-bottom:8px}
.ee-ebook .article .chap-head{margin-bottom:24px}
.ee-ebook .article .chap-num{font-family:var(--mono);font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--orange);display:flex;align-items:center;gap:14px;margin-bottom:16px}
.ee-ebook .article .chap-num::after{content:"";flex:1;height:1px;background:var(--line)}
.ee-ebook .article .chap-num .rt{color:var(--muted-2);letter-spacing:.04em}
.ee-ebook .article h2{font-size:clamp(27px,3.3vw,36px);line-height:1.1;font-weight:700;letter-spacing:-.028em;color:var(--ink);margin:0 0 18px}
.ee-ebook .article h3{font-size:21px;font-weight:700;letter-spacing:-.018em;color:var(--ink);margin:38px 0 12px;scroll-margin-top:80px}
.ee-ebook .article h4{font-size:15.5px;font-weight:700;color:var(--blue);margin:26px 0 9px}
.ee-ebook .article p{font-size:15.5px;line-height:1.8;color:var(--body);margin:0 0 18px}
.ee-ebook .article p b,.ee-ebook .article p strong,.ee-ebook .article li b,.ee-ebook .article li strong{color:var(--ink);font-weight:600}
.ee-ebook .article ul{margin:0 0 18px;padding-left:0;list-style:none}
.ee-ebook .article ul li{position:relative;padding-left:26px;font-size:15px;line-height:1.72;color:var(--body);margin-bottom:11px}
.ee-ebook .article ul li::before{content:"";position:absolute;left:3px;top:10px;width:7px;height:7px;border-radius:2px;background:var(--orange)}
.ee-ebook .article ol{margin:0 0 18px;padding-left:0;list-style:none;counter-reset:ol}
.ee-ebook .article ol li{position:relative;padding-left:38px;font-size:15px;line-height:1.72;color:var(--body);margin-bottom:13px;counter-increment:ol}
.ee-ebook .article ol li::before{content:counter(ol,decimal-leading-zero);position:absolute;left:0;top:1px;font-family:var(--mono);font-size:12px;font-weight:600;color:var(--orange);background:var(--orange-50);border:1px solid var(--orange-100);width:24px;height:24px;border-radius:7px;display:flex;align-items:center;justify-content:center}
.ee-ebook .article a{color:var(--orange);text-decoration:underline;text-underline-offset:3px}
.ee-ebook .article table{width:100%;border-collapse:collapse;margin:24px 0;font-size:13.5px;border:1px solid var(--line-strong);border-radius:14px;overflow:hidden}
@media (max-width:760px){.ee-ebook .article table{display:block;overflow-x:auto;-webkit-overflow-scrolling:touch;white-space:normal}}
.ee-ebook .article th{background:var(--blue);color:#fff;padding:12px 14px;text-align:left}
.ee-ebook .article td{padding:12px 14px;border-top:1px solid var(--line);color:var(--body)}
.ee-ebook .divider-d{height:1px;background:var(--line);margin:52px 0}

/* DESIGN BLOCKS */
.ee-ebook .takeaway{display:flex;gap:12px;align-items:flex-start;background:var(--orange-50);border:1px solid var(--orange-100);border-radius:13px;padding:15px 18px;margin:0 0 26px}
.ee-ebook .takeaway svg{color:var(--orange);flex-shrink:0;margin-top:1px}
.ee-ebook .takeaway .tx{font-size:13.5px;line-height:1.55;color:var(--ink)}
.ee-ebook .takeaway .tx b{font-family:var(--mono);font-size:9.5px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange);display:block;margin-bottom:3px;font-weight:600}
.ee-ebook .pull{margin:32px 0;padding:4px 0 4px 26px;border-left:3px solid var(--orange)}
.ee-ebook .pull p{font-size:clamp(18px,2.4vw,23px);line-height:1.45;color:var(--ink);margin:0;font-weight:600;letter-spacing:-.015em}
.ee-ebook .callout{margin:30px 0;border:1px solid var(--line-strong);border-radius:16px;overflow:hidden;box-shadow:0 18px 40px -28px rgba(11,26,51,.3)}
.ee-ebook .callout .ch{background:var(--blue-900);color:#fff;padding:13px 22px;font-family:var(--mono);font-size:11px;letter-spacing:.16em;text-transform:uppercase;display:flex;align-items:center;gap:10px}
.ee-ebook .callout .ch .pp{width:7px;height:7px;border-radius:999px;background:var(--orange)}
.ee-ebook .callout .cbody{padding:24px;background:var(--paper-2)}
.ee-ebook .statbox{margin:30px 0;display:flex;align-items:center;gap:26px;background:linear-gradient(135deg,var(--blue-900),var(--blue));border-radius:16px;padding:30px 34px;color:#fff;flex-wrap:wrap;position:relative;overflow:hidden}
.ee-ebook .statbox::after{content:"";position:absolute;right:-30px;top:-30px;width:180px;height:180px;border-radius:999px;background:radial-gradient(circle,rgba(222,110,48,.4),transparent 65%)}
.ee-ebook .statbox .big{font-size:clamp(36px,6vw,54px);font-weight:700;letter-spacing:-.03em;color:var(--orange);line-height:1;font-variant-numeric:tabular-nums;position:relative;z-index:1}
.ee-ebook .statbox .lab{font-size:14.5px;line-height:1.5;color:rgba(255,255,255,.86);max-width:360px;position:relative;z-index:1}
.ee-ebook .statbox .lab b{color:#fff}
.ee-ebook .note{margin:26px 0;background:var(--orange-50);border:1px solid var(--orange-100);border-radius:14px;padding:20px 24px}
.ee-ebook .note p{margin:0;font-size:14.5px;line-height:1.65;color:var(--ink)}
.ee-ebook .note .nt{font-family:var(--mono);font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange);font-weight:600;margin-bottom:6px;display:block}
.ee-ebook .persona{border:1px solid var(--line-strong);border-left:3px solid var(--orange);border-radius:0 14px 14px 0;padding:22px 24px;margin:18px 0;background:var(--paper-2)}
.ee-ebook .persona .pt{font-size:15.5px;font-weight:700;color:var(--ink);margin:0 0 12px;display:flex;align-items:center;gap:11px}
.ee-ebook .persona .pt .pk{font-family:var(--mono);font-size:12px;color:#fff;background:var(--orange);width:26px;height:26px;border-radius:7px;display:flex;align-items:center;justify-content:center}
.ee-ebook .persona p{font-size:13.5px;line-height:1.62;margin:0 0 9px;color:var(--body)}
.ee-ebook .persona p:last-child{margin-bottom:0}
.ee-ebook .stack{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin:26px 0}
.ee-ebook .scard{border:1px solid var(--line-strong);border-radius:14px;padding:20px 22px;background:var(--paper);transition:border-color .3s,transform .35s var(--ease-out)}
.ee-ebook .scard:hover{border-color:var(--orange);transform:translateY(-3px)}
.ee-ebook .scard .si{width:40px;height:40px;border-radius:11px;background:var(--blue-50);border:1px solid var(--line);color:var(--blue);display:flex;align-items:center;justify-content:center;margin-bottom:13px;transition:all .3s}
.ee-ebook .scard:hover .si{background:var(--orange);border-color:var(--orange);color:#fff}
.ee-ebook .scard h5{margin:0 0 5px;font-size:14.5px;font-weight:700;color:var(--ink)}
.ee-ebook .scard h5 span{color:var(--orange)}
.ee-ebook .scard p{margin:0;font-size:12.5px;line-height:1.55;color:var(--muted)}

/* SCORECARD */
.ee-ebook .scorecard{margin:32px 0;border:1px solid var(--line-strong);border-radius:18px;overflow:hidden;box-shadow:0 24px 60px -34px rgba(11,26,51,.35)}
.ee-ebook .sc-head{background:var(--blue-900);color:#fff;padding:24px 26px;position:relative;overflow:hidden}
.ee-ebook .sc-head::after{content:"";position:absolute;right:-20px;top:-40px;width:200px;height:200px;border-radius:999px;background:radial-gradient(circle,rgba(222,110,48,.35),transparent 65%)}
.ee-ebook .sc-head h4{margin:0 0 6px;font-size:17px;color:#fff;font-weight:700;position:relative;z-index:1}
.ee-ebook .sc-head p{margin:0;font-size:12.5px;color:rgba(255,255,255,.66);line-height:1.5;position:relative;z-index:1}
.ee-ebook .sc-legend{display:flex;gap:8px;margin-top:15px;flex-wrap:wrap;position:relative;z-index:1}
.ee-ebook .sc-legend span{font-family:var(--mono);font-size:10px;letter-spacing:.03em;color:rgba(255,255,255,.85);background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);padding:6px 10px;border-radius:7px}
.ee-ebook .sc-cat{padding:10px 26px;background:var(--blue-50);font-family:var(--mono);font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--blue);font-weight:600;border-top:1px solid var(--line);border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center}
.ee-ebook .sc-cat .cscore{color:var(--orange)}
.ee-ebook .sc-row{display:flex;align-items:center;gap:18px;padding:15px 26px;border-bottom:1px solid var(--line);transition:background .2s}
.ee-ebook .sc-row:hover{background:var(--paper-2)}
.ee-ebook .sc-row .q{flex:1;font-size:13.5px;line-height:1.5;color:var(--body)}
.ee-ebook .sc-opts{display:flex;gap:6px;flex-shrink:0}
.ee-ebook .sc-opts button{width:36px;height:36px;border-radius:9px;border:1px solid var(--line-strong);font-family:var(--mono);font-size:13px;font-weight:600;color:var(--muted);transition:all .18s var(--ease);background:#fff;cursor:pointer}
.ee-ebook .sc-opts button:hover{border-color:var(--blue);color:var(--ink)}
.ee-ebook .sc-opts button.sel{background:var(--orange);border-color:var(--orange);color:#fff;transform:scale(1.06)}
.ee-ebook .sc-result{padding:26px;background:var(--paper);border-top:2px solid var(--blue-900)}
.ee-ebook .sc-result-grid{display:grid;grid-template-columns:.85fr 1.15fr;gap:30px;align-items:center}
.ee-ebook .sc-total{font-size:46px;font-weight:700;letter-spacing:-.03em;color:var(--ink);font-variant-numeric:tabular-nums;line-height:1}
.ee-ebook .sc-total small{font-size:20px;color:var(--muted-2);font-weight:600}
.ee-ebook .sc-answered{font-family:var(--mono);font-size:11px;color:var(--muted-2);letter-spacing:.04em;margin:8px 0 12px}
.ee-ebook .sc-band-name{font-size:16px;font-weight:700;color:var(--ink)}
.ee-ebook .sc-band-desc{font-size:13px;color:var(--muted);line-height:1.55;margin-top:5px}
.ee-ebook .sc-meter{height:9px;border-radius:999px;background:var(--line);overflow:hidden;margin-top:14px}
.ee-ebook .sc-meter i{display:block;height:100%;width:0;border-radius:999px;background:linear-gradient(90deg,var(--orange),#f0a25e);transition:width .5s var(--ease-out)}
.ee-ebook .sc-reset{margin-top:16px;display:inline-flex;align-items:center;gap:7px;font-family:var(--mono);font-size:11px;letter-spacing:.06em;text-transform:uppercase;color:var(--muted);border:1px solid var(--line-strong);padding:8px 14px;border-radius:8px;transition:all .25s;background:#fff;cursor:pointer}
.ee-ebook .sc-reset:hover{border-color:var(--orange);color:var(--orange)}
.ee-ebook .sc-cats{display:flex;flex-direction:column;gap:11px}
.ee-ebook .sc-catbar{display:grid;grid-template-columns:130px 1fr 42px;gap:12px;align-items:center}
.ee-ebook .sc-catbar .cl{font-size:11.5px;color:var(--muted);font-weight:500}
.ee-ebook .sc-catbar .ct{height:7px;border-radius:999px;background:var(--line);overflow:hidden}
.ee-ebook .sc-catbar .ct i{display:block;height:100%;width:0;border-radius:999px;background:var(--blue);transition:width .5s var(--ease-out)}
.ee-ebook .sc-catbar .cv{font-family:var(--mono);font-size:11px;color:var(--ink);text-align:right;font-variant-numeric:tabular-nums}
.ee-ebook .bands{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin:26px 0}
.ee-ebook .bandc{border:1px solid var(--line-strong);border-radius:14px;padding:18px 20px;border-top:3px solid var(--line-strong)}
.ee-ebook .bandc.b1{border-top-color:var(--green)}
.ee-ebook .bandc.b2{border-top-color:var(--orange)}
.ee-ebook .bandc.b3{border-top-color:var(--red)}
.ee-ebook .bandc .br{font-family:var(--mono);font-size:11px;color:var(--ink);font-weight:600;margin-bottom:6px}
.ee-ebook .bandc.b1 .br{color:var(--green)}.ee-ebook .bandc.b2 .br{color:var(--orange-700)}.ee-ebook .bandc.b3 .br{color:#C0392B}
.ee-ebook .bandc p{margin:0;font-size:12.5px;line-height:1.55;color:var(--muted)}

/* FINAL CTA */
.ee-ebook .final{position:relative;overflow:hidden;color:#fff;background:linear-gradient(120deg,var(--blue-900),var(--blue) 64%,var(--blue-700));padding:88px 0}
.ee-ebook .final::before{content:"";position:absolute;inset:0;z-index:0;opacity:.6;background:radial-gradient(640px 340px at 86% 8%,rgba(222,110,48,.42),transparent 60%)}
.ee-ebook .final::after{content:"";position:absolute;inset:0;z-index:0;background-image:radial-gradient(circle at 1px 1px,rgba(255,255,255,.06) 1px,transparent 0);background-size:22px 22px;mask-image:linear-gradient(120deg,#000,transparent 68%);-webkit-mask-image:linear-gradient(120deg,#000,transparent 68%)}
.ee-ebook .final .wrap{position:relative;z-index:2}
.ee-ebook .final .k{font-family:var(--mono);font-size:11px;letter-spacing:.22em;text-transform:uppercase;color:var(--orange)}
.ee-ebook .final h2{font-size:clamp(28px,3.7vw,44px);line-height:1.08;font-weight:700;letter-spacing:-.03em;margin:14px 0 16px;color:#fff;max-width:700px}
.ee-ebook .final .lead2{font-size:16.5px;line-height:1.6;color:rgba(255,255,255,.74);margin:0 0 6px;max-width:640px}
.ee-ebook .final .steps{display:flex;flex-direction:column;gap:13px;margin:30px 0 32px;list-style:none;padding:0;counter-reset:fstep}
.ee-ebook .final .steps li{display:flex;align-items:flex-start;gap:14px;font-size:15px;color:rgba(255,255,255,.92);max-width:620px;counter-increment:fstep}
.ee-ebook .final .steps li::before{content:counter(fstep,decimal-leading-zero);font-family:var(--mono);font-size:12px;color:var(--orange);border:1px solid rgba(222,110,48,.4);background:rgba(222,110,48,.12);width:28px;height:28px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-weight:600}

/* PAGE FOOTER */
.ee-ebook footer.site{background:var(--blue-900);color:#fff;padding:54px 0 30px}
.ee-ebook .foot-grid{display:flex;justify-content:space-between;gap:40px;flex-wrap:wrap;padding-bottom:30px;border-bottom:1px solid rgba(255,255,255,.12)}
.ee-ebook .foot-brand .fl{font-size:18px;font-weight:700;letter-spacing:-.01em}
.ee-ebook .foot-brand p{margin:12px 0 0;font-size:13px;color:rgba(255,255,255,.55);max-width:320px;line-height:1.6}
.ee-ebook .foot-cols{display:flex;gap:48px;flex-wrap:wrap}
.ee-ebook .fcol b{display:block;font-family:var(--mono);font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.45);margin-bottom:12px}
.ee-ebook .fcol a{display:block;font-size:13.5px;color:rgba(255,255,255,.82);margin-bottom:8px;transition:color .2s}
.ee-ebook .fcol a:hover{color:var(--orange)}
.ee-ebook .foot-bot{padding-top:22px;display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;font-size:12px;color:rgba(255,255,255,.45);font-family:var(--mono);letter-spacing:.02em}

.ee-ebook .fab{position:fixed;bottom:26px;right:26px;z-index:90;width:46px;height:46px;border-radius:13px;background:var(--ink);color:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 18px 36px -14px rgba(11,26,51,.6);opacity:0;pointer-events:none;transform:translateY(12px);transition:all .35s var(--ease-out);border:0;cursor:pointer}
.ee-ebook .fab.show{opacity:1;pointer-events:auto;transform:none}
.ee-ebook .fab:hover{background:var(--orange)}
.ee-ebook .toast{position:fixed;bottom:26px;left:50%;transform:translateX(-50%) translateY(140%);background:var(--ink);color:#fff;padding:13px 20px;border-radius:12px;font-family:var(--mono);font-size:12.5px;letter-spacing:.02em;box-shadow:0 24px 50px -16px rgba(11,26,51,.5);z-index:160;display:flex;align-items:center;gap:10px;transition:transform .45s var(--ease-out)}
.ee-ebook .toast.visible{transform:translateX(-50%) translateY(0)}
.ee-ebook .toast .tk{color:var(--orange)}
.ee-ebook .reveal{opacity:0;transform:translateY(22px);transition:opacity .7s var(--ease-out),transform .7s var(--ease-out)}
.ee-ebook .reveal.in{opacity:1;transform:none}

/* ---- mobile chapters: floating pill + slide-up drawer (the sidebar
   TOC disappears under 1040px — without this, phones lose chapter
   navigation and the download button entirely) ---- */
.ee-ebook .tocfab{position:fixed;left:18px;bottom:22px;z-index:95;display:none;align-items:center;gap:8px;background:var(--blue-900);color:#fff;font-size:13px;font-weight:600;padding:12px 18px;border-radius:999px;box-shadow:0 18px 36px -14px rgba(11,26,51,.6);border:0;cursor:pointer}
.ee-ebook .tocfab .n{font-size:11px;color:var(--orange);font-weight:800}
.ee-ebook .drawer-bg{position:fixed;inset:0;z-index:140;background:rgba(11,26,51,.5);opacity:0;pointer-events:none;transition:opacity .3s var(--ease)}
.ee-ebook .drawer-bg.show{opacity:1;pointer-events:auto}
.ee-ebook .drawer{position:fixed;left:0;right:0;bottom:0;z-index:145;background:var(--paper);border-radius:20px 20px 0 0;box-shadow:0 -30px 70px -20px rgba(11,26,51,.4);max-height:min(78vh,78dvh);display:flex;flex-direction:column;transform:translateY(105%);transition:transform .38s var(--ease-out);padding-bottom:env(safe-area-inset-bottom)}
.ee-ebook .drawer.show{transform:none}
.ee-ebook .drawer .dh{display:flex;align-items:center;justify-content:space-between;padding:16px 20px 12px;border-bottom:1px solid var(--line)}
.ee-ebook .drawer .dh b{font-size:14px;font-weight:800;color:var(--ink);letter-spacing:-.01em}
.ee-ebook .drawer .dh .rt{font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--orange);font-weight:700}
.ee-ebook .drawer .dclose{width:32px;height:32px;border-radius:9px;background:var(--blue-50);color:var(--ink);display:flex;align-items:center;justify-content:center;border:0;cursor:pointer;font-size:14px}
.ee-ebook .drawer ul{list-style:none;margin:0;padding:10px 12px;overflow-y:auto;flex:1;-webkit-overflow-scrolling:touch}
.ee-ebook .drawer a{display:flex;align-items:center;gap:10px;padding:13px 12px;border-radius:10px;font-size:14px;font-weight:600;color:var(--ink);line-height:1.35}
.ee-ebook .drawer a:active{background:var(--orange-50)}
.ee-ebook .drawer a .num{font-size:11px;color:var(--orange);font-weight:800;min-width:22px}
.ee-ebook .drawer .ddl{margin:10px 16px 16px;display:flex;align-items:center;justify-content:center;gap:8px;padding:14px;background:var(--orange);color:#fff;border-radius:12px;font-size:14px;font-weight:700;border:0;cursor:pointer;box-shadow:0 12px 26px -14px rgba(222,110,48,.7)}

@media (max-width:1080px){
  .ee-ebook .hero-grid{grid-template-columns:1fr;gap:36px}
  .ee-ebook .form-card{max-width:520px}
}
@media (max-width:1040px){
  .ee-ebook .reader-grid{grid-template-columns:1fr;gap:0}
  .ee-ebook .toc{display:none}
  .ee-ebook .tocfab{display:inline-flex}
  .ee-ebook .sc-result-grid,.ee-ebook .bands,.ee-ebook .stack{grid-template-columns:1fr}
  .ee-ebook .reader{padding:56px 0 80px}
}
@media (max-width:600px){
  .ee-ebook .hero{padding:64px 0 46px}
  .ee-ebook .hero-cta .btn{flex:1 1 100%;justify-content:center}
  .ee-ebook .hero-meta{display:grid;grid-template-columns:1fr 1fr;max-width:none}
  .ee-ebook .hero-meta .m{border-right:0;border-top:1px solid rgba(255,255,255,.12)}
  .ee-ebook .hero-meta .m:nth-child(-n+2){border-top:0}
  .ee-ebook .hero-meta .m:nth-child(odd){border-right:1px solid rgba(255,255,255,.12)}
  .ee-ebook .nav-mid{display:none}
  .ee-ebook .nav-act .nav-btn.ghost{display:none}
  .ee-ebook .intro{padding:52px 0}
  .ee-ebook .authors{padding:48px 0}
  .ee-ebook .author{padding:22px}
  .ee-ebook .author .ah{flex-direction:row;gap:14px}
  .ee-ebook .author .portrait{width:60px;height:60px;font-size:17px}
  .ee-ebook .statbox{padding:24px;gap:16px}
  .ee-ebook .sc-row{flex-direction:column;align-items:flex-start;gap:11px;padding:14px 18px}
  .ee-ebook .sc-opts{width:100%}
  .ee-ebook .sc-opts button{flex:1;height:44px}
  .ee-ebook .sc-head,.ee-ebook .sc-result{padding:20px 18px}
  .ee-ebook .sc-cat{padding:10px 18px}
  .ee-ebook .sc-catbar{grid-template-columns:96px 1fr 38px}
  .ee-ebook .final{padding:64px 0}
  .ee-ebook .final .btn{width:100%;justify-content:center}
  .ee-ebook .modal-bg{padding:0;align-items:flex-end}
  .ee-ebook .modal-card{max-width:none;border-radius:20px 20px 0 0;max-height:92vh;max-height:92dvh}
  .ee-ebook .fab{bottom:20px;right:16px}
  .ee-ebook .divider-d{margin:40px 0}
}
@media (max-width:380px){
  .ee-ebook .hero h1{font-size:27px}
  .ee-ebook .grid2{grid-template-columns:1fr;gap:11px}
}
@media (prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  .ee-ebook .reveal{opacity:1;transform:none;transition:none}
  .ee-ebook .nav,.ee-ebook .drawer,.ee-ebook .modal-card{transition:none}
}
@media print{
  .ee-ebook .nav,.ee-ebook .progress,.ee-ebook .toc,.ee-ebook .fab,.ee-ebook .toast,.ee-ebook .hero-cta,.ee-ebook .toc-dl,.ee-ebook .modal-bg,.ee-ebook .form-card{display:none!important}
  .ee-ebook .hero,.ee-ebook .final{background:var(--blue-900)!important;-webkit-print-color-adjust:exact;print-color-adjust:exact}
  .ee-ebook .reader-grid{grid-template-columns:1fr}
}
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class('ee-ebook-body'); ?>>
<div class="ee-ebook">
<div class="grain"></div>
<div class="progress" id="progress"></div>

<nav class="nav" id="nav">
  <div class="nav-in">
    <div class="brand">
      <span class="logo"><?php echo esc_html(get_bloginfo('name')); ?></span>
      <span class="tag"><?php echo esc_html($edition); ?></span>
    </div>
    <div class="nav-mid"><?php echo esc_html($title); ?></div>
    <div class="nav-act">
      <span class="pct tnum" id="navPct">0%</span>
      <button class="nav-btn ghost" id="shareBtn" type="button">↗ Share</button>
      <button class="nav-btn solid" id="dlOpen" type="button">⬇ Download PDF</button>
    </div>
  </div>
</nav>

<header class="hero">
  <div class="wrap">
    <div class="hero-grid">
      <div>
        <div class="issue"><span class="pill"><?php echo esc_html($edition); ?></span><span class="ln"></span><span id="heroRt">— min read</span></div>
        <h1><?php echo wp_kses_post($title); ?></h1>
        <?php if ($subtitle): ?><p class="sub"><?php echo wp_kses_post($subtitle); ?></p><?php endif; ?>
        <?php if ($authors): ?>
          <div class="by">
            <span class="dim">By</span>
            <?php foreach ($authors as $i => $a): ?>
              <?php if ($i > 0): ?><span class="dot"></span><?php endif; ?>
              <b><?php echo esc_html($a['name']); ?></b><?php if ($a['role']): ?><span class="dim">— <?php echo esc_html($a['role']); ?></span><?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="hero-cta">
          <?php if ($cta1_text): ?><a class="btn btn-orange" href="<?php echo esc_url($cta1_url); ?>"><?php echo esc_html($cta1_text); ?> →</a><?php endif; ?>
          <?php if ($cta2_text): ?><a class="btn btn-ghost-d" href="<?php echo esc_url($cta2_url); ?>"><?php echo esc_html($cta2_text); ?></a><?php endif; ?>
        </div>
        <div class="hero-meta tnum">
          <?php foreach ($stats as $s): ?>
            <div class="m"><b><?php echo esc_html($s['v']); ?></b><span><?php echo esc_html($s['l']); ?></span></div>
          <?php endforeach; ?>
        </div>
      </div>

      <aside class="form-card" id="heroFormCard">
        <div class="fc-top">
          <div class="fc-book">📘</div>
          <div class="meta">
            <span class="tag">★ Free Download</span>
            <h3><?php echo esc_html($title); ?></h3>
            <span class="fmt">PDF · Instant access</span>
          </div>
        </div>
        <div class="fc-body">
          <form id="leadForm" novalidate>
            <div class="ft"><?php echo esc_html($form_title); ?></div>
            <div class="field" id="f-name"><label>Name <span class="req">*</span></label><input type="text" name="name" placeholder="Your full name" autocomplete="name"><div class="msg">Please enter your name.</div></div>
            <div class="field" id="f-email"><label>Work Email <span class="req">*</span></label><input type="email" name="email" placeholder="you@institution.edu" autocomplete="email"><div class="msg">Please enter a valid email.</div></div>
            <div class="field" id="f-company"><label>Company / Institution <span class="req">*</span></label><input type="text" name="company" placeholder="Institution name" autocomplete="organization"><div class="msg">Please enter your institution.</div></div>
            <div class="grid2">
              <div class="field" id="f-title"><label>Job Title</label><input type="text" name="jobtitle" placeholder="Director of Admissions"><div class="msg"></div></div>
              <div class="field" id="f-phone"><label>Phone</label><input type="tel" name="phone" placeholder="+91 90000 00000"><div class="msg"></div></div>
            </div>
            <button type="submit" class="fc-submit"><?php echo esc_html($form_btn); ?> ⬇</button>
            <p class="consent">By submitting, you agree to ExtraaEdge's <a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms</a> &amp; <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a>. Opt out anytime.</p>
            <div class="trustline">🛡 No spam · Unsubscribe anytime</div>
          </form>
          <div class="fc-success" id="successView">
            <div class="ok">✓</div>
            <h4>Your download has started</h4>
            <p>Thanks, <span id="leadName">there</span>! <b><?php echo esc_html($title); ?></b> is downloading.</p>
            <button type="button" class="relink" id="reDownload">↓ Download again</button>
          </div>
        </div>
      </aside>
    </div>
  </div>
</header>

<?php if ($intro_lead || $intro_body): ?>
<section class="intro reveal" id="summary">
  <div class="wrap">
    <?php if ($intro_lead): ?><p class="lead"><?php echo wp_kses_post($intro_lead); ?></p><?php endif; ?>
    <?php if ($intro_body): foreach (preg_split('/\r?\n\s*\r?\n/', $intro_body) as $p):
        $p = trim($p);
        if ($p !== ''): ?>
          <p><?php echo wp_kses_post($p); ?></p>
        <?php endif;
      endforeach; endif; ?>
  </div>
</section>
<?php endif; ?>

<?php if ($authors): ?>
<section class="authors reveal">
  <div class="wrap">
    <div class="eyebrow">Meet the Authors</div>
    <h3 class="sec">Two leaders working at the intersection of admissions strategy and technology.</h3>
    <div class="author-grid">
      <?php foreach ($authors as $a): ?>
        <article class="author">
          <div class="ah">
            <div class="portrait">
              <?php if (!empty($a['img'])): ?>
                <img src="<?php echo esc_url($a['img']); ?>" alt="<?php echo esc_attr($a['name']); ?>" loading="lazy">
              <?php else: ?>
                <?php echo esc_html($initials($a['name'])); ?>
              <?php endif; ?>
            </div>
            <div>
              <div class="an"><?php echo esc_html($a['name']); ?></div>
              <?php if ($a['role']): ?><div class="ar"><?php echo esc_html($a['role']); ?></div><?php endif; ?>
              <?php if ($a['creds']): ?>
                <div class="creds">
                  <?php foreach (array_filter(array_map('trim', explode(',', $a['creds']))) as $c): ?>
                    <span><?php echo esc_html($c); ?></span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <?php if ($a['bio']): foreach (preg_split('/\r?\n\s*\r?\n/', $a['bio']) as $p): $p = trim($p); if ($p !== ''): ?>
            <p><?php echo wp_kses_post($p); ?></p>
          <?php endif; endforeach; endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="reader">
  <div class="wrap">
    <div class="reader-grid">
      <nav class="toc" id="toc">
        <div class="th"><span>Contents</span><span class="rt" id="tocRt"></span></div>
        <div class="toc-prog"><i id="tocProg"></i></div>
        <?php if ($toc): ?>
        <ul>
          <?php foreach ($toc as $t): ?>
            <li><a class="chap" href="#<?php echo esc_attr($t['id']); ?>"><span class="num"><?php echo esc_html(preg_replace('/[^0-9A-Za-z]/', '', substr($t['num'], 0, 4))); ?></span> <?php echo esc_html($t['h']); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <button class="toc-dl" id="tocDl" type="button">⬇ Download PDF</button>
      </nav>
      <article class="article"><?php echo $body_html; ?></article>
    </div>
  </div>
</div>

<section class="final reveal" id="masterclass">
  <div class="wrap">
    <span class="k"><?php echo esc_html($fcta_kicker); ?></span>
    <h2><?php echo esc_html($fcta_h); ?></h2>
    <?php if ($fcta_lead): ?><p class="lead2"><?php echo wp_kses_post($fcta_lead); ?></p><?php endif; ?>
    <?php if ($fcta_steps): ?>
      <ol class="steps">
        <?php foreach (array_slice($fcta_steps, 0, 5) as $st): ?>
          <li><?php echo wp_kses_post($st); ?></li>
        <?php endforeach; ?>
      </ol>
    <?php endif; ?>
    <a href="<?php echo esc_url($fcta_url); ?>" class="btn btn-orange"><?php echo esc_html($fcta_btn); ?> →</a>
  </div>
</section>

<footer class="site">
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand">
        <div class="fl"><?php echo esc_html(get_bloginfo('name')); ?></div>
        <p>An intelligent admission growth platform, helping education leaders build enrollment systems that are scalable, reliable, and AI-ready.</p>
      </div>
      <div class="foot-cols">
        <div class="fcol"><b>This paper</b>
          <?php if ($intro_lead || $intro_body): ?><a href="#summary">Executive Summary</a><?php endif; ?>
          <?php foreach (array_slice($toc, 0, 3) as $t): ?><a href="#<?php echo esc_attr($t['id']); ?>"><?php echo esc_html($t['h']); ?></a><?php endforeach; ?>
        </div>
        <div class="fcol"><b>ExtraaEdge</b>
          <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          <a href="<?php echo esc_url(get_post_type_archive_link('ebook') ?: home_url('/ebooks/')); ?>">All e-books</a>
          <a href="<?php echo esc_url(home_url('/book-demo/')); ?>">Book a demo</a>
        </div>
        <div class="fcol"><b>Connect</b>
          <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
          <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy</a>
        </div>
      </div>
    </div>
    <div class="foot-bot"><span>© <?php echo (int) date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. All rights reserved.</span><span><?php echo esc_html($title); ?> · <?php echo esc_html($edition); ?></span></div>
  </div>
</footer>

<div class="modal-bg" id="modal">
  <div class="modal-card">
    <button class="modal-close" id="modalClose" type="button">✕</button>
    <div class="fc-top" style="background:linear-gradient(155deg,var(--blue-900),var(--blue));color:#fff;border-bottom:0">
      <div class="fc-book" style="background:linear-gradient(150deg,#fff,#f4f7fb);color:var(--blue)">📘</div>
      <div class="meta" style="color:#fff">
        <span class="tag" style="color:var(--orange)">★ Free Download</span>
        <h3 style="color:#fff"><?php echo esc_html($title); ?></h3>
        <span class="fmt" style="color:rgba(255,255,255,.6)">PDF · Instant access</span>
      </div>
    </div>
    <div class="fc-body">
      <form id="leadForm2" novalidate>
        <div class="ft"><?php echo esc_html($form_title); ?></div>
        <div class="field" id="m-name"><label>Name <span class="req">*</span></label><input type="text" name="name" placeholder="Your full name"><div class="msg">Please enter your name.</div></div>
        <div class="field" id="m-email"><label>Work Email <span class="req">*</span></label><input type="email" name="email" placeholder="you@institution.edu"><div class="msg">Please enter a valid email.</div></div>
        <div class="field" id="m-company"><label>Company / Institution <span class="req">*</span></label><input type="text" name="company" placeholder="Institution name"><div class="msg">Please enter your institution.</div></div>
        <div class="grid2">
          <div class="field" id="m-title"><label>Job Title</label><input type="text" name="jobtitle" placeholder="Director of Admissions"><div class="msg"></div></div>
          <div class="field" id="m-phone"><label>Phone</label><input type="tel" name="phone" placeholder="+91 90000 00000"><div class="msg"></div></div>
        </div>
        <button type="submit" class="fc-submit"><?php echo esc_html($form_btn); ?> ⬇</button>
        <p class="consent">By submitting, you agree to ExtraaEdge's <a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms</a> &amp; <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a>.</p>
      </form>
      <div class="fc-success" id="successView2">
        <div class="ok">✓</div>
        <h4>Your download has started</h4>
        <p>Thanks, <span id="leadName2">there</span>! <b><?php echo esc_html($title); ?></b> is downloading.</p>
        <button type="button" class="relink" id="reDownload2">↓ Download again</button>
      </div>
    </div>
  </div>
</div>

<?php if ($toc): ?>
<!-- mobile chapters: pill + slide-up drawer (sidebar TOC is hidden < 1040px) -->
<button class="tocfab" id="tocFab" type="button">☰ Chapters <span class="n tnum"><?php echo count($toc); ?></span></button>
<div class="drawer-bg" id="drawerBg"></div>
<div class="drawer" id="drawer" role="dialog" aria-label="Chapters">
  <div class="dh"><b>Contents</b><span class="rt" id="drawerRt"></span><button class="dclose" id="drawerClose" type="button" aria-label="Close">✕</button></div>
  <ul>
    <?php foreach ($toc as $t): ?>
      <li><a href="#<?php echo esc_attr($t['id']); ?>"><span class="num tnum"><?php echo esc_html(preg_replace('/[^0-9A-Za-z]/', '', substr($t['num'], 0, 4))); ?></span> <?php echo esc_html($t['h']); ?></a></li>
    <?php endforeach; ?>
  </ul>
  <button class="ddl" id="drawerDl" type="button">⬇ Download PDF</button>
</div>
<?php endif; ?>

<button class="fab" id="fab" type="button" title="Back to top">↑</button>
<div class="toast" id="toast"><span class="tk">✓</span><span id="toastMsg">Ready</span></div>
</div>

<script>
(() => {
  const PDF_URL = <?php echo wp_json_encode($pdf_url ?: ''); ?>;
  const LEAD_KEY = 'ee_ebook_lead_' + <?php echo (int) $pid; ?>;
  const docEl = document.documentElement;
  const progress = document.getElementById('progress');
  const tocProg  = document.getElementById('tocProg');
  const nav      = document.getElementById('nav');
  const navPct   = document.getElementById('navPct');
  const fab      = document.getElementById('fab');
  const hero     = document.querySelector('.ee-ebook .hero');
  const toast    = document.getElementById('toast');
  const toastMsg = document.getElementById('toastMsg');

  function onScroll(){
    const max = docEl.scrollHeight - docEl.clientHeight;
    const pct = max > 0 ? (docEl.scrollTop / max) : 0;
    const p = Math.round(pct * 100);
    progress.style.width = p + '%';
    if (tocProg) tocProg.style.width = p + '%';
    navPct.textContent = p + '%';
    nav.classList.toggle('show', docEl.scrollTop > (hero.offsetHeight - 80));
    fab.classList.toggle('show', docEl.scrollTop > 700);
  }
  document.addEventListener('scroll', onScroll, { passive:true });
  onScroll();
  fab.addEventListener('click', () => window.scrollTo({ top:0, behavior:'smooth' }));

  function showToast(m){ if (!toast) return; toastMsg.textContent = m; toast.classList.add('visible'); clearTimeout(showToast._t); showToast._t = setTimeout(() => toast.classList.remove('visible'), 2200); }

  // share
  document.getElementById('shareBtn').addEventListener('click', async () => {
    const url = location.href;
    try { if (navigator.share){ await navigator.share({ title:document.title, url }); } else { await navigator.clipboard.writeText(url); showToast('Link copied'); } }
    catch(e){ try{ await navigator.clipboard.writeText(url); showToast('Link copied'); }catch(_){ showToast('Copy failed'); } }
  });

  // reading time
  const WPM = 225; let totalWords = 0;
  document.querySelectorAll('.ee-ebook .chapter').forEach(ch => {
    const w = (ch.innerText.trim().match(/\S+/g) || []).length;
    totalWords += w;
    const mins = Math.max(1, Math.round(w / WPM));
    const slot = ch.querySelector('[data-rt]'); if (slot) slot.textContent = mins + ' min read';
  });
  const totalMin = Math.max(1, Math.round(totalWords / WPM));
  document.getElementById('heroRt').textContent = totalMin + ' min read';
  const tocRt = document.getElementById('tocRt'); if (tocRt) tocRt.textContent = totalMin + ' min';

  // reveal
  const revObs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting){ e.target.classList.add('in'); revObs.unobserve(e.target); } });
  }, { threshold:.08 });
  document.querySelectorAll('.ee-ebook .reveal').forEach(el => revObs.observe(el));

  // TOC scroll-spy
  const links = Array.from(document.querySelectorAll('.ee-ebook .toc a[href^="#"]'));
  const map = new Map();
  links.forEach(l => { const id = l.getAttribute('href').slice(1); const el = document.getElementById(id); if (el) map.set(el, l); });
  const spy = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting){ links.forEach(l=>l.classList.remove('active')); const lk=map.get(e.target); if(lk) lk.classList.add('active'); } });
  }, { rootMargin:'-15% 0px -75% 0px', threshold:0 });
  map.forEach((_, el) => spy.observe(el));

  // ===== form / download =====
  function downloadEbook(){
    if (!PDF_URL){ showToast('PDF link not configured yet.'); return; }
    const a = document.createElement('a'); a.href = PDF_URL; a.download = ''; a.rel = 'noopener';
    document.body.appendChild(a); a.click(); a.remove();
  }
  function setError(prefix,id,on){ const el=document.getElementById(prefix+id); if(!el) return; el.classList.toggle('invalid',on); const i=el.querySelector('input'); if(i) i.classList.toggle('err',on); }
  function validateForm(form, prefix){
    const data = Object.fromEntries(new FormData(form).entries()); let ok = true;
    if (!data.name || !data.name.trim()){ setError(prefix,'name',true); ok=false; } else setError(prefix,'name',false);
    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((data.email||'').trim());
    if (!emailOk){ setError(prefix,'email',true); ok=false; } else setError(prefix,'email',false);
    if (!data.company || !data.company.trim()){ setError(prefix,'company',true); ok=false; } else setError(prefix,'company',false);
    return { ok, data };
  }

  const heroForm = document.getElementById('leadForm');
  const heroSuccess = document.getElementById('successView');
  const modalForm = document.getElementById('leadForm2');
  const modalSuccess = document.getElementById('successView2');

  function flipToSuccess(name){
    heroForm.classList.add('form-hidden'); heroSuccess.classList.add('show');
    document.getElementById('leadName').textContent = (name||'there').split(' ')[0];
    modalForm.classList.add('form-hidden'); modalSuccess.classList.add('show');
    document.getElementById('leadName2').textContent = (name||'there').split(' ')[0];
  }
  try { const cached = localStorage.getItem(LEAD_KEY); if (cached) flipToSuccess(cached); } catch(e){}

  heroForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const { ok, data } = validateForm(heroForm, 'f-');
    if (!ok){ heroForm.querySelector('.field.invalid input')?.focus(); return; }
    try { localStorage.setItem(LEAD_KEY, data.name || ''); } catch(e){}
    flipToSuccess(data.name); downloadEbook(); showToast('Download started');
  });
  document.getElementById('reDownload').addEventListener('click', (e) => { e.preventDefault(); downloadEbook(); showToast('Downloading again'); });

  // modal
  const modal = document.getElementById('modal');
  function openModal(){ modal.classList.add('show'); document.body.classList.add('lock'); }
  function closeModal(){ modal.classList.remove('show'); document.body.classList.remove('lock'); }
  document.getElementById('dlOpen').addEventListener('click', openModal);
  document.getElementById('tocDl').addEventListener('click', openModal);

  // mobile chapters drawer
  const drawer = document.getElementById('drawer');
  const drawerBg = document.getElementById('drawerBg');
  if (drawer) {
    const dOpen  = () => { drawer.classList.add('show'); drawerBg.classList.add('show'); document.body.classList.add('lock'); };
    const dClose = () => { drawer.classList.remove('show'); drawerBg.classList.remove('show'); document.body.classList.remove('lock'); };
    document.getElementById('tocFab').addEventListener('click', dOpen);
    document.getElementById('drawerClose').addEventListener('click', dClose);
    drawerBg.addEventListener('click', dClose);
    drawer.querySelectorAll('a[href^="#"]').forEach(a => a.addEventListener('click', dClose));
    const dDl = document.getElementById('drawerDl');
    if (dDl) dDl.addEventListener('click', () => { dClose(); openModal(); });
    const dRt = document.getElementById('drawerRt'); if (dRt) dRt.textContent = totalMin + ' min read';
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && drawer.classList.contains('show')) dClose(); });
  }
  document.getElementById('modalClose').addEventListener('click', closeModal);
  modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && modal.classList.contains('show')) closeModal(); });

  modalForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const { ok, data } = validateForm(modalForm, 'm-');
    if (!ok){ modalForm.querySelector('.field.invalid input')?.focus(); return; }
    try { localStorage.setItem(LEAD_KEY, data.name || ''); } catch(e){}
    flipToSuccess(data.name); downloadEbook(); showToast('Download started');
  });
  document.getElementById('reDownload2').addEventListener('click', (e) => { e.preventDefault(); downloadEbook(); showToast('Downloading again'); });

  // ===== scorecard (only if [ee_scorecard] is on the page) =====
  const rows = Array.from(document.querySelectorAll('.ee-ebook .sc-row[data-q]'));
  if (rows.length){
    const scores = new Array(rows.length).fill(0);
    const catMax = { proc:10, org:20, talent:15, tech:15, data:15, qa:15 };
    const sc = {
      score: document.getElementById('scScore'),
      answered: document.getElementById('scAnswered'),
      band: document.getElementById('scBand'),
      desc: document.getElementById('scDesc'),
      meter: document.getElementById('scMeter')
    };
    const bands = {
      high: ['75–90 · Optimization Mode','Strong, scalable foundation. Focus on optimization, advanced AI, and fine-tuning for efficiency.'],
      mid : ['50–74 · The Scaling Risk','You are built on "heroic efforts" — the most common and most dangerous category.'],
      low : ['Below 50 · Operational Crisis','Your foundation is broken. Re-engineer your core processes before buying tools or increasing spend.']
    };
    function updateSc(){
      const total = scores.reduce((a,b)=>a+b,0);
      const answered = scores.filter(s=>s>0).length;
      if (sc.score) sc.score.textContent = total;
      if (sc.answered) sc.answered.textContent = answered + ' of ' + rows.length + ' statements rated';
      if (sc.meter) sc.meter.style.width = (total/90*100) + '%';
      const b = answered === 0 ? null : (total>=75?bands.high:(total>=50?bands.mid:bands.low));
      if (sc.band) sc.band.textContent = b ? b[0] : 'Rate the statements to see your band';
      if (sc.desc) sc.desc.textContent = b ? b[1] : 'Your score is your symptom — the "what." The next step is to understand the "why" and build the "how."';
      const catTot = {};
      rows.forEach((r,i)=>{ const c=r.dataset.cat; catTot[c]=(catTot[c]||0)+scores[i]; });
      Object.keys(catMax).forEach(c => {
        const v = catTot[c]||0, mx = catMax[c];
        const bar = document.querySelector('[data-bar="'+c+'"]');
        const cv  = document.querySelector('[data-cv="'+c+'"]');
        const cs  = document.querySelector('[data-catscore="'+c+'"]');
        if (bar) bar.style.width = (v/mx*100)+'%';
        if (cv)  cv.textContent = v+'/'+mx;
        if (cs)  cs.textContent = v+' / '+mx;
      });
    }
    rows.forEach((row,i) => {
      const opts = row.querySelector('.sc-opts');
      [1,3,5].forEach(v => {
        const btn = document.createElement('button'); btn.type='button'; btn.textContent=v;
        btn.addEventListener('click', () => {
          scores[i]=v;
          opts.querySelectorAll('button').forEach(x=>x.classList.remove('sel'));
          btn.classList.add('sel'); updateSc();
        });
        opts.appendChild(btn);
      });
    });
    const reset = document.getElementById('scReset');
    if (reset) reset.addEventListener('click', () => {
      scores.fill(0);
      document.querySelectorAll('.sc-opts button.sel').forEach(b=>b.classList.remove('sel'));
      updateSc(); showToast('Scorecard reset');
    });
    updateSc();
  }
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
