<?php 
    include '../db/koneksi.php';
    if(isset($_POST['input_karyawan'])){
        $no_kartu = $_POST['no_kartu'];
        $nik = $_POST['nik'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        $query = mysqli_query($koneksi,"INSERT INTO tbl_karyawan VALUES('$nik','$no_kartu','$nama_karyawan','$tanggal_lahir','$jk','$alamat','$email','$password','user.png','offline','alfa')");
        mysqli_query($koneksi,"DELETE FROM tbl_rfid");
        if($query){
            echo"<script>alert('DATA BERHASIL DI INPUT');document.location='../data_karyawan.php';</script>";
        }else{
            echo"<script>alert('DATA GAGAL DI INPUT');document.location='../data_karyawan.php';</script>";
        }
    }

    if(isset($_POST['ubah_karyawan'])){
        $no_kartu = $_POST['no_kartu'];
        $nik = $_POST['nik'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        $query = mysqli_query($koneksi,"UPDATE tbl_karyawan SET nama_karyawan='$nama_karyawan', tanggal_lahir='$tanggal_lahir',jk='$jk',email='$email',password='$password',alamat='$alamat' WHERE nik='$nik'");

        if($query){
            echo"<script>alert('DATA BERHASIL DI UBAH');document.location='../data_karyawan.php';</script>";
        }else{
            echo"<script>alert('DATA GAGAL DI UBAH');document.location='../data_karyawan.php';</script>";
        }
    }
    mysqli_query($koneksi,"DELETE FROM tbl_rfid");
?>