<?php
$routes = [
    'home' => [],
    'products' => [],
    'detail' => [],
    'about' => [],
    'contact' => [],
];

$view = isset($_GET['section']) ? $_GET['section'] : 'home';

if (!isset($routes[$view])) {
    $view = '404';
}
