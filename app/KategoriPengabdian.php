<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPengabdian extends Model
{
    public $timestamps = false;
    
    protected $primaryKey = 'id_kategori_pengabdian';

    protected $table = 'master_kategori_pengabdian';
}
