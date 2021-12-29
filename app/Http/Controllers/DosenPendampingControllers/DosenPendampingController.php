<?php

namespace App\Http\Controllers\DosenPendampingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RequestDosbim;
use App\Models\Mahasiswa;
use App\Models\RiwayatBimbingan;
use App\Models\Proposal;
use Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatBimbinganExport;



class DosenPendampingController extends Controller
{
    private $TERIMA_MAHASISWA = true; 
    private $TOLAK_MAHASISWA = false; 
    //
    public function index()
    {
        $pendamping = Auth::user()->pendamping;
        $requestMahasiswa = RequestDosbim::where('status',null)->where('nip_pendamping',$pendamping->nip_pendamping)->get();
        return view('dosen_pendamping.profile',['requestMahasiswa'=>$requestMahasiswa]);
    }

    public function showDaftarDisejutui()
    {
        $pendamping = Auth::user()->pendamping;
        $daftarMahasiswa = RequestDosbim::where('status',$this->TERIMA_MAHASISWA)->where('nip_pendamping',$pendamping->nip_pendamping)->get();
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
        $daftarRiwayatBimbingan = RiwayatBimbingan::where('npm_mahasiswa',$dataMahasiswa->npm_mahasiswa)->get();
        $proposal = Proposal::where('npm_mahasiswa',$dataMahasiswa->npm_mahasiswa)->get()->first();
        return view('dosen_pendamping.profile_keterangan',['mahasiswa'=>$dataMahasiswa,'daftarRiwayatBimbingan'=>$daftarRiwayatBimbingan,'proposal'=>$proposal]);
    }
    public function verifikasiRiwayatBimbingan(Request $request)
    {
        $sesuai = false;
        if ($request->input('sesuaiInput')=='Sesuai') {
            $sesuai = true;
        }
        $id_riwayat_bimbingan = $request->input('idRiwayatBimbingan');
        $riwayatBimbingan = RiwayatBimbingan::where('id_riwayat_bimbingan',$id_riwayat_bimbingan)->get()->first();
        $riwayatBimbingan->verifikasi = $sesuai;
        $riwayatBimbingan->save();
        return back()->with('Success','Riwayat Coaching Sesuai');
    }
    public function downloadProposal(Request $request, $filename)
    {
        $file = public_path(). '/file_proposal/' .$filename;
        $headers = ['Content-Type: file/pdf'];

        if (file_exists($file)) {
            return Response::download($file, $filename,$headers);
        }else{
            return back()
            ->with('error','Cannot Download Because File Not Found');
            // echo('File Not Found');
        }
    }

    public function exportRiwayatBimbingan($npm_mahasiswa)
    {
        return Excel::download(new RiwayatBimbinganExport($npm_mahasiswa), 'RiwayatBimbingan.xlsx');
    }
    
}
