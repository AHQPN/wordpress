<?php
/**
 * The template part for header
 *
 * @package Garden Landscaping 
 * @subpackage garden_landscaping
 * @since Garden Landscaping 1.0
 */
?>
<div class="container">
  <div class="menu-bg">
    <div class="row">
      <div class="col-lg-10 col-md-8 col-sm-8 col-4 align-self-center">
        <div id="header" class="menubar">
          <?php ?>
            <div class="toggle-nav mobile-menu">
              <button role="tab" onclick="vw_gardening_landscaping_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_res_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','garden-landscaping'); ?></span></button>
            </div> 
          <?php  ?>
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'garden-landscaping' ); ?>">
              <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
              ?>
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_gardening_landscaping_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','garden-landscaping'); ?></span></a>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-md-2 col-sm-2 col-4 align-self-center">
        <?php if( get_theme_mod( 'vw_gardening_landscaping_search_hide_show',true) != '') { ?>
          <div class="search-box text-center">
            <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_search_icon','fas fa-search')); ?>"></i></a></span>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-1 col-md-2 col-sm-2 col-4 align-self-center">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="cart_no">
            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','garden-landscaping' ); ?>"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','garden-landscaping' );?></span></a>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="serach_outer">
      <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>
