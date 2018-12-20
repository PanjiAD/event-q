<?php
	include '../helper/koneksi.php';

	session_start();
	// session_destroy();

    if (isset($_SESSION['username']) and isset($_SESSION['idusers_level'])) {
		if($_SESSION['idusers_level'] == '2'){
			header("location: ../indexUser.php");	
		}
	}
	else {
		header("location: ../login.php");
	}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Event.com | Event Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <?php include 'headerAdmin.php'?>
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Tables</h4>
                            <ul class="breadcrumbs pull-left">
                                <!-- <li><a href="index.html">Home</a></li> -->
                                <li><span>Event</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <?php
                                $user = $_SESSION['username'];
								$query = "SELECT gambar_profile,id_users FROM users WHERE username = '$user'";
								$result = mysqli_query($con, $query);

								if(mysqli_num_rows($result) == 1) {
									$username = mysqli_fetch_assoc($result);
							?>
									<img src="../gambar/profil/<?=$username['gambar_profile']?>" style="width:40px;" class="mr-2"/>
							<?php							
								} else {
									echo "User tidak ditemukan";
								}
							?>
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                            <?php
								echo $_SESSION['username'];
							?> 
                            <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3 class="text-center mt-4">Data Event</h3>
                <?php
                $message = '';
                if(isset($_GET["error"])){
                    $message = $_GET["error"];
                    echo " <p style='color:red; font-style:italic'>$message</p>";
                }
                ?>
                <a href="formAddEvent.php" class="btn btn-success mt-2 mb-3" enctype="multipart/form-data">Tambah Event</a>
                <!-- <div class="row"> -->
                    <table id="event" class="table table-stripped tex-center-mt-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Tanggal</th>
                                <th>Nama Penyelenggara</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM events WHERE deleted = 0";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0){
                                $index = 1; 
                                while($row = mysqli_fetch_assoc($result)){
                                    $id_events = $row["id_events"];
                                    echo "
                                    <tr>
                                    <td>" . $index++ . "</td>
                                    <td width='20%'>" .$row["judul_event"]. "</td>
                                    <td width='13%'>" .$row["tanggal_mulai"]. ' - ' . $row["tanggal_akhir"] ."</td>
                                    <td>" .$row["nama_penyelenggara"]. "</td>
                                    <td>
                                        <button type='button' class='btn btn-outline-primary' data-toggle='modal' 
                                        data-target='#detailEvent".$id_events."'>Detail</button>
                                        <a href='formUpdateEvent.php?id=$id_events' class='btn btn-warning'>Update</a>
                                        <a href='../proses/deleteEvent.php?id=$id_events' class='btn btn-danger'>Delete</a>
                                        </td>
                                    </tr>
                                 ";

                            ?>
                    <div class="modal fade" id="detailEvent<?=$id_events?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> <?=$row['judul_event']?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="idUsers" value="<?php echo $user["id_users"] ?>">
                                  <div class="row">
                                    <div class="col-4">
                                        <img src="../gambar/<?php echo $row['gambar_event']?>"/>
                                    </div>
                                    <div class="col-8">
                                          <div class="row">
                                              <div class="col-3">
                                                <p  style="font-weight:bold;">Nama Penyelenggara </p>
                                                <p  style="font-weight:bold;">Lokasi </p>
                                                <p  style="font-weight:bold;">URL </p>
                                                <p  style="font-weight:bold;">Tanggal </p>
                                                <p  style="font-weight:bold;">Waktu </p>
                                                <p  style="font-weight:bold;">Harga </p>
                                                <p  style="font-weight:bold;">Jumlah Peserta </p>
                                              </div>
                                              <div class="col-9">
                                                <p>: <?=$row['nama_penyelenggara']?></p></br>
                                                <p>: <?=$row['lokasi']?></p>
                                                <p>: <?=$row['urls']?></p>
                                                <p>: <?=$row['tanggal_mulai']?> - <?=$row['tanggal_akhir']?></p>
                                                <p>: <?=$row['waktu_mulai']?> - <?=$row['waktu_akhir']?></p>
                                                <p>: <?=$row['harga']?></p>
                                                <p>: <?=$row['peserta']?></p>
                                              </div>
                                          </div>
                                    </div>
                                  </div>
                                  <p style="font-weight:bold;">Deskripsi Acara</p>
                                        <p><?=$row['deskripsi']?></p>
                             </div>
                          </div>
                        </div>
                    </div>
                            <?php
                                }
                            }
                            mysqli_close($con); 
                            ?>
                        </tbody>
                    </table>
                    

                    

                <!-- </div> -->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Website Event Booking by <a href="https://github.com/PanjiAD" target="_blank"> Panji Awwaludi D ( 19 )</a></p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- Data tables -->
    <script src = "https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src = "https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script>
        table = $('#event').DataTable({
            "lengthMenu": [5, 10,20, 70],
            "pageLength": 5,
            dom: '<t><p>'
        });  
        $('#search').keyup(function(){
            table.search($(this).val()).draw() ;
        });
        
    </script>
</body>

</html>
