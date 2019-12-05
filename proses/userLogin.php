<?php 

include '../helper/koneksi.php';
session_start();
$error = '';

if (!empty($_POST["username"]) || !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND pass = '$password'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $flag = $row["deleted"];
        
        if ($flag == 0) {
            $idkategori = $row["id_users"];
            $level = $row["idusers_level"];

            if($level == 1) {
                $_SESSION["username"] = $username;
                $_SESSION["idusers_level"] = $level;
                $_SESSION["id_users"] = $idkategori;
                header("Location: ../admin/eventAdmin.php");
            } 
            else {
                $_SESSION["username"] = $username;
                $_SESSION["idusers_level"] = $level;
                $_SESSION["id_users"] = $idkategori;
                header("Location: ../index.php");
            }
        }
        else {
            echo "<script> alert('Akun sudah terhapus'); window.location = '../login.php';</script>";
        }
        
    } 
    else{
        echo "<script> alert('Username atau Password tidak valid'); window.location = '../login.php';</script>";
    }

    mysqli_close($con);
}

else{
    echo "<script> alert('Username atau Password kosong'); window.location = '../login.php';</script>";
}

?>