<?php
require_once "koneksi.php";

function select_all($query)
{
    global  $koneksi;
    $result = mysqli_query($koneksi, $query);
    $data = array();
    if ($result) {
        $kolom = mysqli_fetch_fields($result);
        while ($d = mysqli_fetch_array($result)) {
            $arr = [];
            foreach ($kolom as $v) {
                $arr[$v->name] =  $d[$v->name];
            }
            $data[] = $arr;
        }
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

function insert_data($query)
{
    global  $koneksi;
    $result = mysqli_query($koneksi, $query);
    return $result;
}
