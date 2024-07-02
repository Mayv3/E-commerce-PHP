<?php

spl_autoload_register(function ($className) {
    $file_name = $className . '.php';

    $file_path = __DIR__ . '/../models/' . $file_name;

    require_once ($file_path);
});