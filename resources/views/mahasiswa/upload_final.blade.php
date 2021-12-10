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
                @if ($mahasiswa->nip_reviewer == null)
                <p>Anda Belum Ditugaskan Reviewer</p>
                @else
                
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                                <!-- Upload File -->
            <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
            <form id="file-upload-form" action="{{route('mahasiswa-proses_upload_final')}}" method="POST" enctype="multipart/form-data">
                
                {{ csrf_field() }}

                <input type="hidden" name="idProposal" value="{{$proposal->id_file_proposal}}">
                <label for="judulProposalFinal">Judul Proposal:</label>
                <input type="text" name="judulProposalFinal" id="judulProposalFinal" class="form-control">
                <label for="kategori">Kategori Proposal</label>
                <div class="form-group">
                    <select class="custom-select select-akun" name="kategoriPKMFinal">
                        <option selected>Pilih Kategori PKM</option>
                        @foreach ($kategoriPKM as $kategoriItem)
                            <option value="{{$kategoriItem->id}}">{{$kategoriItem->kategori_name}}</option>
                        @endforeach
                      </select>
                </div>

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
                @endif

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

