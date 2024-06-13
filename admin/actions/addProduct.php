<?php

require_once __DIR__ . '/../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $price = $_POST['price'];
    $descripcion = $_POST['description'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];

    $image = '';

    $query = "INSERT INTO items (item_name, item_price, item_description, detail_item, item_category, image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $params = [$titulo, $price, $descripcion, $detail, $category, $image];

    try {
        $result = make_query($query, $params);

    } catch (Exception $e) {
        echo "Error al agregar el producto: " . $e->getMessage();
    }
    header('Location: ../index.php?section=products');
    exit;
}