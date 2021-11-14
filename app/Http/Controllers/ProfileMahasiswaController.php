<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Anggota;
use App\User;

class ProfileMahasiswaController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $anggotas = Anggota::all();
  
        return view('mahasiswa.profile',['user'=>$user,'anggotas'=>$anggotas]);
    }
    public function tambahAnggota(Request $request)
    {
        $inputNpm = $request->get('inputNpmAnggota');
        $inputNamaLengkap = $request->get('inputNamaLengkapAnggota');
        $npmKetua = Auth::user()->mahasiswa->npm_mahasiswa;
         $anggota = new Anggota([
            'npm_anggota'=>$inputNpm,
            'nama_anggota'=>$inputNamaLengkap,
            'npm_mahasiswa'=>$npmKetua
        ]);
        $anggota->save();
        return redirect('/mahasiswa/profile')->with('success', 'anggota saved!');
    }
}
