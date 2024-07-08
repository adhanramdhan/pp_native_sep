<?php 
    session_start();
    include 'config/config.php';

    // Memastikan user telah login sebelum mengakses halaman ini
    if(!isset($_SESSION['name'])){
        header("Location: index.php?error-access-failed");
        exit();
    }
    
    // Memproses aksi tambah data jurusan
    if(isset($_POST['simpan'])) {
        $nama_jurusan = $_POST['nama_jurusan'];
        $insertUser = mysqli_query($koneksi, "INSERT INTO jurusan (nama_jurusan) VALUES('$nama_jurusan')");
        if($insertUser) {
            header("location:jurusan.php?notif=tambah-success");
        } else {
            die("Error: ". mysqli_error($koneksi));
        }
    }

    // Memproses aksi hapus data jurusan
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM jurusan WHERE id='$id'");
        if($delete) {
            header('location:jurusan.php?notif=delete-success');
        } else {
            die("Error: ". mysqli_error($koneksi));
        }
    } 

    // Menyiapkan data untuk operasi edit
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id='$id'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }

    // Memproses aksi edit data jurusan
    if(isset($_POST['edit'])) {
        $nama_jurusan = $_POST['nama_jurusan'];
        $id = $_GET['edit'];
        // Mengubah data di tabel jurusan, di mana nilai nama_jurusan diambil dari inputan nama_jurusan
        // dan nilai id jurusan diambil dari parameter edit
        $editUser = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan= '$nama_jurusan' WHERE id = '$id' ");
        if(!$editUser) {
            die("Error: ". mysqli_error($koneksi));
        } else {
            header("location:jurusan.php?notif=edit-success");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <?php include  'inc/head.php'; ?>

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
                    <?php if(isset($_GET['edit'])) { ?>

                    <h1 class="h3 mb-4 text-gray-800">Edit Jurusan</h1>
                    <?php }else{ ?>
                    
                    
                        <div class="card-header">Tambah Jurusan</div>
                    <?php } ?>

                    <?php if(isset($_GET['edit'])) { ?>
                        
                        <div class="card">
                        <div class="card-body">
                            <form action="tambah-jurusan.php?edit=<?php echo $dataEdit['id']; ?>" method="post">
                                
                                    <label for="">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan" placeholder='Masukan nama Jurusan' value="<?php echo $dataEdit['nama_jurusan']; ?>">
                                
                                                    
                                    <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                                    <a href="jurusan.php" class="btn btn-danger">Keluar</a>
                                
                            </form>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="tambah-jurusan.php" method="post">
                                
                                    <label for="">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan" placeholder='Masukan nama'>
                                    <br>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                    <a href="jurusan.php" class="btn btn-danger">Keluar</a>
                                
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                
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
    <? include 'inc/modal-logout.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/js.php'; ?>


    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/  js/sb-admin-2.min.js"></script>

</body>

</html>
