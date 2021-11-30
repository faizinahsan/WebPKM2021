<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRevisi extends Model
{
    use HasFactory;
    protected $table = 'tb_file_revisi';
    protected $primaryKey = 'id_file';

    protected $fillable = ['file_revisi','file_path','npm_mahasiswa','id_file_revisi_reviewer'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','npm_mahasiswa');
    }

    public function file_revisi_reviewer()
    {
        return $this->belongsTo('App\Models\FileRevisiReviewer','id_file_revisi_reviewer');
    }
}
