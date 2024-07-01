<?php
session_start();
require_once __DIR__ . '/../../utilities/makeQuery.php';

$id = $_GET['id']; //obtained by url

$tittle = $_POST['tittle'];
$price = $_POST['price'];
$description = $_POST['description'];
$detail = $_POST['detail'];
$category = $_POST['category'];
$image = '';

$errors = [];

//Validate product name
if (empty($tittle)):
    $errors['tittle'] = 'El nombre del producto es obligatorio';
elseif (strlen($tittle) < 5):
    $errors['tittle'] = 'El nombre del producto debe tener al menos 5 caracteres';
endif;
//Validate product price
if (empty($price)):
    $errors['price'] = 'El precio del producto es obligatorio';
elseif ($price < 0):
    $errors['price'] = 'El precio del producto no puede ser negativo';
elseif ($price > 300000):
    $errors['price'] = 'El precio del producto no puede ser mayor a 300.000';
endif;

//Validate product description
if (empty($description)):
    $errors['description'] = 'La descripción del producto es obligatoria';
elseif (strlen($description) < 10):
    $errors['description'] = 'La descripción del producto debe tener al menos 10 caracteres';
endif;

//Validate product category
if (empty($category)):
    $errors['category'] = 'La categoría del producto es obligatoria';
endif;

//Validate product detail
if (empty($detail)):
    $errors['detail'] = 'El detalle del producto es obligatorio';
elseif (strlen($detail) < 10):
    $errors['detail'] = 'El detalle del producto debe tener al menos 10 caracteres';
endif;

//Validate if there are errors
if (count($errors) > 0):
    $_SESSION['errors'] = $errors;
    $_SESSION['message'] = 'Alguno de los datos del formulario no cumplen con lo requerido';
    $_SESSION['message_type'] = 'danger';
    $_SESSION['old-data'] = $_POST;
    header('Location: ../index.php?section=newProduct');
    exit;
endif;

//edit product in database
$query = "UPDATE items
          SET item_name = ?,
          item_price = ?,
          item_description = ?,
          detail_item = ?,
          item_category = ?,
          image_url = ?
          WHERE id_item = ?";
$params = [$tittle, $price, $description, $detail, $category, $image, $id];

print_r($id);

try {
    $result = make_query($query, $params);
    $_SESSION['message'] = 'Producto editado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: ../index.php?section=products');
    exit;
} catch (Exception $e) {
    $_SESSION['message'] = 'Error al agregar el producto: ' . $e->getMessage();
    $_SESSION['message_type'] = 'danger';
    header('Location: ../index.php?section=newProduct');
    exit;
}

