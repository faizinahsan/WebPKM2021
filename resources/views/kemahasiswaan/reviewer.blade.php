@extends('layouts.app')

@section('title', 'Konsultasi Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/reviewer.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/search.css">
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
        <!-- Container Timeline -->
        <div class="container">
            <h3>Reviewer</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <!-- Timeline -->
            <form class="form-timeline" action="{{route('kemahasiswaan-addReviewerInfo')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="inputFoto" class="col-sm-2 col-form-label">Pilih Reviewer</label>
                    <div class="col-sm-10">
                        <input type="text" class="boxSearch form-control" placeholder="Ketik Nama Dosen Reviewer" />
                        <select multiple class="custom-select listSearch" name="dosenReviewer">
                            @foreach ($daftarDosenReviewerFakultas as $dosenReviewer)
                                <option value="{{$dosenReviewer->nip_reviewer}}">{{$dosenReviewer->user->name}}</option>                        
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selectFakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="form-group col-sm-10">
                        <select class="custom-select select-akun" name="fakultas">
                            <option selected>Fakultas</option>
                            @foreach ($daftarFakultas as $fakultas)
                                <option value="{{$fakultas->id}}">{{$fakultas->fakultas_name}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" name="reviewer_picture" class="form-control" id="inputFoto" accept="image/*" placeholder="">
                    </div>
                </div>

                <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-custom" style="width: 160px;">Tambahkan</button>
                </div>
            </form>
            <!-- End Timeline -->
        </div>
        <!-- End Container Timeline -->

        <!-- Container Tabel Reviewer -->
        <div class="container container-table">
            <!-- Tabel Reviewer -->
            <table class="table">
                <thead class="striped-section">
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($daftarDosenReviewer as $dosenReviewer)
                    <tr>
                        <td>{{$dosenReviewer->user->name}}</td>
                        <td>{{$dosenReviewer->nip_reviewer}}</td>
                        @if ($dosenReviewer->fakultas !=null)
                        <td>{{$dosenReviewer->fakultas->fakultas_name}}</td>
                        <td>{{$dosenReviewer->user->email}}</td>
                        <td><img src="{{asset('/storage/images/'.$dosenReviewer->reviewer_picture)}}"></td>
                        @else
                        <td>Belum Dimasukan</td>
                        <td>{{$dosenReviewer->user->email}}</td>
                        <td><img src="{{asset('/storage/images/'.$dosenReviewer->reviewer_picture)}}"></td>
                        @endif
                        <td>
                            <a href="{{route('kemahasiswaan-deleteReviewerInfo',['nip_reviewer'=>$dosenReviewer->nip_reviewer])}}" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="striped-section">
                        <td>Dra. Erna Susiati, M.Pd</td>
                        <td>195612241986092001</td>
                        <td>Psikologi</td>
                        <td>erna.susiati@unpad.ac.id</td>
                        <td><img src="../../img/erna.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Dr. Yus Nugraha, MA</td>
                        <td>196007091986011002</td>
                        <td>Psikologi</td>
                        <td>yus.nugraha@unpad.ac.id</td>
                        <td><img src="../../img/yus.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr class="striped-section">
                        <td>Rudiana, S.IP., M.Si.</td>
                        <td>197411242003121001</td>
                        <td>FISIP</td>
                        <td>rudiana1974@gmail.com</td>
                        <td><img src="../../img/rudi.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Dr. Fitrilawati, MSc</td>
                        <td>196502081994122001 </td>
                        <td>FMIPA</td>
                        <td>firi@gmail.com</td>
                        <td><img src="../../img/fitri.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr class="striped-section">
                        <td>Dra. Nurul Yanuarti, M.Si</td>
                        <td>196001241987012001</td>
                        <td>Psikologi</td>
                        <td>nurul.yanuarti@unpad.ac.id</td>
                        <td><img src="../../img/nurul.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nowo Riveli, Ph.D</td>
                        <td>198211292016044001</td>
                        <td>FMIPA</td>
                        <td>nowo@gmail.com</td>
                        <td><img src="../../img/nowo.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr class="striped-section">
                        <td>Dr. Zainal Abidin, M.Si</td>
                        <td>196209221992031001</td>
                        <td>Psikologi</td>
                        <td>zainal.abidin@unpad.ac.id</td>
                        <td><img src="../../img/zainal.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Idil Akbar, S.IP., M.IP.</td>
                        <td>19810813 201404 1 001</td>
                        <td>FISIP</td>
                        <td>idil.akbar@gmail.com</td>
                        <td><img src="../../img/idil.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>
                    <tr class="striped-section">
                        <td>Dr. Neneng Yani Yuni</td>
                        <td>197512282005022001</td>
                        <td>FISIP</td>
                        <td>nenengyany@yahoo.co.id</td>
                        <td><img src="../../img/neng.jpg"></td>
                        <td>
                            <a href="" class="btn btn-custom">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
            <!-- End Tabel Reviewer -->
        </div>
        <!-- End Container Tabel Reviewer -->

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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function($){
        $('.listSearch option').each(function(){
            $(this).attr('searchData', $(this).text().toLowerCase());
        });
        $('.boxSearch').on('keyup', function(){
        var dataList = $(this).val().toLowerCase();
            $('.listSearch option').each(function(){
                if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 || dataList.length < 1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
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
</script>
@endsection

