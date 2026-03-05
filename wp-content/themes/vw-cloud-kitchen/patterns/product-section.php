<?php
/**
 * Title: Product Section
 * Slug: vw-cloud-kitchen/product-section
 * Categories: template
 */
$vw_cloud_kitchen_pluginsList = get_option( 'active_plugins' );
$vw_cloud_kitchen_plugin = 'woocommerce/woocommerce.php';
$vw_cloud_kitchen_results = in_array( $vw_cloud_kitchen_plugin , $vw_cloud_kitchen_pluginsList);
if ( $vw_cloud_kitchen_results )  {
?>

<!-- wp:group {"className":"product-section wow zoomIn","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group product-section wow zoomIn"><!-- wp:group {"className":"product-head-box wow zoomIn","style":{"spacing":{"margin":{"bottom":"40px"},"padding":{"bottom":"10px"}}},"layout":{"type":"constrained","contentSize":"25%"}} -->
<div class="wp-block-group product-head-box wow zoomIn" style="margin-bottom:40px;padding-bottom:10px"><!-- wp:heading {"textAlign":"center","level":3,"className":"product-section-title","style":{"typography":{"fontSize":"28px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontFamily":"mansalva"} -->
<h3 class="wp-block-heading has-text-align-center product-section-title has-secondary-color has-text-color has-link-color has-mansalva-font-family" style="font-size:28px;font-style:normal;font-weight:400;text-transform:capitalize"><?php echo esc_html__( 'our signature dishes', 'vw-cloud-kitchen' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"product-sec-para","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.3"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"primary"} -->
<p class="has-text-align-center product-sec-para has-primary-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:0px;font-size:16px;font-style:normal;font-weight:500;line-height:1.3"><?php echo esc_html__( 'Crafted with love, cooked to perfection, and delivered hot.', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-cont-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-cont-box"><!-- wp:group {"className":"main-tab","style":{"spacing":{"margin":{"bottom":"45px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group main-tab" style="margin-bottom:45px"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"15px","left":"30px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'starters', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'main course', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'bowls', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'desserts', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'beverages', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'combos', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"product-cont-inne-box","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-cont-inne-box"><!-- wp:column {"width":"25%","className":"product-left-box"} -->
<div class="wp-block-column product-left-box" style="flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/product-banner.png","id":64,"dimRatio":0,"isUserOverlayColor":true,"minHeight":470,"sizeSlug":"large","align":"center","className":"product-banner","style":{"border":{"radius":{"topLeft":"0px","bottomRight":"0px","topRight":"30px","bottomLeft":"30px"}},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"0px","right":"0px"}}},"layout":{"type":"constrained","contentSize":"60%"}} -->
<div class="wp-block-cover aligncenter product-banner" style="border-top-left-radius:0px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:0px;padding-top:15px;padding-right:0px;padding-bottom:15px;padding-left:0px;min-height:470px"><img class="wp-block-cover__image-background wp-image-64 size-large" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-banner.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Enjoy 25% OFF your first CloudBite meal — delivered fresh to your door!', 'vw-cloud-kitchen' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-discount","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":"100px"}},"backgroundColor":"primary","layout":{"type":"default"}} -->
<div class="wp-block-group product-discount has-primary-background-color has-background" style="border-radius:100px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}}} -->
<p class="has-text-align-center" style="font-size:30px;font-style:normal;font-weight:600;line-height:1"><?php echo esc_html__( '25%', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600","lineHeight":"1"},"spacing":{"margin":{"top":"8px","bottom":"0px"}}}} -->
<p class="has-text-align-center" style="margin-top:8px;margin-bottom:0px;font-size:18px;font-style:normal;font-weight:600;line-height:1;text-transform:capitalize"><?php echo esc_html__( 'off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"75%","className":"product-right-box"} -->
<div class="wp-block-column product-right-box" style="flex-basis:75%"><!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-collection {"queryId":6,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[16]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/by-category","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-card-boxes"} -->
<div class="wp-block-woocommerce-product-collection product-card-boxes"><!-- wp:woocommerce/product-template -->
<!-- wp:group {"className":"product-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-img-box"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} /-->

<!-- wp:post-terms {"term":"product_tag","className":"product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":{"bottomRight":"15px"}},"spacing":{"padding":{"top":"8px","bottom":"12px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"backgroundColor":"primary","textColor":"background"} /-->

<!-- wp:group {"className":"heart-cart-img","style":{"spacing":{"blockGap":"16px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group heart-cart-img" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"product-card-btn","fontSize":"small","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group product-top-box" style="margin-top:10px"><!-- wp:post-terms {"term":"product_cat","className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500"}}} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"product-rating","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:post-title {"textAlign":"left","isLink":true,"className":"product-card-title","style":{"spacing":{"margin":{"bottom":"0rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price-box","textColor":"secondary","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-single-btn","style":{"spacing":{"margin":{"top":"10px"}}}} -->
<div class="wp-block-buttons product-single-btn" style="margin-top:10px"><!-- wp:button {"textColor":"background","style":{"border":{"radius":"3px","width":"0px","style":"none"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}},"typography":{"fontSize":"15px","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-collection {"queryId":16,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[16]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/by-category","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-card-boxes"} -->
<div class="wp-block-woocommerce-product-collection product-card-boxes"><!-- wp:woocommerce/product-template -->
<!-- wp:group {"className":"product-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-img-box"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} /-->

<!-- wp:post-terms {"term":"product_tag","className":"product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":{"bottomRight":"15px"}},"spacing":{"padding":{"top":"8px","bottom":"12px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"backgroundColor":"primary","textColor":"background"} /-->

<!-- wp:group {"className":"heart-cart-img","style":{"spacing":{"blockGap":"16px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group heart-cart-img" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"product-card-btn","fontSize":"small","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group product-top-box" style="margin-top:10px"><!-- wp:post-terms {"term":"product_cat","className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500"}}} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"product-rating","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:post-title {"textAlign":"left","isLink":true,"className":"product-card-title","style":{"spacing":{"margin":{"bottom":"0rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price-box","textColor":"secondary","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-single-btn","style":{"spacing":{"margin":{"top":"10px"}}}} -->
<div class="wp-block-buttons product-single-btn" style="margin-top:10px"><!-- wp:button {"textColor":"background","style":{"border":{"radius":"3px","width":"0px","style":"none"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}},"typography":{"fontSize":"15px","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-collection {"queryId":15,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[16]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/by-category","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-card-boxes"} -->
<div class="wp-block-woocommerce-product-collection product-card-boxes"><!-- wp:woocommerce/product-template -->
<!-- wp:group {"className":"product-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-img-box"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} /-->

<!-- wp:post-terms {"term":"product_tag","className":"product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":{"bottomRight":"15px"}},"spacing":{"padding":{"top":"8px","bottom":"12px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"backgroundColor":"primary","textColor":"background"} /-->

<!-- wp:group {"className":"heart-cart-img","style":{"spacing":{"blockGap":"16px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group heart-cart-img" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"product-card-btn","fontSize":"small","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group product-top-box" style="margin-top:10px"><!-- wp:post-terms {"term":"product_cat","className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500"}}} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"product-rating","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:post-title {"textAlign":"left","isLink":true,"className":"product-card-title","style":{"spacing":{"margin":{"bottom":"0rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price-box","textColor":"secondary","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-single-btn","style":{"spacing":{"margin":{"top":"10px"}}}} -->
<div class="wp-block-buttons product-single-btn" style="margin-top:10px"><!-- wp:button {"textColor":"background","style":{"border":{"radius":"3px","width":"0px","style":"none"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}},"typography":{"fontSize":"15px","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-collection {"queryId":14,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[16]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/by-category","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-card-boxes"} -->
<div class="wp-block-woocommerce-product-collection product-card-boxes"><!-- wp:woocommerce/product-template -->
<!-- wp:group {"className":"product-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-img-box"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} /-->

<!-- wp:post-terms {"term":"product_tag","className":"product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":{"bottomRight":"15px"}},"spacing":{"padding":{"top":"8px","bottom":"12px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"backgroundColor":"primary","textColor":"background"} /-->

<!-- wp:group {"className":"heart-cart-img","style":{"spacing":{"blockGap":"16px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group heart-cart-img" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"product-card-btn","fontSize":"small","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group product-top-box" style="margin-top:10px"><!-- wp:post-terms {"term":"product_cat","className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500"}}} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"product-rating","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:post-title {"textAlign":"left","isLink":true,"className":"product-card-title","style":{"spacing":{"margin":{"bottom":"0rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price-box","textColor":"secondary","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-single-btn","style":{"spacing":{"margin":{"top":"10px"}}}} -->
<div class="wp-block-buttons product-single-btn" style="margin-top:10px"><!-- wp:button {"textColor":"background","style":{"border":{"radius":"3px","width":"0px","style":"none"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}},"typography":{"fontSize":"15px","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-collection {"queryId":13,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[16]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/by-category","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-card-boxes"} -->
<div class="wp-block-woocommerce-product-collection product-card-boxes"><!-- wp:woocommerce/product-template -->
<!-- wp:group {"className":"product-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-img-box"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} /-->

<!-- wp:post-terms {"term":"product_tag","className":"product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":{"bottomRight":"15px"}},"spacing":{"padding":{"top":"8px","bottom":"12px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"backgroundColor":"primary","textColor":"background"} /-->

<!-- wp:group {"className":"heart-cart-img","style":{"spacing":{"blockGap":"16px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group heart-cart-img" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"product-card-btn","fontSize":"small","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group product-top-box" style="margin-top:10px"><!-- wp:post-terms {"term":"product_cat","className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500"}}} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"product-rating","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:post-title {"textAlign":"left","isLink":true,"className":"product-card-title","style":{"spacing":{"margin":{"bottom":"0rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price-box","textColor":"secondary","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-single-btn","style":{"spacing":{"margin":{"top":"10px"}}}} -->
<div class="wp-block-buttons product-single-btn" style="margin-top:10px"><!-- wp:button {"textColor":"background","style":{"border":{"radius":"3px","width":"0px","style":"none"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}},"typography":{"fontSize":"15px","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-collection {"queryId":12,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[16]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/by-category","hideControls":["inherit","hand-picked","filterable"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-card-boxes"} -->
<div class="wp-block-woocommerce-product-collection product-card-boxes"><!-- wp:woocommerce/product-template -->
<!-- wp:group {"className":"product-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-img-box"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} /-->

<!-- wp:post-terms {"term":"product_tag","className":"product-tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":{"bottomRight":"15px"}},"spacing":{"padding":{"top":"8px","bottom":"12px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"backgroundColor":"primary","textColor":"background"} /-->

<!-- wp:group {"className":"heart-cart-img","style":{"spacing":{"blockGap":"16px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group heart-cart-img" style="margin-top:0px;margin-bottom:0px"><!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"product-card-btn","fontSize":"small","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group product-top-box" style="margin-top:10px"><!-- wp:post-terms {"term":"product_cat","className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500"}}} /-->

<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"className":"product-rating","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:post-title {"textAlign":"left","isLink":true,"className":"product-card-title","style":{"spacing":{"margin":{"bottom":"0rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","className":"product-price-box","textColor":"secondary","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-single-btn","style":{"spacing":{"margin":{"top":"10px"}}}} -->
<div class="wp-block-buttons product-single-btn" style="margin-top:10px"><!-- wp:button {"textColor":"background","style":{"border":{"radius":"3px","width":"0px","style":"none"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}},"typography":{"fontSize":"15px","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<?php } else { ?>

<!-- wp:group {"className":"product-section wow zoomIn","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group product-section wow zoomIn"><!-- wp:group {"className":"product-head-box wow zoomIn","style":{"spacing":{"margin":{"bottom":"40px"},"padding":{"bottom":"10px"}}},"layout":{"type":"constrained","contentSize":"25%"}} -->
<div class="wp-block-group product-head-box wow zoomIn" style="margin-bottom:40px;padding-bottom:10px"><!-- wp:heading {"textAlign":"center","level":3,"className":"product-section-title","style":{"typography":{"fontSize":"28px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontFamily":"mansalva"} -->
<h3 class="wp-block-heading has-text-align-center product-section-title has-secondary-color has-text-color has-link-color has-mansalva-font-family" style="font-size:28px;font-style:normal;font-weight:400;text-transform:capitalize"><?php echo esc_html__( 'our signature dishes', 'vw-cloud-kitchen' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"product-sec-para","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.3"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"primary"} -->
<p class="has-text-align-center product-sec-para has-primary-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:0px;font-size:16px;font-style:normal;font-weight:500;line-height:1.3"><?php echo esc_html__( 'Crafted with love, cooked to perfection, and delivered hot.', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-cont-box","layout":{"type":"default"}} -->
<div class="wp-block-group product-cont-box"><!-- wp:group {"className":"main-tab","style":{"spacing":{"margin":{"bottom":"45px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group main-tab" style="margin-bottom:45px"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"15px","left":"30px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'starters', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'main course', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'bowls', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'desserts', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'beverages', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"tab-title","style":{"color":{"background":"#00000000"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"normal","fontWeight":"600"},"border":{"width":"0px","style":"none","radius":"3px"},"spacing":{"padding":{"left":"30px","right":"30px","top":"4px","bottom":"4px"}}}} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-primary-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:3px;background-color:#00000000;padding-top:4px;padding-right:30px;padding-bottom:4px;padding-left:30px;font-size:16px;font-style:normal;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'combos', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"product-cont-inne-box","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-cont-inne-box"><!-- wp:column {"width":"25%","className":"product-left-box"} -->
<div class="wp-block-column product-left-box" style="flex-basis:25%"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/product-banner.png","id":64,"dimRatio":0,"isUserOverlayColor":true,"minHeight":470,"sizeSlug":"large","align":"center","className":"product-banner","style":{"border":{"radius":{"topLeft":"0px","bottomRight":"0px","topRight":"30px","bottomLeft":"30px"}},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"0px","right":"0px"}}},"layout":{"type":"constrained","contentSize":"60%"}} -->
<div class="wp-block-cover aligncenter product-banner" style="border-top-left-radius:0px;border-top-right-radius:30px;border-bottom-left-radius:30px;border-bottom-right-radius:0px;padding-top:15px;padding-right:0px;padding-bottom:15px;padding-left:0px;min-height:470px"><img class="wp-block-cover__image-background wp-image-64 size-large" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-banner.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Enjoy 25% OFF your first CloudBite meal — delivered fresh to your door!', 'vw-cloud-kitchen' ); ?></h5>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-discount","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"border":{"radius":"100px"}},"backgroundColor":"primary","layout":{"type":"default"}} -->
<div class="wp-block-group product-discount has-primary-background-color has-background" style="border-radius:100px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}}} -->
<p class="has-text-align-center" style="font-size:30px;font-style:normal;font-weight:600;line-height:1">25%</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600","lineHeight":"1"},"spacing":{"margin":{"top":"8px","bottom":"0px"}}}} -->
<p class="has-text-align-center" style="margin-top:8px;margin-bottom:0px;font-size:18px;font-style:normal;font-weight:600;line-height:1;text-transform:capitalize"><?php echo esc_html__( 'off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"75%","className":"product-right-box"} -->
<div class="wp-block-column product-right-box" style="flex-basis:75%"><!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"className":"product-card-boxes","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-card-boxes"><!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":72,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img1.png" alt="" class="wp-image-72" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'starters', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":151,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img2.png" alt="" class="wp-image-151" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'starters', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'Cheesy Veg Burger', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":152,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img3.png" alt="" class="wp-image-152" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'starters', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'Strawberry Punch', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"className":"product-card-boxes","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-card-boxes"><!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":155,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img4.png" alt="" class="wp-image-155" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Main Course', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":156,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img5.png" alt="" class="wp-image-156" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Main Course', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":157,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img6.png" alt="" class="wp-image-157" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Main Course', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"className":"product-card-boxes","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-card-boxes"><!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":158,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img7.png" alt="" class="wp-image-158" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Bowls', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":159,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img8.png" alt="" class="wp-image-159" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Bowls', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":160,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img9.png" alt="" class="wp-image-160" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Bowls', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"className":"product-card-boxes","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-card-boxes"><!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":161,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img10.png" alt="" class="wp-image-161" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Desserts', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":162,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img1.png" alt="" class="wp-image-162" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Desserts', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":163,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img4.png" alt="" class="wp-image-163" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Desserts', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"className":"product-card-boxes","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-card-boxes"><!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":164,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img3.png" alt="" class="wp-image-164" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Beverages', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":165,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img7.png" alt="" class="wp-image-165" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Beverages', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":166,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img5.png" alt="" class="wp-image-166" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Beverages', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"tab-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group tab-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"className":"product-card-boxes","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns product-card-boxes"><!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":167,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img10.png" alt="" class="wp-image-167" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Combos', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":168,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img6.png" alt="" class="wp-image-168" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Combos', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"product-card"} -->
<div class="wp-block-column product-card"><!-- wp:group {"className":"product-img-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group product-img-box"><!-- wp:image {"id":169,"width":"auto","height":"350px","sizeSlug":"full","linkDestination":"none","className":"product-img","style":{"border":{"radius":{"topLeft":"0px","topRight":"25px","bottomRight":"0px","bottomLeft":"25px"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border product-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product-img8.png" alt="" class="wp-image-169" style="border-top-left-radius:0px;border-top-right-radius:25px;border-bottom-left-radius:25px;border-bottom-right-radius:0px;width:auto;height:350px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"product-tag","style":{"typography":{"textTransform":"uppercase","fontSize":"12px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0px"}},"border":{"radius":{"bottomRight":"15px"}}},"backgroundColor":"primary","textColor":"background"} -->
<p class="product-tag has-background-color has-primary-background-color has-text-color has-background has-link-color" style="border-bottom-right-radius:15px;margin-top:0px;padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px;font-size:12px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( '20% off', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":147,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none","className":"heart-cart-img","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<figure class="wp-block-image size-full is-resized heart-cart-img" style="margin-top:0px;margin-bottom:0px"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/heart-cart.png" alt="" class="wp-image-147" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-top-box","style":{"spacing":{"margin":{"top":"12px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group product-top-box" style="margin-top:12px"><!-- wp:paragraph {"className":"product-cat","style":{"color":{"text":"#a7a7a7"},"elements":{"link":{"color":{"text":"#a7a7a7"}}},"typography":{"fontSize":"13px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}}} -->
<p class="product-cat has-text-color has-link-color" style="color:#a7a7a7;font-size:13px;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Combos', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":96,"width":"auto","height":"18px","sizeSlug":"full","linkDestination":"none","className":"product-rating"} -->
<figure class="wp-block-image size-full is-resized product-rating"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/rating.png" alt="" class="wp-image-96" style="width:auto;height:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"product-mid-box","style":{"spacing":{"margin":{"top":"10px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-mid-box" style="margin-top:10px"><!-- wp:heading {"level":6,"className":"product-card-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"normal","fontWeight":"700"}},"textColor":"secondary"} -->
<h6 class="wp-block-heading product-card-title has-secondary-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'cheesy pizza', 'vw-cloud-kitchen' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"product-price-box","style":{"spacing":{"blockGap":"10px","margin":{"top":"0px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","verticalAlignment":"bottom"}} -->
<div class="wp-block-group product-price-box" style="margin-top:0px"><!-- wp:paragraph {"className":"price-sale","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="price-sale has-secondary-color has-text-color has-link-color" style="font-size:22px;font-style:normal;font-weight:500;line-height:1"><?php echo esc_html__( '$14', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"pricee-reg","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"textDecoration":"line-through","fontSize":"15px","fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"textColor":"secondary"} -->
<p class="pricee-reg has-secondary-color has-text-color has-link-color" style="font-size:15px;font-style:normal;font-weight:400;line-height:1;text-decoration:line-through"><?php echo esc_html__( '$19', 'vw-cloud-kitchen' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"product-card-btn","style":{"spacing":{"margin":{"top":"12px"}}}} -->
<div class="wp-block-buttons product-card-btn" style="margin-top:12px"><!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"3px"},"typography":{"fontSize":"15px","textTransform":"capitalize"},"spacing":{"padding":{"left":"30px","right":"30px","top":"5px","bottom":"5px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background has-custom-font-size wp-element-button" href="#" style="border-radius:3px;padding-top:5px;padding-right:30px;padding-bottom:5px;padding-left:30px;font-size:15px;text-transform:capitalize"><?php echo esc_html__( 'order now', 'vw-cloud-kitchen' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<?php } ?>