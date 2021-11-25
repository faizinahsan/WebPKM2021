<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'npm_mahasiswa';
    
    protected $fillable = ['npm_mahasiswa','nip_pendamping','nip_reviewer','users_id'];

    public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }

    public function requestDosbim()
    {
        return $this->hasOne('App\Models\RequestDosbim','npm_mahasiswa');
    }

    public function riwayatBimbingan()
    {
        return $this->hasMany('App\Models\RiwayatBimbingan', 'npm_mahasiswa');
    }
    public function riwayatCoaching()
    {
        return $this->hasMany('App\Models\RiwayatCoaching', 'npm_mahasiswa');
    }
    
    public function proposal()
    {
        return $this->hasOne('App\Models\Proposal', 'npm_mahasiswa');
    }

    public function file_revisi()
    {
        return $this->hasOne('App\Models\FileRevisi', 'npm_mahasiswa');
    }

    public function AkunSimbelmawa()
    {
        return $this->hasOne('App\Models\AkunSimbelmawa', 'npm_mahasiswa');
    }

    public function reviewer()
    {
        return $this->hasOne('App\Models\DosenReviewer', 'nip_reviewer');
    }

    public function pendamping()
    {
        return $this->hasOne('App\Models\DosenPendamping', 'nip_pendamping');
    }

}
