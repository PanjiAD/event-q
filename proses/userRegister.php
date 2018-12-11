<?php
    include '../helper/koneksi.php';

    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];
    $date = date('Y-m-d H:i:s');

    if ($confirm == $password) {
        $query = "INSERT INTO users(nama, username, pass, email, create_date, idusers_level) VALUES ('$nama', '$username', '$password', '$email', '$date', 2)";

        if(mysqli_query($con, $query)){
            header("Location:../indexLogin.php");
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