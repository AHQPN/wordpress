<?php
// Tải môi trường WordPress
require_once(dirname(__FILE__) . '/wp-load.php');

echo "Bắt đầu xóa toàn bộ sản phẩm WooCommerce...\n";

// Truy vấn lấy tất cả ID của sản phẩm (post_type = product hoặc product_variation)
$args = array(
    'post_type' => array('product', 'product_variation'),
    'posts_per_page' => -1,
    'post_status' => 'any',
    'fields' => 'ids',
);

$products = get_posts($args);

$count = 0;
if ($products) {
    foreach ($products as $product_id) {
        // Tham số thứ 2 là true để xóa vĩnh viễn (bypass thùng rác)
        wp_delete_post($product_id, true);
        $count++;
    }
}

echo "Đã xóa vĩnh viễn $count sản phẩm và biến thể.\n";
