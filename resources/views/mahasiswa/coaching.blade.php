@extends('layouts.app')
@section('title','Coaching')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/mahasiswa/tahapanPkm.css">
<link rel="stylesheet" href="../../css/mahasiswa/coaching.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
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
                        <span class="status active-status">Coaching</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center uploadFinal">
                        <img src="../../img/uploadFinal.png" alt="Upload Finals">
                        <br>
                        <span class="status disabled-status">Upload Final</span>
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
        <div class="container container-dosen-reviewer">
            <h3>Coaching Dosen Reviewer</h3>
            <div class="dosen-reviewer">
                <div class="row status-header">
                    <div class="col-md-4">
                        <h5>Dosen Reviewer</h5>
                    </div>
                    <div class="col-md-5">
                    </div>
                </div>
                <table class="info-dosen">
                    <tr>
                        <td>Dr Cukup Mulyana, MS</td>
                        <td>195502091986011001 </td>
                        <td>FMIPA</td>
                        <td>cukupmulyana@gmail.com</td>
                    </tr>
                </table>
            </div>
            <!-- File Revisi -->
            <div class="container container-upload-revisi">
                <h5>File Revisi</h5>
                <!-- Upload File -->
                <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
                <form id="file-upload-form" action="#">
                    <input id="file-upload" class="file-upload-class" type="file" name="fileUpload" data-title="" />
                    <label for="file-upload" id="file-drag">
                        <i class="fas fa-file-word fa-5x" style="color: blue;"></i>
                        <br /><br /><span id="file-upload-btn" class="button">Perbarui Berkas</span>
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
                            <button type="submit" class="btn btn-custom" style="width: 160px; height: 60px;">Submit</button>
                        </div>
                    </div>
                </form>
                <!-- End Upload File -->
            </div>
            <!-- End File Revisi -->

            <!-- Kegiatan Dosen -->
            <div class="dosen-reviewer">
                <div class="row status-header">
                    <h5>Kegiatan Coaching</h5>
                </div>
                <form class="form-bimbingan">
                    <div class="form-group row">
                        <label for="selectTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" />
                        </div>
                        <div class="col-sm-2">
                            <i class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></i>
                        </div>
                        <!-- <div class='col-8 input-group date'>
                                            <input type='text' class="form-control"  id='date' name="date"/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></span>
                                            </span>
                                        </div> -->
                    </div>
                    <div class="form-group row">
                        <label for="inputHasilDiskusi" class="col-sm-2 col-form-label">Hasil Diskusi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="hasilDiskusi" id="hasilDiskusi" cols="30"
                                rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 d-flex justify-content-end">
                            <button type="submit" class="btn btn-custom" style="width: 160px;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Kegiatan Dosen -->

            <!-- Riwayat Bimbingan -->
            <div class="dosen-reviewer">
                <div class="row status-header">
                    <h5>Riwayat Coaching</h5>
                </div>
                <table class="table hasil-diskusi">
                    <thead class="text-center">
                        <th>Tanggal Pertemuan</th>
                        <th>Hasil Diskusi dan Komentar</th>
                    </thead>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-sm-10 d-flex justify-content-end">
                        <button type="button" class="btn btn-custom" style="width:160px;">Print</button>
                    </div>
                </div>
            </div>
            <!-- End Riwayat Bimbingan -->

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

