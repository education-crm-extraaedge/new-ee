<?php
/**
 * /blog/ landing page — grid of every WP category as a clickable card.
 * Wired up via the template_redirect override in functions.php.
 *
 * Editor publishes a post and assigns one or more categories →
 * the post automatically appears in each of those categories. No
 * manual mapping needed.
 */
if (!defined('ABSPATH')) exit;

/* Look up the optional ?cat= filter. When present we narrow the
   listing to posts in that one category and switch the breadcrumb /
   <title> to the category name, all without leaving /blog/. */
/* Active category comes from $_GET['bcat'], which the template_redirect
   router in functions.php populates when the URL is /blog/{slug}/.
   ?bcat= is also still honoured as a fallback if a deploy hasn't had
   permalinks flushed yet (Settings → Permalinks → Save). */
$ee_cat_slug   = isset($_GET['bcat']) ? sanitize_title(wp_unslash($_GET['bcat'])) : '';
$ee_active_cat = $ee_cat_slug ? get_category_by_slug($ee_cat_slug) : null;
if ($ee_active_cat) {
    $GLOBALS['ee_blog_active_cat']    = $ee_active_cat;
    $GLOBALS['ee_custom_route_title'] = $ee_active_cat->name; // breadcrumb tail
}

/* SEO + Article schema is handled by wp_head in header.php — we
   just override the document title here. */
add_filter('pre_get_document_title', function () use ($ee_active_cat) {
    if ($ee_active_cat) {
        return $ee_active_cat->name . ' — Blog | ExtraaEdge';
    }
    return 'Blog — Insights & Resources from ExtraaEdge';
}, 99);

/* Define $ee_blog_cats up front so the page renders even if the
   sidebar partial is missing on disk. The partial overwrites this
   with the same value when it loads, so behaviour is identical.
   hide_empty=false so editors see every category they've created,
   even before they've published a post into it. */
$ee_blog_cats = get_categories(array(
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'      => 'DESC',
));

/* Drop the WordPress default "Uncategorized" bucket — most editors
   never use it and it clutters the public landing. */
$ee_blog_cats = array_filter($ee_blog_cats, function ($c) {
    return $c->slug !== 'uncategorized';
});

get_header();
?>

<div class="ee-blog-page">
    <div class="ee-blog-wrap">

        <?php
        /* No $GLOBALS['ee_blog_active_cat'] set on the landing page,
           so the sidebar's "All Categories" row gets the active state. */
        $ee_sidebar_path = get_stylesheet_directory() . '/inc/blog-sidebar.php';
        if (file_exists($ee_sidebar_path)) {
            include $ee_sidebar_path;
        }
        ?>

        <main class="ee-blog-main">
            <header class="ee-blog-heading">
                <h1><?php echo $ee_active_cat ? esc_html($ee_active_cat->name) : 'Latest from the Blog'; ?></h1>
            </header>

            <?php
            /* Pull every published post once — even if the post sits in
               multiple categories WP returns it a single time. When the
               sidebar filter is on, narrow by that category. */
            $ee_query_args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 12,
                'paged'          => max(1, get_query_var('paged') ?: get_query_var('page')),
                'orderby'        => 'date',
                'order'          => 'DESC',
                'ignore_sticky_posts' => true,
            );
            if ($ee_active_cat) {
                $ee_query_args['cat'] = $ee_active_cat->term_id;
            }
            $ee_blog_query = new WP_Query($ee_query_args);
            ?>

            <?php if ($ee_blog_query->have_posts()) : ?>
                <?php while ($ee_blog_query->have_posts()) : $ee_blog_query->the_post();
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
                <?php endwhile; wp_reset_postdata(); ?>

                <?php
                /* Pagination base: when filtered, anchor under
                   /blog/{slug}/ so links read /blog/{slug}/page/N/.
                   Otherwise plain /blog/page/N/. */
                $pagi_base = $ee_active_cat
                    ? trailingslashit(home_url('/blog/' . $ee_active_cat->slug)) . '%_%'
                    : trailingslashit(home_url('/blog/')) . '%_%';
                $pagi = paginate_links(array(
                    'total'   => $ee_blog_query->max_num_pages,
                    'current' => max(1, get_query_var('paged') ?: get_query_var('page')),
                    'type'    => 'array',
                    'base'    => $pagi_base,
                    'format'  => 'page/%#%/',
                ));
                if ($pagi) : ?>
                <nav class="ee-blog-pagi" aria-label="Pagination">
                    <p>Page <?php echo max(1, get_query_var('paged') ?: get_query_var('page')); ?> of <?php echo (int) $ee_blog_query->max_num_pages; ?>, showing <?php echo (int) $ee_blog_query->post_count; ?> of <?php echo (int) $ee_blog_query->found_posts; ?> articles</p>
                    <?php foreach ($pagi as $link) echo $link; ?>
                </nav>
                <?php endif; ?>

            <?php else : ?>
                <div class="ee-blog-empty">
                    <p>No posts published yet. Head to <strong>Blog → Add New</strong> in your admin, assign a category, and your first article will land here automatically.</p>
                </div>
            <?php endif; ?>
        </main>

        <aside class="ee-blog-side-r" aria-label="Sidebar">
            <div class="ee-blog-social">
                <ul>
                    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(home_url('/blog/')); ?>" target="_blank" rel="noopener"><i class="fa fa-linkedin" style="color:#0077B5"></i> Share</a></li>
                    <li><a href="mailto:?subject=ExtraaEdge%20Blog&body=<?php echo urlencode(home_url('/blog/')); ?>"><i class="fa fa-envelope-o" style="color:#3174F1"></i> E-mail</a></li>
                    <li><a href="javascript:window.print()"><i class="fa fa-print" style="color:#666"></i> Print</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog/feed/')); ?>"><i class="fa fa-rss" style="color:#F26522"></i> RSS</a></li>
                </ul>
            </div>
            <?php ee_render_blog_form(); ?>
        </aside>

    </div>
</div>

<?php
get_footer();
