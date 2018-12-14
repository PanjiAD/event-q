<?php
include '../../helper/koneksi.php';

$id_users = $_GET["id"];
$deleted = $_GET["deleted"];
$query = "UPDATE users SET deleted = 1 WHERE id_users = ('$id_users')";

if (mysqli_query($con, $query)) {
    header("Location: ../../admin/userAdmin.php");
} else {
    $error = urldecode("Data tidak berhasil di delete");
    header("Location:../../admin/formAddUser.php?error=$error");
}

mysqli_close($con); 

?>