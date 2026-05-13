<?php
/**
 * header.php — ExtraaEdge SEO-optimized header
 * Handles: doctype, lang, all meta, canonical, OG/Twitter, hreflang, geo,
 * preconnect/preload, static nav, breadcrumb, <main> opening.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
$is_singular   = is_singular();
$post_id       = $is_singular ? $post->ID : 0;

$site_name     = 'ExtraaEdge';
$site_url      = 'https://www.extraaedge.com';
$default_img   = $site_url . '/wp-content/uploads/og/extraaedge-default-og.png';

$seo_title     = $is_singular ? ( get_post_meta( $post_id, '_seo_title', true ) ?: get_the_title( $post_id ) . ' | ' . $site_name ) : wp_get_document_title();
$seo_desc      = $is_singular ? ( get_post_meta( $post_id, '_seo_description', true ) ?: wp_trim_words( wp_strip_all_tags( $post->post_content ), 28 ) ) : get_bloginfo( 'description' );
$canonical     = $is_singular ? get_permalink( $post_id ) : home_url( add_query_arg( null, null ) );
$og_image      = $is_singular ? ( get_the_post_thumbnail_url( $post_id, 'full' ) ?: $default_img ) : $default_img;
$published     = $is_singular ? get_the_date( 'c', $post_id ) : '';
$modified      = $is_singular ? get_the_modified_date( 'c', $post_id ) : '';

$seo_title     = esc_attr( $seo_title );
$seo_desc      = esc_attr( $seo_desc );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns# product: https://ogp.me/ns/product#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

<title><?php echo $seo_title; ?></title>
<meta name="description" content="<?php echo $seo_desc; ?>">
<meta name="author" content="<?php echo esc_attr( $site_name ); ?>">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">
<meta name="referrer" content="strict-origin-when-cross-origin">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#DE6E30" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#19335D" media="(prefers-color-scheme: dark)">
<meta name="color-scheme" content="light dark">
<meta name="application-name" content="<?php echo esc_attr( $site_name ); ?>">

<!-- GEO / LOCAL SIGNALS -->
<meta name="geo.region" content="IN-MH">
<meta name="geo.placename" content="Pune">
<meta name="geo.position" content="18.5204;73.8567">
<meta name="ICBM" content="18.5204, 73.8567">

<!-- CANONICAL + HREFLANG -->
<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
<link rel="alternate" hreflang="en-in" href="<?php echo esc_url( $canonical ); ?>">
<link rel="alternate" hreflang="en" href="<?php echo esc_url( $canonical ); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo esc_url( $canonical ); ?>">

<!-- OPEN GRAPH (kept identical to <title>/<description> to avoid signal split) -->
<meta property="og:type" content="<?php echo $is_singular ? 'article' : 'website'; ?>">
<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
<meta property="og:locale" content="en_IN">
<meta property="og:title" content="<?php echo $seo_title; ?>">
<meta property="og:description" content="<?php echo $seo_desc; ?>">
<meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
<meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
<meta property="og:image:secure_url" content="<?php echo esc_url( $og_image ); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?php echo $seo_title; ?>">
<?php if ( $is_singular && $published ) : ?>
<meta property="article:published_time" content="<?php echo esc_attr( $published ); ?>">
<meta property="article:modified_time"  content="<?php echo esc_attr( $modified ); ?>">
<meta property="article:author"         content="<?php echo esc_attr( $site_name ); ?>">
<meta property="article:section"        content="Education Technology">
<?php endif; ?>

<!-- TWITTER (mirrored) -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@ExtraaEdge">
<meta name="twitter:creator" content="@ExtraaEdge">
<meta name="twitter:title" content="<?php echo $seo_title; ?>">
<meta name="twitter:description" content="<?php echo $seo_desc; ?>">
<meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>">
<meta name="twitter:image:alt" content="<?php echo $seo_title; ?>">

<!-- RESOURCE HINTS (TTFB / LCP boost) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="dns-prefetch" href="https://www.google-analytics.com">
<link rel="dns-prefetch" href="https://www.clarity.ms">
<link rel="dns-prefetch" href="https://eeconfigstaticfiles.blob.core.windows.net">

<!-- CRITICAL FONT PRELOAD -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"></noscript>

<!-- PWA / ICON -->
<link rel="icon" href="<?php echo esc_url( $site_url ); ?>/favicon.ico" sizes="any">
<link rel="icon" href="<?php echo esc_url( $site_url ); ?>/icon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?php echo esc_url( $site_url ); ?>/apple-touch-icon.png">
<link rel="manifest" href="<?php echo esc_url( $site_url ); ?>/manifest.webmanifest">

<?php wp_head(); ?>
</head>

<body <?php body_class( 'extraaedge-site' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-to-content" href="#main-content">Skip to main content</a>

<!-- ─────────── STATIC CRAWLABLE HEADER NAV (no JS required) ─────────── -->
<header id="site-header" class="site-header" role="banner">
  <div class="container nav-bar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="<?php echo esc_attr( $site_name ); ?> Home">
      <img src="<?php echo esc_url( $site_url ); ?>/wp-content/uploads/2024/12/extraaedge-logo.svg" alt="<?php echo esc_attr( $site_name ); ?> — Education CRM Platform" width="160" height="40" fetchpriority="high">
    </a>

    <nav class="primary-nav" role="navigation" aria-label="Primary">
      <ul class="nav-list">
        <li class="nav-item has-children">
          <a href="<?php echo esc_url( $site_url ); ?>/products/" class="nav-link" aria-haspopup="true">Products</a>
          <ul class="sub-nav" aria-label="Product menu">
            <li><a href="<?php echo esc_url( $site_url ); ?>/products/education-crm/">Education CRM</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/products/whatsapp-api/">WhatsApp API &amp; Bot</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/products/mobile-crm/">Mobile CRM</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/products/chatbot-for-education/">Education Chatbot</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/products/ivr/">IVR Solutions</a></li>
          </ul>
        </li>
        <li class="nav-item has-children">
          <a href="<?php echo esc_url( $site_url ); ?>/industries/" class="nav-link">Industries</a>
          <ul class="sub-nav" aria-label="Industries menu">
            <li><a href="<?php echo esc_url( $site_url ); ?>/industries/higher-education/">Higher Education</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/industries/k12-schools/">K-12 Schools</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/industries/edtech/">EdTech</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/industries/vocational/">Vocational Training</a></li>
            <li><a href="<?php echo esc_url( $site_url ); ?>/industries/overseas-education/">Overseas Education</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="<?php echo esc_url( $site_url ); ?>/use-cases/" class="nav-link">Use Cases</a></li>
        <li class="nav-item"><a href="<?php echo esc_url( $site_url ); ?>/resources/" class="nav-link">Resources</a></li>
        <li class="nav-item"><a href="<?php echo esc_url( $site_url ); ?>/about/" class="nav-link">Company</a></li>
      </ul>
    </nav>

    <a href="<?php echo esc_url( $site_url ); ?>/book-demo/" class="btn-primary nav-cta">Book Free Demo</a>
    <button class="mobile-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
      <span aria-hidden="true">☰</span>
    </button>
  </div>
</header>

<?php if ( $is_singular && ! is_front_page() ) : ?>
<!-- ─────────── VISIBLE BREADCRUMB (semantic + crawlable) ─────────── -->
<nav class="breadcrumb-nav" aria-label="Breadcrumb">
  <div class="container">
    <ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">
      <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span itemprop="name">Home</span></a>
        <meta itemprop="position" content="1">
      </li>
      <?php
      $ancestors = get_post_ancestors( $post_id );
      $position  = 2;
      foreach ( array_reverse( $ancestors ) as $anc_id ) : ?>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemprop="item" href="<?php echo esc_url( get_permalink( $anc_id ) ); ?>"><span itemprop="name"><?php echo esc_html( get_the_title( $anc_id ) ); ?></span></a>
          <meta itemprop="position" content="<?php echo (int) $position++; ?>">
        </li>
      <?php endforeach;
      $pt = get_post_type_object( get_post_type( $post_id ) );
      if ( $pt && $pt->has_archive ) : ?>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemprop="item" href="<?php echo esc_url( get_post_type_archive_link( $pt->name ) ); ?>"><span itemprop="name"><?php echo esc_html( $pt->labels->name ); ?></span></a>
          <meta itemprop="position" content="<?php echo (int) $position++; ?>">
        </li>
      <?php endif; ?>
      <li class="breadcrumb-item current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
        <span itemprop="name"><?php echo esc_html( get_the_title( $post_id ) ); ?></span>
        <meta itemprop="position" content="<?php echo (int) $position; ?>">
      </li>
    </ol>
  </div>
</nav>
<?php endif; ?>

<main id="main-content" role="main" tabindex="-1">
