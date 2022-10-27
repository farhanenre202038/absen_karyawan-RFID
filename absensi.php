<?php
    $title = "Absensi Karyawan | Absensi";
    require 'template/header.php';
    require 'template/navbar.php';
?>
<div class="col-md-9 mt-4">
    <div class="card">
        <div class="card-header">
        Absensi Karyawan  
    </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Kartu</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db/koneksi.php';
                        $query_jadwal = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal");
                        $jam = mysqli_fetch_assoc($query_jadwal);
                        $no = 1;
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM view_absen");
                        while ($row = mysqli_fetch_assoc($karyawan)){
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['no_kartu']; ?></td>
                        <td><?= $row['nik']; ?></td>
                        <?php if($row['status_absen'] == 'hadir'){ ?>
                            <td><?= $row['nama_karyawan']; ?> <span class="badge badge-success">Hadir</span></td>
                        <?php } else if($row['status_absen'] == 'sakit') { ?> 
                            <td><?= $row['nama_karyawan']; ?> <span class="badge badge-info">Sakit</span></td>
                        <?php }else if($row['status_absen'] == 'izin'){ ?>
                            <td><?= $row['nama_karyawan']; ?> <span class="badge badge-warning">Izin</span></td>
                        <?php }else{ ?>
                            <td><?= $row['nama_karyawan']; ?> <span class="badge badge-danger">Alfa</span></td>
                        <?php } ?>
                        <td><?= $row['tanggal']; ?></td>
                         <!-- Jam Masuk -->
                        <?php if($jam['jam_masuk'] >= $row['jam_masuk']){ ?>
                            <td><?= $row['jam_masuk']; ?></td>
                        <?php } else { ?> 
                            <td><?= $row['jam_masuk']; ?> <span class="badge badge-danger">Terlambat</span></td>
                        <?php } ?>
                        <!-- Jam Keluar -->
                        <?php if($row['jam_keluar'] == '00:00:00'){ ?>
                            <td><?= $row['jam_keluar']; ?></td>
                        <?php } else { ?> 
                            <td><?= $row['jam_keluar']; ?> <span class="badge badge-danger">Keluar</span></td>
                        <?php } ?>
                        <td>
                        <?php if($row['bukti_foto'] == ''){ ?>
                            <span class="badge badge-secondary">No Foto</span>
                        <?php } else { ?> 
                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sml"> <i class="fa-solid fa-file-image"></i></button>
                        <?php } ?>
                        </td>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title">
                                        Bukti Foto
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <div class="modal-body">
                                        <center>
                                            <img src="tmp/<?= $row['bukti_foto']; ?>" alt="" width="80%">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    