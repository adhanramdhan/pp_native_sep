<?php 

    session_start();
    include 'config/config.php';
    if(!isset ($_SESSION['name'])){

        header("Location: index.php?error-access-failed");
        exit();
    }
    
    $queryPeserta = mysqli_query($koneksi, "SELECT jurusan.nama_jurusan, pendaftaran.* FROM pendaftaran  LEFT JOIN jurusan on jurusan.id = pendaftaran.id_jurusan WHERE deleted = 0 ORDER BY pendaftaran.id DESC");

    if(isset ($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($koneksi, "UPDATE pendaftaran SET DELETED = 1 WHERE id='$id'");
    
    };

    // 3 : Lolos Sortir
    // 2 : Lolos Wawancara
    // 1 : Lolos Semua
    // 0 : TIdak Lulus

    function customStatus($status){
        if($status == 1){
            $msg = "Peserta Lulus";
        }else if($status == 2){
            $msg = "Lulus Wawancara";
        }else if($status == 3){
            $msg = "Lulus Administrasi";
        }else {
            $msg = "Tidak Lulus";
        }

        return $msg;
        // 1: Lolos
        // 2: Lolos Wawancara
        // 3: Lolos Sortir
    }

    function customStatus2($status){
        switch ($status) {
            case '1':
                $msg = "Lolos Seleksi";
                break;
            
            case '2':
                $msg = "Lolos Wawancara";
                break;
                
            case '3':
                $msg = "Lolos Administrasi";
                break;

            default:
                $msg = "Tidak Lulus";
                break;
        }

        return($status);
    }

    if(isset($_POST['ubah_status'])){
        $status = $_POST['status'];
        $id = $_POST['id'];

        $ubahStatus = mysqli_query($koneksi, "UPDATE pendaftaran SET status='$status' WHERE id = '$id' ");
        header("Location:peserta.php?ubah-status-berhasil");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php' ?>
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
                    <h1 class="h3 mb-4 text-gray-800 text-center">Data Peserta</h1>
                    <div class="text-right">  
                        <a class="" href="tambah-peserta.php"></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Nama Jurusan</th>
                                    <th>NIK</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>No. Telp</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Gelombang</th>
                                    <th>Tahun Pelatihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; while ($dataPeserta = mysqli_fetch_assoc($queryPeserta)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $dataPeserta['name']?></td>
                                    <td><?php echo $dataPeserta['nama_jurusan']?></td>
                                    <td><?php echo $dataPeserta['nik']?></td>
                                    <td><?php echo $dataPeserta['gender']?></td>
                                    <td><?php echo $dataPeserta['email']?></td>
                                    <td><?php echo $dataPeserta['phone']?></td>
                                    <td><?php echo $dataPeserta['pendidikan']?></td>
                                    <td><?php echo $dataPeserta['id_gelombang']?></td>
                                    <td><?php echo $dataPeserta['tahun_pelatihan']?></td>
                                    <td><?php echo customStatus($dataPeserta['status'])?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#ubahstatus"-<?php echo $dataPeserta['id']?> href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="peserta.php?delete=<?php echo $dataPeserta['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php include 'modal-ubah-status.php' ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'inc/footer.php'?>
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
    <?php include 'inc/modal-logout.php' ?>

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/js.php' ?>
    
    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/js/sb-admin-2.min.js"></script>

</body>

</html>