<?php 

include '../helper/koneksi.php';
session_start();
$error = '';

if (!empty($_POST["username"]) || !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $level = $row["idusers_level"];

        if($level == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["idusers_level"] = $level;
            header("Location: ../indexAdmin.php");
        } 
        else {
            $_SESSION["username"] = $username;
            $_SESSION["idusers_level"] = $level;
            header("Location: ../indexLogin.php");
        }
    } 
    else{
        $error = urldecode("Username atau Password tidak valid");
        header("Location: ../login.php?pesan=$error");
    }

    mysqli_close($con);
}

else{
    echo "masuk";
    die();
    $error = urlencode("Username atau password kosong!");
    header("Location: ../login.php?pesan=$error");
}

?>