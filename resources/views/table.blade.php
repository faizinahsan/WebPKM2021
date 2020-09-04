@extends('layouts.app')

@section('title', 'Reviewer')
@section('csslinks')
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/navbar/navbar.css">
<link rel="stylesheet" href="css/table.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Informasi Dosen Reviewer</h1>
    <div class="row text-center d-flex justify-content-center">
        <div class="col-md-4">
            <div class="form-group">
                <select class="custom-select select-akun mx-auto">
                    <option selected>Filter by Fakultas</option>
                    <option value="1">FMIPA</option>
                    <option value="2">Psikologi</option>
                    <option value="3">FISIP</option>
                    <option value="4">FIB</option>
                    <option value="5">FAPERTA</option>
                    <option value="6">FIKOM</option>
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <button class="btn btn-filter">Filter</button>
        </div>
    </div>

    <!-- Start Introduction Section -->
    <div class="introduction">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Email</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dr Cukup Mulyana, MS</td>
                            <td>195502091986011001</td>
                            <td>FMIPA</td>
                            <td>cukupmulyana@gmail.com</td>
                            <td><img src="img/cukup1.jpg"></td>
                        </tr>
                        <tr class="table-warning">
                            <td>Dra. Erna Susiati, M.Pd</td>
                            <td>195612241986092001</td>
                            <td>Psikologi</td>
                            <td>erna.susiati@unpad.ac.id</td>
                            <td><img src="img/erna.jpg"></td>
                        </tr>
                        <tr>
                            <td>Dr. Yus Nugraha, MA</td>
                            <td>196007091986011002</td>
                            <td>Psikologi</td>
                            <td>yus.nugraha@unpad.ac.id</td>
                            <td><img src="img/yus.jpg"></td>
                        </tr>
                        <tr class="table-warning">
                            <td>Rudiana, S.IP., M.Si.</td>
                            <td>197411242003121001</td>
                            <td>FISIP</td>
                            <td>rudiana1974@gmail.com</td>
                            <td><img src="img/rudi.jpg"></td>
                        </tr>
                        <tr>
                            <td>Dr. Fitrilawati, MSc</td>
                            <td>196502081994122001 </td>
                            <td>FMIPA</td>
                            <td>firi@gmail.com</td>
                            <td><img src="img/fitri.jpg"></td>
                        </tr>
                        <tr class="table-warning">
                            <td>Dra. Nurul Yanuarti, M.Si</td>
                            <td>196001241987012001</td>
                            <td>Psikologi</td>
                            <td>nurul.yanuarti@unpad.ac.id</td>
                            <td><img src="img/nurul.jpg"></td>
                        </tr>
                        <tr>
                            <td>Nowo Riveli, Ph.D</td>
                            <td>198211292016044001</td>
                            <td>FMIPA</td>
                            <td>nowo@gmail.com</td>
                            <td><img src="img/nowo.jpg"></td>
                        </tr>
                        <tr class="table-warning">
                            <td>Dr. Zainal Abidin, M.Si</td>
                            <td>196209221992031001</td>
                            <td>Psikologi</td>
                            <td>zainal.abidin@unpad.ac.id</td>
                            <td><img src="img/zainal.jpg"></td>
                        </tr>
                        <tr>
                            <td>Idil Akbar, S.IP., M.IP.</td>
                            <td>19810813 201404 1 001</td>
                            <td>FISIP</td>
                            <td>idil.akbar@gmail.com</td>
                            <td><img src="img/idil.jpg"></td>
                        </tr>
                        <tr class="table-warning">
                            <td>Dr. Neneng Yani Yuni</td>
                            <td>197512282005022001</td>
                            <td>FISIP</td>
                            <td>nenengyany@yahoo.co.id</td>
                            <td><img src="img/neng.jpg"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="col-md-1">

            </div>
        </div>
    </div>
    <!-- End Introduction Section -->
</div>
@endsection

@section('jslinks')
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>    
@endsection

