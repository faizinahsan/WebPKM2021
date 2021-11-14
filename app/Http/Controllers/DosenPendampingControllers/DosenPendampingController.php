<?php

namespace App\Http\Controllers\DosenPendampingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RequestDosbim;
use App\Models\Mahasiswa;


class DosenPendampingController extends Controller
{
    private $TERIMA_MAHASISWA = true; 
    private $TOLAK_MAHASISWA = false; 
    //
    public function index()
    {
        // $requestMahasiswa = RequestDosbim::all();
        $requestMahasiswa = RequestDosbim::where('status',null)->get();
        return view('dosen_pendamping.profile',['requestMahasiswa'=>$requestMahasiswa]);
    }

    public function showDaftarDisejutui()
    {
        $daftarMahasiswa = RequestDosbim::where('status',$this->TERIMA_MAHASISWA)->get();
        return view('dosen_pendamping.profile1',['daftarMahasiswa'=>$daftarMahasiswa]);
    }

    public function terimaMahasiswa(Request $request)
    {
        $npm_mahasiswa = $request->get('npm_mahasiswa');
        $requestMahasiswa = RequestDosbim::where('npm_mahasiswa',$npm_mahasiswa)->get()->first();
        $requestMahasiswa->status = $this->TERIMA_MAHASISWA;
        $requestMahasiswa->save();
        
        $mahasiswa = Mahasiswa::where('npm_mahasiswa',$npm_mahasiswa)->get()->first();
        $mahasiswa->nip_pendamping = $requestMahasiswa->nip_pendamping;
        $mahasiswa->save();
        // dd($requestMahasiswa);
        return redirect(route('dosen_pendamping-profile_keterangan',['id'=>$requestMahasiswa->id]))->with('status', 'Permintaan telah dikirim');
        
    }
    public function tolakMahasiswa(Request $request)
    {
        $npm_mahasiswa = $request->get('npm_mahasiswa');
        $requestMahasiswa = RequestDosbim::where('npm_mahasiswa',$npm_mahasiswa)->get()->first();
        $requestMahasiswa->status = $this->TOLAK_MAHASISWA;
        $requestMahasiswa->save(); 
        // dd($requestMahasiswa);
        return redirect(route('dosen_pendamping-profile'))->with('status', 'Permintaan telah dikirim');
    }

    public function showKeteranganMahasiswa($id)
    {
        $requestDosbim = RequestDosbim::where('id',$id)->get()->first();
        $dataMahasiswa = $requestDosbim->mahasiswa;
        // dd($dataMahasiswa->riwayatBimbingan);
        return view('dosen_pendamping.profile_keterangan',['mahasiswa'=>$dataMahasiswa]);
    }
    
}
