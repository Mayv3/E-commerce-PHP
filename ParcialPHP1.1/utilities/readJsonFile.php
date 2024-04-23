<?php
function readJsonFile ($db) : array | string {
    if (file_exists($db)) {
        //lee el json usando el fs
        $json_data = file_get_contents($db);
        //parsea el archivo a código php
        $data = json_decode($json_data, true);
        return $data;
    } else {
        return 'Error: No se pudo leer la base de datos';
    }
}

