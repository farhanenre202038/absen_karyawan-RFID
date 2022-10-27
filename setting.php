<?php
    $title = "Absensi Karyawan | Pengaturan";
    require 'template/header.php';
    require 'template/navbar.php'; 
?>

<style>
        .lingkaran{
        width: 200px;
        height: 200px;
        border-radius: 100%;
    }
</style>

<div class="col-md-5 mt-4">
    <div class="card">
        <div class="card-header">
            Status Perangkat
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/devais.png" alt="" width="100vh">
                </div>
                <div class="col-md-9">
                <?php
                    // Mendapatkan jenis web browser pengunjung
                    function get_client_browser() {
                        $browser = '';
                        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
                            $browser = 'Netscape';
                        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
                            $browser = 'Firefox';
                        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
                            $browser = 'Chrome';
                        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
                            $browser = 'Opera';
                        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
                            $browser = 'Internet Explorer';
                        else
                            $browser = 'Other';
                        return $browser;
                    }

                        echo "Browser : ".get_client_browser()."<br>";
                        echo "Sistem Operasi : ".$_SERVER['HTTP_USER_AGENT'];
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
        <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm">&plus;</button>   Data Akun
        </div>
        <div class="card-body">
        <table class="table table-sm table-striped table-bordered table-responsive-xl" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Admin</th>
                        <th>Username</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $admin = mysqli_query($koneksi,"SELECT * FROM tbl_admin");
                        while ($row = mysqli_fetch_assoc($admin)){
                    ?>
                    <tr>
                        <td><?= $row['nama_admin']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td>
                            <?php
                                if($row['status'] == 'online'){
                                    echo'<span class="badge badge-success"> </span> Online';
                                }else{
                                    echo'<span class="badge badge-danger"> </span> Offline';
                                }
                            ?>
                        </td>
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
            Profil Admin
       </div>
       <div class="card-body">
        <form action="proses/proses_admin.php" method="post" enctype="multipart/form-data">
       <?php
                    include 'db/koneksi.php';
                    $id = $_SESSION['id'];
                    $qury = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE id='$id'");
                    while ($data = mysqli_fetch_assoc($qury)){
                ?>  
                    <center>
                        <div class="img-upload">
                            <label for="file-input">
                                <img id="uploadPreview" src="img/<?= $data['foto']; ?>" alt="" class="lingkaran">
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
                            <input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Admin</label>
                            <input type="text" name="nama_admin" class="form-control" value="<?= $data['nama_admin']; ?>" required>
                        </div>
                <?php } ?>
                        <br>
                    <button type="submit" name="ubah_admin" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- input data admin -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proses/proses_admin.php" method="POST">
            <div class="form-group">
                <label for="">Nama Lenkap :</label>
                <input type="text" name="nama_admin" class="form-control" placeholder="Masukkan nama lengkap anda" required>
            </div>
            <div class="form-group">
                <label for="">Username :</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" required>
            </div>
            <div class="form-group">
                <label for="">Password :</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required>
            </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="input_admin" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
<?php
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