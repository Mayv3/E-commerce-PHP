<?php
require_once "./models/Product.php";
function read_json_file($db): array|string
{
    if (file_exists($db)):
        $json_data = file_get_contents($db);
        $data = json_decode($json_data, true);
        return parse_data($data);
    else:
        return 'Error: El archivo no existe';
    endif;
}

// return Productos[]
function parse_data($data): array
{
    $parsed_data = [];
    //itera elementos y convierte a instancia de objeto

    foreach ($data as $key => $element) {
        $producto = new Product(
            $element['image'],
            $element['name'],
            $element['price'],
            $element['id'],
            $element['description'],
            $element['detail'],
        );
        array_push($parsed_data, $producto);
        //tambien puede usarse $parsed_data[] = $producto
    };

    return $parsed_data;
}

