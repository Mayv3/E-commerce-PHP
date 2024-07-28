<?php
require_once __DIR__ . '/../utilities/getProductById.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo 'No hay productos en el carrito';
} else {
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Imagen</th>';
    echo '<th>Nombre del Producto</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Precio</th>';
    echo '<th>Total</th>';
    echo '<th>Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $totalPrice = 0;

    foreach ($_SESSION['cart'] as $item) {
        $product = get_product_by_id($item['product_id']);

        if ($product) {
            $productTotal = $product->get_price() * $item['quantity'];
            $totalPrice += $productTotal;

            echo '<tr>';
            echo '<td><img src="img/' . $product->get_image() . '" alt="' . $product->get_name() . '" class="img-fluid cart-image"></td>';
            echo '<td>' . $product->get_name() . '</td>';
            echo '<td>' . $item['quantity'] . '</td>';
            echo '<td>' . $product->get_price() . '</td>';
            echo '<td>' . $productTotal . '</td>';
            echo '<td>';
            echo '<form method="post" action="utilities/deleteProduct.php">';
            echo '<input type="hidden" name="product_id" value="' . $product->get_id() . '">';
            echo '<input type="submit" value="Eliminar" class="btn btn-danger">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
    }
    echo '<tr>';
    echo '<td colspan="5">Total</td>';
    echo '<td>' . $totalPrice . '</td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '<div class="text-center">';
    echo '<form method="post" action="utilities/checkout.php">';
    echo '<input type="submit" value="Comprar" class="btn btn-success">';
    echo '</form>';
    echo '</div>';
}