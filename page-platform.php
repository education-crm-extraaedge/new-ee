<?php
/**
 * /product-tour/ — the "Explore the platform yourself" section on its own
 * page. The section itself (dummy CRM, tour, overlay, popup) lives in
 * inc/platform-demo.php; this template only adds a slim page head so the
 * page has an H1 of its own.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_filter('pre_get_document_title', function () {
    return 'Product Tour — Explore the ExtraaEdge Platform Yourself';
}, 99);

get_header();
?>

<!-- ee-platform-tpl v2026-08-07-product-tour -->
<style id="ee-ptour-head">
.ee-ptour-head{background:linear-gradient(180deg,#FBFCFE,#fff);padding:clamp(30px,4vw,52px) 0 0;text-align:center;font-family:'Inter',system-ui,sans-serif}
.ee-ptour-head .wrap{max-width:820px;margin:0 auto;padding:0 22px}
/* same id/class/type counts as the site heading-scale rule; prints later, wins the tie */
html body #main-content .ee-ptour-head h1.h1.ptour-h1{
  margin:0 0 10px !important;color:#19335D !important;font-weight:800 !important;
  font-size:clamp(28px,3.6vw,44px) !important;line-height:1.1 !important;letter-spacing:-.03em !important}
.ee-ptour-head .ptour-h1 em{font-style:normal;color:#DE6E30}
.ee-ptour-head p{margin:0;color:#6B7C96;font-size:clamp(14.5px,1.7vw,17px);line-height:1.65}
</style>

<div class="ee-ptour-head">
  <div class="wrap">
    <h1 class="h1 ptour-h1">ExtraaEdge <em>Product Tour</em></h1>
    <p>The live platform, on sample data &mdash; click around every dashboard, or let the guided tour walk you through it.</p>
  </div>
</div>

<?php ee_platform_section(); ?>

<?php get_footer(); ?>
