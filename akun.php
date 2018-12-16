
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
                            <div class="col-9"><div class="nama"><?php echo $user['nama']?> </div></div>
                            <div class="col-3 mt-4">
                                <button type="button" class="btn" data-toggle="modal" data-target="#editAkun" style="background-color:rgb(243, 49, 23); color:#fff; border: 2px solid rgb(243, 49, 23);"><i class="fas fa-pencil-alt mr-2"></i>Edit</button>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-md-5">Username</label>
                        <div class="col-md-6">
                            <div class="username">: <?php echo $user['username']?></div>       
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Email</label>
                        <div class="col-md-6">       
                            <div class="email">: <?php echo $user['email']?> </div>
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Saldo</label>
                        <div class="col-md-6">       
                            <div class="saldo">: Rp <?php echo $user['saldo']?> </div>
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Jumlah event </label>
                        <div class="col-md-6">       
                            <div class="event">:
                            <?php
                                $user = $user['id_users'];
                                $event = "SELECT COUNT(id_users) AS events FROM events WHERE id_users = '$user'";
                                $total_event = mysqli_query($con, $event);
                                $row = mysqli_fetch_assoc($total_event);
                                $event = $row['events'];
                                echo $event.' event';
                                ?>
                            </div>
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Jumlah Tiket </label>
                        <div class="col-md-6">       
                            <div class="tiket">: 
                            <?php 
                                $tiket = "SELECT COUNT(id_users) AS tikets FROM tiket WHERE id_users = '$user'";
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>
</body>
</html>
				