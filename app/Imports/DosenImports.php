<?php

namespace App\Imports;

use App\Import;
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
        return new Import([
            'nip' => $row[1],
            'nama' => $row[2], 
            'tempatlahir' => $row[3],
            'tanggallahir' => $row[4],
            'statuspegawai' => $row[5],
            'unit' => $row[6],
            'subunit' => $row[7],
            'keaktifan' => $row[8],
            'pangkat' => $row[9],
            'jabatan' => $row[10],
            'pendidikan' => $row[11],
            'email' => $row[12],
            'telepon' => $row[13],
        ]);
    }
}
