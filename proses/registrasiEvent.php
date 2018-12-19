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
$kuota = "SELECT COUNT(id_users) AS kuota FROM tiket WHERE id_events = $idEvents";

$jumlah = mysqli_query($con, $kuota);
$kuota_user = mysqli_fetch_assoc($jumlah);
$kuota = $kuota_user['kuota'];


$hasil = mysqli_query($con, $pemilik);
if(mysqli_num_rows($hasil) == 1) {
    $regis = mysqli_fetch_assoc($hasil);
    $regis1 = $regis['id_users'];
    $harga = $regis['harga'];
    $peserta = $regis['peserta'];
} 
else {
    echo "<script> alert('User tidak ditemukan'); window.location = '../detailEvent.php?id=$idEvents';</script>";
}


if ($regis1 == $id_users) {
    echo "<script> alert('Maaf, Anda tidak bisa mendaftar pada acara anda sendiri'); window.location = '../detailEvent.php?id=$idEvents';</script>";
}

else{
    if ($kuota <= $peserta) {
        $hasil = mysqli_query($con, $uang);
        if(mysqli_num_rows($hasil) == 1) {
            $saldo = mysqli_fetch_assoc($hasil);
            $saldo = $saldo['saldo'];
        } else {
            echo "<script> alert('User tidak ditemukan'); window.location = '../detailEvent.php?id=$idEvents';</script>";
        }

        $bayar = $saldo - $harga;

        $query = "INSERT INTO tiket( id_users , id_events , status , deleted) VALUES ( '$id_users' , '$idEvents' , 0 , 0)";
        $query1 = "UPDATE users SET saldo = $bayar WHERE id_users = $id_users";
        
        if ($saldo >= $harga) {
            if(mysqli_query($con, $query) && mysqli_query($con, $query1)){
                header("Location: ../tiket.php");
            }
            else{
                echo "<script> alert('Tiket tidak berhasil ditambahkan'); window.location = '../detailEvent.php?id=$idEvents';</script>";
            }
            mysqli_close($con);
        }
        
        else {
            echo "<script> alert('Saldo anda telah habis :('); window.location = '../detailEvent.php?id=$idEvents';</script>";
        }
    } 
    else{
        echo "<script> alert('Kuota peserta telah habis'); window.location = '../detailEvent.php?id=$idEvents';</script>";
    }

    
}
    

?>
