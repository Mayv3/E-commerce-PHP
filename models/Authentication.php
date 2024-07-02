<?php

require_once __DIR__ . '/../utilities/makeQuery.php';
require_once __DIR__ . '/User.php';

session_start();
class Authentication
{
    private $session_user;
    function verify_credentials($email, $password) //just return boolean true or false
    {
        $user = new User();
        $user->set_by_email($email);

        //there is no user
        if ($user == null):
            return false;
        endif;

        $saved_pass = $user->get_user_password();

        //pass are different
        if (!password_verify($password, $saved_pass)):
            return false;
        endif;

        //sets the authenticated user in the session
        $_SESSION['log_user'] = $user->get_id_user();
        return true;
    }

    function get_session_user()
    {
        if (!$this->is_loged()):
            return null;
        endif;

        if (!$this->session_user):
            $this->session_user = new User();
            //if there is no user this will be null, anyway should happend if there is a login action before
            $this->session_user->set_by_id($_SESSION['log_user']);
        endif;

        return $this->session_user;
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