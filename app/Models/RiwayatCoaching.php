<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatCoaching extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tb_riwayat_coaching';
    protected $primaryKey = 'id_riwayat_coaching';

    protected $fillable = ['tanggal','hasil_diskusi','npm_mahasiswa','nip_reviewer'];

     public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','npm_mahasiswa');
    }
    
}
