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
                            <td>{{$mahasiswa->user->name}}</td>
                        </tr>
                        <tr>
                            <td>NPM Ketua: </td>
                            <td>{{$mahasiswa->npm_mahasiswa}}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="data-anggota text-center">
                    <tbody>
                        <tr>
                            <td>Nama Anggota</td>
                            <td>NPM Anggota</td>
                        </tr>
                        @foreach ($anggotas as $anggota)
                        <tr>
                            <td>{{$anggota->nama_anggota}}</td>
                            <td>{{$anggota->npm_anggota}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </section>

            <section id="content2" class="tab-content">
                <h5>Informasi Dosen Pembimbing</h5>
                <table class="data-ketua">
                    @if ($pendamping!= null)
                        <tbody>
                            <tr>
                                <td>Nama Lengkap: </td>
                                <td>{{$pendamping->user->name}}</td>
                            </tr>
                            <tr>
                                <td>NIP : </td>
                                <td>{{$pendamping->nip_pendamping}}</td>
                            </tr>
                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td>Mahasiswa Belum Memilih Pendamping</td>
                            </tr>
                        </tbody>
                    @endif
                </table>
                
                {{-- Dosen Reviewer --}}
                <h5>Informasi Dosen Reviewer</h5>
                @if ($mahasiswa->nip_reviewer == null)
                <table class="data-ketua">
                    <tbody>
                        <tr>
                            <td>Dosen Reviewer Belum Ditugaskan</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-md-5">
                                    <button class="btn btn-custom" type="button"  data-toggle="modal" data-target="#requestDosenPendamping">Tambahkan</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
    
                 <!-- Modal -->
        <div class="modal fade" id="requestDosenPendamping" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Dosen Reviewer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- Start Form --}}
                <form action="{{route('kemahasiswaan-tugaskan_reviewer')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id_proposal" value="{{$proposal->id_file_proposal}}">
                        <label for="exampleFormControlSelect2">Pilih Dosen Reviewer</label>
                        <select multiple class="custom-select select-akun" id="nipReviewer" name="nipReviewer">

                            @foreach ($reviewers as $reviewer)
                            <option value="{{$reviewer->nip_reviewer}}">{{$reviewer->nip_reviewer}}
                                {{$reviewer->user->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-custom">Tugaskan</button>
                </form>
        {{-- End Form --}}
                    {{-- End Form --}}

                </div>
            </div>
        </div>
        <!-- End Modal -->
                
        @else

        <table class="data-ketua">
            <tbody>
                <tr>
                    <td>Nama Lengkap: </td>
                    <td>{{$reviewer->user->name}}</td>
                </tr>
                <tr>
                    <td>NIP : </td>
                    <td>{{$reviewer->nip_reviewer}}</td>
                </tr>
            </tbody>
        </table>

        @endif

        </section>

        <section id="content3" class="tab-content">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="download-proposal text-center">
                        <img src="../../img/doc.png" alt="Doc File">
                        <p>{{$proposal->file_proposal}}</p>
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
