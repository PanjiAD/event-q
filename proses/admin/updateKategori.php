<?php

include '../../helper/koneksi.php';
    
// Get the form update value
$idKategori = $_POST["idKategori"];
$jenis = $_POST["jenis"];

$query = "UPDATE kategori 
    SET jenis_kategori = '$jenis' WHERE id_kategori = '$idKategori'";

// Do update query
if (mysqli_query($con, $query)) {
    header("Location: ../../admin/kategoriAdmin.php");
} else {
    echo "<script> alert('Data tidak berhasil di update'); window.location = '../../admin/formUpdateKategori.php';</script>";
}

// close mysql connection
mysqli_close($con); 

?>