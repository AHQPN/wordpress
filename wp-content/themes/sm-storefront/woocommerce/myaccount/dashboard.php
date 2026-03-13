<?php
/**
 * My Account dashboard - Custom override
 *
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_user = wp_get_current_user();
?>

<div class="sm-account-dashboard">
    <div class="sm-account-dashboard__welcome">
        <h2 class="sm-account-dashboard__title">
            <?php
            printf(
                /* translators: 1: user display name 2: logout url */
                wp_kses( __( 'Hello %1$s', 'woocommerce' ), array( 'strong' => array() ) ),
                '<strong>' . esc_html( $current_user->display_name ) . '</strong>'
            );
            ?>
        </h2>
        <p class="sm-account-dashboard__text">
            <?php
            printf(
                /* translators: 1: orders url 2: addresses url 3: account details url */
                wp_kses( __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ), array( 'a' => array( 'href' => array() ) ) ),
                esc_url( wc_get_endpoint_url( 'orders' ) ),
                esc_url( wc_get_endpoint_url( 'edit-address' ) ),
                esc_url( wc_get_endpoint_url( 'edit-account' ) )
            );
            ?>
        </p>
    </div>

    <div class="sm-account-dashboard__cards">
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="sm-dashboard-card">
            <div class="sm-dashboard-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            </div>
            <div class="sm-dashboard-card__content">
                <h3 class="sm-dashboard-card__title"><?php esc_html_e( 'Đơn hàng', 'sm-storefront' ); ?></h3>
                <p class="sm-dashboard-card__desc"><?php esc_html_e( 'Xem lịch sử và trạng thái đơn hàng', 'sm-storefront' ); ?></p>
            </div>
        </a>

        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="sm-dashboard-card">
            <div class="sm-dashboard-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div class="sm-dashboard-card__content">
                <h3 class="sm-dashboard-card__title"><?php esc_html_e( 'Địa chỉ', 'sm-storefront' ); ?></h3>
                <p class="sm-dashboard-card__desc"><?php esc_html_e( 'Quản lý địa chỉ nhận hàng và thanh toán', 'sm-storefront' ); ?></p>
            </div>
        </a>

        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>" class="sm-dashboard-card">
            <div class="sm-dashboard-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div class="sm-dashboard-card__content">
                <h3 class="sm-dashboard-card__title"><?php esc_html_e( 'Tài khoản', 'sm-storefront' ); ?></h3>
                <p class="sm-dashboard-card__desc"><?php esc_html_e( 'Cập nhật thông tin cá nhân và mật khẩu', 'sm-storefront' ); ?></p>
            </div>
        </a>
    </div>

    <?php
    /**
     * My Account dashboard.
     *
     * @since 2.6.0
     */
    do_action( 'woocommerce_account_dashboard' );

    /**
     * Deprecated woocommerce_before_my_account action.
     *
     * @deprecated 2.6.0
     */
    do_action( 'woocommerce_before_my_account' );

    /**
     * Deprecated woocommerce_after_my_account action.
     *
     * @deprecated 2.6.0
     */
    do_action( 'woocommerce_after_my_account' );
    ?>
</div>
