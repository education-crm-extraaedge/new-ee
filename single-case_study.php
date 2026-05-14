<?php
/**
 * single-case_study.php — Customer case study landing page
 * Schema: Article (case study format) + Review
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _cs_subtitle, _cs_client_name, _cs_client_logo, _cs_industry, _cs_location
 *   _cs_challenge, _cs_solution, _cs_outcome
 *   _cs_metrics (one per line: number|label), _cs_quote, _cs_quote_author, _cs_quote_role
 *   _cs_pdf_url, _cs_cta_text, _cs_cta_url
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('case_study')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $client    = get_post_meta($pid, '_cs_client_name', true);
    $industry  = get_post_meta($pid, '_cs_industry', true);
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'Article',
        '@id'              => $url . '#casestudy',
        'headline'         => $title,
        'description'      => $desc,
        'image'            => $image,
        'url'              => $url,
        'datePublished'    => get_the_date('c', $pid),
        'dateModified'     => get_the_modified_date('c', $pid),
        'articleSection'   => 'Case Study',
        'about'            => $client ? array('@type' => 'Organization', 'name' => $client) : null,
        'keywords'         => $industry ?: 'Education CRM Case Study',
        'author'           => array('@id' => 'https://www.extraaedge.com/#organization'),
        'publisher'        => array('@id' => 'https://www.extraaedge.com/#organization'),
        'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => $url),
        'inLanguage'       => 'en',
    );
    $schema = array_filter($schema);
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_cs_subtitle', true);
$client    = get_post_meta($pid, '_cs_client_name', true);
$logo      = get_post_meta($pid, '_cs_client_logo', true);
$industry  = get_post_meta($pid, '_cs_industry', true);
$location  = get_post_meta($pid, '_cs_location', true);
$challenge = get_post_meta($pid, '_cs_challenge', true);
$solution  = get_post_meta($pid, '_cs_solution', true);
$outcome   = get_post_meta($pid, '_cs_outcome', true);
$metrics   = get_post_meta($pid, '_cs_metrics', true);
$quote     = get_post_meta($pid, '_cs_quote', true);
$q_author  = get_post_meta($pid, '_cs_quote_author', true);
$q_role    = get_post_meta($pid, '_cs_quote_role', true);
$pdf_url   = get_post_meta($pid, '_cs_pdf_url', true);
$cta_text  = get_post_meta($pid, '_cs_cta_text', true) ?: 'Book a Free Demo';
$cta_url   = get_post_meta($pid, '_cs_cta_url', true) ?: '/book-demo/';
$hero_img  = get_the_post_thumbnail_url($pid, 'full');
?>

<style>
.cs-hero{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;padding:60px 0 70px;position:relative;overflow:hidden}
.cs-hero:before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 80% 20%,rgba(222,110,48,.18),transparent 50%);pointer-events:none}
.cs-hero .container{position:relative;max-width:1240px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:center}
.cs-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.18);color:#FBC8A8;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(222,110,48,.32)}
.cs-hero h1{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(30px,4vw,46px);line-height:1.15;font-weight:900;margin:0 0 14px;letter-spacing:-.02em;color:#fff}
.cs-hero .sub{font-size:clamp(15px,1.3vw,17px);color:rgba(255,255,255,.85);line-height:1.7;margin-bottom:22px}
.cs-client-row{display:flex;align-items:center;gap:18px;margin-bottom:24px;padding:16px 20px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);border-radius:14px;backdrop-filter:blur(8px)}
.cs-client-row img{height:46px;width:auto;max-width:140px;object-fit:contain;background:#fff;padding:6px 10px;border-radius:8px}
.cs-client-info{font-family:'Inter',sans-serif;font-size:13px;color:rgba(255,255,255,.85)}
.cs-client-info b{display:block;color:#fff;font-size:15px;font-weight:700;margin-bottom:2px}
.cs-hero img.hero-img{width:100%;height:auto;border-radius:18px;box-shadow:0 30px 80px rgba(0,0,0,.4)}

.cs-metrics-strip{background:#fff;padding:40px 0;border-bottom:1px solid #E2E8F0}
.cs-metrics-strip .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:18px}
.cs-metric{text-align:center}
.cs-metric b{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(32px,4vw,48px);font-weight:900;color:#DE6E30;display:block;line-height:1}
.cs-metric span{font-family:'Inter',sans-serif;font-size:13px;color:#475569;font-weight:600;text-transform:uppercase;letter-spacing:.5px;margin-top:6px;display:block}

.cs-body{background:#fff;padding:60px 0}
.cs-body .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 320px;gap:48px}
.cs-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.85;font-size:16px}
.cs-body article h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(24px,3vw,32px);font-weight:800;color:#19335D;margin:32px 0 14px}
.cs-body article p{color:#475569;margin-bottom:16px}
.cs-body article ul{margin:0 0 20px 20px;color:#475569}
.cs-body article a{color:#DE6E30;font-weight:600}

.cs-section{margin:30px 0;padding:26px;border-radius:16px;border:1px solid #E2E8F0}
.cs-section.challenge{background:#FEF2F2;border-color:#FECACA}
.cs-section.solution{background:#EFF6FF;border-color:#BFDBFE}
.cs-section.outcome{background:#F0FDF4;border-color:#BBF7D0}
.cs-section h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;color:#19335D;margin:0 0 12px;display:flex;align-items:center;gap:10px}

.cs-pullquote{background:linear-gradient(135deg,#F8FAFC 0%,#FFFFFF 100%);border-left:5px solid #DE6E30;padding:28px 32px;margin:36px 0;border-radius:0 16px 16px 0;box-shadow:0 12px 32px rgba(25,51,93,.06)}
.cs-pullquote p{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-style:italic;color:#19335D;line-height:1.5;margin:0 0 14px;font-weight:600}
.cs-pullquote footer{font-family:'Inter',sans-serif;font-size:14px;color:#475569;font-weight:600}
.cs-pullquote footer b{color:#19335D;display:block}

.cs-aside{position:sticky;top:100px;align-self:start}
.cs-aside-card{background:linear-gradient(135deg,#DE6E30 0%,#c85d20 100%);color:#fff;border-radius:24px;padding:30px;box-shadow:0 24px 60px rgba(222,110,48,.3);margin-bottom:16px}
.cs-aside-card h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:18px;font-weight:800;margin:0 0 10px;color:#fff}
.cs-aside-card p{font-size:14px;color:rgba(255,255,255,.95);line-height:1.6;margin-bottom:16px}
.cs-aside-card a{display:block;background:#fff;color:#DE6E30;text-align:center;padding:14px;border-radius:12px;font-weight:700;text-decoration:none}
.cs-aside-pdf{background:#F8FAFC;border:1px solid #E2E8F0;border-radius:18px;padding:22px;text-align:center}
.cs-aside-pdf p{font-family:'Inter',sans-serif;font-size:13px;color:#475569;margin:0 0 12px;font-weight:600}
.cs-aside-pdf a{background:#19335D;color:#fff;display:inline-block;padding:10px 20px;border-radius:10px;font-weight:700;text-decoration:none;font-size:13px;font-family:'Inter',sans-serif}

@media(max-width:900px){.cs-hero .container,.cs-body .container{grid-template-columns:1fr;gap:32px}.cs-aside{position:relative;top:0}}
</style>

<main id="main-content" role="main">
  <section class="cs-hero" aria-labelledby="cs-heading">
    <div class="container">
      <div>
        <div class="cs-badge">📊 Customer Case Study</div>
        <h1 id="cs-heading"><?php the_title(); ?></h1>
        <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
        <?php if ($client) : ?>
        <div class="cs-client-row">
          <?php if ($logo) : ?><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($client); ?> logo" decoding="async"><?php endif; ?>
          <div class="cs-client-info">
            <b><?php echo esc_html($client); ?></b>
            <?php echo esc_html(trim($industry . ($industry && $location ? ' · ' : '') . $location)); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <?php if ($hero_img) : ?>
        <figure><img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?> — ExtraaEdge Case Study" class="hero-img" width="640" height="480" fetchpriority="high" decoding="async"></figure>
      <?php endif; ?>
    </div>
  </section>

  <?php if ($metrics) : ?>
  <section class="cs-metrics-strip" aria-label="Key results">
    <div class="container">
      <?php foreach (explode("\n", trim($metrics)) as $line) :
        $line = trim($line);
        if (!$line) continue;
        $parts = array_map('trim', explode('|', $line, 2));
        if (count($parts) < 2) continue;
      ?>
        <div class="cs-metric">
          <b><?php echo esc_html($parts[0]); ?></b>
          <span><?php echo esc_html($parts[1]); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <section class="cs-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/Article">
        <?php the_content(); ?>

        <?php if ($challenge) : ?>
        <div class="cs-section challenge">
          <h3>🎯 The Challenge</h3>
          <p><?php echo wp_kses_post(nl2br(esc_html($challenge))); ?></p>
        </div>
        <?php endif; ?>

        <?php if ($solution) : ?>
        <div class="cs-section solution">
          <h3>💡 The Solution</h3>
          <p><?php echo wp_kses_post(nl2br(esc_html($solution))); ?></p>
        </div>
        <?php endif; ?>

        <?php if ($outcome) : ?>
        <div class="cs-section outcome">
          <h3>📈 The Outcome</h3>
          <p><?php echo wp_kses_post(nl2br(esc_html($outcome))); ?></p>
        </div>
        <?php endif; ?>

        <?php if ($quote) : ?>
        <blockquote class="cs-pullquote">
          <p>“<?php echo esc_html($quote); ?>”</p>
          <?php if ($q_author) : ?>
          <footer>
            <b><?php echo esc_html($q_author); ?></b>
            <?php echo esc_html(trim($q_role . ($q_role && $client ? ', ' : '') . $client)); ?>
          </footer>
          <?php endif; ?>
        </blockquote>
        <?php endif; ?>
      </article>

      <aside class="cs-aside" role="complementary">
        <div class="cs-aside-card">
          <h3>Want similar results?</h3>
          <p>See how ExtraaEdge can help your institution capture more leads and convert applications faster.</p>
          <a href="<?php echo esc_url($cta_url); ?>" rel="nofollow">🚀 <?php echo esc_html($cta_text); ?></a>
        </div>
        <?php if ($pdf_url) : ?>
        <div class="cs-aside-pdf">
          <p>📥 Download the full case study PDF</p>
          <a href="<?php echo esc_url($pdf_url); ?>" rel="nofollow" target="_blank">Download PDF ↗</a>
        </div>
        <?php endif; ?>
      </aside>
    </div>
  </section>
</main>

<?php endwhile; get_footer(); ?>
