<?php
    include '../../helper/koneksi.php';

    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO users(nama, username, pass, email, create_date, idusers_level, deleted) VALUES ('$nama', '$username', '$password', '$email', '$date', 2, 0)";

        if(mysqli_query($con, $query)){
            header("Location: ../../admin/userAdmin.php");
        }
        else{
            echo "<script> alert('Data tidak berhasil di tambahkan'); window.location = '../../admin/formAddeUser.php';</script>";
        }
        mysqli_close($con);
    
?>