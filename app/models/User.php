<?php
require_once "../config/database.php";

class User
{
    public static function login($username, $password)
    {
        $db = Database::connect();
        $password = md5($password);
        return $db->query("SELECT * FROM users 
                           WHERE username='$username' 
                           AND password='$password'");
    }
}
