<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunSimbelmawa extends Model
{
    use HasFactory;
    protected $table="tb_akun_simbelmawa";

    protected $fillable = ['username','password','npm_mahasiswa'];

    public function Mahasiswa()
    {
        return $this->hasOne('App\Models\Mahasiswa','npm_mahasiswa');
    }
}
