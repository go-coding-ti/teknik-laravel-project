<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmtKepangkatanFungsional extends Model
{
    //
    protected $table = 'tmt_kepangkatan_fungsional';
    protected $primaryKey = 'id_tmt_kepangkatan_fungsional';
    protected $fillable = ['id_pangkat_pns', 'nip', 'tmt_pangkat/golongan', 'unit'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function pangkat(){
        return $this->belongsTo(MasterPangkatPns::class, 'id_pangkat_pns');
    }
}
