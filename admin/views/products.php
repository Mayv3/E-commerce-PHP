<?php

require_once '../utilities/getAllProducts.php';


?>

<main class="container">
    <section>
        <h1>Admintracion de Productos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>DESCRIPCION</th>
                    <th>IMAGEN</th>
                    <th>DETALLE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $products = get_all_products();

                foreach ($products as $product) {
                    echo '<tr>';
                    echo '<td>' . $product->get_id() . '</td>';
                    echo '<td>' . $product->get_name() . '</td>';
                    echo '<td>' . $product->get_price() . '</td>';
                    echo '<td>' . $product->get_description() . '</td>';
                    echo '<td><img class="w-75" src="' . $product->get_image() . '" alt="' . $product->get_name() . '"></td>';
                    echo '<td>' . $product->get_detail() . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
</main>