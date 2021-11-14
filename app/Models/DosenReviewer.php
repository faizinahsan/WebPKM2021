<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenReviewer extends Model
{
    use HasFactory;

    protected $table = 'tb_dosen_reviewer';
    protected $primaryKey = 'nip_reviewer';
    
    protected $fillable = ['nip_reviewer','users_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

}
