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
                    @if ($mahasiswa->nip_reviewer !=null)
                    <tr>
                        <td>Nama Reviewer </td>
                        <td>: {{$reviewer->user->name}}</td>
                    </tr>
                    <tr>
                        <td>NIP Reviewer </td>
                        <td>: {{$reviewer->nip_reviewer}}</td>
                    </tr>
                    <tr>
                        <td>Fakultas Reviewer </td>
                        <td>: {{$reviewer->fakultas}}</td>
                    </tr>
                    <tr>
                        <td>Email Reviewer </td>
                        <td>: {{$reviewer->user->email}}</td>
                    </tr>
                    @else
                        <td>
                            Anda belum ditugaskan Reviewer
                        </td>
                    </tr>
                    @endif
                </table>
            </div>

            <!-- File Revisi -->
            @if ($mahasiswa->nip_reviewer == null)
                <div class="container container-upload-revisi disabled-style ">
            @else
                <div class="container container-upload-revisi ">
            @endif
                <h5>File Revisi</h5>
                <!-- Upload File -->
                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                @endif
                <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
                <form id="file-upload-form" action="{{route('mahasiswa-upload_file_revisi')}}" method="POST" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}

                    <input id="file-upload" class="file-upload-class" type="file" name="fileUpload" data-title="" 
                    @if ($mahasiswa->nip_reviewer == null)
                        onclick="disableUpload()"
                    @endif
                    />
                    <label for="file-upload" id="file-drag">
                        <i class="fas fa-file-word fa-5x" style="color: blue;"></i>
                        <br /><br /><span id="file-upload-btn" 
                        @if ($mahasiswa->nip_reviewer == null)
                            class="button disabled-style"
                        @else
                            class="button"
                        @endif    
                        >Perbarui Berkas</span>
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
                            <button type="submit" class="btn btn-custom" style="width: 160px; height: 60px;" 
                            @if ($mahasiswa->nip_reviewer == null)
                                disabled
                            @endif    
                            >Submit</button>
                        </div>
                    </div>
                </form>
                <!-- End Upload File -->
                <div class="file-proposal">
                    <h5>File Revisi Dosen</h5>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-warning">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @foreach ($daftarFileRevisiReviewer as $fileRevisi)
                    <div class="row file-row d-flex justify-content-center p-2">
                        <img src="../../img/doc.png" alt="Doc File">
                        <div class="col-md-8" style="word-wrap:break-word">
                            <p>{{$fileRevisi->file_revisi}}</p>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('mahasiswa-downloadFileRevisiReviewer',['filename'=>$fileRevisi->file_revisi])}}" class="btn btn-custom">Download</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- End File Revisi -->

            <!-- Kegiatan Dosen -->
        @if ($mahasiswa->nip_reviewer == null)
            <div class="dosen-reviewer disabled-style">
        @else
            <div class="dosen-reviewer ">
        @endif
                <div class="row status-header">
                    <h5>Kegiatan Coaching</h5>
                </div>
                {{-- Start Form --}}
                <form class="form-bimbingan" method="POST" action="{{route('mahasiswa-kegiatan_coaching')}}">
                    @csrf
                    <div class="form-group row">
                     
                        <label for="selectTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                     
                        <div class="col-sm-7">
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" 
                            @if ($mahasiswa->nip_reviewer == null)
                                readonly
                            @endif
                            />
                        </div>
                     
                        <div class="col-sm-2">
                            <i class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></i>
                        </div>
                     
                    </div>
                    <div class="form-group row">
                        <label for="inputHasilDiskusi" class="col-sm-2 col-form-label">Hasil Diskusi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="inputHasilDiskusi" id="hasilDiskusi" cols="30"
                                rows="10" 
                                @if ($mahasiswa->nip_reviewer == null)
                                    readonly
                                @endif
                                ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 d-flex justify-content-end">
                            <button type="submit" class="btn btn-custom" style="width: 160px;" 
                            @if ($mahasiswa->nip_reviewer == null)
                                disabled
                            @endif
                            >Submit</button>
                        </div>
                    </div>
                </form>
                {{-- End Form --}}

            </div>
            <!-- End Kegiatan Dosen -->

            <!-- Riwayat Bimbingan -->
            @if ($mahasiswa->nip_reviewer == null)
                <div class="dosen-reviewer disabled-style">
            @else
                <div class="dosen-reviewer">
            @endif
                <div class="row status-header">
                    <h5>Riwayat Coaching</h5>
                </div>
                <table class="table hasil-diskusi">
                    <thead class="text-center">
                        <th>Tanggal Pertemuan</th>
                        <th>Hasil Diskusi dan Komentar</th>
                    </thead>

                    @foreach ($riwayatCoaching as $riwayat)
                        <tr class="text-center">
                            <td>{{$riwayat->tanggal}}</td>
                            <td>{{$riwayat->hasil_diskusi}}</td>
                        </tr>
                    @endforeach

                </table>
                <div class="row">
                    <div class="col-sm-10 d-flex justify-content-end">
                        <a type="button" href="{{route('mahasiswa-exportRiwayatCoaching')}}" class="btn btn-custom" style="width:160px;"
                        @if ($mahasiswa->nip_reviewer == null)
                            disabled
                        @endif
                        >Print</a>
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
    function disableUpload() {
        document.getElementById("file-upload").disabled = true;
    }
</script>
<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
        
        // disabled onClick saat reviewer tidak ditugaskan
        // document.getElementById("file-upload").disabled = true;
    })

</script>

<script>
    (function () {
        function Init() {
            var fileSelect = document.getElementById('file-upload'),
                fileDrag = document.getElementById('file-drag'),
                submitButton = document.getElementById('submit-button');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        function output(msg) {
            var m = document.getElementById('messages');
            m.innerHTML = msg;
        }

        function parseFile(file) {
            output(
                '<ul>' +
                '<li>Name: <strong>' + encodeURI(file.name) + '</strong></li>' +
                '<li>Type: <strong>' + file.type + '</strong></li>' +
                '<li>Size: <strong>' + (file.size / (1024 * 1024)).toFixed(2) + ' MB</strong></li>' +
                '</ul>'
            );
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {

            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById('class-roster-file'),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 1024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    // Progress bar
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function (e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!

                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open('POST', document.getElementById('file-upload-form').action, true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    })();
</script>

@endsection

