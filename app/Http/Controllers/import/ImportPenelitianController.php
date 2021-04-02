<?php

namespace App\Http\Controllers\import;

use App\imports\PenelitianImports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class ImportPenelitianController extends Controller
{
    //
    public function show(){
        $rows = NULL;
        return view('admin.penelitian-import', compact('rows'));
    }

    public function view(Request $request){
        $file = $request->file('inputfile');
        
        $rows = Excel::ToCollection(new PenelitianImports, $file);
        $data = $rows['0'];
        return view('admin.penelitian-import', compact('data'));
    }

    public function save(){

    }
}
