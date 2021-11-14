<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPendamping extends Model
{
    use HasFactory;

    protected $table = 'tb_dosen_pendamping';
    protected $primaryKey = 'nip_pendamping';
    
    protected $fillable = ['nip_pendamping','users_id'];

    public function requestDosbim()
    {
        return $this->hasMany('App\Models\RequestDosbim', 'nip_pendamping');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
