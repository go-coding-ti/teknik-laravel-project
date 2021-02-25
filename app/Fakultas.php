<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    protected $table = 'master_fakultas';

    protected $fillable = ['id_fakultas', 'fakultas'];

    public function dosen(){
        return $this->hasManyThrough(Dosen::class, Prodi::class);
    }
}
