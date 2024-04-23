<?php
require "readJsonFile.php";
function getProductoById($id){
    $db = 'productos.json';
    $data = readJsonFile($db)['productos'];

    if (isset($data)):
        $resultado = array_filter($data,function($producto) use ($id){
            return $producto['id'] == $id;
        });
        //para que retorne el primer elemento sin importar el indice
        if ($resultado):
            return reset($resultado);
        endif;
    else:
        return false;
    endif;
}

