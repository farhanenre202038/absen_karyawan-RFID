<?php
    session_start();
    error_reporting(0);
    if ($_SESSION['status'] == "") {
        header("location:index.php");
    }
    $title = "Karyawan | Beranda";
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
?>
<!-- tutup navbar -->
<div class="jumbotron jumbotron-fluid bg-dark"></div>
<div class="col-md-12">
    <div class="card shadow card-top">
            <div class="card-body">
            <center>
                <div id="Auto"></div>
            </center>
            <hr>
                <h6>Selamat Datang,</h6>
                <h3><?= $_SESSION['nama_karyawan']; ?></h3>
                <hr>
                <div class="row no-gutters">
                    <div class="col-3">
                        <center>
                            <a href="absen_kamera.php" class="btn btn-primary text-white btn-lg"><i class="fa-solid fa-camera"></i> </a>
                            <br>
                            <small>Absen</small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center>
                            <a href="" class="btn btn-danger text-white btn-lg"><i class="fa-solid fa-calendar-days"></i> </a>
                            <br>
                            <small>Tanggal</small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center>
                            <a href="history.php" class="btn btn-success text-white btn-lg"><i class="fa-sharp fa-solid fa-file-waveform"></i> </a>
                            <br>
                            <small>History</small>
                        </center>
                    </div>
                    <div class="col-3">
                        <center>
                            <a href="profil.php" class="btn btn-warning text-white btn-lg"><i class="fa-solid fa-user"></i> </a>
                            <br>
                            <small>Profil</small>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<div class="col-md-12">
    <label for=""><b>Status Kehadiran</b></label>
    <div class="row">
        <div class="col-6">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <center>
                        <span>Absen Masuk</span>
                        <div id="JamMasuk"></div>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-6">
        <div class="card bg-dark text-white">
                <div class="card-body">
                    <center>
                        <span>Absen Pulang</span>
                        <div id="JamKeluar"></div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="col-md-12">
<div class="form-group row no-gutters">
        <label class="col-4 col-form-label"><b>Kehadiran Bulan</b></label>
        <div class="col-4">
            <select class="custom-select"  name="" id="" >
                <option value="">Januari</option>
                <option value="1">Februari</option>
                <option value="2">Maret</option>
                <option value="3">April</option>
                <option value="3">Mei</option>
                <option value="3">Juni</option>
                <option value="3">Juli</option>
                <option value="3">Agustus</option>
                <option value="3">September</option>
                <option value="3">Oktober</option>
                <option value="3">November</option>
                <option value="3">Desember</option>
            </select>
        </div>
    </div>
    <div class="row ">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                        <center>
                        <i class="fa-solid fa-user size text-success"></i>
                        </center>    
                    </div>
                        <div class="col-8">
                            <h5>Hadir</h5>
                            <span> <?php 
                                include '../db/koneksi.php';
                                $nik = $_SESSION['nik'];
                                $jumlah_alfa = mysqli_query($koneksi,"SELECT * FROM tbl_history WHERE nik='$nik' and status_karyawan='HADIR'");
                                echo mysqli_num_rows($jumlah_alfa);
                            ?> Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                <div class="row d-flex align-items-center">
                        <div class="col-3">
                        <center>
                        <i class="fa-solid fa-user size text-danger"></i>
                        </center>    
                    </div>
                        <div class="col-8">
                            <h5>Alfa</h5>
                            <span>
                            <?php 
                                include '../db/koneksi.php';
                                $nik = $_SESSION['nik'];
                                $jumlah_alfa = mysqli_query($koneksi,"SELECT * FROM tbl_history WHERE nik='$nik' and status_karyawan='ALFA'");
                                echo mysqli_num_rows($jumlah_alfa);
                            ?>
                            Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row ">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                        <center>
                        <i class="fa-solid fa-user size text-info"></i>
                        </center>    
                    </div>
                        <div class="col-8">
                            <h5>Izin</h5>
                            <span> <?php 
                                include '../db/koneksi.php';
                                $nik = $_SESSION['nik'];
                                $jumlah_alfa = mysqli_query($koneksi,"SELECT * FROM tbl_history WHERE nik='$nik' and status_karyawan='IZIN'");
                                echo mysqli_num_rows($jumlah_alfa);
                            ?> Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                <div class="row d-flex align-items-center">
                        <div class="col-3">
                        <center>
                        <i class="fa-solid fa-user size text-warning"></i>
                        </center>    
                    </div>
                        <div class="col-8">
                            <h5>Sakit</h5>
                            <span>
                            <?php 
                                include '../db/koneksi.php';
                                $nik = $_SESSION['nik'];
                                $jumlah_alfa = mysqli_query($koneksi,"SELECT * FROM tbl_history WHERE nik='$nik' and status_karyawan='SAKIT'");
                                echo mysqli_num_rows($jumlah_alfa);
                            ?>
                            Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card batas">
    <div class="card-body">

    </div>
</div>
<!-- navbat bottom -->

<?php
    require 'template/navbar.php';
    require 'template/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $("#JamMasuk").load('get_masuk.php')
        }, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $("#JamKeluar").load('get_keluar.php')
        }, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $("#Auto").load('get_otomatis.php')
        }, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
    });
</script>