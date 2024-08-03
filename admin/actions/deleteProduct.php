<?php
require_once __DIR__ . '/../../utilities/makeQuery.php';
require_once __DIR__ . '/../../utilities/getProductById.php';
require_once __DIR__ . '/../../bootstrap/autoload.php';
session_start();

$auth = new Authentication();

if (!$auth->is_loged()) {
    $_SESSION['message'] = '401: No estás autorizado a ingresar a esta sección.';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../index.php?section=login');
    exit();
}

$id = $_GET['id'];
if ($id) {
    $product = get_product_by_id($id);
    if ($product) {
        $image = $product->get_image();
        $image_path = __DIR__ . '/../../img/' . $image;
        if (file_exists($image_path)) {
            unlink($image_path);
        } else {
            $_SESSION['message'] = 'Imagen no encontrada.';
            $_SESSION['message_type'] = 'warning';
        }
    }

    try {
        $query = 'DELETE FROM purchase_item WHERE id_item = ?';
        $response = make_query($query, [$id]);

        $query = 'DELETE FROM items WHERE id_item = ?';
        $response = make_query($query, [$id]);

        $_SESSION['message'] = 'Producto y registros relacionados eliminados correctamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../index.php?section=products");
        exit();
    } catch (Exception $e) {
        echo "Ocurrió un error: " . $e->getMessage();
    }
}

