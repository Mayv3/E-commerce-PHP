<?php

class Connection
{

    public const DB_HOST = "127.0.0.1";

    public const DB_USER = "root";

    public const DB_PASS = "";

    public const DB_NAME = "dw3_dicio_pereyra";

    public function get_connection(): PDO
    {
        $dsn = "mysql:host=" . self::DB_HOST . "; dbname=" . self::DB_NAME . ";charset=utf8mb4";
        try {

            $connection = new PDO($dsn, self::DB_USER, self::DB_PASS);

        } catch (Exception $e) {

            exit("Ocurrio un error conectando la base de datos: " . $e->getMessage());

        }
        return $connection;
    }


}