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
                $products = get_all_products(); // Obtener productos
                
                foreach ($products as $product) {
                    echo '<tr>';
                    echo '<td>' . $product->id . '</td>';
                    echo '<td>' . $product->name . '</td>';
                    echo '<td>' . $product->price . '</td>';
                    echo '<td>' . $product->description . '</td>';
                    echo '<td><img src="' . $product->image . '" alt="' . $product->name . '"></td>';
                    echo '<td>' . $product->detail . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
</main>