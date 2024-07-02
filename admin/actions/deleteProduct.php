<?php
require_once __DIR__ . '/../../utilities/makeQuery.php';
require_once __DIR__ . '/../../utilities/getProductById.php';
require_once __DIR__ . '/../../bootstrap/autoload.php';
session_start();


$auth = new Authentication();

//this action requires authorization, 
// so we check if the user is logged before actions
if (!$auth->is_loged()):

    $_SESSION['message'] = '401: No estas autorizado a ingresar a esta sección.';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../index.php?section=login');

endif;

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

