<?php
/**
 * single-testimonial.php — Customer testimonial / case quote
 * Schema: Review (itemReviewed: Organization ExtraaEdge)
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _testi_author, _testi_role, _testi_company, _testi_logo
 *   _testi_rating (1-5), _testi_quote, _testi_results
 *   _testi_video_url, _testi_cta_text, _testi_cta_url
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('testimonial')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $author    = get_post_meta($pid, '_testi_author', true) ?: get_the_title($pid);
    $role      = get_post_meta($pid, '_testi_role', true);
    $company   = get_post_meta($pid, '_testi_company', true);
    $rating    = (int) get_post_meta($pid, '_testi_rating', true) ?: 5;
    $quote     = get_post_meta($pid, '_testi_quote', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 50);
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'Review',
        '@id'           => $url . '#review',
        'name'          => $title,
        'description'   => $desc,
        'url'           => $url,
        'datePublished' => get_the_date('c', $pid),
        'reviewBody'    => $quote,
        'reviewRating'  => array(
            '@type'       => 'Rating',
            'ratingValue' => (string) $rating,
            'bestRating'  => '5',
            'worstRating' => '1',
        ),
        'author'        => array(
            '@type'        => 'Person',
            'name'         => $author,
            'jobTitle'     => $role,
            'worksFor'     => $company ? array('@type' => 'Organization', 'name' => $company) : null,
        ),
        'itemReviewed'  => array('@id' => 'https://www.extraaedge.com/#organization'),
        'publisher'     => array('@id' => 'https://www.extraaedge.com/#organization'),
    );
    $schema = array_filter($schema);
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$author    = get_post_meta($pid, '_testi_author', true) ?: get_the_title($pid);
$role      = get_post_meta($pid, '_testi_role', true);
$company   = get_post_meta($pid, '_testi_company', true);
$logo      = get_post_meta($pid, '_testi_logo', true);
$rating    = (int) get_post_meta($pid, '_testi_rating', true) ?: 5;
$quote     = get_post_meta($pid, '_testi_quote', true);
$results   = get_post_meta($pid, '_testi_results', true);
$video     = get_post_meta($pid, '_testi_video_url', true);
$cta_text  = get_post_meta($pid, '_testi_cta_text', true) ?: 'Book Your Demo';
$cta_url   = get_post_meta($pid, '_testi_cta_url', true) ?: '/book-demo/';
$photo     = get_the_post_thumbnail_url($pid, 'full');
?>

<style>
.ts-hero{background:linear-gradient(135deg,#F8FAFC 0%,#FFFFFF 100%);padding:60px 0 40px;text-align:center}
.ts-hero .container{max-width:920px;margin:0 auto;padding:0 24px}
.ts-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.08);color:#DE6E30;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(222,110,48,.18)}
.ts-stars{font-size:24px;letter-spacing:4px;margin-bottom:18px}
.ts-stars .on{color:#FBBF24}
.ts-stars .off{color:#E2E8F0}
.ts-quote{font-family:'Inter',sans-serif;font-size:clamp(22px,3vw,34px);line-height:1.4;color:#19335D;font-weight:700;margin:0 auto 28px;max-width:820px;font-style:italic}
.ts-quote:before{content:"\201C";font-size:64px;color:#DE6E30;line-height:0;vertical-align:-22px;margin-right:6px}
.ts-author-row{display:flex;align-items:center;justify-content:center;gap:18px}
.ts-author-row img{width:64px;height:64px;border-radius:50%;object-fit:cover;border:3px solid #fff;box-shadow:0 6px 20px rgba(25,51,93,.18)}
.ts-author-info{text-align:left;font-family:'Inter',sans-serif}
.ts-author-info b{display:block;color:#19335D;font-size:16px;font-weight:700}
.ts-author-info span{color:#475569;font-size:14px}

.ts-video{max-width:960px;margin:40px auto;padding:0 24px}
.ts-video iframe{width:100%;aspect-ratio:16/9;border:0;border-radius:18px;box-shadow:0 24px 60px rgba(25,51,93,.18)}

.ts-body{background:#fff;padding:60px 0}
.ts-body .container{max-width:920px;margin:0 auto;padding:0 24px}
.ts-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.8;font-size:17px}
.ts-body article h2{font-family:'Inter',sans-serif;font-size:clamp(22px,2.8vw,30px);font-weight:800;color:#19335D;margin:32px 0 14px}
.ts-body article p{color:#475569;margin-bottom:16px}
.ts-body article ul{margin:0 0 20px 20px;color:#475569}

.ts-results{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:18px;margin:30px 0}
.ts-result{background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:24px;text-align:center}
.ts-result b{font-family:'Inter',sans-serif;font-size:32px;font-weight:900;color:#DE6E30;display:block}
.ts-result span{font-family:'Inter',sans-serif;font-size:13px;color:#475569;font-weight:600}

.ts-cta{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;padding:60px 24px;text-align:center}
.ts-cta h2{font-family:'Inter',sans-serif;font-size:clamp(24px,3vw,36px);font-weight:800;margin:0 0 14px;color:#fff}
.ts-cta p{font-size:17px;color:rgba(255,255,255,.85);max-width:580px;margin:0 auto 26px}
.ts-cta a{display:inline-block;background:#DE6E30;color:#fff;font-family:'Inter',sans-serif;font-weight:700;padding:15px 32px;border-radius:12px;text-decoration:none}
</style>

<main id="main-content" role="main">
  <section class="ts-hero" aria-labelledby="testi-heading">
    <div class="container">
      <div class="ts-badge">⭐ Customer Story</div>
      <div class="ts-stars" aria-label="<?php echo esc_attr($rating); ?> out of 5 stars">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
          <span class="<?php echo $i <= $rating ? 'on' : 'off'; ?>">★</span>
        <?php endfor; ?>
      </div>
      <blockquote class="ts-quote" id="testi-heading"><?php echo esc_html($quote ?: wp_trim_words(wp_strip_all_tags(get_the_content()), 40)); ?></blockquote>
      <div class="ts-author-row">
        <?php if ($photo) : ?>
          <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($author); ?>" width="64" height="64" decoding="async">
        <?php elseif ($logo) : ?>
          <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($company); ?>" width="64" height="64" decoding="async">
        <?php endif; ?>
        <div class="ts-author-info">
          <b><?php echo esc_html($author); ?></b>
          <span><?php echo esc_html(trim($role . ($role && $company ? ', ' : '') . $company)); ?></span>
        </div>
      </div>
    </div>
  </section>

  <?php if ($video) : ?>
  <div class="ts-video">
    <iframe src="<?php echo esc_url($video); ?>" title="<?php echo esc_attr($author); ?> testimonial video" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <?php endif; ?>

  <section class="ts-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/Review">
        <?php the_content(); ?>

        <?php if ($results) : ?>
        <h2>Measurable Results</h2>
        <div class="ts-results">
          <?php foreach (explode("\n", trim($results)) as $line) :
            $line = trim($line);
            if (!$line) continue;
            $parts = array_map('trim', explode('|', $line, 2));
            if (count($parts) < 2) continue;
          ?>
            <div class="ts-result">
              <b><?php echo esc_html($parts[0]); ?></b>
              <span><?php echo esc_html($parts[1]); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </article>
    </div>
  </section>

  <section class="ts-cta">
    <h2>Write Your Own Success Story</h2>
    <p>Join hundreds of institutions already growing admissions with ExtraaEdge.</p>
    <a href="<?php echo esc_url($cta_url); ?>" rel="nofollow">🚀 <?php echo esc_html($cta_text); ?></a>
  </section>
</main>

<?php endwhile; get_footer(); ?>
