<?php
require_once __DIR__ . '/../bootstrap/autoload.php';


$auth = new Authentication();
$user = $auth->get_session_user();
?>

<div>
    <h1 class="mb-4">Tu perfil:</h1>
    <div>
        <p class="h2">Email: <span class="fs-5"><?php echo $user->get_user_email(); ?></span></p>
        <p class="h2">Tipo de usuario: <span
                class="fs-5"><?php echo $user->get_user_role() == 1 ? 'Administrador' : 'Cliente'; ?></span></p>
    </div>
</div>