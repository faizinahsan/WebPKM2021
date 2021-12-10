@extends('layouts.app')
@section('title', 'WebPKM Unpad')

@section('csslinks')
<link rel="stylesheet" href="{{asset('/css/main.css')}}">
<link rel="stylesheet" href="css/homepage/card.css">
<link rel="stylesheet" href="css/homepage/timeline_copy.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/navbar/navbar_homepage.css">
<script src="https://kit.fontawesome.com/3d79b0331b.js" crossorigin="anonymous"></script>

@endsection

@section('navcontent')
    <!-- Start Image Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active"
                style="background:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(img/backgroundhome.png);">
                <div class="carousel-caption text-center">
                    <h1>Program Kreatifitas Mahasiswa 2021</h1>
                    <h2>Universitas Padjadjaran</h2>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item"
                style="background:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(img/backgroundhome2.png);">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item"
                style="background:linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(img/backgroundhome3.png);">
            </div>
        </div>
        <!-- End Carousel Inner -->
        <!-- Prev & Next Buttons -->
        <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
            <i class="fas fa-caret-square-left fa-2x" style="color: black;"></i>
        </a>
        <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
            <i class="fas fa-caret-square-right fa-2x" style="color: black;"></i>
        </a>
    </div>
@endsection

@section('content')
    <!-- Start Container Section -->
    <div class="container">
        <!-- Start Introduction Section -->
        <div class="introduction">
            <div class="row">
                <div class="col-md-7">
                    <h1>Apa itu PKM?</h1>
                    <p>Program Kreativitas Mahasiswa adalah kegiatan di bawah Kementerian Riset, Teknologi, dan
                        Pendidikan Tinggi untuk meningkatkan kreativitas dan inovasi berlandaskan penguasaan sains dan
                        teknologi. Program ini berupa pemberian dana bagi proposal-proposal yang dinilai layak oleh tim
                        juri untuk dilaksanakan. Di akhir program, karya terpilih akan diikutsertakan ke Pekan Ilmiah
                        Mahasiswa Nasional (PIMNAS) yang menjadi salah satu penentu pemeringkatan perguruan tinggi
                        negeri. </p>
                    <a href="#" class="btn btn-primary btn-upload-proposal">Upload Proposal</a>
                </div>
                <div class="col-md-5">
                    <img class="upload-proposal-img" src="img/homeicon.png" alt="icon">
                </div>
            </div>
        </div>
        <!-- End Introduction Section -->
    </div>
    <!-- End Container Section -->
    {{-- <!-- Start Article Section -->
    <div class="article">
        <h1 class="text-center">Seputar PKM UNPAD</h1>
        <div class="">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <div class="container">
                    <div class="carousel-inner carousel-inner-two row mx-auto ">
                        <div class="carousel-item carousel-item-two col-md-3 active" style="max-height: 500px;">
                            <div class="card" style="max-width: 261px; max-height: 500px;">
                                <img class="card-img-top" src="img/cardimgcontainer.png" alt="Card image cap"
                                    style="max-width: 261px; max-height: 185px;">
                                <div class="card-body">
                                    <h5 class="card-title">PKM Unpad Lolos Pimnas</h5>
                                    <p class="card-text" style="max-height: 154px;">Empat kelompok Program Kreativitas
                                        Mahasiswa (PKM) Universitas
                                        Padjadjaran dinyatakan lolos sebagai peserta Pekan Ilmiah Mahasiswa Nasional
                                        (Pimnas)
                                        ke-32 </p>
                                    <div class="text-center pt-md-2">
                                        <a class="btn btn-primary btn-custom-readmore" href="news.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item carousel-item-two col-md-3" style="max-height: 500px;">
                            <div class="card" style="max-width: 261px; max-height: 500px;">
                                <img class="card-img-top" src="img/cardimgcontainer.png" alt="Card image cap"
                                    style="max-width: 261px; max-height: 185px;">
                                <div class="card-body">
                                    <h5 class="card-title">Tim Plesetan Siap Pimnas</h5>
                                    <p class="card-text" style="max-height: 154px;">Empat kelompok Program Kreativitas
                                        Mahasiswa (PKM) Universitas
                                        Padjadjaran dinyatakan lolos sebagai peserta Pekan Ilmiah Mahasiswa Nasional
                                        (Pimnas)
                                        ke-32 </p>
                                    <div class="text-center pt-md-2">
                                        <a class="btn btn-primary btn-custom-readmore" href="news.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item carousel-item-two col-md-3" style="max-height: 500px;">
                            <div class="card" style="max-width: 261px; max-height: 500px;">
                                <img class="card-img-top" src="img/cardimgcontainer.png" alt="Card image cap"
                                    style="max-width: 261px; max-height: 185px;">
                                <div class="card-body">
                                    <h5 class="card-title">PKM Unpad Lolos Pimnas</h5>
                                    <p class="card-text" style="max-height: 154px;">Empat kelompok Program Kreativitas
                                        Mahasiswa (PKM) Universitas
                                        Padjadjaran dinyatakan lolos sebagai peserta Pekan Ilmiah Mahasiswa Nasional
                                        (Pimnas)
                                        ke-32 </p>
                                    <div class="text-center pt-md-2">
                                        <a class="btn btn-primary btn-custom-readmore" href="news.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item carousel-item-two col-md-3" style="max-height: 500px;">
                            <div class="card" style="max-width: 261px; max-height: 500px;">
                                <img class="card-img-top" src="img/cardimgcontainer.png" alt="Card image cap"
                                    style="max-width: 261px; max-height: 185px;">
                                <div class="card-body">
                                    <h5 class="card-title">Kompor Lansia Unpad</h5>
                                    <p class="card-text" style="max-height: 154px;">Empat kelompok Program Kreativitas
                                        Mahasiswa (PKM) Universitas
                                        Padjadjaran dinyatakan lolos sebagai peserta Pekan Ilmiah Mahasiswa Nasional
                                        (Pimnas)
                                        ke-32 </p>
                                    <div class="text-center pt-md-2">
                                        <a class="btn btn-primary btn-custom-readmore" href="news.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Controls-->
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <i class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></i>

                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <i class="far fa-arrow-alt-circle-right fa-3x" style="color: black;"></i>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->

            </div>
        </div>
    </div>
    <!-- End Article Section --> --}}

    <!-- Start Timeline Section-->
    <div class="container">
        <div class="wrap">
            <div class="timeline">
                <div class="year">

                    <div class="evt">
                        <div class="in">
                            <span class="date fas fa-clock" style="font-size: 60px; border: 0px; color: #f9ca48;"></span>
                            <!-- <span class="date">
                            </span> -->
                        </div>
                    </div>

                    @foreach ($dayAndMonth as ["day"=>$day,"month"=>$month,"nama_timeline"=>$nama_timeline,"deskripsi"=>$deskripsi])
                    
                    <div class="evt">
                        <div class="in">
                            <span class="date">
                                <span class="day">{{$day}}</span>
                                <span class="month">{{$month}}</span>
                            </span>
                            <h2>{{$nama_timeline}}</h2>
                            <p class="data">{{$deskripsi}}</p>
                        </div>
                    </div>                        
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- End  Timeline Section-->
@endsection

@section('jslinks')
<script src="js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myCarousel").on("slide.bs.carousel", function (e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 4;
            var totalItems = $(".carousel-item-two").length;
            console.log("total items: " + totalItems)

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $(".carousel-item-two")
                            .eq(i)
                            .appendTo(".carousel-inner-two");
                    } else {
                        $(".carousel-item-two")
                            .eq(0)
                            .appendTo($(this).find(".carousel-inner-two"));
                    }
                }
            }
        });
    });
</script>
@endsection

