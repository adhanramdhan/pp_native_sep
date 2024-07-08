<?php
session_start();
include 'config/config.php';

if (!isset($_SESSION['name'])) {
    header("Location: index.php?error-access-failed");
    exit();
}

// jika button di submit, ambil nilai dari form
if (isset($_POST['simpan'])) {
    $level = $_POST['level'];

    $insertLevel = mysqli_query($koneksi, "INSERT INTO level (level) VALUES ('$level')");
    if ($insertLevel) {
        header("location:level.php?notif=tambah-success");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Level</h1>

                    <div class="card">
                        <div class="card-body">
                            <form action="tambah-level.php" method="post">
                                <label for="">Level</label>
                                <input type="text" class="form-control" name="level" placeholder='Masukan nama'>
                                <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                <a href="level.php" class="btn btn-danger">Keluar</a>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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
    <?php include 'inc/js.php' ?>

    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/js/sb-admin-2.min.js"></script>

</body>

</html>
