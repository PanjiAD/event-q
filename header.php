
<?php
// 	include 'helper/koneksi.php';
	
	$level = $_SESSION['idusers_level'];

	 if($level == 2){
?>
	<div class="header-top">
	<div class="wrap"> 
		<div class="logo">
			<a href="index.php"><img src="gambar/eventcinemas-logo.png" alt="" /></a>
		</div>
		<div class="cssmenu">
		
			<nav class="navbar navbar-expand-sm">
					<div class="collapse navbar-collapse" >
					<ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="Userindex.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="addEvent.php">Buat Acara</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="akun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php
								$user = $_SESSION['username'];
								$query = "SELECT gambar_profile,id_users FROM users WHERE username = '$user'";
								$result = mysqli_query($con, $query);

								if(mysqli_num_rows($result) == 1) {
									$username = mysqli_fetch_assoc($result);
							?>
									<img src="gambar/profil/<?=$username['gambar_profile']?>"/>
							<?php							
								} else {
									echo "User tidak ditemukan";
								}
								echo ' '.$_SESSION['username'];
							?>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownId">
								<a class="dropdown-item mb-1" href="akun.php?id=<?php echo $username['id_users']?>"><i class="fas fa-user-circle mr-2"></i> Akun</a>
								<a class="dropdown-item mb-1" href="tiket.php"><i class="fas fa-ticket-alt mr-2"></i> Tiket</a>
								<a class="dropdown-item mb-1" href="myEvent.php"><i class="fas fa-calendar-check mr-2"></i> Kelola Event</a>
								<a class="dropdown-item mb-1" href="logout.php" style="border-top:1px solid;"><i class="fas fa-sign-out-alt mr-2"></i> Log Out</a>
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
					<ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
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

