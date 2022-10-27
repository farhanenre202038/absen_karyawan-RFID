<?php
    $title = "Absensi Karyawan | Monitoring";
    date_default_timezone_set("Asia/Makassar");
    require 'template/header.php';
    require 'template/navbar.php';
?>
<style>
    .img-linkar{
        width: 50px;
        height: 50px;
        border-radius: 100%;
    }
</style>
<div class="col-md-5 mt-4">
    <div class="card">
        <div class="card-header">
        Monitoring Karyawan Tanpa Keterangan
    </div>
        <div class="card-body">
            <table id="example" class="table table-sm table-striped table-bordered table-responsive-xl" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <!-- <th>Nomor Kartu</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE status_absen='alfa' or status_absen=''");
                        while ($row = mysqli_fetch_assoc($karyawan)){
                    ?>
                    <tr>
                        <td><?= $row['nama_karyawan']; ?></td>
                        <!-- <td><?= $row['no_kartu']; ?></td> -->
                        <td>
                            <a href="proses/proses_kehadiran.php?nik=<?= $row['nik']; ?>&no_kartu=<?= $row['no_kartu']; ?>&info=hadir" name="hadir"  class="btn btn-success btn-sm"><i class="fa-solid fa-h"></i></a> |
                            <a href="proses/proses_kehadiran.php?nik=<?= $row['nik']; ?>&no_kartu=<?= $row['no_kartu']; ?>&info=sakit" name="sakit"  class="btn btn-warning btn-sm"><i class="fa-solid fa-s"></i></a> |
                            <a href="proses/proses_kehadiran.php?nik=<?= $row['nik']; ?>&no_kartu=<?= $row['no_kartu']; ?>&info=izin" name="izin" class="btn btn-info btn-sm"><i class="fa-solid fa-i"></i></a> |
                            <a id="AlfaKaryawan" href="proses/proses_kehadiran.php?nik=<?= $row['nik']; ?>&no_kartu=<?= $row['no_kartu']; ?>&info=alfa" name="alfa" class="btn btn-danger btn-sm"><i class="fa-solid fa-a"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            Monitoring Karyawan Masuk
            <b><?=date('d/m/Y')?></b>
        </div>
        <div class="card-body">
        <table class="table table-sm table-striped table-bordered table-responsive-xl" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM view_absen WHERE status_absen='hadir'");
                        while ($row = mysqli_fetch_assoc($karyawan)){
                    ?>
                    <tr>
                    <?php if($row['status_absen'] == 'hadir' && $row['jam_keluar'] == '00:00:00'){ ?>
                        <td><?= $row['nama_karyawan']; ?></td>
                        <td><?= $row['jam_masuk']; ?></td>
                        <td>
                            <a href="proses/proses_kehadiran.php?nik=<?= $row['nik']; ?>&no_kartu=<?= $row['no_kartu']; ?>&info=keluar" name="keluar" class="btn btn-danger btn-sm btn-block"><i class="fa-solid fa-k"></i></a>
                        </td>
                    <?php }else{ ?>
                        <td><?= $row['nama_karyawan']; ?></td>
                        <td><?= $row['jam_masuk']; ?></td>
                        <td><?= $row['jam_keluar']; ?></td>  
                    <?php }?>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4 mt-4">
    <div class="card">
        <div class="card-header">
        Monitoring Karyawan Alfa, Sakit & Izin
    </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered table-responsive-xl" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE status_absen='sakit' or status_absen='izin' or status_absen='alfa'");
                        while ($row = mysqli_fetch_assoc($karyawan)){
                    ?>
                    <tr>
                        <td><?= $row['nama_karyawan']; ?></td>
                        <td>
                            <center>
                            <?php if($row['status_absen'] == 'alfa'){ ?>
                                <span class="badge badge-danger">ALFA</span>
                            <?php } else if($row['status_absen'] == 'sakit') { ?> 
                                <span class="badge badge-info">SAKIT</span>
                            <?php }else if($row['status_absen'] == 'izin'){ ?>
                                <span class="badge badge-warning">IZIN</span>
                            <?php  } ?>
                            </center>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
</div>
<?php
    require 'template/footer.php';
?>
<!-- <script type="text/javascript">
    $(document).ready(function(){ 
         // set interval 1 detik
         setInterval(function(){
            // baca waktu saat ini 
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            // cek kesesuaian waktu saat ini dg waktu skedul auto click
                    if (time == "23:40:30") { 
                    document.querySelector('#AlfaKaryawan').click[0];
                }
            console.log(time);    
         }, 1000);
    });
    </script> -->