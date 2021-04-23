<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penulis;

class Penelitian extends Model
{
    public $timestamps = false;
    
    protected $table = 'master_penelitian';

    protected $primaryKey = 'id_penelitian';

    protected $fillable = ['id_kategori_penelitian','jenis_penelitian', 'judul', 'penerbit', 'edisi', 'ISBN', 'jumlah_halaman'
    , 'bulan_publikasi', 'tahun_publikasi', 'keterangan', 'file_sk_tugas', 'file_bukti_kerja', 'status_validitas'];

    public function penulis(){
        return $this->belongsTo('App/Penulis', 'id_penelitian', 'id_penulis');
    }

    public function kategoriPenelitian(){
        return $this->belongsTo('App/KategoriPenelitian', 'id_penelitian', 'id_kategori_penelitian');
    }

}
