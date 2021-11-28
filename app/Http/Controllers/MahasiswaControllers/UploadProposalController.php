<?php

namespace App\Http\Controllers\MahasiswaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\KategoriPKM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadProposalController extends Controller
{
    //
    public function index()
    {
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;
        $proposal = Proposal::where('npm_mahasiswa',$npm_mahasiswa)->latest('created_at')->first();
        $kategoriPKM= KategoriPKM::all();
        return view('mahasiswa.upload_proposal',['proposal'=>$proposal,'kategoriPKM'=>$kategoriPKM]);
    }
    public function proses_upload(Request $request)
    {
        $this->validate($request,[
            'fileUpload' => 'required',
        ]);
        // Judul proposal
        $judulProposal = $request->input('judulProposal');
        // Kategori proposal PKM
        $kategoriPKM = $request->input('kategoriPKM');

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
            'judul_proposal'=>$judulProposal,
            'file_proposal'=>$nama_file,
            'file_path'=>$tujuan_upload,
            'kategori_id'=>$kategoriPKM,
            'npm_mahasiswa'=>$npm_mahasiswa
        ]);


        }

        return redirect('/mahasiswa/upload_proposal')->with('success','Data telah disimpan');
    }

    public function uploadProposalFinalView(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $npm_mahasiswa = $mahasiswa->npm_mahasiswa;
        $proposal = Proposal::where('npm_mahasiswa',$npm_mahasiswa)->latest('created_at')->first();
        $kategoriPKM= KategoriPKM::all();
        return view('mahasiswa.upload_final',['mahasiswa'=>$mahasiswa,'proposal'=>$proposal,'kategoriPKM'=>$kategoriPKM]);
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
