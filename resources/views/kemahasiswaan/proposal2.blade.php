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

{{-- Content --}}
@section('content')
<div class="wrapper">
    <!-- Sidebar  -->
    @include('layouts.sidenavkemahasiswaan')
    

    <!-- Page Content  -->
    <div id="content">
        <div class="tab-container">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1" class="label-top"><span>Mahasiswa</span></label>

            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" class="label-top"><span>Pembimbing Reviewer</span></label>

            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" class="label-top"><span>Proposal</span></label>

            <input id="tab4" type="radio" name="tabs">
            <label for="tab4" class="label-top"><span>Akun</span></label>


            <section id="content1" class="tab-content">
                <h5>Informasi Mahasiswa</h5>
                <table class="data-ketua">
                    <tbody>
                        <tr>
                            <td>Nama Ketua: </td>
                            <td>Ibnu Mualim</td>
                        </tr>
                        <tr>
                            <td>NPM Ketua: </td>
                            <td>140810160022</td>
                        </tr>
                    </tbody>
                </table>
                <table class="data-anggota text-center">
                    <tbody>
                        <tr>
                            <td>Nama Anggota</td>
                            <td>NPM Anggota</td>
                        </tr>
                        <tr>
                            <td>Shoffiyah Nadhiroh </td>
                            <td>140810160057</td>
                        </tr>
                        <tr>
                            <td>Dzakia Rayhana</td>
                            <td>140810160015</td>
                        </tr>
                        <tr>
                            <td>Fajar Adiyansyah Rahiq</td>
                            <td>140810160006</td>
                        </tr>
                    </tbody>
                </table>

            </section>

            <section id="content2" class="tab-content">
                <h5>Informasi Dosen Pembimbing</h5>
                <table class="data-ketua">
                    <tbody>
                        <tr>
                            <td>Nama Lengkap: </td>
                            <td>Dr. Setiawan Hadi, M.Sc.CS.</td>
                        </tr>
                        <tr>
                            <td>NIP : </td>
                            <td>196207011993021001 </td>
                        </tr>
                        <tr>
                            <td>Fakultas : </td>
                            <td>FMIPA </td>
                        </tr>
                    </tbody>
                </table>
                <h5>Informasi Dosen Reviewer</h5>
                <table class="data-ketua">
                    <tbody>
                        <tr>
                            <td>Nama Lengkap: </td>
                            <td>Dr Cukup Mulyana, MS</td>
                        </tr>
                        <tr>
                            <td>NIP : </td>
                            <td>195502091986011001</td>
                        </tr>
                        <tr>
                            <td>Fakultas : </td>
                            <td>FMIPA </td>
                        </tr>
                    </tbody>
                </table>

            </section>

            <section id="content3" class="tab-content">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="download-proposal text-center">
                            <img src="../../img/doc.png" alt="Doc File">
                            <p>PKM KC_Pengolahan Pupuk Menjadi Tanaman Obat.doc</p>
                            <button class="btn btn-custom">Download</button>
                        </div>
                    </div>
                </div>

            </section>

            <section id="content4" class="tab-content">
                <h5>Akun Simbelmawa</h5>
                <div class="row">
                    <div class="col-md-8">
                        <form action="#" class="form-akun">
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNip" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-custom">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>

            </section>


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

