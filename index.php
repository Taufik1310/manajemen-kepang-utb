<?php
session_start();
require_once "app/config/config.php";

if (!isset($_SESSION['login'])) {
    header("Location: " . BASE_URL . "app/views/auth/login.php");
    exit;
}

header("Location: " . BASE_URL . "app/views/dashboard/index.php");
exit;
