<?php
    include '../helper/koneksi.php';
	session_start();
	// session_destroy();

    $id_users = $_GET["id"]; 

    $query = "SELECT * FROM users WHERE id_users = $id_users";
    $result = mysqli_query($con, $query);

    // $item = ''; 
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User tidak ditemukan";
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - ICO Dashboard</title>
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
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Tables</h4>
                            <ul class="breadcrumbs pull-left">
                                <!-- <li><a href="index.html">Home</a></li> -->
                                <li><a href="userAdmin.php">User </a></li>
                                <li><span>Update User</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <?php
                                $user1 = $_SESSION['username'];
								$query = "SELECT gambar_profile,id_users FROM users WHERE username = '$user1'";
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
            <!-- page title area end -->
            <div class="container">
            <h3 class="mt-3 text-center">Update User</h3>
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <!-- We add value form query result to inputs -->

                    <form action="../proses/admin/updateUser.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- 
                            We still need id_barang to inform update query command
                            User doesn't need to know the id_barang, so make it hidden
                        -->
                        <input type="hidden" name="idUsers" value="<?php echo $user["id_users"] ?>">
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nama </label>
                            <div class="col-md-9">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User" required 
                                value="<?php echo $user["nama"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required
                                value="<?php echo $user["username"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required
                                value="<?php echo $user["email"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-9">
                                <input type="text" name="pass" id="pass" class="form-control" placeholder="Passowrd" required
                                value="<?php echo $user["pass"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Foto Profile</label>
                            <div class="col-md-9">
                                <img style='width:250px;' src="../gambar/profil/<?php echo($user["gambar_profile"]) ?>">
                                <input type="hidden" name="gambar" id="gambar" value="<?php echo($user["gambar_profile"]) ?>">
                                <input type="file" name="gambar">
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-4">
                                <!-- Back to home -->
                                <a name="backBtn" id="backBtn" class="btn btn-dark btn-block" href="userAdmin.php" role="button">Kembali</a>
                            </div>
                            <div class="col-md-4">
                                <!-- Clear form value using JS. Please check clearForm function -->
                                <button name="clearFormBtn" id="clearFormBtn" class="btn btn-warning btn-block" role="button" onclick="clearForm()">Clear</button>
                            </div>
                            <div class="col-md-4">
                                <!-- Input button to submit form. Please check href attribute -->
                                <input type="submit" name="tambah" class="btn btn-success btn-block" value="Update"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
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

    <!-- Data tables -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
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
        // clear form input
        function clearForm() {
            $('#nama').val('');
            $('#username').val('');
            $('#pass').val('');
            $('#email').val('');
            $('#gambar').val('');
        }
    </script>
</body>

</html>
