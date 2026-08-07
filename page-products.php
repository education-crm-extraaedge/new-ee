<?php
/**
 * /products/ — "The admissions platform" experience (same design as the
 * home page section: live spotlight preview, search, category filters).
 *
 * The 15 consolidated core products below map to their canonical URLs per
 * the SEO architecture (keyword landing pages roll up to these).
 * Section markup/CSS/JS is a 1:1 port of front-page.php's #ee-products.
 */
if (!defined('ABSPATH')) exit;

/* SEO head: meta + ItemList schema for the 15 core products. */
add_action('wp_head', function () {
    $title = 'Education CRM Products — One Platform, Every Admissions Tool | ExtraaEdge';
    $desc  = 'Explore the ExtraaEdge admissions platform: Education CRM, Application & Admission Management, Mobile CRM, WhatsApp API, Education Chatbot, IVR and more.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/products/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

    $core = array(
        array('Education CRM',                 '/products/education-crm/'),
        array('Application Management System', '/products/application-management-system/'),
        array('Admission Management System',   '/admission-management-software/'),
        array('Enrollment Management System',  '/enrollment-management-software/'),
        array('Mobile CRM',                    '/products/mobile-crm/'),
        array('WhatsApp API',                  '/products/whatsapp-api/'),
        array('Education Chatbot',             '/products/chatbot-for-education/'),
        array('IVR',                           '/products/ivr/'),
        array('Student Recruitment Software',  '/student-recruitment-software/'),
        array('Walk-in Management System',     '/walk-in-management-system/'),
        array('Study Abroad CRM',              '/study-abroad-crm/'),
        array('University CRM',                '/university-crm/'),
        array('School CRM',                    '/school-crm/'),
        array('Coaching CRM',                  '/coaching-crm/'),
        array('Higher Education CRM',          '/industries/higher-education-crm/'),
    );
    $li = array();
    foreach ($core as $i => $p) {
        $li[] = array('@type' => 'ListItem', 'position' => $i + 1, 'name' => $p[0], 'url' => home_url($p[1]));
    }
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode(array(
        '@context' => 'https://schema.org', '@type' => 'ItemList',
        'name' => 'ExtraaEdge Admissions Platform Products',
        'numberOfItems' => count($li), 'itemListElement' => $li,
    ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    add_filter('pre_get_document_title', function () use ($title) { return $title; }, 99);
}, 1);

get_header();
?>
<!-- pxp-products v2026-07-23-cats -->
<style>#ee-products{
    --navy:#19345d; --ink:#0f203a; --orange:#DE6E30; --orange-2:#E8843F;
    --line:rgba(25,52,93,.10); --muted:#5a6b85;
    position:relative;
    padding:clamp(60px,8vw,108px) 0;
    background:
      radial-gradient(1100px 480px at 88% -6%, rgba(222,110,48,.06), transparent 60%),
      radial-gradient(900px 460px at 8% 104%, rgba(25,52,93,.06), transparent 60%),
      #F6F8FC;
    font-family:'Inter',system-ui,-apple-system,sans-serif;
    color:var(--ink);
    -webkit-font-smoothing:antialiased;
  }#ee-products *{box-sizing:border-box;}#ee-products .eep-wrap{ max-width:1280px; margin:0 auto; padding:0 24px; }/* ---------- Header ---------- */
  #ee-products .eep-head{ display:flex; align-items:flex-end; justify-content:space-between; gap:28px; flex-wrap:wrap; margin-bottom:clamp(26px,3vw,38px); }#ee-products .eep-head-l{ max-width:660px; }#ee-products .eep-eyebrow{
    display:inline-flex; align-items:center; gap:9px;
    padding:7px 14px 7px 11px; border-radius:999px;
    background:rgba(222,110,48,.08); border:1px solid rgba(222,110,48,.2);
    color:#C45A20; font-size:11.5px; font-weight:600; letter-spacing:.13em; text-transform:uppercase;
    margin-bottom:18px;
  }#ee-products .eep-eyebrow .eep-dot{ width:7px; height:7px; border-radius:50%; background:var(--orange); box-shadow:0 0 0 4px rgba(222,110,48,.16); animation:eepPulse 2.6s ease-in-out infinite; }
  @keyframes eepPulse{0%,100%{box-shadow:0 0 0 3px rgba(222,110,48,.18);}50%{box-shadow:0 0 0 6px rgba(222,110,48,0);} }#ee-products h2, #ee-products .eep-head-l h1{
    font-family:'Inter',sans-serif; font-weight:700;
    font-size:clamp(30px,4.4vw,46px); line-height:1.06; letter-spacing:-.022em;
    margin:0 0 14px; color:var(--navy);
  }#ee-products h2 .eep-accent{
    background:linear-gradient(120deg,var(--orange-2),var(--orange)); -webkit-background-clip:text; background-clip:text; color:transparent;
  }#ee-products .eep-sub{ font-size:clamp(15px,1.7vw,17.5px); line-height:1.55; color:var(--muted); margin:0; }/* ---------- Search ---------- */
  #ee-products .eep-search{ position:relative; flex:0 0 auto; width:min(300px,100%); }#ee-products .eep-search svg,#ee-products .eep-search img.eeimg{ position:absolute; left:14px; top:50%; transform:translateY(-50%); width:17px; height:17px; pointer-events:none; }#ee-products .eep-search svg *,#ee-products .eep-search img.eeimg *{ stroke:#8697b0; }#ee-products .eep-search input{
    width:100%; height:46px; padding:0 38px 0 40px;
    border:1px solid var(--line); border-radius:12px; background:#fff;
    font-family:inherit; font-size:14px; color:var(--ink);
    box-shadow:0 1px 2px rgba(25,52,93,.04); transition:border-color .2s ease, box-shadow .2s ease;
  }#ee-products .eep-search input::placeholder{ color:#9aa8bd; }#ee-products .eep-search input:focus{ outline:none; border-color:rgba(222,110,48,.5); box-shadow:0 0 0 4px rgba(222,110,48,.12); }#ee-products .eep-clear{ position:absolute; right:8px; top:50%; transform:translateY(-50%); display:none; width:24px; height:24px; border:0; border-radius:7px; background:rgba(25,52,93,.06); color:var(--navy); cursor:pointer; font-size:14px; line-height:1; }#ee-products .eep-search.has-val .eep-clear{ display:grid; place-items:center; }/* ---------- Filter pills ---------- */
  #ee-products .eep-filters{ display:flex; gap:9px; flex-wrap:wrap; margin-bottom:clamp(22px,2.6vw,30px); }#ee-products .eep-pill{
    display:inline-flex; align-items:center; gap:8px;
    padding:9px 16px; border-radius:999px; cursor:pointer;
    border:1px solid var(--line); background:#fff; color:var(--navy);
    font-family:inherit; font-size:13.5px; font-weight:600; letter-spacing:.005em;
    transition:transform .18s ease, border-color .2s ease, background .2s ease, color .2s ease, box-shadow .2s ease;
  }#ee-products .eep-pill .eep-count{ font-size:11px; font-weight:700; padding:1px 7px; border-radius:999px; background:rgba(25,52,93,.07); color:var(--navy); transition:background .2s ease,color .2s ease; }#ee-products .eep-pill:hover{ transform:translateY(-1px); border-color:rgba(222,110,48,.35); }#ee-products .eep-pill[aria-pressed="true"]{ background:linear-gradient(135deg,var(--orange-2),var(--orange)); border-color:transparent; color:#fff; box-shadow:0 8px 18px -10px rgba(222,110,48,.7); }#ee-products .eep-pill[aria-pressed="true"] .eep-count{ background:rgba(255,255,255,.24); color:#fff; }#ee-products .eep-pill:focus-visible{ outline:2px solid var(--orange); outline-offset:3px; }/* ---------- Main split ---------- */
  #ee-products .eep-main{ display:grid; grid-template-columns:minmax(0,380px) minmax(0,1fr); gap:24px; align-items:start; }/* ---------- Spotlight (signature) ---------- */
  #ee-products .eep-spot{
    --acc:#5c9af6; --acc-soft:rgba(92,154,246,.18);
    position:sticky; top:100px;
    border-radius:22px; overflow:hidden; isolation:isolate;
    background:linear-gradient(165deg,#1b355c 0%,#13294a 55%,#0e203b 100%);
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 30px 60px -30px rgba(11,26,48,.75), inset 0 1px 0 rgba(255,255,255,.06);
    color:#EAF0FA;
    min-height:520px; display:flex; flex-direction:column;
    transition:--acc .4s ease;
  }#ee-products .eep-spot::before{ /* accent glow keyed to active category */
    content:""; position:absolute; inset:0; z-index:0; pointer-events:none;
    background:radial-gradient(520px 320px at 78% -8%, var(--acc-soft), transparent 62%);
    transition:background .45s ease;
  }#ee-products .eep-spot::after{ /* fine grid texture */
    content:""; position:absolute; inset:0; z-index:0; pointer-events:none; opacity:.5;
    background-image:linear-gradient(rgba(255,255,255,.035) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.035) 1px,transparent 1px);
    background-size:30px 30px; mask-image:radial-gradient(420px 300px at 75% 0%, #000, transparent 75%);
  }#ee-products .eep-spot-top{ position:relative; z-index:2; padding:20px 22px 6px; display:flex; align-items:center; justify-content:space-between; gap:10px; }#ee-products .eep-spot-tag{ display:inline-flex; align-items:center; gap:7px; font-size:11px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:#aebcd2; }#ee-products .eep-spot-tag i{ width:8px; height:8px; border-radius:50%; background:var(--acc); box-shadow:0 0 0 4px var(--acc-soft); }#ee-products .eep-live{ display:inline-flex; align-items:center; gap:6px; font-size:10.5px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#7fa7e3; }#ee-products .eep-live b{ width:6px; height:6px; border-radius:50%; background:#3474d3; animation:eepBlink 1.4s ease-in-out infinite; }
  @keyframes eepBlink{0%,100%{opacity:1;}50%{opacity:.25;} }/* stage = animated scene */
  #ee-products .eep-stage{ position:relative; z-index:2; margin:8px 18px 4px; height:188px; border-radius:16px; background:rgba(8,20,38,.45); border:1px solid rgba(255,255,255,.07); overflow:hidden; display:grid; place-items:center; padding:16px; }#ee-products .eep-stage .eep-scene{ width:100%; height:100%; opacity:0; animation:eepSceneIn .5s ease forwards; }
  @keyframes eepSceneIn{from{opacity:0; transform:translateY(8px);}to{opacity:1; transform:none;} }/* spotlight text */
  #ee-products .eep-spot-body{ position:relative; z-index:2; padding:16px 22px 22px; display:flex; flex-direction:column; gap:12px; flex:1; }#ee-products .eep-spot-icon{ width:48px; height:48px; border-radius:13px; display:grid; place-items:center; background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 60%,#0b1a30)); box-shadow:0 10px 22px -10px var(--acc), inset 0 1px 0 rgba(255,255,255,.25); }#ee-products .eep-spot-icon svg,#ee-products .eep-spot-icon img.eeimg{ width:25px; height:25px; }#ee-products .eep-spot-icon svg *,#ee-products .eep-spot-icon img.eeimg *{ stroke:#fff; }#ee-products .eep-spot-title{ font-family:'Inter',sans-serif; font-size:21px; font-weight:600; letter-spacing:-.01em; color:#fff; margin:2px 0 0; display:flex; align-items:center; gap:10px; flex-wrap:wrap; }#ee-products .eep-spot-title .eep-new{ font-family:'Inter',sans-serif; font-size:9.5px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; padding:3px 8px; border-radius:999px; background:var(--acc); color:#0c1a30; }#ee-products .eep-spot-desc{ font-size:14px; line-height:1.6; color:#c2d0e4; margin:0; }#ee-products .eep-spot-tags{ display:flex; flex-wrap:wrap; gap:7px; margin-top:2px; }#ee-products .eep-spot-tags span{ font-size:11.5px; font-weight:500; color:#dfe7f4; padding:5px 11px; border-radius:999px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.1); }#ee-products .eep-spot-cta{ margin-top:auto; display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:13px 20px; border-radius:12px; background:linear-gradient(135deg,var(--orange-2),var(--orange)); color:#fff; font-weight:600; font-size:14.5px; text-decoration:none; box-shadow:0 12px 26px -12px rgba(222,110,48,.7), inset 0 1px 0 rgba(255,255,255,.22); transition:transform .2s ease, box-shadow .2s ease, filter .2s ease; }#ee-products .eep-spot-cta:hover{ transform:translateY(-2px); filter:saturate(1.05); }#ee-products .eep-spot-cta:focus-visible{ outline:2px solid #fff; outline-offset:3px; }#ee-products .eep-spot-cta svg,#ee-products .eep-spot-cta img.eeimg{ width:16px; height:16px; }#ee-products .eep-spot-cta svg *,#ee-products .eep-spot-cta img.eeimg *{ stroke:#fff; }/* ---------- Grid ---------- */
  #ee-products .eep-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:14px; }#ee-products .eep-card{
    position:relative; display:flex; flex-direction:column; gap:11px;
    padding:18px 17px; background:#fff; border:1px solid var(--line); border-radius:15px;
    text-decoration:none; color:inherit; cursor:pointer;
    box-shadow:0 1px 2px rgba(25,52,93,.04);
    transition:transform .22s cubic-bezier(.2,.7,.3,1), box-shadow .22s ease, border-color .22s ease;
  }#ee-products .eep-card::before{ content:""; position:absolute; left:0; top:14px; bottom:14px; width:3px; border-radius:0 3px 3px 0; background:var(--cardacc,var(--orange)); opacity:0; transform:scaleY(.4); transform-origin:center; transition:opacity .22s ease, transform .22s ease; }#ee-products .eep-card:hover,#ee-products .eep-card.is-active{ transform:translateY(-4px); border-color:rgba(222,110,48,.3); box-shadow:0 20px 38px -22px rgba(25,52,93,.4); }#ee-products .eep-card.is-active::before,#ee-products .eep-card:hover::before{ opacity:1; transform:scaleY(1); }#ee-products .eep-card:focus-visible{ outline:2px solid var(--orange); outline-offset:3px; }#ee-products .eep-card-top{ display:flex; align-items:center; gap:11px; }#ee-products .eep-chip{ flex:0 0 auto; width:40px; height:40px; border-radius:11px; display:grid; place-items:center; background:linear-gradient(135deg, color-mix(in srgb,var(--cardacc,#DE6E30) 88%,#fff), var(--cardacc,#DE6E30)); box-shadow:0 6px 14px -7px var(--cardacc,rgba(222,110,48,.6)), inset 0 1px 0 rgba(255,255,255,.3); }#ee-products .eep-chip svg,#ee-products .eep-chip img.eeimg{ width:21px; height:21px; }#ee-products .eep-chip svg *,#ee-products .eep-chip img.eeimg *{ stroke:#fff; }/* product icon shown as a logo image */
  #ee-products .eep-chip:has(img.eep-ic-img),#ee-products .eep-spot-icon:has(img.eep-ic-img){ background:transparent; padding:0; overflow:hidden; box-shadow:none; }#ee-products .eep-ic-img{ width:100%; height:100%; object-fit:cover; display:block; border-radius:inherit; }#ee-products .eep-card-title{ font-family:'Inter',sans-serif; font-size:14.5px; font-weight:600; line-height:1.25; letter-spacing:-.01em; color:var(--navy); display:flex; align-items:center; gap:7px; flex-wrap:wrap; }#ee-products .eep-badge{ font-size:9px; font-weight:700; letter-spacing:.07em; text-transform:uppercase; color:#fff; background:var(--orange); padding:2px 6px; border-radius:999px; }#ee-products .eep-card-desc{ font-size:12.5px; line-height:1.5; color:var(--muted); margin:0; }#ee-products .eep-card-foot{ margin-top:auto; display:flex; align-items:center; justify-content:space-between; gap:8px; }#ee-products .eep-card-cat{ font-size:10px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--cardacc,#C45A20); opacity:.85; }#ee-products .eep-card-go{ display:inline-flex; align-items:center; gap:5px; font-size:11.5px; font-weight:600; color:var(--navy); opacity:0; transform:translateX(-4px); transition:opacity .2s ease, transform .2s ease; }#ee-products .eep-card-go svg,#ee-products .eep-card-go img.eeimg{ width:13px; height:13px; }#ee-products .eep-card-go svg *,#ee-products .eep-card-go img.eeimg *{ stroke:var(--orange); }#ee-products .eep-card:hover .eep-card-go,#ee-products .eep-card:focus-visible .eep-card-go,#ee-products .eep-card.is-active .eep-card-go{ opacity:1; transform:none; }/* filtered out */
  #ee-products .eep-card[hidden]{ display:none; }/* empty state */
  #ee-products .eep-empty{ grid-column:1/-1; display:none; flex-direction:column; align-items:center; text-align:center; gap:10px; padding:48px 20px; border:1px dashed var(--line); border-radius:15px; color:var(--muted); }#ee-products .eep-empty.show{ display:flex; }#ee-products .eep-empty svg,#ee-products .eep-empty img.eeimg{ width:34px; height:34px; opacity:.5; }#ee-products .eep-empty svg *,#ee-products .eep-empty img.eeimg *{ stroke:var(--navy); }#ee-products .eep-empty b{ color:var(--navy); font-family:'Inter',sans-serif; font-size:16px; }#ee-products .eep-empty button{ margin-top:4px; padding:9px 16px; border:1px solid var(--line); border-radius:10px; background:#fff; color:var(--navy); font-family:inherit; font-weight:600; font-size:13px; cursor:pointer; }#ee-products .eep-empty button:hover{ border-color:rgba(222,110,48,.4); }/* ---------- Scene animation bits ---------- */
  #ee-products .sc{ font-size:11px; color:#cdd9ec; }/* AI scene */
  #ee-products .sc-ai{ display:flex; flex-direction:column; gap:8px; justify-content:center; }#ee-products .sc-bub{ max-width:78%; padding:8px 11px; border-radius:12px; font-size:11.5px; line-height:1.35; background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.08); opacity:0; transform:translateY(6px); animation:eepBub .5s ease forwards; }#ee-products .sc-bub.me{ align-self:flex-end; background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 55%,#10274a)); border-color:transparent; color:#fff; }#ee-products .sc-bub.b2{ animation-delay:.5s; }#ee-products .sc-bub.b3{ animation-delay:1.05s; }
  @keyframes eepBub{to{opacity:1; transform:none;} }#ee-products .sc-type{ display:inline-flex; gap:4px; align-self:flex-start; padding:9px 12px; border-radius:12px; background:rgba(255,255,255,.08); opacity:0; animation:eepBub .4s 1.55s ease forwards; }#ee-products .sc-type i{ width:5px; height:5px; border-radius:50%; background:#aebbcf; animation:eepDot 1.1s infinite; }#ee-products .sc-type i:nth-child(2){ animation-delay:.18s; }#ee-products .sc-type i:nth-child(3){ animation-delay:.36s; }
  @keyframes eepDot{0%,60%,100%{transform:translateY(0); opacity:.5;}30%{transform:translateY(-4px); opacity:1;} }#ee-products .sc-wave{ display:inline-flex; align-items:flex-end; gap:3px; height:18px; margin-left:6px; }#ee-products .sc-wave span{ width:3px; background:var(--acc); border-radius:2px; animation:eepWave 1s ease-in-out infinite; }#ee-products .sc-wave span:nth-child(2){animation-delay:.12s}#ee-products .sc-wave span:nth-child(3){animation-delay:.24s}#ee-products .sc-wave span:nth-child(4){animation-delay:.36s}#ee-products .sc-wave span:nth-child(5){animation-delay:.48s}
  @keyframes eepWave{0%,100%{height:5px;}50%{height:17px;} }/* Platform / kanban scene */
  #ee-products .sc-kan{ display:grid; grid-template-columns:repeat(3,1fr); gap:8px; align-content:center; width:100%; }#ee-products .sc-col{ background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.07); border-radius:9px; padding:7px 6px; display:flex; flex-direction:column; gap:6px; min-height:118px; }#ee-products .sc-col h6{ margin:0 0 1px; font-size:9px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#9fb1cc; }#ee-products .sc-lead{ height:18px; border-radius:6px; background:rgba(255,255,255,.1); }#ee-products .sc-lead.live{ background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 50%,#0c2140)); animation:eepHop 4s ease-in-out infinite; }
  @keyframes eepHop{0%,18%{transform:translateX(0);}33%,52%{transform:translateX(calc(100% + 14px));}67%,86%{transform:translateX(calc(200% + 28px));}100%{transform:translateX(0);} }/* Admissions scene */
  #ee-products .sc-adm{ width:100%; display:flex; flex-direction:column; gap:9px; justify-content:center; }#ee-products .sc-prog{ height:8px; border-radius:999px; background:rgba(255,255,255,.1); overflow:hidden; }#ee-products .sc-prog i{ display:block; height:100%; width:20%; border-radius:999px; background:linear-gradient(90deg,var(--acc),color-mix(in srgb,var(--acc) 55%,#fff)); animation:eepFill 4s ease-in-out infinite; }
  @keyframes eepFill{0%{width:12%;}45%{width:100%;}60%{width:100%;}100%{width:12%;} }#ee-products .sc-row{ display:flex; align-items:center; gap:9px; font-size:11px; color:#c7d4e8; }#ee-products .sc-tick{ width:18px; height:18px; border-radius:6px; border:1.5px solid rgba(255,255,255,.25); display:grid; place-items:center; flex:0 0 auto; }#ee-products .sc-tick.on{ background:var(--acc); border-color:transparent; }#ee-products .sc-tick svg,#ee-products .sc-tick img.eeimg{ width:11px; height:11px; opacity:0; }#ee-products .sc-tick.on svg,#ee-products .sc-tick.on img.eeimg{ opacity:1; }#ee-products .sc-tick svg *,#ee-products .sc-tick img.eeimg *{ stroke:#0c1a30; }#ee-products .sc-r1 .sc-tick{ animation:eepOn .1s 1s forwards; }#ee-products .sc-r2 .sc-tick{ animation:eepOn .1s 1.8s forwards; }#ee-products .sc-r3 .sc-tick{ animation:eepOn .1s 2.6s forwards; }
  @keyframes eepOn{to{ background:var(--acc); border-color:transparent; } }#ee-products .sc-r1 .sc-tick svg,#ee-products .sc-r1 .sc-tick img.eeimg,#ee-products .sc-r2 .sc-tick svg,#ee-products .sc-r2 .sc-tick img.eeimg,#ee-products .sc-r3 .sc-tick svg,#ee-products .sc-r3 .sc-tick img.eeimg{ animation:eepShow .1s forwards; }#ee-products .sc-r1 .sc-tick svg,#ee-products .sc-r1 .sc-tick img.eeimg{ animation-delay:1s; }#ee-products .sc-r2 .sc-tick svg,#ee-products .sc-r2 .sc-tick img.eeimg{ animation-delay:1.8s; }#ee-products .sc-r3 .sc-tick svg,#ee-products .sc-r3 .sc-tick img.eeimg{ animation-delay:2.6s; }
  @keyframes eepShow{to{opacity:1;} }/* Engage scene */
  #ee-products .sc-eng{ display:flex; flex-direction:column; gap:8px; justify-content:center; width:100%; }#ee-products .sc-msg{ display:flex; align-items:center; gap:8px; opacity:0; transform:translateX(-8px); animation:eepBub .5s ease forwards; }#ee-products .sc-msg.m2{ animation-delay:.6s; }#ee-products .sc-msg.m3{ animation-delay:1.2s; flex-direction:row-reverse; }#ee-products .sc-msg .av{ width:22px; height:22px; border-radius:50%; flex:0 0 auto; background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 50%,#0c2140)); }#ee-products .sc-msg .tx{ flex:1; height:13px; border-radius:6px; background:rgba(255,255,255,.1); }#ee-products .sc-msg.m3 .tx{ background:linear-gradient(135deg,var(--acc),color-mix(in srgb,var(--acc) 55%,#10274a)); max-width:60%; }#ee-products .sc-verified{ align-self:center; display:inline-flex; align-items:center; gap:6px; font-size:10.5px; font-weight:600; color:#a9c3e9; margin-top:2px; opacity:0; animation:eepBub .5s 1.7s forwards; }#ee-products .sc-verified svg,#ee-products .sc-verified img.eeimg{ width:14px; height:14px; }#ee-products .sc-verified svg *,#ee-products .sc-verified img.eeimg *{ stroke:#3474d3; }/* Grow scene */
  #ee-products .sc-grow{ display:flex; align-items:flex-end; justify-content:space-between; gap:9px; height:100%; padding:6px 4px; width:100%; }#ee-products .sc-bar{ flex:1; border-radius:6px 6px 0 0; background:linear-gradient(180deg,var(--acc),color-mix(in srgb,var(--acc) 45%,#0c2140)); height:14%; transform-origin:bottom; animation:eepGrow 2.4s ease-in-out infinite; }#ee-products .sc-bar:nth-child(1){--h:40%;}#ee-products .sc-bar:nth-child(2){--h:62%;}#ee-products .sc-bar:nth-child(3){--h:50%;}#ee-products .sc-bar:nth-child(4){--h:82%;}#ee-products .sc-bar:nth-child(5){--h:96%;}#ee-products .sc-bar:nth-child(2){animation-delay:.12s}#ee-products .sc-bar:nth-child(3){animation-delay:.24s}#ee-products .sc-bar:nth-child(4){animation-delay:.36s}#ee-products .sc-bar:nth-child(5){animation-delay:.48s}
  @keyframes eepGrow{0%{height:14%;}55%,100%{height:var(--h);} }

  /* ---------- Responsive ---------- */
  @media(max-width:980px){#ee-products .eep-main{ grid-template-columns:1fr; }#ee-products .eep-spot{ position:static; min-height:auto; }#ee-products .eep-grid{ grid-template-columns:repeat(2,1fr); }
  }
  @media(max-width:620px){#ee-products .eep-head{ align-items:stretch; }#ee-products .eep-search{ width:100%; }#ee-products .eep-filters{ flex-wrap:nowrap; overflow-x:auto; padding-bottom:6px; -webkit-overflow-scrolling:touch; scrollbar-width:none; }#ee-products .eep-filters::-webkit-scrollbar{ display:none; }#ee-products .eep-pill{ flex:0 0 auto; }#ee-products .eep-grid{ grid-template-columns:repeat(2,1fr); gap:10px; }#ee-products .eep-card{ padding:15px 13px; }#ee-products .eep-card-go{ opacity:1; transform:none; }
  }
  @media(prefers-reduced-motion:reduce){#ee-products *{ animation-duration:.001s !important; animation-iteration-count:1 !important; transition-duration:.001s !important; }
  }


  /* ── Mobile: no spotlight (Core platform panel), compact 2-up card grid ── */
  @media(max-width:767px){
    #ee-products .eep-spot{display:none!important}
    #ee-products .eep-main{grid-template-columns:1fr!important}
    #ee-products .eep-grid{grid-template-columns:repeat(2,1fr)!important;gap:9px!important}
    #ee-products .eep-card{padding:12px 10px!important;border-radius:13px}
    #ee-products .eep-chip{width:32px!important;height:32px!important;border-radius:9px!important}
    #ee-products .eep-chip svg{width:16px;height:16px}
    #ee-products .eep-card-title{font-size:12.5px!important;line-height:1.25}
    #ee-products .eep-card-desc{font-size:10.5px!important;line-height:1.45!important}
    #ee-products .eep-card-cat{font-size:8px!important;letter-spacing:.06em!important}
    #ee-products .eep-card-foot{margin-top:8px!important}
  }
</style>

<section id="ee-products" aria-label="Our products">
  <div class="eep-wrap">

    <div class="eep-head">
      <div class="eep-head-l">
        <h1 style="position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap;border:0">ExtraaEdge Products — Education CRM &amp; Admissions Platform</h1>
      </div>
    </div>

    <div class="eep-filters" id="eepFilters" role="group" aria-label="Filter products by category"></div>

    <div class="eep-main">
      <!-- Spotlight -->
      <aside class="eep-spot" id="eepSpot" aria-live="polite">
        <div class="eep-spot-top">
          <span class="eep-spot-tag"><i></i><span id="eepSpotCat">AI &amp; automation</span></span>
          <span class="eep-live"><b></b>Live preview</span>
        </div>
        <div class="eep-stage"><div class="eep-scene" id="eepScene"></div></div>
        <div class="eep-spot-body">
          <div class="eep-spot-icon" id="eepSpotIcon"></div>
          <h3 class="eep-spot-title" id="eepSpotTitle"></h3>
          <p class="eep-spot-desc" id="eepSpotDesc"></p>
          <div class="eep-spot-tags" id="eepSpotTags"></div>
          <a class="eep-spot-cta" id="eepSpotCta" href="#admission-form">See it in action <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/products-icon-02.svg" alt="" loading="lazy" decoding="async"></a>
        </div>
      </aside>

      <!-- Grid -->
      <div class="eep-grid" id="eepGrid">
        <div class="eep-empty" id="eepEmpty">
          <img class="eeimg" src="https://www.extraaedge.com/wp-content/uploads/2026/webpage-logo/home-page/products-icon-03.svg" alt="" loading="lazy" decoding="async">
          <b>No products match that</b>
          <span>Try a different word, or clear your search.</span>
          <button id="eepReset" type="button">Reset filters</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  (function(){
    var root = document.getElementById('ee-products');
    if(!root) return;

    /* ---- icons ---- */
    var IC = {
      crm:'<svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke-width="1.6"/><path d="M3.5 19c.6-3.1 2.8-5 5.5-5s4.9 1.9 5.5 5" stroke-width="1.6" stroke-linecap="round"/><path d="M16 8h5M16 12h4" stroke-width="1.6" stroke-linecap="round"/></svg>',
      spark:'<svg viewBox="0 0 24 24" fill="none"><path d="M12 3l1.6 4.4L18 9l-4.4 1.6L12 15l-1.6-4.4L6 9l4.4-1.6L12 3z" stroke-width="1.6" stroke-linejoin="round"/><path d="M18 14l.8 2.2L21 17l-2.2.8L18 20l-.8-2.2L15 17l2.2-.8L18 14z" stroke-width="1.5" stroke-linejoin="round"/></svg>',
      phone:'<svg viewBox="0 0 24 24" fill="none"><rect x="7" y="3" width="10" height="18" rx="2.4" stroke-width="1.6"/><path d="M11 18h2" stroke-width="1.6" stroke-linecap="round"/></svg>',
      gear:'<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="3" stroke-width="1.6"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1" stroke-width="1.6" stroke-linecap="round"/></svg>',
      doc:'<svg viewBox="0 0 24 24" fill="none"><path d="M7 3h7l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z" stroke-width="1.6" stroke-linejoin="round"/><path d="M14 3v4h4M9 13h6M9 16.5h4" stroke-width="1.6" stroke-linecap="round"/></svg>',
      shield:'<svg viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3.5v5c0 4.6-3.2 7.8-8 9.5-4.8-1.7-8-4.9-8-9.5v-5L12 3z" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
      globe:'<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke-width="1.6"/><path d="M3 12h18M12 3c2.5 2.4 3.8 5.6 3.8 9S14.5 18.6 12 21c-2.5-2.4-3.8-5.6-3.8-9S9.5 5.4 12 3z" stroke-width="1.5"/></svg>',
      chat:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 5h16v11H8l-4 4V5z" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 10h.01M12 10h.01M15 10h.01" stroke-width="2" stroke-linecap="round"/></svg>',
      whatsapp:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 19l1.3-3.9A8 8 0 1112 20a8 8 0 01-3.9-1L4 19z" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 11c0 2 2 4 4 4l1-1.4c.3-.4-.1-.9-.6-1l-1.4-.4-.6.8c-.9-.4-1.7-1.2-2.1-2.1l.8-.6c.3-.5-.1-1.3-1-1.5C9 8.8 9 9.8 9 11z" stroke-width="1.4" stroke-linejoin="round"/></svg>',
      call:'<svg viewBox="0 0 24 24" fill="none"><path d="M5 4h3l1.5 4-2 1.4a12 12 0 005.6 5.6l1.4-2L18.5 18v3a1 1 0 01-1.1 1A15 15 0 013 6.6 1 1 0 014.1 5.5L5 4z" stroke-width="1.6" stroke-linejoin="round"/></svg>',
      send:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 8l13-4-2 16-4-3-2.5 2.5L8 16 4 8z" stroke-width="1.6" stroke-linejoin="round"/><path d="M8 16l9-12" stroke-width="1.5" stroke-linecap="round"/></svg>',
      heart:'<svg viewBox="0 0 24 24" fill="none"><path d="M12 21c4.5-2 7-5.2 7-9.5C19 7 16 4 12 4S5 7 5 11.5C5 15.8 7.5 19 12 21z" stroke-width="1.6" stroke-linejoin="round"/><path d="M12 12.5a2.2 2.2 0 100-4.4 2.2 2.2 0 000 4.4z" stroke-width="1.5"/></svg>',
      bars:'<svg viewBox="0 0 24 24" fill="none"><path d="M4 20V4M4 20h16" stroke-width="1.6" stroke-linecap="round"/><path d="M8 16v-4M12 16V8M16 16v-6M20 16v-9" stroke-width="1.8" stroke-linecap="round"/></svg>'
    };

    /* ---- categories ---- (accent only shows inside the dark spotlight) */
    var CATS = {
      ai:        { label:'AI & automation', acc:'#5c9af6', scene:'ai'   },
      platform:  { label:'Core platform',   acc:'#F2935A', scene:'kan'  },
      admissions:{ label:'Admissions',      acc:'#5b96ef', scene:'adm'  },
      engage:    { label:'Engage',          acc:'#2564c2', scene:'eng'  },
      grow:      { label:'Grow',            acc:'#F2B441', scene:'grow' }
    };
    var FILTERS = [
      {id:'all', label:'All'},
      {id:'ai', label:'AI & automation'},
      {id:'platform', label:'Core platform'},
      {id:'admissions', label:'Admissions'},
      {id:'engage', label:'Engage'}
    ];

    /* ---- products ---- */
    /* products flagged in wp-admin (Platform Listing metabox) take over;
       the hardcoded list below is only the fallback when none are flagged */
    var DYNP = <?php echo wp_json_encode(function_exists('ee_eep_collect') ? ee_eep_collect('products') : array()); ?>;
    var P = (DYNP && DYNP.length) ? DYNP : [
      {id:'edu-crm', t:'Education CRM', badge:'Popular', cat:'platform', ic:'crm', href:'/products/education-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/education-crm.svg',
        d:'Unify every enquiry, counsellor and campus on one purpose-built platform.',
        l:'Built for admissions, not retrofitted from sales. One view of every enquiry, every counsellor and every campus - so nothing slips between teams.',
        tags:['360\u00b0 enquiry view','Counsellor workflows','Multi-campus ready']},
      {id:'app-mgmt', t:'Application Management System', cat:'admissions', ic:'doc', href:'/products/application-management-system/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/application-management.svg',
        d:'Track every application stage with automated nudges so no form stalls.',
        l:'See where every applicant is, in real time. Automated nudges restart stalled forms before they go cold.',
        tags:['Stage tracking','Auto nudges','Status alerts']},
      {id:'ams', t:'Admission Management System', cat:'admissions', ic:'shield', href:'/admission-management-software/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/admission-management-system.svg',
        d:'Orchestrate fees, documents and approvals end-to-end in one auditable flow.',
        l:'Run the whole admission cycle - fees, documents, approvals - in one place, with a complete audit trail for every decision.',
        tags:['Fees & documents','Approval flows','Full audit trail']},
      {id:'ems', t:'Enrollment Management System', cat:'admissions', ic:'shield', href:'/enrollment-management-software/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/enrollment-management.svg',
        d:'Convert offers into confirmed enrolments with fees, docs and seats tracked.',
        l:'From offer letter to first day - fee plans, document checklists and seat allocation tracked in one auditable flow.',
        tags:['Seat allocation','Fee plans','Document checklists']},
      {id:'mob-crm', t:'Mobile CRM', badge:'New', cat:'platform', ic:'phone', href:'/products/mobile-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/mobile-crm.svg',
        d:'Run admissions from your pocket - call, follow up and close on the go.',
        l:'Your full pipeline on mobile. Counsellors call, log and follow up from anywhere, with reminders that keep every lead moving.',
        tags:['Call from your phone','Push reminders','Works on the move']},
      {id:'waba', t:'WhatsApp API', cat:'engage', ic:'whatsapp', href:'/products/whatsapp-api/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/whatsapp-business-api.svg',
        d:'Reach families on their favourite channel with verified, automated conversations.',
        l:'Meet families where they already are. Verified WhatsApp with automated replies and broadcast campaigns that actually get read.',
        tags:['Verified sender','Automated replies','Broadcast campaigns']},
      {id:'vidya-ai', t:'Vidya AI', badge:'Coming Soon', cat:'ai', ic:'spark', href:'/vidyaai/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/vidya-ai.svg',
        d:'Your AI admissions copilot - drafts replies, scores intent and rings visitors live.',
        l:'The AI layer across your whole funnel. It drafts counsellor replies, scores every lead by intent, and can call a website visitor the moment they show interest.',
        tags:['Drafts replies','Scores lead intent','Rings visitors live']},
      {id:'vidya-gpt', t:'Vidya GPT', badge:'Coming Soon', cat:'ai', ic:'chat', href:'/vidyaai/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/vidyagpt-chat.svg',
        d:'Your 24x7 AI chat counsellor that answers every query and never sleeps.',
        l:'A conversational AI counsellor trained on your programmes - it answers every student query instantly, day or night, and hands warm leads to your team.',
        tags:['24x7 answers','Trained on your courses','Instant hand-off']},
      {id:'vidya-pulse', t:'Vidya Pulse', badge:'Coming Soon', cat:'ai', ic:'bars', href:'/vidyaai/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/ai-engine.svg',
        d:'Real-time lead intent scoring that surfaces your hottest prospects first.',
        l:'Every click, reply and visit feeds a live intent score - so counsellors always call the students most likely to enrol next.',
        tags:['Live intent scores','Hot-lead alerts','Priority calling']},
      {id:'vidya-voice', t:'Vidyaai Voice Agent', badge:'Coming Soon', cat:'ai', ic:'call', href:'/vidyaai/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/ai-voice-call.svg',
        d:'Calls and qualifies leads with natural conversations in 10+ languages.',
        l:'An AI voice agent that rings enquiries within seconds, speaks naturally in 10+ languages, qualifies interest and books counsellor slots.',
        tags:['10+ languages','Instant callback','Auto qualification']},
      {id:'vidya-waba', t:'VidyaWABA GPT', badge:'Coming Soon', cat:'ai', ic:'whatsapp', href:'/vidyaai/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/whatsapp-business-api.svg',
        d:'Automated WhatsApp Business engagement that nurtures leads at scale.',
        l:'GPT-powered WhatsApp conversations on your verified number - answers, nudges and follow-ups that keep every lead warm at scale.',
        tags:['Verified WhatsApp','GPT replies','Scale nurturing']},
      {id:'vidya-work', t:'Vidya Work', badge:'Coming Soon', cat:'ai', ic:'gear', href:'/vidyaai/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/workflow-engine.svg',
        d:'Autonomous workflow and follow-up automation that runs your busywork.',
        l:'Agentic automation for the admissions back office - it assigns tasks, chases documents and closes loops without anyone lifting a finger.',
        tags:['Auto task assignment','Document chasing','Zero busywork']},
      {id:'chatbot', t:'Education Chatbot', cat:'ai', ic:'chat', href:'/products/chatbot-for-education/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/education-ai-chatbot.svg',
        d:'Answer student questions 24/7 and capture qualified enquiries while you sleep.',
        l:'An always-on assistant that answers questions on your site and WhatsApp, qualifies interest, and hands warm leads to counsellors.',
        tags:['24/7 answers','Qualifies enquiries','Site + WhatsApp']},
      {id:'ivr', t:'IVR', cat:'engage', ic:'call', href:'/products/ivr/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/ivr-system.svg',
        d:'Route, record and track every call so no enquiry rings out unanswered.',
        l:'Smart call routing with recording and missed-call capture - every ring becomes a tracked, followed-up enquiry.',
        tags:['Smart call routing','Call recording','Missed-call capture']},
      {id:'srs', t:'Student Recruitment Software', cat:'admissions', ic:'globe', href:'/student-recruitment-software/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/student-recruitment.svg',
        d:'Plan outreach, manage agents and measure every recruitment channel.',
        l:'Run fairs, school visits and agent networks with clear attribution - know exactly which channel fills your seats.',
        tags:['Agent management','Event outreach','Channel attribution']},
      {id:'walkin', t:'Walk-in Management System', cat:'admissions', ic:'doc', href:'/walk-in-management-system/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/walk-in-management.svg',
        d:'Turn campus walk-ins into tracked, followed-up enquiries instantly.',
        l:'Front-desk capture for walk-in visitors - instant lead creation, counsellor hand-off and same-day follow-up reminders.',
        tags:['Front-desk capture','Instant hand-off','Same-day follow-up']},
      {id:'abroad-crm', t:'Study Abroad CRM', cat:'platform', ic:'globe', href:'/study-abroad-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/study-abroad-crm.svg',
        d:'Built for overseas consultants - courses, countries and commissions in one flow.',
        l:'Manage applicants across countries, universities and intakes, with agent commissions and document workflows built in.',
        tags:['Multi-country intakes','University shortlists','Commission tracking']},
      {id:'univ-crm', t:'University CRM', cat:'platform', ic:'crm', href:'/university-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/admissions-crm.svg',
        d:'Multi-department admissions for universities - one platform, every faculty.',
        l:'Departments, programmes and campuses on one system, with role-based access and university-grade reporting.',
        tags:['Multi-department','Role-based access','Programme-wise funnels']},
      {id:'school-crm', t:'School CRM', cat:'platform', ic:'crm', href:'/school-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/k-12-schools.svg',
        d:'Parent-first admissions for schools - enquiry to enrolment without paperwork.',
        l:'Built around parent conversations - sibling linking, visit scheduling and fee collection in one friendly flow.',
        tags:['Parent journeys','Visit scheduling','Sibling linking']},
      {id:'coaching-crm', t:'Coaching CRM', cat:'platform', ic:'crm', href:'/coaching-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/coaching-and-training.svg',
        d:'High-volume batch admissions for coaching institutes, minus the chaos.',
        l:'Handle thousands of enquiries per intake - batch allocation, counselling slots and fee reminders on autopilot.',
        tags:['Batch allocation','High-volume intake','Fee reminders']},
      {id:'he-crm', t:'Higher Education CRM', badge:'Popular', cat:'platform', ic:'crm', href:'/industries/higher-education-crm/', img:'https://www.extraaedge.com/wp-content/uploads/2026/home-page/higher-education.svg',
        d:'Purpose-built CRM for colleges and universities to scale admissions 2X.',
        l:'The complete higher-education stack - lead capture to enrolment with AI nurturing, tuned to college workflows.',
        tags:['2X conversions','AI nurturing','College workflows']}
    ];

    /* ---- scene builders ---- */
    function scene(type){
      switch(type){
        case 'ai': return '<div class="sc-ai">'+
          '<div class="sc-bub">Hi! Is the fee structure available?</div>'+
          '<div class="sc-bub me b2">Yes - sharing it now. Shall I call you to walk through it?</div>'+
          '<div class="sc-bub b3" style="display:flex;align-items:center;gap:6px">Calling you<span class="sc-wave"><span></span><span></span><span></span><span></span><span></span></span></div>'+
          '<div class="sc-type"><i></i><i></i><i></i></div></div>';
        case 'kan': return '<div class="sc-kan">'+
          '<div class="sc-col"><h6>New</h6><div class="sc-lead live"></div><div class="sc-lead"></div></div>'+
          '<div class="sc-col"><h6>Engaged</h6><div class="sc-lead"></div></div>'+
          '<div class="sc-col"><h6>Enrolled</h6><div class="sc-lead"></div><div class="sc-lead"></div></div></div>';
        case 'adm': var tk='<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>';
          return '<div class="sc-adm"><div class="sc-prog"><i></i></div>'+
          '<div class="sc-row sc-r1"><span class="sc-tick">'+tk+'</span>Documents verified</div>'+
          '<div class="sc-row sc-r2"><span class="sc-tick">'+tk+'</span>Fee received</div>'+
          '<div class="sc-row sc-r3"><span class="sc-tick">'+tk+'</span>Offer approved</div></div>';
        case 'eng': return '<div class="sc-eng">'+
          '<div class="sc-msg"><span class="av"></span><span class="tx"></span></div>'+
          '<div class="sc-msg m2"><span class="av"></span><span class="tx"></span></div>'+
          '<div class="sc-msg m3"><span class="av"></span><span class="tx"></span></div>'+
          '<div class="sc-verified"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke-width="1.6"/><path d="M8.5 12l2.5 2.5 4.5-5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>Verified business · delivered</div></div>';
        case 'grow': return '<div class="sc-grow"><span class="sc-bar"></span><span class="sc-bar"></span><span class="sc-bar"></span><span class="sc-bar"></span><span class="sc-bar"></span></div>';
      }
      return '';
    }

    /* ---- build filter pills ---- */
    var counts = {all:P.length};
    P.forEach(function(p){ counts[p.cat]=(counts[p.cat]||0)+1; });
    /* merge admin-defined categories (Products → Listing Categories & Badges):
       same slug overrides label/colour; brand-new slugs get their own filter
       chip automatically once at least one product uses them */
    var XCATS = <?php echo wp_json_encode(function_exists('ee_eep_all_cats') ? ee_eep_all_cats() : array()); ?>;
    if (XCATS && !Array.isArray(XCATS)) {
      Object.keys(XCATS).forEach(function(k){
        if (CATS[k]) { CATS[k].label = XCATS[k].label; CATS[k].acc = XCATS[k].acc; }
        else CATS[k] = { label: XCATS[k].label, acc: XCATS[k].acc, scene: 'kan' };
      });
      FILTERS.forEach(function(f){ if (f.id !== 'all' && CATS[f.id]) f.label = CATS[f.id].label; });
      Object.keys(XCATS).forEach(function(k){
        var used = P.some(function(p){ return p.cat === k; });
        if (used && !FILTERS.some(function(f){ return f.id === k; })) FILTERS.push({ id: k, label: XCATS[k].label });
      });
    }

    var filtersEl = document.getElementById('eepFilters');
    FILTERS.forEach(function(f,i){
      var b=document.createElement('button');
      b.className='eep-pill'; b.type='button'; b.dataset.cat=f.id;
      b.setAttribute('aria-pressed', i===0?'true':'false');
      b.innerHTML=f.label+' <span class="eep-count">'+(counts[f.id]||0)+'</span>';
      filtersEl.appendChild(b);
    });

    /* brand logo per product; falls back to the glyph icon if none is mapped */
    var LOGO_BASE='';
    var LOGO={};
    function ico(p){ var u=p.img||(LOGO[p.id]?LOGO_BASE+LOGO[p.id]:''); return u ? '<img class="eep-ic-img" src="'+u+'" alt="" loading="lazy" decoding="async">' : IC[p.ic]; }

    /* ---- build cards ---- */
    var grid = document.getElementById('eepGrid');
    var emptyEl = document.getElementById('eepEmpty');
    P.forEach(function(p){
      var c = CATS[p.cat];
      var a=document.createElement('a');
      a.className='eep-card'; a.href=p.href; a.dataset.id=p.id; a.dataset.cat=p.cat;
      a.dataset.search=(p.t+' '+p.d+' '+p.tags.join(' ')+' '+c.label).toLowerCase();
      a.style.setProperty('--cardacc', c.acc);
      a.innerHTML=''+
        '<div class="eep-card-top"><span class="eep-chip" aria-hidden="true">'+ico(p)+'</span>'+
        '<span class="eep-card-title">'+p.t+(p.badge?' <span class="eep-badge">'+p.badge+'</span>':'')+'</span></div>'+
        '<p class="eep-card-desc">'+p.d+'</p>'+
        '<div class="eep-card-foot"><span class="eep-card-cat">'+c.label+'</span>'+
        '<span class="eep-card-go" aria-label="Learn more"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div>';
      grid.insertBefore(a, emptyEl);
    });
    var cards = Array.prototype.slice.call(grid.querySelectorAll('.eep-card'));

    /* ---- spotlight refs ---- */
    var spot=document.getElementById('eepSpot'), sCat=document.getElementById('eepSpotCat'),
        sIcon=document.getElementById('eepSpotIcon'), sTitle=document.getElementById('eepSpotTitle'),
        sDesc=document.getElementById('eepSpotDesc'), sTags=document.getElementById('eepSpotTags'),
        sCta=document.getElementById('eepSpotCta'), sScene=document.getElementById('eepScene');
    var activeId=null;

    function setActive(id, fromUser){
      var p=P.filter(function(x){return x.id===id;})[0]; if(!p) return;
      activeId=id;
      var c=CATS[p.cat];
      spot.style.setProperty('--acc', c.acc);
      spot.style.setProperty('--acc-soft', hexA(c.acc,.18));
      sCat.textContent=c.label;
      sIcon.innerHTML=ico(p);
      sTitle.innerHTML=p.t+(p.badge?' <span class="eep-new">'+p.badge+'</span>':'');
      sDesc.textContent=p.l;
      sTags.innerHTML=p.tags.map(function(t){return '<span>'+t+'</span>';}).join('');
      sCta.setAttribute('href', p.href);
      sScene.innerHTML=''; // restart scene animation
      void sScene.offsetWidth;
      sScene.innerHTML=scene(c.scene);
      cards.forEach(function(cd){ cd.classList.toggle('is-active', cd.dataset.id===id); });
      if(fromUser) pauseRotate();
    }
    function hexA(hex,a){ var h=hex.replace('#',''); var r=parseInt(h.substr(0,2),16),g=parseInt(h.substr(2,2),16),b=parseInt(h.substr(4,2),16); return 'rgba('+r+','+g+','+b+','+a+')'; }

    /* ---- hover / focus updates spotlight ---- */
    var canHover = !!(window.matchMedia && window.matchMedia('(hover: hover)').matches);
    cards.forEach(function(cd){
      cd.addEventListener('mouseenter', function(){ setActive(cd.dataset.id, true); });
      cd.addEventListener('focus', function(){ setActive(cd.dataset.id, true); });
      /* Touch / no-hover devices: first tap previews the product in the
         spotlight (and brings it into view); a second tap on the already
         active card follows the link. Keeps desktop hover+click unchanged. */
      cd.addEventListener('click', function(e){
        if(canHover) return;                 // desktop: let the link work normally
        if(cd.dataset.id === activeId) return; // already previewed → allow navigation
        e.preventDefault();
        setActive(cd.dataset.id, true);
        try{ spot.scrollIntoView({behavior:'smooth', block:'center'}); }
        catch(_){ spot.scrollIntoView(); }
      });
    });

    /* ---- filtering + search ---- */
    var curCat='all', curQ='';
    function apply(){
      var shown=0, firstVisible=null;
      cards.forEach(function(cd){
        var okCat = curCat==='all' || cd.dataset.cat===curCat;
        var okQ = !curQ || cd.dataset.search.indexOf(curQ)>-1;
        var vis = okCat && okQ;
        cd.hidden = !vis;
        if(vis){ shown++; if(!firstVisible) firstVisible=cd; }
      });
      emptyEl.classList.toggle('show', shown===0);
      // keep spotlight pointing at something visible
      if(shown>0){
        var stillVisible = cards.some(function(cd){ return cd.dataset.id===activeId && !cd.hidden; });
        if(!stillVisible && firstVisible) setActive(firstVisible.dataset.id);
        rebuildRotation();
      }
    }

    filtersEl.addEventListener('click', function(e){
      var b=e.target.closest('.eep-pill'); if(!b) return;
      curCat=b.dataset.cat;
      filtersEl.querySelectorAll('.eep-pill').forEach(function(p){ p.setAttribute('aria-pressed', p===b?'true':'false'); });
      apply(); pauseRotate();
    });

    var input=document.getElementById('eepInput'), searchWrap=document.getElementById('eepSearch'),
        clearBtn=document.getElementById('eepClear');
    if (input) {
      input.addEventListener('input', function(){
        curQ=input.value.trim().toLowerCase();
        if (searchWrap) searchWrap.classList.toggle('has-val', curQ.length>0);
        apply(); pauseRotate();
      });
    }
    if (clearBtn) clearBtn.addEventListener('click', function(){ if(input){input.value='';} curQ=''; if(searchWrap)searchWrap.classList.remove('has-val'); apply(); if(input)input.focus(); });
    var resetBtn=document.getElementById('eepReset');
    if (resetBtn) resetBtn.addEventListener('click', function(){
      if(input){input.value='';} curQ=''; curCat='all'; if(searchWrap)searchWrap.classList.remove('has-val');
      filtersEl.querySelectorAll('.eep-pill').forEach(function(p){ p.setAttribute('aria-pressed', p.dataset.cat==='all'?'true':'false'); });
      apply();
    });

    /* ---- idle auto-rotation through featured products ---- */
    var FEATURED=['vidya','edu-crm','analytics','waba','app-mgmt'];
    var rotePool=[], roteIdx=0, roteTimer=null, idleTimer=null;
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion:reduce)').matches;

    function rebuildRotation(){
      rotePool = FEATURED.filter(function(id){
        var cd=cards.filter(function(c){return c.dataset.id===id;})[0];
        return cd && !cd.hidden;
      });
      if(rotePool.length===0){
        rotePool = cards.filter(function(c){return !c.hidden;}).map(function(c){return c.dataset.id;});
      }
    }
    function startRotate(){
      if(reduce) return;
      stopRotate(); rebuildRotation();
      roteTimer=setInterval(function(){
        if(rotePool.length===0) return;
        roteIdx=(roteIdx+1)%rotePool.length;
        // skip if it lands on current
        if(rotePool[roteIdx]===activeId && rotePool.length>1) roteIdx=(roteIdx+1)%rotePool.length;
        setActive(rotePool[roteIdx]);
      }, 3600);
    }
    function stopRotate(){ if(roteTimer){ clearInterval(roteTimer); roteTimer=null; } }
    function pauseRotate(){
      stopRotate();
      if(idleTimer) clearTimeout(idleTimer);
      idleTimer=setTimeout(startRotate, 6000); // resume after 6s of no interaction
    }
    // stop rotation while the user is inside the section
    root.addEventListener('mouseenter', stopRotate);
    root.addEventListener('mouseleave', function(){ pauseRotate(); });

    /* ---- init ---- */
    setActive('vidya');
    apply();
    // begin idle rotation only when section scrolls into view
    if('IntersectionObserver' in window){
      var io=new IntersectionObserver(function(ents){
        ents.forEach(function(en){ if(en.isIntersecting){ startRotate(); io.disconnect(); } });
      }, {threshold:.25});
      io.observe(root);
    } else { startRotate(); }
  })();
  </script>
</section>
<?php get_footer();
