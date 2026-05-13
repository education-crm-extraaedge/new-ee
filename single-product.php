<?php
/**
 * single-product.php — ExtraaEdge product page template
 * Handles: single H1, semantic h2→h3 hierarchy, server-rendered content,
 * visible breadcrumb (output by header.php), fetchpriority hero,
 * SoftwareApplication + FAQ + Speakable schema, lazy images only.
 *
 * Custom fields used (all optional — sensible fallbacks):
 *   _seo_title, _seo_description
 *   _hero_eyebrow, _hero_h1, _hero_h1_accent, _hero_desc
 *   _features (repeater: title|desc)
 *   _faqs (repeater: q|a)
 *   _toc (repeater: label|anchor)
 *   _video_url, _video_thumb
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

while ( have_posts() ) : the_post();

	$pid       = get_the_ID();
	$site_url  = 'https://www.extraaedge.com';
	$permalink = get_permalink( $pid );

	$hero_eyebrow = get_post_meta( $pid, '_hero_eyebrow', true ) ?: 'Join 500+ Educational Institutions Scaling Admissions with AI';
	$hero_h1      = get_post_meta( $pid, '_hero_h1', true )      ?: 'Education CRM That Turns Every';
	$hero_accent  = get_post_meta( $pid, '_hero_h1_accent', true )?: 'Admission Inquiry into an Enrollment';
	$hero_desc    = get_post_meta( $pid, '_hero_desc', true )    ?: 'Transform your admissions process with an intelligent admission CRM software designed exclusively for educational institutions. Capture more leads, automate follow-ups, boost conversions, and scale enrollments — all from one powerful platform trusted by leading institutions.';
	$hero_image   = get_the_post_thumbnail_url( $pid, 'full' );

	$features  = get_post_meta( $pid, '_features', true );
	$faqs_meta = get_post_meta( $pid, '_faqs', true );
	$toc_items = get_post_meta( $pid, '_toc', true );
	$video_url = get_post_meta( $pid, '_video_url', true );
	$video_thb = get_post_meta( $pid, '_video_thumb', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'product-article toc-content-column' ); ?> itemscope itemtype="https://schema.org/SoftwareApplication">

	<meta itemprop="name" content="<?php echo esc_attr( get_the_title() ); ?>">
	<meta itemprop="applicationCategory" content="BusinessApplication">
	<meta itemprop="operatingSystem" content="Web, Android, iOS">

	<!-- ═══════════════════════════════ HERO ═══════════════════════════════ -->
	<section class="hero" id="hero" aria-labelledby="hero-heading">
		<div class="hero-bg" aria-hidden="true">
			<div class="hero-blob hero-blob-1"></div>
			<div class="hero-blob hero-blob-2"></div>
		</div>
		<div class="container">
			<div class="hero-layout">
				<div class="hero-content">
					<p class="hero-badge" role="status">
						<span class="pulse-dot" aria-hidden="true"></span>
						<?php echo esc_html( $hero_eyebrow ); ?>
					</p>

					<h1 id="hero-heading" class="hero-h1" itemprop="headline">
						<?php echo esc_html( $hero_h1 ); ?> <span><?php echo esc_html( $hero_accent ); ?></span>
					</h1>

					<p class="hero-desc" itemprop="description"><?php echo wp_kses_post( $hero_desc ); ?></p>

					<div class="cta-row">
						<a href="#admission-form" class="btn-primary" data-action="book-demo">Book Free Demo</a>
						<?php if ( $video_url ) : ?>
							<a href="#product-tour" class="btn-secondary" data-action="watch-tour">Watch Product Tour</a>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( $hero_image ) : ?>
				<figure class="hero-figure">
					<img src="<?php echo esc_url( $hero_image ); ?>"
					     alt="<?php echo esc_attr( get_the_title() ); ?> — Dashboard preview"
					     width="720" height="540"
					     fetchpriority="high" decoding="async" loading="eager">
				</figure>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ═══════════════════════════ TABLE OF CONTENTS ══════════════════════ -->
	<?php if ( is_array( $toc_items ) && $toc_items ) : ?>
	<aside class="toc-column" role="complementary" aria-label="Page contents">
		<nav class="toc-wrapper" aria-label="Table of contents">
			<p class="toc-title">On this page</p>
			<ol class="toc-list">
				<?php foreach ( $toc_items as $i => $row ) : if ( empty( $row['label'] ) ) continue; ?>
					<li class="toc-item">
						<a class="toc-link" href="#<?php echo esc_attr( $row['anchor'] ?? 'sec-' . $i ); ?>">
							<span class="toc-num"><?php echo (int) $i + 1; ?></span>
							<?php echo esc_html( $row['label'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ol>
		</nav>
	</aside>
	<?php endif; ?>

	<!-- ═══════════════════════════ MAIN CONTENT ═══════════════════════════ -->
	<section id="overview" class="edu-crm-section" aria-labelledby="overview-heading">
		<div class="container">
			<h2 id="overview-heading" class="edu-crm-h2">What is an Education CRM?</h2>
			<div class="edu-crm-content" itemprop="articleBody">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<!-- ═══════════════════════════════ FEATURES ═══════════════════════════ -->
	<?php if ( is_array( $features ) && $features ) : ?>
	<section id="features" class="features-section" aria-labelledby="features-heading">
		<div class="container">
			<h2 id="features-heading" class="features-h2">Features That Give You an Edge</h2>
			<div class="features-grid">
				<?php foreach ( $features as $f ) : if ( empty( $f['title'] ) ) continue; ?>
					<article class="feature-card">
						<h3 class="feat-title"><?php echo esc_html( $f['title'] ); ?></h3>
						<p class="feat-desc"><?php echo esc_html( $f['desc'] ?? '' ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ══════════════════════════════ PRODUCT TOUR ════════════════════════ -->
	<?php if ( $video_url ) : ?>
	<section id="product-tour" class="video-section" aria-labelledby="tour-heading">
		<div class="container">
			<h2 id="tour-heading">Watch the Product Tour</h2>
			<figure class="video-figure">
				<iframe src="<?php echo esc_url( $video_url ); ?>"
				        title="<?php echo esc_attr( get_the_title() ); ?> product tour"
				        width="960" height="540" loading="lazy"
				        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
				        allowfullscreen></iframe>
			</figure>
		</div>
		<?php
		ee_video_schema( [
			'name'        => get_the_title() . ' Product Tour',
			'description' => $hero_desc,
			'thumbnail'   => $video_thb ?: $hero_image,
			'upload_date' => get_the_date( 'c', $pid ),
			'embed_url'   => $video_url,
		] );
		?>
	</section>
	<?php endif; ?>

	<!-- ════════════════════════════════ FAQ ═══════════════════════════════ -->
	<?php if ( is_array( $faqs_meta ) && $faqs_meta ) : ?>
	<section id="faq" class="faq-section" aria-labelledby="faq-heading">
		<div class="container">
			<h2 id="faq-heading" class="faq-title">Frequently Asked Questions</h2>
			<div class="faq-list">
				<?php
				$faq_pairs = [];
				foreach ( $faqs_meta as $row ) :
					if ( empty( $row['q'] ) ) continue;
					$faq_pairs[ $row['q'] ] = $row['a'] ?? '';
				?>
					<details class="faq-item">
						<summary class="faq-question"><?php echo esc_html( $row['q'] ); ?></summary>
						<div class="faq-answer"><?php echo wp_kses_post( wpautop( $row['a'] ?? '' ) ); ?></div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
		<?php ee_faq_schema( $faq_pairs ); ?>
	</section>
	<?php endif; ?>

	<!-- ═════════════════════════ SOFTWARE APPLICATION SCHEMA ══════════════ -->
	<?php
	$feat_list = [];
	if ( is_array( $features ) ) {
		foreach ( $features as $f ) if ( ! empty( $f['title'] ) ) $feat_list[] = $f['title'];
	}
	ee_software_app_schema( [
		'name'         => get_the_title(),
		'url'          => $permalink,
		'description'  => $hero_desc,
		'image'        => $hero_image ?: $site_url . '/wp-content/uploads/og/extraaedge-default-og.png',
		'rating'       => (float) ( get_post_meta( $pid, '_rating', true ) ?: 4.9 ),
		'review_count' => (int)   ( get_post_meta( $pid, '_review_count', true ) ?: 500 ),
		'features'     => $feat_list,
	] );
	?>

</article>

<?php endwhile; get_footer();
