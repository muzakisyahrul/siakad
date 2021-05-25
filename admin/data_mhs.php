<?php require("layout_admin/header.php") ?>
<?php
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'hapus') {
        $flashdata = hapus_mahasiswa($_GET['id']);
    }
}
$mhs = select_all("SELECT m.*,p.nama_prodi FROM mahasiswa m 
                    LEFT JOIN prodi p USING(kode_prodi) 
                    ORDER BY m.nim ASC");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "admin/dashboard.php" ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                            <h3 class="card-title">Data Mahasiswa</h3>

                            <div class="card-tools">
                                <a href="<?= BASE_URL . 'admin/tambah_mhs.php' ?>" class="btn btn-sm btn-success">
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
                                        <th>NIM</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>PRODI</th>
                                        <th>NO TELEPON</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mhs as $k => $v) { ?>
                                        <tr>
                                            <td><?= ++$k ?></td>
                                            <td><?= $v['nim'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <td><span class="badge bg-warning"><?= $v['nama_prodi'] ?></span></td>
                                            <td><?= $v['no_telepon'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
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
        $("#nav-mahasiswa").addClass("active");
        $("#datatable").dataTable({

        });
    });
</script>
<?php require("layout_admin/footer.php") ?>