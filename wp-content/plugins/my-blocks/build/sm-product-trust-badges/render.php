<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-trust-badges' ) );
?>
<div <?php echo $wrapper_attributes; ?>>
    <div class="sm-tb-inner">
        <div class="sm-tb-item">
            <div class="sm-tb-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            </div>
            <div class="sm-tb-text">
                <strong>Free Shipping</strong>
                <span>Over 50đ</span>
            </div>
        </div>
        <div class="sm-tb-item">
            <div class="sm-tb-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path></svg>
            </div>
            <div class="sm-tb-text">
                <strong>30-Day</strong>
                <span>Returns</span>
            </div>
        </div>
        <div class="sm-tb-item">
            <div class="sm-tb-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
            </div>
            <div class="sm-tb-text">
                <strong>Secure</strong>
                <span>Checkout</span>
            </div>
        </div>
        <div class="sm-tb-item">
            <div class="sm-tb-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76z"></path><path d="m9 12 2 2 4-4"></path></svg>
            </div>
            <div class="sm-tb-text">
                <strong>Authentic</strong>
                <span>Quality</span>
            </div>
        </div>
    </div>
</div>
