<?php 
    session_start();
    include 'config/config.php';
    include 'data-register.php';
    
    
    
    if(!isset ($_SESSION['name'])){
        header("Location: index.php?error-access-failed");
        exit();
    }

    function getPeserta($koneksi, $status){
        $array_status = [1,2,3,];
        if(!in_array($status, $array_status)){
            $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE status $status AND deleted = 0");
        }else{
            $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE status = '$status' AND deleted = 0");
        }
        
        $total = mysqli_num_rows($query);
        return  $total;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php';?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'inc/sidebar.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'inc/navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Calon Peserta Pendaftar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo getPeserta($koneksi, "IS NULL"); ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Lolos Sortir</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo getPeserta($koneksi, "1");?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lolos Wawancara
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo getPeserta($koneksi, "2"); ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Lolos Seleksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getPeserta($koneksi, "3"); ?></div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Pendaftar</div>
                                            <div class="h5 mb-12font-weight-bold text-gray-800">
                                                <?php echo getPeserta($koneksi, "");?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Peserta -->
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
                                    <td><?php echo $dataPeserta['gelombang']?></td>
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



                        
                </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/template/js/demo/chart-area-demo.js"></script>
    <script src="assets/template/js/demo/chart-pie-demo.js"></script>

</body>

</html>