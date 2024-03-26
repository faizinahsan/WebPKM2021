@extends('layouts.app')

@section('title', 'Berkas')

@section('csslinks')
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/navbar/navbar.css">
<link rel="stylesheet" href="css/berkas.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
@endsection

@section('content')
<div class="container text-center">
    <h1>Format Proposal PKM</h1>
    <!-- Row -->
    <div class="row">
        @foreach ($daftarBerkas as $berkas)
        <div class="col-md-3">
            <div class="card card-format">
                <div class="card-body">
                    <h5 class="card-title">{{$berkas->judul_berkas}}</h5>
                    <img src="img/doc.png" alt="Doc Icon">
                    <br>
                    <a href="{{route('berkas-download',['filename'=>$berkas->file_berkas])}}" class="btn btn-custom">Download</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- End Row -->



</div>
@endsection
@section('jslinks')
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
@endsection

