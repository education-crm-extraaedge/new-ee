<?php
/**
 * single-ebook.php — E-book / Whitepaper landing page
 * Schema: Book / DigitalDocument
 * Custom fields (optional via meta box):
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _ebook_subtitle, _ebook_author, _ebook_pages, _ebook_format
 *   _ebook_download_url, _ebook_file_size, _ebook_isbn
 *   _ebook_highlights, _ebook_cta_text
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('ebook')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $author    = get_post_meta($pid, '_ebook_author', true) ?: 'ExtraaEdge';
    $pages     = get_post_meta($pid, '_ebook_pages', true);
    $isbn      = get_post_meta($pid, '_ebook_isbn', true);
    $dl_url    = get_post_meta($pid, '_ebook_download_url', true) ?: $url;
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'Book',
        '@id'           => $url . '#book',
        'name'          => $title,
        'headline'      => $title,
        'description'   => $desc,
        'url'           => $url,
        'image'         => $image,
        'bookFormat'    => 'https://schema.org/EBook',
        'inLanguage'    => 'en',
        'author'        => array('@type' => 'Organization', 'name' => $author),
        'publisher'     => array('@id' => 'https://www.extraaedge.com/#organization'),
        'datePublished' => get_the_date('c', $pid),
        'dateModified'  => get_the_modified_date('c', $pid),
        'mainEntityOfPage' => array('@type' => 'WebPage', '@id' => $url),
        'offers'        => array(
            '@type'        => 'Offer',
            'availability' => 'https://schema.org/InStock',
            'priceCurrency'=> 'USD',
            'price'        => '0',
            'url'          => $dl_url,
        ),
    );
    if ($pages) $schema['numberOfPages'] = (int) $pages;
    if ($isbn)  $schema['isbn'] = $isbn;
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid        = get_the_ID();
$subtitle   = get_post_meta($pid, '_ebook_subtitle', true);
$author     = get_post_meta($pid, '_ebook_author', true) ?: 'ExtraaEdge Team';
$pages      = get_post_meta($pid, '_ebook_pages', true);
$format     = get_post_meta($pid, '_ebook_format', true) ?: 'PDF';
$file_size  = get_post_meta($pid, '_ebook_file_size', true);
$dl_url     = get_post_meta($pid, '_ebook_download_url', true) ?: '#download';
$highlights = get_post_meta($pid, '_ebook_highlights', true);
$cta_text   = get_post_meta($pid, '_ebook_cta_text', true) ?: 'Download Free E-book';
$hero_img   = get_the_post_thumbnail_url($pid, 'full');
?>

<style>
.eb-hero{background:linear-gradient(135deg,#F8FAFC 0%,#FFFFFF 100%);padding:60px 0 50px;overflow:hidden}
.eb-hero .container{max-width:1240px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center}
.eb-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.08);color:#DE6E30;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(222,110,48,.18)}
.eb-hero h1{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(30px,4vw,48px);line-height:1.15;color:#19335D;font-weight:900;margin:0 0 16px;letter-spacing:-.02em}
.eb-hero .sub{font-size:clamp(15px,1.3vw,17px);color:#475569;line-height:1.7;margin-bottom:24px}
.eb-meta-row{display:flex;flex-wrap:wrap;gap:18px;margin-bottom:24px;font-family:'Inter',sans-serif;font-size:13px;color:#475569}
.eb-meta-row span{display:inline-flex;align-items:center;gap:6px;font-weight:600}
.eb-cta-row{display:flex;gap:14px;flex-wrap:wrap}
.eb-btn-primary{display:inline-flex;align-items:center;gap:8px;background:#DE6E30;color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:15px;padding:15px 32px;border-radius:14px;text-decoration:none;transition:all .3s ease;box-shadow:0 8px 24px rgba(222,110,48,.3)}
.eb-btn-primary:hover{transform:translateY(-3px);background:#c85d20}
.eb-cover{position:relative;display:flex;justify-content:center}
.eb-cover img{max-width:380px;width:100%;height:auto;border-radius:18px;box-shadow:0 30px 80px rgba(25,51,93,.22);transform:rotate(-2deg);transition:transform .4s ease}
.eb-cover img:hover{transform:rotate(0deg) scale(1.03)}

.eb-body{background:#fff;padding:60px 0}
.eb-body .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 320px;gap:48px}
.eb-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.8}
.eb-body article h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(24px,3vw,32px);font-weight:800;color:#19335D;margin:32px 0 14px}
.eb-body article p{font-size:16px;color:#475569;margin-bottom:16px}
.eb-body article ul{margin:0 0 20px 20px;color:#475569}
.eb-body article li{margin-bottom:8px}
.eb-body article a{color:#DE6E30;font-weight:600}

.eb-aside{position:sticky;top:100px;align-self:start}
.eb-aside-card{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;border-radius:24px;padding:32px;box-shadow:0 24px 60px rgba(25,51,93,.18)}
.eb-aside-card h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;margin:0 0 10px;color:#fff}
.eb-aside-card p{font-size:14px;color:rgba(255,255,255,.85);line-height:1.6;margin-bottom:18px}
.eb-aside-card a{display:block;background:#DE6E30;color:#fff;text-align:center;padding:14px;border-radius:12px;font-weight:700;text-decoration:none}

.eb-bottom{background:linear-gradient(135deg,#DE6E30 0%,#c85d20 100%);color:#fff;padding:60px 24px;text-align:center}
.eb-bottom h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(26px,3.5vw,38px);font-weight:800;margin:0 0 14px;color:#fff}
.eb-bottom p{font-size:17px;color:rgba(255,255,255,.92);max-width:620px;margin:0 auto 28px}
.eb-bottom .eb-btn-primary{background:#fff;color:#DE6E30;box-shadow:0 8px 24px rgba(0,0,0,.18)}
.eb-bottom .eb-btn-primary:hover{background:#19335D;color:#fff}

@media(max-width:900px){.eb-hero .container,.eb-body .container{grid-template-columns:1fr;gap:32px}.eb-aside{position:relative;top:0}.eb-cover img{transform:none}}
</style>

<main id="main-content" role="main">
  <section class="eb-hero" aria-labelledby="ebook-heading">
    <div class="container">
      <div>
        <div class="eb-badge">📘 Free E-book</div>
        <h1 id="ebook-heading"><?php the_title(); ?></h1>
        <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
        <div class="eb-meta-row">
          <span>✍ By <?php echo esc_html($author); ?></span>
          <?php if ($pages) : ?><span>📄 <?php echo esc_html($pages); ?> pages</span><?php endif; ?>
          <span>💾 <?php echo esc_html($format); ?></span>
          <?php if ($file_size) : ?><span>📦 <?php echo esc_html($file_size); ?></span><?php endif; ?>
        </div>
        <div class="eb-cta-row">
          <a href="<?php echo esc_url($dl_url); ?>" class="eb-btn-primary" rel="nofollow"><?php echo esc_html($cta_text); ?></a>
        </div>
      </div>
      <?php if ($hero_img) : ?>
        <figure class="eb-cover">
          <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?> — Free E-book Cover" width="380" height="500" fetchpriority="high" decoding="async">
        </figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="eb-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/Book">
        <?php the_content(); ?>
        <?php if ($highlights) : ?>
        <h2>What's Inside</h2>
        <ul>
          <?php foreach (explode("\n", trim($highlights)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>
      </article>
      <aside class="eb-aside" role="complementary">
        <div class="eb-aside-card">
          <h3>Grab Your Free Copy</h3>
          <p>Get instant access to actionable strategies trusted by 500+ educational institutions.</p>
          <a href="<?php echo esc_url($dl_url); ?>" rel="nofollow">⬇ <?php echo esc_html($cta_text); ?></a>
        </div>
      </aside>
    </div>
  </section>

  <section class="eb-bottom">
    <h2>Ready to Transform Your Admissions Strategy?</h2>
    <p>Download this free guide and start applying proven frameworks today.</p>
    <a href="<?php echo esc_url($dl_url); ?>" class="eb-btn-primary" rel="nofollow"><?php echo esc_html($cta_text); ?></a>
  </section>
</main>

<?php endwhile; get_footer(); ?>
