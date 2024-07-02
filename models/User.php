<?php

require_once __DIR__ . '/../utilities/makeQuery.php';

class User
{

    protected int $id_user;
    protected string $user_email;
    protected int $user_role;
    protected string $user_password;


    public function set_by_email($email_user)
    {

        $query = "select * from users where user_email = ?";
        $user = make_query($query, [$email_user])[0];

        if ($user != null):
            $this->id_user = $user['id_user'];
            $this->user_email = $user['user_email'];
            $this->user_role = $user['user_role'];
            $this->user_password = $user['user_password'];
        endif;

    }
    public function set_by_id($id_user)
    {

        $query = "select * from users where id_user = ?";
        $user = make_query($query, [$id_user])[0];

        if ($user != null):
            $this->id_user = $user['id_user'];
            $this->user_email = $user['user_email'];
            $this->user_role = $user['user_role'];
            $this->user_password = $user['user_password'];
        endif;

    }

    public function get_id_user()
    {
        return $this->id_user;
    }
    public function get_user_email()
    {
        return $this->user_email;
    }
    public function get_user_role()
    {
        return $this->user_role;
    }
    public function get_user_password()
    {
        return $this->user_password;
    }
}