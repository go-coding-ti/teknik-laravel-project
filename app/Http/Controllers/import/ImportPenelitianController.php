<?php

namespace App\Http\Controllers\import;

use App\imports\PenelitianImports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Pegawai;
use App\Dosen;
use App\Penelitian;
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
            return view('admin.penelitian.penelitian-import', compact('datapenelitian','data','profiledata'),['success'=>'Berhasil Meload Data Excel']);
        }
    }

    public function save(Request $request){
        $counts = count($request->row_nama);
        for ($count = 0; $count < $counts; $count++) {
            $storePenelitian = new Penelitian;
            $storePenelitian->judul = $request->row_judul[$count];
            $storePenelitian->penerbit = $request->row_nama[$count];
            $storePenelitian->save();
        }return redirect()->route('show-import-penelitian')->with('success','Berhasil Mengupload Data');
    }
}
