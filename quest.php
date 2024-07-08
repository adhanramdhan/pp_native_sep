<?php 

    session_start();

    include 'config/config.php';

    if(!isset ($_SESSION['name'])){

        header("Location: index.php?error-access-failed");
        exit();
    }
    

    
    $queryquest= mysqli_query($koneksi, "SELECT jurusan.nama_jurusan, quest.* FROM quest  LEFT JOIN jurusan on jurusan.id = quest.id_jurusan  ORDER BY quest.id DESC");




?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'inc/head.php'; ?>

<link rel="stylesheet" href="assets/DataTable/datatables.min.css">
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
    <?php include 'inc/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
            <?php include 'inc/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Modul Pertanyaan</h1>
                    <div align="right">
                        <a href="tambah-pertanyaan.php" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table" width=auto; id="datatables" width="800">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id_jurusan</th>   
                                    <th>Nama Pertanyaan</th>
                            
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;  while ($dataquest = mysqli_fetch_assoc($queryquest)) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                
                                    <td><?php echo $dataquest['nama_jurusan'] ?></td>
                                    <td><?php echo $dataquest['nama_pertanyaan']?></td>
                                    <td>
                                        <a onclick="return confirm('apakah anda yakin mengubah data ini?')" href="tambah-pertanyaan.php?edit=<?php echo $dataquest['id_jurusan']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')" href="tambah-pertanyaan.php?delete=<?php echo $dataquest['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'inc/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'inc/modal-logout.php'; ?>

    <?php include 'inc/js.php'; ?>

</body>

</html>