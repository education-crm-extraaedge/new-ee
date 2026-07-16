<?php
/**
 * page-builder-canvas.php — frontend canvas for 🏗️ EE Page Builder pages.
 * Selected by the template_include filter in inc/page-builder.php whenever a
 * page has the _ee_pb_on meta flag. Renders the saved element layout between
 * the theme's normal header and footer.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

get_header();

$ee_pb_pid   = get_queried_object_id();
$ee_pb_items = function_exists('ee_pb_get_items') ? ee_pb_get_items($ee_pb_pid) : array();
?>
<main id="main-content">
<?php
if ($ee_pb_items) {
    echo ee_pb_render_page($ee_pb_items); // escaped element-by-element in the renderer
} else {
    ?>
    <div style="max-width:760px;margin:0 auto;padding:80px 22px;text-align:center;font-family:'Inter',sans-serif;color:#19335D">
        <h1 style="font-weight:800"><?php echo esc_html(get_the_title($ee_pb_pid)); ?></h1>
        <p style="color:rgba(25,51,93,.65);margin-top:10px">This page is empty — add elements in <b>ExtraaEdge Site → 🏗️ Page Builder</b>.</p>
    </div>
    <?php
}
?>
</main>
<?php get_footer(); ?>
