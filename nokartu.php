<?php
    error_reporting(0);
    include 'db/koneksi.php';
    $nokartu_karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_rfid");
    $data_karyawan = mysqli_fetch_array($nokartu_karyawan);

    $kartu = $data_karyawan['no_kartu'];

?>

<div class="form-group">
    <label for="">No Kartu :</label>
    <input type="text" class="form-control" name="no_kartu" placeholder="Tempelkan Kartu Anda" readonly value="<?= $kartu; ?>" required> 
</div>