<?php

namespace App\Http\Controllers\export;

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
use App\MasterStatusKepegawaian;
use App\MasterKeaktifan;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DosenImports;
use Response;
use Illuminate\Support\Facades\Hash;;
use App\TmtStatusDosen;
use App\TmtStatusKepegawaianDosen;
use App\KategoriPenelitian;
use App\Pengabdian;
use App\KategoriPengabdian;

class ExportDosenController extends Controller
{

    public function exportDosen(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $check = $request->session()->get('admin.id');
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $dosen = Dosen::all();
            return view('admin.dosen.exportdosen', compact('dosen','profiledata'));
        }
    }

    public function excel(){
        $dosenArray[] = array('NIP', 'NIDN', 'Unit', 'Sub Unit', 'Nama');
        $countnip = count($request->row_nip);
        for ($nips = 0; $nips < $countnip; $nips++) {
            $dosenArray[] = array(

            );
        }
        Excel::create('Data Dosen',function($excel) use (
            $dosenArray){
                $excel->setTitle('Data Dosen');
                $excel->sheet('Data Dosen',function($sheet)
                    use($dosenArray){
                        $sheet->fromArray($dosenArray, null, 'A1', false, false);
                    });
        })->download('xlxs');
    }
}
