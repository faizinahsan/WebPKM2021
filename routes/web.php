<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/** Require No Login */
Route::get('/index',function(){
    return view('index');
})->name('index');
Route::get('/alur',function(){
    return view('alur');
})->name('alur');
Route::get('/berkas',function(){
    return view('berkas');
})->name('berkas');
Route::get('/login',function(){
    return view('login');
})->name('login');
Route::get('/signup',function(){
    return view('signup');
})->name('signup');
Route::get('/table',function(){
    return view('table');
})->name('table');
Route::get('/berita',function(){
    return view('news');
})->name('berita');

/**Mahasiswa Views */
Route::get('/mahasiswa/profile',function(){
    return view('mahasiswa.profile');
})->name('mahasiswa-profile');

Route::get('/mahasiswa/konsultasi_dosbim',function(){
    return view('mahasiswa.konsultasi_dosbim');
})->name('mahasiswa-konsultasi_dosbim');

Route::get('/mahasiswa/konsultasi_dosbim2',function(){
    return view('mahasiswa.konsultasi_dosbim2');
})->name('mahasiswa-konsultasi_dosbim2');

Route::get('/mahasiswa/konsultasi_dosbim3',function(){
    return view('mahasiswa.konsultasi_dosbim3');
})->name('mahasiswa-konsultasi_dosbim3');

Route::get('/mahasiswa/upload_proposal',function(){
    return view('mahasiswa.upload_proposal');
})->name('mahasiswa-upload_proposal');

Route::get('/mahasiswa/coaching',function(){
    return view('mahasiswa.coaching');
})->name('mahasiswa-coaching');

Route::get('/mahasiswa/upload_final',function(){
    return view('mahasiswa.upload_final');
})->name('mahasiswa-upload_final');

Route::get('/mahasiswa/akun_simbelmawa',function(){
    return view('mahasiswa.akun_simbelmawa');
})->name('mahasiswa-akun_simbelmawa');

Route::get('/mahasiswa/akun_simbelmawa2',function(){
    return view('mahasiswa.akun_simbelmawa2');
})->name('mahasiswa-akun_simbelmawa2');

/**Dosen Pendamping */
Route::get('/dosen_pendamping/profile',function(){
    return view('dosen_pendamping.profile');
})->name('dosen_pendamping-profile');

Route::get('/dosen_pendamping/profile_keterangan',function(){
    return view('dosen_pendamping.profile_keterangan');
})->name('dosen_pendamping-profile_keterangan');

Route::get('/dosen_pendamping/profile1',function(){
    return view('dosen_pendamping.profile1');
})->name('dosen_pendamping-profile1');

/**Dosen Reviewer */
Route::get('/dosen_reviewer/profile',function(){
    return view('dosen_reviewer.profile');
})->name('dosen_reviewer-profile');

Route::get('/dosen_reviewer/profile_keterangan',function(){
    return view('dosen_reviewer.profile_keterangan');
})->name('dosen_reviewer-profile_keterangan');

/** Kemahasiswaan */
Route::get('/kemahasiswaan/proposal',function(){
    return view('kemahasiswaan.proposal');
})->name('kemahasiswaan-proposal');

Route::get('/kemahasiswaan/proposal2',function(){
    return view('kemahasiswaan.proposal2');
})->name('kemahasiswaan-proposal2');

Route::get('/kemahasiswaan/berkas',function(){
    return view('kemahasiswaan.berkas');
})->name('kemahasiswaan-berkas');

Route::get('/kemahasiswaan/reviewer',function(){
    return view('kemahasiswaan.reviewer');
})->name('kemahasiswaan-reviewer');

Route::get('/kemahasiswaan/timeline',function(){
    return view('kemahasiswaan.timeline');
})->name('kemahasiswaan-timeline');