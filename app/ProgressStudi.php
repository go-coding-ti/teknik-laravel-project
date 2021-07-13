<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressStudi extends Model
{
    //
    protected $table = 'tb_progress_Studi';
    public $timestamps = true;

    protected $fillable = ['attachment', 'id_dosen'];

    public function dosen(){
        return $this->hasMany(Dosen::class, 'id_prodi');
    }

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }
}
