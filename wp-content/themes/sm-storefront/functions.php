<?php
/**
 * Theme functions and definitions.
 */

if ( ! function_exists( 'sm_storefront_support' ) ) :
	function sm_storefront_support() {
		// Thêm hỗ trợ Menu (Appearance -> Menus)
		add_theme_support( 'menus' );
		
		// Thêm hỗ trợ WooCommerce
		add_theme_support( 'woocommerce' );

		// Đăng ký các vị trí menu chuẩn
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'sm-storefront' ),
			'footer'  => __( 'Footer Menu', 'sm-storefront' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'sm_storefront_support' );

/**
 * Enqueue scripts and styles.
 */
function sm_storefront_scripts() {
	wp_enqueue_style( 'sm-storefront-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Custom Cart Page Assets
	if ( is_cart() ) {
		wp_enqueue_style( 'sm-cart-style', get_theme_file_uri( 'assets/css/sm-cart.css' ), array(), '1.0.0' );
		wp_enqueue_script( 'sm-cart-js', get_theme_file_uri( 'assets/js/sm-cart.js' ), array(), '1.0.0', true );
	}

	// Custom Checkout Page Assets
	if ( is_checkout() ) {
		wp_enqueue_style( 'sm-checkout-style', get_theme_file_uri( 'assets/css/sm-checkout.css' ), array(), '1.0.0' );
		wp_enqueue_script( 'sm-checkout-js', get_theme_file_uri( 'assets/js/sm-checkout.js' ), array( 'jquery' ), '1.0.0', true );
	}

	// Custom My Account Assets
	if ( is_account_page() ) {
		wp_enqueue_style( 'sm-my-account-style', get_theme_file_uri( 'assets/css/sm-my-account.css' ), array(), '1.0.0' );
		wp_enqueue_script( 'sm-my-account-js', get_theme_file_uri( 'assets/js/sm-my-account.js' ), array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'sm_storefront_scripts' );

/**
 * Hide WooCommerce default page title on My Account page.
 */
function sm_storefront_hide_account_page_title( $show_title ) {
	if ( is_account_page() ) {
		return false;
	}

	return $show_title;
}
add_filter( 'woocommerce_show_page_title', 'sm_storefront_hide_account_page_title' );

/**
 * Customize My Account navigation menu items.
 */
function sm_storefront_customize_my_account_menu_items( $items ) {
	unset( $items['dashboard'] );
	unset( $items['downloads'] );
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'sm_storefront_customize_my_account_menu_items', 10, 1 );

/**
 * Redirect My Account Dashboard to Orders.
 */
function sm_storefront_redirect_dashboard_to_orders() {
	if ( is_account_page() && empty( WC()->query->get_current_endpoint() ) ) {
		wp_safe_redirect( wc_get_account_endpoint_url( 'orders' ) );
		exit;
	}
}
add_action( 'template_redirect', 'sm_storefront_redirect_dashboard_to_orders' );
