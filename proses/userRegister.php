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
                $error = urldecode("Data tidak berhasil ditambahkan");
                header("Location:../register.php?error=$error");
            }
            
            mysqli_close($con);
        }
        else{
            $error = urldecode("Confirm Password tidak sesuai");
            header("Location:../register.php?error=$error");
        }
    }
    else{
        $error = urldecode("Password kurang panjang");
            header("Location:../register.php?error=$error");
    }
    
?>