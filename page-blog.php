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

/* SEO + Article schema is handled by wp_head in header.php — we
   just override the document title here. */
add_filter('pre_get_document_title', function () {
    return 'Blog — Insights & Resources from ExtraaEdge';
}, 99);

/* Define $ee_blog_cats up front so the page renders even if the
   sidebar partial is missing on disk. The partial overwrites this
   with the same value when it loads, so behaviour is identical. */
$ee_blog_cats = get_categories(array(
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC',
));

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
                <h1>Explore by Category</h1>
            </header>

            <div class="ee-blog-intro">
                <p>Dive into our curated collection of insights across <span><?php echo (int) count($ee_blog_cats); ?> specialised topics</span>. Click a category to see every article in that bucket.</p>
            </div>

            <?php
            /* One card per WP category */
            if (empty($ee_blog_cats)) :
            ?>
                <div class="ee-blog-empty">
                    <p>No blog categories yet. Add some categories under <strong>Posts → Categories</strong> and publish a few posts to populate this page.</p>
                </div>
            <?php else :
                /* Try to pick a sensible icon per category from a small map */
                $ee_cat_icons = array(
                    'crm'         => 'fa-database',
                    'admission'   => 'fa-graduation-cap',
                    'marketing'   => 'fa-line-chart',
                    'lead'        => 'fa-bullseye',
                    'strategy'    => 'fa-bullseye',
                    'ai'          => 'fa-bar-chart',
                    'analytics'   => 'fa-bar-chart',
                    'team'        => 'fa-users',
                    'industry'    => 'fa-lightbulb-o',
                    'sms'         => 'fa-comment',
                    'whatsapp'    => 'fa-whatsapp',
                    'higher'      => 'fa-university',
                );
                foreach ($ee_blog_cats as $cat) :
                    $slug = strtolower($cat->slug);
                    $icon = 'fa-folder';
                    foreach ($ee_cat_icons as $needle => $ico) {
                        if (strpos($slug, $needle) !== false) { $icon = $ico; break; }
                    }
                    $desc = $cat->description ?: 'Browse every published article in the ' . $cat->name . ' category.';
            ?>
                <article class="ee-blog-card">
                    <h3 class="ee-blog-card-title">
                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
                    </h3>
                    <div class="ee-blog-card-meta">
                        <div class="ee-blog-card-badge">
                            <i class="fa <?php echo esc_attr($icon); ?>"></i>
                            <span><?php echo esc_html($cat->name); ?></span>
                        </div>
                        <div class="ee-blog-card-count">
                            <strong><?php echo (int) $cat->count; ?></strong> <?php echo $cat->count === 1 ? 'article' : 'articles'; ?>
                        </div>
                    </div>
                    <p class="ee-blog-card-excerpt"><?php echo esc_html($desc); ?></p>
                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="ee-blog-explore">
                        Explore Category <i class="fa fa-arrow-right"></i>
                    </a>
                </article>
            <?php endforeach; endif; ?>
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
            <div class="ee-blog-lead">
                <h2>Get weekly admissions insights — straight to your inbox</h2>
                <form onsubmit="event.preventDefault(); this.querySelector('button').textContent='Subscribed!'; this.querySelector('button').disabled=true;">
                    <input type="text"  placeholder="First Name*"   required>
                    <input type="text"  placeholder="Last Name*"    required>
                    <input type="email" placeholder="Business Email*" required>
                    <input type="tel"   placeholder="Phone (with country code)*" required>
                    <textarea placeholder="Topics you want to read about *" required></textarea>
                    <button type="submit">Subscribe <i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </aside>

    </div>
</div>

<?php
get_footer();
