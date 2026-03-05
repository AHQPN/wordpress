<?php
/**
 * Theme functions and definitions
 */

function my_theme_setup()
{
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for WooCommerce.
	 */
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');

	/*
	 * Register Navigation Menus
	 */
	register_nav_menus(array(
		'primary-menu' => __('Primary Menu', 'my-theme'),
		'footer-menu' => __('Footer Menu', 'my-theme'),
	));
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * Enqueue scripts and styles.
 */
function my_theme_scripts()
{
	// Swiper CSS
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

	// Theme CSS
	wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), '1.0.0');

	// Header Fonts
	wp_enqueue_style('my-theme-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array());

	// Swiper JS
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

	// Theme custom JS
	wp_enqueue_script('my-theme-js', get_template_directory_uri() . '/js/main.js', array('swiper-js'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * Customizer Additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * WooCommerce Specific Functions
 */
// Remove default WooCommerce wrapper
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Add custom WooCommerce wrapper
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
function my_theme_wrapper_start()
{
	echo '<main id="primary" class="site-main container">';
}

add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
function my_theme_wrapper_end()
{
	echo '</main>';
}
