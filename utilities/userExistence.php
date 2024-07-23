<?php
require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ . '/makeQuery.php';

function verify_existence($email)
{
    $query = "SELECT * FROM users WHERE user_email = ?";
    $result = make_query($query, [$email]);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
