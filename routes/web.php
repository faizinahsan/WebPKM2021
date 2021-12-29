<?php

use Illuminate\Support\Facades\Route;
use App\Models\Proposal;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\KemahasiswaanControllers\ProposalKemahasiswaanController;


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
Route::get('/','BerandaController@index')->name('index');
Route::get('/alur','BerandaController@alur')->name('alur');
Route::get('/berkas','BerandaController@berkas')->name('berkas');
Route::get('/berkas/{filename?}','BerandaController@downloadBerkas')->name('berkas-download');
Route::get('/table','BerandaController@reviewer_info')->name('table');

Route::get('/login',function(){
    return view('login');
})->name('login');
Route::get('/signup',function(){
    return view('signup');
})->name('signup');

Route::get('/berita',function(){
    return view('news');
})->name('berita');

/**Mahasiswa Views */
Route::group(['middleware' => ['can:isMahasiswa']], function () {
    Route::get('/mahasiswa/profile','ProfileMahasiswaController@index')->name('mahasiswa-profile');
    
    Route::post('/mahasiswa/tambah_anggota','ProfileMahasiswaController@tambahAnggota')->name('tambah-anggota');
    Route::post('/mahasiswa/edit_anggota/{npm_anggota?}','ProfileMahasiswaController@editAnggota')->name('edit-anggota');
    Route::post('/mahasiswa/delete_anggota/{npm_anggota?}','ProfileMahasiswaController@deleteAnggota')->name('delete-anggota');

    Route::get('/mahasiswa/konsultasi_dosbim','MahasiswaControllers\KonsultasiPendamping@index')->name('mahasiswa-konsultasi_dosbim');
    Route::post('/mahasiswa/konsultasi_dosbim/kegiatan_bimbingan','MahasiswaControllers\KonsultasiPendamping@kegiatanBimbingan')->name('mahasiswa-kegiatan_bimbingan');
    Route::get('/mahasiswa/konsultasi_dosbim/exportRiwayatBimbingan','MahasiswaControllers\KonsultasiPendamping@exportRiwayatBimbingan')->name('mahasiswa-exportRiwayatBimbingan');

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
    Route::get('/mahasiswa/coaching/downloadFileRevisiReviewer/{filename?}','MahasiswaControllers\CoachingController@downloadFileRevisiReviewer')->name('mahasiswa-downloadFileRevisiReviewer');
    Route::get('/mahasiswa/coaching/exportRiwayatCoaching','MahasiswaControllers\CoachingController@exportRiwayatCoaching')->name('mahasiswa-exportRiwayatCoaching');
    
    
    Route::get('/mahasiswa/upload_final','MahasiswaControllers\UploadProposalController@uploadProposalFinalView')->name('mahasiswa-upload_final');
    Route::post('/mahasiswa/upload_final/proses','MahasiswaControllers\UploadProposalController@uploadProposalFinal')->name('mahasiswa-proses_upload_final');
    
    Route::get('/mahasiswa/akun_simbelmawa','MahasiswaControllers\AkunSimbelmawaController@index')->name('mahasiswa-akun_simbelmawa');
    Route::post('/mahasiswa/akun_simbelmawa','MahasiswaControllers\AkunSimbelmawaController@upload_bukti_pendanaan')->name('mahasiswa-upload_bukti_pendanaan');
    

});


/**Dosen Pendamping */
Route::group(['middleware' => ['can:isPendamping']], function () {
    Route::get('/dosen_pendamping/profile','DosenPendampingControllers\DosenPendampingController@index')->middleware('can:isPendamping')->name('dosen_pendamping-profile');

    Route::post('/dosen_pendamping/profile/terima-mahasiswa','DosenPendampingControllers\DosenPendampingController@terimaMahasiswa')->middleware('can:isPendamping')->name('terima-mahasiswa');
    
    Route::post('/dosen_pendamping/profile/tolak-mahasiswa','DosenPendampingControllers\DosenPendampingController@tolakMahasiswa')->middleware('can:isPendamping')->name('tolak-mahasiswa');
    
    Route::get('/dosen_pendamping/profile_keterangan/{id?}','DosenPendampingControllers\DosenPendampingController@showKeteranganMahasiswa')->name('dosen_pendamping-profile_keterangan');
    
    Route::get('/dosen_pendamping/profile1','DosenPendampingControllers\DosenPendampingController@showDaftarDisejutui')->name('dosen_pendamping-profile1');
    Route::post('/dosen_pendamping/verifikasiRiwayatBimbingan','DosenPendampingControllers\DosenPendampingController@verifikasiRiwayatBimbingan')->name('dosen_pendamping-verifikasiRiwayatBimbingan');
    Route::get('/dosen_pendamping/downloadProposal/{filename?}','DosenPendampingControllers\DosenPendampingController@downloadProposal')->name('dosen_pendamping-download_proposal');
    Route::get('/dosen_pendamping/exportRiwayatBimbingan/{npm_mahasiswa?}','DosenPendampingControllers\DosenPendampingController@exportRiwayatBimbingan')->name('dosen_pendamping-exportRiwayatBimbingan');
    
});

/**Dosen Reviewer */
Route::group(['middleware' => ['can:isReviewer']], function () {
    Route::get('/dosen_reviewer/profile','ReviewerControllers\ReviewerController@index')->name('dosen_reviewer-profile');
    
    Route::get('/dosen_reviewer/profile_keterangan/{id?}','ReviewerControllers\ReviewerController@keteranganPage')->name('dosen_reviewer-profile_keterangan');
    Route::get('/dosen_reviewer/downloadProposal/{filename?}','ReviewerControllers\ReviewerController@downloadProposal')->name('reviewer-download_proposal');
    Route::get('/dosen_reviewer/downloadRevisi/{filename?}','ReviewerControllers\ReviewerController@downloadRevisi')->name('reviewer-download_revisi');

    Route::post('/dosen_reviewer/uploadRevisiReviewer','ReviewerControllers\ReviewerController@uploadRevisiReviewer')->name('reviewer-upload_revisi');
    Route::post('/dosen_reviewer/verifikasiRiwayatCoaching','ReviewerControllers\ReviewerController@verifikasiRiwayatCoaching')->name('reviewer-verifikasiRiwayatCoaching');
    Route::get('/dosen_reviewer/exportRiwayatCoaching/{npm_mahasiswa?}','ReviewerControllers\ReviewerController@exportRiwayatCoaching')->name('reviewer-exportRiwayatCoaching');
    Route::get('/dosen_reviewer/layak_diberi_akun/{idProposal?}','ReviewerControllers\ReviewerController@layak_diberi_akun')->name('reviewer-layak_diberi_akun');
    Route::get('/dosen_reviewer/tolak_diberi_akun/{idProposal?}','ReviewerControllers\ReviewerController@tolak_diberi_akun')->name('reviewer-tolak_diberi_akun');


});

/** Kemahasiswaan */
Route::group(['middleware' => ['can:isKemahasiswaan']], function () {
    
    // Route::get('/kemahasiswaan/proposal','KemahasiswaanControllers\ProposalKemahasiswaanController@index')->name('kemahasiswaan-proposal');
    Route::get('/kemahasiswaan/proposal',[ProposalKemahasiswaanController::class,'index'])->name('kemahasiswaan-proposal');
    Route::get('/kemahasiswaan/proposal/datatables',[ProposalKemahasiswaanController::class,'proposalDataTables'])->name('datatables.proposal');
    
    Route::get('/kemahasiswaan/proposal/{id?}','KemahasiswaanControllers\ProposalKemahasiswaanController@detailProposal')->name('kemahasiswaan-detail_proposal');
    Route::post('kemahasiswaan/proposal/tugaskanReviewer', 'KemahasiswaanControllers\ProposalKemahasiswaanController@tugaskanReviewer')->name('kemahasiswaan-tugaskan_reviewer');
    Route::get('kemahasiswaan/downloadProposal/{filename?}','KemahasiswaanControllers\ProposalKemahasiswaanController@downloadProposal')->name('download-proposal');
    Route::post('kemahasiswaan/proposal/akunSimbelmawa/{npm_mahasiswa?}', 'KemahasiswaanControllers\ProposalKemahasiswaanController@akunSimbelmawa')->name('kemahasiswaan-akun_simbelmawa');
    Route::get('/kemahasiswaan/proposal/exportRiwayatCoaching/{npm_mahasiswa?}','KemahasiswaanControllers\ProposalKemahasiswaanController@exportRiwayatCoaching')->name('kemahasiswaan-exportRiwayatCoaching');

    
    Route::get('/kemahasiswaan/reviewer','KemahasiswaanControllers\ReviewerKemahasiswaanController@index')->name('kemahasiswaan-reviewer');
    Route::post('/kemahasiswaan/addReviewerInfo','KemahasiswaanControllers\ReviewerKemahasiswaanController@addReviewerInfo')->name('kemahasiswaan-addReviewerInfo');
    Route::get('/kemahasiswaan/deleteReviewerInfo/{nip_reviewer?}','KemahasiswaanControllers\ReviewerKemahasiswaanController@deleteReviewerInfo')->name('kemahasiswaan-deleteReviewerInfo');
    
    Route::get('/kemahasiswaan/timeline','KemahasiswaanControllers\TimelineController@index')->name('kemahasiswaan-timeline');
    Route::post('/kemahasiswaan/addTimeline','KemahasiswaanControllers\TimelineController@addTimeline')->name('kemahasiswaan-addTimeline');
    Route::post('/kemahasiswaan/editTimeline','KemahasiswaanControllers\TimelineController@editTimeline')->name('kemahasiswaan-editTimeline');
    Route::post('/kemahasiswaan/deleteTimeline','KemahasiswaanControllers\TimelineController@deleteTimeline')->name('kemahasiswaan-deleteTimeline');
    
    Route::get('/kemahasiswaan/berkas','KemahasiswaanControllers\BerkasController@index')->name('kemahasiswaan-berkas');
    Route::post('/kemahasiswaan/berkas','KemahasiswaanControllers\BerkasController@uploadBerkas')->name('kemahasiswaan-uploadBerkas');
    Route::post('/kemahasiswaan/berkas/delete/{id_berkas?}','KemahasiswaanControllers\BerkasController@deleteBerkas')->name('kemahasiswaan-deleteBerkas');
    

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

