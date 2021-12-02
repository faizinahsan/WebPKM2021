<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemahasiswaan extends Model
{
    use HasFactory;
    protected $table = 'tb_kemahasiswaan';
    protected $primaryKey = 'nip_kemahasiswaan';
    
    protected $fillable = ['nip_kemahasiswaan','nip_reviewer','users_id'];

}
