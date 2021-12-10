@extends('layouts.app')
@section('title','Profile Mahasiswa')

@section('csslinks')
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/navbar/navbar.css">
<link rel="stylesheet" href="../../css/navbar/sidebar.css">
<link rel="stylesheet" href="../../css/mahasiswa/profile.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="wrapper">
    <!-- Side Bar -->
    @include('layouts.sidenavmahasiswa')
    <!-- End Side Bar -->
    <!-- Container/Content -->
    <div id="content">
        <div class="container">
            <h3>Profile</h3>
            <h4>Data Ketua Kelompok</h4>
            <table class="table table-borderless data-ketua">
                <tbody>
                    <tr>
                        <td>Nama Lengkap: </td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Npm : </td>
                        <td>{{$user->mahasiswa->npm_mahasiswa}}</td>
                    </tr>
                </tbody>
            </table>

            <h4>Data Anggota Kelompok</h4>
            <button type="button" data-toggle="modal" data-target="#tambahAnggotaModal" class="btn btn-custom">Tambahkan
                Anggota</button>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <table class="table table-borderless data-anggota">
                <tbody>
                    @foreach ($anggotas as $anggota)
                    <tr>
                        <td>{{$anggota->nama_anggota}}</td>
                        <td>{{$anggota->npm_anggota}}</td>
                        <td>
                            <button class="editAnggotaBtn btn btn-custom" style="width: 70px;" data-toggle="modal" data-target="#editAnggotaModal" data-nama_anggota="{{$anggota->nama_anggota}}" data-npm_anggota={{$anggota->npm_anggota}}>Edit</button>
                        </td>
                        <td>
                            <button class="deleteAnggotaBtn btn btn-custom" style="width: 70px;" data-toggle="modal" data-target="#deleteAnggotaModal" data-npm_anggota={{$anggota->npm_anggota}}>Delete</button>
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="tambahAnggotaModal modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        {{-- Start Form --}}
                        <form action="{{route('tambah-anggota')}}" method="POST">
                            @csrf
                                <input type="hidden" class="form-control" id="npm_anggota_old" name="npm_anggota_old"    aria-describedby="emailHelp" placeholder="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NPM: </label>
                                    <input type="text" class="form-control" id="inputNpmAnggota" name="inputNpmAnggota"    aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="inputNamaLengkapAnggota" placeholder="" name="inputNamaLengkapAnggota">
                                </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-custom">Submit</button>
                        </div>

                        </form>
                        {{-- End Form --}}

                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <!-- Edit Anggota Modal -->
            <div class="editAnggotaModal modal fade" id="editAnggotaModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        {{-- Start Form --}}
                        <form action="{{route('edit-anggota')}}" method="POST">
                            @csrf
                                <input type="hidden" class="form-control" id="npm_anggota_old" name="npm_anggota_old"    aria-describedby="emailHelp" placeholder="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NPM: </label>
                                    <input type="text" class="form-control" id="inputNpmAnggota" name="inputNpmAnggota"    aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="inputNamaLengkapAnggota" placeholder="" name="inputNamaLengkapAnggota">
                                </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-custom">Submit</button>
                        </div>

                        </form>
                        {{-- End Form --}}

                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <div class="deleteAnggotaModal modal fade" id="deleteAnggotaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Menghapus Anggota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus anggota?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('delete-anggota')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="npm_anggota" id="npm_anggota">
                            <button type="submit" class="btn btn-primary">IYA DELETE THEM</button>
                        </form>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- End Container/Content -->
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
     $(document).on("click",".editAnggotaBtn",function() {
         var nama_anggota = $(this).data('nama_anggota');
         var npm_anggota = $(this).data('npm_anggota');
         var npm_anggota_old = $(this).data('npm_anggota');
         $(".editAnggotaModal #inputNamaLengkapAnggota").val(nama_anggota);
         $(".editAnggotaModal #inputNpmAnggota").val(npm_anggota);
         $(".editAnggotaModal #npm_anggota_old").val(npm_anggota_old);
     });
     $(document).on("click",".deleteAnggotaBtn",function() {
         var npm_anggota = $(this).data('npm_anggota');
         $(".deleteAnggotaModal #npm_anggota").val(npm_anggota);
     });

</script>
@endsection
