<?php
    $title = "Absensi Karyawan | History";
    require 'template/header.php';
    require 'template/navbar.php';
?>
<div class="col-md-9 mt-4">
    <div class="card">
        <div class="card-header">
        Data History Kehadiran  
    </div>
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-4">
                        <input type="date" name="tanggal_p" id="" class="form-control"> 
                    </div>
                    <div class="col-4">
                       <input type="date" name="tanggal_k" id="" class="form-control">
                    </div>
                    <div class="col-4">
                        <button type="submit" name="filter_tanggal" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Methode</th>
                        <th>Status</th>
                        <th>Bukti Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $query_jadwal = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal");
                        $jam = mysqli_fetch_assoc($query_jadwal);
                        $no = 1;
                        if(isset($_POST['filter_tanggal'])){
                            $tanggal_p = mysqli_real_escape_string($koneksi, $_POST['tanggal_p']);
                            $tanggal_k = mysqli_real_escape_string($koneksi, $_POST['tanggal_k']);             
                            if($tanggal_p != null || $tanggal_k != null){
                                $history = mysqli_query($koneksi,"SELECT * FROM view_history WHERE tanggal_history BETWEEN '$tanggal_p' AND '$tanggal_k'");
                            }else{
                                $history = mysqli_query($koneksi,"SELECT * FROM view_history");
                            }
                        }else{
                            $history = mysqli_query($koneksi,"SELECT * FROM view_history ORDER BY tanggal_history DESC");
                        }
                        
                        while ($row = mysqli_fetch_assoc($history)){
                    ?>
                    <tr>
                       <td><?= $no; ?></td>
                       <td><?= $row['nik']; ?></td>
                       <td><?= $row['nama_karyawan']; ?></td>
                       <td><?= $row['tanggal_history']; ?></td>
                       <?php if($jam['jam_masuk'] >= $row['jam_masuk']){ ?>
                            <td><?= $row['jam_masuk']; ?></td>
                        <?php } else { ?> 
                            <td><?= $row['jam_masuk']; ?> <span class="badge badge-danger">Terlambat</span></td>
                        <?php } ?>
                       <td><?= $row['jam_keluar']; ?></td>
                       <td><?= $row['methode_absen']; ?></td>
                       <td>
                        <?php if($row['status_karyawan'] == 'HADIR'){ ?>
                            <span class="badge badge-success">Hadir</span>
                        <?php } else if($row['status_karyawan'] == 'SAKIT') { ?> 
                            <span class="badge badge-info">Sakit</span>
                        <?php }else if($row['status_karyawan'] == 'IZIN'){ ?>
                            <span class="badge badge-warning">Izin</span>
                         <?php  }else{ ?>
                            <span class="badge badge-danger">Alfa</span>
                         <?php } ?>
                        </td>
                       <td>
                        <?php if($row['bukti_foto'] == ''){ ?>
                            <span class="badge badge-secondary">No Foto</span>
                        <?php } else { ?> 
                            <span class="badge badge-warning">Ada Foto</span>
                            <!-- <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sml"> <i class="fa-solid fa-file-image"></i></button> -->
                        <?php } ?>
                        </td>
                    </tr>
                    <?php 
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
  
<?php
    require 'template/footer.php';
?>