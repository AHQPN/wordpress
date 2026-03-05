<?php
/* Add to Dashboard main menu */
function vw_gardening_landscaping_gettingstarted() {
    add_menu_page(
        esc_html__( 'VW Gardening Landscaping', 'vw-gardening-landscaping' ), // Page title
        esc_html__( 'VW Gardening Landscaping', 'vw-gardening-landscaping' ), // Menu title
        'manage_options',                            // Capability
        'vw_gardening_landscaping_guide',                        // Menu slug
        'vw_gardening_landscaping_mostrar_guide',                // Callback
        get_template_directory_uri() . '/inc/getstart/images/menu-icon.svg', // Image icon
        59                                           // Position
    );
}
add_action( 'admin_menu', 'vw_gardening_landscaping_gettingstarted' );

// Add a Custom CSS file to WP Admin Area
function vw_gardening_landscaping_admin_theme_style() {
   wp_enqueue_style('vw-gardening-landscaping-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-gardening-landscaping-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');

   // Admin notice code START
	wp_register_script('vw-gardening-landscaping-notice', esc_url(get_template_directory_uri()) . '/inc/getstart/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('vw-gardening-landscaping-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'vw_gardening_landscaping_admin_theme_style');

//guidline for about theme
function vw_gardening_landscaping_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$vw_gardening_landscaping_theme = wp_get_theme( 'vw-gardening-landscaping' );
?>

<div class="wrapper-info">
	<div class="tab-sec">
    	
    	<div class="tab">
    		<button class="tablinks" onclick="vw_gardening_landscaping_open_tab(event, 'theme_offer')"><?php esc_html_e( 'Demo Import', 'vw-gardening-landscaping' ); ?></button>
			<button class="tablinks" onclick="vw_gardening_landscaping_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-gardening-landscaping' ); ?></button>
			<button class="tablinks" onclick="vw_gardening_landscaping_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-gardening-landscaping' ); ?></button>
  			<button class="tablinks" onclick="vw_gardening_landscaping_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'vw-gardening-landscaping' ); ?></button>
  			<button class="tablinks" onclick="vw_gardening_landscaping_open_tab(event, 'get_bundle')"><?php esc_html_e( 'WP Theme Bundle', 'vw-gardening-landscaping' ); ?></button>
		</div>

		<?php 
			$vw_gardening_landscaping_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_gardening_landscaping_plugin_custom_css ='display: block';
			}
		?>

		<div id="theme_offer" class="tabcontent open">
			<div class="demo-content">
				<div class="demo-text">
					<?php 
					/* Get Started. */ 
					require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
				 	?>
				</div>
				
			 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" class="resp-img" />
			</div> 	
		</div>
		<div id="lite_theme" class="tabcontent">
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_gardening_landscaping_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'VW Gardening Landscaping', 'vw-gardening-landscaping' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('VW Gardening Landscaping is a refreshing, clean, reliable, robust, dynamic and feature-full gardening and landscaping WordPress theme for lawn services, sod cutting services, gardening and landscaping, lawn decorators, farm producers, garden designers, florists, naturopathy, organic medicinal herbs, Real Estate Agencies, Home Improvement Blogs, Community Gardens, landscape architects, environmentalist, grow and sell herbs, flowershop, Landscape Photography Portfolios, Landscaping Supply Stores, gardening, landscaping, earth, Gardening Blogs, Outdoor Design Studios, Environmental Organizations, Outdoor Recreation Businesses, Botanical Gardens, Greenhouse Nurseries, vegan food, plant, Backyard Nursery, Florist, Vegetable Farmer, forest department and forest guards, green tourism industry, Landscaping Companies, green farming, natural and ayurvedic products, greenery theme for Gardeners, Compost Sales, Fertilizer Sales, Small Poultry Farm, Fish Farmer, Beekeeper, Nurseries, conservationist, organic food, renewable energy provider, land scrappers,Landscape Maintenance Services, Outdoor Wedding Venues, agricultural products, agri based foods, Landscape Construction Companies, Petting Farm, Corn Maze, eco social group websites, organic farmers, ecologists, natural, earth website, plants shop, Nature lover, Nursury shop landscaper, hire gardener, eco natural, fresh, organic life projects, life safeguarding pledge drives, natural life ventures, foundation, fertilizer maker and supplier, gardening tools store, flowers, nature, eco friendly, green renewable energy, conservation and all such websites. This theme can also be customized for Landscape Product Reviews and Recommendations, Outdoor Cooking and BBQ Blogs, Outdoor Recreation Guides, Landscape Conservation Organizations, Outdoor Wedding Photography Studios. It has multiple website layouts like boxed, full-width and full screen; unlimited colour options and over 100+ Google fonts. This garden WordPress theme is fully responsive, cross-browser compatible, wide blocks, block editor styles, featured images, social media linked and SEO friendly. It is translation ready and supports RTL writing style. It is packed with an amazing range of advanced features and functionality along with some predesigned inner pages and a fully explained documentation. This theme has a super-efficient theme customizer that eases the burden of making changes to the website through theme customizer. It is made to work conveniently with third party plugins and integrated with WooCommerce to instantly set up an online store with beautiful product pages and secure payment gateways. It is compatible with the latest WordPress version and coded in clean environment. It is helpful for Groundskeepers, firewood, ecology, lumberjack, Agriculture, wildlife, Vacation Rentals with Outdoor Spaces, Big or Small gardener Business, green products business website, environmental project and plantation.','vw-gardening-landscaping'); ?></p>
				<div class="lite-info">
					<div class="col-left-inner">
				  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-gardening-landscaping' ); ?></h4>
						<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-gardening-landscaping' ); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-gardening-landscaping' ); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Theme Customizer', 'vw-gardening-landscaping'); ?></h4>
						<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-gardening-landscaping'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-gardening-landscaping'); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-gardening-landscaping'); ?></h4>
						<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-gardening-landscaping'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-gardening-landscaping'); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Reviews & Testimonials', 'vw-gardening-landscaping'); ?></h4>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-gardening-landscaping'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-gardening-landscaping'); ?></a>
						</div>

						<div class="link-customizer">
							<h4><?php esc_html_e( 'Link to customizer', 'vw-gardening-landscaping' ); ?></h4>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-gardening-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_top_bar') ); ?>" target="_blank"><?php esc_html_e('Header','vw-gardening-landscaping'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_slider_section') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-gardening-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_top_charts_section') ); ?>" target="_blank"><?php esc_html_e('Top Charts Section','vw-gardening-landscaping'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_right_sidebar_section') ); ?>" target="_blank"><?php esc_html_e('Right Sidebar Section','vw-gardening-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-gardening-landscaping'); ?></a>
									</div>
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-gardening-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-gardening-landscaping'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-gardening-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_gardening_landscaping_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-gardening-landscaping'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
					<div class="col-right-inner">
						<h4 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-gardening-landscaping'); ?></h4>
						<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-gardening-landscaping'); ?></p>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-gardening-landscaping'); ?></span><?php esc_html_e(' Go to ','vw-gardening-landscaping'); ?>
						  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-gardening-landscaping'); ?></b></p>
	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-gardening-landscaping'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-gardening-landscaping'); ?></span><?php esc_html_e(' Go to ','vw-gardening-landscaping'); ?>
						  	<b><?php esc_html_e(' Settings >> Reading ','vw-gardening-landscaping'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-gardening-landscaping'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-gardening-landscaping'); ?> <a class="doc-links" href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-gardening-landscaping'); ?></a></p>
				  	</div>

				</div>
			  	
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">		  	
			<div class="pro-info">
				<div class="col-left-pro">
					<h3><?php esc_html_e( 'Premium Theme Information', 'vw-gardening-landscaping' ); ?></h3>
					<hr class="h3hr">
			    	<p><?php esc_html_e('This landscaping WordPress theme brings many incredible features under one roof to help you design a performance focused website with unique design and visually stunning look. The thoughtful placement of objects throughout the theme leads to a beautiful design which catches user attention at the very first glance. It is an intuitive theme with the use of refreshing colours and apt typography making it more impactful. This landscaping WordPress theme requires minimum efforts to set it up and hence is equally easy for experienced coder and WordPress newbie to explore it to its maximum potential to craft a highly efficient gardening and landscaping website. Whether you run the biggest nursery shop in your city or famous for offering gardening services throughout the country, this landscaping WP theme will perfectly represent your brand aiding you in handling your website smoothly without ever raising the need to take help from outside.','vw-gardening-landscaping'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'vw-gardening-landscaping'); ?></a>
						<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'vw-gardening-landscaping'); ?></a>
						<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'vw-gardening-landscaping'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/pro-theme.jpg" alt="" class="pro-img" />		    	
			    </div>
			</div>		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-gardening-landscaping' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th> <?php esc_html_e('Features', 'vw-gardening-landscaping'); ?></th>
								<th><?php esc_html_e('Free Themes', 'vw-gardening-landscaping'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-gardening-landscaping'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Banner Settings', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'vw-gardening-landscaping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-gardening-landscaping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-gardening-landscaping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template / Support Templates', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-gardening-landscaping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-gardening-landscaping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Left/Right Sidebar)', 'vw-gardening-landscaping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Video Gallery', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('VW Gardening Landscaping ', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Detail Services', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('About Business Page', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Team Member Page', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Project Description Page', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support Page', 'vw-gardening-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-gardening-landscaping'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">	
			<div class="bundle-info">
				<div class="col-left-pro">
			   		<h3><?php esc_html_e( 'WP Theme Bundle', 'vw-gardening-landscaping' ); ?></h3>
			   		<hr class="h3hr">
			    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 400+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','vw-gardening-landscaping'); ?></p>
			    	<div class="feature">
			    		<h4><?php esc_html_e( 'Features:', 'vw-gardening-landscaping' ); ?></h4>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('400+ Premium Themes & 5+ Plugins.', 'vw-gardening-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Seamless Integration.', 'vw-gardening-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Customization Flexibility.', 'vw-gardening-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Regular Updates.', 'vw-gardening-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Dedicated Support.', 'vw-gardening-landscaping'); ?></p>
			    	</div>
			    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'vw-gardening-landscaping'); ?></p>
			    	<div class="pro-links">
						<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank" class="bundle-buy"><?php esc_html_e('Get Bundle', 'vw-gardening-landscaping'); ?></a>
						<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_THEME_BUNDLE_DOC ); ?>" target="_blank" class="bundle-doc"><?php esc_html_e('Documentation', 'vw-gardening-landscaping'); ?></a>
					</div>
			   	</div>
			   	<div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.jpg" alt="" />
			   	</div>
			</div>	  	
		   			    
		</div>
	</div>
	<div class="coupen-code-section">
		<div class="sshot-section">
			<div class="sshot-inner">
				<h2><?php esc_html_e( 'Welcome To VW Gardening Landscaping,', 'vw-gardening-landscaping' ); ?> </h2>
				<div class="on-pro">
					<span class="version"><?php esc_html_e( 'Version', 'vw-gardening-landscaping' ); ?>: <?php echo esc_html($vw_gardening_landscaping_theme['Version']);?></span>
					<span class="coupon-code"><?php esc_html_e('Get 20% Of On Pro Theme-Use Code: ','vw-gardening-landscaping'); ?><span class="code-highlight"><?php esc_html_e('VWPRO20','vw-gardening-landscaping'); ?></span>
				</div>
		    	<p><?php esc_html_e('All Our Wordpress Themes Are Modern, Minimalist, 100% Responsive, Seo-Friendly,Feature-Rich, And Multipurpose That Best Suit Designers, Bloggers And Other Professionals Who Are Working In The Creative Fields.','vw-gardening-landscaping'); ?></p>
		    	<div class="btn-section">
			    	<div class="proo-links">
				    	<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'vw-gardening-landscaping'); ?></a>
						<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'vw-gardening-landscaping'); ?></a>
						<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'vw-gardening-landscaping'); ?></a>						
					</div>
			    </div>
			</div>
	    	<div class="bundle-banner">
	    		<div class="bundle-img">
	    			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle-notice.png" alt="" />
	    		</div>
	    		<div class="bundle-text">
		  			<h2><?php esc_html_e('WP THEME BUNDLE','vw-gardening-landscaping'); ?></h2>
					<h4><?php esc_html_e('Get Access to 400+ Premium WordPress Themes At Just $99','vw-gardening-landscaping'); ?></h4>
					<div class="bundle-button">
			  			<a href="<?php echo esc_url( 'https://www.vwthemes.com/discount/FREEBREF?redirect=/products/wp-theme-bundle'); ?>" target="_blank"><?php esc_html_e('Get 10% OFF On Bundle', 'vw-gardening-landscaping'); ?></a>
			  		</div>
		  		</div>
		  		
	    	</div>
	    </div>
	    <div class="coupen-section">
	    	<div class="logo-section">
			  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		  	</div>
		  	<div class="logo-right">	
		  		<div class="logo-text">
		  			<h2><?php esc_html_e('GET PRO','vw-gardening-landscaping'); ?></h2>
					<h4><?php esc_html_e('20% Off','vw-gardening-landscaping'); ?></h4>
		  		</div>						
			</div>
	    </div>
	</div>
      
</div>
<?php } ?>