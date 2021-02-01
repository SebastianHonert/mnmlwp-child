<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Child Theme Functions
function mnmlwp_child_enqueue_scripts() {
    wp_register_style( 'mnmlwp-child', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'mnmlwp-child' );
}

add_action('wp_enqueue_scripts', 'mnmlwp_child_enqueue_scripts', 11);

// Load child theme translations
function mnmlwp_child_theme_i18n() {
    load_child_theme_textdomain( 'mnmlwp-child', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'mnmlwp_child_theme_i18n' );

// Enable Shortcodes in Text Widgets
add_filter('widget_text', 'do_shortcode');

/* ---------- Custom child theme functionality begins here ---------- */
