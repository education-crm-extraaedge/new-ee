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
    $ee_robots_meta   = 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';
    $ee_tw_card_type  = 'summary_large_image';
    if ($ee_home_title) {
        add_filter('pre_get_document_title', function() use ($ee_home_title) { return $ee_home_title; }, 99);
    }
} else {
    $ee_og_title = $ee_og_desc = $ee_tw_title = $ee_tw_desc = $ee_tw_image = $ee_meta_keywords = '';
    $ee_robots_meta  = 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1';
    $ee_tw_card_type = 'summary_large_image';
    /* Single-post overrides set in the "🔍 Blog SEO & Social Meta"
       meta box on the post edit screen. Every field falls back to
       the sensible auto-default so leaving a blank is harmless. */
    if ($ee_is_singular) {
        $pm_og_title  = get_post_meta($ee_post_id, '_og_title',           true);
        $pm_og_desc   = get_post_meta($ee_post_id, '_og_description',     true);
        $pm_tw_title  = get_post_meta($ee_post_id, '_twitter_title',      true);
        $pm_tw_desc   = get_post_meta($ee_post_id, '_twitter_description',true);
        $pm_tw_image  = get_post_meta($ee_post_id, '_twitter_image',      true);
        $pm_keywords  = get_post_meta($ee_post_id, '_seo_keywords',       true);
        $pm_robots    = get_post_meta($ee_post_id, '_robots',             true);
        $pm_tw_card   = get_post_meta($ee_post_id, '_twitter_card',       true);
        if ($pm_og_title)  $ee_og_title      = $pm_og_title;
        if ($pm_og_desc)   $ee_og_desc       = $pm_og_desc;
        if ($pm_tw_title)  $ee_tw_title      = $pm_tw_title;
        if ($pm_tw_desc)   $ee_tw_desc       = $pm_tw_desc;
        if ($pm_tw_image)  $ee_tw_image      = $pm_tw_image;
        if ($pm_keywords)  $ee_meta_keywords = $pm_keywords;
        if ($pm_robots)    $ee_robots_meta   = $pm_robots . ', max-snippet:-1, max-image-preview:large, max-video-preview:-1';
        if ($pm_tw_card)   $ee_tw_card_type  = $pm_tw_card;
    }
}

/* ── Bullet-proof page title ──
   Resolve the <title> string ourselves so the page always has a
   non-empty title regardless of filter-chain quirks or third-party
   plugins. Order of precedence:
     1. Singular post: _seo_title meta if set
     2. Singular post: WP-default document title (post title + sep + site)
     3. Singular post: raw post_title | site_name as a last resort
     4. Non-singular: wp_get_document_title()
   We then also strip the auto title-tag from wp_head so we don't end
   up with two <title> elements in the source. */
$ee_page_title = '';
if ($ee_is_singular) {
    $ee_page_title = (string) get_post_meta($ee_post_id, '_seo_title', true);
    if ($ee_page_title === '') {
        $ee_page_title = wp_get_document_title();
    }
    if ($ee_page_title === '') {
        $ee_raw_title = get_the_title($ee_post_id);
        if ($ee_raw_title !== '') {
            $ee_page_title = $ee_raw_title . ' | ' . $ee_site_name;
        }
    }
} elseif (!empty($ee_home_title)) {
    $ee_page_title = $ee_home_title;
} else {
    $ee_page_title = wp_get_document_title();
}
if ($ee_page_title === '') {
    $ee_page_title = $ee_site_name;
}
/* Avoid WordPress also emitting its own <title> tag. */
remove_action('wp_head', '_wp_render_title_tag', 1);
?><!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns# product: https://ogp.me/ns/product#">
<head>

    <!-- ─── 0. PAGE TITLE (manual — guaranteed non-empty) ─── -->
    <title><?php echo esc_html($ee_page_title); ?></title>
    <meta name="title" content="<?php echo esc_attr($ee_page_title); ?>">

    <!-- ─── 1. BASE ─── -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ─── 2. PRIMARY SEO META (single source — works on every page) ─── -->
    <meta name="description" content="<?php echo esc_attr($ee_seo_desc); ?>">
    <?php if ($ee_meta_keywords) : ?>
    <meta name="keywords" content="<?php echo esc_attr($ee_meta_keywords); ?>">
    <?php endif; ?>
    <meta name="robots" content="<?php echo esc_attr($ee_robots_meta); ?>">
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
    <meta property="og:title"              content="<?php echo esc_attr($ee_og_title ?: $ee_page_title); ?>">
    <meta property="og:description"        content="<?php echo esc_attr($ee_og_desc ?: $ee_seo_desc); ?>">
    <meta property="og:url"                content="<?php echo esc_url($ee_canonical); ?>">
    <meta property="og:image"              content="<?php echo esc_url($ee_og_image); ?>">
    <meta property="og:image:secure_url"   content="<?php echo esc_url($ee_og_image); ?>">
    <meta property="og:image:width"        content="1200">
    <meta property="og:image:height"       content="630">
    <meta property="og:image:alt"          content="<?php echo esc_attr($ee_page_title); ?>">
    <meta property="og:site_name"          content="<?php echo esc_attr($ee_site_name); ?>">
    <meta property="og:locale"             content="en_IN">
    <?php if ($ee_is_singular) : ?>
    <meta property="article:published_time" content="<?php echo esc_attr(get_the_date('c', $ee_post_id)); ?>">
    <meta property="article:modified_time"  content="<?php echo esc_attr(get_the_modified_date('c', $ee_post_id)); ?>">
    <meta property="article:author"         content="<?php echo esc_attr($ee_site_name); ?>">
    <?php endif; ?>

    <!-- ─── 7. TWITTER CARD (mirrored — no signal split) ─── -->
    <meta name="twitter:card"        content="<?php echo esc_attr($ee_tw_card_type); ?>">
    <meta name="twitter:site"        content="@ExtraaEdge">
    <meta name="twitter:creator"     content="@ExtraaEdge">
    <meta name="twitter:title"       content="<?php echo esc_attr($ee_tw_title ?: $ee_page_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($ee_tw_desc ?: $ee_seo_desc); ?>">
    <meta name="twitter:image"       content="<?php echo esc_url($ee_tw_image ?: $ee_og_image); ?>">
    <meta name="twitter:image:alt"   content="<?php echo esc_attr($ee_tw_title ?: $ee_page_title); ?>">

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
        /* preserved scroll progress + skip-link styles */
        .skip-to-content { position:absolute; top:-100%; left:0; background:#DE6E30; color:#fff; font-weight:700; padding:.75rem 1.5rem; border-radius:0 0 8px 0; text-decoration:none; z-index:9999; transition:top .2s; }
        .skip-to-content:focus { top:0; }
        #progress { position:fixed; top:0; left:0; height:3px; background:linear-gradient(90deg,#DE6E30,#19335D); z-index:2000; width:0%; }

        /* ════════════════════════════════════════════════════════════
           ADVANCED MULTI-LEVEL NAVIGATION — scoped to #site-header
           User-supplied design adapted for WordPress with custom SVGs.
           Mobile (<1024px) hides this entire bar and shows the existing
           slide-in #mobileMenu panel preserved at the bottom. */
        #site-header {
            --eh-primary: #19335D;
            --eh-primary-dark: #0F2040;
            --eh-primary-light: #2A4C7A;
            --eh-accent: #DE6E30;
            --eh-accent-hover: #B85920;
            --eh-success: #10B981;
            --eh-warning: #F59E0B;
            --eh-danger: #EF4444;
            /* Softer typography palette — nav text no longer reads as harsh black.
               --eh-text-dark   #475569 = slate-600  (nav links + titles at rest)
               --eh-text-strong #1E293B = slate-800  (high-emphasis hover states)
               --eh-text-light  #94A3B8 = slate-400  (descriptions, captions) */
            --eh-text-dark:   #475569;
            --eh-text-strong: #1E293B;
            --eh-text-light:  #94A3B8;
            --eh-bg-light: #FFFFFF;
            --eh-bg-subtle: #F8FAFC;
            --eh-border: #E5E7EB;
            --eh-border-light: #F3F4F6;
            --eh-shadow-sm: 0 2px 8px rgba(25,51,93,.06);
            --eh-shadow-md: 0 8px 24px rgba(25,51,93,.12);
            --eh-shadow-lg: 0 16px 48px rgba(25,51,93,.16);
            --eh-shadow-xl: 0 24px 64px rgba(25,51,93,.20);
            background: #fff;
            border-bottom: 1px solid var(--eh-border);
            box-shadow: var(--eh-shadow-sm);
            font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            transition: all .3s cubic-bezier(.4,0,.2,1);
        }
        #site-header.scrolled { box-shadow: var(--eh-shadow-md); }
        #site-header { transition: transform .3s cubic-bezier(.4,0,.2,1), box-shadow .25s ease, background .25s ease; will-change: transform; }
        #site-header.eh-hidden { transform: translateY(-110%); box-shadow: none; }

        #site-header .eh-content { max-width:1280px; margin:0 auto; padding:0 1.25rem; display:flex; align-items:center; justify-content:space-between; gap:.75rem; height:72px; }

        /* Logo */
        #site-header .eh-logo { display:flex; align-items:center; gap:.65rem; text-decoration:none; flex-shrink:0; transition:transform .3s ease; }
        #site-header .eh-logo:hover { transform:translateY(-2px); }
        #site-header .eh-logo img { height:34px; width:auto; }

        /* SVG icon wrapper — replaces FontAwesome <i> tags */
        #site-header .eh-svg { width:1em; height:1em; display:inline-block; vertical-align:-.125em; object-fit:contain; }

        /* Navigation */
        #site-header .eh-nav { display:flex; align-items:center; gap:.15rem; }
        #site-header .eh-nav-item { position:relative; }
        #site-header .eh-nav-link { display:flex; align-items:center; gap:.35rem; padding:.55rem .85rem; color:#19335D; text-decoration:none; font-weight:600; font-size:.9rem; letter-spacing:.005em; border-radius:8px; transition:color .18s ease, background .18s ease; cursor:pointer; background:transparent; border:none; font-family:inherit; position:relative; }
        #site-header .eh-nav-link:hover { background:#FFF3EC; color:#DE6E30; }
        #site-header .eh-nav-link.active { background:#FFF3EC; color:#DE6E30; }
        #site-header .eh-nav-link.active::after,
        #site-header .eh-nav-item:hover > .eh-nav-link::after {
            content: "";
            position: absolute;
            left: 14px; right: 14px; bottom: -6px;
            height: 2px;
            background: #DE6E30;
            border-radius: 2px;
        }
        #site-header .eh-nav-link .eh-chev { width:12px; height:12px; transition:transform .25s ease; }
        #site-header .eh-nav-item:hover .eh-nav-link .eh-chev { transform:rotate(180deg); }

        /* Standard dropdown */
        #site-header .eh-dropdown { position:absolute; top:calc(100% + .35rem); left:0; background:#fff; border:1px solid var(--eh-border); border-radius:11px; box-shadow:var(--eh-shadow-lg); min-width:260px; opacity:0; visibility:hidden; transform:translateY(-8px); transition:all .22s cubic-bezier(.4,0,.2,1); padding:.5rem; z-index:100; }
        #site-header .eh-nav-item:hover > .eh-dropdown { opacity:1; visibility:visible; transform:translateY(0); }

        /* Mega menu */
        #site-header .eh-mega { position:absolute; top:calc(100% + .35rem); left:50%; transform:translateX(-50%) translateY(-8px); background:#fff; border:1px solid var(--eh-border); border-radius:14px; box-shadow:var(--eh-shadow-xl); width:880px; max-width:95vw; opacity:0; visibility:hidden; transition:all .25s cubic-bezier(.4,0,.2,1); padding:1.1rem; z-index:100; }
        #site-header .eh-nav-item:hover .eh-mega { opacity:1; visibility:visible; transform:translateX(-50%) translateY(0); }
        #site-header .eh-mega-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:.75rem; }
        #site-header .eh-mega-grid.three-col { grid-template-columns:repeat(3,1fr); }
        #site-header .eh-mega-col h4,
        #site-header .eh-mega-col .eh-col-title { font-family:'Archivo',sans-serif; font-size:.65rem; font-weight:600; color:#94A3B8; text-transform:uppercase; letter-spacing:.08em; margin-bottom:.55rem; display:flex; align-items:center; gap:.4rem; }
        #site-header .eh-col-icon { width:16px; height:16px; background:linear-gradient(135deg,var(--eh-primary-light),var(--eh-accent)); border-radius:5px; display:inline-flex; align-items:center; justify-content:center; padding:3px; color:#fff; }
        #site-header .eh-col-icon .eh-svg { width:100%; height:100%; filter:brightness(0) invert(1); }

        /* Featured promo strip */
        #site-header .eh-featured { grid-column:span 4; background:linear-gradient(135deg,var(--eh-primary),var(--eh-primary-light)); border-radius:10px; padding:.85rem 1.1rem; color:#fff; margin-bottom:.65rem; display:flex; align-items:center; justify-content:space-between; gap:.85rem; flex-wrap:wrap; }
        #site-header .eh-featured.three-col { grid-column:span 3; }
        #site-header .eh-featured h3,
        #site-header .eh-featured .eh-featured-title { font-family:'Archivo',sans-serif; font-size:.92rem; font-weight:800; margin-bottom:.15rem; color:#fff; display:flex; align-items:center; gap:.4rem; line-height:1.3; }
        #site-header .eh-featured h3 .eh-svg,
        #site-header .eh-featured .eh-featured-title .eh-svg { width:.95rem; height:.95rem; filter:brightness(0) invert(1); }
        #site-header .eh-featured p { opacity:.9; font-size:.75rem; margin-bottom:.5rem; max-width:520px; color:#fff; line-height:1.45; }
        #site-header .eh-featured-btn { background:#fff; color:var(--eh-primary); padding:.4rem .9rem; border-radius:7px; text-decoration:none; font-weight:600; font-size:.78rem; display:inline-flex; align-items:center; gap:.35rem; transition:all .2s ease; }
        #site-header .eh-featured-btn:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(255,255,255,.3); color:var(--eh-primary); }
        #site-header .eh-featured-visual { width:54px; height:54px; background:rgba(255,255,255,.15); border-radius:9px; display:flex; align-items:center; justify-content:center; backdrop-filter:blur(10px); padding:9px; flex-shrink:0; }
        #site-header .eh-featured-visual .eh-svg { width:100%; height:100%; filter:brightness(0) invert(1); }

        /* Dropdown link rows */
        #site-header .eh-dl { display:flex; align-items:flex-start; gap:.55rem; padding:.42rem .5rem; color:var(--eh-text-dark); text-decoration:none; border-radius:7px; transition:all .15s ease; margin-bottom:.1rem; position:relative; }
        #site-header .eh-dl:hover { background:#F8FAFC; transform:translateX(2px); }
        #site-header .eh-dl:hover .eh-dl-title { color:#19335D; }
        #site-header .eh-dl:hover .eh-dl-desc  { color:#64748B; }
        #site-header .eh-dl-icon { width:28px; height:28px; background:linear-gradient(135deg,var(--eh-bg-subtle),#E8EEF3); border-radius:7px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:.9rem; padding:4px; transition:all .2s ease; color:var(--eh-primary); overflow:hidden; }
        #site-header .eh-dl-icon .eh-svg { width:100%; height:100%; }
        #site-header .eh-dl:hover .eh-dl-icon { background:linear-gradient(135deg,var(--eh-primary),var(--eh-accent)); transform:scale(1.05); }
        #site-header .eh-dl:hover .eh-dl-icon .eh-svg { filter:brightness(0) invert(1); }
        #site-header .eh-dl-content { flex:1; }
        #site-header .eh-dl-title { font-weight:600; font-size:.8rem; color:#334155; margin-bottom:.1rem; display:flex; align-items:center; gap:.3rem; line-height:1.25; }
        #site-header .eh-dl-desc { font-size:.7rem; color:#94A3B8; line-height:1.4; }

        /* Badges */
        #site-header .eh-badge { font-size:.65rem; font-weight:700; padding:.15rem .45rem; border-radius:4px; text-transform:uppercase; letter-spacing:.02em; line-height:1.2; }
        #site-header .eh-badge.new      { background:var(--eh-success); color:#fff; }
        #site-header .eh-badge.popular  { background:var(--eh-accent);  color:#fff; }
        #site-header .eh-badge.trending { background:var(--eh-warning); color:#fff; }
        #site-header .eh-badge.hot      { background:var(--eh-accent);  color:#fff; animation:eh-pulse 2s infinite; }
        @keyframes eh-pulse { 0%,100%{transform:scale(1);} 50%{transform:scale(1.05);} }

        /* Nested dropdown */
        #site-header .eh-nested { position:absolute; left:100%; top:0; margin-left:.5rem; min-width:280px; background:#fff; border:1px solid var(--eh-border); border-radius:12px; box-shadow:var(--eh-shadow-lg); padding:.75rem; opacity:0; visibility:hidden; transform:translateX(-10px); transition:all .3s cubic-bezier(.4,0,.2,1); }
        #site-header .eh-dl:hover .eh-nested { opacity:1; visibility:visible; transform:translateX(0); }
        #site-header .eh-nested-indicator { margin-left:auto; opacity:.5; }

        /* Divider */
        #site-header .eh-divider { height:1px; background:var(--eh-border); margin:.75rem 0; }

        /* Quick links — high-contrast hover that never goes invisible:
           rest = white tile + dark text, hover = cream tile + orange text
           with an orange ring. Text colour stays readable, icon keeps its
           native colours, no opacity / no large transform so the link
           cannot be clipped by any ancestor overflow. */
        #site-header .eh-quick { background:var(--eh-bg-subtle); border-radius:9px; padding:.65rem .75rem; margin-top:.5rem; }
        #site-header .eh-quick-title { font-size:.66rem; font-weight:700; color:var(--eh-text-light); text-transform:uppercase; letter-spacing:.05em; margin-bottom:.45rem; }
        #site-header .eh-quick-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:.4rem; }
        #site-header .eh-quick-link {
            display: flex;
            align-items: center;
            gap: .4rem;
            padding: .45rem .55rem;
            background: #fff;
            border: 1px solid var(--eh-border-light);
            border-radius: 6px;
            text-decoration: none;
            color: var(--eh-text-dark) !important;
            font-size: .72rem;
            font-weight: 600;
            transition: background .2s ease, border-color .2s ease, color .2s ease, box-shadow .2s ease;
        }
        #site-header .eh-quick-link .eh-svg {
            width: .9rem;
            height: .9rem;
            flex-shrink: 0;
            opacity: 1 !important;
        }
        #site-header .eh-quick-link:hover,
        #site-header .eh-quick-link:focus-visible {
            background: #fff7f0;
            border-color: rgba(222, 110, 48, 0.45);
            color: var(--eh-accent) !important;
            box-shadow: 0 4px 12px rgba(222, 110, 48, 0.18);
        }
        #site-header .eh-quick-link:hover .eh-svg,
        #site-header .eh-quick-link:focus-visible .eh-svg {
            filter: none;
            transform: scale(1.06);
        }

        /* CTA button */
        #site-header .eh-cta { background:linear-gradient(135deg,var(--eh-accent),#FF8A5C); color:#fff; padding:.55rem 1.2rem; border-radius:9px; text-decoration:none; font-weight:600; font-size:.82rem; display:inline-flex; align-items:center; gap:.4rem; transition:all .3s ease; box-shadow:0 4px 14px rgba(222,110,48,.25); border:none; cursor:pointer; flex-shrink:0; }
        #site-header .eh-cta:hover { background:linear-gradient(135deg,var(--eh-accent-hover),#C75E24); color:#fff; transform:translateY(-2px); box-shadow:0 6px 22px rgba(222,110,48,.35); }

        /* Responsive */
        @media (max-width:1280px){
            #site-header .eh-content { max-width:1200px; }
            #site-header .eh-mega { width:780px; }
            #site-header .eh-mega-grid { grid-template-columns:repeat(3,1fr); }
            #site-header .eh-featured { grid-column:span 3; }
            #site-header .eh-quick-grid { grid-template-columns:repeat(3,1fr); }
        }
        @media (max-width:1100px){
            #site-header .eh-nav-link { padding:.45rem .55rem; font-size:.8rem; }
            #site-header .eh-mega { width:640px; }
            #site-header .eh-mega-grid { grid-template-columns:repeat(2,1fr); }
            #site-header .eh-featured { grid-column:span 2; }
            #site-header .eh-quick-grid { grid-template-columns:repeat(2,1fr); }
        }
        @media (max-width:1023.98px){
            #site-header .eh-nav, #site-header .eh-cta { display:none; }
        }
        @media (min-width:1024px){
            #site-header .ee-mobile-btn { display:none !important; }
        }
        @media (max-width:768px){
            #site-header .eh-content { height:75px; padding:0 1rem; }
        }

        /* Animations */
        @keyframes eh-fadeInUp { from { opacity:0; transform:translateY(20px);} to { opacity:1; transform:translateY(0);} }
        #site-header .eh-dl { animation: eh-fadeInUp .3s ease backwards; }
        #site-header .eh-dl:nth-child(1) { animation-delay:.05s; }
        #site-header .eh-dl:nth-child(2) { animation-delay:.10s; }
        #site-header .eh-dl:nth-child(3) { animation-delay:.15s; }
        #site-header .eh-dl:nth-child(4) { animation-delay:.20s; }
        #site-header .eh-dl:nth-child(5) { animation-delay:.25s; }
        #site-header .eh-dl:nth-child(6) { animation-delay:.30s; }

        /* ═════════════ Breadcrumb (single posts + custom landings) ═════════════ */
        .ee-breadcrumb {
            background: #f8fafc;
            padding: 10px 0;
            font-family: 'DM Sans', 'Inter', sans-serif;
            font-size: 13px;
            border-bottom: 1px solid rgba(25, 51, 93, 0.06);
        }
        .ee-breadcrumb .ee-bc-inner {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
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
            color: #94a3b8;
            font-weight: 500;
        }
        .ee-breadcrumb li + li::before {
            content: "›";
            color: #cbd5e1;
            margin-right: 2px;
            font-size: 15px;
            line-height: 1;
        }
        .ee-breadcrumb a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: color .2s ease;
        }
        .ee-breadcrumb a:hover { color: #DE6E30; }
        .ee-breadcrumb .ee-bc-current {
            color: #DE6E30;
            font-weight: 700;
        }
        @media (max-width: 768px) {
            .ee-breadcrumb { padding: 8px 0; font-size: 12px; }
            .ee-breadcrumb .ee-bc-inner { padding: 0 1rem; }
        }

        /* ═════════════ Mobile slide-in menu (restored) ═════════════
           This is the existing slide-in panel preserved 1:1 from the
           old design. The desktop rewrite stripped these rules — the
           HTML is still in place below, just needs its styling back. */
        .menu-title { display: block; line-height: 1.25; font-family: 'Plus Jakarta Sans', 'DM Sans', sans-serif; }

        #mobileMenu {
            background: rgba(255, 255, 255, 0.98);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #mobileMenu.active { transform: translateX(0); }

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
        .m-icon-card .m-ico:has(img) { background: #fff; }
        .m-icon-card:hover .m-ico:has(img),
        .m-icon-card:active .m-ico:has(img) {
            background: #fff7f0;
            border-color: rgba(222, 110, 48, 0.35);
        }
        .m-icon-card .m-ico svg { width: 16px; height: 16px; }
        .m-icon-card .m-text { flex: 1; min-width: 0; }
        .m-icon-card .menu-title {
            font-family: 'Plus Jakarta Sans', 'DM Sans', sans-serif;
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
            line-height: 1.35;
        }

        /* Mobile hamburger button — visible on <1024 only */
        @media (max-width: 1023.98px) {
            #site-header .ee-mobile-btn {
                display: inline-flex !important;
                align-items: center;
                justify-content: center;
                padding: 10px;
                background: transparent;
                border: 0;
                color: #19335D;
                cursor: pointer;
                border-radius: 8px;
                margin-left: auto;
            }
            #site-header .ee-mobile-btn:hover { background: #F3F4F6; }
            #site-header .ee-mobile-btn svg,
            #site-header .ee-mobile-btn i[data-lucide] { width: 24px; height: 24px; color: #19335D; }
        }

        /* Tailwind utility shims used inside the mobile menu HTML
           (these are real Tailwind classes — fallback values in case the
           Tailwind CDN script is blocked or slow). */
        .lg\:hidden { display: inline-flex; }
        @media (min-width: 1024px) { .lg\:hidden { display: none; } }
        .lg\:flex   { display: none; }
        @media (min-width: 1024px) { .lg\:flex   { display: flex; } }
        #mobileMenu.fixed { position: fixed; }
        #mobileMenu.top-0 { top: 0; }
        #mobileMenu.right-0 { right: 0; }
        #mobileMenu.h-full { height: 100vh; }
        #mobileMenu.shadow-2xl { box-shadow: -20px 0 40px rgba(0,0,0,.15); }
        #mobileMenu.flex { display: flex; }
        #mobileMenu.flex-col { flex-direction: column; }
        #mobileMenu .w-\[85\%\] { width: 85%; }
        #mobileMenu .max-w-\[360px\] { max-width: 360px; }
        #mobileMenu.z-\[1100\] { z-index: 1100; }
        /* Common Tailwind layout utilities inside the mobile menu */
        #mobileMenu .p-6 { padding: 1.5rem; }
        #mobileMenu .p-5 { padding: 1.25rem; }
        #mobileMenu .p-4 { padding: 1rem; }
        #mobileMenu .px-4 { padding-left: 1rem; padding-right: 1rem; }
        #mobileMenu .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
        #mobileMenu .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        #mobileMenu .gap-2 { gap: 0.5rem; }
        #mobileMenu .space-y-4 > * + * { margin-top: 1rem; }
        #mobileMenu .space-y-2 > * + * { margin-top: 0.5rem; }
        #mobileMenu .flex-1 { flex: 1; }
        #mobileMenu .overflow-y-auto { overflow-y: auto; }
        #mobileMenu .bg-white { background: #fff; }
        #mobileMenu .bg-slate-50 { background: #f8fafc; }
        #mobileMenu .bg-brandBlue { background: #19335D; }
        #mobileMenu .text-white { color: #fff; }
        #mobileMenu .text-brandBlue { color: #19335D; }
        #mobileMenu .text-brandOrange { color: #DE6E30; }
        #mobileMenu .font-bold { font-weight: 700; }
        #mobileMenu .rounded-2xl { border-radius: 16px; }
        #mobileMenu .rounded-xl { border-radius: 12px; }
        #mobileMenu .rounded-full { border-radius: 9999px; }
        #mobileMenu .border { border: 1px solid; }
        #mobileMenu .border-b { border-bottom: 1px solid; }
        #mobileMenu .border-t { border-top: 1px solid; }
        #mobileMenu .border-slate-100 { border-color: #f1f5f9; }
        #mobileMenu .border-slate-200 { border-color: #e2e8f0; }
        #mobileMenu .bg-slate-100 { background: #f1f5f9; }
        #mobileMenu .w-full { width: 100%; }
        #mobileMenu .w-4 { width: 16px; }
        #mobileMenu .h-4 { height: 16px; }
        #mobileMenu .w-5 { width: 20px; }
        #mobileMenu .h-5 { height: 20px; }
        #mobileMenu .h-8 { height: 32px; }
        #mobileMenu .flex { display: flex; }
        #mobileMenu .items-center { align-items: center; }
        #mobileMenu .justify-between { justify-content: space-between; }
        #mobileMenu .text-center { text-align: center; }
        #mobileMenu .overflow-hidden { overflow: hidden; }
        #mobileMenu .shadow-sm { box-shadow: 0 1px 2px rgba(0,0,0,.05); }
        #mobileMenu .shadow-lg { box-shadow: 0 10px 15px -3px rgba(25,51,93,.20); }
        #mobileMenu .transition-transform { transition: transform .25s ease; }
    </style>
    <!-- ─── Site Header (advanced multi-level nav, sticky) ─── -->
    <header id="site-header" role="banner" class="sticky top-0 z-[1000] w-full">
        <div class="eh-content">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="eh-logo" aria-label="<?php echo esc_attr($ee_site_name); ?>">
                <img src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg"
                     alt="<?php echo esc_attr($ee_site_name); ?>"
                     width="160" height="48" fetchpriority="high" decoding="async">
            </a>

            <nav class="eh-nav ee-desktop-nav" role="navigation" aria-label="Primary">

                <!-- Products Mega Menu — columns + badges set per-post in WP Admin -->
                <div class="eh-nav-item">
                    <a href="<?php echo esc_url(home_url('/products/')); ?>" class="eh-nav-link" role="button" aria-haspopup="true">Products
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-mega">
                        <?php
                        /* Group every Product CPT post into one of four
                           columns based on its "Menu Column" meta value.
                           The non-coder picks the column from the dropdown
                           in WP Admin → Products → edit any post → 🏷 Product
                           Card Settings. Posts with column = "hidden" are
                           skipped here but still show on /products/. */
                        $eh_products_all = function_exists('ee_get_product_menu_items') ? ee_get_product_menu_items() : array();
                        $eh_cols = array(
                            'featured'      => array('label' => 'Featured',      'icon' => 'star'),
                            'core'          => array('label' => 'Core CRM',      'icon' => 'bullseye'),
                            'communication' => array('label' => 'Communication', 'icon' => 'comments'),
                            'automation'    => array('label' => 'Automation',    'icon' => 'bolt'),
                        );
                        $eh_groups = array('featured'=>array(),'core'=>array(),'communication'=>array(),'automation'=>array());
                        foreach ($eh_products_all as $eh_p) {
                            $col = isset($eh_p['column']) ? $eh_p['column'] : 'featured';
                            if ($col === 'hidden' || !isset($eh_groups[$col])) continue;
                            $eh_groups[$col][] = $eh_p;
                        }
                        ?>
                        <div class="eh-mega-grid">
                            <?php
                            /* Featured promo strip — content editable from
                               WP Admin → 🛍 Products Menu. Skipped entirely
                               when the "Show this promo" checkbox is off. */
                            $eh_promo = function_exists('ee_get_products_promo') ? ee_get_products_promo() : array('enabled' => '1');
                            if (!empty($eh_promo['enabled']) && $eh_promo['enabled'] !== '0') :
                                $eh_promo_btn_external = ($eh_promo['btn_url'] && (strpos($eh_promo['btn_url'], 'http') === 0) && strpos($eh_promo['btn_url'], home_url()) !== 0);
                            ?>
                            <div class="eh-featured">
                                <div>
                                    <div class="eh-featured-title">
                                        <img class="eh-svg" src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/rocket.svg'); ?>" alt="" loading="lazy">
                                        <?php if (!empty($eh_promo['badge'])) : ?><?php echo esc_html($eh_promo['badge']); ?>: <?php endif; ?><?php echo esc_html($eh_promo['title']); ?>
                                    </div>
                                    <?php if (!empty($eh_promo['desc'])) : ?><p><?php echo esc_html($eh_promo['desc']); ?></p><?php endif; ?>
                                    <?php if (!empty($eh_promo['btn_text']) && !empty($eh_promo['btn_url'])) : ?>
                                    <a href="<?php echo esc_url($eh_promo['btn_url']); ?>" class="eh-featured-btn"<?php echo $eh_promo_btn_external ? ' target="_blank" rel="noopener"' : ''; ?>>
                                        <?php echo esc_html($eh_promo['btn_text']); ?>
                                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <div class="eh-featured-visual"><img class="eh-svg" src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . ($eh_promo['visual_icon'] ?: 'robot') . '.svg'); ?>" alt="" loading="lazy"></div>
                            </div>
                            <?php endif; ?>

                            <?php foreach ($eh_cols as $eh_col_key => $eh_col_meta) :
                                $eh_col_items = $eh_groups[$eh_col_key];
                                if (empty($eh_col_items)) continue; /* skip column if no products assigned */
                            ?>
                            <div class="eh-mega-col">
                                <div class="eh-col-title"><span class="eh-col-icon"><img class="eh-svg" src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $eh_col_meta['icon'] . '.svg'); ?>" alt="" loading="lazy"></span> <?php echo esc_html($eh_col_meta['label']); ?></div>
                                <?php foreach ($eh_col_items as $eh_p) :
                                    $eh_short = wp_trim_words(wp_strip_all_tags((string) $eh_p['desc']), 9, '…');
                                    $eh_badge = isset($eh_p['badge']) ? $eh_p['badge'] : 'none';
                                ?>
                                <a href="<?php echo esc_url($eh_p['url']); ?>" class="eh-dl">
                                    <div class="eh-dl-icon">
                                        <?php if (!empty($eh_p['icon'])) : ?>
                                            <img class="eh-svg" src="<?php echo esc_url($eh_p['icon']); ?>" alt="" loading="lazy">
                                        <?php else : ?>
                                            <img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/chart-bar.svg" alt="" loading="lazy">
                                        <?php endif; ?>
                                    </div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">
                                            <?php echo esc_html($eh_p['title']); ?>
                                            <?php if ($eh_badge && $eh_badge !== 'none') : ?>
                                                <span class="eh-badge <?php echo esc_attr($eh_badge); ?>"><?php echo esc_html(ucfirst($eh_badge)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="eh-dl-desc"><?php echo esc_html($eh_short); ?></div>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <?php
                        /* Quick Access chips — all rows editable from WP
                           Admin → 🛍 Products Menu. Skipped entirely when
                           the editor removes every row. */
                        $eh_qlinks = function_exists('ee_get_products_quick_links') ? ee_get_products_quick_links() : array();
                        if (!empty($eh_qlinks)) :
                        ?>
                        <div class="eh-quick">
                            <div class="eh-quick-title">⚡ Quick Access</div>
                            <div class="eh-quick-grid">
                                <?php foreach ($eh_qlinks as $eh_ql) :
                                    $eh_qurl = !empty($eh_ql['url']) ? $eh_ql['url'] : '#';
                                    if (strpos($eh_qurl, 'http') !== 0 && strpos($eh_qurl, '//') !== 0 && strpos($eh_qurl, '#') !== 0) {
                                        $eh_qurl = home_url($eh_qurl);
                                    }
                                    $eh_qicon   = !empty($eh_ql['icon']) ? $eh_ql['icon'] : 'star';
                                    $eh_qext    = isset($eh_ql['target']) && $eh_ql['target'] === '_blank';
                                ?>
                                <a href="<?php echo esc_url($eh_qurl); ?>" class="eh-quick-link"<?php echo $eh_qext ? ' target="_blank" rel="noopener"' : ''; ?>>
                                    <img class="eh-svg" src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $eh_qicon . '.svg'); ?>" alt="" loading="lazy">
                                    <?php echo esc_html($eh_ql['label']); ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Solutions Mega Menu — auto-fills from the 'ee_solution_items' option -->
                <div class="eh-nav-item">
                    <a href="#" class="eh-nav-link" role="button" aria-haspopup="true">Solutions
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-mega">
                        <?php
                        /* Solutions are managed in WP Admin -> 🧩 Solutions.
                           Three columns: Admission / Study Abroad / Recruitment.
                           Editor can add / edit / remove rows without touching code. */
                        $eh_sol     = function_exists('ee_get_solution_items') ? ee_get_solution_items() : array('admission'=>array(),'study_abroad'=>array(),'recruitment'=>array());
                        $eh_sol_cols = array(
                            'admission'    => array('label' => 'Admission Solutions',                  'icon' => 'graduation-cap'),
                            'study_abroad' => array('label' => 'Study Abroad',                         'icon' => 'globe-americas'),
                            'recruitment'  => array('label' => 'Recruitment &amp; Lead Management',    'icon' => 'bullseye'),
                        );
                        ?>
                        <div class="eh-mega-grid three-col">
                            <?php foreach ($eh_sol_cols as $eh_col_key => $eh_col_meta) :
                                $eh_col_items = isset($eh_sol[$eh_col_key]) ? $eh_sol[$eh_col_key] : array();
                            ?>
                            <div class="eh-mega-col">
                                <div class="eh-col-title"><span class="eh-col-icon"><img class="eh-svg" src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $eh_col_meta['icon'] . '.svg'); ?>" alt="" loading="lazy"></span> <?php echo wp_kses_post($eh_col_meta['label']); ?></div>
                                <?php foreach ($eh_col_items as $eh_s) :
                                    $eh_url  = !empty($eh_s['url'])  ? $eh_s['url']  : '#';
                                    if (strpos($eh_url, 'http') !== 0 && strpos($eh_url, '//') !== 0) {
                                        $eh_url = home_url($eh_url);
                                    }
                                    $eh_icon = !empty($eh_s['icon']) ? $eh_s['icon'] : 'star';
                                ?>
                                <a href="<?php echo esc_url($eh_url); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="<?php echo esc_url('https://www.extraaedge.com/wp-content/uploads/icons/' . $eh_icon . '.svg'); ?>" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title"><?php echo esc_html($eh_s['title']); ?></div>
                                        <?php if (!empty($eh_s['desc'])) : ?>
                                            <div class="eh-dl-desc"><?php echo esc_html($eh_s['desc']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Industries — auto-fills from Industry CPT -->
                <div class="eh-nav-item">
                    <a href="<?php echo esc_url(home_url('/industries/')); ?>" class="eh-nav-link">Industries
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-dropdown">
                        <?php
                        /* Every published Industry CPT post is listed here.
                           Add a new Industry in WP Admin -> it appears in
                           this dropdown, in the mobile menu, and on /industries/
                           automatically (all three share the same helper). */
                        $eh_industries = function_exists('ee_get_industry_menu_items') ? ee_get_industry_menu_items() : array();
                        foreach ($eh_industries as $eh_ind) :
                            $eh_short = wp_trim_words(wp_strip_all_tags((string) ($eh_ind['short_desc'] ?: $eh_ind['desc'])), 8, '…');
                        ?>
                        <a href="<?php echo esc_url($eh_ind['url']); ?>" class="eh-dl">
                            <div class="eh-dl-icon">
                                <?php if (!empty($eh_ind['icon'])) : ?>
                                    <img class="eh-svg" src="<?php echo esc_url($eh_ind['icon']); ?>" alt="" loading="lazy">
                                <?php else : ?>
                                    <img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/landmark.svg" alt="" loading="lazy">
                                <?php endif; ?>
                            </div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title"><?php echo esc_html($eh_ind['title']); ?></div>
                                <div class="eh-dl-desc"><?php echo esc_html($eh_short); ?></div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Resources -->
                <div class="eh-nav-item">
                    <a href="#" class="eh-nav-link" role="button" aria-haspopup="true">Resources
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-dropdown">
                        <?php
                        $ee_resources_items = function_exists('ee_get_resources_menu_items') ? ee_get_resources_menu_items() : array();
                        $ee_last = count($ee_resources_items) - 1;
                        foreach ($ee_resources_items as $ee_idx => $ee_it):
                            /* Show a thin divider before the last item (typically "Help Center") */
                            if ($ee_idx === $ee_last && $ee_last > 0): ?>
                                <div class="eh-divider"></div>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($ee_it['url'] ?? '#'); ?>" class="eh-dl">
                                <div class="eh-dl-icon">
                                    <?php if (!empty($ee_it['icon'])): ?>
                                        <img class="eh-svg" src="<?php echo esc_url($ee_it['icon']); ?>" alt="" loading="lazy">
                                    <?php endif; ?>
                                </div>
                                <div class="eh-dl-content">
                                    <div class="eh-dl-title"><?php echo esc_html($ee_it['title'] ?? ''); ?></div>
                                    <?php if (!empty($ee_it['desc'])): ?>
                                        <div class="eh-dl-desc"><?php echo esc_html($ee_it['desc']); ?></div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Company -->
                <div class="eh-nav-item">
                    <a href="#" class="eh-nav-link" role="button" aria-haspopup="true">Company
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-dropdown">
                        <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/info-circle.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">About ExtraaEdge</div>
                                <div class="eh-dl-desc">Our story &amp; mission</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/team/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/users.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Team</div>
                                <div class="eh-dl-desc">Find out more about the people helping your admissions teams win</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/careers/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/briefcase.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Careers <span class="eh-badge new">Hiring</span></div>
                                <div class="eh-dl-desc">Interested in working with us? Check out our open positions</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/investors-and-advisors/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/dollar-sign.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Investors &amp; Advisors</div>
                                <div class="eh-dl-desc">Learn more about people and organisations deeply aligned with our mission</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/customers/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/handshake.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Customers</div>
                                <div class="eh-dl-desc">Learn more about our happy customers from your segment</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/become-a-partner/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/handshake.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Become a Partner</div>
                                <div class="eh-dl-desc">Interested in partnering with us? Fill your details and we will get back</div>
                            </div>
                        </a>
                        <div class="eh-divider"></div>
                        <a href="<?php echo esc_url(home_url('/get-in-touch/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/envelope.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Contact Us</div>
                                <div class="eh-dl-desc">Get in touch</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/lock.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Privacy &amp; Legal</div>
                                <div class="eh-dl-desc">Policies &amp; terms</div>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- CTA -->
            <a href="<?php echo esc_url(home_url('/book-demo/')); ?>" class="eh-cta">Book Demo
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>

            <!-- Mobile hamburger — opens the existing slide-in #mobileMenu below -->
            <button id="openMobileBtn" class="lg:hidden p-2 text-brandBlue ee-mobile-btn" aria-label="Open mobile menu" aria-controls="mobileMenu" aria-expanded="false"><i data-lucide="menu" aria-hidden="true"></i></button>

        </div>
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
                   "Home > Industries > Higher Education", "Home > Use Cases > Foo".
                   Standard WordPress posts also land on /blog/, so we treat
                   them the same way → "Home > Blog > [Post Title]". */
                if ($bc_post && isset($bc_post->ID)) :
                    $cpt_landing = array(
                        'post'     => array('label' => 'Blog',       'url' => '/blog/'),
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

                /* Single-blog-post category hop. Inserted after the
                   Blog landing hop so the trail reads
                   "Home > Blog > [Category] > [Post Title]".
                   Uses the first assigned category (skipping the
                   default "Uncategorized" bucket). To control which
                   category wins on a multi-category post, just drag
                   it to the top of the Categories list in the post
                   editor — WordPress orders by term ID and we pick
                   the first one returned. */
                if ($bc_post && isset($bc_post->ID) && get_post_type($bc_post) === 'post') :
                    $primary_cat = null;
                    foreach ((array) get_the_category($bc_post->ID) as $c) {
                        if ($c->slug !== 'uncategorized') { $primary_cat = $c; break; }
                    }
                    if ($primary_cat) :
                        /* Pretty URL — matches the /blog/{slug}/ router
                           in functions.php. */
                        $cat_url = trailingslashit(home_url('/blog/' . $primary_cat->slug));
                ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo esc_url($cat_url); ?>"><span itemprop="name"><?php echo esc_html($primary_cat->name); ?></span></a>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos++; ?>">
                </li>
                <?php
                    endif;
                endif;

                /* Category archive (/category/{slug}/) → inject the Blog hop
                   so the trail reads "Home > Blog > [Category Name]". The
                   category.php template sets $GLOBALS['ee_blog_active_cat']
                   which is our signal that we're on a blog category page. */
                if (!empty($GLOBALS['ee_blog_active_cat'])) :
                ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo esc_url(home_url('/blog/')); ?>"><span itemprop="name">Blog</span></a>
                    <meta itemprop="position" content="<?php echo (int) $bc_pos++; ?>">
                </li>
                <?php endif; ?>
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

        /* ── Header scroll-shadow effect + auto-hide on scroll down ──
           On single blog posts the visitor wants maximum reading room,
           so the header slides up when scrolling DOWN past the hero
           and slides back into view the moment they scroll UP. Other
           page types keep the header sticky (just adds the scroll
           shadow). */
        (function(){
            var hdr = document.getElementById('site-header');
            if (!hdr) return;
            var isPost   = document.body.classList.contains('single-post') ||
                           document.body.classList.contains('ee-singular') &&
                           document.body.classList.contains('single');
            var lastY    = window.scrollY || 0;
            var ticking  = false;
            function onScroll(){
                var y = window.scrollY || 0;
                hdr.classList.toggle('scrolled', y > 50);
                /* Auto-hide only on long-form post pages where the
                   reader actively wants more room. */
                if (isPost) {
                    var goingDown = y > lastY;
                    var pastHero  = y > 240;
                    if (goingDown && pastHero) {
                        hdr.classList.add('eh-hidden');
                    } else {
                        hdr.classList.remove('eh-hidden');
                    }
                }
                lastY = y;
                ticking = false;
            }
            window.addEventListener('scroll', function(){
                if (!ticking) { requestAnimationFrame(onScroll); ticking = true; }
            }, { passive: true });
        })();

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
