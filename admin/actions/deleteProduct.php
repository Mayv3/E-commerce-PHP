<?php
require_once __DIR__ . '/../../utilities/makeQuery.php';

$id = $_GET['id'];

if ($id) {

    try {
        $query = 'DELETE FROM items WHERE id_item = ?';
        $response = make_query($query, [$id]);

        header("Location: ../index.php?section=products");
    } catch (Exception $e) {

    }


}
