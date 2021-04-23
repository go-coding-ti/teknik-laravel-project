<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJabatanFungsional extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'id_jabatan_fungsional';
    protected $table = 'master_jabatan_fungsional';

    protected $fillable = ['jabatan_fungsional'];

    public function jabatanfungsional(){
        return $this->hasMany(TmtJabatanFungsional::class, 'id_jabatan_fungsional');
    }
}
