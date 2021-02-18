<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterGolongan extends Model
{
    //
    protected $table = 'master_golongan';

    protected $fillable = ['golongan'];

    public function pangkatfungsional(){
        return $this->hasMany(MasterKepangkatanFungsional::class, 'id_golongan');
    }
}
