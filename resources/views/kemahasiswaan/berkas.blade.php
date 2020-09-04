@extends('layouts.app')

@section('title', 'Konsultasi Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/kemahasiswaan.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/berkas.css">
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
        <!-- Container Timeline -->
        <div class="container">
            <h3>Berkas</h3>
            <!-- Upload File -->
            <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
            <form id="file-upload-form" action="#">
                <label for="judulProposalFinal">Judul Proposal:</label>
                <input type="text" name="judulProposalFinal" id="judulProposalFinal" class="form-control">
                <label for="fileProposal" class="mt-3">File Proposal:</label>
                <input id="file-upload" class="file-upload-class" type="file" name="fileUpload" data-title="" />
                <label for="file-upload" id="file-drag">
                    Tarik dan letakan berkas disini
                    <br />ATAU
                    <br /><br /><span id="file-upload-btn" class="button">Tambahkan Berkas</span>
                </label>

                <progress id="file-progress" value="0">
                    <span>0</span>%
                </progress>

                <output for="file-upload" id="messages"></output>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn"
                            style="background: #ff6b6b; color:white; width: 160px; height: 60px;">Cancel</button>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button type="submit" class="btn btn-custom"
                            style="width: 160px; height: 60px;">Submit</button>
                    </div>
                </div>
            </form>
            <!-- End Upload File -->
        </div>
        <!-- End Container Timeline -->

        <!-- Container Tabel Timeline -->
        <div class="container container-table">
            <h5>Daftar Berkas</h5>
            <!-- Tabel Timeline -->
            <table class="table">
                <thead>
                    <th>Judul</th>
                    <th>File</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>11 Maret 2020</td>
                        <td>Upload Proposal Liga</td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>11 Maret 2020</td>
                        <td>Upload Proposal Liga</td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>11 Maret 2020</td>
                        <td>Upload Proposal Liga</td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>11 Maret 2020</td>
                        <td>Upload Proposal Liga</td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    
                    
                </tbody>
            </table>
            <!-- End Tabel Timeline -->
        </div>
        <!-- End Container Tabel Timeline -->

    </div>
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
<script>
    $(document).ready(function () {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>
@endsection

