<?php
require_once "../functions/base.php";
session_start();
session_destroy();
header('Location: ' . BASE_URL . 'admin/dashboard.php');
