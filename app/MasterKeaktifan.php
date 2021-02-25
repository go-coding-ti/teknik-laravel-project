<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKeaktifan extends Model
{
    //
    protected $table = 'master_keaktifan';

    protected $fillable = ['id_keaktifan','id_status_keaktifan','tmt_keaktifan'];

    public function dosen(){
        return $this->belongsTo('App/Dosen', 'id_keaktifan', 'nip');
    }

    public function statusKeaktifan(){
        return $this->hasMany('App/MasterStatusKeaktifan', 'id_keaktifan', 'id_status_keaktifan');
    }
}
