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

            @foreach ($requestMahasiswa as $request)
            
            <div class="daftar-card d-flex justify-content-center">
                <div class="card card-ketua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>{{$request->mahasiswa->user->name}}</h6>
                                <h6>{{$request->npm_mahasiswa}}</h6>
                            </div>
                            <div class="col-md-3">
                                <form action="{{route('terima-mahasiswa')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="npm_mahasiswa" value="{{$request->npm_mahasiswa}}">
                                    <button type="submit" class="btn btn-custom-profile" style="width:130px;">Terima</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form action="{{route('tolak-mahasiswa')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="npm_mahasiswa" value="{{$request->npm_mahasiswa}}">
                                    <button type="submit" class="btn btn-custom-profile" style="width:130px;">Tolak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach

            

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
