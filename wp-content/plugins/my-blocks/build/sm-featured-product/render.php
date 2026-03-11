<?php
/**
 * Dynamic render for SM Featured Product block.
 * Queries WooCommerce products by category and outputs a slider.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content (empty for dynamic blocks).
 * @var WP_Block $block      Block instance.
 */

$category_id    = isset( $attributes['categoryId'] ) ? intval( $attributes['categoryId'] ) : 0;
$columns         = isset( $attributes['columns'] ) ? intval( $attributes['columns'] ) : 3;
$number_of_products = isset( $attributes['numberOfProducts'] ) ? intval( $attributes['numberOfProducts'] ) : 12;
$section_title  = isset( $attributes['sectionTitle'] ) ? $attributes['sectionTitle'] : '';

if ( ! $category_id || ! function_exists( 'wc_get_products' ) ) {
	return; // No category selected or WooCommerce not active
}

$args = array(
	'status'   => 'publish',
	'limit'    => $number_of_products,
	'category' => array( get_term( $category_id )->slug ?? '' ),
	'orderby'  => 'date',
	'order'    => 'DESC',
);

$products = wc_get_products( $args );

if ( empty( $products ) ) {
	return;
}

$total_products  = count( $products );
$total_positions = max( 1, $total_products - $columns + 1 );

$wrapper_attributes = get_block_wrapper_attributes( array(
	'class'        => 'sm-featured-product',
	'data-columns' => $columns,
) );
?>
<section <?php echo $wrapper_attributes; ?>>
	<div class="sm-fp-inner sm-slider-container">
		<div class="sm-fp-header sm-slider-nav sm-cl-header">
			<?php if ( $section_title ) : ?>
				<h2 class="sm-fp-section-title sm-cl-title"><?php echo wp_kses_post( $section_title ); ?></h2>
			<?php endif; ?>
			<div class="sm-slider-nav-btns-wrap" style="display: flex; align-items: center; gap: 15px;">
				<span class="sm-slider-counter">
					<span class="sm-fp-current">1</span> / <span class="sm-fp-total"><?php echo esc_html( $total_positions ); ?></span>
				</span>
				<div class="sm-slider-nav-btns">
					<button class="sm-fp-prev">❮</button>
					<button class="sm-fp-next">❯</button>
				</div>
			</div>
		</div>

		<div class="sm-slider-track-wrap">
			<div class="sm-fp-track sm-slider-track">
				<?php foreach ( $products as $product ) :
					$image_id  = $product->get_image_id();
					$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'woocommerce_thumbnail' ) : wc_placeholder_img_src();
					$price_html = $product->get_price_html();
					$permalink  = $product->get_permalink();
					$name       = $product->get_name();
					$on_sale    = $product->is_on_sale();
				?>
				<a class="sm-fp-item sm-item-card" href="<?php echo esc_url( $permalink ); ?>">
					<div class="sm-item-img">
						<?php if ( $on_sale ) : ?>
							<span class="sm-item-badge">New Arrival</span>
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
	</div>
</section>
