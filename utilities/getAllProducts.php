<?php
require_once ('./models/Product.php');
require_once ('./connection.php');
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
    //itera elementos y convierte a instancia de objeto

    foreach ($data as $key => $element) {
        $producto = new Product(
            $element['image_url'],
            $element['item_name'],
            $element['item_price'],
            $element['id_item'],
            $element['item_description'],
            $element['detail_item'],
        );

        $parsed_data[] = $producto;
    }

    return $parsed_data;
}
