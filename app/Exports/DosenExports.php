<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\HeadingExcel;

class DosenExports implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    
    private $fileName = "Dosen.xlsx";
    public $rows;
    public $head;

    function __construct($rows,$head) {
        $this->row = $rows;
        $this->head = $head;
    }
    public function collection()
    {
        return new Collection([
            $this->row
        ]);
    }
    
    public function array_remove_by_value($array, $value){
        return array_values(array_diff($array, $value));
    }

    public function headings(): array
    {
        $headArray = array();
        $head = HeadingExcel::all();
        $counthead = count($head);
        foreach ($head as $header){
            $headArray[] =  (
                $header->heading
            );
        }
        $t = array();
        $t[] =(
            $this->head
        ); 
        foreach ($t as $x=>$val){
            $newarray = self::array_remove_by_value($headArray, $val);
        }
        return $newarray;
    }
    
}
