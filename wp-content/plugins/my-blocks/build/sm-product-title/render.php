<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
if ( ! is_a( $product, 'WC_Product' ) ) {
	$product = wc_get_product( get_the_ID() );
}

if ( empty( $product ) ) {
	return;
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-title-container' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<h1 class="product_title entry-title"><?php echo get_the_title( $product->get_id() ); ?></h1>
</div>
