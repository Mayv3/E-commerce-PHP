<?php
require_once '../utilities/getAllProducts.php';

$products = get_all_products();
?>
<section class="w-100 mt-5">
    <div class="px-4 py-2 container-admin-products">
        <div class="d-flex justify-content-center align-items-center flex-column w-100 text-center">
            <h1>Administración de Productos</h1>
            <a class="add-product-button primary-button mt-3 p-4 w-750 btn-add-product"
                href="index.php?section=newProduct">+
                Agregar un
                producto
                nuevo</a>
        </div>
        <?php if (count($products) > 0): ?>
            <ul class="p-0 row gap-3 justify-content-center">
                <?php foreach ($products as $product): ?>
                    <li class="my-5 bg-white rounded-3 shadow-lg col-sm-12 col-md-5 col-lg-3 p-0">
                        <img class="w-100 mx-auto d-block rounded-3 img-product-admin"
                            src="../img/<?php echo $product->get_image(); ?>" alt="<?php echo $product->get_name(); ?>">
                        <div class="p-4">
                            <p class="text-dark data-product"><span class="fw-bold">id:</span> <?php echo $product->get_id(); ?>
                            </p>
                            <p class="text-dark data-product name-product"><span class="fw-bold">Nombre:</span>
                                <?php echo $product->get_name(); ?></p>
                            <p class="text-dark data-product"><span class="fw-bold">Precio:</span>
                                $<?php echo $product->get_price(); ?></p>
                            <p class="text-dark data-product description-product"><span class="fw-bold">Descripción:</span>
                                <?php echo $product->get_description(); ?></p>
                            <p class="text-dark data-product"><span class="fw-bold">Categoría:</span>
                                <?php echo $product->get_category(); ?></p>
                            <p class="text-dark data-product detail-product"><span class="fw-bold">Detalle:</span>
                                <?php echo $product->get_detail(); ?></p>

                            <div class="d-flex justify-content-between">
                                <a class="primary-button text-center edit-button "
                                    href='index.php?section=editProduct&id=<?php echo $product->get_id(); ?>'>Editar</a>
                                <button class="primary-button delete-button" id=<?php echo $product->get_id(); ?>>Eliminar</button>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>