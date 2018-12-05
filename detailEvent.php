<!DOCTYPE html>
<html>

<?php include 'helper/koneksi.php'?>

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
                <h2 class="judulEvent">Trip to BROMO</h2>
                <p class="by">Dipublikasi oleh Fulan</p>
                <img src="gambar/bromo.jpg" style="width:100%"/>
                <div class="row">
                    <div class="col-md-6">
                        <label class="mb-2 waktu_lokasi_desc">Tanggal dan Waktu</label>
                        <p class="timeEvent">Sab, Jas 20, 10.00 WIB - </br>Sen, Jan 22, 12.00 WIB</p>
                    </div>
                    <div class="col-md-6 "> 
                        <label class="mb-2 waktu_lokasi_desc">Lokasi</label>
                        <p class="peta"> <a href="https://goo.gl/maps/xM9Svm1hEyR2"> https://goo.gl/maps/xM9Svm1hEyR2 </a></p> 
                        <label class="waktu_lokasi_desc">Tiket : Free</label>
                    </div>
                </div>
                <h4 class="waktu_lokasi_desc">Deskripsi</h4>
                <p class="deskripsi">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </br>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. </br>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</br> Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. </br>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. </br>Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. </br>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. </br>Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
                </p>
                <input type="submit" value="Registrasi" class="btn btn-success btn-block mt-4">
            </div>
            <div class="coli2"></div>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>
</html>