<?php

namespace App\Http\Controllers\KemahasiswaanControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\DosenReviewer;
use App\Models\Fakultas;

class ReviewerKemahasiswaanController extends Controller
{
    //
    public function index(Request $request)
    {
        $daftarDosenReviewerFakultas = DosenReviewer::where('fakultas_id',null)->get();
        $daftarDosenReviewer = DosenReviewer::all();
        $daftarFakultas = Fakultas::all();
        return view('kemahasiswaan.reviewer',['daftarDosenReviewer'=>$daftarDosenReviewer,'daftarDosenReviewerFakultas'=>$daftarDosenReviewerFakultas,'daftarFakultas'=>$daftarFakultas]);
    }
    public function addReviewerInfo(Request $request)
    {
        $this->validate($request,[
            'reviewer_picture' => 'required',
            'fakultas'=>'required',
        ]);
        $nip_reviewer = $request->input('dosenReviewer');
        $reviewer_picture = $request->file('reviewer_picture');
        $fakultas = $request->input('fakultas');

        // dd($reviewer_picture,$fakultas);
        if($request->hasFile('reviewer_picture')){
            $filename = $reviewer_picture->getClientOriginalName();
            $reviewer_picture->storeAs('images',$filename,'public');
            // Auth()->user()->update(['image'=>$filename]);
            DosenReviewer::where('nip_reviewer',$nip_reviewer)->update(['fakultas_id'=>$fakultas,'reviewer_picture'=>$filename]);
        }
        return back()->with('success','Berhasil Upload Reviewer Info');
    }
    public function deleteReviewerInfo(Request $request,$nip_reviewer)
    {
        $reviewer = DosenReviewer::where('nip_reviewer',$nip_reviewer)->get()->first();
        $reviewer_picture = $reviewer->reviewer_picture;
        // dd($reviewer_picture);
        Storage::delete('/public/images/'.$reviewer_picture);
        DosenReviewer::where('nip_reviewer',$nip_reviewer)->update(['fakultas_id'=>null,'reviewer_picture'=>null]);
        return back()->with('success','Berhasil Menghapus Informasi Reviewer');
    }
}
