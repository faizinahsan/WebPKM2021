@extends('layouts.app')

@section('title', 'Konsultasi Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/kemahasiswaan.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/proposal.css">
<!-- datepicker -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
    <!-- Sidebar  -->
    @include('layouts.sidenavkemahasiswaan')

    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <h3>Daftar Mahasiswa</h3>
            <table class="table table-borderless daftar-mahasiswa text-center">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <th>Proposal</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach ($proposal_list as $proposal)
                    <tr>
                        <td>{{$proposal->mahasiswa->user->name}}</td>
                        <td class="nama-proposal">
                            <img src="../../img/doc.png" alt="Doc File">
                            <p>{{$proposal->judul_proposal}}</p>
                        </td>
                        <td>
                            <a class="btn btn-custom">Download</a>
                            <a href="{{route('kemahasiswaan-detail_proposal',['id'=>$proposal->id_file_proposal])}}" class="btn btn-custom">Detail</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- End Page Content -->
</div>
@endsection


@section('jslinks')
    
<script src="../../js/jquery.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<script src="../../js/bootstrap.min.js"></script>

<!-- DatePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
@endsection

