<?php
//about theme info

/* Add to Dashboard main menu */
function vw_cloud_kitchen_dashboard_menu() {
    add_menu_page(
        esc_html__( 'VW Cloud Kitchen', 'vw-cloud-kitchen' ), // Page title
        esc_html__( 'VW Cloud Kitchen', 'vw-cloud-kitchen' ), // Menu title
        'manage_options',                                             // Capability
        'vw-cloud-kitchen-info',                                  // Menu slug (same)
        'vw_cloud_kitchen_theme_page_display',                    // Callback
         get_template_directory_uri() . '/images/menu-icon.svg', // Image icon
        59                                           // Position
    );
}
add_action( 'admin_menu', 'vw_cloud_kitchen_dashboard_menu' );

// Add a Custom CSS file to WP Admin Area
function vw_cloud_kitchen_admin_theme_style() {
	wp_enqueue_style('vw-cloud-kitchen-custom-admin-style', esc_url(get_template_directory_uri()) . '/css/admin-style.css');
	wp_enqueue_script('vw-cloud-kitchen-tabs', esc_url(get_template_directory_uri()) . '/inc/core/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_cloud_kitchen_admin_theme_style');

//guidline for about theme
function vw_cloud_kitchen_theme_page_display() { 
	//custom function about theme customizer
	$vw_cloud_kitchen_return = add_query_arg( array()) ;
	$vw_cloud_kitchen_theme = wp_get_theme( 'vw-cloud-kitchen' );
?>

<div class="wrapper-info">
	<div class="tab-sec">
    	
    	<div class="tab">
			<button class="tablinks" onclick="vw_cloud_kitchen_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Free Setup', 'vw-cloud-kitchen' ); ?></button>
			<button class="tablinks" onclick="vw_cloud_kitchen_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-cloud-kitchen' ); ?></button>
  			<button class="tablinks" onclick="vw_cloud_kitchen_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'vw-cloud-kitchen' ); ?></button>
  			<button class="tablinks" onclick="vw_cloud_kitchen_open_tab(event, 'get_bundle')"><?php esc_html_e( 'WP Theme Bundle', 'vw-cloud-kitchen' ); ?></button>
		</div>

		<?php 
			$vw_cloud_kitchen_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_cloud_kitchen_plugin_custom_css ='display: block';
			}
		?>

		<div id="lite_theme" class="tabcontent open">
			<div class="lite-theme-tab">
				<h3><?php esc_html_e( 'VW Cloud Kitchen', 'vw-cloud-kitchen' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Cloud Kitchen is a modern, responsive theme crafted for cloud kitchens, online restaurants, food delivery services, catering businesses, home-based food startups, virtual restaurants, dark kitchens, and multi-location kitchens, offering a clean and professional layout to showcase menus, chef specials, combo meals, daily offerings, and food packages while supporting ecommerce functionality for selling meal kits, digital recipe guides, food merchandise, and print-on-demand items through seamless WooCommerce integration suited for ecommerce templates, dropshipping shops, and online store building. The theme includes pre-designed pages such as Home, About, Menu, Blog, and Contact, along with advanced menu layouts, online table reservations, order sections, customer testimonials, and social media integration to strengthen brand presence. Flexible color schemes, typography controls, and a fully responsive design ensure smooth browsing across mobile, tablet, and desktop devices. Contact Form 7 allows easy customer inquiries, bookings, and order requests, while Yoast SEO compatibility improves visibility for search terms like online food delivery, cloud kitchen services, restaurant website, food ordering website, fast food delivery, catering website, and responsive restaurant themes, making VW Cloud Kitchen a conversion-focused solution to attract customers, manage online orders efficiently, and grow a food business with confidence. Live Demo:https://www.vwthemes.net/vw-cloud-kitchen-pro/','vw-cloud-kitchen'); ?></p>
			  	<div class="col-left-inner">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site', 'vw-cloud-kitchen'); ?></a>
						<a href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'vw-cloud-kitchen'); ?></a>
					</div>
					<div class="support-forum-col-section">
						<div class="support-forum-col">
							<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-cloud-kitchen'); ?></h4>
							<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-cloud-kitchen'); ?></p>
							<div class="info-link">
								<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-cloud-kitchen'); ?></a>
							</div>
						</div>
						<div class="support-forum-col">
							<h4><?php esc_html_e('Reviews & Testimonials', 'vw-cloud-kitchen'); ?></h4>
							<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-cloud-kitchen'); ?>  </p>
							<div class="info-link">
								<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-cloud-kitchen'); ?></a>
							</div>
						</div>
						<div class="support-forum-col">
							<h4><?php esc_html_e('Theme Documentation', 'vw-cloud-kitchen'); ?></h4>
							<p> <?php esc_html_e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-cloud-kitchen'); ?>  </p>
							<div class="info-link">
								<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Free Theme Documentation', 'vw-cloud-kitchen'); ?></a>
							</div>
						</div>
					</div>
			  	</div>
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">		  	
			<div class="pro-info">
				<div class="col-left-pro">
					<h3><?php esc_html_e( 'Premium Theme Information', 'vw-cloud-kitchen' ); ?></h3>
					<hr class="h3hr">
			    	<p><?php esc_html_e('The Kitchen WordPress Theme is a modern, responsive, and visually appealing solution designed for restaurants, cafes, catering services, and culinary blogs. Built with a focus on user experience and seamless navigation, this theme offers a clean design that highlights your culinary creations while providing a professional online presence. With full compatibility for WooCommerce, you can easily showcase your menu, sell food items, or manage reservations directly from your website. The theme is optimized for speed, SEO-friendly, and supports multiple page builders like Elementor and Gutenberg, allowing effortless customization without coding knowledge. Its fully responsive layout ensures your website looks stunning on all devices, from desktops to smartphones. The Kitchen WordPress Theme also includes features such as customizable headers, multiple homepage layouts, and advanced typography options, ensuring your website aligns perfectly with your brand. Whether you’re a food blogger or a restaurant owner, this theme offers all the tools you need to create an interactive, professional, and visually engaging culinary website.','vw-cloud-kitchen'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'vw-cloud-kitchen'); ?></a>
						<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'vw-cloud-kitchen'); ?></a>
						<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'vw-cloud-kitchen'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/premium-image.jpg" alt="" class="pro-img" />		    	
			    </div>
			</div>		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-cloud-kitchen' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th><?php esc_html_e('Features', 'vw-cloud-kitchen'); ?></th>
								<th><?php esc_html_e('Free Themes', 'vw-cloud-kitchen'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-cloud-kitchen'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Easy Setup', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('SEO Friendly', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Banner Settings', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'vw-cloud-kitchen'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-cloud-kitchen'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'vw-cloud-kitchen'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-cloud-kitchen'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-cloud-kitchen'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Reordering', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Demo Importer', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Influence Registration', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Detailed Influencer Portfolio', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Pricing Plan', 'vw-cloud-kitchen'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
							<td></td>
							<td class="table-img"></td>
							<td class="update-link"><a href="<?php echo esc_url( VW_CLOUD_KITCHEN_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-cloud-kitchen'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">	
			<div class="bundle-info">
				<div class="col-left-pro">
			   		<h3><?php esc_html_e( 'WP Theme Bundle', 'vw-cloud-kitchen' ); ?></h3>
			   		<hr class="h3hr">
			    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 400+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','vw-cloud-kitchen'); ?></p>
			    	<div class="feature">
			    		<h4><?php esc_html_e( 'Features:', 'vw-cloud-kitchen' ); ?></h4>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('400+ Premium Themes & 5+ Plugins.', 'vw-cloud-kitchen'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Seamless Integration.', 'vw-cloud-kitchen'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Customization Flexibility.', 'vw-cloud-kitchen'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Regular Updates.', 'vw-cloud-kitchen'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Dedicated Support.', 'vw-cloud-kitchen'); ?></p>
			    	</div>
			    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'vw-cloud-kitchen'); ?></p>
			    	<div class="pro-links">
						<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank" class="bundle-buy"><?php esc_html_e('Get Bundle', 'vw-cloud-kitchen'); ?></a>
						<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_THEME_BUNDLE_DOC ); ?>" target="_blank" class="bundle-doc"><?php esc_html_e('Documentation', 'vw-cloud-kitchen'); ?></a>
					</div>
			   	</div>
			   	<div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bundle.jpg" alt="" />
			   	</div>
			</div>	  	
		</div>
	</div>
	<div class="coupen-code-section">
		<div class="sshot-section">
			<div class="sshot-inner">
				<h2><?php esc_html_e( 'Welcome To VW Cloud Kitchen', 'vw-cloud-kitchen' ); ?></h2>
				<div class="on-pro">
					<span class="version"><?php esc_html_e( 'Version', 'vw-cloud-kitchen' ); ?>: <?php echo esc_html($vw_cloud_kitchen_theme['Version']);?></span>
					<span class="coupon-code"><?php esc_html_e('Get 20% Of On Pro Theme-Use Code: ','vw-cloud-kitchen'); ?><span class="code-highlight"><?php esc_html_e('VWPRO20','vw-cloud-kitchen'); ?></span>
				</div>
		    	<p><?php esc_html_e('All Our Wordpress Themes Are Modern, Minimalist, 100% Responsive, Seo-Friendly,Feature-Rich, And Multipurpose That Best Suit Designers, Bloggers And Other Professionals Who Are Working In The Creative Fields.','vw-cloud-kitchen'); ?></p>
		    	<div class="btn-section">
			    	<div class="proo-links">
				    	<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'vw-cloud-kitchen'); ?></a>
						<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'vw-cloud-kitchen'); ?></a>
						<a href="<?php echo esc_url( VW_CLOUD_KITCHEN_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'vw-cloud-kitchen'); ?></a>
						
					</div>
			    	
			    </div>
			</div>
	    	<div class="bundle-banner">
	    		<div class="bundle-img">
	    			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bundle-notice.png" alt="" />
	    		</div>
	    		<div class="bundle-text">
		  			<h2><?php esc_html_e('WP THEME BUNDLE','vw-cloud-kitchen'); ?></h2>
					<h4><?php esc_html_e('Get Access to 400+ Premium WordPress Themes At Just $99','vw-cloud-kitchen'); ?></h4>
					<div class="bundle-button">
			  			<a href="<?php echo esc_url( 'https://www.vwthemes.com/discount/FREEBREF?redirect=/products/wp-theme-bundle'); ?>" target="_blank"><?php esc_html_e('Get 10% OFF On Bundle', 'vw-cloud-kitchen'); ?></a>
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
		  			<h2><?php esc_html_e('GET PRO','vw-cloud-kitchen'); ?></h2>
					<h4><?php esc_html_e('20% Off','vw-cloud-kitchen'); ?></h4>
		  		</div>						
			</div>
	    </div>
	</div>
</div>

<?php } ?>