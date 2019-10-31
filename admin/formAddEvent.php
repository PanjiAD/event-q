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
    // if (isset($_GET['pesan'])) {
    //     $mess = "<p> {$_GET['pesan']}</p>";
    // }
    // else{
    //     $mess = " ";
    // };
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Event.com | Add Event Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Data tables -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
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
                                <li><a href="eventAdmin.php">Event</a></li>
                                <li><span>Add Event</span></li>
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
            <div class="bodyAdd">
            <h3 class="text-center mt-4">Tambah Event</h3>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="form-group mt-4">
                    <form class="formLogin" action="../proses/addEvent.php" method="POST" enctype="multipart/form-data">
					    	<label for="judul" class="mb-2">Judul Event</label>
					    	<input type="text" name="judul" class="form-control" placeholder="Ketik judul acara disini" required>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="lokasi" class="mb-2">Lokasi</label>
					    	<input type="text" name="lokasi" class="form-control" placeholder="Masukkan alamat lengkap tempat dimana acara akan diselenggarakan.
                            " required>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="url" class="mb-2">URL</label>
					    	<input type="url" name="url" class="form-control" placeholder="Masukkan tautan Google Map petunjuk arah dimana lokasi acara
                            " required>
                        </div>
                        <div class="form-group mt-4">
                            <label class="mb-2">Gambar Sampul</label></br>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group mt-4">
					    	<label for="deskripsi" class="mb-2">Deskripsi</label>
                            <textarea name="deskripsi" cols="10" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <label for="kategori" class="col-form-label">Kategori</label>
                                <select name="kategori" cols="10" rows="5" class="form-control" required> 
                                    <?php
                                        $query = "SELECT * FROM kategori WHERE deleted = 0";
                                        $result = mysqli_query($con, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // $kategori = 1;
                                            while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                                <option value=" <?php echo $row['id_kategori']?>"> <?php echo $row['jenis_kategori']?> </option>        
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="form-group mt-4">
					        <label for="tanggal" class="mb-2" style="font-style:bold">Waktu Mulai</label>
                            <div class="row">
                                <div class="col-6">
						            <input type="date" name="tanggal_mulai" class="form-control" placeholder="Tanggal">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="waktu_mulai" class="form-control" placeholder="Masukkan waktu dimulainya acara" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
					        <label for="tanggal" class="mb-2" style="font-style:bold">Waktu Akhir</label>
                            <div class="row">
                                <div class="col-6">
						            <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="waktu_akhir" class="form-control" placeholder="Masukkan waktu berakhirnya acara" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="harga" class="mb-2">Harga Tiket</label></br>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga tiket">
                        </div>
                        <div class="form-group mt-4">
					    	<label for="peserta" class="mb-2">Peserta</label>
					    	<input type="number" name="peserta" class="form-control" placeholder="Masukkan jumlah peserta" required>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="instansi" class="mb-2">Penyelenggara</label>
					    	<input type="text" name="instansi" class="form-control" placeholder="Masukkan nama penyelenggara acara" required>
                        </div>
                        <div class="form-group mb-4 mt-4" >
                            <div class="row">
                                <div class="col-6">
                                    <a name="backBtn" id="backBtn" class="btn btn-dark btn-block" href="eventAdmin.php" role="button">Kembali</a>
                                </div>
                                <div class="col-6">
                                    <input type="submit" name="submit" value="Kirim" class="btn btn-success btn-block">
                                </div>            
                            </div>
					    </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
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
</body>

</html>
