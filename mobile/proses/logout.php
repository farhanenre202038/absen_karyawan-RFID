<?php
    session_start();
    include '../../db/koneksi.php';
    $nik = $_SESSION['nik'];
    $query = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status='offline' WHERE nik='$nik'");
    session_destroy();
    header("location:../index.php");
?>