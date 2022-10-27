<?php
    // session_start();
    include '../db/koneksi.php';
    date_default_timezone_set("Asia/Makassar");
    $query = mysqli_query($koneksi,"SELECT * FROM view_absen");
    $data = mysqli_fetch_assoc($query);
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");

   
    if($data['tanggal'] == $tanggal){ 
        echo "$tanggal / $waktu";
    }else{
        echo "$tanggal / $waktu";
    }
?>