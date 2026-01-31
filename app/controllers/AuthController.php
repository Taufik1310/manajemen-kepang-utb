<?php
session_start();
require_once "../models/User.php";

if (isset($_POST['login'])) {
    $result = User::login($_POST['username'], $_POST['password']);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];

        header("Location: ../../index.php");
        exit;
    } else {
        header("Location: ../views/auth/login.php?error=invalid");
        exit;
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../views/auth/login.php");
}
