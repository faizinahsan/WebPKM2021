@extends('layouts.app')

@section('title', 'Konsultasi Dosen Pendamping')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/kemahasiswaan/kemahasiswaan.css">
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
            <h3>Timeline</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

            <!-- Timeline -->
            <form class="form-timeline" action="{{route('kemahasiswaan-addTimeline')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="selectTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-7">
                        <input class="form-control date" id="date" name="date" placeholder="YYYY-MM-DD" type="text" />
                    </div>
                    <div class="col-sm-2">
                        <i class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></i>
                    </div>
                    <!-- <div class='col-8 input-group date'>
                                        <input type='text' class="form-control"  id='date' name="date"/>
                                        <span class="input-group-addon">
                                            <span class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></span>
                                        </span>
                                    </div> -->
                </div>
                <div class="form-group row">
                    <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_timeline" id="nama_timeline" class="form-control">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputHasilDiskusi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                            rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 d-flex justify-content-end">
                        <button type="submit" class="btn btn-custom" style="width: 160px;">Tambahkan</button>
                    </div>
                </div>
            </form>
            <!-- End Timeline -->
        </div>
        <!-- End Container Timeline -->

        <!-- Container Tabel Timeline -->
        <div class="container container-table">
            <!-- Tabel Timeline -->
            <table class="table">
                <thead class="striped-section">
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                </thead>
                <tbody>
                    @foreach ($dayAndMonth as ["day"=>$day,"month"=>$month,"year"=>$year,"tanggal"=>$tanggal,"id_timeline"=>$id_timeline,"nama_timeline"=>$nama_timeline,"deskripsi"=>$deskripsi])
                        <tr>
                            <td>{{$day." ".$month." ".$year}}</td>
                            <td>{{$nama_timeline}}</td>
                            <td>{{$deskripsi}}</td>
                            <td>
                                <a class="editTimelineBtn btn btn-custom mr-3" data-toggle="modal" data-target="#editTimelineModal" data-nama_timeline="{{$nama_timeline}}" data-tanggal={{$tanggal}} data-deskripsi="{{$deskripsi}}" data-id_timeline ="{{$id_timeline}}">Edit</a>
                                <a href="" data-toggle="modal" data-target="#deleteTimelineModal" data-id_timeline="{{$id_timeline}}" class="deleteTimelineBtn btn btn-custom">Delete</a>
                            </td>
                        </tr>    
                    @endforeach
                              
                    
                </tbody>
            </table>
            <!-- End Tabel Timeline -->
        </div>
        <!-- End Container Tabel Timeline -->
        <div class="modal edit-modal fade" tabindex="-1" role="dialog" id="editTimelineModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Timeline</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <!-- Timeline -->
                    <form class="form-timeline" action="{{route('kemahasiswaan-editTimeline')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <input type="hidden" name="id_timeline" id="id_timeline">

                            <label for="selectTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-7">
                                <input class="form-control date" id="date" name="date" placeholder="YYYY-MM-DD" type="text" />
                            </div>
                            <div class="col-sm-2">
                                <i class="fas fa-calendar-week fa-2x" style="color: #f9ca48;"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_timeline" id="nama_timeline" class="form-control">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputHasilDiskusi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 d-flex justify-content-end">
                                <button type="submit" class="btn btn-custom" style="width: 160px;">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Timeline -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade delete-modal" tabindex="-1" id="deleteTimelineModal" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">WARNING</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus timeline?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('kemahasiswaan-deleteTimeline')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_timeline" id="id_timeline">
                        <button type="submit" class="btn btn-primary">IYA DELETE THEM</button>
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
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });
     $(document).on("click",".editTimelineBtn",function() {
         var nama_timeline = $(this).data('nama_timeline');
         var id_timeline = $(this).data('id_timeline');
         var tanggal = $(this).data('tanggal');
         var deskripsi = $(this).data('deskripsi');
         $(".edit-modal #nama_timeline").val(nama_timeline);
         $(".edit-modal #id_timeline").val(id_timeline);
         $(".edit-modal #date").val(tanggal);
         $(".edit-modal #deskripsi").val(deskripsi);
     });
     $(document).on("click",".deleteTimelineBtn",function() {
         var id_timeline = $(this).data('id_timeline');
         $(".delete-modal #id_timeline").val(id_timeline);
     });
</script> 

@endsection
