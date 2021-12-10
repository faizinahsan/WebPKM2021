<?php

namespace App\Exports;

use App\Models\RiwayatBimbingan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class RiwayatBimbinganExport implements FromQuery
{
    use Exportable;
    public function __construct(int $npm_mahasiswa)
    {
        $this->npm_mahasiswa = $npm_mahasiswa;
        
    }
    public function query()
    {
        return RiwayatBimbingan::query()->where('npm_mahasiswa', $this->npm_mahasiswa);
    }
}
