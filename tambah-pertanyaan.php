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
    $id_jurusan = $_POST['id_jurusan'];
    $nama_pertanyaan = $_POST['nama_pertanyaan'];
    $insertUser = mysqli_query($koneksi, "INSERT INTO quest (id_jurusan, nama_pertanyaan) VALUES('$id_jurusan', '$nama_pertanyaan')");
    if($insertUser) {
        header("location:quest.php?notif=tambah-success");
    } else {
        die("Error: ". mysqli_error($koneksi));
    }
}

    // Memproses aksi hapus data jurusan
    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "DELETE FROM quest WHERE id='$id'");
        if($delete) {
            header('location:quest.php?notif=delete-success');
        } else {
            die("Error: ". mysqli_error($koneksi));
        }
    } 

    // Menyiapkan data untuk operasi edit
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $queryEdit = mysqli_query($koneksi, "SELECT * FROM quest WHERE id='$id'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }

    // Memproses aksi edit data jurusan
    if(isset($_POST['edit'])) {
        $id_jurusan = $_POST['id_jurusan'];
        $nama_pertanyaan = $_POST['nama_pertanyaan'];
        $id = $_GET['edit'];
        // Mengubah data di tabel jurusan, di mana nilai nama_jurusan diambil dari inputan nama_jurusan
        // dan nilai id jurusan diambil dari parameter edit
        $editUser = mysqli_query($koneksi, "UPDATE quest SET id_jurusan = '$id_jurusan', nama_pertanyaan = '$nama_pertanyaan' WHERE id = '$id' ");
        if(!$editUser) {
            die("Error: ". mysqli_error($koneksi));
        } else {
            header("location:quest.php?notif=edit-success");
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
                            <form action="tambah-pertanyaan.php?edit=<?php echo $dataEdit['id']; ?>" method="post">
                                
                                    <label for="">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_pertanyaan" placeholder='Masukan nama Jurusan'>
                                
                                    <select name="id_jurusan" class="form-control">
                                            <?php 
                                            $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                            while ($dataJurusan = mysqli_fetch_assoc($queryJurusan)) { 
                                                $selected = ($dataJurusan['id'] == $dataEdit['id_jurusan']) ? 'selected' : '';
                                                echo "<option value='{$dataJurusan['id']}' $selected>{$dataJurusan['nama_jurusan']}</option>";
                                            } 
                                            ?>
                                        </select>
                                                    
                                        <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                                    <a href="jurusan.php" class="btn btn-danger">Keluar</a>
                                
                            </form>
                        </div>
                    </div>
                                
                            </form>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="tambah-pertanyaan.php" method="post">
                                
                                    <label for="">Nama Pertanyaan</label>
                                    <input type="text" class="form-control" name="nama_pertanyaan" placeholder='Masukan nama'>
                                    <br>

                                    <select name="id_jurusan" id="" class="form-control">
                                            <option value="">Pilih jurusan</option>
                                            <?php
                                            $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                            ?>
                                            <?php while ($dataJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                                <option value="<?php echo $dataJurusan['id'] ?>"><?php echo $dataJurusan['nama_jurusan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                    <a href="quest.php" class="btn btn-danger">Keluar</a>
                                
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
    <script src="assets/template/js/sb-admin-2.min.js"></script>

</body>

</html>
