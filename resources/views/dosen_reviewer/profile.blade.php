@extends('layouts.app')

@section('title', 'Dosen Reviewer')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/dosen_reviewer/profile.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
     <!-- Content -->
     <div id="content">
        <div class="container ">
            <div class="header-profile">
                <h5>Daftar Mahasiswa</h5>
            </div>
            <div class="table-disetujui">
            <table class="table table-borderless text-center">
                <thead>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Keterangan</th>
                </thead>
                @foreach ($daftarMahasiswa as $mahasiswa)
                    <tr>
                        <td>{{$mahasiswa->user->name}}</td>
                        <td>{{$mahasiswa->npm_mahasiswa}}</td>
                        <td>
                            <a href="{{route('dosen_reviewer-profile_keterangan',['id'=>$mahasiswa->npm_mahasiswa])}}" class="btn btn-custom-profile" style="width: 130px;">View</a>
                        </td>
                    </tr>
                @endforeach
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


