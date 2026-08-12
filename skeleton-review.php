<?php
/**
 * ExtraaEdge Homepage Skeleton - Structure Review page with SHARED comments.
 *
 * Standalone PHP file: needs no WordPress bootstrap. Upload anywhere under the
 * site (webroot or a theme folder) and open its URL directly. Comments are
 * stored in ONE JSON file on the server, so every reviewer sees everyone's
 * comments, and they survive refreshes and different devices.
 *
 * Storage: wp-content/uploads/ee-skeleton-review/comments.json (found by
 * walking up from this file), else next to this file, else the system tmp dir.
 */

header('Cache-Control: no-store, max-age=0');
header('X-LiteSpeed-Cache-Control: no-cache');   /* LiteSpeed must never cache this page */

function ee_store_dir() {
    $d = __DIR__;
    for ($i = 0; $i < 7; $i++) {
        $u = $d . '/wp-content/uploads';
        if (is_dir($u) && is_writable($u)) {
            $t = $u . '/ee-skeleton-review';
            if (!is_dir($t)) @mkdir($t, 0755, true);
            if (is_dir($t) && is_writable($t)) {
                /* deny direct URL reads of the data file (LiteSpeed/Apache honour .htaccess) */
                if (!file_exists($t . '/.htaccess')) @file_put_contents($t . '/.htaccess', "Require all denied\n");
                if (!file_exists($t . '/index.php')) @file_put_contents($t . '/index.php', "<?php // silence\n");
                return $t;
            }
        }
        $p = dirname($d);
        if ($p === $d) break;
        $d = $p;
    }
    if (is_writable(__DIR__)) return __DIR__;
    return sys_get_temp_dir();
}

function ee_comments_file() { return ee_store_dir() . '/comments.json'; }

/* read + optionally mutate the store under an exclusive lock */
function ee_with_store($mutator = null) {
    $file = ee_comments_file();
    $fh = fopen($file, 'c+');
    if (!$fh) return array('comments' => array());
    flock($fh, $mutator ? LOCK_EX : LOCK_SH);
    $raw = stream_get_contents($fh);
    $data = json_decode($raw ?: '{"comments":[]}', true);
    if (!is_array($data) || !isset($data['comments']) || !is_array($data['comments'])) $data = array('comments' => array());
    if ($mutator) {
        $data = $mutator($data);
        rewind($fh); ftruncate($fh, 0);
        fwrite($fh, json_encode($data, JSON_UNESCAPED_UNICODE));
        fflush($fh);
    }
    flock($fh, LOCK_UN); fclose($fh);
    return $data;
}

function ee_public_list($data) {
    $out = array();
    foreach ($data['comments'] as $c) { if (empty($c['deleted'])) $out[] = $c; }
    return array('ok' => true, 'comments' => $out);
}

if (isset($_GET['api'])) {
    header('Content-Type: application/json; charset=utf-8');
    $api = $_GET['api'];

    if ($api === 'list') {
        echo json_encode(ee_public_list(ee_with_store()), JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($api === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $name    = trim(strip_tags((string)($_POST['name'] ?? '')));
        $text    = trim(strip_tags((string)($_POST['text'] ?? '')));
        $section = trim(strip_tags((string)($_POST['section'] ?? 'General')));
        $xr = (float)($_POST['xr'] ?? 0.5); $yr = (float)($_POST['yr'] ?? 0.5);
        if ($text === '') { echo json_encode(array('ok' => false, 'err' => 'empty')); exit; }
        $c = array(
            'id'      => uniqid('c', true),
            'name'    => ($name !== '' ? mb_substr($name, 0, 60) : 'Anonymous'),
            'text'    => mb_substr($text, 0, 2000),
            'section' => ($section !== '' ? mb_substr($section, 0, 120) : 'General'),
            'xr'      => max(0.0, min(1.0, $xr)),
            'yr'      => max(0.0, min(1.0, $yr)),
            'ts'      => time(),
        );
        $data = ee_with_store(function ($d) use ($c) {
            if (count($d['comments']) < 5000) $d['comments'][] = $c;
            return $d;
        });
        echo json_encode(ee_public_list($data), JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($api === 'del' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (string)($_POST['id'] ?? '');
        /* soft delete: hidden from the page but kept in the JSON file, so no
           feedback is ever destroyed */
        $data = ee_with_store(function ($d) use ($id) {
            foreach ($d['comments'] as &$c) { if ($c['id'] === $id) $c['deleted'] = true; }
            return $d;
        });
        echo json_encode(ee_public_list($data), JSON_UNESCAPED_UNICODE);
        exit;
    }

    echo json_encode(array('ok' => false, 'err' => 'unknown api'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ExtraaEdge Homepage · Structure Review (Skeleton)</title>
<style>
  /* ── Reset & Base ── */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
    font-size: 16px;
    color: #111;
    background: #fff;
    line-height: 1.6;
  }

  /* ── Review Banner ── */
  .review-banner {
    background: #111;
    color: #fff;
    padding: 10px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 13px;
    position: sticky;
    top: 0;
    z-index: 9999;
    gap: 16px;
  }
  .review-banner strong { color: #FFD700; }
  .review-banner .banner-actions { display: flex; gap: 8px; flex-shrink: 0; }
  .btn-sm {
    padding: 5px 12px;
    font-size: 12px;
    border: 1px solid #888;
    background: transparent;
    color: #fff;
    cursor: pointer;
    border-radius: 4px;
  }
  .btn-sm:hover { background: #333; }
  .btn-sm.primary { background: #FFD700; color: #111; border-color: #FFD700; font-weight: 600; }
  .btn-sm.primary:hover { background: #e6c200; }

  /* ── Section Label ── */
  .section-label {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.12em;
    color: #999;
    background: #f0f0f0;
    border: 1px solid #ddd;
    padding: 2px 8px;
    border-radius: 3px;
    margin-bottom: 20px;
    text-transform: uppercase;
  }

  /* ── Sections ── */
  section {
    padding: 72px 0;
    border-bottom: 1px solid #eee;
    position: relative;
  }
  section:nth-child(even) { background: #fafafa; }
  .container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 32px;
  }

  /* ── Navigation ── */
  .site-nav {
    background: #fff;
    border-bottom: 1px solid #e0e0e0;
    padding: 0;
  }
  .nav-inner {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 60px;
  }
  .nav-logo {
    font-size: 18px;
    font-weight: 800;
    letter-spacing: -0.02em;
    color: #111;
  }
  .nav-links {
    display: flex;
    gap: 28px;
    list-style: none;
    font-size: 14px;
    color: #444;
  }
  .nav-links li { cursor: pointer; }
  .nav-links li:hover { color: #111; }
  .nav-cta {
    padding: 8px 18px;
    border: 1.5px solid #111;
    background: #111;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
  }

  /* ── Hero: centered, text only ── */
  .hero { padding: 120px 0 96px; background: #fff; }
  .hero-centered {
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
  }
  .hero h1 {
    font-size: 56px;
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -0.03em;
    margin-bottom: 24px;
    color: #111;
  }
  .hero-value-prop {
    font-size: 19px;
    color: #555;
    line-height: 1.65;
    margin-bottom: 40px;
  }
  .hero-ctas { display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; }
  .cta-primary {
    padding: 14px 28px;
    background: #111;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    border: 1.5px solid #111;
    border-radius: 8px;
    cursor: pointer;
  }
  .cta-secondary {
    padding: 14px 28px;
    background: transparent;
    color: #111;
    font-size: 15px;
    font-weight: 600;
    border: 1.5px solid #ccc;
    border-radius: 8px;
    cursor: pointer;
  }

  /* ── Logo Category Tabs ── */
  .logo-category-tabs {
    display: flex;
    gap: 0;
    justify-content: center;
    margin-bottom: 32px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
  }
  .logo-cat-tab {
    padding: 9px 22px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    border-right: 1px solid #e0e0e0;
    background: #fafafa;
    color: #666;
    border: none;
    border-right: 1px solid #e0e0e0;
  }
  .logo-cat-tab:last-child { border-right: none; }
  .logo-cat-tab.active { background: #111; color: #fff; }
  .logo-group { display: none; }
  .logo-group.active { display: flex; gap: 20px; align-items: center; justify-content: center; flex-wrap: wrap; }

  /* ── Proof Row ── */
  .proof-row {
    padding: 40px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    background: #fff;
  }
  .proof-stats {
    display: flex;
    justify-content: center;
    gap: 64px;
    margin-bottom: 32px;
  }
  .proof-stat { text-align: center; }
  .proof-stat .number { font-size: 32px; font-weight: 800; color: #111; letter-spacing: -0.02em; }
  .proof-stat .label { font-size: 13px; color: #777; margin-top: 4px; }
  .logo-bar {
    display: flex;
    gap: 24px;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
  }
  .logo-placeholder {
    width: 100px;
    height: 36px;
    background: #ebebeb;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    color: #aaa;
    font-weight: 600;
    letter-spacing: 0.05em;
  }

  /* ── Section Headings ── */
  .section-heading { font-size: 36px; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 12px; }
  .section-subhead { font-size: 17px; color: #666; margin-bottom: 48px; max-width: 560px; }

  /* ── Problem ── */
  .problem-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin-top: 48px;
  }
  .problem-card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 28px;
    background: #fff;
  }
  .problem-icon {
    width: 40px;
    height: 40px;
    background: #ebebeb;
    border-radius: 8px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
  }
  .problem-card h3 { font-size: 16px; font-weight: 700; margin-bottom: 8px; }
  .problem-card p { font-size: 14px; color: #666; line-height: 1.5; }

  /* ── How It Works ── */
  .steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-top: 48px;
    position: relative;
  }
  .step {
    text-align: center;
    padding: 24px 16px;
    position: relative;
  }
  .step-number {
    width: 48px;
    height: 48px;
    border: 2px solid #111;
    border-radius: 50%;
    font-size: 20px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
  }
  .step h3 { font-size: 15px; font-weight: 700; margin-bottom: 8px; }
  .step p { font-size: 13px; color: #666; line-height: 1.5; }
  .step-connector {
    position: absolute;
    top: 40px;
    right: -16px;
    font-size: 18px;
    color: #ccc;
  }

  /* ── Vidya AI Suite ── */
  .vidya-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 48px;
  }
  .vidya-card {
    border: 1.5px solid #e0e0e0;
    border-radius: 12px;
    padding: 32px 24px;
    display: flex;
    flex-direction: column;
    min-height: 200px;
  }
  .vidya-tag {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #888;
    margin-bottom: 12px;
  }
  .vidya-card h3 { font-size: 20px; font-weight: 800; margin-bottom: 8px; }
  .vidya-card p { font-size: 14px; color: #666; margin-bottom: 16px; line-height: 1.5; }
  .vidya-card a {
    font-size: 13px;
    font-weight: 600;
    color: #111;
    text-decoration: underline;
    cursor: pointer;
  }

  /* ── Live Demo ── */
  .demo-box {
    background: #f5f5f5;
    border: 1.5px dashed #bbb;
    border-radius: 12px;
    min-height: 380px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #888;
    margin-top: 40px;
    padding: 32px;
  }
  .demo-box .demo-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #bbb;
    margin-bottom: 8px;
  }
  .demo-box .demo-desc { font-size: 14px; color: #aaa; max-width: 320px; }

  /* ── Role Tabs ── */
  .role-tabs {
    display: flex;
    gap: 0;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 32px;
    width: fit-content;
  }
  .role-tab {
    padding: 10px 24px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    border-right: 1px solid #e0e0e0;
    background: #fafafa;
    color: #666;
  }
  .role-tab:last-child { border-right: none; }
  .role-tab.active { background: #111; color: #fff; }
  .role-content {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 48px;
    align-items: start;
  }
  .role-stat { font-size: 48px; font-weight: 800; color: #111; letter-spacing: -0.02em; }
  .role-stat-label { font-size: 14px; color: #666; margin-top: 4px; }
  .role-benefits { list-style: none; }
  .role-benefits li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    font-size: 15px;
    color: #333;
    display: flex;
    gap: 10px;
    align-items: flex-start;
  }
  .role-benefits li::before { content: "→"; color: #888; flex-shrink: 0; }

  /* ── Case Studies ── */
  .case-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 48px;
  }
  .case-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 28px;
    background: #fff;
  }
  .case-institution { font-size: 13px; font-weight: 700; color: #888; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 12px; }
  .case-metric { font-size: 32px; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 8px; }
  .case-desc { font-size: 14px; color: #666; margin-bottom: 16px; line-height: 1.5; }
  .case-link { font-size: 13px; font-weight: 600; color: #111; text-decoration: underline; cursor: pointer; }
  .case-cta { text-align: center; margin-top: 32px; }
  .case-cta a { font-size: 15px; font-weight: 600; color: #111; text-decoration: underline; }

  /* ── Outcome Tabs + Video Carousel (S8) ── */
  .outcome-filter-tabs {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 36px;
  }
  .outcome-filter-tab {
    padding: 8px 18px;
    font-size: 13px;
    font-weight: 600;
    border: 1.5px solid #ddd;
    border-radius: 40px;
    background: #fff;
    color: #555;
    cursor: pointer;
  }
  .outcome-filter-tab.active {
    background: #111;
    border-color: #111;
    color: #fff;
  }
  .video-carousel {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 8px;
  }
  .video-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
  }
  .video-thumb {
    background: #ebebeb;
    height: 170px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: #aaa;
    position: relative;
  }
  .video-play {
    width: 52px;
    height: 52px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    border: 1.5px solid #ccc;
  }
  .video-card-body { padding: 20px; }
  .video-outcome-tag {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #888;
    margin-bottom: 8px;
  }
  .video-institution { font-size: 15px; font-weight: 700; margin-bottom: 4px; }
  .video-metric { font-size: 24px; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 6px; }
  .video-quote { font-size: 13px; color: #666; line-height: 1.5; font-style: italic; }

  /* ── Snake Funnel (S4) ── */
  .snake-funnel { margin-top: 56px; }
  .snake-row {
    display: grid;
    grid-template-columns: 1fr 80px 1fr;
    gap: 0;
    align-items: center;
    margin-bottom: 0;
  }
  .snake-row.reverse { direction: rtl; }
  .snake-row.reverse .snake-step { direction: ltr; }
  .snake-row.reverse .snake-connector { direction: ltr; }
  .snake-step {
    border: 1.5px solid #e0e0e0;
    border-radius: 12px;
    padding: 28px;
    background: #fff;
    position: relative;
    min-height: 180px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }
  .snake-step-num {
    width: 32px; height: 32px;
    border: 2px solid #111;
    border-radius: 50%;
    font-size: 14px; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 12px;
  }
  .snake-step h3 { font-size: 17px; font-weight: 700; margin-bottom: 6px; }
  .snake-step p { font-size: 13px; color: #666; line-height: 1.5; }
  .snake-ai-badge {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 11px; font-weight: 700; letter-spacing: 0.06em;
    background: #111; color: #fff;
    border-radius: 20px; padding: 4px 10px;
    margin-top: 12px; text-transform: uppercase;
  }
  .snake-connector {
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    font-size: 22px; color: #bbb; font-weight: 300;
    height: 100%;
  }
  .snake-vertical {
    display: flex; justify-content: flex-end;
    padding-right: 40px; margin: 0;
    font-size: 22px; color: #bbb;
  }
  .snake-vertical.left { justify-content: flex-start; padding-left: 40px; padding-right: 0; }
  .snake-automation-bar {
    margin-top: 40px;
    background: #f5f5f5;
    border: 1.5px dashed #bbb;
    border-radius: 10px;
    padding: 20px 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
  }
  .automation-stat { font-size: 28px; font-weight: 800; letter-spacing: -0.02em; }
  .automation-label { font-size: 12px; color: #666; margin-top: 2px; }
  .automation-products { display: flex; gap: 12px; flex-wrap: wrap; }
  .automation-product {
    font-size: 12px; font-weight: 700;
    border: 1.5px solid #ddd;
    border-radius: 20px; padding: 4px 14px;
    color: #444;
  }

  /* ── Capability Grid (Explore ExtraaEdge) ── */
  .capability-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 48px;
  }
  .capability-card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 24px;
    background: #fff;
    cursor: pointer;
    transition: border-color 0.15s;
  }
  .capability-card:hover { border-color: #111; }
  .capability-icon { font-size: 22px; margin-bottom: 10px; }
  .capability-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
  .capability-card p { font-size: 12px; color: #777; line-height: 1.4; }
  .capability-card .cap-link { font-size: 11px; font-weight: 700; color: #111; margin-top: 10px; display: block; text-decoration: underline; }

  /* ── Sectors We Serve ── */
  .sectors-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 16px;
    margin-top: 48px;
  }
  .sector-card {
    border: 1.5px solid #e0e0e0;
    border-radius: 12px;
    padding: 28px 20px;
    text-align: center;
    background: #fff;
    cursor: pointer;
  }
  .sector-card:hover { border-color: #111; }
  .sector-icon { font-size: 28px; margin-bottom: 12px; }
  .sector-card h4 { font-size: 14px; font-weight: 700; margin-bottom: 6px; }
  .sector-card p { font-size: 12px; color: #777; line-height: 1.4; margin-bottom: 12px; }
  .sector-card .sector-link { font-size: 11px; font-weight: 700; color: #111; text-decoration: underline; }

  /* ── Enterprise ── */
  .enterprise-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-top: 48px;
  }
  .enterprise-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding: 24px;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    background: #fff;
  }
  .enterprise-icon {
    width: 36px;
    height: 36px;
    background: #ebebeb;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    margin-bottom: 4px;
  }
  .enterprise-item h4 { font-size: 15px; font-weight: 700; }
  .enterprise-item p { font-size: 13px; color: #666; line-height: 1.4; }

  /* ── Final CTA ── */
  .final-cta { text-align: center; padding: 96px 0; }
  .final-cta h2 { font-size: 40px; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 24px; }
  .final-cta .cta-primary { font-size: 16px; padding: 16px 32px; }

  /* ── FAQ ── */
  .faq-list { max-width: 700px; margin: 48px auto 0; }
  .faq-item {
    border-bottom: 1px solid #eee;
    padding: 18px 0;
    cursor: pointer;
  }
  .faq-q {
    font-size: 15px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
  }
  .faq-q::after { content: "+"; font-size: 18px; color: #888; flex-shrink: 0; }
  .faq-a {
    font-size: 14px;
    color: #666;
    margin-top: 10px;
    line-height: 1.6;
    display: none;
  }
  .faq-item.open .faq-a { display: block; }
  .faq-item.open .faq-q::after { content: "−"; }

  /* ── Footer ── */
  .site-footer {
    background: #f5f5f5;
    border-top: 1px solid #e0e0e0;
    padding: 48px 0 24px;
  }
  .footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
    gap: 40px;
    margin-bottom: 40px;
  }
  .footer-brand .footer-logo { font-size: 18px; font-weight: 800; margin-bottom: 12px; }
  .footer-brand p { font-size: 13px; color: #666; max-width: 240px; line-height: 1.6; }
  .footer-col h5 { font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #888; margin-bottom: 12px; }
  .footer-col ul { list-style: none; }
  .footer-col ul li { font-size: 13px; color: #555; margin-bottom: 8px; cursor: pointer; }
  .footer-bottom { border-top: 1px solid #e0e0e0; padding-top: 20px; font-size: 12px; color: #aaa; text-align: center; }

  /* ── Comment System ── */
  [data-section] { position: relative; }
  .comment-pin {
    position: absolute;
    width: 28px;
    height: 28px;
    background: #FFD700;
    border: 2px solid #111;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 800;
    color: #111;
    cursor: pointer;
    z-index: 1000;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    transform: translate(-14px, -14px);
    transition: transform 0.1s;
  }
  .comment-pin:hover { transform: translate(-14px, -14px) scale(1.15); }

  .comment-popup {
    position: fixed;
    background: #fff;
    border: 1.5px solid #111;
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.15);
    z-index: 10000;
    display: none;
  }
  .comment-popup h4 { font-size: 14px; font-weight: 700; margin-bottom: 12px; }
  .comment-popup input,
  .comment-popup textarea {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 8px 10px;
    font-size: 13px;
    font-family: inherit;
    margin-bottom: 10px;
    outline: none;
  }
  .comment-popup input:focus,
  .comment-popup textarea:focus { border-color: #111; }
  .comment-popup textarea { height: 80px; resize: vertical; }
  .popup-actions { display: flex; gap: 8px; }
  .popup-save {
    flex: 1;
    padding: 8px;
    background: #111;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
  }
  .popup-cancel {
    padding: 8px 14px;
    background: transparent;
    color: #666;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 13px;
    cursor: pointer;
  }

  /* ── Comment Sidebar ── */
  .comment-sidebar {
    position: fixed;
    top: 42px;
    right: 0;
    width: 320px;
    height: calc(100vh - 42px);
    background: #fff;
    border-left: 1.5px solid #e0e0e0;
    overflow-y: auto;
    z-index: 8888;
    transform: translateX(100%);
    transition: transform 0.2s ease;
  }
  .comment-sidebar.open { transform: translateX(0); }
  .sidebar-header {
    padding: 16px 20px;
    border-bottom: 1px solid #eee;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    background: #fff;
  }
  .sidebar-header h3 { font-size: 14px; font-weight: 700; }
  .sidebar-close { cursor: pointer; font-size: 18px; color: #888; }
  .sidebar-empty { padding: 32px 20px; font-size: 13px; color: #aaa; text-align: center; }
  .sidebar-comment {
    padding: 14px 20px;
    border-bottom: 1px solid #f0f0f0;
  }
  .sidebar-comment-header { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; }
  .sidebar-pin-num {
    width: 22px;
    height: 22px;
    background: #FFD700;
    border: 1.5px solid #111;
    border-radius: 50%;
    font-size: 10px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .sidebar-name { font-size: 13px; font-weight: 700; }
  .sidebar-section { font-size: 11px; color: #999; margin-left: auto; }
  .sidebar-text { font-size: 13px; color: #444; line-height: 1.5; }
  .sidebar-time { font-size: 11px; color: #bbb; margin-top: 4px; }
  .sidebar-del { cursor: pointer; color: #ccc; font-size: 11px; float: right; }
  .sidebar-del:hover { color: #f44; }

  /* ── Section Rationale ── */
  .section-rationale {
    background: #fffbe6;
    border-left: 3px solid #f5c518;
    border-radius: 0 6px 6px 0;
    padding: 10px 16px;
    margin-bottom: 24px;
    font-size: 12px;
    color: #555;
    line-height: 1.6;
    max-width: 860px;
  }
  .section-rationale strong {
    color: #111;
    font-weight: 700;
    display: block;
    margin-bottom: 3px;
    font-size: 11px;
    letter-spacing: 0.06em;
    text-transform: uppercase;
  }

  /* ── Helpers ── */
  .text-center { text-align: center; }
  .mt-8 { margin-top: 8px; }
  .mt-16 { margin-top: 16px; }
</style>
</head>
<body>

<!-- ── REVIEW BANNER ── -->
<div class="review-banner">
  <div>
    <strong>STRUCTURE REVIEW</strong> &nbsp;·&nbsp;
    ExtraaEdge Homepage Skeleton &nbsp;·&nbsp;
    Click anywhere on the page to leave a comment. Comments are saved on the server &amp; visible to the whole team.
  </div>
  <div class="banner-actions">
    <button class="btn-sm" onclick="toggleSidebar()">💬 Comments (<span id="comment-count">0</span>)</button>
    <button class="btn-sm primary" onclick="exportComments()">Export Comments</button>
  </div>
</div>

<!-- ── S0: NAVIGATION ── -->
<nav class="site-nav" data-section="S0 · Navigation">
  <div class="nav-inner">
    <div class="nav-logo">ExtraaEdge</div>
    <ul class="nav-links">
      <li>Platform ▾</li>
      <li>Products ▾</li>
      <li>Solutions ▾</li>
      <li style="color:#111;font-weight:700;">AI ▾</li>
      <li>Customers</li>
      <li>Resources ▾</li>
      <li>Pricing</li>
      <li style="color:#111;font-weight:700;">Compare</li>
    </ul>
    <div style="display:flex;gap:10px;align-items:center;">
      <span style="font-size:13px;color:#555;cursor:pointer;">Login</span>
      <button class="nav-cta">Book a Demo</button>
    </div>
  </div>
</nav>

<!-- ── S1: HERO (FIRST FOLD) ── -->
<section class="hero" data-section="S1 · Hero (First Fold)">
  <div class="container">
    <div class="section-label">S1 · Hero · First Fold</div>
    <div class="section-rationale"><strong>Rationale</strong> H1 "Qualify Every Lead. Let AI Prioritize." is taken directly from the front-side brochure, field-tested copy for the Indian market. H2 "For Faster, More Cost-Effective Admissions" speaks to the #1 buying criterion: cost per enrolment, not just speed. The desc names both ExtraaEdge (the platform) and Vidya AI (the AI layer), critical because buyers often see them as separate products. No screenshot: clean text heroes perform better on mobile and match how Meritto and Almabase open. Two CTAs, primary demo, secondary explore, for buyers at different stages of intent.</div>
    <div class="hero-centered">
      <h1>Qualify Every Lead. Let AI Prioritize.</h1>
      <p class="hero-value-prop" style="font-size:22px;font-weight:600;color:#333;margin-bottom:16px;">For Faster, More Cost-Effective Admissions</p>
      <p class="hero-value-prop" style="font-size:17px;margin-bottom:40px;">
        ExtraaEdge runs your entire admissions operation: leads, applications, communication, and analytics in one place. Vidya AI sits inside it, qualifying every enquiry in 60 seconds, scoring every lead HOT, WARM or COLD, and keeping every counsellor focused on the conversations that convert.
      </p>
      <div class="hero-ctas">
        <button class="cta-primary">Book a personalised demo</button>
        <button class="cta-secondary">Explore the Platform</button>
      </div>
    </div>
  </div>
</section>

<!-- ── S2: PROOF ROW + LOGO BAR ── -->
<section class="proof-row" data-section="S2 · Proof Row + Logo Bar">
  <div class="container">
    <div class="section-label">S2 · Proof Row · Stats + Logos</div>
    <div class="section-rationale"><strong>Rationale</strong> Stats first (500+, 10M+, 4.7/5) establish credibility before any product claim, a buyer's first instinct is "who else uses this?" Logo tabs by segment let each buyer find "institutions like mine" instantly. A vocational institute buyer needs to see Hamstech and Seamedu, not Uttaranchal University. Static logos, not a carousel, carousels get ignored because they signal the brand is hiding weak names behind animation. Four categories match the brochure back-side exactly: Universities/B-Schools, EdTech/Coaching, Vocational, Schools.</div>
    <div class="proof-stats">
      <div class="proof-stat">
        <div class="number">500+</div>
        <div class="label">Educational Institutions</div>
      </div>
      <div class="proof-stat">
        <div class="number">10M+</div>
        <div class="label">Enquiries Managed</div>
      </div>
      <div class="proof-stat">
        <div class="number">4.7 / 5</div>
        <div class="label">from 320+ Admission Teams</div>
      </div>
    </div>

    <!-- Category tabs, from brochure back side -->
    <div class="logo-category-tabs">
      <button class="logo-cat-tab active" onclick="switchLogoTab(this,'university')">Universities &amp; B-Schools</button>
      <button class="logo-cat-tab" onclick="switchLogoTab(this,'edtech')">EdTech &amp; Coaching</button>
      <button class="logo-cat-tab" onclick="switchLogoTab(this,'vocational')">Vocational</button>
      <button class="logo-cat-tab" onclick="switchLogoTab(this,'schools')">Schools</button>
    </div>

    <div id="logos-university" class="logo-group active">
      <div class="logo-placeholder">Uttaranchal Univ</div>
      <div class="logo-placeholder">MIT</div>
      <div class="logo-placeholder">FORE</div>
      <div class="logo-placeholder">JioInstitute</div>
      <div class="logo-placeholder">ASM</div>
      <div class="logo-placeholder">XISS</div>
      <div class="logo-placeholder">Ashoka Univ</div>
      <div class="logo-placeholder">Tula's</div>
      <div class="logo-placeholder">JIS University</div>
      <div class="logo-placeholder">Bharati Vidyapeeth</div>
      <div class="logo-placeholder">SRU</div>
      <div class="logo-placeholder">Mangalayatan</div>
    </div>

    <div id="logos-edtech" class="logo-group">
      <div class="logo-placeholder">Mahendra's</div>
      <div class="logo-placeholder">O2IAS Academy</div>
      <div class="logo-placeholder">AhaGuru</div>
      <div class="logo-placeholder">Yangpoo</div>
    </div>

    <div id="logos-vocational" class="logo-group">
      <div class="logo-placeholder">Hamstech</div>
      <div class="logo-placeholder">K11 Fitness</div>
      <div class="logo-placeholder">BSE</div>
      <div class="logo-placeholder">Seamedu</div>
      <div class="logo-placeholder">ILHM</div>
      <div class="logo-placeholder">INIFD Saltlake</div>
      <div class="logo-placeholder">Arch</div>
    </div>

    <div id="logos-schools" class="logo-group">
      <div class="logo-placeholder">The Premia Academy</div>
      <div class="logo-placeholder">Velammal</div>
      <div class="logo-placeholder">Sloka Intl</div>
      <div class="logo-placeholder">MIT VGS</div>
      <div class="logo-placeholder">Chrysalis High</div>
      <div class="logo-placeholder">The One School</div>
      <div class="logo-placeholder">Narayana</div>
      <div class="logo-placeholder">Jaipuria School</div>
    </div>
  </div>
</section>

<!-- ── S3: THE PROBLEM ── -->
<section data-section="S3 · The Problem">
  <div class="container">
    <div class="section-label">S3 · The Problem · 3 Pain Points</div>
    <div class="section-rationale"><strong>Rationale</strong> Problems before solutions is the standard B2B buying sequence, the buyer must feel understood before they believe the solution. "Where your enrolments are leaking" is accusatory and specific: it names a loss, not a gap. Three problems, one per key buying role: response time (counsellors feel this), manual work (admissions heads own this), late reporting (leadership is punished by this). Each problem should make the reader nod before the next section shows the fix. No before/after table, that format signals vendor arrogance. Pain points build empathy first.</div>
    <h2 class="section-heading">Where your enrolments are leaking right now</h2>
    <p class="section-subhead">Three gaps every admissions team has. ExtraaEdge closes all three.</p>
    <div class="problem-grid">
      <div class="problem-card">
        <div class="problem-icon">⏱</div>
        <h3>Enquiries wait. Students move on.</h3>
        <p>The average response time is 4-6 hours. Students who wait that long enquire with three competitors. First responder wins.</p>
      </div>
      <div class="problem-card">
        <div class="problem-icon">📋</div>
        <h3>Counsellors drown in manual work.</h3>
        <p>Spreadsheets, scattered WhatsApps, manual call logs. No prioritisation. Every lead feels equally urgent, which means none are.</p>
      </div>
      <div class="problem-card">
        <div class="problem-icon">📊</div>
        <h3>Leadership sees the funnel too late.</h3>
        <p>By the time data reaches the dashboard, the cycle is over. No live visibility into what's converting and what's leaking.</p>
      </div>
    </div>
  </div>
</section>

<!-- ── S4: SNAKE FUNNEL ── -->
<section data-section="S4 · From First Enquiry to Final Seat, AI-Assisted">
  <div class="container">
    <div class="section-label">S4 · Snake Funnel · 6 Steps · AI-Assisted</div>
    <div class="section-rationale"><strong>Rationale</strong> Buyers don't buy features, they buy workflow transformation. The snake shows their existing admissions funnel and where Vidya AI intervenes at each stage. Steps 2 (Vidya Pulse), 3 (VidyaAI Voice Agent), and 4 (VidyaGPT) have explicit product callouts because those three are the core differentiators, they make ExtraaEdge an AI platform, not just a CRM. The 90% automation bar quantifies the AI claim in one number, "90% automated" is more credible than "AI-powered." Structure sourced directly from the PitchDeck Vidya AI Ecosystem diagram (Lead Capture → Score/Segment → Follow-up → Counsel → Document → Enrol). Snake layout communicates continuity and connection, the entire funnel is one system, not six separate tools.</div>
    <h2 class="section-heading">From first enquiry to final seat, AI works every step</h2>
    <p class="section-subhead">Every stage of your funnel, connected. Vidya AI intervenes so nothing leaks and no counsellor wastes time.</p>

    <div class="snake-funnel">
      <div class="snake-row">
        <div class="snake-step">
          <div class="snake-step-num">1</div>
          <h3>Lead Capture</h3>
          <p>Every enquiry from every source, website, WhatsApp, ads, phone, walk-in, lands in one unified inbox. VidyaGPT responds instantly with programme info 24x7 so no student waits, even at midnight.</p>
          <div class="snake-ai-badge">⚡ VidyaGPT</div>
        </div>
        <div class="snake-connector">→</div>
        <div class="snake-step">
          <div class="snake-step-num">2</div>
          <h3>Score and Segment</h3>
          <p>The moment a lead arrives, Vidya Pulse predicts quality. Intent, behaviour, response pattern, every lead gets a HOT, WARM or COLD score before a counsellor lifts the phone.</p>
          <div class="snake-ai-badge">⚡ Vidya Pulse</div>
        </div>
      </div>

      <div class="snake-vertical">↓</div>

      <div class="snake-row reverse">
        <div class="snake-step">
          <div class="snake-step-num">4</div>
          <h3>Counsel and Convert</h3>
          <p>VidyaGPT answers students 24x7 on WhatsApp and web. Vidya Pulse tells the counsellor exactly who to call and why. Every conversation starts with full context and the right next action.</p>
          <div class="snake-ai-badge">⚡ VidyaGPT</div>
          <div class="snake-ai-badge" style="margin-top:6px;">⚡ Vidya Pulse</div>
        </div>
        <div class="snake-connector">←</div>
        <div class="snake-step">
          <div class="snake-step-num">3</div>
          <h3>Follow-up, Automatically</h3>
          <p>VidyaAI Voice Agent calls, messages, and follows up across channels so no lead goes cold. Every missed call gets a callback queued. No manual chasing needed.</p>
          <div class="snake-ai-badge">⚡ VidyaAI Voice Agent</div>
        </div>
      </div>

      <div class="snake-vertical left">↓</div>

      <div class="snake-row">
        <div class="snake-step">
          <div class="snake-step-num">5</div>
          <h3>Applications and Documents</h3>
          <p>Digital forms, document uploads, and verification in one place. Students complete on mobile. Vidya Pulse extracts intelligence from application data to further sharpen lead scoring.</p>
          <div class="snake-ai-badge">⚡ Vidya Pulse</div>
        </div>
        <div class="snake-connector">→</div>
        <div class="snake-step">
          <div class="snake-step-num">6</div>
          <h3>Enrol and Close</h3>
          <p>VidyaAI Voice Agent handles closure calls and follow-ups. Vidya Pulse surfaces intent signals to prioritise who needs that final nudge. Fee collection and seat confirmation complete the cycle.</p>
          <div class="snake-ai-badge">⚡ VidyaAI Voice Agent</div>
          <div class="snake-ai-badge" style="margin-top:6px;">⚡ Vidya Pulse</div>
        </div>
      </div>

      <div class="snake-automation-bar">
        <div>
          <div class="automation-stat">90% Automated</div>
          <div class="automation-label">of follow-up and engagement handled by Vidya AI</div>
        </div>
        <div class="automation-products">
          <div class="automation-product">Vidya Pulse</div>
          <div class="automation-product">VidyaAI Voice Agent</div>
          <div class="automation-product">VidyaGPT</div>
        </div>
        <div style="font-size:13px;color:#666;max-width:280px;">3 AI products. 7 agents. Working as one swarm across your entire admissions funnel.</div>
      </div>
    </div>
  </div>
</section>

<!-- ── S5: VIDYA AI SUITE ── -->
<section data-section="S5 · Vidya AI Suite">
  <div class="container">
    <div class="section-label">S5 · Vidya AI Suite · 3 Product Cards</div>
    <div class="section-rationale"><strong>Rationale</strong> After the funnel shows how AI works across the journey, buyers need to understand what the three products actually are, named, distinct, and job-specific. One card per product, one outcome sentence each. No feature lists: buyers at this stage want to know the job the product does, not the spec. "Not retrofitted. Not generic." is a direct counter-positioning against LeadSquared, which added AI as a layer on top of a generalist CRM, and against Meritto's Mio AI which launched after ExtraaEdge already had VidyaGPT and Vidya Pulse in market. Each card links to the dedicated product page for buyers who want to go deeper.</div>
    <h2 class="section-heading">Your counsellors focus on closing. Vidya AI handles the rest.</h2>
    <p class="section-subhead">One core platform. Three AI products built specifically for admissions. Not retrofitted. Not generic.</p>

    <!-- Core Platform card — full width -->
    <div style="border:2px solid #111;border-radius:12px;padding:32px 36px;margin-top:48px;margin-bottom:24px;background:#fff;">
      <div style="font-size:10px;font-weight:700;letter-spacing:0.14em;color:#888;text-transform:uppercase;margin-bottom:10px;">Core Platform</div>
      <h3 style="font-size:22px;font-weight:800;margin-bottom:8px;">ExtraaEdge</h3>
      <p style="font-size:15px;font-weight:600;color:#333;margin-bottom:8px;">Core Intelligent Growth Admission CRM Platform</p>
      <p style="font-size:14px;color:#666;line-height:1.6;max-width:700px;">Leads, applications, communication, automation, analytics, and instalment management, unified in one configurable platform built for Indian admissions teams. Every module connects. Every workflow flows.</p>
      <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:16px;">
        <span style="font-size:11px;font-weight:600;background:#f0f0f0;border-radius:20px;padding:4px 12px;">CRM and Lead Management</span>
        <span style="font-size:11px;font-weight:600;background:#f0f0f0;border-radius:20px;padding:4px 12px;">Application Management</span>
        <span style="font-size:11px;font-weight:600;background:#f0f0f0;border-radius:20px;padding:4px 12px;">Communication Suite</span>
        <span style="font-size:11px;font-weight:600;background:#f0f0f0;border-radius:20px;padding:4px 12px;">Workflow Automation</span>
        <span style="font-size:11px;font-weight:600;background:#f0f0f0;border-radius:20px;padding:4px 12px;">Analytics</span>
        <span style="font-size:11px;font-weight:600;background:#f0f0f0;border-radius:20px;padding:4px 12px;">Instalment Management</span>
      </div>
    </div>

    <!-- AI Layer label -->
    <div style="text-align:center;margin:8px 0 16px;font-size:11px;font-weight:700;letter-spacing:0.1em;color:#888;text-transform:uppercase;">Vidya AI Layer · Powering every step of the funnel</div>

    <!-- 3 AI product cards — uniform -->
    <div class="vidya-grid">
      <div class="vidya-card">
        <div class="vidya-tag">Conversational AI</div>
        <h3>VidyaGPT</h3>
        <p>24x7 AI counsellor on website and WhatsApp. Responds to students instantly, qualifies intent, and hands off to the right counsellor in 95+ languages.</p>
        <a>Learn more about VidyaGPT</a>
      </div>
      <div class="vidya-card">
        <div class="vidya-tag">Lead Intelligence</div>
        <h3>Vidya Pulse</h3>
        <p>AI scores every lead HOT, WARM or COLD based on real behaviour: response time, message depth, application data. Counsellors call the right leads first, every time.</p>
        <a>Learn more about Vidya Pulse</a>
      </div>
      <div class="vidya-card">
        <div class="vidya-tag">Voice and Call AI</div>
        <h3>VidyaAI Voice Agent</h3>
        <p>AI-powered voice calls, call analysis, and automated follow-ups. Every call is scored. Every missed follow-up is caught. Counsellor performance improves without micromanagement.</p>
        <a>Learn more about VidyaAI Voice Agent</a>
      </div>
    </div>
  </div>
</section>

<!-- ── S5b: EXPLORE EXTRAAEDGE, 9 CAPABILITY BLOCKS ── -->
<section data-section="S5b · Everything your admissions team needs, in one platform">
  <div class="container">
    <div class="section-label">S5b · Capability Grid · 9 Blocks</div>
    <div class="section-rationale"><strong>Rationale</strong> "Is this a point solution or a full platform?", this is the question every Indian buyer asks before engaging sales. Nine blocks answers it: full platform. Breadth reassures the risk-averse buyer who is committing their entire admissions operation to one vendor. Each block links to its own product page, so exploration stays on site rather than bouncing to a competitor. The 9 modules match the brochure front-side ecosystem diagram exactly: CRM, Application, Communication, Automation, Analytics, Instalments, VidyaGPT, Vidya Pulse, VidyaAI Voice Agent. Pattern inspired by Almabase's "Explore programs" section, the highest-engagement section on their homepage by scroll depth.</div>
    <h2 class="section-heading">Everything your admissions team needs, in one platform</h2>
    <p class="section-subhead">Nine connected capabilities. Use what you need. Everything talks to everything else.</p>
    <div class="capability-grid">
      <div class="capability-card">
        <div class="capability-icon">📥</div>
        <h4>CRM and Lead Management</h4>
        <p>Every enquiry in one place. No lead lost, no follow-up missed.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">📝</div>
        <h4>Application Management</h4>
        <p>Digital forms, documents, verification. Students apply on mobile in minutes.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">💬</div>
        <h4>Communication Suite</h4>
        <p>WhatsApp, email, SMS, and calls from one inbox. Every channel, one thread.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">⚙️</div>
        <h4>Workflow Automation</h4>
        <p>Triggers, assignments, and sequences that run while your team sleeps.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">📊</div>
        <h4>Analytics and Reporting</h4>
        <p>Live funnel. Source ROI. Team performance. No end-of-month wait.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">💰</div>
        <h4>Instalment Management</h4>
        <p>Fee schedules, payment links, and reconciliation, inside ExtraaEdge.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">🤖</div>
        <h4>VidyaGPT</h4>
        <p>24×7 AI that responds, qualifies, and guides students before a counsellor calls.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">⚡</div>
        <h4>Vidya Pulse</h4>
        <p>AI that scores every lead HOT, WARM or COLD so your team calls in the right order.</p>
        <a class="cap-link">Explore →</a>
      </div>
      <div class="capability-card">
        <div class="capability-icon">📞</div>
        <h4>VidyaAI Voice Agent</h4>
        <p>Call intelligence, AI follow-ups, and performance coaching for every counsellor.</p>
        <a class="cap-link">Explore →</a>
      </div>
    </div>
  </div>
</section>

<!-- ── S5c: SECTORS WE SERVE ── -->
<section data-section="S5c · Built for every type of education institution">
  <div class="container">
    <div class="section-label">S5c · Sectors We Serve · 5 Segments</div>
    <div class="section-rationale"><strong>Rationale</strong> "Is this built for institutions like mine?" is the question that determines whether a buyer requests a demo or leaves. Sector cards answer it in one scan. Each card will become a full industry page, delivering both a tailored buying journey and SEO value for high-intent searches like "school admission CRM India," "edtech enrollment software," and "vocational institute CRM." Five segments match the back-side brochure groupings: Universities/B-Schools, EdTech/Coaching, Vocational, K-12 Schools, Study Abroad. Copy in each card speaks to that sector's specific admissions reality, not generic SaaS language. Pattern inspired by Meritto's vertical pages, which are their highest-ranking organic pages.</div>
    <h2 class="section-heading">Built for every type of education institution</h2>
    <p class="section-subhead">Same platform. Configured for how your sector actually runs admissions.</p>
    <div class="sectors-grid">
      <div class="sector-card">
        <div class="sector-icon">🎓</div>
        <h4>Universities and B-Schools</h4>
        <p>Multi-campus, multi-programme, high volume. ExtraaEdge scales with your intake.</p>
        <a class="sector-link">How it works for universities →</a>
      </div>
      <div class="sector-card">
        <div class="sector-icon">💻</div>
        <h4>EdTech and Coaching</h4>
        <p>Fast cycles, high competition, digital-first students. Convert before your competitors do.</p>
        <a class="sector-link">How it works for EdTech →</a>
      </div>
      <div class="sector-card">
        <div class="sector-icon">🔧</div>
        <h4>Vocational Institutes</h4>
        <p>Practical programmes, diverse student profiles. Fill every seat, every intake.</p>
        <a class="sector-link">How it works for vocational →</a>
      </div>
      <div class="sector-card">
        <div class="sector-icon">🏫</div>
        <h4>K-12 Schools</h4>
        <p>Parent-facing, relationship-driven, reputation-critical. Admissions done with care.</p>
        <a class="sector-link">How it works for schools →</a>
      </div>
      <div class="sector-card">
        <div class="sector-icon">✈️</div>
        <h4>Study Abroad</h4>
        <p>Long sales cycles, multiple destinations, high-intent students. Close with confidence.</p>
        <a class="sector-link">How it works for study abroad →</a>
      </div>
    </div>
  </div>
</section>

<!-- ── S6: LIVE DEMO ── -->
<section data-section="S6 · Live Platform Demo">
  <div class="container">
    <div class="section-label">S6 · Live Demo · No Signup</div>
    <div class="section-rationale"><strong>Rationale</strong> The interactive demo is the highest-intent action on the page short of booking a call. Placed mid-page, after the AI story lands but before social proof, it captures buyers who are convinced on concept and want to see the product before committing to a 45-minute demo call. No surrounding copy: additional text competes with the product for attention. The heading "Watch your admissions process, transformed. No signup." removes the two biggest demo barriers: time commitment and data privacy. If the buyer sees their workflow inside the product, conversion to demo jumps significantly.</div>
    <h2 class="section-heading text-center">Watch your admissions process, transformed. No signup.</h2>
    <div class="demo-box">
      <div class="demo-label">Interactive Demo Embed</div>
      <div class="demo-desc">
        Live product walkthrough widget goes here.<br>
        Module tabs: Leads · WhatsApp · VidyaGPT · Vidya Pulse · Dashboards<br>
        <br>
        Explore in under 2 minutes.
      </div>
    </div>
  </div>
</section>

<!-- ── S7: OUTCOMES BY ROLE ── -->
<section data-section="S7 · Outcomes by Role">
  <div class="container">
    <div class="section-label">S7 · Outcomes by Role · 5 Tabs</div>
    <div class="section-rationale"><strong>Rationale</strong> The buying committee for a university purchase includes at least 5 decision points: counsellors decide on adoption, admissions heads own conversion outcomes, marketing owns attribution, leadership signs the cheque, IT/admin approves security and configuration. This section speaks to each in one place, no one feels forgotten. Expanded from 3 to 5 tabs per the Blueprint spec (added Marketing and IT/Admin). "Built for the way your team actually works" as the heading signals empathy over feature-listing. Each tab leads with one stat, then 4 concrete outcomes, the stat gives the head, the list gives the heart. Selectable tabs mean each role finds their view without scrolling through irrelevant content.</div>
    <h2 class="section-heading">Built for the way your team actually works</h2>
    <p class="section-subhead">Every role sees exactly what they need. Nothing more, nothing less.</p>

    <div class="role-tabs">
      <div class="role-tab active" onclick="switchTab(this, 'counsellors')">Counsellor</div>
      <div class="role-tab" onclick="switchTab(this, 'heads')">Admissions Head</div>
      <div class="role-tab" onclick="switchTab(this, 'marketing')">Marketing</div>
      <div class="role-tab" onclick="switchTab(this, 'leadership')">Leadership</div>
      <div class="role-tab" onclick="switchTab(this, 'itadmin')">IT / Admin</div>
    </div>

    <div id="tab-counsellors" class="role-content">
      <div>
        <div class="role-stat">95%</div>
        <div class="role-stat-label">adoption rate across teams</div>
      </div>
      <ul class="role-benefits">
        <li>Today's priorities: ranked call list, highest intent leads at the top</li>
        <li>Complete context: every interaction, message, and form in one place</li>
        <li>AI-drafted replies, personalised messages in one click</li>
        <li>Next best action suggested automatically after every call</li>
      </ul>
    </div>

    <div id="tab-heads" class="role-content" style="display:none;">
      <div>
        <div class="role-stat">40%</div>
        <div class="role-stat-label">more conversions on average</div>
      </div>
      <ul class="role-benefits">
        <li>Funnel health at a glance: who's converting, who's stuck, where to intervene, who's stuck, where to intervene</li>
        <li>Team performance: calls made, follow-ups done, stage progression per counsellor</li>
        <li>Bottleneck alerts before they become a problem</li>
        <li>Bulk re-engagement tools for dormant or slow-moving leads</li>
      </ul>
    </div>

    <div id="tab-marketing" class="role-content" style="display:none;">
      <div>
        <div class="role-stat">Source</div>
        <div class="role-stat-label">to enrolment attribution, live</div>
      </div>
      <ul class="role-benefits">
        <li>Campaign ROI by source, channel, and spend, not just lead volume</li>
        <li>Cost-per-enrolment (not cost-per-lead) for every campaign</li>
        <li>Offline attribution: events, referrals, and walk-ins mapped to the funnel</li>
        <li>Instant feedback loop: know which creative or campaign converts within days</li>
      </ul>
    </div>

    <div id="tab-leadership" class="role-content" style="display:none;">
      <div>
        <div class="role-stat">Live</div>
        <div class="role-stat-label">funnel visibility, always</div>
      </div>
      <ul class="role-benefits">
        <li>Full funnel from enquiry to enrolment, updated in real time</li>
        <li>Targets, forecast, and revenue. One view, no spreadsheet compilation.</li>
        <li>Exception reporting: what's off-track and who owns it</li>
        <li>Board-ready reporting without waiting for end-of-month data pulls</li>
      </ul>
    </div>

    <div id="tab-itadmin" class="role-content" style="display:none;">
      <div>
        <div class="role-stat">No-code</div>
        <div class="role-stat-label">configuration, no dev dependency</div>
      </div>
      <ul class="role-benefits">
        <li>Configuration without code: fields, stages, workflows, and forms in-admin</li>
        <li>Governance: roles, permissions, audit logs, and data access controls</li>
        <li>50+ integrations: ERP, payment, WhatsApp, ad platforms, and more</li>
        <li>SSO, IP whitelisting, and ISO 27001-aligned security controls</li>
      </ul>
    </div>
  </div>
</section>

<!-- ── S8: PROOF, VIDEO CAROUSEL by OUTCOME ── -->
<section data-section="S8 · Outcome Proof (Video Carousel)">
  <div class="container">
    <div class="section-label">S8 · Outcome Proof · Video Carousel by Category</div>
    <div class="section-rationale"><strong>Rationale</strong> Video testimonials are the highest-trust proof format for Indian education buyers, peer validation from named institutions carries more weight than any vendor claim or written quote. Five outcome categories let buyers self-select the proof most relevant to their buying criterion: a counsellor head clicks "Counselor Productivity," a VP clicks "Decision Analytics." This makes every video feel relevant, not generic. "500+ institutions grew their enrolments here" as the heading makes the proof the hero, not the format. Outcome categories: Enrollment Conversion, Engagement Uplift, Counselor Productivity, World Class Admission Success, Decision Analytics and Simplicity, these map directly to the five ROI dimensions a buyer evaluates.</div>
    <h2 class="section-heading">500+ institutions grew their enrolments here</h2>
    <p class="section-subhead">Filter by the outcome that matters most to your team.</p>

    <!-- Outcome filter tabs -->
    <div class="outcome-filter-tabs">
      <button class="outcome-filter-tab active" onclick="switchOutcomeTab(this,'enrolment')">Enrollment Conversion</button>
      <button class="outcome-filter-tab" onclick="switchOutcomeTab(this,'engagement')">Engagement Uplift</button>
      <button class="outcome-filter-tab" onclick="switchOutcomeTab(this,'counsellor')">Counselor Productivity</button>
      <button class="outcome-filter-tab" onclick="switchOutcomeTab(this,'success')">World Class Admission Success</button>
      <button class="outcome-filter-tab" onclick="switchOutcomeTab(this,'analytics')">Decision Analytics & Simplicity</button>
    </div>

    <!-- Enrollment Conversion videos -->
    <div id="outcome-enrolment" class="video-carousel">
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Enrollment Conversion</div>
          <div class="video-institution">Annapurna University</div>
          <div class="video-metric">2× enrolment growth</div>
          <div class="video-quote">"We doubled our enrolments in one cycle without adding headcount. VidyaGPT handled the first response every time."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Enrollment Conversion</div>
          <div class="video-institution">Rai University</div>
          <div class="video-metric">+38% conversion rate</div>
          <div class="video-quote">"Vidya Pulse changed how our team works. Every counsellor knows exactly who to call and why."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Enrollment Conversion</div>
          <div class="video-institution">Symbiosis International</div>
          <div class="video-metric">+2,400 applications</div>
          <div class="video-quote">"The funnel went from opaque to completely transparent. We know where every student is at any moment."</div>
        </div>
      </div>
    </div>

    <!-- Engagement Uplift videos -->
    <div id="outcome-engagement" class="video-carousel" style="display:none;">
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Engagement Uplift</div>
          <div class="video-institution">Uttaranchal University</div>
          <div class="video-metric">90% faster response</div>
          <div class="video-quote">"Students now get a response in under 60 seconds, 24 hours a day. Engagement scores went up immediately."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Engagement Uplift</div>
          <div class="video-institution">IIMT Group of Colleges</div>
          <div class="video-metric">4× WhatsApp engagement</div>
          <div class="video-quote">"VidyaGPT on WhatsApp was the single biggest change. Students respond to it. They ignored our emails."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Engagement Uplift</div>
          <div class="video-institution">Amity University Online</div>
          <div class="video-metric">65% open rate</div>
          <div class="video-quote">"Our automated follow-up sequences now feel personal. The AI personalises every message to the student's interest."</div>
        </div>
      </div>
    </div>

    <!-- Counselor Productivity videos -->
    <div id="outcome-counsellor" class="video-carousel" style="display:none;">
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Counselor Productivity</div>
          <div class="video-institution">Rai University</div>
          <div class="video-metric">50% efficiency gain</div>
          <div class="video-quote">"Same team, half the manual work. VidyaAI Voice Agent logs every call and suggests the follow-up. The counsellors love it."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Counselor Productivity</div>
          <div class="video-institution">GLS University</div>
          <div class="video-metric">3× calls per day</div>
          <div class="video-quote">"Counsellors went from 20 to 60 meaningful conversations per day. The AI handles everything else."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Counselor Productivity</div>
          <div class="video-institution">Sharda University</div>
          <div class="video-metric">95% adoption in 7 days</div>
          <div class="video-quote">"Our team was hesitant about any new system. ExtraaEdge was the first tool they actually used from day one."</div>
        </div>
      </div>
    </div>

    <!-- World Class Admission Success videos -->
    <div id="outcome-success" class="video-carousel" style="display:none;">
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">World Class Admission Success</div>
          <div class="video-institution">Manipal Global</div>
          <div class="video-metric">7-day go-live</div>
          <div class="video-quote">"We went live in a week. The success team held our hand through every step and knew exactly what admissions teams need."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">World Class Admission Success</div>
          <div class="video-institution">Chandigarh University</div>
          <div class="video-metric">Zero downtime during peak</div>
          <div class="video-quote">"Our admission peak is 3 months of chaos. ExtraaEdge never blinked. Neither did their support team."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">World Class Admission Success</div>
          <div class="video-institution">MIT-WPU Pune</div>
          <div class="video-metric">Named success manager</div>
          <div class="video-quote">"Every other vendor gave us a ticket number. ExtraaEdge gave us Priya. She knows our admission cycle by heart."</div>
        </div>
      </div>
    </div>

    <!-- Decision Analytics & Simplicity videos -->
    <div id="outcome-analytics" class="video-carousel" style="display:none;">
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Decision Analytics & Simplicity</div>
          <div class="video-institution">Lovely Professional University</div>
          <div class="video-metric">Live dashboards</div>
          <div class="video-quote">"Our VP used to wait for Monday reports. Now she checks the dashboard at 9am and knows exactly where we stand."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Decision Analytics & Simplicity</div>
          <div class="video-institution">Poornima University</div>
          <div class="video-metric">No-code configuration</div>
          <div class="video-quote">"We changed our entire lead qualification workflow without raising a single IT ticket. Admin did it in an afternoon."</div>
        </div>
      </div>
      <div class="video-card">
        <div class="video-thumb"><div class="video-play">▶</div></div>
        <div class="video-card-body">
          <div class="video-outcome-tag">Decision Analytics & Simplicity</div>
          <div class="video-institution">MRIIRS University</div>
          <div class="video-metric">Source-to-seat ROI</div>
          <div class="video-quote">"For the first time, I could tell the marketing team which campaigns actually drove enrolments, not just leads."</div>
        </div>
      </div>
    </div>

    <div class="case-cta"><a>View all customer stories →</a></div>
  </div>
</section>

<!-- ── S9: ENTERPRISE READINESS ── -->
<section data-section="S9 · Enterprise Readiness">
  <div class="container">
    <div class="section-label">S9 · Enterprise Readiness · 4 Trust Signals</div>
    <div class="section-rationale"><strong>Rationale</strong> Four blocks address the four most common late-stage objections in order of frequency: integration complexity (50+ integrations: "will it connect to our existing systems?"), data security (ISO 27001: "is student data safe?"), implementation timeline (7 days: "how long before we're live?"), and ongoing support (named success manager: "what happens after we sign?"). Compact one-row format keeps this as baseline assurance, not a separate sales pitch, buyers at this point have already decided in principle. "Go live in 7 days. Stay secure. Never hit a ceiling." as the heading pre-answers all three objections in one line. Avoid expanding this section, it should feel like a footnote of confidence, not a feature grid.</div>
    <h2 class="section-heading text-center">Go live in 7 days. Stay secure. Never hit a ceiling.</h2>
    <div class="enterprise-row">
      <div class="enterprise-item">
        <div class="enterprise-icon">🔗</div>
        <h4>50+ Integrations</h4>
        <p>ERP systems, payment gateways, ad platforms, WhatsApp Business, and more.</p>
      </div>
      <div class="enterprise-item">
        <div class="enterprise-icon">🔒</div>
        <h4>ISO 27001 + GDPR</h4>
        <p>Enterprise-grade data security. Certified. Student data stays protected.</p>
      </div>
      <div class="enterprise-item">
        <div class="enterprise-icon">🚀</div>
        <h4>7 Days to Go Live</h4>
        <p>Onboarding, configuration, and training. Up and running in one week.</p>
      </div>
      <div class="enterprise-item">
        <div class="enterprise-icon">👥</div>
        <h4>Dedicated Success Team</h4>
        <p>A named success manager for every account. Not a ticket queue.</p>
      </div>
    </div>
  </div>
</section>

<!-- ── S10: FINAL CTA + FAQ ── -->
<section data-section="S10 · Final CTA + FAQ">
  <div class="container">
    <div class="section-label">S10 · Final CTA + FAQ</div>
    <div class="section-rationale"><strong>Rationale</strong> "Bring us one admission workflow. We'll show you a simpler way." is the lowest-friction CTA on the page, it's not "buy now" or even "book a demo," it's an invitation with zero commitment implied. This reduces anxiety for buyers who've been evaluating for weeks and aren't sure they're ready. Five FAQs address the most common pre-sales objections in the order they typically arise: what is it (category clarity), go-live time (speed anxiety), integrations (technical objection), data security (compliance concern), and how it differs from Meritto/LeadSquared (competitive evaluation). Q5 explicitly naming Meritto and LeadSquared is deliberate, buyers in evaluation mode are comparing us right now, and we should own that conversation rather than avoid it.</div>
    <div class="final-cta">
      <h2>Bring us one admission workflow. We'll show you a simpler way.</h2>
      <button class="cta-primary">Book a personalised demo</button>
    </div>
    <div class="faq-list">
      <div class="faq-item" onclick="toggleFaq(this)">
        <div class="faq-q">What is ExtraaEdge?</div>
        <div class="faq-a">ExtraaEdge is the Intelligent Admissions Growth Platform, purpose-built for education. It combines AI-powered engagement (VidyaGPT), intent-based lead prioritisation (Vidya Pulse), and call intelligence (VidyaAI Voice Agent) with a full-featured admissions CRM. Not a generic sales tool. Built for counsellors, admission heads, and institutional leadership.</div>
      </div>
      <div class="faq-item" onclick="toggleFaq(this)">
        <div class="faq-q">How fast can we go live?</div>
        <div class="faq-a">7 days for a new deployment. 14 days if you're migrating from another platform. Your dedicated success manager handles the full setup. You focus on admissions, not implementation.</div>
      </div>
      <div class="faq-item" onclick="toggleFaq(this)">
        <div class="faq-q">What integrations do you support?</div>
        <div class="faq-a">50+ integrations including ERP systems (Oracle, SAP, Banner), payment gateways, WhatsApp Business API, Google Ads, Facebook Ads, Sulekha, JustDial, and all major enquiry sources. Full list available on the integrations page.</div>
      </div>
      <div class="faq-item" onclick="toggleFaq(this)">
        <div class="faq-q">How is student data kept secure?</div>
        <div class="faq-a">ExtraaEdge is ISO 27001 certified and GDPR compliant. Data is hosted on Indian servers with enterprise-grade encryption at rest and in transit. We undergo regular third-party security audits.</div>
      </div>
      <div class="faq-item" onclick="toggleFaq(this)">
        <div class="faq-q">How is ExtraaEdge different from Meritto or LeadSquared?</div>
        <div class="faq-a">Meritto is built for process compliance. LeadSquared is a generalist sales CRM. ExtraaEdge is built for admissions growth: AI-first, education-specific, with VidyaGPT responding to students before a counsellor picks up the phone. We don't manage data. We drive enrolments.</div>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
<footer class="site-footer" data-section="Footer">
  <div class="container">
    <div class="section-label">Footer · Standard Links + Contact</div>
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="footer-logo">ExtraaEdge</div>
        <p>The Intelligent Admissions Growth Platform. Built for education, driven by AI simplicity.</p>
      </div>
      <div class="footer-col">
        <h5>Platform</h5>
        <ul>
          <li>Lead Management</li>
          <li>Application Management</li>
          <li>Communication</li>
          <li>Automation</li>
          <li>Analytics</li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Vidya AI</h5>
        <ul>
          <li>VidyaGPT</li>
          <li>Vidya Pulse</li>
          <li>VidyaAI Voice Agent</li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Solutions</h5>
        <ul>
          <li>Universities</li>
          <li>Coaching & EdTech</li>
          <li>K-12 Schools</li>
          <li>Study Abroad</li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Company</h5>
        <ul>
          <li>About</li>
          <li>Customers</li>
          <li>Pricing</li>
          <li>Careers</li>
          <li>Contact</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">© 2026 ExtraaEdge Technologies Pvt. Ltd. · Privacy Policy · Terms of Service</div>
  </div>
</footer>

<!-- ── COMMENT POPUP ── -->
<div class="comment-popup" id="comment-popup">
  <h4>Leave a comment</h4>
  <input type="text" id="comment-name" placeholder="Your name (Abhi / Charu / Sushil / Makaranda)" />
  <textarea id="comment-text" placeholder="What do you think about this section? What to change, add, or remove?"></textarea>
  <div class="popup-actions">
    <button class="popup-save" onclick="saveComment()">Save comment</button>
    <button class="popup-cancel" onclick="cancelComment()">Cancel</button>
  </div>
</div>

<!-- ── COMMENT SIDEBAR ── -->
<div class="comment-sidebar" id="comment-sidebar">
  <div class="sidebar-header">
    <h3>Comments (<span id="sidebar-count">0</span>)</h3>
    <span class="sidebar-close" onclick="toggleSidebar()">✕</span>
  </div>
  <div id="sidebar-list">
    <div class="sidebar-empty">No comments yet. Click anywhere on the page to leave one.</div>
  </div>
</div>

<script>
  // ── Shared comment state (server-backed) ──
  const API = location.pathname + location.search + (location.search ? '&' : '?') + 'api=';
  let comments = [];
  let pendingSection = '', pendingXr = 0.5, pendingYr = 0.5;

  // remember the reviewer's name on this device
  document.getElementById('comment-name').value = localStorage.getItem('ee_sk_name') || '';

  function esc(s) { const d = document.createElement('div'); d.textContent = s == null ? '' : String(s); return d.innerHTML; }
  function fmtTime(ts) {
    try { return new Date(ts * 1000).toLocaleString('en-IN', { day: '2-digit', month: 'short', hour: '2-digit', minute: '2-digit' }); }
    catch (e) { return ''; }
  }

  // ── Click on the page -> open the comment popup ──
  document.body.addEventListener('click', function (e) {
    if (e.target.closest('.review-banner, nav, button, .comment-popup, .comment-sidebar, .comment-pin, .faq-item, .role-tab'))
      return;

    const sec = e.target.closest('[data-section]');
    pendingSection = sec ? sec.getAttribute('data-section') : 'General';
    if (sec) {
      const r = sec.getBoundingClientRect();
      pendingXr = Math.max(0, Math.min(1, (e.clientX - r.left) / r.width));
      pendingYr = Math.max(0, Math.min(1, (e.clientY - r.top) / r.height));
    } else { pendingXr = 0.5; pendingYr = 0.5; }

    const popup = document.getElementById('comment-popup');
    popup.style.display = 'block';
    let top = e.clientY - 10, left = e.clientX + 16;
    if (left + 310 > window.innerWidth) left = e.clientX - 326;
    if (top + 220 > window.innerHeight) top = window.innerHeight - 230;
    popup.style.top = top + 'px';
    popup.style.left = left + 'px';
    const nameEl = document.getElementById('comment-name');
    (nameEl.value ? document.getElementById('comment-text') : nameEl).focus();
  });

  async function loadComments() {
    try {
      const r = await fetch(API + 'list', { cache: 'no-store' });
      const j = await r.json();
      if (j && j.ok) { comments = j.comments; renderAll(); }
    } catch (e) { /* offline blip: keep showing what we have */ }
  }

  async function saveComment() {
    const nameEl = document.getElementById('comment-name');
    const name = nameEl.value.trim();
    const text = document.getElementById('comment-text').value.trim();
    if (!text) { alert('Please enter a comment.'); return; }
    localStorage.setItem('ee_sk_name', name);

    const btn = document.querySelector('.popup-save');
    btn.disabled = true; btn.textContent = 'Saving…';
    try {
      const fd = new FormData();
      fd.append('name', name); fd.append('text', text);
      fd.append('section', pendingSection);
      fd.append('xr', pendingXr); fd.append('yr', pendingYr);
      const r = await fetch(API + 'add', { method: 'POST', body: fd });
      const j = await r.json();
      if (j && j.ok) { comments = j.comments; renderAll(); cancelComment(); }
      else alert('Could not save the comment. Please try again.');
    } catch (e) {
      alert('Could not reach the server. Please check your connection and try again.');
    }
    btn.disabled = false; btn.textContent = 'Save comment';
  }

  function cancelComment() {
    document.getElementById('comment-popup').style.display = 'none';
    document.getElementById('comment-text').value = '';
  }

  async function deleteComment(id) {
    if (!confirm('Delete this comment for everyone?')) return;
    const fd = new FormData(); fd.append('id', id);
    try {
      const r = await fetch(API + 'del', { method: 'POST', body: fd });
      const j = await r.json();
      if (j && j.ok) { comments = j.comments; renderAll(); }
    } catch (e) { alert('Could not reach the server.'); }
  }

  // ── Rendering: pins live INSIDE their section (percent coords), so they
  //    appear in the right place on every screen size ──
  function renderAll() {
    document.querySelectorAll('.comment-pin').forEach(p => p.remove());
    comments.forEach((c, i) => {
      const sec = document.querySelector('[data-section="' + (window.CSS && CSS.escape ? CSS.escape(c.section) : c.section) + '"]');
      if (!sec) return;               // "General" comments appear in the sidebar only
      const pin = document.createElement('div');
      pin.className = 'comment-pin';
      pin.id = 'pin-' + c.id;
      pin.textContent = i + 1;
      pin.title = c.name + ': ' + c.text;
      pin.style.left = (c.xr * 100) + '%';
      pin.style.top = (c.yr * 100) + '%';
      pin.onclick = (e) => {
        e.stopPropagation();
        if (!document.getElementById('comment-sidebar').classList.contains('open')) toggleSidebar();
        setTimeout(() => {
          const el = document.getElementById('sidebar-c-' + c.id);
          if (el) el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 200);
      };
      sec.appendChild(pin);
    });
    renderSidebar();
  }

  function renderSidebar() {
    const list = document.getElementById('sidebar-list');
    const count = comments.length;
    document.getElementById('comment-count').textContent = count;
    document.getElementById('sidebar-count').textContent = count;

    if (count === 0) {
      list.innerHTML = '<div class="sidebar-empty">No comments yet. Click anywhere on the page to leave one.</div>';
      return;
    }
    list.innerHTML = comments.map((c, i) => `
      <div class="sidebar-comment" id="sidebar-c-${esc(c.id)}">
        <div class="sidebar-comment-header">
          <div class="sidebar-pin-num">${i + 1}</div>
          <span class="sidebar-name">${esc(c.name)}</span>
          <span class="sidebar-section">${esc(String(c.section).replace(/ · .*/, ''))}</span>
          <span class="sidebar-del" onclick="deleteComment('${esc(c.id)}')">✕</span>
        </div>
        <div class="sidebar-text">${esc(c.text)}</div>
        <div class="sidebar-time">${esc(c.section)} · ${esc(fmtTime(c.ts))}</div>
      </div>
    `).join('');
  }

  function toggleSidebar() {
    document.getElementById('comment-sidebar').classList.toggle('open');
  }

  function exportComments() {
    if (comments.length === 0) { alert('No comments to export yet.'); return; }
    const lines = [
      'ExtraaEdge Homepage Skeleton: Comments Export',
      'Generated: ' + new Date().toLocaleString(),
      '-'.repeat(60),
      '',
      ...comments.map((c, i) =>
        `[${i + 1}] ${c.name}\nSection: ${c.section}\nTime: ${fmtTime(c.ts)}\nComment: ${c.text}\n`)
    ];
    const blob = new Blob([lines.join('\n')], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'ExtraaEdge_Homepage_Comments_' + new Date().toISOString().slice(0, 10) + '.txt';
    a.click();
    URL.revokeObjectURL(url);
  }

  // ── Role tab switcher ──
  function switchTab(el, tabId) {
    document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    document.querySelectorAll('.role-content').forEach(c => c.style.display = 'none');
    document.getElementById('tab-' + tabId).style.display = 'grid';
  }

  // ── Logo category tab switcher ──
  function switchLogoTab(el, groupId) {
    document.querySelectorAll('.logo-cat-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    document.querySelectorAll('.logo-group').forEach(g => g.classList.remove('active'));
    document.getElementById('logos-' + groupId).classList.add('active');
  }

  // ── Outcome filter tab switcher ──
  function switchOutcomeTab(el, outcomeId) {
    document.querySelectorAll('.outcome-filter-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    document.querySelectorAll('.video-carousel').forEach(c => c.style.display = 'none');
    document.getElementById('outcome-' + outcomeId).style.display = 'grid';
  }

  // ── FAQ toggle ──
  function toggleFaq(el) { el.classList.toggle('open'); }

  // ── Init: load everyone's comments, then keep them fresh ──
  loadComments();
  setInterval(loadComments, 15000);   // new comments from teammates appear within 15s

  document.addEventListener('keydown', e => { if (e.key === 'Escape') cancelComment(); });
</script>
</body>
</html>
