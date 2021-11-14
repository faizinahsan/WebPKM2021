<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBimbingan extends Model
{
    use HasFactory;
    protected $table = 'tb_riwayat_bimbingan';
    protected $primaryKey = 'id_riwayat_bimbingan';

    protected $fillable = ['tanggal','hasil_diskusi','npm_mahasiswa','nip_pendamping'];

     public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','npm_mahasiswa');
    }
    
}
