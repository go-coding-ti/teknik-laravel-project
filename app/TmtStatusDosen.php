<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmtStatusDosen extends Model
{
    public $timestamps = false;
    protected $table = 'tmt_status_dosen';
    protected $fillable = ['id_status_dosen','nip', 'tmt_status_dosen'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function status(){
        return $this->hasMany(MasterStatusDosen::class, 'id_status_dosen');
    }
}

