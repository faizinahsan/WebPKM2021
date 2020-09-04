<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPKM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/auth/signup.css">
    <link rel="stylesheet" href="css/auth/login.css">
</head>
<body>
    <div class="container login-card">
        <div class="row">
            <form class="col-md-6 login-form" action="login.html">
                <div class="form-group">
                    <h1 class="login-header">PKM UNPAD</h1>
                </div>
                <div class="form-group">
                    <h4 class="login-header2">Hallo, Selamat Datang Pejuang PKM!</h4    >
                </div>
                <div class="form-group">
                    <label for="NPMatauNIP">NPM atau NIP</label>
                    <input type="text" class="form-control" id="npmAtauNip" aria-describedby="npmAtauNip" placeholder="Enter your npm/nip">
                </div>
                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaLengkap" placeholder="Enter your name">
                </div>
                <label for="tipeAkun">Akun</label>
                <div class="form-group">
                    <select class="custom-select select-akun">
                        <option selected>Select your account</option>
                        <option value="1">Mahasiswa</option>
                        <option value="2">Dosen Pembimbing</option>
                        <option value="3">Dosen Reviewer</option>
                        <option value="4">Kemahasiswaan</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm your password">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn signup-btn">Sign Up</button>
                </div>
            </form>
            <div class="col-md-6 signup-img d-flex justify-content-lg-center">
                <img src="img/signupimg.png" alt="signupimg">
            </div>
            
        </div>
    </div>
    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>