<?php
/**
 * Dynamic render for SM Related Products block.
 */

if ( ! function_exists( 'wc_get_related_products' ) || ! is_product() ) {
	return;
}

global $product;

if ( ! $product ) {
    $product = wc_get_product( get_the_ID() );
}

if ( ! $product ) {
    return;
}

$limit   = isset( $attributes['limit'] ) ? intval( $attributes['limit'] ) : 4;
$columns = isset( $attributes['columns'] ) ? intval( $attributes['columns'] ) : 4;
$title   = isset( $attributes['sectionTitle'] ) ? $attributes['sectionTitle'] : __( 'Related Products', 'my-blocks' );

$related_ids = wc_get_related_products( $product->get_id(), $limit );

if ( empty( $related_ids ) ) {
	return;
}

$wrapper_attributes = get_block_wrapper_attributes( array(
	'class' => 'sm-product-related',
    'style' => '--columns: ' . $columns . ';'
) );
?>
<section <?php echo $wrapper_attributes; ?>>
	<div class="sm-pr-inner">
		<?php if ( $title ) : ?>
			<div class="sm-pr-header">
				<h2 class="sm-pr-title"><?php echo esc_html( $title ); ?></h2>
			</div>
		<?php endif; ?>

		<div class="sm-pr-grid">
			<?php foreach ( $related_ids as $related_id ) : 
				$rel_product = wc_get_product( $related_id );
				if ( ! $rel_product ) continue;

				$image_id  = $rel_product->get_image_id();
				$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'woocommerce_thumbnail' ) : wc_placeholder_img_src();
				$price_html = $rel_product->get_price_html();
				$permalink  = $rel_product->get_permalink();
				$name       = $rel_product->get_name();
				$on_sale    = $rel_product->is_on_sale();
			?>
				<a class="sm-item-card" href="<?php echo esc_url( $permalink ); ?>">
					<div class="sm-item-img">
						<?php if ( $on_sale ) : ?>
							<span class="sm-item-badge"><?php esc_html_e( 'Sale', 'my-blocks' ); ?></span>
						<?php endif; ?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy" />
					</div>
					<div class="sm-item-content">
						<h3 class="sm-item-label"><?php echo esc_html( $name ); ?></h3>
						<div class="sm-item-price"><?php echo $price_html; ?></div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
