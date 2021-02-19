<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmtJabatanFungsional extends Model
{
    //
    protected $table = 'tmt_jabatan_fungsional';

    protected $fillable = ['id_jabatan_fungsional', 'nip', 'tmt_jabatan_fungsional'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function pangkat(){
        return $this->belongsTo(MasterJabatanFungsional::class, 'id_jabatan_fungsional');
    }
}
