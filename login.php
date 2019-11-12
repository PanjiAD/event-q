<!DOCTYPE HTML>
<html>

	<?php
    session_start();
    // session_destroy();
	$_SESSION['idusers_level'] = null;
    if (isset($_SESSION['username']) and isset($_SESSION['idusers_level'])) {
		
        if ($_SESSION['idusers_level'] == '1') {
            header("location: admin/indexAdmin.php");
        }
        else if ($_SESSION['idusers_level'] == '2'){
            header("location: indexUser.php");
		}
    }
?>

<head>
	<title>Even.com | Log In</title>
	<?php include 'head.php'?>
</head>
<body>
	<?php include 'header.php'?>
	<div class="container login mt-4">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<!-- <img src="gambar/triangle-and-letter-e.png"/> -->
				<h2 class="judulLogin">Let's Get Login</h2>
				<p>Masukkan email dan password untuk login</p>
				<form class="formLogin" action="proses/userLogin.php" method="POST">
					<div class="form-group mt-4">
						<label for="nama" class="mb-2">Email/Username</label>
						<input type="text" name="username" class="form-control" placeholder="Email/Username" required>
					</div>
					<div class="form-group">
						<label for="password" class="mb-2">Password</label>
						<input type="password" class="form-control" name = "password" placeholder="Password" required>
					</div>
					<div class="form-group mb-4 mt-4" >
                        <input type="submit" name="submit" value="submit" class="btn btn-success btn-block">
					</div>
					<center>Belum punya akun EventHits ? <a href="register.php">Daftar</a></center> 
				</form>
			</div>
			
			<div class="col-md-4"></div>
		</div>	
	</div>

	<?php //include 'footer.php'?>
</body>

</html>