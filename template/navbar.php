<?php
  session_start();
  error_reporting(0);
    if ($_SESSION['status'] == "") {
        header("location:index.php");
    }
?>
<style>
      .navbar {
        padding: 0.5pc 0.5pc 0.5pc 1.5pc;
        border-style: none none solid none;
        border-color:#fdb606;
        border-width:5px;
    } 

    .card{
        border : 0;
        box-shadow: 3px 3px 10px -5px;
    }
    .lingkaran1{
        width: 50px;
        height: 50px;
        border-radius: 100%;
    }
</style>
<nav class="navbar navbar-dark bg-dark">
        <a href="" class="navbar-brand">
            <h3>PERCETAKAN FARHAN ABADI</h3>
            <small>Aplikasi Absensi Karyawan Berbasis WEB</small>
        </a>
    </nav>
    <div class="container-fluid" style="margin-top: 15px;">
    <div class="row">
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body">
                    <?php
                        require 'alert.php';
                    ?>
                    <div class="card">
                        <div class="card-body">
                        <center><div id="data"></div></center>
                        <hr>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="img/<?= $_SESSION['foto']; ?>" alt="..." class="lingkaran1" >
                                </div>
                                <div class="col-9">
                                    <h6><?= $_SESSION['nama_admin'];?></h6>
                                    <marquee behavior="10" direction=""><span class="text-success"><?= $_SESSION['status'];?></span></marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="list-group">
                        <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        <a href="monitoring.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-desktop"></i> Monitoring</a>
                        <a href="absensi.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-clipboard-user"></i> Absensi</a>
                        <a href="data_karyawan.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-users"></i> Data Karyawan</a>
                        <a href="data_history.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-file-waveform"></i> Data History</a>
                        <a href="jam_kerja.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-business-time"></i> Jam Kerja</a>
                        <a href="setting.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-gears"></i> Pengaturan</a>
                        <a href="proses/logout.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
  