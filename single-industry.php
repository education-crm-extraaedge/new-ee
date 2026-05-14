<?php
/**
 * single-industry.php — Industry vertical landing page
 * Schema: Service (industry-specific CRM service)
 * Custom fields (optional via meta box):
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _industry_subtitle, _industry_stats (array: number|label)
 *   _industry_pain_points, _industry_benefits, _industry_cta_text, _industry_cta_url
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('industry')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    // Service schema for the industry vertical
    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'Service',
        '@id'              => $url . '#service',
        'name'             => $title,
        'description'      => $desc,
        'url'              => $url,
        'image'            => $image,
        'serviceType'      => 'Education CRM for ' . get_the_title($pid),
        'category'         => 'BusinessApplication',
        'provider'         => array('@id' => 'https://www.extraaedge.com/#organization'),
        'areaServed'       => array(
            array('@type' => 'Country', 'name' => 'India'),
            array('@type' => 'Country', 'name' => 'United Arab Emirates'),
            array('@type' => 'Country', 'name' => 'United Kingdom'),
            array('@type' => 'Country', 'name' => 'United States'),
        ),
        'audience'         => array(
            '@type'        => 'BusinessAudience',
            'audienceType' => get_the_title($pid),
        ),
        'offers'           => array(
            '@type'        => 'Offer',
            'availability' => 'https://schema.org/InStock',
            'priceCurrency'=> 'USD',
            'price'        => '0',
            'url'          => $url,
        ),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_industry_subtitle', true);
$stats     = get_post_meta($pid, '_industry_stats', true) ?: array();
$pain      = get_post_meta($pid, '_industry_pain_points', true);
$benefits  = get_post_meta($pid, '_industry_benefits', true);
$cta_text  = get_post_meta($pid, '_industry_cta_text', true) ?: 'Book a Free Demo';
$cta_url   = get_post_meta($pid, '_industry_cta_url', true) ?: '/book-demo/';
$hero_img  = get_the_post_thumbnail_url($pid, 'full');
?>

<style>
.ipage-hero{background:linear-gradient(135deg,#F8FAFC 0%,#FFFFFF 100%);padding:60px 0 50px;position:relative;overflow:hidden}
.ipage-hero .container{max-width:1240px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:center}
.ipage-hero-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.08);color:#DE6E30;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(222,110,48,.18)}
.ipage-hero h1{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(32px,4.5vw,52px);line-height:1.1;color:#19335D;font-weight:900;margin:0 0 18px;letter-spacing:-.02em}
.ipage-hero .subtitle{font-size:clamp(15px,1.4vw,18px);color:#475569;line-height:1.7;margin-bottom:24px;max-width:600px}
.ipage-hero img.hero-img{width:100%;height:auto;border-radius:24px;box-shadow:0 24px 60px rgba(25,51,93,.14)}
.ipage-cta-row{display:flex;gap:14px;flex-wrap:wrap;margin-top:8px}
.ipage-btn-primary{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:#DE6E30;color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:15px;padding:15px 32px;border-radius:14px;text-decoration:none;transition:all .3s ease;box-shadow:0 8px 24px rgba(222,110,48,.3)}
.ipage-btn-primary:hover{transform:translateY(-3px);background:#c85d20;box-shadow:0 16px 36px rgba(222,110,48,.4)}
.ipage-btn-secondary{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:transparent;color:#19335D;font-family:'Inter',sans-serif;font-weight:700;font-size:15px;padding:15px 32px;border-radius:14px;border:2px solid #19335D;text-decoration:none;transition:all .3s ease}
.ipage-btn-secondary:hover{background:#19335D;color:#fff;transform:translateY(-3px)}

.ipage-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:30px}
.ipage-stat{background:#fff;padding:18px 14px;border-radius:14px;text-align:center;border:1px solid #E2E8F0}
.ipage-stat-num{display:block;font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(22px,2.5vw,32px);font-weight:900;color:#DE6E30;line-height:1}
.ipage-stat-lab{font-family:'Inter',sans-serif;font-size:10px;font-weight:700;text-transform:uppercase;color:#475569;letter-spacing:.5px;margin-top:6px;display:block}

.ipage-body{background:#fff;padding:60px 0}
.ipage-body .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 320px;gap:48px}
.ipage-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.8}
.ipage-body article h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(24px,3vw,34px);font-weight:800;color:#19335D;margin:36px 0 16px;line-height:1.2}
.ipage-body article h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:700;color:#19335D;margin:28px 0 12px}
.ipage-body article p{font-size:16px;color:#475569;margin-bottom:16px}
.ipage-body article ul,.ipage-body article ol{margin:0 0 20px 20px;color:#475569;font-size:16px}
.ipage-body article li{margin-bottom:8px}
.ipage-body article img{max-width:100%;height:auto;border-radius:16px;margin:20px 0}
.ipage-body article a{color:#DE6E30;font-weight:600}

.ipage-aside{position:sticky;top:100px;align-self:start}
.ipage-aside-card{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;border-radius:24px;padding:32px;box-shadow:0 24px 60px rgba(25,51,93,.18)}
.ipage-aside-card h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:22px;font-weight:800;margin:0 0 12px;color:#fff}
.ipage-aside-card p{font-size:14px;color:rgba(255,255,255,.85);line-height:1.6;margin-bottom:20px}
.ipage-aside-card a{display:block;background:#DE6E30;color:#fff;text-align:center;padding:14px;border-radius:12px;font-weight:700;text-decoration:none;transition:all .3s ease}
.ipage-aside-card a:hover{background:#c85d20;transform:translateY(-2px)}

.ipage-bottom-cta{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;padding:60px 24px;text-align:center}
.ipage-bottom-cta h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(26px,3.5vw,40px);font-weight:800;margin:0 0 14px;color:#fff}
.ipage-bottom-cta p{font-size:17px;color:rgba(255,255,255,.85);max-width:620px;margin:0 auto 28px;line-height:1.6}

@media(max-width:900px){.ipage-hero .container,.ipage-body .container{grid-template-columns:1fr;gap:32px}.ipage-aside{position:relative;top:0}.ipage-stats{grid-template-columns:repeat(3,1fr)}}
@media(max-width:600px){.ipage-stats{grid-template-columns:1fr 1fr}}
</style>

<main id="main-content" role="main">

  <section class="ipage-hero" aria-labelledby="industry-heading">
    <div class="container">
      <div>
        <div class="ipage-hero-badge">🏢 Industry Solution</div>
        <h1 id="industry-heading"><?php the_title(); ?></h1>
        <?php if ($subtitle) : ?><p class="subtitle"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
        <div class="ipage-cta-row">
          <a href="<?php echo esc_url($cta_url); ?>" class="ipage-btn-primary"><?php echo esc_html($cta_text); ?></a>
          <a href="#industry-details" class="ipage-btn-secondary">Explore Features</a>
        </div>
        <?php if (!empty($stats) && is_array($stats)) : ?>
        <div class="ipage-stats" role="region" aria-label="Industry impact stats">
          <?php foreach ($stats as $s) : if (empty($s['number'])) continue; ?>
            <div class="ipage-stat">
              <span class="ipage-stat-num"><?php echo esc_html($s['number']); ?></span>
              <span class="ipage-stat-lab"><?php echo esc_html($s['label'] ?? ''); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <?php if ($hero_img) : ?>
        <figure>
          <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?> — Education CRM Solution" class="hero-img" width="640" height="480" fetchpriority="high" decoding="async">
        </figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="ipage-body" id="industry-details">
    <div class="container">
      <article itemscope itemtype="https://schema.org/Service">
        <?php the_content(); ?>

        <?php if ($pain) : ?>
        <h2>Common Challenges in <?php the_title(); ?></h2>
        <ul>
          <?php foreach (explode("\n", trim($pain)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if ($benefits) : ?>
        <h2>How ExtraaEdge Helps</h2>
        <ul>
          <?php foreach (explode("\n", trim($benefits)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>
      </article>

      <aside class="ipage-aside" role="complementary">
        <div class="ipage-aside-card">
          <h3>Ready to grow your admissions?</h3>
          <p>See how leading institutions in your sector use ExtraaEdge to capture more leads, automate follow-ups, and convert applications faster.</p>
          <a href="<?php echo esc_url($cta_url); ?>">📞 <?php echo esc_html($cta_text); ?></a>
        </div>
      </aside>
    </div>
  </section>

  <section class="ipage-bottom-cta">
    <h2>Transform Your <?php the_title(); ?> Admissions Today</h2>
    <p>Join 500+ educational institutions already growing with ExtraaEdge AI-powered CRM.</p>
    <a href="<?php echo esc_url($cta_url); ?>" class="ipage-btn-primary"><?php echo esc_html($cta_text); ?></a>
  </section>

</main>

<?php endwhile; get_footer(); ?>
