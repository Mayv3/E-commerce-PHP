<?php
require_once __DIR__ . '/makeQuery.php';
function get_product_by_id($id)
{
    #creates and executes query
    $query = "SELECT items.*, categories.category_name FROM items JOIN categories ON items.item_category = categories.id_category WHERE items.id_item = ?";
    $response = make_query($query, [$id]); # we use [0] because 'make_query' is using fetchALL

    if ($response):
        $response = $response[0];
        #creates a new 'Product' instance
        $product = new Product($response['image_url'], $response['item_name'], $response['item_price'], $response['id_item'], $response['item_description'], $response['detail_item'], $response['item_category'], $response['category_name']);
        return $product != null ? $product : false;
    endif;
}