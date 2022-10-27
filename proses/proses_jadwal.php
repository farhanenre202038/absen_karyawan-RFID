<?php
    include '../db/koneksi.php';
    $jam_masuk = $_POST['jam_masuk'];
    $jam_keluar = $_POST['jam_keluar'];
    $lokasi = $_POST['lokasi'];
    $query = mysqli_query($koneksi,"UPDATE tbl_jadwal SET jam_masuk='$jam_masuk', jam_keluar='$jam_keluar', lokasi='$lokasi' WHERE id_jam='0'");

    if($query){
        echo"<script>alert('JADWAL BERHASIL DI UBAH');document.location='../jam_kerja.php';</script>";
    }else{
        echo"<script>alert('PROSES GAGAL');document.location='../jam_kerja.php';</script>";
    }

?>