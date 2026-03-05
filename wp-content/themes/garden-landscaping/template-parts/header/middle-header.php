<?php
/**
 * The template part for header
 *
 * @package Garden Landscaping
 * @subpackage garden_landscaping
 * @since Garden Landscaping 1.0
 */
?>
<div class="main-header">
  <div class="header-menu <?php if( get_theme_mod( 'vw_gardening_landscaping_sticky_header', false) != '' || get_theme_mod( 'vw_gardening_landscaping_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-4 col-sm-4 align-self-center">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('vw_gardening_landscaping_logo_title_hide_show',true) != ''){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('vw_gardening_landscaping_logo_title_hide_show',true) != ''){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('vw_gardening_landscaping_tagline_hide_show',false) == 1){ ?>
                <p class="site-description">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 align-self-center text-center">
          <?php if( get_theme_mod( 'vw_gardening_landscaping_phone_number') != '') { ?>
            <span class="call"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_phone_icon','fas fa-phone')); ?>"></i></span><span class="ms-4 call-info"><a href="tel:<?php echo esc_attr( get_theme_mod('vw_gardening_landscaping_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_phone_number',''));?></a></span>
          <?php }?>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 align-self-center">
          <?php if( get_theme_mod( 'vw_gardening_landscaping_top_btn_url') != '' | get_theme_mod( 'vw_gardening_landscaping_top_btn_text') != '') { ?>
            <div class="top-btn text-end text-md-end">
              <a href="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_top_btn_url',''));?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_top_btn_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'Get A Quote','garden-landscaping' );?></span></a>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>