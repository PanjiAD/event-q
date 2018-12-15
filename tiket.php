
<?php
	include 'helper/koneksi.php';

	session_start();
	// session_destroy();
    if (isset($_SESSION['username']) and isset($_SESSION['idusers_level'])) {
        if ($_SESSION['idusers_level'] == '1') {
            header("location: admin/indexAdmin.php");
		}
	}
	else {
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Event</title>
    <?php include 'head.php'?>
	
</head>
<body>
<?php include 'header.php';?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-1"></div>
            <div class="col-10 tiketEvent">
                <div class="identitas">
                    <div class="row">
                        <div class="col-2">
                        <?php
								$user = $_SESSION['username'];
								$query = "SELECT gambar_profile FROM users WHERE username = '$user'";
								$result = mysqli_query($con, $query);

								if(mysqli_num_rows($result) == 1) {
									$username = mysqli_fetch_assoc($result);
							?>
									<img src="gambar/<?=$username['gambar_profile']?>"/>
                        <?php
                                }
                        ?>
                        </div>
                        <div class="col-10">
                            <h1>
                            <?php
								echo $_SESSION['username'];
							?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="tiket">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                        <h2 class="mb-3" style="font-size:1.2em">Tiket</h2>
                            <?php
                                $id_user = $_SESSION['id_users'];
                                $query = "SELECT e.*, t.* FROM events as e inner join tiket as t on e.id_events = t.id_events where t.id_users = $id_user AND t.deleted = 0";
                                $result = mysqli_query($con, $query);
                                if(mysqli_num_rows($result) > 0){
                                    $card = 1;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id_events = $row["id_events"];
                                        $id_tiket = $row["id_tiket"];
                            ?>          
                                        <div class="row tiketList">
                                            <div class="col-4">
                                            
                                                <?php echo" <img src='gambar/".$row['gambar_event']."' alt='Card image cap'>"?>
                                            </div>
                                            <div class="col-6">
                                                <div class="eventTitle" style="color:#000"><?php echo $row['judul_event']; ?></div>
                                                <p class="time"><?php echo $row['tanggal_mulai']; ?>, <?php echo $row['waktu_mulai']; ?></p>
									            <p class="place"> <?php echo $row['lokasi']; ?> </p>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center">
                                                <a href="proses/deleteTiket.php?id=<?php echo $id_events?> & idTiket=<?php echo $id_tiket ?>">
                                                    <div class="btnAdd" style="background-color:rgb(243, 49, 23); color:#fff; border: 2px solid rgb(243, 49, 23); margin-left:0px;"><p>Delete</p></div>
                                                </a>
                                            </div>

                                        </div>
                            <?php
                                    }
                                }
                                mysqli_close($con); 
                            ?>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>	
		</div>
	</div>

<?php include 'footer.php'?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>
</body>
</html>
				