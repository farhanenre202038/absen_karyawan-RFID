<?php
    include 'db/koneksi.php';
    session_start();
    date_default_timezone_set("Asia/Makassar");
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");

    $kartu = mysqli_query($koneksi, "SELECT * FROM tbl_rfid");
    $data = mysqli_fetch_array($kartu);
    $no_kartu = $data['no_kartu'];

    $karyawan_nik = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE no_kartu='$no_kartu'");
    $data_karyawan = mysqli_fetch_array($karyawan_nik);
    $nik = $data_karyawan['nik'];
?>

<style>
    .box1{
        width:280px;
        height:280px;
        border:solid 3px black;
    }
    .img-rfid{
        width: 250px;
        margin-top: 10vh;
    }
    .img-karyawan{
        width: 280px;
        height: 280px;
        border:solid 3px black;
    }
</style>

   <?php if($no_kartu=="") {?>
        <div class="row d-flex align-items-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <div class="box1"><img class="img-rfid" src="img/rfid.svg" alt=""></div>
                            <br>    
                        </center>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <center>
                    <h3>Tempelkan Kartu Anda</h3>
                    <h6><?= $tanggal; ?> / <?= $waktu ?></h6>
                </center>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>XXXXXXXXXX</td>
                        </tr>
                        <tr>
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td>XXXXXXXXXX</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>XXXXXXXXXX</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>XXXXXXXXXX</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
   <?php }else{
        $karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE no_kartu='$no_kartu'");
        $jml_data = mysqli_num_rows($karyawan);

        if($jml_data == 0){?>
            <div class="alert alert-danger" role="alert">
                <center>
                    <h4 class="alert-heading"><i class="fa-solid fa-user-slash"></i> Maaf! Kartu Tidak Terdaftar</h4>
                </center>
            </div>
       <?php }else{
            $row = mysqli_fetch_array($karyawan);
            $nama_karyawan = $row['nama_karyawan'];
            $_SESSION['nama_karyawan'] = $row['nama_karyawan'];
            
            $absen = mysqli_query($koneksi, "SELECT * FROM tbl_absen WHERE no_kartu='$no_kartu' AND tanggal='$tanggal'");
            $jml_absen = mysqli_num_rows($absen);
            $jam = mysqli_fetch_array($absen);
            if($jml_absen == 0){ ?>
                <div class="row d-flex align-items-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                               <center>
                                    <img src="img/<?=  $row['foto_karyawan']; ?>" alt="" class="img-karyawan">
                               </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <center>
                            <h3>SELAMAT DATANG, <?= $row['nama_karyawan']; ?></h3>
                            <h6><?= $tanggal; ?> / <?= $waktu ?></h6>
                        </center>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $row['nik'];?></td>
                                </tr>
                                <tr>
                                    <td>Nama Karyawan</td>
                                    <td>:</td>
                                    <td><?= $row['nama_karyawan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $row['tanggal_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $row['alamat']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="telegram"></div>
            <?php
                // echo'Selamat Datang'. $nama_karyawan;        
                $query = mysqli_query($koneksi,"INSERT INTO tbl_absen VALUE('','$no_kartu','$tanggal','$waktu','','HADIR','')");
                $query_history = mysqli_query($koneksi,"INSERT INTO tbl_history VALUE('','$tanggal','$nik','$waktu','','mesin','HADIR','')");
                $query_absen = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='hadir' WHERE no_kartu='$no_kartu'");
            }else if($jam['jam_keluar'] == '00:00:00'){ ?>
                <div class="alert alert-success" role="alert">
                    <center>
                         <h4 class="alert-heading">Hati - Hati Di datang <?= $nama_karyawan; ?></h4>
                </center>
            </div>
        <?php 
                $query_absen = mysqli_query($koneksi,"UPDATE tbl_absen SET jam_keluar='$waktu' WHERE no_kartu='$no_kartu'");
                $query_history = mysqli_query($koneksi,"UPDATE tbl_history SET jam_keluar='$waktu' WHERE nik='$nik' and tanggal_history='$tanggal'");
           }else{  ?>
                 <div class="alert alert-warning" role="alert">
                    <center>
                    <h4 class="alert-heading">Besok Lagi Kerjanya <?= $nama_karyawan; ?></h4>
                    </center>
                </div>
          <?php  }
        }
    }
    mysqli_query($koneksi,"DELETE FROM tbl_rfid");
    ?>
</div>