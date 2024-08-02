<?php
$user = new User();
$user->set_by_id($_GET['id_user']);
$purchases = $user->get_user_purchases() ?>

<div class="mb-4 p-3 users">
    <h1 class="mb-3">Compras</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="text-center p w-25">ID</th>
                <th class="text-center p w-25">Fecha</th>
                <th class="text-center p w-25">Total</th>
                <th class="text-center p w-25">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($purchases)) {
                foreach ($purchases as $purchase) {
                    $purchase_id = htmlspecialchars($purchase['id_purchase']);
                    $total_purchase = htmlspecialchars($purchase['total_purchase']);
                    $date_purchase = htmlspecialchars($purchase['date_purchase']);
                    ?>
                    <tr class="align-middle">
                        <td class="text-center"><?php echo $purchase_id; ?></td>
                        <td class="text-center"><?php echo $date_purchase; ?></td>
                        <td class="text-center">$<?php echo $total_purchase; ?></td>
                        <td class="text-center"><a
                                href="../index.php?section=detailPurchase&id_purchase=<?php echo $purchase_id; ?>"
                                class="btn px-4 py-2">Detalle</a></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr class="text-center">
                    <td colspan="4">No tienes compras registradas.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>