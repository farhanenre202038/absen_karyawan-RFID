<?php
    // session_start();
    include '../db/koneksi.php';
    date_default_timezone_set("Asia/Makassar");
    $query = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE status_absen='alfa'");
    $data = mysqli_fetch_assoc($query);
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");

?>
<tr>
    <td>Tanggal</td>
    <td>:</td>
    <td><?= $tanggal ?></td>
</tr>
<tr>
    <td>Jam Sekarang</td>
    <td>:</td>
    <td><?= $waktu; ?></td>
</tr>
<tr>
    <td>Lokasi</td>
    <td>:</td>
    <td>Makassar</td>
</tr>