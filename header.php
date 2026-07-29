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
 *  13. Fonts (Inter — site-wide design system)
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
$ee_canonical   = $ee_is_singular ? (get_post_meta($ee_post_id, '_canonical_url', true) ?: get_permalink($ee_post_id)) : ($ee_home_url . ltrim(strtok($_SERVER['REQUEST_URI'] ?? '', '?'), '/'));
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
/* Thin/utility pages must never compete in the index (crawl budget + dupes). */
if (is_search() || is_404()) $ee_robots_meta = 'noindex, follow';

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

    <!-- ─── SITE-WIDE 90% ZOOM (ee-site-zoom v2026-07-29-global) ───
         At browser 100% the whole site renders at 90% scale, site-wide.
         Belt-and-braces: the CSS rule alone could lose to a later
         stylesheet, so JS also force-sets an inline !important style on
         <body>, which no stylesheet can override. Uses zoom (not
         transform) because a transform on <body> silently kills
         position:sticky — see the sticky-header note further down. -->
    <style id="ee-site-zoom">body{zoom:.9 !important}</style>
    <script id="ee-site-zoom-js">
    (function () {
        function eeApplyZoom() {
            if (document.body) {
                document.body.style.setProperty('zoom', '0.9', 'important');
            }
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', eeApplyZoom);
        } else {
            eeApplyZoom();
        }
    })();
    </script>

    <!-- ─── DESIGN TOKENS (ee-design-tokens) ───
         Single source of truth for colour, type, space, radius, elevation
         and motion. New/refactored CSS must consume these instead of
         literals. Two-tier orange: #DE6E30 stays the identity colour for
         fills, icons, borders and large display text; --orange-700/800 are
         the text-safe shades (>=4.5:1 on white) for body-size orange text
         and CTA fills per WCAG 2.2 SC 1.4.3. -->
    <style id="ee-design-tokens">
    :root{
      /* Brand */
      --orange-500:#DE6E30; --orange-600:#C25F26; --orange-700:#B5551D;
      --orange-800:#A8501C; --orange-050:#FDF2EB;
      --navy-900:#0F2143; --navy-700:#19335D; --navy-500:#2E4A78; --navy-050:#EEF2F8;
      /* Neutral / text */
      --white:#FFFFFF; --surface:#F7F8FA; --border:#E2E6ED; --border-strong:#C9D1DE;
      --text-strong:#19335D; --text-body:#33415C; --text-muted:#5A6B85; --text-inverse:#FFFFFF;
      /* Semantic (>=4.5:1 on white) */
      --success:#147A50; --warning:#8A5A00; --error:#B3261E; --info:#1A5FB4;
      /* Focus */
      --focus-ring:#1A5FB4; --focus-width:3px; --focus-offset:2px;
      /* Type */
      --font:'Inter','Inter var',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;
      --fs-display:clamp(3rem,2rem + 5vw,4.5rem); --fs-h1:clamp(2.5rem,1.7rem + 3.2vw,4rem);
      --fs-h2:clamp(2rem,1.5rem + 1.8vw,3rem); --fs-h3:clamp(1.5rem,1.3rem + .9vw,2rem);
      --fs-h4:clamp(1.25rem,1.15rem + .4vw,1.5rem); --fs-h5:1.125rem;
      --fs-eyebrow:.875rem; --fs-body-lg:1.125rem; --fs-body:1rem;
      --fs-body-sm:.875rem; --fs-caption:.75rem;
      --lh-tight:1.08; --lh-heading:1.2; --lh-snug:1.4; --lh-body:1.65;
      --ls-display:-.03em; --ls-heading:-.015em; --ls-body:0; --ls-eyebrow:.08em;
      --fw-regular:400; --fw-medium:500; --fw-semibold:600; --fw-bold:700;
      /* Space: 4pt base */
      --s-1:4px; --s-2:8px; --s-3:12px; --s-4:16px; --s-5:24px; --s-6:32px;
      --s-7:40px; --s-8:48px; --s-9:64px; --s-10:80px; --s-11:96px; --s-12:120px;
      --section-y:clamp(64px,8vw,120px); --container:1200px;
      --gutter:clamp(20px,5vw,40px); --measure:68ch;
      /* Radius */
      --r-sm:8px; --r-md:12px; --r-lg:16px; --r-xl:24px; --r-pill:999px;
      /* Elevation: navy-tinted */
      --sh-sm:0 1px 2px rgba(25,51,93,.06); --sh-md:0 8px 24px rgba(25,51,93,.08);
      --sh-lg:0 20px 48px rgba(25,51,93,.10);
      /* Motion */
      --ease:cubic-bezier(.22,1,.36,1); --dur-fast:140ms; --dur:200ms; --dur-slow:320ms;
    }
    </style>

    <!-- ─── ACCESSIBILITY BASE LAYER (ee-a11y-layer) ───
         Site-wide WCAG 2.2 AA guarantees that individual sections cannot
         opt out of: an always-visible focus ring (SC 2.4.7 - several legacy
         rules set outline:none, the !important here restores it), anchor
         targets clearing the sticky header (SC 2.4.11), token-contrast
         placeholders (SC 1.4.3), a screen-reader-only utility, and the
         global reduced-motion kill-switch (SC 2.3.3). -->
    <style id="ee-a11y-layer">
    html{-webkit-text-size-adjust:100%;text-size-adjust:100%}
    *:focus-visible{outline:var(--focus-width) solid var(--focus-ring)!important;outline-offset:var(--focus-offset)!important}
    :where([id]){scroll-margin-block-start:96px}
    input::placeholder,textarea::placeholder{color:var(--text-muted)}
    .sr-only{position:absolute!important;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap;border:0}
    @media (prefers-reduced-motion:reduce){
      *,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important;scroll-behavior:auto!important}
    }
    </style>


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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- ─── 12. Tailwind for Layout & Utils — INLINED production build (no CDN) ─── -->
    <!-- Pre-compiled, minified Tailwind (theme.extend brandOrange/brandBlue + fonts
         baked in) inlined directly here: no render-blocking cdn.tailwindcss.com
         runtime and no external file path to 404. Rebuild after adding new utility
         classes:  npx tailwindcss@3 -c build-tmp/tailwind.config.js
           -i build-tmp/input.css -o assets/css/tailwind.min.css --minify  then re-inline. -->
    <style id="ee-tailwind">*,:after,:before{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/*! tailwindcss v3.4.19 | MIT License | https://tailwindcss.com*/*,:after,:before{box-sizing:border-box;border:0 solid #e5e7eb}:after,:before{--tw-content:""}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;-o-tab-size:4;tab-size:4;font-family:Inter,sans-serif;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0}fieldset,legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::-moz-placeholder,textarea::-moz-placeholder{opacity:1;color:#9ca3af}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.\!container{width:100%!important}.container{width:100%}@media (min-width:640px){.\!container{max-width:640px!important}.container{max-width:640px}}@media (min-width:768px){.\!container{max-width:768px!important}.container{max-width:768px}}@media (min-width:1024px){.\!container{max-width:1024px!important}.container{max-width:1024px}}@media (min-width:1280px){.\!container{max-width:1280px!important}.container{max-width:1280px}}@media (min-width:1536px){.\!container{max-width:1536px!important}.container{max-width:1536px}}.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0}.pointer-events-none{pointer-events:none}.\!visible{visibility:visible!important}.visible{visibility:visible}.invisible{visibility:hidden}.collapse{visibility:collapse}.static{position:static}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.sticky{position:sticky}.inset-0{inset:0}.-bottom-12{bottom:-3rem}.-bottom-2{bottom:-.5rem}.-left-12{left:-3rem}.-right-12{right:-3rem}.-right-4{right:-1rem}.-top-12{top:-3rem}.-top-4{top:-1rem}.bottom-\[-10\%\]{bottom:-10%}.left-0{left:0}.left-\[-10\%\]{left:-10%}.right-0{right:0}.right-4{right:1rem}.right-\[-10\%\]{right:-10%}.top-0{top:0}.top-1\/2{top:50%}.top-\[-10\%\]{top:-10%}.isolate{isolation:isolate}.z-10{z-index:10}.z-20{z-index:20}.z-30{z-index:30}.z-50{z-index:50}.z-\[1000\]{z-index:1000}.z-\[1100\]{z-index:1100}.order-1{order:1}.order-2{order:2}.col-span-2{grid-column:span 2/span 2}.-mx-4{margin-left:-1rem;margin-right:-1rem}.mx-auto{margin-left:auto;margin-right:auto}.mb-1{margin-bottom:.25rem}.mb-10{margin-bottom:2.5rem}.mb-12{margin-bottom:3rem}.mb-16{margin-bottom:4rem}.mb-2{margin-bottom:.5rem}.mb-20{margin-bottom:5rem}.mb-3{margin-bottom:.75rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.mb-8{margin-bottom:2rem}.ml-2{margin-left:.5rem}.ml-auto{margin-left:auto}.mt-0\.5{margin-top:.125rem}.mt-1{margin-top:.25rem}.mt-10{margin-top:2.5rem}.mt-2{margin-top:.5rem}.mt-20{margin-top:5rem}.mt-3{margin-top:.75rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.block{display:block}.inline-block{display:inline-block}.inline{display:inline}.flex{display:flex}.inline-flex{display:inline-flex}.table{display:table}.grid{display:grid}.contents{display:contents}.hidden{display:none}.aspect-\[4\/5\]{aspect-ratio:4/5}.h-1\.5{height:.375rem}.h-1\/2{height:50%}.h-10{height:2.5rem}.h-12{height:3rem}.h-14{height:3.5rem}.h-16{height:4rem}.h-2{height:.5rem}.h-2\.5{height:.625rem}.h-20{height:5rem}.h-24{height:6rem}.h-3{height:.75rem}.h-3\/4{height:75%}.h-4{height:1rem}.h-48{height:12rem}.h-5{height:1.25rem}.h-6{height:1.5rem}.h-64{height:16rem}.h-8{height:2rem}.h-\[240px\]{height:240px}.h-\[500px\]{height:500px}.h-\[550px\]{height:550px}.h-full{height:100%}.min-h-\[40px\]{min-height:40px}.min-h-\[550px\]{min-height:550px}.w-0{width:0}.w-1{width:.25rem}.w-1\.5{width:.375rem}.w-10{width:2.5rem}.w-12{width:3rem}.w-14{width:3.5rem}.w-16{width:4rem}.w-2{width:.5rem}.w-2\.5{width:.625rem}.w-20{width:5rem}.w-24{width:6rem}.w-3{width:.75rem}.w-4{width:1rem}.w-48{width:12rem}.w-5{width:1.25rem}.w-6{width:1.5rem}.w-8{width:2rem}.w-\[500px\]{width:500px}.w-\[85\%\]{width:85%}.w-full{width:100%}.max-w-3xl{max-width:48rem}.max-w-4xl{max-width:56rem}.max-w-7xl{max-width:80rem}.max-w-\[1440px\]{max-width:1440px}.max-w-\[360px\]{max-width:360px}.max-w-\[500px\]{max-width:500px}.max-w-\[80\%\]{max-width:80%}.max-w-\[85\%\]{max-width:85%}.max-w-\[90\%\]{max-width:90%}.max-w-lg{max-width:32rem}.max-w-md{max-width:28rem}.max-w-sm{max-width:24rem}.max-w-xl{max-width:36rem}.max-w-xs{max-width:20rem}.flex-1{flex:1 1 0%}.flex-\[2\]{flex:2}.flex-shrink,.shrink{flex-shrink:1}.shrink-0{flex-shrink:0}.flex-grow,.grow{flex-grow:1}.origin-left{transform-origin:left}.-translate-y-1\/2{--tw-translate-y:-50%}.-translate-y-1\/2,.rotate-3{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.rotate-3{--tw-rotate:3deg}.scale-100{--tw-scale-x:1;--tw-scale-y:1}.scale-100,.scale-110{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-110{--tw-scale-x:1.1;--tw-scale-y:1.1}.scale-125{--tw-scale-x:1.25;--tw-scale-y:1.25}.scale-125,.scale-95{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-95{--tw-scale-x:.95;--tw-scale-y:.95}.scale-\[1\.02\]{--tw-scale-x:1.02;--tw-scale-y:1.02}.scale-\[1\.02\],.scale-x-0{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-x-0{--tw-scale-x:0}.transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.animate-\[bounce_1\.5s_infinite\]{animation:bounce 1.5s infinite}.animate-\[bounce_1s_infinite\]{animation:bounce 1s infinite}@keyframes spin{to{transform:rotate(1turn)}}.animate-\[spin_8s_linear_infinite\]{animation:spin 8s linear infinite}@keyframes bounce{0%,to{transform:translateY(-25%);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:none;animation-timing-function:cubic-bezier(0,0,.2,1)}}.animate-bounce{animation:bounce 1s infinite}@keyframes ping{75%,to{transform:scale(2);opacity:0}}.animate-ping{animation:ping 1s cubic-bezier(0,0,.2,1) infinite}@keyframes pulse{50%{opacity:.5}}.animate-pulse{animation:pulse 2s cubic-bezier(.4,0,.6,1) infinite}.cursor-pointer{cursor:pointer}.resize{resize:both}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-start{align-items:flex-start}.items-end{align-items:flex-end}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.gap-1{gap:.25rem}.gap-1\.5{gap:.375rem}.gap-10{gap:2.5rem}.gap-12{gap:3rem}.gap-16{gap:4rem}.gap-2{gap:.5rem}.gap-3{gap:.75rem}.gap-4{gap:1rem}.gap-5{gap:1.25rem}.gap-6{gap:1.5rem}.gap-8{gap:2rem}.gap-x-8{-moz-column-gap:2rem;column-gap:2rem}.gap-y-4{row-gap:1rem}.-space-x-2>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(-.5rem*var(--tw-space-x-reverse));margin-left:calc(-.5rem*(1 - var(--tw-space-x-reverse)))}.-space-x-3>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(-.75rem*var(--tw-space-x-reverse));margin-left:calc(-.75rem*(1 - var(--tw-space-x-reverse)))}.space-x-1\.5>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(.375rem*var(--tw-space-x-reverse));margin-left:calc(.375rem*(1 - var(--tw-space-x-reverse)))}.space-x-2>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(.5rem*var(--tw-space-x-reverse));margin-left:calc(.5rem*(1 - var(--tw-space-x-reverse)))}.space-x-3>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(.75rem*var(--tw-space-x-reverse));margin-left:calc(.75rem*(1 - var(--tw-space-x-reverse)))}.space-x-4>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1rem*var(--tw-space-x-reverse));margin-left:calc(1rem*(1 - var(--tw-space-x-reverse)))}.space-y-2>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-top:calc(.5rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(.5rem*var(--tw-space-y-reverse))}.space-y-3>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-top:calc(.75rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(.75rem*var(--tw-space-y-reverse))}.space-y-4>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1rem*var(--tw-space-y-reverse))}.space-y-6>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1.5rem*(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1.5rem*var(--tw-space-y-reverse))}.self-end{align-self:flex-end}.overflow-hidden{overflow:hidden}.overflow-y-auto{overflow-y:auto}.rounded{border-radius:.25rem}.rounded-2xl{border-radius:1rem}.rounded-3xl{border-radius:1.5rem}.rounded-\[2\.5rem\]{border-radius:2.5rem}.rounded-\[24px\]{border-radius:24px}.rounded-\[32px\]{border-radius:32px}.rounded-\[3rem\]{border-radius:3rem}.rounded-\[40px\]{border-radius:40px}.rounded-\[48px\]{border-radius:48px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:.5rem}.rounded-xl{border-radius:.75rem}.rounded-t-lg{border-top-left-radius:.5rem;border-top-right-radius:.5rem}.rounded-bl-none{border-bottom-left-radius:0}.rounded-br-none{border-bottom-right-radius:0}.rounded-tl-none{border-top-left-radius:0}.rounded-tr-none{border-top-right-radius:0}.border{border-width:1px}.border-2{border-width:2px}.border-4{border-width:4px}.border-8{border-width:8px}.border-b{border-bottom-width:1px}.border-l-2{border-left-width:2px}.border-l-4{border-left-width:4px}.border-l-\[12px\]{border-left-width:12px}.border-t{border-top-width:1px}.border-dashed{border-style:dashed}.border-\[\#DE6E30\]{--tw-border-opacity:1;border-color:rgb(222 110 48/var(--tw-border-opacity,1))}.border-\[\#DE6E30\]\/20{border-color:rgba(222,110,48,.2)}.border-gray-100{--tw-border-opacity:1;border-color:rgb(243 244 246/var(--tw-border-opacity,1))}.border-orange-100{--tw-border-opacity:1;border-color:rgb(255 237 213/var(--tw-border-opacity,1))}.border-orange-500{--tw-border-opacity:1;border-color:rgb(249 115 22/var(--tw-border-opacity,1))}.border-orange-500\/30{border-color:rgba(249,115,22,.3)}.border-slate-100{--tw-border-opacity:1;border-color:rgb(241 245 249/var(--tw-border-opacity,1))}.border-slate-200{--tw-border-opacity:1;border-color:rgb(226 232 240/var(--tw-border-opacity,1))}.border-slate-50{--tw-border-opacity:1;border-color:rgb(248 250 252/var(--tw-border-opacity,1))}.border-transparent{border-color:transparent}.border-white{--tw-border-opacity:1;border-color:rgb(255 255 255/var(--tw-border-opacity,1))}.border-white\/10{border-color:hsla(0,0%,100%,.1)}.border-white\/5{border-color:hsla(0,0%,100%,.05)}.border-l-blue-600{--tw-border-opacity:1;border-left-color:rgb(37 99 235/var(--tw-border-opacity,1))}.border-l-orange-500{--tw-border-opacity:1;border-left-color:rgb(249 115 22/var(--tw-border-opacity,1))}.bg-\[\#19335D\]{--tw-bg-opacity:1;background-color:rgb(25 51 93/var(--tw-bg-opacity,1))}.bg-\[\#27C93F\]{--tw-bg-opacity:1;background-color:rgb(39 201 63/var(--tw-bg-opacity,1))}.bg-\[\#DE6E30\]{--tw-bg-opacity:1;background-color:rgb(222 110 48/var(--tw-bg-opacity,1))}.bg-\[\#DE6E30\]\/10{background-color:rgba(222,110,48,.1)}.bg-\[\#FF5F56\]{--tw-bg-opacity:1;background-color:rgb(255 95 86/var(--tw-bg-opacity,1))}.bg-\[\#FFBD2E\]{--tw-bg-opacity:1;background-color:rgb(255 189 46/var(--tw-bg-opacity,1))}.bg-blue-200{--tw-bg-opacity:1;background-color:rgb(191 219 254/var(--tw-bg-opacity,1))}.bg-blue-50{--tw-bg-opacity:1;background-color:rgb(239 246 255/var(--tw-bg-opacity,1))}.bg-blue-500{--tw-bg-opacity:1;background-color:rgb(59 130 246/var(--tw-bg-opacity,1))}.bg-blue-600{--tw-bg-opacity:1;background-color:rgb(37 99 235/var(--tw-bg-opacity,1))}.bg-brandBlue{--tw-bg-opacity:1;background-color:rgb(25 51 93/var(--tw-bg-opacity,1))}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246/var(--tw-bg-opacity,1))}.bg-gray-200{--tw-bg-opacity:1;background-color:rgb(229 231 235/var(--tw-bg-opacity,1))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgb(249 250 251/var(--tw-bg-opacity,1))}.bg-green-100{--tw-bg-opacity:1;background-color:rgb(220 252 231/var(--tw-bg-opacity,1))}.bg-green-50{--tw-bg-opacity:1;background-color:rgb(240 253 244/var(--tw-bg-opacity,1))}.bg-green-500{--tw-bg-opacity:1;background-color:rgb(34 197 94/var(--tw-bg-opacity,1))}.bg-indigo-500{--tw-bg-opacity:1;background-color:rgb(99 102 241/var(--tw-bg-opacity,1))}.bg-orange-100{--tw-bg-opacity:1;background-color:rgb(255 237 213/var(--tw-bg-opacity,1))}.bg-orange-50{--tw-bg-opacity:1;background-color:rgb(255 247 237/var(--tw-bg-opacity,1))}.bg-orange-500{--tw-bg-opacity:1;background-color:rgb(249 115 22/var(--tw-bg-opacity,1))}.bg-red-400{--tw-bg-opacity:1;background-color:rgb(248 113 113/var(--tw-bg-opacity,1))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242/var(--tw-bg-opacity,1))}.bg-red-500{--tw-bg-opacity:1;background-color:rgb(239 68 68/var(--tw-bg-opacity,1))}.bg-slate-100{--tw-bg-opacity:1;background-color:rgb(241 245 249/var(--tw-bg-opacity,1))}.bg-slate-200{--tw-bg-opacity:1;background-color:rgb(226 232 240/var(--tw-bg-opacity,1))}.bg-slate-300{--tw-bg-opacity:1;background-color:rgb(203 213 225/var(--tw-bg-opacity,1))}.bg-slate-50{--tw-bg-opacity:1;background-color:rgb(248 250 252/var(--tw-bg-opacity,1))}.bg-slate-50\/30{background-color:rgba(248,250,252,.3)}.bg-slate-50\/40{background-color:rgba(248,250,252,.4)}.bg-slate-900{--tw-bg-opacity:1;background-color:rgb(15 23 42/var(--tw-bg-opacity,1))}.bg-transparent{background-color:transparent}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255/var(--tw-bg-opacity,1))}.bg-white\/10{background-color:hsla(0,0%,100%,.1)}.bg-white\/20{background-color:hsla(0,0%,100%,.2)}.bg-white\/5{background-color:hsla(0,0%,100%,.05)}.bg-gradient-to-tr{background-image:linear-gradient(to top right,var(--tw-gradient-stops))}.from-\[\#DE6E30\]{--tw-gradient-from:#de6e30 var(--tw-gradient-from-position);--tw-gradient-to:rgba(222,110,48,0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to)}.to-orange-400{--tw-gradient-to:#fb923c var(--tw-gradient-to-position)}.p-10{padding:2.5rem}.p-2{padding:.5rem}.p-3{padding:.75rem}.p-4{padding:1rem}.p-5{padding:1.25rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-10{padding-left:2.5rem;padding-right:2.5rem}.px-2{padding-left:.5rem;padding-right:.5rem}.px-3{padding-left:.75rem;padding-right:.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-5{padding-left:1.25rem;padding-right:1.25rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.px-8{padding-left:2rem;padding-right:2rem}.py-0\.5{padding-top:.125rem;padding-bottom:.125rem}.py-1{padding-top:.25rem;padding-bottom:.25rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.py-20{padding-top:5rem;padding-bottom:5rem}.py-3{padding-top:.75rem;padding-bottom:.75rem}.py-4{padding-top:1rem;padding-bottom:1rem}.py-5{padding-top:1.25rem;padding-bottom:1.25rem}.py-6{padding-top:1.5rem;padding-bottom:1.5rem}.pt-16{padding-top:4rem}.pt-2{padding-top:.5rem}.pt-8{padding-top:2rem}.text-left{text-align:left}.text-center{text-align:center}.text-right{text-align:right}.font-mono{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}.text-2xl{font-size:1.5rem;line-height:2rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}.text-5xl{font-size:3rem;line-height:1}.text-6xl{font-size:3.75rem;line-height:1}.text-\[10px\]{font-size:10px}.text-\[11px\]{font-size:11px}.text-\[8px\]{font-size:8px}.text-\[9px\]{font-size:9px}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:.75rem;line-height:1rem}.font-black{font-weight:900}.font-bold{font-weight:700}.font-extrabold{font-weight:800}.font-semibold{font-weight:600}.uppercase{text-transform:uppercase}.italic{font-style:italic}.tabular-nums{--tw-numeric-spacing:tabular-nums;font-variant-numeric:var(--tw-ordinal) var(--tw-slashed-zero) var(--tw-numeric-figure) var(--tw-numeric-spacing) var(--tw-numeric-fraction)}.leading-\[1\.05\]{line-height:1.05}.leading-\[1\.1\]{line-height:1.1}.leading-relaxed{line-height:1.625}.leading-snug{line-height:1.375}.leading-tight{line-height:1.25}.tracking-\[0\.2em\]{letter-spacing:.2em}.tracking-\[0\.4em\]{letter-spacing:.4em}.tracking-tight{letter-spacing:-.025em}.tracking-tighter{letter-spacing:-.05em}.tracking-wider{letter-spacing:.05em}.tracking-widest{letter-spacing:.1em}.text-\[\#19335D\]{--tw-text-opacity:1;color:rgb(25 51 93/var(--tw-text-opacity,1))}.text-\[\#DE6E30\]{--tw-text-opacity:1;color:rgb(222 110 48/var(--tw-text-opacity,1))}.text-blue-400{--tw-text-opacity:1;color:rgb(96 165 250/var(--tw-text-opacity,1))}.text-blue-600{--tw-text-opacity:1;color:rgb(37 99 235/var(--tw-text-opacity,1))}.text-blue-900{--tw-text-opacity:1;color:rgb(30 58 138/var(--tw-text-opacity,1))}.text-brandBlue{--tw-text-opacity:1;color:rgb(25 51 93/var(--tw-text-opacity,1))}.text-brandOrange{--tw-text-opacity:1;color:rgb(222 110 48/var(--tw-text-opacity,1))}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175/var(--tw-text-opacity,1))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128/var(--tw-text-opacity,1))}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99/var(--tw-text-opacity,1))}.text-green-400{--tw-text-opacity:1;color:rgb(74 222 128/var(--tw-text-opacity,1))}.text-green-500{--tw-text-opacity:1;color:rgb(34 197 94/var(--tw-text-opacity,1))}.text-green-600{--tw-text-opacity:1;color:rgb(22 163 74/var(--tw-text-opacity,1))}.text-green-700{--tw-text-opacity:1;color:rgb(21 128 61/var(--tw-text-opacity,1))}.text-indigo-600{--tw-text-opacity:1;color:rgb(79 70 229/var(--tw-text-opacity,1))}.text-orange-400{--tw-text-opacity:1;color:rgb(251 146 60/var(--tw-text-opacity,1))}.text-orange-500{--tw-text-opacity:1;color:rgb(249 115 22/var(--tw-text-opacity,1))}.text-orange-500\/80{color:rgba(249,115,22,.8)}.text-orange-600{--tw-text-opacity:1;color:rgb(234 88 12/var(--tw-text-opacity,1))}.text-orange-700{--tw-text-opacity:1;color:rgb(194 65 12/var(--tw-text-opacity,1))}.text-orange-900{--tw-text-opacity:1;color:rgb(124 45 18/var(--tw-text-opacity,1))}.text-red-600{--tw-text-opacity:1;color:rgb(220 38 38/var(--tw-text-opacity,1))}.text-slate-300{--tw-text-opacity:1;color:rgb(203 213 225/var(--tw-text-opacity,1))}.text-slate-400{--tw-text-opacity:1;color:rgb(148 163 184/var(--tw-text-opacity,1))}.text-slate-500{--tw-text-opacity:1;color:rgb(100 116 139/var(--tw-text-opacity,1))}.text-slate-600{--tw-text-opacity:1;color:rgb(71 85 105/var(--tw-text-opacity,1))}.text-slate-700{--tw-text-opacity:1;color:rgb(51 65 85/var(--tw-text-opacity,1))}.text-slate-800{--tw-text-opacity:1;color:rgb(30 41 59/var(--tw-text-opacity,1))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255/var(--tw-text-opacity,1))}.text-white\/30{color:hsla(0,0%,100%,.3)}.text-white\/40{color:hsla(0,0%,100%,.4)}.text-white\/50{color:hsla(0,0%,100%,.5)}.text-white\/60{color:hsla(0,0%,100%,.6)}.underline{text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.opacity-0{opacity:0}.opacity-10{opacity:.1}.opacity-100{opacity:1}.opacity-20{opacity:.2}.opacity-30{opacity:.3}.opacity-40{opacity:.4}.opacity-50{opacity:.5}.opacity-60{opacity:.6}.opacity-70{opacity:.7}.opacity-80{opacity:.8}.opacity-\[0\.03\]{opacity:.03}.shadow{--tw-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px -1px rgba(0,0,0,.1);--tw-shadow-colored:0 1px 3px 0 var(--tw-shadow-color),0 1px 2px -1px var(--tw-shadow-color)}.shadow,.shadow-2xl{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgba(0,0,0,.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color)}.shadow-\[0_50px_100px_-20px_rgba\(25\2c 51\2c 93\2c 0\.15\)\]{--tw-shadow:0 50px 100px -20px rgba(25,51,93,.15);--tw-shadow-colored:0 50px 100px -20px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.shadow-\[0_60px_130px_-20px_rgba\(25\2c 51\2c 93\2c 0\.2\)\]{--tw-shadow:0 60px 130px -20px rgba(25,51,93,.2);--tw-shadow-colored:0 60px 130px -20px var(--tw-shadow-color)}.shadow-\[0_60px_130px_-20px_rgba\(25\2c 51\2c 93\2c 0\.2\)\],.shadow-lg{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.shadow-lg{--tw-shadow:0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -4px rgba(0,0,0,.1);--tw-shadow-colored:0 10px 15px -3px var(--tw-shadow-color),0 4px 6px -4px var(--tw-shadow-color)}.shadow-sm{--tw-shadow:0 1px 2px 0 rgba(0,0,0,.05);--tw-shadow-colored:0 1px 2px 0 var(--tw-shadow-color)}.shadow-sm,.shadow-xl{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.shadow-xl{--tw-shadow:0 20px 25px -5px rgba(0,0,0,.1),0 8px 10px -6px rgba(0,0,0,.1);--tw-shadow-colored:0 20px 25px -5px var(--tw-shadow-color),0 8px 10px -6px var(--tw-shadow-color)}.shadow-brandBlue\/20{--tw-shadow-color:rgba(25,51,93,.2);--tw-shadow:var(--tw-shadow-colored)}.shadow-orange-500\/30{--tw-shadow-color:rgba(249,115,22,.3);--tw-shadow:var(--tw-shadow-colored)}.outline{outline-style:solid}.ring{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.blur{--tw-blur:blur(8px)}.blur,.blur-\[100px\]{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.blur-\[100px\]{--tw-blur:blur(100px)}.drop-shadow{--tw-drop-shadow:drop-shadow(0 1px 2px rgba(0,0,0,.1)) drop-shadow(0 1px 1px rgba(0,0,0,.06))}.drop-shadow,.grayscale{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.grayscale{--tw-grayscale:grayscale(100%)}.invert{--tw-invert:invert(100%)}.filter,.invert{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.backdrop-filter{-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}.transition{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,-webkit-backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.transition-colors{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.transition-transform{transition-property:transform;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.duration-1000{transition-duration:1s}.duration-300{transition-duration:.3s}.duration-500{transition-duration:.5s}.duration-700{transition-duration:.7s}.ease-in-out{transition-timing-function:cubic-bezier(.4,0,.2,1)}.ease-out{transition-timing-function:cubic-bezier(0,0,.2,1)}.hover\:-translate-y-1:hover{--tw-translate-y:-0.25rem}.hover\:-translate-y-1:hover,.hover\:scale-\[1\.02\]:hover{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.hover\:scale-\[1\.02\]:hover{--tw-scale-x:1.02;--tw-scale-y:1.02}.hover\:border-orange-500\/20:hover{border-color:rgba(249,115,22,.2)}.hover\:bg-\[\#19335D\]:hover{--tw-bg-opacity:1;background-color:rgb(25 51 93/var(--tw-bg-opacity,1))}.hover\:bg-slate-50:hover{--tw-bg-opacity:1;background-color:rgb(248 250 252/var(--tw-bg-opacity,1))}.hover\:opacity-100:hover{opacity:1}.hover\:shadow-2xl:hover{--tw-shadow:0 25px 50px -12px rgba(0,0,0,.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color)}.hover\:shadow-2xl:hover,.hover\:shadow-xl:hover{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.hover\:shadow-xl:hover{--tw-shadow:0 20px 25px -5px rgba(0,0,0,.1),0 8px 10px -6px rgba(0,0,0,.1);--tw-shadow-colored:0 20px 25px -5px var(--tw-shadow-color),0 8px 10px -6px var(--tw-shadow-color)}.active\:scale-95:active{--tw-scale-x:.95;--tw-scale-y:.95}.active\:scale-95:active,.group:hover .group-hover\:translate-x-1{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.group:hover .group-hover\:translate-x-1{--tw-translate-x:0.25rem}.group\/item:hover .group-hover\/item\:scale-150{--tw-scale-x:1.5;--tw-scale-y:1.5}.group:hover .group-hover\:scale-110,.group\/item:hover .group-hover\/item\:scale-150{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.group:hover .group-hover\:scale-110{--tw-scale-x:1.1;--tw-scale-y:1.1}.group.active .group-\[\.active\]\:bg-orange-500{--tw-bg-opacity:1;background-color:rgb(249 115 22/var(--tw-bg-opacity,1))}.group.active .group-\[\.active\]\:text-white{--tw-text-opacity:1;color:rgb(255 255 255/var(--tw-text-opacity,1))}@media (min-width:640px){.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}}@media (min-width:768px){.md\:col-span-1{grid-column:span 1/span 1}.md\:mb-24{margin-bottom:6rem}.md\:block{display:block}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.md\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.md\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.md\:gap-8{gap:2rem}.md\:p-10{padding:2.5rem}.md\:p-16{padding:4rem}.md\:py-28{padding-top:7rem;padding-bottom:7rem}.md\:text-5xl{font-size:3rem;line-height:1}.md\:text-6xl{font-size:3.75rem;line-height:1}.md\:text-sm{font-size:.875rem;line-height:1.25rem}.md\:text-xl{font-size:1.25rem;line-height:1.75rem}.md\:text-xs{font-size:.75rem;line-height:1rem}}@media (min-width:1024px){.lg\:sticky{position:sticky}.lg\:top-24{top:6rem}.lg\:order-1{order:1}.lg\:order-2{order:2}.lg\:col-span-4{grid-column:span 4/span 4}.lg\:col-span-5{grid-column:span 5/span 5}.lg\:col-span-7{grid-column:span 7/span 7}.lg\:col-span-8{grid-column:span 8/span 8}.lg\:mb-0{margin-bottom:0}.lg\:grid{display:grid}.lg\:hidden{display:none}.lg\:w-5\/12{width:41.666667%}.lg\:w-7\/12{width:58.333333%}.lg\:w-\[45\%\]{width:45%}.lg\:w-\[55\%\]{width:55%}.lg\:grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.lg\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.lg\:flex-row{flex-direction:row}.lg\:gap-20{gap:5rem}.lg\:gap-24{gap:6rem}.lg\:px-12{padding-left:3rem;padding-right:3rem}.lg\:px-8{padding-left:2rem;padding-right:2rem}.lg\:text-6xl{font-size:3.75rem;line-height:1}.lg\:text-7xl{font-size:4.5rem;line-height:1}}</style>
    <script defer src="https://unpkg.com/lucide@latest"></script>

    <!-- ─── 13. Critical CSS (EXISTING — preserved fully) ─── -->
    <style>
        /* preserved scroll progress + skip-link styles */
        .skip-to-content { position:absolute; top:-100%; left:0; background:var(--orange-700,#B5551D); color:#fff; font-weight:700; padding:.75rem 1.5rem; border-radius:0 0 8px 0; text-decoration:none; z-index:9999; transition:top .2s; }
        .skip-to-content:focus { top:0; }
        #progress { position:fixed; top:0; left:0; height:3px; background:linear-gradient(90deg,#DE6E30,#19335D); z-index:2000; width:0%; }

        /* Sticky-fail fallback — applied by the guard script in this file when an
           ancestor's overflow/transform breaks position:sticky (e.g. on the
           homepage). Promotes the header to fixed and shims the body so content
           doesn't jump under it. Without these rules the JS guard did nothing. */
        #site-header.ee-force-fixed { position:fixed; top:0; left:0; right:0; width:100%; }
        body.ee-header-fixed { padding-top: var(--ee-header-h, 72px); }

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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            transition: all .3s cubic-bezier(.4,0,.2,1);
        }
        #site-header.scrolled { box-shadow: var(--eh-shadow-md); }
        #site-header { transition: transform .3s cubic-bezier(.4,0,.2,1), box-shadow .25s ease, background .25s ease; will-change: transform; }
        #site-header.eh-hidden { transform: translateY(-110%); box-shadow: none; }

        #site-header .eh-content { max-width:1280px; margin:0 auto; padding:0 1.25rem; display:flex; align-items:center; justify-content:space-between; gap:.75rem; height:72px; }
        #site-header .eh-actions { display:flex; align-items:center; gap:.6rem; }

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
        #site-header .eh-nav-link:hover { background:#FFF3EC; color:var(--orange-700,#B5551D); }
        #site-header .eh-nav-link.active { background:#FFF3EC; color:var(--orange-700,#B5551D); }
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
        #site-header .eh-mega-col .eh-col-title { font-family:'Inter',sans-serif; font-size:.65rem; font-weight:600; color:#94A3B8; text-transform:uppercase; letter-spacing:.08em; margin-bottom:.55rem; display:flex; align-items:center; gap:.4rem; }
        #site-header .eh-col-icon { width:16px; height:16px; background:linear-gradient(135deg,var(--eh-primary-light),var(--eh-accent)); border-radius:5px; display:inline-flex; align-items:center; justify-content:center; padding:3px; color:#fff; }
        #site-header .eh-col-icon .eh-svg { width:100%; height:100%; filter:brightness(0) invert(1); }

        /* Featured promo strip */
        #site-header .eh-featured { grid-column:span 4; background:linear-gradient(135deg,var(--eh-primary),var(--eh-primary-light)); border-radius:10px; padding:.85rem 1.1rem; color:#fff; margin-bottom:.65rem; display:flex; align-items:center; justify-content:space-between; gap:.85rem; flex-wrap:wrap; }
        #site-header .eh-featured.three-col { grid-column:span 3; }
        #site-header .eh-featured h3,
        #site-header .eh-featured .eh-featured-title { font-family:'Inter',sans-serif; font-size:.92rem; font-weight:800; margin-bottom:.15rem; color:#fff; display:flex; align-items:center; gap:.4rem; line-height:1.3; }
        #site-header .eh-featured h3 .eh-svg,
        #site-header .eh-featured .eh-featured-title .eh-svg { width:.95rem; height:.95rem; filter:brightness(0) invert(1); }
        #site-header .eh-featured p { opacity:.9; font-size:.75rem; margin-bottom:.5rem; max-width:520px; color:#fff; line-height:1.45; }
        #site-header .eh-featured-btn { background:#fff; color:var(--eh-primary); padding:.4rem .9rem; border-radius:7px; text-decoration:none; font-weight:600; font-size:.78rem; display:inline-flex; align-items:center; gap:.35rem; transition:all .2s ease; }
        #site-header .eh-featured-btn:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(255,255,255,.3); color:var(--eh-primary); }
        #site-header .eh-featured-visual { width:54px; height:54px; background:rgba(255,255,255,.15); border-radius:9px; display:flex; align-items:center; justify-content:center; backdrop-filter:blur(10px); padding:9px; flex-shrink:0; }
        #site-header .eh-featured-visual .eh-svg { width:100%; height:100%; filter:brightness(0) invert(1); }

        /* Dropdown link rows */
        #site-header .eh-dl { display:flex; align-items:flex-start; gap:.55rem; padding:.42rem .5rem; color:var(--eh-text-dark); text-decoration:none; border-radius:7px; border:1.5px solid transparent; transition:all .15s ease; margin-bottom:.1rem; position:relative; }
        #site-header .eh-dl:hover { background:#F8FAFC; border-color:#22467c; transform:translateX(2px) scale(1.05); box-shadow:0 6px 18px rgba(25,51,93,.10); }
        #site-header .eh-dl:hover .eh-dl-title { color:#19335D; }
        #site-header .eh-dl:hover .eh-dl-desc  { color:#64748B; }
        #site-header .eh-dl-icon { width:28px; height:28px; background:linear-gradient(135deg,var(--eh-bg-subtle),#E8EEF3); border-radius:7px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:.9rem; padding:4px; transition:all .2s ease; color:var(--eh-primary); overflow:hidden; }
        #site-header .eh-dl-icon .eh-svg { width:100%; height:100%; }
        #site-header .eh-dl:hover .eh-dl-icon { background:#fff; transform:scale(1.05); }
        /* Icons are full-colour gradient tiles now — never invert them on
           hover (invert used to flatten the whole tile to a white square,
           which read as the icon disappearing). */
        #site-header .eh-dl:hover .eh-dl-icon .eh-svg { filter:none; }
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
            #site-header .eh-nav { display:none; }
            /* Book Demo stays visible in the mobile top bar — compact, next to the hamburger */
            #site-header .eh-cta { padding:.42rem .75rem; font-size:.72rem; gap:.25rem; white-space:nowrap; }
            #site-header .eh-cta svg { width:12px; height:12px; }
        }
        @media (max-width:400px){
            #site-header .eh-cta { padding:.62rem .7rem; font-size:.72rem; }
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
            font-family: 'Inter', sans-serif;
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
        .menu-title { display: block; line-height: 1.25; font-family: 'Inter', sans-serif; }

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
            font-family: 'Inter', sans-serif;
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
    <?php if (!function_exists('ee_should_hide_part') || !ee_should_hide_part('header')): ?>
    <header id="site-header" role="banner" class="sticky top-0 z-[1000] w-full">
        <div class="eh-content">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="eh-logo" aria-label="<?php echo esc_attr($ee_site_name); ?>">
                <img src="https://www.extraaedge.com/wp-content/themes/custom_theme/assets/images/inner-logo.svg"
                     alt="<?php echo esc_attr($ee_site_name); ?>"
                     width="160" height="48" fetchpriority="high" decoding="async">
            </a>

            <nav class="eh-nav ee-desktop-nav" role="navigation" aria-label="Primary">

                <?php $eh_top = function_exists('ee_get_header_top_labels') ? ee_get_header_top_labels() : array(); ?>
                <!-- Products Mega Menu — columns + badges set per-post in WP Admin -->
                <div class="eh-nav-item">
                    <a href="<?php echo esc_url($eh_top['products']['url'] ?? home_url('/products/')); ?>" class="eh-nav-link" role="button" aria-haspopup="true"><?php echo esc_html($eh_top['products']['label'] ?? 'Products'); ?>
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
                    <a href="<?php echo esc_url($eh_top['solutions']['url'] ?? '#'); ?>" class="eh-nav-link" role="button" aria-haspopup="true"><?php echo esc_html($eh_top['solutions']['label'] ?? 'Solutions'); ?>
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
                    <a href="<?php echo esc_url($eh_top['industries']['url'] ?? home_url('/industries/')); ?>" class="eh-nav-link"><?php echo esc_html($eh_top['industries']['label'] ?? 'Industries'); ?>
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
                    <a href="<?php echo esc_url($eh_top['resources']['url'] ?? '#'); ?>" class="eh-nav-link" role="button" aria-haspopup="true"><?php echo esc_html($eh_top['resources']['label'] ?? 'Resources'); ?>
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
                    <a href="<?php echo esc_url($eh_top['company']['url'] ?? '#'); ?>" class="eh-nav-link" role="button" aria-haspopup="true"><?php echo esc_html($eh_top['company']['label'] ?? 'Company'); ?>
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-dropdown">
                        <?php
                        $eh_company = function_exists('ee_get_company_menu_items') ? ee_get_company_menu_items() : array();
                        $eh_last_c  = count($eh_company) - 1;
                        foreach ($eh_company as $eh_ci => $eh_c):
                            /* Show a divider just before the very last item (usually Contact / Privacy) */
                            if ($eh_ci === $eh_last_c && $eh_last_c > 0): ?>
                                <div class="eh-divider"></div>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($eh_c['url'] ?? '#'); ?>" class="eh-dl">
                                <div class="eh-dl-icon">
                                    <?php if (!empty($eh_c['icon'])): ?>
                                        <img class="eh-svg" src="<?php echo esc_url($eh_c['icon']); ?>" alt="" loading="lazy">
                                    <?php endif; ?>
                                </div>
                                <div class="eh-dl-content">
                                    <div class="eh-dl-title"><?php echo esc_html($eh_c['title'] ?? ''); ?></div>
                                    <?php if (!empty($eh_c['desc'])): ?>
                                        <div class="eh-dl-desc"><?php echo esc_html($eh_c['desc']); ?></div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </nav>

            <!-- CTA + hamburger — grouped so Book Demo always sits tight against the 3-line icon on the right, never floating in the middle when the nav links are hidden on mobile -->
            <div class="eh-actions">
                <?php $eh_cta = function_exists('ee_get_book_demo_cta') ? ee_get_book_demo_cta() : array('text' => 'Book Demo', 'url' => 'https://www.extraaedge.com/book-a-demo/'); ?>
                <a href="<?php echo esc_url($eh_cta['url']); ?>" class="eh-cta"><?php echo esc_html($eh_cta['text']); ?>
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>

                <!-- Mobile hamburger — opens the existing slide-in #mobileMenu below -->
                <button id="openMobileBtn" class="lg:hidden p-2 text-brandBlue ee-mobile-btn" aria-label="Open mobile menu" aria-controls="mobileMenu" aria-expanded="false"><i data-lucide="menu" aria-hidden="true"></i></button>
            </div>

        </div>
    </header>
    <?php endif; ?>

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
                        <a href="/customer-success-stories/" class="m-icon-card" title="Customers">
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
            <a href="https://www.extraaedge.com/book-a-demo/" class="block bg-brandBlue py-4 rounded-xl font-bold text-white shadow-lg shadow-brandBlue/20 text-center" aria-label="Book Demo Now">Book Demo</a>
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
                           document.body.classList.contains('single-industry') ||
                           document.body.classList.contains('single-use_case') ||
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

<style id="ee-global-heading-scale">
/* ── Global heading scale: fixed sizes, identical on desktop and mobile ──
   H1=30px, H2=20px, H3=17px, paragraphs=15px, site-wide. Page-builder
   pages (.eepb), embedded blog content (.ee-blog-embed) and the
   self-contained "While your campus sleeps" story widget (#ee-night-embed,
   which ships its own carefully-tuned scoped typography) keep their own
   pasted designs untouched. */
:root{
    --ee-h1:30px;
    --ee-h2:20px;
    --ee-h3:17px;
    --ee-p:15px;
}
html body #main-content h1:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:var(--ee-h1) !important;
    line-height:1.12 !important;
    letter-spacing:-.02em !important;
}
html body #main-content h2:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:var(--ee-h2) !important;
    line-height:1.22 !important;
    letter-spacing:-.015em !important;
}
html body #main-content h3:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:var(--ee-h3) !important;
    line-height:1.3 !important;
    letter-spacing:-.01em !important;
}
html body #main-content p:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:var(--ee-p) !important;
    line-height:1.6 !important;
}
/* ── phones: slightly smaller site-wide type for comfortable reading ── */
@media(max-width:820px){
html body #main-content h1:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:22px !important;
}
html body #main-content h2:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:17px !important;
}
html body #main-content h3:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:14px !important;
}
html body #main-content p:not(.eepb *):not(.ee-blog-embed *):not(#ee-night-embed *){
    font-size:13px !important;
}
}
</style>
<!-- Main content landmark — required so the skip-to-content link has a target and screen readers/SEO recognise the primary content area. Closed in footer.php. -->
<main id="main-content" role="main">
