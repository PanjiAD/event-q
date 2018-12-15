<?php
    include '../helper/koneksi.php';

    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];
    $date = date('Y-m-d H:i:s');
    
    
    if ($confirm == $password) {
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
                header("Location:../register.php?error=$error");
                die();
            }

            move_uploaded_file($tmp,$path);
        } 
        elseif ($code === 4) {
            $error = urldecode("UPLOAD GAGAL!, TIDAK TERUPLOAD");
            header("Location:../register.php?error=$error");
        } 
        else {
            $error = "Upload gagal";
            header("Location:../register.php?error=$error");
        }

        $query = "INSERT INTO users(nama, username, pass, email, gambar_profile, create_date, saldo, deleted, idusers_level) VALUES ('$nama', '$username', '$password', '$email', '$nama_file' , '$date', 0, 0, 2)";

        if(mysqli_query($con, $query)){
            header("Location:../indexUser.php");
        }
        else{
            $error = urldecode("Data tidak berhasil ditambahkan");
            header("Location:../register.php?error=$error");
        }
        
        mysqli_close($con);
    }
    else{
        $error = urldecode("Confirm Password tidak sesuai");
            header("Location:../register.php?error=$error");
    }
?>