@extends('layouts.app')

@section('title', 'Alur')
@section('csslinks')
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/navbar/navbar.css">
<link rel="stylesheet" href="css/alur.css">
@endsection

@section('content')

<!-- Start Container Section -->
<div class="container">
    <h1 class="text-center"> Alur PKM UNPAD</h1>
    <div class="row">
        <!-- Start Introduction Section -->
        <div class="introduction">
            <div class="row row-custom">
                <div class="col-md-1">

                </div>

                <div class="col-md-5">
                    <img src="img/alurr.jpg">
                </div>

                <div class="col-md-5">
                    <h6>Tahap 1</h6>
                    <h5>Konsultasi Dosen Pendamping</h5>
                    <p>Sebelum mengajukan proposal pkm, pastikan dulu sudah mempunyai dosen pendamping.
                        Dosen pendamping bisa didapatkan dengan meminta persetujuan dosen tersebut lalu
                        berdiskusi mengenai tema proposal pkm yang akan diajukan. TIdak ada batasan dosen
                        mana yang boleh menjadi pendamping, asalkan dosen bersangkutan memahami topik pkm
                        yang akan diajukan dan bersedia menjadi dosen pendamping.</p>
                </div>

                <div class="col-md-1">

                </div>

            </div>
            <br><br><br>

            <div class="row row-custom">
                <div class="col-md-1">

                </div>

                <div class="col-md-5">
                    <h6>Tahap 2</h6>
                    <h5>Upload Proposal</h5>
                    <p>Tahap ini merupakan upload proposal pertama kali setelah konsultasi dengan dosen
                        pendamping. Upload proposal di Unpad terdiri dari beberapa tahap. Ada tahap Liga,
                        Non Liga dan Gelombang 3. Tahap upload proposal ini sama saja, yang membedakan hanya
                        tanggal batas waktu pengumpulan dan juga pada tahap Liga, 10 proposal terbaik akan
                        mendapatkan hadiah dari pihak Universitas.</p>
                </div>

                <div class="col-md-5">
                    <img src="img/alur2.jpg">
                </div>

                <div class="col-md-1">

                </div>

            </div>
            <br><br><br>

            <div class="row row-custom">
                <div class="col-md-1">

                </div>

                <div class="col-md-5">
                    <img src="img/alur3.jpg">
                </div>

                <div class="col-md-5">
                    <h6>Tahap 3</h6>
                    <h5>Coaching Dosen Reviewer</h5>
                    <p>Tahap ini dilakukan setelah upload proposal. Proposal yang telah dikumpulkan akan
                        ditampung oleh pihak reviewer yang kemudian setiap kelompok akan diberikan dosen
                        reviewer yang gunanya adalah untuk memperbaiki dan meriview proposal kelompok agar
                        siap upload ke simbelmawa nantinya. Tahap coaching dilakukan minimal 3 kali bersama
                        dosen reviewer.</p>
                </div>

                <div class="col-md-1">

                </div>

            </div>
            <br><br><br>

            <div class="row row-custom">
                <div class="col-md-1">

                </div>
                <div class="col-md-5">
                    <h6>Tahap 4</h6>
                    <h5>Upload Proposal Final</h5>
                    <p>Setelah selesai melakukan semua tahapan coaching bersama dosen reviewer, maka setiap
                        proposal akan dikumpulkan kembali untuk nantinya direview oleh reviewer tingkat
                        Universitas dan kemudian proposal yang susai akan diberikan akun username dan
                        password agar dapat didaftarkan ke simbelmawa.</p>
                </div>

                <div class="col-md-5">
                    <img src="img/alur4.jpg">
                </div>

                <div class="col-md-1">

                </div>
            </div>
            <br><br><br>

            <div class="row row-custom">
                <div class="col-md-1">

                </div>

                <div class="col-md-5">
                    <img src="img/alur5.jpg">
                </div>

                <div class="col-md-5">
                    <h6>Tahap 5</h6>
                    <h5>Review Universitas</h5>
                    <p>Tahap ini, semua reviewer tingkat Universitas melakukan screening dan memilih
                        sekiranya proposal mana yang pantas untuk mendapatkan username dan password agar
                        dapat didaftarkan ke simbelmawa.</p>
                </div>
                <div class="col-md-1">

                </div>
            </div>
            <br><br><br>

            <div class="row row-custom">
                <div class="col-md-1">

                </div>
                <div class="col-md-5">
                    <h6>Tahap 6</h6>
                    <h5>Akun Simbelmawa</h5>
                    <p>Proposal yang sudah direview oleh pihak Universitas dan dirasa layak akan mendapatkan
                        akun simbelmawa. Kemudian kelompok bisa mengupload proposalnya ke akun simbelmawa.
                    </p>
                </div>

                <div class="col-md-5">
                    <img src="img/alur6.jpg">
                </div>

                <div class="col-md-1">

                </div>
            </div>


        </div>
        <!-- End Introduction Section -->

    </div>
</div>

@endsection
