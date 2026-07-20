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
                    <h3 class="ee-blog-card-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="ee-blog-card-date">
                        Posted On <span><?php echo esc_html(get_the_date()); ?></span>
                        <?php if ($primary) : ?>
                            · <a href="<?php echo esc_url(get_category_link($primary->term_id)); ?>" style="color:var(--b-blue);text-decoration:none;font-weight:600;"><?php echo esc_html($primary->name); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="ee-blog-card-row">
                    <div class="ee-blog-card-body">
                        <p class="ee-blog-card-excerpt">
                            <?php
                            /* first 160 characters only, cut on a word boundary, then … */
                            $ee_x = get_the_excerpt() ?: strip_shortcodes(get_the_content());
                            $ee_x = trim(preg_replace('/\s+/u', ' ', wp_strip_all_tags($ee_x)));
                            if (mb_strlen($ee_x) > 160) {
                                $ee_x = mb_substr($ee_x, 0, 160);
                                $ee_x = preg_replace('/\s+\S*$/u', '', $ee_x) . '…';
                            }
                            echo esc_html($ee_x);
                            ?>
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
                    </div>
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
                    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_category_link($ee_current_cat->term_id)); ?>" target="_blank" rel="noopener"><?php echo ee_icon('ti-brand-linkedin', 24); ?> <span>LinkedIn</span></a></li>
                    <li><a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_category_link($ee_current_cat->term_id)); ?>" target="_blank" rel="noopener"><?php echo ee_icon('ti-brand-whatsapp', 24); ?> <span>WhatsApp</span></a></li>
                    <li><a href="mailto:?subject=<?php echo urlencode(single_cat_title('', false)); ?>&body=<?php echo urlencode(get_category_link($ee_current_cat->term_id)); ?>"><?php echo ee_icon('ti-mail', 24); ?> <span>E-mail</span></a></li>
                    <li><a href="#" class="ee-soc-copy" data-url="<?php echo esc_attr(get_category_link($ee_current_cat->term_id)); ?>"><?php echo ee_icon('ti-link', 24); ?> <span>Copy Link</span></a></li>
                    <li><a href="javascript:window.print()"><?php echo ee_icon('ti-printer', 24); ?> <span>Print</span></a></li>
                    <li><a href="javascript:window.print()"><?php echo ee_icon('ti-file-text', 24); ?> <span>Save PDF</span></a></li>
                </ul>
                <script>
                document.querySelectorAll('.ee-soc-copy').forEach(function(b){
                    b.addEventListener('click', function(e){
                        e.preventDefault();
                        var u = b.getAttribute('data-url');
                        (navigator.clipboard ? navigator.clipboard.writeText(u) : Promise.reject()).then(function(){
                            b.querySelector('span').textContent = 'Copied!';
                            setTimeout(function(){ b.querySelector('span').textContent = 'Copy Link'; }, 1800);
                        }).catch(function(){ window.prompt('Copy this link:', u); });
                    });
                });
                </script>
            </div>
            <?php ee_render_blog_form(); ?>
        </aside>

    </div>
</div>

<?php
get_footer();
