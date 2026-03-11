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

if ( ! wc_review_ratings_enabled() ) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count <= 0 ) {
    // Optionally return nothing if no ratings, or show empty stars
    // return; 
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-rating' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
    <div class="sm-rating-inner">
        <?php echo wc_get_rating_html( $average, $rating_count ); ?>
        <?php if ( $review_count > 0 ) : ?>
            <span class="sm-review-count">(<?php echo sprintf( _n( '%s review', '%s reviews', $review_count, 'my-blocks' ), esc_html( $review_count ) ); ?>)</span>
        <?php endif; ?>
    </div>
</div>
