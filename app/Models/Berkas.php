<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'tb_berkas';
    protected $primaryKey = 'id_berkas';
    protected $fillable = ['judul_berkas','file_berkas','file_path','nip_kemahasiswaan'];

    public function kemahasiswaan()
    {
        return $this->belongsTo('App\Models\Kemahasiswaan', 'nip_kemahasiswaan');
    }
}
