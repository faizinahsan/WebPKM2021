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
        $mahasiswa = $user->mahasiswa;
        $anggotas = Anggota::where('npm_mahasiswa',$mahasiswa->npm_mahasiswa)->get();
  
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
    public function editAnggota(Request $request,$npm_anggota)
    {
        // $npm_anggota = $request->input('npm_anggota_old');
        $npm_anggota_new = $request->input('inputNpmAnggota');
        $nama_anggota= $request->input('inputNamaLengkapAnggota');
        $anggota = Anggota::where('npm_anggota',$npm_anggota);
        // $anggota->npm_anggota = $npm_anggota_new;
        // $anggota->nama_anggota = $nama_anggota;
        // $anggota->save();
        $anggota->update([
            'nama_anggota'=>$nama_anggota,
            'npm_anggota'=>$npm_anggota_new
        ]);
        return back()->with('success','Anggota telah diubah');
    }

    public function deleteAnggota(Request $request,$npm_anggota)
    {
        $deleteAnggota = Anggota::where('npm_anggota',$npm_anggota)->get()->first();
        $deleteAnggota->delete();
        return back()->with('success','Anggota telah dihapus');
    }
}
