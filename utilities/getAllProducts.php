<?php
require_once __DIR__ . '/makeQuery.php';

function get_all_products()
{
    try {

        #make query with join
        $query = make_query('SELECT items.*, categories.category_name FROM items JOIN categories ON items.item_category = categories.id_category');

        $products = [];

        #converts all query into a 'Product' instance
        if ($query !== null) {
            foreach ($query as $key => $element) {

                $producto = new Product(
                    $element['image_url'],
                    $element['item_name'],
                    $element['item_price'],
                    $element['id_item'],
                    $element['item_description'],
                    $element['detail_item'],
                    $element['category_name'],
                );

                $products[] = $producto;
            }
        }
        return $products;

    } catch (Exception $e) {

        echo "Ocurrio un error leyendo la base de datos: " . $e->getMessage();

    }
}