<?php

require_once __DIR__ . '/../utilities/makeQuery.php';
session_start();
class Authentication
{
    function verify_credentials($email, $password) //just return boolean true or false
    {
        $query = 'SELECT * FROM users WHERE user_email = ?';
        $user_data = make_query($query, [$email]);

        //there is no user
        if ($user_data == null):
            return false;
        endif;

        $saved_pass = $user_data[0]['user_password'];

        //pass are different
        if (!password_verify($password, $saved_pass)):
            return false;
        endif;

        //sets the authenticated user in the session
        $_SESSION['log_user'] = $user_data[0]['id_user'];
        return true;
    }

    function logout()
    {
        unset($_SESSION['log_user']);
    }

    function is_loged(): bool
    {
        return isset($_SESSION['log_user']);
    }
}