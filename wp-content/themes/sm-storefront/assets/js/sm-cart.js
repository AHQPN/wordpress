/**
 * SM Cart Page Interactions
 */
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    /* --- Coupon Accordion --- */
    const couponToggle = document.querySelector('.sm-cart-coupon__toggle');
    const couponContent = document.querySelector('.sm-cart-coupon__content');

    if (couponToggle && couponContent) {
        couponToggle.addEventListener('click', function() {
            const isExpanded = couponToggle.getAttribute('aria-expanded') === 'true';
            couponToggle.setAttribute('aria-expanded', !isExpanded);
            
            if (isExpanded) {
                couponContent.style.display = 'none';
            } else {
                couponContent.style.display = 'block';
                const input = couponContent.querySelector('input');
                if (input) input.focus();
            }
        });
    }

    /* --- Quantity Stepper --- */
    const cartWrapper = document.querySelector('.sm-cart');
    if (!cartWrapper) return;

    // Delegate clicks to +/- buttons
    cartWrapper.addEventListener('click', function(e) {
        const btn = e.target.closest('.sm-qty-btn');
        if (!btn) return;

        const stepper = btn.closest('.sm-qty-stepper');
        const input = stepper.querySelector('input[type="number"]');
        if (!input) return;

        let val = parseInt(input.value) || 0;
        const min = parseInt(input.getAttribute('min')) || 0;
        const max = parseInt(input.getAttribute('max')) || 9999;

        if (btn.classList.contains('sm-qty-btn--plus')) {
            if (val < max) input.value = val + 1;
        } else if (btn.classList.contains('sm-qty-btn--minus')) {
            if (val > min) input.value = val - 1;
        }

        // Trigger change to enable "Update Cart" button
        input.dispatchEvent(new Event('change', { bubbles: true }));
        
        // Auto-update cart if needed (optional, or just highlight the update button)
        // For standard WooCommerce, we enable the update button. 
        // We can also trigger form submission after a small delay.
        const updateBtn = document.querySelector('button[name="update_cart"]');
        if (updateBtn) {
            updateBtn.disabled = false;
        }
    });

    /* --- Remove Item Confirmation --- */
    function initRemoveConfirm() {
        const removeLinks = document.querySelectorAll('.remove-link');
        removeLinks.forEach(link => {
            if (link.dataset.confirmBound) return;
            link.addEventListener('click', function(e) {
                console.log('Remove link clicked');
                if (!confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                    e.preventDefault();
                }
            });
            link.dataset.confirmBound = 'true';
        });
    }
    
    initRemoveConfirm();
    
    // Re-init after fragments update
    jQuery(document.body).on('updated_wc_div', function() {
        initRemoveConfirm();
    });

    // Update body class for specific styling if needed
    document.body.classList.add('sm-custom-cart-active');
});
