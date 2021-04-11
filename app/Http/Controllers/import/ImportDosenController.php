<?php

namespace App\Http\Controllers\import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;
use App\ImportDosen;
use App\ImportPegawai;
use App\Pegawai;
use App\MasterIdPendidik;
use App\TmtJabatanFungsional;
use App\TmtKepangkatanFungsional;
use App\MasterStatusDosen;
use App\MasterJabatanFungsional;
use App\MasterPangkatPns;
use App\MasterPendidikan;
use App\Prodi;
use App\Fakultas;
use App\MasterStatusKeaktifan;
use App\MasterKeaktifan;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DosenImports;
use Response;
use Illuminate\Support\Facades\Hash;

class ImportDosenController extends Controller
{
    public function importDosen(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $imports = NULL;
            $check = $request->session()->get('admin.id');
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            return view('admin.dosen.importdosen', compact('profiledata','imports'));
        }
    }

    public function storeImportDosen(Request $request){
        $excel = null;
        if($request->file('inputfile')){
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $file = $request->file('inputfile');
            $excel = time()."_".$file->getClientOriginalName();
            
            $rows = Excel::ToCollection(new DosenImports, $file);
            $imports = $rows['0'];

            $upload = 'excel';
            $file->move($upload,$excel);
            return view('admin.dosen.importdosen', compact('imports','profiledata'),['success'=>'Berhasil Meload Data Excel']);
        }else{
            return redirect()->route('admin-import-dosen')->with('error','Gagal Meload Excel');
        }
    }

    public function downloadExcel(){
        $file="excel/contoh.xls";
        $headers = array(
            'Content-Type: application/vnd.ms-excel',
        );
        return Response::download($file, 'Contoh_File.xls', $headers);
    }

    public function storeDosenFromImport(Request $request){
        $countnip = count($request->row_nip);
        for ($nips = 0; $nips < $countnip; $nips++) {
            $storeDosen = new Dosen;
            $storeDosen->nip = $request->row_nip[$nips];
            $storeDosen->nama = $request->row_nama[$nips];
            $storeDosen->password = Hash::make($request->row_nip[$nips]);
            $storeDosen->save();
        }return redirect()->route('admin-import-dosen')->with('success','Berhasil Mengupload Data');
    }
}
