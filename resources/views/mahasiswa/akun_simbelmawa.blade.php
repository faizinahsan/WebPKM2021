@extends('layouts.app')

@section('title','Akun Simbelmawa')
    
@section('csslinks')

<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/mahasiswa/tahapanPkm.css">
<link rel="stylesheet" href="../../css/mahasiswa/akun_simbelmawa.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
    <!-- Sidebar  -->
    @include('layouts.sidenavmahasiswa')
    {{-- End Sidenav --}}

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
                        <span class="status done-status">Upload Final</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center akun">
                        <img src="../../img/akunSibelmawa.png" alt="Akun Simbelmawa">
                        <br>
                        <span class="status active-status">Akun</span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Contanier -->
        <div class="container container-akun-simbelmawa">
            <div class="akun-simbelmawa">
                <div class="row status-header">
                    <div class="col-md-4">
                        <h5>Akun Simbelmawa</h5>
                    </div>
                    <div class="col-md-5">
                    </div>
                </div>
                {{-- Kasih tanggal yang bisa diubah oleh kemahasiswaan --}}
                @if ($akunSimbelmawa==null)
                    <p>Selamat anda sudah menyelesaikan semua tahap PKM UNPAD 2021. Bagi proposal yang dirasa layak oleh
                        pihak reviewer akan mendapatkan username dan password pada tanggal 2 November 2020 untuk
                        nantinya dapat didaftarkan ke simbelmawa.</p>                    
                @else
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <table class="info-akun">
                        <tr>
                            <td>Username:</td>
                            <td>{{$akunSimbelmawa->username}}</td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>{{$akunSimbelmawa->password}}</td>
                        </tr>
                        @if ($proposal->status_proposal == "STATUS_DIDANAI")
                            <td>Selamat Proposal Anda Didanai Pemerintah</td>
                        @else
                        <tr>
                            <td>Jika Didanai, maka upload bukti pendanaan disini</td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-custom" data-toggle="modal" data-target="#uploadBuktiPendanaan">Upload</a>
                            </td>
                        </tr>
                        @endif

                    </table>                                  
                @endif
                  <!-- Modal -->
                  <div class="modal" id="uploadBuktiPendanaan" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Upload Bukti Pendanaan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                {{-- Start Form --}}
                                <form id="file-upload-form" action="{{route('mahasiswa-upload_bukti_pendanaan')}}" method="POST" enctype="multipart/form-data">
                                        
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="col-sm-2 col-form-label">File:</label>
                                        <div class="col-sm-10">
                                            <input id="file-upload" class="file-upload-class" type="file" accept=".pdf, .doc, .docx, .xls" name="fileBuktiPendanaan" data-title="" />
                                        </div>
                                    </div>
                                        <!-- End Upload File -->
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-custom">Submit</button>
                            </div>
                        </form>
                        {{-- End Form --}}       
                      </div>
                    </div>
                  </div>
                <!-- End Modal -->
            </div>
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