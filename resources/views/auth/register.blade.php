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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row">
            <form class="col-md-6 login-form" method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group">
                    <h1 class="login-header">PKM UNPAD</h1>
                </div>
                <div class="form-group">
                    <h4 class="login-header2">Hallo, Selamat Datang Pejuang PKM!</h4    >
                </div>
                <div class="form-group">
                    <label for="NPMatauNIP">NPM atau NIP</label>
                    <input type="text" class="form-control" name="npmNip" id="npmNip" aria-describedby="npmAtauNip" placeholder="Enter your npm/nip">
                    @error('npmNip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="npmAtauNip" placeholder="Enter your Unpad email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="namaLengkap" placeholder="Enter your name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="tipeAkun">Akun</label>
                <div class="form-group">
                    <select class="custom-select select-akun" name="role_id">
                        <option selected>Select your account</option>
                        <option value="4">Mahasiswa</option>
                        <option value="3">Dosen Pembimbing</option>
                        <option value="2">Dosen Reviewer</option>
                        <option value="1">Kemahasiswaan</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
