<?php
include '../helper/koneksi.php';

session_start();

    if (empty($_SESSION['username']) and empty($_SESSION['idusers_level'])) {
        header("location: ../login.php");
        die();
    }

$id_users = $_SESSION["id_users"];
$idEvents = $_POST["idEvents"];

$pemilik = "SELECT * FROM events WHERE id_events = $idEvents";
$uang = "SELECT saldo FROM users WHERE id_users = $id_users";

$hasil = mysqli_query($con, $pemilik);
if(mysqli_num_rows($hasil) == 1) {
    $regis = mysqli_fetch_assoc($hasil);
    $regis1 = $regis['id_users'];
    $harga = $regis['harga'];
} 
else {
    echo "User tidak ditemukan";
}


if ($regis1 == $id_users) {
    $error = urldecode("Anda tidak bisa mendaftar ke acara anda sendiri");
    header("Location:../detailEvent.php?error=$error");
}

else{

    $hasil = mysqli_query($con, $uang);
    if(mysqli_num_rows($hasil) == 1) {
        $saldo = mysqli_fetch_assoc($hasil);
        $saldo = $saldo['saldo'];
    } else {
        echo "User tidak ditemukan";
    }

    $bayar = $saldo - $harga;
    
    $query = "INSERT INTO tiket( id_users , id_events , status , deleted) VALUES ( '$id_users' , '$idEvents' , 0 , 0)";
    $query1 = "UPDATE users SET saldo = $bayar WHERE id_users = $id_users";

    if ($saldo >= $bayar) {
        if(mysqli_query($con, $query) && mysqli_query($con, $query1)){
            header("Location: ../tiket.php");
        }
        else{
            $error = urldecode("Tiket tidak berhasil ditambahkan");
            header("Location:../detailEvent.php?error=$error");
        }
        mysqli_close($con);
    }
    else {
        $error = urldecode("Saldo anda telah habis");
        header("Location:../detailEvent.php?error=$error");
    }
}
    

?>
