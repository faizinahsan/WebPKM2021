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
        $mahasiswa = $user->mahasiswa;
        $npmMahasiswa = $user->mahasiswa->npm_mahasiswa;
        $porposal= $mahasiswa->proposal;
        $akunSimbelmawa = AkunSimbelmawa::where('npm_mahasiswa',$npmMahasiswa)->get()->first();
        return view('mahasiswa.akun_simbelmawa',['akunSimbelmawa'=>$akunSimbelmawa,'mahasiswa'=>$mahasiswa,'proposal'=>$porposal]);
    }
    public function upload_bukti_pendanaan(Request $request)
    {
        $this->validate($request,[
            'fileBuktiPendanaan' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file_bukti = $request->file('fileBuktiPendanaan');
        
        $nama_file = $file_bukti->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_bukti_pendanaan';
 
                // upload file
        $file_bukti->move($tujuan_upload,$nama_file,$file_bukti->getClientOriginalName());
        // $path = $file_bukti->storeAs($tujuan_upload,$nama_file);
        
        $user = Auth::user();
        $mahasiswa = Auth::user()->mahasiswa;
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;
        $proposal = $mahasiswa->proposal;

        $STATUS_FINAL = "STATUS_DIDANAI";
        // Update database
        $proposal->update([
            'status_proposal'=>$STATUS_FINAL,
            'file_bukti_pendanaan'=>$nama_file,
            'file_bukti_path'=>$tujuan_upload
        ]);
        

        return redirect('/mahasiswa/akun_simbelmawa')->with('success','Data telah disimpan');
    }
}
