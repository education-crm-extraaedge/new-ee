<?php
/**
 * single-help.php — Help / Knowledge Base article
 * Schema: TechArticle
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _help_subtitle, _help_category, _help_difficulty (beginner|intermediate|advanced)
 *   _help_reading_time, _help_related_links (one per line: label|url)
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('help')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $diff      = get_post_meta($pid, '_help_difficulty', true) ?: 'Beginner';
    $category  = get_post_meta($pid, '_help_category', true) ?: 'General';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'TechArticle',
        '@id'              => $url . '#techarticle',
        'headline'         => $title,
        'description'      => $desc,
        'image'            => $image,
        'url'              => $url,
        'datePublished'    => get_the_date('c', $pid),
        'dateModified'     => get_the_modified_date('c', $pid),
        'proficiencyLevel' => ucfirst($diff),
        'articleSection'   => $category,
        'inLanguage'       => 'en',
        'author'           => array('@id' => 'https://www.extraaedge.com/#organization'),
        'publisher'        => array('@id' => 'https://www.extraaedge.com/#organization'),
        'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => $url),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_help_subtitle', true);
$category  = get_post_meta($pid, '_help_category', true) ?: 'General';
$diff      = get_post_meta($pid, '_help_difficulty', true) ?: 'beginner';
$read_time = get_post_meta($pid, '_help_reading_time', true);
$related   = get_post_meta($pid, '_help_related_links', true);
?>

<style>
.hp-hero{background:linear-gradient(135deg,#F8FAFC 0%,#FFFFFF 100%);padding:50px 0 30px;border-bottom:1px solid #E2E8F0}
.hp-hero .container{max-width:1100px;margin:0 auto;padding:0 24px}
.hp-breadcrumb{font-family:'Inter',sans-serif;font-size:13px;color:#64748B;margin-bottom:16px}
.hp-breadcrumb a{color:#DE6E30;text-decoration:none;font-weight:600}
.hp-breadcrumb span{color:#19335D;font-weight:600}
.hp-hero h1{font-family:'Inter',sans-serif;font-size:clamp(28px,3.6vw,42px);line-height:1.2;color:#19335D;font-weight:900;margin:0 0 12px;letter-spacing:-.02em}
.hp-hero .sub{font-size:clamp(15px,1.3vw,17px);color:#475569;line-height:1.7;margin-bottom:18px;max-width:760px}
.hp-meta{display:flex;flex-wrap:wrap;gap:14px;font-family:'Inter',sans-serif;font-size:13px;color:#475569}
.hp-meta span{display:inline-flex;align-items:center;gap:6px;background:#fff;border:1px solid #E2E8F0;padding:6px 14px;border-radius:9999px;font-weight:600}
.hp-diff-beginner{color:#16A34A!important;background:rgba(22,163,74,.08)!important;border-color:rgba(22,163,74,.18)!important}
.hp-diff-intermediate{color:#D97706!important;background:rgba(217,119,6,.08)!important;border-color:rgba(217,119,6,.18)!important}
.hp-diff-advanced{color:#DC2626!important;background:rgba(220,38,38,.08)!important;border-color:rgba(220,38,38,.18)!important}

.hp-body{background:#fff;padding:50px 0}
.hp-body .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 280px;gap:48px}
.hp-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.85;font-size:16px}
.hp-body article h2{font-family:'Inter',sans-serif;font-size:clamp(22px,2.6vw,28px);font-weight:800;color:#19335D;margin:32px 0 14px;scroll-margin-top:90px}
.hp-body article h3{font-family:'Inter',sans-serif;font-size:20px;font-weight:700;color:#19335D;margin:24px 0 10px}
.hp-body article p{color:#475569;margin-bottom:16px}
.hp-body article ul,.hp-body article ol{margin:0 0 20px 20px;color:#475569}
.hp-body article li{margin-bottom:8px}
.hp-body article code{background:#F1F5F9;color:#DE6E30;padding:2px 8px;border-radius:6px;font-size:14px;font-family:'Courier New',monospace}
.hp-body article pre{background:#0F172A;color:#E2E8F0;padding:20px;border-radius:12px;overflow-x:auto;margin:18px 0;font-size:14px}
.hp-body article pre code{background:transparent;color:inherit;padding:0}
.hp-body article a{color:#DE6E30;font-weight:600}
.hp-body article blockquote{border-left:4px solid #DE6E30;background:#FEF7F2;padding:14px 20px;margin:20px 0;border-radius:0 12px 12px 0;color:#475569}

.hp-aside{position:sticky;top:100px;align-self:start}
.hp-aside-card{background:#F8FAFC;border:1px solid #E2E8F0;border-radius:18px;padding:22px;margin-bottom:18px}
.hp-aside-card h3{font-family:'Inter',sans-serif;font-size:14px;font-weight:800;color:#19335D;margin:0 0 12px;text-transform:uppercase;letter-spacing:1px}
.hp-aside-card ul{list-style:none;padding:0;margin:0}
.hp-aside-card ul li{padding:6px 0;border-bottom:1px solid #E2E8F0;font-size:13px;font-family:'Inter',sans-serif}
.hp-aside-card ul li:last-child{border-bottom:0}
.hp-aside-card a{color:#19335D;text-decoration:none;font-weight:600;display:block}
.hp-aside-card a:hover{color:#DE6E30}
.hp-feedback{background:linear-gradient(135deg,#19335D,#1e3d70);color:#fff;border-radius:18px;padding:22px;text-align:center}
.hp-feedback p{font-family:'Inter',sans-serif;font-size:13px;color:rgba(255,255,255,.85);margin:0 0 12px}
.hp-feedback a{background:#DE6E30;color:#fff;display:inline-block;padding:10px 18px;border-radius:10px;font-weight:700;text-decoration:none;font-size:13px}

@media(max-width:900px){.hp-body .container{grid-template-columns:1fr;gap:32px}.hp-aside{position:relative;top:0}}
</style>

<main id="main-content" role="main">
  <section class="hp-hero" aria-labelledby="help-heading">
    <div class="container">
      <div class="hp-breadcrumb">
        <a href="/help/">Help Center</a> › <span><?php echo esc_html($category); ?></span>
      </div>
      <h1 id="help-heading"><?php the_title(); ?></h1>
      <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
      <div class="hp-meta">
        <span>📂 <?php echo esc_html($category); ?></span>
        <span class="hp-diff-<?php echo esc_attr(strtolower($diff)); ?>">📊 <?php echo esc_html(ucfirst($diff)); ?></span>
        <?php if ($read_time) : ?><span>⏱ <?php echo esc_html($read_time); ?> min read</span><?php endif; ?>
        <span>🔄 Updated <?php echo esc_html(get_the_modified_date('M j, Y', $pid)); ?></span>
      </div>
    </div>
  </section>

  <section class="hp-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/TechArticle">
        <?php the_content(); ?>
      </article>
      <aside class="hp-aside" role="complementary">
        <?php if ($related) : ?>
        <div class="hp-aside-card">
          <h3>Related Articles</h3>
          <ul>
            <?php foreach (explode("\n", trim($related)) as $line) :
              $line = trim($line);
              if (!$line) continue;
              $parts = array_map('trim', explode('|', $line, 2));
              if (count($parts) < 2) continue;
            ?>
              <li><a href="<?php echo esc_url($parts[1]); ?>">→ <?php echo esc_html($parts[0]); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
        <div class="hp-feedback">
          <p>Still need help? Our team responds within 24 hours.</p>
          <a href="/contact-us/" rel="nofollow">💬 Contact Support</a>
        </div>
      </aside>
    </div>
  </section>
</main>

<?php endwhile; get_footer(); ?>
