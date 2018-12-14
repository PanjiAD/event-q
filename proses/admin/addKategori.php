<?php
    include '../../helper/koneksi.php';

    $kategori = $_POST["kategori"];

        $query = "INSERT INTO kategori(jenis_kategori, deleted) VALUES ('$kategori', 0)";

        if(mysqli_query($con, $query)){
            header("Location: ../../admin/kategoriAdmin.php");
        }
        else{
            $error = urldecode("Data tidak berhasil ditambahkan");
            header("Location: ../../admin/formAddKategori.php?error=$error");
        }
        mysqli_close($con);
?>