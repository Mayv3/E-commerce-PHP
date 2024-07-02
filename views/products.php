<?php
require ('./utilities/getAllProducts.php')
    ?>

<section class="py-3 w-100">
    <div class="container w-100 mt-3">
        <h1>Productos</h1>
        <ul class="row gx-3 gx-lg-3 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center list-unstyled">
            <?php
            $products = get_all_products();
            if (isset($products) && is_array($products)):
                foreach ($products as $product) {
                    echo $product->render();
                }
            else:
                echo "<h2>No se pudo cargar la lista de productos</h2>";
            endif;
            ?>
        </ul>
    </div>
</section>