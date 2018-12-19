<?php
include '../helper/koneksi.php';

$nama = $_POST['search'];

$query = "SELECT * FROM events WHERE judul_event LIKE '%{$nama}%' AND deleted = 0";

if (mysqli_query($con, $query)) {
    header("Location: ../indexUser.php");
} else {
    echo "<script> alert('Data tidak berhasil di delete'); window.location = '../myEvent.php';</script>";
}

mysqli_close($con); 
?>