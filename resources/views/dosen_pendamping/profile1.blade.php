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
            <div class="header-profile">
                <h5>Persetujuan Bimbingan</h5>
                <a href="{{route('dosen_pendamping-profile')}}" class="btn btn-custom-profile"> Daftar Tertunda</a>
            </div>
            <div class="table-disetujui">
            <table class="table table-borderless text-center">
                <thead>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Keterangan</th>
                </thead>
                <tr>
                    <td>Ibnu Mualim</td>
                    <td>1408010160022</td>
                    <td>
                        <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width: 130px;">View</a>
                    </td>
                </tr>
                <tr>
                    <td>Ibnu Mualim</td>
                    <td>1408010160022</td>
                    <td>
                        <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width: 130px;">View</a>
                    </td>
                </tr>
                <tr>
                    <td>Ibnu Mualim</td>
                    <td>1408010160022</td>
                    <td>
                        <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width: 130px;">View</a>
                    </td>
                </tr>
                <tr>
                    <td>Ibnu Mualim</td>
                    <td>1408010160022</td>
                    <td>
                        <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width: 130px;">View</a>
                    </td>
                </tr>
            </table>

            </div>

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
