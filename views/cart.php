<?php
require_once __DIR__ . '/../utilities/getProductById.php';

if (!isset($_SESSION['cart'])) {
    echo 'No hay productos en el carrito';
} else {
    print_r($_SESSION['cart']);
}
