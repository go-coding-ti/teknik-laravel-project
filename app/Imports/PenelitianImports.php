<?php

namespace App\Imports;

use App\Penelitian;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenelitianImports implements ToCollection, WithHeadingRow
{
    public $data;
    public function collection(Collection $rows)
    {
        // foreach($rows as $row){
        //     $penelitian = Penelitian::create([
        //         'judul' => $row['judul'],
        //     ]);

        //     $penelitian->penulis()->create([
        //         'nama_penulis'=> $row['Nama'],
        //     ]);
        // }
        // dd($rows);
        $this->data = $rows;
    }
}
