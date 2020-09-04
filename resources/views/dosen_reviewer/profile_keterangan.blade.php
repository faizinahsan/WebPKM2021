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
        <div class="container">
            <!-- Status Mahasiswa -->
            <div class="status-mahasiswa">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Mahasiswa Bimbingan</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p>Ibnu Mualim</p>
                    </div>
                    <div class="col-md-6">
                        <p>140810160022</p>
                    </div>
                </div>
            </div>
            <!-- End Status Mahasiswa -->

            <!-- File Revisi Proposal -->
            <div class="file-proposal">
                <h5>File Proposal</h5>
                <div class="file-row">
                    <img src="../../img/doc.png" alt="Doc File">
                    <p>Perbaikan Proposal PKM.doc</p>
                    <a href="#" class="btn btn-custom-profile">Download</a>
                    <a href="#" class="btn btn-custom-profile">Upload</a>
                </div>
                <div class="file-row">
                    <img src="../../img/doc.png" alt="Doc File">
                    <p>Perbaikan Proposal PKM.doc</p>
                    <a href="#" class="btn btn-custom-profile">Download</a>
                    <a href="#" class="btn btn-custom-profile">Upload</a>
                </div>
                <div class="file-row">
                    <img src="../../img/doc.png" alt="Doc File">
                    <p>Perbaikan Proposal PKM.doc</p>
                    <a href="#" class="btn btn-custom-profile">Download</a>
                    <a href="#" class="btn btn-custom-profile">Upload</a>
                </div>
            </div>
            <!-- End File Revisi Proposal -->

            <!-- Riwayat Bimbingan -->
            <div class="riwayat-bimbingan">
                <h5>Riwayat Coaching</h5>
                <table class="table table-borderless text-center">
                    <thead>
                        <th>Tanggal</th>
                        <th>Hasil Diskusi</th>
                        <th>Keterangan</th>
                    </thead>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="profile_keterangan.html" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="profile_keterangan.html" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="profile_keterangan.html" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="profile_keterangan.html" class="btn btn-custom-profile"
                                style="width: 130px;">Sesuai</a>
                        </td>
                    </tr>
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


