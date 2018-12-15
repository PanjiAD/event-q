<?php

include '../helper/koneksi.php';
    
// Get the form update value
$idEvents = $_POST["idEvents"];
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

$code = $_FILES["gambar"]["error"];
  if($code === 0){

    $nama_folder = "gambar";
    $tmp = $_FILES["gambar"]["tmp_name"];
    $nama_file = $_FILES["gambar"]["name"];
    $path = "../$nama_folder/$nama_file";
    $oldPath = "../$nama_folder/$gambar";
    $upload_check = false;

    $tipe_file = array("image/jpeg", "image/gif", "image/png");
    if(!in_array($_FILES["gambar"]["type"], $tipe_file))
    {
    	$error = urldecode("cek kembali ekstensi file anda (*.jpeg,*.jpg,*.png,*.gif,)<br>");
    	header("Location: ../../admin/formUpdateUser.php?error=$error");
    	die();
      $upload_check = true;
    }
    
    if(!$upload_check AND move_uploaded_file($tmp,$path)){
    	$error = urldecode("Upload Sukses");
    }
    else{
    	$error = urldecode("Upload Gagal");
    	header("Location: ../../admin/formUpdateUser.php?error=$error");
    	die();
    }
  }

// Update query command
if (isset($nama_file)) {
    $query = "UPDATE events 
    SET judul_event = '$judul_event', lokasi = '$lokasi', urls = '$url',  gambar_event = '$nama_file', tanggal_mulai = '$tanggal_mulai', tanggal_akhir = '$tanggal_akhir', waktu_mulai = '$waktu_mulai', waktu_akhir = '$waktu_akhir', harga = '$harga', peserta = '$peserta', deskripsi = '$deskripsi', nama_penyelenggara = '$instansi' WHERE id_events = '$idEvents' ";
}
else{
    $query = "UPDATE events 
    SET judul_event = '$judul_event', lokasi = '$lokasi', urls = '$url', tanggal_mulai = '$tanggal_mulai', tanggal_akhir = '$tanggal_akhir', waktu_mulai = '$waktu_mulai', waktu_akhir = '$waktu_akhir', harga = '$harga', peserta = '$peserta', deskripsi = '$deskripsi', nama_penyelenggara = '$instansi' WHERE id_events = '$idEvents' ";
}



// Do update query
if (mysqli_query($con, $query)) {
    header("Location: ../myEvent.php");
} else {
    $error = urldecode("Data tidak berhasil di update");
    header("Location: ../editEvent.php?error=$error");
}

// close mysql connection
mysqli_close($con); 

?>