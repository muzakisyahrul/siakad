<?php
require_once "base.php";
require_once "query.php";

session_start();
// print_r($_SESSION['user']);
// exit;
if (!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'login.php');
}
