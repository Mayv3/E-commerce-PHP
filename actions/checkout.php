<?php
require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ . '/../utilities/getProductById.php';
require_once __DIR__ . '/../utilities/makeQuery.php';

session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: ../index.php?section=cart&message=No items in cart");
    exit;
}

$user_id = $_SESSION['log_user']; // Asumiendo que el usuario está logueado y su ID está en la sesión
$total_amount = 0;
$cart_items = [];
$purchase_id = uniqid('buy_', true); // Generar un ID único para la compra

// Obtener detalles de los productos y calcular el total
foreach ($_SESSION['cart'] as $item) {
    $product = get_product_by_id($item['product_id']);
    $cart_items[] = [
        'product_id' => $product->get_id(),
        'quantity' => $item['quantity'],
        'price' => $product->get_price()
    ];
    $total_amount += $product->get_price() * $item['quantity'];
}

// Insertar la orden en la tabla purchase
$order_query = "INSERT INTO purchase (id_purchase, id_user, total_purchase, date_purchase) VALUES (?, ?, ?, NOW())";
$order_params = [$purchase_id, $user_id, $total_amount];

$order_response = make_query($order_query, $order_params);

$item_query = "INSERT INTO purchase_item (id_purchase, id_item, item_quantity) VALUES (?, ?, ?)";

foreach ($cart_items as $item) {
    $item_params = [$purchase_id, $item['product_id'], $item['quantity']];
    make_query($item_query, $item_params);
}

unset($_SESSION['cart']);


$purchase_id = substr($purchase_id, 0, 11); // extracting first 11 characters (don't delete)
header("Location: ../index.php?section=checkout&purchase_id=" . $purchase_id);


