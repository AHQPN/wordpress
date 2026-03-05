<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="container header-inner"
				style="display:flex; justify-content:space-between; align-items:center;">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
							style="text-decoration:none; color:#000; font-weight:800; font-size:24px; text-transform:uppercase;">Bagberry</a>
					</h1>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary-menu',
						'menu_id' => 'primary-menu',
						'fallback_cb' => false,
						'container' => false,
						'items_wrap' => '<ul id="%1$s" class="%2$s" style="display:flex; gap:30px; list-style:none; margin:0; padding:0;">%3$s</ul>'
					));
					?>
				</nav><!-- #site-navigation -->

				<div class="header-actions" style="display:flex; gap:15px; font-size:14px; align-items:center;">
					<div class="header-search">
						<a href="#" style="color:#000;">Search</a>
					</div>
					<div class="header-account">
						<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
							style="color:#000;">Account</a>
					</div>
					<div class="header-cart">
						<a href="<?php echo wc_get_cart_url(); ?>" style="color:#000;">Cart
							(<?php echo WC()->cart->get_cart_contents_count(); ?>)</a>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->