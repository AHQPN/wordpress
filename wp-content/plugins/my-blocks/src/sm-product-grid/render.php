<?php
/**
 * Render for SM Product Grid.
 * Displays products from the current query (archive) or a custom query.
 */

global $wp_query;

$columns = isset( $attributes['columns'] ) ? intval( $attributes['columns'] ) : 4;
$wrapper_attributes = get_block_wrapper_attributes( array( 
    'class' => 'sm-product-grid-wrapper',
    'style' => '--sm-grid-columns: ' . $columns . ';'
) );

?>
<div <?php echo $wrapper_attributes; ?>>
    <div class="sm-grid-inner">
        <?php if ( have_posts() ) : ?>
            <div class="sm-grid-header">
                <div class="sm-results-count">
                    <?php woocommerce_result_count(); ?>
                </div>
                <div class="sm-ordering">
                    <?php woocommerce_catalog_ordering(); ?>
                </div>
            </div>
            <div class="sm-main-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    global $product;
                    
                    if ( ! $product ) {
                        $product = wc_get_product( get_the_ID() );
                    }

                    if ( ! $product ) continue;

                    $image_id  = $product->get_image_id();
                    $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'woocommerce_thumbnail' ) : wc_placeholder_img_src();
                    $price_html = $product->get_price_html();
                    $permalink  = $product->get_permalink();
                    $name       = $product->get_name();
                    $on_sale    = $product->is_on_sale();
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
                <?php endwhile; ?>
            </div>

            <div class="sm-grid-pagination">
                <?php woocommerce_pagination(); ?>
            </div>

        <?php else : ?>
            <p class="sm-no-products"><?php esc_html_e( 'No products found matching your selection.', 'my-blocks' ); ?></p>
        <?php endif; ?>
    </div>
</div>
