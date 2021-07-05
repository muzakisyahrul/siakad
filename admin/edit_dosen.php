<?php require("layout_admin/header.php") ?>
<?php
$id_dosen = $_GET['id'];
$data_dosen = select_one("SELECT * from dosen WHERE id=$id_dosen");
if (isset($_POST['submit_edit'])) {
    $flashdata = edit_dosen($id_dosen, $data_dosen, $_POST);
    $data_dosen = select_one("SELECT * from dosen WHERE id=$id_dosen");
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Dosen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "admin/dashboard.php" ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Dosen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Dosen</h3>

                            <div class="card-tools">
                                <a href="<?= BASE_URL . 'admin/data_dosen.php' ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?= BASE_URL . 'admin/edit_dosen.php?id=' . $data_dosen['id'] ?>" class="form-horizontal" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inp_nim" class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_dosen['nip']) ? $data_dosen['nip'] : '' ?>" data-inputmask='"mask": "9999999999999999"' data-mask class="form-control" name="nip" id="inp_nip" placeholder="NIP Dosen" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_dosen['nama_dosen']) ? $data_dosen['nama_dosen'] : '' ?>" class="form-control" name="nama" id="inp_nama" placeholder="Nama Dosen" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inp_nama" class="col-sm-2 col-form-label">Gelar Depan</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_dosen['gelar_depan']) ? $data_dosen['gelar_depan'] : '' ?>" class="form-control" name="gelar_depan" id="inp_gelar_depan" placeholder="Gelar Depan Dosen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_nama" class="col-sm-2 col-form-label">Gelar Belakang</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_dosen['gelar_belakang']) ? $data_dosen['gelar_belakang'] : '' ?>" class="form-control" name="gelar_belakang" id="inp_gelar_belakang" placeholder="Gelar Belakang Dosen">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inp_no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_dosen['no_telepon']) ? $data_dosen['no_telepon'] : '' ?>" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask name="no_telepon" id="inp_no_telepon" placeholder="No Telepon Mahasiswa" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="<?= isset($data_dosen['email']) ? $data_dosen['email'] : '' ?>" name="email" id="inp_email" placeholder="Email Mahasiswa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="inp_alamat" placeholder="Alamat Lengkap"><?= isset($data_dosen['alamat']) ? $data_dosen['alamat'] : '' ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" name="submit_edit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Data
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    $(function() {
        $("#nav-dosen").addClass("active");
    });
</script>
<?php require("layout_admin/footer.php") ?>