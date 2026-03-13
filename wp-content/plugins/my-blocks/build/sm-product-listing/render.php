<?php
/**
 * Render for SM Product Listing.
 * Combines Filter and Grid into a single layout.
 */

$columns = isset( $attributes['columns'] ) ? intval( $attributes['columns'] ) : 3;
$show_filter = isset( $attributes['showFilter'] ) ? $attributes['showFilter'] : true;
$filter_width = isset( $attributes['filterWidth'] ) ? $attributes['filterWidth'] : '25%';
$grid_width = isset( $attributes['gridWidth'] ) ? $attributes['gridWidth'] : '75%';

$wrapper_attributes = get_block_wrapper_attributes( array( 
    'class' => 'sm-product-listing alignwide'
) );

// Logic for Filter (Copied & Adapted)
$current_min_price   = isset( $_GET['min_price'] ) ? intval( $_GET['min_price'] ) : '';
$current_max_price   = isset( $_GET['max_price'] ) ? intval( $_GET['max_price'] ) : '';
$current_stock_status = isset( $_GET['stock_status'] ) ? sanitize_text_field( $_GET['stock_status'] ) : '';

// 1. COLLECT PRODUCTS DATA ONCE
$products_data = array();
$prices = array();

if ( have_posts() ) {
    // echo '<!-- DEBUG: have_posts() is true -->';
    while ( have_posts() ) {
        the_post();
        $product = wc_get_product( get_the_ID() );
        if ( $product ) {
            $product_id = $product->get_id();
            $prices[] = $product->get_price();
            
            $products_data[] = array(
                'id'         => $product_id,
                'name'       => $product->get_name(),
                'permalink'  => get_permalink( $product_id ),
                'price_html' => $product->get_price_html(),
                'image_url'  => wp_get_attachment_image_url( $product->get_image_id(), 'woocommerce_thumbnail' ) ?: wc_placeholder_img_src(),
                'on_sale'    => $product->is_on_sale(),
                'title_attr' => the_title_attribute( array( 'echo' => false, 'post' => $product_id ) )
            );
        }
    }
    rewind_posts(); // Keep it polite for other blocks, though we won't need it.
}

$min_range = ! empty( $prices ) ? floor( min( $prices ) ) : 0;
$max_range = ! empty( $prices ) ? ceil( max( $prices ) ) : 1000000;
$attribute_taxonomies = wc_get_attribute_taxonomies();

?>
<div <?php echo $wrapper_attributes; ?>>
    <div class="sm-pl-container">
        
        <!-- Product Grid Main -->
        <main class="sm-pl-main" style="flex-basis: <?php echo esc_attr( $grid_width ); ?>;">
            <div class="sm-product-grid-wrapper" style="--sm-grid-columns: <?php echo $columns; ?>;">
                <div class="sm-grid-inner">
                    <?php if ( ! empty( $products_data ) ) : ?>
                        <div class="sm-grid-header">
                            <div class="sm-results-count"><?php woocommerce_result_count(); ?></div>
                            <div class="sm-ordering"><?php woocommerce_catalog_ordering(); ?></div>
                        </div>
                        <div class="sm-main-grid">
                            <?php foreach ( $products_data as $product_item ) : ?>
                                <a class="sm-item-card" href="<?php echo esc_url( $product_item['permalink'] ); ?>">
                                    <div class="sm-item-img">
                                        <?php if ( $product_item['on_sale'] ) : ?>
                                            <span class="sm-item-badge"><?php esc_html_e( 'Sale', 'my-blocks' ); ?></span>
                                        <?php endif; ?>
                                        <img src="<?php echo esc_url( $product_item['image_url'] ); ?>" alt="<?php echo esc_attr( $product_item['title_attr'] ); ?>" />
                                    </div>
                                    <div class="sm-item-content">
                                        <h3 class="sm-item-label"><?php echo esc_html( $product_item['name'] ); ?></h3>
                                        <div class="sm-item-price"><?php echo $product_item['price_html']; ?></div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="sm-grid-pagination"><?php woocommerce_pagination(); ?></div>
                    <?php else : ?>
                        <p class="sm-no-products"><?php esc_html_e( 'No products found.', 'my-blocks' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </main>

        <?php if ( $show_filter ) : ?>
            <!-- Filter Sidebar -->
            <aside class="sm-pl-sidebar" style="flex-basis: <?php echo esc_attr( $filter_width ); ?>;">
                <div class="sm-product-filter">
                    <h2 class="sm-filter-title">BỘ LỌC</h2>

                    <!-- Availability -->
                    <div class="sm-filter-group" data-filter="availability">
                        <div class="sm-filter-header">
                            <h3>Availability</h3>
                            <span class="sm-toggle-icon">▼</span>
                        </div>
                        <div class="sm-filter-content sm-filter-availability">
                            <div class="sm-filter-item">
                                <input type="checkbox" id="instock-listing" value="instock" <?php checked( $current_stock_status, 'instock' ); ?>>
                                <label for="instock-listing">Còn hàng</label>
                            </div>
                            <div class="sm-filter-item">
                                <input type="checkbox" id="outofstock-listing" value="outofstock" <?php checked( $current_stock_status, 'outofstock' ); ?>>
                                <label for="outofstock-listing">Hết hàng</label>
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
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
                    $current_category = get_queried_object();
                    $category_id = ( $current_category instanceof WP_Term ) ? $current_category->term_id : 0;

                    foreach ( $attribute_taxonomies as $tax ) : 
                        $taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );
                        if ( ! taxonomy_exists( $taxonomy_name ) ) continue;

                        $terms = get_terms( array( 'taxonomy' => $taxonomy_name, 'hide_empty' => true ) );
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
                                    // Robust category check
                                    if ( $category_id ) {
                                        $products_in_cat_with_term = get_posts( array(
                                            'post_type' => 'product',
                                            'fields' => 'ids',
                                            'tax_query' => array(
                                                'relation' => 'AND',
                                                array( 'taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $category_id ),
                                                array( 'taxonomy' => $taxonomy_name, 'field' => 'slug', 'terms' => $term->slug ),
                                            ),
                                            'posts_per_page' => 1,
                                        ) );
                                        if ( empty( $products_in_cat_with_term ) ) continue;
                                    }
                                ?>
                                    <div class="sm-filter-item">
                                        <input type="checkbox" 
                                            id="listing-term-<?php echo esc_attr( $term->term_id ); ?>" 
                                            name="<?php echo esc_attr( $filter_key ); ?>" 
                                            value="<?php echo esc_attr( $term->slug ); ?>"
                                            <?php checked( in_array( $term->slug, $current_filters ) ); ?>
                                        >
                                        <label for="listing-term-<?php echo esc_attr( $term->term_id ); ?>">
                                            <?php echo esc_html( $term->name ); ?>
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
                </div>
            </aside>
        <?php endif; ?>

    </div>
</div>
