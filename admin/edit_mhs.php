<?php require("layout_admin/header.php") ?>
<?php
$id_mhs = $_GET['id'];
$data_mhs = select_one("SELECT * from mahasiswa WHERE id=$id_mhs");
if (isset($_POST['submit_edit'])) {
    $flashdata = edit_mahasiswa($id_mhs, $data_mhs, $_POST);
    $data_mhs = select_one("SELECT * from mahasiswa WHERE id=$id_mhs");
}

$prodi = select_all("SELECT p.* from prodi p ORDER BY p.kode_prodi ASC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "admin/dashboard.php" ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
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
                            <h3 class="card-title">Form Edit Mahasiswa</h3>

                            <div class="card-tools">
                                <a href="<?= BASE_URL . 'admin/data_mhs.php' ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?= BASE_URL . 'admin/edit_mhs.php?id=' . $data_mhs['id'] ?>" class="form-horizontal" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inp_nim" class="col-sm-2 col-form-label">NIM</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_mhs['nim']) ? $data_mhs['nim'] : '' ?>" data-inputmask='"mask": "99999999"' data-mask class="form-control" name="nim" id="inp_nim" placeholder="NIM Mahasiswa" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_mhs['nama']) ? $data_mhs['nama'] : '' ?>" class="form-control" name="nama" id="inp_nama" placeholder="Nama Mahasiswa" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_prodi" class="col-sm-2 col-form-label">Prodi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="prodi" id="inp_prodi" style="width: 100%;" required>
                                            <option selected="selected" value="">-- Pilih Prodi --</option>
                                            <?php
                                            $kode_prodi = isset($data_mhs['kode_prodi']) ? $data_mhs['kode_prodi'] : '';
                                            foreach ($prodi as $p) {
                                                $selected = '';
                                                if (!empty($kode_prodi)) {
                                                    if ($kode_prodi == $p['kode_prodi']) {
                                                        $selected = 'selected';
                                                    }
                                                }
                                                echo '<option value="' . $p['kode_prodi'] . '" ' . $selected . '>' . $p['nama_prodi'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_mhs['no_telepon']) ? $data_mhs['no_telepon'] : '' ?>" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask name="no_telepon" id="inp_no_telepon" placeholder="No Telepon Mahasiswa" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="<?= isset($data_mhs['email']) ? $data_mhs['email'] : '' ?>" name="email" id="inp_email" placeholder="Email Mahasiswa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inp_alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="inp_alamat" placeholder="Alamat Lengkap"><?= isset($data_mhs['alamat']) ? $data_mhs['alamat'] : '' ?></textarea>
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
        $("#nav-mahasiswa").addClass("active");
    });
</script>
<?php require("layout_admin/footer.php") ?>