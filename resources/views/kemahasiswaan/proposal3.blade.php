@extends('layouts.app')
@section('title', 'Konsultasi Dosen Pendamping')
@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/kemahasiswaan.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/proposal.css">
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper">
    @include('layouts.sidenavkemahasiswaan')
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h3>Daftar Mahasiswa</h3>
            <table class="proposal-table table table-borderless daftar-mahasiswa text-center" id="proposal-table">
                <thead>
                    <tr>
                        <th>Judul Proposal</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>  
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Page Content -->
</div>
@endsection
@section('jslinks')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@endsection