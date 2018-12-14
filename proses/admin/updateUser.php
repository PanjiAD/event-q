<?php

include '../../helper/koneksi.php';
    
// Get the form update value
$idUsers = $_POST["idUsers"];
$nama = $_POST["nama"];
$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$gambar = $_POST["gambar"];

$code = $_FILES["gambar"]["error"];
  if($code === 0){

    $nama_folder = "gambar";
    $tmp = $_FILES["gambar"]["tmp_name"];
    $nama_file = $_FILES["gambar"]["name"];
    $path = "../../$nama_folder/$nama_file";
    $oldPath = "../../$nama_folder/$gambar";
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
$query = "UPDATE users 
    SET nama = '$nama', username = '$username', pass = '$pass',  email = '$email', gambar_profile = '$nama_file'
    WHERE id_users = '$idUsers'";
}
else{
  $query = "UPDATE users 
    SET nama = '$nama', username = '$username', pass = '$pass',  email = '$email'
    WHERE id_users = '$idUsers'";
}
// Do update query
if (mysqli_query($con, $query)) {
    header("Location: ../../admin/userAdmin.php");
} else {
    $error = urldecode("Data tidak berhasil di update");
    header("Location: ../../admin/formUpdateUser.php?error=$error");
}

// close mysql connection
mysqli_close($con); 

?>