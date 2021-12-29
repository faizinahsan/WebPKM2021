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
                        <p>{{$mahasiswa->user->name}}</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$mahasiswa->npm_mahasiswa}}</p>
                    </div>
                </div>

                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="row file-row">
                    <img src="../../img/doc.png" alt="Doc File">
                    <div class="col-md-6" style="word-wrap:break-word">
                        @if (is_null($proposal))
                        <p>Mahasiswa Belum Mengunggah Proposal PKM</p>
                        @else
                        <p>{{$proposal->judul_proposal}}</p>
                        <p>{{$proposal->kategori->kategori_name}}</p>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('dosen_pendamping-download_proposal',['filename'=>$proposal->file_proposal])}}" class="btn btn-custom-profile">Download</a>
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
                    
                    @foreach ($mahasiswa->riwayatBimbingan as $riwayatBimbingan)
                    
                    <tr>
                        <td>{{$riwayatBimbingan->tanggal}}</td>
                        <td>{{$riwayatBimbingan->hasil_diskusi}}</td>
                        <td>
                            <form action="{{route('dosen_pendamping-verifikasiRiwayatBimbingan')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="idRiwayatBimbingan" value="{{$riwayatBimbingan->id_riwayat_bimbingan}}">
                                <input type="submit"class="btn btn-custom-profile"
                                    style="width: 130px;" name="sesuaiInput" 
                                    @if ($riwayatBimbingan->verifikasi == true)
                                    disabled
                                    value="Telah Sesuai"
                                    @endif
                                    value="Sesuai"
                                    >
                            </form>
                        </td>
                    </tr>

                    @endforeach

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
