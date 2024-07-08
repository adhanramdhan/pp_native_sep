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
        $nama_gelombang = $_POST['nama_gelombang'];
        $insertUser = mysqli_query($koneksi, "INSERT INTO gelombang (nama_gelombang) VALUES('$nama_gelombang')");
        if($insertUser) {
            header("location:gelombang.php?notif=tambah-success");
        } else {
            die("Error: ". mysqli_error($koneksi));
        }
    }

    // Memproses aksi hapus data jurusan
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM gelombang WHERE id='$id'");
        if($delete) {
            header('location:gelombang.php?notif=delete-success');
        } else {
            die("Error: ". mysqli_error($koneksi));
        }
    } 

    // Menyiapkan data untuk operasi edit
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM gelombang WHERE id='$id'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }

    // Memproses aksi edit data jurusan
    if(isset($_POST['edit'])) {
        $nama_gelombang = $_POST['nama_gelombang'];
        $aktif = $_POST['aktif'];
        $id = $_GET['edit'];
        // Mengubah data di tabel jurusan, di mana nilai nama_jurusan diambil dari inputan nama_jurusan
        // dan nilai id jurusan diambil dari parameter edit
        $editUser = mysqli_query($koneksi, "UPDATE gelombang SET nama_gelombang= '$nama_gelombang' , aktif='$aktif' WHERE id = '$id' ");
        if(!$editUser) {
            die("Error: ". mysqli_error($koneksi));
        } else {
            header("location:gelombang.php?notif=edit-success");
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

                    <h1 class="h3 mb-4 text-gray-800">Edit Gelombang</h1>
                    <?php }else{ ?>
                    
                    
                        <div class="card-header">Tambah Gelombang</div>
                    <?php } ?>

                    <?php if(isset($_GET['edit'])) { ?>
                        
                        <div class="card">
                        <div class="card-body">
                            <form action="tambah-gelombang.php?edit=<?php echo $dataEdit['id']; ?>" method="post">

                                    <div class="mb-3">
                                        <label for="">Aktif</label>
                                        <select name="aktif" id="">
                                            <option value="">Pilih status</option>
                                            <option <?php echo($dataEdit['aktif'] == 1) ? 'selected' : '' ?> value="1">Aktif</option>

                                            <option <?php echo($dataEdit['aktif'] == 0) ? 'selected' : '' ?>  value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                
                                    <label for="">Nama gelombang</label>
                                    <input type="text" class="form-control" name="nama_gelombang" 
                                    placeholder='Masukan nama gelombang' value="<?php echo $dataEdit['nama_gelombang']; ?>">
                                
                                                    
                                    <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                                    <a href="gelombang.php" class="btn btn-danger">Keluar</a>
                                
                            </form>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="tambah-gelombang.php" method="post">
                                
                                    <label for="">Nama gelombang</label>
                                    <input type="text" class="form-control" name="nama_gelombang" placeholder='Masukan nama'>
                                    <br>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                    <a href="gelombang.php" class="btn btn-danger">Keluar</a>
                                
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
