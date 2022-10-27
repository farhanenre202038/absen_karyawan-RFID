<?php
    session_start();
    if ($_SESSION['status'] == "") {
        header("location:index.php");
    }
    $title = "Karyawan | Absen";
    require 'template/header.php';
    date_default_timezone_set("Asia/Makassar");
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
    .batas{
        margin-top: 10vh;
    }
    .lingkaran{
        width: 200px;
        height: 200px;
        border-radius: 100%;
    }
    .hiden{
        display: none;
    }
</style>
<?php
 require 'template/navbar-top.php';
?>
<div class="jumbotron jumbotron-fluid bg-dark"></div>
<div class="col-md-12">
    <div class="card shadow card-top">
            <div class="card-body">
                <?php
                    include '../db/koneksi.php';
                    $no_kartu = $_SESSION['no_kartu'];
                    $karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE no_kartu='$no_kartu'");
                    $row = mysqli_fetch_assoc($karyawan)              
               ?>
            <?php if($row['status_absen'] == ''){ ?>
            <form action="proses/proses_absen.php" method="POST" enctype="multipart/form-data">
                <table id="data"></table>
                <div class="form-group">
                    <br>
                    <div class="card shadow">
                        <div class="card-body">
                        <label for="file-img">
                        <input type="hidden" name="no_kartu" class="form-control" value="<?= $_SESSION['no_kartu']; ?>">
                        <input type="hidden" name="nik" class="form-control" value="<?= $_SESSION['nik']; ?>">
                            <img id="uploadPreview" src="../img/selfie.png" alt="" width="100%">
                            <input name="file" class="form-control hiden" id="file-img" onchange="PreviewImage();" type="file" required>
                        </label>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" name="absen_foto" class="btn btn-success btn-block">Absen Now</button>
            </form>
            </div>
        </div>
    </div>
<div class="card batas">
    <div class="card-body">

    </div>
</div>
<?php } else{ ?>
    <?php
        $absen_keluar = mysqli_query($koneksi,"SELECT * FROM view_absen WHERE no_kartu='$no_kartu'");
        $data = mysqli_fetch_assoc($absen_keluar)      
    ?>
    <form action="proses/proses_absen.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <table>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= $data['tanggal']; ?></td>
                </tr>
                <tr>
                    <td>Jam Masuk</td>
                    <td>:</td>
                    <td><?= $data['jam_masuk']; ?></td>
                </tr>
                <tr>
                    <td>Jam Keluar</td>
                    <td>:</td>
                    <td><?= $data['jam_keluar']; ?></td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>Makassar</td>
                </tr>
            </table>
            <input type="hidden" name="no_kartu" class="form-control" value="<?= $_SESSION['no_kartu']; ?>">
            <input type="hidden" name="nik" class="form-control" value="<?= $_SESSION['nik']; ?>">
        </div>
    <br>
    <?php if($data['jam_keluar'] == '00:00:00' && $data['status_absen'] == 'hadir'){?>
        <button type="submit" name="absen_keluar" class="btn btn-danger btn-block">Absen Pulang</button>
    <?php }else if($data['status_absen'] == 'sakit'){ ?>
        <center>
            <h5>Status Sakit</h5>
        </center>
    <?php }else if($data['status_absen'] == 'izin'){ ?>
        <center>
            <h5>Status Izin</h5>
        </center>
    <?php }else if($data['status_absen'] == 'alfa'){ ?>
        <center>
            <h5>Status Alfa</h5>
        </center>
        <?php }else{ ?>
            <center>
            <h5>Absen Selesai</h5>
        </center>
        <?php } ?>
</form>
    </div>
</div>
</div>
 <?php } ?>
                
    
<?php
    require 'template/navbar.php';
    require 'template/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $("#data").load('get_absen.php')
        }, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
    });
</script>
<script type="text/javascript">
    function PreviewImage() {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById("file-img").files[0]);
    reader.onload = function (oreader)
    {
        document.getElementById("uploadPreview").src = oreader.target.result;
    };
    };
</script>