<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTahunAjaran extends Model
{
    public $timestamps = false; 
    protected $table ="master_tahun_ajaran";

    public function tajaran(){
        return $this->hasMany(TahunAjaranDosen::class, 'tahun_ajaran');
    }
}
