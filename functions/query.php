<?php
require_once "koneksi.php";

function select_all($query)
{
    global  $koneksi;
    $result = mysqli_query($koneksi, $query);
    $data = array();
    if ($result) {
        $data = mysqli_fetch_array($result);
    }

    return $data;
}

function select_one($query)
{
    global  $koneksi;
    $result = mysqli_query($koneksi, $query);
    $data = array();
    if ($result) {
        $data = mysqli_fetch_assoc($result);
    }
    return $data;
}
