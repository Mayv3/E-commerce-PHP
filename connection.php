<?php
const DB_SERVER = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "dw3_dicio_pereyra";
const DB_DSN = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

function make_query($query, $params = null)
{
    try {
        #stablish connection
        $connection = new PDO(DB_DSN, DB_USER, DB_PASS);

        #making and executing query
        $PDOStatement = $connection->prepare($query);
        $PDOStatement->execute($params);
        $response = $PDOStatement->fetchAll();
        #close the connection
        $connection = null;
        return $response;

    } catch (Exception $e) {
        echo "Ocurrio un error conectando la base de datos: " . $e->getMessage();
    }
}
