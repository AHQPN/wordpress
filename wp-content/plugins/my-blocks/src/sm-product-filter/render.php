<?php
/**
 * Render for SM Product Filter.
 * Displays sidebar filters dynamically based on WooCommerce data.
 */

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-filter' ) );

// Get current filter values from URL
$current_min_price   = isset( $_GET['min_price'] ) ? intval( $_GET['min_price'] ) : '';
$current_max_price   = isset( $_GET['max_price'] ) ? intval( $_GET['max_price'] ) : '';
$current_stock_status = isset( $_GET['stock_status'] ) ? sanitize_text_field( $_GET['stock_status'] ) : '';

// 1. Get Price Range for current collection
global $wp_query;
$prices = array();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$product = wc_get_product( get_the_ID() );
		if ( $product ) {
			$prices[] = $product->get_price();
		}
	}
	rewind_posts();
}
$min_range = ! empty( $prices ) ? floor( min( $prices ) ) : 0;
$max_range = ! empty( $prices ) ? ceil( max( $prices ) ) : 1000000;

// 2. Get Attributes taxonomies
$attribute_taxonomies = wc_get_attribute_taxonomies();
?>
<aside <?php echo $wrapper_attributes; ?>>
	<h2 class="sm-filter-title">BỘ LỌC</h2>

	<!-- Availability Section -->
	<div class="sm-filter-group" data-filter="availability">
		<div class="sm-filter-header">
			<h3>Availability</h3>
			<span class="sm-toggle-icon">▼</span>
		</div>
		<div class="sm-filter-content sm-filter-availability">
			<?php
			// Standard WooCommerce stock status is difficult to count per query without custom SQL, 
			// using simple checkboxes for now that trigger the filter.
			?>
			<div class="sm-filter-item">
				<input type="checkbox" id="instock" value="instock" <?php checked( $current_stock_status, 'instock' ); ?>>
				<label for="instock">Còn hàng</label>
			</div>
			<div class="sm-filter-item">
				<input type="checkbox" id="outofstock" value="outofstock" <?php checked( $current_stock_status, 'outofstock' ); ?>>
				<label for="outofstock">Hết hàng</label>
			</div>
		</div>
	</div>

	<!-- Price Section -->
	<div class="sm-filter-group" data-filter="price">
		<div class="sm-filter-header">
			<h3>Price</h3>
			<span class="sm-toggle-icon">▼</span>
		</div>
		<div class="sm-filter-content sm-filter-price">
			<div class="sm-price-inputs">
				<div class="sm-price-field">
					<input type="number" name="min_price" value="<?php echo esc_attr( $current_min_price ); ?>" placeholder="<?php echo esc_attr( $min_range ); ?>">
					<span class="sm-currency">₫</span>
				</div>
				<span class="sm-separator">—</span>
				<div class="sm-price-field">
					<input type="number" name="max_price" value="<?php echo esc_attr( $current_max_price ); ?>" placeholder="<?php echo esc_attr( $max_range ); ?>">
					<span class="sm-currency">₫</span>
				</div>
			</div>
		</div>
	</div>

	<!-- Dynamic Attributes -->
	<?php 
	// Get attributes present in the current result set for better UX
	$current_category = get_queried_object();
	$category_id = ( $current_category instanceof WP_Term ) ? $current_category->term_id : 0;

	foreach ( $attribute_taxonomies as $tax ) : 
		$taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );
		if ( ! taxonomy_exists( $taxonomy_name ) ) continue;

		// Get terms for this taxonomy that are actually used by products in the current category
		$term_args = array(
			'taxonomy'   => $taxonomy_name,
			'hide_empty' => true,
		);

		// If we are in a category, try to narrow down terms
		if ( $category_id ) {
			$term_args['meta_query'] = array(
				array(
					'key'     => 'product_cat',
					'value'   => $category_id,
					'compare' => 'EXISTS', // This is a simplification, ideally we'd use a more precise query
				)
			);
		}

		$terms = get_terms( $term_args );
		
		// Fallback to all terms if category specific fails or keep it simple as WC handles this via layered nav usually
		if ( empty( $terms ) ) {
			$terms = get_terms( array( 'taxonomy' => $taxonomy_name, 'hide_empty' => true ) );
		}

		if ( empty( $terms ) ) continue;

		$filter_key = 'filter_' . $tax->attribute_name;
		$current_filters = isset( $_GET[$filter_key] ) ? explode( ',', sanitize_text_field( $_GET[$filter_key] ) ) : array();
	?>
		<div class="sm-filter-group" data-filter="<?php echo esc_attr( $tax->attribute_name ); ?>">
			<div class="sm-filter-header">
				<h3><?php echo esc_html( $tax->attribute_label ); ?></h3>
				<span class="sm-toggle-icon">▼</span>
			</div>
						<div class="sm-filter-content sm-filter-attribute">
							<?php foreach ( $terms as $term ) : 
								// Check if this term belongs to products in the current category
								// This is a more robust way to ensure we only show terms with products in the current view
								if ( $category_id ) {
									$products_in_cat_with_term = get_posts( array(
										'post_type' => 'product',
										'fields' => 'ids',
										'tax_query' => array(
											'relation' => 'AND',
											array(
												'taxonomy' => 'product_cat',
												'field'    => 'term_id',
												'terms'    => $category_id,
											),
											array(
												'taxonomy' => $taxonomy_name,
												'field'    => 'slug',
												'terms'    => $term->slug,
											),
										),
										'posts_per_page' => 1,
									) );
									if ( empty( $products_in_cat_with_term ) ) continue;
								}
							?>
								<div class="sm-filter-item">
									<input type="checkbox" 
										id="filter-<?php echo esc_attr( $tax->attribute_name ); ?>-<?php echo esc_attr( $term->term_id ); ?>" 
										name="<?php echo esc_attr( $filter_key ); ?>" 
										value="<?php echo esc_attr( $term->slug ); ?>"
										<?php checked( in_array( $term->slug, $current_filters ) ); ?>
									>
									<label for="filter-<?php echo esc_attr( $tax->attribute_name ); ?>-<?php echo esc_attr( $term->term_id ); ?>">
										<?php echo esc_html( $term->name ); ?>
										<?php if ( $term->count > 0 && ! $category_id ) : ?>
											<span class="sm-count">(<?php echo $term->count; ?>)</span>
										<?php endif; ?>
									</label>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>

				<div class="sm-filter-actions">
					<button type="button" class="sm-apply-filter">LỌC</button>
					<a href="<?php echo esc_url( strtok( $_SERVER["REQUEST_URI"], '?' ) ); ?>" class="sm-clear-filter">Xóa tất cả</a>
				</div>
</aside>
