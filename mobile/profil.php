<?php
    session_start();
    if ($_SESSION['status'] == "") {
        header("location:index.php");
    }
    $title = "Karyawan | Profil";
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
    .batas{
        margin-top: 10vh;
    }
    .lingkaran{
        width: 200px;
        height: 200px;
        border-radius: 100%;
    }
</style>
<?php
 require 'template/navbar-top.php';
?>
<div class="jumbotron jumbotron-fluid bg-dark"></div>
<div class="col-md-12">
    <div class="card shadow card-top">
            <div class="card-body">
                <form action="proses/proses_profil.php" method="post" enctype="multipart/form-data">
                <?php
                    include '../db/koneksi.php';
                    $nik = $_SESSION['nik'];
                    $qury = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE nik='$nik'");
                    while ($data = mysqli_fetch_assoc($qury)){
                ?>  
                    <center>
                        <div class="img-upload">
                            <label for="file-input">
                                <img id="uploadPreview" src="../img/<?= $data['foto_karyawan']; ?>" alt="" class="lingkaran">
                            </label>
                        </div>
                    </center>
                    <br>
                    <div class="form-group">
                        <input name="file" class="form-control" id="file-input" onchange="PreviewImage();" type="file">
                        <small><i>Ukuran file foto 1MB & Formant Jpg, Png</i></small>
                    </div>
                    <hr>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="nik" class="form-control" value="<?= $data['nik']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <input type="text" name="nama_karyawan" class="form-control" value="<?= $data['nama_karyawan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir']; ?>" required>
                        </div>
                        <label for="">Alamat :</label>
                            <textarea  class="form-control" name="alamat"  id="" cols="10" rows="3"><?= $data['alamat'];?></textarea>
                <?php } ?>
                        <br>
                        <button type="submit" name="ubah_karyawan" class="btn btn-primary btn-block">Simpan</button>
                </form>
                <hr>
                <form action="proses/proses_profil.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="email" value="<?= $_SESSION['email']; ?>">
                        <label for="">Kata Sandi Lama</label>
                        <input type="password" class="form-control" name="password_lama" placeholder="Kata Sandi Lama Anda">
                    </div>
                    <div class="form-group">
                        <label for="">Kata Sandi Baru</label>
                        <input type="password" class="form-control" name="password_baru" placeholder="Kata Sandi Baru Anda">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" name="konf_password" placeholder="Konfirmasi Kata Sandi Anda">
                    </div>
                    <button type="submit" name="ganti_password" class="btn btn-warning btn-block">Ubah Kata Sandi</button>
                </form>
            </div>  
        </div>
    </div>
<br>
<div class="card batas">
    <div class="card-body">

    </div>
</div>
<?php
    require 'template/navbar.php';
    require 'template/footer.php';
?>
<script type="text/javascript">
    function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file-input").files[0]);
    oFReader.onload = function (oFREvent)
    {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
    };
</script>