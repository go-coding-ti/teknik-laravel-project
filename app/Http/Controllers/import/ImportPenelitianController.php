<?php

namespace App\Http\Controllers\import;

use App\imports\PenelitianImports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Pegawai;
use App\Dosen;

class ImportPenelitianController extends Controller
{
    //
    public function show(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $datapenelitian = NULL;
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            return view('admin.penelitian.penelitian-import', compact('datapenelitian','data','profiledata'));
        }
    }

    public function view(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $file = $request->file('inputfile');
        
            $rows = Excel::ToCollection(new PenelitianImports, $file);
            $datapenelitian = $rows['0'];
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $data = Dosen::get();
            return view('admin.penelitian.penelitian-import', compact('datapenelitian','data','profiledata'));
        }
    }

    public function save(){

    }
}
