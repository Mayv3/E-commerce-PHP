<?php
require __DIR__ . '/../utilities/getPurhcaseItems.php';
$id_purchase = $_GET['id_purchase'];
$purchase_items = get_purchase_items($id_purchase);
$total = 0; //total buy value
foreach ($purchase_items as $item) {
    $total += $item['item_price'] * $item['item_quantity'];
}
?>

<div class="container mt-4">
    <h1 class="mb-4">Detalle de compra <?= htmlspecialchars($id_purchase) ?></h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Art.</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchase_items as $item): ?>
                <tr>
                    <td><?= $item['id_item'] ?></td>
                    <td><?= $item['item_name'] ?></td>
                    <td><?= $item['category_name'] ?></td>
                    <td><?= $item['item_description'] ?></td>
                    <td>$<?= number_format($item['item_price'], 2) ?></td>
                    <td><?= $item['item_quantity'] ?></td>
                    <td>$<?= number_format($item['item_quantity'] * $item['item_price'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-end"><strong>TOTAL:</strong></td>
                <td>$<?= number_format($total, 2) ?></td>
            </tr>
        </tfoot>
    </table>
</div>