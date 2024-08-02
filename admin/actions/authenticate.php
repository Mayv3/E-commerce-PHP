<?php
require_once __DIR__ . '/../../bootstrap/autoload.php';
session_start();

$password = $_POST['password'];
$email = $_POST['email'];
$auth = new Authentication();
$auth_result = $auth->verify_credentials($email, $password);

if ($auth_result == true):
    $_SESSION['message'] = 'Sesion inciada correctamente';
    $_SESSION['message_type'] = 'success';
    $user = new User();

    $user->set_by_email($email);
    $rol = $user->get_user_role();

    if ($rol == '1') {
        header("Location: ../index.php?section=dashboard");
    } else {
        header("Location: ../../index.php?section=home");
    }

else:
    $_SESSION['message'] = 'Credenciales invalidas';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../index.php?section=login");
endif;
