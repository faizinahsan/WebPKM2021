<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRevisi extends Model
{
    use HasFactory;
    protected $table = 'tb_file_revisi';
    protected $primaryKey = 'id_file_revisi';

    protected $fillable = ['file_revisi','file_path','npm_mahasiswa'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','npm_mahasiswa');
    }
}
