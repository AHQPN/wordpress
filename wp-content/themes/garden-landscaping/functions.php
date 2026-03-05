<?php
	add_action( 'wp_enqueue_scripts', 'garden_landscaping_enqueue_styles' );
	function garden_landscaping_enqueue_styles() {
    	$parent_style = 'vw-gardening-landscaping-basic-style'; // Style handle of parent theme.
    	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );		
		wp_enqueue_style( 'garden-landscaping-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'garden-landscaping-style',$vw_gardening_landscaping_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'garden-landscaping-style',$garden_landscaping_custom_css );
		wp_enqueue_style( 'garden-landscaping-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	}

	add_action( 'init', 'garden_landscaping_remove_parent_function');
	function garden_landscaping_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_gardening_landscaping_activation_notice' );
		remove_action( 'wp_enqueue_scripts', 'vw_gardening_landscaping_header_style' );
		remove_action( 'admin_menu', 'vw_gardening_landscaping_gettingstarted' );
		unregister_sidebar( 'social-icon' );
	}

	add_action( 'admin_enqueue_scripts', 'garden_landscaping_dequeue_parent_getstart', 20 );
    function garden_landscaping_dequeue_parent_getstart() {
        wp_dequeue_style( 'vw-gardening-landscaping-custom-admin-style' );
        wp_deregister_style( 'vw-gardening-landscaping-custom-admin-style' );
    }

	function garden_landscaping_customize_register() {
		global $wp_customize;
		$wp_customize->remove_section( 'vw_gardening_landscaping_upgrade_pro_link' );
		$wp_customize->remove_section( 'vw_gardening_landscaping_get_started_link' );		
	}
	add_action( 'customize_register', 'garden_landscaping_customize_register', 11 );

	function garden_landscaping_header_style() {
		if ( get_header_image() ) :
		$custom_css = "
	        .home-page-header{
				background-image:url('".esc_url(get_header_image())."');
				background-position: center top;
				background-size: 100%;
			}";
		   	wp_add_inline_style( 'garden-landscaping-style', $custom_css );
		endif;
	}
	add_action( 'wp_enqueue_scripts', 'garden_landscaping_header_style' );

	function garden_landscaping_scripts() {	
		wp_enqueue_script( 'garden-landscaping-custom-js ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	}
	add_action( 'wp_enqueue_scripts', 'garden_landscaping_scripts' );
	
	function garden_landscaping_customizer ( $wp_customize ) {

		//Selective Refresh
		$wp_customize->selective_refresh->add_partial('garden_landscaping_timming', array( 
			'selector' => '#topbar span', 
			'render_callback' => 'vw_gardening_landscaping_customize_partial_garden_landscaping_timming',			
		));

		$wp_customize->add_setting('garden_landscaping_timming',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
			'priority' => null
		));
		$wp_customize->add_control('garden_landscaping_timming',array(
			'label'	=> __('Add Timing','garden-landscaping'),
			'input_attrs' => array(
	            'placeholder' => __( 'Mon-Fri: 9am to 7pm / Sat: 9am to 4pm', 'garden-landscaping' ),
	        ),
			'section'=> 'vw_gardening_landscaping_topbar',
			'type'=> 'text'
		));

		// Project Section
		$wp_customize->add_section('garden_landscaping_services',array(
			'title'	=> __('Project Section','garden-landscaping'),
			'description' => __('For more options of project section<br/> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/landscaping-wordpress-theme">GO PRO</a> <br/><br/> Increase the number of tab and publish the settings and then refresh the page then the project settings will increase','garden-landscaping'),
			'panel' => 'vw_gardening_landscaping_homepage_panel',
			'priority' => 5,
		));

		$wp_customize->add_setting('garden_landscaping_services_top_text',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('garden_landscaping_services_top_text',array(
			'label'	=> esc_html__('Project Section Text','garden-landscaping'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'Our Work', 'garden-landscaping' ),
	        ),
			'section'=> 'garden_landscaping_services',
			'type'=> 'text'
		));

		$wp_customize->add_setting('garden_landscaping_services_title',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('garden_landscaping_services_title',array(
			'label'	=> esc_html__('Project Section Heading','garden-landscaping'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'OUR PROECTS', 'garden-landscaping' ),
	        ),
			'section'=> 'garden_landscaping_services',
			'type'=> 'text'
		));

		$wp_customize->add_setting('garden_landscaping_services_number',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('garden_landscaping_services_number',array(
			'label'	=> esc_html__('No of Tabs to show','garden-landscaping'),
			'section'=> 'garden_landscaping_services',
			'type'=> 'number'
		));	

		$featured_post = get_theme_mod('garden_landscaping_services_number','');
	    for ( $j = 1; $j <= $featured_post; $j++ ) {
			$wp_customize->add_setting('garden_landscaping_services_text'.$j,array(
				'default'=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));	
			$wp_customize->add_control('garden_landscaping_services_text'.$j,array(
				'label'	=> esc_html__('Tab ','garden-landscaping').$j,
				'input_attrs' => array(
		            'placeholder' => esc_html__( 'All', 'garden-landscaping' ),
		        ),
				'section'=> 'garden_landscaping_services',
				'type'=> 'text'
			));

			$categories = get_categories();
				$cat_posts = array();
					$i = 0;
					$cat_posts[]='Select';
				foreach($categories as $category){
					if($i==0){
					$default = $category->slug;
					$i++;
				}
				$cat_posts[$category->slug] = $category->name;
			}

			$wp_customize->add_setting('garden_landscaping_services_category'.$j,array(
				'default'	=> 'select',
				'sanitize_callback' => 'vw_gardening_landscaping_sanitize_choices',
			));
			$wp_customize->add_control('garden_landscaping_services_category'.$j,array(
				'type'    => 'select',
				'choices' => $cat_posts,
				'label' => __('Select Category to display game highlight','garden-landscaping'),
				'section' => 'garden_landscaping_services',
			));
		}

		$wp_customize->add_setting( 'garden_landscaping_project_excerpt_number', array(
			'default'              => 5,
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'vw_gardening_landscaping_sanitize_number_range'
		) );
		$wp_customize->add_control( 'garden_landscaping_project_excerpt_number', array(
			'label'       => esc_html__( 'Project Excerpt length','garden-landscaping' ),
			'section'     => 'garden_landscaping_services',
			'type'        => 'range',
			'settings'    => 'garden_landscaping_project_excerpt_number',
			'input_attrs' => array(
				'step'             => 5,
				'min'              => 0,
				'max'              => 50,
			),
		) );
	}
	add_action( 'customize_register', 'garden_landscaping_customizer' );

	

	/**
	 * Enqueue block editor style
	 */
	function garden_landscaping_block_editor_styles() {
	    wp_enqueue_style( 'garden-landscaping-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'garden_landscaping_block_editor_styles' );

	function garden_landscaping_sanitize_select( $input, $setting ){      
	    $input = sanitize_key($input);
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
	}

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Garden_Landscaping_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'garden-landscaping';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class Garden_Landscaping_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Garden_Landscaping_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Garden_Landscaping_Customize_Section_Pro( $manager, 'garden_landscaping',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Garden Landscaping Pro', 'garden-landscaping' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'garden-landscaping' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/landscaping-wordpress-theme'),
		) ) );

		// Register sections.
		$manager->add_section(new Garden_Landscaping_Customize_Section_Pro($manager,'garden_landscaping2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'garden-landscaping' ),
			'pro_text' => esc_html__( 'DOCS', 'garden-landscaping' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-garden-landscaping/'),
		)));

	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'garden-landscaping-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'garden-landscaping-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}
Garden_Landscaping_Customize::get_instance();

/* Theme Setup */
if ( ! function_exists( 'garden_landscaping_setup' ) ) :
 
function garden_landscaping_setup() {

	$GLOBALS['content_width'] = apply_filters( 'garden_landscaping_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_gardening_landscaping_font_url() ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	// Theme Activation Notice
	global $pagenow;

	if (
		is_admin()
		&&
		('themes.php' == $pagenow)
		// &&
		// isset( $_GET['activated'] )
	) {
		add_action('admin_notices', 'garden_landscaping_activation_notice');
	}
}
endif;

add_action( 'after_setup_theme', 'garden_landscaping_setup' );

// Notice after Theme Activation

function garden_landscaping_activation_notice() {

	$garden_landscaping_meta = get_option( 'garden_landscaping_admin_notice' );

	if (!$garden_landscaping_meta) {
		echo '<div id="garden-landscaping-welcome-notice" class="notice notice-success is-dismissible welcome-notice">';
		echo '<div class="notice-row">';
			echo '<div class="notice-text">';
				echo '<p class="welcome-text1">'. esc_html__( '🎉 Welcome to VW Themes,', 'garden-landscaping' ) .'</p>';
				echo '<p class="welcome-text2">'. esc_html__( 'You are now using the Garden Landscaping, a beautifully designed theme to kickstart your website.', 'garden-landscaping' ) .'</p>';
				echo '<p class="welcome-text3">'. esc_html__( 'To help you get started quickly, use the options below:', 'garden-landscaping' ) .'</p>';
				echo '<span class="import-btn"><a href="'. esc_url( admin_url( 'themes.php?page=garden_landscaping_guide' ) ) .'" class="button button-primary">'. esc_html__( 'IMPORT DEMO', 'garden-landscaping' ) .'</a></span>';
				echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-gardening-landscaping/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'garden-landscaping' ) .'</a></span>';
				echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/landscaping-wordpress-theme' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE TO PRO', 'garden-landscaping' ) .'</a></span>';
				echo '<span class="bundle-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/wp-theme-bundle' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'BUNDLE OF 400+ THEMES', 'garden-landscaping' ) .'</a></span>';
			echo '</div>';
			echo '<div class="notice-img1">';
				echo '<img src="' . esc_url( get_template_directory_uri() . '/inc/getstart/images/arrow-notice.png' ) . '" width="180" alt="' . esc_attr__( 'Garden Landscaping', 'garden-landscaping' ) . '" />';
			echo '</div>';
			echo '<div class="notice-img2">';
				echo '<img src="' . esc_url( get_template_directory_uri() . '/inc/getstart/images/bundle-notice.png' ) . '" width="180" alt="' . esc_attr__( 'Garden Landscaping', 'garden-landscaping' ) . '" />';
			echo '</div>';	
		echo '</div>';	
	echo '</div>';
}
}

function garden_landscaping_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'garden_landscaping_enqueue_comments_reply' );

function garden_landscaping_init_setup() {
	/* Plugin Activation */
	require get_theme_file_path('/inc/getstart/plugin-activation.php');

	/* getstart */
	require get_theme_file_path('/inc/getstart/getstart.php');

	/* Block Pattern */
	require get_theme_file_path('/inc/block-patterns/block-patterns.php');

	/* TGM Plugin Activation */
	require get_theme_file_path('/inc/tgm/tgm.php');

	define('GARDEN_LANDSCAPING_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-garden-landscaping/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_SUPPORT',__('https://wordpress.org/support/theme/garden-landscaping/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_REVIEW',__('https://wordpress.org/support/theme/garden-landscaping/reviews','garden-landscaping'));
	define('GARDEN_LANDSCAPING_BUY_NOW',__('https://www.vwthemes.com/products/landscaping-wordpress-theme','garden-landscaping'));
	define('GARDEN_LANDSCAPING_LIVE_DEMO',__('https://www.vwthemes.net/vw-gardening-landscaping/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-gardening-landscaping-pro/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_FAQ',__('https://www.vwthemes.com/faqs/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_CONTACT',__('https://www.vwthemes.com/contact/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','garden-landscaping'));
	define('GARDEN_LANDSCAPING_CREDIT',__('https://www.vwthemes.com/products/free-landscaping-wordpress-theme','garden-landscaping'));
	define('GARDEN_LANDSCAPING_THEME_BUNDLE_BUY_NOW',__('https://www.vwthemes.com/products/wp-theme-bundle','garden-landscaping'));
	define('GARDEN_LANDSCAPING_THEME_BUNDLE_DOC',__('https://preview.vwthemesdemo.com/docs/theme-bundle/','garden-landscaping'));

	if ( ! function_exists( 'garden_landscaping_credit' ) ) {
		function garden_landscaping_credit(){
			echo "<a href=".esc_url(GARDEN_LANDSCAPING_CREDIT)." target='_blank'>". esc_html__('Garden WordPress Theme','garden-landscaping') ."</a>";
		}
	}

	if ( ! defined( 'VW_GARDENING_LANDSCAPING_GETSTARTED_URL' ) ) {
	define( 'VW_GARDENING_LANDSCAPING_GETSTARTED_URL', 'themes.php?page=garden_landscaping_guide');
	}
}
add_action( 'after_setup_theme', 'garden_landscaping_init_setup' );	

// Admin notice code START
function garden_landscaping_dismissed_notice() {
	update_option( 'garden_landscaping_admin_notice', true );
}
add_action( 'wp_ajax_garden_landscaping_dismissed_notice', 'garden_landscaping_dismissed_notice' );

//After Switch theme function
add_action('after_switch_theme', 'garden_landscaping_getstart_setup_options');
function garden_landscaping_getstart_setup_options () {
	update_option('garden_landscaping_admin_notice', false );
}
// Admin notice code END