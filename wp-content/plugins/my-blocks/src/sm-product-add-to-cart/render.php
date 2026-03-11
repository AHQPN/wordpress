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

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-atc-container' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<?php woocommerce_template_single_add_to_cart(); ?>
</div>
