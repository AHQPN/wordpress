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
