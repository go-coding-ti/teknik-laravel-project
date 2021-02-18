<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJabatanFungsional extends Model
{
    //
    protected $table = 'master_jabatan_fungsional';

    protected $fillable = ['jabatan_fungsional', 'tmtm_jabatan_fungsional'];
}
