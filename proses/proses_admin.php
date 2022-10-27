<?php
    include '../db/koneksi.php';
    if(isset($_POST['ubah_admin'])){
        $extensi_boleh = array('png','jpg');
        $nama = $_FILES['file']['name'];
        $formant = explode('.', $nama);
        $extensi = strtolower(end($formant));
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $id = $_POST['id'];
        $nama_admin = $_POST['nama_admin'];

        if(in_array($extensi, $extensi_boleh) === true){
            if($ukuran < 5044070){
                move_uploaded_file($file_tmp, '../img/'.$nama);
                $query = mysqli_query($koneksi,"UPDATE tbl_admin SET nama_admin='$nama_admin', foto='$nama' WHERE id='$id'");
                if($query){
                    header("location:../setting.php?berhasil");
                }else{
                    header("location:../setting.php?gagal");
                }
            }else{
                header("location:../setting.php?size");
            }
        }else{
            header("location:../setting.php?formant");
            $query = mysqli_query($koneksi,"UPDATE tbl_admin SET nama_admin='$nama_admin' WHERE id='$id'");
            if($query){
                header("location:../setting.php?berhasil"); 
            }else{
                header("location:../setting.php?gagal"); 
            }
        }
    }

    if(isset($_POST['input_admin'])){
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query_admin = mysqli_query($koneksi, "INSERT INTO tbl_admin VALUES('','$nama_admin','$username','$password','offline','user.png')");
        if($query_admin){
            echo"<script>alert('DATA BERHASIL DI INPUT');document.location='../setting.php';</script>";
        }else{
            echo"<script>alert('DATA GAGAL DI INPUT');document.location='../setting.php';</script>";
        }
    }
?>