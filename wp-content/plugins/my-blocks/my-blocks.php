<?php
/**
 * Plugin Name:       SM Custom Blocks
 * Description:       Bộ block giao diện tuỳ chỉnh cho toàn bộ các trang của website. Bao gồm Hero, Header, Footer, Collection List, Featured Product, Testimonial, CTA, Newsletter.
 * Version:           0.1.0
 * Requires at least: 6.8
 * Requires PHP:      7.4
 * Author:            SM Developer
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-blocks
 *
 * @package SMCustomBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
 * based on the registered block metadata. Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function create_block_my_blocks_block_init() {
	wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
}
add_action( 'init', 'create_block_my_blocks_block_init' );

/**
 * Allow SVG uploads for administrators.
 */
function sm_blocks_allow_svg_upload( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'sm_blocks_allow_svg_upload' );

/**
 * Fix SVG file type check (WordPress sometimes blocks SVG even with correct mime).
 */
function sm_blocks_fix_svg_filetype( $data, $file, $filename, $mimes ) {
	$ext = isset( $data['ext'] ) ? $data['ext'] : '';
	if ( '' === $ext ) {
		$filetype = wp_check_filetype( $filename, $mimes );
		$ext      = $filetype['ext'];
	}
	if ( 'svg' === $ext ) {
		$data['type'] = 'image/svg+xml';
		$data['ext']  = 'svg';
	}
	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'sm_blocks_fix_svg_filetype', 10, 4 );


/**
 * Handle custom URL parameters for filtering (e.g. stock_status).
 */
function sm_handle_custom_product_filters( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'product' ) && ! is_product_taxonomy() ) {
		return;
	}

	// Filter by Stock Status
	if ( isset( $_GET['stock_status'] ) && ! empty( $_GET['stock_status'] ) ) {
		$status = sanitize_text_field( $_GET['stock_status'] );
		$meta_query = $query->get( 'meta_query' ) ?: array();
		$meta_query[] = array(
			'key'   => '_stock_status',
			'value' => $status,
		);
		$query->set( 'meta_query', $meta_query );
	}
}
add_action( 'pre_get_posts', 'sm_handle_custom_product_filters' );


/**
 * AJAX handler – Live product search for SM Header.
 */
function sm_header_product_search() {
	check_ajax_referer( 'sm_header_search_nonce', 'nonce' );

	$keyword = isset( $_GET['keyword'] ) ? sanitize_text_field( $_GET['keyword'] ) : '';
	$results = array();

	if ( strlen( $keyword ) >= 2 ) {
		$query = new WP_Query( array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			's'              => $keyword,
			'posts_per_page' => 8,
		) );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$product = wc_get_product( get_the_ID() );
				if ( ! $product ) continue;

				$results[] = array(
					'id'        => $product->get_id(),
					'name'      => $product->get_name(),
					'permalink' => get_permalink(),
					'thumbnail' => get_the_post_thumbnail_url( get_the_ID(), 'woocommerce_thumbnail' ) ?: wc_placeholder_img_src( 'woocommerce_thumbnail' ),
					'price'     => $product->get_price_html(),
				);
			}
			wp_reset_postdata();
		}
	}

	wp_send_json_success( array(
		'products'   => $results,
		'keyword'    => $keyword,
		'search_url' => add_query_arg( array( 's' => $keyword, 'post_type' => 'product' ), home_url( '/' ) ),
	) );
}
add_action( 'wp_ajax_sm_header_search', 'sm_header_product_search' );
add_action( 'wp_ajax_nopriv_sm_header_search', 'sm_header_product_search' );
