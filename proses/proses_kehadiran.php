<?php
   include '../db/koneksi.php';
   date_default_timezone_set("Asia/Makassar");
   $nik = $_GET['nik'];
   $no_kartu = $_GET['no_kartu'];
   $info = $_GET['info'];
   $tanggal = date("Y-m-d");
   $waktu_masuk = date("H:i:s");
   $waktu_keluar = date("H:i:s");
   // query
   $query_karyawan = mysqli_query($koneksi,"SELECT * FROM view_absen WHERE nik='$nik'");
   $data = mysqli_fetch_assoc($query_karyawan);
   $cek_data = mysqli_query($koneksi,"SELECT * FROM tbl_absen WHERE no_kartu='$no_kartu'");
   $cek = mysqli_num_rows($cek_data);
   
   if($cek > 0){
      echo "<script>window.alert('Silahkan Lakukan Besok')
            window.location='../monitoring.php'</script>";
   }else{
      if($info == 'hadir' && $no_kartu == $no_kartu ){
         $query = mysqli_query($koneksi,"INSERT INTO tbl_absen VALUE('','$no_kartu','$tanggal','$waktu_masuk','','HADIR','')");
         $query_history = mysqli_query($koneksi,"INSERT INTO tbl_history VALUE('','$tanggal','$nik','$waktu_masuk','','admin','HADIR','')");
         $query_absen = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='$info' WHERE no_kartu='$no_kartu'");
         header('location:../monitoring.php?berhasilh');
      }else if($info == 'sakit' && $no_kartu == $no_kartu){
         $query = mysqli_query($koneksi,"INSERT INTO tbl_absen VALUE('','$no_kartu','$tanggal','','','SAKIT','')");
         $query = mysqli_query($koneksi,"INSERT INTO tbl_history VALUE('','$tanggal','$nik','','','admin','SAKIT','')");
         $query_absen = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='$info' WHERE no_kartu='$no_kartu'");
         header('location:../monitoring.php?berhasils');
      }else if($info == 'izin' && $no_kartu == $no_kartu){
         $query = mysqli_query($koneksi,"INSERT INTO tbl_absen VALUE('','$no_kartu','$tanggal','','','IZIN','')");
         $query_history = mysqli_query($koneksi,"INSERT INTO tbl_history VALUE('','$tanggal','$nik','','','admin','IZIN','')");
         $query_absen = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='$info' WHERE no_kartu='$no_kartu'");
         header('location:../monitoring.php?berhasil');
      }else if($info == 'alfa' && $no_kartu == $no_kartu){
         $query = mysqli_query($koneksi,"INSERT INTO tbl_absen VALUE('','$no_kartu','$tanggal','','','ALFA','')");
         $query_history = mysqli_query($koneksi,"INSERT INTO tbl_history VALUE('','$tanggal','$nik','','','admin','ALFA','')");
         $query_absen = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='$info' WHERE no_kartu='$no_kartu'");
         header('location:../monitoring.php?berhasil');
      }
   }
   
   if($info == 'keluar' && $no_kartu == $no_kartu){
      $query_absen = mysqli_query($koneksi,"UPDATE tbl_absen SET jam_keluar='$waktu_keluar' WHERE no_kartu='$no_kartu'");
      $query_history = mysqli_query($koneksi,"UPDATE tbl_history SET jam_keluar='$waktu_keluar' WHERE nik='$nik' and tanggal_history='$tanggal'");
      // $query_karyawan = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='alfa' WHERE no_kartu='$no_kartu'");
      header('location:../monitoring.php?berhasil');
   }
 
   
?>