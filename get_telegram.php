<?php
    include 'db/koneksi.php';
    session_start();
    date_default_timezone_set("Asia/Makassar");
    $tanggal_now = date("Y-m-d");
    $waktu_now = date("H:i:s");
    $nama_karyawan1 = $_SESSION['nama_karyawan'];
    $message_datang = 'Selamat Datang, ' .$nama_karyawan1.' Kehadiran ' .$waktu_now;
    include 'proses/telegram.php';
    session_destroy();
?>
