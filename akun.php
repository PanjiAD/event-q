
<?php
	include 'helper/koneksi.php';

	session_start();
	// session_destroy();
    $id_user = $_GET['id'];

    if (isset($_SESSION['username']) and isset($_SESSION['idusers_level'])) {
        if ($_SESSION['idusers_level'] == '1') {
            header("location: admin/indexAdmin.php");
		}
	}
	else {
		header("location: login.php");
    }
    
    $query = "SELECT * FROM users WHERE id_users = $id_user";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
	} else {
        echo "Event tidak ditemukan";
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

<div class="container ">
    <div class="row">
    <div class="col-1"></div>
    <div class="col-10 cardProfil">
        <div class="row p-3">
            <div class="col-4 foto">
            <?php
					$user = $_SESSION['username'];
					$query = "SELECT gambar_profile FROM users WHERE username = '$user'";
					$result = mysqli_query($con, $query);
					if(mysqli_num_rows($result) == 1) {
                        $username = mysqli_fetch_assoc($result);
            ?>          
						<img src="gambar/profil/<?=$username['gambar_profile']?>"/>
            <?php
                    }
            ?>
            </div>
            <div class="col-6 profil m-3">
                
                <?php
                    $query = "SELECT * FROM users WHERE username = '$user'";
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result) > 0){
                        $user = mysqli_fetch_assoc($result);
                        ?>
                        <div class="row">
                            <div class="col-10">
                                <div class="nama" style="font-size:2.5em"><?php echo $user['nama']?> </div>
                                <div class="tanggal mb-3" style="color:rgb(121, 121, 121); font-size:0.9em"> Bergabung pada <?php echo $user['create_date']?> </div>
                            </div>
                            <div class="col-2 mt-4">
                                <button type="button" class="btn" data-toggle="modal" data-target="#editAkun" style="background-color:rgb(243, 49, 23); color:#fff; border: 2px solid rgb(243, 49, 23);"><i class="fas fa-pencil-alt mr-2"></i>Edit Akun</button>
                            </div>
                        </div>
                    <div class="form-group row isi">
                        <label class="col-md-4">Username</label>
                        <div class="col-md-8">
                            <div class="username">: <?php echo $user['username']?></div>       
                        </div>                     
                    </div>
                    <div class="form-group row isi">
                        <label class="col-md-4">Email</label>
                        <div class="col-md-8">       
                            <div class="email">: <?php echo $user['email']?> </div>
                        </div>                     
                    </div>
                    <div class="form-group row isi">
                        <label class="col-md-4">Saldo</label>
                        <div class="col-md-8">       
                            <div class="saldo">: Rp <?php echo $user['saldo']?>
                                <button type="button" class="btn" data-toggle="modal" data-target="#editRekening" ><i class="fas fa-donate"></i> Top Up</button>
                            </div>
                        </div>                     
                    </div>
                    <div class="form-group row isi">
                        <label class="col-md-4">Jumlah event </label>
                        <div class="col-md-8">       
                            <div class="event">:
                            <?php
                                $user1 = $user['id_users'];
                                $event = "SELECT COUNT(id_users) AS events FROM events WHERE id_users = '$user1'";
                                $total_event = mysqli_query($con, $event);
                                $row = mysqli_fetch_assoc($total_event);
                                $event = $row['events'];
                                echo $event.' event';
                                ?>
                            </div>
                        </div>                     
                    </div>
                    <div class="form-group row isi">
                        <label class="col-md-4">Jumlah Tiket </label>
                        <div class="col-md-8">       
                            <div class="tiket">: 
                            <?php 
                                $tiket = "SELECT COUNT(id_users) AS tikets FROM tiket WHERE id_users = '$user1'";
                                $total_tiket = mysqli_query($con, $tiket);
                                $row1 = mysqli_fetch_assoc($total_tiket);
                                $tiket = $row1['tikets'];
                                echo $tiket.' Tiket';
                            ?> 
                            </div>
                        </div>                     
                    </div>
                <?php
                    }
			    ?>
                </div>
        </div>
    </div>
    <div class="col-1"></div>
    </div>
</div>

<div class="modal fade" id="editAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/editAkun.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="idUsers" value="<?php echo $user["id_users"] ?>">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Foto Profil:</label>
                      <img src="gambar/profil/<?php echo $user['gambar_profile']?>"/>
                      <input type="hidden" name="gambar" value="<?php echo($username["gambar_profile"]) ?>"></br>
                       <input type="file" name="gambar">
                    </div>
                </div>
                    <div class="col-8">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $user["nama"] ?>" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Username:</label>
                                  <input type="text" name="username" class="form-control" value="<?php echo $user["username"] ?>" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Password:</label>
                                  <input type="password" name="pass" class="form-control" placeholder="Password">
                                </div>
                            </div>
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Email:</label>
                                  <input type="email" name="email" class="form-control" value="<?php echo $user["email"] ?>" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Confirm Password:</label>
                                    <input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
       </div>
      <div class="modal-footer">
            <input type="submit" name="submit" value="Kirim Perubahan" class="btn btn-success">
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editRekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/editAkun.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="idUsers" value="<?php echo $user["id_users"] ?>">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Saldo:</label>
                  <input type="number" name="saldo" class="form-control" value="<?php echo $user["saldo"] ?>" placeholder="Saldo" required>
                </div>
       </div>
      <div class="modal-footer">
            <input type="submit" name="submit" value="Kirim Perubahan" class="btn btn-success">
      </div>
      </form>
    </div>
  </div>
</div>

<?php include 'footer.php'?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>
</body>
</html>
				