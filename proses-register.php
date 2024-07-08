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

    
        $queryCheckEmail = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE email ='$email'");
        if(mysqli_num_rows($queryCheckEmail) > 0){
        
            echo "<script>alert('Email sudah digunakan');</script>";
    
            header("Location: register.php");
            exit();
        }


        $queryInsert = mysqli_query($koneksi, "INSERT INTO pendaftaran (id_jurusan, nik, name, email, phone, gender, alamat, pendidikan) VALUES ('$id_jurusan','$nik', '$name', '$email', '$phone', '$gender', '$alamat', '$pendidikan' ) ");
        if($queryInsert){
            
            $_SESSION['id'] = mysqli_insert_id($koneksi);
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
        
            echo "<script>alert('Registrasi gagal');</script>";
        }
    }
?>
