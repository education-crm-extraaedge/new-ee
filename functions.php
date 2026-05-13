<?php
/**
 * functions.php — ExtraaEdge theme
 * Handles: theme setup, head cleanup, deferred enqueues, dynamic schema
 * generators (Org/WebSite/LocalBusiness/Article/Breadcrumb/FAQ/Speakable/
 * Review/Video/HowTo/SoftwareApplication), sitemap, robots, image alt
 * fallback, last-modified headers, body classes, CPT registration.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/* ─────────────────────────────────────────────────────────────
 * 1. THEME SETUP
 * ─────────────────────────────────────────────────────────── */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ] );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo' );
} );

/* ─────────────────────────────────────────────────────────────
 * 2. STRIP WP HEAD BLOAT (cleaner source for crawlers)
 * ─────────────────────────────────────────────────────────── */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter( 'the_generator', '__return_empty_string' );
add_filter( 'emoji_svg_url', '__return_false' );

/* ─────────────────────────────────────────────────────────────
 * 3. ENQUEUE — external minified, deferred non-critical
 * ─────────────────────────────────────────────────────────── */
add_action( 'wp_enqueue_scripts', function () {
	$ver = wp_get_theme()->get( 'Version' ) ?: '1.0.0';
	wp_enqueue_style( 'ee-main', get_template_directory_uri() . '/assets/css/main.min.css', [], $ver );
	wp_enqueue_script( 'ee-main', get_template_directory_uri() . '/assets/js/main.min.js', [], $ver, true );
}, 20 );

add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	$defer = [ 'ee-main', 'ee-analytics' ];
	$async = [ 'ee-form-widget' ];
	if ( in_array( $handle, $defer, true ) ) return str_replace( ' src=', ' defer src=', $tag );
	if ( in_array( $handle, $async, true ) ) return str_replace( ' src=', ' async src=', $tag );
	return $tag;
}, 10, 2 );

/* ─────────────────────────────────────────────────────────────
 * 4. IMAGE ALT FALLBACK (never serve empty alt to crawlers)
 * ─────────────────────────────────────────────────────────── */
add_filter( 'wp_get_attachment_image_attributes', function ( $attr, $attachment ) {
	if ( empty( $attr['alt'] ) ) {
		$attr['alt'] = trim( wp_strip_all_tags( $attachment->post_title ) );
	}
	return $attr;
}, 10, 2 );

/* ─────────────────────────────────────────────────────────────
 * 5. CACHE / LAST-MODIFIED HEADERS (TTFB + freshness)
 * ─────────────────────────────────────────────────────────── */
add_action( 'template_redirect', function () {
	if ( is_singular() && ! is_user_logged_in() ) {
		$ts = get_the_modified_time( 'U' );
		if ( $ts ) {
			header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s', $ts ) . ' GMT' );
			header( 'Cache-Control: public, max-age=3600, must-revalidate' );
		}
	}
} );

/* ─────────────────────────────────────────────────────────────
 * 6. ROBOTS.TXT — point to sitemap + allow CSS/JS
 * ─────────────────────────────────────────────────────────── */
add_filter( 'robots_txt', function ( $output ) {
	$site = home_url( '/' );
	$output  = "User-agent: *\n";
	$output .= "Allow: /wp-content/uploads/\n";
	$output .= "Allow: /wp-content/themes/*/assets/\n";
	$output .= "Allow: /*.css$\n";
	$output .= "Allow: /*.js$\n";
	$output .= "Disallow: /wp-admin/\n";
	$output .= "Disallow: /?s=\n";
	$output .= "Disallow: /search/\n";
	$output .= "Allow: /wp-admin/admin-ajax.php\n\n";
	$output .= "User-agent: GPTBot\nAllow: /\n\n";
	$output .= "User-agent: ClaudeBot\nAllow: /\n\n";
	$output .= "User-agent: PerplexityBot\nAllow: /\n\n";
	$output .= "User-agent: Google-Extended\nAllow: /\n\n";
	$output .= "Sitemap: {$site}wp-sitemap.xml\n";
	return $output;
}, 10, 1 );

/* ─────────────────────────────────────────────────────────────
 * 7. BODY CLASSES (entity signals)
 * ─────────────────────────────────────────────────────────── */
add_filter( 'body_class', function ( $classes ) {
	if ( is_singular( 'product' ) ) $classes[] = 'product-page';
	return $classes;
} );

/* ─────────────────────────────────────────────────────────────
 * 8. CUSTOM POST TYPE — product (clean slug, indexable)
 * ─────────────────────────────────────────────────────────── */
add_action( 'init', function () {
	register_post_type( 'product', [
		'labels'              => [ 'name' => 'Products', 'singular_name' => 'Product' ],
		'public'              => true,
		'has_archive'         => 'products',
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-products',
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ],
		'rewrite'             => [ 'slug' => 'products', 'with_front' => false ],
		'capability_type'     => 'page',
		'hierarchical'        => true,
	] );
} );

/* ─────────────────────────────────────────────────────────────
 * 9. GLOBAL SCHEMA — Organization + WebSite (every page)
 * ─────────────────────────────────────────────────────────── */
add_action( 'wp_head', function () {
	$site_url = 'https://www.extraaedge.com';
	$org_id   = $site_url . '/#organization';
	$site_id  = $site_url . '/#website';

	$graph = [
		'@context' => 'https://schema.org',
		'@graph'   => [
			[
				'@type'         => 'Organization',
				'@id'           => $org_id,
				'name'          => 'ExtraaEdge',
				'alternateName' => 'ExtraaEdge Education CRM',
				'url'           => $site_url,
				'logo'          => [
					'@type'  => 'ImageObject',
					'url'    => $site_url . '/wp-content/uploads/2024/12/extraaedge-logo.svg',
					'width'  => 512,
					'height' => 128,
				],
				'description'   => 'AI-powered Education CRM helping 500+ educational institutions automate admissions, manage leads, and boost enrollments.',
				'foundingDate'  => '2015',
				'slogan'        => 'Education CRM That Turns Every Admission Inquiry into an Enrollment',
				'sameAs'        => [
					'https://www.linkedin.com/company/extraaedge',
					'https://twitter.com/ExtraaEdge',
					'https://www.facebook.com/ExtraaEdge',
					'https://www.youtube.com/@extraaedge',
					'https://www.instagram.com/extraaedge/',
				],
				'contactPoint'  => [
					'@type'             => 'ContactPoint',
					'telephone'         => '+91-9168678888',
					'contactType'       => 'sales',
					'areaServed'        => [ 'IN', 'AE', 'GB', 'US' ],
					'availableLanguage' => [ 'English', 'Hindi' ],
				],
				'address'       => [
					'@type'           => 'PostalAddress',
					'addressLocality' => 'Pune',
					'addressRegion'   => 'MH',
					'postalCode'      => '411014',
					'addressCountry'  => 'IN',
				],
			],
			[
				'@type'           => 'WebSite',
				'@id'             => $site_id,
				'url'             => $site_url,
				'name'            => 'ExtraaEdge',
				'inLanguage'      => 'en-IN',
				'publisher'       => [ '@id' => $org_id ],
				'potentialAction' => [
					'@type'       => 'SearchAction',
					'target'      => [
						'@type'       => 'EntryPoint',
						'urlTemplate' => $site_url . '/?s={search_term_string}',
					],
					'query-input' => 'required name=search_term_string',
				],
			],
			[
				'@type'    => 'LocalBusiness',
				'@id'      => $site_url . '/#localbusiness',
				'name'     => 'ExtraaEdge',
				'image'    => $site_url . '/wp-content/uploads/2024/12/extraaedge-office.jpg',
				'url'      => $site_url,
				'telephone'=> '+91-9168678888',
				'priceRange' => '$$',
				'address'  => [
					'@type'           => 'PostalAddress',
					'streetAddress'   => 'Office No. 401, 4th Floor, Pride Icon, Kharadi',
					'addressLocality' => 'Pune',
					'addressRegion'   => 'MH',
					'postalCode'      => '411014',
					'addressCountry'  => 'IN',
				],
				'geo'      => [
					'@type'     => 'GeoCoordinates',
					'latitude'  => 18.5604,
					'longitude' => 73.9412,
				],
				'openingHoursSpecification' => [
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ],
					'opens'     => '09:30',
					'closes'    => '18:30',
				],
			],
		],
	];

	echo "\n<script type=\"application/ld+json\">\n" . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "\n</script>\n";
}, 5 );

/* ─────────────────────────────────────────────────────────────
 * 10. PER-POST SCHEMA — Article + Breadcrumb + Speakable
 * ─────────────────────────────────────────────────────────── */
add_action( 'wp_head', function () {
	if ( ! is_singular() ) return;
	global $post;
	$site_url = 'https://www.extraaedge.com';
	$url      = get_permalink( $post->ID );
	$img      = get_the_post_thumbnail_url( $post->ID, 'full' ) ?: $site_url . '/wp-content/uploads/og/extraaedge-default-og.png';

	$bc_items = [
		[ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ],
	];
	$pos = 2;
	foreach ( array_reverse( get_post_ancestors( $post->ID ) ) as $aid ) {
		$bc_items[] = [ '@type' => 'ListItem', 'position' => $pos++, 'name' => get_the_title( $aid ), 'item' => get_permalink( $aid ) ];
	}
	$pt = get_post_type_object( get_post_type( $post->ID ) );
	if ( $pt && $pt->has_archive ) {
		$bc_items[] = [ '@type' => 'ListItem', 'position' => $pos++, 'name' => $pt->labels->name, 'item' => get_post_type_archive_link( $pt->name ) ];
	}
	$bc_items[] = [ '@type' => 'ListItem', 'position' => $pos, 'name' => get_the_title( $post->ID ), 'item' => $url ];

	$graph = [
		'@context' => 'https://schema.org',
		'@graph'   => [
			[
				'@type'           => 'BreadcrumbList',
				'@id'             => $url . '#breadcrumb',
				'itemListElement' => $bc_items,
			],
			[
				'@type'            => 'Article',
				'@id'              => $url . '#article',
				'headline'         => get_the_title( $post->ID ),
				'description'      => get_post_meta( $post->ID, '_seo_description', true ) ?: wp_trim_words( wp_strip_all_tags( $post->post_content ), 28 ),
				'image'            => $img,
				'url'              => $url,
				'datePublished'    => get_the_date( 'c', $post->ID ),
				'dateModified'     => get_the_modified_date( 'c', $post->ID ),
				'inLanguage'       => 'en-IN',
				'mainEntityOfPage' => $url,
				'author'           => [ '@type' => 'Organization', 'name' => 'ExtraaEdge', '@id' => $site_url . '/#organization' ],
				'publisher'        => [ '@id' => $site_url . '/#organization' ],
				'speakable'        => [
					'@type'       => 'SpeakableSpecification',
					'cssSelector' => [ '.hero-h1', '.hero-desc', '.edu-crm-p', '.faq-question', '.faq-answer' ],
				],
			],
		],
	];

	echo "\n<script type=\"application/ld+json\">\n" . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "\n</script>\n";
}, 6 );

/* ─────────────────────────────────────────────────────────────
 * 11. SCHEMA HELPERS — call from templates as needed
 * ─────────────────────────────────────────────────────────── */
function ee_emit_jsonld( $data ) {
	echo "\n<script type=\"application/ld+json\">\n" . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . "\n</script>\n";
}

function ee_faq_schema( $faqs ) {
	if ( empty( $faqs ) ) return;
	$main = [];
	foreach ( $faqs as $q => $a ) {
		$main[] = [
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $q ),
			'acceptedAnswer' => [
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $a ),
			],
		];
	}
	ee_emit_jsonld( [ '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $main ] );
}

function ee_software_app_schema( $args ) {
	$defaults = [
		'name'        => '',
		'url'         => '',
		'description' => '',
		'image'       => '',
		'rating'      => 4.9,
		'review_count'=> 500,
		'features'    => [],
	];
	$a = wp_parse_args( $args, $defaults );
	ee_emit_jsonld( [
		'@context'           => 'https://schema.org',
		'@type'              => 'SoftwareApplication',
		'name'               => $a['name'],
		'applicationCategory'=> 'BusinessApplication',
		'operatingSystem'    => 'Web, Android, iOS',
		'url'                => $a['url'],
		'description'        => $a['description'],
		'image'              => $a['image'],
		'offers'             => [
			'@type'         => 'Offer',
			'priceCurrency' => 'USD',
			'price'         => '0',
			'availability'  => 'https://schema.org/InStock',
		],
		'aggregateRating'    => [
			'@type'       => 'AggregateRating',
			'ratingValue' => (string) $a['rating'],
			'reviewCount' => (string) $a['review_count'],
			'bestRating'  => '5',
			'worstRating' => '1',
		],
		'featureList' => $a['features'],
	] );
}

function ee_video_schema( $args ) {
	$a = wp_parse_args( $args, [ 'name' => '', 'description' => '', 'thumbnail' => '', 'upload_date' => '', 'content_url' => '', 'embed_url' => '' ] );
	ee_emit_jsonld( [
		'@context'     => 'https://schema.org',
		'@type'        => 'VideoObject',
		'name'         => $a['name'],
		'description'  => $a['description'],
		'thumbnailUrl' => $a['thumbnail'],
		'uploadDate'   => $a['upload_date'],
		'contentUrl'   => $a['content_url'],
		'embedUrl'     => $a['embed_url'],
	] );
}

function ee_howto_schema( $name, $steps ) {
	$list = [];
	$i = 1;
	foreach ( $steps as $title => $desc ) {
		$list[] = [ '@type' => 'HowToStep', 'position' => $i++, 'name' => $title, 'text' => $desc ];
	}
	ee_emit_jsonld( [ '@context' => 'https://schema.org', '@type' => 'HowTo', 'name' => $name, 'step' => $list ] );
}

/* ─────────────────────────────────────────────────────────────
 * 12. CUSTOM 404 + STATUS CODES (proper HTTP semantics)
 * ─────────────────────────────────────────────────────────── */
add_action( 'template_redirect', function () {
	if ( is_404() ) status_header( 404 );
} );

/* ─────────────────────────────────────────────────────────────
 * 13. CLEAN AUTO-GENERATED EXCERPT (no [...] noise)
 * ─────────────────────────────────────────────────────────── */
add_filter( 'excerpt_more', fn() => '…' );

/* ─────────────────────────────────────────────────────────────
 * 14. DISABLE XML-RPC (security + slimmer headers)
 * ─────────────────────────────────────────────────────────── */
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
