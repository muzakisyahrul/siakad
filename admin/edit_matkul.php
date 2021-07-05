<?php require("layout_admin/header.php") ?>
<?php
$id_matkul = $_GET['id'];
$data_matkul = select_one("SELECT * from matkul WHERE id=$id_matkul");
if (isset($_POST['submit_edit'])) {
    $flashdata = edit_matkul($id_matkul, $_POST);
    $data_matkul = select_one("SELECT * from matkul WHERE id=$id_matkul");
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Mata Kuliah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "admin/dashboard.php" ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
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
                            <h3 class="card-title">Form Edit Mata Kuliah</h3>

                            <div class="card-tools">
                                <a href="<?= BASE_URL . 'admin/data_matkul.php' ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?= BASE_URL . 'admin/edit_matkul.php?id=' . $data_matkul['id'] ?>" class="form-horizontal" method="POST">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inp_nama" class="col-sm-2 col-form-label">Nama Matkul</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= isset($data_matkul['nama']) ? $data_matkul['nama'] : '' ?>" class="form-control" name="nama" id="inp_nama" placeholder="Nama Mata Kuliah" required>
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
        $("#nav-matkul").addClass("active");
    });
</script>
<?php require("layout_admin/footer.php") ?>