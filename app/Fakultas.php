<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    protected $table = 'master_fakultas';

    protected $fillable = ['fakultas'];

    public function dosen(){
        return $this->hasManyThrough(Dosen::class, Prodi::class);
    }
}
