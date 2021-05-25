<?php
require_once "base.php";
require_once "query.php";

session_start();
// print_r($_SESSION['user']);
// exit;
if (!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'login.php?status=no_session');
}


function tambah_mahasiswa($input)
{
    $nim = $input['nim'];
    $nama = htmlspecialchars($input['nama']);
    $prodi = $input['prodi'];
    $no_telepon = str_replace("-", "", $input['no_telepon']);
    $email = htmlspecialchars($input['email']);
    $alamat = htmlspecialchars($input['alamat']);

    $cek_nim = select_one("SELECT COUNT(nim) as JUM FROM mahasiswa WHERE nim=$nim");
    if ($cek_nim['JUM'] > 0) {
        $response = ['type' => "error", 'message' => "NIM Sudah Ada Yang Memakai"];
    } else {
        $q_insert = "INSERT INTO mahasiswa(nim,nama,kode_prodi,no_telepon,email,alamat) 
                VALUES('$nim','$nama','$prodi','$no_telepon','$email','$alamat')";
        $insert = insert_data($q_insert);
        if ($insert) {
            $response = ['type' => "success", 'message' => "Tambah Data Berhasil"];
        } else {
            $response = ['type' => "error", 'message' => "Tambah Data Gagal"];
        }
    }
    return $response;
}

function hapus_mahasiswa($id)
{
    $q_delete = "DELETE FROM mahasiswa WHERE id=$id";
    // $deleted = delete_data($q_delete);
    $deleted = true;
    if ($deleted) {
        $response = ['type' => "success", 'message' => "Hapus Data Berhasil"];
    } else {
        $response = ['type' => "error", 'message' => "Hapus Data Gagal"];
    }
    return $response;
}
