<?php

namespace App\Imports;

use App\ImportDosen;
use Maatwebsite\Excel\Concerns\ToModel;

class DosenImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportDosen([
            'tahun' => $row[1],
            'nip' => $row[4],
            'nidn' => $row[3],
            'nama' => $row[6],
            'alamat' => $row[19], 
            'jenis_kelamin' => $row[9],
            'tanggallahir' => $row[18],
            'statuspegawai' => $row[10],
            'kepangkatan' => $row[11],
            'unit' => $row[7],
            'subunit' => $row[8],
            'keaktifan' => $row[13],
            'pangkat' => $row[9],
            'jabatanfungsional' => $row[12],
            'pendidikan' => $row[15],
            'email' => $row[17],
            'telepon' => $row[16],
            'tmt_keaktifan' => $row[14],
            'status_serdos' => $row[21],
            'tahun_serdos' => $row[22],
            'tahun_ajaran' => $row[2],
        ]);
    }
}
