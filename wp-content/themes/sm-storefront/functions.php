<?php
/**
 * Theme functions and definitions.
 */

if ( ! function_exists( 'sm_storefront_support' ) ) :
	function sm_storefront_support() {
		// Thêm hỗ trợ Menu (Appearance -> Menus)
		add_theme_support( 'menus' );
		
		// Đăng ký các vị trí menu chuẩn
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'sm-storefront' ),
			'footer'  => __( 'Footer Menu', 'sm-storefront' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'sm_storefront_support' );
