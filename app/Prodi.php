<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    //
    protected $primaryKey = 'id_prodi';
    protected $table = 'master_prodi';
    public $timestamps = false;

    protected $fillable = ['id_fakultas', 'id_prodi'];

    public function dosen(){
        return $this->hasMany(Dosen::class, 'id_prodi');
    }

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }
}
