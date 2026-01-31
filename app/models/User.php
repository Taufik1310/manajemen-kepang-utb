<?php
require_once __DIR__ . "/../config/database.php";

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

    public static function find($id)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM users WHERE id='$id'");
        return $result->fetch_assoc();
    }
}
