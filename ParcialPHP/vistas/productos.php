<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php

            $json_data = file_get_contents('productos.json');
            $productos = json_decode($json_data, true);


            if (isset($productos) && is_array($productos['productos'])) {
                foreach ($productos['productos'] as $producto) {
                    echo '<div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">' . $producto['nombre'] . '</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">' . ($producto['precio'] + 5) . '</span> ' . $producto['precio'] . '
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>';
                }
            } else {
                echo "Error: No se pudo cargar la lista de productos.";
            }
            ?>
        </div>
</section>

