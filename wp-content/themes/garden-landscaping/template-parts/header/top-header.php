<?php
/**
 * The template part for top header
 *
 * @package Garden Landscaping 
 * @subpackage garden_landscaping
 * @since Garden Landscaping 1.0
 */
?>
<?php if( get_theme_mod( 'vw_gardening_landscaping_topbar_hide_show', true) != '' || get_theme_mod( 'vw_gardening_landscaping_resp_topbar_hide_show', true) != '') { ?>
  <div id="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-9 align-self-center">
          <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6 align-self-center">
              <?php if( get_theme_mod( 'garden_landscaping_timming') != '') { ?>
                <i class="far fa-clock"></i><span><?php echo esc_html(get_theme_mod('garden_landscaping_timming',''));?></span>
              <?php }?>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-6 align-self-center">
              <?php if( get_theme_mod( 'vw_gardening_landscaping_email_address') != '') { ?>
                <i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_email_icon','fas fa-envelope-open')); ?>"></i><span><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_email_address',''));?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_email_address',''));?></a></span>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-3 align-self-center">
          <?php if (is_active_sidebar('social-links')) : ?>
            <?php dynamic_sidebar('social-links'); ?>
          <?php else : ?>
            <!-- Default Social Icons Widgets -->
              <div class="widget">
                  <ul class="custom-social-icons" >
                    <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                    <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li> 
                    <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                    <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></li> 
                    <li><a href="https://pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li> 
                    <li><a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>                     
                  </ul>
              </div>
          <?php endif; ?>   
        </div>
      </div>      
    </div>
  </div>
<?php }?>