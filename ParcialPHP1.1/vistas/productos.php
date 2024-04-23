
<?php
require('./utilities/readJsonFile.php');
require('./components/Producto.php');
?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $db = 'productos.json';
            $productos = readJsonFile($db)['productos'];

            if (isset($productos) && is_array($productos)):
                foreach ($productos as $producto) {
                    echo Producto($producto);
                };
            else:
                echo "<h2>No se pudo cargar la lista de productos</h2>";
            endif;
            ?>
        </div>
    </div>
</section>
