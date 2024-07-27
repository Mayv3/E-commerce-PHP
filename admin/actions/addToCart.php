<?php
require_once __DIR__ . '/../../bootstrap/autoload.php';
require_once __DIR__ . '/../../utilities/getProductById.php';

$product_id = $_POST['product_id'];
$product_quantity = $_POST['quantity'];

session_start();
if (isset($_SESSION['cart'])) {
    $productExists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $product_id) {
            $_SESSION['cart'][$key]['quantity'] += $product_quantity;
            $productExists = true;
            break;
        }
    }
    if (!$productExists) {
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'quantity' => $product_quantity,
        ];
    }
} else {
    $_SESSION['cart'] = [
        [
            'product_id' => $product_id,
            'quantity' => $product_quantity,
        ],
    ];
}

header("Location: ../../index.php?section=detail&id_producto=$product_id");
