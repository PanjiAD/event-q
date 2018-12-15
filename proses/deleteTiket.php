<?php
include '../helper/koneksi.php';
session_start();

$id_event = $_GET["id"];
$id_tiket = $_GET["idTiket"];
$id_user = $_SESSION['id_users'];
$query = "UPDATE tiket SET deleted = 1 WHERE id_tiket = $id_tiket AND id_events = $id_event AND id_users = $id_user";

if (mysqli_query($con, $query)) {
    header("Location: ../tiket.php");
} else {
    $error = urldecode("Data tidak berhasil di delete");
    header("Location: ../tiket?error=$error");
}

mysqli_close($con); 

?>