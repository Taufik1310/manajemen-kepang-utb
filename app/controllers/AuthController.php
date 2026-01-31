<?php
session_start();
require_once "../models/User.php";

if (isset($_POST['login'])) {
    $result = User::login($_POST['username'], $_POST['password']);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        if (isset($_POST['remember'])) {
            setcookie(
                "remember_me",
                $user['id'],
                time() + (60 * 60 * 24 * 7),
                "/",
                "",
                false,
                true
            );
        }

        header("Location: ../../index.php");
        exit;
    } else {
        header("Location: ../views/auth/login.php?error=invalid");
        exit;
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie("remember_me", "", time() - 3600, "/");
    header("Location: ../views/auth/login.php");
    exit;
}
