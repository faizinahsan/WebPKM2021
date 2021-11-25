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

/** Require No Login */
Route::get('/',function(){
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
Route::group(['middleware' => ['can:isMahasiswa']], function () {
    Route::get('/mahasiswa/profile','ProfileMahasiswaController@index')->name('mahasiswa-profile');
    
    Route::post('/mahasiswa/tambah_anggota','ProfileMahasiswaController@tambahAnggota')->name('tambah-anggota');

    Route::get('/mahasiswa/konsultasi_dosbim','MahasiswaControllers\KonsultasiPendamping@index')->name('mahasiswa-konsultasi_dosbim');
    Route::post('/mahasiswa/konsultasi_dosbim/kegiatan_bimbingan','MahasiswaControllers\KonsultasiPendamping@kegiatanBimbingan')->name('mahasiswa-kegiatan_bimbingan');

    Route::post('/mahasiswa/request_dosbim', 'MahasiswaControllers\KonsultasiPendamping@requestPendamping')->name('request-pendamping');

    Route::get('/mahasiswa/konsultasi_dosbim2',function(){
        return view('mahasiswa.konsultasi_dosbim2');
    })->name('mahasiswa-konsultasi_dosbim2');
    
    Route::get('/mahasiswa/konsultasi_dosbim3',function(){
        return view('mahasiswa.konsultasi_dosbim3');
    })->name('mahasiswa-konsultasi_dosbim3');
    
    Route::get('/mahasiswa/upload_proposal','MahasiswaControllers\UploadProposalController@index')->name('mahasiswa-upload_proposal');
    Route::post('/mahasiswa/upload_proposal/proses','MahasiswaControllers\UploadProposalController@proses_upload')->name('mahasiswa-proses_upload_proposal');
    
    Route::get('/mahasiswa/coaching','MahasiswaControllers\CoachingController@index')->name('mahasiswa-coaching');
    Route::post('/mahasiswa/coaching/kegiatanCoaching','MahasiswaControllers\CoachingController@kegiatanCoaching')->name('mahasiswa-kegiatan_coaching');
    Route::post('/mahasiswa/coaching/uploadFileRevisi','MahasiswaControllers\CoachingController@uploadFileRevisi')->name('mahasiswa-upload_file_revisi');
    
    
    Route::get('/mahasiswa/upload_final','MahasiswaControllers\UploadProposalController@uploadProposalFinalView')->name('mahasiswa-upload_final');
    Route::post('/mahasiswa/upload_final/proses','MahasiswaControllers\UploadProposalController@uploadProposalFinal')->name('mahasiswa-proses_upload_final');
    
    Route::get('/mahasiswa/akun_simbelmawa','MahasiswaControllers\AkunSimbelmawaController@index')->name('mahasiswa-akun_simbelmawa');
    
    Route::get('/mahasiswa/akun_simbelmawa2',function(){
        return view('mahasiswa.akun_simbelmawa2');
    })->name('mahasiswa-akun_simbelmawa2');
});


/**Dosen Pendamping */
Route::group(['middleware' => ['can:isPendamping']], function () {
    Route::get('/dosen_pendamping/profile','DosenPendampingControllers\DosenPendampingController@index')->middleware('can:isPendamping')->name('dosen_pendamping-profile');

    Route::post('/dosen_pendamping/profile/terima-mahasiswa','DosenPendampingControllers\DosenPendampingController@terimaMahasiswa')->middleware('can:isPendamping')->name('terima-mahasiswa');
    
    Route::post('/dosen_pendamping/profile/tolak-mahasiswa','DosenPendampingControllers\DosenPendampingController@tolakMahasiswa')->middleware('can:isPendamping')->name('tolak-mahasiswa');
    
    Route::get('/dosen_pendamping/profile_keterangan/{id?}','DosenPendampingControllers\DosenPendampingController@showKeteranganMahasiswa')->name('dosen_pendamping-profile_keterangan');
    
    Route::get('/dosen_pendamping/profile1','DosenPendampingControllers\DosenPendampingController@showDaftarDisejutui')->name('dosen_pendamping-profile1');
    
});

/**Dosen Reviewer */
Route::group(['middleware' => ['can:isReviewer']], function () {
    Route::get('/dosen_reviewer/profile',function(){
        return view('dosen_reviewer.profile');
    })->name('dosen_reviewer-profile');
    
    Route::get('/dosen_reviewer/profile_keterangan',function(){
        return view('dosen_reviewer.profile_keterangan');
    })->name('dosen_reviewer-profile_keterangan');
});

/** Kemahasiswaan */
Route::group(['middleware' => ['can:isKemahasiswaan']], function () {
    
    Route::get('/kemahasiswaan/proposal','KemahasiswaanControllers\ProposalKemahasiswaanController@index')->name('kemahasiswaan-proposal');
    
    Route::get('/kemahasiswaan/proposal/{id?}','KemahasiswaanControllers\ProposalKemahasiswaanController@detailProposal')->name('kemahasiswaan-detail_proposal');
    Route::post('kemahasiswaan/proposal/tugaskanReviewer', 'KemahasiswaanControllers\ProposalKemahasiswaanController@tugaskanReviewer')->name('kemahasiswaan-tugaskan_reviewer');

    Route::get('/kemahasiswaan/berkas',function(){
        return view('kemahasiswaan.berkas');
    })->name('kemahasiswaan-berkas');
    
    Route::get('/kemahasiswaan/reviewer',function(){
        return view('kemahasiswaan.reviewer');
    })->name('kemahasiswaan-reviewer');
    
    Route::get('/kemahasiswaan/timeline',function(){
        return view('kemahasiswaan.timeline');
    })->name('kemahasiswaan-timeline');
});

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

