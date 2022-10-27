<?php
    include '../../db/koneksi.php';
    date_default_timezone_set("Asia/Makassar");

    if(isset($_POST['absen_foto'])){
        $extensi_boleh = array('png','jpg');
        $nama = $_FILES['file']['name'];
        $formant = explode('.', $nama);
        $extensi = strtolower(end($formant));
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        // batas foto
        $nik = $_POST['nik'];
        $no_kartu = $_POST['no_kartu'];
        $tanggal = date("Y-m-d");
        $waktu = date("H:i:s");

        if(in_array($extensi, $extensi_boleh) === true){
            if($ukuran < 10044070){
                move_uploaded_file($file_tmp, '../../tmp/'.$nama);
                $query = mysqli_query($koneksi,"INSERT INTO tbl_absen VALUES('','$no_kartu','$tanggal','$waktu','','HADIR','$nama')");
                $query_history = mysqli_query($koneksi,"INSERT INTO tbl_history VALUE('','$tanggal','$nik','$waktu','','aplikasi','HADIR','$nama')");
                $query_absen = mysqli_query($koneksi,"UPDATE tbl_karyawan SET status_absen='hadir' WHERE no_kartu='$no_kartu'");
                if($query_history){
                    header("location:../absen_kamera.php?berhasil");
                }else{
                    header("location:../absen_kamera.php?gagal");
                }
            }else{
                header("location:../absen_kamera.php?size");
            }
        }
    }else{
        $nik = $_POST['nik'];
        $no_kartu = $_POST['no_kartu'];
        $tanggal = date("Y-m-d");
        $waktu = date("H:i:s");
        $query_absen = mysqli_query($koneksi,"UPDATE tbl_absen SET jam_keluar='$waktu' WHERE no_kartu='$no_kartu'");
        $query_history = mysqli_query($koneksi,"UPDATE tbl_history SET jam_keluar='$waktu' WHERE nik='$nik' and tanggal_history='$tanggal'");
        header("location:../absen_kamera.php?berhasil");
    }
?>