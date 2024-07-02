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
    header("Location: ../index.php?section=dashboard");
else:
    $_SESSION['message'] = 'Credenciales invalidas';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../index.php?section=login");
endif;
