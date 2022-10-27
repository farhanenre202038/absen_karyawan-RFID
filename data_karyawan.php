<?php
    $title = "Absensi Karyawan | Data Karyawan";
    require 'template/header.php';
    require 'template/navbar.php';
?>
<style>
    .img-linkar{
        width: 40px;
        height: 40px;
        border-radius: 100%;
    }
</style>
<div class="col-md-9 mt-4">
    <div class="card">
        <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">&plus;</button>
        Data Karyawan    
    </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Lahir</th>
                        <!-- <th>Alamat</th> -->
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $no = 1;
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan");
                        while ($row = mysqli_fetch_assoc($karyawan)){
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><center><img src="img/<?= $row['foto_karyawan'];?>" alt="..." class="img-linkar"></center></td>
                        <td><?= $row['nik']; ?></td>
                        <td><?= $row['nama_karyawan']; ?></td>
                        <td><?= $row['tanggal_lahir']; ?></td>
                        <!-- <td><?= $row['alamat']; ?></td> -->
                        <td><?= $row['email']; ?></td>
                        <td>
                            <button name="edit" data-toggle="modal" data-target="#edit_karyawan<?= $row['nik'];?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-user-pen"></i></button> ||
                            <button name="hapus" class="btn btn-danger btn-sm"><i class="fa-solid fa-delete-left"></i></button>
                        </td>
                    </tr>
                    <div class="modal fade" id="edit_karyawan<?= $row['nik'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $nik = $row['nik'];
                                $qury = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE nik='$nik'");
                                while ($data = mysqli_fetch_assoc($qury)){
                            ?>
                            <form action="proses/proses_karyawan.php" method="POST">
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="no_kartu" value="<?= $data['no_kartu'];?>" readonly required> 
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nik" value="<?= $data['nik'];?>" readonly required> 
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Nama Karyawan :</label>
                                            <input type="text" class="form-control" name="nama_karyawan" value="<?= $data['nama_karyawan'];?>" required> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir :</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir'];?>" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Email :</label>
                                            <input type="email" class="form-control" name="email" value="<?= $data['email'];?>" required> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Password :</label>
                                            <input type="password" class="form-control" name="password" value="<?= $data['passwword'];?>" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="">Jenis Kelamin :</label>
                                    <select name="jk" id="" class="form-control">
                                        <option value="<?= $data['jk']; ?>">
                                        <?php
                                            if($data['jk'] == 'L'){
                                                echo 'Laki - Laki';
                                            }else{
                                                echo 'Perempuan';
                                            }
                                        ?>
                                        </option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select> 
                                </div>
                                <label for="">Alamat :</label>
                                <textarea  class="form-control" name="alamat"  id="" cols="10" rows="3"><?= $data['alamat'];?></textarea>
                            </div>
                        <?php $no++; } ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="ubah_karyawan" class="btn btn-primary">Submit</button>
                            </form>  
                        </div>
                        </div>
                    </div>
                    </div>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
<!-- modal input data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proses/proses_karyawan.php" method="POST">
        <div id="norfid"></div>
        <script type="text/javascript">
                    $(document).ready(function(){
                        setInterval(function(){
                            $("#norfid").load('nokartu.php')
                        }, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
                    });
                </script>
            <div class="form-group">
                <label for="">Nomor Induk Kependudukan :</label>
                <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Anda" required> 
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nama Karyawan :</label>
                        <input type="text" class="form-control" name="nama_karyawan" placeholder="Masukkan Nama Anda" required> 
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir :</label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Nama Anda" required> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" required> 
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin :</label>
                    <select name="jk" id="" class="form-control">
                        <option disabled selected>:: Jenis Kelamin ::</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select> 
                </div>
            <label for="">Alamat :</label>
            <textarea placeholder="Masukkan Alamat :" class="form-control" name="alamat" id="" cols="10" rows="3"></textarea>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="input_karyawan" class="btn btn-primary">Submit</button>
        </form>  
    </div>
    </div>
  </div>
</div>
</div>

<?php
    require 'template/footer.php';
?>
