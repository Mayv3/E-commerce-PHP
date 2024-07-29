<?php
$user = new User();
$user->set_by_id($_GET['id_user']);
$purchases = $user->get_user_purchases()
    ?>

<div class="mb-4">
    <h2 class="mb-3">Compras</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID de Compra</th>
                    <th>Total de Compra</th>
                    <th>Fecha de Compra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (!empty($purchases)) {
                    foreach ($purchases as $purchase) {
                        $purchase_id = htmlspecialchars($purchase['id_purchase']); // Asegurarse de que el ID esté escapado para evitar XSS
                        $total_purchase = htmlspecialchars($purchase['total_purchase']);
                        $date_purchase = htmlspecialchars($purchase['date_purchase']);
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $purchase_id; ?></td>
                            <td class="align-middle">$<?php echo $total_purchase; ?></td>
                            <td class="align-middle"><?php echo $date_purchase; ?></td>
                            <td class="align-middle"><a href="detalle_compra.php?id=<?php echo $purchase_id; ?>"
                                    class="btn px-2 py-2">Detalle</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">No tienes compras registradas.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>