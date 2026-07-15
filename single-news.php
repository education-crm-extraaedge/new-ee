<?php
/**
 * single-news.php — News article landing page
 * Schema: NewsArticle
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _news_subtitle, _news_source, _news_external_url, _news_section
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('news')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $section   = get_post_meta($pid, '_news_section', true) ?: 'Education Technology';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'NewsArticle',
        '@id'           => $url . '#newsarticle',
        'headline'      => $title,
        'description'   => $desc,
        'image'         => $image ? array($image) : array(),
        'url'           => $url,
        'datePublished' => get_the_date('c', $pid),
        'dateModified'  => get_the_modified_date('c', $pid),
        'articleSection'=> $section,
        'inLanguage'    => 'en',
        'author'        => array(
            '@type' => 'Person',
            'name'  => get_the_author_meta('display_name', $post->post_author) ?: 'ExtraaEdge Newsroom',
        ),
        'publisher'     => array('@id' => 'https://www.extraaedge.com/#organization'),
        'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => $url),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_news_subtitle', true);
$source    = get_post_meta($pid, '_news_source', true);
$ext_url   = get_post_meta($pid, '_news_external_url', true);
$section   = get_post_meta($pid, '_news_section', true);
$hero_img  = get_the_post_thumbnail_url($pid, 'full');
$author    = get_the_author_meta('display_name', $post->post_author);
?>

<style>
.nw-hero{background:#fff;padding:50px 0 30px;border-bottom:1px solid #E2E8F0}
.nw-hero .container{max-width:840px;margin:0 auto;padding:0 24px;text-align:center}
.nw-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(25,51,93,.06);color:#19335D;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(25,51,93,.12)}
.nw-hero h1{font-family:'Inter',sans-serif;font-size:clamp(28px,3.8vw,44px);line-height:1.2;color:#19335D;font-weight:900;margin:0 0 14px;letter-spacing:-.02em}
.nw-hero .sub{font-size:clamp(15px,1.3vw,18px);color:#475569;line-height:1.7;margin-bottom:22px}
.nw-meta{font-family:'Inter',sans-serif;font-size:13px;color:#64748B;display:flex;justify-content:center;gap:18px;flex-wrap:wrap}
.nw-meta b{color:#19335D;font-weight:600}

.nw-feature{max-width:1000px;margin:30px auto 0;padding:0 24px}
.nw-feature img{width:100%;height:auto;border-radius:18px;box-shadow:0 24px 60px rgba(25,51,93,.14)}

.nw-body{background:#fff;padding:50px 0 60px}
.nw-body .container{max-width:760px;margin:0 auto;padding:0 24px}
.nw-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.85;font-size:17px}
.nw-body article h2{font-family:'Inter',sans-serif;font-size:clamp(22px,2.6vw,30px);font-weight:800;color:#19335D;margin:34px 0 14px}
.nw-body article h3{font-family:'Inter',sans-serif;font-size:21px;font-weight:700;color:#19335D;margin:28px 0 12px}
.nw-body article p{color:#334155;margin-bottom:18px}
.nw-body article img{max-width:100%;height:auto;border-radius:14px;margin:20px 0}
.nw-body article blockquote{border-left:4px solid #DE6E30;margin:24px 0;padding:8px 20px;color:#475569;font-style:italic;background:#F8FAFC;border-radius:0 12px 12px 0}
.nw-body article a{color:#DE6E30;font-weight:600}

.nw-ext{background:#F8FAFC;border:1px solid #E2E8F0;border-radius:14px;padding:18px 22px;margin-top:30px;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
.nw-ext span{font-family:'Inter',sans-serif;font-size:14px;color:#475569}
.nw-ext a{background:#19335D;color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:13px;padding:10px 18px;border-radius:10px;text-decoration:none}

.nw-cta{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;padding:50px 24px;text-align:center}
.nw-cta h2{font-family:'Inter',sans-serif;font-size:clamp(24px,3vw,34px);font-weight:800;margin:0 0 12px;color:#fff}
.nw-cta p{font-size:16px;color:rgba(255,255,255,.85);max-width:560px;margin:0 auto 22px}
.nw-cta a{display:inline-block;background:#DE6E30;color:#fff;font-family:'Inter',sans-serif;font-weight:700;padding:14px 30px;border-radius:12px;text-decoration:none}
</style>

<main id="main-content" role="main">
  <section class="nw-hero" aria-labelledby="news-heading">
    <div class="container">
      <div class="nw-badge">📰 <?php echo esc_html($section ?: 'News'); ?></div>
      <h1 id="news-heading"><?php the_title(); ?></h1>
      <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
      <div class="nw-meta">
        <span>By <b><?php echo esc_html($author ?: 'ExtraaEdge Newsroom'); ?></b></span>
        <span>📅 <?php echo esc_html(get_the_date('M j, Y', $pid)); ?></span>
        <?php if ($source) : ?><span>📡 <b><?php echo esc_html($source); ?></b></span><?php endif; ?>
      </div>
    </div>
  </section>

  <?php if ($hero_img) : ?>
  <figure class="nw-feature">
    <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="1000" height="560" fetchpriority="high" decoding="async">
  </figure>
  <?php endif; ?>

  <section class="nw-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/NewsArticle">
        <?php the_content(); ?>
        <?php if ($ext_url) : ?>
        <div class="nw-ext">
          <span>Originally published on <?php echo esc_html($source ?: 'external source'); ?></span>
          <a href="<?php echo esc_url($ext_url); ?>" target="_blank" rel="noopener nofollow">Read Full Article ↗</a>
        </div>
        <?php endif; ?>
      </article>
    </div>
  </section>

  <section class="nw-cta">
    <h2>Stay Ahead in Education Technology</h2>
    <p>Get the latest insights, product updates, and admissions strategies delivered to your inbox.</p>
    <a href="/contact-us/">📧 Subscribe to Updates</a>
  </section>
</main>

<?php endwhile; get_footer(); ?>
