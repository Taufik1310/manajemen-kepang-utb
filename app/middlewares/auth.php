<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login']) && isset($_COOKIE['remember_me'])) {

    $userId = $_COOKIE['remember_me'];
    $user = User::find($userId);

    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: ../../views/auth/login.php");
    exit;
}
