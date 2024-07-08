<?php 

    session_start();
    include 'config/config.php';
    if(!isset ($_SESSION['name'])){

        header("Location: index.php?error-access-failed");
        exit();
    }
    
    $queryUser = mysqli_query($koneksi, "SELECT users.id, users.name, users.email, users.password, level.level FROM users LEFT JOIN level ON level.id = users.id_level ORDER BY users.id DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <?php include 'inc/head.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
    <?php include 'inc/sidebar.php'?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
            <?php include 'inc/navbar.php'?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Data User</h1>
                    <div class="text-right">  
                        <a class="btn btn-primary" href="tambah-user.php">Tambah Pengguna</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; while ($dataUser = mysqli_fetch_assoc($queryUser)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $dataUser['name']?></td>
                                    <td><?php echo $dataUser['email']?></td>
                                    <td><?php echo $dataUser['level']?></td>
                                    <td>
                                        <a onclick="return confirm('apakah anda yakin mengubah data ini?')" href="tambah-user.php?edit=<?php echo $dataUser['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="tambah-user.php?delete=<?php echo $dataUser['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <?php include 'inc/footer.php' ?>
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

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/js.php'; ?>

    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/js/sb-admin-2.min.js"></script>

    <script src="assets/DataTable/datatables.min.js"></script>

<script>
        let table = new DataTables('#datatables');
</script>

</body>

</html>