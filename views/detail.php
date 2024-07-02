<?php
require "./utilities/getProductById.php";

$id = isset($_GET['id_producto']) ? $_GET['id_producto'] : null;
$product = get_product_by_id($id);

if (isset($product)):
    ?>
    <div class="container px-4 px-lg-5 my-4 my-md-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 rounded" src="img/<?= $product->get_image() ?>"
                    alt="<?= $product->get_name() ?>"></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: <?= $product->get_id() ?></div>
                <h1 class="display-5 fw-bolder"><?= $product->get_name() ?></h1>
                <div class="fs-5 mb-5">
                    <span>$<?= $product->get_price() ?></span>
                    <br>
                    <span>Categoria: <?= $product->get_category() ?></span>
                </div>
                <p class="lead text-dark detail-product-client"><strong><?= $product->get_description() ?></strong></p>
                <p class="lead text-dark detail-product-client"><?= $product->get_detail() ?></p>
                <div class="d-flex">
                    <label for="inputQuantity" class="visually-hidden">Cantidad</label>
                    <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Comprar
                    </button>
                </div>
            </div>
        </div>
        <p class="fw-bold fs-3 mt-5">También podría interesarte</p>
        <?php require "./components/RandomList.php" ?>
    </div>
    <!-- if dont render the id render the error  si el id no existe renderiza error -->
<?php else: ?>
    <div class="d-flex flex-column p-5 align-items-center">
        <h2 class="text-center pb-3">El producto buscado no existe</h2>
        <a href="index.php?section=products" class="btn btn-primary">Ver productos</a>
    </div>
<?php endif ?>