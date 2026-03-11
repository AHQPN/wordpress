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

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-price-container' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<p class="price"><?php echo $product->get_price_html(); ?></p>
</div>
