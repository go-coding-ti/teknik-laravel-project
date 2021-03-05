<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penelitian;

class KategoriPenelitian extends Model
{
    //
    protected $table = 'master_kategori_penelitian';
    
    protected $fillable = ['kategori_penelitian'];

    public function penelitian(){
        return $this->hasMany('App/Penelitian', 'id_kategori_penelitian', 'id_penelitian');
    }
}
