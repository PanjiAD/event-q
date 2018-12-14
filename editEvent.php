<?php

include 'helper/koneksi.php';
    session_start();

$id_events = $_GET["id"]; 

$query = "SELECT * FROM events WHERE id_events = $id_events";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) == 1) {
        $event = mysqli_fetch_assoc($result);
        $id_events = $event["id_events"];
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
            <div class="form-group mt-4">

                    <form class="editEvent" action="proses/prosesEditEvent.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idEvents" value="<?php echo $event["id_events"] ?>">
					    	<label for="judul" class="mb-2">Judul Event</label>
					    	<input type="text" name="judul" class="form-control" placeholder="Ketik judul acara disini" value="<?php echo $event["judul_event"] ?>" required>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="lokasi" class="mb-2">Lokasi</label>
					    	<input type="text" name="lokasi" class="form-control" value="<?php echo $event["lokasi"] ?>" placeholder="Masukkan alamat lengkap tempat dimana acara akan diselenggarakan.
                            " required>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="url" class="mb-2">URL</label>
					    	<input type="url" name="url" class="form-control" value="<?php echo $event["urls"] ?>" placeholder="Masukkan tautan Google Map petunjuk arah dimana lokasi acara
                            " required>
                        </div>
                        <div class="form-group mt-4">
                            <label class="mb-2">Gambar Sampul</label></br>
                            <img style='width:250px;' src="gambar/<?php echo($event["gambar_event"]) ?>">
                            <input type="hidden" name="gambar" value="<?php echo($event["gambar_event"]) ?>"></br>
                            <input type="file" name="gambar">
                        </div>
                        <div class="form-group mt-4">
					    	<label for="deskripsi" class="mb-2">Deskripsi</label>
                            <textarea name="deskripsi" cols="10" rows="5" class="form-control" required><?php echo $event["deskripsi"] ?></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <label for="kategori" class="col-form-label">Kategori</label>
                                <select name="kategori" cols="10" rows="5" class="form-control" required> 
                                    <?php
                                        $query = "SELECT * FROM kategori WHERE deleted = 0";
                                        $result = mysqli_query($con, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            $kategori = 1;
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
						            <input type="date" name="tanggal_mulai" class="form-control" value="<?php echo $event["tanggal_mulai"] ?>" placeholder="Tanggal">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="waktu_mulai" class="form-control" value="<?php echo $event["waktu_mulai"] ?>" placeholder="Masukkan waktu dimulainya acara" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
					        <label for="tanggal" class="mb-2" style="font-style:bold">Waktu Akhir</label>
                            <div class="row">
                                <div class="col-6">
						            <input type="date" name="tanggal_akhir" class="form-control" value="<?php echo $event["tanggal_akhir"] ?>" placeholder="Tanggal">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="waktu_akhir" class="form-control" value="<?php echo $event["waktu_akhir"] ?>" placeholder="Masukkan waktu berakhirnya acara" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="harga" class="mb-2">Harga Tiket</label></br>
                            <div class="row">
                                <div class="col-3">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Free
                                    </label>
                                    <label class="radio-inline ">
                                        <input type="radio" name="optradio">Berbayar
                                    </label>
                                </div>  
                                <div class="col-9">
                                    <input type="number" name="harga" class="form-control" value="<?php echo $event["harga"] ?>" placeholder="Masukkan harga tiket">
                                </div>  
                            </div>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="peserta" class="mb-2">Peserta</label>
					    	<input type="number" name="peserta" class="form-control" value="<?php echo $event["peserta"] ?>" placeholder="Masukkan jumlah peserta" required>
                        </div>
                        <div class="form-group mt-4">
					    	<label for="instansi" class="mb-2">Penyelenggara</label>
					    	<input type="text" name="instansi" class="form-control" value="<?php echo $event["nama_penyelenggara"] ?>" placeholder="Masukkan nama penyelenggara acara" required>
                        </div>
                        <div class="form-group mb-4 mt-4" >
                        <input type="submit" name="submit" value="Kirim" class="btn btn-success btn-block">
					</div>
                    </form>
                </div>
            <div class="coli2"></div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>