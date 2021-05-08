<?php

namespace App\Http\Controllers\export;

use App\Exports\DosenExports;
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
use App\HeadingExcel;
use Illuminate\Support\Collection;

class ExportDosenController extends Controller
{

    public function exportDosen(Request $request){
        if(!$request->session()->has('admin')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $check = $request->session()->get('admin.id');
            $user = $request->session()->get('admin.data');
            $profiledata = Pegawai::where('nip','=', $user["nip"])->first();
            $dosen = Dosen::get();
            $prodi = Prodi::all();
            $header = HeadingExcel::all();
            return view('admin.dosen.exportdosen', compact('header','prodi','dosen','profiledata'));
        }
    }

    public function excel(Request $request){
        $dosenArray[] = array('Nama','Tahun Ajaran');
        $countnip = count($request->row_nama);
        // dd($request->all());
        for ($nips = 0; $nips < $countnip; $nips++) {
            $dosenArray[] = array(
                'Nama' => $request->row_nama[$nips],
                'Tahun Ajaran' => $request->row_ta[$nips]
            );
        }
        unset($dosenArray['Nama']);
        dd($dosenArray[0]);
        return (new Collection($dosenArray))->downloadExcel("Dosen.xlsx");

        // Excel::downloadExcel('Data Dosen',function($excel) use (
        //     $dosenArray){
        //         $excel->setTitle('Data Dosen');
        //         $excel->sheet('Data Dosen',function($sheet)
        //             use($dosenArray){
        //                 $sheet->fromArray($dosenArray, null, 'A1', false, false);
        //             });
        // })->download('xlxs')->withHeadings()->except();
    }
}
