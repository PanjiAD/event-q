<?php

include 'helper/koneksi.php';

$id_events = $_GET["id"]; 

$query = "SELECT * FROM events WHERE id_events = $id_events";
	$result = mysqli_query($con, $query);
	
	$item = ''; 
	if(mysqli_num_rows($result) == 1) {
	    $event = mysqli_fetch_assoc($result);
	} else {
	    echo "Event tidak ditemukan";
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <?php include 'head.php'?>
</head>
<body>
    <?php include 'header.php'?>
    
    <div class="container descEvent">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 mt-4">
                <h2 class="judulEvent"><?php echo $event['judul_event']; ?> </h2>
                <p class="by">Dipublikasi oleh Fulan</p>
                <?php echo"<img class='card-img-top' src='gambar/" .$event['gambar_event']."' alt='Card image cap'>"?>
                <div class="row">   
                    <div class="col-md-6">
                        <label class="mb-2 waktu_lokasi_desc">Tanggal dan Waktu</label>
                        <p class="timeEvent"><?php echo $event['tanggal_mulai']; ?>, <?php echo $event['waktu_mulai']; ?> WIB - </br><?php echo $event['tanggal_akhir']; ?>, <?php echo $event['waktu_akhir']; ?> WIB </br> <label class="waktu_lokasi_desc" style="margin:0; color:black">Tiket : 
                        <?php
                            if ($event['harga'] == 0) {
                                echo 'free';
                            }
                            else{
                                echo $event['harga'];	
                            }
                        ?></label></p>
                        
                    </div>
                    <div class="col-md-6 "> 
                        <label class="mb-2 waktu_lokasi_desc">Lokasi</label>
                        <p class="place"> <?php echo $event['lokasi']; ?></p>
                        <p class="peta"> <a href="<?php echo $event['urls']; ?>"> Lihat Peta </a></p> 
                        
                    </div>
                </div>
                <h4 class="waktu_lokasi_desc">Deskripsi</h4>
                <p class="deskripsi">
                <?php echo $event['deskripsi']; ?>
                </p>
                <input type="submit" value="Registrasi" class="btn btn-success btn-block mt-4">
            </div>
            <div class="coli2"></div>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>
</html>