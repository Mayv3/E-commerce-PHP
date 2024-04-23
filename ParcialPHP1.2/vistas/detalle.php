<?php
require "./utilities/getProductoById.php";

$id = isset($_GET['id_producto']) ? $_GET['id_producto'] : null;
$producto = getProductoById($id);

if (isset($producto['id'])):
    ?>
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $producto['imagen'] ?>"
                    alt="<?= $producto['nombre'] ?>" /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: <?= $producto['id'] ?></div>
                <h1 class="display-5 fw-bolder"><?= $producto['nombre'] ?></h1>
                <div class="fs-5 mb-5">
                    <span>$<?= $producto['precio'] ?></span>
                </div>
                <p class="lead"><strong><?= $producto['descripcion'] ?></strong></>
                <p class="lead"><?= $producto['detalle'] ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Comprar
                    </button>
                </div>
            </div>
        </div>
        <p class="fw-bold fs-3 mt-5">Tambien podria interesarte</p>
        <?= require"./components/ListaRandom.php" ?>
    </div>

<?php else: ?>
    <div class="d-flex flex-column p-5 align-items-center">
        <h2 class="text-center pb-3">El producto buscado no existe</h2>
        <a href="index.php?seccion=productos" class="btn btn-primary">Ver productos</a>
    </div>
<?php endif ?>