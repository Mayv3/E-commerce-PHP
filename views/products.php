<?php
require ('./utilities/getAllProducts.php')
    ?>

<section class="py-5">
    <h1>Productos</h1>
    <div class="container w-100 mt-5">
        <ul class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center list-unstyled">
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