<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'tb_proposal';
    protected $primaryKey = 'id_file_proposal';

    protected $fillable = ['file_proposal','file_path','npm_mahasiswa'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','npm_mahasiswa');
    }

}
