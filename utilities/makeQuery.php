<?php
require_once __DIR__ . ('/../models/Connection.php');

function make_query($query, $params = null)
{
    try {

        $db = new Connection();
        #stablish connection
        $connection = $db->get_connection();

        #making and executing query
        $PDOStatement = $connection->prepare($query);
        $PDOStatement->execute($params);
        $response = $PDOStatement->fetchAll();

        #close the connection
        $connection = null;
        return $response;

    } catch (Exception $e) {
        exit("Ocurrio un error conectando la base de datos: " . $e->getMessage());
    }
}
