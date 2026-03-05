<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_gardening_landscaping_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_gardening_landscaping_slider_hide_show', true) != '' || get_theme_mod( 'vw_gardening_landscaping_resp_slider_hide_show', true) != '') { ?>

    <section id="slider">
      <?php if(get_theme_mod('vw_gardening_landscaping_slider_type', 'Default slider') == 'Default slider' ){ ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_gardening_landscaping_slider_speed',4000)) ?>"> 
        <?php $vw_gardening_landscaping_slider_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_gardening_landscaping_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_gardening_landscaping_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_gardening_landscaping_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_gardening_landscaping_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if( get_theme_mod('vw_gardening_landscaping_slider_title_hide_show',true) != ''){ ?>
                    <h1 class="<?php if( get_theme_mod( 'vw_gardening_landscaping_animation', true) != '') { ?> wow slideInRight delay-1000" data-wow-duration="3s"<?php } else { ?> heading <?php } ?>"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <?php } ?>
                  <?php if( get_theme_mod('vw_gardening_landscaping_slider_content_hide_show',true) != ''){ ?>
                    <p class="<?php if( get_theme_mod( 'vw_gardening_landscaping_animation', true) != '') { ?> wow slideInRight delay-1000" data-wow-duration="3s"<?php } else { ?> cont <?php } ?>"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_gardening_landscaping_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_gardening_landscaping_slider_excerpt_number','30')))); ?></p>
                  <?php } ?>
                  <?php
                    $vw_gardening_landscaping_button_text = get_theme_mod('vw_gardening_landscaping_slider_button_text','READ MORE');
                    $vw_gardening_landscaping_button_link = get_theme_mod('vw_gardening_landscaping_top_button_url', '');
                    if (empty($vw_gardening_landscaping_button_link)) {
                      $vw_gardening_landscaping_button_link = get_permalink();
                    }
                    if ($vw_gardening_landscaping_button_text || !empty($vw_gardening_landscaping_button_link)) { ?>
                    <div class="<?php if( get_theme_mod( 'vw_gardening_landscaping_animation', true) != '') { ?> more-btn wow slideInRight delay-1000" data-wow-duration="3s"<?php } else { ?> more-btn <?php } ?>">
                      <?php if( get_theme_mod('vw_gardening_landscaping_slider_button_text','READ MORE') != ''){ ?>
                        <a href="<?php echo esc_url($vw_gardening_landscaping_button_link); ?>" class="button redmor">
                        <?php echo esc_html($vw_gardening_landscaping_button_text); ?>
                          <span class="screen-reader-text"><?php echo esc_html($vw_gardening_landscaping_button_text); ?></span>
                        </a>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','garden-landscaping' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','garden-landscaping' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
      <?php } else if(get_theme_mod('vw_gardening_landscaping_slider_type', 'Advance slider') == 'Advance slider'){?>
        <?php echo do_shortcode(get_theme_mod('vw_gardening_landscaping_advance_slider_shortcode')); ?>
      <?php } ?>
    </section>

  <?php } ?>

  <?php do_action( 'vw_gardening_landscaping_after_slider' ); ?>

  <?php if( get_theme_mod('vw_gardening_landscaping_our_expertise') != ''){ ?>
    <section id="serv-section" class="<?php if( get_theme_mod( 'vw_gardening_landscaping_animation', true) != '') { ?> wow zoomInUp delay-1000" data-wow-duration="2s"<?php } else { ?> serv <?php } ?>">
      <div class="container">
        <?php if( get_theme_mod('vw_gardening_landscaping_section_text') != '' ){ ?>
          <h6 class="mb-3 htext text-center"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_section_text',''));?></h6>
        <?php }?>
        <?php if( get_theme_mod( 'vw_gardening_landscaping_section_title') != '') { ?>
          <h2><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_section_title',''));?></h2>
        <?php }?>
        <div class="row">
          <?php
            $vw_gardening_landscaping_catData =  get_theme_mod('vw_gardening_landscaping_our_expertise','');
            if($vw_gardening_landscaping_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_gardening_landscaping_catData,'garden-landscaping'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6">
              <div class="serv-box">
                <?php the_post_thumbnail(); ?>
                <h3><?php the_title(); ?></h3>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_gardening_landscaping_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_gardening_landscaping_expertise_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_gardening_landscaping_expertise_button_text','READ MORE') != ''){ ?>
                  <div class="expertise-btn">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_expertise_button_text',__('READ MORE','garden-landscaping')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_expertise_button_text',__('READ MORE','garden-landscaping')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'vw_gardening_landscaping_after_expertise_section' ); ?>

  <?php if( get_theme_mod('garden_landscaping_services_number') != ''){ ?>
    <section id="services-sec" class="<?php if( get_theme_mod( 'vw_gardening_landscaping_animation', true) != '') { ?> py-5 text-center wow bounceInUp delay-1000" data-wow-duration="2s"<?php } else { ?> py-5 text-center <?php } ?>">
      <div class="container">
        <?php if( get_theme_mod('garden_landscaping_services_top_text') != '' ){ ?>
          <h6 class="mb-3 htext text-center"><?php echo esc_html(get_theme_mod('garden_landscaping_services_top_text',''));?></h6>
        <?php }?>
        <?php if( get_theme_mod('garden_landscaping_services_title') != '' ){ ?>
          <h3 class="mb-3 htext text-center"><?php echo esc_html(get_theme_mod('garden_landscaping_services_title',''));?></h3>
        <?php }?>

        <div class="tab my-3">
          <?php
            $featured_post = get_theme_mod('garden_landscaping_services_number', '');
            for ( $j = 1; $j <= $featured_post; $j++ ){ ?>
            <button class="tablinks" onclick="garden_landscaping_project_tab(event, '<?php $main_id = get_theme_mod('garden_landscaping_services_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?> ')">
            <?php echo esc_html(get_theme_mod('garden_landscaping_services_text'.$j)); ?></button>
          <?php }?>
        </div>

        <?php for ( $j = 1; $j <= $featured_post; $j++ ){ ?>
          <div id="<?php $main_id = get_theme_mod('garden_landscaping_services_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?>"  class="tabcontent mt-3">
            <div class="row">
              <?php
              $garden_landscaping_catData = get_theme_mod('garden_landscaping_services_category'.$j);
              if($garden_landscaping_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html( $garden_landscaping_catData ,'garden-landscaping')));
                $bgcolor = 1; ?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-lg-4 col-md-6">
                    <?php if(has_post_thumbnail()) {?>
                      <div class="box mb-4">
                        <?php the_post_thumbnail(); ?>
                        <div class="box-content">
                          <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                          <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_gardening_landscaping_string_limit_words( $excerpt, esc_attr(get_theme_mod('garden_landscaping_project_excerpt_number','5')))); ?></p>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
                wp_reset_postdata();
              } ?>
            </div>
          </div>
        <?php }?>
      </div>
    </section>
  <?php }?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>