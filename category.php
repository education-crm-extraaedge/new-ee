<?php
/**
 * Category archive — /category/{slug}/
 * Lists every post assigned to the current category in the same
 * layout as /blog/ but with article cards instead of category cards.
 *
 * Editor publishes a post and assigns this category → it appears here
 * automatically. Editor assigns multiple categories → it appears in
 * each one.
 */
if (!defined('ABSPATH')) exit;

$GLOBALS['ee_blog_active_cat'] = get_queried_object();
$ee_current_cat = $GLOBALS['ee_blog_active_cat']; // also expose locally for the right-sidebar share links

add_filter('pre_get_document_title', function () {
    return single_cat_title('', false) . ' — Blog | ExtraaEdge';
}, 99);

/* Set the breadcrumb label so header.php breadcrumb renders correctly */
$GLOBALS['ee_custom_route_title'] = single_cat_title('', false);

get_header();
?>

<div class="ee-blog-page">
    <div class="ee-blog-wrap">

        <?php
        $ee_sidebar_path = get_stylesheet_directory() . '/inc/blog-sidebar.php';
        if (file_exists($ee_sidebar_path)) {
            include $ee_sidebar_path;
        }
        ?>

        <main class="ee-blog-main">
            <header class="ee-blog-heading">
                <h1><?php single_cat_title(); ?></h1>
            </header>

            <?php
            $cat_desc = category_description();
            if ($cat_desc) : ?>
            <div class="ee-blog-intro"><?php echo $cat_desc; ?></div>
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                    $cats = get_the_category();
                    $primary = !empty($cats) ? $cats[0] : null;
                ?>
                <article class="ee-blog-card">
                    <div class="ee-blog-card-body">
                        <h3 class="ee-blog-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="ee-blog-card-date">
                            Posted On <span><?php echo esc_html(get_the_date()); ?></span>
                            <?php if ($primary) : ?>
                                · <a href="<?php echo esc_url(get_category_link($primary->term_id)); ?>" style="color:var(--b-blue);text-decoration:none;font-weight:600;"><?php echo esc_html($primary->name); ?></a>
                            <?php endif; ?>
                        </div>
                        <p class="ee-blog-card-excerpt">
                            <?php echo esc_html(get_the_excerpt() ?: wp_trim_words(strip_shortcodes(get_the_content()), 30, '…')); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="ee-blog-explore">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                    <a class="ee-blog-card-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                        <?php the_post_thumbnail('medium_large', array('loading' => 'lazy')); ?>
                    </a>
                    <?php endif; ?>
                </article>
                <?php endwhile; ?>

                <?php
                $pagi = paginate_links(array('type' => 'array'));
                if ($pagi) : ?>
                <nav class="ee-blog-pagi" aria-label="Pagination">
                    <p>Page <?php echo max(1, get_query_var('paged')); ?> of <?php echo (int) $wp_query->max_num_pages; ?>, showing <?php echo (int) $wp_query->post_count; ?> of <?php echo (int) $wp_query->found_posts; ?> articles</p>
                    <?php foreach ($pagi as $link) echo $link; ?>
                </nav>
                <?php endif; ?>

            <?php else : ?>
                <div class="ee-blog-empty">
                    <p>No posts yet in <strong><?php single_cat_title(); ?></strong>. Publish a post with this category assigned and it will appear here automatically.</p>
                </div>
            <?php endif; ?>
        </main>

        <aside class="ee-blog-side-r" aria-label="Sidebar">
            <div class="ee-blog-social">
                <ul>
                    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_category_link($ee_current_cat->term_id)); ?>" target="_blank" rel="noopener"><i class="fa fa-linkedin" style="color:#0077B5"></i> Share</a></li>
                    <li><a href="mailto:?subject=<?php echo urlencode(single_cat_title('', false)); ?>&body=<?php echo urlencode(get_category_link($ee_current_cat->term_id)); ?>"><i class="fa fa-envelope-o" style="color:#3174F1"></i> E-mail</a></li>
                    <li><a href="javascript:window.print()"><i class="fa fa-print" style="color:#666"></i> Print</a></li>
                    <li><a href="<?php echo esc_url(get_category_feed_link($ee_current_cat->term_id)); ?>"><i class="fa fa-rss" style="color:#F26522"></i> RSS</a></li>
                </ul>
            </div>
            <?php ee_render_blog_form(); ?>
        </aside>

    </div>
</div>

<?php
get_footer();
