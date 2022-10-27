<?php
    include '../../db/koneksi.php';
    // ubah profil
    if(isset($_POST['ubah_karyawan'])){
        $extensi_boleh = array('png','jpg');
        $nama = $_FILES['file']['name'];
        $formant = explode('.', $nama);
        $extensi = strtolower(end($formant));
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        // $no_kartu = $_POST['no_kartu'];
        $nik = $_POST['nik'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        // $email = $_POST['email'];
        // $password = md5($_POST['password']);
        $alamat = $_POST['alamat'];

        if(in_array($extensi, $extensi_boleh) === true){
            if($ukuran < 5044070){
                move_uploaded_file($file_tmp, '../../img/'.$nama);
                $query = mysqli_query($koneksi,"UPDATE tbl_karyawan SET nama_karyawan='$nama_karyawan', tanggal_lahir='$tanggal_lahir',alamat='$alamat', foto_karyawan='$nama' WHERE nik='$nik'");
                if($query){
                    header("location:../profil.php?berhasil");
                }else{
                    header("location:../profil.php?gagal");
                }
            }else{
                header("location:../profil.php?size");
            }
        }else{
            header("location:../profil.php?formant");
            $query = mysqli_query($koneksi,"UPDATE tbl_karyawan SET nama_karyawan='$nama_karyawan', tanggal_lahir='$tanggal_lahir',alamat='$alamat' WHERE nik='$nik'");
            if($query){
                header("location:../profil.php?berhasil"); 
            }else{
                header("location:../profil.php?gagal"); 
            }
        }
    }
        
    // ubah password
    if(isset($_POST['ganti_password'])){
        $email = $_POST['email'];
        $password_lama = md5($_POST['password_lama']);
        $password_baru = md5($_POST['password_baru']);
        $konf_password = md5($_POST['konf_password']);

        $query = mysqli_query($koneksi,"SELECT * FROM tbl_karyawan WHERE email='$email' and password='$password_lama'");
        $cek = mysqli_num_rows($query);
        if(!$cek>=1){
            header("location:../profil.php?gagal");
        }else if($password_baru != $konf_password){
            header("location:../profil.php?gagal-validasi");
        }else{
            $update_password = mysqli_query($koneksi,"UPDATE tbl_karyawan SET password='$password_baru' WHERE email='$email'");
            if($update_password){
                header("location:../profil.php?berhasil");
            }else{
                header("location:../profil.php?gagal-simpan");
            }
        }
    }
?>