<?php
/**
 * Render product breadcrumb block.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-breadcrumb-container' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<?php
	$args = array(
		'delimiter'   => ' / ',
		'wrap_before' => '<nav class="woocommerce-breadcrumb">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
	
	woocommerce_breadcrumb( $args ); 
	?>
</div>
