<?php

namespace App\Http\Controllers\MahasiswaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadProposalController extends Controller
{
    //
    public function index()
    {
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;
        $proposal = Proposal::where('npm_mahasiswa',$npm_mahasiswa)->latest('created_at')->first();
        return view('mahasiswa.upload_proposal',['proposal'=>$proposal]);
    }
    public function proses_upload(Request $request)
    {
        $this->validate($request,[
            'fileUpload' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file_proposal = $request->file('fileUpload');
        
        $nama_file = time()."_".$file_proposal->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_proposal';
 
                // upload file
        $file_proposal->move($tujuan_upload,$file_proposal->getClientOriginalName());
        // $path = $file_proposal->storeAs($tujuan_upload,$nama_file);
        
        $user = Auth::user();
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;

        if ($user->mahasiswa->proposal !=null) {
            $proposal = Proposal::where('npm_mahasiswa',$npm_mahasiswa)->get();
        }else{
            Proposal::create([
            'file_proposal'=>$nama_file,
            'file_path'=>$tujuan_upload,
            'npm_mahasiswa'=>$npm_mahasiswa
        ]);

        }

        // $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;



        // Proposal::create([
        //     'file_proposal'=>$nama_file,
        //     'file_path'=>$tujuan_upload,
        //     'npm_mahasiswa'=>$npm_mahasiswa
        // ]);
        return redirect('/mahasiswa/upload_proposal')->with('success','Data telah disimpan');
    }

    public function uploadProposalFinal(Request $request)
    {
        $this->validate($request,[
            'fileUpload' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file_proposal = $request->file('fileUpload');
        
        $nama_file = time()."_".$file_proposal->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_proposal';
 
                // upload file
        $file_proposal->move($tujuan_upload,$file_proposal->getClientOriginalName());
        // $path = $file_proposal->storeAs($tujuan_upload,$nama_file);
        
        $user = Auth::user();
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;

        if ($user->mahasiswa->proposal !=null) {
            $proposal = Proposal::where('npm_mahasiswa',$npm_mahasiswa)->get();
        }else{
        //     Proposal::create([
        //     'file_proposal'=>$nama_file,
        //     'file_path'=>$tujuan_upload,
        //     'npm_mahasiswa'=>$npm_mahasiswa
        // ]);

        }

        // $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;



        // Proposal::create([
        //     'file_proposal'=>$nama_file,
        //     'file_path'=>$tujuan_upload,
        //     'npm_mahasiswa'=>$npm_mahasiswa
        // ]);
        return redirect('/mahasiswa/upload_proposal')->with('success','Data telah disimpan');
    }
}
