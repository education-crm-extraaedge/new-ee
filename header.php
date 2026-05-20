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
            --eh-text-dark: #1A1A1A;
            --eh-text-light: #6B7280;
            --eh-bg-light: #FFFFFF;
            --eh-bg-subtle: #F9FAFB;
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

        #site-header .eh-content { max-width:1400px; margin:0 auto; padding:0 1.5rem; display:flex; align-items:center; justify-content:space-between; gap:1rem; height:85px; }

        /* Logo */
        #site-header .eh-logo { display:flex; align-items:center; gap:.65rem; text-decoration:none; flex-shrink:0; transition:transform .3s ease; }
        #site-header .eh-logo:hover { transform:translateY(-2px); }
        #site-header .eh-logo img { height:42px; width:auto; }

        /* SVG icon wrapper — replaces FontAwesome <i> tags */
        #site-header .eh-svg { width:1em; height:1em; display:inline-block; vertical-align:-.125em; object-fit:contain; }

        /* Search bar */
        #site-header .eh-search { flex:1; max-width:500px; margin:0 2rem; position:relative; }
        #site-header .eh-search-wrap { position:relative; }
        #site-header .eh-search-input { width:100%; padding:.75rem 3rem .75rem 3rem; border:2px solid var(--eh-border-light); border-radius:12px; font-size:.95rem; font-family:inherit; background:var(--eh-bg-subtle); color:var(--eh-text-dark); transition:all .3s ease; }
        #site-header .eh-search-input:focus { outline:none; border-color:var(--eh-primary); background:#fff; box-shadow:0 0 0 3px rgba(25,51,93,.10); }
        #site-header .eh-search-svg { position:absolute; left:1rem; top:50%; transform:translateY(-50%); color:var(--eh-text-light); pointer-events:none; width:20px; height:20px; }
        #site-header .eh-search-clear { position:absolute; right:1rem; top:50%; transform:translateY(-50%); color:var(--eh-text-light); cursor:pointer; display:none; padding:.25rem; border-radius:4px; transition:all .2s ease; width:20px; height:20px; }
        #site-header .eh-search-clear:hover { background:var(--eh-bg-subtle); color:var(--eh-text-dark); }
        #site-header .eh-search-input:not(:placeholder-shown) ~ .eh-search-clear { display:block; }
        #site-header .eh-search-results { position:absolute; top:calc(100% + .75rem); left:0; right:0; background:#fff; border:1px solid var(--eh-border); border-radius:14px; box-shadow:var(--eh-shadow-lg); max-height:500px; overflow-y:auto; opacity:0; visibility:hidden; transform:translateY(-10px); transition:all .3s ease; padding:.75rem; z-index:100; }
        #site-header .eh-search-results.active { opacity:1; visibility:visible; transform:translateY(0); }
        #site-header .eh-search-section-title { font-size:.75rem; font-weight:700; color:var(--eh-text-light); text-transform:uppercase; letter-spacing:.05em; padding:.5rem .75rem; margin-bottom:.25rem; }
        #site-header .eh-result-item { display:flex; align-items:center; gap:.75rem; padding:.75rem; border-radius:10px; text-decoration:none; color:var(--eh-text-dark); transition:all .2s ease; }
        #site-header .eh-result-item:hover { background:var(--eh-bg-subtle); }
        #site-header .eh-result-icon { width:36px; height:36px; background:var(--eh-bg-subtle); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0; color:var(--eh-primary); padding:6px; }
        #site-header .eh-result-icon .eh-svg { width:100%; height:100%; }
        #site-header .eh-result-title { font-weight:600; font-size:.9rem; margin-bottom:.15rem; }
        #site-header .eh-result-desc { font-size:.8rem; color:var(--eh-text-light); }
        #site-header .eh-search-shortcut { font-size:.75rem; color:var(--eh-text-light); background:var(--eh-bg-subtle); padding:.25rem .5rem; border-radius:4px; }

        /* Navigation */
        #site-header .eh-nav { display:flex; align-items:center; gap:.35rem; }
        #site-header .eh-nav-item { position:relative; }
        #site-header .eh-nav-link { display:flex; align-items:center; gap:.4rem; padding:.7rem 1.1rem; color:var(--eh-text-dark); text-decoration:none; font-weight:500; font-size:.95rem; border-radius:10px; transition:all .2s ease; cursor:pointer; background:transparent; border:none; font-family:inherit; position:relative; }
        #site-header .eh-nav-link:hover { background:var(--eh-bg-subtle); color:var(--eh-primary); }
        #site-header .eh-nav-link.active { background:var(--eh-bg-subtle); color:var(--eh-primary); }
        #site-header .eh-nav-link .eh-chev { width:16px; height:16px; transition:transform .3s ease; }
        #site-header .eh-nav-item:hover .eh-nav-link .eh-chev { transform:rotate(180deg); }

        /* Standard dropdown */
        #site-header .eh-dropdown { position:absolute; top:calc(100% + .75rem); left:0; background:#fff; border:1px solid var(--eh-border); border-radius:14px; box-shadow:var(--eh-shadow-lg); min-width:320px; opacity:0; visibility:hidden; transform:translateY(-10px); transition:all .3s cubic-bezier(.4,0,.2,1); padding:.85rem; z-index:100; }
        #site-header .eh-nav-item:hover > .eh-dropdown { opacity:1; visibility:visible; transform:translateY(0); }

        /* Mega menu */
        #site-header .eh-mega { position:absolute; top:calc(100% + .75rem); left:50%; transform:translateX(-50%) translateY(-10px); background:#fff; border:1px solid var(--eh-border); border-radius:18px; box-shadow:var(--eh-shadow-xl); width:1100px; max-width:95vw; opacity:0; visibility:hidden; transition:all .35s cubic-bezier(.4,0,.2,1); padding:2.5rem; z-index:100; }
        #site-header .eh-nav-item:hover .eh-mega { opacity:1; visibility:visible; transform:translateX(-50%) translateY(0); }
        #site-header .eh-mega-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:2rem; }
        #site-header .eh-mega-grid.three-col { grid-template-columns:repeat(3,1fr); }
        #site-header .eh-mega-col h4 { font-family:'Archivo',sans-serif; font-size:.75rem; font-weight:700; color:var(--eh-text-light); text-transform:uppercase; letter-spacing:.06em; margin-bottom:1.15rem; display:flex; align-items:center; gap:.5rem; }
        #site-header .eh-col-icon { width:20px; height:20px; background:linear-gradient(135deg,var(--eh-primary-light),var(--eh-accent)); border-radius:6px; display:inline-flex; align-items:center; justify-content:center; padding:4px; color:#fff; }
        #site-header .eh-col-icon .eh-svg { width:100%; height:100%; filter:brightness(0) invert(1); }

        /* Featured promo strip */
        #site-header .eh-featured { grid-column:span 4; background:linear-gradient(135deg,var(--eh-primary),var(--eh-primary-light)); border-radius:12px; padding:1.75rem; color:#fff; margin-bottom:1.5rem; display:flex; align-items:center; justify-content:space-between; gap:1rem; flex-wrap:wrap; }
        #site-header .eh-featured.three-col { grid-column:span 3; }
        #site-header .eh-featured h3 { font-family:'Archivo',sans-serif; font-size:1.25rem; font-weight:800; margin-bottom:.5rem; color:#fff; display:flex; align-items:center; gap:.5rem; }
        #site-header .eh-featured h3 .eh-svg { width:1.2rem; height:1.2rem; }
        #site-header .eh-featured p { opacity:.9; font-size:.9rem; margin-bottom:1rem; max-width:520px; color:#fff; }
        #site-header .eh-featured-btn { background:#fff; color:var(--eh-primary); padding:.6rem 1.25rem; border-radius:8px; text-decoration:none; font-weight:600; font-size:.9rem; display:inline-flex; align-items:center; gap:.5rem; transition:all .2s ease; }
        #site-header .eh-featured-btn:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(255,255,255,.3); color:var(--eh-primary); }
        #site-header .eh-featured-visual { width:120px; height:120px; background:rgba(255,255,255,.15); border-radius:12px; display:flex; align-items:center; justify-content:center; backdrop-filter:blur(10px); padding:24px; flex-shrink:0; }
        #site-header .eh-featured-visual .eh-svg { width:100%; height:100%; filter:brightness(0) invert(1); }

        /* Dropdown link rows */
        #site-header .eh-dl { display:flex; align-items:flex-start; gap:.85rem; padding:.85rem; color:var(--eh-text-dark); text-decoration:none; border-radius:10px; transition:all .2s ease; margin-bottom:.35rem; position:relative; }
        #site-header .eh-dl:hover { background:var(--eh-bg-subtle); color:var(--eh-primary); transform:translateX(4px); }
        #site-header .eh-dl-icon { width:36px; height:36px; background:linear-gradient(135deg,var(--eh-bg-subtle),#E8EEF3); border-radius:9px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:1.15rem; padding:7px; transition:all .2s ease; color:var(--eh-primary); }
        #site-header .eh-dl-icon .eh-svg { width:100%; height:100%; }
        #site-header .eh-dl:hover .eh-dl-icon { background:linear-gradient(135deg,var(--eh-primary),var(--eh-accent)); transform:scale(1.05); }
        #site-header .eh-dl:hover .eh-dl-icon .eh-svg { filter:brightness(0) invert(1); }
        #site-header .eh-dl-content { flex:1; }
        #site-header .eh-dl-title { font-weight:600; font-size:.95rem; margin-bottom:.25rem; display:flex; align-items:center; gap:.5rem; line-height:1.3; }
        #site-header .eh-dl-desc { font-size:.8rem; color:var(--eh-text-light); line-height:1.45; }

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

        /* Quick links */
        #site-header .eh-quick { background:var(--eh-bg-subtle); border-radius:10px; padding:1rem; margin-top:.75rem; }
        #site-header .eh-quick-title { font-size:.75rem; font-weight:700; color:var(--eh-text-light); text-transform:uppercase; letter-spacing:.05em; margin-bottom:.75rem; }
        #site-header .eh-quick-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:.5rem; }
        #site-header .eh-quick-link { display:flex; align-items:center; gap:.5rem; padding:.6rem; background:#fff; border-radius:8px; text-decoration:none; color:var(--eh-text-dark); font-size:.85rem; font-weight:500; transition:all .2s ease; }
        #site-header .eh-quick-link .eh-svg { width:1rem; height:1rem; color:var(--eh-primary); }
        #site-header .eh-quick-link:hover { background:var(--eh-primary); color:#fff; transform:translateY(-2px); }
        #site-header .eh-quick-link:hover .eh-svg { filter:brightness(0) invert(1); }

        /* CTA button */
        #site-header .eh-cta { background:linear-gradient(135deg,var(--eh-accent),#FF8A5C); color:#fff; padding:.8rem 1.85rem; border-radius:11px; text-decoration:none; font-weight:600; font-size:.95rem; display:inline-flex; align-items:center; gap:.6rem; transition:all .3s ease; box-shadow:0 4px 14px rgba(222,110,48,.25); border:none; cursor:pointer; flex-shrink:0; }
        #site-header .eh-cta:hover { background:linear-gradient(135deg,var(--eh-accent-hover),#C75E24); color:#fff; transform:translateY(-2px); box-shadow:0 6px 22px rgba(222,110,48,.35); }

        /* Responsive */
        @media (max-width:1200px){
            #site-header .eh-mega { width:900px; }
            #site-header .eh-mega-grid { grid-template-columns:repeat(3,1fr); }
            #site-header .eh-featured { grid-column:span 3; }
        }
        @media (max-width:1024px){
            #site-header .eh-search { max-width:300px; }
            #site-header .eh-mega { width:700px; }
            #site-header .eh-mega-grid { grid-template-columns:repeat(2,1fr); }
            #site-header .eh-featured { grid-column:span 2; }
        }
        @media (max-width:1023.98px){
            #site-header .eh-search, #site-header .eh-nav, #site-header .eh-cta { display:none; }
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

            <!-- Search Bar -->
            <div class="eh-search">
                <div class="eh-search-wrap">
                    <svg class="eh-search-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" class="eh-search-input" id="ehSearchInput" placeholder="Search products, features, solutions..." aria-label="Search">
                    <svg class="eh-search-clear" id="ehSearchClear" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </div>
                <div class="eh-search-results" id="ehSearchResults" role="listbox">
                    <div class="eh-search-section-title">Popular Searches</div>
                    <a class="eh-result-item" href="<?php echo esc_url(home_url('/products/education-crm/')); ?>"><div class="eh-result-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/fire.svg" alt="" loading="lazy"></div><div><div class="eh-result-title">Education CRM</div><div class="eh-result-desc">Complete CRM solution</div></div></a>
                    <a class="eh-result-item" href="<?php echo esc_url(home_url('/products/chatbot-for-education/')); ?>"><div class="eh-result-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/robot.svg" alt="" loading="lazy"></div><div><div class="eh-result-title">AI Chatbot</div><div class="eh-result-desc">24/7 student engagement</div></div></a>
                    <a class="eh-result-item" href="<?php echo esc_url(home_url('/products/')); ?>"><div class="eh-result-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/chart-bar.svg" alt="" loading="lazy"></div><div><div class="eh-result-title">Analytics Dashboard</div><div class="eh-result-desc">Real-time insights</div></div></a>
                    <div class="eh-search-section-title">Quick Links</div>
                    <a class="eh-result-item" href="<?php echo esc_url(home_url('/help/')); ?>"><div class="eh-result-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/book-open.svg" alt="" loading="lazy"></div><div><div class="eh-result-title">Documentation</div></div><span class="eh-search-shortcut">⌘K</span></a>
                    <a class="eh-result-item" href="<?php echo esc_url(home_url('/book-demo/')); ?>"><div class="eh-result-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/film.svg" alt="" loading="lazy"></div><div><div class="eh-result-title">Schedule Demo</div></div></a>
                </div>
            </div>

            <nav class="eh-nav ee-desktop-nav" role="navigation" aria-label="Primary">

                <!-- Products Mega Menu -->
                <div class="eh-nav-item">
                    <a href="#" class="eh-nav-link" role="button" aria-haspopup="true">Products
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-mega">
                        <div class="eh-mega-grid">
                            <div class="eh-featured">
                                <div>
                                    <h3><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/rocket.svg" alt="" loading="lazy"> NEW: Vidya.ai - AI-Powered Education Platform</h3>
                                    <p>Transform your educational institution with cutting-edge AI technology. Intelligent automation, personalized learning, and advanced analytics in one powerful platform.</p>
                                    <a href="https://getvidya.ai/" class="eh-featured-btn" target="_blank" rel="noopener">
                                        Explore Vidya.ai
                                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </a>
                                </div>
                                <div class="eh-featured-visual"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/robot.svg" alt="" loading="lazy"></div>
                            </div>

                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/star.svg" alt="" loading="lazy"></span> Featured - NEW</h4>
                                <a href="https://getvidya.ai/" class="eh-dl" target="_blank" rel="noopener">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/robot.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Vidya.ai <span class="eh-badge new">New</span></div>
                                        <div class="eh-dl-desc">AI-powered education platform with intelligent automation</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/products/education-crm/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/chart-bar.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Education CRM <span class="eh-badge popular">Popular</span></div>
                                        <div class="eh-dl-desc">Complete CRM solution for educational institutions</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/products/mobile-crm/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/mobile.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Mobile CRM</div>
                                        <div class="eh-dl-desc">Manage admissions on the go</div>
                                    </div>
                                </a>
                            </div>

                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bullseye.svg" alt="" loading="lazy"></span> Core CRM</h4>
                                <a href="<?php echo esc_url(home_url('/products/application-management-system/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/file.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Application Management</div>
                                        <div class="eh-dl-desc">Streamline application processing</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/admission-management-software/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/check-circle.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Admission Management</div>
                                        <div class="eh-dl-desc">End-to-end admission workflow</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/online-admission-software/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/globe.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Online Admissions</div>
                                        <div class="eh-dl-desc">Digital application portal</div>
                                    </div>
                                </a>
                            </div>

                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/comments.svg" alt="" loading="lazy"></span> Communication</h4>
                                <a href="<?php echo esc_url(home_url('/products/chatbot-for-education/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/robot.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">AI Chatbot <span class="eh-badge trending">Trending</span></div>
                                        <div class="eh-dl-desc">24/7 student engagement</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/products/whatsapp-api/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/whatsapp.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">WhatsApp Business</div>
                                        <div class="eh-dl-desc">Connect via WhatsApp</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/products/ivr/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/phone.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">IVR System</div>
                                        <div class="eh-dl-desc">Intelligent call routing</div>
                                    </div>
                                </a>
                            </div>

                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bolt.svg" alt="" loading="lazy"></span> Automation</h4>
                                <a href="<?php echo esc_url(home_url('/advanced-marketing-automation/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/rocket.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Marketing Automation</div>
                                        <div class="eh-dl-desc">AI-powered campaigns</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/lead-nurturing/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bullseye.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Lead Nurturing</div>
                                        <div class="eh-dl-desc">Strategic engagement</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/inbuilt-reporting-and-analytics/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/chart-bar.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Analytics Dashboard</div>
                                        <div class="eh-dl-desc">Real-time insights</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="eh-quick">
                            <div class="eh-quick-title">⚡ Quick Access</div>
                            <div class="eh-quick-grid">
                                <a href="https://getvidya.ai/" class="eh-quick-link" target="_blank" rel="noopener"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/robot.svg" alt="" loading="lazy"> Vidya.ai - NEW</a>
                                <a href="<?php echo esc_url(home_url('/products/')); ?>" class="eh-quick-link"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/box.svg" alt="" loading="lazy"> All Products</a>
                                <a href="<?php echo esc_url(home_url('/seamless-integration/')); ?>" class="eh-quick-link"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/link.svg" alt="" loading="lazy"> Integrations</a>
                                <a href="<?php echo esc_url(home_url('/book-demo/')); ?>" class="eh-quick-link"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/film.svg" alt="" loading="lazy"> Schedule Demo</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solutions Mega Menu -->
                <div class="eh-nav-item">
                    <a href="#" class="eh-nav-link" role="button" aria-haspopup="true">Solutions
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-mega">
                        <div class="eh-mega-grid three-col">
                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/graduation-cap.svg" alt="" loading="lazy"></span> Admission Solutions</h4>
                                <a href="<?php echo esc_url(home_url('/admission-management-software/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/file.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Admission Management</div>
                                        <div class="eh-dl-desc">Complete admission lifecycle</div>
                                    </div>
                                    <svg class="eh-nested-indicator" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <div class="eh-nested">
                                        <a href="<?php echo esc_url(home_url('/student-admission-software/')); ?>" class="eh-dl">
                                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/users.svg" alt="" loading="lazy"></div>
                                            <div class="eh-dl-content">
                                                <div class="eh-dl-title">Student Admission</div>
                                                <div class="eh-dl-desc">Manage applications</div>
                                            </div>
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/online-admission-management-system/')); ?>" class="eh-dl">
                                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/globe.svg" alt="" loading="lazy"></div>
                                            <div class="eh-dl-content">
                                                <div class="eh-dl-title">Online System</div>
                                                <div class="eh-dl-desc">Digital admissions</div>
                                            </div>
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/university-admission-software/')); ?>" class="eh-dl">
                                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/landmark.svg" alt="" loading="lazy"></div>
                                            <div class="eh-dl-content">
                                                <div class="eh-dl-title">University Software</div>
                                                <div class="eh-dl-desc">For universities</div>
                                            </div>
                                        </a>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/enrollment-management-software/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/chart-bar.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Enrollment Management</div>
                                        <div class="eh-dl-desc">Track student enrollment</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/walk-in-management-system/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/users.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Walk-in Management</div>
                                        <div class="eh-dl-desc">Track campus visits</div>
                                    </div>
                                </a>
                            </div>

                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/globe-americas.svg" alt="" loading="lazy"></span> Study Abroad</h4>
                                <a href="<?php echo esc_url(home_url('/study-abroad-software/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/plane.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Study Abroad CRM</div>
                                        <div class="eh-dl-desc">International students</div>
                                    </div>
                                    <svg class="eh-nested-indicator" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <div class="eh-nested">
                                        <a href="<?php echo esc_url(home_url('/overseas-education-crm/')); ?>" class="eh-dl">
                                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/map.svg" alt="" loading="lazy"></div>
                                            <div class="eh-dl-content">
                                                <div class="eh-dl-title">Overseas Education</div>
                                                <div class="eh-dl-desc">Global programs</div>
                                            </div>
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/crm-for-overseas-education-consultant/')); ?>" class="eh-dl">
                                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/user-tie.svg" alt="" loading="lazy"></div>
                                            <div class="eh-dl-content">
                                                <div class="eh-dl-title">For Consultants</div>
                                                <div class="eh-dl-desc">Consultant software</div>
                                            </div>
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/study-abroad-management-software/')); ?>" class="eh-dl">
                                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/clipboard.svg" alt="" loading="lazy"></div>
                                            <div class="eh-dl-content">
                                                <div class="eh-dl-title">Management Suite</div>
                                                <div class="eh-dl-desc">Complete solution</div>
                                            </div>
                                        </a>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/crm-for-education-agent/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/handshake.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Education Agents</div>
                                        <div class="eh-dl-desc">For recruitment agents</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/crm-for-education-consultant/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/briefcase.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Education Consultants</div>
                                        <div class="eh-dl-desc">Consulting business tools</div>
                                    </div>
                                </a>
                            </div>

                            <div class="eh-mega-col">
                                <h4><span class="eh-col-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bullseye.svg" alt="" loading="lazy"></span> Recruitment &amp; Lead Management</h4>
                                <a href="<?php echo esc_url(home_url('/student-recruitment-software/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/users.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Student Recruitment</div>
                                        <div class="eh-dl-desc">Attract top students</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/centralised-lead-management/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bullseye.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Lead Management</div>
                                        <div class="eh-dl-desc">Centralized tracking</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/strategic-lead-nurturing/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/seedling.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Lead Nurturing</div>
                                        <div class="eh-dl-desc">Convert more leads</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/crm-enrollment-management/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/chart-line.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Enrollment CRM</div>
                                        <div class="eh-dl-desc">Boost enrollment</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industries -->
                <div class="eh-nav-item">
                    <a href="<?php echo esc_url(home_url('/industries/')); ?>" class="eh-nav-link">Industries
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-dropdown">
                        <a href="<?php echo esc_url(home_url('/industries/higher-education-crm/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/graduation-cap.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Higher Education</div>
                                <div class="eh-dl-desc">Universities &amp; colleges</div>
                            </div>
                            <svg class="eh-nested-indicator" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            <div class="eh-nested">
                                <a href="<?php echo esc_url(home_url('/university-crm/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/landmark.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">University CRM</div>
                                        <div class="eh-dl-desc">For universities</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/crm-for-higher-educational-institutions/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/book.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Higher Ed Institutions</div>
                                        <div class="eh-dl-desc">Comprehensive solution</div>
                                    </div>
                                </a>
                                <a href="<?php echo esc_url(home_url('/higher-ed-crm/')); ?>" class="eh-dl">
                                    <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bullseye.svg" alt="" loading="lazy"></div>
                                    <div class="eh-dl-content">
                                        <div class="eh-dl-title">Higher Ed CRM</div>
                                        <div class="eh-dl-desc">Complete platform</div>
                                    </div>
                                </a>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/industries/school-crm/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/school.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">K-12 Schools</div>
                                <div class="eh-dl-desc">Primary &amp; secondary education</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/industries/coaching-institute-crm/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/book.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Coaching Institutes</div>
                                <div class="eh-dl-desc">Training &amp; coaching centers</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/industries/edtech-crm/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/laptop.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">EdTech Companies</div>
                                <div class="eh-dl-desc">Online learning platforms</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/industries/overseas-crm/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/globe-americas.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Overseas Education</div>
                                <div class="eh-dl-desc">Study abroad consultants</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/industries/vocational-crm/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/tools.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Vocational Training</div>
                                <div class="eh-dl-desc">Skills &amp; certifications</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/crm-for-training-providers/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/book-open.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Training Providers</div>
                                <div class="eh-dl-desc">Professional training</div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Resources -->
                <div class="eh-nav-item">
                    <a href="#" class="eh-nav-link" role="button" aria-haspopup="true">Resources
                        <svg class="eh-chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="eh-dropdown">
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/newspaper.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Blogs</div>
                                <div class="eh-dl-desc">Discover the latest admissions nuggets to improve your admissions process efficiency</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/ebooks/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/book-open.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Ebooks</div>
                                <div class="eh-dl-desc">Get the industry-relevant guides that will help you scale your admissions</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/webinars/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/video.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Webinars</div>
                                <div class="eh-dl-desc">Join our live sessions and learn the latest admissions trends from leading experts</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/testimonials-and-case-studies/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/star.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Case Studies</div>
                                <div class="eh-dl-desc">Find out how our top customers growing using our admissions platform</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/bullhorn.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">News &amp; Media</div>
                                <div class="eh-dl-desc">Get up to speed with the latest news about ExtraaEdge</div>
                            </div>
                        </a>
                        <div class="eh-divider"></div>
                        <a href="<?php echo esc_url(home_url('/help/')); ?>" class="eh-dl">
                            <div class="eh-dl-icon"><img class="eh-svg" src="https://www.extraaedge.com/wp-content/uploads/icons/question-circle.svg" alt="" loading="lazy"></div>
                            <div class="eh-dl-content">
                                <div class="eh-dl-title">Help Center</div>
                                <div class="eh-dl-desc">Documentation &amp; FAQs</div>
                            </div>
                        </a>
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

        /* ── Header scroll-shadow + search bar wiring (advanced nav) ── */
        (function(){
            var hdr  = document.getElementById('site-header');
            var inp  = document.getElementById('ehSearchInput');
            var clr  = document.getElementById('ehSearchClear');
            var res  = document.getElementById('ehSearchResults');
            if (hdr) {
                window.addEventListener('scroll', function () {
                    hdr.classList.toggle('scrolled', window.scrollY > 50);
                }, { passive: true });
            }
            if (inp && res) {
                inp.addEventListener('focus', function () { res.classList.add('active'); });
                inp.addEventListener('blur',  function () { setTimeout(function () { res.classList.remove('active'); }, 200); });
                inp.addEventListener('input', function () {
                    var q = inp.value.trim().toLowerCase();
                    var items = res.querySelectorAll('.eh-result-item');
                    items.forEach(function (a) {
                        a.style.display = (!q || a.textContent.toLowerCase().indexOf(q) !== -1) ? '' : 'none';
                    });
                    res.classList.add('active');
                });
                inp.addEventListener('keydown', function (e) { if (e.key === 'Escape') { inp.blur(); res.classList.remove('active'); } });
            }
            if (clr && inp) {
                clr.addEventListener('click', function () { inp.value = ''; inp.focus(); });
            }
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
