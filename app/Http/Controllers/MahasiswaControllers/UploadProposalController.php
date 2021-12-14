<?php

namespace App\Http\Controllers\MahasiswaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\AkunSimbelmawa;
use App\Models\FileRevisiReviewer;
use App\Models\KategoriPKM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

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
        
        $nama_file = $file_proposal->getClientOriginalName();
 
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
           $proposal= Proposal::create([
            'judul_proposal'=>$judulProposal,
            'file_proposal'=>$nama_file,
            'file_path'=>$tujuan_upload,
            'kategori_id'=>$kategoriPKM,
            'npm_mahasiswa'=>$npm_mahasiswa
            ]);
            assignReviewerForTesting($proposal->id_file_proposal);
        }
        

        return redirect('/mahasiswa/upload_proposal')->with('success','Data telah disimpan');
    }


    public function uploadProposalFinalView(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $npm_mahasiswa = $mahasiswa->npm_mahasiswa;
        $proposal = Proposal::where('npm_mahasiswa',$npm_mahasiswa)->latest('created_at')->get()->first();
        $kategoriPKM= KategoriPKM::all();
        return view('mahasiswa.upload_final',['mahasiswa'=>$mahasiswa,'proposal'=>$proposal,'kategoriPKM'=>$kategoriPKM]);
    }

    public function uploadProposalFinal(Request $request)
    {
        $this->validate($request,[
            'judulProposalFinal'=>'required',
            'kategoriPKMFinal'=>'required',
            'fileUpload' => 'required',
        ]);
        $id_file_proposal = $request->input('idProposal');
        $proposal = Proposal::where('id_file_proposal',$id_file_proposal)->get()->first();

        // Judul proposal
        $judulProposal = $request->input('judulProposalFinal');
        // Kategori proposal PKM
        $kategoriPKM = $request->input('kategoriPKMFinal');

        // menyimpan data file yang diupload ke variabel $file
        $file_proposal = $request->file('fileUpload');
        
        $nama_file = "Final_".$file_proposal->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_proposal';
        $user = Auth::user();
        $npm_mahasiswa = Auth::user()->mahasiswa->npm_mahasiswa;

        // hapus file proposal awal
        File::delete($tujuan_upload.'/'.$proposal->file_proposal);
        // upload file
        $file_proposal->move($tujuan_upload,$nama_file,$file_proposal->getClientOriginalName());
        $STATUS_FINAL = "STATUS_FINAL";
        // dd($proposal,$STATUS_FINAL);
        // Update database
        $proposal->update([
            'judul_proposal'=>$judulProposal,
            'file_proposal'=>$nama_file,
            'kategori_id'=>$kategoriPKM,
            'status_proposal'=>$STATUS_FINAL,
        ]);
        if ($user->mahasiswa->akun_simbelmawa == null) {
            assignAkunForTesting($user);
        }
        return redirect('/mahasiswa/upload_final')->with('success','Data telah disimpan');
    }
}
