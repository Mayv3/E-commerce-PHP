<?php
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../utilities/getProductById.php';

$product_id = $_POST['product_id'];
$product_quantity = $_POST['quantity'];

session_start();
$product = [
    'product_id' => $product_id,
    'quantity' => $product_quantity,
];

$_SESSION['cart'][] = $product;

header("Location: ../../index.php?section=detail&id_producto=$product_id");
