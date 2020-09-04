@extends('layouts.app')

@section('title', 'Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/dosen_pendamping/profile.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <!-- Content -->
    <div id="content">
        <div class="container">
            <!-- Status Mahasiswa -->
            <div class="status-mahasiswa">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Mahasiswa Bimbingan</h5>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-custom-profile">Diterima</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p>Ibnu Mualim</p>
                    </div>
                    <div class="col-md-6">
                        <p>140810160022</p>
                    </div>
                </div>
            </div>
            <!-- End Status Mahasiswa -->
            <!-- Riwayat Bimbingan -->
            <div class="riwayat-bimbingan">
                <h5>Riwayat Bimbingan</h5>
                <table class="table table-borderless text-center">
                    <thead>
                        <th>Tanggal</th>
                        <th>Hasil Diskusi</th>
                        <th>Keterangan</th>
                    </thead>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- End Riwayat Bimbingan -->
        </div>

    </div>
    <!-- End Content -->
@endsection

@section('jslinks')
<script src="../../js/jquery.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<script src="../../js/bootstrap.min.js"></script>
@endsection
