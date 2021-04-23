<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterStatusDosen extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'id_status_dosen';
    protected $table = 'master_status_dosen';

    protected $fillable = ['id_status_dosen', 'status_dosen'];

    public function dosen(){
        return $this->hasMany(dosen::class, 'id_status_dosen');
    }
}
