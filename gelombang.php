<?php 

    session_start();

    include 'config/config.php';

    if(!isset ($_SESSION['name'])){

        header("Location: index.php?error-access-failed");
        exit();
    }
    

    $queryUser = mysqli_query($koneksi, "SELECT * FROM gelombang ORDER BY id DESC");


    function customStatus3($aktif)
    {
        switch ($aktif) {
            case '1':
                $pesan = 'aktif';
                break;
            
            default:
                $pesan = 'tidak Aktif';
                break;
        }

        return $pesan;
    }


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
                    <h1 class="h3 mb-4 text-gray-800">Data Gelombang</h1>
                    <div align="right">
                        <a href="tambah-gelombang.php" class="btn btn-primary mb-3">Tambah Gelombang</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table" width=auto; id="datatables" width="800">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gelombang</th>                                  
                                    <th>Aktif</th>                                  
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;  while ($dataUser = mysqli_fetch_assoc($queryUser)) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                
                                    <td><?php echo $dataUser['nama_gelombang'] ?></td>
                                    <td><?php echo customStatus3($dataUser['aktif']) ?></td>
                                    <td>
                                        <a onclick="return confirm('apakah anda yakin mengubah data ini?')" href="tambah-gelombang.php?edit=<?php echo $dataUser['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('apakah anda yakin akan menghapus data ini?')" href="tambah-gelombang.php?delete=<?php echo $dataUser['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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