<?php

include '../helper/koneksi.php';

session_start();

$prev = $_SERVER['HTTP_REFERER'];

$judul_event = $_POST["judul"];
$lokasi = $_POST["lokasi"];
$url = $_POST["url"];
$deskripsi = $_POST["deskripsi"];
$tanggal_mulai = date('Y-m-d', strtotime($_POST['tanggal_mulai']));
$waktu_mulai = $_POST["waktu_mulai"];
$tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));
$waktu_akhir = $_POST["waktu_akhir"];
$optradio = $_POST["optradio"];
$harga = $_POST["harga"];
$peserta = $_POST["peserta"];
$instansi = $_POST["instansi"];
$kategori = $_POST["kategori"];
$id_users = $_SESSION["id_users"];

$date = date('Y-m-d');
   
// H:i:s
$code = $_FILES["file"]["error"];
    if ($code == 0) {
        $pesan = "";
        $nama_folder="gambar";
        $tmp = $_FILES["file"]["tmp_name"];
        $nama_file=$_FILES["file"]["name"];
        $path = "../$nama_folder/$nama_file";

        $tipe_file = array("image/jpeg", "image/gif", "image/png");
        if (!in_array($_FILES["file"]["type"],$tipe_file)) {
            $error = urldecode("tipe file salah");
            header("Location:../addEvent.php?error=$error");
            die();
        }

        if (move_uploaded_file($tmp,$path)) {
            $error = "Upload Sukses";
        }
 
    } elseif ($code === 4) {
        echo "<script> alert('Gagal upload gambar'); window.location = '../addEvent.php';</script>";
    } else {
        echo "<script> alert('Data tidak berhasil di update'); window.location = '../addEvent.php';</script>";
    }

$query = "INSERT INTO events( judul_event , lokasi , urls , gambar_event , tanggal_mulai , tanggal_akhir , waktu_mulai , waktu_akhir , harga , peserta, deskripsi , create_date , nama_penyelenggara , deleted, id_users, id_kategori) VALUES ( '$judul_event' , '$lokasi' , '$url' , '$nama_file' , '$tanggal_mulai' , '$tanggal_akhir' , '$waktu_mulai' , '$waktu_akhir' , '$harga' , '$peserta', '$deskripsi' , '$date' , '$instansi' , 0 , '$id_users' , '$kategori' )";


if ($prev == 'http://localhost/web_project/admin/formAddEvent.php') {
    if(mysqli_query($con, $query)){
        header("Location:../admin/eventAdmin.php");
    }
    else{
        echo "<script> alert('Data tidak berhasil di tambahkan'); window.location = '../admin/eventAdmin.php';</script>";
    }
}

else{
    if(mysqli_query($con, $query)){
        header("Location:../indexUser.php");
    }
    else{
        echo "<script> alert('Data tidak berhasil di tambahkan'); window.location = '../addEvent.php';</script>";
    }
}

mysqli_close($con);
?>