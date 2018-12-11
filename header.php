
<?php
	include 'helper/koneksi.php';
	
	$level = $_SESSION['idusers_level'];

	if ($level == 1) {
?>
	<div class="header-top">
	<div class="wrap">
		<div class="logo">
			<a href="index.php"><img src="gambar/eventcinemas-logo.png" alt="" /></a>
		</div>
		<div class="cssmenu">
			<nav class="navbar navbar-expand-sm">
					<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="event.php">Acara</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="addEvent.php">Buat Acara</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="akun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="gambar/business-man.png"/> 
							<?php
								$query = "SELECT * FROM users";
								$result = mysqli_query($con, $query);
								$username = mysqli_fetch_assoc($result);
								echo $username['username'];
							?>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownId">
								<a class="dropdown-item" href="#">Akun</a>
								<a class="dropdown-item" href="#">Tiket</a>
								<a class="dropdown-item" href="#">Kelola Event</a>
								<a class="dropdown-item" href="logout.php">Log Out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="clear"></div>
	</div>
	</div>

<?php
	} else if($level == 2){
?>
	<div class="header-top">
	<div class="wrap">
		<div class="logo">
			<a href="index.php"><img src="gambar/eventcinemas-logo.png" alt="" /></a>
		</div>
		<div class="cssmenu">
			<nav class="navbar navbar-expand-sm">
					<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="event.php">Acara</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="addEvent.php">Buat Acara</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="akun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="gambar/business-man.png"/> Panji Awwaludi D </a>
							<div class="dropdown-menu" aria-labelledby="dropdownId">
								<a class="dropdown-item" href="#">Akun</a>
								<a class="dropdown-item" href="#">Tiket</a>
								<a class="dropdown-item" href="#">Kelola Event</a>
								<a class="dropdown-item" href="logout.php">Log Out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="buttons">
            <nav class="navbar navbar-expand-sm navbar-light">
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						
					</ul>
				</div>
			</nav>
		</div>
		<div class="clear"></div>
	</div>
	</div>

<?php
	} else{
?>
	<div class="header-top">
		<div class="wrap">
			<div class="logo">
				<a href="index.php"><img src="gambar/eventcinemas-logo.png" alt="" /></a>
			</div>
			<div class="cssmenu">
			<nav class="navbar navbar-expand-sm">
					<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="event.php">Acara</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="addEvent.php">Buat Acara</a>
						</li>
						<div class="button">
							<div class="login_btn">
								<a href="login.php">Login</a>
							</div>
							<div class="get_btn">
								<a href="register.php">Regiser</a>
							</div>
						</div>
						
					</ul>
				</div>
			</nav>
		</div>
			<div class="clear"></div>
		</div>
	</div>
<?php
	}
?>

