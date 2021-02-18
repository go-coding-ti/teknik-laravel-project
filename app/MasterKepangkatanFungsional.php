<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKepangkatanFungsional extends Model
{
    //
    protected $table = 'master_kepangkatan_fungsional';

    protected $fillable = ['tmt_pangkat/golongan', 'unit'];

    public function dosen(){
        return $this->hasMany(Dosen::class, 'id_pangkat_fungsional');
    }

    public function golongan(){
        return $this->belongsTo(MasterGolongan::class, 'id_golongan');
    }

    public function pangkatpns(){
        return $this->belongsTo(MasterPangkatPns::class, 'id_pangkat_pns');
    }
}
