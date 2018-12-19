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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
            <div class="logo">
			    <a href="index.php"><img src="../gambar/eventcinemas-logo.png" alt="" /></a>
		    </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="index.html">ICO dashboard</a></li>
                                    <li><a href="index2.html">Ecommerce dashboard</a></li>
                                    <li><a href="index3.html">SEO dashboard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Tables
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="eventAdmin.php"> Event </a></li>
                                    <li><a href="userAdmin.php"> User </a></li>
                                    <li><a href="kategoriAdmin.php"> Kategori </a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>2</span>
                                </i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
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
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
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
                    <table id="barang" class="table table-stripped tex-center-mt-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Lokasi</th>
                                <th>URL</th>
                                <th>Poster Event</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Harga</th>
                                <th>Peserta</th>
                                <th>Deskripsi</th>
                                <th>Nama Penyelenggara</th>
                                <th>create_date</th>
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
                                    <td>" .$row["judul_event"]. "</td>
                                    <td>" .$row["lokasi"]. "</td>
                                    <td>" .$row["urls"]. "</td>
                                    <td> <img src='../gambar/".$row['gambar_event']."' style='width:100px;'> </td>
                                    <td>" .$row["tanggal_mulai"]. ' - ' . $row["tanggal_akhir"] ."</td>
                                    <td>" .$row["waktu_mulai"]. ' - ' . $row["waktu_akhir"] ."</td>
                                    <td>" .$row["harga"]. "</td>
                                    <td>" .$row["peserta"]. "</td>
                                    <td>" .$row["deskripsi"]. "</td>
                                    <td>" .$row["nama_penyelenggara"]. "</td>
                                    <td>" .$row["create_date"]. "</td>
                                    <td>
                                        <a href='formUpdateEvent.php?id=$id_events
                                        ' class='btn btn-warning'>Update</a>
                                        <a href='../proses/deleteEvent.php?id=$id_events
                                        ' class='btn btn-danger'>Delete</a>
                                        </td>
                                    </tr>
                                 ";
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
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
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
