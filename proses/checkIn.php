<?php
include '../helper/koneksi.php';
session_start();

$idTiket = $_POST["idTiket"];
$event = $_GET['id'];
$pengguna = $_POST["check"];
$user = "SELECT * FROM users WHERE username = '$pengguna' OR nama = '$pengguna'";
$result = mysqli_query($con, $user);

if(mysqli_num_rows($result) == 1) {
    $nama = mysqli_fetch_assoc($result);
    $users = $nama['id_users'];

    $query = "UPDATE tiket SET status = 1 WHERE id_users = '$users' AND id_events = '$event' AND deleted = 0";

    if (mysqli_query($con, $query)) {
        header("Location: ../kelolaEvent.php?id=$event");
    } else {
        $error = urldecode("Data tidak berhasil di delete");
        header("Location: ../tiket?error=$error");
    }
    mysqli_close($con); 

}
else{
    $error = urldecode("Nama yang diinputkan tak terdaftar");
    header("Location: ../tiket?error=$error");
}
?>