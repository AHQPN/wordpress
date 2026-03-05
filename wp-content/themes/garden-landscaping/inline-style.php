<?php

	$vw_gardening_landscaping_first_color = get_theme_mod('vw_gardening_landscaping_first_color');

	$garden_landscaping_custom_css = '';

	if($vw_gardening_landscaping_first_color != false){
		$garden_landscaping_custom_css .='#topbar, .more-btn a, .content-bttn a, .error-btn a, span.carousel-control-prev-icon i, span.carousel-control-next-icon i, .scrollup i,#sidebar input[type="submit"], input.button, #footer .tagcloud a:hover, #footer-2, .post-main-box:hover .content-bttn a, #sidebar .woocommerce-product-search button, .pagination .current, .pagination a:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, #footer a.custom_read_more:hover, #sidebar a.custom_read_more:hover, #footer input[type="submit"]:hover, .top-btn a, .top-btn a:hover, .main-header i.fas.fa-phone, .tab button:hover, button.tablinks.active, #services-sec h3:after, #services-sec h3:before, #serv-section h2:after, #serv-section h2:before, .serv-box:hover a, .box .box-content, #footer a.custom_read_more, #sidebar a.custom_read_more, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .bradcrumbs a:hover, .bradcrumbs span,.post-categories li a,.wp-block-tag-cloud a:hover,.pagination span, .pagination a, .post-nav-links span, .post-nav-links a,.wp-block-button__link, .wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button, a.wc-block-components-checkout-return-to-cart-button,.woocommerce ul.products li.product .button:hover{';
			$garden_landscaping_custom_css .='background-color: '.esc_attr($vw_gardening_landscaping_first_color).'!important;';
		$garden_landscaping_custom_css .='}';
	}
	if($vw_gardening_landscaping_first_color != false){
		$garden_landscaping_custom_css .='h1,.more-btn:hover a, .top-btn:hover a, .logo .site-title a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #sidebar ul li a:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, #footer li a:hover, .logo h1 a, .logo p.site-title a, .call-info, #sidebar h3,#sidebar caption,.wp-block-calendar a,#sidebar label.wp-block-search__label, #sidebar .wp-block-heading{';
			$garden_landscaping_custom_css .='color: '.esc_attr($vw_gardening_landscaping_first_color).'!important;';
		$garden_landscaping_custom_css .='}';
	}
	if($vw_gardening_landscaping_first_color != false){
		$garden_landscaping_custom_css .='.main-header span.call, .more-btn, .content-bttn, .error-btn, #footer h3:after, .post-main-box:hover, .post-main-box:hover .content-bttn, .main-navigation ul ul, .more-btn:hover, .top-btn:hover, .top-btn, .serv-box:hover, .serv-box:hover .expertise-btn, #footer .more-button, #sidebar .more-button, #footer .wp-block-search .wp-block-search__label:after,.wp-block-button{';
			$garden_landscaping_custom_css .='border-color: '.esc_attr($vw_gardening_landscaping_first_color).'!important;';
		$garden_landscaping_custom_css .='}';
	}
	if($vw_gardening_landscaping_first_color != false){
		$garden_landscaping_custom_css .='.menu-bg{';
			$garden_landscaping_custom_css .='background: rgba(0, 0, 0, 0) linear-gradient(120deg, #b8e0db 82%, '.esc_attr($vw_gardening_landscaping_first_color).' 12%) repeat scroll 0 0;';
		$garden_landscaping_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_gardening_landscaping_slider = get_theme_mod('vw_gardening_landscaping_slider_hide_show');
	if($vw_gardening_landscaping_slider == false){
		$garden_landscaping_custom_css .='.page-template-custom-home-page .main-header{';
			$garden_landscaping_custom_css .='background: transparent; border-bottom: none; position: static; margin: 0;';
		$garden_landscaping_custom_css .='}';
		$garden_landscaping_custom_css .='.page-template-custom-home-page .menu-bg{';
			$garden_landscaping_custom_css .='margin-bottom: 10px;';
		$garden_landscaping_custom_css .='}';
	}

	$garden_landscaping_menus_item = get_theme_mod( 'vw_gardening_landscaping_menus_item_style','None');
    if($garden_landscaping_menus_item == 'None'){
		$garden_landscaping_custom_css .='.main-navigation a{';
			$garden_landscaping_custom_css .='';
		$garden_landscaping_custom_css .='}';
	}else if($garden_landscaping_menus_item == 'Zoom In'){
		$garden_landscaping_custom_css .='.main-navigation a:hover{';
			$garden_landscaping_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color:#00917c !important;';
		$garden_landscaping_custom_css .='}';
	}

	$garden_landscaping_header_img_position = get_theme_mod('vw_gardening_landscaping_header_img_position','center top');
	if($garden_landscaping_header_img_position != false){
		$garden_landscaping_custom_css .='.home-page-header{';
			$garden_landscaping_custom_css .='background-position: '.esc_attr($garden_landscaping_header_img_position).'!important;';
		$garden_landscaping_custom_css .='}';
	}