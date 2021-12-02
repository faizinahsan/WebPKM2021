<?php

namespace App\Http\Controllers\KemahasiswaanControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Timeline;
class TimelineController extends Controller
{
    //
    public function index(Request $request)
    {
        $timelines = Timeline::all();
        return view('kemahasiswaan.timeline',['timelines'=>$timelines]);
    }
}
