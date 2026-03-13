<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="sm-cart">
    <div class="sm-cart__content">
        <header class="sm-cart__header">
            <h1 class="sm-cart__title"><?php esc_html_e( 'Giỏ hàng', 'sm-storefront' ); ?></h1>
            <span class="sm-cart__count"><?php echo sprintf( _n( '%d sản phẩm trong giỏ hàng của bạn', '%d sản phẩm trong giỏ hàng của bạn', WC()->cart->get_cart_contents_count(), 'sm-storefront' ), WC()->cart->get_cart_contents_count() ); ?></span>
            <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="sm-cart__return">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                <?php esc_html_e( 'Tiếp tục mua sắm', 'sm-storefront' ); ?>
            </a>
        </header>

        <form class="woocommerce-cart-form sm-cart__form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>

            <div class="sm-cart__table-header">
                <div class="sm-cart__col-product"><?php esc_html_e( 'SẢN PHẨM', 'woocommerce' ); ?></div>
                <div class="sm-cart__col-quantity"><?php esc_html_e( 'SỐ LƯỢNG', 'woocommerce' ); ?></div>
                <div class="sm-cart__col-price"><?php esc_html_e( 'ĐƠN GIÁ', 'woocommerce' ); ?></div>
                <div class="sm-cart__col-subtotal"><?php esc_html_e( 'THÀNH TIỀN', 'woocommerce' ); ?></div>
            </div>

            <div class="sm-cart__items">
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <div class="sm-cart__item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                            
                            <!-- Product Column -->
                            <div class="sm-cart__product">
                                <div class="sm-cart__thumbnail">
                                    <?php
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                    if ( ! $product_permalink ) {
                                        echo $thumbnail;
                                    } else {
                                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                    }
                                    ?>
                                </div>
                                <div class="sm-cart__details">
                                    <h3 class="sm-cart__item-title">
                                        <?php
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }
                                        ?>
                                    </h3>
                                    <?php
                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
                                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
                                    ?>
                                    <div class="sm-cart__remove">
                                        <?php
                                            echo apply_filters(
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="remove-link" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> %s</a>',
                                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                    esc_attr__( 'Remove this item', 'woocommerce' ),
                                                    esc_attr( $product_id ),
                                                    esc_attr( $_product->get_sku() ),
                                                    esc_html__( 'Xóa', 'sm-storefront' )
                                                ),
                                                $cart_item_key
                                            );
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Quantity Column -->
                            <div class="sm-cart__quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                <div class="sm-qty-stepper">
                                    <button type="button" class="sm-qty-btn sm-qty-btn--minus">−</button>
                                    <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input(
                                            array(
                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                'input_value'  => $cart_item['quantity'],
                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                'min_value'    => '0',
                                                'product_name' => $_product->get_name(),
                                            ),
                                            $_product,
                                            false
                                        );
                                    }
                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                    ?>
                                    <button type="button" class="sm-qty-btn sm-qty-btn--plus">+</button>
                                </div>
                            </div>

                            <!-- Price Column -->
                            <div class="sm-cart__price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                <?php
                                    $price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                    echo $price;

                                    // Discount Badge if on sale
                                    if ( $_product->is_on_sale() ) {
                                        $regular_price = (float)$_product->get_regular_price();
                                        $sale_price = (float)$_product->get_price();
                                        $saving = $regular_price - $sale_price;
                                        if ( $saving > 0 ) {
                                            echo '<span class="sm-savings-badge">' . esc_html__( 'Tiết kiệm', 'sm-storefront' ) . ' ' . wc_price( $saving ) . '</span>';
                                        }
                                    }
                                ?>
                            </div>

                            <!-- Subtotal Column -->
                            <div class="sm-cart__subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <?php do_action( 'woocommerce_cart_contents' ); ?>

                <div class="sm-cart__actions">
                    <button type="submit" class="button sm-btn-update" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Cập nhật giỏ hàng', 'sm-storefront' ); ?></button>
                    <?php do_action( 'woocommerce_cart_actions' ); ?>
                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </div>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </div>
            <?php do_action( 'woocommerce_after_cart_table' ); ?>
        </form>

        <!-- Savings Bar -->
        <?php
        $total_savings = 0;
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            $_product = $cart_item['data'];
            if ( $_product->is_on_sale() ) {
                $regular_price = (float)$_product->get_regular_price();
                $sale_price = (float)$_product->get_price();
                $total_savings += ($regular_price - $sale_price) * $cart_item['quantity'];
            }
        }
        if ( $total_savings > 0 ) : ?>
            <div class="sm-cart__savings-bar">
                <div class="sm-savings-bar__icon">🎁</div>
                <div class="sm-savings-bar__text">
                    <strong><?php echo sprintf( __( 'Bạn đã tiết kiệm được %s!', 'sm-storefront' ), wc_price( $total_savings ) ); ?></strong>
                    <span><?php esc_html_e( 'So với giá gốc của sản phẩm', 'sm-storefront' ); ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <div class="sm-cart__sidebar">
        <?php
        /**
         * Cart collaterals hook.
         *
         * @hooked woocommerce_cross_sell_display
         * @hooked woocommerce_cart_totals - 10
         */
        do_action( 'woocommerce_cart_collaterals' );
        ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
