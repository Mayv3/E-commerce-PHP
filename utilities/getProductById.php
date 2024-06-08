<?php
require "readJsonFile.php";
function getProductById($id)
{
    $db = 'products.json';
    $data = readJsonFile($db);
    if (isset($data)):
        $resultado = array_filter($data, function ($producto) use ($id) {
            return $producto->id == $id;
        });
        if ($resultado):
            //reset para que retorne el primer elemento sin importar el indice
            return reset($resultado);
        endif;
    else:
        return false;
    endif;
}

