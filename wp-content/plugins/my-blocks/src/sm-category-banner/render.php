<?php
/**
 * Dynamic render for SM Category Banner.
 */

$height = isset( $attributes['height'] ) ? $attributes['height'] : '400px';
$opacity = isset( $attributes['overlayOpacity'] ) ? $attributes['overlayOpacity'] : 0.45;
$default_image = isset( $attributes['defaultImage'] ) ? $attributes['defaultImage'] : '';

$title = '';
$image_url = $default_image;

if ( is_product_category() || is_product_tag() ) {
    $queried_object = get_queried_object();
    $title = $queried_object->name;
    
    // Get thumbnail ID for category
    if ( is_product_category() ) {
        $thumbnail_id = get_term_meta( $queried_object->term_id, 'thumbnail_id', true );
        if ( $thumbnail_id ) {
            $image_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );
        }
    }
} elseif ( is_shop() ) {
    $title = woocommerce_page_title( false );
    // Optional: Get shop page featured image or keep default
} else {
    $title = get_the_archive_title();
}

$wrapper_attributes = get_block_wrapper_attributes( array(
    'class' => 'sm-category-banner alignfull',
    'style' => "height: {$height};"
) );
?>
<div <?php echo $wrapper_attributes; ?>>
    <?php if ( $image_url ) : ?>
        <img class="sm-cb-img" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
    <?php endif; ?>
    
    <div class="sm-cb-overlay" style="background-color: rgba(0,0,0,<?php echo esc_attr( $opacity ); ?>);"></div>
    
    <div class="sm-cb-content">
        <h1 class="sm-cb-title"><?php echo esc_html( $title ); ?></h1>
    </div>
</div>
