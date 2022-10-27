<?php
    $title = "Absensi Karyawan | Pengaturan";
    require 'template/header.php';
    require 'template/navbar.php'; 
?>

<style>
    .jumbotron{
        border-radius: 20px;
    }
</style>

<?php
    include 'db/koneksi.php'; 
    $query_jadwal = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal");
    $row = mysqli_fetch_assoc($query_jadwal);
?>

<div class="col-md-9 mt-4">
    <div class="card">
        <div class="card-header">
            Pengaturan Jadwal Jam Kerja
        </div>
        <div class="card-body">
        <div class="jumbotron jumbotron-fluid bg-warning text-center">
            <div class="container">
                <h4 class="display-4 text-white"><b>Pengaturan Jam Kerja</b></h4>
                <p class="lead"><i>Atur Jadwal Jam Masuk & Jam Keluar </i></p>
            </div>
            </div>
           <form action="proses/proses_jadwal.php" method="post">
             <div class="row">
                <div class="col-md-6">
                    <label for="">Jam Masuk :</label>
                    <input type="time" name="jam_masuk" class="form-control" value="<?= $row['jam_masuk'];?>" >  
                    <small> <i>Jam Masuk / Jam Kerja</i> </small>  
                </div>
                    <div class="col-md-6">
                    <label for="">Jam Keluar :</label>
                    <input type="time" name="jam_keluar" class="form-control"  value="<?= $row['jam_keluar'];?>" > 
                    <small> <i>Jam Keluar / Jam Pulang</i> </small>      
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Garis Lintang-Bujur :</label>
                        <input type="text" name="lokasi" class="form-control"  value="<?= $row['lokasi'];?>" required> 
                        <small><i>Lokasi Kantor </i></small>        
                </div>
                    <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for=""><i>Jam Masuk :</i></label>
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                    <b><?= $row['jam_masuk'];?></b>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for=""><i>Jam Keluar :</i></label>
                        <div class="card">
                                <div class="card-body">
                                  <center>
                                  <b><?= $row['jam_keluar'];?></b>
                                  </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <div class="card-footer">
        <button type="submit" name="jadwal_kerja" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
</div>

<?php
    require 'template/footer.php';
?>