<?php
include '../../helper/koneksi.php';

$id_kategori = $_GET["id"];
$query = "UPDATE kategori SET deleted = 1 WHERE id_kategori = ('$id_kategori')";

if (mysqli_query($con, $query)) {
    header("Location: ../../admin/kategoriAdmin.php");
} else {
    echo "<script> alert('Data tidak berhasil di delete'); window.location = '../../admin/kategoriAdmin.php';</script>";
}

mysqli_close($con); 

?>