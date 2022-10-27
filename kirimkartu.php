<?php
    include 'db/koneksi.php';

    $no_kartu = $_GET['no_kartu'];
    mysqli_query($koneksi,"DELETE FROM tbl_rfid");

    $RFID = mysqli_query($koneksi,"INSERT INTO tbl_rfid VALUES('$no_kartu')");
    if($RFID){
        echo "Berhasil" . $no_kartu;
    }else{
        echo "Gagal";
    }
?>