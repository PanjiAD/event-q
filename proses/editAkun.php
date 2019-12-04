<?php
session_start();

include '../helper/koneksi.php';
    
// Get the form update value
$idUsers = $_POST["idUsers"];

if(empty($_POST["nama"])){
    $nama = null;
}else{
    $nama = $_POST["nama"];    
}

if(empty($_POST["username"])){
    $username = null;
}else {
    $username = $_POST["username"];    
}

if(empty($_POST["email"])){
    $email = null;
} else {
    $email = $_POST["email"];
}

if(empty($_POST["pass"])){
    $pass = null;
} else {
    $pass = $_POST["pass"];
}

if(empty($_POST["saldo"])){
    $saldo = null;
} else {
    $saldo = $_POST["saldo"];
}

if(empty($_POST["confirm"])){
    $confirm = null;
}else {
    $confirm = $_POST["confirm"];    
}

if(empty($_POST["gambar"])){
    $gambar = null;
}else{
    $gambar = $_POST["gambar"];    
}

if(empty($_FILES["gambar"]["error"])){
    $code = null;    
} else{
    $code = $_FILES["gambar"]["error"];
}
  if($code === 0){

    $nama_folder = "gambar/profil";
    $tmp = $_FILES["gambar"]["tmp_name"];
    $nama_file = $_FILES["gambar"]["name"];

    $path = "../$nama_folder/$nama_file";
    $oldPath = "../$nama_folder/$gambar";
    $upload_check = false;

    $tipe_file = array("image/jpeg", "image/gif", "image/png");
    if(!in_array($_FILES["gambar"]["type"], $tipe_file))
    {
    	echo "<script> alert('cek kembali ekstensi file anda (*.jpeg,*.jpg,*.png,*.gif,)'); window.location = '../akun.php';</script>";
        $upload_check = true;
    }

    if(!$upload_check AND move_uploaded_file($tmp, $path)){
    	$error = urldecode("Upload Sukses");
    }
    
    else{
    	echo "<script> alert('Upload file gambar gagal'); window.location = '../akun.php';</script>";
    }
  }

// Update query command
if ($pass != '' && $confirm != '') {
    if ($pass == $confirm) {
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
    }
    else{
        echo "<script> alert('Confirm password tidak sesuai'); window.location = '../akun.php?id=$idUsers';</script>";
    }
        
}
else if(isset($saldo)){
    $query = "UPDATE users 
    SET saldo = '$saldo' WHERE id_users = '$idUsers'";
}

else{
    if (isset($nama_file)) {
        $query = "UPDATE users 
            SET nama = '$nama', username = '$username',  email = '$email', gambar_profile = '$nama_file'
            WHERE id_users = '$idUsers'";
    }
    else{
      $query = "UPDATE users 
        SET nama = '$nama', username = '$username',  email = '$email'
        WHERE id_users = '$idUsers'";
    }
}

if (mysqli_query($con, $query)) {
    header("Location: ../akun.php?id=$idUsers");
} else {
    echo "<script> alert('Data tidak berhasil di update'); window.location = '../akun.php?id=$idUsers';</script>";
}
// close mysql connection
mysqli_close($con); 

?>