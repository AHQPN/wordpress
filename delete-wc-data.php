<?php
/**
 * Destructive script to delete all WooCommerce products and categories.
 * Usage: Place this file in your WordPress root and visit: yoursite.com/delete-wc-data.php
 */

// Load WordPress
require_once( 'wp-load.php' );

// Check if user is administrator
if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'You do not have permission to run this script.' );
}

echo "<h1>Starting Deletion Process...</h1>";

// 1. Delete Products (including variations)
$products = get_posts( array(
    'post_type'      => array( 'product', 'product_variation' ),
    'post_status'    => 'any',
    'numberposts'    => -1,
    'fields'         => 'ids',
) );

if ( ! empty( $products ) ) {
    echo "<p>Deleting " . count( $products ) . " products...</p>";
    foreach ( $products as $product_id ) {
        wp_delete_post( $product_id, true ); // true = force delete (bypass trash)
    }
    echo "<p style='color:green;'>Products deleted successfully.</p>";
} else {
    echo "<p>No products found.</p>";
}

// 2. Delete Product Categories
$taxonomies = array( 'product_cat', 'product_tag', 'product_shipping_class' );
foreach ( $taxonomies as $taxonomy ) {
    $terms = get_terms( array(
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'fields'     => 'ids',
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        echo "<p>Deleting " . count( $terms ) . " terms from $taxonomy...</p>";
        foreach ( $terms as $term_id ) {
            wp_delete_term( $term_id, $taxonomy );
        }
        echo "<p style='color:green;'>$taxonomy deleted successfully.</p>";
    } else {
        echo "<p>No terms found for $taxonomy.</p>";
    }
}

// 3. Delete Product Attributes
if ( function_exists( 'wc_get_attribute_taxonomies' ) ) {
    $attributes = wc_get_attribute_taxonomies();
    if ( ! empty( $attributes ) ) {
        echo "<p>Deleting " . count( $attributes ) . " attributes...</p>";
        foreach ( $attributes as $attribute ) {
            wc_delete_attribute( $attribute->attribute_id );
        }
        echo "<p style='color:green;'>Attributes deleted successfully.</p>";
    }
}

echo "<h2>Process Finished!</h2>";
echo "<p>Please delete this file (delete-wc-data.php) from your server immediately for security.</p>";
