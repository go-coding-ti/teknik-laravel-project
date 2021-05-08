<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Database\Eloquent\Collection;
class DosenExports implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    
    private $fileName = "Dosen.xlsx";
    
    public function collection()
    {
        return new Collection([
            $this->data = $rows
        ]);
    }
}
