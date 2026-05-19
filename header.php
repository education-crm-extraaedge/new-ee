<?php
/**
 * Theme Header — SEO + Crawlability Optimized
 *
 * ─── SOURCE ORDER (Crawler-friendly, serial) ───
 *   1. DOCTYPE + <html lang>
 *   2. <head> charset / viewport / IE-compat
 *   3. wp_head() emits <title>  (via add_theme_support('title-tag'))
 *   4. Meta description + robots + author + referrer + format-detection
 *   5. Theme-color + color-scheme + application-name
 *   6. Canonical + hreflang (multi-region)
 *   7. Geo meta (LocalBusiness signal)
 *   8. Open Graph (matches <title>/<description>)
 *   9. Twitter Card (matches OG)
 *  10. Icons / manifest
 *  11. Resource hints (preconnect / dns-prefetch / preload)
 *  12. Sitewide JSON-LD (Organization + WebSite + LocalBusiness)
 *  13. Fonts (Open Sans + Poppins — existing, kept as-is)
 *  14. Tailwind CDN + Lucide icons (existing)
 *  15. Inline critical CSS (existing — preserved fully)
 *  16. wp_head() — plugins + per-post extras
 *  17. <body> + wp_body_open()
 *  18. Skip-to-content (accessibility landmark)
 *  19. Scroll progress bar (existing)
 *  20. <header> + <nav> (semantic + crawlable static menu)
 *  21. Mobile sidebar menu (existing — kept fully)
 *  22. Breadcrumb (visible + microdata) — only on inner pages
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* ───────────────────────────────────────────────
 * Resolve dynamic SEO values (used in head + schema)
 * ─────────────────────────────────────────────── */
$ee_site_name   = get_bloginfo('name')        ?: 'ExtraaEdge';
$ee_site_tag    = get_bloginfo('description') ?: 'AI-Powered Education CRM for Admissions';
$ee_home_url    = home_url('/');
$ee_is_singular = is_singular();
$ee_post_id     = $ee_is_singular ? get_queried_object_id() : 0;
$ee_canonical   = $ee_is_singular ? (get_post_meta($ee_post_id, '_canonical_url', true) ?: get_permalink($ee_post_id)) : ($ee_home_url . ltrim($_SERVER['REQUEST_URI'] ?? '', '/'));
$ee_seo_desc    = $ee_is_singular ? (get_post_meta($ee_post_id, '_seo_description', true) ?: $ee_site_tag) : $ee_site_tag;
$ee_og_image    = $ee_is_singular ? (get_post_meta($ee_post_id, '_og_image', true) ?: get_the_post_thumbnail_url($ee_post_id, 'full')) : '';
if (!$ee_og_image) $ee_og_image = 'https://www.extraaedge.com/wp-content/uploads/2024/12/extraaedge-og-default.png';

/* ── Home-page-only SEO overrides (editable in WP Admin → Home Page Editor → 🔍 SEO & Meta) ── */
$ee_is_home  = is_front_page() || is_home();
$ee_home_seo = $ee_is_home ? get_option('ee_home_settings', array()) : array();
$ee_h_get    = function($k, $fallback = '') use ($ee_home_seo) {
    return (isset($ee_home_seo[$k]) && $ee_home_seo[$k] !== '') ? $ee_home_seo[$k] : $fallback;
};
if ($ee_is_home) {
    $ee_seo_desc      = $ee_h_get('seo_meta_description', $ee_seo_desc);
    $ee_og_image      = $ee_h_get('seo_og_image',         $ee_og_image);
    $ee_og_title      = $ee_h_get('seo_og_title',         '');
    $ee_og_desc       = $ee_h_get('seo_og_description',   $ee_seo_desc);
    $ee_tw_title      = $ee_h_get('seo_twitter_title',    $ee_og_title);
    $ee_tw_desc       = $ee_h_get('seo_twitter_description', $ee_og_desc);
    $ee_tw_image      = $ee_h_get('seo_twitter_image',    $ee_og_image);
    $ee_meta_keywords = $ee_h_get('seo_meta_keywords',    '');
    $ee_home_title    = $ee_h_get('seo_page_title',       '');
    if ($ee_home_title) {
        add_filter('pre_get_document_title', function() use ($ee_home_title) { return $ee_home_title; }, 99);
    }
} else {
    $ee_og_title = $ee_og_desc = $ee_tw_title = $ee_tw_desc = $ee_tw_image = $ee_meta_keywords = '';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns# product: https://ogp.me/ns/product#">
<head>

    <!-- ─── 1. BASE ─── -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ─── 2. PRIMARY SEO META (single source — works on every page) ─── -->
    <meta name="description" content="<?php echo esc_attr($ee_seo_desc); ?>">
    <?php if ($ee_is_home && $ee_meta_keywords) : ?>
    <meta name="keywords" content="<?php echo esc_attr($ee_meta_keywords); ?>">
    <?php endif; ?>
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">
    <meta name="author" content="<?php echo esc_attr($ee_site_name); ?>">
    <meta name="publisher" content="<?php echo esc_attr($ee_site_name); ?>">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="format-detection" content="telephone=no">

    <!-- ─── 3. APP / THEME PROFILE ─── -->
    <meta name="theme-color" content="#DE6E30" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#19335D" media="(prefers-color-scheme: dark)">
    <meta name="color-scheme" content="light dark">
    <meta name="application-name" content="<?php echo esc_attr($ee_site_name); ?>">
    <meta name="msapplication-TileColor" content="#19335D">

    <!-- ─── 4. CANONICAL + HREFLANG (single source — works on every page) ─── -->
    <link rel="canonical" href="<?php echo esc_url($ee_canonical); ?>">
    <link rel="alternate" hreflang="en-in"     href="<?php echo esc_url($ee_canonical); ?>">
    <link rel="alternate" hreflang="en"        href="<?php echo esc_url($ee_canonical); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url($ee_canonical); ?>">

    <!-- ─── 5. GEO / LOCAL SIGNALS ─── -->
    <meta name="geo.region"   content="IN-MH">
    <meta name="geo.placename" content="Pune">
    <meta name="geo.position" content="18.5604;73.9412">
    <meta name="ICBM"         content="18.5604, 73.9412">

    <!-- ─── 6. OPEN GRAPH (single source — uses _seo_title via wp_get_document_title filter) ─── -->
    <meta property="og:type"               content="<?php echo $ee_is_singular ? 'article' : 'website'; ?>">
    <meta property="og:title"              content="<?php echo esc_attr($ee_is_home && $ee_og_title ? $ee_og_title : wp_get_document_title()); ?>">
    <meta property="og:description"        content="<?php echo esc_attr($ee_is_home ? $ee_og_desc : $ee_seo_desc); ?>">
    <meta property="og:url"                content="<?php echo esc_url($ee_canonical); ?>">
    <meta property="og:image"              content="<?php echo esc_url($ee_og_image); ?>">
    <meta property="og:image:secure_url"   content="<?php echo esc_url($ee_og_image); ?>">
    <meta property="og:image:width"        content="1200">
    <meta property="og:image:height"       content="630">
    <meta property="og:image:alt"          content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta property="og:site_name"          content="<?php echo esc_attr($ee_site_name); ?>">
    <meta property="og:locale"             content="en_IN">
    <?php if ($ee_is_singular) : ?>
    <meta property="article:published_time" content="<?php echo esc_attr(get_the_date('c', $ee_post_id)); ?>">
    <meta property="article:modified_time"  content="<?php echo esc_attr(get_the_modified_date('c', $ee_post_id)); ?>">
    <meta property="article:author"         content="<?php echo esc_attr($ee_site_name); ?>">
    <?php endif; ?>

    <!-- ─── 7. TWITTER CARD (mirrored — no signal split) ─── -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:site"        content="@ExtraaEdge">
    <meta name="twitter:creator"     content="@ExtraaEdge">
    <meta name="twitter:title"       content="<?php echo esc_attr($ee_is_home && $ee_tw_title ? $ee_tw_title : wp_get_document_title()); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($ee_is_home ? $ee_tw_desc : $ee_seo_desc); ?>">
    <meta name="twitter:image"       content="<?php echo esc_url($ee_is_home && $ee_tw_image ? $ee_tw_image : $ee_og_image); ?>">
    <meta name="twitter:image:alt"   content="<?php echo esc_attr($ee_is_home && $ee_tw_title ? $ee_tw_title : wp_get_document_title()); ?>">

    <!-- ─── 8. ICONS + PWA MANIFEST ─── -->
    <link rel="icon"             href="<?php echo esc_url($ee_home_url); ?>favicon.ico" sizes="any">
    <link rel="icon"             href="<?php echo esc_url($ee_home_url); ?>icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo esc_url($ee_home_url); ?>apple-touch-icon.png">
    <link rel="mask-icon"        href="<?php echo esc_url($ee_home_url); ?>safari-pinned-tab.svg" color="#DE6E30">
    <link rel="manifest"         href="<?php echo esc_url($ee_home_url); ?>manifest.webmanifest">

    <!-- ─── 9. RESOURCE HINTS (TTFB + LCP boost) ─── -->
    <link rel="preconnect"   href="https://fonts.googleapis.com">
    <link rel="preconnect"   href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect"   href="https://cdn.tailwindcss.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.clarity.ms">
    <link rel="dns-prefetch" href="https://www.youtube.com">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://eeconfigstaticfiles.blob.core.windows.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    <!-- ─── 10. SITEWIDE JSON-LD (Organization + WebSite + LocalBusiness) ─── -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "@id": "https://www.extraaedge.com/#organization",
          "name": "ExtraaEdge",
          "alternateName": "ExtraaEdge Education CRM",
          "url": "https://www.extraaedge.com/",
          "logo": {
            "@type": "ImageObject",
            "url": "https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg",
            "width": 512,
            "height": 128
          },
          "description": "AI-powered Education CRM helping 500+ educational institutions automate admissions, manage leads, and boost enrollments.",
          "foundingDate": "2015",
          "slogan": "Education CRM That Turns Every Admission Inquiry into an Enrollment",
          "sameAs": [
            "https://www.facebook.com/extraaedge/",
            "https://www.instagram.com/extraaedge/",
            "https://www.linkedin.com/company/extraaedge/",
            "https://x.com/extraaedge",
            "https://www.youtube.com/user/theextraaedge"
          ],
          "contactPoint": [
            { "@type": "ContactPoint", "telephone": "+91-9028065511", "contactType": "sales",   "areaServed": ["IN","AE","GB","US"], "availableLanguage": ["English","Hindi"] },
            { "@type": "ContactPoint", "telephone": "+91-8956755927", "contactType": "HR",      "areaServed": "IN",                  "availableLanguage": ["English","Hindi"] },
            { "@type": "ContactPoint", "telephone": "+91-8956982897", "contactType": "support", "areaServed": "IN",                  "availableLanguage": ["English","Hindi"] }
          ],
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Pride Icon, Kharadi",
            "addressLocality": "Pune",
            "addressRegion": "MH",
            "postalCode": "411014",
            "addressCountry": "IN"
          }
        },
        {
          "@type": "WebSite",
          "@id": "https://www.extraaedge.com/#website",
          "url": "https://www.extraaedge.com/",
          "name": "<?php echo esc_js($ee_site_name); ?>",
          "description": "<?php echo esc_js($ee_site_tag); ?>",
          "inLanguage": "en-IN",
          "publisher": { "@id": "https://www.extraaedge.com/#organization" },
          "potentialAction": {
            "@type": "SearchAction",
            "target": { "@type": "EntryPoint", "urlTemplate": "https://www.extraaedge.com/?s={search_term_string}" },
            "query-input": "required name=search_term_string"
          }
        },
        {
          "@type": "LocalBusiness",
          "@id": "https://www.extraaedge.com/#localbusiness",
          "name": "ExtraaEdge",
          "image": "https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg",
          "url": "https://www.extraaedge.com/",
          "telephone": "+91-9028065511",
          "priceRange": "$$",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Pride Icon, Kharadi",
            "addressLocality": "Pune",
            "addressRegion": "MH",
            "postalCode": "411014",
            "addressCountry": "IN"
          },
          "geo": { "@type": "GeoCoordinates", "latitude": 18.5604, "longitude": 73.9412 },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
            "opens": "09:30",
            "closes": "18:30"
          }
        }
      ]
    }
    </script>

    <!-- ─── 11. Fonts (EXISTING — preserved exactly) ─── -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@700;800&display=swap" rel="stylesheet">

    <!-- ─── 12. Tailwind for Layout & Utils (EXISTING) ─── -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brandOrange: '#DE6E30',
                        brandBlue: '#19335D',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- ─── 13. Critical CSS (EXISTING — preserved fully) ─── -->
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #ffffff; color: #19335D; }
        h1, h2, h3, h4, .menu-title { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Menu title (replaces h4 inside mega menu + mobile menu — preserves visual, fixes SEO heading hierarchy) */
        .menu-title { display: block; line-height: 1.25; }

        /* Skip-to-content link (accessibility + crawlability landmark) */
        .skip-to-content {
            position: absolute;
            top: -100px;
            left: 0;
            background: #DE6E30;
            color: #fff;
            padding: 12px 20px;
            z-index: 10000;
            font-weight: 700;
            border-radius: 0 0 8px 0;
            transition: top .3s;
        }
        .skip-to-content:focus { top: 0; }

        /* Site Header — STICKY (fallback in case Tailwind classes don't apply) */
        #site-header {
            position: -webkit-sticky !important;
            position: sticky !important;
            top: 0 !important;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 9999 !important;       /* float above any reveal animations / sticky CRM widgets */
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transform: none !important;     /* defeats parents that animate transform and could displace sticky */
        }
        /* If the header somehow loses sticky-ness (rare browser bug), fall back
           to fixed positioning so it stays on screen. Triggered via JS below. */
        #site-header.ee-force-fixed {
            position: fixed !important;
            top: 0 !important;
            left: 0;
            right: 0;
        }
        body.ee-header-fixed { padding-top: var(--ee-header-h, 96px); }

        /* ───────── Tailwind shim ─────────
           If the Tailwind CDN is blocked, slow, or cached as 404 on a CDN
           between us and the visitor, the `hidden`, `lg:flex`, `lg:hidden`
           utility classes do nothing — which collapses the navigation. These
           plain CSS rules guarantee a usable header even with Tailwind down.

           Uses semantic class names (.ee-desktop-nav / .ee-mobile-btn) so the
           selectors do not contain the `:` character — some CSS minifiers and
           CDNs (Cloudflare Auto-Minify, Litespeed CSS Combine, Rocket Loader)
           mangle Tailwind's "\:" escape sequence and silently break them. */
        #site-header .ee-desktop-nav { display: none; }
        #site-header .ee-mobile-btn  { display: inline-flex; align-items: center; }
        @media (min-width: 1024px) {
            #site-header .ee-desktop-nav { display: flex !important; align-items: center; gap: 8px; }
            #site-header .ee-mobile-btn  { display: none !important; }
        }
        /* Also try to recover Tailwind utility classes if they happen to load */
        #site-header .hidden { display: none; }
        @media (min-width: 1024px) {
            #site-header .lg\:flex   { display: flex; }
            #site-header .lg\:hidden { display: none; }
        }
        @media (max-width: 1023.98px) {
            #site-header .lg\:hidden { display: inline-flex; align-items: center; }
        }
        /* Logo / Book Demo / mobile button sizing fallback */
        #site-header .glass-nav > div { display: flex; align-items: center; justify-content: space-between; max-width: 1280px; margin: 0 auto; padding: 0 16px; height: 80px; }
        @media (min-width: 768px) {
            #site-header .glass-nav > div { padding: 0 32px; height: 96px; }
        }
        #site-header nav.glass-nav .nav-group { position: relative; }
        #site-header nav.glass-nav .nav-group > button {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 10px 16px;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-weight: 600; color: #19335D; background: transparent; border: 0; cursor: pointer;
            transition: color .2s ease;
        }
        #site-header nav.glass-nav .nav-group > button:hover { color: #DE6E30; }
        #site-header .hidden.lg\:flex {
            /* Override Tailwind's `hidden` whenever the `lg:flex` flag is also
               set AND we're at lg breakpoint — guarantees the desktop nav shows. */
        }
        @media (min-width: 1024px) {
            #site-header .hidden.lg\:flex { display: flex !important; align-items: center; gap: 8px; }
        }
        /* Book Demo button fallback if Tailwind utilities (bg-brandBlue etc.) don't apply */
        #site-header a[href="/book-demo/"] {
            display: inline-block;
            background: #19335D;
            color: #fff;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-weight: 700;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(25,51,93,0.18);
            transition: background .2s ease;
        }
        #site-header a[href="/book-demo/"]:hover { background: #DE6E30; }

        /* Sticky-safe overflow on body — overflow:hidden / auto here would
           silently kill position:sticky on any descendant (including the
           header itself). Use overflow-x:clip which suppresses horizontal
           overflow without creating a scroll container. */
        html, body {
            overflow-x: clip;
        }
        body {
            overflow-y: visible;
        }

        /* Glassmorphism Navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(25, 51, 93, 0.1);
            width: 100%;
        }

        /* Glass Mega Menu */
        .mega-menu {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 40px 80px -20px rgba(25, 51, 93, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 10px;
            border-radius: 18px;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            width: max-content;
            max-width: 900px;
        }

        .nav-group:hover .mega-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(10px);
        }

        /* Menu Item Hover */
        .menu-item {
            display: flex;
            gap: 10px;
            padding: 10px;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid transparent;
            text-decoration: none;
            color: inherit;
        }

        .menu-item:hover {
            background: rgba(222, 110, 48, 0.05);
            border-color: rgba(222, 110, 48, 0.2);
            transform: translateY(-2px);
        }

        .icon-box {
            width: 36px;
            height: 36px;
            background: #f8fafc;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #19335D;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .menu-item:hover .icon-box {
            background: #DE6E30;
            color: white;
            box-shadow: 0 8px 16px rgba(222, 110, 48, 0.3);
        }

        /* When the icon-box contains a real PNG/SVG logo, the dark-orange
           hover bg overpowers the artwork — keep a light bg with an
           orange ring + glow so the logo stays clearly visible. Bigger
           than line-icon boxes (56 vs 36) and minimal padding so wide
           rectangular logos still look prominent. */
        .icon-box--image {
            width: 56px;
            height: 56px;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 12px;
            padding: 4px;
        }
        .icon-box--image img {
            width: 100% !important;
            height: 100% !important;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        .menu-item:hover .icon-box--image {
            background: #fff7f0;
            border-color: rgba(222, 110, 48, 0.35);
            box-shadow: 0 8px 16px rgba(222, 110, 48, 0.18);
        }
        .menu-item:hover .icon-box--image img { transform: scale(1.10); }

        /* Mobile Side Menu Glass */
        #mobileMenu {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #mobileMenu.active { transform: translateX(0); }

        /* Accordion for Mobile */
        .mobile-accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }
        .mobile-accordion-item.active .mobile-accordion-content {
            max-height: 2500px;
        }
        .mobile-accordion-item.active .chevron-icon {
            transform: rotate(180deg);
        }

        /* Mobile Card with Icon */
        .m-icon-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: #f8fafc;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }
        .m-icon-card:hover, .m-icon-card:active {
            background: rgba(222, 110, 48, 0.06);
            border-color: rgba(222, 110, 48, 0.18);
        }
        .m-icon-card .m-ico {
            width: 32px;
            height: 32px;
            background: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #19335D;
            flex-shrink: 0;
            border: 1px solid #e2e8f0;
        }
        .m-icon-card:hover .m-ico, .m-icon-card:active .m-ico {
            background: #DE6E30;
            color: #fff;
            border-color: #DE6E30;
        }
        /* Keep light bg on icon boxes that contain a logo image */
        .m-icon-card .m-ico:has(img) { background: #fff; }
        .m-icon-card:hover .m-ico:has(img),
        .m-icon-card:active .m-ico:has(img) {
            background: #fff7f0;
            border-color: rgba(222, 110, 48, 0.35);
        }
        .m-icon-card .m-ico svg { width: 16px; height: 16px; }
        .m-icon-card .m-text { flex: 1; min-width: 0; }
        .m-icon-card .menu-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 13px;
            color: #19335D;
            margin: 0;
            line-height: 1;
        }
        .m-icon-card p {
            font-size: 11px;
            color: #64748b;
            margin: 2px 0 0 0;
            line-height: 1;
        }

        /* Animation Classes */
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }

        /* Scroll Progress */
        #progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(to right, #DE6E30, #19335D);
            z-index: 2000;
            width: 0%;
        }

        /* Breadcrumb Nav (crawlable, visible on inner pages) */
        .ee-breadcrumb {
            background: #f8fafc;
            padding: 12px 0;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            border-bottom: 1px solid rgba(25, 51, 93, 0.06);
        }
        .ee-breadcrumb .ee-bc-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }
        .ee-breadcrumb ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 8px;
            align-items: center;
        }
        .ee-breadcrumb li {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-weight: 500;
        }
        .ee-breadcrumb li + li::before {
            content: "›";
            color: #94a3b8;
            margin-right: 2px;
        }
        .ee-breadcrumb a {
            color: #19335D;
            text-decoration: none;
            font-weight: 600;
            transition: color .2s ease;
        }
        .ee-breadcrumb a:hover { color: #DE6E30; }
        .ee-breadcrumb .ee-bc-current { color: #DE6E30; font-weight: 700; }

        /* ───────── Custom landing pages — global polish ─────────
           Used by /products/, /industries/, /use-cases/, /company/.
           - Reset oversized line-heights on body copy (some sections
             inherit 1.7 which looks loose at 16px).
           - Pull the first section flush against the breadcrumb so
             there is no visible gap between the two. */
        body.ee-custom-landing .ee-breadcrumb { margin-bottom: 0; padding: 10px 0; }
        body.ee-custom-landing #main-content > section:first-of-type,
        body.ee-custom-landing #main-content > div:first-of-type > section:first-of-type {
            padding-top: 24px !important;
            margin-top: 0 !important;
        }
        body.ee-custom-landing .ee-subheadline,
        body.ee-custom-landing .ecrm-subheadline,
        body.ee-custom-landing .uc-body,
        body.ee-custom-landing .ee-card-body,
        body.ee-custom-landing .ee-card-blurb,
        body.ee-custom-landing .ee-card-text,
        body.ee-custom-landing .ee-card-desc {
            line-height: 1.55 !important;
        }
        body.ee-custom-landing h1,
        body.ee-custom-landing h2,
        body.ee-custom-landing h3 {
            line-height: 1.18 !important;
        }
    </style>

    <!-- ─── 14. WordPress hook (plugins + per-post extras inject here) ─── -->
    <?php wp_head(); ?>

</head>
<body <?php body_class('extraaedge-site'); ?> style="overflow-x:clip;">
<?php /* overflow-x:clip (not hidden) keeps page-level horizontal-scroll suppression without breaking position:sticky on descendants like VidyaAI's right-side CRM dashboard */ ?>
<?php wp_body_open(); ?>

    <!-- Skip to content (accessibility + crawler navigation landmark) -->
    <a href="#main-content" class="skip-to-content">Skip to main content</a>

    <!-- Scroll Progress Indicator -->
    <div id="progress" role="progressbar" aria-label="Page scroll progress" aria-valuemin="0" aria-valuemax="100"></div>

    <!-- ─── Site Header (semantic + crawlable static nav + STICKY) ─── -->
    <header id="site-header" role="banner" class="sticky top-0 z-[1000] w-full">
    <nav class="glass-nav w-full" role="navigation" aria-label="Primary">
        <div class="max-w-7xl mx-auto px-4 md:px-8 flex items-center justify-between h-20 md:h-24">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex-shrink-0" aria-label="<?php echo esc_attr($ee_site_name); ?> — Home" itemprop="url">
                <img src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg"
                     alt="<?php echo esc_attr($ee_site_name); ?> — Education CRM Platform" class="h-10 md:h-12 w-auto"
                     width="160" height="48" fetchpriority="high" decoding="async" itemprop="logo">
            </a>

            <!-- Desktop Links -->
            <div class="hidden lg:flex items-center gap-2 ee-desktop-nav">

                <!-- Products -->
                <div class="nav-group relative">
                    <button class="flex items-center gap-1.5 px-4 py-8 font-semibold text-brandBlue hover:text-brandOrange transition" aria-haspopup="true" aria-expanded="false" aria-label="Products menu">
                        Products <i data-lucide="chevron-down" class="w-4 h-4" aria-hidden="true"></i>
                    </button>
                    <div class="mega-menu grid grid-cols-2 gap-2 w-[750px]" role="menu" aria-label="Products submenu">
                        <?php
                        /* Products menu items — pulled from the Product CPT so adding a new
                           Product post automatically appears here. Falls back to a seeded
                           list when the CPT is empty. Short description uses the same
                           _product_card_desc meta as the /products/ landing page so a
                           single edit updates both places. */
                        $ee_product_menu = function_exists('ee_get_product_menu_items') ? ee_get_product_menu_items() : array();
                        foreach ($ee_product_menu as $p) :
                            $short = wp_trim_words(wp_strip_all_tags((string) $p['desc']), 14, '…');
                        ?>
                        <a href="<?php echo esc_url($p['url']); ?>" class="menu-item" role="menuitem" title="<?php echo esc_attr($p['title']); ?>">
                            <div class="icon-box<?php echo !empty($p['icon']) ? ' icon-box--image' : ''; ?>" aria-hidden="true">
                                <?php if (!empty($p['icon'])) : ?>
                                    <img src="<?php echo esc_url($p['icon']); ?>" alt="" style="object-fit:contain" loading="lazy">
                                <?php else : ?>
                                    <i data-lucide="layout-dashboard"></i>
                                <?php endif; ?>
                            </div>
                            <div><span class="menu-title font-bold text-brandBlue text-sm"><?php echo esc_html($p['title']); ?></span><p class="text-xs text-slate-500 mt-1"><?php echo esc_html($short); ?></p></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Industry -->
                <div class="nav-group relative">
                    <button class="flex items-center gap-1.5 px-4 py-8 font-semibold text-brandBlue hover:text-brandOrange transition" aria-haspopup="true" aria-expanded="false" aria-label="Industry menu">
                        Industry <i data-lucide="chevron-down" class="w-4 h-4" aria-hidden="true"></i>
                    </button>
                    <div class="mega-menu grid grid-cols-2 gap-2 w-[700px]" role="menu" aria-label="Industry submenu">
                        <?php
                        /* Industries menu items — pulled from the Industry CPT so adding a new Industry post
                           automatically appears here. Falls back to a hardcoded list when the CPT is empty. */
                        $ee_industry_menu = ee_get_industry_menu_items();
                        foreach ($ee_industry_menu as $ind) :
                        ?>
                        <a href="<?php echo esc_url($ind['url']); ?>" class="menu-item" role="menuitem" title="<?php echo esc_attr($ind['title']); ?>">
                            <div class="icon-box<?php echo !empty($ind['icon']) ? ' icon-box--image' : ''; ?>" aria-hidden="true">
                                <?php if (!empty($ind['icon'])) : ?>
                                    <img src="<?php echo esc_url($ind['icon']); ?>" alt="" style="object-fit:contain" loading="lazy">
                                <?php else : ?>
                                    <i data-lucide="building"></i>
                                <?php endif; ?>
                            </div>
                            <div><span class="menu-title font-bold text-brandBlue text-sm"><?php echo esc_html($ind['title']); ?></span><p class="text-xs text-slate-500 mt-1"><?php echo esc_html($ind['desc']); ?></p></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Use Cases -->
                <div class="nav-group relative">
                    <button class="flex items-center gap-1.5 px-4 py-8 font-semibold text-brandBlue hover:text-brandOrange transition" aria-haspopup="true" aria-expanded="false" aria-label="Use Cases menu">
                        Use Cases <i data-lucide="chevron-down" class="w-4 h-4" aria-hidden="true"></i>
                    </button>
                    <div class="mega-menu flex flex-col gap-1 w-[400px]" role="menu" aria-label="Use Cases submenu">
                        <?php
                        /* Use Cases — single source of truth via ee_get_usecase_items().
                           Editable in WP Admin → 🎯 Use Cases. Edit once → updates here
                           and on the /use-cases/ landing page in one shot. */
                        $ee_usecase_menu = function_exists('ee_get_usecase_items') ? ee_get_usecase_items() : array();
                        foreach ($ee_usecase_menu as $uc) :
                            $short = wp_trim_words(wp_strip_all_tags((string) $uc['desc']), 14, '…');
                        ?>
                        <a href="<?php echo esc_url($uc['url']); ?>" class="menu-item" role="menuitem" title="<?php echo esc_attr($uc['title']); ?>">
                            <div class="icon-box<?php echo !empty($uc['icon']) ? ' icon-box--image' : ''; ?>" aria-hidden="true">
                                <?php if (!empty($uc['icon'])) : ?>
                                    <img src="<?php echo esc_url($uc['icon']); ?>" alt="" style="object-fit:contain" loading="lazy">
                                <?php elseif (!empty($uc['lucide'])) : ?>
                                    <i data-lucide="<?php echo esc_attr($uc['lucide']); ?>"></i>
                                <?php else : ?>
                                    <i data-lucide="users"></i>
                                <?php endif; ?>
                            </div>
                            <div><span class="menu-title font-bold text-brandBlue"><?php echo esc_html($uc['title']); ?></span><p class="text-xs text-slate-500 mt-1"><?php echo esc_html($short); ?></p></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Resources -->
                <div class="nav-group relative">
                    <button class="flex items-center gap-1.5 px-4 py-8 font-semibold text-brandBlue hover:text-brandOrange transition" aria-haspopup="true" aria-expanded="false" aria-label="Resources menu">
                        Resources <i data-lucide="chevron-down" class="w-4 h-4" aria-hidden="true"></i>
                    </button>
                    <div class="mega-menu grid grid-cols-2 gap-2 w-[600px]" role="menu" aria-label="Resources submenu">
                        <a href="/blogs/" class="menu-item" role="menuitem" title="ExtraaEdge Blogs">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Blogs_icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Blogs</span><p class="text-xs text-slate-500 mt-1">Latest insights to optimize your admissions.</p></div>
                        </a>
                        <a href="/ebooks/" class="menu-item" role="menuitem" title="Free Education Ebooks">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/e-books_icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Ebooks</span><p class="text-xs text-slate-500 mt-1">In-depth industry-relevant guides.</p></div>
                        </a>
                        <a href="/webinars/" class="menu-item" role="menuitem" title="Education Webinars">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Webinars-icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Webinars</span><p class="text-xs text-slate-500 mt-1">Live sessions with emerging trends.</p></div>
                        </a>
                        <a href="/case-studies/" class="menu-item" role="menuitem" title="Customer Case Studies">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/Case-studies_icons.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Case Studies</span><p class="text-xs text-slate-500 mt-1">Discover how leading institutions grow.</p></div>
                        </a>
                        <a href="/news/" class="menu-item col-span-2" role="menuitem" title="News and Media">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/News_And_Media_icons.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">News &amp; Media</span><p class="text-xs text-slate-500 mt-1">Keep up with the latest updates from ExtraaEdge.</p></div>
                        </a>
                    </div>
                </div>

                <!-- Company -->
                <div class="nav-group relative">
                    <button class="flex items-center gap-1.5 px-4 py-8 font-semibold text-brandBlue hover:text-brandOrange transition" aria-haspopup="true" aria-expanded="false" aria-label="Company menu">
                        Company <i data-lucide="chevron-down" class="w-4 h-4" aria-hidden="true"></i>
                    </button>
                    <div class="mega-menu grid grid-cols-2 gap-2 w-[650px]" role="menu" aria-label="Company submenu">
                        <a href="/about/" class="menu-item" role="menuitem" title="About ExtraaEdge">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/about-us_-icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">About</span><p class="text-xs text-slate-500 mt-1">Learn more about our story and mission.</p></div>
                        </a>
                        <a href="/customers/" class="menu-item" role="menuitem" title="Our Customers">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/costomers-icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Customers</span><p class="text-xs text-slate-500 mt-1">Explore success stories in your segment.</p></div>
                        </a>
                        <a href="/careers/" class="menu-item" role="menuitem" title="Careers at ExtraaEdge">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/careers-icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Careers</span><p class="text-xs text-slate-500 mt-1">Join our team&mdash;explore opportunities.</p></div>
                        </a>
                        <a href="/investors/" class="menu-item" role="menuitem" title="Investors and Advisors">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/investors_and_advisers_icons.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Investors &amp; Advisors</span><p class="text-xs text-slate-500 mt-1">Meet our visionary supporters.</p></div>
                        </a>
                        <a href="/team/" class="menu-item" role="menuitem" title="ExtraaEdge Team">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/team-icons.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Team</span><p class="text-xs text-slate-500 mt-1">The people driving your success.</p></div>
                        </a>
                        <a href="/partners/" class="menu-item bg-brandOrange/5" role="menuitem" title="Become an ExtraaEdge Partner">
                            <div class="icon-box icon-box--image" aria-hidden="true"><img src="https://www.extraaedge.com/wp-content/uploads/2026/icon-png/become_a_partner_icon.png" alt="" style="object-fit:contain" loading="lazy"></div>
                            <div><span class="menu-title font-bold text-brandBlue">Become a Partner</span><p class="text-xs text-slate-500 mt-1">Partner with us&mdash;get in touch.</p></div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4">
                <a href="/book-demo/" class="bg-brandBlue text-white font-bold px-6 py-3 rounded-xl hover:bg-brandOrange transition shadow-lg shadow-brandBlue/20" title="Book a free demo" aria-label="Book a free demo">Book Demo</a>
                <button id="openMobileBtn" class="lg:hidden p-2 text-brandBlue ee-mobile-btn" aria-label="Open mobile menu" aria-controls="mobileMenu" aria-expanded="false"><i data-lucide="menu" aria-hidden="true"></i></button>
            </div>
        </div>
    </nav>
    </header>

    <!-- ─── Full Mobile Sidebar Menu (EXISTING — preserved fully) ─── -->
    <div id="mobileMenu" class="fixed top-0 right-0 h-full w-[85%] max-w-[360px] z-[1100] lg:hidden flex flex-col shadow-2xl" role="dialog" aria-label="Mobile navigation menu" aria-modal="true">
        <div class="p-6 flex items-center justify-between border-b border-slate-100 bg-white shadow-sm">
            <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($ee_site_name); ?> — Home"><img src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg" class="h-8" alt="<?php echo esc_attr($ee_site_name); ?>" width="120" height="32" loading="eager"></a>
            <button id="closeMobileBtn" class="p-2 bg-slate-100 rounded-full" aria-label="Close mobile menu"><i data-lucide="x" aria-hidden="true"></i></button>
        </div>

        <div class="flex-1 overflow-y-auto bg-slate-50 px-4 py-6 space-y-4">

            <!-- 1. Products Mobile -->
            <div class="mobile-accordion-item bg-white rounded-2xl overflow-hidden border border-slate-200">
                <button class="w-full p-5 flex justify-between items-center font-bold text-brandBlue" onclick="toggleAccordion(this)" aria-expanded="false">
                    <span class="flex items-center gap-2"><i data-lucide="layers" class="w-4 h-4 text-brandOrange" aria-hidden="true"></i> Products</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-brandOrange transition-transform chevron-icon" aria-hidden="true"></i>
                </button>
                <div class="mobile-accordion-content">
                    <div class="p-4 space-y-2">
                        <?php foreach ((function_exists('ee_get_product_menu_items') ? ee_get_product_menu_items() : array()) as $p) :
                            $short = wp_trim_words(wp_strip_all_tags((string) $p['desc']), 10, '…');
                        ?>
                        <a href="<?php echo esc_url($p['url']); ?>" class="m-icon-card" title="<?php echo esc_attr($p['title']); ?>">
                            <div class="m-ico" aria-hidden="true">
                                <?php if (!empty($p['icon'])) : ?>
                                    <img src="<?php echo esc_url($p['icon']); ?>" alt="" style="width:18px;height:18px;object-fit:contain" loading="lazy">
                                <?php else : ?>
                                    <i data-lucide="layout-dashboard"></i>
                                <?php endif; ?>
                            </div>
                            <div class="m-text"><span class="menu-title"><?php echo esc_html($p['title']); ?></span><p><?php echo esc_html($short); ?></p></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- 2. Industry Mobile -->
            <div class="mobile-accordion-item bg-white rounded-2xl overflow-hidden border border-slate-200">
                <button class="w-full p-5 flex justify-between items-center font-bold text-brandBlue" onclick="toggleAccordion(this)" aria-expanded="false">
                    <span class="flex items-center gap-2"><i data-lucide="building-2" class="w-4 h-4 text-brandOrange" aria-hidden="true"></i> Industry</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-brandOrange transition-transform chevron-icon" aria-hidden="true"></i>
                </button>
                <div class="mobile-accordion-content">
                    <div class="p-4 space-y-2">
                        <?php foreach (ee_get_industry_menu_items() as $ind) : ?>
                        <a href="<?php echo esc_url($ind['url']); ?>" class="m-icon-card" title="<?php echo esc_attr($ind['title']); ?>">
                            <div class="m-ico" aria-hidden="true">
                                <?php if (!empty($ind['icon'])) : ?>
                                    <img src="<?php echo esc_url($ind['icon']); ?>" alt="" style="width:18px;height:18px;object-fit:contain" loading="lazy">
                                <?php else : ?>
                                    <i data-lucide="building"></i>
                                <?php endif; ?>
                            </div>
                            <div class="m-text"><span class="menu-title"><?php echo esc_html($ind['title']); ?></span><p><?php echo esc_html($ind['short_desc']); ?></p></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- 3. Use Cases Mobile -->
            <div class="mobile-accordion-item bg-white rounded-2xl overflow-hidden border border-slate-200">
                <button class="w-full p-5 flex justify-between items-center font-bold text-brandBlue" onclick="toggleAccordion(this)" aria-expanded="false">
                    <span class="flex items-center gap-2"><i data-lucide="target" class="w-4 h-4 text-brandOrange" aria-hidden="true"></i> Use Cases</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-brandOrange transition-transform chevron-icon" aria-hidden="true"></i>
                </button>
                <div class="mobile-accordion-content">
                    <div class="p-4 space-y-2">
                        <?php foreach ((function_exists('ee_get_usecase_items') ? ee_get_usecase_items() : array()) as $uc) :
                            $short = wp_trim_words(wp_strip_all_tags((string) $uc['desc']), 10, '…');
                        ?>
                        <a href="<?php echo esc_url($uc['url']); ?>" class="m-icon-card" title="<?php echo esc_attr($uc['title']); ?>">
                            <div class="m-ico" aria-hidden="true">
                                <?php if (!empty($uc['icon'])) : ?>
                                    <img src="<?php echo esc_url($uc['icon']); ?>" alt="" style="width:18px;height:18px;object-fit:contain" loading="lazy">
                                <?php elseif (!empty($uc['lucide'])) : ?>
                                    <i data-lucide="<?php echo esc_attr($uc['lucide']); ?>"></i>
                                <?php else : ?>
                                    <i data-lucide="users"></i>
                                <?php endif; ?>
                            </div>
                            <div class="m-text"><span class="menu-title"><?php echo esc_html($uc['title']); ?></span><p><?php echo esc_html($short); ?></p></div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- 4. Resources Mobile -->
            <div class="mobile-accordion-item bg-white rounded-2xl overflow-hidden border border-slate-200">
                <button class="w-full p-5 flex justify-between items-center font-bold text-brandBlue" onclick="toggleAccordion(this)" aria-expanded="false">
                    <span class="flex items-center gap-2"><i data-lucide="library" class="w-4 h-4 text-brandOrange" aria-hidden="true"></i> Resources</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-brandOrange transition-transform chevron-icon" aria-hidden="true"></i>
                </button>
                <div class="mobile-accordion-content">
                    <div class="p-4 space-y-2">
                        <a href="/blogs/" class="m-icon-card" title="Blogs">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="file-text"></i></div>
                            <div class="m-text"><span class="menu-title">Blogs</span><p>Latest admissions insights.</p></div>
                        </a>
                        <a href="/ebooks/" class="m-icon-card" title="Ebooks">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="book"></i></div>
                            <div class="m-text"><span class="menu-title">Ebooks</span><p>Industry-relevant guides.</p></div>
                        </a>
                        <a href="/webinars/" class="m-icon-card" title="Webinars">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="monitor"></i></div>
                            <div class="m-text"><span class="menu-title">Webinars</span><p>Live sessions on trends.</p></div>
                        </a>
                        <a href="/case-studies/" class="m-icon-card" title="Case Studies">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="award"></i></div>
                            <div class="m-text"><span class="menu-title">Case Studies</span><p>How institutions grow.</p></div>
                        </a>
                        <a href="/news/" class="m-icon-card" title="News and Media">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="newspaper"></i></div>
                            <div class="m-text"><span class="menu-title">News &amp; Media</span><p>Latest updates from ExtraaEdge.</p></div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 5. Company Mobile -->
            <div class="mobile-accordion-item bg-white rounded-2xl overflow-hidden border border-slate-200">
                <button class="w-full p-5 flex justify-between items-center font-bold text-brandBlue" onclick="toggleAccordion(this)" aria-expanded="false">
                    <span class="flex items-center gap-2"><i data-lucide="briefcase-business" class="w-4 h-4 text-brandOrange" aria-hidden="true"></i> Company</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-brandOrange transition-transform chevron-icon" aria-hidden="true"></i>
                </button>
                <div class="mobile-accordion-content">
                    <div class="p-4 space-y-2">
                        <a href="/about/" class="m-icon-card" title="About Us">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="info"></i></div>
                            <div class="m-text"><span class="menu-title">About Us</span><p>Our story and mission.</p></div>
                        </a>
                        <a href="/customers/" class="m-icon-card" title="Customers">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="users"></i></div>
                            <div class="m-text"><span class="menu-title">Customers</span><p>Success stories.</p></div>
                        </a>
                        <a href="/careers/" class="m-icon-card" title="Careers">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="sparkles"></i></div>
                            <div class="m-text"><span class="menu-title">Careers</span><p>Join our team.</p></div>
                        </a>
                        <a href="/investors/" class="m-icon-card" title="Investors and Advisors">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="landmark"></i></div>
                            <div class="m-text"><span class="menu-title">Investors &amp; Advisors</span><p>Our supporters.</p></div>
                        </a>
                        <a href="/team/" class="m-icon-card" title="Team">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="smile"></i></div>
                            <div class="m-text"><span class="menu-title">Team</span><p>People driving your success.</p></div>
                        </a>
                        <a href="/partners/" class="m-icon-card" title="Become a Partner">
                            <div class="m-ico" aria-hidden="true"><i data-lucide="handshake"></i></div>
                            <div class="m-text"><span class="menu-title">Become a Partner</span><p>Partner with us.</p></div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mobile Bottom Actions -->
        <div class="p-6 bg-white border-t border-slate-100">
            <a href="/book-demo/" class="block bg-brandBlue py-4 rounded-xl font-bold text-white shadow-lg shadow-brandBlue/20 text-center" aria-label="Book a free demo">Book Demo</a>
        </div>
    </div>

    <?php
    /* ─── Visible Breadcrumb Navigation (crawler-friendly, microdata) ───
     * Renders only on inner pages — improves crawl architecture and shows
     * hierarchy in source serial order before <main> opens. */
    $ee_custom_route_title = isset($GLOBALS['ee_custom_route_title']) ? $GLOBALS['ee_custom_route_title'] : '';
    if (($ee_is_singular || $ee_custom_route_title) && !is_front_page()) :
        $bc_post   = $ee_custom_route_title ? null : get_queried_object();
        $bc_pt     = ($bc_post && isset($bc_post->ID)) ? get_post_type_object(get_post_type($bc_post)) : null;
        $bc_anc    = ($bc_post && isset($bc_post->ID)) ? array_reverse(get_post_ancestors($bc_post->ID)) : array();
        $bc_title  = $ee_custom_route_title ?: (($bc_post && isset($bc_post->ID)) ? get_the_title($bc_post->ID) : '');
        $bc_pos    = 1;
    ?>
    <nav class="ee-breadcrumb" aria-label="Breadcrumb">
        <div class="ee-bc-inner">
            <ol itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo esc_url(home_url('/')); ?>"><span itemprop="name">Home</span></a>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos++; ?>">
                </li>
                <?php foreach ($bc_anc as $a_id) : ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo esc_url(get_permalink($a_id)); ?>"><span itemprop="name"><?php echo esc_html(get_the_title($a_id)); ?></span></a>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos++; ?>">
                </li>
                <?php endforeach; ?>
                <?php
                /* Inject the landing-page hop for our 3 custom-listed CPTs.
                   has_archive is intentionally off for product / industry /
                   use_case (the landing pages are served by page-*.php), so
                   the default $bc_pt->has_archive branch below skips them.
                   Manual hop keeps "Home > Products > Education CRM",
                   "Home > Industries > Higher Education", "Home > Use Cases > Foo". */
                if ($bc_post && isset($bc_post->ID)) :
                    $cpt_landing = array(
                        'product'  => array('label' => 'Products',   'url' => '/products/'),
                        'industry' => array('label' => 'Industries', 'url' => '/industries/'),
                        'use_case' => array('label' => 'Use Cases',  'url' => '/use-cases/'),
                    );
                    $pt = get_post_type($bc_post);
                    if (isset($cpt_landing[$pt])) :
                        $land = $cpt_landing[$pt];
                ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo esc_url(home_url($land['url'])); ?>"><span itemprop="name"><?php echo esc_html($land['label']); ?></span></a>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos++; ?>">
                </li>
                <?php
                    endif;
                endif;
                ?>
                <?php if ($bc_pt && $bc_pt->has_archive) : ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo esc_url(get_post_type_archive_link($bc_pt->name)); ?>"><span itemprop="name"><?php echo esc_html($bc_pt->labels->name); ?></span></a>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos++; ?>">
                </li>
                <?php endif; ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
                    <span class="ee-bc-current" itemprop="name"><?php echo esc_html($bc_title); ?></span>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos; ?>">
                </li>
            </ol>
        </div>
    </nav>
    <?php endif; ?>

    <script>
        // Render Lucide icons (retry if not loaded yet)
        function renderIcons(){
            if (window.lucide && typeof window.lucide.createIcons === 'function') {
                window.lucide.createIcons();
            } else {
                setTimeout(renderIcons, 100);
            }
        }
        renderIcons();

        // Mobile Menu Toggle
        const openBtn = document.getElementById('openMobileBtn');
        const closeBtn = document.getElementById('closeMobileBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (openBtn) openBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            openBtn.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        });

        if (closeBtn) closeBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            if (openBtn) openBtn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = 'auto';
        });

        // Mobile Accordion Logic
        function toggleAccordion(btn) {
            const item = btn.parentElement;
            const wasActive = item.classList.contains('active');
            document.querySelectorAll('.mobile-accordion-item').forEach(el => {
                if (el !== item) {
                    el.classList.remove('active');
                    const b = el.querySelector('button[aria-expanded]'); if (b) b.setAttribute('aria-expanded', 'false');
                }
            });
            item.classList.toggle('active');
            btn.setAttribute('aria-expanded', wasActive ? 'false' : 'true');
        }

        // Reveal animations on load
        window.addEventListener('load', () => {
            document.querySelectorAll('.reveal').forEach((el, i) => {
                setTimeout(() => el.classList.add('active'), i * 150);
            });
        });

        // Scroll Progress Bar
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = height > 0 ? (winScroll / height) * 100 : 0;
            const progressEl = document.getElementById('progress');
            if (progressEl) {
                progressEl.style.width = scrolled + '%';
                progressEl.setAttribute('aria-valuenow', Math.round(scrolled));
            }
        });

        // ───────── Sticky-fail guard ─────────
        // If some page-level CSS (typically `overflow:hidden` on an ancestor or
        // a transform on <body>) silently kills position:sticky, the header
        // visually disappears after the first scroll. We detect that and
        // promote the header to position:fixed so it stays usable.
        (function(){
            const header = document.getElementById('site-header');
            if (!header) return;

            // Measure once so the body padding shim fills the gap when fixed
            function setHeaderHeightVar() {
                document.documentElement.style.setProperty('--ee-header-h', header.offsetHeight + 'px');
            }
            setHeaderHeightVar();
            window.addEventListener('resize', setHeaderHeightVar);

            let lastTop = null;
            function check() {
                const rect = header.getBoundingClientRect();
                // Sticky behaviour means top stays at 0 when scrolled. If we
                // see top < 0 the header has scrolled away — sticky is broken.
                if (rect.top < -2 && !header.classList.contains('ee-force-fixed')) {
                    header.classList.add('ee-force-fixed');
                    document.body.classList.add('ee-header-fixed');
                    setHeaderHeightVar();
                }
                lastTop = rect.top;
            }
            // Initial check after layout settles
            requestAnimationFrame(check);
            window.addEventListener('scroll', check, { passive: true });
        })();
    </script>

<!-- Main content landmark — required so the skip-to-content link has a target and screen readers/SEO recognise the primary content area. Closed in footer.php. -->
<main id="main-content" role="main">
