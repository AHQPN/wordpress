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

$short_description = apply_filters( 'woocommerce_short_description', $product->get_short_description() );

if ( empty( $short_description ) ) {
    return;
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-short-desc' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<?php echo $short_description; ?>
</div>
