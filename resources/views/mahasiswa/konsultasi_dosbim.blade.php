@extends('layouts.app')
@section('title','Konsultasi Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/mahasiswa/tahapanPkm.css">
<link rel="stylesheet" href="../../css/mahasiswa/konsultasi_dosbim.css">
<!-- datepicker -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
                        <span class="status active-status">Konsultasi <br> Dosen <br> Pendamping</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center uploadProposal">
                        <img src="../../img/uploadProposal.png" alt="Upload Proposal">
                        <br>
                        <span class="status disabled-status">Upload Proposal</span>
                    </div>
                </li>
                <li class="li">
                    <div class="icon-alur-container text-center coaching">
                        <img src="../../img/coaching.png" alt="Coachings">
                        <br>
                        <span class="status disabled-status">Coaching</span>
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
<!-- Container Dosen -->
<div class="container container-konsultasi-dosen">
    <!-- Status Dosen -->
    <h3>Konsultasi Dosen Pendamping</h3>
    <div class="dosen-pendamping">
        <div class="row status-header">
            <div class="col-md-4">
                <h5>Status Dosen Pendamping</h5>
            </div>

            @if ($requestDosbim == null || $requestDosbim->status===0)
                
            <div class="col-md-5">
                <button class="btn btn-request" type="button"  data-toggle="modal" data-target="#requestDosenPendamping">Tambahkan</button>
            </div>

            @endif
            {{-- @if ($requestDosbim != null && $requestDosbim->status == 0)
                
            <div class="col-md-5">
                <button class="btn btn-request" type="button"  data-toggle="modal" data-target="#requestDosenPendamping">Tambahkan</button>
            </div>

            @endif  --}}


        </div>

        <table class="info-dosen">
            <tr>
                @if ($requestDosbim == null)

                    <td style="color: #565656;">Kosong</td>
                @else

                    @if ($requestDosbim->status === null)
        
                        <td style="color: #565656;">Diminta</td>
                    
                    @else
                        @if ($requestDosbim->status===0)
                            <td>Permintaan Anda Ditolak Oleh Dosen Terkait, Silahkan Cari Dosen Lain</td>
                        @else
                            <td>{{$requestDosbim->pendamping->user->name}}</td>
                            <td>{{$requestDosbim->pendamping->nip_pendamping}} </td>
                            <td>FMIPA</td>

                        @endif
                    @endif
                
                @endif
            </tr>
        </table>
    
        <!-- Modal -->
        <div class="modal fade" id="requestDosenPendamping" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konsultasi Dosen Pendamping</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- Start Form --}}
                        <form action="{{route('request-pendamping')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Pilih Dosen Pendamping</label>
                                <select multiple class="custom-select select-akun" id="nipPendamping" name="nipPendamping">
                                    
                                    @foreach ($listDosenPendamping as $dosenPendamping)
                                        <option value="{{$dosenPendamping->nip_pendamping}}">{{$dosenPendamping->nip_pendamping}} {{$dosenPendamping->user->name}}</option>
                                    @endforeach

                                  </select>
                            </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-request">Meminta</button>
                    </div>
                    </form>
                    {{-- End Form --}}

                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>
    <!-- End Status Dosen -->

    <!-- Kegiatan Dosen -->

    @if ($requestDosbim == null || $requestDosbim->status == 0)
        <div class="dosen-pendamping disabled-style">
    @else
        <div class="dosen-pendamping">
    @endif 
        <div class="row status-header">
            <h5>Kegiatan Bimbingan</h5>
        </div>
        @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif
        {{-- Start Form --}}
        <form class="form-bimbingan" action="{{route('mahasiswa-kegiatan_bimbingan')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label for="selectTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-7">
                    <input class="form-control date"
                    @if ($requestDosbim == null || $requestDosbim->status == 0)
                        readonly id="dateDisabled" name="dateDisabled" 
                    @else
                        id="date" name="date"                        
                    @endif 
                     placeholder="MM/DD/YYY" type="text" />
                </div>
                <div class="col-sm-2">
                    <i class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></i>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHasilDiskusi" class="col-sm-2 col-form-label">Hasil Diskusi</label>
                <div class="col-sm-8">
                    <textarea name="inputHasilDiskusi"
                    @if ($requestDosbim == null || $requestDosbim->status == 0)
                        readonly 
                    @endif 
                    class="form-control" name="hasilDiskusi" id="hasilDiskusi" cols="30"
                        rows="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 d-flex justify-content-end">
                    <button 
                    @if ($requestDosbim == null || $requestDosbim->status == 0)
                        disabled 
                    @endif
                    type="submit" class="btn btn-custom" style="width: 95px;">Kirim</button>
                </div>
            </div>
        </form>
        {{-- End Form --}}
    </div>
    <!-- End Kegiatan Dosen -->

    <!-- Riwayat Bimbingan -->
    @if ($requestDosbim == null || $requestDosbim->status == 0)
        <div class="dosen-pendamping disabled-style">
    @else
        <div class="dosen-pendamping">
    @endif
        <div class="row status-header">
            <h5>Riwayat Bimbingan</h5>
        </div>
        <table class="table hasil-diskusi">
            <thead class="text-center">
                <th>Tanggal</th>
                <th>Hasil Diskusi</th>
            </thead>
            @foreach ($riwayatBimbingan as $riwayat)

            <tr>
                <td>{{$riwayat->tanggal}}</td>
                <td>{{$riwayat->hasil_diskusi}}</td>
            </tr>
                
            @endforeach
        </table>
        <div class="row">
            <div class="col-sm-10 d-flex justify-content-end">
                <a href="{{route('mahasiswa-exportRiwayatBimbingan')}}"
                @if ($requestDosbim == null || $requestDosbim->status == 0)
                    disabled 
                @endif
                type="button" class="btn btn-custom" style="width:110px;">Unduh</a>
            </div>
        </div>
    </div>
    <!-- End Riwayat Bimbingan -->

</div>
<!-- End Container Status Dosen -->

    </div>
</div>
@endsection

@section('jslinks')
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

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
        $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });
</script>
@endsection


