<?php
/*
Plugin Name: EE Orange Homepage
Description: Serves the approved Orange Homepage Concept as the site front page, bypassing theme templates and page cache. Deactivate to restore the theme homepage.
Version: 1.0
Author: ExtraaEdge
*/
if (!defined('ABSPATH')) exit;

/* Front page (the empty path) renders orange-home.php. Hooked on init
   priority 0 so no rewrite, redirect or template decision runs first.
   no-cache headers keep LiteSpeed and browsers from ever pinning an old
   copy while the design is under review. */
add_action('init', function () {
    if (is_admin()) return;
    if (defined('DOING_AJAX') && DOING_AJAX) return;
    if (defined('DOING_CRON') && DOING_CRON) return;
    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if ($path !== '' && $path !== 'index.php') return;

    nocache_headers();
    header('X-LiteSpeed-Cache-Control: no-cache');
    status_header(200);
    include __DIR__ . '/orange-home.php';
    exit;
}, 0);

/* flush LiteSpeed page cache the moment the plugin turns on or off */
register_activation_hook(__FILE__, function () { do_action('litespeed_purge_all'); });
register_deactivation_hook(__FILE__, function () { do_action('litespeed_purge_all'); });
