<?php

namespace App\Http\Controllers\MahasiswaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RequestDosbim;
use App\Models\Mahasiswa;
use App\Models\RiwayatBimbingan;
use App\Models\DosenPendamping;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatBimbinganExport;

class KonsultasiPendamping extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $npmMahasiswa = $user->mahasiswa->npm_mahasiswa;
        $listDosenPendamping = DosenPendamping::all();
        $requestDosbim = RequestDosbim::where('npm_mahasiswa',$npmMahasiswa)->get()->first();
        // dd($requestDosbim);

        $riwayatBimbingan = RiwayatBimbingan::where('npm_mahasiswa',$npmMahasiswa)->get();
        // dd($riwayatBimbingan);
        return view('mahasiswa.konsultasi_dosbim',['mahasiswa'=>$mahasiswa,'requestDosbim'=>$requestDosbim,'riwayatBimbingan'=>$riwayatBimbingan,'listDosenPendamping'=>$listDosenPendamping]);
    }

    //
    public function requestPendamping(Request $request)
    {
        # code...
        $nipPendamping = $request->get('nipPendamping');
        $npmMahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;

        $requestDosbim = new RequestDosbim([
            'npm_mahasiswa'=>$npmMahasiswa,
            'nip_pendamping'=>$nipPendamping,
            'status'=>null
        ]);
        $requestDosbim->save();
        assignPendampingForTesting($nipPendamping);
        return redirect('/mahasiswa/konsultasi_dosbim')->with('status', 'Permintaan telah dikirim');
        // dd([$nipPendamping,$npmMahasiswa]);

    }

    public function kegiatanBimbingan(Request $request)
    {
        $date = $request->get('date');
        $hasilDiskusi = $request->get('inputHasilDiskusi');
        $tglBimbingan = Carbon::parse($date)->format('Y-m-d H:i:s');
        $mahasiswa = Auth::user()->mahasiswa;

        $kegiatanBimbingan = new RiwayatBimbingan([
            'tanggal'=>$tglBimbingan,
            'hasil_diskusi'=>$hasilDiskusi,
            'npm_mahasiswa'=>$mahasiswa->npm_mahasiswa,
            'nip_pendamping'=>$mahasiswa->nip_pendamping,
        ]);

        $kegiatanBimbingan->save();

        return redirect('/mahasiswa/konsultasi_dosbim')->with('success', 'Hasil Diskusi Telah disimpan');

    }

    public function exportRiwayatBimbingan()
    {
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;
        return Excel::download(new RiwayatBimbinganExport($npm_mahasiswa), 'RiwayatBimbingan.xlsx');
    }
}
