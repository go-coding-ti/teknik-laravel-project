<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPangkatPns extends Model
{
    //
    protected $table = 'master_pangkat_pns';

    protected $fillable = ['pangkat', 'golongan'];

    public function pangkatfunsional(){
        return $this->hasMany(TmtKepangkatanFungsional::class, 'id_pangkat_pns');
    }
}
