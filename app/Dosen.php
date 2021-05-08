<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $primaryKey = 'nip';
    protected $table = 'tb_dosen';

    public function masteridpendidik(){
        return $this->hasMany(MasterIdPendidik::class, 'nip');
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function pendidikan(){
        return $this->hasMany(MasterPendidikan::class, 'nip');
    }

    public function tmtpangkat(){
        return $this->hasMany(TmtKepangkatanFungsional::class, 'nip');
    }

    public function tmtstatus(){
        return $this->hasMany(TmtStatusDosen::class, 'nip');
    }

    public function tmtkepegawaian(){
        return $this->hasMany(TmtStatusKepegawaianDosen::class, 'nip');
    }

    public function tmtjabatan(){
        return $this->hasMany(TmtJabatanFungsional::class, 'nip' );
    }

    public function tmtkeaktifan(){
        return $this->hasMany(MasterKeaktifan::class, 'nip');
    }

    public function tahunajaran(){
        return $this->hasMany(TahunAjaranDosen::class, 'nip');
    }
}
