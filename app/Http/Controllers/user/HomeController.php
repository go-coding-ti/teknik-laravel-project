<?php

namespace App\Http\Controllers\user;

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

class HomeController extends Controller
{
    public function changepass(Request $request){
        if(!$request->session()->has('dosen')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $user = $request->session()->get('dosen.data');
            $profiledata = Dosen::where('nip','=', $user["nip"])->first();
            return view('user.changepass', compact('profiledata'));
        }
    }

    public function home(Request $request){
        if(!$request->session()->has('dosen')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $user = $request->session()->get('dosen.data');
            $profiledata = Dosen::where('nip','=', $user["nip"])->first();
            if($profiledata->change_password != 1){
                return view('user.changepass', compact('profiledata'));
            }else{
                $data = Dosen::get();
                return view('user.dashboard', compact('data','profiledata'));
            }
        }
    }

    public function dataDosen(Request $request){
        if(!$request->session()->has('dosen')){
            return redirect('/login')->with('expired','Session Telah Berakhir');
        }else{
            $user = $request->session()->get('dosen.data');
            $dosen = Dosen::where('nip','=',$user["nip"])->first();
            $profiledata = Dosen::where('nip','=', $user["nip"])->first();
            if($profiledata->change_password != 1){
                return view('user.changepass', compact('profiledata'));
            }else{
                $statusaktif = MasterStatusKeaktifan::all();
                $statusDosen = MasterStatusDosen::all();
                $pangkatDosen = MasterPangkatPns::all();
                $jabatanDosen = MasterJabatanFungsional::all();
                $statusKepegawaian = MasterStatusKepegawaian::all();
                $unit = Fakultas::all();
                $subunit = Prodi::all();
                return view('user.datadosen',compact('statusDosen', 'pangkatDosen', 'jabatanDosen', 'unit','subunit','statusaktif','statusKepegawaian','profiledata','dosen'));
            }
        }
    }

    public function downloadKarpeg($file){
        $file="karpeg/".$file;
        if(is_file($file)){
            $headers = array(
                'Content-Type: application/pdf',
            );
            return Response::download($file, 'Karpeg_File.pdf', $headers);
        }else{
            return redirect()->back()->with('error','Gagal Mendowload file Karpeg!');
        }
        
    }

    public function downloadKariskarsu($file){
        $file="karis/".$file;
        if(is_file($file)){
            $headers = array(
                'Content-Type: application/pdf',
            );
            return Response::download($file, 'Karis_Karsu_File.pdf', $headers);
        }else{
            return redirect()->back()->with('error','Gagal Mendowload file Karis/Karsu!');
        }
        
    }

    public function downloadNpwp($file){
        $file="npwp/".$file;
        if(is_file($file)){
            $headers = array(
                'Content-Type: application/pdf',
            );
            return Response::download($file, 'NPWP_File.pdf', $headers);
        }else{
            return redirect()->back()->with('error','Gagal Mendowload file NPWP!');
        }
        
    }

    public function downloadKtp($file){
        $file="ktp/".$file;
        if(is_file($file)){
            $headers = array(
                'Content-Type: application/pdf',
            );
            return Response::download($file, 'KTP_File.pdf', $headers);
        }else{
            return redirect()->back()->with('error','Gagal Mendowload file KTP!');
        }
    }
}
