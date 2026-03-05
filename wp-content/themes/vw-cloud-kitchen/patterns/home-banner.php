<?php
/**
 * Title: Home Banner
 * Slug: vw-cloud-kitchen/home-banner
 * Categories: template
 */
?>
<!-- wp:group {"className":"banner-section","style":{"dimensions":{"minHeight":"500px"},"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"0px"}},"backgroundColor":"section-bg-color","layout":{"type":"default"}} -->
<div class="wp-block-group banner-section has-section-bg-color-background-color has-background" style="border-radius:0px;min-height:500px;margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-bg.jpg","id":48,"dimRatio":60,"overlayColor":"background","isUserOverlayColor":true,"minHeight":850,"isDark":false,"sizeSlug":"large","className":"banner-bg","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-cover is-light banner-bg" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;min-height:850px"><img class="wp-block-cover__image-background wp-image-48 size-large" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-bg.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"className":"banner-boxes wow zoomIn"} -->
<div class="wp-block-columns banner-boxes wow zoomIn"><!-- wp:column {"verticalAlignment":"center","className":"banner-left-box","style":{"spacing":{"padding":{"bottom":"35px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center banner-left-box" style="padding-bottom:35px"><!-- wp:heading {"className":"banner-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"40px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"700","lineHeight":"1.3"}},"textColor":"secondary"} -->
<h2 class="wp-block-heading banner-title has-secondary-color has-text-color has-link-color" style="font-size:40px;font-style:normal;font-weight:700;line-height:1.3;text-transform:capitalize"><?php echo esc_html__( 'delicious creations from our cloud kitchen', 'vw-cloud-kitchen' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-para","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"17px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"20px"}}},"textColor":"primary"} -->
<p class="banner-para has-primary-color has-text-color has-link-color" style="margin-top:20px;font-size:17px;font-style:normal;font-weight:500"><?php echo esc_html__( 'Enjoy restaurant-quality dishes, freshly cooked and delivered straight to your door.', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"banner-button","style":{"spacing":{"blockGap":{"top":"12px","left":"30px"}}}} -->
<div class="wp-block-buttons banner-button"><!-- wp:button {"backgroundColor":"primary","textColor":"background","className":"banner-btn1","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"left":"60px","right":"60px","top":"10px","bottom":"10px"}},"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"}}} -->
<div class="wp-block-button banner-btn1"><a class="wp-block-button__link has-background-color has-primary-background-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:10px;padding-right:60px;padding-bottom:10px;padding-left:60px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"secondary","textColor":"background","className":"banner-btn2","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"left":"60px","right":"60px","top":"10px","bottom":"10px"}},"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"}}} -->
<div class="wp-block-button banner-btn2"><a class="wp-block-button__link has-background-color has-secondary-background-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:10px;padding-right:60px;padding-bottom:10px;padding-left:60px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'track your order', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","className":"banner-right-box"} -->
<div class="wp-block-column is-vertically-aligned-bottom banner-right-box"><!-- wp:image {"id":29,"sizeSlug":"large","linkDestination":"none","className":"banner-right-top-img"} -->
<figure class="wp-block-image size-large banner-right-top-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-right-img.png" alt="" class="wp-image-29"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":37,"width":"auto","height":"200px","sizeSlug":"full","linkDestination":"none","align":"right","className":"banner-right-btm-img"} -->
<figure class="wp-block-image alignright size-full is-resized banner-right-btm-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-right-short-img.png" alt="" class="wp-image-37" style="width:auto;height:200px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->

<!-- wp:image {"id":31,"width":"auto","height":"600px","sizeSlug":"large","linkDestination":"none","className":"banner-sticky-img"} -->
<figure class="wp-block-image size-large is-resized banner-sticky-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-sticky-img.png" alt="" class="wp-image-31" style="width:auto;height:600px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"10px"} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->