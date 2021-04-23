<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    public $timestamps = false;
    
    protected $primaryKey = 'id_fakultas';

    protected $table = 'master_fakultas';

    protected $fillable = ['id_fakultas', 'fakultas'];

    public function dosen(){
        return $this->hasManyThrough(Dosen::class, Prodi::class);
    }

    public function prodi(){
        return $this->hasMany(Prodi::class, 'id_fakultas');
    }
}
