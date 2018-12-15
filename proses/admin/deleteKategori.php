<?php
include '../../helper/koneksi.php';

$id_kategori = $_GET["id"];
$query = "UPDATE kategori SET deleted = 1 WHERE id_kategori = ('$id_kategori')";

if (mysqli_query($con, $query)) {
    header("Location: ../../admin/kategoriAdmin.php");
} else {
    $error = urldecode("Data tidak berhasil di delete");
    header("Location:../../admin/kategoriAdmin.php?error=$error");
}

mysqli_close($con); 

?>