<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaranDosen extends Model
{
    public $timestamps = false;
    protected $table = "tahun_ajaran_dosen";

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function ta(){
        return $this->belongsTo(MasterTahunAjaran::class, 'tahun_ajaran');
    }
}
