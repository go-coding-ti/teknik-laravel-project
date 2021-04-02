<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    public $timestamps = false;

    protected $table = 'import_dosen';

    protected $fillable = ['nip','nama','tempatlahir','tanggallahir','statuspegawai','unit','subunit','keaktifan','pangkat','jabatan','pendidikan','email','telepon'];
}
