<?php

namespace App\Http\Controllers\MahasiswaControllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\AkunSimbelmawa;
use Illuminate\Http\Request;

class AkunSimbelmawaController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Auth::user();
        $npmMahasiswa = $user->mahasiswa->npm_mahasiswa;
        $akunSimbelmawa = AkunSimbelmawa::where('npm_mahasiswa',$npmMahasiswa)->get()->first();
        return view('mahasiswa.akun_simbelmawa',['akunSimbelmawa'=>$akunSimbelmawa]);
    }
}
