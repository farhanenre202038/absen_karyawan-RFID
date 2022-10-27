<?php
    include '../../db/koneksi.php';
    
    if(isset($_POST['login_karyawan'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE email='$email' and password='$password'");
        $cek = mysqli_num_rows($karyawan);

        if($cek > 0){
            session_start();
            $row = mysqli_fetch_assoc($karyawan);
            $_SESSION['email'] = $row['email'];
            $_SESSION['nama_karyawan'] = $row['nama_karyawan'];
            $_SESSION['foto_karyawan'] = $row['foto_karyawan'];
            $_SESSION['nik'] = $row['nik'];
            $_SESSION['no_kartu'] = $row['no_kartu'];
            $nik = $_SESSION['nik'];
            $query_karyawan = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status='online' WHERE nik='$nik'");
            $_SESSION['status'] = 'online';

            header("location:../beranda.php?masuk");
        }else{
            header("location:../index.php?gagal");
        }
    }
?>