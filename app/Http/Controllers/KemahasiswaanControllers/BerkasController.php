<?php

namespace App\Http\Controllers\KemahasiswaanControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Berkas;
class BerkasController extends Controller
{
    //
    public function index(Request $request)
    {
        $daftarBerkas = Berkas::all();
        return view('kemahasiswaan.berkas',['daftarBerkas'=>$daftarBerkas]);
    }

    public function uploadBerkas(Request $request)
    {
        $this->validate($request,[
            'fileUpload' => 'required',
        ]);
        // Judul proposal
        $judulBerkas = $request->input('judulBerkas');
        // menyimpan data file yang diupload ke variabel $file
        $file_berkas = $request->file('fileUpload');
        
        $nama_file = $file_berkas->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_berkas';
 
                // upload file
        $file_berkas->move($tujuan_upload,$file_berkas->getClientOriginalName());

        $nip_kemahasiswaan = Auth::user()->kemahasiswaan->nip_kemahasiswaan;

        Berkas::create([
            'judul_berkas'=>$judulBerkas,
            'file_berkas'=>$nama_file,
            'file_path'=>$tujuan_upload,
            'nip_kemahasiswaan'=>$nip_kemahasiswaan,
        ]);
        return back()->with('success','Berhasil Upload Berkas');
    }
    public function deleteBerkas(Request $request, $id_berkas)
    {
        $deleteBerkas = Berkas::where('id_berkas',$id_berkas)->get()->first();
        $deleteBerkas->delete();
        return back()->with('success','Berkas telah dihapus');
    }
}
