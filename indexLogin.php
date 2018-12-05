<!DOCTYPE html>
<html>

<?php
    session_start();

    if (isset($_SESSION['username']) and isset($_SESSION['level'])) {
        if ($_SESSION['level'] == '1') {
            header("location: indexAdmin.php");
        }
        else{
            header("location: indexLogin.php");
        }
    }

    if (isset($_GET['pesan'])) {
        $mess = "<p> {$_GET['pesan']}</p>";
    }
    else{
        $mess = " ";
    }
?>

<head>
    <title>Booking Event</title>
    <?php include 'head.php'?>
	
</head>
<body>
<?php include 'headerUser.php'?>
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
  							<button class="btn dropdown-toggle" type="button" id="kategori" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Kategori
 							</button>
 							<div class="dropdown-menu" aria-labelledby="tanggal">
 							  <button class="dropdown-item" type="button">Action</button>
 							  <button class="dropdown-item" type="button">Another action</button>
 							  <button class="dropdown-item" type="button">Something else here</button>
 							</div>
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
			<div class="col-4">
				<div class="card" style="width: 22rem;">
  					<img class="card-img-top" src="gambar/bromo.jpg" alt="Card image cap">
  					<div class="card-body">
  					  	<div class="row">
							<div class="col-3">
								<p class="month">Jan</p>
								<p class="day">20</p>
							</div>
							<div class="col-9">
								<div class="eventTitle">
									<h2>Trip to BROMO 2018</h2>
								</div>
								<p class="time">Sab, Jas 20, 10.00 WIB</p>
								<p class="place"> Jl Semanggi barat, Malang, Jawa Timur</p>
								<p class="status_ticket">Free</p>
							</div>	
						</div>
  					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" style="width: 22rem;">
  					<img class="card-img-top" src="gambar/bromo.jpg" alt="Card image cap">
  					<div class="card-body">
  					  	<div class="row">
							<div class="col-3">
								<p class="month">Jan</p>
								<p class="day">20</p>
							</div>
							<div class="col-9">
								<div class="eventTitle">
									<h2>Trip to BROMO 2018</h2>
								</div>
								<p class="time">Sab, Jas 20, 10.00 WIB</p>
								<p class="place"> Jl Semanggi barat, Malang, Jawa Timur</p>
								<p class="status_ticket">Free</p>
							</div>	
						</div>
  					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" style="width: 22rem;">
  					<img class="card-img-top" src="gambar/bromo.jpg" alt="Card image cap">
  					<div class="card-body">
  					  	<div class="row">
							<div class="col-3">
								<p class="month">Jan</p>
								<p class="day">20</p>
							</div>
							<div class="col-9">
								<div class="eventTitle">
									<h2>Trip to BROMO 2018</h2>
								</div>
								<p class="time">Sab, Jas 20, 10.00 WIB</p>
								<p class="place"> Jl Semanggi barat, Malang, Jawa Timur</p>
								<p class="status_ticket">Free</p>
							</div>	
						</div>
  					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<div class="card" style="width: 22rem;">
  					<img class="card-img-top" src="gambar/bromo.jpg" alt="Card image cap">
  					<div class="card-body">
  					  	<div class="row">
							<div class="col-3">
								<p class="month">Jan</p>
								<p class="day">20</p>
							</div>
							<div class="col-9">
								<div class="eventTitle">
									<h2>Trip to BROMO 2018</h2>
								</div>
								<p class="time">Sab, Jas 20, 10.00 WIB</p>
								<p class="place"> Jl Semanggi barat, Malang, Jawa Timur</p>
								<p class="status_ticket">Free</p>
							</div>	
						</div>
  					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" style="width: 22rem;">
  					<img class="card-img-top" src="gambar/bromo.jpg" alt="Card image cap">
  					<div class="card-body">
  					  	<div class="row">
							<div class="col-3">
								<p class="month">Jan</p>
								<p class="day">20</p>
							</div>
							<div class="col-9">
								<div class="eventTitle">
									<h2>Trip to BROMO 2018</h2>
								</div>
								<p class="time">Sab, Jas 20, 10.00 WIB</p>
								<p class="place"> Jl Semanggi barat, Malang, Jawa Timur</p>
								<p class="status_ticket">Free</p>
							</div>	
						</div>
  					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" style="width: 22rem;">
  					<img class="card-img-top" src="gambar/bromo.jpg" alt="Card image cap">
  					<div class="card-body">
  					  	<div class="row">
							<div class="col-3">
								<p class="month">Jan</p>
								<p class="day">20</p>
							</div>
							<div class="col-9">
								<div class="eventTitle">
									<h2>Trip to BROMO 2018</h2>
								</div>
								<p class="time">Sab, Jas 20, 10.00 WIB</p>
								<p class="place"> Jl Semanggi barat, Malang, Jawa Timur</p>
								<p class="status_ticket">Free</p>
							</div>	
						</div>
  					</div>
				</div>
			</div>
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