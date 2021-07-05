<?php require("layout_admin/header.php") ?>
<?php
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'hapus') {
        $flashdata = hapus_matkul($_GET['id']);
    }
}
$dosen = select_all("SELECT d.* FROM matkul d
                    ORDER BY d.id ASC");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mata Kuliah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "admin/dashboard.php" ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Mata Kuliah</li>
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
                            <h3 class="card-title">Data Mata Kuliah</h3>

                            <div class="card-tools">
                                <a href="<?= BASE_URL . 'admin/tambah_matkul.php' ?>" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAMA MATKUL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dosen as $k => $v) { ?>
                                        <tr>
                                            <td><?= ++$k ?></td>
                                            <td><?= $v['nama'] ?></td>

                                            <td>
                                                <a href="<?= BASE_URL . 'admin/edit_matkul.php?id=' . $v['id'] ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="?act=hapus&id=<?= $v['id'] ?>" onclick="return deletechecked()" type="button" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
        $("#datatable").dataTable({

        });
    });
</script>
<?php require("layout_admin/footer.php") ?>