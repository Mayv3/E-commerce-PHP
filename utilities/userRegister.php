<?php
require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ . '/makeQuery.php';
require_once __DIR__ . '/userExistence.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];
$query = "INSERT INTO users (user_email, user_role, user_password) VALUES (?, ?, ?)";

if ($password !== $confirm) {
    $_SESSION['message'] = 'Las contraseñas no coinciden';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../index.php?section=register');
    exit;
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$params = [$email, 2, $password];

if (!verify_existence($email)) {
    try {
        $result = make_query($query, $params);
        $_SESSION['message'] = 'Usuario agregado correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: ../index.php?section=login');
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = 'Error al registrar el usuario: ' . $e->getMessage();
        $_SESSION['message_type'] = 'danger';
        header('Location: ../index.php?section=register');
        exit;
    }
} else {
    $_SESSION['message'] = 'El email ya esta registrado';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../index.php?section=register');
}

