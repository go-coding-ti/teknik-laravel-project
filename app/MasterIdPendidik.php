<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterIdPendidik extends Model
{
    //
    protected $primaryKey = 'id_pendidik';
    public $timestamps = false;
    protected $table = 'master_id_pendidik';

    protected $fillable = ['id_pendidik','nip', 'jenis_id','nidn_nidk_nup'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }
}
