/**
 * Main Theme JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize Hero Slider with Swiper.js
    var heroSwiperElement = document.querySelector('.myHeroSwiper');
    
    if ( heroSwiperElement ) {
        var heroSwiper = new Swiper('.myHeroSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade', // Fade effect gives a premium premium feel like Bagberry
            fadeEffect: {
                crossFade: true
            }
        });
    }

});
