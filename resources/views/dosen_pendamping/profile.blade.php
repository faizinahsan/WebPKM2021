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
                <a href="{{route('dosen_pendamping-profile1')}}" class="btn btn-custom-profile"> Daftar Disetujui</a>
            </div>

            <div class="daftar-card d-flex justify-content-center">
                <div class="card card-ketua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Ibnu Mualim</h6>
                                <h6>140810160022</h6>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Terima</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Tolak</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="daftar-card d-flex justify-content-center">
                <div class="card card-ketua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Ibnu Mualim</h6>
                                <h6>140810160022</h6>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Terima</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Tolak</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="daftar-card d-flex justify-content-center">
                <div class="card card-ketua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Ibnu Mualim</h6>
                                <h6>140810160022</h6>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Terima</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Tolak</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="daftar-card d-flex justify-content-center">
                <div class="card card-ketua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Ibnu Mualim</h6>
                                <h6>140810160022</h6>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Terima</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('dosen_pendamping-profile_keterangan')}}" class="btn btn-custom-profile" style="width:130px;">Tolak</a href="{{route('dosen_pendamping-profile_keterangan')}}">
                            </div>
                        </div>
                    </div>
                </div>
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
