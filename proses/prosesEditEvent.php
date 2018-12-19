<?php

include '../helper/koneksi.php';
    
// Get the form update value
$prev = $_SERVER['HTTP_REFERER'];

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
        echo "<script> alert('cek kembali ekstensi file anda (*.jpeg,*.jpg,*.png,*.gif,)'); window.location = '../editEvent.php?id=$idEvents';</script>";
        $upload_check = true;
    }
    
    if(!$upload_check AND move_uploaded_file($tmp,$path)){
    	$error = urldecode("Upload Sukses");
    }
    else{
    	echo "<script> alert('Gagal upload gambar'); window.location = '../editEvent.php?id=$idEvents';</script>";
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
if ($prev == "http://localhost/web_project/admin/formUpdateEvent.php?id=$idEvents") {
    if (mysqli_query($con, $query)) {
        header("Location: ../admin/eventAdmin.php");
    } else {
        echo "<script> alert('Data tidak berhasi di update'); window.location = '../admin/formUpdateEvent.php?id=$idEvents';</script>";
    }
}
else{
    if (mysqli_query($con, $query)) {
        header("Location: ../myEvent.php");
    } else {
        echo "<script> alert('Data tidak berhasi di update'); window.location = '../editEvent.php?id=$idEvents';</script>";
    }
}



// close mysql connection
mysqli_close($con); 

?>