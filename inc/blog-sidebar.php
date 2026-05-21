<?php
/**
 * Shared CSS + sidebar for the Blog landing and Category archive.
 * Include from page-blog.php and category.php so both screens look
 * identical (left sidebar with every WP category, main area, right
 * social/share + lead form sidebar).
 *
 * Pulls from the standard WordPress taxonomy "category". When the
 * editor publishes a post and assigns one or more categories, the
 * post automatically appears under each of those category buckets —
 * no extra config required.
 */
if (!defined('ABSPATH')) exit;

/* All categories with at least 1 published post. WP groups multi-
   category posts under every assigned category automatically. */
$ee_blog_cats = get_categories(array(
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC',
));

/* Current category context (null on the /blog/ landing). */
$ee_current_cat = (isset($GLOBALS['ee_blog_active_cat']) && $GLOBALS['ee_blog_active_cat']) ? $GLOBALS['ee_blog_active_cat'] : null;
?>
<style>
.ee-blog-page {
    --b-orange:#DE6E30;--b-orange-dark:#B85920;--b-orange-light:#FFF3EC;
    --b-blue:#19335D;--b-blue-dark:#0F2040;--b-blue-light:#EEF2F8;
    --b-white:#fff;--b-bg:#F9FAFB;--b-border:#E5E7EB;--b-border-dark:#D1D5DB;
    --b-text:#1F2937;--b-text-soft:#4A4A4A;--b-muted:#6B7280;
    --b-shadow-sm:0 1px 3px rgba(0,0,0,.06);
    --b-shadow-md:0 4px 12px rgba(0,0,0,.08);
    --b-shadow-lg:0 10px 30px rgba(0,0,0,.12);
    --b-radius:12px;--b-radius-sm:8px;
    --b-transition:.2s cubic-bezier(.4,0,.2,1);
    font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;
    color:var(--b-text);font-size:15px;line-height:1.6;
    background:linear-gradient(to bottom,#f9fafb 0%,#fff 100%);
    padding:40px 0 60px;-webkit-font-smoothing:antialiased;
}
.ee-blog-wrap { max-width:1280px; margin:0 auto; padding:0 24px; display:grid; grid-template-columns:280px 1fr 280px; gap:32px; align-items:start; }
@media (max-width:1100px){ .ee-blog-wrap{ grid-template-columns:240px 1fr; } .ee-blog-side-r{ display:none; } }
@media (max-width:820px){ .ee-blog-wrap{ grid-template-columns:1fr; } }

/* Sticky left sidebar: all WP categories */
.ee-blog-side {
    background:var(--b-white); border:1px solid var(--b-border); border-radius:var(--b-radius);
    box-shadow:var(--b-shadow-md); overflow:hidden; position:sticky; top:90px;
}
.ee-blog-side h2 {
    background:linear-gradient(135deg, var(--b-blue) 0%, #152747 100%);
    color:#fff; padding:18px 22px; margin:0; font-size:16px; font-weight:700;
    display:flex; align-items:center; gap:10px;
}
.ee-blog-side h2::before { content:'📚'; font-size:18px; }
.ee-blog-side-list { list-style:none; padding:8px; margin:0; }
.ee-blog-side-list li { margin-bottom:3px; }
.ee-blog-side-list a {
    display:flex; align-items:center; justify-content:space-between; gap:8px;
    padding:11px 14px; color:var(--b-text); text-decoration:none;
    font-size:14px; font-weight:500; border-radius:8px;
    transition:all var(--b-transition); position:relative; overflow:hidden;
}
.ee-blog-side-list a::before {
    content:''; position:absolute; left:0; top:0; height:100%; width:3px;
    background:var(--b-orange); transform:scaleY(0); transition:transform var(--b-transition);
}
.ee-blog-side-list a:hover,
.ee-blog-side-list a.active {
    background:linear-gradient(135deg, rgba(222,110,48,.10) 0%, rgba(222,110,48,.04) 100%);
    color:var(--b-orange); padding-left:18px;
}
.ee-blog-side-list a:hover::before,
.ee-blog-side-list a.active::before { transform:scaleY(1); }
.ee-blog-side-count {
    font-size:11px; font-weight:700; padding:2px 8px;
    background:var(--b-bg); color:var(--b-muted); border-radius:99px;
    border:1px solid var(--b-border); white-space:nowrap;
}
.ee-blog-side-list a.active .ee-blog-side-count,
.ee-blog-side-list a:hover .ee-blog-side-count {
    background:var(--b-orange); color:#fff; border-color:var(--b-orange);
}

/* Page heading */
.ee-blog-heading {
    margin-bottom:22px; padding-bottom:14px;
    border-bottom:3px solid var(--b-orange); position:relative;
}
.ee-blog-heading::after {
    content:''; position:absolute; bottom:-3px; left:0; width:80px; height:3px;
    background:var(--b-blue);
}
.ee-blog-heading h1 {
    font-size:30px; font-weight:800; color:var(--b-blue); margin:0;
    letter-spacing:-.5px; line-height:1.2;
}
.ee-blog-intro {
    background:linear-gradient(135deg, rgba(25,51,93,.07) 0%, rgba(222,110,48,.07) 100%);
    padding:20px 24px; border-radius:var(--b-radius); margin-bottom:28px;
    border-left:5px solid var(--b-orange); box-shadow:var(--b-shadow-sm);
}
.ee-blog-intro p { margin:0; font-size:15px; line-height:1.65; font-weight:500; color:var(--b-text); }
.ee-blog-intro span { color:var(--b-orange); font-weight:700; }

/* Category card OR blog card */
.ee-blog-card {
    background:var(--b-white); border:1px solid var(--b-border); border-radius:var(--b-radius);
    padding:24px; margin-bottom:20px; box-shadow:var(--b-shadow-sm);
    transition:all var(--b-transition); position:relative; overflow:hidden;
}
.ee-blog-card::before {
    content:''; position:absolute; left:0; top:0; height:100%; width:5px;
    background:linear-gradient(180deg, var(--b-orange), var(--b-blue));
    transform:scaleY(0); transition:transform var(--b-transition);
}
.ee-blog-card:hover {
    box-shadow:var(--b-shadow-lg); border-color:var(--b-orange); transform:translateY(-3px);
}
.ee-blog-card:hover::before { transform:scaleY(1); }
.ee-blog-card-title a {
    color:var(--b-blue); font-size:20px; font-weight:700; text-decoration:none;
    line-height:1.3; display:block; margin-bottom:10px; letter-spacing:-.3px;
    transition:color var(--b-transition);
}
.ee-blog-card-title a:hover { color:var(--b-orange); }
.ee-blog-card-date {
    color:var(--b-muted); font-size:13px; margin-bottom:14px;
    display:flex; align-items:center; gap:8px; font-weight:500;
}
.ee-blog-card-date::before { content:'📅'; font-size:15px; }
.ee-blog-card-date span { color:var(--b-orange); font-weight:600; }
.ee-blog-card-excerpt {
    color:var(--b-text-soft); font-size:14.5px; line-height:1.75; margin-bottom:18px;
}
.ee-blog-card-meta {
    display:flex; align-items:center; gap:14px; margin-bottom:18px; flex-wrap:wrap;
}
.ee-blog-card-badge {
    display:inline-flex; align-items:center; gap:7px;
    background:linear-gradient(135deg, var(--b-blue) 0%, #0f1f3d 100%);
    color:#fff; padding:6px 14px; border-radius:20px; font-size:12px;
    font-weight:700; letter-spacing:.3px;
}
.ee-blog-card-count {
    color:var(--b-muted); font-size:13.5px; font-weight:500;
}
.ee-blog-card-count strong { color:var(--b-orange); font-weight:800; font-size:15px; }
.ee-blog-explore {
    display:inline-flex; align-items:center; gap:8px;
    background:linear-gradient(135deg, var(--b-orange) 0%, #c85a1f 100%);
    color:#fff; padding:11px 22px; border-radius:8px; text-decoration:none;
    font-size:13.5px; font-weight:700; transition:all var(--b-transition);
    box-shadow:var(--b-shadow-sm); letter-spacing:.3px;
}
.ee-blog-explore:hover {
    background:linear-gradient(135deg, var(--b-blue) 0%, #0f1f3d 100%);
    color:#fff; transform:translateX(4px); box-shadow:var(--b-shadow-md);
}

/* Right sidebar — social + lead form (kept compact) */
.ee-blog-side-r { display:flex; flex-direction:column; gap:18px; }
.ee-blog-social {
    background:var(--b-white); border:1px solid var(--b-border); border-radius:var(--b-radius);
    padding:18px; box-shadow:var(--b-shadow-md);
}
.ee-blog-social ul {
    list-style:none; margin:0; padding:0; display:grid;
    grid-template-columns:repeat(2,1fr); gap:10px;
}
.ee-blog-social a {
    display:flex; flex-direction:column; align-items:center; gap:6px;
    padding:14px 8px; background:var(--b-bg); border:1px solid var(--b-border);
    border-radius:10px; text-decoration:none; color:var(--b-text);
    font-size:12px; font-weight:600; transition:all var(--b-transition);
}
.ee-blog-social a:hover {
    background:var(--b-blue); color:#fff; transform:translateY(-3px);
    box-shadow:var(--b-shadow-md); border-color:var(--b-blue);
}
.ee-blog-social a i { font-size:22px; }

.ee-blog-lead {
    background:var(--b-white); border:1px solid var(--b-border); border-radius:var(--b-radius);
    padding:22px; box-shadow:var(--b-shadow-md);
}
.ee-blog-lead h2 {
    font-size:17px; font-weight:700; color:var(--b-blue); margin:0 0 18px;
    line-height:1.4; letter-spacing:-.3px;
}
.ee-blog-lead input, .ee-blog-lead textarea {
    width:100%; padding:11px 13px; border:2px solid var(--b-border); border-radius:8px;
    font-size:13.5px; margin-bottom:12px; font-family:inherit; transition:all var(--b-transition);
    box-sizing:border-box;
}
.ee-blog-lead input:focus, .ee-blog-lead textarea:focus {
    outline:none; border-color:var(--b-orange);
    box-shadow:0 0 0 3px rgba(222,110,48,.10);
}
.ee-blog-lead textarea { resize:vertical; min-height:100px; }
.ee-blog-lead button {
    width:100%; background:linear-gradient(135deg, var(--b-orange) 0%, #c85a1f 100%);
    color:#fff; border:none; padding:12px; border-radius:8px;
    font-size:14px; font-weight:700; cursor:pointer; transition:all var(--b-transition);
    display:flex; align-items:center; justify-content:center; gap:8px;
}
.ee-blog-lead button:hover {
    background:linear-gradient(135deg, var(--b-blue) 0%, #0f1f3d 100%);
    transform:translateY(-2px); box-shadow:var(--b-shadow-md);
}

/* Pagination */
.ee-blog-pagi { margin-top:32px; text-align:center; padding:20px; background:var(--b-bg); border-radius:var(--b-radius); }
.ee-blog-pagi p { color:var(--b-muted); font-size:13px; margin:0 0 16px; font-weight:500; }
.ee-blog-pagi .page-numbers, .ee-blog-pagi a, .ee-blog-pagi span {
    display:inline-block; padding:8px 14px; margin:0 3px; border:2px solid var(--b-border);
    background:#fff; color:var(--b-text); text-decoration:none; border-radius:8px;
    font-size:13.5px; font-weight:600; transition:all var(--b-transition);
}
.ee-blog-pagi .page-numbers.current, .ee-blog-pagi span.current {
    background:linear-gradient(135deg, var(--b-orange) 0%, #c85a1f 100%);
    color:#fff; border-color:var(--b-orange);
}
.ee-blog-pagi a:hover { background:var(--b-blue); color:#fff; border-color:var(--b-blue); transform:translateY(-2px); }

/* Empty state */
.ee-blog-empty {
    background:#fff; border:1px dashed var(--b-border-dark); border-radius:var(--b-radius);
    padding:48px 24px; text-align:center; color:var(--b-muted);
}
.ee-blog-empty p { margin:0; font-size:15px; }
</style>

<aside class="ee-blog-side" aria-label="Blog categories">
    <h2>Blogs by Category</h2>
    <ul class="ee-blog-side-list">
        <li>
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="<?php echo $ee_current_cat === null ? 'active' : ''; ?>">
                <span>All Categories</span>
                <span class="ee-blog-side-count"><?php echo (int) wp_count_posts()->publish; ?></span>
            </a>
        </li>
        <?php foreach ($ee_blog_cats as $cat) : ?>
        <li>
            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="<?php echo ($ee_current_cat && $ee_current_cat->term_id === $cat->term_id) ? 'active' : ''; ?>">
                <span><?php echo esc_html($cat->name); ?></span>
                <span class="ee-blog-side-count"><?php echo (int) $cat->count; ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</aside>
