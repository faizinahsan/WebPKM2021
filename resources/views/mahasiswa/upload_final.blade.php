@extends('layouts.app')
@section('title','Upload Final')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/mahasiswa/tahapanPkm.css">
<link rel="stylesheet" href="../../css/mahasiswa/upload_proposal.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
    <!-- Sidebar  -->
    @include('layouts.sidenavmahasiswa')

    <!-- Page Content  -->
    <div id="content">
        <!-- Container -->
        <div class="container">
            <ul class="timeline-horizontal" id="timeline">
                <li class="li">
                    <div class="icon-alur-container text-center konsultasiDosen">
                        <img src="../../img/kosuldosbim.png" alt="Konsultasi Dosen">
                        <br>
                        <span class="status done-status">Konsultasi <br> Dosen <br> Pendamping</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center uploadProposal">
                        <img src="../../img/uploadProposal.png" alt="Upload Proposal">
                        <br>
                        <span class="status done-status">Upload Proposal</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center coaching">
                        <img src="../../img/coaching.png" alt="Coachings">
                        <br>
                        <span class="status done-status">Coaching</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center uploadFinal">
                        <img src="../../img/uploadFinal.png" alt="Upload Finals">
                        <br>
                        <span class="status active-status">Upload Final</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center akun">
                        <img src="../../img/akunSibelmawa.png" alt="Akun Simbelmawa">
                        <br>
                        <span class="status disabled-status">Akun</span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Contanier -->
        <div class="container container-upload-proposal">
            <h5>Upload Proposal Final</h5>
            <p>Pengumpulan proposal PKM Final agar diseleksi kembali oleh reviewer untuk dapat username dan password
                simbelmawa pada tanggal 3 September - 17 September 2020. Batas pengumpulan proposal pada pukul 23.59
                tanggal 17 September 2020. Harap mengumpulkan proposal dalam format doc.</p>
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
<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>
@endsection

