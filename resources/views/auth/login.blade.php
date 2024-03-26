<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPKM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/auth/login.css">
</head>
<body>
    <div class="container login-card">
        <div class="row">
            <form class="col-md-6 login-form" action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <h1 class="login-header">PKM UNPAD</h1>
                </div>
                <div class="form-group">
                    <h4 class="login-header2">Hallo, Selamat Datang Pejuang PKM!</h4    >
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
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="npmAtauNip" placeholder="Enter your Email" name="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="text-right p-t-12">
                        <a class="txt2" href="#">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn login-btn">Submit</button>
                </div>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Don't Have an Account?
                    </span>
                </div>
                <div class="text-center p-t-12">
                    <a class="txt2" href="{{route('register')}}">
                        Register
                    </a>
                </div>
            </form>
            <div class="col-md-6 login-img d-flex justify-content-lg-center">
                <img src="img/loginimg.png" alt="loginimg">
            </div>

        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
