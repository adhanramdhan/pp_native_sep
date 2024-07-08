<?php 
    session_start();
    include 'config/config.php';
    if(!isset ($_SESSION['name'])){
        header("Location: index.php?error-access-failed");
        exit();
    }
    

    // jika button di submit , ambil nilai dari form
    if (isset($_POST['simpan'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $level = $_POST['level']; // Ambil nilai level dari form

        $insertUser = mysqli_query($koneksi, "INSERT INTO users (id_level, name, email, password) VALUES('$level','$name','$email','$password')");
        if($insertUser){
            header("location:user.php?notif=tambah-success");
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }


    // jika parameter delete ada, buat perintah delete
// Jika parameter delete ada, buat perintah delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
    if($delete){
        header('location:user.php?notif=delete-success');
        exit; // Penting: Setelah melakukan pengalihan header, pastikan untuk keluar dari skrip agar tidak ada kode berikutnya yang dieksekusi
    } else {
        echo "Error: " . mysqli_error($koneksi); // Cetak pesan kesalahan jika query penghapusan gagal
    }
}



    // tampilkan semua data dari tabel users di mana idnya diambil dari params edit
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }

    if(isset($_POST['edit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $level = $_POST['level'];

        $id = $_GET['edit'];
        //  Ubah data dari tabel user di mana nilai nama diambil dari inputan nama
        // dan nilai id user nya diambil dari parameter
        $editUser = mysqli_query($koneksi, "UPDATE users SET name= '$name', email='$email', password='$password', id_level='$level' WHERE id = '$id' ");
        if($editUser){
            header("location:user.php?notif=edit-succes");
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <?php include  'inc/head.php';?>

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

                    <h1 class="h3 mb-4 text-gray-800">Edit Pengguna</h1>
                    <?php }else{ ?>
                    
                    
                        <div class="card-header">Tambah Pengguna</div>
                    <?php } ?>

                    <?php if(isset($_GET['edit'])) { ?>
                        
                        <div class="card">
                        <div class="card-body">
                            <form action="tambah-user.php" method="post">
                                
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan nama" value="<?php echo isset($dataEdit['name']) ? $dataEdit['name'] : ''; ?>">

                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukan email" value="<?php echo isset($dataEdit['email']) ? $dataEdit['email'] : ''; ?>">

                            <label for="">Level</label>
                            <select class="form-control" name="level" id="level">
                        <option value="">Pilih Level</option>
                            <?php
        $queryLevel = mysqli_query($koneksi, "SELECT * FROM level");
        while ($dataLevel = mysqli_fetch_assoc($queryLevel)) {
            $selected = ($dataLevel['id'] == $dataEdit['id_level']) ? 'selected' : '';
            echo "<option value='{$dataLevel['id']}' $selected>{$dataLevel['level']}</option>";
        }
    ?>
</select>

<label for="">Password</label>
<input type="password" class="form-control" name="password" placeholder="Masukan password" value="<?php echo isset($dataEdit['password']) ? $dataEdit['password'] : ''; ?>">

                            <input type="submit" class="btn btn-primary" name="simpan" value="simpan">
                                    <a href="user.php" class="btn btn-danger">Keluar</a>
                                
                            </form>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="tambah-user.php" method="post">
                                
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" placeholder='Masukan nama'>
                                
                                    <label for="">email</label>
                                    <input type="email" class="form-control" name="email" placeholder='Masukan email'>
                                
                                    <label for="">level</label>
                                                    <select class="form-control" name="level" id="level">select
                    <option value="">Pilih Level</option>
                    <?php
                        $queryLevel = mysqli_query($koneksi, "SELECT * FROM level");
                        while ($dataLevel = mysqli_fetch_assoc($queryLevel)) {
                    ?>
                    <option value="<?php echo $dataLevel['id']; ?>"><?php echo $dataLevel['level']; ?></option>
                    <?php } ?>
                </select>


                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder='Masukan password'>
                                
                                    <input type="submit" class="btn btn-primary" name="simpan" value="simpan">
                                    <a href="user.php" class="btn btn-danger">Keluar</a>
                                
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
    <?php include 'inc/modal-logout.php'; ?>


    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/js.php' ?>
    
    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/  js/sb-admin-2.min.js"></script>

</body>

</html>