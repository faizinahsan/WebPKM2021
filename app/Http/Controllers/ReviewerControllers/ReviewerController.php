<?php

namespace App\Http\Controllers\ReviewerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Mahasiswa;
use App\Models\DosenReviewer;
use App\Models\RiwayatCoaching;
use App\Models\Proposal;
use App\Models\FileRevisi;
use App\Models\FileRevisiReviewer;

use Illuminate\Support\Facades\Storage;
use Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatCoachingExport;

class ReviewerController extends Controller
{
    //
    public function index(Request $request)
    {
        $reviewer = Auth::user()->reviewer;
        $daftarMahasiswa = Mahasiswa::where('nip_reviewer',$reviewer->nip_reviewer)->get();

        return view('dosen_reviewer.profile',['reviewer'=>$reviewer,'daftarMahasiswa'=>$daftarMahasiswa]);
    }

    public function keteranganPage(Request $request)
    {
        $npmMahasiswa = $request->id;
        $mahasiswa = Mahasiswa::where('npm_mahasiswa',$npmMahasiswa)->get()->first();
        $daftarFileRevisi = FileRevisi::where('npm_mahasiswa',$npmMahasiswa)->get();
        $countDaftarFileRevisi = $daftarFileRevisi->count();
        $proposalMahasiswa = Proposal::where('npm_mahasiswa',$npmMahasiswa)->get()->first();
        $daftarRiwayatCoaching = RiwayatCoaching::where('npm_mahasiswa',$npmMahasiswa)->get();
        $countRiwayatCoaching = $daftarRiwayatCoaching->count();
        $daftarRevisiReviewer = FileRevisiReviewer::where('id_file_proposal',$proposalMahasiswa->id_file_proposal)->get()->first();
        $daftarRevisiReviewerCollection = FileRevisiReviewer::where('id_file_proposal',$proposalMahasiswa->id_file_proposal)->get();
        $layakDiberiAkun = $proposalMahasiswa->layakDiberiAkun;
        // dd($layakDiberiAkun);
        return view('dosen_reviewer.profile_keterangan',[
            'mahasiswa'=>$mahasiswa,
            'daftarFileRevisi'=>$daftarFileRevisi,
            'daftarRiwayatCoaching'=>$daftarRiwayatCoaching,
            'proposal'=>$proposalMahasiswa,
            'daftarRevisiReviewer'=>$daftarRevisiReviewer,
            'daftarRevisiReviewerCollection'=>$daftarRevisiReviewerCollection,
            'countDaftarFileRevisi'=>$countDaftarFileRevisi,
            'countRiwayatCoaching'=>$countRiwayatCoaching
        ]);
    }
    public function uploadRevisiReviewer(Request $request)
    {
        $this->validate($request,[
            'fileUploadRevisi' => 'required',
            'npm_mahasiswa_hidden_input'=>'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file_revisi_reviewer = $request->file('fileUploadRevisi');
        
        $nama_file = time()."_".$file_revisi_reviewer->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_revisi_reviewer';
 
                // upload file
        $file_revisi_reviewer->move($tujuan_upload,$nama_file);
        // $path = $file_proposal->storeAs($tujuan_upload,$nama_file);
        
        $user = Auth::user();
        $nip_reviewer = Auth::user()->reviewer->nip_reviewer;
        // npm mahasiswa
        $npm_mahasiswa = $request->input('npm_mahasiswa_hidden_input');
        // id_proposal
        $id_proposal = $request->input('id_proposal_hidden_input');
        // id_file_revisi
        $id_file_revisi = $request->input('id_file_revisi_hidden_input');

        // Kalo bisa bikin kondisi dimana file revisi yang bisa di upload dibatasi
        $fileRevisReviewer = FileRevisiReviewer::create([
            'file_revisi' => $nama_file,
            'file_path'=>$tujuan_upload,
            'nip_reviewer'=>$nip_reviewer,
            'npm_mahasiswa'=>$npm_mahasiswa,
            'id_file_proposal'=>$id_proposal,
            'id_file_revisi'=>$id_file_revisi,
        ]);

        $proposal = Proposal::where('id_file_proposal',$id_proposal)->get()->first();
        $proposal->id_file_revisi_reviewer = $fileRevisReviewer->id;
        $proposal->save();

        if ($id_file_revisi !=null) {
            $fileRevisi = FileRevisi::where('id_file',$id_file_revisi)->get()->first();
            $fileRevisi->id_file_revisi_reviewer = $fileRevisReviewer->id;
            $fileRevisi->save();
        }

        return redirect('/dosen_reviewer/profile_keterangan/'.$npm_mahasiswa)->with('success','Revisi Berhasil dikirim');
    }

    public function downloadProposal(Request $request, $filename)
    {
        $file = public_path(). '/file_proposal/' .$filename;
        $headers = ['Content-Type: file/*'];

        if (file_exists($file)) {
            return Response::download($file, $filename,$headers);
        }else{
            return back()
            ->with('error','Cannot Download Because File Not Found');
            // echo('File Not Found');
        }
    }

    public function downloadRevisi(Request $request, $filename)
    {
        $file = public_path(). '/file_revisi/' .$filename;
        $headers = ['Content-Type: file/*'];

        if (file_exists($file)) {
            return Response::download($file, $filename,$headers);
        }else{
            return back()
            ->with('error','Cannot Download Because File Not Found');
            // echo('File Not Found');
        }
    }
    public function verifikasiRiwayatCoaching(Request $request)
    {
        $sesuai = false;
        if ($request->input('sesuaiInput')=='Sesuai') {
            $sesuai = true;
        }
        $id_riwayat_coaching = $request->input('idRiwayatCoaching');
        $riwayatCoaching = RiwayatCoaching::where('id_riwayat_coaching',$id_riwayat_coaching)->get()->first();
        $riwayatCoaching->verifikasi = $sesuai;
        $riwayatCoaching->save();
        return back()->with('Success','Riwayat Coaching Sesuai');
    }
    public function exportRiwayatCoaching($npm_mahasiswa)
    {
        return Excel::download(new RiwayatCoachingExport($npm_mahasiswa), 'RiwayatCoaching.xlsx');
    }

    public function layak_diberi_akun(Request $request, $idProposal)
    {
        $proposal = Proposal::where('id_file_proposal',$idProposal)->get()->first();
        $proposal->update(['layakDiberiAkun'=>true]);
        return back()->with('Success','Proposal layak diberi akun');

    }
    public function tolak_diberi_akun(Request $request, $idProposal)
    {
        $proposal = Proposal::where('id_file_proposal',$idProposal)->get()->first();
        $proposal->update(['layakDiberiAkun'=>false]);
        return back()->with('Success','Proposal tidak layak diberi akun');
    }
}
