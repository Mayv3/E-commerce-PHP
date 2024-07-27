<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product_id'] == $productId) {
                if ($item['quantity'] > 1) {
                    $_SESSION['cart'][$key]['quantity'] -= 1;
                } else {
                    unset($_SESSION['cart'][$key]);
                }
                break;
            }
        }

        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

header('Location: ../index.php?section=cart');
exit;
