<?php
/**
 * VW Cloud Kitchen: Block Patterns
 *
 * @since VW Cloud Kitchen 1.0
 */

 /**
  * Get patterns content.
  *
  * @param string $file_name Filename.
  * @return string
  */
function vw_cloud_kitchen_get_pattern_content( $file_name ) {
	ob_start();
	include get_theme_file_path( '/patterns/' . $file_name . '.php' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Registers block patterns and categories.
 *
 * @since VW Cloud Kitchen 1.0
 *
 * @return void
 */
function vw_cloud_kitchen_register_block_patterns() {

	$patterns = array(
		'header-default' => array(
			'title'      => __( 'Default header', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-headers' ),
			'blockTypes' => array( 'parts/header' ),
		),
		'footer-default' => array(
			'title'      => __( 'Default footer', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-footers' ),
			'blockTypes' => array( 'parts/footer' ),
		),
		'home-banner' => array(
			'title'      => __( 'Home Banner', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-home-banner' ),
		),
		'product-section' => array(
			'title'      => __( 'Product Section', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-product-section' ),
		),
		'about-us-section' => array(
			'title'      => __( 'About Us Section', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-about-us-section' ),
		),
		'testimonial-section' => array(
			'title'      => __( 'Testimonial Section', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-testimonial-section' ),
		),
		'news-section' => array(
			'title'      => __( 'News Section', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-news-section' ),
		),
		'faq-section' => array(
			'title'      => __( 'FAQ Section', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-faq-section' ),
		),
		'primary-sidebar' => array(
			'title'    => __( 'Primary Sidebar', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-sidebars' ),
		),
		'hidden-404' => array(
			'title'    => __( '404 content', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-pages' ),
		),
		'post-listing-single-column' => array(
			'title'    => __( 'Post Single Column', 'vw-cloud-kitchen' ),
			//'inserter' => false,
			'categories' => array( 'vw-cloud-kitchen-query' ),
		),
		'post-listing-two-column' => array(
			'title'    => __( 'Post Two Column', 'vw-cloud-kitchen' ),
			//'inserter' => false,
			'categories' => array( 'vw-cloud-kitchen-query' ),
		),
		'post-listing-three-column' => array(
			'title'    => __( 'Post Three Column', 'vw-cloud-kitchen' ),
			//'inserter' => false,
			'categories' => array( 'vw-cloud-kitchen-query' ),
		),
		'post-listing-four-column' => array(
			'title'    => __( 'Post Four Column', 'vw-cloud-kitchen' ),
			//'inserter' => false,
			'categories' => array( 'vw-cloud-kitchen-query' ),
		),
		'feature-post-column' => array(
			'title'    => __( 'Feature Post Column', 'vw-cloud-kitchen' ),
			//'inserter' => false,
			'categories' => array( 'vw-cloud-kitchen-query' ),
		),
		'comment-section-1' => array(
			'title'    => __( 'Comment Section 1', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-comment-sections' ),
		),
		'cover-with-post-title' => array(
			'title'    => __( 'Cover With Post Title', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-banner-sections' ),
		),
		'cover-with-search-title' => array(
			'title'    => __( 'Cover With Search Title', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-banner-sections' ),
		),
		'cover-with-archive-title' => array(
			'title'    => __( 'Cover With Archive Title', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-banner-sections' ),
		),
		'cover-with-index-title' => array(
			'title'    => __( 'Cover With Index Title', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-banner-sections' ),
		),
		'theme-button' => array(
			'title'    => __( 'Theme Button', 'vw-cloud-kitchen' ),
			'categories' => array( 'vw-cloud-kitchen-theme-button' ),
		),
	);

	$block_pattern_categories = array(
		'vw-cloud-kitchen-footers' => array( 'label' => __( 'Footers', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-headers' => array( 'label' => __( 'Headers', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-pages'   => array( 'label' => __( 'Pages', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-query'   => array( 'label' => __( 'Query', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-sidebars'   => array( 'label' => __( 'Sidebars', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-home-banner'   => array( 'label' => __( 'Home Banner', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-product-section'   => array( 'label' => __( 'Product Section', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-about-us-section'   => array( 'label' => __( 'About Us Section', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-testimonial-section'   => array( 'label' => __( 'Testimonial Section', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-news-section'   => array( 'label' => __( 'News Section', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-faq-section'   => array( 'label' => __( 'FAQ Section', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-comment-section'   => array( 'label' => __( 'Comment Sections', 'vw-cloud-kitchen' ) ),
		'vw-cloud-kitchen-theme-button'   => array( 'label' => __( 'Theme Button Sections', 'vw-cloud-kitchen' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since VW Cloud Kitchen 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'vw_cloud_kitchen_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since VW Cloud Kitchen 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$patterns = apply_filters( 'vw_cloud_kitchen_block_patterns', $patterns );

	foreach ( $patterns as $block_pattern => $pattern ) {
		$pattern['content'] = vw_cloud_kitchen_get_pattern_content( $block_pattern );
		register_block_pattern(
			'vw-cloud-kitchen/' . $block_pattern,
			$pattern
		);
	}
}
add_action( 'init', 'vw_cloud_kitchen_register_block_patterns', 9 );
