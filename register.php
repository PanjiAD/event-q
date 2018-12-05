<!DOCTYPE html>
<html>
    <?php include 'helper/koneksi.php'?>    
<head>
    <title>Page Title</title>
    <?php include 'head.php'?>  
</head>
<body>
    <?php include 'header.php'?>
    <div class="container register mt-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="judulLogin">Let's Get Register</h2>
                <form>
                    <div class="form-group mt-4">
                        <label for="nama" class="mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkapmu" required>
                        <div class="invalid-feedback">
                            Isikan nama lengkap
                        </div>
                    </div>
                    <div class="form-group mt-4">
						<label for="username" class="mb-2">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Gunakan hanya huruf dan angka" required>
                        <div class="invalid-feedback">
                            Isikan username
                        </div>
                    </div>
                    <div class="form-group mt-4">
						<label for="email" class="mb-2">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan alamat email" required>
                        <div class="invalid-feedback">
                            Isikan email
                        </div>
                    </div>
                    <div class="form-group mt-4">
						<label for="password" class="mb-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi minimal 6 karakter" required>
                        <div class="invalid-feedback">
                            Isikan password
                        </div>
                    </div>
                    <div class="form-group mt-4">
						<label for="confirm_password" class="mb-2">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Masukkan ulang kata sandi" required>
                        <div class="invalid-feedback">
                            Isikan ulang password
                        </div>
                    </div>
                    <div class="form-group mb-4 mt-4" >
                        <input type="submit" value="submit" class="btn btn-success btn-block">
                    </div>
                    <center style="margin-bottom:15px;">Sudah pernah registrasi? <a href="login.php"> Login</a></center> 
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>    
    </div>
    <?php include 'footer.php'?>
</body>
</html>