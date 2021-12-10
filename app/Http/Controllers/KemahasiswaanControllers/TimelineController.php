<?php

namespace App\Http\Controllers\KemahasiswaanControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timeline;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TimelineController extends Controller
{
    //
    public function index(Request $request)
    {
        $timelines = Timeline::all();
        $dayAndMonth = [];
        foreach ($timelines as $timeline) {
            $dt = Carbon::parse($timeline->tanggal);
            $id_timeline = $timeline->id_timeline;
            $nama_timeline = $timeline->nama_timeline;
            $deskripsi = $timeline->deskripsi;
            $day = $dt->day;
            $month = $dt->shortEnglishMonth;
            $year = $dt->year;
            array_push($dayAndMonth,[
                'day'=>$day,
                'month'=>$month,
                'year'=>$year,
                'tanggal'=>$timeline->tanggal,
                'id_timeline'=>$id_timeline,
                'nama_timeline'=>$nama_timeline,
                'deskripsi'=>$deskripsi
            ]);
        }
        return view('kemahasiswaan.timeline',['timelines'=>$timelines,'dayAndMonth'=>$dayAndMonth]);
    }
    public function addTimeline(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'nama_timeline'=>'required',
            'deskripsi'=>'required'
        ]);
        $nip_kemahasiswaan = Auth::user()->kemahasiswaan->nip_kemahasiswaan;
        $date = $request->input('date');
        $tanggal = Carbon::parse($date)->format('Y-m-d');
        $nama_timeline = $request->input('nama_timeline');
        $deskripsi = $request->input('deskripsi');
        // dd($date,$nama_timeline,$deskripsi,$nip_kemahasiswaan);
        $timeline = new Timeline([
            'tanggal'=>$tanggal,
            'nama_timeline'=>$nama_timeline,
            'deskripsi'=>$deskripsi,
            'nip_kemahasiswaan'=>$nip_kemahasiswaan,
        ]);
        $timeline->save();
        return back()->with('success','Timeline telah disimpan');
    }
    public function editTimeline(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'nama_timeline'=>'required',
            'deskripsi'=>'required',
        ]);   $id_timeline = $request->input('id_timeline');
        $date = $request->input('date');
        $tanggal = Carbon::parse($date)->format('Y-m-d');
        $nama_timeline = $request->input('nama_timeline');
        $deskripsi = $request->input('deskripsi');
        Timeline::where('id_timeline',$id_timeline)->update(['tanggal'=>$tanggal,'nama_timeline'=>$nama_timeline,'deskripsi'=>$deskripsi]);
        return back()->with('success','Timeline telah disimpan');
    }
    public function deleteTimeline(Request $request)
    {
        $this->validate($request,[
            'id_timeline'=>'required'
        ]);
        $id_timeline = $request->input('id_timeline');
        $deleteTimeline = Timeline::where('id_timeline',$id_timeline)->get()->first();
        $deleteTimeline->delete();
        return back()->with('success','Timeline telah dihapus');
    }
}
