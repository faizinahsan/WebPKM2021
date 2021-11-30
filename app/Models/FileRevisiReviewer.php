<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRevisiReviewer extends Model
{
    use HasFactory;
    protected $table = 'tb_file_revisi_reviewer';
    protected $fillable = ['file_revisi','file_path','npm_mahasiswa','nip_reviewer','id_file_proposal','id_file_revisi'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','npm_mahasiswa');
    }
    public function reviewer()
    {
        return $this->belongsTo('App\Models\DosenReviewer','nip_reviewer');
    }
    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal','id_proposal');
    }
    public function file_revisi()
    {
        return $this->belongsTo('App\Models\FileRevisi','id_file_revisi');
    }

}
