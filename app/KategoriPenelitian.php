<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penelitian;

class KategoriPenelitian extends Model
{
    //
    public $timestamps = false;
    
    protected $primaryKey = 'id_kategori_penelitian';

    protected $table = 'master_kategori_penelitian';
    
    protected $fillable = ['kategori_penelitian'];

    public function penelitian(){
        return $this->hasMany('App/Penelitian', 'id_kategori_penelitian', 'id_penelitian');
    }
}
