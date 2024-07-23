<?php
require_once __DIR__ . '/../../E-commerce-PHP/bootstrap/autoload.php';
require_once __DIR__ . '/../../E-commerce-PHP/utilities/makeQuery.php';
require_once __DIR__ . '/../../E-commerce-PHP/utilities/userExistence.php';
session_start();

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$confirm = $_POST['confirm_password'];
$query = "INSERT INTO users (user_email, user_role, user_password) VALUES (?, ?, ?)";
$params = [$email, 2, $password];

if (!$password == $confirm) {
    $_SESSION['message'] = 'Las contraseñas no coinciden';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../index.php?section=register');
    exit;
}

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

