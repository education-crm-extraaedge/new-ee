<?php
/**
 * VidyaAI theme — setup & asset loading.
 */
if (!defined('ABSPATH')) exit;

if (!function_exists('vidyaai_setup')) {
    function vidyaai_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', array('search-form','gallery','caption','style','script'));
        add_theme_support('responsive-embeds');
        register_nav_menus(array('primary' => 'Primary Menu'));
    }
}
add_action('after_setup_theme', 'vidyaai_setup');

/** Fonts + stylesheet. */
function vidyaai_assets() {
    wp_enqueue_style(
        'vidyaai-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'vidyaai-style',
        get_stylesheet_uri(),
        array('vidyaai-fonts'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'vidyaai_assets');

/** Preconnect to Google Fonts for faster first paint. */
function vidyaai_resource_hints($hints, $relation) {
    if ('preconnect' === $relation) {
        $hints[] = 'https://fonts.googleapis.com';
        $hints[] = array('href' => 'https://fonts.gstatic.com', 'crossorigin');
    }
    return $hints;
}
add_filter('wp_resource_hints', 'vidyaai_resource_hints', 10, 2);
