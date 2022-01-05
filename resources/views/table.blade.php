@extends('layouts.app')

@section('title', 'Reviewer')
@section('csslinks')
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/navbar/navbar.css">
<link rel="stylesheet" href="css/table.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Informasi Dosen Reviewer</h1>
    <div class="row text-center d-flex justify-content-center">
        <div class="col-md-4">
            <div class="form-group">
                <select class="custom-select select-akun mx-auto" id="select-fakultas">
                    <option selected value="">Filter by Fakultas</option>
                    @foreach ($daftarFakultas as $fakultas)
                        <option value="{{$fakultas->fakultas_name}}">{{$fakultas->fakultas_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <input type="button" class="btn btn-filter" value="Filter" id="filter_btn">
        </div>
    </div>
    <div>
        {{-- <input type="text" class="boxSearch"> --}}
    </div>

    <!-- Start Introduction Section -->
    <div class="introduction">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Email</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody class="listSearch">
                        @foreach ($daftarReviewer as $reviewer)
                        <tr>
                            <td>{{$reviewer->user->name}}</td>
                            <td>{{$reviewer->nip_reviewer}}</td>
                            @if ($reviewer->fakultas != null)
                            <td>{{$reviewer->fakultas->fakultas_name}}</td>
                            <td>{{$reviewer->user->name}}</td>
                            <td><img style="max-width: 83px; max-height:101px;"  src="avatar/{{$reviewer->reviewer_picture}}"></td>                                
                            @else
                            <td>Informasi Reviewer Belum Dimasukan</td>
                            <td>{{$reviewer->user->name}}</td>
                            <td><img src=""></td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-1">

            </div>
        </div>
    </div>
    <!-- End Introduction Section -->
</div>
@endsection

@section('jslinks')
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
        $(document).ready(function($){
        $('.listSearch tr').each(function(){
            $(this).attr('searchData', $(this).text().toLowerCase());
        });
        // read selected option
        $('#filter_btn').click(function(){
            var fakultas = $('#select-fakultas').val();
            var dataList = fakultas.toLowerCase();
            $('.listSearch tr').each(function(){
                if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 || dataList.length < 1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection

