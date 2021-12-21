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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  
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
            <table class="proposal-table table table-borderless daftar-mahasiswa text-center" id="proposal-table">
                <thead>
                    <tr>
                        <th>Judul Proposal</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Mahasiswa</th>
                        <th>Kelayakan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    {{-- @foreach ($proposal_list as $proposal)
                    <tr>
                        <td>{{$proposal->mahasiswa->user->name}}</td>
                        <td class="nama-proposal">
                            <img src="../../img/doc.png" alt="Doc File">
                            <p>{{$proposal->judul_proposal}}</p>
                        </td>
                        <td>
                            @if ($proposal->mahasiswa->nip_reviewer == null)
                                <p>Reviewer Belum ditugaskan</p>
                            @else
                                <p>Reviewer Sudah ditugaskan</p>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-custom" href="{{route('download-proposal',['filename'=>$proposal->file_proposal])}}">Download</a>
                            <a href="{{route('kemahasiswaan-detail_proposal',['id'=>$proposal->id_file_proposal])}}" class="btn btn-custom">Detail</a>
                        </td>
                    </tr>
                    @endforeach --}}

                </tbody>
            </table>
            
            {{-- BIKIN TABEL BARU UNTUK SUMMARY --}}
        </div>
    </div>
    <!-- End Page Content -->
</div>
@endsection


@section('jslinks')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-html5-2.1.1/datatables.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('.proposal-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Daftar Proposal Mahasiswa'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Daftar Proposal Mahasiswa'
                },

                
            ],
            processing: true,
            serverSide: true,
            paging: false,
            scrollX: 500,
            searching: true,
            
            ajax: {
                "url":"{{ route('datatables.proposal') }}",
                "type": "GET"
            },

            columns: [
                // {data: 'id_file_proposal', name: 'id_file_proposal'},
                // {data: 'name', name: 'name'},
                {data: 'judul_proposal', name: 'judul_proposal'},
                {data: 'status_proposal', name: 'status_proposal'},
                {data: 'kategori.kategori_name', name: 'kategori.kategori_name'},
                {data: 'mahasiswa.user.name', name: 'mahasiswa.user.name'},
                {data: 'layakDiberiAkun', name: 'layakDiberiAkun'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],


        });
    });
    </script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<script src="../../js/bootstrap.min.js"></script>

<!-- DatePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>

@endsection

