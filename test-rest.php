<?php
require('wp-load.php');
wp_set_current_user(1);
$request = new WP_REST_Request('GET', '/wp/v2/menu-items');
$request->set_query_params(['menus' => 235]);
$response = rest_do_request($request);
echo json_encode($response->get_data()[0], JSON_PRETTY_PRINT);
