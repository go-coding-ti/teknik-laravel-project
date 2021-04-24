<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenelitian extends Model
{
    //
    public $timestamps = false;
    
    protected $table = 'detail_penelitian';

    protected $primaryKey = 'id_detail_penelitian';

    protected $fillable = ['id_penelitian', 'id_penulis'];

    public function penulis(){
        return $this->belongsTo('App/Penulis', 'id_detail_penelitian', 'id_penulis');
    }

    public function Penelitian(){
        return $this->belongsTo('App/Penelitian', 'id_penelitian', 'id_detail_penelitian');
    }
}
