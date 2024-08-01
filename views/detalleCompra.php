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
    <ul class="list-group my-4">
        <?php foreach ($purchase_items as $item): ?>
            <li class="list-group-item">
                <div><strong>ID:</strong> <?= htmlspecialchars($item['id_item']) ?></div>
                <div><strong>Nombre:</strong> <?= htmlspecialchars($item['item_name']) ?></div>
                <div><strong>Categoria:</strong> <?= htmlspecialchars($item['category_name']) ?></div>
                <div><strong>Descripción:</strong> <?= htmlspecialchars($item['item_description']) ?></div>
                <div><strong>Precio:</strong> $<?= number_format($item['item_price'], 2) ?></div>
                <div><strong>Cantidad:</strong> <?= htmlspecialchars($item['item_quantity']) ?></div>
                <div><strong>Subtotal:</strong> $<?= number_format($item['item_quantity'] * $item['item_price'], 2) ?></div>
            </li>
        <?php endforeach; ?>
        <li class="list-group-item">
            <strong>TOTAL:</strong> $<?= number_format($total, 2) ?>
        </li>
    </ul>
</div>