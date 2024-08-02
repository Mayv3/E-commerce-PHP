<?php
require_once __DIR__ . '/../utilities/getProductById.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])): ?>
    <p class="text-dark">No hay productos en el carrito</p>
<?php else: ?>
    <div>
        <h1 class="text-center">Tu carrito</h1>
        <ul class="m-0 p-0 ul-cart list-group">
            <?php
            $totalPrice = 0;

            foreach ($_SESSION['cart'] as $item):
                $product = get_product_by_id($item['product_id']);
                if ($product):
                    $productTotal = $product->get_price() * $item['quantity'];
                    $totalPrice += $productTotal;
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center text-cart">
                            <img src="img/<?= $product->get_image() ?>" alt="<?= $product->get_name() ?>" class="cart-image">
                            <div class="ms-3 ">
                                <div class="fw-bold"><?= $product->get_name() ?></div>
                                <span>Cantidad: <?= $item['quantity'] ?></span>
                            </div>
                        </div>
                        <p class="badge bg-primary rounded mx-2 p-2 price-cart">$<?= $productTotal ?></p>
                        <form method="post" action="utilities/deleteProduct.php">
                            <input type="hidden" name="product_id" value="<?= $product->get_id() ?>">
                            <input type="submit" value="Eliminar" class="btn-delete">
                        </form>
                    </li>
                <?php endif;
            endforeach; ?>
        </ul>
        <div class="d-flex justify-content-between align-items-center mt-2 mx-3">
            <span class="fs-3">Total</span>
            <strong class="fs-4">$<?= $totalPrice ?></strong>
        </div>
    </div>
    <div class="text-center mt-3">
        <form method="post" action="actions/checkout.php">
            <input type="submit" value="Finalizar Compra" class="btn btn-success btn-lg">
        </form>
    </div>
<?php endif; ?>