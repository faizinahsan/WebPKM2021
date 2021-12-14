<?php 
use App\Models\AkunSimbelmawa;
use App\Models\FileRevisiReviewer;
use App\Models\RequestDosbim;
use App\Models\Mahasiswa;
use App\Models\DosenPendamping;
use App\Models\DosenReviewer;
use App\Models\Proposal;
use App\Models\FileRevisi;
use App\Models\RiwayatCoaching;
use App\Models\RiwayatBimbingan;
use App\Models\Anggota;

use App\User;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

function set_active($uri, $output = "active")
{
 if( is_array($uri) ) {
   foreach ($uri as $u) {
     if (Route::is($u)) {
       return $output;
     }
   }
 } else {
   if (Route::is($uri)){
     return $output;
   }
 }
}
function set_fixed_top($uri, $output = "fixed-top")
{
  if (Route::is($uri)){
    return $output;
  }
}

function assignReviewerForTesting($idProposal)
{
    $nip_reviewer = 198009112020011001;
    $mahasiswa = Auth::user()->mahasiswa;
    $mahasiswa->nip_reviewer = $nip_reviewer;
    $mahasiswa->save();
    return FileRevisiReviewer::create([
        'file_revisi'=>'file_revisi_untuk_mahasiswa',
        'file_path'=>'file_revisi_reviewer',
        'nip_reviewer'=>$nip_reviewer,
        'npm_mahasiswa'=>$mahasiswa->npm_mahasiswa,
        'id_file_proposal'=>$idProposal
    ]);
}

function assignAkunForTesting($user)
{
    $username = "Simbelmawa_Testing_Mahasiswa_".$user->name;
    $password = "password_simbelmawa_testing";
    $npm_mahasiswa = $user->mahasiswa->npm_mahasiswa;
    return AkunSimbelmawa::create([
        'username'=>$username,
        'password'=>$password,
        'npm_mahasiswa'=>$npm_mahasiswa
    ]);
}

function assignPendampingForTesting($nip_pendamping)
{
  $requestPendamping = RequestDosbim::where('nip_pendamping',$nip_pendamping)->get()->first();
  // $requestPendamping->update(['status'=>1]);
  $requestPendamping->status = true;
  $requestPendamping->save();
  $mahasiswa = Auth::user()->mahasiswa;
  // $mahasiswa->update(['nip_pendamping'=>$nip_pendamping]);
  $mahasiswa->nip_pendamping = $nip_pendamping;
  $mahasiswa->save();
}

function reviewerRegisterTesting($nip_reviewer,$userName)
{
  // bentuk NPM for mahasiswa sama seperti NIP
  for ($i=0; $i < 2; $i++) {
    $namaMahasiswa = "Mahasiswa ".($i+1)." Testing For ".$userName;
    $npm_mahasiswa = (int)$nip_reviewer + $i;
    $password = Hash::make("test12345");
    $faker = Faker::create();
    $hasilDiskusi = 'Hasil Diskusi Testing Untuk '.$namaMahasiswa;
    $tglCoaching = Carbon::now();
    $user = User::create([
        'name' => $namaMahasiswa,
        'email' => $faker->email,
        'password' => $password,
        'role_id'=>4,
    ]);

    $mahasiswa = Mahasiswa::create([
        'npm_mahasiswa'=>$npm_mahasiswa,
        'nip_pendamping'=>null,
        'nip_reviewer'=>$nip_reviewer,
        'users_id'=>$user->id,
    ]);
    $proposal = Proposal::create([
      'judul_proposal'=>'File Proposal For Testing',
      'file_proposal'=>'file_proposal_test.docx',
      'file_path'=>'file_proposal',
      'kategori_id'=>4,
      'npm_mahasiswa'=>$npm_mahasiswa
    ]);

    $file_revisi = FileRevisi::create([
      'file_revisi'=>'file_revisi_test.docx',
      'file_path'=>'file_revisi',
      'npm_mahasiswa'=>$npm_mahasiswa
    ]);
    $kegiatanCoaching = RiwayatCoaching::create([
      'tanggal'=>$tglCoaching,
      'hasil_diskusi'=>$hasilDiskusi,
      'npm_mahasiswa'=>$npm_mahasiswa,
      'nip_reviewer'=>$nip_reviewer,
  ]);
  }   
}

function pendampingRegisterTesting($nip_pendamping,$userName)
{
  // bentuk NPM for mahasiswa sama seperti NIP
  for ($i=0; $i < 2; $i++) {
    $namaMahasiswa = "Mahasiswa ".($i+1)." Testing For ".$userName;
    $npm_mahasiswa = (int)$nip_pendamping + $i;
    $password = Hash::make("test12345");
    $faker = Faker::create();
    $hasilDiskusi = 'Hasil Diskusi Testing Untuk '.$namaMahasiswa;
    $tglBimbingan = Carbon::now();
    $user = User::create([
        'name' => $namaMahasiswa,
        'email' => $faker->email,
        'password' => $password,
        'role_id'=>4,
    ]);

    $mahasiswa = Mahasiswa::create([
        'npm_mahasiswa'=>$npm_mahasiswa,
        'nip_pendamping'=>$nip_pendamping,
        'nip_reviewer'=>null,
        'users_id'=>$user->id,
    ]);
    $proposal = Proposal::create([
      'judul_proposal'=>'File Proposal For Testing',
      'file_proposal'=>'file_proposal_test.docx',
      'file_path'=>'file_proposal',
      'kategori_id'=>4,
      'npm_mahasiswa'=>$npm_mahasiswa
    ]);
    $requestPendamping = RequestDosbim::create([
      'npm_mahasiswa'=>$npm_mahasiswa,
      'nip_pendamping'=>$nip_pendamping,
      'status'=>null
    ]);
    $kegiatanBimbingan = RiwayatBimbingan::create([
      'tanggal'=>$tglBimbingan,
      'hasil_diskusi'=>$hasilDiskusi,
      'npm_mahasiswa'=>$npm_mahasiswa,
      'nip_pendamping'=>$nip_pendamping,
  ]);
  }   
}

function kemahasiswaanRegisterTesting($nip_kemahasiswaan,$userName)
{
  // bentuk NPM for mahasiswa sama seperti NIP
  for ($i=0; $i < 2; $i++) {
    $namaMahasiswa = "Mahasiswa ".($i+1)." Testing For ".$userName;
    $npm_mahasiswa = (int)$nip_kemahasiswaan + $i;
    // nip pendamping test 3
    $nip_pendamping = 198009112019011001;
    $password = Hash::make("test12345");
    $faker = Faker::create();
    $namaAnggota= "Anggota 1 ".$namaMahasiswa;
    $npm_anggota = $npm_mahasiswa;
    $user = User::create([
        'name' => $namaMahasiswa,
        'email' => $faker->email,
        'password' => $password,
        'role_id'=>4,
    ]);
    $mahasiswa = Mahasiswa::create([
        'npm_mahasiswa'=>$npm_mahasiswa,
        'nip_pendamping'=>$nip_pendamping,
        'nip_reviewer'=>null,
        'users_id'=>$user->id,
    ]);
    $anggota = Anggota::create([
      'nama_anggota'=>$namaAnggota,
      'npm_anggota'=>$npm_anggota,
      'npm_mahasiswa'=>$npm_mahasiswa
    ]);
    $proposal = Proposal::create([
      'judul_proposal'=>'File Proposal For Testing',
      'file_proposal'=>'file_proposal_test.docx',
      'file_path'=>'file_proposal',
      'kategori_id'=>4,
      'npm_mahasiswa'=>$npm_mahasiswa
    ]);
  }   
}

function kemahasiswaanRiwayatCoachingTesting($namaMahasiswa,$npm_mahasiswa,$nip_reviewer)
{
  for ($i=0; $i < 2; $i++) { 
      $hasilDiskusi = 'Hasil Diskusi Testing Untuk '.$namaMahasiswa;
      $tglCoaching = Carbon::now();
      $kegiatanCoaching = RiwayatCoaching::create([
        'tanggal'=>$tglCoaching,
        'hasil_diskusi'=>$hasilDiskusi,
        'npm_mahasiswa'=>$npm_mahasiswa,
        'nip_reviewer'=>$nip_reviewer,
    ]);
  }
}