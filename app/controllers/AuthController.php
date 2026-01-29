<?php
session_start();
require_once "../models/User.php";

if (isset($_POST['login'])) {
    $result = User::login($_POST['username'], $_POST['password']);
    if ($result->num_rows > 0) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $_POST['username'];
        header("Location: ../../index.php");
    } else {
        header("Location: ../views/auth/login.php?error=1");
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../views/auth/login.php");
}
