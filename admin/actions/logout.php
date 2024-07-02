<?php
require_once __DIR__ . '/../../bootstrap/autoload.php';


$auth = new Authentication();

$auth->logout();

$_SESSION['$message'] = 'Gracias! Vuelva prontos';
$_SESSION['$message_type'] = 'success';

header("Location: ../index.php?section=login");


