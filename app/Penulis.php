<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penelitian;

class Penulis extends Model
{
    //
    protected $table = 'master_penulis';

    protected $primaryKey = 'id_penulis';

    protected $fillable = ['id_penelitian', 'nama_penulis', 'role'];

    public function penelitian(){
        return $this->hasMany('App/Penelitian', 'id_penulis', 'id_penelitian');
    }
}
