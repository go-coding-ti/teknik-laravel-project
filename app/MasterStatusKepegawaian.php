<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterStatusKepegawaian extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_status_kepegawaian';
    protected $table = 'master_status_kepegawaian';

    protected $fillable = ['id_status_kepegawaian', 'status_kepegawaian'];
}
