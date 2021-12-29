@extends('layouts.app')

@section('title', 'Konsultasi Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/kemahasiswaan.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/berkas.css">
<!-- datepicker -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
    <!-- Sidebar  -->
    @include('layouts.sidenavkemahasiswaan')

    <!-- Page Content  -->
    <div id="content">
        <!-- Container Timeline -->
        <div class="container">
            <h3>Berkas</h3>
            <!-- Upload File -->
            <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
            <form id="file-upload-form" action="{{route('kemahasiswaan-uploadBerkas')}}" method="POST", enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="judulBerkas">Judul Berkas:</label>
                <input type="text" name="judulBerkas" id="judulBerkas" class="form-control">
                <label for="fileProposal" class="mt-3">File Berkas:</label>
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
        <!-- End Container Timeline -->

        <!-- Container Tabel Timeline -->
        <div class="container container-table">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <h5>Daftar Berkas</h5>
            <!-- Tabel Timeline -->
            <table class="table">
                <thead>
                    <th>Judul</th>
                    <th>File</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($daftarBerkas as $berkas)
                    <tr>
                        <td>{{$berkas->judul_berkas}}</td>
                        <td>{{$berkas->file_berkas}}</td>
                        <td>
                            <button class="deleteBerkasBtn btn btn-custom" data-toggle="modal" data-target="#deleteBerkasModal" data-href="{{route('kemahasiswaan-deleteBerkas',['id_berkas'=>$berkas->id_berkas])}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <!-- End Tabel Timeline -->
        </div>
        <!-- End Container Tabel Timeline -->
        <div class="deleteBerkasModal modal fade" id="deleteBerkasModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Menghapus Berkas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus berkas ini?</p>
                </div>
                <div class="modal-footer">
                    <form action="#" id="deleteBerkasForm" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">IYA</button>
                    </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                </div>
              </div>
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

<!-- DatePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>
<script type="text/javascript">
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
    })
    $(document).on("click",".deleteBerkasBtn",function() {
         var href_form = $(this).data('href');
         $(".deleteBerkasModal #deleteBerkasForm").attr('action',href_form);

     });
</script>
@endsection

