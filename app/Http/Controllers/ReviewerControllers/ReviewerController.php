<?php

namespace App\Http\Controllers\ReviewerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Mahasiswa;
use App\Models\DosenReviewer;
use App\Models\RiwayatCoaching;
use App\Models\FileRevisi;

class ReviewerController extends Controller
{
    //
    public function index(Request $request)
    {
        $reviewer = Auth::user()->reviewer;
        $daftarMahasiswa = Mahasiswa::where('nip_reviewer',$reviewer->nip_reviewer)->get();

        return view('dosen_reviewer.profile',['reviewer'=>$reviewer,'daftarMahasiswa'=>$daftarMahasiswa]);
    }

    public function keteranganPage(Request $request)
    {
        // Placeholder npm sementara
        $npmMahasiswa = $request->id;
        $mahasiswa = Mahasiswa::where('npm_mahasiswa',$npmMahasiswa)->get()->first();
        $daftarFileRevisi = FileRevisi::where('npm_mahasiswa',$npmMahasiswa)->get();
        $daftarRiwayatCoaching = RiwayatCoaching::where('npm_mahasiswa',$npmMahasiswa)->get();

        return view('dosen_reviewer.profile_keterangan',['mahasiswa'=>$mahasiswa,'daftarFileRevisi'=>$daftarFileRevisi,'daftarRiwayatCoaching'=>$daftarRiwayatCoaching]);
    }
}
