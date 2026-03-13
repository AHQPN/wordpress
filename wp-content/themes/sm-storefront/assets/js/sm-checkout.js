/**
 * SM Checkout Interactions
 */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    /* --- Coupon Accordion --- */
    const toggle = document.querySelector('.sm-checkout-coupon__toggle');
    const content = document.querySelector('.sm-checkout-coupon__content');

    if (toggle && content) {
        toggle.addEventListener('click', function () {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', !isExpanded);
            content.style.display = isExpanded ? 'none' : 'block';
            if (!isExpanded) {
                const input = content.querySelector('input');
                if (input) input.focus();
            }
        });
    }
});
