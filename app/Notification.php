<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification_table';

    protected $fillable = ['id_kepangkatan','nip_dosen','cek_hari', 'chat_id'];
}
