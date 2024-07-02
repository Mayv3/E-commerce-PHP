<?php
$user_email = (new Authentication)->get_session_user();
?>
<section class="container text-center">
    <h1 class="mb-3">Panel de administrador
        <span class="text-info fs-5"><?php echo $user_email->get_user_email() ?></span>
    </h1>
    <p class="text-dark">Te damos la bienvenida al panel de administracion.
    <div>
        <a class="btn btn-primary border-0" href="index.php?section=products">Ir a Productos</a>
    </div>
</section>