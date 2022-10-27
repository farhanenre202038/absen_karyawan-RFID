<?php
    include '../db/koneksi.php';
    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $admin = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE username='$username' and password='$password'");
        $cek = mysqli_num_rows($admin);

        if($cek > 0){
            session_start();
            $row = mysqli_fetch_assoc($admin);
            $_SESSION['username'];
            $_SESSION['nama_admin'] = $row['nama_admin'];
            $id = $_SESSION['id'] = $row['id'];
            $_SESSION['foto'] = $row['foto'];
            $query_admin = mysqli_query($koneksi,"UPDATE tbl_admin SET status='online' WHERE id='$id'");
            $_SESSION['status'] = 'online';

            header("location:../dashboard.php?masuk");
        }else{
            header("location:../index.php?gagal_masuk");
        }
    }
?>