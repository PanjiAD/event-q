<?php
    include '../../helper/koneksi.php';

    $kategori = $_POST["kategori"];

        $query = "INSERT INTO kategori(jenis_kategori, deleted) VALUES ('$kategori', 0)";

        if(mysqli_query($con, $query)){
            header("Location: ../../admin/kategoriAdmin.php");
        }
        else{
            echo "<script> alert('Data tidak berhasil di tambahkan'); window.location = '../../admin/formAddKategori.php';</script>";
        }
        mysqli_close($con);
?>