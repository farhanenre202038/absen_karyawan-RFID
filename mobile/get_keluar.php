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
<?php if($data['status_absen'] == 'hadir' && $data['tanggal'] == $tanggal){ ?>
    <h5><?= $data['jam_keluar']; ?></h5>
<?php }else{ ?>
    <h5>Belum Keluar</h5>
    <?php  } ?>