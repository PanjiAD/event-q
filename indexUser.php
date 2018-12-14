
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
    // if (isset($_GET['pesan'])) {
    //     $mess = "<p> {$_GET['pesan']}</p>";
    // }
    // else{
    //     $mess = " ";
    // };
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Event</title>
    <?php include 'head.php'?>
	
</head>
<body>
<?php include 'header.php';?>
	<div class="container findEvent mt-3 mb-2">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="row">	
					<div class="col-4">
						<label for="event" class="mb-2" style="font-style:bold">Pencarian Event</label>
						<input type="text" name="event" id="event" class="form-control" placeholder="Event">
					</div>
					<div class="col-4">
						<label for="lokasi" class="mb-2" style="font-style:bold">Kategori</label>
						<div class="dropdown">
 							<select name="kategori" cols="10" rows="5" class="form-control" > 
                                    <?php
                                        $query = "SELECT * FROM kategori WHERE deleted = 0";
                                        $result = mysqli_query($con, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            $kategori = 1;
                                            while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                                <option value=" <?php echo $row['id_kategori']?>"> <?php echo $row['jenis_kategori']?> </option>        
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
						</div>
					</div>
					<div class="col-4">
					<label for="tanggal" class="mb-2" style="font-style:bold">Tanggal</label>
						<input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal">
					</div>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class="content-box">
		<div class="wrap">
			<form></form>
			<div class="clear"></div>
		</div>
	</div>

	<div class="container anyEvent">
		<div class="row">
				<?php
					$query = "SELECT * FROM events";
					$result = mysqli_query($con, $query);

					if(mysqli_num_rows($result) > 0){
					$card = 1;
					while($row = mysqli_fetch_assoc($result)){
					$id_events = $row["id_events"];
					?>
					<div class="col-4">
					<div class="card" style="width: 22rem;">
					<?php echo" <a href='detailEvent.php?id=$id_events'><img class='card-img-top' src='gambar/" .$row['gambar_event']."' alt='Card image cap'></a>"?>
  						<div class="card-body">
  						  	<div class="row">
								<div class="col-3">
									<p class="month">Jan</p>
									<p class="day">20</p>
								</div>
								<div class="col-9">
									<div class="eventTitle">
										<h2> <?php echo $row['judul_event']; ?> </h2>
									</div>
									<p class="time"><?php echo $row['tanggal_mulai']; ?>, <?php echo $row['waktu_mulai']; ?></p>
									<p class="place"> <?php echo $row['lokasi']; ?> </p>
									<p class="status_ticket"><?php 
									if ($row['harga'] == 0) {
										echo 'free';
									}
									else{
										echo $row['harga'];	
									}
									 ?> </p>
								</div>	
							</div>
  						</div>
					</div>
					</div>
				<?php		
					}
				}
				mysqli_close($con); 
				?>
		</div>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4"></div>
			<div class="col-4"></div>
		</div>
	</div>

<?php include 'footer.php'?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>
</body>
</html>
				