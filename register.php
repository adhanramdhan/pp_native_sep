<?php
    session_start(); // Mulai sesi

    include 'config/config.php';

    if (isset($_POST['register'])){
    
        $nik = isset($_POST['nik']) ? $_POST['nik'] : ''; 
        $name = isset($_POST['name']) ? $_POST['name'] : ''; 
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : ''; 
        $id_jurusan = isset($_POST['id_jurusan']) ? $_POST['id_jurusan'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; 
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : ''; 
        $pendidikan = isset($_POST['pendidikan']) ? $_POST['pendidikan'] : '';
        $id_gelombang = $_POST['id_gelombang'];
        $tahun_pelatihan = date("Y");

    
        $queryCheckEmail = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE email ='$email'");
        if(mysqli_num_rows($queryCheckEmail) > 0){
        
            echo "<script>alert('Email sudah digunakan');</script>";
    
            header("Location: register.php");
            exit();
        }


        $queryInsert = mysqli_query($koneksi, "INSERT INTO 
        pendaftaran (id_jurusan, nik, name, email, phone, gender, alamat, pendidikan, id_gelombang, tahun_pelatihan) 
        VALUES ('$id_jurusan','$nik', '$name', '$email', '$phone', '$gender', '$alamat', '$pendidikan', '$id_gelombang', '$tahun_pelatihan' ) ");
        if($queryInsert){
            
            $_SESSION['id'] = mysqli_insert_id($koneksi);
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header("Location: register.php?success=daftar");
            exit();
        } else {
        
            echo "<script>alert('Registrasi gagal');</script>";
        }
    }

    $gelombang = mysqli_query($koneksi, "SELECT * FROM gelombang WHERE aktif = 1 ORDER BY id DESC");
    $datagelombang  = mysqli_fetch_assoc($gelombang);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Pelatihan Gelombang 1 - PPKD JP</title>

    <!-- Custom fonts for this template-->
    <link href="assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="assets/template/vendor/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <?php if (isset($_GET['success'])) : ?>
                                    <div class="alert alert-success">KONTOLLLLLLLLLL</div>
                                    <?php endif; ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Register!</h1>
                                    </div>
                                    <form class="user" method="post" action="register.php">
                                        <div class="form-group">
                                            <input name="nik" type="number" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan NIK anda..">
                                            </div>

                                            <div class="form-group">
                                            <input name="name" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan nama lengkap anda..">
                                                </div>

                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan email anda...">
                                        </div>

                                        <div class="form-group">
                                            <input name="phone" type="number" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan nomor telepon anda...">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" readonly value="<?php echo $datagelombang['nama_gelombang']; ?>" name="" class="form-control">
                                            <input type="hidden" name="id_gelombang" value="<?php echo $datagelombang['id']; ?>">
                                        </div>



                                        <div class="form-group">
                                            <select name="id_jurusan" type="id_jurusan" class="form-control"
                                                id="id_jurusan">
                                                <option value="">Pilih Jurusan</option>
                                                <?php
                                                $queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                                ?>
                                                <?php while($dataJurusan = mysqli_fetch_assoc( $queryJurusan )){ ?>
                                                <option value="<?php echo $dataJurusan['id']; ?>"><?php echo $dataJurusan['nama_jurusan']; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input name="gender" type="radio" 
                                                id="exampleInputPassword" value="laki-laki"> Laki Laki
                                                <input name="gender" type="radio"
                                                id="exampleInputPassword" value="perempuan"> Perempuan
                                        </div>

                                        <div class="form-group">
                                            <textarea name="alamat" type="radio" class="form-control" 
                                            placeholder="Masukkan Alamat Anda"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input name="pendidikan" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan pendidikan terakhir anda..">
                                        </div>


                                        <button name="register" type="submit" href="dashboard.php" class="btn btn-primary btn-user btn-block">
                                            Register
                                            </button>
                                        
                                        
                                    </form>
                                    <hr>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/template/js/sb-admin-2.min.js"></script>

</body>

</html>