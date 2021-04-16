<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPendidikan extends Model
{
    //
    protected $primaryKey = 'id_pendidikan';
    public $timestamps = false;
    protected $table = 'histori_pendidikan_dosen';

    protected $fillable = ['nip','jenjang_pendidikan_terakhir', 'nama_institusi', 'bidang_ilmu', 'tanggal_selesai_studi'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }
}
