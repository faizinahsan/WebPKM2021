<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'tb_anggota';
    protected $primaryKey = 'npm_anggota';
    protected $fillable = ['npm_anggota','nama_anggota','npm_mahasiswa'];
}
