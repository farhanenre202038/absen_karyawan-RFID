<?php
    session_start();
    error_reporting(0);
    include '../db/koneksi.php';
    date_default_timezone_set("Asia/Makassar");
    $nik = $_SESSION['nik'];
    $query = mysqli_query($koneksi,"SELECT * FROM view_absen WHERE nik='$nik'");
    $data = mysqli_fetch_assoc($query);
    $tanggal = date("Y-m-d");
?>
<?php if($data['status_absen'] == 'hadir' || $data['status_absen'] == 'alfa' && $data['tanggal'] == $tanggal){ ?>
    <h5><?= $data['jam_masuk']; ?></h5>
<?php }else{ ?>
    <h5>Belum Masuk</h5>
    <?php  } ?>