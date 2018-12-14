<?php
include '../helper/koneksi.php';

session_start();

    if (empty($_SESSION['username']) and empty($_SESSION['idusers_level'])) {
        header("location: ../login.php");
        die();
    }

$id_users = $_SESSION["id_users"];
$idEvents = $_POST["idEvents"];
$noTiket = uniqid('HitsEvent_');

$query = "INSERT INTO tiket( no_tiket , id_users , id_events , checks ) VALUES ( '$noTiket' , '$id_users' , '$idEvents' , 0 )";

if(mysqli_query($con, $query)){
    header("Location: ../tiket.php");
}
else{
    $error = urldecode("Tiket tidak berhasil ditambahkan");
    header("Location:../detailEvent.php?error=$error");
}
mysqli_close($con);
?>