<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJabatanFungsional extends Model
{
    //
    protected $table = 'master_jabatan_fungsional';

    protected $fillable = ['jabatan_fungsional'];

    public function jabatanfungsional(){
        return $this->hasMany(TmtJabatanFungsional::class, 'id_jabatan_fungsional');
    }
}
