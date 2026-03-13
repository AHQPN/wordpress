<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
?>

<div class="sm-cart-empty">
    <div class="sm-cart-empty__icon">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/></svg>
    </div>
    <h2 class="sm-cart-empty__title"><?php esc_html_e( 'Giỏ hàng của bạn đang trống', 'sm-storefront' ); ?></h2>
    <p class="sm-cart-empty__text"><?php esc_html_e( 'Có vẻ như bạn chưa thêm sản phẩm nào vào giỏ hàng.', 'sm-storefront' ); ?></p>
    
    <?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
        <p class="return-to-shop">
            <a class="button wc-backward sm-btn-primary" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                <?php echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Tiếp tục mua sắm', 'sm-storefront' ) ) ); ?>
            </a>
        </p>
    <?php endif; ?>
</div>
