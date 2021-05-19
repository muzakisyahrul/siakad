<?php
require_once "base.php";
require_once "query.php";
// var_dump($_POST);
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'admin/dashboard.php');
}

if (isset($_GET['status'])) {
    if ($_GET['status'] == "no_session") {
        $error = true;
        $error_message = "Silakan Login Terlebih Dahulu";
    }
}

$input = $_POST;
if (isset($input['submit'])) {

    $username = $input['username'];
    $password = $input['password'];
    $user = select_one("SELECT p.*,u.username,u.password FROM pegawai p INNER JOIN user u ON u.id_pegawai=p.id WHERE username='$username'");
    if (!empty($user)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION["user"] = $user;
            // print_r($_SESSION['user']);
            // exit;
            header('Location: ' . BASE_URL . 'admin/dashboard.php');
        } else {
            $error = true;
            $error_message = "Password Yang Anda Masukkan Salah";
        }
    } else {
        $error = true;
        $error_message = "Username Yang Anda Masukkan Salah";
    }
}
