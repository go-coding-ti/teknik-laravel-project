<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPendidikan extends Model
{
    //
    protected $table = 'master_pendidikan';

    protected $fillable = ['jenjang_pendidikan_terakhir', 'nama_institusi', 'bidang_ilmu', 'tanggal_selesai_studi'];

    public function dosen(){
        return $this->hasMany(Dosen::class, 'id_pendidikan');
    }
}
