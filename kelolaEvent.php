<?php
    include 'helper/koneksi.php';

	session_start();
	// session_destroy();
    $id_events = $_GET["id"]; 

    if (isset($_SESSION['username']) and isset($_SESSION['idusers_level'])) {
        if ($_SESSION['idusers_level'] == '1') {
            header("location: admin/indexAdmin.php");
		}
	}
	else {
		header("location: login.php");
    }
    
    $query = "SELECT * FROM events WHERE id_events = $id_events";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) == 1) {
        $event = mysqli_fetch_assoc($result);
        $idEvents = $event["id_events"];
	} else {
	    echo "Event tidak ditemukan";
    }
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>EvenHits | Login</title>
	<?php include 'head.php'?>
</head>
<body>
	<?php include 'header.php'?>
	<div class="container manageEvent" >
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 manage">
                <h4>Event Dashboard</h4>
                <h2>Tiket</h2>
                <div class="row">
                    <div class="col-6">
                        <h3>Tiket Terjual</h3>
                        <span class="hasil">
                            <?php
                                $total = "SELECT COUNT(id_events) AS total FROM tiket WHERE id_events = $idEvents";
                                $result = mysqli_query($con, $total);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                            ?>
                        </span>
                        <span class="asli">/
                            <?php
                                echo $event['peserta'];
                            ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <h3>Sisa Tiket</h3>
                        <span class="hasil">
                            <?php
                                $total = "SELECT COUNT(id_events) AS total FROM tiket WHERE id_events = $idEvents";
                                $result = mysqli_query($con, $total);
                                $row = mysqli_fetch_assoc($result);
                                $terjual = $row['total'];
                                $total_tiket = $event['peserta'];
                                $sisa = $total_tiket - $terjual;
                                echo $sisa;
                            ?>
                        </span>
                        <span class="asli">/
                            <?php
                                echo $event['peserta'];
                            ?>
                        </span>
                    </div>
                </div>
                <h2>Form Check In</h2>
                <?php
                    $query = "SELECT id_events FROM tiket WHERE id_events = '$idEvents'";
					$result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result) != 1) {
                        $tiket = mysqli_fetch_assoc($result);
                    }
                    else{
                        echo "Tiket tidak ditemukan";
                    }
				?>
                <form action="proses/checkIn.php?id=<?php echo $idEvents?>" method="post">
                <input type="hidden" name="idTiket" value="<?php echo $tiket["id_events"] ?>">
                    <div class="row">
                        <div class="col-10">
                            <input type="text" name="check" class="form-control" placeholder="Nama Peserta" required>
                        </div>
                        <div class="col-2">
                            <input type="submit" name="submit" value="Check In" class="btn btn-success">
                        </div>
                        <p class="ml-3 mt-2" style="color:#6d6c6c"> Jumlah Peserta Check In : 
                        <?php
                                $total = "SELECT COUNT(status) AS total FROM tiket WHERE id_events = '$idEvents' AND status = 1";
                                $result = mysqli_query($con, $total);
                                $row = mysqli_fetch_assoc($result);
                                $cekIn = $row['total'];

                                echo $cekIn;
                                echo '/';
                                   
                                $total = "SELECT COUNT(id_events) AS total FROM tiket WHERE id_events = $idEvents";
                                $result = mysqli_query($con, $total);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                            ?></p>    
                    </div>                
                </form>
                <a name="backBtn" id="backBtn" class="btn btn-dark btn-block mt-4" href="myEvent.php" role="button">Kembali</a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
	<?php include 'footer.php'?>
</body>

</html>