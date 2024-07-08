<?php 

    session_start();
    include 'config/config.php';
    if(!isset ($_SESSION['name'])){

        header("Location: index.php?error-access-failed");
        exit();
    }
    
    $querylevel = mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Data level</h1>
                    <div class="text-right">  
                        <a class="btn btn-primary" href="tambah-level.php">Tambah Level</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>level</th>
                                    <th>created_at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; while ($datalevel = mysqli_fetch_assoc($querylevel)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $datalevel['level']?></td>
                                    <td><?php echo $datalevel['created_at']?></td>
                                    <td><?php echo $datalevel['updated_at']?></td>
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

</body>

</html>