<?php

namespace App\Http\Controllers\KemahasiswaanControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Proposal;
use App\Models\Mahasiswa;
use App\Models\Anggota;
use App\Models\DosenReviewer;
use App\Models\DosenPendamping;
use App\Models\Kemahasiswaan;
use App\Models\AkunSimbelmawa;
use Illuminate\Support\Facades\Storage;
use Response;
use App\User;
use Illuminate\Support\Facades\Hash;



class ProposalKemahasiswaanController extends Controller
{
    //
    public function index()
    {
        $proposal_list = Proposal::all();
        return view('kemahasiswaan.proposal',['proposal_list'=>$proposal_list]);
    }
    public function detailProposal($id)
    {
        $proposal = Proposal::find($id);
        $mahasiswa = $proposal->mahasiswa;
        $anggotas = Anggota::where('npm_mahasiswa',$mahasiswa->npm_mahasiswa)->get();
        $reviewers = DosenReviewer::all();

        $reviewer = DosenReviewer::where('nip_reviewer',$mahasiswa->nip_reviewer)->get()->first();
        $pendamping = DosenPendamping::where('nip_pendamping',$mahasiswa->nip_pendamping)->get()->first();
        $akunSimbelmawa = AkunSimbelmawa::where('npm_mahasiswa',$mahasiswa->npm_mahasiswa)->get()->first();
        // dd($reviewer);

        return view('kemahasiswaan.proposal2',[
            'proposal'=>$proposal,
            'mahasiswa'=>$mahasiswa,
            'anggotas'=>$anggotas,
            'reviewers'=>$reviewers,
            'reviewer'=>$reviewer,
            'pendamping'=>$pendamping,
            'akunSimbelmawa'=>$akunSimbelmawa
            ]);
    }

    public function tugaskanReviewer(Request $request)
    {
         # code...
         $nipReviewer = $request->get('nipReviewer');
         $id_proposal = $request->get('id_proposal');
         $proposal = Proposal::find($id_proposal);
         $mahasiswa = $proposal->mahasiswa;

         $mahasiswa->nip_reviewer = $nipReviewer;

         $mahasiswa->save();
         return redirect()->back();
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

    public function akunSimbelmawa(Request $request, $npm_mahasiswa)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $mahasiswa = Mahasiswa::where('npm_mahasiswa',$npm_mahasiswa)->get()->first();
        $akunSimbelmawa = AkunSimbelmawa::where('npm_mahasiswa',$npm_mahasiswa)->get()->first();
        $validated = $request->validate([
            'username' => 'required|alpha_num|min:5',
            'password'=>'required|min:6',
        ]);
        // Kondisi jika username sama tapi npm berbeda blm ada.
        if ($akunSimbelmawa==null) {
            AkunSimbelmawa::create([
                'username'=>$username,
                'password' => $password,
                'npm_mahasiswa'=>$npm_mahasiswa,
            ]);
            return back()->with('success','Akun Simbelmawa sudah terbuat untuk mahasiswa: '.$mahasiswa->user->name);
        }else{
            return back()->with('error', 'Akun Simbelmawa Telah Ada');
        }
    }

}
