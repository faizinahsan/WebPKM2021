<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\DosenReviewer;
use App\Models\Fakultas;
use App\Models\Berkas;
use Carbon\Carbon;
use Response;


class BerandaController extends Controller
{
    //
    public function index()
    {
        $timelines = Timeline::all();
        // Algoritma nge convert date format ke nama bulan dan dimasukan ke list
        /**
         * memasukan list [] dengan key, value
         * key = hari
         * value = nama bulan
         * ambil daftar tanggal
         * konversi setiap instance menjadi hari dan nama bulan
         * masukan hari ke list sebagai key
         * masukan nama bulan ke list sebagai value
        */
        $dayAndMonth = [];
        foreach ($timelines as $timeline) {
            $dt = Carbon::parse($timeline->tanggal);
            $nama_timeline = $timeline->nama_timeline;
            $deskripsi = $timeline->deskripsi;
            $day = $dt->day;
            $month = $dt->shortEnglishMonth;
            array_push($dayAndMonth,[
                'day'=>$day,
                'month'=>$month,
                'nama_timeline'=>$nama_timeline,
                'deskripsi'=>$deskripsi
            ]);
        }
        return view('index',['timelines'=>$timelines,'dayAndMonth'=>$dayAndMonth]);
    }

    public function alur()
    {
        return view('alur');
    }
    public function berkas()
    {
        $daftarBerkas = Berkas::all();
        return view('berkas',['daftarBerkas'=>$daftarBerkas]);
    }

    public function downloadBerkas(Request $request,$filename)
    {
        $file = public_path(). '/file_berkas/' .$filename;
        $headers = ['Content-Type: file/pdf'];

        if (file_exists($file)) {
            return Response::download($file, $filename,$headers);
        }else{
            return back()
            ->with('error','Cannot Download Because File Not Found');
            // echo('File Not Found');
        }
    }

    public function reviewer_info()
    {
        $daftarReviewer = DosenReviewer::all();
        $daftarFakultas = Fakultas::all();
        return view('table',['daftarReviewer'=>$daftarReviewer,'daftarFakultas'=>$daftarFakultas]);
    }
}
