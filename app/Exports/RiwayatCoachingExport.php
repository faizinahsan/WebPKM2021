<?php

namespace App\Exports;

use App\Models\RiwayatCoaching;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class RiwayatCoachingExport implements FromQuery
{
    use Exportable;
    public function __construct(int $npm_mahasiswa)
    {
        $this->npm_mahasiswa = $npm_mahasiswa;
        
    }
    public function query()
    {
        return RiwayatCoaching::query()->where('npm_mahasiswa', $this->npm_mahasiswa);
    }

}
