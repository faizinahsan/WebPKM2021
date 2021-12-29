@extends('layouts.app')

@section('title', 'Dosen Reviewer')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/dosen_reviewer/profile.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                    <div class="col-md-6">
                        <p>{{$mahasiswa->user->name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>{{$mahasiswa->npm_mahasiswa}}</p>
                    </div>
                </div>

                @if (is_null($proposal->layakDiberiAkun))
                <div class="row">
                    <div class="col-md-10">
                        <p>Apakah Proposal PKM ini layak untuk diberi akun simbelmawa?</p>
                        <p>Tombol akan terbuka saat mahasiswa telah melakukan pelatihan dengan dosen reviewer</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <a href="{{route('reviewer-layak_diberi_akun',['idProposal'=>$proposal->id_file_proposal])}}" class="btn btn-custom-profile" 
                        @if ($countDaftarFileRevisi<1 && $countRiwayatCoaching<1)
                        disabled
                        @endif
                        >Layak Diberi akun</a>
                    </div>
                    <div class="col-md-5">
                        <a href="{{route('reviewer-tolak_diberi_akun',['idProposal'=>$proposal->id_file_proposal])}}" class="btn btn-custom-profile" 
                        @if ($countDaftarFileRevisi<1 && $countRiwayatCoaching<1)
                        disabled
                        @endif
                        >Tidak</a>
                    </div>
                </div>
                @else
                @if ($proposal->layakDiberiAkun==true)
                <div class="row">
                    <div class="col-md-10">
                        <p>Proposal Ini Telah Layak Diberi Akun</p>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-10">
                        <p>Proposal Ini Tidak Telah Layak Diberi Akun</p>
                    </div>
                </div>
                @endif
                @endif


                <div class="row">
                    <div class="col-md-4">
                        <h5>File Proposal Awal</h5>
                    </div>
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
                <div class="row file-row">
                    <img src="../../img/doc.png" alt="Doc File">
                    <div class="col-md-6" style="word-wrap:break-word">
                        <p>{{$proposal->judul_proposal}}</p>
                        <p>{{$proposal->kategori->kategori_name}}</p>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('reviewer-download_proposal',['filename'=>$proposal->file_proposal])}}" class="btn btn-custom-profile">Download</a>
                    </div>
                    <div class="col-md-2">
                        {{-- @if ($daftarRevisiReviewer->id_file_proposal != null)
                        @else
                        <button href="#" class="btn btn-custom-profile" data-toggle="modal" data-target="#uploadRevisiProposal">Upload</button>
                        @endif --}}
                        @if ($proposal->id_file_revisi_reviewer != null)
                        <button href="#" class="btn btn-custom-profile" disabled>Telah Direvisi</button>
                        @else
                        <button href="#" class="btn btn-custom-profile" data-toggle="modal" data-target="#uploadRevisiProposal">Upload</button>

                        @endif
                    </div>
                </div>             
            </div>
            <!-- End Status Mahasiswa -->

            <!-- File Revisi Proposal -->
            <div class="file-proposal">
                <h5>File Revisi Mahasiswa</h5>
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @foreach ($daftarFileRevisi as $fileRevisi)
                
                <div class="row file-row">
                    <img src="../../img/doc.png" alt="Doc File">
                    <div class="col-md-6" style="word-wrap:break-word">
                        <p>{{$fileRevisi->file_revisi}}</p>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('reviewer-download_revisi',['filename'=>$fileRevisi->file_revisi])}}" class="btn btn-custom-profile">Download</a>
                    </div>
                    <div class="col-md-2">
                        @if ($fileRevisi->id_file_revisi_reviewer != null)
                        <button href="#" class="btn btn-custom-profile" disabled>Telah Direvisi</button>
                        @else
                        <a href="#" class="btn btn-custom-profile"data-toggle="modal" data-target="#uploadRevisiFileRevisi">Upload</a>                            
                        @endif

                    </div>
                </div>
                     <!-- Modal -->
                     <div class="modal" id="uploadRevisiFileRevisi" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Upload Revisi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              {{-- Start Form --}}
                                <form id="file-upload-form" action="{{route('reviewer-upload_revisi')}}" method="POST" enctype="multipart/form-data">
                                                        
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">File:</label>
                                        <input id="file-upload" class="file-upload-class" type="file" name="fileUploadRevisi" data-title="" />
                                    </div>
                                        <input type="hidden" name="npm_mahasiswa_hidden_input" value="{{$mahasiswa->npm_mahasiswa}}">
                                        <input type="hidden" name="id_proposal_hidden_input" value="{{$proposal->id_file_proposal}}">
                                        <input type="hidden" id = "id_file_revisi_hidden_input" name="id_file_revisi_hidden_input" value="{{$fileRevisi->id_file}}">
                                        <!-- End Upload File -->
                                        {{-- End Form --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-custom">Save changes</button>
                                    </div>
                                </form>
                          </div>
                        </div>
                      </div>
                    <!-- End Modal -->
                @endforeach
            </div>
            <!-- End File Revisi Proposal -->

            

            <!-- Riwayat Bimbingan -->
            <div class="riwayat-bimbingan">
                <h5>Riwayat Coaching</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table class="table table-borderless text-center">
                    <thead>
                        <th>Tanggal</th>
                        <th>Hasil Diskusi</th>
                        <th>Keterangan</th>
                    </thead>

                    @foreach ($daftarRiwayatCoaching as $riwayatCoaching)
                    <tr>
                        <td>{{$riwayatCoaching->tanggal}}</td>
                        <td>{{$riwayatCoaching->hasil_diskusi}}</td>
                        <td>
                            <form action="{{route('reviewer-verifikasiRiwayatCoaching')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="idRiwayatCoaching" value="{{$riwayatCoaching->id_riwayat_coaching}}">
                                <input type="submit"class="btn btn-custom-profile"
                                    style="width: 130px;" name="sesuaiInput" 
                                    @if ($riwayatCoaching->verifikasi == true)
                                    disabled
                                    value="Telah Sesuai"
                                    @endif
                                    value="Sesuai"
                                    >
                            </form>
                        </td>
                    </tr>                        
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-sm-10 d-flex justify-content-end">
                        <a type="button" href="{{route('reviewer-exportRiwayatCoaching',['npm_mahasiswa'=>$proposal->npm_mahasiswa])}}" class="btn btn-custom" style="width:160px;"
                        >Print</a>
                    </div>
                </div>
            </div>
            <!-- End Riwayat Bimbingan -->

            <!-- Modal -->
            <div class="modal" id="uploadRevisiProposal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Upload Revisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    {{-- Start Form --}}
                        <form id="file-upload-form" action="{{route('reviewer-upload_revisi')}}" method="POST" enctype="multipart/form-data">
                                                
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputPassword1">File:</label>
                                <input id="file-upload" class="file-upload-class" type="file" name="fileUploadRevisi" data-title="" />
                            </div>
                                <input type="hidden" name="npm_mahasiswa_hidden_input" value="{{$mahasiswa->npm_mahasiswa}}">
                                <input type="hidden" name="id_proposal_hidden_input" value="{{$proposal->id_file_proposal}}">
                                <input type="hidden" id = "id_file_revisi_hidden_input" name="id_file_revisi_hidden_input" value="">
                                <!-- End Upload File -->
                                {{-- End Form --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-custom">Save changes</button>
                            </div>
                        </form>
                </div>
                </div>
            </div>
            <!-- End Modal -->

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


