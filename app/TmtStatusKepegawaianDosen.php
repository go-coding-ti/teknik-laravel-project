<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmtStatusKepegawaianDosen extends Model
{
    public $timestamps = false;
    protected $table = 'tmt_status_kepegawaian_dosen';
    protected $fillable = ['id_status_kepegawaian','nip', 'tmt_status_kepegawaian'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function statuskepeg(){
        return $this->belongsTo(MasterStatusKepegawaian::class, 'id_status_kepegawaian');
    }
}
