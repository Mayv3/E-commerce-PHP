<?php
require_once '../utilities/getAllProducts.php';
$products = get_all_products();
?>

<section>
    <h1>Admintracion de Productos</h1>
    <div class="mb-1"><a class="add-product-button primary-button" href="index.php?section=newProduct">+ Agregar un
            producto nuevo</a>
    </div>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>DESCRIPCION</th>
                <th>IMAGEN</th>
                <th>CATEGORIA</th>
                <th>DETALLE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td class="text-center align-middle"><?php echo $product->get_id(); ?></td>
                    <td class="text-center align-middle"><?php echo $product->get_name(); ?></td>
                    <td class="text-center align-middle">$<?php echo $product->get_price(); ?></td>
                    <td class="text-center align-middle"><?php echo $product->get_description(); ?></td>
                    <td class="text-center align-middle">
                        <img class="w-25 mx-auto d-block" src="../img/<?php echo $product->get_image(); ?>"
                            alt="<?php echo $product->get_name(); ?>">
                    </td>
                    <td class="text-center align-middle"><?php echo $product->get_category(); ?></td>
                    <td class="text-center align-middle"><?php echo $product->get_detail(); ?></td>
                    <td class="d-flex flex-column gap-2 justify-content-center">
                        <a class="primary-button text-center edit-button"
                            href='index.php?section=editProduct&id=<?php echo $product->get_id(); ?>'>Editar</a>
                        <button class="primary-button delete-button" id=<?php echo $product->get_id(); ?>>Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>