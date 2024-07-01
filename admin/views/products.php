<?php
require_once '../utilities/getAllProducts.php';
$products = get_all_products();
?>

<section class="mx-5">
    <h1>Admintracion de Productos</h1>
    <div class="mb-1"><a href="index.php?section=newProduct">Agregar un producto nuevo</a></div>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>DESCRIPCION</th>
                <th>IMAGEN</th>
                <th>CATEGORIA</th>
                <th>DETALLE</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($products as $product) {
                echo '<tr>';
                echo '<td class="text-center align-middle">' . $product->get_id() . '</td>';
                echo '<td class="text-center align-middle">' . $product->get_name() . '</td>';
                echo '<td class="text-center align-middle">$' . $product->get_price() . '</td>';
                echo '<td class="text-center align-middle">' . $product->get_description() . '</td>';
                echo '<td class="text-center align-middle"><img class="w-50 mx-auto d-block" src="' . $product->get_image() . '" alt="' . $product->get_name() . '"></td>';
                echo '<td class="text-center align-middle">' . $product->get_category() . '</td>';
                echo '<td class="text-center align-middle">' . $product->get_detail() . '</td>';
                echo '</tr>';

                ;
            }
            ?>
        </tbody>
    </table>
</section>