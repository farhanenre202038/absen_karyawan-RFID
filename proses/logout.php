<?php
    session_start();
    include '../db/koneksi.php';
    $id = $_SESSION['id'];
    $query = mysqli_query($koneksi,"UPDATE tbl_admin SET status='offline' WHERE id='$id'");
    session_destroy();
    header("location:../index.php?keluar");
?>