<?php
/**
 * Garden Landscaping: Block Patterns
 *
 * @package Garden Landscaping
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'garden-landscaping',
		array( 'label' => __( 'Garden Landscaping', 'garden-landscaping' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'garden-landscaping/banner-section',
		array(
			'title'      => __( 'Banner Section', 'garden-landscaping' ),
			'categories' => array( 'garden-landscaping' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_theme_file_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":1877,\"dimRatio\":40,\"customOverlayColor\":\"#222222\",\"minHeight\":600,\"align\":\"full\",\"className\":\"is-light banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light banner-section\" style=\"min-height:600px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-40 has-background-dim\" style=\"background-color:#222222\"></span><img class=\"wp-block-cover__image-background wp-image-1877\" alt=\"\" src=\"" . esc_url(get_theme_file_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"mx-lg-5 mx-0 ps-md-5\"} -->\n<div class=\"wp-block-columns alignwide mx-lg-5 mx-0 ps-md-5\"><!-- wp:column {\"width\":\"50%\",\"className\":\"banner-content\"} -->\n<div class=\"wp-block-column banner-content\" style=\"flex-basis:50%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":45},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}}},\"textColor\":\"white\"} -->\n<h1 class=\"wp-block-heading has-white-color has-text-color has-link-color\" style=\"font-size:45px\">Lorem ipsum dolor sit amet, consectetur</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":15},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color has-link-color\" style=\"font-size:15px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#00917c\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color has-background wp-element-button\" style=\"background-color:#00917c\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'garden-landscaping/project-section',
		array(
			'title'      => __( 'Project Section', 'garden-landscaping' ),
			'categories' => array( 'garden-landscaping' ),
			'content'    => "<!-- wp:group {\"className\":\"project-section py-5\"} -->\n<div class=\"wp-block-group project-section py-5\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":15}},\"className\":\"small-title mb-2\"} -->\n<p class=\"has-text-align-center small-title mb-2\" style=\"font-size:15px\">Our Work</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":35}}} -->\n<h2 class=\"has-text-align-center\" style=\"font-size:35px\">OUR PROJECT</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"project-box mb-md-0 mb-4\"} -->\n<div class=\"wp-block-column project-box mb-md-0 mb-4\"><!-- wp:image {\"id\":1873,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_theme_file_uri()) . "/inc/block-patterns/images/project1.png\" alt=\"\" class=\"wp-image-1873\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:group {\"className\":\"project-content\"} -->\n<div class=\"wp-block-group project-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"white\",\"fontSize\":\"medium\"} -->\n<h3 class=\"has-text-align-center has-white-color has-text-color has-medium-font-size\">Our Project 1</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":15}},\"textColor\":\"white\"} -->\n<p class=\"has-text-align-center has-white-color has-text-color\" style=\"font-size:15px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"project-box mb-md-0 mb-4\"} -->\n<div class=\"wp-block-column project-box mb-md-0 mb-4\"><!-- wp:image {\"id\":1874,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_theme_file_uri()) . "/inc/block-patterns/images/project2.png\" alt=\"\" class=\"wp-image-1874\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:group {\"className\":\"project-content\"} -->\n<div class=\"wp-block-group project-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"white\",\"fontSize\":\"medium\"} -->\n<h3 class=\"has-text-align-center has-white-color has-text-color has-medium-font-size\">Our Project 1</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":15}},\"textColor\":\"white\"} -->\n<p class=\"has-text-align-center has-white-color has-text-color\" style=\"font-size:15px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"project-box mb-md-0 mb-4\"} -->\n<div class=\"wp-block-column project-box mb-md-0 mb-4\"><!-- wp:image {\"id\":1875,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_theme_file_uri()) . "/inc/block-patterns/images/project3.png\" alt=\"\" class=\"wp-image-1875\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:group {\"className\":\"project-content\"} -->\n<div class=\"wp-block-group project-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"white\",\"fontSize\":\"medium\"} -->\n<h3 class=\"has-text-align-center has-white-color has-text-color has-medium-font-size\">Our Project 1</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":15}},\"textColor\":\"white\"} -->\n<p class=\"has-text-align-center has-white-color has-text-color\" style=\"font-size:15px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
		)
	);
}