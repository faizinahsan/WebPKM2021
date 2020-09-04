@extends('layouts.app')
@section('title','Profile Mahasiswa')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/mahasiswa/profile.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
    <!-- Side Bar -->
    @include('layouts.sidenavmahasiswa')
    <!-- End Side Bar -->
    <!-- Container/Content -->
    <div id="content">
        <div class="container">
            <h3>Profile</h3>
            <h4>Data Ketua Kelompok</h4>
            <table class="table table-borderless data-ketua">
                <tbody>
                    <tr>
                        <td>Nama Lengkap: </td>
                        <td>Ibnu Mualim</td>
                    </tr>
                    <tr>
                        <td>Npm : </td>
                        <td>140810160022</td>
                    </tr>
                </tbody>
            </table>

            <h4>Data Anggota Kelompok</h4>
            <button type="button" data-toggle="modal" data-target="#tambahAnggotaModal"
                class="btn btn-custom">Tambahkan Anggota</button>

            <table class="table table-borderless data-anggota">
                <tbody>
                    <tr>
                        <td>Intan Pratiwi</td>
                        <td>140810160011</td>
                        <td>
                            <button class="btn btn-custom" style="width: 70px;">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-custom" style="width: 70px;">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Faizin Ahsan</td>
                        <td>140810160032</td>
                        <td>
                            <button class="btn btn-custom" style="width: 70px;">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-custom" style="width: 70px;">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Ahsan Nurrijal</td>
                        <td>140810160004</td>
                        <td>
                            <button class="btn btn-custom" style="width: 70px;">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-custom" style="width: 70px;">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NPM: </label>
                                    <input type="text" class="form-control" id="inputNpmAnggota"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="inputNamaLengkapAnggota"
                                        placeholder="">
                                </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-custom">Tambahkan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
    </div>
    <!-- End Container/Content -->
</div>
@endsection

@section('jslinks')
<script src="../../js/jquery.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<script src="../../js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });

</script>
@endsection


