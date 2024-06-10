<?php
require_once ('./models/Product.php');
require_once ('connection.php');
function get_product_by_id($id)
{
    #creates and executes query
    $QUERY = "SELECT * FROM items WHERE id_item=$id";
    $response = make_query($QUERY)[0];

    #creates a new 'Product' instance
    $product = new Product($response['image_url'], $response['item_name'], $response['item_price'], $response['id_item'], $response['item_description'], $response['detail_item']);

    return $product != null ? $product : false;
}