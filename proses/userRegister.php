<?php
    include '../helper/koneksi.php';

    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];
    $date = date('Y-m-d H:i:s');
    
    if (strlen($password) >= 6 ) {
        if ($confirm == $password) {

            $query = "INSERT INTO users(nama, username, pass, email, create_date, saldo, deleted, idusers_level) VALUES ('$nama', '$username', '$password', '$email' , '$date', 0, 0, 2)";
    
            if(mysqli_query($con, $query)){
                header("Location:../indexUser.php");
            }
            else{
                echo "<script> alert('Data tidak berhasil di tambahkan'); window.location = '../register.php';</script>";
            }
            
            mysqli_close($con);
        }
        else{
            echo "<script> alert('Confirm password tidak sesuai'); window.location = '../register.php';</script>";
        }
    }
    else{
        echo "<script> alert('Password minimal 6 karakter'); window.location = '../register.php';</script>";
    }
    
?>