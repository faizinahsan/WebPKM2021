<?php

namespace App\Http\Controllers\MahasiswaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunSimbelmawaController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('mahasiswa.akun_simbelmawa');
    }
}
