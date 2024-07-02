<?php
require_once __DIR__ . '/../../models/Authentication.php';



$user_email = (new Authentication)->get_session_user();
?>

<main class="container">
    <section>
        <h1 class="mb-3">Panel de administrador de <span
                class="text-info"><?php echo $user_email->get_user_email() ?></span> </h1>
        <p class="text-dark">Te damos la bienvenida al panel de administracion. Aqui encontraras info</p>
    </section>
</main>