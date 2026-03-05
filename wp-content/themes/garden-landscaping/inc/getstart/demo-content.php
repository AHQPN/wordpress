<div class="theme-offer">
    <?php 
        // Check if the demo import has been completed
        $garden_landscaping_demo_import_completed = get_option('garden_landscaping_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($garden_landscaping_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'garden-landscaping') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('View Site', 'garden-landscaping') . '</a></span>';
        echo '<span><a href="'. esc_url(admin_url('customize.php') ) .'" class="button button-primary demo-btn" target=_blank>'. esc_html__( 'Customize Your Site', 'garden-landscaping' ) .'</a></span>';
        echo '<span><a href="'. esc_url( 'https://preview.vwthemesdemo.com/docs/free-garden-landscaping/' ) .'" class="button button-primary doc-btn" target=_blank>'. esc_html__( 'Free Theme Documentation', 'garden-landscaping' ) .'</a></span>';
        }

        //POST and update the customizer and other related data
        if (isset($_POST['submit'])) {
            // Check if ibtana visual editor is installed and activated
            if (!is_plugin_active('ibtana-visual-editor/plugin.php')) {
              // Install the plugin if it doesn't exist
              $garden_landscaping_plugin_slug = 'ibtana-visual-editor';
              $garden_landscaping_plugin_file = 'ibtana-visual-editor/plugin.php';

              // Check if plugin is installed
              $garden_landscaping_installed_plugins = get_plugins();
              if (!isset($garden_landscaping_installed_plugins[$garden_landscaping_plugin_file])) {
                  include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                  include_once(ABSPATH . 'wp-admin/includes/file.php');
                  include_once(ABSPATH . 'wp-admin/includes/misc.php');
                  include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                  // Install the plugin
                  $garden_landscaping_upgrader = new Plugin_Upgrader();
                  $garden_landscaping_upgrader->install('https://downloads.wordpress.org/plugin/ibtana-visual-editor.latest-stable.zip');
              }
              // Activate the plugin
              activate_plugin($garden_landscaping_plugin_file);
            }

            // ------- Create Nav Menu --------
            $garden_landscaping_menuname = 'Main Menus';
            $garden_landscaping_bpmenulocation = 'primary';
            $garden_landscaping_menu_exists = wp_get_nav_menu_object($garden_landscaping_menuname);

            if (!$garden_landscaping_menu_exists) {
                $garden_landscaping_menu_id = wp_create_nav_menu($garden_landscaping_menuname);

                // Create Home Page
                $garden_landscaping_home_title = 'Home';
                $garden_landscaping_home = array(
                    'post_type' => 'page',
                    'post_title' => $garden_landscaping_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $garden_landscaping_home_id = wp_insert_post($garden_landscaping_home);
                // Assign Home Page Template
                add_post_meta($garden_landscaping_home_id, '_wp_page_template', 'page-template/custom-home-page.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $garden_landscaping_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($garden_landscaping_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'garden-landscaping'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $garden_landscaping_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Pages Page with Dummy Content
                $garden_landscaping_pages_title = 'Pages';
                $garden_landscaping_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $garden_landscaping_pages = array(
                    'post_type' => 'page',
                    'post_title' => $garden_landscaping_pages_title,
                    'post_content' => $garden_landscaping_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $garden_landscaping_pages_id = wp_insert_post($garden_landscaping_pages);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($garden_landscaping_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'garden-landscaping'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $garden_landscaping_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $garden_landscaping_about_title = 'About Us';
                $garden_landscaping_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $garden_landscaping_about = array(
                    'post_type' => 'page',
                    'post_title' => $garden_landscaping_about_title,
                    'post_content' => $garden_landscaping_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $garden_landscaping_about_id = wp_insert_post($garden_landscaping_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($garden_landscaping_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'garden-landscaping'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $garden_landscaping_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Services Page with Dummy Content
                $garden_landscaping_services_title = 'Services';
                $garden_landscaping_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>

                Our landscaping services include garden design, lawn maintenance, plantation, irrigation systems, garden renovation, and seasonal plant care tailored to your outdoor space.';

                $garden_landscaping_services = array(
                    'post_type' => 'page',
                    'post_title' => $garden_landscaping_services_title,
                    'post_content' => $garden_landscaping_services_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'services'
                );

                $garden_landscaping_services_id = wp_insert_post($garden_landscaping_services);

                // Add Services Page to Menu
                wp_update_nav_menu_item($garden_landscaping_menu_id, 0, array(
                    'menu-item-title'      => __('Services', 'garden-landscaping'),
                    'menu-item-classes'   => 'services',
                    'menu-item-url'       => home_url('/services/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $garden_landscaping_services_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Create Blog Page 
                $garden_landscaping_blog_page_title = 'Blog';

                $garden_landscaping_blog_page_query = new WP_Query(array(
                    'post_type'      => 'page',
                    'name'           => sanitize_title($garden_landscaping_blog_page_title),
                    'post_status'    => 'publish',
                    'posts_per_page' => 1
                ));
                if (!$garden_landscaping_blog_page_query->have_posts()) {
                    $garden_landscaping_blog_page = array(
                        'post_type'   => 'page',
                        'post_title'  => $garden_landscaping_blog_page_title,
                        'post_status' => 'publish',
                        'post_author' => 1,
                    );
                    $garden_landscaping_blog_page_id = wp_insert_post($garden_landscaping_blog_page);
                    update_option('page_for_posts', $garden_landscaping_blog_page_id);

                    wp_update_nav_menu_item($garden_landscaping_menu_id, 0, array(
                        'menu-item-title'      => __('Blog', 'garden-landscaping'),
                        'menu-item-url'        => get_permalink($garden_landscaping_blog_page_id),
                        'menu-item-status'     => 'publish',
                        'menu-item-object-id'  => $garden_landscaping_blog_page_id,
                        'menu-item-object'     => 'page',
                        'menu-item-type'       => 'post_type',
                    ));
                }

                // Create Contact Us Page with Dummy Content
                $garden_landscaping_contact_title = 'Contact Us';
                $garden_landscaping_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>

                Get in touch with us for landscaping consultations, garden maintenance inquiries, or custom outdoor project requirements.';

                $garden_landscaping_contact = array(
                    'post_type' => 'page',
                    'post_title' => $garden_landscaping_contact_title,
                    'post_content' => $garden_landscaping_contact_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'contact-us'
                );

                $garden_landscaping_contact_id = wp_insert_post($garden_landscaping_contact);

                // Add Contact Us Page to Menu
                wp_update_nav_menu_item($garden_landscaping_menu_id, 0, array(
                    'menu-item-title'      => __('Contact Us', 'garden-landscaping'),
                    'menu-item-classes'   => 'contact-us',
                    'menu-item-url'       => home_url('/contact-us/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $garden_landscaping_contact_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Set the menu location if it's not already set
                if (!has_nav_menu($garden_landscaping_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($locations)) {
                        $locations = array();
                    }
                    $locations[$garden_landscaping_bpmenulocation] = $garden_landscaping_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
                
        }

         
            // Set the demo import completion flag
            update_option('garden_landscaping_demo_import_completed', true);
            // Display success message and "View Site" button
            echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'garden-landscaping') . '</p>';
            echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('View Site', 'garden-landscaping') . '</a></span>';
            echo '<span><a href="'. esc_url(admin_url('customize.php') ) .'" class="button button-primary demo-btn" target=_blank>'. esc_html__( 'Customize Your Site', 'garden-landscaping' ) .'</a></span>';
            echo '<span><a href="'. esc_url( 'https://preview.vwthemesdemo.com/docs/free-garden-landscaping/' ) .'" class="button button-primary doc-btn" target=_blank>'. esc_html__( 'Free Theme Documentation', 'garden-landscaping' ) .'</a></span>';
            //end 


            // Top Bar //
            set_theme_mod( 'garden_landscaping_timming', 'Mon-Fri: 9am to 7pm / Sat: 9am to 4pm' );  
            set_theme_mod( 'vw_gardening_landscaping_phone_icon', 'fas fa-phone' );  
            set_theme_mod( 'vw_gardening_landscaping_phone_number', '+00 987 654 1230' );  
            set_theme_mod( 'vw_gardening_landscaping_email_icon', 'fas fa-envelope-open' );  
            set_theme_mod( 'vw_gardening_landscaping_email_address', 'example@gmail.com' );
            set_theme_mod( 'vw_gardening_landscaping_top_btn_text', 'GET A QUOTE' );  
            set_theme_mod( 'vw_gardening_landscaping_top_btn_url', '#' );


            // slider section start //     
            set_theme_mod( 'vw_gardening_landscaping_slider_button_text', 'Read More' );  
            set_theme_mod( 'vw_gardening_landscaping_top_button_url', '#' );

            for($vw_gardening_landscaping_i=1;$vw_gardening_landscaping_i<=3;$vw_gardening_landscaping_i++){
               $vw_gardening_landscaping_slider_title = 'Lorem ipsum dolor sit amet, consectetur adipiscing';
               $vw_gardening_landscaping_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry';
                  // Create post object
               $my_post = array(
               'post_title'    => wp_strip_all_tags( $vw_gardening_landscaping_slider_title ),
               'post_content'  => $vw_gardening_landscaping_slider_content,
               'post_status'   => 'publish',
               'post_type'     => 'page',
               );

               // Insert the post into the database
               $vw_gardening_landscaping_post_id = wp_insert_post( $my_post );

               if ($vw_gardening_landscaping_post_id) {
                 // Set the theme mod for the slider page
                 set_theme_mod('vw_gardening_landscaping_slider_page' . $vw_gardening_landscaping_i, $vw_gardening_landscaping_post_id);

                  $vw_gardening_landscaping_image_url = get_theme_file_uri().'/inc/block-patterns/images/slider'.$vw_gardening_landscaping_i.'.png';

                $vw_gardening_landscaping_image_id = media_sideload_image($vw_gardening_landscaping_image_url, $vw_gardening_landscaping_post_id, null, 'id');

                    if (!is_wp_error($vw_gardening_landscaping_image_id)) {
                        // Set the downloaded image as the post's featured image
                        set_post_thumbnail($vw_gardening_landscaping_post_id, $vw_gardening_landscaping_image_id);
                    }
                }
            }    
            

            // Service Section //
            set_theme_mod( 'vw_gardening_landscaping_section_text', 'Our Gardening' );
            set_theme_mod( 'vw_gardening_landscaping_section_title', 'OUR EXPERTISE' );
            set_theme_mod( 'vw_gardening_landscaping_expertise_button_text', 'Read More' );
            set_theme_mod('vw_gardening_landscaping_our_expertise', 'category1');

            // Define post category names and post titles
            $vw_gardening_landscaping_category_names = array('category1', 'category2');
            $vw_gardening_landscaping_title_array = array(
                array("Our Expertise Title 1", "Our Expertise Title 2", "Our Expertise Title 3"),
                array("Our Expertise Title 1", "Our Expertise Title 2", "Our Expertise Title 3")
            );

            foreach ($vw_gardening_landscaping_category_names as $vw_gardening_landscaping_index => $vw_gardening_landscaping_category_name) {
                // Create or retrieve the post category term ID
                $vw_gardening_landscaping_term = term_exists($vw_gardening_landscaping_category_name, 'category');
                if ($vw_gardening_landscaping_term === 0 || $vw_gardening_landscaping_term === null) {
                    // If the term does not exist, create it
                    $vw_gardening_landscaping_term = wp_insert_term($vw_gardening_landscaping_category_name, 'category');
                }
                if (is_wp_error($vw_gardening_landscaping_term)) {
                    error_log('Error creating category: ' . $vw_gardening_landscaping_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                for ($vw_gardening_landscaping_i = 0; $vw_gardening_landscaping_i < 3; $vw_gardening_landscaping_i++) {
                    // Create post content
                    $vw_gardening_landscaping_title = $vw_gardening_landscaping_title_array[$vw_gardening_landscaping_index][$vw_gardening_landscaping_i];
                    $vw_gardening_landscaping_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting';

                    // Create post post object
                    $vw_gardening_landscaping_my_post = array(
                        'post_title'    => wp_strip_all_tags($vw_gardening_landscaping_title),
                        'post_content'  => $vw_gardening_landscaping_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'post', // Post type set to 'post'
                    );

                    // Insert the post into the database
                    $vw_gardening_landscaping_post_id = wp_insert_post($vw_gardening_landscaping_my_post);

                    if (is_wp_error($vw_gardening_landscaping_post_id)) {
                        error_log('Error creating post: ' . $vw_gardening_landscaping_post_id->get_error_message());
                        continue; // Skip to the next post if creation fails
                    }

                    // Assign the category to the post
                    wp_set_post_categories($vw_gardening_landscaping_post_id, array((int)$vw_gardening_landscaping_term['term_id']));

                    // Handle the featured image using media_sideload_image
                    $vw_gardening_landscaping_image_url = get_theme_file_uri() . '/inc/block-patterns/images/expertise' . ($vw_gardening_landscaping_i + 1) . '.png';
                    $vw_gardening_landscaping_image_id = media_sideload_image($vw_gardening_landscaping_image_url, $vw_gardening_landscaping_post_id, null, 'id');

                    if (is_wp_error($vw_gardening_landscaping_image_id)) {
                        error_log('Error downloading image: ' . $vw_gardening_landscaping_image_id->get_error_message());
                        continue; // Skip to the next post if image download fails
                    }
                    // Assign featured image to post
                    set_post_thumbnail($vw_gardening_landscaping_post_id, $vw_gardening_landscaping_image_id);
                }
            }  

            // Project Section //
            set_theme_mod('garden_landscaping_services_top_text', 'Our Work');
            set_theme_mod('garden_landscaping_services_title', 'OUR PROECTS');
            set_theme_mod('garden_landscaping_services_number', '6');

            $garden_landscaping_tab_text_array = array("All", "Garden Care", "Gardening Lawn", "Lawn Care", "Planting", "Snow Removal");
            $garden_landscaping_category_names = array("projectcategory1", "projectcategory2", "projectcategory3", "projectcategory4", "projectcategory5", "projectcategory6");
            $garden_landscaping_title_array = array(
                array("Our Service 1", "Our Service 2", "Our Service 3"),
                array("Our Service 1", "Our Service 2", "Our Service 3"),
                array("Our Service 1", "Our Service 2", "Our Service 3"),
                array("Our Service 1", "Our Service 2", "Our Service 3"),
                array("Our Service 1", "Our Service 2", "Our Service 3"),
                array("Our Service 1", "Our Service 2", "Our Service 3")
            );

            for ($garden_landscaping_tab_index = 1; $garden_landscaping_tab_index <= 6; $garden_landscaping_tab_index++) {
                $theme_mod_key = 'garden_landscaping_services_text' . $garden_landscaping_tab_index;
                $theme_mod_value = $garden_landscaping_tab_text_array[$garden_landscaping_tab_index - 1];
                set_theme_mod($theme_mod_key, $theme_mod_value);

                // Set the category for this tab
                $current_category = $garden_landscaping_category_names[$garden_landscaping_tab_index - 1];
                set_theme_mod('garden_landscaping_services_category' . $garden_landscaping_tab_index, $current_category);

                // Create or retrieve the post category term ID
                $garden_landscaping_term = term_exists($current_category, 'category');
                if ($garden_landscaping_term === 0 || $garden_landscaping_term === null) {
                    // If the term does not exist, create it
                    $garden_landscaping_term = wp_insert_term($current_category, 'category');
                }
                if (is_wp_error($garden_landscaping_term)) {
                    error_log('Error creating category: ' . $garden_landscaping_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                for ($garden_landscaping_i = 0; $garden_landscaping_i < 3; $garden_landscaping_i++) {
                    // Create post content
                    $garden_landscaping_title = $garden_landscaping_title_array[$garden_landscaping_tab_index - 1][$garden_landscaping_i];
                    $garden_landscaping_content = 'Lorem ipsum dolor sit amet';

                    // Create post object
                    $garden_landscaping_my_post = array(
                        'post_title'    => wp_strip_all_tags($garden_landscaping_title),
                        'post_content'  => $garden_landscaping_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'post', // Post type set to 'post'
                    );

                    // Insert the post into the database
                    $garden_landscaping_post_id = wp_insert_post($garden_landscaping_my_post);

                    if (is_wp_error($garden_landscaping_post_id)) {
                        error_log('Error creating post: ' . $garden_landscaping_post_id->get_error_message());
                        continue; // Skip to the next post if creation fails
                    }

                    // Assign the category to the post
                    wp_set_post_categories($garden_landscaping_post_id, array((int)$garden_landscaping_term['term_id']));

                    // Handle the featured image using media_sideload_image
                    $garden_landscaping_image_url = get_theme_file_uri() . '/inc/block-patterns/images/project' . ($garden_landscaping_i + 1) . '.png';
                    $garden_landscaping_image_id = media_sideload_image($garden_landscaping_image_url, $garden_landscaping_post_id, null, 'id');

                    if (is_wp_error($garden_landscaping_image_id)) {
                        error_log('Error downloading image: ' . $garden_landscaping_image_id->get_error_message());
                        continue; // Skip to the next post if image download fails
                    }

                    // Assign featured image to post
                    set_post_thumbnail($garden_landscaping_post_id, $garden_landscaping_image_id);
                }
            }  

            //Copyright Text
            set_theme_mod( 'vw_gardening_landscaping_footer_text', 'By VWThemes' );  
     
        }
    ?>

    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=garden_landscaping_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('garden_landscaping_demo_import_completed')) : ?>
            <form method="post">   
            <p class="run-import-text"><?php esc_html_e('Click On The Below Run Importer Button To Import Demo Content Of garden landscaping', 'garden-landscaping'); ?></p>
                <p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for garden landscaping', 'garden-landscaping'); ?></p>
                <input class="run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer', 'garden-landscaping'); ?>" class="button button-primary button-large">
                 </form> 
        <?php endif; ?>
        <div id="spinner" style="display:none;">         
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/block-patterns/images/spinner.png" alt="" />
        </div>
    </form>
    <script type="text/javascript">
        function validate(form) {
            if (confirm("Do you really want to import the theme demo content?")) {
                // Show the spinner
                document.getElementById('spinner').style.display = 'block';
                // Allow the form to be submitted
                return true;
            } 
            else {
                return false;
            }
        }
    </script>
</div>

