<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

// Calculate total savings for the summary note
$total_savings = 0;
foreach ( WC()->cart->get_cart() as $cart_item ) {
    $_product = $cart_item['data'];
    if ( $_product->is_on_sale() ) {
        $regular_price = (float)$_product->get_regular_price();
        $sale_price = (float)$_product->get_price();
        $total_savings += ($regular_price - $sale_price) * $cart_item['quantity'];
    }
}
?>

<div class="cart_totals sm-cart-totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2 class="sm-cart-totals__title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/></svg>
        <?php esc_html_e( 'Tổng đơn hàng', 'sm-storefront' ); ?>
    </h2>

    <div class="sm-cart-totals__body">
        
        <!-- Coupon Section -->
        <?php if ( wc_coupons_enabled() ) : ?>
            <div class="sm-cart-coupon">
                <button type="button" class="sm-cart-coupon__toggle" aria-expanded="false">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 0 0-2 2v3a2 2 0 0 1 0 4v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3a2 2 0 0 1 0-4V7a2 2 0 0 0-2-2H5z"/></svg>
                    <span><?php esc_html_e( 'Mã giảm giá', 'sm-storefront' ); ?></span>
                    <svg class="chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="sm-cart-coupon__content" style="display:none;">
                    <form class="checkout_coupon woocommerce-form-coupon sm-coupon-form" method="post">
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Nhập mã giảm giá', 'sm-storefront' ); ?>" /> 
                        <button type="submit" class="button btn-apply-coupon" name="apply_coupon" value="<?php esc_attr_e( 'Áp dụng', 'sm-storefront' ); ?>"><?php esc_html_e( 'Áp dụng', 'sm-storefront' ); ?></button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <div class="sm-cart-totals__rows">
            <div class="sm-cart-totals__row cart-subtotal">
                <span class="label"><?php echo sprintf( __( 'Tạm tính (%d sản phẩm)', 'sm-storefront' ), WC()->cart->get_cart_contents_count() ); ?></span>
                <span class="value"><?php wc_cart_totals_subtotal_html(); ?></span>
            </div>

            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                <div class="sm-cart-totals__row cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?> is-discount">
                    <span class="label"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
                    <span class="value"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                </div>
            <?php endforeach; ?>

            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                <div class="sm-cart-totals__shipping">
                    <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
                    <?php wc_cart_totals_shipping_html(); ?>
                    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
                </div>
            <?php endif; ?>

            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                <div class="sm-cart-totals__row fee">
                    <span class="label"><?php echo esc_html( $fee->name ); ?></span>
                    <span class="value"><?php wc_cart_totals_fee_html( $fee ); ?></span>
                </div>
            <?php endforeach; ?>

            <?php
            if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
                $taxable_address = WC()->customer->get_taxable_address();
                if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
                    foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                        ?>
                        <div class="sm-cart-totals__row tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                            <span class="label"><?php echo esc_html( $tax->label ); ?></span>
                            <span class="value"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="sm-cart-totals__row tax-total">
                        <span class="label"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></span>
                        <span class="value"><?php wc_cart_totals_taxes_total_html(); ?></span>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <div class="sm-cart-totals__total-wrap">
            <div class="sm-cart-totals__total">
                <span class="label"><?php esc_html_e( 'Tổng cộng', 'sm-storefront' ); ?></span>
                <div class="value-wrap">
                    <span class="value"><?php wc_cart_totals_order_total_html(); ?></span>
                    <?php if ( $total_savings > 0 ) : ?>
                        <span class="savings-note"><?php echo sprintf( __( '(Đã giảm %s)', 'sm-storefront' ), wc_price( $total_savings ) ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="wc-proceed-to-checkout sm-cart-totals__checkout">
            <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
        </div>

        <div class="sm-cart-totals__trust">
            <div class="sm-trust-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span><?php esc_html_e( 'Thanh toán an toàn', 'sm-storefront' ); ?></span>
            </div>
            <div class="sm-trust-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polyline points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                <span><?php esc_html_e( 'Đa dạng thanh toán', 'sm-storefront' ); ?></span>
            </div>
        </div>
    </div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
