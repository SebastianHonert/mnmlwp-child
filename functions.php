<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Child Theme Functions
function mnmlwp_child_enqueue_scripts()
{
    wp_register_style( 'mnmlwp-child', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'mnmlwp-child' );
}

add_action('wp_enqueue_scripts', 'mnmlwp_child_enqueue_scripts', 11);

// Load translation files from your child theme instead of the parent theme
function mnmlwp_child_theme_i18n()
{
    load_child_theme_textdomain( 'mnmlwp', get_stylesheet_directory() . '/lang' );
}

add_action( 'after_setup_theme', 'mnmlwp_child_theme_i18n' );

// Enable Shortcodes in Text Widgets
add_filter('widget_text', 'do_shortcode');

// Remove query string from static files
function mnmlwp_remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

add_filter( 'style_loader_src', 'mnmlwp_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'mnmlwp_remove_cssjs_ver', 10, 2 );

/* ---------- Custom child theme functionality begins here ---------- */
