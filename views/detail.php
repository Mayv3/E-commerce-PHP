<?php
require "./utilities/getProductById.php";

$id = isset($_GET['id_producto']) ? $_GET['id_producto'] : null;
$product = getProductById($id);

if (isset($product->id)):
    ?>
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $product->image ?>"
                    alt="<?= $product->name ?>" /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: <?= $product->id ?></div>
                <h1 class="display-5 fw-bolder"><?= $product->name ?></h1>
                <div class="fs-5 mb-5">
                    <span>$<?= $product->price ?></span>
                </div>
                <p class="lead"><strong><?= $product->description ?></strong></>
                <p class="lead"><?= $product->detail ?></p>
                <div class="d-flex">
                    <label for="quantity" class="visually-hidden">Cantidad</label>
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Comprar
                    </button>
                </div>
            </div>
        </div>
        <p class="fw-bold fs-3 mt-5">Tambien podria interesarte</p>
        <?= require "./components/RandomList.php" ?>
    </div>
    <!-- si el id no existe renderiza error -->
<?php else: ?>
    <div class="d-flex flex-column p-5 align-items-center">
        <h2 class="text-center pb-3">El producto buscado no existe</h2>
        <a href="index.php?section=products" class="btn btn-primary">Ver productos</a>
    </div>
<?php endif ?>