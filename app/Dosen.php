<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    protected $table = 'dosen';

    protected $fillable = ['nama', 'gelar', 'gelar_depan', 'gelar_belakang', 'jenis_kelamin', 'tempat_lahir'
    , 'tanggal_lahir', 'alamat_domisili', 'alamat_rumah', 'telp_rumah', 'no_hp', 'email_aktif', 'no_karpeg',  'file_karpeg'
    , 'no_npwp', 'file_npwp', 'no_karis/karsu', 'file_karis/karsu', 'no_ktp', 'file_ktp', 'status_keaktifan', 'tmt_keaktifan'];

    public function masteridpendidik(){
        return $this->belongsTo(MasterIdPendidik::class, 'nip');
    }

    public function masterstatusdosen(){
        return $this->belongsTo(MasterStatusDosen::class, 'id_status_dosen');
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
    public function fakultas(){
        return $this->hasOneThrough(Fakultas::class, Prodi::class);
    }

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan');
    }

    public function pangkatfungsional(){
        return $this->belongsTo(MasterKepangkatanFungsional::class, 'id_pangkat_fungsional');
    }

    public function pangkatpns(){
        return $this->HasOneThrough(MasterPangkatPns::class, MasterKepangkatanFungsional::class);
    }

    public function golongan(){
        return $this->HasOneThrough(MasterGolongan::class, MasterKepangkatanFungsional::class);
    }

    public function kepegawainan(){
        return $this->belongsTo(MasterStatusKepegawaian::class, 'id_status_kepegawaian');
    }

    public function jabatan(){
        return $this->belongsTo(MasterJabatanFungsional::class, 'id_jabatan_fungsional');
    }

}
