<?php
	session_start();
	// session_destroy();

    if (isset($_SESSION['username']) and isset($_SESSION['idusers_level'])) {
        if ($_SESSION['idusers_level'] == '2') {
            header("location: indexUser.php");
        }
        else if ($_SESSION['idusers_level'] == '') {
            header("location: index.php");
        }
	}
    if (isset($_GET['pesan'])) {
        $mess = "<p> {$_GET['pesan']}</p>";
    }
    else{
        $mess = " ";
    };
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <?php include 'head.php'?>
</head>
<body>
    <?php include 'header.php' ?>
</body>
</html>