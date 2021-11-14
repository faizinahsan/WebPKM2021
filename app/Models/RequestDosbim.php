<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDosbim extends Model
{
    use HasFactory;
    protected $table = 'tb_request_dosbim';

    protected $fillable = ['npm_mahasiswa','nip_pendamping','status'];

    public function pendamping()
    {
        return $this->belongsTo('App\Models\DosenPendamping', 'nip_pendamping');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'npm_mahasiswa');
    }
}
