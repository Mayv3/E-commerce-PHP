<?php
require_once __DIR__ . '/../utilities/getProductById.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])): ?>
    <p class="text-dark">No hay productos en el carrito</p>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPrice = 0;

                foreach ($_SESSION['cart'] as $item):
                    $product = get_product_by_id($item['product_id']);
                    if ($product):
                        $productTotal = $product->get_price() * $item['quantity'];
                        $totalPrice += $productTotal;
                        ?>
                        <tr>
                            <td><img src="img/<?= $product->get_image() ?>" alt="<?= $product->get_name() ?>"
                                    class="img-fluid cart-image"></td>
                            <td><?= $product->get_name() ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= $product->get_price() ?></td>
                            <td><?= $productTotal ?></td>
                            <td>
                                <form method="post" action="utilities/deleteProduct.php">
                                    <input type="hidden" name="product_id" value="<?= $product->get_id() ?>">
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    <?php endif; endforeach; ?>
                <tr>
                    <td colspan="5">Total</td>
                    <td><?= $totalPrice ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <form method="post" action="actions/checkout.php">
            <input type="submit" value="Finalizar Compra" class="btn btn-success">
        </form>
    </div>
<?php endif; ?>