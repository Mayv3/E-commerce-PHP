<?php
require_once __DIR__ . '/../../utilities/makeQuery.php';
require_once __DIR__ . '/../../utilities/getProductById.php';
session_start();

$id = $_GET['id'];

if ($id) {

    $product = get_product_by_id($id);
    if ($product) {
        $image = $product->get_image();
        unlink(__DIR__ . '/../../img/' . $image);
    }


    try {
        $query = 'DELETE FROM items WHERE id_item = ?';
        $response = make_query($query, [$id]);

        $_SESSION['message'] = 'Producto eliminado correctamente';
        $_SESSION['message_type'] = 'danger';

        header("Location: ../index.php?section=products");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
}

