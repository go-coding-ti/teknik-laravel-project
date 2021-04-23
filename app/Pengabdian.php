<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    public $timestamps = false;
    
    protected $table = 'master_pengabdian';

    protected $primaryKey = 'id_pengabdian';
}
