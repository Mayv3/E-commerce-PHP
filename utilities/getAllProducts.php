<?php
require_once (__DIR__ . '/../models/Product.php');
require_once (__DIR__ . '/../connection.php');

function get_all_products()
{
    try {
        $query = 'SELECT * FROM items';
        $response = make_query($query);
        return parse_data($response);

    } catch (Exception $e) {

        echo "Ocurrio un error leyendo la base de datos: " . $e->getMessage();

    }
}

// return Productos[]
function parse_data($data): array
{
    $parsed_data = [];

    foreach ($data as $key => $element) {
        $producto = new Product(
            $element['image_url'],
            $element['item_name'],
            $element['item_price'],
            $element['id_item'],
            $element['item_description'],
            $element['detail_item'],
            $element['item_category'],
        );

        $parsed_data[] = $producto;
    }

    return $parsed_data;
}