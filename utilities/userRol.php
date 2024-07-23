<?php
function check_user_role($email)
{
    $user = new User();
    $user->set_by_email($email);
    return $user->get_user_role();
}
