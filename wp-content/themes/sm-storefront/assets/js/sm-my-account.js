/**
 * SM My Account Interactions
 */
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Highlight active menu item based on current URL if necessary
    // (Though WooCommerce usually handles the 'is-active' class)
    
    // Add some smooth scrolling or subtle animations if needed
    const cards = document.querySelectorAll('.sm-dashboard-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.6s cubic-bezier(0.2, 0, 0, 1)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100 + 200);
    });
});
