<?php
/**
 * Review order table — custom override for sm-storefront.
 *
 * Overrides: woocommerce/templates/checkout/review-order.php
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

$cart = WC()->cart;
$cart_items = $cart->get_cart();
$total_savings = 0;

foreach ( $cart_items as $cart_item ) {
    $_product = $cart_item['data'];
    if ( $_product->is_on_sale() ) {
        $total_savings += ( (float) $_product->get_regular_price() - (float) $_product->get_price() ) * $cart_item['quantity'];
    }
}
?>
<div class="sm-checkout-summary">

    <h2 class="sm-checkout-summary__title">
        <?php esc_html_e( 'Đơn hàng của bạn', 'sm-storefront' ); ?>
    </h2>

    <!-- Product list -->
    <div class="sm-checkout-summary__items">
        <?php foreach ( $cart_items as $cart_item_key => $cart_item ) :
            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 ) continue;

            $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
            $thumbnail_src = wp_get_attachment_image_src( $_product->get_image_id(), 'thumbnail' );
            $thumbnail_url = $thumbnail_src ? $thumbnail_src[0] : wc_placeholder_img_src( 'thumbnail' );
            $qty = $cart_item['quantity'];
            $subtotal = WC()->cart->get_product_subtotal( $_product, $qty );
            $is_on_sale = $_product->is_on_sale();
            $saving_this = $is_on_sale ? ( (float) $_product->get_regular_price() - (float) $_product->get_price() ) * $qty : 0;
        ?>
        <div class="sm-checkout-summary__item">
            <div class="sm-checkout-summary__thumb-wrap">
                <?php if ( $product_permalink ) : ?>
                    <a href="<?php echo esc_url( $product_permalink ); ?>">
                        <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( $_product->get_name() ); ?>">
                    </a>
                <?php else : ?>
                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( $_product->get_name() ); ?>">
                <?php endif; ?>
                <span class="sm-checkout-summary__qty"><?php echo esc_html( $qty ); ?></span>
            </div>

            <div class="sm-checkout-summary__item-details">
                <span class="sm-checkout-summary__item-name">
                    <?php echo $product_permalink ? sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), esc_html( $_product->get_name() ) ) : esc_html( $_product->get_name() ); ?>
                </span>

                <?php
                $variation_data = wc_get_formatted_cart_item_data( $cart_item, true );
                if ( $variation_data ) : ?>
                    <span class="sm-checkout-summary__item-meta"><?php echo wp_kses_post( $variation_data ); ?></span>
                <?php endif; ?>

                <?php if ( $saving_this > 0 ) : ?>
                    <span class="sm-savings-badge"><?php echo esc_html__( 'Tiết kiệm', 'sm-storefront' ) . ' ' . wc_price( $saving_this ); ?></span>
                <?php endif; ?>
            </div>

            <div class="sm-checkout-summary__item-price">
                <?php echo wp_kses_post( $subtotal ); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div><!-- /.sm-checkout-summary__items -->

    <!-- Coupon -->
    <div class="sm-checkout-coupon">
        <button type="button" class="sm-checkout-coupon__toggle" aria-expanded="false">
            <?php esc_html_e( 'Mã giảm giá', 'sm-storefront' ); ?>
            <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="sm-checkout-coupon__content" style="display:none">
            <?php do_action( 'woocommerce_checkout_coupon_form' ); ?>
        </div>
    </div>

    <!-- Totals -->
    <div class="sm-checkout-summary__totals">

        <div class="sm-checkout-summary__row">
            <span class="label"><?php esc_html_e( 'Tạm tính', 'sm-storefront' ); ?> (<?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?> <?php esc_html_e( 'sản phẩm', 'sm-storefront' ); ?>)</span>
            <span class="value"><?php wc_cart_totals_subtotal_html(); ?></span>
        </div>

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
        <div class="sm-checkout-summary__row is-discount">
            <span class="label"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
            <span class="value"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
        </div>
        <?php endforeach; ?>

        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
        <div class="sm-checkout-summary__row">
            <?php wc_cart_totals_shipping_html(); ?>
        </div>
        <?php endif; ?>

        <?php if ( $total_savings > 0 ) : ?>
        <div class="sm-checkout-summary__savings-note">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 12V22H4V12"/><path d="M22 7H2v5h20V7z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
            <?php printf( esc_html__( 'Bạn đang tiết kiệm %s', 'sm-storefront' ), wc_price( $total_savings ) ); ?>
        </div>
        <?php endif; ?>

        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <div class="sm-checkout-summary__total-wrap">
            <div class="sm-checkout-summary__total-row">
                <span class="label"><?php esc_html_e( 'Tổng cộng', 'sm-storefront' ); ?></span>
                <span class="value"><?php wc_cart_totals_order_total_html(); ?></span>
            </div>
        </div>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

    </div><!-- /.sm-checkout-summary__totals -->

</div><!-- /.sm-checkout-summary -->
