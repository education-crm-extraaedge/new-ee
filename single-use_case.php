<?php
/**
 * Single Industry Template — W3C VALID + SEO + AEO/GEO + CRAWLABILITY OPTIMIZED
 *
 * Cloned from single-product.php intentionally: the 'industry' CPT shares the
 * same tabbed meta-box editor and the same post-meta keys (_seo_title,
 * _hero_h1, _logos, _features, _content_sections, etc.) so single-industry
 * renders identically with editor-supplied content. WordPress auto-loads
 * this file for any single 'industry' post (e.g. /industries/higher-education/).
 *
 * Original single-product header (kept for reference):
 * ────────────────────────────────────────────────────
 *
 * ─── SOURCE ORDER (serial for Google + AI crawlers) ───
 *  1. Meta box data fetched once (PHP top)
 *  2. usecase_seo_meta_tags() injects on wp_head:
 *       - description / robots / canonical (only if header.php didn't)
 *       - Open Graph (product type) + Twitter
 *       - SoftwareApplication schema (with image + aggregateRating)
 *       - Article schema (dateModified + author)
 *       - Speakable schema (AEO / voice search)
 *       - Review schema (testimonials)
 *       - FAQ schema (text must match visible FAQ exactly)
 *  3. get_header() — DOCTYPE / nav / breadcrumb
 *  4. Inline critical CSS (preserved)
 *  5. <main id="main-content"> opens
 *  6. <section class="hero"> with single <h1>
 *  7. Logo marquee (lazy)
 *  8. TOC zone wrapper (sticky sidebar + content column)
 *  9. <section> EduCRM (h2)
 * 10. <section> Features (h2 → h3)
 * 11. <section> Alternating content sections (h2 → h3)
 * 12. <section> Bottom CTA + Products
 * 13. <section> Testimonials (Review schema source)
 * 14. <section> AI Demo workflow
 * 15. <section> FAQ (FAQPage schema source — text matches 1:1)
 * 16. </main>
 * 17. JS (TOC scrollspy, reveal, flow, video, AI cycle, FAQ accordion)
 * 18. get_footer()
 *
 * (No "Template Name:" header — this file auto-loads for single 'industry' posts via the WordPress template hierarchy.)
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

// ══════════════════════════════════════════════════════════
// FETCH ALL CUSTOM FIELD DATA
// ══════════════════════════════════════════════════════════
$pid = get_the_ID();

$seo_title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title();
$seo_desc      = get_post_meta($pid, '_seo_description', true);
$seo_keywords  = get_post_meta($pid, '_seo_keywords', true);
$og_image      = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
$canonical     = get_post_meta($pid, '_canonical_url', true) ?: get_permalink();
$schema_type   = get_post_meta($pid, '_schema_type', true) ?: 'SoftwareApplication';
$twitter_card  = get_post_meta($pid, '_twitter_card', true) ?: 'summary_large_image';
$twitter_title = get_post_meta($pid, '_twitter_title', true) ?: $seo_title;
$twitter_desc  = get_post_meta($pid, '_twitter_desc', true) ?: $seo_desc;

$hero_badge        = get_post_meta($pid, '_hero_badge', true);
$hero_h1_before    = get_post_meta($pid, '_hero_h1_before', true);
$hero_h1_highlight = get_post_meta($pid, '_hero_h1_highlight', true);
$hero_h1_after     = get_post_meta($pid, '_hero_h1_after', true);
$hero_desc         = get_post_meta($pid, '_hero_description', true);
$hero_proofs       = get_post_meta($pid, '_hero_proofs', true) ?: array();
$stats             = get_post_meta($pid, '_stats', true) ?: array();
$result_badge      = get_post_meta($pid, '_result_badge', true);
$tags              = get_post_meta($pid, '_tags', true) ?: array();
$hero_cta_text     = get_post_meta($pid, '_hero_cta_text', true);
$hero_cta_url      = get_post_meta($pid, '_hero_cta_url', true);
$hero_cta2_text    = get_post_meta($pid, '_hero_cta2_text', true);
$hero_cta2_url     = get_post_meta($pid, '_hero_cta2_url', true);
$trust_rating      = get_post_meta($pid, '_trust_rating', true);
$trust_text        = get_post_meta($pid, '_trust_text', true);
$compliance        = get_post_meta($pid, '_compliance', true) ?: array();
$form_embed        = get_post_meta($pid, '_form_embed', true);

$logo_badge          = get_post_meta($pid, '_logo_badge', true);
$logo_title_line1    = get_post_meta($pid, '_logo_title_line1', true);
$logo_title          = get_post_meta($pid, '_logo_title', true);
$logo_sub            = get_post_meta($pid, '_logo_sub', true);
$logos               = function_exists('ee_get_client_logos') ? ee_get_client_logos($pid) : (get_post_meta($pid, '_logos', true) ?: array());
$logo_footer_cta     = get_post_meta($pid, '_logo_footer_cta', true);
$logo_footer_cta_url = get_post_meta($pid, '_logo_footer_cta_url', true);
$logo_live_text      = get_post_meta($pid, '_logo_live_text', true);

$educrm_h2   = get_post_meta($pid, '_educrm_h2', true);
$educrm_p1   = get_post_meta($pid, '_educrm_p1', true);
$educrm_p2   = get_post_meta($pid, '_educrm_p2', true);
$educrm_p3   = get_post_meta($pid, '_educrm_p3', true);
$growth_val  = get_post_meta($pid, '_growth_val', true);
$growth_text = get_post_meta($pid, '_growth_text', true);
$flow_steps  = get_post_meta($pid, '_flow_steps', true) ?: array();

$features_h2 = get_post_meta($pid, '_features_h2', true);
$features    = get_post_meta($pid, '_features', true) ?: array();

$sections = get_post_meta($pid, '_content_sections', true) ?: array();

$bottom_label    = get_post_meta($pid, '_bottom_label', true);
$bottom_h2       = get_post_meta($pid, '_bottom_h2', true);
$bottom_h3       = get_post_meta($pid, '_bottom_h3', true);
$bottom_cta_text = get_post_meta($pid, '_bottom_cta_text', true);
$bottom_cta_url  = get_post_meta($pid, '_bottom_cta_url', true);
$products        = get_post_meta($pid, '_products', true) ?: array();

$testi_tagline = get_post_meta($pid, '_testi_tagline', true);
$testi_title   = get_post_meta($pid, '_testi_title', true);
$testi_sub     = get_post_meta($pid, '_testi_sub', true);
$metrics       = get_post_meta($pid, '_testi_metrics', true) ?: array();
$testimonials  = get_post_meta($pid, '_testimonials', true) ?: array();

$aidemo_h2         = get_post_meta($pid, '_aidemo_h2', true);
$aidemo_sub        = get_post_meta($pid, '_aidemo_sub', true);
$aidemo_cta_text   = get_post_meta($pid, '_aidemo_cta_text', true);
$aidemo_cta_url    = get_post_meta($pid, '_aidemo_cta_url', true);
$aidemo_trust      = get_post_meta($pid, '_aidemo_trust', true);
$aidemo_expert_img = get_post_meta($pid, '_aidemo_expert_img', true);
$workflow_nodes    = get_post_meta($pid, '_workflow_nodes', true) ?: array();

$faq_badge    = get_post_meta($pid, '_faq_badge', true);
$faq_title    = get_post_meta($pid, '_faq_title', true);
$faq_subtitle = get_post_meta($pid, '_faq_subtitle', true);
$faqs         = get_post_meta($pid, '_faqs', true) ?: array();

$toc_enabled = get_post_meta($pid, '_toc_enabled', true);
$toc_items   = get_post_meta($pid, '_toc_items', true) ?: array();


// SEO META INJECTED INTO wp_head()
function usecase_seo_meta_tags() {
    if (!is_singular('use_case')) return;
    global $post;
    $pid           = $post->ID;
    $seo_title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title();
    $seo_desc      = get_post_meta($pid, '_seo_description', true);
    $seo_keywords  = get_post_meta($pid, '_seo_keywords', true);
    $og_image      = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $canonical     = get_post_meta($pid, '_canonical_url', true) ?: get_permalink();
    $schema_type   = get_post_meta($pid, '_schema_type', true) ?: 'SoftwareApplication';
    $twitter_card  = get_post_meta($pid, '_twitter_card', true) ?: 'summary_large_image';
    $twitter_title = get_post_meta($pid, '_twitter_title', true) ?: $seo_title;
    $twitter_desc  = get_post_meta($pid, '_twitter_desc', true) ?: $seo_desc;
    $faqs          = get_post_meta($pid, '_faqs', true) ?: array();
    $testimonials  = get_post_meta($pid, '_testimonials', true) ?: array();
    $features      = get_post_meta($pid, '_features', true) ?: array();
    $trust_rating  = get_post_meta($pid, '_trust_rating', true);
    ?>
    <?php
    /* ─── NOTE ───
     * description, robots, author, canonical, OG, Twitter, hreflang, geo,
     * theme-color, fonts, preconnect — ALL handled in header.php (sitewide).
     * Header.php conditionally skips description/canonical/OG/Twitter when
     * the corresponding _seo_* meta exists (so no double output).
     *
     * Here we ONLY emit per-page JSON-LD schemas that header.php cannot
     * generate without post context: SoftwareApplication, Article (with
     * Speakable), BreadcrumbList, FAQPage, Product Reviews.
     */
    ?>

    <?php if($seo_keywords): ?><meta name="keywords" content="<?php echo esc_attr($seo_keywords); ?>"><?php endif; ?>

    <?php
    // ─── SoftwareApplication / Product schema (with image + aggregateRating) ───
    $feature_list = array();
    if (is_array($features)) {
        foreach ($features as $f) if (!empty($f['title'])) $feature_list[] = wp_strip_all_tags($f['title']);
    }
    $sw_schema = array(
        '@context'           => 'https://schema.org',
        '@type'              => $schema_type,
        '@id'                => $canonical . '#software',
        'name'               => $seo_title,
        'description'        => $seo_desc,
        'url'                => $canonical,
        'applicationCategory'=> 'BusinessApplication',
        'operatingSystem'    => 'Web, Android, iOS',
        'inLanguage'         => 'en-IN',
        'datePublished'      => get_the_date('c', $pid),
        'dateModified'       => get_the_modified_date('c', $pid),
        'offers'             => array(
            '@type'        => 'Offer',
            'availability' => 'https://schema.org/InStock',
            'priceCurrency'=> 'USD',
            'price'        => '0',
        ),
        'provider'           => array('@id'=>'https://www.extraaedge.com/#organization'),
        'publisher'          => array('@id'=>'https://www.extraaedge.com/#organization'),
    );
    if ($og_image)              $sw_schema['image']          = $og_image;
    if (!empty($feature_list))  $sw_schema['featureList']    = $feature_list;
    // NOTE: aggregateRating intentionally omitted from SoftwareApplication —
    // it lives on the Product schema below (the canonical "rated entity")
    // to prevent Google from counting the same rating across multiple
    // schema types as separate Review snippets.
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($sw_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    // ─── Article schema with Speakable (AEO / voice search) ───
    $article_schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'Article',
        '@id'              => $canonical . '#article',
        'headline'         => $seo_title,
        'description'      => $seo_desc,
        'image'            => $og_image,
        'url'              => $canonical,
        'datePublished'    => get_the_date('c', $pid),
        'dateModified'     => get_the_modified_date('c', $pid),
        'inLanguage'       => 'en-IN',
        'mainEntityOfPage' => $canonical,
        'author'           => array('@type'=>'Organization','name'=>'ExtraaEdge','@id'=>'https://www.extraaedge.com/#organization'),
        'publisher'        => array('@id'=>'https://www.extraaedge.com/#organization'),
        'speakable'        => array(
            '@type'       => 'SpeakableSpecification',
            'cssSelector' => array('.hero-h1', '.hero-desc', '.edu-crm-p', '.alt-desc', '.faq-q', '.faq-inner'),
        ),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($article_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    // ─── BreadcrumbList ───
    $breadcrumb_schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        '@id'             => $canonical . '#breadcrumb',
        'itemListElement' => array(
            array('@type'=>'ListItem','position'=>1,'name'=>'Home','item'=>home_url('/')),
            array('@type'=>'ListItem','position'=>2,'name'=>'Products','item'=>home_url('/products/')),
            array('@type'=>'ListItem','position'=>3,'name'=>get_the_title(),'item'=>$canonical),
        ),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    // ─── FAQ schema (text MUST match visible — Google penalty otherwise) ───
    if (!empty($faqs) && is_array($faqs)) {
        $faq_entities = array();
        foreach ($faqs as $faq) {
            if (empty($faq['question'])) continue;
            $faq_entities[] = array(
                '@type'          => 'Question',
                'name'           => wp_strip_all_tags($faq['question']),
                'acceptedAnswer' => array('@type'=>'Answer','text'=>wp_strip_all_tags($faq['answer'])),
            );
        }
        if (!empty($faq_entities)) {
            $faq_schema = array('@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>$faq_entities);
            echo "\n<script type=\"application/ld+json\">" . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
        }
    }

    // ─── Product schema with embedded Reviews + AggregateRating + Offers ───
    // Reviews are nested inside Product.review[] so itemReviewed is implicit
    // (the parent Product) — omitting itemReviewed prevents Google from
    // duplicating each Review as a standalone entity.
    if (!empty($testimonials) && is_array($testimonials)) {
        $reviews = array();
        foreach ($testimonials as $t) {
            if (empty($t['name']) || empty($t['quote'])) continue;
            $author = array('@type' => 'Person', 'name' => wp_strip_all_tags($t['name']));
            if (!empty($t['role']))        $author['jobTitle'] = wp_strip_all_tags($t['role']);
            if (!empty($t['institution'])) $author['worksFor'] = array('@type' => 'Organization', 'name' => wp_strip_all_tags($t['institution']));
            $reviews[] = array(
                '@type'        => 'Review',
                'reviewRating' => array('@type'=>'Rating','ratingValue'=>'5','bestRating'=>'5','worstRating'=>'1'),
                'author'       => $author,
                'reviewBody'   => wp_strip_all_tags($t['quote']),
                'datePublished'=> get_the_date('Y-m-d', $pid),
            );
        }
        if (!empty($reviews)) {
            $product_schema = array(
                '@context'        => 'https://schema.org',
                '@type'           => 'Product',
                '@id'             => $canonical . '#product',
                'name'            => $seo_title,
                'description'     => $seo_desc,
                'image'           => $og_image,
                'url'             => $canonical,
                'brand'           => array('@type' => 'Brand', 'name' => 'ExtraaEdge'),
                'category'        => 'Education CRM Software',
                'review'          => $reviews,
                'aggregateRating' => array(
                    '@type'       => 'AggregateRating',
                    'ratingValue' => (string) ($trust_rating ?: '4.9'),
                    'reviewCount' => '500',
                    'bestRating'  => '5',
                    'worstRating' => '1',
                ),
                'offers'          => array(
                    '@type'         => 'Offer',
                    'availability'  => 'https://schema.org/InStock',
                    'priceCurrency' => 'USD',
                    'price'         => '0',
                    'url'           => $canonical,
                    'priceValidUntil' => date('Y-12-31'),
                    'seller'        => array('@id' => 'https://www.extraaedge.com/#organization'),
                ),
            );
            echo "\n<script type=\"application/ld+json\">" . wp_json_encode($product_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
        }
    }
}
add_action('wp_head', 'usecase_seo_meta_tags');

get_header();
?>

<style>
body.single-product { max-width: none !important; width: 100%; margin: 0; padding: 0; }
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --orange:#DE6E30;--orange-light:#F08040;--orange-pale:rgba(222,110,48,.08);
  --blue:#19335D;--blue-light:rgba(25,51,93,.06);
  --white:#FFFFFF;--off-white:#F8FAFC;--gray-100:#F1F5F9;--gray-200:#E2E8F0;--gray-400:#94A3B8;--gray-600:#475569;--text-dark:#0F172A;
  --font-h:'Inter',sans-serif;--font-b:'Inter',sans-serif;
  --radius-sm:8px;--radius-md:16px;--radius-lg:24px;--radius-xl:32px;--radius-full:9999px;
  --shadow-sm:0 2px 8px rgba(25,51,93,.06);--shadow-md:0 8px 24px rgba(25,51,93,.10);--shadow-lg:0 24px 60px rgba(25,51,93,.14);--shadow-xl:0 40px 90px rgba(25,51,93,.18);
  --ease:cubic-bezier(.22,1,.36,1);--transition:all .4s var(--ease);
  --toc-width:220px;
}
html{scroll-behavior:smooth;scroll-padding-top:90px}
body{font-family:var(--font-b);background:var(--white);color:var(--text-dark);line-height:1.6;-webkit-font-smoothing:antialiased;font-size:16px}
img{max-width:100%;height:auto;display:block}
a{text-decoration:none;color:inherit;transition:var(--transition)}
button{font-family:inherit;border:none;cursor:pointer;background:none}
.visually-hidden{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;white-space:nowrap!important;border:0!important}

.toc-zone-wrapper{display:grid;grid-template-columns:var(--toc-width) 1fr;align-items:start;width:100%;position:relative}
.toc-column{position:sticky;top:100px;align-self:start;padding:20px 12px 20px 16px;max-height:calc(100vh - 120px);overflow-y:auto;overflow-x:hidden;scrollbar-width:thin;scrollbar-color:var(--orange) transparent}
.toc-column::-webkit-scrollbar{width:3px}
.toc-column::-webkit-scrollbar-thumb{background:var(--orange);border-radius:10px}
.toc-content-column{min-width:0;width:100%}
.toc-wrapper{background:rgba(255,255,255,.6);-webkit-backdrop-filter:blur(18px) saturate(160%);backdrop-filter:blur(18px) saturate(160%);border-radius:var(--radius-lg);border:1px solid rgba(255,255,255,.75);box-shadow:0 8px 32px rgba(25,51,93,.10),0 2px 8px rgba(25,51,93,.06),inset 0 1px 0 rgba(255,255,255,.85);padding:18px 14px;position:relative;overflow:hidden}
.toc-wrapper::after{content:'';position:absolute;top:0;left:14px;right:14px;height:2px;background:linear-gradient(90deg,transparent,var(--orange),transparent);border-radius:0 0 2px 2px;opacity:.6}
.toc-progress{position:absolute;top:0;left:0;width:3px;height:0;background:linear-gradient(180deg,var(--orange),var(--orange-light));border-radius:2px;transition:height .3s ease-out}
.toc-header{display:flex;align-items:center;gap:8px;margin-bottom:14px;padding-bottom:12px;border-bottom:1px solid rgba(25,51,93,.10)}
.toc-icon{width:22px;height:22px;background:linear-gradient(135deg,var(--orange),var(--orange-light));border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 2px 8px rgba(222,110,48,.30)}
.toc-icon svg{width:12px;height:12px;fill:#fff}
.toc-title{font-family:var(--font-h);font-size:10px;font-weight:800;color:var(--blue);letter-spacing:1px;text-transform:uppercase}
.toc-list{list-style:none;display:flex;flex-direction:column;gap:1px}
.toc-item{position:relative}
.toc-link{display:flex;align-items:center;gap:7px;padding:6px 8px;font-family:var(--font-b);font-size:11px;font-weight:500;color:rgba(71,85,105,.9);border-radius:8px;transition:all .25s var(--ease);position:relative;line-height:1.3}
.toc-link .toc-num{display:inline-flex;align-items:center;justify-content:center;width:16px;height:16px;border-radius:50%;background:rgba(241,245,249,.8);color:var(--gray-400);font-size:9px;font-weight:700;flex-shrink:0;transition:.25s}
.toc-link::before{content:'';position:absolute;left:0;top:50%;transform:translateY(-50%);width:3px;height:0;background:var(--orange);border-radius:2px;transition:height .25s var(--ease)}
.toc-link:hover{color:var(--blue);background:rgba(222,110,48,.10);padding-left:12px}
.toc-link:hover::before{height:60%}
.toc-link:hover .toc-num{background:rgba(222,110,48,.12);color:var(--orange)}
.toc-link.active{color:var(--orange);background:rgba(222,110,48,.12);font-weight:700;padding-left:12px}
.toc-link.active::before{height:70%}
.toc-link.active .toc-num{background:var(--orange);color:#fff;box-shadow:0 2px 6px rgba(222,110,48,.35)}

.container{max-width:1280px;margin:0 auto;padding:0 24px}
.pulse-dot{width:8px;height:8px;background:var(--orange);border-radius:50%;position:relative;flex-shrink:0}
.pulse-dot::after{content:'';position:absolute;inset:0;background:var(--orange);border-radius:50%;animation:pulse-ring 2s ease-out infinite}
@keyframes pulse-ring{0%{transform:scale(1);opacity:.8}100%{transform:scale(3);opacity:0}}
.green-dot{width:8px;height:8px;background:#10B981;border-radius:50%;position:relative;flex-shrink:0}
.green-dot::after{content:'';position:absolute;inset:0;background:#10B981;border-radius:50%;animation:pulse-ring 2s ease-out infinite}
.float-badge{position:absolute;background:rgba(255,255,255,.96);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);padding:10px 18px;border-radius:var(--radius-full);box-shadow:var(--shadow-md);display:flex;align-items:center;gap:8px;font-family:var(--font-h);font-size:11px;font-weight:700;color:var(--blue);border:1px solid rgba(222,110,48,.18);z-index:4;white-space:nowrap}
.btn-primary{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:var(--orange);color:#fff;font-family:var(--font-h);font-weight:700;font-size:15px;padding:16px 36px;border-radius:var(--radius-md);transition:var(--transition);box-shadow:0 8px 24px rgba(222,110,48,.30);border:2px solid transparent}
.btn-primary:hover,.btn-primary:focus{transform:translateY(-3px);box-shadow:0 16px 36px rgba(222,110,48,.40);background:#c85d20}
.btn-secondary{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:transparent;color:var(--blue);font-family:var(--font-h);font-weight:700;font-size:15px;padding:16px 36px;border-radius:var(--radius-md);transition:var(--transition);border:2px solid var(--blue)}
.btn-secondary:hover,.btn-secondary:focus{background:var(--blue);color:#fff;transform:translateY(-3px)}
.btn-rounded{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:var(--orange);color:#fff;font-family:var(--font-h);font-weight:700;font-size:15px;padding:18px 48px;border-radius:var(--radius-full);transition:var(--transition);box-shadow:0 8px 24px rgba(222,110,48,.30)}
.btn-rounded:hover,.btn-rounded:focus{transform:translateY(-3px);box-shadow:0 16px 36px rgba(222,110,48,.40);background:#c85d20}
.feature-list{list-style:none;display:flex;flex-direction:column;gap:12px;margin-bottom:28px}
.feature-item{display:flex;align-items:flex-start;gap:14px;background:var(--off-white);padding:14px 18px;border-radius:var(--radius-md);border-left:4px solid var(--gray-200);transition:var(--transition)}
.feature-item:hover{border-left-color:var(--orange);background:#FFF7F2;transform:translateX(8px);box-shadow:0 8px 20px rgba(222,110,48,.08)}
.feature-icon{width:26px;height:26px;background:var(--orange);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px}
.feature-icon svg{width:14px;height:14px;fill:#fff}
.feature-text{font-family:var(--font-b);font-size:15px;font-weight:600;color:var(--blue);line-height:1.5}
@keyframes float-ud{0%,100%{transform:translateY(0)}50%{transform:translateY(-18px)}}
.float-anim{animation:float-ud 6s ease-in-out infinite}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s var(--ease),transform .7s var(--ease)}
.reveal.visible{opacity:1;transform:translateY(0)}
.section-divider{width:100%;height:1px;background:linear-gradient(to right,transparent,var(--gray-200),transparent)}

.hero{position:relative;background:var(--white);overflow:hidden;padding:40px 0;margin:0}
.hero-bg{position:absolute;inset:0;pointer-events:none;z-index:0}
.hero-blob{position:absolute;border-radius:50%;filter:blur(80px);opacity:.7}
.hero-blob-1{width:600px;height:600px;top:-15%;right:-8%;background:radial-gradient(circle,rgba(222,110,48,.10) 0%,transparent 70%)}
.hero-blob-2{width:500px;height:500px;bottom:-10%;left:-5%;background:radial-gradient(circle,rgba(25,51,93,.07) 0%,transparent 70%)}
.hero-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(25,51,93,.025) 1px,transparent 1px),linear-gradient(90deg,rgba(25,51,93,.025) 1px,transparent 1px);background-size:60px 60px}
.hero-layout{display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:center;padding:0 24px;position:relative;z-index:2}
.hero-badge{display:inline-flex;align-items:center;gap:10px;background:var(--blue-light);color:var(--blue);font-family:var(--font-h);font-weight:800;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:10px 22px;border-radius:var(--radius-full);margin-bottom:20px;border:1px solid rgba(25,51,93,.12)}
.hero-h1{font-family:var(--font-h);font-size:clamp(34px,4.5vw,62px);line-height:1.08;color:var(--blue);font-weight:900;margin-bottom:18px;letter-spacing:-.03em}
.hero-h1 span{color:var(--orange);position:relative}
.hero-h1 span::after{content:'';position:absolute;bottom:-4px;left:0;right:0;height:3px;background:var(--orange);border-radius:2px;opacity:.4}
.hero-desc{font-size:clamp(16px,1.4vw,18px);line-height:1.7;color:var(--gray-600);margin-bottom:22px;max-width:600px}
.proof-bar{background:var(--white);border-left:5px solid var(--orange);padding:16px 24px;border-radius:0 var(--radius-md) var(--radius-md) 0;margin-bottom:22px;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;gap:8px}
.proof-item{display:flex;align-items:center;gap:10px;font-family:var(--font-h);font-weight:700;font-size:13px;color:var(--blue)}
.proof-item::before{content:'✓';color:var(--orange);font-weight:900;font-size:14px}
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:22px}
.stat-card{background:var(--off-white);padding:18px 12px;border-radius:var(--radius-md);text-align:center;border:1px solid transparent;transition:var(--transition);cursor:default}
.stat-card:hover{background:var(--white);border-color:var(--orange);transform:translateY(-6px);box-shadow:0 16px 32px rgba(222,110,48,.12)}
.stat-num{display:block;font-family:var(--font-h);font-size:clamp(26px,2.8vw,36px);color:var(--orange);font-weight:900;line-height:1}
.stat-label{font-family:var(--font-h);font-size:9px;font-weight:700;text-transform:uppercase;color:var(--gray-600);margin-top:6px;display:block;letter-spacing:.5px}
.result-badge{display:inline-block;background:var(--blue);color:#fff;padding:10px 24px;border-radius:var(--radius-sm);font-family:var(--font-h);font-weight:700;font-size:14px;margin-bottom:22px}
.tag-row{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:22px}
.tag{background:var(--gray-100);color:var(--blue);font-family:var(--font-h);font-size:10px;font-weight:700;padding:7px 14px;border-radius:6px;text-transform:uppercase;letter-spacing:.5px;transition:var(--transition)}
.tag:hover{background:var(--orange-pale);color:var(--orange)}
.cta-row{display:flex;gap:14px;margin-bottom:28px;flex-wrap:wrap}
.trust-bar{border-top:1px solid var(--gray-200);padding-top:20px}
.trust-rating{font-family:var(--font-h);font-weight:800;font-size:14px;color:var(--blue);margin-bottom:14px}
.trust-rating span{font-weight:400;font-size:12px;color:var(--gray-400);margin-left:6px}
.compliance-row{display:flex;gap:28px;align-items:center;flex-wrap:wrap}
.compliance-item{display:flex;align-items:center;gap:10px;font-family:var(--font-h);font-size:11px;font-weight:700;color:var(--gray-600)}
.compliance-item img{height:28px;width:auto;object-fit:contain}
.hero-form-aside{position:sticky;top:20px;z-index:3}
.hero-form-card{background:var(--white);border-radius:var(--radius-xl);padding:clamp(24px,3vw,40px);box-shadow:var(--shadow-xl);border:1px solid rgba(25,51,93,.06);position:relative}
.hero-form-card::before{content:"Convert more students. Automatically.";position:absolute;top:-15px;left:50%;transform:translateX(-50%);background:var(--orange);color:#fff;padding:6px 20px;border-radius:var(--radius-full);font-family:var(--font-h);font-size:10px;font-weight:800;text-transform:uppercase;white-space:nowrap;letter-spacing:1px;box-shadow:0 8px 16px rgba(222,110,48,.25)}
.secure-label{text-align:center;margin-top:18px;font-family:var(--font-h);font-size:10px;color:var(--gray-400);font-weight:800;text-transform:uppercase;letter-spacing:2px}

/* ─── Form Widget — Force LIGHT THEME (overrides dark inputs from widget CSS) ─── */
.hero-form-card label,
#ee-form-7 label {
    color: var(--blue) !important;
    font-weight: 600 !important;
    font-size: 13px !important;
    margin-bottom: 6px !important;
    display: block !important;
}
.hero-form-card input[type="text"],
.hero-form-card input[type="email"],
.hero-form-card input[type="tel"],
.hero-form-card input[type="url"],
.hero-form-card input[type="number"],
.hero-form-card select,
.hero-form-card textarea,
#ee-form-7 input[type="text"],
#ee-form-7 input[type="email"],
#ee-form-7 input[type="tel"],
#ee-form-7 input[type="url"],
#ee-form-7 input[type="number"],
#ee-form-7 select,
#ee-form-7 textarea {
    background-color: #ffffff !important;
    color: #19335D !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 10px !important;
    padding: 12px 14px !important;
    font-size: 14px !important;
    font-family: 'Inter', sans-serif !important;
    width: 100% !important;
    box-shadow: none !important;
    transition: border-color .2s ease, box-shadow .2s ease !important;
}
.hero-form-card input:focus,
.hero-form-card select:focus,
.hero-form-card textarea:focus,
#ee-form-7 input:focus,
#ee-form-7 select:focus,
#ee-form-7 textarea:focus {
    outline: none !important;
    border-color: #DE6E30 !important;
    box-shadow: 0 0 0 3px rgba(222,110,48,0.12) !important;
}
.hero-form-card input::placeholder,
.hero-form-card textarea::placeholder,
#ee-form-7 input::placeholder,
#ee-form-7 textarea::placeholder {
    color: #94a3b8 !important;
    opacity: 1 !important;
}
.hero-form-card input[type="submit"],
.hero-form-card button[type="submit"],
#ee-form-7 input[type="submit"],
#ee-form-7 button[type="submit"] {
    background-color: #DE6E30 !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 12px !important;
    padding: 14px 28px !important;
    font-size: 15px !important;
    font-weight: 700 !important;
    font-family: 'Inter', sans-serif !important;
    width: 100% !important;
    cursor: pointer !important;
    transition: all .3s ease !important;
    box-shadow: 0 8px 20px rgba(222,110,48,.25) !important;
}
.hero-form-card input[type="submit"]:hover,
.hero-form-card button[type="submit"]:hover,
#ee-form-7 input[type="submit"]:hover,
#ee-form-7 button[type="submit"]:hover {
    background-color: #c85d20 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 12px 28px rgba(222,110,48,.35) !important;
}
.hero-form-card .iti,
.hero-form-card .iti__country-list,
#ee-form-7 .iti,
#ee-form-7 .iti__country-list {
    background-color: #ffffff !important;
    color: #19335D !important;
}
/* intl-tel-input phone field — make the flag dropdown sit cleanly on
   the left and push the input text 78px right so the placeholder /
   typed number never overlaps with the +91 prefix. */
.hero-form-card .iti,
#ee-form-7 .iti { width: 100% !important; display: block !important; position: relative; }
.hero-form-card .iti input[type="tel"],
#ee-form-7 .iti input[type="tel"] {
    padding-left: 78px !important;
    width: 100% !important;
}
.hero-form-card .iti__flag-container,
#ee-form-7 .iti__flag-container {
    position: absolute !important;
    top: 0; bottom: 0; left: 0;
    z-index: 2;
    display: flex !important;
    align-items: center;
}
.hero-form-card .iti__selected-flag,
#ee-form-7 .iti__selected-flag {
    height: 100% !important;
    padding: 0 8px 0 14px !important;
    background: transparent !important;
    border-right: 1px solid rgba(25,51,93,0.10) !important;
    display: flex !important;
    align-items: center;
    gap: 6px;
}
.hero-form-card .iti__selected-dial-code,
#ee-form-7 .iti__selected-dial-code {
    color: #19335D !important;
    font-weight: 700;
    font-size: 0.95rem;
}
.hero-form-card .iti__arrow,
#ee-form-7 .iti__arrow { margin-left: 4px !important; }
.hero-form-card form > div,
#ee-form-7 form > div {
    margin-bottom: 12px !important;
}

.logo-section{background:var(--white);padding:40px 20px;overflow:hidden}
.logo-section--no-header{padding-top:16px;padding-bottom:24px}
.logo-header{text-align:center;margin-bottom:24px}
.logo-badge{display:inline-block;background:var(--orange-pale);color:var(--orange);padding:6px 18px;border-radius:var(--radius-full);font-family:var(--font-h);font-size:12px;font-weight:600;margin-bottom:10px;letter-spacing:.5px;text-transform:uppercase}
.logo-title{font-family:var(--font-h);color:var(--blue);font-size:clamp(1.5rem,3.5vw,2.4rem);line-height:1.2;margin-bottom:10px;font-weight:700}
.logo-sub{color:var(--gray-600);font-size:1rem;max-width:520px;margin:0 auto}
.marquee-wrap{position:relative;padding:14px 0}
.marquee-wrap::before,.marquee-wrap::after{content:"";position:absolute;top:0;width:160px;height:100%;z-index:2;pointer-events:none}
.marquee-wrap::before{left:0;background:linear-gradient(to right,var(--white),transparent)}
.marquee-wrap::after{right:0;background:linear-gradient(to left,var(--white),transparent)}
.marquee-track{display:flex;gap:24px;width:max-content;padding-bottom:14px}
.marquee-left{animation:scroll-left 40s linear infinite}
.marquee-right{animation:scroll-right 40s linear infinite}
@keyframes scroll-left{from{transform:translateX(0)}to{transform:translateX(calc(-50% - 12px))}}
@keyframes scroll-right{from{transform:translateX(calc(-50% - 12px))}to{transform:translateX(0)}}
.marquee-stack{display:flex;flex-direction:column;gap:14px}
.marquee-wrap:hover .marquee-left,.marquee-wrap:hover .marquee-right{animation-play-state:paused}
.logo-card{width:180px;height:90px;background:var(--off-white);border:1px solid var(--gray-200);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;padding:18px;transition:var(--transition);flex-shrink:0}
.logo-card:hover{border-color:var(--orange);transform:translateY(-5px);box-shadow:var(--shadow-md)}
.logo-card img{max-width:100%;max-height:100%;object-fit:contain;filter:grayscale(100%);opacity:.65;transition:var(--transition);font-size:0;color:transparent}
.logo-card:hover img{filter:grayscale(0);opacity:1}
.logo-footer{margin-top:20px;display:flex;flex-direction:column;align-items:center;gap:12px}
.live-indicator{display:flex;align-items:center;gap:10px;font-family:var(--font-h);font-size:13px;font-weight:600;color:var(--blue)}

.edu-crm-section{background:var(--white);padding:40px 0;overflow:hidden}
.edu-crm-layout{display:grid;grid-template-columns:1.2fr .8fr;gap:48px;align-items:start;padding:0 24px}
.edu-crm-h2{font-family:var(--font-h);font-size:clamp(2rem,4.5vw,2.8rem);margin-bottom:20px;line-height:1.1;color:var(--blue);font-weight:800}
.edu-crm-p{font-size:1.05rem;line-height:1.75;margin-bottom:16px;color:var(--gray-600);text-align:justify}
.growth-card{background:var(--blue);color:#fff;padding:24px;border-radius:var(--radius-lg);margin-top:24px;display:flex;align-items:center;gap:20px;box-shadow:var(--shadow-lg);position:relative;overflow:hidden}
.growth-card::after{content:'';position:absolute;top:-50%;right:-10%;width:200px;height:200px;background:var(--orange);opacity:.12;border-radius:50%}
.growth-val{font-family:var(--font-h);font-size:2.6rem;font-weight:900;color:var(--orange);line-height:1;flex-shrink:0}
.growth-text{font-size:.9rem;opacity:.9;line-height:1.6}
.flow-panel{position:sticky;top:40px;background:var(--off-white);border-radius:32px;padding:28px;border:1px solid rgba(25,51,93,.06)}
.flow-live{display:flex;align-items:center;gap:8px;font-family:var(--font-h);font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--orange);margin-bottom:20px}
.flow-steps{display:flex;flex-direction:column;gap:12px}
.flow-step{background:#fff;padding:14px;border-radius:14px;display:flex;align-items:center;gap:14px;transition:all .4s var(--ease);border:1px solid transparent;opacity:.55;filter:grayscale(1);cursor:pointer}
.flow-step.active{opacity:1;filter:grayscale(0);transform:translateX(12px) scale(1.04);border-color:var(--orange);box-shadow:0 16px 36px rgba(222,110,48,.14)}
.step-icon{width:38px;height:38px;background:var(--gray-100);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--blue);flex-shrink:0;transition:.3s}
.flow-step.active .step-icon{background:var(--orange);color:#fff}
.step-label{font-family:var(--font-h);font-weight:600;font-size:14px;color:var(--blue)}
.data-log{margin-top:20px;background:#111827;border-radius:10px;padding:12px;font-family:'Courier New',monospace;font-size:11px;color:#10B981;height:70px;overflow:hidden}
.log-line{margin-bottom:4px;white-space:nowrap}

.features-section{background:var(--white);padding:40px 0}
.features-header{text-align:center;margin-bottom:24px}
.features-h2{font-family:var(--font-h);font-weight:800;font-size:clamp(1.8rem,4vw,2.4rem);color:var(--blue);letter-spacing:-.02em}
.features-grid{display:flex;gap:14px;justify-content:center;align-items:stretch;flex-wrap:wrap;padding:0 24px}
.feat-card{flex:1 1 180px;max-width:220px;background:var(--white);border:1px solid rgba(25,51,93,.08);border-radius:16px;padding:18px 14px;display:flex;flex-direction:column;align-items:center;text-align:center;transition:var(--transition)}
.feat-card:hover{transform:translateY(-10px);border-color:var(--orange);box-shadow:0 20px 40px rgba(222,110,48,.12)}
.feat-img-wrap{width:100%;height:100px;background:var(--off-white);border-radius:10px;margin-bottom:12px;display:flex;align-items:center;justify-content:center;overflow:hidden;border:1px solid rgba(25,51,93,.03)}
.feat-img{max-width:90%;max-height:90%;object-fit:contain;transition:var(--transition)}
.feat-card:hover .feat-img{transform:scale(1.08)}
.feat-title{font-family:var(--font-h);font-weight:700;font-size:13px;color:var(--blue);display:flex;flex-direction:column;align-items:center;gap:8px;transition:.3s}
.feat-card:hover .feat-title{color:var(--orange)}
.feat-dot{width:6px;height:6px;background:var(--orange);border-radius:50%;position:relative}

.alt-section{padding:40px 0;background:var(--white);width:100%;overflow:hidden}
.alt-layout{max-width:1200px;margin:0 auto;padding:0 24px;display:flex;align-items:center;gap:48px;flex-wrap:wrap}
.alt-content{flex:1;min-width:300px}
.alt-visual{flex:1.1;min-width:300px;position:relative}
.alt-h2{font-family:var(--font-h);font-size:clamp(28px,4vw,42px);font-weight:700;color:var(--blue);line-height:1.2;margin-bottom:14px}
.alt-desc{font-size:16px;line-height:1.75;color:var(--gray-600);margin-bottom:20px}
.alt-h3{font-family:var(--font-h);font-size:20px;font-weight:600;color:var(--blue);margin-bottom:16px;line-height:1.4}
.alt-img{width:100%;height:auto;border-radius:20px;box-shadow:var(--shadow-xl);display:block}

.bottom-cta{background:var(--white);padding:40px 0;overflow:hidden}
.bottom-cta-inner{max-width:1240px;margin:0 auto;padding:0 24px;display:flex;align-items:center;gap:48px;flex-wrap:wrap}
.cta-content{flex:1;min-width:300px}
.cta-label-wrap{display:inline-flex;align-items:center;gap:10px;background:var(--orange-pale);color:var(--orange);font-family:var(--font-h);font-size:13px;font-weight:600;padding:8px 18px;border-radius:var(--radius-full);margin-bottom:18px;border:1px solid rgba(222,110,48,.15)}
.cta-h2{font-family:var(--font-h);font-size:clamp(30px,4vw,48px);color:var(--blue);margin-bottom:16px;line-height:1.1;font-weight:800}
.cta-h3{font-family:var(--font-b);font-size:clamp(16px,1.8vw,19px);color:var(--gray-600);margin-bottom:28px;font-weight:400;max-width:560px;line-height:1.7}
.cta-visual-card{flex:1;min-width:340px;background:var(--white);border:1px solid var(--gray-200);padding:32px;border-radius:var(--radius-xl);box-shadow:var(--shadow-xl)}
.featured-label{font-family:var(--font-h);font-size:11px;font-weight:800;color:var(--gray-400);letter-spacing:3px;margin-bottom:18px;text-align:center;text-transform:uppercase}
.product-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
.product-item{background:var(--off-white);padding:18px;border-radius:16px;border:1px solid var(--gray-200);display:flex;flex-direction:column;transition:var(--transition)}
.product-item:hover{background:var(--white);border-color:var(--orange);transform:translateY(-6px);box-shadow:var(--shadow-md)}
.product-logo{width:44px;height:44px;margin-bottom:12px}
.product-logo img{width:100%;height:100%;object-fit:contain}
.product-item h3{font-family:var(--font-h);font-size:14px;color:var(--blue);margin-bottom:6px;font-weight:700}
.product-view-link{font-size:12px;color:var(--orange);font-weight:700}

.testimonials-section{padding:40px 0;background:var(--off-white);overflow:hidden;position:relative}
.testi-inner{max-width:1280px;margin:0 auto;padding:0 24px;position:relative;z-index:10}
.testi-header{text-align:center;margin-bottom:28px}
.testi-tagline{font-family:var(--font-h);color:var(--orange);font-weight:700;letter-spacing:2px;text-transform:uppercase;font-size:13px;margin-bottom:10px;display:inline-block}
.testi-title{font-family:var(--font-h);font-size:clamp(30px,5vw,48px);font-weight:700;line-height:1.15;margin-bottom:14px;color:var(--blue)}
.testi-sub{color:var(--gray-600);font-size:16px;max-width:600px;margin:0 auto}
.testi-metrics{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:28px}
.testi-metric{background:var(--white);padding:24px 20px;border-radius:18px;text-align:center;border:1px solid rgba(25,51,93,.06);transition:var(--transition)}
.testi-metric:hover{border-color:var(--orange);transform:translateY(-8px);box-shadow:var(--shadow-md)}
.testi-metric-val{display:block;font-family:var(--font-h);font-size:38px;font-weight:900;color:var(--orange);margin-bottom:4px}
.testi-metric-lab{font-family:var(--font-h);font-size:11px;font-weight:700;color:var(--gray-600);text-transform:uppercase;letter-spacing:1px}
.testi-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(360px,1fr));gap:24px}
.testi-card{background:#fff;border-radius:24px;overflow:hidden;border:1px solid rgba(25,51,93,.05);box-shadow:var(--shadow-xl);display:flex;flex-direction:column;transition:var(--transition)}
.testi-card:hover{transform:translateY(-12px) scale(1.01);box-shadow:0 40px 70px -15px rgba(25,51,93,.18)}
.vid-wrap{width:100%;aspect-ratio:16/9;background:#000;position:relative;cursor:pointer;overflow:hidden}
.vid-wrap img{width:100%;height:100%;object-fit:cover;transition:transform 1s ease}
.vid-wrap:hover img{transform:scale(1.08)}
.vid-wrap::after{content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:64px;height:64px;background:#fff;border-radius:50%;box-shadow:0 10px 30px rgba(0,0,0,.25);transition:var(--transition);z-index:5}
.vid-wrap::before{content:'';position:absolute;top:50%;left:50%;transform:translate(-40%,-50%);border-left:18px solid var(--orange);border-top:12px solid transparent;border-bottom:12px solid transparent;z-index:6;transition:var(--transition)}
.vid-wrap.playing::before,.vid-wrap.playing::after{display:none}
.card-body{padding:28px;flex-grow:1;display:flex;flex-direction:column}
.card-quote{font-size:14px;line-height:1.75;color:var(--gray-600);margin-bottom:20px;font-style:italic}
.card-profile{margin-top:auto;display:flex;align-items:center;gap:14px;padding-top:18px;border-top:1px solid var(--gray-100)}
.card-avatar{width:60px;height:60px;border-radius:14px;object-fit:cover;border:3px solid rgba(222,110,48,.2);transition:var(--transition);flex-shrink:0}
.testi-card:hover .card-avatar{border-color:var(--orange);border-radius:50%}
.card-name{font-family:var(--font-h);font-size:17px;font-weight:700;margin-bottom:3px;color:var(--blue)}
.card-role{font-size:12px;font-weight:700;color:var(--orange);margin-bottom:2px}
.card-inst{font-size:11px;color:var(--gray-400);font-weight:600;text-transform:uppercase}

.ai-demo-section{padding:40px 5%;background:var(--white);overflow:hidden;position:relative}
.ai-demo-inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center}
.ai-cta-content{position:relative;z-index:10}
.ai-cta-h2{font-family:var(--font-h);font-size:clamp(32px,4.5vw,50px);font-weight:700;line-height:1.15;margin-bottom:16px;color:var(--blue)}
.ai-cta-sub{font-size:clamp(16px,2vw,19px);line-height:1.7;margin-bottom:28px;color:var(--gray-600);max-width:540px}
.ai-cta-actions{display:flex;flex-direction:column;gap:16px}
.btn-cta-rounded{display:inline-block;background:var(--orange);color:#fff;padding:18px 44px;font-family:var(--font-h);font-size:17px;font-weight:700;border-radius:var(--radius-full);transition:var(--transition);box-shadow:0 12px 30px rgba(222,110,48,.30);width:fit-content}
.btn-cta-rounded:hover,.btn-cta-rounded:focus{transform:translateY(-5px);box-shadow:0 20px 40px rgba(222,110,48,.45);background:#c75c24}
.ai-trust{display:flex;align-items:center;gap:10px;font-family:var(--font-h);font-size:13px;font-weight:600;color:var(--gray-600)}
.ai-story-engine{position:relative;height:520px;display:flex;justify-content:center;align-items:center}
.expert-center{position:relative;width:240px;height:240px;z-index:5}
.expert-center img{width:100%;height:100%;object-fit:cover;border-radius:50%;border:8px solid #fff;box-shadow:var(--shadow-xl)}
.workflow-node{position:absolute;background:rgba(255,255,255,.98);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);border-radius:14px;padding:10px 14px;box-shadow:var(--shadow-md);display:flex;align-items:center;gap:10px;z-index:10;width:220px;opacity:.3;transform:scale(.88);transition:var(--transition);border:1px solid rgba(25,51,93,.06);cursor:pointer}
.workflow-node.wn-active{opacity:1;border-color:var(--orange);box-shadow:0 20px 40px rgba(222,110,48,.18);z-index:100}
.wn-num{width:36px;height:36px;background:var(--blue);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0;font-family:var(--font-h);font-weight:700;font-size:14px;transition:var(--transition)}
.workflow-node.wn-active .wn-num{background:var(--orange)}
.wn-title{font-family:var(--font-h);font-size:13px;font-weight:700;color:var(--blue);margin:0}
.wn-sub{font-size:11px;color:var(--gray-600);margin:0}
.wn-1{top:2%;left:50%;transform:translateX(-50%)}
.wn-2{top:18%;right:-2%}
.wn-3{bottom:18%;right:-2%}
.wn-4{bottom:2%;left:50%;transform:translateX(-50%)}
.wn-5{bottom:18%;left:-2%}
.wn-6{top:18%;left:-2%}

.faq-section{padding:40px 0;background:var(--white)}
.faq-container{max-width:980px;margin:0 auto;padding:0 24px}
.faq-header{text-align:center;margin-bottom:28px}
.faq-outcome-badge{display:inline-block;padding:6px 18px;background:var(--orange-pale);color:var(--orange);border-radius:var(--radius-full);font-family:var(--font-h);font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;border:1px solid rgba(222,110,48,.18)}
.faq-title{font-family:var(--font-h);font-weight:700;font-size:clamp(28px,5vw,44px);color:var(--blue);margin:0 0 10px}
.faq-subtitle{font-size:17px;color:var(--gray-600);max-width:660px;margin:0 auto}
.faq-list{display:flex;flex-direction:column;gap:12px}
.faq-item{background:#fff;border:1px solid var(--gray-200);border-radius:14px;overflow:hidden;transition:var(--transition)}
.faq-item:hover{border-color:rgba(222,110,48,.4);box-shadow:var(--shadow-sm)}
.faq-item.faq-open{border-color:var(--orange);box-shadow:0 8px 28px rgba(222,110,48,.10)}
.faq-trigger{width:100%;display:flex;align-items:center;justify-content:space-between;padding:18px 24px;background:none;border:none;cursor:pointer;text-align:left;outline:none}
.faq-q{font-family:var(--font-h);font-weight:600;font-size:17px;color:var(--blue);padding-right:18px;line-height:1.4}
.faq-item.faq-open .faq-q{color:var(--orange)}
.faq-icon{width:22px;height:22px;position:relative;flex-shrink:0}
.faq-icon::before,.faq-icon::after{content:'';position:absolute;background:var(--blue);transition:.3s ease}
.faq-icon::before{width:100%;height:2px;top:10px;left:0}
.faq-icon::after{width:2px;height:100%;left:10px;top:0}
.faq-item.faq-open .faq-icon::after{transform:rotate(90deg);opacity:0}
.faq-item.faq-open .faq-icon::before{background:var(--orange)}
.faq-body{max-height:0;overflow:hidden;transition:max-height .5s cubic-bezier(.4,0,.2,1)}
.faq-inner{padding:0 24px 22px}
.faq-inner p{font-size:15px;color:var(--gray-600);line-height:1.75;margin-bottom:10px}
.faq-inner p:last-child{margin-bottom:0}
.faq-inner ul,.faq-inner ol{font-size:15px;color:var(--gray-600);line-height:1.75;margin:0 0 12px;padding-left:22px}
.faq-inner ul{list-style:disc}
.faq-inner ol{list-style:decimal}
.faq-inner li{margin:4px 0;padding-left:4px}
.faq-inner li::marker{color:var(--orange)}
.faq-inner ul:last-child,.faq-inner ol:last-child{margin-bottom:0}
.faq-inner a{color:var(--orange);text-decoration:underline}
.faq-inner strong{color:var(--blue);font-weight:700}

@media(max-width:1200px){.toc-zone-wrapper{display:block}.toc-column{display:none}.toc-content-column{width:100%}}
@media(max-width:1150px){.hero-layout{grid-template-columns:1fr;text-align:center;gap:30px}.hero-desc,.hero-badge{margin-left:auto;margin-right:auto}.proof-bar{border-left:0;border-top:5px solid var(--orange);border-radius:var(--radius-md);text-align:left}.cta-row,.tag-row,.compliance-row{justify-content:center}.hero-form-card{max-width:520px;margin:0 auto}.edu-crm-layout{grid-template-columns:1fr;padding:20px 20px;gap:30px}.flow-panel{position:relative;top:0}}
@media(max-width:1024px){.alt-layout{flex-direction:column;text-align:center;padding:20px 20px;gap:30px}.alt-visual{order:-1!important;margin-bottom:20px;width:100%}.feature-item{text-align:left}.feat-card{flex:0 1 calc(33.33% - 16px);max-width:none}.bottom-cta-inner{flex-direction:column;gap:30px}.cta-h3{margin-left:auto;margin-right:auto}.ai-demo-inner{grid-template-columns:1fr;gap:30px}.ai-cta-content{text-align:center}.ai-cta-sub,.btn-cta-rounded{margin-left:auto;margin-right:auto}.ai-trust{justify-content:center}.testi-cards{grid-template-columns:1fr}}
@media(max-width:768px){.hero{padding:30px 0}.hero-layout{padding:20px 18px 30px}.stats-grid{grid-template-columns:1fr 1fr}.feat-card{flex:0 1 100%;max-width:none}.features-grid{flex-direction:column}.btn-primary,.btn-secondary{width:100%;text-align:center}.cta-row{flex-direction:column}.float-badge{display:none}.product-grid{grid-template-columns:1fr}.growth-card{flex-direction:column;text-align:center}.compliance-item{width:100%;justify-content:center}.logo-section{padding:24px 12px}.btn-rounded{width:100%}.testi-metrics{grid-template-columns:1fr 1fr}.faq-trigger{padding:16px 18px}.faq-q{font-size:15px}.faq-inner{padding:0 18px 20px}.edu-crm-section,.features-section,.alt-section,.bottom-cta,.testimonials-section,.ai-demo-section,.faq-section{padding:28px 0}}
@media(max-width:480px){.stats-grid{grid-template-columns:1fr}.hero-h1{font-size:30px}.testi-metrics{grid-template-columns:1fr}}
</style>

<main id="main-content" role="main">

<section class="hero" id="top" aria-labelledby="hero-heading">
  <div class="hero-bg" aria-hidden="true">
    <div class="hero-grid"></div>
    <div class="hero-blob hero-blob-1" id="heroBlob1"></div>
    <div class="hero-blob hero-blob-2" id="heroBlob2"></div>
  </div>
  <div class="container">
    <div class="hero-layout">
      <article>
        <?php if($hero_badge): ?><div class="hero-badge reveal" role="status"><span class="pulse-dot" aria-hidden="true"></span><?php echo esc_html($hero_badge); ?></div><?php endif; ?>
        <h1 id="hero-heading" class="hero-h1 reveal"><?php echo esc_html($hero_h1_before); ?><?php if($hero_h1_highlight): ?> <span><?php echo esc_html($hero_h1_highlight); ?></span> <?php endif; ?><?php echo esc_html($hero_h1_after); ?></h1>
        <?php if($hero_desc): ?><p class="hero-desc reveal"><?php echo ee_inline_links($hero_desc); ?></p><?php endif; ?>
        <?php if(!empty($hero_proofs)): ?><div class="proof-bar reveal" role="complementary" aria-label="Trust indicators"><?php foreach($hero_proofs as $proof): ?><div class="proof-item"><?php echo esc_html($proof); ?></div><?php endforeach; ?></div><?php endif; ?>
        <?php if(!empty($stats)): ?><div class="stats-grid reveal" role="region" aria-label="Key statistics"><?php foreach($stats as $stat): ?><div class="stat-card"><span class="stat-num"><?php echo esc_html($stat['number']); ?></span><span class="stat-label"><?php echo esc_html($stat['label']); ?></span></div><?php endforeach; ?></div><?php endif; ?>
        <?php if($result_badge): ?><div class="result-badge reveal"><?php echo esc_html($result_badge); ?></div><?php endif; ?>
        <?php if(!empty($tags)): ?><nav class="tag-row reveal" aria-label="Industry segments"><?php foreach($tags as $tag): ?><span class="tag"><?php echo esc_html($tag); ?></span><?php endforeach; ?></nav><?php endif; ?>
        <div class="cta-row reveal">
          <?php if($hero_cta_text): ?><a href="<?php echo esc_url($hero_cta_url ?: '#admission-form'); ?>" class="btn-primary" aria-label="<?php echo esc_attr($hero_cta_text); ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg><?php echo esc_html($hero_cta_text); ?></a><?php endif; ?>
          <?php if($hero_cta2_text): ?><a href="<?php echo esc_url($hero_cta2_url ?: '#demo'); ?>" class="btn-secondary" aria-label="<?php echo esc_attr($hero_cta2_text); ?>"><?php echo esc_html($hero_cta2_text); ?></a><?php endif; ?>
        </div>
        <?php if($trust_rating || !empty($compliance)): ?>
        <footer class="trust-bar reveal">
          <?php if($trust_rating): ?><div class="trust-rating"><span aria-hidden="true">&#9733;</span> Rated <?php echo esc_html($trust_rating); ?>/5 by Education Leaders <?php if($trust_text): ?><span>(<?php echo esc_html($trust_text); ?>)</span><?php endif; ?></div><?php endif; ?>
          <?php if(!empty($compliance)): ?><div class="compliance-row"><?php foreach($compliance as $comp): ?><div class="compliance-item"><?php if(!empty($comp['image'])): ?><img src="<?php echo esc_url($comp['image']); ?>" alt="<?php echo esc_attr($comp['text'] ?: 'Compliance badge'); ?>" width="28" height="28" loading="lazy" decoding="async"><?php endif; ?><span><?php echo esc_html($comp['text']); ?></span></div><?php endforeach; ?></div><?php endif; ?>
        </footer>
        <?php endif; ?>
      </article>

      <?php if($form_embed): ?>
      <aside class="hero-form-aside reveal" id="admission-form" aria-labelledby="form-heading">
        <div class="hero-form-card">
          <h2 id="form-heading" class="visually-hidden">Book a Free Demo</h2>
          <?php echo wp_kses($form_embed, array('script'=>array('src'=>array(),'async'=>array(),'defer'=>array(),'type'=>array(),'charset'=>array(),'id'=>array()),'div'=>array('id'=>array(),'class'=>array(),'style'=>array()),'form'=>array('action'=>array(),'method'=>array(),'id'=>array(),'class'=>array()),'input'=>array('type'=>array(),'name'=>array(),'id'=>array(),'class'=>array(),'placeholder'=>array(),'required'=>array(),'value'=>array()),'textarea'=>array('name'=>array(),'id'=>array(),'class'=>array(),'placeholder'=>array(),'rows'=>array()),'select'=>array('name'=>array(),'id'=>array(),'class'=>array()),'option'=>array('value'=>array(),'selected'=>array()),'button'=>array('type'=>array(),'id'=>array(),'class'=>array()),'label'=>array('for'=>array(),'class'=>array()),'iframe'=>array('src'=>array(),'width'=>array(),'height'=>array(),'frameborder'=>array(),'loading'=>array(),'title'=>array()),'a'=>array('href'=>array(),'target'=>array(),'class'=>array(),'rel'=>array()),'p'=>array('class'=>array()),'span'=>array('class'=>array()),'br'=>array())); ?>
          <p class="secure-label" aria-label="Secure data transmission"><span aria-hidden="true">&#128274;</span> Secure Data Transmission Active</p>
        </div>
      </aside>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php if(!empty($logos)): ?>
<section class="logo-section<?php echo (!$logo_badge && !$logo_title_line1 && !$logo_title && !$logo_sub) ? ' logo-section--no-header' : ''; ?>" id="trusted-institutions" aria-labelledby="logo-title">
  <?php if($logo_badge || $logo_title_line1 || $logo_title || $logo_sub): ?>
  <header class="logo-header reveal">
    <?php if($logo_badge): ?><div class="logo-badge"><?php echo esc_html($logo_badge); ?></div><?php endif; ?>
    <?php if($logo_title_line1): ?><p style="font-family:var(--font-h);font-weight:700;font-size:1rem;color:var(--blue);margin-bottom:10px"><?php echo esc_html($logo_title_line1); ?></p><?php endif; ?>
    <?php if($logo_title): ?><h2 id="logo-title" class="logo-title"><?php echo esc_html($logo_title); ?></h2><?php endif; ?>
    <?php if($logo_sub): ?><p class="logo-sub"><?php echo ee_inline_links($logo_sub); ?></p><?php endif; ?>
  </header>
  <?php endif; ?>
  <div class="marquee-wrap" role="region" aria-label="Trusted institutions carousel">
    <?php
    /* Two-row stack — same look as the home-page logo wall. Auto-splits
       the master logo list in half so each row scrolls in the opposite
       direction; each row is duplicated for a seamless loop. */
    $logo_count = count($logos);
    $split      = (int) ceil($logo_count / 2);
    $row_a      = array_slice($logos, 0, $split);
    $row_b      = array_slice($logos, $split);
    if (empty($row_b)) { $row_b = $row_a; }
    ?>
    <div class="marquee-stack">
      <div class="marquee-track marquee-left">
        <?php for($i = 0; $i < 2; $i++): foreach($row_a as $logo): ?><div class="logo-card"><img src="<?php echo esc_url($logo['image']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" loading="lazy" decoding="async" width="180" height="90" onerror="this.closest(&apos;.logo-card&apos;).remove()"></div><?php endforeach; endfor; ?>
      </div>
      <div class="marquee-track marquee-right">
        <?php for($i = 0; $i < 2; $i++): foreach($row_b as $logo): ?><div class="logo-card"><img src="<?php echo esc_url($logo['image']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" loading="lazy" decoding="async" width="180" height="90" onerror="this.closest(&apos;.logo-card&apos;).remove()"></div><?php endforeach; endfor; ?>
      </div>
    </div>
  </div>
  <script>
  (function(){
      function cleanup(){
          document.querySelectorAll('.logo-card img').forEach(function(img){
              if (img.complete && img.naturalWidth === 0) {
                  var c = img.closest('.logo-card'); if (c) c.remove();
              }
          });
          document.querySelectorAll('.marquee-track').forEach(function(t){
              if (!t.querySelector('.logo-card')) t.style.display = 'none';
          });
      }
      if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', cleanup);
      else cleanup();
      window.addEventListener('load', cleanup);
  })();
  </script>
  <div class="logo-footer reveal">
    <?php if($logo_footer_cta): ?><a href="<?php echo esc_url($logo_footer_cta_url ?: '#admission-form'); ?>" class="btn-primary" aria-label="<?php echo esc_attr($logo_footer_cta); ?>"><?php echo esc_html($logo_footer_cta); ?></a><?php endif; ?>
    <?php if($logo_live_text): ?><div class="live-indicator"><span class="green-dot" aria-hidden="true"></span><span><?php echo esc_html($logo_live_text); ?></span></div><?php endif; ?>
  </div>
</section>
<?php endif; ?>

<div class="toc-zone-wrapper" id="toc-zone-wrapper">

  <aside class="toc-column" id="toc-column" role="complementary" aria-label="Page contents">
    <nav class="toc-wrapper" id="toc" aria-label="Table of Contents">
      <div class="toc-progress" id="toc-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
      <div class="toc-header">
        <div class="toc-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 9h14V7H3v2zm0 4h14v-2H3v2zm0 4h14v-2H3v2zm16 0h2v-2h-2v2zm0-10v2h2V7h-2zm0 6h2v-2h-2v2z"/></svg></div>
        <p class="toc-title">Contents</p>
      </div>
      <ol class="toc-list" id="toc-list">
        <?php
        if ($toc_enabled === 'custom' && !empty($toc_items)) {
            $tn = 1;
            foreach ($toc_items as $item) {
                if (empty($item['anchor'])) continue;
                if (isset($item['show']) && $item['show'] === '0') continue;
                if (empty($item['label'])) continue;
                echo '<li class="toc-item"><a href="#' . esc_attr($item['anchor']) . '" class="toc-link"><span class="toc-num">' . $tn++ . '</span>' . esc_html($item['label']) . '</a></li>';
            }
        } else {
            $n = 1;
            echo '<li class="toc-item"><a href="#top" class="toc-link"><span class="toc-num">' . $n++ . '</span>Home</a></li>';
            if (!empty($logos))         echo '<li class="toc-item"><a href="#trusted-institutions" class="toc-link"><span class="toc-num">' . $n++ . '</span>Trusted Institutions</a></li>';
            if ($educrm_h2)             echo '<li class="toc-item"><a href="#what-is-education-crm" class="toc-link"><span class="toc-num">' . $n++ . '</span>Education CRM</a></li>';
            if (!empty($features))      echo '<li class="toc-item"><a href="#features" class="toc-link"><span class="toc-num">' . $n++ . '</span>Features</a></li>';
            if (!empty($sections)) {
                foreach ($sections as $section) {
                    if (!empty($section['heading'])) echo '<li class="toc-item"><a href="#' . esc_attr($section['id']) . '" class="toc-link"><span class="toc-num">' . $n++ . '</span>' . esc_html($section['heading']) . '</a></li>';
                }
            }
            if ($bottom_h2)             echo '<li class="toc-item"><a href="#products" class="toc-link"><span class="toc-num">' . $n++ . '</span>Products</a></li>';
            if (!empty($testimonials))  echo '<li class="toc-item"><a href="#testimonials" class="toc-link"><span class="toc-num">' . $n++ . '</span>Testimonials</a></li>';
            if ($aidemo_h2)             echo '<li class="toc-item"><a href="#demo" class="toc-link"><span class="toc-num">' . $n++ . '</span>Book Demo</a></li>';
            if (!empty($faqs))          echo '<li class="toc-item"><a href="#faq" class="toc-link"><span class="toc-num">' . $n++ . '</span>FAQ</a></li>';
        }
        ?>
      </ol>
    </nav>
  </aside>

  <div class="toc-content-column">

    <?php if($educrm_h2 || $educrm_p1): ?>
    <section class="edu-crm-section" id="what-is-education-crm" aria-labelledby="edu-crm-heading">
      <div class="container">
        <div class="edu-crm-layout">
          <article>
            <?php if($educrm_h2): ?><h2 id="edu-crm-heading" class="edu-crm-h2 reveal"><?php echo esc_html($educrm_h2); ?></h2><?php endif; ?>
            <?php if($educrm_p1): ?><p class="edu-crm-p reveal"><?php echo ee_inline_links($educrm_p1); ?></p><?php endif; ?>
            <?php if($educrm_p2): ?><p class="edu-crm-p reveal"><?php echo ee_inline_links($educrm_p2); ?></p><?php endif; ?>
            <?php if($educrm_p3): ?><p class="edu-crm-p reveal"><?php echo ee_inline_links($educrm_p3); ?></p><?php endif; ?>
            <?php if($growth_val || $growth_text): ?><aside class="growth-card reveal" role="complementary"><?php if($growth_val): ?><div class="growth-val"><?php echo esc_html($growth_val); ?></div><?php endif; ?><?php if($growth_text): ?><div class="growth-text"><?php echo ee_inline_links($growth_text); ?></div><?php endif; ?></aside><?php endif; ?>
          </article>
          <?php if(!empty($flow_steps)): ?>
          <aside class="flow-panel reveal" id="flow-zone" role="complementary" aria-label="Admission processing flow">
            <div class="flow-live"><span class="pulse-dot" aria-hidden="true"></span>Product Status: Processing Admissions</div>
            <ol class="flow-steps" id="flow-stack">
              <?php foreach($flow_steps as $i => $step): ?>
              <li class="flow-step" data-step="<?php echo (int)$i; ?>" tabindex="0">
                <div class="step-icon" aria-hidden="true"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                <span class="step-label"><?php echo esc_html($step['label']); ?></span>
              </li>
              <?php endforeach; ?>
            </ol>
            <div class="data-log" id="data-log" aria-hidden="true">
              <div class="log-line">&gt; Initiating CRM Admission Core...</div>
              <div class="log-line">&gt; Listening for new inquiries...</div>
            </div>
          </aside>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <div class="section-divider" role="separator" aria-hidden="true"></div>
    <?php endif; ?>

    <?php if(!empty($features)): ?>
    <section class="features-section" id="features" aria-labelledby="features-heading">
      <div class="container">
        <?php if($features_h2): ?><header class="features-header reveal"><h2 id="features-heading" class="features-h2"><?php echo esc_html($features_h2); ?></h2></header><?php endif; ?>
        <div class="features-grid reveal" role="list">
          <?php foreach($features as $feature): ?>
          <article class="feat-card" role="listitem">
            <div class="feat-img-wrap"><img src="<?php echo esc_url($feature['image']); ?>" alt="<?php echo esc_attr($feature['alt'] ?: $feature['title']); ?>" class="feat-img" loading="lazy" decoding="async" width="200" height="110"></div>
            <h3 class="feat-title"><span class="feat-dot" aria-hidden="true"></span><?php echo esc_html($feature['title']); ?></h3>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <div class="section-divider" role="separator" aria-hidden="true"></div>
    <?php endif; ?>

    <?php if(!empty($sections)): foreach($sections as $section): ?>
    <section class="alt-section" id="<?php echo esc_attr($section['id']); ?>" aria-labelledby="sec-<?php echo esc_attr($section['id']); ?>-heading">
      <div class="alt-layout">
        <article class="alt-content reveal" style="order:<?php echo ($section['image_position'] === 'left') ? '2' : '1'; ?>">
          <h2 id="sec-<?php echo esc_attr($section['id']); ?>-heading" class="alt-h2"><?php echo esc_html($section['heading']); ?></h2>
          <?php if(!empty($section['description'])): ?><p class="alt-desc"><?php echo ee_inline_links($section['description']); ?></p><?php endif; ?>
          <?php if(!empty($section['features'])): ?>
          <h3 class="alt-h3"><?php echo esc_html(!empty($section['features_heading']) ? $section['features_heading'] : 'Key Features'); ?></h3>
          <ul class="feature-list">
            <?php foreach(explode("\n", trim($section['features'])) as $line): $line = trim($line); if($line): ?>
            <li class="feature-item"><span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg></span><span class="feature-text"><?php echo esc_html($line); ?></span></li>
            <?php endif; endforeach; ?>
          </ul>
          <?php endif; ?>
          <?php if(!empty($section['cta_text'])): ?><a href="<?php echo esc_url($section['cta_url'] ?: '#admission-form'); ?>" class="btn-primary" aria-label="<?php echo esc_attr($section['cta_text']); ?>"><?php echo esc_html($section['cta_text']); ?></a><?php endif; ?>
        </article>
        <?php if(!empty($section['image'])): ?><figure class="alt-visual reveal" style="order:<?php echo ($section['image_position'] === 'left') ? '1' : '2'; ?>"><div class="float-anim"><img src="<?php echo esc_url($section['image']); ?>" alt="<?php echo esc_attr($section['heading']); ?>" class="alt-img" loading="lazy" decoding="async" width="600" height="400"></div></figure><?php endif; ?>
      </div>
    </section>
    <div class="section-divider" role="separator" aria-hidden="true"></div>
    <?php endforeach; endif; ?>

    <?php if($bottom_h2 || !empty($products)): ?>
    <section class="bottom-cta" id="products" aria-labelledby="bottom-cta-heading">
      <div class="bottom-cta-inner">
        <div class="cta-content reveal">
          <?php if($bottom_label): ?><div class="cta-label-wrap"><span class="pulse-dot" aria-hidden="true"></span><?php echo esc_html($bottom_label); ?></div><?php endif; ?>
          <?php if($bottom_h2): ?><h2 id="bottom-cta-heading" class="cta-h2"><?php echo esc_html($bottom_h2); ?></h2><?php endif; ?>
          <?php if($bottom_h3): ?><p class="cta-h3"><?php echo ee_inline_links($bottom_h3); ?></p><?php endif; ?>
          <?php if($bottom_cta_text): ?><a href="<?php echo esc_url($bottom_cta_url ?: '#admission-form'); ?>" class="btn-primary" style="font-size:17px;padding:18px 40px" aria-label="<?php echo esc_attr($bottom_cta_text); ?>"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg><?php echo esc_html($bottom_cta_text); ?></a><?php endif; ?>
        </div>
        <?php if(!empty($products)): ?>
        <aside class="cta-visual-card reveal" role="complementary">
          <p class="featured-label">Featured Apps</p>
          <div class="product-grid">
            <?php foreach($products as $product): if(!empty($product['title'])): ?>
            <a href="<?php echo esc_url($product['url'] ?: '#'); ?>" class="product-item" rel="noopener" aria-label="<?php echo esc_attr($product['title']); ?> product page">
              <?php if(!empty($product['logo'])): ?><div class="product-logo"><img src="<?php echo esc_url($product['logo']); ?>" alt="<?php echo esc_attr($product['title']); ?>" loading="lazy" decoding="async" width="44" height="44"></div><?php endif; ?>
              <h3><?php echo esc_html($product['title']); ?></h3>
              <span class="product-view-link">View Product &#8594;</span>
            </a>
            <?php endif; endforeach; ?>
          </div>
        </aside>
        <?php endif; ?>
      </div>
    </section>
    <div class="section-divider" role="separator" aria-hidden="true"></div>
    <?php endif; ?>

    <?php if(!empty($testimonials)): ?>
    <section class="testimonials-section" id="testimonials" aria-labelledby="testi-title">
      <div class="testi-inner">
        <header class="testi-header">
          <?php if($testi_tagline): ?><span class="testi-tagline"><?php echo esc_html($testi_tagline); ?></span><?php endif; ?>
          <?php if($testi_title): ?><h2 id="testi-title" class="testi-title"><?php echo wp_kses_post($testi_title); ?></h2><?php endif; ?>
          <?php if($testi_sub): ?><p class="testi-sub"><?php echo ee_inline_links($testi_sub); ?></p><?php endif; ?>
        </header>
        <?php if(!empty($metrics)): ?>
        <div class="testi-metrics" role="region" aria-label="Customer impact metrics">
          <?php foreach($metrics as $metric): ?>
          <div class="testi-metric">
            <span class="testi-metric-val" data-target="<?php echo esc_attr($metric['target']); ?>" data-suffix="<?php echo esc_attr($metric['suffix']); ?>" <?php if(!empty($metric['locale'])): ?>data-locale="true"<?php endif; ?>>0</span>
            <span class="testi-metric-lab"><?php echo esc_html($metric['label']); ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="testi-cards">
          <?php foreach($testimonials as $i => $test): ?>
          <article class="testi-card">
<div class="vid-wrap" id="vid-<?php echo (int)$i; ?>" data-ytid="<?php echo esc_attr($test['youtube_id']); ?>" role="button" tabindex="0" aria-label="Play video testimonial from <?php echo esc_attr($test['name']); ?>">
              <img src="https://img.youtube.com/vi/<?php echo esc_attr($test['youtube_id']); ?>/maxresdefault.jpg" alt="<?php echo esc_attr($test['name']); ?> — video testimonial" loading="lazy" decoding="async" width="640" height="360">
            </div>
            <div class="card-body">
              <?php if(!empty($test['quote'])): ?><blockquote class="card-quote"><?php echo ee_inline_links($test['quote']); ?></blockquote><?php endif; ?>
              <div class="card-profile">
                <?php if(!empty($test['avatar'])): ?><img src="<?php echo esc_url($test['avatar']); ?>" class="card-avatar" alt="<?php echo esc_attr($test['name']); ?>" loading="lazy" decoding="async" width="64" height="64"><?php endif; ?>
                <div>
                  <?php if(!empty($test['name'])): ?><p class="card-name"><?php echo esc_html($test['name']); ?></p><?php endif; ?>
                  <?php if(!empty($test['role'])): ?><p class="card-role"><?php echo esc_html($test['role']); ?></p><?php endif; ?>
                  <?php if(!empty($test['institution'])): ?><span class="card-inst"><?php echo esc_html($test['institution']); ?></span><?php endif; ?>
                </div>
              </div>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <div class="section-divider" role="separator" aria-hidden="true"></div>
    <?php endif; ?>

    <?php if($aidemo_h2): ?>
    <section class="ai-demo-section" id="demo" aria-labelledby="ai-cta-heading">
      <div class="ai-demo-inner">
        <div class="ai-cta-content reveal">
          <h2 id="ai-cta-heading" class="ai-cta-h2"><?php echo esc_html($aidemo_h2); ?></h2>
          <?php if($aidemo_sub): ?><p class="ai-cta-sub"><?php echo ee_inline_links($aidemo_sub); ?></p><?php endif; ?>
          <div class="ai-cta-actions">
            <?php if($aidemo_cta_text): ?><a href="<?php echo esc_url($aidemo_cta_url ?: '#admission-form'); ?>" class="btn-cta-rounded" aria-label="<?php echo esc_attr($aidemo_cta_text); ?>"><?php echo esc_html($aidemo_cta_text); ?></a><?php endif; ?>
            <?php if($aidemo_trust): ?><div class="ai-trust"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#DE6E30" stroke-width="3" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><?php echo esc_html($aidemo_trust); ?></div><?php endif; ?>
          </div>
        </div>
        <?php if(!empty($workflow_nodes)): ?>
        <div class="ai-story-engine reveal" id="ai-engine" role="region" aria-label="AI admission workflow">
          <?php if($aidemo_expert_img): ?><div class="expert-center"><img src="<?php echo esc_url($aidemo_expert_img); ?>" alt="ExtraaEdge Admission Expert" width="240" height="240" loading="lazy" decoding="async"></div><?php endif; ?>
          <?php $positions = array('wn-1','wn-2','wn-3','wn-4','wn-5','wn-6'); foreach($workflow_nodes as $i => $node): if($i < 6): ?>
          <div class="workflow-node <?php echo esc_attr($positions[$i]); ?>" data-idx="<?php echo (int)$i; ?>" tabindex="0" role="button" aria-label="<?php echo esc_attr($node['title']); ?>">
            <div class="wn-num" aria-hidden="true"><?php echo esc_html($node['num']); ?></div>
            <div>
              <p class="wn-title"><?php echo esc_html($node['title']); ?></p>
              <p class="wn-sub"><?php echo esc_html($node['sub']); ?></p>
            </div>
          </div>
          <?php endif; endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>
    <div class="section-divider" role="separator" aria-hidden="true"></div>
    <?php endif; ?>

    <?php if(!empty($faqs)): ?>
    <section class="faq-section" id="faq" aria-labelledby="faq-title">
      <div class="faq-container">
        <header class="faq-header reveal">
          <?php if($faq_badge): ?><div class="faq-outcome-badge"><?php echo esc_html($faq_badge); ?></div><?php endif; ?>
          <?php if($faq_title): ?><h2 id="faq-title" class="faq-title"><?php echo esc_html($faq_title); ?></h2><?php endif; ?>
          <?php if($faq_subtitle): ?><p class="faq-subtitle"><?php echo ee_inline_links($faq_subtitle); ?></p><?php endif; ?>
        </header>
        <div class="faq-list" id="faq-list">
          <?php foreach($faqs as $i => $faq): ?>
          <article class="faq-item">
            <button class="faq-trigger" aria-expanded="false" aria-controls="faq-body-<?php echo (int)$i; ?>" type="button">
              <span class="faq-q"><?php echo esc_html($faq['question']); ?></span>
              <span class="faq-icon" aria-hidden="true"></span>
            </button>
            <div class="faq-body" id="faq-body-<?php echo (int)$i; ?>">
              <div class="faq-inner"><?php echo function_exists('ee_format_rich_text') ? ee_format_rich_text($faq['answer']) : wp_kses_post(wpautop($faq['answer'])); ?></div>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

  </div>
</div>

</main>

<script>
(function(){'use strict';

(function(){
  var tocLinks = document.querySelectorAll('.toc-link');
  var tocProgress = document.getElementById('toc-progress');
  if(!tocLinks.length) return;
  var isProgrammaticScroll = false, programmaticScrollTimer = null, pendingActiveLink = null;
  tocLinks.forEach(function(link){
    link.addEventListener('click', function(e){
      e.preventDefault();
      var targetId = link.getAttribute('href').substring(1);
      var targetSection = document.getElementById(targetId);
      if(!targetSection) return;
      var targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - 100;
      tocLinks.forEach(function(l){ l.classList.remove('active'); });
      link.classList.add('active');
      pendingActiveLink = link;
      isProgrammaticScroll = true;
      clearTimeout(programmaticScrollTimer);
      programmaticScrollTimer = setTimeout(function(){ isProgrammaticScroll = false; pendingActiveLink = null; }, 900);
      window.scrollTo({ top: targetPosition, behavior: 'smooth' });
    });
  });
  function buildSections(){
    var sections = [];
    tocLinks.forEach(function(link){
      var id = link.getAttribute('href').substring(1);
      var el = document.getElementById(id);
      if(el){ sections.push({ link: link, top: el.getBoundingClientRect().top + window.pageYOffset }); }
    });
    sections.sort(function(a,b){ return a.top - b.top; });
    return sections;
  }
  function updateProgressBar(){
    var zone = document.getElementById('toc-zone-wrapper');
    if(!zone || !tocProgress) return;
    var zoneTop = zone.getBoundingClientRect().top + window.pageYOffset;
    var pct = Math.max(0, Math.min(100, ((window.pageYOffset - zoneTop) / zone.offsetHeight) * 100));
    tocProgress.style.height = pct + '%';
    tocProgress.setAttribute('aria-valuenow', Math.round(pct));
  }
  function updateActiveTOC(){
    if(isProgrammaticScroll && pendingActiveLink){ updateProgressBar(); return; }
    var sections = buildSections(); if(!sections.length) return;
    var scrollPos = window.pageYOffset + 150;
    var activeSection = sections[0];
    for(var i = 0; i < sections.length; i++){ if(sections[i].top <= scrollPos){ activeSection = sections[i]; } else { break; } }
    tocLinks.forEach(function(l){ l.classList.remove('active'); });
    activeSection.link.classList.add('active');
    updateProgressBar();
  }
  var ticking = false;
  window.addEventListener('scroll', function(){
    if(!ticking){ window.requestAnimationFrame(function(){ updateActiveTOC(); ticking = false; }); ticking = true; }
  });
  window.addEventListener('resize', updateActiveTOC);
  setTimeout(updateActiveTOC, 150);
  window.addEventListener('load', updateActiveTOC);
})();

var revealEls = document.querySelectorAll('.reveal');
if('IntersectionObserver' in window){
  var revObs = new IntersectionObserver(function(entries){
    entries.forEach(function(e, i){
      if(e.isIntersecting){ setTimeout(function(){ e.target.classList.add('visible'); }, i * 55); revObs.unobserve(e.target); }
    });
  },{threshold:.12, rootMargin:'0px 0px -40px 0px'});
  revealEls.forEach(function(el){ revObs.observe(el); });
} else { revealEls.forEach(function(el){ el.classList.add('visible'); }); }

var b1 = document.getElementById('heroBlob1'); var b2 = document.getElementById('heroBlob2'); var tick = false;
window.addEventListener('scroll', function(){
  if(!tick){
    requestAnimationFrame(function(){
      var s = window.pageYOffset;
      if(b1) b1.style.transform = 'translate('+s*.08+'px,'+s*.04+'px)';
      if(b2) b2.style.transform = 'translate('+-s*.06+'px,'+-s*.02+'px)';
      tick = false;
    });
    tick = true;
  }
});

(function(){
  var fz = document.getElementById('flow-zone');
  var steps = document.querySelectorAll('#flow-stack .flow-step');
  var log = document.getElementById('data-log');
  if(!fz || !steps.length) return;
  var cur = 0, iv = null, hov = false;
  var msgs = ["Lead ID #8821 captured via Website","Auto-SMS sent to Student: 'Welcome...'","WhatsApp nurtured: Course details delivered","Transcript uploaded: AI verification passed","Fee Payment detected: INR 45,000 received","Offer Letter Released: ID #EDU-991","Counselor assigned for onboarding..."];
  function addLog(){
    if(!log) return;
    var l = document.createElement('div'); l.className = 'log-line';
    l.textContent = '> ' + msgs[Math.floor(Math.random()*msgs.length)];
    log.appendChild(l);
    if(log.childNodes.length > 5) log.removeChild(log.firstChild);
    log.scrollTop = log.scrollHeight;
  }
  function run(){ if(!hov) return; steps.forEach(function(s){ s.classList.remove('active'); }); steps[cur].classList.add('active'); if(Math.random() > .4) addLog(); cur = (cur+1) % steps.length; }
  fz.addEventListener('mouseenter', function(){ hov = true; if(!iv){ iv = setInterval(run, 1600); run(); } });
  fz.addEventListener('mouseleave', function(){ hov = false; clearInterval(iv); iv = null; steps.forEach(function(s){ s.classList.remove('active'); }); cur = 0; });
  steps.forEach(function(s, i){ s.addEventListener('click', function(){ cur = i; steps.forEach(function(x){ x.classList.remove('active'); }); s.classList.add('active'); addLog(); }); });
  if('ontouchstart' in window){ hov = true; iv = setInterval(run, 2000); }
})();

(function(){
  var triggered = false;
  function activate(){
    if(triggered) return; triggered = true;
    document.querySelectorAll('.testi-metric-val').forEach(function(el){
      var target = +el.getAttribute('data-target') || 0;
      var suffix = el.getAttribute('data-suffix') || '';
      var useLocale = el.getAttribute('data-locale') === 'true';
      var start = null, dur = 2000;
      function anim(ts){
        if(!start) start = ts;
        var p = Math.min((ts - start) / dur, 1);
        var c = Math.floor(p * target);
        el.textContent = (useLocale ? c.toLocaleString() : c) + suffix;
        if(p < 1) requestAnimationFrame(anim);
      }
      requestAnimationFrame(anim);
    });
  }
  var section = document.querySelector('.testimonials-section');
  if(!section) return;
  if('IntersectionObserver' in window){
    var obs = new IntersectionObserver(function(entries){ entries.forEach(function(e){ if(e.isIntersecting) activate(); }); }, {threshold: 0.15});
    obs.observe(section);
  } else { activate(); }
})();

(function(){
  document.querySelectorAll('.vid-wrap').forEach(function(c){
    function play(){
      if(c.classList.contains('playing')) return;
      var ytId = c.getAttribute('data-ytid'); if(!ytId) return;
      c.innerHTML = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+ytId+'?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="autoplay;encrypted-media" allowfullscreen loading="lazy" title="Customer Testimonial Video" style="display:block;aspect-ratio:16/9"></iframe>';
      c.classList.add('playing');
    }
    c.addEventListener('click', play);
    c.addEventListener('keypress', function(e){ if(e.key === 'Enter' || e.key === ' '){ e.preventDefault(); play(); } });
  });
})();

(function(){
  var eng = document.getElementById('ai-engine');
  var nodes = document.querySelectorAll('.workflow-node');
  if(!eng || !nodes.length) return;
  var cur = 0, cyc = null, on = false;
  function cycle(){ nodes.forEach(function(n){ n.classList.remove('wn-active'); }); nodes[cur].classList.add('wn-active'); cur = (cur+1) % nodes.length; }
  function start(){ if(on) return; on = true; cycle(); cyc = setInterval(cycle, 2800); }
  eng.addEventListener('mouseenter', start);
  if('IntersectionObserver' in window){
    var obs = new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting) start(); }); }, {threshold: .35});
    obs.observe(eng);
  }
  nodes.forEach(function(n, i){
    n.addEventListener('click', function(){ cur = i; clearInterval(cyc); cycle(); cyc = setInterval(cycle, 3500); });
  });
})();

(function(){
  var items = document.querySelectorAll('#faq-list .faq-item');
  items.forEach(function(item){
    var trigger = item.querySelector('.faq-trigger');
    var body = item.querySelector('.faq-body');
    if(!trigger || !body) return;
    trigger.addEventListener('click', function(){
      var open = item.classList.contains('faq-open');
      items.forEach(function(i){
        i.classList.remove('faq-open');
        var b = i.querySelector('.faq-body'); if(b) b.style.maxHeight = null;
        var t = i.querySelector('.faq-trigger'); if(t) t.setAttribute('aria-expanded','false');
      });
      if(!open){ item.classList.add('faq-open'); trigger.setAttribute('aria-expanded','true'); body.style.maxHeight = body.scrollHeight + 'px'; }
    });
  });
})();

})();
</script>

<?php get_footer(); ?>
