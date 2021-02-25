<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterStatusKeaktifan extends Model
{
    //
    protected $table = 'master_status_keaktifan';

    protected $fillable = ['id_status_keaktifan', 'status_keaktifan'];
}
