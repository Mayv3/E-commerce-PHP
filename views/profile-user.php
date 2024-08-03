<?php
require_once __DIR__ . '/../bootstrap/autoload.php';

$auth = new Authentication();
$user = $auth->get_session_user();
$purchases = $user->get_user_purchases()
    ?>
<div class="container mt-5">
    <div class="mb-4">
        <h1 class="mb-2">Tu perfil: <span class="fs-5"><?php echo $user->get_user_email(); ?></span></h1>
    </div>
    <div class="mb-4">
        <h2 class="mb-3">Tus Compras</h2>
        <ul class="list-group">
            <?php
            if (!empty($purchases)) {
                foreach (array_reverse($purchases) as $purchase) {
                    $purchase_id = htmlspecialchars($purchase['id_purchase']); // Asegurarse de que el ID esté escapado para evitar XSS
                    $total_purchase = htmlspecialchars($purchase['total_purchase']);
                    $date_purchase = htmlspecialchars($purchase['date_purchase']);
                    ?>
                    <li class="list-group-item d-flex justify-content-center align-items-center">
                        <p class="col-4 text-center text-black"><?php echo $date_purchase; ?></p>
                        <p class="col-4 text-center text-black">$<?php echo $total_purchase; ?></p>
                        <p class="col-4 text-center text-black"><a
                                href="index.php?section=detailPurchase&id_purchase=<?php echo $purchase_id; ?>"
                                class="btn px-2 py-2 ">Detalle</a>
                        </p>
                    </li>
                    <?php
                }
            } else {
                ?>
                <li class="list-group-item text-center">No tienes compras registradas.</li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>