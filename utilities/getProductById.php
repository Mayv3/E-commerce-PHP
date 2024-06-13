<?php
require_once (__DIR__ . '/../models/Product.php');
require_once (__DIR__ . '/makeQuery.php');
function get_product_by_id($id)
{
    #creates and executes query
    $query = "SELECT * FROM items WHERE id_item= ?";
    $response = make_query($query, [$id])[0]; # we use [0] because 'make_query' is using fetchALL

    #creates a new 'Product' instance
    $product = new Product($response['image_url'], $response['item_name'], $response['item_price'], $response['id_item'], $response['item_description'], $response['detail_item'], $response['item_category']);

    return $product != null ? $product : false;
}