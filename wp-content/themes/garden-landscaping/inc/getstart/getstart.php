<?php
add_action( 'admin_menu', 'garden_landscaping_gettingstarted' );

function garden_landscaping_gettingstarted() {

    add_menu_page(
        esc_html__( 'Garden Landscaping', 'garden-landscaping' ), // Page title
        esc_html__( 'Garden Landscaping', 'garden-landscaping' ), // Menu title
        'manage_options',                                            // Capability
        'garden_landscaping_guide',                                // Menu slug
        'garden_landscaping_mostrar_guide',                        // Callback
        get_stylesheet_directory_uri() . '/inc/getstart/images/menu-icon.svg', // Icon
        59                                                           // Position
    );
}

// Add a Custom CSS file to WP Admin Area
function garden_landscaping_admin_theme_style() {
   wp_enqueue_style('garden-landscaping-custom-admin-style', get_theme_file_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('garden-landscaping-tabs', get_theme_file_uri() . '/inc/getstart/js/tab.js');

   // Admin notice code START
	wp_register_script('garden-landscaping-notice', esc_url(get_template_directory_uri()) . '/inc/getstart/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('garden-landscaping-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'garden_landscaping_admin_theme_style');

//guidline for about theme
function garden_landscaping_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$garden_landscaping_theme = wp_get_theme( 'garden-landscaping' );
?>

<div class="wrapper-info">
	<div class="tab-sec">
    	
    	<div class="tab">
    		<button class="tablinks" onclick="garden_landscaping_open_tab(event, 'theme_offer')"><?php esc_html_e( 'Demo Import', 'garden-landscaping' ); ?></button>
			<button class="tablinks" onclick="garden_landscaping_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'garden-landscaping' ); ?></button>
			<button class="tablinks" onclick="garden_landscaping_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'garden-landscaping' ); ?></button>
  			<button class="tablinks" onclick="garden_landscaping_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'garden-landscaping' ); ?></button>
  			<button class="tablinks" onclick="garden_landscaping_open_tab(event, 'get_bundle')"><?php esc_html_e( 'WP Theme Bundle', 'garden-landscaping' ); ?></button>
		</div>

		<?php 
			$garden_landscaping_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$garden_landscaping_plugin_custom_css ='display: block';
			}
		?>

		<div id="theme_offer" class="tabcontent open">
			<div class="demo-content">
				<div class="demo-text">
					<?php 
					/* Get Started. */ 
					require get_theme_file_path( '/inc/getstart/demo-content.php' );
				 	?>
				</div>
				
			 	<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" class="resp-img" />
			</div> 	
		</div>
		<div id="lite_theme" class="tabcontent">
			<div class="lite-theme-tab" style="<?php echo esc_attr($garden_landscaping_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Garden Landscaping', 'garden-landscaping' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('The Garden Landscaping WordPress Theme is a simple, clean and elegant WordPress theme that’s perfect for nutritionists and dietitians that want to share their knowledge with the world. The theme also works great for any other type of health-related business such as gyms, wellness programs, or personal trainers, coaching, fitness, health, dietitian, lifestyle, meal planning, weight loss, holistic, dietary, self-care, well-being, counseling. While there are many different types of coaches. Garden Landscaping is a professional who specializes in nutrition and weight loss. They work with their clients to create individualized plans that help them reach their goals. There are many benefits to hiring a Garden Landscaping. They can help you lose weight, improve your eating habits, and make other lifestyle changes that can improve your health. If you’re looking for someone to help you make lasting changes. In addition to helping you lose weight, working with a nutritionist can also improve your overall health. Nutritionists can help you make sure you’re getting the nutrients your body needs, which can help reduce your risk of developing chronic diseases. Working one-on-one with a nutritionist coach when you work with a Garden Landscaping, you’ll have the opportunity to work one-on-one with a professional who is dedicated to helping you reach your goals. Your Garden Landscaping will create an individualized plan that takes into account your unique goals, preferences, and lifestyle. This type of personalized attention is one of the major advantages of working with a Garden Landscaping.','garden-landscaping'); ?></p>
				<div class="lite-info">
					<div class="col-left-inner">
				  		<h4><?php esc_html_e( 'Theme Documentation', 'garden-landscaping' ); ?></h4>
						<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'garden-landscaping' ); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( GARDEN_LANDSCAPING_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'garden-landscaping' ); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Theme Customizer', 'garden-landscaping'); ?></h4>
						<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'garden-landscaping'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'garden-landscaping'); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Having Trouble, Need Support?', 'garden-landscaping'); ?></h4>
						<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'garden-landscaping'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( GARDEN_LANDSCAPING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'garden-landscaping'); ?></a>
						</div>
						<hr>
						<h4><?php esc_html_e('Reviews & Testimonials', 'garden-landscaping'); ?></h4>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'garden-landscaping'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( GARDEN_LANDSCAPING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'garden-landscaping'); ?></a>
						</div>

						<div class="link-customizer">
							<h4><?php esc_html_e( 'Link to customizer', 'garden-landscaping' ); ?></h4>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','garden-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_top_bar') ); ?>" target="_blank"><?php esc_html_e('Header','garden-landscaping'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_slider_section') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','garden-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_top_charts_section') ); ?>" target="_blank"><?php esc_html_e('Top Charts Section','garden-landscaping'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_right_sidebar_section') ); ?>" target="_blank"><?php esc_html_e('Right Sidebar Section','garden-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','garden-landscaping'); ?></a>
									</div>
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','garden-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','garden-landscaping'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','garden-landscaping'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=garden_landscaping_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','garden-landscaping'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
					<div class="col-right-inner">
						<h4 class="page-template"><?php esc_html_e('How to set up Home Page Template','garden-landscaping'); ?></h4>
						<p><?php esc_html_e('Follow these instructions to setup Home page.','garden-landscaping'); ?></p>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','garden-landscaping'); ?></span><?php esc_html_e(' Go to ','garden-landscaping'); ?>
						  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','garden-landscaping'); ?></b></p>
	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','garden-landscaping'); ?></p>
	                  	<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','garden-landscaping'); ?></span><?php esc_html_e(' Go to ','garden-landscaping'); ?>
						  	<b><?php esc_html_e(' Settings >> Reading ','garden-landscaping'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','garden-landscaping'); ?></p>
	                  	<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','garden-landscaping'); ?> <a class="doc-links" href="<?php echo esc_url( GARDEN_LANDSCAPING_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','garden-landscaping'); ?></a></p>
				  	</div>

				</div>
			  	
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">		  	
			<div class="pro-info">
				<div class="col-left-pro">
					<h3><?php esc_html_e( 'Premium Theme Information', 'garden-landscaping' ); ?></h3>
					<hr class="h3hr">
			    	<p><?php esc_html_e('If you are looking for the best theme for your Nutritionist Coach Blog, then you should consider our Garden Landscaping WordPress Theme. It has a modern design that looks very appealing to the eye and its easy to use. We have included several different layouts so that you can choose what works best for your site. This theme is a responsive WordPress theme that is designed for health and fitness coaches, nutritionists, dieticians, and personal trainers. The theme is based on the powerful support framework which makes it highly functional and easy to operate. Using a powerful set of shortcodes and widgets you can showcase your skills and achievements, missions and priorities, provide testimonials, and showcase your portfolio. Translation options allow translating the theme into any language easily. You will love this theme if you are looking for a clean and minimal design with a responsive layout, easy to use and customize.','garden-landscaping'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( GARDEN_LANDSCAPING_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'garden-landscaping'); ?></a>
						<a href="<?php echo esc_url( GARDEN_LANDSCAPING_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'garden-landscaping'); ?></a>
						<a href="<?php echo esc_url( GARDEN_LANDSCAPING_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'garden-landscaping'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/pro-theme.jpg" alt="" class="pro-img" />		    	
			    </div>
			</div>		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'garden-landscaping' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th><?php esc_html_e('Features', 'garden-landscaping'); ?></th>
								<th><?php esc_html_e('Free Themes', 'garden-landscaping'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'garden-landscaping'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Banner Settings', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'garden-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'garden-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'garden-landscaping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'garden-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'garden-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'garden-landscaping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'garden-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'garden-landscaping'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'garden-landscaping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template / Support Templates', 'garden-landscaping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'garden-landscaping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'garden-landscaping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'garden-landscaping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'garden-landscaping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Left/Right Sidebar)', 'garden-landscaping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Video Gallery', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Garden Landscaping ', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Detail Services', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('About Business Page', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Team Member Page', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Project Description Page', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support Page', 'garden-landscaping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url(  GARDEN_LANDSCAPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'garden-landscaping'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">	
			<div class="bundle-info">
				<div class="col-left-pro">
			   		<h3><?php esc_html_e( 'WP Theme Bundle', 'garden-landscaping' ); ?></h3>
			   		<hr class="h3hr">
			    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 400+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','garden-landscaping'); ?></p>
			    	<div class="feature">
			    		<h4><?php esc_html_e( 'Features:', 'garden-landscaping' ); ?></h4>
			    		<p><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('400+ Premium Themes & 5+ Plugins.', 'garden-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Seamless Integration.', 'garden-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Customization Flexibility.', 'garden-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Regular Updates.', 'garden-landscaping'); ?></p>
			    		<p><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/tick.png" alt="" /><?php esc_html_e('Dedicated Support.', 'garden-landscaping'); ?></p>
			    	</div>
			    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'garden-landscaping'); ?></p>
			    	<div class="pro-links">
						<a href="<?php echo esc_url( GARDEN_LANDSCAPING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank" class="bundle-buy"><?php esc_html_e('Get Bundle', 'garden-landscaping'); ?></a>
						<a href="<?php echo esc_url( GARDEN_LANDSCAPING_THEME_BUNDLE_DOC ); ?>" target="_blank" class="bundle-doc"><?php esc_html_e('Documentation', 'garden-landscaping'); ?></a>
					</div>
			   	</div>
			   	<div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/bundle.jpg" alt="" />
			   	</div>
			</div>	  	
		   			    
		</div>
	</div>
	<div class="coupen-code-section">
		<div class="sshot-section">
			<div class="sshot-inner">
				<h2><?php esc_html_e( 'Welcome To Garden Landscaping,', 'garden-landscaping' ); ?> </h2>
				<div class="on-pro">
					<span class="version"><?php esc_html_e( 'Version', 'garden-landscaping' ); ?>: <?php echo esc_html($garden_landscaping_theme['Version']);?></span>
					<span class="coupon-code"><?php esc_html_e('Get 20% Of On Pro Theme-Use Code: ','garden-landscaping'); ?><span class="code-highlight"><?php esc_html_e('VWPRO20','garden-landscaping'); ?></span>
				</div>
		    	<p><?php esc_html_e('All Our Wordpress Themes Are Modern, Minimalist, 100% Responsive, Seo-Friendly,Feature-Rich, And Multipurpose That Best Suit Designers, Bloggers And Other Professionals Who Are Working In The Creative Fields.','garden-landscaping'); ?></p>
		    	<div class="btn-section">
			    	<div class="proo-links">
				    	<a href="<?php echo esc_url(GARDEN_LANDSCAPING_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'garden-landscaping'); ?></a>
						<a href="<?php echo esc_url(GARDEN_LANDSCAPING_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'garden-landscaping'); ?></a>
						<a href="<?php echo esc_url(GARDEN_LANDSCAPING_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'garden-landscaping'); ?></a>
						
					</div>
			    	
			    </div>
			</div>
	    	<div class="bundle-banner">
	    		<div class="bundle-img">
	    			<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/inc/getstart/images/bundle-notice.png" alt="" />
	    		</div>
	    		<div class="bundle-text">
		  			<h2><?php esc_html_e('WP THEME BUNDLE','garden-landscaping'); ?></h2>
					<h4><?php esc_html_e('Get Access to 400+ Premium WordPress Themes At Just $99','garden-landscaping'); ?></h4>
					<div class="bundle-button">
			  			<a href="<?php echo esc_url( 'https://www.vwthemes.com/discount/FREEBREF?redirect=/products/wp-theme-bundle'); ?>" target="_blank"><?php esc_html_e('Get 10% OFF On Bundle', 'garden-landscaping'); ?></a>
			  		</div>
		  		</div>
		  		
	    	</div>
	    </div>
	    <div class="coupen-section">
	    	<div class="logo-section">
			  	<img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/screenshot.png" alt="" />
		  	</div>
		  	<div class="logo-right">	
		  		<div class="logo-text">
		  			<h2><?php esc_html_e('GET PRO','garden-landscaping'); ?></h2>
					<h4><?php esc_html_e('20% Off','garden-landscaping'); ?></h4>
		  		</div>						
			</div>
	    </div>
	</div>
      
</div>
<?php } ?>