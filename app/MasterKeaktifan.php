<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKeaktifan extends Model
{
    //
    protected $primaryKey = 'id_keaktifan';

    public $timestamps = false;

    protected $table = 'master_keaktifan';

    protected $fillable = ['id_keaktifan','nip', 'id_status_keaktifan','tmt_keaktifan'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'nip');
    }

    public function statusKeaktifan(){
        return $this->belongsTo(MasterStatusKeaktifan::class,'id_status_keaktifan');
    }
}
