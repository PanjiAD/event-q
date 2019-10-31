<?php
include '../helper/koneksi.php';

$idUsers = $_POST["idUsers"];
$saldo = $_POST['saldo'];

$query = 'UPDATE users SET saldo = $saldo WHERE id_users = $idUsers';
die($query);

if (mysqli_query($con, $query)) {
    header("Location: ../akun.php?id=$idUsers");
} else {
    echo "<script> alert('Data tidak berhasil di update'); window.location = '../akun.php?id=$idUsers';</script>";
}
// close mysql connection
mysqli_close($con); 
?>