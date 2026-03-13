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

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-image-container' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
	<?php 
		$image_id = $product->get_image_id();
		if ( $image_id ) {
			echo wp_get_attachment_image( $image_id, 'woocommerce_single', false, array(
				'class' => 'sm-main-product-image',
			) );
		} else {
			echo sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		}
	?>
</div>
