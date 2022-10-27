<?php
    session_start();
    error_reporting(0);
    if ($_SESSION['status'] == "") {
        header("location:index.php");
    }
    $title = "Karyawan | History";
    require 'template/header.php';
?>
<style>
    .jumbotron{
        padding: 15vh;
        margin-top: -5vh;
    }
    .card-top{
        margin-top: -25vh;
        padding: 1vh;
    }
    .size{
        font-size: 25px;
    }
    .custom-select{
        border: 0;
        background: none;
        color: white;
    }
    option{
        color: black;
    }
    .batas{
        margin-top: 10vh;
    }
</style>
<!-- navbar --> 
<?php
 require 'template/navbar-top.php';
 $nik = $_SESSION['nik'];
 include '../db/koneksi.php';
 $query_jadwal = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal");
 $jam = mysqli_fetch_assoc($query_jadwal);
 $history = mysqli_query($koneksi,"SELECT * FROM view_history WHERE nik='$nik' ORDER BY tanggal_history DESC");
 while ($row = mysqli_fetch_assoc($history)){ 
?>
   <div class="container-fluid mt-3">
            <div class="row align-items-center" data-toggle="modal" data-target="">
                <div class="col-3">
                    <center>
                        
                    </center>
                </div>
                <div class="col-9">
                    <h6><?= $row['tanggal_history'];?> /
                    <?php if($row['status_karyawan'] == 'HADIR'){ ?>
                            <span class="badge badge-success">Hadir</span>
                        <?php } else if($row['status_karyawan'] == 'SAKIT') { ?> 
                            <span class="badge badge-info">Sakit</span>
                        <?php }else if($row['status_karyawan'] == 'IZIN'){ ?>
                            <span class="badge badge-warning">Izin</span>
                         <?php  }else{ ?>
                            <span class="badge badge-danger">Alfa</span>
                         <?php } ?>
                    </h6>
                    <span>
                    <?php if($jam['jam_masuk'] >= $row['jam_masuk'] || $row['jam_masuk'] == '00:00:00'){ ?>
                            <td><?= $row['jam_masuk']; ?> - <?= $row['jam_keluar']; ?></td>
                        <?php } else { ?> 
                            <td><?= $row['jam_masuk']; ?> - <?= $row['jam_keluar']; ?> <span class="badge badge-danger">Terlambat</span></td>
                        <?php } ?>
                    </span>
                    <br>
                    <i><small class="text-muted">Methode Absen : <?= $row['methode_absen'];  ?></small></i>
                </div>
            </div>
            <hr>
        </div>
<?php
    }
    echo '<br>
    <br>
    <br>';
    require 'template/navbar.php';
    require 'template/footer.php';
?>
