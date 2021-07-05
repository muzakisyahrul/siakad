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

function tambah_matkul($input)
{
    $nama = htmlspecialchars($input['nama']);
    $q_insert = "INSERT INTO matkul(nama) 
                VALUES('$nama')";
    $insert = insert_data($q_insert);
    if ($insert) {
        $response = ['type' => "success", 'message' => "Tambah Data Berhasil"];
    } else {
        $response = ['type' => "error", 'message' => "Tambah Data Gagal"];
    }

    return $response;
}

function edit_matkul($id, $input)
{
    $nama = htmlspecialchars($input['nama']);
    $q_update = "UPDATE matkul SET nama='$nama' WHERE id='$id'";
    $update = update_data($q_update);
    if ($update) {
        $response = ['type' => "success", 'message' => "Edit Data Berhasil"];
    } else {
        $response = ['type' => "error", 'message' => "Edit Data Gagal"];
    }
    return $response;
}

function tambah_dosen($input)
{
    $nip = $input['nip'];
    $nama = htmlspecialchars($input['nama']);
    $gelar_depan = $input['gelar_depan'];
    $gelar_belakang = $input['gelar_belakang'];
    $no_telepon = str_replace("-", "", $input['no_telepon']);
    $email = htmlspecialchars($input['email']);
    $alamat = htmlspecialchars($input['alamat']);

    $cek_nip = select_one("SELECT COUNT(nip) as JUM FROM dosen WHERE nip=$nip");
    if ($cek_nip['JUM'] > 0) {
        $response = ['type' => "error", 'message' => "NIP Sudah Ada Yang Memakai"];
    } else {
        $q_insert = "INSERT INTO dosen(nip,nama_dosen,gelar_depan,gelar_belakang,no_telepon,email,alamat) 
                VALUES('$nip','$nama','$gelar_depan','$gelar_belakang','$no_telepon','$email','$alamat')";
        $insert = insert_data($q_insert);
        if ($insert) {
            $response = ['type' => "success", 'message' => "Tambah Data Berhasil"];
        } else {
            $response = ['type' => "error", 'message' => "Tambah Data Gagal"];
        }
    }
    return $response;
}

function edit_dosen($id, $data_detail, $input)
{
    $nip = $input['nip'];
    $nama = htmlspecialchars($input['nama']);
    $gelar_depan = $input['gelar_depan'];
    $gelar_belakang = $input['gelar_belakang'];
    $no_telepon = str_replace("-", "", $input['no_telepon']);
    $email = htmlspecialchars($input['email']);
    $alamat = htmlspecialchars($input['alamat']);

    $cek_nip['JUM'] = 0;
    if ($data_detail['nip'] != $nip) {
        $cek_nip = select_one("SELECT COUNT(nip) as JUM FROM dosen WHERE nip=$nip");
    }
    if ($cek_nip['JUM'] > 0) {
        $response = ['type' => "error", 'message' => "NIP Sudah Ada Yang Memakai"];
    } else {
        $q_update = "UPDATE dosen SET nip = '$nip',nama_dosen='$nama',gelar_depan='$gelar_depan',
        gelar_belakang='$gelar_belakang',no_telepon = '$no_telepon',email='$email',alamat='$alamat' WHERE id='$id'";
        $update = update_data($q_update);
        if ($update) {
            $response = ['type' => "success", 'message' => "Edit Data Berhasil"];
        } else {
            $response = ['type' => "error", 'message' => "Edit Data Gagal"];
        }
    }
    return $response;
}


function hapus_mahasiswa($id)
{
    $q_delete = "DELETE FROM mahasiswa WHERE id=$id";
    $deleted = delete_data($q_delete);
    if ($deleted) {
        $response = ['type' => "success", 'message' => "Hapus Data Berhasil"];
    } else {
        $response = ['type' => "error", 'message' => "Hapus Data Gagal"];
    }
    return $response;
}

function hapus_dosen($id)
{
    $q_delete = "DELETE FROM dosen WHERE id=$id";
    $deleted = delete_data($q_delete);
    if ($deleted) {
        $response = ['type' => "success", 'message' => "Hapus Data Berhasil"];
    } else {
        $response = ['type' => "error", 'message' => "Hapus Data Gagal"];
    }
    return $response;
}

function hapus_matkul($id)
{
    $q_delete = "DELETE FROM matkul WHERE id=$id";
    $deleted = delete_data($q_delete);
    if ($deleted) {
        $response = ['type' => "success", 'message' => "Hapus Data Berhasil"];
    } else {
        $response = ['type' => "error", 'message' => "Hapus Data Gagal"];
    }
    return $response;
}

function edit_mahasiswa($id, $data_detail, $input)
{
    $nim = $input['nim'];
    $nama = htmlspecialchars($input['nama']);
    $prodi = $input['prodi'];
    $no_telepon = str_replace("-", "", $input['no_telepon']);
    $email = htmlspecialchars($input['email']);
    $alamat = htmlspecialchars($input['alamat']);
    $cek_nim['JUM'] = 0;
    if ($data_detail['nim'] != $nim) {
        $cek_nim = select_one("SELECT COUNT(nim) as JUM FROM mahasiswa WHERE nim=$nim");
    }
    if ($cek_nim['JUM'] > 0) {
        $response = ['type' => "error", 'message' => "NIM Sudah Ada Yang Memakai"];
    } else {
        $q_update = "UPDATE mahasiswa SET nim = '$nim',nama='$nama',kode_prodi='$prodi',
        no_telepon = '$no_telepon',email='$email',alamat='$alamat' WHERE id='$id'";
        $update = update_data($q_update);
        if ($update) {
            $response = ['type' => "success", 'message' => "Edit Data Berhasil"];
        } else {
            $response = ['type' => "error", 'message' => "Edit Data Gagal"];
        }
    }
    return $response;
}
