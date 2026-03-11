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

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-desc-container' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<?php
		ob_start();
		the_content();
		$content = ob_get_clean();
		
		// Fallback to short description if main content is empty
		if ( empty( strip_tags( $content ) ) ) {
			echo apply_filters( 'woocommerce_short_description', $product->get_short_description() );
		} else {
			echo $content;
		}
	?>
</div>
