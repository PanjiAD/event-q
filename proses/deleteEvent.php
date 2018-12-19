<?php
include '../helper/koneksi.php';
session_start();

$prev = $_SERVER['HTTP_REFERER'];
$id_event = $_GET["id"];
$query = "UPDATE events SET deleted = 1 WHERE id_events = $id_event";

if ($prev == 'http://localhost/web_project/admin/eventAdmin.php') {
    if (mysqli_query($con, $query)) {
        header("Location: ../admin/eventAdmin.php");
    } else {
        echo "<script> alert('Data tidak berhasil di delete'); window.location = '../admin/eventAdmin.php';</script>";
    }
}
else{
    if (mysqli_query($con, $query)) {
        header("Location: ../myEvent.php");
    } else {
        echo "<script> alert('Data tidak berhasil di delete'); window.location = '../myEvent.php';</script>";
    }
}
mysqli_close($con); 

?>