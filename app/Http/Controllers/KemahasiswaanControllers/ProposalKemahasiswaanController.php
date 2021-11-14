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
use App\User;


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
        // dd($reviewer);
        return view('kemahasiswaan.proposal2',[
            'proposal'=>$proposal,
            'mahasiswa'=>$mahasiswa,
            'anggotas'=>$anggotas,
            'reviewers'=>$reviewers,
            'reviewer'=>$reviewer,
            'pendamping'=>$pendamping
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

}
