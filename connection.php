<?php
const DB_SERVER = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "dw3_dicio_pereyra";

const DB_DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

try {
    $connection = new PDO(DB_DSN, DB_USER, DB_PASS);

    echo "no explota";
} catch (Exception $e) {
    echo "Ocurrio un error conectando la base de datos" . $e->getMessage();
}

/*
$query = "SELECT * FROM categories";
$PDOStatement = $connection->prepare($query);
$PDOStatement->execute();

$datos = $PDOStatement->fetch();

print_r($datos);
*/