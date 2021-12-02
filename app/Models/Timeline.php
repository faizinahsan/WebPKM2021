<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_timeline';
    protected $fillable = ['datetime','nama_timeline','deskripsi','nip_kemahasiswaan'];

    public function kemahasiswaan()
    {
        return $this->belongsTo('App\Models\Kemahasiswaan','npm_kemahasiswaan');
    }
}
