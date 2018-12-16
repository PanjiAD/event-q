<?php
include '../helper/koneksi.php';
session_start();

$id_event = $_GET["id"];
$query = "UPDATE events SET deleted = 1 WHERE id_events = $id_event";

die($query);
if (mysqli_query($con, $query)) {
    header("Location: ../myEvent.php");
} else {
    echo "<script> alert('Data tidak berhasil di delete'); window.location = '../myEvent.php';</script>";
}
mysqli_close($con); 

?>