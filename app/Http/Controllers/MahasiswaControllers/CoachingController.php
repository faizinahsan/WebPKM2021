<?php

namespace App\Http\Controllers\MahasiswaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Mahasiswa;
use App\Models\DosenReviewer;
use App\Models\RiwayatCoaching;
use App\Models\FileRevisi;
use App\Models\FileRevisiReviewer;
use Carbon\Carbon;
use Response;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatCoachingExport;

class CoachingController extends Controller
{
    //
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $reviewer = DosenReviewer::find($mahasiswa->nip_reviewer);
        $riwayatCoaching = RiwayatCoaching::where('npm_mahasiswa',$mahasiswa->npm_mahasiswa)->get();
        $daftarFileRevisiReviewer = FileRevisiReviewer::where('npm_mahasiswa',$mahasiswa->npm_mahasiswa)->get();
        return view('mahasiswa.coaching',['mahasiswa'=>$mahasiswa,'reviewer'=>$reviewer,'riwayatCoaching'=>$riwayatCoaching,'daftarFileRevisiReviewer'=>$daftarFileRevisiReviewer]);
    }

    public function kegiatanCoaching(Request $request)
    {
        $date = $request->get('date');
        $hasilDiskusi = $request->get('inputHasilDiskusi');
        $tglCoaching = Carbon::parse($date)->format('Y-m-d H:i:s');
        $mahasiswa = Auth::user()->mahasiswa;

        $kegiatanCoaching = new RiwayatCoaching([
            'tanggal'=>$tglCoaching,
            'hasil_diskusi'=>$hasilDiskusi,
            'npm_mahasiswa'=>$mahasiswa->npm_mahasiswa,
            'nip_reviewer'=>$mahasiswa->nip_reviewer,
        ]);

        $kegiatanCoaching->save();

        return redirect('/mahasiswa/coaching')->with('status', 'Permintaan telah dikirim');        
    }

    public function uploadFileRevisi(Request $request)
    {
        $this->validate($request,[
            'fileUpload' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file_revisi = $request->file('fileUpload');
        
        $nama_file = time()."_".$file_revisi->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_revisi';
 
                // upload file
        $file_revisi->move($tujuan_upload,$file_revisi->getClientOriginalName());
        // $path = $file_revisi->storeAs($tujuan_upload,$nama_file);
        
        $user = Auth::user();
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;

        // dd($file_revisi);

        if ($user->mahasiswa->file_revisi !=null) {
            $file_revisi = FileRevisi::where('npm_mahasiswa',$npm_mahasiswa)->get();
        }else{
            FileRevisi::create([
            'file_revisi'=>$nama_file,
            'file_path'=>$tujuan_upload,
            'npm_mahasiswa'=>$npm_mahasiswa
            ]);
        }

        return redirect('/mahasiswa/coaching')->with('success','File Revisi telah disimpan');
    }

    public function downloadFileRevisiReviewer(Request $request, $filename)
    {
        $file = public_path(). '/file_revisi_test/' .$filename;
        $headers = ['Content-Type: file/pdf'];
        if (file_exists($file)) {
            return Response::download($file, $filename,$headers);
        }else{
            return back()
            ->with('error','Cannot Download Because File Not Found');
            // echo('File Not Found');
        }
    }

    public function exportRiwayatCoaching()
    {
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;
        return Excel::download(new RiwayatCoachingExport($npm_mahasiswa), 'RiwayatCoaching.xlsx');
    }
}
