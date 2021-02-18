<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterIdPendidik extends Model
{
    //
    protected $table = 'master_id_pendidik';

    protected $fillable = ['id_pendidik', 'jenis_id'];

    public function dosen(){
        return $this->hasMany(Dosen::class, 'id_pendidik');
    }
}
