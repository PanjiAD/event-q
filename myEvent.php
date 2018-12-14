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

<!DOCTYPE HTML>
<html>
<head>
	<title>EvenHits | Login</title>
	<?php include 'head.php'?>
</head>
<body>
	<?php include 'header.php'?>
	<div class="container" >
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="kelolaEvent" >
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                        <h2 class="mb-3 mt-4" style="font-size:2.1em;">Kelola Event</h2>
                            <?php
                                $id_user = $_SESSION['id_users'];
                                $query = "SELECT * FROM events WHERE id_users = $id_user";
                                $result = mysqli_query($con, $query);
                                if(mysqli_num_rows($result) > 0){
                                    $card = 1;
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id_events = $row["id_events"];
                            ?>          
                                        <div class="row eventList">
                                            
                                            <div class="col-6">
                                                <div id="judul" style="color:#000"><?php echo $row['judul_event']; ?></div>
                                                <p class="time"><?php echo $row['tanggal_mulai']; ?></p>
									            <p class="place"> <?php echo $row['lokasi']; ?> </p>
                                            </div>
                                                 <a href="editEvent.php?id= <?php echo $id_events?>" class="d-flex justify-content-center align-items-center">
                                                    <div class="btnAdd"><p>Edit</p></div>
                                                 </a>
                                                 <a href="preview.php?id=<?php echo$id_events?>" class="d-flex justify-content-center align-items-center">
                                                     <div class="btnAdd"><p>Prefiew</p></div>
                                                 </a>
                                                 <a href="#" class="d-flex justify-content-center align-items-center">
                                                    <div class="btnAdd" style="background-color:rgb(243, 49, 23); color:#fff; border: 2px solid rgb(243, 49, 23);"><p>Manage</p></div>
                                                 </a>
                                        </div>
                            <?php
                                    }
                                }
                                mysqli_close($con); 
                            ?>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
	<?php include 'footer.php'?>
</body>

</html>