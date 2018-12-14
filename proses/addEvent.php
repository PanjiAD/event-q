<?php

include '../helper/koneksi.php';

session_start();

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
        $error = urldecode("UPLOAD GAGAL!, TIDAK TERUPLOAD");
        header("Location:../addEvent.php?error=$error");
    } else {
        $error = "Upload gagal";
        header("Location:../addEvent.php?error=$error");
    }

$query = "INSERT INTO events( judul_event , lokasi , urls , gambar_event , tanggal_mulai , tanggal_akhir , waktu_mulai , waktu_akhir , harga , peserta, deskripsi , create_date , nama_penyelenggara , id_users, id_kategori) VALUES ( '$judul_event' , '$lokasi' , '$url' , '$nama_file' , '$tanggal_mulai' , '$tanggal_akhir' , '$waktu_mulai' , '$waktu_akhir' , '$harga' , '$peserta', '$deskripsi' , '$date' , '$instansi' , '$id_users' , '$kategori' )";

if(mysqli_query($con, $query)){
    header("Location:../indexUser.php");
}
else{
    $error = urldecode("Data tidak berhasil ditambahkan");
    header("Location:../addEvent.php?error=$error");
}

mysqli_close($con);
?>