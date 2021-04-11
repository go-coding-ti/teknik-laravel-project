<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImports implements ToCollection, WithHeadingRow
{
    public $data;
    public function collection(Collection $collection)
    {
        $this->data = $rows;
    }
}
