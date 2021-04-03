<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDosen extends Model
{
    public $timestamps = false;
    
    protected $table = 'import_dosen';

    protected $fillable = [
        'tahun' ,
        'nip' ,
        'nidn' ,
        'nama' ,
        'alamat', 
        'jenis_kelamin' ,
        'tanggallahir' ,
        'statuspegawai' ,
        'kepangkatan' ,
        'unit',
        'subunit' ,
        'keaktifan' ,
        'pangkat',
        'jabatanfungsional' ,
        'pendidikan',
        'email' ,
        'telepon' ,
        'tmt_keaktifan',
        'status_serdos',
        'tahun_serdos',
        'tahun_ajaran'
    ];
}
